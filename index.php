<?php

//Preload mouseover icons
//Preload mouseover icons
echo "<script>
        function preloadImages() {
            const images = [
                // Large category hover images
                'images/candyland2.jpg',
                'images/zombiezone2.jpg',
                'images/toyworld2.jpg',
                'images/robotcity2.jpg',
                
                // Small category hover images
                'images/zoo1b.jpg',
                'images/park1b.jpg',
                'images/museum1b.jpg',
                'images/raptor1b.jpg',
                'images/sharkb.jpg',
                'images/reef1b.jpg',
                'images/farmb.jpg',
                'images/medievalb.jpg',
                'images/mallb.jpg',
                'images/caveb.jpg',
                'images/playgroundb.jpg',
                'images/savannab.jpg',
                'images/cetaceanb.jpg',
                'images/campb.jpg',
                'images/castleb.jpg',
                'images/gas-stnb.jpg',
                'images/marsb.jpg',
                'images/taigab.jpg',
                'images/desertb.jpg',
                'images/fw-pondb.jpg',
                'images/meadowb.jpg',
                'images/beatboxb.jpg',
                'images/tajmahalb.jpg',
                'images/fairylandb.jpg',
                'images/gnomeb.jpg',
                'images/futuristicb.jpg',
                'images/foodb.jpg',
                'images/alienb.jpg',
                'images/room11b.jpg',
                'images/room12b.jpg',
                'images/room13b.jpg',
                'images/yard1b.jpg',
                'images/yard2b.jpg',
                'images/yard3b.jpg'
            ];
            
            console.log('Preloading ' + images.length + ' hover images...');
            
            images.forEach((src) => {
                const img = new Image();
                img.src = src;
                // Optional: Log any images that fail to load
                img.onerror = function() {
                    console.warn('Failed to preload image:', src);
                };
            });
        }

        // Call the preloadImages function when the document is ready
        window.addEventListener('DOMContentLoaded', preloadImages);
    </script>";
                
// Responsive homepage structure for ARville Network with Bootstrap integration
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "    <meta charset='UTF-8'>";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "    <title>ARville - The Ultimate Online XR Network</title>";
echo "    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>";
echo "</head>";
echo "<body>";

// Navbar Section
echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
echo "    <div class='container'>";
echo "        <a class='navbar-brand' href='index.php'>";
echo "            <img src='images/logo.jpg' alt='ARville Network' width='200' class='d-inline-block align-text-top'>";
echo "            ";
echo "        </a>";
echo "        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
echo "            <span class='navbar-toggler-icon'></span>";
echo "        </button>";
echo "        <div class='collapse navbar-collapse' id='navbarNav'>";
echo "            <ul class='navbar-nav ms-auto'>";
echo "                <li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='plans.php'>Plans</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='miel/login.php'>MIEL</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='about-us.php'>About Us</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='contact.php'>Contact</a></li>";
echo "            </ul>";
echo "    </div>";
echo "</nav>";

// Hero Section
echo "<header class='hero text-center py-5 bg-primary text-white'>";
echo "    <div class='container'>";
echo "        <h1 class='display-4 hero-title'>Step into the World of ARville:<br/>Where Education, Business, and Entertainment Become Immersive</h1>";
echo "        <p class='lead hero-subtitle'>Explore magical online Extended Reality (XR) experiences or avail of our web XR offerings to promote your school or business.</p>";
echo "    </div>";
echo "</header>";

echo "<style>";
echo "    .hero-title {";
echo "        font-size: 2.9rem;";
echo "    }";
echo "    .hero-subtitle {";
echo "        font-size: 1.5rem;";
echo "    }";
echo "    .hero-btn {";
echo "        font-size: 1rem;";
echo "    }";
echo "    @media (max-width: 768px) {";
echo "        .hero-title {";
echo "            font-size: 2rem;";
echo "        }";
echo "        .hero-subtitle {";
echo "            font-size: 1rem;";
echo "        }";
echo "        .hero-btn {";
echo "            font-size: 0.875rem;";
echo "        }";
echo "    }";
echo "    @media (max-width: 576px) {";
echo "        .hero-title {";
echo "            font-size: 1.5rem;";
echo "        }";
echo "        .hero-subtitle {";
echo "            font-size: 0.875rem;";
echo "        }";
echo "        .hero-btn {";
echo "            font-size: 0.75rem;";
echo "        }";
echo "    }";
echo "</style>";

echo "<style>";
echo "    .btn-outline-light {";
echo "        color: #ffffff;";
echo "        background-color: transparent;";
echo "        border: 2px solid #ffffff;";
echo "    }";
echo "    .btn-outline-light:hover {";
echo "        background-color: #ffffff;";
echo "        color: #000;";
echo "        transition: background-color 0.3s, color 0.3s;";
echo "    }";
echo "</style>";

// LARGE IMAGES SECTION - 2 columns, 2 rows (4 total) - SMALLER HORIZONTAL SPACING, LARGER VERTICAL SPACING
echo "<section class='large-images py-5' id='large-images'>";
echo "    <div class='container'>";
echo "        <h2 class='text-center mb-4'>Featured Web XR Experiences by ARville</h2>";
echo "        <div style='height: 20px;'></div>"; // Spacer element
echo "        <div class='row gx-2 gy-5'>"; // CHANGED: gx-2 (small horizontal gap), gy-4 (large vertical gap)

$largeCategories = [
    ["title" => "Candy Land", "tagline" => "A sweet paradise of sugary delights and colorful confections", "icon" => "candyland.jpg", "hoverIcon" => "candyland2.jpg", "link" => "village.htm?id=1"],
    ["title" => "Zombie Zone", "tagline" => "A bloodcurdling necropolis ruled by the walking dead", "icon" => "zombiezone.jpg", "hoverIcon" => "zombiezone2.jpg", "link" => "village.htm?id=2"],
    ["title" => "Toy World", "tagline" => "A magical realm where toys come to life and adventures begin", "icon" => "toyworld.jpg", "hoverIcon" => "toyworld2.jpg", "link" => "village.htm?id=3"],
	["title" => "Robot City", "tagline" => "A futuristic community of intelligent machines and robots", "icon" => "robotcity.jpg", "hoverIcon" => "robotcity2.jpg", "link" => "village.htm?id=4"],
];

// Display only first 4 as large landscape images
for ($i = 0; $i < 4; $i++) {
    $category = $largeCategories[$i];
    echo "<div class='col-lg-6 col-md-6 col-12'>"; // 2 columns on large, 1 column on mobile (col-12)
    echo "    <div class='large-category text-center'>";
    echo "        <a href='{$category['link']}'>";
    echo "            <img src='images/{$category['icon']}' class='large-category-icon img-fluid mb-1' alt='{$category['title']}' style='width: 92%; max-width: 480px; height: 280px; object-fit: cover; border-radius: 10px;' data-original-src='images/{$category['icon']}' data-hover-src='images/{$category['hoverIcon']}'>";
    echo "        </a>";
    echo "        <h3 style='margin-top: 10px; font-size: 1.4rem;'>{$category['title']}</h3>";
    echo "        <p style='max-width: 480px; margin: -5px auto; font-size: 1rem;'>{$category['tagline']}</p>";
    echo "    </div>";
    echo "</div>";
}

echo "        </div>";
echo "    </div>";
echo "</section>";

echo "<section class='small-images py-5' id='small-images' style='background-color: #f8f9fa;'>";
echo "    <div class='container'>";
echo "        <h2 class='text-center mb-4'>More ARville XR Experiences for You to Explore</h2>";
echo "        <div style='height: 30px;'></div>";
echo "        <div class='row g-4'>"; // Keep g-4 for small images

// SEPARATE ARRAY FOR SMALL IMAGES - Fantasy/XR experience themes
$smallCategories = [
    ["title" => "ARville Zoo", "tagline" => "A wildlife wonderland where every creature captivates imagination", "icon" => "zoo1a.jpg", "hoverIcon" => "zoo1b.jpg", "link" => "zoo1.htm"],
    ["title" => "ARville Forest Park", "tagline" => "A serene sanctuary where wilderness meets curated beauty", "icon" => "park1a.jpg", "hoverIcon" => "park1b.jpg", "link" => "park1.htm"],
    ["title" => "ARville Museum of Fine Arts", "tagline" => "A gathering of the greatest masterpieces in human history", "icon" => "museum1a.jpg", "hoverIcon" => "museum1b.jpg", "link" => "museum.htm?id=1"],
    ["title" => "Raptor Island 1", "tagline" => "Where dinosaurs roam once again", "icon" => "raptor1a.jpg", "hoverIcon" => "raptor1b.jpg", "link" => "nature.htm?id=2"],
    ["title" => "Shark Lair", "tagline" => "Where ocean's chondrichthyan predators live", "icon" => "sharka.jpg", "hoverIcon" => "sharkb.jpg", "link" => "nature.htm?id=1"],
    ["title" => "Rainbow Reef", "tagline" => "A vibrant undersea paradise of colorful creatures", "icon" => "reef1a.jpg", "hoverIcon" => "reef1b.jpg", "link" => "nature.htm?id=3"],
    ["title" => "Arville Farm", "tagline" => "A harvest haven where students explore the world of farming", "icon" => "farma.jpg", "hoverIcon" => "farmb.jpg", "link" => "village2.htm?id=1"],
    ["title" => "Medieval Square", "tagline" => "A 15th century community bustling with cobbled commerce", "icon" => "medievala.jpg", "hoverIcon" => "medievalb.jpg", "link" => "village2.htm?id=2"],
    ["title" => "Martian Settlement", "tagline" => "A glimpse of how pioneering humans will soon settle on the rusty soil of Mars", "icon" => "marsa.jpg", "hoverIcon" => "marsb.jpg", "link" => "village2.htm?id=8"],
    ["title" => "Small Medieval Castle", "tagline" => "A fortress of stone where echoes of the past still linger", "icon" => "castlea.jpg", "hoverIcon" => "castleb.jpg", "link" => "village2.htm?id=5"],
    ["title" => "Cobra Cavern", "tagline" => "A cave where niche-dwelling animals compete for survival", "icon" => "cavea.jpg", "hoverIcon" => "caveb.jpg", "link" => "nature.htm?id=4"],
    ["title" => "ARville Playground", "tagline" => "A kaleidoscope of playful fun and memories where your curiosity runs free", "icon" => "playgrounda.jpg", "hoverIcon" => "playgroundb.jpg", "link" => "village2.htm?id=6"],
    ["title" => "African Savanna", "tagline" => "A sun-kissed grassland where the great circle of life unfolds", "icon" => "savannaa.jpg", "hoverIcon" => "savannab.jpg", "link" => "nature.htm?id=5"],
    ["title" => "Alien Planet", "tagline" => "A purple landscape where humanoid aliens roam in peaceful mystery", "icon" => "aliena.jpg", "hoverIcon" => "alienb.jpg", "link" => "village2.htm?id=16"],
    ["title" => "ARville Scouting Camp", "tagline" => "A piece of virtual wilderness where your magical outdoor adventures never end", "icon" => "campa.jpg", "hoverIcon" => "campb.jpg", "link" => "village2.htm?id=4"],
    ["title" => "Desert Village", "tagline" => "Where humble stone dwellings bear witness to life lived on sun-scorched sand", "icon" => "deserta.jpg", "hoverIcon" => "desertb.jpg", "link" => "village2.htm?id=9"],
    ["title" => "70s Suburban Strip Mall", "tagline" => "Your portal to vintage vibes and classic convenience, preserved in time", "icon" => "malla.jpg", "hoverIcon" => "mallb.jpg", "link" => "village2.htm?id=3"],
    ["title" => "Taiga Hinterland", "tagline" => "Where log cabins nestle among pines and wolves roam the frozen terrain", "icon" => "taigaa.jpg", "hoverIcon" => "taigab.jpg", "link" => "nature.htm?id=7"],
    ["title" => "ARville Motor Stop", "tagline" => "A friendly neighborhood spot where thirsty giants roll in to fill up", "icon" => "gas-stna.jpg", "hoverIcon" => "gas-stnb.jpg", "link" => "village2.htm?id=7"],
    ["title" => "Butterfly Meadow", "tagline" => "A sunlit field where blue butterflies waltz with wildflowers from dawn to dusk", "icon" => "meadowa.jpg", "hoverIcon" => "meadowb.jpg", "link" => "nature.htm?id=9"],
    ["title" => "Food Court Face-Off", "tagline" => "A flavor-packed arena where indulgence competes with nutrition", "icon" => "fooda.jpg", "hoverIcon" => "foodb.jpg", "link" => "village2.htm?id=15"],
    ["title" => "Freshwater Fiefdom", "tagline" => "Where monster fish reign among lush emerald gardens", "icon" => "fw-ponda.jpg", "hoverIcon" => "fw-pondb.jpg", "link" => "nature.htm?id=8"],
    ["title" => "Virtual Taj Mahal", "tagline" => "A monument of love, reimagined in pixels for all the world to see", "icon" => "tajmahala.jpg", "hoverIcon" => "tajmahalb.jpg", "link" => "village2.htm?id=11"],
    ["title" => "Fuschia Fairyland", "tagline" => "A dazzling realm where pink fairies flit in a wonderland of colors", "icon" => "fairylanda.jpg", "hoverIcon" => "fairylandb.jpg", "link" => "village2.htm?id=12"],
    ["title" => "Red Gnome Treasure Patrol", "tagline" => "Where chests of gold rest under the watch of red warrior gnomes", "icon" => "gnomea.jpg", "hoverIcon" => "gnomeb.jpg", "link" => "village2.htm?id=13"],
    ["title" => "Beatbox Toon Town", "tagline" => "A whimsical world where magical objects unlock rhythmic loops for musical vibes", "icon" => "beatboxa.jpg", "hoverIcon" => "beatboxb.jpg", "link" => "village2.htm?id=10"],
    ["title" => "Cetacean Cove", "tagline" => "A deep blue sanctuary where ocean giants find shelter", "icon" => "cetaceana.jpg", "hoverIcon" => "cetaceanb.jpg", "link" => "nature.htm?id=6"],
    ["title" => "Futuristic City", "tagline" => "A gleaming metropolis where neon lights dazzle and vehicles defy gravity", "icon" => "futuristica.jpg", "hoverIcon" => "futuristicb.jpg", "link" => "village2.htm?id=14"],
    ];

for ($i = 0; $i < 28; $i++) {
    $category = $smallCategories[$i];
    echo "<div class='col-lg-3 col-md-6 col-6'>"; // 4 columns on large, 2 columns on mobile (col-6)
    echo "    <div class='small-category text-center'>";
    echo "        <a href='{$category['link']}'>";
    echo "            <img src='images/{$category['icon']}' class='small-category-icon img-fluid mb-2' alt='{$category['title']}' style='width: 220px; height: 220px; object-fit: cover; border-radius: 10px;' data-original-src='images/{$category['icon']}' data-hover-src='images/{$category['hoverIcon']}'>";
    echo "        </a>";
    echo "        <h4 style='font-size: 1.2rem; margin-top: 8px;'>{$category['title']}</h4>";
    echo "        <p style='font-size: 0.95rem; margin-top: 4px;'>{$category['tagline']}</p>";
    echo "    </div>";
    echo "</div>";
}

echo "        </div>";
echo "    </div>";
echo "</section>";

// MINI XR EXPERIENCES SECTION - New third section with 5 columns and 3 columns on mobile
echo "<section class='mini-xr-experiences py-5' id='mini-xr-experiences' style='background-color: #ffffff;'>";
echo "    <div class='container'>";
echo "        <h2 class='text-center mb-4'>Mini XR Experiences for Bite-Size Fun</h2>";
echo "        <div style='height: 30px;'></div>";
echo "        <div class='row g-4'>";

$miniExperiences = [
    ["title" => "Creepy Room Fun", "tagline" => "Vampirette and Witch dancing on the floor of a haunted mansion", "icon" => "room11a.jpg", "hoverIcon" => "room11b.jpg", "link" => "room.htm?id=11"],
    ["title" => "Spooky Dungeon Riot", "tagline" => "Clown and Scarecrow dancing in a cold underground cell", "icon" => "room12a.jpg", "hoverIcon" => "room12b.jpg", "link" => "room.htm?id=12"],
    ["title" => "Secret Attic Frolic", "tagline" => "Zombie and Zombiette dancing among forgotten treasures", "icon" => "room13a.jpg", "hoverIcon" => "room13b.jpg", "link" => "room.htm?id=13"],
    ["title" => "Full Moon Merriment", "tagline" => "Wolfie and Pumpkin dancing on moonlit grass", "icon" => "yard1a.jpg", "hoverIcon" => "yard1b.jpg", "link" => "yard.htm?id=1"],
    ["title" => "Shadowy Sideshow", "tagline" => "Teddy and Frankie dancing on cracked, parched ground", "icon" => "yard3a.jpg", "hoverIcon" => "yard3b.jpg", "link" => "yard.htm?id=3"],
    ["title" => "Lava-hot Jamboree", "tagline" => "Redhot and Bones dancing over steaming stones", "icon" => "yard2a.jpg", "hoverIcon" => "yard2b.jpg", "link" => "yard.htm?id=2"],
];

for ($i = 0; $i < 6; $i++) {
    $experience = $miniExperiences[$i];
    echo "<div class='col-lg-15 col-md-4 col-4'>"; // 5 columns on large, 3 columns on mobile (col-4)
    echo "    <div class='mini-experience text-center'>";
    echo "        <a href='{$experience['link']}'>";
    echo "            <img src='images/{$experience['icon']}' class='mini-experience-icon img-fluid mb-2' alt='{$experience['title']}' style='width: 180px; height: 180px; object-fit: cover; border-radius: 10px;' data-original-src='images/{$experience['icon']}' data-hover-src='images/{$experience['hoverIcon']}'>";
    echo "        </a>";
    echo "        <h4 style='font-size: 1.1rem; margin-top: 8px;'>{$experience['title']}</h4>";
    echo "        <p style='font-size: 0.9rem; margin-top: 4px;'>{$experience['tagline']}</p>";
    echo "    </div>";
    echo "</div>";
}

echo "        </div>";
echo "    </div>";
echo "</section>";

// Mouseover script for all images
echo "<script>";
echo "    document.querySelectorAll('.large-category-icon, .small-category-icon, .mini-experience-icon').forEach(function(img) {";
echo "        img.addEventListener('mouseover', function() {";
echo "            this.src = this.getAttribute('data-hover-src');";
echo "        });";
echo "        img.addEventListener('mouseout', function() {";
echo "            this.src = this.getAttribute('data-original-src');";
echo "        });";
echo "    });";
echo "</script>";

// Responsive styling for mobile
echo "<style>";
echo "    /* Custom 5-column layout for large screens */";
echo "    .col-lg-15 {";
echo "        flex: 0 0 20%;";
echo "        max-width: 20%;";
echo "    }";
echo "    ";
echo "    /* Large images responsive adjustments */";
echo "    @media (max-width: 1200px) {";
echo "        .large-category-icon {";
echo "            width: 95% !important;";
echo "            max-width: 420px !important;";
echo "            height: 260px !important;";
echo "        }";
echo "    }";
echo "    @media (max-width: 992px) {";
echo "        .large-category-icon {";
echo "            width: 90% !important;";
echo "            max-width: 380px !important;";
echo "            height: 240px !important;";
echo "        }";
echo "        .large-category h3 {";
echo "            font-size: 1.3rem !important;";
echo "        }";
echo "        /* Reset 5-column to 4 columns on medium screens */";
echo "        .col-lg-15 {";
echo "            flex: 0 0 25%;";
echo "            max-width: 25%;";
echo "        }";
echo "    }";
echo "    @media (max-width: 768px) {";
echo "        .large-category-icon {";
echo "            width: 95% !important;";
echo "            max-width: 350px !important;";
echo "            height: 210px !important;";
echo "        }";
echo "        .large-category h3 {";
echo "            font-size: 1.2rem !important;";
echo "        }";
echo "        .large-category p {";
echo "            font-size: 0.95rem !important;";
echo "            max-width: 90% !important;";
echo "        }";
echo "        /* Reset 5-column to 3 columns on tablets */";
echo "        .col-lg-15 {";
echo "            flex: 0 0 33.333%;";
echo "            max-width: 33.333%;";
echo "        }";
echo "    }";
echo "    @media (max-width: 576px) {";
echo "        .large-category-icon {";
echo "            width: 100% !important;";
echo "            max-width: 300px !important;";
echo "            height: 190px !important;";
echo "        }";
echo "        .large-category h3 {";
echo "            font-size: 1.1rem !important;";
echo "        }";
echo "        .large-category p {";
echo "            font-size: 0.9rem !important;";
echo "        }";
echo "        .col-lg-6 {";
echo "            margin-bottom: 30px;";
echo "        }";
echo "        /* 5-column becomes 3 columns on small screens (already set above) */";
echo "    }";
echo "    ";
echo "    /* Small images responsive adjustments */";
echo "    @media (max-width: 1200px) {";
echo "        .small-category-icon, .mini-experience-icon {";
echo "            width: 180px !important;";
echo "            height: 180px !important;";
echo "        }";
echo "    }";
echo "    @media (max-width: 992px) {";
echo "        .small-category-icon, .mini-experience-icon {";
echo "            width: 160px !important;";
echo "            height: 160px !important;";
echo "        }";
echo "        .small-category h4, .mini-experience h4 {";
echo "            font-size: 1.1rem !important;";
echo "        }";
echo "    }";
echo "    @media (max-width: 768px) {";
echo "        .small-category-icon, .mini-experience-icon {";
echo "            width: 140px !important;";
echo "            height: 140px !important;";
echo "        }";
echo "        .small-category h4, .mini-experience h4 {";
echo "            font-size: 1rem !important;";
echo "        }";
echo "        .small-category p, .mini-experience p {";
echo "            font-size: 0.9rem !important;";
echo "        }";
echo "    }";
echo "    @media (max-width: 576px) {";
echo "        .small-category-icon, .mini-experience-icon {";
echo "            width: 120px !important;";
echo "            height: 120px !important;";
echo "        }";
echo "        .small-category h4, .mini-experience h4 {";
echo "            font-size: 0.95rem !important;";
echo "        }";
echo "        .small-category p, .mini-experience p {";
echo "            font-size: 0.85rem !important;";
echo "        }";
echo "        .col-lg-3, .col-lg-15 {";
echo "            margin-bottom: 20px;";
echo "        }";
echo "    }";
echo "    @media (max-width: 480px) {";
echo "        .small-category-icon, .mini-experience-icon {";
echo "            width: 100px !important;";
echo "            height: 100px !important;";
echo "        }";
echo "        .small-category h4, .mini-experience h4 {";
echo "            font-size: 0.9rem !important;";
echo "        }";
echo "        .small-category p, .mini-experience p {";
echo "            font-size: 0.8rem !important;";
echo "        }";
echo "    }";
echo "</style>";

// About Section
echo "<section class='about py-5' id='about' style='background-color: #f2f2f2;'>"; 
echo "    <div class='container text-center'>";
echo "        <h2>What is ARville?</h2>";
echo "        <p class='lead'>ARville is an online ecosystem of netizens, businesses, and communities connected together by immersive XR experiences and innovative marketing and customer relationship tools.</p>";
echo "        <a href='learn-more.php' class='btn btn-primary btn-lg'>Learn More About ARville</a>";
echo "    </div>";
echo "</section>";
echo "        <div style='height: 30px;'></div>";
// Subscription Plans
echo "<section class='plans py-4' id='plans'>";
echo "    <div class='container'>";
echo "        <h2 class='text-center mb-4'>Plans to Suit Every Vision</h2>";
echo "        <div class='row g-4 align-items-stretch'>";

$plans = [
    [
        "name" => "Silver Plan", 
        "features" => "Place three (3) products or signages in high-traffic communal AR or VR environments.", 
        "cta" => "Sign Up", 
        "link" => "signup-silver.php"
    ],
    [
        "name" => "Gold Plan", 
        "features" => "Own an exclusive AR or VR scene or a booth in a large VR venue: perfect for a branded showroom, VIP lounge, or interactive product demo.", 
        "cta" => "Sign Up", 
        "link" => "signup-gold.php"
    ],
    [
        "name" => "Platinum Plan", 
        "features" => "Own a grand, landmark VR environment like a virtual expo hall, convention center, museum, or mall to host events and immersive brand experiences.", 
        "cta" => "Sign Up", 
        "link" => "signup-platinum.php"
    ]
];

foreach ($plans as $plan) {
    echo "<div class='col-lg-4 col-md-6 d-flex'>";
    echo "    <div class='plan border rounded p-4 text-center d-flex flex-column w-100'>";
    echo "        <h3>{$plan['name']}</h3>";
    echo "        <p class='flex-grow-1'>{$plan['features']}</p>";
    echo "        <a href='{$plan['link']}' class='btn btn-primary mt-auto'>{$plan['cta']}</a>";
    echo "    </div>";
    echo "</div>";
}

echo "        </div>";
echo "    </div>";
echo "</section>";

// Add custom CSS for plan section
echo "<style>";
echo ".plans .plan {";
echo "    transition: transform 0.3s ease, box-shadow 0.3s ease;";
echo "}";
echo ".plans .plan:hover {";
echo "    transform: translateY(-5px);";
echo "    box-shadow: 0 10px 20px rgba(0,0,0,0.1);";
echo "}";
echo ".plans .btn {";
echo "    min-width: 120px;";
echo "}";
echo "</style>";

// Footer
echo "<footer class='footer py-4 bg-dark text-white text-center'>";
echo "    <div class='container'>";
echo "        <p>&copy; " . date('Y') . " ARville. All rights reserved.</p>";
echo "        <div class='footer-links'>";
echo "            <a href='miel/login.php' class='text-white'>MIEL</a> | ";
echo "            <a href='plans.php' class='text-white'>Subscription Plans</a> | ";
echo "            <a href='about-us.php' class='text-white'>About Us</a> | ";
echo "            <a href='contact.php' class='text-white'>Contact</a>";
echo "        </div>";
echo "    </div>";
echo "</footer>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";