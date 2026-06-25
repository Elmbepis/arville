<?php 

if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']))
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
    if ($username!="" and $pass!=""){
    
	//KPLUZ accounts:
	require 'offset.php';	
	$kpluzbase = $offset+9876+ord(substr($username,0,1))*ord(substr($username,2,1))*318+ord(substr($username,1,1))*ord(substr($username,3,1))*1113+substr($username,4,1)*substr($username,5,1)*825+substr($username,6,1)*substr($username,7,1)*115+ord(substr($username,0,1))*substr($username,6,1)*712+substr($username,7,1)*substr($username,7,1)*16*1989;
	$validpass0=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1234+234;
	$validpass1=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1345+345;
	$validpass2=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1456+456;
	$validpass3=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1567+567;
	$validpass4=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1678+678;
	$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	$validpass11=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*1989+416;
	$validpass12=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*1965+318;

	if (
		$pass != $validpass0 and $pass != $validpass1 and $pass != $validpass2 and $pass != $validpass3 and $pass != $validpass4 and $pass != $validpass5 and 
		$pass != $validpass6 and $pass != $validpass7 and $pass != $validpass8 and $pass != $validpass9 and $pass != $validpass10	and $pass != $validpass11	and $pass != $validpass12		
		) 
		{header("Location: /logout.php");}	
	
	}

	if ($pass==$validpass0){header("Location: /gmrc/modules/grd0.php");}
	if ($pass==$validpass1){header("Location: /gmrc/modules/grd1.php");}
	if ($pass==$validpass2){header("Location: /gmrc/modules/grd2.php");}
	if ($pass==$validpass3){header("Location: /gmrc/modules/grd3.php");}
	if ($pass==$validpass4){header("Location: /gmrc/modules/grd4.php");}
	if ($pass==$validpass5){header("Location: /gmrc/modules/grd5.php");}
	if ($pass==$validpass6){header("Location: /gmrc/modules/grd6.php");}
	if ($pass==$validpass7){header("Location: /gmrc/modules/grd7.php");}
	if ($pass==$validpass8){header("Location: /gmrc/modules/grd8.php");}
	if ($pass==$validpass9){header("Location: /gmrc/modules/grd9.php");}
	if ($pass==$validpass10){header("Location: /gmrc/modules/grd10.php");}
	if ($pass==$validpass11){header("Location: /gmrc/modules/grd11.php");}
	if ($pass==$validpass12){header("Location: /gmrc/modules/grd12.php");}

	if (substr($username,0,4)=="kpzm"){header("Location: /home-math.php");}
	if (substr($username,0,4)=="kpzs"){header("Location: /home-science.php");}
	if (substr($username,0,4)=="kpze"){header("Location: /home-english.php");}
	
}
else{header("Location: /login.php");}
?> 

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
</head>

<body>

</body>

</html>
