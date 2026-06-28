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
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Arial" style="font-size: 15pt">&nbsp;&nbsp;
																	</font></p>
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 15pt" color="#800080">
																	<b>Buhay sa 
																	Atenas
																	</b>
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
																	<font face="Arial" style="font-size: 15pt">&nbsp;&nbsp;
																	</font></p>
																													<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	205 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pag-aaral 
																	sa akin ay 
																	ipinatungkol
																	<br/>sa isang 
																	mabait, 
																	maestrong 
																	marunong;
																	<br/>lahi ni 
																	Pitaco--ngala'y 
																	si Antenor--
																	<br/>lumbay ko'y 
																	sabihin nang 
																	dumating 
																	doon. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	206<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;May 
																	sambuwan 
																	halos na di 
																	nakakain,
																	<br/>luha sa mata 
																	ko'y di 
																	mapigil-pigil,
																	<br/>nguni't 
																	napayapa sa 
																	laging 
																	pag-aliw <br/>ng bunying 
																	maestrong 
																	may kupkop 
																	sa akin. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	207<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa dinatnan 
																	doong 
																	madlang 
																	nag-aaral
																	<br/>kaparis kong 
																	bata't 
																	kabaguntauhan,
																	<br/>isa'y si 
																	Adolfong 
																	aking 
																	kababayan,
																	<br/>anak niyong 
																	Konde 
																	Silenong 
																	marangal.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	208<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang 
																	kaniyang 
																	tao'y labis 
																	ng dalawa
																	<br/>sa dala kong 
																	edad na 
																	lalabing-isa;
																	<br/>siyang 
																	pinopoon ng 
																	buong 
																	eskwela, <br/>marunong sa 
																	lahat na 
																	magkakasama.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	209<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Mahinhin 
																	ang asal na 
																	hindi magaso
																	<br/>at kung 
																	lumakad pa'y 
																	palaging 
																	patungo <br/>mabining 
																	mangusap at 
																	walang 
																	katalo, <br/>lapastanganin 
																	ma'y hindi 
																	nabubuyo.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	210<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anupa't sa 
																	bait ay 
																	siyang 
																	huwaran <br/>ng 
																	nagkakatipong 
																	nagsisipag-aral;
																	<br/>sa gawa at 
																	wika'y di 
																	mahuhulihan
																	<br/>ng munting 
																	panira sa 
																	magandang 
																	asal. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	211<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ni ang 
																	katalasan ng 
																	aming 
																	maestro <br/>at 
																	pagkabihasa 
																	sa lakad ng 
																	mundo <br/>ay hindi 
																	natarok ang 
																	lihim at 
																	tungo <br/>ng pusong 
																	malihim 
																	nitong si 
																	Adolfo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	212 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Akong 
																	pagkabata'y 
																	ang 
																	kinamulatan
																	<br/>kay ama'y 
																	ang bait na 
																	di 
																	paimbabaw,
																	<br/>yaong 
																	namumunga ng 
																	kaligayahan,
																	<br/>nanakay sa 
																	pusong 
																	suyui't 
																	igalang. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	213 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	pinagtatakhan 
																	ng buong 
																	eskwela <br/>bait ni 
																	Adolfong 
																	ipinakikita,
																	<br/>di ko 
																	malasapan 
																	ang haing 
																	ligaya <br/>ng magandang 
																	asal ng ama 
																	ko't ina.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	214 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Puso ko'y 
																	ninilag na 
																	siya'y 
																	giliwin, <br/>aywan nga 
																	kung bait at 
																	naririmarim;
																	<br/>si Adolfo 
																	nama'y 
																	gayundin sa 
																	akin, <br/>nararamdaman 
																	ko kahit 
																	lubhang 
																	lihim. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	215<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Araw ay 
																	natakbo at 
																	ang kabataan
																	<br/>sa pag-aaral 
																	ko sa aki'y 
																	nananaw; <br/>bait ko'y 
																	luminis at 
																	ang 
																	karunungan,
																	<br/>ang bulag 
																	kong isip ay 
																	kusang 
																	dinamtan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	216<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Natarok ang 
																	lalim ng 
																	pilosopiya,
																	<br/>aking 
																	natutuhan 
																	ang 
																	astrolohiya,
																	<br/>natantong 
																	malinis ang 
																	kataka-taka
																	<br/>at mayamang 
																	dunong ng 
																	matematika.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	217<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa loob ng 
																	anim na 
																	taong 
																	lumakad, <br/>itong 
																	tatlong 
																	dunong ay 
																	aking 
																	nayakap; <br/>tanang 
																	kasama ko'y 
																	nagsipanggilalas,
																	<br/>sampu ng 
																	maestrong 
																	tuwa'y dili 
																	hamak. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	218<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang 
																	pagkatuto ko 
																	anaki'y 
																	himala, <br/>sampu ni 
																	Adolfong 
																	naiwan sa 
																	gitna; <br/>maingay na 
																	pamang 
																	tagapamalita,
																	<br/>sa buong 
																	Atenas ay 
																	gumala-gala.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	219<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kaya nga at 
																	ako ang 
																	naging 
																	hantungan,
																	<br/>tungo ng 
																	salita ng 
																	tao sa 
																	bayan; <br/>mulang 
																	bata't 
																	hanggang 
																	katanda-tandaan
																	<br/>ay 
																	nakatalastas 
																	ng aking 
																	pangalan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	220<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito na 
																	nahubdan ang 
																	kababayan ko
																	<br/>ng hiram na 
																	bait na 
																	binalatkayo;
																	<br/>kahinhinang-asal 
																	na 
																	pakitang-tao,
																	<br/>nakilalang 
																	hindi bukal 
																	kay Adolfo.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	221<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Natanto ng 
																	lahat na 
																	kaya nanamit
																	<br/>niyong 
																	kabaitang di 
																	taglay sa 
																	dibdib <br/>ay nang 
																	maragdag pa 
																	sa talas ng 
																	isip <br/>itong 
																	kapurihang 
																	mahinhi't 
																	mabait. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	222 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang lihim 
																	na ito'y 
																	kaya 
																	nahalata,
																	<br/>dumating ang 
																	araw ng 
																	pagkakatuwa;
																	<br/>kaming 
																	nag-aaral 
																	baguntao't 
																	bata, <br/>sarisaring 
																	laro ang 
																	minunakala.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	223 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Minulan ang 
																	gali sa 
																	pagsasayawan,
																	<br/>ayon sa 
																	musika't 
																	awit na 
																	saliwan; <br/>larong 
																	buno't arnis 
																	na 
																	kinakitaan
																	<br/>na 
																	kani-kaniyang 
																	liksi't 
																	karunungan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	224 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Saka 
																	inilabas 
																	namin ang 
																	trahedya <br/>ng dalawang 
																	apo ng tunay 
																	na ina <br/>at mga 
																	kapatid ng 
																	nag-iwing 
																	amang <br/>anak at 
																	esposo ng 
																	Reyna 
																	Yocasta. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	225<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Papel ni 
																	Eteocles ang 
																	naging 
																	tungkol ko
																	<br/>at si 
																	Polinice 
																	nama'y kay 
																	Adolfo; <br/>isang 
																	kaeswela'y 
																	siyang 
																	nag-Adrasto
																	<br/>at ang 
																	nag-Yocasta'y 
																	bunying si 
																	Minandro.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	226<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ano'y nang 
																	mumulan ang 
																	unang 
																	batalya <br/>ay ang aming 
																	papel ang 
																	nagkakabaka,
																	<br/>nang dapat 
																	sabihing 
																	ako'y 
																	kumilala't
																	<br/>siya'y 
																	kapatid kong 
																	kay Edipong 
																	bunga. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	227<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nanlisik 
																	ang mata'y 
																	ang 
																	ipinagsaysay
																	<br/>ay hindi ang 
																	ditsong nasa 
																	orihinal,
																	<br/>kundi ang 
																	winika'y 
																	'Ikaw na 
																	umagaw <br/>ng kapurihan 
																	ko'y dapat 
																	kang 
																	mamatay!'
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	228<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hinanduolong 
																	ako, sabay 
																	nitong wika,
																	<br/>ng patalim 
																	niyang 
																	pamatay na 
																	handa, <br/>dangan 
																	nakaiwas 
																	ako'y 
																	nabulagta
																	<br/>sa tatlong 
																	mariing 
																	binitiwang 
																	taga. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	229<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ako'y 
																	napahiga sa 
																	inilag-ilag,
																	<br/>sinabayang 
																	bigla ng 
																	tagang 
																	malakas; <br/>(salamat sa 
																	iyo, O 
																	Minandrong 
																	liyag, <br/>kundi ang 
																	liksi mo, 
																	buhay ko'y 
																	nautas!) <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	230<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nasalag ang 
																	dagok na 
																	kamatayan 
																	ko, <br/>lumipad ang 
																	tanging 
																	kalis ni 
																	Adolfo; <br/>siyang 
																	pagpagitan 
																	ng aming 
																	maestro <br/>at 
																	nawalang-diwang 
																	kasama't 
																	katoto. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	231<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anupa't 
																	natapos 
																	yaong 
																	katuwaan <br/>sa 
																	pangingilabot 
																	at 
																	kapighatian;
																	<br/>si Adolfo'y 
																	di na namin 
																	nabukasan,
																	<br/>noon di'y 
																	nahatid sa 
																	Albanyang 
																	bayan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	232 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Naging 
																	santaon pa 
																	ako sa 
																	Atenas, <br/>hinintay ang 
																	loob ng ama 
																	kong liyag;
																	<br/>sa aba ko't 
																	noo'y 
																	tumanggap ng 
																	sulat <br/>na ang 
																	balang 
																	letra'y 
																	iwang may 
																	kamandag.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	233 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Gunamgunam 
																	na di 
																	napagod 
																	humapis, <br/>di ka 
																	naianod ng 
																	luhang 
																	mabilis; <br/>iyong 
																	ginugulo ang 
																	bait ko't 
																	isip <br/>at di mo 
																	payagang 
																	payapa ang 
																	dibdib! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	234 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;(Kamandag 
																	kang lagak 
																	niyong 
																	kamatayan
																	<br/>ng sintang 
																	ina ko'y di 
																	nagpakundangan;
																	<br/>sinasariwa 
																	mo ang sugat 
																	na lalang
																	<br/>na aking 
																	tinanggap na 
																	palasong 
																	liham!) <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	235<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;(Tutulungan 
																	kita ngayong 
																	magpalala
																	<br/>ng hapdi sa 
																	pusong di ko 
																	maapula; <br/>namatay si 
																	ina'y laking 
																	dalita, <br/>ito sa buhay 
																	ko ang unang 
																	umiwa.) <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	236<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Patay na 
																	dinampot sa 
																	aking 
																	pagbasa <br/>niyong 
																	letrang 
																	titik ng 
																	bikig na 
																	pluma; <br/>diyata, ama 
																	ko, at 
																	nakasulat ka
																	<br/>ng 
																	pamatid-buhay 
																	sa anak na 
																	sinta! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	237<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;May 
																	dalawang 
																	oras na 
																	nakamalay
																	<br/>ng pagkatao 
																	ko't ng 
																	kinalalagyan;
																	<br/>dangan sa 
																	kalinga ng 
																	kasamang 
																	tanan <br/>ay di mo na 
																	ako 
																	nakasalitaan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	238<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang 
																	mahimasmasa'y 
																	narito ang 
																	sakit, <br/>dalawa kong 
																	mata'y 
																	naging 
																	parang 
																	batis; <br/>at ang Ay! 
																	ay, ina! 
																	kung kaya 
																	napatid <br/>ay 
																	nakalimutan 
																	ang 
																	paghingang 
																	gipit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	239<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa panahong 
																	yao'y ang 
																	buo kong 
																	damdam <br/>ay nanaw sa 
																	akin ang 
																	sandaigdigan;
																	<br/>nag-iisa ako 
																	sa gitna ng 
																	lumbay <br/>ang 
																	kinakabaka'y 
																	sarili kong 
																	buhay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	240<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hinamak ng 
																	aking 
																	pighating 
																	mabangis <br/>ang sa 
																	maestro kong 
																	pang-aliw na 
																	boses; <br/>ni ang 
																	luhang 
																	tulong ng 
																	samang may 
																	hapis <br/>ay di 
																	nakaawas sa 
																	pasan kong 
																	sakit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	241<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Baras na 
																	matuwid ay 
																	nilapastangan
																	<br/>ng lubhang 
																	marahas na 
																	kapighatian;
																	<br/>at sa isang 
																	titig ng 
																	palalong 
																	lumbay, <br/>diwa'y 
																	lumipad, 
																	niring 
																	katiisan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	242 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anupa't sa 
																	bangis ng 
																	dusang 
																	bumugso, <br/>minamasarap 
																	kong mutok 
																	yaring puso;
																	<br/>at nang ang 
																	kamandag na 
																	nakapupuno,
																	<br/>sumamang 
																	dumaloy sa 
																	agos ng 
																	dugo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	243 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;May 
																	dalawang 
																	buwang hindi 
																	nakatikim
																	<br/>ako ng 
																	linamnam ng 
																	payapa't 
																	aliw; <br/>ikalawang 
																	sulat ni 
																	ama'y 
																	dumating,
																	<br/>sampu ng 
																	sasakyang 
																	sumundo sa 
																	akin. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	244 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Saad sa 
																	kalatas ay 
																	biglang 
																	lumuhan <br/>at ako'y 
																	umuwi sa 
																	Albanyang 
																	bayan; <br/>sa aking 
																	maestrong 
																	nang 
																	nagpapaalam,
																	<br/>aniya'y 
																	'Florante, 
																	bilin ko'y 
																	tandaan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	245<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Huwag 
																	malilingat 
																	at 
																	pag-ingatan 
																	mo <br/>ang 
																	higanting 
																	handa ni 
																	Konde 
																	Adolfo; <br/>pailag-ilagang 
																	parang 
																	basilisko,
																	<br/>sukat na ang 
																	titig na 
																	matay sa 
																	iyo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	246<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung ang 
																	isalubong sa 
																	iyong 
																	pagdating
																	<br/>ay masayang 
																	mukha't may 
																	pakitang-giliw,
																	<br/>lalong 
																	pag-ingata't 
																	kaaway na 
																	lihim, <br/>siyang 
																	isaisip na 
																	kakabakahin.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	247<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dapuwa't 
																	huwag kang 
																	magpapahalata,
																	<br/>tarok mo ang 
																	lalim ng 
																	kaniyang 
																	nasa; <br/>ang 
																	sasandatahi'y 
																	lihim na 
																	ihanda, <br/>nang may 
																	ipagtanggol 
																	sa araw ng 
																	digma.' <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	248<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang mawika 
																	ito, luha'y 
																	bumalisbis
																	<br/>at ako'y 
																	niyakap na 
																	pagkahigpit-higpit;
																	<br/>huling 
																	tagubilin: 
																	'bunso'y 
																	katitiis <br/>at 
																	hinihintay 
																	ka ng 
																	maraming 
																	sakit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	249<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At mumulan 
																	mo na ang 
																	pakikilaban
																	<br/>sa mundong 
																	bayaning 
																	punong 
																	kaliluhan.'
																	<br/>hindi na 
																	natapos at 
																	sa 
																	kalumbayan,
																	<br/>pinigil ang 
																	dila niyang 
																	nagsasaysay.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	250<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nagkabitiw 
																	kaming 
																	malumbay 
																	kapuwa, <br/>tanang 
																	kaeskwela--mata'y 
																	lumuluha;
																	<br/>si 
																	Minandro'y 
																	labis ang 
																	pagdaralita,
																	<br/>palibhasa'y 
																	tapat na 
																	kapuwa bata.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	251<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	pagkakalapat 
																	ng balikat 
																	namin, <br/>ang mutyang 
																	katoto'y di 
																	bumitiw-bitiw
																	<br/>hanggang 
																	tinulutang 
																	sumama sa 
																	akin <br/>ng aming 
																	maestrong 
																	kaniyang 
																	amain. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	252 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Yaong 
																	paalama'y 
																	anupa't 
																	natapos <br/>sa 
																	pagsasaliwan 
																	ng madlang 
																	himutok; <br/>at sa 
																	kaingaya't 
																	gulo ng 
																	adiyos, <br/>ang 
																	buntunghininga 
																	ay 
																	nakikisagot.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	253 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Magpahanggang 
																	daong ay 
																	nagsipatnubay
																	<br/>ang aking 
																	maestro't 
																	kasamang 
																	iiwan; <br/>umihip ang 
																	hangi't agad 
																	nahiwalay
																	<br/>sa Pasig 
																	Atenas ang 
																	aming 
																	sasakyan.&quot;
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