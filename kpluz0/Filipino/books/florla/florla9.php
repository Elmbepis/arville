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
																	Ang Pakikipagsapalaran 
																	ni Florante
																	</font></p>
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
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	299<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At kung 
																	hindi luhang 
																	pabaon sa 
																	akin, <br/>namatay na 
																	muna bago ko 
																	naatim; <br/>dusang di 
																	lumikat 
																	hanggang sa 
																	dumating <br/>sa Bayang 
																	Krotonang 
																	kubkob ng 
																	hilahil. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	300<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kuta'y 
																	lulugso na 
																	sa bayong 
																	madalas <br/>ng mga 
																	makinang 
																	talagang 
																	pangwalat,
																	<br/>siyang 
																	paglusob 
																	ko't ng 
																	hukbong 
																	akibat, <br/>ginipit ang 
																	digmang 
																	kumubkob sa 
																	syudad. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	301<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito'y ang 
																	masidhing 
																	lubhang 
																	kamatayan
																	<br/>at Parkas 
																	Atropos ay 
																	nagdamdam-pagal
																	<br/>sa paggapas 
																	nila't 
																	pagkitil ng 
																	buhay <br/>ng 
																	naghihingalong 
																	sa dugo'y 
																	naglutang.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	302 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Makita ng 
																	piling 
																	Heneral 
																	Osmalic <br/>ang aking 
																	marahaas na 
																	pamimiyapis,
																	<br/>pitong 
																	susong hanay 
																	na dulo ng 
																	kalis, <br/>winahi ng 
																	tabak nang 
																	ako'y 
																	masapit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	303 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa kaliwa't 
																	kanan niya'y 
																	nalaglag <br/>mga soldados 
																	kong pawang 
																	mararahas;
																	<br/>lumapit sa 
																	aking mata'y 
																	nagniningas,
																	<br/>Halika, 
																	aniya't kita 
																	ang 
																	maglamas.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	304 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Limang oras 
																	kaming hindi 
																	naghiwalay,
																	<br/>hanggang sa 
																	nahapo ang 
																	bato ng 
																	tapang; <br/>nagluksa ang 
																	langit nang 
																	aking 
																	mapatay...
																	<br/>habag sa 
																	gererong sa 
																	mundo'y 
																	tinakpan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	305<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Siya nang 
																	pagsilid ng 
																	pangingilabot
																	<br/>sa kalabang 
																	hukbong 
																	parag 
																	sinasalot
																	<br/>ng pamuksang 
																	tabak na 
																	Minandrong 
																	bantog...
																	<br/>ang kampo't 
																	biktorya'y 
																	napa-aming 
																	lubos. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	306<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Tagumpay na 
																	ito'y pumawi 
																	ng lumbay
																	<br/>ng mga 
																	nakubkob ng 
																	kasakunaan;
																	<br/>panganib sa 
																	puso'y 
																	naging 
																	katuwaan,
																	<br/>ang pinto ng 
																	syudad 
																	pagdaka'y 
																	nabuksan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	307<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sinalubong 
																	kami ng 
																	haring 
																	dakila, <br/>kasama ang 
																	buong bayang 
																	natimawa;
																	<br/>ang 
																	pasasalamat 
																	ay di 
																	maapula <br/>sa di 
																	magkawastong 
																	nagpupuring 
																	dila. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	308<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Yaong 
																	bayang 
																	hapo't 
																	bagong 
																	nakatighaw
																	<br/>sa nagbalang 
																	bangis ng 
																	mga kaaway,
																	<br/>sa 
																	pagkatimawa 
																	ay 
																	nag-aagawang,
																	<br/>malapit sa 
																	aki't damit 
																	ko'y 
																	mahagkan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	309<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa lakas ng 
																	hiyaw ng 
																	Pamang 
																	matabil, <br/>vivang 
																	dugtung-dugtong 
																	ay 
																	nakikisaliw;
																	<br/>ang gulong 
																	salamat, 
																	nagtanggol 
																	sa amin--
																	<br/>dininig sa 
																	langit ng 
																	mga bituin.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	310<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Lalo ang 
																	tuwa nang 
																	ako'y 
																	matatap <br/>na apo ng 
																	hari nilang 
																	nililiyag;
																	<br/>ang monarko 
																	nama'y 
																	di-munti ang 
																	galak, <br/>luha ang 
																	nagsabi ng 
																	ligayang 
																	ganap. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	311<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nagsiakyat 
																	kami sa 
																	palasyong 
																	bantog <br/>at 
																	nangapahinga 
																	ang 
																	soldadong 
																	pagod; <br/>datapwa't 
																	ang baya'y 
																	tatlong araw 
																	halos <br/>na 
																	nakalimutan 
																	ang gawaing 
																	pagtulog.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	312 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa ligaya 
																	namin ng 
																	nuno kong 
																	hari, <br/>nakapagitan 
																	din ang 
																	lilong 
																	pighati; <br/>at ang 
																	pagkamatay 
																	ng ina kong 
																	pili, <br/>malaon nang 
																	lanta'y 
																	nanariwang 
																	muli. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	313 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito 
																	naniwala ang 
																	bata kong 
																	loob <br/>na sa 
																	mundo'y 
																	walang 
																	katuwaang 
																	lubos; <br/>sa minsang 
																	ligaya't 
																	tali nang 
																	nakasunod--
																	<br/>makapitong 
																	lumbay o 
																	hanggang 
																	matapos. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	314 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Naging 
																	limang buwan 
																	ako sa 
																	Krotona <br/>nagpilit 
																	bumalik sa 
																	Reynong 
																	Albanya; <br/>di sinong 
																	susumang sa 
																	akay ng 
																	sinta <br/>kung ang 
																	tinutungo'y 
																	lalo't isang 
																	Laura? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	315<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa gayong 
																	katulin ng 
																	aming 
																	paglakad,
																	<br/>naiinip 
																	ako't ang 
																	nasa'y 
																	lumipad; <br/>aba't nang 
																	matanaw ang 
																	muog ng 
																	syudad, <br/>kumutob sa 
																	aking puso'y 
																	lalong 
																	hirap! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	316<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kaya pala 
																	gayo'y ang 
																	nawawagayway
																	<br/>sa kuta'y 
																	hindi na 
																	bandilang 
																	binyagan,
																	<br/>kundi 
																	Medialuna't 
																	reyno'y 
																	nasalakay
																	<br/>ni Alading 
																	salot ng 
																	pasuking 
																	bayan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	317<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang akay 
																	kong hukbo'y 
																	kusang 
																	pinahimpil
																	<br/>sa paa ng 
																	isang bundok 
																	na mabangin,
																	<br/>di 
																	kaginsa-ginsa'y 
																	natanawan 
																	namin, <br/>pulutong ng 
																	Morong lakad 
																	ay mahinhin.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	318<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Isang 
																	binibini ang 
																	gapos na 
																	taglay <br/>na sa damdam 
																	nami'y 
																	tangkang 
																	pupugutan;
																	<br/>ang puso 
																	ko'y lalong 
																	naipit ng 
																	lumbay <br/>sa gunitang 
																	baka si 
																	Laura kong 
																	buhay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	319<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kaya di 
																	napigil ang 
																	akay ng loob
																	<br/>at ang mga 
																	Moro'y bigla 
																	kong 
																	nilusob; <br/>palad nang 
																	tumakbo at 
																	hindi 
																	natapos <br/>sa aking 
																	pamuksang 
																	kalis na may 
																	poot! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	320<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang wala 
																	na akong 
																	pagbuntunang 
																	galit, <br/>sa di 
																	makakibong 
																	gapos ay 
																	lumapit; <br/>ang takip sa 
																	mukha'y nang 
																	aking ialis,
																	<br/>aba ko't si 
																	Laura! may 
																	lalo pang 
																	sakit? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	321<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pupugutan 
																	dahil sa 
																	hindi 
																	pagtanggap
																	<br/>sa sintang 
																	mahalay ng 
																	Emir sa 
																	syudad; <br/>nang 
																	mag-asal 
																	hayop ang 
																	Morong 
																	pangahas,
																	<br/>tinampal sa 
																	mukha ng 
																	himalang 
																	dilag. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	322 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Aking 
																	dali-daling 
																	kinalag sa 
																	kamay <br/>ang lubid na 
																	walang awa 
																	at pitagan;
																	<br/>mga daliri 
																	ko'y 
																	naalang-alang
																	<br/>marampi sa 
																	balat na 
																	kagalang-galang.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	323 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito 
																	nakatanggap 
																	ng lunas na 
																	titig <br/>ang 
																	nagdaralitang 
																	puso sa 
																	pag-ibig;
																	<br/>araw ng 
																	ligayang una 
																	kong 
																	pagdinig <br/>ng sintang 
																	Florante sa 
																	kay Laurang 
																	bibig. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	324 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang aking 
																	matantong 
																	nasa 
																	bilangguan
																	<br/>ang bunying 
																	monarka't 
																	ang ama kong 
																	hirang; <br/>nag-utos sa 
																	hukbo't 
																	aming 
																	sinalakay
																	<br/>hanggang di 
																	mabawi ang 
																	Albanyang 
																	Bayan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	325<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pagpasok na 
																	namin sa 
																	loob ng 
																	reyno, <br/>bilanggua'y 
																	siyang una 
																	kong 
																	tinungo; <br/>hinango ang 
																	hari't ang 
																	dukeng ama 
																	ko <br/>sa 
																	kaginooha'y 
																	isa si 
																	Adolfo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	326<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Labis ang 
																	ligayang 
																	kinamtan ng 
																	hari <br/>at ng 
																	natimawang 
																	kamahalang 
																	pili; <br/>si Adolfo 
																	lamang ang 
																	nagdalamhati,
																	<br/>sa kapurihan 
																	kong tinamo 
																	ang sanhi.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	327<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pangimbulo 
																	niya'y lalo 
																	nang 
																	nag-alab <br/>nang ako'y 
																	tawaging 
																	Tanggulan ng 
																	Syudad, <br/>at 
																	ipinagdiwang 
																	ng haring 
																	mataas <br/>sa palasyo 
																	real nang 
																	lubos na 
																	galak. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	328<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Saka 
																	nahalatang 
																	ako'y 
																	minamahal
																	<br/>ng 
																	pinag-uusig 
																	niyang 
																	karikitan;
																	<br/>ang Konde 
																	Adolfo'y 
																	nagpapakamatay--
																	<br/>dahil sa 
																	Korona't--kay 
																	Laura'y 
																	makasal.&quot;
																	</font></p>
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