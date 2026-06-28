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
<title>Pang-angkop - Filipino sa KPluz.com</title>
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
										Pang-angkop</font></span>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
											</font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
																	<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333"> 
																	Ang </font>
																	<font face="Arial" style="font-size: 13pt" color="#990000"> 
																	pang-angkop</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	ay isang 
																	kataga at 
																	bahagi ng 
																	pananalitang 
																	nag-uugnay 
																	sa panuring 
																	(tulad ng 
																	pang-uri at 
																	pang-abay) 
																	at salitang 
																	tinuturingan. 
																	Tatlong 
																	pang-angkop 
																	ang 
																	ginagamit sa 
																	pananalita: 
																	'na', 'ng', 
																	at 'g'.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
											
											<p style="margin-top: 0; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pang-angkop
								na 'na'</font></span><font size="5" color="#0000CC">
								</font>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	pang-angkop na
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	'na'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	ginagamit sa 
																	pag-uugnay 
																	ng dalawang 
																	salita kung 
																	saan ang 
																	unang salita 
																	ay 
																	nagtatapos 
																	sa isang 
																	katinig 
																	maliban sa 
																	titik 'n'.&nbsp;
																	</font>
																	</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	Mga 
																	Halimbawa ng 
																	Paggamit ng 
																	Pang-angkop 
																	na 'na':</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">&nbsp;
																	</font></p>
											<div align="left">
												<table border="0" width="480" cellspacing="0" cellpadding="0" style="border: 1px solid #CCCCCC; margin-left: 80">
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Unang</font></span><p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Salita</font></span></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Pangalawang </font>
														</span>
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Salita</font></span></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" color="#800080" style="font-size: 12pt; font-weight: 700">
														Pinag-ugnay na</font><p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														mga Salita</font></span></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malinis</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														batis</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malinis
														<font color="#990000">na</font> 
														batis</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														sisiw</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														maliit</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														sisiw
														<font color="#990000">na</font> 
														maliit</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														maingay</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														kuting</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														maingay<font color="#990000"> 
														na</font> kuting</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														mag-aaral</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														masipag</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														mag-aaral<font color="#990000"> 
														na</font> masipag</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														mabait</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														guro</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														mabait
														<font color="#990000">na</font> 
														guro</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														bahay</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malaki</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														bahay
														<font color="#990000">na</font> 
														malaki</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malapit</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														ospital</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malapit
														<font color="#990000">na</font> 
														ospital</font></td>
													</tr>
												</table>
											</div>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
											
											<p style="margin-top: 0; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pang-angkop
								na 'ng'</font></span><p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	pang-angkop na
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	'ng'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	ginagamit sa 
																	pag-uugnay 
																	ng dalawang 
																	salita kung 
																	saan ang 
																	unang salita 
																	ay 
																	nagtatapos 
																	sa isang 
																	patinig.&nbsp; 
																	Ikinakabit 
																	ito sa dulo 
																	ng unang 
																	salita.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	Mga 
																	Halimbawa ng 
																	Paggamit ng 
																	Pang-angkop 
																	na 'ng':</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">&nbsp;
																	</font></p>
											<div align="left">
												<table border="0" width="480" cellspacing="0" cellpadding="0" style="border: 1px solid #CCCCCC; margin-left: 80">
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Unang</font></span><p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Salita</font></span></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Pangalawang </font>
														</span>
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Salita</font></span></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" color="#800080" style="font-size: 12pt; font-weight: 700">
														Pinag-ugnay na</font><p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														mga Salita</font></span></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														bato</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malaki</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														bato<font color="#990000">ng</font> 
														malaki</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														matalino</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														tao</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														matalino<font color="#990000">ng</font> 
														tao</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lata</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														kinalawang</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lata<font color="#990000">ng</font> 
														kinalawang</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lalaki</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														matangkad</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lalaki<font color="#990000">ng</font> 
														matangkad</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														bote</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malamig</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														bote<font color="#990000">ng</font> 
														malamig</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														datu</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														matapang</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														datu<font color="#990000">ng</font> 
														matapang</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														balde</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														plastik</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														balde<font color="#990000">ng</font> 
														plastik</font></td>
													</tr>
												</table>
											</div>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
											
											<p style="margin-top: 0; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pang-angkop
								na 'g'</font></span><p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	pang-angkop na
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	'g'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	ginagamit sa 
																	pag-uugnay 
																	ng dalawang 
																	salita kung 
																	saan ang 
																	naunang 
																	salita ay 
																	nagtatapos 
																	sa titik 'n'.&nbsp; 
																	Ikinakabit 
																	ito sa dulo 
																	ng unang 
																	salita.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	Mga 
																	Halimbawa ng 
																	Paggamit ng 
																	Pang-angkop 
																	na 'g':</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">&nbsp;
																	</font></p>
											<div align="left">
												<table border="0" width="480" cellspacing="0" cellpadding="0" style="border: 1px solid #CCCCCC; margin-left: 80">
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Unang</font></span><p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Salita</font></span></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Pangalawang </font>
														</span>
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														Salita</font></span></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" color="#800080" style="font-size: 12pt; font-weight: 700">
														Pinag-ugnay na</font><p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 12pt">
														mga Salita</font></span></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														balon</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														malalim</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														balon<font color="#990000">g</font> 
														malalim</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														atin</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														pamilya</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														atin<font color="#990000">g</font> 
														pamilya</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														upuan</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														matigas</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														upuan</font><font color="#990000" style="font-size: 12pt" face="Arial">g</font><font face="Arial" style="font-size: 12pt"> 
														matigas</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														daan</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														matuwid</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														daan<font color="#990000">g</font> 
														matuwid</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														sabon</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														madulas</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														sabon</font><font color="#990000" style="font-size: 12pt" face="Arial">g</font><font face="Arial" style="font-size: 12pt"> 
														madulas</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														kahon</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														mabigat</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														kahon<font color="#990000">g</font> 
														mabigat</font></td>
													</tr>
													<tr>
														<td width="119" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lawin</font></td>
														<td width="120" bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lumipad</font></td>
														<td bordercolor="#CCCCCC" style="border: 1px solid #C0C0C0" width="237">
														<p style="margin-left: 5px; margin-top: 2px; margin-bottom: 2px">
														<font face="Arial" style="font-size: 12pt">
														lawin<font color="#990000">g</font> 
														lumipad</font></td>
													</tr>
												</table>
											</div>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
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