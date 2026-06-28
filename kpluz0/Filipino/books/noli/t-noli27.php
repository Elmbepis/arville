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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXVII. Ang Pagtatakipsilim</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gumawa rin naman ng malaking handa 
											sa bahay ni Kapitan Tiago. 
											Nakikilala natin ang may bahay; ang 
											kanyang hilig sa kaparangalanan, at 
											dapat na hiyain ng kanyang 
											kapalaluang pagka taga Maynila, sa 
											karikitan ng piging, ang mga 
											tagalalawigan. May isa pang 
											kadahilanang sa kanya'y pumipilit na 
											pagsikapan niyang siya'y 
											makapangibabaw na lubos sa mga iba: 
											kasama niya ang kanyang anak na si 
											Maria Clara at saka naroroon ang 
											kanyang mamanugangin, kaya't walang 
											pinag uusapan ang mga tao kung di 
											siya lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At siya nga naman: hinandugan ang 
											kanyang mamanugangin ng isa sa 
											lalong mga dalubasang pamahayagan sa 
											Maynila ng isang 'artikulo' (kasulatan) 
											sa kanyang unang mukha, na ang 
											pamagat (ng artikulong iyon) ay 'Siya'y 
											inyong tularan!' pinuspos siya ng 
											mga pangaral at inaalayan siya ng 
											ilang mga papuri. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tinawag siyang 'marilag 
											na binata at mayamang mamumuhunan;' 
											pagkatapos ng dalawang renglon ay 
											sinabing siya'y 'tanging 
											mapagkaawang-gawa'; sa sumusunod na 
											parrafo'y ikinapit naman sa kanya 
											ang saysay na: 'alagad ni Minervang 
											naparoon sa Inang Bayan upang bumati 
											sa wagas na lupa ng mga arte at mga 
											karunungan' at sa dakong ibaba pa'y 
											'ang espa&ntilde;ol filipino' at iba't iba 
											pa. Nag-aalab ang loob ni Kapitan 
											Tiago sa magandang pakikipag-unahan 
											sa gawang magaling, at kanyang 
											iniisip na baka magaling na kanyang 
											pagkagugulan ang pagtatayo naman ng 
											isang kumbento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang mga nagdaang araw ay dumating 
											sa bahay na tinatahanan ni Maria 
											Clara at ni tia Isabel ang maraming 
											kaja ng mga kakanin at mga inuming 
											galing Europa, mga salaming 
											pagkalalaki, mga kuadro at ang piano 
											ng dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumating si Kapitan Tiago ng araw 
											rin ng vispera: paghalik sa kanya ng 
											kamay ng kanyang anak na babae, 
											hinandugan niya ito ng isang 
											magandang relikariong ginto na may 
											mga brillante at mga esmeralda, na 
											ang lama'y isang tatal ng bangka ni 
											San Pedro, sa dakong inup-an ng 
											ating Panginoong Jesukristo ng 
											panahon ng pangingisda.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Wala ng lalalo pa sa galing ng 
											pagkikita ng bibiananin at ng 
											mamanugangin; kaukulan ngang sila'y 
											mag-usap ng nauukol sa eskuelahan. 
											Ang ibig ni Kapitan Tiago'y tawaging 
											'Eskuela ni San Francisco.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Maniwala kayo sa akin,--ang sabi ni 
											kapitang Basilio,--isang magaling na 
											pintakasi si San Francisco! Wala 
											kayong pakikinabangin kung tatawagin 
											ninyong 'Eskuela ng Instrukcion 
											Primaria'. Sino po si Instrukcion 
											Primaria?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumating ang ilang mga kaibigang 
											babae ni Maria Clara at kanilang 
											inanyayahan itong magpasial.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't bumalik ka agad,--ani 
											kapitang Basilio sa kanyang anak na 
											babae na sa kanya'y humihinging 
											pahintulot;--nalalaman mo ng sasalo 
											sa atin sa paghapon si Padre 
											Damasong bagong kararating.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At kanyang liningon si Ibarrang 
											nag-anyong may iniisip, at 
											idinugtong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po naman ay sumalo ng paghapon 
											sa amin; magiisa kayo sa inyong 
											bahay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Malaking totoo po ang aking pagka 
											ibig, datapwa't dapat pong sumaaking 
											bahay ako't baka sakaling may 
											dumating na mga 'visita,'--ang 
											isinagot ng binatang 
											nagkakang-uutal, at iniiwasan ang 
											titig ni Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dalhin po ninyo rito ang inyong mga 
											kaibigan, ang itinutol ng&nbsp; buong&nbsp; 
											kapanatagan ni Kapitan Tiago;--May 
											saganang pagkain sa aking bahay.... 
											Bukod sa roo'y ibig kong kayo at si 
											Padre Damaso'y magkawatasan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magkakaroon na po ng panahon sa 
											bagay na iyan!--ang isinagot ni 
											Ibarrang ngumingiti ng sapilitang 
											pagngiti, at humandang samahan ang 
											mga dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanaog sila sa hagdanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanggigitna si Maria Clara kay 
											Viktoria at kay Iday, sumusunod sa 
											likuran si tia Isabel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagwawahi ang tao sa udyok ng 
											paggalang, at ng sila'y mabigyang 
											daan. Puspos ng katakatakang 
											kagandahan si Maria Clara: napawi 
											ang kanyang pamumutla, at kung 
											nananatiling tila may iniisip ang 
											kanyang mga mata, ang kanyang bibig 
											naman ay wari'y walang ibang 
											nakikilala kung hindi ang ngiti. 
											Taglay iyang kagandahan ng loob ng 
											isang lumiligayang dalaga, siya'y 
											bumabati sa kanyang mga dating 
											kakilala mula pasa kamusmusan, at 
											ngayo'y nagsisipanggilalas sa 
											kanyang mapalad na kabataan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa kulang pang labing limang araw ay 
											nanag-uli sa kanya yaong lubos na 
											pagpapalagay ng loob, yaong 
											katabilang musmos na tila mandin 
											nagulaylay sa gitna ng makikipot na 
											tahanang nalilibot ng pader sa 
											beaterio; masasabing kinikilala ng 
											paroparo ang lahat ng mga bulaklak 
											pagkaalis niya sa kanyang bahay-uod; 
											nagkasiya sa kanya ang lumipad na 
											sumandali at magpainit sa mga 
											doradong sinag ng araw upang mawala 
											ang katigasan ng mga kasukasuan ng 
											bagong nagkakapakpak. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											K<font face="Arial" color="#333333">umikislap ang 
											bagong buhay sa&nbsp; buong&nbsp; 
											katauhan ng 
											dalaga: pawang magaling at maganda 
											ang kanyang tingin sa lahat; 
											isinasaysay ang kanyang pagsinta sa 
											pamamag-itan niyang kalugodlugod na 
											asal ng isang virgeng palibhasa'y 
											walang namamasdan kung di mga 
											budhing dalisay, hindi nakikilala 
											kung ano ang dahil ng mga 
											paghihiyahiyaan. Gayon man, pagka 
											siya'y inaalayan ng masasayang mga 
											aglahi'y tinatakpan niya ang kanyang 
											mukha ng abaniko; datapuwa't pagka 
											nagkakagayo'y ngumingiti ang kanyang 
											mga mata at lumalaganap sa kanyang&nbsp; 
											buong&nbsp; katauhan ang bahagyang 
											kilabot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinasimulaang lagyan ng mga ilaw ang 
											mga pangulong bahay, at sa mga daang 
											pinagdaraanan ng mga musika ay 
											sinisindihan ang mga ilaw ng mga 
											ara&ntilde;ang kawayan at kahoy na inihuwad 
											sa mga ara&ntilde;a ng simbahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natatanaw buhat sa daan, sa mga 
											bintanang bukas, ang hindi 
											naglilikat na pagpaparoo't parito ng 
											mga tao sa mga bahay, sa gitna ng 
											kaliwanagan ng mga ilaw at halimuyak 
											ng mga bulaklak, sa kaayaayang tinig 
											ng piano, arpa u orquesta. 
											Nangaglalakaran sa mga daan ang mga 
											insik, mga kastila, mga filipinong 
											may suot europeo o suot tagalog. 
											Nangagkakahalohalo sa paglakad, na 
											nangagkakasikuhan at nangagtutulakan 
											ang mga alilang lalaking may dalang 
											karne o mga inahing manok, mga 
											estudianteng nakaputi ang pananamit, 
											mga lalaki't mga babae, na 
											nangagsisipanganib na sila'y matahak 
											ng mga kotse at mga kalesa, na kahit 
											sumisigaw ng 'tabi' ang mga 
											kutsero'y nahihirapan din silang 
											makapaghawi ng daan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bumati sa ating mga kakilala, ng na 
											sa tapat sila ng bahay ni kapitang 
											Basilio, ang ilang mga kinabataan, 
											at inaayayahang pumanhik muna sa 
											bahay. Ang masayang boses ni Sinang, 
											na tumatakbong papanaog sa hagdanan, 
											ang siyang nagbigay wakas sa mga 
											pagdadahilan upang huwag pumanhik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pumanhik muna kayong sandali upang 
											ako'y makasama sa inyo,--ang sinasabi 
											niya. Nababagot ako sa pakikipanayam 
											sa gayong karaming hindi ko mga 
											kakilalang walang pinag-uusapan kung 
											di mga sasabungin at mga baraja.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagsipanhik sila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Punongpuno ang salas ng mga tao. 
											Nangagpauna ang ilan upang bumati 
											kay Ibarra, na kilala, ang pangalan 
											ng lahat; kanilang pinagmamasdan ng&nbsp; 
											buong&nbsp; pagkahanga ang kagandahan ni 
											Maria Clara, at 
											nangagbubulungbulungan ang ilang mga 
											matatandang babae, samantalang 
											ngumanganga: mukhang virgen!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napilitan sila roong uminom ng 
											tsokolate. Naging matalik na 
											kaibigan at taga pagsanggalang ni 
											Ibarra si kapitang Basilio, mula ng 
											araw na sila'y maglibang sa 
											kaparangan. Naalaman niya, sa 
											pamamag-itan ng telegramang 
											inihandog sa kanyang anak na babaeng 
											si Sinang, na natatalos ni Ibarra 
											ang kanyang pananalo sa usapin, ayon 
											sa hatol ng hukom, at dahil dito'y 
											sapagkat aayaw siyang pagahis sa 
											kagandahan ng loob, kanyang 
											ipinakiusap na pawalang kabuluhan 
											ang pinagkayarian ng sila'y maglaro 
											ng ajedrez. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapwa't sapagkat 
											aayaw pumayag si Ibarra sa gayong 
											bagay, ipinakiusap naman ni kapitang 
											Basiliong ang salaping dapat na 
											ibayad sa mga kostas ay gamitin sa 
											pagbabayad ng isang maestro sa 
											gagawing eskuela ng bayan. Dahil sa 
											gayong nangyayari, ginagamit ni 
											kapitang Basilio ang kanyang mainam 
											na mga pananalita, at ng huwag ng 
											ipagpatuloy ng ibang mga kausapin 
											ang kanilang mga kakaibang adhika, 
											at sa kanila'y sinasabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Maniwala kayo sa akin: sa mga 
											usapin ang nananalo'y siyang 
											nahuhubdan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapwa't wala siyang mapahinuhod na 
											sino man, bagaman kanyang sinasambit 
											ang mga romano.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng makatapos ng makainom ng 
											tsokolate, napilitan ang ating mga 
											kabataang pakingan ang pianong 
											tinutugtog ng organista ng bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagka siya'y pinakikinggan ko sa 
											Simbahan ani Sinang, nakakaibig 
											akong magsayaw; ngayong piano ang 
											kanyang tinutugtog ang naiisipan ko 
											nama'y magdasal. Dahil dito'y sasama 
											ako sa inyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig po ba ninyong pumarito sa amin 
											ngayong gabi?--ang inianas ni 
											kapitang Basilio sa tainga ni Ibarra 
											ng ito'y magpaalam na--maglalagay si 
											Padre Damaso ng isang maliit na 
											bangka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngumiti si Ibarra at sumagot ng 
											isang tango ng ulo, na mangyayaring 
											ang maging kahuluga'y pagsang-ayon, 
											at mangyayari namang hindi 
											pagsang-ayon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ba iyan?--ang tanong ni Maria 
											Clara kay Viktoria, na itinuro sa 
											isang mabilis na sulyap ang isang 
											binatang sa kanila'y sumusunod.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan ... iya'y isang pinsan ko,--ang 
											isinagot na halos nagugulumihanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang isa?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iya'y hindi ko pinsan.--ang 
											dalidaling isinagot ni Sinang;--iya'y 
											isang anak ng aking tia.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdaan sila sa harapan ng 
											kumbentong tahanan ng kura, na ang 
											katotohanan ay hindi sahol sa mga 
											ibang lugar sa kasayahan. Hindi 
											napigilan ni Sinang ang isang sigaw 
											ng panggigilalas ng kanyang makitang 
											may mga ilaw ang mga lampara, mga 
											lamparang ang mga anyo'y sa 
											kaunaunahan pa, na hindi 
											pinababayaan kailan man ni Padre 
											Salving siyang pag-ilawan at ng 
											huwag magkagugol sa petroleo. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											May nangariring na mga sigawan at 
											malalakas na halakhakan, napapanood 
											na ang mga prayle'y lumalakad ng 
											mahina, at iginagalaw ang ulo ng 
											ayon sa kompas, at malaking tabako 
											ang napapamuti sa mga labi. 
											Pinagsisikapan ng hindi paring sa 
											kanila'y nakikipanayam, na kanilang 
											gagarin ang lahat ng ginagawa ng mga 
											mababait na prayle. Ayon sa mga 
											damit europeong kanilang kasuutan, 
											marahil sila'y mga kawani (empleado) 
											ng gobierno o mga punong lalawigan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natanawan ni Maria Clara ang mabilog 
											na pangangatawan ni Padre Damaso sa 
											tabi ng makisig na tindig ni Padre 
											Sibyla. Hindi kumikilos sa kanyang 
											kinalalagyan ang matalinghaga at 
											mapanglawing si Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalulungkot!--ang ipinahiwatig ni 
											Sinang;--kanyang pinag-iisip-isip ang 
											kanyang magugugol sa gayong karaming 
											mga panauhin. nguni't makikita rin 
											ninyong hindi siya ang magbabayad 
											kung hindi ang mga sakristan. Sa 
											tuwituwi na'y kumakain ang kanyang 
											mga panauhin sa ibang lugar.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinang!--ang ipinagwika sa kanya ni 
											Viktoria.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Totoong ako'y galit sa kanya mula 
											ng iwasak ang 'Rueda de la Fortuna,' 
											hindi na ako mangungumpisal sa 
											kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natangi sa lahat ng mga bahay ang 
											isang walang kailaw-ilaw, at hindi 
											man lamang bukas ang mga bintana; 
											ang bahay na iyon ang sa alperes. 
											Nagtaka sa bagay na ito si Maria 
											Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang aswang! ang Musa ng Guwardiya 
											Sibil, ang wika nga ng matandang 
											lalaki!--ang biglang sinabi ng 
											katakot takot na si Sinang.--Ano ang 
											ipakikialam niya sa ating mga 
											katuwaan? Marahil ay nagngangalit! 
											Pabayaan mong dumating ang kolera at 
											makikita mong siya'y mag-aanyaya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kailan ma'y kinasusutan ko siya, at 
											lalonglalo na ng guluhin ang ating 
											pagkakatuwa sa pamamag-itan ng 
											kanyang mga guwardiya sibil. Kung 
											Arzobispo lamang ako'y ipakakasal ko 
											ang babaeng iyan kay Padre Salvi.... 
											makikita mo kung ano ang kanilang 
											magiging mga anak! Sukat bang 
											ipahuli ang kaawaawang piloto, na 
											sumugba sa tubig makapagbigay loob 
											lamang....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi niya natapos ang sinasabi; sa 
											sulok ng plaza na pinagkakantahan ng 
											isang bulag na lalaki, na isang 
											gitarra ang katono, ng kasaysayang 
											ukol sa mga isda, may isang hindi 
											karaniwang napapanood.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Yayo'y isang lalaking ang nakapatong 
											sa ulo'y isang malapad na salakot na 
											dahon ng buli, at dukhang totoo ang 
											pananamit. Ang suut niya'y isang 
											gulagulanit na levita at salawal na 
											maluang, na kawangis ng salawal ng 
											mga insik, na punit sa iba't ibang 
											lugar. Karukharukhaang mga panyapak 
											ang nakasuut sa kanyang mga paa. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sumasadilim ang kanyang mukha dahil 
											sa kanyang salakot; nguni't 
											manakanakang nagmumula sa kadilimang 
											iyon ang dalawang kislap, na 
											pagdaka'y napapawi. Siya'y matangkad, 
											at napagkikikilalang siya'y bata pa, 
											dahil sa kanyang mga galaw. 
											Inilalagay sa lupa ang isang bakulan, 
											at pagkatapos ay lumalayo't 
											nagsasalita ng mga kakaibang tinig 
											na hindi mawatasan; nananatiling 
											nakatindig, lubos ang pagkalayo sa 
											mga iba, na anaki'y siya at ang 
											karamihang tao'y talagang 
											nangagpapangilagan ang isa't isa. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pagkakagayo'y nangagsisilapit ang 
											ilang mga babae sa kanyang bakulan 
											at inilalagay doon ang mga bungang 
											kahoy, isda, bigas at iba pa. Pagka 
											wala ng lumalapit na sino man, 
											nangagsisilabas sa mga kadilimang 
											iyon ang ibang mga tinig na lalong 
											malulungkkot, nguni't hindi na 
											totoong nakalulunos, napasasalamat 
											marahil; dinarampot ang kanyang 
											bakulan at saka lumalayo upang 
											ulitin ang gayon ding gawa sa ibang 
											lugar naman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagunita ni Maria Clara sa gayong 
											nakita ang isang sakuna, at 
											pinagsumakitang itanong kung ano ano 
											nangyayari sa kakaibang taong iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan ang sanlazarohin,--ang isinagot 
											ni Iday.--May apat na taon na ngayong 
											kinapitan siya ng sakit na iyan: ang 
											wika ng iba'y dahil sa pag-aalaga, 
											sa kanyang ina, at anang iba nama'y 
											dahil sa pagkapiit niya sa malamig 
											na bilangguan. Siya'y doon tumatahan 
											sa kabukiran, sa malapit na sa 
											libingan ng mga insik; hindi siya 
											nakikipag-abot-usap kanino man, 
											nangagsisilayong lahat sa kanya sa 
											takot na baka mahawahan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kung makita 
											mo sana ang kanyang dampa! Iyon ang 
											dampa ni Giring-giring: ang hangin, 
											ang ulan at ang araw ay pawang 
											pumapasok at lumalabas na katulad ng 
											karayom sa damit. Ipinagbawal sa 
											kanyang humipo ng ano mang bagay na 
											pag-aari ng sino mang tao. Nahulog 
											isang araw sa sangha ang isang bata; 
											hindi naman malalim ang sangha, 
											datapuwa't nagkataong siya'y 
											dumaraan doon, ang ginawa niya'y 
											tinulungan niya ang bata sa pag-ahon 
											doon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Napagtanto ng ama ng bata ang 
											nangyaring iyon, pagsakdal sa 
											gobernadorcillo, at ipinapalo siya 
											nito ng anim sa gitna ng daan at 
											saka ipinasunog pagkatapos ang 
											yantok. Cakilakilabot iyon! 
											Tumatakbo sa pagtakas ang 
											sanlazarohin, hinahabol siya ng 
											tagapalo at sinisigawan siya ng 
											gobernadorcillo: 'Mag-aral ka! 
											mabuti pang malunod na nga ang isang 
											tao, huwag lamang magkasakit na gaya 
											ng sakit mo.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay nga!--ang ibinulong ni Maria 
											Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At hindi nalalaman ang kanyang 
											ginagawa'y dalidaling lumapit sa 
											bakulan ng kulang palad, at inilagay 
											roon ang relikario na bago pa lamang 
											kahahandog sa kanya ng kanyang ama.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano 
											ang ginawa mo?--ang sa kanya'y 
											itinanong ng kanyang mga kaibigang 
											babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala akong ibang sukat 
											maibigay!--ang isinagot, at kanyang 
											inilihim sa pamamag-itan ng isang 
											tawa ang luha ng kanyang mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano ang kanyang gagawin sa 
											iyong relikario?--ang sa kanya'y 
											sinabi ni Viktoria.--Binigyan siya 
											isang araw ng salapi. nguni't ang 
											ginawa ng sanlazarohin ay inilayo sa 
											kanya ang salaping iyon sa 
											pamamag-itan ng isang patpat: ano 
											ang gagawin niya sa salapi sa gayong 
											wala sino mang tumangap ng ano mang 
											bagay na galing sa kanya? Kung 
											makakain sana ang relikario!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan ni Maria Clara ng&nbsp; buong&nbsp; 
											pananaghili ang mga babaeng 
											nagbibili ng mga kakanin, at 
											ikinibit ang mga balikat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't lumapit ang sanlazarohin sa 
											bakulan, kinuha ang hiyas na 
											kuminang sa kanyang mga kamay, 
											lumuhod, hinagkan ang hiyas na iyon, 
											at saka nagpugay at bago isinubsob 
											ang kanyang noo sa alabok ng bakas 
											ng dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ikinubli ni Maria Clara ang kanyang 
											mukha sa kanyang abaniko at dinala 
											ang panyo sa kanyang mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y lamapit ang isang babae 
											sa kulang palad na anaki'y 
											nagdarasal. Lugay at gusamot ang 
											kanyang mahabang buhok, at sa 
											liwanag ng ilaw ng mga parol ay 
											napanood ang payat at namumutla ng 
											mainam na pagmumukha ng ul-ol na si 
											Sisa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng maramdaman ng sanlazarohin ang 
											paghipo sa kanya, nagpakasigawsigaw, 
											at tumindig sa isang lukso. nguni't 
											humawak sa kanyang bisig ang ul-ol 
											na babae, sa gitna ng malaking 
											pangingilabot ng tao, at ito ang 
											kanyang sinabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magdasal tayo! magdasal tayo! 
											ngayon ang kaarawan ng mga patay! 
											Ang mga ilaw na iya'y siyang mga 
											buhay ng mga tao; ipagdasal natin 
											ang aking mga anak na lalaki!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ilayo ninyo ang babaeng iyan, 
											papaglayuin ninyo sila! sapagkat 
											mahahawa ang ul-ol na babae!--ang 
											sigawan ng karamihang tao, datapwa't 
											walang mangahas na lumapit sino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikita mo ba ang ilaw na iyon sa 
											kampanario? Ang ilaw na iyon ang 
											aking anak na si Basiliong nananaog 
											sa pamamag-itan ng isang lubid! 
											Nakikita mo ba ang ilaw na iyon na 
											kumbento? Ang ilaw na iyon ang aking 
											anak na si Crispin, nguni't hindi ko 
											sila paroroonan sapagkat may sakit 
											ang kura at siya'y maraming mga 
											onza, at ang mga onza'y nangawawala. 
											Magdasal tayo at ating ipatungkol sa 
											kaluluwa ng kura! Dinadalhan ko siya 
											ng amargoso at zazalidas; punongpuno 
											ang aking halamanan ng mga bulaklak 
											at dating may dalawa akong anak na 
											lalaki. Dati akong may halamanan, 
											nag-aalaga ako mga bulaklak at 
											dating may dalawa akong anak na 
											lalaki!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At binitawan ang sanlazarohin at 
											lumayong kumakanta:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dating may halamanan ako't mga 
											bulaklak, ako'y dating may mga anak 
											na lalaki, halamanan at mga 
											bulaklak!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano na ba ang nagawa mong magaling 
											sa kahabaghabag na babaeng iyan?--ang 
											tanong ni Maria Clara kay Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala pa! siya'y nawala ng mga araw 
											na ito sa bayan at hindi nangyaring 
											siya'y masumpungan!--ang isinagot ng 
											binatang nagdadalang 
											kahihiyan--Bukod sa roo'y totoong 
											marami ang aking ginawa, nguni't 
											huwag ka sanang mahapis; ipinangako 
											sa akin ng kurang tutulungan niya 
											ako, tuloy ipinagtagubilin niya sa 
											akin ang malaking pag-iingat at 
											paglilihim sapagkat tila mandin 
											isang kagagawan ng guwardiya sibil 
											Totoong ipinagmamalasakit ng kura 
											ang babaeng iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ba sinasabi ng alperes na 
											kanyang ipahahanap ang mga bata?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo, nguni't ng sabihin iyo'y may 
											kaunting....kalanguhan siya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Casasabi pa ng gayong bagay ng 
											kanilang makitang hindi inihahatid 
											kung di kinakaladkad ang ul-ol na 
											babae ng isang soldado: aayaw sumama 
											si Sisa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit 
											ba ninyo hinuli ang babaeng iyan? 
											Ano ang kanyang ginawa? ang tanong 
											ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung bakit? Hindi ba ninyo nakita 
											kung paano ang ginagawa niyang 
											pag-iingay?--ang sagot ng 
											tagapag-ingat ng katahimikan ng 
											bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dalidaling kinuha ng sanlazarohin 
											ang kanyang bakulan at lumayo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minagaling ni Maria Clarang umuwi na, 
											sapagkat lumipas sa kanya ang tuwa 
											at kasayahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mayroon 
											din palang mga taong hindi 
											lumiligaya! ang kanyang ibinulong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagdating niya sa pintuan ng kanyang 
											bahay, kanyang naramdamang 
											naragdagan ang kanyang kapanglawan, 
											ng kanyang mahiwatigang aayaw 
											pumanhik at nagpapaalam ang 
											nangingibig sa kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kinakailangan!--ang 
											sabi ng binata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pumanhik sa hagdanan si Maria 
											Clarang ang sumasaisip ay totoong 
											nakayayamot ang mga araw ng piyesta, 
											pagka dumarating ang mga panauhing 
											tagaibang bayan.</font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Arial" style="font-size: 15pt" color="#800080">
																	<a href="t-noli-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Nilalaman ng 
																	Noli Me 
																	Tangere</font></a></font></p>
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
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; 
											&nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
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