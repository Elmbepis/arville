// animation-controller.js - Smart animation management for GLB models

class AnimationController {
    constructor() {
        this.animatedModels = new Set();
        this.modelMixers = new Map();
        this.maxAnimatedModels = 3;
        this.initialized = false;
        
        console.log('&#127916; Animation Controller initialized');
    }

    // Register a model with animations
    registerModel(modelGroup, mixer) {
        if (!mixer) return;
        
        this.modelMixers.set(modelGroup, mixer);
        console.log(`&#9989; Registered: ${modelGroup.name}`);
        
        if (!this.initialized) {
            this.startUpdateLoop();
            this.initialized = true;
        }
    }

    // Remove a model
    unregisterModel(modelGroup) {
        if (this.modelMixers.has(modelGroup)) {
            const mixer = this.modelMixers.get(modelGroup);
            mixer.stopAllAction();
            this.modelMixers.delete(modelGroup);
            this.animatedModels.delete(modelGroup);
            console.log(`&#128465;&#65039; Unregistered: ${modelGroup.name}`);
        }
    }

    // Update which models should be animated based on camera
    update(camera) {
        if (this.modelMixers.size === 0) return;

        // Get models in front of camera, sorted by distance
        const modelsInFront = Array.from(this.modelMixers.keys())
            .map(model => {
                const modelPos = new THREE.Vector3();
                model.getWorldPosition(modelPos);
                
                const cameraPos = camera.position.clone();
                const cameraDirection = new THREE.Vector3();
                camera.getWorldDirection(cameraDirection);
                
                const toModel = new THREE.Vector3().subVectors(modelPos, cameraPos).normalize();
                const angle = toModel.angleTo(cameraDirection);
                const distance = modelPos.distanceTo(cameraPos);
                
                return { model, distance, angle, isInFront: angle < Math.PI / 2 };
            })
            .filter(data => data.isInFront)
            .sort((a, b) => a.distance - b.distance)
            .slice(0, this.maxAnimatedModels)
            .map(data => data.model);

        const modelsToAnimate = new Set(modelsInFront);

        // Update animation states
        this.modelMixers.forEach((mixer, model) => {
            if (modelsToAnimate.has(model)) {
                if (!this.animatedModels.has(model)) {
                    console.log(`&#9654;&#65039; Animating: ${model.name}`);
                    this.animatedModels.add(model);
                }
                mixer.timeScale = 1.0; // Play animation
            } else {
                if (this.animatedModels.has(model)) {
                    console.log(`&#9208;&#65039; Pausing: ${model.name}`);
                    this.animatedModels.delete(model);
                }
                mixer.timeScale = 0.0; // Pause animation
            }
        });
    }

    // Update animation mixers (call with deltaTime)
    updateMixers(deltaTime) {
        this.animatedModels.forEach(model => {
            const mixer = this.modelMixers.get(model);
            if (mixer) mixer.update(deltaTime);
        });
    }

    // Start the update loop
    startUpdateLoop() {
        const animate = (time) => {
            requestAnimationFrame(animate);
            const deltaTime = Math.min(0.1, (time - this.lastTime) / 1000);
            this.lastTime = time;
            this.updateMixers(deltaTime);
        };
        
        this.lastTime = performance.now();
        animate(this.lastTime);
        console.log('&#128260; Animation update loop started');
    }

    // Get currently animated models
    getAnimatedModels() {
        return Array.from(this.animatedModels).map(m => m.name);
    }

    // Clear all
    clear() {
        this.modelMixers.forEach(mixer => mixer.stopAllAction());
        this.modelMixers.clear();
        this.animatedModels.clear();
        console.log('&#129529; Cleared all animations');
    }
}

// Global instance
window.animationController = new AnimationController();

// Simplified GLB model creator
window.createGLBModel = function(modelPath, x = 0, y = 0, z = 0, rotation = 0) {
    const modelGroup = new THREE.Group();
    modelGroup.name = `glb-${modelPath.split('/').pop().split('.')[0]}`;
    
    console.log(`&#128229; Loading: ${modelPath}`);
    
    if (typeof THREE.GLTFLoader === 'undefined') {
        console.error('&#10060; THREE.GLTFLoader not available');
        return modelGroup;
    }

    const loader = new THREE.GLTFLoader();
    
    loader.load(modelPath, (gltf) => {
        console.log(`&#9989; Loaded: ${modelPath}`);
        
        const model = gltf.scene;
        modelGroup.add(model);
        modelGroup.position.set(x, y, z);
        modelGroup.rotation.y = rotation;

        // Setup animations if available
        if (gltf.animations.length > 0) {
            const mixer = new THREE.AnimationMixer(model);
            
            // Play first animation by default
            const action = mixer.clipAction(gltf.animations[0]);
            action.play();
            
            // Register with animation controller
            window.animationController.registerModel(modelGroup, mixer);
            
            console.log(`&#127917; Animations: ${gltf.animations.length} found`);
        }

        // Setup shadows
        model.traverse(child => {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = true;
            }
        });
    }, 
    (xhr) => {
        if (xhr.total > 0) {
            const percent = (xhr.loaded / xhr.total) * 100;
            console.log(`&#128202; Loading: ${percent.toFixed(1)}%`);
        }
    }, 
    (error) => {
        console.error(`&#10060; Load failed: ${modelPath}`, error);
    });

    return modelGroup;
};

console.log('&#10003; animation-controller.js loaded - Smart animation management ready');