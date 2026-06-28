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
<title>El Filibusterismo - Filipino sa KPluz.com</title>
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
								<td valign="bottom" background="file:///H:/tutorial-content.jpg">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										El Filibusterismo</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XVI. Ang mga Kapighatian ng mga Intsik</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinagabihan ng Sabado ring yaon, ang intsik na si Quiroga na nagnanasang 
	makapagtatag ng isang <i xml:lang="es" lang="es">consulado</i> ng kanyang 
	bansa, ay naghanda ng isang hapunan sa itaas ng kanyang tindahan na nasa 
	daang&nbsp;Escolta. Maraming dumalo sa kanyang pista: mga prayle, mga kawani, mga 
	militar, mga mangangalakal, lahat ng kanyang mga suki, mga kasama o mga 
	ninong, ay pawang nangaroroon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang kanyang tindahan ay siyang kinukunan ng 
	lahat ng kailangan ng mga kura at ng mga kombento, tumatanggap ng
	<i xml:lang="es" lang="es">vale</i> ng lahat ng kawani, mayroon siyang 
	matatapat na alagad na masunurin at masisipag. Ang mga prayle ay hindi 
	nanganganinganing dumaan ng mga buo buong oras sa kanyang tindahan, maging 
	sa pook na tanaw ng madla, maging sa mga silid na nasa loob, na, may mga 
	kaayaayang kapulong....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang gabi 
	ngang iyon, ang kabahayan ay may katangitanging anyo. Namumuno sa mga prayle 
	at mga kawani na nangakaluklok sa mga uupang Viena at mga mumunting bangkong 
	maitim ang kahoy at ang uupan ay marmol na galing sa Canton, sa harap ng mga 
	mumunting dulang na parisukat, at nangaglalaro ng
	<span xml:lang="es" lang="es">tresillo</span> o nangag-uusap usap, sa tulong 
	ng maningning na liwanag ng mga ginintuang lampara o ng kukutakutatap na 
	ilaw ng mga parol intsik na may matitingkad na palamuting borlas na sutla. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa mga dingding ay magulong nagkakahalo ang mga panooring payapa at bughawin 
	na gawang Canton at Hongkong, na kasama ng mga <i xml:lang="es" lang="es">
	cromo</i> ng mga babaeng naglilingkod sa mga sultan, mga babaeng halos 
	hubad, mga larawan ng Cristo na mukhang babae, ng kamatayan ng banal at ng 
	makasalanan, na pawang yari sa mga pagawaang hudio sa Alemania upang 
	ipagbili sa mga bayang katoliko. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Naroroon din ang mga larawang intsik na 
	nasa pulang papel na may isang lalaking nakaupo na ang anyo'y 
	kagalanggalang, mapayapa at nakangiti, sa likuran nito'y may nakatayong 
	aliping napakapangit, na ang pigil ay isang sibat na ang talim ay malapad at 
	matalas: tinatawag na Mahoma ng mga taga roon at tinatawag na Santiago ng 
	ilan, hindi namin maalaman kung bakit; ang mga intsik naman ay hindi 
	nagpapaliwanag tungkol sa pagkakakilalang iyon sa dalawang pangalan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mga putok ng botella ng <span xml:lang="en" lang="en">Champagne</span>, bungguan 
	ng mga kopa, tawanan, usok ng tabako at isang tanging amoy ng bahay intsik, 
	na may halong pebete, apian at mga imbak na bungang kahoy ang nagiging 
	kabuuan ng lahat ng iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Suot wariy 
	mandarin, na bughaw ang <i>borlas</i> ng kopia, ay nagpapalakadlakad sa mga 
	silid, si intsik Quiroga, na tuwid at unat na unat, na pasulyapsulyap na 
	waring sinisiyasat kung walang nangduduwit ng ano man. Datapwa'y kahit na 
	taglay ang gayong di pagtitiwalang likas sa kanya ay nakikipagkamayan, 
	binabati ang ilan sa tulong ng mga masuyo at pakumbabang ngiti, at ang ilan 
	ay bating mapag-ampon, at ang iba'y bating palibak na waring ang ibig
	<span class="locked">sabihin ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam ko na! 
	hindi kayo naparito ng dahil sa akin kundi dahil sa aking hapunan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May katwiran 
	si intsik Quiroga. Yaong matabang ginoo na pumupuri sa kanya at nagsasabi ng 
	pangangailangan ng isang <i>konsulado</i> ng intsik dito sa Maynila, na ang 
	ibig manding sabihin ay walang makagaganap sa katungkulang iyon liban na kay 
	Quiroga, ay si <abbr>G.</abbr>&nbsp;Gonzalez na pumipirmang <i>Pitili</i> kung 
	tinutuligsa sa mga tudling ng pahayagan ang pagparito ng intsik. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Yaong isa 
	na may kagulangan na at sinisiyasat na malapit na malapit ang mga bagay 
	bagay, ang mga lampara, at mga <i xml:lang="es" lang="es">cuadro</i>, at
	<abbr>iba </abbr>pa, at ngumingiwi at bumubulalas ng padusta, ay si <abbr>G.</abbr>&nbsp;Timoteo 
	Pelaez, ama ni Juanito, mangangalakal na nangangalandakan ng laban sa 
	pakikiagaw ng mga intsik na naghahapay sa kanyang kalakal. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At ang isa, ang 
	nasa dako pa roon, iyong kayumangging ginoo, payat, na ang paningin ay 
	magaslaw at banayad ang ngiti, ay yaon ang bantog na may kagagawan ng ukol 
	sa mga pisong mehikano na nagbigay ng di kakaunting sama ng loob sa isang 
	kinakalong ni Quiroga; ang kawaning iyon ay kilala sa Maynila dahil sa 
	katalasan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang nasa malayolayo pa, yaong kung tumingin ay pairap at hindi 
	husay ang bigote ay siyang kawaning kinikilalang lalong karapatdapat 
	sapagka't nagkaroon ng katapangang magsalita ng laban sa pangangalakal ng 
	mga <span xml:lang="es" lang="es">billete</span> sa loteria na ginagawa ni 
	Quiroga at ng isang babaeng bantog sa mga lipunan sa Maynila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sadya ngang 
	kung hindi man ang kalahati ay ang dalawa ng katlong bahagi ng mga
	<span xml:lang="es" lang="es">billete</span> ay dinadala sa kaintsikan at 
	ang nalalabing kaunti sa Maynila ay ipinagbibiling may patong na sikolo. 
	Lubos ang pananalig ng tinurang ginoo na sa balang araw ay mapapasa-kanya 
	ang pinakamalaking tama, kaya't muhing muhi sa mga gayong kagagawan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	nama'y nagtatapos ang hapunan. Mula sa kakainan ay umaabot sa kabahayan ang 
	mga bahagi ng talumpati, tawanan, mga pagsalangsang, halakhakan.... Ang 
	pangalan ni Quiroga ay paulit-ulit na nadidinig, na kahalo ng mga salitang
	<i xml:lang="es" lang="es">consul</i>, pagpapantaypantay, mga karapatan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang may 
	piging, na hindi kumakain ng lutong Europa, ay nakikitungga na lamang 
	maminsanminsan sa kanyang mga panauhin, at nangangakong makikisabay sa 
	pagkain ng mga hindi nakadulog sa unang hain.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakapaghapunan 
	na si Simoun ng dumating at nakikipag-usap, sa kabahayan, sa ilang 
	mangangalakal na nangagsisidaing dahil sa kalagayan ng paghahanap buhay: 
	masama ang lakad ng lahat, nahihinto ang pangangalakal, ang pakikipagsuklian 
	sa Europa ay napakataas ang halaga; nangagsisihingi ng liwanag sa 
	mag-aalahas o inuudyukan siya ng ilang paraan sa pag-asang sasabihin sa 
	Capitan General. Sa bawa't kaparaanang ipalagay ay tinutugunan ni Simoun ng 
	isang ngiting pakutya't paglibak. Ba! kaululan! hanggang sa nang mamuhi na 
	ang isa, ay itinanong ang kanyang haka.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang aking 
	haka?--ang tanong--pag-aralan ninyo kung bakit lumulusog ang ibang bansa at 
	gayahan ninyo sila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At bakit 
	nangagsisilusog, <abbr>G.</abbr>&nbsp;Simoun?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ni 
	Simoun ang kanyang balikat at hindi sumagot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	gawain sa daongan na nakabibigat sa pangangalakal at ang daongang hindi 
	mayariyari!--ang buntonghinga ni <abbr>G.</abbr>&nbsp;Timoteo Pelaez--ay isang kayo 
	ni Guadalupe, gaya ng sabi ng anak ko, na hinahabi at kinakalas.... ang mga 
	buwis....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At dumadaing 
	kayo!--ang bulalas ng isa--At ngayong kapapasiya pa lamang ng General ng 
	pagpapagiba ng mga bahay na pawid! Kayong may maraming
	<i xml:lang="es" lang="es">hierro galvanizado</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo--ang sagot 
	ni <abbr>G.</abbr>&nbsp;Timoteo--ngunit ang nagugol ko naman sa kapasiyahang 
	iyan! At saka ang pagpapagiba'y hindi pa gagawin kundi sa loob ng isang 
	buwan, hanggang dumating ang kurisma; mangyayaring may dumating pang iba.... 
	ang ibig ko sana'y ipagiba ngayon din, datapwa't.... Bukod sa rito, ano ang 
	ibibili sa akin ng mga may ari ng bahay na iyan sa pawang maralita?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mangyayari 
	ding mabili ninyo ng murang mura ang kanilang mga bahay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At pagkatapos 
	ay lakaring pawalang bisa ang kautusan at ipagbiling muli, na ibayo ang 
	halaga....! Naiyan ang isang kalakal!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	ngumiti ng ngiti niyang malamlam, at sa dahilang nakitang sumasalubong din 
	si intsik Quiroga ay iniwan ang mga madainging mangangalakal upang batiin 
	ang magiging <i xml:lang="es" lang="es">consul</i>. Babahagya pa lamang 
	siyang nakita nito ay nawala na ang anyong may kasiyahang loob at ang 
	mukha'y iginaya sa mga mangangalakal, at yumuko ng bahagya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iginagalang na 
	lubha ng intsik na si Quiroga ang mag-aalahas, hindi lamang sa dahilang 
	kilala niyang mayaman, kundi dahil sa mga bulungbulungang umano'y kaututang 
	dila ng Capitan General. Nababalitang inaayunan ni Simoun ang mga hangarin 
	ng intsik, kasang-ayon sa ukol sa <i xml:lang="es" lang="es">consulado</i>, 
	at sa gitna ng mga banggitin, mga parunggit at mga
	<i xml:lang="es" lang="es">puntos suspensivos</i> ay tinukoy na siya ng 
	isang pamahayagang laban sa intsik, sa isang nabantog na pakikipagsagutan sa 
	isang kasamang kampi sa mga may buhok. Idinaragdag pa ng ilan kataong 
	malumanay na iniuudyok sa Capitan General ng <span xml:lang="es" lang="es">
	Eminencia&nbsp;Negra</span> na gamitin ang mga intsik sa pagsugpo sa matibay na 
	karangalan ng mga taga rito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Upang maging 
	masunurin ang isang bayan--aniya--ay walang paraang gaya ng duhagihin at 
	ipakilala sa kanya ang sariling kaabaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Madaling 
	nagkaroon ng isang pagkakataon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	balangay ng mga <i>mestiso</i> at ng mga <i xml:lang="es" lang="es">
	naturales</i> ay nangagmamanmanan at ginagamit ang kanilang katapangan at 
	kasipagan sa paghihinala at di katiwalaan. Isang araw, sa misa, ang kapitan 
	sa <span xml:lang="es" lang="es">naturales</span> na nakaupo sa bangkong 
	nasa dakong kanan at lubhang payat, ay nakaisip na pagpatungin ang kanyang 
	mga paa, na anyong <i xml:lang="en" lang="en">nonchalant</i>, upang 
	lumakilaki sa wari ang kanyang mga pigi at maipamalas ang kanyang mainam na 
	sapatos. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang sa mestiso namang naluluklok sa kabilang ibayo, sa dahilang may
	<i xml:lang="es" lang="es">juanete</i> at hindi mapagpatong ang paa dahil sa 
	katabaan at buyunin ay umanyo namang ibinikaka ang kanyang mga hita upang 
	malantad ang tiyang nakukulong ng isang <i xml:lang="es" lang="es">chaleco</i> 
	na walang kakuton kuton na napapalamutihan ng isang magandang tanikalang 
	ginto at brillante. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang dalawang pangkatin ay nagkapakiramdaman at nagsimula 
	na ang paghahamok: sa sumunod na pagsisimba, ang lahat ng mestiso, pati ng 
	mga lalong payat, ay pawang may mga buyon at ibinikakang mabuti ang mga hita 
	na waring nangangabayo: lahat ng <span xml:lang="es" lang="es">naturales</span> 
	ay pinagpatong ang kanikanilang paa, sampu ng lalong matataba, kaya't may 
	kabisa tuloy na umarinkin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga intsik na nakakita sa kanila, ay gumamit 
	naman ng kanilang anyo: nangagsiupong gaya ng kung nasa sa kanilang 
	tindahan, ang isang paa'y baluktot at nakataas, ang isa'y nakabiting 
	kukuyakuyakoy. Nagkaroon ng mga tutulan, mga kasulatan, mga
	<i xml:lang="es" lang="es">expediente</i>, at <abbr>iba pa.</abbr> Ang mga 
	kuadrilyero ay matuling nangagsipanandata upang pasimulan ang paghahamok ng 
	magkakababayan, ang mga kura ay galak na galak, ang mga kastila'y 
	nasasayahan at ang lahat ng ito'y pinagkakakitaan ng salapi, hanggang sa 
	pinigil ng General ang kaguluhan sa pamagitan ng pag-uutos na sila'y 
	mangag-upuang kagaya ng intsik, sa dahilang ang mga ito'y siyang bumabayad 
	ng lalong malaki, kahit hindi siyang lalong katoliko. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At dito nangyari ang 
	kagipitan ng mga mestiso at <span xml:lang="es" lang="es">naturales</span>, 
	na, sa dahilang makikipot ang salawal ay hindi makagaya sa intsik. At upang 
	ang nasang duhagihin sila'y mabunyag, ay ginanap ang kautusan ng buong 
	karingalan at ginamitan ng mga sangkap, nilibid ang simbahan ng isang 
	pulutong na kabayuhan, samantalang ang lahat ng nasa loob ay pinapawisan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang usapin ay nakarating sa Espa&ntilde;a, ngunit doo'y naulit ding sa dahilang 
	ang nagbabayad ng lalong malaki ay ang mga intsik ay mangyayaring pairalin 
	ang kanilang ibigin sampu sa mga <i xml:lang="es" lang="es">ceremonias 
	religiosas</i>, kahit pagkatapos ay tumakwil sa pananampalataya at libakin 
	ang pagkakristiano. Nasiyahang loob ang mga <span xml:lang="es" lang="es">
	naturales</span> at mestiso at pinag-aralan nila ang hindi pag-aaksaya ng 
	panahon sa mga gayong bagay na walang kabuluhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sinuyosuyo ni 
	Quiroga si Simoun sa tulong ng kanyang haluang pananalita't ngiting 
	napakamakumbaba; ang kanyang tinig ay napakamahimok, paulit-ulit ang 
	kanyang yuko, ngunit pinutol ng mag-aalahas ang kanyang pangungusap at 
	itinanong sa kanyang bigla:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naibigan baga 
	ang mga galang?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa tanong na 
	ito'y napawing wariy pangarap ang sigla ng kalooban ni Quiroga; ang tinig 
	na dating mahimok ay naging mahinagpis, lalo pang nagpakayukoyuko at matapos 
	pinapagdoop ang mga kamay na itinaas na pantay mukha, anyong pagbati sa 
	kaintsikan, ay <span class="locked">dumaing ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Uu, sinyo 
	Simoun! akieng lugi, akieng hughog!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit, intsik 
	Quiroga, kayo'y lugi at hughog? at ganyang karami ang botella ng
	<i xml:lang="en" lang="en">champagne</i> at mga panauhin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinikit ni 
	Quiroga ang kanyang mga mata at ngumiwi. Hss! Ang nangyari ng hapong iyon, 
	ang naging hanggan ng mga galang, ay nakapaghughog sa kanya. Si Simoun ay 
	ngumiti: kapag ang isang mangangalakal na intsik ay dumadaing ay sapagka't 
	mabuti ang lagay; kapag ang ipinamalas ay waring mabuting mabuti ang kanyang 
	lakad ay sapagka't nakikinikinita ang isang pagkalugi o magtatanang tungo sa 
	kanyang bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kayo mo 
	hienne alam akieng lugi, akieng hughog? A, sinyo Simoun, akieng hapay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At upang 
	lalong maipabatid ng intsik ang kanyang kalagayan ay sinabayan ang salitang 
	hapay ng anyong pagpapatimbuwang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ibig ibig ni 
	Simoun na siya'y pagtawanan, ngunit nagpigil at sinabing wala siyang ano 
	mang nalalaman, wala, walang wala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dinala siya ni 
	Quiroga sa isang silid, na inilapat na mabuti ang pinto, at ipinaliwanag sa 
	kanya ang sanhi ng kasawian ng intsik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tatlong 
	galang na brillante na hiningi kay Simoun upang ipakita sa kanyang asawa, ay 
	hindi sadyang para rito, kaawaawang india na nakukulong sa isang silid, na 
	waring isang babaeng intsik, kundi para sa isang maganda at kaayaayang 
	babaeng kaibigan ng isang mataas na tao, na kailangan niya ang tulong, dahil 
	sa isang kalakal na pagtutubuan niya ng mga anim na libong piso. At sa 
	dahilang ang intsik ay walang kabatiran sa mga maiibigan ng babae at nasa 
	niyang magpakita ng gara, ay hiningi ang tatlong pinakamabuting galang na 
	mayroon ang mag-aalahas, na tatlo o apat na libo ang halaga ng bawa't isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang intsik ay 
	nag-anyong walang malay at sa tulong ng kanyang mahimok na ngiti ay sinabi 
	sa babaeng pumili ng maibigan; ngunit ang babae, lalong walang muwang at 
	lalo pa manding mahimok, ay nagpahayag na ibig niya ang tatlo, at kinuhang 
	lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	humalakhak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A, sinyolia! 
	akieng lugi, akieng hoghog!--ang sigaw ng intsik na sabay ang pagtatampal sa 
	sarili ng kanyang maliliit na kamay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Patuloy din 
	ang mag-aalahas sa katatawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huu! masama 
	tao, sigulo hienne tuto sinyola!--ang patuloy ng intsik na ginagalaw ang 
	ulong masama ang loob--Ano? bo hiya, kahi insiek sa akieng ako tao, A, sigulo 
	hienne tuto sinyola; kung sigalela belong pa konti hiya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nahuli kayo, 
	nahuli kayo--ang bulalas ni Simoun na sabay sa pagtumbok ng marahan sa tiyan 
	ng intsik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At lahat tao 
	hienge utang at hienne mayad ano iyan?--at binilang sa kanyang daliring may 
	mahahabang kuko--impelealo, opisia, tinienti, sunnalo, a, sinyo Simoun, 
	akieng talo, akieng hapay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, siya na 
	ang kadadaing--ang sabi ni Simoun--iniligtas ko kayo sa maraming opisyal na 
	humihingi sa inyo ng salapi.... Sila'y pinautang ko ng huwag na kayong 
	gambalain at batid kong hindi nila ako mababayaran......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nguni, sinyo 
	Simoun, kayo pautang sa opisia, ako pautang sa mamae, sinyola, malinelo, 
	lahat tao......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Masisingil 
	din ninyo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Akieng 
	makasingil? A, sigulo hienne po ikaw alam! Pagtalo sa suga wala na mayad! 
	Mamuti sa inyo melon konsu, maali habol, akieng wala....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si Simoun ay nagiisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan ninyo 
	intsik Quiroga,--ang sabing wariy natatanga--ako ang maniningil ng utang sa 
	inyo ng mga opisiyal at mga marinero, ibigay ninyo sa akin ang katibayan ng 
	pagkakatanggap nila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling 
	namighati si Quiroga; hindi siya binibigyan kailan man ng katibayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag 
	nangagsiparitong hihingi ng salapi, ay paparoonin ninyo sa akin; ibig kong 
	iligtas kayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napasalamat ng 
	lubos si Quiroga, ngunit nabalik na naman sa kanyang mga pagdaing, tinukoy 
	ang mga galang at inulit-ulit ang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung sigalela 
	belon pa hiya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Putris!--ang 
	sabi ni Simoun na tinitingnang pasulyap ang intsik na waring ibig hulaan ang 
	nasa kalooban--nangangailangan pa naman ako ng salapi at inaakala kong 
	mababayaran ninyo ako. Ngunit ang lahat ay may kagamutan, ayaw kong mahapay 
	kayo ng dahil lamang sa walang kabuluhang bagay na iyan. Siya, isang utang 
	na loob at gagawin kong pito ang siyam na libong utang ninyo sa akin. Kayo'y 
	nakapagpapasok sa aduana ng lahat ng lampara, mga bakal, mga pinggan, tanso, 
	mga pisong mehikano; nagbibigay kayo ng armas sa mga kombento?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napaoo ang 
	intsik sa tulong ng tango; ngunit kailangan niyang sumuhol sa maraming tao.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lahat akieng 
	bigay sa Pale!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	tingnan ninyo--ang marahang patuloy ni Simoun--kailangan kong ipapasok ninyo 
	ang ilang kaha ng pusil na dumating ngayong gabi.... ibig kong itago ninyo 
	sa inyong tindahan; hindi magkakasiyang lahat sa aking bahay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Quiroga'y 
	nagulumihanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	masindak, hindi kayo maaano: ang mga baril na iyan ay unti unting itatago sa 
	ilang bahay, at pagkatapos ay gagawa ng pagsisiyasat at marami ang 
	ibinibilanggo.... marami tayong kikitain sa paglakad na makawala ang mga 
	napipiit. Batid na ninyo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Quiroga ay 
	alinlangan; takot siya sa mga armas. Sa kanyang mesa ay mayroon siyang isang 
	rebolber na walang punlo na hindi niya hinihipo kailan man kundi lilingon 
	munang nakapikit ang mata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung hindi 
	ninyo magagawa ay hahanap ako ng iba, ngunit kailangan ko kung gayon ang 
	aking siyam na libong piso upang padulasin ang mga kamay at ipikit ang mga 
	mata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, 
	siya!--ang sa huliy sabi ni Quiroga--ngunit huli ba malami tao? utos
	<span class="locked">lekisa, ha?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang bumalik 
	sa kabahayan si Quiroga at si Simoun ay natagpuan ang mga galing sa paghapon 
	na nangagtatalo: pinatabil ng <i xml:lang="en" lang="en">champagne</i> ang 
	mga dila at nagpapagalaw sa mga utak ng ulo. Nangag-uusapang walang 
	kakimikimi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa isang 
	pulutong na may maraming kawani, ilang babae at si Don Custodio, 
	ay pinag-uusapan ang isang pasugo sa India upang pag-aralan ang ukol sa 
	paggawa ng mga sapatos ng mga sundalo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sinosino 
	ang bumubuo?--ang tanong ng isang babaeng malaki.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	koronel, dalawang opisyal at ang pamangkin ng General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Apat?--ang 
	tanong ng isang kawani--ganyan na lamang ang lupon! at kung magkahati sa 
	kapasiyahan? may pagkabatid man lamang kaya sa bagay na iyon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan nga ang 
	tanong ko--ang dugtong ng isa--ang sabi ko'y dapat pumaroon ang isang hindi 
	kawal sa hukbo, isang walang hilig sa pagkamilitar.... sa halimbawa, isang 
	manggagawa ng sapatos.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan nga--ang 
	sagot ng isang manghahango ng sapatos--ngunit sa dahilang hindi bagay na 
	magpadala ng isang indio ni ng isang makaw at ang tanging magsasapatos na 
	kastila ay humihingi ng malaking sahod....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapuwa'y 
	ano pa't pag-aralan ang sapin sa paa?--ang tanong ng isang babaeng malaki--marahil ay hindi iuukol sa mga artillerong kastila! Ang mga indio ay 
	maaring walang sapatos gaya nang kung nasa kanilang bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siyang dapat 
	at ang kabang bayan ay lalong makapag-titipid!--ang dugtong ng isang se&ntilde;orang 
	balo na hindi nasisiyahan sa kanyang sinasahod na <i xml:lang="es" lang="es">
	pension</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	unawain naman ninyo--ang sagot ng isa sa mga kaharap, na kaibigan ng mga 
	opisial na magsisiyasat--tunay ngang ang maraming indio ay walang sapin kung 
	lumakad sa kanilang bayan, ngunit hindi ang lahat, at hindi magkaisa ang 
	lumakad nang alinsunod sa sariling kaibigan kay sa nasa paglilinkod: hindi 
	napipili ang oras, ni ang daraanan, ni hindi nakapagpapahinga kung kailan 
	ibigin. Tingnan ninyo, ali, na kung katanghalian ay nakaluluto ng tinapay 
	ang init ng lupa. At maglakad pa kayo sa buhanginan, doon sa may mga bato, 
	araw sa itaas at apoy sa ibaba, at punglo sa harap....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa sanayan 
	din lamang iyan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya ng hayop 
	na burro na nasanay sa hindi pagkain! Sa kasalukuyang labanan, ang lalong 
	marami sa nasasawi sa atin ay gawa ng mga sugat sa talampakan.... Inuulit ko 
	ang sa <i xml:lang="es" lang="es">burro</i>, ali, ang sa
	<i xml:lang="es" lang="es">burro</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit anak 
	ko--ang tutol ng babai--isip-isipin ninyong napakaraming salaping magugugol sa 
	katad. Sukat nang maibuhay sa maraming ulila't balo upang mapagtibay ang 
	karangalan. At huwag kayong ngumiti, hindi ko sinasabi nang dahil sa akin na 
	mayroon naman akong pension, kahit kakaunti, lubhang kaunti sa mga 
	ipinaglinkod ng aking asawa, tinutukoy ko ang iba na may napakamaralitang 
	kabuhayan ngayon: hindi nararapat na matapos ang maraming kahihingi upang 
	maparito at matapos na makapaglakbay dagat ay maging katapusan ang mamatay 
	dito ng gutom.... Ang sinasabi ninyong ukol sa mga sundalo ay totoo marahil, 
	ngunit ang katunayan ay kahit mahigit na akong tatlong taon dito ay hindi 
	pa ako nakakikita ng pipilaypilay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa bagay na 
	iyan ay kasang-ayon ako ng aling kuan--ang sabi ng isang babaeng kalapit--ano 
	pa't bibigyan ng sapatos sa wala naman silang sapatos ng sumipot sa 
	maliwanag?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano pa ang 
	kailangan ng baro?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano pa ang 
	kailangan ng salawal?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isipisipin 
	ninyo ang mapapala natin sa pagkakaroon ng isang hukbong hubo't hubad!--ang 
	tapos ng nagtatanggol sa mga sundalo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa isang 
	pulutong ay lalong mainit ang pagtatalo. Si Ben-Zayb ay nagsasalita't 
	nananalumpati, gaya ng datiy hinahadlangan siya sa bawa't sandali ni Padre &nbsp;Camorra. Ang manunulat na prayle, kahit niya iginagalang na lubha 
	ang mga taong may satsat, ay palaging nakikipagtalo kay Padre Camorra 
	na inaari niyang isang praylepraylihang mangmang; sa gayo'y ginagamit ng 
	anyong malaya at dinudurog ang mga sabisabihan ng mga tumatawag sa kanyang
	<span xml:lang="es" lang="es">Fray&nbsp;Iba&ntilde;ez</span>. Kinalulugdan ni Padre &nbsp;Camorra 
	ang kanyang katunggali; iyon lamang ang tanging nagpapalagay na may 
	katuturan ang kanyang mga tinatawag na pangangatwiran niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pinag-uusapan ay ang ukol sa <i>magnetismo</i>, <i>espiritismo</i>,
	<span xml:lang="es" lang="es">magia</span> at <abbr>iba </abbr>pa, at ang mga 
	salita'y sumasahimpapawid na gaya ng mga sundang at bola ng mga 
	salamangkero: sila ang naghahagis at sila rin ang sumasalo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang taong 
	iyon ay pinagkakaguluhan sa peria sa Kiyapo ang isang ulo na di bagay sa 
	tawag na <i xml:lang="es" lang="es">esfinge</i>, na itinatanghal ni
	<span xml:lang="en" lang="en"><abbr title="Mister">Mr.</abbr>&nbsp;Leeds</span>, 
	isang amerikano. Malalaking pabalita na makababalaghan at nakapangingilabot 
	na nakaaakit sa panonood ang nangakadikit sa pader ng mga bahay. Ni si 
	Ben-Zayb, ni si Padre Camorra, ni si Padre Irene, ni si
	Padre Salvi ay hindi pa nakakikita sa ulong yaon; si Juanito 
	Pelaez ang tanging nakakita isang gabi, at siyang nagbabalita ng kanyang 
	pagkahanga sa mga magkakalipon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Ben-Zayb, 
	dahil sa kanyang pagkamamamahayag, ay nagpupumilit na makatuklas ng 
	kalinawan; binabanggit ni Padre Camorra ang diablo; si Padre &nbsp;Irene 
	ay ngumingiti; si Padre Salvi ay walang kaimik-imik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit, 
	Padre, sa hindi na pumaparito ang diablo; tayo sa ating sarili ay sukat na 
	upang magkasala....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung hindi 
	gayon ay hindi makukuro....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung ang 
	karunungan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ulit na naman 
	ang karunungan! <i xml:lang="es" lang="es">pu&ntilde;ales!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	makingig kayo, aking ihahayag. Ang lahat ay alinsunod lamang sa paningin. 
	Hindi ko pa nakikita ang ulo, ni hindi ko batid kung papano itinatanghal. 
	Anang ginoo--itinuro si Juanito Pelaez--ay hindi kagaya ng mga ulong 
	nagsasalita na karaniwang itinatanghal--kahit na! Ngunit ang sanhi ay yaon 
	din; lahat ay dahil lamang sa paningin; hintay kayo, ilalagay na paganito 
	ang isang salamin, ang isa pa'y sa likuran, ang malalarawan ay matatanaw... 
	ano, isa lamang suliranin ng Pisika.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ibinaba sa 
	kinalalagyan ang isang salamin, iniayos, ikiniling at sa dahilang hindi niya 
	mapalabas ang kalinawan ay tinatapos sa wikang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya ng sabi 
	ko, walang pinagibhan sa isang pagsira lamang ng paningin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit anong 
	salamin ang ibig pa ninyo, sa sinabi sa atin ni Juanito na ang ulo ay nasa 
	loob ng isang kaha, na ipinapatong sa isang mesa.... Nakikinikinita ko sa 
	bagay na iyan ang espiritismo, sapagka't kailan man ay gumagamit ng mesa ang 
	mga espiritista, at sa akala ko'y sapagka't <i xml:lang="es" lang="es">
	gobernador eclesiastico</i> si Padre Salvi ay dapat niyang 
	ipagbawal ang pagtatanghal.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Salvi ay walang kasalisalita; hindi sumasagot ng oo ni hindi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Upang 
	maalaman kung may diablo o espiritu sa loob--ang sabi ni Simoun--ang mabutiy 
	paroonan ninyo't tingnan ang bantog na ulong iyan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang palagay ay 
	minabuti at tinanggap, ngunit si Padre Salvi at si Don Custodio 
	ay nagpakita ng kaunting nganingani. Sila ay maparoon sa isang peria, 
	makipagsiksikan sa mga tao at manood ng mga <i xml:lang="es" lang="es">
	esfinge</i> at mga ulong nangungusap! Ano na lamang ang wiwikain ng mga 
	indio? Ariin silang tao na may hilig at kahinaan ding taglay ng iba. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa gayon, si Ben-Zayb, akay ng kanyang pagkamamamahayag ay nangakong 
	ipamamanhik kay <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span> 
	na huwag magpapasok ng manonood samantalang sila'y nasa sa loob: 
	napakalaking karangalan ang ibibigay nila sa kanilang pagdalaw upang huwag 
	sumangayon, at saka hindi pa sila hihingan ng upa sa pagpasok. At upang 
	mapangatwiranan ni Ben-Zayb ang sinabi, <span class="locked">anya ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	akalain na lamang ninyo! Kung mahuli ko ang daya sa harap ng mga nanonood na 
	indio! Aalisan ko ng kakanin ang kaawaawang amerikano!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si Ben-Zayb ay isang taong malingap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May labing 
	dalawa ang pumanaog, na kabilang ang ating mga kilalang si Don Custodio, 
	si Padre Salvi, si Padre Camorra, si Padre Irene, 
	si Ben-Zayb at si Juanito Pelaez. Inihatid sila ng kanilang mga sasakyan sa 
	pagpasok sa liwasan ng Kiyapo.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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
																	<a href="../noli/t-noli-toc.php">
																	<font color="#800080">
																	<a href="t-fili-toc.php">Bumalik sa 
																	Nilalaman ng 
																	El 
																	Filibusterismo</a></font></a></font></p>
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