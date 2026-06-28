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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXIII. Layang Kaisipan</font></b></p>
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
											Nagtatapos na si Ibarra ng 
											paghuhusay ng katawan ng sa kanya'y 
											ipagbigay alam ng isang alilang 
											lalaking may isang lalaking 
											tagabukid na nagtatanong kung siya'y 
											naroroon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa pagsasapantaha niyang marahil ang 
											nagtatanong ay isa sa kanyang mga 
											kasama sa bukid, ipinagutos niyang 
											papasukin ang taong iyon sa kanyang 
											'despacho', silid na aralan, 
											ligpitan ng mga aklat at laboratorio 
											quimiko tuloy.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't sinadya mandin upang siya'y 
											lubhang manggilalas, ang nasumpungan 
											niya'y ang mabalasik at 
											matalinghagang anyo ni Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iniligtas ninyo ang aking buhay--ang 
											sinabi nito sa wikang tagalog, dahil 
											sa pagkamasid niya sa kilos ni 
											Ibarra;--binayaran ko ng kaunti ang 
											aking utang at wala nga kayong sukat 
											kilalaning utang na loob sa akin, 
											tumbalik, ako ang ma'y kinikilalang 
											utang na loob. Naparito po ako't ng 
											makiusap sa inyo tungkol sa isang 
											bagay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magsalita po kayo!--ang sagot ng 
											binata sa wikang tagalog din, taglay 
											ang panggigilalas sa mabalasik na 
											anyo ng tagabukid na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sandaling tinitigan ni Elias ang mga 
											mata ni Ibarra, at nagpatuloy ng 
											pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sakali't ibigin ng hustisya ng mga 
											taong liwanagin ang talinghagang 
											ito, ipinamamanhik ko po sa inyong 
											huwag ninyong sasabihin kanino man 
											ang tagubiling sinabi ko sa inyo sa 
											simbahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag po kayong mabahala,--ang 
											isinagot ng binata sa isang anyon 
											nagpapakilala ng sama ng 
											loob;--talastas kong kayo'y 
											pinag-uusig, datapuwa't ako'y hindi 
											marunong magkanulo kanino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oh, hindi dahil sa akin, hindi 
											dahil sa akin!--ang madaling isinagot 
											ni Elias, na nagpapahalata ng 
											kaalaban ng loob at pagkahindi 
											maalam magpakababa--ito'y dahil po sa 
											inyo: wala kaunti mang takot ako sa 
											mga tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naragdagan ang panggigilalas ng 
											binata: bago ang anyo ng pananalita 
											nang tagabukid ng iyong ng unang 
											dako'y piloto, at tila mandin hindi 
											agpang sa kanyang anyo at gayon din 
											sa kanyang pamumuhay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano po ba ang ibig ninyong 
											sabihin?--ang tanong sa lalaking 
											talinghagang iyon, na pinagsisiyasat 
											ng kanyang paningin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang pananalita ko po'y hindi 
											palaisipan, pinagsisikapan kong 
											magsabi ng maliwanag. Sa 
											ikapapanatag po ninyo kinakailangang 
											sapantahain ng inyong mga kaaway na 
											kayo'y hindi nag-aalap-ap at palagay 
											ang loob ninyo:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umudlot si Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang aking mga kaaway? May mga 
											kaaway ba ako?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May kaaway po tayong lahat, ginoo, 
											mula sa lalong maliit na hayop 
											hanggang sa tao, mula sa lalong 
											dukha hanggang sa lalong mayaman at 
											makapangyarihan! Ang pagkakaroon ng 
											kaaway ang siyang talagang kautusan 
											ng buhay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Walang imik na tinitigan ni Ibarra 
											si Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po'y hindi piloto at hindi 
											kayo tagabukid!--ang kanyang 
											ibinulong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May mga kaaway po kayo sa mga 
											matataas at mababang tao,--ang 
											ipinagpatuloy ni Elias na hindi 
											pinansin ang mga sinalita ng 
											binata;--nais po ninyong ituloy ang 
											isang panukalang dakila, may 
											pinagdaanan po kayo, nagkaroon ng 
											mga kaaway ang inyong nunong lalaki 
											at ang inyong ama, sila'y may mga 
											kinahiligan ng puso, at sa pamumuhay 
											hindi ang mga tampalasa't masasamang 
											tao ang lalong nakapupukaw ng maalab 
											na mga pagtatanim ng galit, kung 
											hindi ang mga taong may malilinis na 
											kalooban.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala po ba ninyo ang aking 
											mga kaaway?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot pagdaka si Elias, at 
											ang ginawa'y naglininglining.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala ko ang isa, iyong 
											namatay,--ang isinagot. Napagtalastas 
											ko kagabing may isang bagay na 
											kanilang inaakalang laban po sa 
											inyo, dahil sa ilang mga salitang 
											kanyang isinagot sa isang lalaking 
											hindi ko kilala na nawala sa 
											kadiliman. 'Hindi ito kakanin ng mga 
											isdang katulad ng kanyang ama: 
											makikita po ninyo bukas',--anya,--Ang 
											mga salitang ito'y siyang 
											nakahikayat sa aking pagdidilidili, 
											hindi lamang sa taglay na kanyang 
											kahulugan, kung hindi sa taong 
											nagsalita, na niyong araw pa'y 
											nagkusang humarap sa 'maestro de 
											obras' at kanyang sinabi ang kanyang 
											hangad na siya na ang mamamatnugot 
											ng mga gawain sa paglalagay ng unang 
											bato, na hindi humingi ng malaking 
											bayad, at ipinagbabansag ang 
											malalaking kanyang mga kaalaman. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Wala akong pagsaligang kasukatan 
											upang masapantala ko ang kanyang 
											masamang kalooban, nguni't may isang 
											kaunting bagay na nagsasabi sa aking 
											ang mga sapantaha ko'y katotohanan, 
											at dahil dito'y aking hinirang upang 
											kayo'y pagbilinan, ang isang sandali 
											at isang kalagayang ukol at angkap 
											upang kayo po'y huwag 
											makapagtatanong sa akin. Ang mga 
											ibang nangyari'y nakita na po ninyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Malaon nang hindi nagsasalita si 
											Elias, at gayon ma'y hindi sumasagot 
											at hindi pa nagsasalita ng ano man 
											si Ibarra. Siya'y naggugunamgunam.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dinaramdam ko na ang taong iya'y 
											namatay!--ang sa kawakasa'y nasabi 
											niya;--marahil sa kanya'y may 
											napag-usisa pang kaunting mga bagay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung siya'y nabuhay marahil siya'y 
											nakawala sa nangingnig na kamay ng 
											bulag na hustisya ng tao. Hinatulan 
											siya ng Diyos, pinatay siya ng 
											Diyos, ang Diyos ang siyang tanging 
											humukom sa kanya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minasdang sandali ni Crisostomo ang 
											lalaking nagsasalita sa kanya ng 
											gayon, at kanyang nakita ang mga 
											batibot na mga braso nito, na 
											punong-puno ng mga pasa at 
											malalaking bugbog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po ba'y nananampalataya naman 
											sa mga himala?--ang sinabing 
											ngumingiti;--tingnan po ninyo ang 
											himalang sinasabi ng bayan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung nananampalataya po ako sa mga 
											himala'y hindi ako mananampalataya 
											sa Diyos: sasampalataya ako sa isang 
											taong naging dios, sasampalataya 
											akong tunay ngang linalang ng tao 
											ang Diyos alinsunod sa kanyang 
											larawan at kalagayan; datapawa't 
											sumasampalataya ako sa Kanya; hindi 
											miminsang naramdaman ko ang kanyang 
											kamay. Nang lumulugso na ang lahat, 
											na ano pa't nanganganib malipol ang 
											lahat ng nangaroroon sa lugar na 
											iyon, ako, ako ang pumigil sa 
											tampalasan, lumagay ako sa kanyang 
											tabi; siya ang nasugatan at ako'y 
											nakaligtas at hindi nasaktan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo? sa makatuwid pala'y kayo?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo! hinawakan ko siya ng nag-iibig 
											ng tumakas, pagkatapos na 
											mapasimulan niya ang gawang 
											pangpahamak; nakita ko ang kaniyang 
											pananampalasan. Sinasabi ko po sa 
											inyo; ang Diyos na nga po lamang ang 
											siyang tanging maging hukom sa mga 
											tao, siya na nga lamang ang tanging 
											magkaroon ng kapangyarihan sa buhay; 
											na kailan ma'y huwag isiping siya'y 
											halinhan ng tao!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At gayon man ngayon po'y kayo'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po!--ang isinalabat ni Elias, 
											palibhasa'y nahulaan niya ang tutol, 
											hindi nagkakawangis.--Pagka 
											hinahatulan ng tao ang ibang mga tao 
											sa kamatayan o sa kapahamakan ng 
											pagkabuhay magpakailan man sa 
											hinaharap na panahon, ginagawa ang 
											gayong paghatol na hindi siya 
											lumagay sa panganib, at gumagamit 
											siya ng lakas ng ibang mga tao upang 
											ganapin ang kanyang mga hatol, na sa 
											lahat ng ito'y mangyayaring pawang 
											kamalian o lihis sa katuwiran. 
											Datapuwa't ako, sa aking paglalagay 
											sa tampalasan sa gayon ding panganib 
											na kanyang inilaan sa mga iba, 
											nalalakip din ako sa gayon din 
											kapanganiban. Siya'y hindi ko 
											pinatay, pinabayaan kong patayin 
											siya ng kamay ng Diyos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po ba kayo sumasampalataya sa 
											pagkakataon?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagka nanampalataya sa pagkakatao'y 
											para ring nanampalataya sa mga 
											himala; ang nananampalataya sa 
											dalawang bagay na ito'y naniniwala 
											namang hindi natatalos ng Diyos ang 
											mga mangyayari sa panahong sasapit. 
											Ano ang pagkakataon? Isang bagay na 
											nangyaring sino ma'y hindi nakaaalam 
											ng mangyayari. Ano ang himala? Isang 
											kasalangsangan, isang 
											pagkakasira-sira ng lakad na takda 
											sa mga kinapal. Isang kakulangan ng 
											laan sa mangyayari at isang 
											kasalangsangang ang kahuluga'y 
											dalawang malalaking kapintasan sa 
											isip na namamatnubay sa maquina ng 
											daigdig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino po ba kayo?--ang muling 
											itinanong ni Ibarra na ma'y halong 
											takot;--kayo po ba'y nag-aral?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Napilitan akong sumampalatayang 
											totoo sa Diyos, sapagkat pumanaw 
											sa akin ang pananalig sa mga 
											tao,--ang isinagot ng piloto, na ano 
											pa't iniwasan ang pagsagot sa 
											tanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang isip ni Ibarra'y kanyang 
											napag-unawa, ang kaisipan ng 
											pinag-uusig na binatang iyon: hindi 
											niya kinikilala ang katuwiran ng 
											taong maglagda ng kahatulan sa 
											kanyang mga kapwa, tumututol siya 
											laban sa lakas at kataasan ng 
											kalagayan ng mga tanging pulutong na 
											tao sa ibang mga pulutong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't kinakailangang 
											sumang-ayon kayo sa pangangailangan 
											ng lalarong timbangang tao, kahi man 
											lubha ang kapintasan at mga 
											kakulangan nito--ang itinutol 
											niya.--Kahit anong dami ng mga 
											kinakatawan ng Diyos sa lupa'y hindi 
											mangyayari, sa makatuwid baga'y 
											hindi sinasabi ng&nbsp; buong&nbsp; 
											kaliwanagan ang kanyang pasya upang 
											mabigyang kahatulang ang yutayutang 
											mga pagaalit-alit na ibinabalangkas 
											ng mga hidwa nating budhi. Nauukol, 
											kinakailangan sumasakatwirang 
											manakanaka'y humatol ang tao sa 
											kanyang mga kapwa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay 
											nga, datapuwa't ng upang gawin ang 
											kagalingan, hindi ang kasam-an; 
											upang sumawata ng lihis at magpabuti, 
											hindi ng makapagwasak, sapagkat 
											kung hindi matuntong sa matuwid ang 
											kanyang mga pasya'y wala siyang 
											kapangyarihang mabigyang kagamutan 
											ang masamang kanyang ginawa. nguni't 
											higit sa aking kaya ang 
											pagmamatuwirang ito,--ang kanyang 
											idinugtong at binago ang anyo ng 
											pananalita,--at nililibang ko po sayo 
											ngayong kayo'y hinihintay; Huwag po 
											ninyong kalimutan ang kasasabi ko pa 
											sa inyo: may mga kaaway kayo; 
											magpakabuhay po kayo sa ikagagaling 
											ng inyong tinubuang bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nagpaalam.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kailan 
											ko po kayo makikita uli?--ang tanong 
											ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kailan 
											man po't ibigin ninyo at kailan mang 
											ma'y magagawa akong inyong 
											pakikinabangan. May utang pa po ako 
											sa inyo.</font></p>
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