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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXIII. Ang Huling Matuwid</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sumapit din 
	ang araw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun, 
	magmula sa umaga, ay hindi umalis sa kanyang bahay, dahil sa pag-aayos ng 
	kanyang mga sandata at mga hiyas. Ang kanyang malaking kayamanan, ay nasa sa 
	loob na ng malaking takbang patalim na may sapot na lona. Kakaunting 
	sisidlan na lamang na may mga galang at mga panusok ang nalalabi, marahil ay 
	mga panghandog na kanyang ipamimigay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Aalis na nga siyang kasama ng Capitan 
	General, na ayaw na ayaw palawigin ang panghahawak sa katungkulan, dahil sa 
	pangingilag sa sasabihin ng tao. Ibinubulong ng mga malabiga na si Simoun ay 
	ayaw mangahas na maiwang mag-isa, na, kung mawalan ng pinanananganan, ay 
	ayaw na mapaghigantihan ng maraming pinagtubuan at mga nasawi, at ang lalo 
	pa manding malaking sanhi ay ang pangyayaring ang General na darating, ay 
	kilala sa pagka may matuwid na hilig, at marahil-dahil ay ipasauli sa kanya 
	ang lahat ng kinita. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang dako naman ay sinasapantaha ng mga mapamahiing 
	indio na si Simoun ay isang diablo na ayaw malayo sa kanyang huli. Ang mga 
	mapaghaka ng masama ay kumikindat ng may pakahulugan at nagsasabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung pudpod 
	na ang parang ay lilipat na sa ibang dako ang balang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ilan 
	lamang, kakaunti, ang nangagsisingitit hindi umiimik.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinahapunan ay iniutos ni Simoun sa kanyang alila na kung darating ang isang 
	binatang nagngangalang Basilio, ay papasuking agad. Pagkatapos ay nagkulong 
	sa kanyang silid at waring nasadlak sa isang malalim na pagkukurokuro. 
	Mula't sapul noong magkasakit, ang mukha ng mag-aalahas ay lalo pa manding 
	tumigas at lalong pumanglaw, lumalim na mabuti ang guhit niya sa pag-itan ng 
	dalawang kilay. Waring nahukot ng kaunti; ang ulo'y hindi na tayongtayo, 
	nayuyuko. Lubhang nalululong sa kanyang pag-iisip na hindi tuloy nadinig na 
	may tumatawag sa pintuan. Kinailangang ulitin ang katog. Si Simoun ay 
	nangilabot:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tuloy!--aniya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang dumating 
	ay si Basilio, ngunit <i xml:lang="la" lang="la">quantum mutatus</i>! Kung 
	ang pagkakabago ng anyo ni Simoun sa loob ng dalawang buwan ay malaki, ang 
	sa binata'y kakilakilabot. Ang kanyang mga pisngiy hukay, walang ayos ang 
	bihis, gusot ang buhok. Nawala ang matamis na kalamlaman sa kanyang mga 
	paningin at ang nagniningning ay ang madilim na lagablab; masasabing siya'y 
	namatay at ang kanyang bangkay ay muling nabuhay sa pagkasindak sa mga bagay 
	na nakita sa kabilang buhay. Kundi man ang gawang linsil, ay ang 
	kakilakilabot na anino noon ang nakakalat sa buo niyang tikas. Si Simoun na 
	ay nagulat pa at nagdamdam habag sa sawing palad na iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ay 
	lumapit na dahandahan, na hindi na bumati, at nagwikang ang tinig ay 
	nakapagpakilabot sa mag-<span class="locked">aalahas, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ginoong 
	Simoun, ako'y naging masamang anak at masamang kapatid; linimot ko ang 
	pagkakapatay sa huli at ang pagpapahirap sa una, at pinarusahan ako ng&nbsp; 
	Diyos ! 
	Ngayo'y wala na ako kungdi isang nasa upang gantihin ng sama ang sama, ng 
	linsil ang linsil, ng dagok ang dagok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tahimik siyang 
	pinakikinggan ni Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May apat na 
	buwan na,--ang dugtong ni Basilio--na kinausap ninyo ako nang ukol sa inyong 
	mga balak; tumanggi akong makilahok, at masama ang nagawa ko; may katwiran 
	kayo. May tatlong buwan na at kalahating kamuntik nang bumuga ang 
	panghihimagsik; hindi ko rin inibig ang makilahok, at ang galawan ay nabako. 
	Ang kapalit ng aking inasal ay ang mabilanggo at utang ko sa inyong 
	pagsusumakit ang aking paglaya. May katwiran kayo, at naparito ako ngayon 
	upang sabihin sa inyo, na: bigyan ng sandata ang aking kamay at bumuga na 
	ang himagsikan! Laan akong paglinkuran kayong kasama ang tanang sawi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ulap na 
	nagpapadilim sa noo ni Simoun ay biglang napawi, isang sinag ng 
	pagtatagumpay ang kuminang sa kanyang paningin, at waring natagpuan ang 
	hinahanap, ay bumulalas nang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May katwiran 
	ako, oo, may katwiran ako! ang karapatan ay taglay ko, ang matuwid ay nasa 
	sa aking piling, sapagka't ang itinatanggol ko'y ang mga sawi.... Salamat, 
	binata, salamat! Dumating kayo upang pawiin ang aking mga pagaalinlangan, 
	upang bakahin ang aking pag-uurongsulong....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	tumindig at ang kanyang mukha'y galak na galak: ang silakbong nag-uudyok sa 
	kanya nang, may apat na buwan na, ipinahahayag kay Basilio ang kanyang mga 
	balak sa gubat ng kanyang mga ninuno, ay muling namakas sa kanyang mukha na 
	wariy isang mapulang pagtatakipsilim, matapos ang isang maghapong malamlam.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo,--ang patuloy,--ang kilusan ay nabako at marami ang lumayo sa akin 
	sapagka&#39;t nakita akong lupaypay na uurongsulong nang sandaling kikilos na: 
	may itinago pa ako sa aking puso, hindi ko supil ang lahat ng aking damdamin 
	at umiibig pa ako noon!.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Patay na ang lahat sa akin, at wala ng bangkay 
	na dapat kong igalang ang kanyang paghimlay! Hindi na magkakaroon ng 
	pag-uurongsulong; kayong kayo na, binatang huwaran, kalapating walang apdo, 
	ay nakakakilala ng pangangailangan, pumarito sa akin at inuudyukan ako sa 
	pagkilos! May kagabihan na nang buksan ninyo ang inyong mga mata! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Tayong 
	dalawa sana&#39;y nakapagbalangkas at nakagawa ng mga kahangahangang balak: 
	ako&#39;y sa itaas, sa mataas na lipunan, magsasabog ako ng kamatayan sa gitna 
	ng mga bango at ginto, gawing asal hayop ang may masasamang hilig, at 
	pasamain o huwag pakilusin ang ilang mabuti, at kayo naman ay sa dakong 
	ibaba, sa bayan, sa gitna ng kabinataan, na gisingin ang buhay sa gitna ng 
	dugo at mga luha! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang ating gawa, sa lugar na maging madugo at ganid, ay 
	naging kahabagan sana, ayos, anyong anyo, at ang tagumpay sana ay siyang 
	naging dulo ng ating pagsusumikap! Ngunit walang katalinuhang tumulong sa 
											akin. Takot at kahinaang loob ang natagpuan ko sa mga may kabihasnan, 
	pagkamapagsarili sa mayayaman, pagkamapaniwala sa kabataan, at sa mga bundok 
	lamang, sa mga kaparangan, sa mga may mahihirap na kabuhayan lamang 
	natagpuan ko ang aking mga tao! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Datapwa&#39;y walang kailangan! kung hindi tayo 
	makatapos ng isang ayos na larawan, na makinis ang lahat ng kanyang anyo, sa 
	batong magaspang na ating tatapyasin, ay ang mga susunod na ang siyang 
	magsisiganap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At pinigilan 
	sa bisig si Basilio, na nakikingig nang hindi nawawatasan ang kanyang 
	sinasabi, at dinala siya sa gawaan na pinagtataguan ng kanyang mga yaring 
	ukol sa kimika.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa ibabaw ng 
	isang mesa ay may isang kahang maitim na <i xml:lang="es" lang="es">chagrin</i>, 
	na nahahawig sa mga pinagsisidlan ng mga kasangkapang pilak na inihahandog 
	sa kapwa ng mga mayayaman at mga hari. Binuksan ni Simoun at inilantad, sa 
	ibabaw ng rasong pula, ang isang lampara na katangitangi ang ayos. Ang 
	sisidlan ay anyong isang granada, kasinglaki ng ulo ng tao, may kaunting 
	bitak, na kinakakikitaan ng mga butil sa loob, na ginayahan ng malalaking
	<i xml:lang="es" lang="es">cornalina</i>. Ang balat ay gintong nangitim at 
	kuhang kuha sampu ang mga kilabot ng bungang kahoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahandahang 
	kinuha ni Simoun, at matapos na maalis ang ilawan, ay inilantad ang loob ng 
	sisidlan: ang bao ay patalim, na ang kapal ay mga dalawang dali, at maaaring 
	maglaman ng higit sa dalawang litro. Tinatanong siya sa tingin ni Basilio: 
	walang mawawaan sa bagay na iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi na 
	nagsalisalita ay maingat na kinuha sa isang tinggalan ang isang prasko at 
	ipinakita sa binata ang nasusulat sa ibabaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nitro-glicerina!--ang bulong ni Basilio na napaurong at inilayong bigla ang 
	kamay.--Nitro-glicerina! Dinamita!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nang 
	maunawa na mandin ay nangalisag ang kanyang mga buhok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, 
	nitro-glicerina!--ang dahandahang ulit ni Simoun na taglay ang kanyang 
	malamlam na ngiti at malugod na tinitingnan ang prasko;--ito'y higit pa kay 
	sa nitro-glicerina! Ito'y mga luhang naipon, mga pagtatanim na tinimpi, mga 
	kagagawang wala sa katwiran, at mga pag-api! Ito ang dakilang katwiran ng 
	mahina, lakas laban sa lakas, bayong laban sa bayo.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Di pa nalalaong ako'y 
	nag-aalinlangan, ngunit kayo'y dumating at ako'y napapanibulos! Sa gabing 
	ito'y mangagsisiilandang ang mga lalong mapanganib na maniniil, ang mga 
	maniniil na walang muwang, ang mga nagkakanlong sa likod ng&nbsp; Diyos&nbsp; at ng 
	Pamahalaan, na ang kanilang mga pamamaslang ay hindi napaparusahan sapagka't 
	walang makausig sa kanila! Sa gabing ito madidinig ng Pilipinas ang putok 
	na dudurog sa walang wastong monumento na pinadali ko ang pagkabulok!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ay 
	uulig-ulig: ang kanyang mga labiy gumagalaw nang walang mapalabas na tunog, 
	nararamdaman niyang hindi maikilos ang kanyang dila, nanunuyo ang kanyang 
	ngalangala. Noon lamang niya nakita ang marahas na tubig na napagdidinig 
	niyang sinasabi, na wariy tinigis sa dilim ng mga mapapanglaw na tao, na 
	lantad na kalaban ng kalipunan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngayo'y nasa sa harap niya, malinaw at 
	naninilawnilaw, na ibinubuhos ng buong pag-iingat sa loob ng mapanutong 
	granada. Sa ganang malas niya, waring si Simoun ay yaong
	<i xml:lang="es" lang="es">genio</i> sa <i>Sanglibo't isang gabi</i> na 
	lumalabas sa gitna ng dagat: nag-aanyong malakingmalaki, ang ulo'y abot sa 
	langit, pinasabog ang bahay at niyanig ang buong siyudad sa isang galaw ng 
	kanyang likod. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang granada ay nag-aanyong isang malaking
	<i xml:lang="es" lang="es">esfera</i>, at ang bitak ay isang kakilakilabot 
	na ngisi, na nilalabasan ng apoy at lagablab. Noon lamang napadala si 
	Basilio sa katakutan at nawalang lubos ang kanyang kalamigang loob.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	nama'y itinotornilyo ni Simoun ang isang katangitangi at pasalisalimuot na 
	kasangkapan, inilagay ang tubong bubog, ang bomba, at ang lahat ng iyon ay 
	pinutungan ng isang magarang pantalya. Pagkatapos ay lumayo nang kaunti 
	upang tanawin ang anyo, pinakilingkiling ang ulo sa magkabikabilang 
	tagiliran upang lalong mataya ang ayos at kainaman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nang 
	makitang tinititigan siya ni Basilio ng tinging nagtatanong at nanganganib, 
	ay nagsabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mamayang 
	gabiy magkakaroon ng isang pista at ang lamparang ito'y ilalagay sa gitna 
	ng isang kioskong kakainan na sadya kong ipinagawa. Ang lampara ay 
	magbibigay ng isang maningning na ilaw na sukat na siyang mag-isa upang 
	magpaliwanag sa lahat: ngunit pagkaraan ng dalawampung minuto ay lalamlam 
	ang ilaw, at sa gayon, kapag tinangkang itaas ang lambal ay puputok ang 
	isang kapsulang <i xml:lang="es" lang="es">fulminato de mercurio</i>, ang 
	granada ay sasabog at kasabay niya ang kakainan na sa bubong at sahig ay 
	kinanlungan ko ng mga bayong ng pulbura upang walang makaligtas na sino 
	man......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagkaroon ng 
	sandaling pananahimik: pinagmamasdan ni Simoun ang kanyang <i>aparato</i> at 
	si Basilio ay bahagya nang humihinga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	hindi na kailangan ang aking tulong,--ang pakli ng binata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, kayo'y 
	may ibang katungkulang gaganapin,--ang sagot ni Simoung nagkukurokuro,--sa ika 
	siyam ay nakaputok na marahil ang makina at ang tunog ay nadinig na sa mga 
	kanugnog na bayan, sa mga bundukin, sa mga yungib. Ang kilusang aking 
	minunakala na kasabwat ang mga artillero ay hindi nangyari sa kakulangan ng 
	pamamahala at pagsasabaysabay. Sa ngayo'y hindi na magkakagayon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pagkadinig 
	ng putok, ang mga mahihirap, ang mga sinisiil, ang mga naglalagalag na 
	inuusig ng kapangyarihan, ay mangagsisilabas na may sandata at makikisama 
	kay Kabesang Tales sa Santamesa upang lusubin ang siyudad; sa isang dako 
	naman, ang mga militar na pinaniwala kong ang General ay nagpakana ng isang 
	wariy panghihimagsik upang huwag umalis, ay lalabas sa kanilang mga kuartel 
	upang paputukan ang sino mang ituro ko. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Samantala namang ang bayan, sindak, 
	at sa pag-aakalang dumating na ang oras na sila'y pagpupupugutan, ay 
	magbabangong handa sa pagpapakamatay, at sa dahilang walang sandata at hindi 
	sila ayos, kayo, na kasama ang ilan pa, ay siyang mangulo sa kanya at itungo 
	ninyo sa tindahan ni intsik Quiroga na pinagtaguan ko ng aking mga baril. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kami ni Kabesang Tales ay magtatagpo sa siyudad at ito'y aming kukunin, at 
	kayo sa mga arabal ay tatayo kayo sa mga tulay, magmumuog kayo roon, 
	hahandang sumaklolo sa amin at patayin ninyo, hindi lamang ang laban sa 
	panghihimagsik, kungdi ang lahat ng lalaking ayaw sumamang manandata!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	lahat?--ang bulong ni Basilio na ang boses ay mahina.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	lahat!--ang ulit ni Simoun na ang boses ay kasindaksindak,--ang lahat, indio, 
	mestiso, intsik, kastila, ang lahat ng matagpuang walang tapang at lakas ng 
	loob.... kailangang baguhin ang lipi! Ang mga amang duwag ay walang iaanak 
	kundi mga alipin, at walang kabuluhan ang maggiba kung magtatayo rin, na, 
	ang gagamitin ay mga bulok na sangkap! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano? nangingilabot kayo? Nanginginig, 
	natatakot kayong magsabog ng kamatayan? Ano ang kamatayan? Ano ang kabuluhan 
	ng pagkamatay ng dalawampung libong sawi? Dalawangpung libong paghihirap 
	na mababawas at mga angawangaw na dahop ang maililigtas sapol sa 
	pinanggalingan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang lalong matatakuting namamahala ay hindi nag-aalinlangan 
	sa paglalagda ng isang kautusan, na nagiging sanhi ng pagdadahop at ng 
	unti-unting paghihingalo ng libo at libong nasasakop, na masasagwa, 
	masisipag, marahil ay maliligaya, upang masunod lamang ang isang nasa, ang 
	isang naiisip, ang pagmamataas: at kayo'y nangingilabot sapagka't sa iisang 
	gabi ay matatapos na ang paghihirap ng budhi ng maraming duwag, sapagka't 
	ang isang bayang hindi kumikilos at nahilig sa masama ay mamamatay upang 
	paraanin ang isang bago, bata, masipag, puno ng lakas? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano ang kamatayan? 
	Isang bagay na walang kabuluhan o isang paghimbing! Ang kanyang mga 
	panagimpan baga ay maipapantay sa katunayan ng paghihirap ng lahat ng 
	dustang anak sa isang kapanahunan? Kailangang lipulin ang kasamaan, patayin 
	ang dragon upang ipaligo ang kanyang dugo sa bayang bago upang gawin itong 
	malusog at di madadaig! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano pa ang di mababaling batas ng kalikasan, batas 
	ng pagtutunggali na ang mahina'y sapilitang madadaig upang huwag mamalagi 
	ang liping masama at ang mga lumikha ay pumaurong? Iwaksi nga ang mga 
	pagninilay babai! Maganap ang mga batas na walang paglipas, tulungan natin 
	siya, at yayamang ang lupa ay lalo pang tumataba kapag siya'y dinidilig ng 
	dugo, at ang mga trono ay lalong nagtitibay kapag pinatitibayan ng mga 
	pagkakasala at ng mga bangkay, ay hindi dapat mag-urong sulong, hindi dapat 
	mag-alinlangan! Ano ang sakit ng kamatayan? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang sandaling pagkakaramdam, 
	marahil ay walang linaw, marahil ay masarap gaya ng sandaling pag-itan ng 
	pag-aantok at nang paghimbing.... Ano ang mapapawi? Isang kasamaan, isang 
	pagtitiis, mga damong unsiyami upang sa kanila'y ipalit na itanim ang ibang 
	sariwa! Tatawagin baga ninyong pag-utas ang gayon? Sa ganang akin ay 
	tatawagin kong paglikha, pagyari, pagpapaunlad, pagbibigay buhay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang gayong mga 
	marurugong paghuhulohulo na sinabi sa loob ng buong pananalig at kalamigang 
	loob, ay nakapanglupaypay sa binata, na ang pag-iisip ay ngalay na dahil sa 
	mahigit na tatlong buwang pagkakabilanggo at bulag sa hangad na 
	makapaghiganti, ay hindi na laan sa pagsuri nang tinutungo ng mga 
	bagaybagay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa 
											lugar na isagot na ang taong lalong masama o matatakutin ay 
	mahigit magpakailan man sa damo, sapagka't may isang kaluluwa at isang 
	pag-iisip, na, kahit mapakasama-sama at magpakaasal hayop, ay mangyayaring 
	mapabuti. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa lugar na itugong ang tao ay walang karapatang mamahala sa buhay 
	ng sino man sa kapakinabangan ng kahit sino, at na ang karapatan sa buhay 
	ay taglay ng bawa't isa, gaya rin naman ng karapatan sa kalayaan at sa 
	kaliwanagan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa lugar na ipinakling kung kapaslangan man ng mga pamahalaan 
	ang pagpaparusa sa mga pagkukulang o kasamaanggawa, na kanilang pinag-abuyan 
	dahil sa kakulangan sa pag-iingat o kamalian, gaano pa kaya ang isang tao, 
	kahit na napakalaki at napakasawi, na magpaparusa sa kaawaawang bayan ng 
	pagkukulang ng kanyang mga pamahalaan at mga ninuno. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa lugar na sabihing 
	ang&nbsp; Diyos&nbsp; lamang ang tanging makagagawa ng mga gayong paraan, na, ang&nbsp; 
	Diyos&nbsp; ay 
	maaaring lumikha, ang&nbsp; Diyos&nbsp; ang may hawak ng gantingpala, ng walang katapusan 
	at ng kinabukasan upang mabigyang katwiran ang kanyang mga gawa, ngunit ang 
	tao'y hindi, magpakailan man! Sa lugar ng mga pangangatwirang ito, ay walang 
	inilaban si Basilio kundi isang karaniwang puna:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	sasabihin ng buong mundo sa harap ng gayong pagpapapatay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gaya ng 
	karaniwan, ang mundo'y papagakpak, at bibigyang katuwiran ang lalong 
	malakas, ang lalong mabangis!--ang pangiting sagot ni Simoun.--Ang Europa ay 
	pumagakpak nang ang mga bansa sa kanluran ay pumatay ng angaw angaw na indio 
	sa Amerika, at hindi pa upang makapagtatag ng mga bansang lalong may 
	mabubuting hilig ni lalong matahimik; nariyan ang Hilaga, na may taglay na 
	kalayaang sinasarili, may batas ni <span xml:lang="en" lang="en">Lynch</span>, 
	may mga daya sa politika; naiyan ang Timog na may mga walang katahimikang 
	republika, may mga himagsikan ng magkababayan, mga pagbabangon, gaya ng 
	nangyari sa kanyang inang Espa&ntilde;a! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang Europa ay pumagakpak ng hubaran ng 
	Portugal ang mga pulong Molukas, pumagakpak ng pugnawin ng makapangyarihang 
	Inglaterra ang mga liping likas sa Pasipiko upang ilagay ang sa kanyang mga 
	taong naglilipat bayan. Ang Europa ay papagakpak nang gaya ng pagakpak sa 
	pagtatapos ng isang <i>drama</i>, sa pagkatapos ng isang
	<i xml:lang="es" lang="es">tragedia</i>: hindi lubhang pinapansin ng madla 
	ang pinakalayon, ang tinitignan lamang ay ang ipinamamalas na mainam sa 
	mata! Gawing maayos ang kabuktutan at hahangaan at magkakaroon pa nang higit 
	na kampi kay sa mga gawang kabutihan, na ginanap sa paraang mabanayad at 
	kimi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga,--ang 
	pakli ng binata,--at saka anong mayroon sa akin ang pumagakpak man o pumula, 
	kung ang mundong iyan ay hindi nababalino ng dahil sa mga sinisiil, sa mga 
	maralita't sa mga babai? Anong ipagpipitagan ko sa kalipunan sa siya'y hindi 
	nagtataglay ng gayon sa akin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ganyan ang 
	ibig ko,--ang sabing matagumpay ng nag-uudyok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At kumuha ng 
	isang rebolber sa isang kahon, at iniabot sa kanyang ang sabiy:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa ika sampu 
	ay antabayanan ninyo ako sa tapat ng simbahan ng <abbr>S.</abbr>&nbsp;Sebastian 
	upang tanggapin ang aking mga huling bilin na dapat gawin. Ah! Sa ika siyam 
	ay nararapat kayong malayo, lubhang malayo, sa daang&nbsp;Anloague!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Siniyasat ni 
	Basilio ang armas, linagyan ng punglo at itinago sa kanyang bulsang pangloob 
	ng amerikana. Nagpaalam sa pamagitan ng isang putol na:--Hanggang mamaya!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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