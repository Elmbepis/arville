<?php

//session_start();
//if(isset($_SESSION['menu2']) and $_SESSION['menu2']=="yes"){header("Location: /menu.php");}}

/* an array of javascript files to insert into the page */
// $scripts_list = array('main.js');
$scripts_list = array('main_no_modules.js');
$styles_list = array();

/* layout.php contains the standard layout for internal pages */
require_once('layout.php');

?>