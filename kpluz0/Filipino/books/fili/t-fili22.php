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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXII. Ang Palabas</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang anyo ng 
	dulaan ay masimbuyo; punongpuno, at sa <i xml:lang="es" lang="es">entrada 
	general</i>, sa mga daanan ay maraming tao ang nakikitang nakatayo, 
	nagkakahirap sa pagtataas ng ulo o makasilip man lamang sa pagitan ng isang 
	liig at isang tainga. Ang mga palkong walang takip, na ang karamihan ay puno 
	ng mga babae, ay nag-aanyong pangnan ng bulaklak, na ang mga talulot ay 
	pinagagalaw ng mahinang simuy (ang tinutukoy namin ay ang mga pamaypay) at 
	doo'y naghuhumbahan ang libu-libong hayophayupan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa dahilang may mga 
	bulaklak na masasarap o matitindi ang amoy, mga bulaklak na pumapatay at mga 
	bulaklak na nakaaaliw, sa mga pangnan ng ating dulaan ay nasasamyo rin ang 
	mga gayong amoy, nakadidinig ng mga salitaan, usapan, mga salitang 
	sumisigid at ngumangatngat. May tatlo o apat na palko lamang ang walang 
	laman kahit napakagabi na. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ikawalo't kalahati ang takdang pagsisimula ng 
	palabas, ngunit kulang na lamang ng labinglimang minuto sa ika siyam ay 
	hindi pa itinataas ang tabing sapagka't ang Capitan General ay hindi pa 
	dumarating. Ang mga nasa <span xml:lang="es" lang="es">entrada general</span>, 
	inip na't siki sa kanilang mga uupan, ay nanggugulo na't nag-iingay sa 
	kapapadyak at kapapalo ng mga tungkod sa tuntungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bum, bum, 
	bum! buksan na ang tabing! bum, bum, bum!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang mga artillero ay siyang lalong maiingay. Ang mga kaagaw ni Marte, gaya 
	ng tawag sa kanila ni Ben-Zayb, ay hindi nasisiyahan sa tugtuging ito; 
	sapagka't inaakala marahil na sila'y nasa sa isang '<i xml:lang="es" lang="es">plaza 
	de toros</i>' ay binabati ang mga babaeng magdaan sa kanilang harap ng mga 
	salitang dahil sa pabaligtad na banggit ay tinatawag na bulaklak, sa Madrid, 
	gayong kung minsan ay nangahahawig sa umaalingasaw na yamutmot. Hindi 
	pinapansin ang mga pagalit na tingin ng mga asawa at ipinahahayag nang 
	malakas ang mga damdamin at mga pagnanasang pinabubukal sa kanilang kalooban 
	ng gayong karaming kagandahan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga butaka, 
	na waring kinatatakutang babaan ng mga babae, sapagka't wala roon ni isa man 
	sa kanila, ay isang alingawngaw nang bulongbulungan ang naghahari, tawanang 
	pinipigil, sa gitna nang ulap na aso.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Pinagtatalunan ang kabutihan ng mga 
	artista, pinag-uusapan ang mga kaguluhan, na ang General ay nakipagkagalit 
	sa mga prayle, na kung ang pagparoon ng General sa palabas na iyon ay isang 
	paghamon o isang pagnanasa lamang na makakita. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hindi ang mga bagay na ito 
	ang iniisip ng iba kungdi ang akitin ang paningin ng mga babae sa tulong ng 
	pag-upong mabikas, na wariy mga estatua, at pinagagalaw ang mga suot na 
	singsing, lalonglalo na kung inaakalang sila'y tinutudlaan ng walang humpay 
	na katitingin ng isang <i>largabista</i>; ang iba'y bumabati sa gayong babae o binibini na iniyuyuko ng kaunti ang ulo, samantalang ibinubulong sa
	<span class="locked">kalapit na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kakutyakutya! 
	nakaiinis!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	babae'y sasagot sa pamagitan ng lalong masarap niyang ngiti at isang kalugodlugod na 
	galaw ng ulo, at bumubulong sa kaibigang nakikisang-ayon, sa pagitan ng 
	dalawang galaw na banayad ng <span class="locked">pamaypay, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakamahangin! Ulol na sa pag-ibig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	nama'y dumadalas ang kapapalo: bum, bum, bum! tok-tok-tok! wala nang 
	natitirang walang laman kungdi dadalawang palko at ang sa General na 
	natatangi dahil sa mga tabing na tersiopelong pula. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang orkesta ay tumugtog 
	ng isa pang balse, ang taong naroroon ay tumututol; mabuti na lamang at 
	dumating ang isang maawaing magiting na nakalibang sa madla't nakapagligtas 
	sa may ari ng palabas; isang ginoong umupo sa isang butaka at ayaw tumindig 
	ng dumating ang may-ari ng luklukan, na dili iba't ang mapagbulaybulay na si
	Don Primitivo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang makita ni Don Primitivo na hindi 
	makahinuhod sa taong iyon ang kanyang pangangatwiran ay tinawag ang 
	taga-ayos.--Ayokong tumindig! ang tugon ng magiting na lalaki na hinihitit na 
	payapang payapa ang kanyang sigarilyo. Ang taga-ayos ay lumapit sa 
	namamahala.--Ayokong tumindig! ang ulit at nagpakabuti sa pag-upo. Ang 
	namamahala'y umalis samantalang ang mga artillero sa entrada ay sabaysabay 
	na <span class="locked">umaawit ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa hindi! Sa 
	oo! Sa hindi! Sa oo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang taong 
	iyon, na napuna nang lahat, ay nag-akalang ang pag-urong ay ikabababa niya, 
	kaya't nangunyapit sa butaka samantalang inuulit ang kasagutan sa dalawang
	<i xml:lang="es" lang="es">veterana</i> na tinawag ng namamahala. 
	Alang-alang sa tinataglay na katungkulan ng naglalaban ay tinawag ng mga 
	bantay ang kabo, samantalang ang lahat ng taong naroroon ay bumigay ng 
	matinding pagakpakan at pinupuri ang katigasan ng ginoong iyon na patuloy 
	rin sa pagkakaupo na wariy isang senador romano.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nadinig ang 
	pasuwitan at galit na lumingon ang ginoong may matigas na kalooban sapagka't 
	inakalang siya ang sinusutsutan: nadinig ang takbuhan ng mga kabayo, 
	naramdaman ang kilusan; ang sino man ay mag-aakalang sumabog ang isang 
	himagsikan o kun di man ay isang pagkakagulo; hindi, inihinto ng orkesta ang 
	balse at tinugtog ang <i xml:lang="es" lang="es">marcha real.</i> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang 
	marangal na Capitan General at Gobernador nang sangkapuluan ang dumarating: 
	hinanap siya ng lahat nang mata, sinundan siya ng tingin, nawala at sa 
	kahulihulihan ay natanaw sa kanyang palko, at, matapos na makatingin sa 
	lahat ng pook at magawang mapalad ang ilan sa pamamagitan ng isang 
	makapangyarihang bati, ay umupo na waring isang tao sa ibabaw ng isang 
	sillon na nag-aantay sa kanya. Saka pa lamang huminto ang mga artillero at 
	tinugtog ng orkesta ang pasimula.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ating mga 
	nag-aaral ay nasa isang palkong katapat ng kinalalagyan ng mananayaw na si 
	Pepay. Ang palkong ito'y handog ni Makaraig na nakipag-alam na sa babae upang mapalambot si Don Custodio. Nang hapong iyon ay sumulat si 
	Pepay sa bantog na mamamalagay, na nag-aantay ng kasagutan at tinipanang 
	magtagpo sila sa dulaan. Dahil dito, kahit na pinakalabanlabanan ni <abbr>
	D.</abbr>&nbsp;Custodio ang operetang pranses, ay naparoon din sa dulaan, bagay 
	na naging sanhi ng mga pasaring na pinatatama sa kanya ni Don Manuel, 
	ang kanyang malaon nang kalaban sa mga pulong ng Ayuntamiento.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naparito ako 
	upang hatulan ang opereta!--ang tugon na wariy isang Caton na nasisiyahan sa 
	sariling budhi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Makaraig 
	nga ay nakikipaghudyatan sa tingin kay Pepay na ang ibig sabihin nito'y 
	mayroong ipababatid; at sa dahilang masaya ang mukha ng mananayaw, ay 
	sinasapantaha na ng lahat na ang tagumpay ay napagtibay na. Si Sandoval, na 
	kararating pa lamang na galing sa pagdalaw sa ibang palko, ay nagpatibay na 
	ang kapasiyahan ay naging sang-ayon, at ng hapon ding yaon sinuri ng 
	kataastaasang lupon at sinang-ayunan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Pawa ngang kagalakang lahat; sampu ni 
	Pecson ay nakalimot sa kanyang pagka di mapaniwalain sa mabubuting balita 
	dahil sa namamalas na si Pepay ay nakangiting ipinakikita ang isang sulat; 
	si Sandoval at si Makaraig ay kapwa nagdudulutan ng maligayang bati, si 
	Isagani lamang ang natitirang malamig at bahagya nang mangiti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ano ang 
	nangyari sa binata?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang pumasok 
	si Isagani sa dulaan ay nakita si Paulita sa isang palko at kinakausap ni 
	Juanito Pelaez. Siya'y namutla't sinapantahang siya'y nagkamali. Ngunit 
	hindi, sadyang ang binibini ang naroroon na bumabati sa kanya ng isang 
	masarap na ngiti samantalang ang magagandang mata'y waring humihinging tawad 
	at nangangakong isasaysay ang sanhi noon. Sadya ngang silang dalawa'y 
	nagkasundo na si Isagani muna ang papasok upang tingnan kung sa palabas ay 
	walang anumang hindi nararapat mapanood ng isang binibini, at saka ngayon ay 
	natagpuan doon na kasama pa naman ng kanyang kaagaw. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang dumanas sa kaluluwa 
	ni Isaganiy hindi maisasaysay: galit, panibugho, pagkaduhagi, pagdaramdam, 
	ang bumayo sa kalooban ng binata: may sandaling ninasa na ang dulaan ay 
	gumuho; tinangkang humalakhak ng malakas, alimurahin ang kanyang iniibig, 
	hamunin ang kanyang kaagaw, gumawa ng gulo, ngunit ang nayari sa kanyang 
	loob ay ang umupong dahandahan na lamang at huwag tingnan ni minsan ang 
	binibini. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nadidinig ang mga munakala nina Makaraig at Sandoval, ngunit 
	waring sa kanya'y malalayong alingawngaw ang gayon: ang mga himig ng balse 
	ay waring malulungkot at nakahahambal sa ganang kanya; ang mga naroroon ay 
	pawang hunghang at baliw, at makailang kinailangan niya ang magpigil upang 
	maimpit ang pagluha. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Bahagya na niyang napuna ang nangyari sa ginoong ayaw 
	tumindig sa butaka at ang pagdating ng Capitan General; ang tinatanaw niya 
	ay ang tabing ng paglalabasan na may pintang anyong daanan, sa pag-itan ng 
	malalaking tabing na mapupula, na tanaw sa isang halamanang sa gitna'y may 
	daluyan ng tubig. Gaano kalungkot, sa wari niya, ang daanang yaon at gaano 
	kalamlam nang anyo nang tanawin! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											libu-libong pagbubulay na walang linaw ang 
	sumisipot sa kanyang alaala, na wariy malalayong ulinignig ng tugtugang 
	nadidinig sa kinagabihan, wariy himig ng isang awit ng panahon ng kabataan 
	niya, alingawngaw ng ulilang kagubatan at mapapanglaw na batisan, mga gabing 
	may buwan sa tabi ng dagat na nalalatag ng buong kalaparan sa harap ng 
	kanyang paningin.... At ang umiibig na binatang nag-aakalang napakasawing 
	palad siya ay tumingatingala sa bubungan upang ang mga patak ng luha'y huwag 
	makapulas sa kanyang mga mata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Isang matinding pagakpakan ang nakapukaw sa kanyang pag-iisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kabubukas pa 
	lamang ng tabing at naharap sa kanyang mga mata ang masayang pulutong ng mga 
	taong bukid sa <span xml:lang="fr" lang="fr">Corneville</span> na 
	nangakasuot ng gorrang bulak at mabibigat na bakyang kahoy ang nasa paa. Ang 
	mga babae, mga anim o pitong dalaga, na may pahid na pula sa mga pisngit 
	labi, may malalaking guhit na itim sa paligid ng mata upang lalong 
	pakinangin ito, ay ipinamamalas ang kanilang mapuputing bisig, mga daliring 
	puno ng brillante at mga hitang mabibilog na wariy nilalik. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At samantalang 
	inaawit ang mga salitang normando na <i xml:lang="fr" lang="fr">allez, 
	marchez! allez, marchez!</i> ay nangakangiti ng tiyakan sa mga nasa butakang 
	umiirog sa kanila, kaya't matapos na makatingin si Don Custodio 
	sa palko ni Pepay, na wariy ibig matunayang hindi ito gumagawa ng gayon din 
	sa ibang nangingibig, ay itinala sa kanyang kalupi ang kahalayang iyon, at 
	upang lalo pang matunayan ay iniyuko pa ng kaunti ang ulo upang makita kung 
	ang ipinatatanaw ng mga artistang babae ay umaabot hanggang tuhod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--O, ang mga 
	pransesang ito!--ang kanyang bulong, samantalang ang pag-iisip ay nagbubuko 
	ng mga pagpaparisparis at panukala sa isang dakong mataastaas pa ng kaunti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	<i xml:lang="fr" lang="fr">Quoi v'la tous les cancans d'la s'maine!</i>.... 
	ang awit ni <span xml:lang="fr" lang="fr">Gertrude</span>, isang magandang 
	dalaga na sumusulyap ng makahulugang sulyap sa Capitan General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magkakaroon 
	tayo ng <i xml:lang="fr" lang="fr">cancan</i>!--ang bulalas ni Tadeo, ang 
	nakakuha ng unang ganting pala sa pranses sa kanyang klase, at nakaulinig ng 
	tinurang salita.--Mangagsasayaw ng <i xml:lang="fr" lang="fr">cancan</i>, 
	Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At masayang 
	pinagkumos ang kanyang mga kamay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sapol ng 
	buksan ang tabing ay hindi inaalumana ni Tadeo ang tugtugin; wala siyang 
	hinahanap kundi ang kahalayan, ang bagay na malaswa, ang salaulang anyo at 
	kagayakan, at sa tulong ng kaunting pranses na kanyang nalalaman ay 
	tinatalasan ang pangdinig upang huwag mapalampas ang mga salitang malalansa 
	na ipinamalita ng mga mahihigpit na taga ayos ng bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Sandoval, 
	na nagsasabing mabuti siya sa pranses, ay naging wari tagasalin ng kanyang 
	mga kaibigan. Gaya rin ng nalalaman ni Tadeo ang kanyang abot, ngunit 
	malaki ang naitutulong sa kanya ng mga salaysay ng katuturan na inilathala 
	ng mga pahayagan, at ang iba pa'y natatakpan na ng sarili niyang bulaybulay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo--aniya--mangagsasayaw ng kankan at ang babae ang siyang mamamahala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Makaraig at 
	si Pecson ay humanda na sa pakikimatyag at nangakangiti na hindi pa man. Si 
	Isaganiy sa ibang pook tumingin, nakukutyang si Paulita ay nakadalo sa 
	gayong pagtatanghal, at iniisip na dapat hamunin ng patayan sa kinabukasan 
	si Juanito Pelaez.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit walang 
	napala ang kaaantay ng ating mga binata. Dumating si
	<span xml:lang="fr" lang="fr">Serpolette</span>, isang kaigaigayang dalaga, 
	na taglay rin ang gorrang bulak, na nanghahamon at matapang.</font></p>
	<blockquote class="center" xml:lang="fr" lang="fr">
		<p style="margin-left: 40px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hein! qui 
		parle de Serpolette?</font></p>
	</blockquote>
	<p class="conti-para" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">ang tanong sa mga 
	dalahira, at ang kamay ay nasa baywang at ang asta'y matapang. Isang ginoo 
	ang pumagakpak at pagkatapos ay sumunod ang lahat nang nasa butaka. Si
	<span xml:lang="fr" lang="fr">Serpolette</span>, kahit hindi iniiwan ang 
	anyo niyang makisig na babae, ay tumingin sa unang pumagakpak at ginanti ito 
	ng isang ngiti, na nagpakita ng maliliit niyang ngipin na wariy isang
	<i xml:lang="es" lang="es">collar</i> na perlas na nakasilid sa isang 
	lalagyang tersiopelong pula. Sinundan ni Tadeo ang tingin at nakita ang 
	isang ginoo, na may balatkayong miyas at may isang napakahabang ilong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Voto 
	al chapiro!</i>--aniya--si Irenillo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo--ang sagot 
	ni Sandoval--nakita ko sa loob, na kausap ng mga artistang babae.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Siya nga, si
	Padre Irene, na isang mawilihing lubha sa musika at nakatataho 
	nang pranses, ay pinaparoon ni Padre Salvi sa dulaan na wariy 
	isang polisiya sekreta; gayon ang kanyang sabi sa mga taong sa kanya'y 
	makakilala. At gaya ng mabubuting manunuri na hindi nasisiyahang tingnan 
	mula sa malayo ang mga bagaybagay, ay tinangka niyang siyasatin sa malapit 
	ang mga artista. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nakihalo sa pulutong ng mga mangliligaw at makikisig, 
	pumasok sa bihisan na pinagdadausan ng mga satsatan at ang wikang pranses na 
	ginagamit ay papilipit, wikang tindang pranses, salitang malinaw na malinaw 
	sa babaeng nagtitinda kailan ma't ang mamimili ay laan sa pagbabayad ng 
	mabuti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si
	<span xml:lang="fr" lang="fr">Serpolette</span> ay nalilibid ng dalawang 
	makiyas na opisial, ng isang mangdaragat at ng isang abogado, nang makitang 
	susuboksubok at pumapasok sa lahat ng pook at mga puwang ang isang mahabang 
	ilong na waring sa tulong noon ay sinisiyasat ang mga kababalaghan ng 
	palabasan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pinigil ni
	<span xml:lang="fr" lang="fr">Serpolette</span> ang pagsasalita, ikinunot 
	ang kilay, itinaas, binuksan ang bibig, at dala ang kaliksihan nang isang
	<span xml:lang="fr" lang="fr">parisien</span> ay iniwan ang mga humahanga sa 
	kanya at tinakbong wariy isang torpedo ang ating manunuri.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="fr" lang="fr">Tiens, 
	tiens, Toutau! mon lapin!</span>--ang bulalas na hinawakan sa bisig si Padre &nbsp;Irene at masayang inalog-alog ito samantalang ipinaiilanlang sa 
	hangin ang kanyang mataginting na tinig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Chut, 
	chut!--ang sabi ni Padre Irene na nagpupumilit makapagkanlong.</font></p>
	<p xml:lang="fr" lang="fr" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--Mais, comment! 
	toi ici, grosse bete! Et moi qui t'croyais....</font></p>
	<p xml:lang="fr" lang="fr" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--'Fais pas 
	d'tapage, Lily! il faut m'respecter! 'suis ici l'Pape!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lubhang 
	naghirap muna si Padre Irene bago napahinuhod ang babae. Ang 
	masayang si <span xml:lang="fr" lang="fr">Lily</span> ay lubhang
	<i xml:lang="fr" lang="fr">enchantee</i> sa pagkakatagpo sa Maynila sa isang 
	dating kaibigan na nagpapaalaala sa kanya ng mga <i xml:lang="fr" lang="fr">
	coulisses</i> ng dulaan ng <span xml:lang="fr" lang="fr">Grande Opera</span>. 
	At yaon nga ang dahil kung kaya't si Padre Irene, sa pagtupad sa 
	kanyang katungkulang pagiging kaibigan at pagkamanunuri, ay nagsimula ng 
	isang pagakpakan upang mapalakas ang loob ng babai: karapatdapat naman si
	<span xml:lang="fr" lang="fr">Serpolette</span> sa gayon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala'y 
	inaantay ng ating mga binata ang kankan; si Pecson ay nagkakandidilat, 
	mayroon ng lahat ng bagay, ang kankan lamang ang wala. Nagkaroon ng isang 
	sandali na kung hindi dumating ang isang taong may katungkulan ay 
	magpapanuntukan na sana ang mga babae, mangagsasabunutan, dahil sa udyok ng 
	mga taong nag-aantay, gaya ng ating mga nag-aaral, na makakita ng higit pa 
	kay sa isang kankan.</font></p>
	<div class="poem-container">
		<blockquote class="poem" xml:lang="fr" lang="fr">
			<div class="stanza">
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Scit, scit, scit, scit, scit, scit,</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Disputez-vous, battez-vous,</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Scit, scit, scit, scit, scit, scit,</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Nous allons compter les coups.</font></div>
			</div>
		</blockquote>
	</div>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang tugtugin ay huminto, nangagsialis ang mga lalaki, unti-unting bumalik ang 
	mga babae at nagsimula sila sa isang pag-uusap na walang nalinawang anuman 
	ang ating mga kaibigan. Ang pinag-uusapan ay pagsira sa isang hindi kaharap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Animo'y mga 
	makaw sa magpapansit!--ang sabing marahan ni Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang 
	kankan?--ang tanong ni Makaraig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pinagtatalunan ang pook na lalong bagay na pagsayawan!--ang tugong walang 
	katawatawa ni Sandoval.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Animo'y mga 
	makaw sa magpapansit!--ang ulit ni Pecson na masama ang loob.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang 
	babaeng kasama ang asawa ay pumasok ng mga sandaling iyon at lumuklok sa isa ng 
	dalawang palkong walang laman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang galaw ay 
	wariy reina at tinitingnan nang pawalang bahala ang buong salas na waring 
	ang ibig sabihin ay: 'Nahuli pa ako kay sa inyo, talaksan ng mga tiwali at 
	malalayo sa tunog ng kampana, dumating akong huli pa kay sa inyo'. Tunay 
	nga, may mga taong pumaparoon sa mga dulaan na kagaya ng mga burro sa 
	takbuhan: nananalo ang huling dumating. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nakakikilala kami ng mga taong 
	lubhang matitino na aakyat na muna sa isang bibitayan kay sa pumasok sa loob 
	ng dulaan bago simulan ang unang bahagi. Ngunit ang katuwaan ng babae'y hindi nagluwat; nakita ang isang palko na wala pang laman; ikinunot ang 
	kilay at kinagalitan ang kanyang mahal na kabiyak at nag-ingay nang di gayon 
	na lamang kaya't ang maraming naroon ay nangayamot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sst! sst!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	hangal! wariy marurunong ng pranses!--anang babae na tumingin ng lubos na 
	paalipusta sa lahat ng dako at tumitig sa palko ni Juanito na sa akala 
	niya'y doon nadinig na nagbuhat ang isang walang pitagang sst.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sadya ngang si 
	Juanito ay may kasalanan; sa simula pa'y kunwaring nauunawa niyang lahat at 
	umaastang ngumingiti, tumatawa at pumapagakpak ng tama, na waring walang 
	nakakakawala sa kanya sa mga sinasabi. Gayong hindi siya umaalinsunod sa 
	kilos ng mga artista sapagka't bahagya ng tumanaw sa pinaglalabasan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sinasadya ng mapagbiro ang pagsasabi kay Paulita, na, dahil sa mayroon 
	namang lalo pang magaganda ay ayaw siyang mapagod sa pagtingin sa malayo.... 
	Si Paulita ay namumula, tinatakpan ng pamaypay ang mukha at palihim na 
	tumitingin sa kinalalagyan ni Isagani, na hindi tumatawa ni pumapagakpak at 
	nanonood na hindi pinupuna ang palabas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Paulita ay 
	nagdamdam ng sama ng loob at panibugho; naiibigan kaya ni Isagani ang mga 
	mapanuksong mga artistang iyon? Ang pag-aakalang ito'y nakapagpasama ng 
	kanyang ulo kaya't bahagya nang nadinig ang mga pagpuring ginawa ni 
	Aling&nbsp;Victorina kay Juanito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ginaganap na 
	mabuti ni Juanito ang kanyang tungkulin; maminsan minsan ay umiiling, tanda 
	ng di kasiyahang loob, at sa gayon naman ay nakadidinig ng ubuhan, 
	alingawngaw sa ilang pook; kung minsan ay ngumingiti, tumatango at makaraan 
	ang sandaliy umuugong ang pagakpakan. Si Aling&nbsp;Victorina ay wilingwili at 
	nagkaroon na tuloy ng hangad na pakasal sa binata sa araw na si Don Tiburcio 
	ay mamatay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Juanito ay marunong ng pranses at si de&nbsp;Espada&ntilde;a ay hindi! At 
	nagsimula na sa pagpapatanaw ng lambing sa binata! Ngunit hindi napupuna ni 
	Juanito ang pagbabagong lakad, dahil sa minamatyagan ang isang mangangalakal 
	na katalan na nasa siping ng konsul na suiso: si Juanito na nakakita sa 
	kanila na nag-uusap sa wikang pranses ay umaalinsunod sa nababakas sa mukha 
	ng dalawa at sa gayong paraan ay nakapang-uulol ng buong buo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagsunod sunod 
	ang mga pangyayari, ang mga tao'y nagsunod sunod sa paglabas, mga masasaya 
	at mapagpatawa gaya ng <i xml:lang="fr" lang="fr">bailli</i> at ni
	<span xml:lang="fr" lang="fr">Grenicheux</span>, mga dugong mahal at 
	nakalulugod gaya ng markes at ni <span xml:lang="fr" lang="fr">Germaine</span>: 
	ang mga nanonood ay nagkatawanang mabuti dahil sa tampal ni
	<span xml:lang="fr" lang="fr">Gaspard</span> na patungkol sa duwag na si
	<span xml:lang="fr" lang="fr">Grenicheux</span> ngunit ang nakatanggap ay 
	ang mahinahong <i xml:lang="fr" lang="fr">bailli</i>, sa peluka nitong 
	umilandang, sa kaguluhan at sa kaingayan nang ibaba ang tabing.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang 
	kankan?--ang tanong ni Tadeo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit agad 
	na itinaas ang tabing at ang tagpuan ay naging anyong tiange ng mga alila, 
	may tatlong haliging kinalalagyan ng mga sagisag at may dalang mga pahayag 
	na <i xml:lang="fr" lang="fr">servantes</i>, <i xml:lang="fr" lang="fr">
	cochers</i> at <i xml:lang="fr" lang="fr">domestiques</i>. Sinamantala ni 
	Juanito ang pagkakataon, at, malakas na sinabi kay Aling&nbsp;Victorina upang 
	madinig ni Paulita at ito'y manalig sa kanyang karunungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang kahulugan 
	ng <i xml:lang="fr" lang="fr">servantes</i> ay mga
	<i xml:lang="es" lang="es">sirviente</i>, ang <i xml:lang="fr" lang="fr">
	domestiques</i> ay <i xml:lang="es" lang="es">domestico</i>....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ang 
	kaibhan ng mga <i xml:lang="fr" lang="fr">servantes</i> sa mga
	<i xml:lang="fr" lang="fr">domestiques</i>?--ang tanong ni Paulita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Juanito'y 
	hindi nangunti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="fr" lang="fr">Domestiques</i> 
	ang mga <i xml:lang="es" lang="es">domesticado</i> o napaamo na: hindi ba 
	ninyo napupuna na ang ilan ay may astang taong gubat? Iyan ang mga
	<i xml:lang="fr" lang="fr">servantes</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga 
	naman!--ang dugtong ni Aling&nbsp;Victorina--ang ilan ay may masasamang kilos.... 
	at ang akala ko pa naman na sa Europa ay pawang may maaayos na ugali at.... 
	ngunit sa dahilang nangyayari sa Francia.... nakikita <span class="locked">
	ko na!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sst, sst!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	kagipitan ni Juanito ay nang dumating ang oras ng pagtatawaran at binuksan 
	ang halang, ang mga alilang nagpapaupa ay nangagsilagay sa piling ng 
	kanikanilang mga pahayag na nagpapakilala ng kanilang kinauukulan. Ang mga 
	alila, mga sampu o labing dalawa, na anyong magagaspang, nangakasuot ng 
	librea at may dalang isang sangang maliit sa kamay, ay nangagsilagay sa 
	ilalim ng pahayag na <i xml:lang="fr" lang="fr">domestiques</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang mga 
	maaamo na!--ang sabi ni Juanito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunay nga na 
	ang mga asta ay waring hindi pa nalalaunan ang pag-amo--ang banggit ni Aling&nbsp;Victorina--tingnan natin ang mga hindi pa lubos na amo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makaraan yaon, 
	ang labing dalawang dalaga na pinangunguluhan ng masaya't maliksing si
	<span xml:lang="fr" lang="fr">Serpolette</span>, na ang mga suot ay ang 
	lalong maiinam nilang kagayakan, ang bawa't isa'y may isang malaking kalangi 
	sa baywang, masasaya, nangakangiti, malulusog ang katawan, mabighani, ay 
	nangagsilagay sa piling ng haligi ng mga <i xml:lang="fr" lang="fr">
	servantes</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit?--ang 
	tanong na palagay na palagay ni Paulita--iyan baga ang mga taong bundok na 
	inyong sinasabi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi--ang 
	tugong walang katigatigatig ni Juanito--nangagkamali.... nangagkapalit.... 
	Iyang mga huling darating.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyang mga 
	dumarating na may mga dalang latigo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Patangong 
	sumagot ng oo si Juanito na hindi mapalagay at nagugulumihanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	ang mga dalagang iyan ang mga <i xml:lang="fr" lang="fr">cochers</i>?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang 
	napakalakas na ubo ang sumagi kay Juanito na nakayamot tuloy sa ilang 
	nanonood.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lumayas iyan! 
	lumayas ang natutuyo!--ang sigaw ng isang boses.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Natutuyo? 
	Tawagin siyang natutuyo sa harap ni Paulita? Ibig makita ni Juanito ang may 
	masamang dila upang ipalamon dito ang pagkatuyo. At nang makitang 
	humahadlang ang mga babae ay lalong tumapang at lumaki ang loob. Salamat na 
	lamang at si Don Custodio ang siyang nagsabi ng taglay na sakit 
	at sa pangingilag na mapuna ay nagwawalang bahalang wariy isinusulat ang 
	pagtuligsa sa dula.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kundi lamang 
	kasama ko kayo!--ang sabi ni Juanito na pinagalaw ang mga mata na gaya ng 
	ilang manika na nagpapagalaw sa pabato ng mga orasan. At upang lalo pang 
	mahawig ay manakanakang inilalawit ang kanyang dila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang gabing 
	yaon ay naging matapang at mapuri siya sa mata ni Aling&nbsp;Victorina kaya't 
	ipinasiya na nito sa loob ng kanyang dibdib na pakasal sa kanya pagkamatay 
	na pagkamatay ni Don Tiburcio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Paulita ay 
	unti-unting lalong nalulungkot dahil sa pag-iisip na kung bakit ang mga 
	babaeng iyon na tinatawag na <i xml:lang="fr" lang="fr">cochers</i> ay 
	nakaaakit kay Isagani. Ang salitang <i xml:lang="fr" lang="fr">cochers</i> 
	ay nagpapaalaala sa kanya ng ilang bangit na ginagamit ng mga kolehiala 
	upang ipahiwatig ang isang wariy damdamin kung silasila ang nag-uusap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Natapos din 
	ang unang bahagi at dinala ng markes na parang alila si
	<span xml:lang="fr" lang="fr">Serpolette</span> at si
	<span xml:lang="fr" lang="fr">Germaine</span>, ang nagtataglay ng anyong 
	mahinhin ng samahan, at pinakakotsero ang hangal na si
	<span xml:lang="fr" lang="fr">Grenicheux</span>. Isang matunog na pagakpakan 
	ang nagpabalik na mangagkakawit sa kamay, sa mga artista, na may mga ilang 
	sandali pa lamang ang kararaan na nangaghahabulan at nangag-aaway; 
	nangagsisiyuko sa lahat ng dako ng mairuging nanonood na taga Maynila at ang 
	mga babae'y nakipagtapunan ng titig sa ilang nanonood na lalaki.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantalang 
	naghahari ang kaguluhan na gawa ng mga pag-uunahan sa pagtungo sa bihisan 
	upang dulutan ng maligayang bati ang mga artista, at ng mga tumutungo naman 
	sa mga palko upang bumati sa babae, ang ilan ay nagpapahayag ng kanilang mga 
	pasiyang ukol sa dula at sa mga artista.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	mapag-aalinlanganang si <span xml:lang="fr" lang="fr">Serpolette</span> ang 
	tanging mabuti--ang sabi ng isa na umanyong matalino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig ko si
	<span xml:lang="fr" lang="fr">Germaine</span>, isang bulagaw na kaibigibig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala namang 
	boses!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ba ang 
	gagawin ko sa boses?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung sa inam 
	ng katawan, ay ang mataas!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Psh!--ani 
	Ben-Zaib--ang lahat ay walang kakabukabuluhan, wala isa mang artistang 
	matatawag.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si Ben-Zayb ay siyang manunuligsa ng '<i xml:lang="es" lang="es">El Grito de la Integridad</i>' 
	at ang kanyang anyong mapagpawalang kabuluhan ay nagbibigay sa kanya ng 
	katangian sa mata ng mga nasisiyahan na sa kakaunting bagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ni si
	<span xml:lang="fr" lang="fr">Serpolette</span> ay may boses, ni si
	<span xml:lang="fr" lang="fr">Germaine</span> ay may kariktang kumilos, ni 
	iyan ay musika, ni arte, ni anumang bagay na may kabuluhan!--ang ipinangtapos 
	na salitang ang anyo ay lubos na mapagwalang bahala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Upang 
	makapagpanggap na mabuting manunuligsa ay walang ibang mabuting paraan liban 
	sa pintasan ang lahat. Dalawang <span xml:lang="es" lang="es">billete</span> 
	lamang ang ipinadala ng may ari ng palabas sa Pasulatan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa mga palko'y 
	ipinagtatanong kung sino ang may ari ng palkong walang laman. Linaluan noon 
	ang lahat sa <i xml:lang="en" lang="en">chic</i>, sapagka't siyang huling 
	darating.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi maalaman 
	kung saan nagbuhat ang balita na ang palko ay kay Simoun. Ang bulungan ay 
	napatunayan. Walang nakakita sa manghihiyas ni sa butaka, ni sa bihisan, ni 
	saan mang dako ng dulaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y 
	nakita kong kasama ni <abbr xml:lang="en" lang="en">Mr.</abbr>&nbsp;<span xml:lang="fr" lang="fr">Jouy</span> 
	kanginang hapon!--ang sabi ng isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At nag-alay 
	ng isang pamuti sa liig sa isa sa mga artistang babae....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa kangino sa 
	kanila?--ang tanong ng ilang babaeng mausisa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa mabuti sa 
	lahat, ang sinusundan ng tingin ng Capitan General.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinginang 
	makahulugan, kindatan, bulalas na pag-aalinlangan, pagpapatunay at mga 
	salitang paputolputol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig mag sa 
	Monte-Cristo!--anang isa na ibig masabing mapagbasa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--O taga 
	dulot-kailangan ng <i xml:lang="es" lang="es">Real Casa</i>!--ang dugtong ng 
	lumalangit sa nagsalita na naninibugho na kay Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa palko ng 
	ating mga nag-aaral ay naiwan si Pecson, si Sandoval at si Isagani. Si Tadeo 
	ay lumapit kay Don Custodio upang ito'y libangin samantalang si 
	Makaraig ay nakikipagkita kay Pepay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala, gaya ng 
	sinabi ko sa inyo, kaibigang Isagani--ang pahayag ni Sandoval na nagkikilos 
	ng masagwa, pinatatamis ang boses upang madinig siya ng mga binibining nasa 
	palkong kalapit, ang mga anak ng mayamang may utang kay Tadeo--wala, hindi 
	taglay ng wikang pranses ang mayamang tunog niyang sarisari at maalindog na 
	taginting ng wikang kastila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hindi ko mawari, hindi ko mahaka, hindi ko 
	malirip ang ayos ng mga mananalumpating pranses at nag-aalinlangan ako sa 
	paniniwala na nagkaroon at magkaroon ng alinsunod sa sadyang kahulugan ng 
	salita, sa loob ng sadyang matatawag na mananalumpati. Sapagka't huwag 
	nating pagkamalan ang salitang mananalumpati at salitang mananatsat at 
	madaldal. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa lahat ng bayan ay mangyayaring magkaroon ng mga mananatsat at 
	madaldal, sa lahat ng pook ng sangsinukob na tinitirahan ng tao, sa gitna ng 
	mga malalamig at walang imik na mga ingles, gaya rin naman sa malikot at 
	maramdaming pranses....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ipinatuloy 
	ang isang mainam na pagsasalaysay ng ukol sa mga bayan na sinamahan ng 
	kanikanilang nakaiigayang mga hilig at mga taguring mataginting. Si 
	Isaganiy sumasang-ayon sa pamamagitan ng pagtango, samantalang inaalala si 
	Paulita na kanyang nahuling nakatingin sa kanya ng isang tinging nangungusap 
	at may ibig sabihing maraming bagay. Ibig hulaan ni Isagani ang tinuturingan 
	ng mga matang iyon; iyon ang tunay na nagsasabi ng maraming bagay at hindi 
	mapanatsat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At kayo na 
	isang makata na umaalinsunod sa tunog at sukat, anak ng mga Musa--ang patuloy 
	ni Sandoval na ikinumpay ng magandang kilos ang kamay, na waring binati sa 
	abot ng tingin ang siyam na magkakapatid--maaakala baga ninyo na sa isang 
	wikang napakasalat at walang katunogtunog na gaya ng pranses ay mangyayaring 
	magkaroon ng mga makatang napakalalaking gaya ng ating mga Garcilaso, ng 
	ating mga Herrera, ng ating mga Espronceda at mga Calderon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gayon man--ang 
	banggit ni Pecson--si <span xml:lang="fr" lang="fr">Victor Hugo</span>....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si
	<span xml:lang="fr" lang="fr">Victor Hugo</span>, kaibigang Pecson, si
	<span xml:lang="fr" lang="fr">Victor Hugo</span>, sakalit makata, ay 
	sapagka't utang niya sa Espa&ntilde;a.... sapagka't kilala na, isang bagay na hindi 
	mapag-aalinlanganan, bagay na tinatanggap ng sampung mga pranses na 
	nangaiingit sa Espa&ntilde;a, na kung si <span xml:lang="fr" lang="fr">Victor Hugo</span> 
	ay may mataas na pag-iisip, kung makata, ay sa dahilang sa Madrid siya 
	nanirahan noong kanyang kabataan, doon nasimsim ang mga unang buko ng 
	pag-iisip, doon nabuo ang kanyang utak, doon nagkakulay ang kanyang 
	paghahaka, ang kanyang puso'y naayos at sumipot ang mga magagandang buko ng 
	kanyang pagkukuro. At saka ang isa pa ay sino si
	<span xml:lang="fr" lang="fr">Victor Hugo</span>? Maipapantay baga sa ating 
	mga bago....?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	pagdating ni Makaraig na ang anyo'y malungkot at may isang mapait na ngiti 
	sa labi ay pumutol sa salaysay ng mananalumpati. Pigil ni Makaraig ang isang 
	papel na iniabot kay Sandoval nang walang kaimik-imik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Binasa ni 
	Sandoval:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	'<i>Palapati</i>: 
	Ang sulat mo'y nahuli; iniharap ko na ang aking pasiya at sinang-ayunan. 
	Gayon man, dahil sa waring nahulaan ko na ang iyong nasa, ay linutas ko ang 
	salitaan nang alinsunod sa nais ng iyong mga kinakandili.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Paparoon ako 
	sa dulaan at aantabayanan kita sa paglabas.</font></p>
	<p class="letter-clo" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">Ang iyong 
	masuyong lapati,</font></p>
	<p class="letter-au" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">Custodining.'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kay buti ng 
	taong iyan!--ang bulalas ni Tadeo na halos malungkot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At 
	ngayon?--ang sabi ni Sandoval--wala akong bagay na masamang nakikita dito, 
	kundi bagkus pa ngang mabuti!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo,--ang sagot 
	ni Makaraig na ang ngitiy mapait--nalutas ng sang-ayon sa kahilingan! 
	Katatapos ko pa lamang sa pakikipagkita kay Padre Irene!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ang 
	sabi ni Padre Irene?--ang tanong ni Pecson.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya rin nang 
	sabi ni Don Custodio, at nangahas pa ang tampalasan na ako'y 
	handugan ng maligayang bati! Ang Lupong kumanya ng kapasiyahan ng may 
	palagay ay sang-ayon sa balak at naghahandog ng maligayang bati sa mga 
	nag-aaral dahil sa kanilang pag-ibig sa inang bayan at nasang 
	makapag-aral....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lamang; sa pag-aalaala sa ating mga gawain, at upang huwag mapawakawak ang 
	layon, ang sabi, ay inaakalang nararapat na ang pamamahala at pagsasagawa ng 
	binabalak ay isakamay ng isa sa mga '<span xml:lang="es" lang="es">corporacion</span>,' 
	kung sakaling hindi ibigin ng mga dominiko na masama sa Universidad ang 
	akademia.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Bulalas na 
	sama ng loob ang sumalubong sa mga salitang ito: si Isagani ay tumindig, 
	ngunit walang anumang sinabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At upang makitang tayo'y kalahok sa pamamahala sa akademia--ang patuloy ni 
	Makaraig--ay ipinagaganap sa atin ang paniningil ng mga ambagan at abuloy, 
	na katungkulan nating ibigay sa isang ingat-yaman na ihahalal ng '<span xml:lang="es" lang="es">corporaciong</span>' 
	mamamahala, at ang ingat-yamang iyon ay magkakaloob sa atin ng katibayan ng 
	pagkakatanggap....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayo'y 
	magiging kabisa tayo!--ang sabi ni Tadeo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sandoval--ang 
	sabi ni Pecson--naiyan ang <i xml:lang="es" lang="es">guantes</i>, saluhin 
	ninyo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Puf! iyan ay 
	hindi <i xml:lang="es" lang="es">guantes</i>, ngunit dahil sa amoy ay 
	nawawanki sa isang midias.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ang lalong 
	mainam--ang patuloy ni Makaraig--ay ang turo ni Padre Irene, na 
	tayo'y magpiging o kaya'y magdaos ng isang panapatang may mga sulo, dahil sa 
	pangyayari; isang pagpapahayag ng pagpapasalamat ng mga nag-aaral sa mga 
	taong nakilahok sa usap na ito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga, 
	matapos ang palo, ay umawit tayo at magpasalamat! <i xml:lang="la" lang="la">
	Super flumina Babylonis sedimus!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, isang 
	piging na gaya ng sa mga bilanggo!--ang sabi ni Tadeo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang piging 
	na tayong lahat ay nakaluksa at bumigkas tayo ng mga talumpating ukol sa 
	patay--ani Sandoval.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	panapatan na ang tutugtugin ay ang <i xml:lang="es" lang="es">Marsellesa</i> 
	at mga <i xml:lang="es" lang="es">marcha funebre</i>,--ang palagay ni 
	Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, mga 
	ginoo--ang turing ni Pecson na gamit ang kanyang tawang bungo--upang ipagsaya 
	ang pangyayari ay wala ng lalong kapit kay sa isang piging sa magpapansit na 
	ang maglilingkod ay mga intsik na walang baro, ngunit walang baro!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa ang 
	palagay ay lubos na mapangutya at napakagaspang ay tinanggap; si Sandoval 
	ang unaunang pumagakpak; malaon ng ibig niyang makita ang loob ng mga 
	tindahang iyon na kung gabiy waring masasaya at maraming tao.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At ang 
	tumutugtog pa naman nang orkesta upang simulan ang pangalawang bahagi nang 
	tumindig ang ating mga binata na iniwan ang dulaan sa gitna ng pagkakamangha 
	ng lahat ng naroroon.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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