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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XIX. Ang Lambal</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Umalis sa 
	klase si Placido Penitente na ang puso'y sumusulak at ang mga paningin ay 
	may mapait na luha. Siya'y lubhang karapatdapat sa kanyang pangalan kapag 
	hindi siya pinagagalit, ngunit pag namuhi ay nagiging baha, isang halimaw 
	na mapipigil lamang kung mapatay o makamatay. Ang gayon karaming paghalay, 
	mga pagsundot, na sa araw araw ay nagpapanginig sa kanyang puso at natatago 
	rito upang makatulog ng tulog dahong-palay na nahihimbing, ay nangagbabangon 
	ngayon na nangagngangalit sa poot. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga sutsot ay umuugong sa kanyang 
	tainga na kasama ang mga palibak na salita ng katedratiko, ang mga salitang 
	wikang tinda, at waring nadidinig niya ang mga hampas at halakhak. Libo 
	libong balak na paghihiganti ang sumisipot sa kanyang pag-iisip na 
	nangagkakasalasalabid at biglang lumilipas na wariy mga larawang nakikita 
	sa pangangarap. Inuudyukan siyang walang humpay na dapat gumawa, ng kanyang 
	sariling damdamin, na taglay ang katigasang ulo ng isang walang pag-asa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Placido 
	Penitente--anang boses--ipakilala mo sa lahat ng kabataang iyan na mayroon 
	kang karangalan, na ikaw ay anak ng isang lalawigang matapang at bayani, na 
	doon ang isang paghalay ay hinuhugasan ng dugo. Taga Batangan ka, Placido 
	Penitente! Gumanti ka, Placido Penitente!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ang 
	binata'y umuungol at nagngangalit ang mga ngipin at binubunggo ang lahat ng 
	tao sa lansangan, sa tulay ng Espa&ntilde;a, na wariy naghahanap ng basagulo. Sa 
	huling pook na ito'y nakakita ng isang sasakyang kinalululanan ng 
	Vice-Rector na si Padre Sibyla, na kasama si Don Custodio, 
	at nagtaglay siya ng malaking nasang sunggaban ang pari at ihagis sa ilog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagpatuloy sa 
	Escolta at ngalingali nang pagsususuntukin ang dalawang agustino, na 
	nangakaupo sa pintuan ng tindahan ni Quiroga, na nagtatawanan at binibiro 
	ang iba pang prayle na nasa loob ng tinda at nakikipag-usap; nadidinig ang 
	kanilang masasayang boses at matutunog na halakhakan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa dakong malayo-layo 
	ay nangakahalang sa bangketa ang dalawang <i xml:lang="es" lang="es">cadete</i> 
	na nakikipag-usap sa isang kawani ng isang tindahan, na nakabaro't walang 
	amerikana; tinungo sila ni Placido Penitente upang buksan ang daan, ngunit 
	ang mga <i xml:lang="es" lang="es">cadete</i> na masasaya at nakahalata sa 
	masamang tangka ng binata ay nangagsilayo. Nang mga sandaling yaon ay taglay 
	ni Placido ang udyok ng <em>hamok</em> na sinasabi ng mga sumusuri ng 
	ugaling malayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantalang 
	nalalapit si Placido sa kanyang bahay--ang bahay ng isang platero na kanyang 
	pinangungupahan--ay pinipilit na iayos ang kanyang mga iniisip at niyayari 
	ang isang balak. Umuwi sa kanyang bayan at maghiganti upang ipakilala sa mga 
	prayle na hindi naaalimura ng gayongayon lamang ang isang binata, at ang 
	gaya niya'y hindi maaring aglahiin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Iniisip na sumulat agad sa kanyang ina, 
	kay kabisang&nbsp;Andang, upang ipabatid dito ang nangyari at sabihing hindi na 
	siya makapapasok sa klase, at kahit may Ateneo ng mga hesuita upang 
	makapag-aral ng taong yaon, marahil ay hindi siya bigyang pahintulot na 
	makalipat ng mga dominiko at kahit na maari ang gayon ay mababalik din siya 
	sa Universidad sa taong susunod na pag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabing 
	hindi kami marunong maghiganti!--ang sabi--pumutok ang lintik at saka 
	makikita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit hindi 
	hinihinala ni Placido ang nag-aantay sa kanya sa bahay ng platero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kararating pa 
	lamang ni kabisang Andang na galing sa Batangan at lumuwas upang mamili, 
	dumalaw sa kanyang anak at dalhan ng kuwalta, pindang na usa at mga panyong 
	sutla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Nang makaraan ang mga unang batian, ang kahabag habag na babaeng sa simula 
	pa'y napuna na ang mabalasik na tingin ng kanyang anak, ay hindi na 
	nakapagpigil at nagsimula na sa katatanong. Sa mga unang pagsasalita'y 
	inaring biro ni kabisang&nbsp;Andang, ngumitit pinagpapayuhan ang kanyang anak, 
	at ipinaalaala dito ang mga paghihirap, ang mga pagtitipid at <abbr>iba </abbr>
	pa, at 
	binanggit ang anak ni kapitang&nbsp;Simona, na dahil sa pagkakapasok sa 
	Seminario, ay waring obispo na kung lumakad sa kanilang bayan: Ipinalalagay 
	na ni kapitang&nbsp;Simona na siya'y Ina ng&nbsp; Diyos ; mangyari baga'y magiging isa 
	pang Jesucristo ang kanyang anak!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag naging 
	pari ang anak--ang sabi ni kabisang&nbsp;Andang--ay hindi na pagbabayaran ang utang 
	sa atin.... sino pa ang makasisingil sa kanya pag nagkagayon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit nang 
	makitang tinototoo ni Placido ang pagsasalita at napansin sa mata nito ang 
	sigwang bumabayo sa kalooban, ay nakilalang, dala ng kasawian, ay sadyang 
	tunay ang sinasabi. Mga ilang sandaling hindi nakapangusap at pagkatapos ay 
	naghinagpis ng katakot-takot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay!--aniya--at 
	naipangako ko pa naman sa ama mo na aarugain kita, patuturuan at gagawing 
	abogado! Tinitipid ko ang lahat upang makapag-aral ka lamang! Sa panggingeng 
	sikosikolo na lamang ako napaparoon at hindi sa manamanalapi, at tinitiis ko 
	na ang masasamang amoy at maruruming baraha! Tingnan mo ang mga baro ko't 
	may sulsi! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kahit makabibili ako ng mga bago ay ginugugol ang kuwalta sa mga 
	pamisa at mga handog kay San&nbsp;Sebastian, kahit na wala akong pananalig sa 
	kanilang bisa, sapagka't dinadalosdalos ng pari at ang santo ay bagong bago 
	at hindi pa marunong gumawa ng kababalaghan, at hindi batikuling kundi 
	laniti.... Ay! Ano ang sasabihin sa akin ng ama mo pagkamatay ko't kamiy 
	magkita?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ang 
	kaawaawang babae'y naghihinagpis at umiiyak; lalo pang nagdidilim ang 
	kalooban ni Placido at namumulas sa kanyang dibdib ang mga timping 
	buntong-hininga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	mahihita ko kung maging abogado?--ang tugon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	sasapitin mo?--ang patuloy ng ina na pinagduop ang kamay--panganganlan kang
	<i xml:lang="es" lang="es">pilibistiero</i> at bibitayin ka! Sinasabi ko na 
	sa iyong magtitiis ka, ikaw ay magpapakumbaba! Hindi ko sinasabi sa iyong 
	humalik ka sa kamay ng pari, alam kong ang pangamoy mo'y maselan na gaya ng 
	ama mo na hindi makakain ng keso sa Europa.... ngunit dapat tayong magtiis, 
	huwag umimik, pa oo sa lahat ng bagay.... Ano ang magagawa natin? Ang mga 
	prayle ay mayroon ng lahat ng bagay; kung ayaw sila ay walang magiging 
	abogado, ni mediko.... Magtiis ka, anak ko, <span class="locked">magtiis ka!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa, 
	nakapagtiis na akong lubha, inang; buwanang ako'y nagbata!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Patuloy si 
	kabisang Andang sa kanyang paghihinagpis. Hindi niya hinihinging kumampi sa 
	mga prayle, siya man ay hindi rin; lubos niyang batid na sa bawa't isang 
	mabuti ay may sampung masama na kumukuha ng salapi ng mahihirap at 
	nagpapadala sa mayayaman sa tatapunan. Ngunit dapat na huwag kumibo, 
	magtiis at magbata; walang ibang paraan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At binanggit ang ganoon at ganitong 
	ginoo na dahil sa nagpakita ng pagka <i xml:lang="es" lang="es">paciencioso</i> 
	at mapakumbaba, kahit na sa kaibuturan ng puso'y nagagalit sa kanyang mga 
	panginoon, ay naging promotor piskal gayong galing sa pagiging alila ng 
	prayle; at si gayon na ngayo'y mayaman at mangyayaring makagawa ng mga 
	kabangisang asal na makaaasang may ninong na mag-aampon sa kanya ng laban sa 
	mga kautusan ay galing sa pagiging isang maralitang sakristang mapakumbaba't 
	masunurin, na nagasawa sa isang magandang dalaga na ang naging anak ay 
	inanak ng kura....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Patuloy si 
	kabisang Andang ng pagtutukoy sa mga pilipinong mapakumbaba at
	<i xml:lang="es" lang="es">paciencioso</i>, gaya ng sabi niya, at babanggit 
	pa sana ng iba na dahil sa hindi gayon ay nangapatapon at pinag-uusig, nang 
	si Placido, dahil sa isang munting bagay na dinahilan, ay umalis at 
	naglagalag sa mga lansangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Linibot na 
	tatanga-tanga at masama ang ulo ang Sibakong, Tundo, San&nbsp;Nicolas, <abbr>Sto.</abbr>&nbsp;Cristo, 
	na hindi pinupuna ang araw at ang oras, at nang makaramdam lamang ng gutom 
	at naunawang wala siyang kuwalta dahil sa ibinigay niyang lahat sa mga 
	pistahan at mga ambagan, ay saka umuwi sa kanyang bahay. Hindi niya inaantay 
	na matatagpuan ang kanyang ina, sapagka't may ugali ito, kailan ma't 
	lumuluwas sa Maynila, na tumungo sa mga oras na iyon sa isang kapit-bahay na 
	pinagsusugalan ng pangginge. Ngunit siya'y inaantay ni kabisang&nbsp;Andang 
	upang pagsabihan ng binalak: ang matandang babae'y patutulong sa
	<i xml:lang="es" lang="es">procurador</i> ng mga agustino upang mapawi ang 
	pagkamuhi ng mga dominiko sa kanyang anak. Pinutol ni Placido sa isang ingos 
	ang kanyang pananalita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magtatalon na 
	muna ako sa dagat--ang sabi--manunulisan na muna ako bago bumalik sa 
	Unibersidad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	sinimulan na naman ng ina ang salaysay na ukol sa pagtitiis at kababaang 
	loob ay umalis na muli si Placido na hindi kumain ng ano man at tinungo ang 
	daongang himpilan ng mga bapor.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pagkakita 
	ng isang bapor na aalis na patungong Hongkong ay nag-udyok sa kanya ng isang 
	akala: pumaroon sa Hongkong, magtanan, magpayaman doon upang bakahin ang mga 
	prayle. Ang pagparoon sa Hongkong ay gumising sa kanya ng isang alaala, 
	isang kasaysayan ng mga kagayakang pamukha ng dambana, mga
	<i xml:lang="es" lang="es">ciriales</i> at mga titirikan ng kandila na 
	pawang pilak na inihandog sa isang simbahan ng kabanalan ng mga 
	mapanampalataya; anang isang platero, ay nagpagawa sa Honkong ang mga prayle 
	ng ibang kagayakan sa dambana, mga <i xml:lang="es" lang="es">ciriales</i> 
	at mga titirikan ng kandila na pawang pilak na <span xml:lang="fr" lang="fr">
	Ruolz</span> na siyang ipinalit sa mga tunay na pilak na ipinatunaw at 
	ipinagawang pisong mehikano. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ito ang kasaysayang kanyang naringig at kahit 
	mga salisalita lamang yaon o bulungbulungan ay inaari na niyang totoo dahil 
	sa sama ng kanyang loob at nagpapaalaala pa sa kanya ng ilang gayon ding 
	pangyayari. Ang paghahangad na mabuhay ng malaya at ilang balak na hindi pa 
	lubos na yari ay nakapag-udyok sa kanyang ipatuloy ang balak na tumungo sa 
	Hongkong. Kung doon dinadala ng mga <i xml:lang="es" lang="es">corporacion</i> 
	ang lahat ng kanilang salapi ay dapat na lumakad na mabuti ang pangangalakal 
	doon at maaaring siya'y yumaman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig kong 
	maging malaya, mabuhay ng malaya!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inabot siya ng 
	gabi sa paglilibot sa <abbr>S.</abbr>&nbsp;Fernando, at sa dahilang hindi 
	makatagpo ng isang kaibigang mangdaragat ay nagpatuloy nang umuwi. At 
	sapagka't maganda ang gabi at ang buwan ay kumikinang sa langit na 
	binibigyan ng anyong kahariang makababalaghan ng mga <i>hada</i> ang 
	maralitang siyudad, ay tumungo sa periya. Doon nagpayao't dito, linibot ang 
	mga tinda na hindi napupuna ang mga bagaybagay; ang pag-iisip ay nasa 
	Hongkong upang mamuhay ng malaya, magpayaman......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iiwan na sana 
	ang periya nang mamataan mandin ang manghihiyas na si Simoun na nagpapaalam 
	sa isang taga-ibang lupa at kapwang sa wikang ingles nag-uusap. Sa palagay 
	ni Placido ay ang lahat ng wikang ginagamit sa Pilipinas ng mga dayuhan, 
	kailan ma't hindi ang kastila, ay ingles: at saka naulinigan pa ng ating 
	binata ang salitang Hongkong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kung 
	mangyayari sanang maipakiusap siya ng magaalahas na si Simoun sa dayuhang 
	yaon na tutungo mandin sa Hongkong!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tumigil si 
	Placido. Nakikilala niya ang manghihiyas dahil naparoon sa kanyang bayan at 
	nagbili ng alahas. Sinamahan niya sa isang paglalakbay at pinagpakitaan siya 
	ng magandang loob ni Simoun na isinalaysay sa kanya ang mga pamumuhay sa mga 
	Unibersidad ng mga malalayang bansa: anong laking kaibhan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sinundan ni 
	Placido ang mag-aalahas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ginoong 
	Simoun, ginoong Simoun!--aniya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling yaon ay lululan sa sasakyan ang mang-hihiyas. Nang makilala si 
	Placido ay tumigil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig ko 
	sanang makiutang ng loob sa inyo...., dalawang salita lamang!--ang sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	umanyong may pagkainip, bagay na sa katuligan ni Placido ay hindi napuna. Sa 
	ilang salita'y isinalaysay ng binata ang nangyari sa kanya at ipinahayag ang 
	nasang tumungo sa Hongkong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At bakit?--ang 
	tanong ni Simoun na tinitigan si Placido sa tulong ng kanyang mga salaming 
	bughaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi sumagot 
	si Placido. Sa gayo'y tumingala si Simoun at ngumiti ng dati ring ngiting 
	tahimik at malamlam, at sinabi kay <span class="locked">Placido na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya! sumama 
	kayo sa akin. Sa daang&nbsp;Iris!--ang sabi sa kotsero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa buong 
	linakaran ay namalaging walang imik si Simoun na waring may iniisip na isang 
	malaking bagay. Sa pag-aantay ni Placido na siya'y kausapin ay hindi 
	bumibigkas ng anumang salita at naglibang sa pagmamasid sa maraming 
	naglalakad na sinasamantala ang kaliwanagan ng buwan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mga binata, magkakaakbay na 
											magkasintahan, mga nagkakaibigan na 
											sinusundan ng mga maiingat na ina o 
											mga inali; pulupulutong na mga 
											nag-aaral na nakadamit ng puti na 
											lalo pa manding pinatitingkad ng 
											buwan ang kaputian; mga sungdalong 
											halos lasing na nangakakarwahe, anim 
											na paminsan, na dadalaw sa sambahang 
											pawid na ukol kay Citeres; mga 
											batang naglalaro ng tubigan, mga 
											intsik na nagtitinda ng tubo at <abbr>
											iba </abbr>pa, ang pumupuno sa dinadaanan at sa 
	liwanag na maningning ng buwan ay nagkakaroon ng anyong mamalikmata't mga 
	kaayaayang ayos. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang bahay ay tumutugtog ng mga balse ang orkesta at 
	nakikita ang ilang magkalangkay na nagsasayawan sa liwanag ng mga kinke at 
	lampara.... napakahabag na panoorin iyon sa ganang kanya kung ipapara sa 
	nakikita sa mga lansangan! At sa pag-iisip ng ukol sa Hongkong ay 
	itinatanong sa sarili kung ang mga gabing may buwan sa pulong yaon ay kasing 
	inam, kasing sasarap ng sa Pilipinas, at isang matinding kalungkutan ang 
	bumalot sa kanyang puso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinag-utos ni 
	Simoun na huminto ang sasakyan at lumunsad silang dalawa. Nang mga sandaling 
	yaon ay siyang pagdaraan sa kanilang tabi ni Isagani at ni Paulita Gomez na 
	nagbubulungan ng matatamis na salita; sa likuran ay kasunod si 
	Aling&nbsp;Victorina na kasama si Juanito Pelaez, na malakas ang pagsasalita, 
	nagkukukumpay at lalo pang nakukuba. Sa pagkalibang ni Pelaez ay hindi 
	nakita ang kanyang naging kasama sa pag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	maligaya!--ang bulong ni Placido na nagbuntonghininga at nakatingin sa 
	pulutong na unti unting nagiging parang anino na lamang, na ang tanging 
	nakikitang mabuti ay ang mga bisig ni Juanito na ibinababa't itinataas na 
	wariy pamagaypay ng isang gilingan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa gayon na 
	lamang siya magagamit--ang bulong naman ni Simoun--mabuti na ang lagay ng 
	kabataan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sino ang 
	tinutukoy ni Placido at ni Simoun?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hinudyatan 
	nito ang binata, iniwan nila ang daan at nagsuot sa isang palikawlikaw na 
	landas at mga daanang pag-itan ng ilang bahay; kung minsa'y nangagsisitalon 
	sa maliliit na bato upang iwasan ang mumunting putikan at kung minsa'y 
	yumuyuko upang dumaan sa bakod na masama ang pagkakayari at lalo pa manding 
	masama ang pagkakaingat. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Namangha si Placido nang makitang naglalakad sa mga 
	pook na iyon ang mayamang mag-aalahas na wariy sanay na sanay doon. Sa 
	kahulihuliha'y nakarating sila sa isang wariy kulob na malaki na may 
	nag-iisang munting bahay na dukha na nalilibid ng sagingan at mga puno ng 
	bunga. Ilang balangkas na kawayan at putol putol na bungbong ay 
	nakapagpahinala kay Placido na sila'y nasa bahay ng isang kastillero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A! ginoo....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At dagling 
	nanaog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nariyan na 
	ang pulbura?--ang tanong ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nangasa 
	bayong; inaantay ko ang mga bungbong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang mga 
	bomba?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nahahanda.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti,
	<i xml:lang="es" lang="es">maestro</i>.... Ngayong gabi rin kayo lalakad at 
	makipag-usap sa teniente at sa kabo.... at pagkatapos ay ipatuloy ang inyong 
	lakad; sa Lamayan ay makatatagpo kayo ng isang tao sa isang bangka: 
	pagsabihan ninyo ng 'kabisa' at siya'y sasagot ng 'Tales'. Kailangang 
	dumating dito bukas. Hindi makapag-aaksaya ng panahon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At binigyan ng 
	ilang kuwaltang ginto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit po 
	ginoo?--ang tanong sa mabuting wikang kastila ng tao--may bagong bagay
	<span class="locked">po ba?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, gagawin 
	sa loob ng linggong darating.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa linggong 
	darating!--ang ulit ng tao na napaurong--ang mga arabal ay hindi pa handa; 
	inaantay na iurong ng General ang utos.... ang akala ko'y ipagpapaliban 
	hanggang sa pagpasok ng kurisma.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Umiling si 
	Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi na 
	natin kakailanganin ang mga arrabal--ang sabi--ang mga tao ni Kabesang Tales, 
	ang mga naging karabinero at isang <i xml:lang="es" lang="es">regimiento</i> 
	ay sapat na. Kung ipagpapaliban pa marahil ay patay na si Maria&nbsp;Clara! 
	Lumakad kayong agad!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lalakiy 
	nawala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kaharap si 
	Placido sa maikling pag-uusap na ito't nadinig ang lahat; nang inaakalang 
	nakaaninaw siya ng bahagya ay nanindig ang kanyang buhok at tiningnan si 
	Simoun ng matang gulat. Si Simoun ay nakangiti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipinagtataka 
	ninyo--ang sabing malamlam ang ngiti--na ang indiong iyan na masama ang suot 
	ay makapagsalitang mabuti ng wikang kastila? Naging guro sa paaralan, na 
	nagpumilit na turuan ng kastila ang mga bata at hindi nagtigil hanggang 
	naalis sa tungkulin at napatapon dahil sa salang panggugulo ng katiwasayang 
	bayan at sapagka't naging kaibigan ng kaawaawang Ibarra. Kinuha ko sa 
	kinatapunan na ang inaatupag doon ay ang pagtatanim ng niyog at ginawa kong 
	magkakastillo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nangagsibalik 
	sa daan at palakad na tumungo sa dakong Trozo. Sa harapan ng isang munting 
	bahay na tabla, na ang anyo'y masaya at malinis, ay may isang kastila na 
	naniniin sa isang tungkod at nag-aaliw sa liwanag ng buwan. Tinungo siya ni 
	Simoun; nang makita ito ng kastila ay nagtangkang tumindig na tinimpi ang 
	isang daing.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Humanda 
	kayo!--ani Simoun sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kailan ma'y 
	handa ako!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa linggong 
	darating!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na ba?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa unang 
	putok ng kanyon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	At lumayong kasunod si Placido na nagsisimula na ng pagtatanong sa sarili 
	kung siya&#39;y nananaginip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ikinatataka 
	ninyo--ang tanong sa kanya ni Simoun--ang pagkakita sa isang kastilang bata 
	pa'y salanta nang lubha ng mga sakit? May mga dalawang taon lamang na iyan 
	ay kasingtibay ninyo sa pangangatawan, ngunit nagawa ng kanyang mga kalaban 
	na siya'y maipadala sa Balabak upang gumawa roong kasama ng isang pangkat na
	<i xml:lang="es" lang="es">disciplinaria</i>, at naiyan at tingnan ninyong 
	may isang reuma at isang walang likat na lagnat na nag-aaboy sa kanya sa 
	libingan. Ang kahabaghabag na iyan ay nag-asawa sa isang magandang babae......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	nagdaan ang isang sasakyang walang lulan ay pinahinto ni Simoun at napahatid 
	na kasama si Placido sa kanyang bahay sa daang&nbsp;Escolta. Nang mga sandaling 
	iyon ay tinutugtog sa mga orasan ng mga simbahan ang ika sampu at kalahati 
	ng gabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Makaraan ang dalawang oras ay nilisan ni Placido ang bahay ng mag-aalahas at 
	walang imik at nagiisip na lumakad sa Escolta, na wala nang katao tao kahit 
	na masaya pa rin ang mga '<i xml:lang="fr" lang="fr">cafe</i>'. Mangisangisang 
	sasakyan ay nangagdadaang matulin na nag-uumugong ng katakot-takot sa ibabaw 
	ng dinadaanang gasgas na batong nakalatag sa lansangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Mula sa isang 
	silid ng kanyang tahanang nakaharap sa Ilog&nbsp;Pasig ay tinatanaw ni Simoun ang 
	bayang kupkop ng muog na nakikita sa mga durungawang bukas ang mga bubong na
	<i xml:lang="es" lang="es">hierro galvanizado</i> na pinakikinang ng buwan, 
	at ang kanyang mga torre na nababadhang malulungkot, bagol, malalamlam, sa 
	gitna nang mapanatag na anyo ng gabi. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay nag-alis ng salaming 
	bughaw sa mata, ang kanyang maputing buhok na wariy kulob na pilak ay 
	nakalibid sa kanyang matigas at sunog na mukha na malamlam, na naliliwanagan 
	ng isang lampara, na ang ilaw ay waring mamamatay dahil sa kakulangan sa 
	petroleo. Dahil mandin sa isang bagay na iniisip ay hindi napupuna ni Simoun 
	na unti-unting namamatay ang lampara at lumalaganap ang kadiliman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa loob ng 
	ilang araw--ang bulong--pag nag-alab ang apat na tagiliran ng sinumpang bayang 
	iyan na tirahan ng mga mapagpalalong walang namumuwangan at ng walang awang 
	panggagaga sa mangmang at sa nagigipit; pag ang pagkakagulo ay mangyari na 
	sa mga arrabal at palusubin ko sa mga lansangan ang aking mga taong 
	manghihiganti na ibinunga ng mga panggagahis at kamalian, ay saka ko 
	bubuksan ang muog ng iyong bilangguan, aagawin kita sa kamay ng dalubhasang 
	pananalig, at maputing kalapati, magiging <i xml:lang="es" lang="es">Fenix</i> 
	kang muling sisipot sa mainit na abo....! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Isang panghihimagsik na binalak ng 
	mga tao sa gitna ng kadiliman ay siyang naglayo sa akin sa piling mo; isa 
	namang paghihimagsik din ang mag-aaboy sa akin sa mga bisig mo, bubuhay sa 
	aking muli at ang buwang iyan, bago sumapit sa kanyang kabilugan ay 
	tatanglawan ang Pilipinas na linis na sa karimarimarim niyang yamutmot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Biglang 
	huminto si Simoun na waring natigilan. Isang tinig ang tumatanong sa loob 
	ng kanyang budhi kung siya, si Simoun, ay hindi bahagi rin ng yamutmot ng 
	kalaitlait na bayan, o marahil ay siya pa ang bulok na may lalong masidhing 
	singaw. At kagaya ng mga magbabangong patay pagtugtog ng pakakak na 
	kakilakilabot ay libo libong marugong multo, mga aninong nanggigipuspos ng 
	mga lalaking pinatay, mga babaeng ginahasa, mga amang inagaw sa kanilang mga 
	anak, masasamang hilig na inudyukan at pinalusog, mga kabaitang hinalay, ay 
	nangagsipagbangon ngayon sa tawag ng matalinghagang katanungan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Noon lamang, 
	sa kanyang masamang pamumuhay sapol nang sa Habana, sa tulong ng masamang 
	hilig ng pagsuhol ay tinangka niya ang pagyari ng isang kasangkapan upang 
	magawa ang kanyang mga balak, isang taong walang pananalig, walang pag-ibig 
	sa bayan at walang budhi, noon lamang, sa kabuhayang yaon, tumataliwakas ang 
	isang bagay sa loob niyang sarili at tumututol ng laban sa kanyang mga 
	inaasal. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ipinikit ni Simoun ang kanyang mga mata at malaong namalagi na 
	walang katinagtinag; matapos ay hinaplos ang kanyang noo, ayaw silayan ang 
	kanyang budhi at natakot. Ayaw, ayaw suriin ang kanyang sarili, kinulang 
	siya ng katapangan upang lingunin ang dakong kanyang dinaanan.... Kulangin 
	pa naman siya ng katapangan nang nalalapit na ng sandali ng pagkilos, 
	kulangin siya ng paniniwala, ng pananalig sa sarili! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang ang mga 
	kakilakilabot na larawan ng mga sawing palad, na siya ay nakatulong sa 
	sinapit, ay nasa sa kanyang harapan pa rin na wariy nangagsisipanggaling sa 
	makinang na ibabaw ng ilog at nilulusob ang silid na sinisigawan siya't 
	inilalahad sa kanya ang mga kamay; sa dahilang ang mga sisi at panaghoy ay 
	waring namumuno sa hangin at nadidinig ang mga pagbabala at mga sigaw ng 
	paghihiganti ay inilayo ang kanyang tingin sa durungawan at marahil ay noon 
	lamang siya nanginig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, 
	marahil ay may sakit ako, marahil ay masama ang aking katawan--ang 
	bulong--marami ang nagagalit sa akin, ang mga naghihinalang ako ang sanhi ng 
	kanilang kasawian, ngunit.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa dahilang 
	nararamdamang nag-aalab ang kanyang noo ay tumindig at lumapit sa durungawan 
	upang sagapin ang malamig na simuy sa gabi. Sa kanyang paanan ay pinauusad 
	ng Ilog&nbsp;Pasig ang kanyang pilak na agos, na sa ibabaw ay nanghihinamad na 
	kumikinang ang mga bulang umiikit, sumusulong at umuurong na sumusunod sa 
	lakad ng mumunting uliuli.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang siyudad ay 
	natatayo sa kabilang ibayo at ang kanyang maiitim na muog ay nakikitang 
	nakakikilabot, matalinghaga, at napapawi ang kanyang karukhaan sa liwanag ng 
	buwan na nakapagpaparikit at nagpapaganda sa lahat ng bagay. Datapwa't si 
	Simoun ay muling nangilabot; waring nakita sa kanyang harapan ang mabagsik 
	na mukha ng kanyang ama, na namatay sa bilangguan, ngunit namatay dahil sa 
	paggawa ng mabuti, at ang mukha ng isa pang lalaki na lalo pang mabagsik, ng 
	isang lalaking nagdulot ng buhay ng dahil sa kanya, dahil sa inaakalang 
	kanyang hahanapin ang ikabubuti ng kanyang bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, hindi 
	ako makauurong--ang bulalas na pinahid ang pawis ng kanyang noo--ang gawain ay 
	magtatapos na at ang kanyang pagtatagumpay ay siyang magbibigay katwiran sa 
	akin.... Kung ako'y gumaya sa inyo ay nasawi ako marahil.... Siya na ang 
	pangangarap, siya na ang maling pagkukuro! Apoy at patalim sa bikat, parusa 
	sa kasamaan, at masira pagkatapos kung masama ang kasangkapan! Hindi, 
	pinag-isip ko nang mabuti, ngunit ako'y nilalagnat ngayon.... ang pag-iisip 
	ko'y uulik-ulik.... talaga.... kung ginawa ko ang kasamaan ay upang makapala 
	ng kabutihan at ang napapala'y siyang nagliligtas sa kaparaanan.... Ang 
	gagawin ko'y ang huwag mapara....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nahigang 
	gulo ang pag-iisip at tinangkang makatulog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinabukasan ay pinakinggang nakasukot at nakangiti ni Placido ang pangaral 
	ng kanyang ina. Nang tinuran nito sa kanya na makikiusap sa
	<i xml:lang="es" lang="es">procurador</i> ng mga agustino ay hindi tumutol 
	ni humadlang man lamang; kundi bagkus pa ngang humandog na siya na ang 
	gagawa upang maibisan ng kagambalaan ang kanyang ina na pinamanhikang 
	bumalik na kaagad sa kanilang lalawigan at kung mangyayariy sa araw ding 
	yaon. Itinanong sa kanya ni kabisang&nbsp;Andang kung bakit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa 
	dahilang.... sa dahilang kung mabatid ng prokurador na naririto kayo ay 
	hindi gagawin ang inyong kahilingan samantalang hindi muna siya nabibigyan 
	ng anumang handog at ilang pamisa.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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