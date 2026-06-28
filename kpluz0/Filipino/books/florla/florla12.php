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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg')">

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
										<font face="Arial" style="font-size: 24pt" color="#990000">
										Florante at Laura</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 16pt" color="#990000">
										ni Francisco Balagtas</font></span>
										<div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											&nbsp; </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 15pt">&nbsp;&nbsp;
																	</font></p>
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 15pt; font-weight:700" color="#800080">
																	Katapusan ng 
																	Florante at 
																	Laura</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											&nbsp; </p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 15pt">&nbsp;&nbsp;
																	</font></p>
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#0000CC">
																	<span style="font-weight: 700">
																	375</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Di lubhang 
																	nalaon noong 
																	pag-alis mo,
																	<br/>O, sintang 
																	Florante sa 
																	Albanyong 
																	Reyno, <br/>narinig sa 
																	baya'y isang 
																	piping gulo
																	<br/>na 
																	umalingawngaw 
																	hanggang sa 
																	palasyo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	376<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ngunit di 
																	mangyaring 
																	mawatas-watasan
																	<br/>ang bakit at 
																	hulo ng 
																	bulung-bulungan;
																	<br/>parang isang 
																	sakit na 
																	mahulaan <br/>ng medikong 
																	pantas ang 
																	dahil at 
																	saan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	377<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Di 
																	kaginsa-ginsa, 
																	palasyo'y 
																	nakubkob <br/>ng magulong 
																	baya't 
																	baluting 
																	soldados;
																	<br/>(O, araw na 
																	lubhang 
																	kakila-kilabot!
																	<br/>araw na 
																	sinumpa ng 
																	galit ng 
																	Diyos!) <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	378<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sigawang 
																	malakas 
																	niyong 
																	bayang gulo:
																	<br/>'mamatay, 
																	mamatay ang 
																	Haring 
																	Linceo <br/>na 
																	nagmunakalang 
																	gutumin ang 
																	reyno't <br/>lagyan ng 
																	estangke ang 
																	kakani't 
																	trigo.' <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	379<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ito'y kay 
																	Adolfong 
																	kagagawang 
																	lahat <br/>at nang 
																	magkagulo 
																	yaong bayang 
																	bulag; <br/>sa ngalan ng 
																	hari ay 
																	isinambulat
																	<br/>gayong 
																	ordeng mula 
																	sa dibdib na 
																	sukab. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	380<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Noon di'y 
																	hinugot sa 
																	tronong 
																	luklukan <br/>ang ama kong 
																	hari at 
																	pinapugutan;
																	<br/>may matuwid 
																	bagang 
																	makapanlulumay
																	<br/>sa sukab na 
																	puso't 
																	nagugulong 
																	bayan? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	381<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa araw 
																	ring yao'y 
																	naputlan ng 
																	ulo <br/>ang tapat na 
																	loob na mga 
																	konseho; <br/>at hindi 
																	pumurol ang 
																	tabak ng 
																	lilo <br/>hanggang may 
																	mabait na 
																	mahal sa 
																	reyno. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	382 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Umakyat sa 
																	trono ang 
																	kondeng 
																	malupit <br/>at 
																	pinagbalaan 
																	ako nang 
																	mahigpit,
																	<br/>na kung di 
																	tumanggap sa 
																	haing 
																	pag-ibig,
																	<br/>dustang 
																	kamataya'y 
																	aking 
																	masasapit.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	383 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	pagnanasa 
																	kong siya'y 
																	magantihan
																	<br/>at sulatan 
																	kita sa 
																	Etolyang 
																	Bayan, <br/>pinilit ang 
																	pusong huwag 
																	ipamalay <br/>sa lilo-ang 
																	aking 
																	kaayawa't 
																	suklam. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	384 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Limang 
																	buwang 
																	singkad ang 
																	hininging 
																	taning, <br/>ang kaniyang 
																	sinta'y bago 
																	ko 
																	tanggapin;
																	<br/>ngunit 
																	ipinasyang 
																	tunay sa 
																	panimdim <br/>ang 
																	magpatiwakal 
																	kundi ka 
																	dumating.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	385<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Niyari ang 
																	sulat at 
																	ibinigay ko
																	<br/>sa tapat na 
																	lingkod nang 
																	dalhin sa 
																	iyo; <br/>di nag-isang 
																	buwa'y 
																	siyang 
																	pagdating 
																	mo't <br/>nahulog sa 
																	kamay ni 
																	Adolfong 
																	lilo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	386<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa takot sa 
																	iyo niyong 
																	palamara <br/>kung ikaw'y 
																	magbalik na 
																	may hukbong 
																	dala, <br/>nang 
																	mag-isang 
																	muwi ay 
																	pinadalhan 
																	ka <br/>ng may 
																	selyong 
																	sulat at sa 
																	haring 
																	pirma. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	387<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Matanto ko 
																	ito'y sa 
																	malaking 
																	lumbay <br/>gayak na ang 
																	puso na 
																	magpatiwakal
																	<br/>ay siyang 
																	pagdating ni 
																	Minandro 
																	naman, <br/>kinubkob ng 
																	hukbo ang 
																	Albanyong 
																	Bayan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	388<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa banta 
																	ko'y siyang 
																	tantong 
																	nakatanggap
																	<br/>ng sa iyo'y 
																	aking 
																	padalang 
																	kalatas, <br/>kaya't nang 
																	dumating sa 
																	Albanyang 
																	Syudad, <br/>lobong 
																	nagugutom 
																	ang 
																	kahalintulad.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	389<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang walang 
																	magawa ang 
																	Konde Adolfo
																	<br/>ay kusang 
																	tumawag ng 
																	kapuwa lilo;
																	<br/>dumating ang 
																	gabi umalis 
																	sa reyno <br/>at ako'y 
																	dinalang 
																	gapos sa 
																	kabayo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	390<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kapagdating 
																	dito ako'y 
																	dinadahas
																	<br/>at ibig 
																	ilugso ang 
																	puri kong 
																	ingat; <br/>mana'y isang 
																	tunod na 
																	kung saan 
																	buhat, <br/>pumako sa 
																	dibdib ni 
																	Adolfong 
																	sukab...&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	391<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sagot 
																	Flerida: 
																	&quot;Nang dito'y 
																	sumapit <br/>ay may 
																	napakinggang 
																	binibining 
																	boses <br/>na 
																	pakiramdam 
																	ko'y 
																	binibigyang-sakit,
																	<br/>nahambal ang 
																	aking 
																	mahabaging 
																	dibdib. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	392 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang 
																	paghanapin 
																	ko'y ikaw 
																	ang nataos,
																	<br/>pinipilit 
																	niyong taong 
																	balakiyot;
																	<br/>hindi ko 
																	nabata't 
																	bininit sa 
																	busog <br/>ang isang 
																	palasong sa 
																	lilo'y 
																	tumapos...&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	393 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Di pa 
																	napapatid 
																	itong 
																	pangungusap,
																	<br/>si 
																	Minandro'y 
																	siyang 
																	pagdating sa 
																	gubat; <br/>dala'y 
																	ehersito't 
																	si Adolfong 
																	hanap, <br/>nakita'y 
																	katoto... 
																	laking 
																	tuwa't 
																	galak! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	394 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Yaong 
																	ehersitong 
																	mula sa 
																	Etolya, <br/>ang unang 
																	nawika sa 
																	gayong 
																	ligaya: <br/>&quot;Biba si 
																	Floranteng 
																	Hari sa 
																	Albanya...
																	<br/>Mabuhay, 
																	mabuhay ang 
																	Prinsesa 
																	Laura!&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	395<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dinala sa 
																	reynong 
																	ipinagdiriwang
																	<br/>sampu ni 
																	Aladi't ni 
																	Fleridang 
																	hirang, <br/>kapuwa 
																	tumanggap na 
																	mangabinyagan;
																	<br/>magkakasing 
																	sinta'y 
																	naraos 
																	nakasal. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	396<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Namatay sa 
																	bunying 
																	Sultan 
																	Ali-Adab,
																	<br/>nuwi si 
																	Aladin sa 
																	Persyang 
																	Syudad; <br/>ang Duke 
																	Florante sa 
																	trono'y 
																	naakyat <br/>sa siping ni 
																	Laurang 
																	minumutyang 
																	liyag. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	397<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa 
																	pamamahala 
																	nitong 
																	bagong hari,
																	<br/>sa 
																	kapayapaan 
																	ang reyno'y 
																	nauwi; <br/>dito 
																	nakabangon 
																	ang 
																	nalulugami
																	<br/>at 
																	napasatuwa 
																	ang 
																	nagpipighati.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	398<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kaya nga'y 
																	nagtaas ang 
																	kamay sa 
																	langit, <br/>sa 
																	pasasalamat 
																	sa bayang 
																	tangkilik;
																	<br/>ang hari't 
																	ang reyna'y 
																	walang 
																	naiisip <br/>kundi ang 
																	magsabog ng 
																	awa sa 
																	kabig. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	399<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nagkasama 
																	silang 
																	lubhang 
																	mahinusay
																	<br/>hanggang sa 
																	nasapit ang 
																	payapang 
																	bayan... <br/>(Tigil, 
																	aking Musa't 
																	kusa kang 
																	lumagay <br/>sa yapak ni 
																	SELYA'T 
																	dalhin 
																	yaring 
																	Ay!... AY!)
																	</font></p>
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
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;&nbsp;
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