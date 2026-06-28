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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">L. Ang mga Anak ni Elias</font></b></p>
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
											May anim na pung taon na ngayong 
											nananahan ang aking nunong lalaki sa 
											Maynila, at naglilingkod na 'tenedor 
											de libros' sa bahay ng isang 
											mangangalakal na kastila. 
											Batang-bata ng panahong iyon ang 
											aking nunong lalaki may asawa at may 
											isang anak na lalaki. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang gabi, 
											hindi maalaman kung ano ang dahil, 
											nag-alab at lumaki ang 
											apoy sa&nbsp; buong&nbsp; bahay at sa ibang 
											maraming mga kalapit. Hindi mabilang 
											ang halaga ng mga natupok at nawala, 
											hinanap ang may sala, at isinumbong 
											ng mangangalakal ang aking nuno. 
											Nawalang kabuluhan ang kanyang 
											pagtutol, at palibhasa'y dukha at 
											hindi makapagbayad sa mga balitang 
											abogado, siya'y hinatulang paluin sa 
											hayag at ilibot sa mga daan sa 
											Maynila. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi pa nalalaong ginagawa 
											pa ang parusang itong pang-imbi, na 
											tinatawag ng bayang&nbsp;<i>kabayo y vaka</i>, 
											na makalilibong higit sa kamatayan 
											ang kasamaan. Ang aking nuno, na 
											tinalikdan ng lahat, liban na lamang 
											sa kanyang bata pang asawa, ay 
											iginapos sa likod ng isang kabayo, 
											na sinusundan ng karamihang 
											malulupit at pinalo sa bawa't 
											pinagkakakurusan ng dalawang daan, 
											sa harap ng mga taong kanyang mga 
											kapatid, at sa malapit sa maraming 
											sambahan sa isang Diyos ng 
											kapayapaan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang mabusog na ng kulang palad, na 
											magpakailan ma'y imbi na't walang 
											kapurihan, ang panghihiganti ng mga 
											tao, sa pamamag-itan ng kanyang 
											dugo, ng mga pahirap na ginawa sa 
											kanya at ng kanyang mga pagsigaw, 
											kinailangang kunin siya sa ibabaw ng 
											kabayo, sapagkat hinimatay, at maano 
											na sanang namatay na nga ng 
											patuluyan! 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa isa riyan sa mga pinakahayop na 
											kalupitan, siya'y pinawalan; 
											nawalang kabuluhang mamanhik sa 
											bahay-bahay, bigyan ng gawain o ng 
											limos ang asawa niyang ng panahong 
											iyo'y buntis, at ng kanyang 
											maalagaan ang asawang may sakit at 
											ang kahabaghabag na anak. Sino ang 
											magkakatiwala sa asawa ng isang 
											lalaking manununog at inimbi. 
											Napilitan nga ang babaing kalakalin 
											ang kanyang katawan!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtindig si Ibarra sa pagkaupo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Oh, huwag kayong mabahala! ang 
											pangangalakal sa katawan niya'y 
											hindi na kasiraang puri sa kanya at 
											hindi na rin kasiraang puri sa 
											kanyang asawa; napugnaw ng lahat ang 
											kapuriha't ang kahihiyan. Gumaling 
											ang lalaki sa kanyang mga sugat at 
											naparito at nagtagong kasama ang 
											kanyang asawa't anak na lalaki sa 
											mga kabundukan ng lalawigang ito. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nanganak dito ang babae ng isang 
											latanglatang sanggol at puspos ng 
											mga sakit, na nagkapalad na mamatay. 
											Nanahan pa sila ritong may ilang 
											buwan, sakdal ng karukhaan, hiwalay 
											sa lahat ng tao, kinapopootan at 
											pinangingilagan ng lahat. Nang hindi 
											na matiis ng aking nuno ang gayong 
											lubhang karukhaan, at palibhasa'y 
											hindi niya taglay ang katapangan ng 
											loob ng kanyang asawa, siya'y 
											nagpakamatay, sa walang kasing 
											laking sama ng kanyang loob ng 
											makita niyang may sakit at walang 
											sumaklolo't mag-alaga. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nabulok ang 
											bangkay sa mata ng anak na lalaking 
											bahagya na lamang makapagalaga sa 
											may sakit na ina, at ang kasamaan ng 
											amoy ang siyang nagkanulo sa 
											hustisya. Sinisi ang aking nunong; 
											babae't hinatulang magdusa, dahil sa 
											kanyang hindi pagbibigay alam; 
											pinaghinalaa't pinaniwalaang siya 
											ang pumatay sa kanyang asawa, 
											sapagkat ano ang hindi gagawin ng 
											asawa ng isang imbi, na pagkatapos 
											ay nagbili ng kanyang katawan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kung manumpa'y kanilang sinasabing 
											nanunumpa ng hindi katotohanan, kung 
											tumangis ay sinasabing siya'y 
											nagsisinungaling, sinasabing 
											nagwawalang galang kung tumatawag sa 
											Diyos. Gayon ma'y liningap din siya, 
											hinintay munang siya'y makapanganak 
											bago paluin: talos po ninyong 
											inilalaganap ng mga prayle ang 
											kapaniwalaang sa pamamag-itan ng 
											palo lamang mangyayaring makipanayam 
											sa mga 'indio'; basahin ninyo ang 
											sabi ni padre Gaspar San Agustin.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa ganitong kahatulan sa isang babae, 
											kanyang susumpain ang araw ng 
											pagsilang sa maliwanag ng kanyang 
											anak, bagay na bukod sa pagpapahaba 
											ng pagpapahirap ay pagsira sa mga 
											damdamin ng isang ina. Sa kasamaang 
											palad maluwalhating nanganak ang 
											babae, at sa kasamaan ding palad ang 
											sanggol na lalaki ay ipinanganak na 
											mataba. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang makaraan ang dalawang 
											buwa'y ginanap ang parusang hatol ng&nbsp; 
											buong&nbsp; katuwaan ng loob ng mga tao, 
											na sa ganitong paraa'y inaakala 
											nilang gumaganap ng kanilang 
											katungkulan. Sapagkat wala na 
											siyang katiwasayan sa mga gubat na 
											ito'y tumakas siya't tinungo na 
											kanyang dala ang kanyang dalawang 
											anak na lalaki, ang karatig na 
											lalawigan, at diya'y nabuhay silang 
											tulad sa mga halimaw: nangapopoot at 
											kinapopootan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang panganay sa 
											dalawang magkapatid, na nakatatanda 
											ng maligayang kamusmusan niya, sa 
											gitna ng gayong pagkalakilaking 
											karukhaan, pagdaka'y nagtulisan, 
											pagkakaroon ng lakas. Hindi nalao't 
											ang pangalang mabangis ni&nbsp;<i>Balat</i>&nbsp;ay 
											kumalat sa magkabikabilang lalawigan, 
											naging lagim ng mga bayan, sapagkat sa kanyang panghihiganti'y 
											nagsasabog ng dugo't tinutupok ang 
											bawa't maraanan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang pinakabata na 
											may katutubong magaling na puso'y 
											sumangayon sa kanyang kapalaran at 
											kaimbihan sa tabi ng kanyang ina; 
											nangabubuhay sila sa inihahandog ng 
											kagubatan, nangagdadamit sila ng mga 
											basahang sa kanila'y inihahagis ng 
											mga nangaglalakad; nawala na sa 
											babaeng iyon ang kanyang sariling 
											pangalan at siya'y nakikilala lamang 
											sa mga pamagat na&nbsp;<i>delingkente</i>&nbsp;(delinkuente, 
											nagkasala),&nbsp;<i>patutot</i>&nbsp;at&nbsp;<i>binugbog</i>. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang lalaking iyo'y nakikilala lamang 
											sa tawag na&nbsp;<i>anak ng kanyang ina</i>, 
											sapagkat sa katamisan ng kanyang 
											asal ay hindi pinaniniwalaang siya'y 
											anak ng manununog at sapagkat ang 
											sino ma'y dapat mag-alinlangan sa 
											kabutihan ng ugali ng mga&nbsp;<i>indio</i>. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa kawakasa'y nahulog ang bantog na 
											si Balat sa kapangyarihan ng 
											hustisya, na siyang sa kanya'y 
											humingi ng mahigpit na pagbibigay 
											sulit ng kanyang mga ginawang 
											kasalanan, bagaman hindi nabalino 
											ang Hustisyang iyang magturo kay 
											Balat ng kagalingan ng isang umagang 
											hanapin ng batang kapatid ang 
											kanyang ina, na napasagubat upang 
											manguha ng kabuti at hindi pa umuuwi, 
											kanyang nakitang nakatimbuwang sa 
											lupa, sa tabi ng daan, sa lilim ng 
											isang puno ng buboy, nakatihaya, 
											tirik ang mga mata, nakatitig, 
											naninigas ang mga daliring nakabaon 
											sa lupa, at sa ibabaw nito'y may 
											nakikitang mga bahid ng dugo. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Naisipan ng binatang tumingala at 
											sundan ng mata ang tinititigan ng 
											bangkay, at nakita niyang sa isang 
											sanga'y nakasabit ang isang buslo at 
											sa loob ng buslo'y ang marugong ulo 
											ng kanyang kapatid!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diyos ko!--ang biglang sinabi ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ganyan din marahil ang biglang 
											sinabi ng aking ama,--ang 
											ipinagpatuloy ni Elias ng&nbsp; 
											buong&nbsp; kalamigan ng 
											loob.--Pinagputolputol ng mga tao ang 
											manghaharang at inilibing ang 
											katawan, nguni't ang mga sangkap ng 
											katawa'y kanilang isinabog at 
											ibinitin sa iba't ibang mga bayan. 
											Sakali't kayo po'y makapaglakbay 
											isang araw mula sa Kalamba hanggang 
											sa Santo Tomas, masusumpungan pa po 
											ninyo ang kahoy ng duhat na 
											pinagbitinan at kinabulukan ng isang 
											hita ng aking amain. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sinumpa ang 
											kahoy na iyan ng Naturaleza, kaya't 
											hindi lumalaki at hindi namumunga. 
											Gayon din ang kanilang ginawa sa mga 
											ibang sangkap ng katawan, nguni't 
											ang ulo, ang ulo na siyang 
											pinakamabuting sangkap ng tao, na 
											siyang lalong madaling kilalanin 
											kung kangino, ang ulong iya'y 
											isinabit sa harapan ng dampa ng 
											ina!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumungo si Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naglagalag 
											ang binatang tulad sa isang sinumpa',--ang 
											ipinagpatuloy ni Elias,--naglagalag 
											sa bayan-bayan, sa mga bundok at mga 
											kaparangan, at ng inaakala na niyang 
											sa kanya'y wala nang makakakilala, 
											ay pumasok siyang manggagawa sa 
											isang mayamang taga Tayabas. Ang 
											kanyang kasipagan, ang katamisan ng 
											kanyang asal ang nakahikayat na 
											siya'y kagiliwan ng lahat ng hindi 
											nakatatalos ng unang pamumuhay niya. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Sa katiyagaan niya sa paggawa at sa 
											pagtitipid, nakatipon siya ng 
											kaunting puhunan, at sapagkat 
											napagdaanan na niya ang malaking 
											karukhaan at siya'y bata, nag-akalang 
											magkamit naman ng ligaya. Ang 
											kanyang kagandahang lalaki, ang 
											kanyang kabataan at ang kanyang 
											pagka may kaunting kaya ang siyang 
											nangakaakit na siya'y ibigin ng 
											isang dalaga sa bayan, nguni't hindi 
											siya makapangahas na ipakiusap sa 
											mga magulang nito na sa kanya'y 
											ipakasal, sa kanyang panganganib na 
											baka mapagtunton ang buhay niya ng 
											una. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Datapuwa't naraig sila ng 
											kapangyarihan ng sinta, kaya't kapwa 
											sila nagkulang sa kanikanilang 
											katungkulan. Upang mailigtas ng 
											lalaki ang kapurihan ng babae, 
											pinangahasan ang lahat, namanhik 
											siya sa mga magulang upang sa 
											kanya'y ipakasal ang kanyang kaisang 
											dibdib, dahil dito'y hinanap ang mga 
											kasulatan ng kanyang pagkatao, at ng 
											magkagayo'y napagsiyasat na lahat; 
											palibhasa'y mayaman ang ama ng 
											dalaga, nasunduang pag-usigin ng mga 
											hukom ang lalaki, na hindi nag-akala 
											man lamang na magsanggalang, inamin 
											ang lahat ng sumbong na laban sa 
											kanya, at siya'y nagdusa sa 
											bilangguan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Nanganak ang babae ng 
											isang sanggol na lalaki at isang 
											sanggol na babae, na kapwa inalagaan 
											ng lihim, saka pinapaniwala ang mga 
											batang itong namatay na ang kanilang 
											ama, bagay na hindi mahirap gawin, 
											sapagkat kanilang nakita ang 
											pagkamatay ng kanilang ina, ng 
											panahong sila'y musmos pa, bukod sa 
											hindi nila naiisip ang pag-uusisa ng 
											kanilang pinanggalingan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Palibhasa'y 
											mayaman ang aming nunong lalaki, 
											totoong maligaya ang aming 
											kamusmusan; ang kapatid kong babae't 
											ako'y magkasama kaming nag-aral, 
											nag-iibigan kami niyang pag-iibigang 
											mangyayari lamang sa magkapatid na 
											kambal na walang ibang nakikilalang 
											ibang bagay na pag-ibig. Batang bata 
											pa ako'y nag-aral na sa kolegio ng 
											mga jesuita, at nag-aral naman sa 
											Concordia at doon itinira ang aking 
											kapatid na babae, sa hangad na huwag 
											kaming lubhang magkahiwalay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Nang matapos ang aming kaunting pag-aaral, 
											sapagkat wala kaming hinahangad 
											kung di magpasaka ng lupa, umuwi 
											kami sa aming bayan upang aming 
											tanggapin ang aming mana sa aming 
											nunong lalaki. Malaonlaon ding 
											nanatili kami sa pamumuhay sa 
											kaligayahan, ngumingiti sa amin ang 
											panahong hinaharap, marami kaming 
											mga alila, nag-aaning magaling ang 
											aming mga halamanan at hindi na 
											malalao't mag-aasawa ang aking 
											kapatid na babae sa isang binatang 
											kanyang pinakasisinta at siya'y 
											tinutumbasan ng gayon ding pag-ibig. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Dahil sa pagkakaalit bagay sa salapi, 
											at dahil naman sa ugali ko ng mga 
											panahong iyong may pagkamapagmataas, 
											kinasusuklaman ako ng isa kong 
											kamag-anak na malayo, isinurot sa 
											aking isang araw ang totoong malabo 
											kong pagsilang sa maliwanag, ang 
											imbi kong pinanggalingang mga 
											magulang. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Akala ko'y yao'y pawang 
											paratang lamang, kaya't hiningi kong 
											bigyang liwanag ang gayong paglait; 
											muling nabuksan ang libingang 
											kinahihimlayan ng gayong karaming 
											mga kabulukan, at lumabas ang 
											katotohanan upang ako'y bigyang 
											kahihiyan. Nang lalong malubos ang 
											kasaliwaang palad, malaon ng 
											panahong kami'y may alilang isang 
											matandang lalaki, na pinagtitiisan 
											ang lahat kong mga kahalingang pita 
											at ayaw kaming iwan kailan man, at 
											nagkakasiya na lamang tumangis at 
											humibik sa gitna ng mga paglibak ng 
											ibang mga lingkod namin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Hindi ko 
											maalaman kung bakit napagsiyasat ng 
											aking kamag-anak; datapuwa't ang 
											nangyari'y tinawag ng hustisya ang 
											matandang ito, at pinag-utusang 
											sabihin ang katotohanan; ang 
											matandang lalaki palang aming 
											alila'y siyang aming ama, na aayaw 
											humiwalay sa kanyang sintang mga 
											anak, at ang matandang iyo'y hindi 
											mamakailang aking pinahirapan. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Napugnaw ang aming ligaya, 
											tinalikdan ko ang aming kayamanan, 
											nawalan ng pakakasalang kasintahan 
											ang kapatid kong babae, kaming 
											magkapatid at ang aking ama'y iniwan 
											namin ang bayan, upang pumaroon sa 
											alin mang lupain. Ang pagkaalam na 
											siya'y nakatulong sa aming 
											kasaliwaang palad ang nakapagpaikli 
											ng buhay ng matandang lalaki, na 
											siyang sa aki'y nagpaunawa ng lahat 
											ng kasakitsakit na mga nangyari ng 
											mga panahong nagdaan. Nangulila 
											kaming magkapatid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumangis ng di sapala ang kapatid ko, 
											nguni't sa gitna ng gayong karaming 
											mga kasaliwaang palad na bumugso sa 
											ibabaw namin, hindi niya nalimutan 
											ang kanyang sinta. Hindi dumaing at 
											hindi umimik ng kanyang nakita ang 
											pagaasawa sa ibang babae ng kanyang 
											dating katipanan, at aking nakitang 
											untiunting nagkasakit ang aking 
											kapatid, na hindi ko mangyaring 
											mabigyang aliw. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nawala siya isang 
											araw; nawalang kabuluhan ang sa 
											kanya'y aking paghanap sa lahat ng 
											panig, nawalang kabuluhan ang aking 
											pagtatanong tungkol sa kanya, 
											hanggang sa ng makaraan ang anim na 
											buwa'y aking nabalitaang ng mga araw 
											na iyon, ng humupa ang paglaki ng 
											dagatan, ay nasumpungan sa pasigan 
											ng Calamba sa gitna ng isang palayan, 
											ang bangkay ng isang dalaga, na 
											nalunod o pinatay na kusa; ayon sa 
											sabiha'y may isang sundang na 
											nakatarak sa kanyang dibdib. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ipinalathala sa mga kalapit bayan ng 
											mga puno sa bayang iyon, ang gayong 
											nangyari; sino ma'y walang humarap 
											upang hingin ang bangkay, at wala 
											namang nawawalang sino mang dalaga. 
											Ayon sa mga tandang sinabi sa akin, 
											pagkatapos, sa pananamit, sa mga 
											hiyas, sa kagandahan ng kanyang 
											mukha at sa lubhang kasaganaan ng 
											kanyang buhok, aking napagkilalang 
											iyon ang aking kahabaghabag na 
											kapatid na babae. Mula niyo'y 
											naglalagalag ako sa mga iba't ibang 
											lalawigan, manakanaka akong 
											pinararatangan, nguni't hindi ko 
											pinapansin ang mga tao at 
											ipinagpapatuloy ko ang aking 
											paglakad. Ito ang makling kasaysayan 
											ng mga nangyari sa akin, at ang 
											kasaysayan ng mga paghatol ng mga 
											tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumigil ng pananalita si Elias, at 
											ipinatuloy ang pagsagwan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naniniwaniwala 
											akong hindi po kayo nalilihis sa 
											katuwiran--ang ibinulong ni 
											Crisostomo, sa inyong pananalitang 
											dapat pagsikapan ng hustisya ang 
											paggawa ng magaling sa pagtumbas sa 
											magagandang gawa, at gayon din ang 
											pagtuturo sa mga nagkakasalang tao 
											sa paggawa ng masama. Ang 
											nakahahadlang lamang ... ay ito'y 
											hindi mangyayari, isang hangad na 
											hindi mangyayaring masunduan; 
											sapagkat saang kukuha ng lubhang 
											maraming salapi, ng lubhang maraming 
											mga bagong kawani?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano ang kapapakanan ng mga 
											sacerdote, na ipinagtatalakan ang 
											kanilang tungkuling maglaganap ng 
											kapayapaan at pag-ibig sa kapwa tao? 
											Diyata't lalong ikinararapat ang 
											basain ng tubig ang ulo ng isang 
											sanggol, pakanin ito ng asin, kay sa 
											pukawin sa marilim na budhi ng isang 
											masamang tao iyang maningning na 
											ilaw na bigay ng Diyos sa bawa't tao 
											upang hanapin ang kanyang kagalingan? 
											Diyata't lalong pag-ibig sa kapwa 
											tao ang alakbayan ang isang may 
											salang bibitayin, kay sa siya'y 
											alalayan sa paglakad sa matarik na 
											landas na pagtalikod sa mga pangit 
											na kaugalian at pagtungo sa 
											magagandang kaasalan? Hindi po ba 
											nagkakagugugol sa pagbabayad sa mga 
											tiktik, sa mga verdugo at sa mga 
											guwardiya sibil? Ito po, bukod sa 
											kahalayhalay, pinagkakagugulan din 
											ng salapi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kaibigan 
											ko, kayo o ako man, kahi't ibigin 
											nati'y hindi natin masusunduan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay 
											nga, sakali't tayo'y nag-iisa, wala 
											tayong magagawa; nguni't inyong 
											ariing sariling inyo ang katuwiran 
											ng bayan, makipanig po kayo sa bayan, 
											pakinggan ninyo ang kanyang 
											kahingian, magbigay uliran kayo sa 
											mga iba, ipakilala ninyo kung ano 
											ang tinatawag na bayang kinagisnan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mangyayari ang kahingian ng 
											bayan; kinakailangang maghintay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Maghintay! maghirap ang kahulugan ng maghintay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagtatawanan 
											ako kung aking hingin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kung kayo'y alakbayan ng bayan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mangyayari! hindi ko magagawa 
											kailan man ang patnugutan ang 
											karamihang tao upang kamtan sa 
											sapilitan ang bagay na hindi 
											inaakala ng pamahalaang kapanahunan 
											ng ibigay, hindi! At kung sa alin 
											mang araw ay makita kong may sandata 
											ang karamihing iyan, aanib ako sa 
											pamahalaan at ng sila'y aking 
											bakahin, sapagkat hindi ko 
											ipalalagay na aking bayan ang mga 
											manggugulo. Hinahangad ko ang 
											kanyang kagalingan, kaya nagtayo ako 
											ng isang bahay-paaralan; hinahanap 
											ko ang kanyang kagalingan sa 
											pamamag-itan ng pagpapaaral, sa 
											mahinahong untiunting pagsulong ng 
											dunong, walang daan kung walang 
											liwanag.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't walang kalayaan naman kung 
											walang pakikihamok!--ang sagot ni 
											Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't aayaw ako ng kalayaang 
											iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayo't 
											kung walang kalayaa'y walang liwanag,--ang 
											muling itinutol ng piloto ng maalab 
											na pananalita;--sinabi po ninyong 
											hindi malaki ang pagkakilala ninyo 
											sa inyong mga kababayan; naniniwala 
											ako. Hindi po ninyo nakikita ang 
											paghahanda sa pagbabaka, hindi ninyo 
											nakikita ang dilim sa dakong paligid; 
											nagpasimula ang paghahamok sa 
											pagmamatuwiran upang magkaroon ng 
											wakas sa paglalabanan sa lupa na 
											maliligo ng dugo; nariringig ko ang 
											tinig ng Diyos, sa aba ng 
											mag-akalang lumaban sa kanya! hindi 
											iniukol sa kanila ang pagsulat ng 
											Historia!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nag-ibang anyo si Elias; nakatindig, 
											nakapugay, may anyong hindi 
											karaniwan ang mukha niyang 
											mabayaning liniliwanagan ng buwan. 
											Ipinagpag ang kanyang malagong 
											buhok, at nagpatuloy ng pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po ba ninyo nakikita't 
											gumigising na ang lahat? Tumagal ng 
											ilang daang taon ang pagkakatulog, 
											nguni't pumutok ang lintik isang 
											araw, at sa paninira ng lintik ay 
											pumukaw ng buhay; buhat niyo'y ibang 
											mga hilig ang pinagpapagalan ng mga 
											isip, ang mga hilig na ito na 
											ngayo'y nangagkakahiwalay, 
											mangagkakalakiplakip isang araw na 
											ang Diyos ang siyang mamamatnugot. 
											Hindi nagkulang ang Diyos sa 
											pagsaklolo sa mga ibang bayan; hindi 
											rin magkukulang ang saklolong iyan 
											sa bayan natin; ang katuwiran niya'y 
											siyang katuwiran ng kalayaan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang dakilang katahimikan ang 
											siyang sumunod sa ganitong mga 
											salita. Samantala'y lumalapit ang 
											bangka sa pasigan sa hindi naiinong 
											pagsusulong ng mga alon. Si Elias 
											ang naunang sumira ng gayong hindi 
											pag-iimikan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano po ang sasabihin ko sa mga 
											nag-utos dito sa akin?--ang tanong, 
											na nagbago ng anyo ng tinig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinabi ko na po sa inyo; na 
											dinaramdam ko ang kanilang 
											kalagayan, nguni't sila'y 
											mangaghintay, sapagkat hindi 
											nagagamot ang mga sakit ng kapwa mga 
											sakit, at sa kasaliwaan nating palad 
											ay tayong lahat ay may kasalanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na muling sumagot si Elias, 
											tumungo, nagpatuloy ng pagsagwan, at 
											ng dumating sa pampang ay nagpaalam 
											kay Ibarra ng ganitong sabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinasasalamatan ko po kayo, ginoo, 
											sa inyong pahihinuhod sa aking 
											pakiusap; hinihingi ko sa 
											ikagagaling ninyong sa haharaping 
											panaho'y ako'y inyong limutin at 
											huwag ninyong kilalanin ako sa ano 
											mang kalagayang ako'y inyong 
											masumpong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At pagkasabi nito'y muling pinalakad 
											ang bangka, at sinagwanang ang 
											tungo'y sa isang gubat sa pasigan. 
											Samantalang ginagawa ang mahabang 
											pagtawid ay nanatili sa hindi 
											pag-imik; tila mandin wala siyang 
											namamasdan kung di ang libolibong 
											mga diamante na kinukuha't 
											ibinabalik ng kanyang sagwan sa 
											dagatan at doo'y talinghagang 
											nangawawala sa gitna ng mga bughaw 
											na alon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y dumating; lumabas ang 
											isang tao sa kasukalan at lumapit sa 
											kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang sasabihin ko sa 
											kapitan?--ang tanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sabihin 
											mong gaganap si Elias ng kanyang 
											pangako, sakali't hindi mamatay muna,--ang 
											isinagot ng&nbsp; buong&nbsp; kalungkutan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y kailan ka makikisama sa 
											amin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pag-inakala 
											ng inyong kapitang dumating na ang 
											panahon ng panganib.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y magaling, paalam!</font></p>
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