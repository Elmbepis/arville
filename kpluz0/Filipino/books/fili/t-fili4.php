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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">IV. Si Kabesang Tales</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	nakabasa ng unang bahagi ng kabuhayang ito, ay maaalaala marahil ang isang 
	matandang magkakahoy na naninirahan doon sa kalookan ng isang gubat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Tandang 
	Selo ay buhay pa at kahit ang kanyang buhok ay pumuti na ay mabuti rin ang 
	kanyang katawan. Hindi na nanghuhuli sa bitag at hindi na rin nagpuputol ng 
	kahoy; sa dahilang bumuti na ang kabuhayan ay naggagawa na lamang ng walis.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang kanyang 
	anak na si Tales (palayaw ng Telesforo) ay nakisama muna sa isang 
	namumuhunan; ngunit ng malaunan, ng magkaroon ng dalawang kalabaw at mga 
	ilang daang piso, ay gumawa na sa sarili, na katulong ang kanyang ama, ang 
	kanyang asawa at ang kanyang tatlong anak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Hinawan nga at lininis ang makapal na gubat na nasa labasan ng bayan na 
	inakala nilang walang may-ari. Nang kanilang ginagawa ang lupa at maayos ay 
	linagnat na isa isa silang mag-aanak at namatay ang Ina at anak na panganay 
	na si Lucia, na nasa katamtamang gulang. Ang bagay na iyon na sadyang 
	ibinibigay ng pagkakabungkal ng lupa na sagana sa sarisaring bagay, ay 
	inakala nilang higanti ng mga laman-lupang naninirahan sa gubat, kaya't 
	kinalamay nila ang kanilang loob at ipinagpatuloy ang gawain sa pag-asang 
	lumipas na ang pagkamuhi ng espiritu. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nang aanihin na ang unang tanim ay 
	inangkin ang mga lupang iyon ng isang '<span xml:lang="es" lang="es">Corporacion</span>' ng 
	mga prayle na may pag-aari sa bayang kalapit, na ang ikinakatwiran ay nasa 
	sa loob ng kanilang mga hanganan, at upang mapatunayan ang gayon ay itinayo 
	noon din ang kanilang mga muhon. Gayon man, ay pinabayaan siya ng 
	tagapangasiwa ng mga pari upang pag-anihan, kailan man at magbabayad siya sa 
	taon taon ng isang munting halaga, isang walang gaano, dalawampu o tatlong 
	pung piso.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Tales, na 
	mabait sa dilang mabait, ayaw sa usapin na gaya ng iba at masunurin sa mga 
	praile gaya ng ilan, sa pag-iwas na ibunggo ang isang palyok sa isang 
	kawali, gaya ng sabi niya, (sa ganang kanya'y kasangkapang bakal ang mga 
	prayle at siya'y kasankapang putik), ay umalinsunod sa kahilingan, dahil sa 
	naisip niyang siya'y hindi marunong ng wikang kastila at walang maibabayad 
	sa mga tagapagtanggol. At saka sinabi sa kanya ni <span class="locked">
	Tandang Selo, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tiisin mo na! 
	malaki pa ang magugugol mo sa pakikipag-usapin ng isang taon kay sa magbayad 
	ng makasampu ng hinihiling ng mga paring puti. Hmh! Marahil ay gantihin ka 
	naman nila ng misa. Ipagpalagay mong ang tatlong pung pisong iyan ay natalo 
	sa sugal, o kaya'y nahulog sa tubig at kinain ng buwaya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ani ay 
	naging masagana, nabili sa mabuting halaga, at inisip ni Tales ang magtayo 
	ng isang bahay na tabla sa nayon ng Sapang, ng bayang Tiani, na kalapit ng 
	San&nbsp;Diego.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakaraan ang 
	isa pang taon at dumating ang isa pang mabuting ani, at dahil sa paganito o 
	pagayong sanhi ay ginawa ng mga prayle na limang pung piso ang
	<i xml:lang="es" lang="es">canon</i>, na pinagbayaran naman ni Tales upang 
	huwag silang magkagalit at sa dahilang umasang maipagbibili sa mabuting 
	halaga ang asukal.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tiisin mo na! 
	Ibilang mong lumaki ang buwaya,--ang payo ni maTandang Selo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang taong 
	yaon ay naganap ang kanilang pangarap: manirahan sa bayan, sa kanilang bahay 
	na tabla sa nayon ng Sapang, at inisip ng ama at ng nuno ang papag-aralin 
	ang dalawang magkapatid, lalonglalo na ang babae, si Juliana o Huli, gaya ng 
	kanilang tawag, na magiging maganda sa wari. Isang batang lalaki, si 
	Basilio, na kanilang kaibigan at kagaya rin nila sa uri ay nag-aaral na noon 
	sa Maynila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ngunit ang 
	pangarap na ito'y waring ukol sa hindi pangyayari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang unang 
	ginawa ng bayan, ng makita ang unti-unting pagtighaw nila, ay ang paghahalal 
	na kabisa sa pinakamalakas na gumawa sa mag-aanak; ang anak na panganay na 
	si Tano ay may labing apat na taon pa lamang. Tinawag na ngang 
	Kabesang Tales, nangailangang magpagawa ng <i xml:lang="es" lang="es">
	chaqueta</i>, bumili ng isang sambalilong pieltro at humanda sa paggugugol. 
	Upang huwag makipagkagalit sa Kura at sa Pamahalaan ay pinagpapaluwalan niya 
	ang naaalis sa padron, ipinagbabayad ang mga umaalis at namamatay, 
	nag-aaksaya ng maraming panahon sa paniningil at pagtungo sa
	<i xml:lang="es" lang="es">Cabecera</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magtiis ka 
	na! Ipagpalagay mong dumating ang mga kamag-anak ng buwaya,--ang sabing 
	nakangiti ni Tandang Selo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa taong 
	darating ay magsusuot ka na ng <i xml:lang="es" lang="es">de cola</i> at 
	paparoon ka sa Maynila, upang mag-aral na gaya ng mga dalaga sa bayan!--ang 
	sabi-sabi ni Kabesang Tales sa kanyang anak kailan ma't madidinig dito ang 
	mga pagkatuto ni Basilio. Ngunit ang taong darating na iyon ay hindi 
	sumasapit at sa kanya'y napapalit ang pagdaragdag sa buwis ng lupa; 
	natubigan na si Kabesang Tales at nagkakamot ng ulo. Ibinibigay na ng 
	lutuang putik ang kanyang bigas sa <i xml:lang="es" lang="es">caldero</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang umabot sa 
	dalawang daang piso ang <i xml:lang="es" lang="es">canon</i> ay hindi na 
	nagkasiya si Kabesang Tales sa pagkamot sa ulo at pagbubuntong hininga: 
	tumutol at bumulongbulong. Nang mangyari ang gayon ay sinabi sa kanya ng 
	prayleng tagapangasiwa, na, kung hindi siya makababayad ay iba ang 
	magtatanim sa mga lupang yaon. Maraming may nasa ang nagbabayad.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inakala ni 
	Kabesang Tales na nagbibiro ang prayle, ngunit tinototoo ng pari ang 
	pagsasalita't itinuturo ang isa sa mga alila niya na siyang kukuha ng lupa. 
	Ang kaawaawang tao'y namutla, ang tainga niya'y umugong, isang mapulang ulap 
	ang tumakip sa kanyang paningin at doo'y namalas ang kanyang asawa't anak na 
	babaeng nangamumutla, yayat, naghihingalo, dahil sa walang gisaw na lagnat. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At pagkatapos ay namalas ang makapal na gubat na naging bukirin, namalas 
	niya ang agos ng pawis na dumidilig sa mga lubak, namalas niya siya, siya 
	rin, ang kaawaawang si Tales, na nag-aararo sa gitna ng arawan, na 
	nasusugatan ang mga paa sa mga bato't tuod, samantalang ang uldog na iyon ay 
	nagliliwaliw na nakasakay sa isang sasakyan at yaong kukuha ng kanyang ari 
	ay susunodsunod na gaya ng isang alipin sa kanyang panginoon. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ah, hindi! 
	makalilibong hindi! Lumubog na muna ang mga kaparangang yaon sa kailaliman 
	ng lupa at malibing na silang lahat. Sino ang dayuhang iyon upang magkaroon 
	ng karapatang makapag-ari sa kanyang mga lupain? Nagdala baga siya ng 
	pumarito ng isang dakot man lamang ng alabok na iyon? Nabaluktot baga ang 
	isa man sa mga daliri niya sa pagbunot ng isang ugat man lamang na nanuod 
	doon?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Bugnot na sa 
	mga pagbabala ng prayle na nag-aakalang papaghariin ang kanyang mga 
	karapatan sa lahat ng paraan, sa harap ng ibang naninirahan doon ay 
	nagmatigas si Kabesang Tales, ayaw magbayad, ni isa mang kuwarta, at dala rin 
	sa harap ang mapulang ulap, ay sinabing ipagkakaloob lamang niya ang kanyang 
	mga bukirin sa dumilig muna doon ng dugo ng kanyang mga ugat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang makita ni 
	maTandang Selo ang mukha ng kanyang anak, ay hindi nakapangahas na banggitin 
	ang buwaya, ngunit tinangka niyang paglubagin sa pagsasabi ng ukol sa mga 
	kasangkapang putik at ipinaalaala, na sa mga usapin, ang nananalo'y 
	nawawalan ng baro't salawal.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa alabok 
	tayo mauuwi, ama, at wala tayong damit ng sumilang sa maliwang!--ang sagot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At nagmatigas 
	na sa hindi pagbabayad ni ibigay ang isang dangkal man lamang ng kanyang 
	lupa, kung hindi ipakikilala muna ng mga prayle ang katibayan ng kanilang 
	paghahabol sa paraan ng pagpapakita ng kahit anong kasulatan. At sa 
	dahilang walang maipakita ang mga prayle ay nagkaroon ng usapin, at 
	tinanggap ang gayon ni Kabesang Tales sa pag-asang kundi man ang lahat ay 
	may ilang lumilingap sa katwiran at gumagalang sa mga kautusan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Naglilingkod 
	ako at marami ng taong ako'y naglilingkod sa hari, sa tulong ng aking salapi 
	at mga pagpapagod,--ang sabi sa mga nagwiwikang wala siyang 
	mararating:--hinihiling ko sa kanya ngayon na lingapin ang aking katwiran at 
	lilingapin niya ako.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At akay ng 
	isang kasawian at parang sa usapin ay natataya ang kanyang kabuhayan sa araw 
	ng bukas at ang sa kanyang mga anak, ay ginugol ang kanyang naiipon sa 
	pagbabayad sa mga abogado, escribano at procurador, na hindi pa kabilang 
	dito ang mga kawani at mga taga-sulat na sinasamantala ang kanyang 
	kamangmangan at kalagayan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Yao't dito siya sa pangulong bayan ng lalawigan, 
	nakararaan siya ng buong maghapon na hindi kumakain at hindi natutulog, at 
	ang kanyang pakikipagusap ay pawang tungkol sa mga kasulatan, pagharap, 
	paghahabol sa lalong may mataas na kapangyarihan, <abbr>at iba pa.</abbr> </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Noon 
	nakita ang isang labanang hindi pa namamasdan sa silong ng langit ng 
	Pilipinas: ang sa isang maralitang indio, mangmang at walang mga kaibigan, 
	tiwala sa kanyang katwiran at sa kabutihan ng kanyang pinag-uusig, na 
	nakikilaban sa isang malakas na '<span xml:lang="es" lang="es">corporacion</span>' 
	na niyuyukuan ng kapangyarihan at sa harap niya'y binibitiwan ng mga hukom 
	ang kanilang timbangan at isinusuko ang kanilang tabak. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Mapilit sa 
	pakikitunggali na waring langgam na kumakagat, gayong nakikilalang siya'y 
	matitiris, waring langaw na tinatanaw ang kalawakang walang hanggan sa likod 
	ng isang salamin. Ah! Ang kasangkapang lupa, sa pakikipaglaban sa mga
	<i xml:lang="es" lang="es">caldero</i>, ay may nakahahanga ring anyo, sa 
	pagkadurog: taglay niya ang kaigtingan ng pagdumog ng walang pag-asa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa mga 
	araw na hindi siya naglalakbay, ay dinadaan niya sa paglilibot sa kanyang 
	bukirin na dala ang isang baril, sinasabisabi niyang ang mga tulisan ay 
	nangloloob at nangangailangang magtanggol siya upang huwag mahulog sa 
	kanilang mga kamay at matalo ang usap. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At waring pagsasanay sa pagtudla ay 
	binabaril ang mga ibon at mga bungang kahoy, bumabaril ng mga paroparo ng 
	walang kalihislihis, kaya't ang tagapangasiwang uldog ay hindi na nangahas 
	na tumungo sa Sapang kung walang kasamang mga guardia sibil, at ang palamon 
	ng pari na nakakita sa magandang tikas ni Kabesang Tales na naglilibot sa 
	kanyang bukirin na wariy isang bantay, ay umayaw nang lipus ng takot na 
	kunin ang pag-aari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y 
	hindi makapangahas na bigyan siyang katwiran ng mga hukom pamayapa sa bayan 
	at nang nasa <i xml:lang="es" lang="es">cabecera</i>, dahil sa natatakot 
	maalis sa katungkulan, sapagka't nadadala na dahil sa isang kaagad-agad ay 
	inalis. At hindi naman masasama ang mga hukom na iyon, pawang taong 
	matatalino, matapat, mabubuting mamamayan, maririlag na mga magulang, 
	mabubuting anak... at nakatataya ng kalagayan ni Tales ng mabuti pa kay sa 
	sariling may katawan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Marami sa kanila ang nakababatid ng mga sanhi at 
	pangyayari nang pagkakaari, alam nilang ang mga prayle ay hindi dapat 
	magkaroon ng mga pag-aaring lupa alinsunod sa kanilang mga palatuntunan, 
	ngunit alam din naman nila na ang panggagaling sa malayo, ang pagtatawid 
	dagat sa pagtupad sa katungkulang pinaghirapang lubha bago nakamit, mag-usig 
	na makagampang mabuti at pawalan ang lahat ng iyon dahil lamang sa 
	sinapantaha ng isang indio na ang katwiran ay gaganapin sa lupa ng gaya sa 
	langit, aba! Isa rin namang kahibangan ang gayon! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sila ay mayroon din namang 
	mga kaanak at marahil ay may malaki pang pangangailangan kay sa indiong 
	yaon: ang isa'y may inang pinadadalhan sa tuwina ng salapi, at mayroon pa 
	bang kabanalbanalang bagay na gaya ng pakanin ang isang ina?; ang isa ay may 
	mga kapatid na babaeng napapanahon sa pag-aasawa, ang isa pa'y may mga anak 
	na maliliit na nag-aantay ng pagkain na waring mga inakay sa pugad na 
	marahil ay mangamatay pagdating ng araw na maalis sa katungkulan; at ang 
	pinakamunti ay may asawang nalalayo, lubhang malayo, na kung hindi tumanggap 
	ng ukol na salapi ay magigipit...... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">At ang lahat ng hukom na iyon, na ang 
	marami sa kanila'y may mga budhi at may malinis na hilig, ay nag-aakalang 
	ang lalong pinakamabuti nilang magagawa ay ang himukin sa pagkakasundo, sa 
	paraang magbayad si Kabesang Tales ng buwis na hinihingi. Ngunit si Tales, 
	gaya ng sinomang may maikling paghuhulo, ay patuloy sa layon, kailan ma't 
	nakakabanaag ng katwiran. Humihingi ng mga katunayan, katibayan, kasulatan,
	<i xml:lang="es" lang="es">titulo</i>, ngunit walang maipakita ang mga 
	prayle at walang pinanghahawakan kundi ang mga nakaraang pag-alinsunod.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y, ang 
	tutol naman ni Kabesang Tales:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung sa araw 
	araw ay naglilimos ako sa isang pulube upang huwag na lamang akong yamutin 
	sino ang makapipilit sa akin na magpatuloy ako sa pagbibigay, kung 
	nagpapakasagwa naman?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At walang 
	makapag-patinag sa kanya sa gayon at wala namang bantang makapagpalubag sa 
	kanya. Walang nangyari sa Gobernador&nbsp;M.... na naglakbay at sinadya siya 
	upang takutin; ang lahat ay sinasagot niya nang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magagawa 
	ninyo ang ibig gawin, <abbr>G.</abbr>&nbsp;Gobernador, ako'y isang mangmang at 
	wala akong lakas. Ngunit inayos ko ang mga bukiring ito, ang asawa ko't 
	anak ay nangamatay sa pagtulong sa akin sa paglilinis, kaya't hindi ko siya 
	maipagkakaloob sa sino mang hindi makagawa sa kanila ng higit sa ginawa ko. 
	Diligin muna sila ng dugo ng nagnanasa at ilibing sa kanila ang asawa't 
	anak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	kinahinatnan, sa katigasang ito ng ulo, ay ang bigyan ng katwiran ang mga 
	prayle ng mga matapat na hukom, at siya'y pinagtatawanan ng bala na at 
	pinagsasabihan pang hindi naipapanalo ang mga usapin ng dahil sa katwiran. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Gayon man ay patuloy din siya sa paghahabol, linalagyan ng punlo ang kanyang 
	baril at mahinahong liniligid ang kanyang lupain. Sa kapanahunang iyon ay 
	waring isang pangarap ang kanyang kabuhayan. Ang kanyang anak na si Tano, 
	binatang kasingtaas ng ama, at gaya ng kapatid na babae sa kabutihan, ay 
	nasundalo; pinabayaan niyang lumakad at hindi ibinayad ng makakapalit.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magbabayad 
	ako sa mga abogado,--ang sabi sa anak na babaeng umiiyak:--kung manalo ako sa 
	usapin ay mapababalik ko siya, ngunit kung ako'y matalo ay hindi ko 
	kailangan ang anak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Lumakad ang 
	anak at ang tanging balitang tinanggap ay ang pinutulan ng buhok at 
	natutulog sa ilalim ng isang karreta. Nang makaraan ang anim na buwan ay may 
	nagsabing nakitang dinala sa Carolinas; may ilang nagbabalitang tila 
	nakitang suot guardia sibil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Guardia sibil 
	si Tano! Susmariosep!--ang pamangha ng ilan na sabay sa pagtatalukob 
	kamay:--Si Tano na napakabuti at napakabait! Rekimeternam!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May ilang araw 
	na hindi binati ng nuno ang ama, si Huli ay nagkasakit, ngunit hindi tumulo 
	ang isa mang patak na luha ni Kabesang Tales; dalawang araw na hindi umalis 
	sa bahay, na waring nangangamba sa pagsisi ng kanyang mga kanayon; natatakot 
	tawaging siyang pumatay sa kanyang anak. Ngunit ng ikatlong araw ay muling 
	lumabas na dala ang kanyang baril.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">May 
	nagsapantaha na siya'y may nasang pumatay ng tao at may isang nagsabi na 
	nadinig umanong ibinubulong niya ang balang ibaon ang uldog sa mga lubak ng 
	kanyang bukirin; kaya't mula noo'y kinatakutan na siyang lubha ng prayle. 
	Dahil dito'y pumanaog ang isang utos ng Capitan General na nagbabawal ng 
	paggamit ng baril at ipinasasamsam na lahat. Ibinigay ni Kabesang Tales ang 
	kanyang baril, ngunit nagpatuloy din sa kanyang pagbabantay na ang dala ay 
	isang mahabang itak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano ang 
	gagawin mo sa itak na iyan sa ang mga tulisan ay may baril?--ang sabi sa 
	kanya ni maTandang Selo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kailangan 
	kong bantayan ang aking mga pananim,--ang sagot;--ang bawa't isang tubo doon 
	ay isang buto ng aking asawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inalisan siya 
	ng itak dahil sa napakahaba. Ang ginawa naman niya ay kinuha ang matandang 
	palakol ng kanyang ama at ipinatuloy ang kanyang paglalakad na 
	nakapangingilabot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Si maTandang Selo at si Huli ay nangangamba sa tuwing aalis siya ng bahay. 
	Si Huli ay titindig sa habihan, dudungaw, nagdadasal ng mga nobena. Ang 
	matanda naman ay hindi matumpak kung minsan sa pagyari ng buklod ng walis at 
	nasasabisabing pagbabalikan ang gubat. Ang pamumuhay sa bahay na iyon ay 
	napakahirap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nangyari din 
	ang kinatatakutan. Sa dahilang ang bukid ay malayo sa pook ng mga bahay, 
	kahit na may palakol si Kabesang Tales ay nabihag ng mga tulisan, na may 
	mga rebolber at baril. Sinabi sa kanya ng mga tulisan na yamang mayroon 
	siyang naibabayad sa mga hukom at tagatanggol-usap ay dapat din naman siyang 
	magkaroon ng maibibigay sa mga nawawakawak sa kabuhayan at mga pinag-uusig. 
	Dahil doon ay hiningan siya ng limang daang pisong tubos sa pamamagitan ng 
	isang tagabukid at pinatibayan pang pag may nangyari sa utusan ay ititimbang 
	ang buhay ng dakip. Dalawang araw ang ibinigay na taning.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ikinasindak na 
	lubha ng mag-anak ang balita at lalo pa manding naragdagan ang gayon, ng 
	mabatid na lalabas ang Guardia sibil upang usigin ang mga tulisan. Kung 
	magkatagpo at magkalabanan ay alam ng lahat na ang unang mapapatay ay ang 
	dakip. Nang tanggapin ang balita'y hindi nakatinag ang matanda, at ang anak 
	na babae, sa gitna ng pamumutla't pagkasindak, ay makailang nagnasang 
	mangusap, ngunit hindi nangyari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Datapwa'y isang hinalang lalong mabigat 
	ang nakapagpabalik sa kanilang diwa. Ang sabi ng tagabukid na inutusan ng 
	mga tulisan, ay marahil magsisilayo sila, kaya't kung magluluwat sa 
	pagbibigay ng tubos ay lalawig ang araw at si Kabesang Tales ay pupugutan ng 
	ulo. Ang sabing ito'y nakatulig sa dalawa, na kapwa mahihina at kapwa 
	walang magawa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Si 
											Tandang Selo ay mapaupo't mapatindig, akyat manaog, hindi 
	malaman ang tunguhin, hindi malaman ang lapitan. Si Huliy padulogdulog sa 
	kanyang mga larawan ng santo, ulit uling binilang ang salapi, ngunit ang 
	dalawang daang piso'y hindi nararagdagan, ayaw dumami, biglang magbibihis, 
	iipunin ang lahat ng kanyang hiyas, hihinging sanguni sa matanda, 
	tatangkaing makipagkita sa Kapitan, sa hukom, sa tagasulat, at sa teniente 
	ng Guardia sibil. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Oo ang sagot ng matanda sa lahat, at pag sinabi ng batang 
	huwag ay huwag din naman siya. Dumating ang ilang babaeng kapitbahay na 
	kamag-anakan at kakilala, mga maralita, at may maralita pa kay sa iba, mga 
	walang malay na tao at minamalaki ang lahat ng bagay. Ang pinakamatalas sa 
	lahat ay ang pusakal na pagingera na si Hermana&nbsp;Bali na nanirahan sa Maynila 
	upang mag <i xml:lang="es" lang="es">ejercicio</i> sa beaterio ng
	<span xml:lang="es" lang="es">La&nbsp;Compa&ntilde;ia</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ipagbibili ni 
	Huli ang lahat ng kanyang mga hiyas liban lamang ang isang agnos na may 
	brillante at esmeralda na bigay ni Basilio. Ang agnos na iyon ay may 
	kasaysayan; ibinigay ng <i xml:lang="es" lang="es">monja</i> na anak ni 
	Kapitan&nbsp;Tiago sa isang ketongin, dahil sa pagkakagamot ni Basilio sa may 
	sakit ay ibinigay nito na parang isang handog. Hindi niya maipagbili 
	hanggang hindi maalaman ng nagbigay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Madaling 
	ipinagbili ang mga suklay, hikaw at kuwintas ni Huli sa isang mayamang 
	kapitbahay at dinagdagan pa ng limang pung piso; kulang pa rin ng dalawang 
	daan at limang pu. Maaaring isangla ang agnos, ngunit napailing si Huli. 
	Iminunkahi ng isang kalapit na ipagbili ang bahay, bagay na sinangayunan ni 
	Tandang Selo ng buong lugod, sapagka't babalik sa gubat upang makapangahoy 
	na muli na gaya noong una, ngunit ang gayon ay hindi mangyayari ang sabi ni 
	Hermana&nbsp;Bali sa dahilang wala ang tunay na may-ari.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Minsan ay 
	pinagbilhan ako ng isang tapis ng asawa ng hukom, sa halagang piso, at 
	kadumatdumat ay sinabi ng asawa na wala raw kabuluhan ang bilihang iyon 
	sapagka't wala siyang malay. Aba! Kinuha sa akin ang tapis at hindi isinauli 
	sa akin ng babae ang piso hangga ngayon, ang ginagawa ko naman ay hindi ko 
	siya binabayaran sa panginge kung siya'y nananalo, aba! Sa gayong paraan ay 
	nasingil ko siya ng labing dalawang kuwarta; dahil lamang naman sa kanya kung 
	kaya ako nagsusugal. Hindi ko mapapayagang hindi ako pagbayaran, aba!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tatanungin 
	sana ng isang kalapit kung bakit hindi siya pinagbabayaran ni
	<abbr title="Hermana">Hma.</abbr>&nbsp;Bali sa isang maliit na utang, ngunit 
	natalasan ng pangingera, kaya't nagpatuloy kaagad:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Alam mo Huli ang mabuti mong gawin? Isangla mo muna sa halagang dalawang 
	daan at limang pung piso ang bahay, sanlang pagbabayaran hanggang sa manalo 
	ang usap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ito ang 
	pinakamabuti sa mga balak, kaya't tinangkang gawin noon ding araw na iyon. 
	Sinamahan ni Hermana&nbsp;Bali at linibot nila ang lahat ng bahay ng mayayaman sa 
	Tiani, ngunit walang pumayag sa gayong kasunduan: anila'y talo ang usap, at 
	ang pagtulong sa isang kalaban ng mga prayle ay parang humahanda na sa 
	paghihiganti nito. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sa kahulihulihan ay nakatagpo rin ng isang matandang 
	mapanata na nahabag sa kanyang kalagayan, ibinigay ang halaga sa pamamagitan 
	ng kasunduan na si Huliy paaalila sa kanya hanggang sa mabayaran ang utang. 
	Sa isang dako naman ay walang maraming gagawin si Huli, manahi lamang, 
	magdasal, samahan siya sa simbahan, magpanata maminsanminsan ng patungkol sa 
	kanya. Lumuluhang pumayag si Huli sa kasunduan, tinanggap ang salapi at 
	nangakong sa kinabukasan, araw ng Pasko, ay maglilingkod na siya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang matanto 
	ng matanda ang gayong halos pagbibili ng katawan, ay nag-iiyak na wariy 
	bata. Di yata't ang apo niyang yaon na ayaw niyang palalakarin sa init ng 
	araw upang huwag masunog ang balat, si Huling may maliliit na daliri at 
	mapulang sakong, di yata! Ang binibining yaon na siyang pinakamaganda sa 
	nayon at marahil ay sa buong bayan, na lagi nang tinatapatan ng mga binatang 
	nagtutugtugan at nagkakantahan, di yata! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang bugtong niyang apo, ang 
	kabugtong niyang anak, ang tanging lugod ng malabo niyang paningin, yaong 
	pinangarap niyang nakasayang mahaba, nagsasalita ng wikang kastila at 
	nagpapaypay ng pamaspas na may mga pinta, na kagaya ng mga anak ng mayaman, 
	yaon ang papasok na alilang kagagalitan at pagwiwikaan, upang masira ang 
	kanyang mga daliri, upang makatulog sa kahit saang sulok at magising nang 
	walang patumanga?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang matanda'y 
	walang humpay sa kaiiyak, sinasabisabing siya'y magbibigti at magpapakamatay 
	sa gutom.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung aalis 
	ka--ang sabi--ay babalik ako sa gubat at hindi na ako tutuntong ng bayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pinapayuhan 
	siya ni Huli na kinakailangang makabalik ang ama, at pag nanalo ang usapin 
	ay madali siyang matutubos sa pagkaalila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dinaang 
	malungkot ang gabing yaon; alin man sa dalawa ay hindi nakakain at ang 
	matanda'y nagmatigas na hindi humiga, at magdamag na naupo na lamang sa 
	isang sulok, walang imik, ni kakibokibo, at hindi man kumikilos. Sa isang 
	dako naman ay tinangka ni Huli ang matulog, ngunit malaong hindi napikit 
	ang mga mata. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Nang mapayapa na dahil sa kapalaran ng magulang, ay ang kanya 
	namang kalagayan ang inisip ngunit tinitimpi ang pag-iyak na walang humpay 
	upang huwag madinig ng matanda. Sa kinabukasan ay alila na siya, at yaon pa 
	naman ang araw na karaniwang idating ni Basilio na galing sa Maynila't may 
	dalang handog sa kanya.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Dapat na niyang limutin ang pag-irog na iyon; si 
	Basilio, na di malalao't magiging manggagamot, ay hindi maaaring mag-asawa 
	sa isang maralita.... At nakikinikinita niya na tumutungo sa simbahang 
	kasama ng pinakamayaman at pinakamagandang dalaga sa bayan, na kapwa sila 
	gayak na gayak, maliligaya at kapwa nangakangiti, samantalang siya, si 
	Huli, ay susunodsunod sa kanyang panginoon at ang dala'y nobena, hitso at 
	duraan. Pagsapit sa dakong ito'y nakaramdam siya ng isang paghihigpit ng 
	lalamunan, isang pataw na malaki sa puso at hinihingi niya sa Birhen na 
	mamatay na muna siya bago mamalas ang gayon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Datapwa't--aniya sa sariling budhi--malalaman niya na pinili ko pa ang ako na 
	ang masangla kay sa masangla ang agnos na bigay niya sa akin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang pagkukurong ito&#39;y nakapagpalubag ng kaunti sa kanyang sama ng loob at 
	nagpangarap na siya ng sarisari. Sino ang makapagsasabi? maaaring mangyari 
	ang kababalaghang makakuha siya ng dalawang daan at limang pung piso sa 
	ilalim ng larawan ng Birhen; marami na siyang nabasang kababalaghan na gayon 
	ang pangyayari! </font>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Maaaring huwag sumilang ang araw at samantala&#39;y mapanalo ang 
	usap bago mag-umaga. Maaaring makabalik ang kanyang ama; makapupulot siya sa 
	bakuran ng isang gusi, ang mga tulisan ang siyang may padala sa kanya ng 
	gusi; ang kura, si Padre Camorra na nagbibiro sa kanyang parati, ay 
	mangyayaring dumating na kasama ng mga tulisan....</font><p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Lumalaon lumalaon ay 
	unti-unting nagugulo ang kanyang mga pag-iisip hanggang, sa, dahil sa 
	pagkapata at pagdadalamhati ay nakatulog, na pinapangarap ang kanyang 
	kabataan doon sa gitna ng kagubatan: siya&#39;y naliligo sa batis na kasama ang 
	dalawa niyang kapatid.</font><p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											May mga isdang sarisari ang kulay na napahuhuling 
	wariy tanga, at nayayamot siya sapagka&#39;t hindi siya masiyahang loob sa 
	panghuhuli niyong mga isdang napakaamo: si Basilio ay nasa ilalim ng tubig, 
	ngunit hindi niya maalaman kung bakit ang mukha ni Basilio ay ang sa 
	kanyang kapatid na si Tano. Sila&#39;y minamatyagan mula sa pampang ng kanyang 
	bagong pinaglilingkurang babae.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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