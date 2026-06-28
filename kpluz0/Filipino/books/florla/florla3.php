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
																	<font face="Arial" style="font-size: 15pt; font-weight:700" color="#800080">
																	Dalawang Uri ng Ama</font></p>
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
																	69<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nagkataong 
																	siyang 
																	pagdating sa 
																	gubat <br/>ng isang 
																	gererong 
																	bayani ang 
																	tikas, <br/>putong na 
																	turbante ay 
																	kalingas-lingas
																	<br/>pananamit 
																	moro sa 
																	Persyang 
																	siyudad. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	70<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Pinigil ang 
																	lakad at 
																	nagtanaw-tanaw,
																	<br/>anaki'y 
																	ninitang 
																	pagpapahingahan,
																	<br/>di 
																	kaginsa-ginsa'y 
																	ipinagtapunan
																	<br/>ang pika't 
																	adarga't 
																	nagdaop ng 
																	kamay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	71<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Saka 
																	tumingala't 
																	mata'y 
																	itinirik <br/>sa bubong ng 
																	kahoy na 
																	takip sa 
																	Langit, <br/>istatuwa 
																	manding 
																	nakatayo'y 
																	umid, <br/>ang 
																	buntunghininga 
																	niya'y 
																	walang 
																	patid. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	72 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nang 
																	magdamdam-ngawit 
																	sa pagayong 
																	anyo, <br/>sa puno ng 
																	isang kahoy 
																	ay umupo,
																	<br/>nagwikang &quot;O 
																	palad!&quot; 
																	sabay ang 
																	pagtulo <br/>sa mata ng 
																	luhang 
																	anaki'y 
																	palaso. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	73 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ulo'y 
																	ipinatong sa 
																	kaliwang 
																	kamay <br/>at saka 
																	tinutop ang 
																	noo ng 
																	kanan; <br/>isang 
																	mayroong 
																	ginugunamgunam--
																	<br/>isang 
																	mahalagang 
																	nalimutang 
																	bagay. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	74 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Malao'y 
																	humilig, 
																	nagwalang-bahala,
																	<br/>di rin 
																	kumakati ang 
																	batis ng 
																	luha; <br/>sa madlang 
																	himutok ay 
																	kasalamuha
																	<br/>ang wikang: 
																	&quot;Flerida'y 
																	tapos na ang 
																	tuwa!&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	75<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa balang 
																	sandali ay 
																	sinasabugan
																	<br/>yaong buong 
																	gubat ng 
																	maraming 
																	&quot;Ay! Ay!&quot;
																	<br/>na 
																	nakikitono 
																	sa huning 
																	mapanglaw
																	<br/>ng 
																	panggabing 
																	ibong doo'y 
																	nagtatahan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	76<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Pamaya-maya'y 
																	nabangong 
																	nagulat, <br/>tinangnan 
																	ang pika't 
																	sampu ng 
																	kalasag; <br/>nalimbag sa 
																	mukha ang 
																	bangis ng 
																	furias-- <br/>&quot;Di ko 
																	itutulot!&quot; 
																	ang 
																	ipinahayag.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	77<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At kung kay 
																	Flerida'y 
																	iba ang 
																	umagaw <br/>at di ang 
																	ama kong 
																	dapat na 
																	igalang, <br/>hindi ko 
																	masabi kung 
																	ang pikang 
																	tangan-- <br/>bubuga ng 
																	libo't 
																	laksang 
																	kamatayan!
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	78<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Bababa si 
																	Marte mula 
																	sa itaas <br/>at 
																	kailalima'y 
																	aahon ang 
																	Parcas; <br/>buong galit 
																	nila ay 
																	ibubulalas,
																	<br/>yayakagin 
																	niring kamay 
																	kong 
																	marahas! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	79<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa kuko ng 
																	lilo'y aking 
																	aagawin <br/>ang kabiyak 
																	niring 
																	kaluluwang 
																	angkin; <br/>liban na kay 
																	ama, ang 
																	sinuma't 
																	alin <br/>ay di 
																	igagalang ng 
																	tangang 
																	patalim. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	80<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;O, 
																	pagsintang 
																	labis ng 
																	kapangyarihan,
																	<br/>sampung 
																	mag-aama'y 
																	iyong 
																	nasasaklaw;
																	<br/>pag ikaw ang 
																	nasok sa 
																	puso 
																	ninuman, <br/>hahamaking 
																	lahat 
																	masunod ka 
																	lamang! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	81<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At 
																	yuyurakan na 
																	ang lalong 
																	dakila-- <br/>bait, 
																	katuwira'y 
																	ipanganganyaya;
																	<br/>buong 
																	katungkula'y 
																	wawal-ing-bahala,
																	<br/>sampu ng 
																	hininga'y 
																	ipauubaya.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	82 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Itong 
																	kinaratnan 
																	ng palad ko 
																	linsil <br/>salaming 
																	malinaw na 
																	sukat 
																	mahalin <br/>ng 
																	makatatatap, 
																	nang hindi 
																	sapitin <br/>ang 
																	kahirapan 
																	kong di 
																	makayang 
																	bathin.&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	83 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa mawika 
																	ito luha'y 
																	pinaagos,
																	<br/>pika'y 
																	isinaksak 
																	saka 
																	naghimutok;
																	<br/>nagkataon 
																	namang 
																	parang 
																	isinagot <br/>ang 
																	buntunghininga 
																	niyaong 
																	nagagapos.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	84 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Gerero'y 
																	namangha 
																	nang ito'y 
																	marinig, <br/>pinagbaling-baling 
																	sa gubat ang 
																	titig; <br/>nang walang 
																	makita'y 
																	hinintay 
																	umulit, <br/>di man 
																	nalao'y 
																	nagbangong 
																	humibik. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	85<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ang bayaning 
																	Moro'y lalo 
																	nang 
																	namaang, <br/>&quot;Sinong 
																	nanaghoy sa 
																	ganitong 
																	ilang?&quot; <br/>lumapit sa 
																	dakong 
																	pinanggagalingan
																	<br/>ng 
																	buntunghininga't 
																	pinakimatyagan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	86<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Inabutan 
																	niya'y ang 
																	ganitong 
																	hibik: <br/>&quot;Ay, 
																	mapagkandiling 
																	amang 
																	iniibig! <br/>bakit ang 
																	buhay mo'y 
																	naunang 
																	napatid, <br/>ako'y 
																	inulila sa 
																	gitna ng 
																	sakit? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	87<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung sa 
																	gunita ko'y 
																	pagkuru-kuruin
																	<br/>ang 
																	pagkahulog 
																	mo sa kamay 
																	ng taksil,
																	<br/>parang 
																	nakikita ang 
																	iyong 
																	narating...
																	<br/>parusang 
																	marahas na 
																	kalagim-lagim.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	88<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At alin ang 
																	hirap na di 
																	ikakapit <br/>sa iyo ng 
																	Konde 
																	Adolfong 
																	malupit? <br/>ikaw ang 
																	salamin - sa 
																	Reyno - ng 
																	bait, <br/>pagbubuntunan 
																	ka ng 
																	malaking 
																	galit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	89<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Katawan mo 
																	ama'y parang 
																	namamalas
																	<br/>ngayon ng 
																	bunso mong 
																	lugami sa 
																	hirap; <br/>pinipisan-pisan 
																	at 
																	iwinawalat
																	<br/>ng pawa ring 
																	lilo'y 
																	berdugo ng 
																	sukab. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	90<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang 
																	nagkahiwalay 
																	na laman 
																	mo't buto,
																	<br/>kamay at 
																	katawang 
																	nalayo sa 
																	ulo, <br/>ipinaghagisan 
																	niyong mga 
																	lilo <br/>at walang 
																	maawang 
																	naglibing na 
																	tao. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	91<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sampu ng 
																	lingkod mo't 
																	mga kaibigan
																	<br/>kung kampi 
																	sa lilo'y 
																	iyong nang 
																	kaaway; <br/>ang di 
																	nagsiayo'y 
																	natatakot 
																	namang <br/>bangkay mo'y 
																	ibao't 
																	mapaparusahan.
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	92<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hanggang 
																	dito ama'y 
																	aking 
																	naririnig,
																	<br/>nang ang 
																	iyong ulo'y 
																	itapat sa 
																	kalis; <br/>ang 
																	panambitan 
																	mo't 
																	dalangin sa 
																	Langit, <br/>na ako'y 
																	maligtas sa 
																	kukong 
																	malupit. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	93 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ninanasa mo 
																	pang ako'y 
																	matabunan
																	<br/>ng bangkay 
																	sa gitna ng 
																	pagpapatayan,
																	<br/>nang huwag 
																	mahulog sa 
																	panirang 
																	kamay <br/>ng Konde 
																	Adolfong 
																	higit sa 
																	halimaw. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	94 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pananalangin 
																	mo'y di pa 
																	nagaganap,
																	<br/>sa liig mo'y 
																	biglang 
																	nahulog ang 
																	tabak; <br/>nasnaw sa 
																	bibig mong 
																	huling 
																	pangungusap
																	<br/>ang Adiyos 
																	bunso't 
																	buhay mo'y 
																	lumipas. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	95<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ay, amang 
																	ama ko! kung 
																	nagunamgunam--
																	<br/>madla mong 
																	pag-irog at 
																	pagpapalayaw,
																	<br/>ipinapalaso 
																	ng 
																	kapighatian--
																	<br/>luha niring 
																	pusong sa 
																	mata'y 
																	nunukal. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	96<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Walang 
																	ikalawang 
																	ama ka sa 
																	lupa <br/>sa anak na 
																	kandong ng 
																	pag-aaruga;
																	<br/>ang munting 
																	hapis kong 
																	sumungaw sa 
																	mukha, <br/>sa habag 
																	mo'y agad 
																	nanalong ang 
																	luha. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	97<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang lahat 
																	ng tuwa'y 
																	natapos sa 
																	akin, <br/>sampu niring 
																	buhay ay 
																	naging 
																	hilahil; <br/>ama ko'y 
																	hindi na 
																	malaong 
																	hihintin <br/>ako't sa 
																	payapang 
																	baya'y 
																	yayakapin.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	98<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sandaling 
																	tumigil 
																	itong 
																	nananangis,
																	<br/>binigyang-panahon 
																	luha'y 
																	tumagistis
																	<br/>niyong 
																	naawang 
																	morong 
																	nakikinig...
																	<br/>sa habag ay 
																	halos 
																	magputok ang 
																	dibdib. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	99<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Tinutop ang 
																	puso at saka 
																	nagsaysay,
																	<br/>&quot;Kailan,&quot; 
																	aniya, &quot;luha 
																	ko'y bubukal
																	<br/>ng habag kay 
																	ama at 
																	panghihinayang
																	<br/>para ng 
																	panaghoy ng 
																	nananambitan?
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	100<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa sintang 
																	inagaw ang 
																	itinatangis,
																	<br/>dahilan ng 
																	aking luhang 
																	nagbabatis;
																	<br/>yao'y 
																	nananaghoy 
																	dahil sa 
																	pag-ibig <br/>sa amang 
																	namatay na 
																	mapagtangkilik.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	101<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung ang 
																	walang patid 
																	na ibinabaha
																	<br/>ng mga mata 
																	ko'y sa 
																	hinayang 
																	mula-- <br/>sa mga 
																	palayaw ni 
																	ama't 
																	aruga-- <br/>malaking 
																	palad ko't 
																	matamis na 
																	luha. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	102 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ngunit ang 
																	nanahang 
																	maralitang 
																	tubig... <br/>sa mukha't 
																	dibdib kong 
																	laging 
																	dumidilig,
																	<br/>kay ama nga 
																	galing 
																	datapuwa't 
																	sa bangis,
																	<br/>hindi sa 
																	andukha at 
																	pagtatangkilik.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	103 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang 
																	matatawag 
																	kong palayaw 
																	sa akin <br/>ng ama ko'y 
																	itong ako'y 
																	pagliluhin,
																	<br/>agawan ng 
																	sinta't 
																	panasa-nasaing
																	<br/>lumubog sa 
																	dusa't buhay 
																	ko'y 
																	makitil. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	104 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;May para 
																	kong anak na 
																	napanganyaya,
																	<br/>ang layaw sa 
																	ama'y dusa't 
																	pawang luha?
																	<br/>hindi 
																	nakalasap 
																	kahit 
																	munting tuwa
																	<br/>sa masintang 
																	inang 
																	pagdaka'y 
																	nawala!&quot;
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