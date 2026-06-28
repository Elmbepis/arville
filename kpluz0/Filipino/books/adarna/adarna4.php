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
<title>Ibong Adarna - Filipino sa KPluz.com</title>
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
										Ibong Adarna</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											IV. </font><font color="#0000CC"><b>
											<span lang="EN-US" style="font-size: 16pt; font-family: Arial">
											Pagtulong ng Ermitanyo</span></b></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 16pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 16pt">&nbsp;</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Humayo na si Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa dampang kanyang natanaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pagtao po ay dinungaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng Ermitanyong may bahay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Inayayahang pumanhik,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa itaas na nagniig,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ermitanyo ay mabait</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kay Don Jua'y may pag-ibig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Mga payo at pangaral</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng ama sa bunsong mahal</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang aliw na ibinigay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa Prinsepeng namamanglaw.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											At naghanda ng pagkain</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nagsalo silang magiliw,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa harap ng mga hain</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											tila sa langit nanggagaling.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ngunit higit sa lahat nang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa Prinsepeng pagtatakam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											tinapay na bigay niya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ano't doon ay nakita?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Kaya nga ba at nawika</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa kanyang buong paghanga;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Ito'y isang talinghagang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kay hirap na maunawa!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Yaong aking nilimusa'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											isang matandang&nbsp; sugatan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa dito'y iba nama't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ermitanyo ang may-alay?</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Hindi kaya baga ito</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ay sa Diyos na </span>
											<font face="Arial"><i>
											<span lang="EN-US" style="font-size: 15pt; font-family: Apple Chancery">
											secreto?</span></i></font></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Anki'y si Jesuscristo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang banal na Ermitanyo!&quot;</span></font></p>
											<p class="MsoNormal" style="margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											At nang sila'y makakain</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ermitanyo ay nagturing:</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Don Juan, iyong sabihin</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang layon mo't nang malining.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Marangal na Ermitanyo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ituring nang anak ako</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na ngayon po'y naririto</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nagsasabi ng totoo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Matagal na pong di-hamak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang aking paglalagalag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											walang bundok, mga gubat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na di ko yata nalakad.</span></font></p>
											<p class="MsoNormal" style="margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Dumanas ng kahirapan;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pagod, puyat, gutom, uhaw,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa hirap ng mga daan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											palad ko ang di namatay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Lahat na po ay binata</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nang dahilan sa Adarna</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ibong matamis kakanta</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na lunas sa aking ama.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Ama ko po ay may sakit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											katawa'y datay sa banig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											siya kong itinatangis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											mula nang ako'y umalis.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Malabis kong alaalang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											baka ipanaw ni ama</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kung hindi ko madadala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ibong dito makukuha.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Don Juan, iyang hanap mo'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											paghihirapan mong tutoo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang Adarna'y may engkanto</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na wala pang tumatalo.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Kung tunay po ang pahayag</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											titiisin ko ang lahat,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											maging hangga man ng palad</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											tutupdin ko yaring hangad.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Sa Diyos dapat manawagan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang lahat ng nilalang,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang sa mundo ay pumanaw,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											tadhana ng katapatan.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Don Jua'y masusubok ko</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											katibayan ng loob mo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kung talaga ngang tutoo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ako'y tutulong sa iyo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Punongkahoy na makinang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na iyo nang naraanan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ay doon nga namamahay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang Adarnang iyong pakay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Ibong ito kung dumating</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											hatinggabi nang malalim</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang pagkantang malambing</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											katahimikan kung gawin.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Pitong awit na magaganda</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pito rin at iba't-iba</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa balahibong itsurang </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ilalabas ng Adarna.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Upang iyong matagalan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pitong kantang maiinam,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kita ngayon ay bibigyan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng sa antok ay panlaban.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Naririto ang labaha't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pitong dayap na hinog na,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											iyong dalhi't nang huwag kang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											talunin ng Engkatada.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Bawa't kantang papakinggan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang palad mo ay sugatan, </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											saka agad mong pigaan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng dayap&nbsp; ang hiwang laman.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Matapos ang pitong kanta</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											magbabawas ang Adarna,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ilagang mapatakan ka</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nang&nbsp; doon ay di mapaka.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;At kung hindi, sa aba mo!</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ikaw ay magiging bato,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											matutulad kang totoo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kay Don Pedro't kay Don Diego.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Dalhin mo rin itong <i>sintas</i></span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pagkaginto ay matingkad,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											itali mo pagkakahawak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa Adarnang mag-aalpas.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Kaya bunso, hayo ka na't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa gabi'y lalalimin ka,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ito'y oras na talaga</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng pagdating ng Adarna.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Yumao na si Don Juan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa Tabor na kabundukan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nang maagang maabangan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											yaong ibong kanyang pakay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Dumating sa punuongkahoy</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na wala nga ang ibon,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kaya't sandaling nagnuynoy</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na marapat gawin doon.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Datapwa't hindi natagalan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa ganitong paghihintay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											at kanya nang natanawan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang Adarna'y dumaratal.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Napuna pa nang dumapo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang Adana't tila, hapo;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kaya't kanyang napaghulong</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ibo'y galing sa malayo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Pagkalapag ay nahusay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng kanyang buong katawan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang pagkanta'y sinimulan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											tinig ay pinag-iinam.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ginamit na unang gayak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa Prinsipe'y nakabihag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kung malasi'y sadyang <i>perlas,</i></span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nagniningning sa liwanag.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Nagbago ng kanyang bihis</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na lumalo pa ang dikit,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											katugon ng inaawit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na malambing at matamis.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Natutukso nang matulog</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											si Don Juang nanunubok,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang labaha ay dinukot</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											at ang palad ay binusbos.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Lamang ngumiti sa balat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pinigaan na ng dayap,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa hapdi'y halos maiyak</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nag-ibayo pa ang antak.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Napawi ang pag-aantok</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											dahil sa tindi ng kirot,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											si Don Juan ay lumuhod,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nagpasalamat sa Diyos.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Pitong kanta nang malutas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nitong ibon sakdal dilag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											pito rin ang naging sugat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ni Don Juan nagpupuyat.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ang ibon ay nagbawas na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ugali pagtulog niya,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa Prinsipe nang makita'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											inilagan kapagdaka.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Kaya hindi tinamaa't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											naligtas sa kasawian,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											inantay nang mapahimlay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang Adarnang susunggaban.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Kung matulog ang Adarna</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang pakpak ay nakabuka,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											dilat ang dalawang mata</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kaya'y gising ang kapara.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Nang si Prinsipeng matatap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											tulog ng ibo'y panatag,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											dahan-dahan nang umakyat</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa puno ng <i>Piedras Platas</i>.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Agad niyang sinunggaban</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa paa'y biglang tinangnan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											at ginapos nang matibay</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng sintas sa gintong lantay.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Sa katuwaang tinamo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											halos di magkantututo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang Adarna ay pinangko't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											dinala sa Ermitanyo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Magalak namang kinuha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang nahui nang Adarna, </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											hinimas pang masaya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nang ipasok sa hawla.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Saka anang Ermitanyo;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Iyang banga ay kunin mo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											madali ka at sa iyo'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											merong iuutos ako.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Punin mo ng tubig iya't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang dalawang bato'y busan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nang sa bato'y magsisilitaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang dalawang iyong mahal.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Si Don Juan ay sumalok</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng tubig na iniuutos,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											at sa batong nakapuntod</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											dahan-dahang ibinubuhos.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Si Don Pedro ay nagtindig</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											at niyakap ang kapatid</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa pagkadaop ng dibdib</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kapwa sila nananangis.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Isinunod si Don Diego</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na, nang maging tao'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											di mawari itong mundo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kung ang dati o nabago.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Gaano ang pagtatalik</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											nitong tatlong magkakapatid,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											bawa't isa ay may sambit</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng sa puso ay pag-ibig.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Lalo na nga ang dalawang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa dalita'y natubos na,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											anuman ang ialala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kay Don Juan ay kulang pa.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Wala silang mahagilap</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											na salitang matitimyas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											o anumang maitumbas</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											kay Don Juang mga hirap.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ang kanilang pagsasaya'y </span>
											</font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											di na hangad matapos pa,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											danga't biglang naalala</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang maysakit nilang ama.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Kaya agad napatungo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa bahay ng Ermitanyo</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											upang ipagsulit dito</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ang ligaya nilang tatlo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Sila nama'y inahinan</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng pagkaing inilaan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											bilang isang pagdiriwang</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											sa tagumpay ni Don Juan.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ang piging nang matapos na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Ermitanyo ay kumuha</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng lamang nasa botelya</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											lunas na kataka-taka.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Mga sugat ni Don Jua'y</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											magiliw na pinahiran</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											gumaling at nangababaw</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											walang bakas bahagya man.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Ngayon,&quot; anang Ermitanyo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;maghanda ng umuwi kayo,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											magkasundi kayong tatlo't</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											wala sanang may maglilo.</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&quot;Don Juan ay kunin mo na</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng marikit na hawla,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											baka di datning&nbsp; buhay pa</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng inyong mahal na ama.&quot;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											&nbsp;</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											Nang sila ay magpaalam</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ay lumuhod si Don Juan,</span></font></p>
											<p class="MsoNormal" align="center" style="text-align: center; margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											hiniling na bendisyunan</span></font></p>
											<p style="margin-top: 0; margin-bottom: 0">
											<font color="#333333">
											<span lang="EN-US" style="font-size: 15pt; font-family: Arial">
											ng Ermitantyong marangal.</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
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
																	<a href="adarna-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	mga 
																	Nilalaman ng 
																	Ibong Adarna</font></a></font></p>
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