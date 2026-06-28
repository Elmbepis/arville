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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XVI. Si Sisa</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Madilim ang gabi: tahimik na tumutulog ang 
mga namamayan; ang mga familiang nag-alaala sa mga namatay na'y tumulog na ng&nbsp; 
buong&nbsp; 
kapanatagan at kapayapaan 
ng loob: nangagdasal na sila ng tatlong 
bahagi ng rosario na may mga 'requiem', ang pagsisiyam sa mga kaluluwa at 
nangagpaningas ng maraming kandilang pagkit sa harap ng mga mahal na 
larawan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Tumupad na ang mga mayayaman at ang mga nakakakaya sa pagkabuhay sa 
mga nagpamana sa kanila ng kaginhawahan; kinabukasa'y sisimba sila sa tatlong 
misang gagawin ng bawa't sacerdote, mangagbibigay sila ng dalawang piso at 
ng ipagmisa ng isang patungkol sa kaluluwa ng mga namatay; bibili sila, 
pagkatapos, ng bula sa mga patay na puspos ng mga indulgencia. Hindi nga 
totoong napakahigpit ang Hustisya ng Diyos na gaya ng hustisya ng tao.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" style="font-size: 13pt" color="#333333">Nguni't ang dukha, ang mahirap, na 
bahagya nanakakakita upang may maipag-agdong-buhay, at nangangailangang 
sumuhol sa mga 'direktorcillo,' mga eskribiente at mga sundalo, upang 
pabayaan silang mamuhay ng tahimik, ang taong iya'y hindi tumutulog ng 
panatag, na gaya ng inaakala ng mga poeta sa mga palacio, palibhasa'y hindi 
pa sila marahil nakapagtitiis ng mga hagpos ng karalitaan. Malungkot at 
nag-iisip-isip ang dukha. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">Nang gabing iyon, kung kakaunti ang kanyang dinasal ay 
malaking lubha ang kanyang dalangin, taglay ang hirap sa mga mata at ang mga 
luha sa puso. Hindi siya nagsisiyam, hindi siya marunong ng mga 'jakulatoria', 
ng mga tula at ng mga 'oremus,' na katha ng mga prayle, at iniuukol sa 
mga taong walang sariling kaisipan, walang sariling damdamin, at hindi rin 
naman napag-uunawa ang lahat ng iyon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">Nagdarasal siya ng ayon sa pananalita 
ng kanyang karalitaan; ang kaluluwa niya'y tumatangis dahil sa kanyang 
sariling kalagayan, at dahil naman sa mga namatay, na ang pagsinta nila sa 
kanya'y siyang kanyang kagalingan. Nangyayaring makapagsaysay ang mga labi niya ng 
mga pagbati; nguni't sumisigaw ang kanyang isip ng mga daing at nagsasalita ng 
mga hinanakit. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">Kayo baga'y mangasisiyahan. Ikaw na pumuri sa karukhaan, 
at kayo naman, mga aninong pinahihirapan, sa walang pamuting panalangin ng 
dukha, na sinasaysay sa harap ng isang estampang masama ang pagkakagawa, na 
liniliwanagan ng ilaw ng isang timsim, o baka kaya ang ibig ninyo'y ang may 
mga kandilang malalaki sa harap ng mga Cristong sugatan, ng mga Birheng 
maliliit ang bibig at may mga matang kristal, mga misang wikang lating 
ipinangungusap ng mga sacerdoteng hindi inuunawa ang sinasabi? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">At ikaw, 
Religiong ilinaganap na talagang ukol sa sangkatauhang nagdaralita, nalimutan 
mo na kaya ang katungkulan mong umaliw sa naaapi sa kanyang karukhaan, at humiya 
sa makapangyarihan sa kanyang kapalaluan, at ngayo'y may laan ka lamang na mga 
pangako sa mga mayayaman, sa mga taong sa iyo'y makapagbabayad?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang kaawaawang tao'y nagpupuyat sa gitna 
ng kanyang mga anak na nangatutulog sa kanyang siping; iniisip ang mga 
bulang dapat bilhin upang mapahingalay ang mga magulang at ang namatay na 
esposo.--'Ang piso--anya--ang piso'y isang linggong kaginhawahan ng aking mga 
anak; isang linggong mga tawanan at mga katuwaan, ang aking inimpok sa&nbsp; 
buong&nbsp; 
isang buwan, isang kasuutan ng aking anak na babaeng nagdadalaga 
na.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Datapuwa't kinakailangang patayin mo ang mga apoy na ito--ang wika ng boses na kanyang narinig sa sermon--kinakailangang ikaw ay magpakahirap. 
'Tunay 
nga! kinakailangan! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi ililigtas ng Iglesia ng walang bayad ang mga 
pinakasisinta mong kaluluwa: hindi ipinamimigay na walang bayad ang mga bula. 
Dapat mong bilhin ang bula, at hindi ang pagtulog kung gabi ang iyong gagawin, kung di ang pagpapagal. Samantala'y mailalantad ng iyong anak na babae ang 
bahagi nang katawang dapat ilihim sa nanonood; magpakagutom ka, sapagkat 
mahal ang halaga ng langit! Tunay na tunay nga yatang hindi pumapasok sa langit 
											ang mga dukha!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nangagliliparan ang mga kaisipang ito sa 
alang-alang na pag-itang mula sa sahig na kinalalatagan ng magaspang na banig, 
hanggang sa palupong kinatatalian ng duyang pinag-uuguyan sa sanggol na lalaki. 
Ang paghinga nito'y maluag at payapa; manakanakang nginunguya ang laway at 
may sinasabing di mawatasan: nananaginip na kumakain ang sikmurang gutom na 
hindi nabusog sa ibinigay sa kanya ng mga kapatid na matatanda.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga kuliglig ay humuhuning hindi 
nagbabago ang tinig at isinasaliw ang kanilang walang humpay at patupatuloy na irit sa mga patlangpatlang na tin-is na huni ng 
kagaykay na nakatago sa damo o 
ang butiking lumalabas sa kanyang butas upang humanap ng makakain, 
samantalang ang tuko, na wala ng pinanganganibang tubig ay isinusungaw ang kanyang ulo sa guang ng bulok na puno ng 
kahoy. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Umaatungal ng lubhang mapanglaw ang 
											mga aso doon sa daan, at 
											sinasampalatayanan ng mapamahiing 
											nakikinig na sila'y nakakakita ng 
											mga espiritu at ng mga anino. 
											Datapuwa't hindi nakikita ng mga aso 
											at ng iba pang mga hayop ang mga 
											pagpipighati ng mga tao, at gayon 
											man, gaano karami ang kanilang mga 
											kahirapang tinitiis!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Doon sa malayo sa bayan, sa isang layong 
may isang oras, natitira ang ina ni Basilio at ni Crispin, asawa ng isang 
lalaking walang puso, at samantalang ang babae nagpipilit mabuhay at ng 
makapag-aruga sa mga anak, nagpapagalagala at nagsasabong naman ang lalaki. 
Madalang na madalang sila kung magkita, nguni't lagi ng kahapishapis ang 
nangyayari pagkikita. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Unti-unting hinubdan ng lalaki ang kanyang asawa ng mga 
hiyas upang may maipambisyo siya at ng wala nang kaanoano man si Sisa, upang 
magugol sa masasamang mga hinggil ng kanyang asawa, pinagpasimulaan nitong 
siya'y pahirapan. Mahina, palibhasa, ang loob, malaki ang kahigtan ng puso kay 
sa pag-iisip, wala siyang nalalaman kung di suminta at tumangis. Sa ganang 
kanya'y ang kanyang asawa ang siyang dios niya,; ang mga anak niya'y siyang 
kanyang mga angel. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sapagkat talastas ng lalaki kung hanggang saan ang sa 
kanya'y pag-ibig at takot, ginagawa naman niya ang katulad ng asal ng lahat 
ng mga diosdiosan: sa araw-araw ay lumalala ang kanyang kalupitan, ang pagka 
walang awa at ang pagkapatupatuloy ng bawa't maibigan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" style="font-size: 13pt" color="#333333">Nang magtanong sa kanya si Sisa nang 
minsang siya'y sumipot sa bahay, na ang mukha'y mahigit ang pagdidilim kay sa 
dati, tungkol sa panukalang ipasok ng sakristan si Basilio, ipinatuloy niya ang 
paghahagpos ng manok; hindi siya sumagot ng oo o ayaw. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">Hindi nangahas si 
Sisang ulitin ang kanyang pagtatanong; datapuwa't ang lubhang mahigpit na kasalatan ng 
kanilang pamumuhay at ang hangad na ang mga bata'y mangag-aral 
sa paaralanhan ng bayan ng pagbasa't pagsulat, ang siyang sa kanya'y pumilit na 
ipalutoy ang panukala niya. Ang kanyang asawa'y hindi rin nagsabi ng ano man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang gabing yaon, ikasampu't kalahati o 
labing-isa ang oras, ng numiningning na ang mga bituin sa langit na 
pinaliwanag ng unos, nakaupo si Sisa sa isang bangkong kahoy na pinagmamasdan 
ang ilang mga sanga ng kahoy na nagniningasningas sa kalang may tatlong 
batong-buhay na may mga dunggot. Nakapatong sa tatlong batong ito o tungko ang 
isang palayok na pinagsasaingan, at sa ibabaw ng mga baga'y tatlong tuyong 
lawlaw, na ipinagbibili sa halagang tatlo ang dalawang kuarta.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakapangalumbaba, minamasdan ang 
madilawdilaw at mahinang ningas ng kawayang pagdaka'y nagiging abo ang 
kanyang madaling malugnaw na baga; malungkot na ngiti ang tumatanglaw sa 
kanyang mukha. Nagugunita niya ang kalugodlugod na bugtong ng palayok at ng 
apoy na minsa'y pinaturan sa kanya ni Crispin. Ganito ang sinabi ng bata:</font></p>
<div class="poem">
	<div class="stanza">
		<div class="verse">
			<p align="justify" style="margin-left: 80px; margin-right: 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt">'Naupo si Maitim, sinulot ni 
			Mapula.</font></div>
		<div class="verseind">
			<p align="justify" style="margin-left: 80px; margin-right: 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt">Nang malao'y kumarakara.'</font></div>
	</div>
</div>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bata pa si Sisa, at napagkikilalang ng 
dakong una'y siya'y maganda at nakahahalina kung kumilos. Ang kanyang mga mata, 
na gaya rin ng kanyang kaluluwang ibibigay niyang lahat sa kanyang mga anak, 
ay sakdal ng gaganda, mahahaba ang mga pilik-mata at nakauukit kung tumingin; 
mainam ang hayap ng ilong; marikit ang pagkakaanyo ng kanyang mga labing 
namumutla. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Siya ang tinatawag ng mga tagalog na 'kayumanging kaligatan,' sa 
makatuwid baga'y kayumanggi, nguni't isang kulay na malinis at dalisay. Bagaman bata pa siya'y dahil sa pighati, o dahil sa gutom, nagpapasimula na ng 
paghupyak ang kanyang namumutlang mga pisngi; ang malagong buhok na ng una'y 
gayak at pamuti ng kanyang katauhan, kung kaya husay hindi sa pagpapaibiig, kung di 
											sapagkat kinaugaliang husayin: ang pusod ay 
karaniwan at walang mga 
'aguja' at mga 'peineta.'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">May ilang araw nang hindi siya nakakaalis 
sa bahay at kanyang tinatapos tabiin ang isang gawang sa kanya'y ipinagbiling 
yariin sa lalong madaling panahong abot ng kaya. Sa pagkaibig niyang makakita 
ng salapi, hindi nagsimba ng umagang iyon, sapagkat maaabala siya ng 
dalawang oras ang kauntian sa pagparoo't parito sa bayan:--namimilit ang 
karukhaang magkasala!--ng matapos ang kanyang gawa'y dinala niya sa may-ari, 
datapuwa't pinangakuan siya nito sa pagbabayad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Wala siyang inisip sa&nbsp; buong&nbsp; maghapon kung 
di ang mga ligayang tatamuhin niya pagdating ng gabi: kanyang nabalitaang oowi 
ang kanyang mga anak, at kanyang inisip na sila'y kanyang pakaning magaling. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Bumili ng mga lawlaw, pinitas sa kanyang maliit na halamanan ang lalong 
magagandang kamatis, sapagkat nalalaman niyang siyang lalong minamasarap ni 
Crisping pagkain, nanghingi sa kanyang kapit bahay na si Pilosopo Tasyo, na 
tumitira sa may mga limangdaang metro ang layo sa kanyang tahanan, ng tapang 
baboy-ramo, at isang hita ng patong-gubat, na pagkaing lalong minamasrap ni 
Basilio. At puspos ng pag-asa'y isinaing ang lalong maputing bigas, na siya rin 
ang kumuha sa giikan. Yaon nga nama'y isang hapunang 
karapatdapat sa mga kura, na kanyang handa sa kaawaawang mga bata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't sa isang sawing palad na 
pagkakatao'y dumating ang asawa niya't kinain ang kanin, ang tapang baboy ramo, 
ang hita ng pato, limang lawlaw at ang mga kamatis. Hindi umiimik si Sisa, 
bagaman ang damdam niya'y siya ang kinakain. Nang busog na ang lalaki'y 
naalaalang itanong ang kanyang mga anak. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Napangiti si Sisa, at sa kanyang 
											katuwaa'y ipinangako sa kanyang sariling hindi siya maghahapunan ng gabing 
iyon; sapagkat hindi kasiya sa tatlo ang nalabi. Itinanong ng ama ang kanyang 
mga anak, at ipinalalagay niya itong higit sa siya'y kumain.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagkatapos ay dinampot ng lalaki ang 
manok at nag-akalang yumao.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ayaw ka bang makita mo sila?--ang 
itinanong na nangangatal;--sinabi ni matandang Tasiong sila'y malalaon ng 
kaunti; nakababasa na si Crispin ... marahil ay dalhin ni Basilio ang kanyang 
sueldo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">ng marinig itong huling kadahilanan ng 
pagpigil sa kanya'y huminto, nag-alinlangan, nguni't nagtagumpay ang kanyang 
mabuting angel.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y itira 
mo sa akin ang piso!--at pagkasabi ay umalis.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumangis ng&nbsp; buong&nbsp; kapaitan si Sisa; 
nguni't pagkaalaala sa kanyang mga anak ay natuyo ang mga luha. Muli siyang 
nagsaing, at inihanda ang tatlong lawlaw na natira: bawa't isa'y magkakaroon ng 
isa't kalahati.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Darating silang 
malaki ang pagkaibig na kumain!--ang iniisip niya:--malayo ang pinangagalingan at ang mga sikmurang 
gutom ay walang puso.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinakingan niyang magaling ang lahat ng 
ingay, masdan natin at hinihiwatigan niya ang lalong mahinang yabag:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Malakas at maliwanag ang lakad ni 
Basilio; marahan at hindi nakakawangis ang kay Crispin--ang iniisip ng ina.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Makaalawa o makaatlo ng humuni ang kalaw 
sa gubat, mula ng tumila ang ulan, at gayon ma'y hindi pa dumarating ang 
kanyang mga anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Inilagay niya ang mga lawlaw sa loob ng 
palayok at ng huwag lumamig, at lumapit sa pintuan ng dampa upang siya'y 
malibang ay umawit ng marahan. Mainam ang kanyang boses, at pagka naririnig 
nilang siya'y umaawit ng 'kundiman', nangagsisiiyak, ayawan kung bakit. 
nguni't ng gabing iyo'y nangangatal ang kanyang boses at lumalabas ng 
pahirapan ang tinig.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Itinigil ang kanyang pag-awit at 
tinitigan niya ang kadiliman. Sino ma'y walang nanggagaling sa bayan, liban na 
lamang sa hanging nagpapahulog ng tubig sa malalapad na mga dahon ng mga 
saging.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Karakaraka'y biglang 
nakakita ng isang asong maitim na sumipot sa harap niya; may inaamoy ang hayop 
na iyon sa landas. Natakot si Sisa, kumuha ng isang bato at hinagis. 
Nagtatakbo ang asong umaatungal ng pagkapanglawpanglaw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi mapamahiin si Sisa, nguni't 
palibhasa'y maraming totoo ang kanyang narinig na mga sinasabi tungkol sa mga 
guniguni at sa mga asong maiitim' kaya nga't nakapangyari sa kanya ang lagim. 
Dalidaling sinarhan ang pinto at naupo sa tabi ng ilaw. Nagpapatibay ang gabi 
ng mga pinaniniwalaan at pinupuspos ng panimdim ang alang-alang ng mga 
malikmatang anino.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-akalang magdasal, tumawag sa Birhen, 
sa Diyos, upang kalingain nila ang kanyang mga anak, lalonglalo na ang kanyang 
bunsong si Crispin. At hindi niya sinasadya'y nalimutan niya ang dasal at 
napatungo ang&nbsp; buong&nbsp; pag-iisip niya sa kanila, na ano pa't kanyang naaalaala ang 
mga pagmumukha ng bawa't isa sa kanila, yaong mga mukhang sa towi na'y 
ngumingiti sa kanya kung natutulog, at gayon din kung nagigising. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't kaginsaginsa'y naramdaman niyang naninindig ang kanyang mga buhok, 
nangdidilat ng mainam ang kanyang mga mata, malikmata o katotohanan, kanyang 
nakikitang nakatindig si Crispin sa tabi ng kalan, doon sa lugar na karaniwang 
kanyang inuup-an upang makipagsalitaan sa kanya. ngayo'y hindi nagsasabi ng 
ano man; tinititigan siya niyong mga matang malalaki at ngumingiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nanay! buksan ninyo! 
buksan ninyo, nanay!--ang sabi ni Basilio, buhat sa labas.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kinilabutan si Sisa at nawala ang malikmata.</font></p>
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