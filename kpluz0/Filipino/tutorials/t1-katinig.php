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
<title>Mga Katinig - Filipino sa KPluz.com</title>
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
										Mga Katinig</font></span>
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
												<table border="0" width="650" cellspacing="0" cellpadding="0" style="margin-left:0">
													<tr>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/baboy2.jpg" style="border: 1px solid #C0C0C0" width="190" height="146"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/cebu.jpg" width="160" height="160" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/daga3.jpg" style="border: 1px solid #C0C0C0" width="200" height="127"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														b</font><font face="Arial" style="font-size: 20pt" color="#800080">aboy</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														C</font><font face="Arial" style="font-size: 20pt" color="#800080">ebu</font></b></td>
														<td align="center" width="214">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														d</font><font face="Arial" style="font-size: 20pt" color="#800080">aga</font></span></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Bb</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Cc</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Dd</font></b></td>
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
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/fidel.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/gorilya.jpg" style="border: 1px solid #C0C0C0" width="200" height="175"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/hikaw.jpg" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														F</font><font face="Arial" style="font-size: 20pt" color="#800080">idel</font></b></td>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														g</font><font face="Arial" style="font-size: 20pt" color="#800080">orilya</font></span></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														h</font><font face="Arial" style="font-size: 20pt" color="#800080">ikaw</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" color="#333333" style="font-size: 50pt">
														Ff</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Gg</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Hh</font></b></td>
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
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/jose.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/kambing.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/lobo.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														J</font><font face="Arial" style="font-size: 20pt" color="#800080">ose</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														k</font><font face="Arial" style="font-size: 20pt" color="#800080">ambing</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														l</font><font face="Arial" style="font-size: 20pt" color="#800080">obo</font></b></td>
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
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/manok2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/nars2.jpg" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/ngiti2.jpg" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														m</font><font face="Arial" style="font-size: 20pt" color="#800080">anok</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														n</font><font face="Arial" style="font-size: 20pt" color="#800080">ars</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														ng</font><font face="Arial" style="font-size: 20pt" color="#800080">iti</font></b></td>
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
														Ng</font></b></td>
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
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/donya.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/pagong.jpg" width="200" height="133"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/quezon.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#800080">
														do<img border="0" src="images/ntilde3.jpg">a</font></b></td>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														p</font><font face="Arial" style="font-size: 20pt" color="#800080">agong</font></span></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														Q</font><font face="Arial" style="font-size: 20pt" color="#800080">uezon</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														&Ntilde;&ntilde;</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Pp</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Qq</font></b></td>
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
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/relo.jpg" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/sili.jpg" style="border: 1px solid #C0C0C0" width="162" height="140"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/trumpo.jpg" style="border: 1px solid #C0C0C0"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														r</font><font face="Arial" style="font-size: 20pt" color="#800080">elo</font></b></td>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														s</font><font face="Arial" style="font-size: 20pt" color="#800080">ili</font></span></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														t</font><font face="Arial" style="font-size: 20pt" color="#800080">rumpo</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Rr</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ss</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Tt</font></b></td>
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
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/vinta2.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="213" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/watawat.jpg" style="border: 1px solid #C0C0C0"></td>
														<td align="center" width="214" valign="bottom">
														<p style="margin-bottom: 8px">
														<img border="0" src="../images/bokabularyo/roxas.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														v</font><font face="Arial" style="font-size: 20pt" color="#800080">inta</font></span></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														w</font><font face="Arial" style="font-size: 20pt" color="#800080">atawat</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 20pt" color="#333333">
														Ro</font><font face="Arial" style="font-size: 20pt; text-decoration:underline" color="#FF0066">x</font><font face="Arial" style="font-size: 20pt" color="#333333">as</font></b></td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Vv</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Ww</font></b></td>
														<td align="center" width="214">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Xx</font></b></td>
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
														<img border="0" src="../images/bokabularyo/yakap.jpg" style="border: 1px solid #C0C0C0" width="200" height="157"></td>
														<td align="center" width="213">
														<img border="0" src="../images/bokabularyo/zoo.jpg" style="border: 1px solid #C0C0C0" width="160" height="160"></td>
														<td align="center" width="214">
														&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														y</font><font face="Arial" style="font-size: 20pt" color="#800080">akap</font></span></td>
														<td align="center" width="213">
														<span style="font-weight: 700">
														<font face="Arial" style="font-size: 20pt" color="#FF0066">
														z</font><font face="Arial" style="font-size: 20pt" color="#800080">oo</font></span></td>
														<td align="center" width="214">
														&nbsp;</td>
													</tr>
													<tr>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Yy</font></b></td>
														<td align="center" width="213">
														<b>
														<font face="Arial" style="font-size: 50pt" color="#333333">
														Zz</font></b></td>
														<td align="center" width="214">
														&nbsp;</td>
													</tr>
													</table>
											</div>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
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
																	sa Katinig</font></span></p>
												<table border="0" width="560" cellspacing="0" cellpadding="0" style="border:1px solid #C0C0C0; margin-left:0">
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														B</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;
																	</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">aba</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" style="font-size: 18pt" color="#333333">aka</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">ata</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">iik</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">uko</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">ato</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" style="font-size: 18pt" color="#333333">aro</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">oto</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">ula</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	b</font><font face="Arial" color="#333333" style="font-size: 18pt">uto</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														C</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp; </font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	C</font><font face="Arial" color="#333333" style="font-size: 18pt">ebu,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	C</font><font face="Arial" style="font-size: 18pt" color="#333333">avite,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	C</font><font face="Arial" color="#333333" style="font-size: 18pt">anada</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														D</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" size="5" color="#333333">aan</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">aga</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">agat</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">ahon</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">alaw</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" size="5" color="#333333">alo</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">amit</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">ibdib, </font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">ikit</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" size="5" color="#333333">ilag</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">ilaw</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">ilig</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">ilim</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">ito, </font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">ugo, </font><font face="Arial" style="font-size: 18pt" color="#800080">d</font><font face="Arial" style="font-size: 18pt" color="#333333">ula</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">ulo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">umi</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	d</font><font face="Arial" style="font-size: 18pt" color="#333333">usa</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	d</font><font face="Arial" color="#333333" style="font-size: 18pt">yip</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp; </font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														F</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></span><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											F</font><font face="Arial" color="#333333" style="font-size: 18pt">lorante</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											F</font><font face="Arial" color="#333333" style="font-size: 18pt">ilipino</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											F</font><font face="Arial" color="#333333" style="font-size: 18pt">rancisco</font></span><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></span></td>
														</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														G</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp; </font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" size="5" color="#333333">abi</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">ala,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">alak</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">amit</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" size="5" color="#333333">ana</font><font face="Arial" size="5" color="#333333">,</font></b><p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp;g</font><font face="Arial" size="5" color="#333333">anda</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">ansa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">atas</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">aya</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" size="5" color="#333333">igil</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" size="5" color="#333333">into</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" color="#333333" style="font-size: 18pt">isa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">iliw</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">itna</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" size="5" color="#333333">oma</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">ora</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">oto</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">ubat</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" style="font-size: 18pt" color="#333333">ulay</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	g</font><font face="Arial" color="#333333" style="font-size: 18pt">utom</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														H</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">aba</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">abi</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">agis</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">alik</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" color="#333333" style="font-size: 18pt">alo,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">anay</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">anda</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">apon</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">ardin</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" color="#333333" style="font-size: 18pt">ari</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">ati</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">ele</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">epe</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">iga</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" color="#333333" style="font-size: 18pt">ila</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" color="#333333" style="font-size: 18pt">imig</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" size="5" color="#333333">indi</font><font face="Arial" size="5" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">inog</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">ipon</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	</font></b>
														<p style="margin:0 20px; ">
																	<b><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">iram</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	h</font><font face="Arial" color="#333333" style="font-size: 18pt">ugas</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	h</font><font face="Arial" style="font-size: 18pt" color="#333333">ugis</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	h</font><font face="Arial" color="#333333" style="font-size: 18pt">usto</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														J</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></span><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											J</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">ose,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											J</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">uan</font><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></span></td>
														</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														K</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" size="5">aba</font><font face="Arial" color="#333333" size="5">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" style="font-size: 18pt" color="#333333">abag</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">ahon</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">ahoy</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">ain</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" style="font-size: 18pt" color="#333333">alan</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">alat</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">alye</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">ape</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">arne</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" style="font-size: 18pt" color="#333333">asal</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">atas</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">awal</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">endi</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">eso</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">ilos,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">inis</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" size="5" color="#333333">opya</font><font face="Arial" size="5" color="#333333">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">otse</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">ubo</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">uha</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">uko</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" size="5" color="#333333">ulay</font><font face="Arial" size="5" color="#333333">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">uting</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	k</font><font face="Arial" color="#333333" style="font-size: 18pt">uya</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														L</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp; </font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">aba</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" style="font-size: 18pt">
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">ahat</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">ahi</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">akad</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" size="5">aki</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">aman</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">amok</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;l</font><font face="Arial" style="font-size: 18pt" color="#333333">angit</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">angoy</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">apis,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">aso</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">ata</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">awa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">eeg</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" size="5">eon</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">igo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" size="5">ikas</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">ikha</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">imot</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" size="5">inis</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">obo,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" size="5">oob</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" style="font-size: 18pt" color="#333333">oro</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" style="font-size: 18pt">ugar</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;l</font><font face="Arial" style="font-size: 18pt" color="#333333">upa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	l</font><font face="Arial" color="#333333" size="5">uto</font><font face="Arial" color="#333333" size="5">
																	</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														M</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;
																	</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">ahal</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	m</font><font face="Arial" color="#333333" size="5">ais</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	m</font><font face="Arial" color="#333333" size="5">ani</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">ano</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">apa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">asa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" size="5">ata</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">esa,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">isa</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">ina,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">una</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" color="#333333" size="5">ukha</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">ula</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">ulto,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">undo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">abait</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">abuti</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" style="font-size: 18pt" color="#800080"> 
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">agana</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	&nbsp;m</font><font face="Arial" style="font-size: 18pt" color="#333333">alaki</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">aikli</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">ainit</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">asaya</font><font face="Arial" style="font-size: 18pt" color="#333333">, </font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" style="font-size: 18pt" color="#333333">ataas</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">edyas</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	m</font><font face="Arial" color="#333333" style="font-size: 18pt">insan</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														N</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">ais</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" color="#333333" size="5">amin</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">anay</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">atin</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" size="5">ito</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" color="#333333" size="5">ila</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" size="5">inang</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">inyo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">ipis</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" color="#333333" size="5">iyog</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">oo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" color="#333333" size="5">ood</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">ota,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">unal</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">akita</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">aligo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	n</font><font face="Arial" color="#333333" style="font-size: 18pt">ahiga</font><font face="Arial" color="#333333" style="font-size: 18pt">,</font><font face="Arial" style="font-size: 18pt" color="#800080"> 
																	n</font><font face="Arial" color="#333333" size="5">aisip</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	n</font><font face="Arial" color="#333333" size="5">atuwa</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt"> 
																	n</font><font face="Arial" color="#333333" size="5">aiwan</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" style="font-size: 18pt" color="#333333">ilinis</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	n</font><font face="Arial" style="font-size: 18pt" color="#333333">inais</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<img border="0" src="images/ntilde.jpg" width="24" height="31"></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;
																	</font></b>
														<p style="margin:0 20px; ">
														<b>
														<font face="Arial" style="font-size: 18pt" color="#333333">
														do<img border="0" src="images/ntilde2.jpg" width="14" height="21"></font><font face="Arial" style="font-size: 18pt" color="#333333">a</font><font face="Arial" style="font-size: 18pt" color="#333333">, 
																	Para<img border="0" src="images/ntilde2.jpg" width="14" height="21"></font><font face="Arial" style="font-size: 18pt" color="#333333">aque</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														Ng</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;
																	</font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	ng</font><font face="Arial" color="#333333" style="font-size: 18pt">alan</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	ng</font><font face="Arial" color="#333333" size="5">awa</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	ng</font><font face="Arial" color="#333333" size="5">ipin</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	ng</font><font face="Arial" color="#333333" size="5">iti</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	ng</font><font face="Arial" color="#333333" style="font-size: 18pt">inig</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	ng</font><font face="Arial" color="#333333" style="font-size: 18pt">iwi</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	ng</font><font face="Arial" style="font-size: 18pt" color="#333333">uso</font><font face="Arial" style="font-size: 18pt" color="#333333">,
											</font><font face="Arial" style="font-size: 18pt" color="#800080">
																	ng</font><font face="Arial" color="#333333" style="font-size: 18pt">uya</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														P</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp;&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">aa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">aano</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">abo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ader</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">agi</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">agod</font><font face="Arial" style="font-size: 18pt" color="#333333">, </font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">agong</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font><font face="Arial" color="#800080" style="font-size: 18pt"> 
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ako</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" color="#333333" style="font-size: 18pt">ala</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">alit</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ana</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">anyo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" color="#333333" style="font-size: 18pt">asa</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ata</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">atag</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" color="#333333" size="5">ato</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" color="#333333" style="font-size: 18pt">ayo</font><font face="Arial" color="#333333" style="font-size: 18pt">,&nbsp;
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">era</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">eras</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">iko</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ila</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ilit</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" color="#333333" style="font-size: 18pt">iso</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ito</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">ugad</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" color="#333333" style="font-size: 18pt">ula,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" color="#333333" size="5">uno</font><font face="Arial" color="#333333" size="5">
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">uro</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	p</font><font face="Arial" style="font-size: 18pt" color="#333333">uso</font><font face="Arial" style="font-size: 18pt" color="#333333">,</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;
																	</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														Q</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	Q</font><font face="Arial" color="#333333" style="font-size: 18pt">uezon,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	Q</font><font face="Arial" color="#333333" style="font-size: 18pt">uiapo</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														R</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
											&nbsp;<p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">ason</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">atan</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">egalo</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">elo</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">enta</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											r</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">eyna</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">, </font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">iles,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">ito</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">osas</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											r</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">urok</font><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></span></td>
														</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														S</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">aan</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	S</font><font face="Arial" style="font-size: 18pt" color="#333333">abado</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">abaw</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">abi</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">abon,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" size="5">adya</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">aging</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">agot</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ana,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ando</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">apat</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ayaw</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ebo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">elyo,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ibol</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">igaw</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">igla,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ikat</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">iko,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ili</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ilya,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ine,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">inta</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ipag,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ilya</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ine,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">itaw</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">iya</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">opas,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ukat</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">ulok</font><font face="Arial" color="#333333" style="font-size: 18pt">,
											</font><font face="Arial" color="#800080" style="font-size: 18pt">
																	s</font><font face="Arial" color="#333333" style="font-size: 18pt">uot</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														T</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp; </font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">aas</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">aba</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">abi</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">abo,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ago,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ahi</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">akbo,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ala</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">ama,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">amis,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ao,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">asa,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">atay</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">ayo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ela,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ibo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" size="5">ibok</font><font face="Arial" color="#333333" size="5">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">igre,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">iis</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ikim,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">inda</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">inik</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">iyo</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">iyan,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ore,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">otoo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">oyo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">rak</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ren,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ubo,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ubig</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">uka</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">ula</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ulog</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">ulya,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">upa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" style="font-size: 18pt" color="#333333">uwa</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	t</font><font face="Arial" color="#333333" style="font-size: 18pt">uyo</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														V</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	V</font><font face="Arial" color="#333333" style="font-size: 18pt">ictor,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	v</font><font face="Arial" color="#333333" style="font-size: 18pt">inta</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp; </font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														W</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></span><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font><font face="Arial" color="#333333" style="font-size: 18pt">agas</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">a</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">gi</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font><font face="Arial" color="#333333" style="font-size: 18pt">a</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">kas</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">ala</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											w</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">alis</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">, </font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font><font face="Arial" color="#333333" style="font-size: 18pt">eyter</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">ika</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<span style="font-weight: 700">
											<font face="Arial" color="#800080" style="font-size: 18pt">
											w</font></span><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">ili</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">,
											</font>
											<font face="Arial" color="#800080" style="font-size: 18pt; font-weight: 700">
											w</font><font face="Arial" color="#333333" style="font-size: 18pt; font-weight: 700">a</font><span style="font-weight: 700"><font face="Arial" color="#333333" style="font-size: 18pt">tawat</font></span><p style="margin:0 20px; ">
											<span style="font-weight: 700">
											<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></span></td>
														</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														X</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	x</font><font face="Arial" color="#333333" style="font-size: 18pt">-ray</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														Y</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
											<font face="Arial" color="#800080" style="font-size: 18pt">
																	&nbsp; </font></b>
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">akap</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">apak</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">ari</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">ata</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">elo</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">ero</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" color="#333333" style="font-size: 18pt">eso</font><font face="Arial" color="#333333" style="font-size: 18pt">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" color="#333333" style="font-size: 18pt">oyo,
																	</font>
																	<font face="Arial" style="font-size: 18pt" color="#800080">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">uko</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	y</font><font face="Arial" style="font-size: 18pt" color="#333333">umi</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp;</font></b></td>
													</tr>
													<tr>
														<td width="139" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin-top: 3px; margin-bottom: 3px">
														<span style="font-weight: 700">
														<font face="Arial" color="#800080" style="font-size: 24pt">
														Z</font></span></td>
														<td width="419" style="border: 1px solid #C0C0C0" align="center">
														<p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">&nbsp;</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	z</font><font face="Arial" style="font-size: 18pt" color="#333333">oo,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	Z</font><font face="Arial" style="font-size: 18pt" color="#333333">ambales</font><font face="Arial" style="font-size: 18pt" color="#333333">,
																	</font>
																	<font face="Arial" color="#800080" style="font-size: 18pt">
																	Z</font><font face="Arial" style="font-size: 18pt" color="#333333">amboanga</font></b><p style="margin:0 20px; ">
																	<b>
																	<font face="Arial" color="#333333" style="font-size: 18pt">&nbsp; </font>
																	</b></td>
													</tr>
													</table>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
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