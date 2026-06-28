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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LIV. Lahat ng Lihim ay Nabubunyag</font></b></p>
											<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px">
											<b>
											<font face="Arial" style="font-size: 15pt" color="#800080">at Walang Di Nakakamit na Parusa</font></b></p>
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
											Ipinagbibigay alam ng kampana ang 
											oras ng pagdarasal sa hapon; 
											tumitigil ang lahat pagkaringig ng 
											taginting ng pagtawag ng religion, 
											iniiwan ang kanilang ginagawa't 
											nangagpupugay: inihihinto ng 
											magsasakang nanggagaling sa bukid 
											ang kanyang pag-awit, pinatitigil 
											ang mahinahong lakad ng kalabaw na 
											kanyang sinasakyan, at nagdarasal. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											N<font face="Arial" color="#333333">agkukruz ang mga babae sa gitna ng 
											daan at pinagagalaw na magaling ang 
											kanilang mga labi't ng sino ma'y 
											huwag mag-alinlangang sa kanilang 
											sila'y mapamintakasi; inihihinto ng 
											lalaki ang pag-amak sa kanyang manok 
											at dinarasal ang&nbsp;<i>Angelus</i>&nbsp;upang 
											sang-ayunan siya ng kapalaran; 
											nangagdarasal ng malakas sa mga 
											bahay ... nalulugnaw, nawawala ang 
											lahat ng ingay na hindi ang sa&nbsp;<i>Aba 
											Ginoong Maria</i>.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gayon ma'y nagtutumulin sa paglakad 
											sa daan ang kurang nakasombrero, na 
											ano pa't pinapagkakasala ang 
											maraming mga matatandang babae, at 
											lalo ng nakapagkakasala! na ang 
											tinutungo niya'y ang bahay ng 
											alperes. Inakala ng mga matatandang 
											babaeng panahon nang dapat nilang 
											itigil ang pagpapakibot ng kanilang 
											mga labi upang sila'y makahalik sa 
											kamay ng kura.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapuwa't hindi sila 
											pinansin ni Padre Salvi; hindi siya 
											nagtamong lugod ngayong ilagay ang 
											kanyang mabut-ong kamay sa ibabaw ng 
											ilong ng babaeng kristiana, upang 
											buhat diya'y padaus-using maimis 
											(ayon sa nahiwatigan ni Do&ntilde;a 
											Consolacion) sa dibdib ng magandang 
											batang dalaga, na yumuyukod sa 
											paghingi ng bendicion.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahil totoong mahalagang bagay nga 
											ang nakaliligalig sa kanyang 
											panimdim upang malimutan ng ganyan 
											ang kanyang sariling kagalingan at 
											ang kagalingan ng Iglesia!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Totoong dalidali ngang siya'y nanhik 
											sa hagdanan at tumawag ng&nbsp; buong&nbsp; 
											pagdudumali sa pinto ng bahay ng 
											alperes, na humarap na nakakunot ang 
											mga kilay, na sinusundan ng kanyang 
											kabiak (ng kanyang asawa), na 
											ngumingiting parang taga infierno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, padre kura! makikipagkita sana 
											ako sa inyo ngayon, ang kambing na 
											lalaki po ninyo'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May sadya akong totoong 
											mahalaga....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko maitutulot na palagi ng 
											iwasak niya ang bakod ... 
											papuputukan ko siya kung magbalik!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iya'y sakali't buhay pa kayo 
											hanggang bukas!--anang kura na 
											humihingal at patungo sa salas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano? inaakala po ba ninyong 
											mapapatay ako niyang taotaohang 
											pipitong buwan pa lamang ng 
											ipanganak? Lulusayin ko siya sa 
											isang sikad lamang!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umudlot si Padre Salvi at hindi 
											kinukusa'y itinungo ang paningin sa 
											paa ng alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At sino po ba ang inyong 
											sinasabi?--ang itinanong na 
											nangangatal</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ang sasabihin ko kung di iyang 
											napakahaling, na hinamon akong kami 
											raw ay magpatayan sa pamamag-itan ng 
											revolver, na ang layo'y sandaang 
											hakbang?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah!--huminga ang kura, at saka 
											idinugtong:--Naparito ako't may 
											sasabihin sa inyong isang bagay na 
											totoong madalian.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag na po kayong magsabi sa akin 
											ng ganyang mga bagay! Marahil iya'y 
											katulad ng sa dalawang bata!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kung di lamang naging langis ang 
											pang-ilaw at hindi sana napakarumi 
											ang&nbsp;<i>globo</i>, nakita disin ng 
											alperes ang pamumutla ng kura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang ating pag-uusapan ngayo'y ang 
											mahalagang bagay na nauukol sa buhay 
											ng kalahatan!--ang muling sinabi ng 
											kura ng marahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mahalagang bagay!--ang inulit ng 
											alperes na namutla; magaling po bang 
											magpatama ang binatang iyan?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi siya ang aking sinasabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y sino?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itinuro ng kura ang pinto, na 
											sinarhan ng alperes alinsunod sa 
											kanyang kinaugalian, sa pamamag-itan 
											ng isang sikad. Ipinalalagay ng 
											alperes na walang kabuluhan ang mga 
											kamay, at wala ngang mawawala sa 
											kanyang ano man kung maalis ang 
											kanyang dalawang kamay. Isang 
											tungayaw at isang atungal ang siyang 
											naging kasagutan buhat sa labas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hayop! biniyak mo ang aking 
											noo!--ang isinigaw ng asawa niya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayo'y iluwal na po ninyo!--ang 
											sinabi sa kura ng&nbsp; buong&nbsp; 
											kapanatagan ng loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinitigan ng kura ang alperes ng 
											malaon; pagkatapos ay tumanong 
											niyang tinig na pahumal at 
											nakayayamot na kaugalian ng 
											nangagsesermon:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakita po ba ninyo kung paano ang 
											aking pagparito, patakbo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Redios! ang&nbsp; buong&nbsp; isip 
											ko'y nagbubululos po kayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y tingnan ninyo,--ang 
											sinabi ng kura na hindi pinansin ang 
											kagaspangan ng asal ng alperes;--pagka nagkukulang ako ng 
											ganyan sa aking katungkulan, 
											maniwala kayo't may mabibigat na mga 
											kadahilanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano pa po?--ang itinanong ng 
											kausap na itinatadyak ang paa sa 
											tinutungtungan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huminahon kayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y ano't kayo'y 
											nagmamadali ng mainam sa pagparito?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit sa kanya ang kura't tumanong 
											ng matalinghaga:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala ... po ... ba ... kayong ... 
											nababalitaang ... ano ... man?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinakibit ng alperes ang kanyang mga 
											balikat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinagtitibay po ba ninyong wala 
											kayong natatalastas na anong ano 
											man?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig po ba ninyong ipaunawa sa akin 
											ang nauukol kay Elias na kagabi'y 
											itinago ng inyong sakristan 
											mayor?--ang itinanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi, hindi ko sinasabi ngayon ang 
											mga kathakathang iyan,--ang sagot ng 
											kurang nagpakita na ng 
											pagkayamot;--ang ibig kong sabihin 
											ngayo'y ang isang malaking panganib.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--P ...! kung gayo'y magsalita kayo 
											ng maliwanag!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba!--ang madalang na sinabi ng 
											prayle na may anyong pagpapawalang 
											halaga;--ngayo'y muli pa ninyong 
											makikita ang kahalagahan naming mga 
											prayle; katimbang ng isang 
											regimiento ang katapustapusang 
											uldog; kaya't ang kura'y ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ibinaba ang tinig at sinabi ng 
											matalinghagang pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakatuklas ako ng isang malaking 
											akalang panggugulo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumukso ang alperes at tinititigan 
											ang prayle sa malaking gulat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang kakilakilabot at mabuting 
											pagkakahandang munakalang taksil na 
											panggugulo, na sasambulat ngayon 
											ding gabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayon ding gabi!--ang biglang 
											sinabi ng alperes, na dinaluhong ang 
											kura; at tinakbo ang kanyang 
											revolver at sable na nakasabit sa 
											pader.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ang aking darakpin?, sino ang 
											aking darakpin?--ang sigaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huminahon po kayo, may panahon pa, 
											salamat sa aking pagdadalidaling 
											ginawa; hanggang sa a las ocho....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Babarilin ko silang lahat!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Makinig po kayo! Lumapit sa akin 
											ngayong hapon ang isang babae, na 
											hindi ko dapat sabihin ang pangalan 
											(sapagkat isang lihim ng konfesio) 
											at ipinahayag sa aking lahat. 
											Sasalakayin nila't kukunin ang 
											kuartel, pagka a las ocho, na hindi 
											magpapamalay, lolooban ang kumbento, 
											darakpin nila ang falua at papatayin 
											tayong lahat na mga kastila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tulig na tulig ang alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Walang sinabi sa akin ang babae 
											kung di ito lamang,--ang idinugtong 
											ng kura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala ng ibang sinabi? kung gayo'y 
											darakpin ko siya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko mapababayaan: ang hukuman 
											ng pangungumpisal ay siyang luklukan 
											ng Diyos na mahabagin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Walang Diyos at walang mahabaging 
											makapagliligtas! huhulihin ko ang 
											babaeng iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinisira po ninyo ang inyong isip. 
											Ang marapat po ninyong gawin ay 
											humanda; lihim ninyong 
											papagsandatahin ang inyong mga 
											sundalo, at ilagay ninyo sila sa 
											magaling na mapagbabakayan; padalhan 
											po ninyo ako ng apat na guwardiya sa 
											kumbento, at ipaunawa ninyo ang 
											mangyayari sa mga taga falua.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala rito ang falua! Hihingi ako ng 
											saklolo sa ibang mga&nbsp;<i>sekcion!</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag, sapagkat kung gayo'y 
											kanilang maiino, at hindi nila 
											ipatutuloy ang kanilang banta. Ang 
											lalong magaling ay mahuli nating 
											buhay sila at saka natin pasigawin, 
											sa makatuwid baga'y kayo ang 
											magpapasigaw sa kanila; hindi ako 
											dapat makialam sa bagay na ito, 
											sapagkat ako'y sacerdote. Dilidilihin 
											ninyo! sa mangyayaring ito'y 
											makatutuklas kayo ng mga&nbsp;<i>kruz</i>&nbsp;at 
											mga&nbsp;<i>estrella;</i>&nbsp;ang tanging 
											hinihingi ko'y papagtibayin lamang 
											na ako ang siyang sa inyo'y 
											nagsabi't ng makapaghanda.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Papagtitibayin, padre, 
											papagtitibayin, at hindi malayong sa 
											inyo'y mapaputong ang isang 
											mitr!--ang sagot ng alperes na 
											nagagalak, at tinitingnan ang mga 
											mangas ng kanyang suut na damit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipaasahan kong magpapadala kayo sa 
											akin ng apat na guwardiya na iba ang 
											pananamit, eh?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang nangyayari ang mga bagay 
											na ito'y nagtatatakbo ang isang tao 
											sa daang patungo sa bahay ni 
											Crisostomo at dalidaling pumapanhik 
											sa hagdanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nariyan ba ang ginoo?--ang tanong ng 
											tinig ni Elias sa alila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Na sa kanyang gabinete at may 
											ginagawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa nais ni Ibarrang malibang ang 
											kanyang pagkainip sa paghihintay ng 
											oras na makapagpapaliwanagan kay 
											Maria Clara'y gumagawa sa kanyang 
											laboratorio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah! kayo po pala, Elias?--ang 
											biglang sinabi;--kayo ang sumasaaking 
											isip, nalimutan ko kahapong itanong 
											sa inyo ang pangalan niyong 
											kastilang may bahay na kinatitirahan 
											ng inyong nunong lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po nauukol sa akin, ginoo....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagmasdan po ninyo,--ang 
											ipinagpatuloy ni Ibarra, na hindi 
											nahihiwatigan ang pagkabalisa ng 
											binata, at inilapit sa ningas ang 
											isang kaputol na kawayan; nakatuklas 
											ako ng isang dakilang bagay; hindi 
											nasusunog ang kawayang ito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po ang kawayan ang dapat 
											nating lingunin ngayon; ang dapat 
											ninyong gawin ngayo'y iligpit ang 
											inyong mga papel at kayo'y tumakas 
											sa loob ng isang minuto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagmasdan ni Ibarra si Elias na 
											nagtataka, at ng makita sa kanyang 
											pagmumukha ang anyong hindi nag 
											aaglahi, kanyang nabitiwan ang bagay 
											na hawak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sunugin po ninyo ang lahat na 
											makapapahamak sa inyo at sa loob ng 
											isang oras ay lumagay kayo sa isang 
											lugar na lalong panatag.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At bakit?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inyo pong sunugin ang lahat ng 
											papel na inyong sinulat o ang 
											isinulat sa inyo; ang lalong walang 
											kahuluga'y kanilang masasapantahang 
											masama ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't bakit?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit? sapagkat bago kong 
											natuklasan ang isang munakalang 
											panggugulo na kayo ang ipinalalagay 
											na may kagagawan at ng kayo'y 
											ipahamak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang munakalang panggugulo? at 
											sino ang may kagagawan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko nangyaring nasiyasat kung 
											sino ang may kagagawan; bagong 
											kapakikipagsalitaan ko lamang sa isa 
											sa mga kulang palad na sa bagay na 
											iya'y pinagbayaran, na hindi ko 
											nangyaring naakit na huwag gumawa ng 
											gayon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At iyan, hindi po ba sinabi sa inyo 
											kung sino ang sa kanya'y nagbayad?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinabi po, at pinapangako akong 
											aking pakaingatan ang lihim, sinabi 
											sa aking kayo raw po.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diyos ko!--ang biglang sinabi ni 
											Ibarra, at siya'y nagulomihanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo, huwag po kayong 
											mag-alinlangan, huwag nating 
											sayangin ang panahon, pagka't 
											marahil matuloy ngayong gabi rin ang 
											munakalang panggugulo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tila mandin hindi siya nariringig ni 
											Ibarrang nakadilat ng mainam at naka 
											kapit sa ulo ang mga kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mangyayaring mapahinto ang 
											kanilang gagawin,--ang 
											ipinagpatuloy. ni Elias,--wala ng 
											magagawa ng ako'y dumating, hindi ko 
											kilala ang kanilang mga pinuno ... 
											lumigtas po kayo, ginoo, 
											magpakabuhay kayo, sa ikagagaling ng 
											inyong bayan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Saan ako tatakas? Hinihintay ako 
											ngayong gabi!--ang biglang sinabi ni 
											Ibarra na si Maria Clara ang 
											iniisip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa alin mang bayan, sa Maynila, sa 
											bahay ng sino mang punong may 
											kapangyarihan, nguni't sa ibang 
											lugar, ng hindi nila masabing kayo 
											ang namumuno sa panggugulo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kung ako rin ang magkanulo ng 
											munakalang panggugulo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo ang magkakanulo?--ang biglang 
											sinabi ni Elias, na siya'y 
											tinititigan at nilalayuan ng 
											paurong; malalagay po kayong taksil 
											at duwag sa mga mata ng mga 
											manggugulo, at mahina ang loob sa 
											mga mata ng mga iba; wiwikaing 
											inumangan ninyo sila ng isang silo 
											at ng kayo'y magtamo ng karapatan, 
											mawiwikang ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't ano ang dapat kong 
											gawin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinabi ko na sa inyo: pugnawin ang 
											lahat ninyong mga papel na nauukol 
											sa inyong buhay, at tumakas at 
											maghintay ng mga mangyayari....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At si Maria Clara?--ang sigaw ng 
											binata;--hindi, mamatay na muna ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinilipit ni Elias ang sariling 
											kamay at nagsabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y inyong ilagan man 
											lamang ang dagok, maghanda kayo sa 
											pananagot kung kayo'y isumbong na 
											nila!!!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumingap sa paligid niya si Ibarrang 
											ang anyo'y natutulig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y tulungan po ninyo ako; 
											diyan sa mga karpetang iya'y may mga 
											sulat ako ng aking familia; piliin 
											ninyo ang sa aking ama na siyang 
											makapapahamak sa akin marahil. 
											Basahin po ninyo ang mga firma.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ang binata'y tulig, hibang, ay 
											binubuksa't sinasarhan ang mga 
											kajon, nagliligpit ng mga papel, 
											dalidaling binabasa ang mga sulat, 
											pinupunit ang mga iba, ang mga iba 
											nama'y itinatago, dumarampot ng mga 
											aklat, binubuksan ang mga dahon at 
											iba pa. Gayon din ang ginagawa ni 
											Elias, bagaman hindi totoong 
											natutulig, nguni't gayon din ang 
											pagdadalidali; datapuwa't huminto, 
											nangdilat, pinapagbiling-biling ang 
											papel na hawak at tumanong na 
											nangangatal ang tinig:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala po ba ng inyong familia 
											si don Pedro Eibarramendia?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mangyari pa baga!--ang isinagot ni 
											Ibarra, na nagbubukas ng isang kajon 
											at kinukuha roon ang isang buntong 
											mga papel; siya ang aking nuno sa 
											tuhod!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inyo po bang nuno sa tuhod si don 
											Pedro Eibarramendia?--ang muling 
											itinanong ni Elias, na namumutla't 
											sirang sira ang mukha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo,--ang 
											isinagot ni Ibarra, na nalilibang; 
											pinaikli namin ang apellido sapagkat napakahaba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya 
											po ba'y vaskongado?--ang inulit ni 
											Elias at lumapit sa kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Vaskongado, nguni't ano po ang 
											nangyayari sa inyo?--ang itinanong na 
											nanggigilalas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itinikom ni Elias ang kanyang mga 
											daliri, idiniin sa kanyang noo at 
											tinitigan si Crisostomo, na umudlot 
											ng kanyang mabasa ang anyo ng mukha 
											ni Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman po ba ninyo kung sino si 
											don Pedro Eibarramendia?--ang 
											itinanong na nanggigitil.--Si don 
											Pedro Eibarramendia'y yaong imbing 
											nagparatang sa aking nunong lalaki 
											at may kagagawan ng lahat ng mga 
											sakunang nangyari sa amin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan siya ni Crisostomong 
											nanglulumo, datapuwa't ipinagpag ni 
											Elias ang kanyang bisig, at sinabi 
											sa kanya ng isang mapait na tinig na 
											doo'y umaatungal ang nagbabagang 
											galit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masdan ninyo akong magaling, masdan 
											ninyo ako kung ako'y naghirap, at 
											kayo'y buhay, sumisinta kayo, kayo'y 
											may kayamanan, bahay, 
											kinaalang-alanganan! nabubuhay 
											kayo!... kayo'y nabubuhay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At hibang na tinungo ang ilang mga 
											sandatang tipon, nguni't bahagya pa 
											lamang nakahugot ng dalawang sundang 
											ay kusang binitiwan, at tiningnang 
											wari'y sira ang isip si Ibarra, na 
											nananatiling hindi kumikilos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba!--ano ang aking gagawin?--ang 
											ibinulong, at saka tumakas at iniwan 
											ang bahay na iyon.</font></p>
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
										</font>
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