<?php
// Define the page title and features
$title = "Gold Package";
$features = [
    ["title" => "Essential AR Tools", "description" => "Get started with augmented reality for your business."],
    ["title" => "Basic Analytics", "description" => "Track and measure your AR campaign performance effectively."],
    ["title" => "Email Support", "description" => "Receive assistance via email for your inquiries and issues."]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
 		<a class='navbar-brand' href='index.php'>
		<img src='images/logo.jpg' alt='ARville Network' width='200' class='d-inline-block align-text-top'>

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="plans.php">Plans</a></li>
                <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header Section -->
<header class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h1 class="display-4"><?php echo $title; ?></h1>
    </div>
</header>

<!-- Features Section -->
<main class="py-5">

	<div class='container mt-5'>
		<h2 style='color: #8b0000; font-weight: 600; background-color: #f7f7f7; padding: 15px; border-radius: 5px; text-align: center;'>Package Description</h2>
		<p class='mt-3 text-center'>The ARville Gold Plan contains all the AR tools needed to develop advanced AR capabilities that mainstream businesses need in order to maintain market leadership.</p>
	</div>"
    <div class="container">
        <div class="text-center mb-4">
		   <h2 style='color: #8b0000; font-weight: 600; background-color: #f7f7f7; padding: 15px; border-radius: 5px; text-align: center;'>Package Features</h2>
            <ul class="list-group text-start mt-3">
                <?php foreach ($features as $feature) : ?>
                    <li class="list-group-item">
                        <strong><?php echo $feature['title']; ?>:</strong> <?php echo $feature['description']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Sign-Up Form -->
        <div class="card shadow-lg mt-5">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Sign Up for the Gold Package</h3>
                <form action="submit_signup.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="business" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="business" name="business" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Additional Information</label>
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit Sign-Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Footer Section -->
<footer class="footer py-4 bg-dark text-white text-center">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> ARville. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
