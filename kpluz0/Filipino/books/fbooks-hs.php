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
session_start();
if ($_SESSION['level']=="")
{$_SESSION['level']="Easy";}
?>




<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Florante at Laura - Filipino sa KPluz.com</title>
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

<body onload="FP_preloadImgs(/*url*/'../../images/kpluz-books-homec.jpg', /*url*/'../../images/kpluz-books-homeb.jpg', /*url*/'../../images/kpluz-books-logoutc.jpg', /*url*/'../../images/kpluz-books-logoutb.jpg')">

<div align="center">

<table width="900"><tr><td height="100">

										
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<img border="0" src="../../images/kpluz-books-logo.jpg" width="900" height="154"></td>
	</tr>
	<tr>
		<td>
		<div align="center">
		<table border="0" width="650" cellspacing="0" cellpadding="0">
			<tr>
				<td width="353" align="center">
										<p style="margin-left: 20px; margin-top: 0; margin-bottom: 0">
										<a href="../../home-filipino.php">
										<img border="0" id="img2" src="../../images/kpluz-books-homea.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homeb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homea.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homec.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/kpluz-books-homeb.jpg')"></a></td>
				<td width="297" align="center">
										<p style="margin-top: 0; margin-bottom: 0">
										<a href="/logout.php">
										<img border="0" id="img3" src="../../images/kpluz-books-logouta.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logoutb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logouta.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logoutc.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/kpluz-books-logoutb.jpg')"></a></td>
			</tr>
			<tr>
				<td width="353">
										<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
				<td width="297">
										<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
			</tr>
		</table>
		</div>
		</td>
	</tr>
</table>

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
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">&nbsp; </font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">&nbsp; </font></span>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 18pt" color="#990000">&nbsp;Mga 
										Aklat sa Filipino</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">
										<a href="florla/florla-toc.php">Florante 
										at Laura</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<div align="center">
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">
										<a href="adarna/adarna-toc.php">Ibong 
										Adarna</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">
										<a href="noli/t-noli-toc.php">Noli Me 
										Tangere</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">
										<a href="fili/t-fili-toc.php">El 
										Filibusterismo</a></font></span><div align="center">
											<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">&nbsp; </font></span>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 18pt" color="#990000">&nbsp;Mga 
										Karagdagang Babasahin</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt" color="#990000">&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<b>
										<font face="Arial" style="font-size: 16pt; font-style:italic" color="#CC0066">
										Ikapitong Baitang</font></b><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g7/bantugan.php">Bantugan</a></font></span><p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g7/7toc.php">Matatag Schoolbook 
										7</a></font></span><p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										<b>
										<font face="Arial" style="font-size: 16pt; font-style:italic" color="#CC0066">
										Ikawalong Baitang</font></b><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g8/huling-paalam.php">Huling 
										Paalam</a></font></span><p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g8/maria-makiling.php">Alamat ni Maria Makiling</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g8/bidasari.php">Bidasari</a></font></span><p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g8/8toc.php">Matatag Schoolbook 
										8</a></font></span><p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										<b>
										<font face="Arial" style="font-size: 16pt; font-style:italic" color="#CC0066">
										Ikasiyam na Baitang</font></b><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g9/ang%20pagbabalik.php">Ang Pagbabalik</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g9/tiyo-simon.php">Tiyo Simon</a></font></span><p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										&nbsp;<p align="center" style="margin:0 80px; ">
										<b>
										<font face="Arial" style="font-size: 16pt; font-style:italic" color="#CC0066">
										Ikasampung Baitang</font></b><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g10/ang-alibughang-anak.php">Ang Alibughang Anak</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g10/ang-alegorya-ng-yungib.php">Ang Alegorya ng Yungib</a></font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
										</div>
										<p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 15pt">
										<a href="g10/ang-kuba-ng-notre-dame.php">Ang Kuba ng Notre Dame</a></font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">
										&nbsp;&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 15pt">
										&nbsp;&nbsp;</font></span><p align="center" style="margin:0 80px; ">
										&nbsp;</div>
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