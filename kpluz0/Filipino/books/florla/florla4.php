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
																	Pagmamahal 
																	sa Bayan<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	105
																	</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	Napahinto 
																	rito'y 
																	narinig na 
																	muli <br/>ang 
																	pananambitan 
																	niyong 
																	nakatali,
																	<br/>na ang 
																	wika'y 
																	&quot;Laurang 
																	aliw niring 
																	budhi, <br/>paalam ang 
																	abang 
																	kandong ng 
																	pighati.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	106<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Lumagi ka 
																	nawa sa 
																	kaligayahan,
																	<br/>sa harap ng 
																	di mo 
																	esposang 
																	katipan; <br/>at huwag 
																	mong datnin 
																	yaring 
																	kinaratnan
																	<br/>ng kasing 
																	nilimot at 
																	pinagliluhan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	107<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung 
																	nagbangis ka 
																	ma't 
																	nagsukab sa 
																	akin, <br/>mahal ka 
																	ring lubha 
																	dini sa 
																	panimdim <br/>at kung 
																	mangyayari 
																	hanggang sa 
																	malibing,
																	<br/>ang mga buto 
																	ko, kita'y 
																	sisintahin.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	108<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Di pa 
																	natatapos 
																	itong 
																	pangungusap,
																	<br/>may dalawang 
																	leong hangos 
																	ng paglakad,
																	<br/>siya'y 
																	tinutungo't 
																	pagsil-in 
																	ang hangad,
																	<br/>ngunit 
																	nangatigil 
																	pagdating sa 
																	harap. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	109<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Nangaawa 
																	mandi't 
																	nawalan ng 
																	bangis <br/>sa abang 
																	sisil-ing 
																	larawan ng 
																	sakit; <br/>nangakatingala't 
																	parang 
																	nakikinig
																	<br/>sa di 
																	lumilikat na 
																	tinangis-tangis.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	110<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Anong loob 
																	kaya nitong 
																	nagagapos,
																	<br/>ngayong nasa 
																	harap ang 
																	dalawang 
																	hayop, <br/>na ang 
																	balang 
																	ngipi't 
																	kuko'y 
																	naghahandog--
																	<br/>isang 
																	kamatayang 
																	kakila-kilabot!
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	111<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Di ko na 
																	masabi't 
																	luha ko'y 
																	nanatak, <br/>nauumid 
																	yaring 
																	dilang 
																	nangungusap;
																	<br/>puso ko'y 
																	nanlambot sa 
																	malaking 
																	habag <br/>sa 
																	kaawa-awang 
																	kinubkob ng 
																	hirap. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	112 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sino'y di 
																	mahapis na 
																	may 
																	karamdaman
																	<br/>sa lagay ng 
																	gapos na 
																	kalumbay-lumbay;
																	<br/>lipos ng 
																	pighati saka 
																	tinutunghan
																	<br/>sa laman at 
																	buto niya 
																	ang hihimay!
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	113 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Katiwala na 
																	nga itong 
																	tigib-sakit
																	<br/>na ang buhay 
																	niya'y 
																	tuntong na 
																	sa guhit;
																	<br/>nilagnat ang 
																	puso't 
																	nasira ang 
																	boses, <br/>di na 
																	mawatasan 
																	halos itong 
																	hibik. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	114 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Paalam, 
																	Albanyang 
																	pinamamayanan
																	<br/>ng kasam-at 
																	lupit, 
																	bangis, 
																	kaliluhan;
																	<br/>akong 
																	tanggulan 
																	mo'y kusa 
																	mang 
																	pinatay, <br/>sa iyo'y 
																	malaki ang 
																	panghihinayang.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	115<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa loob mo 
																	nawa'y huwag 
																	mamilantik
																	<br/>ang panirang 
																	talim ng 
																	katalong 
																	kalis; <br/>magka-espada 
																	kang para 
																	nang 
																	binitbit <br/>niring 
																	kinuta mong 
																	kanang 
																	matangkilik.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	<font face="Arial" style="font-size: 14pt" color="#333333">&nbsp;
																	<br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">116<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Kinasuklaman 
																	mo ang 
																	pangako--
																	<br/>sa iyo'y 
																	gugulin 
																	niniyak kong 
																	dugo; <br/>at inibig mo 
																	pang hayop 
																	ang magbubo
																	<br/>sa kung 
																	itanggol 
																	ka'y maubos 
																	tumulo. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">117<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Pagkabata 
																	ko na'y 
																	walang 
																	inadhika <br/>kundi 
																	paglilingkod 
																	sa iyo't 
																	kalinga; <br/>di makailan 
																	kang 
																	babal-ing 
																	masira, <br/>ang mga 
																	kamay ko'y 
																	siyang 
																	tumimawa.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">118<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Dustang 
																	kamatayan 
																	ang bihis 
																	mong bayad;
																	<br/>dapuwa't sa 
																	iyo'y 
																	magpapasalamat
																	<br/>kung 
																	pakamahali't 
																	huwag 
																	ipahamak <br/>ang 
																	tinatangisang 
																	giliw na 
																	nagsukab.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">119<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Yaong aking 
																	Laurang 
																	hindi 
																	mapapaknit
																	<br/>ng kamatayan 
																	man sa tapat 
																	ng dibdib;
																	<br/>paalam, 
																	Bayan ko, 
																	paalam na, 
																	ibig, <br/>magdarayang 
																	sintang di 
																	manaw na 
																	isip! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">120<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Bayang 
																	walang-loob, 
																	sintang 
																	alibugha,
																	<br/>Adolfong 
																	malupit, 
																	Laurang 
																	magdaraya,
																	<br/>magdiwang na 
																	ngayo't 
																	manulos sa 
																	tuwa <br/>at masusunod 
																	na sa akin 
																	ang nasa.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">121<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Nasa harap 
																	ko na ang 
																	lalong 
																	marawal, <br/>mabangis na 
																	lubhang 
																	lahing 
																	kamatayan;
																	<br/>malulubos na 
																	nga ang 
																	iyong 
																	kasam-an,
																	<br/>gayundin ang 
																	aking 
																	kaalipustaan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">122 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Sa 
																	abang-aba 
																	ko! diyata, 
																	O Laura...
																	<br/>mamamatay 
																	ako'y hindi 
																	mo na sinta!
																	<br/>ito ang 
																	malapit sa 
																	lahat ng 
																	dusa, <br/>sa akin ay 
																	sino'ng 
																	mag-aalaala!
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">123 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Diyata't 
																	ang aking 
																	pagkapanganyaya,
																	<br/>di mo 
																	tatapunan ng 
																	munti mang 
																	luha; <br/>kung yaring 
																	buhay ko'y 
																	mahimbing sa 
																	wala, <br/>di 
																	babahaginan 
																	ng munting 
																	gunita! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">124 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Guniguning 
																	ito'y 
																	lubhang 
																	makamandag,
																	<br/>agos na luha 
																	ko't puso 
																	ko'y maagnas
																	<br/>tulo 
																	kaluluwa't 
																	sa mata'y 
																	pumulas, <br/>kayo aking 
																	dugo'y 
																	mag-unahang 
																	matak. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight: 700" color="#0000CC">125<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333"><br/>&quot;Nang 
																	matumbasan 
																	ko ang luha, 
																	ang sakit
																	<br/>nitong 
																	pagkalimot 
																	ng tunay 
																	kong ibig,
																	<br/>huwag yaring 
																	buhay ang 
																	siyang 
																	itangis <br/>kundi ang 
																	pagsintang 
																	lubos na 
																	naamis.&quot;
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