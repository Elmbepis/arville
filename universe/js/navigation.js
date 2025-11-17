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
    
    const maxJoystickDistance = 35;

    // Function to get joystick center coordinates
    function getJoystickCenter() {
        const joystickRect = joystickContainer.getBoundingClientRect();
        return {
            x: joystickRect.left + joystickRect.width / 2,
            y: joystickRect.top + joystickRect.height / 2
        };
    }

    // Function to reset joystick position
    function resetJoystick() {
        joystickHandle.style.transform = 'translate(0, 0)';
        moveState.forward = moveState.backward = moveState.left = moveState.right = false;
    }

    // Function to update joystick movement
    function updateJoystick(touch) {
        const joystickCenter = getJoystickCenter();
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
            // CORRECTED DIRECTIONS:
            // Forward = top side of joystick (negative deltaY)
            // Right = right side of joystick (positive deltaX)
            moveState.forward = deltaY < -deadZone;    // UP moves forward
            moveState.backward = deltaY > deadZone;    // DOWN moves backward
            moveState.right = deltaX > deadZone;       // RIGHT moves right
            moveState.left = deltaX < -deadZone;       // LEFT moves left
        } else {
            moveState.forward = moveState.backward = moveState.left = moveState.right = false;
        }
    }

    // Function to check if touch is within joystick area
    function isTouchInJoystickArea(touchX, touchY) {
        const joystickCenter = getJoystickCenter();
        const distanceFromCenter = Math.sqrt(
            Math.pow(touchX - joystickCenter.x, 2) + 
            Math.pow(touchY - joystickCenter.y, 2)
        );
        
        return distanceFromCenter <= 40; // Within circular base radius
    }

    // Touch start handler
    document.addEventListener('touchstart', (e) => {
        e.preventDefault();
        const touch = e.touches[0];
        const touchX = touch.clientX;
        const touchY = touch.clientY;
        
        // Check if touch is within the circular joystick area
        if (isTouchInJoystickArea(touchX, touchY)) {
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
            if (isTouchInJoystickArea(touchX, touchY)) {
                updateJoystick(touch);
            } else {
                // If finger left joystick area, deactivate it
                joystickActive = false;
                resetJoystick();
            }
        }
        
        if (cameraTouchActive) {
            const deltaX = touch.clientX - previousMouseX;
            previousMouseX = touch.clientX;
            yaw -= deltaX * 0.002;
            camera.rotation.y = yaw;
        }
    });

    // Touch end handler
    document.addEventListener('touchend', (e) => {
        joystickActive = false;
        cameraTouchActive = false;
        resetJoystick();
    });

    // Touch cancel handler
    document.addEventListener('touchcancel', (e) => {
        joystickActive = false;
        cameraTouchActive = false;
        resetJoystick();
    });

    // Ensure joystick maintains size and position on orientation change
    window.addEventListener('resize', () => {
        // Force the joystick to reset and maintain its appearance
        resetJoystick();
    });
}}