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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXIX. Mga Huling Salitang Ukol kay Kapitan Tiago</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si 
	Kapitan&nbsp;Tiago ay nagkaroon ng mabuting hangganan at mainam na 
	libing. Tunay nga na ipinaalaala kay Padre Irene ng kura sa
	<i xml:lang="es" lang="es">parokya</i> na si Kapitan&nbsp;Tiago ay namatay 
	nang hindi nagkukumpisal, ngunit ang mabuting pari, samantalang nakangiti 
	nang palibak, ay hinimas ang kanyang ilong at <span class="locked">sumagot 
	na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Bah ako ba 
	naman ang paglalakuan! Kung ating ipagkakait ang <i xml:lang="es" lang="es">
	exequias</i> sa mga namamatay ng hindi nagkukumpisal, ay malilimutan natin 
	ang <i xml:lang="es" lang="es">De profundis</i>! Ang mga kahigpitang iyan, 
	gaya ng inyong pagkabatid na mabuti, ay pinaiiral lamang kapag ang hindi 
	nakapagkumpisal ay walang ibabayad, ngunit kay Kapitan&nbsp;Tiago!... Bah! kung 
	sampu ng mga intsik na hindi binyagan ay inilibing ninyo ng may
	<i xml:lang="es" lang="es">misa de requiem</i>!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Padre  
	Irene ang inihalal ni Kapitan&nbsp;Tiago na kanyang <i xml:lang="es" lang="es">
	albacea</i> at gaganap ng kanyang mga habilin, at iniiwan ang bahagi ng 
	kanyang kayamanan sa <abbr>Sta.</abbr>&nbsp;Clara, ang bahagi ay sa Papa, sa 
	Arsobispo, sa mga <span xml:lang="es" lang="es">Corporaciones</span>, at 
	nag-iwan ng dalawampung piso upang ipagbayad ng <i xml:lang="es" lang="es">
	matricula</i> ng mga nag-aaral na maralita. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang huling habiling ito'y 
	ipinatala sa udyok ni Padre Irene dahil sa pagkamapag-ampon nito 
	sa kabataang masipag sa pag-aaral. Pinawalang bisa ni Kapitan&nbsp;Tiago ang 
	pamanang dalawampu't limang piso na iniiwan niya kay Basilio, dahil sa 
	masamang inugali ng binata nang mga huling araw, ngunit pinairal din ni
	Padre Irene ang habilin at sinabing kukunin niya ang halagang iyon 
	at dadalhin ng kanyang bulsa at ng kanyang budhi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa bahay ng 
	namatay na dinaluhan kinabukasan ng mga dating kakilala at mga kaibigan, ay 
	pinag-uusapang matikabo ang isang himala. Sinasabing noong oras nang 
	paghihingalo ay napakita sa mga mongha ang kaluluwa ni Kapitan&nbsp;Tiago na 
	libid ng maningning na liwanag. Iniligtas ng&nbsp; Diyos&nbsp; ang kaluluwa, dahil sa 
	karamihan ng pamisang ipinagawa at sa mga pamanang iniwan sa mga simbahan. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang balita'y pinag-uusapan, inilalarawan, nagkakaroon ng ayos at walang isa 
	mang nag-aalinlangan sa bagay na iyon. Isinasaysay ang suot ni Kapitan&nbsp;Tiago, na gaya ng mahihinala, ay ang prak, ang pisngiy nakaumbok 
	dahil sa sapa ng hitso, hindi nalimot ang kuakong panghitit ng apian at ang 
	manok na sasabungin. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang <i xml:lang="es" lang="es">sacristan mayor</i> na 
	kalahok sa umpukan ay nagpapatotoong walang kapingaspingas sa tulong ng 
	tango ng ulo, at iniisip na, pagkamatay niya, ay pakikita namang dala ang 
	tasa ng tahung puti, sapagka't, kung wala ang pang-agahang iyon, ay hindi 
	niya maunawa ang kaligayahan ni sa langit ni sa lupa. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Tungkol sa bagay na 
	ito, at dahil sa hindi mapag-usapan ang mga nangyari ng kinahapunan at sa 
	dahilang mayroon doong mga tahor, ay maiinam na hakahaka ang nababanggit, 
	pinagkukurokuro kung hahamunin o hindi ni Kapitan&nbsp;Tiago si <abbr>S.</abbr>&nbsp;Pedro 
	upang sila'y magdaos ng isang <i xml:lang="es" lang="es">soltada</i>, kung 
	magpupustahan, kung ang mga manok ay pawang walang pagkamatay, kung hindi 
	tatalaban ng iwa.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At kung mangyari ang gayon, ay sino kaya ang magiging
	<i xml:lang="es" lang="es">sentenciador</i>, sino ang mananalo, at <abbr>
	iba </abbr>pa, mga pagtatalong kinalulugdan ng mga nagtatatag ng karunungan, 
	mga paghahaka, mga paraang nababatay sa isang aklat na inaakalang walang 
	kamalian, na ipinahayag ng&nbsp; Diyos&nbsp; sa kanyang kabig o nauukol sa batayang 
	nagiging kautusan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Bumabanggit pa ng mga bahagi ng nobena, ng mga aklat na 
	ukol sa mga kababalaghan, sabi ng mga kura, kalagayan ng langit at iba pang 
	mga bagaybagay na ukol din doon. Si Don Primitivo, ang pilosopo, 
	ay galak na galak sa pagtutukoy niya ng mga haka ng mga teologo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sapagka't ang 
	sinoman sa kanila'y hindi mangyayaring matatalo,--ang sabing may lubos na 
	pagkataho;--ang pagkatalo'y nagbibigay ng sama ng loob at sa kalangitan ay 
	hindi mangyayaring magkaroon ng samaan ng loob.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ngunit ang 
	isa'y sapilitang mananalo,--ang pakli ng tahur na si Aristorenas,--ang inam ay 
	nasa pananalo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kapuwa 
	mananalo!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Iyong 
	kapwa 
	mananalo ay hindi matanggap ni Martin Aristorenas, siya, na ang buong buhay 
	ay dinaan sa sabungan at kailan ma'y kanyang nakita na ang isang manok ay 
	nananalo at ang isa'y natatalo; kung baga man ay magtabla na lamang ang 
	nangyayari. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Walang nahita si Don Primitivo sa kalalatin, si 
	Martin Aristorenas ay nag-iiiling, gayong ang latin ni Don Primitivo 
	ay madaling mawatasan: sinasabi niyang: <i xml:lang="la" lang="la">an gallus 
	talisainus, acuto <span class="upright">tari</span> armatus, an gallus beati 
	Petri bulikus sasabungus sit</i> at <abbr>iba </abbr>pa, hanggang sa ginamit 
	na tuloy ang pangangatwiran nang marami kung ibig magpatigil at 
	magpapanalig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Magkakasala 
	ka, kaibigang Martin, mahuhulog ka sa isang erehia!
	<i xml:lang="la" lang="la">Cave ne cadas!</i> Hindi na ako makikipagmonte sa 
	iyo! Hindi na tayo magkakabakas! Hindi mo pinananaligan ang kapangyarihan ng&nbsp; 
	Diyos , <i xml:lang="la" lang="la">peccatum mortale</i>! Hindi mo 
	pinaniniwalaan ang katunayan ng <span xml:lang="es" lang="es">Santisima 
	Trinidad</span>: ang tatlo ay isa at ang isa ay tatlo! Dahandahan ka! Hindi 
	mo pinaniniwalaan wari na ang dalawang katawan, dalawang pag-iisip at 
	dalawang kalooban ay mangyayaring magkaroon ng iisang alaala lamang! 
	Dahandahan ka! <i xml:lang="la" lang="la">Quicumque non crederit, anathema 
	sit!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Martin 
	Aristorenas ay nangunting namumutla't nanginginig, at si intsik Quiroga na 
	nakadinig na buo sa pangangatwiran, ay dinulutan ng buong galang ang 
	pilosopo ng isang mabuting tabako at tinanong ng masuyo:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sigulo, puele 
	akieng kontalata itong aliendo sabong sa Kilisto, ha? Pag ako pagtaylo, 
	akieng <span class="locked">kontalatista, ha?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa ibang 
	pulutong ang lalong mahabang salitaan ay ukol sa patay; ang pinagtatalunan 
	ay ang damit na isusuot sa bangkay. Ipinalagay ni kapitang&nbsp;Tinong na damit 
	pransiskano ang isuot; mayroon pa naman siyang isa, luma, sirasira at takpi 
	takpi, mainam na kasangkapan na, alinsunod sa patunay ng prayle na 
	pinaglimusan niya sa halagang tatlong pu't anim na piso, nakapagliligtas sa 
	bangkay sa apoy ng inpierno, at nagsalaysay ng makapagpapatibay na mga banal 
	na pangyayaring hango sa mga aklat na ikinakalat ng mga kura. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Kahit 
	pinakamamahal ni kapitang&nbsp;Tinong ang labing iyon, ay laan siyang ipagkaloob 
	sa kanyang matalik na kaibigang hindi niya nadalaw sa buong pagkakasakit. 
	Ngunit ipinakli ng isang sastre na yamang nakita ng mga mongha si 
	Kapitan&nbsp;Tiago na naka prak na umaakyat sa langit, ay dapat suotan ng prak 
	at hindi kailangan ang mga pananggol at mga kasuutang hindi tatagusan: 
	nagpaprak kung tumutungo sa isang sayawan, sa isang pista, at hindi 
	maaasahang hindi gayon din ang matatagpuan niya sa kaitaasan.... at tingnan! 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Nagkataon pa namang mayroon siyang isang yari, na maibibigay niya sa 
	halagang tatlong pu't dalawang piso, apat na piso ang kamurahan kay sa 
	abitong pransiskano, sapagka't ayaw niyang pagtubuan si Kapitan&nbsp;Tiago: 
	naging suki niya noong buhay at ngayon ay magiging pintakasi niya sa 
	kalangitan! </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ngunit si Padre Irene na albasea at siyang 
	magpapatupad sa nauutos sa testamento ay sumalansang sa dalawang palagay at 
	ipinag-utos na bihisan ang bangkay ng alin man sa matatanda niyang damit, at 
	sinabing na taglay ang anyong pagkabanal, na hindi tinitingnan ng&nbsp; 
	Diyos&nbsp; ang 
	bihis.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga
	<i xml:lang="es" lang="es">exequias</i> nga ay ginawa ng buong dingal. 
	Nagkaroon ng <i xml:lang="es" lang="es">responso</i> sa bahay, sa daan, 
	tatlong prayle ang gumawa na waring ang iisa'y hindi makakaya sa kaluluwang 
	yaon, ginawang lahat ng <i xml:lang="es" lang="es">rito</i> at mga
	<i xml:lang="es" lang="es">ceremonias</i> na magagawa, at nabalitang gumawa 
	pa ng iba, nagkaroon ng <i xml:lang="es" lang="es">extra</i> na gaya sa mga 
	tanging palabas dulaang ukol sa kapakinabangan ng isang tao. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Yaon ang naging 
	kaigaigaya: maraming kamanyang ang sinunog, maraming awit sa wikang latin, 
	nag-aksaya ng maraming agua bendita: alangalang sa kanyang kaibigan ay 
	inawit ni Padre Irene, sa coro, ang <i xml:lang="la" lang="la">
	Dies irae</i> na ang boses ay pahumal; at sumakit ang ulo ng mga nalalapit 
	dahil sa katutugtog ng plegaria.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si aling 
	Patrocinio, ang dating katunggali ni Kapitan&nbsp;Tiago sa pagkamasambahin, ay 
	tunay na tunay na nagnasang mamatay naman sa kinabukasan upang makapagpagawa 
	ng mga <span xml:lang="es" lang="es">exequias</span> na lalo pang malaki kay 
	sa roon. Ang maawaing matanda'y hindi makatiis, na iyong inaakala niyang 
	talong talo na niya ay magbangon ng buong karangalan, sa pagkamatay. Oo 
	ninanasang mamatay siya at waring nadidinig na niya ang mga pabulalas ng 
	mga taong nanonood ng responso, na nagsasabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ito ang 
	libing! ganyan ang marunong mamatay, aling&nbsp;Patrocinio.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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