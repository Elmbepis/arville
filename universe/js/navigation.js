// Navigation controls for Arville Universe - Shared across all HTML files

// Use window object to avoid global conflicts
window.isMobile = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);

// Camera boundaries will be set by the main HTML file
let CAMERA_LIMITS = null;

// Store initial camera position and rotation
let INITIAL_CAMERA_POSITION = null;
let INITIAL_CAMERA_ROTATION = null;

function setupControls(camera, EYE_HEIGHT, placeWidth, placeDepth, speedMultiplier = 1.0) {
    // Set camera limits based on provided dimensions
    CAMERA_LIMITS = {
        minX: -placeWidth/2 + 5,
        maxX: placeWidth/2 - 5,
        minZ: -placeDepth/2 + 5,
        maxZ: placeDepth/2 - 5,
        minY: 0.5,
        maxY: 100
    };

    const moveState = { forward: false, backward: false, left: false, right: false, up: false, down: false };
    const velocity = new THREE.Vector3();
    const direction = new THREE.Vector3();
    let yaw = 0;
    let pitch = 0;
    let isMouseDown = false;
    let previousMouseX = 0;
    let previousMouseY = 0;

    // Different move speeds for mobile vs desktop
    const moveSpeed = (window.isMobile ? 0.05 : 0.1) * speedMultiplier;
    const strafeSpeed = (window.isMobile ? 0.012 : 0.042) * speedMultiplier;
    const MAX_PITCH = 15 * (Math.PI / 180);
    
    // Store initial camera position and rotation if not already set
    if (!INITIAL_CAMERA_POSITION) {
        INITIAL_CAMERA_POSITION = camera.position.clone();
        INITIAL_CAMERA_ROTATION = camera.rotation.clone();
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
        
        yaw -= deltaX * 0.002;
        pitch -= deltaY * 0.002;
        pitch = Math.max(-MAX_PITCH, Math.min(MAX_PITCH, pitch));
        
        camera.rotation.set(pitch, yaw, 0, 'YXZ');
    });

    document.addEventListener("keydown", (e) => {
        switch (e.code) {
            case "KeyS": moveState.forward = true; break;
            case "KeyW": moveState.backward = true; break;
            case "KeyD": moveState.left = true; break;
            case "KeyA": moveState.right = true; break;
            case "KeyQ": moveState.up = true; break;
            case "KeyE": moveState.down = true; break;
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

    // --- MOBILE TOUCH CONTROLS ---
    if (window.isMobile) {
        let joystickActive = false;
        let cameraTouchActive = false;
        let joystickCenter = { x: 0, y: 0 };
        const maxJoystickDistance = 35;

        // Touch start handler
        document.addEventListener('touchstart', (e) => {
            e.preventDefault();
            const touch = e.touches[0];
            const touchX = touch.clientX;
            const touchY = touch.clientY;
            
            // Get joystick elements safely
            const joystickContainer = document.getElementById('joystick-container');
            if (!joystickContainer) return;
            
            const joystickRect = joystickContainer.getBoundingClientRect();
            const joystickCenterX = joystickRect.left + joystickRect.width / 2;
            const joystickCenterY = joystickRect.top + joystickRect.height / 2;
            joystickCenter = { x: joystickCenterX, y: joystickCenterY };
            
            const distanceFromCenter = Math.sqrt(
                Math.pow(touchX - joystickCenterX, 2) + 
                Math.pow(touchY - joystickCenterY, 2)
            );
            
            if (distanceFromCenter <= 40) {
                joystickActive = true;
                updateJoystick(touch);
            } else if (touchX > window.innerWidth * 0.6) {
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
                const joystickContainer = document.getElementById('joystick-container');
                if (!joystickContainer) return;
                
                const joystickRect = joystickContainer.getBoundingClientRect();
                const distanceFromCenter = Math.sqrt(
                    Math.pow(touchX - (joystickRect.left + joystickRect.width / 2), 2) + 
                    Math.pow(touchY - (joystickRect.top + joystickRect.height / 2), 2)
                );
                
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
            
            // Update joystick handle position safely
            const joystickHandle = document.getElementById('joystick-handle');
            if (joystickHandle) {
                const handleX = limitedDistance * Math.cos(angle);
                const handleY = limitedDistance * Math.sin(angle);
                joystickHandle.style.transform = `translate(${handleX}px, ${handleY}px)`;
            }
            
            // Update movement state
            const deadZone = 15;
            
            if (limitedDistance > deadZone) {
                moveState.forward = deltaY > deadZone;
                moveState.backward = deltaY < -deadZone;
                moveState.left = deltaX > deadZone;
                moveState.right = deltaX < -deadZone;
            } else {
                moveState.forward = moveState.backward = moveState.left = moveState.right = false;
            }
        }

        function resetJoystick() {
            const joystickHandle = document.getElementById('joystick-handle');
            if (joystickHandle) {
                joystickHandle.style.transform = 'translate(0, 0)';
            }
            moveState.forward = moveState.backward = moveState.left = moveState.right = false;
        }
    }

    function resetCamera() {
        if (window.ROOM_INITIAL_POSITION && window.ROOM_INITIAL_ROTATION) {
            camera.position.copy(window.ROOM_INITIAL_POSITION);
            camera.rotation.copy(window.ROOM_INITIAL_ROTATION);
            yaw = window.ROOM_INITIAL_ROTATION.y;
            pitch = window.ROOM_INITIAL_ROTATION.x;
        } else {
            camera.position.set(0, EYE_HEIGHT, 0);
            camera.rotation.set(0, 0, 0);
            yaw = 0;
            pitch = 0;
        }
        
        velocity.set(0, 0, 0);
    }

    function enforceCameraBoundaries() {
        if (!CAMERA_LIMITS) return;
        
        camera.position.x = THREE.MathUtils.clamp(camera.position.x, CAMERA_LIMITS.minX, CAMERA_LIMITS.maxX);
        camera.position.z = THREE.MathUtils.clamp(camera.position.z, CAMERA_LIMITS.minZ, CAMERA_LIMITS.maxZ);
        camera.position.y = THREE.MathUtils.clamp(camera.position.y, CAMERA_LIMITS.minY, CAMERA_LIMITS.maxY);
    }

    camera.userData.update = function () {
        velocity.x -= velocity.x * 0.25;
        velocity.z -= velocity.z * 0.25;
        velocity.y -= velocity.y * 0.25;

        direction.z = Number(moveState.forward) - Number(moveState.backward);
        direction.x = Number(moveState.right) - Number(moveState.left);
        direction.y = Number(moveState.up) - Number(moveState.down);
        direction.normalize();

        if (moveState.forward || moveState.backward) velocity.z -= direction.z * moveSpeed;
        if (moveState.left || moveState.right) velocity.x -= direction.x * (window.isMobile ? strafeSpeed : moveSpeed);
        if (moveState.up || moveState.down) velocity.y -= direction.y * moveSpeed;

        const forward = new THREE.Vector3(0, 0, -1).applyQuaternion(camera.quaternion);
        const right = new THREE.Vector3(1, 0, 0).applyQuaternion(camera.quaternion);
        forward.y = 0; right.y = 0;
        forward.normalize(); right.normalize();

        camera.position.add(forward.multiplyScalar(velocity.z));
        camera.position.add(right.multiplyScalar(velocity.x));
        camera.position.y += velocity.y;
        
        enforceCameraBoundaries();
    };
}

// Initialize mobile controls display
function initMobileControls() {
    if (window.isMobile) {
        const mobileControls = document.getElementById("mobile-controls");
        const info = document.getElementById("info");
        const instructions = document.getElementById("instructions");
        
        if (mobileControls) mobileControls.style.display = "block";
        if (info) info.style.display = "none";
        if (instructions) instructions.style.display = "none";
        
        document.body.style.touchAction = "none";
    }
}