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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXIX. Ang Katapusan </font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa kanyang 
	ulilang tahanan, sa baybay ng dagat, na ang magalaw na ibabaw nito'y 
	nakikita sa mga bukas na durungawan, na umaabot sa malayo, hanggang sa 
	makiisa sa huling dako ng natatanaw, ay nililibang ni Padre Florentino 
	ang kanyang pag-iisa sa pamamagitan ng pagtugtog sa armonium ng mga 
	malulungkot at di masasayang tugtugin, na sinasaliwan ng maugong na 
	alingawngaw ng mga alon at ng bulong ng mga sanga ng kagubatang kalapit. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mga tunog na mahahaba, malalakas, mahinagpis, na wariy mga plegaria, 
	kahit matitindi, ang lumalabas sa matandang panugtog; si Padre Florentino, 
	na isang tunay na musiko, ay tumutugtog ng alinsunod sa biglang udyok ng 
	kalooban at sa dahilang siya'y nag-iisa, ay ibinubulalas ang mga 
	kalungkutang taglay ng kanyang puso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sadya ngang 
	ang matanda'y malungkot. Ang kanyang mabuting kaibigan na si Don Tiburcio 
	de&nbsp;Espada&ntilde;a ay kaaalis pa lamang na umiilas sa pag-uusig ng asawa. Nang 
	umagang iyon ay tumanggap ng isang sulat ng isang teniente ng guardia sibil, 
	na ang <span class="locked">sabi ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify">
	<font face="Arial" style="font-size: 13pt" color="#333333">&quot;Minamahal 
	kong <span xml:lang="es" lang="es">Capellan</span>: Katatanggap ko pa lamang 
	ng isang telegrama ng komandante na ang sinasabiy:
	<i xml:lang="es" lang="es">espa&ntilde;ol escondido casa Padre&nbsp;Florentino cojera 
	remitira vivo muerto</i>. Sa dahilang ang telegrama ay lubhang maliwanag ay 
	pagsabihan ninyo ang kaibigan upang huwag siyang matagpuan pagpariyan kong 
	huhulihin siya sa ika walo ng gabi.</font></p>
	<p class="letter-clo" style="margin-left: 80px; margin-right: 80px; margin-bottom:0" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">Ang inyong 
	tagisuyong,</font></p>
	<p class="letter-au" style="margin-left: 80px; margin-right: 80px; margin-top:0" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">Perez.&quot;</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sunugin ninyo 
	ang sulat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A... a.... 
	ang Victorinang ito, ang Victorinang ito!--ang pautal-utal na sabi ni <abbr>
	Do</abbr>n&nbsp;Tiburcio;--a.... a.... ay mangyayaring umabot hanggang sa ako'y 
	ipabaril.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi siya 
	napigil ni Padre Florentino: walang nahita sa pagpapaliwanag sa 
	kanya na ang ibig marahil sabihin ng salitang <i xml:lang="es" lang="es">
	cojera</i> ay <i xml:lang="es" lang="es">cogera</i>; na ang kastilang 
	nagtatago ay hindi mangyayaring si Don Tiburcio kundi si Simoun, 
	na may dalawang araw pa lamang na kararating, na sugatan at waring 
	pinag-uusig, na huminging patuluyin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Don Tiburcio ay hindi 
	napahinuhod; ang <i xml:lang="es" lang="es">cojera</i> ay ang kanya ngang 
	pagkapilay, ang tanda niya sa katawan: yaon ay pakana ni Victorina na ibig 
	siyang matagpuang patay o buhay, gaya ng isinulat ni Isagani buhat sa 
	Maynila. At iniwan ng kaawaawang Ulises ang bahay ng pari upang magtago sa 
	kubo ng isang mangangahoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Walang 
	pag-aalinlangan si Padre Florentino na ang kastilang hinahanap ay 
	ang manghihiyas na si Simoun. Mahiwaga ang kanyang pagdating, dugoduguan, 
	mapanglaw at patangpata, na siya ang may pasan sa kanyang takba. Sa tulong 
	ng malaya't masuyong pagpapatuloy ng mga pilipino ay tinanggap siya ng 
	klerigo ng walang kaanoanumang kasiyasiyasat, at sa dahilang hindi pa 
	umaabot sa kanyang tainga ang mga nangyari sa Maynila ay hindi niya lubos na 
	maisip ang gayong kalagayan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang tanging paghuhulong pumasok sa kanyang 
	pag-iisip ay ang pangyayari, na sa dahilang umalis na ang General, ang 
	kaibigan at nag-aampon sa mag-aalahas, marahil ang mga kagalit nito, ang mga 
	pinaslang, ang mga napinsalaan, ay nangagsipagbangon ngayon na sumisigaw ng 
	higanti, at siya'y pinag-uusig ng samantalang General upang makuha sa kanya 
	ang kayamanang naipon. Iyan ang sanhi ng pagtatanan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang kanyang mga 
	sugat ay saan nagbuhat? Nagtangka kayang magpakamatay? Yaon kaya'y anak ng 
	paghihiganti? anak kaya ng isang kapusukan, gaya ng ibig ipahiwatig ni 
	Simoun? Tinanggap kaya niya yaon sa pag-ilas sa mga kawal na umuusig sa 
	kanya?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang huling 
	paghuhulong ito ang siyang inaakala niyang siyang lalong nalalapit marahil 
	sa katotohanan. Nakatulong pa sa pagpapatibay sa gayong paghuhulo ang 
	telegrama na katatanggap pa lamang niya at ang pagmamatigas ni Simoun sa 
	mula't mula pa na ayaw pagamot sa medikong nasa pangulong bayan ng 
	lalawigan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tanging 
	tinatanggap ng mag-aalahas ay ang pangangalaga ni Don Tiburcio 
	at yaon pa man ay napaghahalatang wala siyang tiwala. Sa pangyayaring ito'y 
	itinatanong sa sarili ni Padre Florentino ano ang dapat niyang 
	gawin pagdating ng guardia sibil na huhuli kay Simoun? Sa kalagayan ng may 
	sakit ay hindi mangyayari ang gumalaw at lalo pa manding hindi mangyayari 
	ang maglakbay ng mahaba.... Ngunit sinasabi ng telegrama na patay o 
	buhay......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Florentino ay huminto sa pagtugtog at lumapit sa durungawan upang tanawin 
	ang dagat. Ang patag na ibabaw, na wala ni isa mang daong, ni isa mang 
	layag, ay walang maiudyok sa kanya. Ang pulong maliit na natatanaw na 
	nag-iisa sa malayo, ay walang sinasabi sa kanya kundi ang taglay na pag-iisa 
	at lalo pa manding nagpapakilala nang pagkaulila ng tinatanaw na kalawakan. 
	Ang walang hanggang kalawakan kung minsan ay pipingpipi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinangka ng 
	matandang hulaan ang ngiting malungkot at pakutya na isinalubong ni Simoun 
	sa balitang siya'y huhulihin. Ano ang kahulugan ng ngiting iyon? At ang isa 
	pang ngiti, na lalo pang malungkot at pakutya nang mabatid na sa ika walo pa 
	ng gabi magsisidating? Ano ang ibig sabihin ng hiwagang iyon? Bakit ayaw 
	magtago si Simoun?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sumaalaala 
	niya yaong bantog na tinuran ni San&nbsp;Juan Crisostomo nang ipinagtanggol ang
	<i xml:lang="es" lang="es">eunuco</i> na si Eutropio: 'Kailan man ay hindi 
	naging lalong kapit na di gaya ngayon sabihing: Kapalaluan ng mga kapalaluan 
	at ang lahat ay kapalaluan!'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, ang 
	Simoung yaon na napakayaman, makapangyarihan, kinatatakutan, nang wala pang 
	iisang linggo ang nakararaan, ngayon, ay sawing kapalaran pa kay Eutropio, 
	humahanap ng matutuluyan, at hindi sa mga dambana ng isang simbahan, kundi 
	sa dukhang bahay ng isang klerigong indio, na liblib sa kagubatan, sa 
	ulilang baybay ng dagat! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kapalaluan ng mga kapalaluan at ang lahat ay 
	kapalaluan! At ang taong yaon, sa loob ng ilang oras, ay huhulihin, aalisin 
	sa hihigang kinahihiligan, na di igagalang ang kanyang kalagayan, di 
	bibigyang halaga ang kanyang mga sugat, sa <em>patay</em> o <em>buhay</em> 
	ay hinihingi siya ng kanyang mga kaaway! Papano ang pagliligtas sa kanya? 
	Saan matatagpo ang mga bigkas na nakaaakit ng obispo sa Constantinopla? Ano 
	ang kapangyarihan ng kanyang mga dukhang salita, ang salita ng isang 
	klerigong indio, na ang kanyang kaapihan ay waring ikinagagalak at iniuudyok 
	pa nga ng Simoung iyon nang panahong siya'y nagtatagumpay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi na 
	naaalaala ni Padre Florentino ang pawalang bahalang pagtanggap sa 
	kanya ng manghihiyas, na may dalawang buwan pa lamang ang nakararaan, nang 
	siya'y pinakiusapan tungkol kay Isagani na nahuli dahil sa isang walang 
	hunos diling sigabo ng kalooban. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nalimot ang pagsusumakit ni Simoun upang 
	madali ang pag-aasawa ni Paulita, pag-aasawang siyang nag-aboy kay Isagani 
	sa isang matinding pag-ilag sa kapwa tao, na siyang ikinababalino ng amain: 
	nalimot ni Padre Florentino ang lahat, at walang naaalaala kundi 
	ang kalagayan ng may sakit, ang kanyang katungkulan sa pagka may bahay, at 
	sinasaliksik ang kanyang pag-iisip, Dapat niyang itago upang huwag masunod 
	ang nasa ng may kapangyarihan? Ngunit ang may katawan ay walang 
	kaligaligalig: ngumingiti....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ito ang 
	sumasaisip ng mabuting matanda nang dumating ang isang alila at sinabi sa 
	kanyang ibig siyang makausap ng may sakit. Tumungo sa kanugnog na silid, na 
	malinis at maaliwalas na tahanan, na ang pinakasahig ay malalapad na tablang 
	makikintab at makikinis, na may malalakit mabibigat na sillon, na may 
	matandang ayos, walang barnis ni mga dibuho. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang dako ay may isang 
	katreng kamagong na may kanyang apat na haliging pumipigil sa lalagyan ng 
	kulambo, at sa siping ay may isang mesa na puno ng mga botella, hilatsa ng 
	mga putol putol na kayo. Ang isang luhuran sa dakong ibaba ng isang Cristo 
	at isang munting aklatan ang nagpapakilalang yaon ang silid ng pari, na 
	ipinagamit sa tumuloy, alinsunod sa ugaling pagpapatuloy ng mga pilipino na 
	ipagkaloob sa nanunuluyan ang lalong masarap na pagkain, ang lalong mabuting 
	silid at ang lalong mabuting hihigan sa loob ng bahay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang makitang bukas 
	na bukas ang lahat ng durungawan upang bayaang makapasok ang dalisay na 
	hangin sa dagat at ang alingawngaw ng kanyang walang patid na hinagpis, ay 
	walang makapagsasabi sa Pilipinas na doo'y may isang may karamdaman, 
	sapagka't nakaugaliang ilapat ang mga bintana at sampu ng lalong maliliit na 
	puang kailan pa ma't may isang sinisipon o kaya'y nagdaramdam ng munting 
	sakit ng ulo na walang kakabukabuluhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tumingin si
	Padre Florentino sa dako ng hihigan at namangha siya nang makitang 
	wala na sa mukha ng may sakit ang anyong palagay at pakutya. Isang lihim na 
	sakit ang wariy nagpapakunot sa kanyang kilay, sa kanyang paningin ay 
	namamalas ang di kapalagayang loob at ang kanyang bibig ay napapangiwi dahil 
	sa isang ngiting lipos ng sakit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nahihirapan 
	baga kayo, ginoong&nbsp;Simoun?--ang masuyong tanong ng paring lumapit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaunti, 
	ngunit sa loob ng ilang sandali, ay matatapos na ang paghihirap ko--ang 
	tugon na iginalaw ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sindak na 
	pinapagduop ni Padre Florentino ang mga kamay, dahil sa waring 
	nakilala ang kakilakilabot na katotohanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	ginawa ninyo,&nbsp; Diyos&nbsp; ko? Ano ang inyong ininom?--at iniunat ang kamay sa dakong 
	kinalalagyan ng mga botella.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala nang 
	magagawa! wala ng lunas!--ang sagot sa tulong ng kasakitsakit na ngiti--ano 
	ang ibig ninyong gawin ko? bago tumugtog ang ika walo... Sa patay o sa 
	buhay.... patay ay oo, ngunit buhay ay hindi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	-- Diyos&nbsp; ko,&nbsp; Diyos&nbsp; ko! ano ang ginawa ninyo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huminahon 
	kayo--ang putol ng may sakit sa tulong ng isang galaw ng mukha--ang nagawa'y 
	nagawa na. Hindi dapat na ako'y mahulog na buhay sa kamay ng sino man.... 
	maaaring makuha ang aking lihim. Huwag kayong magambala, huwag kayong 
	malito, wala nang magagawa.... Pakinggan ninyo ako! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sasapit na ang gabi at 
	kailangang huwag mag-aksaya ng panahon.... kailangan kong sabihin sa inyo 
	ang aking lihim, kailangan kong ipagkatiwala sa inyo ang huli kong nasa.... 
	kailangan kong makilala ninyo ang aking kabuhayan.... Sa mga sandaling ito 
	na katangitangi ay ibig kong iibis sa akin ang isang pasanin, ibig kong 
	paliwanagan ninyo sa akin ang isang pag-aalinlangan.... kayong may malaking 
	pananalig sa&nbsp; Diyos .... ibig kong sabihin ninyo sa akin kung may isang&nbsp; 
	Diyos !</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit isang 
	panglunas sa lason, ginoong&nbsp;Simoun.... mayroon akong
	<i xml:lang="es" lang="es">apomorfina</i>.... mayroon akong
	<i xml:lang="es" lang="es">eter</i>, <i xml:lang="es" lang="es">cloroformo</i>....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At humahanap 
	ang pari ng isang botella hanggang si Simoun ay yamot na sumigaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala nang 
	mangyayari.... wala nang mangyayari! Huwag kayong magaksaya ng panahon! 
	Yayaon akong dala ang aking lihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang klerigo'y 
	litong nagpatiluhod sa kanyang <i xml:lang="es" lang="es">reclinatorio</i>, 
	nanalangin sa paanan ng Cristo, isinubsob ang mukha sa dalawang kamay at 
	pagkatapos ay tumindig na walang imik at kagalanggalang na waring tinanggap 
	sa kanyang&nbsp; Diyos&nbsp; ang buong bagsik, ang buong sanghaya, ang buong 
	kapangyarihan ng isang Hukom ng mga budhi. Inilapit ang isang sillon sa 
	dakong ulunan ng may sakit at humandang makingig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga unang 
	salitang ibinulong sa kanya ni Simoun, nang sabihin sa kanya ang tunay na 
	pangalan, ay napaurong ang matandang pari at tiningnang lipus sindak ang 
	kaharap. Ang may sakit ay malungkot na ngumiti. Dahil sa pagkakabigla ay 
	hindi nasupil ang sarili, ngunit madaling nakapagpigil, at matapos na 
	matakpan ng panyo ang mukha ay muling tumungo upang makingig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isinalaysay ni 
	Simoun ang kanyang kasakitsakit na kabuhayan, ang pangyayaring may labing 
	tatlong taon na, nang magbalik siyang galing sa Europa, na puno ng pag-asa 
	at magagandang pangarap, ay umuwi siya upang makasal sa isang binibining 
	iniirog, at laan sa paggawa ng kabutihan at magpatawad sa lahat nang 
	gumagawa sa kanya ng masama, bayaan lamang siyang mabuhay nang mapayapa. 
	Hindi nagkagayon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang mahiwagang kamay ang nag-aboy sa kanya sa gitna ng 
	isang kaguluhang gawagawa ng kanyang kalaban; pangalan, yaman, pag-ibig, 
	kinabukasan, kalayaan, nawala sa kanya ang lahat at nakaligtas lamang sa 
	kamatayan dahil sa kagitingan ng isang kaibigan. Sa gayo'y isinumpa niyang 
	maghihiganti. Nagtanan siyang dala ang kayamanan ng kanyang kaanak, na 
	nababaon sa isang gubat, nagtungo sa ibang lupain at inatupag niya ang 
	pangangalakal. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nakilahok sa himagsikan sa Cuba, na tinulungan ang 
	magkabilang pangkat, ngunit saan man, siya'y nakikinabang. Doon niya 
	nakilala ang General, na noo'y komandante, na naging kakilala niya dahil sa 
	pangungutang sa kanya at pagkatapos ay naging kaibigan dahil sa ilang 
	kataksilang ginawa na alam ng magaalahas ang lihim. Siya, sa tulong ng 
	salapi ay nakuha niyang maparito ang General, at nang nasa Pilipinas na ay 
	ginawa niyang isang bulag na kasangkapan at iniaboy niya sa paggawa ng lahat 
	ng kasamaan na ang ginawa niyang pain ay ang walang habas na katakawan sa 
	salapi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pangungumpisal ay naging mahaba at mabigat, ngunit sa buong hinabahaba ay 
	hindi nagpahalata ng anumang pagkakagulat ang nagpapakumpisal at bibihirang 
	pinatlangan ang may sakit. Gabi na nang si Padre Florentino, ay 
	tumindig na pinapahid ang pawis sa mukha at nag-isip. Mahiwagang kadiliman 
	ang naghahari sa loob ng silid, na pinupuno ng sinag ng buwan, na pumapasok 
	sa mga durungawan, ng liwanag na malamlam at panganganinag na wariy singaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gitna ng 
	katahimikan, ang tinig ng pari ay nadinig na malungkot, banayad, ngunit 
	mahimok:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Patatawarin 
	kayo ng&nbsp; Diyos , ginoong.... Simoun,--ang sabi:--batid Niyang tayo'y anak sa 
	pagkakamali, nakita Niya ang inyong tiniis, at sa pagpapahintulot na 
	matagpuan ninyo ang kaparusahan ng inyong mga sala sa pagtatamo ng kamatayan 
	sa kamay din ng mga iniaboy ninyo, ay nakikita natin ang Kanyang walang 
	hanggang awa! Siya ang sumirang isa-isa sa inyong mga paraan, ang lalong 
	mabubuti ang pagkakabalak, ang una sa pagkamatay ni Maria&nbsp;Clara, makaraan 
	yaon ay dahil sa isang pagkakalingat, at pagkatapos ay sa isang paraang 
	lubhang mahiwaga.... sundin natin ang kanyang kalooban at pasalamatan natin 
	Siya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa ganang 
	inyo,--ang mahinang sagot ng maysakit,--ang kalooban niya ay, na, ang mga 
	pulong ito'y....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magpatuloy sa 
	kalagayang kinasasadlakan?--ang dugtong ng klerigo nang makitang ang isa'y 
	huminto.--Hindi ko maalaman, ginoo; hindi ko mataho ang inaakala noong Hindi 
	malirip! Batid kong hindi pinabayaan sa mga mahihigpit na sandali ang mga 
	bayang nananangan sa Kanya at Siya ang ginawang hukom ng kanilang pagkasiil. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Alam ko na ang Kanyang bisig ay hindi nawala kailan man kapag niyuyurakan na 
	ang katwiran at ubos na ang lahat ng paraan, ay humawak na ng sandata ang 
	sinisiil at nakipaglaban nang dahil sa kanyang tahanan, dahil sa kanyang 
	asawa, dahil sa kanyang mga anak, dahil sa kanyang mga di maitatakwil na 
	karapatan, na, gaya ng sabi ng makatang aleman, ay kumikinang ng walang 
	pagkaagnas at matibay doon sa kaitaasan ng mga walang pagkapawing mga 
	bituin! Hindi, ang&nbsp; Diyos&nbsp; na siyang katwiran, ay hindi mangyayaring magpabaya 
	sa kanyang layon, ang layong kalayaan na kung wala ay wala namang katwiran!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	bakit ipinagkait sa akin ang kanyang tulong?--ang tanong ng tinig ng 
	maysakit, na lipus hinanakit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	pinili ninyo ang isang paraan na hindi Niya masasang-ayunan!--ang sagot ng 
	pari na matigas ang boses--ang kaluwalhatiang pagliligtas sa isang bayan ay 
	hindi kakamtin ng isang nakatulong sa pagpapahirap sa kanya! Inakala ninyong 
	ang dinungisan at sinira ng pagkakasala at kasamaan ay nangyayaring malinis 
	at mailigtas ng isa ring pagkakasala at isa ring kasamaan! Kamalian! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang 
	pagtatanim ay walang ibubunga kundi kakilakilabot na anyo; ang sala ay mga 
	salarin; tanging ang pag-ibig ang nakagagawa ng mga bagay na kahangahanga, 
	ang kabaitan lamang ang nakapagliligtas! Hindi; kung balang araw, ang ating 
	bayan ay magiging malaya ay hindi dahil sa masasamang hilig at pagkakasala, 
	hindi sa paraang pasamain ang kanyang mga anak, dayain ang ilan, bigyan ng 
	salapi ang iba, hindi; ang kaligtasan ay may kahulugang kabanalan, ang 
	kabanalan ay pagtitiis at pag-ibig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya! 
	tinatanggap ko ang inyong sabi,--ang tugon ng maysakit, makaraan ang isang 
	sandali;--ako'y namali; ngunit sa dahilang ako'y namali ay ipagkakait na ba 
	ng&nbsp; Diyos&nbsp; na iyan ang kalayaan sa isang bayan at ililigtas ang maraming lalo 
	pang salarin kay sa akin? ano na lamang ang kamalian ko sa piling ng mga 
	pagkakasala ng mga namamahala? Bakit pahahalagahan pa ng&nbsp; Diyos&nbsp; na iyan ang 
	aking kabuktutan kay sa mga daing ng napakaraming walang sala? Bakit hindi 
	ako sinugatan at pinagtagumpay pagkatapos ang bayan? Bakit binabayaang 
	magtiis ang gayong karaming mga karapatdapat at mga tapat na loob at 
	nasisiyahang walang katigatigatig sa kanilang mga paghihirap?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga tapat 
	na loob at ang mga karapatdapat ay kailangang mangagtiis upang ang kanilang 
	mga adhika'y makilala't lumaganap! Kailangang iwaksi o basagin ang sisidlan 
	upang halimuyak ang bango, kailangang pingkiin ang bato upang sumipot ang 
	apoy! Mayroon ding pasiya ng kalangitan sa mga paguusig ng mga maniniil, 
	ginoong&nbsp;Simoun!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam ko,--ang 
	bulong ng may sakit--kaya nga't inudyukan ko ang kabangisan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunay, 
	kaibigan ko, ngunit ang lalong maraming sumabog ay ang may taglay na 
	kabulukan! Pinalusog ninyo ang kabulukan sa kapamayanan nang hindi naghasik 
	ng anumang adhikain. Sa pagtitiim na iyan ng mga masasamang hilig ay walang 
	sisipot kundi ang pananawa, at kung mayroon mang biglang sumipot, ay hindi 
	mangyayaring hindi kabuti lamang, sapagka't sa biglabiglaan ay walang 
	sisipot sa layak kundi ang kabuti. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Tunay nga't ang mga masasamang hilig ng 
	isang pamahalaan ay makamamatay sa kanya, ngunit pumapatay din naman sa 
	kapisanang pinangyayarihan ng gayon. Sa isang pamahalaan na may masamang 
	hilig ay bagay ang isang bayang walang tuus; sa pangasiwaang walang budhi ay 
	mga mamamayang maninibad at mapangayupapa sa loob ng bayan, ngunit mga 
	tulisan at magnanakaw sa mga kabundukan! Kung ano ang panginoon, gayon ang 
	alipin. Kung ano ang pamahalaan, gayon ang bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naghari ang 
	sandaling pananahimik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayo'y 
	ano ang nararapat gawin?--ang tanong ng tinig ng may sakit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magtiis at 
	gumawa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magtiis.... 
	gumawa!--ang malungkot na ulit ng may sakit--ah! madaling sabihin iyan kapag 
	hindi nagtitiis.... kapag ang paggawa ay pinapagkakamit ng ganting-pala!.... 
	Kung hinihingan ng inyong&nbsp; Diyos&nbsp; ang tao ng gayong karaming mga paghihirap, 
	ang taong babahagya nang makapanangan sa kasalukuyan at nag-aalinlangan sa 
	mangyayari sa kinabukasan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kung nakakita lamang kayo ng gaya ng mga 
	napagkita kong mga maralita, mga kahabaghabag na nangagbata ng katakot-takot 
	na pahirap dahil sa mga pagkakasalang hindi nila ginawa, mga pagpatay upang 
	mapagtakpan ang sala ng iba o ang di kasapatan sa panunungkulan, mga 
	kaawaawang ama na inagaw sa kanilang tahanan upang gumawa ng walang 
	kapararakan sa mga lansangan na nasisira sa tuwing umaga at waring 
	naglilibang lamang sa pagsusugba sa mga buo buong magkakaanak sa 
	karalitaan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ah! magtiis.... gumawa.... siyang kalooban ng&nbsp; Diyos ! Papanaligin ninyo sila na ang kanilang pagkamatay ay siya nilang kaligtasan, 
	na ang kanilang paggawa ay siyang ikagiginhawa ng kanilang tahanan! 
	Magtiis.... gumawa.... Anong&nbsp; Diyos&nbsp; iyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang&nbsp; Diyos&nbsp; na 
	lubhang matapat, ginoong Simoun--ang sagot ng pari;--isang&nbsp; Diyos&nbsp; na nagpaparusa 
	sa kakulangan natin sa pananalig, sa ating masasamang hilig, sa munting 
	pagpapahalaga natin sa karangalan, sa ating pagkamamamayan.... Pinababayaan 
	natin at tayo'y nagiging katulong ng masamang hilig, kung minsan pa'y ating 
	pinupuri ang gayon; kaya't dapat, lubhang nararapat na batahin natin ang 
	ibubunga at batahin din naman ng ating mga anak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang&nbsp; Diyos&nbsp; ng kalayaan, 
	ginoong&nbsp;Simoun, na siyang nag-uutos sa ating ibigin ito, at ginagawang 
	maging mabigat sa atin ang pasanin; isang&nbsp; Diyos&nbsp; ng kaawaan, ng 
	pagpapantaypantay, na sabay sa pagpaparusa sa atin ay pinabubuti tayo, at 
	ang binibigyan lamang ng mabuting kalagayan ay yaong nararapat bigyan dahil 
	sa kanyang pagsusumakit; ang paaralan ng pagtitiis ay nakapagpapatibay, ang 
	kaparangan ng tunggalian ay nakapagpapalakas sa mga kaluluwa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hindi ko ibig 
	sabihin na ang ating kalayaan ay tuklasin sa talas ng sandata; ang espada ay 
	di lubhang kagamitan sa mga bagong kabuhayan, ngunit, oo, ating tutuklasin 
	sa pamagitan ng karapatan, sa pamagitan ng pagpapataas ng uri ng katwiran at 
	ng karangalan ng tao, na ibigin ang tapat, ang mabuti, ang dakila, hanggang 
	sa mamatay ng dahil dito, at kapag ang isang bayan ay nakasapit na sa gayong 
	kalagayan, ang&nbsp; Diyos&nbsp; ay nagbibigay ng sandata, at lumalagpak ang mga 
	diosdiosan, lumalagpak ang mga maniniil na wariy mga kastilyong baraha at 
	kumikinang ang kalayaan na kasabay ng unang liwayway! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang ating kasamaan ay 
	sa atin din buhat, huwag nating sisihin ang kahit sino. Kung nakikita ng 
	Espa&ntilde;a na tayo'y hindi lubhang masunurin sa pagpapahirap, at handa sa 
	pakikipagtunggali at pagtitiis ng dahil sa ating mga karapatan, ang Espa&ntilde;a 
	ay siya nang unaunang magbibigay sa atin ng kalayaan, sapagka't kapag ang 
	bunga ng paglilihi ay dumating na sa pagkahinog ay kahabaghabag ang inang 
	magtangkang doo'y lumunod! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Subalit samantalang ang bayang pilipino ay wala 
	pang sapat na katigasang loob upang ipahayag, na mataas ang noo at lantad 
	ang dibdib, ang kanyang karapatan sa pamamayan at patibayan ito sa pamagitan 
	ng mga paghihirap, ng kanyang sariling dugo; samantalang nakikita natin ang 
	ating mga kababayan, sa kanilang sariling pamumuhay ay magdamdam hiya sa 
	sariling kalooban, madinig ang sigaw ng kanyang budhi na nagbabalikwas at 
	tumututol, at sa lantarang pamumuhay ay hindi umimik, makisama sa 
	pumapaslang upang kutyain ang pinaslang; samantalang nakikita nating 
	naninirahan sa labis na paglingap sa sarili at pinupuri sa tulong ng pilit 
	na ngiti ang lalong mahahalay na kagagawan, at nagmamakaawang hinihingi, sa 
	pamagitan ng tingin, ang isang bahagi ng napala ano't bibigyan sila ng 
	kalayaan? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa piling ng Espa&ntilde;a o hiwalay sa Espa&ntilde;a sila'y hindi mag-iiba, at 
	marahil, marahil ay lalo pang sasama! Ano ang kailangan ng pag-sasarili kung 
	ang mga alipin sa ngayon ay siyang magiging maniniil bukas? At gayon nga ang 
	kauuwian nila sapagka't umiibig sa paniniil ang sumasailalim nito! 
	Ginoong&nbsp;Simoun, samantalang ang ating bayan ay hindi pa nahahanda, 
	samantalang tumutungo sa labanan nang nadadaya o naiaaboy, na walang lubos 
	na kaalaman sa gagawin, ay masisira ang lalong matalinong pagtatangka at 
	mabuti pa nga ang masira sapagka't ano't ibibigay ang asawa sa lalaki kung 
	hindi lubos na iniirog at hindi nalalaang magpakamatay nang dahil sa kanya?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naramdaman ni
	Padre Florentino na pinigilan ng may sakit ang kanyang kamay at 
	pinisil; huminto na inantay na magsalita, ngunit ang tanging naramdaman 
	niya ay ang dalawa pang pisil, nakadinig ng isang buntonghininga at 
	mahabang katahimikan ang naghari sa loob ng silid. Ang dagat lamang, na ang 
	mga alon ay nangagsilaki dahil sa hangin sa gabi na waring nagising sa init 
	ng umaga, ang nagtatapon ng kanyang paos na ungol, ng kanyang walang 
	katapusang awit, pag bayo sa mga nagtayong talampas. Ang buwan, na wala nang 
	kalabang araw, ay payapang nagtatalik sa langit, at ang mga puno sa gubat na 
	nangagyuyukuan ay nagsasalaysayan ng kanilang matatandang alamat sa 
	pamamagitan ng mahiwagang bulungan na ipinaghahatidhatiran ng hangin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang makitang 
	walang sinasabi sa kanya ang may sakit, si Padre&nbsp;Florentino ay bumulong na 
	wariy natutubigan dahil sa isang iniisip:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nasaan ang 
	kabataan na maglalaan ng kanilang mga magagandang sandali, mga pangarap at 
	kasigabuhan sa ikabubuti ng kanilang bayan? Nasaan ang malingap na magbububo 
	ng kanyang dugo upang hugasan ang ganyang maraming kahihiyan, ang gayon 
	karaming pagkakasala, ang gayon karaming bagay na kamuhimuhi? Malinis at 
	walang bahid dungis ang kailangang maging buhay na alay upang ang handog ay 
	maging karapatdapat!.... Saan kayo nangaroon, mga kabinataan, na magtataglay 
	ng lakas ng buhay na tumanan na sa aming mga ugat, ang kalinisan ng mga 
	pagkukuro na nadungisan sa aming mga kaisipan at ang lagablab ng sigabo na 
	namatay na sa aming mga puso?.... Inaantay namin kayo, oh mga binata, 
	halikayo at kayo'y aming inaantay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	naramdamang ang kanyang mga mata'y pinangingiliran ng luha ay binitiwan ang 
	kamay ng maysakit, tumindig at lumapit sa durungawan upang tanawin ang 
	malawak na dagat. Ilang mahinang katog sa pintuan ang pumukaw sa kanya sa 
	gayong pag-iisip. Yaon ay ang alila na nagtatanong kung magsisindi ng ilaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang ang 
	pariy lumapit sa may sakit at nakita ito, sa tulong ng liwanag ng lampara, 
	na hindi kumikilos, nakapikit ang mga mata, ang kamay na pumigil sa kanyang 
	kamay ay nakabuka at nalalahad sa gilid ng hihigan, ay inakala niyang 
	natutulog; ngunit nang maramdamang hindi humihinga, ay marahan niyang 
	hinipo at saka pa lamang nahalatang patay: unti-unti nang lumalamig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	magkagayo'y lumuhod at nanalangin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang tumindig 
	at pinagmasdan ang bangkay na sa mukha'y nababakas ang isang matinding hapis, 
	ang sakit ng isang buong buhay na walang kabuluhan, na tinaglay hanggang sa 
	dako pa roon ng kamatayan, ay nangilabot ang matanda at <span class="locked">
	bumulong na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaan nawa 
	ng&nbsp; Diyos&nbsp; ang mga nagliko sa kanya ng daan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At samantalang 
	ang mga alilang tinawag niya ay nangagsisiluhod at nangagdadasal ng 
	patungkol sa namatay, mga alilang maurira at nangalilibang sa pagtingin sa 
	hihigan at inuulit-ulit ang mga sunod sunod na <i xml:lang="la" lang="la">
	requiem</i>, ay kinuha ni Padre Florentino sa tataguan ang bantog 
	na takbang bakal na kinalalagyan ng malaking kayamanan ni Simoun. Ilang 
	sandaling nag-alinlangan, datapwa'y biglang pumanaog sa hagdanang dala ang 
	takba, na may tangka nang gagawin, tinungo ang batong laging inuupan ni 
	Isagani upang siyasatin ang kailaliman ng dagat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tumingin si
	Padre Florentino sa dako ng kanyang paanan. Sa ibaba'y nakikita 
	ang paghampas sa mga ukab ng bato ng mga maiitim na alon ng Pasipiko, na 
	lumilikha ng mauugong na kulog, na sabay sa pagniningning na wariy apoy ng 
	mga alon at mga bula, dahil sa tama ng sinag ng buwan, na wariy dakotdakot 
	na brillante na inihahagis sa hangin ng isang gawi ng kailaliman. Tumanaw sa 
	buo niyang paligid. Nag-iisa siya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang ulilang baybayin ay nagtatapos sa 
	malayo na wariy isang paguulap, na pinapawi unti-unti ng buwan hanggang sa 
	makiisa sa lalong malayong dako na abot ng tanaw. Ang kagubatan ay 
	bumubulong ng mga tinig na walang linaw. Sa gayo'y inihagis ng matanda na 
	itinapon sa dagat ang takba, sa tulong ng kanyang malalakas na bisig. Umikit 
	na makailan at matuling tumungo sa kailaliman na gumuhit ng pabalantok at 
	naglarawan sa kanyang makinis na ibabaw ng ilang malamlam na sinag ng buwan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nakita ng matanda ang pagtilampon ng mga patak, 
											nakadinig ng isang buluwak 
	at naghilom ang tubig matapos malamon ang kayamanan. Nag-antabay ng ilang 
	sandali upang tingnan kung may isasauli ang kailaliman, ngunit muling 
	naghilom ang mga alon na mahiwagang gaya ng dati, at hindi naragdagan ng isa 
	mang kuton ang kanyang kulot na ibabaw, na waring sa nilapadlapad ng dagat 
	ay walang nahulog kundi isang munting bato lamang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Itago ka ng 
	Kalikasan sa kailaliman na kasama ng mga korales at mga perlas ng kanyang 
	walang pagkapawing mga dagat!--ang sabi ng klerigo na iniunat ang kamay.--Kapag 
	sa isang banal at mataas na layon ay kakailanganin ka ng mga tao, ay 
	matututuhan kang kunin ng&nbsp; Diyos&nbsp; sa sinapupunan ng mga alon.... Samantala, 
	diyan ay hindi ka makagagawa ng kasamaan, hindi mo ililiko ang katwiran, 
	hindi ka mag-uudyok sa kasakiman!....</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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