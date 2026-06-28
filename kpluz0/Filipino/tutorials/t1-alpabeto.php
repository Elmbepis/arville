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
<title>Alpabetong Filipino - Filipino sa KPluz.com</title>
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
										Alpabetong Filipino</font></span>
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
												<table border="0" width="580" cellspacing="0" cellpadding="0" style="margin-left:0">
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/aso2.jpg" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/bola.jpg" style="border: 1px solid #C0C0C0" width="159" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/cebu.jpg" width="160" height="160" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<font face="Arial" style="font-size: 20pt; font-weight: 700" color="#800080">
														a</font><span style="font-weight: 700"><font face="Arial" style="font-size: 20pt" color="#800080">so</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														bola</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														Cebu</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<font face="Arial" style="font-size: 50pt; font-weight: 700" color="#333333">
														Aa</font></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Bb</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Cc</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/daga2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/elepante.jpg" width="160" height="160" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/fidel.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														daga</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														elepante</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														Fidel</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Dd</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Ee</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Ff</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/goto.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/hipon.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/ilaw.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														goto</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														hipon</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														ilaw</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Gg</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Hh</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ii</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/jose.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/kabayo.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/lobo.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														Jose</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														kabayo</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														lobo</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Jj</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Kk</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ll</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/manok2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/nars2.jpg" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/donya.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														manok</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														nars</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														do<img border="0" src="images/ntilde3.jpg">a</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Mm</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Nn</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														&Ntilde;&ntilde;</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/ngipin.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/oso2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/pusa2.jpg" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														ngipin</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														oso</font></b></td>
														<td align="center" width="214">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														pusa</font></span></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ng</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Oo</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Pp</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/quezon.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/queen.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/sisiw.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														Quezon</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														reyna</font></b></td>
														<td align="center" width="214">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														sisiw</font></span></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Qq</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Rr</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ss</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/tasa2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/usa2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/vinta2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														tasa</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														usa</font></b></td>
														<td align="center" width="214">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														vinta</font></span></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Tt</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Uu</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Vv</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/walis.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/roxas.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														<img border="0" src="../images/bokabularyo/yelo2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														walis</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#333333">
														Ro</font><font face="Arial" style="font-size: 20pt; text-decoration:underline" color="#800080">x</font><font face="Arial" style="font-size: 20pt" color="#333333">as</font></b></td>
														<td align="center" width="214">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														yelo</font></span></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ww</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Xx</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Yy</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="213">&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/zoo.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213">
														&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#800080">
														zoo</font></span></td>
														<td align="center" width="213">
														&nbsp;</td>
														<td align="center" width="214">
														&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Zz</font></b></td>
														<td align="center" width="213">
														&nbsp;</td>
														<td align="center" width="214">&nbsp;</td>
													</tr>
												</table>
											</div>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 13pt">&nbsp;&nbsp;
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