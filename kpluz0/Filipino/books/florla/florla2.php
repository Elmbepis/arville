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
																	Epekto ng 
																	Panibugho 
																	kay Florante</font></p>
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
																	27<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At dito sa 
																	laot ng 
																	dusa't 
																	hinagpis,
																	<br/>malawak na 
																	lubhang 
																	aking 
																	tinawid, <br/>gunita ni 
																	Laura sa 
																	naabang ibig,
																	<br/>siya ko na 
																	lamang 
																	ligaya sa 
																	dibidib. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	28<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Munting 
																	gunamgunam 
																	ng sinta 
																	ko't mutya
																	<br/>nang dahil 
																	sa aki'y 
																	dakila kong 
																	tuwa; <br/>higit na 
																	malaking 
																	hirap at 
																	dalita, <br/>parusa ng 
																	taong lilo't 
																	walang awa.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	29<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	pagkagapos 
																	ko'y kung 
																	gunigunihin,
																	<br/>malamig nang 
																	bangkay 
																	akong 
																	nahihimbing;
																	<br/>na 
																	tinatagisan 
																	ng sula ko't 
																	giliw, <br/>ang 
																	pagkabuhay 
																	ko'y walang 
																	hangga 
																	mandin. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	30<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung 
																	apuhapin ko 
																	sa sariling 
																	isip, <br/>ang suyuan 
																	namin ng 
																	pili kong 
																	ibig; <br/>ang pagluha 
																	niya kung 
																	ako'y may 
																	hapis, <br/>nagiging 
																	ligaya 
																	yaring 
																	madlang 
																	sakit. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	31<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nguni, sa 
																	aba ko! 
																	sawing 
																	kapalaran!
																	<br/>ano pang 
																	halaga ng 
																	gayong 
																	suyuan ...
																	<br/>kung ang 
																	sing-ibig 
																	ko'y sa 
																	katahimikan
																	<br/>ay humuhilig 
																	na sa ibang 
																	kandungan?
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	32 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa 
																	sinapupunan 
																	ni Konde 
																	Adolfo, <br/>aking 
																	natatanaw si 
																	Laurang 
																	sinta ko;
																	<br/>kamataya'y 
																	nahan ang 
																	dating 
																	bangis mo,
																	<br/>nang di ko 
																	damdamin ang 
																	hirap na ito?&quot;
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	33 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dito 
																	hinimatay sa 
																	paghihinagpis,
																	<br/>sumuko ang 
																	puso sa 
																	dahas ng 
																	sakit; <br/>ulo'y 
																	nalungayngay, 
																	luha'y 
																	bumalisbis,
																	<br/>kinagagapusang 
																	kahoy ay 
																	nadilig. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	34 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Magmula sa 
																	yapak 
																	hanggang sa 
																	ulunan, <br/>nalimbag ang 
																	bangis ng 
																	kapighatian;
																	<br/>at ang 
																	panibugho'y 
																	gumamit ng 
																	asal <br/>na lalong 
																	marahas, 
																	lilong 
																	kamatayan.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	35<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Ang kahima't 
																	sinong hindi 
																	maramdamin,
																	<br/>kung ito'y 
																	makita 
																	magmamahabagin;
																	<br/>matipid na 
																	luha ay 
																	paaagusin,
																	<br/>ang 
																	nagparusa 
																	ma'y pilit 
																	hahapisin.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	36<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sukay na ang 
																	tingnan ang 
																	lugaming 
																	anyo <br/>nitong sa 
																	dalita'y 
																	hindi 
																	makakibo,
																	<br/>aakayin 
																	biglang 
																	umiyak ang 
																	puso, <br/>kung wala 
																	nang luhang 
																	sa mata'y 
																	itulo. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	37<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Gaano ang 
																	awang 
																	bubugso sa 
																	dibdib <br/>ng may 
																	karamdamang 
																	maanyong 
																	tumitig, <br/>kung ang 
																	panambita't 
																	daing ay 
																	marinig <br/>nang 
																	mahimasmasan 
																	ang tipon ng 
																	sakit? <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	38<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Halos buong 
																	gubat ay 
																	nasasabugan
																	<br/>ng 
																	dinaing-daing 
																	lubhang 
																	malumbay,
																	<br/>na inuulit 
																	pa at 
																	isinisigaw
																	<br/>sagot sa 
																	malayo 
																	niyong 
																	alingawngaw.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	39<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ay! Laurang 
																	poo'y bakit 
																	isinuyo <br/>sa iba ang 
																	sintang sa 
																	aki'y 
																	pangako; <br/>at 
																	pinagliluhan 
																	ang tapat na 
																	puso, <br/>pinaggugulan 
																	mo ng luhang 
																	tumulo? <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	40<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Di 
																	sinumpaan mo 
																	sa harap ng 
																	Langit <br/>na di 
																	maglililo sa 
																	aking 
																	pag-ibig?
																	<br/>ipinabigay 
																	ko naman 
																	yaring 
																	dibdib, <br/>wala sa 
																	gunita itong 
																	masasapit!
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	41<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Katiwala 
																	ako't ang 
																	iyong 
																	kariktan,
																	<br/>kapilas ng 
																	langit 
																	anaki'y 
																	matibay; <br/>tapat ang 
																	puso mo't di 
																	nagunamgunam
																	<br/>na ang 
																	paglililo'y 
																	nasa 
																	kagandahan.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	42 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hindi ko 
																	akalaing 
																	iyong 
																	sasayangin
																	<br/>maraming 
																	luha mong 
																	ginugol sa 
																	akin; <br/>taguring 
																	madalas na 
																	ako ang 
																	giliw, <br/>mukha ko ang 
																	lunas sa 
																	madlang 
																	hilahil. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	43 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Di kung 
																	ako'y 
																	utusang 
																	manggubat
																	<br/>ng hari mong 
																	ama sa 
																	alinmang 
																	Ciudad, <br/>kung 
																	ginagawa mo 
																	ang aking 
																	sagisag, <br/>dalawa mong 
																	mata'y 
																	nanalong ng 
																	perlas? <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	44 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang aking 
																	plumahe kung 
																	itinatahi
																	<br/>ang parang 
																	korales na 
																	iyong daliri,
																	<br/>buntunghininga 
																	mo'y 
																	nakikiugali
																	<br/>sa kilos ng 
																	gintong 
																	ipinananahi.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	45<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Makailan 
																	Laurang sa 
																	aki'y iabot,
																	<br/>basa pa ng 
																	luha bandang 
																	isusuot; <br/>ibinibigay 
																	mo ay 
																	naghihimutok,
																	<br/>takot 
																	masugatan sa 
																	pakikihamok.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	46<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Baluti't 
																	koleto'y di 
																	mo 
																	papayagang
																	<br/>madampi't 
																	malapat sa 
																	aking 
																	katawan, <br/>kundi 
																	tingnan 
																	muna't baka 
																	may kalawang
																	<br/>ay 
																	nanganganib 
																	kang damit 
																	ko'y 
																	marumhan.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	47<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sinisiyasat 
																	mo ang tibay 
																	at kintab
																	<br/>na kung 
																	sayaran man 
																	ng taga'y 
																	dumulas; <br/>at kung 
																	malayo mang 
																	iyong 
																	minamalas,
																	<br/>sa gitna ng 
																	hukbo'y 
																	makilala 
																	agad. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	48<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Pahihiyasan 
																	mo ang aking 
																	turbante <br/>ng perlas, 
																	topasyo't 
																	maningning 
																	na rubi; <br/>bukod ang 
																	magalaw na 
																	batong 
																	d'yamante,
																	<br/>puno ng 
																	ngalan mong 
																	isang 
																	letrang L.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	49<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hanggang 
																	ako'y wala't 
																	nakikipaghamok,
																	<br/>nag-aapuhap 
																	ka ng 
																	pang-aliw-loob;
																	<br/>manalo man 
																	ako'y kung 
																	bagong 
																	nanasok, <br/>nakikita mo 
																	na'y may 
																	dala pang 
																	takot. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	50<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Buong 
																	panganib 
																	mo'y baka 
																	nagkasugat,
																	<br/>di 
																	maniniwala 
																	kung di 
																	masiyasat;
																	<br/>at kung 
																	magkagurlis 
																	nang munti 
																	sa balat,
																	<br/>hinuhugasan 
																	mo ng luhang 
																	nanatak. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	51<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Kung ako'y 
																	mayroong 
																	kahapisang 
																	munti, <br/>tatanungin 
																	mo na kung 
																	ano ang 
																	sanhi; <br/>hanggang di 
																	malining ay 
																	idinarampi
																	<br/>sa mga mukha 
																	ko ang rubi 
																	mong labi.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	52 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Hindi ka 
																	tutugot kung 
																	di 
																	matalastas,
																	<br/>kakapitan mo 
																	nang 
																	mabigyan ng 
																	lunas; <br/>dadalhin sa 
																	hardi't doon 
																	ihahanap <br/>ng ikaaaliw 
																	sa mga 
																	bulaklak.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	53 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Iyong 
																	pipitasin 
																	ang lalong 
																	marikit, <br/>dini sa liig 
																	ko'y kusang 
																	isasabit;
																	<br/>tuhog na 
																	bulaklak 
																	sadyang 
																	salit-salit,
																	<br/>pag-uupandin 
																	mong lumbay 
																	ko'y 
																	mapaknit.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	54 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At kung ang 
																	hapis ko'y 
																	hindi 
																	masawata,
																	<br/>sa pilikmata 
																	mo'y dadaloy 
																	ang luha;
																	<br/>napasaan 
																	ngayon ang 
																	gayong 
																	aruga, <br/>sa dala kong 
																	sakit ay di 
																	iapula? <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	55<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Halina, 
																	Laura ko't 
																	aking 
																	kailangan
																	<br/>ngayon, ang 
																	lingap mo 
																	nang naunang 
																	araw; <br/>ngayon 
																	hinihingi 
																	ang iyong 
																	pagdamay--
																	<br/>ang abang 
																	sinta mo'y 
																	nasa 
																	kamatayan.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	56<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;At ngayong 
																	malaki ang 
																	aking dalita
																	<br/>ay di 
																	humahanap ng 
																	maraming 
																	luha; <br/>sukat ang 
																	kapatak na 
																	makaapula,
																	<br/>kung sa may 
																	pagsintang 
																	puso mo'y 
																	magmula. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	57<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Katawan ko 
																	ngayo'y 
																	siyasatin, 
																	ibig, <br/>tingnan ang 
																	sugat kong 
																	di gawa ng 
																	kalis; <br/>hugasan ang 
																	dugong 
																	nanalong sa 
																	gitgit <br/>sa kamay ko, 
																	paa't 
																	natataling 
																	liig. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	58<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Halina, 
																	irog ko't 
																	ang damit 
																	ko'y 
																	tingnan, <br/>ang hindi mo 
																	ibig 
																	dumamping 
																	kalawang:
																	<br/>kalagin ang 
																	lubid at 
																	iyong 
																	bihisan,<br/>matinding 
																	dusa ko'y 
																	nang 
																	gumaan-gaan.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	59<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ang mga 
																	mata mo ay 
																	iyong ititig
																	<br/>dini sa anyo 
																	kong 
																	sadlakan ang 
																	sakit, <br/>upang di 
																	mapigil ang 
																	takbong 
																	mabilis <br/>niring abang 
																	buhay sa 
																	ikapapatid.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	60<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Wala na 
																	Laura't ikaw 
																	na nga 
																	lamang <br/>ang 
																	makalulunas 
																	niring 
																	kahirapan;
																	<br/>damhin ng 
																	kamay mo ang 
																	aking 
																	katawan <br/>at bangkay 
																	man ako'y 
																	muling 
																	mabubuhay!
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	61<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Nguni, sa 
																	aba ko! Ay, 
																	sa laking 
																	hirap! <br/>wala na si 
																	Laurang 
																	laging 
																	tinatawag!
																	<br/>napalayu-layo't 
																	di na 
																	lumiliyag,
																	<br/>ipinagkanulo 
																	ang sinta 
																	kong tapat.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	62 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Sa abang 
																	kandunga'y 
																	ipinagbiyaya
																	<br/>ang pusong 
																	akin na at 
																	ako'y 
																	dinaya; <br/>buong 
																	pag-ibig 
																	ko'y 
																	ipinanganyaya,
																	<br/>nilimot ang 
																	sinta'y 
																	sinayang ang 
																	luha. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	63 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Alin pa ang 
																	hirap na di 
																	sa akin <br/>may 
																	kamatayan 
																	pang di ko 
																	daramdamin?
																	<br/>ulila sa 
																	ama't inang 
																	nag-angkin,
																	<br/>walang 
																	kaibiga't 
																	nilimot ng 
																	giliw. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	64 <br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Dusa sa 
																	puri kong 
																	kusang 
																	siniphayo,
																	<br/>palasong may 
																	lasong 
																	natirik sa 
																	puso; <br/>habag sa ama 
																	ko'y tunod 
																	na tumimo,
																	<br/>ako'y 
																	sinusunog 
																	niring 
																	panibugho.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	65<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;Ito'y 
																	siyang una 
																	sa lahat ng 
																	hirap, <br/>pagdaya ni 
																	Laura ang 
																	kumakamandag;
																	<br/>dini sa 
																	buhay ko'y 
																	siyang 
																	magsasadlak
																	<br/>sa libingang 
																	laan ng 
																	masamang 
																	palad. <br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	66<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>&quot;O, Konde 
																	Adolfo, 
																	inilapat mo 
																	man <br/>sa akin ang 
																	hirap ng 
																	sansinubukan,
																	<br/>ang 
																	kabangisan 
																	mo'y 
																	pinasasalamatan,
																	<br/>ang puso ni 
																	Laura'y kung 
																	di inagaw.&quot;
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	67<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Dito 
																	naghimutok 
																	nang 
																	kasindak-sindak
																	<br/>na 
																	umalingawngaw 
																	sa loob ng 
																	gubat; <br/>tinangay ang 
																	diwa't 
																	karamdamang 
																	hawak <br/>ng 
																	buntunghininga't 
																	luhang 
																	lumagaslas.
																	<br/><br/><br/></font>
																	<font face="Arial" style="font-size: 14pt; font-weight:700" color="#0000CC">
																	68<br/></font>
																	<font face="Arial" style="font-size: 14pt" color="#333333">
																	<br/>Sa puno ng 
																	kahoy na 
																	napayukayok;
																	<br/>ang liig ay 
																	supil ng 
																	lubid na 
																	gapos; <br/>bangkay na 
																	mistula't 
																	ang kulay ng 
																	burok <br/>ng kanyang 
																	mukha'y 
																	naging 
																	puting 
																	lubos.</font></p>
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