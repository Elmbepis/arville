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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LVII. Vae Victis! Sa Aba ng mga Manlulupig</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">&nbsp;</p>
											<div class="quote" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial">
												<p align="justify" style="margin-left: 80px; margin-right: 80px">
												<font face="Arial" color="#333333" style="font-size: 13pt">
												Napahamak ang aking tuwa.</font></div>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpaparoo't parito ang mga 
											guwardiya sibil, na nakalalagim ang anyo sa 
											harap ng tribunal, at pinagbabalaan 
											ng kulata ang kanilang baril ang 
											pangahas na mga musmos, na tumitiyad 
											o nangagpapasanan upang kanilang 
											matanawan kung ano kaya ang 
											nangaroroon sa dakong loob ng&nbsp;<i>rehas.</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na napapanood sa salas yaong 
											masayang anyo ng panahong 
											pinag-tatalunan ang palatuntunan ng 
											piyesta; ngayo'y malungkot at hindi 
											nakapagbibigay panatag. Ang mga 
											naroroong mga guwardiya sibil at mga 
											kuadrillero'y bahagya ng 
											nagsasalitaan, at sakali't 
											magsalitaan ng ila'y sa tinig na 
											marahan. Nangagsisisulat sa papel, 
											sa ibabaw ng mesa, ang direktorcillo, 
											dalawang eskribiente at ilang mga 
											sundalo; nagpaparoo't parito ang 
											alperes sa magkabikabilang panig, at 
											kanyang manakanakang tinitingnan ng 
											anyong mabalasik ang pintuan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Na ano 
											pa't hindi hihigit sa kanyang 
											pagmamalaki si Temistokles sa mga 
											Laro sa Olimpo, pagkatapos ng 
											pagbabaka sa Salamina. Naghihikab sa 
											isang sulok si Do&ntilde;a Consolacion, na 
											ano pa't ipinakikita ang kanyang 
											maitim na loob ng bibig at mga 
											ngiping pakilwagkilwag; ang paningin 
											niya'y tumititig ng malamig at 
											nakapanganganib sa napupuspos ng mga 
											nakapintang kahalayhalay na mga 
											larawang na sa sa pintuan ng 
											bilangguan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Naipakiusap ng babaeng 
											ito sa kanyang asawa, na lumambot 
											ang loob sa kanyang pagtatagumpay, 
											na ipaubaya sa kanyang mapanood ang 
											mga pagtanong na gagawin, at marahil 
											ay ang mga pagpapahirap na 
											kinauugaliang gamitin. Naaamoy ng 
											halimaw ang bangkay, kanyang 
											inaasam-asam na, at kanyang 
											ikinayayamot ang kalaunan ng 
											pagpapahirap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lagim na totoo ang gobernadorcillo; 
											ang kanyang sillon, yaong dakilang 
											sillong nakalagay sa ilalim ng 
											larawan ng mahal na hari, walang 
											gumagamit, at wari'y natutungkol sa 
											ibang tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumating ang kurang namumutla't 
											kunot ang noo, ng malapit ng 
											tumugtog ang a las nueve.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po naman nagpahintay kayong 
											totoo!--ang sinabi sa kanya ng 
											alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig ko pang huwag ng 
											makiharap,--ang isinagot ni Padre 
											Salvi ng mahinang pananalita, na 
											hindi na pinansin ang anyong 
											masaklap na sabi ng alperes;--akoy 
											totoong malagimin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--sapagkat sino ma'y walang 
											naparirito upang huwag bayaang 
											walang nangangasiwa, inaakala kong 
											ang inyong pakikialam ay ... 
											Nalalaman na po ninyong aalis sila 
											ngayong hapon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang binatang si Ibarra at ang 
											teniente mayor?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itinuro ng alperes ang bilangguan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Walo ang nariyan,--anya;--namatay si 
											Bruno kaninang hating gabi, nguni't 
											nakatitik na ang kanyang mga saysay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bumati ang kura kay Do&ntilde;a 
											Consolacion, na ang isinagot ay 
											isang hikab at isang aah! at naupo 
											sa sillong na sa ilalim ng larawan 
											ng mahal na hari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Makapagpapasimula na tayo!--ang 
											muling sinabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Cunin ninyo ang dalawang 
											nangasasapangaw!--ang ipinag-utos ng 
											alperes, na pinagpilitang ang tinig 
											niya'y mag-anyong kagulagulatang, at 
											humarap sa kura at idinugtong na 
											nagbago ng tinig:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nangasusuot sa pangaw na may 
											patlang na dalawang butas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipaliliwanag namin sa mga hindi 
											nakakaalam kung ano ang kagamitang 
											ito sa pagpapahirap, na ang pangaw 
											ay isa sa mga lalong walang 
											kabuluhan. Humigit kumulang sa isang 
											dangkal ang lalayo ng mga butas na 
											pinagsusuutan ng mga paa ng mga 
											pinipiit; kung patlangan ng dalawang 
											butas, may kahirapan ng kaunti 
											lamang ang kalagayan ng napipiit, na 
											ano pa't nagdaramdam na tanging 
											bagabag sa mga bukong-bukong at 
											nakabukaka ang dalawang paa, na 
											nagkaka-layo ng may mahigit na isang 
											vara: hindi nga nakamamatay 
											agad-agad, ayon sa mapagkukurong 
											magaang ng sino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang tagatanod bilangguang may 
											kasunod na apat na sundalo'y inalis 
											ang talasok at binuksan ang pinto. 
											Nangagsilabas ang isang amoy na 
											labis ng baho at isang hanging 
											malapot at malamig sa makapal na 
											dilim na iyon, kasabay ng 
											pagkaringig ng ilang himutok at 
											pagtangis. Nagsindi ng fosforo ang 
											isang sundalo, datapuwa't namatay 
											ang ningas sa hanging iyong 
											napakabigat at bulok na bulok, 
											kaya't nangapilitang hintayin nilang 
											makapagbagong hangin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa malamlam na liwanag ng isang ilaw 
											ay kanilang naaninagnagan ang ilang 
											may mga mukhang tao: mga taong 
											nakayakap sa kanilang mga tuhod at 
											sa pag-itan ng dalawang tuhod nilang 
											ito'y ikinukubli ang kanilang ulo, 
											mga nakataob, nangakatindig, 
											nangakaharap sa pader, at iba pa. 
											Naringig ang isang pukpok at 
											pagkalairit, na kaakbay ng mga 
											tungayaw; binubuksan ang pangaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakayukod si Do&ntilde;a Consolacion, 
											nakaunat ang mga kasukasuan ng liig, 
											luwa ang mga mata at nakatitig sa 
											nakasiwang na pinto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumabas ang isang anyong 
											nakapag-aalap-ap na nagigitna sa 
											dalawang sundalo; yao'y si Tarsilo 
											na kapatid ni Bruno. May mga 
											'esposas' ang mga kamay; 
											ipinamamasid ng kanyang mga wasak 
											wasak na mga damit ang kanyang 
											batibot na mga kasukasuan. Tinitigan 
											niyang walang pakundangan ang asawa 
											ng alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa likuran ni Tarsilo'y sumipot ang 
											isang anyong kahabaghabag, na 
											tumataghoy at umiiyak na anaki'y 
											musmos; pilay kung lumakad at may 
											dungis na dugo ang salawal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iya'y isang mapangdaya,--ang 
											inihiwatig ng alperes sa kura; 
											nagbantang tumakas, nguni't 
											nasugatan siya sa hita. Ang dalawang 
											ito ang tanging mga buhay sa kanila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang pangalan mo?--ang itinanong 
											ng alperes kay Tarsilo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tarsilo Alasigan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang ipinangako sa inyo ni Don 
											Crisostomo upang looban ninyo ang 
											kuartel?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kailan ma'y hindi nakikipag-usap sa 
											amin si Don Crisostomo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag mong itanggi! Kaya binanta 
											ninyong kami ay subukin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagkakamali po kayo; pinatay po 
											ninyo sa kapapalo ang aming ama, 
											siya'y ipinanghihiganti namin, at 
											wala ng iba. Hanapin po ninyo ang 
											inyong dalawang kasama.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtataka ang alperes na tiningnan 
											ang sargento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nangaroon sila sa bangin, doon sila 
											itinapon namin kahapon, doon sila 
											mabubulok. ngayo'y patayin na ninyo 
											ako, wala na kayong malalamang ano 
											pa man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumahimik at nanggilalas ang lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sabihin mo sa amin kung sino sino 
											ang iyong mga ibang kainalam,--ang 
											ibinanta ng alperes na iniwawasiwas 
											ang isang yantok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumungaw sa mga labi ng may sala ang 
											isang ngiti ng pagpapawalang halaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakipag-usap ng sandali sa kura ang 
											alperes, na marahan ang kanilang 
											salitaan; at saka humarap sa mga 
											sundalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ihatid ninyo siya sa kinalalagyan 
											ng mga bangkay!--ang iniutos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa isang sulok ng patio, sa ibabaw 
											ng isang karretong luma, ay 
											nakabunton ang limang bangkay, na 
											halos natatakpan ng kapirasong 
											gulanit na banig na puno ng 
											karumaldumal na mga dumi. 
											Nagpaparoo't parito sa 
											magkabikabilang dulo ang isang 
											sundalo, na maya't maya'y lumulura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala mo ba sila?--ang tanong 
											ng alperes na itinataas ang banig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot si Tarsilo; nakita 
											niya ang bangkay ng asawa ng ulol na 
											babae na kasama ng mga iba; ang 
											bangkay ng kanyang kapatid na tadtad 
											ng sugat ang katawan, sa kasasaksak 
											ng bayoneta, at ang kay Lucas na may 
											lubid pa sa liig. Lumungkot ang 
											kanyang paningin at tila mandin 
											nagpumiglas sa kanyang dibdib ang 
											isang buntong hininga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala mo sila?--ang muling sa 
											kanya'y itinanong nila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanatili sa pagka pipi si Tarsilo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang haginit ang siyang 
											umalingawngaw sa hangin at pumalo 
											ang yantok sa kanyang likod. 
											Nanginig, nangurong ang kanyang mga 
											kasukasuan. Inulit-ulit ang pagpalo 
											ng yantok, nguni't nanatili si 
											Tarsilo sa pagwawalang bahala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hagupitin siya ng palo hanggang sa 
											pisanan o magsalita!--ang sigaw ng 
											alperes na nagngingitngit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magsabi ka na!--ang sinabi sa kanya 
											ng direktorcillo;--sa papaano ma'y 
											papatayin ka rin lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling inihatid siya sa salas na 
											kinalalagyan ng isang napipiit, na 
											tumatawag sa mga santo, 
											nangangaligkig ang mga ngipin at ang 
											mga paa'y kusang nahuhubog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala mo ba iyan?--ang tanong 
											ni Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayon ko lamang siya nakita!--ang 
											sagot ni Tarsilo, na minamasdan ang 
											isa ng may halong habag.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binigyan siya ng isang suntok at 
											isang sikad ng alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inyong igapos siya sa bangko!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na inalis sa kanya ang mga 
											'esposas' na nadudumhan ng dugo, at 
											siya'y itinali sa isang bangkong 
											kahoy. Lumingap ang kaawaawa sa 
											kanyang paligid, na anaki'y may 
											hinahanap siyang ano man, at ng 
											kanyang nakita si Do&ntilde;a Consolacion, 
											siya'y humalakhak ng patuya. Sa 
											pagtataka ng mga nanonood ay 
											sinundan nila ang tinitingnan ng 
											nagagapos, at ang kanilang nakita'y 
											ang ginoong babae, na nangangatlabi 
											ng kaunti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi pa ako nakakakita ng ganyang 
											kapangit na babae!--ang biglang 
											sinabi ng malakas ni Tarsilo, sa 
											gitna ng hindi pag-imik nino 
											man;--ibig ko pang humiga sa ibabaw 
											ng isang bangko, na gaya ng 
											kalagayan ko ngayon, kay sa humiga 
											ako sa siping niya na gaya ng 
											alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namutla ang Musa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Papatayin po ninyo ako sa palo, 
											ginoong alperes,--ang 
											ipinagpatuloy;--ngayong gabi 
											ipanghihiganti ako ng inyong asawa 
											pagyakap niya sa inyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lagyan ninyo ng pang-al ang 
											bibig!--ang sigaw ng alperes na 
											nahihibang at nangangatal sa galit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tila mandin walang ibang hinahangag 
											si Tarsilo kung di ang siya'y 
											magkapang-al, sapagkat pagkatapos 
											na siya'y malagyan ng pang-al na 
											iyon, nagsaysay ang kanyang mga mata 
											ng isang kislap ng katuwaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa isang hudyat ng alperes, 
											pinasimulan ng isang guwardiyang may 
											hawak na isang yantok, ang kanyang 
											kahapishapis na katungkulan, 
											Nangurong ang&nbsp; buong&nbsp; katawan ni 
											Tarsilo; isang ungol na sakal at 
											mahaba ang siyang naringig, baga man 
											napapasalan ang kanyang bibig ng 
											damit; tumungo: napipigta ang 
											kanyang damit ng dugo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumindig ng&nbsp; buong&nbsp; hirap si Padre 
											Salvi, na namumutla't sira ang 
											paningin, humudyat ng kamay, at 
											linisan ang salas na nangangalog ang 
											mga tuhod. Nakita niya sa daan ang 
											isang dalagang nakasandal sa pader, 
											matuwid ang katawan, hindi 
											kumikilos, nakikinig na lubos, 
											tinitingnan ang alang-alang, 
											nakaunat ang mga nangangayumkom na 
											mga kamay sa lumang muog. Binibilang 
											manding hindi humihinga ang mga 
											hampas na makalabog, walang 
											taginting at yaong kahambal-hambal 
											na daing. Siya ang kapatid na babae 
											ni Tarsilo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y ipinagpapatuloy sa salas 
											ang kagagawang iyon; ang kulang 
											palad, sa hindi na makayang bathing 
											hirap, ay napipi at hinintay na 
											mangapagal ang kanyang mga verdugo. 
											Sa kawakasa'y inilawit ang mga bisig 
											ng sundalong humihingal; ang 
											alperes, na namumutla sa galit at sa 
											panggigilalas, humudyat ng isa upang 
											kalagin ang pinahihirapan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang magkagayo'y nagtindig si Do&ntilde;a 
											Consolacion at bumulong ng ilan sa 
											kanyang asawa. Tumango ito, sa 
											pagpapakilalang kanyang naunawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dalhin siya sa balon!--anya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natatalastas ng mga filipino kung 
											ano ang kahulugan ng salitang ito; 
											isinasatagalog nila sa sabing&nbsp;<i>timbain.</i>&nbsp;Hindi 
											namin maalaman kung sino kaya ang 
											nakaisip ng ganitong gawa. Ang 
											Catotohanang umaahon sa isang balon, marahil ay isang pagbibigay 
											kahulugang napakamatinding libak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa gitna ng patio ng tribunal ay 
											naroroon ang kaayaayang pader na na 
											kaliligid sa isang balon; ang pader 
											na yao'y batong buhay na magaspang 
											ang pagkakagawa. Isang kasangkapang 
											tulad sa pinggang kawayan 
											(timbalete) ang siyang doo'y gamit 
											sa pagkuha ng tubig na malapot, 
											marumi at mabaho. mga papantingin, 
											mga dumi at iba pang masasamang 
											tubig ang doo'y natitipon, sapagkat ang 
											balong yao'y tulad 
											naman sa bilangguan; doon inihuhulog 
											ang lahat ng pinawawalang halaga o 
											ipinalalagay na wala nang kabuluhan; 
											kasangkapang doo'y mahulog, 
											magpakabutibuti, wala ng halaga. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Gayon ma'y hindi tinatabunan kailan 
											man: manakanakang pinahihirapan ang 
											mga bilanggong hukayi't palaliman 
											ang balong iyon, hindi dahil sa 
											balak na muha ng kapakinabangan sa 
											parusang iyon, kung di dahil sa mga 
											kahirapang nangyayari sa gawang 
											iyon: ang bilanggong doo'y lumusong 
											ay nakakakuha ng lagnat na ang 
											karaniwa'y ikinamamatay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinanonood ni Tarsilo, na nakatitig, 
											ang mga paghahanda ng mga sundalo; 
											siya'y namumutla ng mainam at 
											nangangatal ang kanyang mga labi o 
											bumubulong ng isang dalangin. Wari'y 
											nawala ang pagmamataas niya sa 
											kanyang di maulatang hirap, o kung 
											hindi ma'y hindi na totoong 
											masimbuyo. Makailang inilungayngay 
											ang nakalindig na liig, tumitig sa 
											lupa, sang-ayong magdalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dinala siya nila sa pader na 
											nakaliligid sa balon, na sinusundan 
											ni Do&ntilde;a Consolaciong nakangiti. 
											Isang sulyap, na may taglay na 
											panaghili, ang itinapon ng sawing 
											palad, sa nagkakapatong-patong na 
											mga bangkay, at isang buntong 
											hininga ang tumakas sa kanyang 
											dibdib.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magsabi ka na!--ang muling sinabi sa 
											kanya ng direktorcillo,--sa papaano 
											ma'y bibitayin ka; mamatay ka man 
											lamang na hindi totoong naghirap ng 
											malaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aalis ka rito upang mamatay,--ang 
											sinabi sa kanya ng isang 
											kuadrillero.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Inalisan nila siya ng pang-al, at 
											ibinitin siyang ang tali ay sa mga 
											paa. Dapat siyang ihugos ng 
											patiwarik at manatiling malaon laon 
											sa ilalim ng tubig, katulad ng 
											ginagawa sa timba, na ang kaibhan 
											lamang ay lalong pinalalaon ang tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umalis ang alperes upang humanap ng 
											relos at ng bilangin ang mga minuto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y nakabitin si Tarsilo, 
											ipinapawid ng hangin ang kanyang 
											mahabang buhok, nakapikit ng kaunti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung kayo'y mga kristiano, kung may 
											puso kayo,--ang ipinamanhik ng 
											paanas,--ihugos ninyo ako ng matulin, 
											o ihugos ninyo sa isang paraang 
											sumalpok ang aking ulo sa bato at ng 
											ako'y mamatay na. Gagantihin kayo ng 
											Diyos sa magandang gawang ito ... 
											marahil sa ibang araw ay mangyari sa 
											inyo ang kinahinatnan ko.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagbalik ang alperes at pinanguluhan 
											ang paghuhugos na tangan ang relos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahan, marahan!--ang sigaw ni 
											do&ntilde;a Consolaciong sinusundan ng mata 
											ang kahabaghabag;--mag-ingat kayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahang bumababa ang timbalete; 
											humihilahis si Tarsilo sa mga batong 
											nangakaumbok at sa mga mababahong 
											damong sumisibol sa mga giswak. 
											Pagka tapos ay hindi na kumilos ang 
											timbalete; binibilang ng alperes ang 
											mga segundo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Itaas!--ang matinding utos, ng 
											makaraan na ang kalahating minuto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang ingay na mataginting at 
											nagkakasaliwsaliw ng mga patak ng 
											tubig na nahuhulog sa ibabaw ng 
											tubig ang siyang nagbalita ng 
											pagbabalik ng may sala sa 
											kaliwanagan. ngayon, palibhasa'y 
											lalong mabig-at ang pabato, siya'y 
											nanhik ng mabilis. Nanglalaglag ng 
											malaking ingay ang mga batong 
											natitingkab sa mga tabi ng balon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natatakpan ang kanyang noo't ang 
											kanyang buhok ng karumaldumal na 
											pusali, puspos ng mga sugat at mga 
											galos ang kanyang mukha, ang 
											katawa'y basa at tumutulo, ng siya'y 
											sumipot sa mga mata ng karamihang 
											hindi umiimik; pinapangangaligkig 
											siya sa ginaw ng hangin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig mo bang magsaysay?--ang sa 
											kanya'y kanilang itinanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag mong pabayaan ang kapatid 
											kong babae!--ang ibinulong ng 
											kaawaawa, na tinititigan ng pagsamo 
											ang isang kuadrillero.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling kumalairit ang pinggang 
											kawayan, at muling nawala ang 
											pinahihirapan. Nahihiwatigan ni Do&ntilde;a 
											Consolaciong hindi gumagalaw ang 
											tubig. Bumilang ng isang minuto ang 
											alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang muling ipanhik si Tarsilo'y 
											nakawingi at nangingitim ang mukha. 
											Tinitigan niya ang mga naroroon at 
											nanatiling nakadilat ang mga matang 
											nanga mumula sa dugo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magsasabi ka ba?--ang muling 
											itinanong ng alperes na ang tinig ay 
											nanglulupaypay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umiling si Tarsilo, at muli na 
											namang inihugos siya. Untiunting 
											nasasarhan ang mga pilik-mata niya, 
											ang balingtatao ng kanyang mga 
											mata'y nananatili sa pagtitig sa 
											langit na pinapawiran ng mapuputing 
											alapaap; ibinabali ang liig upang 
											makapanatili sa panonood ng liwanag 
											ng araw, nguni't pagdaka'y 
											napilitang lumubog sa tubig, at 
											tinakpan ng karumaldumal na tabing 
											na iyon ang kanyang minamasdang 
											daigdig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdaan ang isang minuto; namasid ng 
											tumitinging Musa ang malalaking 
											bulubok ng tubig na napaiibabaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nauuhaw!--ang sabing tumatawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At muling tumining ang tubig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang minuto't kalahati ang itinagal 
											ngayon, bago humudyat ang alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na nakawingi ang mukha ni 
											Tarsilo; nasisilip sa nakasiwang na 
											pangisap ang puti ng mata, lumalabas 
											sa bibig ang tubig na pusaling may 
											kahalong kumakayat na dugo; 
											humihihip ang hanging malamig, 
											nguni't hindi na nangangangaligkig 
											ang kanyang katawan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtinginan ang lahat na walang 
											imik, nangamumutla at pawang nanga 
											alagim. Humudyat ang alperes upang 
											alisin sa pagkabitin si Tarsilo at 
											lumayong naglilininglining; 
											makailang idiniit ni Do&ntilde;a 
											Consolacion sa nakalilis na mga paa 
											ng bangkay ang baga ng kanyang 
											tabako, nguni't hindi kumatal ang 
											katawan at namatay ang apoy.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nag-inis siya sa sarili!--ang 
											ibinulong ng isang 
											kuadrillero;--masdan ninyo't 
											binaligtad ang kanyang dila, na 
											anaki pinaksa niyang lunukin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagmamasdang nangangatal at 
											nagpapawis niyong isang bilanggo ang 
											mga ginagawang iyon; lumilingap na 
											ang kamukha'y ulol sa lahat ng 
											panig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipinag-utos ng alperes sa 
											direktorcillong tanungin ang 
											bilanggong iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo, ginoo!--ang hibik;--akin 
											pong sasabihin ang lahat ninyong 
											maibigang sabihin ko!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y mabuti! tingnan natin; 
											ano ang pangalan mo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Andong, po!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bernardo ... Leonardo ... Rikardo 
											... Eduardo ... Gerardo ... o ano?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Andong, po!--ang inulit ng kulang 
											kulang ang isip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ilagay ninyong Bernardo o ano 
											man,--ang inihatol ng alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Apellido?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan siya ng taong iyong 
											nagugulat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang pangalan mong dagdag sa 
											ngalang Andong?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, ginoo! Andong kulang-kulang 
											po!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi napigil ang tawa ng 
											nangakikinig; pati ang alperes ay 
											tumigil ng pagpaparoo't parito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang hanap-buhay mo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Manunuba po ng niyog, at alila po 
											ng aking biyanang babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ang nag-utos sa inyong looban 
											ninyo ang kuartel?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala po!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Anong wala? Huwag kang 
											magsinungaling at titimbain ka! sino 
											ang nag-utos sa inyo? Sabihin mo ang 
											katotohanan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang katotohanan po!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino po!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Itinatanong 
											ko sa iyo kung sino ang nag-utos sa 
											inyong kayo'y mangag-alsa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Alin 
											po bang alsa?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyon, 
											kung kaya ka doroon kagabi sa patio 
											ng kuartel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, ginoo!--ang biglang sinabi ni 
											Andong na nagdadalang kahihiyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino nga ang may kasalanan ng bagay 
											na iyan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang akin pong biyanang babae!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tawanan at panggigilalas ang sumunod 
											sa mga salitang ito. Huminto ng 
											paglakad ang alperes at tiningnan ng 
											mga matang hindi galit ang kaawaawa, 
											na sa pagkaisip na magaling ang 
											kinalabasan ng kanyang mga sinabi, 
											nagpatuloy ng pananalitang masaya 
											ang anyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya 
											nga po; hindi po ako pinakakain ng 
											aking biyanang babae kung di iyong 
											mga bulok at wala ng kabuluhan; 
											kagabi, ng ako'y umuwi rito'y 
											sumakit ang aking tiyan, nakita kong 
											na sa malapit ang patio ng kuartel, 
											at aking sinabi sa sarili;--ngayo'y 
											gabi, hindi ka makikita nino man.--Pumasok 
											ako ... at ng tumitindig na ako'y 
											umalingawngaw ang maraming putukan: 
											itinatali ko po ang aking salawal....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang hampas ng yantok ang pumutol 
											ng kanyang pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa bilangguan!--ang iniutos ng 
											alperes;--ihatid siya ngayong hapon 
											sa kabekera!</font></p>
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