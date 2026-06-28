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
<title>Pandiwa - Filipino sa KPluz.com</title>
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
										Pandiwa</font></span>
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
																	<font face="Arial" style="font-size: 16pt" color="#333333"> 
																	Ang </font>
																	<font face="Arial" style="font-size: 16pt" color="#990000"> 
																	pandiwa</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
																	ay isang 
																	salitang 
																	nagsasaad ng 
																	kilos o 
																	galaw.&nbsp; 
																	Ito ang 
																	tinatawag na 
																	'verb' sa 
																	salitang 
																	Ingles.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
												<table border="0" width="650" cellspacing="0" cellpadding="0" style="border-width:0px; border-style:solid; margin-left:0">
													<tr>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/lumipad.jpg" width="200" height="153" style="border: 1px solid #C0C0C0"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/kakain.jpg" width="199" height="169" style="border: 1px solid #C0C0C0"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/yumakap.jpg" style="border: 1px solid #C0C0C0" width="200" height="157"></td>
													</tr>
													<tr>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														lumipad</font></span></td>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														kakain</font></span></td>
														<td width="222">
														<p align="center" style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														yumakap</font></span></td>
													</tr>
													<tr>
														<td width="222">&nbsp;</td>
														<td width="222">&nbsp;</td>
														<td width="222">&nbsp;</td>
													</tr>
													<tr>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/umiinom.jpg" width="200" height="140" style="border: 1px solid #C0C0C0"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/nabasag.jpg" width="196" height="135" style="border: 1px solid #C0C0C0"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/nakikinig.jpg" width="200" height="146" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td width="222" align="center">
														<p align="center" style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														umiinom</font></span></td>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														nabasag</font></span></td>
														<td width="222">
														<p align="center" style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														nakikinig</font></span></td>
													</tr>
													<tr>
														<td width="222">&nbsp;</td>
														<td width="222">&nbsp;</td>
														<td width="222">&nbsp;</td>
													</tr>
													<tr>
														<td width="222" align="center" valign="bottom">
														<img border="0" src="../images/bokabularyo/natutulog.jpg" width="200" height="155" style="border: 1px solid #C0C0C0"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/sumisipa.jpg" style="border: 1px solid #C0C0C0" width="184" height="163"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/nagsusulat.jpg" width="200" height="154" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														natutulog</font></span></td>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														sumipa</font></span></td>
														<td width="222">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														nagsusulat</font></span></td>
													</tr>
													<tr>
														<td width="222">&nbsp;</td>
														<td width="222">&nbsp;</td>
														<td width="222">&nbsp;</td>
													</tr>
													<tr>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/sumisigaw.jpg" width="200" height="134" style="border: 1px solid #C0C0C0"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/sumasayaw.jpg" width="170" height="154"></td>
														<td width="222" align="center" valign="bottom">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/nagtuturo.jpg" width="200" height="133" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														sumisigaw</font></span></td>
														<td width="222" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														nagsasayaw</font></span></td>
														<td width="222">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 17pt" color="#800080">
														nagtuturo</font></span></td>
													</tr>
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 10px">
																	<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
																	Mga
																	</font>
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Halimbawa ng 
																	Pandiwa</font></span></p>
												<table border="0" width="600" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	aalis</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														aawit</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	bibili</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	dadaan</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														dadalaw</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														hihiram</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														iinom</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														iiyak</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														kakain</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														lilipad</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														sasali</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														sisilip</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														binali</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														binili</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														dinala</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														ginamit</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														hinati</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	kinain</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														kinuha</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														minana</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														pinili</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														sinala</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														tiniis</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														winalis</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	bumaba</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	dumating</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	dumalo</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														humanda</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	lumabas</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														lumiko</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	luminaw
																	</font>
																	</td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	pumalit</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	pumila</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	sumama</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	sumuko</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	sumunod</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	tumakbo</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														tumalon</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	tumawa</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	tumawag</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	tumikim</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														umawit</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	umikot</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	umiyak</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														naaalala</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	naaamoy</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagugutom</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nahahabag</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	naiisip</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nakikita</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nalilito</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														naririnig</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nasasabi</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														natatakot</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														natutuwa</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nauuhaw</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														binibili</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	binibigkas</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	inaalam</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														inaagaw</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	inaayos</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														iniisip</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	inuuna</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														isinasalin</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														itinitinda</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														kinakain</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nililinis</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	tinitipon</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	naawa</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nabigo</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nabunot</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nadulas</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagalak</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nainis</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nakita</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														naligo</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	naluha</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	napanis</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														napunit</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														napuno</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nasanay</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nasilip</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nasira</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nasukat</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														natakot</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														natumba</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														naubos</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nawala</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	ibinalik</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	ibinuhos</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														inalis</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														inaruga</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	inayos</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														inikot</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														inilaga</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														inilipat</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	inipon</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	ipinasa</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	ipinasok</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	isinara</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														itinabi</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														itinago</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	itinali</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														itinama</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	magbabalot</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														maglalaba</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	maglalaro</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	maglilinis</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														magluluto</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														magsasabi</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	magtatago</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	magtitiis</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	magtitinda</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	maliligo</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	manonood</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center" bgcolor="#EAEAEA">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	matutupad</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagbasa</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagbilang</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagdala</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagdasal</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														naglaba</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagluto</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagpasa</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagpinta</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagsauli</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagsikap</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagsulat</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagtaob</font></td>
													</tr>
													<tr>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														nagtanong</font></td>
														<td width="149" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagtapon</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagtimpla</font></td>
														<td width="150" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	nagtulak</font></td>
													</tr>
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font color="#333333" face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
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