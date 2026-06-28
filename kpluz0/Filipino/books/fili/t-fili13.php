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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XIII. Ang Aralan ng Pisika</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang klase ay 
	isang look na higit ang kahabaan sa kaluwangan at may malalaking durungawang 
	may karali na pinapasukan ng hangin at liwanag. Sa hinabahaba ng dingding na 
	bato ay may tatlong baitang na bato na may takip na dalig, na puno ng mga 
	nag-aaral na ang pagkakahanay ay alinsunod sa unang letra ng kanilang 
	pangalan; sa ibayo ng pasukan, sa ilalim ng isang larawan ni Santo&nbsp;Tomas de 
	Aquino, ay nalalagay ang luklukan ng propesor, mataas at may dalawang hagdan 
	sa magkabilang panig. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Liban sa isang magandang tablero na may markong narra 
	na hindi halos nagagamit, sapagka't nasusulat pa ang
	<i xml:lang="es" lang="es">viva!</i> na nakita roon sapol sa araw ng 
	pasukan, doon ay walang anumang kasangkapang matino o sira. Ang mga 
	dingding, na pinintahan ng puti at natatanggol sa ilang dako ng mga lariong 
	may sarisaring kulay upang maiwasan ang mga pagkakakiskis, ay buhad na 
	buhad; ni isang guhit, ni isang inukit, ni bahagyang kasangkapan na ukol sa 
	Pisika! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga nag-aaral ay hindi nangangailangan ng higit pa sa roon, 
	walang naghahanap ng pagtuturo sa pamamag-itan ng pagsasanay sa isang 
	karunungang lubhang ukol sa kasanayan; mahabang panahon nang gayon ang 
	pagtuturo at hindi nagulo ang Pilipinas, kundi patuloy pa rin ngang gaya ng 
	dati. Maminsan minsan ay bumababang buhat sa langit ang isang kasangkapan na 
	ipinakikitang malayo sa nag-aaral, gaya ng pagpapakita ng Santisimo sa mga 
	mapanambang nangakaluhod, tingnan mo ako ngunit huwag salangin. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Panapanahon, pag nagkakaroon ng nagtuturong may magandang loob, ay 
	nagtatakda ng isang araw sa loob ng taon upang dalawin ang makababalaghang 
	Gabinete at hangaan mula sa labas ang mga kasangkapang di maturan ang 
	kabuluhan, na nangakalagay sa loob ng mga kinalalagyan; walang makadadaing; 
	ng araw na iyon ay nakakita ng maraming tanso, maraming bubog, maraming 
	tubo, bilog, gulong, kampana, at <abbr>ibp.</abbr>; at hindi na hihigit pa 
	roon ang pagtatanyag, ni hindi nagugulo ang Pilipinas. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang dako naman 
	ay alam ng mga nag-aaral na ang mga kasangkapang iyon ay hindi binili dahil 
	sa kanila hindi hangal ang mga prayle! Ang Gabineteng iyon ay ginawa upang 
	ipakita sa mga taga ibang lupa at sa mga matataas na kawaning nanggagaling 
	sa Espa&ntilde;a, upang sa pagkakita noon ay igalaw ang ulo na may kasiyahang loob, 
	samantalang ang umaabay sa kanila'y ngumingiting ang ibig sabihin wariy:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Eh! Inakala 
	ninyong ang matatagpuan ay mga paring huli sa kapanahunan? Kami ay kapantay 
	ng mga kasalukuyan; mayroon kaming isang Gabinete!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At isusulat 
	pagkatapos ng mga dayuhan at mga matataas na kawani, na pinasalubungan ng 
	malugod na pagtanggap, sa kanilang <i>mga paglalakbay o mga tala, na</i>: <i>
	Ang <span xml:lang="es" lang="es">Real y Pontificia Universidad</span> &ntilde;g
	<abbr>Sto.</abbr>&nbsp;Tomas sa Maynila, na pinamamahalaan &ntilde;g bihasang orden 
	dominikana, ay may isang mainam na Gabinete &ntilde;g Pisika na ukol sa ikatututo 
	&ntilde;g kabataan... </i></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											<i>
											Sa taontaon ay may dalawang daa't limang pu ang nag-aaral &ntilde;g 
	tinurang asignatura, at marahil dala &ntilde;g katamaran, &ntilde;g pagwawalang bahala, sa 
	kauntian &ntilde;g kaya &ntilde;g indio o iba pang sanhing likas sa kanila o bagay na di 
	mawatasan.... hanggang sa &ntilde;gayon ay hindi pa sumisipot ang isang kahit 
	munti man lamang, na <span xml:lang="fr" lang="fr">Lavoisier</span>, isang
	<span xml:lang="it" lang="it">Secchi</span>, ni isang
	<span xml:lang="en" lang="en">Tyndall</span>, na lahing malayong pilipino.</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y 
	upang mapagkilala ang katotohanan ay sasabihin namin, na sa Gabineteng ito 
	nag-aaral ang tatlo o apat na pung pumapasok sa <i xml:lang="es" lang="es">
	ampliacion</i> sa ilalim ng pamamahala ng isang nagtuturong gumaganap naman 
	ng mabuti sa kanyang tungkulin; ngunit sa dahilang ang lalong marami sa mga 
	nag-aaral ay galing sa <span xml:lang="es" lang="es">Ateneo Municipal</span> 
	na ang pagtuturo doon ay sa pagsasanay sa loob ng Gabinete, ay wala ring 
	malaking kabuluhan ang gayong pangyayari na di gaya nang kung ang 
	makasamantala noon ay ang dalawang daa't limang pung nagbabayad ng kanilang
	<i xml:lang="es" lang="es">matricula</i>, bumibili ng aklat, nangag-aaral at 
	gumugugol ng isang taon at walang namumuangan pagkatapos. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang nangyayari, 
	liban sa isang <i>kapista</i> o utusan na naging bantay ng mahabang panahon 
	sa museo, kailan man ay walang nabalitang may napala sa mga isinaulong 
	lisyon na pinagkakahirapan muna bago natutuhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit 
	balikan natin ang klase.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	katedratiko ay isang dominikong bata na tumungkol ng lubhang mahigpit at 
	mabantog sa kanyang pagtuturo sa ilang katedra sa paaralang
	<span xml:lang="es" lang="es">San&nbsp;Juan de Letran</span>. Bantog siya sa 
	pagkamabuting manalita't mabuting pilosopo at isa sa mga may mainam na 
	maaasahan sa loob ng kanyang pangkatin. Ang mga matatanda'y may pagtingin sa 
	kanya at kinaiinggitan siya ng mga bata, sapagka't sila man ay mayroon ding 
	pangkatpangkat. Yaon ang pangatlong taon na ng kanyang pagtuturo at kahit 
	ng taong iyon lamang siya magtuturo ng Pisika at Kimika, ay kinikilala na 
	siyang marunong, hindi lamang ng mga nag-aaral, kundi sampu ng mga kagaya 
	niyang palipatlipat na mga propesor. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Padre Millon ay hindi 
	kabilang ng karamihang sa taontaon ay palipatlipat ng katedra upang 
	magkaroon ng kaunting pagkabatid sa karunungan, nag-aaral sa gitna ng ibang 
	nag-aaral, na walang pagkakaiba kundi ang pangyayaring iisang bagay lamang 
	ang pinag-aaralan, tumatanong at hindi tinatanong, may mahigit na pagkabatid 
	ng wikang kastila at hindi nililitis pagkatapos ng taon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hinahalungkat ni
	Padre Millon ang karunungan, kilala niya ang Pisika ni Aristoteles 
	at ang kay Padre Amat; maingat niyang binabasa ang <i>Ramos</i> at 
	maminsanminsan ay tumutunghay sa <i xml:lang="fr" lang="fr">Ganot</i>. Gayon 
	man ay iginagalaw kung minsan ang ulo na wariy nag-aalinlangan, mangingiti 
	at bubulong ng: <i xml:lang="la" lang="la">transeat</i>. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tungkol sa Kimika, 
	ay inaakalang mayroon siyang di karaniwang kabatiran sapol noong, sa 
	pag-alinsunod sa isang banggit ni <abbr>Sto.</abbr>&nbsp;Tomas, na ang tubig ay 
	isang halo, ay maliwanag niyang pinatunayan na ang taga langit na doctor ay 
	nagpauna ng malaki sa mga <span xml:lang="en" lang="en">Berzelius, Gay 
	Lussac, Bunsen</span> at iba pang <i>materialista</i>, na pawang may munti o 
	malaking kahambugan. Datapwa't kahit na naging propesor sa
	<i xml:lang="es" lang="es">Geografia</i> ay mayroon siyang mga ilang 
	pag-aalinlangan tungkol sa kabilugan ng mundo at gumagamit ng may 
	makakahulugang ngiti pagsasalita ng pag-ikit at pagligid sa araw, at 
	binabanggit yaong:</font></p>
	<div class="poem-container">
		<blockquote class="poem">
			<div class="stanza">
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Ang sa bituing pagbubulaa'y</font></div>
				<div class="i0">
					<p style="margin-left: 40px; margin-right: 80px" align="justify">
					<font style="font-size: 13pt" face="Arial" color="#333333">
					Isang pagbubulaang mainam......</font></div>
			</div>
		</blockquote>
	</div>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngumingiting 
	may pakahulugan sa harap ng ilang paghahaka tungkol sa pisika at inaakalang 
	hibang, kundi man bangaw, ang hesuitang si <span xml:lang="it" lang="it">
	Secchi</span>, na umano'y ang pagputol nito ng pariparisukat sa ostia ay 
	anak ng pagkagulo sa astronomia, at dahil doon, ang sabiy pinagbawalang 
	magmisa; marami ang nakapuna sa kanya ng tila pagkamuhi sa bagay na 
	itinuturo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ngunit ang mga kapintasang ito'y maliliit na bagay, mga himaling 
	sa paraan ng pag-aaral at pananampalataya, at madaling malilinawan, hindi 
	lamang sa dahilang ang karunungan sa pisika ay lubos na galing sa kasanayan, 
	sa kababatyag at panghihinuha, samantalang siya'y malakas sa pilosopia, 
	lubos na ukol sa paghuhulohulo, sa palagay at kuro, hindi, sa dahilang 
	siya'y mabuting dominiko, na magiliw sa karangalan ng kanyang kapisanan, ay 
	hindi mangyayaring malugod sa isang katarungang hindi ikinabantog ng isa man 
	sa kanyang mga kapatid--siya na ang unang hindi naniniwala sa kimika ni <abbr>
	Sto.</abbr>&nbsp;Tomas--ngunit ikinadadakila ng ibang Samahang kalaban, sabihin 
	na nating katunggali nila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ito ang 
	propesor ng umagang iyon, na matapos mabasa ang talaan, ay ipinauulit sa mga 
	tinuturuan ang mga isinaulong lisyon na walang labis walang kulang. Ang mga 
	ponograpo ay umalinsunod, ang ilan ay mabuti, ang iba'y masama, ang iba'y 
	pautal-utal, nag-aanasan. Ang makapagturing ng walang mali ay nagtatamo ng 
	isang <em>mabuting guhit</em> at <em>masamang guhit</em> ang magkamali ng 
	higit sa makaitlo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang isang 
	batang mataba, na mukhang nag-aantok at ang mga buhok ay nangagtuwid at 
	matitigas na wariy balahibo ng isang sepilyo, ay naghikab ng 
	makalinsad-sihang at nag-inat na iniunat ang mga kamay na wariy nakahiga pa 
	sa banig. Nakita ng katedratiko at pinag-isipang gulatin......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oy! ikaw, 
	matutulugin, aba! <i xml:lang="es" lang="es">cosa?</i>
	<i xml:lang="es" lang="es">Perezoso tambien</i>, siguro hindi ka marunong ng
	<span class="locked">lisyon, ha?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi lamang 
	hindi pinupupo ni Padre Millon ang lahat ng nag-aaral, gaya ng 
	sino mang mabuting prayle, kundi kinakausap pa sila ng wikang tinda, bagay 
	na natutuhan sa katedratiko sa <span xml:lang="es" lang="es">Canones</span>. 
	Kung sa gayong pananalita ay inakala ng Reberendo ang kutyain ang mga 
	nag-aaral o ang mga banal na takda ng mga <i xml:lang="es" lang="es">
	concilio</i>, ay bagay na hindi pa napasisiyahan, kahit pinagtalunan na ng 
	mahaba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	pagkakatukoy ay hindi ikinamuhi ng mga nag-aaral kundi ikinagalak pa at 
	marami ang nangagtawanan; yaon ay nangyayari sa araw araw. Gayon man ay 
	hindi natawa ang mataba; biglang tumindig, kinuskos ang mga mata, at waring 
	makina ng bapor ang nagpagalaw sa ponograpo at sinimulan ang
	<span class="locked">pagsasabi ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--'Tinatawag na 
	salamin ang lahat ng pamukhang binuli at nalalaan upang malarawan sa kanya, 
	dahil sa tama ng liwanag, ang mga larawan ng bagay na ilapit sa tinurang 
	pamukha; dahil sa mga bagay bagay na bumubuo ng mga pamukhang ito ay 
	binabahagi sa salaming <i>metal</i> at salaming bubog......'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hintay, 
	hintay, hintay!--ang biglang pigil ng katedratiko--Jesus para kang pagupak! 
	Tayo'y nasa salitaang ang mga salamin ay binabahagi sa mga salaming <i>metal</i> 
	at salaming bubog ha? At kung bigyan kita ng isang kahoy, ang kamagong sa 
	halimbawa, na lininis na mabuti at hinibuan, o kaputol na marmol na maitim 
	na pinakabuli, isang balok na asabatse na masisinagan ng larawan ng mga 
	bagay na ilagay sa harap saang bahagi mo ilalahok ang mga salaming iyan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tinanong, 
	sa dahilang hindi maalaman ang isasagot o kaya'y sa dahilang hindi nalinawan 
	ang katanungan, ay tumangkang makalusot sa pagpapakilalang alam niya ang 
	lisyon, kaya't nagpatuloy na wariy baha:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--'Ang mga una ay binubuo ng tanso o pagkakahalohalo ng iba't ibang metal at 
	ang pangalawa ay binubuo ng isang lapad na bubog na ang dalawang mukha'y 
	kapwa kininis at ang isa rito'y may pahid na tinggang puti.'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tum, tum, 
	tum! hindi iyan; <i xml:lang="la" lang="la">dominus vobiscum</i> ang 
	sinasabi ko sa iyo at ang isinasagot mo sa akin ay
	<i xml:lang="la" lang="la">requiescat in pace</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At inulit sa 
	wikang tinda, ng mabait na katedratiko, ang katanungan na linahukan sa 
	bawa't sandali ng mga <i xml:lang="es" lang="es">cosa</i> at <i>aba</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi makaiwas 
	sa kagipitan ang kaawaawang binata: nag-aalinlangan sa kung nararapat niyang 
	ihalo ang kamagong sa mga metal, ang marmol sa mga bubog at ang asabatse ay 
	iwan sa alanganin, hanggang sa ang kalapit niyang si Juanito Pelaez ay 
	bumulong sa kanya ng <span class="locked">lihim na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang salaming 
	kamagong ay kasama ng mga salaming kahoy!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inulit ng lito 
	nating binata ang kanyang nadinig, kaya't nag-ihit sa katatawa ang kalahati 
	ng klase.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ikaw ang 
	mabuting kamagong!--ang sabi ng katedratiko na napilitang tumawa--Tingnan 
	natin kung alin ang tatawagin nating salamin: ang pamukha,
	<i xml:lang="la" lang="la">per se, in quantum est superficies</i>, o ang 
	katawang bumubuo ng ibabaw na ito o kaya'y ang bagay na kinapapatungan ng 
	pamukhang ito ang pinagbuhatang bagay, na naiba dahil sa pagkakabago sa 
	kanya ng tinatawag na pamukha, sapagka't maliwanag na, sa dahilang ang 
	pamukha ay kabaguhan ng mga katawan, ay hindi mangyayaring mawalan ng 
	kabagayan. Tingnan natin ano ang <span class="locked">sabi mo?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ako? wala! ang 
	isasagot sana ng kahabaghabag na hindi na maalaman kung ano ang 
	pinagsasalitaan dahil sa karamihan ng mga pamukha at mga pagbabagong 
	bumabayong masakit sa kanyang tainga; ngunit nakapigil sa kanya ang udyok 
	ng kahihiyan, kaya't balot kahapisan at pinapawisan na, noong inulit ng 
	marahan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--'Tinatawag na salamin ang lahat ng pamukha na binuli....'</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Ergo, 
	per te</i>, ang salamin ay ang ibabaw,--ang dukit ng katedratiko.--Kung gayon 
	ay linawin mo sa akin ang ganitong bagay. Kung ang pamukha ay siyang 
	salamin, ay iba sa kabagayan ng salamin ang ano mang nalalagay sa likuran, 
	sa dahilang ang nasa likod ay hindi makapagbabago sa nasa sa harapan,
	<i xml:lang="la" lang="la">id est</i>, ng ibabaw, <i xml:lang="la" lang="la">
	quae super faciem est, quia vocatur superficies facies ea quae supra videtur</i>; 
	pinaayunan mo o hindi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lalo pang 
	nanindig ang buhok ng kaawaawang binata, na wari pinakilos ng isang malakas 
	na galaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pinaayunan mo 
	o hindi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kahit na 
	ano, ang ibigin po ninyo, Padre, ang inaakala niyang isagot, ngunit hindi 
	makapangahas na turan ang gayon, dahil sa natatakot siyang mangagtawanan. 
	Yaon ang matatawag na kagipitan at kailan pa man ay hindi pa siya napapasok 
	sa gayong kahigpit. May-roon siyang munting gunita na hindi mapapaayunan ang 
	kahit napakaliit na bagay sa mga prayle, na hindi nila pinalalabasan ng 
	lahat ng pangyayari at kapakinabangang mahahaka, kundiy magsabi na ang 
	kanilang mga lupaing ari at mga kurato. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kaya't ang iniuudyok ng kanyang 
	anghel na taga pag-adya ay ipagkait ng buong tibay ng kaluluwa at katigasan 
	ng kanyang buhok ang ano mang bagay, at handa nang bumitiw ng isang 
	matinding <i xml:lang="la" lang="la">nego!</i>, sa dahilang ang hindi 
	umaamin ng anuman ay walang tinatanggap, ang sabi sa kanya ng isang kawani 
	sa hukuman; datapwa'y ang masamang ugaling hindi nakikingig sa udyok ng 
	sariling budhi, ang di pananalig sa mga taong nakaaalam ng kautusan at ang 
	paghanap ng abuloy sa iba, gayong sukat na ang kanyang sarili, ay siyang sa 
	kanya'y sumira. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hinuhudyatan siyang umayon ng mga kasama, lalo na si Juanito 
	Pelaez, at sa pagpapadala sa masama niyang kapalaran, ay bumitiw ng isang <i>
	umaayon po ako, Padre</i> na ang boses ay malamlam na waring ang tinuran ay
	<i xml:lang="la" lang="la">In manus tuas commendo spiritum meum</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Concedo 
	antecedentum</i>--ang ulit ng nagtuturo na ngumiti ng may kahulugan--<i xml:lang="la" lang="la">ergo</i>, 
	maaaring kayurin ko ang tinggang puti ng isang salaming bubog, palitan ng 
	kaputol na bibingka at mayroon din tayong salamin, ha? Ano, magkakaroon 
	tayo?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binata'y 
	tumingin sa mga nagsusuplong sa kanya, ngunit nang makitang sila'y pawang 
	gulilat din at hindi maalaman ang turan, ay nalarawan sa kanyang mukha ang 
	mapait na pagsisisi. <i xml:lang="la" lang="la">Deus meus, Deus meus, quare 
	dereliquiste me</i>, ang ipinahahayag ng kanyang hapis na paningin 
	samantalang ang kanyang mga labiy bumibigkas ng <i>linintikan!</i> Walang 
	nangyari sa kanyang kauubo, binatak ang petsera ng kanyang baro, itatayo ang 
	isang paa, pagkatapos ay ang isa naman, walang matagpong kalinawan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, may ano 
	tayo?--ang ulit ng nagtuturo na nagtatalik sa bunga ng kanyang tinuran.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i>Ang 
	bibingka!</i>--ang bulong ni Juanito Pelaez--<i>ang bibingka!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tumigil ka, 
	hangal!--ang sigaw na tuloy ng di magkangtututong binata na ibig ng maiwasan 
	ang kagipitan sa paraang mang-away.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tingnan 
	natin, Juanito, kung mapaliwanagan mo ang bagay na ito!--ang tanong ng 
	katedratiko kay Pelaez.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Pelaez, na 
	isa sa mga kinagigiliwan niya, ay dahandahang tumindig, ngunit siniko muna 
	si Placido Penitente na siyang sumusunod sa lagay sa talaan. Ang ibig 
	sabihin ng pag-<span class="locked">siko ay:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kang 
	malilingat at tambisan mo ako!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Nego 
	consecuentiam</i>, Padre!--ang sagot na walang kagatol-gatol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aha, kung 
	gayo'y <i xml:lang="la" lang="la">probo consecuentiam</i>!
	<i xml:lang="la" lang="la">Per te</i>, ang makintab na ibabaw ay siyang 
	tunay na salamin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Nego 
	suppositum!</i>--ang putol ni Juanito ng maramdamang binabatak siya ni 
	Placido sa amerikana.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Papaano?
	<i xml:lang="la" lang="la">Per te</i>......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Nego!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Ergo</i> 
	inakala mo na ang nasa likuran ay nagiging sanhi ng nasa harap?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Nego!</i>--ang 
	sigaw na lalo pang malakas, dahil sa pagkakaramdam ng isa pang batak sa 
	kanyang amerikana.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Juanito, o 
	lalong tumpak si Placido, na siyang tumatambis, ay hindi nakahahalatang ang 
	ginagamit niyang kaparaanan ay ang sa intsik: huwag tumanggap ng isa mang 
	dayuhan upang huwag siyang masalakay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Papaano ba 
	tayo?--ang tanong ng nagtuturo na may kaonting kalituhan at di mapalagay, na 
	tinitingnan ang ayaw magparaang nag-aaral--nagbibigay sanhi o hindi sa 
	harapan ang bagay na nasa likuran?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa tiyak na 
	katanungang ito, na maliwanag, na wariy <i xml:lang="la" lang="la">
	ultimatum</i>, ay hindi maalaman ni Juanito ang isagot at wala namang iudyok 
	sa kanya ang kanyang amerikana. Walang mapala sa kahuhudyat kay Placido; si 
	Placido ay alinlangan. Sinamantala ni Juanito ang sandaling pagkakatingin ng 
	katedratiko sa isang nag-aaral, na palihim na inalis sa paa ang mahigpit na 
	saping suot, at niyapakang malakas si Placido na sabay ang sabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tambisan mo 
	ako, sulong, tambisan mo ako!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Distingo</i>.... 
	Aray! napakahayop ka!--ang sigaw na hindi kinukusa ni Placido na tinitingnang 
	pagalit si Juanito, samantalang hinihipo ang kanyang sapatos na tsarol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nadinig ng 
	pari ang sigaw, nakita sila't nahulaan ang nangyayari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oy, ikaw,
	<i xml:lang="es" lang="es">espiritu sastre</i>!--ang sabi--hindi ikaw ang 
	tinatanong ko, ngunit yayamang ginawa mo ang magligtas sa iba, ay tingnan 
	natin, iligtas mo ang katawan mo, <i xml:lang="la" lang="la">salva te ipsum</i>, 
	at paliwanagan mo sa akin ang likwad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Magalak na 
	umupo si Juanito at katunayan ng kanyang utang na loob ay pinanglawitan ng 
	dila ang tumatambis sa kanya. Samantala namang ito, namumula dahil sa 
	kahihiyan, ay tumindig at bumulong ng di malinawang mga dahilan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinaya siyang 
	sandali ni Padre Millon, kagaya ng lumalasap sa tingin ng isang 
	kakanin. Kay inam marahil ng pangayumpapain at ilagay sa kahihiyan ang 
	binatang iyong magara, kailan ma'y mainam ang bihis, taas ang ulo at 
	aliwalas ang paningin! Isa ring kaawaang gawa ang gayon; kaya't ipinatuloy 
	ng buong puso ng nagtuturo ang gawain, na maliwanag na inulit ang 
	katanungan:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi ng 
	aklat na ang mga salaming metal ay binubuo ng tanso o pagkakahalo ng iba't 
	ibang metal totoo o hindi?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi ng 
	aklat, Padre......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Liber 
	dixit ergo ita est</i>; hindi mo nasa ang dumunong pa kay sa aklat....--At 
	pagkatapos ay idinugtong, na, ang mga salaming bubog ay binubuo ng isang 
	palas na bubog, na ang dalawa niyang mukha ay kininis at ang isa sa kanila 
	ay may pahid na ginilong na tinggang puti,--<i xml:lang="la" lang="la">nota 
	bene!</i> isang ginilong na tinggang puti. Tunay ba ito?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung sinasabi 
	ng aklat, Padre......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang tinggang 
	puti ay metal?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tila po, 
	Padre; sinasabi ng aklat......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Metal nga, 
	metal nga, at ang ibig sabihin ng salitang ginilong ay ang pagkakahalo niya 
	sa asoge na isa ding metal. <i xml:lang="la" lang="la">Ergo</i> ang isang 
	salaming bubog ay isang salaming metal; <i xml:lang="la" lang="la">ergo</i> 
	ang mga pagkakabahagi ay hindi maliwanag, <i xml:lang="la" lang="la">ergo</i> 
	ang pagiibaiba ay masama, <i xml:lang="la" lang="la">ergo</i>.... Papaano 
	ang pagpapaliwanag mo, <i xml:lang="es" lang="es">espiritu sastre</i>?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tinindihan 
	ang mga <em xml:lang="es" lang="es">ergo</em> at ang mga <em>mo</em> ng 
	buong diin at ikinindat ang mata na waring ang ibig sabihin, ay: luto
	<span class="locked">ka na!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Itong.... ang 
	ibig sabihin ay itong....--ang bulong ni Placido.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	hindi mo nawatasan ang lisyon, budhing aba, na walang namumuwangan ay 
	sumusulsol sa kapwa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang buong 
	klase ay hindi nagdamdam sa gayon, inari pang mainam ng marami ang 
	pagkakatula, kaya't nangagtawanan. Kinagat ni Placido ang kanyang mga labi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	pangalan mo?--ang tanong ng pari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Matigas na 
	sumagot si Placido.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aha! Placido 
	Penitente, mukha ka pang Placido Soplon o Soplado. Ngunit bibigyan kita ng
	<i xml:lang="es" lang="es">penitencia</i> dahil sa iyong mga
	<i xml:lang="es" lang="es">sopladuria</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At siyang siya 
	sa kanyang mga pasalisalikwat na pananalita, ay ipinag-utos kay Placido na 
	sabihin ang lisyon. Sa kalagayang yaon ng binata ay nagkaroon ng mahigit na 
	tatlong mali. Nang makita ang gayon ng paring nagtuturo ay itinangotango ang 
	ulo, binuksang dahan dahan ang talaan at banayad na banayad na tinunghan, 
	samantalang binabanggit na marahan ang mga pangalan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Palencia.... 
	Palomo.... Panganiban.... Pedraza.... Pelado.... Penitente, aha! Placido 
	Penitente, labing limang araw na kusang pagkukulang sa pagpasok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Placido ay 
	umunat:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Labing limang 
	pagkukulang, Padre?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Labing limang 
	kusang pagkukulang sa pagpasok--ang patuloy ng nagtuturo--Kung gayo'y isa na 
	lamang ang kulang upang maalis sa talaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Labing limang 
	pagkukulang, labing lima?--ang ulit ni Placido na nagugulumihanan--makaapat pa 
	lamang akong nagkukulang at kung baga man ay ngayon ang ikalima.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Husito, 
	husito, se&ntilde;olia!</i>--ang sagot ng pari, na minasdan ang binata sa ibabaw ng 
	kanyang salaming may kulob na ginto.--Kinikilala mong nagkulang ka ng 
	makalima, at ang&nbsp; Diyos&nbsp; lamang ang nakababatid kung hindi ka nagkulang ng 
	higit pa sa roon! <i xml:lang="la" lang="la">Atqui</i> sa dahilang bihira 
	kong basahin ang talaan at sa bawa't pagkahuli ko sa isa ay nilalagyan ko ng 
	limang guhit, <i xml:lang="la" lang="la">ergo</i> ilan ang makalimang lima? 
	Nakalimot ka na marahil ng <span xml:lang="es" lang="es">multiplicar</span>! 
	Makalimang lima ay ilan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--dalawampu't 
	lima.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Husito 
	husito!</i> Sa gayon ay nakalamang ka pa ng sampu sapagka't makaitlo lamang 
	kitang nahuli sa pagkukulang.... Uy! kung nahuli kita sa lahat ng 
	pagkukulang mo, a.... At ilan ang makaitlong lima?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Labing 
	lima......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Labing lima,
	<i xml:lang="es" lang="es">parejo camaron con cangrejo</i>!--ang tapos ng 
	nagtuturo na itinupi ang talaan--pag nagkabiso ka pang minsan ay, sulong!
	<i xml:lang="es" lang="es">apuera de la fuerta!</i> Ah! at ngayon ay isang 
	pagkukulang sa lisyon sa araw araw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At muling 
	binuksan ang talaan, hinanap ang pangalan at linagyan ng isang munting 
	guhit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, isang 
	munting guhit!--ang sabi--pagka't wala ka pa ni isa man lamang!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit 
	Padre--ang sabi ni Placido na nagpipigil pa--kung lalagyan po ninyo ako ng 
	pagkukulang sa lisyon, Padre, ay dapat po naman, Padre, na alisin ninyo ang 
	pagkukulang ko sa pagpasok na inilagay ninyo ngayon sa akin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pari ay 
	hindi sumagot; inilagay munang dahandahan ang pagkukulang, tiningnang 
	ikiniling ang ulo--marahil ay mainam ang pagkakaayos ng guhit--tiniklop ang 
	talaan at pagkatapos ay pakutyang tumanong:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba! at bakit
	<i xml:lang="es" lang="es">&ntilde;ol</i>?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't 
	hindi malilirip, Padre, na ang isang tawo'y magkulang sa pagpasok at 
	makapagbigay ng lisyon.... ang sabi po ninyo, Padre, ay, ang naroon at ang 
	wala......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naku! 
	metapisiko pa, wala pa lamang sa panahon! Hindi malilirip, ha?
	<i xml:lang="la" lang="la">Sed patet experientia</i> at
	<i xml:lang="la" lang="la">contra experientiam negantem, fusilibus est 
	arguendum</i>, alam mo? At hindi mo malirip, pilosopo, na mangyayaring 
	magkasabay na magkulang sa pagpasok at hindi matuto ng lisyon? Di yata't ang 
	hindi pagpasok ay katuturan na ng karunungan? Ano ang sasabihin mo 
	pilosopastro?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang huling 
	binyag na ito'y siyang naging patak na nakapagpaapaw sa sisidlan. Si 
	Placido, na kinikilalang pilosopo ng kanyang mga kaibigan, ay naubusan ng 
	pagtitiis, inihagis ang aklat, tumindig at hinarap ang paring nagtuturo:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sukat na, 
	Padre, sukat na! Maaari pong lagyan ninyo ako ng mga pagkukulang na ibig 
	ninyong ilagay, ngunit wala po kayong karapatang lumait sa akin. Maiwan 
	kayo sa inyong klase, sapagka't hindi na ako <span class="locked">
	makapagtitiis pa.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At umalis na 
	ng walang paalam.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang buong 
	paaralan ay nasindak: ang gayong pagpapakilala ng karangalan ay hindi pa 
	halos nakikita: sino ang makaakala na si Placido Penitente....? Ang paring 
	nagtuturo, na nabigla, ay napakagat labi at minasdan siya sa pag-alis na 
	itinatango ang ulo na may pagbabala. Ang boses ay nanginginig na sinimulan 
	ang sermon na ang salaysayin ay ang dati rin, kahit lalong malakas at 
	lalong mapusok ang pangungusap. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tinukoy ang nagsisimulang pagmamataas, ang 
	di paglingap ng utang na loob sapol pagkatao, ang kapalaluan, ang di 
	paggalang sa mga nakatataas, ang kapalaluang iniuudyok sa mga binata ng 
	sitan ng kadiliman, ang kakulangan sa pinag-aralan, ang kadahupan at <abbr>
	ibp.</abbr> Matapos iyon ay tumuloy naman sa pagpaparunggit at pagkutya sa 
	hangad ng ilang <i xml:lang="es" lang="es">sopladillo</i> na magturo pa sa 
	kanilang mga guro at magtatayo ng isang akademia na ukol sa pagtuturo ng 
	wikang kastila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ha, 
	ha!--aniya--iyang mga kamakalawa lamang ay babahagyang makabigkas ng
	<i xml:lang="es" lang="es">si, Padre, no, Padre</i> ay ibig pang lumalo sa 
	mga inubanan na sa pagtuturo? Ang sadyang ibig matuto ay natututo mayroon 
	man o walang mga akademia! Marahil iyan, iyang kaaalis pa lamang, ay isa sa 
	mga may panukala! Kay inam ng kalalabasan ng wikang kastila sa mga ganyang 
	tagapagtanggol! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Saang kayo kukuha ng panahong ipaparoon sa Akademia sa halos 
	kinakapos kayo sa ikagaganap sa kailangan ng klase? Ibig naming matuto kayo 
	ng wikang kastila at masalita ninyong mabuti upang huwag ninyong sirain ang 
	aming tainga sa inyong mga gawi at inyong mga pe, ngunit una muna ang 
	katungkulan bago ang pagdadasal; tumupad muna kayo sa inyong pag-aaral at 
	saka kayo mag-aral ng wikang kastila at pumasok pa kayong manunulat kung 
	ibig ninyo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nagpatuloy 
	sa gayong kasasalita hangang sa tumugtog ang kampana at natapos ang klase, 
	at ang dalawang daan at tatlong pu't apat na nag-aaral, matapos 
	makapagdasal, ay umalis na wala ring namumuwangang kagaya ng pumasok, 
	ngunit nangagsihingang wariy naalisan ng isang malaking pataw sa katawan. 
	Ang bawa't isa sa mga binata'y nawalan ng isang oras pa sa kanyang pamumuhay 
	at kasabay noon ang isang bahagi ng karangalan at pagpapahalaga sa sarili, 
	ngunit sa isang dako naman ay nararagdagan ang panghihina ng loob, ang di 
	pagkagiliw sa pag-aaral at ang mga pagdaramdam ng mga puso. Matapos ito'y 
	hingan sila ng karunungan, karangalan, pagkilala ng utang na loob!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">De 
	nobis post haec, tristis sententia fertur!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At gaya rin ng 
	dalawang daa't tatlong pu't apat na ito'y dinaan ang mga oras ng kanilang 
	klase ng libo at libong nag-aral na nauna sa kanila, at, kung hindi maaayos 
	ang mga bagaybagay, ay daraan ding gayon ang mga susunod at magiging mga 
	batingol, at ang karangalang sinugatan at ang sigabong ligaw ng kabataan ay 
	magiging pagtatanim at katamaran, na gaya ng mga alon, na nagiging maputik 
	sa ilang pook ng dalampasigan, na sa pagsusunuran ay lalo't lalo pang 
	lumalapad ang naiiwanan ng yagit. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y, 
											yaong mula sa walang katapusan 
	ay nakakikita sa mga ibubunga ng isang kagagawan na nakakalas na wariy 
	sinulid; yaong tumitimbang ng mga sandali at nagtakda sa kanyang mga 
	nilalang na ang unang batas ay ang paghanap ng ikasusulong at ng kawastuan; 
											yaong, kung tapat, ay hihingi ng pagtutuus sa dapat hingan, nang dahil sa mga 
	yutayutang pag-iisip na pinalabo at binulag, nang dahil sa karangalang pinawi 
	sa yutayutang tao at ng dahil sa di mabilang na panahong lumipas at gawang 
	nawalan ng kabuluhan! </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At kung ang mga turo sa Ebanhelio ay may tining na 
	katotohanan, ay mananagot din ang mga yutayutang hindi nangatutong itago ang 
	liwanag ng kanyang pag-iisip at ang karangalan ng kanyang budhi, gaya rin 
	naman ng pag-uusisa ng panginoon sa alipin nang salaping ipinanakaw niya 
	dahil sa karuwagan!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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