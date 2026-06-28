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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXII. Mga Ibinunga ng mga Paskin</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa mga 
	pangyayaring isinaysay, maraming ina ang tumawag sa kanilang mga anak na 
	lalaki upang iwan kaagad agad ang pag-aaral at atupagin na lamang ang 
	pagbubulakbol o ang pagtatanim.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang dumating 
	ang mga paglilitis, ay marami ang mga hindi nakaraan at bihira ang 
	nangakalampas sa taon ng kanilang pag-aaral sa mga naging kasapi sa nabantog 
	na kapisanan na hindi na muli pang nabangit ng kahit sino. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Pecson, si 
	Tadeo at si Juanito Pelaez ay pawa ring nangapigil. Tinanggap ng una ang mga 
	kalabasa na taglay ang kanyang tawang hangal at nangakong papasok na opisial 
	sa alin mang hukuman; si Tadeo, na natagpuan din ang walang katapusang
	<i xml:lang="es" lang="es">cuacha</i>, ay nagdaos ng isang pag-iilaw na ang 
	ginagawa'y sinigan ang kanyang mga aklat; ang iba'y hindi rin nangakaligtas 
	na mabuti, kaya't nangapilitang iwan ang kanilang mga pag-aaral, sa gitna ng 
	kasiyahang loob ng mga ina, na kailan pa ma'y nangakakinikinitang ang 
	kanilang mga anak ay bitay pag nangakaalam ng sinasabi ng mga aklat. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Juanito Pelaez lamang ang tanging hindi nasiyahang loob sa bayong iyon ng 
	kapalaran, na iniwan na ang paaralan dahil sa tindahan ng kanyang ama, na 
	mula noo'y isinama na siya sa kalakal: ang tindahan ay hindi nagiliwan ng 
	alisaga, ngunit nang makaraan ang kaunting panahon ay nakita siyang muli ng 
	kanyang mga kaibigan na bilog ang kakubaan, bagay na nagpapakilalang 
	bumabalik ang kanyang masayang ugali. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa harap ng gayong pagkadiwara, ang 
	mayamang si Makaraig ay nagingat na mabuti upang huwag siyang mapanganib at 
	nang makakuha ng <i>pasaporte</i> sa tulong ng lakas ng salapi ay matuling 
	sumakay na tungo sa Europa: nabalitang ang marilag na Capitan General, sa 
	kanyang hangad na gumawa ng kabutihan nang alang-alang sa kabutihan at sa 
	pagiingat sa ikaluluwag ng mga pilipino, ay binigyang salabid ang pag-alis 
	ng sinomang hindi makapagpakilalang tunay na tunay na mangyayaring 
	makapaggugol at makapamumuhay ng maluwag sa mga siyudad sa Europa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa ating 
	mga kilala, ang mga nakalusot na mabutibuti ng kaunti ay si Isagani at si 
	Sandoval: ang una ay nakalampas sa <i>asignatura</i> na pinag-aaralan sa 
	ilalim ng pagtuturo ni Padre Fernandez at napigil sa iba, at ang pangalawa'y 
	nagawang mahilo ang mga lumilitis sa tulong ng mga talumpati. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ang 
	tanging hindi nakalampas sa mga asignatura, ni hindi napigil, ni hindi 
	nakapatungo sa Europa: nagpatuloy siya sa pagkakakulong sa bilibid, na sa 
	bawa't ikatlong araw ay isinasailalim siya ng isang pagtatanong, yaon ding 
	kagaya nang sa simula't simula pa, na walang ibang kabaguhan kungdi ang 
	pagpapalit ng mga '<span xml:lang="es" lang="es">instructor</span>', 
	sapagka't waring sa harap ng gayong kalaking pagkakasala ay napipipilang 
	lahat o nangagsisitakas na nangingilabot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At samantalang 
	nangakakatulog at nauusad ang mga kasulatan, samantalang ang mga papel 
	sellado ay dumadami na wari mga tapal ng mga mangmang na manggagamot sa 
	katawan ng isang may sakit na pagkalungkot, si Basilio ay tumatanggap naman 
	ng balita ng buong nangyari sa Tiani, ang pagkamatay ni Huli at pagkawala ni 
	Tandang Selo. Si Sinong, ang kotserong nabugbog na naghatid sa kanya sa
	<abbr>S.</abbr>&nbsp;Diego, ay nasa sa Maynila noon, dumadalaw sa kanya at 
	sinasabi sa kanya ang lahat ng pangyayari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala 
	nama'y gumaling na si Simoun, gayon ang sabi ng mga pahayagan, si Ben-Zayb 
	ay nagpasalamat sa 'Nakapangyayari sa lahat na nag-ingat sa gayong 
	mahalagang buhay' at ipinahayag ang pag-asa na gagawin ng Lumikha na 
	makilala sa balang araw ang nagkasalang ang kagagawan ay hindi pa 
	napaparusahan dahil sa kaawaan ng nilapastangan, na lubos na nagpapalakad 
	noong mga wika ng Dakilang Pinagpala na: <i>Ama, patawarin mo sila, at hindi 
	nalalaman ang ginagawa!</i> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ito at iba pang bagay ang sinasabi sa limbag ni 
	Ben-Zayb, samantalang sa salita'y inuusisa kung tunay ang alingawngaw na ang 
	mayamang mag-aalahas ay magdaraos ng isang malaking pista, isang piging na 
	hindi pa nakikita magpakailan man, sa isang dako'y bilang pasasalamat sa 
	kanyang paggaling at sa isa'y bilang pagpapaalam sa bayang nagdagdag sa 
	kanyang kayamanan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nababalita, at siyang totoo, na si Simoun ay 
	nagsusumakit, dahil sa ang Capitang General ay dapat nang umalis sapagka't 
	matatapos sa buwan ng Mayo ang pagganap sa katungkulan, upang malakad sa 
	Madrid ang isang palugit pa at inuudyukan ang General na gumawa ng isang 
	pagsalakay upang magkaroon ng kadahilanan ang di pag-alis. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ngunit 
	nababalita rin naman na noon lamang hindi diningig ng General ang payo ng 
	kanyang itinatangi, at inaaring bagay na kapit sa karangalan niya ang huwag 
	binbinin ng isang araw man lamang sa kanyang kamay ang kapangyarihang 
	ipinagkaloob sa kanya, alingawngaw itong nakapagpapaniwala na ang 
	nababalitang pista ay gagawin sa loob ng madaling panahon. Sa isang dako 
	naman, si Simoun, ay hindi mapakimatyagan; lalo pang naging matahimik, 
	bibihirang pakita, at bumibigkas ng ngiting mahiwaga kapag kinakausap siya 
	ng ukol sa sinasabing pista.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano, ginoong 
	Simbad--ang sabi sa kanyang minsan ni Ben-Zayb;--silawin ninyo kaming minsan 
	sa isang bagay na ayos <span xml:lang="en" lang="en">yankee</span>! Isang 
	pinakaganti sa bayang ito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mangyari nga 
	ba!--ang sagot sa pamagitan ng kanyang ngiting matigas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ihahagis 
	ninyo marahil ang bahay sa bintana, ano?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Marahil, 
	ngunit sa dahilang wala akong bahay....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Binili sana 
	ninyo ang kay Kapitan&nbsp;Tiago, na murang murang nakuha ni ginoong&nbsp;Pelaez!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Simoun ay 
	hindi umimik at mula na noon ay bihira na siyang nakita sa tindahan ni <abbr>
	D.</abbr>&nbsp;Timoteo Pelaez, na nabalitang nakipagkasama sa kanya. Makaraan ang 
	ilang linggo, ng buwan ng Abril, ay kumalat ang sabisabihan na si Juanito 
	Pelaez, ang anak ni Don Timoteo, ay mag-aasawa kay Paulita 
	Gomez, ang dalagang ninanasa ng mga taga rito't ng mga dayuhan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--May mga taong 
	mapapalad!--anang mga naiinggit na mangangalakal;--makabili ng bahay na 
	murang-mura, magbili ng kanyang tindang <i xml:lang="es" lang="es">zinc</i>, 
	makisama kay Simoun at maipakasal ang kanyang anak sa isang mayamang 
	binibini, ang wikain ninyo'y mga kakanin iyang hindi natitikman ng lahat ng 
	mga taong may puri.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung 
	nalalaman lamang ninyo kung sa anong paraan natamo ni <abbr>G.</abbr>&nbsp;Pelaez 
	ang kakaning iyan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa tunog ng 
	tinig ay ipinahihiwatig ang sarili niya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At 
	mapatitibayan ko rin sa inyo na magkakaroon ng pista at malaki,--ang dugtong 
	na may hiwaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tunay nga na 
	si Paulita ay mag-aasawa kay Juanito Pelaez. Ang kanyang pag-ibig kay 
	Isagani ay napawi na gaya ng alin mang mga unang pag-ibig, na nananangan sa 
	magagandang pangarap, sa damdamin. Ang mga pangyayaring dahil sa mga paskin 
	at ang pagkakabilanggo ay nag-alis sa binata ng lahat ng taglay na 
	pang-akit. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kangino baga mangyayari ang hanapin ang kasawian, nasain ang 
	makiisa sa kapalaran ng kanyang mga kasama, humarap na kusa, gayong ang 
	lahat ay nagtatago at umiiwas sa lahat ng kapanagutan? Iyon ay isang 
	kabangawan, isang kaululan, na hindi maipatatawad sa kanya ng sino mang 
	taong matino sa Maynila at may lubos ngang katwiran si Juanito Pelaez sa 
	pagkutya sa kanya, na ginagayahan ang sandaling pagtungo niya sa Gobierno 
	Civil. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gaya ng maaantay, ang maningning na si Paulita ay hindi na 
	mangyayaring umibig sa isang binatang lubhang maling mali sa pagkaunawa sa 
	kalipunan at sinisisi ng lahat. Si Paulita ay nagsimula na ng pagkukuro 
	kuro. Si Juanito ay matalas, maliksi, masaya, malikot, anak ng isang 
	mayamang mangangalakal sa Maynila, at may dugong kastila pa, at kung 
	paniniwalaan si Don Timoteo, ay tunay na tunay na dugong 
	kastila; samantalang si Isagani ay indiong taga lalawigan na nangangarap sa 
	kanyang mga kagubatan na puno ng linta, ang kaanak ay malabo, may isang 
	amaing klerigo na marahil ay kalaban ng pagmamagara at ng mga sayawan, na 
	kanyang kinalulugdan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang maganda ngang umaga ay napaghulohulo niya na 
	malaking kahangalan ang nagawa niyang napili pa si Isagani kay sa kanyang 
	kaagaw at mula na noon ay napuna ang pagdaragdag ng kakubaan ni Pelaez. Ang 
	batas na natuklas ni Darwin ay ginaganap ni Paulita ng walang kamalaymalay, 
	ngunit buong-buo; ang babae'y napaaari sa lalaking lalong may kasanayan, sa 
	marunong makibagay sa kalagayang kinabubuhayan, at upang mamuhay sa Maynila 
	ay walang makapapantay kay Pelaez, na sapol pagkabata ay nakatatalos na ng 
	gawang palikawlikaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang kurisma ay 
	nakaraang kasama ang kanyang mahal na araw, kasama ang kaakbay niyang mga 
	prusisyon at mga <i xml:lang="es" lang="es">ceremonias</i>, na walang ibang 
	kabaguhang nangyari kundi isang mahiwagang pagkakagulo ng mga artillero, na 
	ang sanhi ay hindi sumapit na makalat. Iginiba na ang mga bahay na pawid, sa 
	tulong ng isang pulutong na '<span xml:lang="es" lang="es">caballeria</span>' 
	upang dumumog sa mga may ari, sakaling mangagsilaban: nagkaroon ng maraming 
	iyakan at maraming paghihinagpis, ngunit hindi na naman lumalo pa roon. Ang 
	mga mapag-usisa, na isa na sa kanila'y si Simoun, ay nangagsiparoong 
	lalakadlakad na di pinahahalagahan ang nangyayari, na pinanonood ang mga 
	nawalan ng tahanan at anila sa sariliy makatutulog na nang payapa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	magtatapos ang Abril, nang nalimot na ang lahat ng pangamba, ay walang 
	pinaghuhunhunan sa Maynila kundi iisang bagay. Ang pistang gagawin ni <abbr>
	D.</abbr>&nbsp;Timoteo Pelaez, dahil sa pag-aasawa ng kanyang anak na ang 
	humandog na mag-aanak, malugod at mapagbigay loob, ay ang General. 
	Sinasabing si Simoun ang may kagagawan noon. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang kasal ay idadaos nang 
	dalawang araw muna bago umalis ang General; papupurihan nitong dumalo sa 
	bahay at maghahandog sa <i xml:lang="es" lang="es">novio</i>. Kumakalat ang 
	alingawngaw na ang mag-aalahas ay magpapabaha ng brillante, magtatapon ng 
	dakotdakot na perlas, alang-alang sa anak ng kanyang kasama, at sa dahilang 
	hindi siya makapagpista dahil sa wala siyang bahay na sarili at dahil sa 
	siya'y matandang bagong-tao, ay sasamantalahin ang pagkakataon upang biglain 
	ang bayang pilipino ng isang daramdaming pagpapaalam. </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang buong Maynila ay 
	humahanda nang mapapaanyayahan: Kailan ma'y hindi pumasok ang 
	pagkagulumihanan sa mga budhi ng gayon kabagsik na gaya ng hinalang baka di 
	maanyayahan. Nangag-uunahan sa pakikipag-ibigang mabuti kay Simoun, at 
	maraming lalaki, ang sa pilit ng kanilang mga asawa, ang bumili ng mga tanak 
	at mga <i xml:lang="es" lang="es">zinc</i> upang maging kaibigan ni Don Timoteo 
	Pelaez.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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