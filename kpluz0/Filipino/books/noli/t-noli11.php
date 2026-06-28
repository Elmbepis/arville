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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XI. Ang mga Makapangyarihan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<div class="quote">
	<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
	<font face="Arial" color="#333333" style="font-size: 13pt"><i>Mangaghati-hati kayo 
	at kayo'y mangaghari.--(Bagong Makhiavelo)</i></font></div>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sinosino baga ang mga nakapangyayari sa 
bayan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kailan ma'y hindi nakapangyari si Don 
Rafael ng nabubuhay pa siya, bagaman siya ang lalong mayaman doon, malaki ang 
lupa at halos may utang na loob sa kanya ang lahat. Palibhasa'y mahinhing loob 
at pinagsisikapang huwag bigyang kabuluhan ang lahat ng kanyang mga ginagawa, 
hindi nagtatag sa bayan ng kanyang partido , at nakita na natin 
kung paano ang mga paglaban sa kanya ng makita nilang masama ang kanyang 
kalagayan.--Si Kapitan Tiago kaya?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Totoo't kung siya'y dumarating ay 
sinasalubong siya ng orquesta ng mga nagkakautang sa kanya, hinahandugan siya ng 
piging at binubusog siya sa 
mga alay. Inilalatag sa kanyang mesa ang 
lalong magagaling na bungang kahoy; kung nangakakahuli sa pangangaso ng 
isang usa o baboy-ramo'y sa kanya ang ikapat na bahagi; kung nababati niya ang kainaman ng 
kabayo ng isang sa kanya'y may utang, pagdating ng kalahating 
horas ay sumasakanyang kuadra 
na: ang lahat ng ito'y katotohanan; nguni't siya'y pinagtatawanan at tinatawag 
siya sa lihim na Sakristan Tiago.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang gobernadorcillo baga kaya?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ito'y isang kulang palad na hindi 
nag-uutos, siya ang sumusunod; hindi nakapagmumura kanino man, siya ang 
minumura; hindi nagagawa niya ang maibigan, ginagawa sa kanya ang kalooban ng 
iba; ang kapalit nito'y nananagot siya sa Alkalde mayor ng lahat ng sa 
kanya'y ipinag-utos, ipinagawa at ipinatatag sa kanya ng mga iba, na para 
manding nanggaling sa bungo ng kanyang ulo ang lahat ng iyon; nguni't dapat 
sabihin, sa ikapupuri niya, na ang katungkulang kanyang hawak ay hindi niya 
ninakaw o kinamkam: upang tamuhi'y nagkagugol siya ng limang libong piso, at 
maraming kadustaan, nguni't sa napapakinabang niya'y kanyang inaakalang 
murangmura ang mga gugol na iyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kung gayo'y baka kaya ang Diyos?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ah! hindi nakatitigatig ang mabait na 
Diyos ng mga konsiyensya at ng pagkakatulog ng mga mamamayan doon: hindi 
nakapangingilabot man lamang sa kanila; at sakali't masalita sa kanila ang 
Diyos sa alin mang sermon, walang salang naiisip nilang kasabay ang pagbubuntong 
hininga: Kung iisa sana ang Diyos!... Bahagya na nila nagugunita ang Diyos: 
lalong malaki pa nga ang kapagurang sa kanila'y ibinibigay ng mga santo at 
mga santa. Napapalagay ang Diyos sa mga taong iyong tulad diyan sa mga haring 
naglalagay sa kanyang paligid ng mga tinatangi sa pagmamahal na mga 
lalaki't babae: ang sinusuyo lamang ng baya'y itong kanilang mga tinatangi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">May pagkawangis ang San Diego sa Roma; 
nguni't hindi sa Roma ng panahong ginuguhitan ng araro ng kuhilang si 
Romulo 
ang kanyang mga kuta; hindi rin sa Romang nakapaglalagda ng mga kautusan sa 
sandaigdig sa paliligo sa sarili't sa mga ibang dugo, hindi: wangis ang San 
Diego sa kasalukuyang Roma, at ang bilang kaibhan lamang ay hindi mga 
monumentong marmol at mga koliseo ang naroon, kung di sawaling monumento at 
sabungang pawid. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang pinaka-papa sa Vatikano'y 
ang kura; ang pinaka hari sa Italiang na sa Quirinal 
ay ang alperes ng Guwardiya Sibil; datapuwa't dapat unawaing ibabagay na lahat sa 
sawali at sa sabungang pawid. At dito'y gaya rin doong palibhasa'y ibig 
makapangyari ang isa't isa, nangagpapalagayang ang isa sa kanila'y labis (sa 
makatuwid ay dapat mawala ang isa sa kanila), at dito nanggagaling ang walang 
likat na samaan ng loob. Ipaliliwanag namin ang aming sabi, at sasaysayin namin 
ang kaugalia't budhi ng kura at ng alperes.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Si Padre Bernardo Salvi ay yaong bata at 
hindi makibuing frankiskanong sinaysay na namin sa unahan nito. Natatangi siya, 
dahil sa kanyang mga asal at kilos sa kanyang mga kapwa prayle, at lalonglalo 
na sa napakabalasik na si Padre Damasong kanyang hinalinhan. Siya'y payat, masasaktin, halos lagi na 
lamang nag-iisip, mahigpit sa pagtupad ng kanyang mga katungkulan sa 
religion, at mapag-ingat sa karilagan ng kanyang pangalan. May isang buwan 
lamang na nakararating siya roon, halos ang lahat ay nakikapatid na sa V.O.T., 
bagay na totoong ipinamamanglaw ng kanyang kapangagaw na kofradia ng 
Santisimo Rosario. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Lumulukso ang kaluluwa sa katuwaan pagkakita ng nakasabit sa 
bawa't liig na apat o limang mga eskapulario, at sa bawa't bayawang ay isang 
kordong may mga buhol, at niyong mga prokesion ng mga bangkay o mga 
fantasma 
na may mga habitong ginggon. Nakatipon ang sakristan mayor ng isang 
mabutibuti ng puhunan, sa pagbibili o sa pagpapalimos, sapagkat ganito ang 
marapat na pagsasalita, ng mga kasangkapang kinakailangan upang mailigtas ang 
kaluluwa at mabaka ang diablo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Talastas ng ang espiritung ito, na ng una'y 
nangangahas na sumalansang ng pamukhaan sa Diyos, at nag-aalinlangan sa 
pananampalataya sa mga wika nito, ayon sa sabi sa librong santo ni Job, na 
nagpailanglang sa alang-alang sa ating Panginoong Jesukristo, na gaya ng 
ginawa naman ng Edad Media 
sa mga bruja, 
at nananatili, ang sabihan, hangga ngayon sa paggawa ng gayon din sa mga aswang 
											sa Pilipinas. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Datapuwa't tila mandin ngayon ay naging mahihiyaing totoo na, 
hanggang sa hindi makatagal sa pagtingin sa kapirasong damit na kinalalarawanan 
ng dalawang brazo, at natatakot sa mga buhol ng isang kordon: nguni't dito'y 
walang napagkikilala kung di sumusulong naman ang dunong sa panig na ito, at ang 
diablo'y aayaw sa pagsulong, o kung dili kaya'y hindi malulugdin sa pagbabagong 
asal, tulad sa lahat ng namamahay sa mga kadiliman, sakasakali't hindi ibig na 
sapantahain nating taglay niya ang mga kahinaan ng loob ng isang dalagang 
lalabing-limang taon lamang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Alinsunod sa aming sinabi, si Padre Salvi'y 
totoong masigasig gumanap ng kanyang mga katungkulan; napakasigasig naman, ang 
sabi ng alperes,--Samantalang nagsesermon--totoong siya'y maibiging 
magsermon--pinasasarhan niya, ang mga pintuan ng simbahan. Sa ganitong gawa'y 
natutulad siya kay Neron 
na ayaw magpaalis kanino man, samantalang kumakanta sa teatro: nguni't 
ginagawa iyon ni Neron sa ikagagaling, datapuwa't ginagawa ang mga bagay na 
iyon ng kura sa ikasasama ng mga kaluluwa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang lahat ng kakulangan ng 
kanyang mga nasasakop, ang kadalasa'y pinarurusahan ng mga 'multa'; sapagkat bihirang bihirang namamalo siya; sa bagay na ito'y naiiba siyang lubha 
kay Padre Damaso, na pinaghuhusay ang lahat sa pamamag-itan ng mga panununtok 
at panghahampas ng bastong nagtatawa pa at taglay ang magandang hangad. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa bagay na ito'y hindi siya mapaghihinanaktan: lubos ang kanyang paniniwalang sa 
pamamalo lamang pinakikipanayaman ang 'indio'; ganito ang salita ng isang 
prayleng marunong sumulat ng mga libro, at kanyang sinasampalatayanan, sapagkat hindi niya, tinututulan ang ano mang nalilimbag: sa hindi 
pagkamasuwaying ito'y makararaing ang maraming tao.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bihirang bihirang namamalo si 
Padre Salvi, 
nguni't gaya na nga ng sabi ng isang sa baya'y matandang pilosopo, 
na ang nagiging kakulangan sa bilang ay pinasasagana naman sa tindi; 
datapuwa't hindi rin naman siya mapaghihinanaktan tungkol sa ganitong gawa. 
Nakapangingilis ng kanyang mga ugat ang kanyang mga pag-aayuno 
at pangingilin ng pagkain ng mga lamang-kati na siyang ikinapagiging 
dukha ng kanyang dugo, at, ayon sa sabihan ng tao, pumapanhik daw ang hangin 
sa kanyang ulo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang alperes, na gaya na nga ng sinabi 
namin, ang tanging kaaway ng kapangyarihang ito sa kaluluwa, na may pakay na 
makapangyari naman sa katawan. Siya lamang ang tangi, sapagkat sinasabi ng mga babae na tumatakas daw sa 
kura ang diablo, dahilang sa 
ng minsang 
nangahas ang diablo na tuksuhin ang kura, siya'y hinuli nito, iginapos sa paa 
ng katre at saka pinalo ng kordon, at kaya lamang siya inalpasan ay ng 
makaraan na ang siyam na araw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Yaya mang gayo'y ang taong 
pagkatapos ng ganitong nangyari, makipagkagalit pa sa kay Padre Salvi ay 
maipapalagay na masama pa sa mga abang diablong hindi marunong mag-ingat, kaya 
nga't marapat na magkaroon ng gayong kapalaran ang alperes. Do&ntilde;a Consolacion kung tawagin ang kanyang 
ginoong asawa, na isang matandang filipina, na nagpapahid ng maraming mga 
'kolorete' 
at mga pintura; iba ang ipinangangalan sa kanya ng kanyang esposo at ng iba 
pang mga tao. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nanghihiganti sa sariling katawan ang 
											alperes, sa kanyang 
pagkawalang palad sa matrimonio, na nagpapakalasing hanggang sa di 
makamalay-tao; pinag-'eejerkikio' 
ang kanyang mga sundalo sa arawan at siya'y sumisilong sa lilim, o kung dili kaya, at ito'y siyang lalong madalas, pinapagpag niya ng palo ang likod ng 
kanyang asawa, na kung di man isang 'kordero' (tupa) ng Diyos na umaalis 
ng kasalanan nino man, datapuwa't nagagamit naman sa pagbabawas sa kanya ng 
maraming mga kahirapan sa purgatoryo, sakali't siya'y maparoon, bagay na 
pinag-aalinlanganan ng mapamintakasing mga babae. Nangaghahampasang magaling 
ang alperes at si Do&ntilde;a Consolaciong parang nangagbibiruan lamang, at nag-aalay 
silang walang bayad sa mga kapit-bahay ng mga panoorin: 'konkierto vokal' at 
'instrumental' 
ng apat na kamay, mahina, malakas, na may 'pedal' 
at lahat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kailan mang dumarating sa tainga ni Padre 
Salvi ang mga eskandalong 
ito, siya'y ngumingiti at nagkukruz at nagdarasal pagkatapos ng isang Ama namin; kung tinatawag siyang 'karka', 
mapagbanalbanalan, 'karliston', 
masakim, ngumingiti rin si Padre Salvi at lalong nagdarasal. Kailan ma'y 
ipinagbibigay alam ng alperes sa iilang kastilang sa kanya'y dumadalaw ang 
sumusunod na kasabihan:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Paparoon ba kayo sa kumbento upang 
dalawin ang 'kurita' 
'Moska, muerta? 
Mag-ingat kayo! Sakali't anyayahan kayong uminom ng tsokolate, bagay na 
aking pinag-aalinlanganan!.. nguni't gayon man, kung kayo'y aanyayahan, kayo'y 
magmasid. Tinawag ang alila't sinabing: 'Fulanito, gumawa ka ng isang 'jikarang' 
tsokolate; eh?'--Kung gayo'y matira kayong walang ano mang agam-agam; nguni't kung sabihing: 
'gumawa ka ng isang 'jikarang' tsokolate, 'ah'?'--Pagka gayo'y 
damputin ninyo ang inyong sombrero at yumao kayong patakbo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit?--ang tanong 
ng kausap na nagugulat--nanglalason po ba sa pamamag-itan ng tsokolate? 
Carambas!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba, hindi naman 
napakagayon!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At paano, kung gayon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pagka tsokolate eh? ang kahuluga'y 
malapot, at malabnaw pagka tsokolate ah?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't inaakala naming ito'y bintang 
lamang ng alperes; sapagkat ang kasabihang ito'y kabalitaang ginagawa rin daw 
ng maraming mga kura. Ayawan lamang kung ito'y talagang ugali na ng&nbsp; buong&nbsp; kapisanan ng mga 
prayle ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Upang pahirapan ang kura, ipinagbabawal 
ng militar, sa udyok ng kanyang asawa, na sino ma'y huwag makagala pagkatugtog 
ng ikasiyam na horas ng gabi. Sinasabi ni Do&ntilde;a Consolaciong di umano'y kanyang 
nakita ang kura, na nakabarong pinya at nakasalakot ng nito't ng huwag siyang 
makilala, na naglibot na malalim na ang gabi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nanghihiganti naman ng&nbsp; buong&nbsp; 
											kabanalan si Padre Salvi: pagkakita 
											niyang pumapasok sa simbahan ang 
											alperes, lihim na nag-uutos sa 
											sakristang isara ang lahat ng mga 
											pinto, at nagpapasimula ng 
											pagsesermon hanggang sa mapikit ang 
											mga mata ng mga santo at ibulong sa 
											kanya ng kalapating kahoy na na sa 
											tapat ng kanyang ulo, ang larawan 
											baga ng Espiritung Diyos, na siya 
											na, alang-alang! 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi dahil dito'y nagbabagong ugali ang 
											alperes, na gaya rin ng lahat ng 
hindi marurunong magbalik-loob: lumalabas sa simbahang nagtutungayaw, at 
pagkasumpong sa isang sakristan o alila ng kura'y pinipiit, binubugbog at 
pinapagpupunas ng sahig ng kuartel at ng bahay niyang sarili, na pagka 
nagkakagayo'y lumilinis. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Pagbabayad ng sakristan ng multang ipinarurusa ng kura, dahil sa hindi niya pagsipot, kanyang ipinauunawa, ang 
kadahilanan. 
Diniringig siyang walang kibo ni Padre Salvi, iliniligpit ang salapi, at ang unang 
ginagawa'y pinawawal-an ang kanyang mga kambing at mga tupa at ng doon 
sila manginain sa halamanan ng alperes, samantalang humahanap siya ng isang 
bagong palatuntunan sa isang sermong lalong mahaba at nakapagpapabanal. 
Datapuwa't hindi nagiging hadlang ang lahat ng ito, upang pagkatapos ay 
mangagkama'y at magsalitaan ng&nbsp; buong&nbsp; kahinusayan, kung sila'y magkita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagka, itinutulog ng kanyang asawa ang kalasingan o humihilik 
kung tanghali, hindi maaway ni Do&ntilde;a Consolacion ang 
alperes, pagkakagayo'y lumalagay sa bintana't humihitit ng tabako at nakabarong 
franelang azul. Palibhasa'y kinasususutan niya ang kabataan, mula sa kanyang 
kinalalagya'y namamana, siya ng kanyang mga mata, sa mga dalaga, at sila'y 
kanyang pinipintasan. Ang mga dalagang itong sa kanya'y nangatatakot, 
dumaraang kimingkimi, na di man lamang maitunghay ang mga mata, nangagdudumali 
ng paglakad at pinipigil ang paghinga. May isang kabanalan si Do&ntilde;a Consolacion: tila mandin hindi siya nananalamin 
kailan man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ito ang mga makapangyarihan sa bayang San 
Diego.</font></p>
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