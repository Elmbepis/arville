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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">VI. Si Basilio</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang ang mga 
	kampana'y nagrerepike na, dahil sa misa sa hating gabi, at nang ang mga may 
	ibig pa sa mahimbing na pagtulog kay sa mga kapistahan ay nagigising at 
	bumubulong bulong dahil sa kaingayan, ay dahandahang pumanaog si Basilio at 
	nagpaligid ng makalawa o makaitlo sa ilang lansangan, at nang matunayang 
	walang sumusunod at nakababatyag sa kanya ay nagliglig sa mga landas na di 
	pinagdaraanan ng maraming tao at tinungo ang dating gubatan ng mga Ibarra, 
	na nabili ni Kapitan&nbsp;Tiago, nang inangking at ipinagbili ng Pamahalaan ang 
	mga pag-aari noon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang 
	ang Pasko ng Panganganak sa taong yaon ay natama sa pagliit ng buwan ay 
	laganap doon ang kadiliman. Ang pagrerepike ay huminto at ang mga tugtog na 
	lamang ang nadidinig sa katahimikan ng gabi, sa gitna ng lagaslas ng mga 
	dahong pinagagalaw ng simuy at mga dagundong ng alon ng kalapit na lawa, na 
	wariy hilik ng kadalagahang nalululong sa isang mahimbing na pagtulog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binata ay 
	patungong lumalakad na waring ibig makaaninag sa gitna ng kadiliman, may 
	guniguni siyang taglay dahil sa pook at mga sandaling iyon. Maminsanminsa'y 
	itinataas ang ulo upang tanawin ang mga bituwin sa pag-itan ng mga dahong 
	matataas ng kakahuyan, at pagkatapos ay ipinagpapatuloy ang lakad na 
	hinahawi ang mga sanga at siit na nakasasagabal sa kanya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kung minsan ay 
	bumabalik sa pinanggalingan, ang kanyang mga paa'y nasasalabid sa isang 
	punong maliit, masasagasa sa isang ugat na nakalabas sa lupa o sa isang 
	sangang bakli. Nang makaraan ang kalahating oras ay nakarating sa isang 
	munting batis na sa kabilang pampang ay may isang wari bundokbundukan, na 
	sa gitna ng kadiliman ay nagaanyong malaking bundok. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tinawid ni Basilio ang 
	sapa sa tulong ng pagpapalungdaglundag sa mga bato na namumukod sa kaitiman 
	sa ibabaw ng kinang ng tubig, umakyat sa bundokbundukan at tinungo ang isang 
	munting pook na nakukulong ng matanda't sirasirang muog. Tinungo ang puno ng 
	baliting malaki, mahiwaga, matanda, (na binubuo halos ng mga ugat na pataas 
	at paibaba na wari mga sangang nangagkasalasalabid) na nakatayo sa 
	kalagitnaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Huminto sa 
	piling ng isang bunton ng bato, nag-alis ng sombrero at waring nanalangin. 
	Yaon ang libingan ng kanyang Ina, at ang unang dinadalaw niya ay ang 
	libingang iyong walang nakababatid, walang nakamamalay. Sa dahilang sa 
	kinabukasan ay dadalaw sa mag-aanak ni Kabesang Tales, ay sinamantala niya 
	ang gabing yaon upang gumanap sa gayong kautangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naupo sa isang 
	bato at waring nag-iisip. Sumipot sa kanyang pagbubulaybulay ang mga 
	panahong nakaraan na waring isang maitim at mahabang badha na mapulapula sa 
	simula, matapos ay nakapangingilabot, may bahid na dugo, at sa huliy 
	maitim, maitim, abuhing malinaw at unti-unting lumiliwanag. Ang dakong dulo 
	ay hindi mamalas sapagka't nakakanlong sa isang ulap na nagbabanaag ng 
	liwanag at pagbubukang liwayway......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May labing 
	tatlong taon nang ganap na ganap na namatay doon ang kanyang ina, sa gitna 
	ng karalitaan, nang isang magandang gabi na ang buwan ay maliwanag at ang 
	mga kristiano sa buong mundo ay naggagalak. Sugatin at pipilay-pilay siyang 
	nakarating doon sa pagsunod sa kanyang ina, at ito naman ay baliw at lipus 
	katakutang lumalayo na wariy anino sa kanyang anak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Doon namatay; dumating 
	ang isang taong hindi niya kilala at ipinag-utos sa kanyang magbunton ng 
	kahoy, bigla siyang umalinsunod at ng siya'y bumalik ay isa pang hindi rin 
	kilala ang natagpuan sa piling ng bangkay ng una. Anong araw at gabi iyon! 
	Tinulungan siya noong taong hindi kilala sa pagbubunton ng kahoy na 
	pinagsunugan sa bangkay ng lalaki, hinukay ang pinagbaunan sa kanyang ina at 
	matapos abutan siya ng kaunting kuwalta ay ipinag-utos sa kanyang umalis sa 
	pook na iyon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Noon lamang niya nakita ang lalaking iyon; matangkad, mapupula 
	ang mata, mapuputla ang labi, matangos ang ilong....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ulila ng 
	lubos, walang magulang at kapatid, ay iniwan niya ang bayang iyon na 
	mayroong mga may kapangyarihang kinasisindakan niya at tumungo sa Maynila 
	upang pumasok na alila sa isang mayaman at mag-aral, na gaya ng ginagawa ng 
	ilan. Ang kanyang paglalakbay ay isang paglalagalag, puno ng pagpupuyat at 
	pag-aagam-agam, na ang gutom ay inaalintana. Ang ipinangtatawid kagutuman 
	niya ay mga bungang kahoy ng mga kagubatang kanyang pinagtataguan kailan 
	ma't nakakatanaw ng suot guardia sibil, kasuotang nakapagpapaalaala ng 
	pinagbuhatan ng kanyang mga kasawian. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang nasa sa Maynila na siya, 
	gulagulanit ang damit at may sakit pa ay dumulog sa mga bahaybahay at 
	pumapasok na alila. Isang batang taga lalawigan na hindi marunong ng ano 
	mang wikang kastila at masasaktin pa! Walang pag-asa, dayukdok at hapis na 
	gumalagala sa mga lansangan na napupuna ng mga tao dahil sa ayos na 
	karumaldumal ng kanyang damit! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Makailang tinangka ang payurak na sa mga 
	kabayo, na nangagdaraang parang kidlat na hila ang mga sasakyang 
	nagkikinangan sa pilak at barnis, upang matapos na ang kanyang mga 
	paghihirap! Salamat at nakitang nagdaan si Kapitan&nbsp;Tiago na kasama si 
	tia&nbsp;Isabel; kilala niya ang mga taong iyon mula sa San&nbsp;Diego at sa kanyang 
	kagalakan ay inakalang wari mga kababayan niyang mistula. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sinundan ang 
											karwahe, nawala sa kanyang paningin, ipinagtanong ang bahay, at sa dahilang 
	noong araw na iyon pumasok si Maria&nbsp;Clara sa kombento at si 
	Kapitan&nbsp;Tiago 
	ay nalulungkot, ay natanggap siyang alila, na walang upa, ngunit sa isang 
	dako naman ay may pahintulot siyang makapag-aral, kung kailan niya ibig, sa
	<span xml:lang="es" lang="es">San&nbsp;Juan de Letran</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Nang may ilang buwan na siya sa Maynila ay pumasok sa '<span xml:lang="es" lang="es">primer 
	a&ntilde;o</span>' sa latin, kahit nanglilimahid, masama ang bihis at nakabakya. 
	Nang makita ng mga kasamahan ang kanyang gayak ay lumayo sa kanya, at hindi 
	siya kinatungo kailan man ng katedratiko, isang dominikong magandang lalaki, 
	subali pa nga't ikinukunot ang noo kung siya'y makita. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga tanging 
	salita na nagamit ng dalawa sa loob ng walong buwang pasukan ay ang 
	pagbanggit ng pangalan sa pagbasa ng talaan at ang sagot na
	<i xml:lang="la" lang="la">adsum</i> na itinutugon sa araw-araw ng 
	nag-aaral. Gaanong kapaitan ang linalagok niya sa tuwing paglabas sa klase 
	at ng mahulaan ang sanhi ng inaasal sa kanya ay gaanong luha ang namulas sa 
	kanyang mga mata at gaanong hinanakit at daing ang sumisilakbo't iniinis sa 
	kanyang puso! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Gayon na lamang ang kanyang iyak at paghihinagpis sa ibabaw ng 
	libingan ng kanyang ina na pinagsasabihan ng mga lihim niyang sakit, 
	kahihiyan at kaapihan, ng siya'y ipagsama ni Kapitan&nbsp;Tiago sa San&nbsp;Diego ng 
	magpapasko! Gayon man ay isinasaulo niyang buongbuo ang lisyon kahit marami 
	ang hindi niya natatarok! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ngunit tumiwasay siya sa huli, ng makitang sa 
	tatlo o apat na raang kasama niya ay may apat na pu lamang ang natatanong 
	sapagka't napuna sila ng paring nagtuturo dahil sa kiyas, o kaya'y dahil sa 
	isang kalikutan, o kaya'y dahil sa kinalugdan, o kaya'y dahil sa iba pang 
	sanhi. Sa isang dako naman ay nagagalak sa gayon ang marami sa nag-aaral 
	sapagka't hindi na sila mag-iisip at magninilay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pumapasok sa
	<i xml:lang="es" lang="es">colegio</i> hindi upang mag-aral kun di upang 
	makaraan sa paglilitis, at kung naaaring maisaulo ang aklat ano pa ang 
	mahihingi? naaaring tapusin din naman ang pinag-aaralan sa sangtaong 
	pagpasok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si Basilio ay nakaraan sa paglilitis dahil sa pagsagot sa tanging 
	katanungang ginawa sa kanya, ngunit parang makina, walang hinto't walang 
	kahingahinga, at ang tinamo ay '<span xml:lang="es" lang="es">aprobado</span>' sa gitna ng 
	tawanan ng mga lumilitis. Ang kanyang siyam na kasama (sampusampu kung 
	litisin upang matapos agad) ay hindi nagtamo ng gayon, kaya't nangatakdaang 
	ulitin ang sangtaon pagkadungo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang siya'y 
	nasa pangalawang taon ay binigyan siya ng mabuting pabuya ni Kapitan&nbsp;Tiago, 
	sapagka't nanalo ang manok niyang inaalagaan, at ibinili niya agad ng 
	sapatos at sombrerong pieltro. Dahil sa kanyang binili at sa mga damit na 
	ibinigay sa kanya ng kanyang panginoon, na tinatabas niyang muli at 
	isinusukat sa sariling katawan, ay bumutibuti ang kanyang ayos, ngunit 
	hanggang doon na lamang naman. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang <i xml:lang="es" lang="es">clase</i> 
	na marami ang pumapasok ay lubhang mahirap na mapuna ng guro ang isang bata, 
	at ang nag-aaral na sa una pang taon ay hindi napatampok dahil sa katangian 
	o kaya'y hindi kinalugdan ng nagtuturo ay mahirap nang mapuna sa buo niyang 
	pag-aaral. Gayon man ay nagpatuloy din siya, dahil sa isa na sa kanyang 
	hilig ang pagkamatiyaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Waring nagbago 
	ng kaunti ang kanyang kalagayan ng pumasok sa pangatlong taon. Ang naging 
	guro niya ay isang dominikong masaya, palabiro at mapagpatawa sa mga 
	tinuturuan, napakatamad, sapagka't karaniwang ang pinapagsasalaysay ng 
	katuturan ng lisyon ay ang kanyang mga itinatangi lamang; kung sa bagay ay 
	nasisiyahan na sa kahit ano. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang panahong iyon ay gumagamit na si Basilio 
	ng sapatos at mga barong malinis at pinirinsa. Sa dahilang napuna ng 
	propesor na hindi siya matatawanin at namatyagan sa kanyang mga matang hapis 
	at malalaki ang tila pagtatanong, ay ipinalagay siyang baliw at isang araw 
	ay tinangkang gipitin siya sa pagtatanong ng lisyon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sinagot ni Basilio ng 
	mula sa puno hanggang dulo na walang kagatol-gatol sa isa mang f; tinawag 
	siyang bubutok ng guro, nagsalaysay ng isang bagay na ikinatawa ng buong 
	klase, at upang maglalo ang halakhakan at matibayan ang pagkakapangalan ay 
	tinanong pa siya ng ilang tanong na kasabay ang pagkindat sa mga minamabuti, 
	na ang ibig <span class="locked">sabihin ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--'Tingnan ninyo't masasayahan tayo.'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Noon ay 
	marunong na ng wikang kastila si Basilio at nakasagot nang walang nakatawa. 
	Ang bagay na iyon ay isinama ng loob ng lahat, ang inaantay na kamalian ay 
	hindi sumipot, walang napatawa at ang pangyayaring iyon ay hindi naipatawad 
	sa kanya ng mabuting praile, sapagka't sinira ang pag-asa ng buong klase at 
	pinabulaanan ang hula. Ngunit sino ang makahihinala na lalabas ang anumang 
	bagay na may kabuluhan sa isang ulong ang buhok ay walang ayos na nagtatapos 
	sa katawan ng isang indio na masama ang sapatos at kahahalo pa lamang sa 
	kanya sa mga ibong mapangunyapit? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At kung sa ibang paaralan, na may sadyang 
	pagnanasang ang mga bata'y matuto, ay nagagalak ang mga nagtuturo kung 
	nakakatagpo ng gayon, sa mga paaralan namang pinamamahalaan ng mga taong ang 
	lalong maramiy nananalig na ang matuto ay makasasama (kun di man sa lahat 
	ay sa mga nag-aaral) ang nangyari kay Basilio ay hindi minabuti, kaya't 
	hindi na siya natanong sa buong taon. Sa ano pa't tatanungin siyang muli 
	kung hindi rin makapagpapatawa sa kangino man?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Masama ang 
	loob at may tangka nang iwan ang pag-aaral ng nalipat siya sa ika apat na 
	taon sa latin. Ano pa't mag-aaral, bakit hindi magtulog na lamang na gaya ng 
	iba at umasa na sa isang pagpapasumala?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang isa sa mga guro ay lubhang kilala, naiibigan ng lahat; kinikilalang 
	marunong, dakilang makata at may mga pagkukurong malaya. Isang araw na 
	kasama ng mga '<i xml:lang="es" lang="es">colegial</i>' sa paglilibot ay 
	nakagalit ng ilang '<i xml:lang="es" lang="es">cadete</i>', 
	na, naging sanhi muna ng simulang pag-aaway at pagkatapos ay paghahamunan. 
	Ang pari, na marahil ay naalaala ang kanyang mabuting kabataan, ay nangayag 
	at nangakong bibigyan ng mabuting <i xml:lang="es" lang="es">nota</i> ang 
	sinomang makilahok sa pakikilaban sa linggong darating. Naging masigla ang 
	buong linggong yaon: nagkaroon ng pulupulutong na paglalabang ginamitan ng 
	sable at tungkod at sa isa'y napatangi si Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dinala siyang 
	galak na galak ng mga nag-aaral at iniharap sa propesor; mula niyon ay 
	nakilala siya at kinagiliwan. Dahil sa pangyayaring ito at dahil din naman 
	sa kanyang pagsusumigasig sa pag-aaral ay nagtamo siya ng mga
	<i xml:lang="es" lang="es">sobresaliente</i> at <i xml:lang="es" lang="es">
	medalla</i> pa ng taong iyon. Sa nakitang ito, si Kapitan&nbsp;Tiago, na mula 
	nang magmonha ang anak ay may pagkamuhi na sa mga praile, sa isang sandaling 
	masaya, ay inudyukan siyang lumipat sa <span xml:lang="es" lang="es">Ateneo 
	Municipal</span>, na noon ay lubhang nababantog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Isang bagong mundo ang nahayag sa kanyang mga mata, isang paraan sa 
	pag-aaral na hindi man niya nahinala na makikita sa paaralang iyon. Liban sa 
	ilang bagay na walang malaking kabuluhan at ilang bagay na walang 
	kapararakan ay hinangaan ang patakarang sinusunod doon sa pagtuturo at lubos 
	ang kanyang pagkilala ng utang na loob sa pagsusumakit ng mga guro. 
	Napapaluha siya kung minsan at naaalaala ang apat na taong nakaraan na dahil 
	sa kakulangan sa magugugol ay hindi siya nakapasok doon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kinailangan niyang 
	gamitin ang lahat ng pagsusumikap upang mapantayan ang nangagkaroon ng 
	mabuting pasimula at nasabi niya sa sarili na nang taon lamang na iyon 
	napagaralan niya ang limang taon ng '<span xml:lang="es" lang="es">segunda ense&ntilde;anza</span>'. 
	Dinaan ang <i xml:lang="es" lang="es">bachillerato</i> sa gitna ng kagalakan 
	ng kanyang mga propesor at sa paglilitis ay ipinagmalaki siya sa harap ng 
	mga hahatol na dominiko na pinaparoon upang makibatyag. Upang mapawi ng 
	bahagya ang kagalakan ay tinanong ang nililitis kung saan nag-aral ng mga 
	unang taon sa latin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa
	<span xml:lang="es" lang="es">San Juan de Letran</span>, Padre--ang sagot ni 
	Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah! Sa latin 
	ay mabuti--ang nakangiting sabi ng dominiko.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa 
	kanyang hilig at ugali ay pinili ang <span xml:lang="es" lang="es">Medicina</span>; 
	ibig sana ni Kapitan&nbsp;Tiago ang <span xml:lang="es" lang="es">Derecho</span> 
	upang magkaroon ng abogadong walang bayad, ngunit hindi ang dumunong at 
	makabatid ng mga kautusan ang kailangan lamang upang magkaroon ng 
	ipagtatanggol sa Pilipinas: kailangang magpanalo ng mga usapin at upang 
	ito'y mangyari ay kailangang magkaroon ng maraming kakilala, lakas sa itaas, 
	maraming salitang pasalisalimuut. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Napahinuhod din si Kapitan&nbsp;Tiago 
	sapagka't naalaalang ang mga nag-aaral ng <span xml:lang="es" lang="es">
	Medicina</span> ay naglalamutak ng patay; malaon nang humahanap siya ng 
	isang lason na ipangsusubo sa tari ng kanyang mga manok at ang 
	pinakamabuting nalalaman niya ay ang dugo ng isang intsik na namatay dahil 
	sa sakit na sipilis.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Gaya rin ng dating pagsusumigasig, o higit pa kung mangyayari, dinaan ng 
	binata ang mga taong pag-aaral ng '<span xml:lang="es" lang="es">facultad</span>', at mula 
	pa sa ikatlong taon ay nanggamot na siya, na pinalad naman, bagay na hindi 
	lamang pagsisimula ng isang magandang haharapin kundi nagbibigay din naman 
	sa kanya ng sapat na gugugulin upang makapagbihis ng mainam-inam at 
	makapag-ipon pa ng kaunti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang taong ito'y siyang huling taon ng kanyang pag-aaral at sa loob ng 
	dalawang buwan na lamang ay '<span xml:lang="es" lang="es">medico</span>' na 
	siya, uuwi na sa kanyang bayan, pakakasal kay Juliana at mamumuhay silang 
	maligaya. Ang pagtatamo niya ng '<i xml:lang="es" lang="es">licenciatura</i>' 
	ay hindi lamang tiwasay niyang inaantay kun di inaasahan pa niyang magiging 
	maningning na pinakaputong ng kanyang kabuhayan sa pag-aaral. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Siya ang 
	natakdaang bibigkas ng talumpating pagpapasalamat sa pagsusuot ng '<span xml:lang="es" lang="es">muceta</span>', 
	at nakikinikinita na niyang siya'y nasa gitna ng
	<span xml:lang="es" lang="es">Paraninfo</span>, sa harap ng lahat ng 
	nangagtuturo, at siya ang pinagtitinginanan at pinakikinggan ng madla. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lahat 
	ng ulong iyon na bantog sa karunungan sa Maynila na nangakalubog halos sa 
	kanilang mga <span xml:lang="es" lang="es">muceta</span> na iba't ibang 
	kulay, ang lahat ng babaeng dumalo dahil sa hangad na makapanood lamang, na 
	noong mga taong nakaraan ay hindi man siya napuna, kundi man natingnan siya 
	na may pagwawalang bahala, ang lahat ng kaginoohang iyon na noong siya'y 
	bata ay kaunti ng pagulungan siya sa karwaheng sinasakyan sa gitna ng 
	lusakan na wari aso lamang, sa mga sandaling iyon ay siya ang pakikinggan, 
	at ang mga tuturan naman niya ay mga maiinam na bagay, yaong hindi pa 
	nadidinig sa pook na iyon.</font><p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lilimutin ang sarili upang alalahanin ang mga 
	kaawaawang mag-aaral sa haharapin, at siya'y papasok sa sosyedad sa 
	pamagitan ng talumpating yaon.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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