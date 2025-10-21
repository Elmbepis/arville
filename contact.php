<?php
// Define the "Contact Us" page content
$title = "Contact Us";
$description = "Have questions or need assistance? We're here to help. Reach out to us using the form below, or contact us through our provided details.";

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

// Hero section
echo "<header class='hero text-center py-5 bg-primary text-white'>";
echo "    <div class='container'>";
echo "        <h1 class='display-4'>{$title}</h1>";
echo "        <p class='lead'>{$description}</p>";
echo "    </div>";
echo "</header>";

// Contact Form section
echo "<div class='container mt-5'>";
echo "    <h2 class='text-center mb-4' style='color: #0447f3;'>Get in Touch</h2>";
echo "    <form action='submit-contact.php' method='post' class='row g-3'>";
echo "        <div class='col-md-6'>";
echo "            <label for='name' class='form-label'>Name</label>";
echo "            <input type='text' id='name' name='name' class='form-control' placeholder='Your full name' required>";
echo "        </div>";
echo "        <div class='col-md-6'>";
echo "            <label for='email' class='form-label'>Email</label>";
echo "            <input type='email' id='email' name='email' class='form-control' placeholder='Your email address' required>";
echo "        </div>";
echo "        <div class='col-12'>";
echo "            <label for='message' class='form-label'>Message</label>";
echo "            <textarea id='message' name='message' class='form-control' rows='5' placeholder='Your message or inquiry' required></textarea>";
echo "        </div>";
echo "        <div class='col-12 text-center'>";
echo "            <button type='submit' class='btn btn-primary btn-lg'>Send Message</button>";
echo "        </div>";
echo "    </form>";
echo "</div>";

// Contact Details section
echo "<div class='container mt-5'>";
echo "    <h2 class='text-center mb-4' style='color: #0447f3;'>Our Contact Details</h2>";
echo "    <div class='row text-center'>";
echo "        <div class='col-md-4'>";
echo "            <h5>Address</h5>";
echo "            <p>245 New Delhi St.<br>Better Living Subd.<br/>Paranaque City, Philippines</p>";
echo "        </div>";
echo "        <div class='col-md-4'>";
echo "            <h5>Phone</h5>";
echo "            <p>(0917) 812-7757</p>";
echo "        </div>";
echo "        <div class='col-md-4'>";
echo "            <h5>Email</h5>";
echo "            <p><a href='mailto:elmbepis@gmail.com' class='text-primary'>elmbepis@gmail.com</a></p>";
echo "        </div>";
echo "    </div>";
echo "</div>";

// Footer section
echo "<footer class='footer py-4 bg-dark text-white text-center mt-5'>";
echo "    <div class='container'>";
echo "        <p>&copy; " . date('Y') . " ARville. All rights reserved.</p>";
echo "    </div>";
echo "</footer>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";
?>
