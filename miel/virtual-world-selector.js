/**
 * Virtual World Selector
 * A reusable component for selecting virtual worlds across multiple pages
 */

class VirtualWorldSelector {
    constructor(options = {}) {
        this.options = {
            containerId: options.containerId || 'virtual-world-selector-container',
            inputName: options.inputName || 'virtual_world',
            selectedWorld: options.selectedWorld || 'zoo',
            onWorldChange: options.onWorldChange || null,
            displayOnly: options.displayOnly || false,
            ...options
        };
        
        this.worlds = {
            'zoo': {
                name: 'ARville Zoo',
                image: 'vw-zoo.jpg',
                link: '../zoo1.htm'
            },
            'museum': {
                name: 'ARVille Museum',
                image: 'vw-museum.jpg',
                link: '../museum.htm?id=1'
            },
            'robot city': {
                name: 'Robot City',
                image: 'vw-robot-city.jpg',
                link: '../village.htm?id=4'
            },
            'ocean': {
                name: 'Shark Lair',
                image: 'vw-ocean.jpg',
                link: '../nature.htm?id=1'
            },
            'coral reef': {
                name: 'Rainbow Reef',
                image: 'vw-coral-reefs.jpg',
                link: '../nature.htm?id=3'
            },
            'farm': {
                name: 'Farm Village',
                image: 'vw-farm.jpg',
                link: '../village2.htm?id=1'
            },
            'raptor island': {
                name: 'Raptor Island',
                image: 'vw-raptor.jpg',
                link: '../nature.htm?id=2'
            },
            'toy world': {
                name: 'Toy World',
                image: 'vw-toy-world.jpg',
                link: '../village.htm?id=3'
            },
            'savanna': {
                name: 'African Savanna',
                image: 'vw-savanna.jpg',
                link: '../nature.htm?id=5'
            },
            'medieval square': {
                name: 'Medieval Square',
                image: 'vw-medieval-square.jpg',
                link: '../village2.htm?id=2'
            },
            'cave': {
                name: 'Cobra Cavern',
                image: 'vw-cave.jpg',
                link: '../nature.htm?id=4'
            },
            'mars': {
                name: 'Martian Settlement',
                image: 'vw-mars.jpg',
                link: '../village2.htm?id=8'
            },
        };
        
        this.selectedWorld = this.options.selectedWorld;
        this.init();
    }
    
    init() {
        this.render();
        if (!this.options.displayOnly) {
            this.attachEvents();
        }
    }
    
    render() {
        const container = document.getElementById(this.options.containerId);
        if (!container) {
            console.error(`Container with ID "${this.options.containerId}" not found`);
            return;
        }
        
        let html = `
            <div class="world-selector">
        `;
        
        for (const [key, world] of Object.entries(this.worlds)) {
            const isSelected = this.selectedWorld === key;
            const imagePath = `images/${world.image}`;
            
            html += `
                <div class="world-option ${isSelected ? 'selected' : ''}" data-world="${key}">
                    <div class="world-thumbnail">
                        <img src="${imagePath}" alt="${world.name}" 
                             onerror="this.onerror=null; this.src='images/default-world.jpg';">
                    </div>
                    <div class="world-info">
                        <h3>${world.name}</h3>
                        <a href="${world.link}" target="_blank" class="see-world-link" onclick="event.stopPropagation();">
                            <i class="fas fa-external-link-alt"></i> See World
                        </a>
                    </div>
                </div>
            `;
        }
        
        html += `</div>`;
        
        container.innerHTML = html;
        
        // Only add hidden input if not in display-only mode
        if (!this.options.displayOnly && !document.getElementById('virtualWorld')) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = this.options.inputName;
            hiddenInput.id = 'virtualWorld';
            hiddenInput.value = this.selectedWorld;
            container.parentNode.appendChild(hiddenInput);
        }
    }
    
    attachEvents() {
        const container = document.getElementById(this.options.containerId);
        if (!container) return;
        
        const worldOptions = container.querySelectorAll('.world-option');
        const hiddenInput = document.getElementById('virtualWorld');
        
        worldOptions.forEach(option => {
            option.addEventListener('click', (e) => {
                // Don't trigger if clicking the link
                if (e.target.closest('.see-world-link')) return;
                
                const worldKey = option.dataset.world;
                
                // Remove selected class from all options
                worldOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                option.classList.add('selected');
                
                // Update hidden input
                if (hiddenInput) {
                    hiddenInput.value = worldKey;
                }
                
                // Update selected world
                this.selectedWorld = worldKey;
                
                // Trigger callback if provided
                if (typeof this.options.onWorldChange === 'function') {
                    this.options.onWorldChange(worldKey, this.worlds[worldKey]);
                }
            });
        });
    }
    
    // Method to get currently selected world
    getSelectedWorld() {
        return {
            key: this.selectedWorld,
            data: this.worlds[this.selectedWorld]
        };
    }
    
    // Method to set selected world programmatically
    setSelectedWorld(worldKey) {
        if (this.worlds[worldKey]) {
            this.selectedWorld = worldKey;
            this.render(); // Re-render with new selection
        }
    }
}