<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
	require '../../school-access-check-school.php';
	if ($mpluzschool=="yes"){header("Location: /logout.php");}
	
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
<title>Mga Aralin at Tulong sa Pag-aaral - Filipino sa KPluz.com</title>
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

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../images/header1c.jpg', /*url*/'../../images/header1b.jpg', /*url*/'../../images/header2c.jpg', /*url*/'../../images/header2b.jpg', /*url*/'../../images/header3c.jpg', /*url*/'../../images/header3b.jpg', /*url*/'../../images/header4c.jpg', /*url*/'../../images/header4b.jpg', /*url*/'../../images/header5c.jpg', /*url*/'../../images/header5b.jpg', /*url*/'../../images/header6c.jpg', /*url*/'../../images/header6b.jpg', /*url*/'images/aklatb.jpg')">

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
		<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61">
					<tr>
						<td colspan="3">
						<img border="0" src="images/tutorials-top.jpg"></td>
					</tr>
					<tr>
						<td background="images/tutorials-left.jpg" valign="top" width="94">
						&nbsp;</td>
						<td background="images/tutorials-middle.jpg" height="886" valign="top" width="612">
						<div align="center">
							<table border="0" width="613" cellspacing="0" cellpadding="0" id="table97">
								<tr>
									<td width="612" align="center" colspan="3">
									<p style="margin-top: 40px; margin-bottom: 25px">
									<img border="0" src="images/note-parts-of-speech.jpg"></td>
								</tr>
								<tr>
									<td width="612" align="center" colspan="3">
									<p style="margin-top: 20px; margin-bottom: 20px">
									<img border="0" src="images/label-nouns.jpg"></td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pangngalan.php">
											<img border="0" id="nouns-home19"  src="images/nounsa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nouns-home19', /*url*/'images/nounsb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nouns-home19', /*url*/'images/nounsa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pambalana-pantangi.php">
											<img border="0" id="pambal-pantangi-home20"  src="images/pambal-pantangia.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pambal-pantangi-home20', /*url*/'images/pambal-pantangib.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pambal-pantangi-home20', /*url*/'images/pambal-pantangia.jpg')"></a><?php $tutorlink="elem-tutor-distributive-mult.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-div.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											<a href="t-pangngalan-kailanan.php">
											<img border="0" id="nouns-sing-plu-home24"  src="images/nouns-sing-plua.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'nouns-sing-plu-home24', /*url*/'images/nouns-sing-plub.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'nouns-sing-plu-home24', /*url*/'images/nouns-sing-plua.jpg')"></a></td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pangngalan-kasarian.php">
											<img border="0" id="kasarian-home23"  src="images/kasariana.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'kasarian-home23', /*url*/'images/kasarianb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'kasarian-home23', /*url*/'images/kasariana.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-mult.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											<a href="t-konkreto-di-konkreto.php">
											<img border="0" id="konk-di-konk-home25"  src="images/konk-di-konka.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'konk-di-konk-home25', /*url*/'images/konk-di-konkb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'konk-di-konk-home25', /*url*/'images/konk-di-konka.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-div.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											</td>
								</tr>
								<tr>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
									<p style="margin-top: 20px; margin-bottom: 20px">
									<img border="0" src="images/label-verbs.jpg"></td>
									<td width="204" align="center">
									&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pandiwa.php">
											<img border="0" id="verbs-home21"  src="images/verbsa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'verbs-home21', /*url*/'images/verbsb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'verbs-home21', /*url*/'images/verbsa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pandiwa-aspekto.php">
											<img border="0" id="aspekto-home22"  src="images/aspektoa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'aspekto-home22', /*url*/'images/aspektob.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'aspekto-home22', /*url*/'images/aspektoa.jpg')"></a><?php $tutorlink="elem-tutor-distributive-mult.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-div.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											<a href="t-pandiwa-layon.php">
											<img border="0" id="layon-home23"  src="images/layona.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'layon-home23', /*url*/'images/layonb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'layon-home23', /*url*/'images/layona.jpg')"></a></td>
								</tr>
								<tr>
									<td width="204" align="center">
											<p style="margin-bottom: 20px">
											<a href="t-pandiwa-pokus.php">
											<img border="0" id="pokus-home24"  src="images/pokusa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pokus-home24', /*url*/'images/pokusb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pokus-home24', /*url*/'images/pokusa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-bottom: 20px">
											&nbsp;</td>
									<td width="204" align="center">
											<p style="margin-bottom: 20px">
											&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
									<p style="margin-top: 20px; margin-bottom: 20px">
									<img border="0" src="images/label-adjectives.jpg"></td>
									<td width="204" align="center">
									&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pang-uri.php">
											<img border="0" id="adjectives-home24"  src="images/adjectivesa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'adjectives-home24', /*url*/'images/adjectivesb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'adjectives-home24', /*url*/'images/adjectivesa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pang-uri-mga-uri.php">
											<img border="0" id="adj-types-home25"  src="images/adj-typesa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'adj-types-home25', /*url*/'images/adj-typesb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'adj-types-home25', /*url*/'images/adj-typesa.jpg')"></a><?php $tutorlink="elem-tutor-distributive-mult.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pamilang-mga-uri.php">
											<img border="0" id="pamilang-home26"  src="images/pamilanga.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pamilang-home26', /*url*/'images/pamilangb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pamilang-home26', /*url*/'images/pamilanga.jpg')"></a><?php $tutorlink="elem-tutor-distributive-div.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											</td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pang-uri-kaantasan.php">
											<img border="0" id="kaantasan-home23"  src="images/kaantasana.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'kaantasan-home23', /*url*/'images/kaantasanb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'kaantasan-home23', /*url*/'images/kaantasana.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-mult.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-div.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											</td>
								</tr>
								<tr>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
									<p style="margin-top: 20px; margin-bottom: 20px">
									<img border="0" src="images/label-adverbs.jpg"></td>
									<td width="204" align="center">
									&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pang-abay.php">
											<img border="0" id="adverbs-home25"  src="images/adverbsa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'adverbs-home25', /*url*/'images/adverbsb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'adverbs-home25', /*url*/'images/adverbsa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pang-abay-mga-uri.php">
											<img border="0" id="adv-types-home26"  src="images/adv-typesa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'adv-types-home26', /*url*/'images/adv-typesb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'adv-types-home26', /*url*/'images/adv-typesa.jpg')"></a></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											</a>
											</td>
								</tr>
								<tr>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
									<p style="margin-top: 20px; margin-bottom: 20px">
									<img border="0" src="images/label-pronouns.jpg" width="182" height="62"></td>
									<td width="204" align="center">
									&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-panghalip.php">
											<img border="0" id="panghalip-home24"  src="images/panghalipa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'panghalip-home24', /*url*/'images/panghalipb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'panghalip-home24', /*url*/'images/panghalipa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											</a>
											<a href="t-panghalip-mga-uri.php">
											<img border="0" id="panghalip-uri-home27"  src="images/panghalip-uria.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'panghalip-uri-home27', /*url*/'images/panghalip-urib.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'panghalip-uri-home27', /*url*/'images/panghalip-uria.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											</a>
											</td>
								</tr>
								<tr>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
									<p style="margin-top: 25px; margin-bottom: 20px">
									<img border="0" src="images/label-others.jpg" width="208" height="77"></td>
									<td width="204" align="center">
									&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="t-pang-angkop.php">
											<img border="0" id="pang-angkop-home23"  src="images/pang-angkopa.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pang-angkop-home23', /*url*/'images/pang-angkopb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pang-angkop-home23', /*url*/'images/pang-angkopa.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pantukoy.php">
											<img border="0" id="pantukoy-home25"  src="images/pantukoya.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pantukoy-home25', /*url*/'images/pantukoyb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pantukoy-home25', /*url*/'images/pantukoya.jpg')"></a></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<a href="t-pang-ukol.php">
											<img border="0" id="pang-ukol-home26"  src="images/pang-ukola.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pang-ukol-home26', /*url*/'images/pang-ukolb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pang-ukol-home26', /*url*/'images/pang-ukola.jpg')"></a></a></td>
								</tr>
								<tr>
									<td width="204" align="center">
											<p style="margin-bottom: 20px">
											<a href="t-pangatnig.php">
											<img border="0" id="pangatnig-home25"  src="images/pangatniga.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'pangatnig-home25', /*url*/'images/pangatnigb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'pangatnig-home25', /*url*/'images/pangatniga.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-bottom: 20px">
											&nbsp;</td>
									<td width="204" align="center">
											<p style="margin-bottom: 20px">
											&nbsp;</td>
								</tr>
								<tr>
									<td width="612" align="center" colspan="3">
									<p style="margin-top: 30px; margin-bottom: 25px">
									<img border="0" src="images/note-panitikan.jpg" width="245" height="115"></td>
								</tr>
								<tr>
									<td width="204" align="center">
									<p style="margin-top:0; margin-bottom:20px">
											<a href="../books/fbooks-hs.php">
											<img border="0" id="aklat-home20"  src="images/aklata.jpg"  onmouseover="FP_swapImg(1,0,/*id*/'aklat-home20', /*url*/'images/aklatb.jpg')"   onmouseout="FP_swapImg(0,0,/*id*/'aklat-home20', /*url*/'images/aklata.jpg')"></a></td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-mult.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											</td>
									<td width="204" align="center">
									<p style="margin-top: 0; margin-bottom: 20px">
											<?php $tutorlink="elem-tutor-distributive-div.php?grade=".$grd; echo "<a href='$tutorlink'>"; ?>  
											</a>
											</td>
								</tr>
								<tr>
									<td width="204" align="center">
											&nbsp;</td>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
											&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
											&nbsp;</td>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
											&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
											&nbsp;</td>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
											&nbsp;</td>
								</tr>
								<tr>
									<td width="204" align="center">
											&nbsp;</td>
									<td width="204" align="center">
									&nbsp;</td>
									<td width="204" align="center">
											&nbsp;</td>
								</tr>
								</table>
						</div>
						</td>
						<td background="images/tutorials-right.jpg" height="886" valign="top" width="93">
						&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">
						<img border="0" src="images/tutorials-bottom.jpg"></td>
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