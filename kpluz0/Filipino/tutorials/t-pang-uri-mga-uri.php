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
<title>Mga Uri ng Pang-uri - Filipino sa KPluz.com</title>
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
										<p align="center" style="margin-top: 50px; margin-bottom: 0; margin-left:80px; margin-right:80px">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 22pt" color="#990000">
										Mga Uri ng Pang-uri </font></span></p>
										
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
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	May tatlong 
																	uri ng
																	<a href="t-pang-uri.php">
																	pang-uri</a>: 
																	panlarawan, 
																	pamilang, at 
																	pantangi.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: 0; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pang-uring</font></span><p style="margin-top: -5px; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Panlarawan</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-uring 
																	panlarawan</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay pang-uring 
																	ginagamit 
																	upang isaad 
																	ang 
																	katangian ng 
																	isang 
																	pangngalan o 
																	panghalip.&nbsp;
																	</font>
																	</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<table border="0" width="484" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Arial" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" ></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="484">
											<p style="margin-left: 55px; margin-right: 50px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Arial" style="font-size: 14pt" color="#000080">
																	Si Mang 
																	Damian ay 
																	isang
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	mabait</font><font face="Arial" style="font-size: 14pt" color="#000080">,
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	matalino</font><font face="Arial" style="font-size: 14pt" color="#000080">,
																	at
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	mahusay </font>
																	<font face="Arial" style="font-size: 14pt" color="#000080">
																	na 
																	manggagamot.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Arial" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Sa 
																	pangungusap 
																	sa itaas, 
																	ang mga 
																	salitang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;mabait'</font><font face="Arial" style="font-size: 13pt" color="#333333">, </font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	'matalino'</font><font face="Arial" style="font-size: 13pt" color="#333333">, 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;mahusay'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-uring 
																	panlarawan.&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	&nbsp;</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	Mga 
																	Halimbawa ng 
																	Pang-uring 
																	Panlarawan:</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											&quot;bago&quot;, &quot;baluktot&quot;, &quot;ligtas&quot;, 
											&quot;luma&quot;, &quot;maalat&quot;, &quot;maayos&quot;, &quot;mababa&quot;,
											&quot;mabait&quot;, &quot;mabango&quot;, &quot;madumi&quot;, &quot;malapad&quot;, 
											&quot;maliit&quot;, &quot;malinaw&quot;, &quot;malinis&quot;, &quot;magaspang&quot;, 
											&quot;masinsin&quot;,&nbsp; &quot;mataas&quot;, &quot;mataba&quot;, 
											&quot;matangkad&quot;, &quot;pangit&quot;, &quot;payat&quot;, </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: 0; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pang-uring</font></span><p style="margin-top: -5px; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pamilang</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang </font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-uring 
																	pamilang</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	pang-uring nagsasaad ng 
																	dami o 
																	bilang ng 
																	pangngalan o 
																	panghalip na 
																	inilalarawan 
																	nito.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<table border="0" width="484" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Arial" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" ></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="484">
											<p style="margin:0 40px; " align="center">
																	<font face="Arial" style="font-size: 14pt" color="#000080">
																	Si Dondon ay 
																	nagdala ng
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	tatlong</font><font face="Arial" style="font-size: 14pt" color="#000080">
																	aklat at
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	sampung</font><font face="Arial" style="font-size: 14pt" color="#000080">
																	lapis 
																	kahapon.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Arial" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Sa 
																	pangungusap 
																	sa itaas, 
																	ang mga 
																	salitang </font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;tatlong'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	(salitang 
																	ugat: tatlo) 
																	at </font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	'sampung'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	(salitang 
																	ugat: sampu) 
																	ay mga pang-uring 
																	pamilang. &nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<table border="0" width="484" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Arial" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" ></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="484">
											<p style="margin-left: 55px; margin-right: 50px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Arial" style="font-size: 14pt" color="#000080">
																	Si Delilah 
																	ang </font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	pangalawang</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	kalahok sa 
																	patimpalak.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Arial" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Sa 
																	pangungusap 
																	sa itaas, 
																	ang salitang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	'pangalawang'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	(salitang 
																	ugat: 
																	dalawa) 
																	ay isa ring 
																	halimbawa ng 
																	pang-uring 
																	pamilang.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Mapapansing 
																	magkaiba ang 
																	uri ng mga 
																	pang-uring 
																	pamilang sa 
																	una at 
																	ikalawang 
																	pangungusap.&nbsp; 
																	Ito ay dahil 
																	may iba't 
																	ibang uri ng 
																	pang-uring 
																	pamilang.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	May anim na 
																	uri ang 
																	pang-uring 
																	pamilang: 
																	patakaran, 
																	panunuran, pamahagi, 
																	palansak, 
																	pahalaga, at 
																	patakda.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Upang 
																	maunawaan 
																	ang mga 
																	iba't ibang 
																	uri ng pang-uring 
																	pamilang, 
																	basahin ang 
																	pahinang ito:
																	<a href="t-pamilang-mga-uri.php">
																	Mga Uri ng 
																	Pang-uring 
																	Pamilang</a></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
													<p style="margin-top: 0; margin-bottom: 0">
													&nbsp;<p style="margin-top: 0; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pang-uring</font></span><p style="margin-top: -5px; margin-bottom: 0" align="center">
								<span style="font-weight: 700">
								<font face="Arial" style="font-size: 18pt" color="#0000CC">
								Pantangi</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-uring 
																	pantangi</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	pang-uring 
																	hango sa o 
																	may anyo ng 
																	isang 
																	pangngalang 
																	pantangi.&nbsp; 
																	Karaniwan 
																	itong 
																	ginagamit sa 
																	pagsasaad ng 
																	hilig o 
																	pinagmulan 
																	ng isang 
																	pangngalan o 
																	panghalip.&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<table border="0" width="484" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Arial" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" ></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="484">
											<p style="margin-left: 45px; margin-right: 40px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Arial" style="font-size: 14pt" color="#000080">
																	Si Henry ay 
																	humabol sa 
																	biyaheng
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Bicol</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	kagabi upang 
																	makapagdala 
																	ng sapatos 
																	na </font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	gawang-Marikina</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	sa kanyang 
																	kapatid.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Arial" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Sa 
																	pangungusap 
																	sa itaas, 
																	ang salitang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;Bicol'</font><font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; 
																	at
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;gawang-Marikina'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	ay mga 
																	halimbawa ng 
																	pang-uring 
																	pantangi.</font></p>
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