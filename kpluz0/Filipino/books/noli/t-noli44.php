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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XLIV. Pagsisiyasat ng Konsiyensya</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Mahabang araw at malulungkot na mga gabi 
ang ginawang pagtatanod sa ulunan ng hihigan; nabinat si Maria Clara karakarakang matapos makapagkumpisal, at wala siyang sinasalita, sa&nbsp; 
buong&nbsp; 
kanyang pagkahibang, kun di ang pangalan ng kanyang ina, na hindi niya 
nakikilala. Datapuwa't siya'y pinakaaalagaan ng kanyang mga kaibigang babae, ng 
kanyang ama at 
ng kanyang tia; nagpapadala ng mga pamisa at ng mga 
limos sa lahat ng mga larawang mapaghimala; nangako si Kapitan Tiagong 
maghahandog ng isang bastong ginto sa Birhen sa Antipolo, at sa kawakasa'y 
nagpasimula ng untiunting paghibas ng lagnat ng&nbsp; buong&nbsp; kahusayan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nanggigilalas ang doktor de Espada&ntilde;a sa 
mga kabisaan ng jarabe de altea at ng pinaglagaan ng liquen, mga panggamot 
na hindi binabago. Sa laking pagkatuwa ni Donya Victorina sa kanyang asawa, isang 
araw na natapakan nito ang kola ng kanyang bata, hindi niya nilapatan ng 
kaugaliang parusang bawian ng panglagay na ngipin, kun di nagkasiya na lamang 
na sa kanya'y sabihin:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung hindi ka pa 
naging pilay, tatapakan mo pati ng korse!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At hindi gumagamit 
ng korse si Donya Victorina!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Isang hapon, samantalang dinadalaw ni 
Sinang at ni Viktoria ang kanilang kaibigan, nangagsasalitaan naman sa komedor 
ang kura, si Kapitan Tiago at ang mag-anak ni Donya Victorina, hanggang sila'y 
nangagmimirindal.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tunay ngang aking dinaramdam ng di 
kawasa,--ang sinasabi ng doktor;--at daramdamin din namang totoo ni Padre Damaso.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At saan po ang sabi ninyong siya'y 
ililipat nila?--ang itinanong ni Linares sa kura.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa lalawigang Tayabas!--ang isinagot ng kura ng walang 
kabahalaan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang magdaramdam naman ng 
malaki ay si Maria pagka kanyang nalaman,--ani Kapitan Tiago;--siya'y kanyang 
kinagigiliwang parang isang ama.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tiningnan siya ng pasuliyap ni 
Padre Salvi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Inaakala ko po among,--ang ipinagpatuloy 
ni Kapitan Tiago,--sa nagbuhat ang lahat ng sakit na ito sa sama ng loob na 
kanyang tinanggap ng araw ng piyesta.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gayon din ang aking akala, at magaling po 
ang ginawa ninyo sa hindi pagpapahintulot na siya'y kausapin ni Ginoong 
Ibarra; siya sana'y lalo ng lumubha.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At kung hindi sa amin,--ang isinalabat ni 
Donya Victorina,--sumasalangit na sana si Clarita at nag-aawit na ng mga 
pagpupuri sa Diyos.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Amen Jesus!--ang inakala ni Kapitan Tiagong marapat sabihin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Inyo rin namang palad na hindi nagkaroon 
ang aking asawa ng ibang may sakit na lalong mataas ang uri, sapagkat kung 
nagkagayo'y napilitan sana kayong tumawag ng iba, at dito'y pawang mga 
hangal; ang aking asawa'y....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aking inaakala, at ipinagpapatuloy ko ang 
aking sinabi,--ang isinalabat naman sa kanya ng kura,--na ang pagkapangumpisal 
ni Maria Clara ang siyang pinagbuhatan niyong magaling na pagbabago ng kanyang kalagayan, na siyang sa kanya'y nakapagligtas ng buhay. Higit sa lahat ng 
gamot ang isang konsiyensyang malinis, at pakaunawaing hindi ko tinututulan ang 
kapangyarihan ng dunong, lalong-lalo na ang dunong sa kirugia! nguni't ang 
isang malinis na konsiyensya'y ... Basahin ninyo ang mga banal na libro, at 
inyong makikita kung gaano ang mga sakit na napagaling sa pamamag-itan lamang ng isang mabuting 
konfesion.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ipatawad po ninyo,--ang itinutol ni Donya 
Victorina na nag-init,--ang tungkol diyan sa kapangyarihan ng konfesion.... 
gamutin nga po ninyo ang asawa ng alperes ng isang konfesion.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang sugat, ginoong babae,--ay hindi 
isang sakit na may ikinapangyayari ang konsiyensya!--ang isinagot ni Padre Salvi, 
na may halong poot;--gayon man, ang isang mabuting konfesion ay makapaglalayo sa 
kanya sa pagtanggap ng mga hampas na gaya ng kanyang mga tinanggap kaninang 
umaga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa kanya'y marapat!--ang ipinagpatuloy ni 
Donya Victorina, na parang hindi niya naringig ang lahat ng sinabi ng Padre Salvi.--Napakawalang bait ang babaeng iyan! Sa simbaha'y wala ng 
ginagawa kung 
di masdan ako, mangyari baga! siya'y isang babaeng walang kapararakan; 
tatanungin ko na sana siya niyong linggo kung mayroon akong mga tautauhan sa 
mukha, nguni't sino ang magkakapol ng dumi sa sarili sa pakikipag-usap sa 
taong walang uri?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa ganang sa kura, nama'y 
parang hindi niya naringig ang lahat ng mga kaltab na ito, at nagpatuloy:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Maniwala po kayo sa akin, don Santiago; 
ng malubos na gumaling ang inyong anak ay kinakailangang makinabang bukas; 
dadalhan ko siya rito ng viatiko ... inaakala kong wala siyang ano mang dapat 
na ipangumpisal, gayon man ... kung ibig niyang mangumpisal ng sandali 
ngayong gabi....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ayawan ko,--ang idinugtong agad ni Donya 
Victorina, na sinamantala ang isang patlang ng salitaan,--hindi ko mapag-isip 
kung bakit may mga lalaking nangagkakaroon ng pusong mag-asawa sa gayong mga 
panggulat, na gaya na nga ng babaeng iyan; kahi't malayo'y namamasid kang saan 
siya nanggaling; napagkikilalang namamatay siya ng kainggitan; mangyari baga! 
gaano na ang sahod ng isang alperes?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nalalaman na po ninyo, don Santiago, 
sabihin ninyo sa inyong pinsang ihanda ang may sakit sa pakikinabang bukas; 
paririto ako ngayong gabi upang siya'y bigyang kapatawaran sa mumunting 
kasalanan....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At sapagkat nakita niyang lamalabas si 
tia Isabel, pinagsabihan niya ito sa wikang tagalog:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ihanda po ninyo ang inyong pamangkin sa 
pangungumpisal ngayong gabi; dadalhan ko siya rito bukas ng viatiko; sa 
ganya'y lalong madadali ang kanyang paggaling.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni, Padre,--ang ipinangahas na 
itinutol ng kimi ni Linares,--baka po niya akalaing siya'y nanganganib na 
mamatay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag po kayong mabahala!--ang sa kanya'y 
isinagot na hindi siya tinitingnan;--nalalaman ko ang aking ginagawa: marami ng 
totoong may sakit ang aking inalagaan. Bukod sa roo'y sasabihin niya kung ibig 
niya o hinding makinabang, at makikita ninyong siya'y paooo sa lahat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang unauna'y napilitan si Kapitan Tiagong 
sa lahat ay paoo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pumasok si tia Isabel sa silid na 
kinalalagyan ng may sakit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nananatili sa hihigan si Maria Clara, 
namumutla, totoong namumutla; na sa kanyang tabi ang kanyang dalawang kaibigang 
babae.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Cumain ka pa ng isang butil,--ang sa 
kanya'y sabi ni Sinang ng paanas, at sa kanya'y ipinakita ang isang butil na 
maputi, na kinuha sa isang maliit na tubong kristal;--ang sabi niya'y pagka 
nakaramdam ikaw ng tunog o hugong sa tainga mo'y iyong ihinto ang panggagamot.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi na ba sumulat uli sa iyo?--ang 
tanong na marahan ng may sakit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi, marahil 
siya'y totoong maraming ginagawa!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ba nagpapasabi sa akin ng ano 
man?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Walang sinasabi kung di kanyang 
pagpipilitang siya'y alsan ng Arzobispo ng exkomunion upang....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Inihinto ang salitaan, 
sapagkat 
dumarating ang tia.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sinabi ng among na maghanda ka raw sa 
pangungumpisal, anak ko,--ani tia Isabel;--iwan ninyo siya at ng magawa niya ang 
pagsisiyasat ng kanyang konsiyensya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Diyata't wala pa namang isang linggong 
nakapangungumpisal siya!--ang tutol ni Sinang,--Ako'y walang sakit, datapuwa't 
hindi ako nagkakasala ng lubhang malimit!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba! hindi ninyo nalalaman ang sabi ng kura: nagkakasala ang banal ng makapito sa maghapon? Hala, ibig mo bang dalhin 
ko rito sa iyo ang 'Ankora', ang 'Ramillete' o ang 'Matuwid na landas 
ng 
pagpasa langit'?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi sumagot si Maria Clara.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hala, hindi ka mapapagod,--ang idinugtong 
ng mabait na tia upang aliwin siya; ako na ang babasa ng pagsisiyasat ng 
konsiyensya, at wala kang gagawin kung di mag-alaala ng mga kasalanan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isulat mo sa kanyang huwag na niya akong 
alalahanin!--ang ibinulong ni Maria Clara sa tainga ni Sinang, ng ito'y 
nagpapaalam na sa kanya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano iyon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't nasok ang tia at napilitan si 
Sinang na lumayo, na hindi naunawa ang sinabi sa kanya ng kanyang kaibigan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Inilapit ng mabait na tia ang isang silla 
sa ilaw, naglagay ng salamin sa mata sa dulo ng kanyang ilong, binuksan ang 
maliit na libro at nagsalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pakinggan mong magaling, anak ko; 
pasisimulan ko sa mga utos ng Diyos; dadalangan ko at ng ikaw ay 
makapaggunamgunam; kung sakali't hindi mo nariringig na magaling ay sasabihin 
mo sa akin at ng maulit ko sa iyo; nalalaman mo ng sa ikagagaling mo'y hindi 
ako napapagal kailan man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpasimula ng pagbasa, na ang tinig ay 
walang bagobago at anyong humal, ng mga pagdidilidili ng mga bagay na 
ipinagkakasala. Siya'y tumitigil ng matagal sa wakas ng bawa't pangkat, upang 
mabigyang panahon ang dalaga sa pag-aalaala ng kanyang mga kasalanan at 
pagsisihan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Minamasdan ni Maria Clara ang alang-alang 
na walang tinutukoy. ng matapos na ang unang utos na 'ibigin ang Diyos na lalo 
sa lahat ng bagay', hinihiwatigan siya ni tia Isabel sa ibabaw ng kanyang salamin sa mata, 
at ikinatutuwa niya ang anyong pagka nagdidilidili at nalulungkot. Banal na 
umubo, at pagkatapos ng isang matagal na paghinto'y pinasimulan ang 
pangalawang utos. Bumabasa ng taimtim sa loob ang mabait na matandang babae, 
at ng matapos ang pagbubulaybulay, muling tiningnan ang kanyang pamangkin, na 
untiunting ibinaling ang ulo sa kabilang dako.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bah!--ang sinabi sa sarili ni tia Isabel; 
dito sa 'huwag magpahamak manumpa sa kanyang santong pangala'y' hindi 
nga 
maaaring magkasala ang abang ito! Lumipat tayo sa ikatlo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At ang pangatlong utos ay 
pinagmunglaymunglay at pinagwaring magaling at binasa ang lahat ng bagay na 
pinagkakasalanan ng laban sa kanya. Muli na namang tiningnan niya ang higaan; 
datapuwa't ngayo'y itinaas ng tia ang salamin, kinusot ang mga mata; nakita 
niyang dinala ng kanyang pamankin ang panyo sa mukha at pinahid ang mga luha.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hm!--anya,--ejem! Minsa'y natulog ang kaawaawang ito samantalang nagsesermon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At muling inilagay sa dulo ng kanyang 
ilong ang salamin niya sa mata, saka sinabi sa sarili:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tingnan natin kung hindi siya gumalang sa 
kanyang ama't ina, na gaya ng hindi niya pangingilin sa mga piyesta.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At binasa ang ikapat na utos ng tinig na 
lalong madalang at lalo ng pahumal, sapagkat inaakala niyang sa gayong 
paraa'y lalo na niyang binibigyang kadakilaan ang kanyang gawa, na gaya ng 
kanyang nakitang inaasal ng marami sa mga prayle: hindi nakakapakinig kailan 
man si tia Isabel ng pangangaral ng isang kuakero, sa pagoa't kung 
nagkagayo'y pinapanginig naman sana niya ang kanyang katawan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantala'y makailang dinala ng dalaga 
ang panyo sa kanyang mga mata, at lalo ng napapakingan ang lakas ng kanyang 
paghinga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pagkagalinggaling na kaluluwa!--ang 
iniisip sa sarili ng matandang babae; siya na lubhang masunurin at 
mapagpakumbaba sa lahat! Ako'y nagkasala ng lalong marami kay sa kanya, gayon 
may hindi ako nangyaring-mapaiyak ng totohanan kailan man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At pinasimulan niya ang ikalimang utos, na 
lalong mahahaba ang paghinto at lalong ganap ang pagkahumal ng pananalita, kay 
sa ng una, sakali't maari pa, na sa pagsusumikap niyang mainam sa gayong gawa'y 
hindi niya naringig ang paghagulhol na iniinis ng kanyang pamangkin. Sa isa 
lamang pagtigil na kanyang ginawa, pagkatapos ng mga pagkanilaynilay tungkol 
sa pagpatay sa kapwa tao sa pamamag-itan ng sandata, naringig niya ang mga 
daing ng makasalanan. ng magkagayo'y humigit sa pagka dakila ang tinig, 
pinagpilitan niyang basahin ang nalalabing utos sa anyong nagbabala, at ng 
mapanood niyang patuloy rin ang pag-iyak ng kaniyang pamangkin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tumangis ka, anak, ko, tumangis 
ka!--ang kanyang sinabi, at siya'y lumapit sa higaan:--kung gaano kalaki ang iyong 
pagtangis ay gayon din ang pagkadali ng pagpapatawad sa iyo ng Diyos. Gamitin mo 
ang pighating 'kontricion' sapagkat lalong magaling kay sa 'atricion.' Tumangis 
ka, anak ko, hindi mo nalalaman kung gaano ang aking galak na 
tinatamo sa panonood ko ng iyong pag-iyak! Pagdagukan mo naman ang iyong 
dibdib, huwag mo lamang kalalakasan, sapagkat may sakit ka pa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't sapagkat anaki'y mandin 
nagkakailangan ang pighati ng pag-iisa at ng pagka walang nakamamalay, upang 
lumala, ng makita ni Maria Clarang siya'y nasubukan, untiunting tumigil ng 
pagbubuntong hininga, pinahid ang kanyang mga mata, na walang sinasabing ano 
man at hindi sumasagot sa kanyang tia ng kahi't kataga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ipinagpatuloy nito ang pagbasa, nguni't 
sapagkat huminto ang pagtangis ng sa kanya'y nakikinig, lumipas ang kaalaban 
ng kanyang loob sa kanyang gawa, at ang mga huling utos ng Diyos ay 
nakapag-antok sa kanya at sa kanya'y nakapaghikab, na ano pa't naging malaking kasiraan sa pananalitang pahumal na nakayayamot na sa gayo'y nahihinto.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko mapaniniwalaan kung hindi ko 
makikita!--ang iniisip sa sarili ng matandang babae;--nagkakasalang tulad sa 
isang sundalo ang batang ito laban sa unang limang utos ng Diyos, datapuwa't 
hindi kahi't isang kasalanang magaang man lamang mula sa ikaanim hangang sa 
ikasampu, ano pa't tumbalik sa amin! Kung paano na ang lakad ng daigdig ngayon!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At nagsindi ng isang kandilang malaki sa 
Birhen sa Antipolo at dalawang maliliit na kandila sa Nuestra Se&ntilde;ora del Rosario 
at sa Nuestra Se&ntilde;ora del Pilar, na kanyang inihiwalay roon muna at inilagay sa 
isang sulok ang isang garing na Santo Cristo, upang ipaunawang hindi dahil sa 
kanya kaya isinindi ang mga kandilang iyon. Hindi rin nakabahagi sa gayong 
bagay ang Birhen sa Delarokhe: siya'y isang taga ibang lupaing hindi kilala, at 
hindi pa nakariringig si tia Isabel ng isa man lamang himala na kanyang ginawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi namin nalalaman kung 
ano kaya ang nangyari sa ginawang; konfesion ng gabing iyon; pinagpipitagan 
namin ang mga lihim na iyan. Mahabang totoo ang kumpisal, at nahiwatigan ng 
tiang mula sa malayo'y binabantayan ang pamangkin, na hindi ikinikiling ng kura 
ang kanyang tainga sa mga salita ng may sakit, kung di nakaharap sa mukha ni 
Maria Clara, at tila mandin wari ibig niyang basahin o hulaan sa pagkagagandang 
mga mata ng dalaga ang mga pag-iisip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Lumabas sa silid si Padre Salving 
namumutla't nangingilis ang mga labi. Sino mang makapanood ng kanyang noong 
nagdidilim at pigta ng pawis, mawiwikang siya ang nagkumpisal kay Maria Clara 
at hindi nga narapat magkamit ng kapatawaran.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Jesus, Maria, 
Josef!--ang sinabi ng tia 
na nagkukruz;--sino ang makatatarok sa kalooban ng mga kinabataan ngayon?</font></p>
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