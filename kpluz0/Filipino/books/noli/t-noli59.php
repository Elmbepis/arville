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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LIX. Ang Kinagisnang Bayan at ang mga Pag-aari</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">&nbsp;</p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lihim na ibinalita ng telegrapo ang 
											nangyaring iyon sa Maynila at ng 
											makaraan ang tatlompo't anim na 
											horas ay nangagsasaysay na ng bagay 
											na iyon ng malaking talinghaga at 
											hindi kakaunting mga pagbabala, ang 
											mga pamahayagan, na dinagdagan, 
											pinagbuti at binawasan ng fiskal. 
											Samantala'y mga balitang tanging 
											mula sa mga kumbento ang nangaunang 
											tumakbong salinsalin sa mga bibig, 
											sa lihim, na nagbibigay ng malaking 
											takot sa bawa't makaalam. Ang 
											nangyaring iyong sa libolibong 
											pagkakabalita'y nagkaiba ng lubha, 
											pinaniniwalaan ng humigit kumulang 
											na kadalian, alinsunod sa kung 
											nagpapapuri o nakasasalansang sa mga 
											hidwang hilig at anyo ng kaisipan ng 
											bawa't isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bagaman hindi nasisira ang 
											katahimikan ng bayan, sa paimbabaw 
											man lamang, nguni't naliligalig ang 
											kapayapaan ng bahay, tulad sa 
											nangyayari sa isang lawa: bagaman 
											nakikitang patag at walang ano mang 
											alon ang dakong ibabaw, nguni't sa 
											ilalim ay gumagamaw, 
											nangagtatakbuhan at nangaghahabulan 
											ang mga piping isda. 
											Nangagpasimulang nangagpainog-inog, 
											wangis sa mga paro-paro, ang mga 
											kruz, mga kondekoracion, mga galon, 
											mga katungkulan, mga karangalan, 
											kapangyarihan, kalakhan, matataas na 
											kamahalan at iba pa, sa isang 
											impapawid na gintong salapi sa mga 
											mata ng isang bahagi ng mga 
											mamamayan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa isang bahagi naman ng 
											mga mamamayang iya'y napailanglang 
											sa abot ng paningin ang isang 
											alapaap na madilim, at nangingibabaw 
											sa kulay abo-abong 
											pinakapang-ilalim, ang maiitim na 
											parang anino ng mga rehas, mga 
											tanikala, at pati ng kalagimlagim na 
											bibitayan. Wari'y nariringig sa 
											hangin ang mga tanong, ang mga bato, 
											ang mga sigaw na pinapaknit ng mga 
											pahirap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nag-agam-agam ang Marianas at 
											ang Bagumbayang kapwa nangababalot 
											ng isang parang maduming pigta ng 
											dugong kulubong: na sa kulabo ang 
											mga mangingisda at ang mga isda. Ang 
											nangyaring iyo'y inilaladlad ni 
											Kapalaran sa guniguni ng mga taga 
											Maynilang tulad sa mga tanging 
											paypay na galing sa Tsina: 
											napipintahan ng itim ang isang 
											mukha; ang isa nama'y puspos ng 
											dorado, matitingkad na mga kulay, 
											mga ibon at mga bulaklak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naghahari sa mga kumbento ang 
											malaking ligalig. Isinisingkaw ang 
											mga karwahe, nangagdadalawan ang mga 
											provincial, may lihim na mga pulong. 
											Nangagsisiharap sila sa mga palakio 
											upang kanilang ihandog ang kanilang 
											tulong sa&nbsp;<i>gobyerno na na sa 
											kalakilakihang panganib.</i>&nbsp;Muling 
											napagsalitaanan ang mga kometa, ang 
											mga pasaring, ang mga matutulis na 
											pananalita, at iba pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang&nbsp;<i>Te Deum,</i>&nbsp;isang&nbsp;<i>Te 
											Deum!</i>--ang sinasabi ng isang 
											prayle sa isang kumbento;--at ngayo'y 
											sino ma'y huwag magkukulang sa 
											pagpasakoro! Hindi kakaunting 
											kagalingan ang ginawa ng Diyos, na 
											ipakita kung gaano ang kahalagahan 
											natin, ngayon pa naman sa mga 
											panahong itong totoong napakasasama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dahil sa ganitong munting turo, 
											marahil ay kinakagat ang kanyang mga 
											labi ng generalillong Buisit,--ang 
											sagot naman ng isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano kaya ang nangyari sa kanya kung 
											hindi ang mga Kapisanan ng mga 
											prayle?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ng lalong uminam ang ating 
											pagdiriwang, ipagbigay alam sa uldog 
											na tagapagluto at sa prokurador ... 
											Gaudeamus (kainan) sa tatlong araw!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Amen!, Amen! Mabuhay si Salvi 
											Mabuhay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iba naman ang salitaan sa isang 
											kumbento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakita na ninyo? Iya'y isang 
											nag-aral sa mga jesuita; lumalabas 
											sa Ateneo ang mga filibustero!--ang 
											sabi ng isang prayle.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang mga kaaway ng mga prayle.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinabi ko na: ipinapahamak ng mga 
											jesuita ang lupaing ito, pinahahalay 
											ang ugali ng kabataan; datapuwa't 
											pinababayaan, sila't dahil sa 
											gumuguhit sa papel ng ilang mga 
											walang kawawaang kahig manok kung 
											lumilindol....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang Diyos ang nakakaalam kung 
											papaano ang mga pagkakagawa!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga, datapuwa't mangahas 
											kayong sumalansang sa kanila? Pagka 
											nangnginig at gumagalaw ang lahat! 
											sino ang makasusulat ng mga 
											kahig-manok! Wala, si Padre 
											Sekkhi!....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nangagngingitian ng malaking 
											pagpapawalang halaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't ang mga sigwa? at ang mga 
											bagyo?--ang tanong ng isa ng 
											matinding paglibak;--hindi ba 
											kadakidakilaan iyan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino mang mangingisda'y nahuhulaan 
											ang mga bagay na iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagka ang namiminuno'y isang haling 
											... sabihin mo sa akin kung ano ang 
											anyo ng iyong ulo, at sasabihin ko 
											sa iyo kung ano ang iyong panikad! 
											nguni't makikita rin ninyo kung 
											nangagtatangkilikan ang 
											mangagkakaibigan: halos hinihingi ng 
											mga pamahayagang bigyan ng isang 
											mitra (ng katungkulang pagka 
											arzobispo u obispo) si Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kakamtan nga niya! Masusunduan 
											niya ang katungkulang iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa akala mo kaya?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At hindi baga! ngayo'y ibinibigay 
											ang katungkulang iyan kahi't sa 
											walang kabuluhang bagay. 
											Nakakikilala ako ng isang sa lalong 
											walang kabuluha'y nagkamit ng mitra: 
											sumulat ng isang walang kawawaang 
											aklat, ipinakilalang walang kaya ang 
											mga&nbsp;<i>indio</i>&nbsp;kung hindi sa mga 
											gawain ng kamay ... psh! matatanda 
											ng pangkaraniwan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay nga! Nakasisira sa religion 
											ang ganyang karaming mga paglihis sa 
											katuwiran!--ang biglang sabi naman ng 
											isa;--kung may mga mata sana ang 
											mitra at kanilang makita ang mga bao 
											ng ulong sa kanila'y 
											pagpuputungan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung ang mga mitra sana'y pawang 
											mga likha ng Naturaleza,--ang dagdag 
											naman ng isa, na ang tinig ay 
											lumalabas sa ilong.--<i>Natura 
											abhorret vakuum ...</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kaya nga kumakapit sa kanila; ang 
											pagkawalang laman ang sa kanila'y 
											humahalina!--ang sagot ng isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mga ito at iba pang mga bagay 
											ang mga sabihan sa mga kumbento, at 
											ipinatatawad na namin sa mga 
											bumabasa ang pagsasaysay ng mga 
											ibang mga upasala na may mga kulay 
											politiko, metafisiko at 
											mahahanghang. Ating ihatid ang 
											bumabasa sa bahay ng isang walang 
											ano mang katungkulan, at sapagkat 
											kakaunti ang kakilala natin sa 
											Maynila'y doon tayo pumaroon sa 
											bahay ni kapitang Tinong, ang 
											lalaking mapag-anyaya, na ating 
											nakitang pinipilit anyayahan si 
											Ibarra upang papurihan siya ng isang 
											dalaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa mayama't maluang na salon ng 
											kanyang bahay sa Tundo ay naroon si 
											kapitang Tinong, nakaupo sa isang 
											malapad na sillon, na hinahagpos ang 
											noo't ang batok, na may anyong 
											lubhang nahahapis, samantalang 
											umiiyak at pinagwiwikaan siya ng 
											kanyang asawang si kapitana 
											Tinkhang, sa harap ng kanyang 
											dalawang anak na babae, na 
											nagsisipakinig mula sa isang sulok 
											na hindi nangagsisiimik, 
											nangatutulig at nangababagbag ang 
											loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay, Birhen sa Antipolo!--ang sigaw 
											ng babae.--Ay, Birhen del Rosario at 
											de la Correa! ay!, ay! Nuestra 
											Se&ntilde;ora de Novaliches!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nanay!--ang sa kanya'y sinabi ng 
											bunso sa kanyang mga anak na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinasabi ko na sa iyo!--ang 
											ipinatuloy ng babae, na pagsisi ang 
											anyo;--sinasabi ko na sa iyo! ay 
											Birhen del Carmen, ay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't hindi ka naman nagsasabi sa 
											akin ng ano man!--ang ipinangahas 
											isagot ni kapitang Tinong na 
											napapaiyak;--baligtad, sinasabi mo sa 
											aking mabuti ang aking ginagawa sa 
											pagmamalimit ko sa bahay na iyon at 
											manatili sa pakikipag-ibigan kay 
											Kapitan Tiago, sapagkat ... Sapagkat mayaman ... at sinabi mo sa 
											aking....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano? ano ang sinabi ko sa iyo? 
											Hindi ko sinasabi sa iyo iyan, wala 
											akong sinasabing ano man sa iyo! Ay! 
											kung pinakinggan mo sana ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayo'y ako ang bibigyan mong 
											kasalanan!--ang itinutol ng masaklap 
											na tinig, at saka tumampal ng 
											malakas sa kamay ng sillon;--hindi 
											mo ba sinabi sa aking magaling ang 
											aking ginawa na siya'y aking 
											inanyayahang kumain dito sa atin, 
											sapagkat palibhasa'y mayaman ... 
											sinasabi mong hindi dapat tayong 
											makipagkaibigan kung di sa mayayaman 
											lamang? Aba!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay ngang sinabi ko iyan sa iyo, 
											sapagkat ... Sapagkat wala ng 
											magagawa; wala kang ginagawa kung 
											hindi purihin siya;&nbsp;<i>don Ibarra</i>&nbsp;dito,&nbsp;<i>don 
											Ibarra</i>&nbsp;doon,&nbsp;<i>don Ibarra</i>&nbsp;sa 
											lahat ng panig, abaa! Datapuwa't 
											hindi ko inihatol sa iyong 
											makipagkita ka sa kanya o 
											makipagsalitaan ka sa kanya sa 
											pagkakapisang iyon; hindi mo 
											maikakaila ito sa akin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman ko bang paparoon siya 
											roon?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! dapat mong maalaman!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Paano? siya'y hindi ko man lamang 
											nakikilala pa niyon?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! dapat mo siyang makilala!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't Tinkhang, paano'y niyon ko 
											lamang siya nakita, at niyon ko 
											lamang naman naringig na siya'y 
											pinag-uusapan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! dapat sanang nakita mo siya ng 
											una, naringig ang usapan tungkol sa 
											kanya, sapagkat lalaki ikaw, may 
											salawal ka at bumabasa ka ng&nbsp;<i>Diario 
											de Manila!</i>--ang di mabiling na 
											sagot ng asawa, kasabay ng 
											pagpapahatid sa kanya ng 
											kakilakilabot na irap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Walang maalamang itutol si kapitan 
											Tinong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi pa nasiyahan si kapitana 
											Tinkhang sa kanyang pagwawaging 
											ito'y pinaksang siya'y 
											papanggipuspusin, kaya't sa kanya'y 
											lumapit na nakasuntok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kaya ba nagpagal ako ng mahabang 
											panahon at nagtipid ng hindi kawasa, 
											at ng dahil sa iyong kahalinga'y 
											ipahamak mo ang bunga ng aking mga 
											pagod?--ang ipinagwika sa 
											kanya,--ngayo'y paririto sila't ng 
											ikaw ay dalhin sa tapunan, huhubaran 
											kami ng ating pag-aari, gaya ng 
											nangyari sa asawa ni ... Oh, kung 
											lalaki lamang ako! kung lalaki 
											lamang ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ng makita niyang tumutungo ang 
											kanyang asawa, muling nagpasimula ng 
											pagtanguyngoy, nguni't lagi ring 
											inuulit:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay, kung lalaki lamang ako! kung 
											lalaki lamang ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kung naging lalaki ikaw,--ang 
											itinanong sa kawakasan ng lalaking 
											nadadalimumot na,--ano sana ang 
											gagawin mo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano? aba!, aba!, aba! ngayon di'y 
											haharap ako sa Capitan General, 
											upang ako'y humandog sa pakikihamok 
											laban sa mga nanghihimagsik, ngayon 
											din!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't hindi mo ba nababasa ang 
											sinasabi ng&nbsp;<i>Diario?</i>&nbsp;Basahin 
											mo! 'Nasugpo ng&nbsp; buong&nbsp; higpit, 
											lakas at katigasan ang kaliluhang 
											imbi at kasamasamaan, at hindi 
											malalao't daramdamin ng mga suwail 
											na kaaway ng Inang Bayan at ng 
											kanilang mga kainalam, ang&nbsp; buong&nbsp; 
											bigat at kabangisan ng mga kautusan' 
											... nakita mo na? wala ng 
											himagsikan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi kailangan, dapat kang humarap 
											na gaya ng ginawa ng madla ng taong 
											72, at nangakaligtas nga naman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga! humarap din si Padre 
											Burg....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't hindi natapos ang salita; 
											tinakbo siya ng babae at tinakpan 
											ang kanyang bibig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hala! sabihin mo ang pangalang iyan 
											at ng bukas di'y bitayin ka sa 
											Bagumbayan Hindi mo ba nalalamang 
											sukat na ang saysayin ang pangalang 
											iyan upang parusahan ka, na hindi 
											kailangan ang gumawa pa ng&nbsp;<i>kausa?</i>&nbsp;Hala! 
											sabihin mo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kahit ibigin man ni kapitan Tinong 
											sundin ang utos ng kanyang asawa'y 
											hindi rin mangyayari; natatakpan ang 
											kanyang bibig ng dalawang kamay ng 
											kanyang asawa, at iniipit ang 
											kanyang maliit na ulo laban sa 
											likuran ng sillon, at marahil 
											namatay sa pagkainis ang abang 
											lalaki kung hindi namag-itan ang 
											isang bagong dumating na tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ito'y ang kanilang pinsang si 
											Primitivo, na nasasaulo ang Amat, 
											isang lalaking may mga apat na pong 
											taon ang gulang, malinis ang 
											pananamit, titiyanin at may 
											katabaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--<i>Quid 
											video?</i>--ang biglang sinabi;--ano 
											ang nangyayari?&nbsp;<i>Quare?</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay, pinsan!-anang babae na umiiyak 
											at tumatakbong patungo sa 
											kanya;--ipinatawag kata, sapagkat 
											hindi ko maalaman kung ano ang 
											mangyayari sa aming mga babae ... 
											ano ba ang hatol mo sa amin? 
											Magsalita ka, ikaw na nag-aral ng 
											latin at mga&nbsp;<i>argumento</i>&nbsp;(pakikipagmatuwiran)!..</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't bago magsalita ako,&nbsp;<i>Quid 
											quaeritis? Nihil est in intellektu 
											quod prius non fuerit in sensu; 
											nihil volitum quin praekognitum,</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At marahang naupo. Anaki mandin ang 
											mga sinabing wikang latin ay may 
											bisang nakapagbibigay kapanatagan, 
											kapwa tumigil ng pagtangis ang 
											mag-asawa, at nangagsilapit sa kanya 
											at hinihintay sa kanyang mga labi 
											ang aral, na gaya naman ng ginagawa 
											ng mga griego ng una kung hinihintay 
											ang pangligtas na salita ng 
											'orakulo' na makapagliligtas sa 
											kanila sa manglulusob na mga taga 
											Persia.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit kayo umiiyak?&nbsp;<i>Ubinam 
											gentium sumus?</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman mo na ang balita tungkol 
											sa panghihimagsik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--<i>Alzamentum 
											Ibarra ab alferesio Guardia sibilis 
											destruktum? Et nunk?</i>&nbsp;At ano? May 
											utang ba sa inyo si Don Crisostomo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala, nguni't talastasin mong 
											inanyayahan siya ni Tinong na kumain 
											dito, bumati sa kanya sa tulay ng 
											Espa&ntilde;a ... sa liwanag ng araw! 
											Wiwikain nilang si Don Crisostomo'y 
											kanyang kaibigan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kaibigan?--ang biglang sinabing 
											namamangha ang latino, at saka 
											tumindig,&nbsp;<i>amike, amikus 
											Plato sed magis amika veritas!</i>&nbsp;Sabihin mo 
											sa akin kung sino ang kasakasama mo 
											at sasabihin ko sa iyo kung sino 
											ikaw!&nbsp;<i>Malum negotium et est 
											timendum rerum istarum 
											horrendissimum resultatum!</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namutla ng katakottakot si kapitang 
											Tinong ng kanyang marinig ang gayong 
											karaming salitang ang katapusa'y&nbsp;<i>um</i>; 
											ang tunog na ito'y ipinalalagay 
											niyang masama ang kahulugan. 
											Pinapagdaop ng kanyang asawa ang 
											dalawang kamay sa pagsamo, at 
											nagsabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinsan, huwag mo kaming kausapin 
											ngayon ng latin; talastas mo nang 
											hindi kami mga pilosopong gaya mo; 
											kausapin mo kami ng tagalog o 
											kastila, datapuwa't hatulan mo kami 
											ng dapat naming gawin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sayang na hindi kayo marunong ng 
											latin, pinsan; ang mga katotohanan 
											sa latin ay kasinungalingan sa 
											tagalog, sa halimbawa:&nbsp;<i>kontra 
											prinkipia negantem fustibus est 
											arguendum,</i>&nbsp;sa latin ay isang 
											katotohanang tulad sa Daong ni Noe; 
											minsa'y ginamit ko sa gawa ang bagay 
											na iyan, ang pinangyarihan ay ako 
											ang nabugbog. Dahil dito, 
											kahinahinayang na hindi kayo 
											marunong ng latin; sa latin ay 
											mahuhusay na lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kami ay maraming nalalaman namang&nbsp;<i>oremus, 
											parkenobis</i>&nbsp;at&nbsp;<i>Agnus Dei 
											Catolis,</i>&nbsp;nguni't ngayo'y hindi 
											tayo magkakawatasan. Bigyan mo nga 
											ng isang&nbsp;<i>argumento</i>&nbsp;si 
											Tinong at ng huwag siyang bitayin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masama ang ginawa mo, totoong 
											kasamasamaan ang ginawa mo, pinsan, 
											sa iyong ginawang pakikipagkaibigan 
											sa binatang iyan!--ang muling sinabi 
											ng latino.--Nagbabayad ang mga walang 
											kasalanan sa gawa ng mga 
											makasalanan; halos ihahatol ko sa 
											iyong gawin mo na ang iyong&nbsp;<i>testamento&nbsp;</i>(kasulatang 
											pinaglalagdaan ng mga huling 
											kalooban ng isang tao)....&nbsp;<i>Vae 
											illis! Ubi est fumus ibi est ignis! 
											Similis simili gaudet; alqui Ibarra 
											ahorkatur, ergo ahorkaberis!</i>....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nagpapailing-iling na masama ang 
											loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Saturnino, ano ang nangyayari sa 
											iyo!--ang sigaw ni kapitana Tinkhang, 
											na puspos ng takot;--ay, Diyos ko! 
											Namatay! Isang manggagamot! Tinong, 
											Tinonggoy!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumalo ang dalawang anak na babae at 
											nagpasimula ang tatlo ng 
											pananambitan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ito'y isang panghihimatay lamang, 
											pinsan, isang panghihimatay! Lalo pa 
											sanang ikatutuwa ko kung ... kung 
											...; datapuwa't sa kawalang palad ay 
											wala kung di isang panghihimatay 
											lamang.&nbsp;<i>Non timeo mortem in katre 
											sed super espaldonem Bagumbayanis.</i>&nbsp;Magdala 
											kayo rito ng tubig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang mamatay!--ang panambitan 
											ng babae;--huwag kang mamatay, sapagkat paririto sila't huhulihin 
											ikaw! Ay, kung ikaw ay mamatay at 
											saka pumarito ang mga sundalo, ay! 
											ay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Winiligan ng pinsan ng tubig ang 
											mukha ni kapitang Tinong, at 
											pinag-saulian ito ng pag-iisip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hala, huwag kayong umiyak!&nbsp;<i>Inveni 
											remedium,</i>&nbsp;nasumpungan ko na ang 
											gamot. Ilipat natin siya sa kanyang 
											hihigan; hala! tapangan ninyo ang 
											inyong loob! narito ako at ang lahat 
											ng karunungan ng mga tao sa una.... 
											Magpatawag kayo ng isang doktor;--at 
											ngayon din, pinsan kong babae, 
											pumaroon ka sa kapitan general at 
											dalhan mo siya ng isang handog, 
											isang tanikalang ginto, isang 
											singsing....&nbsp;<i>Dadivae quebrantant 
											pe&ntilde;as;</i>&nbsp;(dumudurog ng bato ang 
											handog); sabihin mong iya'y handog 
											dahil sa pasko. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sarhan ninyo ang mga 
											bintana, ang mga pinto, at sino mang 
											magtanong sa aking pinsan, sabihin 
											ninyong may sakit na mabigat. 
											Samantala'y susunugin ko ang lahat 
											ng mga sulat, mga papel at mga libro 
											at ng huwag silang makakita ng ano 
											man, gaya ng ginawa ni Don 
											Crisostomo.&nbsp;<i>Skripti testes sunt! 
											Quod medikamenta, non sanant, ferrum 
											sanat, quod ferrum non sanat, ignis 
											sanat&nbsp;</i>.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo, tanggapin mo, pinsan; sunugin 
											mong lahat!-ani kapitana 
											Tinkhang;--narito ang mga susi, 
											narito ang mga sulat ni Kapitan 
											Tiago, sunugin mong lahat! Huwag ka 
											sanang mag-iiwan ng ano mang 
											pamahayagang galing sa Europa, sapagkat totoong nakapagbibigay 
											panganib. Narito itong mga&nbsp;<i>The 
											Times</i>&nbsp;na aking iniingata't ng 
											mapagbalutan ng mga sabon at ng mga 
											damit. Narito ang mga libro.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pumaroon ka na sa kapitan general, 
											pinsan,--ani Primitivo;--pabayaan mo 
											akong mag-isa.&nbsp;<i>In extremis 
											extrema.</i>&nbsp;Bigyan mo ako ng 
											kapangyarihan ng isang 
											tagapamatnugot na romano, at 
											makikita mo kung paano ang 
											pagliligtas na gagawin ko sa bay ... 
											sa aking pinsang lalaki baga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nagpasimula ng sunodsunod na 
											pag-uutos, ng paghalo ng mga 
											estante, ng pagpupunit ng mga papel, 
											mga libro, mga sulat at iba pa. 
											Hindi nalao't nag-alab sa&nbsp;<i>kokina</i>&nbsp;ang 
											isang siga; kanilang sinibak ng 
											palakol ang mga lumang eskopeta; 
											itinapon nila sa kumon ang mga 
											kalawanging revolver; ang alilang 
											babaeng ibig sanang iligpit ang 
											ka&ntilde;on ng isang revolver at ng 
											magamit na hihip ay kinagalitan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--<i>Conservare 
											etiam sperasti, perfida?</i>&nbsp;Sa 
											apoy!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ipinatuloy ang kanyang pagsunog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nakakita ng isang librong ang 
											balat ay pergamino (balat ng vaka) 
											ay binasa niya ang pangalan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'mga revolucion ng mga globo sa 
											langit' (mga ganap na pag-inog ng 
											mga planeta sa kanilang talagang 
											tinatakbuhan), na sinulat ni 
											Coperniko; pfui!&nbsp;<i>ite maledikti, 
											in ignem kalanis!</i>--ang biglang 
											sinabi at saka inihagis sa ningas. 
											mga revolucion at saka si Coperniko 
											pa! Patong patong na kasalanan! Kung 
											di dumating ako sa kapanahunan ... 
											'Ang kalayaan ng Filipinas'; Tatata! 
											pagka mga libro! Sa apoy!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At sinunog ang mga librong walang 
											kaanoano mang kasamaan, na sinulat 
											ng mga taong walang malay. Hindi man 
											lamang nakaligtas ang nagngangalang 
											'Kapitan Juan', na napakawalang 
											sala. May katuwiran si pinsang 
											Primitivo: nagbabayad ang mga walang 
											kasalanan sa mga sala ng mga 
											makasalanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang makaraan ang apat o limang oras 
											ay pinagsasalitaanan ang 
											kasalukuyang mga nangyayari sa isang 
											pulong ng mga nagmamataas, sa loob 
											ng Maynila. Sila'y karamihang 
											matatandang babae at mga dalagang 
											matatandang nakaka-ibig mag-asawa, 
											mga asawa o mga anak na babae ng mga 
											kawani ng pamahalaan, nangakasuot ng 
											bata, nangagpapaypay at 
											nangaghihikab. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kapanayam ng mga 
											lalaki, na kawangis din naman ng mga 
											babaeng sa kanilang pagmumukha'y 
											nahihiwatigan kung ano ang kanilang 
											pinag-aralan at ang kanilang 
											pinagbuhatan, ang isang ginoong may 
											katandaan na, maliit at pingkaw, na 
											pinagpipitaganan ng mga naroroon, at 
											siya nama'y nagpapakita sa kanyang 
											mga kaharap ng isang pagpapawalang 
											halaga sa kanyang hindi pag-imik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang katotohanan ay dating totoong 
											nasususot ako sa mga prayle at sa 
											mga guwardiya sibil, dahil sa 
											kagaspangan ng kanilang mga 
											asal,--ang sabi ng isang matabang 
											ginoong babae; ngunit ngayong 
											nakikita ko ang sa kanila'y 
											pinakikinabang at ang kanilang mga 
											paglilingkod, halos aking ikagagalak 
											na pakasal sa alin man sa kanila. 
											Makabayan ako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon din ang sabi ko!--ang 
											idinagdag ng isang babaeng 
											payat;--sayang at ngayo'y wala rito 
											ang naunang gobernador; kung siya 
											ang naririto'y lilinising parang 
											'patena' ang bayang ito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At malilipol ang mga lahi ng mga 
											filibusterillo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ba ang sabiha'y marami pa ang 
											mga pulong kinakailangang padalhan 
											ng mga mamamayan doon. Bakit hindi 
											itapon doon ang ganyan karaming 
											mayayabang na mga indio! Kung ako 
											ang kapitan general....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--mga ginoong babae,--anang 
											pingkaw;--nalalaman ng kapitan 
											general kung ano ang kanyang 
											katungkulan; ayon sa aking naringig 
											ay totoong galit na galit siya; 
											sapagkat kanyang pinuspos ng mga 
											biyaya ang Ibarrang iyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinuspos ng mga biyaya!--ang inulit 
											ng payat na babae, na nagpapaypay ng 
											malaki ang poot;--tingnan na nga 
											lamang ninyo ang pagka hindi 
											marunong kumilala ng utang na loob 
											nitong mga indio! Mangyayari bagang 
											sila'y ipalagay na mga tao sa 
											pagpapanayam? Jesus!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At nalalaman ba ninyo ang aking 
											naringig?--ang tanong ng isang 
											militar.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan natin!--Ano iyon?--Ano ang 
											sinasabi nila?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinagtitibay ng mga taong 
											mapaniniwalaan,--anang militar sa 
											gitna ng lalong malaking hindi 
											pag-imik ng madla;--na ang lahat ng 
											mga kaingayang iyon sa pagtatayo ng 
											isang paaralan ay wala kung di 
											pawang katakata lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Jesus! nakita na ninyo?--ang biglang 
											sinabi ng mga babae, na nangag 
											sisipaniwala na sa katakata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang sangkalan lamang ang 
											paaralan; ang banta niya'y magtayo 
											ng isang kuta, at ng buhat doo'y 
											makapanganlong kung sila'y lusubin 
											na namin....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Jesus! pagkalakilaking kataksilan! 
											Ang isang indio nga lamang ang 
											tanging makapagtataglay ng ganyang 
											pagkaimbiimbing mga isipan,--ang 
											biglang sinabi ng babaeng mataba. 
											Kung ako ang kapitan general, nakita 
											sana nila ... nakita sana nila....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon din ang sabi ko!--ang biglang 
											sinabi naman ng babaeng payat na ang 
											pingkaw ang kinakausap. Darakpin ko 
											ang lahat ng abogadillo, klerigillo, 
											mangangalakal, hindi ko na pagagawan 
											pa ng&nbsp;<i>kausa</i>&nbsp;at sila'y 
											aking itatapon o ipadadala sa ibang 
											lupain. Bawa't masama'y bunutin pati 
											ng ugat!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, sabihana'y kastila ang 
											magugulang ng filibusterillong 
											iyan!--ang pahiwatig ng pingkaw na 
											hindi tumitingin kangino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, gayon pala!--ang sinabing mariin 
											ng hindi masiyahang babaeng 
											mataba;--kailan ma'y ang mga haluan 
											ang dugo! sino mang indio'y hindi 
											nakawawatas ng panghihimagsik! 
											Mag-alaga ka nga naman ng mga uwak! 
											mag-alaga ka nga naman ng mga 
											uwak!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman ba ninyo ang naringig 
											kong salitaan?--ang itinanong ng 
											isang babaeng haluan ang dugo 
											(mestiza), na sa gayong paraa'y 
											pinutol ang salitaan.--Ang asawa raw 
											ni kapitang Tinong ... naaalaala ba 
											ninyo? iyong may-ari ng bahay na 
											ating pinagsayawan at hinapunan 
											niyong piyesta sa Tundo....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyon bang may dalawang anak na 
											babae? at ano?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, ang babaeng iyo'y bagong 
											kahahandog ngayong hapon sa kapitan 
											general ng isang singsing na isang 
											libong piso ang halaga!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumingon ang pingkaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga ba? at bakit?--ang tanong 
											na numiningning ang mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang sabi raw ng babae, iyon daw ay 
											bigay niyang papasko....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang buwan pa muna ang lalampas 
											bago dumating ang pasko!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil nanganganib na baka 
											lagpakan siya ng sigwa ...--ang 
											pahiwatig ng babaeng mataba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kaya siya'y kumukubli,--ang 
											idinugtong ng babaeng payat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang pagsasanggalang kahi't hindi 
											pinupukol nino man ay 
											pagpapakilalang tunay na may 
											kasalanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan nga ang sumasaisip ko; 
											tinamaan ninyo ang sugat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kinakailangang tingnang magaling 
											iyan,--ang hiwatig ng 
											pingkaw;--nanganganib akong baka 
											riya'y may nakakulong na pusa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakakulong na pusa! iyan nga! iyan 
											nga sana ang sasabihin ko!--ang 
											inulit ng babaeng payat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ako,--ang sinabi naman ng isang 
											babae, na umagaw ng pananalita sa 
											payat;--ang asawa ni kapitang Tinong 
											ay napakaramot ... hangga ngayo'y 
											hindi pa tayo pinadadalhan ng ano 
											mang hangdog, gayong tayo'y 
											napaparoon na sa kanyang bahay. 
											Tingnan ninyo, pagka ang isang 
											maramot at makamkam ay nagbibitiw ng 
											isang handog na isang libong piso'y 
											...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't totoo ba iyan?--ang tanong 
											ng pingkaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At napakatotoo! at napakatunay! 
											sinabi sa aking pinsang babae ng 
											nangingibig sa kanya, na ayudante ng 
											kapitan general. At halos ibig kong 
											akalaing ang singsing na iyon ang 
											suot ng panganay ng araw ng 
											kapiyestahan. Siya'y lagi ng batbat 
											ng mga brillante!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya'y isang tindahang lumalakad!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang paraan din namang magaling 
											upang makapagbili, na gaya rin ng 
											alin man sa ibang mga paraan. Nang 
											huwag ng bumili pa ng isang 
											tautaohan o bumayad pa ng isang 
											tindahan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Linisan ng pingkaw ang pulong na 
											iyon sa pamamag-itan ng isang 
											dahilan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ng makaraan ang dalawang oras, ng 
											nangatutulog na ang lahat, tumangap 
											ang ilang namamayan sa Tundo ng 
											isang anyaya sa pamamag-itan ng mga 
											sundalo ... Hindi mapabayaan ng 
											Punong may kapangyarihang ang mga 
											tanging taong mga mahal at may mga 
											pag-aari ay matulog sa kanilang 
											bahay, na hindi magaling ang 
											pagkakaingat at bahagya na ang 
											lamig: ang pagtulog sa Fuerza ng 
											Santiago at iba pang mga bahay ng 
											gobierno'y lalong tiwasay at 
											nagsasauli ng lakas. Casama sa mga 
											taong itong pinakamamahal ang 
											kaawa-awang si kapitang Tinong.</font></p>
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
																	Nilalaman ng 
																	Noli Me 
																	Tangere</font></a></font></p>
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
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; 
											&nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
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