<?php
// auth.php – place at the VERY TOP of every protected .php file
session_name('ARVILLE_SESSION');
session_start();
if (!isset($_SESSION['user_id'])) {
    // Try MIEL_SESSION
    session_write_close();
    session_name('MIEL_SESSION');
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}
// If we reach here, user is logged in.
?>