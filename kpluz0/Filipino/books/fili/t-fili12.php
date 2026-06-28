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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XII. Placido Penitente</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Masama ang 
	loob at halos ang mga mata'y lumuluha ng lumalakad sa Escolta si Placido 
	Penitente upang tumungo sa Universidad ng <abbr>Sto.</abbr>&nbsp;Tomas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May mga ilang 
	linggo lamang na kararating na galing sa kanyang bayan at makalawa nang 
	sumulat sa kanyang ina na ang iniuukilkil ay ang kanyang nasang iwan ang 
	pag-aaral upang umuwi at maghanap buhay. Sinagot siya ng kanyang ina na 
	magtiistiis, makuha man lamang ang pagka <i xml:lang="es" lang="es">
	bachiller en artes</i>, sapagka't sayang namang iwan ang pag-aaral, matapos 
	ang apat na taong paggugugol at paghihirap ng isa't isa sa kanila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Saan buhat ang 
	pag-ayaw ni Penitente sa pag-aaral, gayong siya'y isa sa mga masumigasig at 
	bantog sa paaralang pinamamahalaan ni Padre Valerio sa Tanawan? 
	Doon ay nabibilang si Penitente na isa sa mga lalong mabuti sa latin at 
	matalas sa pakikipagkatwiranan, na marunong gumusot at maghanay ng mga 
	paguusap na lalong magaan at walang kahirapan; siya ang inaaring lalong 
	pinakamatalas ng kanyang mga kababayan, at dahil sa kabantugang iyon, ay 
	ibinibilang na siyang pilibustero ng kanyang kura, katunayang lubos na hindi 
	siya hangal ni taong walang namumuwangan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi mawatasan ng kanyang mga 
	kasama ang gayong nasang pag-uwi at iwan ang pag-aaral; wala namang 
	nililigawan, hindi manunugal, bahagya ng marunong ng hungkian at 
	kapangahasan na sa kanya ang pakikilaro ng isang <i>rebesino</i>; hindi 
	naniniwala sa payo ng mga prayle, kinukutya ang <i>tandang Basio</i>, may 
	salaping higit sa kailangan, may mahuhusay na damit; ngunit gayon man, ay 
	masama ang loob kung pumasok at kinasusuklaman ang mga aklat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa tulay ng 
	Espa&ntilde;a, na ang tanging bagay na taglay na ukol sa Espa&ntilde;a ay ang pangalan 
	lamang, sapagka't sampu ng kanyang mga bakal ay galing sa ibang lupain, ay 
	nakatagpo ng mahabang hanay ng mga binatang tungo sa loob ng Maynila upang 
	pumasok sa kanikanilang paaralang pinapasukan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang ilan ay suot taga Europa, 
	matutulin ang lakad, na dala ang mga aklat at kuaderno, may iniisip, 
	inaalaala ang kanilang mga lisyon at mga sinulat na ihaharap; ang mga ito'y 
	taga Ateneo. Ang mga taga Letran ay napupuna sapagka't lahat halos ay suot 
	pilipino, sila ang lalong makapal at walang maraming aklat. Ang bihis ng mga 
	taga Universidad ay lalong maayos at makisig, mararahan ang lakad at madalas 
	pang tungkod ang dala at hindi aklat. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang kabataang nag-aaral sa Pilipinas 
	ay hindi mapanggulo at mapag-ingay; nangaglalakad na wariy may iniisip. Ang 
	sino mang makakita sa kanila ay magsasabing sa harap ng kanilang mga mata ay 
	walang ano mang pag-asang natatanaw, ni magandang kinabukasan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kahit na sa 
	mga ilan ilang dako'y nakapagpapasaya sa hanay ang matalaghay at makulay na 
	anyo ng mga nag-aaral na babae sa <span xml:lang="es" lang="es">Escuela 
	Municipal</span>, na may mga sintas sa balikat at bitbit ang kanilang mga 
	pinag-aaralang aklat at kasunod ang kanilang mga alila, ay bahagya nang 
	madinig ang isang tawa, bahagya nang madinig ang isang aglahi; walang mga 
	awitan; walang masasayang parunggit; kung baga man ay mabibigat na biro, 
	awayan ng maliliit. Ang mga malalaki ay karaniwan nang walang kibo at maayos 
	ang kagayakan na gaya ng mga nag-aaral na aleman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Placido ay 
	naglalakad sa liwasan ni Magallanes upang pumasok sa butas--dating pinto--ng
	<abbr>Sto.</abbr>&nbsp;Domingo nang biglang tumanggap ng isang tampal sa balikat 
	na siyang nakapagpalingon sa kanyang bigla, na masama ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hoy, 
	Penitente, hoy, Penitente!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tumampal 
	pala ay ang kasama niyang si Juanito Pelaez, ang mapaglangis at minamahal ng 
	mga guro, walang kapara sa kasamaan at kalikutan, may tinging mapanukso at 
	ngiting mapagbiro. Anak ng isang mestisong kastila, mayamang mangangalakal 
	ng isa sa mga arrabal, na umaasa sa katalinuhan ng binata; dahil sa kanyang 
	pagkamakulabid ay hindi nahuhuli sa iba, may ugaling mapagbiro ng masama sa 
	lahat at pagkatapos ay magkakanlong sa likuran ng mga kasama at may 
	katangitangi siyang kakubaan na lumalaki kailan ma't may panunuksong 
	ginagawa at nagtatawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakapag-aliw 
	ka bang mabuti, Penitente?--ang tanong na kasabay ang mga malakas na 
	pagtampal sa balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ganoon, 
	ganoon--ang sagot na may kamuhian ni Placido--at ikaw?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuting 
	mabuti! Sukat ba namang anyayahan ako ng kura sa Tiani, na sa kanyang bayan 
	ako magpahinga; naparoon ako........ kaibigan! Kilala mo ba si Padre Camorra? 
	Siya'y isang kurang mapagpaumanhin, mabuting kaibigan, matapat, lubhang 
	mapagtapat, kagaya ni Padre Paco.... At sa dahilang maraming 
	dalagang magaganda doon, ay nanapatan kaming dalawa, ang pigil niya'y 
	gitarra at kumakanta ng mga peteneras at ako nama'y biolin.... Masasabi ko 
	sa iyo, kaibigan, na gayon na lamang ang saya namin; walang bahay na hindi 
	namin inakyat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Bumulong sa 
	tainga ni Placido ng ilang salita at pagkatapos ay nagtawa. At sa dahilang 
	nagpakita ng pagkakamangha si Placido, ay idinagdag pang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Maisusumpa ko 
	sa iyo! At walang hindi pangyayari, sapagka't sa pamamagitan ng isang utos ng 
	pamahalaan ay maaaring pawiin ang ama, asawa o kapatid at tapus ang 
	salitaan! Gayon man ay nakatagpo kami ng isang ungas, katipan mandin ni 
	Basilio sa akala ko. Napakaulol niyong si Basilio! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Magkaroon ba naman ng 
	niligawang hindi marunong ng wikang kastila, walang yaman at naging alila 
	pa! Masungit na masungit ngunit maganda. Isang gabiy hinambalos ni Padre &nbsp;Camorra ang dalawang nanapatan sa kanya at salamat na lamang at 
	hindi nangapatay. Ngunit gayon man ay masungit pa rin ang babae. Datapwa'y 
	susuko rin siya na gaya ng iba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Juanito 
	Pelaez ay malakas na humahalakhak na wariy ikinaliligaya niyang lubos ang 
	gayon. Minasdan siyang masama ang loob ni Placido.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hintay ka 
	pala ano ba ang iniulat kahapon ng katedratiko?--ang tanong na iniba ang 
	salitaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahapon ay 
	walang pasok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oho! At 
	kamakalawa?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tao ka, 
	Huebes, e!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga pala 
	napakahayop ako! Alam mo Placido na nagiging hayop ako? At noong Mierkoles?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Noong 
	Mierkoles? Hintay ka.... niyong Mierkoles ay umambon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mainam! at 
	noong Martes?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Noong Martes 
	ay pista ng katedratiko at hinandugan namin siya ng isang orkesta, kumpol ng 
	mga bulaklak at ilan pang handog....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah, 
	putris!--ang bulalas ni Juanito--nakalimutan ko nga pala, napakahayop ako! At 
	itinanong ba ako?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ni 
	Penitente ang kanyang balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ayawan ko, 
	ngunit ibinigay sa kanya ang talaan ng mga may gawa ng pista.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Putris!.... 
	at noong Lunes ano ang nangyari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa dahilang 
	siyang unang araw ng pasukan ay binasa ang talaan ng mga pangalan at 
	itinakda ang lisyon: ang ukol sa mga salamin. Tingnan mo; mula rito hanggang 
	doon, isasaulo, walang labis walang kulang.... tatalunan ang kaputol na ito 
	at ito ang isusunod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At itinuturo 
	ng daliri sa pisika ni Ramos ang mga dakong pag-aaralan, ng biglang 
	sumalipadpad sa hangin ang aklat dahil sa isang tampal na papaitaas na 
	ibinigay ni Juanito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya bayaan 
	mo nga ang lisyon, mag <i>ipit na araw</i> na tayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinatawag na
	<i>ipit na araw</i> ng mga nag-aaral sa Maynila, ang araw na napapagitna sa 
	dalawang kapistahan, na inaalis at pinapawi sa kaibigang sarili ng mga 
	nag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam mo bang 
	napakahayop mo nga?--ang tugong pagalit ni Placido samantalang pinupulot ang 
	kanyang aklat at mga papel.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Halinang mag
	<i>ipit na araw</i>--ang ulit ni Juanito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ayaw si 
	Placido: hindi dahil sa pagkukulang ng dalawa'y hindi itutuloy ang klase ng 
	mahigit sa isang daa't limang pu. Naaalaala ang mga paghihirap at pag-iimpok 
	ng kanyang ina na siyang nagbibigay ng ginugugol niya sa Maynila at siyang 
	nagsasalat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sumandaling iyon ay pumapasok sila sa butas ng <abbr>Sto.</abbr>&nbsp;Domingo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Maalala ko 
	pala--ang bulalas ni Juanito ng makita ang liwasan sa harap ng 
	bahay-aduana--alam mo bang ako ang natungkulang mangilak ng ambagan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Anong 
	ambagan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang sa 
	monumento.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Anong 
	monumento?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alin pa! ang 
	sa kay Padre Baltazar hindi mo ba nalalaman?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sino ba 
	ang Padre Baltazar na iyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba! isang 
	dominiko! Kaya't lumapit ang mga pari sa mga nag-aaral. Sulong na, magbigay 
	ka na ng tatlo o apat na piso upang makitang tayo'y hindi maramot! Upang 
	huwag masabing sa pagtatayo ng isang estatua ay ang alapot nila ang dinukot. 
	Sulong na Placidete! hindi mawawalang kabuluhan ang <span class="locked">
	salapi mo!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sinabayan 
	ang salitang ito ng isang makahulugang kindat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naalaala ni 
	Placido iyong isang nag-aaral na nakalalampas sa pagsusuri dahil sa 
	paghahandog ng kanario, kaya't nagbigay ng tatlong piso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan mo, 
	isusulat kong maliwanag ang iyong pangalan upang mabasa ng propesor, 
	nakikita mo ba? Placido Penitente, tatlong piso. Ah! tingnan mo! Sa loob ng 
	ikalabing limang araw ay pista ng propesor sa <i xml:lang="es" lang="es">
	Historia Natural</i>.... Alam mong napakamasaya, na hindi naglalagay ng 
	pagkukulang at hindi tumatanong ng lisyon. Kaibigan, dapat tayong gumanti ng 
	utang na loob!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano, dapat ba 
	nating handugan ng isang pista? Ang orkesta ay dapat na maging kaparis ng 
	dinala ninyo sa katedratiko sa Pisika.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano sa akala 
	mo kung gawin nating tigalawang piso ang ambagan? Sulong Placiding, magpauna 
	ka sa pagbibigay, sa gayon ay mauuna ka sa talaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	ibinigay ng walang gatol ni Placido ang hinihinging dalawang piso, ay 
	idinagdag ang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hoy, apat na 
	ang ibigay mo, at saka ko na isasauli sa iyo ang dalawa; upang maging pain 
	lamang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung isasauli 
	mo rin ano't ibibigay ko pa sa iyo? Sukat nang ilagay mong apat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah, siya nga 
	pala! napakahayop ako! alam mong nagiging hayop ako ngayon? Ngunit ibigay 
	mo na rin sa akin upang ipakita ko sa iba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Upang huwag 
	pabulaanan ni Placido ang kura na naglagay sa kanya ng pangalan, ay ibinigay 
	ang hinihingi sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumating sila 
	sa Universidad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa papasukan 
	at sa hinabahaba ng banketa na nakalatag sa palibid ng Unibersidad ay 
	nangaghihintuan ang mga nag-aaral na nag-aantay ng pagpanaog ng mga 
	propesor. Ang mga nag-aaral ng taong paghahanda upang mag-aral ng
	<i xml:lang="es" lang="es">Derecho</i>, ikalimang taon ng
	<i xml:lang="es" lang="es">segunda ense&ntilde;anza</i>, at ng paghahanda upang 
	mag-aral ng <i xml:lang="es" lang="es">Medicina</i> ay nagkakahalobilo: ang 
	mga huling tinuran ay madaling makilala dahil sa kanilang kagayakan at sa 
	kanilang kiyas na hindi nakikita sa iba: ang marami sa kanila ay galing sa
	<span xml:lang="es" lang="es">Ateneo Municipal</span> at kapiling nila ang 
	makatang si Isagani na ipinakikilala sa isang kasama ang panganganinag ng 
	liwanag. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang pulutong ay nagtatalotalo, nagkakatwiranan, bumabanggit ng 
	sinabi ng propesor, ng mga natatala sa aklat, ng mga
	<i xml:lang="es" lang="es">principios escolasticos</i>; sa ibang pulutong ay 
	nagkukumpayan ng mga aklat, sa pamagitan ng mga tungkod ay iginuguhit sa 
	lupa ang ibig ipakilala; sa dako pa roon ang nangalilibang naman sa panonood 
	sa mga mapanatang tumutungo sa kalapit na simbahan, at kung ano ano ang 
	ibinubuhay dahil sa namamalas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang 
	matandang babae na akay ng isang dalaga ay papilaypilay na nagdadasal; 
	nakatungong lumalakad ang binibini, natatakot-takot, nahihiyang dumaan sa 
	harap ng gayong karaming tumitingin; itinataas ng matanda ang kanyang saya 
	na kulay kape ng mga kakapatid ni <abbr>Sta.</abbr>&nbsp;Rita, upang ipakita ang 
	matatabang paa at mga medias na puti; kinagagalitan ang kanyang kasama at 
	tinitingnan ng masamang tingin ang mga nanonood.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga <i>
	saragate</i>!--ang pangitngit na bulong--huwag mo silang tingnan, itungo mo 
	ang iyong ulo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	napupuna, ang lahat ay nagiging sanhi ng biruan at buhaybuhay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Minsan ay 
	isang mainam na <i xml:lang="es" lang="es">victoria</i> na hihinto sa piling 
	ng pintuan upang iwan doon ang isang mag-aanak na mapanata; dadalaw sa 
	Birhen del Rosario sa kanyang piniling araw: ang mga mata ng nanonood ay 
	handang lahat upang tanawin ang anyo at laki ng paa ng mga binibini sa 
	pag-ibis sa sasakyan: minsan ay isang nag-aaral na lumalabas sa pintuan na 
	taglay pa sa mukha ang pagkakapanalangin: dumaan sa simbahan upang idalangin 
	sa Birhen na mangyaring maliwanagan niya ang lisyon, upang tingnan kung 
	naroroon ang kanyang nilalangit, makipagsulyapan at tumungo sa paaralan na 
	taglay sa alaala ang mga matang magiliw na iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit 
	namatyag sa mga pulutong ang galawan, isang waring pagaantabay, at si 
	Isagani ay napatigil at namutla. Isang sasakyan ang huminto sa pintuan: ang 
	magkaparis na kabayong puti ay kilalang-kilala. Yaon ang sasakyan ni Paulita 
	Gomez na nakalundag na agad sa lupa, na mabilis na wariy ibon, na hindi 
	binigyang panahong makita ng mga nanonood ang kanyang paa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang mainam 
	na kilos at isang haplos ng kamay ay naayos ang mga tupi ng kanyang saya, at 
	sa isang matuling sulyap na wariy hindi kinukusa ay nakita si Isagani, 
	bumatit ngumiti. Bumaba naman si Aling&nbsp;Victorina, tumingin ng paimbabaw sa 
	kanyang salamin, nakita si Juanito Pelaez, ngumiti at binati ito ng magiliw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani ay 
	sumagot ng bating takot, na namumula dahil sa lugod; si Juanito ay 
	nagpakayukoyuko, nag-alis ng sombrero at ikinilos ang mukha na kagaya ng 
	bantog na komiko at karikato Panza kung tumatanggap ng pagakpakan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Mecachis!</i> 
	Kay gandang dalaga!--ang bulalas ng isa, na humanda sa pagyao--sabihin ninyo 
	sa katedratiko na ako'y malubha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At si Tadeo, 
	ito ang kanyang pangalan, ay pumasok sa simbahan upang sundan ang dalaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Tadeo ay 
	pumaparoon araw araw sa Unibersidad upang itanong kung may pasok at tuwi 
	na'y nagtataka kung bakit may pasok: mayroon siyang hinalang may isang
	<i xml:lang="es" lang="es">cuacha</i> na panay at walang katapusan at 
	inaantay niyang dumating sa bawa't sandali. At bawa't umaga, matapos na 
	hindi mangyari ang mungkahi niyang magliwaliw, ay aalis na nagdadahilang may 
	malaking kagipitan, o gagawin, o sakit, sa sandali pa namang ang kanyang mga 
	kasama ay papasok sa klase. Ngunit sa di mabatid na kaparaanan ay 
	nakalalampas si Tadeo sa mga pagsusuri, ginigiliw ng kanyang mga propesor at 
	nahaharap sa isang magandang kinabukasan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	naman ay nagsisimula ang mga kilusan at gumagalaw ang mga pulupulutong; 
	pumanaog na sa klase ang propesor sa Pisika at Kimika.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	nag-aaral, na waring nawalan ng pag-asa, ay pumasok sa loob ng paaralan na 
	nangakabitiw ng ilang bulalas sa di kasiyahang loob. Si Placido Penitente ay 
	nakisunod sa karamihan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Penitente, 
	Penitente!--ang tawag sa kanyang palihim ng isa--lumagda ka rito!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano iyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag mo nang 
	tanungin, lumagda ka!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Waring naramdaman ni Placido na may pumipirol sa kanyang tainga; nasa sa 
	alaala niya ang kabuhayan ng isang kabisa sa kanyang bayan, na dahil sa 
	pagkakalagda sa isang kasulatang hindi batid ang laman, ay nabilanggong 
	malaon at kaunti pang napatapon. Upang huwag niyang malimot ang pangyayaring 
	iyon ay pinirol siya ng malakas sa tainga ng isa niyang amain. At kailan 
	mang nakakadinig siya ng salitaang ukol sa paglagda ay waring nararamdaman 
	niya sa kanyang tainga ang sakit na tinanggap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Patawarin mo 
	ako, kasama, ngunit hindi ako lumalagda sa ano man, kailan pa ma't hindi ko 
	pa nauunawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakahangal 
	mo! nakalagda na rito ang dalawang <i xml:lang="es" lang="es">carabineros 
	celestiales</i> ano pa ang <span class="locked">ikatatakot mo?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pangalang
	<i xml:lang="es" lang="es">carabineros celestiales</i> ay nakapagbibigay 
	tiwala. Yaon ay isang banal na pulutong na itinatag upang tumulong sa&nbsp; 
	Diyos&nbsp; 
	sa pakikibaka sa dilang kasamaan, upang pigilin ang pagpasok ng
	<i xml:lang="es" lang="es">contrabando heretico</i> sa talipapa ng bagong 
	Siyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lalagda na 
	sana si Placido upang matapos na lamang ang usap sapagka't nagmamadali; ang 
	kanyang mga kasama ay nagdadasal na ng <i xml:lang="la" lang="la">O Thoma</i>, 
	ngunit naramdaman niya manding pinipigilan ng kanyang amain ang kanyang 
	tainga, kaya't nagsabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Makatapos na 
	ang klase! ibig ko munang mabasa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakahaba, 
	alam mo ba? ang bagay ay upang gumawa ng isang kahilingang laban, sa tuwid 
	na sabi, isang tutol. Alam mo ba? Si Makaraig at ilan pang kasama ay 
	humihinging magbukas ng isang akademia ng wikang kastila, bagay na isang 
	malaking kaululan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, siya! 
	kasama, mamaya na sapagka't nangagsisimula na--ang sabi ni Placido na 
	nagpupumiglas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit, 
	hindi naman bumabasa ng talaan ang inyong propesor!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, kung 
	minsan ay bumabasa. Mamaya na! mamaya na! At saka.... ayokong sumalungat kay 
	Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit hindi 
	naman pagsalungat, lamang ay......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi na siya 
	nadinig ni Placido, malayo na't nagtutumulin sa pagtungo sa klase. 
	Nakadinig ng iba't ibang <i xml:lang="la" lang="la">adsum! adsum!</i> 
	putris, binabasa ang talaan!.... nagmadali at dumating sa pinto ng nasa 
	letrang Q pa naman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tinamaan 
	ng...!--ang bulong na napakagat labi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nag-alinlangan 
	kung dapat o hindi dapat pumasok; ang guhit ay nakalagay na at hindi na 
	maaalis. Kaya lamang dumadalo sa klase ay hindi upang mag-aral kundi upang 
	huwag lamang magkaroon ng <em>guhit</em>; walang ginagawa sa klase kundi 
	pagsasabi ng lisyong sinaulo, basahin ang aklat at malaki na ang 
	mangisangisang tanong na malabo, malalim, nakalilito, wariy bugtong; tunay 
	nga na di nawawala ang munting pag-aaral--ang dati rin--na ukol sa 
	kapakumbabaan, sa pagka-maalinsunod, sa paggalang sa mga pari, at siya, si 
	Placido, ay mapakumbaba, masunurin at magalang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Aalis na sana ngunit 
	naaalaalang nalalapit ang paglilitis at hindi pa siya natatanong ng propesor 
	at waring hindi siya napupuna; mabuting pagkakataon iyon upang siya'y mapuna 
	at makilala. Ang makilala ay katimbang ng pagkaraan ng isang taon, sa 
	dahilang kung walang anuman ang magbigay ng <i xml:lang="es" lang="es">
	suspenso</i> sa isang hindi kilala, ay kailangang magkaroon ng pusong 
	matigas upang huwag mabakla sa pagkakita sa isang binata na isinisisi sa 
	araw-araw ang pagkaaksaya ng isang taon niyang buhay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pumasok nga si 
	Placido na hindi patiyad na gaya ng dating ugali kundi pinatunog pa ang 
	kanyang mga takon ng sapatos. At labis na tinamo ang ninanasa! Tiningnan 
	siya ng katedratiko, ikinunot ang noo at iginalaw ang ulo na waring ang ibig
	<span class="locked">sabihin, ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	galang, magbabayad ka rin sa akin!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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