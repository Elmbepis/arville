<?php

$title = "What is ARville?";
$description = "ARville is an online ecosystem of businesses, consumers, and communities connected together by immersive AR experiences and innovative marketing and customer relationship tools.";

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
echo "<header class='d-flex align-items-center justify-content-between py-3 px-4 bg-light border-bottom'>";
echo "    <div class='logo'>";
echo "        <img src='images/logo.jpg' alt='ARville' style='width: 200px;'>";
echo "    </div>";
echo "    <nav>";
echo "        <a href='index.php' class='me-3'>Home</a>";
echo "        <a href='products.php' class='me-3'>Products</a>";
echo "        <a href='plans.php' class='me-3'>Plans</a>";
echo "    </nav>";
echo "</header>";

// Main content section
echo "<main class='py-5'>";
echo "    <div class='container text-center'>";
echo "        <h1 class='display-4 mb-4' style='color: #0447f3; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); font-weight: 600;'>{$title}</h1>";
echo "        <p class='lead mb-5' style='color: #333; background: linear-gradient(to right, #f8f9fa, #e9ecef); padding: 15px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>{$description}</p>";

echo "        <div class='mt-5'></div>";

echo "        <!-- Section: What Makes Us Unique -->";
echo "        <div class='row text-start'>";
echo "            <div class='col-lg-6 mb-4'>";
echo "                <h3 style='border-top: 5px solid darkred; border-bottom: 5px solid darkred; padding: 10px 0;'>Immersive AR Experiences</h3>";
echo "                <p>ARville harnesses the power of augmented reality (AR) to revolutionize customer engagement, making every interaction more dynamic and impactful. Businesses can showcase virtual product demonstrations, simulate real-world scenarios, and create fully interactive marketing campaigns that captivate their audiences. Whether it's allowing customers to visualize furniture in their homes or immersing them in a gamified shopping experience, AR bridges the gap between imagination and reality. These experiences not only leave a lasting impression but also foster deep brand loyalty and enhanced customer satisfaction.</p>";
echo "            </div>";
echo "            <div class='col-lg-6 mb-4'>";
echo "                <h3 style='border-top: 5px solid darkred; border-bottom: 5px solid darkred; padding: 10px 0;'>Innovative Marketing Tools</h3>";
echo "                <p>ARville provides businesses with state-of-the-art tools to implement and manage AR-driven marketing strategies effortlessly. Our platform enables companies to create customized AR campaigns, track their performance, and gain invaluable insights into customer preferences and behavior. These analytics empower businesses to refine their strategies in real time, ensuring maximum effectiveness and engagement. By offering a seamless blend of creativity and data-driven decision-making, ARville equips businesses to stay ahead in today's competitive marketplace.</p>";
echo "            </div>";
echo "        </div>";

echo "        <!-- Section: Who We Serve -->";
echo "        <div class='row text-start'>";
echo "            <div class='col-lg-6 mb-4'>";
echo "                <h3 style='border-top: 5px solid darkred; border-bottom: 5px solid darkred; padding: 10px 0;'>Value to Businesses</h3>";
echo "                <p>ARville is designed to cater to businesses of all sizes, from innovative startups looking to make their mark to established enterprises aiming to enhance their brand presence. Our platform helps businesses stand out by offering unique AR experiences that attract and retain customers. By integrating AR into their operations, businesses can increase product visibility, foster meaningful interactions, and provide value-driven customer engagements. Whether it's an online retailer offering AR fitting rooms or a cafe using AR promotions, ARville helps businesses redefine how they connect with their audience.</p>";
echo "            </div>";
echo "            <div class='col-lg-6 mb-4'>";
echo "                <h3 style='border-top: 5px solid darkred; border-bottom: 5px solid darkred; padding: 10px 0;'>Value to Consumers</h3>";
echo "                <p>For consumers, ARville transforms everyday activities like shopping, learning, and entertainment into immersive and interactive experiences. Imagine exploring a virtual neighborhood to discover exclusive deals or engaging in an AR treasure hunt while shopping online. ARville makes it possible for customers to visualize products, participate in gamified activities, and enjoy a more personalized and engaging user journey. This level of convenience and interactivity not only enhances customer satisfaction but also turns routine activities into memorable adventures.</p>";
echo "            </div>";
echo "        </div>";

echo "        <!-- Section: Dynamic Features -->";
echo "        <div class='mt-3'>";
echo "            <h2 style='color: #0447f3; font-weight: 600;'>Dynamic Features of ARville</h2>";
echo "        <div class='mt-3'></div>";
echo "            <ul class='list-group text-start'>";
echo "                <li class='list-group-item'><strong>Quarterly Gamified Events:</strong> Participate in AR treasure hunts and thematic storylines that engage users with tenant-specific AR experiences.</li>";
echo "                <li class='list-group-item'><strong>Annual ARville Convention or Concert:</strong> Explore virtual expos with 3D booths or enjoy AR-enhanced concerts sponsored by tenant businesses.</li>";
echo "                <li class='list-group-item'><strong>Unified AR Branding:</strong> Experience cohesive branding with shared digital spaces and tenant AR experiences labeled 'Powered by ARville.'</li>";
echo "                <li class='list-group-item'><strong>Centralized Rewards System:</strong> Earn and redeem AR points across tenants, boosting engagement and customer loyalty.</li>";
echo "                <li class='list-group-item'><strong>Collaborative AR Experiences:</strong> Engage in joint promotions or story chains involving multiple tenants to create a shared AR narrative.</li>";
echo "                <li class='list-group-item'><strong>Partnerships with High-Profile Events:</strong> Tie into major festivals or esports tournaments, leveraging AR to enhance visibility and user interaction.</li>";
echo "                <li class='list-group-item'><strong>Community-Centric AR Events:</strong> Participate in AR-powered neighborhood tours or virtual art installations hosted by tenant businesses.</li>";
echo "                <li class='list-group-item'><strong>Measuring and Reinforcing Success:</strong> Use leaderboards, social media amplification, and event recaps to highlight engagement and tenant contributions.</li>";
echo "            </ul>";
echo "        </div>";

echo "    </div>";
echo "</main>";

// Footer section
echo "<footer class='footer py-4 bg-dark text-white text-center'>";
echo "    <div class='container'>";
echo "        <p>&copy; " . date('Y') . " ARville. All rights reserved.</p>";
echo "    </div>";
echo "</footer>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";
echo "</body>";
echo "</html>";
