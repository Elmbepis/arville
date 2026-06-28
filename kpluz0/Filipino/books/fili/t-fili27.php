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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXVII. Ang Prayle at ang Pilipino</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iniwan natin 
	si Isagani na nagsasalita sa kanyang mga kaibigan. Sa gitna ng kanyang 
	kasigabuhan, ay nilapitan ng isang kapista upang sabihin sa kanyang ibig 
	siyang makausap ni Padre Fernandez, isa sa mga katedratiko sa
	<i xml:lang="es" lang="es">ampliacion</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani'y 
	namutla. Sa ganang kanya'y isang taong kagalang-galang si Padre Fernandez: 
	yaon ang <em>isa</em> na kanyang itinatangi kailan pa ma't ang napag-uusapan 
	ay ang pag-alimura sa prayle.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ang 
	ibig ni Padre Fernandez?--ang tanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ng 
	kapista ang balikat; sinundan ni Isagani na masama ang loob.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Fernandez, yaong prayleng nakita natin sa <span xml:lang="es" lang="es">
	Los&nbsp;Ba&ntilde;os</span>, ay nag-aantay sa kanyang silid, malungkot at walang imik, 
	na nakakunot ang noo na waring nag-iisip. Tumindig nang makitang pumasok si 
	Isagani, binati itong kinamayan, at inilapat ang pintuan; pagkatapos ay 
	nagpayao't dito sa magkabilang dulo ng silid. Nakatayo si Isaganing inaantay 
	na siya'y kausapin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ginoong 
	Isagani,--ang sabing ang tinig ay nanginginig, ng malaunan:--mula sa 
	durungawan ay nadinig ko kayong nagsasalita, sa dahilang ako'y natutuyo, ay 
	matalas ang aking pangdinig, kaya't ninasa kong kayo'y makausap. Kailan man 
	ay kinalugdan ko ang mga binatang nagpapahayag ng maliwanag at mayroong 
	kanyang sariling paghuhulo at pagkilos; walang kailangan sa akin na ang 
	kanilang pagkukuro ay maiba sa pagkukuro ko. Alinsunod sa aking nadinig, ay 
	nagkaroon kayo kagabi ng isang hapunan, huwag kayong magdahilan....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa hindi 
	naman ako nagdadahilan!--ang putol ni Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lalong 
	mabuti, iyan ay nagpapakilalang inyong pinangangatawanan ang magiging bunga 
	ng inyong ginawa. Sa isang dako ay masama pa ang kayo'y tumakwil; hindi ko 
	kayo sinisisi, hindi ko pinupuna ang mga pinagsabi doon kagabi; hindi ko 
	kayo binibigyang sala, sapagka't may kalayaan kayong magsabi ng bawa't 
	maisip na laban sa mga dominiko; kayo'y hindi sa amin aral; ng taong ito 
	lamang nagkaroon kami ng lugod na mapatungo kayo rito sa amin at marahil ay 
	hindi na kayo mapasok na muli pa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Huwag ninyong akalain na tutukoy ako ng 
	ukol sa utang na loob, hindi; hindi ko aaksayahin ang aking panahon sa mga 
	bagay na walang kabuluhan. Ipinatawag ko kayo, sapagka't inakala kong kayo'y 
	isa sa mga kakaunting nag-aaral na kumikilos ng dahil sa sariling pananalig, 
	at sa dahilang kinalulugdan ko ang mga taong may lubos na pananalig, aniko 
	sa sarili ay, makikipaglinawan ako kay ginoong&nbsp;Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Fernandez ay humintong sandali at ipinatuloy ang kanyang pagpapayao't dito 
	na nakatungo at nakatingin sa dakong ibaba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kayo'y 
	makauupo kung ibig ninyo,--ang patuloy;--may ugali akong lumalakad ay 
	nagsasalita, sapagka't sa gayon ay lalong natutumpak ang aking mga 
	pagkukuro.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isaganiy 
	nagpatuloy na nakatayo, mataas ang ulo, at inaantay na tiyakin ng 
	katedratiko ang salitaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mahigit nang 
	walong taong na ako'y nagtuturo,--ang patuloy ni Padre Fernandez na 
	palakadlakad--at nakilala ko't nakasalamuha ang mahigit sa dalawang libo at 
	limang daang binata; tinuruan ko sila, pinunyagi ko ang mapadunong, inaralan 
	ko ng pagtataglay ng katwiran, ng karangalan, ngunit gayon man, sa panahong 
	ito na lubhang marami ang inilalait sa amin, ay wala akong nakitang isa man 
	na nagkaroon ng kapangahasang pagmatigasan ang kanyang mga sinasabi kapag 
	nahaharap sa isang prayle.... ni masabi man lamang ng malakas sa harap ng 
	marami.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											May mga binatang inuupasalaan kami sa likod at hinahagkan ang 
	aming mga kamay kung kaharap at sa tulong ng ngiting bulisik ay nanananghod 
	ng aming sulyap! Puf! Ano ang ibig ninyong gawin namin sa mga ganyang tao?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi nila 
	sarili ang kasalanan, Padre,--ang sagot ni Isagani,--ang kasalanan ay nasa sa 
	mga nagturo sa kanila ng pagbabalatkayong ugali, nasa mga sumisiil sa 
	malayang kaisipan, sa malayang pangungusap. Dito, ang lahat ng pagkukurong 
	sarili, ang anumang salita na hindi kasang-ayon ng nasa ng nakapangyayari, 
	ay ipinalalagay na pagkapilibustero, at alam ninyong maigi ang kahulugan ng 
	salitang ito: Baliw ang sa pagnanasang masabi lamang na malakas ang iniisip 
	ay hahanda sa pagtitiis ng mga pag-uusig!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang mga 
	pag-uusig na inyong tinitiis?--ang tanong ni Padre Fernandez na 
	itinaas ang ulo,--hindi ko kayo binayaang mangusap ng malaya sa aking klase? 
	Ngunit gayon man, kayo'y isang maitatangi, na, kung tunay ang sinasabi, ay 
	dapat kong ituwid, upang mapalaganap ang kaugalian, kung mangyayari, upang 
	maiwasan ang masamang halimbawa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngumiti si 
	Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pinasasalamatan ko kayo at hindi ko ipakikipagtalo kung ako'y natatangi o 
	hindi; tatanggapin ko ang katangian upang tanggapin naman ninyo ang aking 
	sasabihin; kayo man ay tangi rin; at sa dahilang dito'y hindi natin 
	pag-uusapan ang mga pagkakatangi, ni ang pagpaparangya ng ating mga 
	pagkatao, sa ganang akin ay gayon ang aking akala, ay ipinamamanhik ko sa 
	aking katedratiko na mangyaring baguhin ang lakad ng salitaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kahit na may 
	pagkukurong malaya ay napataas ang ulo ni Padre Fernandez at 
	tinitigang lipos pagkakamangha si Isagani. Ang binatang iyon ay may mahigit 
	pang pagkamalaya kay sa inakala niya; kahit tinawag siyang <i>katedratiko</i>, 
	kung tatayahin, ay inaari siyang kapantay, dahil sa nangahas magmungkahi. 
	Dahil sa mabuting magparaan sa pakipag-usap, ay hindi lamang tinanggap ni
	Padre Fernandez ang pangyayari, kun di siya na ang nagbukas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuti!--ang 
	sabi,--ngunit huwag ninyong ipalagay na ako'y inyong guro; ako'y isang 
	prayle at kayo'y isang nag-aaral na pilipino; walang labis, walang kulang! 
	at ngayon ay itatanong ko sa inyo: ano ang nasa sa amin ng mga nag-aaral na 
	pilipino?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumating na 
	pabigla ang katanungan: si Isagani ay hindi handa. Iyon ay isang ulos na 
	biglang lumusot samantalang nagmumuog, gaya ng tawag sa
	<i xml:lang="es" lang="es">esgrima</i>. Sa kabiglaanang iyon, si Isagani, ay 
	tumugon ng isang matinding salag na waring isang baguhang nagsanggalang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na kayo'y 
	mangagsitupad sa inyong kautangan!--aniya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si pray 
	Fernandez ay umunat: naging wariy putok ng kanyon, sa ganang kanya, ang 
	kasagutan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Na kamiy 
	tumupad sa aming kautangan!--ang ulit na nagpakaunat-unat,--kung gayo'y hindi 
	kami tumutupad sa aming kautangan? anong mga kautangan ang itinutungkol 
	ninyo sa amin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Yaon ding 
	malayang iniatang sa sarili ninyo ng kayo'y pumasok sa kalipunan, at yaong 
	pagkatapos, nang nasa sa loob na kayo, ay ninasang taglayin! Ngunit sa 
	aking pagkanag-aaral na pilipino, ay hindi ko inaakalang ako'y may 
	karapatang sumuri ng inyong inaasal sang-ayon sa inyong mga palatuntunan, sa 
	katolisismo, sa pamahalaan, sa bayang pilipino at sa buong sangkatauhan: mga 
	bagay iyang dapat ninyong linawin sa mga tagapagtatag ninyo, sa Papa, sa 
	pamahalaan, sa buong bayan o sa&nbsp; Diyos : sa aking pagkanag-aaral na pilipino, 
	ay ang kautangan lamang ninyo sa amin ang tangi kong tutukuyin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga 
	prayle, ang kalahatan, sa pagiging tagasiyasat ng pagtuturo sa bayan bayan, 
	sa mga lalawigan, at ang mga dominiko, sa ganang kanila, sa paglilikom sa 
	kanilang mga kamay ng mga pag-aaral ng kabinataang pilipino, ay tumanggap ng 
	katungkulan, sa harap ng walong angaw-angaw na mamamayan, sa harap ng Espa&ntilde;a 
	at sa harap ng sangkatauhan na ating kinasasamahan, na pabutihin sa tuwituwi 
	na ang batang binhi, sa ugali at pangangatawan, upang ilandas siya sa 
	kanyang kaligayahan, lumikha ng isang bayang marangal, malusog, matalino, 
	mabait, marilag at matapat. At ngayo'y ako naman ang magtatanong: tumupad 
	baga ang mga prayle sa kanilang katungkulan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gumaganap 
	kami....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah! Padre  
	Fernandez,--ang pakli ni Isagani;--kung itututop ninyo ang kamay sa inyong 
	puso ay makasasagot <em>kayong</em> tumutupad, ngunit kung itututop ang 
	kamay sa puso ng inyong kalipunan, sa ibabaw ng puso ng lahat nang mga 
	kalipunang prayle, ay hindi ninyo masasabi ang gayon ng hindi 
	masisinungalingan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ah, Padre&nbsp;Fernandez! kapag nahaharap ako sa isang taong 
	aking minamamahal at iginagalang, ay ibig ko pa ang ako ang sisihin kay sa 
	sumisi, ibig ko pa ang magsanggalang kay sa sumugat. Ngunit yamang pumasok 
	na tayo sa pagpapaliwanagan ay magpatuloy na tayo hanggang sa wakas! Papano 
	ang ginagawang pagtupad sa kautangan ng mga nagsisiyasat ng pagtuturo sa mga 
	bayan bayan? Hinahadlangan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At ang mga tanging may hawak dito ng mga 
	pagpapaaral, ang mga may ibig na mag-ayos ng pag-iisip ng kabataan, na 
	walang ibang makapanghimasok papaano ang ginagawang pagtupad sa kanilang 
	katungkulan? Inaawasan hanggang mangyayaring awasan ang mga pagkataho, 
	pinapatay ang lahat ng sulak at sigabo, inaaba ang lahat ng karangalan, 
	tanging nagpapakilos sa kaluluwa, at itinatanim sa amin ang matatandang 
	pagkukuro, ang mga lipas na karunungan, ang mga maling batasan ng katwiran 
	na di kaagpang ng pamumuhay sa pagsulong! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ah! kung ang linalayon ay ang 
	pagpapakain sa mga bilanggo, ang pagbibigay ng kakanin sa mga nagkasala, ay 
	inilalagay ng pamahalaan sa <i>subasta</i> upang matagpuan ang 
	makapagdudulot ng lalong mabuting pagkain, ang hindi papatay ng gutom sa 
	kanila; kapag ang tinutungo ay ang palusugin ang pag-iisip ng isang buong 
	bayanan, palusugin ang kabataan, ang bahaging lalong mabuti, ang sa huliy 
	magiging siyang bayan at siyang lahat, di lamang hindi inilalagay sa <i>
	subasta</i> ng pamahalaan, kung di pinalalagi ang kapangyarihan doon sa 
	kalipunan na nagpaparangya ng pag-ayaw sa ikatututo, ng pag-ayaw sa anumang 
	pagkakasulong. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano ang wiwikain natin kung ang nagdadala ng pagkain sa mga 
	bilangguan, matapos na makuha sa pailalim na paraan ang kasunduang 
	pagpapakain, ay bayaang manglambot ang kanyang mga bilanggo sa kakulangan sa 
	dugo, dahil sa ang ibinibigay na pagkain ay lahat noong lipas at laos, at 
	pagkatapos ay magdahilang sabihin na hindi nababagay na magkaroon ng 
	mabuting katawan ang mga bilanggo, sapagka't ang mabuting katawan ay 
	nagdudulot ng masasayang kaisipan, sa dahilang ang katuwaan ay nagpapabuti 
	sa tao, at ang tao'y hindi dapat bumuti, sapagka't naaayon sa hangad ng 
	nagpapakain ang magkaroon ng maraming nagkakasala? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ano ang wiwikain natin 
	kung ang pamahalaan at ang nagpapakain ay magkasundo na sa sikolo o 
	labindalawang kuwarta na tinatanggap ng isa, sa bawa't isang may sala, ay 
	tanggapin naman ng isa ang aliw?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinakagatkagat 
	ni Padre Fernandez ang kanyang mga labi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakatinding 
	sumbong iyan,--ang sabi,--at kayo'y lumalagpas sa hangganan ng ating 
	kasunduan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, Padre; 
	patuloy ako sa pagtukoy ng ukol sa pag-aaral. Ang mga prayle, at hindi ko 
	sinasabing kayong mga prayle, sapagka't hindi ko kayo ibinibilang sa 
	karamihan, ang mga prayle ng lahat ng <i xml:lang="es" lang="es">orden</i> 
	ay naging pawang tagapagdulot ng aming ikatatalino, at sinasabi nila at 
	inihahayag ng walang kahiyahiya, na hindi nararapat na kamiy dumunong, 
	sapagka't balang araw ay hahangarin namin ang maging malaya! Ito'y kagaya 
	noong ayaw palusugin ang katawan ng bilanggo upang huwag bumuti at makaalis 
	sa bilangguan. Ang kalayaan, sa tao'y, kagaya ng ikatututo kung sa 
	katalinuhan, at ang pag-ayaw ng prayle na kamiy tumalino ay siyang sanhi ng 
	di namin kasiyahang loob!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	karunungan ay ibinibigay lamang doon sa karapatdapat magtamo!--ang pakli ni
	Padre Fernandez,--kung ipagkakaloob sa mga taong walang matibay na 
	puso at mabuting asal ay hahalay lamang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At bakit may 
	mga taong walang matibay na puso at mabuting asal?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ng 
	dominiko ang kanyang balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga kasiraang 
	nasususo nang kasama ng gatas, na nalalangap sa loob ng lipi.... ano ang
	<span class="locked">malay ko?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah hindi po,
	Padre Fernandez!--ang biglang bulalas ng binata,--hindi ninyo 
	sinuring mabuti ang bagay na pinag-uusapan, hindi ninyo ginawang tanawin ang 
	kailalimilaliman dahil sa pangambang baka mamalas doon ang anino ng inyong 
	mga kakapatid. Kayo ang may kagagawan ng aming anyo. Ang bayang sinisiil ay 
	pinipilit na magtaglay ng balat-kayong ugali; yaong pinagkakaitan ng 
	katotohanan ay binibigyan ng kasinungalingan; ang nagpapakadahas ay gumagawa 
	ng alipin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Walang mabuting aral, ang wika ninyo, kahit na! kahit 
	mangyayaring pabulaanan kayo ng mga talaan, sapagka't dito'y hindi 
	nangyayari ang mga pagkakasalang kagaya ng sa maraming bayang nabubulag sa 
	kanilang palalong taguring nangag-aayos ng ugali. Datapwa'y kahit hindi 
	hangad ang suriin sa ngayon kung ano ang bumubuo ng hilig at sa dahilang 
	natutungod sa kabutihang ugali ang aral na tinanggap, ay sang-ayon ako sa 
	inyo na kami nga'y may kasiraan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sino ang may sala sa pangyayaring iyan? O 
	kayong may tatlong daa't limang pung taong naghahawak ng aming ikatututo o 
	kaming umaalinsunod sa lahat ng bagay? Kung makaraan ang tatlong daa't 
	limang pung taon ay walang nayari ang eskultor kundi isang walang ayos na 
	larawan, ay lubhang napakatunggak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--O masama ang 
	putik na ginagamit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lalo pang 
	tunggak kung gayon, sapagka't alam na masama pala ay hindi iniiwan ang putik 
	at nagpapatuloy sa pag-aaksaya ng panahon.... at hindi lamang tunggak, 
	kungdi nagdadaya at nagnanakaw, sa dahilang batid na walang kapararakan ang 
	kanyang gawa ay ipinagpapatuloy upang tanggapin ang kaupahan.... at hindi 
	lamang tunggak at magnanakaw kung di taksil sapagka't humahadlang na ang 
	lahat ng ibang eskultor ay sumubok ng kanilang kaya upang tingnan kung 
	makakayari ng bagay na may halaga! Kalaitlait na pangingilag ng walang 
	kasapatan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tugon ay 
	napakatindi at naramdaman ni Padre Fernandez na siya'y nasilo. 
	Tiningnan si Isagani at namalas niyang malaki, hindi madadaig, namamaibabaw 
	at noon lamang siya naranasan, sa buo niyang kabuhayan, ang pag-aakalang 
	siya'y tinalo ng isang nag-aaral na pilipino. Nagsisi siya dahil sa kanyang 
	pagkakahamon sa pagtatalo, ngunit huli na. Sa kanyang kagipitan at sa 
	pagkakalagay sa harap ng gayong dapat katakutang kalaban ay humanap ng 
	mabuting kalasag at pinanghawakan ang pamahalaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipinapataw 
	ninyo sa amin ang lahat ng kasalanan, sapagka't wala kayong nakikita kundi 
	kaming kalapit,--ang sabing ang boses ay wala nang pagmamataas,--talagang 
	gayon, hindi ko ipinagtataka! kinamumuhian ng bayan ang sundalo o ang 
	alguasil na humuhuli sa kanya at hindi ang hukom na nag-utos ng paghuli. 
	Kayo at kamiy sumasayaw na lahat ng alinsunod sa lakad ng isang tugtugin: 
	kung itinataas ninyo ang inyong mga paa ng sabay sa amin, ay huwag kami ang 
	sisihin: ang tugtuging nagtatakda ng ating kilos. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Inaakala baga ninyong 
	kaming mga prayle ay walang budhi at ayaw kami sa kabutihan? Inaakala baga 
	ninyong hindi namin kayo naaalaala, na hindi namin naaalaala ang aming 
	kautangan, at kamiy kumakain lamang upang mabuhay at nabubuhay upang 
	maghari? Maanong magkagayon na nga! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ngunit, gaya rin ninyong kamiy 
	sumusunod sa lakad ng tugtugin; kamiy pigipit na pigipit: o palayasin ninyo 
	kami o kamiy palayasin ng pamahalaan. Ang pamahalaan ay siyang nag-uutos, 
	at sa nakapaguutos ay walang katwiran kundi ang sumunod!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa bagay na 
	iyan, kung gayon, ay makukuro--ang sabi ni Isagani na nakangiti ng 
	malungkot,--na hangad ng pamahalaan ang aming ikasasama?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oh, hindi, 
	hindi iyan ang ibig kong sabihin! Ibig kong sabihin, na may mga paniniwala, 
	may mga palagay at mga kautusan na inilalagda ng mabuti ang layon ngunit 
	mga kasakitsakit ang iniaanak. Ipaliliwanag kong lalong mabuti sa pagbanggit 
	ng isang halimbawa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Upang pigilin ang isang munting kasamaan, ay naglalagda 
	ng maraming kautusan na nagiging sanhi ng lalo pang maraming kasamaan:
	<i xml:lang="la" lang="la">corruptissima in republica plurimae leges</i>, ang 
	sabi ni Tacito. Upang iwasan ang isang pagdaraya, ay naglalagda ng isang 
	angaw angaw at kalahati na kapasiyahang nagbabawal at nakadudusta, na ang 
	iniaanak kaagad ay ang gisingin ang bayan upang iwasan at linlangin ang mga 
	tinurang pagbabawal: upang gawing makasalanan ang isang bayan ay walang 
	mabuting paraan na di gaya ng pag-alinlanganan ang kanyang kabaitan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lumagda 
	ng isang kautusan, huwag na rito kundi sa Espa&ntilde;a, at tingnan ninyo kundi 
	pag-aaralan ang paraan ng paglinlang sa kanya, ang gayo'y sapagka't nalimot 
	ng mga gumagawa ng kautusan ang pangyayari na samantalang ipinagkakatagotago 
	ang isang bagay ay lalo namang pinagnanasaang makita. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Bakit ang masamang 
	gawa at katalasan ay inaaaring malaking sangkap ng bayang kastila gayong 
	wala siyang makakapantay kung sa pagkamahal na tao, sa pagkamapagmataas at 
	sa pagkamahaldika? Sapagka't ang tagalagda namin ng kautusan, sa loob ng 
	lalong mabuting adhika, ay nangag-alinlangan sa kanyang pagkamahal, 
	sinugatan ang kanyang kataasan at hinamon ang kanyang pagkamahaldika! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ibig 
	ninyong gumawa sa Espa&ntilde;a ng isang daanan sa gitna ng mga talampas? Kung 
	gayo'y lagyan ninyo doon ng isang babalang magahasa na ipinagbabawal ang 
	magdaan, at iiwan ng bayan, na tumututol sa pagbabawal, ang daanan upang 
	mangunyapit sa mga bato. Sa araw na ipagbawal sa Espa&ntilde;a ang kabaitan, ng 
	isang manggagawa ng kautusan, at ipaganap na sapilitan ang kasamaan, sa 
	kinabukasan ay mabait na lahat ang tao!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Huminto ang 
	dominiko, at pagkatapos ay nagpatuloy:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	masasabi ninyong lumalayo tayo sa salitaan; magbabalik ako.... Ang masasabi 
	ko upang kayo'y maniwala, ay, na ang kasiraang tinataglay ninyo ay hindi 
	nararapat na ibintang sa amin ni sa pamahalaan; iyan ay nasa sa di wastong 
	pagkakatatag ng aming kapisanan, <i xml:lang="la" lang="la">qui multum 
	probat, nihil probat</i>, na nasasawi sa kahigitan sa pag-iingat, kakulangan 
	sa kailangan at lampas doon sa kalabisan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	kinikilala ninyo ang mga kasiraang iyan ng <em>inyong</em> kapisanan,--ang 
	tugon ni Isagani,--bakit nanghihimasok sa pag-aayos ng kapisanan ng iba at 
	hindi ang unahin ay ang sarili muna?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napapalayo 
	tayo sa ating salitaan, binata; ang kaparaanang pagsang-ayon sa mga bagay na 
	nangyari na ay dapat tanggapin....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahit na! 
	tinatanggap ko, sapagka't isa ng nangyari at patuloy ako sa pagtatanong: 
	bakit, kung ang pagkakatatag ng inyong kapisanan ay may kasiraan, ay hindi 
	ninyo palitan o kaya'y dinggin man lamang ang tinig ng mga napipinsalaan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nalalayo pa 
	rin tayo: ang pinagsasalitaan natin ay kung ano ang nasa ng mga nag-aaral sa 
	mga prayle....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapol sa 
	sandaling ang mga prayle ay nagkakanlong sa likod ng pamahalaan ay ito na 
	ang tutunguhin ng mga nag-aaral.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pakli ay 
	makatwiran; sa dakong iyon ay walang lulusutan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ako ang 
	pamahalaan at hindi ko masasagutan ang kanyang mga kilos. Ano ang nasa ng 
	mga nag-aaral na gawin namin, alang-alang sa kanila, sa loob ng hangganang 
	aming kinalalagyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag 
	humadlang sa kalayaan ng pag-aaral, kundi tumulong pa nga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iniling ng 
	dominiko ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahit hindi 
	ko tuturan ang sarili kong pagkukuro, iyan ay paghiling sa aming kamiy 
	magpatiwakal,--ang sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi po, 
	kung di bagkus na iba, iyan ay paghinging kamiy paraanin upang huwag kayong 
	masagasa at madurog.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hm!--ang sabi 
	ni Padre Fernandez na huminto at nag-isip--Simulan ninyo sa 
	paghingi ng bagay na hindi gayon kabigat, isang bagay na maaaring itulot ng 
	bawa't isa sa amin na hindi ikasisira ng karangalan at mga karapatang 
	taglay, sapagka't kung mangyayaring tayo'y magkalinaw at mamuhay ng payapa 
	ano't magkakagalit, ano't maghihinalaan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	tutungo tayo sa pagtukoy sa mga kasanhian....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, sapagka't 
	kung tatangkiin natin ang kinatitirikan ay maiguguho natin ang bahay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunguhin 
	natin ang mga kasanhian kung gayon, iwan natin ang kinalalagyan ng mga 
	batayan ng katwiran; at <em>hindi rin sasabihin ang sarili kong pagkukuro</em>--at 
	dito'y idiniin ng binata ang salita--maghuhumpay ang mga nag-aaral sa 
	kanilang inaayos at mapapawi ang ilang kapaitan kung ang mga nagtuturo ay 
	matututong pagpakitaan sila ng mabuti kay sa ipinakikita hanggang sa 
	ngayon.... Ito'y nasa sa inyong mga kamay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano?--ang 
	tanong ng dominiko--mayroon bagang anumang daing sa aking inuugali ang mga 
	nag-aaral?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Padre, sa 
	simula pa'y nagkasundo tayong hindi tutukuyin ni ako ni kayo. Nag-uusap tayo 
	ng pangkalahatan: bukod sa walang napapala ang mga nag-aaral sa mga taong 
	dinadaan sa mga klase, ay madalas pang iwan doon ang bahagi ng kanilang 
	karangalan, kungdi man ang lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinagat ni
	Padre Fernandez ang kanyang labi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang 
	pumipilit sa kanilang mag-aral; ang mga bukirin ay hindi natatamnan--ang 
	matigas na sagot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, may bagay 
	na pumipilit sa kanilang mag-aral,--ang tugon, na gayon din ang ayos ni 
	Isagani, na pinakaharapharap ang dominiko.--Bukod sa katungkulan ng bawa't 
	isa na hanapin ang kanyang ikawawasto, ay may isang likas na nasa ang tao na 
	patalasin ang kanyang pag-iisip, pagnanasang lalong masidhi dito sa dahilang 
	lubhang pinipigil; at ang nagbibigay ng kanyang salapi at buhay sa 
	pamahalaan ay may karapatang hingin dito na bigyan siya ng liwanag upang 
	kitaing lalong mabuti ang kanyang salapi at maingatang lalo ang kanyang 
	buhay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Opo, Padre; may bagay na pumipilit sa kanila, at ang bagay na iyan ay 
	ang pamahalaan din, kayo ring kumukutyang walang habag sa indio na hindi 
	nag-aral at ipinagkakait ang kanilang karapatan, sa pananangan sa sanhing 
	sila'y mangmang. Hinuhubaran ninyo sila at pagkatapos ay kinukutya ang 
	kanilang ikahihiya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Fernandez ay hindi sumagot; nagpatuloy sa pagyayao't dito, ngunit hindi 
	mapalagay na waring nagugulumihanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi 
	ninyong ang mga bukirin ay hindi natatamnan!--ang patuloy ni Isagani na iba 
	na ang ayos, makaraan ang isang sandaling pananahimik--huwag tayong pumasok 
	ngayon sa pagsuri ng kadahilanan, sapagka't mapapalayo tayo sa 
	pinag-uusapan; ngunit kayo Padre Fernandez, kayo, guro, kayo, 
	taong may karunungan, ibig ninyo ang isang bayan ng mga manananim, ng mga 
	magsasaka! Sa ganang inyo baga'y ang pagkamangsasaka na lamang ang 
	kalagayang lalong wastong maaabot ng tao sa kanyang pagsulong? O ibig 
	ninyong mapainyo ang karunungan at mapasa iba ang paggawa?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, ibig 
	kong ang karunungan ay taglayin noong dapat magtaglay, noong makapag-iingat 
	sa kanya,--ang sagot,--kapag nagpakita ang mga nag-aaral ng katibayan ng 
	pag-ibig sa kanya; kapag nagkaroon na ng mga binatang may pananalig, mga 
	binatang marunong magtanggol sa kanyang karangalan at maipagalang ito, ay 
	magkakaroon ng karunungan, magkakaroon na ng mga gurong may paglingap! Kung 
	may mga gurong namamaslang ay sa dahilang may mga tinuturuang umaalinsunod!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kapag 
	nagkaroon ng mga guro ay magkakaroon ng mga nag-aaral!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kayo ang 
	magpauna sa pagbabagong ayos, sapagka't kayo ang nangangailangan ng 
	pagbabago, at kamiy susunod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga,--ang 
	sabi ni Isagani na malungkot ang ngiti,--magpauna kami sa dahilang nasa dako 
	namin ang kasiraan! Taho ninyong lubos kung ano ang maaantay ng isang 
	tinuturuang humarap sa isang guro: kayo na, na taglay ang buong pag-ibig sa 
	katwiran, ang buong kagandahang loob, ay nagkakahirap kayo sa pagpipigil ng 
	tinuturan ko ang mapapait na katotohanan, kayong kayo na, Padre Fernandez! 
	Ano ang kabutihang napala ng nagnasang maghasik sa amin ng ibang pagkukuro? 
	At ano anong kasamaan ang dumagsa sa inyo dahil sa ninasang umugali ng 
	mabuti at tumupad sa inyong kautangan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ginoong 
	Isagani,--ang sabi ng dominiko na iniabot sa kanya ang kamay,--kahit sa 
	wariy walang lubos na napala sa pag-uusap nating ito, gayon ma'y mayroon 
	din tayong kaunting napulot; sasabihin ko sa aking mga kapatid ang inyong 
	mga tinuran at inaantay kong kahit kaunti ay may magagawa. Ang 
	ipinanganganib ko lamang ay ang baka hindi mangagsipaniwalang may isang gaya 
	ninyo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan din ang 
	pangamba ko,--ang tugon ni Isagani na kinamayan ang dominiko,--nanganganib 
	akong baka ang aking mga kaibigan ay hindi maniwalang may isang gaya ninyo, 
	kamukha ng pakikipagharapan ninyo sa akin ngayon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At dahil sa 
	ipinalagay na tapos na ang salitaan, ay nagpaalam ang binata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Binuksan ni
	Padre Fernandez ang pinto at sinundan siya ng tingin hanggang 
	nakaliko sa <i xml:lang="es" lang="es">corredor</i>. Malaong pinakinggan ang 
	tunog ng kanyang yabag, pagkatapos ay pumasok sa silid at inantay na siya'y 
	lumabas sa daan. Nakita nga niya at nadinig na sinasabi sa isang kasama, na 
	nagtatanong kung saan <span class="locked">paparoon, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa Gobierno 
	Civil! Titingnan ko ang mga paskin at makikisama ako sa iba!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang kasama ay 
	sindak na napatingin sa kanya, na waring nagmamalas sa isang magpapatiwakal, 
	at lumayong tumatakbo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaawang 
	binata!--ang bulong ni Padre Fernandez, na naramdamang nangingilid 
	ang luha sa kanyang mga mata,--kinaiingitan ko ang mga hesuita na nagturo sa 
	iyo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Fernandez ay namaling lubos; galit kay Isagani ang mga hesuita, kaya't nang 
	mabatid sa kinahapunan na napipiit ang binata, ay sinabi nilang sila'y 
	madadamay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang binatang 
	iyan ay sasama at makasisira sa atin! Dapat mapag-alamang ang mga 
	pagkukurong iyan ay hindi dito natutuhan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	nangagbulaan ang mga hesuita, hindi; ang&nbsp; Diyos&nbsp; ang tanging nagkakaloob ng mga 
	pagkukurong iyon, sa tulong ng Kalikasan.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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