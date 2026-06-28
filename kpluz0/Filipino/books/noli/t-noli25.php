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
<title>Noli Me Tangere - Filipino sa KPluz.com</title>
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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg', /*url*/'../images/backb.jpg')">

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
										<font face="Arial" color="#990000" style="font-size: 24pt">
										Noli Me Tangere</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 18pt" color="#990000">
										ni Dr. Jose Rizal</font></span><font face="Arial" style="font-size: 18pt">
										</font>
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXV. Sa Bahay ng Pilisopo</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Pagkaumaga ng kinabukasan, 
											pagkatapos na madalaw ni Juan 
											Crisostomo Ibarra ang kanyang mga 
											lupa, siya'y tumungo sa bahay ni 
											matandang Tasio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Lubos na lubos ang katahimikan sa 
											halamanan, sapagkat ang mga 
											langay-langayang nangagsasalimbayan 
											sa palibot ng balisbisa'y bahagya na 
											umiingay. Sumisibol ang malilit na 
											damo sa lumang pader na ginagapangan 
											ng kawangis ng baging na bumuborda 
											sa mga bintana, maliit na bahay na 
											anaki'y siyang tahanan ng 
											katahimikan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Maingat na itinali ni Ibarra ang 
											kanyang kabayo sa isang haligi, 
											siya'y lumakad ng halos patiad ng 
											pagdadahandahan at kanyang tinahak 
											ang halamanang malinis at totoong 
											magaling ang alaga; pinanhik ang 
											hagdanan, at siya'y pumasok, 
											sapagkat bukas ang pinto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Ang unang nakita niya'y ang matanda, 
											na nakayukod sa isang libro na tila 
											mandin kanyang sinusulatan. May 
											napanood sa mga pader na tinitipong 
											mga maliliit na mga hayop at mga 
											dahon ng mga kahoy at damo, sa gitna 
											ng mga 'mapa' at lumang estanteng 
											puno ng mga libro at ng mga 
											sulat-kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Lubhang nalilibang ang matanda sa 
											kanyang ginagawa, na ano pa't hindi 
											naino ang pagdating ng binata, kung 
											di ng ito'y aalis na sana, sa 
											pagkaibig na huwag makagambala sa 
											matandang iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Aba! nariyan po ba kayo?--ang 
											itinanong, at tiningnan si Ibarra ng 
											wari'y nanggigilalas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ipagpaumanhin po ninyo,--ang 
											isinagot nito,--kayo po pala'y 
											maraming totoong ginagawa....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Siya nga po, sumusulat ako ng 
											kaunti, datapuwa't hindi dali-dali 
											at ibig kong magpahinga. May 
											magagawa po ba akong ano mang sukat 
											ninyong pakinabangan kahi't 
											babahagya?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Malaki po!--ang isinagot ni Ibarra 
											at saka lumapit;--datapuwa't....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At sinulyap ang librong na sa ibabaw 
											ng mesa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Aba!--ang biglang sinabing 
											nanggigilalas; ginagamit po ba ninyo 
											ang inyong panahon sa pagsisiyasat 
											kung ano ang kahulugan ng mga 
											'geroglifiko?'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi po!--ang isinagot ng matandang 
											lalaki, at tuloy nag-alay sa kanya 
											ng isang 'silla';--hindi nakakawatas 
											ako ng egipcio o ng kopto man 
											lamang, datapuwa't may kaunti akong 
											nalalamang paraan sa pagsulat niyan, 
											kaya ako'y sumulat ng mga 
											'geroglifiko.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sumusulat po kayo ng mga 
											'geroglifiko'? At bakit po?--ang 
											itinanong ng binatang 
											nag-aalinlangan sa nakikita't 
											nariringig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--ng huwag mabasa nino man sa mga 
											panahong ito ang aking sinusulat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tinitigan ni Ibarra ang matandang 
											lalaki, at ang isip niya'y baka 
											nasisira ang isip nito. Madaling 
											madaling siniyasat ang aklat, sa 
											pagka iibig niyang maalaman kung 
											nagsisinungaling, at kanyang 
											namasdang totoong magaling ang doo'y 
											pagkakaguhit ng mga hayop, mga guhit 
											na bilog, mga guhit na anyong 
											pabilog, mga bulaklak, mga paa, mga 
											kamay, mga bisig, at iba pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--At bakit po kayo sumusulat kung 
											talagang aayaw kayong mabasa nino 
											man ang inyong sinusulat?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sapagkat hindi ko iniuukol ang 
											aking sinusulat sa mga taong 
											nabubuhay ngayon; sumusulat ako at 
											ng mabasa ng mga taong ipanganganak 
											pa sa mga panahong sasapit. Kung 
											mababasa ng mga tao ngayon ang aking 
											mga sinusulat ay kanilang susunugin 
											ang aking mga aklat, na siyang 
											pinagkagugulan ko ng pagal ng&nbsp; 
											buong&nbsp; aking buhay; datapuwa't hindi 
											gayon ang gagawin ng mga taong 
											ipanganganak pang makababasa ng 
											aking mga sinusulat ngayon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sapagkat ang mga taong ipanganganak 
											pang iyo'y pawang magiging mga 
											pantas at mauunawa nila ang aking 
											mga adhika at kanilang wiwikain: 
											HINDI NATULUG NA LAHAT SA GABI ng 
											AMING mga NUNO! Ililigtas ng 
											talinghaga o ng mga kakaibang mga 
											letrang ito ang aking gawa, sa 
											kamangmangan ng mga tao, na gaya 
											naman ng pagkaligtas sa maraming mga 
											katotohanan ng talinghaga o ng mga 
											kakaibang mga pagsamba at ng di 
											sirain ng mapangwasak na mga kamay 
											ng mga sacerdote.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--At sa anong wika sumusulat po 
											kayo?--ang itinanong ni Ibarra, 
											pagkatapos ng isang sandaling hindi 
											pag-imik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sa wika natin, sa tagalog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--At nagagamit po ba sa bagay na iyan 
											ang mga 'geroglifiko'?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Kung di lamang sa kahirapan ng 
											magdibujo, nagkakailangan ng panahon 
											at tiyaga, halos masasabi ko sa 
											inyong lalong magaling na gamitin 
											ang mga 'geroglifiko sa pagsulat ng 
											ating wika kay sa 'alfabeto latino'. 
											Taglay ang mga 'vokal' ng dating 'alfabeto 
											egipcio'; ang ating o na pangwakas 
											na vokal na na sa kalagitnaan ng o 
											at ng u; wala rin sa egipciong tunay 
											na tunog ang E; na sa 'alfabeto 
											egipcio' ang ating&nbsp;<span class="smcap">ha</span>&nbsp;at 
											ang ating&nbsp;<span class="smcap">kha</span>&nbsp;na 
											wala sa 'alfabetong latin' ayon sa 
											paggamit natin sa kastila. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sa halimbawa; sa sabing&nbsp;<span class="smcap">mukha</span>,--ang 
											idinugtong na itinuro ang libro--lalong 
											nababagay na aking isulat ang 
											silabang&nbsp;<span class="smcap">ha</span>&nbsp;sa 
											pamamag-itan nitong anyong isda kay 
											sa letrang latina na ipinangungusap 
											sa Europa sa pamamag-itan ng iba't 
											ibang paraan. Sa isang pangungusap 
											na hindi totoong ipinahahalata ang 
											letrang ito, gaya sa halimbawa dito 
											sa sabing&nbsp;<span class="smcap">hain</span>, 
											na dito'y hindi totooog mariin ang 
											pangungusap ng&nbsp;<span class="smcap">h</span>, 
											ang ginagamit ko'y itong 'busto' ng 
											leo o itong tatlong bulaklak ng&nbsp;<span class="smcap">loto</span>, 
											ayon sa bilang ng 'vokal.' </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Hindi lamang ito, nagagawa ko rito ang 
											pagsulat ng tinig na sa ilong 
											lumalabas, letrang wala sa 'alfabeto 
											latinong' kinastila. Inuulit kong 
											kung hindi nga lamang sa kahirapan 
											ng pagdidibujo na kinakailangang 
											pakabutihin, halos magagamit nga ang 
											mga 'geroglifiko;' datapowa't ang 
											kahirapang ding ito ang siyang 
											pumimipilit sa aking huwag magsalita 
											ng malawig at huwag magsaysay kung 
											di iyong katatagan at kinakailangan 
											lamang: bukod sa rito'y sinasamahan 
											ako ng pinagpapagalan kong ito, 
											pagka umaalis ang aking mga 
											panauhing taga Tsina at taga Japon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ano pong sabi ninyo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi po ba ninyo nariringig? mga 
											langaylangayan ang aking mga 
											panauhin; ng taong ito'y nagkulang 
											ng isa; marahil siya'y hinuli ng 
											sino mang masamang batang insik o 
											japones.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Bakit po nalalaman ninyong sila'y 
											nanggagaling sa mga lupaing iyan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Dahil po sa isang magaang na 
											paraan: may ilang taon na ngayong 
											bago sila umalis ay itinatali ko sa 
											kanilang paa ang isang maliit na 
											papel na may nakasulat na 
											'Filipinas' sa wikang ingles, at 
											inaakala kong hindi totoong malayo 
											ang kanilang pinaroroonan, at 
											sapagkat sinasalita ang wikang ingles 
											halos sa lahat ng panig ng mga 
											dakong ito. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Hindi nagkamit kasagutan 
											ang maliit kong papel sa loob ng 
											mahabang panahon, hanggang sa 
											kawakasa'y ipinasulat ko sa wikang 
											insik, at ang nangyari'y sila'y 
											bumalik ng noviembreng sumunod na 
											may mga dalang ibang mga maliliit na 
											papel, na aking ipinabasa: nakasulat 
											ang isa sa wikang insik, at yao'y 
											isang bati magmula sa mga pampangin 
											ng Hoangho, at ang isa, alisunod sa 
											insik na aking pinagtanungan, yaon 
											daw marahil ay wikang japones. 
											Datapuwa't kayo po'y aking 
											linilibang sa mga bagay na ito, at 
											hindi ko itinatanong sa inyo kung sa 
											paanong bagay makapaglilingkod ako 
											sa inyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Naparito po ako't ibig kong 
											makipag-usap ako sa inyo tungkol sa 
											isang bagay na mahalaga,--ang 
											isinagot ng binata;--kahapon ng 
											hapo'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hinuli po ba ang kulang palad na 
											iyan?--ang isinalabat ng matandang 
											lalaking malaking totoo ang pagka 
											ibig na makaalam.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Si Elias po ba ang inyong sinasabi? 
											Bakin po ninyo naalaman?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Aking nakita ang Musa ng Guwardiya 
											Sibil.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ang Musa ng Guwardiya Sibil! At sino 
											po ba ang Musang iyan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ang asawa ng alperes, na inyong 
											inanyayahan sa inyong pagkakatuwa. 
											Cumalat kahapon sa bayan yaong 
											nangyari sa buwaya. Kung gaano ang 
											katalasan ng isip ng Musa ng 
											Guwardiya Sibil ay gayon din ang 
											katampalasanan ng kanyang budhi, at 
											hininala na marahil ang piloto'y 
											yaong napakapangahas na nag-abaang 
											sa kanyang asawa sa pusaw at 
											bumuntal kay Padre Damaso. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At sapagkat siya ang bumabasa ng mga 
											'parte' (kasulatang nagbibigay alam 
											ng ano mang bagay na nangyayari) na 
											dapat tanggapin ng kanyang asawa, 
											bahagya pa lamang dumarating ito sa 
											kanyang bahay na lango at walang 
											malay, inutusan ang sargento, sampu 
											ng mga soldado, at ng bagabagin ang 
											piyesta, upang makapanghiganti sa 
											inyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Mag-ingat po kayo! Si Eva'y 
											mabait na babae, palibhasa'y 
											nanggaling sa mga kamay ng Diyos ... 
											Masama raw babae si Do&ntilde;a 
											Consolacion, at walang nakakaalam 
											kung kaninong kamay siya nanggaling! 
											Kinakailangang naging 'donkella' o 
											naging ina, minsan man lamang, upang 
											gumaling ang isang babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											ngumiti ng kaunti si Ibarra, saka 
											sumagot, kasabay ang pagkuha sa 
											kanyang kartera ng ilang mga papel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Malimit 
											na nagtatanong po sa inyo ang aking 
											nasirang ama sa ilang mga bagay, at 
											natatandaan kong pawang kasayahan 
											ang kanyang tinamo lamang sa 
											pagsunod sa inyong mga kahatulan. 
											May kasalukuyan akong isang munting 
											gawain ibig kong papagtibayin ang 
											magandang kalalabasan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At sinabi ni Ibarra sa matandang 
											lalaki sa maikling pananalita, ang 
											pinagbabalak na eskuelahang kanyang 
											inihandog sa kanyang pinangingibig, 
											at inilahad sa mga mata ng 
											nagtatakang pilosopo ang mga planong 
											galing Maynila na sa kanya'y 
											ipinadala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ibig ko sanang ihatol po ninyo sa 
											akin kung sinosino sa bayan ang mga 
											taong aking susuyuin, at ng lalong 
											lumabas na magaling ang gawaing ito. 
											Kilala po ninyong totoo ang mga 
											taong nananahan dito; ako'y bagong 
											kararating at halos ako'y isang 
											manunuluyang taga ibang lupain sa 
											aking sariling bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sinisiyasat ni matandang Tasiong sa 
											mga mata'y nanggigilid ang mga luha, 
											ang mga planong na sa kanyang harap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ang 
											inyong ipagpapatuloy na yariin ay 
											ang aking panaginip, ang panaginip 
											ng isang abang sira ang isip!--ang 
											biglang sinabing nababagbag ang 
											loob;--at ngayo'y ang unang ihahatol 
											ko po sa inyo'y ang huwag na muling 
											kayo'y magtanong sa akin magpakailan 
											man!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tiningnan siya ng binatang 
											nanggigilalas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sapagkat ang mga taong matitino'y 
											ipalalagay po kayong sira rin ang 
											pag-iisip,--ang ipinagpatuloy ng 
											pananalitang masaklap na 
											pagpalibhasa.--Inaakala ng taong 
											pawang mga sira ang isip ng sino 
											mang hindi nag-iisip ng wangis na 
											kanila; ito ang dahilan at 
											ipinalalagay nila akong ul-ol, at 
											ang gayo'y kinikilala kong utang na 
											loob, sapagkat ay, sa aba ko! sa 
											araw na ibig nilang ibalik sa aking 
											boo ang sira kong isip; sa araw na 
											iya'y aalsan ako ng kaunting 
											kalayaang aking binili sa halaga ng 
											pagka-ako'y taong may kalolowa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At sino ang nakakaalam kung sila nga 
											ang may katuwiran? Hindi ako nag-iisip 
											at hindi ako nabubuhay alinsunod sa 
											kanilang mga kautusan; pawang mga 
											iba ang aking sinusunod na mga 
											palatuntunan, ang aking mga adhika. 
											Sa ganang kanila'y ang tunay na 
											matino'y ang gobernadorcillo, 
											sapagkat palibhasa'y walang ibang 
											pinagaralan kung di ang magdulot ng 
											tsokolate at magtiis ng kasam-an ng 
											asal ni Padre Damaso, ngayo'y 
											mayaman, liniligalig niya ang mga 
											maliliit na kapalaran ng kanyang mga 
											kababayan at kung magkabihira pa'y 
											nagsasalita ng tungkol sa katuwiran. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											'Matalas ang pag-iisip ng taong iyan' 
											ang inaakala ng mga hangal; 'tingnan 
											ninyo't sa walang ano ma'y 
											nakapagpalaki sa sarili!' Datapuwa't 
											akong nagmana ng kayamanan, mga 
											pagka-alang-alang ng kapwa, ako'y 
											nag-aral, ngayo'y isang mahirap ako, 
											at hindi ako pinagkatiwalaan ng 
											lalong walang kabuluhang tungkulin, 
											at ang sinasabi ng lahat: 'Iya'y 
											isang ul-ol, iya'y hindi nakauunawa 
											kung ano ang pamumuhay!' </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tinatawag 
											ako ng kurang 'pilosopo' ng palibak, 
											na ang ipinahihiwatig ay ako'y isang 
											madaldal na ipinagmamayabang ang mga 
											pinagaralan sa Universidad, gayong 
											siya pa namang lalong walang 
											kabuluhan. Marahil nga nama'y ako 
											ang tunay na baliw at sila ang mga 
											tino, sino ang makapagsasabi?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At pinaspas ng matanda ang kanyang 
											ulo, na anaki ibig niyang palayuin 
											ang isang pag-iisip, at saka 
											nagpatuloy ng pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ang 
											ikalawang maihahatol ko sa inyo'y 
											magtanong po kayo sa kura, sa 
											gobernadorcillo, sa lahat ng mga 
											taong nakakakaya; bibigyan kayo nila 
											ng mga masasama, hangal at walang 
											kabuluhang mga kahatulan; datapuwa't 
											hindi pagtalima ang kahulugan ng 
											pagtatanong, magpakunuwari kayong 
											sinusunod ninyo sila kailan man at 
											mangyayaring gawin ninyo, at inyong 
											ipahayag na iniaalinsunod ninyo sa 
											kanila ang inyong mga gawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Naglininglining ng sandali si Ibarra 
											at nagsalita, pagkatapos:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Magaling ang inyong hatol, nguni't 
											mahirap sundin. Dapuwa't hindi nga 
											kaya maipagpatuloy ko ang aking 
											panukala na hindi tumakip sa 
											panukalang iyan ang isang dilim? 
											Hindi baga kaya magawa ang isang 
											kagalingan kahi't tahakin ang lahat, 
											yamang hindi kailangan ng 
											katotohanang manghiram ng pananamit 
											sa kamalian?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Dahil 
											diya'y wala sino man sumisinta sa 
											katotohanang hubad! Magaling ang 
											bagay na iyan sa salita, mangyayari 
											lamang sa daigdig na pinapanagimpan 
											ng kabataan. Nariyan ang maestro sa 
											eskuela, na walang tumutulong sino 
											man, sangol na pusong nagmithi ng 
											kagalingan ay walang inani kung di 
											libak at mga halakhak; sinabi ninyo 
											sa aking kayo'y taga ibang bayan sa 
											inyong sariling lupain, at 
											naniniwala ako. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Mula sa unang araw 
											ng inyong pagdating dito'y inyong 
											sinaktan ang kalooban ng isang 
											prayleng kabalitaan sa mga taong 
											siya'y isang banal, at ipinalalagay 
											ng kanyang mga kapwa prayleng siya'y 
											isang pantas. Loobin nawa ng Diyos 
											na ang ginawa ninyong ito'y huwag 
											siyang maging kadahilanan ng mga 
											mangyayari sa inyo sa hinaharap na 
											panahon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Huwag po ninyong akalaing 
											dahil sa pinawawal-ang halaga ng mga 
											dominiko at agustino ang ginggong 
											habito, ang kordon at ang salaulang 
											pangyapak, na dahil sa minsang 
											ipinaalaala ng isang dakilang doktor 
											sa Santo Tomas, na ipinasiya ng papa 
											Inokencio III,&nbsp;na lalong nauukol daw 
											sa mga baboy kay sa mga tao ang mga 
											palatuntunan ng mga frankiskano'y 
											hindi sila mangagkakaisa upang 
											papagtibayin yaong sabi ng isang 
											prayleng prokurador.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">'Higit ang 
											ikinapangyayari ng lalong walang 
											kabuluhang uldog kay sa gobyerno, 
											kahi't maging kasama pa nito ang 
											lahat niyang mga soldado 'Cave ne 
											kadas'. Totoong makapangyarihan ang 
											ginto; madalas na inihapay ng guyang 
											vakang ginto ang tunay na Diyos sa 
											kanyang mga altar, at nangyayari ito 
											buhat pa sa panahon ni Moises.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi ako lubhang mapanglawin sa 
											pag-iisip ng mangyayari sa ano mang 
											bagay, at sa ganang akin ay hindi 
											naman napakapanganib ang pamumuhay 
											sa aking lupain,--ang isinagot ni 
											Ibarrang ngumingiti.--Inaakala kong 
											napakalampas naman ang mga takot na 
											iyan, at umaasa akong aking magagawa 
											ang aking mga panukala, na hindi ako 
											makakakita ng malalaking mga hadlang 
											sa dakong iyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi nga, sakali't kayo'y 
											tangkilikin nila; datapuwa't 
											magkakaroon kayo ng mga hadlang kung 
											kayo'y hindi tangkilin. Casukatan na 
											upang madurog na lahat ang inyong 
											mga pagsusumikap sa mga pader ng 
											bahay ng tinatahanan ng kura, ang 
											iwaswas ng prayle ang kanyang kordon 
											o ipagpag kaya niya ang kanyang 
											habito; itatanggi ng alkalde bukas, 
											sa papaano mang dahilan, ang sa 
											inyo'y ipinagkaloob ngayon; hindi 
											itutulot ng sino mang inang pumasok 
											ang kanyang anak sa paaralan, at 
											kung makagayo'y baligtad ang 
											ibubunga ng inyong lahat na mga 
											pagpapagal: makapanghihina ng loob 
											sa mga magpapanukala pagkatapos, na 
											tumikim gumawa ng ano mang bagay na 
											kagalingan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Bagaman 
											sa inyong sabi,--ang tugon ng binata, 
											hindi ako makapaniwala sa 
											kapangyarihang iyang sinabi ninyo, 
											at kahit ipagpalagay ng katotohanan, 
											kahi't paniwalaan tunay nga, 
											matitira rin sa aking pinakalabis 
											ang bayang may pag-iisip, ang 
											gobyernong may maningas na hangad sa 
											pagtatatag ng mga panukalang totoong 
											maiinam, taglay niya ang mga 
											dakilang adhika at talagang ibig nga 
											niya ang ikagagaling ng Filipinas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ang gobyerno! Ang gobyerno!--ang 
											bulong ng pilosopo, at saka 
											tumingala upang tingnan ang 
											bubungan.--Bagaman tunay na magkaroon 
											ng maningas na nasang padakilain ang 
											lupaing ito sa ikagagaling ng mga 
											taga rito rin at ng Inang Bayan; 
											bagaman manakanakang alalahanin ng 
											mangisangisang mga nangangatungkulan 
											ang magagandang kaisipan ng mga 
											haring katoliko, at banggitin kung 
											siya'y napapag-isa, ang gobyerno'y 
											hindi nakakikita, hindi nakaririnig, 
											hindi nagpapasiya, liban na lamang 
											sa ibigin ng kura o provincial na 
											kanyang makita, mapakinggan at 
											mapasiyahan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Lubos ang 
											pagsampalatayang kaya lamang siya 
											matibay ay dahil sa kanila; na kung 
											siya'y nananatili'y sapagkat 
											siya'y inaalalayan nila; kung siya'y 
											nabubuhay, sapagkat 
											ipinahihintulot nilang siya'y 
											mabuhay, at sa araw na iwan siya ng 
											mga prayle'y siya'y matutumbang gaya 
											ng pagkatumba ng isang taotaohan 
											pagka wala ng sa kanya'y 
											pang-alalay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tinatakot ang gobyerno 
											sa panghihimagsik ng bayan, at 
											tinatakot ang bayan sa mga hukbo ng 
											gobyerno: nagmula rito ang isang 
											magaang na larong nakakatulad sa 
											nangyayari sa mga matatakutin kung 
											sila'y pumapasok sa mga malulungkot 
											na lugar; ipinalalagay nilang mga 
											'fantasma' ang kanilang sariling mga 
											anino, at ipinalalagay nilang mga 
											boses ng iba ang mga alingawngaw ng 
											kanilang sariling mga boses. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Hindi makawawala ang gobyerno sa 
											pananalima sa mga prayle, 
											samantalang hindi siya 
											nakikipag-alam sa bayang ito; 
											mabubuhay siyang katulad niyang mga 
											batang baliw, na pagdaka'y 
											nangangatal marinig lamang ang boses 
											ng sa kanya'y tagapag-alaga, na 
											kanilang pinakasusuyo ng di ano 
											lamang at ng sa kanila'y 
											magpaumanhin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Hindi naghahangad ang 
											gobyernong siya'y magtamo sa 
											hinaharap na panahon ng sariling 
											lakas na sagana, siya'y isang bisig 
											lamang, sa makatuwid ay tagaganap; 
											ang ulo'y ang kumbento, sa makatuwid 
											ay siyang tagapag-utos, at sa 
											ganitong hindi niya pagkilos, 
											nagpapaubaya siyang siya'y 
											kaladkarin sa magkabikabilang 
											banging malalalim, siya'y nagiging 
											lilim lamang, nawawal-an siyang 
											kabuluhan, at sa kanyang kahinaan at 
											kasalatan sa kaya'y ipinagkakatiwala 
											niyang lahat sa mga kamay na upahan. 
											Kung hindi'y inyo pong isumag ang 
											anyo ng pamamahala sa atin ng ating 
											Pamunuan sa mga ibang lupaing inyong 
											linakbay ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Oh!--ang isinalabat ni 
											Ibarra,--mapapakalabis naman ang mga 
											kahingiang iyan; magkasiya na lamang 
											tayo sa pagkakitang ang baya'y hindi 
											dumaraing, at hindi nagkakahirap na 
											gaya ng mga ibang lupain, at ito'y 
											salamat nga sa Religion at sa 
											kabaitan ng mga punong dito'y 
											namamahala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi dumaraing ang bayan, sapagkat walang boses, hindi 
											kumikilos sapagkat hindi 
											nakakaramdam sa mapanganib na 
											pagtulog, at hindi nahihirapan, ang 
											wika po ninyo, sapagkat hindi niya 
											nakikita kung paano ang pagdurugo ng 
											kanyang puso, nguni't makikita't 
											mariringig isang araw at sa aba ng 
											mga lumiligaya sa pagdaraya at sa 
											gabi kung mangagsigawa, dahil sa ang 
											akala nila'y natutulog na lahat. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Pagka naliwanagan ng sikat ng araw 
											ang karumaldumal na anak ng mga 
											kadiliman, kung magkagayo'y darating 
											ang kakilakilabot na pananag-uli ng 
											isip, bubugso at sasambulat ang 
											hindi maulatang lakas na kinulong sa 
											lubhang mahabang panahon, ang 
											napakaraming kamandag na isaisang 
											patak na sinala, ang di masayod na 
											mga himutok na linunod ... Kung 
											magkagayo'y sino kaya ang magbabayad 
											niyang mga utang na manakanakang 
											sinisingil ng bayan ayon sa ating 
											nababasa sa pigta ng dugong mga 
											dahon ng Historia?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi ipahihintulot ng Diyos, ng 
											gobyerno at ng Religiong dumating 
											ang araw na iyan!--ang muling 
											isinagot ni Crisostomo, na nalalagim 
											ng laban sa kanyang sariling 
											kalooban.--Sumasampalataya sa 
											religion at sumisinta sa Espa&ntilde;a ang 
											Filipinas; talastas ng Filipinas 
											kung gaano kalaki ang mga 
											kagalingang ginagawa ng nacion sa 
											kanya. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tunay nga't may mga 
											kapaslangang nagagawa, hindi ko rin 
											naman ikakailang siya'y may mga 
											kakulangan; datapuwa't nagpapagal 
											ang Espa&ntilde;a ng pagbabago ng mga 
											kautusan at mga palakad na namamasid 
											niyang di totoong wasto upang 
											mabigyang kagamutan ang gayong mga 
											kapaslangan at mga kakulangan; 
											nagbabalak ng mga bago't bagong 
											panukala, hindi masamang asal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Nalalaman 
											ko, at narito ang kasam-ang lalo. 
											Ang mga pagbabagong utos na 
											nanggagaling sa mataas, pagdating sa 
											baba'y nawawal-ang kabuluhan, dahil 
											sa mga pangit na pinagkaratihan ng 
											lahat, sa halimbawa, ang maningas na 
											hangad na pagdaka'y yumaman at ang 
											kamangmangan ng bayang ipinauubaya 
											ang lahat ng gawin ng may mga 
											salanggapang na budhi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nasasalansa ng isang tadhana ng hari 
											ang mga gawang lisya ng mga 
											namiminuno, samantalang hindi 
											abangan ng isang mapagmalasakit na 
											makapangyarihan ang lubos na 
											pagtalima sa tadhanang iyon ng hari, 
											samantalang hindi ipinagkakaloob ang 
											kalayaang magsalita laban sa 
											malalabis na mga kagagawan ng 
											nangaglulupit na mga hariharian sa 
											bayan: matitira sa pagkapanukala, 
											ang mga panukala, ang mga 
											kapaslanga'y mananatili't hindi 
											masasawata, at gayon ma'y tahimik na 
											matutulog ang ministro, sa galak na 
											siya'y nakatupad ng kanyang 
											katungkulan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi lamang ito, 
											sakali't pumarito ang isang ginoong 
											may mataas na katungkulang may 
											taglay na mga dakila't magagandang 
											mga hangad, samantalang sa likura'y 
											tinatawag siyang-ulol, sa harap 
											niya'y ganito ang ipasisimulang sa 
											kanya'y iparinig: 'hindi po 
											nakikilala ng inyong kamahalan, ang 
											lupaing ito, hindi po nakikilala ng 
											inyong kamahalan ang mga 'indio', 
											pasasamain po ng kamalian ninyo sila, 
											ang mabuti po'y magkatiwala kayo kay 
											'fulano' at kay 'zutano' at iba pa,' 
											at sapagkat hindi nga naman 
											nakikilala ng kamahalan niya ang 
											lupaing hangga ngayo'y na sa Amerika 
											ang kanyang&nbsp; buong&nbsp; akala, at bukod 
											sa roo'y ma'y mga kakulangan at may 
											mga hindi mapagtagumpayan ng marupok 
											niyang loob, na gaya rin naman ng 
											lahat ng tao, siya'y napahihinuhod. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nadidilidili naman ng kamahalan 
											niyang kinailangang siya'y magpatulo 
											ng maraming pawis at magkahirap ng 
											di kawasa upang kamtan niya ang 
											katungkulang hinahawakan, na tatlong 
											taon lamang ang itatagal ng 
											katungkulang iyon, na sapagkat 
											siya'y may katandaan na'y 
											kinakailangang huwag ng mag-iisip ng 
											mga pagtutuwid ng liko at ng mga 
											pagsasanggalang sa naaapi, kung di 
											ang igiginhawa niya sa panahong 
											darating; isang maliit na 'hotel' (magandang 
											bahay) sa Madrid, isang mainam na 
											tahanan sa labas ng kiudad at isang 
											magaling na pakikinabang sa taontaon 
											sa patubuang salapi upang 
											makapagbuhay-ginhawa sa pangulong 
											bayang tahanan ng hari ang mga bagay 
											ngang ito ang dapat paghanapin sa 
											Pilipinas. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Huwag tayong humingi ng 
											mga kababalaghan, huwag nating 
											hinging magmalasakit sa ikagagaling 
											ng lupaing ito ang taga ibang 
											lupaing naparirito at ng makakita ng 
											kayamanan at pagkatapos ay aalis. 
											Anong kahalagahan sa kanya ng 
											pagkilalang loob o ng mga sumpa ng 
											isang bayang hindi niya kilala, na 
											wala siyang ano mang sukat 
											alalahanin at wala naman doon ang 
											kanyang mga sinisinta? Upang 
											tumimyas ang dangal ay kinakailangan 
											umalingawngaw sa mga tainga ng ating 
											mga iniibig, sa hanging sumisimoy sa 
											ating tahanang bahay o sa 
											kinamulatang bayang mag-iingat ng 
											ating bungo at mga but-o, ... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Ibig 
											nating maramdaman ang pagkaunlak sa 
											ibabaw ng ating libingan, at ng 
											mapapag-init ng kanyang mga sinag 
											ang kalamigan ng kamatayan, ng huwag 
											namang totoong mauwi na nga tayo sa 
											wala, kung di may matirang ano mang 
											makapagpapaalaala sa atin. Alin man 
											dito'y wala tayong maipangako sa 
											pumaparito upang mamanihala ng ating 
											kapalaran. At ang lalo pang 
											kasamasamaan sa lahat ay 
											nangagsisi-alis pagka nagpapasimula 
											na ng pagkaunawa ng kanilang 
											katungkulan. nguni't lumalayo tayo 
											sa ating pinag-uusapan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi, bago tayo magbalik sa 
											pinag-uusapan natin ay 
											kinakailangang kong pagliwanagin ang 
											ilang mga tanging bagay,--ang 
											dalidaling isinalabat ng binata. 
											Mangyayaring sumang-ayon akong hindi 
											nakikilala ng Pamahalaan ang 
											kalagayan, kaugalian at minimithi ng 
											bayan, datapuwa't sa akala ko'y 
											lalong hindi nakikilala ng bayan ang 
											Pamahalaan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											May mga kagawad ang 
											Pamahalaang walang kabuluhan, 
											masasama, kung ito ang ibig ninyong 
											aking sabihin, datapuwa't mayroon 
											namang mga kagawad na magagaling, at 
											ang magagaling na ito'y walang 
											magawa, sapagkat sumasagitna sila 
											ng karamihang hindi gumagalaw, aayaw 
											gumalaw, ang mga mamamayan bagang 
											bahagya, na nakikialam sa mga bagay 
											na sa kanya'y nauukol. nguni't hindi 
											ako naparito't ng makipagmatuwiran 
											sa inyo tungkol sa bagay na ito; 
											naparito ako't ng sa inyo'y 
											huminging kahatulan, at ang inyong 
											sabi'y yumukod ako sa mga 
											diosdiosang katawatawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Tunay 
											nga, at ito rin ang aking inuulit, 
											sapagkat dito'y kinakailangang 
											ibaba ang ulo o pabayaang ilagpak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ibaba 
											ang ulo o pabayaang ilagpak?--ang 
											inulit ni Ibarrang nag-iisip-isip.--Totoong 
											napakahigpit ang pahirangang iyan! 
											nguni't bakit? Diyata't hindi nga 
											kaya mangyayaring magkaayos ang 
											pagsinta sa aking tinubuang lupa at 
											ang pagsinta sa Espa&ntilde;a? 
											Kinakailangan bagang magpakaimbi 
											upang maging magaling na binyagan, 
											papangitin ang sariling budhi upang 
											makagawa nga ng isang magaling na 
											panukala? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sinisinta ko ang aking 
											tinubuang lupa, ang Filipinas, 
											sapagkat siya ang pinapakakautangan 
											ko ng buhay at ng aking kaligayahan, 
											at sapagkat dapat sintahin ng 
											lahat ng tao ang kanyang tinubuang 
											lupa; sinisinta ko ang Espa&ntilde;a, ang 
											lupang tinubuan ng aking magugulang, 
											sapagkat bagaman sa lahat ng bagay 
											na nangyayari, pinagkakautangan siya 
											at pagkakautangan ng Filipinas ng 
											kanyang kaligayahan at ng kanyang 
											kagalingan sa panahong darating. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Katoliko ako, nananatili sa aking 
											dalisay ang pananampalataya ng aking 
											mga magugulang, at hindi ko maalaman 
											kung anong kadahilanan at aking 
											ibababa ang aking ulo, gayong 
											mangyayari namang aking itunghay; 
											kung anong kadahilanan at aking 
											ihahayin ang aking ulo sa aking mga 
											kaaway, gayong sila'y mangyayari ko 
											namang yurakin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--sapagkat na sa kamay ng inyong 
											mga kaaway ang linang na ibig 
											ninyong pagtamnan, at wala kayong 
											lakas na mailalaban sa kanila.... 
											Kinakailangan munang hagkan ninyo 
											ang kamay na iyang....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hagkan! 
											Datapuwa't nalilimutan na ba ninyong 
											silasila ang pumatay sa aking ama, 
											at siya'y kanilang hinukay at inalis 
											sa kanyang libingan? nguni't akong 
											kanyang anak ay hindi ko nalilimutan, 
											at kung hindi ko siya 
											ipinanghihiganti'y, dahil sa 
											linilingap ko ang kapurihan ng 
											religion.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Itinungo ang ulo ng matandang 
											pilosopo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ginoong 
											Ibarra.--ang kanyang isinagot ng 
											madalang na pananalita:--kung 
											nananatili sa inyong alaala ang mga 
											gunitaing iyan, mga gunitaing hindi 
											ko maihahatol na inyong limutin; 
											huwag po ninyong ipagpatuloy ang 
											panukalang inyong binabantang gawin, 
											at hanapin ninyo sa ibang dako ang 
											ikagagaling ng inyong mga kababayan. 
											Humihingi ang panukala ninyo na ang 
											ibang tao ang gumawa, sapagkat 
											upang mayari, hindi lamang salapi at 
											hangad na makayari ang kinakailangan; 
											bukod sa rito'y kinakailangan dito 
											sa ating lupain ang pagka matiisin, 
											malabis na katiyagaa't pagsusumikap 
											at matibay na pag-asa, sapagkat 
											hindi nahahanda ang linang; pawang 
											mga dawag lamang ang nakatanim.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Napag-uunawa ni Ibarra ang 
											kahalagahan ng mga salitang ito; 
											datapuwa't hindi siya 
											makapanglulupaypa'y; na sa kanyang 
											gunita ang alaala kay Maria Clara; 
											kinakailangang mayari ang kanyang 
											inihandog na pangako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Wala na bagang ibang sa inyo'y 
											maihatol ang dinanas ninyo kung di 
											ang mahigpit na paraang iyan?--ang 
											itinanong sa mahinang pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tinangnan siya ng matandang lalaki 
											sa bisig at saka siya dinala sa 
											bintana. Isang hanging malamig na 
											pangunahin ng timog ang siyang 
											humihihip; nalalatag sa mga mata 
											niya ang halamang ang hangganan ay 
											ang malawak na gubat na siyang 
											pinakabakod.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Bakit 
											po ba hindi natin tutularan ang gawa 
											niyang mahinang katawan ng halamang 
											iyang humihitik sa dami ng bulaklak 
											at mga buko?--anang pilosopo, na 
											itinuturo ang isang magandang puno 
											ng rosa.--Pagkahumihihip ang hangin 
											at ipinagwawagwagan siya, ang 
											ginagawa niya'y yumuyukod, anaki'y 
											itinatago ang kanyang mahalagang 
											taglay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Kung manatili ang puno ng 
											rosa sa pagkatuwid, siya'y mababali, 
											isasabog ng hangin ang mga bulaklak 
											at maluluoy ang mga buko. Pagkaraan 
											ng hangin, nananag-uli ang puno ng 
											rosa sa pagtuwid, at ipinagmamalaki 
											ang kanyang kayamanan, sino ang sa 
											kanya'y makakapipintas dahil sa 
											kanyang pahihinuhod sa 
											pangangailangan, sa makatuwid baga'y 
											sa pangangailangang pagyukod? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Tan-awain 
											po ninyo roon ang lubhang mayabong 
											na kahoy na 'kupang' na iyon, na 
											iginagalaw ng&nbsp; buong&nbsp; kadakilaan ang 
											kanyang na sa kaitaasang mga dahong 
											pinagpupugaran ng lawin. Ang 'kupang' 
											na iya'y dinala ko ritong galing sa 
											gubat ng panahong siya'y mahina pang 
											usbong; inalalayan ko ang kanyang 
											katawan ng maliliit na mga patpat sa 
											loob ng di kakaunting panahon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Kung dinala ko rito ang kahoy na iyang 
											malaki na't sagana sa buhay, wala 
											ngang salang hindi sana siya nabuhay: 
											ipinagwagwagan disin siya ng hangin 
											ng panahong hindi pa nakakakapit ang 
											kanyang mga ugat sa lupa upang 
											makapagbigay sa kanya ng 
											kinakailangang ikabubuhay, alinsunod 
											sa kanyang laki at taas. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ganyan din 
											po naman ang magiging wakas ninyo, 
											halamang inakat na nanggaling sa 
											Europa at inilipat sa mabatong 
											lupaing ito, kung hindi kayo hahanap 
											ng sa inyo'y aalalay, at hindi kayo 
											magpapakaliit. Masama po ang inyong 
											kalagayan, kayo'y nag-iisa, mataas; 
											umuuga ang lupa, nagbabalita ang 
											langit ng malaking unos, at napakita 
											ng nakahihikayat ng paglapit ng 
											lintik ang maruruklay na dulo ng 
											inyong angkan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi katapangan, 
											kung di kapangahasang taksil ang 
											mag-isang makihamok sa&nbsp; buong&nbsp; 
											kasalukuyang naririto; wala sino 
											mang pumipintas sa pilotong 
											nangungubli sa isang doongan sa 
											unang hihip ng hanging nagbabalita 
											ng darating na bagyo. Hindi 
											karuwagan ang yumukod kung nagdaraan 
											ang punglo (bala); ang masama'y ang 
											lumantad upang mahandusay at huwag 
											na muling bumangon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--At magkakaroon kaya ng inaasahan 
											kong bunga ang pag-amis sa sariling 
											ito?--ang itinanong ni 
											Ibarra;--maniniwala kaya sa akin at 
											lilimutin kaya ng sacerdote ang 
											ginawa ko sa kanyang pag-imbi? Tunay 
											nga kayang tutulong sila sa akin sa 
											ikalalago ng pagpapaaral sa mga 
											bata, na siyang makikipangagaw sa 
											kumbento ng mga kayamanan ng bayan? 
											Hindi kaya mangyaring sila'y 
											magpakunwari ng pakikipag-ibigan, 
											magpaimbabaw ng pagtatangkilik, at 
											sa ilalim, sa mga kadiliman ay 
											siya'y bakahin, siraing unti-unti, 
											sugatan ang kanyang bukong-bukong at 
											ng lalong madaling maibuwal siya, 
											kay sa labanan ng pamukhaan? 
											Alinsunod sa iniakala po ninyong mga 
											anyo'y maaasahang mangyayari ang 
											lahat!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nanatili ang matandang lalaki sa 
											hindi pag-imik at hindi makasagot. 
											Nag-isip-isip ng ilang sandali at 
											saka nagsalita uli:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Kung gayon ang mangyari, kung 
											maluoy ang inyong panukala, 
											makaaaliw sa inyong hapis ang 
											pagkaalam ninyong inyong ginawa ang 
											lahat ninyong makakaya, at gayon man 
											ang kahinatna'y may kaunti ring 
											pakikinabangin: itatag ang unang 
											bato, magtanim, at marahil kung 
											makaraan na ang sigabo ng unos ay 
											sumibol ang ilang butil, magnawnaw 
											pagkalampas ng kapahamakan, maligtas 
											ang angkan sa pagkapahamak at sa 
											kawakasa'y maging binhi ng mga anak 
											ng maghahalamang namatay. 
											Mangyayaring makapagpalakas ng loob 
											ang gayong uliran sa mga ibang 
											nangatatakot lamang magpasimula.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Pinaglininglining ni Ibarra ang mga 
											katuwirang ito, napagmasid ang 
											kanyang kalagayan at napagwaring 
											totoong na sa katwiran ang matandang 
											lalaki sa gitna ng kanyang 
											pagkamahiligin sa paniniwala sa 
											mapapanglaw na kasasapitan ng ano 
											mang panukala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Naniwala 
											ako sa inyo!--ang biglang sinabi, at 
											pinakahigpit ni Ibarra ang kamay ng 
											matandang lalaki.--Hindi nasayang 
											ang aking pag-asang bibigyan po 
											ninyo ako ng magaling na kahatulan. 
											ngayon din ay paparoon ako sa kura't 
											aking bubuksan sa kanya ang 
											nilalaman ng aking puso, sapagkat 
											ang katotohana'y wala naman siyang 
											ginagawa sa aking ano mang bagay na 
											masama, sapagkat hindi naman 
											magiging kawangis na lahat ng 
											nag-usig sa aking ama. Bukod sa 
											rito'y may ipakikiusap pa ako sa 
											kanya tungkol sa ikagagaling niyang 
											kulang palad na ulol na babaeng iyan 
											at ng kanyang mga anak; nananalig 
											ako sa Diyos at sa mga tao!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nagpaalam sa matandang lalaki, 
											sumakay sa kabayo at yumao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Masdan 
											nating magaling!--ang ibinulong ng 
											mapag-isip ng mapapanglaw na 
											pilosopo; na sinusundan si Ibarra ng 
											kanyang tanaw;--hiwatigan nating 
											mabuti kung paano kaya ang gagawin 
											ni Kapalarang pagyari ng 
											pinasimulaang 'komedia' sa libangan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px"></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--ngayo'y 
											tunay na siya'y nagkakamali: 
											pinasimulaan ang 'komedia' ng 
											kaunaunahan pa bago nangyari ang sa 
											libingan.</font></p>
											</p>
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
																	<a href="t-noli-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Nilalaman ng 
																	Noli Me 
																	Tangere</font></a></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<span style="font-size: 15pt">
											<font face="Arial">
											&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-top: 0; margin-bottom: 0" align="center">
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; 
											&nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
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