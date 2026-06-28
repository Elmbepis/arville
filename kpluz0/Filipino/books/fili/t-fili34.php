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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXIV. Ang Kasal</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang nasa sa 
	daan na si Basilio ay iniisip kung ano ang kanyang magagawa hanggang sa 
	sumapit ang kalagim lagim na sandali; mag-iika pito pa lamang. Panahon niyon 
	nang pamamahinga sa pag-aaral at ang mga nag-aaral ay nasa sa kanikanilang 
	bayan. Si Isagani ang tanging hindi umuuwi, ngunit nawala mula ng umagang 
	iyon at hindi maalaman kung saan naroroon. Ito ang sinabi kay Basilio, ng 
	makapanggaling sa bilangguan at dinalaw ang kanyang kaibigan upang 
	makituloy. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hindi maalaman ni Basilio kung saan siya paparoon, wala siyang 
	kuwarta, wala siyang anuman, liban na lamang sa rebolber. Ang pagkaalaala sa 
	lampara ang siyang gumiit sa kanyang pag-iisip: sa loob ng dalawang oras 
	mangyayari ang malaking sakuna. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At, kung maalaala ang gayon, sa wari niya'y 
	pawang walang ulo ang mga lalaking nagdadaan sa kanyang harapan: nagdamdam 
	siya ng isang mabangis na katuwaan sa pagsasabi sa sarili, na kahit gayong 
	dayukdok sa gabing iyon ay magiging siyang kakilakilabot, na kahit galing 
	sa pagka nag-aaral at alila marahil ay makita siya ng araw na kasindaksindak 
	at kalagimlagim, na nakatayo sa ibabaw ng bunton ng mga bangkay, naglalagda 
	ng mga kautusan doon sa mga nagdadaang nakalulan sa kanilang maiinam na 
	sasakyan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Humalakhak na wari'y isang napakasama, at kinapa ang puluhan ng 
	rebolber: ang mga kaha ng punglo ay nasa sa kanyang mga bulsa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Bumuko sa 
	kanyang loob ang isang katanungan saan magsisimula ang patayan? Sa kanyang 
	kalituhan ay hindi niya naisip ang itanong kay Simoun, ngunit sinabi sa 
	kanya ni Simoun na lumayo sa daang&nbsp;Anloague.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	magkagayo'y nagkaroon siya ng isang hinala; nang kinahapunang iyon, ng 
	siya'y lumabas sa bilangguan, ay tumungo siya sa dating bahay ni 
	Kapitan&nbsp;Tiago, upang hanapin ang kanyang kaunting kasangkapan, at natagpuan 
	niyang iba ang anyo at laan sa isang pista; yaon ang kasal ni Juanito 
	Pelaez!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May sinabing 
	isang pista si Simoun.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakitang 
	nagdaan sa harapan niya ang isang mahabang hanay ng mga sasakyan na puno ng 
	babait lalaking kaginoohan na nangagsasalitaan; waring nakakita siya sa 
	loob ng malalaking kumpol ng bulaklak, ngunit hindi niya pinuna ang bagay 
	na iyon. Ang mga karwahe ay patungo sa daang&nbsp;Rosario, at sa dahilang 
	nasagupa sa mga nanggagaling naman sa tulay ng Espa&ntilde;a, ay nangahihintong 
	madalas at dahandahan ang lakad. Sa isang sasakyan ay nakita si Juanito 
	Pelaez sa piling ng isang babae na puti ang bihis at may talukbong na 
	madalang; nakilala niyang iyon ay si Paulita Gomez.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si 
	Paulita!--ang bulalas na pamangha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nang 
	makitang tunay ngang siya, gayak ikinasal, na kasama si Juanito Pelaez, na 
	waring nangagsipanggaling sa simbahan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaawang 
	Isagani!--ang bulong--ano kaya ang nangyari sa kanya?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inalalang 
	ilang sumandali ang kanyang kaibigan, kaluluwang dakila, mahabagin, at 
	itinanong sa sarili niya kung hindi kaya mabuting balitaan ng balak, ngunit 
	sinagot din niya ang sarili, na si Isagani ay hindi makikialam magpakailan 
	man sa gayong patayan.... Hindi inasal kay Isagani ang ginawa sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pagkatapos ay 
	naisip na kung hindi sa pagkakabilanggo, sa mga oras na iyon, siya'y 
	ikinakasal o may asawa na, <i xml:lang="es" lang="es">licenciado</i> sa 
	Medicina, namumuhay at nanggagamot sa isang sulok ng kanyang lalawigan. Ang 
	larawan ni Huli, na lurayluray dahil sa pagkakalagpak, ay nagdaan sa kanyang 
	pag-iisip; mga maitim na lagablab ng pagtatanim ang nag-apoy sa kanyang 
	balintataw, at muling hinimas ang puluhan ng rebolber na dinaramdam ang 
	hindi pa pagsapit ng kakilakilabot na sandali. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa gayo'y nakita si Simoun na 
	lumabas sa pinto ng kanyang bahay na taglay ang sisidlan ng lampara, na 
	nababalot nang buong ingat, lumulan sa isang sasakyang nakisunod sa hanay ng 
	mga umaabay sa mga bagong kasal. Upang huwag maligtaan ni Basilio si Simoun 
	ay kinilala ang kotsero, at namangha siya ng makilala na iyon ay ang 
	kaawaawang naghatid sa kanya sa <abbr>S.</abbr>&nbsp;Diego, si Sinong, ang 
	binugbog ng Guardia Civil, iyon ding nagbabalita sa kanya sa bilangguan ng 
	lahat ng nangyayari sa Tiani. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa pagkukurokuro niya na ang daang&nbsp;Anloague ay 
	siyang pangyayarihan, ay doon tumungo ang binata, na nagmadalit nagpauna sa 
	mga karwahe. Tunay nga, ang lahat ay tungo sa dating bahay ni Kapitan&nbsp;Tiago: doon nagkakatipong ang hanap ay isang sayawan upang 
	magsiikot sa hangin! Natawa si Basilio nang makita ang mga
	<span xml:lang="es" lang="es">Guardia Veterana</span> na nangag-aayos doon. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa kanilang dami ay mahuhulaan ang kahalagahan ng pista at ng mga 
											panauhin. Siksikan ang tao sa bahay, ang liwanag ay tumatapon sa kanyang mga 
	durungawan; ang silong ay nakakalatan ng alpombra at puno ng bulaklak; sa 
	itaas, marahil ay sa kanyang ulila at dating silid, tumutugtog ang orkesta 
	ng masasayang tugtugin, na hindi naman nakatatakip na lubos sa magusot na 
	alingawngaw ng tawanan, salitaan at halakhakan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Don 
	Timoteo Pelaez ay umaabot sa tugatog ng kapalaran, ngunit ang mga 
	nakikitang iyon ay higit sa kanyang mga pinangarap. Naipakasal din ang 
	kanyang anak sa isang binibining magmamana sa mga Gomez, at salamat sa 
	salaping ipinautang sa kanya ni Simoun, ay nabili niya ang bahay na iyon sa 
	kalahati ng halaga, doon niya ginawa ang pista, at ang mga pinakamalalaking 
	diosdiosan ng Olimpo sa Maynila ay kanyang magiging panauhin, upang sapuhin 
	siya sa kinang ng kanilang mga karangalan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sapol sa umaga ay masidhing 
	pumapasok sa kanyang kalooban, na wariy isang karaniwang awit, ang isang 
	malabong sambit na nabasa sa kanyang mga pakikinabang: 'Sumapit na ang oras 
	na mapalad! Lumapit na ang sandaling maligaya! Matutupad nang madali sa iyo 
	ang mga kahangahangang salita ni Simoun: Buhay ako, ngunit hindi ako kundi 
	ang Capitan General ang nabubuhay sa akin, at <abbr>ibp.</abbr>' Ang Capitan 
	General ay inaama ng kanyang anak! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga't hindi kaharap sa kasal, 
	kinatawan siya ni Don Custodio, ngunit paparoong hahapon, at 
	magdadala ng isang handog sa ikinasal, isang lampara na kahit ang kay 
	Aladin ay hindi makapapantay....--sa lihim--si Simoun ang nagbigay ng lampara. 
	Timoteo ano pa ang <span class="locked">ibig mo?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pagkakabago ng bahay ni Kapitan&nbsp;Tiago ay lubhang malaki; diniktan ng mga 
	bagong papel na maiinam; ang usok at amoy ng apian ay nawala. Ang malaking 
	salas na lalong pinaluluwang ng malalaking salamin na nakapagpaparami pa sa 
	mga ilaw ng mga <i xml:lang="es" lang="es">ara&ntilde;a</i>, ay nalalatagan ng 
	alpombra: may alpombra ang mga salon sa Europa, at kahit ang daling ay 
	makintab na makintab at malalapad ang tabla, ay dapat ding magkaroon ng 
	alpombra ang kanyang salas, sapagka't hindi mangyayaring hindi magkagayon! 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang maiinam na <i xml:lang="es" lang="es">silleria</i> ni Kapitan&nbsp;Tiago ay 
	nawala, siya'y napalitan ng ayos Luis&nbsp;XV, malalaking tabing na tersiopelong 
	pula na may burdang ginto, may letra ng pangalan ng mga ikinasal, at 
	napipiglan ng tinuhog na bulaklak ng suhang huwad, ang nangakasabit sa mga
	<i xml:lang="fr" lang="fr">portiers</i> at nagwawasiwas sa sahig ng kanilang 
	malapad na laylayang ginto rin. Sa mga sulok ay may malalaking pasong yari 
	sa Japon na nasasalit sa mga gawa sa <span xml:lang="fr" lang="fr">Sevres</span>, 
	na kulay bughaw na malinis, na nangalalagay sa mga pedestal na kahoy na may 
	lilok. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang tanging wala sa ayos ay ang mga matitingkad na
	<i xml:lang="es" lang="es">cromo</i> na ipinalit ni Don Timoteo 
	sa mga dating <i>grabado</i> at mga larawan ng santo ni Kapitan&nbsp;Tiago. 
	Hindi siya nahikayat ni Simoun; ayaw ng mga <i xml:lang="es" lang="es">
	cuadrong oleo</i> ang mangangalakal, baka may maghinalang gawa ng mga 
	artistang pilipino.... siya ay magbigay buhay sa mga artistang pilipino, 
	iyan ang hindi mangyayari kailan man! Sa gayo'y mahahalo ang kanyang 
	katiwasayan at marahil ay sampu ng buhay, at alam niya kung papano ang 
	pamamangka sa Pilipinas! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga't nakadinig siya ng pag-uusap na ukol sa 
	mga artistang taga ibang lupa na gaya nina Rafael, Murillo, Velazquez, 
	ngunit hindi niya maisip kung papano ang gagawing pakikipagalam sa mga 
	taong yaon, at saka ang isa pa'y baka mangagsilabas na may laban sa 
	pamahalaan..... Sa <span xml:lang="es" lang="es">cromo</span> ay wala siyang 
	inaalaalang anuman, hindi gawang pilipino, mura pa, gayon din ang anyo, 
	kundi lalong mabuti, ang mga kulay ay lalong makikinang at mabuti ang 
	pagkakayari! Alam ni Don Timoteo kung papano ang dapat ugaliin 
	sa Pilipinas!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang malaking
	<i xml:lang="es" lang="es">caida</i>, na nahiyasan ng mga bulaklak, ay 
	siyang naging kakainan, isang malaking dulang na sukat sa tatlong pu katao 
	ang nasa gitna, at sa mga paligid, natatabi sa mga pader, ay may ilang 
	maliliit na sukat sa dalawa o tatlo katao. Mga kumpol na bulaklak, mga 
	bunton ng bungang kahoy na kahalo ng mga sintas at ilaw ang siyang namumuno 
	sa gitna ng mga dulang. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang pinggan ng ikinasal na lalaki ay may tandang 
	isang kumpol na alehandria, ang sa babae ay isa namang kumpol na bulaklak ng 
	suha at asusena. Sa harap nang gayong karingalan at karaming bulaklak ay 
	papasok sa guniguni ng kahit sino, na mga <i xml:lang="es" lang="es">ninfa</i> 
	na madalang ang damit at mga kupidong maliliit, na ang pakpak ay makulay, 
	ang siyang magdudulot ng mga alak at pagkain ng mga dioses sa mga panauhing 
	taga alapaap, na sinasaliwan ng mga kudyapi at alpa ng mga taga Eolia.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, ang 
	dulang na ukol sa malalaking dioses, ay wala roon, nalalagay sa gitna ng 
	malapad na asotea, sa isang magandang kiosko, na sadyang niyaring ukol doon. 
	Isang persianang kahoy na ginintuan, na kinakapitan ng mga punong 
	gumagapang, ang nagkakanlong ng pinakaloob sa malas ng madla, ngunit hindi 
	nakapipigil sa paglalabas pumasok ng hangin, upang mapalagi ang masarap na 
	simoy na kailangan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang mataas na tuntungan ang pinagpatungan ng mesa 
	upang tumaas kay sa ibang dulang na kakanan ng mga tao lamang, at isang 
	bubong, na pinalamutihan ng lalong mabubuting artista, ang magsasanggalang 
	sa mga tuktok hari sa mga may inggit na tanaw ng mga bituin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Doo'y wala kun 
	di pipitong <i xml:lang="es" lang="es">cubiertos</i>; ang mga kagamitan ay 
	pawang pilak, ang mga mantel at serbilyeta ay manipis na lino, ang mga alak 
	ay yaong lalong pinakamahal at masarap. Hinanap ni Don Timoteo 
	ang lalong bibihira at mahalaga at hindi siya marahil nag-alinlangang gumawa 
	ng isang kabuktutan kung nasabi sa kanyang ang General ay maibiging kumain 
	ng laman ng tao.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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