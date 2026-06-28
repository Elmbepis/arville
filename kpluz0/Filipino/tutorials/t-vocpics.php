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
<title>Pag-uugnay ng Larawan sa Katawagan - Filipino sa KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'images/backb.jpg')">

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
										Pag-uugnay ng Larawan sa</font></span></p>
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 22pt" color="#990000">
										Katawagan </font></span>
										<font face="Arial" style="font-size: 20pt" color="#990000">
										(Filipino at Ingles)</font></p>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">&nbsp; &nbsp;&nbsp;&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">&nbsp;&nbsp;&nbsp;
											</span></font></p>
												<table border="0" width="620" cellspacing="0" cellpadding="0" style="border-width:0px; border-style:solid; margin-left:0">
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/ampibyo2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	ampibyo</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	amphibian</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/bulalakaw2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	bulalakaw</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	meteor</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/araknida2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	araknida</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	arachnid</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/batingaw2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	batingaw</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	(large) bell</font></td>
																</tr>
															</table>
														</div>
														</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/pantablay.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pantablay</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	charger</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/pugita2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pugita</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	octopus</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/hunyango2.jpg" style="border: 1px solid #C0C0C0"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt; font-weight: 700" color="#800080">
																	hunyango</font></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	chameleon</font></td>
																</tr>
															</table>
														</div>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/kumunoy2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	kumunoy</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	quicksand</font></td>
																</tr>
															</table>
														</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/bahaghari2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	bahaghari</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	rainbow</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/largabista2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	largabista</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	binocular(s)</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/bisagra2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	bisagra</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	hinge</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/balintataw2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	balintataw</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	(eye) pupil</font></td>
																</tr>
															</table>
														</div>
														</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/talumpati.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	talumpati</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	speech</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/bakawan.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	bakawan</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	mangrove</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/barikada.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	barikada</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	barricade</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/asero.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	asero</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	steel</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/karatula.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	karatula</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	sign board</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/batobalani.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	bato-balani</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	magnet</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/pagbabasbas.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pagbabasbas</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	blessing</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/garing2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	garing</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	ivory/tusk</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/dalampasigan2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	dalampasigan</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	seashore</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/takipsilim2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	takipsilim</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	dusk</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/balinguyngoy2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 13pt">
																	balinguyngoy</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	nosebleed</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/kalasag2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	kalasag</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	shield</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/salagubang2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	salagubang</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	beetle</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/simboryo2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	simboryo</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	dome</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/talulot2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	talulot</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	petal</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/alimpuyo2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	alimpuyo</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	whirlwind</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/katad2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	katad</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	hide/leather</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/mangangaso2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	mangangaso</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	hunter</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/amatista2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	amatista</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	amethyst</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/palamuti2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	palamuti</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	decoration</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/bantayog2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	bantayog</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	monument</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/kalatas2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	kalatas</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	letter/message</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/dambana2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	dambana</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	altar</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/tapayan2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	tapayan</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	clay jar</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/daungan2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	daungan</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	harbor</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/alingawngaw2.jpg" style="border: 1px solid #C0C0C0"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	alingawngaw</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	echo</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/anluwagi2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	anluwagi</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	carpenter</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/panghimagas2.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	panghimagas</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	dessert</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														<td width="170" align="center" valign="bottom">&nbsp;</td>
														</tr>
													<tr>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/singsing-pari.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	singsing-pari</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	millipede</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/alupihan.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	alupihan</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	centipede</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/balunbalunan.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p align="center" style="margin-top: 2px">
																	<b>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	balunbalunan</font></b></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	gizzard</font></td>
																</tr>
															</table>
														</div>
														</td>
														<td width="170" align="center" valign="bottom">
														<div align="center">
															<table border="0" width="130" cellspacing="0" cellpadding="0">
																<tr>
																	<td>
														<p align="center">
														<img border="0" src="../images/bokabularyo/karwahe.jpg" style="border: 1px solid #C0C0C0" width="120" height="120"></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	karwahe</font></span></td>
																</tr>
																<tr>
																	<td align="center">
																	<p style="margin-top: 2px">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	carriage</font></td>
																</tr>
															</table>
														</div>
														</td>
													</tr>
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font color="#333333" face="Arial" style="font-size: 13pt">
																	&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
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