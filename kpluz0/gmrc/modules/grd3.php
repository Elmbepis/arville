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
	$validpass3=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1567+567;
	//$validpass4=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1678+678;
	//$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	//$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	//$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	//$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	//$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	//$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	$grd=3;
	if ($pass==$validpass3){$grd=3;}			
	
	if (
		$pass != $validpass3
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
<title>GMRC Online Program for Grade 3 - KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'icons/pook-makasaysayanb.jpg', /*url*/'icons/report-cardhb.jpg', /*url*/'icons/matulunginb.jpg', /*url*/'icons/mapagpasensiyab.jpg', /*url*/'icons/totoo2b.jpg', /*url*/'icons/pagkukusab.jpg', /*url*/'icons/responsable2b.jpg', /*url*/'icons/responsable3b.jpg', /*url*/'icons/pakikitungob.jpg', /*url*/'icons/masunurinb.jpg', /*url*/'icons/maayosb.jpg', /*url*/'icons/malasakit9b.jpg', /*url*/'icons/malasakit3b.jpg', /*url*/'icons/pananampalatayab.jpg', /*url*/'icons/mapagpasalamatb.jpg', /*url*/'icons/pakikiisa4b.jpg', /*url*/'icons/madasalinb.jpg', /*url*/'icons/masinopb.jpg', /*url*/'icons/magalang8b.jpg', /*url*/'icons/pananaligb.jpg', /*url*/'icons/magalang3b.jpg', /*url*/'icons/mapanagutan2b.jpg', /*url*/'icons/patience2b.jpg', /*url*/'icons/disiplinab.jpg', /*url*/'icons/masunurin3b.jpg', /*url*/'icons/kalinisan2b.jpg', /*url*/'icons/tiwala-sarilib.jpg', /*url*/'icons/malasakitb.jpg', /*url*/'icons/magalang7b.jpg', /*url*/'icons/pakikiisa2b.jpg', /*url*/'icons/pagmamahal-bayanb.jpg', /*url*/'icons/bookb.jpg', /*url*/'icons/malasakit12b.jpg', /*url*/'icons/pakikiisa3b.jpg', /*url*/'icons/paghuhusgab.jpg', /*url*/'icons/patienceb.jpg')">

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
						<img border="0" src="../images/grd3-gmrcmenu-top.jpg" width="800" height="144"></td>
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
											<a href="../books/g3/3toc.php">
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
											<a href="q-display.php?mfile=tiwala-sarili3.php">
											<img border="0" id="tiwala-sarili-home16"   src="icons/tiwala-sarili5a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'tiwala-sarili-home16', /*url*/'icons/tiwala-sarilib.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'tiwala-sarili-home16', /*url*/'icons/tiwala-sarili5a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=mapagmalasakit3.php">
											<img border="0" id="malasakit-home16"   src="icons/malasakit12a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit-home16', /*url*/'icons/malasakit12b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit-home16', /*url*/'icons/malasakit12a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=responsable3.php">
											<img border="0" id="responsable2-home13"   src="icons/responsable2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'responsable2-home13', /*url*/'icons/responsable2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'responsable2-home13', /*url*/'icons/responsable2a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pananalig3.php">
											<img border="0" id="pananalig-home13"   src="icons/pananaliga.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananalig-home13', /*url*/'icons/pananaligb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananalig-home13', /*url*/'icons/pananaliga.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=disiplina3.php">
											<img border="0" id="disiplina-home31"   src="icons/disiplina2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'disiplina-home31', /*url*/'icons/disiplinab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'disiplina-home31', /*url*/'icons/disiplina2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=magalang3.php">
											<img border="0" id="magalang7-home18"   src="icons/magalang7a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang7-home18', /*url*/'icons/magalang7b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang7-home18', /*url*/'icons/magalang7a.jpg')"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pakikiisa3.php">
											<img border="0" id="pakikiisa2-home18"   src="icons/pakikiisa16a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa2-home18', /*url*/'icons/pakikiisa2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa2-home18', /*url*/'icons/pakikiisa16a.jpg')"></td>
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
											<a href="q-display.php?mfile=mapagpasensiya3.php">
											<img border="0" id="patience-home12"   src="icons/patiencea.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'patience-home12', /*url*/'icons/patienceb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'patience-home12', /*url*/'icons/patiencea.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=paghuhusga3.php">
											<img border="0" id="paghuhusga-home15"   src="icons/paghuhusga3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'paghuhusga-home15', /*url*/'icons/paghuhusgab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'paghuhusga-home15', /*url*/'icons/paghuhusga3a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a>
											<a href="q-display.php?mfile=totoo3.php">
											<img border="0" id="totoo2-home12"   src="icons/totoo2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'totoo2-home12', /*url*/'icons/totoo2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'totoo2-home12', /*url*/'icons/totoo2a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=pagkukusa3.php">
											<img border="0" id="pagkukusa-home13"   src="icons/pagkukusaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pagkukusa-home13', /*url*/'icons/pagkukusab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pagkukusa-home13', /*url*/'icons/pagkukusaa.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pakikiisa3-2.php">
											<img border="0" id="pakikiisa3-home13"   src="icons/pakikiisa3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa3-home13', /*url*/'icons/pakikiisa3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa3-home13', /*url*/'icons/pakikiisa3a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a>
											<a href="q-display.php?mfile=mapagmalasakit3-2q.php">
											<img border="0" id="malasakit9-home14"   src="icons/malasakit9a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit9-home14', /*url*/'icons/malasakit9b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit9-home14', /*url*/'icons/malasakit9a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=masunurin3.php">
											<img border="0" id="masunurin-home14"   src="icons/masunurina.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masunurin-home14', /*url*/'icons/masunurinb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masunurin-home14', /*url*/'icons/masunurina.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagmalasakit3-3q.php">
											<img border="0" id="malasakit3-home14"   src="icons/malasakit17a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit3-home14', /*url*/'icons/malasakit3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit3-home14', /*url*/'icons/malasakit17a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a>
											<a href="q-display.php?mfile=magalang3-3q.php">
											<img border="0" id="magalang8-home14"   src="icons/magalang15a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang8-home14', /*url*/'icons/magalang8b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang8-home14', /*url*/'icons/magalang15a.jpg')"></a></td>
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
											<a href="q-display.php?mfile=madasalin3.php">
											<img border="0" id="madasalin-home15"   src="icons/madasalin5a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'madasalin-home15', /*url*/'icons/madasalinb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'madasalin-home15', /*url*/'icons/madasalin5a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											</a>
											<a href="q-display.php?mfile=masinop3.php">
											<img border="0" id="masinop-home16"   src="icons/masinop3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masinop-home16', /*url*/'icons/masinopb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masinop-home16', /*url*/'icons/masinop3a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=bayan-pagmamahal3.php">
											<img border="0" id="pagmamahal-bayan-home12"   src="icons/pagmamahal-bayan2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pagmamahal-bayan-home12', /*url*/'icons/pagmamahal-bayanb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pagmamahal-bayan-home12', /*url*/'icons/pagmamahal-bayan2a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
											<a href="q-display.php?mfile=pakikiisa3-3.php">
											<img border="0" id="pakikiisa4-home16"   src="icons/pakikiisa4a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa4-home16', /*url*/'icons/pakikiisa4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa4-home16', /*url*/'icons/pakikiisa4a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
											<a href="q-display.php?mfile=responsable3-2.php">
											<img border="0" id="responsable3-home13"   src="icons/responsable3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'responsable3-home13', /*url*/'icons/responsable3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'responsable3-home13', /*url*/'icons/responsable3a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=pananampalataya3.php">
											<img border="0" id="pananampalataya-home15"   src="icons/pananampalatayaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananampalataya-home15', /*url*/'icons/pananampalatayab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananampalataya-home15', /*url*/'icons/pananampalatayaa.jpg')"></a></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagpasalamat3.php">
											<img border="0" id="mapagpasalamat-home16"   src="icons/mapagpasalamata.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat-home16', /*url*/'icons/mapagpasalamatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat-home16', /*url*/'icons/mapagpasalamata.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											&nbsp;</td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
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