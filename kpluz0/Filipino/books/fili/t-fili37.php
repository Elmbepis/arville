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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXVII. Ang Hiwaga</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kahit na 
	pinagkaingatan ng labis ay nakarating din sa kabatiran ng madla ang 
	alingawngaw, subalit malaki na ang kaibhan at marami na ang kulang. Yaon 
	ang sanhi ng mga sang-usapan ng sumunod na kagabihan sa bahay ng isang 
	mayamang mag-aanak na sina Orenda, na nangangalakal ng hiyas sa masipag na 
	bayang <abbr>Sta.</abbr>&nbsp;Cruz. Siya na lamang naaatupag ng marami nilang 
	kaibigan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi nangaglalaro ng <i xml:lang="es" lang="es">tres-siete</i>, 
	ni nagtutugtugan ng piano, at ang munting si Tinay, ang pinakabata sa lahat 
	ng dalaga, ay nayayamot sa paglalarong mag-isa ng <i>sungka</i>, na hindi 
	mapag-unawa kung ano't pinag-uusapan ang mga pangloloob, panghihimagsik, ang 
	mga bayong ng pulbura, gayong may maraming magagandang sigay sa pitong 
	bahay, na waring kinikindatan siya at nginingitian ng kanilang mga mumunting 
	bibig, na nakabuka, upang <i>isubi</i> sa ina. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani, na kung 
	pumaparoon, ay laging nakikipaglaro sa kanya at napadadayang matikabo, ay 
	ayaw makingig sa kanyang katatawag; pinakikinggang tahimik at malamlam ni 
	Isagani ang isinasaysay ng platerong si Chichoy. Si Momoy, ang katipan ni 
	Sensia, ang pinakamatanda sa mga Orenda, maliksi at magandang dalaga kahit 
	may kaunting pagka mapalabiro, ay umalis sa durungawang sa gabigabiy laging 
	pook ng pag-uusap nilang magsing-ibig. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang bagay na ito'y nakamumuhi sa loro 
	na ang kulungan ay nakasabit sa pairap ng bahay, lorong minamahal ng lahat 
	ng taga bahay sapagka't marunong bumati sa lahat kung umaga sa pamagitan ng 
	maiinam na salitang ukol sa pag-ibig. Si kapitana&nbsp;Loleng, ang masipag at 
	matalinong si kapitana&nbsp;Loleng, ay pigil na nakabukas ang kanyang aklat 
	talaan, ngunit hindi makuhang basahin ni masulatan; hindi minamasdan ang 
	mga pinggan, na puno ng mga perlas na lagas, ni ang mga brillante; noon ay 
	nakakalimot at ang pakikingig lamang ang ginagawa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang kanya nang asawa, ang 
	dakilang si kapitang&nbsp;Toringoy, galing sa pangalang Domingo, ang lalong 
	maligaya sa buong arabal, na walang gawa liban sa magbihis ng mainam, 
	kumain, dumaldal, samantalang ang lahat ng kaanak ay gumagawa at 
	nagsusumakit, ay hindi tumungo sa dati niyang pinaparoonang 
	pinakikipaglipunan, at pinakikinggang natatakottakot at nangangamba ang mga 
	kakilakilabot na ibinabalita ng payagot na si Chichoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At hindi 
	mangyayaring hindi magkagayon. Si Chichoy ay naghatid ng ilang gawa kay
	Don Timoteo Pelaez, isang pares na hikaw ng bagong kasal, nang 
	iginigiba pa naman ang kiosko na ginamit na kakainan ng mga may lalong 
	mataas na kapangyarihan. Sa dakong ito'y namumutla si Chichoy at naninindig 
	ang buhok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naku!--aniya,--mga bayong ng pulbura sa ilalim ng tungtungan, sa bubungan, sa 
	ilalim ng dulang, sa loob ng mga uupan, sa lahat ng sulok! Mabuti na lamang 
	at wala isa mang manggagawang humihitit!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sino ang 
	naglagay ng mga bayong na iyon ng pulbura?--ang tanong ni kapitana&nbsp;Loleng, na 
	may katapangan at hindi namumutla na gaya ng mangingibig na si Momoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Momoy ay 
	dumalo sa kasalan, kaya't may katuwiran ang kanyang nahuling pangingilabot. 
	Si Momoy ay napalapit sa kiosko.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	walang makapagsabi,--ang sagot ni Chichoy:--sino ang dapat magkaroon ng hangad 
	na guluhin ang kapistahan? Wala kundi iisa lamang, ang sabi ng bantog na 
	abogadong si <abbr>Gi</abbr>noong Pasta na naroong dumalaw, o isang kagalit ni
	Don Timoteo o isang kaagaw ni Juanito....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	dalagang Orenda ay biglang napalingon kay Isagani: si Isaganiy tahimik na 
	ngumiti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magtago 
	kayo,--ang sabi sa kanya ni kapitana Loleng;--baka kayo pagbintangan.... 
	magtago kayo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling ngumiti 
	si Isagani at hindi sumagot nang anuman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	maalaman ni Don Timoteo--ang patuloy ni Chichoy,--kung sino ang 
	may kagagawan; siya ang namahala sa pagpapagawa, siya at ang kaibigan niyang 
	si Simoun, at wala na. Sa bahay ay nagkagulo, dumating ang teniente ng
	<span xml:lang="es" lang="es">Veterana</span>, at matapos na ipagbilin sa 
	lahat ang paglilihim ay pinaalis ako. Ngunit....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit.... 
	ngunit....--ang bulong na nanginginig ni Momoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naku!--ang 
	sabi ni Sencia na tiningnan ang kanyang nobio at nanginginig din dahil sa 
	pagka-alaalang naparoon sa pista:--ang <i xml:lang="es" lang="es">se&ntilde;oritong</i> 
	ito.... kung sakaling pumutok....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tiningnan 
	ng matang galit ang kanyang iniibig at hinahangaan ang kanyang katapangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung sakaling 
	pumutok....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	matitirang buhay sa daang&nbsp;Anloague!--ang dagdag ni kapitang&nbsp;Toringoy na 
	nagpatanaw ng katapangan at pagwawalang bahala sa kanyang anak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ako'y 
	umuuwing litong lito,--ang patuloy ni Chichoy,--na iniisip na kahit isang 
	titis lamang, isang sigarilyo, ay nagkataong nahulog o may sumabog na isang 
	lampara, sa mga sandaling ito'y wala tayong General, ni Arsobispo, ni 
	anuman, ni mga kawani man lamang! Abo ang lahat ng napatungo sa pista 
	kagabi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Virgen 
	Santisima!</span> ang maginoong ito....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Susmariosep!--ang bulalas ni kapitana Loleng;--ang lahat ng may utang sa atin 
	ay naroroon; susmariosep! At mayroon kaming isang bahay na malapit doon. 
	Sino kaya ang?...</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngayon ninyo 
	malalaman,--ang patuloy ni Chichoy na mahina ang boses,--ngunit kailangan 
	ninyong ipaglihim. Ngayong hapon ay aking natagpuan ang isa kong kaibigang 
	manunulat sa isang kawanihan, at sa pag-uusap namin ng ukol sa bagay na iyan 
	ay sinabi sa akin ang lihim: nabatid niya sa ilang kawani.... Sino sa akala 
	ninyo ang naglagay ng mga bayong ng pulbura?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinibit ng 
	marami ang kanilang balikat; si kapitang Toringoy lamang ang tumingin nang 
	pasulyap kay Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	prayle?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang intsik na 
	si Quiroga?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	nag-aaral?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Makaraig?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si kapitang 
	Toringoy ay umuubo at tinitingnan si Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Chichoy ay 
	nakangiting umiling.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	mag-aalahas na si Simoun!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Simoun!!!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang 
	katahimikang anak ng pagkakamangha ang sumunod sa mga salitang iyon. Si 
	Simoun, ang nag-uudyok ng kasamaan sa General, ang mayamang mangangalakal na 
	pinaparoonan nila sa kanyang bahay upang bilhan ng mga batong kalas, si 
	Simoun na tumatanggap sa mga Orenda nang lubhang magalang at pinagsasabihan 
	sila ng mga maiinam na pangungusap! Dahil nga sa ang balita'y waring hindi 
	mangyayari, kung kaya't pinaniwalaan. <i xml:lang="la" lang="la">Credo quia 
	absurdum</i>, ang sabi ni San&nbsp;Agustin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit wala 
	ba si Simoun sa pista kagabi?--ang tanong ni Sensia.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naroroon,--ang 
	sabi ni Momoy,--ngunit naalaala ko nga pala! Umalis nang kamiy 
	maghahapunan. Umalis upang kunin ang kanyang handog sa kasal.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit hindi 
	ba kaibigan ng General? hindi ba kasama ni Don Timoteo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Opo, 
	nakipagsama upang magawa ang pakay at nang mapatay ang lahat ng kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah!--ani 
	Sensia,--ngayon ko nalinawan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang alin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ayaw ninyong 
	paniwalaan si tia Tentay. Si Simoun ay siyang diablo na nakabili sa kaluluwa 
	ng lahat ng kastila.... sinasabi na ni tia&nbsp;Tentay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si kapitana 
	Loleng ay nag-antanda, hindi mapalagay na tiningnan ang mga bato na 
	nanganganib siyang makitang maging baga; hinubad ni kapitang&nbsp;Toringoy ang 
	sinsing na galing kay Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Simoun ay 
	nawala nang hindi nag-iwan ng bakas,--ang dagdag ni Chichoy;--hinahanap siya 
	ng guardia sibil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo!--ang sabi 
	ni Sensia,--hanapin nila ang demonio!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At 
	nag-antanda. Ngayon nila nalinawan ang maraming bagay, ang malaking 
	kayamanan ni Simoun, ang katangitanging amoy ng kanyang bahay, amoy asupre. 
	Si Binday, isa sa mga dalagang Orenda, mapaniwalain at kaigaigayang 
	binibini, ay nakaalaalang nakakita ng mga apoy na bughaw sa bahay ng 
	mag-aalahas, nang isang hapon na kasama ang ina'y naparoon sila upang mamili 
	ng bato.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isaganiy 
	taimtim na nakikingig, na walang kaimik-imik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaya pala, 
	kagabi....!--ang pabulong ni Momoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kagabi?--ang 
	ulit ni Sensia na may panibugho't nasang makaalam.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	makapangahas na makapagpatuloy si Momoy, ngunit nawala ang kanyang takot 
	dahil sa mukhang ipinatanaw sa kanya ni Sensia.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kagabi, 
	samantalang kamiy humahapon, ay nagkaroon ng isang gulo; ang ilaw sa 
	kinakainan ng General ay namatay. Sinasabing ninakaw ng isang hindi nakilala 
	kung sino ang lamparang handog ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	magnanakaw? Isa sa mga <i xml:lang="es" lang="es">Mano Negra</i>?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani ay 
	tumindig at nagpalakadlakad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At hindi 
	nahuli?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lumundag sa 
	ilog; walang nakakita sa kanya. May nagsasabing kastila raw; anang iba'y 
	intsik; ang iba'y indio....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Inaakalang sa 
	pamagitan ng lamparang iyon,--ang tugon ni Chichoy;--ay pag-aalabin ang buong 
	bahay, ang pulbura....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling 
	nanginig si Momoy, ngunit nang makitang naramdaman ni Sensia ang kanyang 
	katakutan, ay tinangkang iayos.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sayang!--ang 
	bulalas na nilakasan ang loob,--masama ang nagawa ng magnanakaw! Nangamatay 
	sanang lahat....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tiningnan 
	siyang gulilat ni Sensia; ang mga babae'y nangag-angtanda. Si 
	kapitang&nbsp;Toringoy na natatakot sa politika ay umanyong lalayo. Si Isagani 
	ang tinungo ni Momoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kailan ma'y 
	hindi mabuti ang kumuha ng hindi sariling ari,--ang sagot ni Isagani na may 
	matalinghagang ngiti;--kung nalalaman lamang ng magnanakaw na iyon kung ano 
	ang pinapakay at nakapag-isip sana, ay tunay na hindi gagawin ang gayon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At idinagdag 
	matapos ang munting hinto:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pantayan man 
	ng kahit gaano'y hindi ako lalagay sa kalagayan niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nagpatuloy 
	sila sa pagkukurokuro at pagpapalapalagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makaraan ang 
	isang oras, ay nagpaalam na si Isagani sa mag-aanak upang manirahan na sa 
	habang buhay sa piling ng kanyang amain.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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