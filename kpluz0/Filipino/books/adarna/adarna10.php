<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
 	require '../../../offset.php';
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
	
	if ($pass==$validpass0){$grd=0;}			
	if ($pass==$validpass1){$grd=1;}			
	if ($pass==$validpass2){$grd=2;}			
	if ($pass==$validpass3){$grd=3;}			
	if ($pass==$validpass4){$grd=4;}			
	if ($pass==$validpass5){$grd=5;}			
	if ($pass==$validpass6){$grd=6;}			
	if ($pass==$validpass7){$grd=7;}			
	if ($pass==$validpass8){$grd=8;}			
	if ($pass==$validpass9){$grd=9;}			
	if ($pass==$validpass10){$grd=10;}			
	
	if (
		$pass != $validpass0 and $pass != $validpass1 and $pass != $validpass2 and $pass != $validpass3 and $pass != $validpass4 and $pass != $validpass5 
		and $pass != $validpass6 and $pass != $validpass7 and $pass != $validpass8 and $pass != $validpass9 and $pass != $validpass10
		) 
		
	{
	header("Location: /logout.php"); 
	}
	
	
}
//if there is no cookie, require a log-in
else
	{
	header("Location: /login.php"); 
	}
session_start();
if ($_SESSION['level']=="")
{$_SESSION['level']="Easy";}
?>



<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Ibong Adarna - Filipino sa KPluz.com</title>
<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
</head>

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg', /*url*/'../images/backb.jpg')">

<div align="center">

<table width="900"><tr><td height="100">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0">
			<tr>
				<td width="193" height="100" valign="top">
				<a href="/home-filipino.php">
				<img border="0" src="../../../images/header-logo.jpg"></a></td>
				<td width="133" valign="top">
										<a href="/how-to-use-kpluz.php">
										<img border="0" id="img1" src="../../../images/header1a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/header1b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/header1a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/header1c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/header1b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/bluebars_student.php">
										<img border="0" id="img2" src="../../../images/header2a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../../images/header2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../../images/header2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../../images/header2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../../images/header2b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/programs.php">
										<img border="0" id="img3" src="../../../images/header3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../../images/header3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../../images/header3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../../images/header3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../../images/header3b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/community.php">
										<img border="0" id="img4" src="../../../images/header4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../../images/header4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../../images/header4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../../images/header4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../../images/header4b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/contact.php">
										<img border="0" id="img5" src="../../../images/header5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../../images/header5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../../images/header5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../../images/header5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../../images/header5b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/logout.php">
										<img border="0" id="img6" src="../../../images/header6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../../images/header6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../../images/header6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../../images/header6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../../images/header6b.jpg')"></a></td>
			</tr>
		</table>
	</div>
	</td></tr></table>

</div>

	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
					<tr>
						<td>
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table51">
							<tr>
								<td height="45" valign="bottom">
								<img border="0" src="../../../images/lessons-gen-top.jpg"></td>
							</tr>
							<tr>
								<td valign="bottom" >
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										Ibong Adarna</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<span style="font-weight: 700">
											<font face="Arial" style="font-size: 16pt" color="#0000CC">
											X</font></span><font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">. </font>
											<font color="#0000CC"><b>
											<span lang="EN-US" style="font-size: 16pt; font-family: Arial">
											&nbsp;Si Donya Leonora</span></b></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											&nbsp;</p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kaya halika na hirang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ang balon ay panawan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tayo na sa kaharian</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng aking mga magulang.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Oh, Don Juang sinta</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											diyata't aalis katang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dito ay maiiwan pa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang bunso kong si Leonora?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Si Leonora'y kapatid kong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kasama sa balong ito,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naririyan sa palasyong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dito'y tanaw na tanaw mo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Parunan mo at sunduin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa ngalan ko ay sabihing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											siya'y parito ngayon din</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ibig kong kausapin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ngunit irog, may pangamba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang pagsundo mo sa kanya;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may tangkilik kay Leonora</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay Serpyente at Palamara.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang Serpyente ay matapang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sanay siya sa pagpatay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pitong ulo maputol man</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nasusugpong kapagkuwan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;O, Don Juan, laking lunos</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sa aki'y lumulunod,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											muli ka pang makihamok</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay di ko na itutulot.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pangamba kong masawi ka't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkaawa kay Leonora,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											laso't tinik na .. ewan ba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung pano kong mababata...?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Bakit kaya yaring buhay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											saliwa sa kapalaran:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lumigaya'y mamamanglaw,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mamamanglaw ay kamatayan?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hinagpis ni Donya Juana</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Prinsipe'y nagpasigla</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											takot ay di nakilala't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sakuna tumalaga.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nagpaalam at ang wika:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Prinsesa kong kasi't mutya,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											yaring buhay kung maaba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											palad ko na ang mawala.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ano't ako'y masisindak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung ito ang aking palad?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ipaglingkod yaring lakas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahamak kung mapahamak.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Anong tamis ng mamatay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung lugod ng minamahal!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Anong saklap ng mabuhay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung duwag na tuturingan!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Huwag manghihilahil</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may awa ang Inang Birhen,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa magandang nasa natin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay di niya hahabagin.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Lumakad nang patuluyan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											puso'y walang agam-agam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Diyos ang tinatawagan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa darating na kapalaran.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa palasyo'y nakadungaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Si Leonorang matimtiman,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipe nang matanaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											biglang nagulumihanan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nabigla itong Prinsesa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa taong kanyang nakita,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Jua'y napatanga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyong pagkaganda.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang palasyo kung munti man</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay malaking kayamanan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											walang hindi gintong lantay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang doon ay tititigan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Palamuti sa bintana</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkaliit isang mutya;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											perlas, rubing tila luha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng langit sa abang lupa!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa gitna ng mga perlas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tala manding namanaag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Leonorang pagkarilag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipe'y napakurap!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Natikom ang kanyang bibig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dila ay parang napagkit,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga matang nakatitig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alitaptap na namitig!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya lamang nakahuma</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang simulan ni Leonora:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;O, pangahas sino ka ba?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ano ang iyong pita?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Aba, palaba ng Buwan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tala sa madaling-araw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hingi ko'y kapatawaran</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa aking kapangahasan.</span></font></p>
											<p class="MsoNormal" style="margin-top: 0; margin-bottom: 0">
											<font face="Arial,sans-serif" style="font-size: 15pt" color="#333333">
											<span lang="EN-US">&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sa mahal mong mga yapak,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alipin mo akong tapat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											humahalik at ang hangad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maglingkod sa iyong dilag.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di mo baga nalalamang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Mapanganib iyang buhay;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Serpyente kong matapang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											walang salang mamamatay?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Mapanganib man ngang lubha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ano pa ang magagawa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung palad kong masaliwa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tanggapin ang pagkadusta.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Hindi gaanong masaklap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na mapatay ng kalamas,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa akin ang dusa't hirap,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											masawi sa iyong linpag.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ikaw baga'y nagbibiro</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											O ako'y sinisiphayo?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hayo't dito ay lumayo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											taong lubhang mapaglako.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Hindi kita kailangan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ni makita sa harapan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											umalis ka't manghinayang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa makikitil mong buhay.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang Prinsipe'y di tuminag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa anyong kahabag-habag;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											idinaing din ang hirap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng pagsinta niyang tapat.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pinopoon kong Prinsesa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											galit mo po ay magbawa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung ako ma'y nagkasala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ito'y dahil sa pagsinta.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Dangat ako'y nagkapuso</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na pinukaw ng pagsuyo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa dilag mo'y kailan ko pa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											matanggap ang pagsiphayo?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Labis-labis ang paggalang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa iyo pong kamahalan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hingin man nga yaring buhay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa galit mo po ay kulang.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Gasino na yaring palad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na hamak sa lalong hamak,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung may daan pang tumaas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang sa iyo'y maging dapat.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sa iyong kapangyarihan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sino kaya ang susuway?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngunit ang di ko malama'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang gagawin kong pagpanaw.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Suwayin ang iyong nais</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pinid sa akin ang langit;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lumayo sa iyong titig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hininga ko'y mapapatid.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa gipit kong kalagayang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											walang hindi kasawian</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ikaw na Prinsesang mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang magbibigay kahatulan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Itong mga huling hibik</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kay Leonora nang marinig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nagmaliw ang angking galit,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagsinta'y napasa-dibdib.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Naawa't sa pagkaawa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang puso ay lumuluha,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											danga't hindi nahihiya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											niyapos ang may dalita.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Lihim niyang pagkahabag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa titig naipahayag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											isang titig na malingap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na langit na ng pagliyag.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Saka masuyong lumapit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Prinsipeng nahahapis,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ang wikang pagkatamis:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di rin ako nakatiis...&quot;</span></font></p>
											<p class="MsoNormal" style="margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Isang titig na mairog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											matamis pa kaysa pulot,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang tumama sa maylunos</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa puso nito tumagos.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nang tumagos na sa puso</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											saka lamang napaghulong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											silang dati'y magkalayo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sandali ay nabuo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nabuo at nang huwag nang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											paglayuin ng pagsinta</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang magtaksil sa kanila</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Diyos ay may parusa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ito na nga ang bumasag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa katahimikang maluwat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Juan ay tinawag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ni Leonora sa itaas.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Prinsipe ikaw'y pumanhik</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dito na tayo magniig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bahay ko ma'y di marikit,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											payapa't di-maligalig.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa prinsipe ay nabuksan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang pinto ng kalangitan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											noon niya naramdamang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hirap niya'y nabihisan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Prinsesa kong pinopoon</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											salamat sa pag-ampon,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mag-utos ka't umayon</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											itong lingkod mula ngayon.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Unang ibig kong malaman</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung paano mo natuklasan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											itong lihim kong tahanan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa liblib ng kabundukan?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Prinsesa kong kasi't mutya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang nangyari'y talinghaga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hamak yaring aking dila</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na magsaysay ng himala.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Isang gabing kalaliman</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Na ako ay nahihimlay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ginising ng panagimpang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											balong ito ay tinuran.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ito'y, anya, ay lakbayi't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagsikapan kong hanapin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magdusa mang sapin-sapi</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may ligayang tatamuhin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Narito raw yaong talang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lunas sa aking dalita,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											talang ito ay ikaw nga,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											O, Leonora kong mutya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pagkat lihim itong balon</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sinong taong sakdal dunong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang dito'y makatutulong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kundi Diyos ang may ampon?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sa Diyos na ngang talaga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sa iyo'y pagkakita</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaya, mabunying Prinsesa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lunasan mo yaring dusa.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Don Jua'y di ko nais</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											habagin ka sa paghibik</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung sa iyo ma'y nagalit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											subok lamang ng pag-ibig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sinusubok ko nga lamang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung ang puso mo'y marangal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ugali ng alinlanga't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alaalang pagtaksilan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pagkat marami sa puso</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											talu-sira sa pangako,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pagsinta'y mapagbiro't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											matuwaing sumiphayo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pipitasin ang bulaklak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tangkay na nag-iingat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahal habang di pakupas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pag nalanta ay sa layak!&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Leonora kong minamahal,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											O, buhay ng aking buhay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa puso ko't katauha'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											wala ka nang kalantahan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Bulaklak ka ng pag-ibig,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pabango sa aking dibdib,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tuwing ako'y mahahapis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lunas na ang iyong titig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sa pagtulog at paggising</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ikaw ang aking salamin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mata ko ma'y mangulimlim</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											liwanag mo'y iilawin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kaya, wariin na, giliw ko,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alapaap sa puso mo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tibay ng iyong 'oo'</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ikaw ay aki't ako'y iyo.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Pag-uusap na matamis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng magkasi ay napatid</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang umugong ay yumanig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lupa't palasyong matarik.</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 15pt" color="#800080">
																	<a href="adarna-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	mga 
																	Nilalaman ng 
																	Ibong Adarna</font></a></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<span style="font-size: 15pt">
											<font face="Arial">
											&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
<a href="../fbooks-hs.php">
											
<img border="0" id="img8" src="../images/backa.jpg" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img8',/*url*/'../images/backb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img8',/*url*/'../images/backa.jpg')"  fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></a></font></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
										</div>
										</td>
									</tr>
								</table>
								<img border="0" src="../../../images/lessons-gen-bottom.jpg" width="900" ></td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td bgcolor="#0086CE">
			<p align="center" style="margin-top: 5px; margin-bottom: 5px">
            <font style="font-size: 10pt"><span style="mso-spacerun: yes">
			<font face="Arial" color="#FFFFFF">
            Copyright&nbsp; 2010
        </font><b><font face="Arial" color="#365669">
        	<a href="/home-filipino.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>