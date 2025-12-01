// sky-effect.js
// This script makes the sky gray and sombre for village id=2

(function() {
    // Wait for the page to load
    window.addEventListener('load', function() {
        // Get villageId from URL
        const urlId = new URLSearchParams(window.location.search).get('id');
        const villageId = urlId || 'default';
        
        // Only apply effect for id=2
        if (villageId === '2') {
            console.log('&#127912; Applying gray sombre sky effect for village id=2');
            
            // Method 1: Modify the renderer clear color
            setTimeout(function() {
                // Try to find the renderer and modify its clear color
                if (window.renderer) {
                    window.renderer.setClearColor(0x666666); // Dark gray
                    console.log('&#9989; Changed sky color to gray via renderer');
                }
                
                // Method 2: Also modify the background style as fallback
                const canvas = document.querySelector('canvas');
                if (canvas) {
                    canvas.style.backgroundColor = '#666666';
                }
                
                // Method 3: Create a fog effect for sombre atmosphere
                if (window.scene) {
                    // Add subtle fog for depth
                    window.scene.fog = new THREE.Fog(0x666666, 50, 300);
                    console.log('&#9989; Added fog for sombre atmosphere');
                    
                    // Adjust lighting for gloomy effect
                    adjustLightingForSombreEffect();
                }
            }, 1000); // Delay to ensure Three.js is initialized
            
            // Method 4: Add CSS overlay for additional effect
            addSombreOverlay();
        }
    });
    
    function adjustLightingForSombreEffect() {
        // Reduce ambient light
        if (window.scene) {
            // Find and adjust lights in the scene
            window.scene.traverse(function(object) {
                if (object.isLight) {
                    if (object.isAmbientLight) {
                        // Reduce ambient light intensity
                        object.intensity = 0.4;
                        console.log('&#128261; Reduced ambient light intensity');
                    } else if (object.isHemisphereLight) {
                        // Make hemisphere light darker
                        object.intensity = 0.6;
                        console.log('&#128261; Reduced hemisphere light intensity');
                    } else if (object.isDirectionalLight) {
                        // Reduce directional light
                        object.intensity = 0.7;
                        console.log('&#128261; Reduced directional light intensity');
                    }
                }
            });
            
            // Add a subtle gray ambient light
            const grayLight = new THREE.AmbientLight(0x444444, 0.3);
            window.scene.add(grayLight);
        }
    }
    
    function addSombreOverlay() {
        // Create a semi-transparent overlay for additional atmospheric effect
        const overlay = document.createElement('div');
        overlay.id = 'sombre-overlay';
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            background: linear-gradient(to bottom, rgba(100,100,100,0.1) 0%, rgba(50,50,50,0.3) 100%);
            mix-blend-mode: multiply;
        `;
        
        // Add a subtle vignette effect
        const vignette = document.createElement('div');
        vignette.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
            box-shadow: inset 0 0 100px rgba(0,0,0,0.5);
        `;
        
        document.body.appendChild(overlay);
        document.body.appendChild(vignette);
        
        console.log('&#9989; Added sombre overlay effects');
    }
})();