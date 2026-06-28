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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXIV. Mga Pangarap</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinabukasan, isang araw ng Huwebes, bago lumubog ang araw, ay naglalakad si 
	Isagani sa liwaliwang Maria&nbsp;Cristina na tungo sa Malecon, upang dumalo sa 
	itinipan sa kanya ni Paulita ng umagang iyon. Walang pag-aalinlangan ang 
	binata na ang kanilang pag-uusapan ay ang nangyari sa gabing nagdaan, at sa 
	dahilang siya'y handang hingan ng paliwanag ang binibini at alam niya ang 
	pagkamataas at ugaling matigas nito ay inaasahan na ang isang pagkakasira. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa pananakaling ito ay tinaglay niya ang dalawang bugtong na sulat ni 
	Paulita, dalawang kaputol na papel, na bahagyang kinatatalaan ng ilang 
	talatang madalian ang pagkakatitik, na may ilang lamas at di lubhang ayos 
	ang pagkakasulat, mga bagay na hindi nakahadlang upang sila'y pakaingatan ng 
	binatang nangingibig na higit pa kay sa sila'y naging sulat ni Safo o ng 
	musa Polimnia.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pagtalagang ito na pawiin ang pag-ibig sa ngalan ng karangalan, ang hangad 
	na magtiis makatupad lamang sa katungkulan, ay hindi nakapigil na sumalakay 
	kay Isagani ang isang matinding kalungkutan at makapagpaalaala sa kanya 
	noong magagandang umaga at mga gabing lalo pa manding magaganda, na silang 
	dalawa'y nagbubulungan ng matatamis na kahangalan sa mga pag-itan ng salang 
	bakal ng <i xml:lang="es" lang="es">entresuelo</i>, mga kahangalang sa 
	ganang binata, ay may kahulugan at katuturan na waring sila ang mga tanging 
	salita na dapat pakinggan ng lalong mataas na pang-unawa ng tao. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Iniisip ni 
	Isagani ang mga paglalakaran, ang mga gabing may buwan, ang peria, ang mga 
	madaling araw ng Disyembre matapos ang <i xml:lang="es" lang="es">misa de 
	gallo</i>, ang agua bendita na karaniwang kanyang iniaabot at 
	pinasasalamatan naman ng binibini sa pamamagitan ng isang tinging puno ng 
	isang buong pagsinta, at kapwa sila nangingilabot pagtatama ng kanilang mga 
	daliri. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Matutunog na buntonghininga na waring maliliit na kuwitis ang 
	pumupulas sa kanyang dibdib at sumasalagimsim sa kanya ang lahat ng banggit 
	ng mga makata't manunulat na ukol sa pagkasalawahan ng babae. Sa loob niyang 
	sariliy isinusumpa ang pagkakatayo ng mga dulaan, ng operetang pranses, 
	ipinangangakong gagantihan niya si Pelaez sa lalong madaling panahon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Lahat 
	ng nasa paligid ay waring malungkot at maiitim ang kulay sa ganang kanya; 
	ang dagatan ay ulila't nag-iisa, lalo pa manding wariy nag-iisa dahil sa 
	kadalangan ng mga daong na nakahinto roon; ang araw ay lulubog sa likuran ng 
	Mariveles nang walang anumang kagandahan at kariktan, wala ang mga ulap na 
	sarisari ang ayos at mayaman sa kulay ng mga hapong magaganda; ang monumento 
	ni Anda, na walang kaayos ayos, maralita't bagol, na walang anyo, walang 
	kalakhan: wariy isang sorbetes o mabuti na ang maging isang pastel. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga 
	ginoong nangagliliwaliw sa Malecon, kahit na may mga anyong nasisiyahang 
	loob at masasaya, ay waring masusungit, mapagmataas at mga hambug sa ganang 
	kanya; malilikot at walang pinag-aralan ang mga batang naglalaro sa 
	dalampasigan na pinatatalon sa alon ang mga batong lapad sa tabi ng dagat, o 
	kaya'y nangaghahanap sa buhanginan ng mga suso at kokomo na hinuhuli ng 
	walang patumangga at pinapatay ng wala namang pakinabang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa isang sabi, 
	sampu ng walang katapusang paggawa ng daongan, na pinatungkulan niya ng 
	mahigit sa tatlong tula, ay waring isang bagay na walang kabuluhan, 
	kahalayhalay, gawang bata, sa ganang kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang daongan, 
	ah! ang sadsaran ng Maynila, isang <i>bastardo</i> na mula't sapol ng 
	ipaglihi ay nagpaluha na sa lahat dahil sa pangunguntit kahihiyan! Kung 
	hindi man lamang sana mangyari na matapos ang maraming pagluha ay huwag 
	lumabas na karimarimarim ang bungang sisipot!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagpugay ng 
	hindi inino ang dalawang hesuita na naging mga guro niya; bahagya nang 
	napuna ang isang <i xml:lang="en" lang="en">tandem</i> na ang lulan ay isang 
	amerikano at kinaiingitan ng ilang makisig na nagpapalakad ng kanilang mga 
	kalesa; nang nalalapit sa monumento ni Anda ay nadinig si Ben-Zayb na may 
	kausap at ang pinagsasalitaan ay si Simoun na nang gabing nakaraan ay 
	biglang nagkasakit; si Simoun ay ayaw tumanggap ng anumang dalaw, sampu sa 
	mga alagad ng General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan!--ang 
	bulalas ni Isagani na napangiti ng malungkot--diyan, ang mga pakitang loob, 
	sapagka't mayaman.... Ngunit sa mga sundalong sugatin at may sakit na 
	galing sa pagsalakay ay walang dumadalaw!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	pag-iisip sa mga pagsalakay na ito, sa kapalaran ng mga kaawaawang sundalo 
	at sa pakikipaglaban ng mga taga kapuluan na ayaw pasakop sa dayuhan, ay 
	naisip ang pagtimbang ng mga pagkamatay, na, kung ang sa mga sundalo ay 
	dakila sapagka't tumutupad sa kanilang katungkulan, ang sa mga taga kapuluan 
	ay maluwalhati sapagka't ipinagtatanggol ang kanilang tinubuan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Katakatakang 
	kapalaran ang sa ilang bayan!--aniya--Sapagka't ang isang manglalakbay ay 
	lumunsad sa kanyang dalampasigan, ay nawawalan na sila ng kalayaan at 
	nagiging sakop o alipin, hindi lamang ng manglalakbay, hindi lamang ng mga 
	nagmamana sa mga ito, kundi ng kanila pang mga kababayan, at hindi sa isang 
	panahon lamang kundi sa buong buhay na! Katakatakang pag-unawa sa katwiran! 
	Ang kalagayang ito'y nagbibigay ng malaking karapatan upang lipulin ang 
	lahat ng dayuhan na wariy siyang lalong mabangis na hayop na maitatapon ng 
	dagat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At inisipisip, 
	na, ang mga taga pulong iyon, na kabaka ng kanyang bayan ay walang ibang 
	kasalanan kundi ang taglay na kahinaan. Ang mga manglalakbay ay lumunsad din 
	naman sa dalampasigan ng ibang bayan; ngunit sa dahilang natagpuang 
	malalakas ay hindi pinagtangkaan ng kanilang katangi-tanging hangad. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kahit 
	na mahihina ay minamaganda niya ang ipinamamalas, at ang pangalan ng mga 
	kalaban, na hindi kinaliligtaang lagyan ng kakabit na duwag at di mapagtapat 
	ng mga pamahayagan, ay ipinalalagay niyang mga pangalang magiting, sapagka't 
	namamatay sa gitna ng kadakilaan sa paanan ng mga gibang muog ng kanilang di 
	wastong kuta, mga dakila pa kay sa matatandang bayaning taga Troya; ang mga 
	nasa pulong iyon ay hindi nagnakaw ng isa mang Elenang pilipina. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	kanyang kasigabuhang loob sa pagkamakata, ay iniisip ang mga kabinataan sa 
	mga pulong iyon na nangagkakapuri sa mata ng mga babae doon, at dahil sa 
	siya'y nangingibig, na may nasang mawala sa mundo, ay kinaiinggitan niya ang 
	mga kabinataang iyon na nakakatagpo ng isang dakilang pagpapatiwakal. At
	<span class="locked">nabulalas na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah! Ibig kong 
	mamatay, mauwi sa wala, iwanan ang aking bayan ng isang dakilang pangalan, 
	mamatay ng dahil sa kanya, siya'y ipagtanggol sa pagdagsa ng mga dayuhan at 
	pagkatapos ay tanglawan ng araw ang aking bangkay na wariy tanod na walang 
	kilos sa mga talampas ng dagat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ang 
	pakikilaban sa mga aleman ay pumasok sa kanyang alaala, at halos dinamdam 
	niya ang pagkakasawata ng gayon; namatay sana siya ng buong kasiyahang loob 
	sa piling ng watawat ng kastila't pilipino, bago sumuko sa dayuhan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't sa 
	Espa&ntilde;a--aniya--ay nabibigkis kami ng mahigpit, dahil sa nakaraan, sa 
	kasaysayan, sa pananampalataya, sa wika....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang wika, oo, 
	ang wika! Isang palibak na ngiti ang nalarawan sa kanyang mga labi; ng 
	gabing yaon ay mayroon silang gagawing isang piging sa <em>magpapansit</em> 
	upang <em>ipagdiwang</em> ang pagkamatay ng Akademia ng wikang kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay!--ang 
	buntong-hininga niya--kapag ang mga labusaw sa Espa&ntilde;a ay kagaya ng mga 
	naririto, sa madaling panahon ay mabibilang ng Inang bayan ang mga 
	nagtatapat sa kanya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang gabiy 
	unti-unting lumalaganap at dahil doo'y nararagdagan ang kapighatian sa puso 
	ng binata, na wala nang pag-asa halos na makita si Paulita. Iniiwan na ng 
	mga nagliliwaliw ang Malecon upang tumungo sa Luneta, na ang ilang bahagi ng 
	tinutugtog doon ng musika ay nakararating na dala ng masarap na hangin sa 
	hapon hanggang sa kinalalagyan ng binata; ang mga marino ng isang 
	pangdigmang dagat, na nakahimpil sa ilog, ang gumagawa ng mga paghahandang 
	ukol sa gabi, na, nangagsisiakyat sa lubid na wariy mga gagamba; ang mga 
	daong ay unti-unti nang naglalagay ng kanilang ilaw na nagbibigay buhay doon 
	at ang dalampasigan</font></p>
	<div class="poem-container">
		<blockquote class="poem" xml:lang="es" lang="es">
			<div class="stanza">
				<div class="i0">
					<p style="margin-left: 80px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Do el viento riza las calladas olas</font></div>
				<div class="i0">
					<p style="margin-left: 80px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Que con blando murmullo en la ribera</font></div>
				<div class="i0">
					<p style="margin-left: 80px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Se deslizan veloces por si solas......</font></div>
			</div>
		</blockquote>
	</div>
	<p class="conti-para" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">na sinabi ni 
	Alaejos, ay bumubuga sa dakong malayo ng manipis na singaw na ginagawang 
	wariy kayong madalang at matalinghaga ng liwanag ng buwan, na noon ay 
	kabilugan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang malayong 
	dagunot ay nadinig, dagunot na unti-unting lumalapit: lumingon si Isagani at 
	ang kanyang puso'y tumibok ng malakas; isang sasakyang batak ng dalawang 
	kabayong puti ang dumarating, ang mga kabayong puting makikilala niya sa 
	gitna ng sandaanglibo. Sa sasakyan ay nakalulan si Paulita, si 
	Aling&nbsp;Victorina at ang kaibigang kasama ng gabing nakaraan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Bago 
	makahakbang ang binata'y nakaibis nang bigla si Paulita at nginitian si 
	Isagani ng isang ngiting lubos na pakikipagkasundo; si Isaganiy napangiti 
	naman at sa wari niya'y napawing parang usok ang lahat ng ulap, ang lahat ng 
	masusungit na akalang sa kanya'y sumalakay; may mga liwanag ang langit, awit 
	ang hangin at bulaklak ang nakakalat sa mga damo ng nilalakaran. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang masama 
	lamang ay naroroon si Aling&nbsp;Victorina, si Aling&nbsp;Victorina na kaylan ma't 
	nakikita ang binata'y hindi binibitiwan upang pagtanungan nang balitang ukol 
	kay Don Tiburcio. Tinungkol ni Isagani ang pagtuklas ng 
	kinalalagyan sa pamamagitan ng mga nag-aaral na kakilala niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala pang 
	makapagsabi sa akin hangga ngayon--ang sagot, at katotohanan nga ang kanyang 
	sinasabi, sapagka't si Don Tiburcio ay nagtatago pa naman sa 
	bahay ng amain ng binata, sa bahay ni Padre Florentino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipabalita 
	ninyo sa kanya--ang sabing galit na galit ni Aling&nbsp;Victorina--na ipinahahanap 
	ko siya sa guardia sibil; sa patay man o sa buhay ay ibig kong matanto kung 
	saan naroon.... sapagka't iyang pangangailangang mag-antay ng sampung taon 
	bago makapag-asawa ang isang <span class="locked">gaya ko!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gulilat na 
	napatingin sa kanya si Isagani; iniisip ni Aling&nbsp;Victorina ang pakasal. Sino 
	kaya ang kulang palad?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ba ang 
	pagkamasid ninyo kay Juanito Pelaez?--ang biglang tanong ng babae.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si 
	Juanito?....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	matumpakan ni Isagani ang isasagot; nganingani nang ibig sabihin ang lahat 
	ng kasamaan ni Pelaez na kanyang batid, ngunit ang pagkamapagbigay ay 
	siyang naghari sa kanyang puso at ang sinabiy pawang pagpuri sa kaagaw, sa 
	dahilang kaagaw nga niya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa gayon ay tuwangtuwa at magalak na 
	pinakapuri ni Aling&nbsp;Victorina ang mga kabutihan ni Pelaez, at gagawin na 
	sanang katapatang loob si Isagani tungkol sa kanyang panibagong pag-ibig, 
	nang dumating na tumatakbo ang kaibigan ni Paulita upang sabihin na ang 
	pamaypay nito'y nahulog sa mga batong nasa pasigan, sa kalapit ng Malecon. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Pakana o pagkakataon, ngunit ang pangyayaring ito'y nagbigay daan upang ang 
	kaibigan ay matirang kasama ng matandang babae at si Isagani naman ay 
	mangyaring makipag-alaman kay Paulita. Sa isang dako naman ay ikinalulugod 
	ni Aling&nbsp;Victorina ang gayon, at upang maiwan sa kanya si Juanito, ay 
	linuluwagan ang pag-ligaw ni Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Mayroon nang 
	handang paraan si Paulita; nang magpasalamat ay nagpakunwaring may 
	pagkamuhi, may sama ng loob, at ipinahiwatig, sa isang paraang lubhang 
	mahinhin, na siya'y nagtataka sa pagkakatagpo doon sa binata, gayong ang 
	lahat ng tao'y nasa Luneta, sampu ng mga artistang pransesa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tinipanan 
	ninyo ako, papanong hindi....?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gayon man, kagabiy hindi man ninyo napunang ako'y nasa dulaan; sa buong 
	itinagal ng palabas ay minamatyagan ko kayo at hindi ninyo hinihiwalayan ng 
	tingin iyong mga babaeng <i xml:lang="fr" lang="fr">cochers</i>....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagkapalit ang 
	kalagayan; si Isagani na naparoon upang humingi ng paliwanag ay siya pang 
	nagbigay at sumaligaya siyang lubos ng tinuran ni Paulita na siya'y 
	pinatatawad. Tungkol sa pagkakaparoon ng babae sa dulaan, ay dapat pang 
	pasalamatan sa kanya; siya, sa kapipilit ng inali, ay pumaroon lamang sa 
	pag-asang makikita ang binata sa buong palabas. Gaano ang pagkutya niya kay 
	Juanito Pelaez!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang aking ali 
	ang nakakaibig!--ang sabi na kasabay ang masayang halakhak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kapuwa 
	nagtawanan; ang pagkakasal ni Pelaez kay Aling&nbsp;Victorina ay ipinagkatuwa 
	nilang mabuti at halos namamalas na nilang nangyari; ngunit naalala ni 
	Isagani na si Don Tiburcio ay buhay at ipinagkatiwala ang lihim 
	sa kanyang giliw, matapos na mapapangakong hindi sasabihin kahit kanino. Si 
	Paulita'y nangako, ngunit sa sariliy tangka ang sabihin sa kaibigan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang bagay na 
	ito'y siyang naglipat ng usapan sa bayan ni Isagani, na nalilibid ng 
	kagubatan at nalalagay sa baybayin ng dagat na nag-uumugong sa paanan ng 
	matataas na talampas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mata ni 
	Isagani ay nagliliwanag sa pagbanggit sa liblib na sulok na iyon; ang sigaw 
	ng pagmamakatangi ay nagpapapula sa kanyang pisngi, nanginginig ang kanyang 
	boses, ang kanyang damdaming makata ay sumusulak at ang mga salita'y 
	pumupulas na mainit, puno ng sigabo na waring ang pag-ibig ng kanyang 
	pag-ibig ang tinuturan, kaya't hindi nakapigil sa <span class="locked">
	pagbulalas ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oh! Sa ilang 
	ng aking mga kabundukan ay dinadanas ko ang pagkamalaya, malayang gaya ng 
	simuy, gaya ng liwanag na walang sagkang kumakalat sa sangsinukob! Libo mang 
	bayanan, libo mang palasyo ay ipagpapalit ko sa sulok na iyon ng Pilipinas, 
	na malayo sa mga tao, ay dinadanas ko ang tunay na kalayaan! Doon, kaharap 
	ang mga sadyang likas, kaharap ng hiwaga at ng walang katapusan; ng 
	kagubatan at ng karagatan, ay nag-iisip ako, nagsasalita at gumagawa nang 
	gaya ng isang taong walang kinikilalang panginoon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Paulita, sa 
	harap ng gayong sigabo ng kalooban dahil sa bayang kinakitaan ng unang 
	liwanag, sigabong hindi kilala, siya na hirating makadinig ng pag-alipusta 
	sa kanyang bayan at maminsan minsang siya'y nakikiayon sa gayon, ay 
	nagpahalata ng kaunting wariy panibugho sa paraang paghihinampo na gaya ng 
	dati.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit madali 
	siyang napapayapa ni Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo!--ang 
	sabi--siya'y iniibig ko ng higit sa lahat ng bagay noong hindi pa kita 
	nakikilala! Ibig na ibig ko ang magliklik sa kagubatan, humimbing sa lilim 
	ng mga puno, umupo sa ungos ng isang talampas upang saklawin ng tingin ang 
	Pasipiko na sa harapan ko'y hinahalo ang kanyang mga bughaw na alon, at 
	inihahatid sa akin ang mga awit na natutuhan sa mga dalampasigan ng malayang 
	Amerika.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Bago kita makilala, ang dagat na iyon ay siyang aking mundo, 
	aking lugod, aking pag-ibig, aking mga pangarap. Kapag nahihimbing ng 
	mapayapa at ang araw ay nagniningning sa kaitaasan, ay ikinalulugod ko ang 
	pagtanaw sa banging nasa sa aking paanan na may limangpung metro ang lalim, 
	at hinahanap ko ang mga kahangahangang hayop sa kagubatan ng mga bulaklak ng 
	bato at mga korales na naaaninag sa bughaw na tubig, ang malalaking 
	serpiente na, alinsunod sa sabi ng mga taong bukid, ay umaalis umano sa 
	gubat upang manahanan sa dagat at doo'y magpakalakilaki.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa kinahapunan, 
	na, umano'y, siyang paglabas ng mga sirena, ay sinusubukan kong masigasig sa 
	pag-itan ng mga alon, na minsan, ay waring namalas ko sila sa gitna ng bula 
	at doo'y nangaglalaro; maliwanag na nadidinig ko ang kanilang mga awit, 
	awit na ukol sa kalayaan, at naulinigan ko ang tunog ng kanilang mataginting 
	na alpa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Noong araw ay dumadaan ako ng mahahabang sandali sa pagmamalas ng 
	pagbabagobagong anyo ng mga ulap, sa pagmamalas sa punong nag-iisa sa 
	kapatagan, sa isang talampas, na hindi ko maunawa ang sanhi ng pagkakagayon, 
	na hindi makilalang lubos ang damdaming yaon na ginigising sa aking 
	kalooban. Madalas na ako'y pinagsasalaysayan ng mahahabang pangaral ng aking 
	amain at sinasabing dadalhin ako sa isang manggagamot dahil sa baka ako'y 
	magkaroon ng sakit na mapanglawin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Datapwa'y nakita kita, kita'y inibig, at 
	sa pagpapahingang ito sa pag-aaral ay waring may isang bagay na wala sa akin 
	ng ako'y naroon, ang kagubatan ay madilim, malungkot ang ilog na umaagos sa 
	kagubatan, ang dagat ay nakaiinip, ang abot ng malas sa dakong kalookan ay 
	walang anumang bagay.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At! kung maparoon ka lamang doon, kahit miminsan, 
	kung tungtungan ng mga paa mo ang mga landas na iyon, kung kanawin ng dulo 
	ng iyong mga daliri ang tubig ng mga batisan, kung tingnan mo ang dagat, 
	maupo ka sa talampas at pahigingin mo ang hangin sa pamamagitan ng iyong 
	mahihimig na awit, ang aking kagubatan ay magiging Eden, ang agos ng batisan 
	ay aawit, sisipot ang liwanag sa kusim na dahon, magiging batong brillante 
	ang mga patak ng hamog at magiging perlas ang mga bula ng dagat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit 
	nadinig ni Paulita na upang makarating sa bayan ni Isagani ay kailangang 
	magdaan sa mga bundok na maraming maliliit na linta, at dahil sa bagay na 
	ito, ay kinikilig na ang duwag. Dahil sa gawi na niya ang ayaw mapagod at sa 
	dahilang siya'y malayaw ay sinabing maglalakbay lamang siya kung 
	naka-karwahe o naka-tren.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani, na 
	nakalimot na sa lahat ng kanyang mapait na pagpapalagay sa mga bagay bagay 
	at wala nang nakikita sa lahat ng dako kundi bulaklak na walang tinik, ay
	<span class="locked">sumagot na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa loob ng di 
	mahabang panahon ang lahat ng pulo'y makakalatan ng mga daang bakal,</font></p>
	<div class="poem-container">
		<blockquote class="poem">
			<div class="stanza">
				<div class="i2">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Na lubhang matulit</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					halos parang hangin</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					na pagdaraanan</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					niyong <i xml:lang="es" lang="es">ferro-carril</i>,</font></div>
			</div>
		</blockquote>
	</div>
	<p class="conti-para" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">gaya ng sabi ng 
	isang sumulat; at sa gayon, ang mga sulok ng sangkapuluan ay mabubuksan sa 
	lahat....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa gayon, 
	ngunit kailan? Kung ako'y hukluban na....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah! Hindi mo 
	batid ang magagawa natin sa loob ng ilang taon--ang sagot ni Isagani--hindi mo 
	batid ang lakas at ang sigabo na maibibigay ng bayan matapos ang daan daang 
	taong pagkahimbing.... Nililingap tayo ng Espa&ntilde;a; ang kabinataan nating nasa 
	Madrid ay gumagawa gabit araw at iniuukol sa tinubuan ang buo nilang 
	katalinuhan, ang lahat ng sandali ng kanilang kabuhayan, ang lahat ng 
	kanilang kaya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga mahahabaging tinig doon ay nakikisapi sa ating 
	tinig, mga politiko na nakababatid na walang mabuting bigkis kundi ang 
	pag-iisa sa kabuhayan at sa damdamin: kinikilala ang ating katwiran at ang 
	lahat ng bagay ay nagpapahiwatig ng isang magandang kinabukasan ng madla.... 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Tunay nga at katatapos pa lamang na kapagtitikim ng isang munting pagkabigo, 
	kaming mga nag-aaral, ngunit ang tagumpay ay unti-unti nang lumalaganap sa 
	lahat ng layunin.... nasa sa budhi na ng lahat! Ang taksil na pagkatalong 
	aming tinamo ay nagpapatunay ng mga huling hinga, ng huling kilig ng 
	mamamatay! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Bukas ay mamamayan kami ng Pilipinas na maganda na ang tutunguhin 
	sapagka't malalagay sa mga mairuging kamay. Oo! ang kinabukasan ay amin, 
	nakikinikinita ko nang kulay rosa, nakikinikinita kong ang pagkilos ay 
	magbibigay buhay sa dakong ito na laong panahong patay, nahihimbing.... 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nakikinikinita ko ang pagsipot ng mga bayan sa kalapit ng mga daang bakal, 
	at sa lahat ng pook ay may mga pagawaan na gaya noong nasa Mandaluyong!.... 
	Nadidinig ko na ang pagsipol ng bapor, ang dagundong ng mga tren, ang ugong 
	ng mga makina.... namamalas kong pumapaitaas ang usok, ang kanyang malakas 
	na hinga, at nalalangap ko ang amoy ng langis; ang pawis ng mga 
	kahangahangang kasangkapan na walang tigil sa paggawa.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang daongang iyan, 
	na may mahinang pagkayari, ang ilog na iyan na wariy pinaghihingaluan ng 
	pangangalakal, ay makikita nating puno ng albor at maglalarawan sa atin ng 
	panahon ng taglamig sa kagubatan ng Europa.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang malunas na simoy na ito 
	at ang malilinis na batong iyan ay mapupuno ng uling, ng mga kaha at 
	barriles na gawa ng tao; datapwa'y walang kailangan! maglalakbay tayo ng 
	madalian, sa mga maluluwag na sasakyan, upang hanapin sa dakong loob ang 
	ibang simuy, ang ibang tanawin sa ibang dalampasigan, mga lalong malalamig 
	na singaw sa mga paanan ng kabundukan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga <i xml:lang="es" lang="es">
	acorazado</i> ay siyang magbabantay sa ating mga baybayin: ang pilipino at 
	ang kastila ay mag-uunahan sa pagpupunyaging gapiin ang anumang pagdagsa ng 
	mga taga ibang lupain, upang ipagtanggol ang inyong mga tahanan at bayaan 
	kayong matuwa at mabuhay ng mapayapa, na ginigiliw at iginagalang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ligtas na 
	sa paraang panghihitit, walang sama ng loob at pag-aalinlangan, ang bayan ay 
	gagawa na, sapagka't kung magkakagayon ay hindi na makaduduhagi ang paggawa, 
	hindi na magiging pangangayupapa, na wariy takda sa alipin. Sa gayon ay 
	hindi na pasasamain ng kastila ang kanyang ugali sa tulong ng mga hangaring 
	maghariharian at, tapat ang tingin, malusog ang puso, ay mag-aabutan kami ng 
	kamay, at ang pangangalakal, ang paggawa, ang pag-aani, ang karunungan ay 
	magnanawnaw sa lilim ng kalayaan at ng mga kautusang tuwid at pantay pantay 
	na gaya ng sa mayamang Inglaterra......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Paulita ay 
	nangingiting wariy alinlangan at iniiling ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pangarap, 
	pangarap!--ang buntong hininga--nadinig kong sinasabi na kayo'y maraming 
	kalaban.... Ang sabi ni tia&nbsp;Torina ay alipin magpakailan man ang bayang ito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't ang 
	ali mo'y isang hangal; sapagka't hindi maaaring siya'y mabuhay nang walang 
	alipin, at kung wala siya noon ay pinapangarap ang sa darating na panahon, 
	at kung hindi mangyari ay binubukobuko sa sariling gunita. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Tunay ngang 
	mayroon kaming mga kalaban, na magkakaroon ng tunggalian, ngunit kami ang 
	magtatagumpay. Mangyayaring gawing walang wastong kanlungan ng matandang 
	kaparaanan ang mga durog na muog ng kanilang mga kastilyo, amin silang 
	gagapiing umaawit ng kalayaan, sa harap ng inyong mga malas, sabay sa 
	pagakpak ng inyong mga kamay na aming minamahal! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa isang dako'y hindi ka 
	dapat manganib; ang labanan ay mapayapa; sukat na ang iaboy lamang ninyo 
	kami sa pag-aaral, gisingin ninyo sa amin ang marangal at mataas na 
	pag-iisip at udyukan ninyo kami sa pagtataman, sa kagitingan, na ang 
	pinakagantiy ang inyong paggiliw!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Taglay din ni 
	Paulita ang kanyang ngiting mahiwaga at waring nag-iisip; nakatanaw sa dako 
	ng ilog, at tinatapiktapik ng pamaypay ang pisngi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At kung wala 
	kayong mapala?--ang tanong na waring hindi pinahahalagahan nang gaano ang 
	usapan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tanong na 
	ito'y nakasugat kay Isagani; tinitigan ang mga mata ng kanyang irog, 
	dahandahang piniglan ang isang kamay at nagwikang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pakingan mo: 
	kung wala kaming mapala.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nahintong 
	nag-aalinlangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pakingan mo, 
	Paulita,--ang patuloy--batid mo kung gaano ang aking pagsinta at pagsamba sa 
	iyo; alam mong nalilimot ko ang sarili kung ako'y iyong tinititigan, kapag 
	nababakas ko sa titig na iyan ang isang kislap ng pag-ibig.... gayon man, 
	kapag wala kaming napala, ay papangarapin ko ang isa mo pang titig at 
	mapalad akong mamamatay upang ang isang liwayway lamang ng pagmamalaki ay 
	sumilay sa iyong mga mata at masabi mo sa balang araw, sa lahat, kasabay ng 
	pagtuturo sa aking bangkay, na: ang aking pag-ibig ay namatay sa 
	pagsasanggalang ng mga karapatan ng aking bayan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Halinang 
	umuwi, ineng, at baka ka sipunin!--ang sigaw ng sandaling iyon ni 
	Aling&nbsp;Victorina.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang boses na 
	iyon ay nagpabalik sa kanila sa katunayan ng buhay. Yaon na ang oras ng 
	pag-uwi, at sa kagandahang loob, ay inanyayahang lumulan sa sasakyan si 
	Isagani, anyayang hindi na inantay ng binata na ulitin pang muli. Sa 
	dahilang ang karwahe ay kay Paulita, ay umupo sa paharap si Aling&nbsp;Victorina 
	at ang kaibigan, at sa bangkong maliit ang dalawang magsing-irog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lulan ng 
	iisang sasakyan, makasiping ang ginigiliw, langapin ang bango, masagi ang 
	sutla ng damit, makitang nag-iisip, na nakahalukipkip, naliliwanagan ng 
	buwan sa Pilipinas na nagbibigay kagandahan at dingal sa anumang bagay na 
	lalong lubasa, ay isang pangarap na hindi inantay ni Isagani na mangyari 
	magpakailan man! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Napakamaralita ng mga pauwing naglalakad, na nangag-iisa, 
	at nangagsisiilag upang paraanin ang matuling sasakyan! Sa hinaba haba ng 
	dinaanang iyon, sa buong haba ng baybayin, ng liwaliwan ng Sabana, ng tulay 
	ng Espa&ntilde;a, ay walang nakita si Isagani kundi isang magandang ulong 
	nakatagilid, na mainam ang pusod, na nagtatapos sa isang sunudsunurang liig 
	na nawawala sa mga guyon ng pinya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang brillante ang kumikindat sa kanya 
	mula sa pingol ng munting tainga, na wariy bituin sa gitna ng mga 
	pinilakang ulap. Si Isagani ay nakaringig ng malayong uliyaw na itinatanong 
	sa kanya si Don Tiburcio de&nbsp;Espada&ntilde;a, ang pangalan ni Juanito 
	Pelaez, ngunit sa ganang kanya ay naging wariy tunog ng kampanang 
	nadidinig na malayo, magulong tinig na nadidinig sa gitna ng 
	bungang-tulog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinailangan 
	ang ipaalaala sa kanya na nakarating na sila sa liwasan ng <abbr>Sta.</abbr>&nbsp;Cruz.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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