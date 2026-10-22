<?php
require_once('util/functions.php');
kpluz_validate_login();
// No redirects – just display the menu

// Compute base URL path — works in dev (/arville/kpluz0) and prod (/kpluz0).
$base = '';
$sn   = $_SERVER['SCRIPT_NAME'] ?? '';
$pos  = strrpos($sn, '/app/');
if ($pos !== false) $base = substr($sn, 0, $pos);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KPluz - Online Academic Excellence System</title>
    <link rel="icon" href="<?php echo $base; ?>/images/1x/favicon.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Montserrat:100,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="<?php echo $base; ?>/app/css/style.css">
    <link rel="stylesheet" href="<?php echo $base; ?>/app/css/app.css">

    <?php
    if (!empty($styles_list) && is_array($styles_list)) {
        foreach ($styles_list as $style) {
            echo '<link rel="stylesheet" href="' . $base . '/app/css/' . $style . '">';
        }
    }
    ?>

    <script src="<?php echo $base; ?>/app/js/lib/react-js/react.js"></script>
    <script src="<?php echo $base; ?>/app/js/lib/react-js/react-dom.js"></script>
    <script src="<?php echo $base; ?>/app/js/lib/scrollmagic/minified/ScrollMagic.min.js"></script>

    <script>window.KPLUZ_BASE = '<?php echo $base; ?>';</script>

    <?php /* Runtime path shim:
             1) Rewrites legacy /arville/kpluz0/ base &#8594; $base (dev == no-op)
             2) Routes subject-menu links through home-subj.php?subj=X so
                case/fallback logic applies. Path rewriting only. */ ?>
    <script>
    (function() {
        var OLD = '/arville/kpluz0';
        var NEW = window.KPLUZ_BASE || '';

        function rewriteValue(name, value) {
            if (typeof value !== 'string') return value;

            // 1) Base rewrite (dev: OLD === NEW, so no-op)
            if (OLD && OLD !== NEW && value.indexOf(OLD + '/') === 0) {
                value = NEW + value.substring(OLD.length);
            }

            // 2) Route subject menu links through home-subj.php
            if (name === 'href') {
                var m = value.match(/^(.*?)\/([A-Za-z]+)\/modules\/([A-Za-z]+)-menu\.php$/);
                if (m && m[2].toLowerCase() === m[3].toLowerCase()) {
                    value = m[1] + '/home-subj.php?subj=' + m[3].toLowerCase();
                }
            }
            return value;
        }

        // Patch setAttribute (catches JS-created elements before insertion)
        var origSet = Element.prototype.setAttribute;
        Element.prototype.setAttribute = function(name, value) {
            return origSet.call(this, name, rewriteValue(name, value));
        };

        // Backstop for property-setters (.src, .href) and style attrs
        function fixEl(el) {
            if (!el || el.nodeType !== 1) return;
            ['src', 'href'].forEach(function(a) {
                var v = el.getAttribute && el.getAttribute(a);
                var w = rewriteValue(a, v);
                if (w !== v) el.setAttribute(a, w);
            });
            var s = el.getAttribute && el.getAttribute('style');
            if (s && OLD && OLD !== NEW && s.indexOf(OLD + '/') !== -1) {
                el.setAttribute('style', s.split(OLD + '/').join(NEW + '/'));
            }
        }
        new MutationObserver(function(ms) {
            ms.forEach(function(m) {
                if (m.type === 'childList') {
                    m.addedNodes.forEach(function(n) {
                        if (n.nodeType === 1) {
                            fixEl(n);
                            if (n.querySelectorAll) {
                                var els = n.querySelectorAll('[src], [href], [style]');
                                for (var i = 0; i < els.length; i++) fixEl(els[i]);
                            }
                        }
                    });
                }
            });
        }).observe(document.documentElement, { childList: true, subtree: true });
    })();
    </script>

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
                    <li class="text-center" id="home-link"><a href="<?php echo $base; ?>/app/menu.php"><img src="<?php echo $base; ?>/images/svg/kpluz_logo_no_sub.svg" alt="KPluz"></a></li>
                    <li class="text-center"><a href="<?php echo $base; ?>/how-to-use-kpluz.php">How To Use KPluz</a></li>
                    <li class="text-center"><a href="<?php echo $base; ?>/community.php">Community</a></li>
                    <li class="text-center"><a href="<?php echo $base; ?>/contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="nav-icons">
                <ul class="menu">
                    <li class="text-center"><a href=""><img src="<?php echo $base; ?>/images/svg/icon_game.svg" alt="Games">Games</a></li>
                    <li class="text-center"><a href="<?php echo $base; ?>/bluebars_student.php"><img src="<?php echo $base; ?>/images/svg/icon_bars.svg" alt="Blue Bars">My Blue Bars</a></li>
                    <li class="text-center"><a href="<?php echo $base; ?>/logout.php"><img src="<?php echo $base; ?>/images/svg/icon_logout.svg" alt="Logout">Logout</a></li>
                </ul>
            </div>
        </div>
        <div id="toggle-container"></div>
        <div class="mobile-home-link"><a href="<?php echo $base; ?>/app/menu.php"><img src="<?php echo $base; ?>/images/svg/kpluz_logo_no_sub.svg" alt="KPluz"></a></div>
    </header>

    <div class="page" id="content">
        <section id="content-container">
            <div class="spinner-container">
                <div class="spinner"></div>
                <div class="text-center padding-20">
                    <h5 class="text-montserrat">KPluz works best with the latest version of Google Chrome.</h5>
                </div>
                <div style="display: none;">
                    <img class="svg-icon" src="<?php echo $base; ?>/images/subjects/png/1x/english.png" alt="">
                    <img class="svg-icon" src="<?php echo $base; ?>/images/subjects/png/1x/math.png" alt="">
                    <img class="svg-icon" src="<?php echo $base; ?>/images/subjects/png/1x/science.png" alt="">
                    <img class="svg-icon" src="<?php echo $base; ?>/images/subjects/png/1x/ap.png" alt="">
                    <img class="svg-icon" src="<?php echo $base; ?>/images/subjects/png/1x/filipino.png" alt="">
                </div>
            </div>
        </section>
        <div id="indicator"></div>
    </div>

    <footer class="padding-50 text-center">
        <span class="copyright-text">Copyright &copy; 2018 KPluz.com. All Rights Reserved.</span>
    </footer>
</body>

<script src="<?php echo $base; ?>/app/js/script.js"></script>

<?php
if (!empty($scripts_list) && is_array($scripts_list)) {
    foreach ($scripts_list as $script) {
        echo '<script src="' . $base . '/app/js/' . $script . '"></script>';
    }
}
?></html>