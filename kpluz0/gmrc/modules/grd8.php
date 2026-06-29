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
	$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	//$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	//$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	$grd=0;
	if ($pass==$validpass8){$grd=8;}			
	
	if (
		$pass != $validpass8
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
<title>GMRC Online Program for Grade 8 - KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'icons/pook-makasaysayanb.jpg', /*url*/'icons/report-cardhb.jpg', /*url*/'icons/matulunginb.jpg', /*url*/'icons/mapagpasensiyab.jpg', /*url*/'icons/positibo2b.jpg', /*url*/'icons/malasakit10b.jpg', /*url*/'icons/masipagb.jpg', /*url*/'icons/matatag2b.jpg', /*url*/'icons/mapagpasalamat7b.jpg', /*url*/'icons/patasb.jpg', /*url*/'icons/pakikitungob.jpg', /*url*/'icons/masunurinb.jpg', /*url*/'icons/payakb.jpg', /*url*/'icons/maayosb.jpg', /*url*/'icons/mapagpasalamat8b.jpg', /*url*/'icons/magalangb.jpg', /*url*/'icons/pakikiisa5b.jpg', /*url*/'icons/mapaglingkodb.jpg', /*url*/'icons/pananampalatayab.jpg', /*url*/'icons/pakikiisa6b.jpg', /*url*/'icons/pakikiisa7b.jpg', /*url*/'icons/buhay-galang3b.jpg', /*url*/'icons/mapagbigayb.jpg', /*url*/'icons/dispob.jpg', /*url*/'icons/nasyonalismo6b.jpg', /*url*/'icons/pananampalataya2b.jpg', /*url*/'icons/malasakit11b.jpg', /*url*/'icons/mapagkumbaba2b.jpg', /*url*/'icons/magalang3b.jpg', /*url*/'icons/mapanagutan2b.jpg', /*url*/'icons/patience2b.jpg', /*url*/'icons/masunurin3b.jpg', /*url*/'icons/kalinisan2b.jpg', /*url*/'icons/malasakitb.jpg', /*url*/'icons/maparaanb.jpg', /*url*/'icons/prudenceb.jpg', /*url*/'icons/pag-iimpokb.jpg', /*url*/'icons/bookb.jpg', /*url*/'icons/patienceb.jpg', /*url*/'icons/buhay-galang2b.jpg', /*url*/'icons/matapatb.jpg', /*url*/'icons/nasyonalismo5b.jpg')">

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
						<img border="0" src="../images/grd8-gmrcmenu-top.jpg" width="800" height="144"></td>
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
											<a href="../books/g8/8toc.php">
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
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=paghuhusga8.php">
											<img border="0" id="prudence-home18"   src="icons/prudencea.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'prudence-home18', /*url*/'icons/prudenceb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'prudence-home18', /*url*/'icons/prudencea.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=matatag8.php">
											<img border="0" id="positibo2-home12"   src="icons/positibo2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'positibo2-home12', /*url*/'icons/positibo2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'positibo2-home12', /*url*/'icons/positibo2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagmalasakit8.php">
											<img border="0" id="malasakit10-home13"   src="icons/malasakit10a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit10-home13', /*url*/'icons/malasakit10b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit10-home13', /*url*/'icons/malasakit10a.jpg')"></a></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=buhay-galang8.php">
											<img border="0" id="buhay-galang2-home13"   src="icons/buhay-galang2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'buhay-galang2-home13', /*url*/'icons/buhay-galang2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'buhay-galang2-home13', /*url*/'icons/buhay-galang2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagpasalamat8.php">
											<img border="0" id="mapagpasalamat8-home14"   src="icons/mapagpasalamat8a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat8-home14', /*url*/'icons/mapagpasalamat8b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat8-home14', /*url*/'icons/mapagpasalamat8a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											<a href="q-display.php?mfile=payak8.php">
											<img border="0" id="payak-home14"   src="icons/payaka.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'payak-home14', /*url*/'icons/payakb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'payak-home14', /*url*/'icons/payaka.jpg')"></a></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=pag-iimpok8.php">
											<img border="0" id="pag-iimpok-home19"   src="icons/pag-iimpoka.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pag-iimpok-home19', /*url*/'icons/pag-iimpokb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pag-iimpok-home19', /*url*/'icons/pag-iimpoka.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=masipag8.php">
											<img border="0" id="masipag-home14"   src="icons/masipag2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'masipag-home14', /*url*/'icons/masipagb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'masipag-home14', /*url*/'icons/masipag2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a></td>
										</tr>
										<tr>
											<td width="663" colspan="3">
											<p align="center" style="margin-top: 0px; margin-bottom: 40px">
											<img border="0" src="icons/note-markahan2.jpg" width="212" height="99"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=matatag8-2q.php">
											<img border="0" id="matatag2-home15"   src="icons/matatag2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matatag2-home15', /*url*/'icons/matatag2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matatag2-home15', /*url*/'icons/matatag2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											<a href="q-display.php?mfile=matapat8.php">
											<img border="0" id="matapat-home15"   src="icons/matapat3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'matapat-home15', /*url*/'icons/matapatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'matapat-home15', /*url*/'icons/matapat3a.jpg')"></td>
											<td width="221" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											<a href="q-display.php?mfile=mapagpasalamat8-2q.php">
											<img border="0" id="mapagpasalamat7-home16"   src="icons/mapagpasalamat7a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagpasalamat7-home16', /*url*/'icons/mapagpasalamat7b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagpasalamat7-home16', /*url*/'icons/mapagpasalamat7a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagkumbaba8.php">
											<img border="0" id="mapagkumbaba2-home13"   src="icons/mapagkumbaba2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagkumbaba2-home13', /*url*/'icons/mapagkumbaba2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagkumbaba2-home13', /*url*/'icons/mapagkumbaba2a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pananampalataya8.php">
											<img border="0" id="pananampalataya2-home14"   src="icons/pananampalataya3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pananampalataya2-home14', /*url*/'icons/pananampalataya2b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pananampalataya2-home14', /*url*/'icons/pananampalataya3a.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=maparaan8.php">
											<img border="0" id="maparaan-home18"   src="icons/maparaana.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'maparaan-home18', /*url*/'icons/maparaanb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'maparaan-home18', /*url*/'icons/maparaana.jpg')"></td>
										</tr>
										<tr>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=nasyonalismo8.php">
											<img border="0" id="nasyonalismo5-home14"   src="icons/nasyonalismo5a2.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nasyonalismo5-home14', /*url*/'icons/nasyonalismo5b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nasyonalismo5-home14', /*url*/'icons/nasyonalismo5a2.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=mapagpasensiya8.php">
											<img border="0" id="patience-home12"   src="icons/patiencea.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'patience-home12', /*url*/'icons/patienceb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'patience-home12', /*url*/'icons/patiencea.jpg')"></a></td>
											<td width="221" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											<a href="q-display.php?mfile=magalang8.php">
											<img border="0" id="magalang6-home15"   src="icons/magalang13a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'magalang6-home15', /*url*/'icons/magalangb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'magalang6-home15', /*url*/'icons/magalang13a.jpg')"></td>
										</tr>
										<tr>
											<td width="663" colspan="3">
											<p align="center" style="margin-top: 0px; margin-bottom: 40px">
											<img border="0" src="icons/note-markahan3.jpg" width="212" height="99"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
											<a href="q-display.php?mfile=paghuhusga8-2.php">
											<img border="0" id="dispo-home15"   src="icons/dispoa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'dispo-home15', /*url*/'icons/dispob.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'dispo-home15', /*url*/'icons/dispoa.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											<a href="q-display.php?mfile=mapaglingkod8.php">
											<img border="0" id="mapaglingkod-home16"   src="icons/mapaglingkod2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapaglingkod-home16', /*url*/'icons/mapaglingkodb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapaglingkod-home16', /*url*/'icons/mapaglingkod2a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											</a>
 
											<a href="q-display.php?mfile=mapagmalasakit8-3q.php">
											<img border="0" id="malasakit11-home15"   src="icons/malasakit20a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'malasakit11-home15', /*url*/'icons/malasakit11b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'malasakit11-home15', /*url*/'icons/malasakit20a.jpg')"></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
 
											<a href="q-display.php?mfile=pakikiisa8.php">
											<img border="0" id="pakikiisa5-home14"   src="icons/pakikiisa18a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa5-home14', /*url*/'icons/pakikiisa5b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa5-home14', /*url*/'icons/pakikiisa18a.jpg')"></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
											</a>
 
											<a href="q-display.php?mfile=nasyonalismo8-2.php">
											<img border="0" id="nasyonalismo6-home16"   src="icons/nasyonalismo6a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nasyonalismo6-home16', /*url*/'icons/nasyonalismo6b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nasyonalismo6-home16', /*url*/'icons/nasyonalismo6a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-top: 0; margin-bottom: 40px">
 
											</a>
											<a href="q-display.php?mfile=patas8.php">
											<img border="0" id="patas-home13"   src="icons/patasa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'patas-home13', /*url*/'icons/patasb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'patas-home13', /*url*/'icons/patasa.jpg')"></a></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=pakikiisa8-2.php">
											<img border="0" id="pakikiisa6-home16"   src="icons/pakikiisa6a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa6-home16', /*url*/'icons/pakikiisa6b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa6-home16', /*url*/'icons/pakikiisa6a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=mapagbigay8.php">
											<img border="0" id="mapagbigay2-home18"   src="icons/mapagbigay2a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'mapagbigay2-home18', /*url*/'icons/mapagbigayb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'mapagbigay2-home18', /*url*/'icons/mapagbigay2a.jpg')"></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											<a href="q-display.php?mfile=buhay-galang8-2.php">
											<img border="0" id="buhay-galang3-home17"   src="icons/buhay-galang3a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'buhay-galang3-home17', /*url*/'icons/buhay-galang3b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'buhay-galang3-home17', /*url*/'icons/buhay-galang3a.jpg')"></a></td>
										</tr>
										<tr>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
 
											<a href="q-display.php?mfile=pakikiisa8-3.php">
											<img border="0" id="pakikiisa7-home15"   src="icons/pakikiisa7a.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pakikiisa7-home15', /*url*/'icons/pakikiisa7b.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pakikiisa7-home15', /*url*/'icons/pakikiisa7a.jpg')"></a></a></td>
											<td width="199" align="center">
											<p style="margin-bottom: 40px; margin-top:0">
											&nbsp;</td>
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