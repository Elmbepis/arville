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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LXI. Ang Panghuhuli sa Dagatan</font></b></p>
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
											--Pakinggan 
											po ninyo ang aking gagawing aking 
											inisip,--ani Elias na nag 
											ninilaynilay, samantalang 
											pinatutunguhan nila ang San Gabriel. 
											Itatago ko kayo ngayon sa bahay ng 
											isa kong kaibigan sa Mandaluyong; 
											dadalhin ko sa inyo ang lahat 
											ninyong salapi, na aking iniligtas 
											at itinago ko sa paanan ng baliti, 
											sa matalinghagang pinaglibingan sa 
											inyong nunong lalaki; at umalis kayo 
											rito sa Pilipinas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ng pasaibang lupain ako?--ang 
											isinalabat ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Upang 
											manatili kayo sa kapayapaan sa 
											natitira pa ninyong buhay. May mga 
											kaibigan kayo sa Espa&ntilde;a, kayo'y 
											mayaman, makapagpapa<i>indulto</i>&nbsp;kayo. 
											Sa papaano mang paraan, ang ibang 
											lupai'y isang bayang sa ati'y lalong 
											magaling kay sa sarili.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot si Crisostomo; 
											naglininglining na hindi umiimik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumarating sila ng sandaling iyon sa 
											ilog Pasig, at nagpasimula ang 
											bangka ng pagsalunga sa agos. 
											Nagpapatakbo ang isang nagkakabayo 
											sa ibabaw ng tulay ng Espa&ntilde;a at may 
											nariringig na isang mahaba't 
											matinding tunog ng pito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Elias,--ang muling sinabi ni Ibarra; 
											nanggaling ang inyong kasawiang 
											palad sa aking familia, iniligtas 
											ninyong makaalawa ang aking buhay, 
											at hindi lamang may malaking utang 
											na loob ako sa inyo, kung di naman 
											kautangan ko rin sa inyo ang 
											pagsasauli ng inyong kayamanan, at 
											yayamang gayo'y sumama kayo sa akin 
											at magsama tayong parang magkapatid. 
											Dito'y sawi rin kayong kapalaran.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umiling ng&nbsp; buong&nbsp; kapanglawan si 
											Elias, at sumagot:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mangyayari! Tunay nga't hindi 
											ako mangyayaring&nbsp;suminta't magtamo 
											ng ligaya sa lupang aking 
											kinamulatan, nguni't mangyayaring 
											ako'y magkahirap at mamatay sa 
											lupaing iyan at marahil ay dahil sa 
											kanya; handog din kahi't kakaunti! 
											Ibig kong ang kapahamakan ng aking 
											baya'y siyang aking maging 
											kapahamakan, at sa pagkat hindi 
											pinapagkakaisa tayo ng isang mahal 
											na kaisipan, sapagkat hindi 
											tumitibok ang ating mga puso sa 
											iisang pangalan, nais kong 
											mapakisama ako sa aking mga 
											kababayan sa kasawiang palad ng 
											lahat, mapakisama man lamang ako sa 
											pagtangis sa pagdaralita naming 
											lahat, na inisin ng iisang kasamang 
											palad ang lahat naming mga puso!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y bakit inihahatol ninyo 
											sa aking ako'y manaw?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--sapagkat sa ibang panig ay 
											mangyayaring kayo'y lumigaya at 
											ako'y hindi, sapagkat hindi kayo 
											handa sa pagkakahirap, at sapagkat 
											kasususutan ninyo ang inyong bayan, 
											kung dahil sa kanya'y masawing palad 
											kayo isang araw; at wala ng totoong 
											kasamasamaang palad na gaya ng 
											masusot sa kanyang bayang 
											kinamulatan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi matuwid ang inyong palagay sa 
											akin!--ang biglang sinabi ni Ibarra 
											sa masaklap na tutol;--nalilimutan 
											ninyong kararating ko pa lamang 
											dito'y pagdaka'y hinanap ko ang 
											kanyang ikagagaling.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag po kayong manghinuha, ginoo, 
											hindi ko kayo sinisisi; maano na 
											ngang kayo'y siyang uliranin ng 
											lahat! Datapuwa't aayaw akong 
											humingi sa inyo ng mga hindi 
											mangyayari, at huwag po kayong 
											magagalit kung sabihin ko sa inyong 
											kayo'y dinaraya ng inyong puso. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dating iniibig po ninyo ang 
											kinamulatan ninyong bayan, sapagkat ganyan ang sa inyo'y itinuro 
											ng inyong ama; dating iniibig po 
											ninyo ang kinamulatan ninyong bayan, 
											palibhasa'y sa kanya naroroon ang 
											inyong sinta, kayamanan, kabataan, 
											sapagkat ngumingiti sa inyo ang 
											lahat hindi pa gumagawa sa inyo ng 
											lihis sa katuwiran ang kinamulatan 
											ninyong bayan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dating iniibig ninyo 
											ang kinamulatan ninyong bayan, 
											kawangis ng ating pag-ibig sa lahat 
											ng bagay na nagbibigay sa atin ng 
											kaligayahan. Datapuwa't ang araw na 
											kayo'y maghirap, magutom, 
											pag-usigin, ipagkanulo at ipagbili 
											ng inyo ring mga kababayan, sa araw 
											na iya'y inyong susumapain ang 
											inyong sariling katawan, ang inyong 
											kinamulatang bayan at ang lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakasasakit sa&nbsp;akin ang inyong mga 
											salita,--ani Ibarra na 
											naghihinanakit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumungo si Elias, nagdilidili at 
											muling nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig kong iligtas kayo sa karayaan, 
											ginoo, at ilihis ko sa inyo ang 
											isang malungkot na pagsasapit sa 
											panahong hinaharap. Inyo pong 
											alalahanin ang pakikipag-usap ko sa 
											inyo sa bangka ring ito at liwanag 
											nito ring buwang ito, na may isang 
											buwan na ngayon, humigit kumulang; 
											sumasaligaya kayo niyon. Hindi 
											makarating hanggang sa inyo ang 
											pamanhik ng mga kulang-palad.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pinawalang halaga ninyo ang kanilang 
											mga daing, sapagkat daing ng mga 
											masasamang tao, lalong pinakinggan 
											ninyo ang kanilang mga kaaway at, 
											kahi't ako'y nangatuwira't kayo'y 
											aking pinamanhika'y kumampi rin kayo 
											sa panig ng mga umaapi sa kanila, at 
											niyao'y sumasainyong mga kamay ang 
											ako'y sumamang tao o ang ako'y 
											papatay upang aking maganap ang 
											isang mahal na pangako. Hindi 
											itinulot ng Diyos, sapagkat namatay 
											ang matandang puno ng mga tulisan 
											... Nakaraan ang isang buwan at 
											ngayo'y iba na ang inyong kaisipan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasakatuwiran po kayo, Elias, 
											nguni't ang tao'y isang hayop na 
											sumusunod sa kasalukuyang mga 
											nangyayari: niyo'y nabubulagan ako, 
											masama ang aking loob, ayawan ko ba? 
											ngayo'y inaklas ng kapahamakan ang 
											aking piring; tinuruan ako ng aking 
											pag-iisa at paghihirap sa 
											bilangguan; nakikita ko ngayon ang 
											kakilakilabot na&nbsp;<i>kanker</i>&nbsp;na 
											kumikitib sa mga namamayan dito 
											ngayon, na kumakapit sa kanyang mga 
											laman at nagkakailangan ng isang 
											makirot at ganap na paglipol. 
											Binuksan nila ang aking mga mata, 
											ipinamalas sa akin ang bulok na 
											sugat at kanilang pinipilit na ako'y 
											maging masamang tao! </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											At yamang 
											kanilang inibig, magpifilibuster 
											ako, nguni't tunay na filibustero; 
											tatawagin ko ang lahat ng kulang 
											palad, ang lahat ng nakararamdam ng 
											tibok ng puso sa loob ng kanyang 
											dibdib, yaong mga taong sa inyo'y 
											nangagpasugo sa akin ... hindi ako 
											magiging masamang tao, kailan ma'y 
											hindi masamang tao ang nakikibaka 
											dahil sa kanyang kinagisnang bayan, 
											tumbalik. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa loob ng tatlong daang tao'y 
											sila'y hinahalina natin, hinihingan 
											natin sila ng pagsinta, minimithi 
											nating tawagin silang kapatid, ano 
											ang kanilang isinasagot? Tayo'y 
											sinasagot ng lait at paglibak, at 
											ikinakait sa atin pati ng ating 
											kalagayang pagka tao na gaya rin ng 
											iba. Walang Diyos, walang pag-asa, 
											walang habag sa kapwa tao; wala nga 
											kung di ang katuwiran ng lakas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagngangalit si Ibarra; nangangatal 
											ang kanyang&nbsp; buong&nbsp; katawan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumaan sila sa tapat ng palakio ng 
											General, at kanilang namasid na tila 
											nangagsisigalaw at nangagkakagulo 
											ang mga bantay na sundalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kanila na yatang nasiyasat ang 
											pagkakatanan?--ang ibinulong ni 
											Elias--Humiga po kayo, ginoo, at 
											kayo'y tatabunan ko ng damo, sapagkat daraan tayo sa tabi ng 
											Polvorista'y baka maino ng bantay na 
											sundalo kung bakit dalawa tayo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang bangka ay isa riyan sa maninipis 
											at makikipot na sasakyang hindi 
											lumalakad kung di dumudulas sa 
											ibabaw ng tubig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Alinsunod nga sa inakala na ni 
											Elias, siya'y pinahinto ng bantay na 
											sundalo at tinanong kung saan siya 
											galing.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagdala po ako ng damo sa Maynila, 
											sa mga oidor at sa m`ga kura,--ang 
											isinagot, na kanyang ginagad ang 
											anyo ng pananalita ng mga taga 
											Pandakan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumabas ang isang sargento't inalam 
											kung ano ang nangyayari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sulong!--ang sinabi sa kanya nito; 
											ipinauunawa ko sa iyo na huwag kang 
											magpapasakay sa iyong bangka kangino 
											man; bagong katatakas ng isang 
											bilanggo. Kung siya'y mahuli mo at 
											maibigay mo sa aki'y bibigyan kata 
											ng isang magaling na pabuya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo, ginoo; ano po ba ang mga 
											ikakikilala ko sa kanya?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya'y nakalevita at nagwiwikang 
											kastila; hala, ikaw ang bahala!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumayo ang bangka. Lumingon si Elias 
											at kanyang nakita ang anyo ng bantay 
											na sundalong nakatindig sa tabi ng 
											pampang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masasayang sa atin ang ilang 
											minutong panahon,--ang sabing 
											marahan;--dapat pumasok tayo sa ilog 
											Beata at ng kunuwari'y taga 
											Pe&ntilde;afrankia ako. Makikita po ninyo 
											ang ilog na inawit ni Francisko 
											Baltazar.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natutulog ang bayan sa liwanag ng 
											buwan. Nagtindig si Crisostomo't 
											upang kanyang takhan ang katahimikan 
											ng mga linalang na tulad sa 
											libingan. Makipot ang ilog at ang 
											kanyang mga pampangi'y kapatagang 
											natatamnan ng damo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itinapon sa pampang ni Elias ang 
											kanyang dala, tinangnan ang isang 
											mahabang tikin at kumuha sa ilalim 
											ng damo ng mga bayong na walang 
											laman. Nagpatuloy sila ng 
											pamamangka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po ang may ari ng inyong 
											kalooban, ginoo, at ng inyong 
											hinaharap na panahon,--ang sinabi 
											niya kay Crisostomo, na nananatili 
											sa hindi pag-imik.--nguni't kung 
											itutulot po ninyo sa akin ang isang 
											pagpapahiwatig, sasabihin ko sa 
											inyo: Tingnan po ninyong magaling 
											ang inyong gagawin, inyong 
											papag-aalabin ang pagbabaka, 
											palibhasa'y kayo'y may salapi at 
											katalinuhan at makakakita agad kayo 
											ng maraming mga kagawad, at sa 
											kawalang palad ay maraming masasama 
											ang loob. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapuwat, sa pagbabakang 
											itong inyong gagawin, ang lalong 
											mangahihirapa'y ang mga walang 
											ikapagtatanggol at ang mga walang 
											malay. Ang mga damdamin ding may 
											isang buwan na ngayong sa aki'y 
											umudyok na sa inyo'y makiusap, upang 
											hingin ang mga pagbabagong utos, ang 
											mga damdamin ding iyan ang siyang 
											umaakit ngayon sa aking sa inyo'y 
											magsabi na maglininglining muna 
											kayo. Hindi po nag-iisip ang mga 
											tagaritong humiwalay sa Ina ng ating 
											kinagisnang lupa; walang hinihingi 
											kung di kaunting kalayaan, kaunting 
											pagbibigay katuwiran at kaunting 
											giliw. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tutulungan kayo ng mga may 
											galit, ng mga masasamang tao, ng mga 
											wala ng pagkasiyahan sa sama ng 
											loob, datapuwa't hindi makikialam 
											ang bayan. Magkakamali po kayo, kung 
											dahil sa nakita ninyong ang lahat ay 
											madilim ay mag-akala po kayong wala 
											ng pagkasiyahan sa sama ng loob ang 
											bayan. Nagdaralita nga ang bayan, 
											tunay nga, datapuwa't umaasa pa, 
											nananalig pa, at kaya lamang siya 
											titindig ay kung maubos na ang 
											kanyang pagtitiis, sa makatuwid 
											baga'y kung kailan ibigin ng mga 
											namamahalang maubos ang pagtitiis na 
											iyan, bagay na may kalayuan pa. Ako 
											man ay hindi marahil sumama sa inyo, 
											hindi ako gagamit kailan man ng mga 
											huling panggamot na iyan, 
											samantalang nakikita kong may 
											pag-asa pa ang mga tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung magkagayo'y gagawin kong hindi 
											kayo kasama!--ang muling sinabi ni 
											Crisostomong talagang handa na.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan po ba ang matibay na panukala 
											ninyo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang matibay at tangi, saksi ko ang 
											pangalan ng aking ama! Hindi ko 
											maaaring ipaagaw ng pagayon na 
											lamang ang aking kapayapaa't ligaya, 
											ako na walang ibang hinangad kung di 
											ang kagalingan, ako na ang lahat ay 
											aking iginalang at tiniis dahil sa 
											pagsinta sa isang religiong 
											magdaraya at mapagpaimbabaw, dahil 
											sa pagsinta sa isang bayang aking 
											tinubuan. Ano ang kanilang itinumbas 
											sa akin? </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang ako'y ibaon sa isang 
											imbing bilangguan at sirain ang 
											magandang kaasalan ng aking talagang 
											magiging esposa. Hindi! kung hindi 
											ako manghiganti'y magiging isang 
											kasamasamaang gawa, magiging 
											pagpapalakas ng kanilang loob upang 
											sila'y gumawa ng bago't bagong mga 
											paglabag sa katuwiran! Hindi, kung 
											di ko gawin ang gayo'y magiging 
											isang karuwagan, kahinaan ng loob, 
											humibik at tumangis gayong may 
											dugo't may buhay, gayong inilangkap 
											nila sa paglait at paghamit ang 
											paglulugso ng kapurihan! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tatawagin ko ang bayang mangmang na 
											iyan, ipakikilala ko sa kanya ang 
											imbi niyang kalagayan; na huwag 
											siyang umisip sa mga kapatid; wala 
											nga kung hindi mga lobo na 
											nangaglalamunan, at sasabihin ko sa 
											kanilang laban sa kaapihang ito'y 
											tumitindig at tumututol ang walang 
											hanggang karapatan ng tao upang 
											tuklasin sa lakas ang kanyang 
											kalayaan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang bayang walang malay ang siyang 
											maghihirap!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lalong magaling! Maipakikihatid po 
											ba ninyo ako hanggang sa kabundukan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hanggang sa malagay kayo sa 
											kapanatagan!--ang sagot ni Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling sila'y lumabas sa Pasig. 
											Manakanakang nagsasalitaan sila ng 
											mga walang kabuluhan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Santa Ana!--ang ibinulong ni 
											Ibarra,--napagkikilala po ba ninyo 
											ang bahay na ito?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kasalukuyang dumaraan sila sa tapat 
											ng bahay na liwaliwan sa labas ng 
											bayan ng mga jesuita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diya'y aking tinamo ang mahabang 
											panahong maligaya't masaya!--ang 
											buntong-hininga ni Elias.--Napaririyan kami buwan buwan 
											... ng panahong iyo'y wangis ako sa 
											mga iba: may kayamanan, may familia, 
											nananag-inip at nakikinikinita ang 
											isang magandang panahong sasapit. 
											Nakikita ko ng mga panahong iyon ang 
											aking kapatid na babae na na sa 
											isang kolegiong kalapit; 
											hinahandugan ako ng mga bordadong 
											gawa ng kanyang mga kamay ... 
											sinasamahan siya ng isang kaibigang 
											babae, na isang magandang dalaga. 
											Nagdaang lahat na parang isang 
											panaginip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanatili sila sa hindi pag-imik 
											hanggang sa dumating sa 
											Malapad-na-bato. Ang nakapamangka 
											kung gabi sa Pasig, minsan man 
											lamang, sa isa riyan sa mga 
											kaayaayang gabing handog ng 
											Filipinas, pagka nagsasabog ang 
											buwan, mula sa dalisay na bughaw, ng 
											malungkot na pagpapaalaala; pagka 
											itinatago ng dilim ang kaimbihan ng 
											mga tao at kinukublihan ng 
											katahimikan ang abang alingawngaw ng 
											kanilang tinig; pagka ang Naturaleza 
											ang tanging nagsasalita, ang mga 
											gayon ang makauunawa ng 
											pinagdidilidili ng dalawang binata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtutuka ang karabinero sa 
											Malapad-na-bato, at ng makitang 
											walang laman ang bangka, at walang 
											ano mang idinudulot na sukat niyang 
											masamsam, ayon sa dating kaugaliang 
											pinaglamnan na ng kalahatlahatang 
											mga karabinero at ng mga 
											karabinerong nangaroroon, pinabayaan 
											silang makaraan agad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi rin naman nagsasapantaha ng 
											ano man ang guwardiya sibil sa Pasig, 
											kaya't hindi sila binagabag.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpasimula ng paguumaga ng sila'y 
											dumating sa dagatang noo'y maamo't 
											payapang tulad sa isang 
											kalakilakihang salamin. Kumukulimlim 
											ang buwan at nagkukulay rosa ang 
											Casilanganan. Naaninagnagan nila sa 
											malayo ang isang bagay na kulay 
											nag-aaboabo, na untiunting 
											lumalapit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dito ang tungo ng falua,--ang 
											ibinulong ni Elias;--humiga po kayo 
											at kayo'y tatakpan ko nitong mga 
											bayong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lalong lumiliwanag at nakikita ng 
											magaling ang anyo ng sasakyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lumalagay sila sa pag-itan ng 
											pampang at natin,--ang ipinahiwatig 
											ni Elias na nababalisa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At untiunting binago ang tungo ng 
											kanyang bangka, na ano pa't 
											sumasagwang patungo sa Binangunan. 
											Nahiwatigan niya ng malaking 
											pangingilabot na nagbabago naman ng 
											tumpa ang falua, samantalang 
											sinisigawan siya ng isang tinig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Huminto si Elias at nag-isip-isip. 
											Malayo pa ang tabi at sila'y 
											mararating ng bala ng mga fusil ng 
											falua. Inakalang magbalik sa Pasig; 
											lalong matulin ang kanyang bangka 
											kay sa falua. nguni laking kasamang 
											palad! nakita niyang nanggagaling sa 
											Pasig ang isang bangka at 
											namamasdang kumikinang ang mga 
											kapakete at mga bayoneta ng mga 
											guwardiya sibil.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huli na tayo,--ang ibinulong na 
											namumutla.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagmasdan niya ang kanyang 
											malalaking bisig, ginamit ang 
											tanging pasiyang nalalabi at 
											nagpasimula ng pagsagwan ng&nbsp; buong&nbsp; 
											lakas niya, na ang tumpa'y sa dakong 
											pulo ng Talim. Samantala'y 
											sumusungaw ang araw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumudulas sa tubig ang bangka ng 
											totoong matulin; nakita ni Elias, sa 
											ibabaw ng falua, na pumipihit, ang 
											ilang taong nakatindig, na siya'y 
											kinakawayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marunong po ba kayong magpalakad ng 
											isang bangka?--ang tanong kay Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marunong po, bakit?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--sapagkat mapapahamak tayo kung 
											hindi ako tatalon sa tubig at ng 
											sila'y aking iligaw. Hahabulin nila 
											ako, ako'y mabuting lumangoy at 
											sumisid ... sila'y ilalayo ko sa 
											inyo, at pagkakagayo'y magpipilit 
											kayong lumigtas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag, matira po kayo at ipagbili 
											natin ng mahal ang ating buhay sa 
											kanila!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Walang kabuluhan, wala tayong 
											sandata; papatayin tayong tulad sa 
											maliliit na ibon, ng kanilang mga 
											fusil.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naringig ng sandaling iyon, ang 
											isang&nbsp;<i>khis</i>&nbsp;sa tubig, kawangis 
											ng pagpatak sa tubig ng isang bagay 
											na mainit, na kasunod agad-agad ng 
											isang putok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakita na ninyo?--ani Elias, at 
											inilagay sa bangka ang 
											sagwan.--Magkikita tayo sa gabing 
											sinusundan ng Pasko sa pinaglibingan 
											sa inyong nunong lalaki. Lumigtas po 
											kayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kayo po?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iniligtas ako ng Diyos sa lalong 
											mahihigpit na mga panganib.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naghubad si Elias; pinunit ng isang 
											bala ang kanyang tangang baro at 
											naringig ang dalawang putok. Hindi 
											siya nagulumihanan, kinamayan ng 
											mahigpit si Ibarra, na nananatili sa 
											pagkahiga sa bangka; tumindig at 
											lumukso sa tubig na itinulak muna ng 
											paa ang munting sasakyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naringig ang ilang sigaw, at hindi 
											nalaon at sa malayo-layo ng kaunti 
											ay sumipot ang ulo ng binata, na 
											parang ibig na huminga, at saka 
											muling lumubog sa tubig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ayun, ayun siya!--ang sigawan ng 
											ilang tinig at muling humaging ang 
											mga bala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hinabol siya ng falua at ng bangka; 
											isang bahagyang guhit ng bula ang 
											siyang pinagkakakitaan ng kanyang 
											dinaraanan, na ano pa't nalalao'y 
											lalong nalalayo sa bangka na 
											lulutanglutang na anaki'y walang 
											tao. Kailan ma't sumusungaw sa tubig 
											ang lumalangoy at ng huminga, 
											pagdaka'y pinagbabarilanan siya ng 
											mga guwardiya sibil at ng mga faluero.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumatagal ang paghahabulan; malayo 
											na ang bangka ni Ibarra, lumalapit 
											naman sa tabi ang lumalangoy, at ang 
											layo na lamang ay may mga limampong 
											dipa. Pagod na ang mga gumagaod, 
											datapuwa't si Elias ay gayon din, sapagkat madalas isipot ang ulo, at 
											sa iba't ibang dako sumisipot, na 
											wari'y inililigaw mandin ang mga 
											umuusig sa kanya. Hindi na itinuturo 
											ng taksil na bula ng tubig ang 
											dinaraanan ng maninisid. Minsan pang 
											nakita nila siya sa dakong ang layo 
											sa tabi ay sampung dipa, binaril 
											siya nila ...; nagdaan pagkatapos 
											ang mga minuto; wala ng sumipot uli 
											sa ibabaw ng payapa at walang taong 
											tubig sa dagatan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang makaraan ang kalahating oras, 
											sinasapantaha ng isang manggagaod na 
											kanyang namasdan sa tubig, sa 
											malapit sa gilid, ang mga bakas ng 
											dugo, nguni't umiiling ang kanyang 
											mga kasama, sa isang anyong hindi 
											mapagwari kung sumasang-ayon sila o 
											hindi.</font></p>
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