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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXI. Ang Mataas na Kawani</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<div class="epigraph-poem">
		&nbsp;</div>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	pamahayagan sa Maynila ay nangalululong sa pagsasalaysay ng ukol sa isang 
	nabunyag na patayang nangyari sa Europa, sa mga pagpupuri at pagbibigay 
	karangalan sa ilang <i xml:lang="es" lang="es">predicador</i> sa Maynila, sa 
	lalo't lalo pang masigabong pagtatatagumpay ng operetang pranses, kaya 
	babahagya nang makapaglaan ng gayon o ganitong balitang ukol sa mga 
	katampalasanang ginagawa sa mga lalalawigan ng isang pulutong ng tulisan na 
	pinangunguluhan ng isang pinunong mabangis at ganid na nagpapamagat na <i>
	Matanglawin</i>. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tangi lamang, kung ang nilolooban ay isang kombento o isang 
	kastila, ay saka lumalabas ang mahahabang salaysay na nagsisiwalat ng mga 
	kakilakilabot na pangyayari at hinihingi ang <i xml:lang="es" lang="es">
	estado de sitio</i>, mga matitinding panupil, <abbr>ibp.</abbr> Kaya't hindi 
	rin naatupag ang nangyari sa bayan ng Tiani, ni hindi man nagkaroon ng isa 
	mang banggit ni isang alingawngaw. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa mga lipunang tangi ay may kaunting 
	bulungbulungan, ngunit napakalabo, napakamahina, napaka walang katibayan na 
	hindi man lamang nabatid ang pangalan ng nasawi, at yaong mga nagpakita ng 
	malaking nasang makaalam ay madaling nakalimot, na naniwalang nagkaroon nang 
	kasunduan sa kaanak o mga kamag-anak na may galit. Ang tanging tiyak na 
	napag-alaman ay ang pag-alis sa bayang iyon ni Padre Camorra upang 
	lumipat sa iba o manirahan ng kaunting panahon sa kombento sa Maynila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaawang
	Padre Camorra!--ang bulalas ni Ben-Zayb na nagwaring 
	mahabagin,--gayong kasaya, gayong kabuting puso!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga na 
	ang mga nag-aaral ay nangakalaya sa kalalakad ng kanilang mga kamag-anak, na 
	hindi tiningnan ang magugugol, mga handog at mga paghihirap. Ang una unang 
	nakalaya, gaya ng maaantay, ay si Makaraig, at ang huliy si Isagani, 
	sapagka't si Padre Florentino ay hindi nakarating sa Maynila kung 
	di nang makaraan muna ang isang linggo sapol ng mangyari ang mga bagaybagay. 
	Ang gayong karaming pagkahabag ay naging sanhi upang bigyan ang General ng 
	palayaw na mahabagin at maawain na dalidaling idinagdag ni Ben-Zayb sa 
	mahabang kabilangan ng kanyang mga palayaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tanging 
	hindi nakalaya ay si Basilio, na nasasakdal pa sa kasalanang pagkakaroon ng 
	mga aklat na bawal. Hindi namin malaman kung ang sinasabi nila'y ang aklat 
	na <i xml:lang="es" lang="es">Medicina Legal y Toxicologia</i> ni <abbr>Dr.</abbr>&nbsp;Mata 
	o ang ilang pahayagan na ukol sa mga bagay bagay sa Pilipinas na natagpuan 
	sa kanya, o magkasama na ang dalawang bagay na iyon; ngunit sinasabi rin 
	naman na nagbibiling palihim ng mga aklat na bawal at napataw sa kaawaawang 
	binata ang buong bigat ng timbangan ng katwiran.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May 
	nagbalitang sinabi sa General:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kailangan na 
	magkaroon ng isa upang maligtas ang karangalan ng kapangyarihan at huwag 
	masabing tayo'y nag-ingay nang katakot-takot ng wala namang sanhi. Una muna 
	sa lahat ang kapangyarihan. Kailangang may matira!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iisa na 
	lamang ang natitira, isa na, alinsunod kay Padre Irene ay, naging 
	alila ni Kapitan&nbsp;Tiago.... Walang naghahabol sa kanya....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alila at 
	nag-aaral?--ang tanong ng General:--kung gayon ay iyan, matira, iyan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Maipahintulot 
	po sa akin ng inyong Karilagan--ang sabi ng mataas na kawani na nagkataong 
	kaharap;--ngunit may nagsabi sa akin na ang binatang iyan ay nag-aaral sa 
	Medicina, ang kanyang mga guro'y mabuti ang sinasabing ukol sa kanya.... 
	kung magpapatuloy sa pagkabilanggo ay masasayangan ng isang taon, at sa 
	dahilang sa taong ito magtatapos....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pamamagitna ng mataas na kawani na ayon kay Basilio, sa lugar na makabuti 
	dito, ay nakasama pa. Malaon nang ang kawani at ang General ay 
	nagkakabigatan, may samaan ng loob, na naragdagan ng mga salisalitaan. Ang 
	General ay ngumiti at sumagot:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga ba? 
	Kung gayo'y lalo pa ngang dapat na magpatuloy sa pagkakabilanggo; isang taon 
	pang pag-aaral, sa lugar na makasasama, ay makabubuti sa kanya, sa kanya at 
	sa lahat ng mahuhulog pagkatapos sa kanyang mga kamay. Dahil sa maraming 
	pagsasanay ay hindi magiging masamang manggagamot ang isang tao. Isa pa 
	ngang katwiran upang matira! At pagkatapos ay sasabihin ng mga mapagbagong 
	pilibustero na hindi namin inaalagata ang bayan!--ang dagdag ng General na 
	tumatawang paaglahi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakilala ng 
	mataas na kawani ang kanyang kamalian at pinangatawanan na ang usap ni 
	Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y sa 
	ganang akin ay inaakala kong ang binatang iyan ay siyang lalong walang 
	kakasakasalanan sa lahat,--ang tugon na may kaunting katakutan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nahulihan 
	siya ng mga aklat,--ang sagot ng kalihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, mga aklat 
	sa panggagamot at mga pahayagang sinulat ng mga taga Espa&ntilde;a.... na hindi pa 
	nagugupit ang mga dahon.... at ano ang ibig sabihin nito? At saka, ang 
	binatang iyan ay wala sa piging na idinaos sa magpapansit, ni hindi 
	nakihimasok sa anuman.... Gaya ng sinabi ko, siya ang lalong walang 
	kakasakasalanan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lalo't lalo 
	pa ngang mabuti!--ang masayang bulalas ng General;--sa gayong paraan, ang 
	parusa, ay magiging lalong malunas at katangitangi sapagka't makasisindak 
	pang lalo! Mamahala ay ang umasal ng ganyan, ginoo; madalas na kailangang 
	ipailalim ang ikabubuti ng isa sa ikabubuti ng marami.... Datapwa'y higit pa 
	sa roon ang ginagawa ko: sa ikabubuti ng isa, kinukuha ko ang ikabubuti ng 
	lahat, inaliligtas ko ang tibay ng kapangyarihan na napapanganib, ang 
	karangalan ay naigagalang at tumatatag. Sa ginawa kong ito ay naaayos ko ang 
	mga kamalian ng mga tagarito't ng mga hindi tagarito!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gumamit ng 
	malaking lakas ang mataas na kawani upang makapagpigil, hindi pinuna ang mga 
	parunggit, at nagtangkang humanap ng ibang paraan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit hindi 
	po ba ninyo kinatatakutan ang kapanagutan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	ikatatakot ko?--ang pakling nayayamot ng General;--hindi ba mayroon akong 
	kapangyarihang magagamit ng alinsunod sa sariling kapasiyahan? hindi ko ba 
	magagawa ang maibigan sa ikabubuti ng pamamahala sa kapuluang ito? Ano ang 
	ikatatakot ko? Maaari bagang ipagsakdal ako sa mga hukuman ng isang alila at 
	ako'y hingan ng kapanagutan? Ba! At kahit na mayroon siyang magagamit na 
	kaparaanan ay dadaan muna sa Ministerio, at ang Ministro....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinumpay ang 
	kamay at nagtawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	Ministrong naghalal sa akin, ay ang diablo lamang ang nakaaalam kung saan na 
	naroroon, at aariin na niyang malaking karangalan ang ako'y kanyang mabati 
	sa aking pagbalik! Ang kasalukuyan, iyan ay pararaanin ko sa.... at dadalhin 
	din iyan ng diablo.... Ang hahalili diyan ay malilito sa bago niyang 
	tungkulin na hindi makukuhang pumuna ng mga mumunting bagay. Ako, ginoo, 
	wala akong anuman kundi ang budhi ko lamang, gumagawa ako ng alinsunod sa 
	aking budhi, ang budhi ko ay nasisiyahan, at walang kakabukabuluhan sa akin 
	ang haka ni ganoon o ni ganito. Ang aking budhi, ginoo, ang aking budhi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Opo, aking 
	General, ngunit ang bayan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tu, tu, tu, 
	tu! Ang bayan, ano ang mayroon sa akin ng bayan? Nagkaroon baga ako ng 
	pakikipagkasunduan sa kanya? Utang ko ba sa kanya ang aking katungkulan? 
	Siya ba ang naghalal sa akin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagkaroon ng 
	munting pananahimik. Ang mataas na kawaniy nakatungo. Pagkatapos, waring 
	may tinangka nang gawin, ay tumingala, tinitigan ang General at, namumutlang 
	nanginginig ng kaunti, ay nagsabing pigil ang katigasan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	kailangan, aking General, walang kailangan iyan! Kayo'y hindi inihalal ng 
	bayang pilipino kundi ng Espa&ntilde;a, katwiran pa nga upang pagpakitaan ninyo ng 
	mabuti ang mga pilipino upang walang maisisi sa Espa&ntilde;a! Katwiran pa nga, 
	aking General! Sa pagparito ninyo ay nangakong ilalagay sa katwiran ang 
	pamamahala, hahanapin ang kabutihan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At hindi ko 
	ba ginagawa?--ang tanong na pabugnot ng General na humakbang,--hindi ko ba 
	sinabi sa inyo na kinukuha ko sa ikabubuti ng isa ang ikabubuti ng lahat? 
	Tuturuan pa ba ninyo ako ngayon? Kung hindi ninyo maliwanagan ang aking mga 
	gawa ano ang kasalanan ko? Pinipilit ko ba kayong makihati sa aking 
	kapanagutan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	nga!--ang pakli ng mataas na kawani na tumuwid ng may halong 
	pagkamataas.--Hindi ninyo ako pinipilit, hindi ninyo <em>ako</em> mapipilit 
	na makihati sa <em>inyong</em> kapanagutan! Iba ang pagkakilala ko sa aking 
	sariling kapanagutan, at sapagka't ako'y mayroon din naman, ay magsasalita 
	ako, yamang hindi ako umimik ng mahabang panahon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Oh huwag iayos ng inyong 
	karangalan ang mga ganyang anyo, sapagka't ang pagkaparito ko, na gayon o 
	ganito ang katungkulan, ay hindi ang pagtakwil ko na sa aking mga karapatan 
	ang ibig sabihin at manira na lamang ako sa pagiging alipin, na walang bibig 
	ni karangalan! Hindi ko ibig na mawalay sa Espa&ntilde;a ang magandang lupaing ito, 
	iyang walong angaw na sakop na masunurin at mapagtiis na nabubuhay sa mga 
	pag-asa at pagkakilala ng mga pagkakamali, ngunit hindi ko rin naman ibig 
	na dungisan ang aking mga kamay sa ganid na pangangalakal sa kanya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ayokong 
	masabi kailan man, na matapos lumipas ang pagbibili ng tao, ay ipinatuloy ng 
	lalo pang malusog ng Espa&ntilde;a, na kinakanlungan ng kanyang bandila, at lalo 
	pang iniayos sa ilalim ng maraming magagarang kapasiyahan. Hindi, upang ang 
	Espa&ntilde;a ay maging malaki ay hindi niya kailangan ang maging maniniil; sukat 
	na ang Espa&ntilde;a sa kanyang sarili, lalo pang malaki ang Espa&ntilde;a noong walang 
	ari kundi ang sarili niyang lupain na naagaw sa kuko ng moro! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ako ma'y 
	kastila rin, ngunit bago ang aking pagkakastila ay naroroon ang aking 
	pagkatao at bago ang Espa&ntilde;a at sa ibabaw ng Espa&ntilde;a ay naroroon ang kanyang 
	karangalan, naroroon ang matataas na turo ng magandang aral, ang mga walang 
	lipas na batayan ng di mababaling katwiran. Ah! namamangha kayo na ako'y 
	mag-isip ng gayon, sapagka't hindi ninyo nauunawa ang kalakhan ng pangalang 
	kastila, hindi ninyo kilala, hindi. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ikinakapit ninyo sa mga tao, sa mga 
	pag-aari; sa ganang inyo, ang kastila, ay mangyayaring maging mangdadambong, 
	mangyayaring maging mamamatay, mapagbalatkayo, bulaan, lahat na, matanganan 
	lamang ang kanyang inaari; sa ganang akin, ang kastila, ay dapat na iwan ang 
	lahat, ang sakop, ang kapangyarihan, ang kayamanan, ang lahat na, lahat bago 
	ang karangalan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											A, aking ginoo! Tayo'y tumututol kung nababasa nating ang 
	lakas ay napapaibabaw sa katwiran, at pinapupurihan natin kung sa pag-gawa 
	ay nakikita nating siya'y balatkayo na hindi lamang inililiko kundi 
	ipinaiilalim sa inyong kapasiyahan upang kayo'y makapangyari.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa dahilan 
	ngang iniibig ko ang Espa&ntilde;a, ay nagsasalita ako dito at hindi ko 
	pinanganganiban ang pangungunot ng inyong noo! Ayokong sa mga darating na 
	panahon ay masabing siya'y inainahan ng mga bansa, manghihitit ng mga bayan, 
	maniniil ng maliliit na pulo, sapagka't ang gayo'y kakilakilabot na lait sa 
	mga mararangal na adhika ng ating mga unang hari! Papano ang ginagawa nating 
	pagtupad sa kanilang mga banal na habilin? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pinangakuan nila ang mga pulong 
	ito ng pag-aampon at matuwid, at pinaglalaruan natin ang mga buhay at 
	kalayaan ng kanyang mamamayan; pinangakuan nila ng kabihasnan, at 
	pinagkakaitan natin, sa katakutang magnasa ng isang lalong marangal na 
	kabuhayan; pinangakuan sila ng liwanag, at binubulag natin ang kanilang mga 
	mata upang huwag makita ang ating mga kalaswaan; pinangakuang tuturuan sila 
	ng mga kabaitan at pinaaayuan natin ang kanilang masasamang hilig at, sa 
											lugar ng kapayapaan at ng katuwiran, ang naghahari ay ang pag-aalinlangan, 
	ang kalakal ay namamatay at ang di pananalig ay lumalaganap sa taong bayan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lumagay tayo sa lagay ng mga pilipino at itanong natin sa sarili kung ano 
	ang ating gagawin kung tayo ang nasa gayong kalagayan! Ay, sa inyong hindi 
	pag-imik ay nababasa ko ang inyong karapatan sa panghihimagsik, at kung ang 
	mga bagaybagay ay hindi bubuti ay mangaghihimagsik balang araw at ang 
	katuwiran ay malalagay sa kanilang panig at kasama pa ang paglingap ng lahat 
	ng taong may puri, ng lahat ng bayani sa sangsinukob! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kapag ipinagkakait sa 
	isang bayan ang liwanag, ang tahanan, ang kalayaan, ang katwiran, mga 
	biyayang kung wala ay hindi maaring mabuhay at dahil nga doo'y sila ang 
	taglayin ng tao, ang bayang iyan ay may karapatang ariin, ang sa kanya'y 
	nag-aalis ng mga gayon, na waring isang magnanakaw na humaharang sa atin sa 
	daan: walang kabuluhan ang pagtatangi, wala kundi iisang pangyayari, isang 
	pag-aari, isang pagtatangka, at ang sino mang taong may kapurihan na hindi 
	kumampi sa hinalay, ay nakikitulong at dinudungisan ang sariling budhi. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Oo, 
	hindi ako militar, at pinapatay ng kagulangan ang kaunting sulak ng aking 
	dugo; ngunit gaya rin naman ng pangyayari na ipagugutay ko ang aking 
	katawan sa pagtatanggol sa katibayan ng Espa&ntilde;a na laban sa isang mananalakay 
	na taga ibang lupa o laban sa mga walang katwirang paggalaw ng kanyang mga 
	lalawigan, gayon din namang pinatutunayan ko sa inyo na makikipiling ako sa 
	mga pilipinong sinisiil, sapagka't nasa ko pa ang mamatay nang dahil sa mga 
	niyuyurakang karapatan, ng sangkatauhan, kay sa magtagumpay sa piling ng mga 
	hangaring ikagagaling ng isang bansa, kahit na ang bansang ito'y may 
	pangalang kagaya ng pangalan ng Espa&ntilde;a!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam baga 
	ninyo kung kailan aalis ang <i xml:lang="es" lang="es">correo</i>?--ang 
	malamig na tanong ng General ng matapos nang makapagsalita ang mataas na 
	kawani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinitigan 
	siyang mabuti ng mataas na kawani, pagkatapos ay ibinaba ang ulo at iniwang 
	walang imik ang palasyo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa halamanan 
	natagpuan ang kanyang sasakyang nag-aantay sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kapag balang 
	araw ay nakapagsarili na kayo,--ang sabing natutubigan sa indiong
	<i xml:lang="es" lang="es">lacayo</i> na nagbukas ng pintuan ng sasakyan,--ay 
	alalahanin ninyo na sa Espa&ntilde;a ay hindi nagkulang ng mga pusong tumibok ng 
	dahil sa inyo at nakitunggali ng dahil sa inyong mga karapatan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Saan po?--ang 
	sagot ng <i xml:lang="es" lang="es">lacayo</i> na hindi siya napakinggang 
	mabuti at itinatanong kung saan sila paparoon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makaraan ang 
	dalawang oras, ay iniharap ng mataas na kawani ang kanyang pagbibitiw sa 
	katungkulan at ipinababatid ang kanyang pagbalik sa Espa&ntilde;a sa unang korreong 
	aalis.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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