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

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<?php
echo "<title>Table of Contents - Grade ".$grd." Math by KPluz</title>";
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
										?><img border="0" id="img1" src="../../../images/kpluz-books-toca.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-tocb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-toca.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-tocc.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/kpluz-books-tocb.jpg')"></a></td>
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
$bluemid="font-size:34pt;color:#0000BB";
$bluesmall="font-size:28pt;color:#0000BB";
$viobig="font-size:42pt;color:#800080";
$viomid="font-size:34pt;color:#800080";
$viosmall="font-size:28pt;color:#800080";
$blackbig="font-size:42pt;color:#222222";
$blackmid="font-size:34pt;color:#222222";
$blackmid2="font-size:32pt;color:#222222";
$blacksmall="font-size:28pt;color:#222222";
$blacksmall2="font-size:26pt;color:#222222";
?>
										
<?php 
if ($format!=1){echo "<font face='Arial' style='font-size:46pt;color:#C00000'><b>";}
else{echo "<font face='Arial' style='font-size:32pt;color:#C00000'><b>";}
echo "<br/><br/><br/>Grade 3 Math<br/>Table of Contents<br/><br/><br/></b></font>";
?>

<?php 


if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><b>Chapter 1. Numbers and Number Sense </b>";
echo "<br/><br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b>Learning Numbers up to 10,000</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3visualizing-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Visualizing Numbers up to 10,000</a>";
echo "<br/>";
$ref="../page-display.php?file=3numbers-read-write&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Reading and Writing Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=3place-values&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Place Values of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=3rounding-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Rounding Off Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=3comparing-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Comparing Numbers up to 10,000</a>";
echo "<br/>";
$ref="../page-display.php?file=3ordering-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Ordering Numbers up to 10,000</a>";
echo "<br/>";
$ref="../page-display.php?file=3ordinal-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Ordinal Numbers up to 100th</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b><br/>Learning about Money</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3money&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Recognizing Coins and Bills</a>";
echo "<br/>";
$ref="../page-display.php?file=3money-counting&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Counting Money</a>";
echo "<br/>";
$ref="../page-display.php?file=3money-comparing&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Comparing Money</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b><br/>Addition and Subtraction of Numbers</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3adding-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Adding Numbers with 3 to 4 Digits</a>";
echo "<br/>";
$ref="../page-display.php?file=3subtracting-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Subtracting Numbers with 3 to 4 Digits</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 2. Numbers and Number Sense II</b>";
echo "<br/><br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b>Multiplication of Numbers</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3visualizing-mult&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Visualizing Multiplication</a>";
echo "<br/>";
$ref="../page-display.php?file=3multiplication-commutative&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>The Commutative Property of Multiplication</a>";
echo "<br/>";
$ref="../page-display.php?file=3multiplication-associative&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>The Associative Property of Multiplication</a>";
echo "<br/>";
$ref="../page-display.php?file=3multiplication-distributive&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>The Distributive Property of Multiplication</a>";
echo "<br/>";
$ref="../page-display.php?file=3multiplying-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Multiplying Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=3multiples&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Multiples of 1- to 2-Digit Numbers</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b><br/>Division of Numbers</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3visualizing-div&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Visualizing Division</a>";
echo "<br/>";
$ref="../page-display.php?file=3dividing-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Dividing Numbers with up to 4 Digits</a>";
echo "<br/>";
$ref="../page-display.php?file=3odd-even&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Odd and Even Numbers</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Fractions</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3visualizing-fractions&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Visualizing Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=3fractions-read-write&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Reading and Writing Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=3comparing-fractions&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Comparing Dissimilar Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=3ordering-fractions&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Ordering Dissimilar Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=3fractions-equivalent&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Equivalent Fractions</a>";
echo "<br/>";
echo "<br/><br/><b>Chapter 3. Geometry</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3geom-intro&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Points, Lines, Segments, and Rays</a>";
echo "<br/>";
$ref="../page-display.php?file=3lines&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Parallel, Intersecting, & Perpendicular Lines</a>";
echo "<br/>";
$ref="../page-display.php?file=3congruent-segments&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Congruent Line Segments</a>";
echo "<br/>";
$ref="../page-display.php?file=3symmetry&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Symmetry of Shapes</a>";
echo "<br/>";
$ref="../page-display.php?file=3tesselation&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Tessellation with Shapes</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 4. Patterns and Algebra</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3sequences&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Missing Elements in Sequences</a>";
echo "<br/>";
$ref="../page-display.php?file=3number-sentences&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Missing Values in Number Sentences</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 5. Measurement</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3measuring-time&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Measurement Units of Time</a>";
echo "<br/>";
$ref="../page-display.php?file=3measuring-length&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Measurement Units of Length</a>";
echo "<br/>";
$ref="../page-display.php?file=3measuring-mass&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Measurement Units of Mass</a>";
echo "<br/>";
$ref="../page-display.php?file=3measuring-volume&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Measurement Units of Volume</a>";
echo "<br/>";
$ref="../page-display.php?file=3areas&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Areas of Squares and Rectangles</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 6. Statistics and Probability</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=3tables-graphs&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Data in Tables and Bar Graphs</a>";
echo "<br/>";
$ref="../page-display.php?file=3probability&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Probability of Events</a>";
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
        </font><a href="/home-science.php"><b>
			<font face="Arial" color="#444444">K</font></b></a><b><font face="Arial" color="#365669"><a href="/home-science.php"><font color="#444444">Pluz.com</font></a></font></b><font face="Arial" color="#444444">. 
			All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>