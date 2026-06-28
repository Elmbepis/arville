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
<title>Mga Uri ng Pang-abay - Filipino sa KPluz.com</title>
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
										Mga Uri ng
										Pang-abay</font></span></p>
										
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
																	May walong 
																	uri ng
																	<a href="t-pang-abay.php">pang-abay</a>: 
																	pamaraan, 
																	pamanahon, 
																	panlunan, panggaano, 
																	panang-ayon, pananggi, 
																	pang-agam, at ingklitik.</font></p>
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
								Pang-abay na
								Pamaraan</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	pamaraan</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	naglalarawan 
																	kung paano 
																	naganap, 
																	nagaganap, o 
																	magaganap 
																	ang kilos na 
																	ipinahahayag 
																	ng pandiwa.&nbsp;
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
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Maingat</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	na nilinis 
																	ni Marco ang 
																	mamahaling 
																	alahas at 
																	itinago niya 
																	ito nang
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	mabilis</font><font face="Arial" style="font-size: 14pt" color="#000080">.</font></p>
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
																	&#39;maingat'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;mabilis'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	pamaraan.&nbsp; </font></p>
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
								Pang-abay na
								Pamanahon</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	pamanahon</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay nagsasaad 
																	kung kailan 
																	naganap, 
																	nagaganap, o 
																	magaganap 
																	ang kilos na 
																	ipinahahayag 
																	ng pandiwa.&nbsp; 
																	Maaari rin 
																	itong 
																	magsaad ng 
																	dalas ng 
																	pagganap ng 
																	kilos.</font></p>
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
																	Bumili ng 
																	karne ng 
																	baka si 
																	Divina
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	kahapon</font><font face="Arial" style="font-size: 14pt" color="#000080">.&nbsp; 
																	Balak niya 
																	itong iluto
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	sa Sabado</font><font face="Arial" style="font-size: 14pt" color="#000080">.</font></p>
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
																	ang 
																	salitang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;kahapon'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	pariralang 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;sa 
																	Sabado'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	pamanahon.&nbsp; </font></p>
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
																	Nagpupuyat 
																	siya </font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	gabi-gabi</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	kaya </font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	madalas</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	siyang 
																	antukin.</font></p>
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
																	&#39;gabi-gabi'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;madalas'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	pamanahong 
																	nagsasaad ng 
																	dalas ng 
																	kilos.&nbsp; </font></p>
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
								Pang-abay na
								Panlunan</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	panlunan</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay nagsasaad 
																	kung saan 
																	naganap, 
																	nagaganap, o 
																	magaganap 
																	ang kilos na 
																	ipinahahayag 
																	ng pandiwa.&nbsp;
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
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Sa Cavite</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	namasyal 
																	sina Ryan 
																	pagkatapos 
																	nilang 
																	dumalaw
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	sa isang 
																	ampunan</font><font face="Arial" style="font-size: 14pt" color="#000080">.</font></p>
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
																	pariralang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;sa 
																	Cavite'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;sa 
																	isang 
																	ampunan'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	panlunan.&nbsp; </font></p>
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
								Pang-abay na
								Panggaano</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	panggaano</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay 
																	naglalarawan 
																	ng dami, 
																	timbang, o 
																	sukat ng 
																	kilos na 
																	ipinahahayag 
																	ng pandiwa.&nbsp;
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
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Marami</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	siyang 
																	nakain mula 
																	kahapon kaya 
																	bumigat siya
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	nang limang 
																	libra</font><font face="Arial" style="font-size: 14pt" color="#000080">.</font></p>
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
																	ang 
																	salitang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;marami'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at ang&nbsp; 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	pariralang
																	&#39;nang 
																	limang libra'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	panggaano.&nbsp; </font></p>
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
								Pang-abay na
								Panang-ayon</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	panang-ayon</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay nagsasaad 
																	ng 
																	pagpapatotoo 
																	o 
																	pagsang-ayon 
																	sa pang-uri, 
																	pang-abay, o 
																	pandiwang 
																	inilalarawan 
																	nito.&nbsp;
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
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Talagang</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	mabilis na 
																	ang 
																	pagsulong ng 
																	teknolohiya 
																	kaya </font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	sadyang</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	nakakapanibago 
																	ito sa mga 
																	matatanda.</font></p>
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
																	&#39;talaga'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;sadya'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	panang-ayon.&nbsp; </font></p>
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
								Pang-abay na
								Pananggi</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	pananggi</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay nagsasaad 
																	ng pagtanggi 
																	o pagtutol 
																	sa pang-uri, 
																	pang-abay, o 
																	pandiwang 
																	inilalarawan 
																	nito.&nbsp;
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
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	Ayaw</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	niyang 
																	sumama sa 
																	ilog&nbsp; 
																	dahil </font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	hindi</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	kaakit-akit 
																	sa kanya ang 
																	kapaligiran 
																	nito.</font></p>
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
																	&#39;ayaw'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;hindi'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	pananggi.&nbsp; </font></p>
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
								Pang-abay na
								Pang-agam</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	pang-agam</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay nagsasaad 
																	ng 
																	pag-aalinlangan 
																	o kawalan ng 
																	katiyakan sa 
																	pang-uri, 
																	pang-abay, o 
																	pandiwang 
																	inilalarawan 
																	nito.&nbsp;
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
																	Si Abner na
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	marahil</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	ang 
																	pinakamalihim 
																	sa kanilang 
																	opisina kaya
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	tila</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	iniiwasan 
																	siya ng iba 
																	niyang 
																	kasamahan.</font></p>
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
																	&#39;marahil'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;tila'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na 
																	pang-agam.&nbsp; </font></p>
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
								Pang-abay na
								Ingklitik</font></span><p style="margin-top: 0; margin-bottom: 0">
&nbsp;<p align="justify" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom:0">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">
																	Ang
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#800080">
																	pang-abay na 
																	ingklitik</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay katagang 
																	nagbibigay 
																	ng 
																	karagdagang 
																	kaalaman 
																	ukol sa 
																	pang-uri, 
																	pang-abay, o 
																	pandiwang 
																	inilalarawan 
																	nito nguni't 
																	maaari itong 
																	tanggalin sa 
																	pangungusap.&nbsp; 
																	Ilan sa mga 
																	halimbawa ng 
																	pang-abay na 
																	ingklitik 
																	ang mga 
																	sumusunod: &quot;daw&quot;, 
																	&quot;din&quot;, &quot;naman&quot;, 
																	&quot;pala&quot;, 
																	&quot;man&quot;, &quot;nga&quot;, 
																	&quot;na&quot;, &quot;pa&quot;, 
																	&quot;ba&quot;, &quot;sana&quot;, 
																	&quot;muna&quot;, &quot;lang&quot;.</font></p>
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
																	Matutulog
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	muna</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	sila dahil 
																	malayo
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#990000">
																	raw</font><font face="Arial" style="font-size: 14pt" color="#000080"> 
																	ang 
																	lalakbayin 
																	nila mamaya.</font></p>
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
																	&#39;muna'</font><font face="Arial" style="font-size: 13pt" color="#333333"> 
																	at 
																	</font>
																	<font face="Arial" style="font-size: 13pt" color="#990000">
																	&#39;raw'</font><font face="Arial" style="font-size: 13pt" color="#333333">
																	ay mga pang-abay 
																	na ingklitik.&nbsp; </font></p>
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