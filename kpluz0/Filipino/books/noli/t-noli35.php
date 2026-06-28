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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXV. Mga Salisalitaan</font></b></p>
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
											Pagdaka'y lumaganap sa bayan ang 
											balita ng nangyaring iyon. ng 
											bagobago'y ayaw maniwala sino man, 
											nguni't sa pangangailangang 
											pahinuhod sa katotohanan, 
											nangag-iinaman ang lahat sa pagsigaw 
											ng pagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bawa't isa'y nagbubulaybulay 
											alinsunod sa abot ng kataasan ng 
											kanikanilang kalinisan ng budhi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Si Padre Damaso'y namatay!--ang sabihan 
											ng mga iilan;--ng itindig nila siya'y 
											naliligo ang kanyang mukha ng dugo 
											at hindi humihinga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magpahingalay 
											nawa siya sa kapayapaan, nguni't 
											walang ginawa sa kanya kung di 
											papagbayarin lamang ng kanyang utang--ang 
											malakas na sabi ng isang binata--Wariin 
											ninyong walang sukat maipangalan sa 
											ginawa niya kaninang umaga sa 
											kumbento.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano 
											ba ang ginawa? Muli bang sinuntok 
											ang koadjutor?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano 
											ba ang ginawa? Ating tingnan! 
											Sabihin mo sa amin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakita 
											ba ninyo ng umagang ito ang isang 
											mestizong kastila na lumabas sa 
											dakong sakristia samantalang 
											nagsesermon?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo! oo nga, siya'y nakita namin! 
											Pinagmasdan siya ni Padre Damaso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang nangyari'y ... pagkatapos ng 
											sermon, siya'y ipinatawag at 
											tinanong kung anong dahil sa siya'y 
											lumabas.--'Hindi po ako maalam ng 
											wikang tagalog, padre',--ang 
											isinagot.--'At bakit ka nanglibak, na 
											sinabi mong wikang griego iyon?--ang 
											isinigaw sa kanya ni Padre Damaso, 
											at tuloy sinampal siya. Gumanti ang 
											binata, nagpanuntok ang dalawa, 
											hanggang sa sila'y pinag-awatanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung sa akin mangyari ang gayong 
											bagay!...--ang ibinulong ng marahan 
											ng isang estudiante.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi ko minamagaling ang ginawa ng 
											frankiskano,--ang idinugtong naman ng 
											isa,--sapagkat hindi dapat 
											ipagpilitan ang Religiong parang 
											isang parusa o isang pahirap; 
											datapuwa't halos ikinatutuwa ko, 
											sapagkat nakikilala ko ang binatang 
											iyan; siya'y taga San Pedro Makati 
											at maigi siyang magwikang tagalog. 
											ngayo'y ibig niyang siya'y ipalagay 
											na bagong galing sa Rusia, at 
											ipinagmamapuri ang pagpapakunuwaring 
											hindi niya nalalaman ang wika ng 
											kanyang mga magugulang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y linilikha sila ng 
											Diyos at sila'y nangagsusuntukan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon ma'y dapat tayong tumutol sa 
											kagagawang iyan,--ang sabing malakas 
											ng isang estudiante naman;--ang di 
											pag-imik ay parang isang 
											pag-sangayon, at ang ginawang iyo'y 
											mangyayaring gawin naman sa alin man 
											sa atin. Nanunumbalik tayo sa mga 
											panahon ni Neron!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagkakamali ka!--ang tutol ng 
											isa;--si Neron ay isang dakilang 
											artista, at si Padre Damaso'y isang 
											kasamasamaang magsesermon!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iba naman ang salisalitaan ng mga 
											taong may katandaan na.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang hinihintay nila sa isang 
											maliit na bahay, na na sa labas ng 
											bayan ang pagdating ng Kapitan 
											Heneral, ito ang sinasabi ng 
											Gobernadorcillo:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi nga bagay na magaang sabihin 
											kung sino ang may katuwiran at kung 
											sino ang wala, datapuwa't kung 
											nakapagmunimuni sana si ginoong 
											Ibarra....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung nagkaroon sana si Padre 
											Damnaso ng kalahati man lamang ng 
											pagmumunimuni ni ginoong Ibarra, ang 
											talagang ibig po ninyong sabihin 
											marahil?--ang isinalabat ni Don 
											Filipo,--Ang kasamaa'y nagpalit sila 
											ng katungkulan: ang bata ang nag 
											asal matanda at ang matanda ang 
											nag-asal bata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang sabi po ninyo'y wala sino 
											mang dumalo upang sila'y awatin, 
											liban na lamang sa anak na babae ni 
											Kapitan Tiago?--ang tanong ni 
											kapitang Martin. Sino man sa mga 
											prayle, kahi't ang Alkalde man 
											lamang? Hm! Lalo pa ngang masama! 
											Hindi ko nanasaing aking kasapitan 
											ang kalagayan ng binata. Sino ma'y 
											walang makapagpapatawad sa gayong sa 
											kanya'y pagkatakot. Lalo pa ngang 
											masama! Hm!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa akala kaya ninyo?--ang tanong ni 
											kapitang Basilio, na totoong malaki 
											ang hangad na makatalastas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Umaasa ako,--ani don Felipong 
											nakipagsulyapan kay kapitang 
											Basilio,--na hindi siya pababayaan ng 
											bayan. Dapat nating alalahanin ang 
											ginawa ng kanyang mga magugulang at 
											ang kanyang kasalukuyang ginagawa 
											ngayon. At sakali't hindi umimik ang 
											bayan, dahil sa pagkatakot, ang 
											kanyang mga kaibiga'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni, mga ginoo,--ang isinalabat ng 
											gobernadorcillo,--ano baga ang ating 
											magagawa? ano ang magagawa ng bayan? 
											Mangyari ang ano mang mangyari'y ang 
											mga prayle ang siyang 'lagi' ng na 
											sa katuwiran!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Lagi' na silang na sa katuwiran, 
											sapagkat 'lagi' ng binibigyang 
											kabuluran natin sila; minsan man 
											lamang ay magbigay tayong katuwiran 
											sa ating sarili, at pagsakagayo'y 
											saka tayo mag-usap!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kinamot ng gobernadorcillo ang 
											kanyang ulo, tumingala sa bubungan 
											at saka nagsalita na ang tinig ay 
											masaklap:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay! ang init ng dugo! Tila mandin 
											hindi ninyo nalalaman ang lupaing 
											kinalagayan natin; hindi ninyo 
											nakikilala ang mga kababayan natin. 
											Ang mga prayle'y mayayaman at 
											nangakakaisa; tayo'y nagkakawasak 
											wasak at mga dukha. Siya nga! tikman 
											ninyong siya'y inyong ipagmalasakit, 
											at makikita ninyong kayo'y 
											pababayaan ng ating mga kababayang 
											mag-isa sa mga sagutin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga!--ang biglang sinabi ni 
											Don Filipo ng&nbsp; buong&nbsp; saklap,--mangyayari 
											nga ang gayon samantalang ganyan ang 
											pinagiisip, samantalang totoong 
											nagkakahawig ang takot at ang 
											pagiingat. Lalo pang pinapansin ang 
											isang kapahamakang hindi pa 
											nalalaman kung mangyayari nga, kay 
											sa kinakailangang pagkapakagaling; 
											pagdaka'y dinaramdam ang takot, sa 
											hindi ang pananalig; bawa't isa'y 
											walang iniisip kung di ang ganang 
											kanya, sino ma'y hindi nag-iisip ng 
											ganang sa mga iba, kaya mahihina 
											tayong lahat!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y isipin na muna ninyo 
											ang sa ganang mga iba, at bago ninyo 
											isipin ang sa ganang inyo, at 
											makikita ninyo kung paano ang 
											pagpapabayang sa inyo'y gagawin. 
											Hindi ba ninyo nalalaman ang 
											kasabihang kastila: 'na nag-pasimula 
											sa sariling katawan ang mahusay na 
											pagkakaawang gawa'?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang lalong magaling na inyong 
											masasabi--ang sagot na pagalit ng 
											teniente mayor--na nagsisimula ang 
											mahusay na karuwagan sa malabis na 
											pag-ibig sa sariling katawan, sa 
											nawawakasan sa pagkawala ng 
											kahihiyan! ngayon di'y ihaharap ko 
											sa Alkalde ang pagbibitiw ng aking 
											katungkulan; bundat na ako ng 
											paglagay sa kahihiyan, na kanino 
											ma'y wala akong nagagawang 
											kagalingan. Paalam!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iba naman ang mga panukala ng mga 
											babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay! ang buntong hininga ng isang 
											babae na ang anyo'y mabait;--kailan 
											ma'y ganyan ang mga kabataan! Kung 
											nabubuhay ang kanyang mabait na 
											ina'y anong sasabihin? Ay, Diyos! 
											Pagka napag-iisip ko na maaaring 
											magkaganyan din ang aking anak na 
											lalaki, na mainit din naman ang ulo 
											...ay Jesus! halos pinananaghilian 
											ko ang kanyang nasirang 
											ina..,mamamatay ako sa dalamhati!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't ako'y hindi ang sagot naman 
											ng isang babae,--hindi ako 
											magdadalamhati kung sakali't 
											magkakaganyan din ang aking dalawang 
											anak na lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano po ang sinasabi ninyo, kapitana 
											Maria?--ang sabing malakas ng unang 
											babaeng nagsalita, na pinagduduop 
											ang mga kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig kong matuto ang mga anak na 
											nagsasanggalang ng kapurihan ng 
											namatay ng mga magugulang nila, 
											kapitana Tinay; ano po ang wiwikain 
											ninyo kung isang araw na kayo'y bao 
											na marinig ninyong pinaguupasalaan 
											ang inyong asawa, at itungo ng 
											inyong anak sa Antonio ang ulo at 
											huwag umimik?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipagkakait ko sa kanya ang aking 
											bendicion!--ang sabing malakas ng 
											pangatlong babae, na ito'y si 
											hermana Rufa--datapuwa't....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko maipagkakait ang aking 
											bendicion kailan man!--ang isinalabat 
											ng mabait na si kapitana 
											Tinay;--hindi dapat sabihin ng isang 
											ina iyan ...datapuwa't hindi ko 
											maalaman ang aking gagawin ... hindi 
											ko maalaman ... sa akala ko'y ako'y 
											mamamatay..siya'y ...hindi! Diyos 
											ko! datapuwa't hindi ko na marahil 
											iibiging muling makita ko pa siya 
											... nguni't kung ano-ano ang mga 
											iniisip ninyo, kapitana Maria?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't gayon man,--ang dugtong 
											ni hermana Rufa,--hindi dapat 
											limuting isang malaking kasalanan 
											ang magbuhat ng kamay sa isang taong 
											'sagrado.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lalo ng 'sagrado' ang 
											pagmamalasakit sa kapurihan ng 
											namatay na mga magugulang!--ang 
											itinutol ni kapitana Maria.--Walang 
											makapagwawalang galang sa kanilang 
											santong kapurihan, kahi man ang 
											Papa, at lalo ng hindi si Padre 
											Damaso!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay nga!--ang bulong ni kapitana 
											Tinay, na nagtataka sa karunungan ng 
											dalawa;--saan ninyo kinukuha ang 
											ganyang pagkagagaling na mga 
											pangangatuwiran?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't ang 'exkomunion' at ang 
											pagkapakasama?--ang itinututol naman 
											ng Rufa.--Ano ang kapakanan ng mga 
											dangal at ng kapurihan sa buhay na 
											ito kung mapapasasama naman tayo sa 
											kabilang buhay? Dumaraang madali ang 
											lahat ... datapuwa't ang exkomunion 
											... sumirang puri sa isang 
											kinakatawan ni Jesukristo ... iya'y 
											ang Papa lamang ang nakapapapatawad!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipatatawad ng Diyos na nag-uutos na 
											igalang ang ama't ina; hindi siya 
											eexkomulgahin ng Diyos! At ito ang 
											sinasabi ko sa inyo, na kung 
											pumaroon sa aking bahay ang binatang 
											iyan, siya'y aking patutuluyin at 
											kakausapin; at iibigin kong siya'y 
											aking maging manugang, kung mayroon 
											sana akong anak na babae; ang mabait 
											na anak ay magiging mabait namang 
											asawa at mabait na ama; maniwala 
											kayo, hermana Rufa!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi gayon naman ang aking akala, 
											sabihin na ninyo ang ibig ninyong 
											sabihin; at kahi man tila mandin 
											kayo ang sumasakatuwiran, ang kura 
											rin ang siyang paniniwalaan ko 
											kailan man. Ang unauna'y ililigtas 
											ko muna ang aking kaluluwa, ano po 
											ang sabi ninyo, kapitana Tinay?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, ano ang ibig ninyong aking 
											sabihin! Kapwa kayo sumasakatuwiran; 
											sumasakatuwiran ang kura, datapuwa't 
											dapat ding magkaroon ng katuwiran 
											ang Diyos! Ayawan ko, ako'y isang 
											tanga lamang ... Sasabihin ko sa 
											aking anak na lalaking huwag ng 
											mag-aral, ang siya kong gagawin! 
											Namamatay daw sa bibitayan ang mga 
											marurunong! Maria Santisima, ibig pa 
											naman pa sa Europa ng aking anak na 
											lalaki!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano po ang inaakala ninyong gawin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sasabihin ko sa kanyang manatili na 
											lamang siya sa aking tabi, ano't 
											iibigin pa niyang maragdagan ang 
											kanyang dunong? Bukas makalawa'y 
											mamamatay rin kami, namamatay ang 
											marunong na gawa rin ng mangmang ... 
											ang kinakailanga'y mamuhay ng 
											payapa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nagbubuntong hininga ang mabait 
											na babae at itinitingala sa langit 
											ang mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako naman,--ang sabi ng&nbsp; buong&nbsp; 
											kataimtiman ni kapitana Maria,--kung 
											ako ang gaya ninyong mayaman, 
											pababayaan kong maglakbay--bayan ang 
											aking mga anak; sila'y mga bata, at 
											darating ang araw na sila'y 
											mangagkakagulang kakaunti ng panahon 
											ang aking ikabubuhay ... magkikita 
											na kami sa kabilang buhay ... dapat 
											magmithi ng lalong mataas na 
											kalagayan ang mga anak kay sa 
											kalagayang inabot ng kanilang mga 
											ama, at wala tayong naituturo sa 
											kanila, kung sila'y na sa ating 
											sinapupunan, kung di ang 
											pagkamusmus.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay, kakatuwa namang totoo ang mga 
											kaisipan pala ninyo!--ang biglang 
											sinabi ni kapitana Tinay, na 
											pinagduduop ang mga kamay;--tila 
											mandin hindi ninyo pinaghirapan ang 
											panganganak sa inyong kambal na mga 
											anak, na lalaki!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dahilan nga sa sila'y pinaghirapan 
											ko ng panganganak, inalagaan at 
											pinapagaral, kahi man kami dukha, 
											hindi ko ibig na pagkatapos ng 
											lubhang maraming kapagalang sa 
											kanila'y aking ginugol, ay walang 
											kahinatnan sila kung di maging 
											kalahating tao lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa aking palagay hindi po ninyo 
											iniibig ang inyong mga anak ng 
											alinsunod sa ipinag-uutos ng 
											Diyos!--ang may kahigpitang sabi ni 
											hermana Rufa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipatawad po ninyo, umiibig bawa't 
											ina sa kanyang mga anak ng alinsunod 
											sa kanyang adhika; may mga inang 
											umiibig sa kanyang mga anak at ng 
											kanilang pakinabangan, ang iba 
											nama'y umiibig sa kanyang mga anak 
											dahil sa pag-ibig nila sa sarili, at 
											umiibig naman ang iba sa ikagagaling 
											ng kanila ring mga anak. Ako'y 
											nabibilang dito sa mga huling sinabi 
											ko, ganito ang itinuro sa akin ng 
											aking asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi totoong nababagay sa atas ng 
											religion, kapitana Maria, ang lahat 
											ninyong mga iniisip; kayo'y masok ng 
											pagka hermana sa Santisimo Rosario, 
											kay San Francisco, kay Santa Rita, o 
											kay Santa Clara!--ang sabi ni hermana 
											Rufa, na ang anyo'y parang 
											nagsesermon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hermana Rufa, pagka karapatdapat 
											na akong maging kapatid (hermana) ng 
											mga tao, aking sisikaping ako'y 
											maging kapatid naman ng mga santo!--ang kanyang sagot na 
											ngumingiti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Upang mabigyang wakas ang bahaging 
											itong nauukol sa mga salisalitaan ng 
											bayan; at ng mapagwari man lamang ng 
											mga bumabasa kung ano kaya ang 
											iniisip ng mga walang malay na mga 
											tagabukid sa nangyari, pumaroon tayo 
											sa lilim ng tolda ng plaza, at 
											pakinggan natin, ang mga salitaan ng 
											ilang nangaroroon, ang isa sa 
											kanila'y kakilala natin, na di iba 
											kung di ang nananaginip sa mga 
											doktor sa panggagamot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang lalong dinaramdam ko'y hindi 
											na mayayari ang paaralan!--ang sinasabi 
											nito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit? bakit?--ang tanungan ng mga 
											nakikinig malaki ang pagpipilit na 
											makaalam.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi na magiging doktor ang aking 
											anak, siya'y magiging magkakariton 
											na lamang! Wala! Hindi na 
											magkakapaaralan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ang nagsabing hindi na 
											magkakapaaralan?--ang tanong ng isang 
											hangal at matabang tagabukid, na 
											malalaki ang mga panga at makitid 
											ang bao ng ulo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako! Pinangalanang 'plibastiero' si 
											Don Crisostomo ng mga paring 
											mapuputi! Hindi na magkakapaaralan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagtatanungan ang lahat sa 
											pagsusulyapan. Nababago sa kanila 
											ang pangalang iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At masama ba ang pangalang 
											iyan?--ang ipinangahas na itinanong 
											ng hangal na tagabukid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan ang lalong masamang masasabi 
											ng isang kristiano sa kapwa niya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masama pa ba iyan sa 'tarantado' at 
											sa 'saragate'?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, kung sana'y ganyan na nga 
											lamang! Hindi mamakailang tinawag 
											ako ng ganyan ay hindi man lamang 
											sumakit ang aking sikmura.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't marahil nama'y hindi na 
											sasama pa sa 'indio', na sinasabi ng 
											alperes!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang nagsabing magkakaroon ng isang 
											anak na lalaking karretonero'y lalo 
											pang nagpakita ng kalungkutan; 
											nagkamot naman sa ulo ang isa at 
											nag-iisip isip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y marahil katulad ng 'betelapora' 
											na sinasabi ng matandang babae ng 
											alperes! Ang masama pa sa riya'y ang 
											lumura sa hostia.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Talastasin 
											mong masama pa sa lumura sa hostia 
											kung viernes santo, ang isinagot ng&nbsp; 
											buong&nbsp; kataimtiman. Naaalaala na 
											ninyo ang salitang 'ispichoso', na 
											sukat ng ikapit sa isang tao, upang 
											siya'y dalhin ng mga sibil ni Villa 
											Abrillo sa tapunan o sa bilangguan; 
											unawain ninyong lalo pa manding 
											masama ang 'plibustiero.' </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">Ayon sa 
											sabi ng telegrafista at ng 
											direktorcillo, kung sabihin daw ng 
											isang kristiano, ng isang kura o ng 
											isang kastila, sa isang kristianong 
											gaya natin ay nakakawangis ng 'santusdeus' 
											na may 'requimiternam;' sa minsang 
											tawagin kang 'plibastiero,' 
											mangyayari ka ng magkumpisal at 
											magbayad ng iyong mga utang sapagkat wala magagawa kung di ang 
											pabitay ka na lamang. Nalalaman mo 
											na kung dapat makaalam ang 
											direktorcillo at ang telegrafista: 
											nakikipag-usap ang isa sa mga kawad, 
											at marunong naman ang isa ng kastila 
											at wala ng gamit kung di ang pluma.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pawang nanglulumo ang lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pilitin 
											na akong papagsuutin ng sapatos at 
											huwag akong painumin sa&nbsp; buong&nbsp; 
											aking buhay kung di iyan lamang ihi 
											ng kabayo na kung tawagi'y kerveza, 
											kapag napatawag ako kailaan man ng 'pelbistero!'--ang 
											sumpang sinabi ng tagabukid, na 
											nakasuntok ang mga kamay.--Sino? Ako, 
											mayamang gaya ni Don Crisostomo, 
											marunong ng kastilang gaya niya, at 
											nakapagdadali-dali ng pagkaing may 
											kukhillo at kukhara? magtatawa ako 
											kahit sa limang mga kura!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tatawagin kong 'palabistero' ang 
											unang sibil na aking makitang 
											nagnanakaw ng inahing manok!... at 
											pagdaka'y magkukumpisal ako!--ang 
											bulong na marahan ng isa sa mga 
											tagabukid, na pagdaka'y lumayo sa 
											pulutong.</font></p>
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
											<font face="Arial" style="font-size: 13pt">&nbsp;&nbsp; &nbsp;
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