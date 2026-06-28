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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">I. Sa Kubyerta</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Isang umaga ng 
	Disyembre ay hirap na sumasalunga sa paliku-likong Ilog&nbsp;Pasig 
	ang bapor&nbsp;Tabo, na may lulang maraming tao, na tungo sa La Laguna. Ang bapor 
	ay may anyong bagol, halos bilog na wariy tabo na siyang pinanggalingan ng 
	kanyang pangalan; napakarumi kahit na may nasa siyang maging maputi, 
	malumanay at waring nagmamalaki dahil sa kanyang banayad na lakad. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon 
	man, siya'y kinagigiliwan sa dakong iyon, sanhi marahil sa pangalan niyang 
	tagalog o dahil sa taglay niya ang sadyang ugali ng mga bagay-bagay ng bayan, 
	isang wariy tagumpay na laban sa pagkakasulong, isang bapor na hindi tunay 
	na bapor ang kabuuan, isang sangkap na hindi nagbabago, hindi ayos ngunit 
	hindi mapag-aalinlanganan, na, kung ibig mag-anyong makabago ay nasisiyahan 
	na ng buong kalakhan sa isang pahid ng pintura.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Na ang bapor 
	na ito'y tunay na pilipino! Kaunting pagpapaumanhin lamang ang gamitit 
	pagkakamanlang siya ang daong ng Pamahalaan, na nayari sa ilalim ng 
	pagsisiyasat ng mga <i xml:lang="es" lang="es">Reberendo</i> at mga
	<i xml:lang="es" lang="es">Ilustrisimo</i>!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Balot ng 
	liwanag sa umaga, hayo na ang maputi niyang katawan (na iniwawasiwas ang 
	maitim na usok) na nagpapagalaw sa alon ng ilog at nagpapaawit sa hangin sa 
	mga maigkas na kawayang nasa sa magkabilang pampang; may nagsasabing nag-uumusok 
	din ang daong ng Pamahalaan!... Sa bawa't sandaliy tumitili ang pasuit na 
	paos at mapagbala na wariy isang manggagahis na ibig makapanaig sa tulong 
	ng sigaw, kaya't sa loob ng bapor ay hindi magkarinigan, ang lahat ng 
	makatagpo'y pinagbabalaan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Minsa'y waring ibig durugin ang mga salambaw, (mga 
	yayat na kagamitan sa pangingisda) na ang galaw ay waring kalansay ng
	<i xml:lang="es" lang="es">gigante</i> na yumuyuko sa isang pagong na 
	nabuhay sa kapanahunang dako pa roon ng pag-apaw ng tubig sa buong mundo; 
	minsa'y tumatakbong tungo sa mga kakawayanan o kaya'y sa mga karihan, na 
	napapalamutihan ng gumamela at iba pang bulaklak, na waring mga 
	magsisipaligong nakalubog na sa tubig ang mga paa'y ayaw pang maglublob... 
	minsa'y sa pagsunod sa daang itinuturo ng ilang kawayang nakatirik sa ilog 
	ay lumalakad ng buong kasiyahang loob ang bapor; ngunit ang isang biglang 
	pagkakabagok ay kaunti nang ikinabuwal ng mga sakay; napadumog sa isang 
	burak na mababaw na hindi hinihinala nino man......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At kung ang 
	pagkakawangki sa daong ng Pamahalaan ay hindi pa lubos, ay tingnan ang 
	pagkakalagay ng mga lulan. Sa ilalim ng kubyerta ay nangagdungaw ang mga 
	mukhang kayumanggi at maiitim ng mga taga rito, mga intsik at mestiso na 
	nagkakasiksikang kasama ng mga lulang kalakal at mga kaban, samantalang sa 
	itaas, sa ibabaw ng kubyerta at sa lilim ng isang panambil na nagtatanggol 
	sa kanila sa init ng araw, ay nangakaupo sa maginhawang luklukan ang ilang 
	sakay na suot taga Europa, mga prayle at mga kawani, na humihitit ng 
	malalaking tabako, samantalang tinatanaw ang mga dinadaanan, na hindi man 
	napupuna ang mga pagsusumakit ng kapitan na maiwasan ang mga balakid sa ilog.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang kapitan ay 
	isang ginoo na may magiliw na anyo, lubha ng matanda, dating maglalayag na 
	noong kabataan niya ay namahala sa lalong matuling daong at sa lalong 
	malawak na karagatan at ngayong tumanda'y ginagamit ang lalong malaking 
	pag-iisip, pagiingat at pagbabantay upang maiwasan ang maliliit na 
	kapanganiban.... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">At yaon din ang balakid sa araw araw, ang dati ring 
	mabababaw na burak, ang dati ring laki ng bapor na nasasadsad sa mga liko 
	ring yaon, na wariy isang matabang babae sa gitna ng siksikan ng tao, 
	kaya't ang mabait na kapitan ay humihinto sa bawa't sandali, umuurong, 
	pinagkakalahati lamang ang tulin, pinagpapalipatlipat sa kaliwa't sa kanan 
	ang limang marinerong may hawak na tikin upang ipanibulos ang likong 
	itinuturo ng timon. Waring isang matandang kawal, na matapos mamuno sa mga 
	tao sa isang maligalig na himagsikan, ay naging taga pag-alaga, ng tumanda, 
	ng batang masumpungin, matigas ang ulo at tamad.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At si 
	Aling&nbsp;Victorina na siyang tanging babaeng nakiupo sa lipon ng mga europeo ay 
	siyang makapagsasabi kung ang bapor&nbsp;Tabo ay tamad, masuwayin at masumpungin; 
	si Aling&nbsp;Victorina, na gaya ng karaniwan ay napakamasindakin, ay 
	nagtutungayaw sa mga kasko, banka, balsa ng niyog, mga indio na namamangka 
	at sampung mga naglalaba at nagsisipaligo na kinayayamutan niya dahil sa 
	pagkakatuwa at kaingayan!  
	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Siya nga naman, kung walang mga indio sa ilog at 
	sa bayan ay bubuti ang lakad ng Tabo, oo! kung walang isa mang indio, sa 
	mundo; hindi niya napupunang ang mga tumitimon ay pawang indio, indio ang 
	mga marinero, indio ang mga makinista, indio ang siyam na pu't siyam sa 
	bawa't isang daang sakay at siya man ay india rin kung kakayurin ang kanyang 
	pulbos at huhubaran siya ng ipinagmamalaking <i xml:lang="es" lang="es">bata</i>. 
	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang umagang iyon ay lalo pang namumuhi si 
											Aling&nbsp;Victorina dahil sa hindi 
	siya pinapansin ng mga kalipon, at dapat nga namang magkagayon, sapagka't 
	tignan nga naman ninyo: magkalipon doon ang tatlong prayleng nananalig na 
	ang buong mundo'y lalakad ng patiwarik sa araw na sila'y lumakad ng matuwid; 
	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Isang walang pagal na Don Custodio na payapang 
	natutulog, na siyang-siya ang loob sa kanyang mga munakala; </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Isang walang 
	pagod na manunulat na gaya ni Ben-Zayb (katimbang ng Iba&ntilde;ez) na nag-aakalang 
	kung kaya't may nag-iisip sa Maynila ay sa dahilang siya'y nag-iisip; </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Isang
	<i xml:lang="es" lang="es">canonigo</i> na gaya ni Padre Irene 
	na nagbibigay dangal sa mga pari dahil sa mabuti ang pagkakaahit ng kanyang 
	mukhang kinatatayuan ng isang ilong hudio at dahil sa kanyang sotanang sutla 
	na mainam ang tabas at maraming botones; </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											At isang mayamang mag-aalahas na 
	gaya ni Simoun na siya manding tanungan at nag-uudyok sa mga galaw ng 
											Capitan General.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Akalain nga ba namang magkatatagpo ang mga haliging ito na
	<i xml:lang="la" lang="la">sine quibus non</i> ng bayan, magkapipisan doon 
	at maligayang nag-uusap, na hindi nabibighaning malugod sa isang tumakwil sa 
	pagkapilipina, na nagpapula ng buhok, bagay ng sukat makabugnot sa isang 
	Joba!, pangalang ikinakapit sa sarili ni Aling&nbsp;Victorina kailan ma't may 
	katungo.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At ang 
	pagkayamot ng babae'y nararagdagan sa bawa't pagsigaw ng Kapitan ng: baborp! 
	estriborp!, bubunutin ng mga marino ang kanilang mahahabang tikin at 
	isasaksak sa isa't isang gilid at pinipigil sa tulong ng kanilang mga hita't 
	balikat na masadsad sa dakong iyon ang bapor. Kung susukatin sa gayong anyo 
	ang daong ng Pamahalaan ay masasabing nawawala ang pagkapagong at nagiging 
	alimango sa tuwing malalapit ang isang panganib.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	kapitan, bakit tumutungo sa dakong iyan ang inyong mga mangmang na 
	timonel?--ang tanong na pagalit ng babae.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	doon ay napakababaw, ali--ang sagot na malumanay ng Kapitan at ikinindat ang 
	mata.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Naugali na ang 
	ganito ng Kapitan upang sabihin wari sa kanyang mga salita, na dahandahang 
	lumabas: marahan, marahang marahan!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kalahating 
	tulin ng makina, ba, kalahating tulin!--ang paalipustang tutol ni Aling&nbsp;Victorina--bakit hindi buong tulin?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	maglalayag tayo sa mga palayang iyan, ali,--ang walang katinagtinag na sagot 
	ng Kapitan na sabay ang paglabi upang ituro ang bukid; makalawang kumindat.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	Aling&nbsp;Victorinang ito ay kilala dahil sa kanyang mga kasagwaan at mga himaling. 
	Dumadalong palagi sa mga lipunan at siya'y tinitiis doon kailan ma't kasama 
	ang kanyang pamangkin, si Paulita Gomez, maganda at mayamang binibini, ulila 
	sa ama't ina, na kinukupkop ni Aling&nbsp;Victorina. Nang tumanda na ang Aling&nbsp;Victorinang 
	ito ay nag-asawa sa isang kulang-palad na ang pangalan ay Don Tiburcio 
	de&nbsp;Espada&ntilde;a, at sa mga sandaling ito na nakikita natin siya ay may labing 
	limang taon nang kasal, ang buhok ay postiso at ang kalahati ng kagayakan ay 
	ayos taga Europa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang ang kanyang buong hangad sapol ng magkaasawa 
	ay ang mag-anyong europea, sa tulong ng ilang mahalay na kaparaanan, ay 
	nahulog ding unti-unti ang kanyang ayos sa isang anyong, sa kasalukuyan, 
	kahit na magtulong si <span xml:lang="fr" lang="fr">Quatrefages</span> at 
	si <span xml:lang="de" lang="de">Virchow</span> ay hindi mawawatasan kung sa 
	aling lahing mga kilala siya maihahalo. Makaraan ang ilang taong pagkakasal, 
	ang kanyang asawang nagtiis, na wariy <i xml:lang="es" lang="es">fakir</i> 
	na umalinsunod sa lahat ng kanyang maibigan, ay dinalaw ng isang masamang 
	sandali, isang araw, at hinambalos siya ng tinutungkod sa pagkapilay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dahil 
	sa pagkakabigla ni aling&nbsp;Joba, sa gayong pagbabagong ugali, ay hindi 
	naalumana ang magiging kasunod ng pangyayari, at ng makaraan ang 
	pagkakagitla at ng ang kanyang asawa ay makatanan, ay saka pa lamang 
	naramdaman ang sakit at nahigang ilang araw, sa gitna ng pagkagalak ni 
	Paulita na mahilig sa pagtatawa at pagbibiro sa kanyang ali. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	asawa, sindak sa nagawang kasalanan, na sa kanya'y waring isang 
	kakilakilabot na pagpatay sa kabiyak ng puso ang gayong nagawa, habol ng mga
	<i xml:lang="es" lang="es">furia</i> sa tahanan (ang dalawang aso at isang 
	loro sa bahay), ay nagtatakbo ng buong tuling ipinahintulot ng kanyang pilay, 
	lumulan sa unang sasakyang natagpuan, sumakay sa unang bangkang nakita sa 
	isang ilog, at, Ulises na pilipino, nagpagalagala sa mga bayan-bayan, sa 
	isa't isang lalawigan, sa isa't isang pulo, na pinamumuntutan ng kanyang 
	Calipso, na naka <i xml:lang="es" lang="es">quevedo</i>, na nakayayamot sa 
	bawa't makasama sa paglalakbay. Tumanggap ng balita na ang lalakiy 
	nagtatago sa isang bayan ng Laguna, kaya't yaon na siya upang akitin sa 
	tulong ng kanyang buhok na tinina.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	kasabay ay nagkaisang magsanggalang sa kanyang pakikitungo sa pamagitan ng 
	isang walang hintong pagsasalitaang ang balang bagay ay pinagtalunan. Sa mga 
	sandaling iyon, dahil sa palikoliko ng ilog, ay pinag-uusapan ang pagtutuwid 
	sa kanya at ang ukol sa mga gawain ng <span xml:lang="es" lang="es">Obras 
	del Puerto</span>.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Ben-Zayb, 
	ang manunulat na mukhang prayle, ay nakikipagtalo sa isang paring bata na 
	mukha namang artillero. Kapwa nagsisigawang ang anyo ng mukha ay iniaayos sa 
	sinasabi, itinataas ang mga bisig, inilalahad ang mga kamay, nagsisitadyak, 
	nag-uusap ng ukol sa patitis, mga palaisdaan, ilog&nbsp;San&nbsp;Mateo, mga indio at
	<abbr title="ibá pa">ibp.</abbr> sa gitna ng kasiyahang loob ng mga 
	nakikinig at sa gitna rin naman ng buong pagkainip ng isang matandang paring 
	pransiskano, na lubhang napakapayat at nangangalirang, at ng isang dominiko 
	na maganda ang tindig na nagbabakas.... nagbabakas sa kanyang mga labi ng 
	isang ngiting pakutya.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang payat na 
	pransiskano, na nakapuna sa ngiti ng dominiko, ay nagnasang makilahok sa 
	usapan, upang maputol. Iginagalang siya marahil, kaya't sa isang kilos 
	lamang ng kamay ay napigil ang pag-uusap ng dalawa, nang ang paring-artillero 
	ay tumukoy ng ukol sa kinatutuhan at ang manunulat na prayle ay ng ukol 
	naman sa karunungan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam baga 
	ninyo kung ano ang mga taong marurunong, Ben-Zayb?--anang pransiskano na ang 
	boses ay malalim, na hindi man lamang halos gumalaw sa kanyang uupan, at ang 
	mga nangangalirang na kamay ay bahagya nang ikilos--Nariyan sa lalawigan ang
	<i xml:lang="es" lang="es">Puente del Capricho</i>, na gawa ng isang kapatid 
	namin, at hindi nayari, sapagka't pinintasang mahina at mapanganib ng mga 
	marurunong, sa panunulay sa kanilang mga sapantaha, ngunit tignan ninyo't 
	nariyan ang tulay na naglalaban sa lahat ng baha at lindol.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan,
	<i xml:lang="es" lang="es">pu&ntilde;ales</i>, iyang talaga, iyan nga sana ang 
	sasabihin ko!--ang wika ng paring artillero na kasabay ang suntok sa gabay ng 
	kanyang luklukang kawayan;--iyan, ang <i xml:lang="es" lang="es">Puente del 
	Capricho</i> at ang mga marurunong; iyan sana ang sasabihin ko, Padre Salvi,
	<i xml:lang="es" lang="es">pu&ntilde;ales</i>.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Napahintong 
	nakangiti si Ben-Zayb, marahil sa paggalang o kaya'y dahil sa sadyang walang 
	maalamang isagot; kahit gayong siya ang tanging nag-iisip dito sa Pilipinas!--Si
	Padre Irene ay sumasang-ayon sa tulong ng ulo, samantalang 
	pinapahidpahiran ang kanyang mahabang ilong.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Salvi, iyong paring payat at nangangalirang, ay nagpatuloy, na waring 
	nasiyahan sa gayong pangangayupapa, sa gitna ng katahimikan:</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y 
	hindi ibig sabihin ng ganito na kayo'y wala sa katwiran at gayon din naman 
	si Padre Camorra (ito ang pangalan ng paring artillero); ang 
	kasamaan ay nasa lawa.....</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sadya namang 
	walang mabuting lawa sa lupaing ito--ang patlang ni Aling&nbsp;Victorina, na 
	muhing muhi na at humanda upang lusubing muli ang kuta.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	binabakod ay sindak na nagtinginan, ngunit, gaya ng katalasan ng isang 
	general, dumulog ang mag-aalahas na si Simoun:</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang kagamutan 
	ay napakadali,--anya na ang pagbigkas ng salita ay katangitangi, kalahating 
	ingles at kalahating amerikano sa Timog--at hindi ko nga maalaman kung bakit 
	hindi pa naiisip ng kahit sino.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	lumingon, sampu ng dominiko, at pinakinggan siyang mabuti. Ang mag-aalahas 
	ay isang taong yayat, mataas, malitid, napakakayumanggi, suot ingles at ang 
	ginagamit ay waring salakot na timsim. Katangitangi sa kanya ang mahabang 
	buhok na puting puti na natitiwali sa misay na itim, madalang, na 
	nagpapakilala ng kanyang pagkamestiso. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Upang iwasan ang sinag ng araw ay 
	palaging gumagamit ng salaming asul na <i xml:lang="es" lang="es">de 
	rejillas</i>, na tumatakip sa kanyang mga mata at bahagi ng mga pisngi, na 
	siyang nagbibigay sa kanya ng anyong bulag o may sakit sa mata. Nakatayong 
	ang paa'y nakabikaka upang makapanimbang wari, ang mga kamay ay nakapasok sa 
	mga alapot ng kanyang <i xml:lang="es" lang="es">chaqueta</i>.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang kagamutan 
	ay lubhang madali--ang ulit--at walang magugugol.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pakikingig 
	na mabuti ay nag-ibayo. Nasasabisabi sa mga lipunan sa Maynila na ang taong 
	iyon ay siyang sinusunod ng General, kaya't nakikinikinita na ng lahat na 
	ang kagamutan ay magagawa. Pati si Don Custodio ay napalingon.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magbukas ng 
	isang ludlod na tuwid, mula sa pagpasok ng ilog hangang sa paglabas, na 
	dadaan sa Maynila, ito nga, gumawa ng isang bagong ilog na ludlod at tabunan 
	ang dating Ilog&nbsp;Pasig. Hindi mag-aaksaya ng lupa at iikli ang paglalakbay, 
	mapipigil ang pagkakaroon ng dakong mababaw.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang panukalang 
	ito'y nakalito sa lahat halos, na nahirati sa mga paraang tapaltapal.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	munakalang <span xml:lang="en" lang="en">yankee</span>--ani Ben-Zayb, na ibig 
	kalugdan ni Simoun--Ang mag-aalahas ay malaong naninirahan sa Amerika, sa 
	Hilaga.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Inari ng lahat 
	na malaki ang palagay at ang gayon ay ipinakilala sa mga galaw ng ulo. Tangi 
	si Don Custodio, ang may magandang loob na si Don Custodio, 
	na dahil sa kanyang malayang kalagayan at matataas na katungkulang 
	ginaganap, ay nag-akalang nararapat na bakahin niya ang isang panukala na 
	hindi sa kanya buhat--iyon ay isang pangungunang bait!--umubo, hinaplos ang 
	kanyang misay at sa tulong ng kanyang matigas na boses at waring nasa sa 
	isang sadyang pagpupulong ng Ayuntamiento, ay nagwikang:</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Patawarin ako 
	ni <abbr title="Ginoong">G.</abbr> Simoun, na aking kagalanggalang na 
	kaibigan, kung sabihin kong hindi niya ako kasang-ayon; maraming salapi ang 
	magugugol at marahil ay sisira tayo ng mga bayanan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sumira!--ang 
	mahinahong sagot ng mag-aalahas.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang 
	salaping ibabayad sa mga manggagawa?......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag 
	bayaran. Sa mga bilanggo at presidiario......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	makasasapat, ginoong Simoun!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung hindi 
	sasapat, ang lahat ng bayan, ang mga matatanda, ang mga binata, ang mga 
	bata, ay gumawa, at palitan ang labing limang araw na sapilitang paggawa, ng 
	tatlo, apat o limang buwang paggawa na ukol sa Pamahalaan, na may 
	katungkulan pang ang bawa't isa ay magdala ng kanyang pagkain at 
	kasangkapan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Don 
	Custodio ay sindak na lumingon upang tanawin kung sa kalapit ay may isang 
	indio na nakakadinig sa kanila. Salamat na lamang at ang nangaroroon ay 
	pawang taga bukid, at ang dalawang timonel ay waring walang pinapansin kun 
	di ang mga liko ng ilog.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit, 
	ginoong Simoun.....</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Manalig kayo,
	Don Custodio--ang matigas na patuloy ni Simoun--sa ganyang paraan 
	lamang nayayari ang malalaking gawain, sa munting gugol. Sa ganyang paraan 
	nayari ang mga Piramide, ang lawang&nbsp;<span xml:lang="en" lang="en">Moeris</span> 
	at ang Coliseo sa Roma. Buo-buong lalawigan ay nanggagaling sa mga kaparangan 
	na daladala ang kanilang mga sibuyas upang may makain; ang mga matatanda, 
	mga binata at mga bata ay nangaghahakot ng bato, tinatapyas nila at 
	pinapasan sa pamamahala ng pamalo ng nakapangyayari; at pagkatapos ay 
	bumabalik sa kanikanilang bayan ang nangalabi, o nangamamatay sa buhanginan 
	ng kalawakan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Makaraan yaon ay dumadating ang ibang lalawigan, pagkatapos ay 
	iba naman, sunod sunod sa paggawa sa loob ng mga taon; ang gawain ay 
	natatapos at ngayo'y hinahangaan natin, naglalakbay tayo, napaparoon tayo sa
	<span xml:lang="es" lang="es">Egipto</span> o sa Roma, pinupuri natin ang 
	mga Faraon, ang mga mag-aanak na Antonina...... Maniwala kayo Don Custodio; 
	ang mga patay ay naiiwang patay at ang malakas lamang ang binibigyan ng 
	katwiran ng mga kapanahunang susunod.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ang 
	mga ganyang kaparaanan, ginoong&nbsp;Simoun, ay mangyayaring maging sanhi ng 
	kaguluhan--ang sabi ni Don Custodio na hindi mapalagay dahil sa 
	masamang tungo ng salitaan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaguluhan; 
	ha, ha! Naghimagsik baga ang bayang ehipsio minsan man, naghimagsik ang mga 
	piit na hudio ng laban sa maawaing si Tito? Hindi ko akalaing mahina pala 
	kayo sa mga bagay na nasasabi sa kasaysayan!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Napagkikilala 
	na ang Simoung yaon ay napakamapagmalaki o walang pinagaralan. Ipamukha kay
	Don Custodio na hindi nakababatid ng kasaysayan, ay isang bagay 
	na makagagalit sa kahit kanino! At gayon nga ang nangyari, nakalimot si
	Don Custodio sa dating hilig at <span class="locked">sumagot ng:</span></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang bagay, ay 
	sa dahilang hindi ehipsio ni hudio ang inyong mga kakaharapin!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang bayang 
	ito'y hindi miminsang naghimagsik na--ang dugtong na may munting takot ng 
	dominiko--noong kapanahunang pinahihila ng malalaking kahoy upang gawing mga 
	daong, kung hindi dahil sa mga pari......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	kapanahunang iyon ay malayo na;--ang sagot ni Simoun na ang tawa'y lalo pa 
	manding matigas kay sa karaniwan--ang mga pulong ito'y hindi muling 
	maghihimagsik ng dahil sa mga gawain at buwis...... Hindi baga pinupuri 
	ninyo Padre Salvi--ang dugtong, na, ang hinarap ay ang payat na 
	pransiskano--ang bahay at pagamutan sa <span xml:lang="es" lang="es">
	Los&nbsp;Ba&ntilde;os</span> na kinaroroonan ng General?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Iginalaw ni
	Padre Salvi ang ulo at tuminging may pagkakamangha sa tanong.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi baga 
	sinabi ninyo sa aking ang dalawang bahay na iyon ay naitayo sa tulong ng 
	pagpilit sa mga bayan na gumawa doon, sa ilalim ng kapangyarihan ng isang 
	uldog? Marahil, ang <span xml:lang="es" lang="es">Puente del Capricho</span>, 
	ay nayari din sa gayong kaparaanan. At sabihin ninyo naghimagsik baga ang 
	mga bayang ito?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit.... 
	naghimagsik na noong araw--ang sabi ng dominiko--at <i xml:lang="la" lang="la">
	ab actu ad posse valet illatio</i>.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala, wala, 
	wala!--ang patuloy ni Simoun na humandang dumaan sa
	<i xml:lang="es" lang="es">escotilla</i> upang pumanaog sa kamara--ang nasabi 
	ay nasabi na. At kayo Padre Sibyla ay huwag bumanggit ng mga 
	wikang latin at ng mga katunggakan. Sa ano't naririto kayong mga prayle kung 
	maaaring maghimagsik ang mga bayan?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	pumanaog sa munting hagdanan, na hindi pinansin ang mga tutol at sagot, at 
	inuulit ulit ang salitang: <i xml:lang="es" lang="es">Vaya, vaya!</i></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Sibyla ay namutla; noon lamang siya, Vice-Rector sa Universidad, 
	napagsabihang may katunggakan; si Don Custodio ay kulay berde; 
	sa alin mang pulong na kanyang kinaroonan ay hindi nakatagpo ng isang 
	katunggaling kagaya niyon. Ang gayon ay napakalabis.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang mulato 
	amerikano!--ang pabulalas na ungol.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Indio-ingles!--ang marahang sabi ni Ben-Zayb.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi ko 
	sa inyong amerikano, hindi ko malalaman?--ang tugong nayayamot ni Don Custodio--sinabi 
	sa akin ng General; iya'y isang mag-aalahas na nakilala niya sa Habana at 
	ayon sa hinala ko'y siyang nagbigay sa kanya ng katungkulan, sapagka't 
	pinautang siya ng salapi. Kaya nga, upang mabayaran, ay pinaparito at ng 
	gawin ang bala na, dagdagan ang kanyang kayamanan sa pagbibili ng mga 
	brillanteng.... hindi totoo, ano ang malay natin! At napakawalang lingap, 
	na, matapos kunan ng salapi ang mga indio ay ibig <span class="locked">
	pang..! Pf!</span></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At tinapos ang 
	salita sa isang makahulugang kilos ng kamay.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Walang 
	makapangahas na makisali sa gayong mga pag-alimura; si Don Custodio 
	ay mangyayaring makipagsira sa Capitan General kung ibig niya, ngunit ni si 
	Ben-Zayb, ni si Padre Irene, ni si Padre Salvi, ni ang 
	hinalay na si Padre Sibyla ay walang katiwala sa paglilihim ng 
	iba.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang taong iyan, sapagka't amerikano, ay nag-aakalang ang kakaharapin natin 
	ay ang mga '<span xml:lang="es" lang="es">pieles rojas</span>'.... Magsalita 
	ng mga bagay na iyan sa loob ng isang bapor! Ipag-utos, pilitin ang tao!.... 
	At iyan ang nag-udyok ng pagsalakay sa Carolinas, ng pagdigma sa Mindanaw na 
	pupulubi ng kalaitlait sa atin.... At siya ang humandog na mamagitna sa 
	paggawa ng '<span xml:lang="es" lang="es">crucero</span>', ngunit ang 
	tanong ko naman: ano ang muwang ng isang mag-aalahas, kahit na napakayaman 
	at napakabihasa, sa pagpapagawa ng mga daong?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ng 
	ito'y sinasabing pinalalaki ang boses ni Don Custodio, kay 
	Ben-Zayb, na sabay ang kumpay, higit ng balikat, maminsanminsang tumatanong 
	sa tingin sa ibang iginagalaw naman ang ulo nang walang ibig turan. Ang 
	kanonigong si Padre Irene ay napapangiting walang ibig sabihin, na 
	tinatakpan ng kamay sa tulong ng paghaplos sa kanyang ilong.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi ko 
	sa inyo, Ben-Zayb--ang patuloy ni Don Custodio na inaalog ang 
	bisig ng manunulat--ang lahat ng kasamaang nangyayari ay sanhi ng hindi 
	pagtatatanong sa mga taong may malaong paninirahan dito. Isang panukalang 
	may malalaking salita at malaking gugol, isang guguling malaking halaga ay 
	nakabubulag at tinatanggap agad.... dahil dito!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Pinagkiskis ni
	Don Custodio ang kanyang mga daliring hinglalaki, hintuturo at 
	panggitna.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon ngang 
	kaunti niyan, kaunti niyan--ang akala ni Ben-Zayb na dapat niyang isagot, 
	dahil sa kanyang pagkamamamahayag ay dapat makaalam ng lahat.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tignan ninyo, 
	una diyan sa mga gawain ng <span xml:lang="es" lang="es">Obras del Puerto</span>, 
	ay nagharap ako ng isang munakala, bago, malinaw, mapakikinabangan, munting 
	gugol at magagawa upang luminis ang wawa ng dagat na tabang, at hindi 
	tinanggap dahil sa hindi nagbibigay ng ganito!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At inulit ang 
	kiskis ng mga daliri, kinibit ang balikat at ang lahat ay tinignan na waring 
	ang ibig sabihin ay: Nakakita na kayo ng ganyang kasawian?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At maari 
	bagang mabatid ang palagay?--At..--Aba!--ang pamangha ng isa't isa na 
	nangaglapitan at nagkagipitan sa pakikingig. Ang mga munakala ni Don Custodio 
	ay pawang bantog na kagaya ng mga yaring lunas ng mga manggagamot.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Kaunti ng 
	hindi sabihin ni Don Custodio ang bagay, sapagka't nagdamdam 
	dahil sa hindi siya sinang-ayunan noong dinudusta si Simoun. 'Pag walang 
	panganib ay ibig ninyong ako'y magsalita, ha? at pag mayroon ay wala kayong 
	imik', ang sasabihin sana; ngunit ang gayon ay isang pagpapakawala ng isang 
	mabuting pagkakataon at yayamang hindi na maisasagawa ang panukala ay 
	makilala man lamang at hangaan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Matapos ang 
	dalawa o tatlong buga ng aso, umubo at lumura ng patagilid, ay tinanong si 
	Ben-Zayb, na sabay ang tampal sa hita nito.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakakita na 
	ba kayo ng pato?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tila... 
	nakahuli kami sa lawa--ang tugong pahanga ni Ben-Zayb.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, hindi 
	ko tinutukoy ang patong bukid, ang tinutukoy ko'y ang mga maamo na 
	inaalagaan sa Pateros at sa Pasig. At alam ninyo kung ano ang kanilang 
	kinakain?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Ben-Zayb, 
	ang tanging ulong nag-iisip, ay hindi nakaaalam niyon; hindi niya 
	napanghihimasukan ang hanap-buhay na iyon.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga susong 
	maliliit, tao kayo, mga susong maliliit!--ang sagot ni Padre Camorra--hindi 
	kailangang maging indio upang makabatid ng bagay na iyan, sukat na ang 
	magkaroon ng paningin!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan nga, mga 
	susong maliliit!--ang ulit ni Don Custodio na iginagalaw ang 
	hintuturo--at alam ninyo kung saan kinukuha?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	Hindi rin batid ng ulong mapag-isip.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung kayo'y 
	nanirahan na sa lupaing ito ng kagaya ng haba ng aking paninirahan, ay 
	mababatid ninyong nakukuha sa wawa at doon ay marami na kahalo ng buhangin.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang inyong 
	munakala?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan nga ang 
	tungo ko. Pipilitin ko ang lahat ng bayang kalapit ng wawa na mag-alaga ng 
	pato, at makikita ninyo na sila, sa kanilang sarili, ay palalalimin nila ang 
	wawa sa panghuhuli ng suso... Ganyang ganyan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Binuksan ni
	Don Custodio ang kanyang dalawang bisig at malugod na 
	tinanawtanaw ang pagkakagulilat ng mga nakikingig sa kanya; walang isa mang 
	nakaisip ng gayong kainam na panukala.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pinahihintulutan 
	baga ninyong makasulat ako ng isang <i xml:lang="es" lang="es">articulo</i> 
	ukol sa bagay na iyan?--ang tanong ni Ben-Zayb--napakakaunti ang nag-iisip sa 
	lupaing ito....</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit Don Custodio,--ani Aling&nbsp;Victorina na nagpakendengkendeng at 
	kumilingkiling--kung ang lahat ay mag-aalaga ng pato ay dadami ang itlog na 
	balot. Uy nakapangdidiri! Matabunan na muna ang wawa!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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