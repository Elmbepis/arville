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
<title>El Filibusterismo - Filipino sa KPluz.com</title>
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
								<td valign="bottom" background="file:///H:/tutorial-content.jpg">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										El Filibusterismo</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXX. Huli</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pagkamatay 
	ni Kapitan&nbsp;Tiago at ang pagkakahuli kay Basilio ay napag-alaman kaagad sa 
	lalawigan, at alang-alang sa ikadadangal ng mga mapapayapang taga San&nbsp;Diego 
	ay sasabihin naming dinamdam pa nang higit ang huli at siya lamang halos ang 
	napag-usapan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At gaya ng maaantay, ang balita'y nagkaroon ng iba't ibang 
	ayos, may nagbigay ng mga pangyayaring malungkot, kakilakilabot, 
	ipinaliwanag ang hindi nalilinawan, ang mga patlang ay pinunan ng mga 
	hakahaka, ang mga ito'y naging parang tunay na nangyari at ang multong 
	sumipot sa gayon ay nakatakot na, sampu sa mga tunay na may likha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa bayan ng 
	Tiani ay nabalita na batang bata na sa kanya ang mapatapon at marahil ay 
	patayin sa paglalakbay na tungo sa tatapunan. Ang mga matatakutin at 
	mapaghinala ng masama ay hindi pa nasisiyahan sa gayon at pinag-uusapan ang 
	mga bitayan at mga hukumang kawal; ang Enero ay isang masamang buan, Enero 
	nang mangyari ang gulo sa Kabite, at <em>ang mga taong iyon</em>, gayong mga 
	pari na, ay nangabitay; kaya't ang isang maralitang kagaya ni Basilio na 
	walang sukat mag-ampon at walang mga kakilala....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi ko 
	na!--ang buntong hininga ng Hukom pamayapa na waring minsan man lamang ay 
	nabigyan niya ng isang payo si Basilio--sinasabi ko na....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sadyang 
	ganyan ang maaantay!--ang dugtong ni hermana&nbsp;Penchang--pumapasok sa simbahan 
	at kapag nakitang marumi ng kaunti ang agua bendita ay hindi na 
	nag-aantanda! May sinasabing mga mumunting hayop at mga sakit, aba, parusa 
	ng&nbsp; Diyos ! Nararapat iyon sa kanya! Wari bagang ang agua bendita ay 
	mangyayaring makapagpahawa ng mga sakit! Lubha pa ngang kaiba, aba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ibinuhay 
	ang kanyang paggaling sa isang pagkasira ng tiyan sa paglalagay lamang ng 
	agua bendita sa pusod, na sabay sa pagdadasal ng <i xml:lang="la" lang="la">
	Sanctus Deus</i>, at inihahatol ang kagamutan sa mga kaharap, kapag 
	nangagkasakit ng iti o kabag o kung may salot, datapwa'y kailangang dasalin 
	lamang kung gayon sa wikang kastila:</font></p>
	<div class="poem-container">
		<blockquote class="poem" xml:lang="es" lang="es">
			<div class="stanza">
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Santo&nbsp; Diyos </font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Santo fuerte</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Santo inmortal,</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Libranos Se&ntilde;or de la peste</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">Y 
					de todo mal.</font></div>
			</div>
		</blockquote>
	</div>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang kagamutan 
	ay walang pagkasira, ngunit lalagyan ng agua bendita ang dakong masakit o 
	may damdam,--aniya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapuwa'y 
	marami sa mga lalaki ang hindi naniniwala sa mga bagay na ito, ni hindi 
	ipinalalagay na parusa ng&nbsp; Diyos&nbsp; ang pagkakabilanggo ni Basilio. Hindi rin 
	nanganiniwala sa mga panghihimagsik at mga paskin, sa pagkakilala sa ugaling 
	ibayo pa ng pagkamapayapa at pagkamaingat ng nag-aaral, at minagaling pang 
	iambil ang gayon sa mga paghihiganti ng mga prayle, dahil sa pagkakatubos sa 
	pagkaalila, kay Huli, na anak ng tulisang mahigpit na kalaban ng isang 
	malakas na <i xml:lang="es" lang="es">corporacion</i>. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang may 
	masama silang pagkakilala sa mga kaugalian ng korporasiong iyon at naaalaala 
	ang mga abang paghihiganti, ay ipinalagay, na, ang mga hulohulong iyon ay 
	siyang malapitlapit na nangyari at siyang mapaniniwalaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti nga 
	ang nagawa kong pinalayas sa aking bahay ang babai!--ang sabi ni 
	hermana&nbsp;Penchang--ayokong makipagsira sa mga prayle, kaya't pinagmadali kong 
	humanap ng salapi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	katotohanan ay dinamdam niya ang pag-laya ni Huli; inaako siya ni Huli sa 
	pagdadasal at pag-aayuno, at kung lumagi pa ng mahabahabang panahon ay 
	marahil nagdigala ng dahil sa kanya. Bakit, kung ang mga kura ay nagdadasal 
	ng patungkol sa atin at si Kristo ay namatay dahil sa ating mga kasalanan, 
	bakit hindi makagagawa ng gayon din si Huli na patungkol kay 
	hermana&nbsp;Penchang?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang ang 
	balita'y nakasapit sa kubong tinitirahan ni Huli at nang kanyang lelong, ay 
	nangailangan ang dalaga na uliting makalawa ang balita. Tiningnan si 
	hermana&nbsp;Bali, na siyang nagbabalita, na waring hindi maliwanagan ang 
	sinasabi, hindi mapagtuwid ang kanyang pagkukuro; naghumugong ang kanyang 
	mga tainga, nagkaramdam ng pagsisikip ng puso at nagtaglay ng isang kutob ng 
	kalooban, na ang pangyayaring yaon ay makapagbibigay hapis sa kabuhayan 
	niyang sasapitin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon ma'y tinangkang manangan sa isang banaag ng pag-asa, 
	ngumiti, inakalang binibiro siya ni hermana&nbsp;Bali ng isang masamang biro, 
	ngunit di pa man ay ipinatatawad na niya kung sasabihing biro nga, ngunit 
	pinagkurus ni hermana&nbsp;Bali ang kanyang hinglalakit hintuturo at hinagkan, 
	sa katunayang totoo ang kanyang sinasabi. Sa gayon ay nawala na ang ngiti sa 
	labi ng dalaga, namutla, maputlang maputla, naramdamang nawalan siya ng 
	lakas at, noon lamang nangyari sa buo niyang buhay, nawalan ng diwang 
	tuminbuang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang sa 
	kahahampas, kakukurot, wisik ng tubig, mga krus at paglalagay ng mga 
	palaspas na benendita ay pinagsaulan ang dalaga at napag-unawa ang kanyang 
	kalagayan ay piping bumalong sa kanyang mga mata ang luha, sunod sunod ang 
	patak, walang hibik, walang panaghoy, walang daing! Inaalaala niya si 
	Basilio na walang ibang tagapag-ampon kung di si Kapitan&nbsp;Tiago, at sa 
	pagkamatay nito, ay lubos nang nawalan ng kandili at kalayaan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Batid nang sa 
	Pilipinas ay kailangan ang ninong sa lahat ng bagay, mula sa araw na 
	binibinyagan ang isang tao hanggang sa mamatay, sa pagtatamo ng katwiran, sa 
	pagkuha ng isang katibayan sa paglalakbay o upang magawa ang isang 
	paghahanap-buhay. At sa dahilang sinasabing ang pagkakabilanggong yaon ay 
	alinsunod sa mga paghihiganti ng dahil sa kanya at sa kanyang ama, ang 
	kalungkutan ng binibini ay naging isang paghihinagpis. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngayon ay siya naman 
	ang nararapat na magligtas, gaya ng ginawa ng lalaki ng siya'y alisin sa 
	pagkaalila, at ang isang boses na lihim ang nag-uudyok sa kanya ng gagawin 
	at naghahain sa kanyang pag-iisip ng isang kakilakilabot na paraan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Padre  
	Camorra, ang kura!--ang sabi ng boses.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si Huliy napapakagat labi at nahuhulog sa isang malamlam na pag-iisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa 
	pagkakasala ng kanyang ama ay dinakip ang lelong, sa pag-asang sa gayong 
	paraan ay lilitaw ang anak. Ang tanging nakapagbigay ng kalayaan ay si Padre &nbsp;Camorra, at si Padre Camorra ay nagpakilala ng di 
	kasiyahang loob sa mga pasasalamat at sa pamamagitan ng kanyang karaniwang 
	ugaling tiyakan kung magsalita ay humingi ng mga paghahandog.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mula noon 
	ay iniwasan ni Huli ang siya'y makatagpo, ngunit pinahahalik siya ng kamay 
	ng pari, hinihipo siya sa ilong, sa pisngi, binibiro siyang may mga kindat 
	at tumatawa, tumatawang siya'y kinukurot. Si Huli ang sanhi ng pagkakabugbog 
	ng mabuting kura sa ilang binata na naglilibot sa nayon at nananapatan sa 
	mga dalaga. Ang mga mapaghinala, kung nakikita siyang nagdaraan na walang 
	kaimik-imik at nakatungo, ay nagsasabing ipinadidinig sa kanya:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung iibigin, 
	ay magtatamong kapatawaran si Kabesang Tales!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binibiniy 
	dumarating na malungkot sa kanyang bahay at susuling suling ang mata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Malaki ang 
	ipinagbago ni Huli; nawala ang kanyang kasayahan, walang nakakitang siya'y 
	ngumiti, bahagya ng magsalita at wari manding nangangambang malasin ang 
	mukha niyang sarili. Minsan ay nakita siya sa bayan na may malaking guhit na 
	uling sa noo, siya, na palaging maayos at mahusay ang gayak kung lumakad. 
	Minsan ay itinanong kay hermana&nbsp;Bali kung natutungo sa impierno ang mga 
	nagpapatiwakal.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	sala!--ang tugon ng babae, at isinalaysay ang pook na iyon na waring siya'y 
	galing doon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa 
	pagkakabilanggo ni Basilio, ang mga dukha't marunong lumingap na mga kaanak 
	ay gumawa ng lahat ng magagawa upang mailigtas ang binata; ngunit sa 
	dahilang silang lahat ay hindi pa makabuo ng tatlong pung piso, ay si 
	hermana&nbsp;Bali, gaya rin ng dati, ang siyang nagkaroon ng lalong mabuting 
	akala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang dapat 
	nating gawin ay ang huminging sangguni sa taga-sulat,--aniya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga abang 
	taong iyon, ang taga-sulat sa tribunal ay siyang oraculo sa Delfos ng 
	matatandang griego.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bigyan lamang 
	ng sikapat at saka isang tabako,--ang dugtong--ay sasabihin pa sa iyo ang 
	lahat ng batas na magpapalaki ng ulo mo sa pagdinig sa kanya. Pag mayroon 
	kang piso ay maililigtas ka kahit nasa sa paanan ka ng bibitayan. Nang 
	ipasok sa bilangguan ang kapit bahay kong si Simon at hinagupit ng palo, 
	dahil sa hindi nakapagpahayag ng ukol sa isang nakawang nangyari sa malapit 
	sa kanyang bahay, aba sa halagang kahatit sikolo lamang at isang balukay na 
	bawang, ay nakuha siya ng taga-sulat! At nakita ko si Simon na babahagya 
	nang makalakad at nahigang isang buang mahigit. Ay! nabulok ang pigi, aba at 
	namatay dahil doon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang payo ni 
	hermana Bali ay tinanggap at siya na ang nakipag-usap sa taga-sulat; 
	binigyan siya ni Huli ng isang salapi at dinagdagan pa ng ilang putol na 
	pindang na usa na nahuli ng lelong. Muli na namang inatupag ni Tandang Selo 
	ang pangangaso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit walang 
	magawa ang taga-sulat; ang bilanggo ay nasa Maynila at hindi umaabot doon 
	ang kanyang lakas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung nasa sa 
	kabesera man lamang, mana pa!..--ang sabi na ipinagpaparangya ang kanyang 
	kaya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lubos na batid 
	ng tagasulat na ang kanyang lakas ay hindi lumalampas sa mga hanggahan ng 
	Tiani, ngunit kailangan niya ang huwag masira ang pananalig sa kanya at 
	upang maiwan ang pindang na usa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	mabibigyan ko kayo ng isang mabuting payo, na dili iba kundi ang pumaroon 
	kayong dalawa ni Huli sa Hukom pamayapa. Kailangang pumaroon si Huli.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang Hukom 
	pamayapa ay isang taong pabugal-bugal, ngunit kung makikita si Huli marahil 
	ay mapipigil ng kaunti ang dating ugali: naririto ang katalinuhan ng payo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pinakinggang 
	walang kapingaspingas sa tigas ng ginoong&nbsp;Hukom si hermana&nbsp;Bali, na siyang 
	nagsasalita, na maminsanminsan ay tinitingnan ang dalagang nakatungo at 
	hiyang hiya. Masasabi na lamang ng tao na malaki ang paglingap niya kay 
	Basilio, hindi naaalala ng mga tao ang kanyang utang na loob at na ang sanhi 
	ng pagkakabilanggong iyon, ayon sa balita, ay dahil sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Matapos 
	makadighay ng makaitlo o makaapat, sapagka't may masamang ugaling ito ang 
	ginoong&nbsp;Hukom, ay nagsabing ang tanging makapagliligtas kay Basilio ay si
	Padre Camorra, <em>kung iibigin niya</em>--at tiningnan ng may 
	makahulugang titig ang binibini.--Ito'y pinapayuhan niyang makipag-usap sa 
	kura.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam na ninyo 
	ang kanyang lakas; nakuha sa pagkakabilanggo ang inyong nuno.... Sukat na 
	ang isang salita niya upang mapasa tatapunan ang isang batang bagong 
	panganak o maligtas sa kamatayan ang isang binitay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Huli ay 
	hindi umiimik, ngunit sa ganang kay hermana&nbsp;Bali ay waring nabasa sa isang 
	nobena ang hatol: laan siyang samahan sa bahay ng pari ang dalaga. Lilimos 
	pa naman siya ng isang kalmen sa halagang isang salapi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y 
	umiiling si Huli at ayaw pumaroon sa kombento. Si hermana&nbsp;Bali ay waring 
	nakararamdam sa sanhi ng pag-ayaw (si Padre Camorra ay may 
	katawagan ding <i>si kabayo</i> at napakalikot) at pinananahimik siya:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala kang 
	dapat ikatakot! kasama mo ako!--aniya--hindi mo ba nabasa sa munting aklat na
	<i>Tandang&nbsp;Basio</i> na bigay ng kura, na ang mga dalaga'y dapat pumaroon sa 
	kombento, kahit hindi nalalaman ng mga magulang, upang ipagsabi ang 
	nangyayari sa bahay? Aba! Ang aklat na iyon ay nalimbag nang may pahintulot 
	ang Arsobispo, aba!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Huli, inip 
	na't sa nasang putulin ang usapan, ay namanhik sa mapanata na siyang 
	pumaroon kung ibig, ngunit sinabi ng Hukom, sabay sa pagdighay, na ang samo 
	ng isang mukha ng dalaga ay nakaaakit ng malaki kay sa mukha ng isang 
	matanda, na ang langit ay nagkakalat ng kanyang hamog sa mga sariwang 
	bulaklak at hindi sa mga tuyo na. Ang talinhaga'y naging isang magandang 
	kahalayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Huliy 
	hindi sumagot at nanaog ang dalawang babae. Sa daan ay nagmatigas ang dalaga 
	sa pag-ayaw na pumaroon sa kombento, kaya't nangagsiuwi sa kanilang nayon. 
	Si hermana&nbsp;Bali na sumama ang loob dahil sa kakulangan ng pagtitiwala, 
	gayong siya'y kasama, ay naghihiganti sa paraang binigyan ng isang 
	mahabahabang <i>sermon</i> ang binibini.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sadya ngang 
	hindi magagawa ng dalaga ang pagparoong iyon sa kombento nang hindi 
	susuwatan ang kanyang sarili, na hindi siya susuwatan ng tao, na hindi siya 
	susuwatan ng&nbsp; Diyos ! Makailan nang sinabi sa kanya, may katwiran o wala, na 
	kung susundin ang hangad sa kanya, ay patatawarin ang kanyang ama, ngunit 
	gayon man ay hindi siya pumayag, kahit na isinisigaw sa kanya ng kanyang 
	budhi ang pag-aalaala ng kautangan sa magulang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At ngayon ay gagawin niya ng 
	dahil kay Basilio, dahil sa kanyang kasintahan? Yaon ay isang pagsadlak sa 
	mga kutya at paglibak ng lahat ng tao, sampung si Basilio ay aalipusta sa 
	kanya; hindi mangyayari ang gayon, magpakailan man! Magbibigti na muna siya 
	o magtatalon sa alin mang bangin. Kahit na ano ang gawin ay nasuwatan na 
	siya na masamang anak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Binata pa rin 
	ng kaawaawang si Huli ang mga sisi ng kanyang mga kamag-anak, na sa dahilang 
	hindi nakababatid ng nangyayari sa kanila ni Padre Camorra, ay 
	kinukutya ang kanyang mga katakutan. Maiibigan baga ni Padre Camorra 
	ang isang dalagang taga bukid gayong marami naman sa bayan? At tinukoy ng 
	mga babae, ang mga pangalan ng mga dalagang magaganda't mayayaman, na 
	nagkaroon ng ganito o gayong kasawian. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At samantala'y kung barilin si 
	Basilio? Tinatakpan ni Huli ang kanyang tainga, lumilingap sa lahat ng sulok 
	at humahanap ng isang tinig na sukat magtanggol sa kanya, tiningnan ang 
	kanyang lelong; ngunit ang lelong ay pipi at nakatitig sa dulo ng kanyang 
	tandos na gamit sa pangangaso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang gabing 
	yaon ay bahagya nang nakatulog. Mga bungang tulog at panaginip, kung minsan 
	ay kahambalhambal, kung minsan ay madugo, ang nagdaraan sa kanyang mata at 
	sandasandaliy nagigising na pigta sa malamig na pawis. Parang nakadidinig 
	siya ng putukan, parang nakikita ang kanyang ama, ang ama niyang nagsumakit 
	ng lubha dahil sa kanya, na nakikipaghamok sa mga kagubatan, hinuhuling 
	wariy isang hayop sapagka't siya'y nag alinlangang kanyang iligtas. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At ang 
	larawan ng kanyang ama'y nagbago at nakita ni Basilio na naghihingalo at 
	tinititigan siya ng mga tinging sumisisi. Ang kahabaghabag ay titindig, 
	magdadasal, tataghoy, tatawagan ang kanyang ina, ang kamatayan, at sumapit 
	ang sandali na, pata na sa sindak, kung hindi lamang naging gabi noon ay 
	tumakbo na sanang tuloytuloy sa kombento, mangyari na ang mangyayari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumating ang 
	umaga, at ang mga malulungkot na paghihinala, ang mga pangingilabot sa 
	kadiliman ay bahagyang nagbawa. Ang kaliwanagan ay nagbigay sa kanya ng mga 
	pag-asa. Ngunit ang mga balitang tinanggap nang kinahapunan ay lubhang 
	kakilakilabot; napag-usapan ang mga binaril at ang gabing yao'y naging 
	karumaldumal sa dalaga. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa kanyang pagdadalita'y tinangka ng ipagkaloob ang 
	kanyang katawan pagsapit na pagsapit ng umaga at pagkatapos ay magpakamatay: 
	lahat, huwag na lamang magdaan ng gayong paghihirap! Ngunit ang umaga'y 
	nagtaglay ng mga panibagong pag-asa at ayaw pumanaog sa bahay ang binibini, 
	ni pumaroon sa simbahan. Nanganganib siyang mapahinuhod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa gayo'y 
	nakaraan ang ilang araw: nananalangin at nagtutungayaw, tumatawag sa&nbsp; 
	Diyos&nbsp; at 
	ninanasa ang kamatayan. Ang umaga ay nagiging isang patlang, si Huliy 
	umaasa sa isang kababalaghan; ang mga balitang galing sa Maynila, kahit 
	dumarating na may dagdag, ay nagsasabing ang ilang bilanggo ay nakalaya na 
	dahil sa kanilang mga ninong at mga kaibikaibigan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">May maiiwang 
	magtitiis, sino kaya? Si Huli ay nangingilabot at umuuwi sa kanyang bahay na 
	nginangatngat ang kanyang mga kuko, sa gayon ay dumarating ang gabi na ang 
	mga pangangamba, na nagkakaroon ng ibayong laki, ay waring nagiging 
	katotohanan. Kinatatakutan ni Huli ang pananaginip; natatakot siyang 
	matulog, sapagka't ang kanyang pananaginip ay isang sunod-sunod na 
	bangungot. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mga titig na may hinanakit ang lumulusot sa kanyang mga 
	balintataw kapag napikit, mga daing at panangis ang umuukilkil sa kanyang 
	mga tainga. Nakikitang pagalagala ang kanyang ama, dayukdok, walang tigil ni 
	pahinga; nakikitang si Basilio ay naghihingalo sa gitna ng daan, may tama ng 
	dalawang punglo, gaya ng pagkakita niya sa bangkay ng isang kalapit-bahay na 
	pinatay samantalang inihahatid ng guardia sibil. At nakikita niya ang mga 
	taling gumitgit sa laman, nakikita ang dugong lumalabas sa bibig at 
	nadidinig na sinasabi sa kanya ni Basilio, na: 'Iligtas mo ako, iligtas mo 
	ako! ikaw lamang ang tanging makapagliligtas sa akin!' </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mag-uumugong 
	pagkatapos ang isang halakhak, ililingon ang mga mata at makikita ang 
	kanyang ama, na tinititigan siya ng isang titig na lipos paghihinanakit. At 
	si Huli ay magigising, tatagilid sa ibabaw ng kanyang banig, hihimasin ng 
	kamay ang noo upang tungkusin ang buhok: malamig na pawis, gaya ng 
	pagpapawis kung mamamatay, ang nakababasa sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ina, ina!--ang 
	taghoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At samantala'y 
	ang mga nakapagpapasiya ng buong katuwaan sa mga sasapitin ng mga bayan, ang 
	nakapag-uutos ng makatwirang pagpatay, ang sumisira ng katwiran at ginagamit 
	ang karapatan upang magpatibay sa lakas, ay mapayapang nangahihimbing.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa 
	kahulihulihan, ay dumating ang isang manglalakbay na taga Maynila at 
	nagsalaysay nang kung papano nakawala ang lahat ng bilanggo, lahat, maliban 
	si Basilio na walang mag-ampon. Nababalita sa Maynila, ang dagdag ng 
	manglalakbay, na ang binata ay mapapatapon sa Carolinas, at pinalagdaan na 
	muna sa kanya ang isang kahilingan na kinatatalaan na gayon ang hiling 
	niyang kusa. Nakita ng manglalakbay ang bapor na magdadala sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang balitang 
	iyon ay tumapos sa mga pagaalinlangan ng dalaga na sadya namang gulo na ang 
	pag-iisip dahil sa karamihan ng gabing ipinagpuyat at sa kanyang mga 
	kakilakilabot na mga pangangarap. Maputla't ang mata'y susuling suling, ay 
	hinanap si hermana&nbsp;Bali at ang boses ay nakatatakot ng sinabing siya'y 
	nalalaan na at itinatanong kung ibig siyang samahan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Natuwa si 
	hermana Bali at siya'y pinayapa, ngunit si Huli ay hindi nakikingig at 
	waring nagmamadali upang makarating sa kombento. Siya'y nag-ayos, isinuot 
	ang kanyang pinakamabuting gayak at wari pa manding siya'y may malaking 
	hangad. Nagsasasalita kahit walang linaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lumakad sila. 
	Si Huli ay nauuna at naiinip sapagka't ang kasama'y nahuhuli. Datapwa'y 
	samantalang nangalalapit sa bayan, ay unti-unti siyang nanghihina, 
	nagwawalang imik, nag-aalinlangan, napapahina ang hakbang, at pagkatapos ay 
	napapahuli. Kailangan ang paliksihin pa siya ni hermana&nbsp;Bali.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gagabihin 
	tayo!--ang sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Huli ay 
	patuloy na namumutla, ang tingiy sa ibaba at hindi makapangahas na itaas 
	ang mata. Ang akala niya'y siya ang tinitingnan ng lahat ng tao at siya ang 
	itinuturo. Isang pangalang mahalay ang humihiging sa kanyang tainga, ngunit 
	nagbibingibingihan at nagpapatuloy ng lakad. Gayon man, nang makita ang 
	kombento, ay huminto at <span class="locked">nanginig na.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bumalik na 
	tayo sa nayon, bumalik na tayo!--ang samo na pinigil ang kanyang kasama.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinailangan ni 
	hermana Bali ang hawakan siya sa bisig at halos binatak, na pinamamayapa at 
	pinagsasabihan siya ng ukol sa mga aklat ng mga prayle. Hindi siya 
	pababayaan, walang dapat ikatakot; si Padre Camorra ay may ibang 
	bagay sa ulo; si Huli ay isang tagabukid lamang....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y nang 
	dumating sa pintuan ng kombento o bahay pari ay nagmatigas na si Huli sa 
	pag-ayaw na umakyat at nangunyapit sa pader.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, 
	huwag!--ang samong lipos sindak;--O, huwag; mahabag kayo!......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	napakahangal......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Itinutulak 
	siyang marahan ni hermana Bali; si Huli ay ayaw pumayag, namumutla, na ang 
	mukha'y nakahahambal. Ipinahayag ng kanyang paningin na nakikitang kaharap 
	niya ang kamatayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, bumalik 
	tayo kung ayaw ka!--ang bulalas na tuloy na masama ang loob ng mabait na 
	babae, na hindi naniniwala sa anumang sakunang tunay na mangyayari. Kahit 
	na may masamang kabantugan si Padre Camorra ay hindi mangangahas 
	sa harap niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Madala na sa 
	tatapunan ang kaawaawang si Don Basilio, barilin siya sa daan at 
	sabihing nagtangkang tumakas!--ang dagdag;--pag patay na ay saka magsisisi. Sa 
	ganang akin, ako'y walang anumang utang na loob sa kanya. Sa akin ay walang 
	isusumbat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yaon ang 
	bayong nakapagpanibulos. Sa harap ng gayong sumbat, may halong galit, handa 
	sa lahat, gaya ng isang magpapatiwakal, ay ipinikit ni Huli ang kanyang mga 
	mata, upang huwag matanaw ang banging tatalunan, at tuloytuloy na pumasok sa 
	kombento. Isang buntong-hininga na waring hingalo ang namulas sa kanyang mga 
	labi. Sinundan siya at pinagbibilinan ni hermana&nbsp;Bali.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinagabihan ay marahang pinag-uusap-usapan ang nangyari ng hapong iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa durungawan 
	ng kombento ay tumalon ang isang dalaga na bumagsak sa mga bato at namatay. 
	Halos kasabay noon, isa pang babae ang lumabas na nagsisigaw at nagtititili 
	sa mga lansangan na wariy baliw. Ang mga maingat na mamamayan ay hindi 
	makapangahas na bumanggit ng mga pangalan at maraming ina ang kumurot sa 
	kanilang mga anak na babae dahil sa pagkakabigkas ng mga salitang 
	makapagbibigay ligalig sa kanila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Makaraan yaon, ngunit malaon ng nakaraan, 
	ng nagtatakipsilim, ay isang matandang lalaki ang nanggaling sa nayon at 
	tumawag ng malaon sa pintuan ng kombento na nakasara at binabantayan ng mga 
	sakristan. Ang matanda'y tumatawag sa pamagitan ng suntok, ng ulo, 
	bumibigwas ng mga timping sigaw, na walang linaw, na gaya ng sa isang pipi, 
	hanggang sa napalayas doon sa pamagitan ng palo at katutulak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang mangyari 
	ang gayon ay tumungo sa bahay ng kapitan sa bayan, ngunit sinabi sa kanya 
	roon na wala ang kapitan, na nasa kombento; tumungo sa Hukom pamayapa, 
	ngunit ang Hukom pamayapa ay wala rin, ipinatawag sa kombento; tinungo ang
	<i xml:lang="es" lang="es">teniente mayor</i>, gayon din, nasa kombento; 
	tumungo sa kuartel, ang teniente ng guardia sibil ay nasa kombento.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa gayon ay bumalik sa kanyang nayon ang matanda na umiiyak na parang isang 
	bata: ang kanyang ungal ay nadidinig sa gitna ng katahimikan ng gabi; ang 
	mga lalakiy nangapapakagatlabi, ang mga babae'y nangagdadaop-kamay, at ang 
	mga aso ay pumapasok sa kanikanilang bahay, mga takot, at ipit ng dalawang 
	hita ang buntot!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A,&nbsp; Diyos , a,&nbsp; Diyos !--anang isang abang babae na nangangalirang dahil sa kakokolasion;--sa 
	harap mo ay walang mayaman, walang mahirap, walang maputi, walang maitim.... 
	ikaw ang hahatol sa amin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo,--ang sagot 
	ng asawa,--kailan ma't ang&nbsp; Diyos&nbsp; na iyang kanilang iniaaral ay hindi tunay na 
	gawagawa lamang, isang daya! Sila na ang una unang hindi naniniwala doon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang ikawalo 
	ng gabi, ay sinasabing mahigit sa pitong prayle, na galing sa mga bayang 
	kalapit, ang nangasa sa kombento at nagpupulong. Nang kinabukasan ay nawala 
	nang patuluyan sa nayon si Tandang Selo na dala ang kanyang tandos sa 
	pangungusa.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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
																	<a href="../noli/t-noli-toc.php">
																	<font color="#800080">
																	<a href="t-fili-toc.php">Bumalik sa 
																	Nilalaman ng 
																	El 
																	Filibusterismo</a></font></a></font></p>
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