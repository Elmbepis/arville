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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XLII. Ang Mag-asawang de Espada&ntilde;a</font></b></p>
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
											Nakaraan na ang piyesta; muli na 
											namang napag-unawa ng mga mamamayan, 
											kawangis din ng lahat ng taong 
											nagdaan, na lalo ng dukha ang kaban, 
											na sila'y nangagkapagod, nangagpawis 
											at totoong nangagpuyat na hindi sila 
											nangakapagsaya, hindi sila 
											nangagkamit ng bagong mga kaibigan, 
											sa isang salita, mahal na totoo ang 
											kanilang pagkabili sa mga kaguluhan 
											at sa mga basag-ulo. Datapuwa't 
											hindi kailangan; gayon din ang 
											gagawin sa taong darating, gayon din 
											sa darating na ikasandaang taon, 
											sapagkat hangga ngayo'y ito ang 
											siyang naging kaugalian.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naghahari sa bahay ni Kapitan Tiago 
											ang malaking kapanglawan; nakasara 
											ang lahat ng mga bintana, bahagya na 
											nararamdaman ang paglakad ng mga tao 
											roon sa sahig, sa kokina lamang 
											nangangahas silang magsalita ng 
											malakas. Nararatay sa banig at may 
											sakit si Maria Clarang kaluluwa ng 
											bahay; nababasa ang kanyang 
											kalagayan sa lahat ng mga mukha, 
											tulad naman sa pagkabasa sa 
											pagmumukha ng isang tao ng mga 
											dinaramdam ng kanyang kaluluwa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ba sa akala mo Isabel; sa Cruz 
											sa Tunasan ba ako maglimos o sa Cruz 
											sa Matahong?--ang marahang tanong ng 
											nababalisang ama.--Lumalaki ang Cruz 
											sa Tunasan, datapuwa't pumapawis 
											naman ang sa Matahong; alin kaya sa 
											akala mo ang lalong mapaghimala?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nag iisip-isip ang tia Isabel, 
											iginalaw ang ulo at bumulong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Paglaki ... lalong malaking himala 
											ang lumaki kay sa pumawis: 
											nagpapawis tayong lahat, nguni't 
											tayong lahat ay hindi lumalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay nga, siya nga, Isabel, 
											nguni't alalahanin mong ang 
											magpawis.... ang magpawis ang kahoy 
											na ginagawa lamang na paa ng bangko 
											ay hindi kakaunting himala ... Aba! 
											ang lalong mainam ay maglimos sa 
											dalawang Cruz, sa ganya'y walang 
											maghihinanakit na sino man at lalong 
											madaling gagaling si Maria Clara ... 
											Mabuti ba ang pagkakahanda ng mga 
											silid? Nalalaman mo ng kasama 
											mag-asawang doktor ang isang bagong 
											ginoong may pagkakamag-anak ni Padre 
											Damaso; kinakailangang huwag 
											magkulang ng ano man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Na sa kabilang dulo ng 'komedor' ang 
											magpinsang si Sinang at si Viktoria, 
											na napaparoo't sinasamahan ang may 
											sakit. Tinutulungan sila ni Andeng 
											sa paglilinis ng mga kagamitang 
											pilak sa pag-inom ng kha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakikilala ba ninyo ang doktor 
											Espada&ntilde;a?--ang tanong na mahigpit kay 
											Viktoria ng kapatid sa suso ni Maria 
											Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi!--anang tinatanong;--ang 
											tanging nalalaman ko lamang sa 
											kanya'y mahal na totoong sumingil, 
											ayon kay Kapitan Tiago.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil totoong magaling siya kung 
											gayon!--ani Andeng;--mahal sumingil 
											ang bumutas ng tiyan ni Do&ntilde;a Maria, 
											kaya nga marunong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Haling!--ang biglang sinabi ni 
											Sinang,--hindi ang lahat ng 
											sumisingil ng mahal ay marunong na. 
											Tingnan mo si doktor Guevara; 
											pagkatapos na di natutong umalalay 
											sa nanganganak, hanggang sa putulin 
											ang ulo ng sanggol, siningil ng 
											limampong piso ang nabaong lalaki 
											... sumingil ang siyang nalalaman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang kinalaman mo?--ang tanong sa 
											kanya ng kanyang pinsan at siya'y 
											siniko.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At bakit hindi ko malalaman? Ang 
											lalaki, na isang maglalagari ng 
											kahoy, pagkatapos na siya'y 
											mapangulila ng kanyang asawa, 
											napilitan namang mawal-an siya ng 
											bahay, sapagkat pinilit siyang 
											magbayad ng Alkalde, na kaibigan ng 
											doktor ... bakit hindi ko malalaman? 
											Pinautang pa siya ng aking ama upang 
											makapasa Santa Cruz.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang kotseng tumigil sa tapat ng 
											bahay ang siyang pumutol ng lahat ng 
											mga salitaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanaog na nagtutumakbo sa hagdanan 
											si Kapitan Tiago, na sinusundan ni 
											tia Isabel, upang salubungin ang mga 
											bagong dating.--Ang mga nagsidating 
											na ito'y ang doktor na si Don 
											Tiburcio de Espada&ntilde;a, ang kanyang 
											ginoong asawang; doktora na si Donya 
											Victorina de los Reyes 'de' de 
											Espada&ntilde;a at isang binatang kastilang 
											nakalulugod ang mukha at maganda ang 
											kiyas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang sa babaeng pananamit ay isang 
											sutlang 'bata' na nabuburdahan ng 
											mga bulaklak, at may isang 
											sombrerong may isang malaking ibong 
											'papagayo' na halos nababayuot sa 
											mga kintas na asul at pula; ang 
											nangagkakahalong alabok ng daan at 
											galapong ng bigas sa kanyang mga 
											pisngi ang siya manding nagdaragdag 
											ng kanyang mga kulubot; ngayo'y 
											inaalalayan sa mga bisig ang kanyang 
											asawang pilay, na gaya rin ng siya'y 
											makita natin sa Maynila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ikinaliligaya kong ipakilala sa 
											inyo ang aming pinsang si don 
											Alfonso Linares de Espada&ntilde;a!--ani 
											Donya Victorina na itinuturo ang 
											binata; ang ginoong ito'y inaanak ng 
											isang kamag-anak ni Padre Damaso, 
											tanging kalihim ng lahat ng mga 
											ministro....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bumati ng kalugodlugod ang binata; 
											unti ng hagkan ni Kapitan Tiago ang 
											kanyang kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang ipinapanhik ang lubhang 
											maraming mga 'maleta' at mga 'sako 
											de viaje', samantalang inihahatid 
											sila ni Kapitan Tiago sa 
											kanikanilang mga silid, pag-usapan 
											natin ang ilang bagay na nauukol sa 
											mag-asawang ito, na bahagya na natin 
											napagsalitaanan sa mga unang bahagi 
											ng librong ito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Donya Victorina'y isang ginoong 
											babaeng may taglay ng mga apat na 
											po't limang agosto, na katumbas ng 
											tatlompo't dalawang abril ayon sa 
											kanyang balak sa aritmetika. Maganda 
											siya ng panahong bata pa, malaman 
											ang kanyang katawan,--gayon ang 
											madalas niyang sabihin--nguni't sa 
											kanyang pagkawili sa panonood sa 
											kanyang sarili, pinawal-ang halaga 
											niya ang maraming sa kanya'y 
											nangingibig na mga filipino, 
											palibhasa'y ang minimithi niya'y ang 
											ibang lahi. Hindi niya inibig 
											ipagkatiwala kangino man ang kanyang 
											maputi at maliit na kamay, 
											datapuwa't hindi sa pagkukulang 
											tiwala, sapagkat hindi mamakailang 
											nagbigay siya sa ilang lagalag na 
											mga tagaibang lupain at mga tagarito 
											ng mga pamuti at mga hiyas na hindi 
											maulatan ang kahalagahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Anim na buwan pa muna bago dumating 
											ang panahong sinasaysay namin 
											ngayon, nasunduan niyang ganap ang 
											lalong kaligaligaya niyang 
											panaginip, ang panaginip ng&nbsp; buong&nbsp; 
											buhay niya, na dahilan dito'y 
											pinawalang halaga niya ang mga 
											pagsuyo ng kabataan at sampu ng mga 
											pangakong pagsinta ni Kapitan Tiago 
											na ng una'y ibinubulong sa kanyang 
											tainga o inaawit sa ilang mga 
											pananapat. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Lampas na nga sa panahon 
											ng masunduan niya ang kanyang mithi; 
											nguni't palibhasa'y kahi't 
											pamalimali'y nagsasalita si Donya 
											Victorina ng wikang kastila, at 
											higit kay Agustina na taga Zaragoza 
											ang kanyang pagka espa&ntilde;ola, 
											nalalaman niya yaong kasabihang 'Mas 
											vale tarde que nunka' (Magaling kay 
											sa wala ang magkamit kahi't malaon), 
											at siya rin ang umaaliw sa sarili sa 
											pagsasalita nito sa kanya rin.--'No 
											hay felikidad kompleta en la tierra' 
											ay isa naman sa kanyang laging 
											ginagamit na kasabihan sa kanyang 
											buhay, sapagkat hindi lumalabas sa 
											kanyang mga labi ang dalawang 
											kasabihang ito sa harap ng ibang mga 
											tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Donya Victorinang pinagdaanan na 
											ng una, pangalawa, pangatlo at 
											pang-apat na kabataan sa paglaladlad 
											ng kanyang mga lambat upang mahuli 
											sa dagat ng daigdig ang bagay na 
											adhika ng kanyang mga hindi 
											pagkakatulog, sa kawakasa'y 
											napilitang sumang-ayon sa ibig ng 
											kapalarang sa kanya'y ipagkaloob. 
											Kung naging tatlompo't isang abril 
											sana ang kanyang gulang, at hindi 
											tatlompo't dalawa,--ang layo'y 
											totoong malaki ayon sa kanyang 
											aritmetika.--isinauli disin ng 
											kahabaghabag na babae sa kapalaran 
											ang inihahandog sa kanyang huli sa 
											lambat, upang maghintay ng lalong 
											naaalinsunod sa kanyang kalooban. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											N<font face="Arial" color="#333333">guni't palibhasa'y pinapanukala ng 
											tao at ang pangangailangan ang 
											siyang nagpapasiya, siyang malaki ng 
											lubha ang pangangailangan ng asawa, 
											napilitang magalingin na niya ang 
											isang abang lalaki na iniabsang ng 
											bayang Extremadura (Espa&ntilde;a), at 
											pagkatapos na makapaglagalag sa 
											daigdig ng anim o pitong taon, 
											Ulisis na bago, sa kawakasa'y 
											nasumpungan niya sa pulo ng Lusong 
											ang mapapanuluyan, salapi at isang 
											panis ng Calipso, na kanyang-kabiak 
											dalandan ... Ay! at ang dalanda'y 
											maasim. Tiburcio Espada&ntilde;a ang 
											pangalan ng kaawaawa, at bagaman 
											tatlompo't limang taon ang gulang ay 
											tila matanda na; gayon ma'y lalong 
											bata pa siya kay Donya Victorina, na 
											may tatlompo't dalawa lamang. 
											Magaang maunawa ang kadahilanan 
											nito, nguni't panganib na sabihin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Siya'y na pa sa Pilipinas na ang 
											katungkula'y Ofikial Quinto sa mga 
											Aduana, datapuwa't totoong 
											napakalihis ang kanyang palad, na 
											bukod sa siya'y nahilong mainam at 
											nabalian siya ng isang hita 
											samantalang naglalakbay-dagat, 
											binawian siya ng katungkulan ng 
											makaraan ang labing limang araw mula 
											ng siya'y dumating, pagbawing sa 
											kapanahuna'y dinala sa kanya ng 
											'Salvadora', ng wala na siya kahit 
											isang kuarta man lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kanyang pagkadala sa dagat, hindi 
											niya inibig umuwi sa Espa&ntilde;a hanggang 
											hindi siya yumayaman, at inisip 
											niyang maghanap-buhay sa ano man. 
											Ayaw itulot sa kanya ng kapalaluan 
											ng budhi ng pagka kastila ang 
											paggugugol ng lakas: hangad sana ng 
											lalaking mamuhay siya sa isang 
											paraang walang ikapipintas ang sino 
											man, nguni't ayaw ipahintulot sa 
											kanya ng kapurihan ng mga kastila na 
											gugulin niya ang lakas sa paggawa, 
											at hindi siya mailigtas sa mga 
											pangangailangan ng kapurihang iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng mga unang araw ay nabubuhay siya 
											sa gugol ng ilang kababayan niya, 
											nguni't palibhasa'y marunong mahiya 
											si Tiburcio, sa damdam niya'y 
											masaklap ang kanyang kinakain, 
											kaya't hindi tumataba kung di bagkos 
											pa ngang nangangayayat. Sapagkat 
											wala siyang dunong, salapi o mataas 
											na taong tumangkilik sa kanya, 
											inihatol sa kanya ng kanyang mga 
											kababayan, upang huwag na siyang 
											makabigat pa sa pamumuhay na siya'y 
											pa sa mga lalawigan at doo'y 
											magpanggap siyang doktor sa 
											pangagamot. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang mga unang mula'y 
											aayon sana ang lalaki, sapagkat 
											tunay nga't siya'y naging alila sa 
											Hospital ng San Carlos nguni't wala 
											siyang natutuhang ano man sa 
											karunungan tungkol sa panggagamot: 
											ang tungkulin niya roo'y pagpagan ng 
											alabok ang mga bangko at 
											papagningasin ang mga bagang 
											pangpainit, at ito'y hindi pa, 
											nalaon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapuwa't sapagkat 
											nalalao'y humihigpit ang kagipitan, 
											at pinapawi ng kanyang mga kaibigan 
											ang mga pag-aalap-ap niya, 
											pinakinggan niya sila sa kawakasan, 
											siya'y na pa sa mga lalawigan, 
											nagpasimula siya ng pagdalaw sa 
											ilang mga may sakit, at sumisingil 
											siya ng alinsunod sa inihahatol sa 
											kanya ng sariling budhi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapuwa't 
											ang nakawangis niya'y ang binatang 
											pilosopo na sinasabi ni Sameniego, 
											sa kahulihuliha'y sumingil siya ng 
											mahal at linagyan niya ng mataas na 
											halaga ang kanyang mga dalaw sa mga 
											may sakit; dahil dito'y ipinalagay 
											siyang dakilang manggagamot, at 
											marahil siya sana'y yumaman, kung 
											hindi nabalitaan ng mga pangulong 
											manggagagamot sa Maynila ang 
											kamalakmalak na kanyang pagsingil at 
											ang pakikipangagaw na ginagawa sa 
											mga ibang manggagamot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namag-itan sa kanya ang mga walang 
											katungkulan at ang mga 
											profesor.--'Kaibigan,--ang kanilang 
											sinabi sa maganapin sa katungkulang 
											si Dr. C.,--pabayaan na ninyong 
											siya'y makatipon ng kaunting 
											puhunan, at pagka may anim o pitong 
											libo na siya'y makaoowi na sa 
											kanyang bayan at ng doo'y mamuhay sa 
											kapayapaan. Sa katotohana'y ano ang 
											ginagawa sa inyong masama? na 
											kanyang dinaraya ang mga hindi 
											marunong mag-ingat na mga 'indio'? 
											Sila'y magpakatalino. Siya'y isang 
											kaawaawa; huwag po ninyong alisin sa 
											kanyang bibig ang pagkain; kayo 
											sana'y mag-asal mabait na kastila!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Palibhasa'y mabait ngang kastila ang 
											doktor, napahinuhod siyang magwalang 
											malay ng kagagawang iyon; nguni't 
											sapagkat dumating sa tainga ng bayan 
											ang gayong balita, nagpasimula ng 
											pagkukulang tiwala sa kanya, at 
											hindi nalao't wala ng pagamot kay 
											Don Tiburcio Espada&ntilde;a at sa ganito'y 
											napilitan na namang halos magpalimos 
											ng kinakain sa araw-araw. ng 
											panahong iyo'y nabalitaan sa isang 
											kaibigan niya, na naging matalik 
											namang kaibigan ni Donya Victorina, 
											ang malaking pangangailangan ng 
											asawa ng ginoong babaeng ito, ang 
											kanyang pagsinta sa bayang Espa&ntilde;a at 
											ang kagandahan ng kanyang puso. 
											Natanawan ni Don Tiburcio roon ang 
											isang kapilas na langit, at 
											ipinakiusap na siya'y ipakilala kay 
											Donya Victorina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagkita si Donya Victorina't si Don 
											Tiburcio. 'Tarde venientibus ossa,' 
											ang biglang sinabi marahil ni Don 
											Tiburcio kung marunong sana siya ng 
											latin! Si Donya Victorina'y di na 
											masasabing maaariari pa, tunay na di 
											na maaari; nauwi na lamang ang 
											kanyang malagong buhok sa isang 
											pusod, na ayon sa sabi ng kanyang 
											alilang babae'y ang ulo ng bawang 
											ang nakakasinlaki raw, ang mga 
											kulubot ng kanyang mukha'y tulad sa 
											dinaanan ng araro at nagpapasimula 
											na ng pag-uga ang kanyang mga 
											ngipin, nangagdaramdam na rin naman 
											ang kanyang mga mata, at malaki na 
											ang ipinagdamdam, kaya't 
											kinakailangan na niyang ga ipikit na 
											ng kaunti upang makakita sa dakong 
											may kalayuan; ang kaugalian na 
											lamang niya ang tanging sa kanya'y 
											natira.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagkaunawaan ng matapos ang 
											kalahating horas na pagsasalitaan, 
											at nangagtanggapan sila. Dahil sa 
											ang ibig niya ang isang kastilang 
											hindi napakapilay, hindi totoong 
											utal, hindi lubhang upawin, huwag 
											napaka bungi ang mga ngipin na huwag 
											mapakalabis ang pananambulat ng 
											laway kung nagsasalita, at magkaroon 
											sana ng lalong malaking liksi at 
											'kategoria', na gaya ng karaniwan 
											niyang sabihin; nguni't ang ganitong 
											mga bagay na kastila'y hindi lumapit 
											kailan man sa kanya upang ipakiusap 
											na sa kanya'y pakasal. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi miminsang kanyang naringig na 'la 
											okasion la pintan kalva' 
											(ilinalarawang walang buhok sa ulo 
											ang magaling na pagkakataon), at 
											inakala niya ng taimtim sa loob na 
											si Don Tiburcio'y siyang tunay na 
											magaling na pagkakataon, sapagkat 
											salamat sa mga gabing lubhang 
											mapighating kanyang dinaanan, 
											maagang nangyayari sa kanya ang 
											pagkapanot ng ulo. Sino ang babaeng 
											hindi matalino sa ikatatlompo't 
											dalawang taong gulang?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdamdam naman si Don Tiburcio, sa 
											ganang kanya, ng hindi mawatasang 
											pamamanglaw ng kanyang dilidilihin 
											ang mga unang buwan ng kanyang 
											pag-aasawa na ang karaniwa'y 
											nagtatamasa ng&nbsp; buong&nbsp; katamisan. 
											nguni't kaniyang taglay ang 
											pagsang-ayon sa sawing kapalaran, at 
											humingi siyang saklolo sa 
											pag-aalaala sa dinaanan at 
											dinaraanan pang gutom kung sakali. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kailan man ay hindi niya inisip ang 
											lumangoy sa yaman o magtamo ng 
											mataas na katungkulan, magagaang na 
											kamtan ang kanyang mga adhika ng 
											loob, hindi malalawak ang kanyang 
											mga mithi; datapuwa't ang kanyang 
											pusong virgen pa ng mga panahong 
											iyon ay naghangad ng ibang 
											nakasisintahing lubha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											--Doon sa kanyang kabataan, kung 
											pagal na siya sa kagagawa, 
											pagkatapos na magawa niya ang 
											dukhang paghapon, nagpapahingalay 
											siya sa masamang hihigan upang 
											tunawin ang 'gazpacho', at natutulog 
											siyang ang napapanag-inip ay isang 
											larawang nakangiti at mapagbigay 
											layaw. Pagkatapos, ng maragdagan ang 
											mga sama ng loob at mga kasalatan, 
											nagdaan ang mga taon at hindi 
											dumating ang kalugodlugod na 
											larawan, ang inisip na lamang niya'y 
											ang isang mabait na babae, masipag, 
											mabuting mamahay, na makapagdala sa 
											kanya ng kaunting salapi sa 
											pagkakasal, makapagbigay aliw sa 
											kanya sa mga pagal ng paggawa at 
											manakanakang siya'y 
											kagalitan.--tunay, ipinalalagay 
											niyang isang kaligayahan ang mga 
											pag-aaway ng mag-asawa! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Datapuwat ng 
											siya'y mapilitang maglagalag sa 
											bayanbayan, na ang hinahanap niya'y 
											hindi na ang kayamanan kung hindi 
											kaunti man lamang kaginhawahan sa 
											pamumuhay sa panahon kanyang 
											ipinananatili pa sa daigdig; ng 
											pukawin sa kanya ang pag-asang 
											makakikita ng kaginhawahan ng mga 
											balibalitang bigay sa kanya ng 
											kanyang mga kababayang galing sa 
											kabilang ibayo ng dagat, lumulan 
											siya sa isang sasakyang tungo sa 
											Pilipinas, pinapamugad ng layon sa 
											kanyang dibdib ang isang 
											kalugodlugod na mestiza, sa isang 
											magandang india na may malalaking 
											matang maitim, napuputos ng sutla at 
											mga nanganganinag na mga damit, 
											tigib ng taglay na mga brillante at 
											ginto at iniaalay sa kanya ang 
											pagsinta, ang mga kotse, at iba pa. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dumating sa Pilipinas at ang&nbsp; 
											buong&nbsp; akala niya'y nasunduan 
											na niya ang kaganapan ng kanyang 
											panag-inip, sapagkat tinititigan 
											siya ng may halong pagtataka ng mga 
											dalagang nakasakay sa mga kotseng 
											plateadoong nagpapasial sa Luneta at 
											Malekon. Datapuwa't ng siya'y bawian 
											ng katungkulan, nawala sa kanyang 
											panimdim ang mestiza o ang india, at 
											linikha naman niya ng&nbsp; buong&nbsp; 
											hirap ang larawan ng isang bao, 
											nguni't isang baong kalugodlugod. 
											Kaya nga't ng makita niyang nagiging 
											katotohanan ang isang bahagi ng 
											kanyang panaginip, siya'y namanglaw 
											nguni't palibhasa'y taglay niya ang 
											kaunting katutubong pagsangayon sa 
											ano mang nangyayari, sinabi niya ang 
											sa kanyang sarili: 'Yao'y wala kung 
											di isang panaginip lamang, at sa 
											daigdig ay hindi nabubuhay sa 
											panaginip'! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa ganito'y binibigyan 
											niyang kapasiyahan ang kanyang mga 
											pag-aalinlangan: gumagamit siya ng 
											galapong ng bigas, pshe! kung 
											makasal na sila'y ipag-uutos na 
											niyang huwag gumamit; na marami ng 
											kulubot ang balat, nguni't ang 
											levita niya'y lalo ng maraming gisi 
											at mga sursi, na yao'y isang 
											matandang babaeng mapagyabang, 
											mapagpasuko at asal lalaki, 
											datapuwa't ang gutom ay lalo ng asal 
											lalaki, lalo ng mapagpasuko at lalo 
											pa manding mapagyabang, at bukod sa 
											roo'y kaya nga naman katutubo na 
											niya ang pagkamatimyas na ugali, at 
											sino ang nakakaalam? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Binabago ng 
											pagsinta ang mga kaasalan; na 
											totoong masamang mangastila, siya 
											man nama'y hindi rin magaling 
											mangastila, ayon sa sinabi sa kanya 
											ng puno ng Negokiado ng ipagbigay 
											alam sa kanya ang sa kanya'y pagbawi 
											ng katugkulan, at bukod sa roo'y ano 
											baga iyon? na ang babaeng iyo'y 
											isang matandang pangit at 
											katawatawa? siya nama'y pilay, wala 
											ng ngipin at saka panot pa! Lalong 
											minamagaling pa ni Don Tiburcio ang 
											siya'y mag alaga kay sa siya'y 
											alagaan sa pagkakasakit sa gutom. 
											Pagka linilibak siya ng alin mang 
											kaibigan niya, ito ang kanyang 
											isinasagot: 'Bigyan mo ako ng 
											pagkain at tawagin mo akong tanga'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Don Tiburcio'y isa riyan sa 
											karaniwang sinasabing hindi gumagawa 
											ng masama kahi't sa isang langaw: 
											mahinhin at walang kayang magtaglay 
											ng isang masamang kaisipan, siya 
											disi'y nagmisionero ng mga unang 
											panahon. Hindi nangyaring 
											nakapanagumpay sa kanya ang lubos na 
											paniniwala ng malaking kataasan, ng 
											dakilang kamahalan at mataas na 
											kahalagahang sa loob ng ilang 
											linggo'y kumakapit sa kalooban ng 
											pinakamalaking bahagi sa kanyang mga 
											kababayan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi nagkasiya kailan man sa 
											kanyang puso ang magtanim ng galit; 
											hindi pa siya nakasusumpong ng isa 
											man lamang na 'filibustero'; wala 
											siyang nakikita kung hindi mga 
											haling na isip na kinakailangang 
											agawan ng pagkabuhay, sakali't aayaw 
											na maging haling pa kay sa kanila. 
											ng pag-akalaang siya'y pag-usigin sa 
											harap ng mga hukuman dahil sa 
											pagpapanggap niya ng pagka 
											manggagamot, hindi siya 
											naghinanakit, hindi siya dumaing; 
											kinikilala niya ang katuwiran, at 
											ito lamang ang kanyang isinasagot: 
											Datapuwa't kinakailangang mabuhay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sila nga'y napakasal o nagsiluan ang 
											isa't isa, at na pa sa Santa Ana 
											sila at ng doon nila lasapin ang 
											katimyasan ng unang buwan ng bagong 
											kasal; nguni't ng gabi ng sa 
											kanila'y pagkakasal, nagkasakit si 
											Donya Victorina, dahil sa 
											katakottakot na hindi pagkatunaw ng 
											kinain; si Don Tiburcio'y 
											napasalamat sa Diyos, nagpakitang 
											siya'y mairog at maiging mag-alaga. 
											Gayon man, ng ikalawang gabi'y 
											ipinakilala niyang siya'y lalaking 
											marunong magmahal sa kapurihan, at 
											ng manalamin siya ng kinabukasan, 
											ngumiti ng&nbsp; buong&nbsp; kalungkutan 
											hanggang sa ipakita niya ang kanyang 
											mga ngidngid na walang ngipin: ang 
											kauntia'y may sampung taon ang 
											kanyang itinanda.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa lubhang malaking pagkalugod ni 
											Donya Victorina sa kanyang asawa, 
											ipinagpagawa niya siya ng magagaling 
											na mga ngiping nailalagay at 
											naaalis, ipinag-utos sa lalong 
											magagaling na mga sastre sa kiudad 
											na igawa ang kanyang asawa ng lalong 
											magagaling na mga kasuutan; bumili 
											ng mga ara&ntilde;a at mga kalesa; nagbilin 
											sa Batangan at sa Albay ng lalong 
											magagaling na mga 'pareja' ng mga 
											kabayo, at hanggang sa pinilit niya 
											si Don Tiburciong magkaroon ng 
											dalawang kabayong handa sa mga 
											takbuhang darating.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang binabago niya ang 
											kalagayan ng kanyang asawa'y hindi 
											niya nililimot ang kanyang sariling 
											katawan: kanyang iniwan ang sayang 
											sutla at ang barong pinya at ang 
											ginamit niya'y ang pananamit 
											europea; inihalili niya sa madaling 
											gawing puyod ng mga filipina ang 
											magdarayang mga 'flequillo', at sa 
											pamamag-itan ng kanyang mga 
											pananamit na kagulatgulat ang sa 
											kanya'y hindi pagkabagay, binigyang 
											niyang ligalig ang kapayapaan ng 
											tahimik at walang ginagawang mga 
											mamamayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang kanyang asawang kailan ma'y 
											hindi umaalis na naglalakad,--(aayaw 
											si Donya Victorinang makita ang 
											kapilayan ng kanyang 
											asawa),--dinadala siya sa mga lugar 
											na walang tao, bagay na ikinahahapis 
											na totoo ni Donya Victorina, 
											palibhasa'y ang ibig niya'y 
											maipagparangalan ang kanyang asawa 
											sa lalong hayag na mga paseo: 
											nguni't hindi siya umiimik sa 
											pagpipitagan niya sa mga unang buwan 
											ng katamisan ng mga bagong kasal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpasimula ang pagbabawas ng timyas 
											ng kanilang pagsasama, ng akalain ng 
											kanyang asawang siya'y pakiusapan 
											tungkol sa 'polvos de arroz' 
											(galapong ng bigas) at sabihin sa 
											kanyang yao'y daya at hindi 
											katutubo; pinapagkunot ni Donya 
											Victorina ang kanyang mga kilay, at 
											siya'y tinitigan sa mga ngiping 
											nailalagay at naaalis. Hindi na 
											umimik ang lalaki, at napagwari ng 
											babae kung alin ang pangpahina sa 
											kanya ng loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nalao't ang isip niya'y siya'y 
											nagdadalang tao na, at kanyang 
											ipinamalita ang gayong bagay sa 
											lahat ng kanilang mga kaibigan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako at si de Espada&ntilde;a'y kami pasasa 
											'Pe&ntilde;insula' sa buwang darating; 
											aayaw akong ipanganak dito ang aming 
											anak at tatawaging 'revolucionario'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nilagyan niya ng isang 'de' ang 
											apellido ng kanyang asawa; hindi 
											pinagkakagugulan ng ano man ang 
											'de'; nguni't nakapagbibigay 
											'kategoria' (kamahalan sa pangalan). 
											Kung pumifirma siya'y ganito ang 
											inilalagay niya sa sariling 
											pangalan: Victorina de los Reyas 
											'de' de Espada&ntilde;a; ang 'de' de 
											Espada&ntilde;ang ito ang siyang 
											ikinasisira ng kanyang isip; bagay 
											na hindi nangyaring naalis sa 
											kanyang ulo ng litografong gumawa ng 
											kanyang mga tarjeta at ng kahi't 
											kanyang asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung isa lamang 'de' ang aking 
											ilalagay, mawiwikang talagang wala 
											kang 'de', haling!--ang sinabi sa 
											kanyang asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Walang likat ang kanyang pamamalita 
											ng ginagawa niyang mga paghahanda sa 
											paglalakbay, pinagsikapan niyang 
											isaulo ang mga pangalan ng mga 
											duongang dinaraanan ng mga sasakyang 
											patungo sa Espa&ntilde;a, at nakalulugod na 
											pakinggan siya sa pananalita:--'Aking 
											makikita ang ismo ng kanal ni Suez; 
											sinasabi ni De Espada&ntilde;ang siya raw 
											lalong maganda, at nalibot ni De 
											Espada&ntilde;a ang&nbsp; buong&nbsp; daigdig.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Marahil ay hindi na ako uuwi dito sa 
											lupain ng mga taong gubat, '--' Hindi 
											ako ipinanganak upang matira ako sa 
											lupaing ito; lalo pang nababagay sa 
											akin ang Aden o Port Said: musmos pa 
											ako'y gayon na ang aking kaisipan,' 
											at iba pa. Pinagbabahagi ni Donya 
											Victorina ang daigdig, sa kanyang 
											'geografia,' sa Pilipinas at Espa&ntilde;a, 
											na naiiba naman sa mga khulo (mga 
											taong hangal sa Madrid) na 
											binabahagi ang daigdig sa Espa&ntilde;a at 
											Amerika o Tsina sa ibang pangalan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nalalaman ng kanyang asawang ang 
											ilang sa mga bigay na iyo'y mga 
											kahalingan, nguni't hindi umiimik at 
											ng huwag siyang masigawan at 
											maipamukha sa kanya ang kanyang 
											kautalan. Nagpakunwari si Donya 
											Victorinang siya'y naglilihi, at 
											nagpahumaling sa pagsusut ng mga 
											damit na sari-sari ang mga kulay, 
											nagbalot ng mga bulaklak at ng mga 
											sintas at nagpapasial na nakabata sa 
											Eskolta, datapuwa't oh kasaliwaang 
											palad! nagdaan ang tatlong buwan at 
											nalugnaw ang panag-inip, at sapagkat wala ng dapat ipangilag 
											upang huwag maging revolucionario 
											ang anak na lalaki, hindi na niya 
											ipinatuloy ang paglalakbay. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											kinahiligan nama'y ang pagtatanong 
											sa mga manggagamot, mga hilot, mga 
											matatandang babae't iba pa, 
											datapuwa't nawalang kabuluhan; 
											siyang aayaw pasaklolo sa kangino 
											mang santo o santa, at kanyang 
											nililibak si San Paskual Bailon, 
											bagay na totoong ikinahahapis ni 
											Kapitan Tiago; kaya nga't sa kanya'y 
											sinabi ng isang kaibigan ng kanyang 
											asawa:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Maniwala po kayo sa akin, ginoong 
											babae, kayo po ang bugtong na may 
											'espiritu fuerte' (matapang na diwa) 
											sa nakayayamot na lupang ito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Siya'y ngumiti bagaman hindi niya 
											nauunawa kung ano ang 'espiritu 
											fuerte' at pagkagabi, sa oras ng 
											pagtulog, itinanong kung ano ang 
											kahulugan niyon sa kanyang asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Giliw ko,--ang isinagot nito,--ang 
											nalalaman kong e ... espiritu fuerte 
											ay ang 'amoniako;' isang 're ... 
											retorika' (bulaklak ng pananalita) 
											lamang marahil ang sinabi ng aking 
											kaibigan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Buhat niyo'y sinasabi niya kailan 
											ma't maaari:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako ang bugtong na amoniako sa 
											lubhang nakayayamot na lupaing ito, 
											sa pananalitang retorika; gayon ang 
											sinabi ni Ginoong N. de N., 
											peninsular na totoong mataas ang 
											'kategoria'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang bawa't maibigan niya'y 
											kinakailangang gawin; totoong 
											napasuko niyang lubos ang kanyang 
											asawa, na hindi naman nagpakita ng 
											malaking pagsalangsang sa kanya, na 
											ano pa't naging kahalimbawang tunay 
											ng isang asong maliit na sumusunod 
											sa bawa't maibigan ni Donya 
											Victorina. Kung ginagalit siya'y 
											hindi pinahihintulutang siya'y 
											makapagpasial, at kung totoong 
											siya'y pinapagngingitngit, inaagaw 
											kay Don Tiburcio ang postizong mga 
											ngipin at pinababayaan siyang 
											magmukhang kagulatgulat sa isa o 
											ilang araw kaya, ayon sa maisipan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naisipan ni Donya Victorinang dapat 
											maging doktor sa Medikina at sa 
											Cirugia ang kanyang asawa, at 
											ipinaunawa niya kay Don Tiburcio ang 
											bagay na ito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Giliw ko! ibig mo bang ako'y 
											dakpin?--ang tanong na nagugulat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag ka sanang baliw, pabayaan 
											mo't ako ang nakakaalam!--ang 
											isinagot,--hindi ka manggagamot 
											kangino man, datapuwa't ibig kong 
											tawagin ka nilang doktor ako'y 
											doktora, hala!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At kinabukasa'y tumanggap si 
											Rodoreda ng biling iukit sa isang 
											losa ng maitim na marmol ang ganito: 
											Dr. DE ESPADA&Ntilde;A, ESPECIALISTA EN 
											TODA CLASE DE EMFERMEDADES 
											(manggagamot na tangi sa lahat ng 
											bagay na sakit).</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipinag-utos sa lahat ng mga lingkod 
											nila sa bahay na itawag sa kanila 
											ang kanilang mga bagong titulo, at 
											dahil dito'y naragdagan ang bilang 
											ng mga flequillo, kumapal ang pahid 
											na polvos de arroz, at dumami ang 
											mga kintas at ang mga enkaje, at 
											lalo ng tiningnang ng malaking 
											pagpapawalang halaga ang kanyang mga 
											aba at kulang palad na mga 
											kababayang babae, na ang mga asawa'y 
											mababa ang kamahalan kay sa kanyang 
											asawa. Bawa't araw na magdaan ay 
											nararamdaman niyang lalong nagiging 
											mahal at lalong tumataas siya, at 
											kung magpapatuloy ang gayong 
											kalakaran, pagiging isang tao'y 
											sasapantahain na niyang siya'y 
											kalahi ng Diyos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nakahahadlang ang mga dakilang 
											kaisipang ito, na hanggang nagdaraan 
											ang araw ay lalo siyang tumatanda at 
											lalong nagmumukhang katawatawa. 
											Kailan mang masasalubong niya si 
											Kapitan Tiago at maaalaala niyang 
											nawalang kabuluhan ang pangingibig 
											sa kanya nito, pagdaka'y nagpapadala 
											siya ng piso sa Simbahan sa pamisa, 
											bilang pasasalamat. Gayon ma'y 
											iginagalang na totoo ni Kapitan 
											Tiago ang kanyang asawa dahil sa 
											titulo na pagka manggagamot sa lahat 
											ng bagay na sakit, at kanyang 
											pinakikinggang magaling ang mga 
											ilang salitang kanyang 
											naipangungusap dahil sa kanyang 
											kautalan. Dahil dito, at dahil sa 
											hindi dumadalaw ang manggagamot na 
											ito sa kangino man, hinirang siya ni 
											Kapitan Tiago upang siyang gumamot 
											sa kanyang anak na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kung tungkol sa binatang Linares ay 
											iba na. ng gumagayak ng pagpasa 
											Espa&ntilde;a, inakala ni Donya Victorina 
											ang maglagay ng isang 
											tagapangasiwang kastila, sapagkat 
											walang tiwala siya sa mga filipino 
											naalaala ng kanyang asawa ang isang 
											pamangking na sa Madrid, na 
											nag-aaral ng pag-aabogado at 
											ipinalalagay na siyang pinakamatalas 
											ang kaisipan sa lahat ng mga 
											magkakamag-anak sinulatan nga siya, 
											na ipinagpauna ang bayad sa sasakyan 
											ng pagparito, at naglalakbay-dagat 
											na siyang dito ang tumpa, ng 
											mapugnaw ang pananag-inip tungkol sa 
											pagdadalang tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang tatlong ginoong ito ang siyang 
											bagong kararating.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang kumakain sila ng 
											pangalawang agahan, dumating si 
											Padre Salvi, at sapagkat siya'y 
											kakilala na ng mag-asawa, 
											ipinakilala nila sa kanya, sampu ng 
											mga taglay na karapatan ng binatang 
											si Linares, na nagdamdam kahihiyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ayon sa kaugalia'y si Maria Clara 
											ang siyang pinag-usapan; ang 
											dalaga'y nagpapahingalay at 
											natutulog. Napagsalitaanan ang 
											tungkol sa paglalakbay: 
											ipinagparangalan ni Donya Victorina 
											ang kanyang katabilan sa pagpintas 
											sa mga tagalalawigan, sa kanilang 
											mga bahay na pawid, sa kanilang mga 
											tulay na kawayan, na hindi 
											kinalimutang sabihin sa kura ang 
											pagka sila'y mga kaibigan ng Segundo 
											Cabo, ng Alkaldeng si gayon, ng 
											Oldor na si ganyan, ng Intendente at 
											iba pa, mga taong pawang matataas na 
											totoong naaalang-alang sa kanila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung naparito po sana kayo 
											kamakalawa, Donya Victorina,--ang 
											isinunod ni Kapitan Tiago, 
											pagkatapos ng isang sandaling 
											pagtahimik ng usapan,--inyo po sanang 
											nakatagpo ang marilag na Kapitan 
											Heneral: diyan siya nakaupo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano? Paano? Naparito ba ang 
											kapitang General? At dito sa inyong 
											bahay? Casinungalingan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinasabi ko po sa inyong diyan siya 
											nakaupo! Kung naparito po sana kayo 
											kamakalawa....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah! sayang na hindi nagkasakit agad 
											si Clarita!--ang biglang sinabi 
											niyang taglay ang tunay na 
											pagdaramdam, at saka pinagsabihan si 
											Linares:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naringig mo na, pinsan? Dirito ang 
											Kapitan Heneral! Nakita mo na kung 
											totoo ang sabi ni De Espada&ntilde;a, ng 
											sabihin sa iyong ang paroroonan mo'y 
											hindi bahay ng isang walang 
											kabuluhang indio? sapagkat 
											talastasin po ninyo na ang aming 
											pinsa'y ng nasa Madrid ay kaibigan 
											ng mga ministro at ng mga duque, at 
											doon kumakain sa bahay ng konde del 
											Campanario.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ng duque de la Torre, 
											Victorina,--ang isinala ng kanyang 
											asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon din lamang iyon, ikaw pa ba 
											naman ang magsasabi sa akin?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mararatnan ko po kaya si Padre 
											Damaso sa kanyang bayan?--ang 
											isinalabat ni Linares, na si Padre 
											Salvi ang kinakausap;--malapit daw 
											rito ang sabi sa akin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, naririto siya ngayon at hindi 
											malalao't siya'y paririto,--ang 
											isinagot ng kura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gaano kalaki ang aking tuwa! may 
											dala akong sulat na ukol sa 
											kanya,--ang biglang sinabi ng 
											binata,--at kung hindi lamang sa 
											ganitong maligayang pagkakataon ng 
											pagparito kong ito, nagsadya disin 
											pa ako ng pagparito upang siya'y 
											aking dalawin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y nagising ang 
											'maligayang' pagkakataon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--De Espada&ntilde;a?--ani Donya Victorina ng 
											matapus ang pagkain,--ating titingnan 
											na si Clarita?--At saka sinabi kay 
											Kapitan Tiago: Dahil sa inyo lamang, 
											don Santiago; dahil sa inyo lamang! 
											Hindi gumagamot ang aking asawa kung 
											di sa mga matataas na tao lamang, at 
											iyon pa man, iyon pa man! Hindi 
											kawangis ang aking asawa ng mga taga 
											rito!... hindi siya nanggagamot sa 
											Madrid kung hindi sa mga taong 
											matataas lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinungo nila ang kinalalagyan ng may 
											sakit na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Halos ngitngit ng dilim ang silid na 
											kinalalagyan ng may sakit, nakalapat 
											ang mga bintana, dahil sa 
											panganganib sa hihip ng hangin, at 
											nanggagaling ang bahagyang liwanag 
											doon sa dalawang malalaking 
											kandilang pagkit na nakatirik at 
											nagniningas sa harap ng isang 
											larawan ng Birhen sa Antipolo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nabibigkisan ang ulo ng isang 
											panyong basa ng Agua de Colonia, 
											nababalot na mabuti ang katawan sa 
											mapuputing kumot na may saganang mga 
											tiklop, na siyang tumatakip sa 
											kanyang pagka anyong virgen, 
											nakahiga ang dalaga sa kanyang 
											katreng kamagong na napapamutihan ng 
											mga kortinang jusi at pinya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang kanyang mga buhok na nakaliligid 
											sa mukha niyang tabas itlog ang 
											nakararagdag ng gayong nanganganinag 
											na pamumutla, na binibigyang buhay 
											lamang ng malalaking mga matang 
											puspos ng kalungkutan. Na sa kanyang 
											siping ang kanyang dalawang 
											kaibigang babae at si Andeng na may 
											babae na isang sanga ng azukena.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinulsuhan siya ni De Espada&ntilde;a, 
											siniyasat ang kanyang dila, tinanong 
											siya ng ilan, at saka nagsalitang 
											iiling iling:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--I ... ito'y may sakit, nguni't 
											maaring gumaling!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minasdan ni Donya Victorina ng&nbsp; 
											buong&nbsp; kalakhan ng loob ang mga 
											nalilimpi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Liqueng 
											may kahalong gatas sa umaga, jarabe 
											de altea, dalawang pildora ng 
											sinoglosa!--ang ipinag-utos ni De 
											Espada&ntilde;a.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Laksan mo ang iyong loob, 
											Clarita,--ang sabi ni Donya 
											Victorina na sa kanya'y lumapit; 
											naparito kami't ng gamutin ikaw ... 
											Ipakikilala ko sa iyo ang pinsan 
											namin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nawiwili si Linares sa panonood sa 
											mga kalugodlugod na mga mata ni 
											Maria Clara, na anaki'y may isang 
											hinahanap, kaya't hindi niya 
											naringig ang sa kanya'y pagtawag ni 
											Donya Victorina.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Linares--ang sa kanya'y 
											sinabi ng kura, na ano pa't pinukaw 
											siya sa kanyang pagkawili sa 
											panonood;--narito na si Padre Damaso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At tunay nga namang dumarating si 
											Padre Damaso, na namumutla at ga 
											nalulungkot na; pagbabangon niya sa 
											higaa'y si Maria Clara ang unang 
											kanyang dinalaw. Hindi na siya ang 
											dating Padre Damaso, na totoong 
											mataba at mapag-aglahi; ngayo'y 
											lumalakad na walang imik at anyong 
											hahapayhapay.</font></p>
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