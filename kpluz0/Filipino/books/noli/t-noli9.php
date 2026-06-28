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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">IX. Mga Kaugalian ng Bayang Ito</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nagkamali si Ibarra; nalululan nga 
si 'victoriang' iyon si Padre Damaso at tumutungo sa bahay na kanyang bagong kaiiwan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Saan ba kayo paroroon?--ang tanong ng 
prayle kay Maria Clara at kay tia Isabel, na mangagsisisakay na sa isang kotseng may mga pamuting pilak, at tinatampitampi ni 
Padre Damaso ang mga pisngi ni Maria Clara, sa gitna ng kanyang mga kaguluhan ng 
isip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Cukunin ko sa beaterio ang aking mga 
bagaybagay roon--ang sagot ni Maria Clara.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ahaaa! aha! tingnan natin kung sino ang 
mananalo sa amin, tingnan natin!--ang ipinagbububulong na hindi napapansin ang 
sinasabi, na ano pa't nagtaka, ang dalawang babae. Tinungo ang hagdanan at 
nanhik doon si Padre Damasong nakatungo ang ulot't madalang-dalang ang hakbang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Marahil siya'y magsesermon at kanyang 
isinasaulo ang kanyang ipangangaral!--ani tia Isabel;--sakay na Maria at 
tatanghaliin tayo ng pagdating.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi namin masabi kung magsesermon nga o 
hindi; datapuwa't inaakala naming mga dakilang bagay ang mga pinag-iisip-isip 
niya, sapagkat hindi man lamang naiabot niya, ang kanyang kamay kay Kapitan 
Tiago, kaya't napilitang yumukod pa ito ng kaunti upang hagkan ang kamay na 
iyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Santiago!--ang unang sinabi niya--may 
pag-uusapan tayong mahahalagang bagay; tayo na sa iyong ofikina.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Maligalig ang loob ni Kapitan Tiago, 
hindi nakaimik nguni't sumunod sa napakalaking sacerdote, at sinarhan ang pinto 
pagkapasok nila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantalang nagsasalitaan sila ng lihim, 
siyasatin natin kung ano ang kinaratnan ni Fr. Sybila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Wala sa kanyang kumbento ang 
pantas na dominiko; maagang maaga, pagkapagmisa, siya'y napatungo sa kumbento 
ng kanyang kapisanang na sa makapasok ng pintuan ni Isabel Segunda, o ni 
Magallanes, alinsunod sa naghaharing familia, sa Madrid.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi niya pinansin ang masarap na 
amoy-tsokolate, at gayon ding di niya inino ingay ng mga kajon at ang 
salaping naririnig mula, sa Prokuracion, at bahagya ng sumagot sa mapitagan 
at magiliw na bati ng uldog na prokurador, nanhik si Fr. Sybila, tinahak ang 
ilang mga 'korredor' at tumuktok ng buto ng mga daliri sa isang pintuan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tuloy!--anang isang boses na wari'y 
dumaraing.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pagalingin nawa kayo ng Diyos sa inyong 
sakit!--ang siyang bati ng batang dominiko pagpasok.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakaupo sa isang malaking sillon ang isang 
matandang pari, kulubot at ga namumutla na ang balat ng mukha, kawangis ng 
isa riyan sa mga santong ipininta ni Rivera. Nanglalalalim ang mga matang 
napuputungan ng lubhang malalagong kilay, na palibhasa'y laging nakakunot ay 
nakapagdaragdag ng ningning ng paghihingalo ng kanyang mga mata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nababagbag ang loob na pinagmasdan siya ni 
Padre Sibilang nakahalukipkip ang mga kamay sa ilalim ng kagalanggalang na 
eskapulario ni Santo Domingo. Inilungayngay pagkatapos ang ulo, hindi umiimik 
at wari'y naghihintay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah!--ang buntong hininga ng 
maysakit--inihahatol sa akin, Hernando; na akin daw ipahiwa! Ipahiwa sa tanda ko 
ng ito! Itong lupaing ito! Ang kagulatgulat na lupaing ito! Muhang uliran ka sa 
nangyayari sa akin, Hernando!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dahandahang itinaas ni Fr. Sybila ang 
kanyang mga mata at itinitig sa mukha ng may sakit:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano po ang inyong minagaling?--ang 
itinanong.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mamatay! Ay! May nalalabi pa baga sa 
aking ibang bagay? Malabis na totoo ang aking ipinaghihirap; datapuwa't.... 
pinapaghirap ko naman ang marami.... nagbabayad-utang lamang ako! At ikaw, kumusta 
ka? ano ang sadya mo?,</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naparito po ako't sasabihin ko sa inyo 
ang ipinagkatiwalang bilin sa akin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah! at ano ang bagay na iyon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Psh!--sumagot na may sama ang loob, umupo 
at iliningon ang mukha, sa ibang panig,--mga kabulastigan ang sinabi sa atin; 
ang binatang si Ibarra'y isang matalinong bagongtao; tila mandin hindi haling; 
nguni't sa akala ko'y isang mabait na bagongtao.</font></p>
<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa akala mo?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nagpasimula kagabi 
ang kanilang pagkakaalit!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nagpasimula na! at bakit?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sinaysay ni Fr. Sibyla, sa maikling 
pananalita, ang nangyari kay Padre Damaso at kay Crisostomo Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bukod sa rito--ang idinugtong na 
pangwakas--mag-aasawa ang binata sa anak na babae ni Kapitan Tiago, na nag-aral 
sa kolegio ng ating mga kapatid na babae; siya'y mayaman at di nga niya 
iibiging magkaroon ng mga kaaway upang siya'y mawal-an ng kaligayahan at kayamanan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Itinango ng may sakit ang kanyang ulo, 
sa pagpapakilalang siya'y sang-ayon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siya nga, gayon din 
ang aking akala ... Sa pamamag-itan ng gayong babae at isang bianang lalaking 
gayon, magiging atin ang kanyang katawa't kaluluwa. At kung hindi lalong 
magaling kung siya'y magpakitang kaaway natin!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Minamasdang nagtataka ni Fr. Sibyla ang 
matanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Unawaing sa ikagagaling ng ating Santong 
Kapisanan--ang idinugtong na naghihirap ng paghinga.--Minamagaling ko pa ang 
makilaban sa atin, kay sa mga haling na pagpupuri at paimbabaw na panghihinuyo 
ng mga kaibigan.... tunay at sila'y may mga bayad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Inaakala po ba ninyong gayon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tiningnan siya ng&nbsp; buong&nbsp; lungkot ng 
matanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tandaan mong magaling!--ang isinagot na 
nagkakangpapagal--Manakatili ang ating kapangyarihan samantalang sa kapangyarihang iya'y nananalig. 
Kung tayo'y labanan, ang sasabihin ng 
gobyerno'y: 'Nilalabanan sila, sapagkat ang mga prayle'y isang hadlang sa kalayaan ng mga filipino; at 
sapagkat 
gayo'y papanatilihin natin ang mga prayle.'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At kung sila'y pakinggan? Manakanakang 
ang gobyerno'y....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi sila 
pakikingan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gayon man, kung sa udyok ng kasakima'y 
nasain ng gobyernong maowi sa kanya ang ating inaani ... kung magkaroon ng 
isang pangahas at walang gulat na....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung magkagayo'y sa 
aba niya!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kapwa hindi umimik.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bukod sa roon--ang ipinatuloy ng may 
sakit--kinakailangan nating tayo'y labanan, tayo'y pukawin: nagpapakilala sa 
atin ang mga labanang ito ng kung saan naroon ang ating kahinaan, at ang 
gayo'y nakapagpapagaling sa atin. Nakararaya sa atin at nakapagpapahimbing ang 
malabis na mga pagpuri: datapowa't sa labas ay nakapagpapapangit ng ating 
anyo, at sa araw na mahulog tayo sa kapangitang anyo, tayo'y 
mapapahamak, na gaya ng pagkapahamak natin sa Europa. Hindi na papasok ang 
salapi sa ating mga simbahan; sino ma'y wala ng bibili ng mga eskapulario, ng 
mga korrea at ng ano man, at pagka hindi na tayo mayaman, hindi na natin 
mapapapanalig ang mga budhi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Psh! Mananatili rin 
sa atin ang ating mga 'hakienda,' ang ating mga bahay!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mawawala sa ating lahat, na gaya ng 
pagkawala sa atin sa Europa! At ang lalong masama'y nagpapagal tayo at ng tayo'y 
manggipuspos. Sa halimbawa: iyang napakalabis na pagsusumakit na dagdagan sa 
taontaon, ayon sa ating maibigan, ang halaga ng buwis ng ating mga lupa, ang 
pagsusumakit na iyang aking sinalansang sa lahat ng mga malalaking pulong natin; 
ang pagsusumakit na iyan ang siyang makapapahamak sa atin! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Napipilitan ang 'indiong' bumili sa 
											ibang dako ng mga lupang kasing 
											galing din ng ating mga lupa o lalo 
											pang magaling. Nanganganib akong 
											baka tayo'y nagpapasimula na ng 
											pagbaba: 'Quos vult perdere Jupiter 
											dementat prius.' Dahil dito'y huwag 
											nga nating dagdagan ang ating bigat; 
											ang baya'y nagbububulong na. Mabuti 
											ang inisip mo: pabayaan natin ang 
											ibang makikipaghusay doon ng 
											kanikanilang sagutin; papanatilihin 
											natin ang sa ati'y pagpipitagang 
											nalalabi, at sapagkat hindi 
											malalao't makikiharap tayo sa Diyos, 
											linisin natin ang ating mga kama'y 
											... Maawa nawa sa ating mga kahinaan 
											ang Diyos ng mga pagkahabag!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa makatuwid ay inaaakala po ba ninyong 
ang buwis ay ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag na tayong mag-usap ng tungkol sa 
salapi!--ang isinalabat ng may sakit na masama ang loob.--Sinasabi mong 
ipinangako ng teniente kay Padre Damaso..?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Opo, ama--ang sagot ni Padre Sibylang ga 
ngumingiti na. nguni't nakita ko kaninang umaga ang teniente, at sinabi sa 
aking dinaramdam daw niya ang lahat ng nangyari kagabi, na umimbulog daw sa 
kanyang ulo ang Jerez, at sa akala niya'y gayon din ang nangyari kay Padre 
Damaso.--At ang pangako?--ang tanong kong pabiro.--Padre kura ang 
isinagot:--marunong po akong tumupad ng aking wika, pagka sa pagtupad na iya'y 
hindi ko dinurungisan ang aking kapurihan; kailan ma'y di ko naging ugali ang 
magkanulo kanino man, at dahil dito'y teniente ako hangga ngayon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nang makapagsalitaan sila ng mga iba't 
ibang bagay na walang kabuluhan, nagpaalam si Fr. Sibyla.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nga naman naparoon ang 
teniente sa Malakanyang; ngunit naalaman din ng Kapitan Heneral ang nangyari.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang nakikipagsalitaan siya sa kanyang 
mga ayudante tungkol sa mga pagbanggit na sa kanya'y ginagawa ng mga pahayagan 
sa Maynila, sa ilalim ng mga pamagat na mga 'kometa' 
at iba pang mga napakikita sa langit, sinabi sa kanya ng isa sa mga 
ayudanteng iyon ang pakikipagkagalit ni Padre Damaso, na pinalubha pa ang kabigatan ng mga pananalita, 
bagaman pinakinis ng 
kaunti ang mga bigkas ng 
sabi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sino ang sa iyo'y nagsabi--ang tanong ng 
Kapitan Heneral na ngumingiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naringig ko po kay Laruja, na siyang 
nagbabalita kaninang umaga sa pasulatan ng pamahayagan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Muling ngumiti ang Kapitan Heneral at 
idinagdag:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi nakasasakit ang babae't prayle! 
Ibig kong manahimik sa natitirang panahon ng pagtira ko sa lupang ito, at aayaw 
na akong makipag-alit sa mga lalaking gumagamit ng saya. At lalong lalo na 
ngayong aking natalastas na pinaglalaruan lamang ng provincial ang aking mga 
utos; hiningi kong pinakaparusa ang paglilipat sa ibang bayan ng prayleng 
iyan; at siya nga naman, siya'y inilipat, nguni't doon siya inilagay sa lalong 
magaling na bayan: frailadas! 
na sinasabi natin sa Espa&ntilde;a.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't huminto ng pagngiti ang Kapitan 
Heneral ng nagiisa na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah! kung hindi sana napakatanga ang 
bayang ito'y pasusukuin ko ang aking mga kagalanggalang na iyan!--ang 
ipinagbuntong hininga.--Datapuwa't karapatdapat ang bawa't bayan sa 
kinasasapitan niya; gawin natin ang inuugali ng lahat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantala'y natapos si Kapitan Tiago ng 
pakikipulong kay Padre Damaso, o sa lalong magaling na sabi, ang pakikipulong ni 
Padre Damaso kay Kapitan Tiago.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ngayo'y napagsabihan na kata!--ang 
sabi ng frankiskano ng magpaalam. Nailagan sana ang lahat ng ito, kung 
nagtanongtanong ka muna sa akin, kung di ka sana nagsinungaling ng ikaw ay 
tinatatanong ko. Pagsikapan mong Huwag ka nang gumawa ng mga kahalingan, at 
manalig ka sa kanyang inaama!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Lumibot ng makaalawa o makaatlo sa salas 
si Kapitan Tiagong nag-iisip-isip at nagbubuntong hininga; di kaginsaginsa'y 
parang may naisip siyang magaling, tumakbo sa panalanginan at pinatay ang mga kandila at ang lamparang kanyang pinasindihan upang siyang makapagligtas 
kay 
Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May panahon pa, 
sapagkat totoong malayo 
ang linalakbay--ang ibinulong.</font></p>
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