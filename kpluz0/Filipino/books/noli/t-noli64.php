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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LXIV. Pangwakas na Bahagi</font></b></p>
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
											Sapagkat buhay pa ang marami sa 
											mga taong sinaysay namin ang 
											kanilang mga ginawa sa kasulatang 
											ito, at sa pagka naman nangawala na 
											sa ating mga mata ang mga iba sa mga 
											taong iyon, hindi nga mangyayaring 
											malagyan namin ng tunay na pangwakas 
											na bahagi ang aklat na ito. Sa 
											ikagagaling ng tao'y papatayin namin 
											ng&nbsp; buong&nbsp; galak ang lahat ng mga 
											taong sinaysay namin dito, na aming 
											sisimulan kay Padre Salvi at 
											wawakasan namin kay Donya Victorina, 
											datapuwa't hindi mangyayari ... mga 
											buhay sila! yamang hindi kami kung 
											di ang lupaing ito rin lamang ang 
											siyang sa kanila'y magpapakain....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Mula ng pumasok sa kumbento si Maria 
											Clara'y iniwan ni Padre Damaso ang 
											bayang dating kanyang kinalalagyan 
											at sa Maynila na siya tumitira, na 
											gaya rin naman ni Padre Salvi, na 
											samantalang naghihintay ng 
											katungkulang pagka Obispo o 
											Arzobispo'y manakanakang nagsesermon 
											sa simbahan ng Santa Clara, at sa 
											kumbento nito, ng Santa Clara sa 
											makatuwid, siya'y gumaganap ng isang 
											mataas na katungkulan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi pa maraming buwan ang nakararaan ay 
											tumanggap si Padre Damaso ng utos ng 
											kagalanggalang na Padre Provincial 
											upang ganapin ang pagkukura sa isang 
											malayong lalawigan. Ayon sa sabiha'y 
											napakalaki ang kanyang tinamong sama 
											ng loob sa bagay na iyon, kaya nga't 
											kinabukasa'y nasumpungang patay siya 
											sa kanyang tinutulugan. Ang sabi ng 
											iba'y namatay sa&nbsp;<i>apoplegia</i>, 
											anang iba'y sa bangungot, nguni't 
											pinaram ng mediko ang 
											pag-aalinlangan, sinaysay niyang 
											bigla raw namatay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Alin man sa mga bumabasa sa ami'y 
											hindi makikilala ngayon kung 
											kanilang makita si Kapitan Tiago. 
											Ilang linggo pa muna bago magmonja 
											si Maria Clara'y nangyari sa kanya 
											ang isang malaking panglulupaypay ng 
											kalooban, na ano pa't nagpasimula 
											siya ng pamamayat at naging totoong 
											malungkutin, mapaglininglining at 
											kulang tiwala, tulad sa kanyang 
											naging kaibigang si kapitang Tinong. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang masara na ang mga pintuan ng 
											kumbento ng Santa Clara'y 
											karakarakang ipinag-utos sa kanyang 
											nahahapis ng di ano lamang na 
											pinsang si tia Isabel, na tipunin at 
											kunin ang lahat ng bagay na naging 
											pag-aari ng kanyang anak at ng 
											kanyang nasirang asawa, at siya'y 
											pumaroon sa Malabon o sa San Diego, 
											sapagkat sa haharaping panaho'y 
											ibig niyang mamahay na mag-isa. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nagsakit ng katakottakot sa liampo 
											at sa pagsasabong, at nagpasimula ng 
											paghitit ng opio. Hindi na na pa sa 
											sa Antipulo at hindi na rin 
											nagpapamisa; ikinatutuwang totoo ng 
											kanyang matandang babaeng 
											kapangagaw, na si Do&ntilde;a Patrocinio, 
											ang kanyang pagdiriwang, sa 
											pamamag-itan ng paghilik samantalang 
											siya'y nakikinig ng mga sermon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kung manakanaka'y maglakadlakad kayo, 
											kung dakong hapon, sa unang daan ng 
											Santo Cristo, makikita ninyong 
											nakaupo sa tindahan ng isang insik 
											ang isang maliit na tao, naninilaw, 
											payat, hukot, malalalim ang mga mata 
											at anyong nag-aantok, kulay marumi 
											ang mga labi at ang mga kuko at 
											tumitingin sa tao ng wari'y hindi 
											nakikita. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pagdating ng gabi'y 
											makikita ninyo siyang tumindig ng&nbsp; 
											buong&nbsp; hirap, at nanunungkod na 
											pinatutunguhan ang isang makipot na 
											daan, pumapasok sa isang maliit na 
											bahay na marumi at sa ibabaw ng 
											pinto nito'y nababasa ang malalaking 
											letrang mapupula: FUMADERO PUBLICO 
											DE ANFION. Ito'y yaong totoong 
											kabalitaang si Kapitan Tiago, na 
											ngayo'y lubos ng nakalimutan ng 
											lahat, na ano pa't pati ng sakristan 
											mayor ay hindi na siya naaalaala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Idinagdag ni Donya Victorina sa 
											kanyang mga kulot na buhok na 
											postizo at sa kanyang 
											pag-aandaandalusahan, pakikiwangis 
											baga sa mga taga Andalukia sa 
											pagsasalita, ang bagong kaugaliang 
											siya ang nangangasiwa sa 
											pagpapalakad ng mga kabayo ng kotse, 
											at pinipilit niyang si Don 
											Tiburcio'y huwag kumilos. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sapagkat 
											maraming nangyayaring kapahamakan 
											dahil sa kahinaan na ng kanyang mga 
											mata, ngayo'y gumagamit siya ng 
											'quevedo' (salamin sa mga matang 
											isinisipit sa ilong ang 
											pinakatangkay) na nagbibigay sa 
											kanya ng anyong naging kabalitaan. 
											Hindi na muling natawag ang doktor 
											upang gumamot kangino man, 
											napapanood siya ng mga alilang 
											walang ngipin sa maraming araw ng 
											isang linggo, bagay, na alinsunod sa 
											talastas na ng mga bumabasa'y 
											masamang tanda.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang tanging tagapagtanggol ng kulang 
											palad na ito, na si Linares, ay 
											malaon ng nagpapahingalay sa Pako, 
											sapagkat pinatay siya ng 
											pag-iilagin at ng masasamang 
											ginagawa sa kanya ng kanyang hipag.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napasa Espa&ntilde;a ang nagdiwang na 
											alperes, na ang katungkula'y 
											teniente na may gradong komandante, 
											at iniwan ang kanyang mairog na 
											asawa sa kanyang barong franela, na 
											hindi mapagsiyasat kung ano na ang 
											kulay. Nang makita ng kahabaghabag 
											na Ariadna ang pagkapabaya sa kanya, 
											namintakasi ring gaya ng anak na 
											babae ni Minos kay Bako at sa 
											pakikipakatoto sa tabako, na ano 
											pa't nanginginom at humihitit ng&nbsp; 
											buong&nbsp; alab ng loob, na hindi na 
											lamang ang mga nagdadalaga ang sa 
											kanya'y natatakot, kung di naman ang 
											mga matatandang babae't ang mga 
											bata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahil mga buhay pa ang ating mga 
											kakilala sa San Diego, sakali't 
											hindi sila nangamatay sa pagputok ng 
											vapor 'Lipa' na nagpaparoo't parito 
											sa lalawigan. Sapagkat sino ma'y 
											walang nangasiwa upang maalaman kung 
											sinosino ang mga kaawaawang namatay 
											sa gayong kapahamakan; at kung 
											kanikanino ang mga hita at mga kamay 
											na sumabog sa pulo ng Convalekencia 
											at sa mga pampang ng ilog, lubos na 
											hindi nalalaman namin kung napasama 
											o hindi sa nangamatay na iyon ang 
											alin man sa mga kakilala ng mga 
											mambabasa sa amin. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Natutuwa na kami 
											at gayon din ang gobierno at ang mga 
											pamahayagan ng panahong iyon, sa 
											pagkakalam na ang iisaisang prayleng 
											nakasakay sa vapor ay nakaligtas, at 
											wala&nbsp;na kaming hinihinging iba pa. 
											Ang pangulo sa amin ay ang buhay ng 
											banal na mga sacerdote, na 
											papanatilihin nawa ng Diyos ang 
											kanilang paghahari sa Pilipinas sa 
											ikagagaling ng aming mga kaluluwa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tungkol kay Maria Clara'y wala ng 
											naging balitang ano pa man, liban na 
											lamang sa anaki'y siya'y iniingatan 
											ng libingan sa kanyang sinapupunan. 
											Ipinagtanong naming makailan siya sa 
											ilang taong may malalaking 
											kapangyarihan sa santo kumbento ng 
											Santa Clara, nguni't sino ma'y 
											walang nag-ibig magsabi sa amin ng 
											isa man lamang salita, kahi't ang 
											mga masalitang madasaling 
											tumatanggap ng bantog na fritada ng 
											atay ng inahing manok, at ng salsa 
											na lalo pang kabalitaang tinatawag 
											na 'salsa ng mga monja', na ginagawa 
											ng matalinong taga-paglutong babae 
											ng mga Birhen ng Panginoong Diyos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang gabi ng Setyembreng umaatungal 
											ang bagyo at hinahampas ng kanyang 
											kalakilakihang mga pakpak ang mga 
											bahay sa Maynila; dumaragundong ang 
											mga kulog sa tuwing sandali, walang 
											humpay halos ang pagtatanglaw ng mga 
											lintik at kidlat sa mga iniwawasak 
											ng buhawi at naglulubog sa mga 
											namamayan sa kagiklagiklang takot. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Napapanood sa liwanag ng kidlat o ng 
											lintik na nagpapakilwagkilwag, na 
											tulad sa ahas, ang paglipad ng isang 
											panig ng bubungan o ng isang bintana 
											na dala ng hangin, ang pagkagiba ng 
											bahay na kakilakilabot ang 
											lagapakan: walang isang kotse at 
											walang isang taong lumalakad sa mga 
											daan. Pagka nariringig sa malayo ang 
											paos na ugong ng kulog na inuulit ng 
											makasangdaan ng alingawngaw, kung 
											magkagayo'y nariringig ang 
											pagbubuntong-hininga ng hanging 
											umiipoipo sa ulan, na siyang 
											gumagawa ng ulit-ulit na&nbsp;<i>trik-trak</i>&nbsp;sa 
											mga nakasarang dahon ng bintanang 
											kapis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dalawang guwardiya ang sumisilong sa 
											isang bagong ginagawang bahay sa 
											malapit sa kumbento: isang sundalo't 
											isang&nbsp;<i>distingido</i>.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang atang ginagawa rito?--ang 
											sabi ng sundalo;--sino ma'y walang 
											lumalakad sa daan ... dapat tayong 
											pumaroon sa isang bahay; tumatahan 
											ang babae ko sa daang Arzobispo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Malayolayo rin buhat dito hanggang 
											doon at mababasa tayo,--ang sagot ng&nbsp;<i>distingido</i>.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ba ang kabuluhan noon, huwag 
											lamang patayin tayo ng lintik?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bah! huwag kang mag-alaala; dapat 
											magkaroon ang mga monja ng isang 
											'pararayo' upang sila'y maligtas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga ba?--anang sundalo,--nguni't 
											anong kabuluhan ng pararayo'y 
											ngitngit ng dilim ang gabi?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At tumingala upang makakita sa 
											kadiliman: ng sandaling iyo'y 
											kuminang ang isang kidlat na inulit 
											at pagdaka'y sinundan ng malakas at 
											kalagimlagim na kulog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naku! Susmariosep!--ang biglang 
											sinabi ng sundalo, na nagkukruz at 
											tuloy hinihila ang kanyang 
											kasama;--umalis tayo rito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa iyo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tayo na, umalis tayo rito!--ang 
											inulit ng sundalo na nagtataguktukan 
											ang ngipin sa takot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nakita mo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang fantasma!--ang ibinulong na 
											nangangatal ang&nbsp; buong&nbsp; katawan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang fantasma?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa ibabaw ng bubungan ... marahil 
											siya ang monja na nagliligpit ng mga 
											baga sa&nbsp; buong&nbsp; gabi!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumingala ang&nbsp;<i>distingido</i>&nbsp;at 
											ibig niyang makita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Jesus!--ang biglang sinabi at siya 
											nama'y nagkruz.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Siya nga naman, sa makinang na ilaw 
											ng kidlat ay kanyang nakita ang 
											isang anyong taong nakatindig, halos 
											sa palupo ng bahay, nakataas sa 
											langit ang mukha't ang mga kamay, na 
											para manding humihingi sa kanya ng 
											awa. mga lintik at kulog ang 
											itinutugon ng langit!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang makatapos ang ugong ng kulog ay 
											naringig ang isang mapanglaw na 
											daing.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi gawa ng hangin ang daing na 
											iyan, iya'y sa fantasma!--ang 
											ibinulong ng sundalo, na siyang 
											kanyang pinakatugon sa ginawang sa 
											kanya'y pagpindot ng kanyang kasama.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay! ay!--ang naglulumampas na daing 
											sa hangin at nangingibabaw sa ingay 
											ng ulan: hindi matakpan ng mga 
											haginit ng hangin ang matamis at 
											kahabaghabag na tinig na iyong 
											puspos ng kapighatian.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling kuminang ang isang kidlat na 
											nakasisilaw ang tindi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi, hindi fantasma!--ang biglang 
											sinabi ng&nbsp;<i>distingido</i>;--muli 
											pang nakita ko siya; kasingganda ng 
											Birhen ... Umalis na tayo rito't 
											magbigay alam tayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na hinintay ng sundalong 
											ulitin pa ang pagyakag sa kanya't 
											nangagsialis ang dalawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sino kaya ang humihibik sa 
											kalagitnaan ng gabi, na hindi 
											inaalintana ang malakas na hangin, 
											ang ulan at bagyo? sino kaya ang 
											matatakuting virgeng esposa ni 
											Jesukristo, na nakikilaban sa 
											nangagngangalit na bagyo, tubig, 
											lintik at kulog at hinirang pa naman 
											ang kagulatgulat na gabi at ang may 
											kalayaang langit, upang itaghoy mula 
											sa isang mapanganib na kataasan ang 
											kanyang mga daing sa Diyos? Linisan 
											kaya ng Diyos ang kanyang templo at 
											aayaw ng dinggin ang mga hibik sa 
											kanya? Baka kaya hindi makalampas sa 
											bubungan ng kumbento ang mga mithi 
											ng kaluluwa at ng makapailanglang 
											hanggang sa trono ng lubhang 
											Mahabagin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humihip ng&nbsp; buong&nbsp; galit ang bagyo 
											halos sa magdamag; hindi sumikat ang 
											isa man lamang bituin sa&nbsp; buong&nbsp; 
											gabi; nagpatuloy ang walang 
											pagkasiyahan sa hirap na mga ay! na 
											nakakahalo ng mga buntong hininga ng 
											hanging malakas, datapwa't nasunduan 
											niyang bingi ang Naturaleza't ang 
											mga tao; nagpuyat palibhasa ang 
											Diyos ay hindi siya nariringig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kinabukasan, ng mapaspas na sa 
											langit ang maiitim na mga alapaap ay 
											muling sumikat ang araw sa gitna ng 
											nadalisay na himpapawid, huminto sa 
											pintuan ng kumbento ng Santa Clara 
											ang isang kotse at doo'y nanaog ang 
											isang lalaki, na napakilalang siya'y 
											kinakatawan ng may kapangyarihan at 
											hininging siya'y pakipag-usapin sa 
											abadesa at sa lahat ng mga monja.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang sabi'y may humarap na isang 
											monjang basang basa at punit-punit 
											ang suot na habito, tumatangis at 
											isinumbong ang kakilakilabot na mga 
											kagagawan at hininging siya'y 
											tangkilikin ng tao laban sa mga 
											katampalasanan ng pagbabanalbanalan. 
											Ang sabihan din nama'y totoong 
											kagandagandahan ang monjang iyon, na 
											may mga matang ang kagandaha't 
											katamisa'y wala pang nakikitang 
											makakawangis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi siya inampon ng kinakatawan ng 
											may kapangyarihan, nakipagsalitaan 
											ito sa abadesa at iniwan ang monjang 
											iyon at hindi pinakinggan ang 
											kanyang mga samo at mga luha. 
											Napanood ng monjang sinarhan ang 
											pinto pagkalabas ng tao, na gaya 
											marahil ng panonood, ng hinatulang 
											magdusa, ng pagsasara sa kanya ng 
											pintuan ng langit, sakasakali't 
											dumating ang araw na magiging kasing 
											bangis at mawawalan ng damdamin ang 
											langit na gaya ng mga tao. Ulol daw 
											ang monjang iyon ang sabi ng 
											abadesa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi marahil nalalaman ng taong 
											iyong sa Maynila'y may isang 
											hospikio na pinag-aalagaan sa mga 
											nasisira ang isip; o baka kaya naman 
											ipinalalagay niyang ang kumbento ng 
											mga monja'y isang ampunan ng mga 
											ulol na babae, bagaman hinahakang 
											may katatagang kamangmangan ang 
											taong iyong upang makapagpasiya kung 
											sira o hindi ang pag-iisip ng isang 
											tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinasabi rin namang baligtad ang 
											ipinasiya ng general J. ng kanyang 
											mabalitaan ang nangyaring iyon; 
											tinangka niyang tangkilikin ang ulol 
											na babae kaya't hiningi niya ito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngunit ngayo'y walang humarap na 
											sino mang dalagang kagandagandahang 
											walang umampon, at hindi itinulot ng 
											abadesang dalawin at tingnan ang 
											kumbento, at sa ganito'y tumutol 
											siya sa pangalan ng Religion at ng 
											mga Santong Cautusan sa Convento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na muling napagsalitaanan pa 
											ang nangyaring iyon, at gayon din 
											ang tungkol sa kahabaghabag na si 
											Maria Clara.</font></p>
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