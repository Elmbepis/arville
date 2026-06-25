<?php
/**
 * Validate user login via session (modernized for grades 0-10)
 * Sets global $username and $grd for use in layout.php and other pages.
 */
function kpluz_validate_login() {
    // Start session if not already active
    if (session_status() === PHP_SESSION_NONE) {
        session_name('KPLUZ_SESSION');
        session_start();
    }

    // Check if user is logged in
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Not logged in – redirect to login page
        header("Location: /login.php");
        exit();
    }

    // Set global variables from session
    $GLOBALS['username'] = $_SESSION['user_name'] ?? '';
    $GLOBALS['grd']      = $_SESSION['user_grade'] ?? 0;
    $GLOBALS['role']     = $_SESSION['user_role'] ?? 'student';
    $GLOBALS['user_id']  = $_SESSION['user_id'] ?? 0;

    // Optionally, you may want to set subject&#8209;specific flags based on username prefix
    // (e.g., $mpluzschool, $spluzschool, $epluzschool) to maintain compatibility.
    // These are not required if you handle redirects in layout.php, but can be added.
    $username = $GLOBALS['username'];
    if (substr($username, 0, 4) == "kpzm") {
        $GLOBALS['mpluzschool'] = "yes";
    } elseif (substr($username, 0, 4) == "kpzs") {
        $GLOBALS['spluzschool'] = "yes";
    } elseif (substr($username, 0, 4) == "kpze") {
        $GLOBALS['epluzschool'] = "yes";
    }
    // Default for other prefixes – you can extend as needed.
}
?>