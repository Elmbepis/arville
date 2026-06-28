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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg')">

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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXIX. Ang Umaga</font></b></p>
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
											Tinugtog ng mga banda ng musika ang 
											'diana' sa unang pagsilang ng 
											liwayway, na ano pa't pinukaw ng 
											masasayang tugtugin ang mga pagal na 
											mga mamamayan. Nanag-uli ang buhay 
											at kasayahan, muling nirepique ang 
											mga kampana at nagpasimula ang mga 
											putukan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Yaon ang katapusang araw ng piyesta, 
											yaon ang tunay na araw ng 
											kapiyestahan. Inaasahang lalong 
											marami ang mapapanood, higit pa sa 
											nakaraang araw. Lalong marami ang 
											mga 'manong' ng V.O.T. (Venerable 
											Orden Terkera; Cagalanggalang na 
											Pangatlong Hanay) kay sa mga manong 
											ng Santisimo Rosario, at 
											nangagsisingiti ng&nbsp; buong&nbsp; kabanalan 
											ang mga manong na iyon ni San 
											Francisco, sa kanilang paniniwalang 
											sa gayo'y kanilang mahihiya, ang 
											kanilang mga kapangagaw. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Lalong 
											marami ang bilang ng mga kandilang 
											kanilang binili: nag-ani ng malaking 
											pakinabang ang mga insik na 
											magkakandila, at nangag-iisip silang 
											pabinyag upang maipakilala nila ang 
											kanilang pagtumbas, bagaman sinanabi 
											ng ilang yao'y hindi raw sa kanilang 
											pananampalataya sa pagka katoliko 
											kung di sa kanilang nais na 
											makapag-asawa. Datapawa't sa gayo'y 
											sumasagot ang mga babaeng banal:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kahit magkagayon man, hindi 
											mangyayaring hindi maging isang 
											himala ang sabaysabay na pag-aasawa 
											ng gayong karaming mga insik; 
											papagbabaliking loob na sila ng 
											kanikanilang mga esposa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isinuot ng mga tao ang kanilang 
											lalong magagaling na mga bihisan; 
											lumabas sa kinatataguang mga kajita 
											ang lahat ng mga hiyas. Sampo ng mga 
											'tahur' at ng mga sugarol ay 
											nagbihis ng mga barong bordado na 
											may malalaking brillante, mabibigat 
											na tanikalang (kadena) ginto at 
											mapuputing sombrerong jipijapa. Ang 
											matandang pilosopo lamang ang 
											nananatili sa dating suot; ang 
											baro'y sinamay na may mga guhit na 
											itim, nabobotones hanggang sa liig 
											maluang na sapatos at malapad na 
											sombrerong fieltro na kulay abo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ngayo'y lalo pa manding mapanglaw 
											kayo kay sa dati!--ang sabi sa kanya 
											ng teniente mayor,--aayaw po ba 
											kayong manakanaka tayong magsaya, 
											yamang maraming tayong lubhang sukat 
											na itangis?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ang kahulugan ng pagsasaya'y 
											dapat na gumawa ng mga kaululan!--ang 
											isinagot ng matanda.--Ito rin ang 
											haling na pagtatapon ng salapi sa 
											taon-taon! At ang lahat ng ito'y 
											bakit? iwaldas ang salapi, sa gayong 
											makapal na totoo ang karukhaan at 
											mga pangangailangan. Aba! nalalaman 
											ko na; ito ang pagtatapon, ang 
											maruming paggagalak upang matakpan 
											ang mga karaingan ng lahat!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman na po ninyong 
											sumasang-ayon ako sa inyong mga 
											kaisipan,--ang muling sinabi ni Don 
											Filipo, na tila ibig magpakitang 
											galit at tila ngumingiti.--Kayo'y 
											aking ipinagsasanggalang, datapuwa't 
											ano ang aking magagagawa sa 
											gobernadorcillo at sa kura?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magbitiw ng tungkol--ang sinundan ng 
											pilosopo, at saka lumayo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natigagal si Don Filipo, at sinundan 
											ng mata ang matanda.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magbitiw ng tungkol!--ang 
											ibinubulong, samantalang tumutungo 
											sa simbahan,--magbitiw! Oo! kung isa 
											sanang bagay na nagbibigay dangal 
											ang tungkuling ito at hindi isang 
											pas-anin, oo, bibitiwan ko!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Puno ng tao ang patio ng simbahan: 
											mga lalaki't mga babae, mga bata't 
											mga matatanda, taglay ang lalong 
											magagaling na pananamit, na 
											nangagkakahalo-halo, pumapasok at 
											lumalabas sa makikipot na mga 
											pintuan. Amoy polvora, amoy bulaklak, 
											amoy insenso, amoy pabango; 
											pinatatakbo at pinasisigaw ang mga 
											babae at pinapagtatawa ang mga bata 
											ng mga bomba, ng mga kohete at ng 
											mga buskapies. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Isang banda ng musika 
											ang tumutugtog sa tapat ng kumbento, 
											isang banda naman ang naghahatid sa 
											mga nangangatungkulan sa bayan, ang 
											mga ibang banda'y naglilibot sa mga 
											daang kinalaladlaran at 
											winawagaywayan ng maraming mga 
											bandera. Lumilibang sa paningin ang 
											liwanag at kulay na sari-sari, at sa 
											pangpakinig nama'y mga tinig at mga 
											ugong. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi nagtitigil ang mga 
											kampana ng karerepique, 
											nagkakasalasalabat ang mga kotse at 
											mga kalesa, na manakanakang ang mga 
											kabayong humihila sa kanila'y 
											nangagigitla dumadamba, humuhulay, 
											mga bagay na bagaman hindi kasangkap 
											sa palatuntunan ng piyesta, gayon 
											ma'y nagiging isang panooring hindi 
											pinagbabayaran at siyang lalong 
											mahalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nag-utos ang Hermano Mayor sa araw 
											na ito ng mga alila upang 
											mangaghanap sa&nbsp;mga daan ng mga 
											inaanyayahan, tulad sa nagpiging na 
											sinasabi sa atin ng Evangelio. Halos 
											sapilitan ang pag-aanyaya upang 
											uminom ng tsokolate, kafe, kha, 
											kumain ng matamis, at iba pa. 
											Madalas na nagiging kawangis ng 
											isang pakikipagkagalit ang 
											ginagawang pag-aanyaya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gagawin na ang misa mayor, ang 
											misang tinatawag na 'de dalmatika', 
											katulad ng misa kahapong sinasaysay 
											ng karapatdapat na korresponsal, at 
											ang bilang kaibhan lamang, ang 
											magmimisa ngayo'y si Padre Salvi, at 
											sa mga taong makikinig ng misa 
											ngayo'y kasama ang Alkalde ng 
											lalawigan, kaakbay ang maraming mga 
											kastila at mga taong marurunong, 
											upang pakinggan si Padre Damaso na 
											totoong bantog sa lalawigan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sampo 
											ng alperes, bagaman siya'y lubhang 
											dala na sa mga pangangaral ni Padre 
											Salvi, pumaroon din, sa pagpapatotoo 
											niya ng kagalingan ng kanyang loob 
											at ng kung mangyayari, 
											makapanghiganti siya sa mga 
											pagbibigay galit na sa kanya'y 
											ginawa ng kura. Sa kalakhan ng 
											pagkabantog ni Padre Damaso'y 
											ipinag-pauna na ng korresponsal ang 
											pagsulat namamatnugot ng pamahayagan 
											ng sumusunod:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Alinsunod sa aking ipinagpauna na 
											sa inyo sa walang wasto kong mga 
											talata kahapo'y gayon nga ang 
											nangyari. Nagkamit kami ng tanging 
											kapalarang mapakinggan ang totoong 
											kagalanggalang na si Padre Fray 
											Damaso Verdolagas, na nagkurang 
											malaon sa bayang ito, at ngayo'y 
											inilipat sa lalong malaki, bilang 
											ganting pala sa kanyang mabuting 
											pagtupad sa kanyang mga katungkulan. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Lumagay ang maningning na 
											mananalumpati ng mga mahal na bagay 
											sa paaralang Espiritu Santo ang 
											nagtuturo, at nagsaysay ng 
											karikitdikitan at kalalim-lalimang 
											sermon, na nagbigay kabanalan sa 
											madla at pinagtakhan ng lahat ng mga 
											binyagang naghihintay ng&nbsp; buong&nbsp; 
											pagmimithi ng pagsilang sa lubhang 
											mapagbungang mga labi ng 
											nakagiginhawang bukal ng walang 
											hanggang-buhay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kadakilaan sa mga 
											kahulugan, kapangahasan sa mga 
											munakala, mga bagong pananalita, 
											kagandahan sa anyo, katutubong mga 
											galaw, pagsasaysay na kalugodlugod, 
											kalusugan ng mga adhika, narito ang 
											mga hiyas ng Bossuet na kastila, na 
											talagang karapatdapat nga ang 
											kanyang malaking pagkabantog hindi 
											lamang sa mga marurunong na mga 
											kastila, kung di naman sa mga walang 
											pinag-aralang mga 'indio' at sa mga 
											mapanglinlang na mga anak ng 
											'kalangitang imperio' (imperio ng 
											kainsikan).'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gayon man, unti ng mapilitan ang 
											mapagkatiwalang korresponsal na 
											kanyang sirain ang kalahatlahatan 
											niyang sinulat. Idinaraing ni Padre 
											Damaso ang isang magaang na sipong 
											kanyang nasagip ng gabing nagdaan: 
											pagkatapos na siya'y makapagkanta ng 
											masasayang mga 'petenera', (karaniwang 
											kinakanta sa mga lalawigang andalus, 
											sa Espa&ntilde;a), siya'y uminom nga 
											tatlong vasong sorbete at sandali 
											siyang nanood ng pinalalabas sa 
											teatro. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dahil sa bagay na ito'y ibig 
											sana niyang magbitiw ng pagka 
											tagasalita ng mga wika ng Diyos sa 
											mga tao, nguni't sapagkat walang 
											ibang makitang nakakaalam ng buhay 
											at mga himala ni San Diego,--tunay 
											nga't natatalos ang mga bagay na ito 
											ng kura, nguni't kinakailangang 
											siya'y magmisa,--pinagkaisahan ng 
											ibang mga prayle na wala ng gagaling 
											pa sa tinig ng boses ni Padre Damaso, 
											at lubhang tunay na kahinahinayang 
											na huwag italumpati ang totoong 
											mainam na sermong gaya na nga ng 
											naisulat at naisaulo na. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dahil 
											dito'y ang babaeng dating 
											tagapag-ingat ng susi'y siya'y 
											ipinaghanda ng mga limonada, 
											pinahiran ang kanyang dibdib at liig 
											ng mga unguente at mga langis, 
											binalot siya ng maiinit na mga kumot, 
											siya'y hinilot at iba pa. Uminom si 
											Padre Damaso ng hilaw na itlog na 
											binati sa alak, at sa&nbsp; buong&nbsp; 
											umaga'y hindi nagsalita at hindi man 
											lamang nag-agahan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Bahagya na uminom 
											ng isang vasong gatas, isang tazang 
											tsokolate at lalabin-dalawang 
											biskocho, na ano pa't tiniis niya ng&nbsp; 
											buong&nbsp; kabayanihang huwag kumain ng 
											isang sisiw na frito at kalahating 
											quesong gawang Laguna, na kanyang 
											kinaugaliang kanin pagkakaumaga, 
											sapagkat ayon sa kanyang katiwalang 
											babae, maaaring makapagpaubo ang 
											sisiw at ang queso, dahil sa kapwa 
											may asin at may taba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginagawa ang lahat ng ito't ng 
											kamtan natin ang kalangitan at 
											magbalik loob tayo!--ang sabi ng mga 
											Hermana ng V.O.T., ng kanilang 
											maalaman ang ganitong kanyang mga 
											pagpapakahirap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya'y pinarurasahan ng Birhen de 
											la Paz!--ang ibinubulong naman ng mga 
											Hermana ng Santisimo Rosario, 
											palibhasa'y hindi nila maipatawad 
											ang kanyang pagkiling sa kanilang 
											mga kaaway na kapwa babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumabas ang prokesion pagka alas 
											ocho y media sa lilim ng mga toldang 
											lona. Nakakahawig din ng ginawa, 
											kahapon, bagaman may isang bagay na 
											nabago: ang mga Hermano ng V.O.T., 
											na mga matatandang lalaki't babae, 
											kasama ang ilang mga dalagang 
											patungo na sa pagtanda, ang 
											pananamit na dala'y mahahabang 
											habitong gingon: damit na gingong 
											magaspang ang sa mga mahihirap, at 
											ang sa mga mayayama'y gingong sutla, 
											sa makatuwid baga'y ang tinatawag na 
											'gingong frankiskano', sapagkat 
											siyang lalong karaniwang gamitin ng 
											mga kagalanggalang na mga prayleng 
											frankiskano. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang lahat ng mga mahal 
											na habitong iyo'y mga dalisay, 
											sapagkat pawang galing sa kumbento sa 
											Maynila, na siyang kinukunan ng mga 
											mamamayan sa limos na ang kapalit ay 
											salaping isinasang-ayon sa taning na 
											halagang hindi natatawaran, kung 
											bagamangyayaring sabihing kawangis 
											ng sa isang tindahan. Ang halagang 
											itong hindi nababawasa'y mangyaring 
											maragdagan, nguni't hindi 
											nababawasan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tulad sa mga habitong 
											ito'y nagbibili ng gayon ding mga 
											habito sa monasterio ng Santa Clara, 
											na taglay, bukod ang mga tanging 
											biyayang nakapagbibigay ng maraming 
											mga indulgencia sa mga patay na 
											pinagsasaputan, ang biyayang lalo pa 
											manding tangi: na lalo pang mahal 
											ang halaga paga lalong luma, gulanit 
											at hindi na magagamit. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Itinititik 
											namin ito at baka sakaling banal na 
											bumabasang nagkakailangan ng gayong 
											mga mahal na 'reliquia' (ano mang 
											bagay na ginamit o linangkap na nga 
											iba), o baka kaya may matalas na 
											isip kasam-ang mamumulot ng mga 
											basahang taga Europa, na ibig 
											yumaman sa pagdadala sa Pilipinas ng 
											isang 'kargamento'' (maraming yakos 
											na katatagang lulan sa isang daong) 
											ng mga habitong masurot at malibag, 
											sapagkat nagkakahalaga ng labing 
											anim na piso o higit pa, ayon sa 
											kalakhan ng pagkalibaging humigit 
											kumulang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakapatong si San Diego de Alkala sa 
											isang karrong napapamutihan ng mga 
											plankhang pilak na nabuburdahan. May 
											malaking kapayatan ang Santo, garing 
											mula sa ulo hanggang bay-awang, 
											magagalitin at nakakaaalang-alang 
											ang anyo ng pagmumukha, bagaman 
											kulot ang buhok sa ulo, na katulad 
											ng mga ita. Sutlang raso na 
											nabuburdahan ng ginto ang kanyang 
											pananamit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumusunod ang ating kagalang-galang 
											na Amang si San Francisco, 
											pagkatapos ay ang Birheng gaya 
											kahapon, ang kaibhan lamang ay si 
											Padre Salvi ngayon ang sumasailalim 
											ng palio at hindi ang makisig na si 
											Padre Sibyla na mainam kumiya. 
											nguni't kung di taglay ni Padre 
											Salvi ang magandang anyo ni Padre 
											Sibyla, datapuwa't nagkakanlalabis 
											naman sa kanya ang pagka anyong 
											banal: nakatungo ang mga mata; 
											nakadoop ang mga kamay na ang anyo'y 
											matimtiman at lumalakad na 
											nakayukod. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang mga may dala ng 
											palio'y yaon ding dating mga kabeza 
											de barangay, na nagpapawis ng&nbsp; 
											buong&nbsp; ligaya, sa kanilang 
											panunungkol na nakikisakristan, 
											bukod sa sila'y maniningil ng buwis, 
											manunubos ng mga taong lagalag at 
											mga dukha, sa makatuwid baga'y mga 
											Cristong nagbibigay ng dugo dahil sa 
											mga kasalanan ng mga iba. Ang 
											koadjutor, na nakasobrepelliz, ay 
											nagpaparoo't parito sa iba't ibang 
											mga karro, na dala ang inkensario, 
											at kanyang manakanakang hinahandugan 
											ng usok nito ang pangamoy ng kura, 
											na pagka nagkakagayo'y lalong lalong 
											ng nagmumukhang kaaway ng tawa at 
											magagalitin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dahandahan nga at matimtiman ang 
											lakad ng prokesiong inaakbayan ng 
											ugong ng mga bomba at ng tinig ng 
											mga kanta at musikang tungkol sa 
											religiong ilinalaganap sa impapawid 
											ng mga banda ng musikang sumusunod 
											sa likuran ng bawa't karro. 
											Samantala'y napakasipag na totoo ang 
											pamamahagi ng Hermano Mayor ng 
											malalaking mga kandila, na ang 
											marami sa mga nakipagprokesio'y 
											nag-uwi sa kanilang mga bahay ng 
											maipag-iilaw sa apat na gabi 
											samantalang nangagsusugal. 
											Nagsisiluhod ng&nbsp; buong&nbsp; galang ang 
											mga nanonood pagka nagdaraan ang 
											karro ng Ina ng Diyos at 
											nangagdarasal sila ng taimtim sa 
											loob ng mga Sumasampalataya o ng mga 
											Aba po.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumigil ang karro sa tapat ng isang 
											bahay na sa mga bintanang 
											napapamutihan ng maririkit na mga 
											pangsampay (kolgadura) ay nakasungaw 
											ang Alkalde, si Kapitan Tiago, si 
											Maria Clara, si Ibarra, ilang mga 
											kastila at mga dalaga; nagkataong 
											tumunghay si Padre Salvi, datapuwa't 
											hindi gumawa ng kahi't munting kilos 
											na magpahalatang siya'y bumabati o 
											nakikilala niya sila; ang tanging 
											ginawa niya'y lumindig lamang, 
											tinuid ang katawan at sa gayo'y 
											sumabalikat niya ng lalong kaayusan 
											at ganda ang 'kapa pluvial.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa dakong ibaba ng bintana'y may 
											isang dalagang nakalulugod ang ganda 
											ng mukha, mahalaga ang suut na damit 
											at may kilik na isang musmos na 
											lalaki. Marahil siya'y sisiwa o taga 
											pag-alaga lamang, sapagkat ang 
											sanggol na iyo'y maputi at mapula 
											ang buhok, samantalang ang dalaga'y 
											kaymanggi at mahigit pa sa kaitiman 
											ng azabakhe ang kanyang mga buhok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkakita sa kura, iniunat ng musmos 
											ang kanyang maliliit na bisig, 
											tumawa niyang tawang hindi 
											nakapagbibigay sakit at hindi naman 
											pighati ang nakapagpapatawa, at 
											sumigaw ng pautal sa gitna ng isang 
											sandaling katahimikan: Ta ...tay! 
											Tatay! Tatay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kinilabutan ang dalaga, dalidaling 
											inilagay ang kanyang kamay sa ibabaw 
											ng bibig ng sanggol na lalaki at 
											patakbong lumayo roong taglay ang 
											totoong malaking kahihiyan. Umiyak 
											ang bata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagkindatan ang mga mapaghinala, 
											at nangagsingiti ang mga kastilang 
											nakamasid ng gayong maikling 
											pangyayari. Naging pula ang 
											katutubong pamumutla ni Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At gayon ma'y wala sa katuwiran ang 
											tao: hindi man lamang nakikilala ng 
											kura ang babaeng iyon, siya'y 
											taga-ibang bayan.</font></p>
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
																	Nilalaman ng Noli 
																	Me Tangere</font></a></font></p>
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
											&nbsp; &nbsp;&nbsp;&nbsp;<font face="Arial" style="font-size: 13pt">											
											
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