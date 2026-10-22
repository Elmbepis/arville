<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
	session_start();
	$_SESSION['booknum']="g11/stat-prob.php";
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
	$validpass11=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*1989+416;
	
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
	if ($pass==$validpass11){$grd=11;}			
	
	if (
		$pass != $validpass11
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

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<?php
echo "<title>Table of Contents - Statistics and Probability</title>";
$format=0;
?>

<script language="JavaScript">
<!--
function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
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

<body bgcolor="#FFFFFF" onload="FP_preloadImgs(/*url*/'../../../images/3c.jpg',/*url*/'../../../images/3b.jpg',/*url*/'../../../images/42c.jpg',/*url*/'../../../images/42b.jpg',/*url*/'../../../images/52c.jpg',/*url*/'../../../images/52b.jpg',/*url*/'../../../images/6c.jpg',/*url*/'../../../images/6b.jpg',/*url*/'../../../images/kpluz-books-tocc.jpg',/*url*/'../../../images/kpluz-books-tocb.jpg',/*url*/'../../../images/kpluz-books-homec.jpg',/*url*/'../../../images/kpluz-books-homeb.jpg',/*url*/'../../../images/kpluz-books-logoutc.jpg',/*url*/'../../../images/kpluz-books-logoutb.jpg')">

<div align="center">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td height="33">

										
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<img border="0" src="../../../images/kpluz-books-logo.jpg" width="900" height="154"></td>
	</tr>
	<tr>
		<td>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td>
										<?php
											$toc=$grd."toc.php"; echo "<a href='$toc'>";
										?><a href="stat-prob.php"><img border="0" id="img1" src="../../../images/kpluz-books-toca.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-tocb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-toca.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-tocc.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-tocb.jpg')"></a></a></td>
				<td>
										<a href="/home-math.php">
										<img border="0" id="img2" src="../../../images/kpluz-books-homea.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../../images/kpluz-books-homeb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../../images/kpluz-books-homea.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../../images/kpluz-books-homec.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../../images/kpluz-books-homeb.jpg')"></a></td>
				<td width="49">
										<a href="/logout.php">
										<img border="0" id="img3" src="../../../images/kpluz-books-logouta.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../../images/kpluz-books-logoutb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../../images/kpluz-books-logouta.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../../images/kpluz-books-logoutc.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../../images/kpluz-books-logoutb.jpg')"></a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

				</td>
			</tr>
			<tr>
				<td>

										
			<img border="0" src="../../../images/divider-books.jpg"></td>
			</tr>
			<tr>
				<td height="33" align="center">

<?php
$redbig="font-size:42pt;color:#C00000";
$redmid="font-size:34pt;color:#C00000";
$redsmall="font-size:28pt;color:#C00000";
$bluebig="font-size:42pt;color:#0000BB";
$bluemid="font-size:38pt;color:#0000BB";
$bluesmall="font-size:32pt;color:#0000BB";
$viobig="font-size:42pt;color:#800080";
$viomid="font-size:36pt;color:#800080";
$viosmall="font-size:30pt;color:#800080";
$blackbig="font-size:42pt;color:#222222";
$blackmid="font-size:34pt;color:#222222";
$blackmid2="font-size:34pt;color:#222222";
$blacksmall="font-size:28pt;color:#222222";
$blacksmall2="font-size:30pt;color:#222222";

?>
										
<?php 
if ($format!=1){echo "<font face='Arial' style='font-size:46pt;color:#C00000'><b>";}
else{echo "<font face='Arial' style='font-size:32pt;color:#C00000'><b>";}
echo "<br/><br/><br/>Grade 11<br/>Statistics and Probability<br/><br/></b></font>";
?>

<?php 

echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Random Variables and<br/>Probability Distributions</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=sp-random-variables&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Random Variables</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-probdist-discrete&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Probability Dist. of a Discrete Random Var.</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-meanvar-discrete&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Mean & Variance of a Discrete Random Var.</a>";
echo "<br/>";

echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>The Normal Distribution</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=sp-normal-random-variables&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Normal Random Variables</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-normal-curve&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>The Normal Curve</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-normal-curve-regions&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Regions Under the Normal Curve</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-std-normal-variables&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Standard Normal Variables</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-std-normal-table&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Using the Standard Normal Table</a>";
echo "<br/>";

echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Sampling and<br/>Sampling Distributions</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=sp-random-sampling&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Random Sampling</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-dist-samp-mean&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Sampling Distribution of the Sample Mean</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-cent-lim-th&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>The Central Limit Theorem</a>";
echo "<br/>";

echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Estimation of Parameters</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=sp-pt-int-est&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Point Versus Interval Estimation</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-pt-est-pop-mean&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Point Estimation of the Population Mean</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-int-est-pop-mean&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Interval Estimation of the Population Mean</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-tdist&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>The t-Distribution</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-tdist-regions&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Regions Under the t-Distribution</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-ttable-perc&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Percentiles and the t-Table</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-pt-est-pop-prop&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Point Estimation of Population Proportions</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-int-est-pop-prop&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Interval Estimation of Population Proportions</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-length-conf-int&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>The Length of a Confidence Interval</a>";
echo "<br/>";

echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Tests of Hypotheses</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=sp-hyptest-intro&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Introduction to Hypothesis Testing</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-tstats-pop-means&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Test Statistics for Population Means</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-rejreg-pop-means&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Rejection Regions for Population Means</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-tstats-pop-props&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Test Statistics for Pop. Proportions</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-rejreg-pop-props&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Rejection Regions for Pop. Proportions</a>";
echo "<br/>";

echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Correlation and<br/>Regression Analyses</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=sp-bivariate&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Bivariate Data</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-scplots&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Constructing and Analyzing Scatter Plots</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-scplots-bfline&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Drawing the Best-fit Line on a Scatter Plot</a>";
echo "<br/>";
$ref="../page-display.php?file=sp-pearson-scc&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Pearson's Sample Correlation Coefficient</a>";
echo "<br/>";

?>

<br/><br/>
			</tr>
			<tr>
				<td height="33">
			<p align="center" style="margin-top: 5px; margin-bottom: 5px">
            <font style="font-size: 10pt"><span style="mso-spacerun: yes">
			<font face="Arial" color="#444444">
            Copyright 2017
        </font><a href="/home-english.php"><b>
			<font face="Arial" color="#444444">K</font></b></a><b><font face="Arial" color="#365669"><a href="/home-english.php"><font color="#444444">Pluz.com</font></a></font></b><font face="Arial" color="#444444">. 
			All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>