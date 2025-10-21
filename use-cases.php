<?php
// Define the "AR Use Cases" page content
$title = "AR Use Cases";

// Use Case Data
$useCases = [
    ["name" => "BBC: 'Frozen Planet' Live AR Event", "image" => "images/cases/case01.jpg", "link" => "https://www.youtube.com/watch?v=fv71Pe9kTU0&t=40s"],
    ["name" => "Nissan: 3D Models on Brochure", "image" => "images/cases/case02.jpg", "link" => "https://www.youtube.com/watch?v=WnGNZo2G6Oc"],
    ["name" => "Ikea: Furniture-at-Home Visualization", "image" => "images/cases/case03.jpg", "link" => "https://www.youtube.com/watch?v=UudV1VdFtuQ"],
    ["name" => "Nat Geo: Live AR Event in Romania", "image" => "images/cases/case04.jpg", "link" => "https://www.youtube.com/watch?v=noPalKUhAfo"],
    ["name" => "Yamaha: 3D Models on Brochure", "image" => "images/cases/case05.jpg", "link" => "https://www.youtube.com/watch?v=73mBCmEZb0U"],
    ["name" => "Disney: Phineas & Ferb Live AR Event", "image" => "images/cases/case06.jpg", "link" => "https://www.youtube.com/watch?v=cR-eiaWuXAI"],
    ["name" => "Warner: Animation on Movie Poster", "image" => "images/cases/case07.jpg", "link" => "https://www.youtube.com/watch?v=wP5jDIRAu8M"],
    ["name" => "Rayban: Sunglasses Virtual Try-on", "image" => "images/cases/case08.jpg", "link" => "https://www.youtube.com/watch?v=j6Vnp0zPE3M"],
    ["name" => "Toys R Us: Animation of Store Aisles", "image" => "images/cases/case09.jpg", "link" => "https://www.youtube.com/watch?v=8KAVTorly9o"],
    ["name" => "Coke: Animated Jukebox on Can", "image" => "images/cases/case10.jpg", "link" => "https://www.youtube.com/watch?v=hYkJJz1WeWw"],
    ["name" => "Pizza Hut: X-men Content on Pizza Box", "image" => "images/cases/case11.jpg", "link" => "https://www.youtube.com/watch?v=nNrLc49ocmk"],
    ["name" => "Covergirl: Animated 3D Model on Packaging", "image" => "images/cases/case12.jpg", "link" => "https://www.youtube.com/watch?v=dKAPxeiOBLs"],
    ["name" => "Lego: Animated 3D Models on Catalog", "image" => "images/cases/case13.jpg", "link" => "https://www.youtube.com/watch?v=DSMqDH5bOGk"],
    ["name" => "Sephora: Beauty Product Virtual Try-on", "image" => "images/cases/case14.jpg", "link" => "https://www.youtube.com/watch?v=NFApcSocFDM"],
    ["name" => "Heinz: Animated Recipe Book on Bottle Label", "image" => "images/cases/case15.jpg", "link" => "https://www.youtube.com/watch?v=GbplSdh0lGU"],
    ["name" => "Hyundai: Animated Brochure on Logo", "image" => "images/cases/case16.jpg", "link" => "https://www.youtube.com/watch?v=ftDGZcccxtQ"],
    ["name" => "Philips: In-store Product Preview", "image" => "images/cases/case17.jpg", "link" => "https://www.youtube.com/watch?v=r6g5odUKFIQ"],
    ["name" => "Netflix: Promotional Video on Poster", "image" => "images/cases/case18.jpg", "link" => "https://www.youtube.com/watch?v=mjk4rAWhdOg"],
    ["name" => "Colgate: Animated 3D Model on Packaging", "image" => "images/cases/case19.jpg", "link" => "https://www.youtube.com/shorts/L0yl2gBABtM"],
    ["name" => "Nike: In-store AR Playground", "image" => "images/cases/case20.jpg", "link" => "https://www.youtube.com/watch?v=4XG0z91ETgA"],
    ["name" => "Pepsi: Mall AR Video Booth", "image" => "images/cases/case21.jpg", "link" => "https://www.youtube.com/watch?v=QMPlH0wQ87U"],
    ["name" => "airBaltic: AR Customer Magazine", "image" => "images/cases/case22.jpg", "link" => "https://www.youtube.com/watch?v=ac14D6cLO50"],
    ["name" => "Singapore Tourism Board: AR Tours", "image" => "images/cases/case23.jpg", "link" => "https://www.youtube.com/watch?v=zFxpXiAkT2k"],
    ["name" => "Timberland: AR Clothing Virtual Try-on", "image" => "images/cases/case24.jpg", "link" => "https://www.youtube.com/watch?v=5TZmQPdhpak"],
    ["name" => "Augmented.City: Community AR Experience", "image" => "images/cases/case25.jpg", "link" => "https://www.youtube.com/watch?v=6qUhSKyg-94"],
    ["name" => "Krakow Museum: AR-enabled Museum Displays", "image" => "images/cases/case26.jpg", "link" => "https://www.youtube.com/watch?v=hDRVLYsCgxA"],
    ["name" => "Tommy Hilfiger: In-store Virtual Try-on", "image" => "images/cases/case27.jpg", "link" => "https://www.youtube.com/shorts/-XgU6MFUqGs"],
    ["name" => "Harvard Business Review: Magazine AR Animation", "image" => "images/cases/case28.jpg", "link" => "https://www.youtube.com/watch?v=wwmmgAw8ZAE"],
    ["name" => "Marvel Entertainment: Eternals AR App", "image" => "images/cases/case29.jpg", "link" => "https://www.youtube.com/watch?v=VavKHaBRtFI"],
    ["name" => "Barcelona Tourism: 3D Models on Tourist Map", "image" => "images/cases/case30.jpg", "link" => "https://www.youtube.com/shorts/hXGvS9-GlfM"],
    ["name" => "Boston Greenway Park: AR Art Installation", "image" => "images/cases/case31.jpg", "link" => "https://www.youtube.com/shorts/fnBmyumEJK0"],
    ["name" => "Fandora: AR-Animated Shirts", "image" => "images/cases/case32.jpg", "link" => "https://www.youtube.com/watch?v=ogyRN7QqVBU"],

];

// Start HTML output
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "    <meta charset='UTF-8'>";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "    <title>{$title}</title>";
echo "    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>";
echo "    <link rel='stylesheet' href='styles.css'>";
echo "</head>";
echo "<body>";

// Navbar Section
echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
echo "    <div class='container'>";
echo "        <a class='navbar-brand' href='index.php'>";
echo "            <img src='images/logo.jpg' alt='ARville Network' width='200' class='d-inline-block align-text-top'>";
echo "        </a>";
echo "        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
echo "            <span class='navbar-toggler-icon'></span>";
echo "        </button>";
echo "        <div class='collapse navbar-collapse' id='navbarNav'>";
echo "            <ul class='navbar-nav ms-auto'>";
echo "                <li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='products.php'>Products</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='plans.php'>Plans</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='about-us.php'>About Us</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='contact.php'>Contact</a></li>";
echo "            </ul>";
echo "        </div>";
echo "    </div>";
echo "</nav>";

// Header Section
echo "<header class='py-5 bg-primary text-white text-center'>";
echo "    <div class='container'>";
echo "        <h1 class='display-4'>{$title}</h1>";
echo "        <p class='lead'>Existing applications of AR that you can try for your own business through ARville</p>";
echo "    </div>";
echo "</header>";

// Use Case Icons Section
echo "<main class='py-5'>";
echo "    <div class='container'>";
echo "        <div class='row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4'>";

// Loop through use cases
foreach ($useCases as $useCase) {
    echo "            <div class='col'>";
    echo "                <a href='{$useCase['link']}' class='text-decoration-none'>";
    echo "                    <div class='card border-0 shadow-sm text-center'>";
    echo "                        <div class='d-flex justify-content-center align-items-center'>";
    echo "                            <picture>";
    echo "                                <source srcset='{$useCase['image']}' media='(min-width: 1200px)'>";
    echo "                                <source srcset='{$useCase['image']}' media='(min-width: 768px)'>";
    echo "                                <img src='{$useCase['image']}' alt='{$useCase['name']}' class='use-case-img'>";
    echo "                            </picture>";
    echo "                        </div>";
    echo "                        <div class='card-body'>";
    echo "                            <h5 class='card-title text-dark'>{$useCase['name']}</h5>";
    echo "                        </div>";
    echo "                    </div>";
    echo "                </a>";
    echo "            </div>";
}

echo "        </div>";
echo "    </div>";
echo "</main>";

// Add CSS for responsive image sizes
echo "<style>";
echo "    .use-case-img {";
echo "        width: 100%;";
echo "        object-fit: cover;";
echo "    }";
echo "    @media (min-width: 1200px) {";
echo "        .use-case-img {";
echo "            width: 240px;";
echo "            height: 150px;";
echo "        }";
echo "    }";
echo "    @media (min-width: 768px) and (max-width: 1199px) {";
echo "        .use-case-img {";
echo "            width: 200px;";
echo "            height: 125px;";
echo "        }";
echo "    }";
echo "    @media (max-width: 767px) {";
echo "        .use-case-img {";
echo "            width: 160px;";
echo "            height: 100px;";
echo "        }";
echo "    }";
echo "</style>";
// Footer Section
echo "<footer class='footer py-4 bg-dark text-white text-center'>";
echo "    <div class='container'>";
echo "        <p>&copy; " . date('Y') . " ARville. All rights reserved.</p>";
echo "    </div>";
echo "</footer>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";
