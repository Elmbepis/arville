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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXVI. Ang Kagipitan ni Ben-Zayb</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Agad-agad na 
	mabatid ang pangyayari, nang makakuha ng mga ilaw, at makita ang di ayos na 
	anyo ng mga nabiglang mga dios, si Ben-Zayb, lipus kamuhian at taglay na ang 
	pagsang-ayon ng sumisiyasat ng mga inililimbag, ay nagtatakbong tungo sa 
	kanyang bahay (isang entresuelo na tinitirahan niyang may ibang kasama), 
	upang sulatin ang lalong malamang salaysay na nabasa sa silong ng langit ng 
	Pilipinas. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang General ay aalis na masama ang loob kung hindi mababasa muna 
	ang kanyang mga pasaring, at ang gayo'y hindi mapahihintulutang mangyari ni 
	Ben-Zayb, na may magandang puso. Nagtiis na ngang iwan ang hapunan at ang 
	sayawan at hindi natulog ng gabing yaon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Mauugong na 
	bulalas sa pagkagulat, pagkamuhi, ipalagay na wariy gumuho ang mundo at ang 
	mga bituin, ang mga walang lipas na bituin ay nangagkakaumpugan! Pagkatapos 
	ay isang mahiwagang pangbungad, puno ng mga banggit, mga pasaring.... 
	makaraan ito'y ang salaysay ng pangyayari at ang panghuling pati. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dinamihan 
	ang mga paligoy, inubos ang mga pasapyaw na salita sa pag-lalarawan ng 
	pagkakatiwangwang at nang napakahuling pagkakabinyag ng sabaw na tinanggap 
	ng General sa kanyang noong tagalangit; pinuri ang kaliksihang ginamit sa 
	pagtayo, na inilagay ang ulo sa dating kinalagyan ng paa at tiwarik; 
	bumigkas ng isang pagpupuri sa Lumikha dahil sa mairog na pagkakalinga sa 
	mga kabanalbanalang mga butong yaon, at ang pagkakasalaysay ay lumabas na 
	napakainam, na ang General ay lumabas na wariy isang magiting at lalo pang 
	mataas ang kinahulugan, gaya ng sabi ni <span xml:lang="fr" lang="fr">Victor 
	Hugo</span>. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nagsulat, kumatkat, nagdagdag at nagbanhay upang lumabas na 
	dakila ang salaysay nang walang pagkakalisya sa katotohanan--ito ang kanyang 
	tanging karapatan sa pagkamamamahayag,--maging kalakhan ang ukol sa pitong 
	dioses at karuagan at aba sa hindi kilalang magnanakaw, 'na nagparusa sa 
	sarili, sindak at nakakilala sa kalakhan ng kanyang pagkakasala nang sandali 
	ring iyon.' </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ipinalagay ang ginawa ni Padre Irene na pagpasok sa 
	ilalim ng dulang na 'biglang udyok ng likas na katapangan, na hindi 
	napaglubag ng habito ng isang&nbsp; Diyos&nbsp; ng kapayapaan na isinuot buong buhay', 
	tinangka ni Padre Irene na habulin ang nagkasala at sa pagbagtas 
	niya nang patuwid ay dumaan sa silong ng dulang. Sa pagsasalaysay noon ay 
	bumanggit ng mga lungga sa ilalim ng dagat, tinukoy ang isang balak ni <abbr>
	D.</abbr>&nbsp;Custodio, inalala ang katalinuhan at mga mahahabang paglalakbay ng 
	pari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang pagkawala ng diwa ni Padre Salvi ay isang malaking 
	dalamhati na dinamdam ng mabait na pransiskano, sa pagkakitang kakaunti ang 
	napapala ng mga indio sa kanyang mga banal na pangaral; ang pagkakatigagal 
	at sindak ng ibang kasalo, na ang isa sa kanila'y ang kondesa na 'pumigil' 
	(nangunyapit) kay Padre Salvi, ay dili iba kundi katiwasayan at 
	kalamigang loob ng mga magigiting, na sanay sa mga panganib sa gitna nang 
	pagtupad sa kanilang mga kautangan, na, sa piling nila, ang mga senador 
	romano, na nabigla ng mga dumagsang galo, ay pawang mga binibining 
	masindakin lamang na nangagugulat sa harap ng larawan ng mga ipis. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Pagkatapos at upang maging kaibayo, ay ang larawan ng magnanakaw: takot, 
	kabaliwan, di pagkakangtututo, tinging mabalasik, anyong gulat at lakas ng 
	kataasan ng uri sa kabaitan ng lipi! Ang kanyang paggalang nang makita roong 
	nangakalimpi ang gayong katataas na tao! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At kapit na kapit ngang isunod doon 
	ang isang mahabang parirala, isa ng paghikayat, isang talumpating laban sa 
	pagkasira ng mga mabubuting kaugalian, at yaon ang sanhi ng pangangailangan 
	ng isang laging hukumang kawal, 'ang pagtatatag ng
	<i xml:lang="es" lang="es">estado de sitio</i> sa loob ng tatag nang
	<i xml:lang="es" lang="es">estado de sitio</i>, isang tanging kautusan, na 
	makapipigil, matindi, sapagka't lubhang kailangang dalidaliin ang 
	pagpapakita sa mga masasama at mga salarin, na kung sakali mang ang puso'y 
	mahabagin at malingap sa mga mapangayupapa't masunurin sa kautusan, ay 
	malakas naman ang kamay, matatag, walang pagmamaliw, matuwid at matindi sa 
	mga lumalabag sa kanya ng walang kakatuwikatuwiran at humahalay sa mga banal 
	na kapalakaran ng Inangbayan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Oo, mga ginoo, ito'y kailangan nang di lamang 
	ng ikabubuti ng kapuluang ito, hindi lamang ng ikabubuti ng buong 
	sangkatauhan, kundi ikabuti ng pangalan ng Espa&ntilde;a, ng karangalan ng 
	pangalang kastila, ng karangalan ng bayang ibero, sapagka't sa ibabaw ng 
	lahat ng bagay ay mga kastila tayo at ang bandila ng Espa&ntilde;a' <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At dinuluhan 
	ang sulatin sa ganitong pangtapos:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	'Matahimik na yumao ang matapang na bayani, na humawak sa kapalaran ng 
	bayang ito sa kapanahunang lubhang maligalig! Matahimik na yumao upang 
	lumangap ng malunas na simuy ng Manzanares! Kami rito'y maiiwan na wariy 
	matatapat na taliba upang dalanginan ang kanyang ala-ala, hangaan ang 
	kanyang matatalinong kapasiyahan, at iganti ang kataksilang ginawa sa 
	kanyang mainam na handog, na makukuha rin namin sukdang kailanganing 
	patuyuin ang mga dagat! Ang gayong maalindog na relikia ay magiging isang 
	walang pagkapawing tanda sa bayang ito ng kanyang karilagan, kalamigang loob 
	at katapangan.'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ganyan niya 
	tinapos ang sinulat na may kaunting kadiliman, at bago mag-umaga ay 
	ipinadala sa pasulatan, na may taglay nang kapahintulutan ng tagasuri. At 
	natulog na wariy si Napoleon nang matapos maitakda ang paraan ng labanan sa 
	Jena.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ginising siya 
	nang nag-uumaga, na ang mga <i xml:lang="es" lang="es">cuartilla</i> ay 
	ibinabalik at may isang sulat ng namamahala, na sinasabing ipinagbawal na 
	mahigpit ng General na pag-usapan ang nangyari at ipinagbilin na pabulaanan 
	ang kahit anong sabisabihan at usap-usapang kumalat, na, ang lahat ay 
	ipalagay na salisalita lamang, mga palangha at mga pakapakana.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa ganang kay 
	Ben-Zayb, ang gayon, ay pagpatay sa isa niyang anak na napakaganda't 
	napakatapang, na inianak at inalagaan nang lubhang malaki ang paghihirap at 
	pagpapagal at saan niya iuukol ngayon ang mainam na pagtatatakap, ang 
	magandang paghahayag ng mga paghahandang may katapangan at pagpaparusa? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At alalahanin, na sa loob ng isa o dalawang buwan ay iiwan niya ang Pilipinas, 
	at ang sinulat na iyon ay hindi mangyayaring lumabas sa Espa&ntilde;a, sapagka't 
	papano ang pagsasabi noon sa mga salarin sa Madrid, sa ang naghahari doon ay 
	ibang pagkukuro, humahanap ng mga pangyayaring nakapagpapagaan ng sala, 
	tinitimbang ang mga pangyayari, may mga <i xml:lang="es" lang="es">jurado</i>,
	<abbr>ibp.</abbr>? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga sulat na gaya ng kanya ay kawangis ng ilang 
	aguardienteng may lason na ginagawa sa Europa, na mabuting ipagbili lamang 
	sa mga taong itim, <i xml:lang="en" lang="en">good for negroes</i>, na ang 
	kaibhan lamang ay ang kung hindi mainom ng mga maiitim ay hindi nangasisira, 
	samantalang ang mga sulat ni Ben-Zayb, basahin man o hindi ng mga pilipino, 
	ay nagkakaroon din ng bisa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung bukas o 
	makalawa man lamang sana ay may mangyayaring ibang pagkakasala!--aniya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa harap ng 
	pag-aalala doon sa anak niyang namatay bago malimbag, mga bukong nababad sa 
	lamig, at sa pagkakaramdam na ang kanyang mga mata'y nababasa ng luha, ay 
	nagbihis upang makipagkita sa namamahala. Kinibit ng namamahala ang balikat: 
	ipinagbawal ng General, sapagka't kung mapag-alaman na pitong malalaking mga 
	dioses ay nagpabayang mapagnakawan ng isang bala na, samantalang ikinukumpay 
	ang mga <i xml:lang="es" lang="es">tenedor</i> at <i xml:lang="es" lang="es">
	cuchillo</i>, ay mapapanganib ang tibay ng Inang-bayan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At gayon ding 
	ipinagbiling huwag paghanapin ni ang lampara ni ang magnanakaw at 
	ipinagbibilin sa mga susunod sa kanya na huwag mangahas na kumain sa alin 
	mang bahay ng ibang tao nang hindi nalilibid ng mga alabardero at mga 
	bantay. At sa dahilang ang mga nakaalam ng kaunti, sa mga nangyari sa bahay 
	ni Don Timoteo ng gabing iyon, ay mga kawani at mga kawal ay 
	hindi maliwag ang pabulaanan ang pangyayari sa harap ng madla: natutukoy sa 
	katibayan ng inang-bayan. Sa harap ng pangalang ito'y itinungo na puno ng 
	kagitingan ni Ben-Zayb ang kanyang ulo, na iniisip si Abraham, si
	<span xml:lang="es" lang="es">Guzman el Bueno</span> o, si Brutus man lamang 
	at ang iba pang matatandang magiting na nasa kasaysayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang gayong 
	karaming paghihirap ay hindi mangyayaring hindi magkakaroon ng ganting pala. 
	Ang&nbsp; Diyos&nbsp; ng mga mamamahayag ay nasiyahan kay Abraham-Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Halos kasabay 
	noon ay dumating ang anghel na taga-balita na taglay ang tupa, na, anyong 
	isang pangloloob sa isang bahay liwaliwan sa baybay ng Ilog&nbsp;Pasig, bahay na 
	tinitirahan ng ilang prayle kung tag-init! Yaon ang panahon, at si 
	Abraham-Ben-Zayb ay nagpuri sa kanyang dios!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	tulisan ay nakakuha ng mahigit sa dalawang libong piso, sinugatan nang 
	malubha ang isang pari at dalawang alila.... Ang kura ay nagtanggol sa 
	likuran ng isang silla, na nagkasirasira sa kanyang mga kamay......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hintay, 
	hintay!--ani Ben-Zayb na nagtatala;--apat o limangpung tulisang sa paraang 
	taksil.... mga rebolber, itak, escopeta, pistola.... leong nananandata, 
	silla.... putolputol.... sinugatan nang walang kaawa-awa... sampung libong 
	piso......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	kagalakan, at dahil sa hindi pa lubos na nasisiyahan sa mga balita, ay 
	tumungo sa pook na pinangyarihan, na, sa daan ay binabalak ang salaysay ng 
	paglalaban. Isang munting bigkas na tinuran ng namumuno? Isang salitang 
	paalipustang galing sa bibig ng pari? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Lahat ng pagpaparis at talinghaga, na 
	iniukol sa General, kay Padre Irene at kay Padre Salvi 
	ay makakapit sa paring nasugatan, at ang salaysay na ukol sa magnanakaw ay 
	sa bawa't isang tulisan. Sa pagmumura ay maaaring lumawig pa, maaaring 
	banggitin ang pananampalataya, ang pananalig, ang kaawaan, ang tugtog ng mga 
	kampana, ang utang ng mga indio sa mga prayle, malungkot sa sarili at 
	gumamit ng maraming banggit at mga himig na ayos Castelar. Babasin yaon ng 
	mga dalaga sa siyudad at sasabihing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Ben-Zayb 
	ay mabangis na gaya ng leon at masuyo na gaya ng isang tupa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang dumating 
	sa pook na pinangyarihan, ay napamangha siya nang makita na ang nasugatan, 
	ay dili iba't si Padre Camorra, na tinakdaan ng kanyang
	<i xml:lang="es" lang="es">provincial</i> na magdusa sa bahay liwaliwan, sa 
	baybay ng Ilog&nbsp;Pasig, dahil sa kanyang pinaggagawa sa Tiani. May isang 
	munting sugat sa kamay, isang bukol sa ulo dahil sa kanyang 
	pagkakatiwangwang; ang mga tulisan ay tatlo at ang mga sandata'y pawang 
	itak; ang halagang nanakaw ay limang pung piso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	mangyayari!--ani Ben-Zayb;--magtigil kayo.... hindi ninyo alam ang inyong 
	sinasabi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ko 
	malalaman, <i xml:lang="es" lang="es">pu&ntilde;ales</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	hangal!.... ang mga tulisan ay mahigit kay sa sinabi ninyo....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba! ang 
	manghihitit na ito ng tinta....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagkaroon sila 
	ng isang malaking pagtatalo. Ang mahalaga kay Ben-Zayb ay ang huwag masira 
	ang isinulat, palakihin ang mga pangyayari upang kumapit ang kanyang mga 
	pinagturan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang 
	alingawngaw ang pumutol sa pagtatalo. Ang mga tulisang nangahuli ay 
	nangagpahayag ng malalaking bagay. Isa sa mga tulisan ni <i>Matanglawin</i> 
	(si Kabesang Tales) ay tinipan sila sa Santamesa upang makisama sa kanyang 
	pulutong at looban ang mga kombento at ang mga bahay ng mga mayayaman.... 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mangungulo sa kanila'y isang kastilang mataas, kayumanggi, maputi ang 
	buhok, na ang sabiy gagawa nang gayon sa utos ng General na matalik niyang 
	kaibigan, pinatibayan pa rin sa kanila na ang <i xml:lang="es" lang="es">
	artilleria</i> at ilang regimiento ay makikisama sa kanila, kaya't wala 
	silang dapat ikatakot. Ang mga tulisan ay patatawarin at ang isang katlong 
	bahagi ng masamsam ay ibibigay sa kanila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang palatandaan ay isang putok ng 
	kanyon, at sa dahilang hindi dumating-dating ang kanilang inaantay na hudyat, 
	ay inakala ng mga tulisan na sila'y biniro, ang ila'y nangagsiuwi, ang ilan 
	ay nangagsibalik sa kanikanilang bundok at nangakong paghigantihan ang 
	kastila, na makalawa nang nagkulang sa kanyang salita. Sa gayon, silang mga 
	nahuli ay nagnasang gumawa, kahit sa kanilang sarili, at linooban ang isang 
	bahay liwaliwan na nasumpungan, at ipinangangakong ibigay na walang 
	kakulangkulang ang dalawang katlong bahagi ng nasamsam kung paghahabulin ng 
	kastilang maputi ang buhok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa 
	pagkakawangki sa anyo ni Simoun ng mga tinurang ayos ay ipinalagay na hindi 
	katotohanan ang mga pahayag na iyon, kaya't binigyan ng katakottakot na 
	pahirap ang magnanakaw, sampu ng makina electrica, dahil sa gayong 
	kahalayhalay na tungayaw. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Datapwa't ang balitang pagkawala ng mag-aalahas na 
	napuna ng lahat ng taga Escolta, at dahil sa pagkakatagpo ng mga bayong ng 
	pulbura at maraming punlo sa kanyang bahay, ay nagkaroon ng wariy 
	katotohanan ang pahayag ng tulisan at unti-unting kumalat ang lihim, na 
	nababalot ng ulap, nangagbulong-bulungan, umuubo, na ang tingiy 
	nanganganib, mga <i xml:lang="es" lang="es">puntos suspensivos</i> at 
	maraming salitang pinalalaki na ukol sa mga gayong mga pangyayari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	nakabatid ng lihim ay hindi matapos tapos sa pagkakamangha, inihahaba ang 
	mga mukha, nangamumutla at kunti nang nasiraan ng isip ang marami nang 
	mapag-alaman ang ilang bagaybagay na hindi napuna.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabutit 
	nakaligtas tayo! Sino ang makapagsasabi....?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinahapunan, si Ben-Zayb, na punong puno ng mga rebolber at bala ang mga 
	bulsa, ay dumalaw kay Don Custodio, na natagpuang masigasig na 
	gumagawa ng isang panukala na laban sa mga mag-aalahas na amerikano. 
	Bumulong na marahang marahan sa tainga ng mamamahayag ng mga mahiwagang 
	salita sa pag-itan ng dalawang palad na pinagtaklop.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunay ba?--ang 
	tanong ni Ben-Zayb na idinukot ang kamay sa bulsa, samantalang namumutla ng 
	bahagya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At kahit 
	saan matagpuan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinapos ang 
	salita sa isang galaw na makahulugan. Itinaas ang dalawang kamay hanggang 
	pantay mukha, na ang kanan ay lalo pang baluktot kay sa kaliwa, ang mga 
	palad ay tungo sa ibaba, ipinikit ang isang mata at makalawang gumalaw ng 
	papasulong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Psst, 
	psst!--ang kanyang sipol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang mga 
	brillante?--ang tanong ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	matatagpuan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At gumawa ng 
	isa pang kilos sa pamagitan ng mga daliri ng kanang kamay, na pinaikit-ikit 
	mula sa harap hanggang sa likod at mula sa labas na papaloob, na wari kilos 
	ng pamaypay na natitiklop, waring may iniipon, mga labayang umiikit na 
	pumapalis nang patungo sa kanya, na malinis ang pagkakapangdukot. Sinagot ni 
	Ben-Zayb ng isa ring kilos, na pinapangdilat na mabuti ang mga mata, 
	binalantok ang mga kilay at malakas na lumangap ng hangin, na waring ang 
	hanging nakabubusog ay <span class="locked">natuklasan na.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Jhs!!!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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