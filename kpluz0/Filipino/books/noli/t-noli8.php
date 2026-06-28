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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">VIII. Mga Alaala</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinagdaraanan ng kotse ni Ibarra ang 
bahagi ng lalong masayang nayon ng Maynila; ang nakapagbibigay panglaw sa kanya 
ng gabing nagdaan, sa liwanag ng araw ay nakapagpapangiti sa kanya kahi't siya'y aayaw.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang kasayahang hindi naglilikat sa lahat 
ng panig, ang lubhang maraming kotseng nagpaparoo't paritong sakdal ng 
tutulin, ang mga karromata, ang mga kalesa, ang mga europeo, ang mga intsik, 
ang mga dalisay na tagarito, na bawa't isa'y may kanikanyang sariling 
pananamit, ang mga naglalako ng mga bungang-kahoy at halaman, mga korredor, 
hubad na kargador, 
mga tinda ng mga kakanin, mga fonda, 
mga restaurant, 
mga tindahan, sampu ng mga karretong hila ng mga mapagpaumanhin at walang 
damdaming kalabaw na tila mandin naglilibang sa paghila ng mga 'bulto' samantalang naglilininglining, ang lahat ng 
ingay at kalugkog, pati ng araw, 
isang amo'y na tangi, ang sari-saring mga kulay, pawang pumupukaw sa kanyang 
alaala ng isang daigdig na nagugupiling na mga gunita.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Wala pang latag na 
mga bato ang mga daang iyon. Dalawang araw lamang sunod na uminit, ang mga daa'y 
nagiging alabok ng tumatakip sa lahat, nag-papaubo at bumubulag sa mga 
naglalakad: isang araw lamang umulan ay nagiging lawa na, ano pa't kung gabi ay 
naaanino roon ang mga parol ng mga kotse at tumitilamsik buhat sa limang metrong 
layo sa mga naglalakad sa mga makikipot na mga akera. Gaano karaming mga babae 
ang nangag-iwan sa mga along putik na iyon ng kanilang mga khinelas na bordado! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Pagkakagayo'y nangapapanood na pinipison ang mga daan ng hanayhanay na mga presidiarong 
ahit ang ulo, na ang mga mangas ng baro'y maiikli at tokong ang salawal na may 
mga numero at may mga letrang azul, sa mga binti'y may mga tanikalang halos 
nababalot ng maruruming mga basahan upang huwag na totoong makasakit ang 
pagkiskis o ang lamig marahil ng bakal; dalawa't dalawa ang pagkakakabit, mga 
sanag sa araw, mga hapong-hapo sa init at sa pagod, pinapagmamadali at sila'y 
hinahampas ng pamalo ng isang presidiario ring marahil nagkakamit kasayahan, 
											sapagkat sa ganang kanya nama'y nakapagpapahirap sa mga kawangis din niyang 
presidiario. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Matatangkad sila, madidilim ang pagmumukhang kailan ma'y hindi 
namasdang lumiliwanag sa pagsilang ng isang ngiti; numiningning, gayon man ang kanilang mga balingtatao, pagkka dumarapo sa 
kanilang mga balikat ang 
humahaging na pamalo, o pagka hinahagisan sila ng isang naglalakad ng upos 
ng isang tabakong basa-basa at nakakalas na, dinarampot ang upos ng lalong 
nalalapit at itinatago sa kanyang salakot: ang mga iba'y minamasdan ang mga 
nagdaraan ng pagtinging kakaiba. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Wari'y 
											naririnig pa niya ang kanilang 
kaingayang ginagawa sa pagdudurog ng batong itatabon sa mga lubak at ang 
nakalalagim na kalansing ng mabibigat na mga tanikala sa namamaga na nilang 
mga bukong-bukong. Kinikilabutan si Ibarra kung naaalaala niya ang isang 
nangyaring sumugat sa kanyang pag-iisip-musmos; niyo'y katanghalian at 
ibinabagsak ng araw sa lupa ang kanyang lalong maiinit na mga sinag. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa lilim ng isang 
karretong kahoy nakabulagta ang isa sa 
mga taong iyon, walang malay 
tao, bukas ng kaunti ang mga mata; pinagbubuti naman ng dalawang presidiario 
rin ang isang hihigang kawayan, walang galit, walang pighati, walang yamot, ano 
pa't walang pinag-ibhan sa sinasabing kaugalia't anyo ng dalisay na mga 
tagarito. 'ngayo'y ikaw, bukas nama'y kami,' marahil siyang sinasabi sa kanikanila. 
</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi pinapansin ng mga taong nagdudumaling dumaraan ang bagay na 
iyon; nagdaraan ang mga babae, tinitingnan sila at nangagpapatuloy ng 
paglakad, karaniwan ng mapanood ang mga bagay na yaon, linipakan na ang mga 
puso; nangagtatakbuhan ang mga kotse, ipinaaanino sa kanilang katawang may 
barniz ang mga sinag ng araw na iyong maningning sa isang langit na walang 
alapaap; sa kanya lamang, batang may labing isang taon at bagong kararating na 
galing sa kanyang bayan, nakalalagim ang napapanood na iyon; sa kanya lamang 
nakapagbigay bangungot ng kinagabihan.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Wala na ang mabait at may wagas na puring 
'Puente de Barkas,' yaong tulay filipinong-mabait na nagsusumakit maglingkod, 
bagaman taglay niya ang katutubong mga kapintasang tumataas at bumababa 
alinsunod sa maibigan ng ilog Pasig na di miminsang 
nagpahirap at gumiba sa tulay na iyon.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi lumalago ang mga talisay sa plaza ng San Gabriel; nananatili sila sa pagkakuyagutin.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa ganang kanya'y nagbawas ang ganda ng 
Eskolta, bagaman ngayo'y may isang malaking bahay na may mga 'kariatide' 
sa dating kinatatayuan ng mga lumang kamalig. Tinakhan niya ang bagong 'Puente 
de Espa&ntilde;a'; 
nangagpaalaala sa kanya ng mga magiginaw na umaga, kung doo'y dumaraang 
namamangka silang patungo sa mga paliguan sa Uli-uli, ang mga bahay na na sa 
pangpang na dakong kanan ng ilog, na napapag-itanan ng mga kawayanan at mga 
punong kahoy, doon sa wakas ng Eskolta at pasimula ng Isla del Romero.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nasasalubong niya ang maraming mga 
kotseng hinihila ng mga maiinam na mga kabayong maliliit, lulan ng mga kotse ang mga empleadong nakakatukatulog pa marahil ay pumapatungo na sa 
kanilang mga ofikina; mga militar, mga intsik na may anyong hambog at 
katawatawa ang pagkakaupo; mga prayleng hindi maimikin, mga kanonigo at iba 
pa. Tila mandin kanyang namataan sa isang marikit na 'victoria' 
si Padre Damasong mabalasik ang mukha't kunot ang mga kilay; nguni't siya'y 
nakaraan na at ngayo'y masayang bumabati sa kanya, buhat sa kanyang karitela 
si Kapitan Tinong na kasakay ang kanyang asawa't dalawang mga anak na babae.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">ng makababa na ng tulay, tumakbo ang 
mga kabayo't tinungo ang paseo ng Sabana. 
Sa kaliwa'y ang pabrika ng tabako sa Arrokeros, na pinanggagalingan ng 
malaking ugong na ginagawa ng mga kigarrera sa pagpukpok ng mga dahon ng 
tabako. Napangiti si Ibarra, sa pagka alaala ng masangsang na amoy na iyong sa 
tuwing ikalimang oras ng hapo'y lumalaganap sa tulay ng Barkas at humihilo sa 
kanya ng panahong siya'y musmos pa. Ang masasayang mga salitaan, ang mga 
katatawanan ang siyang kahi't hindi niya sinasadya'y nakapaghatid sa kanyang 
guniguni sa nayon ng Lavapies, sa Madrid, sampu ng doo'y mga pangliligalig ng 
mga kigarrera, na totoong nakakapahamak sa sawing palad na mga 'gindilla'at 
iba pa.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ipinagtabuyan, ang kanyang kaayaayang mga 
naaalaala ng Jardin Botaniko; 
iniharap sa kanyang pag-iisip ang demonio ng mga pagsusumagsumag; ang mga 
Jardin Botaniko sa Europa, sa mga lupaing nangagkakailangan ng malakas na 
kalooban at saganang ginto upang mapasibol ang isang dahon at mapabukas ang 
isang bulaklak.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Hindi lamang doon, kung di sa mga 'kolonia' man ay may mabubuti 
ang alaga at mga mahahalagang Jardin Botanikong bukas na lagi sa sino mang 
ibig manood. Inihiwalay doon ni Ibarra ang kanyang mga mata at inilingap niya 
sa dakong kanan, at doo'y kanyang nakita ang matandang Maynilang naliligid ng 
mga kuta at mga bangbang, tulad sa isang dalagang kulang sa dugo, na nababalot 
ng isang pananamit ng kanyang nunong babae ng panahong ito'y sumasakagaraan.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Natanawan niya ang dagat na hindi maabot 
ng tanaw ang gilid na lubhang malayo!...</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">--Na sa kabilang ibayo ang Europa!--ang 
inisip ng binata! Ang Europang may magagandang mga naciong hindi 
nangaglilikat ng pagsusumikap sa paghanap ng kaligayahan, nagsisipanaginip 
pagkakaumaga at nangagdaramdam kabiguan sa towing lumulubog ang araw ... 
lumiligaya sa gitna ng kanyang mga kapahamakan! Tunay nga, sa kabilang 
ibayo ng dagat na di maulata'y nangaroroon ang mga naciong mapagmahal sa 
espiritu, at bagaman hindi nila minamasama ang katawan, lalo pa manding 
mapagmahal sa espiritu kay sa mga nagpapanggap na lubhang umiirog sa espiritu.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't nangagsitakas ang kanyang mga 
pagdidilidiling ito ng kanyang makita ang munting bunduk-bundukan sa kapatagan 
ng Bagumbayan. Ang namumukod na bunduk-bundukan sa isang tabi ng paseo ng 
Luneta ang siya ng yong umaakit sa kanyang isip at siyang sa kanya'y 
nagpapagunamgunam.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Kanyang ginugunita ang taong nagbukas ng 
kanyang pag-iisip at nagpakilala sa kanya, ng magaling at ng nasakatuwiran. 
Tunay nga't kakaunti ang mga kaisipang sa kanya'y iniaral, nguni't hindi ang 
mga walang kabuluhang pag-ulit lamang ng mga sinabi ng iba; pawang mga 
kaisipang galing sa pananalig na hindi nangagkulabo sa liwanag ng lalong 
matitinding ilaw ng dakilang pagsulong. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang taong yao'y isang matandang 
sacerdote, ang mga pangungusap na sa kanya'y sinabi ng siya'y pagpaalaman ay 
umaalingawngaw pa sa kanyang mga tainga: 'Huwag mong kalimutang bagaman 
pag-aari ng sangkatauhan ang karunungan, 'minamana lamang ang karunungang iyan ng mga taong may puso,?--ang paalaala niya.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--'Pinagsikapan 
kong ilipat sa iyo ang aking tinanggap sa aking mga maestro; ang kayamanang 
iyo'y pinagsikapan ko namang dagdagan sa&nbsp; buong&nbsp; abot ng aking kaya at inililipat 
ko sa mga taong humahalili; gayon din ang gagawin mo sa mangagsisihalili sa 
iyo, at mapagtatatlong ibayo mo, sapagkat ikaw ay paparoon sa mga lubhang 
mayayamang lupain.'</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--At ngumingiting idinagdag; 'Nangagaisiparito sila sa 
paghanap ng ginto; mangagsiparoon naman kayo sa kanilang lupai't hanapin 
ninyo roon ang ibang gintong ating kinakailangan! Alalahanin mo, gayon mang 
hindi ang lahat ng kumikinang ay ginto. Namatay riyan ang paring iyon.'</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga gunita niyang ito'y sumasagot 
siya:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi, ano mang karatnan, ang una'y ang 
kinagisnang lupa, ang una'y Filipinas, anak ng Espa&ntilde;a, ang una'y ang lupaing kastila. Hindi, ang bagay na iyang isang 
kasaliwaang palad ay hindi 
nakarurungis sa Bayang kinagisnan, hindi. Hindi nakahahalina sa kanyang 
paggugunamgunam ang Ermita, iyang Fenix 
na pawid, na muling sumisilang sa kanyang mga abo sa anyong mga bahay na may 
mga pintang puti at asul at ang bubong ay zink na may pintang pula. Hindi 
nakaaakit sa kanyang pagmamalasmalas ang Maalat, ni ang kuartel ng kaballeriang 
may mga punong kahoy sa tapat, ni ang mga tagaroon, ni ang mga maliliit na 
bahay na pawid na may matitibong na bubungang nangakukubli sa mga puno ng 
saging at mga bunga, na ginagawang tulad sa mga pugad ng bawa't ama ng 
isang mag-anak.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Tuloy ang paggulong ng kotse: 
nakasasalubong ng isang karromatang hila ng isa o dalawang kabayo, na 
napagkikilalang galing lalawigan, dahil sa guarnicion at iba pang kagamitang 
pawang abaka. Pinagpipilitang makita ng karromatero ang naglalakbay na 
nakasakay sa maningning na kotse at nagdaraang hindi nakikipagpalitan ng kahi't 
isang pananalita, ng kahi't isang pakikipagbatian. Kung minsa'y isang karretong 
hila ng isang kalabaw na marahan ang lakad at parang walang ano man ang siyang 
nakawawala ng kapanglawan ng maluluang at maalikabok na mga lansangang 
napapaliguan ng makinang na araw ng mga 'tropiko'. 
</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nakikisaliw sa malungkot at di nagbabagong anyo ng awit ng namamatnugot na nakasakay sa kalabaw ang matinding kalairit ng tuyong 
rueda sa pag-ikit na kasama ang kinsekinse ng mabigat na karreton; kung minsan 
nama'y ang malagaslas na tunog ng gasgas na mga paa ng isang paragos, niyang 
trineong 
											sa Pilipinas ay hinihilang napakabanayad sa ibabaw ng alabok o ng mga lubak 
sa daan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga kapatagan, sa mga malilinis na lupang pinaghahalamanan ay 
nanginginain ang mga hayop na kasama ng mga tagak, na payapang nakadapo sa 
ibabaw ng mga vakang kapong ngumunguya at linalasa ang mga sariwang damo ng parang, na ipinipikitpikit ang 
mga mata,; sa dakong malayo'y mga babaeng 
kabayong nangagdadambahan, nangagluluksuhan at nangagtatakbuhang hagad ng 
isang masival na potrong mababa ang buntot at malago ang kiling: humahalinghing 
ang potro at pinasasambulat ang lupa ng kanyang malalakas na mga kuko.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Pabayaan nating maglakbay ang binatang 
nagdidilidili o nakakatulog: ang hiwagang malungkot o masaya ng katapangang 
hindi nakakaakit ng kanyang gunamgunam: ang araw na iyong nagpapapakintab sa 
mga dulo ng mga kahoy at nagpapatakbo sa mga tagabukid na nangapapaso ang 
mga paa sa nagbabagang lupa, bagaman sila'y may panyapak na mga lipak; ang 
araw na iyong pumipigil sa isang babaeng tagabukid sa lilim ng isang talisay o kawayanan, at sa kanya'y nagpapaisip ng mga bagaybagay na walang 
katuturan at 
di mapagwari, ang isip na iyo'y hindi nakalulugod sa ating binata.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Bumalik tayo sa Maynila samantalang 
gumugulong ang kotse't nagpapagiray-giray, tulad sa isang lasing, sa 
burol-burol na lupa, at samantalang tumatawid sa tulay na kawayan, pumapanhik sa 
matarik na ahunin o bumababa sa totoong malalim na lusungin.</font></p>
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