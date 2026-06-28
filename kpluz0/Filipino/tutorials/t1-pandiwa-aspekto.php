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
<title>Mga Aspekto ng Pandiwa - Filipino sa KPluz.com</title>
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
										Mga Aspekto ng
										Pandiwa</font></span>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">&nbsp; &nbsp;&nbsp;&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">&nbsp;&nbsp;&nbsp;
											</span></font></p>
																	<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	May tatlong 
																	aspekto ang
																	pandiwa: 
																	pangnagdaan, 
																	pangkasalukuyan, at 
																	panghinaharap.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: -5px; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pangnagdaan</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	Ang
																	pandiwa 
																	ay 
																	</font>
																	<font face="Arial" style="font-size: 16pt" color="#990000">
																	pangnagdaan</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
																	kung ang kilos o 
																	galaw ay naganap na.&nbsp;
																	</font>
																	</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 5px; margin-bottom: 10px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Mga 
																	Halimbawa ng
																	Pandiwang Pangnagdaan</font></span></p>
												<table border="0" width="560" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														gumawa</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														huminto</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														kumain</font></td>
													</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														kumanta</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														lumiko</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nag-aral</font></td>
													</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagbantay</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagkalat</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagising</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														naglinis</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagsayaw</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagtanim</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														natulog</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														tumakbo</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														umalis</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														uminom</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														umulan</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														winasak</font></td>
														</tr>
													</table>
											<table border="0" width="560" cellspacing="0" cellpadding="0" style="border-style:solid; border-color:#C0C0C0; margin-left:0">
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 5px; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Paggamit ng
																	Pandiwang</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Pangnagdaan 
																	sa 
																	Pangungusap</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#990000">&nbsp;
																	</font>
																	</span></p>
												<table border="0" width="500" cellspacing="0" cellpadding="0" style="border-width:0px; border-style:solid; margin-left:0">
													<tr>
														<td width="300" align="center" valign="bottom">
														<p style="margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/sumisipa.jpg" width="184" height="163" style="border: 1px solid #C0C0C0"></td>
														<td width="300" align="center" valign="bottom">
														<p style="margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/nabasag.jpg" width="196" height="135" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#800080">
														Sinipa</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
														niya ang bola.</font></td>
														<td width="300" align="center">
														<p style="margin-left: 10px; margin-right: 10px; margin-bottom: 5px" align="center">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Ang baso ay </font>
														<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#800080">
														nabasag</font><font face="Arial" style="font-size: 16pt" color="#333333">.</font></td>
													</tr>
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
												<table border="0" width="500" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Si Sam ay </font>
														<font face="Arial" style="font-size: 16pt; font-weight:700" color="#800080">
														bumili</font><font face="Arial" style="font-size: 16pt" color="#333333">
														ng relo kahapon.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Ako ang </font>
														<font face="Arial" style="font-size: 16pt; font-weight:700" color="#800080">
														naghatid</font><font face="Arial" style="font-size: 16pt" color="#333333">
														kay Emma kanina.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														May </font>
														<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#800080">
														sinabi</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
														siya sa akin kagabi.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Ito ang bag na </font>
														<font face="Arial" style="font-size: 16pt; font-weight:700" color="#800080">
														iniwan</font><font face="Arial" style="font-size: 16pt" color="#333333">
														ni Robert kahapon.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt; font-weight:700" color="#800080">
														Nawala</font><font face="Arial" style="font-size: 16pt" color="#333333">
														ang pitaka ni Dondon 
														noong Lunes. </font></td>
														</tr>
													</table>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: -5px; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pangkasalukuyan</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	Ang
																	pandiwa 
																	ay 
																	</font>
																	<font face="Arial" style="font-size: 16pt" color="#990000">
																	pangkasalukuyan</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
																	kung ang kilos o 
																	galaw ay 
																	kasalukuyang nagaganap.&nbsp; 
																	Pangkasalukuyan 
																	din ang 
																	pandiwa kung 
																	ang kilos o 
																	galaw ay 
																	paulit-ulit 
																	na nagaganap.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 5px; margin-bottom: 10px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Mga 
																	Halimbawa ng
																	Pandiwang Pangkasalukuyan</font></span></p>
												<table border="0" width="560" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														gumagawa</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														kumakain</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														kumakanta</font></td>
													</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														lumuluha</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nag-aaral</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagbabantay</font></td>
													</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagkakalat</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														naglilinis</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagsasayaw</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														nagtatanim</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														natutulog</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														tumatakbo</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														umaalis</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														umiinom</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														umuulan</font></td>
														</tr>
													</table>
											<table border="0" width="560" cellspacing="0" cellpadding="0" style="border-style:solid; border-color:#C0C0C0; margin-left:0">
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 5px; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Paggamit ng
																	Pandiwang</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Pangkasalukuyan 
																	sa 
																	Pangungusap</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#990000">&nbsp;
																	</font>
																	</span></p>
												<table border="0" width="540" cellspacing="0" cellpadding="0" style="border-width:0px; border-style:solid; margin-left:0">
													<tr>
														<td width="300" align="center" valign="bottom">
														<p style="margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/sunod.jpg" width="200" height="141"></td>
														<td width="300" align="center" valign="bottom">
														<p style="margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/nagtuturo.jpg" width="200" height="133"></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 5px; margin-right: 5px; margin-bottom: 5px" align="center">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														<span style="font-weight: 700">
														Naglalakad</span></font><font face="Arial" style="font-size: 16pt" color="#333333"> 
														ang mga bibi.</font></td>
														<td width="300" align="center">
														<p style="margin-left: 5px; margin-right: 5px; margin-bottom: 5px" align="center">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Ang guro ay </font>
														<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#800080">
														na</font><font face="Arial" style="font-size: 16pt" color="#800080"><span style="font-weight: 700">gtuturo</span></font><font face="Arial" style="font-size: 16pt" color="#333333">.</font></td>
													</tr>
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
												<table border="0" width="500" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Si Toyang ay </font>
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														nagluluto</font></span><font face="Arial" style="font-size: 16pt" color="#333333">
														sa kusina.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														Naliligo</font></span><font face="Arial" style="font-size: 16pt" color="#333333">
														si Mandy tuwing umaga. </font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Ito ang aklat na </font>
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														binabasa</font></span><font face="Arial" style="font-size: 16pt" color="#333333">
														ni Sonia ngayon.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														Bumubuhos</font></span><font face="Arial" style="font-size: 16pt" color="#333333"> 
														na naman ang ulan sa 
														labas.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Ang sanggol ay </font>
														<font face="Arial" style="font-size: 16pt; font-weight:700" color="#800080">
														na</font><span style="font-weight: 700"><font face="Arial" style="font-size: 16pt" color="#800080">tutulog</font></span><font face="Arial" style="font-size: 16pt" color="#333333">
														sa kama ni Marie.</font></td>
														</tr>
													</table>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: -5px; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Panghinaharap</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 16pt" color="#333333">
																	Ang
																	pandiwa 
																	ay 
																	</font>
																	<font face="Arial" style="font-size: 16pt" color="#990000">
																	panghinaharap</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
																	kung ang kilos o 
																	galaw ay 
																	hindi pa 
																	nangyayari o 
																	nagaganap.&nbsp;
																	</font>
																	</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 5px; margin-bottom: 10px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Mga 
																	Halimbawa ng
																	Pandiwang Panghinaharap</font></span></p>
												<table border="0" width="560" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														gagawa</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														kakain</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														kakanta</font></td>
													</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														luluha</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														mag-aaral</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														magbabantay</font></td>
													</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														magkakalat</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														maglilinis</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														magsasayaw</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														magtatanim</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														matutulog</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
											<font face="Arial" style="font-size: 16pt" color="#333333">
														tatakbo</font></td>
														</tr>
													<tr>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														aalis</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														iinom</font></td>
														<td width="186" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														uulan</font></td>
														</tr>
													</table>
											<table border="0" width="560" cellspacing="0" cellpadding="0" style="border-style:solid; border-color:#C0C0C0; margin-left:0">
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 5px; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Paggamit ng
																	Pandiwang</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 15pt" color="#990000">
																	Panghinaharap 
																	sa 
																	Pangungusap</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 13pt" color="#990000">&nbsp;
																	</font>
																	</span></p>
												<table border="0" width="540" cellspacing="0" cellpadding="0" style="border-width:0px; border-style:solid; margin-left:0">
													<tr>
														<td width="300" align="center" valign="bottom">
														<p style="margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/kakain2.jpg" style="border: 1px solid #C0C0C0"></td>
														<td width="300" align="center" valign="bottom">
														<p style="margin-bottom: 5px">
														<img border="0" src="../images/bokabularyo/iiyak.jpg"></td>
													</tr>
													<tr>
														<td width="300" align="center">
														<p style="margin-left: 5px; margin-right: 5px; margin-bottom: 5px" align="center">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														Kakain </font></span>
														<font face="Arial" style="font-size: 16pt" color="#333333">
														si Gina. </font></td>
														<td width="300" align="center">
														<p style="margin-left: 5px; margin-right: 5px; margin-bottom: 5px" align="center">
														<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#800080">
														Iiyak</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
														na si Tommy.</font></td>
													</tr>
													</table>
												<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></p>
												<table border="0" width="500" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Sina Bing at Bong ay </font>
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														aalis</font></span><font face="Arial" style="font-size: 16pt" color="#333333">
														bukas.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Si Aling Nita ay </font>
														<font face="Arial" style="font-size: 16pt; font-weight:700" color="#800080">
														mag</font><span style="font-weight: 700"><font face="Arial" style="font-size: 16pt" color="#800080">lalaba</font></span><font face="Arial" style="font-size: 16pt" color="#333333">
														mamaya.</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														May </font>
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														ibubulong</font></span><font face="Arial" style="font-size: 16pt" color="#333333"> 
														ka ba sa akin?</font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#333333">
														Si Sarah ay </font>
														<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#800080">
														pupunta</font><font face="Arial" style="font-size: 16pt" color="#333333"> 
														rito sa Pasko. </font></td>
														</tr>
													<tr>
														<td width="558" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<font face="Arial" style="font-size: 16pt" color="#800080">
														<span style="font-weight: 700">
														Sasama</span></font><font face="Arial" style="font-size: 16pt" color="#333333">
														akong manood ng sine sa 
														Huwebes.</font></td>
														</tr>
													</table>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: 0; margin-bottom: 0" align="center">
											<span style="font-weight: 700">
											<font face="Arial" style="font-size: 18pt" color="#0000CC">
											Mga Dagdag na</font></span></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<span style="font-weight: 700">
											<font face="Arial" style="font-size: 18pt" color="#0000CC">
											Halimbawa</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<table border="0" width="600" cellspacing="0" cellpadding="0" style="border: 1px solid #CCCCCC; margin-left:0">
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
													<font face="Arial" color="#800080" style="font-size: 15pt; font-weight: 700">Pangnagdaan</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
													<font face="Arial" color="#800080" style="font-size: 15pt; font-weight: 700">Pangkasalukuyan</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
													<font face="Arial" color="#800080" style="font-size: 15pt; font-weight: 700">Panghinaharap</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">bumili</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">bumibili</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">bibili</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">nagbuhat</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">nagbubuhat</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">magbubuhat</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">naghati</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">naghahati</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">
													maghahati</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">naglakad</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">naglalakad</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">
													maglalakad</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">pumilit</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">pumipilit</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">pipilit</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">pumitas</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">pumipitas</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">pipitas</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tumalon</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tumatalon</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tatalon</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tumugtog</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tumutugtog</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tutugtog</font></td>
												</tr>
												<tr>
													<td width="199" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tumumba</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="199" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tumutumba</font></td>
													<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="200" align="center">
													<p style="margin-left: 5px; margin-top: 3px; margin-bottom: 3px">
													<font face="Arial" style="font-size: 16pt" color="#333333">tutumba</font></td>
												</tr>
											</table>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<span style="font-size: 13pt">
											<font face="Arial">
											&nbsp;&nbsp;
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