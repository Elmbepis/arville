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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XI. Los Ba&ntilde;os</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	kataastaasang Capitan General at Namamahala sa Kapuluang Pilipinas ay 
	nangaso sa Busobuso. Ngunit sa dahilang may abay na isang bandang musika 
	(sapagka't ang gayong kataas na tao'y hindi dapat mahuli sa mga santong 
	kahoy na ipinagpuprusisyon) at sa dahilang ang pagkagiliw sa di matingkalang 
	arte ni <abbr title="Santa">Sta.</abbr>&nbsp;Cecilia ay hindi pa laganap sa ugali 
	ng mga usa at baboy-damo sa Busobuso, ay walang nahuli ni isa mang daga, ni 
	ibon, ang General na may kasamang banda ng musika at kaalakbay na mga 
	prayle, mga militar at mga kawani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inakala na ng 
	mga may kapangyarihan sa lalawigan na may maaalis sa katungkulan o kaya'y 
	malilipat; ang mga kaawaawang kapitan sa bayan at mga kabisa ay hindi 
	nangapalagay at hindi nangakatulog sa panganganib na baka masumpungan ng 
	maalindog na mangangaso ang ipalit sila sa mga hayop sa gubat na hindi 
	marunong umalinsunod, gaya ng ginawa na ng isang <i xml:lang="es" lang="es">
	alcalde</i> noong mga nakaraang araw na napapasan sa tao, sa buo niyang 
	paglalakbay, sapagka't walang mabait na kabayong maaasahang hindi 
	magbabagsak sa kanya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											May isang balitang kumalat na 
											mayroon ngang gagawin ang General 
											sapagka't ang gayong pangyayari 
											umano ay isang simula ng 
											paghihimagsik na dapat sugpuin 
											kaagad: na ang isang pangangasong 
											walang nahuli ay makasisira sa 
											karangalan ng mga kastila, at <abbr>
											iba </abbr>pa, at 
	humanap na tuloy ng isang kahabaghabag na taong papagsusuutin ng suot usa, 
	nang sinabi ng General (sa udyok ng isang pagkahabag na hindi natimbangan ni 
	Ben&nbsp;Zayb ng salitang pagpuri) at pinawi ang lahat ng pangamba at sinabi, na 
	siya'y naaawang pumatay ng mga hayop sa gubat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kung 
	ipagtatapat ay sadya ngang nasisiyahang loob ang General at
	<i xml:lang="la" lang="la">inter se</i> ay nalulugod siya, sa dahilang ano 
	ang nangyari sana kung hindi tumama sa pagtudla sa isang usa na hindi 
	nakababatid ng ugaling dapat ipamalas sa mga gayong kaparaanan? saan 
	masasadlak ang karangalan ng nakapamamahala? Bakit? Isa ba namang Capitang 
	General ang hindi tumama na wariy bagong nangangaso! ano na lamang ang 
	wiwikain ng mga indio, na, sa kanila'y mayroon din namang ilang mabuting 
	manudla? Malalagay sa kapanganiban ang tibay ng Inang bayan.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yaon ang sanhi 
	kung kaya't ipinag-utos ng General (na nakatawa ng tawang koneho at anyong 
	mangangasong masama ang loob) ang pagbabalik kaagad sa
	<span xml:lang="es" lang="es">Los&nbsp;Ba&ntilde;os</span>, at ipinaghambog, sa 
	paglalakbay, ang kanyang kagitingan sa pangangaso sa ganito o gayong 
	pangasuhan sa Espa&ntilde;a at waring ibig ipahiwatig ang pag-alipusta niya sa mga 
	pangangaso sa Pilipinas, bagay na inaakalang kapit sabihin dahil sa 
	nangyari; </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pse! ang paliligo sa Dampalit (daang paliit), ang sigangan sa 
	baybay ng lawa, ang paglalaro ng <i xml:lang="es" lang="es">tresillo</i> sa 
	palasyo at pagdayo sa gayon o ganitong kalapit na binubulusan ng tubig o sa 
	lawang kinalalagyan ng mga buwaya ay mainam pa kay sa roon at hindi pa 
	mapapara ang karangalan ng inang bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang isa sa 
	mga huling araw ng buwan ng Disyembre ay nakikipaglaro ng
	<i xml:lang="es" lang="es">tresillo</i> ang Capitang General samantalang 
	inaantay ang oras ng pananghalian. Katatapos pa lamang niyang maligo at 
	pag-inom ng isang basong sabaw at laman ng buko, kaya't ang mga sandaling 
	iyon ay siyang bagay samantalahin sa paghingi ng mga biyaya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isa pang nakapagpaparagdag sa kanyang katuwaan ang pananalo, sapagka't pinupunyagi ni
	Padre Irene at ni Padre Sibyla, na kanyang mga kalaban, 
	ang lihim na pagpapatalo, samantala namang si Padre Camorra ay 
	nagngingitngit sapagka't, sa dahilang kararating pa lamang ng umagang yaon 
	ay hindi niya batid ang mga pakanang iyon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang pinagbubuti ng 
	paring-artillero ang pakikipaglaro ay namumula at napapakagat labi sa tuwing 
	malilibang o mamamali sa pagsugal si Padre Sibyla, ngunit hindi 
	siya makaimik dahil sa malaki niyang pag-aalang-alang sa dominiko; datapwa'y 
	si Padre Irene naman ang pinagbubuntuhan niya ng galit, sapagka't 
	ipinagpapalagay niyang mapagpusa at sa gitna ng kanyang kabuhalhalan ay di 
	binibigyang halaga. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi man lamang siya tinitingnan ni Padre Sibyla: 
	binabayaan siyang mag-uungol; datapwa si Padre Irene, sa dahilang 
	mapakumbaba, ay humihinging tawad samantalang hinihimas ang tungkil ng 
	mahaba niyang ilong. Ang General naman ay nagagalak at sinasamantala ang 
	pagkakamali ng kanyang mga kalaban, sapagka't siya'y mabuting magparaan, 
	alinsunod sa payo ng kanonigo. Hindi batid ni Padre Camorra na ang 
	pinaglalaruan sa ibabaw ng dulang na iyon ay ang ikalulusog ng pag-iisip ng 
	mga pilipino, ang pagtuturo ng wikang kastila, sapagka't kung nalalaman 
	niya, ay malugod sanang nakihalo sa <em>laruan</em>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga 
	durungawang bukas ay pumapasok ang malinis at masarap na simoy at natatanaw 
	ang lawa, na ang kanyang tubig ay mahinhing bumubulong, sa paanan ng bahay, 
	na waring nangangayumpapa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa dakong kanan, sa malayo, ay natatanaw ang 
	pulong Talim na lubhang bughaw; sa gitna ng lawa at halos katapat lamang ay 
	may isang pulong kulay dahon, ang pulo sa Kalamba, na walang tao at ang ayos 
	ay waring kabiyak na buan; sa kaliwa, ang magandang pampangin na 
	nahihiyasan ng kakawayanan, isang bundok bundukang tanaw ang buong lawa, 
	malalawak na bukirin, sa dako pa roon ay bubong na saga sa mga pagitan ng 
	kulay na berdeng maitimitim ng mga dahon, pagkatapos ay ang bayang Kalamba 
	at sa huling dakong abot ng tanaw ay waring bumababa ang langit sa tubig ng 
	lawa na anyong dagat, na siyang sanhing tawagin siyang 'dagat na tabang' ng 
	mga taga roon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa isang dulo 
	ng salas ay naroroon ang kalihim na nakaupo sa harap ng isang mesa na 
	kinapapatungan ng ilang putol na papel. Ang General ay masipag at hindi niya 
	ibig ang mag-aksaya ng panahon, kaya't tinatapos ang ilang gawain 
	samantalang nag-aalkalde sa <span xml:lang="es" lang="es">tresillo</span> o 
	samantalang namimigay ng baraha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Samantala namang naglalaruan ay naghihikab at nabubugnot ang kalihim. Ang 
	ginagawa sa umagang iyon ay ang pagpapalitpalit ng bayang dapat kalagyan ng 
	mga kawani, mga pag-aalis sa katungkulan, pagpapatapon sa malayong lupa, 
	pagbibigay ng biyaya at <abbr>iba </abbr>pa, ngunit hindi pa dumarating sa malaking usapang 
	inaantay ng lahat, ang ukol sa kahilingan ng mga nag-aaral na pahintulutan 
	silang makapagtayo ng isang Academia ng wikang kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang isang 
	kawaning may mataas na katungkulan, si don&nbsp;Custodio at isang prayleng 
	nakatungo at waring may iniisip o may kabigatan ang loob (Padre Fernandez 
	ang kanyang pangalan) ay nangagtatalong marahan ang usapan, samantalang 
	payao't dito sila sa dalawang dulo ng salas. Sa isang silid na kalapit ay 
	nadidinig ang tunog ng mga bola ng billar, tawanan, halakhakan, ang boses 
	ni Simoun; ito'y nakikipagbillar kay Ben&nbsp;Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Camorra ay biglang nagtindig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Cristo na 
	ang makisugal sa inyo, <i xml:lang="es" lang="es">pu&ntilde;ales</i>!--ang 
	pabulalas na sabing kasabay ang paghahagis ng mga barahang nalalabi sa 
	kanya, sa ulo ni Padre Irene--<span xml:lang="es" lang="es">pu&ntilde;ales!</span> ang 
	taya ay sigurong siguro na, kundi man ang <i xml:lang="es" lang="es">codillo</i>, 
	at natalo pa dahil sa tawag! <span xml:lang="es" lang="es">Pu&ntilde;ales!</span> 
	si Cristo na ang makisugal!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At galit na 
	galit na isinasalaysay sa lahat ng naroroon ang pangyayari, lalong lalo na 
	sa tatlong naglalakad, na waring siyang ibig niyang pahatulin. Sumusugal ang 
	General, siya ay laban, may tiklop na si Padre Irene: humatak siya 
	sa espada at <span xml:lang="es" lang="es">pu&ntilde;ales!</span> hindi pinasunod 
	ng kamoteng si Padre Irene ang kanyang masamang baraha. Si Cristo 
	na ang makilaro! Siya'y hindi naparoon doon upang magpatalo ng salapi at 
	durugin ang kanyang ulo sa walang kapararakan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang akala 
	marahil ng neneng ito--ang patuloy na namumula--ay kinikita ko ang salapi ng 
	papalikwatlikwat lamang. Ngayon pa namang ang aking mga tao'y
	<span class="locked">nangagsisitawad na!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At umuungol na 
	tumungo sa kinalalagyan ng billar, na, hindi na pinakinggan ang mga hinging 
	ipagpaumanhin ni Padre Irene na nagtatangkang mangatwiran sa 
	tulong ng paghaplos ng ilong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig po ba 
	ninyong umupo, Padre Fernandez?--ang tanong ni Padre Sibyla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Masamang 
	manglalaro ako ng <i xml:lang="es" lang="es">tresillo</i>--ang sagot ng 
	prayle.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayo'y 
	paparituhin si Simoun--ang sabi ng General--eh! Simoun, eh, mister! ibig baga 
	ninyong makilahok sa isang laro?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang ipasisiya tungkol sa mga '<span xml:lang="es" lang="es">armas de salon</span>'?--ang 
	tanong ng kalihim na sinamantala ang pagkakahinto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumungaw si 
	Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig baga 
	ninyong maupo sa lagay ni Padre Camorra, ginoong&nbsp;Simoun?--ang 
	tanong ni Padre Irene--ang itataya ninyo'y brillante at hindi 
	tantos.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	kailangan sa akin ang gayon--ang sagot ni Simoun na lumapit at ipinapagpag 
	ang yeso na nasa kanyang kamay--at kayo ano ang inyong itataya?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ba ang 
	maitataya namin?--ang tugon ni Padre Sibyla--Ang General ay 
	makatataya ng maibigang itaya, ngunit kami, mga pari, mga
	<i xml:lang="es" lang="es">sacerdote</i>......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah!--ang 
	putol na pakutya ni Simoun--ang ibabayad ninyong dalawa ni Padre Irene 
	ay mga kaawanggawa, panalangin, kabaitan, ano?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Batid ninyong 
	ang mga kabaitang taglay ng isa't isa--ang talad na walang halong biro ni
	Padre Sibyla--ay hindi kagaya ng mga brillante na maaaring masalin 
	sa iba't ibang kamay, ipagbili na sa isa't ipagbili pa nito.... yaon ay dala 
	ng tao, mga bagay na hindi malalayo sa katawan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	papayag akong sa salita na lamang ninyo ako bayaran--ang pakling masaya ni 
	Simoun--Kayo Padre Sibyla sa bawa't limang tantos na ibibigay ninyo 
	sa akin ay sasabihin na lamang ninyo, sa halimbawa: lilimutin kong limang 
	araw ang karalitaan, ang kababaang loob, ang pagkamasunurin.... kayo naman
	Padre Irene: lilimutin ko ang kalinisang ugali, ang 
	pagkamahabagin, at <abbr>ibp.</abbr> Nakita na ninyo na napakaunting bagay, 
	at ako, ang ibibigay ko'y ang aking mga brillante.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakatanging 
	tao itong si Simoun, kung ano ano ang iniisip!--ang sabing tumatawa ni Padre &nbsp;Irene.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At <em>ito</em>,--ang 
	patuloy ni Simoun na tinangki sa balikat ang General--ang ibabayad nito sa 
	akin sa bawa't limang tantos ay isang <i xml:lang="es" lang="es">vale</i> na 
	katimbang ng limang araw na pagkakabilanggo, sa isang
	<i xml:lang="es" lang="es">solo</i> ay limang buwan, sa isang
	<i xml:lang="es" lang="es">codillo</i> ay isang utos na pagpapatapon, na 
	walang nakatalang pangalan, sa isang <i xml:lang="es" lang="es">bola</i>.... 
	ay isang utos sa guardia sibil na makabaril sa daan sa taong parurusahan, 
	samantalang ipinaghahatiran, at <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang hamon ay 
	napakatangi. Ang tatlong lalakadlakad ay nangagsilapit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	ginoong Simoun--ang tanong ng mataas na kawani--ano ang mahihita ninyo sa 
	pananalo ng kabaitan sa bunganga, at mga buhay ng tao, mga pagpapatapon at 
	mga pagpatay?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Malaki! Bagot 
	na ako sa kadidinig ng mga usapang tungkol sa mga kabaitan at nasa kong 
	maipong lahat, ang lahat ng nakakalat sa mundo, na nakapasok sa isang supot 
	upang itapon sa dagat kahit na kailanganing pamataw ang lahat ng aking 
	brillante.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sumpong din 
	iyan!--ang bulalas na tumatawa ni Padre Irene--at ano naman ang 
	gagawin ninyo sa mga pagpapatapon at pagpapapatay?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Upang linisin 
	ang bayan at pawiin ang lahat ng masasamang budhi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah! hangga 
	ngayo'y may galit pa kayo sa inyong mga tulisan, gayong mangyayaring hingan 
	sana kayo ng lalong malaking tubos o kinuha sana ang lahat ng inyong alahas. 
	Huwag naman kayong walang utang na loob!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinamarali ni 
	Simoun na siya'y hinarang ng mga tulisan, na pagkatapos siyang mapiging na 
	isang araw, ay pinabayaan siyang magpatuloy ng lakad na walang hininging 
	tubos kundi ang dalawa niyang rebolber na <span xml:lang="en" lang="en">
	Smith</span> at ang dalawang kahang punglo na kanyang dala. Idinugtong pang 
	ipinakukumusta raw sa kanya ang Capitan General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil doon at 
	sa dahilang ibinalita ni Simoun na ang mga tulisan ay maraming
	<i xml:lang="es" lang="es">escopeta</i>, baril at rebolber at sa gayong mga 
	tao'y hindi maaaring makalaban ang nag-iisa kahit na may sandata, ay lalagda 
	ng bagong utos ang Capitang General na ukol sa mga '<span xml:lang="es" lang="es">pistolas 
	de salon</span>' upang maiwasan na ang mga tulisan ay magkaroon ng armas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, 
	huwag!--ang tutol ni Simoun--sa ganang akin, ang mga tulisan, ay siyang mga 
	taong lalong may karangalan sa lupaing ito; sila ang tanging kumikita ng 
	ikabubuhay sa mabuting kaparaanan...... Inaakala ba ninyong kung ako'y 
	nahulog sa mga kamay...... ninyo sa halimbawa, ay pakakawalan ba ninyo ako 
	ng hindi kukunin ang kalahati man lamang ng aking mga hiyas?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tututol sana 
	si <abbr title="Don">Dn.</abbr> Custodio; tunay ngang isang amerikanong
	<i xml:lang="es" lang="es">mulato</i> na walang pinag-aralan ang Simoun na 
	iyon, na sinasamantala ang pakikipag-ibigan niya sa Capitan General upang 
	alimurahin si Padre Irene. Tunay nga kung sa bagay na kung si
	Padre Irene ang nakadakip sa kanya ay hindi siya nakawala ng dahil 
	sa gayong kaliit na bagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa ang 
	kasamaan ay wala sa pagkakaroon ng tulisan sa mga bundok at kaparangan--ang 
	patuloy ni Simoun--ang kasamaan ay nasa sa mga tulisang bayan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na gaya 
	ninyo--ang dugtong na tumatawa ng kanonigo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, gaya ko, 
	gaya natin, tayo'y mangagtapat; dito'y walang indio na nakadidinig sa 
	atin,--ang dugtong ng mag-aalahas--ang kasamaan ay nasa pangyayaring tayong 
	lahat ay hindi mga tulisang hayag: kung ito'y mangyari at manirahan na tayo 
	sa gubat, sa araw na iyan, ay ligtas na ang bayan, sa araw na iya'y sisibol 
	ang isang bagong kalipunan na siya na sa sarili ang mag-aayos.... at sa 
	gayon ay matiwasay nang makapaglalaro ng <i xml:lang="es" lang="es">tresillo</i> 
	ang Capitan General, na hindi siya kailangang linlangin ng kalihim....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay naghihikab ang kalihim at nag-iinat na itinataas sa ulo 
	ang mga kamay at iniunat sa ilalim ng mesa ang mga paa niyang nagkakapatong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	nagtawanan ng siya'y makita. Pinutol ng General ang pag-uusap at matapos na 
	bitiwan ang barahang kanyang sinusuksok ay nagwikang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, siya! 
	Siya na ang biruan at sugalan; gumawa tayo, pagbutihin natin ang gawa, 
	kalahating oras pa ang kulang sa oras ng pagkain. Marami bagang bagay ang 
	kailangang lutasin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lahat ay 
	nakingig. Sa araw na iyon pagtatalunan ang ukol sa pagtuturo ng wikang 
	kastila, kaya't may ilang araw nang naroroon si Padre Sibyla at si
	Padre Irene. Batid nang ang una, sa dahilang siya'y Vice-Rector, 
	ay laban sa panukala, at ang pangalawa ay kumakatig at kinakatigan naman ng
	<i xml:lang="es" lang="es">condesa</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano, ano?--ang 
	tanong na naiinip ng General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hang hunghol 
	ha maha hama he halon--anang kalihim na tinimpi ang isang paghihikab.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipinagbabawal 
	mula ngayon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipagpatawad po ninyo, aking General,--ang sabi ng mataas na 
	kawani--Ipahintulot po sa akin ng inyong karangalan na sabihing sa alin mang 
	bansa sa Sangsinukob ay hindi ipinagbabawal ang mga '<span xml:lang="es" lang="es">armas de salon</span>'.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinibit ng 
	General ang kanyang balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi tayo 
	nakikigaya sa alin mang bansa sa mundo--ang matigas na sabi ng General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kailan ma'y 
	nagkakatalo ang General at ang mataas na kawani, at sukat na ang isang 
	pahiwatig nito upang ang una'y magmatigas sa kanyang balak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Humanap ng 
	ibang daan ang mataas na kawani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga '<span xml:lang="es" lang="es">armas 
	de salon</span>' ay sa mga daga at inahing manok lamang nakasasakit--ang 
	wika--masasabi......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na tayo'y mga 
	inahing manok?--ang dugtong ng General na kinibit ang balikat--at ano sa akin? 
	Ipinakilala ko nang hindi ako gayon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit may 
	isang bagay--ang hiwatig ng kalihim--may apat na buwan lamang ngayon, nang 
	ipinagbawal ang paggamit ng armas, na pinatibayan sa mga mangangalakal na 
	taga ibang bayan, na ang mga <span xml:lang="es" lang="es">armas de salon</span> 
	ay may pahintulot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinunot ng 
	general ang noo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y may 
	kagamutan ang bagay na iyan--ani Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Papaano?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang kaliwagan. Halos lahat ng '<span xml:lang="es" lang="es">armas de salon</span>' 
	ay may anim na milimetro ang laki ng punglo, tangi lamang kung may ibang 
	laki na ipinagbibili. Pahintulutang ipagbili ang lahat ng mga walang anim na 
	milimetro.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pinuri ng 
	lahat ang naisip ni Simoun, tangi ang mataas na kawaning ibinulong kay Padre &nbsp;Fernandez na iyon ay hindi tuwid, ni hindi pamamahala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang guro sa 
	Tiani,--ang patuloy ng kalihim samantalang binabasa ang ilang 
	papel--humihinging bigyan siya ng lalong malaking bahay upang......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano pang 
	malaking bahay, sa mayroon na siyang sariling isang kamalig?--ang putol ni
	Padre Camorra na nalimutan na ang <span xml:lang="es" lang="es">
	tresillo</span> at lumapit sa usapan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sira daw ang 
	bubungan--ang sagot ng kalihim--at sa dahilang bumili siya ng mga
	<i xml:lang="es" lang="es">mapa</i> at <i xml:lang="es" lang="es">cuadro</i>, 
	sa sariling gugol, ay hindi mapabayaang ulanit arawin......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit wala 
	akong pakialam sa mga bagay na iyan--ang bulong ng General--sa Namamahala sa 
	Pangasiwaan humingi, sa Pangulong Pulong lalawigan, sa
	<span xml:lang="es" lang="es">Nuncio</span>.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang masasabi 
	ko sa inyo--ang sabi ni Padre Camorra--ang
	<i xml:lang="es" lang="es">maestrillong</i> iyan ay isang
	<i xml:lang="es" lang="es">filibusterillo</i> na masama ang loob; akalain ba 
	ninyong ipinagsasabi ng ereheng iyan na ang inililibing daw ng mainam na 
	paglilibing at ang hindi ay magkaisa din kung mabulok! Balang araw ay 
	pagkukukutusan ko <span class="locked">iyan, eh!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At inianyong 
	pasuntok ni Padre Camorra ang kanyang kamay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sadya 
	naman,--ang wika ni Padre Sibyla na waring walang kinakausap kundi 
	si Padre Irene--na ang ibig mag-turo ay maaaring magturo kahit 
	saang dako, sa walang bahay: si Socrates ay nagturo sa mga lansangang bayan, 
	si Platon ay sa mga halamanan ng Akademo at si Cristo ay sa mga kabundukan 
	at karagatan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marami akong 
	karaingan ng <i xml:lang="es" lang="es">maestrillong</i> iyan--ang sabi ng 
	General na nakipagsulyapan kay Simoun--inaakala kong ang lalong mabuti ay 
	alisin siya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alisin!--ang 
	ulit ng kalihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinalungkot 
	ng mataas na kawani ang kapalaran ng sawing taong iyon na humihingi ng 
	abuloy at ang nakamit ay ang pagkaalis sa katungkulan, kaya't tinangkang 
	saklolohan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	katotohanan ay--ang sabing may panganganib--na ang pag-aaral ay hindi 
	naaarugang mabuti.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nagtakda na 
	ako ng maraming halaga na ipamimili ng mga kailangan--ang sabing mataas ng 
	General, na waring ang ibig turan ay: Gumawa na ako ng higit sa nararapat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit sa 
	dahilang walang bahay na sadya ay nangasisira ang mga kasangkapang 
	binibili....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	magagawang sabaysabay na lahat--ang biglang putol ng General--Hindi mabuti 
	iyang paghingi ng mga guro dito ng mabubuting bahay gayong ang mga guro sa 
	Espa&ntilde;a ay namamatay ng gutom. Kalabisan na iyang ibig pang humigit kay sa 
	mga nasa Inang-bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Filibusterismo!....</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Una muna sa 
	lahat ang Inang-bayan! una muna ang ating pagkakastila!--ang dugtong ni 
	Ben&nbsp;Zayb na ang mata'y kumikinang dahil sa busog ng pag-ibig sa tinubuang 
	lupa, at namula ng kaunti dahil sa nakitang siya'y napag-isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magmula 
	ngayon--ang sabi ng General--ay alisin sa tungkol ang bawa't dumaing.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung ang 
	munakala ko lamang ay tatanggapin--ang pasumalang sabi ni don&nbsp;Custodio, na 
	waring kinakausap ang sarili.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ukol sa mga 
	bahay paaralan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magaan, 
	magagawa at walang gugol, na gaya ng lahat ng aking munakala, anak ng 
	mahabang pagkamalas sa mga bagaybagay at pagkakilala sa lupaing ito. Ang mga 
	bayan ay magkakaroon ng paaralan na hindi paggugugulan ng pamahalaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Batid na ang 
	bagay na iyan--ang pakutyang sabi ng kalihim--ipag-utos sa mga bayang itayo sa 
	tulong ng kanilang sariling gugol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	nagtawanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi po, 
	hindi po--ang sigaw ni Don&nbsp;Custodio na nangupinyo at namula--ang mga bahay ay 
	nakatayo na at nag-aantay lamang na gamitin. Mabuti sa katawan, walang 
	kapintasan at maaliwalas......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga prayle 
	ay may pangambang nagtinginan. Ipalalagay kaya ni Don&nbsp;Custodio na gawing 
	paaralan ang mga simbahan at mga kombento o bahay-pari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan 
	natin!--anang General na ikinunot ang noo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakadali, 
	aking General--ang tugon ni Don&nbsp;Custodio na umunat at ginamit ang malaking 
	boses na kagamitan niya sa mga tanging pagpupulong--ang mga paaralan ay bukas 
	lamang sa mga araw na iginagawa at ang mga sabungan ay sa mga araw lamang ng 
	pista.... Gawing paaralan ang mga sabungan kahit sa loob man lamang ng 
	sanglinggong araw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah, bah, 
	bah!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pumuslit na 
	rin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit kung 
	ano ano ang naiisip ninyo Don&nbsp;Custodio!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	kahalakhalak na panukala!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang lahat ay 
	nalulusutan nito!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit mga 
	ginoo--ang sigaw ni Don Custodio ng madinig ang gayong mga 
	pabulalas--magpakatino nga tayo, alin pa ang bahay na lalong agpang kay sa 
	sabungan? Malalaki, mabubuti ang pagkakayari, at wala namang kapararakan sa 
	loob ng sanglinggo. At maging sa dako man ng maayos na ugali tingnan, ang 
	aking panukala ay matatanggap; magiging isang panglinis at pagsisisi sa 
	lingguhan ng sabungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	maminsanminsan ay may sabong sa buong sanglinggo--ang pahiwatig ni Padre Camorra--at 
	hindi dapat na yamang ang may pasabong ay nagbabayad sa <span class="locked">
	Pamahalaan ay......</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oh, 
	siya...... sa mga araw na iyan ay huwag magpaaral!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah, 
	bah!--anang General--ang ganyang kakilakilabot na bagay ay hindi mangyayari 
	samantalang ako ang namamahala! Hindi magpapaaral dahil sa nagsasabong! Bah, 
	bah, bah! magbibitiw na muna ako ng tungkol!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ang General 
	ay lubha nga manding nasusulukasok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit aking 
	General, mabuti na ang mawala sa ilang araw kay sa buwanang mawala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ay laban 
	sa mabuting ugali!--ang dugtong ni Padre Irene na lalo pa manding 
	bugnot kay sa General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lalong laban 
	sa mabuting ugali, ang pagkakaroon ng maiinam na bahay ang sugalan at ang 
	paaralan ay wala...... Magpakatino tayo mga ginoo at huwag tayong paakay sa 
	mga udyok ng kalooban. Samantalang sa paggalang sa katauhan ay ibinabawal 
	natin ang pagtatanim ng apian sa mga lupang ating nasasakop ay binabayaan 
	naman natin ang paghitit, ang nangyayariy binabaka natin ang masamang hilig 
	at namumulubi tayo......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	unawain ninyong iyan ay nagbibigay sa pamahalaan ng may apat na raa't limang 
	pung libong piso na walang anumang gawa--ang tugon ni Padre Irene 
	na lalo't lalo pang kumakampi sa pamahalaan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, siya 
	na, mga ginoo--ang sabi ng General na pinutol ang pagtatalo--mayroon akong 
	balak tungkol sa bagay na iyan at iniuukol ko ang aking pagninilay sa 
	katalinuhang bayan. Mayroon pa bang bagay na pagpapasiyahan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Wariy 
	natatakot na tiningnan ng kalihim si Padre Sibyla at si Padre &nbsp;Irene. 
	Ang pinakamalakiy lalabas na. Ang dalawa'y humanda.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	kahilingan ng mga nag-aaral na humihinging pahintulot upang magbukas ng 
	isang Akademia ng wikang kastila--ang sagot ng kalihim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napuna sa 
	lahat ng nasa salas ang pagkagulo, at matapos silang makapagtinginan ay 
	napatitig sa General upang makilala ang ipapasiya. May anim na buwan nang 
	ang kahilingan ay nag-aantay doon ng isang kapasiyahan at naging isang 
	wariy <i xml:lang="la" lang="la">casus belli</i> na tuloy ng ilang lupon. 
	Ang General ay nakatungo na waring upang huwag makilala ng iba ang kanyang 
	iniisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Bumibigat ang 
	anyo ng pananahimik at ang gayon ay nahalata ng General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	pasiya ninyo?--ang tanong sa mataas na kawani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano pa ang 
	ipasisiya ko, aking General!--ang sagot ng tinanong na kinibit ang balikat at 
	ngumiti ng ngiting malungkot--ano ang ipasisiya ko kundi ang kahilingan ay 
	karapatdapat at ipinagtataka ko ang pagtatagal ng anim na buan upang ang 
	bagay na iyan ay mapasiyahan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindit may 
	napapagitnang mga bagaybagay--ang malamig na tugon ni Padre Sibyla 
	na ipinikit ng kaunti ang mata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling 
	ikinibit ng mataas na kawani ang kanyang balikat na waring hindi niya batid 
	kung ano ang mga bagaybagay na iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bukod sa wala 
	sa panahon ang ninanasa,--ang patuloy ng dominiko--bukod sa taglay niyang 
	laban sa aming kapangyarihan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	nakapagpatuloy si Padre Sibyla at tumingin kay Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	kahilingan ay may anyong dapat paghinalaan--ang dugtong nitong huli na 
	nakipagtinginan sa dominiko.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ito'y 
	makalawang pumikit. Nang makita ni Padre Irene ang gayon ay 
	nahalata na niyang ang kanyang usap ay talo na halos, sapagka't kalaban si 
	Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	payapang pagtakwil, isang pagbabangong ang gamit ay papel sellado--ang 
	dugtong ni Padre Sibyla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pagbabangon, 
	pagtakwil?--ang tanong ng mataas na kawani, na napatingin sa madla na waring 
	walang maantiluhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	nangungulo ay mga binatang kilala sa pagkamakabago at napakalalo, kundi 
	panganganlan ng iba pang tawag;--ang dugtong ng kalihim sa dominiko--ang isa 
	sa kanila'y nagngangalang Isagani, ulong hindi matino...... pamangkin ng 
	isang klerigo......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isa sa mga 
	tinuturuan ko--ang sagot ni Padre Fernandez--at ako'y nasisiyahang 
	loob sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Pu&ntilde;ales</span>, 
	kasiyahan din naman iyan!--ang bulalas ni Padre Camorra,--kamunti na 
	kaming magpanuntukan sa bapor: sapagka't napakawalang galang, itinulak ko 
	siya at itinulak naman ako!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon pang 
	isang nagngangalang Makaragui o Makarai......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Makaraig,--ang 
	sagot ni Padre Irene na nakihalo sa usapan,--isang binatang 
	napakagandang ugali at nakalulugod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ibinulong 
	sa General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	sinabi ko sa inyo, mayaman...... iniluluhog ng <i xml:lang="es" lang="es">
	condesa</i> na inyong tingnan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	nag-aaral sa panggagamot na nagngangalang Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa Basiliong 
	iyan ay wala akong masasabi--ang tugon ni Padre Irene na itinaas at 
	ibinuka ang mga kamay na waring mag <i xml:lang="la" lang="la">dodominus 
	vobiscum</i>;--sa ganang akin iyan ay tubig na hindi kumikilos. Kailan ma'y 
	hindi ko naunawa ang ninanasa ni ang iniisip. Sayang at hindi natin kaharap 
	ngayon si Padre Salvi upang magpakilala sa atin ng pinagmulan ng 
	binatang iyan! Naaalala kong aking nadinig na sinasabing niyong kanyang 
	kabataan ay may ipinakialam sa kanya ang guardia sibil.... ang kanyang ama'y 
	napatay sa isang gulo na hindi ko na maalaala....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	napangiting malumanay, walang kalatis, ipinatanaw lamang ang kanyang ngiping 
	mapuputit mabuti ang pagkakahanay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aha, 
	aha!--anang General na tumango tango--gayon pala? Itala ninyo ang pangalang 
	iyan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nguni, aking 
	General,--ang sabi ng mataas na kawani ng makitang masama ang tungo ng 
	salitaan--hanggang sa ngayon ay wala pang nababatid na bagay na laban sa mga 
	binatang iyan; ang kanilang kahilingan ay matuwid at wala tayong karapatang 
	huwag dinggin dahil sa panunulay lamang sa mga hakahaka. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa akala ko ay 
	nararapat na sang-ayunan ng Pamahalaan ang kahilingan at sa gayon ay 
	magpapamalas ng kanyang pagkakatiwala sa bayan at ng katibayan ng kanyang 
	pagkakatatag; at siya'y may kalayaang bawiing muli ang pahintulot kung 
	makitang dahil sa kanyang mabuting kalooban ay nagpapakalabis. Mga sanhi at 
	paraan sa pagbawi ay hindi mawawalan, mababantayan natin sila.... Ano't 
	pasasamain ang loob ng ilang binata, na mangyayaring magdamdam pagkatapos, 
	gayong ang kanilang hinihiling ay nalalagda sa mga utos ng hari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Irene, si don Custodio at si Padre Fernandez ay nagpamalas ng 
	kanilang pagsang-ayon sa pamagitan ng tango ng ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ang 
	mga indio ay hindi nararapat matuto ng wikang kastila batid baga ninyo?--ang 
	sigaw ni Padre Camorra--hindi dapat matuto, sapagka't pagkatapos ay 
	nakikipangatuwiranan sa atin, at ang mga indio ay hindi dapat mangatuwiran 
	kundi sumunod lamang at magbayad.... hindi dapat manghimasok sa pagsuri ng 
	sinasabi ng mga kautusan at ng mga aklat napakamatatalas at mga mapag-usap! 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pagkaalam ng wikang kastila ay nagiging kalaban ng&nbsp; Diyos&nbsp; at ng Espa&ntilde;a.... 
	basahin ninyo ang kabuhayang 'Tandang&nbsp;Basio Makunat' at kung hindi gayon; 
	iyan ang aklat! May mga katotohanang ganganito!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ipinakita 
	ang mabibilog niyang kamay na pasuntok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hinaplos ni
	Padre Sibyla ang kanyang anit na bilang tanda ng pagkainip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	salita!--aniya na umanyo ng anyong lalong mapayapa sa gitna ng kanyang 
	pagngingitngit--hindi ang pagtuturo lamang ng wikang kastila ang 
	pinag-uusapan dito, dito'y may isang piping pagtutunggali ng mga nag-aaral 
	at ng mga pari sa Unibersidad ng <abbr title="Santo">Sto.</abbr>&nbsp;Tomas. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kung masusunod ng mga nag-aaral ang kanilang hangad ay manghihina ang pananalig 
	sa amin, sasabihing kamiy dinaig at mangagmamataas, at wala na ang 
	paniniwala, wala na ang lahat! Pagkaguho ng unang sagka sino pa ang 
	makahahadlang sa kabataang iyan? Sa aming paglagpak ay wala kaming gagawin 
	kun di ang ipakilala naman ang paglagpak ninyo! Matapos kami ang pamahalaan 
	naman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	hindi mangyayari, <i xml:lang="es" lang="es">pu&ntilde;ales</i>!--ang sigaw ni Padre &nbsp;Camorra--tingnan muna natin kung sino ang may malakas na 
	pangsuntok!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gayon ay 
	nagsalita si Padre Fernandez, na sa buong pagtatalo ay nanira 
	lamang sa kangingiti. Lahat ay nakimatyag sapagka't kilalang siya'y may 
	mabuting ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag sumama 
	ang loob ninyo sa akin, Padre Sibyla, kung hindi ninyo ako kaisa 
	sa paghuhulong ukol sa bagay na ito, ngunit napakatanging kapalaran ang sa 
	akin, na kailan man halos, ay kasalungat ako ng aking mga kapatid. Ang sabi 
	ko nga'y hindi tayo dapat mabakla. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang pagtuturo ng wikang kastila ay 
	mangyayaring pahintulutan ng walang anumang kapanganiban, at upang huwag 
	lumabas na isang pagdaig sa Unibersidad, ay nararapat na tayong mga dominiko 
	ay magpauna sa pagkagalak ng dahil sa bagay na iyan; iyan ang
	<i xml:lang="es" lang="es">politica</i>. Bakit tayo makikipaglabanan tuwi na 
	sa bayan, sa tayo ay kakaunti at sila ay marami, sa kailangan natin sila at 
	tayo'y hindi nila kailangan?</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											--Hintay muna kayo, Padre Camorra, 
	hintay muna kayo!--Payagan na nating ngayon ay mahina ang bayan at walang 
	maraming nalalaman, ako man ay gayon din ang akala ko, ngunit bukas ay 
	hindi na gayon, ni sa makalawa. Bukas makalawa ay sila ang magiging malakas, 
	mababatid ang kanilang mga kailangan at hindi natin mapipigil, gaya rin 
	naman ng hindi mangyayaring mapigil, na, pagdating ng bata sa ilang gulang 
	ay makaalam ng maraming bagay... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang sinasabi ko nga ay bakit hindi natin 
	samantalahin ang kalagayang ito sa kamangmangan upang magpalit ng paraan sa 
	pamamalakad at itatag sa matibay na batayan, na hindi mapapawi, sa batayang 
	katwiran, sa halimbawa, at huwag sa batayang kamangmangan? Sapagka't wala 
	nang kagaya ng maging makatwiran, gaya ng sinabi ko sa tuwi na sa aking mga 
	kapatid, ngunit ayaw akong dinggin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang indio, gaya rin ng alin mang bayang 
	bata pa ay mapag-usig ng katwiran; humihingi ng parusa kung nagkasala, at 
	namumuhi pag hindi kinamit ang gayon. Marapat ang hinihingi? Ipagkaloob, 
	ibigay natin sa kanila ang lahat ng paaralang kailangan, mapapagod din sila: 
	ang kabataan ay bulagbol na talaga, ang nag-uudyok lamang sa kanila sa 
	pag-uusig ay ang ating pagsalungat. Ang ating panilong karangalan ay luma 
	na, Padre Sibyla: gumawa tayo ng iba, ang panilong pagkilala ng 
	utang na loob, sa halimbawa. Huwag tayong magsamangmang, gayahan natin ang 
	mga hesuita......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oh, oh, Padre  Fernandez!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hinding hindi: 
	matitiis na lahat ni Padre Sibyla, liban na lamang sa pagayahan sa 
	kanya ang mga hesuita. Namumutla't nanginginig na nagbubusa ng mga matalas 
	na wika.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magpransiskano na muna.... Kahit na ano, huwag lamang hesuita!--ang sabing 
	walang patumangga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oh, oh!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Eh, eh! Padre 
	P.....!!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang sumunod ay 
	isang pagtatalong panabay ng lahat, na nalimot na ang General; nagsasalitang 
	sabaysabay, nagsisigawan, hindi mangagkalinaw, nangagtatalo; si Ben&nbsp;Zayb ay 
	kaharap ni Padre Camorra at nag-uumangan ng suntok, binabanggit ng 
	isa ang mga gansa at ang isa'y ang mga manghihitit ng tinta, tinutukoy ni
	Padre Sibyla ang kapitulo at si Padre Fernandez naman ay 
	ang sa <i xml:lang="la" lang="la">Summa</i> ni <abbr>Sto.</abbr>&nbsp;Tomas, at
	<abbr>iba </abbr>pa, hangang sa pumasok ang kura sa
	<span xml:lang="es" lang="es">Los&nbsp;Ba&ntilde;os</span> at sinabing nakahanda na ang 
	pananghalian.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tumindig ang 
	Capitan General at sa gayo'y naputol ang pagtatalo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, mga 
	ginoo!--ang sabi--ngayo'y marami tayong nagawa, gayong tayo'y nasa kapanahunan 
	ng pagpapahinga! May nagsabing ang mga maseselang na bagay ay dapat 
	pag-usapan sa pagtatapos ng pagkain. Ako'y lubos na sang-ayon sa sabing 
	iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Baka masira 
	ang tiyan natin--ang sabi ng kalihim, na ang tinutukoy ay ang init ng 
	salitaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	ipagpabukas na natin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagtindigang 
	lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aking 
	General--ang sabing marahan ng mataas na kawani--ang anak na babae ni 
	Kabesang Tales ay nagbalik na mulit hinihingi ang paglaya ng kanyang nunong 
	may sakit na hinuling bilang kapalit ng ama......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tiningnan 
	siyang masama ang loob ng General, na hinaplos ang malapad na noo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Putris yatang 
	hindi na babayaang ang tao'y makapananghaling mapayapa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ikatlong araw 
	na ng kanyang pagparito; isang kaawaawang dalaga...</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah, 
	demonio!--ang bulalas ni Padre Camorra--sinasabi ko na ngang mayroon 
	akong bagay na sasabihin sa General; kung kaya nga ako naparito ay...... 
	upang katigan ang kahilingan ng binibining iyan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinamot ng 
	General ang kanyang tainga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya!--ang 
	sabi--padalhan ng sulat ng kalihim ang teniente ng guardia sibil upang 
	pakawalan. Hindi masasabing hindi ako maawain at mahabagin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tumingin 
	kay Ben Zayb. Ikinisap ng mamamahayag ang kanyang mata.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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