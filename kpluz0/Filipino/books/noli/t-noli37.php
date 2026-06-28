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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg',/*url*/'../../../images/header1b.jpg',/*url*/'../../../images/header2c.jpg',/*url*/'../../../images/header2b.jpg',/*url*/'../../../images/header3c.jpg',/*url*/'../../../images/header3b.jpg',/*url*/'../../../images/header4c.jpg',/*url*/'../../../images/header4b.jpg',/*url*/'../../../images/header5c.jpg',/*url*/'../../../images/header5b.jpg',/*url*/'../../../images/header6c.jpg',/*url*/'../../../images/header6b.jpg',/*url*/'../images/backb.jpg')">

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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXVII. Ang Gobernador Heneral</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig kong kausapin ang binatang 
											iyan!--ang sabi ng Gobernador Heneral 
											sa isang ayudante;--pinukaw niyang 
											totoo ang aking nasang siya'y 
											makilala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May nangagsilakad na po upang 
											siya'y hanapin, aking general! 
											Datapuwa't dito'y may isang binatang 
											taga Maynila, na mapilit ang hinging 
											siya'y papasukin dito. Sinabi po 
											namin sa kanyang walang panahon ang 
											kamahalan ninyo, at kayo'y hindi 
											naparito upang dumingig ng mga 
											pagsasakdal, kung di ng tingnan ang 
											bayan at ang prokesion; nguni't 
											sumagot, na sa tuwituwi na'y may 
											panahon daw na magagamit ang 
											kamahalan po ninyo upang gumawa ng 
											nauukol sa katuwiran....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Liningon ng Gobernador Heneral na 
											nagtataka ang Alkalde.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung hindi po ako nagkakamali,--ang 
											sagot ng Alkaldeng yumukod ng 
											kaunti,--iyan ang binatang kaninang 
											umaga'y nakagalit ni Padre Damaso, 
											dahil sa sermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diyata't mayroon pang iba pala? 
											Sinasadya manding talaga ng prayleng 
											iyang guluhin ang lalawigan, o baka 
											kaya ang isip niya'y siya ang 
											nakapangyayari rito? Sabihin po 
											ninyo sa binatang siya'y magtuloy!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpapasial na pabalikbalik sa 
											magkabikabilang dulo ng salas ang 
											Gobernador Heneral, na nangangatal 
											sa galit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa 'antesala' (panig ng bahay na na 
											sa bago pumasok sa salas) ay may 
											ilang mga kastila na nahahalo sa mga 
											militar, mga namumuno sa bayan ng 
											San Diego at mga mamamayan; sila'y 
											nagsasalitaan o nagmamatuwirang 
											nagkakalupon sa iba't ibang pangkat. 
											Nangaroroon din naman ang lahat ng 
											mga prayle, liban na lamang kay 
											Padre Damaso, at ibig nilang pumasok 
											upang maghandog ng galang sa 
											Gobernador Heneral.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipinamamanhik sa mga kamahalan po 
											ninyong mangaghintay ng 
											sandali--anang ayudande;--pumasok po 
											kayo, binata!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namumutla at nangangatal na pumasok 
											ang binatang iyong taga Maynila na 
											madalas mamali sa pananalita na 
											pinaghahalo ang griego at ang 
											tagalog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pawang napuspos ng panggilalas ang 
											lahat marahil, nga'y totoong malaki 
											ang galit ng Gobernador Heneral 
											upang mangahas na papaghintayin ang 
											mga prayle. Nagsalita si Padre 
											Sibyla:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako'y walang ano mang sasabihin sa 
											kanya!... nagsasayang ako rito ng 
											panahon!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon din ang wika ko,--ang dugtong 
											ng isang agustino;--tayo na?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi kaya lalong magaling na ating 
											siyasatin kung papaano ang kanyang 
											iniisip?--ang tanong ni Padre 
											Salvi;--sa ganya'y maiilagan natin 
											ang mga upasala ng mga makaaalam.. 
											at maipaaalaala natin sa kanya ... 
											ang kanyang mga katungkulan ...sa 
											Religion,..</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magtuloy po ang mga kamahalan 
											ninyo, kung inyong ibig!--anang 
											ayudante, na hatid ang binatang 
											hindi nakauunawa ng griego, na 
											ngayo'y lumalabas na taglay ang 
											isang pagmumukhang kinikinangan ng 
											katuwaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naunang pumasok si Padre Sibyla; sa 
											likura'y sumusunod si Padre Salvi, 
											si Padre Manuel Martin at ang iba 
											pang mga prayle. Sila'y 
											nangagsiyukod ng&nbsp; buong&nbsp; 
											kapakumbabaan, liban na lamang kay 
											Padre Sibyla, na pinapanatili, sampu 
											sa kanyang pagyukod, ang tanging 
											anyo ng isang nakatataas kay sa iba; 
											na ano pa't baligtad sa ginawa ni 
											Padre Salvi, na halos hinutok ang 
											bayawang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino po sa mga kamahalan ninyo si 
											Padre Damaso?--ang biglang itinanong 
											ng Gobernador Heneral, na hindi man 
											lamang sila pinaupo, hindi sila 
											kinumusta, at hindi sila 
											pinagsabihan niyang mga salitang 
											pangpapuri na pinagkaugaliang 
											tanggapin ng gayong mga katataas na 
											uring mga tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po, ginoo, kasama namin si 
											Padre Damaso!--ang sagot ni Padre 
											Sibyla ng halos gayon ding masaklap 
											na pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakahiga po sa banig at may sakit 
											ang lingkod ng kamahalan ninyo!--ang 
											idinugtong na&nbsp; buong&nbsp; kapakumbabaan 
											ni Padre Salvi;--pagkatapos na 
											magtamo ng lugod na makabati po sa 
											inyo at makumusta namin ang inyong 
											kalagayan, ayon sa nararapat gawin 
											ng lahat ng mababait na mga lingkod 
											ng Hari at ng lahat ng taong may 
											pinag-aralan, naparito po naman kami 
											sa ngalan ng mapitagang lingkod 
											ninyo, na may kasaliwang palad 
											na....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oh!--ang isinalabat ng Kapitan 
											Heneral, na pinipihit ang silla sa 
											pamamag-itan ng isang paa nito at 
											saka ngumiting nangangatal,--kung 
											ang lahat ng mga lingkod ng aking 
											kamahalan ay katulad ng kamahalan ni 
											Padre Damaso, lalong iibigin ko pang 
											ako na ang maglingkod sa akin ding 
											kamahalan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mga kagalangalang na mga prayle 
											na pawang nakatayo ang katawan ay 
											nangagsisitayo naman ang kanilang 
											kaluluwa sa ganitong pagkasasalabat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po'y mangagsiupo!--ang 
											idinugtong ng Kapitan Heneral, 
											pagkatapos ng sumandaling pagtigil, 
											at pinatamis ng kaunti ang kanyang 
											pangungusap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumalakad na patiad si Kapitan 
											Tiagong nakafrak; hatid niya't 
											tangan sa kamay ni Maria Ciara, na 
											pumasok na halos hindi makahakbang 
											at kiming kimi. Gayon ma'y gumamit 
											ng kalugod-lugod at mapitagang 
											pagyukod.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang ginoong binibini po bang ito 
											ang anak ninyo?--ang tanong na 
											nagtataka ng Kapitan Heneral.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At inyo po, aking General!--ang 
											sagot ni Kapitan Tiago ng&nbsp; buong&nbsp; 
											kataimtiman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nangasidilat ang Alkalde at ang mga 
											ayudante; datapuwa't nanatili sa 
											hindi pagngigiti ang Kapitan 
											Heneral, iniabot ang kamay sa 
											binibini at sa kanya'y sinabi ng 
											matimyas na pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mapapalad ang mga magugulang na may 
											mga anak na babaeng gaya po ninyo, 
											ginoong binibini! Kayo po'y 
											ibinalita sa aking karapatdapat na 
											kayo'y pagpitaganan at panggilalasan 
											... hinangad ko kayong makita upang 
											kayo'y pasalamatan dahil sa 
											magandang ginawa po ninyo ngayong 
											araw na ito. Nalalaman kong 'lahat' 
											at hindi ko lilimutin ang marangal 
											ninyong inasal pagsulat ko sa 
											gobyerno ng Hari. Samantala'y itulot 
											po ninyo, ginoong binibini, na 
											pangalan ng dakilang Hari na dito'y 
											aking ipinakikiharap, at umiibig ng 
											'kapayapaan' at 'kapanatagan' ng 
											kanyang mga tapat na loob na 
											nasasakop, at sa pangalan ko naman, 
											na pangalan ng isang amang may mga 
											anak na babaeng kasing gulang po 
											ninyo, na kayo'y pasalamatan ng&nbsp; 
											buong&nbsp; ligaya, at 
											ipagtagubiling bigyan ng isang 
											ganting pala!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo!...ang tugon ni Maria Clarang 
											nangangatal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nahulaan ng Kapitan Heneral kung ano 
											ang talagang ibig niyang sabihin at 
											sumagot:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Totoo pong magaling, ginoong 
											binibini, na kayo'y magkasiya sa 
											galak ng inyong sariling budhi at sa 
											pagmamahal ng inyong mga kababayan, 
											na ang katunaya'y siya ngang lalong 
											magaling na ganting pala, at hindi 
											na tayo dapat humingi pa ng iba. 
											Datapuwa't huwag po ninyong ikait sa 
											akin ang magandang pagkakataong 
											aking maipakilala na, kung marunong 
											magparusa ang Hustisya'y marunong di 
											namang gumanting pala, at siya'y 
											hindi parating 'bulag.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinalita ng Kapitan Heneral sa isang 
											paraang makahulugan at lalong 
											malakas ang lahat ng mga salitang 
											napapagitanan ng lambal na koma.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naghihintay po ng mga utos ng 
											kamahalan ninyo si ginoong Juan 
											Crisostomo Ibarra!--ang malakas na 
											sabi ng isang ayudante.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangatal si Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah!--ang biglang sinabi ng Kapitan 
											Heneral,--tulot po ninyo, ginoong 
											binibini, na sa layo'y sabihin ang 
											aking nais na kayo'y muli kong 
											makita bago ko iwan ang bayang ito: 
											mayroon pa po akong totoong 
											mahahalagang bagay na sa inyo'y 
											aking sasabihin. Ginoong Alkalde, 
											sasamahan po ninyo ako sa&nbsp; buong&nbsp; 
											aking pagpapasial na ibig kong 
											gawing lakad, pagkatapos ng 
											pakikipagsalitaan kay ginoong 
											Ibarra, na kami lamang dalawa ang 
											mag-uusap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Itulot po ng kamahalan ninyo,--ani 
											Padre Salvi ng&nbsp; buong&nbsp; 
											kapakumbabaan, na sa inyo'y 
											ipaalaalang si ginoong Ibarra'y 
											exkomulgado....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinalabat siya ng Kapitan Heneral at 
											ito ang sinabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lubos kong ikinatutuwang walang 
											iba akong dapat ipamanglaw kung di 
											ang kalagayan ni Padre Damaso, na 
											aking hinahangad ng 'taimtim sa 
											aking loob' na siya'y 'ganap na 
											gumaling,' sapagkat hindi marahil 
											lubhang makapagpapasaya ng loob sa 
											kanyang gulang ang isang 
											'paglalakbay sa Espa&ntilde;a,' dahil sa 
											karamdaman ng kanyang katawan. 
											Datapuwa't ito'y maalinsunod sa 
											kanya ... at samantala'y ingatan 
											nawa ng Diyos ang inyong mga 
											kamahalan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagsialis ang isa't isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At tunay ngang maaalinsunod sa 
											kanya!--ang ibinubulong ni Padre 
											Salvi, paglabas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan natin kung sino ang 
											mauunang maglalakbay agad!--ang 
											Idinugtong ng isa pang frankiskano.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Yayao ako ngayon din!--ang sabing 
											masama ang loob ni Padre Sibyla.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kami paparoon sa aming 
											lalawigan!--ang sinabi ng mga 
											agustino.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi matiis ng isa't isa, sa dahil 
											na masamang kagagawan ng isang 
											frankiskano'y kinausap sila ng 
											Kapitan Heneral ng malaking 
											kalamigan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nasalabong nila sa antesala si 
											Ibarra, na sa kanila'y nagpakaing 
											iilan pa lamang ang oras na 
											nakararaan. Hindi sila nagbatian, 
											nguni't nagkaroon ng mga tinginang 
											lubhang marami ang sinasaysay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iba naman ang ginawa ng Alkalde; ng 
											wala na roon ang mga fralle'y binati 
											siya at magiliw na iniabot sa kanya 
											ang kamay, datapuwa't hindi sila 
											nakapagsalitaan ng ano man, dahil sa 
											pagdating ng ayudante.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nasalubong niya sa pintuan si Maria 
											Clara: maraming bagay rin ang mga 
											sinabi ng titigang ginawa ng dalawa, 
											nguni't ibang iba sa mga sinalita ng 
											mga mata ng mga prayle.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humakbang ng ilang patungo sa kanya 
											ang Kapitan Heneral.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lubos na lubos ang aking galak sa 
											aking mahigpit na pakikikamay sa 
											inyo, ginoong Ibarra. Itulot po 
											ninyo sa aking kayo'y tanggapin ko 
											ng&nbsp; buong&nbsp; pagpapalagay ng loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tunay nga namang pinanonood at 
											pinagmamasid ang binata ng Kapitan 
											Heneral na napagkikilala ang kanyang 
											katuwaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo ... ang ganyang 
											pagkalakilaking kagandahan ng 
											loob....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakasusugat sa akin ang inyong 
											pagtataka, inyong ipinakikilala sa 
											aking hindi ninyo inaasahang kayo'y 
											pagpapakitaan ko ng magandang loob 
											sa pagtanggap ko sa inyo: ito'y 
											pagkukulang tiwala sa aking 
											pagmamahal sa katuwiran.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po pagbibigay ng katuwiran, 
											ginoo, kung di pagpapautang ng loob 
											ang isang pagtanggap--katoto sa isang 
											gaya kong walang ano man kahulugang 
											sumasailalim ng kapangyarihan ng 
											mahal na Hari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mabuti, mabuti!--anang Gobernador 
											Heneral na naupo at tuloy itinuro sa 
											kanya ang isang upuan;--bayaan 
											ninyong ako'y magtamo ng sandaling 
											pagbubukas ng puso; totoong malaki 
											ang aking pagkalugod sa inyong 
											kaasalan; kaya nga't kayo'y inihingi 
											ko na sa gobyerno ng Hari ng isang 
											ganting palang dangal 
											(kondekoracion), dahil sa kaisipan 
											ninyong pagkakaawang gawang 
											pagtatayo ng isang paaralan ... Kung 
											nagsalita lamang kayo sa akin, 
											pinanood ko sana ng&nbsp; buong&nbsp; tuwa ang 
											pagdidiwang na ginawa at marahil ay 
											nailigtas ko kayo sa isang sama ng 
											loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa ganang aki'y ipinalalagay kong 
											napakaliit ang aking adhika,--ang 
											isinagot ng binata,--na hindi ko 
											inakalang may kaukulang karapatan 
											upang abalahin ko ang inyong 
											kaisipan na lubhang maraming 
											pinangangasiwaan; bukod sa ang 
											katungkulan ko'y sa unang puno ng 
											aking lalawigan magsalita muna.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iginalaw ng Kapitan Heneral ang 
											kanyang ulo, na nagpapakilala ng 
											kanyang ligaya, at nalalao'y lalong 
											gumagamit ng anyong pagpapalagay ng 
											loob, at nagpatuloy ng pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tungkol sa samaan ng loob na 
											nangyari sa inyo at kay Padre 
											Damaso, huwag po kayong matatakot at 
											huwag din namang mag-iingat ng 
											pagtatanim hindi sasalangin ang isa 
											man lamang buhok ninyo sa ulo 
											samantalang ako ang namamahala sa 
											Kapuluan, at tungkol naman sa 
											exkomunion, kakausapin ko na ang 
											Arzobispo, sapagkat kinakailangang 
											makibagay tayo sa lakad ng panahon: 
											dito'y hindi tayo makapagtatawa sa 
											mga bagay na ito sa hayagang gaya sa 
											Espa&ntilde;a o sa paham na Europa. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Gayon 
											ma'y dapat kayong magpakaingat sa 
											hinaharap na panahon; 
											nakipagtunggali kayo ng paharapan sa 
											mga kapisanang dahil sa kanilang 
											kahulugan at kayamana'y 
											kinakailangang siya'y igalang. 
											nguni't kayo'y aking tatangkilikin, 
											sapagkat kinalulugdan ko ang mga 
											mababait na anak, kinalulugdan ko 
											ang magbigay unlak sa kapurihan ng 
											mga namatay ng magulang; ako man 
											nama'y umibig din sa aking mga 
											magugulang, at tulungan ako ng 
											Diyos! hindi ko maalaman ang aking 
											gagawin sa kalagayan po ninyo!....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At biglang biglang binago ang 
											salitaan, at tumanong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibinalita sa aking galing daw po 
											kayo sa Europa, natira ba kayo sa 
											Madrid?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo, natira akong ilang buwan doon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ba ninyo naririnig sa mga 
											salitaan doon ang aking familia?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bagong kaaalis pa po ninyo ng ako'y 
											magtamo ng kapurihang ipakilala sa 
											inyong familia.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kung gayo'y bakit naparito kayo 
											ng walang dala na ano mang sulat na 
											pangtagubilin sa akin at ng kayo'y 
											aking tangkilikin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo,--ang sagot ni Ibarrang 
											kasabay ang pagyukod,--sapagkat 
											hindi tuloy tuloy na galing ako sa 
											Espa&ntilde;a, at sapagkat palibhasa'y 
											sinabi sa akin kung ano po ang 
											kaugalian ninyo, inaaala kong hindi 
											lamang walang kabuluhan ang isang 
											sulat na pangtagubilin sa inyong 
											ako'y inyong tangkilikin, kung di 
											naman isang kapaslangan po sa inyo: 
											talagang natatagubilin sa inyo 
											kaming mga filipinong lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nasnaw ang isang ngiti sa mga labi 
											ng matandang militar, na madalang na 
											muling sumagot, na anaki'y sinusukat 
											at tinitimbang ang kanyang mga 
											salita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ikinaliligaya kong umisip kayo ng 
											papaganyan, at ... ganyan nga sana! 
											Gayon man, binata, dapat po ninyong 
											maalaman kung ano ang mga mabibigat 
											na bagay na pinapas-an namin sa 
											Fiilpinas, Dito'y kaming mga 
											matatandang mga militar, 
											kinakaliangang gawin namin at 
											lumagay kami sa lahat; Hari, 
											Ministro ng Estado, ng Guerra, ng 
											Gobernacion, ng Fomento, ng Grakia 
											at Hustisya at iba pa, at ang lalo 
											pang masama'y kinakailangan naming 
											ipagtanong ang bawa't bagay sa 
											malayong Inang Bayan, na 
											sinasang-ayunan o minamasama, ng 
											papikit kung minsan, ayon sa 
											kasalukuyang panahon, ang aming mga 
											panukalang kahingian. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											At bago 
											sasabihin namin mga kastilang; Ang 
											yumayakap ng malaki'y hindi 
											nakapipisil na mabuti! Bukod sa 
											rito'y ang karaniwan, napaparito 
											kaming bahagya na napagkikilala ang 
											lupaing ito, at iniiwan namin 
											pagpapasimula naming makilala.--Sa 
											inyo'y makapagsasalita ako ng walang 
											ligoyligoy, sapagkat walang 
											kabuluhang magpakunuwari ako ng 
											ibang bagay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kaya nga kung sa 
											Espa&ntilde;a, na bawa't bagay may ukol na 
											kanyang ministro, na ipinanganak at 
											lumaki rin sa lupaing iyon; na may 
											mga pamahayagan at napagkikilala ang 
											munakala ng mga mamamayan, na 
											iminumulat at ipinauunawa sa 
											gobyerno ang kanyang mga kamalian ng 
											kanya ring mga kamay, gayon ma'y 
											hindi wasto at maraming totoo ang 
											mga kakulangan, isang himala na 
											dito'y hindi magkagulo-gulong lahat, 
											sa kakulangan ng mga kagalingang 
											sinabi ko na, bukod sa rito'y may 
											isang makapangyarihang kaaway na 
											humahadlang sa lihim sa ikagagaling 
											nitong Kapuluan at lumulubid sa 
											kadiliman ng ikahihinto nito sa 
											pagsulong sa ginhawa at dangal. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi nagkukulang ng magagandang 
											panukala ang mga namamamahala, 
											nguni't napipilitan kaming gumamit 
											ng mga mata at mga bisig ng iba na 
											ang karaniwa'y hindi namin kilala, 
											na marahil hindi ang paglilingkod sa 
											kanyang sariling Bayan ang ginagawa, 
											kung di ang paglilingkod lamang sa 
											sariling igiginhawa. Ito'y hindi 
											kasalanan namin, kung di sa 
											kalakaran ng panahon; hindi kakaunti 
											ang naitutulong sa amin ng mga 
											prayle, datapuwa't hindi na 
											makasasapat sila ... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ibig kong 
											ipagmalasakit kayo, at ibig ko 
											sanang huwag makapagpahamak sa inyo 
											ng ano man ang mga kakulangan ng 
											kasalukuyang sinusunod naming 
											pamamahala ... hindi ko mangyaring 
											maampon ang lahat, at hindi naman 
											makapagsakdal na lahat sa akin. May 
											magagawa po ba ako sa inyong 
											mapakikinabangan ninyo kahi't 
											kakaunti? mayroon po ba kayong ano 
											mang ibig hingi sa akin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagnilay-nilay si Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo,--ang isinagot,--ang lalong 
											malaking nais ko'y ang ililigaya 
											nitong aking bayan, ligayang ibig ko 
											sanang maging kautangan niya sa 
											Inang Bayan, at sa pagpupumilit ng 
											aking mga kababayan, at mabigkisan 
											ang Inang Bayan at ang aking mga 
											kababayan ng walang hanggang tali ng 
											nagkakaisang mga adhika at ng 
											nagkakaisang mga pag-aari. Ang 
											gobyerno lamang ang makapagbibigay 
											ng aking kahingian, pagkatapos ng 
											mahabang panahong laging 
											pagsusumakit at ng tapat na mga 
											pagbabago ng mga kautusan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinitigang sandali ng Kapitan 
											Heneral, titig na tinumbasan ni 
											Ibarra ng gayon din katagal na 
											titig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po ang unang lalaking nakausap 
											ko sa lupaing ito!--ang biglang 
											sinabi at iniabot sa kanya ang 
											kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala po kayong nakikita kung di ang 
											mga taong dito sa kiudad ay 
											humihilahod, hindi po ninyo 
											nadadalaw ang pinararatangang mga 
											dampa sa aming mga bayan; kung 
											mamasid po sana ninyo sila'y 
											makakakita kayo ng tunay na may 
											magandang puso at mga dalisay na 
											kaasalan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtindig ang Kapitan Ganeral at 
											nagpasyal ng pakabikabila sa salas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Ibarra,--ang pagdaka'y 
											sinabi, na biglang tumigil,--ang 
											binata'y tumindig;--marahil yayao ako 
											sa loob ng isang buwan; hindi 
											nauukol sa inyong bayan ang patakbo 
											ng inyong isip at ang inyong 
											pinag-aralan. Ipagbili po ninyo ang 
											lahat ninyong mga ariarian, 
											paghusayin ninyo ang inyong kaban ng 
											damit at sumama kayo sa akin sa 
											Europa; ang singaw ng lupa roo'y 
											makagagaling sa inyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko kalilimutan hanggang 
											nabubuhay ang magandang loob na 
											pakita sa akin ng inyo pong 
											kamahalan! ang isinagot ni Ibarrang 
											nababagbag ng kaunti ang 
											kalooban;--datapuwa't dapat akong 
											tumira sa lupaing kinabuhayan ng 
											aking mga magugulang.....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kinamatayan nila, ang lalong 
											karapatdapat ninyong sabihin! 
											Maniwala po kayo sa akin, marahil 
											higit ang aking pagkakilala sa 
											inyong lupain kay sa inyo ... Ah! 
											maalaala ko pala,--ang kanyang 
											biglang sinabi na nagbago ng anyo ng 
											pananalita,--kayo'y mag-aasawa sa 
											isang dalagang karapatdapat 
											sambahin, ay binibinbin sa kayo 
											dito! Humayo kayo! humayo kayo sa 
											kanyang tabi at ng lalo kayong 
											magkaroon ng kalayaan ay paparituhin 
											ninyo sa akin ang kanyang ama,--ang 
											idinagdag na nakangiti.--Gayon ma'y 
											huwag ninyong lilimuting ibig kong 
											samahan ninyo ako sa pagpapasyal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Yumukod si Ibarra at yumao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinawag ng Kapitan Heneral ang 
											kanyang ayudante.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagagalak ako--anya, na 
											tinatapiktapik ang balikat ng 
											ayudante;--ngayon ko lamang nakita 
											kung paano ang paraan upang maging 
											isang magaling na kastila, na hindi 
											kinakailangang talikdan ang pagka 
											magaling na filipino, at sintahin 
											ang kanyang sariling bayan; sa 
											kawakasa'y naipakilala ko ngayon sa 
											mga prayle na hindi laruan nila ang 
											lahat sa atin; binigyang butas ako 
											ng binatang ito sa paggawa ng gayon, 
											at hindi malalao't mabibigyan ko ng 
											tapat na tumbas ang prayle! Sayang 
											at ang binatang iya'y balang araw ay 
											... datapuwa't paparituhin mo ang 
											Alkalde sa akin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humarap karakaraka sa kanya ang 
											Alkalde.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Alkalde,--ang sinabi sa 
											kanya pagpasok niya,--ng mailagang 
											mangyari uli ang 'napanood' ng 
											kamahalan po ninyong mga 
											'kagagawan', mga kagagawang 
											dinaramdam ko, palibhasa'y 
											'nakasisirang puri' sa gobyerno at 
											sa lahat ng mga kastila, nangangahas 
											akong ipagbilin sa inyo ng 'totoong 
											mahigpit' si ginoong Ibarra, upang 
											hindi lamang ipagkaloob ninyo sa 
											kanya ang mga kinakailangan at ng 
											maganap niya ang kanyang mga 
											panukalang nauukol sa ikapagkakapuri 
											ng Inang-Bayan, kung di naman 
											ipangilag ninyo sa hinaharap na 
											panahong siya'y bagabagin ng taong 
											sino man at sa dahilang paano mang 
											paraan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napag unawa ng Alkalde ang sa 
											kanya'y pagsisi, kaya nga't siya'y 
											yumukod upang mailihim ang 
											kagulumihanan ng kanyang loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipasabi po ninyo ang gayon din sa 
											alperes na siyang nag-uutos dito sa 
											'sekcion', at inyo pong siyasatin 
											kung tunay ngang may mga tanging 
											kagagawang sarili ang ginoong iyan, 
											na hindi sinasabi ng mga 
											'reglamento': hindi lamang iisang 
											karaingan ang aking naringig tungkol 
											sa ganitong bagay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humarap si Kapitan Tiagong matigas 
											ang damit na magaling ang 
											pagkakaprinsa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Don Santiago,--ang sa kanya'y sinabi 
											ng kapitan General sa salitang 
											mairog,--hindi pa nalalaong aking 
											sinaysay ang aking pakikianib sa 
											inyo ng galak, dahil sa pagkakapalad 
											ninyong magkaroon ng isang anak na 
											babaeng gaya na nga baga ng 
											binibining de los Santos, ngayo'y 
											nakikisama naman ako sa galak ninyo, 
											dahil sa inyong mamanugangin: ang 
											katotohanan nga'y ang lalong mabait 
											sa mga anak na babae ay karapatdapat 
											sa lalong magaling na mamamayang 
											lalaki sa Pilipinas. Hindi po ba 
											mangyaring aking maalaman sa inyo 
											kung kailang kaya ipagsasaya ang 
											kanilang pagkakasal?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--!Ginoo!...--ang pautal na sabi ni 
											Kapitan Tiago, at pinahid ang pawis 
											na umaagos sa kanyang noo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! 
											ayon sa masid ko'y wala pang 
											matibayang taning! Sakali't kulang 
											ng mga padrino'y aking ikagagalak ng 
											malaki na ako ay maging isa sa 
											kanila. Ito'y ng mapawi ang aking 
											masamang pakilasa sa maraming 
											kasalang linabasan ko rito ng 
											padrino hangga ngayon!--ang 
											idinugtong, na ang Alkalde ang 
											pinagsasabihan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga po!--ang isinagot ni 
											Kapitan Tiago, kasabay ang isang 
											ngiting nakaaakit sa pagkahabag sa 
											kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinaroonan si Maria Clara ni 
											Ibarrang halos tumatakbo sa paglakad: 
											maraming lubhang sasabihin at 
											isasaysay niya sa kaniyang 
											kasintahan. Nakaringig siya ng 
											masasayang boses sa isa sa mga 
											tahanan ng bahay, kaya't siya'y 
											marahang tumawag sa pintuan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinong 
											tumatawag?--ani Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumahimik ang mga boses at ang 
											pintua'y....hindi nabuksan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako 
											ang tumatawag, makapapasok ba ako?--ang 
											tanong ng binata, na ang puso'y 
											tumitibok ng lubhang malakas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanatili ang katahimikan. ng 
											makaraan ang sandali'y mararahang 
											mga hakbang ang nangagsilapit sa 
											pinto, at ibinulong sa butas ng 
											susian ng masayang boses ni Sinang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Crisostomo, 
											pasasa teatro kami ngayong gabi; 
											isulat mo ang ibig mong sabihin kay 
											Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nangagsilayo ang mga hakbang na 
											matulin ding gaya ng pagkalapit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano 
											ang kahulugan kaya nito?--ang 
											ibinulong ni Ibarrang naglilining-lining 
											at untiunting lumalayo sa pintuan.</font></p>
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