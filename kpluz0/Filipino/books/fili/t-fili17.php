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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XVII. Ang Perya sa Quiapo</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang gabiy 
	maganda at ang anyo ng liwasan ay lubhang masaya. Sa pagsasamantala sa 
	masarap na simoy at maningning na buwan kung Enero ay punong-puno ang periya 
	ng taong ibig makakita, makita at makapaglibang. Ang mga musika ng mga 
	kosmorama at ang ilaw ng mga parol ay siyang nagbibigay galak at kasayahan 
	sa madla. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mahahabang hanay ng mga tindahan, nagniningningang aliyamas at mga 
	pangkulay, lantad sa tingin ay may mga kumpol-kumpol na pelota, mga 
	maskarang nangakatuhog sa mata, mga laruang lata, mga tren, karrong 
	maliliit, kabayong maliliit na napagagalaw, mga sasakyan, mga bapor na may 
	kanikanilang maliliit na kaldera, mga pinganpinganang maliliit, mga beleng 
	mumunti na kahoy na pino, mga manikang gawa sa ibang lupain at gawa dito, 
	ang mga una ay masasaya at bulhaw at ang mga huli ay mga walang katawatawa 
	at mapagnilay na waring mga maliliit na babaeng may gulang, sa piling ng mga 
	batang napakalalaki. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang tugtog ng mga tambol na maliliit, ang kaingayan ng 
	mga trompetrompetahang lata, ang tugtuging ngongo ng mga kurdiyon at mga 
	organillo ay nagkakahalong wariy tugtugan sa karnabal, at sa gitna ng lahat 
	ng iyon ay paroo't parito ang makapal na tao na nangagtutulakan, 
	nagkakabungguang ang mukha'y nangakalingon sa mga tindahan kaya't madalas 
	ang untugan at kung minsan ay katawatawa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Napipilitang pigilan ang takbo ng 
	mga kabayo ng mga sasakyan, ang <i>tabi! tabi!</i> ng mga kotsero ay 
	nadidinig na sunodsunod; nangagkakasalusalubong ang mga kawani, mga 
	militar, mga nag-aaral, mga intsik, mga dalaginding na kasama ng kanilang 
	mga ina at ali, nangagbabatian, nangagkikindatan, masasayang nagtutudyuhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Camorra ay nasa karurukan ng kanyang kaligayahan sa pagkakita ng gayong 
	karaming magagandang dalaga; napapatigil siya, napapalingon, itutulak si 
	Ben-Zayb, mapapapaatak, sumusumpa't aniya'y: at iyan, iyan, manghihitit ng 
	tinta? at doon sa isa ano ang masabi mo? Sa kanyang kagalakan ay hindi na 
	pinupupo ang kanyang kalaban at katunggali. Tinitingnan siyang maminsan 
	minsan ni Padre Salvi, ngunit hindi niya pinapansin si Padre &nbsp;Salvi, 
	kundi bagkus pa ngang binubunggo ang mga dalaga upang masagi sila, na 
	kinikindatan at tinititigan ng titig na may palaman.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Pu&ntilde;ales!</span> 
	Kailan kaya ako magiging kura sa Kiyapo?--ang tanong sa sarili.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Ben-Zayb ay 
	biglang nakabitaw ng isang tungayaw, napalundag at pinigilan ang kanyang 
	bisig; sa gitna ng kagalakan ni Padre Camorra ay kinurot siya. 
	Dumarating ang isang nakasisilaw na binibining pinagtitingnanan ng lahat ng 
	taong nasa liwasan; dahil sa hindi magkasiya sa kagalakan si Padre Camorra 
	ay pinagkamalang bisig ng dalaga ang bisig ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binibiniy 
	si Paulita Gomez, ang makisig sa madlang makisig na sinusundan ni Isagani; 
	sa likuran ay sumusunod si Aling&nbsp;Victorina. Ang dalaga'y nagniningning sa 
	kagandahan; ang lahat ay napapatigil, ang mga liig ay bumabaluktot, 
	napapahinto ang mga usap-usapan, sinusundan ng mga paningin at si 
	Aling&nbsp;Victorina ay tumatanggap ng mga magalang na bati.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang suot ni 
	Paulita Gomez ay baro't panyong pinya na binurdahan, iba kay sa isinuot ng 
	umagang iyon sa pagparoon sa <abbr>Sto.</abbr>&nbsp;Domingo. Ang nanganganinag na 
	habi ng pinya ay nagbibigay ng lalong ganda sa kanyang ulo, at ang mga 
	pilipinong nakakamalas ay iginagaya siya sa buwang nalilibid ng maputit 
	manipis na ulap. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang sayang sutla na kulay rosa, na nagkakutonkutong 
	mainam ang ayos sa pagkakapigil ng kanyang munting kamay, ay nagbibigay 
	dilag sa kanyang tuwid na ulo, na ang mga kilos na inaayusan ng malambot na 
	liig ay nagpapahayag ng pananagumpay na lubos ng kataasan at kalindian. Si 
	Isaganiy waring hindi nasisiyahang loob; nayayamot siya sa gayong karaming 
	mata, karaming mga talogigi na tumatanaw sa kagandahan ng kanyang iniibig: 
	ang mga tingin ay inaakala niyang nakaw, at ang mga ngiti ng dalaga'y inaari 
	niyang pagtataksil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang makita ni 
	Juanito ang binibini ay pinaglalo ang kakubaan at nagpugay: sinagot siya ng 
	pasumala ni Paulita, at tinawag siya ni Aling&nbsp;Victorina. Si Juanito ang 
	kanyang kinikilingan at sa ganang kanya ay ibig pa ito kay sa kay Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Anong gandang 
	dalaga! Anong ganda!--ang bulong ni Padre Camorra na sumilakbo ang 
	kalooban.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Padre ang 
	tiyan mo po ang kurutin at bayaan ninyo kami!--ang payamot na sabi ni 
	Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Anong gandang 
	dalaga! anong gandang dalaga--ang ulit--at ang lumiligaw ay ang nag-aaral na 
	kilala ko, ang nanulak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mapalad siya 
	at hindi taga roon sa bayan ko!--ang patuloy pagkatapos na inilingong 
	makailan ang ulo upang sundan ng tingin ang binibini. Ibig ibig nang iwan 
	ang kanyang mga kasama at sundan ang dalaga. Nahirapan si Ben-Zayb bago siya 
	napahinuhod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Paulita ay 
	patuloy sa paglakad at nakita ang kanyang magandang anyo at ang kanyang 
	munting ulo, na mainam ang pagkakapusod, na malinding gumagalaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ating mga 
	nagliliwaliw ay patuloy sa kanilang paglakad na ang paring artillero ay 
	nagbubuntong hininga, at nakasapit sila sa isang tindahang nalilibid ng mga 
	nanonood na madaling sila'y linuwagan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yaon ay isang 
	tindahan ng mga mumunting larawang kahoy, na gawa dito, na nagpapakilala sa 
	sarisaring laki at anyo ng mga ayos, lahi at mga paghahanap buhay sa 
	kapuluan, mga indio, kastila, intsik, mestiso, prayle, klerigo, kawani, 
	kapitan sa bayan, nag-aaral, sundalo at <abbr>iba pa.</abbr> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dahil mandin sa 
	ang mga artista ay may hilig sa mga pari, na ang mga kuton ng mga <i>habito</i> 
	ay siyang naaayos sa kanilang mga kagawian sa pagyari, o dahil sa ang mga 
	prayle, sa pakikihimasok nitong lubha sa mga lipunang pilipino'y 
	nakapagpapaulap sa pag-iisip ng eskultor, maging alin man sa dalawang 
	kadahilanan, ang katunayan, ay marami ang kanilang kawangki, na mabuti ang 
	pagkakayari, anyong anyo, at itinatanghal sila sa mga dakilang sandali ng 
	kabuhayan, baligtad kay sa ginagawa sa kanila sa Europa, na doo'y 
	inilalarawan silang nakakatulog sa ibabaw ng mga barriles ng alak, 
	nangagsusugal, tumutungga, nangaapungot o hinahaplos ang sariwang mukha ng 
	isang dalaga. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi: ang mga prayle sa Pilipinas ay kaiba: mga makikiyas, 
	malilinis, mabubuti ang bihis, ang anit sa tuktok ay mainam ang 
	pagkakaputol, ang mga mukha'y ayos at maliwanag, ang mata'y mapagmasid, 
	anyong banal, may kaunting pula sa pisngi, may tungkod na palasan sa kamay 
	at sapatos na tsarol sa paa, na nakaaakit na sambahin sila at ilagay sa 
	birina. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kapalit ng mga sagisag ng katakawan at kahalayang taglay ng kanilang 
	mga kapatid na nasa Europa, ang dala ng mga nasa Maynila ay ang aklat, ang
	<i xml:lang="es" lang="es">crucifijo</i>, ang sangang sagisag ng paghihirap; 
	kapalit ng panghahalik sa mga mangmang na babaeng taga bukid, ang mga nasa 
	Maynila ay nagpapahalik ng kamay sa mga bata, sa mga taong may kagulangan na 
	nangakayuko't halos nakaluhod; kapalit ng paminggalang puno ng kakanin at 
	mga kakanan na siyang tanghalan nila sa Europa, sa Maynila ay mga 
	dalanginan, mesang aralan; kapalit ng prayleng maralita na lumalapit sa mga 
	bahaybahay na dala ang kanyang burro at ang supot upang manghingi ng limos, 
	ang prayle sa Pilipinas ay nagsasabog ng dakotdakot na ginto sa mga 
	kaawaawang indio......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan 
	ninyo, narito si Padre Camorra!--ang sabi ni Ben-Zayb na dala pa 
	ang singaw ng <i xml:lang="en" lang="en">champagne</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At itinuturo 
	ang larawan ng isang payat na prayle, na wariy nag-iisip, nakaupo sa piling 
	ng isang dulang, ang ulo'y nakapatong sa palad at sumusulat mandin ng isang 
	sermon. May isang lamparang nakapagpapaliwanag sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pagkakaibayo ng anyo'y ikinahalakhak ng lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naramdaman ang 
	tukoy ni Padre Camorra, na nalimutan na si Paulita, at siya namang 
	tumanong:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sino naman 
	ang kamukha ng larawang ito, Ben-Zayb?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tumawa ng 
	kanyang tawang <i xml:lang="es" lang="es">paleto</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang larawan ay 
	isang matandang babaeng bulag ang isang mata, gusgusin, na nakalupasay sa 
	sahig, gaya ng mga anito ng mga indio, na namimirinsa ng damit. Ang 
	kasangkapan ay nagayahang mabuti; tanso, ang dingas ay palara at ang 
	alimpuyo ng usok ay marurumit pinilipit na bulak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hoy, 
	Ben-Zaib, hindi hangal ang nakamunakala, ano?--ang tanong na tumatawa ni
	Padre Camorra.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ko 
	malaman ang ibig tukuyin!--ang sabi ng manunulat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit
	<i xml:lang="es" lang="es">pu&ntilde;ales!</i> hindi ba ninyo nakikita ang 
	pangalan, <i xml:lang="es" lang="es">la prensa filipina</i>? Ang 
	kasangkapang iyan na ipinamimirinsa ng matandang babae ay tinatawag ditong
	<i>prinsa</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lahat ay 
	nagtawanan at si Ben-Zayb man ay humalakhak din.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dalawang 
	sundalong guardia sibil na may tandang <i>mga sibil</i>, ay nalalagay sa 
	likuran ng isang taong nakabaliti ng matitibay na tanikala at ang mukha'y 
	natatakpan ng sambalilo: ang pangalan ay <i>Ang Lupain ng Abaka</i> at 
	waring babarilin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi naibigan 
	ng marami sa ating mga dalaw ang tanghalan. Pinag-uusapan ang tuntunin ng 
	Arte, humahanap ng pagkakatimbangtimbang ng laki, ang sabi ng isa'y walang 
	pitong ulo ang larawang gayon, na ang mukha'y kulang ng isang ilong, wala 
	kundi tatatlo, bagay na ikinapag-isip ng kaunti ni Padre Camorra 
	na di makahulong kung bakit, upang maging ayos ang isang larawan ay, dapat 
	magkaroon ng apat na ilong at pitong ulo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Anang isa'y kung bakit malitid, 
	sa, ang mga indio ay hindi gayon; na kung yaon ay matatawag na
	<i xml:lang="es" lang="es">escultura</i> o <i xml:lang="es" lang="es">
	carpinteria</i> lamang, at <abbr>ibp.</abbr>; bala na'y nagpahayag nang 
	kanyang panunuligsa at upang huwag namang mapahuli sa iba si Padre Camorra 
	ay nangahas humanap ng tatlong pung hita sa bawa't manika. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kung makahihingi 
	ng ilong ang iba ay bakit nga naman hindi siya makahihingi ng hita? At doon 
	din nangagtatatalo kung ang indio'y may katalinuhan sa pag-eeskultor, kung 
	nararapat palusugin ang gayong arte, at sisimulan na ang pagtatalong 
	sabay-sabay na pinutol ni Don Custodio sa pagsasabing ang mga 
	indio ay may katalinuhan, ngunit ang paggawa lamang ng santo ang dapat 
	harapin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahit sino 
	ay magsasabi--ani Ben-Zayb na ng gabing yaon ay naging mapanudyo--na ang 
	intsik na iyan ay si Quiroga, ngunit kung pagwawariing mabuti ay kamukha ni
	Padre Irene.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ang 
	masasabi ninyo sa indio-ingles na iyan? Nahahawig kay Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Umalingawngaw 
	ang pamuling halakhakan. Hinaplos ni Padre Irene ang kanyang 
	ilong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunay 
	nga!--Tunay nga!--Siyang siya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa'y 
	nasaan si Simoun? Bilhin ni Simoun!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	nawala, walang nakakita sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Pu&ntilde;ales!</i>--ang 
	sabi ni Padre Camorra--napakakuripot ang amerikano! Natatakot na 
	pabayaran natin sa kanya ang kaupahan ng lahat sa pagpasok sa patanghalan ni
	<span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi!--ang 
	sagot ni Ben-Zayb--ang ipinangangamba ay ang magipit siya. Nahuhulaan na ang 
	masamang birong aabot sa kanyang kababayang si <span xml:lang="en" lang="en">
	<abbr>Mr.</abbr>&nbsp;Leeds</span>, kaya't nagmamaangmaangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At 
	nangagpatuloy ng lakad, upang panoorin ang nababantog na ulo, na walang 
	biniling anumang kahit masamang laruan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Humandog si 
	Ben-Zayb na siyang makikipag-usap: hindi maaaring hiyain ng amerikano ang 
	isang mamamahayag na mangyayaring maghiganti sa pamagitan ng isang 
	mapanirang lathala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Makikita 
	ninyo't pawang kagagawan lamang ng salamin--aniya--sapagka't tingnan 
	ninyo......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At muling 
	nagsimula ng isang mahabang pagpapaliwanag, at sa dahilang wala siyang 
	kaharap na salamin na makasisira sa kanyang sinasabi, ay idinugtong nang 
	lahat ang kabulastugang matuturan hanggang sa kahulihulihan ay hindi na 
	matumpakan ang sinasabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At makikita 
	rin ninyo kung hindi pawang pagkasira lamang ng paningin.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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