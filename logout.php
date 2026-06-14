<?php
// logout.php – destroys both ARVILLE and MIEL sessions
session_name('ARVILLE_SESSION');
session_start();
session_destroy();

session_name('MIEL_SESSION');
session_start();
session_destroy();

// Redirect to homepage
header('Location: index.php');
exit;
?>