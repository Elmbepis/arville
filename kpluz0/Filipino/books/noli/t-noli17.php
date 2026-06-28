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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XVII. Si Basilio</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bahagya pa lamang nakapapasok si Basiliong 
gigiraygiray, nagpatinghulog sa mga bisig ng kanyang ina.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Isang di masabing panglalamig ang siyang 
bumalot kay Sisa ng makita niyang nag-iisang dumating si Basilio. Nagbantang 
magsalita ay hindi lumabas ang kanyang boses; inibig niyang yakapin ang kanyang 
anak ay nawal-an siya ng lakas; hindi naman mangyaring umiyak siya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't ng makita niya ang dugong 
pumapaligo sa noo ng bata'y siya'y nakasigaw niyang tinig na wari'y 
nagpapakilala ng pagkalagot ng isang bagting ng puso.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--mga anak ko!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag po kayong mag-ala ala ng ano man, 
nanay!--ang isinagot ni Basilio;--natira po sa kumbento po si Crispin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa kumbento? natira sa kumbento? 
Buhay?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Itiningala ng bata sa kanyang ina ang 
kanyang mga mata.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah!--ang isinigaw, na ano pa't ang 
lubhang malaking pighati'y naging lubhang malaking katuwaan. Si Sisa'y umiyak, 
niyakap ang kanyang anak at pinuspos ng halik ang may dugong noo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Buhay si Crispin! Iniwan mo siya sa 
kumbento ... at bakit may sugat 
ka, anak ko? Nahulog ka ba?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At siniyasat siya ng&nbsp; buong&nbsp; pag-iingat.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ng dalhin po si Crispin ng sakristan 
mayor ay sinabi sa aking hindi raw ako makaaalis kung di sa ikasampung horas, at 
sapagkat malalim na ang gabi, ako'y nagtanan. Sa baya'y sinigawan ako ng mga 
sundalo ng 'Quien vive,' nagtatakbo ako, bumaril sila at nahilahisan 
ng isang 
bala ang aking noo. Natatakot akong mahuli at papagpupunasin ako ng kuartel, na 
aboy ng palo, na gaya ng ginawa kay Pablo, na hangga ngayo'y may 
sakit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Diyos ko! Diyos ko!--ang 
ibinulong ng inang kinikilig--Siya'y iyong iniligtas!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At saka idinugtong, samantalang, humahanap 
ng panaling damit, tubig, suka, at balahibong maliliit ng tagak:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang dali pa at napatay ka sana nila, 
pinatay sana nila ang aking anak! Hindi ginugunita ng mga guwardiya sibil ang 
mga ina!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang sasabihin ninyo'y nahulog ako sa 
isang kahoy; huwag po sanang maalaman nino mang ako'y pinaghagad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit ba natira si Crispin?--ang 
itinanong ni Sisa pagkatapos magawa ang paggamot sa anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Minasdan ni Basiliong isang sandali ang 
kanyang ina, niyakap niya ito at saka, untiunting sinaysay ang ukol sa dalawang 
onza, gayon ma'y hindi niya sinabi ang mga pagpapahirap na ginagawa sa kanyang kapatid.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinapaghalo ng mag-ina ang kanilang mga 
luha.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang mabait kong si Crispin! 
pagbintangan ang mabait kong si Crispin! Dahilang tayo'y dukha, at ang mga 
dukhang gaya natin ay dapat magtiis ng lahat!--ang ibinulong ni Sisa, na 
tinitingnan ng mga matang puno ng luha ang tinghoy na nauubusan ng langis.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nanatiling malaonlaon ding hindi sila 
nag-imikan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naghapunan ka na ba?--Hindi? May kanin 
at may tuyong lawlaw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Wala akong 'ganang' kumain; tubig, tubig 
lamang ang ibig ko.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Oo!--ang isinagot 
ng ina ng&nbsp; buong&nbsp; lungkot;--nalalaman ko ng hindi mo ibig ang tuyong 
lawlaw; hinandaan kata ng ibang bagay; nguni't naparito ang iyong tatay, 
kaawaawang anak ko!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naparito ang tatay?--ang itinanong ni 
Basilio, at hindi kinukusa'y siniyasat ang mukha at ang mga kamay ng kanyang 
ina. Nakapagsikip sa puso ni Sisa ang tanong ng kanyang anak, na pagdaka'y 
kanyang napag-abot ang kadahilanan, kaya't nagdumaling idinugtong:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Naparito at ipinagtanong kayo ng mainam, 
ibig niyang kayo'y makita; siya'y gutom na gutom. Sinabing kung kayo raw ay 
nananatili sa pagpapakabait ay muli siyang makikisama sa atin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah!--ang isinalabat ni Basilio, at sa 
sama, ng kanyang loob ay iningiwi ang kanyang mga labi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Anak ko!--ang ipinagwika ni Sisa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ipatawad po ninyo, nanay!--ang muling 
isinagot na matigas ang anyo--Hindi ba kaya lalong magaling na tayong tatlo na lamang, kayo, 
si Crispin at ako?--nguni't kayo po'y umiiyak; ipalagay ninyong wala akong 
sinabing ano man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagbuntong-hininga si Sisa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sinarhan ni Sisa ang dampa at tinabunan 
ng abo ang kaunting baga sa kalan at ng huwag mapugnaw, tulad sa ginagawa ng 
tao sa mga damdamin ng kaluluwa; takpan ang mga damdaming iyan ng abo ng 
buhay na tinatawag na pag-wawalang-bahala, at ng huwag mapugnaw sa 
pakikipanayam sa araw-araw sa ating mga kapwa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ibinulong ni Basilio ang kanyang mga 
dasal, at nahiga sa tabi ng kanyang ina na nananalangin ng paluhod.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakakaramdam ng init at lamig; 
pinagpilitang pumikit at ang iniisip niya'y ang kanyang kapatid na bunso, na 
nag-aakalang tumulog sana ng gabing iyon sa sinapupunan ng kanyang ina, at 
ngayo'y marahil umiiyak at nangangatal ng takot sa isang sulok ng kumbento. 
Umaalingawngaw sa kanyang mga tainga ang mga sigaw na iyon, tulad sa 
pagkarinig niya ng siya'y doroon pa sa kampanario; datapuwa't pinasimulaang 
pinalabo ang kanyang isip ng pagod na naturaleza at nanaog sa kanyang mga mata 
ang 'espiritu', ng panagimpan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakita niya ang isang kuartong tulugan, at 
doo'y may dalawang kandilang may ningas. Pinakikinggan ng kurang madilim ang 
pagmumukha at may hawak na yantok ang sinasabi sa ibang wika ng sakristan 
mayor, na kakilakilabot ang mga kilos. Nangangatal si Crispin, at 
palingaplingap ang matang tumatangis sa magkabikabila, na parang may 
hinahanap na tao, o isang taguan. Hinarap siya ng kura at tinatanong siyang 
malaki ang galit at humaginit ang yantok. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang bata'y tumakbo at nagtago sa 
likuran ng sakristan; nguni't siya'y tinangnan nito at inihanda ang kanyang 
katawan sa sumusubong galit ng kura; ang kaawaawang bata'y nagpupumiglas, 
nagsisikad, sumisigaw, nagpapatinghiga, gumugulong, tumitindig, tumatakas, 
nadudulas, nasusubasob at sinasangga ng mga kamay ang mga hampas na sapagkat nasusugatan ay biglang itinatago at umaatungal. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nakikita ni Basiliong 
namimilipit si Crispin, inihahampas ang ulo sa tablang yapakan; nakikita niya at 
kanyang naririnig na humahaginit ang yantok! Sa laking pagngangalit ng 
kanyang bunsong kapatid ay nagtindig; sira ang isip sa di maulatang pagkakahirap 
ay dinaluhong ang kanyang mga verdugo, at kinagat ang kura sa kamay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sumigaw 
ang kura't binitiwan ang yantok; humawak ang sakristan mayor ng isang baston at 
pinalo sa ulo si Crispin, natimbuang ang bata sa pagkatulig; ng makita ng kurang siya'y may sugat ay pinagtatadyakan si Crispin; nguni't ito'y hindi na 
nagsasanggalang, hindi na sumisigaw: gumugulong sa tablang parang 
isang bagay na hindi nakakaramdam at nag-iiwan ng bakas na basa ...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang boses ni Sisa ang siyang sa kanya'y 
gumising.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang nangyayari sa iyo? Bakit ka 
umiiyak?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nanag-inip ako!... Diyos!--ang 
mariing sabi ni Basilio at humilig na basa ng pawis. Panag-inip iyon; sabihin po 
ninyong panag-inip lamang, nanay, iyon; panag-inip lamang!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang napang-inip mo?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi sumagot ang bata. Naupo upang 
magpahid ng luha at ng pawis. Madilim sa loob ng dampa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang panag-inip! isang panag-inip!--ang 
inuulit-ulit ni Basilio sa marahang pananalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sabihin mo sa akin kung ano ang iyong 
pinanag-inip; hindi ako makatulog!--ang sinabi ng ina ng muling mahiga ang kanyang anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang napanag-inip 
ko, nanay,--ani Basilio ng marahan--kami raw ay namumulot ng uhay sa isang 
tubigang totoong maraming bulaklak, ang mga babae'y may mga dalang bakol na puno 
ng mga uhay ... ang mga lalaki'y may mga dala ring bakol na puno ng uhay ... at 
ang mga batang lalaki'y gayon din ... Hindi ko na natatandaan, nanay; hindi ko 
na natatandaan, nanay, ang mga iba!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi na nagpilit ng pagtatanong si Sisa; 
hindi niya pinapansin ang mga panag-inip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nanay, may naisip ako ngayong gabing 
ito,--ani Basilio pagkaraan ng ilang sandaling hindi pag-imik.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang naisip mo?--ang itinanong niya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Palibhasa'y mapagpakababa si Sisa sa lahat 
ng bagay, siya'y nagpapakababa pati sa kanyang mga anak; sa akala niya mabuti 
pa ang kanilang pag-iisip kay sa kanya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Hindi ko na ibig na 
magsakristan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pakinggan po ninyo, nanay, ang aking 
naisip. Dumating po ritong galing sa Espa&ntilde;a ang anak na lalaki ng nasirang si 
Don Rafael, na inaakala kong kasingbait din ng kanyang ama. Ang mabuti po, 
nanay, kunin na ninyo bukas si Crispin, singilin ninyo ang aking sueldo at 
sabihin ninyong hindi na ako magsasakristan. Paggaling ko'y pagdaka'y 
makikipagkita ako kay Don Crisostomo, at ipakikiusap ko sa kanyang ako'y 
tanggaping tagapagpastol ng mga vaka o ng mga kalabaw; malaki na naman ako. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Makapag-aaral si Crispin sa bahay ni matandang Tasio, na hindi namamalo at 
mabait, kahit ayaw maniwala ang kura. Maaari pa bang tayo'y mapapaghirap 
pa ng higit sa kalagayan natin? Maniwala, po kayo, nanay, mabait ang matanda; 
makailang nakita ko siya sa simbahan, pagka sino ma'y wala roon; naluluhod at 
nananalangin, maniwala po kayo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nalalaman na po ninyo, nanay, hindi na ako 
magsasakristan: bahagya na ang pinakikinabang at ang pinakikinabang pa'y naoowi 
lamang sa kinamumulta! Gayon din ang idinaraing ng lahat. Magpapastol ako, at 
kung aking alagaang magaling ang ipagkakatiwala sa akin, ako'y kalulugdan ng 
may-ari; at marahil ay ipabayang ating gatasan ang isang vaka, at ng makainom 
tayo ng gatas; ibig na ibig ni Crispin ang gatas. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Sino ang nakakaalam! marahil 
bigyan pa po kayo ng isang maliit na 'guya,' kung makita nila ang magaling kong 
pagtupad; aalagaan natin ang guya at ating patatabaing gaya ng ating inahing 
manok. Mangunguha ako ng mga bungang kahoy sa gubat, at ipagbibili ko sa 
bayang kasama ng mga gulay sa ating halamanan, at sa ganito'y magkakasalapi 
tayo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Maglalagay ako ng mga silo at ng mga balatik at ng makahuli ng mga 
ibon at mga alamid, mangingisda ako sa ilog at pagka ako'y malaki na'y 
mangangaso naman ako. Makapangangahoy naman ako upang maipagbili o maialay 
sa may-ari ng mga vaka, at sa ganya'y matotowa sa atin. Pagka makapag-aararo 
na ako'y aking ipakikiusap na ako'y pagkatiwalaan ng kapirasong lupa at ng aking matamnan ng tubo 
o mais, at ng hindi po kayo manahi hanggang hating 
gabi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Magkakaroon tayo ng damit na bagong ukol sa bawa't piyesta, kakain tayo 
ng karne at malalaking isda. Samantala'y mamumuhay akong may kalayaan, 
magkikita tayo sa araw-araw at magsasalosalo tayo sa pagkain. At yamang sinasabi 
ni matandang Tasiong matalas daw totoo ang ulo ni Crispin, ipadala natin siya sa 
Maynila at ng mag-aral; siya'y paggugugulan ng bunga ng aking pawis; hindi 
ba, nanay?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano ang aking wiwikain kung di oo?--ang 
isinagot ni Sisa niyakap ang kanyang anak.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nahiwatigan ni Sisang hindi na ibinibilang 
ng anak sa hinaharap na panahon, ang kanyang ama, at ito ang nagpatulo ng mga 
luha niya sa pagtangis na di umiimik.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpatuloy si Basilio ng pagsasaysay ng 
kanyang mga binabanta sa hinaharap na panahon, taglay iyang ganap na pag-asa ng 
kabataang walang nakikita kung di ang hinahangad. Walang sinasabi si Sisa kung di 
'oo' sa lahat, sa kanyang akala'y ang lahat ay magaling. Untiunting 
nanaog ang pagkahimbing sa pagal na mga bubong ng mata ng bata, at ngayo'y 
binuksan ng Ole-Lukoie, na sinasabi ni Anderson, at isinukob sa ibabaw niya ang 
magandang payong na puspos ng masasayang pintura.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang akala niya'y siya'y 
pastol ng kasama ng kanyang bunsong kapatid; nangunguha sila ng bayabas, 
ng alpay at ng iba pang mga paroparo sa kaliksihan; pumapasok sila sa mga 
yungib at nakikita nilang numiningning ang mga pader; naliligo sila sa mga 
bukal, at ang mga buhangin ay alabok na ginto at ang mga bato'y tulad sa 
mga bato ng korona ng Birhen. Sila'y inaawitan ng mga maliliit na isda at 
nangagtatawanan; iniyuyukayok sa kanila ng mga kahoy ang kanilang mga 
sangang humihitik sa mga salapi at sa mga bunga. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Nakita niya ng matapos ang 
isang kampanang nakabitin sa isang kahoy, at isang mahabang lubid upang 
tugtugin: sa lubid ay may nakataling isang vaka, na may isang pugad sa gitna 
ng dalawang sungay, at si Crispin ay nasa loob ng kampana at iba pa. At 
nagpatuloy sa gayong pananaginip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" style="font-size: 13pt" color="#333333">Nguni't ang inang hindi gaya niyang 
musmos at hindi nagtatakbo sa loob ng isang oras ay hindi tumutulog.</font></p>
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