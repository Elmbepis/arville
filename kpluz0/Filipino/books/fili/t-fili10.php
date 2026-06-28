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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">X. Kayamana't Karalitaan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinabukasan, 
	sa gitna ng pagkakamangha ng buong nayon, ay nakituloy sa bahay ni 
	Kabesang Tales ang manghihiyas na si Simoun na may kasamang dalawang bataan 
	na may pasang malalaking takba na nababalutan ng lona. Sa gitna ng kanyang 
	pagdadalita ay hindi nalilimutan ni Tales ang magandang ugali ng tagarito, 
	kaya't nagugulumihanan sapagka't wala siyang sukat maihandog sa dayuhang 
	yaon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y may taglay nang lahat ng bagay si Simoun, mga alila at 
	kakanin, at wala siyang nais kun di ang manirahan ng isang gabit isang araw 
	sa bahay na iyon, sapagka't siyang pinakamalaki sa nayon at sa dahilang 
	napapagitna sa San&nbsp;Diego at sa Tiani, mga bayang inaakala niyang may 
	maraming mamimili. Inusisa ni Simoun ang kalagayan ng mga daan at itinanong 
	kay Kabesang Tales kung sukat na ang kanyang rebolber upang makapagtanggol 
	sa mga tulisan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May mga baril 
	na malayo ang abot--ang sabi ni Kabesang Tales na natatanga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi na 
	pahuhuli ang rebolber na ito--ang sagot ni Simoun na nagpaputok, na ang 
	pinatamaan ay isang punong bunga na may dalawang daang hakbang ang layo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Namalas ni Kabesang Tales ang pagkahulog ng ilang bunga, ngunit hindi 
	umimik at nagpatuloy sa pag-iisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Unti unting 
	dumadating ang mga taong akay ng kabantugan ng mga hiyas na dala ng 
	mag-aalahas: isa't isa'y nagbabatian ng maligayang pasko, nangag-uusap ng 
	tungkol sa misa, mga santo, masamang ani, ngunit gayon man ay gugugulin ang 
	kanilang naiipon sa pagbili ng mga bato at mga bagay bagay na galing sa 
	Europa. Balitang balita na ang mag-aalahas ay kaibigan ng Capitan General at 
	hindi magiging isang kalabisan ang pakikipagkilala sa kanya dahil sa mga 
	bagay na baka mangyari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si kapitang 
	Basilio ay dumating na kasama ang kanyang asawa, ang kanyang anak na si 
	Sinang at ang kanyang manugang, na nangahahandang gumugol ng hindi bababa sa 
	tatlong libong piso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naroroon si 
	Hermana Penchang upang bumili ng isang singsing na brillante na ipinangako 
	niya sa Birhen sa Antipolo; iniwan niya sa bahay si Huli na isinasaulo ang 
	isang munting aklat na nabili niya ng dalawang kuwarta sa kura; ang arsobispo 
	ay nagbibigay ng apat na pung araw na <i xml:lang="es" lang="es">indulgencia</i> 
	sa sino mang bumasa o makadinig ng pagbasa ng aklat na iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Jesus!--ang 
	sabi ng mabait na mapanata kay kapitana&nbsp;Tika--ang kaawa-awang batang iyan ay 
	lumaki ditong wariy kabuting itinanim ng tikbalang!.... May makalimang pung 
	ipinabasa ko ng malakas ang aklat ngunit walang naisaulo ni bahagya; waring 
	isang buslo ang ulo, na, puno lamang samantalang nasa sa tubig. Marahil ay 
	hindi lamang dalawampung taong <span xml:lang="es" lang="es">indulgencia</span> 
	ang aming tinamong lahat, sampu ng aso't pusa sa pakikingig sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inihanda ni 
	Simoun sa mesa ang dalawang takba na kanyang dala: ang isa'y malakilaki kay 
	sa isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marahil ay 
	ayaw kayo ng hiyas na <i xml:lang="en" lang="en">double</i> ni batong huwad 
	lamang.... Itong ali--ang sabing tinukoy si Sinang--ay brillante marahil ang 
	ibig......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan nga po, 
	mga brillante at mga matatandang brillante, mga matatandang bato ha po?--ang 
	sagot--ang magbabayad ay si tatay at ibig niya ang mga matatandang bagay, mga 
	bato sa una.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kung gaano ang 
	pagbibiro ni Sinang sa kakaunti at masama pang latin na nalalaman ng kanyang 
	asawa ay gayon din naman ang sa maraming latin na nalalaman ng kanyang ama.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sadya nga 
	pong mayroon akong mga hiyas na lubhang matatanda--ang sagot ni Simoun, na 
	inalis ang balot ng munting takba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yao'y isang 
	sisidlang bakal, na patalim na kininis, at maraming palamuting <i>bronse</i> 
	at mga matitibay at pasuotsuot na panara.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon po 
	akong mga palamuti ng liig ni Cleopatra, mga sadyang tunay, na nakuha sa mga 
	piramide, mga singsing ng mga senador at mga ginoong romano na nakuha sa mga 
	labing muog ng Cartago......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marahil ay 
	ang mga ipinadala ni Anibal ng matapos ang labanan sa
	<span xml:lang="fr" lang="fr">Cannes</span>!--ang sabing walang 
	kapingaspingas na biro at lipus kagalakan ni kapitang&nbsp;Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mabuting 
	ginoo natin, kahit na nakabasa ng maraming kasulatan na ukol sa matatandang 
	kapanahunan ay hindi pa nakakikita ng mga bagay bagay ng panahong iyon dahil 
	sa walang <i>museo</i> dito sa Pilipinas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May dala rin 
	ako ritong mga mahahalagang hikaw ng mga marangal na babaeng romana, na 
	nakuha sa bahay liwaliwan ni Antonio Mucio Papilino sa Pompeya......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iginagalaw ni 
	kapitang Basilio ang kanyang ulo, na ang ibig sabihin ay alam niya ang mga 
	bagay na tinuran, at ninanasa niyang mamalas kaagad ang mga mahahalagang 
	labing iyon. Sinasasabi naman ng mga babae na ibig nilang magkaroon ng 
	galing sa Roma, mga kuwintas na benenditahan ng Papa, mga
	<i xml:lang="es" lang="es">reliquias</i> na nakapagpapatawad ng mga 
	kasalanan na hindi na kailangan ang mangumpisal, at <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mabuksan 
	ang takba at maalis ang bulak na panakip, ay namalas ang isang lalagyang 
	puno ng singsing, agnos, <i xml:lang="es" lang="es">guardapelo</i>, krus, 
	alpiler, at <abbr>ibp.</abbr> Ang mga brillante na sinaglitan ng mga batong 
	may sarisaring kulay ay kumikinang at nagniningning sa gitna ng mga bulaklak 
	na ginto na iba't iba ang kulay, may gisuk na <i xml:lang="es" lang="es">
	esmalte</i> at may sarisaring liluk at kudya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inalis ni 
	Simoun ang bandeha at lumitaw ang isa namang puno ng mga kahangahangang 
	hiyas na dapat ng makasiya sa pitong binibini sa pitong araw na sa 
	kinabukasan ay magdadaos ng sayawang parangal sa kanila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang ayos ay 
	sarisari, mga pagkakasaglitsaglit ng mga bato at perlas na anyong mga 
	hayuphayupang may mga kulay bughaw at balok na nanganganinag; ang mga 
	sapiro, esmeralda, rubi, turkesa at brillante ay magkakasamang anyong 
	tutubi, paroparo, panilan, pukyutan, uwang, ahas, himbubuli, isda, bulaklak, 
	kumpol, at <abbr>iba pa.</abbr> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											May suklay na ayos diadema, gargantilya, 
	pamuti ng liig na perlas at brillante, na dahil sa kagandahan ay hindi tuloy 
	napigil ng ilang dalaga ang isang pahangang inaku! at si Sinang ay 
	napapalatak, kaya't kinurot siya ng kanyang inang si kapitana&nbsp;Tika, 
	sapagka't baka lalong mahalan ng mag-aalahas ang dalang lako. Patuloy pa rin 
	si kapitana&nbsp;Tika sa pagkurot sa kanyang anak kahit may <span class="locked">
	asawa na.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hayan po ang 
	mga brillante sa una--ang sabi ng mag-aalahas--ang singsing na iyan ay inari 
	ng princesa&nbsp;<span xml:lang="fr" lang="fr">Lamballe</span>, at ang mga hikaw 
	na iyan ay sa isang dama ni Maria&nbsp;Antonieta.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang itinuro'y ilang magagandang brillante na kasinglaki ng butil ng mais, 
	ang kintab ay mangasulngasul, mainam, na waring taglay pa nila ang mga 
	pangingilabot noong kapanahunang tinawag na '<i>mga araw ng hilakbot</i>'.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang dalawang 
	hikaw na iyan!--ang sabi ni Sinang na ang tingin ay sa kanyang ama at 
	ipinagsasanggalang ng kamay ang bisig na nalalapit sa kanyang ina.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibang lalo 
	pang matatanda, ang mga romana--ang sagot ni kapitang&nbsp;Basilio na sabay ang 
	kindat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Inisip ng mapanatang si Hermana Penchang na kung yaon ay ihandog niya sa 
	Birhen sa Antipolo ay pahihinuhod at ipagkakaloob ang kanyang 
	pinakamasidhing hangad: malaon ng humihingi siya ng isang kababalaghang 
	bunyag na kahalo ang kanyang pangalan upang huwag nang mapawi ang pag-aalala 
	sa kanya dito sa lupa, at pagkatapos ay magtuloy sa langit, gaya ni 
	kapitana&nbsp;Ines ng mga kura, kaya't itinanong ang halaga. Ngunit tatlong 
	libong piso ang turing ni Simoun. Ang matandang babae'y <i>nag-angtanda</i>. Susmariosep!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inilahad ni 
	Simoun ang pangatlong lalagyan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Punongpuno ng 
	mga orasan, kalupi, lalagyan ng posporo at mga agnos na pinamutihan ng 
	brillante at maninipis na mumunting larawang esmalte.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pang-apat 
	ay siyang kinalalagyan ng mga lagas na bato, at ng buksan, ay isang paghanga 
	ang kumalat sa bahay; napapalatak na muli si Sinang, kaya't kinurut siya ng 
	kanyang ina, ngunit ito man ay nakabitiw din ng isang pahangang Sus Maria!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hanggang sa 
	mga sandaling iyon ay wala pang nakakikita ng gayong karaming kayamanan. Sa 
	kahong iyon, na may balot na tersiopelong bughaw na mangitimngitim, na may 
	mga halang, ay namamakas ang katunayan ng mga pangarap sa 'Isang libo't 
	isang gabi, ang pangarap ng mga salamisim sa kasilanganan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mga brillanteng 
	kasinglaki ng mga garbansos na nagkikinangang nagtatapon ng kislap na 
	nakasisira ng mata, na waring ibig matunaw o mag-alab sa kintab; mga 
	esmeraldang galing sa Peru na iba't iba ang tapyas at ayos, mga rubi sa 
	India na mapupulang wariy patak ng dugo, mga sapiro sa Ceylan na bughaw at 
	puti, mga turkesa sa Persia, perlas na makinis ang balat, na ang ilan sa 
	kanila'y namumulamula, mangabongabo at maitim. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang makabubulay ng anyo ng 
	sisidlang iyon, ay yaong nakakita lamang sa gabi ng isang kuwitis na 
	nagsabog ng mumunting liwanag na sarisaring kulay, na ang kinang ay 
	nakapagpapalamlam sa mga walang kupas na bituwin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Waring upang 
	lalong maragdagan ang pagkakamangha ng mga kaharap ay hinalohalo ni Simoun 
	ang mga bato ng kanyang kayumanggi at mahabang daliri at waring naiigaya sa 
	taginting at sa pagdudulasang wariy patak ng tubig na nagbibigay kulay sa 
	bahag-hari. Ang kinang ng gayong maraming tapyas at ang kahalagahan nila'y 
	nakaaakit sa mga mata. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Kabesang Tales, na lumapit dahil sa nasang 
	makakita naman, ay ipinikit ang mga mata at lumayong bigla na waring upang 
	mapawi ang isang masamang akala. Ang gayong karaming kayamanan ay waring 
	nakaaalipusta sa kanyang kahirapan; naparoon ang taong yaon na 
	ipinagpaparangalan ang kanyang malaking yaman sa kasunod pa naman ng araw na 
	iiwan niya ang bahay na iyon dahil sa kakulangan sa salapi at sa sukat 
	mag-ampon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Narito ang 
	dalawang brillanteng itim na pinakamalaki sa lahat--ang sabi ng 
	mag-aalahas--mahirap tapyasan, sapagka't napakatitigas.... Ang batong ito na 
	may kaunting kulay pula ay brillante rin, gayon din naman itong berde na 
	marami ang nag-aakalang esmeralda raw. Tinawaran na iyan sa akin, ng anim na 
	libong piso, ng intsik na si Quiroga upang ibigay sa isang
	<i xml:lang="es" lang="es">se&ntilde;ora</i> na malakas ang kapit.... At hindi pa 
	ang mga kulay dahon ang pinakamahal sa lahat, kungdi itong mga bughaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ibinukod 
	ang tatlong bato na hindi naman lubhang malalaki ngunit lubhang makakapal 
	at mabuti ang pagkakatapyas, na may kaunting kulay bughaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahit na 
	mumunti iyan kay sa mga kulay dahon--ang patuloy--ay ibayo ang halaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tingnan ninyo 
	ito na pinakamaliit sa lahat, na ang timbang ay hindi hihigit sa dalawang 
	kilatis, nabili ko ng dalawampung libong piso at ngayo'y hindi ko 
	maibibigay ng kulang sa tatlong pung libo. Upang mabili ko lamang iyan ay 
	linakbay ko pang sadya. Itong isa na nakuha sa mina sa Golconda ay tatlong 
	kilatis at kalahati ang timbang at ang halaga'y higit sa anim na pung libo. 
	Tinatawaran sa akin iyan ng labing dalawang libong
	<i xml:lang="es" lang="es">libras esterlinas</i> nang
	<span xml:lang="es" lang="es">Virrey</span> sa India, sa pamamagitan ng isang 
	sulat na tinanggap ko kamakalawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa harap ng 
	gayong karaming kayamanan na naipon sa kamay ng taong iyon, na palagay na 
	palagay kung mangusap, ay nagdaramdam ng wariy paggalang na may halong 
	sindak ang mga naroroon.... Makailang pumalatak si Sinang at hindi siya 
	kinurot ng kanyang ina, sapagka't natutubigan marahil o kaya'y sa dahilang 
	inaakala niya na ang isang mag-aalahas na kagaya ni Simoun ay hindi 
	magnanasang magtubo ng limang piso pa, humigit kumulang, dahil sa isang 
	bulalas na hindi napigil. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay nakatingin sa mga bato, walang 
	nagpapamalas ng nasang humipo, nangatatakot. Natitigilan sila dahil sa 
	pagkakamangha. Si Kabesang Tales ay sa kaparangan nakatanaw at iniisip na 
	ang isa lamang sa mga brillanteng iyon, ang pinakamunti marahil, ay sukat ng 
	maitubos sa kanyang anak, huwag maiwan ang bahay at marahil ay maipagpagawa 
	ng ibang bukid....&nbsp; Diyos ! diyata't ang isa lamang sa mga batong iyon ay 
	mahalaga pa kay sa tahanan ng isang tao, sa ikaliligtas sa panganib ng isang 
	dalaga, sa kapayapaan ng isang matanda sa kanyang mga huling araw!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At dahil sa 
	waring nahuhulaan ni Simoun ang kanyang iniisip ay sinabi sa mga kaharap na
	<span class="locked">magkakaanak na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At tingnan 
	ninyo, tingnan ninyo; dahil lamang sa isa sa mga maliliit na batong bughaw 
	na ito, na waring walang kamalaymalay at di makasasama sa kangino man, 
	malinis na waring buhanging natanggal sa langit, sa isa lamang nito na 
	ihandog sa ukol na panahon ay nagawa ng isang tao ang ipatapon ang kanyang 
	kagalit, isang magulang na may inaampong mga kaanak, na wariy nanggulo sa 
	bayan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											At dahil sa isang munting bato pang gaya nito, mapulang wariy 
	dugo ng puso, gaya nang nasang paghihiganti at kumikislap na gaya ng luha ng 
	mga ulila ay binigyang laya, ang tao'y nakauwi sa kanyang tahanan, 
	napagbalikan ng ama ang kanyang mga anak, ng asawa ang kanyang kabiyak ng 
	puso, at marahil ay nailigtas ang isang buong mag-aanak sa isang maralitang 
	sasapitin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At samantalang 
	tinatapiktapik ang sisidlan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon ako 
	dito, gaya ng nasa tataguan ng mga manggagamot--ang patuloy sa wikang tagalog 
	na hindi tumpak--ang buhay at ang kamatayan, ang lason at lunas, at sa isang 
	dakot na ito ay magagawa ko ang lunurin sa luha ang lahat ng tao dito sa 
	Pilipinas!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	sindak na napatingin sa kanya sa pagka't nababatid nilang tunay ang 
	sinasabi. Sa boses ni Simoun ay napupuna ang isang kakaibang tinig at 
	matalas na tingin ang wariy namumulas sa kanyang salaming bughaw sa mata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Waring upang 
	maputol ang pagkakamangha ng mga taong iyon sa pagkamalas sa mga batong 
	nakita, ay itinaas ni Simoun ang bandeha at inilantad ang ilalim na 
	pinagtataguan ng <i xml:lang="la" lang="la">sancta sanctorum</i>. Mga 
	sisidlang balat sa Rusia, na hiwahiwalay dahil sa mga halang na bulak ang 
	siyang pumupuno sa kailalimang ang balot ay tersiopelong mangabongabo ang 
	kulay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Lahat ay nag-aantay na makakikita ng mga kahangahanga. Inaantay ng 
	asawa ni Sinang na makakita ng mga karbungko, mga batong nag-aapoy at 
	kumikinang sa gitna ng kadiliman. Si kapitang&nbsp;Basilio ay nasa pinto ng 
	kabantugan; makakikita ng bagay na may katuturan, bagay na katunayan, ang 
	katawan ng kanyang mga laging pinangarap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang pamuting 
	ito sa liig ay kay Cleopatra--ang sabi ni Simoun at maingat na kinuha ang 
	isang kahang lapad na ang ayos ay kalahating buwan--isang hiyas na hindi 
	mahahalagahan, isang bagay na nararapat lamang ilagay sa mga museo, sa mga 
	pamahalaang mayayaman lamang nauukol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yaon ay isang 
	wariy kolyar na binubuo ng iba't ibang palawit na ginto na mga ayos anitong 
	uwang na kulay dahon at bughaw, at sa gitna'y may isang ulo ng buitre na 
	gawa sa bato, na ang kilabot ay katangitangi, na napapagitna sa dalawang 
	pakpak na nakabuka, sagisag at hiyas ng mga haring babae sa Ehipto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang makita ni 
	Sinang ay ikinimbot ang ilong at ngumuwing paalipusta na wariy bata, at si 
	kapitang&nbsp;Basilio kahit na may malaking hilig sa mga lumang ari ay hindi 
	nakapigil ng isang aba! na anak ng hindi kasiyahang loob sa nakita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang mainam 
	na hiyas na naingatang mabuti, kaya't mayroon nang dalawang libong taon ang 
	tanda.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Psh!--ang 
	sabing agad ni Sinang upang huwag mahulog sa tukso ang kanyang ama at nang 
	huwag bilhin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hangal!--ang 
	sabi nito, na napigil ang kanyang hindi kasiyahang loob na una--ano ang malay 
	mo kung umalinsunod sa kolyar na iyan ang kalagayan ngayon ng kabuhayan ng 
	tao? Sa pamamagitan niyan marahil ay nasilo ni Cleopatra si Cesar, si Marco 
	Antonio...... iyan ay nakadinig ng mga panunumpa sa pag-ibig ng dalawang 
	lalong bantog na bayani sa kanilang kapanahunan, iyan ay nakadinig ng mga 
	banggit na lubhang ayos at malinis na wikang latin, at maanong magamit mo na 
	lamang siya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ako? ni hindi 
	ko pa iyan tawaran ng tatlong piso!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahit na 
	dalawang pu'y matatawaran, <i xml:lang="es" lang="es">gonga</i>!--ang sabing 
	animo'y may pagkabatid ni kapitana&nbsp;Tika--mabuti ang ginto at maaaring gawing 
	ibang hiyas kung tunawin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ito'y isang 
	sinsing marahil ni Sila--ang patuloy ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang sinsing ay 
	maluwang, buo ang ginto at may isang tatak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan marahil 
	ang tatak na itinitik sa mga kahatulang pagpatay noong siya ang 
	nag-uutos--ang sabing namumutla sa pagkatigagal ni kapitang&nbsp;Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tinangkang 
	siyasatin at hulaan ang ibig sabihin ng tatak, datapwa'y kahit nagpilit at 
	pinihit-pihit ay wala siyang nabasa, sa dahilang hindi siya maalam ng
	<i xml:lang="es" lang="es">paleografia</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakalalaki 
	ang daliri ni Sila!--ang sabi tuloy--masusuot na ang dalawang daliri ng sino 
	man sa atin; sinasabi ko na nga, tayo'y pumapaurong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon pa 
	akong mga ibang hiyas dito....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung lahat ay 
	kaayos niyan ay salamat!--ang sagot ni Sinang--ibig ko na ang mga bago.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang bawa't 
	isa'y pumili ng isang hiyas, may kumuha ng isang singsing, may isang orasan, 
	may isang guardapelo. Ang binili ni kapitana&nbsp;Tika ay isang agnos na may 
	kaputol ng bato na nadiinan ng ating Poong&nbsp;Jesucristo sa ikatlong 
	pagkakadapa; si Sinang ay isang hikaw at si kapitang&nbsp;Basilio ay ang tali ng 
	orasang pabili ng alperes, ang mga hikaw ng babae na pabili ng kura at iba 
	pang bagay na panghandog: ang iba namang magkakaanak na taga Tiani ay bumili 
	rin ng hanggang may ibibili upang huwag mahuli sa mga taga San&nbsp;Diego.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	namimili rin naman ng mga lumang hiyas, nakikipagpalitan, kaya't dinala roon 
	ng mga mapag-impok na ina ang mga hiyas na hindi na nila magamit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At kayo, wala 
	po ba kayong ipagbibili?--ang tanong ni Simoun kay Kabesang Tales, dahil sa 
	nakitang minamalas nitong may taglay na inggit ang mga pagbibili at 
	pagpapalitan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sinabi ni 
	Kabesang Tales na ang mga hiyas ng kanyang anak ay naipagbili na at ang mga 
	natitira ay mga walang halaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang agnos 
	ni Maria Clara?--ang tanong ni Sinang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga 
	pala!--ang bulalas ng lalaki, at biglang kuminang ang paningin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Yaon ay isang 
	agnos na may brillante at esmeralda--ang sabi ni Sinang sa mag-aalahas--na 
	ginamit ng aking kaibigan bago magmongha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	hindi sumagot; sinundan ng tingin si Kabesang Tales.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Matapos 
	mabuklat ang ilang kahon ay natagpuan ang hiyas. Pinagmasdang mabuti ni 
	Simoun, makailang binuksan at isinara; yaon nga ang agnos na suot ni 
	Maria&nbsp;Clara noong pista sa San&nbsp;Diego, na sa pagkahabag ay ibinigay sa isang 
	ketongin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig ko ang 
	pagkakaayos--ang sabi ni Simoun--sa magkano po ninyo pagbibili?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Kinamot ni Kabesang Tales ang kanyang ulo, na hindi maalaman kung ano ang 
	gagawin, kinamot ang tainga at pagkatapos ay tumingin sa mga babae.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naiibigan ko 
	ang agnos na iyan--ani Simoun--ibig baga ninyong ibigay sa isang daan...... 
	limang daang piso? Ibig ninyong ipagpalit ng iba? Pumili kayo ng inyong 
	ibig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si 
	Kabesang Tales ay walang imik at nakamulalang pinagmamasdan si Simoun na wariy 
	alinlangan sa kanyang nadidinig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Limang daang 
	piso?--ang bulong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Limang 
	daan--ang ulit ng mag-aalahas na nabago ang boses.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinuha ni 
	Kabesang Tales ang agnos at pinihitpihit; malakas na tumitibok ang kanyang 
	palipisan, ang kanyang mga kamay ay nanginginig. Kung humingi pa kaya siya 
	ng lalong malaki? Makapagliligtas sa kanila ang agnos na iyon: ang 
	pagkakataong iyon ay mainam at hindi na mangyayaring muli.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinikindatan 
	siya ng mga babae upang ipagbili na, tangi lamang si Penchang, na, sa 
	pangangambang baka tubusin si Huli, ay nagwikang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung ako'y 
	pakakaingatan ko iyang wari relikias.... ang mga nakakita kay Maria&nbsp;Clara sa 
	kombento ay nagsasabing namalas nilang payat na payat na hindi halos 
	makapagsalita, kaya't inaakalang mamamatay na banal.... Pinupuri siya ni
	Padre Salvi, sapagka't siya niyang pinagkukumpisalan. Baka dahil 
	doon kung kaya hindi iyan ipinagbili ni Huli at pinili pa ang masangla siya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pahiwatig 
	na ito'y nagkakabuluhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakapigil kay 
	Kabesang Tales ang pagkaalaala sa kanyang anak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	ipahihintulot ninyo--anya--ay tutungo ako sa bayan at isasanguni ko sa aking 
	anak; babalik ako rito bago magtakipsilim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagkasundo 
	sila sa gayon at pumanaw noon din si Kabesang Tales.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ng 
	nasa labas na siya ng nayon, ay natanaw niya sa malayo, sa isang landas na 
	tungo sa kagubatan, ang prayleng nangangasiwa sa <i xml:lang="es" lang="es">
	hacienda</i> at ang isang taong nakikilala niyang siyang kumuha ng kanyang 
	mga lupain. Ang pagkagalit ng isang lalaking nakakita sa kanyang asawa na 
	pumapasok na kaakbay ng ibang lalaki sa isang silid na lihim ay hindi 
	papantay sa sulak ng galit ni Kabesang Tales sa pagkakakita sa dalawang iyon 
	na patungo sa kanyang bukid, sa mga bukid na kanyang ginawa at inasahan 
	niyang maipamamana sa kanyang mga anak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa wari niya'y nagtatawanan ang 
	dalawang iyon, linilibak siya sapagka't walang magawa; pumasok sa kanyang 
	alaala ang sinabing: hindi ko ibibigay kung di sa dumilig muna sa kanila ng 
	sariling dugo at ilibing sa kanila ang asawa't anak......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napahinto, 
	hinaplos ng kamay ang noo at ipinikit ang mga mata; ng muling dumilat ay 
	nakitang namimilipit sa katatawa ang taong iyon at sapol ng prayle ang 
	kanyang tiyan upang huwag pumutok sa katuwaan; at pagkatapos ay nakita 
	niyang itinuro ang kanyang bahay at muling nangagtawanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naghumugong 
	ang kanyang tainga, naramdaman sa kanyang palipisan ang higing ng isang 
	hagkis, ang ulap na pula'y sumipot na muli sa kanyang paningin, muling 
	namalas ang katawang bangkay ng kanyang asawa't anak at sa kapiling ay ang 
	lalaki at ang prayleng nagtatawa na pigil ang tiyan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nalimot niya 
	ang lahat, lumiko at tinungo ang landas na linalakaran ng lalaki at ng 
	prayle; yaon ang landas na tungo sa kanyang bukirin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	nabagot sa kaaantay kay Kabesang Tales sa gabing yaon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang magising 
	siya kinabukasan ay napunang ang supot na katad na kinalalagyan ng kanyang 
	rebolber ay walang laman; ng kanyang buksan ay nakakuha sa loob ng kaputol 
	na papel na kinababalutan ng agnos na may esmeralda at brillante at 
	kinasusulatan ng ilang salita sa wikang tagalog, na ang <span class="locked">
	sinasabi ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	'Ipagpatawad 
	po ninyo, ginoo, na kahit nasa aking bahay ay pagnakawan ko kayo: ngunit 
	ang pangangailangan ay siyang nag-udyok sa akin, ngunit iniwan kong kapalit 
	ng inyong rebolber ang agnos na pinakananasa ninyo. Kailangan ko ang armas 
	at makikisama na ako sa mga tulisan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinagbibilin 
	ko sa inyong huwag ipagpatuloy ang inyong lakad, sapagka't sa dahilang wala 
	na kayo sa aking bahay, ay hihingan namin kayo ng malaking tubos pag kayo'y 
	aming nabihag.</font></p>
	<p class="letter-au" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">Telesforo Juan de&nbsp; 
	Diyos .'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Natagpuan ko 
	rin ang taong aking hinahanap!--ang bulong ni Simoun--may kaunti pang 
	balisa...... ngunit lalong mabuti; matututong gumanap sa kanyang ipangako.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinag-utos sa 
	kanyang alila na tumungo sa <span xml:lang="es" lang="es">Los&nbsp;Ba&ntilde;os</span> 
	na sa dagat-dagatan magdaan at dalhin ang malaking maleta, at doon siya 
	hintin, sapagka't siya'y sa katihan magdaraan na dala ang kinalalagyan ng 
	mga batong mahahalaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pagdating 
	ng apat na guardia sibil ay lalo pang nakagalak sa kanya. Huhulihin ng mga 
	sibil si Kabesang Tales, ngunit sa dahilang hindi nakita ay si Tandang Selo 
	ang dinala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tatlong 
	patayan ang nangyari sa gabing yaon. Ang praileng nangangasiwa sa
	<i xml:lang="es" lang="es">hacienda</i> at ang bagong hahawak ng mga lupa ni 
	Kabesang Tales ay nangatagpuang patay, basag ang ulo at may sumpal na lupa 
	sa bibig, sa kalapit ng mga lupain nito; sa bayan, ang asawa ng bagong 
	mag-aari ng lupa na pinatay ay patay ding inumaga, na puno rin ng lupa ang 
	bibig at pugot ang ulo, at may kasiping na papel na kinasusulatan ng 
	pangalang 'Tales' na ang ipinanulat ay daliring isinawsaw sa dugo......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Manahimik 
	kayo, mapapayapang taga Kalamba! Sa inyo'y walang nagngangalang Tales, sino 
	man sa inyo'y hindi siyang nakagawa ng kasalanan! Ang mga pangalan ninyo'y 
	Luis Haba&ntilde;a, Matias Belarmino, Nicasio Eigasani, Cayetano de&nbsp;Jesus, Mateo 
	Elejorde, Leandro Lopez, Antonino Lopez, Silvestre Ubaldo, Manuel Hidalgo, 
	Paciano Mercado, kayo ang buong bayan ng Kalamba!.... </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Lininis ninyo ang 
	inyong mga bukirin, ginugol ninyo sa kanila ang buong buhay, ang mga 
	naimpok, mga pagpupuyat, pagtitipid, at pagkatapos ay inalis sa inyo, 
	pinalayas kayo sa inyong mga tahanan at ipinagbawal sa iba ang kayo'y 
	patuluyin! Hindi pa nasiyahang lapastanganin ang katwiran kundi niyurakan 
	sampu ng mga banal na kaugalian ng inyong bayan.... </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Naglingkod kayo sa Hari 
	at sa Espa&ntilde;a, at ng sa ngalan nila'y pinag-usig ninyo ang katwiran ay 
	itinapon kayo't sukat ng hindi man linitis, inilayo kayo sa yakap ng inyong 
	mga asawa at sa halik ng inyong mga anak.... Mahigit sa tiniis ni 
	Kabesang Tales ang tiniis ng bawa't isa sa inyo, ngunit gayon man, ay wala 
	sa inyong naghiganti. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi nagkaroon sa inyo ng lingap ni kaawaan at 
	pinag-usig pa kayo hangang sa kabilang buhay, gaya ng ginawa kay Mariano 
	Herbosa.... Lumuha kayo o matuwa sa mga liblib na pulong iyong linalagalag 
	nang hindi alam ang sasapitin! Kinakandili kayo ng Espa&ntilde;a, at sa malao't 
	madali ay tatamuhin ninyo ang katwiran!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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