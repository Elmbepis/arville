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
<title>Mga Salitang Magkasingkahulugan - Filipino sa KPluz.com</title>
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
										Mga Salitang Magkasingkahulugan</font></span>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 140px; margin-right: 120px; margin-top: 0; margin-bottom: 0">
											<span class="st">
											<font face="Arial" style="font-size: 16pt" color="#333333"> 
											Ang mga salitang
											</font>
											<em style="font-style: normal">
											<font face="Arial" style="font-size: 16pt" color="#990000"> 
											magkasingkahulugan</font></em><font face="Arial" style="font-size: 16pt" color="#333333"> 
											ay mga salitang may parehong 
											kahulugan.&nbsp; Halimbawa,
											</font>
											<font face="Arial" style="font-size: 16pt" color="#990000"> 
											kasingkahulugan</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
											ng salitang 'awit' ang salitang 'kanta'.</font></span></p>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp; </font></p>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
											<div align="center">
												<table style="margin-left:0" width="560" cellspacing="0" cellpadding="0" border="0">
													<tr>
														<td width="300" valign="bottom" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom:8px">
														<img src="../images/bokabularyo/watawat.jpg" style="border: 1px solid #C0C0C0" width="180" height="147" border="0"></td>
														<td width="300" valign="bottom" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom:8px">
														<img src="../images/bokabularyo/bahay2.jpg" style="border: 1px solid #C0C0C0" width="200" height="151" border="0"></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														<span style="font-weight: 700">
														<font style="font-size: 17pt" face="Arial" color="#800080">
														bandila - watawat</font></span></td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														<span style="font-weight: 700">
														<font style="font-size: 17pt" face="Arial" color="#800080">
														bahay - tahanan</font></span></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
													</tr>
													<tr>
														<td width="300" valign="bottom" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom:8px">
														<img src="../images/bokabularyo/sulat.jpg" style="border: 1px solid #C0C0C0" width="200" height="148" border="0"></td>
														<td width="300" valign="bottom" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom:8px">
														<img src="../images/bokabularyo/bibi.jpg" width="200" height="139" border="0"></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														<span style="font-weight: 700">
														<font style="font-size: 17pt" face="Arial" color="#800080">
														liham - sulat</font></span></td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														<span style="font-weight: 700">
														<font style="font-size: 17pt" face="Arial" color="#800080">
														pato - itik</font></span></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														&nbsp;</td>
													</tr>
													<tr>
														<td width="300" valign="bottom" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom:8px">
														<img src="../images/bokabularyo/maganda.jpg" style="border: 1px solid #C0C0C0" width="200" height="157" border="0"></td>
														<td width="300" valign="bottom" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom:8px">
														<img src="../images/bokabularyo/plato.jpg" style="border: 1px solid #C0C0C0" width="170" height="170" border="0"></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														<span style="font-weight: 700">
														<font style="font-size: 17pt" face="Arial" color="#800080">
														maganda - marikit</font></span></td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px">
														<span style="font-weight: 700">
														<font style="font-size: 17pt" face="Arial" color="#800080">
														pinggan - plato</font></span></td>
													</tr>
												</table>
											</div>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 18pt; font-weight: 700" color="#990000">
																	Mga
																	</font>
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 18pt" color="#990000">
																	Halimbawa ng 
																	mga</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 15px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 18pt" color="#990000">
																	Salitang 
																	Magkasingkahulugan</font></span></p>
												<div align="center">
													<table border="0" width="640" cellspacing="0" cellpadding="0" style="margin-left:0">
														<tr>
															<td width="310" align="center" valign="top">
																	<table width="300" cellspacing="0" cellpadding="0" style="border: 1px solid #C0C0C0; ; margin-left:0">
																		<tr>
																			<td align="center" width="108" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			aklat</font></td>
																			<td align="center" width="186" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			libro</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			alam</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			batid</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			alapaap</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			ulap</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			ama</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tatay, 
																			itay</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			anak</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			supling</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			aral</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			leksiyon</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			asal</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			ugali</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			asul</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			bughaw</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			awit</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			kanta</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bahagi</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			parte</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bahay</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tahanan</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bandila</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			watawat</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			banggit</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			sambit</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bansa</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			bayan, 
																			nasyon</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bantog</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tanyag</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			barko</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			bapor</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			baston</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tungkod</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bata</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			musmos</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bigat</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			timbang</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			bisita</font></td>
																			<td width="186" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			panauhin</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			boses</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tinig</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			dahilan</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			sanhi</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			dala</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hatid</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			dasal</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			dalangin</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			dilat</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			mulat</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			doktor</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			manggagamot</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			edad</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			gulang</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			epekto</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			resulta</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			gayahin</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tularan</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			giba</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			wasak, 
																			sira</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			gitna</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			sentro</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			grupo</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pangkat</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			gusto</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			ibig, 
																			nais</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hampas</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			palo</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			harang</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hadlang</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hardin</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			halamanan</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hatol</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			husga</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hilaga</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			norte</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hilahin</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hatakin, 
																			higitin</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hinto</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tigil, 
																			humpay</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hugis</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			korte</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			hukom</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			huwes</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kaibigan</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			katoto</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			inis</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			suya, 
																			yamot</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kalye</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			kalsada</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kama</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			higaan, 
																			katre</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kasali</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			kalahok</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kilos</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			galaw</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kirot</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hapdi, 
																			sakit</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kuweba</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			yungib</font></td>
																		</tr>
																		<tr>
																			<td width="108" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			kuwento</font></td>
																			<td width="186" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			istorya</font></td>
																		</tr>
																		<tr>
																			<td align="center" width="106" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			laki</font></td>
																			<td align="center" width="188" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			sukat</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			landas</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			daan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			liham</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			sulat</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			lihim</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			sikreto</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			likas</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			natural</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			likha</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			gawa</font></td>
																		</tr>
											</table>
															</td>
															<td width="20" align="center" valign="top">&nbsp;</td>
															<td width="310" align="center" valign="top">
																	<table width="300" cellspacing="0" cellpadding="0" style="border: 1px solid #C0C0C0; ; margin-left:0">
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			lugar</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pook</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			lukso</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			lundag, 
																			talon</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 8px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			lungkot</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			lumbay</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			maaari</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			puwede</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin:0 3px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mabagal</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			makupad</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mabilis</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			matulin</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mabuti</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			mainam</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			madalas</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			malimit</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 2px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mahusay</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			magaling</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			marikit</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			maganda</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mahirap</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			maralita</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			maikli</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			maigsi</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			makitid</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			makipot</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			malamig</font></td>
																			<td width="188" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			maginaw</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			maliit</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			munti</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mapalad</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			masuwerte</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			matalim</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			matalas</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			matamo</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			makamit</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mayaman</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			mariwasa</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mesa</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hapag</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mula</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			buhat, 
																			galing</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			mundo</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			daigdig</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			nakaraan</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			nakalipas</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			napuna</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			napansin</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			ngayon</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			kasalukuyan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			opisina</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tanggapan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			ospital</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pagamutan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			pag-ibig</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pagmamahal</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			palengke</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pamilihan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			pananaw</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			paningin</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			pera</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			salapi</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			pila</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hanay</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			pirma</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			lagda</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			plato</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pinggan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			premyo</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			gantimpala</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			pumalit</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			humalili</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			puwesto</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			posisyon</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			rason</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			dahilan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			respeto</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			paggalang</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			sagot</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tugon</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			sakop</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			saklaw</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			sanay</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			bihasa</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			sigaw</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			hiyaw</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			simula</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			umpisa</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			sobra</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			labis</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			sundalo</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			kawal</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			taas</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tayog, 
																			tangkad</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			tala</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			bituin</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			tama</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			tumpak</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			tibok</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			pintig</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			tunay</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			totoo</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			tuwa</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			galak, 
																			saya</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			upuan</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			silya</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			uri</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			klase</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			utos</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			atas</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			wakas</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			katapusan</font></td>
																		</tr>
																		<tr>
																			<td width="106" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#800080">
																			yakap</font></td>
																			<td width="188" align="center" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 16pt" color="#333333">
																			yapos</font></td>
																		</tr>
											</table>
															</td>
														</tr>
													</table>
											</div>
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