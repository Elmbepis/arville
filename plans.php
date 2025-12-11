<?php
// Define the plans
$plans = [
    [
        "name" => "Silver Plan",
        "price" => "Starts at &#8369;5,000",
        "features" => [
            "Place three (3) products or signages in high-traffic communal AR or VR environments.",
        ],
        "cta" => "Sign Up",
        "link" => "signup-silver.php",
        "highlight" => false,
    ],
    [
        "name" => "Gold Plan",
        "price" => "Starts at &#8369;10,000",
        "features" => [
            "Own an exclusive AR or VR scene or a booth in a large VR venue: perfect for a branded showroom, VIP lounge, or interactive product demo.",
        ],
        "cta" => "Sign Up",
        "link" => "signup-gold.php",
        "highlight" => true,
    ],
    [
        "name" => "Platinum Plan",
        "price" => "Starts at &#8369;50,000",
        "features" => [
            "Own a grand, landmark VR environment like a virtual expo hall, convention center, museum, or mall to showcase a multitude of products, host events, and offer immersive brand experiences.",
        ],
        "cta" => "Sign Up",
        "link" => "signup-platinum.php",
        "highlight" => false,
    ],
];

// Start HTML output
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "    <meta charset='UTF-8'>";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "    <title>Plans - Arville</title>";
echo "    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>";
echo "    <link rel='stylesheet' href='styles.css'>";
echo "    <style>";
echo "        .card {";
echo "            transition: transform 0.3s ease, box-shadow 0.3s ease;";
echo "            height: 100%;";
echo "            display: flex;";
echo "            flex-direction: column;";
echo "        }";
echo "        .card:hover {";
echo "            transform: translateY(-5px);";
echo "            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;";
echo "        }";
echo "        .card-body {";
echo "            display: flex;";
echo "            flex-direction: column;";
echo "            flex-grow: 1;";
echo "        }";
echo "        .card-body .btn {";
echo "            margin-top: auto;";
echo "            width: 80%;";
echo "            align-self: center;";
echo "        }";
echo "        .border-gold {";
echo "            border: 3px solid gold !important;";
echo "        }";
echo "        .border-lightblue {";
echo "            border: 3px solid #add8e6 !important;";
echo "        }";
echo "        .border-gray {";
echo "            border: 3px solid #dee2e6 !important;";
echo "        }";
echo "        .most-popular {";
echo "            color: gold;";
echo "            font-size: 1.1rem;";
echo "            font-weight: bold;";
echo "            margin-top: -0.5rem;";
echo "            margin-bottom: 0.5rem;";
echo "        }";
echo "        .list-group-item {";
echo "            border: none;";
echo "            padding: 0.75rem 0;";
echo "        }";
echo "    </style>";
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
echo "                <li class='nav-item'><a class='nav-link' href='about-us.php'>About Us</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='contact.php'>Contact</a></li>";
echo "            </ul>";
echo "        </div>";
echo "    </div>";
echo "</nav>";

// Header Section
echo "<header class='text-center py-5 bg-primary text-white'>";
echo "    <h1>Choose the Plan That Fits Your Needs</h1>";
echo "    <p class='lead'>Empowering your business with cutting-edge XR solutions.</p>";
echo "</header>";

// Plans Section
echo "<main class='py-5'>";
echo "    <div class='container'>";
echo "        <div class='row row-cols-1 row-cols-md-3 g-4 align-items-stretch'>"; // Added align-items-stretch

// Loop through the plans
foreach ($plans as $plan) {
    $borderColor = $plan['highlight'] ? "border-gold" : ($plan['name'] === "Platinum Plan" ? "border-lightblue" : "border-gray");
    $mostPopular = $plan['highlight'] ? "<p class='most-popular'>(Most Popular)</p>" : "";

    echo "<div class='col d-flex'>"; // Added d-flex
    echo "    <div class='card $borderColor text-center shadow-sm w-100'>"; // Added w-100
    echo "        <div class='card-header bg-primary text-white'>";
    echo "            <h1>{$plan['name']}</h1>";
    echo $mostPopular; // Add 'Most Popular' for Gold Plan
    echo "        </div>";
    echo "        <div class='card-body d-flex flex-column'>"; // Added d-flex flex-column
    echo "            <h3 class='card-title text-primary'>{$plan['price']}</h3>";
    echo "            <ul class='list-group list-group-flush my-3 flex-grow-1'>"; // Added flex-grow-1
    foreach ($plan['features'] as $feature) {
        echo "                <li class='list-group-item'>$feature</li>";
    }
    echo "            </ul>";
    echo "            <a href='{$plan['link']}' class='btn btn-primary mt-auto'>{$plan['cta']}</a>"; // Added mt-auto
    echo "        </div>";
    echo "    </div>";
    echo "</div>";
}

echo "        </div>";
echo "    </div>";
echo "</main>";

// Footer Section
echo "<footer class='footer py-4 bg-dark text-white text-center'>";
echo "    <p>&copy; " . date('Y') . " Arville. All rights reserved.</p>";
echo "</footer>";
echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";
?>