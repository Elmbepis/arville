<?php
// Define the plans
$plans = [
    [
        "name" => "Silver Plan",
        "price" => "&#8369;10,000",
        "features" => [
            "Essential AR tools",
            "Basic analytics",
            "Email support",
        ],
        "cta" => "Sign Up",
        "link" => "signup-silver.php",
        "highlight" => false,
    ],
    [
        "name" => "Gold Plan",
        "price" => "&#8369;20,000",
        "features" => [
            "Advanced AR tools",
            "Gamification features",
            "Priority support",
        ],
        "cta" => "Sign Up",
        "link" => "signup-gold.php",
        "highlight" => true,
    ],
    [
        "name" => "Platinum Plan",
        "price" => "&#8369;50,000",
        "features" => [
            "Tailored AR solutions",
            "Comprehensive analytics",
            "24/7 dedicated support",
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
echo "                <li class='nav-item'><a class='nav-link' href='about-us.php'>About Us</a></li>";
echo "                <li class='nav-item'><a class='nav-link' href='contact.php'>Contact</a></li>";
echo "            </ul>";
echo "        </div>";
echo "    </div>";
echo "</nav>";

// Header Section
echo "<header class='text-center py-5 bg-primary text-white'>";
echo "    <h1>Choose the Plan That Fits Your Needs</h1>";
echo "    <p class='lead'>Empowering your business with cutting-edge AR solutions.</p>";
echo "</header>";

// Plans Section
echo "<main class='py-5'>";
echo "    <div class='container'>";
echo "        <div class='row row-cols-1 row-cols-md-3 g-4'>";

// Loop through the plans
foreach ($plans as $plan) {
    $borderColor = $plan['highlight'] ? "border-gold" : ($plan['name'] === "Platinum Plan" ? "border-lightblue" : "border-gray");
	$mostPopular = $plan['highlight'] ? "<p style='color: gold; font-size: 1.5rem; font-weight: bold; margin-top: -0.5rem; margin-bottom: 0.5 rem;'>(Most Popular)</p>" : "";

    echo "<div class='col'>";
    echo "    <div class='card $borderColor text-center shadow-sm'>";
    echo "        <div class='card-header bg-primary text-white'>";
    echo "            <h1>{$plan['name']}</h1>";
    echo $mostPopular; // Add 'Most Popular' for Gold Plan
    echo "        </div>";
    echo "        <div class='card-body'>";
    echo "            <h3 class='card-title text-primary'>{$plan['price']}</h3>";
    echo "            <ul class='list-group list-group-flush my-3'>";
    foreach ($plan['features'] as $feature) {
        echo "                <li class='list-group-item'>$feature</li>";
    }
    echo "            </ul>";
    echo "            <a href='{$plan['link']}' class='btn btn-primary'>{$plan['cta']}</a>";
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
