<?php
require_once('util/functions.php');
kpluz_validate_login();
// No redirects – just display the menu
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KPluz - Online Academic Excellence System</title>
    <link rel="icon" href="/arville/kpluz0/images/1x/favicon.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Montserrat:100,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="/arville/kpluz0/app/css/style.css">
    <link rel="stylesheet" href="/arville/kpluz0/app/css/app.css">    

    <?php 
    if (!empty($styles_list) && is_array($styles_list)) {
        foreach ($styles_list as $style) {
            echo '<link rel="stylesheet" href="/arville/kpluz0/app/css/'.$style.'">';
        }
    }
    ?>

    <script src="/arville/kpluz0/app/js/lib/react-js/react.js"></script>
    <script src="/arville/kpluz0/app/js/lib/react-js/react-dom.js"></script>
    <script src="/arville/kpluz0/app/js/lib/scrollmagic/minified/ScrollMagic.min.js"></script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P76JCJB');</script>    
</head>
<body id="root" class="menu-page app grade-<?php echo $GLOBALS['grd']; ?>">
    <header id="header" class="shadow transition text-right">
        <div class="container transition">        
            <div class="nav-links">
                <ul class="menu">
                    <li class="text-center" id="home-link"><a href="/arville/kpluz0/app/menu.php"><img src="/arville/kpluz0/images/svg/kpluz_logo_no_sub.svg" alt="KPluz"></a></li>
                    <li class="text-center"><a href="/arville/kpluz0/how-to-use-kpluz.php">How To Use KPluz</a></li>
                    <li class="text-center"><a href="/arville/kpluz0/community.php">Community</a></li>
                    <li class="text-center"><a href="/arville/kpluz0/contact.php">Contact Us</a></li>
                </ul>            
            </div>
            <div class="nav-icons">
                <ul class="menu">
                    <li class="text-center"><a href=""><img src="/arville/kpluz0/images/svg/icon_game.svg" alt="Games">Games</a></li>
                    <li class="text-center"><a href="/arville/kpluz0/bluebars_student.php"><img src="/arville/kpluz0/images/svg/icon_bars.svg" alt="Blue Bars">My Blue Bars</a></li>
                    <li class="text-center"><a href="/arville/kpluz0/logout.php"><img src="/arville/kpluz0/images/svg/icon_logout.svg" alt="Logout">Logout</a></li>
                </ul>
            </div>
        </div>
        <div id="toggle-container"></div>
        <div class="mobile-home-link"><a href="/arville/kpluz0/app/menu.php"><img src="/arville/kpluz0/images/svg/kpluz_logo_no_sub.svg" alt="KPluz"></a></div>
    </header>

    <div class="page" id="content">
        <section id="content-container">
            <div class="spinner-container">
                <div class="spinner"></div>
                <div class="text-center padding-20">
                    <h5 class="text-montserrat">KPluz works best with the latest version of Google Chrome.</h5>
                </div>                    
                <div style="display: none;">
                    <img class="svg-icon" src="/arville/kpluz0/images/subjects/png/1x/english.png" alt="">
                    <img class="svg-icon" src="/arville/kpluz0/images/subjects/png/1x/math.png" alt="">
                    <img class="svg-icon" src="/arville/kpluz0/images/subjects/png/1x/science.png" alt="">
                    <img class="svg-icon" src="/arville/kpluz0/images/subjects/png/1x/ap.png" alt="">
                    <img class="svg-icon" src="/arville/kpluz0/images/subjects/png/1x/filipino.png" alt="">
                </div>
            </div>
        </section>
        <div id="indicator"></div>
    </div>

    <footer class="padding-50 text-center">
        <span class="copyright-text">Copyright &copy; 2018 KPluz.com. All Rights Reserved.</span>
    </footer>
</body>

<script src="/arville/kpluz0/app/js/script.js"></script>

<?php 
if (!empty($scripts_list) && is_array($scripts_list)) {
    foreach ($scripts_list as $script) {
        echo '<script src="/arville/kpluz0/app/js/'.$script.'"></script>';
    }
}
?></html>