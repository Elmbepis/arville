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
<title>Mga Salitang Magkasalungat - Filipino sa KPluz.com</title>
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
										Mga Salitang Magkasalungat</font></span>
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
											<font face="Arial" style="font-size: 13pt" color="#333333"> 
											Ang mga salitang
											</font>
											<em style="font-style: normal">
											<font face="Arial" style="font-size: 13pt" color="#990000"> 
											magkasalungat</font></em><font face="Arial" style="font-size: 13pt" color="#333333"> 
											ay mga salitang may magkabaligtad na 
											kahulugan.&nbsp; Halimbawa,
											</font>
											<font face="Arial" style="font-size: 13pt" color="#990000"> 
											magkasalungat</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
											ang mga salitang &#39;payat&#39; at &#39;mataba&#39;.</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<span class="st">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;
											</font></span></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#990000">
																	Mga
																	</font>
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Halimbawa ng 
																	mga</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 15px">
																	<span style="font-weight: 700">
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Salitang 
																	Magkasalungat</font></span></p>
												<div align="center">
													<table border="0" width="570" cellspacing="0" cellpadding="0" style="margin-left:0">
														<tr>
															<td width="310" align="center" valign="top">
																	<table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #C0C0C0; ; margin-left:0">
																		<tr>
																			<td align="center" width="149" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			akyat</font></td>
																			<td align="center" width="149" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			baba</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			araw</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			gabi</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			atras</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			abante</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			babae</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			lalaki</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			bago</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			luma</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			basa</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			tuyo</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			bata</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			matanda</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			buhay</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			patay</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			bukas</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			sarado</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			buo</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			kulang</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			dito</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			doon</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			dumating</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			umalis</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			gutom</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			busog</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			harap</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			likod</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			hinog</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			hilaw</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			huli</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			una</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			ilalim</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			ibabaw</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			itago</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			ilabas</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			itim</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			puti</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			kaibigan</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			kaaway</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			kanan</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			kaliwa</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			loob</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			labas</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 8px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maamo</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mabangis</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maaraw</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			maulan</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maayos</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			magulo</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mabigat</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			magaan</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 0 3px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mabilis</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mabagal</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mabuti</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			masama</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maganda</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			pangit</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			madalas</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			bihira</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 2px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mahaba</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			maikli</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mahirap</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			madali</font></td>
																		</tr>
											</table>
															</td>
															<td width="30" align="center" valign="top">&nbsp;</td>
															<td width="310" align="center" valign="top">
																	<table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #C0C0C0; ; margin-left:0">
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maingat</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			pabaya</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maingay</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			tahimik</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			makapal</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			manipis</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			makinis</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			magaspang</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malakas</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mahina</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malalim</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mababaw</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malambot</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			matigas</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malamig</font></td>
																			<td width="149" align="center" height="24" style="border: 1px solid #C0C0C0">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mainit</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malapot</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			malabnaw</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malawak</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			makitid</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maliit</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin:3px 10px; ">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			malaki</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malinaw</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			malabo</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			malinis</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			marumi</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			maliwanag</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			madilim</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			manalo</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			matalo</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			marami</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			kaunti</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			masaya</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			malungkot</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			masipag</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			tamad</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mataba</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			payat</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			matalim</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mapurol</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			mayaman</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mahirap</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			palagi</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			bihira</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			panalo</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			talo</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			pareho</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			magkaiba</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			posible</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			imposible</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			simula</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			wakas</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			sobra</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			kulang</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			tama</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			mali</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			tulak</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			hila</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			tulog</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			gising</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			tunay</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			huwad</font></td>
																		</tr>
																		<tr>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#800080">
																			una</font></td>
																			<td width="149" align="center" style="border: 1px solid #C0C0C0" height="24">
																			<p style="margin: 3px 10px">
																			<font face="Arial" style="font-size: 14pt" color="#333333">
																			huli</font></td>
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