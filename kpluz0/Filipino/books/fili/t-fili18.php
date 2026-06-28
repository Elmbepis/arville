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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XVIII. Mga Kadayaan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sinalubong 
	sila ng lubhang malingap ni <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span>, 
	isang tunay na <span xml:lang="en" lang="en">yankee</span>, na ang suot ay 
	pulos na itim. Magaling magsalita ng wikang kastila dahil sa tumira sa Amerika, sa Timog. Hindi sumalansang sa nasa ng ating mga dalaw; 
	sinabing maaaring siyasating lahat lahat bago gawin at matapos ang 
	pagtatanghal; sa kasalukuyan ng pagtatanyag ay ipinamanhik na manahimik 
	lamang. Si Ben-Zayb ay ngumingiti at nilalasaplasap na ang sama ng loob na 
	ibibigay niya sa amerikano.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang loob na 
	nababalot na buong buo ng itim ay naiilawan ng mga matatandang lampara na 
	ang ilaw ay <span xml:lang="es" lang="es">aguardiente</span>. Isang halang 
	na natatakpan ng tersiopelong itim ang siyang humahati ng dalawang hating 
	magkasinglaki sa loob na iyon; ang isa'y puno ng mga luklukang laan sa mga 
	manonood, at ang isa, ay kinalalagyan ng isang tuntungan na ang alpombra ay 
	pariparisukat. Sa ibabaw ng tuntungang ito, sa dakong gitna, ay nalalagay 
	ang isang mesa na natatakpan ng isang mainam na kayong itim na puno ng bungo 
	at iba pang larawang mahiwaga. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang <i xml:lang="fr" lang="fr">mise en scene</i> 
	ay malungkot kaya't nakapangilabot sa mga masasayang dalaw. Nahinto ang mga 
	biruan, marahan ang mga pag uusap at kahit na ibig magpatanaw ang ilan ng 
	di nila pagpapahalaga sa gayon ay hindi pumulas ang tawa sa mga labi. Ang 
	damdam ng lahat ay waring napasok sa isang bahay na may patay. Isang amoy 
	suob at pagkit ay siya pang nakapagpaparagdag sa gayon. Si Don Custodio 
	at si Padre Salvi ay marahang nagsangguniang kung nararapat o 
	hindi na ipagbawal ang mga gayong panoorin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Upang 
	mapalakas ni Ben-Zayb ang loob ng mga matatakutin at magipit niya si
	<span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span> ay sinabi 
	ritong:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hoy, mister, 
	yamang walang ibang tao kundi kami lamang at hindi kami mga indio na 
	napapahuli ay ipahihintulot baga ninyong ipakita ko sa kanila ang daya? Alam 
	na naming ang lahat ng iyan ay ukol lamang sa paningin, ngunit sa dahilang 
	si Padre Camorra ay ayaw maniwala......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At humandang 
	lumundag sa halang na hindi nagdaan sa sadyang pintuan, samantalang si Padre &nbsp;Camorra ay naglulunggati sa pagtutol dahil sa nangangambang baka 
	may katwiran si Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At bakit po 
	hindi, ginoo?--ang sagot ng amerikano;--ngunit huwag po lamang kayong sumira 
	ng anuman, <span class="locked">hane po?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	mamamahayag ay nasa ibabaw na ng tuntungan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ipinahihintulot po ba ninyo?--ang sabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At sa 
	pangingilag na baka hindi siya payagan ni <span xml:lang="en" lang="en">
	<abbr>Mr.</abbr>&nbsp;Leeds</span> ay hindi na naghintay ng pahintulot at itinaas 
	ang kayo at hinanap ang mga salaming inaantay niyang matatagpuan sa mga paa. 
	Si Ben-Zayb ay nakabitiw ng kalahating tungayaw, napaurong, muling ipinasok 
	at iniwagayway ang mga kamay niya sa ilalim ng dulang: walang maapuhap. Ang 
	mesa ay may tatlong paang bakal na maliliit na nakabaon sa lupa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	Ang mamamahayag ay tumingintingin sa lahat ng sulok na waring may hinahanap.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nasaan ang 
	mga salamin?--ang tanong ni Padre Camorra.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Mamatamata si 
	Ben-Zayb, hinihipo ang dulang, itinataas ang kayong takip, at 
	maminsanminsang inilalagay ang kamay sa noo na waring may ibig maalaala.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mayroon po 
	bang nawala sa inyo?--ang tanong ni <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang mga 
	salamin, mister, nasaan ang mga salamin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang inyo'y 
	hindi ko maalaman kung saan naroon, ang akin ay nasa
	<i xml:lang="es" lang="es">fonda</i>...... ibig baga ninyong manalamin? 
	Masama ng kaunti ang ayos ninyo at namumutla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Kahit na may 
	kaba, nang makita ng marami ang kapalagayang paaglahi ng amerikano'y 
	pinagtawanan si Ben-Zayb na hiyanghiyang bumalik sa kanyang uupan, na
	<span class="locked">bumubulong ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	mangyayari; makikita ninyo't hindi magagawa ng walang salamin; mayamaya'y 
	magpapalit iyan ng dulang....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Inilagay na 
	muli ni <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span> ang kayo 
	sa mesa at nang maharap na ang mga mararangal na dalaw ay tumanong:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nasisiyahan 
	na baga kayo? mapasisimulan na natin?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakatulog 
	na dugo namang tao!--ang sabi ng isang babaeng balo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kung gayon ay 
	mangagsiupo na po ang kaginoohan at pag-isipin kung ano ang ibig itanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Pumasok si
	<span xml:lang="en" lang="en"><abbr>Mr.</abbr> Leeds</span> sa isang pinto 
	at nang makaraan ang ilang sandali ay bumalik na may dalang isang kahang 
	kahoy na maitim, bukbukin, na may ilang lilok na ibon, mga hayop, mga 
	bulaklak, mga ulo ng tao at <abbr>ibp.</abbr></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga 
	kaginoohan,--ang sabi ni <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span> 
	na walang tawa--sa minsang pagdalaw ko sa piramide ni
	<span xml:lang="en" lang="en">Khufu</span>, ika apat na lipi ng mga Faraon, 
	ay nakatagpo ako ng isang libingang batong buhay na pula sa isang liblib na 
	silid. Ang kagalakan ko'y gayon na lamang sapagka't inakala kong nakatagpo 
	ng isang momia ng mga anak hari; ngunit gaano ang aking sama ng loob ng 
	matapos paghirapan ng katakot-takot ang pagbubukas ng libing ay wala akong 
	natagpuan kundi ang kahang ito na mangyayari ninyong siyasatin.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At inilibot 
	ang kaha sa mga nasa unang hanay ng luklukan. Iniurong ni Padre Camorra 
	ang kanyang katawan na wariy may pagkasuklam, si Padre Salvi ay 
	tuminging malapit na wariy nakaaakit sa kanya ang mga bagay na ukol sa 
	libingan; si Padre Irene ay ngumingiti ng ngiting matalino, si
	Don Custodio ay nag-anyong walang imik at mapagwalang bahala, at 
	si Ben-Zayb ay humahanap ng salamin; doon dapat malagay, sapagka't salamin 
	lamang ang sangkap ng lahat ng iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Walang iniwan 
	sa amoy bangkay!--ang sabi ng isang babai--puff!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At namaypay ng 
	katakot-takot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaamoy ng 
	apat na libong taon!--ang sabing bigla ng isa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakalimutan ni 
	Ben-Zayb ang salamin dahil sa pagtingin kung sino ang bumanggit ng salitang 
	iyon. Ang bumigkas ay isang militar na nakabasa ng kasaysayan ng buhay ni 
	Napoleon. Kinainggitan siya ni Ben-Zayb, at upang bumitiw ng isang salitang 
	dapat tumama kay Padre Camorra, ay sinabing:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Amoy 
	simbahan!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang kahang 
	ito, kaginoohan,--ang patuloy ng amerikano--ay may lamang isang dakot na abo 
	at kaputol na <i>papiro</i>, na kinatatalaan ng ilang sulat. Tingnan ninyo, 
	ngunit ipinamamanhik ko lamang na huwag kayong hihingang malakas, sapagka't 
	kung matapon ang kaunting abo ay lalabas na sirasira ang aking
	<i xml:lang="es" lang="es">esfinge</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang 
	kabulaanan, na tinuran ng buong pananalig at walang kabirobiro ay unti-unting 
	nagtagumpay, kaya't nang idaan ang kaha ay walang isa mang nangahas na 
	huminga. Si Padre Camorra, na sa pulpito sa Tiani ay nagpakilalang 
	madalas ng mga parusa at paghihirap sa inpierno samantalang pinagtatawanan 
	sa sarili ang mga matang sindak ng mga makasalanan, ay nagtakip ng ilong. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											At si Padre Salvi, ang tunay na si Padre Salvi na sa araw 
	ng kapistahan ng mga patay ay gumawa ng ginigini ng mga kaluluwa sa 
	Purgatorio na may apoy at mga larawang nanganganinag na naiilawan sa dakong 
	likuran, na may lamparang ang ilaw ay <span xml:lang="es" lang="es">
	aguardiente</span>, mga putolputol na halimayas, sa malaking dambana ng 
	simbahan ng isang arrabal upang makakuha ng mga pamisa at limos, ang payat 
	at walang imik na si Padre Salvi ay pumigil sa kanyang paghinga at 
	tiningnan ng tinging may panganganib ang isang dakot na abong iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="la" lang="la">Memento, 
	homo, quia pulvis es!</i>--ang bulong na nakangiti ni Padre Irene.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--P......!--ang 
	bitiw ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nakahanda na 
	siya sa pagsasabi ng mga salitang iyon at inunahan siya ng kanonigo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa dahilang 
	hindi maalaman kung ano ang dapat kong gawin--ang patuloy ni
	<span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span> na inilapat nang 
	buong pag-iingat ang takip ng kaha--ay siniyasat ko ang papiro, at nakita ko 
	ang dalawang salita na hindi ko batid ang kahulugan. Hinanap ko ang 
	katuturan at tinangka kong bigkasin ng malakas, at babahagya pa lamang na 
	nabibigkas ang una nang maramdaman kong dumudulas sa aking kamay ang kaha na 
	wariy tangay ng isang malaking pataw at gumulong sa lupa, at doo'y hindi ko 
	na magalaw. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang pagkakamangha ko'y naging sindak nang buksan ko't matagpuan 
	sa loob ang isang ulo ng tao na ang tingin sa akin ay walang kakisapkisap. 
	Sindak, at dahil sa hindi ko maalaman ang gawin sa harap ng gayong 
	kababalaghan, ay natulig akong nangaykay sumandali na waring isang 
	gulilat.... Ako'y nagbalikloob.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Sa akalang yaon ay isang malikmata lamang 
	ay tinangka kong mapalipas yaon at ipinatuloy ko ang pagbasa ng pangalawang 
	salita. Babahagya ko pa lamang nasasabi, ay nalapat ang takip ng kaha, 
	nawala ang ulo, at ang napalit na muli ay ang isang dakot na abong ito. 
	Hindi sinasadya'y natagpuan ko ang dalawang salitang lalong makapangyarihan, 
	ang mga salitang panglikha at panggunaw, ang pangbuhay at pangpatay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Humintong 
	sandali na waring ibig tingnan ang ibinunga ng kanyang mga sinabi. 
	Pagkatapos ay lumapit sa dulang na ang lakad ay maingat at banayad at 
	ipinatong ang makababalaghang kaha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mister, ang 
	takip!--ang sabi ni Ben-Zayb na hindi mapigil.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At bakit 
	hindi?--ang tugong masunurin ni <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At matapos na 
	maitaas ng kanang kamay ang kaha ay hinawi ng kaliwa ang kayo at naiwang 
	lantad ang mesa na natutukuran ng kanyang tatlong paa. Muling inilagay ang 
	kaha sa ibabaw at banayad na lumapit sa mga nanonood.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Dito ko siya 
	makikita!--ang sabi ni Ben-Zaib sa kanyang kasiping--tingnan ninyo pag hindi 
	iyan nagdahilan ng kahit ano.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lubos na 
	pagbatyag ay nalalarawan sa lahat ng mukha; naghari ang katahimikan. 
	Maliwanag na maliwanag na nadidinig ang ingay at kaguluhan sa daan; ngunit 
	ang lahat ay nagugulumihanan kaya't ang kaputol na salitaang umabot hanggang 
	sa kanila'y hindi man nila naino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Porque 
	ba no di podi nisos entra?</i>--ang tanong ng isang boses babae.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Aba, 
	&ntilde;ora, porque 'talla el mana prailes y el mana empleau</i>--ang sagot ng 
	isang lalaki--<i xml:lang="es" lang="es">'ta jasi solo para ilos el cabesa de 
	espinge</i>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<span xml:lang="es" lang="es">Curioso 
	tambien el mana prailes!</span>--ang sabi ng boses babai--<span xml:lang="es" lang="es">no 
	quiere pa que di sabe nisos cuando ilos ta sali inga&ntilde;au! Cosa! querida ba de 
	praile el cabesa?</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gitna ng 
	buong katahimikan ay nagpatuloy ang amerikano na ang boses ay nanginginig:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kaginoohan: 
	sa isang salita'y bubuhayin ko ang isang dakot na abong iyan at kayo'y 
	makikipag-usap sa isang nakababatid ng ukol sa nakaraan, ng sa kasalukuyan 
	at maraming bagay ng sa darating.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At banayad na 
	bumitiw ng isang sigaw ang mahiko, mapanaghoy muna, matapos ay matindi, 
	halohalong matatalas na tunog na wariy tungayaw at tunog na paos na wariy 
	pagbabala na nakapagpangalisag sa buhok ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Deremof!--ang 
	sabi ng amerikano.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga tabing 
	na nakapalibid sa salon ay naggalawan, ang mga ilawan ay waring mamamatay, 
	ang mesa ay humaginit. Isang mahinang daing ang sumagot na galing sa loob ng 
	kaha. Ang lahat ay nagkatinginang namumutla't hindi mapalagay: ang isang 
	babaeng lipus katakutan at nakaramdam ng isang pagkabasang mainitinit sa 
	kanyang saya ay kumapit kay Padre Salvi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sa gayon ay 
	nabukas na mag-isa ang kaha at sumipot sa malas ng mga nanonood ang isang 
	ulo na anyong bangkay, na nalilibid ng isang mahaba't makapal na buhok na 
	itim. Dahandahang ibinukas ng ulo ang mga mata at inilibot ang tingin sa 
	lahat ng nanonood. Ang mga matang iyon ay may matalas na ningning na 
	nararagdagan pa ng kanyang mga panglook, at sa dahilang
	<i xml:lang="la" lang="la">abyssus abyssum invocat</i>, ang mga matang iyon 
	ay napatitig sa mga malalalim at nangangalong mata ni Padre Salvi 
	na dilat na dilat na wariy nakakikita ng isang multo. Si Padre Salvi 
	ay nanginig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Espinghe--ani
	<span xml:lang="en" lang="en"><abbr>Mr.</abbr> Leeds</span>--sabihin mo sa 
	mga nakikingig kung <span class="locked">sino ka.</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lubos na 
	katahimikan ay naghari. Isang malamig na simoy ang lumaganap sa salas at 
	nagpagalaw sa bughaw na dingas ng mga lamparang gamit sa libingan. Ang mga 
	lalong hindi mapaniwalain ay nangilabot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ako'y si
	<span xml:lang="en" lang="en">Imuthis</span>--ang sagot ng ulo na ang boses 
	ay malalim ngunit nagbabala mandin--ipinanganak ako ng kapanahunan ni Amasis 
	at ako'y pinatay nang kasalukuyang nakasasakop ang mga persa, samantalang si 
	Cambises ay papauwing galing sa sinamang pagsalakay sa kalookan ng Lybia. 
	Galing ako sa pagtatapos ng aking pag-aaral makaraan ang mahabang 
	paglalakbay sa Gresia, Asiria at Persia, at papauwi na ako sa aking bayan 
	upang manirahan doon hanggang sa ako'y paharapin ni
	<span xml:lang="en" lang="en">Thot</span> sa kanyang kakilakilabot na 
	hukuman. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Dala ng kasawian ko, sa aking pagdaraan sa Babilonia, ay nabatid ko 
	ang isang kakilakilabot na lihim, ang lihim ng di tunay na
	<span xml:lang="en" lang="en">Smerdis</span> na nagnakaw ng kapangyarihan, 
	ang pangahas na magong si Gaumata na namamahala sa tulong ng isang 
	pagdaraya. Sa katakutang isumbong ko siya kay Cambises, ay binalak ang aking 
	ikasasawi sa pamagitan ng mga saserdoteng taga Egipto. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga ito'y siyang 
	nakapangyayari noon sa aking bayan; dahil sa pag-aari nila sa dalawa ng 
	katlong bahagi ng mga lupain, tanging may hawak ng karunungan ay inilulubog 
	ang bayan sa kamangmangan at sa pagsiil, inilalagmak sa ugaling hamak at 
	inihahanda upang huwag marimariman sa pagpapalitpalit ng panginoon. Ang mga 
	manglulupig ay nanghahawak sa kanila at sa pagkakilala ng kanilang 
	maitutulong ay kinakalong sila't pinayayaman, at ang ilan ay hindi lamang 
	umalinsunod sa kanilang maibig kundi naging tagaganap lamang nila. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ang mga 
	saserdoteng ehipsiyo ay umalinsunod ng buong loob sa mga utos ni Gaumata 
	sapagka't ako'y kanilang kinatatakutan at upang huwag kong ihayag sa bayan 
	ang kanilang mga pang-uulol. Upang masunod ang kanilang hangad ay ginawang 
	paraan ang mga udyok ng puso ng isang batang saserdote sa Abidos na inaaring 
	banal!....</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang 
	kahambalhambal na katahimikan ang sumunod sa mga salitang ito. Ang ulong 
	yaon ay nagsasalaysay ng ukol sa mga pailalim na paraan at mga pagdaraya ng 
	mga pari at kahit ibang kapanahunan at ibang pananampalataya ang tinutukoy 
	ay nakapagpaparamdam din sa mga prayleng kaharap doon sanhi marahil na 
	makikitang ang kinauuwian ay kahawig ng kasalukuyang kalagayan. Si Padre Salvi, 
	na nanginginig, ay iginagalaw ang mga labi at sinusundan ng nanglilisig na 
	mata ang titig ng ulo, na wariy nakakahalina sa kanya. Mga butil ng pawis 
	ay nagsisimula na ng pagsipot sa kanyang namumutlang noo, ngunit walang 
	nakababatyag sa gayon, dahil sa lubhang nangalilibang at nangingilabot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At papano ang 
	paraang ginawa sa iyo ng mga pari sa iyong bayan?--ang tanong ni
	<span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span>.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang ulo'y 
	bumitiw ng isang kasakitsakit na daing na wariy galing sa kaibuturan ng 
	puso at nakita ng mga nanonood na ang kanyang mga mata, ang mga matang iyon 
	na nagbabaga, ay nawalan ng kinang at napuno ng luha. Nanginig ang lahat at 
	naramdamang nanindig ang kanilang buhok. Hindi, yaon ay hindi daya, hindi 
	salisalita lamang; ang ulo'y isa ngang ginawan ng kataksilan at ang 
	sinasabiy ang tunay niyang kabuhayan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ay!--ang sabi 
	na umiling ng lubhang malungkot--ako'y nangingibig sa isang dalaga, anak ng 
	isang pari, na kasinglinis ng liwanag, gaya ng loto kung bagong 
	namumukadkad! Ninanasa rin naman siyang kamtan ng batang pari sa Abidos at 
	ito'y nagmunakala ng isang pagkakagulo na sinangkalan ang aking pangalan at 
	sa tulong ng ilang papiro ko na naparaanang makuha sa aking irog. Ang 
	kaguluhan ay nangyari ng kasalukuyang si Cambises ay papauwing 
	nagngingitngit dahil sa kasawiang nangyari sa kanyang sinamang pakikihamok. 
	</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											Ako'y isinakdal na taksil, napiit, at sa dahilang ako'y nakatanan, ay 
	napatay ako sa lawa ng <span xml:lang="en" lang="en">Moeris</span> ng mga 
	umuusig.... Mula sa kabilang buhay ay nakita kong nanagumpay ang kabulaanan, 
	nakikita ko ang pag-usig gabit araw ng saserdote sa Abidos sa birheng 
	nagkanlong sa simbahan ni <span xml:lang="en" lang="en">Isis</span> sa pulo 
	ng <span xml:lang="en" lang="en">Philoe</span>.... nakikita ko siyang inuusig 
	at inaapungutan hanggang sa mga ilalim ng lupa, tuligin sa sindak at mga 
	pahirap, na gaya ng isang malaking paniki sa isang maputing kalapati.... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">
											A! saserdote, saserdote sa Abidos! nabuhay akong muli upang ihayag ang iyong 
	mga kataksilan, at makaraan ang mahabang panahong pananahimik ay tinatawag 
	kitang mamamatay, lapastangan sa&nbsp; Diyos , mapagparatang!!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang biglang 
	halakhak, waring galing sa libingan, ang sumunod sa mga salitang ito, 
	samantalang ang isang timping boses ay <span class="locked">sumasagot ng:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hindi 
	mahabag......!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Yaon ay si
	Padre Salvi na puno ng takot ay iniunat ang dalawang kamay at 
	mabubuwal.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ano mayroon 
	kayo Padre Salvi? Masama po ba ang inyong katawan?--ang tanong ni
	Padre Irene.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang init ng 
	salas......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang amoy 
	bangkay na nasasamyo dito.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mamamatay, 
	mapagparatang! lapastangan sa&nbsp; Diyos ,--ang ulit ng ulo--isinusuplong kita, 
	mamamatay, mamamatay, mamamatay!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At muling 
	umugong ang halakhak, waring galing sa libingan at mapagbala, na waring 
	dahil sa pagkalulong ng ulo sa pagmamalas sa mga kaapihan niya'y hindi 
	naaalumana ang kaguluhang naghahari sa salas. Si Padre Salvi ay 
	lubusan nang nahimatay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mahabag! 
	buhay pa....!--ang ulit ni Padre Salvi at nawalan ng diwa. 
	Maputlang maputlang wariy bangkay. Inakala ng ibang babae na nararapat 
	namang maghimatay sila at gayon nga ang ginawa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Nahihibang......
	Padre Salvi!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sinasabi ko 
	na sa kanyang huwag kumain ng sopas na pugad ng langaylangayan!--ang sabi ni
	Padre Irene--iyon ang nakasama sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Wala namang 
	nakain!--ang sagot na nangangatal ni Don Custodio--sa dahilang 
	tinitigan siyang mabuti ng ulo, ay nagayuma siya......</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Doon na 
	nagkagulo, ang salas ay waring <i>hospital</i>, isang parang ng labanan. Si
	Padre Salvi ay wari patay, at nang makita ng mga babae na hindi 
	sila dinadaluhan ay minabuti na nila ang magbalikdiwa.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Samantala ay 
	naging abo ang ulo at inilagay na muli ni <span xml:lang="en" lang="en">
	<abbr>Mr.</abbr>&nbsp;Leeds</span> ang kayong itim sa ibabaw ng dulang at 
	yumuyuku sa mga nakingig sa kanya.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Kailangang 
	ipagbawal ang pagtatanghal na ito--ang sabi ni Don Custodio nang 
	lumalabas--lubhang napakabanday at mahalay.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lalonglalo na, 
	sapagka't hindi ginagamitan ng salamin--ang dugtong ni Ben-Zayb.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333"><span style="font-size: 13pt">
	Datapuwa'y ninasang tingnan niyang muli bago iwan ang pook na iyon, tinalon 
	ang halang, lumapit sa dulang at itinaas ang kayo: wala, wala ring gaya ng
	</span></font><span class="locked"><font face="Arial" color="#333333">
	<span style="font-size: 13pt">dati.</span></font></span></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang 
	kinabukasan ay sumulat ng isang lathala na ang tinutukoy ay ang mga 
	karunungang lihim, ang espiritismo, at <abbr>ibp.</abbr>; dalidaling 
	pumanaog ang isang utos ng gobernador eclesiastico na pinipigil ang mga 
	palabas; ngunit wala na si <span xml:lang="en" lang="en"><abbr>Mr.</abbr>&nbsp;Leeds</span> 
	na dinala sa Hongkong ang kanyang lihim.</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
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