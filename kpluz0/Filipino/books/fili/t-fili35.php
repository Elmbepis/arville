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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXV. Ang Pista</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Nang ika pito ng gabiy nagdatingdatingan na ang mga inangyayahan: una, ang 
	mga mumunting diosdiosan, mga kawaning may mababang katungkulan, mga pangulo 
	sa kagawaran, mga mangangalakal, at <abbr>iba </abbr>pa, na taglay ang mga pagbating lubos 
	na magalang at ang mga kilos na tuwid na tuwid, sa mga unang sandali, na 
	waring noon lamang natutuhan: ang gayong karaming ilaw, tabing at mga 
	kristal ay nakapagpapanganingani ng kaunti. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pagkatapos ay nawawala na ang 
	gayong ayos at palihim na nagtutumbukan, tampalan sa tiyan at ang ilan ay 
	umabot sa pagkukutusan. Tunay ngang ang ilan ay umaayos ng anyong 
	pagwawalang bahala upang ipakilala na sila'y dagi sa mga bagay na higit pa 
	sa roon, at sadya ngang gayon! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											May diosa na naghikab dahil sa ang lahat nang 
	iyon, sa palagay niya, ay tiwali at sinabing may <i xml:lang="es" lang="es">
	gazuza</i>; isa pa'y nagalit sa kanyang dios, ikinumpay ang kamay upang 
	tampalin. Si Don Timoteo ay payukoyuko sa lahat ng pook; 
	nagtatapon ng isang ngiti, igagalaw ang baywang, uurong, bibigay ng 
	kalahating ikit, buong ikit, <abbr>ibp.</abbr>, kaya't ang isa pang diosa ay 
	nakapagsabi tuloy sa kanyang kalapit, sa tulong ng pagkakanlong sa
	<span class="locked">pamaypay, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Chica, 
	que filadelfio esta el tio! Mia que paese un fantoche.</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pagkatapos ay 
	dumating ang mga bagong kasal, na kaakbay si Aling&nbsp;Victorina at ang lahat ng 
	kaangay. Mga maligayang bati, kamayan, mga tapik na waring pag-aampon sa 
	lalaking bagong kasal, mga tinging patitig, malansa, masuri ng mga lalaki sa 
	binibining bagong kasal; sa dako ng mga babae ay pagsisiyasat ng kagayakan, 
	ng hiyas, pag taya ng lakas, ng buti ng katawan, <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si
	<span xml:lang="es" lang="es">Psiquis</span> at si Cupido na dumating sa 
	Olimpo!--ang binuko sa sarili ni Ben-Zayb at itinala niyang mabuti sa 
	pag-iisip ang pag-aanyo upang bitiwan sa lalong katampatang sandali.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lalaking 
	bagong kasal nga'y may taglay ng mukhang palabiro ng dios ng pag-ibig, at 
	kung ipagpapaumanhin ng kaunti ay mapagkakamalang lalagyan ng pana ang 
	kanyang kakubaang napakaumbok, na hindi maikanlong sa suot niyang
	<i xml:lang="es" lang="es">frac</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Don 
	Timoteo ay nagdaramdam na ng pananakit ng baywang, ang mga kalyo ng kanyang 
	paa ay unti-unting nananakit, ang kanyang liig ay nangangawit at wala pa ang 
	Capitan General! Ang mga malalaking dioses, na sa kanila'y kabilang si Padre &nbsp;Irene at si Padre Salvi, ay nangagsidating na nga 
	ngunit wala pa ang malaking kulog. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi siya mapalagay, nanganganib, ang 
	kanyang puso'y tumitibok nang malakas, sinusumpong siya ng isang kailangan, 
	ngunit dapat munang unahin ang pagbati, pagngiti, at pagkatapos ay 
	paparoon, ngunit hindi mangyari, uupo't titindig, hindi nadidinig ang sa 
	kanya'y sinasabi, hindi masabi ang ibig sabihin. At samantala'y isang 
	malulugding dios ang nagsabi sa kanya ng ilang punang ukol sa mga
	<span xml:lang="es" lang="es">cromo</span>, na tinutuligsa't sinasabing 
	nakadudungis sa mga dingding.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakadudungis 
	sa mga dingding!--ang ulit ni Don Timoteo na nakangiti ngunit 
	ngalingaling labnutin ang nagsasalita:--datapuwa'y yari iyan sa Europa at 
	siyang mga pinakamahal na natagpuan ko sa Maynila! Nakadudungis sa mga 
	dingding!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At isinusumpa 
	sa sarili ni Don Timoteo na kinabukasan ay ipasisingil ang lahat 
	ng utang ng manunuligsa sa tindahan niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakadinig ng 
	mga pasuwit, takbuhan ng mga kabayo, dumating din!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang 
	General!--Ang Capitan General!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Namumutla sa 
	pagkagulumihanan, ay tumindig si Don Timoteo na di ipinahahalata 
	ang sakit ng kanyang mga kalyo, at kasama ng kanyang anak at ilang 
	malalaking dios, ay pumanaog upang salubungin ang <i xml:lang="la" lang="la">
	Magnum Jovem</i>. Nawala ang sakit ng kanyang baywang dahil sa 
	pag-aalinlangang pumasok sa kanyang kalooban dapat siyang ngumiti o 
	magpakita ng mukhang walang katawatawa?</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Dapat ba niyang iabot ang kanyang kamay 
	o antabayanang iabot sa kanya ang sa General? Putris! bakit kaya hindi niya 
	naalaala ang ukol sa bagay na iyon at nang naitanong sana sa kaibigan niyang 
	si Simoun? Upang huwag mapuna ang kanyang pagkagulumihanan ay itinanong nang 
	marahan at sira ang boses sa kanyang anak:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naghanda ka 
	ba ng talumpati?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi na 
	ginagamit ang mga talumpati, tatay, at dito ay lalo pa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumating si 
	Jupiter na kasama si Juno, na wariy isang kastilyong sususuhan: may 
	brillante sa ulo, may brillante sa liig, sa mga bisig, mga balikat, sa buong 
	katawan! Ang suot ay isang mainam na kagayakang sutla; mahaba ang
	<i xml:lang="es" lang="es">cola</i>, na may burdang bulaklak na namumukod sa 
	ibabaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay ngang 
	inari ng General ang kanyang bahay, gaya ng ipinamanhik na bubulongbulong ni
	Don Timoteo. Ang orkesta ay tumugtog ng
	<i xml:lang="es" lang="es">marcha real</i> at ang mag-asawang&nbsp; Diyos&nbsp; ay tuwid 
	na tuwid na umakyat sa hagdanang may saping alpombra.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang katigasan 
	ng anyo ng General ay hindi gawa-gawa lamang; marahil noon lamang siya 
	nagdamdam lungkot, sapol nang dumating sa Pilipinas; munting pighati ang 
	namamahay sa kanyang dilidili. Yaon ang huling tagumpay, sa kanyang tatlong 
	taong paghahari, at sa loob ng dalawang araw, ay iiwan na niya ang gayong 
	kataas na kalagayan. Ano ang iiwan sa kanyang likuran? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi ibinabaling ng 
	General ang kanyang ulo at ibig pa niya ang tumanaw sa hinaharap, sa 
	darating! Dadalhin niya ang isang kayamanan, malalaking halagang nalalagay 
	sa mga Banko sa Europa ang nag-aantay sa kanya, mayroon siyang mga hotel, 
	ngunit marami siyang sinaktan, marami siyang kalaban sa Corte, inaantay 
	siya roon ng mataas na kawani! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang ibang general ay yumamang madali na gaya 
	niya at ngayo'y mga hirap na hirap. Bakit hindi siya magpalumagak ng kaunti 
	pang panahon na gaya ng payo ni Simoun? Hindi, bago ang lahat ay ang 
	kahihiyan muna. Sa isang dako'y hindi na lubhang payuko ang mga bati sa 
	kanya na gaya ng dati; nakapupuna siya ng mga tinging patitig, at pagkainip; 
	at sinasagot niyang magiliw at tinatangka niyang ngumiti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napagkikilalang papalubog na ang araw!--ang bulong ni Padre Irene, 
	sa tainga ni Ben-Zayb,--marami na ang tumititig sa kanya ng harap harapan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Putris na 
	kura! yaon pa naman sana ang kanyang sasabihin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ineng--ang 
	bulong sa tainga ng kalapit ng babaeng nagpanganlang
	<i xml:lang="es" lang="es">fantoche</i> kay Don Timoteo--Nakita 
	mo ba kung ano ang saya?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Uy! ang mga 
	tabing sa palasyo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hantay! at 
	siya nga pala! Dadalhing lahat kung gayon. Tingnan mo't pag hindi ginawang
	<i xml:lang="es" lang="es">abrigo</i> ang mga alpombra!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang gayo'y 
	walang ibang ipinakikilala kundi may katalinuhan at mabuting mamili!--ang 
	pakli ng asawa na kinagalitan ang kabiyak niya sa pamamagitan ng isang 
	tingin,--ang mga babae'y dapat maging masinop!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dinaramdam pa 
	ng kaawaawang dios ang siningil ng modista.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Anak ko! di 
	bigyan mo ako ng mga panabing na tig lalabing dalawang piso ang isang bara 
	at tingnan mo kung isusuot ko ang mga basahang ito!--ang pakli ng namuhing 
	diosa;--Jesus! saka ka na magsalita kapag nagkaroon ka nang magarang 
	sinundan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala'y si 
	Basilio, na nasa tapat ng bahay, ay kahalobilo ng mga nanonood, at 
	binibilang ang mga taong pumapanaog sa mga karwahe. Nang makita ang gayong 
	karaming taong masasaya at tiwala, nang makita ang dalawang bagong kasal, na 
	sinusundan ng mga kaangay niyang mga dalaginding na mga walang malay at 
	walang agam-agam, at naisip na matatagpuan doon ang kakilakilabot na 
	kamatayan, ay naawa siya at naramdamang nagbawa ang kanyang galit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nagtaglay siya 
	ng nasang iligtas ang gayong karaming mga walang sala, inisip na sumulat at 
	magbigay alam sa mga may kapangyarihan; ngunit dumating ang isang karwahe 
	at nagsibaba si Padre Salvi at si Padre Irene, na kapwa 
	may kasiyahang loob, at waring ulap na dumaan, ay napawi ang kanyang 
	mabubuting hangad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	mayroon sa akin?--aniya sa sarili--magbayad ang mabubuti na kasama ng 
	masasama!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At idinagdag 
	pagkatapos upang panahimikin ang kanyang mga pagkabalisa:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ako 
	manunuplong, hindi ko dapat pangahasan ang pagtitiwala sa akin. Ang utang ko 
	sa <em>kanya</em> ay higit kay sa lahat nang <em>iyan</em>; siya ang humukay 
	ng pinaglibingan sa aking ina; ang mga taong iyan ang pumatay! Ano ang 
	mayroon nila sa akin? Ginawa ko ang lahat upang maging mabuti, magkaroon ng 
	halaga; pinagsikapan ko ang lumimot at magpatawad; tiniis ko ang lahat ng 
	pataw at wala akong hiningi kundi ang bayaan lamang akong matiwasay! Ako'y 
	hindi nakasasagabal sa kanino man.... Ano ang ginawa sa akin? Umilandang sa 
	hangin ang kanilang luray na katawan! Labis na ang tiniis namin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pagkatapos ay 
	nakitang pumasok si Simoun na dala sa kamay ang kakilakilabot na lampara, 
	nakitang binagtas na dahandahan ang silong, ang ulo'y nakatungo at waring 
	nag-iisip. Naramdaman ni Basilio na ang kanyang puso'y tumitibok ng 
	mahinangmahina, na ang kanyang mga paa't kamay ay nanglalamig at ang maitim 
	na anino ng mag-aalahas ay nagkakaroon ng anyong nakapangingilabot na 
	nalilibid ng lagablab. Sa tabi ng hagdan ay tumigil si Simoun na wariy 
	nag-aalinlangan; si Basilio'y hindi humihinga. Ang pag-aalinlangan ay hindi 
	nagluwat: itinaas ni Simoun ang kanyang ulo, patuloy na umakyat sa hagdanan 
	at nawala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa wari ng 
	nag-aaral ay sasabog na ang bahay at ang mga dingding, mga lampara, mga 
	panauhin, bubungan, mga durungawan, orkesta, ay umiilandang sa hangin na 
	waring isang dakot na baga sa gitna ng isang kasindaksindak na putok; 
	tumingin sa kanyang paligid at inakalang ang mga nanonood na naroon ay 
	pawang bangkay; nakikita niyang lurayluray, sa wari niya'y napupuno ng apoy 
	ang hangin, ngunit ang kalamigang loob ng kanyang pagkukuro ay nanagumpay 
	sa pag-uulap na iyong dumaan na tinulungan ng gutom, at aniya sa sarili:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Samantalang 
	hindi pumapanaog, ay walang panganib. Hindi pa dumarating ang Capitan 
	General!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At pinilit na 
	mag-anyo siyang panatag at pinipigil ang pangangaykay ng kanyang mga paa, at 
	tinangkang malibang sa pag-iisip ng ukol sa ibang bagay. Mayroong wariy 
	kumukutya sa kanya sa sariling kalooban at sinasabi sa kanyang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	nanginginig ka ngayong hindi pa sumasapit ang sandaling takda ano ang 
	aasalin mo kapag iyong nakitang bumabaha ang dugo, nag-aalab ang mga bahay 
	at sumasagitsit ang mga punlo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Dumating ang General, ngunit hindi siya napuna ng binata; minamataan ang 
	mukha ni Simoun na isa sa mga pumanaog upang sumalubong, at nakilala niya sa 
	walang awang anyong iyon ang hatol na kamatayan sa lahat ng taong naroon, at 
	sa gayon ay pumasok sa kanya ang muling pagkasindak. Siya'y nanglamig, 
	sumandig sa pader ng bahay, at nakatitig sa mga durungawan at tinalasan ang 
	mga pangdinig, tinangkang hulaan ang mangyayari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nakita sa salas ang 
	maraming taong nakaligid kay Simoun at pinagmamasdan ang lampara; nakadinig 
	ng mga maliligayang bati, mga bulalas na paghanga; ang mga salitang '<span xml:lang="es" lang="es">comedor 
	estreno</span>' ay naulit-ulit; nakitang ngumiti ang General at kinurokuro 
	niyang sa gabing iyon gagawin ang unang paggamit, alinsunod sa itinakda ng 
	mag-aalahas, at tunay ngang sa dulang na hahapunan ng General. Si Simoun ay 
	nawalang sinusundan ng maraming humahanga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	katangitanging sandaling iyon ay nagtagumpay ang kanyang magandang puso, 
	linimot ang lahat ng kanyang pagtatanim, linimot si Huli, tinangkang iligtas 
	ang mga walang sala, at humanda, mangyari na ang mangyayari, tinawid ang 
	daan at nagtangkang pumasok. Ngunit nalimot ni Basilio na napakadukha ang 
	kanyang suot; pinigil siya ng bantay-pinto, at nang makita ang kanyang 
	pagpupumilit ay binantaan siyang tatawag ng dalawang
	<i xml:lang="es" lang="es">Veterana</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay pumapanaog si Simoun na namumutla nang kaunti. Binayaan ng 
	bantay si Basilio upang yumuko sa mag-aalahas na wariy nagdaan ang isang 
	santo. Nahalata ni Basilio sa anyo ng mukha na lilisanin nang patuluyan ang 
	sawing bahay na iyon at ang lampara ay may ilaw na.
	<i xml:lang="la" lang="la">Alea jacta est.</i> Dala ng pag-iingat sa sarili, 
	ay naisip ang lumigtas. Maaaring masumpungan ng kahit sino na galawin ang 
	ilawan, alisin ang timtim at sa gayon ay puputok at ang lahat ay 
	matatabunan. Nadinig pa si Simoun na nagsabi sa <span class="locked">
	kotsero na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa Escolta, 
	tulinan mo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gulilat at sa 
	takot na madinig ang kakilakilabot na putok, ay lumayo si Basilio nang 
	buong tulin sa sawing pook na iyon: sa wari niya'y wala ang liksing 
	kailangan ng kanyang mga hita, ang kanyang mga paa'y nadudulas sa mga 
	bangketa na waring lumalakad at hindi kumikilos, ang mga taong 
	nakakasalubong ay humahadlang sa kanyang lakad, at bago makadalawampung hakbang ay waring hindi lamang limang minuto na ang nakaraan. Sa malayo 
	layo'y natagpuan ang isang binatang nakatayo, na ang ulo'y nakataas, 
	nakatitig sa bahay. Nakilala ni Basilio si Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	ginagawa mo rito?--ang tanong.--Halika!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tiningnan siya 
	ng malamlam na tingin ni Isagani, ngumiti nang malungkot at muling tumingin 
	sa mga bukas na durungawan, na sa puwang nila'y natatanaw ang maputing anyo 
	ng binibining ikinasal, na nakapigil sa bisig ng naging asawa, na 
	dahandahang lumalayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Halika, Isagani! Lumayo tayo sa bahay na iyan, halika!--ang sabi ni Basilio 
	na ang boses ay paos at piniglan sa bisig ang kausap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inilalayo 
	siyang banayad ni Isagani at patuloy ding nakatanaw na taglay sa labi ang 
	malungkot na ngiti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alang-alang 
	sa&nbsp; Diyos&nbsp; lumayo tayo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bakit ako 
	lalayo? Bukas ay hindi na siya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napakalaking 
	lungkot ang taglay ng mga pangungusap na iyon, na, nalimot sandali ni 
	Basilio ang kanyang sindak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ibig mo bang 
	mamatay?--ang tanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinibit ni 
	Isagani ang balikat at nagpatuloy sa pagtingin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling 
	tinangka ni Basilio ang siya'y kaladkarin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isagani, 
	Isagani, pakingan mo ako, huwag tayong mag-aksaya ng panahon! Ang bahay na 
	iyan ay puno ng pulbura, sasabog na, dahil sa isang kapangahasan, sa isang 
	pagsisiyasat...... Isagani ang lahat ay mamamatay sa ilalim ng kanyang durog 
	na labi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa kanyang 
	labi?--ang ulit ni Isagani na inuunawa mandin ang ibig turan, ngunit hindi 
	rin inilalayo sa durungawan ang tingin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo, sa ilalim 
	ng kanyang labi, oo, Isagani! alang-alang sa&nbsp; Diyos , halika! saka ko na 
	isasalaysay sa iyo, halika! isang lalo pang sawi kay sa ating dalawa ang 
	humatol sa kanila.... Nakikita mo ang ilaw na puting iyan, maliwanag, na 
	waring ilaw elektriko, na nanggagaling sa <i xml:lang="es" lang="es">azotea</i>? 
	Iyan ang ilaw ng kamatayan! Isang lampara na may lamang dinamita, sa isang 
	kakainang may baong pulbura.... puputok at walang makaliligtas na buhay ni 
	isang daga man lamang, halika!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag!--ang 
	sagot ni Isagani na iniiling na malungkot ang ulo--ibig kong lumagi rito, 
	ibig ko siyang makita pang muli na bilang pahimakas.... bukas ay
	<span class="locked">iba na!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Masunod ang 
	natatakda!--ang bulalas ni Basilio nang makita ang gayon at matuling lumayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakita ni 
	Isagani na ang kanyang kaibigan ay matuling lumalayo na taglay ang 
	pagmamadaling nagpapakilala ng tunay na takot at nagpatuloy din nang 
	pagtingin sa nakaaakit na mga bintana, gaya ng <i xml:lang="es" lang="es">
	caballero de Toggenburg</i> na nag-aantay na dumungaw ang iniibig, na sinabi 
	ni <span xml:lang="de" lang="de">Schiller</span>. Nang mga sandaling yaon ay 
	walang tao sa salas; ang lahat ay tumungo sa mga kakainan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Naisip ni Isagani 
	na mangyayaring may katunayan ang ikinatatakot ni Basilio. Naalaala ang 
	mukha niyang gulilat, siya na hindi napapawian ng kalamigang loob, at 
	nagsimula na sa paghuhulohulo. Isang bagay ang maliwanag na bumabakas sa 
	kanyang pag-iisip: ang bahay ay sasabog at si Paulita ay naroroon, si 
	Paulita'y mamamatay sa isang kakilakilabot na pagkamatay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa harap ng 
	pagkabatid na ito ay nalimot ang lahat: panibugho, pagtitiis, mga sama ng 
	loob; ang maawaing binata'y walang naalaala kun di ang kanyang pag-ibig. 
	Hindi na inalala ang sarili, walang kagatol-gatol, tinungo ang bahay, at 
	salamat sa kanyang makisig na kagayakan at kanyang anyong walang alinlangan, 
	ay madaling nakaraan sa pintuan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantalang 
	ang mga bagay na ito'y nangyayari sa daan, sa kakainan ng mga malalaking 
	dios, ay nagpatawidtawid sa mga kamay ang isang pergamino na kinababasahan 
	ng mga salitang ito, na tintang pula ang ipinangsulat:</font></p>
	<blockquote class="center">
		<p style="margin-left: 40px; margin-right: 80px" align="justify"><font face="Arial" color="#333333"><i>
		<span style="font-size: 13pt" xml:lang="en" lang="en">Mane Thecel 
		Phares.</span><span style="font-size: 13pt"><br>
		Juan Crisostomo Ibarra.</span></i></font></p>
	</blockquote>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Juan 
	Crisostomo Ibarra? Sino iyan?--ang tanong ng General na iniabot sa kalapit 
	ang papel.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	masamang biro!--ang tugon ni Don Custodio;--lagdaan ang papel ng 
	pangalan ng isang <i xml:lang="es" lang="es">filibusterillo</i>, na may 
	sampung taon nang patay.</font></p>
	<p xml:lang="es" lang="es" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--Filibusterillo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iya'y isang 
	birong magigiging sanhi ng kaguluhan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May mga babae pa naman....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hinahanap ni
	Padre Irene ang nagbiro at ang nakita ay si Padre Salvi, 
	na nakaupo sa kanan ng kondesa, na namutla nang kasingputi ng kanyang
	<span xml:lang="es" lang="es">servilleta</span> samantalang minamasdang 
	nangdididilat ang mata ang mga mahiwagang pangungusap. Ang nangyari sa 
	espinghe ay kanyang naalaala!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano, Padre  
	Salvi?--ang tanong--nakikilala baga ninyo ang lagda ng inyong kaibigan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Salvi ay hindi sumagot; umanyong mangungusap, at hindi alumana ang 
	ginagawa'y ipinahid sa noo ang serbilyeta.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	nangyari sa inyo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyan ang 
	kanyang sulat!--ang mahinang sagot, na halos hindi madinig;--iyan ang tunay 
	na sulat ni Ibarra!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At matapos 
	makasandig sa sandalan ng luklukan ay binayaang mabitin ang kanyang mga 
	kamay na waring kinulang ng lakas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang di 
	kapalagayang loob ay naging sindak; nangagkatinginan silasila nang walang 
	kahumahuma. Tinangka ng General ang tumindig, ngunit sa pangingilag na baka 
	ipalagay na pagkatakot ang gayon, ay nagpigil at lumingap sa kanyang 
	paligid. Walang mga sundalo: ang mga alilang naglilinkod ay hindi niya 
	nakikilala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magpatuloy 
	tayo ng pagkain, mga ginoo,--aniya--at huwag natin bigyang halaga ang isang 
	biro!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	kanyang boses ay hindi nakapagbigay katiwasayan kundi bagkus pa ngang 
	nagpalalo nang di kapalagayang loob. Ang boses ay nanginginig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipinalalagay 
	kong hindi ibig sabihin ng <i xml:lang="en" lang="en">Mane thecel phares</i> 
	na iyan, na tayo'y papatayin ngayong gabi?--ani Don Custodio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lahat ay 
	napahinto.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	mangyayaring tayo'y malason....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Binitiwan ang 
	kanilang mga <i xml:lang="es" lang="es">cubiertos</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala'y 
	unti-unti nang nagkukulimlim ang ilaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang lampara 
	ay nangungulimlim,--ang sabi ng General na hindi mapalagay;--ibig baga ninyong 
	itaas ang timtim, Padre Irene?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang sandaling 
	yaon, matuling wariy lintik, ay pumasok ang isang anino na nagbuwal ng 
	isang uupan at sinagasa ang isang alila, at sa gitna ng pagkakagitla ng 
	lahat, ay sinunggaban ang lampara, tumakbo sa asotea at inihagis sa ilog. 
	Ang lahat nang ito'y nangyari sa isang kisap-mata, ang kakainan ay nagdilim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lampara ay 
	lumagpak na sa ilog nang ang mga utusan ay nakasigaw nang:--magnanakaw, 
	magnanakaw! at patakbo ring tumungo sa asotea.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Isang 
	rebolber!--ang sigaw ng isa;--madali ang isang rebolber! Habulin ang 
	magnanakaw!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	anino, lalo pang maliksi ay nakapangibabaw na sa babahang ladrilyo, at bago 
	dumating ang isang ilaw ay nakalundag na sa ilog at nagpadinig ng isang 
	alaguwak sa pagbagsak sa tubig.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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