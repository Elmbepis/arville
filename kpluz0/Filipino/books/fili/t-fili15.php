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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XV. Si Ginoong Pasta</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Isagani ay 
	naparoon sa bahay ng abogado, isa sa mga may tanging katalinuhan sa Maynila 
	na pinagtatanungan ng mga prayle sa kanilang malalaking kagipitan. Nag-antay 
	nang kaunti ang binata, sapagka't maraming ipinagtatanggol ang naroroon, 
	ngunit dumating din ang taning na ukol sa kanya at pumasok sa gawaan o
	<i xml:lang="es" lang="es">bufete</i> gaya ng karaniwang tawag sa Pilipinas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinanggap siya 
	ng manananggol-usap sa pamagitan ng isang mahinang ubo at tinitingnang 
	palihim ang kanyang mga paa. Hindi tumindig ni hindi man lamang siya pinaupo 
	at nagpatuloy sa pagsusulat. Nagkaroon si Isagani ng panahon upang matyagan 
	siya at kilalanin. Malaki ang itinanda ng abogado, ubanin na at ang kanyang 
	upaw ay halos laganap sa buong tuktok. Ang kanyang mukha'y pasumangot at 
	matigas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gawaan, ang 
	lahat ay tahimik; walang nadidinig kungdi ang anasan ng mga tagasulat o 
	nangagsasanay na gumagawa sa kanugnog na silid: ang kanilang mga panitik ay 
	gumagaralgal na wariy nakikipagtunggali sa papel.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Natapos din 
	ang manananggol sa sinusulat, binitiwan ang panitik, itinaas ang ulo, at ng 
	makilala ang binata, ay nagliwanag ang mukha, at malugod siyang kinamayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Aba, 
	binata!.... ngunit umupo kayo, patawarin ninyo.... hindi ko napunang kayo 
	pala. At ang inyong amain?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lumakas ang 
	loob ni Isagani at inakalang mapapabuti ang kanyang lakad. Isinalaysay 
	niyang lahat ang nangyari, na pinag-aaralang mabuti ang napapala ng kanyang 
	sinasabi. Pinakinggang walang katigatigatig ni <abbr>Gi</abbr>noong Pasta 
	ang simula, at kahit batid niya ang lakad ng mga nag-aaral, ay 
	nagmamaangmaangan upang ipakilala na wala siyang pakialam sa mga kamusmusang 
	iyon, ngunit ng maramdaman ang pakay sa kanya at nadinig na natutukoy sa 
	Vice-Rector, mga prayle, Capitang General, panukala at <abbr>iba </abbr>pa, 
	ang mukha niya'y unti-unting nagdilim at nagtapos sa <span class="locked">
	pagbulalas ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ito ang 
	lupain ng mga panukala! Ngunit ituloy, ituloy ninyo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi 
	nanglupaypay si Isagani: sinabi ang kapasiyahang ibibigay at nagtapos sa 
	pagpapahayag ng pagkakatiwala ng kabinataan na siya, si <abbr>Gi</abbr>noong 
	Pasta, 
	ay mamamagitna ng sang-ayon sa kanila sakaling si Don Custodio 
	ay sumangguni sa kanya, gaya ng maaasahan. Hindi nangahas si Isaganing 
	sabihin na <em>pagpayuhan</em> dahil sa ngibit na ipinamalas ng manananggol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit may 
	takda ng gagawin si <abbr>Gi</abbr>noong Pasta, na dili iba't ang huwag 
	manghimasok sa bagay na iyon, ni sumangguni, ni pagsanggunian. Alam niya ang 
	nangyari sa <span xml:lang="es" lang="es">Los&nbsp;Ba&ntilde;os</span>, batid niyang may 
	dalawang pangkat at hindi si Padre Irene ang tanging bayani na 
	nasa dako ng mga nag-aaral, ni hindi siya ang nagpalagay ng pagdaraan ng 
	kasulatan sa Lupong ng Paaralan, kundi lubos na kaiba. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Padre Irene, si Padre Fernandez, ang <i xml:lang="es" lang="es">condesa</i>, 
	isang mangangalakal na nakakikinikinita nang makapagbibili ng kagamitang 
	ukol sa bagong Akademia at ang mataas na kawaning nagtukoy ng iba't ibang 
	kapasiyahang-hari ay mangagtatagumpay na sana, ng ipinaalaala ni Padre Sibyla, 
	upang magkapanahon, ang Kataastasang Lupon. Ang lahat ng bagay na ito'y 
	natatala sa alaala ng abogado; kaya't ng matapos makapagsalita si Isagani, 
	ay tinangkang lituhin ito sa pariway na mga pangungusap, guluhin at ilipat 
	ang usapan sa ibang bagay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oo!--ang sabi 
	na inilawit ang labi at kinamot ang upaw--walang mangunguna sa akin sa 
	pag-ibig sa tinubuan at paghahangad ng pagkakasulong, datapwa'y.... hindi 
	ako makasugba.... hindi ko masabi kung batid ninyo ang aking kalagayan, 
	isang kalagayang lubhang maselang.... marami akong pag-aari.... kailangan 
	akong kumilos sa loob ng isang masusing pagkataros.... isang pagsugba....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ibig lituhin 
	ng abogado ang binata sa pamamagitan ng maraming salita at nagsimula ng 
	pagtukoy sa mga batas, sa mga kapasiyahan, at napakarami ang nasabi, na 
	hindi ang bata ang nagulo kundi siya sa sarili ang halos nagulo sa isang 
	pasikot sikot na kababanggit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi po 
	mangyayaring hahangarin naming ilagay kayo sa kagipitan--ang mabanayad na 
	sagot ni Isagani--Iligtas kami ng Lumikha sa pagbibigay gambala sa mga taong 
	ang kanilang buhay ay lubhang kailangan ng ibang pilipino! Datapwa'y kahit 
	napakaunti ang nababatid ko tungkol sa mga batas, mga kautusang hari, mga 
	lathala at mga kapasiyahang umiiral sa ating bayan, ay hindi ko inaakalang 
	magkaroon ng kasamaan ang makitulong sa mga adhikain ng pamahalaan, ang 
	punyagiin ang siya'y maalinsunod na mabuti; iisang layon ang aming inuusig 
	at sa kaparaanan lamang kami nagkakaiba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	manananggol ay napangiti: ang binata'y napadadala sa ibang landas at doon 
	niya lilituhin, lito na nga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Diyan nga 
	naririyan ang <i>kid</i>, sa karaniwang sabi; hindi nga ba kapuripuri ang 
	tumulong sa pamahalaan pag ang pagtulong ay sa pamamagitan ng pangangayupapa, 
	alinsunurin ang kanyang mga kapasiyahan, ang tuwid na katuturan ng mga batas 
	na katugon ng tuwid na paghahaka ng mga namamahala at hindi malalaban sa 
	unang una at karaniwang paraan sa pagkukuro ng mga ginoong may hawak ng 
	ikaaanyo ng mga taong bumubuo ng isang kapisanan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At dahil dito ay masama, 
	karapatdapat parusahan, sapagka&#39;t nakahahalay sa batayan ng kapangyarihan, 
	ang gumawa ng isang bagay na laban sa kanyang mga munakala kahit na 
	inaakalang mabuti kay sa nanggagaling sa pamahalaan, sapagka&#39;t ang gayong 
	kagagawan ay makasusugat sa kanyang katibayan na siyang batayan ng alin mang 
	pamamahala sa mga bayang sakop.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang matandang 
	abogado, sa pananalig na ang mga tinurang iyon ay nakalito kay Isagani, ay 
	nagpakabuti sa kanyang silyon ng walang kaimik-imik, kahit na sa loob 
	niyang sarili ay nagtatawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, ay 
	tumugon si Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Inakala ko, 
	na ang mga Pamahalaan ay dapat humanap ng ibang batayang lalong matibay 
	kailan pa man at nadadawal.... Ang pinagbabatayang lakas ng mga pamahalaang 
	ukol sa nasasakop ay siyang pinakamahina sa lahat, sapagka't wala sa kanila 
	kundi nasa mabuting kalooban ng mga nasasakupan samantalang ibig kilalanin 
	ang gayon.... Ang batayang katwiran ay siyang inaakala kong lalong matibay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Itinaas ng 
	abogado ang ulo; ano! ang binatang iyon ay nangangahas tumutol at 
	makipagtalo sa kanya, siya, si <abbr>Gi</abbr>noong Pasta? Hindi pa lito sa 
	kanyang mabigkas na pangungusap?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Binata, 
	nararapat iwan sa isang dako ang mga hakang iyan, sapagka't mapanganib,--ang 
	hadlang ng manananggol na inginiwi ang mukha--Ang sinasabi ko sa inyo ay 
	dapat na bayaang gumawa ang pamahalaan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	pamahalaan ay itinatag upang ikagaling ng mga bayan, at upang makatupad ng 
	lubos sa layunin niya ay dapat umalinsunod sa kahilingan ng mga namamayan na 
	siyang lalong nakababatid ng kanilang mga kailangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	bumubuo ng pamahalaan ay mga mamamayan din at yaong mga may lalong 
	kasapatan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit sa 
	dahilang sila'y tao, ay maaaring magkamali, at hindi nararapat na huwag 
	pansinin ang sa ibang haka.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dapat 
	magtiwala sa kanila, ibibigay nilang lahat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May isang 
	sawikaing likas na kastila, na ang sabiy: ang hindi umiiyak ay hindi 
	nakasususo. Ang hindi hinihingi ay hindi ipinagkakaloob.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Baliktad!--ang 
	sagot ng abogado na tumawang pakutya--sa pamahalaan ay pasaliwa ang 
	nangyayari......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y 
	biglang napahinto na wariy nakapag-wika ng higit sa nararapat at tinangkang 
	gamutin ang kanyang pagkabulalas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pinagkalooban 
	tayo ng pamahalaan ng mga bagay na hindi natin hiniling, ni hindi natin 
	mahihiling.... sapagka't ang paghiling.... ang paghiling ay nagpapakilalang 
	may pagkukulang at dahil doon ay hindi gumaganap sa kanyang katungkulan.... 
	pagpayuhan siya ng isang paraan, tangkaing ibunsod siya, huwag nang siya'y 
	tunggaliin, ay isang pagsasapantahang siya'y mangyayaring mamali, at sinabi 
	ko na nga sa inyong ang mga gayong paghahaka'y laban sa kabuhayan ng mga 
	pamahalaang ukol sa nasasakop.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang bagay na ito'y hindi batid ng 
	karamihan at hindi alam ng mga binatang nagdadalosdalos, hindi nila kilala, 
	ayaw kilalanin ang lubhang kaibayong ibubunga ng paghingi.... ang kasagwaang 
	taglay ng panukalang iyan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipagpatawad 
	po ninyo--ang putol ni Isagani na namuhi sa mga pangangatwirang ginamit sa 
	kanya ng abogado--pag sa makatwirang paraan ang isang bayan ay humihingi ng 
	ano man sa isang pamahalaan ay sapagka't inaakalang mabuti at nalalaang 
	pagkalooban siya ng isang kabutihan, at ang kagagawang ito, ay hindi dapat 
	makamuhi sa kanya kundi bagkus pa ngang dapat makagalak; humihingi sa ina, 
	sa inainahan ay hindi, magpakailan man. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang pamahalaan sa ganang pahat kong 
	pag-aakala, ay hindi isang may laganap na paningin na nakikita't 
	napaglalaanan ang lahat ng bagay, at kahit na maging gayon, ay hindi 
	mangyayaring mamuhi, sapagka't naririyan ang Pananampalataya na walang 
	ginagawa kundi maghihingi sa&nbsp; Diyos&nbsp; na nakakikita at nakakikilala ng lahat ng 
	bagay, at kayo man ay humihingi at humihiling ng maraming bagay sa mga 
	hukuman ng pamahalaan ding iyan, at ni ang&nbsp; Diyos , ni ang pamahalaan hanggang 
	sa ngayon ay hindi pa nagpapahalata ng kamuhian. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nasa sa budhi ng lahat na 
	ang pamahalaan, dahil sa siya'y itinatag ng mga tao, ay nangangailangan ng 
	tulong ng iba, nangangailangang ipakita at iparamdam sa kanya ang katunayan 
	ng mga bagay bagay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Kayo na sa sarili ay hindi naniniwalang lubos sa 
	katotohanan ng inyong mga ikinatwiran. Kayo sa sarili'y alam ninyong marahas 
	at di natutungtong sa matuwid ang pamahalaan, na, upang makapagparangal ng 
	kalakasan at pagkamapagsarili, ay nagkakait ng lahat ng bagay sa katakutan o 
	sa kakulangang tiwala, at ang mga bayan lamang na dinadahas at inaalipin ay 
	siya lamang may katungkulang huwag humingi ng kahit ano magpakailan man. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang isang bayang nasusuklam sa kanyang pamahalaan ay walang dapat hilingin 
	dito kundi ang iwan ang pamamahala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang matandang 
	abogado ay ngumingiwi at pinaiiling-iling ang ulo, tanda ng di kasiyahang 
	loob at hinahaplos ng kamay ang kanyang upaw; pagkatapos, sa isang 
	pananalitang mapag-ampon na wariy may pagkahabag ay nagsabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hm! masamang 
	aral iyan, masamang palagay, hm! Napagkikilalang kayo'y bata at wala pa 
	kayong pagkatalos sa ukol sa kabuhayan! Tingnan ninyo ang nangyayari sa 
	Madrid sa mga binatang walang muwang na humihingi ng maraming pagbabago: 
	lahat sila'y pinararatangang mga nag-uusig ng paghiwalay, marami ang hindi 
	makapangahas na umuwi, ngunit gayon man ay ano ang kanilang mga hinihingi? 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Mga banal na bagay, matatanda na't hindi makasasama sapagka't lubos nang 
	kilala.... Datapwa'y may mga bagay na hindi ko maipaliliwanag sa inyo, mga 
	lubhang maselang.... siya.... ipinagtatapat ko sa inyong may iba pang 
	katwiran, bukod sa mga tinuran na, na naguudyok sa isang matinong pamahalaan 
	upang kailan man ay huwag dumingig sa mga kahilingan ng isang bayan...... 
	hindi.... mangyayari ding makatagpo tayo ng mga pinunong palalo at mahangin 
	ang.... ngunit mayroon ding ibang katwiran.... kahit na ang hinihingi ay 
	yaong lalong nararapat.... ang mga pamahalaan ay may iba ibang palakad......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	At ang matanda&#39;y nag-aalinlangang nakatitig kay Isagani, at pagkatapos ay 
	tumalaga na sa isang bagay, ikinumpay ang kamay na wariy may inilalayong 
	paghahaka sa kanyang pag-iisip.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nahuhulaan ko 
	ang inyong ibig sabihin--ang patuloy ni Isagani na ngumiting malungkot--ibig 
	ninyong sabihin na ang pamahalaang ukol sa nasasakupan, yamang natatatag ng 
	hindi lubos na wasto at sa dahilang nananangan sa mga palapalagay......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi, hindi, 
	hindi iyan, hindi!--ang biglang hadlang ng matanda na nagpakunwaring may 
	hinahanap sa kanyang mga papel--hindi, ang ibig kong sabihin.... ngunit 
	nasaan kaya ang aking salamin sa mata?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hayan po--ani 
	Isagani.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinama ni
	<abbr>Gi</abbr>noong Pasta ang kanyang salamin, waring may binasang ilang 
	kasulatan, at ng makitang inaantay siya ng binata ay nagwikang pautal-utal:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May ibig 
	akong sabihing isang bagay.... ibig kong sabihin, ngunit nakalimutan ko 
	na.... kayo sa inyong kapusukan, ay pinigil ninyo ako.... isang bagay na 
	walang malaking kabuluhan.... Kung alam lamang ninyo kung papaano ang ulo 
	ko, napakarami kasi ng aking gagawin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naramdaman ni 
	Isaganing siya'y iniaaboy na.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	gayon,--ang sabing sabay tindig--kami ay......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ah!.... 
	mabuti pang bayaan na ninyo sa kamay ng pamahalaan ang bagay na iyan; siya 
	na ang bahalang magpapasiya diyan ng alinsunod sa kanyang maibigan.... 
	Sinasabi ninyong ang Vice-Rector ay laban sa pagtuturo ng wikang kastila, 
	marahil nga'y gayon, ngunit hindi sa panukala kundi sa paraan ng panukalang 
	iyan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sinasabing ang Rector na paparito ay may dalang panukalang pagbabago 
	ng pagtuturo.... magantay kayo ng kaunti, bigyan ninyo ng panahon ang 
	panahon, mangagaral kayo, sapagka't nalalapit na ang
	<i xml:lang="es" lang="es">examen</i> at putris yata! kayong mabuti nang 
	magwikang kastila at maluwag na magsalita ano't nakikihimasok pa sa gulo? 
	ano pa ang hangad ninyong bukod na ituro? Matitiyak na si Padre Florentino 
	ay kaisa ko sa pasiya! Ipakikumusta ninyo......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kailan pa man 
	ay kabilinbilinan sa akin ng aking amain--ang sagot ni Isagani--na alalahanin 
	ko ang iba gaya ng pag-aalaala ko sa sarili.... hindi ako naparito ng dahil 
	sa akin, naparito ako sa ngalan ng mga nasa sa kalagayang lalo pang aba.....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A, putris! 
	gawin nila ang ginawa ninyo, sunugin nila ang kanilang kilay sa pag-aaral at 
	maging upawin silang gaya ko sa pagsasaulo ng buo buong salaysay.... At 
	inaakala kong kung kaya kayo nakapagsasalita ng wikang kastila ay sapagka't 
	pinag-aralan ninyo; kayo'y hindi taga Maynila ni anak ng kastila! Pag-aralan 
	nila ang pinag-aralan ninyo at gawin nila ang ginawa ko.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ako'y naging 
	alila ng lahat ng prayle, ipinagluto ko sila ng <i xml:lang="es" lang="es">
	chocolate</i>, at samantalang ang kanan ko'y ipinanghahalo sa <i>batidor</i> 
	ay pigil ko sa kaliwa ang gramatika, nag-aaral ako at, salamat na lamang sa&nbsp; 
	Diyos , hindi ako nagkailangan ng iba pang mga guro, ni iba pang akademia, ni 
	mga pahintulot ng pamahalaan.... Paniwalaan ninyo ako; ang ibig na mag-aral 
	ay nakapag-aaral at natututo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ilan 
	na sa mga ibig na matuto ang makaaabot sa inabot ninyo? Isa sa isang libo, 
	at yaon pa man!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Psch! at ano 
	pa ang kailangan ng higit pa roon?--ang sagot ng matanda na ikinibit ang 
	balikat--Ang mga abogado'y labis na, ang maramiy pumapasok na lamang na taga 
	sulat. Mga mediko? sila sila'y nagmumurahan, nag-uupasalaan at 
	nagkakamatayan dahil sa pag-aagawan sa isang gagamutin.... Bisig, ginoo, ang 
	kailangan natin ay bisig na ukol sa pagtatanim!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakilala ni 
	Isagani na nag-aaksaya siya ng panahon, ngunit tumugon:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tunay nga--ang 
	sagot--maraming abogado at mediko, ngunit hindi ko masasabing lumalabis, 
	sapagka't mayroon tayong mga bayang wala ng isa man sa kanila; ngunit kung 
	marami man sa bilang, marahil ay kulang sa mabuti. At yayamang hindi 
	mapipigil na mag-aral ang kabataan at dito'y wala na namang ibang
	<i xml:lang="es" lang="es">carrera</i> bakit babayaang masayang ang kanilang 
	panahon at pagsisikap? Kung ang kasiraan ng pagtuturo ay hindi makahadlang 
	na ang maramiy maging abogado o mediko, kung tayo'y magkakaroon din lamang 
	bakit hindi pa mabubuti? </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At gayon man, kahit na ang nasa'y gawing lupain ng 
	mga manananim ang lupaing ito, isang lupain ng mga manggagawa sa lupa, at 
	patayin sa kanya ang lahat ng gawaing isip, ay hindi ko maunawa ang kasamaan 
	ng patalinuhin ang mga manananim at mga manggagawang lupang iyan, bigyan man 
	lamang sila ng isang pinag-aralang magpahintulot sa kanila, pagkatapos, na 
	mawasto at magwasto ng kanilang mga gawain, na ilagay baga sila sa 
	kalagayang mawatasan ang maraming bagay na hindi batid sa ngayon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah, bah, 
	bah!--ang bulalas ng abogado na ikinumpay ng palikawlikaw sa hangin ang kamay 
	na waring ibig bugawin ang mga paghahakang nabanggit--upang maging mabuting 
	mang-aani ay hindi kailangan ang maraming <i xml:lang="es" lang="es">
	retorica</i>. Pangarap, maling akala, buko ng pag-iisip! Siya! ibig baga 
	ninyong sumunod sa isang hatol?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tumindig, 
	masuyong ipinatong ang kamay sa balikat ng binata, at nagpatuloy:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bibigyan ko 
	kayo ng isang lubhang mabuti, sapagka't nakikita kong kayo'y matalino at ang 
	hatol ay hindi mapapagayon lamang. Magaaral kayo ng panggagamot? Kung gayon 
	ay magkasiya kayo sa pag-aaral ng kung papaano ang paglalagay ng tapal at 
	pagpapasigid ng linta at huwag ninyong panghimasukan ang pagpapabuti o 
	pagpapasama ng kalagayan ng inyong kapwa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pag kayo'y
	<i xml:lang="es" lang="es">licenciado</i> na, ay mag-asawa kayo sa isang 
	dalagang mayaman at mapanata, pagpilitan ninyo ang makapanggamot at 
	makasingil na mabuti, layuan ninyo ang lahat ng bagay na may pakialam sa 
	kalagayan ng bayan, magsisimba kayo, magkumpisal at makinabang pag ang iba'y 
	gumagawa ng gayon, at makikita ninyong pagkatapos ay pasasalamat kayo sa 
	akin at ang gayo'y makikita ko kung ako'y buhay pa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Palagi ninyong 
	aalalahanin na ang lalong wastong paglingap ay ang lingapin muna ang sarili; 
	walang dapat hanapin ang tao sa mundo kundi ang lalong malaking kaligayahan 
	ng kanyang sarili, gaya ng sabi ni <span xml:lang="en" lang="en">Bentham</span>; 
	pag kayo'y nanghimasok sa mga kaululan, ay hindi kayo magkakaroon ng
	<i xml:lang="es" lang="es">carrera</i>, ni hindi kayo magkakaasawa, ni hindi 
	kayo magiging anuman. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Pag-iiwananan kayo ng lahat at ang una unang magtatawa 
	sa inyong kalinisang ugali ay ang inyo ring mga kababayan. Maniwala kayo sa 
	akin, ako'y maaalaala din ninyo at sasabihin ninyong may katwiran ako pag 
	kayo'y nagkaroon na ng ubang kagaya ko, mga ubang kagaya nito!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At hinipo ang 
	iilan niyang buhok na puti ng matandang abogado na ngumiti ng malungkot at 
	iniling-iling ang ulo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag nagkaroon 
	na ako ng mga ganyang uban, ginoo,--ang sagot na malungkot din ni Isagani--at 
	pag inilingon ko ang aking paningin sa nakaraan at makita kong wala akong 
	ginawa kundi ang ukol sa sarili, na hindi ginawa ang mangyayaring gawin at 
	dapat kong gawing ukol sa bayang nagbigay sa akin ng lahat ng bagay, ukol sa 
	mga namamayang tumutulong sa aking kabuhayan, ang bawa't uban ay magiging 
	isang tinik sa akin, at hindi ko sila ikadadangal kundi bagkus ikahihiya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At masabi ito 
	ay yumuko at umalis.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napatigil ang 
	abogado sa kanyang kinalalagyan, na ang mata'y susulingsuling. Nadinig ang 
	mga yabag na lumalayong unti-unti at muling umupo na bumubulong:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaawang 
	binata! Ang mga ganyan ding haka ay sumagi isang araw sa aking pag-iisip! 
	Maanong ang lahat ay makapagsabing: ginawa ko ito ng dahil sa aking bayan, 
	iniuukol ko ang aking buhay sa ikabubuti ng lahat....? Putong na laurel, na 
	pigta ng katas ng kamansa, mga dahong tuyo na nagkakanlong ng mga tinik at 
	mga uod! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Hindi iyan ang kabuhayan, iyan ay hindi nagbibigay ng kakanin, ni 
	hindi nagdudulot ng karangalan; ang mga laurel ay bahagya nang magamit sa 
	isang sawsawan.... ni hindi nagbibigay ng katiwasayan.... ni hindi 
	nagpapanalo ng mga usap, kundi tiwali pa nga! Ang bawa't bayan ay may 
	kanyang hilig, gaya rin ng kanyang singaw ng lupa at kanyang mga sakit, na 
	iba sa singaw ng lupa at mga sakit ng ibang bayan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At idinugtong 
	pagkatapos:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaawaawang 
	binata!.... Kung ang lahat sana'y nag-iisip at gumagawa ng gaya niya, ay 
	hindi ko sinasabing hindi.... Kaawaawang binata! Kaawaawang Florentino!</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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