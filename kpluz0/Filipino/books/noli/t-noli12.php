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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XII. Ang Lahat ng mga Santo</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Marahil ang bugtong na bagay na hindi 
matututulang ikinatatangi ng tao sa mga hayop ay ang paggalang na inihahandog 
sa mga namamatay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sinasaysay ng mga historiador 
na sinasamba at dinidios nila ang kanilang mga nuno at magugulang; ngayo'y 
tumbalik ang nangyayari: ang mga patay ang nagkakailangang mamintuho sa mga 
buhay. Sinasabi rin namang iniingatan ng mga taga Nueva Ginea sa mga kaja 
ang mga but-o ng kanilang mga patay at nakikipagsalitaan sa kanila; sa 
pinakamarami sa mga bayan ng Asia, Afrika at Amerika'y hinahayinan ang kanilang mga patay ng lalong masasarap nilang mga pagkain, o ang mga 
pagkaing minamasarap ng mga patay ng panahong sila'y nabubuhay, at 
nangagpipiging at inaakala nilang dumadalo sa mga piging na ito ang mga 
patay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ipinagtatayo ng mga taga Egipto ng mga palakio ang mga patay, ang 
mga musulman nama'y ipinagpapagawa, sila ng maliliit na mga kapilla, at iba 
pa; datapuwa't ang bayang maestro sa bagay na ito, at siyang lalong magaling ang 
pagkakilala sa puso ng tao'y ang bayan ng Dahomey. 
Natatalastas ng mga maiitim na ito, na ang tao'y mapanghiganti, at sapagkat 
gayo'y sinasabi nilang upang mabigyang katowaan ang namatay, wala ng lalong 
magaling kung di ang patayin sa ibabaw ng pinaglibingan sa kanya ang lahat ng 
kanyang mga kaaway; at sapagkat ang tao'y malulugding makaalam ng mga 
bagay-bagay, sa taon-tao'y pinadadalhan siya ng isang 'korreo' sa pamamag-itan 
ng linaplap na balat ng isang alipin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tayo'y naiiba sa lahat ng iyan. Bagaman 
sa nababasa sa mga sulat na nauukit sa mga pinaglibingan, halos wala sino&nbsp;mang naniniwalang 
nagpapahingalay ang mga patay, at lalo ng hindi pinaniniwalaang sumasapayapa. 
Ang lalong pinakamagaling mag-isip ay nangag-aakalang sinasanag pa ang kanilang 
mga nuno sa tuhod sa purgatoryo, at kung di siya mapakasama (mapasainfierno 
baga), masasamahan pa niya, sila roon sa mahabang panahon. At ang sino mang ibig 
tumutol sa amin, dalawin niya ang mga simbahan at ang mga libingan sa&nbsp; 
buong&nbsp; 
maghapong ito, magmasid at makikita. Datapuwa't yamang tayo'y na sa bayan ng 
San Diego, dalawin natin ang libingan dito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa dakong kalunuran, sa gitna ng mga 
palaya'y naroroon, hindi ang kiudad, kung di ang nayon ng mga patay: ang daan ng pagparoo'y isang makitid na landas, maalabok 
kung panahong tag-init, at 
mapamamangkaan kung panahong tag-ulan. Isang pintuang kahoy, at isang bakod na 
ang kalahati'y bato at ang kalahati'y kawayan ang tila mandin siyang 
ikinahihiwalay ng libingang iyon sa bayan ng mga buhay; datapuwa't hindi 
nahihiwalay sa mga kambing ng kura, at sa ilang baboy ng mga kalapit bahay, 
na pumapasok at lumalabas doon upang mangagsiyasat sa mga libingan o 
mangagkatowa sa gayong pag-iisa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa gitna ng maluang na bakurang iyon may 
nakatayong isang malaking kruz na kahoy na natitirik sa patungang bato. 
Inihapay ng unos ang kanyang INRI na hoja de lata, at kinatkat ng ulan ang 
mga letra. Sa paanan ng kruz, tulad sa tunay na Golgota, 
samasamang nabubunton ang mga bungo ng ulo at mga but-o, na ang walang 
malasakit na maglilibing ay itinatapon doon ang kanyang mga nahuhukay sa mga 
libingan. Diya'y mangaghihintay sila, ang lalong malapit mangyari, hindi ng 
pagkabuhay na mag-uli ng mga patay, kung di ang pagdating doon ng mga hayop 
at ng sila'y painitin ng kanilang mga tubig at linisin ang kanilang malalamig 
na mga kahubdan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Namamasdan sa paligidligid ang mga bagong hukay: sa dako 
rito'y hupyak ang lupa, sa dako roo'y anyong bunduk-bundukan naman. Sumisibol 
doo't lumalago ng mainam ang tarambulo't pandakaki; ang tarumbulo'y ng tunduin 
ang mga binti ng kanyang matitinik na mga bunga, at ng dagdag naman ng 
pandakaki ang kanyang amoy sa amoy ng libingan, sakali't ito'y walang 
kasukatang amoy. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Gayon ma'y nasasabugan ang lupa ng ilang maliit na mga 
bulaklak, na gaya rin naman ng mga bungong iyong ang Lumikha lamang sa kanila 
ang nakakakilala na: ang ngiti ng mga bulaklak na iyo'y maputla at ang 
halimuyak nila'y ang halimuyak ng mga baunan. Ang damo at ang mga gumagapang 
na damo'y tumatakip sa mga sulok, umuukyabit sa mga pader at sa mga 'nicho', 
na ano pa't dinaramtan at pinagaganda ang hubad na kapangitan; kung minsa'y 
pumapasok sa mga gahak na gawa ng mga lindol, at inililihim sa mga nanonood 
ang mga kagalanggalang na mga libingang walang laman.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa horas ng pagpasok namin ay binugaw ang 
mga hayop; ang mangisangisang baboy lamang, hayop na mahirap papaniwalain, 
ang siyang sumisilip ng kanyang maliliit na mga mata, isinusungaw ang ulo sa 
isang malaking guang ng bakod, itinataas ang nguso sa hangin at wari'y 
sinasabi sa isang babaeng nagdarasal:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag mo namang kakanin lahat, tirhan mo 
ako nang kaunti, ha?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">May dalawang lalaking humuhukay ng isang 
baunan sa malapit sa pader na nagbabalang gumuho: ang isa, na siyang maglilibing 
ay walang kabahabahala; iniwawaksi ang mga gulogod at ang mga buto, na gaya na 
pag-aabsang ng isang maghahalaman ng mga bato at mga sangang tuyo; ang 
isa'y nanganganingani, nagpapawis, humihitit at lumulura maya't maya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pakinggan mo!--anang humihitit, sa wikang 
tagalog.--Hindi kaya magaling na kata'y humukay sa ibang lugar? Ito'y bagong 
bago.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pawang bago ang lahat ng libing.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi na ako makatagal. Ang but-ong iyang 
iyong pinutol ay dumurugo pa ... hm! at ang mga buhok na iyan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naku, 
napakamaselang ka naman!--ang 
ipinagwika sa kanya ng isa--Ang ikaw ma'y eskribiente sa Tribunal! Kung humukay 
ka sanang gaya ko ng isang bangkay na dadalawampung araw pa, sa gabi, 
ngitngit ng dilim, umuulan ... namatay ang parol kong dala....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kinilabutan ang kasama.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naalis ang pagkapako ng kabaong, 
umaalingasaw ... at mapilitan kang pasanin mo ang kabaong na iyon, at umuulan 
at kaming dalawa'y kapwa basa at....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kjr!....At bakit mo 
hinukay?...!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tiningnan siya ng maglilibing ng&nbsp; 
buong&nbsp; 
pagtataka.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit?...nalalaman 
ko ba? Ipinag-utos sa aking hukayin ko!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sino ang nag-utos sa iyo?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Napaurong ng kaunti ang maglilibing at 
pinagmasdan ang kanyang kasama, mula sa paa hangang ulo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba! tila ka naman kastila! ang mga 
tanong ding iyan ang siyang ginawa sa akin pagkatapos ng isang kastila, 
datapuwa't sa lihim. ngayo'y sasagutin kata, ng gaya ng pagkasagot ko sa 
kastila: ipinag-utos sa akin ng kurang malaki.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah! at ano ang ginawa mo sa bangkay 
pagkatapos?--ang ipinagpatuloy na pagtatanong ng maselang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Diablo! kung di ko lamang ikaw 
nakikilala at natatalastas kung ikaw ay 'lalaki', sasabihin kung ikaw ay tunay 
ngang kastilang sibil: kung magtanong ka'y tulad din sa kanya. Gayon 
...ipinag-utos sa akin ng kurang malaking siya'y ilibing ko sa libingan ng mga 
intsik, 
nguni't sapagkat totoong mabigat ang kabaong at malayo ang libingan ng mga 
intsik....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ayaw! ayaw! ayaw ko 
ng humukay!--ang 
isinalabat ng kausap na lipos ng pangingilabot, na binitiwan ang pala at umahon 
sa hukay;--aking nabaak ang ba-o ng isang ulo at nanganganib akong baka 
hindi ako patulugin sa gabing ito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Humalakhak ang maglilibing ng kanyang 
makitang samantalang umaalis ay nagkukruz.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Unti-unting napupuno ang libingan ng mga lalaki't 
mga babaeng pawang nangakaluksa. Ang iba'y nangaghahanap na 
maluat ng baunan; sila-sila'y nangagtatatalo, at sapagkat hindi mandin sila 
mangagkasundo, sila'y nangaghihiwalay at bawa't isa'y lumuluhod kung saan 
lalong minamagaling niya,; ang mga iba, na may mga 'nicho' ang kanilang 
mga 
kamag-anak, nangagsisindi ng malalaking kandila at nangagdarasal ng taimtim; 
naririnig din naman ang mga buntong hininga at mga hagulhol, na pinakalalabis 
o pinipigil. Nariringig na ang alingawngaw ng 'orapreo, orapresis' at 
'requiemeternams.'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nasok na nakapugay ang isang matandang 
lalaki. Marami ang nangagtawa pagkakita sa kanya, ikinunot ang mga kilay ng 
ilang mga babae. Tila mandin hindi pinupuna ng matandang lalaki ang gayong 
mga ipinakikita sa kanya, sapagkat napatungo siya sa bunton ng mga bungo 
ng ulo, lumuhod at may hinanap sa loob ng ilang sandali sa mga but-o; 
pagkatapos ay maingat na inisaisang ibinukod ang mga bungo ng ulo, at sapagkat hindi mandin makita niya ang kanyang hinahanap, umiling, lumingap sa 
magkabikabila at nagtanong sa maglilibing.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Oy!--ang sinabi sa kanya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumunghay ang maglilibing.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nalalaman mo ba kung saan naroon ang 
isang magandang bungo ng ulo, maputing tulad sa laman ng niyog, walang kakulangkulang ang mga ngipin, na inalagay 
ko sa paanan ng kruz, sa ilalim 
ng mga dahong iyon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ikinibit ng maglilibing ang kanyang mga 
balikat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Masdan mo!--ang idinugtong ng matanda, 
at ipinakita sa kanya, ang isang pilak na salapi,--wala ako kung hindi ito, 
nguni't ibibigay ko sa iyo kung makita mo ang bungong iyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinapagdilidili siya, ng ningning ng 
salapi, tinanaw ang buntunan ng mga, buto, at nagsalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Wala ba roon? Kung gayo'y hindi ko 
nalalaman. nguni't kung ibig ninyo'y bibigyan ko po kayo ng iba.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Katulad ka ng 
baunang iyong hinuhukay!--ang winika sa kanya ng matandang lalaking nanginginig ang boses;--hindi 
mo nalalaman ang halaga ng nawawala sa iyo. Sino ang ililibing sa hukay na iyan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nalalaman ko ba 
kung sino? Isang patay ang ililibing diyan!--ang sagot na nayayamot ng maglilibing.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tulad sa baunan! 
tulad sa baunan!--ang 
inulit ng matandang lalaking nagtatawa ng malungkot;--hindi mo nalalaman ang 
iyong hinuhukay at ang iyong nilalamon! Hukay! hukay!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantala'y natapos ng maglilibing ang 
kanyang gawa; dalawang nakatimbong lupang basa at mapulapula ang na sa 
magkabilang tabi ng hukay. Kumuha sa kanyang salakot ng hicho, ngumanga at 
pinagmasidmasid na may anyong tanga ang mga nangyayari sa kanyang paligid.</font></p>
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