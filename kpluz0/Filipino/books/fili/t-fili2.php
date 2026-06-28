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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">II. Sa Silong ng Kubyerta</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Sa silong ay 
	iba naman ang nangyayari. Nangakaupo sa bangko at sa maliliit na luklukang 
	kahoy, kasalamuha ng mga maleta, bakol at tampipi, sa kalapit ng makina, 
	init ng kaldera, singaw ng katawang tao at mabahong amoy ng langis, ay 
	naroon ang lalong makapal na taong sakay.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Tinatanaw na 
	matahimik ng ilan ang sarisaring anyo ng mga pampangin sa gitna ng 
	dagundong ng mga pala, ingay ng makina, sagitsit ng nakatatanang singaw, 
	buluwak ng tubig na nahahalo, pasuwit ng pakakak. Sa isang sulok, 
	nagkakapipisang wariy bangkay, ay natutulog o nagtatangkang matulog ang 
	ilang intsik na mamimili, mga liyo, nangamumutla, sumasago ang laway sa mga 
	nakangangang bibig, at naliligo sa malagkit na pawis ng kanilang katawan. 
	</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang ilang binata lamang, na ang karamihan ay nangag-aaral, madaling makilala 
	dahil sa kanilang kagayakang lubhang maputi at sa maayos na kiyas, ang 
	nangangahas magyao't dito sa popa at proa, na palundaglundag sa mga bakol at 
	kaha, masasaya dahil sa nalalapit na pagpapahinga sa pag-aaral. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mayamaya'y 
	pinagtatalunan ang mga galaw ng makina, na inaalaala ang napag-aralan, at 
	mayamaya'y nangagpapaligidligid sa mga binibining kolehiala, sa maghihitsong 
	may mapupulang labi at may kuwintas na sampaga, at inaapungutan ang mga 
	dalaga ng mga salitang nagpapatawa o ikipinagtatakip sa mukha ng mga 
	pamaypay na may pinta.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	dalawa ay hindi nakikihimasok sa mga maglalakbay na babae kundi 
	nakikipagtalo, sa may dakong proa, sa isang matanda na may makiyas at 
	matuwid na tindig. Silang dalawa'y kapwa kilala at iginagalang mandin 
	alinsunod sa tinging ipinatatanaw sa kanila ng iba. Ang pinakamatanda nga sa 
	dalawa, na pulos na itim ang kagayakan, ay si Basilio na nag-aaral sa 
	Medisina, kilala dahil sa kanyang mabubuting panggagamot at mga 
	kahangahangang pangangalaga sa mga may sakit. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang isa, ang malaki at malusog 
	ang katawan, kahit bata kay sa una, ay si Isagani na isa sa mga makata o kun 
	di man makata ay manunulang lumabas ng taong iyon sa Ateneo, may tanging 
	kaugalian, parating walang kibo at lubhang malungkutin. Ang matandang 
	katungo nila ay si kapitang&nbsp;Basilio na namili sa Maynila.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Opo, 
	mabutibuti na si Kapitan&nbsp;Tiago,--ang sabi ng nag-aaral na iginagalaw ang 
	ulo--ayaw pumayag sa anumang pangangalaga...... Sa udyok ng <em>ilan</em> ay 
	pinatungo ako sa <abbr title="San">S.</abbr>&nbsp;Diego, sa kadahilanang dalawin 
	ko ang bahay doon, ngunit ang tunay na sanhi ay upang makahitit lamang siya 
	ng apian.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Sa pagsasabi 
	ng nag-aaral ng salitang <em>ilan</em> ay si <abbr>Pa</abbr>dre&nbsp;Irene ang 
	tinutukoy, matalik na kaibigan at tanungan ni Kapitan&nbsp;Tiago sa mga huling 
	araw ng kabuhayan nito.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang apian ay 
	isa sa mga salot ng kapanahunang ito--ang sabing paalipusta't pagalit ni 
	kapitan, na wariy senador romano--nakilala rin ng mga tao sa una ang apian, 
	ngunit hindi nangagpakalabis. Samantalang nanagumpay ang pagkakahilig sa 
	pag-aaral sa mga <i xml:lang="es" lang="es">clasico</i> (liwanagin ninyong 
	mabuti, mga binata), ang apian ay naging gamot lamang, at kung hindi, ay, 
	sabihin ninyo sa akin kung sino ang nangagsisihitit. Ang mga intsik, ang mga 
	intsik na hindi nakaaalam ng isa mang salitang latin! Ah, kung pinag-aralan 
	lamang ni Kapitan&nbsp;Tiago si <span xml:lang="es" lang="es">Ciceron</span>!......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At ang di 
	kasiyahang loob na lalong <i xml:lang="es" lang="es">clasico</i> ay nabakas 
	sa mukha niyang <i xml:lang="es" lang="es">epicureo</i> na ahit na ahit. 
	Pinagmamasdan siyang mabuti ni Isagani: ang matandang iyon ay nagdaramdam ng 
	kauhawan sa matatandang bagay.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	balikan natin ang tungkol sa Akademia ng wikang kastila--ang patuloy ni 
	kapitang&nbsp;Basilio--pinatutunayan ko sa inyong hindi ninyo magagawa......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magagawa po, 
	inaantay na lamang namin ngayon o bukas ang pahintulot--ang sagot ni 
	Isagani--si <abbr>Pa</abbr>dre&nbsp;Irene, na marahil ay nakita ninyo sa itaas, na 
	hinandugan namin ng dalawang kabayong <i xml:lang="es" lang="es">casta&ntilde;o</i>, 
	ay nangako na sa amin. Kaya't makikipag-usap sa General.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	kabuluhan iyon; laban si <abbr>P.</abbr>&nbsp;Sibyla.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lumaban man 
	siya! Kaya nga't kasama upang...... sa <span xml:lang="es" lang="es">
	Los&nbsp;Ba&ntilde;os</span>, sa harap ng General.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	pagsasabi ng ganito'y pinagbubunggong pasuntok ng nag-aaral na si Basilio 
	ang kanyang dalawang kamay.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Batid ko 
	na!--ang tugong tumatawa ni kapitang&nbsp;Basilio.--Ngunit kahit ninyo makuha ang 
	pahintulot, saan kukuha ng salapi?......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon na po 
	kami; ang bawa't nag-aaral ay aambag ng sikapat.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ang 
	mga magtuturo?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon kami; 
	ang kalahatiy pilipino at ang kalahatiy kastila.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang bahay?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Makaraig, 
	idudulot ng mayamang si Makaraig ang isa niyang bahay.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Napahinuhod si 
	kapitang Basilio; naihanda ng mga binatang iyon ang lahat ng kailangan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kun sa 
	bagay,--anyang kinibit ang balikat,--ay hindi lubhang masama ang panukala, at 
	yamang hindi na mangyayaring mapag-aralan ang latin, ay mapag-aralan man 
	lamang ang wikang kastila. Diyan ninyo makikita tukayo, ang katunayan ng 
	paurong na lakad natin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Noong aming kapanahunan ay nag-aaral kami ng latin, 
	sapagka't ang lahat ng aming mga aklat ay nasa wikang latin; ngayon ay 
	kaunting latin na lamang ang inyong pinag-aaralan, ngunit wala kayong mga 
	aklat sa wikang latin; sa isang dako naman, ang mga aklat ninyo'y nasa 
	wikang kastila at hindi itinuturo ang wikang ito: <i xml:lang="la" lang="la">
	aetas parentum pejor avis tulit nos nequiores!</i> gaya ng sabi ni Horacio.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At masabi 
	ito'y lumayong nagmamalaki na waring isang emperador romano.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyang mga tao 
	sa una,--ani Isagani,--ay may puna sa lahat; ipalalagay mo sa kanila ang isang 
	bagay at walang makikitang kabutihan kun di pawang salabid. Ibig nilang 
	dumating na lahat ng palas at bilog na wariy bola ng bilyar.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang amain mo 
	ang kasundong-kasundo niya--ang wika ni Basilio;--paguusapan iyong kanilang 
	kapanahunan.... Hintay ka nga pala, ano ang sabi-sabi ng amain mo kay 
	Paulita?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani ay 
	namula.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinermonan 
	ako ng ukol sa pag-aasawa.... Sinagot ko siyang sa Maynila ay walang kaparis 
	niya, maganda, may pinag-aralan, ulila......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayamang-mayaman, makisig, masaya at walang kasiraan kung di ang 
	pagkakaroon ng isang inaling tiwali sa langit at sa lupa,--ang dugtong na 
	tumatawa ni Basilio.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani man 
	ay napatawa rin.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabanggit nga 
	pala ang ali, alam mo bang ipinagbilin sa aking hanapin ko ang kanyang 
	asawa?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Aling&nbsp;Victorina? At nangako ka naman upang huwag kang mawalan ng iniirog?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mangyari pa! 
	Ngunit ang bagay nito'y sa bahay pa naman ng amain ko.... nagkakanlong ang 
	asawa.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Kapuwa sila 
	nagkatawanan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ito ang 
	sanhi,--ang patuloy ni Isagani--kung kaya ang aking amain, taong matalino, ay 
	ayaw pumasok sa kamara, dahil sa nangingilag na baka itanong sa kanya ni 
	Aling&nbsp;Victorina, si <abbr>Do</abbr>n&nbsp;Tiburcio. Akalain mo bang ng mabatid ni 
	Aling&nbsp;Victorina na ang bayad ko'y '<span xml:lang="es" lang="es">de tercera</span>' 
	ay tiningnan ako ng wari pakutya....</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay pumapanaog si Simoun, at ng makita ang dalawang
	<span class="locked">binata ay:</span></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba, 
	Basilio!,--ang bating may kiyas mapag-ampon--Patungo baga kayo sa 
	pagpapahinga? Ang ginoo ba'y kababayan ninyo?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinakilala ni 
	Basilio si Isagani at ipinabatid na hindi sila magkababayan, ngunit ang 
	kanilang mga bayan ay magkakalapit. Si Isaganiy taga kabilang baybayin.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Pinagmasdan ni 
	Simoun si Isagani, kaya't ng mainip ito'y hinarap na wari hinahamon ang 
	nagmamasid sa kanya.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ang 
	lagay nang lalawigan?--ang tanong ni Simoun na liningon si Basilio.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit, hindi 
	pa ba ninyo kilala?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Papaano bang 
	makikilala ko, sa hindi pa ako natutungtong sa lupa niya? May nagsabi sa 
	aking napakamaralita't hindi bumibili ng mga hiyas.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi kami 
	bumibili, sapagka't hindi namin kailangan--ang biglang sagot ni Isagani, na 
	nagdamdam.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Isang ngiti 
	ang nabadha sa maputlang mga pisngi ni Simoun.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag po 
	kayong magalit, binata,--ang sabi:--wala akong masamang tangka, ngunit sa 
	dahilang pinatibayan sa akin, na ang lahat ng <i xml:lang="es" lang="es">
	curato</i> ay nasa kamay ng mga klerigong taga rito, ani ko, ay: ang mga 
	prayle ay nagpapakamatay sa isang <i xml:lang="es" lang="es">curato</i> at 
	pinasasalamatan na ng mga pransiskano yaong pinakamaralita, kaya't pag 
	ganyang ipinauubaya nila sa mga klerigo ay sa dahilang doon ay hindi kilala 
	ang mukha ng hari. Siya, mga ginoo, halina kayong magsiinom ng serbesa, 
	patungkol sa ikatitighaw ng Lalawigan!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	binata'y nagpasalamat at nagsabing hindi sila umiinom ng serbesa, upang 
	makaiwas.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Masama iyang 
	ginagawa ninyo,--ang sabi ni Simoun na masama ang loob;--ang serbesa ay isang 
	mabuting bagay, at nadinig kong sinabi kanginang umaga ni <abbr>P.</abbr>&nbsp;Camorra, 
	na ang kakulangan sa lakas na napupuna sa bayang ito, ay alinsunod sa 
	napakaraming tubig na iniinom ng mga tao rito.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani na 
	halos kasingtaas ng mag-aalahas, ay tumuwid:</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sabihin ninyo 
	kay <abbr>P.</abbr> Camorra,--ang sabi kaagad ni Basilio, na sinikong palihim 
	si Isagani--sabihin ninyo sa kanya, na kung tubig ang iniinom niya at hindi 
	alak o serbesa, marahil ay ikabuti ng lahat at hindi pa siya magiging sanhi 
	ng bulungbulungan......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sabihin 
	ninyo sa kanya--ang dugtong ni Isagani, na hindi pinuna ang pagsiko ng 
	kanyang kaibigan--na ang tubig ay matamis at napaiinom, ngunit lumulunod sa 
	alak at sa serbesa at pumapatay sa apoy; na pag pinaiinit ay nagiging sulak, 
	na pag namumuhi ay nagiging karagatang malawak at minsan ay pumugnaw na sa 
	katauhan at pinapanginig ang mundo.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Itinaas ni 
	Simoun ang ulo, at kahit ang tingin niya'y hindi makita dahil sa pagkatakip 
	ng salaming asul, ay nakita sa kanyang mukha ang paghanga.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mainam na 
	tugon!--ang sabi--ngunit nangangamba akong baka idaan sa biro at itanong sa 
	akin kung kailan magiging sulak ang tubig at kung kailan magiging karagatang 
	malawak. Si <abbr>P.</abbr>&nbsp;Camorra ay may pagka hindi paniwalain at 
	napakapalabiro.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag siya'y 
	pinainit ng apoy, pag ang mumunting ilog na sa ngayo'y nagkakahiwahiwalay pa 
	sa kanikanilang madawag na pinanggagalingan ay magkaisang bumuhos na aboy ng 
	kasawian sa banging hinuhukay ng mga tao--ang sagot ni Isagani.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, 
	ginoong Simoun--ang dugtong ni Basilio na inihulog sa biro ang salitaan.--Ang 
	mabuti pa'y ulitin ninyo sa kanya ang mga tulang ito, ng kaibigang Isagani:</font></p>
											<div class="poem-container">
		<blockquote class="poem">
			<div class="stanza">
				<div class="i4">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Kami ay tubig at kayo'y apoy</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					ang wika ninyo; kamiy sang-ayon!</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					mamuhay tayo ng mahinaho't</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					huwag patanaw sa sunog, ngayon,</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					na magkababag! Kun di magtulong</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					sa lilim niyong bihasang dunong.</font></div>
			</div>
			<div class="stanza">
				<div class="i4">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Sa loob niyong isang kaldera,</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					walang sigalot at pagbabaka'y</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					gawin ang sulak, na, ikalima</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					sa <i xml:lang="es" lang="es">elemento</i>, na magbubunga</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					niyong liwanag, ilaw, pagtumpa</font></div>
				<div class="i0">
					<p align="left" style="margin-left: 40px; margin-top:0; margin-bottom:0">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					sa karapata't pagkabihasa.</font></div>
			</div>
		</blockquote>
	</div>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	pangyayari, walang pangyayari!--ang biglang sagot ni Simoun--ang makina ay 
	hahanapin pa...... samantala'y tutungain ko ang aking serbesa.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">At iniwan ng 
	walang paalam ang dalawang magkaibigan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ano 
	ka ba mayroon at napakamapanghamok ka ngayon?--ang tanong ni Basilio.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala, aywan 
	ko, ngunit ang taong iyan ay nakasisindak sa akin, halos nakatatakot.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinisiko 
	kita, e: hindi mo nalalamang ang tawag diyan ay
	<span xml:lang="es" lang="es">Cardinal&nbsp;Moreno</span>?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Cardinal 
	Moreno?</span></font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--O
	<span xml:lang="es" lang="es">Eminencia negra</span>, kung papaano mo ibig.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi kita 
	mawatasan!</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si
	<span xml:lang="fr" lang="fr">Richelieu</span> ay may isang tanungang 
	kaputsino na pinanganlang <span xml:lang="es" lang="es">Eminencia&nbsp;Gris</span>; 
	ito'y siya namang tanungan ng General......</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga ba?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gayon ang 
	nadinig ko sa <em>ilan</em>...... na nagmumura sa kanya kung siya'y 
	nakatalikod, at pinupuri siya kung kaharap.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dumadalaw din 
	ba kay Kapitan&nbsp;Tiago?</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mula ng unang 
	araw nang kanyang pagdating, at ang katunayan ay <em>may isang</em> 
	nag-aakalang kaagaw niya...... sa pagmamamana...... At inaakala ko na 
	makikipagkita sa General tungkol sa usap na ukol sa pagtuturo ng wikang 
	kastila.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Nang sandaling 
	iyon ay lumapit ang isang alila upang sabihin kay Isagani na tinatawag ng 
	kanyang amain. Sa isang banko sa popa at kasalamuha ng ibang kasakay ay 
	nakaupo ang isang klerigo na minamasdan ang anyo ng mga tanawing nagdadaan 
	sa kanyang paningin. Niluluwagan siya ng kanyang mga kalapit; pag nagdaraan 
	sa tabi niya ang mga lalakiy nangagpupugay at ang mga manunugal ay hindi 
	nakapangangahas na ilagay ang dulang na pinaglalaruan sa kalapit niya. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	paring iyon ay bibihirang magsalita, hindi humihitit ni hindi umaanyong 
	mapagmataas, hindi nahihiyang makihalo sa ibang tao at tumutugong malumanay 
	at maayos sa mga pagpupugay sa kanya na waring ikinadadangal niya at 
	kinikilala ang gayon. Siya'y lubhang matanda na, ang buhok ay pawang puti, 
	ngunit ang kanyang pangangatawan ay mabuti, at, kahit nakaupo ay tuwid ang 
	katawan at taas ang ulo, datapwa'y hindi mapagmalaki at mapalalo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Naiiba sa 
	karamihan ng klerigong indio, na lubha namang kaunti, na ng kapanahunang 
	iyon ay gumaganap sa pagkakoadhutor o nangangasiwang pangsamantala sa ilang 
	kurato, dahil sa kanyang pagkamalumanay at ugaling tuwid na taglay noong may 
	lubos na pagkakilala sa karangalan ng kanyang kalagayan at kabanalan ng 
	kanyang tinutungkol. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang munting pagsisiyasat sa kanyang anyo, kundi man 
	dahil sa kanyang buhok na puti, ay mapag-uunawa kaagad na siya'y nauukol sa 
	malayong panahon, sa nakaraang kapanahunan, noong ang mga mabubuting binata 
	ay hindi nangingiming ilaan ang kanilang karangalan sa pagiging pari, noong 
	ang mga klerigo ay kasingpantay sa kalagayan ng sino mang prayle, at noong 
	ang kagaya niya, na hindi pa dusta at alimura, ay humihingi ng mga taong 
	malaya at hindi alipin, matatayog na pag-iisip at hindi budhing api. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa kanyang mukhang malungkot at anyong mapagtapat ay napagkikilala ang 
	katiwasayan ng kanyang kaluluwang pinatibayan ng pag-aaral at pagkukuro, at 
	marahil ay sinubukan na ng mga sariling pagtitiis ng damdamin. Ang klerigong 
	iyon ay si <abbr>Pa</abbr>dre&nbsp;Florentino na amain ni Isagani at ang kasaysayan 
	ng kanyang buhay ay lubhang maikli.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Anak ng isang 
	liping mayaman at kilala sa Maynila, mainam ang tindig at may kasapatang 
	mabantog, ay hindi nagkaroon kailan man ng hilig sa pagpapari; ngunit dahil 
	sa ilang pangako ng kanyang Ina ay pinilit siyang pumasok sa Seminario 
	matapos ang di kakaunting pagtutunggali at matinding pagtatalo. Ang Ina'y 
	may matibay na pakikipagkilala sa Arsobispo, may matigas na loob at walang 
	pagbabago sa anumang maisip, na gaya ng sino mang babaeng may pag-aakalang 
	umaalinsunod sa hangad ng&nbsp; Diyos . </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Walang nangyari sa tutol ng binatang si 
	Florentino, hindi nagkabisa ang samo, walang nahita sa pagsasabing siya'y 
	may iniibig at gumawa na tuloy ng gulo; magpapari siya at ng umabot sa 
											dalawampu't limang taon ay naging pari; ang Arsobispo ay siyang naggawad 
	sa kanya ng mga <i xml:lang="es" lang="es">orden</i>, ginanap na lubhang 
	maringal ang unang pagmimisa, nagkaroon ng tatlong araw na piging at ang 
	ina'y namatay na masaya at siyangsiya ang kalooban, matapos na maipamana sa 
	anak ang lahat ng kanyang kayamanan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit sa 
	pagtutunggaliang iyon ay tumangap si Florentino ng isang sugat na hindi na 
	gumaling kailan man; mga ilang linggo muna bago ganapin ang una niyang 
	pagmimisa, ang babaeng kanyang pinakagigiliw ay nag-asawa ng wala nang 
	pilipili dahil sa sama ng loob; ang dagok na iyon ay siyang pinakamahapding 
	tinanggap niya; nanghilambot ang kanyang budhi at ang kabuhayan ay naging 
	isa niyang kinamuhian at mabigat na dalahin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kung di man ang kabaitan at 
	pagbibigay dangal sa kanyang kalagayan ay ang pag-ibig na iyon ang nagligtas 
	sa kanya sa banging kinahuhulugan ng paring prayle at hindi prayle dito sa 
	Pilipinas. Hinarap ang kanyang mga nasasakop dahil sa kanyang pagtupad sa 
	katungkulan at pagkakahilig sa mga likas na karunungan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mangyari 
	ang mga kaguluhan noong 72 ay ipinanganib ni <abbr>Pa</abbr>dre&nbsp;Florentino na 
	siya'y mapuna dahil sa kalakihan ng kinikita ng kanyang kurato, at sa 
	dahilang siya'y payapang tao, ay humingi ng pagpapahinga at mula na noon ay 
	nanirahan nang wariy isang taong karaniwan sa mga lupain nilang mag-aanak 
	na nasa baybayin ng dagat&nbsp;Pacifico. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font style="font-size: 13pt" face="Arial" color="#333333">Doo'y inaruga ang isa niyang pamangking 
	lalaki, si Isagani, na alinsunod sa mga masasamang dila ay anak niya sa 
	kanyang dating iniibig, ng mabao, anak sa pagkadalaga ng isang pinsan niyang 
	taga Maynila, alinsunod naman sa mga lalong nakababatid at hindi bulaan.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Nang makita ng 
	Kapitan ng bapor ang klerigo ay pinilitpilit na pumasok sa kamara at umakyat 
	sa kubierta. Upang mapahinuhod lamang siya'y nagsabing:</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung hindi 
	kayo paparoon ay aakalain ng mga prayle na aayaw kayong makisama sa kanila.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">Wala nang 
	nagawa si <abbr>Pa</abbr>dre&nbsp;Florentino kundi ang sumunod at ipinatawag ang 
	kanyang pamangkin upang pagsabihan ng nangyayari at ipagbilin na huwag 
	lalapit sa kamara samantalang siya'y naroroon.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung makikita 
	ka ng Kapitan ay aanyayahan ka at magpapakalabis naman tayo.</font></p>
	<p align="justify" style="margin-left: 80px; margin-right: 80px"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Paraan ng 
	aking amain!--ani ni Isagani sa sarili--wala namang dahilan kung di upang 
	huwag lamang akong makausap ni Aling&nbsp;Victorina.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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