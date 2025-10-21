<?php
$title = "ARVille's Off-the-Shelf Products";

// Use Case Data
$products = [
    ["name" => "AR Shirts<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Booklets<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Flashcards<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Visual Aid Cards<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Brochures<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Marketing Posters<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Educational Posters<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Mugs<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Ref Magnets", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Magnetic Posters", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "Collectible AR PVC Cards", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "Diorama AR Props<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
    ["name" => "AR Photo Booths<br/> ", "image" => "images/products/product01.jpg", "link" => "https://www.facebook.com/reel/510385091029274"],
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
echo "            <img src='images/logo.jpg' alt='ARville Network Logo' width='200' class='d-inline-block align-text-top'>";
echo "        </a>";
echo "        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
echo "            <span class='navbar-toggler-icon'></span>";
echo "        </button>";
echo "        <div class='collapse navbar-collapse' id='navbarNav'>";
echo "            <ul class='navbar-nav ms-auto'>";
echo "                <li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='use-cases.php'>Use Cases</a></li>";
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
echo "        <p class='lead'>Off-the-shelf products from ARville that you can immediately use for your promotional merchandise or marketing collaterals</p>";
echo "    </div>";
echo "</header>";

// Products Icons Section
echo "<main class='py-5'>";
echo "    <div class='container'>";
echo "        <div class='row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4'>";

// Loop through products
foreach ($products as $product) {
    echo "            <div class='col'>";
    echo "                <a href='{$product['link']}' class='text-decoration-none'>";
    echo "                    <div class='card border-0 shadow-sm text-center'>";
    echo "                        <div class='d-flex justify-content-center align-items-center'>";
    echo "                            <picture>";
    echo "                                <source srcset='{$product['image']}' media='(min-width: 1200px)'>";
    echo "                                <source srcset='{$product['image']}' media='(min-width: 768px)'>";
    echo "                                <img src='{$product['image']}' alt='{$product['name']}' class='product-img'>";
    echo "                            </picture>";
    echo "                        </div>";
    echo "                        <div class='card-body'>";
    echo "                            <h5 class='card-title text-dark'>{$product['name']}</h5>";
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
echo "    .product-img {";
echo "        width: 100%;";
echo "        object-fit: cover;";
echo "    }";
echo "    @media (min-width: 1200px) {";
echo "        .product-img {";
echo "            width: 240px;";
echo "            height: 150px;";
echo "        }";
echo "    }";
echo "    @media (min-width: 768px) and (max-width: 1199px) {";
echo "        .product-img {";
echo "            width: 200px;";
echo "            height: 125px;";
echo "        }";
echo "    }";
echo "    @media (max-width: 767px) {";
echo "        .product-img {";
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
