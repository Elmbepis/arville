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
	//$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	//$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	//$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	//$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	//$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	$grd=0;
	if ($pass==$validpass10){$grd=10;}			
	
	if (
		$pass != $validpass10
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
<title>GMRC Online Program for Grade 10 - KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'icons/pook-makasaysayanb.jpg', /*url*/'icons/report-cardhb.jpg', /*url*/'icons/matulunginb.jpg', /*url*/'icons/makatarungan4b.jpg', /*url*/'icons/maunawainb.jpg', /*url*/'icons/karunungan2b.jpg', /*url*/'icons/patience3b.jpg', /*url*/'icons/pakikiisa4b.jpg', /*url*/'icons/pakikitungob.jpg', /*url*/'icons/masunurinb.jpg', /*url*/'icons/pakikiisa15b.jpg', /*url*/'icons/maayosb.jpg', /*url*/'icons/pakikiisa14b.jpg', /*url*/'icons/pamana-kulturab.jpg', /*url*/'icons/matapatb.jpg', /*url*/'icons/pananampalatayab.jpg', /*url*/'icons/malasakit16b.jpg', /*url*/'icons/daigdig-unawab.jpg', /*url*/'icons/magalang12b.jpg', /*url*/'icons/mapanagutan11b.jpg', /*url*/'icons/pananampalataya2b.jpg', /*url*/'icons/magalang3b.jpg', /*url*/'icons/mapanagutan2b.jpg', /*url*/'icons/patience2b.jpg', /*url*/'icons/masunurin3b.jpg', /*url*/'icons/kalinisan2b.jpg', /*url*/'icons/malasakitb.jpg', /*url*/'icons/makatarungan3b.jpg', /*url*/'icons/mapanagutan10b.jpg', /*url*/'icons/bookb.jpg', /*url*/'icons/patienceb.jpg', /*url*/'icons/mapanagutan9b.jpg', /*url*/'icons/matiyaga2b.jpg', /*url*/'icons/katiwalab.jpg', /*url*/'icons/integridad2b.jpg', /*url*/'icons/karununganb.jpg', /*url*/'icons/mapagpasalamat7b.jpg', /*url*/'icons/pakikiisa12b.jpg', /*url*/'icons/paghuhusgab.jpg', /*url*/'icons/integridadb.jpg', /*url*/'icons/magalangb.jpg')">

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
						<img border="0" src="../images/grd10-gmrcmenu-top.jpg" width="800" height="144"></td>
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
											<a href="../books/g10/10toc.php">
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
											<a href="q-display.php?mfile=mapanagutan10.php">
											<img border="0" id="mapanagutan9-home14"   src="icons/mapanagutan9a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapanagutan9-home14', /*url*/'icons/mapanagutan9b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapanagutan9-home14', /*url*/'icons/mapanagutan9a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=matiyaga10.php">
											<img border="0" id="matiyaga2-home15"   src="icons/matiyaga2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matiyaga2-home15', /*url*/'icons/matiyagab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matiyaga2-home15', /*url*/'icons/matiyaga2a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=mapagpasensiya10.php">
											<img border="0" id="patience3-home13"   src="icons/patience3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'patience3-home13', /*url*/'icons/patienceb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'patience3-home13', /*url*/'icons/patience3a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pananampalataya10.php">
											<img border="0" id="pananampalataya2-home13"   src="icons/pananampalataya2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananampalataya2-home13', /*url*/'icons/pananampalataya2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananampalataya2-home13', /*url*/'icons/pananampalataya2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=katiwala10.php">
											<img border="0" id="katiwala-home19"   src="icons/katiwalaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'katiwala-home19', /*url*/'icons/katiwalab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'katiwala-home19', /*url*/'icons/katiwalaa.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=makatarungan10.php">
											<img border="0" id="makatarungan3-home18"   src="icons/makatarungan3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'makatarungan3-home18', /*url*/'icons/makatarungan3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'makatarungan3-home18', /*url*/'icons/makatarungan3a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapanagutan10-2.php">
											<img border="0" id="mapanagutan10-home18"   src="icons/mapanagutan10a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapanagutan10-home18', /*url*/'icons/mapanagutan10b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapanagutan10-home18', /*url*/'icons/mapanagutan10a.jpg')"></td>
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
 
											<img border="0" id="maunawain-home12"   src="icons/maunawaina.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'maunawain-home12', /*url*/'icons/maunawainb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'maunawain-home12', /*url*/'icons/maunawaina.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
 
											<img border="0" id="karunungan2-home13"   src="icons/karunungan2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'karunungan2-home13', /*url*/'icons/karununganb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'karunungan2-home13', /*url*/'icons/karunungan2a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a></a>
 
											<img border="0" id="mapagpasalamat7-home12"   src="icons/mapagpasalamat7a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat7-home12', /*url*/'icons/mapagpasalamat7b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat7-home12', /*url*/'icons/mapagpasalamat7a.jpg')"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
 
											</a>
 
											<img border="0" id="pakikiisa15-home13"   src="icons/pakikiisa15a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa15-home13', /*url*/'icons/pakikiisa15b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa15-home13', /*url*/'icons/pakikiisa15a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
 
											<img border="0" id="matapat-home11"   src="icons/matapat3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matapat-home11', /*url*/'icons/matapatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matapat-home11', /*url*/'icons/matapat3a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a></a>
 
											<img border="0" id="paghuhusga-home15"   src="icons/paghuhusga3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'paghuhusga-home15', /*url*/'icons/paghuhusgab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'paghuhusga-home15', /*url*/'icons/paghuhusga3a.jpg')"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
 
											</a>
 
											<img border="0" id="mapanagutan11-home14"   src="icons/mapanagutan12a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapanagutan11-home14', /*url*/'icons/mapanagutan11b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapanagutan11-home14', /*url*/'icons/mapanagutan12a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a></a></td>
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
 
											</a>
 
											<img border="0" id="makatarungan4-home18"   src="icons/makatarungan6a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'makatarungan4-home18', /*url*/'icons/makatarungan4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'makatarungan4-home18', /*url*/'icons/makatarungan6a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											</a></a>
 
 
											<img border="0" id="integridad2-home18"   src="icons/integridad3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'integridad2-home18', /*url*/'icons/integridadb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'integridad2-home18', /*url*/'icons/integridad3a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											</a>
 
											<img border="0" id="pakikiisa12-home16"   src="icons/pakikiisa17a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa12-home16', /*url*/'icons/pakikiisa12b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa12-home16', /*url*/'icons/pakikiisa17a.jpg')"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
 
 
											</a>
 
											<img border="0" id="pamana-kultura-home14"   src="icons/pamana-kultura2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pamana-kultura-home14', /*url*/'icons/pamana-kulturab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pamana-kultura-home14', /*url*/'icons/pamana-kultura2a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
 
											</a>
 
											<img border="0" id="magalang12-home16"   src="icons/magalang12a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang12-home16', /*url*/'icons/magalangb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang12-home16', /*url*/'icons/magalang12a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											<img border="0" id="pakikiisa4-home13"   src="icons/pakikiisa4a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa4-home13', /*url*/'icons/pakikiisa4b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa4-home13', /*url*/'icons/pakikiisa4a.jpg')"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<img border="0" id="malasakit16-home16"   src="icons/malasakit16a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit16-home16', /*url*/'icons/malasakit9b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit16-home16', /*url*/'icons/malasakit16a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<img border="0" id="daigdig-unawa-home18"   src="icons/daigdig-unawaa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'daigdig-unawa-home18', /*url*/'icons/daigdig-unawab.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'daigdig-unawa-home18', /*url*/'icons/daigdig-unawaa.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											</a></td>
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