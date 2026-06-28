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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">VII. Si Simoun</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga bagay 
	na ito'y siyang naiisip ni Basilio ng dumalaw sa libingan ng kanyang ina. 
	Babalik na siya sa bayan, ng tila nakabanaag ng liwanag sa loob ng kakahuyan 
	at nakadinig ng lagitlit ng mga sanga, yabag ng paa at lagaslas ng dahon...... 
	Ang ilaw ay nawala, ngunit ang yabag ay unti-unting lumalapit at nakita 
	niya ang isang anino sa gitna ng pook na iyon at ang tinutungo ay ang 
	kanyang kinalalagyan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ay 
	sadyang hindi mapamahiin at lalo na nga ng makabiyak na siya ng maraming 
	bangkay ng tao at nakapangalaga sa di kakaunting naghihingalo: ngunit ang 
	matatandang alamat na ukol sa nakapangingilabot na pook na iyon, ang oras ng 
	gabi, ang kadiliman, ang malungkot na simoy, at ang mga ilang kasaysayang 
	napakinggan nang siya'y musmos, ay nakasindak din sa kanyang kalooban at 
	naramdaman niyang ang kanyang puso'y tumitibok ng malakas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang anino'y tumigil, sa kabilang ibayo ng baliti, na nakikita ng binata sa 
	puwang ng dalawang ugat na sa katandaan ay waring dalawang sanga na. Kinuha 
	sa ilalim ng damit ang isang ilawang may malakas na lente na inilagay sa 
	lupa at nakaliwanag sa mga '<span xml:lang="es" lang="es">botas de montar</span>'; 
	ang ibang dako ng katawan ay nababalot din ng kadiliman. Waring hinalungkat 
	ng anino ang mga bulsa at pagkatapos ay tumungo upang ikama ang dahon ng 
	isang asarol sa isang malaking tungkod: nagulat si Basilio ng makitang 
	kaanyo yaon ng mag-aalahas na si Simoun. At siya ngang talaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hinuhukay ng 
	mag-aalahas ang lupa at maminsanminsa'y naliliwanagan ng ilaw ang mukha: 
	wala ang salaming nakapagpapabago ng anyo. Si Basilio ay nangilabot. Yaon 
	din ang taong may labing tatlong taon nang humukay doon ng paglilibingan sa 
	kanyang ina, tumanda nga lamang; ang buhok ay pumuti at nagkaroon ng bigote 
	at balbas, ngunit ang paningin ay hindi nagbabago, yaon din ang dating 
	anyong malungkot, yaon din ang ulap ng noo, ang malakas na bisig ay yaon 
	din, tuyo nga lamang ng kaunti, yaon ding kaloobang masulak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga alaala 
	sa nakaraan ay muling umali sa kanya: wariy naramdaman ang init ng siga, 
	ang gutom, ang kanyang panglulupaypay noon, ang amoy ng lupang nabungkal...... 
	Ang pagkakatuklas na ito'y nakapangilabot sa kanya. Kung gayon ay ang 
	mag-aalahas na si Simoun, na inaakalang indio ingles, portuges, amerikano, 
	mulato, <span xml:lang="es" lang="es">Cardinal&nbsp;Moreno</span>,
	<span xml:lang="es" lang="es">Eminencia&nbsp;Negra</span>, ang budhing nag-uudyok 
	ng masama sa Capitan General, gaya ng tawag ng ilan, ay dili iba pala't 
	yaong mahiwagang tao na ang kanyang pagsipot at pagpanaw ay nataon sa 
	pagkamatay ng magmamana sa mga lupaing yaon. Ngunit sino ang Ibarra, doon 
	sa dalawang taong kanyang nakaharap, ang buhay o ang patay?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	katanungang ito na itinatanong niya sa sarili, kailan ma't napagsasalitaan 
	ang pagkamatay ni Ibarra, ay muling pumasok sa kanyang pag-iisip sa harap ng 
	mahiwagang taong yaon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang namatay ay 
	may dalawang sugat na gawa ng punglo, ayon sa kanyang napag-aralan 
	pagkatapos, at marahil iyon ay gawa ng paghahabulan sa lawa. Kung gayon ay 
	si Ibarra ang namatay na naparoon upang mamatay sa libingan ng mga magulang, 
	at ang nasang sunugin ang kanyang bangkay ay marahil nakuha sa ugali sa 
	Europa na doo'y sinusunog ang patay. Kung gayon ay sino ang isa pa, ang 
	buhay, ang Simoung ito na manghihiyas, na noon ay anyong dukhangdukha at 
	ngayo'y mayamangmayaman at kaibigan ng mga may kapangyarihan? Doo'y may 
	lihim na sa kalamigang loob ng ating nag-aaral ay ninasang tahuin, at 
	inantay ang kailangang pagkakataon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	nama'y hukay ng hukay si Simoun, ngunit namasdan ni Basilio na nanghina na 
	ang dating lakas: si Simoun ay humihingal, hirap sa paghinga at sa bawa't 
	sandali ay tumitigil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio'y 
	nanganib na baka siya makita, kaya't sa biglang udyok ng kalooban ay 
	tumindig sa kinauupan at nagsabing walang pagbabago ang boses:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Matutulungan 
	ko po ba kayo, ginoo....?--ang tanong, ng makaalis sa kinakanlungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	umunat, lumundag na wariy tigreng nabigla, idinukot ang kamay sa bulsa ng 
	amerikana at tiningnang namumutla at kunot ang noo ang nag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May labing 
	tatlong taon na ngayong ako'y pinautangan ninyo ng loob, ginoo,--ang patuloy 
	na walang tigatig ni Basilio--sa pook ding ito, sa paglilibing sa aking ina, 
	kaya't ikaliligaya ko ang matulungan naman kayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dinukot ni 
	Simoun sa kanyang bulsa ang isang rebolber, na hindi inilalayo sa bagongtao 
	ang paningin. Nadinig ang lagitlit ng isang armas na iniakma.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sino po ba 
	ako sa akala ninyo?--ang sabing humakbang ng dalawang hakbang na paurong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isa pong 
	taong aking iginagalang--ang sagot ni Basilio na may pakagulumihanan, 
	sapagka't inaakalang yaon na ang huli niyang sandali,--isang taong tangi sa 
	akin, inaakala ng lahat na patay na, at taong ang kanyang mga kasawian ay 
	dinamdam kong palagi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang lubos na 
	katahimikan ang sumunod sa mga salitang ito, katahimikang inaring amoy 
	kabilang buhay ng binata. Gayon man, makaraan ang isang mahabang 
	pag-aalinlangan, ay linapitan siya ni Simoun at piniglan sa balikat at 
	sinabi sa kanyang ang boses ay <span class="locked">nanginginig, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Basilio, 
	nakababatid kayo ng isang lihim na mangyayaring ikasawi ko at ngayo'y 
	nakatuklas ng isa pa, na kung mabansag ay makasisira sa aking layon, kaya't 
	ang buo kong buhay ay nasa kamay ninyo. Upang ako'y tumiwasay at alangalang 
	sa ikaaayos ng inaakala kong gawin ay dapat kong sagkaan ang iyong mga labi, 
	sapagka't ano ang kabuluhan ng buhay ng isang tao sa kalakhan ng bagay na 
	aking tinutungo? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mainam ang pagkakataon, walang nakababatid ng aking 
	pagparito, ako'y may sandata, kayo'y wala; sa mga tulisan ibibintang ang 
	kamatayan ninyo kun di man sa isang bagay ng kabilang mundo.... ngunit, 
	gayon man ay babayaan kong kayo'y mabuhay at inaakala kong hindi ko 
	ipagdaramdam sa huli ang gayon. Kayo'y nagsumakit, nakipagtunggali ng 
	lubhang tiyaga.... at gaya ko rin kayong may kailangang makipagtuus sa 
	sosyedad; ang kapatid ninyong munti ay pinatay, ang inyong ina'y naulol, at 
	hindi pinag-usig ng sosyedad ni ang nakamatay ni ang nagpahirap. Tayong 
	dalawa'y nabibilang sa mga uhaw sa katwiran, at hindi dapat tayong 
	magtunggali kun di magtulungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	humintong pinigil ang buntonghininga at pagkatapos ay banayad na nagpatuloy 
	na palingaslingas ang tingin:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, ako nga 
	iyong may labing tatlong taon na ngayon nang naparito, na may sakit at 
	karumaldumal ang anyo upang dulutan ng huling handog ang isang kaluluwang 
	magiting at matapat na inilaan ang buhay nang dahil sa akin. Inis ng isang 
	pamamahalang masama ang hilig ay naglagalag ako sa buong mundo at maghapo't 
	magdamag na pinunyagi ko ang makapag-ipon ng isang kayamanan upang masunod 
	ang aking layon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ngayo'y nanumbalik ako upang durugin ang pamamahalang iyan, 
	padaliin ang kanyang pagkabulok, iaboy sa banging tinutungo, kahit na 
	kailanganin kong gamitin ang pagbaha ng luha at dugo.... Hinatulan na ang 
	kanyang sarili, yari na, at ayokong mamatay ng hindi ko muna siya makitang 
	durogdurog sa kailaliman ng bangin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At iniunat ni 
	Simoun ang kanyang mga kamay na tungo sa lupa, na waring sa kilos na iyon ay 
	ibig palagiin doon ang mga labi ng nasira. Ang kanyang tinig ay nagkaroon 
	ng kasindaksindak at kalagimlagim na tunog, na nakapangilabot sa nag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa tawag ng 
	masasamang hilig ng mga namamahala ay bumalik ako sa Kapuluang ito, at sa 
	ilalim ng anyong mangangalakal ay linibot ko ang mga bayanbayan. Sa tulong 
	ng aking yaman ay napasok ko ang lahat at saa't saan man ay nakita ko ang 
	pangangamkam sa lahat ng anyong kahalayhalay, minsan ay may balat-kayo, 
	minsa'y lantad na lantad, minsan ay ganid na nagpapakasawa sa isang katawang 
	patay, na gaya ng ginagawa ng isang buitre sa bangkay, at naitanong ko sa 
	sariling bakit hindi tumitindi sa kanyang bituka ang kamandag, ang
	<span xml:lang="es" lang="es">ptomaina</span>, ang lason ng mga libingan 
	upang mamatay ang nakaririmarim na ibon? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Binabayaan ng bangkay na siya'y 
	gutayin, ang buitre'y napupundakanan sa laman, at sa dahilang hindi ko 
	makaya ang siya'y bigyan ng buhay upang makalaban sa nagpapahirap sa kanya, 
	at sa dahilang mahina ang pagkabulok, ay pinasigla ko ang kayamuan, aking 
	inayunan, ang pagsalansang sa katwiran at kapaslangan ay nag-ibayo sa dami; 
	aking pinalalo ang pagkakasala, ang mga gawang malulupit, upang ang bayan ay 
	mahirati sa kamatayan; aking pinalagi ang ligalig upang sa pag-iwas dito ay 
	humanap ng kahit anong kaparaanan.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Aking hinadlangan ang pangangalakal 
	upang kung mahirap na ang bayan at pulubi na ay wala ng sukat ipanganib; 
	aking inudyukan sa pangangamkam upang magsalat ang kayamanang bayan, at 
	dahil sa hindi pa sapat sa akin ang mga bagay na ito upang gisingin sa 
	panghihimagsik ang bayan, ay sinugatan ko ang bayan sa dakong lalong 
	dadamdamin, ginawa kong ang buitre na ang lumait sa bangkay na nagbibigay 
	buhay sa kanya at kanyang bulukin...... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ngunit nang akin ng magagawang sa 
	lubos na kabulukan, ng pawang yagit, na pagkakahalohalo ng maraming bagay na 
	nakaririmarim, ay tumindi ang lason, nang ang pagkagahaman ng kayamuan sa 
	kanyang kalituhan ay nagdudumali na sa pagsunggab sa lahat ng abot ng 
	kanyang kamay na waring isang matandang babaeng nabigla ng sunog, ay 
	sasisipot kayong na nangangalandakan ng pagkakastila, umaawit ng pag-asa sa 
	Pamahalaan, bagay na hindi darating; narito't isang laman na kumikilos dahil 
	sa init at buhay na dala, malinis, bata, malusog, kumikinig sa dugo, sa 
	kasiglahan, ay biglang sasusulpot upang humandog na muli na wari bagong 
	pagkain...... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ah, ang kabataang kailan ma'y mapangarap at kulang sa 
	pagkakilala sa mga bagay-bagay, laging kasunod ng mga paroparo at mga 
	bulaklak! Nangagsapisapi kayo upang sa inyong lakas ay mapagtali ninyo ng 
	taling pulos na bulaklak, ang inyong bayan at ang Espa&ntilde;a, gayong ang tunay 
	ninyong ginagawa ay ang pagyari ng tanikalang matigas pa kay sa diamante. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Humihingi kayo ng pagkakapantaypantay sa karapatan, pag-uugaling kastila sa 
	inyong mga hilig, at hindi ninyo nakikitang ang hinihingi ninyo'y ang 
	kamatayan, ang pagkapawi ng inyong pagkamamamayan, ang pagkaduhagi ng inyong 
	inang-bayan, ang pananagumpay ng paniniil! Ano kayo sa araw ng bukas? Bayang 
	walang budhi, bansang walang kalayaan; ang lahat ng taglay ninyo'y pawang 
	hiram, sampu ng inyong mga kasiraan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Humihingi kayong maging parang kastila 
	at hindi kayo namumutla sa kahihiyan kung ipagkait sa inyo! At kahit na 
	ipagkaloob sa inyo ano ang inyong hangad? ano ang inyong matatamo? Maligaya 
	na kayo kung maging bayan ng pag-aalsa, bayan ng mga digmaan ng mga 
	magkababayan, republika ng mga mangdaragit at di nasisiyahang loob na kagaya 
	ng ilang republika sa timog ng Amerika! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano ang layon ninyo sa pagtuturo ng 
	wikang kastila; hangad na kahiyahiya kung hindi lamang napakasama ang 
	ibubunga? Ibig ninyong dagdagan ng isa pang wika ang apat na pu't kung ilan 
	pang ginagamit sa Kapuluan upang huwag kayong lalong magkaantiluhan!......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi po--ang 
	tugon ni Basilio--kung dahil sa pagkaalam ng wikang kastila ay mapapalapit 
	tayo sa Pamahalaan, sa isang dako naman ay magiging sanhi ng paglalapitlapit 
	ng mga pulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Laking 
	kamalian!--ang putol ni Simoun--napadadaya kayo sa maiinam na pangungusap at 
	hindi ninyo tinutungo ang latak at sinusuri ang huli niyang iaanak. Hindi 
	magiging siyang karaniwang salita dito kailan man ang wikang kastila, hindi 
	siya gagamitin ng bayan, sapagka't ang mga bukal ng pag-iisip at puso nito 
	ay walang katimbang na salita sa wikang iyan; bawa't bayan ay may kanyang 
	sarili, gaya rin naman ng pangyayaring may sariling pagdaramdam. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano ang 
	gagawin ninyo sa wikang kastila, kayong iilang gagamit? Patayin ang inyong 
	katangian, isailalim ng ibang utak ang inyong mga pag-iisip at hindi kayo 
	magiging malaya kundi magiging tunay na alipin pa nga. Ang siyam sa bawa't 
	sampu ninyong nag-aakalang kayo'y mga bihasa, ay pawang tumakwil sa inyong 
	tinubuan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang bawa't isa sa inyo na gumagamit ng wikang iyan ay napapabayaan 
	ng lubos ang kanyang sarili na hindi man maisulat ni mawatasan, at ilan na 
	ang nakita ko na nagpapakunwaring hindi nakababatid ni isang bigkas man 
	lamang ng salitang iyan! Salamat na lamang at mayroon kayong isang mulalang 
	pamahalaan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Samantalang ipinipilit ng Rusia ang wikang ruso sa Polonia upang 
	ito'y kanyang maalipin, samantalang ipinagbabawal ng Alemania ang wikang 
	pranses sa mga lalawigang kanyang nasakop, ang inyong pamahalaan naman ay 
	nagpupunyagi na huwag alisin sa inyo ang sariling wika, datapwa't kayo, 
	bayang kahangahanga na hawak ng isang pamahalaang hindi malirip, kayo'y 
	nagpupumilit na iwan ang inyong katangian sa pagkabansa! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang isa't isa sa 
	inyo ay nakalilimot na samantalang ang isang bayan ay may sariling wika ay 
	taglay niya ang kanyang kalayaan, gaya rin naman ng pagtataglay ng tao ng 
	pagsasarili samantalang tinataglay ang kanyang sariling pagkukuro. Ang wika 
	ay siyang pag-iisip ng bayan. Mabuti na lamang at ang inyong pagsasariliy 
	sadyang darating: inaandukha siya ng mga kalaswaan ng tao!......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	huminto at pinahid ng kamay ang noo. Ang buwan ay sumisikat at inihahatid 
	doon ang kanyang malamlam na liwanag na nakalulusot sa puwang ng mga sanga. 
	Dahil sa naliliwanagang papaitaas ng lampara ang mag-aalahas, na matigas ang 
	anyo at maputi ang buhok, ay waring isang multo ng kagubatan na nagbabalak 
	ng kalagimlagim. Sa harap ng gayong katitigas na sumbat ay nakatungong 
	walang imik si Basilio. Nagpatuloy si Simoun:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakita kong 
	binabalak ang kilusang iyan at dumanas ako ng magdamagang ligalig, sapagka't 
	batid kong sa kabataang iyan ay mayroong may taglay na katalinuhan at pusong 
	maitatangi na nagpapakalulong sa bagay na inaakala nilang mabuti, ngunit 
	ang katotohana'y gumagawa ng laban sa kanilang bayan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Makailang kong 
	tinangka ang lumapit sa inyo, hubdin ang pagbabalatkayo at pawiin ang inyong 
	pagkakamali! ngunit sanhi sa mga pagpapalagay sa akin ay marahil masamain 
	ang aking mga pangungusap at magkabiso pa'y magbunga ng laban sa aking 
	akala...... Makailang tinangka ko ang lumapit sa inyong Makaraig, sa inyong 
	Isagani! Maminsan minsan ay naiisip kong sila'y patayin, lipulin......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	tumigil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Basilio, ito 
	ang sanhi kung kaya hindi ko kayo pinatay, at mahanda ako, na dahil sa isang 
	kabiglaanan, balang araw ay ihayag ninyo ang aking kalagayan.... Batid ninyo 
	kung sino ako, alam ninyo ang aking mga tiniis, paniwalaan ninyo ako; hindi 
	kayo kabilang ng karamihan na ang tingin sa mag-aalahas na si Simoun ay 
	isang maglalako na nag-uudyok sa mga may kapangyarihan sa gawang pamamaslang 
	upang ang mga naapiy bumili sa kanya ng hiyas.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ako ay isang hukom na may 
	nasang magparusa sa isang pamamahala, na, ang gagawing kasangkapan ay ang 
	sarili niyang kasamaan; bakahin siya sa paraang siya'y ayuin.... Kailangan 
	kong ako'y inyong tulungan, gamitin ninyo ang inyong kayang makaakit sa 
	kabataan upang labanan ang baliw na nasang makikastila, pakikiugali, 
	pagpapantaypantay sa karapatan.... Sa landasing iyan ay ang maging isang 
	masamang huwad lamang ang matatamo, at nararapat na ang bayan ay lumingap ng 
	lalong mataas. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Isang kabangawan ang akitin ang pag-iisip ng mga namamahala; 
	mayroon na silang takdang balak, may piring ang mga mata, at, bukod sa ang 
	gayon ay isang pag-aaksaya ng panahon, ay dinadaya pa ninyo ang bayan sa mga 
	pag-asang hindi mangyayari at nakatutulong pa kayo upang yumuko sa harap ng 
	nangduduhagi. Ang dapat ninyong gawin ay samantalahin ang kanyang mga 
	pag-aalinlangan sa kapakinabangan ninyo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ayaw kayong ihawig sa kastila? 
	Mabuti! sa gayon ay magpakatangi kayo sa pagbabadha ng sariling kaugalian, 
	itayo ninyo ang tuntungan ng bayang pilipino.... Aayaw kayong bigyan ng 
	pag-asa? Mabuti nga! huwag kayong umasa sa kanya, asahan ninyo ang sarili at 
	kumilos kayo. Aayaw kayong bigyan ng kinatawan sa <i xml:lang="es" lang="es">
	Corte</i>? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lalong mabuti! Kahit na kayo makapagpadala doon ng kinatawan na 
	nahalal ng ayon sa inyong hangad, ano ang magagawa ninyo roon kun di malunod 
	sa gitna ng maraming tinig at sang-ayunan, sa pamamagitan ng inyong 
	pagkakaharap doon, ang mga kapaslangan at kamaliang gawin? Samantalang 
	lalong kaunti ang mga karapatang ipagkaloob sa inyo ay lalo namang malaki 
	ang inyong karapatan sa pagpawi ng pasanin at gantihin sila ng masama sa 
	kasamaan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kung ayaw ituro sa inyo ang kanilang wika ay pag-aralan ninyo ang 
	inyo, inyong pakalatin, bayaang mamalagi sa bayan ang sariling pag-iisip, at 
	sa pagnanasang maging isang lalawigan ay ipalit ang hangad na maging bansa, 
	sa paghahakang sumasalilong ay paghahakang malaya, ni sa hilig, ni sa salita 
	ay huwag mangyaring maipalagay ng kastila na siya'y parang nasa bahay niya 
	dito, ni ipalagay ng taga rito na sila'y kababayan kundi manglulupig 
	magpakailan man, dayuhan, at sa malao't madaliy tatamuhin ninyo ang inyong 
	kasarinlan. Ito ang sanhi kung kaya hangad kong kayo'y mabuhay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ginoo, 
	napakalaking karangalan ang ipinagkaloob ninyo sa akin sa pagpapahayag ng 
	inyong mga balak upang huwag akong magtapat at sabihin na ang hinihiling 
	ninyo sa akin ay higit sa makakaya ko. Ako'y hindi nakikilahok sa politika, 
	at kung sakaling linagdaan ko ang kahilingan sa pagtuturo ng wikang kastila 
	ay dahil lamang sa nakikita kong iyo'y makabubuti sa pag-aaral, at wala nang 
	iba. Ang aking tungo ay iba, ang hangad ko'y mapagaling lamang ang mga sakit 
	na dinaramdam ng aking mga kababayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	mag-aalahas ay napangiti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano na lamang 
	ang mga sakit ng katawan sa sakit ng damdamin?--ang tanong--ano na lamang ang 
	kamatayan ng isang tao sa kamatayan ng isang kalipunan? Balang araw marahil 
	ay magiging isa kayong bantog na manggagamot kung pababayaang makapanggamot 
	na mapayapa; ngunit lalo pang dakila yaong makapagbigay buhay sa lugaming 
	bayang ito. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kayo ano ang ginagawa ninyong ukol sa bayang ito na kinakitaan 
	ng unang liwanag, nagbibigay buhay sa inyo at nagdudulot sa inyo ng 
	ikatututo? Hindi ba ninyo alam na walang kabuluhan ang buhay na hindi 
	iniuukol sa isang malaking layon? Iya'y isang munting batong natapon sa 
	kaparangan na hindi kasama sa pagkabuo ng isang bahay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, hindi 
	po ginoo,--ang pakumbabang sagot ni Basilio--hindi po ako humahalukipkip, 
	ako'y gumagawa na gaya ng paggawa ng iba upang maibangon sa labi ng nakaraan 
	ang isang bayan na ang kanyang mga tao'y nagtutulungan at ang bawa't isa sa 
	kanila'y dumadamdam sa sarili, ng budhit kabuhayan ng kalahatan. Ngunit 
	kahit anong sigabo ang taglayin ng mga tao sa ngayon ay nakikilala namin na 
	sa malaking gawaang bayan ay dapat magkaroon ng paghahatihati ng gawa; 
	pinili ko ang aking gagawin at tinungo ko ang karunungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	karunungan ay hindi siyang hantungan ng tao--ang wika ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya ang 
	tinutungo ng mga bansang lalong bihasa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, ngunit 
	parang isang kaparaanan lamang sa paghanap ng kaligayahan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	karunungan ay siyang walang paglipas, lalong kagalingan ng katauhan, lalong 
	ukol sa sangsinukob!--ang sagot ng binata sa isang sulak ng kalooban</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											--Sa loob 
	ng ilang daang taon, pag ang katauhan ay matalino na't nahango sa 
	kinalalagyan sa ngayon, pag wala na ang mga lipi, pag ang lahat ng bayan ay 
	pawang malalaya na, pag wala ng alipin at umaalipin, sakop na bayan at 
	nakasasakop, pag ang naghari ay isang kapangyarihan na lamang at ang tao'y 
	naging mamamayan ng sanglupalop, ay walang malalabi kundi ang pananalig sa 
	karunungan, ang salitang pag-ibig sa bayan ay magkakaroon ng kahulugang 
	dalubhasang pananalig at ang sa panahong iyan ay magbunyag ng kanyang taglay 
	na pag-ibig sa bayan ay marahil kulungin na waring isang mapanganib na may 
	sakit, isang manggugulo sa pagkakasundo ng lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	napangiti ng malungkot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, oo--ang wikang iniiling ang ulo--datapwa'y upang sumapit ang gayong 
	kalagayan, ay kailangang huwag magkaroon ng mga bayang manggagahis, ni mga 
	bayang mang-aalipin, kailangang ang tao'y maging malaya saan man pumaroon, 
	matutuhang igalang sa karapatan ng iba ang kanyang sariling pagkatao, at 
	upang mangyari ito'y kailangan munang magsabog ng maraming dugo, ang 
	pagtutunggaliy kailangan...... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Upang daigin ang matandang pananalig, na 
	sumisiil sa mga budhi, ay kinailangang ang marami ay matupok sa apoy, upang, 
	sa pangingilabot ng budhing bayan ay ihayag na malaya ang budhi ng bawa't 
	isang tao. Kailangan din naman na ang lahat ay tumugon sa katanungang sa 
	araw-araw ay ginagawa ng bayan na inilalahad sa kanila ang kamay na 
	nakatanikala. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang pag-ibig sa bayan ay magiging pagkakasala sa mga bayan 
	lamang na manglulupig sapagka't ang pagnanakaw naman ay lalagyan ng isang 
	mainam na pangalan; ngunit kahit maging wastong-wasto na ang katauhan ay 
	magiging isang kabanalan din ang pag-ibig sa tinubuan, sa mga bayang sakop, 
	sapagka't sa lahat ng sandaliy may kahulugang pag-ibig sa katwiran, pag-ibig 
	sa kalayaan, pag-ibig sa karangalan.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
	&nbsp;Ang kalakhan ng isang tao'y hindi ang 
	magpauna sa kanyang kapanahunan, bagay na hindi naman mangyayari, kundi ang 
	hulaan ang kanyang mga adhika, tugunan ang kanyang mga pangangailangan at 
	turuan siyang magpatuloy sa lakad. Ang mga '<span xml:lang="es" lang="es">genio</span>' 
	na inaakala ng karamihan na nagpauna sa kanilang kapanahunan, ay namamalas 
	lamang na gayon sapagka't tinatanaw silang mula sa malayo ng mga sumusuri, o 
	inaakalang daang taon ang buntot na nilalakaran ng mga nahuhuli.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	tumigil. Nang nakitang hindi mapasigabo ang malamig na kaluluwang iyon, ay 
	gumamit ng ibang pangangatwiran, at tumanong na iniba ang pagsasalita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sa ala-ala 
	ng inyong ina at kapatid ano ang ginagawa ninyo? sukat na ba ang sa taon 
	taon ay pumarito at tumaghoy na wariy babae, sa ibabaw ng libingan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tumawa ng 
	pakutya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tumama ang 
	tudla; si Basilio'y nagbagong anyo at humakbang ng isang hakbang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang ibig 
	ninyong gawin ko?--ang tanong na nagngangalit--Walang pagkunan nang kailangan, 
	walang katangian matatamo ko baga ang katwirang laban sa mga pumatay sa 
	kanila? Isa pa akong masasawi, at madudurog akong kagaya ng kaputol na 
	salaming ipukol sa isang batong buhay. Ah, masama ang ginawa ninyong 
	ipaalala pa sa akin, sapagka't iya'y isang walang kabuluhang pagtangki sa 
	sugat!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At kung 
	ihandog ko sa inyo ang aking tulong?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Iginalaw ni Basilio ang ulo at nag-isip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lahat ng 
	pagtatagumpay ng katwiran, lahat ng higanti sa lupa, ay hindi makapagbibigay 
	buhay pang muli sa isang buhok man lamang ng aking ina, hindi 
	makapagpapasariwa ng isang ngiti sa mga labi ng aking kapatid! Matulog na 
	silang mapayapa.... ano ang mahihita ko kahit maghiganti?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iwasan na 
	tiisin ng iba ang inyong tiniis, upang sa susunod ay maiwasang magkaroon pa 
	ng mga anak na pinatay at mga inang napilitang maulol. Ang pagpapaumanhin ay 
	hindi laging kabaitan, siya'y kasamaan pag naguudyok sa paniniil: walang 
	mang-aalipin doon sa walang napaaalipin. Ay! ang tao'y sadyang may kasamaan, 
	na kailan ma'y nagpapakalabis pag nakakatagpo ng uma-alinsunod. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Gaya ninyo'y 
	ganyan din ang paghahaka ko, at alam ninyo kung ano ang aking sinapit. 
	Binabantayan kayo gabit araw ng mga may pakana ng inyong kasawian; 
	naghihinalang kayo'y nag-aantay ng isang sadyang panahon; inaakalang isang 
	mahigpit na hangad na makaganti ang inyong pagpupunyaging matuto, ang inyong 
	hilig sa pag-aaral, sampu ng inyong pananahimik.... Ang araw na magagawang 
	kayo'y pawiin ay papawiin kayo na gaya ng ginawa sa akin, at hindi kayo 
	papayagang lumaki, sapagka't kayo'y kinatatakutan at kinamumuhian.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kamuhian ako? 
	Kamuhian pa ako matapos ang masamang ginawa sa akin?--ang tanong na pamangha 
	ng binata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	humalakhak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Katutubo ng 
	tao ang mamuhi doon sa inapi niya, ang sabi ni Tacito na pinatibayan ang
	<i xml:lang="la" lang="la">quos laeserunt et oderunt</i> ni Seneca. Kung ibig 
	ninyong masukatan ang mga ginagawang pang-aapi o kabutihan ng isang bayan sa 
	kapwa, ay wala kayong ibang dapat gawin kundi tingnan na lamang kung 
	kinamumuhian o minamahal. At sa ganyan ay naliliwanagan na kung bakit ang 
	ilang yumaman dito, mula sa mga matataas na katungkulang ginanap, ay pawang 
	pag-alimura at pag-alipusta ang ipinatutunkol sa kanilang pinahirapan, 
	pagbalik sa Espa&ntilde;a. <i xml:lang="la" lang="la">Proprium humani ingenii est 
	odisse quem laeseris.</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y 
	kung ang mundo ay malaki, kung binabayaang matahimik sa kanila ang 
	kapangyarihan.... Kung wala akong ibang hinihingi kundi ang gumawa, bayaan 
	akong mabuhay......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At magkaroon 
	ng mga anak na mapayapa na pagkatapos ay ilalaan sa pahirap!--ang patuloy ni 
	Simoun na pakutyang ginayahan ang pag-bigkas ni Basilio ng mga salita--Kay 
	inam na kinabukasan ang inihahanda ninyo sa kanila, at pasasalamatan sa inyo 
	ang isang kabuhayang pawang pangangayupapa at paghihirap! Mabuti, binata! 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pag ang isang katawan ay hindi na kumikilos ay hindi na kailangang siya'y 
	patibayin. dalawampung taong ganap na pagkaalipin, na pangangayupapang 
	walang likat, walang hulaw na pagkakaratay, ay nakalilikha sa kaluluwa ng 
	isang pagkahukot na hindi maitutuwid sa isang araw. Ang mabubuti o 
	masasamang kalooban ay minamana at nagkakasalinsalin sa mga magulang at mga 
	anak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mabuhay na nga ang inyong kaigaigayang mga paghahaka, mabuhay ang 
	pangarap ng alipin na walang hinihingi kundi kaunting bunot na sukat 
	maibalot sa tanikala upang mapahina ang kalansing at ng huwag masugatan ang 
	kanyang balat! Ang hinahangad ninyo'y isang munting tahanan na may kaunting 
	kaluwagan; isang asawa't kaunting bigas: iyan ang lalaking pinakamagaling sa 
	Pilipinas! Siya, kung ipag-kaloob sa inyo ang bagay na iyan ay akalain na 
	ninyong kayo'y mapalad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio na 
	nahirati sa pagsunod at sa pagtitiis sa kainitan ng ulo ng Kapitan&nbsp;Tiago, 
	at nabighani kay Simoun na namamalas niyang kasindaksindak at kakilakilabot 
	sa gitna ng isang lagay na tigmak sa luha at dugo, ay nagnasang mangatwiran, 
	sa pagsasabing wala siyang kakayahang manghimasok sa politika, na wala 
	siyang masasabi, sapagka't hindi niya napag-aaralan ang bagay, ngunit 
	kailan ma'y handa siyang maglingkod, sa araw na hilingin sa kanya, na sa mga 
	sandaling iyon ay wala siyang nakikitang kailangan liban sa ang bayan ay 
	matuto, at <abbr>ibp.</abbr> Pinigil ni Simoun ang kanyang salita sa isang 
	galaw, at sa dahilang malapit nang mag-umaga, ay nagsabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Binata, hindi 
	ko ipinagbibilin sa inyo na itago ang aking lihim, sapagka't batid ko na ang 
	pagkamalihim ay isa sa inyong ugaling taglay, at saka ang isa pa'y kahit na 
	ibigin ninyong ako'y isuplong ay unang paniniwalaan ang mag-aalahas na si 
	Simoun, ang kaibigan ng mga may-kapangyarihan at ng mga pari, kay sa 
	nag-aaral na si Basilio, na pinaghihinalaan nang pilibustero, sa dahilang 
	siya'y taga ritong natatangi at nababantog, at sapagka't sa ninanasang 
	matutuhan ay makakatagpo ng malalakas na kalaban. Gayon man, kahit hindi 
	ninyo tinugunan ang aking pag-asa, sa araw na magbago kayo ng paghahaka, ay 
	hanapin ninyo ako sa aking bahay sa Escolta at paglilingkuran ko kayo ng 
	buong lugod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napasalamat si 
	Basilio at lumayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Namali kaya 
	ako ng tukoy?--ang bulong ni Simoun ng siya'y nag-iisa na--alinlangan kaya sa 
	akin o lubhang lihim na binabalak ang kanyang higanti kaya't 
	ipinangangambang ipagkatiwala sampu sa katahimikan ng gabi? O kaya'y sa 
	dahilang pinawi na sa kanyang puso ang damdaming pagkatao ng mahabang 
	panahong pamamanginoon at walang inilabi kundi ang hilig pagkahayop na 
	mabuhay na lamang at magpadami ng lipi? Kung gayon ay sira ang bubuan at ang 
	nararapat ay tunawing muli.... Ang pagkakamatay nga ay kailangan na: mamatay 
	ang mga walang kaya at malabi ang mga lalong malakas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At mapanglaw 
	na nagpatuloy, na waring may katungo:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magtiistiis 
	muna kayo, kayong mga nagpamana sa akin ng isang pangalan at isang tahanan, 
	magtiistiis muna kayo! Lahat ay nawala sa akin, ang bayan, ang kinabukasan, 
	sampu ng inyong mga libingan.... ngunit magtiistiis muna kayo! At ikaw 
	budhing marangal, dakilang kaluluwa, pusong mapaglingap na nabuhay sa iisang 
	hangad lamang at ipinara mo ang iyong buhay na hindi man nag-antay ng 
	pasasalamat at paghanga ng kahit sino, magtiis ka muna, magtiis tiis ka! Ang 
	mga kaparaanang ginagamit ko ay hindi marahil ang ginamit mo, ngunit siyang 
	lalong madali.... Nalalapit na ang araw, at pagliliwanag ay ako na rin ang 
	magbabalita sa inyo: Magtiistiis muna kayo!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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