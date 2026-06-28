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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">X. Ang Bayan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Halos sa pampang ng dagatan ang 
kinalalagyan ng bayang San Diego, 
na sumasagitna ng mga kapatagang halamanan at mga palayan. Nagpapadala sa ibang 
mga bayan ng asukal, bigas, kafe at mga bungang halaman, o ipinagbibili kaya ng murangmura 
sa intsik na nagsasamantala ng kawal-ang malay o ng 
pagkahilig sa mga masasamang pinagkaratihan ng magsasaka.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagka araw na mabuting panahon at umaakyat 
ang mga bata sa kaitaasan ng kampanario ng simbahan, na napapamutihan ng 
lumot at ng damong hatid ng hangin; pagkakagayo'y masayang nangagsisigawan, 
sa udyok ng kagandahan ng natatanaw na humahandog sa kanilang mga mata. Sa gitna ng karaming mga bubungang pawid, tisa, 'zink' at yunot, na 
napapagitnaan ng mga bulaklak natatalastas ng bawa't isa ang paraan ng 
pagkakita sa kanikanilang bahay na maliliit, ang kanila bagang malilinggit na 
pugad. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nagagamit nilang pananda ang lahat: isang kahoy, isang sampalok na may 
maliliit na dahon, ang niog na puspos ng mga buko, tulad sa maanaking si Astarte 
o kay Diana 
sa Efeso 
na may maraming suso, isang humahabyog na kawayan, isang bunga, isang kruz. 
Naroroon, ang ilog, kalakilakihang ahas na kristal na natutulog sa verdeng 
alfombra: pinaaalon ang kanyang agos ng mga pirapirasong malalaking batong 
nagkakapatlangpatlang sa mabuhanging inaagusan ng tubig; kumikipot ang 
ilog sa dako roon, at may mga pangpang na matataas na kinakapitang 
nangpapaliko-liko ng mga kahoy na nakalitaw ang mga ugat, at sa dako rito'y 
lumalaylay ang mga panabi at lumuluang at tumitining ang agos. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">May natatanaw sa 
dakong malayong isang maliit na bahay, na itinayo sa pangpang na hindi natakot 
sa kataasan, sa hanging malakas at sa pinanununghang banging malalim, at 
masasabi, dahil sa kanyang maliliit na haligi, na siya'y isang kalakilakihang 
zankuda 
na nag-aabang ng ahas upang daluhungin. mga katawan ng puno ng niog o ng kahoy na may balat pa, na gumagalaw at gumigiwang ang siyang naghuhugpong ng 
magkabilang ibayo, at kahi't sila'y masasamang tulay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Datapuwa't maiinam namang 
kagamitan sa kirko sa pagpapatiwatiwarik, bagay na hindi dapat pawal-ang halaga: 
nangagkakatwa ang mga bata, buhat sa ilog na pinaliliguan, sa mga pagkalagim ng nagdaraang babaeng may sunong na bakol, 
o 
ng matandang lalaking 
nanginginig sa paglakad at pinababayaang mahulog ang kanyang tungkod sa tubig.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" style="font-size: 13pt" color="#333333">Nguni't ang lalong nakahihikayat ng 
pagmamasid ay ang isang matatawag nating naiimos na gubat sa dagat na iyon ng 
mga lupang linang. Diya'y may mga katandatandaang mga kahoy, na guang ang 
katawan, at kaya lamang namamatay ay pagka tinamaan ng lintik ang mataas na 
dulo at nasusunog: ang sabihana'y hindi lumalakit sa iba ang apoy na iyon at 
namamatay doon din; diya'y may mga pagkalalaking mga batong dinaramtan ng 
terkiopelong lumot ng panahon at ng 'naturaleza': humihimpil at 
nagpapatongpatong sa kanilang mga guang ang alabok na pinakakapit ng ulan at 
ang mga ibon ang siyang nagtatanim ng mga binhi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">Malayang lumalago ang mga kakahuyan: mga damo, mga dawag, mga tabing na damong gumagapang na 
nangagsasalasalabat at nagpapalipatlipat sa isa't isang kahoy, bumibitin sa 
mga sanga, kumakapit sa mga ugat, sa lupa, at sapagkat hindi pa mandin 
nasisiyahan sa ganito si Flora, 
ay nagtatanim siya ng mga damo sa ibabaw ng damo; nabubuhay ang lumot at ang kabuti sa mga gahak-gahak na balat ng 
kahoy, at ang mga damong dapo, mga kawiliwiling manunuluyan, ay napapagkamal-an sa 
kanilang mga pagkayakap sa 
kahoy na mapagpatuloy.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Iginagalang ang gubat na iyon: may mga 
sali't-saling sabing sinasalita tungkol doon; nguni't ang lalong malapit sa 
katotohanan, at sapagkat gayo'y siyang hindi lubhang pinaniniwalaan at hindi 
naman napag-aalaman, ay ang sumusunod:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang ang baya'y wala kung di isang walang 
halagang tumpok ng mga dampa, at saganang sumisibol pa sa 
pinakalansangan ang damo; ng panahong yaong pagkagabi ay nanasok doon ang mga 
usa at mga baboy-ramo, dumating isang araw ang isang matandang kastilang 
malalalim ang mga mata at totoong magaling magwikang tagalog. Pagkatapos na 
matingnan at malibot ang mga lupa sa magkabikabila, ipinagtanong niya kung 
sinosino ang may ari ng kagubatang inaagusan ng tubig na malakuko. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nangagsiharap ang ilang nangagsabing umano'y sila raw ang may ari, at ang ginawa ng matanda'y binili sa 
kanila ang gubat na iyon, sa pamamag-itan ng mga damit, 
mga hiyas at kaunting salapi. Nawala pagkatapos ang matanda na 
hindi maalaman kung paano. Pinananaligan na ng taong siya'y 'enkantado', 
ng 
maino ng mga pastol ang isang kaangutang nagbubuhat sa karatig na gubat; kanilang binakas, at ang nasumpungan nila'y ang matandang lalaking bulok na at 
nakabitin sa sanga ng isang 'baliti'. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nakatatakot na siya ng panahong buhay pa, 
dahil sa kanyang malalim at malagunlong na boses, dahil sa malalim niyang 
mga mata at dahil sa tawa niyang walang ingay; nguni't ngayong siya'y 
magbigti ay lumiligalig siya sa pagtulog ng mga babae. Itinapon ng ilang 
babae sa ilog ang mga hiyas at sinunog ang damit na kanyang bigay, at mula ng 
ilibing ang bangkay sa puno ng baliti ring iyon, sino mang tao'y wala ng 
mangahas na doo'y lumapit. Isang pastol na naghahanap ng kanyang mga hayop, 
ibinalitang nakakita raw siya roon ng mga ilaw; nangagsiparoon ang mga 
binata at nakarinig na sila ng mga daing. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Isang kulang palad na nangingibig, 
na sa pagmimithi niyang mapuna ng sa kanya'y nagwawalang bahala, nangakong 
matitira siyang magdamag sa lilim ng kahoy at ipupulupot niya sa puno nito ang 
isang mahabang yantok, namatay dahil sa matinding lagnat na sa kanya'y dumapo 
kinabukasan ng gabi ng kanyang pakikipagpustahan. May pinagsasalitaanan pang 
mga katha't sali't saling sabi tungkol sa gubat na iyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nag-ilang buwan at naparoon ang 
isang binatang wari'y mestizong kastila, na ang sabi'y anak daw siya ng nasira, 
at nanahan sa sulok na iyon at nangasiwa sa pagsasaka, lalonglalo na sa 
pagtatanim ng tina. Si Don Saturnino'y isang binatang malungkot ang asal at 
lubhang magagalitin, at kung minsa'y malupit; datapuwa't totoong masipag at 
masintahin sa paggawa: binakuran ng pader ang pinaglibingan sa kanyang ama, na 
manakanaka lamang dinadalaw. Nang may kagulangan na'y nag-asawa sa isang batang 
dalagang taga Maynila, at dito'y naging anak niya si Don Rafael, na ama ni 
Crisostomo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Batangbata pa si Don Rafael ay nagpilit 
nang siya'y kalugdan ng mga taong bukid: hindi nalao't pagdaka'y lumago ang 
pagsasakang dinala at pinalaganap ng kanyang ama, nanahan doon ang maraming 
tao, nangagsiparoon ang maraming intsik; ang pulo ng mga dampa'y naging isang nayon, at 
nagkaroon ng isang kurang tagalog; pagkatapos ay naging isang bayan, namatay 
ang kura at naparoon si Padre Damaso. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nguni't ang libinga't karatig na lupa'y 
pawang pinagpitaganan. Nangangahas na maminsanminsan ang mga batang lalaking 
mangagsiparoong may mga dalang panghampas at mga bato, upang lumigid sa 
palibot libot at manguha ng bayabas, papaya, duhat at iba pa, at kung minsa'y 
nangyayaring sa kasalukuyan ng kanilang ginagawa, o kung kanilang pinagmamasdang 
walang imik ang lubid na gagalawgalaw buhat sa sanga ng kahoy, 
lumalagpak ang isa o dalawang batong hindi maalaman kung saan galing. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Pagkakagayo'y kasabay ng sigaw na:--ang matanda! 
											ang matanda!--kanilang 
ipinagtatapunan ang mga bungang kahoy at ang mga panghampas, lumulukso sila 
sa mga kahoy at nangagtatakbuhan sa ibabaw ng malalaking bato at sa mga kakapalan ng damo, at hindi sila tumitigil hanggang sa makalabas sa gubat, na 
nangamumutla, humihingal ang iba, ang iba'y umiiyak, at kakaunti ang 
nangagtatawa.</font></p>
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