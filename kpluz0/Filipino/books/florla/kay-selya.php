<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
 	require '../../../offset.php';
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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg', /*url*/'../images/backb.jpg')">

<div align="center">

<table width="900"><tr><td height="100">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0">
			<tr>
				<td width="193" height="100" valign="top">
				<a href="/home-filipino.php">
				<img border="0" src="../../../images/header-logo.jpg"></a></td>
				<td width="133" valign="top">
										<a href="/how-to-use-kpluz.php">
										<img border="0" id="img1" src="../../../images/header1a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/header1b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/header1a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../../images/header1c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../../images/header1b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/bluebars_student.php">
										<img border="0" id="img2" src="../../../images/header2a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../../images/header2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../../images/header2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../../images/header2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../../images/header2b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/programs.php">
										<img border="0" id="img3" src="../../../images/header3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../../images/header3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../../images/header3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../../images/header3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../../images/header3b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/community.php">
										<img border="0" id="img4" src="../../../images/header4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../../images/header4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../../images/header4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../../images/header4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../../images/header4b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/contact.php">
										<img border="0" id="img5" src="../../../images/header5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../../images/header5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../../images/header5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../../images/header5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../../images/header5b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/logout.php">
										<img border="0" id="img6" src="../../../images/header6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../../images/header6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../../images/header6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../../images/header6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../../images/header6b.jpg')"></a></td>
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
								<img border="0" src="../../../images/lessons-gen-top.jpg"></td>
							</tr>
							<tr>
								<td valign="bottom" >
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										Kay Selya</font></span></p>
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 16pt" color="#990000">
										ni Francisco Balagtas</font></span>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 15pt">&nbsp;&nbsp;
																	</font></p>
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0"><span style="font-weight: 700">
																													<font face="Arial" style="font-size: 16pt" color="#0000CC">
																													1</font></span><font face="Arial" style="font-size: 16pt; font-weight:700" color="#0000CC">
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Kung pagsaulan kong basahin sa isip
											<br>
											ang nangakaraang araw ng pag-ibig
											<br>
											may mahahagilap kayang natititik <br>
											liban na kay Selyang namugad sa 
											dibdib <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											2 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Yaong Selyang laging pinanganganiban,
											<br>
											baka makalimot sa pag-iibigan; <br>
											ang ikinalubog niring kapalaran <br>
											sa lubhang malalim na karalitaan.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											3 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Makaligtaan ko kayang di basahin,
											<br>
											nagdaang panahon ng suyuan namin?
											<br>
											kaniyang pagsintang ginugol sa akin
											<br>
											at pinuhunan kong pagod at hilahil?
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											&nbsp;<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											4 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Lumipas ang araw na lubhang matamis
											<br>
											at walang matira kundi ang pag-ibig,
											<br>
											tapat na pagsuyong lalagi sa dibdib
											<br>
											hanggang sa libingan bangkay ko'y 
											maidlip. <br>
&nbsp; </font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											5 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Ngayong namamanglaw sa pangungulila,
											<br>
											ang ginagawa kong pang-aliw sa dusa,
											<br>
											nagdaang panaho'y inaalaala, <br>
											sa iyong larawa'y ninitang ginhawa.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											6 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Sa larawang guhit ng sa sintang 
											pinsel, <br>
											kusang inilimbag sa puso't panimdim
											<br>
											nag-iisang sanlang naiwan sa akin,
											<br>
											at di mananakaw magpahanggang libing.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											7 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Ang kaluluwa ko'y kusang dumadalaw
											<br>
											sa lansanga't nayong iyong niyapakan;
											<br>
											sa ilog Beata't Hilom na mababaw,
											<br>
											yaring aking puso'y laging lumiligaw.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											8 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Di mamakailang mupo ang panimdim <br>
											sa puno ng manggang naraanan natin;
											<br>
											sa nagbiting bungang ibig mong 
											pitasin, <br>
											ang ulilang sinta'y aking inaaliw.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											9 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Ang katauhan ko'y kusang nagtatalik
											<br>
											sa buntunghininga nang ikaw'y may 
											sakit, <br>
											himutok ko noo'y inaaring langit,
											<br>
											paraiso naman ang may-tulong silid.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											10 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Nililigaw ko ang iyong larawan <br>
											sa Makatang Ilog na kinalagian; <br>
											binabakas ko rin sa masayang do'ngan,
											<br>
											yapak ng paa mo sa batong tuntungan.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											11 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Nagbabalik mandi't parang hinahanap
											<br>
											dito ang panahong masayang lumipas:
											<br>
											na kung maliligo'y sa tubig aagap,
											<br>
											nang hindi abutin ng tabsing sa 
											dagat. <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											12 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Parang naririnig ang lagi mong wika
											<br>
											&quot;Tatlong araw na di nagtatanaw-tama,&quot;
											<br>
											at sinasagot ko ng sabing may tuwa
											<br>
											&quot;Sa isa katao'y marami ang handa.&quot;
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											13 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Anupa nga't walang di nasisiyasat
											<br>
											ang pag-iisip ko sa tuwang kumupas;
											<br>
											sa kagugunita, luha'y lalagaslas,
											<br>
											sabay ang taghoy kong &quot;O, nasawing 
											palad!&quot; <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											14 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Nasaan si Selyang ligaya ng dibdib?
											<br>
											ang suyuan nami'y bakit di lumawig?
											<br>
											nahan ang panahong isa niyang titig
											<br>
											ang siyang buhay ko, kaluluwa't 
											langit? <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											15 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Bakit baga noong kami'y maghiwalay
											<br>
											ay di pa nakitil yaring abang buhay?
											<br>
											kung gunitain ka'y aking kamatayan,
											<br>
											sa puso ko Selya'y di ka mapaparam.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											16 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Itong di matiis na pagdaralita <br>
											nang dahil sa iyo, O nalayong tuwa
											<br>
											ang siyang umakay na ako'y tumula,
											<br>
											awitin ang buhay ng isang naaba. <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											17 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Selya'y talastas ko't malabis na 
											umid <br>
											mangmang ang musa ko't malumbay ang 
											tinig; <br>
											di kinabahagya kung hindi malait,
											<br>
											palaring dinggin mo ang tainga't 
											isip. <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight:700" color="#0000CC">
											18 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Ito'y unang bukal ng bait kong kutad
											<br>
											na inihahandog sa mahal mong yapak;
											<br>
											tanggapin mo nawa kahit walang lasap,
											<br>
											nagbuhat sa puso ng lingkod na tapat.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											19 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Kung kasadlakan man ng pula't 
											pag-ayop <br>
											tubo ko'y dakila sa puhunang pagod;
											<br>
											kung binabasa mo'y isa mang himutok
											<br>
											ay alalahanin yaring naghahandog.
											<br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											20</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Masasayang Nimfas sa lawa ng Bai,
											<br>
											Sirenas, ang tinig ay kawili-wili,
											<br>
											kayo ngayo'y siyang pinipintakasi
											<br>
											ng lubhang mapanglaw na Musa kong 
											imbi. <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											&nbsp;<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											21 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Ahon sa dalata't pampang na nagligid,
											<br>
											tonohan ng lira yaring abang awit
											<br>
											na nagsasalitang buhay ma'y mapatid,
											<br>
											tapat na pagsinta'y hangad na 
											lumawig. <br>
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											&nbsp;<br>
											</font>
											<font face="Arial" style="font-size: 16pt; font-weight: 700" color="#0000CC">
											22 </font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 16pt" color="#333333">
											<br>
											Ikaw na bulaklak niring dilidili,
											<br>
											Selyang sagisag mo'y ang M. A. R.
											<br>
											sa Birheng mag-ina'y ipamintakasi
											<br>
											ang tapat mong lingkod na si F. B.
											</font> </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 15pt" color="#800080">
																	<a href="florla-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Menu ng 
																	Florante at 
																	Laura</font></a></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
<a href="../fbooks-hs.php">
											
<img border="0" id="img8" src="../images/backa.jpg" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img8',/*url*/'../images/backb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img8',/*url*/'../images/backa.jpg')"  fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></a></font></p>
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
								<img border="0" src="../../../images/lessons-gen-bottom.jpg" width="900" ></td>
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