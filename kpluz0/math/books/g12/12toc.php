<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
	
	if (substr($username,4,1)=="M"){header("Location: 12Atoc1.php");}
	if (substr($username,4,1)=="N"){header("Location: 12Htoc1.php");}
	if (substr($username,4,1)=="P"){header("Location: 12Stoc1.php");}

	
}
?> 
