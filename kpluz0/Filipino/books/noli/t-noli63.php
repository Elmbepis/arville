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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg',/*url*/'../../../images/header1b.jpg',/*url*/'../../../images/header2c.jpg',/*url*/'../../../images/header2b.jpg',/*url*/'../../../images/header3c.jpg',/*url*/'../../../images/header3b.jpg',/*url*/'../../../images/header4c.jpg',/*url*/'../../../images/header4b.jpg',/*url*/'../../../images/header5c.jpg',/*url*/'../../../images/header5b.jpg',/*url*/'../../../images/header6c.jpg',/*url*/'../../../images/header6b.jpg',/*url*/'../images/backb.jpg')">

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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LXIII. Ang Gabing Sinusundan ng Pasko ng Panganganak</font></b></p>
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
											<font face="Arial" color="#333333">
											Sa itaas, sa balisbis ng isang 
											bundok, sa tabi ng isang agusan, 
											natatago sa gitna ng mga kahoy ang 
											isang dampa na nakalagay sa ibabaw 
											ng mga likolikong puno ng mga kahoy. 
											Sa ibabaw ng kanyang bubong na kugon 
											ay gumagapang na sagana sa kalaguan 
											ang kalabaza, na humihitik ng mga 
											bunga at ng mga bulaklak; 
											napapamutihan ang abang tahanang 
											iyon ng mga sungay ng usa't ng mga 
											bungo ng baboy-ramo, na may mga 
											pangil ang iba. Diyan tumatahan ang 
											isang mag-anak na tagalog, na ang 
											pangangaso't pagpuputol ng kahoy na 
											panggatong ang ginagawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa lilim ng isang kahoy, ang nunong 
											lalaki'y gumagawa ng mga walis na 
											tinting, samantalang naglalagay ang 
											isang dalaga sa isang bakol ng mga 
											itlog ng inahing manok, mga dayap at 
											mga gulay. Dalawang bata, isang 
											lalaki't isang babae'y magkasamang 
											naglalaro. May isa pang batang 
											lalaking putlain, mukhang 
											namamanglaw, malalaki ang mga mata 
											at malalim kung tumingin, at siya'y 
											nakaupo sa ibabaw ng isang 
											nakahigang puno ng kahoy. 
											Mapagkikilala natin sa kanyang 
											namamayat na mukha ang anak na 
											lalaki ni Sisa, si Basilio, na 
											kapatid ni Crispin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Paggaling ng paa mo,--ang sabi sa 
											kanya ng batang babae;--maglalaro 
											tayo ng piko-pikong-taguan, ako ang 
											inainahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Saasama ka sa amin sa pag-akyat sa 
											taluktok ng bundok,--ang dagdag ng 
											batang lalaki;--iinom ka ng dugo ng 
											usang pinigaan ng katas ng dayap at 
											ikaw ay tataba, at kung mataba ka 
											na'y tuturuan kata ng paglukso sa 
											magkabikabilang malalaking bato, na 
											na sa ibabaw ng agusan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngumingiti ng mapanglaw si Basilio, 
											tinitingnan ang sugat ng kanyang paa 
											at pagkatapos ay ibinabaling ang 
											paningin sa araw na mainam na totoo 
											ang sikat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipagbili mo ang mga walis na 
											ito,--anang nunong lalaki sa 
											dalaga;--at ibili mo ng ano man ang 
											mga kapatid mo, sapagkat Pasko 
											ngayon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--mga rebentador, ibig ko ng mga 
											rebentador!--ang sigaw ng batang 
											lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ibig ko naman ang isang ulong 
											mailagay ko sa aking manika!--ang 
											sigaw naman ng batang babae, at 
											tinangnan sa tapis ang kanyang 
											kapatid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ikaw, ano naman ang ibig mo?--ang 
											tanong ng nuno kay Basilio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumindig itong nahihirapan at 
											lumapit sa matandang lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo,--ang sinabi niya;--nagkasakit 
											po pala akong mahigit na isang 
											buwan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Buhat ng masumpong ka naming hindi 
											nakakaalam-tao't puno ng mga sugat 
											ay dalawang buwan na sa itaas ang 
											nakararaan; ang isip nami'y 
											mamamatay ikaw....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gantihin nawa kayo ng Diyos; kami 
											po'y totoong mahihirap!--ang muling 
											sinabi ni Basilio; datapuwa't 
											yayamang Pasko ngayon, ibig kong pa 
											sa bayan upang aking tingnan ang 
											aking ina't kapatid na maliit. 
											Marahil hinahanap nila ako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't anak ko, hindi ka pa 
											magaling at malayo ang bayan mo; 
											hindi ka darating doon sa hating 
											gabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po kailangan, ginoo! Marahil 
											po'y totoong namamanglaw ang aking 
											ina't kapatid na maliit; sa taon 
											tao'y nagsasamasama kami sa 
											piyestang ito ... ng taong nagdaa'y 
											isang isda ang aming kinaing tatlo 
											... ang ina ko marahil ay iyak ng 
											iyak ng paghanap sa akin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ka darating na buhay sa 
											bayan, bata! Sa gabing ito'y may 
											inahing manok tayo at tapa ng 
											baboy-ramo. Hahanapin ka ng aking 
											mga anak na lalaki kung umuwi silang 
											galing sa parang....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marami po kayong mga anak, at ang 
											aking ina'y wala kung di kaming 
											dalawa lamang; marahil ipinalalagay 
											na akong patay! Ibig ko po siyang 
											bigyan sa gabing ito ng galak, ng 
											isang aginaldo ... isang anak!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naramdaman ng matandang lalaking 
											nanggigilid ang kanyang luha, 
											ipinatong sa ulo ng batang lalaki 
											ang kanyang kamay at sinabi sa 
											kanyang nababagbag ang puso:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tila ka matandang tao! Hala, paroon 
											ka na, hanapin mo ang iyong nanay, 
											ibigay mo sa kanya ang aginaldo ... 
											ng Diyos, gaya ng sabi mo; kung 
											nalaman ko lamang ang pangalan ng 
											iyong bayan, sana'y naparoon ako ng 
											ikaw ay may sakit. Lakad na, anak 
											ko, at samahan ka nawa ng Diyos at 
											ng poong si Jesus. Sasamahan ka ng 
											apo kong si Lukia hanggang sa bayang 
											malapit dito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit, aalis ka ba?--ang tanong sa 
											kanya ng batang lalaki.--Diyan sa 
											ibaba'y may mga sundalo, maraming 
											mga tulisan. Aayaw ka bang makita 
											ang aking mga rebentador? Pum! 
											purumpum!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aayaw ka ba ng piko-pikong 
											taguan?--ang tanong naman ng batang 
											babae;--nakapagtago ka na ba? Hindi 
											ba totoong nakatutuwa ang habulin at 
											magtago?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngumiti si Basilio; dinampot ang 
											kanyang tungkod at nagsalitang 
											nanglalaglag ang mga luha sa mga 
											mata:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Babalik ako agad,--anya;--dadalhin ko 
											rito ang maliit kong kapatid, 
											makikita ninyo siya at kayo'y 
											makikipaglaro sa kanya; siya'y 
											kasing laki mo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pipilaypilay rin ba kung 
											lumakad?--ang tanong ng batang 
											babae;--kung gayo'y siya ang ating 
											gagawing ina-inahan sa piko-piko.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag mo kaming kalilimutan,--ang 
											sabi sa kanya ng matandang 
											lalaki;--dalhin mo itong tapa ng 
											baboy-ramo at ibigay mo sa iyong 
											nanay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinamahan siya ng mga bata hanggang 
											sa tulay na kawayang nakalagay sa 
											ibabaw ng agusang maingay ang 
											lagaslas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinakapit siya ni Lukia sa kanyang 
											mga bisig at nawala sila sa mga 
											paningin ng mga bata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Maliksing lumakad si Basilio, 
											bagaman may tali ang kanyang binti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humahaginit ang hanging sa labas at 
											nangangaligkig sa ginaw ang mga taga 
											San Diego.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Niyo'y gabing sinusundan ng Pasko ng 
											Panganganak, nguni't gayon ma'y 
											malungkot ang bayan. Walang 
											nakasabit sa mga bintanang isang 
											parol man lamang na papel, walang 
											ano mang kaingayan sa mga bahay na 
											nagbabalita ng kasayahang gaya ng 
											mga nakaraang taon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa 'entresuelo' ng bahay ni kapitang 
											Basilio'y nagsasalitaan sa tabi ng 
											isang&nbsp;<i>rehas</i>, ito't si 
											Don Filipo (pinapagkaibigan sila ng 
											pagkapahamak ni Don Filipo), 
											samantalang sa kabilang&nbsp;<i>rehas </i>nama'y 
											tumatanaw sa daan si Sinang, ang 
											kanyang pinsang si Viktoria at ang 
											magandang si Iday.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpapasimula ng pagsikat ang buwang 
											patunaw sa naaabot ng paningin at 
											pinapagkukulay ginto ang mga 
											alapaap, mga kahoy at mga bahay, at 
											tuloy nangagbibigay ng mahahaba't 
											wari'y mga fantasmang mga anino.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi kakaunti ang inyong 
											kapalarang lumabas, na alinsunod sa 
											pasya ng hukom ay walang kasalanan, 
											sa mga panahong ito!--ang sabi ni 
											kapitang Basilio kay Don Filipo;--tunay nga't sinunog nila ang 
											inyong mga libro, nguni't lalong 
											malaki ang nangawala sa mga iba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit sa&nbsp;<i>rehas</i>&nbsp;ang isang 
											babae at tumingin sa dakong loob. 
											Nagniningning ang kanyang mga mata, 
											namamayat ang kanyang mukha, lugay 
											at gusot ang kanyang mga buhok, 
											binibigyan siya ng buwan ng 
											kakaibang anyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Si Sisa!--ang biglang sinabi ni 
											Don Filipo, at saka siya humarap kay 
											kapitang Basilio, samantalang 
											lumalayo ang ulol na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po ba na sa sa bahay siya ng 
											mediko?--ang itinanong;--gumaling na 
											po ba?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngumiti ng masaklap si kapitang 
											Basilio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natakot ang medikong siya'y isumbong 
											na kaibigan ni Don Crisostomo, at 
											ang ginawa'y pinaalis si Sisa sa 
											kanyang bahay. ngayo'y muling 
											nagpapakabikabila na namang ulol na 
											gaya ng dati, umaawit, hindi 
											gumagawa ng masama kangino man at 
											natitira sa gubat....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ano pa po ang mga nangyari sa 
											bayan mula ng umalis kami rito? 
											Nalalaman kong tayo'y may kurang 
											bago at bagong alperes....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Katakotakot na mga panahon, 
											umuudlot ang katauhan!--ang ibinulong 
											ni kapitang Basilio, na ang nakaraan 
											ang iniisip.--Tingnan po ninyo, 
											kinabukasan ng inyong pag-alis ay 
											nasumpungang patay ang sakristang 
											mayor, nakabitin sa palupo ng 
											kanyang bahay. Dinamdam na totoo ni 
											Padre Salvi ang kanyang pagkamatay 
											at sinamsam na lahat ang kanyang mga 
											papel.--Ah, namatay rin ang pilosopo 
											Tasio, at ibinaon siya sa libingan 
											ng mga insik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kahabaghabag naman si don 
											Anastasio!--ang ibinuntong hininga ni 
											Don Filipo,--at ang kanyang mga 
											libro?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinunog na lahat ng mga madasalin, 
											sapagkat sa ganya'y inaakala 
											nilang sila'y mararapat sa Diyos. 
											Wala akong nailigtas kahi't ang 
											libro man lamang ni Cikeron ... 
											walang ginawang ano man ang 
											gobernadorcillo upang sansalain ang 
											gayong gawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kapwa hindi umimik ang dalawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nariringig ng sandaling iyon ang 
											awit na kahapishapis at mapanglaw ng 
											ulol na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman mo ba kung kailan ang 
											kasal ni Maria Clara,--ang tanong ni 
											Iday kay Sinang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi,--ang isinagot nito;--tumanggap 
											ako ng isang sulat ni Maria Clara, 
											nguni't aayaw kong buksan sa takot 
											na aking maalaman. Kaawaawa si 
											Crisostomo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang balita'y kung di kay Linares, si 
											Kapitan Tiago'y nabitay sana, ano 
											ang kahihinatnan ni Maria Clara?--ang 
											pahiwatig ni Viktoria.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdaan ang isang batang lalaking 
											pipilaypilay; tumatakbong ang 
											tungo'y sa plaza na pinanggagalingan 
											ng awit ni Sisa. Siya'y si Basilio. 
											Nasumpungan ng bata ang kanyang 
											bahay, na walang tao at giba; 
											pagkatapos ng maraming pagtatanong, 
											ang kanyang nausisa lamang ay ang 
											kanyang ina'y ulol at 
											nagpapagalagala sa bayan; wala 
											siyang kabalibalita kay Crispin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kinain ni Basilio ang luha, linunod 
											ang kanyang pighati, hindi na 
											nagpahinga't hinanap ang kanyang 
											ina. Dumating sa bayan, ipinagtanong 
											ang kanyang ina, at dumating ang 
											awit sa kanyang mga tainga. 
											Pinigilan ng kulang palad ang 
											pangangatal ng kanyang mga binti at 
											nag-akalang tumakbo't ng payakap sa 
											kanyang ina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Linisan ng ulol na babae ang plaza't 
											tinungo ang tapat ng bahay ng bagong 
											alperes. ngayo'y gaya rin ng unang 
											may isang bantay na sundalo sa 
											pintuan, at isang ulo ng babae ang 
											siyang nanungaw sa bintana, nguni't 
											hindi na ang Medusa, ngayo'y isang 
											bata ang gulang; hindi pawang sawing 
											palad ang bawa't alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpasimula ng pag-awit si Sisa sa 
											tapat ng bahay, na tinititigan ang 
											buwang nagduruyan sa isang langit na 
											asul at napapag-itanan ng mga 
											alapaap na kulay ginto. Nakikita 
											siya ni Basilio'y hindi makapangahas 
											lumapit, at marahil hinihintay 
											niyang umalis doon; lumalakad sa 
											magkabilakabila, nguni't 
											pinangingilagan ang paglapit sa 
											kuartel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinakikinggang magaling ng babaeng 
											bata pang na sa sa bintana ang awit 
											ng ulol na babae, at ipinag-utos sa 
											bantay na sundalong papanhikin ang 
											ulol na iyon sa kuartel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkakita ni Sisang lumalapit ang 
											sundalo at ng maringig ang tinig 
											nito, sa malaking takot ay 
											nagpakatakbotakbo, at ang Diyos ang 
											nakakaalam kung paano ang pagtakbo 
											ng isang ulol. Sinundan siya ni 
											Basilio, at sa panganganib na baka 
											hindi na niya makita'y tumakbo at 
											nalimutan tuloy ang sakit ng kanyang 
											mga paa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan na nga lamang ninyo kung 
											paano ang paghabol ng batang iyan sa 
											ulol na babae!--ang sigaw na 
											nagagalit ng isang alilang babae, na 
											na sa daan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ng makita niyang ipinagpapatuloy 
											ang paghagad sa ulol na babae, 
											dumampot ng isang bato't inihagis sa 
											bata, at sinabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ayan ang iyo! pagkasayangsayang at 
											natatali ang aso!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naramdaman ni Basilio ang isang 
											pukol sa kanyang ulo, nguni't 
											nagtuloy ng pagtakbo at hindi 
											inalumana. Tinatahulan siya ng mga 
											aso, sumisigaw ang mga gansa, 
											binubuksan ang mga ibang bintana at 
											may sumusungaw na isang mapagusisa, 
											at sinasarhan naman ang ibang 
											bintana, sa panganganib na baka 
											iyo'y kawangis din ng gabi ng mga 
											kaguluhan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumating sila sa labas ng bayan. 
											Nagpasimula si Sisa ng paghina ng 
											pagtakbo; malaking totoo ang 
											kalayuan niya sa humahabol sa kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nanay, ako po!--ang isinigaw sa 
											kanya ng siya'y matanawan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bahagya lamang naringig ng ulol na 
											babae ang tinig ay nagpasimula na 
											naman ng pagtakas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nanay, ako po!--ang isinigaw ng bata 
											na walang pagkasiyahan sa pighati.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nakakaringig ang ulol na 
											babae, sinusundan siya ng anak na 
											humihingal. Naraanan na nila ang mga 
											pananim at malapit na sila sa gubat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita ni Basiliong pumasok sa gubat 
											na iyon ang kanyang ina at siya'y 
											pumasok naman. Ang mga damo, ang 
											maliliit na kahoy, ang matinik na 
											mga yantok at ang mga ugat na 
											umuutlaw sa lupa ay 
											nangagsisihadlang sa takbo ng 
											dalawa. Sinusundan ng anak ang 
											naaaninagnagan niyang katawan ng 
											kanyang ina, na manakanakang 
											liniliwanagan ng mga sinag ng buwang 
											pumapasok sa mga pag-itan ng mga 
											sanga. Yaon ang talinghagang gubat 
											ng familia ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Makailang natisod at narapa ang 
											bata, nguni't tumitindig, hindi 
											nagdaramdam sakit; ang&nbsp; buong&nbsp; 
											kaluluwa niya'y pumatungo sa kanyang 
											mga mata, na sumusunod sa anyo ng 
											irog niyang ina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kanilang dinaanan ang ilat na 
											bumubulong ng matimyas; ang mga 
											tinik ng kawayang nangahulog sa 
											putik ng pampang ay tumitimo sa mga 
											paa niyang hubad: hindi humihinto si 
											Basilio upang bunutin ang mga tinik 
											na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita niya ng&nbsp; buong&nbsp; pagtataka na 
											tinutungo ng kanyang ina ang 
											malagong parang at pumasok sa 
											pintong kahoy na pangsara sa 
											pinaglibingan ng matandang kastila 
											sa paanan ng baliti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binanta ni Basiliong siya'y pumasok 
											naman, nguni't nasunduan niyang 
											nakasara ang pinto. 
											Ipinagsasanggalang ang pintong iyon 
											ng ulol na babae, ng kanyang mga 
											payat na bisig at gusamot na ulo, na 
											ano pa't pinapananatili ng kanyang&nbsp; 
											buong&nbsp; lakas sa pagkasara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nanay, ako po, ako po, ako'y si 
											Basilio, ang inyong anak!--ang sigaw 
											ng batang hapo na, at nagpakalugmok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't hindi nagluluwag ang ulol 
											na babae; isinisikad ang kanyang mga 
											paa sa lupa at ipinaglalabang mainam 
											ang pinto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinuntok ni Basilio ang pinto, 
											inihahampas doon ang ulong 
											napapaliguan ng dugo, umiyak, 
											nguni't walang kabuluhang lahat. 
											Nagtindig ng&nbsp; buong&nbsp; hirap, 
											pinagmasdan ang pader at iniisip 
											niyang kanyang hagdanan, nguni't 
											wala siyang nasumpungang magawang 
											hagdan. Nilibot niya, ng magkagayon, 
											at nakita niya ang isang sanga ng 
											malungkot na kahoy na humahalang sa 
											isa namang sanga rin ng ibang kahoy. 
											Nag-ukyabit siya: gumagawa ng 
											kababalaghan ang kanyang 
											pagsintang-anak, nagpalipatlipat 
											siya sa mga sanga hanggang sa 
											dumating sa baliti, at napanood pa 
											niyang itinutuon ang ulo ng kanyang 
											ina sa pinto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naringig ni Sisa ang ingay na 
											ginagawa ni Basilio sa mga sanga, 
											lumingon at nag-akalang tumakas, 
											nguni't nagpatihulog sa kahoy ang 
											anak, niyakap niya ang kanyang ina 
											at pinuspos ng halik, at hinimatay 
											pagkatapos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namasdan ni Sisa ang noong 
											napapaliguan ng dugo; yumukod sa 
											kanya, ang mga mata ng babae'y tila 
											mandin tatakas sa kinalalagyan, 
											pinagmasdan siya sa mukha at ang mga 
											namumutlang pagmumukhang iyo'y 
											siyang pumagpag ng bait na 
											gumugupiling sa kanyang mga utak ng 
											ulo, may sumipot na tulad sa isang 
											kislap sa kanyang pag-iisip, 
											nakilala ang kanyang anak at, 
											nagpakabigaybigay ng isang sigaw, at 
											pagkatapos ay nahandusay sa 
											hinimatay na batang kanyang 
											niyayakap at hinahagkan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanatiling hindi kumikilos ang ina 
											at ang anak....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang pagsaulang-tao si Basilio'y 
											nakita niyang hindi nakakaalam tao 
											ang kanyang ina. Tinawag niya ang 
											kanyang ina, kanyang ipinangalan ang 
											lalong matitimyas na palayaw, at ng 
											mamasid niyang hindi nagigising at 
											hindi man lamang humihinga'y 
											nagtindig, tinungo ang agos at 
											kumuha ng kaunting tubig na kanyang 
											inilagay sa binalisungsong na dahon 
											ng saging, at kanyang winiligan ng 
											tubig na iyon ang namumutlang mukha 
											ng kanyang ina. nguni't hindi 
											kumilos ng kamunti man lamang ang 
											ulol na babae, nananatili sa 
											pagkapikit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagmasdan siya ni Basiliong 
											nagugulat; idinaiti ang kanyang 
											tainga sa puso ng babae; nguni't ang 
											payat at lanta ng dibdib ay malamig 
											at hindi tumitibok: inilagay niya 
											ang kanyang mga labi sa mga labi ng 
											kanyang ina ay wala siyang 
											naramdamang kamunti man lamang na 
											paghinga. Niyakap ng kulang palad 
											ang bangkay at tumangis ng&nbsp; buong&nbsp; 
											kapaitan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumiliwanag ang buwan sa langit ng&nbsp; 
											buong&nbsp; kadakilaan, nagbubuntong 
											hininga ang mahinhing amihan sa 
											paghihip at humuhuni ang mga 
											kagaykay sa ilalim ng mga damo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang gabing pawang kaliwanagan at 
											katuwaan sa lubhang maraming mga 
											musmos, na sa mainit na sinapupunan 
											ng mga kasambahay ipinagdiriwang ang 
											piyestang lalong may mga matatamis 
											na nagugunita; ang piyestang 
											nagpapaalaala ng unang titig ng 
											pagsinta na ipinadala ng langit sa 
											lupa; sa gabing iyang ang lahat ng 
											magkakasambahay na mga binyaga'y 
											kumakain, umiinom, sumasayaw, 
											umaawit, tumatawa, naglalaro, 
											sumisinta, nangaghahalikan ... </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa 
											gabing iyan, na sa mga lupaing 
											malalamig ay nagtataka ang 
											kamusmusan sa wari'y himalang kahoy 
											na pino, na humihitik ng mga ilaw, 
											mga manika, mga matamis at 
											makikintab na palarang papel, na 
											pinanonood ng nangasisilaw na 
											mabibilog na mga matang kinaaninuhan 
											ng pagka walang malay, ang gabing 
											iya'y walang idinudulot kay Basilio 
											kung di isang pangungulila. Sino ang 
											nakakaalam? Marahil sa bahay ng 
											malungkuting si Padre Salvi ay nangaglalaro rin ang mga bata, 
											marahil ay kanilang inaawit:</font></p>
											<div class="poem" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial">
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin-left: 80px; margin-right: 80px">
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Ang Gabing-Maganda'y 
														dumating,</span></font><span style="font-size: 13pt"></div>
													<div class="verse">
														<p align="justify" style="margin-left: 80px; margin-right: 80px">
														</span>
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Gabing-Maganda'y aalis 
														din...</span></font></div>
												</div>
											</div>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang bata'y tumangis at humibik ng di 
											ano lamang, at ng tumingala siya'y 
											kanyang nakita sa kanyang harap ang 
											isang tao na pinagmamasdan siyang 
											walang imik. Tinanong siya ng hindi 
											kilalang lalaking iyon ng marahan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ikaw ba ang anak!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumango ang bata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang inaakala mong gawin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ilibing!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa libingan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala akong salapi, at bukod sa 
											roo'y hindi ipahihintulot ng kura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At paano?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung tulungan sana ninyo ako....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mahinang mahina ako,--ang sagot ng 
											hindi kilala, na untiunting 
											nagpakahandusay sa lupa, na nininiin 
											ng dalawang kamay; may sugat ako, 
											dalawang araw ng hindi ako kumakain 
											at hindi ako natutulog ... Wala bang 
											ibang napaparito ngayong gabi?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanatili ang taong iyon sa 
											pagdidilidili at pinagmamasid ang 
											mahalagang pagmumukha ng batang 
											lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pakinggan mo!--ang ipinagpatuloy na 
											ang tinig ay lalong mahina; marahil 
											ay patay na rin ako bago sumikat ang 
											araw ... Sa may mga dalawampung 
											hakbang buhat dito, sa kabilang 
											ibayo ng batis na ito, may 
											nakatimbong maraming kahoy na 
											panggatong; dalhin mo rito, 
											pagpatungpatungin mo, ilagay mo sa 
											ibabaw ang aming mga bangkay, takpan 
											mo ng kahoy rin at saka mo susuhan 
											ng apoy, ng maraming apoy, hanggang 
											sa kami'y maging abo....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakikinig si Basilio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagkatapos, 
											kung sakali't wala sino mang 
											dumating ... huhukay ka rito, 
											makakasumpong ka ng maraming ginto 
											... at ang lahat na iya'y iyo. 
											Mag-aral ka!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nalalao'y lalong hindi mawatasan ang 
											tinig ng hindi kilalang tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hayo't 
											humanap ka ng kahoy ... ibig kong 
											tulungan kata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Yumao si Basilio, humarap sa 
											Silanganan ang hindi kilala at 
											bumulong na wari'y nagdarasal:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mamamatay 
											akong hindi ko nakikitang numingning 
											ang liwayway sa lupang aking 
											tinubuan!... kayong mangakakakita ng 
											liwayway na iyan, batiin ninyo siya 
											... huwag ninyong limutin ang mga 
											nahandusay sa&nbsp; buong&nbsp; magdamag!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Itinaas ang mga mata sa langit, 
											gumalaw ang kanyang mga labing 
											anaki'y bumubulong ng isang dalangin, 
											tumungo pagkatapos at untiunting 
											nahandusay sa lupa....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang makaraan ang dalawang oras, si 
											hermana Rufa'y na sa sa batalan ng 
											kanilang bahay at ginagawa ang 
											paghihilamos na kaugalian 
											pagkakaumaga, upang pumaroon sa misa. 
											Tinatanawan ng mapamintakasing babae 
											ang kalapit na gubat at kanyang 
											nakitang may pumapaimbulog na 
											nalululong makapal na usok; nagkunot 
											ang mga kilay at, puno ng banal na 
											galit, ay nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino kaya ang hereje na sa araw ng 
											piyesta'y nagkakaingin? Kaya 
											dumarating ang maraming mga 
											kapahamakan. Tingnan mong pa sa 
											purgatoryo ka, at makikita mo kung 
											kukunin kata roon, hamak na tao!</font></p>
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