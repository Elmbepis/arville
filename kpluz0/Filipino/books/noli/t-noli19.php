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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XIX. Mga Suliranin ng Isang Guro</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<div class="quote">
	<div class="stanza">
		<div class="verseind">
			<p align="justify" style="margin: 0 80px">
			<i><font face="Arial" color="#333333"><span style="font-size: 13pt">K</span></font></i><font face="Arial" color="#333333"><i><span style="font-size: 13pt">araniwang tao'y haling ang 
			isipan</span></i></font></p>
			<p align="justify" style="margin: 0 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt"><i>at 
			sapagkat sila'y 
			nagbabayad mandin,</i></font></div>
		<div class="verse">
			<p align="justify" style="margin: 0 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt"><i>karampatang sila'y 
			pag-salitang hangal</i></font></div>
		<div class="verse">
			<p align="justify" style="margin: 0 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt"><i>ng upang matowa sa ga-yong 
			pagbagay.</i></font></div>
	</div>
	<div class="center">
		<p align="justify" style="margin: 0 80px">
		<font face="Arial" color="#333333" style="font-size: 13pt">(<span class="smcap">Lope de Vega.</span>)</font></div>
</div>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Natutulog ng tahimik, na taglay iyang 
pagpapaimbabaw ng mga elemento, 
ang dagatang nalilibot ng kanyang mga kabundukan, na ano pa't tila mandin 
hindi siya nakialam sa malakas na unos ng gabing nagdaan. Sa mga unang sinag ng liwanag na pumupukaw sa tubig nang 
mga nagkintabkintab na mga 
lamang-dagat, naaaninagnagan sa malayo, halos sa wakas ng abot ng tanaw, ang 
abo-abong mga anino: yao'y ang mga bangka ng mga mangingisdang nagliligpit 
ng kanilang lambat; mga kasko at mga paraw na nangaglaladlad ng kanilang 
mga layag.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinagmamasdan ang tubig ng dalawang taong 
kapwa pawang luksa, ang pananamit mula sa isang mataas na kinalalagyan: si 
Ibarra ang isa sa kanila, at ang isa'y isang binatang mapagpakumbaba ang anyo at 
mapanglaw ang pagmumukha.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dito nga--ang sabi nitong huli--dito 
iniabsang ang bangkay ng inyong ama. Dito kami ng teniente Guevara at ako 
ipinagsama ng tagapaglibing!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinisil ni Ibarra ng&nbsp; buong&nbsp; pag-ibig ang kamay ng binata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Wala po kayong 
sukat kilanlin sa aking utang&nbsp;na loob!--ang muling sinabi nito.--Marami pong totoo ang utang na loob 
ko sa 
inyong ama, at ang tanging ginawa ko'y ang makipaglibing sa kanya. Ako'y 
naparitong wala akong kakilala sino man, walang taglay na ano mang sulat upang 
may magtangkilik sa akin, salat sa karapatan, 
walang kayamanang gaya rin ngayon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Iniwan ng aking hinalinhan ang 
											paaralan 
upang maghanap buhay sa pagbibili ng tabako--Inampon ako ng inyong ama, inihanap 
											ako ng isang bahay at binigyan ako 
											ng lahat kong kinakailangan sa 
											ikasusulong ng pagtuturo; siya'y 
											napapasa paaralan at namamahagi sa 
											mga batang mahihirap at mapagsakit 
											sa pag-aaral ng ilang mga kuadro; 
											sila'y binibigyan niya ng mga 
											libro't mga papel. Datapuwa't ito'y 
											hindi nalaon, kawangis din ng lahat 
											ng bagay na magaling!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpugay si Ibarra't anaki'y nanalanging 
mahabang horas. Hinarap pagkatapos ang kanyang kasama at sa kanya'y sinabi:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sinasabi po ninyong sinasaklolohan ng 
aking ama ang mga batang dukha, at ngayon po?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ngayo'y ginagawa nila ang&nbsp; buong&nbsp; kaya, 
at sumusulat sila kailan man at makasusulat,--ang isinagot ng binata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ang dahil?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang dahil ay ang kanilang gulanit na mga 
baro at nangahihiyang mga mata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi umimik si Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ilan ba ang inyong mga batang 
tinuturuan ngayon?--ang tanong na wari'y may hangad na makatalos.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mahigit pong 
dalawang daan sa talaan, at dalawampu at lima ang pumapasok!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit nagkakaganyan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Mapanglaw na ngumiti ang maestro sa 
paaralan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kung sabihin ko po sa inyo ang mga 
kadahilana'y kailangang magsalita ako ng isang mahaba at nakayayamot na 
kasaysayan--ang sinabi niya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag po ninyong ipalagay na ang tanong 
ko'y dahil sa isang hangad na walang katuturan--ang muling sinabi ni Ibarra ng&nbsp; 
buong&nbsp; kataimtiman, na kanyang minamasdan ang malayong abot ng tanaw.--Lalong 
mabuti ang aking mapaglining, at sa akala ko'y kung aking ipatuloy ang layon ng 
aking ama ay lalong magaling kay sa siya'y tangisan, lalo pa mandin kay sa 
siya'y ipanghiganti. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang libingan niya'y ang mahal na Naturaleza, at ang bayan 
at isang sacerdote ang siyang kanyang mga kaaway: pinatatawad ko ang bayan sa 
kanyang kamangmangan, at iginagalang ko ang sacerdote dahil sa kanyang 
katungkulan at sapagkat ibig kong igalang ang Religiong siyang nagturo sa mga 
namamayan. Ibig kong gawing patnubay ang panukala ng sa aki'y nagbigay buhay, 
at dahil dito'y ibig ko sanang maunawa ang mga nakahahadlang dito sa pagtuturo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Pakapupurihin at di po kayo 
											kalilimutan ng bayan kung inyong 
											papangyarihin ang magagandang mga 
											panukala ng inyong nasirang ama!--anang 
maestro.--Ibig po ba ninyong mapagkilala kung ano ang mga hadlang na 
natatalisod ng pagtuturo? Kung gayo'y tantuin ninyong kailan ma'y hindi 
mangyayari ang pagtuturong iyan sa mga kalagayan ngayon kung walang isang 
makapangyarihang tulong; unauna'y kahit magkaroon, ito'y sinisira ng 
kakulangan ng mga sukat na magamit at ng maraming panirang maling kaisipan. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sinasabing sa Alemania'y nag-aaral daw sa 
											paaralan ng bayan sa loob ng walong 
taon ang anak ng tagabukid; sino ang makakaibig ditong gumamit ng kalahati 
man lamang ng panahong iyan sa gayong lubhang babahagya ang inaaning mga 
bunga? Nangagsisibasa, nangagsisisulat at kanilang isinasaulo ang malalaking 
bahagi at ng madalas pang isinasaulo ang mga&nbsp; buong&nbsp; librong wikang kastila, na 
hindi nawawatasan ang isa man lamang salita ng mga librong iyon? ano ang 
pinakikinabang sa paaralan ng anak ng ating mga tagabukid?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At kayong nakakakita ng kasam-an, ano't 
hindi ninyo pinag-isip na bigyang kagamutan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ay!--ang isinagot na iginagalaw ng&nbsp; 
buong&nbsp; kalungkutan ang ulo:--hindi lamang nakikibuno ang isang abang maestro sa 
mga maling kaisipan, kung di naman sa mga tanging lakas na makapangyarihan. 
Ang unang kinakailanga'y magkaroon ng paaralanhan, isang bahay, at hindi gaya 
ngayong doon ako nagtuturo sa tabi ng kotse ng Padre kura, sa silong ng kumbento. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Doo'y ang mga batang talagang maibiging bumasa ng malakas, 
nakaliligalig nga naman sa pari, na kung minsa'y nananaog na may dalang galit, 
lalonglalo na kung sumasakit ang ulo, sinisigawan ang mga bata at madalas na 
ako'y linalait. Inyong natatalastas na sa ganya'y hindi maaaring makapagturo at 
makapag-aral; hindi iginagalang ng bata ang maestro, mula sa sandaling 
nakikitang linalapastangan at hindi siya pinagbibigyang katuwiran. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Upang 
pakinggan ang maestro, nang hindi pag-alinlanganan ang kanyang kapangyarihan, 
nagkakailangang siya'y kaalang-alanganan, magkaroon ng dangal, magtaglay ng 
lakas dahil sa pagpipitagan sa kanya, magkaroon ng kalayaang tangi, at 
ipahintulot po ninyong sa inyo'y ipahayag ang mga malulungkot na nangyayari. 
Inakala kong magbagong palakad ay ako'y pinagtawanan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Upang mabigyang kagamutan 
ang kasamaang sa inyo'y sinasabi ko, aking minagaling na magturo ng wikang 
kastila sa mga bata, sapagkat bukod sa ipinag-uutos ng gobyerno, inakala ko 
namang ito'y isang kagalingan ng lahat. Ginamit ko ang paraang lalong magaang, 
na mga salita at mga pangalan, na ano pa't hindi ko isinangkap ang mga 
dakilang palatuntunan, at ang talaga ko'y saka ko na ituro ang 'gramatika', 
pagka nakauunawa na sila ng wikang kastila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang makaraan ang ilang 
linggo'y halos nawawatasan na ako ng lalong matatalas ang isip at sila'y 
nakapag-uugnay-ugnay na ng ilang mga salita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Huminto ang maestro at tila nag-aalinlangan; 
pagkatapos, tila mandin minagaling niya ang sabihing lahat, kaya't nagpatuloy:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko dapat ikahiya ang pagsasaysay ng 
mga kaapihang aking tinitiis, sino mang malagay sa kinalalagyan ko'y gayon din 
marahil ang uugaliin. Ayon sa sinabi ko, ang pasimula'y magaling; datapuwa't ng 
makaraan ang ilang araw, ipinatawag ako sa sakristan mayor ni Padre Damaso, na 
siyang kura ng panahong iyon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Palibhasa'y talastas ko ang kanyang asal at 
nanganganib akong siya'y papaghintay-hintayin, pagdaka'y nanhik ako at nagbigay 
sa kanya ng magandang araw sa wikang kastila. Ang kura, na ang&nbsp; buong&nbsp; 
pinakabati ay ang paglalahad sa akin ng kamay upang aking hagkan, pagdaka'y 
iniurong ito at hindi ako sinagot, at ang ginawa'y ang magpasimula ng 
paghalakhak ng halakhak-libak. Napatanga ako; nahaharap ang sakristan mayor. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa sandaling iyo'y wala akong maalamang sabihin; natigagal ako ng pagtitig sa 
kanya; datapuwa't siya'y nagpatuloy ng pagtatawa. Ako'y nayayamot na, at 
nakikinikinita kong ako'y makagagawa ng isang di marapat; sapagkat hindi nga 
nangagkakalaban ang maging mabuting kristiano at ang matutong magmahal ng 
sariling karangalan. Tatanungin ko na sana siya, ng di kaginsaginsa'y inihalili 
sa tawa ang pag-alimura, at nagsabi sa akin ng patuya:--'<span class="smcap">Buenos 
dias</span> pala, ha? <span class="smcap">buenos dias</span>! nakakatawa ka! marunong 
ka ng magwikang kastila pala!'--At ipinatuloy ang kanyang pagtatawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi napigil ni Ibarra ang isang ngiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kayo po'y nagtatawa--ang muling sinabi ng 
maestro na nagtatawa rin naman:--ang masasabi ko po sa inyo'y hindi ako makatawa 
ng mangyari sa akin ang bagay na iyon. Nakatindig ako; naramdaman kong umaakyat 
sa aking ulo ang dugo at isang kidlat ang nagpapadilim sa aking isip. Nakita kong malayo ang 
kura, totoong malayo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Lumapit ako't upang tumutol sa kanya, na di ko maalaman kung ano ang sa kanya'y aking sasabihin. Namagitna ang sakristan 
mayor, nagtinig ang kura at sinabi sa akin sa wikang tagalog na 
nagagalit:--'Huwag mong paggamitan ako ng hiram na mga damit; magkasiya ka na 
lamang sa pagsasalita ng iyong sariling wika, at Huwag mong sirain ang wikang 
kastilang hindi ukol sa inyo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nakikilala mo ba si maestrong Ciruela? Unawain 
mong si Ciruela'y isang maestrong hindi marunong bumasa'y naglalagay ng 
											paaralanhan.'--Inakala kong siya'y pigilin, nguni't nasok siya sa kanyang kuarto 
at biglang isinara ng&nbsp; buong&nbsp; lakas ang pinto. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ano ang aking magagawa akong 
bahagya na magkasiya sa akin ang aking sueldo, na upang masingil ko ang 
sueldong ito'y aking kinakailangan ang 'visto bueno' ng kura at 
maglakbay ako sa 'kabekera' (pangulong bayan) ng lalawigan; ano ang magagawa kong laban sa kanya, na siyang pangulong puno ng 
kaluluwa, ng pamamayan at 
ng pamumuhay sa isang bayan, linalampihan ng kanyang kapisanan, kinatatakutan 
ng gobyerno, mayaman, makapangyarihan, pinagtatanungan, pinakikinggan, 
pinaniniwalaan at linilingap ng lahat?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">&nbsp;Kung inaalimura ako'y dapat akong Huwag 
umimik; kung tumutol ako'y palalayasin ako sa aking pinaghahanapang-buhay at 
magpakailan ma'y mawawala na sa akin ang katungkulan ko, datapuwa't hindi dahil 
sa pagkakagayon ko'y mapapakagaling ang pagtuturo, kung di baligtad, makikikampi 
ang lahat sa kura, karirimariman ako at ako'y tatawaging hambog, palalo, 
mapagmataas, masamang kristiano, masama, ang turo ng magulang, at kung 
magkabihira pa'y sasabihing kaaway ako ng kastila at 'filibustero.' </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi hinahanap sa maestro sa 
											paaralan ang marunong at masipag magturo; ang hinihingi 
lamang sa kanya'y ang matutong magtiis, magpakaalimura, huwag kumilos, at, 
patawarin nawa, ako ng Diyos kung aking itinakuil ang aking 'konsiyensya' at 
pag-iisip! datapuwa't ipinanganak ako sa lupaing ito, kinakailangan kong 
mabuhay, may isang ina ako, kaya't nakikisang-ayon na lamang ako sa aking 
kapalaran, tulad sa bangkay na kinakaladkad ng alon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At dahil po ba sa hadlang na ito'y 
nanglupaypay na kayo magpakailan man?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung ako nga disin 
ay nagpakadala!--ang 
isinagot;--hanggang doon na lamang sana sa mga nangyaring iyon ang dinating kong mga 
kasaliwaang palad! Tunay nga't mula, niyao'y totoong kinasusutan ko 
na ang aking katungkulan; nag-isip akong kumita ng ibang hanap-buhay na gaya 
ng aking hinalinhan, sapagkat isang pahirap ang gawa, pagka ginaganap ng 
masama sa loob at nakapagpapaalaala sa akin ang paaralanhan sa araw-araw ng 
aking pagkaalimura, na siyang nagiging dahil ng aking pag-langap ng totoong kapaitpaitang mga pagpipighati 
sa mahahabang horas. nguni't ano ang aking gagawin? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi ko mangyaring masabi ang 
katotohanan sa aking ina; 
kinakailangang kong sabihing nakapagbibigay ligaya ngayon sa akin ang kanyang 
tatlong taong mga pagpapakahirap upang ako'y magkaroon ng ganitong 
katungkulan; kinakailangang papaniwalain ko siyang ang hanap-buhay ko'y totoong 
nakapagbibigay dangal. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Na ang pagpapakapagod ko'y kawiliwili; nasasabugan ng mga bulaklak ang landas; na walang nagiging bunga ang aking pagtupad 
ng mga katungkulan kung di ang pagkakaroon ng mga kaibigan; na ako'y 
iginagalang ng bayan at pinupuspos ng mga paglingap; sapagkat kung hindi 
gayon ang aking gawin, bukod sa ako'y na sa kasawiang palad na'y 
papagdadalamhatiin ko pa ang iba, bagay na bakit wala na akong kapakinabangan ay ipagkakasala ko pa. Nananatili nga ako sa aking 
kalagayan at hindi ko minagaling na ako'y manglupaypay: binanta kong makilaban 
sa masamang palad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumigil na sandali ang maestro, at saka 
nagpatuloy:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mula ng ako'y maalimura ng gayong 
pagkagaspang-gaspang, sinulit ko ang aking sarili, at nakita kong tunay nga 
namang napakahangal ako. Pinag-aralan ko araw-gabi ang wikang kastila, at ang 
lahat ng mga nauukol sa aking katungkulan; pinahihiram ako ng mga libro ng 
matandang pilosopo, binabasa ko ang lahat ng aking nasusumpong, at sinisiyasat ko ang lahat ng aking binabasa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Dahil sa mga bagong 
kaisipang nasunduan ko sa 
isa't isa ay nagbago ang aking palakad ng bait, at aking nakita ang maraming 
bagay na iba ang anyo kay sa pagkatingin ko ng una. Nakita kong mga kamalian 
ang mga dating ang&nbsp; buong&nbsp; akala ko'y mga katotohanan, at nakita kong pawang 
mga katotohanan ang mga ipinalalagay ko ng unang mga kamalian. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga 
pamamalo, sa halimbawa, na buhat sa kaunaunahang mula'y siyang sagisag ng mga 
											paaralanhan, at ang isip ko ng una'y siyang tanging paraang lalong malakas sa 
pagkatuto,--binihasa tayo sa ganyang ang paniniwala,--aking napagwari ng matapos, 
na di lamang hindi nakatutulong ng pagsulong ng bata sa pag-aaral, kung di 
bagkos pang nakasisira sa kanya ng di ano lamang. Napagkilala kong maliwanag na 
hindi nga mangyayaring makapag-isip kung na sa mga mata ang 'palmeta' 
o ang 
mga pamalo; ang takot at ang pangingilabot ay nakagugulo ng bait kanino man, 
bukod sa ang panimdim ng bata, palibhasa'y lalong gising ay lalo namang 
madaling kalimbagan ng ano man. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">At 
											sapagkat ng mangyaring malimbag sa ulo 
ang mga kaisipan ay kinakailangang maghari ang katiwasayan, sa labas hanggang 
sa loob, na magkaroon ng katahimikan ang isip, magtamasa ng kapayapaan ang katawan at ang 
kaluluwa at magtaglay ng masiglang loob, inakala kong ang unang 
dapat kong gawin ay ang maging karayama ko ang mga bata, sa makatuwid baga'y 
huwag nila akong katakutan at ipalagay nila akong kaibigan, at ang sila'y 
matutong magmahal sa kanilang sarili. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Napagkilala ko rin namang ang kanilang 
pagkakita sa araw-araw ng pamamalo'y pumapatay sa kanilang puso ng awa, at 
pumupugnaw niyang ningas ng dangal, makapangyarihang panggalaw ng daigdig, 
at nalalakip sa gayon ang pagkawala ng hiya, na mahirap ng totoong muling 
magbalik. Naliwanagan ko rin namang pagka napapalo ang isa, nagtatamong kaaliwan 
pagka napapalo naman ang mga iba, at ngumingiti sa towa pagka naririnig 
niya ang kanilang pag-iyak; at ang pinapamamalo, baga ma't masama sa loob ang 
pagsunod sa unang araw, nabibihasa na kung matapos at ikinaliligaya ang kahapishapis niyang tungkulin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ikinalagim ko ang nagdaang panahon, aking 
pinagsikapang pagbutihin ang kasalukuyan sa pagbabago ng dating kagagawan. 
Pinaksa kong kalugdan at kawilihan ang pag-aaral, aking tinikang ang 'kartilla'y' huwag malagay na librong maitim na napapaliguan ng mga luha 
ng kamusmusan, kung di isang kaibigang sa kanya'y mag-uulat ng kagilagilalas na 
mga lihim; na ang paaralanha'y huwag maging pugad ng mga kapighatian, kung di 
isang paraisong libangan ng isip. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Untiunti ngang inalis ko ang mga pamamalo, 
dinala ko sa aking bahay ang mga pamalo, at ang inihalili ko'y ang pagbibigay 
unlak sa masisipag mag-aral at ng kaigayahan ng iba at ang pagpapakilala ng 
kanikanilang sariling dangal. Kung hindi natututo sa pinag-aaralan, 
ipinalalagay kong sa kakulangan ng pagsusumakit, kailan ma'y hindi ko 
sinasabing dahil sa kapurulan ng isip; pinapaniniwala ko silang kanilang taglay 
ang lalong masaganang kaya, kay sa tunay na abot ng kanilang lakas, at ang 
paniniwalang itong kanilang pinagsisikapang papagtibayin, ang siyang sa kanila'y 
pumipilit na mag-aral, tulad naman sa pagkakatiwala sa sariling lakas na siyang 
naghahatid sa kabayanihan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nang nagpapasimula pa lamang ako'y tila mandin hindi 
lalabas na magaling ang aking bagong palakad: marami ang hindi na nag-aaral; 
datapuwa't ipinatuloy ko, at aking namasid na unti-unting sumasaya ang mga 
loob, dumarami ang pumapasok na mga bata at lalong nagmamalimit, at ang minsang 
mapuri sa harapan ng lahat, kinabukasa'y nag-iibayo ang natututuhan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nalao't kumalat sa bayang hindi ako namamalo; ipinatawag ako ng kura, at sa 
panganganib kong baka mangyari na naman ang gaya ng una, bumati ako sa kanya ng 
mapanglaw sa wikang tagalog. Nito'y hindi siya nanglibak sa akin. Sinabi sa 
aking pinasasama ko raw ang mga bata; na sinasayang ko ang panahon; na hindi 
ako gumaganap sa aking katungkulan; na ang amang hindi namamalo ay napopoot sa 
kanyang anak, ayon sa Espiritu Santo; na ang letra'y pumapasok sa pamamagitan 
ng dugo, at iba't iba pa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sinaysay sa akin ang isang buntong mga kasabihan ng 
panahon ng mga katampalasanan, na ano pa't wari'y kasukatan ng nasabi ang 
isang bagay ng mga tao sa una upang huwag ng matutulan, at alinsunod sa 
ganitong palakad ng isip ay dapat na nga marahil nating paniwalaang nagkaroon 
sa daigdig ng mga kakilakilabot na anyo ng mga hayop na kinatha ng isip ng mga tao 
ng mga panahong iyon at kanilang iniukit sa kanilang mga palacio at mga katedral. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa kawakasa'y ipinagtagubilin sa aking ako'y magsipag at 
manumbalik ako sa unang kaugalian, sapagkat kung hindi, siya'y magsusumbong sa 
alkalde laban sa akin. Hindi huminto rito ang aking kasaliwaang palad: ng 
makaraan ang ilang araw ay nangagsirating sa silong ng kumbento ang mga ama ng 
mga bata, at nangailangan akong pasaklolo sa&nbsp; buong&nbsp; aking pagtitiis at 
pagsang-ayon. Nangagpasimula ng pagpupuri sa mga panahong unang ang mga 
maestro'y may matigas na loob at ang pagtuturong ginagawa'y tulad sa pagtuturo 
ng kanilang mga nuno.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ang mga taong yaon ang tunay na 
											mga marurunong!--ang 
sabi nila;--ang mga taong yao'y namamalo at tinutuwid ang likong kahoy. Sila'y 
hindi mga bata, sila'y matatandang malaki ang pinagdanasan, may mga buhok na 
puti at mababalasik! Si Don Catalinong hari nilang lahat na nagtatag ng 
											paaralanhang iyon, hindi nagkukulang sa dalawampu't lima ang palong ibinibigay, kaya't naging marurunong at mga 
Padre ang kanyang mga anak. Ah! mahahalaga kay sa atin ang mga tao sa una, opo, mahahalaga 
kay sa atin.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi nangagkasiya ang mga iba sa 
											ganitong magagaspang na mga 
											pasaring; sinabi nila sa aking 
											maliwanag, na kung ipatutuloy ko ang 
											aking palakad, ang kanilang mga anak 
											ay hindi matututo, at mapipilitan 
											silang alisin sa aking paaralanhan. 
											Nawalang kabuluhan ang aking mga 
											pagmamatuwid sa kanila: palibhasa'y 
											bata ako'y hindi nila binibigyan ng 
											malaking katuwiran. Gaano kalaki ang 
											aking iaalay, magkaroon lamang ako 
											ng mga uban! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Binabanggit nila sa akin ang minamagaling 
nilang pangangatuwiran ng kura, ni Fulano, ni Zutano, at binabanggit naman 
nila ang kanilang sariling katawan, at sinasabi nilang kung hindi sa mga 
pamamalo ng kanikanilang mga maestro'y hindi sana sila nangatuto ng ano man. 
Nakabawas ng kaunti ng kapaitan ng kapighatian kong ito ang magandang 
paglingap na ipinakita sa akin ng ilan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dahil sa nangyaring ito, napilitan akong 
huwag gumamit ng isang palakad, na pagkatapos ng malaking pagpapagal ay 
nagpapasimula na ng pamumunga. Sa aking pagngangalit, dinala ko kinabukasan 
sa paaralanhan ang mga pamalo, at muling sinimulaan ko ang aking katampalasanang 
gawa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nawala ang katiwasayan, at muling naghari na naman ang kapanglawan sa mga 
mukha ng mga batang nagpapasimula na ng paggiliw sa akin: sila ang tanging 
mga karayama ko, ang tangi kong mga kaibigan. Bagaman pinagsisikapan kong 
magdamot ng pamamalo, at kung namamalo man ako'y pinagagaang ko hanggang sa 
abot ng kaya; gayon ma'y dinaramdam nila ng malabis ang kanilang pagkaamis, 
ang kanilang pagkaimbi at nangagsisitangis ng di ugaling saklap. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Dumarating 
sa aking puso ang bagay na iyon, at kahit nagngitngitngit ako sa sariling 
kalooban ng laban sa kanilang haling na magugulang, gayon ma'y hindi ako 
makapanghiganti sa mga walang malay-salang tinatampalasan ng maling mga 
kaisipan ng kanilang mga ama. Nakapapaso sa akin ang kanilang mga luha: hindi 
magkasiya sa loob ng aking dibdib ang aking puso, at ng araw na iyo'y iniwan ko ang pagtuturo, 
bagaman di pa sumasapit ang horas, at omowi ako sa aking 
bahay upang tumangis na nagiisa.... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Marahil mamangha po kayo 
sa aking pagkamaramdamin, nguni't kung kayo'y malagay sa aking katayua'y inyong 
mapagkukuro. Sinasabi sa akin ng matandang Don Anastasio:--'Humihingi ng palo 
ang mga ama? Bakit hindi ninyo sila ang pinalo?' Dahil dito'y nagsasakit ako.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakikinig si Ibarrang nag-iisip isip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bahagya pa lamang akong gumagaling sa 
sakit ay nagbalik ako sa paaralanhan at nasumpungan kong ikalimang bahagi na 
lamang ang natitira sa kanila. Nangagsitakas ang mga pinakamagaling, dahil sa 
panunumbalik ng dating palakad, at sa mga natitira, sa ilang batang kaya 
pumapasok sa paaralanha'y ng hindi makagawa sa kanilang bahay, sino ma'y 
walang&nbsp;bumati sa akin sa aking paggaling: sa ganang kanila'y walang malasakit 
ang gumaling ako o hindi; marahil lalong inibiig sana nila ang ako'y manatili sa 
pagkakasakit, sapagkat tunay nga't lalong mainam mamalo ang maestrong 
panghalili sa akin, nguni't ang kapalit naman nito'y bihirang pumaroon sa 
pagtuturo sa paaralanhan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga ibang tinuturuan ko, yaong mga batang 
napipilit ng kanilang mga magulang na pumasok sa paaralanhan, ang ginagawa'y 
nangaglalagalag sa ibang dako. Binibigyang kasalanan nila ako, na sila'y aking 
pinagpakitaan ng mairuging loob at sinisisi nila ako ng mainam. Gayon man, 
ang isang anak ng tagabukid, na dumadalaw sa akin sa&nbsp; buong&nbsp; aking pagkakasakit, 
kaya hindi na pumapasok ay dahil sa siya'y nagsakristan: sinasabi ng sakristan 
mayor na hindi raw marapat na magmarani sa paaralanhan ang mga sakristan, 
											sapagkat bababa ang kanilang uri.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At nagkasiya na po ba kayo sa inyong 
mga bagong tinuturuan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May magagawa pa po ba akong ibang 
bagay?--ang isinagot.--Gayon man sapagkat maraming nangyaring mga bagay-bagay, 
samantalang may sakit ako'y nahalinhan kami ng kura. Sumibol sa akin ang isang 
bagong pag-asa, at ginawa ko na naman ang isang pamuling pagtikim, at ng huwag 
malubos na totoo ang pagkasayang ng panahon ng mga bata at pakinabangan 
hanggang sa abot ng kaya ang mga palo; na ang mga pagkahiyang iyo'y 
mapag-anihan man lamang nila ng kahit kakaunting bunga, ang siya kong inisip. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Yamang hindi nila ako mangyaring kagiliwan ngayon, ninais kong may maalaala 
sila sa aking hindi napakasaklap kung may maisimpan silang ano mang bagay na 
pakikinabangang ako ang may turo. Talastas na po ninyong na sa wikang kastila 
ang mga libro sa karamihan ng mga paaralanhan, liban na lamang sa katekismong 
tagalog na nagbabago, alinsunod sa samahan ng mga prayleng kinapapanigan ng kura. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang 
karaniwan ng mga librong ito'y mga 'novena' mga, trisagio, ang katekismo ni pari Astete, na ang nakukuba nilang kabanalan doo'y kawangis din 
kung naging sa mga erehe ang mga librong iyon. Sapagkat hindi manyaring 
sila'y aking maturuan ng wikang kastila, at hindi ko rin naman maisatagalog ang 
gayong karaming mga libro, pinapilitan kong halinhang unti-unti ng maiikling 
bahaging sipi sa mga napapakinabangang mga librong tagalog, gaya baga ng 
maliit na kasaysayan ng pakikipagkapwa tao ni Hortensio at ni Feliza, 
ilang mga maliliit na librong patnugot sa pagsasaka, at iba pa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Manakanakang 
isinasatagalog ko ang maliliit na libro, gaya ng Historia ng Filipinas ni Padre 
Barranera, at pagkatapos ay aking idinidikta, upang kanilang tipuning na sa mga 
kuaderno, at kung minsa'y aking dinaragdagan ng sariling mga pagpapahiwatig. 
											Sapagkat wala akong mga 'mapa' upang sa kanila'y makapagturo ako ng 
Geografia, sinalin ko ang isang mapang nakita ko sa 'kabekera' (pangulong bayan 
ng lalawigan), at sa pamamagitan ng sinalin kong ito, at ng mga baldosa ng 
yapakan, na iulat ko sa kanila ng kaunti ang anyo nitong ating lupain. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Ngayo'y 
ang mga babae naman ang nangagkagulo; nangagkasiya ang mga lalaki sa 
pag-ngiti, dahil sa gayong gawa ko'y kanilang namamasdan daw ang isa sa aking 
mga kaululan. Ipinatawag ako ng bagong kura, at kahit hindi ako pinag-wikaan, 
gayon ma'y sinabi sa aking ang religion daw ang dapat kong pagsikapan, at bago 
ko ituro ang mga bagay na ito'y dapat na ipakilala ng mga bata, sa 
pamamamag-itan ng isang pagsusulit, na totoong nasasaulo na nila ang mga 
Misterio, ang Trisagio at ang Catolikismo ng Doktrina Cristiana.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantala'y nagpapagal nga ako at ng 
maging 'papagayo' 
ang mga bata, at kanilang masaulo ang lubhang maraming bagay na hindi 
napagtatalos isa man lamang salita. 
Marami sa kanila ang nakasasaulo ng mga 'Misterio' at 'Trisagio', 
datapuwa't nanganganib akong masayang ang aking mga pagpupumilit tungkol sa 
kay Padre Astete, sapagkat hindi pa totoong napag-wawari ng marami sa aking 
mga tinuturuan ang pagkakaiba't iba ng mga tanong at ng mga sagot, at ang 
dapat na maging kahulugan ng dalawang ito. At sa ganitong kalagaya'y 
mamamatay tayo, at ganyan din ang gagawin ng mga ipanganganak, samantalang 
sa Europa'y pinag-uusapan ang nauukol sa pagsulong.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag baga naman 
tayong napakamahiligin sa pag-asang dito sa atin ay wala ng kagalingang 
mangyayari!--ang itinutol ni 
Ibarra, at saka nagtindig. Pinahatdan ako ng isang anyaya ng teniente mayor 
upang ako'y dumalo sa isang pulong sa tribunal ... Sino ang nakaaalam kung 
doo'y magkakaroon po kayo ng sagot sa inyong mga tanong?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagtindig din ang maestro sa 
paaralan, 
nguni't umiiling, tanda ng pagkukulang tiwala, at sumagot:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Makikita ninyo't 
matutulad sa aking mga binalak ang layong kanilang sinabi sa akin, at kung 
hindi, tingnan natin!</font></p>
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