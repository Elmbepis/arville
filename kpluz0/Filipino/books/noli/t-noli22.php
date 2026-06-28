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
								<td valign="bottom" >
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXII. Mga Ilaw at mga Dilim</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nakaraan ang tatlong araw mula ng 
											mangyari ang mga bagay na aming 
											sinaysay. Ginamit ng bayan ng San 
											Diego ang tatlong araw na ito, na 
											kasama ang mga gabi sa paghahanda ng 
											piyesta at sa mga salitaan, kasabay 
											ang mga pag-uupasala.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Samantalang kanilang nilalasap-lasap 
											na ang mga mangyayaring mga 
											kasayahan, pinipintasan ng iba ang 
											gobernadorcillo, ang iba nama'y ang 
											teniente mayor, at ang iba'y ang mga 
											bata, at hindi nawawalan ng 
											binibigyang kasalanan ng lahat ang 
											lahat.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Pinag-uusap-usapan ang pagdating ni 
											Maria Clara, na kasama ng tia 
											Isabel. Sila'y nangatutuwa sa gayong 
											pagdating, palibhasa'y kanilang 
											kinalulugdan siya, at kasabay ng 
											kanilang malaking panggigilalas sa 
											kanyang kagandahan, ang kanila 
											namang pagtataka sa mga 
											pagbabagobago ng kaugalian ni Padre 
											Salvi.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--'Madalas na siya'y 
											natitigagal at anaki'y nakalilimot 
											samantalang nagmimisa; hindi na 
											lubhang nakikipagsalitaan sa amin, 
											at kitangkita ang kanyang pagyayat 
											at ang kanyang pagkawalang 
											katiwasayan ng loob,'--ang sabihan ng 
											mga nagkukumpisal sa kanya. 
											Namamasid ng 'kokinerong' siya'y 
											namamayat ng namamayat, at dumaraing 
											ng di pagpapaunlak sa kanyang mga 
											inilulutong pagkain. </font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nguni't ang 
											lalong nakapagpapaalab ng mga 
											bulong-bulunga'y ang kanilang 
											namamasdang mahigit sa dalawang ilaw 
											sa kumbento kung gabi, samantalang 
											si Padre Salvi'y dumadalaw sa isang 
											bahay ng mamamayan ... sa bahay ni 
											Maria Clara! Nangagkukruz ang mga 
											mapagbanal, nguni't ipinatutuloy 
											nila ang pagbubulong-bulungan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tumelegrama si Juan Crisostomo 
											Ibarra buhat sa pangulong bayan ng 
											lalawigan, na bumabati siya kay tia 
											Isabel at sa pamangkin nito; nguni't 
											hindi ipinaliliwanag kung bakit wala 
											siya roon. Ang akala ng marami 
											siya'y nabibilango dahil sa ginawa 
											niya kay Padre Salvi ng hapon ng 
											araw ng 'Todos los Santos'.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Datapuwa't lalo ng lumaki ang mga 
											usap-usapan ng makita nila ng hapon 
											ng ikatlong araw na lumulunsad si 
											Ibarra sa isang kotse, sa harapan ng 
											munting bahay na tinitirahan ng 
											dalagang kanyang magiging asawa, at 
											bumabati ng&nbsp; buong&nbsp; pitagan sa 
											prayle, na tumutungo rin sa bahay na 
											iyon.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sino ma'y walang nakakagunita kay 
											Sisa at sa kanyang mga anak.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Kung pumaroon tayo ngayon sa bahay 
											ni Maria Clara, isang magandang 
											pugad na na sa gitna ng mga dalandan 
											at ilang-ilang, mararatnan pa natin 
											ang binata't dalagang kapwa 
											nakasungaw sa isang bintana sa 
											dakong dagatan. Lumililim sa 
											bintanang iyon ang mga bulaklak at 
											mga halamang gumagapang sa mga 
											kawayan at sa mga kawad, na pawang 
											nangagsasabog ng pihikang bango.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Bumubulong ang kanilang mga labi ng 
											mga salitang higit ang kagandahang 
											dinggin kay sa halishisan ng mga 
											damo, at lalong mahalimuyak kay sa 
											hanging may taglay na bangong handog 
											ng mga bulaklak halamanan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sinasamantala ng mga 'sirena' sa 
											dagatan ang pag-aagaw-dilim ng oras 
											na iyon ng matuling pagtatakip-silim 
											ng hapon, upang isungaw sa ibabaw ng 
											mga alon ang kanilang masasayang 
											maliliit na ulo at panggilalasan at 
											bumati ng kanilang mga awit sa araw 
											na naghihingalo. mga asul daw ang 
											kanilang mga mata at ang kanilang 
											mga buhok; na sila'y may mga putong 
											na koronang halaman sa tubig na may 
											mga bulaklak na mapuputi't mapupula. </font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Manakanaka raw ipinamamalas ng mga 
											bula ang kanilang parang linalik na 
											katawang higit sa bula ang kaputian 
											at kung ganap ng gabi'y kanilang 
											pinasisimulaan ang kanilang mga 
											kalugodlugod na paglalaro, at 
											kanilang ipinaririnig ang mga tinig 
											na talinghagang tulad sa mga arpa sa 
											langit; sa bihanan din namang ...; 
											nguni't pagbalikan natin ang ating 
											mga kinabataan pakinggan natin ang 
											wakas ng kanilang salitaan. Sinasabi 
											ni Ibarra kay Maria Clara:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Bukas, 
											bago magbukang liwayway, magaganap 
											ang hangad mo. Ihahanda kong lahat 
											ngayong gabi at ng huwag magkulang 
											ng ano man.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kung gayo'y susulat ako sa aking 
											mga kaibigang babae at ng 
											mangagsiparito. Gawin mo ang bagay 
											na ito sa isang parang Huwag sanang 
											makasunod ang kura!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At bakit?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Sapagkat tila mandin ako'y 
											binabantayan niya. Nakasasama sa 
											akin ang kanyang mga matang 
											malalalim at malulungkot, pagka 
											itinititig niya sa akin ay ako'y 
											natatakot. Pagka ako'y kinakausap 
											niya, siya'y may isang boses na ... 
											sinasabi sa akin ang mga bagay na 
											totoong kakaiba, na hindi 
											mapaglirip, na totoong kakatuwa ... 
											minsa'y itinanong niya sa akin kung 
											hindi ko nananag-inip ng tungkol sa 
											mga sulat ng nanay; sa aking akala'y 
											halos nasisira ang kanyang bait. 
											Sinasabi sa akin ng kaibigan kong si 
											Sinang at saka ni Andeng na aking 
											kapatid sa gatas, na siya'y may 
											pagkakulang-kulang ang isip. Gawin 
											mo sana ng paraang siya'y Huwag 
											pumarito!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hindi maaaring siya'y hindi natin 
											anyayahan--ang sagot ni Ibarrang 
											nag-iisip-isip.--Katungkulang atang 
											ito ng kaugalian ng bayan; siya'y 
											nasa bahay mo at bukod sa rito'y 
											nag-ugaling mahal siya sa akin. Nag 
											magtanong sa kanya ang Alkalde 
											tungkol sa bagay na sinabi ko na sa 
											iyo, walang sinabi siya kung di 
											pawang mga pagpuri sa akin, at hindi 
											nag-akalang maglagay ng kahit 
											kaunting hadlang man lamang. nguni't 
											namamasid kong ikaw ay namumuhi; 
											Huwag kang manimdim at hindi 
											makasasama siya sa atin sa bangka.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Narinig ang marahang lakad; yao'y 
											ang kurang lumalapit na taglay ang 
											ngiting pilit.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Maginaw ang hangin!--anya;--pagka 
											nakakahagip ng isang sipon, ay hindi 
											bumibitiw kung di dumating ang 
											tag-init. Hindi ba kayo nanganganib 
											na baka kayo'y malamigan?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nangangatal ang boses niya at sa 
											malayo ang kanyang tanaw: hindi siya 
											tumitingin sa binata't dalaga.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Tumbalik; ang pakiramdam namin ay 
											kaayaaya ang gabi at masarap ang 
											hangin. Ito ang pinaka 'oto&ntilde;o' at 
											'primavera'&nbsp;namin, nanlalaglag ang 
											ilang mga dahon, datapuwa't laging 
											sumisilang ang mga bulaklak.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nagbuntong hininga si Padre Salvi.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ipinalalagay kong karikitdikitan 
											ang pagkakalangkap ng dalawang 
											bahaging ito ng taong hindi 
											nanggigitna, ang 'invierno' 
											(tagginaw)--ang ipinagpatuloy ni 
											Ibara.--Sisilang, pagdating ng 
											Febrero, ang mga bagong sanga ng mga 
											kahoy at pagdating ng Marzo'y may 
											mga bungang hinog na tayo. Pagdating 
											ng mga buwang tag-init ay paparoon 
											kami sa ibang dako.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											ngumiti si Fray Salvi. Nagpasimula 
											sila ng pagsasalitaan ng mga 
											bagay-bagay na walang kabuluhan, ng 
											nauukol sa panahon, sa bayan at sa 
											darating na piyesta; humanap si 
											Maria Clara ng dahilan at umalis.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At yamang mga piyesta ang ating mga 
											pinag-uusapan, itulot po ninyong 
											kayo'y anyayahan ko sa gagawin namin 
											bukas. Ito'y isang piyestang bukid 
											na aming iaalay sa aming mga 
											kaibigan at iniaalay naman nila sa 
											amin.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At saan po ba gagawin?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ibig 
											ng mga kabataang gawin sa batis sa 
											umaagos sa malapit ditong gubat at 
											na sa tabi ng baliti: kaya magbangon 
											tayo ng maaga at ng huwag tayong 
											abutin ng araw.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nag-isip-isip ang prayle, at di 
											nalaon at sumagot:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Mapanuksong totoo ang anyaya at 
											ako'y napahihinuhod, upang sa inyo'y 
											patotohanang hindi po ako nagtatanim 
											sa inyo. Datapuwa't kinakailangang 
											dumalo roon pagkatapos na aking 
											maganap ang aking mga katungkulan. 
											Kayo'y mapalad, sapagkat may 
											kalayaan, lubos na may kalayaan!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang makaraan ang ilang sandali ay 
											nagpaalam si Ibarra upang 
											pangasiwaan ang paghahanda ng 
											piyesta sa kinabukasan. Madilim na 
											ang gabi.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Lumapit sa kanya sa daan ang isang 
											sa kanya'y naghandog ng&nbsp; buong&nbsp; 
											paggalang.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Sino po ba kayo?--ang sa kanya'y 
											tanong ni Ibarra.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hindi po ninyo alam, ginoo, ang 
											aking pangalan,--ang sagot ng hindi 
											kilala.--Dalawang araw na pong 
											hinihintay ko kayo.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At bakit?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--sapagkat sa alin mang dako'y hindi 
											ako kinahabagan, palibhasa'y ako raw 
											po'y tulisan, ginoo Datapuwa't 
											nawalan ako ng mga anak, sira ang 
											isip ng aking asawa, at ang sabihan 
											ng lahat ay karapatdapat ako sa 
											nangyayari sa akin!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Madaling pinagmasdan ni Ibarra ang 
											taong iyon, at tumanong:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At ano ba ang ibig ninyo ngayon?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ipagmakaawa ko po sa inyo ang 
											aking asawa at ang aking mga anak!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hindi ako makatigil,--ang sagot ni 
											Ibarra. Kung ibig po ninyong sumunod 
											sa akin, habang tayo'y lumalakad ay 
											masasabi ninyo ang sa inyo'y 
											nangyayari.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Napasalamat ang tao at pagdaka'y 
											nangawala sila sa gitna ng kadiliman 
											ng mga daang bahagya na may ilaw.</font></p>
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
																	<a href="t-noli-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Nilalaman ng 
																	Noli Me 
																	Tangere</font></a></font></p>
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
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; 
											&nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
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