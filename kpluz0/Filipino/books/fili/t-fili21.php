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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXI. Mga Ayos Maynila</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Nang gabing yaon ay may isang malaking palabas sa dulaang '<span xml:lang="es" lang="es">Variedades</span>'.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang samahan ng 
	operang pranses ni <abbr xml:lang="en" lang="en">Mr.</abbr>&nbsp;<span xml:lang="fr" lang="fr">Jouy</span> 
	ay magdadaos ng una niyang palabas na ang itatanghal ay '<i xml:lang="fr" lang="fr">Les 
	Cloches de Corneville</i>' at ipamamalas sa madlang manonood ang kanyang mga 
	piling <i xml:lang="fr" lang="fr">troupe</i> na inihayag na ilang araw ng 
	mga pahayagan ang kanilang kabantugan. Sinasabing sa mga aktris ay mayroong 
	mga may magandang tinig, ngunit lalo pa manding maganda ang anyo, at kung 
	paniniwalaan ang mga bulongbulungan, ay higit pa sa kanilang tinig at anyo 
	ang kanilang kagandahang loob.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ika pito at 
	kalahati pa lamang ng gabi ay wala nang <span xml:lang="es" lang="es">
	billete</span> ni para sa naghihingalong si Padre Salvi, at ang mga papasok 
	sa '<span xml:lang="es" lang="es">entrada general</span>' ay 
	mahabang mahaba ang hanay. Sa takilya ay nagkaroon ng kaguluhan, awayan, 
	tinukoy ang pagpipilibustero at ang ukol sa lahi, ngunit gayon man ay hindi 
	rin nakakuha ng bilyete. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang labing limang minuto na lamang ang kulang sa 
	ika walo ay malalaking halaga na ang itinatawad sa isang uupan sa
	<i xml:lang="es" lang="es">entrada general</i>. Ang anyo ng dulaan, na 
	naiilawang mabuti, may mga puno't bulaklak sa mga pintuan, ay nakauulol sa 
	mga nahuhuling napapahanga at napapasuntok. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang makapal na tao ang 
	nangagkikisawan sa mga paligid at pinagmamasdang naiinggit ang mga 
	pumapasok, ang mga maagang dumarating dahil sa natatakot na maunahan sa 
	kanilang luklukan: tawanan, alingawngaw, mga pag-aantabay, nangagsisibati sa 
	mga bagong dating na masama ang loob na nakikihalobilo sa mga nanonood, at, 
	yamang hindi makapasok ay nangatitira na lamang sa pagtanaw sa mga 
	pumapasok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gayon ma'y may 
	isang wariy di kahalo sa mga pag-aasamasam at pagnanasang makapanood. 
	Siya'y isang mataas na lalaking payat na kung lumakad ay marahan at 
	kinakaladkad ang isang paang naninigas. Ang suot ay isang masamang amerikana 
	na kulay kape at isang pantalong pariparisukat ang guhit, marumi, na 
	nakakapit sa kanyang katawang mabuto at yayat. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang sambalilong
	<i xml:lang="es" lang="es">hongo</i> na maarte na, dahil sa kasiraan, ang 
	nakataklob sa kanyang malaking ulo at nagpapakawala sa buhok na ang kulay ay 
	maruming abuhin, halos bulhaw, mahahaba, kulot ang mga dulo na wariy buhok 
	makata. Ang lalong katangitangi sa taong iyon ay hindi ang kanyang kasuotan, 
	ni ang kanyang mukhang taga Europa na walang balbas ni bigote, kundi ang 
	kulay niyang saga, kulay na naging sanhi ng tawag na
	<i xml:lang="es" lang="es">Camaroncocido</i>, na siyang bansag sa kanya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	anyo niya'y walang kapara: anak ng isang mabuting lipi, ngunit siya'y 
	nabubuhay sa pagbubulakbol, sa panghihingi ng limos; lahing kastila, ay 
	hindi pinahahalagahan ang karangalang lahi na inaalipusta sa pamamagitan ng 
	kanyang gulagulanit na kasuotan, ipinalalagay siya ng lahat na wari'y 
	tagapamalita sa mga pahayagan, at tunay nga namang ang kanyang matang 
	malalakit abuhin, na malamlam at waring mapagnilay kung tumingin, ay naroon 
	saan ma't may bagay na maibabalita. Ang kanyang kabuhayan ay hindi batid ng 
	marami; walang nakaaalam kung saan siya kumakain at natutulog: marahil ay 
	mayroon siyang isang bariles saan mang pook.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay hindi taglay ni <span xml:lang="es" lang="es">
	Camaroncocido</span> ang dati niyang anyong matigas at walang bahala: isang 
	wariy masayang pagkaawa ang nananaw sa kanyang paningin. Isang munting 
	lalaki, isang mababang matanda ang masayang sumagupa sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaibigaaaan!--ang sabi, na paos ang boses na wariy sa palaka, at 
	ipinakikita ang ilang pisong mehikano.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakita ni
	<span xml:lang="es" lang="es">Camaroncocido</span> ang mga mamiso, at 
	kinibit ang balikat. Ano ang mayroon sa kanya noon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang matanda'y 
	isang mainam na kaibayo niya. Maliit, lubhang maliit, natatakluban ang ulo 
	ng isang sambalilong <i xml:lang="es" lang="es">de copa</i> na naging isang 
	uod na may balahibo, at napapaloob sa isang maluwang na lebita, lubhang 
	maluwang at napakahaba hanggang sa mapantay sa isang salawal na napakaikli 
	na hindi lumalampas sa binti. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang kanyang katawan ay waring siyang lelong at 
	ang mga paa'y siyang apo, samantalang ang kanyang mga sapatos ay naglalayag 
	mandin sa katihan--yaon ay dalawang malalaking sapatos marinero na tumututol 
	ng laban sa uod na may balahibo na nasa kanyang ulo na gaya ng matinding 
	tutol ng isang kombento na nasa piling ng isang <i xml:lang="es" lang="es">
	Exposicion Universal</i>! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si <span xml:lang="es" lang="es">Camaroncocido</span> 
	ay saga, ang matanda'y kayumanggi; yaon ay walang buhok sa mukha kahit 
	lahing kastila, ang indio ay may patilla at bigoteng mapuputi, mahahaba't 
	madalang. Ang paningin ay malikot. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kung tawagin siya'y Tio&nbsp;Kiko, at, gaya ng 
	kanyang kaibigan ay nabubuhay din siya sa pamamahayag: siya ang nagpapatawag 
	ng mga palabas at nagdidikit ng mga kartel ng mga dulaan. Siya marahil ang 
	tanging pilipino na kahit naka <i xml:lang="es" lang="es">chistera</i> at 
	lebita ay nakapaglalakad nang hindi ginagambala, gaya rin naman ng kanyang 
	kaibigan na siya ang tanging kastila na nagtatawa sa karangalan ng lahi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Binigyan ako 
	ng malaking pabuya ng pranses--ang sabing nakangiti at ipinatanaw ang kanyang 
	gilagid na wariy isang lansangan matapos ang sunog--napabuti ang kamay ko sa 
	pagdidikit ng mga kartel!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling 
	ikinibit ni <span xml:lang="es" lang="es">Camaroncocido</span> ang kanyang 
	mga balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kiko--ang 
	sagot na maugong ang boses--kung anim na piso ang ibinigay sa iyo dahil sa 
	gawa mo magkano kaya ang ibibigay sa mga prayle?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa 
	kaliksihang likas ni Tio&nbsp;Kiko, ay itinaas ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa mga 
	prayle?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	dapat mong maalaman--ang patuloy ni <span xml:lang="es" lang="es">
	Camaroncocido</span>--na ang pagkapunong ito'y kagagawan ng mga kombento!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sadya nga 
	namang gayon, ang mga prayle na pinangunguluhan ni Padre Salvi at 
	ilang hindi pari na pinangunguluhan ni Don Custodio ay laban sa 
	pagtatanghal na iyon. Si Padre Camorra, na hindi makapanood, ay 
	nanglilisik ang mata't tatakamtakam; ngunit nakikipagtalo kay Ben-Zayb na 
	malambot na nagtatanggol sapagka't naiisip ang billeteng walang bayad na 
	ipadadala sa kanya ng may palabas. Pinagsasalitaan siya ni Don Custodio 
	ng ukol sa maayos na hilig, sa pananampalataya, sa mabubuting kaugalian, at
	<abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit--ang 
	bulong ng manunulat--ang ating mga dulang sainete na may mga salita't 
	pangungusap na dalawa ang kahulugan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit nasa 
	wikang kastila naman!--ang pasigaw na putol ng mabait na konsehal, na 
	nag-aalab sa banal na pagkagalit--mga kahalayan sa wikang pranses! tao kayo, 
	Ben-Zayb, maanong alang-alang sa Poong&nbsp; Diyos , sa wikang pranses! Iyan ay 
	hindi dapat mangyari magpakailan man!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ibinigkas 
	ang <em>hindi dapat mangyari magpakailan man!</em> ng kasingtigas kung 
	pagpipisanin ang tatlong Guzman na pinagbabalaang papatayan ng isang pulgas 
	kapag hindi isinuko ang dalawampung Tarifa. Gaya nang maaantay, si Padre &nbsp;Irene, ay kasang-ayon ni Don Custodio at nagtutungayaw 
	sa operetang pranses. Puf! Siya'y natungo sa Paris, ngunit hindi man lamang 
	tumuntong sa pintuan ng isang dulaan; iligtas siya ng Maykapal!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit marami 
	din naman ang kasang-ayon ng operetang pranses. Ang mga opisial sa hukbo at 
	mga pangdigmang dagat, na sa mga ito'y kabilang ang <i>ayudante</i> ng 
	General, ang mga kawani at ilang matataas na tao ay nangagnanasang lumasap 
	ng kainaman ng wikang pranses sa bibig ng mga tunay na
	<i xml:lang="fr" lang="fr">parisien</i>; kabilang nila ang mga nalulan sa 
	M.&nbsp;M. at nakagamit ng kaunti ng pranses sa paglalayag, ang mga nakadalaw sa 
	Paris at lahat niyong mga ibig na masabing sila'y bihasa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang lipunan nga sa 
	Maynila ay nagkahati sa dalawang pangkat, ang mga sang-ayon at ang mga laban 
	sa opera, na pinayuhan ng mga matatandang babae, mga asawang mapanibughuin 
	at nanganganib sa pag-ibig ng kanilang mga kabyak, at nang may mga katipan 
	sa pag-aasawa, samantalang ang mga malaya't ang mga magaganda ay 
	nangagpakilalang lubos silang magiliw sa opereta. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nagsalimbayan ang mga 
	sulatan, nagkaroon ng mga pagpaparoo't parito, salisalitaan, mga 
	pagpupulong, mga pagliliponlipon, mga pagtatalo; natukoy na tuloy sampu ng 
	panghihimagsik ng mga indio, ang katamaran, ang mga liping mababa't liping 
	mataas, karangalan at iba pang kamulalaan, at matapos ang maraming 
	hatidhatirang usap at maraming bulong bulungan, ay ibinigay ang pahintulot, 
	at si Padre Salvi ay naglathala ng isang <i>pastoral</i> na walang 
	bumasa kundi ang taga ayos lamang sa limbagan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nabalitang ang General ay 
	nakagalit ng Condesa: na ito'y naninirahang madalas sa mga bahay liwaliwan; 
	na ang marangal na pinuno ay nabugnot; na ang <i xml:lang="es" lang="es">
	consul</i> ng mga pranses ay gayon, na nagkaroon ng mga handog, at <abbr>
	iba </abbr>pa, at nalahok sa usapan ang maraming pangalan, ang sa intsik na si 
	Quiroga, ang sa kay Simoun at sampu ng sa maraming artista.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Salamat sa 
	nagpaunang alingawngaw na ito, ang pagkasabik ng tao'y naragdagan, at mula 
	pa sa araw na sinusundan ng palabas, araw na idinating ng mga artista, ay 
	walang napag-uusapan kundi ang pagpasok sa unang pagtatanghal. Sapol ng 
	lumabas ang mapupulang kartel na nagbabalita nang <i xml:lang="fr" lang="fr">
	Les Cloches de Corneville</i>, ang mga nanalo'y humanda na sa pagdiriwang ng 
	kanilang tagumpay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa ilang kawanihan, ay hindi na pinalalakad ang panahon 
	sa pagbabasa ng mga pahayagan, kundi dinudumog ang mga kasaysayang limbag 
	nang palalabasin, nangagbabasa ng mga nobelang pranses, at ang maramiy 
	tumutungo sa palikuran na nagpapakunwaring iniiti upang makasangguni lamang 
	ng palihim sa munting diksionariong pangbulsa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngunit gayon man ay hindi 
	rin nalulutas ang mga <i xml:lang="es" lang="es">expediente</i>; kundi 
	bagkus pa ngang ang lahat ay pinababalik sa kinabukasan, datapwa'y hindi 
	mangyayaring magalit ang kahit sino: ang nakakaharap ay mga kawaning 
	lubhang magagalang, masuyo, na tumatanggap sa kanila at nagpapaalam sa 
	pamagitan ng malalaking yuko na ugaling pranses: ang mga kawaniy 
	nangagsasanay, linilinis ang kanilang pranses na inaamag at sila-sila'y 
	nagbabatian ng <i xml:lang="fr" lang="fr">oui monesiour</i>,
	<i xml:lang="fr" lang="fr">s'il bous plait</i>, at
	<i xml:lang="fr" lang="fr">pardon!</i> sa bawa't kilos, bagay na lubhang 
	kaigaigayang madinig at panoorin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngunit sa pasulatan ng mga pamahayagan 
	naroroon ang lalong galawan at ang kagipitan ay umaabot sa lalong malaki; si 
	Ben-Zayb, na sinasabing siyang manunuligsa at naghulog sa wikang kastila ng 
	kasaysayan ng palalabasin ay nangangatal na wariy babaeng nasuplong sa 
	pangkukulam: nakikita niyang ang kanyang mga kalaban ay nagpupunyaging 
	makahuli ng kanyang mga kamalian at ipinamumukha sa kanya ang di pagkabatid 
	na mabuti ng pranses. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang panahon ng <span xml:lang="es" lang="es">Opera 
	Italiana</span> ay kakaunti nang mapasubo siya sa isang patayan dahil sa 
	maling pagkahulog sa wikang kastila ng pangalan ng isang tenor; agadagad 
	naglathala ang isang mainggitin at ipinalagay siyang walang namumuwangan, 
	siya, ang una unang ulong nag-iisip sa Pilipinas! Gaanong hirap ang sinapit 
	niya sa pagsasanggalang! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nangailangan siyang sumulat ng di lamang lalabing 
	pitong palathala at sumangguni sa labing limang diksionario. At dahil sa 
	mabuting pagkakaalaalang iyon, ang kaawaawang si Ben-Zayb, ay lumalakad na 
	lubhang maingat na ang inilalakad ay kamay, hindi namin sinabing paa, upang 
	huwag gayahan si Padre Camorra na may masamang ugaling ipintas kay 
	Ben-Zayb na paa ang ginagamit nito kung sumusulat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakita mo na 
	Kiko?--ang sabi ni <span xml:lang="es" lang="es">Camaroncocido</span>--ang 
	kalahati ng taong iyan ay naparito dahil sa sinabi ng mga prayle na huwag 
	pumarito; ang gayo'y waring isang pahayag; at ang kalahati pa, sapagka't 
	anila sa sarili ay: ipinagbabawal ng mga prayle? kung gayo'y katutuhan 
	marahil. Maniwala ka sa akin, Kiko, ang mga palatuntunan mo ay mabubuti nga 
	ngunit lalo pang mabuti ang pastoral, at dapat mong mabatid na walang isa 
	mang nakabasa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaibigaaaan, 
	inaakala mo baga--ang tanong ni Tio&nbsp;Kiko na hindi mapalagay--na dahil sa 
	kagagawan ni Padre Salvi, ay alisin na kaya ang
	<span class="locked">tinutungkol ko?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marahil, 
	Kiko, marahil,--ang sagot ng kausap na tumingin sa langit--ang salapiy 
	unti-unti nang nawawala....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Tio Kiko ay 
	bumulong ng ilang salita at pangungusap na di malinawan, kung ang mga prayle 
	ay manghihimasok sa pagbabalita ng mga palabas dulaan ay papasok naman 
	siyang prayle. At matapos makapagpaalam sa kanyang kaibigan ay lumayong 
	uuboubo at pinakakalansing ang kanyang mga mamiso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si
	<span xml:lang="es" lang="es">Camaroncocido</span>, na taglay ang dati 
	niyang pagwawalang bahala, ay nagpatuloy sa pagyayao't dito na kaladkad ang 
	paa at mapungay ang paningin. Napuna niya ang pagdating ng ilang mukhang 
	hindi kilala, na iba't iba ang pinanggagalingan at nangaghuhudyatan sa 
	pamamagitan ng kindat, at pag-ubo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Noon lamang niya nakita sa mga gayong 
	pagkakataon ang mga taong iyon, siya, na nakakakilala sa lahat ng anyo ng 
	mga naninirahan sa siyudad at sa lahat ng pagmumukha. Mga lalaking madidilim 
	ang mukha, mga hukot, mga di mapalagay at hindi mawasto at masama ang 
	pagkakabalatkayo ng suot, na wariy noon lamang nagsuot ng americana. Hindi 
	nangagsisilagay sa unang hanay upang makapanood na mabuti, nangagkakanlong 
	sa dilim, na waring ayaw na sila'y makita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga polisiya 
	sekreta o mga magnanakaw?--ang tanong sa sarili ni
	<span xml:lang="es" lang="es">Camaroncocido</span> at dagling ikinibit ang 
	balikat--at ano ba ang mayroon sa akin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang parol ng 
	isang sasakyang dumarating ay tumanglaw sa pagdaraan sa isang pulutong ng 
	apat o lima ng mga taong yaon na nakikipag-usap sa isang wariy kawal sa 
	hukbo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Polisiya 
	sekreta!, marahil ay isang bagong tatag na kawanihan!--ang bulong niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At kumilos ng 
	isang anyong nagwawalang bahala. Ngunit makaraan yaon ay nakita ang 
	militar, matapos na makipag-alam sa dalawa o tatlong pulutong pa, na tumango 
	sa isang sasakyan at waring nakipag-usap ng mahigpitan sa isang nasa sa 
	loob. Si <span xml:lang="es" lang="es">Camaroncocido</span> ay lumakad ng 
	ilang hakbang at kahit hindi namangha ay waring nakilala niya si Simoun, 
	samantalang ang matalas niyang pangdinig ay nakaulinig ng ganitong maikling 
	usapan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	palatandaan ay isang putok!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Opo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	mag-alaala; ang General ay siyang nag-uutos; ngunit pag-iingatan ninyong 
	huwag masasabi. Kung susundin ninyo ang aking utos ay matataas kayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Opo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	gayo'y.... humanda kayo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang boses ay 
	tumigil at makaraan ang ilang sandaliy lumakad ang sasakyan. Kahit na 
	mapagwalang bahala si <span xml:lang="es" lang="es">Camaroncocido</span> ay 
	hindi rin nakapigil sa <span class="locked">pagbulong na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroong 
	binabalak.... Kaingatan ang mga bulsa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	naramdamang ang kanyang mga bulsa ay walang laman, ay muling ikinibit ang 
	balikat. Ano ang mayroon sa kanya kung gumuho man ang langit?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nagpatuloy 
	sa kanyang pakikibatyag. Nang magdaan sa harap ng dalawa kataong nag-uusap, 
	ay nadinig sa isa, na may sabit sa liig na mga kuwintas at kalmen, na 
	sinasabi sa wikang <span class="locked">tagalog, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	prayle ay malakas pa kay sa General, huwag kang mangmang; ito'y aalis at ang 
	mga prayle'y maiiwan. Magawa lamang nating mabuti ay yayaman tayo. Ang 
	palatandaan ay isang putok!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba, aba!--ang 
	bulong ni <span xml:lang="es" lang="es">Camaroncocido</span> na ipinipiksi 
	ang mga daliri--doon ay ang General, at dito ay si Padre Salvi.... 
	Kahabag-habag na bayan! Ngunit ano ang mayroon sa akin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At matapos na 
	maikibit ang balikat na sabay sa paglura at dalawang ngiwi na sa ganang 
	kanya ay siyang tanda ng lalong malaking pagwawalang bahala, ay ipinatuloy 
	ang kanyang pakikimatyag.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	naman ay matutuling dumarating ang mga sasakyan, biglang hihinto sa siping 
	ng pintuan at iiwan ang kanilang sakay na pawang tao sa mataas na kalipunan. 
	Ang mga babae, kahit babahagya ang lamig ng gabi, ay may dalang maiinam na
	<i xml:lang="es" lang="es">chal</i>, mga <i>pa&ntilde;olong</i> sutla at mga 
	panglaban sa ginaw; ang mga lalaki, ang mga naka <i xml:lang="es" lang="es">
	frac</i> at korbatang puti, ay gumagamit ng gaban; ang iba'y bitbit na 
	lamang at ipinatatanaw ang mga panaping sutla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa pulutong ng 
	mga talogigi, si Tadeo, ang nagkakasakit kung pumapanaog ang guro, ay 
	kaakbay ng kanyang kababayang baguhan na namalas nating nagtiis ng inianak 
	ng masamang pagkakabasa sa katotohanang sinabi ni
	<span xml:lang="fr" lang="fr">Descartes</span>. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang baguhan ay 
	napakatalogigit mausisa, at sinasamantala naman ni Tadeo ang kanyang 
	kamangmangan at di kaalaman upang pagsalaysayan ng lalong malalaking 
	kasinungalingan. Bawa't kastilang bumati sa kanya, maging may mababang 
	katungkulan o kawani sa mga tindahan, ay sinasabi sa kanyang kasama na yaon 
	ay pinuno sa isang kawanihan, markes, konde, at <abbr>iba pa.</abbr></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Datapwa'y 
	pag patuloy ang paglakad, psh! yao'y isang bulakbol, isang
	<i xml:lang="es" lang="es">oficial quinto</i>, isang taong walang gaanong 
	kabuluhan! At pag wala nang naglalakad, na makapagpahanga sa baguhan ay ang 
	mga magagarang sasakyan namang dumadaan ang hinaharap; si Tadeo ay bumabati 
	ng mainam na ayos, ikakaway nang malugod ang kamay, bibitiw ng isang
	<i xml:lang="es" lang="es">adios!</i> na matiwala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sino yaon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah!--ang 
	sagot na parang walang anuman--ang Gobernador Civil.... ang Segundo Cabo.... 
	ang Mahistradong si gayon.... ang asawa ni.... na mga <span class="locked">
	kaibigan ko!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang baguhan ay 
	nahahanga, nakatangang siya'y pinakikinggan at nag-iingat upang huwag 
	mapalagay sa kanan ng kausap. Si Tadeo ay kaibigan ng mga mahistrado at mga 
	gobernador!!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tinuturan 
	sa kanya ni Tadeo ang pangalan ng lahat ng dumarating, at, pag hindi niya 
	kilala, ay gumagawa ng mga bansag, mga kasaysayan at nagsasaysay ng mga 
	sarisaring bagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakikita mo 
	ba? iyong taong mataas, na may patilyang itim, duling ng kaunti, na itim ang 
	suot, yaon ang mahistrado&nbsp;A, kaibigang matalik ng asawa ng koronel&nbsp;B; isang 
	araw ay kaunti nang mag-away ang dalawang iyan kung hindi ako namagitna.... 
	adios! Tingnan mo, hayan at dumarating pa naman ang koronel, mag-away kaya 
	ang dalawa?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pinigil ng 
	baguhan ang paghinga, ngunit ang koronel at ang mahistrado ay malugod na 
	nangagkamayan; ang militar, na isang matandang bagongtao, ay nagtanong ng 
	kung ano ang lagay ng mga kaanak ng kaharap, at <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah! salamat 
	sa&nbsp; Diyos !--ang hinga ni Tadeo--ako ang may kapakanan ng kanilang pagkakasundo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung hilingin 
	kaya ninyo sa kanila na tayo'y ipasok?--ang tanong na may kaunting pangamba 
	ng baguhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--E! Kailan 
	ma'y hindi ako nangungutang ng loob!--ang sabing nagmataas ni Tadeo--ako'y 
	gumagawa nang mabuti, ngunit hindi ako nag-aantay na gantihin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinagat ng 
	baguhan ang kanyang mga labi, lalo pang nangunti at naglagay ng magalang na 
	layo sa pag-itan niya't ng kanyang kababayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagpatuloy si 
	Tadeo:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	musikong si H.... Iyan ang abogadong si J. na bumigkas, na wariy kanya, ng 
	isang talumpating nakatitik sa lahat ng aklat, at siya'y pinuri at hinangaan 
	ng mga nakingig.... Iyang bumababa sa isang hansomkab ay ang manggagamot na 
	si K, na ang lalo niyang pinagsisikapan ay ang sakit ng mga bata, kaya't 
	pinanganlan siyang Herodes.... Iyan ang mayamang si L, na walang 
	nasasabisabi kundi ang kanyang mga kayamanan at mga balaid.... ang makatang 
	si M, na lagi nang tumutukoy sa mga bituin at sa mga bagaybagay ng <em>dako 
	pa roon</em>.... Hayan ang magandang asawa ni N, na palaging natatagpuang 
	wala ang asawa kung dinadalaw ni Padre&nbsp;Q.... ang mangangalakal na hudiong si 
	P, na isang libong piso ang dala nang pumarito at ngayo'y mayroon nang mga 
	angawangaw.... Iyong may mahabang balbas ay ang manggagamot na si R, na 
	yumamang hindi dahil sa pagpapagaling kundi sa paggawa ng maysakit....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gumagawa ng 
	maysakit?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, sa 
	pagsisiyasat sa mga nasusundalo.... huwag kayong kumilos! Iyang 
	kagalanggalang na ginoo na maayos ang pagkakabihis, ay hindi mediko, ngunit 
	isang manggagamot <i xml:lang="la" lang="la">sui generis</i>; taglay niyang 
	buongbuo ang <i xml:lang="la" lang="la">similia similibus</i>.... Ang 
	kapitan sa kawal na kabayuhan na kanyang kasama ay siya niyang pinakagigiliw 
	sa mga nag-aaral sa kanya.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Iyang may suot na putian at ang sambalilo'y 
	nakakiling, ay ang kawaning si S, na ang batayan ay ang kailan ma'y huwag 
	magpakita ng ugaling magalang at muhingmuhi kapag nakakita ng isang sombrero 
	na nakapatong sa ulo ng iba; sinasabing ginagawa niya ang gayon upang huwag 
	mabili ang mga sombrerong aleman.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Iyang dumarating na kasama ang kanyang 
	anak ay ang mayamang mangangalakal na si C, na kumikita ng mahigit sa isang 
	daang libo.... ngunit ano ang wiwikain mo kung sabihin ko sa iyo na may 
	utang pa sa aking apat na piso, limangsikapat at labingdalawang kuwarta? 
	Ngunit sino ba naman ang sisingil sa isang mayamang gaya niyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May utang sa 
	inyo ang ginoong iyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mangyari! 
	isang araw ay iniligtas ko siya sa isang kagipitan; isang biyernes, ika 
	pito't kalahati ng umaga; naaalala ko pa; hindi pa ako nakapag-aagahan 
	noon.... Ang babaeng iyan na sinusundan ng isang matandang babae rin ay si 
	Pepay na mananayaw.... ngayo'y hindi na nagsasayaw sapul ng.... ipinagbawal 
	sa kanya.... ng isang ginoong napakakatoliko at matalik kong kaibigan...... 
	Nariyan ang bulugang si Z; matitiyak na sumusunod kay Pepay upang ito'y 
	pasayawing muli. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Isang mabuting tao na matalik kong kaibigan, wala kundi 
	isang kapintasan: siya'y mistisong intsik at nagpapanggap na taga Espa&ntilde;a. 
	Sst! Tingnan mo si Ben-Zayb, iyang mukhang prayle, na may dalang lapis sa 
	kamay at isang balumbong papel, iyan ang dakilang manunulat na si Ben-Zayb, 
	matalik kong kaibigan; may isang katalinuhan!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mawalang 
	galang sa inyo at iyang munting tao na may mga patillang puti?....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	naghalal sa kanyang tatlong anak na babae, iyang tatlong maliliit, na mga
	<i xml:lang="es" lang="es">auxiliar de Fomento</i> upang makasingil ng sahod 
	sa talaan ng Pamahalaan...... Iya'y isang ginoong matalas ang pag-iisip, 
	ngunit napakatalas! gagawa ng isang kaululan at ibibintang.... sa iba; 
	bibili ng isang baro at ang nagbabayad ay ang kabangbayan. Matalas, matalas 
	na matalas, ngunit napakatalas!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Tadeo ay 
	napahinto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At iyang 
	ginoong may astang mabangis at ang lahat ng tao'y tiningnan ng 
	paalipusta?--ang tanong ng baguhan na itinuro ang isang taong iginagalaw na 
	mapalalo ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit si 
	Tadeo ay hindi sumagot, inihaba ang liig upang tanawin si Paulita Gomez na 
	dumarating na kasama ang isang kaibigan, si Aling&nbsp;Victorina at si Juanito 
	Pelaez. Binigyan sila nito ng isang <i xml:lang="es" lang="es">palco</i> at 
	lalo pa manding kuba kay sa karaniwan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dating at 
	dating ang mga sasakyan, dumarating ang mga artista na sa ibang pintuan ang 
	pasok at sinusundan ng mga kaibigan at mga ligaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang si 
	Paulita'y makapasok na ay nagpatuloy si Tadeo:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang mga 
	pamangking babae ng mayamang si kapitang&nbsp;D, iyang nangakasakay sa
	<i xml:lang="es" lang="es">lando</i>, nakikita mong napakaganda't napakainam 
	ng pangangatawan? Sa loob ng ilang taon marahil ay pawang patay na o 
	baliw.... ayaw si kapitang&nbsp;D, na sila'y mangag-asawa, at nahahalata na sa 
	mga pamangkin ang pagkakahawa sa kabaliwan ng amain.... Iyan ang 
	binibining&nbsp;E, ang magmamana ng isang malaking kayamanan, na pinag-aagawan ng 
	mundo at ng mga kombento... Huwag kang umimik! iyan ay nakikilala ko! si 
	Padre&nbsp;Irene! nakabalat-kayo, may miyas na huwad lamang! Nakikilala ko dahil 
	sa kanyang ilong! At siya pa namang labanglaban!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Gulilat na tiningnan ng baguhan at nakitang nakanlong ang isang lebita na 
	mabuti ang tabas sa isang pulutong ng mga babae.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang tatlong 
	Parka!--ang patuloy ni Tadeo ng makitang dumarating ang tatlong dalagang mga 
	yayat, mabuto, nangangalumata, maluluwang ang bibig at masagwa ang 
	bihis,--ang mga pangalan niyan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Atropos?--ang 
	mahinang sabi ng baguhan na ibig magpakitang siya'y may kaunting kaalaman, 
	kahit sa mitolohiya man lamang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, tao 
	ka, ang mga pangalan niyan ay mga binibini ni Balcon, mga mapamintas, mga 
	matatandang dalaga, mamumula.... Ang lahat ay kinamumuhian, ang mga lalaki, 
	ang mga babae, ang mga bata.... Ngunit tingnan mo't sa piling ng kasamaan, 
	ay inilalagay ng&nbsp; Diyos&nbsp; ang lunas, kung minsan nga lamang ay nahuhuli. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa likod ng mga Parca, na panakot sa bayan, ay dumarating ang tatlong iyan, na 
	ipinagmamalaki ng kanilang mga kaibigang kinabibilangan ko. Iyang binatang 
	payat na malalaki ang mata, hukod ng kaunti na ang kilos ay madalas dahil sa 
	hindi umabot ng <span xml:lang="es" lang="es">billete</span>, iyan ay ang 
	kimikong si S, sumulat ng maraming pagsusuri at mga gawaing ukol sa 
	karunungan na ang ilan ay nagtamo ng ganting pala at nabantog na lahat; ang 
	sabi ng mga kastila sa kanya'y <em>maaasahan, maaasahan</em>.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang umaawat 
	sa kanya na ang tawa'y gaya ni <span xml:lang="fr" lang="fr">Voltaire</span> 
	ay ang makatang si T. batang matalino, matalik kong kaibigan, at dahil nga 
	sa kanyang katalinuhan ay itinapon ang panitik. Ang isa na nagpapalagay na 
	sila'y makipasok sa mga artista sa isang pintuan ay ang binatang manggagamot 
	na si M, na nakagawa na ng maraming mabubuting paggamot; siya man ay sinabi 
	ring maaasahan.... hindi lubhang kuba na gaya ni Pelaez, ngunit higit dito 
	sa katalasan at lalo pang palabiro. Inaakala kong sampung si kamatayan ay 
	hinihilo at pinagsisinungalingan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At iyang 
	ginoong kayumanggi na ang miyas ay wariy tutsang?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A! iyan ang 
	mangangalakal na si F, na ang lahat ng bagay ay pinagdadayaan, sampu ng 
	kanyang <i xml:lang="es" lang="es">fe de bautismo</i>; pinagpipilitan niyang 
	maging mistisong kastila sa lahat ng paraan at iniuubos ang buong kaya upang 
	malimot ang sarili niyang wika.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y 
	napakapuputi ang kanyang mga anak na babae....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, at iyan 
	nga ang sanhi kung bakit mataas ang halaga ng bigas, gayong wala namang 
	kinakain iyan kundi tinapay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	malinawan ng baguhan ang pagkakalahok ng halaga ng bigas sa kaputian ng mga 
	dalagang iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nariyan ang 
	lumiligaw, iyang binatang payat, kayumanggi, ang lakad ay mahinay na 
	sumusunod sa kanila at bumating anyong mapag-ampon sa tatlong magkakaibigang 
	nangagtatawa sa kanya.... iya'y isang nagbabata nang dahil sa kanyang mga 
	akala, sa kanyang panununton sa nasabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang baguhan ay 
	nagtaglay ng paghanga at paggalang sa binata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May kilos 
	hangal, at hangal ngang sadya,--ang patuloy ni Tadeo--tubo iyan sa <abbr>S.</abbr>&nbsp;Pedro 
	Makati at di gumagamit ng maraming bagay: kailan ma'y hindi naliligo ni 
	hindi tumitikim ng baboy, sapagka't sang-ayon sa sabi niya'y hindi kumakain 
	noon ang mga kastila at dahil din sa katwirang iyon ay hindi kumakain ng 
	kanin, patis ni bagoong, kahit na siya mamatay ng gutom at magtulo ang 
	kanyang laway.... Lahat ng galing sa Europa, bulok o naiimbak, ay masarap na 
	masarap sa kanya, at may isang buwan pa lamang na iniligtas siya ni Basilio 
	sa isang pamamaga ng sikmura: kumain ng isang pasopasoang kelwa upang 
	ipakilalang siya'y europeo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay nagsimula ang orkesta sa pagtugtog ng isang balse.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakikita mo 
	ang ginoong iyan? iyang payagot na bibiling-biling ang ulo at naghahanap na 
	siya'y batiin? Iyan ang bantog na Gobernador sa Pangasinan, isang taong 
	hindi makakain kapag may isang indio na hindi nagpugay sa kanya.... Kaunti 
	nang mamatay kung di nalagda ang <i>bando ng pagpupugay</i> na siyang sanhi 
	ng kanyang kabantugan. Kaawa-awang tao! may tatlong araw pa lamang na 
	kagagaling niya sa lalawigan at gaano na ang ipinangayayat! o! nariyan ang 
	dakilang tao, ang di matingkala, ibukas mo ang iyong mga mata!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sino? Iyang 
	nakakunot ang kilay?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, iyan ang 
	si Don Custodio, ang labusaw na si Don&nbsp;Custodio, nakakunot ang 
	kilay sapagka't may iniisip na makabuluhang panukala.... Kung maisasagawa 
	lamang ang laman ng kanyang utak ay iba sana ang lakad! Ah! naririto't 
	dumarating si Makaraig, ang iyong kasambahay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga, 
	dumarating si Makaraig na kasama si Pecson, si Sandoval at si Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang makita 
	sila ni Tadeo ay sumalubong at binati sila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ba kayo 
	paparito?--ang tanong ni Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala na 
	kaming inabot na <span xml:lang="es" lang="es">billete</span>....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuting 
	pagkakataon, mayroon kaming isang palko--ani Makaraig--si Basilio ay hindi 
	makapaparito.... sumama na kayo sa amin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi na 
	naantay ni Tadeo na ulitin ang anyaya. Ang baguhan, sa pangingilag na 
	makagambala, dala ng katakutang taglay ng sino mang
	<i xml:lang="es" lang="es">provinciano</i>, ay nagdahilan at hindi nagawang 
	siya'y mapapasok.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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