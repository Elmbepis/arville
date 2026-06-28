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
																	Pag-uwi ni 
																	Florante sa 
																	Albanya
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
																	254 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Bininit sa 
																	busog ang 
																	siyang 
																	katulad <br/>ng tulin ng 
																	aming daong 
																	sa paglayag,
																	<br/>kaya di 
																	naglaon paa 
																	ko'y yumapak
																	<br/>sa 
																	dalampasigan 
																	ng Albanya 
																	Syudad. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	255<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pag-ahon 
																	ko'y agad 
																	nagtulo sa 
																	Kinta, <br/>di 
																	humihiwalay 
																	katotong 
																	sinta; <br/>paghalik sa 
																	kamay ng 
																	poon kong 
																	ama, <br/>lumala ang 
																	sakit nang 
																	dahil kay 
																	ina. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	256<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nagdurugong 
																	muli ang 
																	sugat ng 
																	puso, <br/>humigit sa 
																	una ang 
																	dusang 
																	bumugso; <br/>nawikang 
																	kasunod ng 
																	luhang 
																	tumulo: <br/>Ay, Ama! 
																	kasabay ng 
																	bating Ay, 
																	bunso. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	257<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anupa'y ang 
																	aming buhay 
																	na mag-ama,
																	<br/>nayapos ng 
																	bangis ng 
																	sing-isang 
																	dusa; <br/>kami ay 
																	dinatnang 
																	nagkakayakap 
																	pa <br/>niyong 
																	embahador ng 
																	Bayang 
																	Krotona. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	258<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nakapanggaling 
																	na sa 
																	Palasyo Real
																	<br/>at 
																	ipinagsabi 
																	sa hari ang 
																	pakay; <br/>dala'y isang 
																	sulat sa ama 
																	kong hirang,
																	<br/>titik ng 
																	monarkong 
																	kaniyang 
																	biyenan. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	259<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Humihinging 
																	tulong at 
																	nasa 
																	pangamba,
																	<br/>ang 
																	Krotonang 
																	Reyno'y 
																	kubkob ng 
																	kabaka; <br/>ang puno ng 
																	hukbo'y 
																	balita ng 
																	sigla-- <br/>Heneral 
																	Osmalic na 
																	bayaning 
																	Persya. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	260<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ayon sa 
																	balita'y 
																	pangalawa 
																	ito <br/>ng Prinsipe 
																	niyang 
																	bantog sa 
																	sangmundo--
																	<br/>Alading 
																	kilabot ng 
																	mga gerero,
																	<br/>iyong 
																	kababayang 
																	hinahangaan 
																	ko.&quot; <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	261<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dito 
																	napangiti 
																	ang Morong 
																	kausap, <br/>sa 
																	nagsasalita'y 
																	tumugong 
																	banayad; <br/>aniya'y 
																	&quot;Bihirang 
																	balita'y 
																	magtapat,
																	<br/>kung 
																	magkatotoo 
																	ma'y marami 
																	ang dagdag.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	262 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At saka 
																	madalas 
																	ilala ng 
																	tapang <br/>ay ang 
																	guniguning 
																	takot ng 
																	kalaban; <br/>ang isang 
																	gererong 
																	palaring 
																	magdiwang,
																	<br/>mababalita 
																	na at 
																	pangingilagan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	263 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung sa 
																	katapanga'y 
																	bantog si 
																	Aladin, <br/>may buhay 
																	rin namang 
																	sukat na 
																	makitil; <br/>iyong 
																	matatantong 
																	kasimpantay 
																	mo rin <br/>sa 
																	kasam-ang-palad 
																	at dalang 
																	hilahil.&quot;
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	264 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sagot ni 
																	Florante, 
																	&quot;Huwang ding 
																	maparis <br/>ang gererong 
																	bantog sa 
																	palad kong 
																	amis; <br/>at sa kaaway 
																	ma'y di ko 
																	ninanais <br/>ang laki ng 
																	dusang aking 
																	napagsapit.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	265<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Natanto ni 
																	ama ang 
																	gayong 
																	sakuna- <br/>sa Krotonang 
																	Baya'y may 
																	balang 
																	sumira, <br/>ako'y 
																	isinama't 
																	humarap na 
																	bigla <br/>sa Haring 
																	Linceong may 
																	gayak nang 
																	digma. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	266<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kami ay 
																	bago pang 
																	nanakyat sa 
																	hagdan <br/>ng palasyong 
																	batbat ng 
																	hiyas at 
																	yaman <br/>ay 
																	sumasalubong 
																	na ang 
																	haring 
																	marangal,
																	<br/>niyakap si 
																	ama't noo'y 
																	kinamayan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	267<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang wika'y 
																	'O Duke, ang 
																	kiyas na ito
																	<br/>ang siyang 
																	kamukha ng 
																	bunying 
																	gerero; <br/>aking 
																	napangarap 
																	na sabi sa 
																	iyo, <br/>magiging 
																	haligi ng 
																	setro ko't 
																	reyno. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	268<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sino ito't 
																	saan 
																	nanggaling 
																	na syudad'
																	<br/>ang sagot ni 
																	ama...'ay 
																	bugtong kong 
																	anak <br/>na 
																	inihahandog 
																	sa mahal 
																	mong yapak,
																	<br/>ibilang sa 
																	isang 
																	basalyo't 
																	alagad.' <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	269<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Namangha 
																	ang hari at 
																	niyakap ako,
																	<br/>'Mabuting 
																	panahon 
																	itong 
																	pagdating 
																	mo; <br/>ikaw ang 
																	heneral ng 
																	hukbong 
																	dadalo <br/>sa Bayang 
																	Krotonang 
																	kinubkob ng 
																	Moro. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	270<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Patotohanan 
																	mong hindi 
																	iba't ikaw
																	<br/>ang 
																	napangarap 
																	kong 
																	gererong 
																	matapang <br/>na 
																	maglalathala 
																	sa 
																	sansinukuban
																	<br/>ng kapurihan 
																	ko at 
																	kapangyarihan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	271<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Iyong 
																	kautangan 
																	paroong 
																	mag-adya <br/>nuno mo ang 
																	hari sa 
																	Bayang 
																	Krotona; <br/>dugo kang 
																	mataas ay 
																	dapat kumita
																	<br/>ng sariling 
																	dangal at 
																	bunyi ng 
																	gyera.' <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	272 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sapagkat 
																	matuwid ang 
																	sa haring 
																	saysay, <br/>umayon si 
																	ama, kahit 
																	mapait man,
																	<br/>na agad 
																	masubo sa 
																	pagpapatayan
																	<br/>ang kabataan 
																	ko't di 
																	kabihasaan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	273 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ako'y 
																	walang sagot 
																	na 
																	naipahayag
																	<br/>kundi Haring 
																	poo't 
																	nagdapa sa 
																	yapak; <br/>nang aking 
																	hahagkan ang 
																	mahal na 
																	bakas, <br/>kusang 
																	itinindig at 
																	muling 
																	niyakap. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	274 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nag-upuan 
																	kami't saka 
																	nagpanayam
																	<br/>ng 
																	balabalaki't 
																	may halagang 
																	bagay, <br/>nang 
																	sasalitin ko 
																	ang 
																	pinagdaanan
																	<br/>sa Bayang 
																	Atenas na 
																	pinanggalingan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	275<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Siyang 
																	pamimitak at 
																	kusang 
																	nagsabog <br/>ng ningning 
																	ang talang 
																	kaagaw ni 
																	Venus-- <br/>Anaki ay 
																	bagong 
																	umahon sa 
																	bubog, <br/>buhok ay 
																	naglugay sa 
																	perlas na 
																	batok. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	276<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Tuwang 
																	pangalawa 
																	kung hindi 
																	man langit
																	<br/>ang 
																	itinatapon 
																	ng mahinhing 
																	titig; <br/>O, ang 
																	luwalhating 
																	buko ng 
																	ninibig <br/>pain ni 
																	Cupidong 
																	walang 
																	makarakip.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	277<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Liwanag ng 
																	mukha'y 
																	walang 
																	pinag-ibhan
																	<br/>kay Pebo 
																	kung anyong 
																	bagong 
																	sumisilang;
																	<br/>katawang 
																	butihin ay 
																	timbang na 
																	timbang <br/>at mistulang 
																	ayon sa 
																	hinhin ng 
																	asal. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	278<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	kaligayaha'y 
																	ang 
																	nakakaayos--
																	<br/>bulaklak na 
																	bagong 
																	winahi ng 
																	hamog; <br/>anupa't 
																	sinumang 
																	palaring 
																	manood, <br/>patay o 
																	himala kung 
																	hindi 
																	umirog. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	279<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ito ay si 
																	Laurang 
																	ikinasisira
																	<br/>ang 
																	pag-iisip ko 
																	tuwing 
																	magunita,
																	<br/>at dahil sa 
																	tanang 
																	himutok at 
																	luha-- <br/>itinotono ko 
																	sa 
																	pagsasalita.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	280<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anak ni 
																	Linceong 
																	Haring 
																	napahamak,
																	<br/>at 
																	kinabukasan 
																	ng aking 
																	pagliyag;
																	<br/>Bakit 
																	itinulot, 
																	Langit na 
																	mataas...
																	<br/>na mapanood 
																	ko kung di 
																	ako dapat!
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	281<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;O Haring Linceo, kung 
																	di mo 
																	pinilit <br/>na sa 
																	salitaan 
																	nati'y 
																	makipanig,
																	<br/>ang buhay ko 
																	disi'y hindi 
																	nagkasakit
																	<br/>ngayong 
																	pagliluhan 
																	ng anak mong 
																	ibig! <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	282 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hindi 
																	katoto ko't 
																	si Laura'y 
																	di taksil,
																	<br/>aywan ko 
																	kung ano't 
																	lumimot sa 
																	akin! <br/>ang palad 
																	ko'y siyang 
																	alipusta't 
																	linsil, <br/>di laang 
																	magtamo ng 
																	tuwa sa 
																	giliw. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	283 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Makakapit 
																	kaya ang 
																	gawang 
																	magsukab <br/>sa 
																	pinakayaman 
																	ng langit sa 
																	dilag? <br/>kagandaha'y 
																	bakit di 
																	makapagkalag
																	<br/>ng 
																	pagkakapatid 
																	sa maglilong 
																	lakad? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	284 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung nalalagay 
																	ka, ang 
																	mamatuwirin,
																	<br/>sa laot ng 
																	madlang 
																	sukat 
																	ipagtaksil,
																	<br/>dili ang 
																	dangal mong 
																	dapat na 
																	lingapin,
																	<br/>mahigit sa 
																	walang 
																	kagandaha't 
																	ningning?<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	285<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ito ay hamak pa 
																	bagang 
																	sumansala
																	<br/>ng karupukan 
																	mo at gawing 
																	masama, <br/>kung ano ang 
																	taas ng 
																	pagkadakila,
																	<br/>siya ring 
																	lagapak 
																	naman kung 
																	marapa. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	286<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;O bunying 
																	gererong 
																	naawa sa 
																	akin, <br/>pagsilang na 
																	iyong 
																	nabagong 
																	bituin, <br/>sa pagkakita 
																	ko'y sabay 
																	ang 
																	paggiliw,
																	<br/>inagaw ang 
																	pusong sa 
																	ina ko'y 
																	hain. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	287<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Anupa't ang 
																	luhang sa 
																	mata'y 
																	nanagos <br/>nang 
																	pagkaulila 
																	sa ina kong 
																	irog, <br/>natungkol sa 
																	sinta't 
																	puso'y 
																	nangilabot,
																	<br/>baka di 
																	marapat sa 
																	gayong 
																	alindog. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	288<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hindi ko 
																	makita ang 
																	patas na 
																	wika <br/>sa kaguluhan 
																	ko't 
																	pagkawalang-diwa,
																	<br/>nang 
																	makiumpok 
																	na'y ang 
																	aking 
																	salita, <br/>anhin mang 
																	tuwiran ay 
																	nagkakalisya.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	289<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nang 
																	malutas 
																	yaong 
																	pagsasalitaan
																	<br/>ay wala na 
																	akong 
																	kamaharlikahan;
																	<br/>kaluluwa'y 
																	gulo't 
																	puso'y 
																	nadadarang
																	<br/>sa ningas ng 
																	sintang bago 
																	kong 
																	natikman.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	290<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Tatlong 
																	araw noong 
																	piniging ng 
																	hari <br/>sa palasyo 
																	real na sa 
																	yama't bunyi
																	<br/>ay di 
																	nakausap ang 
																	punong 
																	pighati <br/>na 
																	inaasahang 
																	iluluwalhati.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	291<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dito ko 
																	natikman ang 
																	lalong 
																	hinagpis,
																	<br/>higit sa 
																	dalitang 
																	naunang 
																	tiniis; <br/>at binulaan 
																	ko ang lahat 
																	ng sakit <br/>kung sa 
																	kahirapan 
																	mula sa 
																	pag-ibig.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	292 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Salamat at 
																	noong sa 
																	kinabukasan,
																	<br/>hukbo ko'y 
																	lalakad sa 
																	Krotonang 
																	Bayan, <br/>sandaling 
																	pinalad na 
																	nakapanayam
																	<br/>ang 
																	prinsesang 
																	bumihag 
																	niring 
																	katauhan.
																	<br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	293 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ipinahayag 
																	ko ng wikang 
																	mairog, <br/>ng 
																	buntunghininga, 
																	luha at 
																	himutok, <br/>ang 
																	matinding 
																	sintang 
																	ikinalulunod
																	<br/>magpahanggang 
																	ngayon ng 
																	buhay kong 
																	kapos. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	294 <br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang pusong 
																	matibay ng 
																	himalang 
																	dikit, <br/>nahambal sa 
																	aking 
																	malumbay na 
																	hibik; <br/>dangan ang 
																	kaniyang 
																	katutubong 
																	bait <br/>ay humadlang 
																	disin sinta 
																	ko'y 
																	nabihis. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	295<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nguni't 
																	kung oo'y di 
																	man 
																	binitiwan,
																	<br/>naliwanagan 
																	din sintang 
																	nadirimlan;
																	<br/>at sa 
																	pagpanaw ko 
																	ay 
																	pinabaunan
																	<br/>ng may 
																	hiyang 
																	perlas na sa 
																	mata'y 
																	nukal. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	296<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dumating 
																	ang bukas ng 
																	aking 
																	pag-alis,
																	<br/>sino ang 
																	sasayod ng 
																	bumugsong 
																	sakit? <br/>dini sa puso 
																	ko'y alin 
																	ang hinagpis
																	<br/>na hindi 
																	nagtimo ng 
																	kaniyang 
																	kalis? <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	297<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;May sakit 
																	pa kayang 
																	lalalo ng 
																	tindi <br/>na ang 
																	sumisinta'y 
																	mawalay sa 
																	kasi? <br/>guniguni 
																	lamang di na 
																	ang 
																	mangyari,
																	<br/>sukat 
																	ikalugmok ng 
																	pusong 
																	bayani. <br/><br/><br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	298<br/>
																	</font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;O, nangag-aalay 
																	ng mabangong 
																	suob <br/>sa dakilang 
																	altar ni 
																	kupidong 
																	diyos, <br/>sa dusa ko'y 
																	kayo ang 
																	nakatatarok
																	<br/>noong 
																	maulila sa 
																	Laura kong 
																	irog!&quot;
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