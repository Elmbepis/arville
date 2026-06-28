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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXI. Ang Sermon</font></b></p>
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
											Nagpasimula si Padre Damaso, ng 
											madalang at mahinang pangungusap:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Et spiritum tuum honum dedisti, qui 
											dokeret eos, et manna tuum non 
											prohibuisti ab ore korum, et aquam 
											dedisti eis in siti'.--'At ibinigay 
											mo sa kanila ang espiritu mong 
											magaling upang kanilang ituro at 
											hindi mo inalis sa kanilang bibig 
											ang iyong mana at binigyan mo sila 
											ng tubig sa kanilang pagkauhaw!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'mga salitang ipinangusap ng 
											Panginoon sa pamamag-itan ng bibig 
											ni Esdras, ikalawang aklat, ikasiyam 
											na bahagi, ikadalawampung tula.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa udyok ng panggigilalas ay 
											sinulyap ni Padre Sibyla ang 
											nagsesermon; namutla at lumun-ok ng 
											laway sa Padre Manuel Martin: 
											marikit ang sermong iyon kay sa 
											kanyang sermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ayawan kong nahiwatigan ni Padre 
											Damaso ang gayong bagay o baka kaya 
											naman talagang namamaos pa, 
											datapuwa't ang ginawa niya'y umubong 
											makailan at ikinapit ang dalawang 
											kamay sa palababahan ng pulpitong 
											mahal. Sumasa tapat ng kanyang ulo 
											ang Espiritu Santo na bago lamang 
											kapipinta: maputi, malinis at kulay 
											rosa ang maliliit na paa at ang 
											tuka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Carilagdilagang Ginoo (sa Alkalde), 
											kabanalbanalang mga sacerdote, mga 
											kristiano, mga kapatid kay 
											Jesukristo!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gumawa rito ng dakilang paghinto, at 
											maling inilakad niya ang kanyang 
											paningin sa mga nakikinig, at sa 
											kanya'y nakagalak ang pag-ulinig sa 
											kanya at kanilang taimtim na 
											pagtahimik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Wikang kastila ang unang bahagi ng 
											kanyang sermon at wikang tagalog ang 
											ikalawang bahagi: 'loquebantur omnes 
											linguas'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkatapos ng mga oh! at o ng 
											paghinto dakilang iniunat niya ang 
											kanyang kanang kamay sa dakong altar 
											at tumitig sa Alkalde, naghalukipkip 
											pagkatapos, na walang ano mang 
											sinasabi; nguni't kaginsaginsa'y 
											inihalili sa mahinhing kilos ang 
											kagalawan, iniling-ay sa likod ang 
											ulo, itinuro ang dakong pintong 
											malaki na pinutol ang hangin sa 
											pamamag-itan ng tagiliran ng kamay 
											ng&nbsp; buong&nbsp; kabilisan, hanggang sa 
											akalain ng mga sakristang ang 
											kahulugan ng gayong galaw ay 
											ipinag-uutos sa kanilang isara ang 
											mga pinto, at gayon nga ang kanilang 
											ginaw.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nagdamdam ligalig ang alperes at nag-alinlangan kung 
											siya'y lalabas o hindi; datapuwa't 
											nagpapasimula na ang nagsesermon ng 
											pananalitang malakas, puno at 
											mataginting: tunay nga pala namang 
											totoong matalino sa panggagamot ang 
											dating kanyang tagaalagang babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Nagniningning at kumikislap ang 
											altar, malapad ang malaking pinto, 
											ang hangin ang sasakyan ng santong 
											wika ng Diyos na bubukal sa aking 
											bibig, pakinggan nga ninyo ng mga 
											pangdingig ng kaluluwa at ng puso at 
											ng hindi mangalaglag ang mga salita 
											ng Panginoon sa lupang batuhan at 
											kanin ng mga ibon sa Infierno, kung 
											di ang kayo'y lumago at sumibol na 
											katulad ng isang santong binhi sa 
											linang ng ating kagalanggalang at 
											huwad sa serafing Amang si San 
											Francisco! </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kayong mga malalaking 
											makasalanan, mga bihag ng mga moro 
											ng kalolowa, na siyang lumalaganap 
											sa mga dagat ng walang hanggang 
											buhay, na pawang nakalulan sa 
											makapangyarihang mga sasakyan ng sa 
											taong katawan at ng mga lugod sa 
											buhay na ito, kayong hindi 
											magkandadala ng mga tanikala ng 
											mahahalay na hilig at ng mga 
											kalibugan, at nangagsisigaod sa 
											daong ng taga Infiernong si Satan, 
											masdan ninyo riyan ng mapitagang 
											pagkahiya ang tumutubos sa mga 
											kalolowa sa pagkabihag ng demonio, 
											ang matapang na Gedeon, ang malakas 
											na loob na David, ang mapagwaging 
											Roldan ng kakristianohan, ang 
											tagalangit na guwardiya sibil, na 
											higit ang katapangan sa lahat ng mga 
											guwardiya sibil kahi't pagsamasamahin 
											ang mga guwardiya sibil ngayon at ang 
											sa bukas pa'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											--(Pinapagkunot ng alperes ang noo)--'Siya nga, ginoong 
											alperes, higit ang kanyang tapang at 
											lakas, na kahi't wala siyang fusil 
											kung di isang kruz na kahoy, kanyang 
											ginagahis ng&nbsp; buong&nbsp; 
											kabayanihan ang walang hanggang 
											tulisan ng mga kadiliman, at gayon 
											din ang lahat ng mga kakampi ni 
											Luzbel, at kung di lamang hindi 
											nangamamatay ang mga espiritu, 
											silang lahat ay nangalipol na 
											magpakailan man! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											kagilagilalas na lalang na ito ng 
											Diyos, itong hindi mapaglirip na 
											himala ay ang maluwalhating si Diego 
											de Alkala, na, gagamit ako ng isang 
											pagsusumag, sapagkat nakatutulong 
											na magaling ang mga pagsusumag sa 
											pagka unawa ng mga bagay na hindi 
											mapag-abot ng isip, ayon sa wika nga 
											ng iba, sinasabi ko nga na ang 
											dakilang santong ito'y isang 
											katapustapusang kawal, isang 
											'rankhero' (tagapagpakain) lamang sa 
											aming lubhang makapangyarihang 
											hukbong pinag-uutusan ng aming tulad 
											sa serafing Amang si San Francisco, 
											na siyang ikinararangal kong 
											kinapapanigang ako'y kabo o sargento 
											sa talaga't awa ng Diyos.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mga hangal na 'indio', ayon sa 
											sabi ng 'korresponsal', walang 
											nabingwit sa sinaysay na iyon, liban 
											na lamang sa mga salitang 'guwardiya 
											sibil', 'tulisan', 'San Diego' at 
											'San Francisco'; namasid nila ang 
											pagsama ng mukha ng alperes, ang 
											anyong bayani ng nagsesermon, at sa 
											gayo'y inakala nilang kinagagalitan 
											ng Padre ang alperes dahil sa hindi 
											niya inuusig ang mga tulisan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Si San 
											Diego at si San Francisco ang 
											gaganap ng bagay na iyon, at sila 
											nga ang tunay na makagagawa, tulad 
											sa pinatototohanan ng isang 
											pinturang na sa kumbento ng Maynila, 
											na sa pamamag-itan lamang ng kanyang 
											kordon ay nahadlangan ni San 
											Francisco ang paglusob ng mga insik 
											ng mga unang taon ng pagkatuklas sa 
											Pilipinas ng mga kastila. Hindi nga 
											kakaunti ang katuwaang tinamo o ng 
											mga namimintakasi, kinilala nilang 
											utang na loob sa Diyos ang ganitong 
											tulong, at hindi sila 
											nag-aalinlangan sa paniniwalang 
											pagka wala ng mga tulisan, ang mga 
											guwardiya sibil naman ang lilipulin ni 
											San Francisco. Lalong pinagbuti nga 
											nila ang pakikinig, sinundan nila 
											ang mga sinasaysay ni Padre Damaso, 
											na nagpatuloy ng pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Carilagdilagang ginoo: Ang 
											malalaking mga bagay talagang 
											malalaking mga bagay kahi't na sa 
											tabi ng mga maliliit, at ang mga 
											maliliit kailan ma'y maliliit din na 
											sa siping man ng mga malalaki. Ito 
											ang sabi ng Casaysayan, (Historia), 
											at sapagkat ang Casaysayan, sa 
											sandaang palo'y isa lamang ang 
											tumatama, palibhasa'y bagay na gawa 
											ng mga tao, at ang mga tao'y 
											nagkakamaling 'errare es hominum' 
											ayon sa sabi ni Cikeron, ang may 
											dila ay nahihidwa, ayon sa kasabihan 
											sa aking bayan, ang nangyayari'y may 
											lalong malalalim na katotohanang 
											hindi sinasabi ng Historia. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang mga 
											katotohanang ito, Carilagdilagang 
											Ginoo, ay sinabi ng Espiritu Santo, 
											sa kanyang kataastaasang karunungang 
											kailan ma'y hindi naabot ng pag 
											iisip ng tao mula pa sa mga panahon, 
											ni Seneka at ni Aristoteles, iyang 
											mga pantas na mga prayle ng unang 
											panahon hanggang sa makasalanang mga 
											panahon natin ngayon, at ang mga 
											katotohanang ito'y hindi nga iba 
											kung di hindi palaging ang mga 
											maliliit na bagay ay maliliit nga, 
											kung di pawang malalaki, hindi kung 
											isusumag sa mga mumunti, kung di 
											kung isusumag sa lalong malalaki sa 
											lupa at sa langit at sa hangin at sa 
											mga panganurin at sa mga tubig at sa 
											alang-alang at sa buhay at sa 
											kamatayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nawa!--ang isinagot ng maestro 
											ng V.O.T., at saka nagkruz.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ibig ni Padre Damasong 
											papanggilalasin ang mga nakikinig sa 
											ganitong anyo ng pananalitang 
											kanyang napag-aralan sa isang 
											dakilang tagapagsermon sa Maynila, 
											at siya ngang nangyari, na sa 
											pagkapatanga sa gayong karaming mga 
											katotohanan, kinailangan niyang 
											dunggulin ng paa ang kanyang 'espiritu 
											santo' (ang prayle bagang sa kanya'y 
											tagadikta) upang sa kanya'y 
											maipaalaala ang kanyang katungkulan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Maliwanag na nakikita ng inyong 
											mga mata!--ang sinabi ng 'espiritu' buhat 
											sa ibaba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Maliwanag na nakikita ng inyong mga 
											mata ang sumasaksing ganap at 
											napapaukit na itong walang hanggang 
											katotohanang naalinsunod sa 
											Filosofia! Maliwanag na nakikita 
											iyang araw ng mga kabanalan, at 
											sinabi kong araw at hindi buwan, 
											sapagkat walang malaking karapatang 
											numingning ang buwan sa&nbsp; buong&nbsp; 
											gabi; sa lupa ng mga bulag ang 
											dalawang mata'y hari ang bulag ang 
											isang mata lamang (nakapangyayari sa 
											bayan ng mga hangal ang may kaunting 
											dunong na pinag-aralan). </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Mangyayaring numingning ang isang 
											ilaw kung gabi, o ang isang maliit 
											na bituin; ang lalong mahalaga'y ang 
											makapagningning kahi't katanghaliang 
											tulad sa ginagawa ng araw: ganito 
											nga ang pagniningning ng kapatid na 
											si Diego kahi't sa gitna ng lalong 
											mga dakilang santo! Nariya't 
											nakahayag sa inyong mga mata, sa 
											inyong pusong na hindi 
											pananampalataya sa ulirang gawa ng 
											Cataastaasan upang mabigyang 
											kahihiyan ang lalong mga dakila sa 
											lupa; oo, mga kapatid ko, hayag, 
											hayag sa lahat, hayag!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtindig ang isang lalaking 
											namumutla at nanginginig at nagtago 
											sa isang konfesionario. Siya'y isang 
											maglalako ng alak na nag-aagaw-tulog 
											at nananag-inip na hinihingan siya 
											ng mga karibinero ng 'patente' na 
											hindi niya taglay. Hindi na raw siya 
											umalis sa kanyang pinagtaguan 
											hanggang sa hindi natapos ang 
											sermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Mapagpakumbaba at maligpiting 
											santo, ang iyong kruz na kahoy'--(ang 
											dala ng larawan ni San Diego'y kruz 
											na pilak),--'ang iyong mahinhing 
											habito'y pawang nagbibigay dangal sa 
											dakilang si Francisko, na kami 
											kanyang mga anak at nakikiwangis sa 
											kanyang mga ginagawa! Inilalaganap 
											namin ang layong santong lahi sa&nbsp; 
											buong&nbsp; daigdig, sa lahat ng mga 
											sulok, sa mga kiudad, sa mga bayan 
											at hindi namin tinitingi ang maputi 
											sa maitim'--(pinigil ng Alkalde ang 
											kanyang paghinga)--'sa pagtitiis ng 
											hindi pagkain at ng mga 
											pagpapakahirap, santong lahi mo na 
											sa pananampalataya at sa religiong 
											may taglay na sandata'--(Ah! ang 
											hininga ng Alkalde)--'na 
											pinapananatili ang sangkatauhan sa 
											matatag na kalagayan at pumipigil na 
											mabulid sa malalim na bangin ng 
											kapahamakan!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Untiunting naghihikab ang mga 
											nakikinig, sampu ni Kapitan Tiago: 
											Hindi pinakikinggan ni Maria Clara 
											ang sermon: nalalaman niyang malapit 
											sa kanyang kinalalagyan si Ibarra at 
											siyang sumasaisip niya, samantalang 
											siya'y nag-aabaniko at kanyang 
											minamasdan ang toro ng isa sa mga 
											Evangelista, na walang pinag-ibhan 
											sa anyo ng isang kalabaw na maliit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">'Dapat 
											nating masaulong lahat ang mga 
											Santong Casulatan, ang buhay ng mga 
											santo, at sa ganito'y hindi ko 
											kinakailangang sa inyo'y mangaral, 
											mga makasalanan; dapat ninyong 
											maalaman ang mga bagay na itong 
											totoong mahalaga at kinakailangang 
											gaya ng pagkasaulo sa Ama namin, 
											bagaman nakalimutan na ninyo ito at 
											nagbubuhay protestante o hereje na 
											kayo, na hindi nagsisigalang sa mga 
											ministro (kawani ng Diyos, na gaya 
											ng mga insik), nguni't kayo'y 
											mangagpapakasama, lalo ng 
											mangapapahamak kayo, mga sinumpa!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, kosa ese pale Lamaso, ese! 
											(Aba ano ba naman ang Padre Damasong 
											iyan)--ang ibinulong ng insik na si 
											Carlos, na iniirapan ang 
											nagsesermong nagpapatuloy ng mga 
											pananalitang naiisip niya ng 
											sandaling iyon, at nagbububuga siya 
											ng mga likaw-likaw na mga paglait at 
											pagmumura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Mamamatay kayong hindi 
											makapagsisisi ng inyong mga 
											kasalanan, mga lahi ng mga hereje! 
											Mula pa rito sa lupa'y pinarurusahan 
											na kayo ng Diyos ng mga pagkapiit at 
											pagkabilanggo! Ang mga 
											mag-amag-anak, ang mga babae ay 
											dapat lumayo sa inyo: dapat kayong 
											bitaying lahat ng mga namummuno at 
											ng hindi lumaganap ang binhi ni 
											Satanas sa halamanan ng 
											Panginoon!... Sinabi ni Jesukristo: 
											Kung kayo'y may masamang kasangkapan 
											ng katawang humihikayat sa inyo sa 
											pagkakasala, putulin ninyo, iabsang 
											ninyo sa apoy!...'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanginginig si fray Damaso, 
											nalimutan niya ang kanyang sermon at 
											ang maayos na pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Narinig mo ba?--ang itinanong sa 
											kanyang kasama ng isang binatang 
											estudianteng taga Maynila;--puputulin 
											mo ba ang iyo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ka! siya na muna ang magputol!--ang 
											isinagot ng kausap, na itinuturo ang 
											nagsesermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naligalig si Ibarra; lumingap sa 
											kanyang paligid at humahanap ng alin 
											mang sulok, datapwa't punongpuno 
											ang&nbsp; buong&nbsp; simbahan. Walang 
											naririnig at walang nakikita si 
											Maria Clara, na pinagsisiyasat ang 
											kuadro ng pinagpalang mga kaluluwa 
											sa purgatoryo, mga kaluluwang ang 
											anyo'y mga lalaki't mga babaeng 
											hubo't hubad na may nakapatong sa 
											ulong 'mitra,' (sombrero ng papa,) 
											'kapelo' (sombrero ng kardenal), o 
											'toka' (talukbong ng monja), na 
											nangaiihaw sa apoy at 
											nangagsisikapit sa kordon ni San 
											Francisco, na hindi nalalagot kahi't 
											lubhang napakabig-at ang mga 
											nakabiting iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa gayong pagdaragdag ni Fray Damaso 
											ng kanyang mga naisipa'y 
											nag-kaligaw-ligaw ang espiritu 
											santong prayle sa pagkakasunodsunod 
											ng sermon hanggang sa siya'y 
											lumaktaw ng tatlong mahahabang 
											pangkat at sumama ang pagdidikta kay 
											Padre Damaso, na humihingal at 
											nagpapahinga sa kanyang maalab na 
											pagmumura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Sino sa inyo, mga makasalanang 
											nakikinig sa akin, ang hihimod sa 
											mga sugat ng isang dukha at libaging 
											magpapalimos? Sino? Sumagot at itaas 
											ang kamay kung sino! Wala sino man! 
											Dati ko nang nalalaman; wala ngang 
											makagagawa ng gayon kung di ang 
											isang santong gaya ni Diego de 
											Alkala; kanyang hinimuran ang&nbsp; buong&nbsp; 
											kabulukan, at tuloy sinabi niya sa 
											isang kapatid na nanggigilalas; 
											Ganito ang paggamot sa may sakit na 
											ito! Oh pagkakakawang gawa ng 
											kristiano! Oh pagkahabag na walang 
											kahulililip! Oh kabanalan ng mga 
											kabanalan! Oh kagalinggalingang 
											hindi matutularan! Oh walang bahid 
											na lunas!....'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ipinagpatuloy ang isang mahabang 
											tanikalang mga oh! na idiniripa ang 
											mga kamay, at itinataas at ibinababa 
											na anaki mandin ibig na lumipad o 
											bumugaw ng mga ibon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Nagsalita siya ng latin bago 
											mamatay, bagaman dating hindi 
											murunong ng latin! Manggilalas kayo 
											mga makasalanan! Hindi kayo 
											makapagsasalita ng latin, bagaman 
											pinag aaralan ninyo, at sa pag aaral 
											na ito'y pinapalo kayo, hindi kayo 
											makapagsasalita ng latin, mamamatay 
											kayong hindi makapaglalatin! Isang 
											biyaya ng Diyos ang makapagwikang 
											latin, kaya nagsasalita ng latin ang 
											Iglesia! Ako ma'y nagwiwikang latin 
											din! </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Bakit ipagkakait ng Diyos ang 
											kaaliwang ito ng loob sa kanyang 
											minamahal na si Diego? Mangyayari ba 
											siyang mamatay, mapababayaan ba 
											siyang hindi nagwiwikang latin? 
											Hindi nga mangyayari! Kung 
											magkagayo'y hindi gaganap sa 
											katuwiran ang Diyos, hindi sa 
											totohanang siya'y Diyos! Nagwikang 
											latin nga siya at nagpapatotoo ang 
											mga sumulat ng aklat ng mga panahong 
											iyon!' At kanyang binigyang wakas 
											ang kanyang pasimula ng pangangaral 
											ng lalong pinaghirapan niya na 
											kanyang inumit sa titik ng isang 
											dakilang manunulat, na si Ginoong 
											Sinibaldo de Mas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Binabati nga kata, marilag na 
											Diego, dangal ng aming samahan! 
											Puspos ka ng kabanalan, mahinhing 
											may kapurihan; mapagpakumbabang may 
											kamahalan; masunuring boo ang loob; 
											mapagtiis sa kakaunting bagay na 
											mapagmithi; kaaway na tapat ang 
											loob; maawaing nagpapatawad; 
											prayleng lubhang maselang; 
											mapanampalatayang namimintakasi; 
											mapaniwalaing walang malay; walang 
											bahid kalupaang sumisinta; hindi 
											maimiking may tinagong lihim; 
											mapagtiis na matiyaga; matapang na 
											natatakot; mapagpigil na may 
											kalooban; mapangahas na masulong; 
											mapanalimang nagpapakatino; 
											mahiyaing may karangalan; 
											mapag-ingat ng iyong pag-aaring 
											hindi mahinayangin; maliksing taglay 
											ang kaya; mapagbigay galang na 
											marunong makipagkapwa-tao; matalas 
											ang isip na ma-ingat; mahabaging may 
											awa, matimtimang may hiya; 
											mapanghiganting matapang; sa 
											kasipaga'y dukha na mapagsang-ayon; 
											mapag-impok na mapagbiyaya; walang 
											malay na nakakatalos; mapagbagong 
											may kinauuwian; mapagwalangbahalang 
											nagmimithing matuto: linalang ka ng 
											Diyos upang kamtan ang mga 
											kaayaayang lugod ng pagsintang 
											malamlam!...</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tulungan mo akong umawit 
											ng iyong mga kadakilaan at ng ang 
											iyong pangala'y lalong mataas kay sa 
											mga bituin at lalong lumiwanag kay 
											sa araw na umiinog sa iyong paanan! 
											Tulungan ninyo akong humingi sa 
											Diyos ng kaukulang talas ng isip, sa 
											pamamag-itan ng pagdarasal ng isang 
											Aba Ginoong Maria!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagsiluhod na lahat at bumangon 
											ang isang hugong na katulad ng 
											sabay-sabay na hugong ng sanglibong 
											bubuyog. Iniluhod ng Alkalde ng 
											malaking pag-hihirap ang isang paa, 
											na iniiiling ang ulo sa sama ng 
											loob; namutla at nagsisisi ng 
											taimtim sa puso ang alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Napakadiablo ang kurang iyan!--ang 
											ibinulong ng isa sa mga binatang 
											galing Maynila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang maingay!--ang sagot ng 
											kasama,--naririnig tayo ng kanyang 
											asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y hindi ang pagdarasal ng 
											Aba Ginoong Maria ang ginagawa ni 
											Padre Damaso, kung di ang pag-away 
											sa kanyang 'espiritu santo,' dahil 
											sa paglaktaw na ginawa sa tatlong 
											pinakamainam na pangkat ng kanyang 
											sermon, saka kumain ng tatlong 
											merengue at uminom ng isang vasong 
											alak na Malaga, sa kanyang lubos na 
											pananalig na masusunduan niya sa 
											kanyang kinain at ininom na iyon ang 
											magagaling na salitang kanyang 
											sasaysayin, ng higit sa maibubulong 
											sa kanya ng lahat ng mga 'espiritu 
											santong' kahoy na may anyong 
											kalapati o may but-o't may lamang 
											may anyong malibanging prayle. 
											Pasisimulan niya na ang sermong 
											wikang tagalog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinuktukan ng matandang 
											mapamintakasi ang kanyang apong 
											babae, na nagising na masama ang 
											loob at nagtanong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dumating na ba ang oras ng 
											pag-iyak?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi pa, nguni't huwag kang 
											matulog 'kondenada'!--ang isinagot ng 
											mabait na nunong babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Babahagya lamang ang naitanda namin 
											sa pangalawang bahagi ng sermon, sa 
											makatwid baga'y ang sa 
											wikang&nbsp;tagalog. Hindi nagsasaulo ng 
											pinag-ayos sa wikang tagalog si 
											Padre Damaso, kung di ang maisipan 
											na lamang niya sa oras ng 
											pagsesermon, hindi sa dahilang 
											malaki ang dunong niya sa 
											pananagalog kay sa pangangastila, 
											kung di palibhasa'y ipinalalagay 
											niyang pawang hangal ang mga 
											filipinong mga taga lalawigan sa 
											maayos na pananalita, hindi siya 
											nanganganib makapagsalita ng mga 
											kaul-ulan sa harap nila. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa mga 
											kastila'y iba ng bagay, may 
											naringgan siyang may palatuntunan 
											daw na sinusunod sa magaling na 
											pananalumpati, at hindi nga malayong 
											magkaroon sa mga nakikinig ng isa 
											man lamang na nakapag-aral sa 
											kolegio, marahil ang ginoong Alkalde 
											Mayor ang isa sa kanila; at dahilan 
											dito'y isinusulat muna niya ang 
											kanyang mga sermon, pinagsisikapang 
											pagbutihin, kinikikil at saka 
											isinasaulo pagkatapos, at ginagawa 
											niya ang pagsasanay sa loob ng mga 
											dalawang araw bago dumating ang 
											pagsesermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naging kabalitaang sino man sa 
											nakikinig ay hindi nakaunawa ng 
											kabooan ng sermong iyon: at gayon 
											ang nangyari, palibhasa'y mapupurol 
											ang kanilang isip at totoong 
											malalalim ang mga sinabi ng 
											nagsermon, ang sabi nga ni Hermana 
											Rufa, kaya nga't nasayang lamang ang 
											paghihintay ng mga nakikinig ng 
											pagdating ng mga pananalitang 
											kinararapatang iyakan, at bukod pa 
											sa roo'y muling natulog ang 
											'kondenadang' apo ng matandang 
											mapagbanal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gayon man, itong huling bahaging 
											ito'y namungang hindi gaya, ng una, 
											kahi't sa mga tanging nakikinig man 
											lamang, ayon sa makikita natin sa 
											dakong susunod.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpasimula ng isang: 'Mana kapatir 
											kon kristiano', at saka isinunod 
											dito ang dugyong-dugyong mga 
											salitang hindi maihuhulog sa ano 
											mang wika; nagsalita ng tungkol sa 
											kaluluwa, sa Infierno, sa 'mahal na 
											santo pintakasi, sa mga makasalanang 
											mga 'indio' at sa mga banal na mga 
											Padreng Franciskano.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Menkhe!--anang isa sa dalawang mga 
											walang galang na taga Maynila sa 
											kanyang kasama:--wikang griego sa 
											ganang akin ang lahat ng iyan, yayao 
											na ako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At sapagkat nakita niyang nakasara 
											ang lahat ng pintuan, doon siya 
											lumabas sa sakristia, na ano pa't 
											malaking totoo ang ipinagkasala ng 
											mga tao at ng nagsesermon, sa dahil 
											sa gayo'y namutla at itinigil ni 
											Padre Damaso sa kalahati ang isang 
											salita niya; inakala ng ilang 
											magsasalita siya ng isang mabalasik 
											na mura, nguni't nagkasiya na lamang 
											si Padre Damaso na pasundan niya ng 
											tingin ang umalis, at saka 
											ipinagpatuloy ang pagsesermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ibinulusok niya ang mga sumpa laban 
											sa lakad ng mga kaasalan ng 
											sangkatauhan, laban sa pagwawalang 
											galang, laban sa bagong sumisilang 
											na paglabag sa religion. Tila mandin 
											ang ganitong bagay ang siyang 
											totoong kanyang kaya, sapagkat 
											nag-aalab ang kanyang isip, at 
											nagsasalita ng&nbsp; buong&nbsp; kariinan at 
											kaliwanagan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tinukoy ng kanyang 
											pananalita ang mga makasalanang, 
											hindi nagsisipangumpisal, na 
											nangamamatay sa bilangguang hindi 
											nakatatanggap ng mga sakramento, ng 
											mga familiang sinumpa ng Diyos, ng 
											mga palalo't mga sopladong 
											'mesticillo' ng mga binatang 
											nagdudunongdunungan, mga 
											'filosofillo' o 'pilosopillo', ng 
											mga 'abogadillo', mga 
											'estudiantillo' at iba pa. Hindi 
											kaila ang kaugaliang taglay ng 
											marami, pagka ibig nilang libakin 
											ang kanilang mga kaaway: dinuduluhan 
											nila ang mga pananalita ng 'illo', 
											palibhasa'y wala na manding mapiga 
											sa kanilang utak, at sa ganitong 
											gawa'y lubos na silang lumiligaya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naririnig na lahat ni Ibarra at 
											kanyang nalalaman ang mga pasaring 
											na iyon. Nananatili sa kanya ang 
											paimbabaw na katahimikan ng loob, 
											hinahanap ng kanyang mga mata ang 
											Diyos at ang mga punong may 
											kapangyarihan, datapuwa't doo'y wala 
											kung di mga larawan ng mga santo at 
											ang humihimlay na Alkalde.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y nararagdagan ng 
											nararagdagan ang silakbo ng alab ng 
											loob ng nagsesermon. Sinasabi niyang 
											ng mga unang panahon daw, ang lahat 
											ng filipino, kung nakakasalubong ang 
											isang sacerdote ay nagpupugay, 
											iniluluhod ang isang paa sa lupa at 
											hinahagkan ang kamay ng 
											pari.--'Datapua, gayon, ang 
											idinugtong--an gawa ninyo laman, 
											inaalis ninyo an salakot o an 
											'sombrero de kastorillo', na 
											nalalagay ninyo nakakilin sa ibabaw 
											nan inyo ulo, para huwak masisira 
											ang suklay nan inyon buhok! </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Husto na 
											sabihin ninyo: Magandanaraw, 'amon'! 
											at may mana palalo, na mana 
											'estudiantillos de poko latin', na 
											dahil sila naaaral sa Manila o sa 
											Europa, akala na nila mayron na sila 
											katuwiran makikamay sila sa amin, sa 
											lugar na sila mahahalik nan kamay sa 
											amin ...Ah! madali na darasin an 
											paghuhukom, matatapos an mundo, 
											marami mana santo an huhula nito 
											uulan nan apoy, bato, saka abo, para 
											parusahan an kapalaluan ninyo!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At bago niya iniaral sa bayang huag 
											tularan ang gayong mga 'salvaje', 
											kung di bagkos pang lumayo at 
											kasusutan ang gayong mga tao, 
											sapagkat sila'y pawang mga 
											'exkomulgado.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Din-gin ninyo an sabi nan mana 
											'santos koncillos!'--anya--'Cun 
											nasasalubun nan isan indio sa kalle 
											an isan kura, itutun-go an ulo, 
											ihahanda an kanyan lilo, at nan an 
											amon ay kumapit doon; pakka 
											nakakabayo kapwa, an kura saka an 
											indio, pakka gayon, hihinto an 
											indio, mapupugay nan salakot o 
											sombrero nan boon galan; sa 
											katapusan, kun an indio nakakabayo 
											at nadlalakat an kura, iibis sa 
											kabayo an indio at hindi sasakay uli 
											hangan hindi nasasabi sa kanya nan 
											kura solon! o kun totoo malayo na an 
											kura. Mana sabi ito ng santos 
											koncillos, at an hindi nasusunod, 
											siya magigin 'exkomulgado.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At pagka ang sinasakyan ng isa'y 
											isang kalabaw?--ang tanong ng isang 
											masuring magsasaka sa kanyang 
											kalapit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y ... makapagpapatuloy 
											ka!--ang isinagot nito na totoong 
											marunong umibag.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't marami ring nakakatulog o 
											nalilibang, bagaman nagsisisigaw ang 
											nagsesermon at kumikiyang magaling; 
											paano'y iyon ng iyon ang isenesermon 
											sa ano mang araw at sa ano mang 
											bagay: nawalan ng kabuluhang 
											magbuntong-hininga at 
											magtangistangisan ang ilang 
											mapagbanal na babae, dahil sa mga 
											kasalanan ng mga pusong, napilitang 
											itigil nila ang kanilang gawa dahil 
											sa wala sino mang sa kanila'y 
											makisapi. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Si Hermana Puti ma'y laban 
											doon ang iniisip. Nakatulog ng 
											mainam ang isang lalaking nakaupo sa 
											kanyang tabi, na walang ano-ano'y 
											natumba sa kanyang ibabaw, na ano 
											pa't nalukot ang kanyang habito: 
											dinampot ng mabait na matandang 
											babae ang kanyang bakya at ginising 
											sa kahahampas ang lalaking iyon, 
											kasabay ng sigaw na:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay! layas, salvaje, hayop, 
											demonio, kalabaw, aso, kondenado!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagkagulo nga dahil dito. Huminto 
											ang nagsesermon, itinaas ang mga 
											kilay, sa pagtataka niya sa gayong 
											kalaking kaligaligan. Linunod ng 
											kagalitan ang salita sa kanyang 
											lalamunan, kaya't wala siyang nagawa 
											kung di umatungal at, suntukin ang 
											palababahan ng pulpito. Namunga ang 
											gayong gawa: binitiwan ng matandang 
											babae ang bakya, nagbubulong at 
											pagkatapos na makapagkruz na 
											makailan, naluhod siya ng&nbsp; buong&nbsp; 
											kataimtiman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Aaah! aaah! ang sarisawa'y!--naisigaw ng nagagalit na 
											sacerdote, na naghalukipkip at 
											naipailing-iling;--sa ganyan baga kun 
											kaya ako nangagaral dito sa inyo sa 
											boon umaga, mana salvajes! Dito sa 
											bahay nan Diyos kayo naaaway at kayo 
											nasasabi nan mana salitan masasama, 
											mana walan hiya! Aaaah! kayo wala 
											nan iginagalan!....Ito an mana gawa 
											nan kalibugan at nan hindi paglayo 
											sa kalupaan nan panahon ito! 
											Sinasabi ko na sa inyo aah!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ipinatuloy niya ang pagsesermon 
											tungkol sa bagay na ito sa loob ng 
											kalahating oras. Humihilik na ang 
											Alkalde, tatangotango na si Maria 
											Clara sa pagkaantok, hindi na 
											mapaglabanan ng abang dalaga ang 
											pagtutuka, palibhasa'y wala ng ano 
											mang pintura at ano mang larawan man 
											lamang na mapagsiyasat sa 
											mapaglibangan. Hindi na nakalingit 
											kay Ibarra ang mga sinasabi at gayon 
											din ang mga pasaring; ang kanyang 
											iniisip ngayo'y isang maliit na 
											bahay sa taluktok ng isang bundok, 
											at doo'y nakikita niyang si Maria 
											Clara'y na na sa halamanan. Anong 
											masakit sa kanya kung doon sa 
											kapataga'y gumagapang ang mga tao sa 
											kanilang mga imbing bayan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Makaalawang ipinatugtog ni Padre 
											Sibyla ang kampanilla, nguni't ito'y 
											parang ginagatungan ng kahoy ang 
											apoy: palibhasa'y 'terkero' si fray 
											Damaso'y lalo nang pinahaba niya ang 
											sermon, Nangangagat-labi si Fray 
											Sibyla, at ulit-ulit na pinagbubuti 
											niya ang kanyang salamin sa matang 'kristal 
											de roka', na ginto ang kinakakabitan. 
											Si Fray Manuel Martin ang tanging 
											tila mandin nakikinig ng&nbsp; buong&nbsp; 
											ligaya, sapagkat ngumingiti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y sinabi ng Diyos na 
											siya na, napagal ang nagsesermon at 
											nanaog sa pulpito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagsiluhod ang lahat upang 
											magpasalamat sa Diyos. Kinuskos ng 
											Alkalde ang kanyang mga mata, inunat 
											niya ang isang brazo na para manding 
											nag-iinat, nagbitiw ng isang malalim 
											na 'ah'! at naghikab.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipinagpatuloy ang misa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang kantahin na ni Balbino at ni 
											Chananay ang 'Inkarnatus est', ng 
											magasiluhod na ang lahat, at ng 
											magsitungo na ang mga sacerdote, 
											ibinulong ng isang lalaki sa tainga 
											ni Ibarra ang ganito:--'Sa keremonia 
											ng bendicion ay huwag po kayong 
											lalayo sa kura, huwag kayong 
											lulusong sa hukay, huwag kayong 
											lalapit sa bato; mapapanganyaya ang 
											inyong buhay kung di ninyo ako 
											sundin!'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita ni Ibarrang nawala si Elias 
											sa karamihan, pagkasabi sa kanya ng 
											bagay na iyon.</font></p>
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