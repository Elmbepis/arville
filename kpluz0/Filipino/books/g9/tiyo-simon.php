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
<title>Ibong Adarna - Filipino sa KPluz.com</title>
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
										<font face="Arial" size="6" color="#990000">
										Tiyo Simon<br>
										</font>
										<font face="Arial" size="5" color="#990000">
										ni: N.P.S Toribio</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 16pt" color="#0000CC">
											<span style="font-weight: 700">Mga 
											Tauhan:</span></font><font face="Arial" style="font-size: 15pt" color="#333333"><br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											- isang taong nasa katanghalian ang 
											gulang, may kapansanan ang isang paa 
											at may mga paniniwala na hindi 
											maunawaan ng kanyang hipag na 
											relihiyosa.<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											- Ina ni Boy<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											- pamangkin ni Tiyo Simon; 
											pipituhing taong gulang.<br>
											<br>
											</font>
											<span style="font-weight: 700">
											<font face="Arial" style="font-size: 16pt" color="#0000CC">
											Oras:</font></span><font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											Umaga, halos hindi pa sumusikat ang 
											araw<br>
											<br>
											</font>
											<span style="font-weight: 700">
											<font face="Arial" style="font-size: 16pt" color="#0000CC">
											Tagpo:</font></span><font face="Arial" style="font-size: 15pt" color="#333333"><br>
											Sa loob ng silid ni Boy. Makikita 
											ang isang tokador na kInapapatungan 
											ng mga langis at pomada sa buhok, 
											toniko, suklay, at iba pang gamit sa 
											pag-aayos. Sa itaas ng tokador, 
											nakadikit sa dingding ang isang 
											malaking larawan ng birheng 
											nakalabas ang puso at may tarak ng 
											isang punyal. Sa tabi ng nakabukas 
											na bintana sa gawing kanan ay ang 
											katreng higaan ng bata. Sa kabuuan, 
											ang silid ay larawan ng kariwasaan.<br>
											<br>
											Sa pagtaas ng tabing, maikikita si 
											Boy na binibihisan ng kanyang Ina. 
											Nakabakas sa mukha ng bata ang 
											pagkainip samanatalang sinusuklay 
											ang kanyang buhok. (Biglang uunat 
											ang babae, saglit na sisipatin ang 
											ayos ng anak, saka ngingiti.)</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											O, hayan, di nagmukha kang tao. Siya, 
											diyan ka muna at ako naman ang 
											magbibihis.<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Dadabog) sabi ko, ayaw kong 
											magsimba, e!<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Ina:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Ayaw mong magsimba! Hindi maa...pagagalitin 
											mo na naman ako, e! At anong gagawin 
											mo rito sa bahay ngayong umagang ito 
											na pangiling-araw?<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Maiiwan po ako rito sa bahay, kasama 
											ko si ...Tiyo Simon...<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Mapapamulagat) A, ang ateistang 
											iyon. Ang...patawarin ako ng Diyos.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Boy:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Basta. Maiiwan po ako... (Ipapadyak 
											ang paa) makikipagkuwentuhan na 
											lamang ako kay Tiyo Simon...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Ina:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Sa malakas na tinig) 
											makikipagkuwentuhan ka? At anong 
											kuwento? Tungkol sa kalapastanganan 
											sa banal na pangalan ng Panginoon?</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Boy:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Hindi, Mama. Maganda ang 
											ikinukuwento ni Tiyo Simon sa 
											akin...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											A, husto ka na...husto na bago ako 
											magalit nang totohanan at humarap sa 
											Panginoon ngayong araw na ito nang 
											may dumi sa kalooban.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Pero...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Husto na sabi, e!<br>
											<br>
											<br>
											(Matitigil sa pagsagot si Boy. 
											Makaririnig sila ng mga yabag na 
											hindi pantay, palapit sa nakapinid 
											na pinto sa silid, saglit na titigil 
											ang yabag; pagkuwa'y makaririnig 
											sila ng mahInang pagkatok sa pinto.)<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Paungol) uh... sino 'yan?</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Marahan ang tinig) Ako, hipag, 
											naulinigan kong...<br>
											<br>
											(Padabog na tutunguhin ng babae ang 
											pinto at bubuksan iyon. Mahahantad 
											ang kaanyuan ni Tiyo Simon, 
											nakangiti ito.)<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Maaari bang pumasok? Naulinigan kong 
											tila may itinututol si Boy...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Lalapit) Ayaw kong magsimba, Tiyo 
											Simon. Maiiwan ako sa iyo rito. 
											Hindi ako sasama kay Mama.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Ina:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Paismid) Iyan ang itinututol ng 
											pamangkin mo, kuya. Hindi nga raw 
											sasama sa simbahan...<br>
											<br>
											(Maiiling si Tiyo Simon, ngingiti at 
											paika-ikang papasok sa loob, 
											hahawakan ang balikat ni Boy.)<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Kailangan ka nga namang sumama sa 
											simbahan, Boy. Kung gusto mo...kung 
											gusto mong isama ako ay maghintay 
											kayo at ako'y magbibihis...magsisimba 
											tayo.<br>
											<br>
											(Mapapatingin nang maluwat si Boy sa 
											kanyang Tiyo Simon, ngunit hindi 
											makakibo. Ang Ina ay namangha rin. 
											Tatalikod<br>
											na si Tiyo Simon at lalabas. 
											Maiiwang natitigilan ang dalawa, 
											pagkuwa'y babaling ang Ina kay Boy.)<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Nakapagtataka! Ano kaya ang nakain 
											ng amain mong iyon at naisipang 
											sumama ngayon sa atin? Ngayon ko 
											lamang siya makikitang lalapit sa 
											Diyos...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Kung sasama po si Tiyo Simon , 
											sasama rin ako...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Hayun! Kaya lamang sasama ay kung 
											sasama ang iyong amain. At kung 
											hindi ay hindi ka rin sasama. Pero 
											mabuti rin iyon...mabuti, sapagkat 
											hindi lamang ikaw ang maaakay ko sa 
											wastong landas kundi ang kapatid na 
											iyon ng iyong ama na isa ring...<br>
											(Mapapayuko ang babae, papahirin ang 
											luhang sumungaw sa mga mata. 
											Magmamalas lamang siBoy.)</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Mahina at waring sa sarili lamang). 
											namatay siyang hindi lamang 
											nakapagpa-Hesus. Kasi'y matigas ang 
											kalooban niya sa pagtalikod sa 
											simbahan. Pareho silang magkapatid 
											sila ng iyong amain. Sana'y 
											magbalik-loob siya sa Diyos upang 
											makatulong siya sa pagliligtas sa 
											kaluluwa ng kanyang kapatid na 
											sumakabilang buhay na...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											(Mananatiling nagmamasid lamang si 
											Boy. Pagkuwa'y nakarinig sila ng 
											hindi pantay na yabag, at ilang 
											sandali pa ay sumungaw na ang mukha 
											ni Tiyo Simon sa pinto. Biglang 
											papahirin ng babae ang kanyang mukha, 
											pasasayahin ito, at saka tutunguhin 
											ang pinto.)</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Siyanga pala. Magbibihis din ako. 
											Nakalimutan ko, kasi'y...diyan muna 
											kayo ni Boy, kuya...<br>
											(Lalabas ang babae at si Tiyo Simon 
											ay papasok sa loob ng silid. Agad 
											tutunguhin ang isang sopang naroroon, 
											pabuntung-hiningang uupo. Agad, 
											naman siyang lalapitan ni Boy at ang 
											bata ay titindig sa harapan niya.)</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Tiyo Simon:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Maghihikab) iba na ang tumatandang 
											talaga. Madaling mangawit, mahina 
											ang katawan at...(biglang matitigil 
											nang mapansing ang tinitingnan ng 
											bata ay ang kanyang may kapansanang 
											paa. Matatawa.)</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font><b>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											Boy:</font></b><font face="Arial" style="font-size: 15pt" color="#333333"><b>
											</b>Bakit napilay po kayo, Tiyo 
											Simon? Totoo ba'ng sabi ni Mama na 
											iya'y parusa ng Diyos?...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Matatawa) sinabi ba ng Mama mo iyon?</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Oo raw e, hindi kayo nagsisimba. 
											Hindi raw kasi kayo naniniwala sa 
											Diyos. Hindi raw kasi...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Mapapabuntong-hininga) hindi totoo, 
											Boy, na hindi ako naniniwala sa 
											Diyos...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Pero 'yon ang sabi ni Mama, Tiyo 
											Simon. Hindi raw kayo nangingilin 
											kung araw ng pangilin. Bakit hindi 
											kayo nangingilin, Tiyo Simon?</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Tiyo Simon:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											May mga bagay, Boy na hindi 
											maipaliwanag. May mga bagay na hindi 
											maipaaalam sa iba sa pamamagitan ng 
											salita. Ang mga bagay na ito ay 
											malalaman lamang sa sariling 
											karanasan sa sariling pagkamulat...ngunit 
											kung anuman itong mga bagay na ito, 
											Boy, ay isa ang tiyak: malaki ang 
											pananalig ko kay Bathala.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Kaya ka sasama sa amin ngayon, Tiyo 
											Simon?...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Tiyo Simon:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Oo, Boy. Sa akin, ang simbahan ay 
											hindi masamang bagay. Kaya huwag 
											mong tatanggihan ang pagsama sa iyo 
											ng iyong Mama. Hindi makabubuti sa 
											iyo ang pagtanggi, ang pagkawala ng 
											pananalig. Nangyari na sa akin iyon 
											at hindi ako naging maligaya.<br>
											<br>
											(Titigil si Tiyo Simon sa 
											pagsasalita na waring biglang 
											palulungkutin ng mga alaala. Buhat 
											sa malayo ay biglang aabot ang 
											alingawngaw ng tinutugtog na 
											kamapana. Magtatagal nang ilang 
											sandali pagkuwa'y titigil ang 
											pagtugtog ng batingaw. Magbubuntung 
											hininga si Tiyo Simon, titingnan ang 
											kanyang may kapansanang paa, tatawa 
											nang mahina at saka titingin kay 
											Boy).<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Dahil sa kapansanang ito ng aking 
											paa, Boy, natutuhan kong tumalikod, 
											hindi lamang sa simbahan, kundi sa 
											Diyos. Nabasa ko ang The Human 
											Bondage ni Maugham at ako'y nanalig 
											sa pilosopiyang pInanaligan ng 
											kanyang tauhan doon, ngunit hindi 
											ako naging maligaya, Boy, hindi ako 
											nakaramdam ng kasiyahan.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Ano ang nangyari, Tiyo Simon?...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Tiyo Simon:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Lalo akong naging bugnutin, 
											magagalitin. Dahil doon, walang 
											natuwang tao sa akin, nawalan ako ng 
											mga kaibigan, hanggang sa mapag-isa 
											ako...hanggang isang araw ay 
											nangyari sa akin ang isang sakunang 
											nagpamulat sa aking paningin.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Ano iyon, Tiyo Simon...?<br>
											<br>
											(Uunat sa pagkakaupo si Tiyo Simon 
											at dudukot sa kanyang lukbutan. 
											Maglalabas ng isang bagay na 
											makikilala na isang sirang manikang 
											maliit.)<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Ito ay isang manika ng batang 
											nasagasaan ng trak. Patawid siya 
											noon at sa kanyang pagtakbo ay 
											nailaglag niya ito. Binalikan niya 
											ito ngunit siyang pagdaan ng trak at 
											siya'y nasagasaaan...nasagasaan siya. 
											Nadurog ang kanyang binti, namatay 
											ang bata...namatay nakita ko, ng 
											dalawang mata, ako noo'y naglalakad 
											sa malapit...at aking nilapitan, ako 
											ang unang lumapit kaya nakuha ko ang 
											manikang ito at noo'y tangang 
											mahigpit ng namatay na bata, na 
											waring ayaw bitiwan kahit sa 
											kamatayan...</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Boy:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Nakamulagat) Ano pa'ng nangyari 
											Tiyo Simon?</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Tiyo Simon:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Kinuha ko nga ang manika, Boy. At 
											noon naganap ang pagbabago sa aking 
											sarili...sapagkat nang yumuko ako 
											upang damputin ang manika ay nakita 
											ko ang isang tahimik at 
											nagtitiwalang ngiti sa bibig ng 
											patay na bata sa kabila ng 
											pagkadurog ng Kanyang buto...ngiting 
											tila ba nananalig na siya ay walang 
											kamatayan...<br>
											<br>
											(Magbubuntunghinga si Tiyo Simon 
											samantalang patuloy na nakikinig 
											lamang si Boy. Muling maririnig ang 
											batingaw sa malayo. Higit na malakas 
											at madalas, mananatili nang higit na 
											mahabang sandali sa pagtunog, 
											pagkuwa'y titigil. Muling 
											magbubuntunghinga si Tiyo Simon.)<br>
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt" color="#990000">
											<b>Tiyo Simon:</b></font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Mula noon, ako'y nag-isip na, Boy. 
											Hindi ko na makalimutan ang 
											pangyayaring iyon. Inuwi ko ang 
											manika at iningatan, hindi 
											inihiwalay sa aking katawan, bilang 
											tagapagpaalalang lagi sa akin ng 
											matibay at mataos na pananalig ng 
											isang batang hanggang sa oras ng 
											kamatayan ay nakangiti pa. At aking 
											tinandaan sa isip: kailangan ng 
											isang tao ang pananalig kay Bathala, 
											kung may panimbulanan siya sa mga 
											sandali ng kalungkutan, ng sakuna, 
											ng mga kasawian...upang may 
											makapitan siya kung siya'y iginugupo 
											na ng mga hinanakit sa buhay.<br>
											(Mahabang katahimikan ang maghahari. 
											Pagkuwa'y maririnig ang matuling 
											yabag na papalapit. Sumungaw ang 
											mukha ng Ina ni Boy sa pinto.)</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Ina:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											Tayo na, baka wala na tayong datnang 
											misa. Hinahanap ko pa kasi ang aking 
											dasalan kaya ako natagalan. Tayo na, 
											Boy...Kuya</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											<br>
											</font>
											<font face="Arial" style="font-size: 15pt; font-weight: 700" color="#990000">
											Boy:</font><font face="Arial" style="font-size: 15pt" color="#333333"> 
											(Paluksu-luksong tutunguhin ang 
											pinto) Tayo na Mama, kanina pa nga 
											po tugtog nang tugtog ang kampana, 
											e. Tayo na, Tiyo Simon, baka tayo 
											mahuli, tayo na!<br>
											<br>
											(Muling maririnig ang tugtog ng 
											kmapana sa malayo. Nagmamadaling 
											lalabas si Boy sa pinto. Lalong 
											magiging madalas ang pagtugtog ng 
											kampana lalong magiging malakas, 
											habang bumababa ang tabing).</font><font face="Arial"><span style="font-size: 15pt"><font color="#333333">&nbsp;
											</font>
											<br>
											&nbsp;&nbsp;
											<br>
											&nbsp;&nbsp;
											<br>
											<br>
											</span>
											<font size="3" color="#333333">
											Source:&nbsp;</font></font><span style="font-size: 11.0pt; line-height: 115%; font-family: Calibri,sans-serif"><a target="_blank" style="color: blue; text-decoration: underline; text-underline: single" href="https://angelfernandezportillo.blogspot.com/2016/07/panitikang-asyano-9.html"><span style="font-size: 12pt; line-height: 115%; font-family: Arial,sans-serif; color: #333333; background: white">https://angelfernandezportillo.blogspot.com/2016/07/panitikang-asyano-9.html</span></a></span></p>
											<p style="margin: 0 80px" align="justify"><font face="Arial"><span style="font-size: 15pt">&nbsp;&nbsp;
											<br>
											&nbsp;&nbsp;
											<br>
											<br>
											&nbsp;</span></font></p>
											<span style="font-size: 15pt">
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