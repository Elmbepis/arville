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
<title>Noli Me Tangere - Filipino sa KPluz.com</title>
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
								<td valign="bottom" background="file:///H:/tutorial-content.jpg">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										Noli Me Tangere</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 18pt" color="#990000">
										ni Dr. Jose Rizal</font></span><font face="Arial" style="font-size: 18pt">
										</font>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 15pt">&nbsp;&nbsp;
																	</font></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli1.php" style="text-decoration: none"><font color="#00279B">I. Isang Pagtitipon</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt"><a href="t-noli2.php" style="text-decoration: none"><font color="#00279B">II. Crisostomo Ibarra</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli3.php" style="text-decoration: none"><font color="#00279B">III. Ang Hapunan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli4.php" style="text-decoration: none"><font color="#00279B">IV. Ang Erehe at Pilibustero</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt" color="#800080">
											<a href="t-noli5.php" style="text-decoration: none">
											<font color="#00279B">V. Isang 
											Bituin sa Gabing Madilim</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli6.php" style="text-decoration: none">
											<font color="#00279B">VI. Si Kapitan 
											Tiago</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli7.php" style="text-decoration: none">
											<font color="#00279B">VII. Suyuan sa Asotea</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli8.php" style="text-decoration: none">
											<font color="#00279B">VIII. Mga 
											Alaala</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli9.php" style="text-decoration: none">
											<font color="#00279B">IX. Mga 
											Kaugalian ng Bayang Ito</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli10.php" style="text-decoration: none">
											<font color="#00279B">X. Ang Bayan</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli11.php" style="text-decoration: none">
											<font color="#00279B">XI. Ang mga 
											Makapangyarihan</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli12.php" style="text-decoration: none">
											<font color="#00279B">XII. Ang 
											Lahat ng mga Santo</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli13.php" style="text-decoration: none">
											<font color="#00279B">XIII. Mga 
											Paunang Tanda ng Unos</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli14.php" style="text-decoration: none">
											<font color="#00279B">XIV. Si Tasyo, 
											and Baliw o Pilosopo</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli15.php" style="text-decoration: none">
											<font color="#00279B">XV. Ang mga 
											Sakristan</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli16.php" style="text-decoration: none">
											<font color="#00279B">XVI. Si Sisa</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli17.php" style="text-decoration: none">
											<font color="#00279B">XVII. Si 
											Basilio</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli18.php" style="text-decoration: none">
											<font color="#00279B">XVIII. Mga 
											Kaluluwang Naghihirap</font></a></font></b></p>
											<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 13pt">
											<a href="t-noli19.php" style="text-decoration: none">
											<font color="#00279B">XIX. Mga 
											Suliranin ng Isang Guro</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli20.php" style="text-decoration: none"><font color="#00279B">XX. Ang Pulong sa Tribunal</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli21.php" style="text-decoration: none"><font color="#00279B">XXI. Kasaysayan ng Buhay ng Isang Ina</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli22.php" style="text-decoration: none"><font color="#00279B">XXII. Mga Ilaw at mga Dilim</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli23.php" style="text-decoration: none"><font color="#00279B">XXIII. Ang Pangingisda</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli24.php" style="text-decoration: none"><font color="#00279B">XXIV. Sa Gubat</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli25.php" style="text-decoration: none"><font color="#00279B">XXV. Sa Bahay ng Pilisopo</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli26.php" style="text-decoration: none"><font color="#00279B">XXVI. Ang Bisperas ng Piyesta</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli27.php" style="text-decoration: none"><font color="#00279B">XXVII. Ang Pagtatakipsilim</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli28.php" style="text-decoration: none"><font color="#00279B">XXVIII. Mga Sulat</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli29.php" style="text-decoration: none"><font color="#00279B">XXIX. Ang Umaga</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli30.php" style="text-decoration: none"><font color="#00279B">XXX. Sa Simbahan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli31.php" style="text-decoration: none"><font color="#00279B">XXXI. Ang Sermon</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli32.php" style="text-decoration: none"><font color="#00279B">XXXII. Ang Kabriya</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli33.php" style="text-decoration: none"><font color="#00279B">XXXIII. Layang Kaisipan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli34.php" style="text-decoration: none"><font color="#00279B">XXXIV. Ang Pagkain</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli35.php" style="text-decoration: none"><font color="#00279B">XXXV. Mga Salisalitaan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli36.php" style="text-decoration: none"><font color="#00279B">XXXVI. Ang Unang Dilim</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli37.php" style="text-decoration: none"><font color="#00279B">XXXVII. Ang Gobernador Heneral</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli38.php" style="text-decoration: none"><font color="#00279B">XXXVIII. Ang Prusisyon</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli39.php" style="text-decoration: none"><font color="#00279B">XXXIX. Si Donya Consolacion</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli40.php" style="text-decoration: none"><font color="#00279B">XL. Ang Katuwira't ang Lakas</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli41.php" style="text-decoration: none"><font color="#00279B">XLI. Dalawang Panauhin</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli42.php" style="text-decoration: none"><font color="#00279B">XLII. Ang Mag-asawang de Espada&ntilde;</font></a></font></b><a href="t-noli42.php" style="text-decoration: none"><b><font face="Arial" style="font-size: 13pt" color="#00279B">a</font></b></a></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli43.php" style="text-decoration: none"><font color="#00279B">XLIII. Mga Panukala</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli44.php" style="text-decoration: none"><font color="#00279B">XLIV. Pagsisiyasat ng Konsiyensya</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli45.php" style="text-decoration: none"><font color="#00279B">XLV. Ang Mga Pinag-uusig</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli46.php" style="text-decoration: none"><font color="#00279B">XLVI. Sabungan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli47.php" style="text-decoration: none"><font color="#00279B">XLVII. Ang Dalawang Ginoong Babae</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli48.php" style="text-decoration: none"><font color="#00279B">XLVIII. Ang Hindi Magkuro</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli49.php" style="text-decoration: none"><font color="#00279B">XLIX. Ang Tinig ng mga Pinaguusig</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli50.php" style="text-decoration: none"><font color="#00279B">L. Ang mga Anak ni Elias</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli51.php" style="text-decoration: none"><font color="#00279B">LI. Mga Pagbabago</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli52.php" style="text-decoration: none"><font color="#00279B">LII. Ang mga Sulat ng mga Patay at ang mga Anino</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli53.php" style="text-decoration: none"><font color="#00279B">LIII. Ang Mabuting Araw ay Nakikilala sa Umaga</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli54.php" style="text-decoration: none"><font color="#00279B">LIV. Lahat ng Lihim ay Nabubunyag at Walang Di Nakakamit na Parusa</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli55.php" style="text-decoration: none"><font color="#00279B">LV. Ang Kapahamakan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli56.php" style="text-decoration: none"><font color="#00279B">LVI. Ang Sabihanan at Inaakala</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli57.php" style="text-decoration: none"><font color="#00279B">LVII. Vae Victis! Sa Aba ng mga Manlulupig</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#00279B"><a href="t-noli58.php" style="text-decoration: none"><font color="#00279B">LVIII. Ang Sinumpa</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli59.php" style="text-decoration: none"><font color="#00279B">LIX. Ang Kinagisnang Bayan at ang mga Pag-aari</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli60.php" style="text-decoration: none"><font color="#00279B">LX. Mag-aasawa si Maria Clara</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli61.php" style="text-decoration: none"><font color="#00279B">LXI. Ang Panghuhuli sa Dagatan</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli62.php" style="text-decoration: none"><font color="#00279B">LXII. Pagpapaliwanag ni Padre Damaso</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli63.php" style="text-decoration: none"><font color="#00279B">LXIII. Ang Gabing Sinusundan ng Pasko ng Panganganak</font></a></font></b></p>
																													<p style="MARGIN-BOTTOM: 8px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 13pt" color="#800080"><a href="t-noli64.php" style="text-decoration: none"><font color="#00279B">LXIV. Pangwakas na Bahagi</font></a></font></b></p>
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