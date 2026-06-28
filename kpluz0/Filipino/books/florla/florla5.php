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
																	<font face="Arial" style="font-size: 14pt" color="#800080">
																	<b>Pagliligtas 
																	ni Aladin 
																	kay Florante</b></font></p>
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
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">12</font><span style="font-weight: 700"><font face="Arial" style="font-size: 14pt" color="#0000CC">6</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa 
																	tinaghuy-taghoy 
																	na 
																	kasindak-sindak,
																	<br/>gerero'y 
																	hindi na 
																	napigil ang 
																	habag, <br/>tinunton ang 
																	boses at 
																	siyang 
																	hinanap, <br/>patalim ang 
																	siyang 
																	nagbukas ng 
																	landas. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	127<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dawag na 
																	masinsi'y 
																	naglagi-lagitik
																	<br/>sa dagok ng 
																	lubhang 
																	matalas na 
																	kalis; <br/>moro'y di 
																	tumugot 
																	hanggang di 
																	nasapit <br/>ang 
																	binubukalan 
																	ng maraming 
																	tangis. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	128<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Anyong 
																	pantay-mata 
																	ang lagay ng 
																	araw <br/>niyong 
																	pagkatungo 
																	sa 
																	kalulunuran;
																	<br/>siyang 
																	pagkataas sa 
																	kinalalagyan
																	<br/>nitong 
																	nagagapos na 
																	kahambal-hambal.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	129<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nang malapit 
																	siya't 
																	abutin ng 
																	sulyap <br/>ang sa 
																	pagkatali'y 
																	linigid ng 
																	hirap, <br/>nawalan ng 
																	diwa't 
																	luha'y 
																	lumagaslas,
																	<br/>katawan at 
																	puso'y 
																	nagapos ng 
																	habag. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	130<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Malaong 
																	natigil na 
																	di nakakibo,
																	<br/>hininga'y 
																	hinabol na 
																	ibig lumayo;
																	<br/>matutulog 
																	disin sa 
																	habag ang 
																	dugo, <br/>kundangan 
																	nagbangis 
																	leong 
																	nangagtayo.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	131<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	Naakay ng 
																	gutom at 
																	gawing 
																	manila, <br/>nag-uli sa 
																	ganid at 
																	nawalang-awa;
																	<br/>handa na ang 
																	ngipi't 
																	kukong 
																	bagong hasa
																	<br/>at 
																	pagsasabayan 
																	ang gapos ng 
																	iwa. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	132 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Tanang 
																	balahibo'y 
																	pinapangalisag,
																	<br/>nanindig ang 
																	buntot na 
																	nakagugulat;
																	<br/>sa bangis ng 
																	anyo at 
																	nginasab-ngasab,
																	<br/>Puryang 
																	nagngangalit 
																	ang siyang 
																	katulad. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	133 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nagtaas ang 
																	kamay at 
																	nangakaakma
																	<br/>sa katawang 
																	gapos ang 
																	kukong 
																	pansira; <br/>nang 
																	darakmain 
																	na'y siyang 
																	pagsagasa
																	<br/>niyong 
																	bagong 
																	Marteng 
																	lumitaw sa 
																	lupa. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	134 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Inusig ng 
																	taga ang 
																	dalawang 
																	leon, <br/>si Apolo 
																	mandin sa 
																	Serp'yente 
																	Piton; <br/>walang 
																	bigong kilos 
																	na di 
																	nababaon <br/>ang lubhang 
																	bayaning 
																	tabak na 
																	pamutol. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	135<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kung 
																	ipamilantik 
																	ang kanang 
																	pamatay <br/>at saka 
																	isalag ang 
																	pang-adyang 
																	kamay, <br/>maliliksing 
																	leon ay 
																	nangalilinlang,
																	<br/>kaya di 
																	nalao'y 
																	nangagumong 
																	bangkay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	136<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nang 
																	magtagumpay 
																	ang gererong 
																	bantog <br/>sa 
																	nangakalabang 
																	mabangis na 
																	hayop, <br/>luha'y 
																	tumutulong 
																	kinalag ang 
																	gapos <br/>ng 
																	kaawa-awang 
																	iniwan ng 
																	loob. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	137<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Halos 
																	nabibihay sa 
																	habag ang 
																	dibdib, <br/>dugo'y nang 
																	matingnang 
																	nunukal sa 
																	gitgit; <br/>sa pagkalag 
																	niyang 
																	maliksi'y 
																	nainip <br/>sa 
																	siga-sigalot 
																	na madlang 
																	bilibid. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	138<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kaya ang 
																	ginawa'y 
																	inagapayanan,
																	<br/>katawang 
																	malatang 
																	parang 
																	bagang 
																	bangkay; <br/>at minsang 
																	pinatid ng 
																	espadang 
																	tangan <br/>walang awang 
																	lubid na 
																	lubhang 
																	matibay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	139<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Umupo't 
																	kinalong na 
																	naghihimutok,
																	<br/>katawang sa 
																	dusa 
																	hininga'y 
																	natulog; <br/>hinaplos ang 
																	mukha't 
																	dibdib ay 
																	tinuptop,
																	<br/>nasa ng 
																	gerero'y 
																	pagsaulang-loob.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	140<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Doon sa 
																	pagtitig sa 
																	pagkalungayngay
																	<br/>na kanilang 
																	kalong 
																	kalumbay-lumbay,
																	<br/>nininilay 
																	niya at 
																	pinagtatakhan
																	<br/>ang dikit ng 
																	kiyas at 
																	kinasapitan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	141<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Namamangha 
																	naman ang 
																	magandang 
																	kiyas, <br/>kasing-isa't 
																	ayon sa 
																	bayaning 
																	tikas; <br/>mawiwili 
																	disin ang 
																	iminamalas
																	<br/>na mata, 
																	kandungan sa 
																	malaking 
																	habag. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	142 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Gulung-gulong 
																	lubha ang 
																	kaniyang 
																	loob, <br/>nguni't 
																	napayapa ng 
																	anyong 
																	kumilos <br/>itong abang 
																	kandong na 
																	kalunus-lunos,
																	<br/>nagising ang 
																	buhay na 
																	nakakatulog.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	143 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa 
																	pagkalungayngay 
																	mata'y 
																	idinilat,
																	<br/>himutok ang 
																	unang bati 
																	sa liwanag;
																	<br/>sinundan ng 
																	taghoy na 
																	kahabag-habag;
																	<br/>&quot;Nasaan ka 
																	Laura sa 
																	ganitong 
																	hirap?&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	144 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Halina, 
																	giliw ko't 
																	gapos ko'y 
																	kalagin, <br/>kung mamatay 
																	ako'y 
																	gunitain mo 
																	rin.&quot; <br/>pumikit na 
																	muli't 
																	napatid ang 
																	daing, <br/>sa may 
																	kandong 
																	namang takot 
																	na sagutin.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	145<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ipinanganganib 
																	ay baka 
																	mabigla, <br/>magtuloy 
																	mapatid 
																	hiningang 
																	mahina; <br/>hinintay na 
																	lubos niyang 
																	mapayapa <br/>ang loob ng 
																	kandong na 
																	lipos-dalita.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	146<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nang muling 
																	mamulat ang 
																	nagitlaanan,
																	<br/>&quot;Sino? sa 
																	aba ko't 
																	nasa Morong 
																	kamay!&quot; <br/>ibig na 
																	iigtad ang 
																	lunong 
																	katawan, <br/>nang hindi 
																	mangyari'y 
																	nagngalit na 
																	lamang. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	147<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sagot ng 
																	gerero'y 
																	&quot;Huwag kang 
																	manganib <br/>sumapayapa 
																	ka't 
																	mag-aliw ng 
																	dibdib; <br/>ngayo'y 
																	ligtas ka na 
																	sa lahat ng 
																	sakit, <br/>may kalong 
																	sa iyo ang 
																	nagtatangkilik.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	148<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung 
																	nasusuklam 
																	ka sa aking 
																	kandungan,
																	<br/>lason sa 
																	puso mo ang 
																	hindi 
																	binyagan <br/>nakukutya 
																	akong di ka 
																	saklolohan
																	<br/>sa iyong 
																	nasapit na 
																	napakarawal.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	149<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ipinahahayag 
																	ng pananamit 
																	mo, <br/>taga-Albanya 
																	ka at ako'y 
																	Persyano;
																	<br/>ikaw ay 
																	kaaway ng 
																	baya't sekta 
																	ko, <br/>sa lagay mo 
																	ngayo'y 
																	magkatoto 
																	tayo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	150<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Moro ako'y 
																	lubos na 
																	taong may 
																	dibdib <br/>at 
																	nasasaklaw 
																	rin ng utos 
																	ng Langit;
																	<br/>dine sa puso 
																	ko'y kusang 
																	natititik-
																	<br/>natural na 
																	ley-ing sa 
																	aba't 
																	mahapis. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	151<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anong 
																	gagawin ko'y 
																	aking 
																	napakinggan
																	<br/>ang iyong 
																	pagtaghoy na 
																	kalumbay-lumbay,
																	<br/>gapos na 
																	nakita't 
																	pamumutiwanan
																	<br/>ng dalawang 
																	ganid, ng 
																	bangis na 
																	tangan.&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	152 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nagbuntunghininga 
																	itong abang 
																	kalong <br/>at sa 
																	umaaaliw na 
																	Moro'y 
																	tumugon, <br/>&quot;Kung di mo 
																	kinalag sa 
																	puno ng 
																	kahoy, <br/>nalibing na 
																	ako sa tiyan 
																	ng leon. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	153 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Payapa na 
																	naman disin 
																	yaring 
																	dibdib, <br/>napagkikilalang 
																	kaaway kang 
																	labis; <br/>at di 
																	binayaang 
																	nagkapatid-patid
																	<br/>ang aking 
																	hiningang 
																	kamataya't 
																	sakit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	154 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Itong iyong 
																	awa'y di ko 
																	hinahangad,
																	<br/>patayin mo 
																	ako'y siyang 
																	pitang 
																	habag; <br/>di mo tanto 
																	yaring 
																	binabatang 
																	hirap, <br/>na ang 
																	kamatayan 
																	ang buhay 
																	kong hanap.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	155<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dito 
																	napahiyaw sa 
																	malaking 
																	hapis <br/>ang Morong 
																	may awa't 
																	luha'y 
																	tumagistis;
																	<br/>siyang 
																	itinugon sa 
																	wikang 
																	narinig <br/>at sa 
																	panlulumo'y 
																	kusang 
																	napahilig.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	156<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Anupa't 
																	kapwa hindi 
																	nakakibo <br/>di 
																	nangakalaban 
																	sa damdam ng 
																	puso; <br/>parang 
																	walang malay 
																	hanggang sa 
																	magtago't
																	<br/>humilig sa 
																	Pebo sa 
																	hihigang 
																	ginto. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	157<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>May awang 
																	gerero ay sa 
																	maramdaman,
																	<br/>malamlam na 
																	sinag sa 
																	gubat ay 
																	nanaw, <br/>tinunton ang 
																	landas na 
																	pinagdaanan,
																	<br/>dinala ang 
																	kalong sa 
																	pinanggalingan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	158<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Doon sa 
																	naunang 
																	hinintuang 
																	dako <br/>nang masok 
																	sa gubat ang 
																	bayaning 
																	Moro, <br/>sa isang 
																	malapad, 
																	malinis na 
																	bato, <br/>kusang 
																	pinagyaman 
																	ang lugaming 
																	pangko. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	159<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kumuha ng 
																	munting 
																	baong 
																	makakain,
																	<br/>ang 
																	nagdaralita'y 
																	inamong 
																	tumikim, <br/>kahit 
																	umaayaw ay 
																	nahikayat 
																	din <br/>ng sabing 
																	malambot na 
																	pawang 
																	pang-aliw.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	160<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Naluwag-luwagan 
																	ang 
																	panghihingapos,
																	<br/>sapagka't 
																	naawas sa 
																	pagkadayukdok,
																	<br/>hindi 
																	kinukusa'y 
																	tantong 
																	nakatulog,
																	<br/>sa 
																	sinapupunan 
																	ng gererong 
																	bantog. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	161<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ito'y di 
																	umidlip sa 
																	buong 
																	magdamag,
																	<br/>sa 
																	pag-aalaga'y 
																	nagbata ng 
																	puyat; <br/>ipinanganganib 
																	ay baka 
																	makagat <br/>ng ganid na 
																	madlang 
																	nagkalat sa 
																	gubat. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	162 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Tuwing 
																	magigising 
																	sa magaang 
																	tulog, <br/>itong 
																	lipos-hirap 
																	ay 
																	naghihimutok,
																	<br/>pawang 
																	tumitirik na 
																	anaki'y 
																	tunod <br/>sa dibdib ng 
																	Morong may 
																	habag at 
																	lunos. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	163 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nang 
																	magmamadaling-araw 
																	ay 
																	nahimbing,
																	<br/>munting 
																	napayapa sa 
																	dalang 
																	hilahil; <br/>hanggang sa 
																	Aurorang 
																	itaboy ang 
																	dilim, <br/>walang 
																	binitiwang 
																	himutok at 
																	daing. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	164 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ito ang 
																	dahilang 
																	ipinagkasundo,
																	<br/>limang 
																	karamdamang 
																	parang 
																	hinahalo;
																	<br/>ikinatiwasay 
																	ng may 
																	dusang puso,
																	<br/>lumakas na 
																	muli ang 
																	katawang 
																	hapo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	165<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kaya't nang 
																	isabog sa 
																	sansinukuban
																	<br/>ang doradong 
																	buhok ng 
																	masayang 
																	araw, <br/>nagbangong 
																	hinaho't 
																	pinasalamatan
																	<br/>sa Langit 
																	ang bagong 
																	lakas ng 
																	katawan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	166<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sabihin ang 
																	tuwa ng 
																	gererong 
																	hayag, <br/>ang abang 
																	kinalong ay 
																	biglang 
																	niyakap; <br/>kung nang 
																	una'y nukal 
																	ang luha sa 
																	habag, <br/>ngayo'y sa 
																	galak na ang 
																	inilagaslas.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	167<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kapos ang 
																	dila kong 
																	magsaysay ng 
																	laki <br/>ng 
																	pasasalamat 
																	nitong 
																	kinandili;
																	<br/>kundangan 
																	ang dusa'y 
																	sa nawalang 
																	kasi <br/>ay napawi 
																	disin sa 
																	tuwang 
																	umali. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	168<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sapagka't 
																	ang dusang 
																	mula sa 
																	pag-ibig <br/>kung kahit 
																	mangyaring 
																	lumayo sa 
																	dibdib, <br/>kisapmata 
																	lamang ay 
																	agad babalik
																	<br/>at 
																	magdaragdag 
																	pa sa una ng 
																	bangis. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	169<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Kaya hindi 
																	pa rin halos 
																	dumadapo <br/>ang tuwa sa 
																	lamad ng may 
																	dusang puso
																	<br/>ay itinakwil 
																	na ang 
																	dalitang 
																	lalo <br/>at ang tunod 
																	niya'y 
																	siyang 
																	itinimo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	170<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Niyapos na 
																	muli ang 
																	dibdib ng 
																	dusa, <br/>hirap yatang 
																	bathin ng 
																	sakit sa 
																	sinta! <br/>dangan 
																	inaaliw ng 
																	Moro sa 
																	Persya, <br/>natuluyang 
																	nanaw ang 
																	tangang 
																	hininga.
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">&nbsp;<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">171<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Iyong 
																	natatanto 
																	ang aking 
																	paglingap,&quot;
																	<br/>anitong 
																	Persyano sa 
																	nababagabag;
																	<br/>&quot;mula ng 
																	hirap mo'y 
																	ibig kong 
																	magtatap <br/>at nang kung 
																	may daa'y 
																	malagyan ng 
																	lunas.&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">172 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>Tugon ng may 
																	dusa'y &quot;di 
																	lamang ang 
																	mula <br/>niring 
																	dalita ko 
																	ang 
																	isasalita,
																	<br/>kundi 
																	sampung 
																	buhay sapul 
																	sa 
																	pagkabata,
																	<br/>nang 
																	maganapan ko 
																	ang hingi 
																	mo't nasa.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">173 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>Nupong 
																	nag-agapay 
																	sa puno ng 
																	kahoy <br/>ang may 
																	dalang habag 
																	at 
																	lipos-linggatong,
																	<br/>saka 
																	sinalitang 
																	luha'y 
																	bumabalong,
																	<br/>buong naging 
																	buhay 
																	hanggang 
																	naparoon.
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