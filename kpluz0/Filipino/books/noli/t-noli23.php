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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXIII. Ang Pangingisda</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="color: #333333; font-family: Arial; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											Numiningning pa ang mga bituin sa 
											langit 'zafir', at nangagugulaylay 
											pa ang mga ibon sa mga sanga ng 
											kahoy, ay nangaglilibot na sa mga 
											lansangan ng bayang ang tungo'y sa 
											dagatan, ang isang masayang kawang 
											naliliwanagan ng nakagagalak na 
											liwanag ng mga huepe.<br>
											<br>
											Sila'y limang mga batang dalagang 
											nangagmamadali ng paglakad, na 
											nagkakakapitkapit o nakayakap kaya 
											sa bayawang ng kalapit, na ilang 
											matandang babae ang sumusunod at 
											saka ilang mga babaeng alilang 
											sunong ng kalugodlugod na anyo ang 
											mga bakol na puno ng mga baon; mga 
											pinggan at iba pa. Pagkakita sa 
											kanilang mga mukhang ang kabataa'y 
											tumatawa at ang pag asa'y 
											maniningning. </p>
											<p style="color: #333333; font-family: Arial; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											Sa panonood ng 
											linipadlipad ng kanilang malalago't 
											maiitim na buhok at malalapad na 
											kunot ng kanilang mga damit, marahil 
											ipalagay nating sila'y mga diosa ng 
											gabi, kung di sana talastas nating 
											sila'y si Maria Clara na kasama ang 
											kanyang apat na kaibigan: ang 
											masayang si Sinang na kanyang pinsan, 
											ang hindi makibuing si Viktoria, ang 
											magandang si Iday at ang mahinhing 
											si Neneng na matimtiman at kimi ang 
											kagandahan.<br>
											<br>
											Nangagsasalitaan ng buong ligaya, 
											nangagtatawanan, nangagkukurutan, 
											nangag-aanasan at pakatapos 
											naghahalakhakan.<br>
											<br>
											--Gigisingin ninyo ang taong 
											natutulog pa!--ang ipinagwiwika sa 
											kanila ni tia Isabel;--ng kabataan 
											namin ay hindi kami nagkakaingay ng 
											ganyan.<br>
											<br>
											--Marahil hindi naman kayo 
											gumigising ng maagang gaya namin, at 
											marahil hindi naman napakamatulugin 
											ang mga matatanda!--ang panagot ng maliit na 
											si Sinang.<br>
											<br>
											Sandaling hindi sila nangagsasalita, 
											pinagpipilitan kaya nilang magsalita 
											ng marahahan; nguni't hindi 
											nalalao't nangakalilimot, 
											nangagtatawanan, at pinupuno ang 
											daan ng kanilang mga bata at 
											sariwang tinig.<br>
											<br>
											--Conowari magtampo ka; huwag mo 
											siyang kausapin!--ang sabi ni Sinang 
											kay Maria Clara;--kagalitan mo siya 
											at ng huwag mamihasa sa kasam-an ng 
											asal.<br>
											<br>
											--Huwag mo pakahigpit naman!--ani Iday,<br>
											<br>
											--Magmahigpit ka, Huwag kang haling! 
											Dapat magmasunurin ang nangingibig 
											samantalang nangingibig; sapagkat 
											kung asawa na'y gagawin ang bawa't 
											maibigan niya!--ang hatol ng maliit 
											na si Sinang.<br>
											<br>
											--Ano ang kinalaman mo niyan, bata?--ang 
											ipinagwika ng kanyang pinsang si 
											Viktoria.<br>
											<br>
											--Ssst! huwag kayong maingay at 
											dumarating sila!<br>
											<br>
											Dumarating nga naman ang isang 
											pulutong ng mga binatang 
											nangagtatanglaw ng sigsig. 
											Nangagsisilakad silang hindi umiimik 
											na tinutugtugan ng isang gitarra.<br>
											<br>
											--Tila gitarra ng pulubi!--ani Sinang 
											na nagtatawa.<br>
											<br>
											Nang mag abot na ang dalawang 
											pulutong, ang mga babae ay siyang 
											nag-anyong hindi makibuin at 
											matimtiman, na para manding hindi pa 
											sila nakakapag-aral na tumawa; 
											tumbalik, ang mga lalaki naman ang 
											nangagsasalita, nangagsisingiti at 
											tumatanong ng makaanim upang magtamo 
											ng isang kasagutan.<br>
											<br>
											--Tahimik baga kaya ang dagatan? 
											Inaakala baga ninyong magkakaroon 
											tayo ng mabuting panahon?--ang tanong 
											ng mga ina.<br>
											<br>
											--Huwag po sana kayong maligalig, 
											mga ginoong babae, mabuti akong 
											lumangoy!--ang 
											sagot naman ng isang binatang payat 
											at matangkad.<br>
											<br>
											--Dapat sanang tayo'y nagsimba 
											muna!--ang 
											buntong-hininga ni tia Isabel na 
											pinagduduop ang kamay.<br>
											<br>
											--Nasasapanahon pa, ginoong babae: si 
											Albinong ng panahon niya'y naging 'seminarista,' 
											makapagmimisa sa bangka,--ang 
											isinagot ng isa, na itinuturo ang 
											binatang payat at matangkad.<br>
											<br>
											Si Albinong may pagmumukhang 
											palabiro, ng marinig na siya'y 
											binabanggit, nag-anyong mapanglaw at 
											banal, na ano pa't ginagagad niya si 
											Padre Salvi.<br>
											<br>
											Baga ma't hindi nililimot ni Ibarra 
											ang kahinhinan, nakikisalamuha siya 
											sa kasayahan ng kanyang mga 
											kasamahan.<br>
											<br>
											Pagdating nila sa pasigan, hindi 
											sinasadya'y tumakas sa mga labi ng 
											mga babae ang mga sigaw ng pagtataka 
											at katowaan. Doo'y kanilang nakita 
											ang dalawang bangkang nagkakakabit, 
											na mainam ang pagkakagayak ng mga 
											pinagtuhog-tuhog na mga bulaklak at 
											mga dahon, kasama ng mga sari-saring 
											kulay na mga damit na pinakumbo: 
											nakasabit sa bagong lagay na bubong 
											ng sasakyang iyon ang mga maliliit 
											na parol na papel, na may mga kasal-it 
											na mga rosas at mga klavel, mga 
											bungang halamang gaya ng pinya, 
											kasuy, saging, bayabas, lanzones at 
											iba pa. </p>
											<p style="color: #333333; font-family: Arial; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											Dinala roon ni Ibarra ang 
											kanyang alfombra, mga maririkit na 
											panabing at mga kogin at ang lahat 
											ng ito'y siyang ginawang upuang 
											maginhawa ng mga babae. 
											Napapamutihan din ang mga tikin at 
											mga sagwan. Sa isang bangkang lalong 
											marikit ang pagkakagayak ay may 
											isang arpa, mga gitarra, mga 
											akordeon at isang sungay ng kalabaw; 
											sa isang bangka nama'y nagniningas 
											ang mga kalang lupa at doo'y 
											inihahanda ang kha, kafe at salabat 
											na gagawing agahan.<br>
											<br>
											--Dito ang mga babae, diyan ang mga 
											lalaki!--ang sabi ng mga ina paglulan 
											nila sa bangka.--Mangatali kayo! 
											Huwag sana kayong lubhang magalaw at 
											malulubog tayo!<br>
											<br>
											--Mangagkruz muna kayo!--ang sabi ni 
											tia Isabel na nagkukruz.<br>
											<br>
											--At tayo ba'y mangag-iisa lamang 
											dito?--ang tanong ni Sinang, na 
											pinasasama ang mukha--Tayo ba lamang 
											...? Aray!<br>
											<br>
											Ang kadahilanan ng 'aray!' na ito'y 
											gawa ng isang kurot na sa 
											kapanahuna'y ibinigay kay Sinang ng 
											kanyang ina.<br>
											<br>
											Lumalayong untiunti ang mga bangka 
											sa pasigan at naaanino ang ilaw ng 
											mga parol sa salamin ng dagatang 
											walang kaalon-alon. Sa silangana'y 
											sumusungaw ang mga unang kulay ng 
											liwayway.<br>
											<br>
											Naghahari ang malaking katahimikan; 
											ang mga binata't dalagang 
											nagkakabukod-bukod, ayon sa kalooban 
											ng mga ina'y tila nangaggugunamgunam.<br>
											<br>
											--Mag-ingat ka!--ani Albinong 
											seminarista ng sabing malakas sa 
											isang kapwa binata;--yapakan mong 
											magaling ang mga bunot na pangsiksik 
											na na sa ilalim ng iyong paa.<br>
											<br>
											--Bakit?<br>
											<br>
											--sapagkat maaaring mabunglos at 
											pumasok ang tubig; maraming butas 
											ang bangkang ito.<br>
											<br>
											--Ay, at tayo'y lumulubog!--ang 
											sigawan ng mga babaeng malaki ang 
											gulat.<br>
											<br>
											--Huwag kayong mabahala, mga ginoong 
											babae!--ang pangpayapang sa kanila'y 
											sinabi ng seminarista. Ang bangkang 
											iya'y hindi maaano; walang butas 
											kung di lilima lamang, na hindi 
											naman totoong malalaki.<br>
											<br>
											--Limang butas! Jesus! At ibig ba 
											ninyong lunurin kami?--ang sigawan ng 
											mga babaeng nangatatakot.<br>
											<br>
											--Wala po naman kung di lilima, mga 
											ginoong babae, at ganyan kalaki 
											lamang!--ang patibay na sabi ng 
											seminarista, at sa kanila'y 
											itinuturo ang maliit na bilog na 
											gawa ng kanyang hinlalaki at 
											hintuturo na pinaghuhugpong ang 
											kapwa dulo. Yapakan ninyong mabuti 
											ang bunot na siksik at ng hindi 
											mabunglos.<br>
											<br>
											--Diyos ko! Maria Santisima! 
											Pumapasok na ang tubig!--ang sigaw ng 
											isang matandang babaeng ang 
											pakiramdam niya'y nababasa na siya.<br>
											<br>
											Nagkaroon ng kaunting kaguluhan, ang 
											iba'y tumitil-i, ang iba nama'y ibig 
											lumukso sa tubig.<br>
											<br>
											--Yapakan ninyong magaling ang bunot 
											diyan!--ang patuloy na sigaw ni 
											Albino, at kanyang itinuturo ang 
											dakong kinalalagyan ng mga dalaga.<br>
											<br>
											--Saan? saan? Diyos! Hindi namin 
											nalalaman! Parang awa na ninyo, 
											kayo'y pumarini't hindi namin 
											nalalaman!--ang pamanhik ng 
											matatakuting mga babae.<br>
											<br>
											Kinailangang lumipat ang ilang 
											bagongtao sa kabilang bangka upang 
											papanatagin ang loob ng mga 
											natatakot na mga ina. Laking 
											pagkakataon! Tila mandin may isang 
											panganib sa tabi ng bawa't dalaga. 
											Wala kahi't isang nakapagbibigay 
											panganib na butas sa tabi ng lahat 
											ng matatandang babae. At lalo pa 
											manding malaking pagkakataon! Umupo 
											si Ibarra sa tabi ni Maria Clara; 
											naupo si Albino sa tabi ni Viktoria 
											at iba pa. Muling naghari ang 
											katahimikan sa kabilugan ng 
											mapag-ingat na mga ina. Datapuwa't 
											hindi sa limpi ng mga dalaga.<br>
											<br>
											sapagkat hindi gumagalaw ng 
											kamunti man lamang ang tubig, hindi 
											nalalayo ang mga baklad at saka 
											totoo pang maaga, pinagkayariang 
											bitiwan ang mga gaod at 
											mangag-agahan ang lahat. Pinatay ang 
											ilaw ng mga parol, sapagkat 
											nililiwanagan na ang alang-alang ng 
											liwayway.<br>
											<br>
											--Walang kasinggaling ng salabat 
											kung inumin kung umaga bago 
											magsimba!--ani 
											kapitana Tika na ina ng masayang si 
											Sinang;--uminom po kayo ng salabat na 
											may kahalong puto, Albino, at 
											makikita ninyong hangang sa 
											sisipagin pa kayong magdasal.<br>
											<br>
											--Iyan nga po ang ginagawa ko--ang 
											sagot naman nito;--kaya't ibig ko na 
											tuloy magkumpisal.<br>
											<br>
											--Huwag!--ani Sinang,--uminom kayo ng 
											kafeng nakapagpapasaya ng kalooban.<br>
											<br>
											--ngayon din, sapagkat 
											ganakakaramdam na ako ng kalungkutan.<br>
											<br>
											--Huwag kayong uminom niyan--ang 
											paalaala ni tia Isabel;--uminom kayo 
											ng kha at kumain kayo ng galletas; 
											nakapagpapatahimik daw ng isip ang 
											kha.<br>
											<br>
											--Iinom din ako ng kha at kakain ako 
											ng galletas!--ang sagot ng mapagbigay 
											loob na seminarista--ang kabutiha'y 
											hindi katolikismo ang alin man sa 
											mga inuming iyan.<br>
											<br>
											--nguni't mangyayari ba ninyong ...? 
											ang tanong ni Viktoria.<br>
											<br>
											--Kung makaiinom naman ako ng 
											tsokolate? Mangyayari rin! Huwag 
											lamang na mapakalaon bago 
											mananghalian....<br>
											<br>
											Maganda ang umaga: nagpapasimula na 
											ng pagtinggad ang tubig, at sa 
											liwanag na nanggagaling sa langit at 
											sa sinag na sa tubig nagmumula, ang 
											nangyayari'y isang kaliwanagang 
											tumatanglaw sa mga bagaybagay, na 
											halos hindi nagkakaanino, isang 
											maningning at malamig na liwanag, na 
											nahahaluan ng mga kulay na ating 
											napagwawari sa mga tanging pintura 
											tungkol sa dagat.<br>
											<br>
											Halos nangagagalak ang lahat, 
											sinasanghod nila ang mahinang 
											amihang untiunting napupukaw; 
											sampung ang mga inang puspos sa 
											paninimdim at mga pagpapaalaala'y 
											nangagtatawanan at nangagbibiruan 
											silasila.<br>
											<br>
											--Natatandaan mo ba? anang isa kay 
											kapitana Tika--natatandaan mo ba ng 
											tayo'y nangaliligo sa ilog ng 
											panahong dalaga pa tayo? Di 
											kaginsaginsa'y dumarating na dala ng 
											agos ang malilit na bankang upak ng 
											saging, na may lulang iba't ibang 
											bungang halamang nangasasalansan sa 
											ibabaw ng mga mababangong bulaklak. 
											Bawa't isa sa mga bangka ay may 
											maliliit na banderang kinasusulatan 
											ng ating kanikanyang pangalan....<br>
											<br>
											--At kung bumabalik na tayo sa bahay?--ang 
											isinalabat naman ng isa, na hindi 
											nagpabayang makatapos ang 
											nagsasalita; nararatnan nating wasak 
											ang mga tulay na kawayan, at 
											pagkakagayo'y napipilitan tayong 
											tumawid sa ilat ... ang mga 
											tampalasan!<br>
											<br>
											--Siya nga--ani kapitana Tika;--datapuwa't 
											iniibig ko pang mabasa ang laylayan 
											ng aking saya kay sa ipakita ang 
											aking paa: nalalaman ko ng may mga 
											matang nagmamasid na nagtatago sa 
											mga damuhan sa pampang.<br>
											<br>
											Nangagkikindatan at nangagngingitian 
											ang mga dalagang nakakarinig ng mga 
											bagay na ito: hindi pumapansin ang 
											mga iba, sapagkat may sarili naman 
											silang mga pinag-uusapan.<br>
											<br>
											Isa lamang tao, ang gumaganap ng 
											pagkapiloto, ang nananatili sa hindi 
											pag-imik at hindi nakikisama sa 
											gayong mga pagkakatuwa. Siya'y isang 
											binatang napagkikilalang malakas sa 
											kanyang pangangatawan, mga kamay at 
											paa, at may pagmumukhang nakakaakit 
											ng pagmamasid dahil, sa kanyang 
											mapanglaw na malalaking mata at 
											mainam na tabas ng kanyang mga labi. 
											</p>
											<p style="color: #333333; font-family: Arial; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											Nahuhulog sa kanyang malusog na liig 
											ang kanyang mga buhok na maiitim, 
											mahahaba at hindi inaalagaan; 
											napagwawari sa mga kunot ng kanyang 
											itimang barong damit na magaspang 
											ang kanyang makapangyarihang mga 
											kasukaswang sumapi sa kanyang maugat 
											at lilis na mga bisig upang magamit 
											na parang isang balahibong ibon 
											lamang ang malapad at 
											pagkalakilaking sagwang kanyang 
											itinitimon upang mapatnugutan ang 
											dalawang bangka.<br>
											<br>
											Hindi miminsang nasubukan ang taong 
											ito ni Maria Clarang siya'y 
											pinagmamasdan: kung nagkakagayo'y 
											dalidaling tumitingin siya sa ibang 
											dako at tumatanaw sa malayo, sa 
											bundok, sa pampang. Nahabag ang 
											dalaga sa kanyang pag-iisa, kaya't 
											kumuha ng ilang galleta at saka 
											inialay. Tiningnan siya ng pilotong 
											wari'y nagtataka; nguni't sandaling 
											sandali lamang tumagal ang gayong 
											tingin: nuha ng isang galleta, at 
											napasalamat sa maikling salita na 
											bahagya na mawatasan sa kahinaan ng 
											boses.<br>
											<br>
											At sino ma'y hindi na muling 
											naalaala siya. Hindi 
											nakapagpapakunot ng alin mang bahagi 
											ng kanyang mukha ang masasayang 
											tawanan at mga biruan ng mga 
											binata't dalaga; hindi 
											nakapagpapangiti sa kanyang 
											matatawaning si Sinang, na 
											napipilitang sumandaling ikukot ang 
											kilay kung tumatanggap ng mga kurot, 
											upang manag-uli sa dating kasayahan.<br>
											<br>
											Ipinagpatuloy ang kanilang pagparoon 
											sa mga baklad, pagkatapos na 
											makapagagahan.<br>
											<br>
											Dalawa ang baklad na iyong natatayo 
											sa katatagang pagkakaalayo, at kapwa 
											pag-aari ni Kapitan Tiago. Natatanaw 
											buhat sa malayo ang ilang tagak na 
											nakadapo sa ibabaw ng mga dulo ng 
											mga kawayang tolos, na ang anyo'y 
											nagsisipanood, samantalang 
											nangagliliparang ang tungo'y sa 
											iba't ibang dako ang mga 'kalaway' 
											na hinihilahisan ng kanilang mga 
											pakpak ang dakong ibabaw ng dagatan 
											at pinupuspos ang impapawid ng 
											kanilang mga huning nanunuot sa 
											tainga.<br>
											<br>
											Sinundan ng tingin ni Maria Clara 
											ang mga tagak, na ng malapit ang 
											bangka ay nagliparang ang tungo'y sa 
											kalapit na bundok.<br>
											<br>
											--Nangagpupugad ba ang mga ibong iyan 
											sa bundok? ang tanong ni Maria Clara 
											sa piloto.<br>
											<br>
											--Marahil po, ginoo,--ang isinagot--nguni't 
											sino ma'y wala pang nakakakita ng 
											mga pugad na iyan.<br>
											<br>
											--Wala bang pugad ang mga ibong iyan?<br>
											<br>
											--Inakala kong sila'y may pugad, 
											sapagkat kung hindi totoong 
											kulang-palad sila.<br>
											<br>
											Nahiwatigan ni Maria Clara ang 
											malungkot na pangungusap ng piloto 
											ng gayong mga salita.<br>
											<br>
											--Kung gayo'y paano?<br>
											<br>
											--Hindi raw, po, ginoo, nakikita ang 
											mga pugad ng mga ibong iyan, at 
											taglay naman ang bisa na huwag 
											makita ang may dala ng pugad ng 'kalaway', 
											at tulad sa kalolowang hindi 
											nakikita kung di sa makinis na 
											salamin ng mga mata; gayon din 
											namang hindi nakikita ang mga pugad 
											na iyan kung hindi lamang sa salamin 
											ng tubig.<br>
											<br>
											Nag-anyong nag-iisip-isip si Maria 
											Clara.<br>
											<br>
											Samantala'y dumating sila sa bangka; 
											itinali ng matandang bangkero ang 
											mga sasakyan sa isang tolos na 
											kawayan.<br>
											<br>
											--Hintay muna!--ani tia Isabel sa anak 
											na lalaki ng matandang talagang 
											aakyat na sanang dala ang panalok,--kinakailangang 
											mahanda muna ang sinigang at ng 
											tuloy-tuloy sa sabaw ang mga isda 
											panggagaling sa tubig.<br>
											<br>
											--Mabait na tia Isabel!--ang biglang 
											sinabi ng seminarista;--aayaw na 
											susumandali ma'y damdamin ng isda 
											ang pagkahiwalay sa tubig.<br>
											<br>
											Balitang magaling na magluto, baga 
											ma't may malinis na mukha, si Andeng 
											na kapatid sa gatas ni Maria Clara. 
											Naghanda ng hugas-bigas, mga kamatis 
											at kamias, at tinutulungan o 
											inaabala kaya siya ng ilang marahil 
											nangagnanais na sila'y kanyang 
											kalugdan. Linilinis ng mga dalaga 
											ang mga talbos ng kalabaza, 
											hinihimay ang mga patani at 
											pinapuputolputol ang mga paayap ng 
											kasinghahaba ng kigarrillo.<br>
											<br>
											Upang libangin ang kainipan ng mga 
											nagmimithing makita kung paano 
											lalabas sa kanilang bilangguan ang 
											mga isdang buhay at nangaggagalawan, 
											kinuha ng magandang si Iday ang 
											kanyang arpa. Hindi lamang mainam 
											tumugtog si Iday ng instrumentong 
											ito, kung hindi bukod sa rito'y may 
											magagandang daliri.<br>
											<br>
											Nangagpakpakan ang mga kabataan, 
											hinagkan siya ni Maria Clara: ang 
											arda ang siyang instrumentong lalong 
											tinutugtog sa lalawigang iyon at 
											siyang nauukol sa gayong mga sandali.<br>
											<br>
											--Kantahin mo, Viktoria, 'Ang 
											kancion ng Matrimonio'!--ang hiningi ng mga 
											ina.<br>
											<br>
											Tumutol ang mga lalaki, at si 
											Viktoriang may mainam na boses ay 
											dumaing na siya'y namamalat daw. 'Ang 
											kancion ng Matrimonio'y' isang 
											magandang tulang tagalog na 
											nagsasaysay ng mga kahirapan at mga 
											kalungkutan ng matrimonio, na hindi 
											binabanggit ang alin man sa kanyang 
											mga katuwaan.<br>
											<br>
											Nang magkagayo'y hiningi nilang 
											kumanta si Maria Clara.<br>
											<br>
											--Pawang malulungkot na lahat ang 
											aking mga 'kancion'.<br>
											<br>
											--Hindi kailangan! hindi 
											kailangan!--ang 
											sabihan ng lahat.<br>
											<br>
											Hindi na siya napapamanhik; 
											tinangnan ang arpa, tumugtog ng 
											isang 'preludio' o pangunahin at 
											kumantang ang boses ay mataginting, 
											kalugodlugod nat agad ang damdamin:</p>
											<div class="poem" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial">
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Sa sariling Baya'y 
														katamistamisan</span></font><p align="justify" style="margin:0 80px; ">
														<span style="font-size: 13pt">
														<font face="Arial" color="#333333">Ang lahat ng horas na 
														nangagdaraan,</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Palibhasa roo'y pawang 
														kaibigan</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Ang lahat ng abot ng 
														sikat ng araw.</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Pangbuhay na lubos, ang 
														hanging amihang</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Lumilipadlipad sa bundok 
														at parang,</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Lubhang maligaya sampung 
														kamatayan</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														</span>
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														At lalong matimyas ang 
														pagsintang tunay!</span></font></div>
												</div>
												<div class="stanza">
													<div class="verse">
														<p align="justify" style="margin-left: 80px; margin-right: 80px">
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Nagsisipagsaya sa labing 
														marikit</span></font><span style="font-size: 13pt"></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Ang ganap sa ningas at 
														wagas na halik</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Nang mapag-arugang ina 
														sa pag-ibig</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Kung siya'y magising na 
														kalong sa dibdib,</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Tuloy hinahanap magiliw 
														na bisig</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Na iniyayakap sa ligid 
														ng liig</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														At ang mga mata'y pagka 
														tumititig</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														</span>
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Pawang ngumingiti sa 
														galak na akit.</span></font></div>
												</div>
												<div class="verseind2">
&nbsp;</div>
												<div class="stanza">
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Yaong kamataya'y 
														katamistamisan</span></font><span style="font-size: 13pt"></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Pagka nahahandog sa 
														sariling Bayang</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Ang lahat ng abot ng 
														sinag ng araw</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Ating kakilala't pawang 
														kaibigan:</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Pangpatay na lubos ang 
														hanging amihan</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Sa sino mang taong 
														walang maisaysay</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														<font face="Arial" color="#333333">
														Na Bayang sariling 
														pinakamamahal,</font></div>
													<div class="verse">
														<p align="justify" style="margin:0 80px; ">
														</span>
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Inang maaruga't isang 
														kasintahan!</span></font></div>
												</div>
											</div>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Natapos ang boses, huminto, napipi 
											ang arpa, at gayon ma'y 
											nagsisipanatili sa pakikinig; sino 
											ma'y walang pumalakpak. Naramdaman 
											ng mga dalagang napupuno ng luha ang 
											kanilang mga mata. Tila mandin 
											nababagot si Ibarra at ang binatang 
											piloto'y nakatanaw sa malayo at 
											hindi kumikilos.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Di kaginsaginsa'y narinig ang isang 
											tunog na nakabibingi; sumigaw ang 
											mga babae at tinakpan ang kanilang 
											mga tainga. Yao'y gawa ng naging 
											seminaristang si Albino, na 
											hinihipan ng&nbsp; buong&nbsp; lakas ng 
											kanyang lalamunan ang sungay ng 
											kalabaw, na 'tambuli' kung tawagin. 
											Nanag-uli ang tawanan at ang galak; 
											ang mga matang dating puno ng luha 
											ay sumaya.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Datapuwa't kami ba'y bibingihin mo, 
											hereje?--ang sigaw sa kanya ni tia 
											Isabel.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ginoong babae!--ang sagot ng naging 
											seminarista ng&nbsp; buong&nbsp; 
											kataimtiman;--may naringig akong 
											sinasabing isa raw dukhang 
											trompetero doon sa mga pampangin ng 
											Rhin, na nakapag-asawa, sa isang 
											dalagang mahal at mayaman, dahil sa 
											pagtugtog ng trompeta lamang.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Tunay nga, ang trompetero sa 
											Sakkingen!--ang idinugtong ni Ibarra, 
											na hindi mangyaring di makipanayam 
											sa bagong kasayahan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Narinig 
											na ninyo?--ang ipinagpatuloy ni 
											Albino;--kaya nga ibig kong tingnan 
											kung magkakaroon ako ng gayon ding 
											kapalaran.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											At muli na namang hinipan ng lalo pa 
											manding malakas ang matunog na 
											sungay, at sinasadyang ilapit sa mga 
											tainga ng mga dalagang nagpapakita 
											ng kapanglawan. Sa gayo'y nagkaroon 
											nga ng kaunting kaguluhan; siya'y 
											pinahimpil ng mga ina sa kahahampas 
											ng khinelas at kakukurot.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Aray! aray!--ang sinabi niya, na hinihipo 
											ang kanyang mga bisig--Gaano ang 
											layong ikinahihiwalay ng Filipinas 
											sa mga pampangin ng Rhin! 'Oh 
											tempora! oh mores!' Binibigyan ang 
											iba ng ganting-pala at balabal ng 
											kahihiyan ang ibinibigay naman sa 
											iba.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nangagtatawanan na ang lahat sampu 
											ni Viktoria, gayon ma'y sinasabi ng 
											may masasayang mata na si Sinang kay 
											Maria Clara ng sabing marahan:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Mapalad ikaw! Ay, ako ma'y kakanta 
											rin kung mangyayari sana!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa kawakasa'y ipinagbigay alam ni 
											Andeng, na nakahanda na ang sabaw 
											upang matanggap ang doo'y ilalagay.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nanhik, ng magkagayon, ang 
											nagbibinata ng anak ng mangingisda, 
											sa pabahay ng baklad, na na sa 
											dakong dulong pinagtatalikupan nito 
											at doo'y maisusulat ang 'Laskiate 
											ogni speranza voi kh'entrate', kung 
											marunong sana at nakakawatas ng 
											wikang italiano ang mga kulang palad 
											na mga isda: ang pumapasok sa kanila 
											roo'y hindi lumalabas kung di ng 
											mamatay. Yao'y isang kulong na may 
											mga isang metro ang luang, na ang 
											pagkakaanyo'y makatitindig ang isang 
											tao sa itaas upang buhat doo'y 
											mahagip ng salok ang mga isda at 
											maitaas.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Diyan ang tunay na hindi ako 
											mayayamot na mamingwit!--ang sabi ni Sinang na 
											nanginginig sa galak.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nangagmamasid ng di kawasa ang lahat: 
											nakikinikinita na ng ibang 
											nangagpapalagan at nagluluksuhan ang 
											mga isda sa loob ng lambat ng 
											panalok, kumikinang ang kanilang 
											makikintab na kaliskis at iba pa. 
											Gayon man, ng isisilid ng binata ang 
											lambat ay walang ano mang 
											lumuluksong isda.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Marahil 
											puno,--ang marahang sabi ni Albino; 
											mahigit ng limang araw na hindi 
											pinapandaw.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Itinaas ng mangingisda ang salok.... 
											ay! kahi't isang isda man lamang ay 
											walang nakapamuti sa lambat; sa 
											pagkahulog ng masaganang patak ng 
											tubig na liniliwanagan ng araw ay 
											wari'y nagtatawa ng mataginting. 
											Isang 'ah!' ng pagtataka, ng sama ng 
											loob, ng pagkabigo ang tumakas sa 
											mga labi ng lahat.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Inulit ng binata ang paglulubog ng 
											salok, at gayon din ang kinahinatnan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hindi mo nalalaman ang iyong 
											hanap-buhay!--ang sa kanya'y sinabi 
											ni Albino, at umukyabit ito sa 
											pabahay ng baklad at inagaw ang 
											salok sa kama'y ng binata--Makikita 
											ninyo ngayon! Andeng, buksan mo na 
											ang palayok!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Datapuwa't si Albino ma'y hindi 
											nakakaalam: nanatili sa pagkawalang 
											laman ang salok. Pinagtawanan siya 
											ng lahat.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Huwag kayong maingay at naririnig 
											kayo ng mga isda ay ayaw 
											pahuli!--Marahil punit ang lambat na 
											ito!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											nguni't walang kasirasira ang lambat.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Pabayaan 
											mo't ako,--ang sa kanya'y sinabi ni 
											Leong nangingibig kay Iday. 
											Siniyasat na magaling nito ang 
											kalagayan ng baklad, minasdan ang 
											lambat, at ng matanto na niyang 
											pawang magaling ang kalagayan ay 
											tumanong:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Talastas 
											ba ninyong magaling na may limang 
											araw ng hindi pinapandaw ito?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Totoong 
											nalalaman namin! Niyong araw na bago 
											mag 'Todos los Santos' ang 
											kahulihulihang pagkapandaw nito.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kung gayo'y o enkantado ang dagatan 
											o makakahuli ako ng kahi't iilan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Inilubog sa tubig ni Leon ang salok; 
											datapuwa't nalarawan sa mukha niya 
											ang pangigilalas. Sandaling 
											tiningnan niya ng walang imik ang 
											kalapit na bundok at ipinagpatuloy 
											ang pag paparoo't parito ng salok sa 
											tubig: pagkatapos ay umanas na hindi 
											inaalis sa tubig ang salok:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Isang buwaya!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Isang buwaya!--ang kanilang inulit.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nagpalipatlipat ng&nbsp; buong&nbsp; tulin sa 
											mga bibig ang salitang iyon, sa 
											gitna ng pagkatakot at pagkamangha 
											ng lahat.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ano ang sabi ninyo?--ang itinanong 
											nila sa kanya.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ang sabi ko'y may isang buwayang 
											nahuli,--ang ipinagmatigas na sabi ni 
											Leon, saka inilubog sa tubig ang 
											tagdang kawayan ng salok, at 
											nagpatuloy ng pagsasalita:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Naririnig ba ninyo ang tunog na 
											iyan? Iya'y hindi ang buhangin; iyan 
											ang matigas na balat, ang likod ng 
											buwaya. Nakikita ba ninyo ang 
											paggalaw ng mga kawayan? Iya'y siya 
											na nagpupumiglas, datapuwa't siya'y 
											nababaluktot; hintay kayo ...! 
											malaki: may isang dangkal halos o 
											mahigit pa ang lapad ng kanyang 
											katawan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ano ang marapat gawin?--ang 
											tanungan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hulihin!--ang sabi ng isang boses.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Jesus! at sino ang huhuli?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sino ma'y walang humahandog na 
											sumisid sa kalaliman. Ang tubig ay 
											malalim.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Dapat na itali natin siya sa ating 
											bangka at saka kaladkarin ng&nbsp; 
											buong&nbsp; pagdiriwang!--ani Sinang.--Dapat 
											bang kanin ang mga isdang talagang 
											kakanin natin!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hindi pa ako nakakakita hangga 
											ngayon ng isang buwayang buhay!--ang 
											ibinulong ni Maria Clara.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nagtindig ang piloto, kumuha ng 
											isang mahabang lubit at maliksing 
											pumanhik sa pinakabatalan ng baklad. 
											Ipinagkaloob ni Leong ang piloto'y 
											siyang humalili sa kanyang 
											kinalalagyan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Lumukso ang piloto sa loob ng 
											pabahay ng baklad, sa gitna ng 
											pagtataka at bagaman nangagsisigawan 
											ang lahat.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Dalhin po ninyo ang sundang na 
											ito!--ang sigaw ni Crisostomo, at sa 
											kanya'y iniaabot ang binunot na 
											isang malapad na sundang na gawa sa 
											Toleod.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Datapuwa't napaiimbulog na ang 
											libolibong patak, at naghilom na ang 
											tubig ng&nbsp; buong&nbsp; talinghaga.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Jesus, Maria y Jose!--ang sigawan ng 
											mga babae.--Magkakasakuna tayo! 
											Jesus, Maria y Jose!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Huwag kayong mabahala, mga ginoong 
											babae,--ang sa kanila'y sinabi ng 
											matandang bangkero,--kung sa 
											lalawiga'y may isang makagagawa ng 
											ganyang bagay, iya'y 'siya.'</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ano ang pangalan ng binatang 
											iyan?--ang itinanong nila.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Tinatawag namin siyang si 'Piloto': 
											sa mga pilotong nakilala ko'y siya 
											ang magaling sa lahat; ang kasam-an 
											lamang ay hindi niya kinagigiliwan 
											ang hanap-buhay na iyan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Ang tubig ay gumagalaw, umaalimpuyo 
											ang tubig: tila mandin may nagbubuno 
											sa ilalim; umuuga ang baklad. Hindi 
											umiimik ang lahat, pinipigil ang 
											paghinga. Pinipisil ni Ibarra ng 
											nangangatal niyang kamay ang puluhan 
											ng matalas na sundang.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tila mandin ang pagbubuno'y natapos 
											na. Sumungaw sa ibabaw ng tubig ang 
											ulo ng binata, na binati ng masayang 
											sigawan: punong-puno ng mga luha ang 
											mga mata ng mga babae.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Umakyat ang piloto na hawak ang dulo 
											ng lubid, at ng na sa batalan na'y 
											saka hinila ang lubid na iyon.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Lumitaw ang buwaya: nakatali ang 
											lubid ng lambal na pahilis sa liig 
											at sa dakong buntot. Malaking buwaya 
											iyon, na gaya na nga ng ibinalita na 
											ni Leon may mga pinta, at sa ibabaw 
											ng kanyang likod ay may sumisibol ng 
											lumot, na sa mga buwaya'y siyang 
											pinakauban kung baga sa tao. 
											Umaatungal na parang vaka, 
											hinahagkis ng kanyang buntot ang mga 
											dinding ng baklad, kumakapit doon, 
											at inginananganga ang kanyang maitim 
											at kagulatgulat na bunganga na ano 
											pa't ipinakikita ang kanyang 
											mahahabang mga pangil.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nag-iisa ang piloto sa paghila sa 
											buwaya sa itaas: walang 
											nakakagunitang sa kanya'y tumulong.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang wala na sa tubig at ng mailagay 
											na sa ibabaw ng batalan, tinapakan 
											ng piloto ang buwaya ng kanyang paa; 
											tinikom ng kanyang malakas na kamay 
											ang pagkalalaking mga panga, at 
											binantang talian ang nguso ng 
											matibay na gapos. Tinikman ng buwaya 
											ang huling pagpipiglas, ibinalantok 
											ang katawa't saka ipinalo sa batalan 
											ang malakas niyang buntot, at 
											pagkakawala'y sumibat at nilukso ang 
											dagatan, sa dakong labas ng baklad, 
											na ano pa't nakaladkad ang sa 
											kanya'y nagpapasuko. Walang salang 
											mapapatay ang piloto; isang sigaw ng 
											panghihilakbot ang tumakas sa lahat 
											ng mga dibdib.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Matuling tulad sa lintik ay biglang 
											nahulog sa tubig ang isang katawan; 
											bahagya na sila nagkapanahong 
											makitang si Ibarra iyon. Hindi 
											hinimatay si Maria Clara, sapagkat 
											hindi pa natututo ang mga filipinang 
											maghimatay.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nakita nilang namula ang mga alon, 
											nadampol ng dugo ang tubig. Lumukso 
											sa malalim na tubigang binatang 
											mangingisda na hawak ang kanyang 
											gulok, sumunod sa kanya ang kanyang 
											ama; datapuwa't bago pa lamang 
											nakasisisid sila'y siyang paglutang 
											naman ni Crisostomo at ng piloto na 
											kapwa nakakapit sa bangkay ng buwaya. 
											Ang&nbsp; buong&nbsp; tiyang maputi nito'y 
											baak at nakapako sa lalamunan ang 
											sundang.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi maisaysay ang katowaan: 
											libolibong kamay ang sa kanila'y 
											umabot upang iahon sila sa tubig. 
											Nahihibang halos ang matatandang 
											babae at sila'y nangagtatawanan at 
											nangagdarasal. Nalimutan ni Andeng 
											na makaatlo ng sumulak ang kanyang 
											sinigang: nabubo ang lahat ng sabaw 
											at namatay ang apoy. Si Maria Clara 
											lamang ang hindi makapagsalita.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi naano si Ibarra; nagkaroon ng 
											bahagyang galos sa bisig ang piloto.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kayo ang pinagkakautangan ko ng 
											aking buhay!--ang sabi ng piloto kay 
											Ibarrang nagbabalot ng mga mantang 
											lana at mga 'tapiz'.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Ang anyo ng boses ng piloto'y tila 
											mandin may pighati.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Totoong 
											masulong po kayo sa panganib,--ang sa 
											kanya'y isinagot ni Ibarra;--uli-uli 
											huwag po ninyong tutuksuhin ang 
											Diyos.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kung di ka sana nakabalik!...ang 
											ibinulong ni Maria Clarang namumutla 
											at nangangatal pa.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kung di sana ako nakabalik at ikaw 
											ay sumunod sa akin,--ang isinagot ng 
											binata, na kanyang ipinagpatuloy ang 
											kaisipan,--sa ilalim ng dagata'y 'mapapasama 
											ako disin sa aking familia!'</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi nalilimutan ni Ibarrang doon 
											humihimlay ang mga but-o ng kanyang 
											ama.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Aayaw ng pumaroon ang matatandang 
											babae sa kabilang baklad, ibig na 
											nilang umuwi, at ang kanilang 
											minamatuwid ay nagpasimula raw ng 
											masama ang araw, at baka may 
											mangyaring maraming sakuna.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At ang lahat ng iya'y dahil, sa 
											hindi tayo nagsimba muna!--ang 
											ibinubuntong hininga ng isang 
											matandang babae.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Datapuwa't ano po bang sakuna ang 
											nangyari sa atin, mga ginoong 
											babae?--ang tanong ni Ibarra.--Ang 
											buwaya ang siya lamang kinulang 
											palad!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At ang bagay na ito'y 
											nagpapatotoo,--ang iniwakas ng naging 
											seminarista,--na sa&nbsp; buong&nbsp; kanyang 
											makasalanang buhay hindi nagsimba 
											kailan man ang sawing palad na 
											buwayang ito. Kailan ma'y hindi ko 
											makitang siya'y nakasama ng lubhang 
											maraming mga buwayang malimit na 
											pasasimbahan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nagsiparoon nga ang mga bangka sa 
											kabilang baklad, at kinailangang 
											muling maghanda si Andeng ng ibang 
											sabaw na pagsisigangan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Umaaraw na; humihihip ang amihan: 
											napupukaw at namamasag ang mga alon 
											sa paligid ng buwaya, at nagtatayo 
											ng 'nga bundok ng bula, na doo'y 
											kumikintab ng&nbsp; buong&nbsp; kasaganaan sa 
											mga kulay ang liwanag ng araw', ayon 
											sa saysay ng poetang si P.A. Paterno.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Muling tumunog ang musika: 
											tumutugtog si Iday ng arpa, at ang 
											mga lalaki nama'y mga akordeon at 
											mga gitarra, na humigit kumulang ang 
											'afinacion;' datapuwa't si Albino 
											ang magaling tumugtog sa lahat, 
											sapagkat tunay na kinakamot ang 
											gitarra, nagkukulang sa 'tono' at 
											mayatmaya'y sumisinsay sa kompas, at 
											kaginsagisa'y nakalilimot, kaya't 
											lumilipat sa sonatang ibang iba sa 
											dating tinutugtog.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Pinaroonan ang kabilang baklad na 
											may malaking pag-aalinlangan; marami 
											ang umaasang naroroon doon ang 
											babaeng buwayang asawa ng napatay, 
											nguni't mapagbiro ang 'Naturaleza', 
											kaya't laging puno ng isda ang salok 
											kailanis ma't ililitaw.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nag-uutos si tia Isabel:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Mabuting isigang ang 'ayungin'; 
											pabayaan ninyo ang 'biya' at ng 
											magawang 'eskabekhe', ipasa ninyo 
											ang 'dalag' at ang 'buwan-buwan': 
											mahaba ang buhay ng dalag. Ilagay 
											ninyo sila sa lambat at ng manatili 
											sila sa tubig. Ilagay ninyo ang mga 
											'sugpo' sa kawali! Ukol na iihaw ang 
											'banak' na may kamatis sa tiyan, at 
											nakabalot sa dahon ng saging.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Pabayaan ninyo ang iba at ng maging 
											pain. Hindi magaling na pabayaang 
											ang walang kalamanlaman ang baklad,--ang 
											idinugtong.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											ng magkagayo'y nangag-akala silang 
											lumunsad sa pampang, sa gubat na 
											iyon ng matatandang kahoy na 
											pag-aari ni Ibarra. Doo'y sa lilim 
											at sa tabi ng malinaw na batis ay 
											manananghalian sila sa gitna ng mga 
											bulaklak o sa ilalim ng itatayo 
											agad-agad na mga palapala.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Umaalingawngaw sa alang-alang ang 
											musika; napaimbulog ng&nbsp; buong&nbsp; 
											kasayahan ang usok ng mga kalang ang 
											anyo'y manipis na ipoipo: umaawit 
											ang tubig sa loob ng mainit na 
											palayok; marahil ay mga salitang 
											pang-aliw sa mga isdang patay, 
											marahil ay libak at kutya: 
											nagpapapihitpihit ang bangkay ng 
											buwaya, kung minsa'y biglang 
											ipinakikita ang maputi at wakwak na 
											tiyan, kung minsan nama'y biglang 
											ipinakikita ang may pinta at 
											namemerdeng likod, nguni't hindi 
											nagugulumihanan ang taong minamahal 
											ng Naturaleza, sa gayong karaming 
											pagpatay na kusa sa mga kapatid, 
											ayon sa sasabihin marahil ng mga 'bramin' 
											o ng mga 'vegetariano.'</font></p>
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