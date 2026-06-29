<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
 	require '../../offset.php';
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
	$validpass12=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*1965+318;
	
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
	if ($pass==$validpass12){$grd=12;}			
	
	if (
		$pass != $validpass0 and $pass != $validpass1 and $pass != $validpass2 and $pass != $validpass3 and $pass != $validpass4 and $pass != $validpass5 
		and $pass != $validpass6 and $pass != $validpass7 and $pass != $validpass8 and $pass != $validpass9 and $pass != $validpass10 and $pass != $validpass11 and $pass != $validpass12
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
if (!isset($_SESSION['level']))
{$_SESSION['level']="Easy";}

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<?php
$font="";
$content="g".$grd."/".$_GET['file'].".php";
include $content;
$title0=str_replace("<br/>"," ",$title); 
echo "<title>".$title0." - Grade ".$grd." Math by KPluz</title>";
$format=$_GET['format'];
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

<body bgcolor="#FFFFFF" onload="FP_preloadImgs(/*url*/'../../images/3c.jpg',/*url*/'../../images/3b.jpg',/*url*/'../../images/42c.jpg',/*url*/'../../images/42b.jpg',/*url*/'../../images/52c.jpg',/*url*/'../../images/52b.jpg',/*url*/'../../images/6c.jpg',/*url*/'../../images/6b.jpg',/*url*/'../../images/kpluz-books-tocc.jpg',/*url*/'../../images/kpluz-books-tocb.jpg',/*url*/'../../images/kpluz-books-homec.jpg',/*url*/'../../images/kpluz-books-homeb.jpg',/*url*/'../../images/kpluz-books-logoutc.jpg',/*url*/'../../images/kpluz-books-logoutb.jpg')">

<div align="center">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td height="33">

										
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<img border="0" src="../../images/kpluz-books-logo.jpg" width="900" height="154"></td>
	</tr>
	<tr>
		<td>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td>
										<?php
											$toc="g".$grd."/".$grd."toc.php"; 
											if ($grd>=11 and isset($_SESSION['booknum'])){$toc=$_SESSION['booknum'];}
											echo "<a href='$toc'>";
										?><img border="0" id="img1" src="../../images/kpluz-books-toca.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/kpluz-books-tocb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/kpluz-books-toca.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/kpluz-books-tocc.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/kpluz-books-tocb.jpg')"></a></td>
				<td>
										<a href="../../home-gmrc.php">
										<img border="0" id="img2" src="../../images/kpluz-books-homea.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homeb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homea.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homec.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homeb.jpg')"></a></td>
				<td width="49">
										<a href="/logout.php">
										<img border="0" id="img3" src="../../images/kpluz-books-logouta.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logoutb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logouta.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logoutc.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logoutb.jpg')"></a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

				</td>
			</tr>
			<tr>
				<td>

										
			<img border="0" src="../../images/divider-books.jpg"></td>
			</tr>
			<tr>
				<td height="33">

										
<p class="MsoNormal" align="center" style="text-align: center; margin: 0 25px">
<font face="Arial"><b>


<?php 

if ($format==1){echo "<span lang='EN-US' style='font-size:24pt;color:#C00000'>";}
else{echo "<span lang='EN-US' style='font-size:42pt;color:#C00000'>";}
echo "<br/><br/><br/>";
echo $title; 
echo "<br/><br/><br/>";
?>

</span></b></font></p>
<p class="MsoNormal" style="text-align: justify; margin: 0 0px">
<font face="Arial">

<?php
$article=str_replace("@vio","<font color='#800080'>",$article); 
$article=str_replace("@nvio","<font color='#000000'>",$article); 
if ($format==1){
	echo "<span lang='EN-US' style='font-size: 16pt'>";
	$article=str_replace("@blue","<p style='text-align: center'><span lang='EN-US' style='font-size: 18pt'><font color='#0000CC'><b>",$article); 
	$article=str_replace("@nblue","</b><font color='#000000'></p><p style='text-align: justify'><span lang='EN-US' style='font-size: 16pt'>",$article); 
	$article=str_replace("@red","<p style='text-align: center'><span lang='EN-US' style='font-size: 16pt'><font color='#BB0000'>",$article); 
	$article=str_replace("@nred","<font color='#000000'></p><p style='text-align: justify'><span lang='EN-US' style='font-size: 16pt'>",$article); 
	}
else
	{echo "<span lang='EN-US' style='font-size: 36pt'>";
	$article=str_replace("@blue","<table align='center'><tr><td align='center'><span lang='EN-US' style='font-size: 38pt'><font color='#0000CC'><b>",$article); 
	$article=str_replace("@nblue","</b></td></tr></table><font color='#000000'><style='text-align: justify'><span lang='EN-US' style='font-size: 36pt'>",$article); 
	$article=str_replace("@red","<table align='center'><tr><td align='center'><span lang='EN-US' style='font-size: 36pt'><font color='#BB0000'>",$article); 
	$article=str_replace("@nred","</td></tr></table><font color='#000000'><p style='text-align: justify'><span lang='EN-US' style='font-size: 36pt'>",$article); 
	}

$pos1=strpos($article,"@php1");
$pos2=strpos($article,"@php2");
$pos3=strpos($article,"@php3");
if ($pos1>1 and $pos2<1){
	$pos2=strpos($article,"@",($pos1+1));
	$reqstr=substr($article,($pos1),($pos2-$pos1+1));
	$article1=substr($article,0,$pos1); 
	$article2=substr($article,($pos2+1)); 
	echo $article1;
	if (strpos($reqstr,"1visualizing-num")>0){require 'php/visualizing-numbers.php';}
	if (strpos($reqstr,"1writing-num")>0){require 'php/writing-numbers.php';}
	if (strpos($reqstr,"1place-values")>0){require 'php/place-values.php';}
	if (strpos($reqstr,"1rounding-num")>0){require 'php/rounding-numbers.php';}
	if (strpos($reqstr,"1comparing-num")>0){require 'php/comparing-numbers.php';}
	if (strpos($reqstr,"1counting-money")>0){require 'php/counting-money.php';}
	if (strpos($reqstr,"1comparing-money")>0){require 'php/comparing-money.php';}
	if (strpos($reqstr,"1ordinal-num")>0){require 'php/ordinal-numbers.php';}
	if (strpos($reqstr,"1arranging-num")>0){require 'php/arranging-numbers.php';}
	if (strpos($reqstr,"1adding-num")>0){require 'php/adding-numbers.php';}
	if (strpos($reqstr,"1subtracting-num")>0){require 'php/subtracting-numbers.php';}
	if (strpos($reqstr,"1multiplying-num")>0){require 'php/multiplying-numbers.php';}
	if (strpos($reqstr,"1visualizing-mult")>0){require 'php/visualizing-mult.php';}
	if (strpos($reqstr,"1visualizing-div")>0){require 'php/visualizing-div.php';}
	if (strpos($reqstr,"1dividing-num")>0){require 'php/dividing-numbers.php';}
	if (strpos($reqstr,"1odd-even")>0){require 'php/odd-even.php';}
	if (strpos($reqstr,"1div-test1")>0){require 'php/div-test1.php';}
	if (strpos($reqstr,"1div-test2")>0){require 'php/div-test2.php';}
	if (strpos($reqstr,"1div-test3")>0){require 'php/div-test3.php';}
	if (strpos($reqstr,"1gemdas")>0){require 'php/gemdas.php';}
	if (strpos($reqstr,"1gmdas")>0){require 'php/gmdas.php';}
	if (strpos($reqstr,"1mdas")>0){require 'php/mdas.php';}
	if (strpos($reqstr,"1gcf")>0){require 'php/gcf.php';}
	if (strpos($reqstr,"1common-factors")>0){require 'php/common-factors.php';}
	if (strpos($reqstr,"1multiples")>0){require 'php/multiples.php';}
	if (strpos($reqstr,"1common-multiples")>0){require 'php/common-multiples.php';}
	if (strpos($reqstr,"1lcm")>0){require 'php/lcm.php';}
	if (strpos($reqstr,"1number-factorization")>0){require 'php/number-factorization.php';}
	if (strpos($reqstr,"1prime-numbers")>0){require 'php/prime-numbers.php';}
	if (strpos($reqstr,"1prime-factorization")>0){require 'php/prime-factorization.php';}
	if (strpos($reqstr,"1commutative-mult")>0){require 'php/commutative-mult.php';}
	if (strpos($reqstr,"1associative-mult")>0){require 'php/associative-mult.php';}
	if (strpos($reqstr,"1distributive-mult")>0){require 'php/distributive-mult.php';}
	if (strpos($reqstr,"1visualizing-frac")>0){require 'php/visualizing-fractions.php';}
	if (strpos($reqstr,"1writing-frac")>0){require 'php/writing-fractions.php';}
	if (strpos($reqstr,"1comparing-frac")>0){require 'php/comparing-fractions.php';}
	if (strpos($reqstr,"1ordering-frac")>0){require 'php/ordering-fractions.php';}
	if (strpos($reqstr,"1fractions-equiv")>0){require 'php/fractions-equivalent.php';}
	if (strpos($reqstr,"1fractions-mixed-improper")>0){require 'php/fractions-mixed-improper.php';}
	if (strpos($reqstr,"1fractions-lowest")>0){require 'php/fractions-lowest.php';}
	if (strpos($reqstr,"1fractions-add")>0){require 'php/fractions-add.php';}
	if (strpos($reqstr,"1fractions-subt")>0){require 'php/fractions-subt.php';}
	if (strpos($reqstr,"1fractions-mult")>0){require 'php/fractions-mult.php';}
	if (strpos($reqstr,"1fractions-div")>0){require 'php/fractions-div.php';}
	if (strpos($reqstr,"1visualizing-dec")>0){require 'php/visualizing-decimals.php';}
	if (strpos($reqstr,"1decimals-frac")>0){require 'php/decimals-fractions.php';}
	if (strpos($reqstr,"1decimal-place-val")>0){require 'php/decimal-place-values.php';}
	if (strpos($reqstr,"1writing-dec")>0){require 'php/writing-decimals.php';}
	if (strpos($reqstr,"1rounding-dec")>0){require 'php/rounding-decimals.php';}
	if (strpos($reqstr,"1arranging-dec")>0){require 'php/arranging-decimals.php';}
	if (strpos($reqstr,"1decimals-add")>0){require 'php/decimals-add.php';}
	if (strpos($reqstr,"1decimals-subt")>0){require 'php/decimals-subt.php';}
	if (strpos($reqstr,"1decimals-mult")>0){require 'php/decimals-mult.php';}
	if (strpos($reqstr,"1decimals-div")>0){require 'php/decimals-div.php';}
	if (strpos($reqstr,"1ratios-simp")>0){require 'php/ratios-simplifying.php';}
	if (strpos($reqstr,"1proportions")>0){require 'php/proportions.php';}
	if (strpos($reqstr,"1pct-frac-dec")>0){require 'php/pct-frac-dec.php';}
	if (strpos($reqstr,"1percent1")>0){require 'php/percent1.php';}
	if (strpos($reqstr,"1percent2")>0){require 'php/percent2.php';}
	if (strpos($reqstr,"1perimeters")>0){require 'php/perimeters.php';}
	if (strpos($reqstr,"1circum")>0){require 'php/circumferences.php';}
	if (strpos($reqstr,"1areas-pf")>0){require 'php/areas-pf.php';}
	if (strpos($reqstr,"1surface-areas")>0){require 'php/surface-areas.php';}
	if (strpos($reqstr,"1volumes")>0){require 'php/volumes.php';}
	if (strpos($reqstr,"1sales-tax-disc")>0){require 'php/sales-tax-discount.php';}
	if (strpos($reqstr,"1commissions")>0){require 'php/commissions.php';}
	if (strpos($reqstr,"1simple-interest")>0){require 'php/simple-interest.php';}
	if (strpos($reqstr,"1exponents")>0){require 'php/exponents.php';}
	if (strpos($reqstr,"1visualizing-int")>0){require 'php/visualizing-integers.php';}
	if (strpos($reqstr,"1ordering-int")>0){require 'php/ordering-integers.php';}
	if (strpos($reqstr,"1integers-add-subt")>0){require 'php/integers-add-subt.php';}
	if (strpos($reqstr,"1integers-mult-div")>0){require 'php/integers-mult-div.php';}
	if (strpos($reqstr,"1integers-exp")>0){require 'php/integers-exponents.php';}
	if (strpos($reqstr,"1number-sequences")>0){require 'php/number-sequences.php';}
	if (strpos($reqstr,"1number-sequence-rules")>0){require 'php/number-sequence-rules.php';}
	if (strpos($reqstr,"1number-sequence-terms")>0){require 'php/number-sequence-terms.php';}
	if (strpos($reqstr,"1number-sentences-terms")>0){require 'php/number-sentences-terms.php';}
	if (strpos($reqstr,"1sequence-elements")>0){require 'php/sequence-elements.php';}
	if (strpos($reqstr,"1time-elapsed")>0){require 'php/time-elapsed.php';}
	if (strpos($reqstr,"1time-zones")>0){require 'php/time-zones.php';}
	if (strpos($reqstr,"1algebraic-exp")>0){require 'php/algebraic-expressions.php';}
	if (strpos($reqstr,"1algebraic-equ")>0){require 'php/algebraic-equations.php';}
	if (strpos($reqstr,"1equations-ops")>0){require 'php/equations-ops-properties.php';}
	if (strpos($reqstr,"1equations-missing")>0){require 'php/equations-missing-terms.php';}
	if (strpos($reqstr,"1equations-solving")>0){require 'php/equations-solving.php';}
	if (strpos($reqstr,"1speed-time-distance")>0){require 'php/speed-time-distance.php';}
	if (strpos($reqstr,"1conversion-time")>0){require 'php/conversion-time.php';}
	if (strpos($reqstr,"1conversion-length")>0){require 'php/conversion-length.php';}
	if (strpos($reqstr,"1conversion-mass")>0){require 'php/conversion-mass.php';}
	if (strpos($reqstr,"1conversion-volume")>0){require 'php/conversion-volume.php';}
	if (strpos($reqstr,"1water-consumption")>0){require 'php/water-consumption.php';}
	if (strpos($reqstr,"1electric-consumption")>0){require 'php/electric-consumption.php';}
	if (strpos($reqstr,"1probability")>0){require 'php/probability.php';}
	echo $article2;
	}
else{echo $article;} 
	
?>

<br/><br/><br/>

				</td>
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