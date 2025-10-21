<?php
// Define the "About ARville" page content
$title = "About ARville";
$description = "ARville is an online ecosystem of businesses, consumers, and communities connected together by immersive AR experiences and innovative marketing and customer relationship tools. Below are our mission, vision, and the dedicated team that brings it all together.";

// Header section
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

// Main content section
echo "<header class='hero text-center py-5 bg-primary text-white'>";
echo "    <div class='container'>";
echo "        <h1 class='display-4'>{$title}</h1>";
echo "        <p class='lead'>{$description}</p>";
echo "    </div>";
echo "</header>";

// Section: Our Company
echo "<div class='container mt-5'>"; // Add container for centered content
echo "    <h2 style='color: #8b0000; font-weight: 600; background-color: #f7f7f7; padding: 15px; border-radius: 5px; text-align: center;'>Our Company</h2>";
echo "    <p class='mt-3 text-center'>ARville is owned and managed by Acadev Technologies, Inc., a Philippine-based company that specializes in software development, especially in the fields of online education, augmented reality (AR), and virtual reality (VR).  
We have been developing extended reality (XR) products (AR and VR products) since 2016.  In fact, Acadev also owns and manages the Epistola XR Museum, which is a mobile XR museum that we bring to schools within Metro Manila and Calabarzon.</p>";
echo "</div>";

// Section: Mission
echo "<div class='container mt-5'>"; // Add container for centered content
echo "    <h2 style='color: #8b0000; font-weight: 600; background-color: #f7f7f7; padding: 15px; border-radius: 5px; text-align: center;'>Our Mission</h2>";
echo "    <p class='mt-3 text-center'>ARville is committed to revolutionizing how businesses and communities connect through cutting-edge AR technology. We strive to empower businesses, enrich consumer experiences, and create a vibrant ecosystem where technology enhances real-world interactions.</p>";
echo "</div>";

// Section: Vision
echo "<div class='container mt-5'>"; // Add container for centered content
echo "    <h2 style='color: #8b0000; font-weight: 600; background-color: #f7f7f7; padding: 15px; border-radius: 5px; text-align: center;'>Our Vision</h2>";
echo "    <p class='mt-3 text-center'>Our vision is to establish ARville as a global leader in AR-powered ecosystems, fostering innovation and bridging the gap between businesses and their audiences. We aim to create a seamless, interactive, and inclusive digital landscape for everyone.</p>";
echo "</div>";

echo "    </div>";
echo "</main>";

// Footer section
echo "<footer class='footer py-4 bg-dark text-white text-center mt-5'>"; // Added mt-5 class for consistent spacing
echo "    <div class='container'>";
echo "        <p>&copy; " . date('Y') . " ARville. All rights reserved.</p>";
echo "    </div>";
echo "</footer>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";
