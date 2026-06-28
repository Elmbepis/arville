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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XX. Ang Pulong sa Tribunal</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Yao'y isang salas na may labingdalawa o 
labing-limang metro ang haba may walo o sampung metro ang luang. Ang mga pader 
ng salas na iyo'y pinaputi ng pintang apog at punong-puno ng mga dibujong uling ang iginuhit na 
humigit 
kumulang ang kapangitan, humigit kumulang ang kasalaulaan, na may mga kahalong paunawang sulat upang mapag-unawang magaling 
ang mga kahulugan noon. Namamasdan sa isang sulok na nakasandal ng mahusay na 
pagkakahanay ang may sampung mga lumang fusil na batong pingkian ang 
pangpaputok na kahalo ng sableng kalawangin, mga espadin at mga talibong: yaon 
ang mga sandata ng mga 'kuadrillero.'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa isang dulo ng salas na napapapamutihan 
ng maruruming mga 'kortinang' pula, natatago ang larawan ng hari, na 
nakasabit sa pader, nakapatong sa isang tarimang kahoy ang isang lumang sillong 
nakabuka ang kanyang wasak na mga brazo; sa harapa'y may isang malaking mesang kahoy na narurungisan ng tinta na may mga 
ukit na mga salita at mga unang 
letra ng pangalan kawangis ng marami sa mga mesa sa mga tindahan ng alak 
at kerveza sa Alemania, na karaniwang paroonan ng mga estudiante. Manga 
sirang bankko at silla ang siyang nakahuhusto ng mga kasangkapan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ito ang salas na pinagpupulungan ng 
tribunal, ng mga pagpapahirap at iba pa. Dito nagsasalitaan ngayon ang mga 
puno ng bayan at ng mga nayon: hindi nakikihalo ang pangkat ng mga 
matatanda sa pangkat ng mga bata, at hindi nangagkakasundo ang isa't isa; 
sila ang mga kinakatawan ng partido konservador at ng partido liberal, ang 
nagiging katangia'y totoong napapakalabis sa mga bayan ang kanilang mga 
pagtatalotalo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nakakapagkulang-tiwala sa akin ang asal 
ng gobernadorcillo!--ani Don Filipong puno ng partido liberal sa kanyang mga katoto; may dati 
siyang talagang pakay siya totoong ipinagpahuli niya ang pagtutuos ng balak na 
gugugulin. Unawain ninyong labing-isang araw na lamang ang sa ati'y natitira.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At natira siya sa kumbento upang 
makipagsalitaan sa kurang may sakit!--ipinaalaala ng isa sa mga bata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi kailangan!--ang sinabi naman ng 
isa;--ang lahat, ay naihanda na natin. Huwag ba lamang magkaroon ng lalong 
maraming 'boto' ang balak ng mga matatanda....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko inaakalang magkaroon!--ani Don 
Filipo;--ako ang maghaharap ng balak ng mga matatanda....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit? ano ang sabi po ninyo?--ang sa 
kanya'y mga tanong ng mga nakikinig sa kanyang pawang nangagtataka.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang sinasabi ko'y kung ako ang unang 
magsasalita'y aking ihaharap ang balak ng ating mga kaaway.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ang balak natin?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kayo po naman ang maghaharap ng balak 
natin--ang sagot ng tenienteng ngumingiti, na ang pinagsasabiha'y isang batang 
kabeza de barangay;--magsasalita po kayo, pagka ako'y natalo na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi po namin mawatasan ang inyong kaisipan!--ang sabi sa kanya ng mga 
kausap, na minamasdan siyang puspos ng 
pag-aalinlangan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pakinggan ninyo!--ang marahang sinabi ni 
Don Filipo sa dalawa o sa tatlong nakikinig sa kanya--Nakausap ko kaninang umaga 
si matandang Tasio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sinabi sa akin ng matanda: 'Kinapopootan 
po kayo ng inyong mga kaaway ng higit sa pagkapoot sa inyong mga kaisipan. 
Ibig baga ninyong Huwag mangyari ang isang bagay? Kung gayo'y kayo ang 
humikayat na gawin ang bagay na iyan, at kahit ang bagay na iya'y 
pakikinabangang higit kay sa isang 'mitra' ay ipagtatakwilan. Kung kayo'y 
matalo na, inyong ipasabi ang inyong linalayon sa lalong kababababaan sa lahat 
ninyong mga kasamahan, at sasang-ayunan ang inyong layong iyon ng inyong mga 
kaaway, sa hangad nilang kayo'y hiyain.' Datapuwa't inyo sanang ingatan ang 
lihim kong ito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kaya nga ako ang siyang magsasalita 
upang gawin ang panukala ng ating mga kaaway, na ano pa't pakalalabisin ko ang 
pangangatuwiran hanggang sa katawa-tawa. Huwag kayong maingay! Narito na si 
Ginoong Ibarra at ang maestro sa paaralan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bumati ang dalawang binata 
sa isa't isang pulutong; nguni't hindi nakialam sa mga salitaan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nalao't pumasok ang 
gobernadorcillong malungkot ang pagmumukha: siya rin ang nakita natin kahapong 
may dalang isang arrobang kandila. Huminto ang mga alingawngaw pagpasok niya; 
bawa't isa'y naupo at untiunting naghari ang katahimikan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Naupo ang gobernadorcillo sa sillong 
nakalagay sa ibaba ng larawan ng hari, makaapat o makalimang umubo, hinaplos 
ang ulo at ang mukha, inilagay ang siko sa ibabaw ng mesa, inalis, muling umubo 
at gayon ang paulit-ulit na ginawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--mga ginoo!--ang sinabi sa kawakasang 
nanglulupaypay ang boses:--nangahas akong anyayahan ko kayong lahat sa 
pagpupulong na ito ... ejem!... ejem!... gagawin natin ang piyesta ng ating 
pintakasing si San Diego sa ika 12 nitong buwan.... ejem!... ejem!... ngayo'y 
ika 2 tayo ejem!... ejem!...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At dito'y inubo siya ng mahaba at tuyo na 
siyang pumigil ng kanyang pagsasalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang magkagayo'y tumindig sa bangko ng mga matatanda ang isang taong may anyong makisig, na may 
mga apat na pong taon 
ang gulang. Siya ang mayamang si kapitang Basilio, kaaway ng nasirang si Don 
Rafael, isang taong nagsasabing umano'y mula ng mamatay si Santo Tomas de 
Aquino, ang mundo'y hindi sumusulong ng kahit iisang hakbang, at mula ng kanyang 
iwan ang San Juan de Letran, nagpasimula ang Sangkatauhan ng pag-udlot.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Itulot po ng mga kamahalan ninyong 
magsaysay ako tungkol sa isang bagay na totoong mahalaga--anya. Ako ang naunang 
nagsalita, bagaman lalong may karapatang mangauna sa akin ang mga kaumpok 
dito, nguni't ako ang unang nagsalita, sapagkat sa akala ko'y sa mga 
ganitong bagay, ang magpasimula ng pananalita'y hindi ang kahuluga'y siyang 
nangunguna, at gayon ding hindi ang kabuntutan ang kahulugan ng 
kahulihulihang magsaysay. Bukod sa rito'y ang mga bagay na sasabihin ko'y 
lubhang napakamahalaga upang maipagpaubaya o sabihin kaya sa kahulihulihan; ito 
ang dahil at ibig ko sanang magpauna ng pananalita, at ng maibigay ang dapat 
na kaukulan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Itulot nga ninyong ako ang maunang magsalita sa pulong na itong 
kinakikitaan ko ng mga nalilimping totoong mga litaw na mga tao, gaya na nga ng 
ginoong kasalukuyang kapitan, 
ng kapitan pasado, ng kaibigan kong 
tanging si Don Valenting kapitan pasado, ang aking kaibigan sa kamusmusang si 
Don Julio, ang ating bantog na kapitan ng mga kuadrillerong si Don Melchor, at 
marami pang mga kaginoohang di ko na sasabihi't ng huwag akong humaba, na 
nakikita&nbsp;ng inyong mga kamahalang pawang kaharap natin 
ngayon ipinamanhik ko po sa inyong mga kamahalan ipahintulot na ako'y 
makapagsalita bago magsalita ang ibang sino man. Magtatamo kaya ako ng 
kapalarang pahinuhod ang kapulungan sa aking mapakumbabang kapamanhikan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At saka yumukod ang mananalumpati ng&nbsp; 
buong&nbsp; paggalang at ga ngumingiti na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Makapagsasalita na kayo, 
sapagkat 
kayo'y pinakikinggan namin ng&nbsp; buong&nbsp; pagmimithi!--ang sinabi ng mga binangit 
na mga kaibigan, at iba pang mga taong nangagpapalagay na siya'y dakilang 
mananalumpati: nangag-uubo ng&nbsp; buong&nbsp; ligaya ang mga matatanda at kanilang 
pinagpipisil ang dalawang kamay. Pagkatapos na makapagpahid ng pawis si kapitan 
Basilio ng kanyang panyong sutla, ay nagpatuloy ng pananalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Yamang lubhang napakaganda ang inyong 
kalooban at mapagbigay lugod sa ating abang katauhan, sa pagkakaloob sa aking 
ako ang makapagsalitang mauna sa sino mang naririto, sasamantalahin ko ang 
kapahintulutang itong sa aki'y ipinagkaloob ng&nbsp; buong&nbsp; kagandahan ng puso at 
ako'y magsasalita. Iniisip ng aking isip na ako'y sumasagitna ng kagalanggalang na Senado romano, 
'senatus populusque romanus', na sinasabi natin 
niyong mga kaayaayang panahong sa kakulangang palad ng Sangkatauha'y hindi na 
magbabalik, at aking hihingin sa 'Patres Conskripti', ang 
sasabihin marahil ng pantas na si Cikeron, kung siya ang malagay sa katayuan ko 
ngayon; hihingin ko, sapagkat kapos tayo sa panahon, at ang panaho'y ginto, ayon sa sabi ni Salomon na sa mahalagang pinag uusapan ngayo'y sabihing 
maliwanag, maikli at walang&nbsp;ligoy-ligoy ng bawa't isa ang kanyang panukala. 
Sinabi ko na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At taglay ang&nbsp; buong&nbsp; pagkalugod sa kanyang 
sariling katauhan at sa magaling na pakikinig sa&nbsp;kanya ng nangaroroon, naupo 
ang mananalumpati, datapuwa't kanyang tiningnan muna si Ibarra at anyong 
nagpapakilala siya ng kanyang kataasan, at kanyang tiningnan din naman ang 
kanyang mga kaibigan, na para manding sa kanila'y kanyang sinasabi: Ha! Mabuti 
ba ang aking pagkakasalita? ha!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Inilarawan naman ng kanyang mga kaibigan 
sa kanilang mga mata ang dalawang pagtinging iyon, sa kanilang pagsulyap sa 
mga batang ginoo, na ibig nilang patayin sa kainggitan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ngayo'y makapagsasalita na ang bawa't 
may ibig, na ... ejem!--ang sinabi ng gobernadorcillo, na hindi natapos ang 
sinasalita, muling siya'y inihit ng ubo at ng mga pagbubuntong hininga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ayon sa hindi pag-imik na namamasid, sino 
ma'y ayaw na siya'y tawaggin 'patres konskripti', sino ma'y walang tumitindig: 
ng magkagayo'y sinamantala ni Don Filipo ang nangyayari at huminging 
pahintulot na makapagsalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nangagkindatan at nangaghudyatan ng 
makahulugan ang mga konservador.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ihaharap ko, mga ginoo, ang aking 
panukalang gugugulin sa piyesta! ani Don Filipo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi namin masasang-ayunan!--ang sagot 
ng isang natutuyong matandang konservador na hindi mapaklihan ng ano man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Laban sa panukalang iyan ang aming boto!--ang sabihan ng ibang mga kaaway.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--mga ginoo!--ani Don Filipong pinipigil ang 
pagtawa;--hindi ko pa sinasabi ang panukalang dala rito naming mga 'bata'. 
'Lubos' ang aming pagasa na siyang mamagalingin ng 'lahat' kay sa pinapanukala 
o mapapanukala ng aming mga katalo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang palalong pasimulang ito ang siyang 
nakapuspos ng galit sa kalooban ng mga konservador, na nagsisipanumpa sa 
kanilang sariling kanilang gagawin ang katakottakot na pagsalangsang. Nagpatuloy 
ng pananalita si Don Filipo:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tatlong libo't limandaang piso ang 
inaakala nating gugulin. Mangyayaring makagawa nga tayo, sa pamamagitan ng 
salaping ito ng isang piyestang makahihigit ng di ano lamang sa kaningningan 
sa lahat ng hangga ngayo'y napanood dito sa ating lalawigan at sa mga 
lalawigang karatig man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hmjn!--ang pinagsabihan ng mga hindi 
naniniwala; gumugugol ang bayang A. ng limang libo, ang bayang B. nama'y apat 
na libo--Hmjn! kahambugan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pakinggan ninyo 
ako, mga ginoo, at kayo'y maniniwala. Aking iniaakit sa inyong tayo'y magtayo ng 
isang malaking teatro sa gitna ng plaza, na maghalagang isang daa't limampong 
piso!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi kasiya ang isang daa't limampo, 
kinakailangang gumugol ng isang daa't anim na po!--ang itinutol ng isang 
matigas ang ulong konservador.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ititik po ninyo, ginoong direktor, ang 
dalawang daang pisong iniuukol sa teatro!--ani Don Filipo.--Iniaanyaya kong 
makipagkayari sa komedia sa Tundo upang magpalabas sa pitong gabing sunod sunod. 
Pitong palabas na tigdadalawang daang piso bawa't gabi, ang kabooa'y isang libo 
at apat na raang piso: isulat po ninyo, ginoong direktor, isang libo't apat na 
raang piso!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nangagtinginan ang matatanda't ang mga 
bata sa panggigilalas; ang mga nakatatalos lamang ng lihim ang hindi 
nangagsikilos.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Iniaanyaya ko rin namang magkaroon tayo 
ng maraming totoong mga paputok; huwag nga tayong gumamit ng maliliit na 'lukes' at ng mga maliliit na 
'ruedang' kinalulugdan lamang ng mga musmos at ng mga dalaga, 
huwag tayong gumamit&nbsp;ng lahat ng ito. Malalaking mga bomba at sadyang 
malalaking mga kohaton ang ibig natin. Iniaanyaya ko nga sa inyo ang 
pagkakagugol sa dalawang daang malalaking bomba na tigalawang piso bawa't isa at 
dalawang daang kohatong gayon din ang halaga. Ipagawa natin sa mga kastillero 
sa Malabon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hmjn!--ang isinalabat ng isang 
matanda:--hindi nakakagulat sa akin at hindi rin nakabibingi ang isang bombang 
tigalawang piso; kinakailangang maging tigatlong piso.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isulat po ninyo ang 
isang libong pisong gugugulin sa dalawang daang bomba at dalawang daang koleton!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi na nakatiis ang mga konservador; 
nangagtindigan ang ilan at nangagsalitaan ng bukod.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bukod pa sa roon, upang makita ng ating 
mga kapit-bayang tayo'y mga taong walang hinayang at nagkakanlalabis sa atin 
ang salapi--ang ipinagpatuloy ni Don Filipo, na itinaas ang boses at matuling 
sinulyap ang pulutong ng mga matatanda,--aking iniaanyaya: una, apat na 
'hermano mayor' sa dalawang araw na piyesta, at ikalawa, ang itapon sa dagatan sa 
araw araw ang dalawang daang inahing manok na pinirito, isang daang kapong 
'rellenado' at limampong lechon, gaya ng ginagawa ni Sila, sa panahon ni 
Cieston, na bagong kasasabi pa lamang ni kapitang Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siya nga, gaya ni Sila!--ang ikulit ni 
kapitang Basilio, na na totowa ng pagkabanggit sa kanya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Lumalaki ng lumalaki ang pagtataka.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--sapagkat marami ang dadalong mayayaman 
at bawa't isa'y may dalang libolibong piso, at saka ang kanilang lalong magaling 
na sagabungin, at ang 'liampo' at mga baraja, ini anyaya ko sa iyo na tayo'y 
magpasabong ng labinglimang araw, at magbigay kalayaang mabuksan ang lahat ng 
mga bahay ng sugalan....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't nangagtindig ang mga kabataan 
at siya'y sinalabat: ang&nbsp; buong&nbsp; akala nila'y nasira ang isip ng teniente mayor. 
Nangagtatalotalo ng mainam ang mga matatanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At sa kawakasan, ng huwag mapabayaan ang 
mga kaligayahan ng kaluluwa....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Natakpang lubos ang kanyang boses ng mga 
bulongbulungan at ng mga sigawang sumibol sa lahat ng sulok ng salas: yao'y 
naging isang kaguluhan na lamang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi!--ang isinigaw ng isang matalik na 
konservador;--ayaw kong maipangalaratak niyang siya ang nakagawa ng piyesta, ayaw. Pabayaan, 
pabayaan ninyong ako'y makapagsalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dinaya tayo ni Don Filipo!--ang 
sinasalita naman ng mga liberal. Boboto kami ng laban sa kanya! Cumampi siya 
sa matatanda! Bomoto tayo ng laban sa kanya!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang gobernadorcillo, na higit ang 
panglulupaypay sa kailan man; walang ginawa kahit ano upang manag uli ang katiwasayan: naghihintay na sila ang 
kusang tumiwasay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Huminging pahintulot ang kapitan ng mga 
kuadrillero upang magsalita; pinagkalooban siya, datapuwa't hindi binuksan ang 
bibig, at muling naupong nakikimi at puspos kahihiyan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang kabutiha'y nagtindig si kapitang 
Valenting siyang pinakamalamig ang loob sa lahat ng mga konservador, at 
nagsalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi kami makasang-ayon sa palagay na 
munakala ng teniente mayor, sapagkat sa ganang amin ay napaka labis naman. 
Ang gayong mapakaraming mga bomba at ang gayong napaka raming gabi ng 
pagpapalabas ng komedia'y ang makakaibig lamang ay ang isang batang gaya ng 
teniente mayor, na makapagpupuyat ng maraming gabi at makapakikinig ng 
maraming putok na di mabibingi. Itinanong ko ang pasiya ng mga taong matalino 
at nagkakaisa ang lahat sa hindi pagsan-ayon sa panukala ni Don Felipo. Hindi 
ba ganito, mga ginoo?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tunay nga! tunay nga! ang sabay sabay 
na pinagkaisahang sagot ng mga bata't matanda. Nangalulugod ang mga bata sa 
pakikinig sa gayong pananalita ng isang matanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang ating gagawin sa apat na mga 
hermano mayor!--ang ipinatuloy ng matanda.--Ano ang kahulugan niyong mga 
inahing manok, mga kapon at mga lechong itatapon sa dagatan? Cahambugan! ang 
sasabihin ng mga kalapit-bayan natin, at pagkatapos ay magsasalat tayo sa 
pagkain sa loob ng kalahating taon. Ano't makikiwangis tayo kay Sila o sa mga 
romano man? Tayo ba'y inanyayahan minsan man lamang sa kanilang mga piyesta? Ako 
sa gannang akin, lamang, kailan ma'y hindi pa ako nakatatanggap ng ano mang 
kanilang liham na pang-anyaya, gayong ako'y matanda na!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang mga romano'y tumahan sa Roma. 
Kinalalagyan ng papa!--ang marahang sa kanya'y ibinulong ni kapitang Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ngayon ko napagkilala!--ang 
sinabi ng matandang hindi nagulomihanan. Marahil ginawa ang kanilang piyesta 
kung 'vigilia' at ipinatatapon ng papa ang pagkain at ng Huwag magkasala. 
nguni't sa paano mang bagay, hindi mangyayaring masang-ayunan ang inyong 
panukalang piyesta, sapagkat isang kaululan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Napilitan si Don Filipong iurong ang 
kanyang panukala; dahil sa totoong sinasalansang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga lalong matatalik na mga 
konservador sa kanilang kaaway, hindi nangagdamdam ng ano mang pag-aalap-ap 
ng makita nilang tumindig ang isang batang kabeza de barangay at huminging 
pahintulot na makapagsalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ipinamamanhik ko sa inyong mga 
kamahalang ipagpaumanhing baga ma't bata ako'y mangahas magsalita sa harap ng 
lubhang maraming taong totoong kagalanggalang dahil sa kanilang gulang at dahil 
naman sa katalinuhan at karunungang magpasiya ng tapat sa lahat ng bagay, 
nguni't sapagkat ang kaayaayang mananalumpating si kapitang Basilio'y 
nag-aanyayang saysayin dito ng lahat ang kanikanilang mga panukala, maging 
pinakakalasag ng aking kauntian ang kanyang mahalagang pananalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumatango, sa pagkalugod, ang mga 
konservador.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Magaling magsalita ang batang 
ito!--Siya'y mapagpakumbaba!--Kagilagilalas kung mangatuwiran!--ang sabihan 
ng isa't isa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sayang at hindi marunong kumiyang 
magaling!--ang pasiya ni kapitan Basilio.--nguni't nangyayari ito dahil sa hindi 
siya nag-aral kay Cikeron, at saka totoong bata pa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi kaya isinasaysay ko sa inyo ang 
isang palatuntunan o panukala,--ang ipinatuloy na salita ng batang kabeza,--ay 
hindi dahil sa ang isip ko'y inyong mamagalingin o inyo kayang sasang-ayunan: 
ang aking hangad, kasabay ng aking muli pang pangangayupapa sa kalooban ng 
lahat, ay patotohanan sa mga matatandang sa tuwi na'y sang-ayon ang aming 
isipan sa kanilang isip, sapagkat aming inaangkin ang lahat ng mga adhikang 
isinaysay ng&nbsp; buong&nbsp; kaningningan ni kapitang Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mabuting pananalita! mabuting 
pananalita!--ang sabihanan ng mga pinauunlakang mga konservador. Hinuhudyatan 
ni kapitang Basilio ang bata upang sa kanya'y sabihin kung paano ang marapat na 
paggalaw ng bisig at kung paano ang akma ng paa. Ang gobernadorcillo ang 
tanging nananatili sa hindi pagpansin, nalilibang o may ibang iniisip: 
nahihiwatigan ang dalawang bagay na ito sa kanya. Nagpatuloy ang bata ng 
pagsasaysay, na nalalao'y lalong sumasaya ang pananalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naoowi, mga ginoo, ang aking panukala sa 
sumusunod: mag-isip ng mga bagong panooring hindi karaniwan at laging 
nakikita natin sa araw-araw, at pagsikapang huwag 
umalis dito sa bayan ang salaping nalikom, at huwag gugulin sa walang kabuluhang 
mga polvora, kung hindi gamitin sa ano mang bagay na pakinabangan ng lahat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Iyan nga! iyan nga!--ang isinang-ayong 
salita ng mga bata; iyang ang ibig nga namin--totoong magaling--ang idinugtong 
ng mga matatanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang mahihita natin sa isang linggong 
komediang hinihingi ng teniente mayor? Ano ang matututuhan natin sa mga hari 
sa Bohemia at Granada, na nangag-uutos na putlin ang ulo ng kanilang mga anak 
na babae, o kung dili kaya'y ikinakarga sa isang ka&ntilde;on ang mga anak na babaeng 
iyan at bago nagiging trono ang ka&ntilde;on? Tayo'y hindi mga hari, hindi tayo mga 
tampalasang taong-parang, wala naman tayong mga ka&ntilde;on, at kung sila'y ating 
parahan ay bibitayin tayo sa Bagongbayan. Ano baga ang prinsesang iyang 
nakikihalobilo sa mga paghahamok, namamahagi ng taga at ulos, nakikipag-away 
sa mga prinkipe at naglilibot na nangag-iisa sa mga bundok at parang, na 
kawangis ng nangatitigbalang? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Kinalulugdan natin, ayon sa ating kaugalian, 
ang katamisan at ang pagkamasintahin ng babae, at manganganib tayong 
tumangan sa mga kamay ng isang binibining narurungisan ng dugo, kahit na 
ang dugong ito'y sa isang moro o gigante; bagaman ang dugong ito'y sa 
pinawawal-an nating halaga, palibhasa'y ipinalalagay nating imbi ang lalaking 
nagbubuhat ng kama'y sa isang babae, kahit siya'y prinkipe, alperes, o 
tagabukid na walang pinag-aralan. Hindi kaya libolibong magaling na ang 
palabasin natin ay ang larawan ng ating sariling mga kaugalian, upang mabago 
natin ang ating masasamang mga pinagkaratihan at mga lihis na hilig at purihin 
ang magagandang gawa at kaugalian?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Iyan nga! iyan nga!--ang inulit ng kanyang mga 
kakampi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sumasakatuwiran!--ang ibinulong na 
nangagdidilidili ang ilang matatanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko naisip kailan man ang bagay na 
iyan!--ang ibinulong ni kapitang Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't paano ang paggawa ninyo 
niyan?--ang itinutol sa kanya ng isang mahirap sumang-ayon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Magaang na magaang!--ang sagot ng bata. 
Dala ko rito ang dalawang komedia, na marahil pasisiyahang totoong 
masasangayunan at katowatowa ng mga kagalanggalang na matatandang dito'y 
nalilimpi, palibhasa'y lubos ang pagkatalos nila sa bawa't maganda at kilala 
naman ng lahat ang kanilang katalinuhan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang pagmagat ng isa'y <span class="smcap">
Ang pag-hahalal ng Gobernadorcillo</span>, ito'y isang komediang patupatuloy 
ang pananalita, nababahagi sa limang pangkat, katha ng isa sa mga nariritong 
kaharap. At ang isa'y may siyam na bahagi, ukol sa dalawang gabi, isang talinghagang 'drama' na ang pamimintas ang 
tukoy, sinulat ng isa sa lalong magaling na poeta dito sa lalawigan at
<span class="smcap">Mariang Makiling</span> ang pamagat. Nang aming mamasdang 
naluluatan ang pagpupulong ng nauukol sa paghahanda ng piyesta, at sa 
panganganib naming baka kulangin ng panahon, lihim na humanap kami ng aming 
mga 'aktor' at pinapag-aral namin sila ng kanikanilang 'papel'. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Inaasahan 
naming sukat na ang isang linggong pagsasanay upang sila'y makaganap ng 
magaling sa kanikanilang ilalabas. Ito, mga ginoo, bukod sa bago, 
pakikinabangan at sang-ayon sa mahusay na kaisipan at may malaking kagalingang 
hindi malaki ang magugugol: hindi natin kailangan ang pananamit: magagamit 
natin ang ating suot na karaniwan sa pamumuhay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ako ang gugugol sa teatro!--ang isigaw na 
malaking tawa ni kapitang Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sakali't may lumalabas na mga 
kuadrillero, aking ipahihiram ang aking mga nasasakop--ang sabi naman ng 
kapitan ng mga kuadrillero.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ako ... at ako ... kung 
nagkakailangan ng isang matanda ... ang sinabing hindi magkatuto ng isa, at 
naghuhumiyad ng pagmamakisig.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sang-ayon kami! sang-ayon kami!--ang 
sigawan ng marami.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Namumutla ang teniente mayor: napuno ng 
mga luha ang kanyang mga mata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siya'y tumatangis sa 
pagngingitngit!--ang inisip ng mahigpit na konservador, at sumigaw:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sang-ayon kami, 
sang-ayon kami, at hindi kailangang pagmatuwiranan pa!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At sa kanyang galak sa kanyang 
pagkapanghiganti at sa lubos na pagkatalo ng kanyang kaaway, pinasimulan ng 
lalaking iyon ang pagpapaunlak sa panukala ng bata. Nagpatuloy ito ng 
pananalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Magagamit ang ikalimang bahagi ng 
salaping nalilikom sa pamamahagi ng ilang ganting pala, sa halimbawa, sa 
lalong mabuting batang nag-aral sa paaralan, sa lalong mabuting pastol, 
magsasaka, mangingisda, at iba pa. Makapagtatatag tayo ng isang unahan ng 
patakbuhan ng mga bangka sa ilog at sa dagatan, patakbuhan ng mga kabayo; 
magtayo ng mga 'palosebo' at mag-anyo ng mga larong mangyayaring makisama 
ang tagabukid natin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sumasang-ayon na ako, alang-alang sa totoong pinagkaugalian 
na, ang tayo'y magkaroon ng mga paputok: marikit at katuwa-tuwang panoorin ang 
mga 'rueda' at mga 'kastillo', nguni't inaakala kung hindi natin kailangan 
ang mga bombang panukala ng teniente mayor. Kasukatan na, sa pagbibigay 
kasayahan sa piyesta, ang dalawang bandang musika, at sa ganya'y maiilagan natin 
iyang mga pag-aaway at pagkakagalit, na ang kinahihinatna'y ang mga kaawa-awang musikong naparirito't ng bigyang galak ang ating mga pagpipiyesta, 
sa pamamagitan ng kanilang pagpapagal, nagiging tunay na mga 
sasabunging manok, na nangagsisiowi, pakatapos, na masama, ang sa kanila'y 
pagkakabayad, masama ang pagkakapakain, bugbog ang katawan at sugatan pa kung 
makabihira. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Mapasisimulaan ang pagpapagawa ng isang maliit na bahay na magamit 
na paaralanhan, sa pamamagitan ng lalabis na salapi, sapagkat hindi nga 
natin hihintaying ang Diyos ay manaog at siyang gumawa ng paaralanhang iyan: 
kapanglaw-panglaw ngang bagay, na samantalang tayo'y may isang sabungang 
pangulo sa laki at ganda, ang mga bata natin ay nangag-aaral halos doon sa 
alagaan ng mga kabayo ng kura. Sa maikling salita'y narito ang panukala: ang 
pagpapainam nito'y siyang pagkakapaguran.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Maaliw na bulungbulungan ang siyang 
sumilang sa salas; halos ang lahat ay sumasang-ayon sa bata: iilan lamang ang 
bumubulong:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--mga bagong bagay! mga bagong bagay! 
Sa ating mga kinabataa'y!...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ating sang-ayunan na muna ngayon 
iyan!--ang sabihan ng mga iba;--ating hiyain iyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At kanilang itinuturo ang teniente mayor.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang manumbalik ang katahimikan, ang lahat 
ay sumang-ayon na. Kulang na lamang ang pasiya ng gobernadorcillo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ito'y nagpapawis, hindi mapakali, 
hinahaplos ang noo at sa kawakasa'y nasabi ng pautal-utal, na nakatungo:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ako ma'y sang-ayon din!... 
nguni't ejem!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi umiimik ang&nbsp; buong&nbsp; tribunal ng 
pakikinig sa kanya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't?--ang tanong ni kapitang 
Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Totoong sang-ayon ako!--ang inulit ng 
gobernadorcillo;--sa makatuwid baga'y ... hindi ako sang-ayon ... ang sinasabi 
ko'y sang-ayon ako; nguni't ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At kinuskos ang mga mata ng kamaoo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't ang kura,--ang ipinagpatuloy ng 
kulang palad--ibang bagay ang ibig ng Padre kura.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nagkakagugol ba ang kura sa piyesta o 
tayo ang nagkakagugol? Nagbigay ba siya ng isang kuarta man lamang?--ang sigaw ng 
isang boses na nanunuot sa tainga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumingin ang lahat sa dakong 
pinanggagalingan ng mga tanong na iyon: si Pilosopo Tasyo ang naroroon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi kumikilos ang teniente mayor at 
nakatitig sa gobernadorcillo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano ang ibig ng kura?--ang itinanong 
ni kapitang Basilio.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba! ang ibig ng kura'y ... anim na 
prokesion, tatlong sermon, tatlong malalaking misa ... at kung may lumabis na 
salapi, komediang Tundo at kanta sa mga pag-itan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ayaw namang kami ng lahat ng iyan!--ang 
sinabi ng mga bata at ng ilang matanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siyang ibig ng Padre kura!--ang inulit 
ng gobernadorcillo.--Aking ipinangako sa kurang magaganap ang kanyang kalooban.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y bakin inanyayahan pa ninyong 
kami magpulong?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Inanyayahan ko 
kayo't ... ng sa inyo'y aking sabihin ang gayong bagay!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At bakit hindi ninyo sinabi sa 
pagsisimula pa ng salitaan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ibig ko sanang sabihin, mga ginoo, nguni't nagsalita si 
kapitang Basilio'y hindi na ako nagkapanahon ...! kinakailangang sumunod sa 
kura!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kinakailangang sumunod tayo sa 
kanya!--ang inulit ng ilang matatanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kinakailangang sumunod, 
sapagkat kung 
hindi, tayo'y ibibilanggong lahat ng alkalde!--ang idinugtong ng&nbsp; buong&nbsp; 
kapanglawan ng iba, namang matatanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y sumunod, kayo at kayo na 
lamang ang gumawa ng piyesta!--ang ipinagsigawan ng mga bata--iniuurong namin 
ang aming mga ambag!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nasingil ng lahat!--ang sinabi ng 
gobernadorcillo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Lumapit si Don Filipo sa gobernadorcillo 
at saka sinabi niya rito ng&nbsp; buong&nbsp; kapaitan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Inihandog ko sa pagkaamis ang pag-ibig ko 
sa aking sarili upang magtagumpay lamang ang magandang kaisipan; kayo nama'y 
inihayin ninyo sa pagkaapi ang inyong kamahalan upang manalo ang masamang 
panukala, at inyong iniwasak ang lahat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantala'y--isinasabi naman ni Ibarra sa 
maestro ng paaralan:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May-ibig ba kayong ipagbilin sa 
pangulong bayan ng lalawigan? Paroroon ako ngayon din.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mayroon po ba kayong pakikialaman doon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mayroon po tayong pakikialaman doon!--ang 
talinghagang sagot ni Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa daa'y sinasabi ng matandang pilosopo 
kay Don Filipong sinusumpa ang sariling palad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tayo ang may kasalanan! 
Hindi kayo tumutol ng kayo'y bigyan nila ng aliping sa inyo'y magpuno, at aking 
nalimutan ang bagay na ito, sa aking kahalingan!</font></p>
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