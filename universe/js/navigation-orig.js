// Navigation controls for Arville Universe - Shared across all HTML files

// Detect if device is mobile/touch
const isMobile = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);

// Camera boundaries will be set by the main HTML file
let CAMERA_LIMITS = null;

// Store initial camera position and rotation
let INITIAL_CAMERA_POSITION = null;
let INITIAL_CAMERA_ROTATION = null;

function setupControls(camera, EYE_HEIGHT, placeWidth, placeDepth, speedMultiplier = 1.0) {
    // Set camera limits based on provided dimensions
    CAMERA_LIMITS = {
        minX: -placeWidth/2 + 5,  // 5 units buffer from edge
        maxX: placeWidth/2 - 5,
        minZ: -placeDepth/2 + 5,
        maxZ: placeDepth/2 - 5,
        minY: 0.5,   // Minimum height (can't go underground)
        maxY: 100    // Maximum flying height
    };

    const moveState = { forward: false, backward: false, left: false, right: false, up: false, down: false };
    const velocity = new THREE.Vector3();
    const direction = new THREE.Vector3();
    let yaw = 0;
    let pitch = 0;
    let isMouseDown = false;
    let previousMouseX = 0;
    let previousMouseY = 0;

    // Different move speeds for mobile vs desktop - multiplied by speedMultiplier
    const moveSpeed = (isMobile ? 0.05 : 0.1) * speedMultiplier;
    const strafeSpeed = (isMobile ? 0.012 : 0.042) * speedMultiplier;
    const MAX_PITCH = 15 * (Math.PI / 180);
    
    // Store initial camera position and rotation if not already set
    if (!INITIAL_CAMERA_POSITION) {
        INITIAL_CAMERA_POSITION = camera.position.clone();
        INITIAL_CAMERA_ROTATION = camera.rotation.clone();
        // Also store initial yaw and pitch values
        yaw = camera.rotation.y;
        pitch = camera.rotation.x;
    }
    
    // --- DESKTOP CONTROLS ---
    document.addEventListener("mousedown", (e) => {
        isMouseDown = true;
        previousMouseX = e.clientX;
        previousMouseY = e.clientY;
    });
    document.addEventListener("mouseup", () => (isMouseDown = false));

    document.addEventListener("mousemove", (e) => {
        if (!isMouseDown) return;
        
        const deltaX = e.clientX - previousMouseX;
        const deltaY = e.clientY - previousMouseY;
        
        previousMouseX = e.clientX;
        previousMouseY = e.clientY;
        
        // Horizontal rotation (yaw)
        yaw -= deltaX * 0.002;
        
        // Vertical rotation (pitch) with limits
        pitch -= deltaY * 0.002;
        pitch = Math.max(-MAX_PITCH, Math.min(MAX_PITCH, pitch));
        
        // Apply rotations to camera
        camera.rotation.set(pitch, yaw, 0, 'YXZ');
    });

    document.addEventListener("keydown", (e) => {
        switch (e.code) {
            // SWAPPED: W now moves backward, S moves forward
            case "KeyS": moveState.forward = true; break;
            case "KeyW": moveState.backward = true; break;
            case "KeyD": moveState.left = true; break;
            case "KeyA": moveState.right = true; break;
            case "KeyQ": moveState.up = true; break;      // Q to fly up
            case "KeyE": moveState.down = true; break;    // E to fly down
            case "KeyR": resetCamera(); break;
        }
    });
    document.addEventListener("keyup", (e) => {
        switch (e.code) {
            case "KeyS": moveState.forward = false; break;
            case "KeyW": moveState.backward = false; break;
            case "KeyD": moveState.left = false; break;
            case "KeyA": moveState.right = false; break;
            case "KeyQ": moveState.up = false; break;
            case "KeyE": moveState.down = false; break;
        }
    });

    // --- MOBILE TOUCH CONTROLS (Only setup if mobile) ---
    if (isMobile) {
        let joystickActive = false;
        let cameraTouchActive = false;
        const joystickBase = document.getElementById('joystick-base');
        const joystickHandle = document.getElementById('joystick-handle');
        const joystickContainer = document.getElementById('joystick-container');
        const cameraControlArea = document.getElementById('camera-control-area');
        const centerTapArea = document.getElementById('center-tap-area');
        
        const joystickRect = joystickContainer.getBoundingClientRect();
        const joystickCenter = {
            x: joystickRect.left + joystickRect.width / 2,
            y: joystickRect.top + joystickRect.height / 2
        };
        const maxJoystickDistance = 35;

        // Touch start handler
        document.addEventListener('touchstart', (e) => {
            e.preventDefault();
            const touch = e.touches[0];
            const touchX = touch.clientX;
            const touchY = touch.clientY;
            
            // Check if touch is within the circular joystick area only
            const joystickRect = joystickContainer.getBoundingClientRect();
            const joystickCenterX = joystickRect.left + joystickRect.width / 2;
            const joystickCenterY = joystickRect.top + joystickRect.height / 2;
            
            const distanceFromCenter = Math.sqrt(
                Math.pow(touchX - joystickCenterX, 2) + 
                Math.pow(touchY - joystickCenterY, 2)
            );
            
            // Only activate joystick if touch is within the circular base (40px radius)
            if (distanceFromCenter <= 40) {
                joystickActive = true;
                updateJoystick(touch);
            } else if (touchX > window.innerWidth * 0.6) {
                // Right side - camera control only (rotation)
                cameraTouchActive = true;
                previousMouseX = touchX;
            }
        });

        // Touch move handler
        document.addEventListener('touchmove', (e) => {
            e.preventDefault();
            const touch = e.touches[0];
            const touchX = touch.clientX;
            const touchY = touch.clientY;
            
            if (joystickActive) {
                // Check if finger is still in joystick area during movement
                const joystickRect = joystickContainer.getBoundingClientRect();
                const distanceFromCenter = Math.sqrt(
                    Math.pow(touchX - (joystickRect.left + joystickRect.width / 2), 2) + 
                    Math.pow(touchY - (joystickRect.top + joystickRect.height / 2), 2)
                );
                
                // If finger left joystick area, deactivate it
                if (distanceFromCenter > 40) {
                    joystickActive = false;
                    resetJoystick();
                } else {
                    updateJoystick(touch);
                }
            }
            
            if (cameraTouchActive) {
                const deltaX = touch.clientX - previousMouseX;
                previousMouseX = touch.clientX;
                yaw -= deltaX * 0.002;
                camera.rotation.y = yaw;
            }
        });

        function updateJoystick(touch) {
            const touchX = touch.clientX;
            const touchY = touch.clientY;
            
            const deltaX = touchX - joystickCenter.x;
            const deltaY = touchY - joystickCenter.y;
            
            const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
            const angle = Math.atan2(deltaY, deltaX);
            
            const limitedDistance = Math.min(distance, maxJoystickDistance);
            
            // Update joystick handle position
            const handleX = limitedDistance * Math.cos(angle);
            const handleY = limitedDistance * Math.sin(angle);
            
            joystickHandle.style.transform = `translate(${handleX}px, ${handleY}px)`;
            
            // Update movement state based on joystick position
            const deadZone = 15;
            
            if (limitedDistance > deadZone) {
                // SWAPPED: UP moves backward, DOWN moves forward
                moveState.forward = deltaY > deadZone;    // DOWN moves forward
                moveState.backward = deltaY < -deadZone;  // UP moves backward
                
                // REVERSED: Left/right controls swapped
                moveState.left = deltaX > deadZone;    // RIGHT moves left
                moveState.right = deltaX < -deadZone;  // LEFT moves right
            } else {
                moveState.forward = moveState.backward = moveState.left = moveState.right = false;
            }
        }

        function resetJoystick() {
            joystickHandle.style.transform = 'translate(0, 0)';
            moveState.forward = moveState.backward = moveState.left = moveState.right = false;
        }
    }

function resetCamera() {
    if (window.ROOM_INITIAL_POSITION && window.ROOM_INITIAL_ROTATION) {
        // Reset to the stored room-specific position and rotation
        camera.position.copy(window.ROOM_INITIAL_POSITION);
        camera.rotation.copy(window.ROOM_INITIAL_ROTATION);
        
        // Also reset yaw and pitch to match the initial rotation
        yaw = window.ROOM_INITIAL_ROTATION.y;
        pitch = window.ROOM_INITIAL_ROTATION.x;
    } else {
        // Fallback to original behavior if room-specific values aren't set
        camera.position.set(0, EYE_HEIGHT, 0);
        camera.rotation.set(0, 0, 0);
        yaw = 0;
        pitch = 0;
    }
    
    velocity.set(0, 0, 0);
}

    // Function to enforce camera boundaries
    function enforceCameraBoundaries() {
        if (!CAMERA_LIMITS) return; // Don't enforce if limits not set
        
        // Apply boundaries to all platforms
        camera.position.x = THREE.MathUtils.clamp(camera.position.x, CAMERA_LIMITS.minX, CAMERA_LIMITS.maxX);
        camera.position.z = THREE.MathUtils.clamp(camera.position.z, CAMERA_LIMITS.minZ, CAMERA_LIMITS.maxZ);
        camera.position.y = THREE.MathUtils.clamp(camera.position.y, CAMERA_LIMITS.minY, CAMERA_LIMITS.maxY);
    }

    camera.userData.update = function () {
        velocity.x -= velocity.x * 0.25;
        velocity.z -= velocity.z * 0.25;
        velocity.y -= velocity.y * 0.25; // Vertical damping

        direction.z = Number(moveState.forward) - Number(moveState.backward);
        direction.x = Number(moveState.right) - Number(moveState.left);
        direction.y = Number(moveState.up) - Number(moveState.down); // Vertical movement
        direction.normalize();

        // Apply different speeds for forward/backward vs left/right on mobile
        if (moveState.forward || moveState.backward) velocity.z -= direction.z * moveSpeed;
        if (moveState.left || moveState.right) velocity.x -= direction.x * (isMobile ? strafeSpeed : moveSpeed);
        if (moveState.up || moveState.down) velocity.y -= direction.y * moveSpeed; // Vertical movement

        const forward = new THREE.Vector3(0, 0, -1).applyQuaternion(camera.quaternion);
        const right = new THREE.Vector3(1, 0, 0).applyQuaternion(camera.quaternion);
        forward.y = 0; right.y = 0; // Keep horizontal movement horizontal
        forward.normalize(); right.normalize();

        camera.position.add(forward.multiplyScalar(velocity.z));
        camera.position.add(right.multiplyScalar(velocity.x));
        camera.position.y += velocity.y; // Apply vertical movement
        
        // Enforce camera boundaries for ALL platforms
        enforceCameraBoundaries();
    };
}

// Initialize mobile controls display
function initMobileControls() {
    if (isMobile) {
        document.getElementById("mobile-controls").style.display = "block";
        document.getElementById("info").style.display = "none";
        document.getElementById("instructions").style.display = "none";
        document.getElementById("flight-controls").style.display = "none";
        document.body.style.touchAction = "none";
    }
}