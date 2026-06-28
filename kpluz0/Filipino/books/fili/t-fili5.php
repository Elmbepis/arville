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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">V. Ang 'Noche Buena' ng Isang Kutsero</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dumating si 
	Basilio sa San Diego ng mga sandaling inililibot ang prusision sa mga 
	lansangan ng bayan. Siya'y nabalam ng ilang oras sa kanyang lakad sapagka't 
	nahuli ng guardia sibil ang kotsero na nakalimot magtaglay ng sedula 
	personal at dinala sa kuartel upang iharap sa comandante, matapos mabigyan 
	ng ilang halibas ng kulata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling napigil 
	ang kalesa upang paraanin muna ang prusision at ang kotserong nabugbog ay 
	nag-alis ng sombrero at nagdasal ng isang <i>Ama namin</i> sa pagdaraan ng 
	isang larawan, ng isang bantog na banal mandin, na nasa andas. Anyong 
	matandang may mahabang misay na nakaupo sa gilid ng isang hukay na nasa 
	ilalim ng isang punong may sarisaring pinatuyong ibon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Isang kalan na may 
	isang palayok, isang lusonglusungan at isang kalikut na pandurog ng hitso 
	ang kanyang mga tanging kasangkapan, waring upang ipakilala na ang matanda 
	ay naninirahan sa gilid ng libingan at doon linuluto ang kanyang pagkain. 
	Iyon ay si Matusalem, ayon sa pananampalataya sa Pilipinas; ang kanyang 
	kasama at marahil ay kapanahong taga Europa ay si Noel ngunit may 
	matalaghay at masayang anyo, kay sa kay Matusalem.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nang 
	kapanahunan ng mga banal--ang hakahaka sa sarili ng kotsero--marahil ay walang 
	guardia sibil, sapagka't kung mayroon, ay hindi sila mabubuhay ng malaon 
	dahil sa pangungulata.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Makaraan ang 
	matanda ay sumunod ang tatlong Haring Mago na nangakasakay sa mga kabayong 
	tatalontalon, lalonglalo na ang sa maitim na haring&nbsp;Melchor na waring ibig 
	sagasain ang kanyang mga kasama.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala, wala 
	ngang guardia sibil noon--ang patuloy ng kotsero na kinaiinggitan sa sarili 
	ang mga maliligayang kapanahunang iyon,--sapagka't kung mayroon ay nadala na 
	sa bilangguan ang maitim na iyan na naglililikot sa piling niyang dalawang 
	kastila (si Gaspar at si Baltazar).</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit sa 
	dahilang napuna niya na ang maitim ay may korona at hari ding kagaya ng 
	dalawang kastila, ay sumaisip niya ang hari ng mga tagalog at 
	nagbuntonghininga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam po ba 
	ninyo--ang magalang na tanong kay Basilio--kung ang paang kanan ay
	<span class="locked">nakakalag na?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipinaulit ni 
	Basilio ang katanungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Paang kanan 
	nino?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nang 
	hari!--ang sagot na maraha't malihim ng kotsero.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinong hari?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang hari 
	natin, ang hari ng mga tagalog....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Basilio ay 
	ngumiti at ikinibit ang balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Muling 
	nagbuntonghininga ang kotsero. Ang mga taga bukid ay may isang alamat na, 
	ang kanilang hari umano na nakukulong at nakatanikala sa yungib ng 
	San&nbsp;Mateo, ay darating isang araw at sila'y palalayain. Bawa't isang daang 
	taon ay napapatid ang isa niyang tanikala, kaya't nakakawala na ang mga 
	kamay at paang kaliwa: wala nang natitira kundi ang paang kanan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kung nagpupumiglas o gumagalaw ang haring ito ay nagiging sanhi ng paglindol at 
	panginginig ng lupa; napakalakas, kaya't inaabutan siya ng isang buto, na 
	nadudurog sa kanyang pisil, ng sino mang nakikipagkamay. Tinatawag siyang 
	Bernardo ng mga tagalog, nang hindi maalaman kung bakit, marahil ay 
	pinagkakamalang siya ang Bernardo del&nbsp;Carpio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Pag nakakalag 
	na ang paang kanan--ang bulong ng kotsero na tinimpi ang isang 
	buntonghininga--ay ibibigay ko sa kanya ang aking mga kabayo, paglilingkuran 
	ko siya at magpapakamatay na ako ng dahil sa kanya.... Ililigtas niya kami 
	sa mga guardia sibil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sinundan ng 
	may hapis na tingin ang tatlong haring <span class="locked">lumalayo na.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sumusunod ang 
	dalawang hanay na batang malulungkot, mga walang katawatawa, na waring 
	pinilit lamang. Ang ilan ay may dalang huepe at ang iba ay kandila, at ang 
	iba ay parol na papel na may tukod na kawayan, at nangagtitilian sa 
	pagdarasal ng rosario, na, waring may kaaway. Sumusunod si San&nbsp;Jose na nasa 
	maralitang andas, na ang anyo ay malungkot at pakumbaba at ang tungkod ay 
	may bulaklak ng asusena, sa gitna ng dalawang guardia sibil na wari nakahuli 
	sa kanya: saka pa lamang nataho ng kotsero kung bakit gayon ang anyo ng 
	santo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa siya'y nagulumihanan sa pagkakakita sa guardia sibil o 
	kaya'y dahil sa wala siyang paggalang sa santong may gayong kaakbay, ay 
	hindi nagdasal ng kahit isang <i xml:lang="la" lang="la">requiem eternam</i> 
	man lamang. Sa likuran ng San&nbsp;Jose ay sumusunod ang mga batang babaeng umiilaw na nangakatalukbong ng panyong nakabuhol sa ilalim ng baba, 
	nagdadasal din ng rosario, ngunit hindi lamang kasinglakas ng mga batang 
	lalaki. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa gitna'y ilan ang may hilahilang mumunting konehong papel, na ang 
	buntot na papel ding ginupit ay nakataas at naiilawan ng isang munting 
	kandilang pula. Dumadalo ang mga bata na dala ang mga laruang iyon upang 
	sumaya ang prusision. At ang mga hayuphayupang matataba't mabibilog na wari 
	itlog ay masasaya mandin kaya't napapalundag, napapagiwang, nabubuwal at 
	nasusunog; lalapitan ng may ari upang patayin ang lagablab, hihip dito, 
	hihip doon, mapapatay ang dingas sa kapapalo at kung minsan ay umiiyak, pag 
	nakitang sirasira ang laruan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Malungkot na napupuna ng kotsero na umuunti sa 
	taon taon ang lahi ng mga hayop na papel, na waring nasasalot ding kagaya ng 
	mga buhay na hayop. Naalaala niya, siya, ang binugbog na si Sinong, ang 
	kanyang dalawang magagandang kabayo, na upang mailayo sa pagkakahawa sa 
	sakit, ay pinaggugulan niya ng sampung piso upang benditahin, alinsunod sa 
	hatol ng kura--yaon ang pinakamabuting panglaban sa
	<span xml:lang="es" lang="es">episootia</span> na natagpuan ng kura at ng 
	Pamahalaan--ngunit gayon man, ay nangamatay din. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y kinakalamay niya 
	ang sarili, sapagka't matapos mawisikan ng agua bendita, matapos ang mga 
	latin ng pari at mga <i xml:lang="es" lang="es">ceremonias</i>, ay nagtaglay 
	ng ugaling pagmamataas ang mga kabayo, nangagmalaki na, ayaw pasingkaw, at 
	sa dahilang siya'y mabuting kristiano ay hindi niya mapalo, sapagka't sinabi 
	sa kanya ng isang <span xml:lang="es" lang="es">Hermano tercero</span> na 
	benditado ang mga kabayong iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang panghuli ng prusision ay ang Birhen, suot '<span xml:lang="es" lang="es">Divina 
	Pastora</span>' na may sombrerong ayos <i xml:lang="fr" lang="fr">frondeuse</i> 
	na may malapad na pardilyas at mahahabang pakpak ng ibon upang ipakilala ang 
	paglalakbay sa Jerusalem. At upang maipahiwatig ang panganganak, ay 
	ipinag-utos ng kura na patambukin ang tiyan at lagyan ng mga basahan at 
	bulak sa ilalim ng saya, upang walang mag-alinlangan sa kanyang kalagayan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang Birhen ay isang magandang larawan, na may anyong hapis, na kagaya ng 
	lahat ng larawang gawa ng mga pilipino, ayos na nahihiya dahil sa ginawa sa 
	kanya marahil ng Padre Kura. Sa dakong harapan ay may ilang kantores at sa 
	likuran ay ilang musiko at ang mga kaukulang guardia sibil. Gaya ng maaantay 
	ay hindi kasama ang kura, matapos ang kanyang ginawa: nang taong iyon ay 
	masama ang loob, sa dahilang kinailangan niyang gamitin ang buo niyang 
	katalinuhan at pananalitang pasilosilo upang ang mga taong bayan ay magbayad 
	ng tatlong pung piso sa bawa't isang '<span xml:lang="es" lang="es">misa 
	de aguinaldo</span>' at hindi dalawampu na gaya nang dating halaga.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nagiging 
	pilibustero kayo--ang sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lubhang 
	natutubigan marahil ang kotsero dahil sa mga bagay na napagkita sa 
	prusision, sapagka't nang makaraan ito at nang ipag-utos ni Basilio na 
	magpatuloy, ay hindi napuna na ang ilaw ng parol ng karomata ay namatay. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa isang dako naman ay hindi rin napuna ni Basilio sapagka't nalilibang sa 
	pagmamasid sa mga bahay na naiilawan, sa loob at labas, ng mga parol na 
	papel na maiinam ang ayos at iba't iba ang kulay, mga bituwing nalilibid ng 
	bilog na may mahahabang palabuntot, na pag nahipan ng hangin ay 
	naglalagaslasan, at mga isdang ang ulo't buntot ay gumagalaw, na may baso ng 
	ilaw sa loob, na pawang nakasabit sa balisbisan ng bahay at siyang 
	nagbibigay nang anyong masaya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Namamasdan ni Basilio na ang mga pag-iilaw ay 
	umuunti rin, na ang mga bitwin ay nawawala, na nang nakaraang taon ay 
	kakaunti na ang mga palamuti at palawit, at nang taong ito ay lalo pa 
	manding kaunti kay sa nakaraan.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Bahagya ng nagkaroon ng musika sa 
	lansangan, ang masasayang galawan sa mga kusinaan ay hindi na namamalas sa 
	lahat ng bahay at ang gayon ay sinapantaha ng bagong tao na alinsunod sa 
	kasamaan ng panahon, ang asukal ay matumal, ang ani ng palay ay nasira, 
	nangamatay ang mahigit sa kalahati ng mga hayop at ang mga buwis ay 
	tumataas, nadadagdagan nang di maalaman kung bakit at sa anong dahil, 
	samantalang naglalalo naman ang pamamaslang ng guardia sibil na siyang 
	pumapatay sa kasayahan ng mga bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ito pa naman 
	ang kanyang iniisip nang madinig ang isang <i xml:lang="es" lang="es">alto!</i> 
	na nagumugong. Kasalukuyang nagdaraan sila sa harapan ng kuartel at napuna 
	ng isang bantay na patay ang tanglaw ng kalesa at ang bagay na iyon ay hindi 
	dapat manatili. Sunod-sunod na mura ang tinanggap ng kaawaawang kotsero na 
	nagsabing ang kadahilanan noon ay ang kahabaan ng prusision, at sa dahilang 
	pipiitin at ilalathala sa mga pahayagan, sapagka't lumabag sa ipinag-uutos 
	ay lumunsad sa sasakyan ang ayaw ng basagulo at mahinahong si Basilio at 
	ipinatuloy ang lakad na pasan ang kanyang takba.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yaon ang San 
	Diego, ang kanyang bayan, na wala man siya ni isang kamag-anak......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang tanging 
	bahay na nakita niyang masaya ay ang kay kapitang&nbsp;Basilio. Ang mga tandang 
	at mga inahin ay nag-iiyukan, na sinasaliwan ng mga tunog ng wari 
	nagtatadtad ng karne sa sangkalan at ng sagitsit ng mantika sa kawali. May 
	handa sa bahay at umaabot sa lansangan ang maminsan minsang simoy na may 
	halong amoy ng ginisa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa entresuelo 
	ay nakita ni Basilio si Sinang, na pandak ding gaya ng makilala ng aming 
	mangbabasa, kahit tumaba at lalo pang bumilog sapol ng magka-asawa. At 
	siya'y napamangha nang makitang kausap ni kapitang&nbsp;Basilio, ng Kura at ng 
	alperes ng guardia sibil ang mag-aalahas na si Simoun na may salaming asul 
	sa mata at kilos malaya ring gaya ng dati.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Yari na, 
	ginoong Simoun,--ang sabi ni kapitang&nbsp;Basilio--tutungo kami sa Tiani upang 
	tingnan ang inyong mga hiyas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ako ma'y 
	paparoon din--anang alperes--sapagka't kailangan ko ang isang tanikala sa 
	relos, ngunit mayroon akong maraming gawain.... Kung iibigin sana ni 
	kapitang&nbsp;Basilio na siya na ang mamanihala....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Malugod na 
	sumang-ayon si kapitang&nbsp;Basilio at sa dahilang ibig niyang makasundo ang 
	militar upang huwag siyang magambala, sa paggambala sa kanyang mga tao, ay 
	ayaw tanggapin ang halagang pinagpipilitang dukutin ng alperes sa bulsa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Iyon na ang 
	aking pamasko!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi ko 
	mapapayagan, kapitan, hindi ko mapapayagan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Siya, siya! 
	Saka na tayo magtuos sa huli!--ang sabing mapagparaya ni kapitang&nbsp;Basilio.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang Kura man 
	ay nangangailangan din ng hikaw at ipinagbilin sa kapitan na ipakibili na 
	siya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang ibig ko 
	ay yaong mabuti. Saka na tayo magtuos.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Huwag kayong 
	mag-alaala Padre Kura,--ang sabi niya, na ibig ding makasundo ang 
	nasa dako ng simbahan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang patibay 
	na masama ng kura ay ikagagambala niya ng malaki at ibayo pa ang magugugol: 
	ang hikaw na iyon ay isang sapilitang handog. Samantala nama'y pinupuri ni 
	Simoun ang kanyang mga hiyas.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nakagugulat 
	ang taong ito!,--ang sabi sa sarili ni Basilio--sa lahat ng pook ay 
	nakapangangalakal.... At kung paniniwalaan natin ang <em>ilan</em>, ay 
	binibili niya sa ilang ginoo, sa munting halaga, ang mga ipinagbili din 
	niyang hiyas upang ipang-alay.... Ang lahat ay nakapangangalakal sa 
	Sangkapuluang ito; kami lamang ang tanging hindi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nagpatuloy 
	sa kanyang bahay, sa bahay ni Kapitan&nbsp;Tiago, na tinatahanan ng isang 
	katiwala. Inaantay siya, upang balitaan, ng katiwala na may malaking 
	paggalang sa kanya mula noong makita siyang bumubusbos na waring inahing 
	manok lamang ang iniiwaan. Ang dalawang manggagawa ay napipiit, ang isa'y 
	matatapon sana sa malayong bayan.... namatay ang ilang kalabaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang dati rin, 
	matatandang balita!--ang may yamot na putol ni Basilio--Kailan pa man ay 
	ganyan ang pasalubong ninyo sa akin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang binata'y 
	hindi ganid, ngunit sa dahilang madalas siyang makagalitan ni Kapitan&nbsp;Tiago, ay iginaganti naman niya sa kanyang mga napag-uutusan. Ang 
	matanda'y nag-apuhap ng bagong balita.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Namatay ang 
	isa nating mangsasaka, ang matandang bantay sa gubat, at hindi pumayag ang 
	kura na malibing ng libing mahirap, sapagka't mayaman daw ang panginoon!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At sa ano 
	namatay?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa katandaan 
	na!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ba, namatay 
	sa katandaan? Kung namatay ng dahil sa isang sakit man lamang sana!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang ibig ni Basilio ay may sakit, dahil sa kanyang hangad na makagawa ng '<span xml:lang="es" lang="es">autopsia</span>'.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala na baga 
	kayong maibabalita sa aking bagong bagay? Nawawalan tuloy ako ng gana sa 
	pagkain dahil sa pagbabalita ng mga bagay na gaya rin ng dati. May balita 
	baga kayong ukol sa Sapang?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isinalaysay ng 
	matanda ang pagkakabihag kay Kabesang Tales. Si Basilio ay napahintong 
	nagmumunimuni at hindi umimik. Hindi na nakakain.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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