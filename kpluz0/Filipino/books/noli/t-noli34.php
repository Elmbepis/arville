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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXIV. Ang Pagkain</font></b></p>
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
											Nangagasisikain sa ilalim ng 
											pinamutihang kiosko ang mga mahal na 
											tao sa lalawigan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Na sa isang duyo ng mesa ang Alkalde; 
											sa kabilang duyo naman naroon si 
											Ibarra. Nakaupo sa dakong kanan ng 
											binata si Maria Clara, at sa dakong 
											kaliwa, niya ang eskribano. Si 
											Kapitan Tiago, ang alperes, ang 
											gobernadorcillo, ang mga prayle, ang 
											mga kawani ng pamahalaan at ang 
											ilang mga dalagang nangasira'y 
											nangagsiupo, hindi ayon sa 
											kanikanilang kalagayan sa bayan, 
											kung di ayon sa kanikanilang hilig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											May katamtamang saya at galak ang 
											kainan, datapuwa't ng nangangalahati 
											na'y siyang pagdating ng isang 
											kawani sa telegrapo na si Kapitan 
											Tiago ang hanap upang ibigay sa 
											kanya ang isang telegrama. Ayon sa 
											kaugalia'y humingi ngang pahintulot 
											si Kapitan Tiago upang basahin ang 
											telegramang iyon, at ayon sa 
											kaugalian naman ay ipinamanhik ng 
											lahat na kanyang basahin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinapagkunot muna ng karapatdapat na 
											Kapitan ang kanyang mga kilay, 
											itinaas pagkatapos, namutla ang 
											kanyang mukha, nagliwanag, 
											dinalidaling tiniklop ang papel at 
											saka nagtindig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--mga ginoo,--ang sinabing 
											nagmamamadali,--darating ngayong 
											hapon ang karangaldangalang Kapitan 
											General upang paunlakan ang aking 
											bahay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At saka biglang nagtatakbong dala 
											ang telegrama at ang servilleta, 
											nguni't walang sombrero, na 
											pinag-uusig ng mga hiyawan at mga 
											tanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kung ang pagdating ng mga tulisan 
											ang ibinalita'y gayon na nga lamang 
											ang ligalig na mangyayari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't pakinggan po ninyo!--kailan 
											darating?--Sabihin ninyo sa amin!--Ang 
											Kapitan Heneral!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Malayo na si Kapitan Tiago.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Darating ang Kapitan Heneral at 
											doon tutuloy sa bahay ni Kapitan 
											Tiago!--ang sigawan ng ilan, na ano 
											pa't hindi na nila dinidili-diling 
											naroroon ang anak na babae't ang 
											kanyang mamanugangin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi makahihirang ng lalalo pa sa 
											galing!--ang itinutol ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtitinginan ang mga prayle: ito 
											ang kahulugan ng kanilang 
											tinginan:--'Gumagawa ang Kapitan 
											Heneral ng isa sa kanyang mga 
											kapaslangan, inaalipusta niya tayo, 
											dapat na sa kumbento siya 
											tumuloy',--datapuwa't sapagkat 
											gayon din ang iniisip ng lahat, 
											sila'y hindi umiimik at hindi 
											sinasaysay nino man ang kanyang 
											kaisipan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May nangagsabi na sa akin sa hapon 
											ng bagay na iyan, datapuwa't hindi 
											pa nalalaman ng Kapitan Heneral kung 
											siya'y matutuloy.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman po ba ng kamahalan ninyo, 
											ginoong Alkalde, kung hanggang 
											kailan matitira rito ang Kapitan 
											Heneral?--ang tanong ng alperes na 
											nanganganib.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko talastas na maigi; 
											maibigin ang Kapitan Heneral na 
											mangbigla.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Narito ang ibang mga telegrama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mga telegramang iyo'y sa 
											Alkalde, sa alperes at sa 
											gobernadorcillo; namamasid na 
											magaling ng mga prayleng wala isa 
											man lamang telegramang ukol sa kura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Darating ang Kapitan Heneral sa 
											ikapat na oras ng hapon, mga 
											ginoo!--anang Alkalde ng pananalitang 
											madakila;--makakakain tayo ng&nbsp; buong&nbsp; 
											katahimikan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi makapagsasabi ng hihigit pa sa 
											rito sa kagalingan si Leonidas sa 
											Termopilas: 'ngayong gabi'y hahapon 
											tayong kasama ni Pluton!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanag-uli ang salitaan sa lakad na 
											kaugalian.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namamasid kong wala rito ang ating 
											dakilang mangangaral!--ang kiming 
											sinalita ng isa sa mga naroroong 
											kawani ng gobierno, na mahinhin ang 
											anyo at hindi binubuksan ang bibig 
											hanggang sa oras ng pagkain, at sa&nbsp; 
											buong&nbsp; umaga'y ngayon nga lamang 
											nagsalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang lahat ng nakaaalam ng mga 
											nangyari sa ama ni Crisostomo'y 
											kumilos at kumindat, na ang 
											kahuluga'y:--'Hala kayo! Sa unang 
											hakbang pa lamang ay kayo'y nasilat 
											na!--Datapuwa't sumagot ang ilang 
											mapagmagandang loob:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil napapagal siya ng 
											kaunti....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Anong kaunti lamang?--ang biglang 
											sinabi ng alperes;--pagod na pagod 
											marahil, at ayon sa kasabihan dito'y 
											'malunqueado' (bugbog na bugbog ang 
											katawan). Naku ang pangaral na iyon!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang mainam na sermon, 
											kadakidakilaan!--anang eskribano.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marangal, malalim!--ang idinugtong 
											ng korresponsal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Upang makapagsalita ng gayong 
											katagal, kinakailangang magkaroon ng 
											lalamunang gaya ng kanyang 
											lalamunan,--ang ipinahiwatig ni Padre 
											Manuel Martin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Walang pinupuri ang agustino kung di 
											ang lalamunan lamang niya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman ba ninyong si ginoong 
											Ibarra'y siyang lalong may magaling 
											na tagapagluto sa&nbsp; buong&nbsp; 
											lalawigan?--anang Alkalde upang 
											putulin ang salitaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan nga ang sinasabi ko, 
											datapuwa't ang magandang babaeng 
											kanyang kalapit ay aayaw paunlakan 
											ang hayin, sapagkat bahagya na 
											lamang tinitikman ang pagkain,--ang 
											tutol ng isa sa mga kawani ng 
											gobierno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdamdam kahihiyan si Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Napasasalamat ako sa ginoo ... 
											napakalabis naman ang kanyang 
											pangangasiwa sa aking katauhan,--ang 
											kiming sinalita ng 
											pautal,--datapuwa't....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't pinauunlakan po ninyo ng 
											malaki ang pagsasalosalong ito sa 
											inyo lamang pagparito,--ang sinabing 
											pangwakas sa salita ng Alkaldeng 
											malingap sa babae, at saka humarap 
											kay Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Padre Cura,--ang malakas na 
											idinugtong,--namamasid ko pong sa 
											maghapo'y hindi kayo umiimik at may 
											iniisip....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Katakot-takot na magmamasid ang 
											ginoong Alkalde!--ang biglang sinabi 
											sa&nbsp;isang kakaibang anyo ni Padre 
											Sibyla.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ito na ang aking ugali,--ang pautal 
											na sinabi ng frankiskano;--ibig ko 
											pang makinig kay sa magsalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang pinagsisikapang lagi ng 
											kamahalan po ninyo'y ang makinabang 
											at huwag mangulugi!--ang sinabi ng 
											alperes, na aglahi ang anyo ng 
											pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi inaring biro ang bagay na iyon 
											ni Padre Salvi; sandaling numingning 
											ang kanyang paningin, at saka 
											sumagot:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magaling ang pagkatalastas ng 
											ginoong alperes na sa mga araw na 
											ito'y hindi nga ako ang lalong 
											nakikinabang o nangungulugi!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi inalumana ng alperes ang dagok 
											na iyon sa pamamag-itan ng isang 
											kunua'y tawa, at winalang bahala ang 
											pasaring na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni, mga ginoo, hindi ko 
											mapagwari kung bakit 
											makapagsasalitaan ng mga 
											pakikinabang o mga pangungulugi,--ang 
											isinabat ng Alkalde;--ano ang 
											mawiwika sa atin ng mga magagandang 
											loob at matatalinong binibining 
											nangaritong nagbibigay unlak sa atin 
											ng kanilang pakikipanayam? Sa ganang 
											akin, ang mga dalaga'y tulad sa mga 
											taginting ng arpa ng kalangitan sa 
											gitna ng gabi! kinakailangang 
											pakaulinigin at sila'y pakinggan, at 
											ng ang mga kaayaayang tinig nilang 
											nagpapailanglang sa kalolowa sa 
											kalangitang kinarorooran ng walang 
											hanggan at ng lalong 
											kagandagandahan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naghahanay ang kamahalan po ninyo 
											ng mga matitimyas na sasay!--anang 
											eskribano ng&nbsp; buong&nbsp; galak, at 
											ininom niya at ng Alkalde ang alak 
											na na sa kanikanilang kopa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mangyaring hindi ko 
											gawin,--anang Alkalde, na pinapahid 
											ang kanyang mga labi;--kung hindi 
											laging gumagawa ng magnanakaw ang 
											kapanahunan, ay gumagawa naman ng 
											manunula. ng kabataan ko'y kumatha 
											ako ng mga tula, na hindi naman 
											masasama.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa makatuwid po'y naglilo ang 
											inyong kamahalan sa mga Musa upang 
											sumunod kay Themis!--ang sinaysay ng 
											ating 'korresponsal' na mahiligin sa 
											mga diosa ng panahong una.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pskh! anong ibig ninyong aking 
											gawin? Sa tuwi na'y naging hilig ko 
											ang aking mapagkilala ang lahat ng 
											kalagayan ng pamumuhay. Namumupol 
											ako kahapon ng mga bulaklak, ngayo'y 
											aking hawak naman ang tungkod ng 
											Hustisya at naglilingkod ako sa 
											sangkatauhan, bukas....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bukas ay ihahagis ng kamahalan po 
											ninyo ang tungkod na iyan sa apoy at 
											ng inyong mapainit ang maginaw na 
											dakong hapon ng buhay, at ang 
											kukunin po naman ninyo'y ang 
											katungkulang pagka ministro,--ang 
											idinugtong ni Padre Sibyla.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pskh! oo ... hindi ... ang maging 
											ministro'y hindi siyang lalong aking 
											pinakahahangad na kamtan: sino mang 
											walang karapata'y nagiging ministro. 
											Isang mainam na bahay sa dakong 
											timugan ng Espa&ntilde;a at ng matirahan 
											kung panahong tag-init, isang 
											malaking bahay sa Madrid at tahanan 
											at mga lupain sa Andalusia kung 
											panahong tag-lamig ... Hindi nga 
											masasabi sa akin ni Voltaire: 'Nous 
											n'avons jamais ete khez kes peuples 
											que pour nous y enrikhir et pour les 
											kalomnier'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang&nbsp; buong&nbsp; isip ng mga kawani ng 
											gobierno'y nagsalita ang Alkalde ng 
											isang katatawanan, kaya't nagtawanan 
											sila't ng bigyang kapurihan ang 
											gayong pagpapatawa; sila'y ginayahan 
											ng mga prayle, palibhasa'y hindi 
											nila talos na si Voltaire ay yaong 
											Voltaireng hindi mamakailang 
											kanilang sinumpa at inilagay sa 
											infierno. nguni, sapagkat 
											nalalaman ni Padre Sibyla kung sino 
											si Voltaire, siya'y magpakilang 
											galit, sa pagsasapantaha niyang 
											nagsalita ang Alkalde ng isang laban 
											o paglabag sa religion.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagsisikain naman sa isang 'kiosko' 
											ang mga batang lalaki, na ang 
											kanilang maestro ang sa kanila'y 
											nangungulo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gumagawa sila ng malaking kaingayan, 
											gayong sila'y mga batang filipino, 
											sapagkat ang karaniwan, kung ang 
											mga batang filipino'y na sa pagkain 
											at na sa harap ng ibang mga tao'y 
											hindi ang kagaslawan ang kanilang 
											nagiging kakulangan, kung di ang 
											kakimian. Ang isa'y nagkakamali ng 
											paggamit ng mga 'kubierto' at sa 
											gayo'y sinasala ng kalapit; dito'y 
											nagmumula ang isang pagmamatuwiran, 
											at ang dalawang nagtatalo'y 
											nagkakaroon ng kanikaniyang mga 
											kakampi: ang wika ng iba'y ang 
											kukhara, anang iba nama'y ang 
											tenedor o ang kukhillo, at sapagkat wala silang kinikilalang 
											kapwa batang lalong marunong kay sa 
											iba, doo'y nangagkakaingay ng di 
											sapala, o, sa lalong maliwanag na 
											sabi, sila'y nangagmamatuwirang 
											wangis sa pagtatalo ng mga teologo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mga magugulang ay 
											nangagkikindatan, nangagsisikuhan, 
											nangaghuhudyatan, at nababasa sa 
											kanilang mga pagngiti na sa sila'y 
											lumiligaya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba!--ang sabi ng isang babaeng 
											tagabukid sa isang matandang 
											lalaking nagdidikdik ng hitso sa 
											kanyang kalikot;--magpapari ang 
											aking si Andoy, kahi't aayaw ang 
											aking asawa. Tunay nga't mga dukha 
											kami, nguni't kami'y magsisipag sa 
											paghahanap buhay, at kami'y 
											magpapalimos kung kakailanganin. 
											Hindi nawawalan ng nagbibigay ng 
											salapi at ng makapagpari ang mga 
											mahihirap. Hindi ba sinasabi ni 
											hermano Mateo, taong hindi 
											nagsisinungaling, na si papa Sixto'y 
											isang pastol lamang ng kalabaw sa 
											Batangan? Tingnan na nga lamang 
											ninyo ang aking si Andoy, tingnan 
											ninyo siya kung di kamukha na ni San 
											Vicente!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At kumakayat ang laway ng mabait na 
											ina sa panonood sa kanyang anak na 
											hinahawakan ang tenedor ng dalawang 
											kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tulungan nawa siya ng Diyos!--ang 
											idinugtong ng matandang lalaki, na 
											nginunguya ang sapa;--kung maging 
											papa si Andoy, kami pa sa sa Roma 
											je!--je! nakalalakad pa akong 
											mabuti. At kung sakali't mamatay ako 
											... jeje!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag po kayong mabahala, inkong! 
											Hindi malilimot ni Andoy na tinuruan 
											ninyo siya ng paglala ng mga bilao 
											at ng dikin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay ang sabi mo Petra; ako ma'y 
											naniniwala ang anak mo'y nagkakaroon 
											ng mataas na katungkulan ... ang 
											kababaa'y patriarka. Hindi pa ako 
											nakakakita ng batang hinigit sa 
											kanya sa kadaliang natuto ng 
											hanap-buhay! Oo, oo, maaalaala na 
											niya ako, kung siya'y papa na u 
											obispo at maglibang sa paggawa ng 
											mga bilauhang gagamitin ng kanyang 
											tagapaglutong babae. Oo, ipagmimisa 
											nga niya ang aking kalolowa, jeje!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At taglay ng mabait na matanda ang 
											ganitong pag asa'y siniksikang 
											mainam ng maraming hitso ang kanyang 
											kalikot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung pakikinggan ng Diyos ang 
											aking mga pagsamo at magaganap ang 
											aking mga pag-asa, sasabihin ko kay 
											Andoy: 'Anak, pawiin mo sa amin ang 
											lahat ng kasalanan at ipadala mo 
											kami sa langit'. Hindi na tayo 
											mangangailangang magdasal, mag ayuno 
											o bumili pa ng mga bula. Maaari ng 
											gumawa ng mga kasalanan ang may 
											isang anak na santo papa!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Paparoonin mo siya sa bahay bukas, 
											Petra,--anang matandang lalaki na 
											totoong nagagalak;--tuturuan ko siya 
											ng pagkakayas ng nito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hmjo! aba! Ano po ba, inkong ang 
											pagkaalam ninyo? Inaakala po ba 
											ninyong iginagalaw pa ng mga papa 
											ang kanilang mga kamay? Ang kura 
											nga, gayong siya'y kura lamang, kaya 
											lamang nagpapagal ay kung nagmimisa, 
											pagka nagpapapihitpihit! Ang 
											arzobispo'y hindi na pumipihit, 
											paupo kung magmisa; kaya nga't ang 
											papa ... ang papa'y nakahiga kung 
											magmisa, at may abaniko pa! Ano po 
											ba ang isip ninyo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi isang kalabisan, Petra, ang 
											kanyang malaman kung paano ang 
											ginagawang paghahanda ng nito. 
											Mabuti na nga ang siya'y makapagbili 
											ng mga salakot at mga petaka at ng 
											huwag makailangang magpalimos na 
											gaya ng ginagawa rito ng kura sa 
											taon-taon sa pangalan nga papa. 
											Nahahabag akong makita ang isang 
											santong pulubi, kaya't aking 
											ibinibigay ang lahat kong nalimpok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit ang isang tagabukid at 
											nagsalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aking pinagtibay na, kumare, 
											magdodoktor ang aking anak, wala ng 
											magaling na gaya ng doktor!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Doktor! huwag nga kayong maingay, 
											kumpare;--ang sagot ni Petra;--wala 
											ng magaling na gaya ng magkura!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Cura? prr! Sumisingil ng maraming 
											salapi ang doktor; sila'y sinasamba 
											ng maysakit, kumare!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magnilaynilay kayo! Sukat ng 
											magpapihitpihit ng makaatlo o 
											makaapat ang kura at magsalita ng 
											'deminus pabiskum,' upang kanin ang 
											Diyos at tumangap ng salapi. 
											Sinasabi ng lahat sa kanya, pati ng 
											mga babae, ang kanilang mga lihim.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang doktor? At ano bang akala 
											ninyo sa doktor? Nakikita ng doktor 
											na lahat, pati ng itinatago ninyong 
											mga babae, pumupulso sa mga 
											dalaga.... Ibig kong maging doktor 
											isang linggo man lamang!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang kura? hindi ba nakikita ng 
											kura ang nakikita ng inyong doktor? 
											At magaling pa sa riyan! Nalalaman 
											na ninyo ang kasabihan; 'sa kura ang 
											matatabang inahing manok at gayon 
											din ang binting mabilog!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano, kumakain ba ang mga 
											manggagamot ng tuyong lawlaw? 
											nasasaktan ba ang mga daliri sa 
											pagdidildil ng asin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Narurumhan ba ang kamay ng kura na 
											gaya ng mga kamay ng manggagamot? ng 
											huwag magkagayo'y may malalaking 
											hakienda sila, at sakali't gumagawa, 
											gumagawang may musika at siya'y 
											tinutulungan pa ng mga sakristan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang kumumpisal kumare? Hindi ba 
											pagpapagal ang kumumpisal?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naku, ang pagpapagal na iyan! Ang 
											pagkaibig ninyong sa inyo'y 
											mangumpisal ang lahat ng tao! 
											Diyata't nagkakapagod at 
											nagkakapangpapawis pa nga tayo sa 
											pagkaibig nating masiyasat kung ano 
											ang mga gawa ng mga lalaki't mga 
											babae at kung ano ang mga gawa ng 
											ating mga kapit-bahay! Walang 
											ginagawa ang kura kung di maupo, at 
											pagdaka'y sinasabi na sa kanya ang 
											lahat; kung minsa'y nakakatulog, 
											datapuwa't sukat na ang maggawad ng 
											dalawa o tatlong benedicion upang 
											tayo'y maging anak uli ng Diyos! 
											Maanong maging kura na nga lamang 
											ako sa isang hapon ng kuaresma!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang ... ang magsermon? sasabihin 
											naman ninyo sa aking iya'y hindi 
											pagpapagod? Nakita na ninyo kung 
											paano ang pagpapawis ng kurang 
											malaki kaninang umaga!--ang 
											itinututol ng lalaking nakakaramdam 
											na siya'y nalulupig sa matuwiranan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang magsermon? Isang pagpapagal ba 
											ang magsermon? Saan naroon ang 
											inyong pag-iisip? Maanong 
											makapagsasalita na nga ako hanggang 
											tanghali, mula sa pulpito, na aking 
											makagalitan at mapagwikaan ang 
											lahat, na sino ma'y walang 
											makapangahas na tumutol, at 
											pagbabayaran pa ako sa gayong gawa! 
											Maanong maging kura na nga ako isang 
											umagang nangagsisimba ang mga may 
											utang sa akin! Pagmasdan ninyo kung 
											paano ang pagtaba ni Padre Damaso sa 
											kanyang kapagmumura at kapapalo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At dumarating nga naman si Padre 
											Damaso, taglay ang paglakad ng taong 
											mataba, na halos nakangiti, nguni't 
											sa isang anyong nagpapakilala ng 
											pangit niyang kaisipan, kaya't 
											pagkakita sa kanya ni Ibarra'y 
											nalito sa kanyang pagtatalumpati.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binati nila si Padre Damaso, bagaman 
											may halong pagtataka, datapuwa't 
											nagpakita ang lahat ng galak sa 
											kanyang pagdating, liban na lamang 
											kay Ibarra. Nangaghihimagas na at 
											bumubula na ang sa mga kopa ang 
											'khampa&ntilde;a'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naowi sa pangangatal ang ngiti ni 
											Padre Damaso, ng kanyang mamasdan si 
											Maria Clarang nakaupo sa dakong 
											kanan ni Crisostomo; nguni't umupo 
											siya sa isang silla sa tabi ng 
											Alkalde, at saka tumanong sa gitna 
											ng isang makahulugang katahimikan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May pinag-uusapan ba kayong ano 
											man, mga ginoo? Ipagpatuloy ninyo 
											ang salitaan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nangagtatalumpatian,--ang sagot, ng 
											Alkalde. Binabanggit ni ginoong 
											Ibarra ang lahat ng sa kanya'y 
											tumulong sa adhikang ikagagaling ng 
											madla, at sinasaysay ang nauukol sa 
											arkitekto, ng ang kamahalan pa 
											ninyo'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi nga ako nakakamuang ng 
											tungkol sa arquitektura,--ang 
											isinalabat ni Padre 
											Damaso,--datapuwa't tinatawanan ko 
											ang mga arkitekto at gayon din ang 
											mga tangang tumatakbo sa kanila. 
											Nariyan, ako ang gumuhit ng piano ng 
											simbahang iyan, at lubos sa 
											kagalingan ang pagsakagawa: ganyan 
											ang sabi sa akin ng isang ingles na 
											maglalako ng mga hiyas, na tumuloy 
											isang araw sa kumbento. Sukat ng 
											magkaroon ng dalawang daling noo 
											upang makagawa ng piano!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon man,--ang muling isinagot ng 
											Alkalde, ng mamasid niyang hindi 
											umiimik si Ibarra,--pagka nauukol na 
											sa mga tanging bahay, gaya na nga 
											baga ng isang eskuela, sa halimbawa, 
											nagkakailangan tayo ng isang 
											'perito' (isang taong pantas sa 
											paggawa ng ano man).</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano bang 'perito ni peritas'!--ang 
											sinabing malakas na palibak ni Padre 
											Damaso.--Ang nagkakailangan ng mga 
											'perito' ay isang 'perrito' (tuta o 
											maliit na aso)! Kinakailangang 
											maging hayop pa kay sa mga 'indio', 
											na gumagawang mag isa ng kanilang 
											mga bahay, upang hindi matutong 
											magpagawa ng apat na pader at saka 
											patungan sa ibabaw ng isang tangkil, 
											na siya ngang isang tunay na 
											eskuela!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tuminging lahat kay Ibarra, 
											datapuwa't ito'y bagaman lalong 
											namutla, nagpatuloy na parang 
											nakikipagsalitaan kay Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't dilidilihin po ninyong....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan po ninyo,--ang ipinagpatuloy 
											na sabi ng frankiskano, na ayaw 
											papagsalitain ang Alkalde,--tingnan 
											po ninyo kung paano ang ginawa ng 
											isang 'lego' namin, na siyang lalong 
											pinakahayop sa lahat naming mga 
											lego, na yumari ng isang magaling, 
											mabuti at murang hospital. Marunong 
											magpagawang magaling at hindi 
											nagbabayad kung di walong kuarta 
											lamang sa araw-araw sa bawa't isa sa 
											mga taong nanggagaling pa sa ibang 
											bayan. Nalalaman ng legong iyan kung 
											paano ang nauukol na pakikisama sa 
											mga 'indio', na hindi gaya ng 
											maraming mga haling at mga 
											'mesticillo', na nagpapasama sa mga 
											taong iyan sa pagbabayad sa kanila 
											ng tatlong bahagi o isang salapi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang wika po ba ninyo'y walong 
											kuarta lamang ang ibinabayad? Hindi 
											mangyayari!--Ibig ng Alkaldeng 
											baguhin ang lakad ng salitaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay po, at iyan ang dapat 
											uliranin ng mga nagpapanggap na 
											magagaling na mga kastila. Nakikita 
											na nga, na buhat ng mabuksan ang 
											Canal ng Suez ay sumapit dito ang 
											kahalayang asal. ng una, ng 
											kinakailangan nating lumigoy sa 
											Cabo, hindi nakararating dito ang 
											lubhang maraming; mga may masasamang 
											kaugalian, at hindi naman 
											nakapaglakbay roon ang mga iba upang 
											mangagasama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't Padre Damaso!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala na po ninyo kung ano ang 
											'indio'; bahagya pa lamang 
											nakakaalam ng kaunti ay 
											nagmamarunong na. Ang lahat ng mga 
											uhuging iyang napapasa Europa'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't pakinggan po ninyo!...--ang 
											isinasalabat ng Alkalde, na 
											nababalisa dahil sa masasakit na mga 
											pasaring na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magkakaroon sila ng wakas ayon sa 
											kanikanilang karapatan--ang 
											ipinagpatuloy na Padre 
											Damaso;--nakikita sa kalagitnaan ang 
											kamay ng Diyos, kinakailangang 
											maging bulag upang huwag mamasdan. 
											Tumatanggap na sa buhay pang ito ang 
											mga magulang ng gayong mga ahas ... 
											nangamamatay sa bilangguan je! je! 
											at masasabi nating walang sukat 
											na....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't hindi natapos ang 
											sinasabi. Sinusundan siya ng mata ni 
											Ibarrang nangingitimngitim ang pula 
											ng mukha sa malaking galit; at 
											pagkarinig ng pasaring sa kanyang 
											ama'y nagtindig, at sa isang lundag 
											ay ilinagpak ang kanyang batibot na 
											kamay sa ibabaw ng ulo ng sacerdote, 
											na natihaya at tulig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa lubos na pagkagulat at 
											pagkatakot, sino ma'y walang 
											nangahas mamagitna.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Layo kayo!--ang sigaw ng binata ng 
											tinig na kagulatgulat, at inabot ang 
											matalas na sundang samantalang 
											iniipit ng kanyang paa ang liig ng 
											prayle, na nahihimasmasan sa kanyang 
											pagkatulig;--ang aayaw mamatay ay 
											huwag lumapit!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagdirimlan si Ibarra: nangangatal 
											ang kanyang katawan umiinog sa 
											kinalalagyan ang kanyang mga matang 
											nangagbabala. Nagpumilit si Padre 
											Damasong bumangon at tumindig; 
											datapuwa't hinawakan siya sa liig ni 
											Ibarra, saka siya ipinagwas-wasan 
											hanggang sa siya'y mapaluhod at 
											mabaluktok:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Ibarra! ginoong Ibarra!--ang 
											pautal na sinabi ng ilan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't sino man, kahi man ang 
											alperes ay ayaw mangahas lumapit at 
											kanilang namamasdan ang kislap ng 
											sundang at nababalak nila ang lakas 
											at kalagayan ng binata. 
											Nangatitigagal na lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo'y diyan! hindi kayo 
											nangagsisiimik, ngayo'y ako ang 
											marapat na mang kumilos. Siya'y 
											iniilagan ko, dinala sa akin siya ng 
											Diyos, ang Diyos ang siyang humatol!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nahihirapan ng paghinga ang binata, 
											datapuwa't ang kanyang bisig na 
											basal ay nagpapatuloy ng pagpigil sa 
											frankiskano, na hindi makawala 
											kahi't nagpupumiglas ng di kawasa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tahimik na tumitibok ang aking 
											puso, hindi mabibigo ang aking 
											kamay!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At tumingin sa paligid niya't 
											nagsalita;--Makinig muna kayo, 
											mayroon bagang isa man lamang sa 
											inyo na umibig sa kanyang ama, na 
											nagtamin ng malalim na galit sa 
											kanyang pinagkakautangan ng buhay, 
											isa man lamang na ipinanganak sa 
											kahihiyan at sa kaimbihan?... Nakita 
											mo na? Nariring mo baga ang hindi 
											nila pag-imik na iyan? Sacerdote ng 
											isang Diyos ng kapayapaan, puspos 
											ang bibig mo ng kabanalan at 
											religion, at ang puso'y puno ng mga 
											karumhan, hindi mo marahil nalalaman 
											kung ano ang isang ama!... kung 
											ginugunita mo sana ang iyong ama! 
											Nakita mo na? Sa gitna ng karamihang 
											iyang pinawawalan mong halaga, wala 
											kahi't isa man lamang na katulad mo! 
											Nahatulan ka na!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang mga taong sa kanya'y 
											nakaliligid, sa pagkaisip nilang 
											doo'y gagawa ng isang kusang 
											pagpatay, sila'y nangagsikilos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lumayo 
											kayo!--ang muling isinigaw na 
											nagbabala ang tinig; ano? 
											nanganganib ba kayong dumham ko ang 
											aking kamay ng maruming dugo? Hindi 
											ba sinabi ko na sa inyong tiwasay na 
											tumitibok ang aking puso? Lumayo 
											kayo sa amin! Pakinggan ninyo mga 
											sacerdote, mga hukom, na ang&nbsp; 
											buong&nbsp; akala ninyo'y hindi kayo 
											kawangis ng ibang mga tao at 
											nagbibigay kayo sa inyong sarili ng 
											ibang mga katuwiran! 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Ang aking ama'y isang taong may 
											malinis na kapurihan, ipagtanong 
											ninyo diyan sa bayang lubos na 
											iginagalang ang pagaalaala sa kanya. 
											Ang aking ama'y isang mabait na 
											mayaman: inihandog niya ang kanyang 
											pagpapakahirap sa akin at sa 
											ikagagaling ng kanyang bayan. Laging 
											bukas ang kanyang bahay, laging 
											handa ang kanyang dulang sa 
											taga-ibang lupain o sa pinapanaw sa 
											kanyang kinagisnang lupa, na sa 
											udyok ng karalitaa'y tumatakbo sa 
											kanya! Siya'y mabuting kristiano: 
											lagi ng ginagawa niya ang kagalingan 
											at kailan ma'y hindi siya umapi sa 
											mahinang nagigipit at hindi siya 
											humabag sa na sa malaking karukhaan.... 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Binuksan niya sa taong sumasadalita 
											ang mga pintuan ng kanyang bahay, 
											pinaupo niya at pinakain sa kanyang 
											dulang at kanyang pinangalanang 
											kaibigan. Ano ang pagtumbas na sa 
											kanya'y ginawa? Siya'y pinaratangan, 
											pinag-usig, pinapanandata ng laban 
											sa kanya ang kamamangmangan at 
											siya'y pinag-usig hanggang sa 
											libingang pinagpapahingalayan ng mga 
											patay. At, hindi pa nagkakasiya sa 
											ganitong mga gawa'y pinag-uusig 
											naman ngayon ang anak na lalaki! 
											Ako'y tumakas sa kanya, iniilagan 
											kong siya'y aking makaharap ... 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Narinig ninyo siya kaninang umaga na 
											hindi pinagpakundanganan ang pulpito, 
											idinaliri ako sa haling na 
											pananampalataya ng mga taong hangal 
											sa bayan, nguni't hindi ako umimik. 
											ngayo'y naparito't ako'y hinahamit; 
											nagtiis ako sa hindi pag-imik na 
											inyong pinanggilalasan, datapuwa't 
											muling linait ang lalong 
											pinakamamahal ng lahat ng mga anak 
											sa kaibuturan ng kanilang alaala ... 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Kayong mga naririto, mga sacerdote, 
											mga hukom, nakita baga ninyo ang 
											pagpapakakasipag sa paggawa ng 
											matanda ninyong ama, at ng masunduan 
											ang inyong ikagagaling, mamatay sa 
											hapis ang amang iyan sa isang 
											bilangguan, na nagbubuntong hininga 
											sa pagmimithing kayo'y mayakap; na 
											humahanap ng isang taong sa kanyang 
											umaliw, nag iisa, may sakit, 
											samantalang kayo'y na sa ibang 
											lupain?... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Narinig ba ninyo pagkatapos na 
											siniraan ng puri ang kanyang 
											pangalan, nasumpungan baga ninyong 
											walang laman ang sa kanya'y 
											pinaglibingan ng pumaroon kayo at 
											ang talaga ninyo'y manalangin sa 
											ibabaw ng baunang iyon? Hindi? Hindi 
											kayo umiimik? kung gayo'y 
											hinahatulan ninyong tunay nga siyang 
											masama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iniangat ang bisig; datapawa't 
											maliksing tulad sa kabilisan ng 
											sinag ng liwanag, pagdaka'y 
											napagitna ang isang dalaga at 
											pinigil ng kanyang linalik na kamay 
											ang mapaghiganting bisig: ang 
											dalagang iyo'y si Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan siya ni Ibarra ng isang 
											titig na wari'y nanganganino ang 
											kasiraan ng isip. Unti unting lumuag 
											ang pagkahawak ng mga naninigas na 
											mga daliri ng kanyang mga kamay at 
											pinabayaang lumagpak ang katawan ng 
											frankiskano't ang sundang, tinakpan 
											ang mukha't tumakas na sinagal ang 
											karamihang tao.</font></p>
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