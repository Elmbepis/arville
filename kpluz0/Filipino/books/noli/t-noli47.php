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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XLVII. Ang Dalawang Ginoong Babae</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang isinasabong ni Kapitan 
											Tiago ang kanyang lasak, naglilibot 
											naman sa bayan si Donya Victorina, 
											sa adhikang makita niya kung paano 
											ang kalagayang ginagawa ng mga tamad 
											na 'indio' sa kanikanilang mga bahay 
											at mga tubigan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Inubos niya ang kaya 
											sa pagsusuot ng lalong magaling 
											niyang damit, at kanyang inilagay sa 
											kanyang sutlang 'bata' ang lahat 
											niyang mga kintas at mga bulaklak, 
											upang siya'y kaalang-alanganan ng 
											mga 'provinciano' at maipakilala sa 
											kanila kung gaano kalaki ang 
											kanilang kalayuan sa kanyang mahal 
											na katauhan; kaya't kumapit sa bisig 
											ng kanyang pilay na asawa at 
											nagpakendengkendeng sa mga lansangan 
											ng bayan, sa gitna ng panggigilalas 
											at pagtataka ng mga tagaroon. Natira 
											sa bahay ang pinsang si Linares.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagkapangitpangit ng mga bahay 
											nitong mga 'indio'!--ang ipinasimula 
											ni Donya Victorinang inginingiwi ang 
											bibig;--ayawan ko kung bakit 
											nakatitira sila riyan: 
											kinakailangang maging 'indio'. At 
											anong pagkasamasama ng turo ng 
											kanilang magulang at anong pagka mga 
											palalo! Nasasalubong nila tayo'y 
											hindi sila nangagpupugay! Hanpasin 
											mo sila sa sombrero na gaya ng gawa 
											ng mga kura at ng mga teniente ng 
											mga guwardiya sibil; turuan mo sila ng 
											'urbanidad.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kung ako'y kanilang 
											hampasin?--ang tanong ng doktor De 
											Espada&ntilde;a.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tungkol sa bagay na iya'y ikaw ay 
											lalaki!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngu ... nguni't ako'y pilay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nalalao'y sumasama ang ulo ni Donya 
											Victorina; napupuno ng alabok ang 
											kola ng kanyang bata, dahil&nbsp;sa hindi 
											nalalatagan ng bato ang mga daan. 
											Bukod sa roo'y nakakasalubong ng 
											maraming mga dalaga, na 
											nangagsisitungo pagdaraan sa kanyang 
											tabi, at hindi nila pinagtatakhan, 
											na gaya ng marapat nilang gawin, ang 
											kanyang mahalagang kasuutan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang kutsero ni Sinang, na naghahatid 
											dito at sa kanyang pinsang babae sa 
											isang mainam na karwaheng 
											'tres-por-kiento'y' nagkaroon ng 
											kawalang galangang sigawan siya ng 
											'tabi!' na taglay ang tinig na 
											nakagugulat, na anopa't napilitin 
											siyang sumaisang tabi at walang 
											magawa kung di tumutol ng:--Tingnan 
											mo na nga lamang ang hayop na 
											kutsero! Sasabihin ko sa kanyang 
											panginoong turuan niyang magaling 
											ang kanyang mga alila!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magbalik na tayo sa bahay!--ang 
											ipinag-utos sa asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ito, na talagang nanganganib na 
											marahil ay may mangyaring ligalig sa 
											kanilang dalawa, ibinalik ang 
											kanyang 'muleta' (ang salalak na 
											tungkod sa kili-kili) at sumunod sa 
											utos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nasalubong nila ang alperes, 
											nangagbatian at ito'y nakaragdag ng 
											sama ng loob ni Donya Victorina: 
											hindi lamang hindi siya pinuri dahil 
											sa kanyang pananamit, kung di halos 
											siniyasat pa ng palibak ang suot 
											niyang iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mo dapat pakikamayan ang 
											isang abang alperes lamang,--ang 
											sinabi sa kanyang asawa ng malayo na 
											ang alperes;--bahagya na niya hinipo 
											ang kanyang kapakete at ikaw ay 
											nagpugay ng sombrero; hindi ka 
											marunong magbigay kamahalan sa iyong 
											kataasan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya ang puno ri....rito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano ang kabuluhan sa atin ng 
											bagay na iyan. Tayo baga'y mga 
											indio?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasakatuiran ka nga!--ang kanyang 
											isinagot, sapagkat aayaw siyang 
											makipagkagalit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdaan sila sa tapat ng bahay ng 
											militar. Namimintana si Do&ntilde;a 
											Consolacion, na gaya ng kanyang 
											naging kaugalian, nakadamit franela 
											at humihithit ng isang tabako. 
											Sapagkat mababa ang bahay, sila'y 
											nagtinginan, at nakitang magaling ni 
											Donya Victorina ang babaeng iyon; 
											payapang pinagmamasdan siya buhat sa 
											paa hanggang sa ulo ng Musa ng 
											guwardiya sibil, pagkatapos ay siya'y 
											nilabian, lumura at saka tumalikod. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ito ang nakaubos sa pagtitiis ni 
											Donya Victorina, kaya't iniwan ang 
											kanyang asawang walang kaalakbay, at 
											hinarap ang alperesang nangangatal 
											sa galit at hindi makapangusap. 
											Marahang lumingon si Do&ntilde;a 
											Consolacion, muli na namang 
											pinagmasdan siya ng&nbsp; buong , 
											katiwasayan at nanglura uli, nguni't 
											nagpakita siya ng lalong malaking 
											pagpapawalang halaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa inyo, Do&ntilde;a?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Matatawag ninyo akong 'Se&ntilde;ora'! 
											bakit ganyan na ang pagtitig ninyo 
											sa akin? Naiingit ba kayo?--ang sa 
											kawakasa'y nasalita ni Donya 
											Victorina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako? naiingit ako? at sa inyo?--ang 
											sabing patuya ng Medusa--siya nga! 
											naiingit ako sa inyong kulot!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Halika na, babae!--anang 
											Doktor;--hu ... hu ... huwag mo 
											siyang pa ... pansinin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pabayaan mong turaan ko itong 
											bastos na itong walang hiya!--ang 
											sagot ng babae, at saka biglang 
											itinulak ang kanyang asawa, na 
											kaunti ng napasungaba, at hinarap si 
											Do&ntilde;a Consolacion.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan sana ninyo kung sino ang 
											kausap!--anya--huwag ninyong akalaing 
											ako'y isang provinkiana o isang 
											kalunya ng mga sundalo! Hindi 
											nakapapasok sa aking bahay, sa 
											Maynila, ang mga alperes; ang mga 
											ganito'y naghihintay sa pintuan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! Exkelentisima Se&ntilde;ora Puput! 
											(karilagdilagang ginoong Puput) 
											hindi nga pumapasok ang mga alperes 
											kung di lamang ang mga salantang 
											gaya niyan, ja! ja! ja!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kung hindi sa nakakulapol na mga 
											kolorete, namasdan sana ang pamumula 
											ng mukha ni Donya Victorina; binanta 
											niyang lusubin ang kanyang kaaway na 
											babae, nguni't pinigil siya ng 
											kentinela. Samantala'y napupuno ang 
											daan ng nanonood na mga tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pakinggan ninyo, naiimbi ako sa 
											pakikipagsalitaan sa inyo; mga taong 
											matataas ... Ibig po ba ninyong 
											labhan ang aking damit? Babayarin ko 
											kayo ng mahal! Ang akala yata 
											ninyo'y hindi ko nalalamang kayo'y 
											dating labandera!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumindig si Do&ntilde;a Consolaciong malaki 
											ang galit: nakasugat sa kanya ang 
											sinabing tungkol sa paglalaba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Akala yata ninyo'y hindi nalalaman 
											kung sino kayo at kung sino ang 
											taong inyong daladala? 
											Kinakailangang namamatay ng gutom 
											upang pasanin ang tiratirahan, ang 
											basahan ng lahat ng tao!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang pukol na salitaay tumama sa ulo 
											ni Donya Victorina; naglilis ito ng 
											manggas, itinikom ang mga daliri, 
											piniing ang mga ngipin at 
											nagpasimula ng pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Manaog kayo, matandang salaula, at 
											dudurugin ko ang maruming bibig na 
											iyan! Calunya ng isang batallon, 
											talagang patutot buhat pa ng 
											ipanganak!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dalidaling nawala sa bintana ang 
											Medusa, agad nakitang nananaog ng 
											patakbo, na iniwawasiwas ang latigo 
											ng kanyang asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namag-itan at sumamo si Don 
											Tiburcio, nguni't nagkasaklutan din 
											kung hindi dumating ang alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't mga ginoong babae!... 
											Don Tiburcio!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Turuan ninyong magaling ang inyong 
											asawa, ibili ninyo siya ng lalong 
											magagaling na mga damit, at kung 
											sakali't wala kayong salapi, 
											magnakaw kayo sa mga taong bayan, 
											yamang sa bagay na ito'y kayo'y may 
											mga sundalo!--ang sigaw ni Donya 
											Victorina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Narito po ako ginoong babae! bakit 
											hindi durugin ng kamahalan po ninyo 
											ang aking bibig? Wala po kayo kung 
											di dila at laway, Do&ntilde;a Exelencia!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong babae!--anang alperes na 
											nagniningas ng galit;--magpasalamat 
											kayo at nadidilidili kong kayo'y 
											babae, sapagkat kung hindi lulusayin 
											ko kayo sa kasisikad, pati ng inyong 
											mga kinukulot na buhok at ng inyong 
											mga walang kapakanang mga kintas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gi ... ginoong alperes!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lumakad kayo, mamamatay ng taong 
											walang sakit! Kayo'y walang suot na 
											salawal, Juan Lanas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umugong doon ang mga takapan, 
											waswasan ng kamay, girian, sigawan, 
											laitan at murahan: kanilang 
											iniwatawat ang lahat ng mga 
											karumihang kanilang iniingatan sa 
											kanikanilang kaban, at sapagkat 
											sabay sabay na nagsasalita ang apat 
											at maraming lubha ang kanilang 
											sinasabing nakasisirang puri sa mga 
											tanging pulutong ng mga tao, na 
											kanilang isinisiwalat ang maraming 
											katotohanan, kusang tinatanggihan 
											namin ang pagsasalaysay rito ng 
											laha't ng kanilang doo'y mga sinabi 
											sa isa't isa. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Bagaman hindi nauunawa 
											ng mga nagsisipanood ang lahat ng 
											kanilang takapan, hindi nga kakaunti 
											ang katuwaang kanilang tinatamo at 
											kanilang hinihintay na dumating 
											hanggang sa pag-aaway ng kamay. Sa 
											kawalang kapalaran ay dumating ang 
											kura na siyang pumayapa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--mga ginoong lalaki, mga ginoong 
											babae! Laking kahihiyan! Ginoong 
											Alferez!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang inyong ipinakikialam dito, 
											mapagbanalbanalan, makakarlista?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Don Tiburcio, dalhin po ninyo ang 
											inyong asawa! Ginoong babae, 
											pagpigilan po ninyo ang inyong dila!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iya'y sabihin po ninyo diyan sa 
											mga magnanakaw sa mga taong 
											mahihirap!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Untiunting naubos ang mga kilalang 
											lait at tungayaw, nasabi na ang 
											lahat ng mga kahiyahiyang kagagawan 
											ng mag-a-mag-asawa, at samantalang 
											nangagbabalaan at nangagmumurahan ay 
											untiunti silang nangaghiwalay. Si 
											Padre Salvi ay nagpapakabikabila at 
											nagbibigay kasayahan sa panooring 
											iyon, kung daroon sana ang ating 
											kaibigang korresponsal!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayon di'y pasa Maynila tayo't 
											tayo'y humarap sa Kapitan 
											Heneral!--ang sinasabing malaki ang 
											galit ni Donya Victorina sa kanyang 
											asawa,--Ikaw ay hindi lalaki! sayang 
											na sayang ng salawal na suot mo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngu ... nguni't ... babae, at ang 
											mga guwardiya? ako'y pila'y!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dapat mong hamunin siya ng away sa 
											pamamag-itan ng pistola o ng sable, 
											o kung hindi ... kung hindi....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At tiningnan siya ni Donya Victorina 
											sa mga ngipin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Neneng, kailan may hindi ako 
											humawak ng....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi ipinaubaya ni Donya 
											Victorinang matapos ang kanyang 
											sinasabi: sa isang dakilang galaw ay 
											hinalbot sa gitna ng daan, ang 
											kanyang mga ngiping tagpi lamang at 
											saka giniik. Dumating sila sa bahay, 
											na halos umiiyak ang lalaki at ang 
											babae nama'y nag-aalab sa galit. 
											Nakikipag-usap ng sandaling iyon si 
											Linares kay Maria Clara, kay Sinang 
											at kay Viktoria, at sapagkat hindi 
											niya nalalaman ang pagtatalong iyon, 
											hindi kakaunti ang kanyang dinamdam 
											naligalig ng loob ng kanyang makita 
											ang kanyang mga pinsan. Si Maria 
											Clarang nakahilig sa isang sillon sa 
											gitna ng mga unan at mga kumot na 
											lana ay malaki ang ipinagtaka ng 
											kanyang makita ang bagong pagmumukha 
											ng kanyang doktor.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinsan, ani Donya 
											Victorina,--hahamunin mo ng away 
											ngayon din ang Alferez o kung 
											hindi....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At bakit?--ang tanong ni Linares na 
											nagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya'y hahamunin mo ngayon din ng 
											away o kung hindi sasabihin ko sa 
											kanilang lahat dito kung sino ikaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't Donya Victorina!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtinginan ang tatlong 
											magkakaibigang babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ba sa akala mo? Cami'y linait 
											ng alperes at kanyang sinabi na ikaw 
											raw ay ikaw! Nanaog ang matandang 
											babaeng aswang na may dalang latigo, 
											at ito, ito'y nagpabayang siya'y 
											muramurahin ... isang lalaki!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba!--ani Sinang,--sila'y 
											nangag-away ay hindi natin napanood!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Linugas ng alperes ang mga ngipin 
											ng doktor!--ang idinagdag ni 
											Viktoria.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayon di'y pasasa Maynila kami; 
											ikaw, ikaw ay matitira rito upang 
											siya'y hamunin mo ng away, at kung 
											hindi'y sasabihin ko kay Don 
											Santiago na pawang kasinungalingan 
											ang lahat mong sinabi sa kanya, 
											sasabihin kong....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't Donya Victorina, Donya 
											Victorina!--ang isinalabat ng 
											namumutlang si Linares, at lumapit 
											kay Donya Victorina;--huwag po 
											ninyong ipaalaala sa aking....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang nangyayari ito'y siya 
											namang pagdating ni Kapitan Tiago na 
											galing sa sabungan, mapanglaw at 
											nagbubuntong hininga: ang lasak ay 
											natalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi binigyan ng panahon ni Donya 
											Victorinang makapagbuntong hininga; 
											sa maikling salita'y sinabi niya ang 
											lahat ng nangyari, sa makatuwid 
											baga'y pinagsikapan niyang sabihing 
											siya ang sumasakatuwiran.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hahamunin siya ng away ni Linares 
											nariringig po ba ninyo? Sakali't 
											hindi, huwag po ninyong bayaang 
											pakasal sa inyong anak, huwag po 
											ninyong ipahintulot! Kung wala 
											siyang tapang ay hindi karapatdapat 
											kay Clarita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ikaw pala'y pakakasal sa ginoong 
											ito?--ang tanong ni Sinang, at napuno 
											ng luha ang kanyang masayang mga 
											mata;--nalalaman kong ikaw ay 
											malihim, nguni't hindi salawahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Maria Clara, na maputlang parang 
											pagkit, bumangon ng kaunti sa pagka 
											sandig, at tinitigan ng gulat na mga 
											mata ang kanyang ama, si Donya 
											Victorina at si Linares. Ito'y 
											nagdalang hiya, itinungo ni Kapitan 
											Tiago ang kanyang mga mata, at 
											idinugtong pa ng ginoong babae:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tandaan mo Clarita; huwag kang 
											mag-aasawa kailan man sa lalaking 
											hindi tunay ang pagkalalaki; 
											nanganganib kang ikaw ay alimurahin 
											pati ng mga aso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't hindi sumagot ang dalaga, 
											at nagsabi sa kanyang mga kaibigang 
											babae:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ihatid ninyo ako sa aking silid; 
											hindi ako makalakad na mag-isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinulungan nila siyang tumindig, at 
											naliligid ang kanyang bayawang ng 
											mga mabibilog na mga bisig ng 
											kanyang mga kaibigang babae, 
											nakahilig ang kanyang ulong kawangis 
											ng marmol sa balikat ng magandang si 
											Viktoria, nasok ang dalaga sa silid 
											na kanyang tulugan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iniligpit ng mag-asawa ng gabi ring 
											iyon ang kanilang mga kasangkapan, 
											siningil si Kapitan Tiago, na may 
											ilang libo rin piso ang inabot, sa 
											pagkagamot kay Maria Clara, at 
											napatungo sila sa Maynila, pagka 
											umagang umaga ng kinabukasan, na ang 
											sinasakya'y ang karwahe ni Kapitan 
											Tiago. Iniatang sa mahinhiing si 
											Linares ang katungkulang 
											tagapanghiganti.</font></p>
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