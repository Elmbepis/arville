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
											XXII</font></span><font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">.&nbsp; </font>
											<font color="#0000CC">
											<b><span lang="EN-US" style="font-size: 16pt; font-family: Arial">Ikaanim at Huling</span></b></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font color="#0000CC">
											<b>
											<span lang="EN-US" style="font-size: 16pt; font-family: Arial">Pagsubok ni Haring Salermo</span></b></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											&nbsp;</p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Panibagong pag-iisip</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sa Hari ay nagtalik,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tila mahirap magahis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang subyang sa kanyang dibdib.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Muling ipinasundo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipeng nanunuyo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											matapos niyang mabuo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa isip ang bagong hibo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Pagharap na ni Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay ganito ang tinuran:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kay laki nang kapagalan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sa iyo'y aking utang.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;O, Don Juan, aywan ko ba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung mababayaran pa kita,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bakit naging sakit ko nang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa iyo ay makapita.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Gaya ngayon nitong lagay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkat marami nang utang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang hiya ko'y humahadlang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magtapat ng kahilingan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di ko naman maihanap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng ibang makatutupad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkat lubos kong talastas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nasa iyo yaong lunas.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Mahal na Haring Salermo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											di miminsang nasabi ko</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											itong abang pagkatao'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alipin ng utos ninyo.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Don Juan, maraming salamat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa puso mong mapagtapat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hininga ko ay lumuwag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang hiling ko'y matutupad.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Yamang ako ay binigyan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng luwag sa kahilingan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											manainga, O Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngayon aking tuturan:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di ba tayo ay naglakad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa kastilyong nasa dagat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											noon nga ay napahamak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											O, sayang ang aking hiyas.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang singsing kong minamahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung bakit ko nalingatang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa daliri, ay natanggal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nahulog sa karagatan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kung maluwag sa loob mo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngayon sana ang ibig ko.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kunin saan pa man dako't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											saka na mag-usap tayo.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Haring Salermong marangal,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mamayapa ang kahilingan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kahit ko na ikamatay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kayo'y di ko masusuway.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;At hangad ko kung makuha'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magigisnan sa umaga,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa unan ko'y makikitang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											iyon din at hindi iba.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pangako ko, Haring mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hindi ako magkukulang,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ano yaring mahihintay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung kayo ay paglakuan?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Karaniwang ugaliin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nitong Haring mapaghiling</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											taong kanyang hihiliin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay ngitian nang palihim.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Palihim nga pagka't ayaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahalata ang pag-uyam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kausap ay nililibang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa salitang maiinam.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngiting ito'y ngiting taksil</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pangako't sinungaling,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa mabuting sasabihin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may masamang nalilihim.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Alam ito ni Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit kanyang pinaparam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa buhay ng manliligaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											.ang mapakla'y malinamnam.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Naghiwalay ang dalawa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hari'y may pabaong tawa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipe ay masaya't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Hari ay nakilala.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tinugtog ang ikasiyam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng gabing kaliwanagan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang magkasi'y nag-ulayaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa hardin ng paliguan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Dito nga sila nagkita</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											upang muling maalaala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											yaong hapong pagkasayang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											saksi sa pagkikilala.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hapong siyang idinatal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mula sa Berbanyang bayan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Prinsipeng si Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											agila ang kaalakbay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hapong unang pagkamalas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa dilag ng mga dilag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bulaklak na walang kupas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na laon nang pinangarap.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hapong natigmak ng luha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng pusong napaaawa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hapong sa awa'y sagana</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng pusong tapat sa sumpa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Don Juan, iyong sabihin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang utos ng Hari natin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang ngayo'y aking malining</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ang gabi'y lumalalim.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang singsing daw ng ama mo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay nawalang di naino,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngayong gabi'y hanapin ko't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kailangan niyang totoo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;May diyamante yaong singsing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tubig ma'y nagniningning</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nahulog at napaglining,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na sa dagat napalibing.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Bili't-biling pagkakuha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magisnan sa unan niya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at kung wala, sa umaga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang buhay ko'y mapapaka.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ito'y pamumuhunanan,&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											anang Prinsesang nalumbay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;ng panganib at ng buhay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bago tayo magtagumpay.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang Prinsesa ay kumuha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng isang batyang maganda,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											isang itak na hasa na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may sangkalan at hapag pa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tumugpa sila sa dagat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa batya't lumulan agad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											napalaot na maingat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa gitna sila tumambad.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Don Juan,&quot; anang Prinsesa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;lakasan ang loob sana,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											iwaksi mo ang pangamba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											upang magtagumpay kita.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngayon ako'y tadtarin mo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tadtarin mong pinung pino,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit ingatang totoo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may matapong kapiraso.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kung tadtad na ay ihulog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang sa tubig ay lumubog,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											katawan kong durug-durog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											isdang sisisid sa pusod.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Habang ako ay wala pa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											huwag kang matutulog sana.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											gagawin mo'y mag-abang ka't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											paglitaw ko ay taon na.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Dala ko na yaong singsing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa daliri ko kukunin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											huwag sanang lilimutin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang lahat kong mga bilin.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Gawa na ang lahat-lahat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsesa ay natadtad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											isdang-buhay na sa dagat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang singsing ay hinahanap.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Paghanap ay natagalan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang di gayun-gayon lamang,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nakatulog si Don Jua't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang pangako'y nalimutan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Siyang paglitaw sa tubig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Prinsesa't umaawit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit itong napaidlip</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tulog ay nagtatalik.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sumisid upang maghintay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lumitaw na namamanglaw,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang singsing na ibibigay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											walang umabot na kamay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Muli na namang sumisid</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											upang paramin ang hapis,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang lumitaw ay may galit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ang batya ay tinabig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngunit itong natutulog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											di man lamang binangungot,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsesa ay napagod</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang singsing ay inihulog.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											At umahon na sa batya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang katawa'y patang-pata,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tampo't hapis, hikbi't luha'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											gumising sa nagpabaya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Tingnan mo nga, aking mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang nangyaring kabiguan,&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang nasabing nalulumbay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Prinsesa kay Don Juan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di ba aking pakiusap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na huwag kang malilingat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											paglitaw ko'y kunin agad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang singsing na aking hawak?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di mo lamang nalalaman</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaya kita kailanga'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang singsing kung aking tangan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahirap akong lumitaw.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Tingnan mo kung anong oras</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ganap ngayong ikaapat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung kay ama ay mabunyag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											malaking pagkapahamak.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Walang salang ako't ikaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tatanggap ng kamatayan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa munti mong pagkukulang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											anong laking kabayaran!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Danga't kita'y di matiis,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa nangyaring ito'y labis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bawiin ko ang pag-ibig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at bato kang maidlip.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di ko ibig sisihin ka't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa puso ko ay mapakla,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit ikaw ang may sala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											gayon pa ma'y mahal kita.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Aksayahin nati'y huwag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang panahong lumilipas,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tadtarin mo ako agad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tubig ay muling ikalat.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pagtadtad mo ay daliin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang di tayo umagahin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hari ay baka magising</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na wala pa yaong singsing.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa pagtadtad sa Prinsesang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											oras ay hinahabol na,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tumalsik nang di napuna</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dulo ng daliri niya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Muli siyang naging isdang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											singsing ng Hari ang nasa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sasandali ang pagkapa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											umahon na't tuwang-tuwa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa batya'y muling sumakay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang singsing ay nasa kamay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hintuturo nang pagmasdan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											walang dulo at naputlan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Luha't lungkot ay tiniis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang dahilan sa pag-ibig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pangiti ri't walang hapis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na sa sinta ay nagsulit:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Tingnan mo ito, Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang daliri ko ay kulang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ito 'y iyong tatandaa't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa aki'y pagkakilanlan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa pampang ay sumapit ding</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaharia'y nahihimbing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nakauwi't nagkagising</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang di sila nangapansin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Panibagong pagtataka</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sa Hari ay bumakla,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang nawalang singsing niya'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bumulaga na sa kanya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nagulo na ang isipan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Haring di mapalagay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na kung bakit di mapatay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipeng manliligaw.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Muli siyang susubukin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung dito pa'y liligtas din,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bahala ko nang isipin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang paraang dapat gawin.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Noon din ay inutusan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang kawani niyang mahal:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Tawagin mo si Don Jua't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kami ay mayrong panayam.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Malugod din at masiglang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipe'y humarap na:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Mag-utos ng makakaya,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											minamahal kong Monarka.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Narito at nakahanda</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang aking ipagagawa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ikaw ang siyang bahalang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											buong kayang mangasiwa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Buong kaya ang sabi ko</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa dahilang ang totoo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											awa't lupit ang sa iyo'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sandatang gagamitin mo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ako'y may isang alagang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kabayong hari nang sama,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mailap at naninipa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahal sa aking lubha.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang ibig ko'y paamuin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at bumait na magaling,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kabayo ko'y gagamitin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa balak na pag-aaliw.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kunin mo sa kanyang bahay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pati mga kagamitang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahalaga sa pagsakay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											siya't pamigil na busal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngayon ay mamahinga na't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang bukas ay may lakas ka.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagpapaamo ay iba,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hirap, pagod, magkasama.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Paanong matatahimik</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang isang may iniisip,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Jua'y naiinip,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa paghihintay sa ibig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Lampas na sa takipsilim</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang ang sinta ay dumating,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang inip na humilahil</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											noon lamang naging lambing.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sabihin mo na Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang utos ng Haring mahal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa panaho'y manghinayang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											baka tayo ay maiwan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang alaga ng ama mo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na mailap na kabayo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bukas daw ay sanayin ko't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang umano raw ang diyablo.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Pakli naman ng Prinsesa:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang kabayo'y dili iba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kundi ang akin ding ama,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pagsakay mag-ingat ka.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Yaong katad na pamigil</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na may gintong nagniningning</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at ang siyang parang garing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay mga kapatid ko rin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Nasa bibig namang busal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bakal na nakasihang,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ako yao't pag tinantang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang kabayo'y masasakyan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang kabayo nga'y mailap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mabagsik at walang habag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaya magpakaingat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang hindi mapahamak.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Paglapit mo sa talian</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mata'y magbabagang tunay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magsisipa't aatungal,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kasindak-sindak pagmasdan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kapag ayaw magpasiya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maninipa at daramba,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											palo't dagok gawin mo na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hanggang mahirapan siya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Galingan mo ang pag-ilag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa damba at mga sikad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga kuko'y matatalas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											katawan mo'y mawawalat.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Madali mong mahalatang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang kabayo ay mahina,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											daloy sa mata ng luha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bulwak ng bukal na sira.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Subuan mo na ng busal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang siya'y madaling ilagay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lagay ng renda'y tibayan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tiyakin ang katatagan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang bahala nama'y ako</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa bibig nitong kabayo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkat ako nga ang preno</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											renda ang alagaan mo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang paghawak ay higpitan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											huwag mong luluwagan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at kung hindi ay asahang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											katawan mo'y maluluray.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ikaw'y biglang ililipad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											aabot sa alapaap,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hangin doon ay malakas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at sa lupa ka lalagpak.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Upang ito'y hindi abutin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											renda'y laging hihigitin,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bawat higit na gagawin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa paglipad ay pipigil.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Suwail itong kabayo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											baka ikaw ay ibato</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang marapat na gawin mo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											paluin ang kanyang ulo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kung ang ulo'y nagtitigas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lo't takid ng espuelas,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang gawin mong ubus-lakas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang manghina siya agad.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Madali mo namang mapuna</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung ang lakas ay wala na.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											luha'y dadaloy sa mata't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sasago ang laway niya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Sa gayo'y iyong lubaya't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ihatid na sa hapunan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng kabayong salanggapang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mabait sa dilang-banal&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nang masabi ng Prinsesa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang lahat ng bilin niya,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo'y nagbalik na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at naghintay ng umaga.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Umaga na at tinupad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Prinsipe yaong atas,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang kabayo'y inilabas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tinuruan ang paglakad.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Noon na napatunayan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nitong Prinsipeng mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang sama at kalupitan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng hayop na walang galang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Di pa malay na pasukin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngipin ay nanggigigil</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa talian ay umaangil</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga mata'y matatalim.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Nang lapita'y nagdaramba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nagsisipang walang bawa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nagwawa at ang pita</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Jua'y mapatay na.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang ginawa naman nito'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											binigyan ng isang tinggo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nang magdamdam na ng hilo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sumunod na parang lango.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Haba ngang tinuturuang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magbait ang salanggapang,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											palo't takid sa katawarn</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											parang lintik kung lumatay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Makailang magdarambang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang ibig ay lumipad na,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit sa higpit ng renda</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ni tumakbo'y di makuha.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang kabayo ay nahapo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											luha't laway tumutulo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga mata ay umamo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mabait nang parang suso.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ibinalik sa tahanan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahina na ang katawan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											halos di pa iniiwan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tayo'y biglang nabuwal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Muling sumapit ang gabi</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at dinalaw ang Prinsipe</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Prinsesang kanyang kasi</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na may balitang gayari:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Bukas ng pagka umaga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dito'y ipasusundo ka,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kayo nga ng aking ama'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo magkikita.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Maaari ka na ngayong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo ay magtuloy</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang panganib na daluyong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											natapos din sa panahon.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ang ama ko ay daratnang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nakahigang naghihintay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sakit nga ng katawan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ni bumangon ay aayaw.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ganyan ang balitang bigay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkasabi'y nagpaalam:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hanggang bukas nga, Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo ang panayam.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Karaniwan ang balita</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa hindi na maghahaka</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											isipin mo'y talinghaga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na may lungkot at may tuwa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kalungkuta'y makikita</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa ginawi ng Prinsesa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pagdalaw, bakit baga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											parang ngayo'y hinawa na?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Dati-dati kung dumalaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsipe'y ayaw iwan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											inaaliw kung may lumbay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at kay-tamis na suyuan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Maghinampo'y di magawa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng Prinsipeng namamangha,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alam niya't di kailang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa Prinsesa siya'y mutya.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya ba naipalagay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na baka ang amang mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mabigat ang karamdama't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dapat niyang alagaan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Katuwaan nama'y ire:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ano kayang pangyayari't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo'y minabuting</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pumanhik na ang Prinsipe?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Himala ng kapalaran</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa isa ngang nahihintay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Diyata't ang kapaita'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tatam®™s na't lilinamnam?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Mahirap nating matiyak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang ibabalita bukas,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											anuman ang nasa hagap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ipaghintay ng liwanag.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang umaga ay bumati</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kay Don Juang nagwawari,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											makailan pang sandali</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nagpasundo na ang Hari.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Bati ko sa kamahalan,&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang pahayag ng utusan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa palasyo'y hinihintay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng magandang kapalaran.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Bili't-bilin po ng Hari</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kayo sana'y magdumali,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagkat bago mananghali'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											gagawin na ang pagpili.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pagpili, pagpiling ano?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Aywan ko po, maginoo,&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Binibiro yata ako?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Hindi po't siyang totoo.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Humayo na ang dalawa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa lakad ay patakbo pa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ibong lumilipad tila</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang nais ay sumapit na.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa palasyo ay dinatnang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											daming taong naghihintay,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naroon ang karamihan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng sa Haring mga kawal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang kalihim, kasangguni</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kamag-anak nitong Hari,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naroroong nakalimpi't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kay Don Jua'y nakangiti.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Takang-taka si Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa kanya nang namamasdan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hari ay may karamdaman</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit mayroong kasayahan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hiwaga ng mga taong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hindi niya mapagsino,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maging ano pa man ito,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naroon na'y managano.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Haring makapangyarihan&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											unang bati ni Don Juan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											handog ko po ay paggalang,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa utos ay nakalaan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tugon ng Hari'y ganito:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Paumanhin ang hingi ko</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pagtanggap ko sa iyong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pagtanggap di-maginoo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ako, ngayon, O. Don Juan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											may bahagyang karamdaman,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											masasakit ang katawan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ulo ko ay may kabigatan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Gayon pa ma'y ninais kong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magkapulong ngayon tayo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											akong may utang sa iyo'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											makaganti kahit pano.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kawalang utang-na-loob</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng sarili, kung malimot</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											itong iyong paglilingkod</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na matapat nama't lubos.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kaya naman naririto't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nakahanda ang handog ko,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											buksan ngayon ang dibdib mo't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang pagpili'y nasa iyo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hari'y agad nang nagtindig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa kanyang pagkahihilig,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Juan ay kinawit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											humarap sa tatlong silid.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Tatlong silid ay may butas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pintua'y namamalas.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											naroroon ang tatlong anak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga talang sakdal dilag.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa butas ang nakalitaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mga hintuturo lamang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											upang hindi mahulaan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa tatlo ang mahihirang.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Gayon pa ma't natalo rin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Hari sa kanyang lihim,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Juan ay magaling</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tumiyak sa pipiliin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Una't pangalawang silid</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nilampasang walang imik,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pangatlo nang tumitig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											natiyak ang kanyang ibig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hintuturong nakasuot</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pinigilang buong lugod</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Mahal na Hari,&quot; ang luhog,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;narito ang aking irog.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hindi na nga binitiwarn</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											habang hindi binubuksan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nabunyag sa kalahatan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang Prinsesang minamahal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hari'y hindi nakahuma</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dala ay parang napatda,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											mahal pa naman sa kanya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang ngayo'y mawawalay na.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Walang daan na bawiin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at kung mayroon ay gagawin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hindi niya akalaing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											madaig sa kanyang lihim.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ngunit yamang naroon na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa sarili ay magbata,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang anak na sinisinta.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kay Don Jua'y pinasama.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang magkasi'y nagpaalam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang palasyo ay iniwan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ngunit nagugunamgunam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang ama ring nagdaramdam.</span></font></p>
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