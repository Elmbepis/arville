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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XVIII. Mga Kaluluwang Naghihirap</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Magkakaroon na ng ikapitong 
oras ng 
umaga ng matapos ni Padre Salvi ang kanyang katapusang misa: ginawa niya ang 
tatlong misa sa loob ng isang oras.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May sakit ang pari--anang madadasaling 
mga babae; hindi gaya ng dating mainam at mahinhin ang kanyang kilos.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Naghubad ng kanyang mga suot na di 
umiimik, hindi tumitingin sa kanino man, hindi bumabati ng kahit ano.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mag-ingat!--anang bulungbulungan ng mga sakristan;--lumulubha ang sama 
ng ulo! Uulan ang mga multa, at ang lahat ng ito'y pawang kasalanan ng dalawang 
magkapatid!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umalis ang kura sa sakristia upang 
tumungo sa kumbento; sa silong nito'y nangakaupo sa bangko ang pito o walong 
mga babae at isang lalaking nagpapalakadlakad ng paroo't parito. Nang makita 
nilang dumarating ang kura ay nangagtindigan; nagpauna sa pagsalubong ang isang 
babae upang hagkan ang kanyang kamay; nguni't gumamit ang kura ng isang anyong 
kayamutan, kaya't napahinto ang babae sa kalagitnaan ng kanyang paglakad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nawalan yata ng sikapat si Curiput?--ang 
mariing sabi ng babae sa salitang patuya, na nasaktan sa gayong pagka tanggap. 
Huwag pahagkan sa kanya ang kama'y, sa gayong siya'y keladora ng 'Hermandad', 
gayong siya'y si Hermana Rufa! Napakalabis namang totoo ang gayong gawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi umupo ngayong umaga sa konfesonario!--ang idinugtong ni Hermana Sipa, isang matandang babaeng wala ng ngipin;--ibig 
ko sanang mangumpisal at 
ng makapakinabang at ng magkamit ng nga 'indulgencia'.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y kinahahabagan ko kayo!--ang 
sagot ng isang babaeng bata pa't ma'y pagmumukhang tanga; nagkamit ako 
ngayong umaga ng tatlong indulgencia plenaria na aking ipinatungkol sa 
kaluluwa ng aking asawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Masamang gawa, hermana 
Juana!--ang sabi ng nasaktan ang loob na si Rufa.--Sukat na ang isang indulgencia 
plenaria upang mahango siya sa purgatoryo; hindi dapat ninyong sayangin ang 
mga santa indulgencia; tumulad kayo sa akin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Lalong magaling ang lalong marami: ang 
sabi ko!--ang sagot ng walang malay na si hermana Juana, kasabay ang ngiti.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi agad sumagot si hermana Rufa: 
nanghingi muna ng isang hitso, nginanga, minasdan ang nagkakabilog na sa kanya'y 
nakikinig ng di kawasa, lumura sa isang tabi, at nagpasimula, 
samantalang ngumangata ng tabako:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko sinasayang 
kahit isang santong 
araw! Nagkamit na ako, buhat ng ako'y mapanig sa Hermandad, ng apat na raa't 
limampo't pitong mga indulgencia plenaria, pitong daa't anim na pong libo, 
limang daa't siyam na po't walong taong mga indulgencia. Aking itinatala ang 
lahat ng aking mga kinakamtan, sapagkat ang ibig ko'y malinis na salitaan; 
ayaw akong mangdaya, at hindi ko rin ibig na ako'y dayain.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumigil ng pananalita si Rufa at 
ipinatuloy ang pagnguya; minamasdan siya, ng&nbsp; buong&nbsp; pagtataka ng mga babae; nguni't huminto sa pagpaparoo't parito ang lalaki, at nagsalita 
kay Rufa 
ng 
may anyong pagpapawalang halaga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't nakahigit ako sa inyo, 
hermana Rufa, ng taong ito lamang sa mga kinamtan ko, ng apat na indulgencia 
plenaria at sangdaang taon pa; gayong hindi lubhang nagdarasal ako ng taong 
ito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Higit kay sa akin? Mahigit na anim na 
raa't walompo't siyam na plenaria, siyam na raa't siyam na po't apat na libo 
walong daa't limampo't anim na taon?--ang ulit ni hermana Rufang wari'y masama 
ng kaunti ang loob.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gayon nga, walong plenaria at sangdaa't 
labing limang taon ang aking kahigitan, at ito'y sa iilang buwan lamang--ang 
inulit ng lalaking sa liig ay may sabit na mga eskapulario at mga kuintas na 
puno ng libag.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi dapat 
pagtakhan--ani Rufang napatalo na;--kayo po ang maestro at ang puno sa 
lalawigan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">ngumingiti ang lalaking lumaki ang loob.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi nga dapat ipagtakang ako'y 
makahigit sa inyo ng pagkakamit; halos masasabi kong kahit natutulog ay 
nagkakamit ako ng mga indulgencia.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ano po ba ang ginagawa ninyo sa mga 
indulgenciang iyan?--ang tanong na sabaysabay ng apat o limang boses.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Psh!--ang sagot ng 
lalaking umanyo ng labis na pagpapawalang halaga;--aking isinasabog sa 
magkabikabila!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't sa bagay 
ngang iyan hindi ko mangyayaring kayo'y purihin, maestro--ang itinutol ni 
Rufa,--Kayo'y pasasa purgatoryo, dahil sa inyong pagsasayang ng mga indulgencia. 
Nalalaman na po ninyong pinagdurusahan ng apat na pong araw sa apoy ang bawa't 
isang salitang walang kabuluhan, ayon sa kura; anim na pong araw sa bawa't isang 
dangkal na sinulid; dalawampu, bawa't isang patak na tubig. Kayo'y pasasa 
purgatoryo!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Malalaman ko na kung paano ang paglabas 
ko roon!--ang sagot ni hermano Pedro, taglay ang dakilang 
pananampalataya.--Lubhang marami ang mga kaluluwang hinango ko sa apoy! 
Lubhang marami ang ginawa kong mga santo! At bukod sa rito'y 'in artikulo 
mortis' (sa oras ng kamatayan) ay makapagkakamit pa ako, kung aking ibigin, ng 
pitong mga 'plenaria', at naghihingalo na'y makapagliligtas pa ako sa mga iba!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At pagkasalita ng gayo'y lumayong taglay 
ang malaking pagmamataas.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gayon ma'y dapat ninyong gawin ang katulad ng aking gawa, na di ako nagsasayang 
kahit isang araw, at magaling na 
bilang ang aking ginagawa. Hindi ko ibig ang magdaya, at ayaw naman akong 
maraya nino man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At paano po, ba ang gawa ninyo?--ang 
tanong ni Juana.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dapat nga po ninyong tularan ang 
ginagawa ko. Sa halimbawa: ipalagay po ninyong nagkamit ako ng isang taong 
mga indulgencia: itinatala ko sa aking kuaderno at aking 
sinasabi:--'Maluwalhating Amang Poong Santo Domingo, pakitingnan po ninyo kung sa 
purgatoryo'y may nagkakailangan ng isang taong ganap na walang labis kulang 
kahit isang araw.'--Naglalaro ako ng 'kara-y-kruz;' kung lumabas na 'kara' ay 
wala; mayroon kung lumabas na 'kruz.' ngayo'y ipalagay nating lumabas ng 'kruz', pagkagayo'y isinusulat 
ko: 'nasingil na;' lumabas na 'kara'? 
pagkagayo'y iniingatan ko ang indulgencia, at sa ganitong paraa'y 
pinagbubukodbukod ko ng tigsasangdaaag taong itinatala kong magaling. Sayang na 
sayang at hindi magawa sa mga indulgencia ang kawangis ng ginagawa sa 
salapi: ibibigay kong patubuan: makapagliligtas ng lalong maraming mga 
kaluluwa. Maniwala kayo sa akin, gawin ninyo ang aking ginagawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y lalong magaling ang aking ginagawa!--ang sagot ni hermana Sipa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano? Lalong magaling?--ang tanong ni 
Rufang nagtataka.--Hindi mangyayari! Sa ginagawa ko'y wala ng gagaling pa!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Makinig po kayong sandali at 
paniniwalaan ninyo ang aking sabi, hermana!--ang sagot ni hermana Sipang matabang 
ang pananalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tingnan! tingnan! pakinggan natin!--ang 
sinabi ng mga iba.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagkatapos na makaubo ng&nbsp; 
buong&nbsp; pagpapahalaga'y nagsalita ang matandang babae ng ganitong anyo:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Magaling na totoo ang inyong 
pagkatalastas, na kung dasalin ang 'Bendita-sea tu Pureza,' at ang 'Se&ntilde;or-mio 
Jesu kristo,--Padre dulkisimo-por el gozo,' nagkakamit ng sampung taong 
indulgencia sa bawa't letra..</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dalawampu!--Hindi!--Kulang!--Lima!--ang sabi 
ng ilang mga boses.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi kailangan ang lumabis o kumulang 
ng isa! ngayon: pagka nakababasag ang aking isang alilang lalaki o isang 
alilang babae ng isang pinggan, vaso o taza, at iba pa, ipinapupulot ko ang 
lahat ng mga piraso, at sa bawa't isa, kahit sa lalong kaliitliitan, 
pinapagdarasal ko siya ng 'Bendita-sea-tu-Pureza' at ng Se&ntilde;or-mio-Jesu kristo 
Padre dulkisimo por el gozo', at ipinatutungkol ko sa mga kaluluwa ang mga 
indulgenciang kinakamtan ko. Nalalaman ng lahat ng taga bahay ko ang bagay na 
ito, tangi lamang na hindi ang mga pusa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nguni't ang mga alilang babae ang 
siyang nagkakamit ng mga indulgenciang iyan, at hindi kayo, Hermana Sipa--ang 
itinutol ni Rufa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At sinong magbabayad ng aking mga taza 
at ng aking mga pinggan? Natutuwa ang mga alilang babae sa gayong paraang 
pagbabayad, at ako'y gayon din; sila'y hindi ko pinapalo; tinutuktukan ko lamang 
o kinukurot ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gagayahin ko!--Gayon din ang aking 
gagawin!--At ako man!--ang sabihan ng mga babae.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't kung ang pinggan ay 
nagkakadalawa o nagkakatatatlong piraso lamang? Kakaunti ang inyong kakamtan!--ang ipinaunawa pa ng maulit na si Rufa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Itulot po ninyong ipagtanong ko sa inyo 
ang isang pinag-aalinlanganan ko--ang sinabi ng totoong kakimian ng bata pang 
si Juana.--Kayo po mga ginoong babae ang nakakaalam na magaling ng mga bagay 
na itong tungkol sa Langit, purgatoryo at Infierno,.... ipinahahayag kong ako'y 
mangmang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sabihin ninyo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Madalas na aking nakikita sa mga 
pagsisiyam (novena) at sa mga iba pang mga libro ang ganitong mga bilin: 
'Tatlong amanamin, tatlong Abaginoong Maria at tatlong Gloria patri..'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ngayon?....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ngayo'y ibig kong maalaman kung paano 
ang gagawing pagdarasal: O tatlong Amanaming sunod-sunod, tatlong Abaginoong 
Mariang sunod-sunod; o makaatlong isang Amanamin, isang Abaginoong Maria at 
isang Gloria Patri?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gayo nga ang marapat, makaitlong isang 
Amanamin....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ipatawad ninyo, hermana 
Sipa!--ang isinalabat ni Rufa: dapat dasaling gaya ng ganitong paraan: hindi 
dapat ilahok ang mga lalaki sa mga babae: ang mga Amanamin ay mga lalaki, 
mga babae ang mga Abaginoong Maria, at ang mga Gloria ang mga anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ee! ipatawad ninyo, hermana Rufa; 
Amanamin, Abaginoong-Maria at Gloria ay katulad ng kanin, ulam at patis, isang 
subo sa mga santo ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nagkakamali kayo! 
Tingnan na po lamang ninyo, kayong nagdarasal ng paganyan ay hindi nasusunduan 
kailan man ang inyong hinihingi!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At kayong nagdarasal ng paganya'y hindi kayo nakakakuha ng ano man sa inyong mga pagsisiyam!--ang muling isinagot ng 
matandang Sipa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sino?--ang wika ni 
Rufang tumindig--hindi pa nalalaong nawalan ako ng isang biik, nagdasal ako kay 
San Antonio ay aking nakita, at sa katunaya'y naipagbili ko sa halagang 
magaling, aba!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Siya nga ba? Kaya 
pala sinasabi ng inyong kapit-bahay na babaeng inyo raw ipinagbili ang isang 
biik niya!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sino? Ang walang hiya! Ako ba'y gaya 
ninyo ...?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakailangang mamagitna ang maestro upang 
sila'y payapain: sino ma'y wala ng nakagunita ng mga Amanamin, walang 
pinag-uusapan kung di mga baboy na lamang.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba! aba! Huwag kayong mag-away dahil 
sa isang biik lamang! Binibigyan tayo ng mga Santong Casulatan ng halimbawa; 
hindi kinagalitan ng mga hereje at ng mga protestante ang ating Panginoong 
Jesukristo na nagtapon sa tubig ng isang kawang mga baboy na kanilang 
pag-aari, at tayong mga binyagan, at bukod sa roo'y mga hermano ng Santisimo 
Rosario pa, tayo'y mangag-aaway dahil sa isang biik lamang? Anong sasabihin 
sa atin ng ating mga kapangagaw na mga hermano terkero?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nangagsi-imik ang lahat ng mga 
babae at kanilang tinatakhan ang malalim na karunungan ng maestro, at kanilang 
pinanganganiban ang masasabi ng mga hermano terkero. Nasiyahan ang maestro 
sa gayong pagsunod, nagbago ng anyo ng pananalita, at nagpatuloy:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi malalao't ipatatawag tayo ng kura. 
Kinakailangang sabihin natin sa kanya kung sino ang ibig nating magsermon sa 
tatlong sinabi niya sa atin kahapon: o si Padre Damaso, o si Padre Martin o kung 
ang koadjutor. Hindi ko maalaman kung humirang na ang mga terkero; 
kinakailangang magpasiya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang koadjutor--ang ibinulong ni Juanang 
kimingkimi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hm! Hindi marunong magsermon ang 
koadjutor!--ang wika ni Sipa;--mabuti pa si Padre Martin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Si Padre Martin?--ang mariing tanong ng 
isang babae, na anyong nagpapawalang halaga;--siya'y walang boses;&nbsp;mabuti si 
Padre Damaso.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Iyan, iyan nga!--ang 
saysay ni Rufa.--Si Padre Damaso ang tunay na marunong magsermon, katulad siya 
ng isang komediante; iyan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't hindi natin maunawa ang 
kanyang sinasabi!--ang ibinulong ni Juana.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--sapagkat totoong malalim! nguni't 
magsermon na lamang siyang magaling....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang gayo'y siyang pagdating ni Sisang may 
sunong na bakol, nag-magandang araw sa mga babae at pumanhik sa hagdanan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pumapanhik iyon! pumanhik naman 
tayo!--ang sinabi nila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nararamdaman ni Sisang tumitibok ng&nbsp; 
buong&nbsp; 
lakas ang kanyang puso, samantalang pumapanhik siya sa hagdanan; hindi pa niya 
nalalaman kung ano ang kanyang sasabihin sa Padre upang mapahupa ang galit, at kung ano ang mga 
katuwirang kanyang isasaysay upang maipagsanggalang ang 
kanyang anak. Nang umagang iyon, pagsilang ng mga unang sinag ng liwayway, 
nanaog siya sa kanyang halamanan upang putihin ang lalong magagandang gulay, na 
kanyang inilagay sa kanyang bakulang sinapnan ng dahong saging at mga 
bulaklak. Nanguha siya sa tabing ilog ng pako, na talastas niyang naiibigan 
ng kurang kaning ensalada. Nagbihis ng lalong magagaling niyang damit, 
sinunong ang bakol at napasabayang hindi ginising muna ang kanyang anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpapakarahan siya ng&nbsp; buong&nbsp; kaya upang 
huwag umingay, unti-unting siya'y pumanhik, at nakikinig siya ng mainam at 
nagbabaka-sakaling marinig niya ang isang boses na kilala, boses na sariwa boses 
bata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't hindi niya narinig ang sino man 
at sino ma'y hindi niya nasumpungan, kaya't napatungo siya sa kokina.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Diya'y minasdan niya ang lahat ng mga 
sulok; malamig ang pagkakatanggap sa kanya ng mga alila at ng mga sakritan. 
Bahagya na siya sinagot sa bati niya sa kanila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Saan ko mailalagay ang mga gulay na 
ito?--ang itinanong na hindi nagpakita ng hinanakit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Diyan..! sa alin mang lugar.--ang sagot ng 
'kokinero', na bahagya na sinulyap ang mga gulay na iyon, na ang 
kanyang ginagawa ang siyang totoong pinakikialaman: siya'y naghihimulmol ng isang 
kapon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Isinalansang mahusay ni Sisa sa ibabaw ng 
mesa ang mga talong, ang mga 'amargoso', ang 
mga 
patola, ang zarzalida at ang mga murang murang mga talbos ng pako. Pagkatapos 
ay inilagay ang mga bulaklak sa ibabaw, ngumiti ng bahagya at tumanong sa 
isang alila, na sa tingin niya'y lalong magaling kausapin kay sa kokinero.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Maaari bang makausap ko ang pari?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May sakit--ang sagot na marahan ng alila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At si Crispin? Nalalaman po ba ninyo kung na sa sakristia.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tiningnan siya ng alilang nagtataka.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Si Crispin?--ang tanong na pinapagkunot 
ang mga kilay.--Wala ba sa inyong bahay? Ibig ba ninyong itanggi?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nasabahay si Basilio, nguni't natira 
rito si Crispin--ang itinutol ni Sisa;--ibig ko siyang makita....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba!--anang alila;--natira nga rito; 
nguni't pagkatapos ... pagkatapos ay nagtanan, pagkapagnakaw ng maraming 
bagay. Pinaparoon ako ng kura sa kuartel pagka umagang umaga ngayon, upang 
ipagbigay sabi sa Guwardiya Sibil. Marahil sila'y naparoon na sa inyong bahay 
upang hanapin ang mga bata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tinakpan ni Sisa ang 
mga tainga, binuksan ang bibig, nguni't nawalang kabuluhan ang paggalaw ng 
kanyang mga labi: walang lumabas na ano mang tini!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tingnan na nga ninyo ang inyong mga 
anak!--ang idinugtong ng kokinero. Napagkikilalang kayo'y mapagtapat na asawa; 
nagsilabas ang mga anak na gaya rin ng kanilang ama! At mag-ingat kayo't ang 
maliit ay lalampas pa sa ama!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nanambitan si Sisa ng&nbsp; buong&nbsp; kapaitan, at 
nagpakaupo sa isang bangko.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag kayong manangis dito!--ang 
isinigaw sa kanya ng kokinero:--hindi ba ninyo alam na may sakit ang pari? Doon kayo manangis sa lansangan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nanaog sa hagdanan ang abang babaeng halos 
ipinagtutulakan, samantalang nagbubulungbulungan ang mga 'manang' at 
pinagbabalakbalak nila ang tungkol sa sakit ng kura.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tinakpan ng panyo ng kulang palad na ina 
ang kanyang mukha at pinigil ang pag-iyak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagdating niya sa daan, sa 
pag-aalinlanga'y nagpalingaplingap sa magkabikabila; pagkatapos, tila mandin 
may pinaksa na siyang gagawin, kaya't matulin siyang lumayo.</font></p>
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