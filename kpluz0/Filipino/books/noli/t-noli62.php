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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LXII. Pagpapaliwanag ni Padre Damaso</font></b></p>
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
											Naging walang kabuluhang matimbon sa 
											ibabaw ng isang mesa ang mga 
											mahahalagang handog sa pagkakasal; 
											kahi't ang mga brillante na nasa 
											kanilang mga&nbsp;<i>estukhe</i>&nbsp;na 
											terkiopelong azul, ang mga bordado 
											mang pinya, ang mga pieza man ng 
											sutla ay hindi nakaaakit sa mga 
											paningin ni Maria Clara. Tinitingnan 
											ng dalaga, na hindi nakikita at 
											hindi binabasa ang pamahayagang 
											nagbabalita ng pagkamatay ni Ibarra, 
											na nalunod sa dagatan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Caginsagunsa'y naramdaman niyang 
											dumarapo sa ibabaw ng kanyang mga 
											mata ang dalawang kamay, tinatangnan 
											siya at isang masayang tinig, ang 
											kay Padre Damaso, ang sa kanya'y 
											nagsasalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ako? sino ako?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumukso si Maria Clara sa kanyang 
											upuan at pinagmasdan siyang may 
											malaking takot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tangaria, natakot ka ba, ha? Hindi 
											mo ako hinihintay, ano? Talastasin 
											mong naparito akong galing sa mga 
											lalawigan upang humarap sa iyong 
											kasal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At lumapit na taglay ang isang ngiti 
											ng ligaya, at inilahad kay Maria 
											Clara ang kamay at ng hagkan. 
											Lumapit si Maria Clarang nangangatal 
											at ilinapit ng&nbsp; buong&nbsp; paggalang ang 
											kamay na iyon sa kanyang mga labi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa iyo, 
											Maria?--ang tanong ng frankiskano, na 
											nawalan ng masayang ngiti at 
											napuspos ng balisa;--malamig ang 
											kamay mo, namumutla ka ... may sakit 
											ka ba, bunso ko?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At hinila ni Padre Damaso si Maria 
											Clara sa kanyang kandungang taglay 
											ang isang pagliyag na hindi 
											nasasapantaha nino mang kanyang 
											makakaya, tinangnan ang dalawang 
											kamay ng dalaga, at siya'y tinanong 
											sa pamamag-itan ng titig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala ka na bang katiwala sa iyong 
											inaama?--ang itinanong na ang anyo'y 
											naghihinananakit mandin;--hala umupo 
											ka rito't saysayin mo sa akin ang 
											mga maliliit na bagay na isinasama 
											ng iyong loob, gaya ng dating 
											ginagawa mo sa akin ng panahong ikaw 
											ay musmos pa, pagka nakakaibig kang 
											gumawa ng mga mu&ntilde;ekang pagkit. 
											Nalalaman mo ng magpakailan man ay 
											minamahal kata ... kailan ma'y hindi 
											kata kinagalitan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nawala ang magaspang at bugal-bugal 
											na tinig ni Padre Damaso at ang 
											humalili ay mairog na anyo ng 
											pananalita. Nagpasimula si Maria 
											Clara ng pag-iyak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tumatangis ka ba, anak ko? bakit ka 
											ba umiiyak? Nakipagkagalit ka ba kay 
											Linares?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtakip ng mga tainga si Maria 
											Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag sana ninyo siyang banggitin 
											... ngayon!--ang sigaw ng dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan siya ni Padre Damasong 
											puspos ng pagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aayaw ka bang ipagkatiwala sa akin 
											ang iyong mga lihim? Hindi ba laging 
											pinagsikapang kong bigyang katuparan 
											ang bawa't iyong maibigan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itiningala ng dalaga sa kanya ang 
											mga matang puno ng mga luha, 
											sandaling siya'y tinitigan, at 
											muling tumangis ng malaking 
											kapaitan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang tumangis ng ganyan, anak 
											ko, sapagkat nagbibigay sakit sa 
											akin ang iyong mga luha! Saysayin mo 
											sa akin ang iyong mga 
											ipinagpipighati; makikita mo kung 
											tunay na minamahal ka ng iyong 
											inaama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahang lumapit sa kanya si Maria 
											Clara, lumuhod sa kanyang paanan, 
											itiningala sa kanya ang mukhang 
											napapaliguan ng luha, at saka sinabi 
											sa kanya ng tinig na bahagya ng 
											mawatasan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iniibig po ba ninyo ako?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Musmos!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y ... ampunin ninyo ang 
											aking ama at huwag po ninyo akong 
											ipakasal!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At saka sinabi ng dalaga ang huling 
											pagkikita nila ni Ibarra, nguni't 
											inilingid niya ang lihim ng kanyang 
											pagiging tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bahagya nang makapaniwala si Padre 
											Damaso sa kanyang nariringig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Samantalang siya'y buhay,--ang 
											ipinatuloy ng dalaga,--inakala kong 
											lumaban, naghihintay ako, ako'y 
											umaasa! Ibig kong mabuhay upang 
											makaringig ako ng mga balitang 
											tungkol sa kanya ... datapuwa't 
											ngayong siya'y pinatay, wala na 
											ngang kadahilanan upang mabuhay 
											ako't magkasakit!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinabi niya ang mga salitang ito ng 
											madalang, mahina ang tinig, banayad, 
											walang luha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't tanga, hindi ba 
											makalilibong magaling si Linares kay 
											...?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nang buhay pa siya'y makapag-aasawa 
											ako ... inaakala kong magtanan 
											pagkatapos ... walang hinahangad ang 
											aking ama kung di ang 
											pakikikamag-anak! ngayong patay na 
											siya, sino ma'y hindi makatatawag sa 
											aking esposa ... Nang buhay pa 
											siya'y mangyayaring ako'y 
											magpakasama, malalabi sa akin ang 
											saya ng loob sa pagkaalam na siya'y 
											buhay pa at marahil maaalaala ako; 
											ngayong siya'y patay na ... ang 
											kumbento o ang libingan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Palibhasa'y totoong matindi ang 
											pananalita ng dalaga, nawala kay 
											Padre Damaso ang masayang anyo at 
											naggunamgunam.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lubha bang malaki ang pag-ibig mo 
											sa kanya?--ang itinanong ng pautal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi umimik si Maria Clara. 
											Inilungayngay ni Padre Damaso sa 
											kanyang dibdib ang kanyang ulo at 
											hindi umimik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Anak ko!--ang biglang sinabi ng 
											tinig na sira;--patawarin mo ako, na 
											hindi ko sinasadya'y aking 
											ipinahamak ang iyong kaligayahan. 
											Ang mangyayari sa iyo sa hinaharap 
											ang aking iniisip, minimithi ko ang 
											iyong kaligayahan. Paano ang aking 
											pagpapahintulot na pakasal ikaw sa 
											isang taga rito, upang ikaw ay aking 
											mapanood na esposang kahabaghabag at 
											inang kulang palad? </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi ko maialis 
											sa iyong ulo ang iyong pagsinta, 
											kaya't humadlang ako ng boo kong 
											lakas, ginawa ko ang lahat ng lihis 
											sa katuwiran, dahil sa iyo, sa iyo 
											lamang dahil. Kung ikaw ay naging 
											asawa niya, tatangis ka pagkatapos, 
											dahil sa kalagayang pagka inianak 
											dito ng asawa mo, na laging 
											nabibingit sa lahat ng pag-api't 
											pagpapahirap na walang kalasag sa 
											pagsasanggalang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kung maging ina ka na'y tatangisan 
											mo ang kasawiang palad ng iyong mga 
											anak; kung sila'y papag-aralin mo't 
											ng dumunong, inihahanda mo sa kanila 
											ang masaklap na mararating; magiging 
											kaaway sila ng religion, at kung 
											magkagayo'y makikita mo sila sa 
											pagkabitay o sa pagkapatapon; kung 
											pabayaan mo namang mangmang, 
											makikita mo namang sila'y 
											tinatampalasan at sumasakaimbihan! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi ko nga 
											mangyaring maitulot! Dahil dito'y 
											inihahanap kata ng isang asawang 
											makapaghahandog sa iyo ng pagka 
											inang maligaya ng mga anak na 
											makapag-uutos at hindi 
											mapag-uutusan, na makapagpaparusa't 
											hindi magdaralita.... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nalalaman kong 
											mabait nga ang yong katoto buhat sa 
											kamusmusan, minamahal ko siya't 
											gayon din ang kanyang ama, 
											datapuwa't pinagtamnan ko sila ng 
											galit, mula ng makita kong sila ang 
											magiging dahil ng iyong kasawaliang 
											palad, sapagkat kata'y minamahal, 
											kata'y pinakasisinta, kata'y iniibig 
											na kawangis ng pag-ibig sa isang 
											anak; walang umiirog sa akin kung di 
											ikaw na nga lamang; napanood ko ang 
											iyong pag-laki; hindi nakararaan ang 
											isang oras na hindi kata inaalaala; 
											napapanaginip ko ikaw; ikaw ang 
											tanging katuwaan ko....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At tumangis si Padre Damasong tulad 
											sa isang musmos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayon, kung ako'y inyong 
											minamahal, huwag po sanang ipahamak 
											ninyo ako magpakailan man; patay na 
											siya, ibig kong mag-monja!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itinuon ng matanda ang noo sa 
											kanyang kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mag-monja, mag-monja!--ang inulit 
											ulit.--Hindi mo nalalaman, anak ko, 
											ang pamumuhay, ang talinghagang 
											nagkukubli sa loob ng mga pader ng 
											kumbento, hindi mo nalalaman! 
											Makalilibong iniibig kong mapanood 
											kong ikaw ay nagkakasakit sa mundo, 
											kay sa makita ko ikaw na nakukulong 
											sa kumbento. Sa mundo'y mariringig 
											ang iyong mga daing, doo'y wala kung 
											di ang mga pader ... Ikaw ay 
											maganda, totoong maganda, hindi ka 
											sumilang sa maliwanag upang ikaw ay 
											masok sa pag-momonja, upang maging 
											esposa ka ni Cristo! Maniwala ka sa 
											akin, anak ko, kinakatkat na lahat 
											ng panahon; makalilimot ka kung 
											malaon, iibig ka, iibig ka sa asawa 
											mo ... kay Linares.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--O ang kumbento o ... ang 
											kamatayan!--ang inulit ni Maria 
											Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang kumbento, ang kumbento o ang 
											kamatayan!--ang mariing sabi ni Padre 
											Damaso.--Maria, matanda na ako, hindi 
											na mangyayaring tumagal pa ang aking 
											pagkakalinga sa iyo't sa iyong 
											kapanatagan.... Humirang ka ng ibang 
											bagay, humanap ka ng ibang 
											sisintahin, ibang binata, kahi't na 
											sino, datapuwa't huwag lamang ang 
											kumbento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang kumbento o ang kamatayan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diyos ko, Diyos ko!--ang isinigaw ng 
											sacerdote, na tinakpan ng mga kamay 
											ang ulo;--pinarurusahan mo ako, anong 
											gagawin! datapuwa't kalingain mo ang 
											aking anak na babae!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At liningon ang dalaga:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig mong maging monja? magiging 
											monja ka; aayaw akong mamatay ikaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hinawakan ni Maria Clara ang kanyang 
											dalawang kamay, pinisil, hinagkan at 
											lumuhod.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inaama ko, inaama ko!--ang 
											inulit-ulit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umalis pagkatapos si Padre Damasong 
											mapanglaw, nakatungo at nagbubuntong 
											hininga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diyos, 
											Diyos, tunay ngang nabubuhay ka, 
											yamang ako'y iyong pinarurusahan! 
											nguni't manghiganti ka sa akin at 
											huwag mong pahirapan ang walang 
											kasalanan, iligtas mo ang aking 
											anak!</font></p>
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