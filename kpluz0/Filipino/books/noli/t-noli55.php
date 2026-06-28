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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LV. Ang Kapahamakan</font></b></p>
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
											Nangaghahapunan doon sa komedor 
											(kakanan) ni Kapitan Tiago, si 
											Linares at si tia Isabel; naringig 
											mula sa salas ang kalampagan ng mga 
											pinggan at ng mga kubierto. Sinabi 
											ni Maria Clarang aayaw na siyang 
											kumain, at naupo sa piano na ang 
											kasama'y ang masayang si Sinang, na 
											bumubulong sa kanyang mga tainga ng 
											mga talinghagang salita, samantalang 
											balisang nagpaparoo't parito sa 
											salas si Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sa dahilang hindi nagdaramdam 
											ng gutom ang bagong galing sa sakit, 
											hindi; kaya gayo'y hinihintay ang 
											pagdating ng isang tao, at 
											sinamantala ang sandaling hindi niya 
											makakaharap ang kanyang Argos (sa 
											makatuwid baga'y ang hindi 
											naglilikat ng pagbabantay sa kanya 
											saan man): ang oras ng paghahapunan 
											ni Linares.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Makikita mo kung hindi matitira ang 
											fantasmang iyan hanggang sa a las 
											ocho,--ang ibinulong ni Sinang, na 
											itinuturo ang kura; dapat&nbsp;<i>siyang</i>&nbsp;pumarito 
											pagka a las ocho. Gaya rin siya ni 
											Linares na umiibig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagmasdan ni Maria Clara ng&nbsp; 
											buong&nbsp; panghihilakbot ang kanyang 
											katotong babae. Hindi napagmasdan 
											nito ang gayong bagay, kaya't 
											nagpatuloy ang katakottakot na 
											masalingata:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah! nalalaman ko na kung bakit 
											aayaw umalis kahi't pagpasaringan 
											ko: aayaw magkagugol sa pag-iilaw ng 
											kumbento! nalaman mo na? Mula ng 
											magkasakit ikaw, muling pinatay ang 
											dalawang lamparang dating 
											pinasisindihan ... Datapuwa't 
											tingnan mo kung ano ang ginagawang 
											anyo sa mga mata, at kung paano ang 
											pagmumukha!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinugtog ng sandaling iyon ng relos 
											sa bahay ang a las ocho. Nangatal 
											ang kura at naupo sa isang sulok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Darating na!--ani Sinang at kinurot 
											si Maria Clara;--nariringig mo ba?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumugtog ang kampana sa simbahan ng 
											a las ocho at tumindig ang lahat 
											upang mangagdasal; namuno si Padre 
											Salvi ng mahina't nangangatal na 
											tinig; datapuwa't palibhasa'y may 
											kanikanyang iniisip ang bawa't isa, 
											sino ma'y walang pumansin ng bagay 
											na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bahagya pa lamang natatapos ang 
											dasal ay dumating si Ibarra. May 
											taglay na luksa ang binata, hindi 
											lamang sa pananamit, kung di naman 
											sa mukha, kaya pagkakita sa kanya ni 
											Maria Clara'y tumindig at humakbang 
											ng isa upang siya'y tanungin kung 
											napapaano, nguni't sa sandali ring 
											iyo'y naringig ang isang putukan ng 
											mga baril. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tumigil si Ibarra, 
											umiinog ang kanyang mga mata, siya'y 
											naumid. Nagtago sa likod ng isang 
											haligi ang kura. Bago na namang mga 
											putukan, bagong mga ugong ang 
											nariringig sa dakong kumbento, na 
											sinusundan ng mga hiyawan at 
											takbuhan. Nangagsipasok ng panakbo 
											si Kapitan Tiago, si tia Isabel at 
											si Linares at nangagsisigawan ng&nbsp;<i>tulisan! 
											tulisan!</i>&nbsp;Casunod nila si Andeng 
											na iniwawasiwas ang isang duruan at 
											tumakbo't naparoon sa tabi ng 
											kanyang kapatid sa suso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanikluhod si tia Isabel at umiiyak 
											at dinarasal ang&nbsp;<i>kyrie eleyson;</i>&nbsp;dala 
											ni Kapitan Tiagong namumutla't 
											nangangatal sa isang tenedor ang 
											atay ng isang inahing manok at 
											inihahaying tumatangis sa Birhen sa 
											Antipolo; punongpuno ang bibig ni 
											Linares at nakasandata ng isang 
											kukhara; nangagyakap si Sinang at si 
											Maria Clara; ang tanging hindi 
											nananatili sa hindi pagkilos ay si 
											Crisostomo, na hindi maisaysay ang 
											kanyang pamumutla.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpapatuloy ang sigawa't ang mga 
											hampasan, nangagsasara ng mga 
											bintana ng&nbsp; buong&nbsp; ingay, nariringig 
											ang tunog ng mga pito, manakanaka'y 
											isang putok ng baril.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--<i>Christe eleyson!</i>&nbsp;Santiago, 
											nagaganap na ang hula ... sarhan mo 
											ang mga bintana!--ang hibik ni tia Isabel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Limampong bombang malalaki at 
											dalawang misa de grakia!--ang tugon 
											naman ni Kapitan Tiago;--<i>Ora pro 
											nobis!</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Untiunting nananag-uli ang 
											kakilakilabot na katahimikan ... 
											Naringig ang tinig ng alperes na 
											sumisigaw at tumatakbo:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Padre kura! Padre Salvi! Hali 
											kayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--<i>Miserere!</i>&nbsp;Humihingi 
											ng konfesion ang alperes!--ang sigaw 
											ni tia Isabel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May sugat ba ang alperes?--ang sa 
											kawakasa'y itinanong ni Linares; ah!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ngayo'y kanyang nahiwatigang 
											hindi pa pala nangunguya ang na sa 
											kanyang bibig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Padre kura, hali kayo! Wala nang 
											sukat ikatakot!--ang ipinatuloy na 
											sigaw ng alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y minagaling ni Padre 
											Salving namumutla, na lumabas sa 
											kanyang pinagtataguan at manaog sa 
											hagdanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinatay ng mga tulisan ang 
											alperes! 
											Maria, Sinang, pasa kuarto kayo, 
											trangkahan ninyong magaling ang 
											pinto!&nbsp;<i>Kyrie eleyson!</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napasa hagdanan naman si Ibarra, 
											bagaman sinasabi sa kanya ni tia 
											Isabel:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang lumabas at hindi ka 
											nakapangungumpisal, huwag kang 
											lumabas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mabait na matandang babaeng 
											ito'y kaibigang matalik ng una ng 
											kanyang ina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't nilisan ni Ibarra ang 
											bahay; sa pakiramdam niya'y umiinog 
											na lahat sa kanyang paligid, na 
											nawawala ang kanyang tinutungtungan. 
											Humahaging ang kanyang tainga, 
											bumibigat ang kanyang mga binti at 
											kakaiba kung ilakad; 
											naghahalihaliling nagdaraan sa 
											kanyang paningin ang mga alon ng 
											dugo, liwanag at kariliman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bagaman totoong maliwanag ang sikat 
											ng buwan sa langit, natitisod ang 
											binata sa mga bato't mga kahoy na na 
											sa daang mapanglaw at walang 
											kataotao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa malapit sa kuartel ay nakakita 
											siya ng mga sundalong nakalagay sa 
											dulo ng fusil ang bayoneta, na 
											nangagsasalitaan ng masimbuyo, 
											kaya't nakaraan siya na hindi 
											napansin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nariringig sa tribunal ang mga 
											dagok, mga sigaw, mga daing, mga 
											tungayaw; nangingibabaw at 
											nagtatagumpay sa lahat ang tinig ng 
											alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa pangaw! Lagyan ng&nbsp;<i>esposas</i>&nbsp;ang 
											mga kamay! Dalawang putok agad sa 
											kumilos! Sargento, magtatag kayo ng 
											bantay! Walang magpapasial ngayon, 
											kahi't Diyos! Huwag kayong 
											matutulog, kapitan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtumulin ng pagpatungo sa kanyang 
											bahay si Ibarra; hinihintay siya ng 
											kanyang mga alila na malaki ang 
											balisa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siyahan ninyo ang lalong 
											pinakamagaling na kabayo at kayo'y 
											matulog!--ang sa kanila'y sinabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pumasok sa kanyang gabinete, at 
											nag-akalang magdalidaling ihanda ang 
											isang maleta. Binuksan ang isang 
											kajang bakal, kinuha ang kanyang mga 
											hiyas, kinuha ang lahat ng salaping 
											doroon at ipinasok sa isang supot. 
											Kinuha ang kanyang mga hiyas, kinuha 
											sa pagkasabit ang isang larawan ni 
											Maria Clara, at pagkatapos na 
											makapagsandata ng isang sundang at 
											dalawang revolver ay tinungo ang 
											isang armario na kinalalagyan ng 
											kanyang mga kasangkapan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang sandaling iyo'y tatlong kalabog 
											na malalakas ang tumunog sa pinto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino iyan?--ang itinanong ni Ibarra 
											ng tinig na malungkot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Buksan ninyo sa ngalan ng hari, 
											buksan ninyo agad o igigiba namin 
											ang pinto!--ang sagot sa wikang 
											kastila ng isang tinig na mahigpit 
											ang pag-uutos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumingin sa bintana si Ibarra; 
											nagningning ang kanyang mga mata at 
											ikinasa ang kanyang revolver; 
											datapuwa't nagbagong isipan, 
											binitiwan ang mga sandata at siya 
											rin ang nagbukas ng nangagdaratingan 
											na ang mga utusan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagdaka'y hinuli siya ng tatlong 
											guwardiya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Parakip po kayo sa ngalan ng 
											Hari!--anang sargento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Doon na sasabihin sa inyo, bawal sa 
											amin ang sabihin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdilidiling sandali ang binata, at 
											sapagkat aayaw siya marahil na 
											makita ang kanyang mga paghahanda sa 
											pagtakas, dinampot ang sombrero't 
											nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasailalim po ako ng inyong 
											kapangyarihan! Inaakala kong sa 
											sandaling oras lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung nangangako kayong hindi 
											tatakas, hindi po namin kayo 
											gagapusin; ipinagkakaloob po sa inyo 
											ng alperes ang biyayang ito; nguni't 
											kung kayo'y tumakas....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumama si Ibarra, at iniwan ang 
											kanyang mga alilang nangalalagim.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samatala'y ano na ang nangyari kay 
											Elias?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang kanyang lisanin ang bahay ni 
											Crisostomo, wari'y sira ang isip na 
											tumatakbong hindi nalalaman ang 
											pinatunguhan. Tinahak ang mga 
											kapatagan, dumating sa isang gubat 
											na totoong malaki ang pagkagiyagis; 
											tinatakasan ang kabayanan, 
											tinatakasan ang liwanag, 
											nakaliligalig sa kanya ang buwan, 
											pumasok siya sa talinghagang lilim 
											ng mga kahoy. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang naroroon na'y 
											kung minsa'y tumitigil, kung minsa'y 
											lumalakad sa mga di kilalang landas, 
											kumakapit sa puno ng malalaking 
											kahoy, nababayakid sa mga dawag, 
											tumatanaw sa dakong bayan, na sa 
											dakong paanan niya'y naliligo sa 
											liwanag ng buwan, nakalatag sa 
											kapatagan, nakahilig sa mga 
											pampangin ng dagat. Nangagliliparan 
											ang mga ibong nangapupukaw sa 
											kanilang pagtulog; 
											nangagpapalipatlipat sa sa isa't 
											isang sanga, nangaghuhunihan ng 
											matataos na tinig at tinititigan 
											siya ng mabibilog na mga mata ng 
											nangaglalakihang mga paniki, mga 
											kuwago at mga sabukot. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi sila 
											tinitingnan at hindi man lamang sila 
											nariringig ni Elias. Ang akala niya 
											siya'y sinusundan ng mga napupuot na 
											anino ng kanyang mga magulang na 
											nangamatay na; nakikita sa bawa't 
											sanga ang kalagimlagim na buslong 
											kinalalagyan ng naliligo ng dugong 
											ulo ni Balat, ayon sa pagkasabi sa 
											kanya ng kanyang ama; wari 
											natatalisod niya mandin sa puno ng 
											bawa't kahoy ang matandang babaeng 
											patay; tila mandin nakikinikinita 
											niya sa dilim na papawidpawid ang 
											bungo at mga buto ng nuno niyang 
											lalaking imbi ... at ang mga butong 
											ito ng matandang babae at saka ang 
											ulong iyo'y sinisigawan siya: 
											duwag!, duwag!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Linisan ni Elias ang bundok, tumakas 
											at lumusong sa dakong dagat, sa 
											pasigang nilakad niya ng&nbsp; buong&nbsp; 
											balisa; nguni't doon sa malayo, sa 
											gitna ng tubig, doon sa 
											ipinaiilanglang mandin ng liwanag ng 
											buwan ang isang ulap, anaki'y nakita 
											niyang napaimbulog at pumapawidpawid 
											ang isang anino, ang anino ng 
											kanyang kapatid na babaeng basa ng 
											dugo ang dibdib, lugay ang buhok at 
											inililipad ng hangin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanikluhod sa buhangin si Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pati ba naman ikaw!--ang ibinulong 
											na iniunat ang mga bisig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa, nakatitig sa ulap ay 
											dahandahang tumindig, sumulong at 
											tumubog sa tubig, na wari mandin 
											siya'y may sinusundan. Lumalakad 
											siya sa malalay na palusong na iyong 
											gawa ng wawa; malayo na siya sa 
											tabi, dumarating na sa kanyang 
											bayawang ang tubig ay siya'y 
											sumusulong din, sumusulong na tila 
											niwawalang diwa ng isang 
											mapanhalinang espiritu. Dumarating 
											na sa kanyang dibdib ang tubig ...; 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nguni't umalingawngaw ang putukan ng 
											mga baril, nawala ang aninong 
											malikmata at ang binata'y nataohan. 
											Salamat sa katahimikan ng gabi at sa 
											lalong malaking kapaikpikan ng 
											mahinhing hangin ay dumarating na 
											magaling at malinaw na malinaw 
											hanggang sa kanya ang ugong ng mga 
											putukan. Huminto siya, nagdilidili, 
											nahiwatigan niyang siya pala'y 
											sumasatubig; payapa ang dagatan at 
											natatanaw pa niya ang mga ilaw sa 
											dampa ng mga mangingisda.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagbalik siya sa pampang at 
											napatungo sa bayan, ano ang dahil? 
											Siya ma'y hindi niya nalalaman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tila mandin walang tao ang bayan; 
											sarang lahat ang mga bahay, sampung 
											mga hayop, ang mga asong karaniwang 
											tumatahol kung gabi, pawang 
											nangagtago sa takot. Nakararagdag ng 
											lungkot at pag-iisa ang anyong pilak 
											na liwanag ng buwan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa panganganib niyang baka kanyang 
											makasalubong ang mga guwardiya sibil, 
											siya'y nagpasuotsuot sa mga 
											halamanan at mga pananim, at anaki'y 
											kanyang naaninagnagan ang dalawang 
											may anyong tao; datapuwa't kanyang 
											ipinatuloy ang lakad, at, pagkalukso 
											niya sa mga bakod at sa mga pader, 
											dumating siyang pagal na pagal sa 
											hirap na kanyang mga pinagdaanan, sa 
											isang dulo ng bayan, at tinungo niya 
											ang bahay ni Crisostomo. Na sa 
											pintuan ang mga alila't kanilang 
											pinag-uusapan at kanilang dinaramdam 
											ang pagkakapiit sa kanilang 
											panginoon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang matanto na ni Elias ang 
											nangyari siya'y lumayo, lumigid siya 
											sa bahay, nilukso ang pader na 
											bakod, inakyat ang bintana at 
											pumasok sa gabinete, at nakita 
											niyang nagniningas pa ang iniwang 
											kandila ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita ni Elias ang mga papel at ang 
											mga libro at ang mga suputang 
											kinasisidlan ng salapi at mga hiyas. 
											Pinag ugnay-ugnay sa kanyang 
											dilidili ang doo'y nangyari, at ng 
											mapagmasdan niya ang gayong karaming 
											mga papel na makapapahamak, inakala 
											niyang iligpit, ihagis sa bintana at 
											ibaon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumungaw siya sa halamanan, at sa 
											liwanag ng buwa'y kanyang natanawan 
											ang dalawang guwardiya sibil, na may 
											kasamang isang 'auxiliante' (isang 
											utusan baga ng hustisya): 
											nagkikintaban ang mga bayoneta at 
											ang mga kapakete.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang magkagayo'y minagaling niyang 
											gawin agad ang isang munakala: 
											ibinunton sa gitna ng gabinete ang 
											mga damit at ang mga papel, ibinuhos 
											sa ibabaw ang isang lampara ng 
											petroleo at saka sinindihan. 
											Ibinigkis na nagdudumali sa bayawang 
											ang mga sandata, nakita ang larawan 
											ni Maria Clara, nag-alinlangan ... 
											itinago sa isa sa mga suputan, 
											dinala ang mga suputang ito at 
											tumalon sa bintana.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Panahon na nga; iginigiba na ng mga 
											guwardiya sibil ang pintuan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pabayaan ninyo kaming pumanhik 
											upang aming kunin ang mga papel ng 
											inyong panginoon!--anang 
											direktorcillo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May dala ba kayong pahintulot? Kung 
											wala'y hindi kayo makapapanhik,--ang 
											sabi ng isang matandang lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't pinatabi siya ng mga 
											guwardiya sibil sa kakukulata, pumanhik sila 
											sa hagdan ...; datapuwa't isang 
											makapal na aso ang siyang pumupuno 
											sa bahay, at pagkalalaking mga dila 
											ng apoy ang siyang nangagsilabas sa 
											salas at dinidilaan ang mga pinto't 
											bintana.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sunog! Sunog! Apoy!--ang 
											ipinagsigawan ng lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humandulong ang lahat upang 
											mailigtas ng bawa't isa ang makakaya, 
											nguni't dumating ang apoy sa maliit 
											na laboratorio at pumutok ang mga 
											naroroong bagay na madadaling 
											mag-alab. Napilitang umurong ang mga 
											guwardiya sibil, hinaharangan sila ng 
											sunog, na umuungal at niwawalis ang 
											bawa't maraanan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nawalang kabuluhang 
											kumuha ng tubig sa balon; sumisigaw 
											ang lahat, ang lahat ay nagpapagibik, 
											datapuwa't sila'y nalalayo sa lahat. 
											Narating na ng apoy ang mga ibang 
											kabahayan at napaiilanglang sa 
											langit, kasabay ang pagpaimbulog ng 
											malalaking nagpapainog-inog na aso. 
											Nalilipos na ng apoy ang&nbsp; buong&nbsp; 
											bahay, lumalakas ang hanging 
											nasasalab; mula sa malayo'y 
											nangagsisirating ang ilang mga taga 
											bukid, nguni't dumarating sila roo't 
											upang mapanood lamang nila ang 
											kagulatgulat na siga, ang wakas ng 
											matandang bahay, na pinagpitagang 
											mahabang panahon ng apoy, tubig at 
											hangin.</font></p>
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