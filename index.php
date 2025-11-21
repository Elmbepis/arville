<?php

//Preload mouseover icons
echo "<script>
        function preloadImages() {
            const images = [
                'images/icon-hospitality2.jpg',
                'images/icon-education2.jpg',
                'images/icon-sports2.jpg',
                'images/icon-electronics2.jpg',
                'images/icon-fashion2.jpg',
                'images/icon-beauty2.jpg',
                'images/icon-cars2.jpg',
                'images/icon-estate2.jpg',
                'images/icon-gov2.jpg'
            ];
            images.forEach((src) => {
                const img = new Image();
                img.src = src;
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
echo "    <link rel='stylesheet' href='styles.css'>";
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
echo "                <li class='nav-item'><a class='nav-link' href='use-cases.php'>Use Cases</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='products.php'>Products</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='plans.php'>Plans</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='about-us.php'>About Us</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='contact.php'>Contact</a></li>";
echo "            </ul>";
echo "        </div>";
echo "    </div>";
echo "</nav>";

// Hero Section
echo "<header class='hero text-center py-5 bg-primary text-white'>";
echo "    <div class='container'>";
echo "        <h1 class='display-4 hero-title'>Step into the World of ARville:<br/>Where Marketing Becomes Immersive</h1>";
echo "        <p class='lead hero-subtitle'>Explore magical online Extended Reality (XR) experiences or join our web XR network to revolutionize your business.</p>";
echo "        <div class='d-flex justify-content-center gap-3'>";
echo "            <a href='use-cases.php' id='discover-btn' class='btn btn-lg btn-outline-light me-5 hero-btn'>Discover Web XR Experiences</a>";
echo "            <a href='plans.php' id='join-btn' class='btn btn-lg btn-outline-light hero-btn'>Join the Web XR Network</a>";
echo "        </div>";
echo "    </div>";
echo "</header>";

echo "<style>";
echo "    .hero-title {";
echo "        font-size: 3rem; /* Default size for large screens */";
echo "    }";
echo "    .hero-subtitle {";
echo "        font-size: 1.5rem; /* Default size for large screens */";
echo "    }";
echo "    .hero-btn {";
echo "        font-size: 1rem; /* Default size for large screens */";
echo "    }";
echo "    @media (max-width: 768px) {";
echo "        .hero-title {";
echo "            font-size: 2rem; /* Adjusted size for medium screens */";
echo "        }";
echo "        .hero-subtitle {";
echo "            font-size: 1rem; /* Adjusted size for medium screens */";
echo "        }";
echo "        .hero-btn {";
echo "            font-size: 0.875rem; /* Adjusted size for medium screens */";
echo "        }";
echo "    }";
echo "    @media (max-width: 576px) {";
echo "        .hero-title {";
echo "            font-size: 1.5rem; /* Adjusted size for small screens */";
echo "        }";
echo "        .hero-subtitle {";
echo "            font-size: 0.875rem; /* Adjusted size for small screens */";
echo "        }";
echo "        .hero-btn {";
echo "            font-size: 0.75rem; /* Adjusted size for small screens */";
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

// Business Categories Section
echo "<section class='categories py-5' id='categories'>";
echo "    <div class='container'>";
echo "        <h2 class='text-center mb-4'>Explore Our Vibrant Web XR Network</h2>";
echo "        <div style='height: 20px;'></div>"; // Spacer element
echo "        <div class='row g-4'>";

$categories = [
    ["title" => "Hospitality and Tourism", "tagline" => "Enhance your travel experiences with XR-driven services.", "icon" => "icon-hospitality.jpg", "hoverIcon" => "icon-hospitality2.jpg", "link" => "cat-page.php?cat=hospitality"],
    ["title" => "Education and Development", "tagline" => "Empower your mind through XR.", "icon" => "icon-education.jpg", "hoverIcon" => "icon-education2.jpg", "link" => "cat-page.php?cat=education"],
    ["title" => "Sports and Recreation", "tagline" => "Immerse yourself in passionate XR experiences.", "icon" => "icon-sports.jpg", "hoverIcon" => "icon-sports2.jpg", "link" => "cat-page.php?cat=sports"],
    ["title" => "Electronics and Gadgets", "tagline" => "Acquaint yourself with tech products through XR.", "icon" => "icon-electronics.jpg", "hoverIcon" => "icon-electronics2.jpg", "link" => "cat-page.php?cat=electronics"],
    ["title" => "Style and Fashion", "tagline" => "Reinvent your look with XR.", "icon" => "icon-fashion.jpg", "hoverIcon" => "icon-fashion2.jpg", "link" => "cat-page.php?cat=fashion"],
    ["title" => "Beauty and Wellness", "tagline" => "Elevate your self-care through XR.", "icon" => "icon-beauty.jpg", "hoverIcon" => "icon-beauty2.jpg", "link" => "cat-page.php?cat=beauty"],
    ["title" => "Cars and Car Accessories", "tagline" => "Find upgrades and accessories for your car with XR.", "icon" => "icon-cars.jpg", "hoverIcon" => "icon-cars2.jpg", "link" => "cat-page.php?cat=cars"],
    ["title" => "Real Estate", "tagline" => "Enjoy looking for property investments through XR.", "icon" => "icon-estate.jpg", "hoverIcon" => "icon-estate2.jpg", "link" => "cat-page.php?cat=estate"],
    ["title" => "Government and Public Service", "tagline" => "Find government information and assistance through XR.", "icon" => "icon-gov.jpg", "hoverIcon" => "icon-gov2.jpg", "link" => "cat-page.php?cat=gov"],
];

foreach ($categories as $category) {
    echo "<div class='col-md-4 col-sm-6'>";
    echo "    <div class='category text-center'>";
    echo "        <a href='{$category['link']}'>";
    echo "            <img src='images/{$category['icon']}' class='category-icon img-fluid mb-3' alt='{$category['title']}' style='width: 260px; height: 260px; object-fit: contain;' data-original-src='images/{$category['icon']}' data-hover-src='images/{$category['hoverIcon']}'>";
    echo "        </a>";
    echo "        <h3>{$category['title']}</h3>";
    echo "        <p>{$category['tagline']}</p>";
    echo "    </div>";
    echo "</div>";
}

echo "<script>";
echo "    document.querySelectorAll('.category-icon').forEach(function(img) {";
echo "        img.addEventListener('mouseover', function() {";
echo "            this.src = this.getAttribute('data-hover-src');";
echo "        });";
echo "        img.addEventListener('mouseout', function() {";
echo "            this.src = this.getAttribute('data-original-src');";
echo "        });";
echo "    });";
echo "</script>";

// About Section
echo "            <div style='margin-bottom: 5px;'></div>";
echo "<section class='about py-5' id='about' style='background-color: #f2f2f2;'>"; 
echo "    <div class='container text-center'>";
echo "        <h2>What is ARville?</h2>";
echo "        <p class='lead'>ARville is an online ecosystem of businesses, consumers, and communities connected together by immersive XR experiences and innovative marketing and customer relationship tools.</p>";
echo "        <a href='learn-more.php' class='btn btn-primary btn-lg'>Learn More About ARville</a>";
echo "    </div>";
echo "</section>";

// Subscription Plans
echo "<section class='plans py-4' id='plans'>";
echo "    <div class='container'>";
echo "        <h2 class='text-center mb-4'>Plans to Suit Every Vision</h2>";
echo "        <div class='row g-4 align-items-stretch'>"; // Added align-items-stretch for equal height

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
    echo "<div class='col-lg-4 col-md-6 d-flex'>"; // Added d-flex
    echo "    <div class='plan border rounded p-4 text-center d-flex flex-column w-100'>"; // Added d-flex flex-column w-100
    echo "        <h3>{$plan['name']}</h3>";
    echo "        <p class='flex-grow-1'>{$plan['features']}</p>"; // Added flex-grow-1
    echo "        <a href='{$plan['link']}' class='btn btn-primary mt-auto'>{$plan['cta']}</a>"; // Added mt-auto
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
echo "            <a href='products.php' class='text-white'>XR Products</a> | ";
echo "            <a href='plans.php' class='text-white'>Subscription Plans</a> | ";
echo "            <a href='about-us.php' class='text-white'>About Us</a> | ";
echo "            <a href='contact.php' class='text-white'>Contact</a>";
echo "        </div>";
echo "    </div>";
echo "</footer>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";