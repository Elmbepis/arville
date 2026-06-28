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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXVI. Ang Unang Dilim</font></b></p>
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
											Hindi sahol ang ligalig na naghahari 
											sa bahay ni Kapitan Tiago sa 
											kaguluhan ng pag-isip ng mga tao. 
											Walang ginagawa si Maria Clara kung 
											di tumangis at ayaw pakinggan ang 
											mga salitang pang-aliw ng kanyang 
											tia at ni Andeng na kanyang kapatid 
											sa gatas. Ipinagbawal sa kanya ng 
											kanyang ama ang pakikipag-usap kay 
											Ibarra, samantalang hindi 
											kinakalagan ito ng mga sacerdote ng 
											'exkomunion.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Kapitan Tiago na totoong maraming 
											ginagawa sa paghahanda ng kanyang 
											bahay, upang matanggap doon ng 
											karapatdapat ang Kapitan Heneral ay 
											tinawag sa kumbento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang umiyak anak ko!--ang 
											sinasabi ni tia Isabel, na 
											pinupunasan ng gamuza ang 
											maniningning na mga salaming 
											panganinuhan; siya'y kakalagan ng 
											exkomunion, mangagsisisulat sa Santo 
											Papa ... magbibigay tayo ng malaking 
											limos ... Hinimatay lamang si Padre 
											Damaso ... hindi namatay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang umiyak!--ang sabi sa 
											kanya ni Andeng ng paanas;--gagawa 
											ako ng paraan upang siya'y iyong 
											makausap; anong kadahilana't 
											itinatag ang konfesionario, kung di 
											ng gumawa ng kasalanan? Sukat na ang 
											sabihin kura sa upang ipatawad na 
											lahat!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y nagbalik si Kapitan 
											Tiago! Hinanap ng mga babae sa mukha 
											niya ang kasagutan sa maraming 
											tanong; datapuwa't nagbabalita ang 
											mukha ni Kapitan Tiago ng 
											panglulupaypay ng loob. Nagpapawis 
											ang abang lalaki, hinahaplos ang noo 
											at hindi makapangusap ng isang 
											salita man lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyari, Santiago?--ang 
											tanong ni tia Isabel na malaki ang 
											pagmimithi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumagot ito ng isang 
											buntong-hininga, at pinahid ang 
											isang luha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Alang-alang sa Diyos, magsalita ka! 
											Ano ang nagyayari?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang aking ipinanganganib na 
											nga!--ang sa kawakasa'y sinabing 
											pabulalas na halos umiiyak. 
											Napahamak ng lahat! Iniuutos ni 
											Padre Damaso na sirain ang mga 
											salitaan, sapagkat kung hindi'y 
											mapapakasama raw ako sa buhay na ito 
											at sa kabilang buhay! Gayon din ang 
											sabi sa akin ng lahat, pati ni Padre 
											Sibyla! Hindi ko dapat papanhikin 
											siya sa aking bahay, at may utang 
											ako sa kanyang mahigit na limampong 
											libong piso! Sinabi ko ito sa mga 
											pari, dapuwa't hindi nila ako 
											pinansin: Alin ba ang ibig mong 
											mawala, ang sabi nila sa 
											akin,--limampong libong piso o ang 
											iyong buhay at ang iyong kaluluwa? 
											Ay, San Antonio! kung nalalaman ko 
											lamang ang gayon! kung nalalaman ko 
											lamang ang gayon!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humahagulgol si Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang umiyak, anak ko,--ang 
											idinugtong at liningon niya 
											ito;--hindi ka gaya ng nanay mong 
											hindi umiiyak kailan man ... hindi 
											umiiyak kung di sa paglilihi ... 
											Sinasabi sa akin ni Padre Damasong 
											dumating na raw ang isang kamag-anak 
											niyang galing sa Espa&ntilde;a na siyang 
											itinatalagang mangibig sa iyo ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinakpan ni Maria Clara ang kanyang 
											mga tainga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nguni't, Santiago, nasisira na ba ang 
											isip mo?--ang sigaw ni tia Isabel; 
											dapat bang magsabi ka sa kanya ang 
											ibang mangingibig? Inaakala mo bang 
											nagbabago ang anak mo ng mga 
											mangingibig na gaya ng pagbabago ng 
											baro?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan din nga ang iniisip ko Isabel; 
											si Don Crisostomo'y mayaman ...kaya 
											lamang nagaasawa ang mga kastila'y 
											sa pag-ibig sa salapi ... datapuwa't 
											ano ang ibig mong aking gawin? 
											Pinagbalaan nila akong lapatan ng 
											isa ring exkomunion ... sinasabi 
											nilang lubha raw nanganganib, hindi 
											lamang ang aking kaluluwa, kung di 
											naman ang aking katawan ...ang 
											katawan! naririnig mo? ang katawan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nguni't wala kang ginagawa kung di 
											pasama-in ang loob ng iyong anak! 
											Hindi ba kaibigan mo ang Arzobispo? 
											Bakit hindi ka sumulat sa kanya?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang Arzobispo'y prayle rin, walang 
											ginagawa ang Arzobispo kung di ang 
											sinasabi ng mga prayleng kanyang 
											gawin. nguni, Maria, huwag kang 
											umiyak; darating ang Kapitan 
											Heneral, nanasain kang makita, at 
											mamumula ang mga mata mo ... Ay! ang 
											isip ko pa nama'y magtatamo ako ng 
											isang hapong maligaya ... kung di 
											lamang itong nangyaring malaking 
											kasakunaang ito'y ako sana ang 
											lalong maligaya sa lahat ng mga tao 
											at mananagbili sa akin ang lahat ... 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tumiwasay ka, anak ko; higit ang 
											kasaliwang palad ko kay sa iyo ay 
											hindi ako umiiyak! Maaaring 
											magkaroon ka ng mangingibig na 
											lalong magaling, datapuwa't ako'y 
											mawawalan ng limampong libong piso! 
											Ay, Birhen sa Antipolo, kung 
											magkaroon man lamang sana ako ng 
											magandang palad sa gabing ito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Mga patok, gulong ng mga kotse, 
											takbuhan ng mga kabayo, musikang 
											tumutugtog ng markha real ay 
											nangagbalitang dumating na ang mahal 
											na Gobernador Heneral ng Kapuluhang 
											Filipinas. Tumakbo si Maria Clara at 
											nagtago sa kanyang tinutulugang 
											kabahayan ... kahabaghabag na 
											dalaga! pinaglalaruan ang iyong puso 
											ng mga magagaspang na mga kamay na 
											hindi nakakikilala ng kanyang mga 
											maseselang na mga kuerdas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang napupuno ng tao ang 
											bahay at umaalingawngaw sa lahat ng 
											mga panig ang malalakas na yabag ng 
											mga lumalakad, ng mga tinig na 
											naguutos, kalampag ng mga sable at 
											ng mga espuela, nahahandusay namang 
											halos nakaluhod ang lipos pighating 
											dalaga sa harapan ng isang estempa 
											ng Birhen, na ang pagkakalarawa'y 
											yaong anyo ng kahapishapis na 
											pangungulila, na si Delarokhe lamang 
											ang natutong makasipi ng gayong 
											damdamin, na wari'y napanood nito ng 
											manggaling na si Ginoong Santa Maria 
											sa pinaglilibingan ng kanyang Anak. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi ang pighati ng Inang iyon ang 
											siyang iniisip ni Maria Clara, ang 
											iniisip niya'y ang sariling 
											kapighatian. Sa pagkalungayngay ng 
											ulo sa dibdib at sa pagkatiin ng mga 
											kamay sa sahig na tabla, ang 
											azukenang hinutok ng malakas na 
											hangin ang kanyang nakakatulad. 
											Isang hinaharap na panahong 
											pinanag-inip at hinimashimas na 
											malaon, mga sapantaha ng budhing 
											sumilang sa kamusmusan at lumagong 
											kasabay ng kanyang paglaki at siyang 
											nabibigay kasiglahan sa kaibuturan 
											ng kanyang katauhan, akalaing 
											katkatin ngayon sa bait at sa puso 
											sa isa lamang salita. Makakawangis 
											ito kung patigilin ng tibok ng puso 
											at bawian ang bait ng kanyang 
											liwanag!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kung paano ang kabaitan at kabanalan 
											ni Maria Clara sa kanyang 
											pagkabinyagan, gayon din ang kanyang 
											pagkamasintahin sa kanyang mga 
											magugulang. Hindi lamang 
											nakapagbibigay takot sa kanya ang 
											exkomunion ang utos ng kanyang ama't 
											ang pinagbabalaang katiwasayan 
											nito'y pawang humihinging inisin 
											niya ang kanyang pagsinta at ihayin 
											sa gayong mga dakilang katungkulan. 
											Dinaramdam niya ang&nbsp; buong&nbsp; lakas ng 
											pagsinta kay Ibarra, na hanggang sa 
											sandaling iyo'y hindi man lamang 
											niya hinihinala. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang minsa'y isang ilog na umaagos 
											ng&nbsp; buong&nbsp; kahinhinan; 
											mababangong mga bulaklak ang siyang 
											nakalalatag sa kanyang mga 
											pampangin. Bahagya na napaaalon-alon 
											ng bangin ang kanyang agos; kung 
											panonoori'y masasabing tumitining. 
											Datapuwa't di kaginsaginsa'y kumipot 
											ang dinaraanan ng agos, magagaspang 
											na mga malalaking bato ang siyang 
											humahadlang sa kanyang paglakad, 
											matatandang mga puno ng kahoy ang 
											siyang nakahalang na sumasala, ah, 
											ng magkagayo'y umatungal ang ilog, 
											tumindig, kumulo ang mga alon, 
											nagwagwag ng mandala ng mga bula, 
											hinampas ang malalaking mga bato at 
											lumundag sa malalim na bangin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ibig niya sanang manalangin, ngunit 
											sino ang makapananalangin pagka 
											nagngingitngit sa malaking hirap? 
											Nananalangin pagka may pag-asa, at 
											kung wala'y nakikiusap tayo sa 
											Diyos, sa pamamag-itan ng mga 
											buntong hininga.--'Diyos ko! ang 
											sigaw ng kanyang puso,--bakit 
											inihihiwalay mo ng ganyan ang isang 
											tao, bakit ikinakait mo sa kanya ang 
											pagsinta ng mga iba? Hindi mo 
											ikinakait sa kanya ang iyong araw, 
											ang iyong hangin at hindi mo man 
											lamang itinatago sa kanyang mga mata 
											ang iyong langit, bakit ipagkakait 
											mo sa kanya ang pagsinta, gayong 
											wala mang langit, wala mang hangin 
											at wala mang araw ay mangyayaring 
											mabuhay, datapuwa't kung walang 
											pagsinta'y hindi mangyayari kailan 
											man?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumarating kaya sa trono ng Diyos 
											ang gayong mga sigaw na hindi 
											naririnig ng mga tao? Naririnig kaya 
											ang mga sigaw na iyon ng Ina ng mga 
											sawing palad?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ay! ang kahabaghabag ng dalagang 
											hindi nakakilala ng isang ina'y 
											nangangahas ipagkatiwala ang mga 
											dalamhating itong nagbubuhat sa mga 
											pagsinta sa ibabaw ng lupa doon sa 
											kalinislinisang puso na walang 
											nakilala kung di ang pag-ibig ng 
											anak sa ina at ang pag-ibig sa ina 
											sa anak; tumatakbo siya, sa kanyang 
											mga kahapisan, diyan sa larawan ng 
											babaeng dinidios, sa mithing lalong 
											kagandagandahan sa lahat ng mga 
											mithi ng mga kinapal, diyan sa 
											lalong kaayaayang likha ng religion 
											ni Cristo, na natitipon sa kanyang 
											sarili ang dalawang lalong 
											kagandagandahang kalagayan ng babae, 
											virgen at ina, na hindi nalahiran ng 
											kahi't babahagyang dungis, na 
											tinatawang nating Maria.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ina!, Ina!--ang kanyang hibik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit si tia Isabel, na siyang 
											kumuha sa kanya sa gayong pighati. 
											Dumating ang ilang kanyang kaibigang 
											babae at ibig ng Kapitan Heneral na 
											siya'y makita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tia, sabihin po ninyong ako'y may 
											sakit!--ang ipinakiusap ng dalagang 
											nagugulat;--patutugtugin nila ako ng 
											piano at pakakantahin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtindig si Maria Clara, tiningnan 
											ang kanyang tia, pinilipit ang 
											kanyang magagandang bisig at 
											nagsasalita ng pautal:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oh, kung mayroon sana akong!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't hindi tinapos ang salita, at 
											nagpasimula ng paghuhusay ng kanyang 
											sariling katawan.</font></p>
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