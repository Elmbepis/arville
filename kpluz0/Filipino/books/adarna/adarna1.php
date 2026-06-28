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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg')">

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
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											I. Ang Kaharian ng Berbanya</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 16pt">
											&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 16pt">
											&nbsp;</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Oh, Birhen kaibi-ibig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ina naming nasa&nbsp; langit,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											liwanagan yaring isip nang sa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											iyo&#39;y di malihis.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ako&#39;y isang hamak lamang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											taong lupa ang katawan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahina ang kaisipan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at maulap ang pananaw.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; text-indent: .5in; margin-left: .5in; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Malimit na makagawa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng hakbang na pasaliwa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang tumpak kong ninanasa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung mayari&nbsp; ay pahidwa.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Labis yaring pangamba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na lumayag na mag-isa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											baka kung mapalaot na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang mamangka&#39;y di makaya.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya, Inang matangkakal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ako&#39;y iyong patnubayan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang &nbsp;mawasto&nbsp; sa pagbanghay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nitong kakathaing buhay.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											At sa tanang nariritong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nalilimping maginoo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kahilinga&#39;y dinggin niyo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											buhay na aawitin ko.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; text-indent: .5in; margin-left: .5in; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Noong mga unang araw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sang-ayon sa kasaysayan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Berbanyang kaharian</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay may Haring hinangaan.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa kanyang pamamahala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaharia&#39;y nanagana,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maginoo man at dukha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tumanggap ng wastong pala.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Bawa&#39;t utos na balakin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kanya lamang&nbsp; pairalin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung kanya nang napaglining.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya bawa&#39;t kamalian,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bago bigyang kahatula&#39;y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nililimi sa katwiran.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Pangalan ng Haring ito</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay mabunying Don Fernando,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa iba mang <i>reino&#39;y</i></span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tinitingnang maginoo.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kabiyak ng puso niya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay is Dona Valeriana,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ganda&#39;y walang pangalawa&#39;t</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa bait ay uliran pa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sila ay may tatlong anak,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tatlong bunga nang pagliyag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											binata na&#39;t&nbsp; magigilas,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa reyno ay siyang lakas.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Si Don Pedro&nbsp; ang panganay ,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may tindig na pagkainam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											gulang nito ay sinundan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ni Don Diegong malumanay.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang pangatlo&#39;y siyang bunso ,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Juan na ang puso&#39;y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sutlang kahit na mapugto</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay puso ring may pagsuyo.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Anak na kung palayawa&#39;y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333"><i>
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sumisikat na isang Araw,</span></i></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaya higit kaninuman,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa ama ay siyang mahal.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Salang mawalay sa mata</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng butihing ama&#39;t ina</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sandaling di makita</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang akala&#39;y nawala na.</span></font></p>
											<p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa pag-ibig ng magulang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga anak ay dumangal,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maagang pinaturuan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng dunong na kailangan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											May paniwala ang ama</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na di ngayo&#39;t Hari siya,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maging mangmang man ang bunga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa kutya ay liglas sila.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Alam niyang itong tao</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kahit puno&#39;t maginoo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kapag hungkag din ang ulo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											batong agnas sa palasyo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya&#39;t anong kagalakan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng sa Hari ay kinamtan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang ang tatlong minamahal, </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											marunong na tinanghal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tinatawag na&#39;t ang pahayag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kayong tatlo&#39;y mapapalad, </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											angkin ninyo ang mataas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na pangalang mga pantas.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Yamang ngayo&#39;y panahon nang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kayong tatlo&#39;y tumalaga,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mili kayo sa dalawa;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magpari o magkorona?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tugon nilang malumanay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa magandang katanungan:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Maghawak ng kaharia&#39;t</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bayan nila&#39;y paglingkuran.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa gayon ay minagaling</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nitong amang may paggiliw, </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tatlong anak ay sanayin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa paghawak ng patalim.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Taglay ng malaking hilig,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sanaya&#39;y nakasulit;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bawa&#39;t isa kung ihagkis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sandata&#39;y parang lintik.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Natupad nang lahat-lahat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sa Harig mga hangad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ito namang tatlong anak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa ama&#39;y napasalamat.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang kanilang kaharian</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay lalo pang nagtumibay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											walang gulong&nbsp; dumadalaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											umunlad ang kabuhayan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kasayaha&#39;y walang oras</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo&#39;y may halakhak,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ibong laya&#39;t walang hirap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang lahat na ay pangarap.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngunit&nbsp; itong ating buhay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											talinghagang di malaman</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											matulog ka nang mahusay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magigising nang may lumbay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ganito ang napagsapit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Haring kaibig-ibig,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang siya ay managinip</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											isang gabing naiidlip,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Diumano&#39;y si Don Juang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bunso niyang minamahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay nililo at pinatay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng dalawang tampalasan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nang patay na&#39;y inihulog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa balong hindi matarok;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Hari sa kanyang tulog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nagising na nang may lunos.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa laki ng kalumbayan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											di na siya nagpahimlay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nalimbag sa gunamgunam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang buong napanaginipan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Mula noo&#39;y nahapis na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kumain man ay ano pa!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Luha at buntung-hininga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang aliw sa pag-iisa!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Dahil dito&#39;y nangayayat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naging parang buto&#39;t balat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naratay na&#39;t nababakas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang dating ng huling oras.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nagpatawag ng mediko,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											yaong marunong sa reyno,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											di nahulaan kung ano</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sakit ni Don Fernando.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya ba ang mga anak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pati and Reynang liyag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dalamhati&#39;y di masukat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											araw-gabi&#39;y may bagabag.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa kalooban ng Diyos</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may nakuhang manggagamot,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ito nga ang nakatalos</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sakit ng Haring bantog.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sakit mo po, Haring mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay bunga ng panagimpan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mabigat man at maselan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may mabisang kagamutan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;May isang ibong maganda</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang pangalan ay Adarna,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pag narinig mong kumanta</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sakit&nbsp; ay giginhawa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ibong ito ‘y tumatahan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Tabor na kabundukan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kahoy na hinahapuna&#39;y,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Piedras Platas na makinang.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kung araw ay walang roo&#39;t</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa malayang mga burol,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kasama ng ibang ibong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nangagpapawi ng gutom.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Gabi ng katahimika&#39;t</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											payapa sa kabundukan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung umuwi at humimlay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa kahoy na kanyang bahay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kaya, mahal na Monarka,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											iyon po ang ipakuha&#39;t</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											gagaling na walang sala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sakit mong dinadala&quot;.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nang sa Haring&nbsp; mapakinggan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang hatol na kagamutan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kapagdaka&#39;y inutusan&nbsp; </span></font>
											</p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang anak&nbsp; niyang panganay.</span></font></p>
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