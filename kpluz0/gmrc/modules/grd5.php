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
	//$validpass4=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1678+678;
	$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	//$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	//$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	//$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	//$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	//$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	$grd=0;
	if ($pass==$validpass5){$grd=5;}			
	
	if (
		$pass != $validpass5
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
<title>GMRC Online Program for Grade 5 - KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'icons/pook-makasaysayanb.jpg', /*url*/'icons/report-cardhb.jpg', /*url*/'icons/matulunginb.jpg', /*url*/'icons/mapagpasensiyab.jpg', /*url*/'icons/magalang9b.jpg', /*url*/'icons/mapanagutan4b.jpg', /*url*/'icons/buhay-galangb.jpg', /*url*/'icons/halaga-sarilib.jpg', /*url*/'icons/maagapb.jpg', /*url*/'icons/masunurin5b.jpg', /*url*/'icons/pakikitungob.jpg', /*url*/'icons/masunurinb.jpg', /*url*/'icons/nasyonalismo3b.jpg', /*url*/'icons/maayosb.jpg', /*url*/'icons/malinisb.jpg', /*url*/'icons/maingatb.jpg', /*url*/'icons/maagap2b.jpg', /*url*/'icons/pananampalatayab.jpg', /*url*/'icons/pag-asab.jpg', /*url*/'icons/nasyonalismo4b.jpg', /*url*/'icons/mapanagutan5b.jpg', /*url*/'icons/positibob.jpg', /*url*/'icons/magiliwb.jpg', /*url*/'icons/masinopb.jpg', /*url*/'icons/magalang10b.jpg', /*url*/'icons/pananampalataya2b.jpg', /*url*/'icons/pananampalataya5b.jpg', /*url*/'icons/magalang3b.jpg', /*url*/'icons/mapanagutan2b.jpg', /*url*/'icons/patience2b.jpg', /*url*/'icons/masunurin3b.jpg', /*url*/'icons/kalinisan2b.jpg', /*url*/'icons/malasakitb.jpg', /*url*/'icons/masunurin4b.jpg', /*url*/'icons/mapagpasalamat4b.jpg', /*url*/'icons/bookb.jpg', /*url*/'icons/patienceb.jpg', /*url*/'icons/mapagpasalamat5b.jpg', /*url*/'icons/malasakit3b.jpg', /*url*/'icons/mapagpasalamat6b.jpg')">

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
						<img border="0" src="../images/grd5-gmrcmenu-top.jpg" width="800" height="144"></td>
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
													<p style="margin-top: 32px">
											<a href="../books/g5/5toc.php">
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
											<a href="q-display.php?mfile=buhay-galang5.php">
											<img border="0" id="buhay-galang-home14"   src="icons/buhay-galanga.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'buhay-galang-home14', /*url*/'icons/buhay-galangb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'buhay-galang-home14', /*url*/'icons/buhay-galanga.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=halaga-sarili5.php">
											<img border="0" id="halaga-sarili-home15"   src="icons/halaga-sarilia.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'halaga-sarili-home15', /*url*/'icons/halaga-sarilib.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'halaga-sarili-home15', /*url*/'icons/halaga-sarilia.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=maagap5.php">
											<img border="0" id="maagap-home13"   src="icons/maagapa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'maagap-home13', /*url*/'icons/maagapb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'maagap-home13', /*url*/'icons/maagapa.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pananampalataya5.php">
											<img border="0" id="pananampalataya2-home14"   src="icons/pananampalataya2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananampalataya2-home14', /*url*/'icons/pananampalataya2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananampalataya2-home14', /*url*/'icons/pananampalataya2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=masinop5.php">
											<img border="0" id="masinop-home14"   src="icons/masinopa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masinop-home14', /*url*/'icons/masinopb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masinop-home14', /*url*/'icons/masinopa.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=masunurin5.php">
											<img border="0" id="masunurin4-home18"   src="icons/masunurin4a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masunurin4-home18', /*url*/'icons/masunurin4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masunurin4-home18', /*url*/'icons/masunurin4a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagpasalamat5.php">
											<img border="0" id="mapagpasalamat4-home18"   src="icons/mapagpasalamat10a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat4-home18', /*url*/'icons/mapagpasalamat4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat4-home18', /*url*/'icons/mapagpasalamat10a.jpg')"></td>
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
											<a href="q-display.php?mfile=mapagmalasakit5.php">
											<img border="0" id="malasakit3-home14"   src="icons/malasakit17a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit3-home14', /*url*/'icons/malasakit3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit3-home14', /*url*/'icons/malasakit17a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagpasalamat5-3.php">
											<img border="0" id="mapagpasalamat6-home15"   src="icons/mapagpasalamat12a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat6-home15', /*url*/'icons/mapagpasalamat6b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat6-home15', /*url*/'icons/mapagpasalamat12a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a>
											<a href="q-display.php?mfile=magalang5.php">
											<img border="0" id="magalang9-home12"   src="icons/magalang9a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang9-home12', /*url*/'icons/magalang9b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang9-home12', /*url*/'icons/magalang9a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=mapanagutan5.php">
											<img border="0" id="mapanagutan4-home13"   src="icons/mapanagutan4a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapanagutan4-home13', /*url*/'icons/mapanagutan4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapanagutan4-home13', /*url*/'icons/mapanagutan4a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagpasalamat5-2.php">
											<img border="0" id="mapagpasalamat5-home13"   src="icons/mapagpasalamat5a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat5-home13', /*url*/'icons/mapagpasalamat5b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat5-home13', /*url*/'icons/mapagpasalamat5a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a>
											<a href="q-display.php?mfile=malinis5.php">
											<img border="0" id="malinis-home14"   src="icons/malinisa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malinis-home14', /*url*/'icons/malinisb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malinis-home14', /*url*/'icons/malinisa.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=nasyonalismo5.php">
											<img border="0" id="nasyonalismo3-home14"   src="icons/nasyonalismo3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nasyonalismo3-home14', /*url*/'icons/nasyonalismo3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nasyonalismo3-home14', /*url*/'icons/nasyonalismo3a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagpasensiya5.php">
											<img border="0" id="patience-home12"   src="icons/patiencea.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'patience-home12', /*url*/'icons/patienceb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'patience-home12', /*url*/'icons/patiencea.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a>
											<a href="q-display.php?mfile=magalang5-3q.php">
											<img border="0" id="magalang10-home14"   src="icons/magalang16a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang10-home14', /*url*/'icons/magalang10b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang10-home14', /*url*/'icons/magalang16a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="663" colspan="3">
											<p align="center" style="margin-top: 0px; margin-bottom: 40px">
											<img border="0" src="icons/note-markahan3.jpg" width="212" height="99"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											</a>
 
											<a href="q-display.php?mfile=pananampalataya5-3q.php">
											<img border="0" id="pananampalataya2-home13"   src="icons/pananampalataya6a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananampalataya2-home13', /*url*/'icons/pananampalataya5b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananampalataya2-home13', /*url*/'icons/pananampalataya6a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
											<a href="q-display.php?mfile=maingat5.php">
											<img border="0" id="maingat-home14"   src="icons/maingat2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'maingat-home14', /*url*/'icons/maingatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'maingat-home14', /*url*/'icons/maingat2a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=maagap5-3q.php">
											<img border="0" id="maagap2-home15"   src="icons/maagap3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'maagap2-home15', /*url*/'icons/maagap2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'maagap2-home15', /*url*/'icons/maagap3a.jpg')"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
 
											<a href="q-display.php?mfile=magiliw5.php">
											<img border="0" id="magiliw-home16"   src="icons/magiliwa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magiliw-home16', /*url*/'icons/magiliwb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magiliw-home16', /*url*/'icons/magiliwa.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
 
											</a>
											<a href="q-display.php?mfile=masunurin5-2.php">
											<img border="0" id="masunurin5-home13"   src="icons/masunurin5a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masunurin5-home13', /*url*/'icons/masunurin5b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masunurin5-home13', /*url*/'icons/masunurin5a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=pag-asa5.php">
											<img border="0" id="pag-asa-home16"   src="icons/pag-asaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pag-asa-home16', /*url*/'icons/pag-asab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pag-asa-home16', /*url*/'icons/pag-asaa.jpg')"></a></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=positibo5.php">
											<img border="0" id="positibo-home18"   src="icons/positiboa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'positibo-home18', /*url*/'icons/positibob.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'positibo-home18', /*url*/'icons/positiboa.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapanagutan5-2.php">
											<img border="0" id="mapanagutan5-home17"   src="icons/mapanagutan5a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapanagutan5-home17', /*url*/'icons/mapanagutan5b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapanagutan5-home17', /*url*/'icons/mapanagutan5a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=nasyonalismo5-2.php">
											<img border="0" id="nasyonalismo4-home15"   src="icons/nasyonalismo4a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nasyonalismo4-home15', /*url*/'icons/nasyonalismo4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nasyonalismo4-home15', /*url*/'icons/nasyonalismo4a.jpg')"></a></td>
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