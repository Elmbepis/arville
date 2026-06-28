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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><font face="Arial" style="font-size: 15pt"><font color="#800080"><b>Paglalarawan sa Kalagayan ni</b></font><b><font color="#800080"> Florante</font></b></font></p>
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
																	1<br/></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	Sa isang 
																	madilim, 
																	gubat na 
																	mapanglaw,
																	<br/>dawag na 
																	matinik ay 
																	walang 
																	pagitan, <br/>halos 
																	naghihirap 
																	ang kay 
																	Febong 
																	silang <br/>dumalaw sa 
																	loob ng 
																	lubhang 
																	masukal. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	2<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Malalaking 
																	kahoy 
																	ang 
																	inihahandog
																	<br/>pawang 
																	dalamhati, 
																	kahapisa't 
																	lungkot; <br/>huni pa ng 
																	ibon ay 
																	nakalulunos
																	<br/>sa lalong 
																	matimpi't 
																	nagsasayang 
																	loob. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	3<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Tanang mga 
																	baging 
																	namimilipit
																	<br/>sa sanga ng 
																	kahoy ay 
																	balot ng 
																	tinik; <br/>may bulo ang 
																	bunga't 
																	nagbibigay-sakit
																	<br/>sa kanino pa 
																	mang 
																	sumagi't 
																	malapit. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	4<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ang mga 
																	bulaklak ng 
																	nagtayong 
																	kahoy, <br/>pinakamaputing 
																	nag-uungos 
																	sa dahon;
																	<br/>pawang kulay 
																	luksa at 
																	nakikiayon
																	<br/>sa 
																	nakaliliyong 
																	masangsang 
																	na amoy. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	5<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Karamiha'y 
																	Cipres at 
																	Higerang 
																	kutad <br/>na ang lilim 
																	niyon ay 
																	nakasisindak;
																	<br/>ito'y walang 
																	bunga't 
																	daho'y 
																	malalapad
																	<br/>na 
																	nakadidilim 
																	sa loob ng 
																	gubat. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	6<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ang mga 
																	hayop pang 
																	dito'y 
																	gumagala,
																	<br/>karamiha'y 
																	Sierpe't 
																	Basilisco'y 
																	madla, <br/>Hiena't 
																	Tigreng 
																	ganid na 
																	nagsisisila
																	<br/>ng buhay ng 
																	tao't 
																	daiging 
																	kapuwa. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	7<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ito'y gubat 
																	manding sa 
																	pinto'y 
																	malapit <br/>ng Avernong 
																	Reyno ni 
																	Plutong 
																	masungit;
																	<br/>ang 
																	nasasakupang 
																	lupa'y 
																	dinidilig
																	<br/>ng Ilog 
																	Cocitong 
																	kamandag ang 
																	tubig. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	8<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa may gitna 
																	nitong 
																	mapanglaw na 
																	gubat, <br/>may punong 
																	Higerang 
																	daho'y kulay 
																	pupas; <br/>dito 
																	nagagapos 
																	ang 
																	kahabag-habag,
																	<br/>isang 
																	pinag-usig 
																	ng masamang 
																	palad. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	9<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Baguntaong 
																	basal na ang 
																	anyo't 
																	tindig, <br/>kahit 
																	natatali-kamay 
																	paa't liig,
																	<br/>kundi si 
																	Narciso'y 
																	tunay na 
																	Adonis, <br/>mukhang 
																	sumisilang 
																	sa gitna ng 
																	sakit. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	10<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Makinis ang 
																	balat at 
																	anaki'y 
																	burok <br/>pilikmata'y 
																	kilay-mistulang 
																	balantok;
																	<br/>bagong 
																	sapong ginto 
																	ang kulay ng 
																	buhok, <br/>sangkap ng 
																	katawa'y 
																	pawang 
																	magkaayos.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	11<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dangan doo'y 
																	walang 
																	Oreadas 
																	Nimfas, <br/>gubat ng 
																	Palasyo ng 
																	masidhing 
																	Harpias, <br/>nangaawa 
																	disi't 
																	naakay 
																	lumiyag <br/>sa himalang 
																	tipon ng 
																	karikta'y 
																	hirap. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	12 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ang abang 
																	uyamin ng 
																	dalita't 
																	sakit- <br/>ang dalawang 
																	mata'y bukal 
																	ang kaparis;
																	<br/>sa luhang 
																	nanakit at 
																	tinangis-tangis,
																	<br/>ganito'y 
																	damdamin ng 
																	may awang 
																	dibdib. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	13 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Mahiganting 
																	langit! 
																	bangis mo'y 
																	nasaan? <br/>ngayo'y 
																	naniniig sa 
																	pagkagulaylay;
																	<br/>bago'y ang 
																	bandila ng 
																	lalong kasam-an
																	<br/>sa Reynong 
																	Albania'y 
																	iwinawagayway.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	14 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa loob at 
																	labas ng 
																	bayan ko 
																	sawi, <br/>kaliluha'y 
																	siyang 
																	nangyayaring 
																	hari, <br/>kagalinga't 
																	bait ay 
																	nalulugami,
																	<br/>ininis sa 
																	hukay ng 
																	dusa't 
																	pighati. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	15<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang 
																	magandang 
																	asal ay 
																	ipinupukol
																	<br/>sa laot ng 
																	dagat na 
																	kutya't 
																	linggatong;
																	<br/>balang 
																	magagaling 
																	ay ibinabaon
																	<br/>at 
																	inililibing 
																	na walang 
																	kabaong. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	16<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nguni ay 
																	ang lilo't 
																	masasamang-loob
																	<br/>sa trono ng 
																	puri ay 
																	iniluluklok;
																	<br/>at sa balang 
																	sukab na may 
																	asal-hayop,
																	<br/>mabangong 
																	insenso ang 
																	isinusuob.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	17<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kaliluha't 
																	sama ang 
																	ulo'y 
																	nagtayo <br/>at ang 
																	kabaita'y 
																	kimi't 
																	nakayuko;
																	<br/>santong 
																	katuwira'y 
																	lugami at 
																	hapo, <br/>ang luha na 
																	lamang ang 
																	pinatutulo.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	18<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At ang 
																	balang bibig 
																	na 
																	binubukalan
																	<br/>ng sabing 
																	magaling at 
																	katotohanan,
																	<br/>agad 
																	binibiyak at 
																	sinisikangan
																	<br/>ng kalis ng 
																	lalong 
																	dustang 
																	kamatayan.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	19<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;O, taksil 
																	na pita sa 
																	yama't 
																	mataas! <br/>O, hangad sa 
																	puring 
																	hanging 
																	lumilipas!
																	<br/>ikaw ang 
																	dahilan ng 
																	kasam-ang 
																	lahat <br/>at niring 
																	nasapit na 
																	kahabag-habag!
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	20<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa korona 
																	dahil ng 
																	Haring 
																	Linceo <br/>at sa 
																	kayamanan ng 
																	Dukeng Ama 
																	ko, <br/>ang 
																	ipinangangahas 
																	ng Konde 
																	Adolfo <br/>sabugan ng 
																	sama ang 
																	Albanyang 
																	Reyno. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	21<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang lahat 
																	ng ito'y 
																	maawaing 
																	Langit, <br/>Iyong 
																	tinutungha'y 
																	ano't 
																	natitiis?
																	<br/>mula Ka ng 
																	buong 
																	katuwira't 
																	bait, <br/>pinapayagan 
																	Mong ilubog 
																	ng lupit.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	22 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Makapangyarihang 
																	kanan Mo'y 
																	ikilos, <br/>papamilantikan 
																	ang kalis ng 
																	poot; <br/>sa Reynong 
																	Albanya'y 
																	kusang 
																	ibulusok <br/>ang Iyong 
																	higanti sa 
																	masamang-loob.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	23</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">&nbsp;<br/>&quot;Bakit 
																	Kalangita'y 
																	bingi Ka sa 
																	akin, <br/>ang tapat 
																	kong luhog 
																	ay hindi Mo 
																	dinggin? <br/>diyata't sa 
																	isang 
																	alipusta't 
																	iring, <br/>sampung 
																	tainga mo'y 
																	ipinangunguling?<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">24 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Datapuwa't 
																	sino ang 
																	tatarok kaya
																	<br/>sa mahal 
																	Mong lihim, 
																	Diyos na 
																	dakila? <br/>walang 
																	nangyayari 
																	sa balat ng 
																	lupa, <br/>di may 
																	kagalingang 
																	Iyong 
																	ninanasa.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">25<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Ay! di saan 
																	ngayon ako 
																	mangangapit!
																	<br/>saan 
																	ipupukol ang 
																	tinangis-tangis,
																	<br/>kung ayaw na 
																	ngayong 
																	dinigin ng 
																	Langit <br/>ang sigaw ng 
																	aking 
																	malumbay na 
																	boses! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">26<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Kung siya 
																	mong ibig na 
																	ako'y 
																	magdusa, <br/>Langit na 
																	mataas, 
																	aking 
																	mababata;
																	<br/>isagi mo 
																	lamang sa 
																	puso ni 
																	Laura-- <br/>ako'y 
																	minsan-minsang 
																	mapag-alaala.&quot;</font></p>
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