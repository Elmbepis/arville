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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg')">

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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXI. Kasaysayan ng Buhay ng Isang Ina</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<div class="quote" style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;">
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														<i>
														<span style="font-size: 13pt">
														Walang tinutungo sa 
														kanyang paglakad,</span></i></font><span style="font-size: 13pt"></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														<i>walang linalayon sa 
														linipadlipad,</i></font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														<i>susumandali ma'y di 
														napapanatag.</i></font></div>
												</div>
												<div class="center">
													<p align="justify" style="margin: 0 80px">
													</span>
													<font face="Arial" color="#333333">
													<i>
													<span style="font-size: 13pt">
													(Alaejos)</span></i></font></div>
											</div>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tumatakbo si Sisang patungo sa 
											kanyang bahay, taglay iyong 
											kaguluhan ng bait na nangyayari sa 
											ating katauhan, pagka sa gitna ng 
											isang kasakunaan ay wala sino mang 
											nagmamalasakit sa atin at sa ati'y 
											tumatakas ang mga pag-asa. Kung 
											nagkakagayo'y anaki'y dumidilim na 
											lahat sa ating paligid, at sakali't 
											makakita tayo ng isang maliit na 
											ilaw sa malayo, tinatakbo natin ang 
											ilaw na iyon, pinag-uusig natin, at 
											hindi natin alumana kahi't makitang 
											sa kalagitnaan ng landas ay may 
											isang malalim na bangin.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Ibig ng inang iligtas ang kanyang 
											mga anak, nguni't paano? Hindi 
											itinatanong ng mga ina ang gagawing 
											mga paraan, pagka nanukol sa 
											kanilang mga anak.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tumatakbong nagsisikip ang dib-dib, 
											palibhasa'y pinag-uusig ng mga 
											guniguning kalagimlagim. Narakip na 
											kaya ang anak niyang si Basilio? 
											Saan tumakas ang kanyang anak na si 
											Crispin?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang malapit na siya sa kanyang 
											bahay ay kanyang natanawan ang mga 
											kapakete ng dalawang sundalong na sa 
											ibabaw ng bakuran ng kanyang 
											halamanan. Hindi mangyayaring 
											maisaysay kung ano ang dinamdam ng 
											kanyang puso: nalimutan niya ang 
											lahat. Hindi kaila sa kanya ang 
											kanpangahasan ng mga taong iyong 
											hindi nangagpipitagan kahi't sa 
											lalong mayayaman sa bayan, ano kaya 
											ang mangyayari sa kanya at sa 
											kanyang mga anak na pinagbibintangan 
											nanganakaw? Hindi mga tao ang mga 
											guwardiya sibil, sila'y mga 
											guwardiya sibil lamang: hindi nila diniringig 
											ang mga panghihimanhik at sila'y 
											bihasang makapanood ng mga luha.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi sinasadya'y itinaas ni Sisa 
											ang kanyang mga mata sa langit, at 
											ang langit ay ngumingiti ng 
											kaayaayang kaliwanagan; lumalango'y 
											ang ilang maliliit at mapuputing 
											alapaap sa nanganganinag na azul. 
											Huminto siya upang pigilin ang 
											pangangatal na lumalaganap sa 
											kanyang&nbsp; buong&nbsp; katawan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Iniiwan na ng mga sundalo ang 
											kanyang bahay at sila'y walang 
											kasama; wala silang hinuli kung di 
											ang inahing manok na pinatataba ni 
											Sisa. Nakahinga siya at lumakas ang 
											kanyang loob.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Pagkababait nila at pagkagaganda ng 
											kanilang mga kalooban!-ang ibinulong 
											na halos umiiyak sa katowaan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Kahit sunugin ng mga sundalo ang 
											kanyang bahay, huwag lamang piitin 
											nila ang kanyang mga anak, ay sila'y 
											pakapupuspusin din niya ng 
											pagpupuri.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Muling tinitigan niya, sa 
											pagpapasalamat, ang langit na 
											pinagdaraanan ng isang kawan ng mga 
											tagak, iyang matutuling mga alapaap 
											ng mga langit ng Filipinas, at 
											sapagkat nanag-uli sa kanyang puso 
											ang pananalig ay ipinagpatuloy niya 
											ang paglakad.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang malapit na si Sisa sa mga 
											katakot-takot na mga taong yao'y 
											nagpalingaplingap sa magkabikabila 
											at nagkokonowang hindi niya nakikita 
											ang kanyang inahing manok na 
											pumipiyak at humihinging saklolo. 
											Bahagya pa lamang nangakakaraan sa 
											kanyang tabi ay nag-akala siyang 
											tumakbo, nguni't pinigil ang tulin 
											ng kanyang paglakad ng pagiingat na 
											baka siya'y maino.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi pa siya nakalalayo ng malaki 
											ng marinig niyang siya'y kanilang 
											tinatawag ng&nbsp; buong&nbsp; kabangisan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi kinukusa'y lumapit si Sisa, at 
											naramdaman niyang hindi niya 
											maigalaw ang kanyang dila sa takot 
											at natutuyo ang kanyang lalamunan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Sabihin mo sa amin ang katotohanan 
											o kung hindi itatali ka namin sa 
											kahoy na iyon at papuputukan ka 
											namin ng dalawa!--anang isa sa 
											kanilang may pagbabala ang tunog ng 
											boses.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tumingin ang babae sa dakong 
											kinalalagyan ng kahoy.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ikaw ba ang ina ng mga magnanakaw, 
											ikaw?--ang tanong naman ng isa.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ina ng mga magnanakaw!--ang di 
											sinasadya'y inulit ni Sisa.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Saan naroon ang salaping iniuwi sa 
											iyo kagabi ng iyong mga anak?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ah, ang salapi!...</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Huwag mong itanggi ang salaping 
											iyan, sapagkat lalong mapapasama 
											ikaw!--ang idinugtong ng isa. 
											Naparito kami't ng dakpin ang iyong 
											mga anak; ang pinakamatanda'y 
											nakatanan sa amin, saan mo itinago 
											ang bunso?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Huminga si Sisa ng maringig ang 
											gayong sabi.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ginoo!--ang isinagot--malaon na pong 
											araw na hindi ko nakikita ang aking 
											anak na si Crispin: ang&nbsp; buong&nbsp; 
											akala ko'y masusumpungan ko siya 
											kaninang umaga sa kumbento, doo'y 
											ang sinabi lamang sa aki'y....</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Nagsuliapan ang dalawang sundalo ng 
											makahulugan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Magaling!--ang biglang sinabi ng isa 
											sa kanila; ibigay mo sa amin ang 
											salapi, at hindi ka na namin 
											babagabagin.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ginoo!--ang isinamo ng kulang 
											palad na babae!--ang aking mga anak 
											ay hindi nagnanakaw kahi't 
											madayukdok; bihasa kaming magutom. 
											Hindi nag-uuwi sa akin si Basilio 
											kahi't isang kuarta; halughugin 
											ninyo ang&nbsp; buong&nbsp; bahay, 
											at kung kayo'y makasumpong kahi't 
											sisikapat man lamang, gawin ninyo sa 
											amin ang bawa't maibigan. Caming mga 
											dukha ay hindi magnanakaw!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kung gayon--ang ipinagpatuloy ng 
											sundalo ng madalang na pananalita, 
											at kanyang tinititigan ang mga mata 
											ni Sisa,--ikaw ay sumama sa amin; 
											pagsisikapan na ng iyong mga anak na 
											humarap at isisipot ang salaping 
											ninakaw: Sumama ka sa amin!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ako? sumama ako sa inyo?--ang 
											ibinulong ng babae na umudlot at 
											minamasdan ng&nbsp; buong&nbsp; pagkagulat ang 
											mga pananamit ng sundalo.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--At bakit hindi?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ah! mahabag kayo sa akin!--ang 
											ipinamanhik na halos 
											lumuluhod.--Totoong ako'y mahirap; 
											wala akong ginto o hiyas man lamang 
											na sukat maialay sa inyo: nakuha na 
											ninyo ang aking tanging pag-aari, 
											ang inahing manok na inakala ko 
											sanang ipagbili ... dalhin na ninyo 
											ang lahat ng inyong masumpong sa 
											aking dampa; nguni't pabayaan na 
											ninyo rito akong pumayapa; pabayaan 
											na ninyong mamatay ako rito!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Sulong na! kinakailangang sumama ka 
											sa amin; at kung aayaw kang sumama 
											ng sa magalingan, ikaw ay gagapusin 
											namin.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tumangis si Sisa ng kapaitpaitan. 
											Hindi nababagbag ang loob ng mga 
											taong iyon.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Ipaubaya man lamang ninyong ako'y 
											mauna ng malayo-layo!--ang 
											ipinakiusap ng maramdaman niyang 
											siya'y tinatangnan ng&nbsp; buong&nbsp; 
											kalupitan at siya'y itinutulak.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Naawa ang dalawang sundalo at 
											nag-usap sila ng marahan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Hala!--ang wika ng isa--sapagkat 
											buhat dito hanggang sa pumasok tayo 
											sa bayan ay makatatakbo ka, ikaw ay 
											lalagay sa pag-itan naming dalawa. 
											Kung naroroon na tayo, 
											makapagpapauna ka sa amin ng may mga 
											dalawampung hakbang; nguni't 
											mag-ingat ka! huwag kang papasok sa 
											alin mang tindahan at huwag kang 
											hihinto. Hala, lakad na at magmadali 
											ka!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nawal-ang kabuluhan ang mga pagsamo, 
											nawal-ang kabuluhan ang mga 
											pangangatuwiran, hindi pinansin ang 
											mga pangako. Sinasabi ng mga 
											sundalong lumalagay na sila sa 
											panganib at malabis ng totoo ang 
											kanilang ipinagkakaloob.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang malagay na siya sa gitna ng 
											dalawa'y naramdaman niyang siya'y 
											namamatay ng hiya. Tunay nga't wala 
											sino mang lumalakad sa daan, nguni't 
											ang hangin at ang liwanag ng araw? 
											Ang tunay na kahihiya'y nakakakita 
											ng tumitingin sa alin mang dako. 
											Tinakpan ng panyo ang mukha, at sa 
											paglakad niyang walang nakikitang 
											ano man ay tinangisan ng walang imik 
											ang kanyang pagkaamis. 
											</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Napagtatalastas niya ang kanyang 
											kahirapan, nalalaman niyang sa 
											kanya'y wala sino mang tumitingin at 
											sampu ng kanyang asawa'y hindi siya 
											ipinagmamalasakit; nguni't tunay na 
											alam niyang siya'y ma'y kapurihan at 
											kinalulugdan ng madla hanggang sa 
											horas na iyon; hanggang sa horas na 
											iyo'y kanyang kinahahabagan yaong 
											mga babaeng nangagdaramit ng 
											katawatawa na pinamamagatan ng 
											bayang kaagulo ng mga sundalo. 
											ngayo'y tila mandin sa ganang 
											kanya'y napababa siya ng isang 
											baytang sa kinalalagyan ng mga 
											babaeng iyon sa hagdanan ng buhay.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Narinig niya ang yabag ng lakad ng 
											mga kabayo: yao'y ang mga nagdadala 
											ng mga isda sa mga bayang dako roon. 
											Ginagawa nila ang gayong mga 
											paglalakbay na nagpupulupulutong ng 
											maliliit ang mga lalaki't babae, na 
											nangakasakay sa masasamang kabayo, 
											sa gitna ng dalawang bakid na 
											nangakabitin sa magkabilang 
											tagiliran ng hayop. Ang ilan sa 
											kanila'y ng magdaan isang araw sa 
											harapan ng kanyang dampa ay 
											nangagsihingi ng tubig na inumin, at 
											siya'y hinandugan ng ilang isda. 
											ngayo'y ng mangagdaan sila sa 
											kanyang tabi, sa akala niya'y siya'y 
											tinatahak at ginigiik, at ang 
											kanilang mga tinging may kalakip na 
											habag o pagpapawalang halaga ay 
											lumalampas sa panyo at tinutudla ang 
											kanyang mukha.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa kawakasa'y lumayo ang mga 
											maglalakbay at nagbuntong hininga si 
											Sisa. Inihiwala niyang sandali ang 
											panyo sa kanyang mukha upang kanyang 
											matingnan kung sila'y malayo pa sa 
											bayan. May natitira pang ilang mga 
											haligi ng telegrapo bago dumating sa 
											'bantayan'. Kailan ma'y hindi niya 
											naramdaman ang kaunatan ng gayong 
											layo, kung di niyon lamang.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa tabi ng daa'y may isang malagong 
											kawayanang sa lilim niyo'y 
											nagpapahinga siya ng unang panahon. 
											Diya'y pinakikiusapan siya ng 
											katamistamisan ng sa kanya'y 
											nangingibig; tinutulungan nito siya 
											ng pagdadala ng kahoy at mga gulay; 
											ay! nagdaan ang mga araw na iyong 
											tulad sa panag-inip; ang nangingibig 
											ay kanyang naging asawa, at ang 
											asawa'y inatangan ng katungkulang 
											'kabeza de barangay' at ng 
											magkagayo'y nagpasimula ang 
											kasaliwaang palad ng pagtawag sa 
											kanilang pintuan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa, pagka't nagpapasimula ang araw 
											ng pag init na totoo, siya'y 
											tinanong ng mga sundalo kung ibig 
											niyang magpahinga.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Salamat!--ang kanyang isinagot na 
											nangingilabot.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Datapuwa't ng totoong siya'y 
											mapuspos ng malaking panggigipuspos 
											ay ng malapit na siyang dumating sa 
											bayan. Sa malaking sama ng kanyang 
											loob ay siya'y lumingap sa 
											magkabikabila; malalawak na mga 
											palayan, isang maliit na sanghang 
											inaagusan ng tubig na pangdilig, 
											salupanit na mga kahoy; wala siyang 
											makitang isang banging 
											pagpatibuliran o isang malaki't 
											matigas na batong paghampasan ng 
											sariling katawan! </font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Kanyang 
											pinagsisihan ang kanyang pagkasama 
											sa mga sundalo hanggang doon; 
											ngayo'y pinanghihinayangan niya ang 
											malalim na ilog na tumatakbo sa 
											malapit sa kanyang dampa, sapagkat 
											ang matataas na mga pampangin 
											niyao'y nasasabugan ng mga matutulis 
											na buhay na batong nangaghahandog ng 
											katamistamisang kamatayan. nguni't 
											ang pagkaalaala niya sa kanyang mga 
											anak, sa anak niyang si Crisping 
											hindi pa niya natatalos ng sandaling 
											iyon ang kinasapitan, ang siyang 
											tumanglaw sa kanya ng gabing iyon ng 
											kanyang buhay kaya't kanyang 
											naibulong sa pag-sang-ayon sa 
											marawal na palad:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Pagkatapos ... pagkatapos ay 
											mananahan kami sa gitna ng 
											kagubatan!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Pinahiran ng luha ang kanyang mga 
											mata, pagpilit na tumiwasay at 
											nagsabi sa mga guwardiya ng marahang 
											tinig:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Na sa bayan na tayo!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Hindi mapaglirip ang anyo ng kanyang 
											pagkapanalita; yao'y daing, sisi, 
											hibik, yao'y dalangin, yaon ang 
											pighating binuo sa tinig.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sinagot siya ng isang tango ng mga 
											sundalong sa kanya'y nahahabag. 
											Nagmadaling nagpauna si Sisa at 
											pagpilit na mag-anyong tiwasay ang 
											loob.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang sandaling iyo'y pagpasimula ang 
											pagrepique ng mga kampana't 
											ipina-aalam ang pagkatapos ng misa 
											mayor. Tinulinan ni Sisa ang 
											paglakad, at ng kung mangyayari'y 
											huwag niyang makasalubong ang mga 
											taong lalabas sa simbahan. 
											Datapuwa't hindi nangyari! walang 
											nakitang paraan upang maiwasan ang 
											gayong pagkasalubong.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Bumati ng masaklap na ngiti sa 
											dalawang kakilala niya, na sa 
											kanya'y nag-uusisa sa pamamag-itan 
											ng tingin, at mula niyo'y ng kanyang 
											mailagan ang gayong mga kahirapan ng 
											loob, tumungo siya at ang lupang 
											tinutuntungan niya ang kanyang 
											minasdan, at bagay na kagilagilalas! 
											natitisod siya sa mga bato ng 
											lansangan.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tumigil ng sandali ang mg tao 
											pagkakita sa kanya, sila-sila'y 
											nangag-uusap at sinusundan siya ng 
											kanilang titig: nakikita niya ang 
											lahat ng ito, nararamdaman niya, 
											bagaman siya'y laging nakatingin sa 
											lupa.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Naringig niya ang boses ng isang 
											walang kahihiyang babae, na 
											nasalikuran niya at nagtatanong ng 
											halos pasigaw:</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Saan ninyo nahuli ang babaeng ito? 
											At ang salapi?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Yao'y isang babaeng walang tapis, 
											dilaw at verde ang saya at ang 
											baro'y gasang azul; napagkikilala sa 
											kanyang pananamit na siya'y isang 
											kaagulo ng sundalo.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nakaramdam si Sisa ng isang parang 
											tampal: wari'y hinubdan siya ng 
											babaeng iyon sa harap ng karamihan. 
											Sandaling tumunghay upang siya'y 
											magsawa sa libak at pag-amis: nakita 
											niyang ang mga tao'y malayo, totoong 
											malayo sa kanya; gayon ma'y 
											naramdaman niya ang kalamigan ng 
											kanilang tingin at kanyang 
											nariringig ang kanilang mga 
											bulungbulungan. Lumalakad ang abang 
											babaeng hindi nararamdaman ang 
											pagtungtong sa lupa.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Uy, dito ka tumungo!--ang isininigaw 
											sa kanya ng isang guwardiya.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Tulad sa walang pag-iisip na nawasak 
											ang nakapagpapagalaw, biglangbiglang 
											ipinihit niya ang kanyang mga paa. 
											At hindi siya nakakikita ng ano man, 
											walang ano mang iniisip, siya'y 
											tumakbo at nagtago; nakita niya ang 
											isang pintuang may isang sundalong 
											bantay, nag-akala siyang pumasok 
											doon; nguni't siya'y inilihis sa 
											kanyang paglakad ng isa pang boses 
											na lalo pa manding mabalasik. 
											Tinunuton niya ang pinanggalingan ng 
											boses, na humahakbang siyang halos 
											masungaba sa panglulupaypay; 
											naramdaman niyang siya'y itinutulak 
											sa likuran, siya'y pumikit, 
											humakbang ng dalawa at sapagkat 
											kinulang siya ng lakas, 
											nagpakalugmok na siya sa lupa, 
											paluhod muna at paupo pagkatapos. 
											Isang pagtangis na walang luha, 
											walang sigaw, walang hibik, ang 
											siyang sa kanya'y nagpapakatal.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Yaon ang kuartel: doo'y may mga 
											sundalo, mga babae, mga baboy at mga 
											inahing manok. Nangagsisipanahi ng 
											kanikanilang mga damit ang ibang mga 
											sundalo, samantalang nakahiga sa 
											bangko ang kanilang mga kaagulong 
											babae, na ang hita ng lalaki ang 
											inuunan, nangaghihithiitan ng tabako 
											o kigarrillo at minamasdang ang 
											bubungang nangayayamot sa buhay: 
											Tumutulong naman ang mga ibang babae 
											sa paglilinis ng damit ng mga 
											sandata at iba pa, at inaaging-ing 
											ang mga mahahalay na awit.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Tila mandin nakatakas ang mga 
											sisiw! Ang inahing manok lamang ang 
											inyong dala?--anang isang babae sa 
											mga sundalong bagong dating; na 
											hindi napagsisiyasat kung ang sabi 
											niya'y dahil kay Sisa o sa inahing 
											manok na nagpapatuloy ng 
											piniyakpiyak.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Siya nga naman! kailan ma'y 
											mahalaga ang inahing manok kay sa 
											sisiw--ang isinagot niya sa kanya 
											ring tanong, ng makita niyang hindi 
											umiimik ang mga sundalo.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Saan naroon ang sargento?--ang 
											tanong na may anyong sama ang loob 
											ng isa sa mga guwardiya sibil--Nagbigay 
											sabi na ba sa alperes?</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											mga kibit ng balikat ang siyang sa 
											kanya'y sagot ng nangaroon, sino 
											ma'y walang nagmamalasakit ng 
											kamunti man lamang tungkol sa 
											kalagayan ng abang babae.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Dalawang horas ang itinagal doon ni 
											Sisa, sa isang anyong halos ay 
											hibang, nakaunkot sa isang sulok, 
											nakatago ang ulo sa mga kamay, gusot 
											at gusamot ang buhok. Natanto ng 
											alperes ang padakip na iyon ng 
											pagkatanhaling tapat, at ang unang 
											ginawa niya'y ang huwag paniwalaan 
											ang sumbong ng kura.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Bah! iya'y mga kaul-ulan lamang ng 
											kuripot na prayle!--anya, at 
											ipinag-utos na alpasan ang babae, at 
											sino ma'y huwag ng makialam ng bagay 
											na iyon.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											--Kung ibig niyang masumpong ang sa 
											kanya'y nawala--ang idinugtong--hingin 
											niya sa kanyang San Antonio o 
											magsakdal kaya siya sa nuncio! Iyan!</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Dahil sa mangyaring ito, si Sisa'y 
											pinalayas sa kuartel na halos 
											ipinagtutulakan, sapagkat aayaw 
											siyang kumilos.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang makita ni Sisang siya'y 
											sumasagitna ng daan lumakad na 
											siyang di alam ang ginagawa, at 
											tumungo sa kanyang bahay, 
											nagmamadali, walang ano mang takip 
											ang ulo at ang tinititiga'y ang 
											malayong tan-awin. Nagniningas ang 
											araw sa taluktok ng langit at walang 
											ano mang alapaap na nakakukubli sa 
											maningning niyang kabilugan; bahagya 
											na pinagagalaw ng hangin ang dahon 
											ng mga kahoy; halos tuyo na ang mga 
											daan; walang mangahas kahi't isang 
											ibon man lamang na iwan ang lilim ng 
											mga sanga.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa kawakasa'y dumating din si Sisa 
											sa kanyang maliit na bahay. Pumasok 
											siya roong pipi, hindi umiimik, 
											nilibot ang kabahayan, umalis, 
											nagpalakadlakad sa magkabikabila. 
											Tumakbo, pagkatapos sa bahay ni 
											matandang Tasio, tumawag sa pintuan; 
											nguni't wala roon ang matanda. 
											Bumalik sa kanyang bahay ang kulang 
											palad at nagpasimula ng pagtawag ng 
											pasigaw: Basilio! Crispin! at maya't 
											maya'y humihinto at nakikinig ng 
											mainam. </font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Inuulit ng alingangaw ang 
											kanyang boses: ang matimyas na 
											lagaslas ng tubig sa kalapit na 
											ilog, ang musika ng mga dahon ng mga 
											kawayan; ito ang tanging mga boses 
											ng pag-iisa. Muling tumatawag, 
											umaakya't sa isang mataas na lupa, 
											lumulusong sa isang bangin, nananaog 
											sa ilog; nagpapalingaplingap ang 
											kanyang mga matang may anyong 
											mabangis; ang mga mata ring iyo'y 
											manakanakang nag-aalab ng mainam, 
											pagkatapos ay nagdidilim, tulad sa 
											langit kung gabing sumisigwa: 
											masasabing namimisik ang liwanag ng 
											pag-iisip at malapit ng magdilim.</font></p>
											<p class="gap" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Muling pumanhik sa kanyang maliit na 
											bahay, naupo sa banig na kanilang 
											hinig-an ng nagdaang gabi, 
											itinunghay ang mga mata at nakita 
											niya ang kapirasong napunit sa baro 
											ni Basilio sa dulo ng isang kawayan 
											ng dingding, na na sa tabi ng 
											bangin. Nagtinding, kinuha ang pilas 
											na damit na iyon at pinagmasdan sa 
											init ng araw: may mga bahid, na 
											dugo.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Datapwa't marahil hindi nakita ni 
											Sisa ang gayong mga bahid, sapagkat nanaog at ipinagpatuloy ang 
											pagsisiyasat sa pilas, sa gitna ng 
											nakasusunog na init ng araw, na 
											kanyang itinataas, at sapagkat 
											tila mandin ang tingin niya'y 
											madilim na lahat, tinitigan niya ng 
											paharap ang araw ng dilat na dilat.
											Nagpatuloy rin siya ng 
											pagpapalakadlakad sa magkabikabila, 
											na sumisigaw o umaatungal ng 
											kakaibang tunog; marahil siya'y 
											katatakutan kung sa kanya'y may 
											makarinig; may isang tinig ang 
											kanyang boses na hindi karaniwang 
											manggaling sa lalamunan ng tao. </font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa&nbsp; buong&nbsp; gabi, pagka umaatungal ang 
											unos, at lumilipad ang hangin ng 
											kalagimlagim na katulinan, at 
											ipinagtatabuyan ng kanyang hindi 
											nakikitang mga pakpak ang isang 
											hukbong mga aninong sa kanya'y 
											humahagad, kung sakali't kayo'y na 
											sa isang bahay na giba at nag-iisa, 
											at nakakarinig kayo ng mga kakaibang 
											daing, mga kakaibang 
											buntong-hiningang ipinalalagay 
											ninyong yao'y ang hilahis ng hihip 
											ng hangin sa pagtama sa matataas na 
											mga torre o sirang mga pader, 
											datapuwa't sa inyo'y pumupuspos ng 
											takot at sa inyo'y nagpapakilabot na 
											hindi ninyo mapigilan; talastasin 
											nga ninyong higit ang lungkot ng 
											tinig ng inang iyon, kay sa hindi 
											mapaglirip na mga hibik sa mga 
											gabing madilim pagka umaatungal ang 
											unos.</font></p>
											<p style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Sa gayong kalagaya'y inabot si Sisa 
											ng gabi. Pinagkalooban siya marahil 
											ng Langit ng ilang horas na 
											pagkakatulog, at samantalang siya'y 
											nahihimbing, hinilahihisan ng pakpak 
											ng isang angel ang namumutla niyang 
											mukha, upang makatkat sa kanya ang 
											alaala, na walang ibang tinataglay 
											kung di pawang kapighatian; marahil 
											hindi kasiyang makaya ng mahinang 
											lakas ng tao ang gayong karaming mga 
											pagkakasakit, kaya't ng magkagayo'y 
											na mag-itan marahil ang Inang-Talaga 
											ng Diyos na taglay ang kanyang 
											matimyas na pangpagaang ng hirap, 
											ang pagkalimot; datapuwat sa papaano 
											man, ang katotohana'y ng kinabukasan, 
											si Sisa'y nagpapalakadlakad na 
											nakangiti, nag-aawit o kung hindi 
											nakikipag-usap sa lahat ng mga may 
											buhay na kinapal.</font></p>
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
																	Nilalaman ng Noli 
																	Me Tangere</font></a></font></p>
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
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
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