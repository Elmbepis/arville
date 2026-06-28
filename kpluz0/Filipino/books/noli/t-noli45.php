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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XLV. Ang Mga Pinag-uusig</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tinatanglawan ng isang malamlam na 
liwanag na inilalaganap ng buwan at umulusot sa malalagong mga sanga ng mga 
kahoy, ang isang lalaking naglalagalag sa kagubatan, na maraha't mahinahon ang 
lakad. Manakanaka at anaki baga'y ng huwag maligaw, sumusutsot siya ng isang 
tanging tugtugin, na ang karaniwa'y sinasagot ng gayon ding sutsot sa dakong 
malayo. Matamang nakikinig ang lalaki, at ipinagpapatuloy, pagkatapos, ang 
paglakad na ang tinutunto'y ang malayong huni.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa kawakasan, ng kanyang maraanan ang 
libolibong mga nakahahadlang kung gabi sa paglalakad sa isang gubat na hindi pa 
nalalakaran, siya'y dumating sa isang maliit na puang na naliliwanagang ganap ng buwan sa ikaapat na bahagi 
ng kanyang paglaki. Matataas na mga malalaking 
batong buhay, na napuputungan ng mga kahoy ang siyang nakababakod sa 
paligid, na ano pa't wari isang nababakurang panoorang nagiba; mga kahoy na 
bagong putol, mga punong naging uling ang nakapupuno sa gitna, na 
nangahahalo sa pagkalalaking mga batong buhay, na kinukumutan ng pakaposkapos 
ng Lumikha ng kanyang kulubong na mga dahong verde ang kulay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bahagya pa lamang kararating ng lalaking 
di kilala'y siyang paglabas namang bigla ng isang lalaki rin sa likuran ng 
isang malaking bato, lumapit at binunot ang isang revolver.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sino ka?--ang tanong sa wikang tagalog na 
mabalasik ang tinig, kasabay ang pagtataas ng 'gatillo' ng kanyang sandata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kasama ba ninyo si matandang Pablo?--ang 
sagot ng bagong kararating na mahinahon ang tinig, na hindi sinagot ang 
katanungan at hindi nagugulumihanan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang kapitan ba ang itinatanong mo? Oo, 
narito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y sabihin mong narito si Elias 
at siya'y hinahanap,--anang lalaki na hindi iba kung 
di ang talinghagang piloto.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kayo po ba'y si Elias?--ang itinanong ng 
kanyang kausap na taglay ang tanging pagpipitagan, at saka lumapit, at gayon 
ma'y patuloy rin ang paguumang sa kanya ng bunganga ng revolver;--kung gayo'y ... 
halikayo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sumunod sa kanya si Elias.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pumasok sila sa isang anyong yungib na 
palusong sa kailaliman ng lupa. Ipinauunawa sa piloto, ng tagapamatnubay na 
nakakaalam ng daan, kung palusong, kung kailan dapat yumukod o gumapang; gayon 
ma'y hindi nalao't sila'y nangagsirating sa isang may anyong salas, na bahagya 
na naliwanagan ng mga huepe, at ang nangaroroo'y labingdalawa o labing limang 
lalaking may taglay na mga sandata, marurumi ang mga mukha at kagulatgulat ang 
mga pananamit, na nakaupo ang mga iba, ang iba nama'y nakahiga, at 
nagsasalitaan ng bahagya. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Namamasdan ang isang matandang lalaking mapanglaw ang 
pagmumukha, nakapulupot sa ulo niya ang isang bigkis na may dugo, nakalagay ang 
mga siko sa isang batong ginagawang pinaka mesa, at pinagninilay-nilay ang 
ilaw na sa gayong karaming usok na ibinubuga'y bahagya na ang inilalaganap na 
liwanag: kung hindi sana talastas nating iyo'y isang yungib ng mga tulisan, 
mawiwika natin, sa pagbasa ng malaking pagngangalit sa mukha ng matandang 
lalaki, na siya ang Torre ng Gutom sa araw na sinusundan ng paglamon ni 
Ugolino sa kanyang mga anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umanyong humilig ang nangahihigang mga 
lalaki ng dumating si Elias at ang namamatnugot sa kanya, datapuwa't sa isang 
hudyat nito'y nangagsitahimik at nangagkasiya na lamang sa pagmamasid sa 
piloto, na walang taglay na ano mang sandata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Untiunting lumingon ang matandang lalaki 
at ang natagpuan ng kanyang mga mata'y ang nakapagpipitagang kiyas ni Elias, 
na nakapugay na siya'y pinagmamasdang puspos ng kalungkutan at pagbibigay 
halaga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ikao ba?--ang itinanong ng matandang 
lalaki, na sumaya ng kaunti ang mga mata ng makilala ang binata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa anong kalagayan aking nasumpungan 
kayo!--ang ibinulong ni Elias sa babahagyang tinig at iginagalaw ang ulo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi umimik ang matanda at tumungo, 
humudyat ng isa sa mga tao, nanangagsitindig sila't lumayo, na kanilang 
sinulyap muna't sinukat ng mga mata ang taas at bikas ng pangangatawan ng 
piloto.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tunay nga!--ang sinabi ng matandang 
lalaki ng silang dalawa'y nagiisa na;--ng kata'y patuluyin sa aking bahay, na may anim na buwan 
ngayon, ako ang ng panahong iyo'y nahahabag sa iyo; ngayo'y nagbago ang 
kapalaran, ngayo'y ikaw naman ang nahahabag sa akin. nguni't umupo ka at 
sabihin mo sa akin kung bakit ka nakarating hangang dito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May labing limang araw na ngayong 
ibinalita sa akin ang nangyari sa inyong kasakunaan,--ang madalang na isinagot 
ng binata sa mahinang tinig, na ang ilaw ang siyang tinitingnan;--pagka alam 
ko'y lumakad na agad ako, nagpakabikabila ako sa mga kabundukan, halos dalawang 
lalawigan ang aking nalibot.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Napilitan akong tumakas at ng huwag 
magsabog ng dugong walang malay; natatakot humarap ang aking mga kaaway at ang 
kanila lamang inilalagay sa aking hirap ay ang ilang mga kaawaawa, na walang 
ginawa sa akin kahit kaliitliitang kasam-an.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">ng makalampas ang sandaling hindi 
pag-imik na ginamit ni Elias sa pagbasa ng mga kaisipang mapapanglaw sa mukha 
ng matandang lalaki, nagpatuloy ng pananalita ang binata:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naparito ako't ibig kong ipakiusap sa 
inyo ang isang bagay. Sapagkat hindi ako nakasumpong, kahi't aking pinaghanap, 
ang bahagyang labi man lamang ng mag-anak na may kagagawan ng kasawiang palad 
naming mag-anak, minagaling ko ang iwan ang lalawigang aking tinatahanan upang 
tumungo sa dakong timugan at makisama sa mga pulutong ng mga hindi binyagan 
at nabubuhay ng&nbsp; buong&nbsp; kalayaan: ibig po ba ninyong lisanin ang bagong 
pinasisimul-an ninyong pamumuhay at sumama sa akin? Lalagay akong tunay na 
inyong anak, yamang namatay ang anak po ninyo, at kikilalin ko kayong ama, 
yamang wala na akong magugulang?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umiling ang matanda ng paayaw, at 
nagsalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa gulang na aking dinating, pagka 
niyakap ng kalooban ang isang pasiyang kakilakilabot, ay dahil sa wala ng 
sukat pagpaliiran. Isang taong gaya ko, na ginamit ang kanyang kabataan at ang 
kanyang kagulangan sa pagpapagal at ng kamtan ang sariling ginhawa at ang sa 
mga anak sa panahong hinaharap; isang taong nagpakumbaba sa lahat ng mga 
naging kalooban ng kanyang mga puno, na tumupad ng&nbsp; buong&nbsp; pagtatapat sa 
mabibigat na katungkulan, na nagtiis ng lahat upang mamuhay sa katahimikan at 
sa isang katiwasayang mangyayaring kamtan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagka tinalikdan ng ganitong taong 
pinalamig na ang dugo ng panahon, ang lahat ng kanyang pinagdaanan at ang&nbsp; 
buong&nbsp; pagdaraanan pa, at sumasa mga pampangin na ng libingan, ay sapagkat 
kanyang napagkilalang lubos na walang 
kapayapaang masusumpungan at ang katiwasiya'y hindi siyang kalakilakihang 
kagalingan! Ano't magpapakatira pa sa hindi sariling lupain upang magbuhay 
dukha? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dating ako'y may dalawang anak na lalaki, isang anak na babae, isang 
bahay, isang kayamanan; aking dating tinatamo ang pagpipitaga't pagmamahal ng 
madla; ngayo'y isang kahoy na pinutlan ng mga sanga ang aking kawangis, 
lagalag, nagtatago, pinag-uusig sa mga kagubatang tulad sa isang halimaw, at 
anong dahil at ginawa sa akin ang lahat ng ito? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dahil sa inilugso ng isang 
lalaki ang kapurihan ng aking anak na babae, sapagkat hiningi ng mga 
kapatid sa lalaking iyang magsulit siya ng katampalasanang kanyang ginawa, at 
sapagkat ang lalaking iya'y nangingibabaw sa mga iba sa pamamag-itan ng 
pamagat na ministro (kinakatawan) ng Diyos. Inalintana ko, gayon man, ang lahat 
ng ito, at akong ama, ako, na siniraan ng puri sa aking katandaan, aking 
ipinatawad ang kaalimurahan, ipinagpaumanhin ko ang kasilakbuhan ng kabataan at 
ang mga karupukan ng katawang lupa, at sa kasiraang iyong hindi na 
mangyayaring maisauli, ano ang dapat kong gawin kung di ang huwag ng umimik at 
iligtas ang nalabi? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't nanganib ang tampalasang baka sa humigit kumulang na 
kadalia'y kamtan niya ang panghihiganti, kaya't ang ginawa'y 
humanap ng kapahamakan ng aking mga anak na lalaki. Nalalaman mo ba kung ano 
ang kanyang ginawa? Hindi? Natatalastas mo bang linubid ang kasinunga-lingang kunuwa'y linooban ang 
kumbento, at sa mga isinakdal ay 
kasama ang isa sa aking mga anak? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nairamay iyong 
isa, sapagkat wala't na sa ibang bayan. Nalalaman mo ba ang mga katakottakot na 
pahirap na sa kanila'y ginawa? Nalalaman mo, sapagkat nangagkakawangis ang 
ganitong mga pahirap sa lahat ng mga bayan. Aking nakita, nakita ko ang aking 
anak na nakabiting ang tali sa kanyang sariling buhok, naringig ko ang kanyang 
mga sigaw, aking naringig na ako'y kanyang tinatawag, at ako, sa aking karuwagan 
at palibhasa'y namarati ako sa kapayapaan, hindi ako nagkaroon ng katapangang 
pumatay o magpakamatay kaya! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nalalaman mo bang 
hindi napatotohanan ang pangloloob na iyon, napaliwanagan ang bintang, at ang 
naging parusa'y ilipat sa ibang bayang ang kura, at ang aking anak ay namatay 
dahil sa mga pahirap na ginawa sa kanya? Ang isa, ang nalalabi sa akin, ay hindi 
duwag na gaya ng kanyang ama; at sa katakutan ng taksil na nagpahirap na 
ipanghiganti sa kanya ang pagkamatay ng kanyang kapatid, ginamit na dahilan ang 
kawal-an ng 'sedula personal' na nalimutang sandali, piniit ng Guwardiya Sibil, 
pinahirapan, ginalit at pinasamang totoo ang loob sa kasalimura hanggang sa 
siya'y mapilitang magpakamatay! </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At ako, ako'y buhay pa pagkatapos ng 
gayong kalakilakihang kahihiyan, datapuwa't kung hindi ako nagkaroon ng 
tapang-ama sa pag-sasanggalang ng aking mga anak, may natitira pa sa aking 
isang puso upang italaga sa isang panghihiganti at manghihiganti ako! Untiunting 
nangagkakatipon ang mga maygalit sa ilalim ng aking pamiminuno, pinararami 
ang mga kawal ko ng aking mga kaaway, at sa araw na mapagkilala kong ako'y 
makapangyarihan na, lulusong ako sa kapatagan at tutupukin ko sa apoy ang aking 
panghihiganti at ang aking sariling buhay! At darating ang araw na iyan o walang 
Diyos!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At nagtindig ang matandang lalaki, na 
nagngingitngit, at idinagdag, na nagniningning ang paningin, malagunlong ang 
tinig at sinasabunutan ang kanyang mahahabang mga buhok:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sumpain ako, sumpain ako na aking 
pinigil ang mapanghiganting kamay ng aking mga anak; ako nga ang pumatay sa 
kanila! Kung pinabayaan ko sanang mamatay ang may sala, kung hindi sana ako 
lubos nanalig sa hustisya ng Diyos at sa hustisya ng mga tao, ngayon disi'y 
may mga anak pa ako, marahil sila'y nangagtatago, datapuwa't ngayo'y may mga 
anak naman sana ako, at hindi sila sana nangamatay sa kapapahirap! Hindi ako 
ipinanganak upang maging ama, kaya wala akong mga anak ngayon! Sumpain ako, 
na hindi ko natutuhang makilala sa aking katandaan ang lupaing aking 
kinatatahanan! Datapuwa't matututo akong ipanghiganti ko kayo sa pamamag-itan ng 
apoy, ng dugo at ng aking sariling kamatayan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang kulang palad na ama, sa kasilakbuhan 
ng kanyang pighati, nalabnot ang bigkis ng ulo, at dahil sa gayo'y nabuksan 
ang sugat sa noo, at doo'y bumalong ang isang batisang dugo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pinagpipitagan ko ang inyong pighati,--ang 
muling sinabi ni Elias,--at napagwawari ko ang inyong panghihiganti; ako nama'y 
gaya rin ninyo, at gayon man, sa aking panganganib na baka aking masugatan ang 
walang malay, lalong minamagaling ko pa ang kalimutan ko ang aking mga 
kasawiang palad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mangyayari kang makalimot, 
sapagkat 
bata ikaw at sapagkat hindi ka namamatayan ng isa man lamang anak, ng sino 
mang siyang iyong katapusang maaasahan! nguni't aking ipinangangako sa iyo, 
hindi ko sasaktan ang sino mang walang kasalanan. Nakikita mo ba ang sugat na 
ito? Upang huwag kong mapatay ang isang kaawaawang kuadrillerong gumaganap ng 
kanyang katungkulan, ipinaubaya kong siya ang sumugat sa akin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't tingnan 
po ninyo--ani Elias pagka lampas ng sandaling hindi pag-imik;--tingnan po ninyo 
kung alin ang kakilakilabot na siga na inyong pagsusugbahan sa ating kulang 
palad na mga bayan. Kung gaganapin ng inyong sariling mga kamay ang inyong 
panghihiganti, gaganti ng katakot takot ang inyong mga kaaway, hindi laban sa 
inyo at hindi rin laban sa mga taong sandatahan, kung di laban sa bayan, na ang 
karaniwa'y siyang isinusumbong, at pagkakagayo'y gaano karaming mga paglabag sa 
katuwiran ang mangyayari!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mag-aral ang bayang 
magsanggalang sa sarili, magsanggalang sa sarili ang bawa't isa!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Talastas po ninyong iya'y hindi 
mangyayari! Ginoo, kayo po'y aking nakilala ng ibang panahon, niyong panahong 
kayo po'y sumasaligaya, niyao'y pinagkakalooban ninyo ako ng mga paham na 
aral; maitutulot baga ninyong?...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Naghalukipkip ang matanda at wari'y 
nakikinig.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ginoo,--ang ipinagpatuloy ni Elias, na 
pinakasusukat na magaling ang kanyang mga wika;--nagka palad akong makagawa ng 
isang paglilingkod sa isang binatang mayaman, may magandang puso, may kaloobang 
mahal at mithi ang mga ikagagaling ng kanyang tinubuang bayan. Ang sabihana'y 
may mga kaibigan ang binatang ito sa Madrid, ayawan ko, datapuwa't ang masasabi 
ko sa inyo'y siya'y kaibigan ng Kapitan Heneral. Ano po ang inyong akala kung 
siya'y ang ating papagdalhin ng mga karaingan ng bayan at siya'y pakiusapan 
nating magmalasakit sa katuwiran ng mga sawing palad?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umiling ang matandang lalaki.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mayaman ang sabi 
mo? walang iniisip ang mga mayayaman kung hindi ang dagdagan ang kanilang mga 
kayamanan; binubulag sila ng kapalaluan at ng kaparangalanan, at sapagkat ang 
karaniwa'y magaling ang kanilang kalagayan, lalo na kung sila'y may mga 
kaibigang makapangyarihan, sino man sa kanila'y hindi nagpapakabagabag sa 
pagmamalasakit sa mga kulang palad. Nalalaman kong lahat, sapagkat ng una'y 
ako'y mayaman!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't ang taong sinasabi ko po sa 
inyo'y hindi kawangis ng mga iba: siya'y isang anak na inalimura dahil sa 
pag-aala-ala sa kanyang ama; siya'y isang binata, na sapagkat hindi malalao't 
magkakaasawa, nag-iisip isip siya ng sa panahong darating, ng isang magandang 
kasasapitan ng kanyang mga anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y siya'y isang taong 
magtatamong ligaya; ang katuwiran nating ipinagtatanggol ay hindi ang sa mga 
taong na sa kaligayahan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't iyan ang 
katuwirang ipinagtatanggol ng mga taong may puso!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hari na nga!--ang muling sinabi ng 
matandang lalaki at saka naupo,--ipalagay mo ng ang binatang iya'y sumang-ayong siya ang maghatid 
ng ating karaingan hangang sa Kapitan General; ipalagay mo ng siya'y 
makakita sa pangulong bayan ng Espa&ntilde;a ng mga diputadong magsanggalang sa 
atin, inaakala mo na baga kayang papagtatagumpayin na ang ating katuwiran?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Atin munang tikmang gawin bago tayo 
gumamit ng isang paraang kinakailangang magsabog ng dugo,--ang isinagot ni 
Elias,--Dapat na makapagtaka po sa inyo, na ako, na isa rin namang sawing palad, 
bata at malakas ang katawan, ang siyang makiusap sa inyo, na kayo'y matanda na't 
mahina, ng mga paraang payapa: at ganito, sa papka't aking napanood ang 
lubhang maraming kahirapang tayo rin ang may kagagawang gaya rin ng mga 
kagagawan ng mga malulupit; ang mahina ang siyang nagbabayad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At kung sakaling wala tayong magawang 
ano man?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--May magagawa tayo 
kahi't kakaunti, maniwala po kayo; hindi ang lahat ng mga nangangatungkulan sa 
baya'y hindi marunong kumilala ng katuwiran. At kung wala tayong masundaan, kung 
aayaw pakinggan ang ating kahingian, kung magpakabingi na ang tao sa kapighatian 
ng kanyang kapwa, pagnagkagayo'y hahandog po ako sa bawa't inyong ipag-uutos!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Niyakap ang binata ng matandang lalaking 
lipos ng malaking katuwiran.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tinatanggap ko ang 
iyong panukala, talastas kong gumaganap ka ng iyong pangako. Padrerito ka sa 
aki't kata'y tutulungan upang maipanghiganti ang iyong mga magugulang, at ako 
nama'y tutulungan mo upang maipanghiganti ko ang aking mga anak, ang aking mga 
anak na pawang nakakatulad mo!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Samantala'y huwag po ninyong pababayaang 
mangyari ang ano mang gahasang kagagawan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isasalaysay mo ang mga karaingan ng 
bayang pawang talastas mo na, Kailan ko malalaman ang kasagutan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa loob po ng apat na araw ay mag-utos 
po kayo ng isang taong makipagkita sa akin sa pasigan ng San Diego, at 
sasabihin ko sa kanya ang maging kasagutan sa akin ng taong aking 
inaasahang.... Kung siya'y sumang-ayo'y kanilang kikilalanin ang ating 
katuwiran, at kung hindi'y ako ang unaunang matitimbuang sa pakikilabang ating 
gagawin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi mamamatay si Elias, si Elias ang 
mamiminuno kung matimbuang si kapitang Pablong busog na ang puso sa kanyang 
panghihiganti,--anang matandang lalaki.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At siya rin ang sumama sa binata hanggang 
sa makalabas sa labas.</font></p>
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