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
											XVI</font></span><font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">I.&nbsp; </font>
											<font color="#0000CC"><b>
											<span lang="EN-US" style="font-size: 16pt; font-family: Arial">
											Paghihimutok ni Don Pedro</span></b></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333"><b>
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></b></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											&nbsp;</p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Sa silid ay nag-iisa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kaurali'y mga dusa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maningning niyang mga mata</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa luha'y nanlalabo na.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Si Don Pedro kung dumalaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											akala na'y si Don Juan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pag di ito ang namasdan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pinto niya'y ayaw buksan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kaya malimit magalit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Pedrong nananabik,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung di lamang nagtitiis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hinamak na yaong silid.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Dibdib niya'y mawawalat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											tuwing kanyang mamamalas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Leonora'y umiiyak,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Jua'y tinatawag.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Lalo na kung nakikitang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa kapatid at di kanya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang larawang sinasamba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng may hapis na Prinsesa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Kung hindi nga kagaspanga't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											alangan sa kamahalan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang apoy ng kagalita'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ibinunto sa larawan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											At sa buong pagngingitngit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ay madalas pang masambit:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Pag nabigo yaring nais,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hahamakin pati lintik.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Malimit na magkasaliw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang dalawa sa pagdating;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magkalaban ng damdamin;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa pagluha gayon din.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang himutok ni Don Pedro:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Leonorang pinopoon ko,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											di na kaya magbabago</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											katigasan ng puso mo?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Hibik naman ng Prinsésa:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Don Juan kong tanging sinta,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											malagot man ang hininga,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											iyong-iyo si Leonora.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Prinsesa kong minamahal,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Pawiin ang kalumbayan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hindi kita babayaa't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pag-ibig ko'y walang hanggan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Hindi mo ba nababatid</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Don Juan kong iniibig,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											itong lilo mong kapatid</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa ayaw ay namimilit?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ako'y hindi isang lilo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dakila ang pagsinta ko,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											lilo pa ba akong itong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											matapat na alipin mo?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;O, Don Juan, bakit baga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hanggang ngayon ay wala ka,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											di mo kaya natatayang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											dito'y hinihintay kita?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ano pa ang kailangan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ako'y naririto naman?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang ligayang hinihintay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											nasa aking pagmamahal.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Tatlong taon nang mahigit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											yaring aking pagtitiis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											maatim kaya ng dibdib</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na makasal sa di ibig?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Tatlong taon na rin lamang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kayapos ko'y agam-agam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											araw-gabi'y inaasam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang masaya nitang araw.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Kung nasawi ka sa balon,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bakit kaya nagkagayon?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Lobo'y saan naparoon</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											at wala rin hangga ngayon?&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Di nakita mo na, giliw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											pati Lobo ay nagmaliw,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ang nangyari'y saksi na rin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na talagang ikaw'y akin.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ito'y huli't katapusan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ng pagtawag ko, Don Juan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung kulanging kapalaran</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ako'y di mo na daratnan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Huli nating alaala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kay Don Juang namatay na,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											habang tayo'y hiwalay pa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											ipagluksa natin siya.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Paalam na, O, Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Leonora ay paalam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											kung talagang ikaw'y patay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											magkita sa isang buhay.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&quot;Ako'y paalam na muna,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											minamahal kong Leonora,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											hihintin ko ang araw tang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											bibihis sa ating dusa.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											Ang Prinsesa'y nanahimik</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											sa malungkot niyang silid,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											si Don Pedro ay umalis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial,sans-serif">
											na may sugat din sa dibdib.</span></font></p>
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