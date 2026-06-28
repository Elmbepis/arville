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
<title>Florante at Laura - Filipino sa KPluz.com</title>
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
										<font face="Arial" style="font-size: 24pt" color="#990000">
										Florante at Laura</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 16pt" color="#990000">
										ni Francisco Balagtas</font></span>
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
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 15pt; font-weight:700" color="#800080">
																	Ang Patibong 
																	ni Adolfo at</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 15pt; font-weight:700" color="#800080">
																	ang 
																	Kasaysayan 
																	ni Aladin</font></p>
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
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 14pt" color="#0000CC">
																	329</font></span><font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Lumago ang 
																	binhing mula 
																	sa Atenas
																	<br/>ipinunlang 
																	nasang ako'y 
																	ipahamak;
																	<br/>kay Adolfo'y 
																	walang bagay 
																	na masaklap,
																	<br/>para ng 
																	buhay kong 
																	hindi 
																	nauutas. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	330<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Di 
																	nag-ilang 
																	buwan ang sa 
																	reynong tuwa
																	<br/>at 
																	pasasalamat 
																	sa 
																	pagkatimawa,
																	<br/>dumating ang 
																	isang 
																	hukbong 
																	maninira <br/>na 
																	taga-Turkiyang 
																	masakim na 
																	lubha. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	331<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito ang 
																	panganib at 
																	pag-iiyakan
																	<br/>ng bagong 
																	nahugot sa 
																	dalitang 
																	bayan, <br/>lalo na si 
																	Laura't ang 
																	kapangambahan
																	<br/>ang ako ay 
																	sam-ing 
																	palad sa 
																	patayan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	332 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sapagkat 
																	heneral 
																	akong 
																	iniatas <br/>ng hari sa 
																	hukbong sa 
																	Moro'y 
																	lalabas; <br/>nag-uli ang 
																	loob ng 
																	bayang 
																	nasindak,
																	<br/>puso ni 
																	Adolfo'y 
																	parang 
																	nakamandag.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	333 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Niloob ng 
																	Langit na 
																	aking 
																	nasupil <br/>ang hukbo ng 
																	bantog na si 
																	Miramolin;
																	<br/>siyang 
																	mulang araw 
																	na 
																	ikinalagim
																	<br/>sa Reynong 
																	Albanya ng 
																	Turkong 
																	masakim. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#0000CC">
																	<b>334 <br/>
																	</b>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Bukod 
																	dito'y 
																	madlang 
																	digma ng 
																	kaaway <br/>ang 
																	sunod-sunod 
																	kong 
																	pinagtagumpayan;
																	<br/>anupa't sa 
																	aking kalis 
																	na matapang,
																	<br/>labimpitong 
																	hari ang 
																	nangagsigalang.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	335<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Isang araw 
																	akong bagong 
																	nagbiktorya
																	<br/>sa Etolyang 
																	Syudad na 
																	kusang 
																	binaka, <br/>tumanggap ng 
																	sulat ng 
																	aking 
																	monarka, <br/>mahigpit na 
																	biling umuwi 
																	sa Albanya.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	336<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At ang 
																	pamamamahala 
																	sa dala kong 
																	hukbo, <br/>ipinagtiwalang 
																	iwan kay 
																	Minandro;
																	<br/>noon di'y 
																	tumulak sa 
																	Etolyang 
																	Reyno, <br/>pagsunod sa 
																	hari't 
																	Albanya'y 
																	tinungo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	337<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang 
																	dumating 
																	ako'y gabing 
																	kadiliman,
																	<br/>pumasok sa 
																	reynong 
																	walang 
																	agam-agam;
																	<br/>pagdaka'y 
																	kinubkob... 
																	(laking 
																	kaliluhan!)
																	<br/>ng may 
																	tatlumpong 
																	libong 
																	sandatahan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	338<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Di 
																	binigyang-daan 
																	akin pang 
																	mabunot <br/>ang sakbat 
																	na kalis at 
																	makapamook;
																	<br/>buong 
																	katawan ko'y 
																	binidbid ng 
																	gapos, <br/>piniit sa 
																	karsel na 
																	katakut-takot.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	339<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sabihin ang 
																	aking 
																	pamamangha't 
																	lumbay, <br/>lalo nang 
																	matantong 
																	monarka'y 
																	pinatay <br/>ng Konde 
																	Adolfo't 
																	kusang 
																	idinamay <br/>ang ama kong 
																	irog na 
																	mapagpalayaw.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	340<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang nasang 
																	yumama't 
																	haring 
																	mapatanyag
																	<br/>at uhaw sa 
																	aking dugo 
																	ang yumakag
																	<br/>sa puso ng 
																	konde sa 
																	gawang 
																	magsukab...
																	<br/>(O, 
																	napakarawal 
																	na Albanyang 
																	Syudad!) <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	341<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;(Mahigpit 
																	kang aba sa 
																	mapagpunuan
																	<br/>ng hangal na 
																	puno at 
																	masamang 
																	asal, <br/>sapagka't 
																	ang haring 
																	may hangad 
																	sa yaman <br/>ay mariing 
																	hampas ng 
																	Langit sa 
																	bayan.) <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	342 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ako'y 
																	lalong aba't 
																	dinaya ng 
																	ibig, <br/>may 
																	kahirapan 
																	pang para ng 
																	marinig <br/>na ang 
																	prinsesa 
																	ko'y 
																	nangakong 
																	mahigpit <br/>pakasal sa 
																	Konde 
																	Adolfong 
																	balawis? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	343 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ito ang 
																	nagkalat ng 
																	lasong 
																	masidhi <br/>sa ugat ng 
																	aking pusong 
																	mapighati
																	<br/>at 
																	pinagnasaang 
																	buhay ko'y 
																	madali <br/>sa 
																	pinanggalingang 
																	walang 
																	magsauli.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	344 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	pagkabilanggong 
																	labingwalong 
																	araw, <br/>naiinip ako 
																	ng di 
																	pagkamatay;
																	<br/>gabi nang 
																	hangui't 
																	ipinagtuluyan
																	<br/>sa gubat na 
																	ito't kusang 
																	ipinugal.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	345<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Bilang 
																	makalawang 
																	maligid ni 
																	Pebo <br/>ang 
																	sandaigdigan 
																	sa 
																	pagkagapos 
																	ko, <br/>nang 
																	inaakalang 
																	nasa ibang 
																	mundo, <br/>imulat ang 
																	mata'y nasa 
																	kandungan 
																	mo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	346<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ito ang 
																	buhay kong 
																	silu-silong 
																	sakit <br/>at hindi pa 
																	tanto ang 
																	huling 
																	sasapit...&quot;
																	<br/>mahabang 
																	salita ay 
																	dito 
																	napatid, <br/>ang gerero 
																	naman ang 
																	siyang 
																	nagsulit.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	347<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang 
																	pagkabuhay 
																	mo'y yamang 
																	natalastas,
																	<br/>tantuin mo 
																	naman ngayon 
																	ang kausap;
																	<br/>ako ang 
																	Aladin sa 
																	Persyang 
																	Syudad, <br/>anak ng 
																	balitang 
																	Sultang 
																	Ali-Adab.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	348<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa pagbatis 
																	niring 
																	mapait na 
																	luha, <br/>ang 
																	pagkabuhay 
																	ko'y sukat 
																	mahalata...
																	<br/>(Ay, ama ko! 
																	bakit...? 
																	Ay, 
																	Fleridang 
																	tuwa!) <br/>katoto'y 
																	bayaang 
																	ako'y 
																	mapayapa.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	349<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Magsama na 
																	kitang sa 
																	luha'y 
																	maagnas, <br/>yamang 
																	pinag-isa ng 
																	masamang 
																	palad; <br/>sa gubat na 
																	ito'y 
																	hintayin ang 
																	wakas <br/>ng 
																	pagkabuhay 
																	tang nalipos 
																	na hirap.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#0000CC">
																	350<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Hindi na 
																	inulit ni 
																	Florante 
																	naman, <br/>luha ni 
																	Aladi'y 
																	pinaibayuhan;
																	<br/>tumahan sa 
																	gubat na may 
																	limang 
																	buwan, <br/>nang isang 
																	umaga'y 
																	naganyak 
																	maglibang.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	351<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kanilang 
																	nilibot ang 
																	loob ng 
																	gubat, <br/>kahit 
																	bahagya nang 
																	makakitang 
																	landas; <br/>dito 
																	sinalita ni 
																	Alading 
																	hayag <br/>ang kanyang 
																	buhay na 
																	kahabag-habag.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	352 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Aniya'y &quot;Sa 
																	madlang 
																	gyerang 
																	dinaanan,
																	<br/>di ako 
																	naghirap ng 
																	pakikilaban
																	<br/>para nang 
																	bakahin ang 
																	pusong 
																	matibay <br/>ni Fleridang 
																	irog na 
																	tinatangisan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	353 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung 
																	nakikiumpok 
																	sa madlang 
																	prinsesa'y,
																	<br/>si Diana'y 
																	sa gitna ng 
																	maraming 
																	Nimpa, <br/>kaya't kung 
																	tawagin sa 
																	Reynong 
																	Persya, <br/>isa si 
																	Houris ng 
																	mga propeta.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	354 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anupa't 
																	pinalad na 
																	aking dinaig
																	<br/>sa 
																	katiyagaan 
																	ang pusong 
																	matipid; <br/>at 
																	pagkakaisa 
																	ng dalawang 
																	dibdib <br/>pagsinta ni 
																	ama'y 
																	nabuyong 
																	gumiit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	355<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito na 
																	minulan ang 
																	pagpapahirap
																	<br/>sa aki'y 
																	ninasang 
																	buhay ko'y 
																	mautas; <br/>at nang 
																	magbiktorya 
																	sa Albanyang 
																	Syudad, <br/>pagdating sa 
																	Persya'y 
																	binilanggo 
																	agad. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	356<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At ang 
																	ibinuhat na 
																	kasalanan 
																	ko, <br/>di pa utos 
																	niya'y 
																	iniwan ang 
																	hukbo; <br/>at nang 
																	mabalitaang 
																	reyno'y 
																	nabawi mo,
																	<br/>noo'y 
																	hinatulang 
																	pupugutan ng 
																	ulo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	357<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang gabing 
																	malungkot na 
																	kinabukasan,
																	<br/>wakas na 
																	tadhanang 
																	ako'y 
																	pupugutan,
																	<br/>sa karsel ay 
																	nasok ang 
																	isang 
																	heneral, <br/>dala ang 
																	patawad na 
																	lalong 
																	pamatay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	358<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Tadhanang 
																	mahigpit ay 
																	malis 
																	pagdaka, <br/>huwag 
																	mabukasan sa 
																	Reyno ng 
																	Persya; <br/>sa munting 
																	pagsuway-buhay 
																	ko ang 
																	dusa... <br/>sinunod ko't 
																	utos ng hari 
																	ko't ama.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	359<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nguni't sa 
																	puso ko'y 
																	matamis pang 
																	lubha <br/>na tuloy 
																	nakitil ang 
																	hiningang 
																	aba, <br/>huwag ang 
																	may buhay na 
																	nagugunita--
																	<br/>iba ang may 
																	kandong sa 
																	langit ko't 
																	tuwa. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	360<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;May anim na 
																	ngayong 
																	taong walang 
																	likat <br/>nang 
																	nilibut-libot 
																	na kasama'y 
																	hirap...&quot;
																	<br/>napatigil 
																	dito't 
																	sila'y may 
																	namatyag--
																	<br/>nagsasalitaan 
																	sa loob ng 
																	gubat.</font></p>
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
																	<a href="florla-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Menu ng 
																	Florante at 
																	Laura</font></a></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;&nbsp;
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