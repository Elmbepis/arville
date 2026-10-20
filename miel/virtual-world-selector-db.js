/**
 * Virtual World Selector — DATABASE-DRIVEN WORLDS ONLY
 *
 * Load AFTER virtual-world-selector.js:
 *   <script src="virtual-world-selector.js"></script>
 *   <script src="virtual-world-selector-db.js"></script>
 *
 * Extends VirtualWorldSelector with DB-driven entries only.
 * Paths are relative to miel/ (the folder this file sits in).
 */

class VirtualWorldSelectorDB extends VirtualWorldSelector {
    constructor(options = {}) {
        // Parent renders 29 originals + attaches events. We override both.
        // Passing displayOnly:true prevents the parent from attaching events
        // to elements we're about to destroy.
        super({ ...options, displayOnly: true });

        this.worlds = {
            // =========================================================
            // NATURE WORLDS
            // =========================================================
            'ocean db': {
                name: 'Shark Lair DB',
                image: 'vw-ocean.jpg',
                link: 'scenes/world-db.htm?type=nature&id=1'
            },
            'coral reef db': {
                name: 'Rainbow Reef DB',
                image: 'vw-coral-reefs.jpg',
                link: 'scenes/world-db.htm?type=nature&id=3'
            },
            'cave db': {
                name: 'Cobra Cavern DB',
                image: 'vw-cave.jpg',
                link: 'scenes/world-db.htm?type=nature&id=4'
            },
            'savanna db': {
                name: 'African Savanna DB',
                image: 'vw-savanna.jpg',
                link: 'scenes/world-db.htm?type=nature&id=5'
            },
            'cetacean db': {
                name: 'Cetacean Cove DB',
                image: 'vw-cetacean.jpg',
                link: 'scenes/world-db.htm?type=nature&id=6'
            },
            'taiga db': {
                name: 'Taiga Hinterland DB',
                image: 'vw-taiga.jpg',
                link: 'scenes/world-db.htm?type=nature&id=7'
            },
            'freshwater db': {
                name: 'Freshwater Fiefdom DB',
                image: 'vw-freshwater.jpg',
                link: 'scenes/world-db.htm?type=nature&id=8'
            },
            'meadow db': {
                name: 'Butterfly Meadow DB',
                image: 'vw-meadow.jpg',
                link: 'scenes/world-db.htm?type=nature&id=9'
            },
            'raptor island 1 db': {
                name: 'Raptor Island 1 DB',
                image: 'vw-raptor1.jpg',
                link: 'scenes/world-db.htm?type=nature&id=10'
            },
            'raptor island 2 db': {
                name: 'Raptor Island 2 DB',
                image: 'vw-raptor2.jpg',
                link: 'scenes/world-db.htm?type=nature&id=11'
            },

            // =========================================================
            // VILLAGE2 WORLDS
            // =========================================================
            'farm db': {
                name: 'Farm Village DB',
                image: 'vw-farm.jpg',
                link: 'scenes/world-db.htm?type=village2&id=1'
            },
            'medieval square db': {
                name: 'Medieval Square DB',
                image: 'vw-medieval-square.jpg',
                link: 'scenes/world-db.htm?type=village2&id=2'
            },
            'campsite db': {
                name: 'ARville Scouting Camp DB',
                image: 'vw-campsite.jpg',
                link: 'scenes/world-db.htm?type=village2&id=4'
            },
            'castle db': {
                name: 'Small Medieval Castle DB',
                image: 'vw-castle.jpg',
                link: 'scenes/world-db.htm?type=village2&id=5'
            },
            'playground db': {
                name: 'ARville Playground DB',
                image: 'vw-playground.jpg',
                link: 'scenes/world-db.htm?type=village2&id=6'
            },
            'motor stop db': {
                name: 'ARville Motor Stop DB',
                image: 'vw-motor-stop.jpg',
                link: 'scenes/world-db.htm?type=village2&id=7'
            },
            'mars db': {
                name: 'Martian Settlement DB',
                image: 'vw-mars.jpg',
                link: 'scenes/world-db.htm?type=village2&id=8'
            },
            'desert db': {
                name: 'Desert Village DB',
                image: 'vw-desert.jpg',
                link: 'scenes/world-db.htm?type=village2&id=9'
            },
            'beatbox db': {
                name: 'Beatbox Toon Town DB',
                image: 'vw-beatbox.jpg',
                link: 'scenes/world-db.htm?type=village2&id=10'
            },
            'taj mahal db': {
                name: 'Virtual Taj Mahal DB',
                image: 'vw-taj-mahal.jpg',
                link: 'scenes/world-db.htm?type=village2&id=11'
            },
            'fairyland db': {
                name: 'Fuchsia Fairyland DB',
                image: 'vw-fairyland.jpg',
                link: 'scenes/world-db.htm?type=village2&id=12'
            },
            'gnome db': {
                name: 'Red Gnome Treasure Patrol DB',
                image: 'vw-gnome.jpg',
                link: 'scenes/world-db.htm?type=village2&id=13'
            },
            'futuristic db': {
                name: 'Futuristic City DB',
                image: 'vw-futuristic.jpg',
                link: 'scenes/world-db.htm?type=village2&id=14'
            },
            'food court db': {
                name: 'Food Court Face-Off DB',
                image: 'vw-food-court.jpg',
                link: 'scenes/world-db.htm?type=village2&id=15'
            },
            'alien planet db': {
                name: 'Alien Planet DB',
                image: 'vw-alien-planet.jpg',
                link: 'scenes/world-db.htm?type=village2&id=16'
            },

            // =========================================================
            // VILLAGE WORLDS
            // =========================================================
            'toy world db': {
                name: 'Toy World DB',
                image: 'vw-toy-world.jpg',
                link: 'scenes/world-db.htm?type=village&id=3'
            },
            'robot city db': {
                name: 'Robot City DB',
                image: 'vw-robot-city.jpg',
                link: 'scenes/world-db.htm?type=village&id=4'
            },

            // =========================================================
            // OTHER
            // =========================================================
            'zoo db': {
                name: 'ARville Zoo DB',
                image: 'vw-zoo.jpg',
                link: 'scenes/world-db.htm?type=zoo&id=1'
            },
            'museum db': {
                name: 'ARVille Museum DB',
                image: 'vw-museum.jpg',
                link: 'scenes/world-db.htm?type=museum&id=1'
            },
        };

        this.selectedWorld = options.selectedWorld || 'coral reef db';

        // Restore the caller's real displayOnly flag
        this.options.displayOnly = options.displayOnly || false;

        // Render DB tiles and rebind
        this.render();
        if (!this.options.displayOnly) {
            this.attachEvents();
        }
    }
}