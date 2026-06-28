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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">III. Mga Alamat</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang bumati si
	Padre Florentino sa munting lipunan ay hindi na naghahari doon ang 
	pagkakainisan dahil sa nakaraang pagtatalo. Marahil ay nakaakit sa mga budhi 
	ang masasayang bahay sa bayan ng Pasig, ang mga kopa ng mga alak na
	<span xml:lang="es" lang="es">Jerez</span> na tinungga upang humanda o 
	marahil ay ang pag-aantabay sa isang mabuting pananghalian.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Maging alin man 
	sa mga tinuran ang sanhi, ang katunayan, ay nangagtatawanan at 
	nangagbibiruan na, sampu ng pransiskanong payat, kahit na hindi 
	nangagiingay: ang kanilang mga tawa'y kahawig ng mga ngiwi ng isang 
	mamamatay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Masasamang 
	panahon!, masasamang panahon!--ang sabing tumatawa ni Padre Sibyla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Maano namang 
	huwag kayong magsalita ng ganyan, Vice-Rector!--ang sagot ng kanonigong si
	Padre Irene, sabay sa pagtutulak sa luklukan noon--sa Hongkong ay 
	malusog ang inyong pangangalakal at nagpapatayo kayo ng mga bahay na bawa't 
	isa <span class="locked">ay.... ba!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tate, 
	tate!--ang sagot--hindi ninyo nakikita ang aming mga gugol, at ang mga 
	naninirahan sa aming mga aring lupain ay nagsisimula na sa pagtutol....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, siya na 
	ng kadadaing, pagka't kung hindi ay iiyak na ako!--ang masayang sigaw ni
	Padre Camorra.--Kamiy hindi dumadaing gayong wala kaming mga 
	lupain ni mga banko. At alamin ninyo na nagsisimula na ng pagtawad sa mga 
	deretsos ang aking mga indio at iniuukilkil sa akin ang mga taripa! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sukat ba 
	namang ukilkilan ako ng taripa ngayon, at taripa pa naman ng Arsobispo na si
	Don Basilio Sancho, <i xml:lang="es" lang="es">pu&ntilde;ales</i>, wari 
	bagang mula noon hangang ngayon ay hindi namahal ang mga bagay-bagay. Ha, 
	ha, ha! Bakit mamumura pa ang isang binyag kay sa isang inahing manok? 
	Ngunit ako'y nagtataingang kawali, sinisingil ko hangang saan makaabot at 
	hindi ako dumadaing kailan man. Hindi kami makamkam, ano, Padre Salvi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay siyang paglabas sa eskotilya ng ulo ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit saan 
	baga kayo nagsuot?--ang sigaw sa kanya ni Don Custodio na 
	nakalimot na sa sama ng loob:--hindi ninyo nakita ang pinakamainam sa 
	paglalayag!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Psh!--ang 
	sagot ni Simoun nang makaakyat na ng tuluyan;--nakakita na ako ng maraming 
	ilog at maraming tanawin, kaya't wala ng may kabuluhan sa akin kun di iyong 
	may mga alamat....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung sa 
	alamat, ay may ilan ang Pasig--ang sagot ng Kapitan, na ayaw mawalang 
	kabuluhan ang ilog na kanyang nilalayagan at pinagkakakitaan ng 
	pagkabuhay,--nariyan ang Malapad-na-bato, na sinasamba noong kapanahunang 
	hindi pa dumarating dito ang mga kastila, na umano'y tirahan ng mga 
	espiritu: ng mawala na ang pananalig diyan at masalaula na ang bato ay 
	naging tirahan ng mga tulisan, na mula sa tugatog niya'y hinaharang ang mga 
	bangka na nakikilaban na sa agos ay nakikilaban pa sa mga tao. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang makaraan 
	iyon at sa kapanahunan na natin, kahit nababakas sa kanya ang kamay ng tao, 
	ay may nababanggit ding mangisangisang bangkang natataob, at kung sa pagliko 
	ay hindi ko ginagamit ang <em>anim kong sentido</em> ay hindi malayong 
	mapabarandal sa kanyang mga tagiliran. Nariyan pa ang isang alamat, ang sa 
	yungib ni do&ntilde;a&nbsp;Jeronima, na maibubuhay sa inyo ni Padre Florentino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang hindi 
	nakaalam niyon!--ang pawalang bahalang sabi ni Padre Sibyla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ni si 
	Simoun, ni si Ben-Zayb, ni si Padre Irene, ni si Padre Camorra 
	ay nakaaalam, kaya't hiningi nilang isaysay; ang ilan ay pabiro at ang iba'y 
	sapagka't sadyang ibig mabatid. Ang klerigo ay umanyong pabiro, kagaya ng 
	paghiling ng ilan, gaya ng pagsalaysay sa mga bata ng isang sisiwa, at 
	nagsabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May isang 
	lalaking nag-aaral na nangakong pakakasal sa isang babae, sa kanyang bayan, 
	at pagkatapos ay hindi na naalaala ang pangako. Dahil sa pagkamatapat ng 
	babae ay inantay-antay ng malaon ang lalaki: nakaraan ang kanyang kabataan, 
	naging dalagsot at isang araw ay nabalitaang ang kanyang katipan sa 
	pag-aasawa ay siyang Arsobispo sa Maynila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nagsuot lalaki at lumigid sa 
	ungos ng Cabo, sa pagparito, at humarap sa Ilustrisima na hinilingang 
	tumupad sa pangako. Ang kahilinga'y hindi mangyayari, at ipinagawa nga ng 
	Arsobispo iyang yungib na nakita ninyong may takip at napapalamutihan sa 
	pagpasok ng mga punong gumagapang. Diyan siya nanahan at namatay, at diyan 
	din siya nalibing, at ayon sa sabisabihan ay tumatagilid si do&ntilde;a&nbsp;Jeronima 
	kung pumapasok sa yungib dahil sa katabaan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang kabantugan niya sa 
	pagkaenkantada ay buhat sa ugali niyang paghahagis sa ilog ng mga 
	kasangkapang pilak na ginagamit sa mga piging niyang dinadaluhan ng maraming 
	ginoo. Isang lambat ang nasa ilalim ng tubig at siyang sumasahod sa mga 
	kasangkapang doon na nahuhugasan. Wala pang dalawampung taon ang 
	nakararaan na ang ilog ay dumadaang halos humahalik sa pintuan ng yungib, 
	ngunit unti-unting lumalayo, gaya rin naman ng pagkalimot ng mga taga rito 
	sa kay Do&ntilde;a&nbsp;Jeronima.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mainam na 
	alamat!--ani Ben-Zayb,--susulat ako ng ukol diyan. Nakaaawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iniisip na ni 
	Aling&nbsp;Victorina na manirahan sa isa namang yungib at sasabihin na sana ng 
	unahan siya ni Simoun, na nagsabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ano 
	ang palagay ninyo sa bagay na iyon, Padre Salvi--ang tanong sa 
	pransiskano na walang imik dahil sa may iniisip--hindi baga lalong mabuti, sa 
	palagay ninyo, na dapat sanang hindi sa isang yungib siya inilagay ng 
	Arsobispo kung di sa isang beaterio, sa Santa&nbsp;Clara, sa halimbawa?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Galaw na 
	pamangha ni Padre Sibyla, na nakakitang si Padre Salvi 
	ay nanginig at sumulyap sa dako ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	hindi naman mainam--ang patuloy na walang tigatig ni Simoun,--iyang bigyan ng 
	munting tahanan ang mga nadadaya natin; labag sa pagkamapanampalataya ang 
	ipain siya sa mga tukso, sa isang yungib, sa tabi ng ilog; nangangamoy
	<i xml:lang="es" lang="es">ninfa</i> o kaya'y <i xml:lang="es" lang="es">
	driada</i> ang gayon. Marahil ay naging mainam pa, lalo pang kabanalan, lalo 
	pang maganda, lalo pang kapit sa ugali dito, ang kulungin siya sa 
	Santa&nbsp;Clara, na waring isang bagong Eloisa, upang madalaw at mahimok 
	maminsanminsan, Ano ang sabi ninyo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ko 
	mahahatulan ni dapat kong hatulan ang kagagawan ng mga Arsobispo--ang tugong 
	mabigat ang loob ng pransiskano.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit kayo, 
	na siyang <i xml:lang="es" lang="es">gobernador eclesiastico</i>, ang 
	kahalili ng Arsobispo, ano ang gagawin ninyo kung sa inyo mangyari ang bagay 
	na iyon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ni
	Padre Salvi ang kanyang balikat, at payapang <span class="locked">
	tumugon ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	kabuluhang isipin ang isang bagay na hindi mangyayari.... Datapwa'y yayamang 
	napag-uusapan na rin lamang ang tungkol sa mga alamat, ay huwag ninyong 
	kaligtaan ang lalong mainam, dahil sa siyang lalong katotohanan, ang 
	kababalaghan ni San&nbsp;Nicolas, na marahil ay nakita ninyo ang mga sirang muog 
	ng kanyang simbahan. Ibubuhay ko kay <abbr>G.</abbr>&nbsp;Simoun na siyang hindi 
	dapat makaalam. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Waring noong araw ay maraming buwaya sa lawa't sa ilog, mga 
	buwayang napakalalakit napakamasiba na dinudumog ang mga bangka at 
	pinalulubog sa hagkis ng kanilang buntot. Sinasabing isang araw, ang isang 
	intsik na hangga noon ay hindi pa nagbibinyagan, ay dumaraan sa harap ng 
	Simbahan, at walang ano ano'y sasisipot sa kanyang harapan ang demonio, na 
	anyong buwaya, na itinaob ang kanyang bangka upang lamunin siya at dalhin sa 
	Impierno. Sa tulong ng&nbsp; Diyos&nbsp; ay tinawagan ng intsik si San&nbsp;Nicolas at noon 
	din ay naging bato ang buwaya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sinasabi ng mga matatanda na ng kapanahunan 
	nila ay nakikilala pang maliwanag ang anyo ng hayop sa putol putol na batong 
	nalalabi; sa ganang akin ay masasabi kong nakita ko pang malinaw ang ulo at 
	kung huhulaan ang katawan dahil sa aking nakita ay dapat na maging lubhang 
	malaki ang hayop na yaon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahangahangang alamat!--ang pabulalas ni Ben-Zayb,--at magiging sanhi ng 
	isang salaysayin. Ang pagsasabi ng anyo ng hayop, ang takot ng intsik, ang 
	tubig ng ilog, ang kakawayanan.... At magiging sanhi ng pagsusuri ng mga 
	pananampalataya. Sapagka't tignan ninyo; tawagan pa naman ng isang intsik na 
	hindi binyagan, sa gitna ng kasakunaan, ang isang santo na hindi niya 
	sinasamba at marahil ay kilala lamang sa dinig.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ito'y hindi sakop noong 
	sawikaing <i>mabuti pa ang masamang kilala na, kay sa mabuting kikilalanin 
	pa</i>. Kung ako'y mapapasakaintsikan at malalagay ako sa gayong kagipitan 
	ang una ko munang tatawagan ay yaong lalong hindi kilalang santo sa
	<i xml:lang="es" lang="es">calendario</i> kay sa kay Confusio o
	<span xml:lang="en" lang="en">Budha</span>. Kung ito'y isang kataasang tunay 
	ng uri ng katolisismo o kaya'y kahinaan sa paghuhulo at pagka walang 
	katibayan ng pag-iisip ng mga lahing dilaw, ay malilinaw lamang ng isang 
	pagkilalang masusi ng <i xml:lang="es" lang="es">antropologia</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si Ben-Zayb ay gumamit ng kilos guro at pinagalaw ang hintuturo sa hangin, 
	sabay sa pagtataka sa sariling pag-iisip na marunong humango ng maraming 
	banggit at katuturan sa maliliit na bagay. At sa dahilang nakita, na si 
	Simoun ay nagbubulaybulay dahil sa bagay na kasasabi pa lamang niya, ay 
	tinanong na kung ano ang iniisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dalawang 
	bagay na mahalaga--ang sagot ni Simoun,--dalawang katanungang maidaragdag sa 
	inyong susulatin. Una: ano kaya ang nangyari sa diablo ng biglang makulong 
	sa bato? nakatanan? naiwan doon? napilpil? At ang pangalawa, ay kung yaong 
	mga hayop na naging bato na napagkita ko sa ilang museo sa Europa, ay hindi 
	kaya nagkagayon ng dahil naman sa ilang santong nabuhay na una sa panahon ng 
	pag-apaw ng tubig sa sangmundo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Walang 
	kapingaspingas na biro ang pagkakasabi ng mag-aalahas at itinukod pa sa noo 
	ang kanyang hintuturo, tanda ng malaking pagmumunimuni, kaya't si Padre Camorra 
	ay walang kapingaspingas ding <span class="locked">sumagot na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sino ang 
	makapagsasabi, sino ang makapagsasabi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At yayamang 
	mga alamat ang napag-uusapan at pumapasok tayo sa lawa,--ang tugon ni Padre &nbsp;Sibyla--ang kapitan ay dapat makabatid ng marami....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling yaon ay pumapasok sa wawa ang bapor at ang tanawing nasa harap ay 
	lubhang mainam. Ang lahat ay nalugod. Sa harapan ay nakalatag ang magandang 
	lawa, na nalilibid ng baybaying berde at bughaw na bulubundukin, na waring 
	isang malaking salamin na nakukulong ng palibid na pawang esmeralda at 
	sapiro, na sa kanyang lunas ay nananalamin ang langit. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa kanan ay nakalatag 
	ang dalampasigang mababa, na may mga look na may maiinam na anyo, at doon sa 
	malayo, halos napapawi na sa paningin, naroon ang kawit ng bundok Sungay; sa 
	harapan at sa huling dakong abot ng paningin ay nakatayo ang Makiling, 
	mataas, nakahahanga, napuputungan ng manipis na ulap; at sa kaliwa ang 
	pulong&nbsp;Talim, ang Susong-dalaga na taglay ang matatambok niyang guhit na 
	naging sanhi ng kanyang pangalan. Isang malamig na simoy ang nagpapakulot sa 
	malapad na ibabaw ng tubig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Maala-ala ko 
	pala, Kapitan--ang sabi ni Ben-Zayb, na kasabay ang paglingon--alam baga ninyo 
	kung saan dako ng lawa napatay ang isang nagngangalang Guevara, Navarra o 
	Ibarra?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lahat ay 
	napatingin sa Kapitan, tangi lamang si Simoun na ibinaling ang mukha sa 
	kabilang dako, na waring may hinahanap sa dalampasigan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay siya 
	nga!--ani Aling&nbsp;Victorina,--saan Kapitan? nakaiwan kaya ng bakas sa tubig?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kumindat ng 
	makailan ang tinatanong, bilang katunayan na laban sa kanyang kalooban ang 
	katanungan; ngunit ng mabatyag ang samo sa mga mata ng lahat, ay lumapit ng 
	ilang hakbang sa unahan ng bapor at minataan ang baybayin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tumingin kayo 
	roon--ang sabing marahan, matapos na maunawang walang ibang tao:--alinsunod sa 
	Cabo na nangulo sa pag-uusig, ng makita ni Ibarra na siya'y nakukulong, ay 
	lumunsad sa bangka, sa malapit sa <i>Kinabutasan</i> at sa kasisisid ay 
	linangoy ang habang may dalawang milla, na hinahabol siya ng punlo kailan 
	ma't ilalabas ang ulo sa tubig upang huminga. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa dako pa roon ay hindi na 
	siya nakita, at sa malayu-layo pa, sa may pampang, ay nakakita ng wariy 
	kulay dugo. At ngayon ang ikalabing tatlong taon ng pangyayari, na walang 
	kulang at labis na araw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon, 
	ang kanyang bangkay?...--ang tanong ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay nakisama 
	sa bangkay ng kanyang ama,--ang sagot ni Padre Sibyla;--hindi ba isa 
	ring pilibustero, Padre Salvi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang mga 
	murang libing, Padre Camorra, ano?--ang sabi ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lagi ng 
	sinasabisabi ko, na pilibustero ang mga hindi bumabayad ng maringal na 
	libing--ang sagot na tumatawa ng tinukoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ano 
	ang nangyayari sa inyo <abbr>G.</abbr>&nbsp;Simoun?--ang tanong ni Ben-Zayb nang 
	makitang ang mag-aalahas ay nakatigil at nag-iisip--Nahihilo baga kayo, 
	kayong mapaglakbay, sa isang patak na tubig na kagaya nito?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang masasabi 
	ko sa inyo,--ang sagot ng Kapitan na nagkaroon na ng giliw sa mga pook na 
	iyon;--huwag ninyong panganlan ito ng patak na tubig: ito'y malaki sa alin 
	man sa mga lawa sa Suisa at malaki pa kahit pagpisanin ang lahat ng lawa sa 
	Espa&ntilde;a; nakakita ako ng matatandang mangdaragat na nangaliyo rito.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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