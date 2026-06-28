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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LVIII. Ang Sinumpa</font></b></p>
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
											Hindi nalao't kumalat sa bayan ang 
											balitang ilalakad ang mga bilanggo; 
											nakalagim muna ang pagkaringig ng 
											gayong balita, at saka sumunod ang 
											mga iyakan at panambitanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtatakbuhang wari'y mga ulol 
											ang mga kasambahay ng mga bilanggo; 
											nangagsisiparoon sa kumbento, mula 
											sa kumbento'y napapasa kuartel at 
											mula sa kuartel ay napasasa 
											tribunal, at sapagkat hindi sila 
											makasumpong ng aliw saan man, 
											kanilang pinupuno ang alang-alang ng 
											mga sigaw at panambitan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nagkulong 
											ang kura sapagkat may sakit, 
											dinagdagan ng alperes ang dami ng 
											mga sundalong na babantay sa kanya, 
											at sinasalubong ng kulata ng mga 
											sundalong iyon ang mga babaeng 
											nangagmamakaamo; ang 
											gobernadorcillo, taong walang 
											kabuluhan, anaki'y lalo pang haling 
											at walang kabuluhan mandin kay sa 
											dati. Sa tapat ng bilanggua'y 
											nangagtatakbuhang pakabikabila ang 
											mga babaeng may lakas pa; ang mga 
											wala na nama'y nangagsisiupo sa 
											lupa't tinatawag ang mga pangalan ng 
											mga taong kanilang iniirog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Maningas ang araw, nguni't sino man 
											sa mga kahabaghabag na iyo'y hindi 
											nakaiisip umuwi. Si Doray, ang 
											masaya't lumiligayang asawa ni Don 
											Filipo'y nagpapakabikabilang puspos 
											ng kapighatian, kilik ang kanyang 
											musmos na anak na lalaki: kapwa sila 
											umiiyak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Umuwi na po kayo,--ang sa kanya'y 
											sinasabi; malalagnat ang inyong 
											anak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit pa mabubuhay kung wala rin 
											lamang isang amang sa kanya'y 
											magtuturo?--ang isinasagot ng 
											nalulunos na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala pong kasalanan ang inyong 
											asawa; marahil siya'y makabalik din!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga, kung patay na kami!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumatangis si kapitana Tinay, at 
											tinatawag ang kanyang anak na si 
											Antonio; tinitingnan ng matapang na 
											si kapitana Maria ang maliit na 
											rehas, sapagkat sa dakong loob 
											niyo'y naroroon ang kanyang dalawang 
											kambal, na siyang tanging mga anak 
											niya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naroroon ang biyanan ng manunuba ng 
											niyog; hindi siya tumatangis: 
											nagpaparoo't parito, na kumukumpas 
											na lilis ang mga manggas at 
											pinagsasabihan ng malakas ang 
											nangaroroon:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May nakita na ba kayong kawangis 
											nito? Hulihin ang aking si Andong, 
											paputukan siya, isuot sa pangaw at 
											ilalakad sa kabekera, dahil lamang 
											sa ... dahil lamang sa may bagong 
											salawal? Humihingi ang ganitong gawa 
											ng ukol na ganti! Napakalabis naman 
											ang mga guwardiya sibil! Isinusumpa 
											kong pagka nakita ko uling sino man 
											sa kanila'y humahanap ng kubling 
											lugar sa aking halamanan, gaya ng 
											madalas na totoong ginagawa nila, 
											aalsan ko sila ng ipinamamayan, 
											aalsan ko sila ng ipinamamayan! o 
											kung hindi ako naman ang kanilang 
											alsan!!!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't iilan tao ang pumapansin sa 
											maka Mahomang biyanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Si Don Crisostomo ang may kasalanan 
											ng lahat ng ito,--ang buntong hininga 
											ng isang babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naroroon di't nagpapakabikabila, na 
											kahalo ng marami, ang maestro sa 
											eskuelahan; hindi na pinapagkukuskos 
											ang mga palad ng kamay ni &ntilde;or Juan; 
											hindi na dinadaladala niya ang 
											kanyang&nbsp;<i>plomada</i>&nbsp;at ang 
											kanyang&nbsp;<i>metro:</i>&nbsp;itim ang 
											pananamit ng lalaki, sapagkat 
											nakaringig siya ng masasamang 
											balita, at palibhasa'y nananatili 
											siya sa kanyang asal na ipalagay ang 
											darating na panahong parang nangyari 
											na, ipinagluluksa na niya ang 
											pagkamatay ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumigil, pagka a las dos ng hapon, 
											sa tapat ng tribunal, ang isang 
											karretong walang ano mang pandong, 
											na hinihila ng dalawang vakang 
											kapon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Linigid ng karamihan ang karreton, 
											na ibig nilang alsin sa pagkasingkaw 
											at ipagwasakan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Huwag kayong gumawa ng gayon,--ani 
											kapitana Maria;--ibig ba ninyong 
											sila'y maglakad?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ito ang pumigil sa mga kasambahay ng 
											mga bilanggo. Lumabas ang 
											dalawampung sundalo at kanilang 
											linigid ang sasakyan. Lumabas ang 
											mga bilanggo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang unauna'y si Don Filipo, na 
											gapos; bumating nakangiti sa kanyang 
											asawa; tumangis ng masaklap si Doray 
											at nahirapan ang dalawang guwardiya 
											upang humadlang sa kanya at ng huwag 
											mayakap ang kanyang asawa. Sumipot 
											na umiiyak na parang musmos si 
											Antoniong anak ni kapitana Tinay, 
											bagay na siyang lalong nakaragdag ng 
											mga pagsigaw ng kanyang familia. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Humagulhol si Andong pagkakita sa 
											kanyang biyanang babae, na siyang 
											may kagagawan ng kanyang 
											pagkapahamak. Baliti rin si Albinong 
											nagseminarista, at gayon din ang 
											dalawang kambal na anak ni kapitana 
											Maria. Masasama ang loob at hindi 
											umiimik ang tatlong binatang ito. 
											Ang huling lumabas ay si Ibarra, na 
											walang tali, nguni't napapag-itanan 
											ng naghahatid na dalawang guwardiya 
											sibil. Namumutla ang binata; humanap 
											siya ng isang mukhang katoto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan ang may kasalanan!--ang 
											ipinagsigawan ng maraming 
											tinig;--iyan ang may kasalanan ay 
											siyang walang tali!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Walang ano mang ginagawa ang aking 
											manugang ay siyang naka-'esposas'!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Liningon ni Ibarra ang mga 
											guwardiya:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gapusin ninyo ako, nguni't gapusin 
											ninyong mabuti ako, abo't siko!--ang 
											kanyang sinabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Walang tinatanggap kaming utos na 
											ganyan ang aming gawin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gapusin ninyo ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumunod ang mga sundalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumipot ang alperes na nangangabayo, 
											at batbat ng mga sandata pati ng mga 
											ngipin; may sumusunod sa kanyang 
											sampu o labinglimang sundalo pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bawa't isang bilanggo'y may 
											kanikanyang kasambahay na 
											nanghihinaing upang kahabagan, na 
											dahil sa kanya'y tumatangis at 
											nagpapalayaw ng lalong matitimyas na 
											taguri. Si Ibarra lamang ang tanging 
											doo'y wala sino man; nangagsialis 
											doon pati si &ntilde;or Juan at ang maestro 
											sa eskuelahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano po ba ang ginawa sa inyo ng 
											aking asawa't ng aking anak?--ang sa 
											kanya'y sinasabi ni Doray na 
											tumatangis; tingnan po ninyo ang 
											kaawaawa kong anak! inalsan ninyo 
											siya ng ama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang pighati ng mga kasambahay ay 
											naging galit sa binata, na 
											pinagbibintangang siyang may 
											kagagawan ng kaguluhan. Ipinag utos 
											ng alperes ang pagya-o.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ikaw ay isang duwag!--ang sigaw ng 
											biyanan ni Andong. Samantalang 
											nakikihamok ang mga iba dahil sa 
											iyo, ikaw nama'y tumatago, duwag!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumpain ka nawa!--ang sabi sa kanya 
											ng isang matandang lalaki na sa 
											kanya'y sumusunod;--pusong ang 
											gintong tinipon ng iyong magugulang 
											at ng sirain ang aming kapayapaan! 
											Pusong!, pusong!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bitayin ka nawa, hereje!--ang sigaw 
											sa kanya ng isang kamag-anak na 
											babae ni Albino, at sa hindi na 
											makapigil ay nuha ng isang bato at 
											sa kanya'y ipinukol.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinundan ang ulirang iyon, at sa 
											ibabaw ng sawing palad na binata'y 
											umulan ang alabok at mga bato.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiniis ni Ibarra ng walang imik, 
											walang poot at walang daing ang 
											tapat na panghihinganti ng gayong 
											karaming mga pusong nangasugatan. 
											Yaon ang paalam, ang&nbsp;<i>adios</i>&nbsp;na 
											sa kanya'y dulot ng kanyang bayang 
											kinalalagyan ng lahat ng kanyang mga 
											sinisinta. Tumungo, marahil kanyang 
											dinidilidili ang isang taong pinalo 
											sa mga lansangan sa Maynila, ang 
											isang matandang babaeng nahandusay 
											na patay pagkakita sa ulo ng kanyang 
											anak na lalaki; marahil dumaraan sa 
											kanyang mga mata ang nangyari sa 
											buhay ni Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minagaling ng alperes na palayuin 
											ang karamihang tao, nguni't hindi 
											huminto ang pangbabato at ang mga 
											paglait. Isa lamang ina ang hindi 
											ipinanghihiganti sa kanya ang 
											kanyang mga pighati: ito'y si 
											kapitana Maria. Hindi kumikilos, 
											nakahibik ang mga labi, puno ang mga 
											mata ng mga luhang umaagos na walang 
											ingay, kanyang pinanonood ang 
											pagpanaw ng kanyang dalawang anak na 
											lalaki; sa panonood sa kanyang hindi 
											pagkilos at sa kanyang piping 
											dalamhati, nawawala ang 
											pagkatalinhaga ni Niobe.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Malayo na ang pulutong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa mga taong nakasungaw sa 
											bihibihirang bintanang nakabukas, 
											ang lalong nagpakita ng habag sa 
											binata'y yaong mga hindi nababahala 
											at walang adhika kung di manood 
											lamang. Nangagtago ang kanyang mga 
											kaibigan, pati si kapitang Basilio'y 
											nagbawal sa kanyang anak na si 
											Sinang, na huwag umiyak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita ni Ibarra ang umaaso pang 
											bahay niyang natupok, ang bahay ng 
											kanyang mga magugulang, ang bahay na 
											sa kanya'y pinanganakan, ang 
											kinabubuhayan ng lalong matatamis na 
											alaala ng kanyang kamusmusan at ng 
											kanyang kabinataan; ang mga luhang 
											malaong kanyang pinipigilpigil ay 
											bumalong sa kanyang mga mata, 
											lumungayngay at tumangis, na hindi 
											magkaroon ng aliw na mailihim ang 
											kanyang pag-iyak, palibhasa'y 
											nakagapos, o makapukaw man lamang 
											ang kanyang pighati ng habag sa 
											kangino man. ngayo'y wala siyang 
											bayan, bahay, kasintahan, mga 
											katoto, at mahihintay na maligayang 
											panahong darating.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Mula sa isang mataas na lugar ay 
											pinanonood ang malungkot na pulutong 
											na iyon ng isang tao. Siya'y isang 
											matandang lalaki, namumutla, payat 
											na payat ang mukha, nakabalot sa 
											isang kumot na lana, at nanunungkod 
											ng&nbsp; buong&nbsp; pagal. Siya ang matandang 
											pilosopo Tasio, na nang mabalitaan 
											ang nangyari ay nagbantang iwan ang 
											kanyang hihigan at dumalo, nguni't 
											hindi itinulot ng kanyang lakas na 
											makarating siya hanggang sa 
											tribunal. Sinundan ng mata ng 
											matanda ang karreton hanggang sa 
											ito'y nawala sa malayo: nanatiling 
											sumandali sa pag-iisip-isip na 
											nakatungo, nagtindig pagkatapos at 
											nag inata ng&nbsp; buong&nbsp; hirap na 
											tinungo ang kanyang bahay, na 
											nagpapahinga maya't maya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nasumpungan siyang patay, 
											kinabukasan, ng mga nag-aalaga ng 
											mga hayop, sa paanan ng pagpasok sa 
											kanyang tahanang nag-iisa.</font></p>
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
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp; &nbsp;
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