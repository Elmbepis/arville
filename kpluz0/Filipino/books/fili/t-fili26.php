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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXVI. Mga Paskin</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Maagang 
	bumangon si Basilio upang tumungo sa ospital. Mayroon na siyang takdang 
	gagawin, dalawin ang kanyang mga may sakit, paroon pagkatapos sa Unibersidad 
	upang mabatid ang ilang bagay na ukol sa kanyang <i xml:lang="es" lang="es">
	licenciatura</i>, at sa kahulihulihan ay makipagkita kay Makaraig dahil sa 
	gugol na mangyayari sa kanyang pagkuha ng grado. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang malaking bahagi ng 
	kanyang naimpok ay iniukol niya sa itutubos kay Huli at upang madulutan ito 
	ng isang dampa na mapamamahayang kasama ng nuno, at hindi siya makapangahas 
	na lumapit kay Kapitan&nbsp;Tiago, sa pangingilag na baka masapantahang ang 
	gayon ay isang pauna sa mamanahing sinasabisabi sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Libang sa mga 
	gayong iniisip ay hindi napuna ang mga pulupulutong na mga nag-aaral na 
	maagang nanggagaling sa loob ng Maynila na waring isinara ang mga paaralan; 
	lalo pa manding hindi napuna ang anyong natutubigan ng ilan, ang paanas na 
	usapan, ang lihim nilang hudyatan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kaya't nang dumating sa San&nbsp;Juan de&nbsp; 
	Diyos&nbsp; 
	at tinanong siya ng kanyang mga kaibigan ng ukol sa isang panghihimagsik, si 
	Basilio ay napalundag at naalaala ang binabalak ni Simoun, na hindi natuloy 
	dahil sa mahiwagang sakuna na nangyari sa manghihiyas. Lipos katakutan at 
	nanginginig ang boses ay tumanong na nagpakunwaring walang kamuwangmuwang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah! ang 
	panghihimagsik?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napag-alaman!--ang sabi ng isa,--at tila marami ang nahahalo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pinilit ni 
	Basilio ang makapagpigil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marami ang 
	nahalo?--ang ulit na tinangkang makabatid ng kahit munting bagay sa mga mata 
	ng iba;--at sino sino....?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga 
	nag-aaral, maraming mga nag-aaral!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inakala ni 
	Basilio na hindi nararapat na magtanong pa sa pag-aalalang baka siya 
	mahalata, at lumayo sa pulutong, na ang dinahilan ay ang pagdalaw sa kanyang 
	mga may sakit. Isang guro sa <i xml:lang="es" lang="es">clinica</i> ang 
	sumalubong sa kanya, at matapos na mapigilan siya sa balikat na lubhang 
	mahiwaga (ang guro ay kaibigan niya), ay marahan siyang tinanong:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naparoon ba 
	kayo sa hapunan kagabi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa kalagayang 
	lito ni Basilio ng mga sandaling iyon, ay nagkariringgang <em>kamakalawa sa 
	gabi</em> ang sinabi sa kanya. Nang kinamakalawahan sa gabi nangyari ang 
	pakikipag-usap kay Simoun. Nagtangkang magpaliwanag.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sasabihin ko 
	sa inyo--ang bulong halos--sa dahilang masama ang lagay ni Kapitan&nbsp;Tiago at 
	saka kailangan kong matapos ang Mata....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti nga 
	ang nagawa ninyong hindi naparoon,--ang sabi ng guro,--Ngunit kasama ba kayo 
	sa kapisanan ng mga nag-aaral?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibinibigay ko 
	ang aking ambag....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	isang payo: umuwi kayo ngayon din at pawiin ninyo ang lahat ng papel na 
	makasasama sa inyo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ni 
	Basilio ang kanyang balikat. Wala siyang anumang papel, mayroon siyang mga 
	tala na ukol sa klinika at wala nang iba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si ginoong 
	Simoun po kaya'y....?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	pakialam si Simoun sa pangyayari, salamat sa&nbsp; Diyos !--ang dagdag ng 
	manggagamot--sinugatan ng isang taong hindi kilala, at ngayo'y nahihiga. 
	Hindi, dito'y ibang kamay ang kumikilos, ngunit kakilakilabot din.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ay 
	huminga. Si Simoun ang tanging makapag huhulog sa kanya. Gayon man ay 
	naalaala si Kabesang Tales.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May mga 
	tulisan?....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala, tao 
	kayo, wala kundi mga nag-aaral lamang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Natiwasay na 
	si Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano, kung 
	gayon, ang nangyari?--ang naipangahas na itanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakatagpo ng 
	mga paskin na masasama ang sinasabi; hindi baga ninyo batid?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Saan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--C....! sa 
	Unibersidad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala na kundi 
	iyon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--P....! hindi 
	pa ba sukat sa inyo ang gayon?--ang tanong na halos galit ng 
	tagapagturo;--hinihinalang gawa ng mga nagsasaping nag-aaral ang mga paskin, 
	ngunit huwag kayong umimik!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumarating ang 
	guro sa <span xml:lang="es" lang="es">Patologia</span>, isang ginoong 
	malamang pang anyong sakristan kay sa anyong manggagamot. Nahalal sa tulong 
	ng lakas ng Vice-Rector, na hindi na hinilingan ng anumang karapatan liban 
	sa lubos na pag-alinsunod sa <i xml:lang="es" lang="es">corporacion</i>, at 
	inaaring isang tiktik at mangsusumbong ng ibang guro sa
	<span xml:lang="es" lang="es">Facultad</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ginanti siya 
	ng bating pasumala ng unang guro na kinindatan si Basilio at malakas na 
	sinabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Batid ko nang 
	nag-aamoy bangkay si Kapitan&nbsp;Tiago; dinalaw na ng mga uwak at buitre.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At pumasok sa 
	salas ng mga propesor.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tiwatiwasay 
	na, si Basilio ay nangahas na magsiyasat ng iba pang bagay. Ang tanging 
	nabatid niya ay ang pagkakatagpo ng mga paskin sa mga pinto ng Universidad, 
	mga pasking ipinabakbak ng Vice Rector upang ipadala sa Gobierno Civil. 
	Sinasabing puno ng pagbabala, pagputol ng mga liig, pagsalakay at iba pang 
	mga pagmamatapang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa bagay na 
	ito'y nangagkukurokuro at nagpapalapalagay ang mga nag-aaral. Ang mga unang 
	balita ay tinanggap nila sa bantay pintuan, na tumanggap ng balita sa isang 
	alila sa <abbr>Sto.</abbr>&nbsp;Tomas, at ito'y sa isang
	<i xml:lang="es" lang="es">capista</i> naman nakabalita. Sinasapantaha na 
	nilang magkakaroon ng mga <i xml:lang="es" lang="es">suspenso</i>, mga 
	pagkapiit, at <abbr>iba </abbr>pa, at itinuturo na ang mga mapaparusahan, na 
	dili iba't ang mga nasa Kapisanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Noon naalala 
	ni Basilio ang mga pangungusap ni Simoun: Sa araw na magagawang kayo'y 
	pawiin.... Hindi ninyo matatapos ang inyong pag-aaral......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon kaya 
	siyang nalalamang bagay?--ang tanong sa sarili;--tingnan natin kung sino ang 
	lalong makapangyayari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nang 
	makapagbalik loob na, upang mabatid ang nararapat niyang gawin at maalam din 
	naman ang ukol sa kanyang <i xml:lang="es" lang="es">licenciatura</i> ay 
	tinungo ni Basilio ang Universidad. Dumaan sa daang&nbsp;Legazpi, tumuloy sa 
	daang&nbsp;Beaterio, at nang dumating sa liko ng daang ito at ng Solana ay 
	namatyagan nga niya na tila may isang malaking bagay na nangyari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga dating 
	pulupulutong na masasaya at maiingay ay daladalawang
	<span xml:lang="es" lang="es">Guardia Veterana</span> ang kanyang nakita sa 
	mga banketa na nangag-aaboy sa mga nag-aaral na lumalabas sa Unibersidad, na 
	ang ilan ay walang kakibokibo, malalamlam ang mukha, ang iba'y galit na 
	nangagsisitayo sa dakong malayolayo o nangagsisiuwi sa kanikanilang mga 
	bahay. Ang kaunaunahan niyang nasagupa ay si Sandoval. Hindi pinuna ang 
	katatawag ni Basilio; waring naging bingi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gawa ng takot 
	sa katas ng bituka!--ang sinapantaha ni Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pagkatapos ay 
	si Tadeo naman ang natagpuan, na masayang masaya. Tila mangyayari din ang 
	walang katapusang <i xml:lang="es" lang="es">cuacha</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	nangyayari, Tadeo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala tayong 
	pasok ng hindi bababa sa isang linggo, bigan! mainam! mabuti!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At 
	pinagkikiskis ang mga kamay sa katuwaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapuwa'y 
	ano ang nangyari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibibilanggo 
	tayong mga kaanib sa kapisanan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At masaya ka?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	pasukan, walang pasukan!--at lumayong hindi magkasiya sa galak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakitang 
	dumarating si Juanito Pelaez na namumutla at nanganganib; ang kanyang 
	kakubaan noon ay umabot sa lalong katambukan, nagtutumulin siya sa pag-ilas. 
	Siya'y naging isa sa mga lalong masigasig na nag-uusig na matayo ang 
	kapisanan samantalang mabuti ang lakad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--E, Pelaez, 
	ano ang nangyari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala, wala 
	akong nalalaman! Ako'y walang pakialam--ang nangingilabot na sagot--sinasabi 
	ko na sa kanila; iyan ay kaululan.... Hindi ba gayon ang
	<span class="locked">sabi ko?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi alam ni 
	Basilio kung sinabi niya o hindi, ngunit sa pagbibigay loob sa kanya ay 
	sumagot:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo! ngunit 
	ano ang nangyayari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunay nga, 
	ano? Tingnan mo, ikaw ay saksi; kailan man ay hadlang ako.... ikaw ang 
	saksi, tingnan mo, huwag mong limutin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, oo; 
	ngunit ano ang nangyari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan mo; 
	saksi ka! Hindi ako nakikilahok kailan man sa kapisanan kundi upang 
	pagpaliwanagan ko kayo.... baka mo ipagkaila pagkatapos! Huwag mong
	<span class="locked">lilimutin ha?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, hindi 
	ko itatakwil, ngunit ano na ang nangyari, anak ka ng&nbsp; Diyos ?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Juanito ay 
	malayo na: nakitang lumalapit ang isang guardia at natakot na baka siya 
	hulihin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	magkagayon ay tumungo si Basilio sa Unibersidad upang tingnan kung baka 
	sakaling bukas ang Kalihiman at upang makatanggap ng balita. Nakalapat ang 
	pintuan ng kalihiman at sa bahay na iyon ay may di karaniwang kilusan. Akyat 
	manaog sa mga hagdanan ang mga prayle, militar, pulistas, matatandang 
	abogado at mediko, upang ihandog marahil ang kanilang tulong sa may 
	kapanganiban.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Natanaw sa 
	malayo ang kaibigan niyang Isagani, na, namumutla at bago ang anyo, taglay 
	ang buong gilas kabataan, na nag-uulat sa ilang kasama sa pag-aaral at 
	inilalakas ang pagsasalita na waring walang kabuluhan sa kanya ang madinig 
	man ng lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahalayhalay, 
	mga ginoo, kahalayhalay na ang isang pangyayaring gangganyan lamang ay 
	makapagpatakbo sa atin at mapailas tayong wariy mga langaylangayan dahil 
	lamang sa ang panakot upo ay gumalaw! Ngayon lamang ba mangyayaring ang mga 
	binata'y mabibilanggo ng dahil sa pagtatanggol ng kalayaan? Nasaan ang mga 
	patay, nasaan ang mga nabaril? Bakit tataliwakas ngayon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit sino 
	kaya ang hangal na sumulat ng mga gayong paskin?--ang tanong na pagalit ng 
	isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	mayroon sa atin?--ang sagot ni Isagani--hindi natin katungkulan ang 
	magsiyasat, siyasatin nila! Bago matanto ang ayos ng pagkakasulat ay hindi 
	natin kailangan ang magpakita ng pagkampi sa mga ganitong sandali. Doon sa 
	may panganib, doon tayo dapat pumaroon, sapagka't doon naroon ang 
	karangalan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kung ang sinasabi ng mga paskin ay kasang-ayon ng ating 
	karangalan at mga damdamin, sino man ang sumulat, ay mabuti ang ginawa, 
	nararapat nating pasalamatan at agarin nating isama sa kanya ang ating 
	lagda. Kung hindi kapit sa atin, ang ating inuugali at ang ating mga budhi 
	ay sadya nang tumututol sa anumang sumbong....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang madinig 
	ni Basilio ang gayong pagsasalita, kahit na mahal sa kanya si Isagani, ay 
	pumihit at umalis. Paparoon siya sa bahay ni Makaraig upang sabihin ang 
	tungkol sa pagsandali.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa kalapit ng 
	bahay ng mayamang nag-aaral ay nakapuna ng mga bulong bulungan at mahiwagang 
	hudyatan ng mga kapitbahay. Sa dahilang hindi talos ng binata ang sanhi ng 
	pinag-uusapan ay palagay na ipinatuloy ang kanyang lakad at pumasok sa 
	pintuan. Dalawang bantay na <span xml:lang="es" lang="es">Veterana</span> 
	ang sumalubong sa kanya't siya'y tinanong kung ano ang ibig. Nahalata ni 
	Basilio na siya'y nagbiglabigla ngunit hindi na makaurong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hinahanap ko 
	ang aking kaibigang si Makaraig--ang patuloy na sagot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga bantay 
	ay nagtinginan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mag-antay 
	kayo rito--ang sabi sa kanya ng isa,--antabayanan ninyo ang kabo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ay 
	napakagat labi, at ang mga pangungusap ni Simoun ay muling umugong sa 
	kanyang tainga.... Hinuhuli kaya si Makaraig?--ang inisip niya, ngunit hindi 
	nakapangahas na magtanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	nag-antay nang malaon; ng sandaling yaon ay pumapanaog si Makaraig na 
	masayang nakikipag-usap sa kabo, na kapwa pinangungunahan ng isang
	<i xml:lang="es" lang="es">alguacil</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit? Pati 
	ba kayo, Basilio?--ang tanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Titingnan ko 
	kayo....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marangal na 
	asal!--ang sabing tumatawa ni Makaraig,--noong mga araw na payapa, ay lumalayo 
	kayo sa amin....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Itinanong ng 
	kabo kay Basilio ang kanyang pangalan at tiningnan ang isang talaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nag-aaral sa 
	panggagamot, daang Anloague?--ang tanong ng kabo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinagat ni 
	Basilio ang kanyang labi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit, pati 
	ba ako?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Makaraig ay 
	humalakhak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	manganib, kaibigan; magkakarwahe tayo, at sa gayon ay isasalaysay ko sa inyo 
	ang hapunan kagabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa isang 
	mainam na kilos, na waring nasa kanyang bahay, ay inanyayahan ang
	<span xml:lang="es" lang="es">auxilio</span> at ang kabo na lumulan sa 
	sasakyang nagaantay sa kanila sa pinto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa Gobierno 
	Civil!--ang sabi sa kotsero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isinalaysay ni 
	Basilio, na nakapagbalik loob na, kay Makaraig ang sanhi ng kanyang 
	pagdalaw. Hindi siya binayaang matapos ng mayamang nag-aaral at siya'y 
	kinamayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Maaasahan 
	ninyo ako kaibigan, maaasahan ninyo ako at sa pista ng ating
	<i xml:lang="es" lang="es">investidura</i> ay aanyayahan natin ang mga 
	ginoong ito,--ang sabing itinuro ang kabo at ang alguasil.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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