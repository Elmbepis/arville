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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">VI. Si Kapitan Tiago</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p class="sign" align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt"><i>Sundin naman ang loob mo 
dito sa lupa</i>!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantalang natutulog o nag-aagahan ang 
ating mga ginoo'y si Kapitan Tiago ang ating pag-usapan. Kailan ma'y hindi 
tayo naging panauhin niya, wala nga tayong katuwiran o katungkulang siya'y 
pawalang halaga at huwag siyang pansinin, kahi't sa mahalagang kapanahunan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Palibhasa'y pandak, maliwanag ang kulay, 
bilog ang katawan, at ang mukha, salamat sa saganang taba, na alinsunod sa mga 
nalulugod sa kanya'y galing daw sa langit, at anang mga kaaway niya'y galing 
daw sa mga dukha, siya'y mukhang bata kay sa tunay niyang gulang: sino ma'y 
maniniwalang tatatlompo't limang taon lamang siya. Taong banal ang laging anyo 
ng kanyang pagmumukha ng panahong nangyayari ang sinasaysay namin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang bao ng 
kanyang ulong bilog, maliit at nalalaganapan ng buhok na kasing itim ng 
luyong, mahaba sa dakong harapan at totoong maikli sa likuran; hindi nagbabago kailan man ng anyo ang kanyang mga matang maliliit man ay di singkit 
na gaya ng sa intsik, mahayap na hindi sapat ang 
kanyang ilong, at kung hindi sana 
pumangit ang kanyang bibig, dahil sa napakalabis na pagmamaskada niya at 
pagnganga, na sinisimpan ang sapa sa isang pisngi, na siyang nakasisira ng 
pagkakatimbang ng tabas ng mukha, masasabi naming totoong magaling ang kanyang 
paniniwala at pagpapasampalatayang siya'y magandang lalaki. Gayon mang 
napapakalabis ang kanyang pananabako't pagnganga ay nananatiling mapuputi ang 
kanyang mga sariling ngipin, at ang dalawang ipinahiram sa kanya ng dentista, 
sa halagang tiglalabing dalawang piso ang bawa't isa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ipinalalagay na siya'y isa sa mga lalong 
mga mayayamang 'propietario' 
sa Binundok, at isa sa lalong mga pangulong 'hakendero', 
dahil sa kanyang mga lupa sa Capampangan at sa Laguna ng Bay, lalonglalo na 
sa bayan ng San Diego, na doo'y itinataas taon taon ang buwis ng lupa. Ang San 
Diego ang 
lalong naiibigan niyang bayan, dahil sa kaligaligayang mga paliguan doon, sa 
balitang sabungan, o sa mga hindi niya nalilimot na kanyang naaalaala: doo'y 
natitira siya ng dalawang buwan sa bawa't isang taon, ang kadalian.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Maraming mga bahay si Kapitan Tiago sa 
Santo Cristo, sa daang Anloague at sa Rosario. Siya't isang intsik ang may hawak 
ng 'kontrata' ng opio at hindi nga kailangang sabihing sila'y nangagtutubo 
ng lubhang malaki. Siya ang nagpapakain sa mga bilanggo sa Bilibid at 
nagpapadala ng damo sa maraming mga pangulong bahay sa Maynila; dapat unawaing 
sa pamamag-itan ng 'kontrata.' </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Kasundo niya ang lahat ng mga pinuno, 
matalino, magaling makibagay at may pagkapangahas, pagka nauukol sa 
pagsasamantala ng mga pagka ilang ng iba; siya ang tanging 
pinanganganibang kapangagaw ng isang nagngangalang Perez, tungkol sa mga 'arriendo' at mga 
'subasta' ng mga sagutin o pangangatungkulang sa towi 
na'y ipinagkakatiwala ng gobyerno ng Filipinas sa mga kamay ng mga 'partikular'. 
Kaya nga't ng panahong nangyayari ang mga bagay na ito, si Kapitan Tiago'y 
isang taong sumasaligaya; ang ligaya bagang makakamtan sa mga lupaing iyon ng 
isang taong maliit ang bao ng ulo: siya'y mayaman, kasundo ng Diyos, ng 
gobyerno at ng mga tao.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Na siya'y kasundo ng Diyos, ito'y isang 
bagay na hindi mapag-aalinlanganan: halos masasabing marapat sampalatayanan: 
walang kadahilanan upang makagalit ng mabait na Diyos, pagka magaling ang kalagayan sa lupa, pagka sa 
Diyos ay hindi nakikipag-abot-usap kailan man, at kailan ma'y hindi nagpapautang sa 
Diyos ng salapi. Kailan ma'y hindi 
nakipag-usap sa Diyos, sa pamamag-itan ng mga pananalangin, kahi't siya'y na 
sa lalong malalaking mga pagkagipit; siya'y mayaman at ang kanyang salapi ang 
sa kanya'y humahalili sa pananalangin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga misa at sa mga 'rogativa'y' 
lumalang ang Diyos ng mga makapangyarihan at mga palalong mga sacerdote. 
Lumalang ang Diyos, sa kanyang walang hanggang kabaitan, ng mga dukha, sa 
igiginhawa ng mga mayayaman, mga dukhang sa halagang piso'y makapagdarasal ng kahi't labing anim na 
mga misterio at makababasa ng lahat ng mga santong 
libro, hanggang sa 'Biblia hebraika' kung daragdagan ang bayad. Kung dahil sa 
isang malaking kagipita'y manakanakang kinakailangan ang mga saklolo ng kalangitan at walang makita agad 
kahi't isang kandilang pula ng intsik, kung 
magkagayo'y nakikiusap na siya sa mga santo at sa mga santang kanyang 
pintakasi, at ipinangangako sa kanila ang maraming bagay upang sila'y 
mapilitan at lubos mapapaniwalaang tunay na magaling ang kanyang mga hangad. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't ang totoong lalo niyang pinangangakuan at ginaganapan ng mga pangako 
ay ang Birhen sa Antipolong Nuestra Se&ntilde;ora de la Paz y Buen Viaje; sapagkat sa 
ilang may kaliliitang mga santo'y hindi nga lubhang gumaganap at hindi rin 
totoong nag-uugaling mahal ang taong iyon; ang kadalasa'y pagka kinamtan na niya 
ang pinipita'y hindi na muling nagugunita ang mga santong iyon; tunay nga't 
hindi na naman sila muling liniligalig niya, at kung sakali't napapanaho'y 
talastas ni Kapitan Tiagong sa kalendario'y maraming mga santong walang ginagawa sa langit marahil. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Bukod sa roo'y sinasapantaha niyang 
malaki ang kapangyariha't lakas ng Birhen de Antipolo kay sa mga ibang Birheng may dala 
mang bastong pilak, o mga Ni&ntilde;o Jesus na hubo't hubad o may pananamit, o mga 
eskapulario, mga kuintas o pamigkis na kuero ('korrea'): marahil ang 
pinagmumulaan nito'y ang pagka hindi mapalabiro ang Ginoong Babaeng iyon, 
mapagmahal sa kanyang pangalan, kaaway ng 'fotografia', 
ayon sa sakristan mayor sa Antipolo, at saka, pagka siya'y nagagalit daw ay nangingitim na kawangis ng luyong, at nanggagaling naman sa ang ibang mga Birhen ay may 
kalambutan ang puso at mapagpaumanhin: talastas ng may mga taong 
iniibig pa ang isang haring 'absoluto' 
kay sa isang haring 'konstitucional', 
kung hindi nariyan si Luis Catorke 
at si Luis Diez y Seis, 
si Felipe Segundo 
at si Amadeo Primero. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa kadahilanan ding ito marahil kaya may nakikitang mga 
											intsik na di binyagan at 
sampung mga kastilang lumalakad ng paluhod sa balitang sambahan; 
at ang hindi lamang napag-uusisa pa'y ang kung bakit nangagtatanan ang mga kurang dala ang salapi ng 
kasindaksindak na Larawan, napasa sa Amerika at 
pagdating doo'y napakakasal.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang pintuang iyan ng salas, na natatakpan 
ng isang tabing na sutla ay siyang daang patungo sa isang maliit na kapilla o 
panalanginang di dapat mawala sa alin mang bahay ng filipino: naririyan ang 
mga 'dios lar' 
ni Kapitan Tiago, at sinasabi naming mga 'dios lar,' sapagkat lalong 
minamagaling ng ginoong ito ang 'politeismo' 
kay sa 'monoteismo' 
na kailan ma'y hindi niya naabot ng pag-iisip. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Doo'y may napapanood na mga 
larawan ng 'Sakra Familia' 
na pawang garing mula, sa ulo hangang dibdib, at gayon din ang mga dakong dulo 
ng mga kamay at paa, kristal ang mga mata, mahahaba ang mga pilik mata at kulot at 
kulay ginto ang mga buhok, magagandang yari ng eskultura sa Santa 
Cruz. mga kuadrong pintado ng oleo ng mga artistang taga Pako at taga 
Ermita, na ang naroroo'y ang mga pagpapasakit sa mga santo, ang mga himala ng 
Birhen at iba pa; si Santa Lukiang nakatitig sa langit, at hawak ang isang 
pinggang kinalalagyan ng dalawa pang matang may mga pilik-mata at may mga 
kilay, na katulad ng napapanood na nakapinta sa 'triangulo' ng Trinidad 
o sa 
mga 'sarkofago egipkio'; 
si San Paskual Baylon, San Antonio de Padua, na may habitong gingon at 
pinagmamasdang tumatangis ang isang Ni&ntilde;o Jesus, na may damit Kapitan Heneral, 
may trikornio, 
may sable at may mga botang tulad sa sayaw ng mga musmos na bata sa Madrid: 
sa ganang kay Kapitan Tiago, ang kahulugan ng gayong anyo'y kahi't idagdag ng 
Diyos sa kanyang kapangyarihan ang kapangyarihan ng isang Kapitan General sa 
											Pilipinas, ay paglalaruan din siya ng mga frankiskano, na katulad ng 
paglalaro sa isang 'mu&ntilde;eka' o larauang taotauhan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Napapanood din doon ang isang 
San Antonio Abad, na may isang baboy sa tabi, at ang isip ng karapatdapat na 
Kapitan, ang baboy na iyo'y makapaghihimalang gaya rin ni San Antonio, at sa 
ganitong kadahilana'y hindi siya, nangangahas tumawag sa hayop na iyon ng 'baboy' 
kung di 'alaga ng santo se&ntilde;or San Antonio;' isang San Francisco de Asis na may 
pitong pakpak at may habitong kulay kafe, na nakapatong sa ibabaw ng isang San 
Vicente, na wala kung di dadalawang pakpak, nguni't may dala namang isang kornetin; isang San Pedro Martir na biyak ang ulo, at tangan ng isang di 
binyagang nakaluhod ang isang talibong ng tulisan, na na sa tabi ng isang San 
Pedro na pinuputol ang tainga ng isang moro, na marahil ay si Malko, na 
nangangatlabi at napapahindik sa sakit, samantalang tumatalaok at namamayagpag 
ang sasabunging nakatuntong sa isang haliging 'doriko', 
at sa bagay na ito'y inaakala ni Kapitan Tiago, na nakararating sa pagiging santo ang tumaga at gayon din ang mataga. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sino ang makabibilang sa hukbong iyon 
ng mga larawan at makapagsasaysay ng mga kanikanyang tungo't mga kagalingang doo'y natitipon?!Hindi nga magkakasiyang masabi sa isang 
kapitulo 
lamang! Gayon ma'y sasabihin din namin ang isang magandang San Miguel, na kahoy 
na dinorado at pinintahan, halos isang metro ang taas: nangangatabi ang 
arkangel, nanglilisik ang mga mata, kunot ang noo at kulay rosa ang mga pisngi; nakasuot sa 
kaliwang kamay ang isang kalasag griego, at iniyayamba ng kanan ang isang kris joloano, at handang sumugat sa namimintakasi o sa lumapit 
sa kanya, ayon sa nahihiwatigan sa kanyang akma at pagtinging hindi ang 
tungo'y sa demoniong may buntot at may mga sungay na ikinakagat ang kanyang 
mga pangil sa binting dalaga ng arkangel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">&nbsp;Hindi lumalapit sa kanya kailan man 
si Kapitan Tiago, sa takot na baka maghimala. Mamakailan bagang gumalaw na 
parang buhay ang hindi lamang iisang larawan, kahi't anong pagkapangitpangit 
ang pagkakagawang gaya ng mga nanggagaling sa mga karpinteria sa Paete, at ng mangahiya at magkamit 
kaparusahan ang 
mga makasalanang hindi 
nananampalataya? Kasabihang may isang Cristo raw sa Espa&ntilde;a, na nang siya'y 
tawaging saksi ng mga nangako sa pagsinta, siya'y sumang-ayo't nagpatotoo, 
sa pamamag-itan ng minsang pagtango ng ulo sa harap ng hukom; may isang 
Cristo namang tinanggal sa pagkapako ang kanang kamay upang yakapin si Santa 
Lutgarda; at ano? hindi ba nababasa ni Kapitan Tiago sa isang maliit na 
librong hindi pa nalalaong inilalathala, tungkol sa isang pagsesermong ginawa 
sa pamamag-itan ng tinangotango at kinumpaskumpas ng isang larawan ni Santo 
Domingo sa Soriano? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Walang sinabing ano man lamang salita ang santo; nguni't 
naakala o inakala ng sumulat ng librito, na ang sinabi ni Santo Domingo sa 
kanyang mga tinangotango at kinumpaskumpas ay ipinagbibigay alam 
ang pagkatapos ng santinakpan 
Hindi ba sinasabi namang malaki ang pamamaga ng isang pisngi kay sa kabila 
ng Birhen de Luta ng bayan ng Lipa at kapol ng putik ang mga laylayan ng 
kanyang pananamit? Hindi ba ito'y lubos na pagpapatotoong ang mga mahal na 
larawa'y nagpapasial din nama't hindi man lamang itinataas ang kanilang 
pananamit, at sinasaktan din naman sila ng bagang, na kung magkabihira'y tayo 
ang dahil? Hindi ba namasdan ng kanyang sariling matang maliliit ang lahat ng 
mga Cristo sa sermon ng 'Siete Palabra' 
na gumagalaw ang ulo at tumatangong makaitlo, na siyang nakaaakit sa pagtangis 
at sa mga pagsigaw ng lahat ng mga babae at ng mga kalolowang mahabaging 
talagang mga taga langit? Ano pa? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Napanood din naman naming ipinakikita ng Padre sa mga nakikinig ng sermon sa kanya sa oras ng pagpapanaog sa Cruz 
kay 
Cristo ang isang panyong puno ng dugo, at kami sana'y tatangis na sa malaking 
pagkaawa, kung di lamang sinabi sa amin ng sakristan, sa kasaliwang palad ng 
aming kalolowa, na iyon daw ay biro lamang: ang dugong iyon-anya-ay sa inahing 
manok, na pagdaka'y inihaw at kinain, baga ma't Viernes Santo ... at ang 
sakristan ay mataba. Si Kapitan Tiago nga, palibhasa'y taong matalino at 
banal, ay nag-iingat na huwag lumapit sa Kris ni San Miguel.--Lumayo tayo sa 
mga panganib!--ang sinasabi niya sa kanyang sarili--nalalaman ko ng isang 
arkangel; nguni't hindi, wala akong tiwala! wala akong tiwala!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi dumaraan ang isang taong hindi siya 
nakikidalo sa pagpasa Antipolong malaki ang nagugugol, na ang dala'y isang 
orquesta: kung naroroon na'y pinagkakagulan niya ang dalawa sa lubhang maraming 
mga misa de grakiang ginagawa sa&nbsp; buong&nbsp; tatlong siyam, at sa mga ibang araw na 
hindi ginagawa ang pagsisiyam, at naliligo pagkatapos sa bantog na 'batis' 
o 
bukal, na ayon sa pinasasampalatayana'y naligo roon ang mahal na larawan. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nakikita pa ng mga mapamintakasing tao ang mga bakas ng mga paa at ang 
hilahis ng buhok ng Birhen de la Paz sa matigas na bato, ng pigain niya ang 
mga buhok na iyon, ano pa't walang pinagibhan sa alin mang babaeng gumagamit ng langis 
ng niyog, at para manding patalim ang kanyang mga buhok, o kung 
dili kaya'y diamante at walang pinag-ibhan sa may sanlibong tonelada ang bigat. 
Ibig sana naming ihaplit ng kagulatgulat na larawan ang kanyang mahal na buhok 
sa mga mata ng mga taong mapamintakasing ito, at kanyang tuntungan ang 
kanilang dila o ulo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Doon sa tabi rin ng bukal na iyon ay dapat kumain si 
Kapitan Tiago ng inihaw na lechon, dalag na sinigang sa mga dahon ng 
alibangbang, at iba pang mga lutong humigit kumulang ang sarap. Mahigithigit 
sa apat na raang piso ang nagugugol sa kanya sa dalawang misang iyon, datapuwa't 
maipalalagay na mura, kung pag-iisip-isipin ang kapurihang tinatamo ng Ina ng 
Diyos sa mga ruedang apoy, sa mga kohete, sa mga 'berso,' at kung 
babalakbalakin ang pakinabang na kinakamtan sa&nbsp; buong&nbsp; isang taon dahil sa mga 
misang ito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nguni't hindi lamang sa Antipolo ginagawa niya ang kanyang maingay na pamimintakasi. Sa Binundok, sa 
Capampangan at sa bayan ng San Diego: pagka magsasabong ng manok na may 
malalaking pustahan, nagpapadala siya sa kura ng mga salaping gintong ukol sa 
mga misang sa kanya'y magpapala, at tulad sa mga romanong nangagtatanong muna 
sa kanilang mga 'augur' 
bago makipaghamok, na pinakakaing magaling ang kanilang mga sisiw na 
iginagalang; pinagtatanungan din ni Kapitan Tiago ang kanyang sariling mga 
'augur'; nguni't taglay ang mga pagbabagong hatol ng mga panahon at ng 
mga 
bagong katotohanan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Pinagmamasdan niya ang ningas ng mga kandila, ang usok ng 
											insenso, 
ang boses 
ng sacerdote at iba pa, at sa lahat ng bagay 
pinagsisikapan niyang mahiwatigan ang kanyang magiging palad. Pinaniniwalaang 
bihirang matalo si Kapitan Tiago sa mga pakikipagpustahan, at ang kanyang 
manakanakang 
pagkatalo'y nagmumula sa mga kadahilanang ang nagmisa'y namamalat, kakaunti ang 
mga ilaw, masebo ang mga 'kirio', 
o napahalo kaya ang isang achoy sa mga salaping ipinagpamisa, at iba pa: 
ipinaaninaw sa kanya ng keladon ng isang Cofradia, na ang gayong pagkapalihis ng 
palad ay mga pagtikim lamang sa kanya ng Langit, at ng lalong 
mapapagtibay siya sa kanyang pananampalataya at pimimintakasi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Kinalulugdan ng 
mga kura, iginagalang ng mga sakristan, sinusuyo ng magkakandilang intsik at 
ng mga kastillero, si Kapitan Tiago'y lumiligaya sa religion dito sa lupa, at 
sinasabi ng mga matataas at banal na mga taong sa langit man daw ay malaki 
rin ang lakas ng kanyang kapangyarihan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Na siya'y kasundo ng gobyerno, ang baga'y 
na ito'y hindi dapat pag alinlanganan, bagaman tila mandin may kahirapang 
ito'y mangyari. Walang kayang umisip ng ano mang bagong bagay, nagagalak na sa 
kanyang kasalukuyang pamumuhay, kailan ma'y laging laang tumalima sa katapustapusang 
Oficial quinto sa lahat ng mga ofikina, maghandog ng mga 
hitang hamon, mga kapon, mga pavo, mga bungang kahoy at halamang galing sa 
Sunsong sa alin mang panahon ng isang taon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Kung naririnig niyang sinasabing 
masasama ang mga tunay na lahing filipino, siyang hindi nagpapalagay sa 
sariling di siya dalisay na tagalog, nakikipintas siya at lalo pa manding masama 
ang kanyang ginagawang pagpula; sakali't ang pinipintasa'y ang mga mestizong 
											intsik o mestizong kastila, siya nama'y nakikipintas, marahil 
											sapagkat inaakala 
na niyang siya'y dalisay na 'ibero': 
siya ang unaunang pumupuri sa lahat ng mga pagpapabuwis, lalo't kung sa 
likuran nito'y naaamo'y niyang may 'kontrata' o isang 'arriendo.' </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Lagi 
ng may 
handa siyang mga orquesta upang bumati at tumapat sa kanino mang mga 
gobernador, mga alkalde, mga fiskal, at iba pa, sa kanilang mga kaarawan ng 
santong kalagyo, kaarawan ng kapanganakan, panganganak o pagkamatay ng 
isang kamag-anak, sa maikling salita'y ang ano mang pagbabagong lakad ng 
pamumuhay na karaniwan. Nagpapagawa ng mga tulang pangpuri sa mga taong 
sinabi na, ng mga himnong ipinagdiriwang ang 'mabait at mairog na Gobernador; 
matapang at mapagsikap na Alkalde, na pinaghahandaan sa langit ng palma ng mga banal' (o palmeta) at iba't iba pang 
mga bagay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Naging Gobernadorcillo siya ng 'gremio' 
ng mga 'mestizong sangley', bagaman maraming nagsitutol, sapagkat hindi 
siya nila ipinalalagay na mestizong intsik. Sa dalawang taong 
kanyang pangangapita'y nakasira siya ng sampung frak, sampung sombrerong de 
kopa at anim na baston: ang frak at sombrero de kopa'y sa Ayuntamiento, sa 
Malakanyang at sa kuartel; ang sombrero de kopa at ang frak ay sa sabungan, sa 
pamilihan, sa mga prokesion, sa mga tindahan ng mga intsik, at sa ilalim ng 
sombrero at sa loob ng frak ay si Kapitan Tiagong nagpapawis at nag-eesgrima 
ng bastong may borlas, na nag uutos, naghuhusay at ginugulo ang lahat, taglay 
ang isang kahangahangang kasipagan at isang pagkamatimtimang lalo pa manding kahangahanga. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Kaya nga't ipinalalagay ng mga punong makapangyarihang siya'y 
isang magaling na tao, kagandagandahan ang puso, payapa, mapagpakumbaba, 
masunurin, mapagpakitang loob, na hindi bumabasa ng ano mang libro o 
periodikong galing sa Espa&ntilde;a, bagaman magaling mag-wikang kastila; ang tingin 
sa kanya, nila'y tulad sa pagmamasid ng isang abang estudiante sa gasgas na 
takon ng kanyang luma ng zapato, pakiling dahil sa anyo ng kanyang 
paglakad:--Nagiging katotohanan, sa kalagayan niya, ang kasabihan ng mga 
kristianong 'beati pauperis spiritu' 
at ang karaniwang kasabihang 'beati possidentes', 
at mangyayaring maipatungkol sa kanya yaong mga sabing griego na anang iba'y 
mali ang pagkakahulog sa wikang kastila: 'Gloria a Diyos en las alturas y paz a 
los hombres de buena voluntad'! 
											sapagkat ayon sa makikita natin sa mga susunod dito, hindi kasukatang 
magkaroon ang tao ng magandang kalooban upang sumapayapa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga di 
gumagalang sa religio'y ipinalalagay siyang haling; ipinalalagay siya ng mga 
dukhang walang awa, tampalasan, mapagsamantala ng kahirapan ng kapwa, at 
ipinalalagay naman ng mga mabababa sa kanyang siya'y totoong malabis umalipin at 
mapagpahirap. At ang mga babae? Ah, ang mga babae! Umaalingawngaw ng di kawasa ang mga paratang, na naririnig sa mga mahihirap na mga bahay na 
pawid, at pinagsasabihang may naririnig daw na mga taghoy, mga hagulhol, na 
manakanakang may kasamang mga uha ng isang bagong kaaanak. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi lamang iisang 
dalaga ang itinuturo ng daliring mapagsapantaha ng mga namamayan: malamlam 
ang mata at looy na ang dibdib ng gayong dalaga. nguni't hindi nakababagabag 
ng kanyang pagtulog ang lahat ng ito; hindi nakaliligalig ng kanyang 
katahimikan ang sino mang dalaga; isang matandang babae ang siyang 
nakapagpapahirap ng kanyang loob, isang matandang babaeng nakikipagtaasan sa 
kanya ng pamimintakasi na naging dapat magtamo sa maraming kura ng lalong 
malalaking pagpupuri at pagpapaunlak kay sa mga kinamtan niya ng panahong 
siya'y ginagaling. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">May banal na pag-uunahang ikinagagaling ng Iglesia si 
Kapitan Tiago at saka ang babaeng baong itong pagmamanahan ng mga kapatid at ng 
mga pamangkin, tulad naman sa pag-aagawan ng mga vapor sa Capangpangang 
pinakikinabangan ng mga taong bayan. Naghandog si Kapitan Tiago sa isang Birheng alin man ng isang bastong pilak na may mga esmeralda at mga topakio? 
Kung gayo'y pagdaka'y nagpapagawa naman si Do&ntilde;a Patrocinio sa platerong si 
Gaudinez ng isang bastong ginto na may mga brillante. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Na nagtayo si Kapitan 
Tiago ng isang arkong may dalawang mukha, may balot na damit na 
pinabintogbintog, may mga salamin, mga globong kristal, mga lampara at mga 
ara&ntilde;a, handog sa prokesion nang naval? Kung gayo'y magpapatayo naman si Do&ntilde;a 
Patrocinio ng isang arkong may apat na mukha, mataas ng dalawang vara sa arko 
ni Kapitan Tiago at lalong marami ang mga bitin at iba pang sari-saring mga 
pamuti. Pagka nagkagayo'y ginagamit naman ni Kapitan Tiago ang kanyang lalong 
nagagawang magaling, ang bagay na kanyang ikinatatangi: ang mga misang may 
mga bomba't iba pang pangpasayang ginagamitan ng polvora, at pagnangyari 
ito'y kinakagat ni Do&ntilde;a Patrocinio ng kanyang mga ngidngid ang kanyang labi, 
											sapagkat palibhasa'y totoong mayamutin ay hindi niya matiis ang 'repique' 
ng mga kampana, at lalo ng kinalulupitan niya ang ugong ng mga putukan. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Samantalang si Kapitan Tiago'y ngumingiti ay nag-iisip naman si Do&ntilde;a Patrocinio ng pagganti, at pinagbabayaran niya ng salapi ng mga iba ang 
lalong magagaling na magsermong hirang sa limang mga kapisanan ng mga prayle 
sa Maynila, ang lalong mga balitang mga kanonigo sa Catedral, at sampu ng mga Paulista, at 
ng mangag sermon sa mga dakilang araw tungkol sa mga 
saysayin sa Teologia, 
na lubhang malalalim sa mga makasalanang walang nalalaman kung di wikang tinda 
lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Namasid ng mga kakampi ni Kapitan Tiago, na si Do&ntilde;a Patrocinio'y 
nakakatulog samantalang nagsesermon, at sinasagot naman sila ng mga kakampi ni 
Do&ntilde;a Patrocinio, na ang sermo'y bayad na, at sa ganang kanya'y ang pagbabayad 
ang siyang lalong mahalaga. Sa katapustapusa'y lubos na iginupo si Kapitan 
Tiago ni Do&ntilde;a Patrocinio, na naghandog sa isang simbahan ng tatlong andas na 
pilak, na dinorado, na ang bawa't isa'y pinagkagugulan niya ng mahigit na 
tatlong libong piso. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hinihintay ni Kapitan Tiago na bawa't araw ay titigil ng 
paghinga ang matandang babaeng ito, o matatalo kaya ang lima o anim na usapin 
sa paglilinkod lamang sa Diyos; ang kasamaang palad ay ipinagkasanggalang ang 
mga usaping iyon ng lalong magagaling na abogado sa Real Audiencia, at tungkol 
sa kanyang buhay, walang sukat na mapanghawakan sa kanya ang sakit, ang kawangis niya'y 
kawad na patalim, marahil ng may mapanghinularan ang mga kalolowa, at kumakapit dito sa bayan ng luhang gaya ng mahigpit na pagkapit 
ng galis sa balat ng tao. Umaasa ang mga kakampi ni Do&ntilde;a Patrociniong 
pagkamatay nito'y magiging 'kanonizada', 
at si Kapitan Tiago ma'y sasamba sa kanya sa mga altar, bagay na 
sinasang-ayunan ni Kapitan Tiago at kanyang ipinangangako, mamatay lamang 
agad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Gayon nga ang kalagayan ni Kapitan Tiago 
ng panahong iyon. Tungkol sa panahong nakaraa'y siya'y bugtong na anak ng 
isang mag-aasukal sa Malabong mayaman din naman ang pagkabuhay, nguni't 
napakaramot, na ano pa't hindi nagkagugol ng isang kuarta man lamang sa 
pagpapaaral sa kanyang anak, kaya't naging alila si Santiagillo ng isang 
mabait na dominiko na pinagsikapang ituro ang lahat ng maituturo at nalalaman 
niya. ng magtatamo na si Santiago ng kaligayahang siya'y tawaging 'logiko', 
sa makatuwid baga'y ng siya'y mag-aaral na ng 'Logika', 
ang pagkamatay ng sa kanya'y nagtatangkilik, na sinundan ng pagkamatay ng 
kanyang ama, ang siyang nagbigay wakas ng kanyang mga pag-aaral, at ng 
magkagayo'y napilitang siyang mangasiwa sa paghahanap-buhay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nag-asawa siya sa 
isang magandang dalagang taga Santa Cruz, na siyang tumulong sa kanya sa 
pagyaman, at siyang sa kanya'y nagbigay ng pagkaginoo. Hindi nagkasiya si Do&ntilde;a 
Pia Alba sa pamimili ng azukal, kafe at tina: ninais niyang magtanim at umani, 
at bumili ang dalawang bagong kasal ng mga lupa sa San Diego, at mula niyao'y 
naging kaibigan na siya ni Padre Damaso at ni Don Rafael Ibarra, na siyang 
lalong mayamang mamumuhunan sa bayan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagiging isang gawang dapat sisihin ang 
malabis nilang pag-susumakit sa pagpaparami ng kayamanan, dahil sa sila'y hindi 
nagkakaanak, mula ng sila'y makasal na may anim na taon na, at gayon ma'y 
matuwid, mataba at timbang na timbang ang pangangatawan ni Do&ntilde;a Pia. Nawalang 
kabuluhan ang kanyang mga pagsisiyam, o 'novenario,' ang kanyang pagdalaw sa 
Birheng Caysasay sa Taal, sa hatol ng mga mapamintakasi; ang pagbibigay niya, ng 
mga limos, ang pagsasayaw niya sa prokesion ng Birheng Turumba, sa Pakil, sa gitna ng mainit na araw 
ng Mayo. Nawal-ang kabuluhang lahat, hanggang sa siya'y 
hinatulan ni Padre Damasong pumaroon sa Obando, at pagdating doo'y sumayaw sa 
piyesta ni San Paskual Baylon, at humingi ng isang anak. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Talastas na nating sa 
Obando'y may tatlong nagkakaloob ng mga anak na lalaki at ng mga anak na 
babae; ang ibigin: Nuestra Se&ntilde;ora de Salambaw, Santa Clara at San Paskual. 
Salamat sa hatol na ito'y nagdalang tao si Do&ntilde;a Pia ... ay! tulad sa 
mangingisdang sinasabi ni Shakespeare sa Makbeth, na tumigil ng pag-aawit 
ng siya'y makasumpong ng isang kayamanan; pumanaw kay Do&ntilde;a Pia ang katowaan, 
namanglaw ng di ano lamang at hindi na nakita nino mang ngumiti.--Talagang 
ganyan ang mga naglilihi--ang sinasabi ng lahat, sampu ni Kapitan Tiago. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Isang 
lagnat na dumapo sa kanya pagkapanganak (fiebre puerperal) ang siyang nagbigay 
wakas sa kanyang mga kalungkutan, na ano pa't naiwan niyang ulila ang isang 
magandang sanggol na babae, na inanak sa binyag ni Padre Damaso rin; at 
											sapagkat 
hindi ipinagkaloob ni San Paskual ang batang lalaking sa kanya'y hinihingi, 
pinangalanan ang sanggol ng <span class="smcap">Maria Clara</span>, sa 
pagbibigay unlak sa Birhen de Salambaw at kay Santa Clara, at pinarusahan ang 
may dalisay na kapurihang si San Paskual Baylon, sa hindi pagbanggit ng 
kanyang pangalan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Lumaki ang sanggol na babae sa mga 
pag-aalaga ni tia Isabel, ang matandang babaeng iyong tulad sa prayle ang 
pakikipagkapwa tao na nakita natin sa pasimula nito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi taglay ni Maria Clara ang maliliit 
na mga mata, ng kanyang ama: gaya rin ng kanyang inang malalaki ang mga 
mata, maiitim, nalililiman ng mahahabang mga pilik-mata, masasaya at kaayaaya 
pagka naglalaro; malulungkot, hindi mapagkuro at anyong naggugunamgunam pagka 
hindi ngumingiti. Nang sanggol pa siya'y kulot ang kanyang buhak at halos 
kulay ginto; ang ilong niyang maganda ang hayap ay hindi totong matangos at 
hindi naman sapat; ang bibig ay nagpapaalaala sa maliliit at kalugodlugod na 
bibig ng kanyang ina, taglay ang mga katowatowang biloy sa mga pisngi; ang 
balat niya'y kasing nipis ng pang-ibabaw na balat ng sibuyas at maputing kulay 
bulak, anang mga nahihibang na mga kamag-anak, na kanilang nakikita ang bakas ng pagka si 
Kapitan Tiago ang ama, sa maliliit at magandang pagkakaanyo 
ng mga tainga ni Maria Clara.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ipinalalagay ni tia Isabel na kaya may 
pagka mukhang europeo si Maria Clara'y dahil sa paglilihi ni Do&ntilde;a Pia; 
natatandaang madalas nakita niyang ito'y tumatangis sa harapan ni San Antonio, 
ng mga unang buwan ng kanyang pagbubuntis; gayon din ang isipan ng isang 
pinsang babae ni Kapitan Tiago, ang pinagkakaibhan lamang ay ang 
paghirang ng santo: sa ganang kanya'y naglihi sa Birhen o kay San Miguel. Isang 
balitang pilosopong pinsan ni Kapitan Tinong, at nasasaulo ang 'Amat' , hinahanap ang 
kaliwanagan ng gayong bagay sa ikinapangyayari sa kalagayan ng tao ng mga 
'planeta'.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Lumaki si Maria Clarang pinakaiirog ng 
lahat, sa gitna ng mga ngiti at pagsinta. Ang mga prayle ma'y linalaro siya 
pagka isinasama sa mga prokesiong puti ang pananamit, nalalala sa kanyang 
malago at kulot na buhok ang mga sampaga at mga azukena, may dalawang maliliit 
na pakpak na pilak at gintong nakakabit sa likuran ng kanyang pananamit, at 
may tangang dalawang kalapating puting may mga taling kintas na azul. At saka 
siya'y totoong masaya, may mga pananalitang musmos na kalugodlugod, na si 
Kapitan Tiago, sa kahibangan ng pag-ibig, ay walang ginagawa kung di 
pakapurihin ang mga santo sa Obando at ihatol sa lahat na sila'y umadhika ng 
magagandang eskultura nila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga lupaing na sa dakong ilaya ng 
daigdig, pagdating ng batang babae sa labing tatlo o labing apat na taon ay 
dinaratnan na ng sa panahon, tulad sa buko kung gabi na kinabukasa'y bulaklak 
na. Sa kalagayang iyang pagbabagong anyo, puspos ng mga talinghaga at ng 
pagkamaramdamin ang puso, pumasok si Maria Clara, sa pagsunod sa mga hatol ng 
kura sa Binundok, sa beaterio ng Santa Catalina 
upang tumanggap sa mga monja ng mga turong banal. Tumatangis si 
Maria Clarang nag-paalam kay Padre Damaso at sa tanging katotong kanyang 
kalaro-laro buhat sa kamusmusan, kay Crisotomo Ibarra, na pagkatapos ay napa sa 
Europa naman. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Doon sa kumbentong iyong sakali't nakikipanayam sa mundo'y sa 
pamamag-itan ng mga rejang lambal, at sa ilalim pa ng pagbabantay ng 
'Madre-Eskukha', natira si Maria Clarang pitong taon. Taglay ng bawa't isa ang kanikanikalang inaakalang ikagagaling ng sariling pagkabuhay, at sa 
kanilang 
pagkahiwatig ng hilig ng isa sa isa ng mga bata, pinagkayarian ni Don Rafael 
at ni Kapitan Tiago, ang pagpapakasal sa kanilang mga anak, at sila'y 
nangagtatag ng samahan. Ang pangyayaring itong ginawa ng makaraan ang ilang 
taon buhat ng umalis si Ibarra'y ipinagdiwang ng dalawang pusong na sa 
magkabilang dulo ng daigdig at na sa iba't ibang kalagayang totoo.</font></p>
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
																	<a href="t-noli-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Nilalaman ng Noli 
																	Me Tangere</font></a></font></p>
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