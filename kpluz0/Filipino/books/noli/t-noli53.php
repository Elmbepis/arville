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
<title>Noli Me Tangere - Filipino sa KPluz.com</title>
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
								<td valign="bottom" >
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										Noli Me Tangere</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LIII. Ang Mabuting Araw ay Nakikilala sa Umaga</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Maagang kumalat sa bayan ang 
											balitang may nakitang mga ilaw sa 
											libingan ng gabing nakaraan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											May sinasabi ang puno ng V.O.T. 
											(Venerable Orden Terkera) na mga 
											kandilang may ilaw at kung paano ang 
											anyo at kung gaano ang kanilang mga 
											laki, datapuwa't ang hindi matukoy 
											ay ang bilang, nguni't may nabilang 
											siyang hanggang dalawampu. Hindi 
											dapat atimin ni hermana Sipa, na 
											kaanib sa Cofradia ng Santisimo 
											Rosario, na ang makapagyabang lamang 
											na nakakita ng biyaya ng Diyos na 
											ito'y ang isang na sa hermandad (kapatiran) 
											na kaaway. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sinabi naman ni hermana 
											Sipa, kahi't hindi malapit doon ang 
											kanyang tinatahanan, na siya'y 
											nakaringig ng mga daing at hibik, at 
											hanggang sa tila mandin kanyang 
											nakikilala ang tinig ng tanging mga 
											tao, na ng unang panaho'y kanyang 
											naka ..., datapuwa't alang-alang sa 
											pag-ibig sa kapwa taong atas sa 
											binyaga'y hindi lamang kanyang 
											pinatatawad, kung di naman kanyang 
											ipinananalangin at inililihim ang 
											kanilang mga pangalan, at dahil 
											dito'y pagdaka'y pinapagtitibay na 
											siya'y santa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi totoong matalas 
											ang tainga, ang katotohanan, ni 
											hermana Rufa, nguni't hindi dapat 
											tiisin niyang naringig ang bagay na 
											iyon ni hermana Sipa't siya'y hindi, 
											at dahil dito'y nanaginip siya at sa 
											kanya'y humarap ang maraming mga 
											kaluluwa, hindi lamang ng mga taong 
											patay na, kung di naman ng mga buhay; 
											hinihingi ng mga kaluluwang sila'y 
											bahaginan ng mga indulgenciang 
											kanyang maliwanag na itinatala't 
											pinakaiingatan. Masasabi niya ang 
											mga pangalan sa mga familiang 
											nangangailangan, at wala siyang 
											hinihingi kung di isang munting 
											limos upang isaklolo sa Papa, sa mga 
											pangangailangan nito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang batang ang hanap-buhay ay 
											mag-alaga ng mga hayop, na nangahas 
											magpatibay na wala siyang nakita 
											liban na lamang sa isang ilaw at 
											dalawang taong nangakasalakot, 
											nahirapang lubha upang makaligtas sa 
											mga hampas at mga lait. Nawalang 
											kabuluhang siya'y manumpa, na 
											kanyang kasama ang kanyang mga 
											kalabaw at sila ang makapagsasabi;</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Durunong ka pa sa mga kelador at sa 
											mga hermana,&nbsp;<i>parakmason,</i>&nbsp;hereje?--ang 
											siyang kanilang sinasabi sa kanya't 
											siya'y iniirapan nila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanhik ang kura sa pulpito at inulit 
											ang sermon tungkol sa purgatoryo, at 
											muli na namang lumabas ang mga 
											pipisohin sa kanikanilang 
											kinatataguan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't pabayaan natin muna ang mga 
											kaluluwang nangaghihirap, at 
											pakinggan natin ang salitaan ni don 
											Pilipo at ng matandang Tasio, na may 
											sakit at nag-iisa sa kanyang maliit 
											na bahay. Malaon nang hindi 
											bumabangon sa kanyang kinahihigaan 
											ang pilosopo o ulol, at nararatay 
											dahil sa isang panghihinang madali 
											ang paglubha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ayawan, sa katotohanan, kung 
											marapat ko kayong handugan ng 
											masayang bati dahil sa pagkatanggap 
											sa inyo ng inyong pagbibitiw ng 
											katungkulan; ng una, ng hindi 
											pakinggan ng&nbsp; buong&nbsp; kawalanghiyaan 
											ang palagay ng marami sa mga 
											nangagpupulong, sumasakatuwiran 
											kayong hingin ninyo ang pahintulot 
											na makapagbitiw kayo ng inyong 
											katungkulan; nguni't ngayong kayo'y 
											nakikitalad sa guwardiya sibil ay 
											hindi magaling. Sa panahon ng 
											pagbabaka'y dapat kayong manatili sa 
											inyong kinalalagyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay nga, datapuwa't hindi, pagka 
											naglililo ang general,--ang sagot ni 
											Don Filipo;--talastas na po ninyong 
											kinabukasa'y inalpasan ng 
											gobernadorcillo ang mga sundalong 
											aking nahuli, at 
											nagpakatanggitangging gumawa ng 
											kahi't ano pa man. Wala akong magawa 
											kung walang pahintulot ang aking 
											puno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala 
											nga, kung kayo'y nag-iisa, 
											datapuwa't malaki ang magagawa ninyo 
											kung katulong ninyo ang mga iba. 
											Dapat sanang sinamantala ninyo ang 
											ganitong pangyayari upang kayo'y 
											makapagbigay uliran sa ibang mga 
											bayan. Sa ibabaw ng katawatawang 
											kapangyarihan ng gobernadorcillo'y 
											naroon ang katuwiran ng bayan; iyan 
											sana ang pasimula ng isang magaling 
											na pagtuturo ay inyong sinayang na 
											di ginamit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano baga kaya ang aking magagawa 
											sa kinakatawan ng mga maling 
											pananalig? Tingnan po ninyo't 
											nariyan si ginoong Ibarra, na 
											napilitang makisang-ayon sa mga 
											pananampalataya ng karamihan, 
											inaakala ba ninyong siya'y 
											naniniwala sa 'exkomunion'?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iba ang inyong kalagayan kay sa 
											kanya; ibig ni ginoong Ibarrang 
											magtanim, at upang magtanim ay 
											kinakailangang yumukod at tumalima 
											sa kahilingan ng katawan; ang 
											katungkulan po ninyo'y magpagpag, at 
											upang magpagpag ay nangangailangan 
											ng lakas at ningas ng loob. Bukod sa 
											rito'y hindi dapat gawin ang 
											pakikitalad laban sa 
											gobernadorcillo; ang marapat 
											sabihi'y: laban sa lumalabis sa 
											paggamit ng lakas, laban sa sumisira 
											ng katahimikan ng bayan, laban sa 
											nagkukulang sa kanyang katungkulan; 
											at sa ganito'y hindi nga kayo 
											mag-iisa, palibhasa'y ang bayan 
											ngayo'y hindi na gaya ng nakaraang 
											dalawampung taon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa akala po kaya ninyo?--ang tanong 
											ni Don Filipo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At hindi po ninyo nararamdaman?--ang 
											isinagot ng matandang ga humilig na 
											sa kinahihigan;--ah! palibhasa'y 
											hindi po ninyo nakita ang panahong 
											nagdaan, hindi ninyo mapagkukurokuro 
											ang bunga ng pagparito ng mga taga 
											Europa, ng mga bagong aklat at ng 
											pagpasa Europa ng mga kinabataan. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pag-isip-isipin ninyo't 
											pagsumagsumagin: tunay nga't 
											nananatili pa ang Real at Pontifikia 
											Universidad ng Santo Tomas, sampu ng 
											kanyang karunungdungang klaustro, at 
											pinapagsasanay pa ang ilang mga 
											nag-aaral sa pagtatatag ng mga 
											'distingo' (pagkilala ng kaibhan) at 
											bigyan ng panghuling ningning ang 
											mga katalasan ng pagmamatuwiran 
											tungkol sa iglesia, nguni't saan po 
											ninyo makikita ngayon yaong mga 
											kinabataang mawilihing sasaliksik ng 
											metafisika, panis ng mga dunong, na 
											sa kapapahirap sa pag-iisip ay 
											namamatay sa marayang mga 
											pagbabalakbalak sa isang sulok ng 
											mga lalawigan, na hindi matapustapos 
											unawain ang mga sagisag ng 'ente', 
											hindi makuhang masunduan ang liwanag 
											ng 'esencia' (tining) at ng 'existencia' (buhay) kataastaasang 
											palaisipang nagpapalimot sa atin ng 
											lalong kinakailangang maalaman: ng 
											nauukol sa ating kabuhayan at 
											sariling kalagayan? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tingnan po ninyo 
											ang kabataan ngayon! Sa puspos na 
											kasiglahan ng kanilang loob sa 
											pagkakita sa lalong malayong 
											tan-awin, sila'y nangag-aaral ng 
											Historia, Matematikas, Geografia, 
											Literatura, mga dunong sa Fisika, 
											mga wika ng iba't ibang lahi, mga 
											bagay na lahat na nang panahon 
											nati'y ating diniringig ng malaking 
											pangingilabot na parang mga heregia; 
											ang lalong mahiligin sa kalayaan ng 
											isip ng panahon ko'y pinapagtitibay 
											na mababang-mababa ang mga dunong na 
											iyan sa mga minana kay Aristoteles 
											at sa mga patakaran ng 'silogismo'. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa kawakasa'y napag-unawa ng taong 
											siya'y tao; pinabayaan ang 
											pagsisiyasat sa kalagayan ng kanyang 
											Diyos, ang pakikialam sa hindi 
											matangnan, sa hindi nakita, at ang 
											paglalagda ng alituntunin sa mga 
											panaginip ng kanyang panimdim; 
											napagkilala ng taong ang kanyang 
											minana'y ang malawak na daigdig, na 
											makakaya niyang pagharian; na sa 
											kanyang pagkapagal sa isang gawaing 
											walang kabuluha't palalo, tumungo't 
											pinagmasidmasid ang lahat nang sa 
											kanya'y nakaliligid. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pagmasdan po 
											ninyo ngayon kung paano ang 
											pagsilang ng ating mga poeta; 
											binubuksan sa ating unti unti ng mga 
											Musa ng Naturaleza ang kanilang 
											iniingatang mga kayamanan at 
											nagpapasimula ng pagngiti sa atin 
											upang tayo'y bigyang sigla sa 
											pagpapatulo ng pawis. Naghandog na 
											ng mga unang bunga ang mga dunong na 
											nagbuhat sa mga pinagdanasan; kulang 
											na lamang ngayon ang lubos na 
											pakabutihin ng panahon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Naaalinsunod 
											ang mga bagong abogado ngayon sa mga 
											bagong balangkas ng Filosofia ng 
											Catuwiran; nagpapasimula na ang ilan 
											sa kanila ng pagningning sa gitna ng 
											karilimang nakaliligid sa luklukan 
											ng mga tagapa-unawa ng kagalingan, 
											at nahihiwatigan na ang pagbabago ng 
											lakad ng panahon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pakinggan po ninyo 
											kung paanong manalita ngayon ang mga 
											kabataan, dalawing po ninyo ang mga 
											paaralang pinagtuturuan ng mga 
											dunong, at iba ng mga pangalan ang 
											umaalingawngaw sa mga pader ng mga 
											klaustro, diyan sa loob ng mga pader 
											na iya'y wala tayong mariringig 
											liban na lamang sa mga ngalan ni 
											Santo Tomas, Suarez, Amat, Sankhez 
											at mga iba pa, na pawang 
											pinakasasamba ng panahong ko. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Walang 
											kabuluhang magsisigaw buhat sa mga 
											pulpito ang mga prayle laban sa 
											tinatawag nilang pagsama ng mga 
											ugali, tulad sa pagsigaw ng mga 
											magtitinda ng isda, laban sa 
											kakuriputan ng mga mamimili, na 
											hindi nila napagkikilalang ang 
											kalakal nila'y bilasa na't walang 
											kabuluhan! Walang kabuluhang 
											ilaganap ng mga kumbento ang 
											kanilang mahahabang galamay at mga 
											ugat sa hangad na inisin sa mga 
											bayan ang bagong agos. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pumapanaw na 
											ang mga diosdiosan; mangyayaring 
											mapapamayat ng mga ugat ng kahoy ang 
											mga halamang doo'y itinatanim, 
											datapuwa't hindi mangyayaring 
											makaamis ng buhay sa ibang 
											nangabubuhay, na gaya na nga ng mga 
											ibong napaiilanglang sa kalangitan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Masimbuyo ang pananalita ng 
											pilosopo; nagniningning ang kanyang 
											mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't maliit ang bagong sibol; 
											kung mangagkaisa ang lahat, ang 
											pagsulong na totoong napakamahal ang 
											ating pagbili'y mangyayaring 
											kanilang mainis,--ang itinutol ni 
											Don Filipo na aayaw maniwala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inisin siya, nino? ng tao baga, 
											iyang pandak bang masasaktin ang 
											makaiinis sa Pagsulong, sa 
											makapangyarihang anak ng panahon at 
											ng kasipagan? Kailan baga nagawa 
											niya ang gayon? Lalo ng itinulak 
											siya sa paglaganap ng mga 
											nangagpupumilit na siya'y pigilin sa 
											pamamag-itan ng mga 
											pinasasampalatayan, ng bibitayan at 
											ng pinagsusunugang siga.&nbsp;<i>E por si 
											muove</i>, (at gayon ma'y 
											gumagalaw), ang sinasabi ni Galileo 
											ng pinipilit siya ng mga dominikong 
											kanyang sabihing ang lupa'y hindi 
											gumagalaw; ang gayong salita'y 
											iniuukol sa pagsulong ng dunong ng 
											tao. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Mapipilit ang ilang mga 
											kalooban, mapapatay ang ilang mga 
											tao, nguni't ito'y walang kabuluhan: 
											magpapatuloy ng paglakad sa kanyang 
											landas ang Pagsulong, at sa dugo ng 
											mga mabulagta'y bubukal ang mga 
											bago't malalakas na mga suwi. 
											Pagmasdan po ninyo ang mga 
											pamahayagan man, kahi't ibiging 
											magpakatiratira sa kahulihulihan, 
											gayon ma'y humahakbang ng isa sa 
											pagsulong ng laban sa kanyang 
											kalooban. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi makatakas sa 
											pagtupad sa ganitong atas ang mga 
											dominiko man, kaya't kanilang 
											tinutularan ang mga jesuita, na 
											kanilang mga kaaway na kailan ma'y 
											hindi makakasundo: gumagawa sila ng 
											mga kasayahan sa kanilang mga 
											klaustro, nangagtatayo ng mga 
											maliliit na mga teatro, 
											nag-aanyo-anyo ng mga tula, sapagkat palibhasa'y hindi sila 
											kulang sa katalinuhan, bagaman ang&nbsp; 
											buong&nbsp; isip nila'y nangabubuhay pa 
											sila sa ikalabinglimang siglo, 
											napagkikilala nilang sumasakatuwiran 
											ang mga jesuita, at sila'y 
											makikialam pa sa daratning panahon 
											ng mga batang bayang kanilang 
											tinuruan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ayon, sa sabi ninyo'y kaalakbay ang 
											mga jesuita sa paglakad ng 
											Pagsulong?--ang tanong na nagtataka 
											ni Don Filipo;--kung gayo'y bakit 
											sila'y minamasama ng mga taga 
											Europa?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po'y sasagutin ko ng katulad 
											ng mga nag-aaral ng tungkol sa 
											Iglesia ng una,--ang isinagot ng 
											pilosopo, na muling nahiga at 
											pinapanag-uli ang kanyang 
											pagmumukhang palabiro;--sa tatlong 
											paraan mangyayaring makaakbay sa 
											Pagsulong: sa dakong unahan, sa 
											dakong tagiliran at sa dakong 
											hulihan; ang mga nangunguna'y siyang 
											namamatnugot sa kanya; ang nangasa 
											tagilira'y kusang napadadala na 
											lamang, at ang nangahuhuli'y pawang 
											kinakaladkad, at sa mga kinakaladkad 
											na ito nasasama ang mga jesuita. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											ibig sana nila'y sila ang 
											makapamatnubay sa Pagsulong, nguni't 
											sapagkat nakikita nilang ito'y 
											malakas at iba ang mga hilig, sila'y 
											nakikisang-ayon, at lalong 
											minamagaling nilang sila'y makisunod 
											kay sa sila'y tahaki't yapakan, o 
											matira kaya sa gitna ng marilim na 
											daan. ngayon po'y tingnan ninyo, 
											tayo rito sa Pilipinas ay may mga 
											tatlong siglo, ang kauntian, ang 
											ating pagkahuli sa&nbsp;<i>karro</i>&nbsp;ng 
											Pagsulong: bahagya pa lamang 
											nagpapasimula tayo ng pag-alis sa 
											'Edad Media' (476 hanggang 1453); 
											kaya nga ang mga jesuita na nasa 
											Europa'y larawan ng pag-urong, kung 
											pagmasdan dito'y larawan ng 
											Pagsulong. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kautangan ng Filipinas sa 
											kanila ang bagong umuusbong na 
											pagdunong, ang mga dunong na 
											katutubo ng daigdig (Ciencias 
											Naturales), na siyang kaluluwa ng 
											siglo XIX, na gaya namang kautangan 
											sa mga dominiko ang Eskolastikismo 
											(filosofia ng Edad Media), na 
											namatay na kahi't anong pagpipilit 
											na gawin ni Leon XIII: walang Papang 
											makabuhay na mag-uli sa binitay na 
											ng katutubong bait ... </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapuwa't 
											saan naparoon ang ating 
											salitaan?--ang itinanong na nagbago 
											ng anyo ng pananalita;--ah! ang 
											pinag-uusapan nati'y ang 
											kasalukuyang kalagayan ng Filipinas 
											... Siya nga, ngayo'y pumapasok tayo 
											sa panahon ng pakikitunggali, mali 
											ako, kayo; nauukol na sa gabi kaming 
											nangaunang ipinanganak, kami'y 
											paalis na. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang nagtutunggali ay ang 
											nakaraang panahong kumakapit at 
											yumayakap na nagtutungayaw sa 
											uugauga ng malaking bahay na bato ng 
											mga makapangyarihan, at saka ang 
											panahong sasapit, na nariringig na 
											buhat sa malayo ang kanyang awit ng 
											pagwawagi, sa mga sinag ng isang 
											namamanaag ng liwayway, taglay ang 
											Bagong Magandang Balita na galing sa 
											mga ibang lupain ... Sinosino kaya 
											ang mangatitimbuang at mababaon sa 
											pagkaguho ng nagigibang bahay?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumigil ng pananalita ang matandang 
											lalaki, at ng makita niyang siya'y 
											tinititigan ni Don Filipong 
											nagninilaynilay, ngumiti at muling 
											nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Halos nahuhulaan ko ang iniisip po 
											ninyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga po ba?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iniisip po ninyong magaang na 
											totoong mangyaring ako'y 
											nagkakamali,--ang sinabing ngumingiti 
											ng malungkot;--ngayo'y may lagnat ako 
											at hindi naman ako maipalalagay na 
											hindi namamali kailan man:&nbsp;<i>homo 
											sum et nihil humani a me alienum 
											puto,</i>&nbsp;ani Terenkio; nguni't kung 
											manakanaka'y itinutulot ang 
											managinip, bakit baga't hindi 
											mananaginip ako sa mga huling 
											sandali ng buhay? At bukod sa roo'y 
											pawang panaginip lamang ang aking 
											naging buhay! </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sumasakatuwiran po 
											kayo; panaginip! walang iniisip ang 
											ating mga kinabataan kung di ang mga 
											sintahan at layaw ng katawan: lalong 
											malaki ang panahong kanilang 
											ginugugol at ipinagkakapagod sa 
											pagdaya at paglulugso ng isang 
											kapurihan ng isang dalaga, kay sa 
											pag-iisip-isip ng ikagagaling ng 
											kanyang lupang tinubuan; 
											pinababayaan ng mga babae rito sa 
											atin ang kanilang sariling mga 
											familia, dahil sa pag aalaga ng 
											bahay at familia ng Diyos. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Masisipag 
											lamang ang mga lalaki rito sa atin 
											sa nauukol sa mga vikio at sila'y 
											mga bayani lamang sa paggawa ng mga 
											kahiyahiya; namumulat ang kamusmusan 
											sa mga kadiliman at sa mga 
											kalumalumaang pinagkaratihang aayaw 
											baguhin; pinalalampas ng mga 
											kabataan ang lalong pinakamagaling 
											na panahon ng kanilang buhay na 
											walang ano mang mithiin, at ang mga 
											may gulang na'y walang ginagawang 
											sukat mamunga ng kagalingan, walang 
											kapakanan sila kung di magpasama sa 
											mga kinabataan sa pamamag-itan ng 
											kanilang masasamang halimbawang 
											ipinakikita ... Ikinagagalak kong 
											ako'y mamatay na ...&nbsp;<i>klaudite jam 
											rivos, pueri.</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig 
											po ba ninyo ang ano mang gamot?--ang 
											itinanong ni Don Filipo, upang 
											magbago ng salitaang nakapagbigay 
											dilim sa mukha ng may sakit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi nagkakailangan ng mga gamot 
											ang mga mamamatay; kayong mga 
											matitira ang nangagkakailangan. 
											Sabihin po ninyo kay Don Crisostomo 
											na ako'y dalawin niya bukas, may 
											sasabihin ako sa kanyang totoong 
											mahahalaga. Sa loob ng ilang araw ay 
											yayao na ako. Sumasakadiliman ang 
											Filipinas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkatapos ng ilang sandali pang 
											pag-uusapa'y iniwan ni Don Filipong 
											namamanglaw at nag-iisip ang bahay 
											ng may sakit.</font></p>
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
																	<a href="t-noli-toc.php">
																	<font color="#800080">
																	Bumalik sa 
																	Nilalaman ng 
																	Noli Me 
																	Tangere</font></a></font></p>
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
											<font face="Arial" style="font-size: 13pt" color="#333333">&nbsp; 
											&nbsp;&nbsp;&nbsp;</font><font face="Arial" style="font-size: 13pt">											
											
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