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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXVIII. Tatakot</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Naging parang 
	manghuhula si Ben-Zayb nang patunayan sa kanyang pamahayagan, ng mga 
	nakaraang araw, na ang pag-papaaral ay masama, lubhang makasasama sa 
	Kapuluang Pilipinas: ngayon, sa harap ng mga nangyari niyong araw ng biernes 
	ng mga paskin, ay nangakak ang manunulat at inaawit ang kanyang 
	pagtatagumpay, at pinapangliit at nilito ang kanyang kalabang si
	<i xml:lang="en" lang="en">Horatius</i> na nangahas na kutyain siya sa 
	tudling ng <i xml:lang="es" lang="es">Pirotecnia</i> sa ganitong paraan:</font></p>
	<blockquote class="article">
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa aming 
		kapamahayagang <i xml:lang="es" lang="es">El Grito</i>:</font></p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
		&#39;Ang pagpapaaral ay masama, lubhang makasasama sa Pilipinas!&#39;</font></p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">&nbsp;</p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nalinawan 
		na namin.</font></p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Malaon 
		nang inaakala ng <i xml:lang="es" lang="es">El Grito</i> na 
		kinakatawan niya ang bayang pilipino; <i xml:lang="la" lang="la">ergo</i>........ 
		gaya nang wiwikain ni Fray&nbsp;Iba&ntilde;ez, kung marunong nang latin.</font></p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">&nbsp;</p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit si 
		Fray Iba&ntilde;ez ay nagiging musulman kapag sumusulat, at alam natin kung 
		papano ang ginagawa nang ma&ntilde;ga musulman sa pagpapaaral.</font></p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify">&nbsp;</p>
		<p style="margin-left: 40px; margin-right: 80px; margin-top:0; margin-bottom:0" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
		<i xml:lang="es" lang="es">Testiga</i>, gaya nang sabi nang isang 
		maalindog na <i xml:lang="es" lang="es">predicador</i>, ang aklatan sa 
		Alejandria!</font></p>
	</blockquote>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngayon ay may 
	katwiran siya, si Ben-Zayb! Sa siya ang tanging nag-iisip sa Pilipinas, ang 
	tanging nakahuhula ng mga mangyayari!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kaya nga, ang 
	balitang nakakuha ng mga pasking masasagwa ang sinasabi sa mga pinto ng 
	Universidad, ay hindi lamang nakapag-alis ng gutom sa marami at nakasira ng 
	tiyan sa iba, kundi nakapagpagulo rin sa mga mahinahong intsik, na hindi 
	nakapangahas na maupo sa kanilang mga tindahan na nakataas ang isang paa na 
	gaya ng kaugalian, sa takot na baka sila gahulin sa pag-uunat upang tumakbo. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang ika labing-isa ng umaga, kahit na patuloy ang araw sa kanyang lakad at 
	ang Marilag, ang Capitan General, ay hindi lumalabas na nangunguna sa 
	kanyang mga mapagwaging kabig, ay naglalo pa mandin ang ligalig: ang mga 
	prayleng laging pumaparoon sa tindahan ni Quiroga ay hindi nangasisipot at 
	ang bagay na ito'y nagsasabing may mga kakilakilabot na mangyayari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kung ang 
	araw ay parisukat sana ng sumilang at ang mga Kristo ay mga nakapantalon, ay 
	hindi marahil makabakla kay Quiroga na di gaya noon: inari niyang <i>liampo</i> 
	marahil ang araw at ang mga santong larawan ay mga manglalaro ng
	<i xml:lang="es" lang="es">chapdiqui</i> na nangahubaran; ngunit ang hindi 
	pagsipot ng mga prayle na nataon pa naman sa pagtanggap niya ng mga bagong 
	bagay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa bilin ng 
	isang <i xml:lang="es" lang="es">provincial</i> na kaibigan niya, ay 
	ipinagbawal ni Quiroga sa kanyang mga bahay na pinaglalaruan ng <i>liampo</i> 
	at <i>chapdiki</i> ang pagpasok ng sino mang indio na hindi dating kilala; 
	ang magiging konsul ng intsik ay nangangambang baka nakawin ang salaping 
	ipinatatalo roon ng mga mahihirap. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Matapos na maihanda ang kanyang tindahan 
	na mangyayaring biglang ilapat ang mga pinto sa isang sandali, ay napaabay 
	sa isang bantay na <i xml:lang="es" lang="es">veterana</i> sa maikling 
	pag-itan ng bahay ni Simoun sa kanyang bahay. Inakala ni Quiroga na iyon ang 
	sandaling lalong kapit upang gamitin ang mga baril at punglo na nasa kanyang 
	imbakan, alinsunod sa paraang sinabi sa kanya ng manghihiyas: maaasahang sa 
	mga araw na susunod ay ipag-uutos ang paghalughog sa mga bahaybahay at sa 
	gayo'y gaano ang mabibilanggo, gaano ang taong sa katakutan ay hindi 
	ibibigay ang lahat ng naiimpok! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Yaon ang paraan ng mga dating
	<i xml:lang="es" lang="es">carabinero</i>, na nagsusulot sa mga silong ng 
	bahay ng mga tabako at dahong ipinagbabawal, pagkatapos ay magpapakunwaring 
	manghahalughog at pipilitin ang kahabaghabag na may bahay na sumuhol o 
	magmulta! Ang kaibhan nga lamang ay sa dahilang lalong naaayos ang paraan, 
	at sa dahilang hindi na pigil ang tabako ay ang mga armas na bawal naman ang 
	ginagamit sa ngayon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit si 
	Simoun ay ayaw makipagkita sa kanino man at ipinasabi kay intsik Quiroga na 
	bayaan sa pagkakalagay ang mga bagay na iyon, kaya't tinungo ng intsik si
	Don Custodio upang itanong kung nararapat o hindi nararapat 
	balutihan ang kanyang tindahan, ngunit si Don Custodio man ay 
	ayaw ring tumanggap ng dalaw: kasalukuyang pinag-aaralan ang isang 
	munakalang ukol sa pagtatanggol, sakaling siya'y makubkob ng kalaban. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Naalaala si Ben-Zayb upang hingan ng balita; ngunit nang matagpuang 
	nakabaluti mula sa ulo hanggang paa at dalawang rebolber ang ginagamit na 
	pabigat sa mga papel ay dalidaling nagpaalam si Quiroga at umuwi sa kanyang 
	bahay, at nahigang dinahilan na masama daw ang kanyang katawan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang ika apat 
	ng hapon ay hindi na mga paskin lamang ang sang-usap-usapan. Umalingawngaw 
	na ang mga nag-aaral at ang mga taga bundok <abbr>S.</abbr>&nbsp;Mateo ay 
	nangagkakaalam; pinatitibayang pinagsumpaanan sa isang magpapansit na 
	biglang lulusubin ang Maynila; nabanggit ang mga pangdigmang dagat ng mga 
	aleman, na nasa sa labas ng dagat Maynila, na tutulong sa kilusan; isang 
	pulutong na kabinataan ang umano'y tumungo sa Malakanyang upang humandog sa 
	General, na ang dinahilan ay ang pagtutol sa kagagawan at ang kanilang 
	pagkamakakastila, ngunit ipinapiit na lahat sapagka't nakitang mga batbat 
	ng sandata. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Iniligtas ng kalawingi ang General, na pinigil na matanggap 
	yaong mga batangbata pa'y taksil na, dahil sa noon ay nakikipag-usap sa mga 
	Provincial, sa Vice Rector at kay Padre Irene, na kinatawan ni
	Padre Salvi. May katunayan ang mga alingawngaw na ito kung 
	paniniwalaan natin si Padre Irene, na dumalaw ng hapong iyon kay 
	Kapitan&nbsp;Tiago. Alinsunod sa kanya, ay may mga taong nag-uudyok sa Capitan 
	General na samantalahin ang pangyayaring yaon upang takutin at bigyan na ng 
	isang mabuting aral ang mga binatang pilibustero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Barilin ang 
	ilan--anang isa--mga dalawampu't apat na makabago na ipadalang agad sa 
	tatapunan at sa gitna ng katahimikan ng gabi, ay makaaapula na ng lubusan sa 
	sigabo ng kalooban ng mga walang kasiyahang loob!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag,--ang 
	tugon ng isang may mabuting puso,--sukat nang ang mga kawal ay palibutin sa 
	mga lansangan, ang batallon ng mga kabayuhan sa halimbawa, na mga bunot ang 
	sable; sukat nang kaladkarin ang ilang kanyon.... sukat na iyon! Ang bayan 
	ay napakamatatakutin at ang lahat ay mangagsisipasok sa kanikanilang bahay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag, 
	huwag,--ang palagay ng isa,--ito ang panahong kapit upang pawiin ang kalaban; 
	hindi sukat ang mangagsipasok sa kanilang pamamahay, kailangang palabasin, 
	na gaya ng masasamang singaw, sa pamagitan ng mga parapit. Kung hindi 
	mangakapangahas na gumawa ng gulo, ay dapat na sila'y udyukan sa tulong ng 
	mga sugong hahamon.... Inaakala kong ang nararapat ay ihanda ang mga kawal 
	at magkunwaring nagpapabaya at nagwawalang bahala, upang mangagsitapang at 
	pangyayari ng anumang kaguluhan ay piyapisin na nang buong tindi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang layon ay 
	siyang nagbibigay katuturan sa mga paraan,--ang sabi ng isa pa,--ang layon 
	natin ay ang ating banal na Relihion at ang katibayan ng Inang bayan. Ihayag 
	ang <i xml:lang="es" lang="es">estado de sitio</i>, at sa anumang munting 
	kaguluhan ay paghulihin ang mga mayayaman at mga marurunong.... at linisin 
	ang bayan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung hindi 
	ako dumating sa panahon upang pagpayuhan ng pagdadahandahan--ang dugtong ni
	Padre Irene, na ang hinarap ay si Kapitan&nbsp;Tiago,--ay tiyak nang 
	umaagos ngayon ang dugo sa mga lansangan. Ang naaalaala ko ay kayo, 
	kapitan.... Ang pangkat ng mga masisidhi ay walang napalang gaano sa 
	General, kaya't nanganghihinayang dahil sa pagkawala ni Simoun.... Ah! kung 
	hindi nagkasakit si Simoun....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang pagkahuli 
	kay Basilio at ang paghalughog na ginawa pagkatapos sa kanyang mga aklat at 
	mga papel, ay nakapagpalubhang lalo kay Kapitan&nbsp;Tiago. Ngayo'y dinagdagan 
	pa ni Padre Irene ang kanyang sindak sa pagsasalaysay ng mga bagay 
	na nakapangingilabot. Ang kahabaghabag ay pinasukan ng isang matinding 
	pagkatakot na nahalata muna dahil sa isang mahinang panginginig, na 
	unti-unting lumalakas hanggang sa siya'y hindi na nakapangusap. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nangakadilat ang mga mata, pawisan ang noo, pumigil sa bisig ni Padre Irene, 
	nagtangkang bumangon; ngunit hindi mangyari at matapos na makaungol ng 
	makalawa ay biglang bumagsak sa ibabaw ng unan. Nangakadilat ang mata ni 
	Kapitan&nbsp;Tiago at sumasago ang laway: patay na. Sa pagkasindak ni Padre &nbsp;Irene 
	ay tumakbo, ngunit sa dahilang kumapit sa kanya ang patay ay nakaladkad 
	niya at napaalis sa hihigan sa kanyang pagtakas, at naiwan sa gitna ng 
	silid.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinagabihan ay umabot na sa lalong sidhi ang katakutan. May ilang pangyayari 
	na nag-udyok sa mga matatakutin sa paniniwalang mayroong mga sugong 
	nanghahamon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa isang 
	binyagan, ay naghagis ng kaunting kuwarta sa mga bata at sukat nang maasahan 
	na nagkaroon ng kaunting kaguluhan sa pinto ng simbahan. Nataon namang 
	naparaan doon ang isang mabalasik na militar, na may iniisip mandin, na 
	inakalang ang kaguluhan ay isa nang pagsalakay ng mga pilibustero, kaya't 
	piniyapis ng sable ang mga bata, pumasok sa simbahan, at kung hindi 
	nagkasalasalabid sa tabing na nakasabit sa <i xml:lang="es" lang="es">coro</i> 
	ay pinagpupugutan sana ng ulo ang lahat ng naroon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Makita ang gayon ng mga 
	matatakutin at magpanakbuhang ipinamamalita na ang himagsikan ay magsisimula 
	na, ay bagay na nangyari sa isang sandali. Daglidagling nagsarahan ang mga 
	pinto ng mangilan-ngilang tindang naiiwang bukas, may mga intsik na nakaiwan 
	sa labas ng mga piesa ng kayo, at hindi kakaunting babae ang nawalan ng 
	sinelas dahil sa pagtakbo sa mga lansangan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Salamat na lamang at iisa ang 
	nasugatan at ilan ang nasaktan, na isa na nga sa kanila ang militar nang 
	masubasob dahil sa pakikipagtunggali sa tabing na may amoy balabal ng 
	pilibusterismo. Ang gayong kabayanihan ay nagbigay sa kanya ng kabunyian, at 
	isang kabunyiang malinis, na hari na ngang ang lahat ng kabantugan ay makuha 
	sa gayong paraan! ang mga ina'y hindi na lubhang iiyak at lalo pa sanang 
	marami ang tao sa mundo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa isang 
	arrabal ay nakakita, ang mga naninirahan doon, ng dalawa kataong nagbabaon 
	ng armas sa silong ng isang bahay na tabla. Nagulo ang nayon; tinangka ng 
	mga naninirahan na habulin ang dalawang taong iyon na hindi kilala upang 
	patayin at iharap sa mga may kapangyarihan, ngunit sinawata sila ng isang 
	kapit-bahay at sinabing sukat na ang iharap sa tribunal ang sanhi ng 
	kasalanan. Saka ang mga armas naman ay matatandang baril na tiyak na 
	makasusugat sa magtangkang gumamit noon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya!--ang 
	sabi ng isang matapang--kung ibig na tayo'y manghimagsik ay sulong!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	matapang ay nilambanog ng palo at suntok, pinagkukurot ng mga babae na 
	waring siya ang may ari ng mga baril.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa Ermita ay 
	lalong mahigpit ang nangyari, kahit hindi lubhang nabalita, gayong 
	nagkaroon pa ng putukan. Isang kawaning napakamaingat na nagbaluting mabuti 
	ay nakakita, nang magtatakip-silim, ng isang bulto sa kalapit ng kanyang 
	bahay; inakala na niyang buongbuo na yaon ay isang nag-aaral, kaya't 
	pinaputukan ng dalawang putok ng rebolber. Nang makita ang bulto pagkatapos 
	ay isa palang beterana, kaya't inilibing at, <i xml:lang="la" lang="la">pax 
	Christi! Mutis!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa Dulungbayan 
	ay umugong din ang ilang putok na ang napatay ay isang kaawaawang matandang 
	bingi na hindi nakadinig sa <i xml:lang="es" lang="es">quien vive</i> ng 
	bantay, at isang baboy na nakadinig ngunit hindi sumagot ng <i>Espa&ntilde;a</i>. 
	Ang matanda'y hindi nailibing kaagad sapagka't walang maibayad sa simbahan, 
	at ang baboy ay pinagkainanan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa loob ng 
	Maynila, sa isang tindahan ng matamis na kalapit ng Unibersidad, na laging 
	dinadayo ng mga nag-aaral, ay pinag-uusapan ang mga pagkakahulihan, sa 
	ganitong ayos:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Ya 
	cogi ba con Tadeo?</span>--ang tanong ng babaeng may ari ng tindahan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Aba, 
	&ntilde;ora</span>,--ang sagot ng isang nag-aaral na natitira sa Parian,--<span class="locked"><i xml:lang="es" lang="es">pusilau 
	ya!</i></span></font></p>
	<p xml:lang="es" lang="es" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--Pusilau! Naku! 
	No pa ta paga conmigo su deuda.</font></p>
	<p xml:lang="es" lang="es" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--Ay! no jabla vos 
	puelte, &ntilde;ora, baka pa de queda vos complice. Ya quema yo nga el libro que ya 
	dale prestau conmigo! Baka pa de riquisa y de encontra! anda vos listo, 
	&ntilde;ora!</font></p>
	<p xml:lang="es" lang="es" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--Ta queda dice 
	preso Isagani?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Loco-loco 
	tambien aquel Isagani</span>,--ang sabing namumuhi ng nag-aaral;--<span xml:lang="es" lang="es">no 
	sana de cogi con ele, ta anda pa presenta! Oh, bueno nga, que topa rayo con 
	ele! Siguro pusilau!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kinibit ng 
	babae ang balikat.</font></p>
	<p xml:lang="es" lang="es" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--Conmigo no ta 
	debi nada! Y cosa de jase Paulita?</font></p>
	<p xml:lang="es" lang="es" style="margin-left: 80px; margin-right: 80px" align="justify">
	<font style="font-size: 13pt" face="Arial" color="#333333">--No di falta 
	novio, &ntilde;ora. Siguro de llora un poco, luego de casa con un espa&ntilde;ol.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang gabing 
	iyon ay naging isa sa mga lalong malulungkot. Sa mga bahaybahay ay 
	nagdadasal ng rosario at may mga maawaing babaeng nagpapatungkol na ng 
	mahahabang <i xml:lang="es" lang="es">padrenuestro</i> at mga
	<i xml:lang="la" lang="la">requiem</i> sa kaluluwa ng mga kamag-anak nila't 
	kaibigan. Ika walo pa lamang ng gabiy bahagya nang makakita ng 
	mangisangisang naglalakad; maminsan minsan ay nakakadinig ng takbo ng isang 
	kabayo na ang tagiliran ay napapalong malakas ng isang sable, pagkatapos ay 
	pasuwit ng mga tanod, mga sasakyang matutulin ang takbo na waring hinahabol 
	ng kawan ng mga pilibustero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, 
	hindi sa lahat ng pook ay naghahari ang pangamba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa plateriang 
	tinitirahan ni Placido Penitente ay pinag-uusapan din ang mga pangyayari at 
	pinagtatalunan nang may kaunting laya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ako 
	naniniwala sa mga paskin!--ang sabi ng isang manggagawang payat at tuyo na sa 
	kagagamit ng tsukoy;--sa ganang akin, ay kagagawan iyan ni Padre Salvi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ehem, 
	ehem!--ang ubo ng maestro platero na, sa pangingilag na panganlang duwag, ay 
	hindi makapangahas na putlin ang pag-uusap. Ang kaawaawang tao'y nag-uuubo 
	na lamang, kikindatan ang manggagawa at titingin sa daan, na waring ibig 
	sabihin na:--Baka tayo masubukan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dahil sa 
	opereta!--ang patuloy ng manggagawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Oho!,--ang 
	bulalas ng isang mukhang tanga;--sinasabi ko na nga! Kaya't....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hm!--ang tugon 
	ng isang tagasulat na may anyong pagkahabag,--ang ukol sa mga paskin ay 
	totoo, Chichoy, ngunit ipaliliwanag ko sa iyo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At idinugtong 
	na ang tinig ay matalinghaga:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Yaon ay isang 
	kagagawan ni intsik Quiroga!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ehem, 
	ehem!--ang ulit na ubo ng maestro na inilipat sa kabilang pisngi ang sapa ng 
	hitsong nasa bibig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Paniwalaan mo 
	ako, Chichoy, kagagawan ni intsik Quiroga iyan! Nadinig ko sa aking 
	pinapasukan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naku, <em>
	siguro</em> nga!--ang bulalas ng tanga, na agad nang naniwala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si 
	Quiroga--ang patuloy ng tagasulat,--ay may isang daang libong pisong pilak 
	mehikano, sa <i xml:lang="es" lang="es">bahia</i>. Papano ang pagpapasok? 
	Hindi maliwag; ginawa ang mga paskin, na sinamantala ang usap ng mga 
	nag-aaral, at samantalang ang lahat ng tao'y nagugulo, pum! pinadulasan ang 
	mga kawani at nakaraan ang mga kaha!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya nga, 
	siya nga!--ang bulalas ng mapaniwalain na sumuntok sa ibabaw ng dulang.--Siya 
	nga! Kaya pala si intsik Quiroga...... Kaya!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At napahinto 
	dahil sa hindi maalaman kung ano ang sasabihing ukol kay intsik Quiroga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At tayo ang 
	magbabayad ng kanilang kagagawan?--ang tanong ni Chichoy na nagagalit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ehem, ehem, 
	ehhhem!--ang ubo ng platero na nakadinig ng lumalapit na yabag sa daan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga, ang 
	mga yabag ay lumalapit at nangagsihinto ang mga sa loob ng plateria.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si San 
	Pascual Bailon ay isang dakilang banal,--ang sabing malakas na pakunwaring 
	nagbabanalbanalan ang platero, na kinindatan ang iba;--si San&nbsp;Pascual 
	Bailon....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang sandaling 
	iyon ay dumungaw ang mukha ni Placido Penitente, na kasama ang manggagawa ng 
	kastillo na ating nakitang tumanggap ng utos kay Simoun. Linibid ng lahat 
	ang mga bagong dating at tinanong ng mga balibalita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ko 
	nakausap ang mga bilanggo--ang tugon ni Placido,--may mga <span class="locked">
	tatlong pu!</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mangagsihanda 
	kayo!--ang dugtong ng magkakastillo na nakipagsulyapan ng may kahulugan kay 
	Placido,--sinasabing sa gabing ito'y magkakaroon ng katakot-takot na 
	pugutan......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ha? 
	Lintik!--ang bulalas ni Chichoy, na lumingap ng sandata, ngunit nang walang 
	makita, ay sinunggaban ang kanyang tsukoy.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang maestro ay 
	umupo; ang kanyang mga paa'y nangangalog. Nakinikinita nang mapaniwalain na 
	ang ulo niya'y pugot, at umiiyak na dahil sa mangyayari sa kanyang kaanak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--She!--ang sabi 
	ng taga-sulat;--hindi magkakaroon ng pugutan! Ang taga udyok ng--at humudyat 
	ng may kahulugan--ay salamat at may sakit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Si Simoun!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ehem, ehem, 
	ehhhem!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Placido at 
	ang magkakastillo ay muling nagtinginan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung iyan ay 
	hindi nagkasakit....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay gagawa ng 
	isang wariy himagsikan!--ang dugtong na pawalang bahala ng magkakastillo, 
	samantalang idinuduldol ang isang sigarilyo sa itaas ng tubo ng kinke--at ano 
	ang gagawin natin kung gayon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Totohanin na, 
	sapagka't yamang pupugutan na rin lamang tayo......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang malakas na 
	ubong sumasal sa platero ay nakapigil na madinig ang karugtong ng salita. 
	Marahil ay kakilakilabot na bagay ang pinagsabi ni Chichoy, sapagka't 
	umanyong mamamatay at ang mukha'y anyong hapon na papatay ng tao.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang sabihin 
	ninyo'y nagpapakunwaring may sakit sapagka't natatakot na lumabas! Kapag 
	nakita ko siya....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling sinasal 
	ng matinding ubo ang maestro at natuluyan nang pamanhikan ang lahat na 
	mangag-uwian.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Gayon man ay 
	humanda kayo, humanda kayo,--ang sabi ng magkakastillo--Kung pipilitin tayo sa 
	pumatay o mamatay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isa pang ubo 
	ang sumasal sa kaawaawang may pagawaan at ang mga manggagawa ay nangag-uwian 
	sa kanikanilang bahay na may dalang pamukpok, bandili at iba pang 
	kasangkapang maipang-iiwa o maipamamalo, at humandang ipaglabang mabuti ang 
	kanilang buhay. Si Placido at ang manggagawa ng kastillo ay muling 
	nagsialis.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag-iingat, 
	pag-iingat!--ang bilin ng maestro na ang tinig ay waring sa umiiyak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kayo na 
	lamang ang bahala sa aking balo at mga mauulilang anak!--ang samo ng 
	mapaniwalain na ang tinig ay lalo pa manding basag.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakikinikinita 
	na ng kahabaghabag na sa katawan niya'y lusutlusutan ang punlo at nalilibing 
	na siya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang gabing 
	yaon ay pinalitan ng mga artillerong kastila ang mga tanod sa mga pinto ng 
	loob ng Maynila, at nang kinabukasan, ng dumudungaw na ang mga unang 
	liwanag, si Ben-Zayb, na nangahas na maglakad upang tingnan ang kalagayan ng 
	mga kuta, ay nakatagpo sa <i xml:lang="es" lang="es">glacis</i> na malapit 
	sa Luneta ng bangkay ng isang india na magdadalaga, na, halos hubad at 
	nakabulagta roong nag-iisa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Ben-Zayb ay nalunusan at matapos na matangki 
	ng kanyang tungkod ang patay at makatingin ng tungo sa mga pinto, ay 
	ipinatuloy ang kanyang lakad, na iniisip na gumawa ng isang mapanimdim na 
	kabuhayan dahil sa pangyayaring yaon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon man, ni isang pahiwatig man 
	lamang ay walang lumabas sa mga pahayagan sa mga araw na sumusunod, na ang 
	inatupag ay ang mga pagkakadapa't pagkakadupilas na gawa ng mga balat ng 
	saging, at, sa dahilang walang maibalita, si Ben-Zayb man ay 
	nagpakaluritlurit sa pagsasalaysay ng isang dumaang bagyo sa Amerika, na 
	sumira sa mga bayan at nakamatay ng mahigit sa dalawang libo katao. Kasama 
	ng ilang pasaring ay sinabi niyang:</font></p>
	<blockquote class="article">
		<p style="margin-left: 40px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
		&#39;Ang 
		pagkamahabagin, <em class="smcap">NA LALONG BUHAY SA MGA BAYANG 
		KATOLIKO KAY SA IBANG BAYAN</em>, at ang alaala Niyong sa udyok din noon 
		ay naghirap dahil sa <em>sangkatauhan</em>, sa amin ay
		<span class="locked"><em>nagpakilos</em> (sic)</span> sa pagkahabag sa 
		ma&ntilde;ga kasawian nang ating kapwa at idala&ntilde;gin upang <em>sa lupaing</em> 
		ito, na salantangsalanta sa mga bagyo, ay huwag maulit ang mga 
		kasakitsakit na pangyayaring napagmasdan nang mga naninirahan sa 
		Estados Unidos.&#39;</font></p>
	</blockquote>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Hindi pinaraan 
	ni <i xml:lang="en" lang="en">Horatius</i> ang pagkakataon at hindi rin 
	tinukoy ang mga patay, ni ang kaawaawang indiang inutas, ni ang mga 
	kapaslangan, ay sinagot si Ben-Zayb sa kanyang <span class="locked">
	<i xml:lang="es" lang="es">Pirotecnia</i> ng:</span></font></p>
	<blockquote class="article">
		<p style="margin-left: 40px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
		&#39;Matapos 
		ang gayong karaming pagkahabag at pagli&ntilde;gap sa katauhan, si Fray&nbsp;Iba&ntilde;ez, 
		itong, si Ben-Zayb, ay nanira sa pagdala&ntilde;ging patungkol sa Pilipinas.</font></p>
		<p style="margin-left: 40px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">&Ntilde;gunit 
		maaaninawan ang gayon.</font></p>
		<p style="margin-left: 40px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sapagka't 
		hindi siya katoliko at ang pagkamahabagin ay lalong buhay, at <abbr>ibp.</abbr>&#39;</font></p>
	</blockquote>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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