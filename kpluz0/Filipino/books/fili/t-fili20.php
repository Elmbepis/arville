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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XX. Ang Nagpapalagay</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay ang 
	sinabi ni Padre Irene: ang ukol sa akademia ng wikang kastila, na 
	malaon nang iniharap, ay tumutungo na sa isang pagkalutas. Ang masipag na si Don Custodio, alinsunod kay Ben-Zayb, ay siyang 
	tumutungkol sa kanya at dinadaan ang mga maghapunan sa pagbabasa sa mga 
	kasulatan at nakakatulog nang walang naipapasiyang anuman: babangon sa 
	kinabukasan, gayon din ang gagawin, matutulog na muli at sunod sunod na 
	gayon ang nangyayari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gaano ang iginagawa ng kaawaawang ginoo, ang lalong 
	masipag sa lahat ng nagpapalagay sa Sangsinukob! Ibig niyang makalusot doon, 
	sa paraang mabigyang loob ang lahat, ang mga prayle, ang mataas na kawani, 
	ang kondesa, si Padre Irene at ang kanyang mga pagkukurong 
	labusaw. Nagtanong kay <abbr>Gi</abbr>noong Pasta at siya'y hinilo at linito ni
	<abbr>Gi</abbr>noong Pasta matapos na mahatulan siya ng isang yutang bagay na 
	magkakalaban at hindi mangyayari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nagtanong kay Pepay na mananayaw, at ang 
	mananayaw na si Pepay, na hindi nakatatarok ng pinag-uusapan, ay umikot ng 
	isang ikot, hiningan siya ng dalawampu't limang piso upang ipagpalibing sa 
	isang ali niya na biglang kamamatay ng ikalimang pagkamatay, o 
	ipagpapalibing sa ikalimang ali na namatay sa kanya, alinsunod sa lalong 
	masaklaw na paliwanag, matapos na mahinging mapasok na
	<i xml:lang="es" lang="es">auxiliar de fomento</i> ang isa niyang pinsang 
	lalaki na marunong bumasa, sumulat at tumugtog ng biyulin, mga bagay bagay na 
	pawang malayong makapag-bigay kay Don Custodio ng isang hakang 
	makapagliligtas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makaraan ang 
	dalawang araw ng pangyayari sa periya sa Kiyapo, ay gumagawa si Don Custodio, 
	na gaya ng dati, na pinag-aaralan ang mga kasulatan na hindi matagpo ang 
	kailangang panglutas. Datapwa'y samantalang naghihikab, umuubo, humihitit ng 
	tabako at inaalaala ang mga ikot at mga hita ni Pepay, ay babanggitin namin 
	ang ilang bagay ng mataas na taong ito, upang makilala ang katwiran na kung 
	bakit siya ang ipinalagay ni Padre Sibyla na lumutas ng matinik na 
	salitaan at kung bakit tinanggap naman ng kabilang pangkat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si
	<span xml:lang="es" lang="es">Don Custodio de Salazar y Sanchez 
	de&nbsp;Monteredondo</span>&nbsp;(<abbr title="palayaw">p.</abbr>)
	<span xml:lang="es" lang="es">Buenatinta</span> ay nalalahok diyan sa bahagi 
	ng sosyedad sa Maynila na hindi nakakikilos ng isang hakbang na hindi 
	sinasabitan sa likod at harap ng mga pamahayagan ng libo libong bansag at 
	tinatawag siyang <i>walang kapaguran</i>, <i>bantog</i>, <i>maingat</i>, <i>
	masipag</i>, <i>malirip</i>, <i>matalino</i>, <i>bihasa</i>, <i>mayaman</i>,
	<abbr>ibp.</abbr>, na waring ipinangingilag na ipagkamali sa ibang may gayon 
	ding pangalan at bansag na bulakbol at mangmang. At saka wala namang 
	kasamaang iaanak ang gayon at hindi nagagambala ang
	<i xml:lang="es" lang="es">previa censura</i>. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang
	<i xml:lang="es" lang="es">Buena Tinta</i> ay galing sa kanyang 
	pakikipagkaibigan kay Ben-Zayb, nang ito, sa dalawang matunog na 
	pakipagtunggali na inabot ng buwanan at lingguhan sa mga tudling ng 
	pahayagan ukol sa kung nararapat o hindi gumamit ng sombrerong
	<i xml:lang="es" lang="es">hongo</i>, <i xml:lang="es" lang="es">de copa</i> 
	o salakot, at kung ang paggamit ng ukol sa marami ng salitang
	<i xml:lang="es" lang="es">caracter</i> ay dapat maging
	<i xml:lang="es" lang="es">caracteres</i> at hindi
	<i xml:lang="es" lang="es">caracteres</i>, upang patibayan ang kanyang mga 
	pangangatwiran ay lumulusot kailan man sa mga salitang '<i xml:lang="es" lang="es">constanos 
	de buena tinta</i>', '<i xml:lang="es" lang="es">lo sabemos de buena tinta</i>' 
	at <abbr>ibp.</abbr> at napag-alaman pagkatapos, sapagka't sa Maynila ay 
	napag-aalaman ang lahat ng bagay, na ang <i xml:lang="es" lang="es">buena 
	tintang</i> ito ay dili iba't si <span xml:lang="es" lang="es">Don Custodio 
	de&nbsp;Salazar y&nbsp;Sanchez de&nbsp;Monteredondo</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Batang bata pa 
	ng dumating sa Maynila, na may isang mabuting katungkulan na siyang 
	nakapagparaan sa kanyang makapag-asawa sa isang magandang mestisa na isa sa 
	mga magkakaanak na lalong mayaman sa siyudad. Sapagka't may likas na 
	katalinuhan, kapangahasan at walang pagkatigatig, ay natutong samantalahin 
	ang lipunang kanyang kinalalagyan, at sa tulong ng salapi ng kanyang asawa 
	ay nangalakal at tumanggap ng anumang pagawa ng Pamahalaan at ng 
	Ayuntamiento, kaya't ginawa tuloy siyang konsehal, pagkatapos ay alkalde, 
	kagawad ng <span xml:lang="es" lang="es">Sociedad Economica de Amigos del 
	Pais</span>, kasangguni ng Pangasiwaan, Pangulo ng Lupong Nangangasiwa sa
	<span xml:lang="es" lang="es">Obras Pias</span>, kagawad sa Lupong ng 
	Kawanggawa, <i xml:lang="es" lang="es">conciliario</i> ng
	<span xml:lang="es" lang="es">Banco Espa&ntilde;ol Filipino</span>, at iba't iba 
	pa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At huwag akalaing ang iba't iba pang ito ay kagaya ng karaniwang 
	inilalagay matapos na mabanggit ang isang mahabang tala ng mga kabunyian: si
	Don Custodio, kahit hindi nakatunghay kailan man ng anumang 
	aklat na ukol sa <i xml:lang="es" lang="es">Higiene</i>, ay nakasapit 
	hanggang sa pagiging pangalawang pangulo ng <span xml:lang="es" lang="es">
	Junta de Sanidad</span> sa Maynila, kahit tunay din naman na sa walong 
	bumubuo ng Lupon ay isa lamang ang kailangang maging manggagamot at ang 
	isang ito'y hindi mangyayaring maging siya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon di'y naging kagawad ng
	<span xml:lang="es" lang="es">Junta Central</span> sa pagbabakuna, na 
	binubuo ng tatlong manggagamot at pitong walang pagkabatid sa bagay na iyon, 
	na sa mga ito'y isa ang arsobispo at ang tatlo'y mga
	<i xml:lang="es" lang="es">provincial</i>: nakakapatid sa mga
	<i xml:lang="es" lang="es">cofradia</i> at <i xml:lang="es" lang="es">
	archicofradia</i>, at, gaya ng naunawa na natin, ay kagawad na magpapalagay 
	sa Kataastaasang Lupon ng Paaralang bayan na hindi laging kumikilos, mga 
	sanhing higit na sa kailangan upang balutin siya ng mga pamahayagan ng mga 
	palayaw, kailan ma't naglalakbay o nagbabahin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kahit na may 
	maraming tungkulin, si Don Custodio, ay hindi kabilang ng mga 
	natutulog sa mga pagpupulong at nasisiyahan nang kagaya ng mga kinatawang 
	kimi at tamad na makikiboto na lamang sa lalong marami. Hindi kagaya ng 
	maraming hari sa Europa na nagtataglay ng kabunyiang hari sa Jerusalem, 
	pinaghahari ni Don Custodio ang kanyang kalagayan at 
	sinasamantala ang lahat ng mapapakinabang dito, ikinukunot na mabuti ang 
	kilay, pinalalaki ang boses, umuubo sa pagsasalita at madalas na siya na 
	lamang ang umuubos ng isang pagpupulong dahil sa pagsasalaysay ng isang 
	kabuhayan, paghaharap ng isang panukala o paglaban sa isang kasama na 
	nakainipan niya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kahit hindi pa siya lumalampas sa apat na pung taon ay 
	nagsasalita na noong dapat daw magdahandahan sa paggawa ng anuman, na iwan 
	munang mahinog ang bubot na bunga ng <i xml:lang="es" lang="es">higuera</i>, 
	at idinudugtong na marahan mga milon!--nagsasalita ng ukol sa paglirip na 
	mabuti at paglakad ng marahan, ng pangangailangang kilalanin muna ang bayan, 
	na ang mga hilig ng indio ay paganito, na ang karangalan ng pangalang 
	kastila, na sa dahilang una muna ang mga kastila, na ang pananampalataya at
	<abbr>ibp.</abbr> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Naaalala pa sa Maynila ang isa niyang talumpati ng unang 
	ipalagay ang pag-iilaw ng petroleo, bilang kahalili ng dating langis ng 
	niyog: sa pagbabagong iyon ay hindi nakita ang pagkamatay ng paggawa ng 
	langis kundi ang tutubuin ng isang konsehal--sapagka't si Don Custodio 
	ay may matalas na pangamoy--at humadlang ng inubos ang lahat ng tunog ng 
	kanyang boses, na ipinalagay na ang panukala ay wala sa panahon at hinulaang 
	magkakaroon ng malalaking sakunang bayan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi rin huli sa kabantugan ang 
	kanyang paghadlang sa isang pananapatan na ibig gawin ng ilan sa isang 
	gobernador bago umalis: si Don Custodio na mayroong kaunting 
	sama ng loob dahil sa ilang paghiya sa kanya, na hindi na namin naaalala, ay 
	natutong ikalat ang balibalitang ang talang darating ay kalabang masidhi ng 
	aalis, bagay na ipinangamba ng mga mananapat kaya't hindi natuloy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang araw ay 
	hinatulan siyang bumalik sa Espa&ntilde;a upang magpagamot ng isang sakit sa atay 
	at binanggit siya ng mga pahayagan na wariy isang Anteo na nangangailangang 
	tumuntong sa Inang bayan upang kumuha ng mga panibagong lakas; ngunit ang 
	Anteong taga Maynila ay nangunti at nawalang kabuluhan sa Corte. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Doon ay 
	hindi siya gasino at hinahanaphanap ang kanyang mga kaibigibig na bansag. 
	Hindi siya nakahalobilo ng mga lalong mayayaman, ang kakulangan niya sa 
	pinag-aralan ay hindi makapagbigay sa kanya ng malaking kahalagahan sa mga 
	lipunang ukol sa karunungan at mga akademia, at dahil sa kanyang pagkakahuli 
	at pagtataglay ng politikang kombento ay litong umaalis sa mga lipunan, 
	walang kasiyahang loob, muhi, at walang malinawan kundi ang doo'y kinukunan 
	ng kuwalta ang tanga at doo'y malakas ang sugal. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Inaalala ang kanyang 
	masunuring mga utusan sa Maynila na nangagtitiis sa lahat ng kanyang 
	nakayayamot na maibigan, at sa gayon ay nakikita niyang ang mga yaon ay 
	siyang mabuti; sa dahilang sa taglamig ay nangailangan siyang maglalapit sa 
	dupaan at kung hindi'y makasasagap ng isang pamamaga ng baga ay 
	ipinagbubuntong hininga ang pag-aalala sa taglamig sa Maynila na sukat na 
	ang magtaglay ng isang <i xml:lang="es" lang="es">bufanda.</i> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Wala ang 
	kanyang hiligan at ang batang tagapamaypay kung taginit; sa isang sabi, sa 
	Madrid ay naging isa siya sa mga pangkaraniwan, at, kahit na mayroon siyang 
	mga brillante, minsan ay pinagkamalan siyang <i xml:lang="es" lang="es">
	paleto</i> na hindi marunong umimbay, at minsan ay pinagkamalan siyang
	<i xml:lang="es" lang="es">indiano</i>, kinutya ang kanyang mga 
	pagnganganingani at talampak siyang inuto ng ilang mangungutang na kanyang 
	hiniya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Muhi sa mga <i xml:lang="es" lang="es">conservador</i>, na hindi 
	pinahalagahan ang kanyang mga payo, na gaya rin naman sa mga kakabitkabit sa 
	kanyang humihitit sa kanyang bulsa, ay sumapi sa pangkating <i>liberal</i>, 
	at bago matapos ang taon ay bumalik sa Pilipinas, na, kung hindi man 
	magaling na sa sakit sa atay ay gulong gulo naman ang paghahaka.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang labing 
	isang buwang ipinamuhay niya sa Corte na dinaang kahalobilo ng mga 
	politikong tindahan, mga walang pinapasukan ang lahat halos. Ang ilang 
	talumpating nadinig sa mga suloksulok, ang gayon o ganitong lathalang laban 
	sa pamamahala at lahat noong pamumuhay sa politika na nalalangap doon, mula 
	sa pagupitan, sa pag-itan ng mga paggupit ng Figaro, na naghahayag ng 
	kanyang patakaran, hanggang sa mga pigingan na pinaghahayagan, sa 
	pamamagitan 
	ng maiinam na pagsasalaysay at mga nakabibighaning banggit ng mga sarisaring 
	kulay ng mga pananalig sa suliraning bayan, ang mga pagkakaiba, mga 
	pagtiwalag, mga di kasiyahang loob, at <abbr>iba pa.</abbr></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											<abbr>A</abbr>ng lahat ng iyon, 
	samantalang siya'y lumalayo sa Europa, ay muling nabubuhay nang lubhang 
	malusog sa kanyang alaala, na wariy binhing natanim, na napipiglang lumaki 
	ng mga malalabay na punong nakatatakip, kaya't ng dumaong sa Maynila ay 
	inakalang ito'y maiaayos niya, at gayon nga, taglay ang lalong banal na 
	adhika at ang lalong malilinis na mithi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga unang 
	buwan ng kanyang pagdating ay wala nang nababanggit kundi ang Madrid, ang 
	kanyang mabubuting kaibigan, ang ministrong si ganoon, ang naging ministrong 
	si ganito, ang kinatawang&nbsp;C, ang manunulat na si B.; walang pangyayari sa 
	politika, mga kagusutan sa <i xml:lang="es" lang="es">Corte</i>, na hindi 
	niya batid ang lalong kaliitliitang pangyayari, ni mga taong bantog na hindi 
	niya kilala ang lihim ng kabuhayan, ni walang nangyaring hindi niya hinulaan 
	ni paglalathala ng isang pagbabagong hindi muna isinanguni sa kanya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang 
	lahat ng ito'y may kalahok na pagsundot sa mga <i xml:lang="es" lang="es">
	conservador</i>, na taglay ang tunay na pagkasuklam, pagpupuri sa pangkating
	<i>liberal</i>, isang kabuhayan dito, isang salita doon ng isang bantog na 
	tao, na ipinapatlang, na waring hindi kinukusa, ang mga pag-aalog sa kanya 
	at mga tungkuling hindi tinanggap upang huwag lamang magkaroon siya ng ano 
	mang utang na loob sa mga <i xml:lang="es" lang="es">conservador</i>. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Napakalaki ang kapusukan niya ng mga unang araw na iyon, na ang ilan sa 
	kausap-usap sa tindahan ng mga sarisaring kakanin na dinadalaw niyang 
	maminsanminsan ay nangagsisapi sa pangkating liberal, at nagpanggap nang 
	liberal si Don Eulogio Badana, <i><span xml:lang="es" lang="es">
	sargento retirado</span> sa <span xml:lang="es" lang="es">carabinero</span></i>; 
	ang marangal na si Armendia, piloto at matalik na <i xml:lang="es" lang="es">
	carlista</i>; si Don Eusebio Picote, kawani sa aduana, at si 
	Don&nbsp;Bonifacio Tacon, sapatero at talabartero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, ang 
	mga sigabo, dahil sa kakulangan ng tunggalian at mga bagay na makapag-udyok, 
	ay unti-unting napawi. Hindi niya binabasa ang mga pamahayagang dumarating 
	sa kanyang buhat sa Espa&ntilde;a, sapagka't balubalutan kung tanggapin at ang 
	pagkakita noon ay nakapagpapahikab sa kanya; ang mga paghahakang kanyang 
	napulot na pawang gamit na, ay nangangailangan ng abuloy na dagdag, at doo'y 
	wala ang kanyang mga mananalumpati; at kahit na malalakas ang laro sa mga
	<i xml:lang="es" lang="es">casino</i> sa Maynila at mayroon ding 
	nangingristo, gaya ng sa mga lipunan sa Madrid, gayon man ay hindi naman 
	ipinahihintulot sa mga tinuran ang ano mang talumpati upang buhayin ang mga 
	imbot sa politika. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngunit si Don Custodio ay hindi tamad; 
	gumagawa ng higit sa pagnanasa lamang, kumikilos; at sa pagkakilala niyang 
	sa Pilipinas siya malilibing at sa pag-aakalang yaon ang kanyang 
	makikilusan, ay pinag-ukulan ng kanyang mga pagsusumikap at inakalang 
	mapabubuti sa pagbabalak ng maraming pagbabago at mga panukalang kawiliwili. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Siya, ang dahil sa nadinig sa Madrid ang pag-uusap ng ukol sa mga daang 
	nilalatagan nang kahoy sa Paris, na noon ay hindi pa ginagawa sa Espa&ntilde;a, ay 
	nagpalagay na gawin sa Maynila, sa paraang maglatag ng mga tabla sa mga 
	lansangan at ipagpako na gaya ng nakikita sa mga bahay-bahay; siya, ang 
	dahil sa mga kasawiang nangyayari sa mga sasakyang dadalawa ang gulong, at 
	upang maiwasan, ay ipinalagay na magtaglay ng tatlo man lamang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Siya rin 
	naman, ang samantalang gumaganap sa pagka pangalawang pangulo ng
	<span xml:lang="es" lang="es">Junta de Sanidad</span> ay nakaisip na wiligan 
	ng panglinis ang lahat ng bagay, sampu ng mga balitang pahatid kawad na 
	galing sa mga bayang may sakit na nakahahawa; siya rin ang, sa pagkahabag sa 
	mga presidiario na nangagsisigawa sa init ng araw at sa pagnanasang 
	makapagtipid ang Pamahalaan sa paggugol sa mga kasuotan noon, ay ipinalagay 
	na suotan na lamang ng isang bahag at pagawin sa gabi at huwag sa umaga. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nahahanga at namumuhi, na, ang kanyang mga palagay ay makatagpo ng 
	humahadlang; ngunit kinakalamay ang sarili pag naiisip na ang taong may 
	halaga, ay sadyang may kalaban, at naghihiganti naman siya sa paraang 
	pagtuligsa at pagpapawalang kabuluhan sa lahat ng panukala, maging masama o 
	maging mabuti, na iharap ng iba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sapagka't 
	ipinagmamalaki ang kanyang pagkalabusaw, kailan ma't matatanong siya kung 
	ano ang palagay sa mga indio ay karaniwang isagot na, nararapat sa mga 
	gawain sa kamay at mga <i xml:lang="es" lang="es">artes imitativas</i> (ang 
	ibig sabihin ay musika, pintura at eskultura), at idinadagdag ang kanyang 
	matandang pabuntot, na, upang makilala sila'y kailangang bumilang ng 
	maraming maraming taong pamumuhay sa lupaing yaon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, kung 
	nakadidinig na may napapabantog sa anuman na hindi dahil sa mga gawain sa 
	kamay o <i xml:lang="es" lang="es">arte imitativa</i>, sa kimika, sa 
	medisina o pilosopia, sa halimbawa, ay sinasabi niyang: Psh! maaari.... 
	hindi tanga! at sinasapantaha niya na ang indiong iyon ay may maraming 
	dugong kastila sa ugat; at kung hindi niya makitaan kahit na magpilit ay 
	humahanap naman ng isang pinanggalingang hapon: noon ay nagsisimula ang gawi 
	na iukol sa mga hapon at sa mga arabe ang anumang mabuting bagay na taglay 
	ng pilipino. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa kay Don Custodio, ang kundiman, ang balitaw, ang 
	kumintang ay mga tugtuging arabe, gaya rin naman ng mga titik sa pagsulat ng 
	matatandang pilipino, at sa bagay na ito'y wala siyang pag-aalinlangan, 
	kahit hindi niya kilala ang arabe, ni hindi man siya nakakita ng katitikang 
	pilipino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Arabe at 
	lubos na arabe!--aniya kay Ben-Zayb sa isang pagsasabing hindi matutulan--kung 
	dili man, ay intsik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At 
	idinudugtong pang may kindat na makahulugan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang wala, 
	walang bagay na sadyang likas ang mga indio, batid ninyo? Malaki ang 
	pagmamahal ko sa kanila; ngunit hindi sila dapat purihin, sapagka't 
	nangagmamalaki at nagiging mga kahabaghabag.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kung minsa'y 
	sinasabi na:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pinakamamahal 
	ko ang mga indio, ako'y lumalagay nang para nilang ama't tagapagtanggol, 
	ngunit kailangang ang bawa't bagay ay malagay sa nararapat kalagyan. Ang 
	iba'y ipinanganak upang mag-utos at ang iba'y upang sumunod; kung sa bagay 
	ay hindi masasabing malakas ang katunayang ito, datapwa'y ginagawa nang 
	walang maraming salitaan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At tingnan ninyo, ang paraan ay walang 
	kahiraphirap. Pag kailangan ninyong piglan ang bayan ay paliwanagan ninyong 
	siya'y pigil; tatawa sa unang araw, sa ikalawa'y tututol, sa ikatlo ay 
	mag-aalinlangan at sa ikaapat ay panalig na panalig na. Upang mapalagi ang 
	pilipino sa pagkamasunurin, ay kailangang uulit-ulitin sa kanya sa araw-araw 
	na siya'y gayon at pananaliging siya'y walang magagawa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa isang dako naman, 
	ay ano pa't mananalig siya sa ibang bagay kung masasawi lamang? Paniwalaan 
	ninyo ako, isang kawanggawa ang palagiin ang bawa't isa sa kalagayang 
	kinaroroonan; diyan naririyan ang kaayusan, ang pagkakasundo. Iyan ang lihim 
	ng <em>karunungan</em> sa pamamahala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kung tinutukoy 
	ni Don Custodio ang kanyang paraan sa pamamahala ay di na 
	nasisiyahan sa salitang <i>arte</i>. At pagsasabi niya ng <em>pamamahala</em> 
	ay iniuunat ang kamay na ibinababa hanggang sa taas ng isang taong 
	nakaluhod, nakaukod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tungkol naman 
	sa pananampalataya ay ipinagmamalaki ang kanyang pagkakatoliko, lubos na 
	katoliko, a! ang katolikang Espa&ntilde;a, ang lupain ni Maria Santisima!.... Ang 
	isang labusaw ay maaari at dapat maging katoliko doon sa pook na, 
	ipinalalagay sila ng mga kalaban ng pagkakasulong, na sila'y mga diosdiosan 
	o santo man lamang, gaya nang pangyayaring ang isang kayumanggi ay inaaring 
	maputi sa Kapreria. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, ay kumakain siya ng lamang kati sa buong 
	kurisma, tangi lamang sa <i xml:lang="es" lang="es">Viernes Santo</i>; hindi 
	nagkukumpisal kailan man, hindi naniniwala sa mga kababalaghan, ni sa hindi 
	pagkakamali ng Papa, at kung nagsisimba, ay nagsisimba sa ika sampu ng umaga 
	o sa lalong maikling misa, sa misa ng tropa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kahit sa Madrid ay nagsalita 
	siya ng laban sa mga pari, na ipinalalagay niyang lipas na sa kapanahunan, 
	upang huwag matiwali sa kanyang kinagigitnaan, nagsalita ng mga paglait sa
	<span xml:lang="es" lang="es">Inquisicion</span> at nagsasalaysay ng gayon o 
	ganitong kabuhayang malaswa o palibak na kinalalahukan ng mga habito, o, sa 
	lalong tiyakan, mga prayleng walang <i>habito</i>, gayon man, pagsasalita ng 
	ukol sa Pilipinas, na dapat pamahalaan ng alinsunod sa mga tanging batas, ay 
	umuubo, titingin ng isang titig na may kahulugan, uulitin ang paglalahad ng 
	kamay na kasingpantay ng taas na matalinghaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	prayle ay kailangan, sila'y isang bagay na masama, ngunit kailangan--ang 
	sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nagagalit 
	pag ang isang indio ay nangahas na mag-alinlangan sa mga kababalaghan o 
	hindi naniniwala sa Papa. Ang lahat ng pahirap ng
	<span xml:lang="es" lang="es">Inquisicion</span> ay hindi sapat na parusa sa 
	kapangahasang iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Kung ikinakatwiran sa kanya na ang panggagaga o ang mabuhay na sinasamantala 
	ang kamangmangan ay may iba pang tawag na masamang dinggin at pinaparusahan 
	kapag ang nagkakasala ay nag-iisa, ay lumulusot naman siya sa paraang 
	pagtukoy sa ibang bayang sakop.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kami--ang 
	sabi, na ang boses ay ang ginagamit sa mga seremonia--kamiy makapagmamalaki! 
	Hindi kami kagaya ng mga ingles at mga holandes, na upang mapanatili sa 
	pag-alinsunod ang mga bayan ay gumagamit ng pamalo.... ang aming ginagamit 
	ay ibang paraan na lubhang malumanay, lubhang matibay; ang malunas na tulong 
	ng mga prayle ay higit sa pamalong ingles......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang sabi 
	niyang ito'y lumaganap at sa mahabang panaho'y binanggit banggit ni Ben-Zayb 
	at gayon din ng buong Maynila; pinakapuripuri ng Maynilang naghuhulo. Ang 
	salita ay nakaabot sa Madrid, at binanggit sa Parlamento, na parang sabi ng 
	isang <em>labusaw na may mahabang paninirahan</em> at <abbr>iba </abbr>pa, at 
	sa dahilang naging karangalan ng mga prayle ang gayong paghahawig ay 
	hinandugan siya ng ilang arrobang sikulate, bagay na ipinabalik ng di 
	malamuyot na si Don Custodio, na, sa dahilang ito'y ipinantay 
	naman ni Ben-Zayb ang taglay na kabaitan sa kabaitan ni Epaminondas. 
	Datapwa't gayon man, ay gumagamit din ng yantok ang bagong Epaminondas kung 
	inaabot ng pagkagalit, at ang gayon ay inihahatol sa iba!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga araw 
	na iyon, ay inulit ng mga kombento ang kanilang mga handog dahil sa 
	pangangambang baka siya magbigay ng isang kapasiyahang sang-ayon sa 
	kahilingan ng mga nag-aaral, at ng hapong natagpuan natin siya ay lalo pa 
	manding hindi mapalagay kay sa dati sapagka't malapit masira ang kanyang 
	kabantugang masipag.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Mahigit nang 
	labing limang araw na nasa kamay niya ang mga kasulatan, at nang umagang 
	iyon, matapos na mapuri ang kanyang pagka masusi, ay itinanong ng mataas na 
	kawani ang kanyang kapasiyahan. Si Don Custodio ay sumagot ng 
	lubhang matalinghaga, na ang ibig sabihin ay yari na: ang mataas na kawani 
	ay ngumiti, at ang ngiting iyon ngayon ay gumagambala't umuusig sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gaya nang 
	sinabi na namin, ang hikab niya'y sunodsunod. Sa isang pagkilos niya, ng 
	sandaling idinidilat ang mga mata at inilalapat ang bibig, ay napatitig sa 
	mahabang hanay ng mga saping mapula, na ayos na ayos ang mga pagkakalagay sa 
	mainam na aklatang kamagong: sa mga gulugod ng bawa't isa'y may mga 
	malalaking titik na ang sinasabi, ay: <span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALA</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nalimot 
	sumandali ang kanyang mga kagipitan at ang mga pag-ikot ni Pepay, upang 
	alalahanin na ang lahat ng linalaman ng mga baitang na iyon ay pawang 
	sumipot sa kanyang palanak na ulo sa mga sandaling pagliliwanag. Gaano 
	karaming bungang isip na walang kamukha, gaano karaming maririlag na 
	pagkukuro, gaano karaming mga kaparaanang ikaliligtas sa pagsasalat ng 
	Pilipinas! Kailan pa man ay hindi na siya malilimot at tataglayin niya ang 
	pagkilala ng utang na loob ng bayan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Waring isang matandang magatod na nakatagpo ng isang balutang inaamag na mga 
	sulat sa palasintahan, ay tumindig si Don Custodio at lumapit sa lalagyan ng 
	mga aklat. Ang unang balangkap na makapal, magang-maga, punongpuno, ay may 
	taglay na tatak na '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>minumunakala</i>'.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag!--ang 
	bulong--may mga bagay na maiinam, ngunit kailangan ang sangtaon upang 
	mabasang muli.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang pangalawa, na makapalkapal din, ay may tatak na '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>nasa pagsusuri</i>.--Huwag din!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Pagkatapos noon ay sumusunod ang '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>ipinag-aantay ng panahon</i>.'.... 
	'<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>iniharap</i>....' '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>pinawalang kabuluhan</i>....' '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>pinagtibay</i>....' '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>pinigil</i>....' Ang mga huling 
	balangkap ay kakaunti ang laman, ngunit ang huli ay lalo pa, ang sa '<span class="smcap-fne">M<span class="smcap-f">GA</span></span>
	<span class="smcap-f">PANUKALANG</span> <i>isasagawa</i>'.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinislot ni
	Don Custodio ang kanyang ilong ano kaya ang laman? Nalimot na 
	niya ang nasa sa loob niyon. Isang putol na papel na naninilaw ang nakaungos 
	sa dalawang takip, na wariy dinidilaan siya ng balangkap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinuha sa 
	lalagyan at binuksan: yaon pala'y ang bantog na panukala ng Paaralang
	<span xml:lang="es" lang="es">Artes y Oficios</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A, 
	putris!--ang bulalas--ngunit ito'y nasa sa kamay na ng mga paring 
	agustino......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Walang ano 
	ano'y biglang tinapik ang kanyang noo, inihubog ang kilay, isang 
	pagtatagumpay ang nalarawan sa kanyang mukha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa heto pala 
	ang aking pasiya, C.!--ang bulalas na bumitiw ng isang mahalay na salitang 
	hindi ang <i xml:lang="en" lang="en">eureka</i>, ngunit nagsisimula sa 
	pangkatapusan nito--ang aking kapasiyahan ay <span class="locked">yari na.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At makalima o 
	makaanim na inulit ulit ang kanyang kinaugaliang <i xml:lang="en" lang="en">
	eureka</i>, na humaging sa hangin na wariy magalak na hagkis, at masayang 
	tinungo ang kanyang mesa at sinimulan ang pagsulat.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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