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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XIV. Isang Tahanan ng mga Mag-aaral</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lubhang 
	karapatdapat dalawin ang bahay na tinitirahan ni Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Malaki, 
	maluwang, may dalawang patong na entresuelo na may magagarang salang-bakal, 
	wariy isang paaralan sa mga unang oras ng umaga at isang hinalong linugaw 
	magmula naman sa ika sampu. Sa mga oras ng paglilibang ng mga nangungupahan, 
	mula sa pagpasok sa maluwang na silong hanggan sa itaas ng kabahayan, ay 
	walang humpay ang tawanan, ang kaguluhan at ang galawan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">May mga binatang 
	damit pangbahay na naglalaro ng sipa, nangagsasanay sa pagpapalakas sa 
	pamagitan ng mga trapesiong gawa lamang nila; sa hagdanan ay nagpapamook ang 
	walo o siyam na ang mga sandata ay mga tungkod, mga sibat, mga kalawit at 
	silo, ngunit ang mga lumulusob at nilulusob ay karaniwan nang hindi 
	nagkakasakitan; ang mga palo ay tumatama sa likod ng intsik na nagbibili ng 
	kanyang tindang mga kakanin at nakasisirang kalamay, sa tabi ng hagdan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nalilibid siya ng maraming bata, binabatak ang kanyang buhok na kalag na't 
	gusot, inaagawan siya ng isang kalamay, tinatawaran sa halaga, at ginagawan 
	ng iba't ibang kabuktutan. Ang intsik ay nagsisisigaw, nagtutungayaw sa 
	lahat ng wikang kanyang batid, sampu sa kanyang sariling wika, 
	mag-iiyakiyakan, tatawa, sasamo, isasaya ang mukha kung walang mangyari sa 
	kanya sa masama, o pabalik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i>A, muasama 
	yan!</i>--<i>Bo kosiesia</i>--<i>Hienne kilistiano</i>--<i>Kayo limonyo</i>--<i>Salamahe!</i>--<i>tusu 
	tusu!</i> at <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Piph, paph! walang kailangan! Ililingong nakangiti ang mukha; kung sa 
	kanyang likod lamang tumatama ang mga palo ay patuloy ding walang 
	kagambagambala sa kanyang pangangalakal, sumisigaw na lamang ng:--<i>No hugalo</i> e? <i>no 
	hugalo</i>! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Ngunit pag tumama sa bilao ng kanyang mga kakanin, ay saka 
	susumpang hindi na babalik, pupulas sa kanyang bibig ang lahat ng tungayaw 
	at lait na maiisip; ang mga bata naman ay lalong nagsusumidhi upang siya'y 
	pagalitin at pag nakitang naubos na ang masasabi ng intsik at sila naman ay 
	busog na sa hupya at inasnang buto ng pakuwan ay saka lamang siya babayaran 
	ng walang kadayadaya at ang intsik ay aalis na masaya, tumatawa, kumikindat 
	at tinatanggap na wariy himas ang mahihinang palo na ibinibigay ng mga 
	nag-aaral na bilang pinakapaalam.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huaya, 
	homia!!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	tugtugan ng piano at biolin, ng biguela at kurdion ay nakikisaliw sa tunog 
	ng paluan ng baston sa pag-aaral ng eskrima. Sa paligid ng isang malapad at 
	mahabang dulang ay sumusulat ang mga nag-aaral sa Ateneo, ginagawa ang 
	kanilang mga sulating ihaharap, niyayari ang kanilang mga suliranin sa 
	piling ng mga ibang sumusulat sa mga papel na kulay rosa at may palamuting 
	ukit na batbat ng mga guhit sa kanikanilang mga iniibig; ang isa'y gumagawa 
	ng dula sa siping ng isang nag-aaral na tumugtog ng plauta, kaya't ang mga 
	tula'y napasusuwitan na sa simula pa lamang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa dako pa roon, ang may 
	katandaan, mga nag-aaral ng <i xml:lang="es" lang="es">facultad</i>, na, mga 
	sutlang midias at sapatilyang may burda ang suot, ay nangaglilibang sa 
	pagpapagalit sa mga batang pinipirol sa tainga na namumula na tuloy dahil sa 
	kapipingot; dalawa o tatlo ang pumipigil sa isang maliit na sumisigaw, 
	umiiyak at ipinagtatanggol sa pamagitan ng kasisipa ang tali ng kanyang 
	salawal: ibig lamang na iwan siyang kagaya noong sumipot sa liwanag.... 
	pumapalag at umiiyak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang silid, sa paligid ng isang
	<i xml:lang="es" lang="es">mesa velador</i>, ang apat ay nagrerebesino sa 
	gitna ng tawanan at biruang ikinayayamot ng isang kunwari nag-aaral ng 
	lisyon ngunit, ang tunay ay nag-aantay lamang na makahalili at siya naman 
	ang makasugal. Ang isa'y dumating na wariy nagugulumihanan sa gayon, 
	gulilat at lumapit sa mesa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakamabisyo 
	kayo! Kaagaaga ay sugal na! Tingnan ko, tingnan ko! Tunggak! ihatak mo ang 
	tatlong espada!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At itinupi ang 
	kanyang aklat at nakilaro naman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nadinig ang 
	sigawan, kumalabog ang hampasan. Ang dalawa'y nag-away sa kanugnog na silid: 
	isang nag-aaral na pilay na napabarahin at isang kaawaawang kagagaling pa 
	lamang sa kanyang lalawigan. Ito, na bahagya pa lamang nagsisimula sa 
	pag-aaral, ay nakatagpo ng isang aklat na ukol sa pilosopia at binasang 
	malakas, walang kamalakmalak at masama ang diin sa pagbigkas ng mga
	<span class="locked">banggit na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Cogito, 
	ergo sum!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inari ng 
	pilay, na siya'y pinatatamaan, ang ibang kasama'y namagitna't pumapayapa, 
	ngunit ang katunayan ay naguulot pa nga, kaya't sa huliy nangagpanuntukan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa kakanan ay 
	isang binatang may isang latang sardinas, isang boteng alak at ang mga baong 
	dala na galing sa kanyang bayan, ay naglulunggati sa pagpupumilit na siya'y 
	saluhan sa pagkain ng kanyang mga kaibigan, samantalang ang mga kaibigan 
	naman ay nangaglulunggati rin sa pag-ayaw. Ang iba'y nangaliligo sa
	<i xml:lang="es" lang="es">azotea</i> at pinagsasanayan ang tubig sa balon 
	sa pagbobombero, nangaglalaban ng sabuyan sa gitna ng kagalakan ng mga 
	nanonood.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	ingay at kaguluhan ay unti-unting napapawi samantalang dumarating ang ilang 
	may katangiang nag-aaral, na tinipan ni Makaraig upang balitaan ng lakad ng 
	Akademia ng wikang kastila. Si Isaganiy sinalubong ng buong giliw, na gaya 
	rin ng taga Espa&ntilde;ang si Sandoval, na kawaning dumating sa Maynila at 
	tinatapos ang kanyang pag-aaral, na kaisang lubos sa mga hangarin ng mga 
	nag-aaral na pilipino. Ang halang na inilalagay ng politika sa mga lahi ay 
	nawawala sa mga paaralan na wariy natutunaw sa init ng karunungan at ng 
	kabataan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa kawalan ng 
	mga Ateneo at lipunang ukol sa katarungan, sa wika at sa politika ay 
	sinasamantala ni Sandoval ang lahat ng paglilipon upang gamitin ang kanyang 
	malaking kaya sa pagsasalaysay, sa pamamagitan ng pagbigkas ng mga talumpati, 
	pakikipagtalo sa kahit na anong sanhi at napapapagakpak ang mga kaibigan at 
	nakikingig sa kanya. Nang mga sandaling yaon ang sanhi ng salitaan ay ang 
	pagtuturo ng wikang kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang si 
	Makaraig ay hindi pa dumarating, ang mga paghuhulohulo ay siyang idinadaos.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano kaya ang 
	nangyari?--Ano ang ipinasiya ng General?--Ipinagkait ang 
	pahintulot?--Nagtagumpay si Padre Irene?--Nagtagumpay si Padre &nbsp;Sibyla?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ito ang 
	tanongtanungan ng isa't isa, mga tanong na ang tanging makasasagot ay si 
	Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga 
	binatang nagkakalipon ay may mga may palagay na loob na gaya ni Isagani at 
	ni Sandoval na nakikinikinita nang yari ang bagay, at pinag-uusapan na ang 
	pagkalugod at pagpupuri sa Pamahalaan, ang ukol sa pag-ibig sa tinubuan ng 
	mga nag-aaral, mga kapalagayang loob na nag-udyok kay Juanito Pelaez upang 
	kanyahin ang malaking bahagi ng karangalan ng pagtatatag ng Kapisanan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	lahat ng ito'y sinasagot ng di nasisiyahang loob na si Pecson,--isang 
	matabang kung tumawa'y animo bungo--sa pagsasalita ng ukol sa mga sulsol na 
	makapangyayari, na ang Obispo&nbsp;A., si Padre&nbsp;B., ang Provincial&nbsp;C. ay 
	pinagtanungan o hindi at ang ipinayo o hindi ay ang ipasok sa bilanguan ang 
	lahat ng nasa kapisanan, balitang nagdudulot ng di ikapalagay ni Juanito 
	Pelaez, na nauutal naman sa pagsasabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba, huwag 
	ninyo akong ihalo!......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Sandoval, 
	dahil sa kanyang pagkakastila at pagkamalaya, ay nag-iinit:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	p....!--aniya--ang ganyan ay isang paghihinala ng masama sa General! Alam ko 
	ngang napakamakaprayle, ngunit sa mga ganyang bagay ay hindi napasusulsol 
	sa mga prayle! Ibig baga ninyong turan sa akin, Pecson, kung ano ang 
	pinanunulayan ninyo sa pagsasabing walang sariling pasiya ang General?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi iyan 
	ang sinasabi ko, Sandoval--ang sagot ni Pecson na sa pagtawa'y ipinatatanaw 
	halos ang kanyang huling bagang--sa ganang akin, ang General, ay may sariling 
	kapasiyahan, ito nga, ang kapasiyahan sa lahat ng nasa abot ng kanyang 
	kamay...... Ito'y lubhang maliwanag!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sulong pa 
	rin! Ngunit turan ninyo sa akin ang isang pangyayari--ang sigaw ni 
	Sandoval--iwasan natin ang mga pagtatalong walang katuturan, ang mga salitang 
	walang kabuluhan, at tumungo tayo sa mga pangyayari--ang dugtong na sinabayan 
	ng makiyas na kilos ang pagsasalita--Mga pangyayari, mga ginoo, mga 
	pangyayari; ang hindi gayon ay mga hulohulong di ko ibig tawaging 
	pilibustero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Pecson ay 
	tumawa at sinabat siyang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lumabas na 
	ang pilibusterismo! Ngunit hindi na ba mangyayaring makapagkatwiranan ng 
	hindi sasapit sa masasamang bintang?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Sandoval ay 
	tumutol at humihingi ng mga pangyayaring tunay sa pamamagitan ng isang 
	munting talumpati.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi pa 
	nalalaunang dito'y nagkaroon ng usapin ang ilang taong bayan at ilang 
	prayle, at pinasiyahan ng samantalang General, na, ang humatol ay ang 
	Provincial ng mga paring kausap--ang sagot ni Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At muling 
	nagtawa na wariy walang kabuluhan ang pinag-uusapan. Tumukoy ng mga 
	pangalan, araw at nangakong magdadala ng mga kasulatang magpapatunay ng 
	paraang ginamit sa pagkakapit ng katwiran.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit saan 
	mananangan, sabihin ninyo sa akin, saan mananangan upang huwag pahintulutan 
	ang maliwanag na maliwanag na ikabubuti at kailangan?--ang tanong ni 
	Sandoval.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinibit ni 
	Pecson ang kanyang balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na 
	mapapanganib ang tibay ng tinubuang lupa....--ang tugon na ang pagsasalita'y 
	kagaya ng isang abogado na bumabasa ng isang <i xml:lang="es" lang="es">
	alegato</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	malaking bagay! Ano mayroon sa tibay ng tinubuang lupa ng mga kaparaanan sa 
	mabuting pagsasalita?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May mga 
	doctor ang Santa Madre Iglesia.... Ano ang malay ko? marahil ay pangilagang 
	mabatid namin ang mga batas at aming masunod.... Ano kaya ang mangyayari sa 
	Pilipinas sa araw na ang isa't isa sa amin ay magkaantiluhan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi naibigan 
	ni Sandoval ang ayos na tugunan at pabiro ng kanilang pag-uusap. Sa paraang 
	iyon ay hindi maaaring sumipot ang isang talumpating may kaunting kabuluhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag ninyong 
	idaan sa biro--ang sabi--ang pinag-uusapan ay mahalaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iligtas ako 
	ng Lumikha sa pagbibiro kung napapagitna ang mga prayle!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit saan 
	mananangan....?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa dahilang 
	sa gabi ang pag-aaral--ang patuloy ni Pecson, na gayon din ang ayos, na 
	waring ang pinag-uusapan ay kilala na't alam--ay mangyayaring banggitin na 
	pinakasagabal ang kahalayan, gaya ng sa paaralan sa Malolos...</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isa pa! Hindi ba sa ilalim din ng balabal na madilim ng gabi idinadaos ang 
	'<span xml:lang="es" lang="es">Academia 
	de dibujo</span>' at ang mga nobenario at mga prusisyon?....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lumalabag sa 
	karangalan ng Unibersidad--ang patuloy ng mataba na hindi pinuna ang 
	paalaala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lumabag! Ang 
	Unibersidad ay mapipilitang sumang-ayon sa kailangan ng mga nag-aaral. At 
	kung iyan ay tunay ay ano kung gayon ang Unibersidad? Isa bagang kapisanan 
	upang huwag matuto? Nagkasasama baga ang ilang katao na nagtataglay ng 
	katawagang may katarungan at dunong upang humadlang na ang iba'y matuto?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindit... 
	ang mga balak ng nangasaibaba ay tinatawag na di kasiyahang loob......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At mga panukala ang tawag sa nanggagaling sa itaas--ang dunggit ng 
	isa--nariyan ang paaralang '<span xml:lang="es" lang="es">Artes y Oficios</span>'!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dahan dahan, 
	mga ginoo--ang sabi ni Sandoval--hindi ako makaprayle; kilala ang aking mga 
	malayang pagkukuro, ngunit ibigay natin sa Cesar ang sa Cesar! Ang 
	paaralang iyan ng <span xml:lang="es" lang="es">Artes y Oficios</span>, na 
	ako ang una unang nagtatanggol at ang araw na siya'y matayo ay babatiing 
	kong wariy unang liwayway na ikagiginhawa ng Kapuluang ito, ang paaralang 
	iyan ng <span xml:lang="es" lang="es">Artes y Oficios</span>, ay ang mga 
	prayle ang siyang nangagsumikap......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--O ang aso ng 
	maggugulay, na kagaya rin nila--ang dagdag ni Pecson na pinutol na muli ang 
	talumpati.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	p....!--ang sabing pagalit ni Sandoval dahil sa pagputol, na nawala tuloy ang 
	tuwid ng pagsasalaysay--samantalang walang masama tayong nalalaman, ay huwag 
	tayong mag-akala ng masama, huwag tayong magkamaling maghinala sa kalayaan 
	at pagkamasarili ng pamahalaan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	pamamagitan nang magagandang pangungusap ay inihanay ang mga pagpupuri sa 
	pamahalaan at sa mga balak nito, bagay na hindi napangahasang hadlangan ni 
	Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	pamahalaang kastila--ang sabi, sa gitna ng ilang bagay--ay nagbigay sa inyo ng 
	lahat ng kailangan, walang ipinagkait sa inyo. Sa Espa&ntilde;a ay nagkaroon kami 
	ng kapangyarihang alinsunod sa kaibigan ng iisang tao at kayo'y nagkaroon ng 
	gayon ding pamahalaan; kinalatan ng mga prayle ng kanilang kombento ang 
	aming mga lupain at kombento ng mga prayle ang laman ng isang katlong bahagi 
	ng Maynila.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa Espa&ntilde;a ay pinalalakad pa ang bitay, at ang bitay ay siyang 
	huling kaparusahan dito; kami ay katoliko at ginawa namin kayong katoliko; 
	kamiy naging <i xml:lang="es" lang="es">escolastico</i> at ang
	<i xml:lang="es" lang="es">escolasticismo</i> ay siyang nananagumpay sa 
	inyong mga paaralan; sa isang sabi, mga ginoo, umiiyak kami kung kayo'y 
	umiiyak, nagtitiis kami kung kayo'y nagtitiis, iisa ang dambana natin, iisa 
	ang ating hukuman, iisang kaparusahan, at nararapat na ibigay namin sa inyo 
	ang amin ding mga karapatan at ang amin ding mga katuwaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	walang humahadlang sa kanya, ay sumigabo ng sumigabo ang kalooban hanggang 
	sa tinukoy na ang sasapitin ng Pilipinas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya ng 
	sinabi ko, mga ginoo, ang liwayway ay hindi malayo, binubuksan ng Espa&ntilde;a ang 
	Kasilanganan sa kanyang iniibig na Pilipinas, at ang mga kapanahunan ay 
	nag-iiba at batid kong ang ginagawa'y higit kay sa inaakala natin. Ang 
	pamahalaang iyan, na, ayon sa inyo, ay gumigiwang at walang sariling 
	kalooban, ay nararapat na ating udyukan sa pagpapakilala ng ating 
	pagtitiwala, ipakita na tayo'y nag-aantay sa kanya; ipaalaala natin sa ating 
	kilos (kung nakalilimot, bagay na hindi ko pinaniniwalaang mangyari) na 
	tayo'y nananalig sa kanyang magagandang hangad at hindi siya dapat 
	umalinsunod sa ibang palakad liban doon sa sadyang katwiran at ikabubuti ng 
	kanyang mga pinamamahalaan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hindi, mga ginoo,--ang patuloy na lalo't lalo 
	pang umayos nagtatalumpati--hindi natin dapat tanggapin man lamang sa bagay 
	na ito, ang pangyayari marahil, na nagtanong sa ibang taong laban sa 
	panukala, sapagka't ang sapantaha lamang ay makakatimbang ng pagpapaumanhin 
	sa pangyayari.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang inyong inaasal hanggang sa ngayon ay matapat, malinis, 
	walang pagmamaliw, walang agam-agam. Humihiling kayo sa kanya ng maliwanag 
	at walang palikawlikaw. Ang inyong mga pinagbabatayang katwiran ay lubhang 
	karapatdapat dinggin. Ang inyong layon ay ang awasan ng gawain ang mga guro, 
	sa mga unang taon, at maging madali ang pagkatuto ng daan daang mga 
	nag-aaral na pumupuno sa mga klase, na hindi mangyayaring magampanan ng 
	iisang guro. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kung hanggang ngayon ay hindi pa napasisiyahan ang kasulatan ay 
	dahil sa alam kong may maraming gawaing naiimbak; ngunit inaakala kong ang 
	pag-uusig ay nagtagumpay, na ang sanhi ng tipan ni Makaraig ay upang ibalita 
	sa atin ang pananalo, at bukas ay makikita nating magtatamo ang ating mga 
	pagsusumikap ng papuri at pagkilala ng bayan, at sino ang makapagsasabi, mga 
	ginoo, kung hindi ipalagay ng pamahalaan na kayo'y dulutan ng mabuting
	<i xml:lang="es" lang="es">condecoracion</i> dahil sa kayo'y karapatdapat sa 
	kapurihan ng inyong bayan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nag-umugong 
	ang masisigabong pagakpakan; naniniwala na ang lahat sa pananalo at ang 
	marami sa <i xml:lang="es" lang="es">condecoracion</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dapat 
	makilala, mga ginoo,--ang sabi ni Juanito Pelaez--na ako'y isa sa mga unang 
	nagmunakala!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang di 
	mapaniwalaing si Pecson ay hindi nagagalak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag hindi 
	nagkaroon tayo ng <i xml:lang="es" lang="es">condecoracion</i> sa binti!--ang 
	sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Salamat na 
	lamang at hindi nadinig ni Pelaez ang banggit na iyon, dahil sa lakas ng 
	pagakpakan. Nang mahintohinto ng kaunti, ay sinabi ni <span class="locked">
	Pecson, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti, 
	mabuti, mabuting mabuti, ngunit isang palagay.... kung sa lahat ng iyan, 
	ang General ay sumangguni rin, sumangguni at sumangguni, at pagkatapos ay 
	ipagkait sa atin ang kapahintulutan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang palagay ay 
	bumagsak na wariy tubig na malamig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	napatingin kay Sandoval; ito'y natubigan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	gayon....--ang sabing paurongsulong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	gayon--ang bulalas ni Sandoval na sumusulak pa ang dugo dahil sa mga 
	pagakpakan at sa isang udyok ng sigabo--sa dahilang sa mga kasulatan at sa 
	mga limbag ay ipinahahayag na iniibig niya ang inyong ikatututo ngunit 
	pinipigil at ipinagkakait ang gayon pag sumapit na ang pagsasagawa, kung 
	gayon, mga ginoo, ang inyong mga pagsusumikap ay hindi nasayang, natuklas 
	ninyo ang hindi natuklas ng sino man, na maalis ang balatkayo at kayo'y 
	hamunin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti, 
	mabuti!--ang masigabong sigawan ng ilan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Purihin si 
	Sandoval! Mabuti ang ukol sa paghamon!--ang dagdag ng iba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hamunin 
	tayo!--ang sagot ni Pecson na hindi binibigyang kabuluhan ang gayon--at 
	pagkatapos?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gitna ng 
	kanyang pananagumpay ay napatigil si Sandoval, ngunit sa katalasang taglay 
	ng kanyang lipi at dahil sa kanyang dugong mananalumpati ay agad 
	nakabalikwas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pagkatapos?--ang tanong--pagkatapos, kung walang pilipinong makapangahas 
	tumugon sa hamon, ay ako, si Sandoval, sa ngalan ng Espa&ntilde;a ay sasaluhin ko 
	ang <i xml:lang="es" lang="es">guantes</i>, sapagka't ang gayong paraan ay 
	isang pagpapabulaan sa mabuting hangad na kailan ma'y tinaglay ng Espa&ntilde;a sa 
	kanyang mga lalawigan, at sa dahilang sa gayong asal ay sinasalaula ang 
	katungkulang ipinagkatiwala sa kanya at nagpapakalabis sa kanyang walang 
	sagkang kapangyarihan, hindi siya karapatdapat sa pag-aampon ng inang bayan 
	ni sa pagkupkop ng sino mang mamamayang kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang kagalakan 
	ng mga nakikingig ay halos naging kahibangan. Niyakap ni Isagani si 
	Sandoval, bagay na ginayahan ng iba; nabanggit-banggit doon ang inang bayan, 
	ang pagkakaisa, ang pagkakapatiran, ang pagkamatapat; anang mga pilipino'y 
	kung wala kundi pawang Sandoval sa Espa&ntilde;a, ang lahat ng tao sa Pilipinas ay 
	magiging Sandoval na lahat. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nagniningning ang mga mata ni Sandoval at 
	mapapaniwalaang kung sa mga sandaling iyon ay hinagisan siya ng sino man ng 
	isang <i xml:lang="es" lang="es">guantes</i> na tanda ng paghamon, ay 
	sumakay sana sa kahit aling kabayo upang magpakamatay ng dahil sa 
	Pilipinas. Ang tubig na malamig lamang ang nagwikang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti, 
	mabuting mabuti, Sandoval; ako man ay makapagwiwika ng ganyan kung ako'y 
	taga Espa&ntilde;a; ngunit sa dahilang hindi gayon, kung ako ang nagsabi ng 
	kalahati man lamang ng sinabi ninyo, kayo man ay magpapalagay na ako'y 
	pilibustero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagsimula na 
	si Sandoval ng isang talumpating taganas na pagtutol, nang mapigil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Matuwa na 
	tayo, mga kaibigan! Tagumpay!--ang sigaw ng isang binatang pumasok at niyakap 
	ang lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Matuwa na 
	tayo, mga kaibigan! Mabuhay ang wikang kastila!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang maugong 
	na pagakpakan ang sumalubong sa balita; ang lahat ay nagyayakapan, ang lahat 
	ay maningning ang mata dahil sa luha. Si Pecson ang tanging nagtataglay ng 
	kanyang ngiting mapagmakatangi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang dumating 
	na may dala ng mabuting balita ay si Makaraig, ang binatang nangungulo sa 
	kilusan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	tinitirahan ng nag-aaral na ito sa bahay na iyon ay dalawang silid na 
	napapalamutihang mabuti para sa kanyang mag-isa lamang, mayroon siyang alila 
	at kotsero na nag-aaruga sa kanyang sasakyang <i xml:lang="es" lang="es">
	ara&ntilde;a</i> at sa kanyang mga kabayo. Ang tindig niya'y makiyas, ugaling 
	banayad, magara't mayamang mayaman. Kahit nag-aaral ng pag-aabogado upang 
	magkaroon lamang ng isang <i xml:lang="es" lang="es">titulo academico</i>, 
	ay may kabantugan siya sa pagkamasipag mag-aral, at kung sa pagsasalita ng 
	alinsunod sa turong paaralan ay hindi na mahuhuli sa ibang mapaghamon sa 
	pagtatalo sa loob ng Unibersidad. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi rin naman nahuhuli sa mga akala't 
	bagong mga pagkasulong; sa tulong ng kanyang salapiy nagkakaroon siya ng 
	mga aklat at pamahayagan na hindi mapigil ng <i xml:lang="es" lang="es">
	previa censura</i>. Dahil sa mga taglay na ito, sa kanyang kabantugan sa 
	katapangan, sa kanyang mapalad na pakikitunggali noong kanyang kabataan, at 
	sa kanyang maganda't mabuting ugali, ay hindi dapat pagtakhan na panuntan 
	siya ng kanyang mga kasama at siyang mahalal upang maisagawa ang gayong 
	kahirap na balak na pagtuturo ng wikang kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makaraan ang 
	mga unang silakbo ng kagalakan, na sa kabataan ay nagkakaroon kailan man ng 
	kasagwaan dahil sa ang kanyang malas sa lahat ng bagay ay maganda, ay 
	siniyasat kung papaano ang nangyari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kanginang 
	umaga'y nakipagkita ako kay Padre Irene--ang sabi ni Makaraig na 
	wariy palihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuhay si
	Padre Irene!--ang sigaw ng isang nagagalak na nag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Inihayag sa 
	akin ni Padre Irene--ang patuloy ni Makaraig--ang lahat ng nangyari 
	sa <span xml:lang="es" lang="es">Los&nbsp;Ba&ntilde;os</span>. Tila isang linggo silang 
	nagtatalo, ipinaglaban at ipinagtanggol niya ang ating usap ng laban sa 
	lahat, laban sa kay Padre Sibyla, sa kay Padre Fernandez, 
	sa kay Padre Salvi, sa General, sa Segundo Cabo, sa mag-aalahas na 
	si Simoun......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	mag-aalahas na si Simoun!--ang putol ng isa--ngunit ano ang ipinanghihimasok 
	ng hudyong iyan sa mga bagay bagay ng ating bayan? At pinayayaman natin iyan 
	sa pagbili......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tumigil ka 
	nga!--ang sabi ng isa, na naiinip sapagka't ibig mabatid kaagad kung papaano 
	at tinalo ni Padre Irene ang mga nakasisindak na kalabang iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon pa 
	manding matataas na kawaning laban sa ating panukala, ang Namamahala sa 
	Pangasiwaan, ang Gobernador Civil, ang intsik na si Quiroga......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang intsik na 
	si Quiroga! Ang bugaw ng mga....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tumigil ka 
	na, tao ka!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa 
	kahulihulihan--ang patuloy ni Makaraig--ay itatago na sana ang kahilingan at 
	babayaang makatulog doon ng ilang buwan, ng maalala ni Padre Irene 
	ang Kataastaasang Lupon ng Paaralan at ipinalagay niyang ang kasulatan ay 
	mahulog sa Lupong yaon upang magbigay ng munkahing nararapat yamang ang ukol 
	sa pagtuturo ng wikang kastila ang pinag-uusapan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ang 
	Lupong iyan ay malaon ng hindi kumikilos--ang tukoy ni Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan din nga 
	ang isinagot kay Padre Irene--ang patuloy ni Makaraig--at sinagot 
	niyang mabuti ngang pagkakataon upang muling mabuhay, at sinamantala ang 
	pagkakaparoon ni Don&nbsp;Custodio, na isa sa mga kasangguni, at nagpalagay noon 
	din ng isang lupon, at sa dahilang kilala ang kasipagan ni Don Custodio 
	ay siyang tinakdaang magpalagay ng ipapasiya, kaya't ngayo'y nasa kamay niya 
	ang kasulatan. Ipinangako ni Don Custodio na lulutasin niya sa 
	loob ng buwang ito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuhay si
	Don Custodio!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At kung ang 
	ipasiya ni Don Custodio ay laban?--ang tanong ng di mapag-asang 
	si Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iyan ang hindi 
	nila naaalaala, dahil sa kahibangan sa akalang mabuti ang lakad ng usap. 
	Lahat ay napatingin kay Makaraig upang mabatid kung ano ang sasabihin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang bagay 
	ding iyan ang sinabi ko kay Padre Irene, ngunit sinabi sa akin, 
	na kasabay ang kanyang palabirong tawa, na: Malaki na ang ating tinamo, 
	nagawa nating ang usap ay makarating sa isang kapasiyahan, mapipilitan ang 
	kalaban na tanggapin ang pakikihamok.... Kung mangyayaring mapakiling natin 
	si Don Custodio, upang sa pag-alinsunod sa kanyang malayang 
	hilig, ay magpasiya ng sang-ayon, ay nanalo na tayo; ang General ay 
	nagpapakilalang walang kikilingan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Makaraig ay 
	huminto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At papaano ang pagpapakiling?--ang tanong ng isang inip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May sinabi sa 
	aking dalawang paraan si Padre Irene....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang intsik na 
	si Quiroga!--ang sabi ng isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ba! Hindi 
	pinupuna si Quiroga......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	mabuting handog!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lalo pa, 
	ipinagmamalaki ang katigasan niya sa mga handog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay, nalalaman 
	ko na!--ang bulalas na tumatawa ni Pecson--ang mananayaw na si Pepay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A, oo nga! 
	ang mananayaw na si Pepay!--ang sabi ng ilan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang Pepay na 
	ito'y isang makiyas na dalaga na kilalang matalik na kaibigan ni Don Custodio: 
	sa kanya lumalapit ang mga tumatanggap ng mga pagawa, ang mga kawani at ang 
	mga mapaglalang kung may nasang tamuhin sa bantog na Konsehal. Si Juanito 
	Pelaez na kaibigan din ng mananayaw ay humahandog na siyang lalakad ng usap; 
	ngunit si Isaganiy umiling at nagsabing sukat na ang pagkakagamit kay
	Padre Irene at magiging kasagwaan ang lapitan si Pepay sa ganitong 
	bagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan ang 
	isa pang paraan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang isa ay 
	lumapit sa abogadong pinagsanggunian, si <abbr>Gi</abbr>noong Pasta, tanungang 
	pinangangayupapaan ni Don Custodio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig ko pa 
	iyan,--ang sabi ni Isagani--si <abbr>Gi</abbr>noong Pasta ay pilipino, at naging 
	kasama sa pag-aaral ng aking amain. Ngunit papaano ang gagawin upang 
	mapakiling?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nariyan ang
	<i>kid</i>--ang sagot ni Makaraig na tinitigan si Isagani--si ginoong&nbsp;Pasta ay 
	may isang mananayaw, itong.... may isang mangbuburda......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inailing na 
	muli ni Isagani ang kanyang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	napakamaselang--ang sabi sa kanya ni Juanito Pelaez--ang mga layon ay siyang 
	nagliligtas sa mga kaparaanan! Kilala ko ang mangbuburda, si Matea, na may 
	isang pagawaang pinapasukan ng maraming dalaga.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, mga 
	ginoo,--ang putol ni Isagani--unahin muna natin ang mga paraang hindi 
	mahalay.... Paparoon ako sa bahay ni <abbr>Gi</abbr>noong Pasta at kung wala 
	akong mapala, ay saka na ninyo gawin, ang ibig gawin sa mga mananayaw at mga 
	mangbuburda.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napahinuhod 
	sila sa palagay at nagkasundong si Isagani ay makipag-usap kay <abbr>Gi</abbr>noong 
	Pasta 
	sa araw ding yaon at sa kinahapunan ay ipababatid sa Unibersidad, sa kanyang 
	mga kasama, ang nangyari sa pakikipagkita.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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