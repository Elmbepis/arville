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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XIV. Si Tasyo, ang Baliw o ang Pilosopo</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Naglalakad sa mga lansangang walang 
tinutungo't walang iniisip ang kakaibang matandang lalaki.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-aral siya nang una ng Filosofia, at 
iniwan niya ang pag-aaral sa pagsunod sa kanyang inang matanda na; at hindi niya 
ipinagpatuloy ang pag-aaral, hindi sa kakulangan ng magugugol at hindi rin sa kakulangan ng 
kaya ng pag-iisip: tumigil siya ng pag-aaral, dahilan nga sapagka't mayaman ang kanyang ina, at dahilan sa ayon sa sabiha'y matalas ang 
kanyang isip. Natatakot ang mabait na babaeng maging pantas ang kanyang anak at 
makalimot sa Diyos, kaya nga't siya'y pinapamili, sa siya'y magpari o iwan niya 
ang kolegio ng San Jose. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nang panahon pa namang iyo'y siya'y may naiibigang 
babae, kaya't pinili niya ang iwan ang kolegio at nag-asawa siya. Hindi lumampas 
ang isang taon at siya'y nabao at naulila; ginawa niyang aliwan ang mga libro 
upang siya'y makaligtas sa kalungkutan, sa sabong at sa pagka walang ginagawa. 
Datapuwa't lubhang nawili sa mga pag aaral at sa pamimili ng mga libro, 
hanggang sa mapabayaan niya ang sariling pamumuhay, kaya't siya'y unti-unting 
naghirap.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tinatawag siyang Don Anastasio o 
Pilosopo Tasyo ng mga taong may pinagaralan, at ang mga masasama ang turo, na siyang 
lalong marami, tinatawag siyang Tasiong ul-ol, dahil sa hindi karaniwang kanyang 
mga kaisipan at kakaibang pakikipagkapwa-tao.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ayon sa sinabi na namin, ang hapo'y 
nagbabalang magka unos; liniliwanagan ang abo abong langit ng ilang kidlat; 
mabigat ang alang-alang at totoong maalis-is ang hangin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Wari'y nalimutan na ng 
Pilosopo Tasyo ang 
kanyang kinalulugdang bungo ng ulo; ngayo'y ngumingiting pinagmamasdan ang 
maiitim na panganurin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa malapit sa simbaha'y 
nasalubong niya ang isang taong naka khaqueta ng alpaka at daladala sa kamay 
ang may mahigit na isang arrobang kandila at isang bastong may borlas, bilang 
sagisag ng punong may kapangyarihan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tila po kayo'y natotowa?--ang tanong nito 
sa wikang tagalog.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siya nga po, ginoong kapitan; natotowa 
ako sapagka't may isa akong inaasahan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ha? at alin ang inyong inaasahang iyan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang unos!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang unos! Nag-aakala ba kayong 
maligo?--ang tanong ng gobernadorcillo ng palibak, na minamasdan ang dukhang 
pananamit ng matandang lalaki.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Maligo ako ... hindi masama, lalong lalo 
na pagka nakatitisod ng isang dumi!--ang sagot ni Tasio, na palibak din naman 
ang anyo ng pananalita, bagaman may pagka pagpapawalang halaga sa kanyang 
kausap--nguni't naghihintay ako ng lalong magaling.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano po ba iyon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ilang mga lintik na pumatay ng mga tao 
at sumunog ng mga bahay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hingin na ninyong 
paminsanan ang gunaw!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nararapat tayong lahat, kayo at akong 
gunawin! Dala po ninyo riyan, ginoong kapitan, ang isang arrobang kandilang 
galing sa tindahan ng intsik; may mahigit ng sampung taong aking ipinakikiusap 
sa bawa't bagong kapitang bumibili ng pararrayos, 
at pinagtatawanan ako ng lahat; gayon ma'y bumibili ng mga 'bomba' at mga 'kohete', at nangagbabayad ng mga repique ng mga 
kampana. Hindi lamang ito: 
kinabukasan ng pakikiusap ko sa inyo, nagbilin po kayo sa mga magtutunaw na 
intsik ng isang 'esquilang' alay kay Santa Barbara, gayong nasiyasat na 
ng 
karunungang mapanganib ang tumugtog ng mga kampana sa mga araw na may unos. 
At sabihin po ninyo sa akin, bakit po ba ng taong 70 ng mahulog ang isang lintik sa Binyang, doon pa naman nahulog sa 
kampanario at iginiba ang reloj 
saka isang altar? Ano ang ginagawa ng esquilita ni Santa Barbara?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang sandaling iyo'y kumislap ang isang kidlat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Jesus, Maria y Jose! Santa Barbarang 
mahal!--ang ibinulong ng kapitang namutla at nagkruz.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Humalakhak si Tasio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kayo'y karapatdapat sa pangalan ng 
inyong pintakasi!--ani Tasio sa wikang kastila, tinalikdan ang kapitan at 
tumungo sa simbahan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagtatayo ang mga sakristan sa loob ng 
simbahan ng isang 'tumulo' 
na nalilibot ng mga malalaking kandilang natitirik sa mga kandelabrong kahoy. 
Ang tumulong yao'y dalawang mesang malalaking pinagpatong at natatakpan ng 
damit na maitim, na may mga listong puti; sa magkabikabila'y may napipintang 
mga bungo ng ulo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Iyan ba'y patungkol sa mga kaluluwa o 
sa mga kandila?--ang itinanong.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At ng makita niya ang dalawang batang 
lalaking may sampung taon ang isa at ang isa'y may malapit sa pito, lumapit sa 
kanilang hindi na hinantay ang sagot ng mga sakristan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sasama ba kayo sa akin, mga bata?--ang 
itinanong sa kanila. May handa sa inyo ang inyong nanay na isang hapunang 
marapat sa mga kura.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aayaw po kaming paalisin ng sakristan 
mayor hanggang hindi tumutugtog ang ikawalong horas--ang sagot ng 
pinakamatanda.--Hinihintay ko pong masingil ang aking 'sueldo' upang maibigay ko 
sa aking ina.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah! at saan ba kayo paparoon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa kampanario po upang dumublas sa mga 
kaluluwa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pasasakampanario kayo? kung gayo'y 
kayo'y mag-ingat! Huwag kayong lalapit sa mga kampana hanggang umuunos!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umalis sa simbahan, pagkatapos na masundan 
ng isang titig na may habag ang dalawang batang pumapanhik sa mga hagdanang 
patungo sa koro.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kinuskos ni Tasio ang mga mata, tumingin 
uli sa langit at bumulong: --ngayo'y daramdamin kong mahulog ang mga lintik.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At nakatungong pumaroon sa labas ng 
bayang nag-iisip-isip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dumaan po muna kayo!--ang sabi sa kanya sa 
wikang kastila ng isang matimyas na boses mula sa isang bintana.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumunghay ang pilosopo, at kanyang nakita 
ang isang lalaking may tatlompo o tatlompo't limang taong sa kanya'y ngumiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano po ba ang inyong 
binabasa riyan?--ang tanong ni Tasio, na itinuturo ang isang librong hawak ng 
lalaki.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang librong pangkasalukuyan: 'Las penas 
que sufren las benditas animas del Purgatorio!'--ang 
isinagot ng kausap na ngumingiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naku! naku! naku!--ang wika ng 
matandang lalaki sa sari-saring 'tono' ng boses, samantalang pumapasok sa 
bahay;--totoong matalas ang isip ng kumatha niyan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagkapanhik niya ng hagdanan ay tinanggap 
siya ng&nbsp; buong&nbsp; pakikipag-ibigan ng may bahay na lalaki at ng kanyang asawa. 
Don Filipo Lino ang pangalan ng lalaki at Do&ntilde;a Teodora Vi&ntilde;a naman ang babae. 
Si Don Filipo ang siyang teniente mayor at siyang puno ng isang 'partidong' 
halos ay 'liberal', 
sakali't matatawag ito ng gayon, at kung sakaling mangyayaring magkaroon ng mga 
'partido' sa 
mga bayan ng Filipinas.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nakita po ba ninyo sa libingan ang anak 
ng nasirang si Don Rafael na bagong kararating na galing sa Europa?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Opo, nakita ko siya, ng siya'y 
lumulunsad sa kotse.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang sabihana'y naparoo't upang hanapin 
ang pinaglibingan sa kanyang ama ... Marahil kakilakilabot ang kanyang pighati 
ng maalaman....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ikinibit ng pilosopo ang kanyang mga 
balikat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi po ba dinaramdam ninyo ang kasaliwaang palad na iyan?--ang tanong ng 
ginoong babaeng bata pa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Talastas na po ninyong ako'y isa sa anim 
na nakipaglibing sa bangkay; ako ang humarap sa Kapitan Heneral ng aking 
makitang ang lahat dito'y hindi umiimik sa gayong kalakilakihang kapusungan, 
gayong kailan ma'y minamagaling ko ang paunlakan ang taong mabait kung nabubuhay 
pa kay sa kung patay na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y bakit?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't hindi po ako sang-ayon sa 
pagmamanamana ng kaharian. Alang-alang sa kaunting dugong intsik na bigay sa 
akin ng aking ina, sumasang-ayon ako ng kaunti sa kaisipan ng mga intsik: 
pinauunlakan ko ang ama dahil sa anak, nguni't hindi ang anak dahil sa ama. Na 
ang bawa't isa'y tumanggap ng ganting pala o ng kaparusahan dahil sa kanyang 
mga gawa; datapuwa't hindi dahil sa mga gawa ng iba.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nagpamisa po ba kayo ng patungkol sa 
inyong nasirang asawa, alinsunod sa hatol ko sa inyo 
kahapon?--ang itinanong ng babae nagbago ng pinasasalitaanan:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi!--ang sagot ng matandang lalaking 
ngumingiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sayang!--ang isinagot ng babaeng taglay 
ang tunay na pagpipighati;--kasabihang hanggang sa ikasampung oras ng umaga bukas, ang mga 
kaluluwa'y malayang naglilibot at naghihintay ng sa kanila'y 
pagbibigay ginhawa ng mga buhay; na ang isang misa sa mga panahong ito'y katimbang ng lima o anim na misa sa mga ibang araw ng isang taon, ayon sa 
sabi ng kura, kaninang umaga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mainam! Sa makatuwid ay mayroon tayong 
isang kaaliw-aliw na taning na dapat nating samantalahin?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't Doray!--ang isinabad ni Don 
Filipo;--talastas mo ng hindi naniniwala si Don Anastasio sa Purgatorio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Na hindi ako 
naniniwala sa Purgatorio?--ang itinutol ng matandang lalaking tumitindig na sa 
kanyang upuan.--Diyata't pati ng 'historia' ng Purgatorio'y aking nalalaman!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang historia ng Purgatorio!--ang 
sinabing puspos ng pagtataka ng mag-asawa. Tingnan nga natin! Saysayin ninyo sa 
amin ang historiang iyan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi pala ninyo nalalaman ay bakit kayo'y nangagpapadala roon ng mga misa at inyong sinasabi ang mga 
pagkakahirap doon? Magaling! yamang nagpapasimula na ng pag-ulan at tila 
mandin tatagal, magkakapanahon tayo upang Huwag tayong mayamot--ang isinagot ni 
Tasio, at saka nag-isip-isip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Itiniklop ni Don Filipo ang librong 
kanyang tangan, at umupo sa kanyang tabi si Doray, na nahahandang huwag 
maniwala sa lahat ng sasabihin ni Tasio. Nagpasimula ito sa paraang sumusunod:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Malaon pang totoo bago manaog ang ating 
Panginoong Jesukristo'y may Purgatorio na, at ito'y na sa kalagitnaan ng 
lupa, ayon kay Padre Astete, o sa malapit sa Cluny, ayon sa monjang sinasabi ni 
Padre Girard, datapuwa't hindi ang may kahulugan dito'y ang kinalalagyan. 
Magaling, sinosino ang mga nasasanag sa apoy na iyong nag-aalab mula ng 
lalangin ang sanglibutan? Pinapagtitibay ang kaunaunahang pagkakatatag ng 
Purgatorio ng Filisofia Cristiana na nagsasabing wala raw ginagawang bagong 
ano man ang Diyos mula ng magpahingalay siya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mangyayaring nagkaroong 'in potentia'; 
datapuwa't hindi 'in aktu', 
ang itinutol ng teniente mayor.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Magaling na magaling! 
Gayon ma'y sasagutin ko kayong may ilang nakakilala ng Purgatorio na talagang 
mayroon na 'inaktu', ang isa sa kanila'y si Zarathustra o Zoroastro, 
na siyang sumulat ng isang bahagi ng 'Avestra' 
at nagtatag ng isang religiong sa mga tanging bagay nakakahawig ng atin at 
alinsunod sa mga pantas, si Zarathustra'y sumilang na nauna kay Jesukristo ng 
walong daang taon ang kauntian. Ang kauntian ang wika ko, sapagka't pagkatapos 
na masiyasat ni Platon, 
Xanto de Lidia Plinio, 
Hermipos at Eudoxio, 
inaakala nilang nauna si Zarathustra kay Jesukristo ng dalawang libo at limang 
daan taon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa papaano mang bagay, ang katotohana'y sinasabi na ni Zarathustra 
ang isang bagay na nawawangis sa Purgatoria, at naghahatol siya ng mga paraan 
upang makaligtas doon. Matutubos ng mga buhay ang mga kaluluwang namatay sa kasalanan, sa pagsasalita ng mga nasasaysay sa 
'Avestra' at gumawa ng 
mga kagalingan; datapuwa't kinakailangang ang mananalangin ay isang kamag-anak 
ng nasira hanggang sa ikaapat na salin. Ang panahong taning sa bagay na ito'y 
sa taon taon, tumatagal ng limang araw. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nang malaon, ng tumibay na sa bayan 
ang gayong pananampalataya, napagwari ng mga sacerdote sa religiong iyong 
malaking di ano lamang ang pakikinabangin sa gayong pananampalataya, kaya't 
kinalakal nila yaong mga 'bilangguang ngitngit ng dilim na pinaghaharian ng 
mga pagngangalit sa nagawang kasalanan', ayon sa sabi ni Zarathustra. 
Ipinaalam nga nilang sa halagang isang 'derem', salaping bahagya na ang 
halaga'y nababawas sa kaluluwa ang isang taong pagkakasakit ng di kawasa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Nguni't sapagka't ayon sa religiong iyo'y may mga kasalanang pinarurusahan ng tatlong daan hanggang isang libong taon, gaya 
ng pagsisinungaling, ng 
pangdaraya, at ng hindi pagganap sa naipangako, at iba pa, ang nangyari'y 
tumatanggap ang mga balawis na sacerdote ng maraming millong 'derems.' Dito'y 
mapag-wawari na ninyo ang kaunting bagay na nawawangis sa Purgatorio natin, 
bagaman mapagtatanto na ninyong ang pinagkakaibha'y ang mga religion.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Isang kidlat na may kasunod agad agad na 
isang maugong na kulog ang siyang nagpatindig kay Doray na nagsalitang 
nagkukruz:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Jesus, Maria y Jose! Maiwan ko muna kayo; magsusunog ako 
ng benditang palaspas at ng mga 'kandilang perdon'.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpasimula ng pag-ulang tila ibinubuhos. 
Nagpatuloy ng pananalita ang Pilosopo Tasyo, samantalang sinusundan niya ng 
tingin ang paglayo ng may asawang babaeng bata pa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" style="font-size: 13pt" color="#333333">Ngayong wala na siya'y lalong 
mapag-uusapan na natin ng&nbsp; buong&nbsp; kaliwanagan ang dahil ng ating salitaan. Kahit may 
kaunting pagkamapamahiin si Doray, siya'y magaling na katolika, at hindi ko ibig na pumaknit sa puso ng pananampalataya: naiiba ang isang 
pananampalatayang dalisay at wagas sa haling na pananampalataya, tulad sa 
pagkakaiba ng ningas at ng usok, wangis sa kaibhan ng musika sa isang gusot 
na kaingayan: hindi napagkikilala ang ganitong pagkakaiba ng mga haling, na 
tulad sa mga bingi. Masasabi nating sa ganang atin ay magaling, santo at na sa katuwiran ang pagkakahaka ng Purgatorio; nananatili ang pagmamahalan ng mga 
patay at ng mga buhay at siyang nakapipilit sa lalong kalinisan ng pamumuhay. 
Ang kasam-a'y na sa taksil na paggamit ng Purgatoriong iyan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nguni't tingnan natin ngayon kung bakit 
pumasok sa katolikismo ang adhikang itong wala sa Biblia at wala rin sa mga 
Santong Evangelio. Hindi binabanggit ni Moises at ni Jesukristo kaunti man 
lamang ang Purgatorio, at hindi nga kasukatan ang tanging saysay na kanilang 
sabing na sa mga Makabeo, sapagka't bukod sa ipinasiya sa Concilio ng 
Laodikea, na hindi katotohanan ang librong ito, ay nito na lamang huling panahon 
tinanggap ng Santa Iglesia Catolika. Wala ring nakakatulad ng Purgatorio sa 
religion pagana. Hindi mangyayaring panggalingan ng pananampalatayang ito ang kasaysayang 
'Alia panduntor inanies' na totoong madalas banggitin ni Virgilio 
na siyang nagbigay dahil sa dakilang si San Gregorio 
na magsalita ng tungkol sa mga kaluluwang nalunod, at idagdag ni Dante 
ang bagay na ito sa kanyang 'Divina Comedia'.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Wala rin namang 
nakakawangis ng ganitong kaisipan sa mga 'brahman', 
sa mga 'budhista' 
at sa mga egipkio mang nagbigay sa Roma ng kanilang 'Caronte' 
at ng kanilang 'Averno'. 
Hindi ko sinasaysay ang mga, religion ng mga bayan ng Ibaba ng Europa: ang 
mga religiong ito, palibhasa'y religion ng mga 'guerrero', 
ng mga 'bardo' 
at ng mga mangangaso, 
datapuwa't hindi religion ng mga pilosopo, bagaman nananatili pa ang kanilang 
mga pananampalataya at pati ng kanilang mga 'rito' 
na pawang nangalangkap na sa religion kristiana. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Gayon ma'y hindi nangyaring 
sumama sila sa hukbo ng mga tampalasang nangloob sa Roma, at hindi rin sila 
nangyaring lumuklok sa Capitolio: 
palibhasa'y mga religion ng mga ulap, pawang nangapapawi sa katanghaliang sikat ng araw.--Hindi nga sumasampalataya sa Purgatorio ang mga 
kristiano ng mga unang siglo: nangamamatay silang taglay iyang masayang pag-asang hindi na 
malalao't sila'y haharap sa Diyos at makikita nila ang mukha nito. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Si San 
Clemente na taga Alejandria, 
si Origenes 
at si San Irineo 
ang siyang mga unang mga Padre ng Iglesiang tila bumabanggit ng Purgatorio, 
marahil sa pagkadala sa kanila ng akit ng religion ni Zarathustra, na 
namumulaklak at totoong lumalaganap pa ng panahong iyon sa&nbsp; buong&nbsp; kasilanganan, 
sapagka't malimit nating nababasa ang mga pagsisi kay Origenes, dahil sa 
kanyang malabis na paghilig sa mga bagay sa Kasilanganan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ginagamit ni San 
Irineong pangpatibay sa pananampalataya sa Purgatorio, ang 'pagkatira ni 
Jesukristong tatlong araw sa kailaliman ng lupa,' tatlong araw na pagkapasa 
Purgatorio, at kanyang inaakala, dahil dito, na bawa't kaluluwa'y dapat manatili 
sa Purgatorio hanggang sa mabuhay na mag-uli ang katawan, bagaman tila laban 
mandin sa bagay na ito ang 'Hodie mekum eris in Paradiso.' 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nagsasaysay rin naman si San Agustin, tungkol sa Purgatorio; datapuwa't sakali't 
hindi niya pinagtibay na tunay na mayroon nga, gayon ma'y ipinalalagay niyang 
mangyayari ngang magkaroon, sa pag-aakala niyang maipagpapatuloy hanggang sa kabilang buhay ang tinatanggap nating mga 
kaparusahan sa buhay na ito, dahil sa 
ating mga kasalanan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naku naman si San Agustin!--ang 
sinabi ni Don Filipo;--hindi pa siya magkakasiya sa tinitiis nating mga hirap sa 
buhay na ito't ibig pa niya ang magpatuloy hanggang sa kabilang-buhay!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ganyan nga ang kalagayan ng bagay na 
ito: sumasampalataya ang iba at ang iba'y hindi. Baga ma't sumang-ayon na si San 
Gregorio, alinsunod sa kanyang 'de quibusdam levibus kulpis esse ante judikium 
purgatorius ignis kredendus est,' hindi rin nagkaroon ng patuluyang katibayan ang 
Purgatorio, hanggang sa ng ipasiya ng Concilio sa Florencia ng taong 1439, sa 
makatuwid ay ng makaraan na ang walong daang taon, na dapat magkaroon ng isang 
apoy na pangdalisay o panglinis sa mga kaluluwang baga ma't namatay na 
sumisinta sa Diyos, nguni't hindi pa lubos napagbabayaran ang Hustisya ng May 
Capal. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa kawakasa'y ang Concilio Tridentino, 
sa ilalim ng pangungulo ni Pio IV ng taong 1563, sa ikalabinglimang pulong 
ay ilinagda ang kautusan tungkol sa Purgatorio, na ang pasimula'y: 'Cum katholika ekklesia Spiritu Sankto edokta etk.,' na doo'y sinasabing ang mga 
patungkol ng mga buhay, ang mga panalangin, ang mga paglilimos at iba pang 
mga gawang kabanalan ay siyang mabibisang paraan upang mailigtas sa Purgatorio 
ang mga kaluluwa, bagaman sinasabing ang paghahayin ng misa'y siyang lalong kagalinggalingan sa lahat. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Gayon ma'y hindi sumasampalataya ang mga 
protestante 
sa Purgatorio, at gayon din ang mga paring griego, 
sapagka't wala silang nakikitang pagbibigay katotohanan ng Biblia, 
at sinasabi nilang binibigyang wakas ng kamatayan ang taning upang makagawa ng 
mga karapatan o ng mga laban sa mga karapatan, at ang 'Quodkumque ligaberis 
in terra' hindi ang kahuluga'y 'usque ad purgatorium' etk.; nguni't dito'y 
maisasagot na sapagka't na sa kalagitnaan ng lupa ang Purgatorio, talagang 
dapat mapasailalim ng kapangyarihan ni San Pedro. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't hindi ako 
matatapos ng pagsasaysay, kung sasalitain ko ang lahat ng mga sabi tungkol sa 
bagay ni ito. Isang araw na ibigin po ninyong pagmatuwiranan natin ang bagay sa 
Purgatorio, magsadya, kayo sa aking bahay at doo'y babasahin natin ang mga 
libro at tayo'y malaya at payapang makapagpapalagayan ng kanikanyang katuwiran. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Ngayo'y yayao na ako: hindi ko mapaghulo kung bakit itinutulot ng kabanalan 
ng mga kristiano ang pagnanakaw sa gabing ito.--Kayong mga punong bayan ay 
nangagpapabaya sa ganitong gawa, at aking ipinanganganib ang aking mga 
libro. Kung sana'y nanakawin nila sa akin upang kanilang basahin ay aking 
ipauubaya, datapuwa't marami ang nangag-iibig na tupukin ang aking mga libro, 
sa hangad na gumanap sa akin ng isang pagkakaawang gawa, at dapat ngang katakutan ang ganitong pagkakaawang gawang karapatdapat sa kalifa 
Omar. 
Dahil sa mga librong ito'y ipinalalagay ng ibang linagdaan na ako ng parusa 
ng Diyos....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nguni't inaakala kong kayo po'y 
sumasampalataya sa parusa ng Diyos?--ang tanong ni Doray na ngumingiti at 
lumalabas na may dalang lalagyan ng mga bagang pinagsusunugan ng mga tuyong 
dahon ng palaspas, na pinagbubuhatan ng nakayayamot nguni't masarap na amoy 
na usok.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko po alam, ginoong babae, kung 
ano ang gagawin sa akin ng Diyos!--ang isinagot ni matandang Tasio na 
nag-iisip-isip. Pagka ako'y naghihingalo na, ihahandog ko sa kanya ang aking 
katauhang walang 
kamunti mang takot; gawin sa akin ang bawa't ibigin. nguni't 
ma'y naiisip ako ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano po ang naiisip ninyong iyan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung ang mga katoliko lamang ang 
tanging mapapakagaling, at lima lamang sa bawa't isang daang katoliko ang 
siyang mapapakagaling, at sapagka't ang dami ng mga katoliko'y 
ikalabingdalawang bahagi ng mga nabubuhay na tao sa lupa, sakali't 
paniniwalaan natin ang sinasabi sa mga estadistika, 
ang mangyayari'y pagkatapos na mapakasama ang yuta-yutang mga taong nabuhay sa 
daigdig sa&nbsp; buong&nbsp; di mabilang na mga siglong nagdaan, bago nanaog sa lupa ang 
Mananakop, at pagkatapos na mamatay dahil sa atin ang Anak ng isang Diyos, 
ngayo'y lilima lamang ang mapapakagaling sa bawa't isang libo't dalawang daang 
tao? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Oh, tunay na tunay na hindi! Minamagaling ko pa ang magsaysay at 
sumampalatayang gaya ni Job: 'Diyata't magpapakabagsik ikaw sa isang inililipad 
na dahon at pag-uusigin mo ang isang tuyong layak?' Hindi, hindi mangyayari 
ang gayong kasaliwaang palad na kalakilakihan! Kung sampalatayanan ito'y isang 
											kapusungan; hindi, hindi!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Anong inyong gagawin? Ang 
Hustisya, ang kadalisayan ng 
Diyos ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Oh, datapuwa't nakikita ng 
Hustisya at 
ng Cadalisayan ng Diyos ang darating bago ginawa ang paglikha sa 
Sangsinukob!--ang isinagot ng lalaking matandang nangingilabot na tumindig.--Ang&nbsp; 
buong&nbsp; kinapal, ang tao ay isang linalang sa isang nais lamang ng kalooban; 
nguni't hindi niya kinakailangan, kaya't hindi nga marapat na likhain niya, 
hindi, kung kakailanganing mapakasama sa walang hanggang kasaliwaang palad ang 
daandaang tao upang mapaligaya ang isa lamang, at ang lahat ng ito'y dahil sa 
mga minanang kasalanan o sa sandaling pagkakasala, Hindi! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Kung iya'y magiging katotohanan, 
											sakalin na ninyo't patayin iyang 
											inyong anak na lalaking diya'y 
											tumutulog; kung ang ganyang 
											pananampalataya'y hindi isang 
											malaking kapusungang laban sa Diyos 
											na iyang dapat na maging siyang 
											Dakilang Cagalingan; pagkakagayo'y 
											ang Molok fenikio na ang kinakai'y 
											ang inihahayin sa kanyang mga 
											pinapatay na tao at ang dugong 
											walang-malay-sala, at sinususunog sa 
											kanyang tiyan ang mga sanggol na 
											inagaw sa dibdib ng kanilang mga 
											ina, ang mamamatay-taong dios na 
											iyan, ang dios na iyang 
											kalagimlagim, kung isusumag sa 
											Kanya'y masasabing isang dalagang 
											mahina ang loob, isang kaibigang 
											babae, ang ina ng Sangkatauhan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At puspos ng panghihilakbot, umalis sa 
bahay na iyon ang ul-ol o ang pilosopo, at tumakbo sa lansangan, bagaman 
umuulan at madilim.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Isang nakasisilaw na kidlat na kaakbay ng 
isang kagutlagitlang kulog na nagsabog sa impapawid ng pangpatay na mga 
lintik ang siyang tumanglaw sa matandaang lalaking nakataas ang mga kamay sa 
langit, at sumisigaw:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tumututol ikaw! 
Talastas ko nang hindi ka mabangis; talastas ko nang ang dapat ko lamang itawag 
sa iyo'y SI MABAIT!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-iibayo ang mga kidlat, lalong 
lumalakas ang unos....</font></p>
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
																	Nilalaman ng Noli 
																	Me Tangere</font></a></font></p>
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