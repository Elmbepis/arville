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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXV. Tawanan-Iyakan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang loob kabahayan ng &#39;<i xml:lang="es" lang="es">Panciteria Macanista de buen gusto</i>&#39; 
	ng gabing iyon ay may anyong di pangkaraniwan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Labing apat na 
	binata, ng mga pulong lalong tanyag ng Sangkapuluan, mula sa indio na walang 
	ibang dugong halo (kung mayroong walang halo) hanggang sa kastilang taga 
	Espa&ntilde;a, ay nangagkatipon upang idaos ang piging na sinabi ni Padre Irene, 
	alang-alang sa naging hangga ng salitaang ukol sa pagtuturo ng wikang 
	kastila. Inupahan nila nang sa ganang kanila lamang ang lahat ng dulang, 
	pinaragdagan ang ilaw at ipinadikit sa dingding, kasiping ng mga palamuti at 
	kakemonong intsik, ang ganitong di mawatasang mga pananalita:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	<span class="smcap-fne">L<span class="smcap-f">UMUWALHATI</span></span>
	<span class="smcap-f">SI</span> <span class="smcap-fne">C<span class="smcap-f">USTODIO</span></span>
	<span class="smcap-f">DAHIL SA KANYANG MGA KALIKSIHAN AT PANSIT SA LUPA SA 
	MGA BINATANG MAY MABUBUTING KALOOBAN</span>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa isang bayan 
	na ang lahat ng kabalbalan ay tinatabingan ng ayos kagalanggalang, at ang 
	karamihan ay natataas sa tulong ng usok at mainit na hangin; sa isang bayan 
	na yaong sadyang katunayan at tapat ay nakasasakit paglabas sa puso at 
	mangyayaring maging sanhi ng mga kaguluhan, marahil ay yaon ang lalong 
	mabuting paraan upang ipaggalak ang sumumpong sa ulo ng bantog na si <abbr>
	D.</abbr>&nbsp;Custodio. Sinagot ng mga nadaya ng isang halakhak ang biro, ang
	<i xml:lang="es" lang="es">pastel</i> ng pamahalaan ay sinagot ng isang 
	pinggang pansit, at mabutit gayon na lamang!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Nangagtatawanan, nagbibiruan, ngunit nahahalatang ang katuwaan, ay pilit; 
	ang tawanan ay tumataginting dahil sa kaunting panginginig, sa mga paningiy 
	pumupulas ang matutuling kislap at hindi iisa ang kinakitaan ng 
	nagniningning na patak ng luha. Datapwa't gayon man, ang mga binatang iyon 
	ay mga ganid na loob, mga wala sa katwiran! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hindi noon lamang pinasiyahan sa 
	gayong paraan ang lalong maiinam na panukala, na pinapatay ang mga pag-asa 
	sa tulong ng malalaking salita at mumunting gawa: bago si Don Custodio 
	ay nagkaroon na ng marami, lubhang marami! Sa gitna ng kabahayan at sa tapat 
	ng mga parol na pula, ay may apat na dulang na bilog, na naaayos na 
	patungko; ang mga luklukan ay mga uupang kahoy na bilog din. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa gitna ng 
	bawa't dulang, alinsunod sa kaugalian ng tindahan, ay may nakahandang apat 
	na pingang mumunti na may tig-apat na kakanin ang bawa't isa, at apat na 
	tasang tsa, na may kanikanyang takip, na pawang porselanang pula; sa harap 
	ng bawa't luklukan ay may isang bote at dalawang kopang bubog na 
	nangingintab.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa 
	pagkamausisa ni Sandoval, ay nagtitingintingin, lahat ay sinisiyasat, 
	tinitikman ang mga hopya, pinagmamasdan ang mga palamuti, binabasa ang 
	talaan ng mga halaga. Ang iba'y nangag-uusap ng ukol sa mga bagay-bagay na 
	pang-kasalukuyan, ukol sa mga artistang babae ng operetang pranses at 
	mahiwagang pagkakasakit ni Simoun, na, alinsunod sa ilan, ay natagpuang may 
	sugat sa lansangan; alinsunod naman sa iba ay nagtangkang magpatiwakal: gaya 
	ng sadyang dapat mangyari, silang lahat ay naninira sa mga pagkukurokuro. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Tadeo ay may ibang balita, na alinsunod sa sabi niya'y hindi magkakabula. Si 
	Simoun ay sinugatan ng isang hindi kilala sa may lumang liwasan ng Vivak; 
	ang sanhi ay ang higanti, at ang katunayan ay ang pangyayaring si Simoun ay 
	ayaw magpahiwatig ng anuman. Matapos iyon ay napag-usapan ang mga mahiwagang 
	higanti, at gaya ng maaantay ay mga kagagawang prayle ang tinutukoy, na 
	isinalaysay ng bawa't isa ang inaasal ng mga kura sa kanikanilang bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang tula na 
	nasusulat ng malalaking titik na itim, ang nasa dakong itaas ng pintong 
	kabahayan at nagsasabing:</font></p>
	<div class="poem-container">
		<blockquote class="poem" xml:lang="es" lang="es">
			<div class="stanza">
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					De esta fonda el cabecilla</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Al publico advierte</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Que nada dejen absolutamente</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Sobre alguna mesa o silla.</font></div>
			</div>
		</blockquote>
	</div>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kay inam na 
	paunawa!--ang bulalas ni Sandoval--napagkikilala ang pagtitiwala sa pulutong 
	ano? At naku, ang tula! Maipalalagay na si Don Tiburcio na 
	naging tula, dalawang paa, ang isa'y mahaba kay sa isa sa pag-itan ng 
	dalawang tungkod! Pag nakita iyan ni Isagani, ay iaalay sa kanyang magiging 
	inali!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Narito si 
	Isagani!--ang sagot ng isang boses mula sa hagdanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ang mapalad 
	na binata'y lumitaw na lipus katuwaan, na sinusundan ng dalawang intsik na 
	walang baro na may dalang malalaking mangkok, na nagkakalat ng masarap na 
	amoy, na nakasalalay sa dalawang malalaking pangnan. Masasayang paaba ang sa 
	kanila'y sumalubong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Wala pa si 
	Juanito Pelaez, ngunit sa dahilang nakaraan na ang oras ay masasayang 
	nangagsidulog sa dulang. Kailan pa man ay hindi makatutupad sa salitaan si 
	Juanito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung si 
	Basilio pa ang ating inanyayahan at hindi siya--ang sabi ni Tadeo.--Nilasing 
	sana natin upang mapagsabi ng ilang lihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ha, ang 
	mapagnilay na si Basilio ay may itinatagong lihim?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah!--ang 
	tugon ni Tadeo--at ang lalo pa namang mahahalaga! May ilang lihim na 
	pangyayaring siya lamang ang tanging nakababatid ng linaw.... ang batang 
	nawala, ang monha....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga ginoo; 
	ang <i>pansit lang-lang</i> ay siyang sopas na pinakamabuti!--ang sigaw ni 
	Makaraig;--gaya ng makikita ninyo, Sandoval, ang halo ay kabuti, hipon, 
	tiniping itlog, sotanghon, manok, at hindi ko na maalaman kung ano pa. 
	Bilang pamago ay ihandog natin ang mga buto kay Don Custodio; 
	tingnan natin, magpanukala siya ng ukol dito!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang masayang 
	halakhakan ang sumalubong sa pahayag na ito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag 
	naalaman....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Patakbong 
	paparito!--ang dugtong ni Sandoval--napakabuti ng sopas, ano ang pangalan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i>Pansit 
	lang-lang</i>, ito nga <i>pansit</i> intsik upang maiba sa isa na sadyang 
	gawa rito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah! mahirap 
	alalahanin ang pangalan. Patungkol kay Don Custodio ay 
	bibinyagan ko ng pangalang <i>panukalang sopas</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinanggap ang 
	bagong pangalan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga 
	ginoo,--ang sabi ni Makaraig, na siyang pumili ng mga kakanin--mayroon pa 
	tayong tatlong ulam! <i>Lumpiya</i> ng intsik na ang laman ay baboy....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na 
	inihahandog kay Padre Irene!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ababa! Si
	Padre Irene ay hindi kakain ng baboy hanggang hindi nag-aalis ng 
	ilong--ang marahang sabi ng isang binatang taga Iloilo sa kanyang kalapit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mag-aalis ng 
	ilong!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mawala ang 
	ilong ni Padre Irene!--ang panabay na sigawan ng lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Galang, mga 
	ginoo, kaunting galang!--ang hingi ni Pecson na pabirong wariy tinototoo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	pangatlong pinggan ng ulam ay panyang na alimango......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na 
	ipinatutungkol sa mga prayle--ang dugtong ng taga Bisaya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dahil sa 
	pagka-alimango,--ang dugtong ni Sandoval.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tama at 
	tatawaging panyang na prayle!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inulit ng 
	lahat na sabay-sabay ang: panyang na prayle!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tumututol ako 
	sa ngalan ng isa!--ang sabi ni Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ako, sa 
	ngalan ng mga alimango!--ang dugtong ni Tadeo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Galang, mga 
	ginoo, kaunting galang!--ang muling sigaw ni Pecson na namumuwalan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang pang-apat 
	ay pansit na ginisa na ipinatutungkol.... sa pamahalaan at sa bayan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lahat ay 
	napalingon kay Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi pa 
	nalalaunan, mga ginoo,--ang patuloy--ay inaakalang ang pansit ay gawang intsik 
	o hapon, ngunit sa dahilang siya'y hindi kilala ni sa Kaintsikan ni sa 
	Hapon, ay tila siya pilipino, ngunit gayon man, ang mga nagluluto at 
	nakikinabang ay ang mga intsik: <span xml:lang="la" lang="la">idem</span> na
	<span xml:lang="la" lang="la">idem</span> na <span xml:lang="la" lang="la">
	idem</span> ang nangyayari sa pamahalaan at sa Pilipinas: wariy intsik, 
	ngunit intsik man sila o hindi man, ay may mga doktor ang Santa&nbsp;Madre.... 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lahat ay kumakain at lumalasa sa kanya, ngunit gayon man ay 
	nangagpapatumpiktumpik pa't nagpapakunwaring umaayaw: gayon din ang 
	nangyayari sa bayan, gayon din ang sa pamahalaan.... Lahat ay nabubuhay ng 
	dahil sa kanya, lahat ay kalahok sa pistahan at pagkatapos ay walang bayang 
	sasama pa kay sa Pilipinas, walang pamahalaang lalong magulo. Ipatungkol nga 
	natin ang pansit sa bayan at sa pamahalaan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipatungkol!--ang sabaysabay na sabi ng lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tutol 
	ako!--ang bulalas ni Isagani....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Igalang ang 
	mga bata, igalang ang mga nasawi!--ang sigaw na pinaugong ang tinig ni 
	Pecson, na itinaas ang isang buto ng inahing manok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipatungkol 
	natin ang pansit sa intsik na si Quiroga, na isa sa apat na kapangyarihan ng 
	sangbayanang pilipino!--ang palagay ni Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, sa
	<i xml:lang="es" lang="es">Eminencia Negra</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	maingay!--ang pabiglang sabing mahiwaga ng isa,--sa liwasan ay may mga 
	pulutong na nagmamalas sa atin at ang mga dingding ay may pangdinig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga, 
	pulupulutong ng mga nanonood ay nangagtayo sa tapat ng mga durungawan, 
	samantalang ang ingayan at tawanan sa mga tindahang kalapit ay lubos na 
	napawi, na wari bagang minatyagan ang nangyayari sa piging. Ang katahimikan 
	ay may ayos na katangitangi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tadeo, 
	ibigkas mo ang iyong talumpati!--ang marahang sabi ni Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang si 
	Sandoval ang siyang lalong bihasa sa pagkamananalumpati ay pinagkasunduang 
	siya ang sa huliy hahalaw sa lahat ng salaysay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Tadeo, 
	dahil sa ugaling tamad na taglay niyang parati, ay hindi naghanda at 
	namimilipit. Samantalang sinisipsip ang isang mahabang sotanghon, ay iniisip 
	ang paraang ikaliligtas niya sa kalagayang iyon, hanggan sa naalaala ang 
	isang talumpating napag-aralan sa klase at humanda nang gayahan yaon at 
	lahukan ng ibang bagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga ginigiliw 
	na kapatid sa panukala!--ang simula niyang ikinumpay ang sipit na kagamitan 
	ng mga intsik sa pagkain.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hayup! 
	bitiwan mo ang sipit, ginulo mo ang buhok ko!--ang sabi ng isa niyang katabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa tawag ng 
	inyong paghahalal na pagpunan ang kakulangang <span class="locked">iniwan 
	sa......</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Manggagaya!--ang putol ni Sandoval,--ang talumpating iyan ay sa Pangulo ng 
	ating Liceo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--&#39;Sa tawag ng 
	inyong paghahalal&#39;--ang patuloy ni Tadeo na walang katiga-tigatig--&#39;na 
	pagpunan ang kakulangang iniwan sa aking.... pag-iisip (at itinuro ang 
	kanyang tiyan) ng isang dakilang lalaki dahil sa kanyang banal na aral at 
	kanyang mga kagagawan at mga panukala na karapatdapat na magkaroon ng kaunti 
	pang alaala, ano ang masasabi sa inyo ng isang gaya ko na may malaking gutom 
	sa dahilang hindi nananghali?&#39;</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Narito ang 
	isang liig, bigaaan!--ang sabi ng kanyang kalapit na iniaabot sa kanya ang 
	liig ng isang inahing manok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--&#39;May isang 
	ulam, mga ginoo, na kayamanan ng isang bayan na ngayo'y sadlakan ng lait at 
	kutya ng mundo, na pinagsaukan ng kanilang mga dayukdok na sandok ng 
	matatakaw na pook, na nasa kalunuran ng sangsinukob....&#39;--itinuro sa 
	pamamagitan ng kanyang sipit si Sandoval na nakikipaglaban sa isang makunat 
	na pakpak ng inahin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At mga taga 
	kasilanganan!--ang sagot ng tinukoy, na iginuhit ng pabilog ang kanyang 
	panandok upang maituro ang lahat ng kumakain.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	pinapayagan ang mga patlang!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Humihingi ako 
	ng salita!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Humihingi ako 
	ng patis!--ang dugtong ni Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dalhin dito 
	ang lumpiya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hiningi ng 
	lahat ang lumpiya at si Tadeo ay umupong masaya dahil sa pagkakaalpas sa 
	kagipitan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ulam na 
	ipinatungkol kay Padre Irene ay hindi lumabas na mabuti at ang 
	gayon ay ipinahayag ni Sandoval sa isang paraang lubhang napakasakit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nangingintab 
	ang labas dahil sa mantika at baboy ang loob! Dalhin dito ang pangatlong 
	pingan ng ulam, ang panyang na prayle!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang panyang ay 
	hindi pa luto; nadidinig ang sagitsit ng mantika sa kawali. Sinamantala ang 
	patlang upang tumungga at hiningi nilang magsalita si Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Walang 
	kapingaspingas si Pecson ay nag-angtanda, tumindig na pinipilit pigilin ang 
	kanyang tawang hangal, ginayahan ang isang <i xml:lang="es" lang="es">
	predicador</i> na agustino, na noo'y nababantog, at nagsimula sa pagbulong 
	na wariy sinasabi ang laman ng sermon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	&#39;<i xml:lang="la" lang="la">Si 
	tripa plena laudat Deum, tripa famelica laudabit fratres</i>; kung ang 
	bitukang bundat ay nagpupuri sa&nbsp; Diyos , ang bitukang dayukdok ay magpupuri sa 
	mga prayle. Mga salitang sinabi ni ginoong&nbsp;Custodio, sa bibig ni Ben-Zayb, 
	pamahayagang <i xml:lang="es" lang="es">El Grito de la Integridad</i>, 
	pangalawang salaysay, kaululang ika isang daan, limang pu't pito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	&#39;Mga ginigiliw 
	kong kapatid kay Jesucristo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	&#39;Ibinubuga ng 
	kasamaan ang kanyang maruming hininga sa mga kulay dahong baybayin ng
	<span xml:lang="es" lang="es">Frailandia</span>, Kapuluang Pilipinas sa 
	karaniwang tawag! Hindi sumisilang ang isang araw na hindi umuugong ang 
	isang pagbaka, na hindi nadinig ang isang masamang parunggit sa mga
	<i xml:lang="es" lang="es">reverendas</i>, <i xml:lang="es" lang="es">
	venerandas</i> at <i xml:lang="es" lang="es">predicandas corporaciones</i>, 
	na walang sukat magtanggol at walang sukat kumatig. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ipahintulot ninyo sa 
	akin, mga kapatid, na sa isang sandaliy maging <i xml:lang="es" lang="es">
	caballero andante</i> ako upang magtanggol ng walang sukat magsanggalang, ng 
	mga banal na korporasion na nagturo sa atin, at patibayan pang muli ang 
	karugtong ng ibig turan noong sawikain na, <i>bitukang bundat ay nagpupuri 
	sa&nbsp; Diyos </i>, na dili iba't, <i>ang bitukang dayukdok ay magpupuri sa mga 
	prayle</i>.&#39;</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mainam, 
	mainam!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hoy,--ang 
	sabing walang katawatawa ni Isagani--ipinababatid ko sa iyo na kapag ang mga 
	prayle ang natutukoy ay iginagalang ko ang isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Sandoval, 
	na nasasayahan na, ay umawit:</font></p>
	<div class="poem-container">
		<blockquote class="poem" xml:lang="es" lang="es">
			<div class="stanza">
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					<i>Un fraile, dos frailes, tres frailes en el coooro</i></font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					<i>Hacen el mismo efecto que un solo toooro!</i></font></div>
			</div>
		</blockquote>
	</div>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Makingig 
	kayo, mga kapatid; ibaling ang inyong paningin sa magandang kapanahunan ng 
	inyong kabataan; tingnan ninyong siyasatin ang kasalukuyan at itanong ninyo 
	sa sarili ang kinabukasan. May ano kayo? Prayle, prayle at prayle! Isang 
	prayle ang sa inyo'y nagbibinyag, nagkukumpil, dumadalaw ng lubhang masuyo 
	sa paaralan; isang prayle ang dumidinig ng mga una ninyong lihim, siya ang 
	una unang nagpapakain sa inyo ng isang&nbsp; Diyos, ang nagtuturo sa inyo ng landas 
	ng kabuhayan.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Mga prayle ang una at huling guro ninyo, prayle ang nagbubukas 
	ng puso ng inyong mga magiging asawa, na inilalaan sa inyong mga suyo; isang 
	prayle ang nagkakasal sa inyo, ang nag-uutos na kayo'y maglakbay sa iba't 
	ibang pulo, na binibigyan kayong daan upang makapagbago ng singaw at 
	libangan; siya ang naglilingkod sa inyo kung kayo'y naghihingalo at kahit 
	umakyat kayo sa bibitayan, ay naroroon din ang prayle upang kayo'y samahan 
	ng kanyang mga dasal at luha, at makapapanatag kayong hindi kayo iiwan 
	hanggang hindi makitang kayo'y sadyang patay na patay na at bitay na bitay. 
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">Datapwa'y hindi hanggang diyan lamang ang kanyang kaawaan; kung patay na 
	kayo, ay pagpipilitang kayo'y mailibing ng buong dingal, makikipaglaban 
	upang ang inyong bangkay ay dumaan sa simbahan, tanggapin ang kanilang mga 
	panalangin, at magpapahinga lamang kapag naibigay na kayo, sa mga kamay ng 
	Lumikha, na malinis na malinis dito sa lupa, alang-alang sa mga parusang 
	tinanggap, mga pahirap at mga pagpapakumbaba. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">Sa pagkakilala sa mga turo ni 
	Cristo na hindi binubuksan sa mayayaman ang pinto ng langit, sila, mga 
	bagong mananakop, mga tunay na kahalili ng Tagapagligtas, ay lumalalang ng 
	sarisaring paraan upang alisan kayo ng sala, <i>kuapi</i> sa karaniwang 
	tawag, at dinadala sa malayo, lubhang malayo, doon sa tinitirahan ng mga 
	kalaitlait na mga intsik at mga protestante, at iniiwang malinis, mabuti, 
	malunas, ang hinihingahan natin dito, sa paraan, na kahit ibigin man natin 
	pagkatapos, ay wala tayong matatagpuang halagang sikapat na magiging sanhi 
	ng ating ipagkakasala!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	&#39;Oo, nga, 
	sila'y kailangan ng ating kaligayahan; kung sa lahat ng dakong dalhin natin 
	ang ating ilong ay matatagpuan natin ang manipis na kamay, na gutom sa 
	halik, na sa araw-araw ay lalo pang nagpapatalapya sa sungalngal na dagdag 
	na taglay natin sa mukha bakit hindi sila suyuin at patabain at bakit 
	hihingin ang kagagawang hindi nararapat na sila'y palayasin? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nilayin sandali 
	ang malaking kakulangang mangyayari sa ating kalipunan kung sila'y mawala! 
	Mga walang pagal na manggagawa ay pinabubuti at pinakakapal nila ang mga 
	lipi; sa pagkakawatakwatak natin dahil sa mga inggitan at samaan ng loob, ay 
	pinagsasama tayo ng mga prayle sa iisang kapalaran, sa isang mahigpit na 
	tungkos, napakahigpit na hindi na tuloy maigalaw ng marami ang kanilang 
	siko! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Alisin ninyo ang prayle, mga ginoo, at makikita ninyong mayayanig ang 
	kapamayanang pilipino, dahil sa kakulangan ng malalakas na balikat at 
	mabalahibong hita; ang pamumuhay pilipino ay makakainip kung wala ang 
	nakapagpapasayang prayle na mapagbiro at malikot, kung wala ang mumunting 
	aklat, at mga sermon na nakapagpapaihit ng tawa, kung wala ang mainam na 
	pagkakaibayo na malalaking hangarin sa mga bungong walang kabuluhan, kung 
	wala ang tunay na pagtatanghal, sa araw-araw, ng mga kuwento ni
	<span xml:lang="it" lang="it">Boccacio</span> at ni
	<span xml:lang="fr" lang="fr">Lafontaine</span>! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kung wala ang mga korrea at 
	kalmen ano ang ibig ninyong gawin sa haharapin ng ating mga babae kundi 
	impukin ang salaping iyan at sila'y maging maramot at makamkam? Kung wala 
	ang mga misa, mga nobena at mga prusisyon saan kayo makatatagpo ng mga 
	panggingihang kanilang mapaglilibangan? Wala silang tutungkulin kundi ang 
	mga gawain sa bahay at ang pagbabasa nila ng mga kuwentong kababalaghan ay 
	kailangan nating palitan ng mga aklat na wala pa rito! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Alisin ninyo ang 
	prayle, at mawawala ang kabayanihan, tataglayin na ng bayan ang mga mabuting 
	pamamayan; alisin ninyo ang prayle at mawawala ang indio; ang prayle ay 
	siyang Ama, ang indio ang <span xml:lang="es" lang="es">Verbo</span>; yaon 
	ang artista at ito ang estatua, sapagka&#39;t lahat ng kabagayang taglay natin, 
	ang ating iniisip at ginagawa, ay utang natin sa prayle, sa kanyang 
	katiyagaan, sa kanyang kasipagan, sa kanyang pagtatamang tatlong daang taon 
	upang mabago ang ayos na ibinigay sa atin ng Kalikasan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At kung walang 
	prayle at walang indio ang Pilipinas, ano ang mangyayari sa kaawaawang 
	pamahalaan na mapapaharap sa mga intsik?&#39;</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kakain ng 
	panyang na alimango!--ang sagot ni Isagani na nababagot sa talumpati ni 
	Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At iyan ang 
	dapat nating gawin. Siya na ang talumpati!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang 
	hindi dumarating ang intsik na may dala ng ulam, ay tumindig ang isa sa mga 
	nag-aaral at tumungo sa pinaka look, sa may durungawang harap sa ilog; 
	datapwa'y madaling bumalik na humuhudyat ng palihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinusubukan 
	tayo; nakita ko ang minamahal ni Padre Sibyla!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga 
	ba?--ang bulalas ni Isagani na sabay ang tindig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag nang 
	magpagod: nang makita ako ay umalis.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lumapit sa 
	durungawan at tumanaw sa liwasan. Pagkatapos ay hinudyatan ang kanyang mga 
	kasama upang mangagsilapit. Nakita nilang lumabas sa pintuan ng magpapansit 
	ang isang binata na palingonlingon at lumulan, na kasama ang isang hindi 
	kilala, sa isang sasakyang nag-aantay sa tabi ng bangketa. Ang sasakyan ay 
	kay Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah!--ang 
	bulalas ni Makaraig:--ang alipin ng Vice-Rector ay pinaglilinkuran ng 
	Panginoon ng General.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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