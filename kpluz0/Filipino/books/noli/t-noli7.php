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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">VII. Suyuan sa Asotea</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Maagang nangagsimba ng umagang iyon si 
Tia Isabel at si Maria Clara: mainam na totoo ang pananamit nito at may tangang 
isang kuintas na asul ang mga butil, na inaari niyang parang brazalete, 
at may salamin sa mata si Tia Isabel, upang mabasa ang dalang 'Ankora de 
Salvacion', 
samantalang nagmimisa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bahagya pa lamang nakaaalis sa altar ang 
sacerdote, nagsabi ang dalagang ibig na niyang omowi, bagay na totoong 
ipinanggilalas at isinama ng loob ng mabait na tiya ng walang&nbsp; buong&nbsp; akala kung 
di ang kanyang pamangking babae'y mapagbanal at madasaling tulad sa isang monja 
man lamang. Nagbubulong, at pagkatapos na makapagkukruz ay nagtindig ang mabait 
na matandang babae.--Bah! patatawarin na ako ng mabait na Diyos na dapat 
makakilala ng puso ng mga dalaga kay sa inyo po Tia Isabel--Ang sasabihin sana ni 
Maria Clara sa kanya upang putlin ang kanyang matitindi, nguni't sa kawakasa'y mga pagsesermong-na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">ngayo'y nakapag-agahan na tila at 
nililibang ni Maria Clara ang kanyang pagkainip sa paggawa ng isang sutlang 'bolsillo', samantalang ibig pawiin ng 
tiya ang mga bakas ng nagdaang 
piyesta 
sa pagpapasimula ng paggamit ng isang plumero. Sinisiyasat at inuusisa ni 
Kapitan Tiago ang mga ilang kasulatan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bawa't lagunlong sa daan, bawa't kotseng 
dumaraan ay nangagpapakaba sa dibdib ng virgen at siya'y pinangingilabot. Ah, ngayo'y ibig niyang maparoon uli sa beaterio, sa 
kasamahan ng kanyang 
mga kaibigang babae! Doo'y matitingnan niya 'siyang' hindi manginginig, 
hindi magugulumihanan! Datapuwa't hindi baga, siya ang iyong kaibigan ng 
panahong musmus ka pa? hindi ba kayo'y nangaglalaro ng larong haling at 
hanggang sa kayo'y nag-aaway na manakanaka? Ang dahil ng mga bagay na ito'y 
hindi ko sasabihin; kung ikaw na bumabasa'y umibig ay mapagkikilala mo, at kung 
hindi naman ay sayang na sa iyo'y aking sabihin; hindi mapag-uunawa ang mga 
talinghagang ito ng hindi na kasisinta kailan man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--'Sa akala ko Maria'y may katowiran ang 
mediko--ani Kapitan Tiago. Dapat kang pasalalawigan, namumutla ka ng mainam at 
nagkakailangan ka ng mga mabubuting hangin. Ano bang akala mo: sa Malabon 
... o sa San Diego?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Namula si Mariang tulad sa 'amapola' 
pagkarinig niya nitong huling pangalan, at hindi nakasagot.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--'ngayo'y paparoon kayo ni Isabel at ikaw 
sa beaterio, at ng kunin ninyo roon ang iyong mga damit, at makapagpaalam ka 
sa iyong mga kaibigan; hindi ka na papasok uli roon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dinamdam ni Maria Clara iyang hindi 
malirip na kalungkutang bumabalot sa kaluluwa, pagka iniiwan ang isang 
kinatirahang pinatamuhan natin ng kaligayahan; nguni't nagpagaang ng kanyang 
pighati ang pagkaalaala ng isang bagay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At sa loob ng apat o limang araw, pagka 
may damit ka nang bago'y paparoon tayo sa Malabon.... Wala na sa San Diego ang 
iyong inaama; ang kurang nakita mo rito kagabi, iyong paring bata ay siyang 
bagong kura natin doon ngayon; siya'y isang santo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Lalong nakagagaling sa kanyang katawan 
ang San Diego, pinsan!--ang ipinaalaala ni Tia Isabel;--bukod sa roo'y lalong 
mabuti ang bahay natin doon, at saka malapit na ang piyesta.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ibig sanang yakapin ni Maria Clara ang 
kanyang tiya; nguni't narinig niyang tumigil ang isang kotse ay siya'y namutla.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah, siya nga!--ang 
isinagot ni Kapitan Tiago, at nagbago ng pananalita at idinagdag:--Don 
Crisostomo!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nalaglag sa mga kamay ni Maria Clara ang 
tangang kanyang ginagawa; nag-akala siyang kumilos ay hindi nangyari: isang 
pangingilabot ang siyang tumatakbo sa kanyang katawan. Narinig ang yabag ng 
paa sa hagdanan at pagkatapos ay ang sariwa at boses lalaki. Tulad sa kung ang 
boses, na ito'y may kapangyarihang hiwaga, iniwaksi ng dalaga ang lagim at 
nagtatakbo at nagtago sa panalanginang kinalalagyan ng mga santo. Nagtawanan 
ang dalawang magpinsan, at narinig ni Ibarra ang ingay ng sinasarhang pintuan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Namumutla, humihinga ng madalas, tinutop 
ng dalaga ang kumakabang dibdib at nag-akalang makinig. Narinig ang boses, yaong 
boses na pinakasisinta't sa panag-inip lamang niya naririnig: 
ipinagtatanong siya ni Ibarra. Sa pagkahibang sa tuwa ay hinagkan niya ang 
santong sa kanya'y nalalapit, si San Antonio Abad; santong mapalad ng nabubuhay 
at ngayong siya'y kahoy; lagi ng may magagandang mga tukso! 
Pagkatapos ay humanap ng isang butas ng susian, upang makita niya si Ibarra; 
mapagsiyasat ang kanyang anyo; ngumingiti si Maria Clara at ng kunin siya ng 
kanyang tiya sa gayong panonood, sumabit sa liig ng matandang babae at sinisi ito 
ng halik na paulit-ulit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't haling, ano ang nangyayari sa 
iyo?--ang sa kawakasa'y nasabi ng matandang babae, na pinapahid ang isang luha 
sa mga mata niyang lanta na.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nahiya si Maria Clara at tinakpan ang mga 
mata, ng kanyang mabibilog na mga brazo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hala, maghusay ka, halika!--ang 
sabi ng matandang babae ng&nbsp; buong&nbsp; pag-irog.--Samantalang 
nakikipag-usap siya sa iyong ama ng iyong ... halika at huwag kang magpahintay!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Napadala ang dalagang tulad sa isang 
musmos, at doon sila nagkulong sa kanyang 'aposento.'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Masaya ang salitaan ni Kapitan Tiago at 
ni Ibarra ng sumipot si Tia Isabel na halos kinakaladkad ang kanyang pamangking 
babae, na nagpapalingalinga kung saansaan, datapuwa't hindi tumitingin sa kanino mang tao....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Anong pinag-usapan ng dalawang 
kaluluwang iyon, ano ang 
kanikanilang sinabi diyan sa salitaan ng mga mata, na 
lalong lubos ang galing kay sa salitaan ng bibig, salitaang ipinagkaloob sa 
kaluluwa at ng huwag makagulo ang ingay sa pagtatamong timyas ng damdamin? Sa 
mga sandaling yaon, pagka nagkakawatasan ang dalawang linikhang sumasaligaya sa 
kilos ng mga balintataong natatabingan ng mga pilik-matang 
pinaglalampasanan ng pag-iisip, ang pananalita'y mabagal, magaspang, mahina, 
wangis sa ugong ng kulog na nangangalagkag at walang tuos kung isusumag sa 
nakasisilaw na liwanag at mabilis ng kidlat: nagsasaysay ng isang damdaming 
kilala na, isang isipang napag-uunawa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At kaya lamang ginagamit ito'y 
											sapagkat ang mithi ng puso'y siyang nakapangyayari sa&nbsp; buong&nbsp; 
											katauhang saganang 
sagana sa galak, ibig na ang&nbsp; buong&nbsp; katawan niyang kasama ang lahat ng sankap na 
laman, buto at dugo at ang&nbsp; buong&nbsp; kaisipan ay magsaysay ng hiwagang mga 
katuwaang inaawit ng espiritu. Sa tanong ng pagsinta sa isang sulyap na 
numiningning o lumalamlam, walang mga sagot ang salita: tumutugon ang ngiti, ang 
halik o ang buntong hininga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At pagkatapos, sa pagtakas ng dalawang 
nagsisintahan sa 'plumero' ng Tia Isabel na nagpapabangon sa alikabok, sila'y 
pumaroon sa asotea upang sila'y makapag-usap ng&nbsp; buong&nbsp; kalayaan sa silong ng mga balag; ano ang 
kanilang pinag-usapan 
ng marahan at nanginginig kayo, 
mga maliliit na bulaklak ng 'kabello-de-angel'? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Kayo ang magsabi't may bango kayo sa inyong hininga at may mga kulay kayo sa inyong 
mga labi; ikaw, 'kefiro' 
ang magsabi yamang nag-aral ka ng di karaniwang mga tinig sa lihim ng gabing 
madilim at sa talinghaga ng aming mga kagubatang virgen; sabihin ninyo, mga 
sinag ng araw, maningning na tagapagpakilala sa lupa ng Walang Hanggan, 
tanging hindi nahahawakan sa daigdig ng mga natatangnan: kayo ang 
mangagsabi, sapagkat wala akong nalalamang isaysay kung di mga kahalingang 
hindi mainam dinggin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nguni't yamang aayaw ninyong sabihin, 
aking titingnan kung aking maisasaysay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang langit ay azul: nagpapagalaw ng mga 
dahon at ng mga bulaklak ng halamang gumagapang ang isang malamig na amihang 
hindi amoy rosa,--dahil dito'y nangagsisipanginig ang mga kabello--de--angel--ang 
mga halamang nakabitin, ang mga tuyung isda at ang mga lamparang galing sa 
Tsina. Ang ingay ng sagwang humahalo ng malabong tubig ng ilog, ang 
dagundong ng pagdaan ng mga kotse at mga karreton sa tulay ng Binundok ay 
maliwanag na dumarating hanggang sa kanila; nguni't hindi ang mga 
ipinagbububulong ng tiya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Lalong magaling--ang wika nito--diya'y ang&nbsp; 
buong&nbsp; bayan ang siyang babantay sa inyo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang magpasimula'y wala silang 
pinagsalitaanan kung di pawang mga kahalingan--iyang mga kahalingang totoong 
nakakawangis niyang mga kayabangan ng mga nacion sa Europa: masasarap at 
lasang pulot sa mga magkakanacion, datapuwa't nakapagtatawa o nakapagpapakunot 
sa kilay ng mga taga ibang lupain.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang babae, palibhasa'y kapatid ni Cain ay 
panibughuin, kaya't dahil dito'y tumanong sa nangingibig sa kanya:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Lagi bang isinaisip mo ako? hindi mo 
ba ako linimot sa gayong karaming mga paglalakba'y mo? Pagkaramiraming 
malalaking mga kiudad na may pagkaramiraming magagandang mga babae!...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang lalaki naman, palibhasa'y isa pa ring 
kapatid ni Cain ay marunong umiwas sa mga tanong at may kaunting pagka 
sinungaling, kaya nga:</font></p>
<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mangyayari bagang kata'y 
limutin?--ang sagot na nangangaanino ng&nbsp; buong&nbsp; ligaya sa mga maiitim na 
balingtatao ng dalaga;--mangyayari bagang magkulang ako sa panunumpa, sa isang 
panunumpang dakila? Natatandaan mo ba ang gabing yaon, ang gabing yaong 
sumisigwa, na ikaw, ng makita mo akong nag-iisang tumatangis sa siping ng 
bangkay ng aking ina'y lumapit ka sa akin, ilinagay mo ang iyong kamay sa aking 
balikat, ang kamay mong malaon nang ayaw mong ipahintulot na 
aking matangnan, at iyong sinabi sa akin: 'Nangulila ka sa iyong ina, ako'y 
hindi nagkaina kailan man.': at dumamay ka sa akin ng pag-iyak. Iniirog mo ang 
aking ina at ikaw ay pinakaibig niyang tulad sa isang anak. </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa dakong labas ay 
umuulan at kumikidlat; nguni't sa akala ko'y nakarinig ako ng musika, at 
nakita kong ngumingiti ang maputlang mukha ng bangkay ... oh, kung buhay 
sana ang aking mga magulang at mapanood nila ikaw! Nang magkagayo'y tinangnan ko ang iyong 
kamay at ang kamay ng aking ina, nanumpa akong sisintahin kata, 
kata'y paliligayahin, ano man ang kapalarang sa aki'y ipagkaloob ng Langit, at 
											sapagkat hindi nakapagbigay pighati kailan man sa akin ang sumpang ito; 
ngayo'y muling inuulit ko sa iyo. </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Mangyayari bagang limutin ko ikaw? 
											Laging kasamasama ko ang pag-aalaala 
											ko sa iyo; iniligtas ako sa mga 
											panganib ng paglalakad maging 
											kaaliwan ko sa pag-iisa ng aking 
											kaluluwa sa mga ibang lupain; ang 
											pag-aalaala sa iyo ang pumawi ng 
											bisa ng 'loto' ng Europa na 
											kumakatkat ng mga pag-asa at ng 
											kasaliwaang palad ng kinagisnang 
											lupa sa kaisipan ng maraming mga 
											kababayan! </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga panagimpan 
ko'y nakikita ko ikaw 
na nakatindig sa tabing dagat ng Maynila, nakatanaw sa malayong abot ng 
paninging nababalot sa malamlam na liwanag ng maagang pagbubukang liwayway; 
aking naririnig ang isang aaying-aying at malungkot na awit na sa aki'y 
pumupukaw ng nagugulaylay ng mga damdamin, at tinatawag ko sa alaala ng 
aking puso ang mga unang taon ng aking kamusmusan, ang ating mga katuwaan, 
ang ating mga paglalaro, ang&nbsp; buong&nbsp; nakaraang maligayang panahong binigyan mong kasayahan, samantalang doroon 
ka sa bayan. </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa aking sapantaha'y ikaw ang 'hada', 
ang espiritu, ang kaayaayang kinakatawan ng aking Bayang kinagisnan, maganda, 
mahinhin, masintahin, lubos kalinisan, anak ng Filipinas, niyang kagandagandahang lupang bukod sa mga dakilang 
kagalingan ng Inang Espa&ntilde;ang 
taglay rin niya'y may maririkit pang mga hiyas ng isang bayang bata, tulad sa 
pagkakapisan sa iyong katauhan ng lahat ng kagandahan at karikitang 
nakapagpapaningning sa dalawang lahi; kaya nga't nabubuo lamang sa isa ang 
pagsinta ko sa iyo't ang pagsinta ko sa aking tinubuang lupa ... Maaari ba katang limutin? </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Makailang ang&nbsp; 
buong&nbsp; 
isip ko'y aking naririnig ang mga tunog ng 
iyong piano at ang mga tinig ng iyong boses, at kailan mang tinatawag ko ang 
iyong pangalan ng ako'y na sa Alemania, sa dakong hapon, pagka naglalakad ako 
sa mga kaparangang napupuspos ng mga talinghagang likha ng mga poeta roon 
at ang mga kahimahimalang salitsaling sabi ng mga 
taong nangaunang nabuhay, nakikinikinita ko ikaw sa ulap na sumisilang at 
napaiimbulog sa duyo ng kapatagan, wari naririnig ko ang iyong boses sa 
pagaspas ng mga dahon, at pagka umuuwi na ang mga tagabukid na galing sa kanilang sinasakang lupa at 
kanilang ipinaririnig buhat sa malayo ang kanilang 
karaniwang mga awit, sa aking akala'y pawang nakikisaliw sila sa mga boses ng kaibuturan ng aking dibdib, na nag-aalay na lahat sa iyo ng awit at siyang 
nagbibigay katotohanan sa aking mga nais at mga panagimpan. </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Kung minsa'y naliligaw ako sa mga 
											landas ng mga kabundukan, at ang 
											gabing doo'y untiunti ang pagdating 
											ay nararatnan akong naglakad pa't 
											hinahanap ko ang aking daan sa gitna 
											ng mga 'pino,' ng mga 'haya' at ang 
											mga 'enkina'; kung nagkakagayon, 
											kung nakalulusot ang ilang mga sinag 
											ng buwan sa mga puang ng masinsing 
											mga sanga, wari'y nakikinikinita ko 
											ikaw sa sinapupunan ng gubat, tulad 
											sa isang nagpapagalagalang aninong 
											gagalawgalaw at nagpapakabikabila sa 
											liwanag at sa mga kariliman ng 
											malagong kaparangan, at saka 
											ipinaririnig ng 'ruise&ntilde;or' ang 
											kanyang iba't ibang kawiliwiling 
											huni, inaakala kong dahil sa ikaw ay 
											nakikita't ikaw ang siyang sa 
											kanya'y nakaaakit. Kung inalaala ko 
											ikaw! </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi lamang pinasasaya sa aking mga mata ng lagablab ng sa iyo'y pagsinta ang ulap 
at pinapamumula ang hielo! Sa Italia, ang magandang langit ng Italia, sa kanyang 
											kadalisaya't kataasa'y nagsasalita 
											sa akin ng iyong mga mata; ang 
											kanyang masayang panoorin ay 
											nagsasaysay sa akin ng iyong ngiti, 
											wangis ng mga halamanan sa 
											Andalukiang nalalaganapan ng hanging 
											may kipkip na bango, puspos ng mga 
											pangdilidiling kasilanganan, sagana 
											sa hiwaga at sa kalugodlugod na mga 
											tanghalin, pawang nangagsasalita sa 
											akin ng sa iyo'y pagsinta! </font></p>
											<p class="gap" align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga gabing may 
											buwan, yaong buwang wari'y nagtutuka, sa aking sinagwansagwang nakalulan ako sa isang 
sasakyang maliit sa ilog Rhin, itinatanong ko sa aking sarili kung di kaya 
maraya ako ng aking guniguni upang makita ko ikaw sa, gitna ng mga alamong 
na sa pampang, sa bato ng Lorelay o sa gitna ng mga alon at ikaw ay umaawit 
sa katahimikan ng gabi, tulad sa dalagang hadang mapang-aliw, upang bigyang kasayahan ang pag-iisa at ang 
kalungkutan ng mga gibang kastillong iyon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ako naglakbay-bayang gaya mo, wala 
akong nakikita kung di ang iyong bayan, ang Maynila't Antipolo--ang sagot ni 
Maria Clarang ngumingiti, palibhasa'y naniniwala sa lahat ng sinasabi ni 
Ibarra,--nguni't mula ng sabihin ko sa iyong paalam! at pumasok ako sa 
beaterio, lagi nang naaalaala kata at hindi ko ikaw nilimot, bagaman 
ipinag-utos sa akin ng konfesor at pinarusahan ako ng maraming mga pahirap. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nagugunita, ko ang ating mga paglalaro, ang ating mga pag-aaway ng tayo'y 
mga musmos pa. Hinihirang mo ang lalong magagandang sigay at ng tayo'y 
makapaglaro ng siklot, humahanap ka sa ilog ng lalong mabibilog at makikinis 
na batong maliliit na may iba't ibang kulay at ng makapaglaro tayo ng sintak; 
ikaw ay napakawalang tuto, lagi kang natatalo, at ang parusa'y binabantilan 
kata ng palad ng aking kamay, nguni't di ko inilalakas, sapagkat naaawa ako 
sa iyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Napakamagdaraya, ikaw sa larong chongka't dinaraig mo pa ang 
pagkamagdaraya ko, at karaniwang agawan ang nagiging katapusan. Natatandaan 
mo ba ng ikaw ay magalit ng totohanan? Niyo'y pinapagpighati mo ako; nguni't 
ng matapos, pagka naaalaala ko iyon sa beaterio, ako'y ngumingti dinaramdam kong ikaw ay wala, at ng makapag-away 
uli kata ... at ng pagdaka'y magawa 
natin ang pagkakasundo. Niyo'y mga musmos pa tayo, naparoon tayong naligong 
kasama ang iyong ina sa batis na iyong nalililiman ng mga kawayanan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sa mga 
pampang ay may mga sumisibol na mga bulaklak at mga halamang sinasabi mo sa 
akin sa wikang latin at wikang kastila ang kanikanilang mga kakaibang 
pangalan, sapagkat niyo'y nag-aaral ka na sa Ateneo. Hindi kata pinapansin; 
naglilibang ako sa panghahagad ng mga paroparo at ng mga tutubi, na sa 
kanyang katawang maliit na tulad sa alfiler ay taglay ang lahat ng mga kulay ng bahaghari at ang lahat 
ng mga kintab ng garing, mga tutubing gumagalaw 
at nangaghahagaran sa magkabikabilang mga bulaklak; kung minsa'y ibig kong 
masubukan at hulihin ng kamay ang maliliit na isdang matuling nangagtatakbuhan 
sa mga lumot at sa mga batuhan sa pampang. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Kaginsaginsa'y nawala ka, at ng 
ikaw ay bumalik, may dala kang koronang mga dahon at mga bulaklak ng 
dalandang ipinutong mo sa aking ulo, at tinatawag mo akong 'Cloe', 
at gumawa ka naman ng koronang damong gumagapang. nguni't kinuha ng iyong 
nanay ang aking korona, pinukpok ng isang bato at saka inihalo sa gugo na 
ipinaglilinis ng ating ulo; tumulo ang mga luha sa iyong mga mata, at sinabi 
mong hindi 
nakaaalam ang iyong ina ng 'mitologia'.--'Haling!--ang 
isinagot ng nanay mo--makikita mo't mababango pagkatapos ang inyong mga 
buhok.'--Nagtawa ako, naghinanakit ikaw, at ayaw mo na akong kausapin, at sa&nbsp; 
buong&nbsp; maghapo'y nagpakita ka ng poot, na siyang ikinaibig ko namang umiyak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang bumalik tayo sa bayan, at 
sapagkat 
mainit na totoo ang araw, nuha ako ng mga dahon ng sambong nasumisibol sa 
mga tabing daan, ibinigay ko sa iyo't ng ilagay mo sa loob ng iyong sombrero, 
at ng di sumakit ang iyong ulo. ngumiti ikaw ng magkagayo'y tinangnan ko ang 
kamay mo at nagkasundo na kata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">ngumiti ng&nbsp; buong&nbsp; ligaya si Ibarra, 
binuksan ang kanyang kartera, kinuha sa loob niyon ang isang papel at sa loob 
nito'y may nababalot na mga dahong nangingitim, tuyo at mababango.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang iyong mga dahon ng sambong!--ang 
isinagot ni Ibarra sa titig ni Maria Clara,--ito lamang ang naibigay mo sa akin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dalidali namang kinuha ni Maria Clara sa 
kanyang dibdib ang isang bolsitang rasong maputi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ps!--ani Maria Clara at tinampal ang kamay ni Ibarra;--hindi ipinahihintulot ang paghipo: ito'y isang sulat ng 
pagpapaalam.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Iyan ba ang isinulat ko sa iyo bago ako 
pumanaw?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At sumulat po ba kayo sa akin ng iba 
pa, aking ginoo?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano ba ang sinasabi ko sa iyo ng 
panahong iyon?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Maraming kabulastugan! mga dahilan ng 
masamang mangungutang--ang isinagot ni Maria Clarang ngumingiti, na 
ipinakikilalang totoong ikinasasaya ng kanyang loob ang gayong mga kabulaanan.--Huwag 
kang malikot! babasahin ko sa iyo ang sulat na ito! nguni't ililingid ko ang 
iyong mga pagpuri at ng di ka magdalita!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At itinaas ang papel sa tapat ng kanyang 
mga mata at ng huwag makita ng binata ang kanyang mukha, at nagpasimula:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--'Aking ...' hindi ko babasahin sa iyo 
ang sumusunod, sapagkat isang kabulastugan!--at pinaraanan ng mga mata ang 
ilang talata.--'Ibig ng aking ama, ang ako'y yumao, bagaman ipinamamanhik kong 
huwag'--'Ikaw ay lalaki--ang sabi sa akin, dapat mong isipin ang panahong darating 
at ang iyong mga lakas. Dapat mong pag-aralan ang dunong sa pamumuhay, ang di 
maibibigay sa iyo ng iyong kinamulatang lupa, at ng balang araw ay 
makapaglingkod ka sa kanya. Kung mananatili ka sa aking tabi, sa aking lilim, sa 
impapawid na ito ng mga hinalaan, hindi ka matututong tumanaw 
sa malayo, at sa araw na kata'y maiwan sa ibabaw ng lupa'y maitutulad ka sa 
halamang sinasalita ng ating poetang si Baltazar;</font></p>
<div class="poem">
	<div class="stanza">
		<div class="verseind">
			<p align="justify" style="margin-left: 80px; margin-right: 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt">'Para ng halamang lumaki sa 
			tubig,</font></div>
		<div class="verse">
			<p align="justify" style="margin-left: 80px; margin-right: 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt">daho'y nalalanta munting di 
			madilig,</font></div>
		<div class="verse">
			<p align="justify" style="margin-left: 80px; margin-right: 80px">
			<font face="Arial" color="#333333" style="font-size: 13pt">ikinalolooy ang sandaling 
			init....'</font></div>
	</div>
</div>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nakita mo na! binata ka na halos ay 
tumatangis ka pa!--'Nakapagpasakit sa aking loob ang ganitong pag-wiwika, kaya't 
ipinahayag ko sa kanyang ikaw ay aking sinisinta. Hindi umimik ang aking ama, 
naglining-lining, ilinagay sa aking balikat, ang kanyang kamay at nagsalita sa 
aking nanginginig ang boses:--Ang isip mo ba'y ikaw lamang ang marunong umibig at 
hindi ka iniibig ng iyong ama at hindi dinaramdam ang sa iyo'y paghiwalay?' 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi pa nalalaong nangulila tayo sa iyong ina; tumutungo ako sa katandaan, 
diyan sa gulang na ang hinahanap ay ang tulong at pagbibigay aliw ng kabataan, 
at gayon ma'y tinatanggap ko ang pag-iisa at di ko talos kung kata'y makikita pa 
uli. nguni't dapat kong isipin ang mga ibang bagay na lalong malalaki.... 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Bumubukas sa iyo ang panahong sasapit, samantalang sumasara sa akin; sumisilang 
sa iyo ang mga pagsinta, ang mga pag-ibig ko'y nangamamatay; kumukulo ang 
apoy sa iyong mga ugat sa aki'y nagsisimula, ang kalamigan, at gayon ma'y ikaw 
ay umiiyak at hindi ka marunong maghandog ng ngayon, at ng sa bukas ay 
makinabang ka at pakinabangan ikaw ng iyong kinagisnang lupa.'--Napuno ng 
luha ang mga mata ng aking ama, naluhod ako sa kanyang paanan, siya'y aking 
niyakap at sinabi ko sa kanyang ako'y nahahandang yumao'.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Napatigil ang pagbasa, dahil sa 
pagkaligalig ni Ibarra: namumutla ang binata at naglalakad ng paroo't parito sa 
magkabikabilang dulo ng asotea.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang iyong damdam? ano ba ang 
nangyayari sa iyo?--ang tanong ni Maria Clara kay Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dahil sa iyo'y nalimutan ko ang aking 
mga katungkulan; dapat akong pumaroon ngayon din sa aking bayan! Bukas ang 
piyesta ng mga namatay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi umimik si Maria Clara, itinitig 
niyang ilang sandali ang kanyang malalaki't mapupungay na mga mata kay Ibarra, 
kumuha ng ilang bulaklak at sinabi sa kanyang nababagbag ang loob:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Lumakad ka, hindi na kata pinipigil; 
magkikita uli tayo sa loob ng ilang araw! Ilagay mo itong bulaklak sa ibabaw ng 
libingan ng iyong mga magulang!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang makaraan ang ilang minuto, ang 
binata'y nananaog na sa hagdanang kasabay si Kapitan Tiago at si Tia Isabel, 
samantalang nagkukulong sa panalanginan si Maria Clara.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ipakisabi nga po ninyo kay 
Andeng na kanyang ihanda ang bahay at mangagsisirating si Maria at 
si&nbsp;Isabel!--Dumating nawa kayong maluwalhati!--ani Kapitan Tiago, samantalang 
sumasakay si Ibarra sa kotse, na yumaong ang tungo'y sa plaza ng San Gabriel.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At sinabi pagkatapos ni Kapitan Tiago kay 
Maria Clara na umiiyak sa tabi ng larawan ng isang Birhen:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hala, magsindi ka ng dalawang kandilang 
mangahati, ang isay sa Se&ntilde;or San Rafael, pintakasi ng mga naglalakbay. Isindi 
mo ang lampara ng Nuestra Se&ntilde;ora de la Paz y Buen Viaje. Lalong magaling ang 
magkagugol ng isang salapi sa pagkit at anim na kuarta sa langis, kay sa 
magbayad pagkatapos ng isang mahalagang tubos.</font></p>
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