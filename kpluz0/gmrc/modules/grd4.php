<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
	require '../../school-access-check-school.php';
	if ($mpluzschool=="yes"){header("Location: /logout.php");}
	
 	require '../../offset.php';
 	$kpluzbase = $offset+9876+ord(substr($username,0,1))*ord(substr($username,2,1))*318+ord(substr($username,1,1))*ord(substr($username,3,1))*1113+substr($username,4,1)*substr($username,5,1)*825+substr($username,6,1)*substr($username,7,1)*115+ord(substr($username,0,1))*substr($username,6,1)*712+substr($username,7,1)*substr($username,7,1)*16*1989;
	//$validpass0=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1234+234;
	//$validpass1=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1345+345;
	//$validpass2=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1456+456;
	//$validpass3=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1567+567;
	$validpass4=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1678+678;
	//$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	//$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	//$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	//$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	//$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	//$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	$grd=0;
	if ($pass==$validpass4){$grd=4;}			
	
	if (
		$pass != $validpass4
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
$_SESSION['score']=0;
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>GMRC Online Program for Grade 7 - KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'icons/pook-makasaysayanb.jpg', /*url*/'icons/report-cardhb.jpg', /*url*/'icons/matiyagab.jpg', /*url*/'icons/patienceb.jpg', /*url*/'icons/masunurinb.jpg', /*url*/'icons/katiwalab.jpg', /*url*/'icons/pananaligb.jpg', /*url*/'icons/mapanagutanb.jpg', /*url*/'icons/pagmamahal-bayanb.jpg', /*url*/'icons/kalinisanb.jpg', /*url*/'icons/matapatb.jpg', /*url*/'icons/matipidb.jpg', /*url*/'icons/karununganb.jpg', /*url*/'icons/bookb.jpg', /*url*/'icons/halaga-sarilib.jpg', /*url*/'icons/malasakitb.jpg', /*url*/'icons/mapagkumbabab.jpg', /*url*/'icons/nasyonalismob.jpg', /*url*/'icons/tiwala-sarilib.jpg', /*url*/'icons/mapagpasalamatb.jpg')">

<div align="center">

<table width="900"><tr><td height="100">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0">
			<tr>
				<td width="193" height="100" valign="top">
				<a href="/app/menu.php">
				<img border="0" src="../../images/header-logo.jpg"></a></td>
				<td width="133" valign="top">
										<a href="/how-to-use-kpluz.php">
										<img border="0" id="img1" src="../../images/header1a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/header1b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/header1a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/header1c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/header1b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/bluebars_student.php">
										<img border="0" id="img2" src="../../images/header2a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/header2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/header2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/header2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/header2b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/programs.php">
										<img border="0" id="img3" src="../../images/header3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/header3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/header3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/header3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/header3b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/community.php">
										<img border="0" id="img4" src="../../images/header4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/header4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/header4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/header4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/header4b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/contact.php">
										<img border="0" id="img5" src="../../images/header5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/header5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/header5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/header5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/header5b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/logout.php">
										<img border="0" id="img6" src="../../images/header6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/header6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/header6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/header6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/header6b.jpg')"></a></td>
			</tr>
		</table>
	</div>
	</td></tr></table>

</div>

	<div align="center">
		<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61">
					<tr>
						<td>
						<img border="0" src="../images/grd4-gmrcmenu-top.jpg" width="800" height="144"></td>
					</tr>
					<tr>
						<td valign="top">
								<div align="center">
									<table border="0" width="800" cellspacing="0" cellpadding="0" id="table62">
										<tr>
											<td width="72" background="../images/gmrcmenu-left.jpg">&nbsp;</td>
											<td width="566" background="../images/gmrcmenu-content.jpg" >
								<div align="center">
									<table border="0" width="100%" cellspacing="0" cellpadding="0">
										<tr>
											<td>
								<div align="center">
									<table width="585" border="0" cellspacing="0" cellpadding="0" id="table64">
										<tr>
											<td width="663" colspan="3" valign="baseline">
											<div align="center">
											<table border="0" width="380" cellspacing="0" cellpadding="0" id="table71">
												<tr>
													<td width="250" align="center">
													&nbsp;</td>
													<td width="250" align="center">
													&nbsp;</td>
												</tr>
												<tr>
													<td width="250" align="center">
													<p style="margin-top: 35px">
											<a href="../GMRC-report-card.php">
											<img border="0" id="reportcardh-home1"   src="icons/report-cardha.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'reportcardh-home1', /*url*/'icons/report-cardhb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'reportcardh-home1', /*url*/'icons/report-cardha.jpg')"></a></td>
													<td width="250" align="center">
													<p style="margin-top: 25px">
											<a href="../books/g4/4toc.php">
											<img border="0" id="book-home2"   src="icons/booka.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'book-home2', /*url*/'icons/bookb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'book-home2', /*url*/'icons/booka.jpg')"></a></td>
												</tr>
											</table>
											</div>
											</td>
											</tr>
										<tr>
											<td width="663" colspan="3">
											<p align="center" style="margin-top: 40px; margin-bottom: 40px">
											<img border="0" src="icons/note-markahan1.jpg"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=halaga-sarili4.php">
											<img border="0" id="halaga-sarili-home19"   src="icons/halaga-sarilia.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'halaga-sarili-home19', /*url*/'icons/halaga-sarilib.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'halaga-sarili-home19', /*url*/'icons/halaga-sarilia.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=matapat4.php">
											<img border="0" id="matapat-home20"  src="icons/matapat2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matapat-home20', /*url*/'icons/matapatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matapat-home20', /*url*/'icons/matapat2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=magalang4.php">
											<img border="0" id="magalang-home21"  src="icons/magalanga.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang-home21', /*url*/'icons/magalangb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang-home21', /*url*/'icons/magalanga.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pananalig4.php">
											<img border="0" id="pananalig-home24"  src="icons/pananaliga.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananalig-home24', /*url*/'icons/pananaligb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananalig-home24', /*url*/'icons/pananaliga.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapanagutan4.php">
											<img border="0" id="mapanagutan-home23"  src="icons/mapanagutana.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapanagutan-home23', /*url*/'icons/mapanagutanb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapanagutan-home23', /*url*/'icons/mapanagutana.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pagmamahal-bayan4.php">
											<img border="0" id="pagmamahal-bayan-home12"   src="icons/pagmamahal-bayana.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pagmamahal-bayan-home12', /*url*/'icons/pagmamahal-bayanb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pagmamahal-bayan-home12', /*url*/'icons/pagmamahal-bayana.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=tiwala-sarili4.php">
											<img border="0" id="tiwala-sarili-home16"   src="icons/tiwala-sarili5a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'tiwala-sarili-home16', /*url*/'icons/tiwala-sarilib.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'tiwala-sarili-home16', /*url*/'icons/tiwala-sarili5a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											&nbsp;</td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											&nbsp;</td>
										</tr>
										<tr>
											<td width="663" colspan="3">
											<p align="center" style="margin-top: 0px; margin-bottom: 40px">
											<img border="0" src="icons/note-markahan2.jpg" width="212" height="99"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=matipid4.php">
											<img border="0" id="matipid-home22"  src="icons/matipid3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matipid-home22', /*url*/'icons/matipidb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matipid-home22', /*url*/'icons/matipid3a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											<a href="q-display.php?mfile=mapagpasalamat4.php">
											<img border="0" id="mapagpasalamat-home13"   src="icons/mapagpasalamat11a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat-home13', /*url*/'icons/mapagpasalamatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat-home13', /*url*/'icons/mapagpasalamat11a.jpg')"></a></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=matiyaga4.php">
											<img border="0" id="matiyaga-home11"   src="icons/matiyagaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matiyaga-home11', /*url*/'icons/matiyagab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matiyaga-home11', /*url*/'icons/matiyagaa.jpg')"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=mapagpasensiya4.php">
											<img border="0" id="patience-home12"   src="icons/patiencea.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'patience-home12', /*url*/'icons/patienceb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'patience-home12', /*url*/'icons/patiencea.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=masunurin4.php">
											<img border="0" id="masunurin-home13"   src="icons/masunurina.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masunurin-home13', /*url*/'icons/masunurinb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masunurin-home13', /*url*/'icons/masunurina.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=katiwala4.php">
											<img border="0" id="katiwala-home14"   src="icons/katiwala2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'katiwala-home14', /*url*/'icons/katiwalab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'katiwala-home14', /*url*/'icons/katiwala2a.jpg')"></td>
										</tr>
										<tr>
											<td width="663" colspan="3">
											<p align="center" style="margin-top: 0px; margin-bottom: 40px">
											<img border="0" src="icons/note-markahan3.jpg" width="212" height="99"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=mapagkumbaba4.php">
											<img border="0" id="mapagkumbaba-home13"   src="icons/mapagkumbabaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagkumbaba-home13', /*url*/'icons/mapagkumbabab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagkumbaba-home13', /*url*/'icons/mapagkumbabaa.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=malinis4.php">
											<img border="0" id="kalinisan-home14"   src="icons/kalinisana.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'kalinisan-home14', /*url*/'icons/kalinisanb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'kalinisan-home14', /*url*/'icons/kalinisana.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=nasyonalismo4.php">
											<img border="0" id="nasyonalismo-home19"   src="icons/nasyonalismo2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nasyonalismo-home19', /*url*/'icons/nasyonalismob.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nasyonalismo-home19', /*url*/'icons/nasyonalismo2a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=karunungan4.php">
											<img border="0" id="karunungan-home22"   src="icons/karunungan3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'karunungan-home22', /*url*/'icons/karununganb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'karunungan-home22', /*url*/'icons/karunungan3a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=mapagmalasakit4.php">
											<img border="0" id="malasakit-home13"   src="icons/malasakit2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit-home13', /*url*/'icons/malasakitb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit-home13', /*url*/'icons/malasakit2a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											&nbsp;</td>
										</tr>
										<tr>
											<td width="624" align="center" valign="top" colspan="3">
											&nbsp;</td>
										</tr>
										<tr>
											<td width="624" align="center" valign="top" colspan="3">
											&nbsp;</td>
										</tr>
										</table>
								</div>
											</td>
										</tr>
										<tr>
											<td>
											<img border="0" src="../images/gmrcmenu-bottom.jpg"></td>
										</tr>
									</table>
								</div>
											</td>
											<td width="72" background="../images/gmrcmenu-right.jpg">&nbsp;</td>
										</tr>
										</table>
								</div>
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
        	<a href="/home-araling-panlipunan.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>