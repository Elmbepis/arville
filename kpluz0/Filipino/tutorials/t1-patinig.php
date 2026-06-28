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
?>




<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Mga Patinig - Filipino sa KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg')">

<div align="center">

<table width="900"><tr><td height="100">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0">
			<tr>
				<td width="193" height="100" valign="top">
				<a href="/home-filipino.php">
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
		<table border="0" width="900" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
					<tr>
						<td>
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table51">
							<tr>
								<td height="45" valign="bottom">
								<img border="0" src="../../images/lessons-gen-top.jpg"></td>
							</tr>
							<tr>
								<td valign="bottom" >
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 22pt" color="#990000">
										Mga Patinig</font></span>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;&nbsp; </font></p>
											<div align="center">
												<table border="0" width="660" cellspacing="0" cellpadding="0" style="margin-left:0">
													<tr>
														<td align="center" width="220" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/aso2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="220" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/eroplano.jpg" width="200" height="126" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="220" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/isda2.jpg" style="border: 1px solid #C0C0C0" width="200" height="133"></td>
													</tr>
													<tr>
														<td align="center" width="220">
														<font face="Arial" style="font-size: 20pt; font-weight: 700" color="#FF0066">
														a</font><span style="font-weight: 700"><font face="Arial" style="font-size: 20pt" color="#800080">so</font></span></td>
														<td align="center" width="220">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														e</font><font face="Arial" style="font-size: 20pt" color="#800080">roplano</font></b></td>
														<td align="center" width="220">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														i</font><font face="Arial" style="font-size: 20pt" color="#800080">sda</font></b></td>
													</tr>
													<tr>
														<td align="center" width="220">
														<font face="Arial" style="font-size: 50pt; font-weight: 700" color="#333333">
														Aa</font></td>
														<td align="center" width="220">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Ee</font></b></td>
														<td align="center" width="220">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ii</font></b></td>
													</tr>
													</table>
												<p>&nbsp;</div>
											<div align="center">
												<table border="0" width="450" cellspacing="0" cellpadding="0" style="margin-left:0">
													<tr>
														<td align="center" width="225" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/oso.jpg" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="225" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/unggoy.jpg" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td align="center" width="225">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														o</font><font face="Arial" style="font-size: 20pt" color="#800080">so</font></span></td>
														<td align="center" width="225">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														u</font><font face="Arial" style="font-size: 20pt" color="#800080">nggoy</font></b></td>
													</tr>
													<tr>
														<td align="center" width="225">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Oo</font></b></td>
														<td align="center" width="225">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Uu</font></b></td>
													</tr>
													</table>
											</div>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 18pt; font-weight: 700" color="#990000">
																	Mga
																	</font>
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 18pt" color="#990000">
																	Halimbawa ng 
																	mga Salitang</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 15px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 18pt" color="#990000">
																	Nagsisimula 
																	sa Patinig</font></span></p>
												<table border="0" width="560" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 24pt" color="#800080">
														A</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">bo,
											</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">gad,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">has,</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">kin,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">klat,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">ko,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">lam,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">lat,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">liw,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">lok,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">lon,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">ma,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">mo,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">moy,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">nim,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">ntok,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">pat,</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">ral,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">sal,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">sim,</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">sin,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">wa,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">wit,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	A</font><font face="Arial" color="#333333" style="font-size: 18pt">bril,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">kala,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">dobo,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">gila,</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	A</font><font face="Arial" color="#333333" style="font-size: 18pt">gosto,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" style="font-size: 18pt" color="#333333">nino,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">ruga,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	a</font><font face="Arial" color="#333333" style="font-size: 18pt">sukal,
											</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 24pt" color="#800080">
														E</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp; </font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	e</font><font face="Arial" style="font-size: 18pt" color="#333333">dad,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	E</font><font face="Arial" style="font-size: 18pt" color="#333333">nero,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	e</font><font face="Arial" style="font-size: 18pt" color="#333333">lepante,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	e</font><font face="Arial" style="font-size: 18pt" color="#333333">nerhiya,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	e</font><font face="Arial" style="font-size: 18pt" color="#333333">pekto,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	e</font><font face="Arial" color="#333333" style="font-size: 18pt">spada,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	e</font><font face="Arial" style="font-size: 18pt" color="#333333">stado,
																	</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 24pt" color="#800080">
														I</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">ba,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">big,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">bon,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">deya,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">dlip,</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">dolo,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">gat,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">gib,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">glap,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">hip,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">haw,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">kot,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">kaw,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">lalim,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">lan,</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">law,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">log,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">mik,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">na,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">ndak,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">nis,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">nit,&nbsp;
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">nom,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">pis,</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">pon,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">rog,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">sa,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">sip,</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">tik,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">tim,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">tlog,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">to,
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">was,</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" style="font-size: 18pt" color="#333333">yak,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">yo,&nbsp;
																	</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	i</font><font face="Arial" color="#333333" style="font-size: 18pt">yon</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 24pt" color="#800080">
														O</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></span><p style="margin:0 20px; ">
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">koy</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">kra,</font><font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">po</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">ras</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">so,
											</font></span>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">tap,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											o</font><font face="Arial" color="#333333" style="font-size: 18pt">kasyon</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											O</font><font face="Arial" color="#333333" style="font-size: 18pt">ktubre</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">spital,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											o</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">pisina,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
											o</font><font face="Arial" color="#333333" style="font-size: 18pt">pisyal,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt">
											o</font><font face="Arial" color="#333333" style="font-size: 18pt">rasan</font></span><p style="margin:0 20px; ">
											<font face="Arial" style="font-size: 18pt">&nbsp;
											</font></td>
														</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 24pt" color="#800080">
														U</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
											<font color="#800080" style="font-size: 18pt">
											<b><span style="font-family: Arial">&nbsp;</span></b></font><p style="margin:0 20px; ">
											<b>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">be</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">bo</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><font style="font-size: 18pt"><span style="font-family: Arial">bod</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><font style="font-size: 18pt"><span style="font-family: Arial">bos</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">ga</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">gali,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">gat</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">goy</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">haw</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">ka</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">lam</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">lan</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">lang,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">lap</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">lat</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span></b><font color="#333333" style="font-size: 18pt"><b><span style="font-family: Arial">ling</span></b></font><b><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">lit</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">na</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">nan</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">nat</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">nawa</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">nggoy</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">n</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">lad,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">po</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">ri,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">rong</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">sa</span></font><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span></b><font color="#333333" style="font-size: 18pt"><b><span style="font-family: Arial">sbong</span></b></font><b><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><span style="font-family: Arial"><font color="#333333" style="font-size: 18pt">sli</font></span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span></b><font color="#333333" style="font-size: 18pt"><b><span style="font-family: Arial">sog</span></b></font><b><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span></b><font color="#333333" style="font-size: 18pt"><b><span style="font-family: Arial">sok</span></b></font><b><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><font style="font-size: 18pt"><span style="font-family: Arial">tak</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: blue">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333"><span style="font-size: 18pt; line-height: 115%; font-family: Arial">tos</span><span style="font-size: 18pt; line-height: 115%; font-family: Arial">,</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">wak</span></font><span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: #333333">,
											</span>
											<span style="font-size: 18pt; line-height: 115%; font-family: Arial; color: purple">
											u</span><font color="#333333" style="font-size: 18pt"><span style="font-family: Arial">wi</span></font></b><p style="margin:0 20px; ">
											<font color="#333333" style="font-size: 18pt">
											<b><span style="font-family: Arial">&nbsp;</span></b></font></td>
													</tr>
													</table>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
<a href="home-tutorials.php">
											
<img border="0" id="img8" src="images/backa.jpg" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img8',/*url*/'images/backb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img8',/*url*/'images/backa.jpg')"  fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></a></font></p>
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
								<img border="0" src="../../images/lessons-gen-bottom.jpg" width="900" ></td>
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