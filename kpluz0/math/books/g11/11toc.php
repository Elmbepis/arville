<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
	
	if (substr($username,4,1)=="A"){header("Location: 11Atoc1.php");}
	if (substr($username,4,1)=="B"){header("Location: 11Htoc1.php");}
	if (substr($username,4,1)=="C"){header("Location: 11Stoc1.php");}

	
}
?> 
