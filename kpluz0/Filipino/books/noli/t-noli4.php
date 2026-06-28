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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">IV. Ang Ereje at Pilibustero</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-aalinlangan si Ibarra. Ang hangin sa 
gabi, na sa mga buwang iyo'y karaniwang may kalamigan na sa Maynila, ang siyang 
tila mandin pumawi sa kanyang noo ng manipis na ulap na doo'y nagpadilim: 
nagpugay at huminga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagdaraan ang mga kotseng tila mga 
kidla't, mga kalesang paupahang ang lakad ay naghihingalo, mga naglalakad na 
taga iba't ibang nacion. Taglay iyang paglakad na hindi nangagkakawangis ang 
hakbang, na siyang nagpapakilala sa natitilihan o sa walang magawa, tinungo ng 
binata ang dakong plaza ng Binundok, na nagpapalingap-lingap sa magkabikabila 
na wari'y ibig niyang kumilala ng ano man. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Yao'y ang mga dating daan at mga 
dating bahay na may mga pintang puti at asul at mga pader na pinintahan ng puti o 
kung dili kaya'y mga anyong ibig tularan ang batong 'granito' ay masama 
ang pagkakahuwad; nananatili sa kampanario ng simbahan ang kanyang relos na may 
karatulang kupas na; iyon ding mga tindahan ng intsik na iyong may maruruming 
tabing na nasasampay sa mga varillang bakal, na pinagbalibalikuko niya isang 
gabi ang isa sa mga varillang iyon, sa pakikitulad niya sa masasama ang 
pagkaturong mga bata sa Maynila: sino ma'y walang nagtuwid niyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Marahan ang lakad!--ang ibinulong, at 
nagtuloy siya sa daang Sakristia.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga nagbibili ng sorbete ay 
nananatili sa pagsigaw ng: Sorbeteee! mga huepe rin ang siyang pang-ilaw ng mga dating nangagtitindang 
intsik at 
ng mga babaeng nagbibili ng mga kakanin at mga bungang kahoy.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kahangahanga!--ang sinabi niya--ito rin ang 
intsik na may pitong taon na, at ang matandang babae'y ... siya rin! 
Masasabing nanaginip ako ng gabing ito sa pitong taong pagka pa sa Europa!.. 
at Santo Diyos! nananatili rin ang masamang pagkalagay ng bato, na gaya rin ng 
aking iwan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At naroroon pa nga't nakahiwalay ang bato 
sa 'akera' ng linilikuan ng daang San Jakinto at daang Sakristia.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantalang pinanonood niya 
ang katakatakang pananatiling ito ng mga bahay at iba pa sa bayan ng walang 
kapanatilihan, marahang dumapo sa kanyang balikat ang isang kamay; tumunghay 
siya'y kanyang nakita ang matandang Teniente na minamasdang siyang halos 
nakangiti: hindi na taglay ng militar yaong mabalasik niyang pagmumukha, at wala 
na sa kanya yaong mga kilay na totoong kanyang ikinatatangi sa iba.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bagongtao, magpakaingat kayo! Mag-aral 
po kayo sa inyong ama--ang sinabi niya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ipatawad po ninyo; nguni't sa akala ko'y 
inyong pinakamahal ang aking ama; maaari po bang sabihin ninyo sa akin kung ano 
ang kanyang kinahinatnan?--ang tanong ni Ibarra na siya'y minamasdan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit? hindi po ba ninyo nalalaman?--ang 
tanong ng militar.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Itinanong ko kay Kapitan Tiago ay 
sumagot sa aking hindi niya sasabihin kung di bukas na. Nalalaman po ba ninyo, 
sakali?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mangyari baga, na gaya rin naman ng 
lahat! Namatay sa bilangguan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umudlot ng isang hakbang ang binata at 
tinitigan ang Teniente.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa bilangguan? sinong namatay sa 
bilangguan?--ang itinatanong.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba, ang inyo pong ama, na 
nabibilanggo!--ang sagot ng militar na may kaunting panggigilalas.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang aking ama ... sa bilangguan ... 
napipiit sa bilangguan? Ano po ang wika ninyo? Nakilala po ba ninyo ang aking 
ama? Kayo po ba'y ...? ang itinanong ng binata at hinawakan sa brazo ang 
militar.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa akala ko'y hindi ako namamali; si Don 
Rafael Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siya nga, Don Rafael Ibarra!--ang 
marahang ulit ng binata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang&nbsp; buong&nbsp; isip ko'y inyo pong nalalaman 
na!--ang ibinulong ng militar, na puspos ng habag ang anyo ng pagsasalita, sa 
kanyang pagkahiwatig sa nangyayari sa kalolowa ni Ibarra; ang akala ko'y inyong 
...; nguni't tapangan ninyo ang inyong loob! dito'y hindi mangyayaring 
magtamong kapurihan kung hindi nabibilanggo!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dapat kong akalaing hindi po kayo 
nagbibiro sa akin--ang muling sinabi ni Ibarra ng makaraan ang ilang sandaling 
hindi siya umiimik! Masasabi po ba ninyo sa akin kung bakit siya'y 
nasasabilangguan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-anyong nag-iisip-isip ang militar.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang aking ipinagtatakang totoo'y kung 
bakit hindi ipinagbigay alam sa inyo ang nangyayari sa inyong pamilya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sinasabi sa akin sa 
kanyang huling sulat, na may isang taon na ngayon, na huwag daw akong 
maliligalig kung di niya ako sinusulatan, sapagkat marahil ay totoong marami 
siyang pinakikialaman; ipinagtatagubilin sa aking magpatuloy ako ng pag-aaral 
... at benebendicionan ako!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y ginawa niya ang sulat na 
iyan sa inyo, bago mamatay; hindi malalao't mag-iisang taon ng siya'y aming 
inilibing sa inyong bayan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Anong dadahilana't nabibilanggo ang 
aking ama?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa kadahilanang totoong nakapagbibigay 
puri. nguni't sumama po kayo sa aki't ako'y paroroon sa kuartel; sasabihin ko 
hanggang tayo'y lumalakad. Cumapit po kayo sa aking brazo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nangag-imikan sa loob ng sandali; 
may anyong nagdidilidili ang matanda at wari'y hinihingi sa kanyang 'perilla,' 
na hinihimashimas, na magpaalaala sa kanya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kawangis ng lubos po ninyong 
pagkatalastas--ang ipinasimula ng pagsasalita--ang ama po ninyo'y siyang pangulo 
ng yaman sa&nbsp; buong&nbsp; lalawigan, at bagaman iniibig siya't iginagalang ng 
marami, ang mga iba'y pinagtatamnan naman siya ng masamang loob, o 
kinaiingitan. Sa kasaliwaang palad, kaming mga kastilang naparito sa Pilipinas 
ay hindi namin inuugali ang marapat naming ugaliin: sinasabi ko ito, dahil sa 
isa sa inyong mga nunong lalaki at gayon din sa kaaway ng inyong ama. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang 
walang likat na paghahalihalili, ang kapangitan ng asal ng mga matataas na puno, ang mga pagtatangkilik sa di marapat, ang 
kamurahan at ang kaiklian ng 
paglalakbay-bayan, ang siyang may sala ng lahat; pumaparito ang lalong masasama 
sa Peninsula, at kung may isang mabait na maparito, hindi nalalao't pagdaka'y 
pinasasama ng mga tagarito rin. At inyong talastasing maraming totoong kaaway 
ang inyong ama sa mga kura at sa mga kastila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dito'y sandaling huminto siya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ng makaraan ang ilang buwan, buhat ng kayo po'y umalis, nagpasimula na ang samaan ng loob nila ni 
Padre Damaso, na di ko masabi ang tunay na kadahilanan. Binibigyang kasalanan siya ni Padre Damasong hindi raw 
siya nagkukumpisal: ng una'y dating hindi siya nangungumpisal, gayon ma'y 
magkaibigan silang matalik, na marahil natatandaan pa po ninyo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bukod sa rito'y 
totoong dalisay ang kapurihan ni Don Rafael, at higit ang kanyang pagkabanal sa 
maraming nangagkukumpisal at nangagpapakumpisal: may tinutunton siya sa 
kanyang sariling isang kahigpithigpitang pagsunod sa atas ng magandang asal, at 
madalas sabihin sa akin, pagka nasasalita niya ang mga samaang ito ng loob: 'Ginoong 
Guevara, sinasampalatayanan po ba ninyong pinatatawad ng Diyos ang 
isang mabigat na kasalanan, ang isang kusang pagpatay sa kapwa tao, sa 
halimbawa, pagka, nasabi na sa isang sacerdote; na tao rin namang may katungkulang maglihim ng sa kanya'y sinasaysay, at matakot masanag sa infierno, 
na siyang tinatawag na pagsisising 'atricion'? Bukod sa duwag ay walang hiyang 
pumapanatag? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Iba ang aking sapantaha tungkol sa Diyos--ang sinasabi niya--sa ganang 
akin ay hindi nasasawata ang isang kasamaan ng kasamaan din, at hindi 
ipinatatawad sa pamamagitan ng mga walang kabuluhang pag-iyak at ng mga 
paglilimos sa Iglesia.' At inilalagay niya sa akin ang ganitong halimbawa:--'Kung 
aking pinatay ang isang ama ng pamilya, kung dahil sa katampalasanan ko'y 
nabao't nalugami sa kapighatian ang isang babae, at ang mga masasayang musmos 
ay naging mga dukhang ulila, mababayaran ko kaya ang walang hanggang katuwiran, kung ako'y kusang pabitay, ipagkatiwala ko ang lihim sa isang 
mag-iingat na huwag mahayag, maglimos sa mga kura na siyang hindi tunay na 
nangagkakailangan, bumili ng 'bula de komposicion,' o tumangistangis sa gabi at araw? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At ang bao at ang mga ulila? Sinasabi sa akin ng aking 
'konsiyensya' 
na sa loob ng kaya'y dapat akong humalili sa taong aking pinatay, ihandog ko 
ang aking&nbsp; buong&nbsp; lakas at hanggang ako'y nabubuhay, sa ikagagaling ng 
pamilyang 
itong ako ang may gawa ng pagkapahamak, at gayon man, sino ang makapagbibigay 
ng kapalit ng pagsinta ng ama?'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ganyan ang pangangatuwiran ng inyo pong 
ama, at ang ano mang ginagawa'y isinasangayong lagi sa mahigpit na 
palatuntunang ito ng wagas na kaasalan, at masasabing kailan ma'y hindi 
nagbigay pighati kanino man; baligtad, pinagsisikapan niyang pawiin, sa 
pamamagitan ng magagandang gawa, ang mga tanging kasawian sa katuwirang, 
ayon sa kanya'y ginawa raw ng kanyang mga nuno. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't ipanumbalik natin 
sa kanyang samaan ng loob sa kura, ang mga pagkakaalit na ito'y lumulubha; binabanggit siya ni Padre Damaso buhat 
sa pulpito, at kung di tinutukoy siya ng&nbsp; buong&nbsp; liwanag ay isang himala, 
sapagkat sa kaugalian ng paring iya'y mahihintay ang lahat. Nakikinikinita ko 
nang masama ang kahahangganan ng bagay na ito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Muling humintong sandali ang matandang 
Teniente.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naglilibot ng panahon iyon ang isang 
naging sundalo sa artilleria, na pinaalis sa hukbo dahil sa malabis na kagaspangan ng kanyang asal at dahil sa 
kamangmangang labis. sapagkat 
kinakailangan niyang mabuhay, at hindi pahintulot sa kanya ang magtrabajo ng 
mabigat na makasisira ng aming kapurihan, 
nagtamo siya, hindi ko alam kung sino ang sa kanya'y nagbigay, ng katungkulang 
pagka maniningil ng buwis ng mga karwahe, kalesa at iba pang sasakyan. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi tumanggap ang aba ng ano mang turo, at pagdaka'y napagkilala ng mga 'indio' ang bagay na ito: sa ganang 
kanila'y totoong kahimahimala, na ang isang kastila'y hindi marunong bumasa't sumulat. Pinaglilibakan ang 
kulang palad, na 
pinagbabayaran ng kahihiyan ang nasisingil na buwis, at nalalaman niyang siya 
ang hantungan ng libak, at ang bagay na ito'y lalong nakararagdag ng dating 
masama at magaspang niyang kaugalian. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sadyang ibinibigay sa kanya ang mga sulat 
ng patumbalik; nagpapakunwari siya namang kanyang binabasa, at bago siya 
pumifirma kung saan nakikita niyang walang sulat, na ang parang kinahig ng 
manok na kanyang mga letra'y siyang larawang tunay ng kanyang katauhan; 
linalangap niya ang masasaklap na kairingang iyon, nguni't nakakasingil 
siya, at sa ganitong kalagayan ng kanyang loob ay hindi siya gumagalang kanino 
man, at sa inyong ama'y nakipagsagutan ng lubhang mabibigat na mga salita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nangyari isang araw, na samantalang 
pinagpipihitpihit niya ang isang papel na ibinigay sa kanya sa isang tindahan, 
at ibig niyang malagay sa tuwid, nagpasimulang kinawayan ang kanyang mga kasamahan ng isang batang nanasok sa 
paaralan, magtawa at ituro siya ng 
daliri. 
Nariringig ng taong iyon ang mga tawanan, at nakikita niyang nagsasaya ang 
libak sa mga di makikibuing mukha ng nangaroroon; naubos ang kanyang 
pagtitiis, biglang pumihit at pinasimulaang hinagad ang mga batang 
nangagtakbuhan, at sumisigaw ng 'ba,' 'be,' 'bi,' 'bo,' 'bu.' </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinagdimlan 
ng 
galit, at sapagkat hindi siya mang-abot, sa kanila'y inihalibas ang kanyang 
baston, tinamaan ang isa sa ulo at nabulagta; ng magkagayo'y hinandulong ang 
nasusubasob at pinagtatadyakan, at alin man sa nangagsisipanood na nanglilibak 
ay hindi nagkaroon ng tapang na mamag-itan. Sa kasamaang palad ay nagdaraan 
doon ang inyong ama. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Napoot sa nangyari, tinakbo ang maniningil na kastila, 
hinawakan siya sa brazo at pinagwikaan siya ng mabibigat. Ang kastilang marahil 
ang tingin sa lahat ay mapula na, ibinuhat ang kamay, nguni't hindi siya 
binigyang panahon ng inyong ama, at taglay iyang lakas na nagkakanulo ng pagka 
siya'y apo ng mga vaskongado ... anang iba'y sinuntok daw, anang iba nama'y 
nagkasiya, na lamang sa pagtutulak sa kanya. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't ang nangyari'y ang tao'y 
umuga, napalayo ng ilang hakbang at natumbang tumama, ang ulo sa bato. 
Matiwasay na ibinangon ni Don Rafael ang batang may sugat at kanyang dinala sa 
tribunal. 
Sumuka ng dugo ang naging artillerong iyon at hindi na natauhan, at namatay 
pagkaraan ng ilang minuto. Nangyari ang kaugalian, nakialam ang hustisya, 
piniit ang inyong ama, at ng magkagayo'y nangagsilitaw ang mga lihim na kaaway. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umulan ang mga paratang, isinumbong na siya'y <span class="smcap">
pilibustero</span> at <span class="smcap">erehe</span>: ang maging 'erehe' ay 
isang kasawiang palad sa lahat ng lugar, lalong lalo na ng panahong iyong ang 'alkalde' 
sa lalawiga'y isang taong nagpaparangalang siya'y mapamintakasi, na 
kasama ang kanyang mga alilang nagdarasal ng rosario sa simbahan ng malakas na 
pananalita, marahil ng marinig ng lahat at ng makipagdasal sa kanya; datapuwa't 
ang maging <span class="smcap">pilibustero</span> ay lalong masama 
kay sa maging 'erehe,' at masama pang lalo kay sa pumatay ng tatlong 
maniningil ng buwis na marunong bumasa, sumulat at marunong magtangitangi. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinabayaan siya ng lahat, sinamsam ang kanyang mga papel at ang kanyang mga 
libro. Isinumbong na siya'y tumatanggap ng 'El Correo de Ultramar' at 
ng mga 
periodikong galing sa Madrid; isinumbong siya, dahil sa pagpapadala sa inyo sa 
Suiza alemana; dahil sa siya'y nasamsaman ng mga sulat at ng larawan ng isang 
paring binitay, at iba pang hindi ko maalaman. Kinukunan ng maisumbong 
ang lahat ng bagay, sampu ng paggamit ng barong tagalog, gayong siya'y 
nagmula sa dugong kastila. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kung naging iba sana ang inyong ama, marahil pagdaka'y nakawala, 
sapagkat may isang malikong nagsaysay, na ang ikinamatay ng kulang palad na 
maniningil ay mula sa isang 'kongestion'; 
nguni't ang kanyang kayamanan, ang kanyang pananalig sa katuwiran at ang 
kanyang galit sa lahat ng hindi naaayon sa kautusan o sa katuwiran ang sa 
kanyang nangagpahamak. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ako man, sakali't 
malaki ang aking kasuklaman sa pagluhog sa paggawa ng magaling nino man, humarap 
ako sa Kapitan Heneral, sa hinalinhan ng ating Kapitan Heneral ngayon; 
ipinaliwanag ko sa kanyang hindi mangyayaring maging 'pilibustero' ang 
tumatangkilik sa lahat ng kastilang dukha o naglalakbay rito, na pinatutuloy sa 
kanyang bahay at pinakakain at ang sa kanyang mga ugat ay tumatakbo pa ang 
mapagkandiling dugong kastila; nawalang kabuluhang isagot ko ang aking ulo, at 
ang manumpa ako sa aking karukhaan at sa aking kapurihang militar, at wala ako 
ng nasunduan kung di magpakita sa akin ng masamang pagtanggap, pagpakitaan ako 
ng lalong masama sa aking pagpapaalam at ang pamagatan ako ng 'khiilado'!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Huminto ang matanda ng pananalita upang 
magpahinga, at ng kanyang mahiwatigan ang hindi pag-imik ng kanyang kasama, 
na pinakikinggan siya'y hindi siya tinitinguan, ay nagpatuloy:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nakialam ako sa usapin sa kahingian ng 
inyong ama. Dumulog ako sa bantog na abogadong filipino, ang binatang si A--; 
nguni't tumanggi sa pagsasanggalang.--'Sa akin ay matatalo'--ang wika sa 
akin.--Panggagalingan ang pagsasanggalang ko ng isang bagong sumbong na laban sa 
kanya at marahil ay laban sa akin. Pumaroon po kayo kay ginoong M--, na 
masilakbong manalumpati, taga Espa&ntilde;a at lubhang kinaaalang-alanganan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">'Gayon 
nga ang aking ginawa, at ang balitang abogado ang nangasiwa sa 'kausa' na 
ipinagsanggalang ng&nbsp; buong&nbsp; katalinuhan at kaningningan. Datapwa't marami ang 
mga kaaway, at ang ila'y mga lihim at hindi napagkikilala. Sagana ang mga 
saksing sabuat, at ang kanilang mga paratang, na sa ibang lugar ay mawawal-ang 
kabuluhan sa isang salitang palibak o patuya ng nagsasanggalang, dito'y 
tumitibay at tumitigas. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kung nasusunduan ng abogadong mawalang kabuluhan ang 
kanilang mga bintang, sa pagpapakilala ng pagkakalaban-laban ng kanikanilang 
saysay at ng mga saysay nilang sarili, pagdaka'y lumalabas ang mga ibang 
sumbong. Isinusumbong nilang nangamkam siya ng maraming lupa, hiningan siyang 
magbayad ng mga kasiraan at mga kalugihang nangyari; 
sinabi nilang siya'y nakikipagkaibigan sa mga tulisan, upang pagpitaganan nila 
ang kanyang mga pananim at ang kanyang mga hayop. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa kawakasa'y nagulong totoo 
ang usaping iyon, na ano pa't ng maging isang taon na'y walang nagkakawatasang 
sino man. Napilitang iwan ng 'alkade' 
ang kanyang katungkulan, hinalinhan siya ng ibang, ayon sa balita'y, masintahin 
sa katuwiran, nguni't sa kasaliwaang palad, ito'y ilang buwan lamang nanatili 
roon, at ang napahalili sa kanya'y napakalabis naman ang pagka maibigin sa 
mabuting kabayo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga pagtitiis ng hirap, ang mga 
sama ng loob, ang mga pagdaralita sa bilangguan, o ang kanyang pagpipighati ng 
kanyang mapanood ang gayong karaming gumaganti 
ng katampalasanan sa ginawa 
niya sa kanilang mga kagalingan, ang siyang sumira sa katibayan ng kanyang 
katawang bakal, at dinapuan siya, niyang sakit na ang libingan lamang ang 
nakagagamot. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At nang matatapos na ang lahat, ng malapit ng tamuhin niya, ang kahatulang siya'y walang 
kasalanan, at hindi katotohanang siya'y kaaway ng 
Bayang Espa&ntilde;a, at di siya, ang may sala ng pagkamatay ng maniningil, namatay 
sa bilangguang wala sino man sa kanyang tabi. Dumating ako upang mapanood ang 
pagkalagot ng kanyang hininga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumigil ng pananalita ang matanda; hindi 
nagsalita si Ibarra ng ano man. Samantala'y dumating sila sa pintuan ng kuartel. Huminto ang militar, iniabot sa kanya ang 
kamay at nagsabi:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Binata, ipagtanong ninyo kay Kapitan 
Tiago ang mga paliwanag. Ngayo'y magandang gabi po! Kinakailangan kong 
tingnan kung may nangyayaring ano man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Walang imik na hinigpit na mairog ni 
Ibarra ang payat na kamay ng Teniente, at hindi kumikibo'y sinundan ng kanyang 
mga mata ito, hanggang sa di na matanaw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Marahang bumalik at nakakita siya ng 
isang nagdaraang karwahe; kinawayan niya ang kutsero:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa Fonda ni Lala!--ang sinabing bahagya 
na mawatasan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Marahil nanggaling ito sa 
kalaboso--ang 
inisip ng kutsero sa kanyang sarili, saka hinaplit ng latigo ang kanyang mga 
kabayo.</font></p>
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