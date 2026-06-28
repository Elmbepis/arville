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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXIII. Isang Bangkay</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun nga 
	ay hindi naparoon sa dulaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sapol sa ika 
	pito ng gabi ay umalis nang ligalig at mapanglaw sa kanyang bahay: nakita 
	siyang makalawang pumasok na ang kasama'y iba't ibang tao; ng ika walo ay 
	nakita siya ni Makaraig na may binabantayan sa daang&nbsp;Hospital, sa kalapit ng 
	konbento ng <abbr>Sta.</abbr>&nbsp;Clara, nang kasalukuyang tinutugtog ang mga 
	kampana ng simbahan; nang ika siyam ay nakita siyang muli ni
	<span xml:lang="es" lang="es">Camaroncocido</span> sa paligid ng dulaan na 
	nakipag-usap sa isang wariy nag-aaral, pumasok at muling lumabas, at nawala 
	sa dilim na ibinibigay ng mga puno.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano sa 
	akin?--ang sabing muli ni <span xml:lang="es" lang="es">Camaroncocido</span>--ano 
	ang mahihita ko sa pagsasabi sa bayan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio, 
	gaya ng sabi ni Makaraig, ay hindi rin nanood ng palabas. Ang kaawaawang 
	nag-aaral sapol ng manggaling sa San&nbsp;Diego upang tubusin sa pagkaalila ang 
	kanyang katipang si Huli, ay muling hinarap ang kanyang mga aklat, ang 
	panahon niya'y dinadaan sa hospital, sa pag-aaral o sa pagkakalinga kay 
	Kapitan&nbsp;Tiago, na binabaka ang sakit nito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang may sakit 
	ay naging ugaling bugnot; sa kanyang masasamang sandali, kapag nanglalambot 
	dahil sa kakauntian ng apian na pinupunyagi ni Basiliong mapahina, ay 
	sinusumbatan ito, sinasaktan, minumura; tinitiis ni Basilio na kinakalamay 
	ang loob dahil sa batid na ang kanyang ginagawa ay ikabubuti ng 
	pinagkakautangan niya ng malaki, at kung gipit na gipit na lamang saka 
	napapahinuhod. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Matapos masiyahan ang gawi, ang masamang hilig, ay bumubuti 
	ang ulo ni Kapitan&nbsp;Tiago, nalulumbay, tinatawag siyang anak, napapaiyak sa 
	pag-aalala sa paglilinkod ng binata, ang mabuting pangangasiwa sa kanyang 
	mga paupahang bahay at sinasabing siya niyang pamamanahan; malungkot na 
	napapangiti si Basilio at iniisip na sa buhay na ito'y ginaganti pa ng 
	mabuti ang pag-ayo sa masamang hilig kay sa pagtupad sa katungkulan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi bibihirang naiisip niyang pabayaan nang lumubha ang sakit at patunguhin sa 
	libingan ang nag-aampon sa kanya, sa isang landas na kinalatan ng bulaklak 
	at magagandang larawan, kay sa pahabain ang buhay sa pamamagitan ng 
	pagtitipid.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hangal na tao 
	ako!--ang madalas na sabi sa sarili--ang karamihan ay hangal at yayamang 
	nagbabayad....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit 
	iniiiling ang ulo at inaalaala si Huli, ang malawak na kinabukasang nasa sa 
	kanyang harap; iniisip niyang mabuhay nang hindi dudungisan ang kanyang 
	budhi. Ipinatutuloy ang pangangalagang takda at nagbabantay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, ang 
	may sakit ay lumulubhang unti-unti sa araw araw. Si Basilio, na nagpasiyang 
	untian ng untian ang nahihitit o kung di man ay hindi pinapayagang humitit 
	ng higit kay sa karaniwan, ay natatagpuan niya sa panggagaling sa hospital o 
	sa isang pagdalaw na nakakatulog ang may sakit ng mabigat na tulog ng 
	naaapian, na naglalaway at namumutlang wariy patay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi mahulo ng binata 
	kung saan nanggagaling ang apian; ang mga tanging nagsisidalaw sa bahay ay 
	si Simoun at si Padre Irene, ang una'y bibihirang pumaroon, at ito 
	namang isa'y walang humpay sa pagbibilin sa kanya na higpitan at huwag 
	babaguhin ang pangangalaga at huwag punahin ang mga pagkamuhi ng maysakit, 
	sapagka't ang unang dapat ganapin ay ang mailigtas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tumupad kayo 
	sa inyong katungkulan, binata,--ang sabi sa kanya--tumupad kayo sa inyong 
	katungkulan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At binibigyan 
	siya ng isang munting <i>sermon</i> na ukol sa bagay na iyon, sa pamamagitan 
	ng isang buong pananalig at sigabo, na si Basilio'y nagkakaroon tuloy ng 
	pagkalugod sa nangangaral. Bukod sa roon ay pinapangakuan siya ni Padre Irene 
	ng isang mabuting mapapasukan, isang mabuting lalawigan, at pinabanaagan pa 
	sa kanya ang pangyayaring siya'y mahalal na katedratiko. Si Basilio naman, 
	kahit hindi napadadala sa mga pag-asa, ay nagpapakunwaring naniniwala at 
	sumusunod sa iniuutos ng sarili niyang budhi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang gabing 
	iyon, samantalang itinatanghal ang <i xml:lang="fr" lang="fr">Les Cloches de 
	Corneville</i>, si Basilio ay nag-aaral sa harap ng isang matandang dulang, 
	sa tulong ng liwanag ng isang ilawang langis, na ang pantallang bubog na 
	malabo ay nakatatakip at nakadidilim sa kanyang mukha. Isang lumang bungo, 
	ilang buto ng tao, at ilang makakapal na aklat na mabuti ang pagkakahanay ay 
	siyang nakakalat sa dulang na mayroon pang isang palanganang tubig at isang 
	esponha. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang amoy apiang nanggagaling sa kanugnog na silid, ay 
	nakapagpapabigat sa hangin at nakapagpapaantok sa kanya, ngunit ang 
	binata'y naglalaban sa pamamagitan ng pagbasa manakanaka sa kanyang noo't mga 
	mata, handa sa hindi pagtulog hanggang sa matapos ang aklat. Iyo'y isang 
	bahagi ng <i xml:lang="es" lang="es">Medicina Legal</i> at
	<i xml:lang="es" lang="es">Toxicologia</i> ni <abbr title="Doctor">Dr.</abbr>&nbsp;Mata, 
	isang aklat na kanyang nahiram at dapat isauli sa may-ari sa lalong madaling 
	panahon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang katedratiko ay ayaw magturo ng hindi alinsunod sa kumathang 
	iyon at si Basilio ay walang sapat na salapi upang makabili ng aklat na iyon 
	sapagka't sa dahilang yaon ay bawal ng mga tagasuri sa Maynila at kailangan 
	ang suhulan ang maraming kawani upang maipasok, ay malaking halaga ang 
	hinihingi ng mga mang-aaklat. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Buhos na buhos ang pag-iisip ng binata sa 
	kanyang pag-aaral, kaya't hindi man pinansin ang ilang mumunting aklat na 
	ipinadala sa kanyang galing sa labas na hindi maalaman kung saan, mga aklat 
	na tumutukoy sa Pilipinas, na doo'y kasama ang sa kapanahunang iyon ay 
	siyang napupuna ng lahat dahil sa masama at kalait-lait na pagpapalagay sa 
	mga anak ng bayan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Walang kapanapanahon si Basilio upang sila'y mabuksan; 
	marahil ay nakapipigil din sa kanya ang pag-aalala na hindi masarap ang 
	tumanggap ng isang pag-alimura o isang paghamon at hindi makapagtanggol o 
	makatugon. Noon nga, ang paglilitis sa ano mang lathala, ay nagpapabayang 
	dustain ang mga pilipino, ngunit ipinagbabawal sa mga ito ang sumagot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gitna ng 
	katahimikang naghahari sa bahay, na nabubulahaw lamang sa ilang mahinang 
	paghihilik na galing sa kabilang silid, ay nakadinig si Basilio ng madalas 
	na yabag sa hagdanan, mga yabag na dumaan sa <i xml:lang="es" lang="es">
	caida</i> at tungo sa kanyang kinalalagyan. Itinaas niya ang kanyang ulo, 
	nakitang nabukas ang pintuan at sumipot ang mapanglaw na anyo ni Simoun, sa 
	gitna ng kanyang pagkakamangha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Mula sa 
	pagtatagpo nila sa <abbr>S.</abbr>&nbsp;Diego, ay hindi pa nakikipagkita si 
	Simoun, ni sa binata, ni kay Kapitan&nbsp;Tiago.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang lagay 
	ng may sakit?--ang tanong na tiningnang sumandali ang silid at napatitig sa 
	mga mumunting maninipis na aklat, na aming binanggit, na hindi pa napuputol 
	ang mga dahon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang tibok ng 
	puso ay babahagya.... ang pulso ay mahinangmahina.... pagkain, ay hindi 
	makakain ng anuman,--ang tugong marahan ni Basilio na malungkot ang ngiti--sa 
	magmamadaling araw ay pinagpapawisan ng katakot-takot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sapagka't 
	nakikitang si Simoun, dahil sa tungo ng mukha, ay nakatingin sa mga tinurang 
	mumunting aklat at sa pangingilag na muling mabanggit ang pinag-usapan sa 
	gubat, ay nagpatuloy:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang buong 
	katawan ay nakakalatan na ng lason; bukas o makalawa ay mangyayaring mamatay 
	na wariy tinamaan ng lintik.... ang lalong maliit na sanhi, isang walang 
	kabuluhang bagay, isang sulak ng kalooban ay mangyayaring makamatay sa 
	kanya....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya ng 
	Pilipinas!--ang mapanglaw na sabi ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi napigil 
	ni Basilio ang isang ngiwi, at sa dahilang ipinasiya na niya ang huwag 
	muling mapag-usapan ang bagay, ay nagpatuloy na wariy walang anumang 
	nadinig:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang lalong 
	nakapagpapahina sa kanya ay ang mga pagpapanaginip, ang kanyang mga 
	pagkatakot....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya ng 
	pamahalaan!--ang muling turing ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May ilang 
	gabi nang nagising ng walang ilaw at inakalang siya'y nabulag; nanggulo ng 
	katakottakot, naghinagpis at linait ako na ang sabiy dinukit ko ang kanyang 
	mga mata.... Nang pumasok akong may dalang ilaw ay pinagkamalan akong si
	Padre Irene at tinawag akong kanyang tagapagligtas....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	pinag-ibhan sa pamahalaan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kagabi--ang 
	patuloy ni Basilio na nagbibingibingihan--ay nagbangon at hiningi ang kanyang 
	manok, ang kanyang manok na may tatlong taong patay na, napilitan akong 
	bigyan siya ng isang inahin, at ng magkagayon ay pinakapuripuri ako't 
	pinangakuan ng libolibo....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay tumugtog ang isang orasan ng ikasampu't kalahati.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	kinilabutan at pinigil ang binata sa isang kilos.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Basilio--ang 
	marahang sabi--pakinggan ninyo akong mabuti, sapagka't ang mga sandaling 
	ito'y lubhang mahalaga. Nakikita kong hindi man ninyo binuksan ang mga aklat 
	na ipinadala ko; wala kayong paglingap sa inyong bayan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binata'y 
	nagtangkang mangatwiran.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi na 
	kailangan!--ang matigas na patuloy ni Simoun--Sa loob ng isang oras ay susulak 
	ang himagsikan sa isang hudyat ko, at bukas ay wala na ang pag-aaral, wala 
	nang Universidad, wala kundi labanan at patayan. Inihanda ko na ang lahat at 
	hindi mahahadlangan ang aking tagumpay. Kapag kamiy nanaig, lahat niyong 
	makatutulong sa amin at hindi kumilos, ay aariing kalaban. Basilio naparito 
	ako upang ialok sa inyo ang inyong kamatayan o ang inyong tutunguhing 
	kinabukasan!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang aking 
	kamatayan o ang aking kinabukasan!--ang ulit na wariy walang nalilinawan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa piling ng 
	pamahalaan o sa piling namin--ang sabi ni Simoun--sa mga sumisiil o sa inyong 
	bayan. Magpasiya kayo sapagka't tumatakbo ang panahon! Naparito ako upang 
	kayo'y iligtas alang-alang sa mga alaalang nagtali sa atin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa mga 
	maniniil o sa aking bayan!--ang marahang ulit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binata'y 
	lito; tinitingnan ang manghihiyas ng matang kinalalarawanan ng pagkasindak, 
	naramdamang ang kanyang mga paa't kamay ay nanglalamig at libu-libong 
	nagkakasalimuut na pagkukuro ang nagdaraan sa kanyang pag-iisip; nakikitang 
	ang mga lansangan ay nagdadanak sa dugo, nadidinig ang putukan, napapagitna 
	siya sa mga patay at sugatan at katangi tanging lakas ng hilig! nakikita 
	niyang siya, na suot ang damit sa paggawa, ay nagpuputol ng mga hita't 
	nag-aalis ng mga punlo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hawak ko ang 
	kalooban ng pamahalaan--ang patuloy ni Simoun--aking ipinara at inaksaya ang 
	kaunti niyang lakas at magugugol sa mga haling na pagsalakay, at sinilaw ko 
	siya sa kapakinabangang maduduwit; ang mga pangulo niya ay tahimik na 
	nangasa dulaan ngayon at nangalilibang sa pag-iisip ng isang gabing lipus 
	kasayahan, ngunit walang isa mang hihilig na muli sa unan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mayroon akong 
	mga <i xml:lang="es" lang="es">regimiento</i> at mga taong nasa aking 
	kapamahalaan, pinapaniwala ko ang ilan na ang may utos ng panghihimagsik ay 
	ang General, ang iba'y pinaniwala kong ang mga prayle ang may kagagawan; ang 
	ilan ay binili ko sa pangako, sa katungkulan, sa salapi; ang marami, ang 
	maraming marami ay kikilos upang makaganti, sapagka't nangasisiil at sa 
	dahilang natatayo sa kalagayang mamatay o pumatay.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Si Kabesang Tales ay 
	nasa sa lupa at sinamahan ako hanggang dito! Inuulit ko sa inyo sasama kayo 
	sa amin o ninanasa ninyo ang malaan sa pagdaramdam ng aking mga kabig? Sa 
	mga sandaling mapanganib ang hindi pag-ayon sa kanino man ay isang paglagay 
	sa kamuhian ng dalawang pangkat na magkalaban.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makailang 
	hinaplos ni Basilio ang kanyang mukha na waring ibig magising sa isang 
	bangungot; naramdamang ang kanyang noo'y malamig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magpasiya 
	kayo!--ang ulit ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano.... 
	ang kailangan kong gawin?--ang tanong na ang tinig ay pipi, basag, mahina.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang bagay 
	na lubhang madali--ang tugon ni Simoun na ang mukha'y naliwanagan ng isang 
	sinag ng pag-asa--sa dahilang pamamahalaan ko ang kilusan, ay hindi ko 
	maiiwan ang alin mang labanan. Kailangan ko, na samantalang ang kaguluhan ay 
	nasa iba't ibang pook ng siyudad, ay panguluhan ninyo ang isang pulutong, 
	igiba ang pintuan ng <abbr>Sta.</abbr>&nbsp;Clara at kunin ninyo doon ang isang 
	tao na liban na sa akin at kay Kapitan&nbsp;Tiago ay kayo lamang ang 
	makakakilala.... Kayo'y hindi mapapanganib.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Maria 
	Clara!--ang bulalas ng binata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, si Maria 
	Clara!--ang ulit ni Simoun, at noon lamang nagkaroon ng tunog na malungkot at 
	malumanay ang kanyang tinig--ibig ko siyang iligtas, upang iligtas lamang 
	siya kung kaya ninasa ko ang mabuhay, nagbalik ako.... ginawa ko ang 
	himagsikan sapagka't ang isang himagsikan lamang ang makapagbubukas sa akin 
	ng pinto ng mga kombento!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay!--ani 
	Basilio na pinagduop ang kamay--nahuli kayo, lubhang huli!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At bakit?--ang 
	tanong ni Simoun na ikinunot ang kilay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Maria 
	Clara ay namatay na!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa isang 
	lundag ay napatindig si Simoun at hinandulong ang binata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Namatay?--ang 
	tanong na ang tinig ay nakapangingilabot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaninang 
	hapon, ika anim; ngayon marahil ay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	totoo!--ang sigaw ni Simoun na namumutla't ang mata'y nanglilisik--hindi 
	totoo! Si Maria&nbsp;Clara ay buhay, si Maria&nbsp;Clara ay kailangang mabuhay! Iyan 
	ay isang duwag na pagdadahilan.... hindi mamamatay, at ngayong gabiy 
	ililigtas ko siya o bukas ay patay kayo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinibit ni 
	Basilio ang kanyang balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May ilang 
	araw nang nagkasakit at ako ay pumaparoon sa kombento upang makibalita. 
	Tingnan ninyo, narito ang sulat ni Padre Salvi na dala rito ni
	Padre Irene. Magdamag na nag-iiyak si Kapitan&nbsp;Tiago na hinahagkan 
	at hinihingang tawad ang larawan ng kanyang anak hanggang sa natapos sa 
	paghitit ng maraming apian.... Kaninang hapon ay tinugtog ang kanyang
	<i xml:lang="es" lang="es">agonias</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah!--ang 
	bulalas ni Simoun na piniglan ng dalawang kamay ang ulo at napahinto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naaalaala 
	ngang nakadinig siya ng tugtog ng <i xml:lang="es" lang="es">agonias</i> 
	samantalang nanunubok sa paligid ng kombento.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Patay!--ang 
	mahinang bulong na waring ang nagsasalita'y isang anino--patay! namatay nang 
	hindi ko man lamang nakita, namatay ng hindi nalalamang ako'y nabubuhay nang 
	dahil sa kanya, namatay ng nagtitiis!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	pagdaramdam ng isang sigwang kalagimlagim, isang sigwang may kulog at buhawi 
	na walang patak ng ulan, hinagpis na walang luha, sigaw na walang salita, 
	nagngangalit sa kanyang dibdib at nagtatangkang umapaw na wariy buga ng 
	bolkan na malaong natimpi, ay biglang umalis sa kinalalagyang silid. 
	Nadinig siya ni Basilio na pumapanaog ng hagdan, na ang lakad ay walang 
	tuto; nadinig ang isang timping sigaw, sigaw na waring nagsasabi ng 
	pagsapit ng kamatayan, malalim, katangitangi, kahambal-hambal, kaya't ang 
	binata'y tumindig na namumutla't nanginginig sa kinauupan, ngunit nadinig 
	ang yabag na papalayo at ang pinto sa daan na nag-umugong sa pagkakasara.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaawang 
	tao!--ang bulong at ang kanyang mga mata'y napuno ng luha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At hindi na 
	naalaala ang pag-aaral, at ang tingin ay sa malayo, ay iniisip-isip ang 
	kapalaran ng dalawang iyon: ang isa'y binata, mayaman, bihasa, malaya, 
	nakapagpapasiya sa sariling kabuhayan, may magandang kinabukasan, at ang 
	babae'y kasingganda ng isang pangarap, malinis, lipus pananalig at walang 
	kamalayan sa lakad ng kamunduhan, nakakandong sa mga giliw at ngiti, 
	nalalaan sa isang maligayang pamumuhay, na sambahin ng kanyang mga kaanak at 
	igagalang sa mundo.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Ngunit gayon man, ang dalawang iyon na lipus ng 
	pag-ibig, puno ng mga adhika't pag-asa, dahil sa isang sawing kapalaran, ang 
	lalaki'y naglalagalag sa buong lupalop na tangay ng ipo-ipong dugo at luha, 
	naghahasik ng kasamaan at hindi kabutihan, inaapi ang kabaitan, at inaayo 
	ang masamang hilig, samantalang ang babae ay naghihingalo sa dilim na 
	mahiwaga ng <i xml:lang="es" lang="es">claustro</i> na kanyang pinasukan sa 
	paghanap ng kapayapaan, ngunit mga pagbabata marahil ang natagpo; malinis 
	at walang bahid dungis nang siya'y pumasok at naghingalo siya roong wariy 
	bulaklak na lugas....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Humimbing kang 
	mapayapa, sawing anak ng aking walang kapalarang bayan! Dalhin mo sa 
	libingan ang kariktan ng iyong kabataan, na linanta sa gitna ng paglusog! 
	Kapag ang isang bayan ay hindi makapaghandog sa kanyang malilinis na dalaga 
	ng isang payapang tahanan, sa pagkupkop ng banal na kalayaan; kapag ang 
	tanging maipamamana ng lalaki sa kanyang balo ay kahihiyan, pag-luha sa ina 
	at kaalipinan sa mga anak, mabuti nga ang kusain ninyo ang huwag nang 
	magbunga, at lunurin na sa inyong tiyan ang binhi ng mga kalaitlait na 
	iaanak. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ah, mabuti ka na, na hindi ka mangingilabot sa iyong libingan sa 
	pagkadinig ng sigaw ng mga naghihingalo sa kadiliman, ng mga nakababatid na 
	sila'y may pakpak ngunit nangakagapos, ng mga naiinis dahil sa walang 
	kalayaan. Tumungo ka na kaakbay ng mga pangarap ng makata sa kalangitang 
	walang hangan, anino ng babaeng nabanaag sa isang sinag ng buwan, na 
	ibinubulong ng maigkas na kawayanan.... </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mapalad ang mamatay ng mayroong 
	umiiyak, ng nag-iiwan sa puso ng sa kanya'y umiibig ng malinis na gunita, 
	isang banal na alaala, na hindi nadungisan ng karumaldumal na sigabo ng 
	kalooban na lalong lumalaki sa katagalang panahon! Sumulong ka, aalalahanin 
	ka namin! Sa malinis na simuy ng ating bayan, sa ilalim ng kanyang langit na 
	bughaw, sa ibabaw ng alon ng lawang nakukulong ng bulubunduking kulay sapiro 
	at baybaying esmeralda. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa kanyang malilinaw na batisan na nilililiman ng 
	mga punong kawayan, hinihiyasan ng mga bulaklak at binibigyang buhay ng mga 
	tutubit paroparo sa kanilang walang tungo at malikot na pagliliparan na 
	waring nangagsisipaglaro sa hangin. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa katahimikan ng ating mga gubat, sa 
	awit ng ating mga batisan, sa buhos na brillante ng ating mga talon ng 
	tubig, sa maningning na liwanag ng ating buwan, sa mga buntong hininga ng 
	hangin sa gabi, sa isang sabi, sa lahat ng bagay, na makapagpapaalala sa 
	larawan ng ginigiliw, ay makikita ka naming gaya ng pinangarap naming anyo 
	mo na marilag, maganda, nakangiting gaya ng pag-asa, kasinglinis ng liwanag, 
	datapwa'y malungkot at mapighating tinatanaw ang aming karumaldumal na 
	kalagayan.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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