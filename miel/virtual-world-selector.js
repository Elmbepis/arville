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
            'playground': {
                name: 'ARville Playground',
                image: 'vw-playground.jpg',
                link: '../village2.htm?id=6'
            },
            'cetacean': {
                name: 'Cetacean Cove',
                image: 'vw-cetacean.jpg',
                link: '../nature.htm?id=6'
            },
            'taiga': {
                name: 'Taiga Hinterland',
                image: 'vw-taiga.jpg',
                link: '../nature.htm?id=7'
            },
            'castle': {
                name: 'Small Medieval Castle',
                image: 'vw-castle.jpg',
                link: '../village2.htm?id=5'
            },
            'alien planet': {
                name: 'Alien Planet',
                image: 'vw-alien-planet.jpg',
                link: '../village2.htm?id=16'
            },
            'meadow': {
                name: 'Butterfly Meadow',
                image: 'vw-meadow.jpg',
                link: '../nature.htm?id=9'
            },
            'desert': {
                name: 'Desert Village',
                image: 'vw-desert.jpg',
                link: '../village2.htm?id=9'
            },
            'campsite': {
                name: 'ARville Scouting Camp',
                image: 'vw-campsite.jpg',
                link: '../village2.htm?id=4'
            },
            'fairyland': {
                name: 'Fuchsia Fairyland',
                image: 'vw-fairyland.jpg',
                link: '../village2.htm?id=12'
            },
            'taj mahal': {
                name: 'Virtual Taj Mahal',
                image: 'vw-taj-mahal.jpg',
                link: '../village2.htm?id=11'
            },
            'futuristic': {
                name: 'Futuristic City',
                image: 'vw-futuristic.jpg',
                link: '../village2.htm?id=14'
            },
            'freshwater': {
                name: 'Freshwater Fiefdom',
                image: 'vw-freshwater.jpg',
                link: '../nature.htm?id=8'
            },
            'gnome': {
                name: 'Red Gnome Treasure Patrol',
                image: 'vw-gnome.jpg',
                link: '../village2.htm?id=13'
            },
            'food court': {
                name: 'Food Court Face-Off',
                image: 'vw-food-court.jpg',
                link: '../village2.htm?id=15'
            },
            'beatbox': {
                name: 'Beatbox Toon Town',
                image: 'vw-beatbox.jpg',
                link: '../village2.htm?id=10'
            },
            'motor stop': {
                name: 'ARville Motor Stop',
                image: 'vw-motor-stop.jpg',
                link: '../village2.htm?id=7'
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
        
        // Only add hidden inputs if not in display-only mode
        if (!this.options.displayOnly) {
            // Remove any existing hidden inputs with these IDs
            const existingKeyInput = document.getElementById('virtualWorldKey');
            const existingNameInput = document.getElementById('virtualWorldName');
            const existingLinkInput = document.getElementById('virtualWorldLink');
            
            if (existingKeyInput) existingKeyInput.remove();
            if (existingNameInput) existingNameInput.remove();
            if (existingLinkInput) existingLinkInput.remove();
            
            // Create hidden input for the KEY
            const keyInput = document.createElement('input');
            keyInput.type = 'hidden';
            keyInput.name = 'virtual_world_key';
            keyInput.id = 'virtualWorldKey';
            keyInput.value = this.selectedWorld;
            container.parentNode.appendChild(keyInput);
            
            // Create hidden input for the NAME/TITLE
            const nameInput = document.createElement('input');
            nameInput.type = 'hidden';
            nameInput.name = 'virtual_world_name';
            nameInput.id = 'virtualWorldName';
            nameInput.value = this.worlds[this.selectedWorld] ? this.worlds[this.selectedWorld].name : '';
            container.parentNode.appendChild(nameInput);
            
            // Create hidden input for the LINK
            const linkInput = document.createElement('input');
            linkInput.type = 'hidden';
            linkInput.name = 'virtual_world_link';
            linkInput.id = 'virtualWorldLink';
            linkInput.value = this.worlds[this.selectedWorld] ? this.worlds[this.selectedWorld].link : '';
            container.parentNode.appendChild(linkInput);
        }
    }
    
    attachEvents() {
        const container = document.getElementById(this.options.containerId);
        if (!container) return;
        
        const worldOptions = container.querySelectorAll('.world-option');
        const keyInput = document.getElementById('virtualWorldKey');
        const nameInput = document.getElementById('virtualWorldName');
        const linkInput = document.getElementById('virtualWorldLink');
        
        worldOptions.forEach(option => {
            option.addEventListener('click', (e) => {
                // Don't trigger if clicking the link
                if (e.target.closest('.see-world-link')) return;
                
                const worldKey = option.dataset.world;
                const worldData = this.worlds[worldKey];
                
                // Remove selected class from all options
                worldOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                option.classList.add('selected');
                
                // Update selected world
                this.selectedWorld = worldKey;
                
                // Update all three hidden inputs
                if (keyInput) {
                    keyInput.value = worldKey;
                }
                
                if (nameInput) {
                    nameInput.value = worldData.name;
                }
                
                if (linkInput) {
                    linkInput.value = worldData.link;
                }
                
                // Trigger callback if provided - passing key and full world data
                if (typeof this.options.onWorldChange === 'function') {
                    this.options.onWorldChange(worldKey, worldData);
                }
            });
        });
    }
    
    // Method to get currently selected world (returns all data)
    getSelectedWorld() {
        return {
            key: this.selectedWorld,
            data: this.worlds[this.selectedWorld]
        };
    }
    
    // Method to get all world data as JSON
    getAllWorldData() {
        return {
            key: this.selectedWorld,
            name: this.worlds[this.selectedWorld]?.name || '',
            link: this.worlds[this.selectedWorld]?.link || '',
            image: this.worlds[this.selectedWorld]?.image || ''
        };
    }
    
    // Method to set selected world programmatically
    setSelectedWorld(worldKey) {
        if (this.worlds[worldKey]) {
            this.selectedWorld = worldKey;
            this.render(); // Re-render with new selection
            
            // Update all three hidden inputs
            const keyInput = document.getElementById('virtualWorldKey');
            const nameInput = document.getElementById('virtualWorldName');
            const linkInput = document.getElementById('virtualWorldLink');
            
            if (keyInput) {
                keyInput.value = worldKey;
            }
            
            if (nameInput) {
                nameInput.value = this.worlds[worldKey].name;
            }
            
            if (linkInput) {
                linkInput.value = this.worlds[worldKey].link;
            }
        }
    }
}