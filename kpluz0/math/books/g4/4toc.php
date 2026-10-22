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
echo "<br/><br/><br/>Grade 4 Math<br/>Table of Contents<br/><br/><br/></b></font>";
?>

<?php 


if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><b>Chapter 1. Numbers and Number Sense </b>";
echo "<br/><br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b>Learning Numbers up to 100,000</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4numbers-read-write&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Reading and Writing Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4place-values&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Place Values of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4rounding-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Rounding Off Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4comparing-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Comparing Large Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4ordering-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Ordering Large Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4multiplying-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Multiplying Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4dividing-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Dividing Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4mdas&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Applying MDAS Rules</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 2. Numbers and Number Sense II</b>";
echo "<br/><br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b>Factors and Multiples</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4factoring-numbers&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Factoring Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4multiples&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Multiples of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4prime-composite&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Prime and Composite Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4prime-factors&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Prime Factors of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4common-factors&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Finding Common Factors of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4gcf&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Finding the GCF of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4common-multiples&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'><b>";}
echo "<a href='$ref'>Finding Common Multiples of Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4lcm&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Finding the LCM of Numbers</a>";
echo "<br/><br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<b>Fractions</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4fractions-types&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Proper, Improper, and Mixed Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=4fractions-lowest&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Reducing Fractions into Lowest Terms</a>";
echo "<br/>";
$ref="../page-display.php?file=4fractions-add&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Adding Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=4fractions-subt&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Subtracting Fractions</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid2'>";}
else{echo "<font face='Arial' style='$blacksmall2'>";}
echo "<br/><b>Decimal Numbers</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4visualizing-decimals&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Visualizing Decimal Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4decimals-fractions&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Relating Decimal Numbers to Fractions</a>";
echo "<br/>";
$ref="../page-display.php?file=4decimal-place-values&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Decimal Place Values to the Hundredths</a>";
echo "<br/>";
$ref="../page-display.php?file=4decimals-read-write&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Reading and Writing Decimal Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4rounding-decimals&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Rounding Off Decimal Numbers</a>";
echo "<br/>";
$ref="../page-display.php?file=4ordering-decimals&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Comparing and Ordering Decimal Numbers</a>";
echo "<br/>";
echo "<br/><br/><b>Chapter 3. Geometry</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4lines&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Parallel, Intersecting, & Perpendicular Lines</a>";
echo "<br/>";
$ref="../page-display.php?file=4angles&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Understanding Angles</a>";
echo "<br/>";
$ref="../page-display.php?file=4triangles&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Characteristics and Types of Triangles</a>";
echo "<br/>";
$ref="../page-display.php?file=4quadrilaterals&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Characteristics and Types of Quadrilaterals</a>";
echo "<br/>";
$ref="../page-display.php?file=4tris-quads-relate&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Relating Triangles and Quadrilaterals</a>";
echo "<br/>";
$ref="../page-display.php?file=4quads-relate&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Relating Different Quadrilaterals</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 4. Patterns and Algebra</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4number-sequences&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Finding Missing Terms in Sequences</a>";
echo "<br/>";
$ref="../page-display.php?file=4equations&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Finding Missing Terms in Equations</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 5. Measurement</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4measuring-time&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Measuring Elapsed Time</a>";
echo "<br/>";
$ref="../page-display.php?file=4perimeters&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Perimeters of Plane Figures</a>";
echo "<br/>";
$ref="../page-display.php?file=4areas&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Areas of Basic Plane Figures</a>";
echo "<br/>";
$ref="../page-display.php?file=4areas-composite&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Areas of Simple Composite Figures</a>";
echo "<br/>";
$ref="../page-display.php?file=4volumes&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Volumes of Rectangular Prisms</a>";
echo "<br/>";
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<br/><br/><b>Chapter 6. Statistics and Probability</b>";
echo "<br/><br/>";
$ref="../page-display.php?file=4tables-graphs&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Data in Tables and Bar Graphs</a>";
echo "<br/>";
$ref="../page-display.php?file=4probability&format=".$format;
if ($format!=1){echo "<font face='Arial' style='$blackmid'>";}
else{echo "<font face='Arial' style='$blacksmall'>";}
echo "<a href='$ref'>Simple Probability Experiments</a>";
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