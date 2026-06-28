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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg', /*url*/'../images/backb.jpg')">

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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXIV. Sa Gubat</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Maaga, maagang maaga ng magmisa si 
											Padre Salvi, at sa ilang sandali'y 
											kanyang nilinis ang may 
											labingdalawang kalolowang marurumi, 
											at ang ganitong gawa'y hindi niya 
											nauugalian.<br>
											<br>
											Tila mandin nawal-an ng ganang 
											kumain ang karapatdapat na kura, 
											dahil sa pagkabasa ng ilang sulat na 
											dumating na may mga 'sello' at 
											mabuti ang pagkakalagay ng 'lakre;' 
											sapagkat pinabayaang lubos na 
											lumamig ang 'tsokolate.'<br>
											<br>
											May sakit ang pari,--ang sinasabi ng 
											'kokinero,' samantalang naghahanda 
											ng ibang 'taza' ng tsokolate;--mahaba 
											ng araw na hindi kumakain, sa anim 
											na pinggang inihahayin ko sa kanya 
											sa 'mesa,' walang dalawang pinggan 
											ang kanyang sinasalang.<br>
											<br>
											--Dahil sa hindi siya nakakatulog ng 
											mahusay,--ang sagot ng alilang lalaki;--siya'y 
											binabangungot mula ng magbago ng 
											tinutulugan. Nalalao'y lalong 
											nanglalalim ang kanyang mga mata, at 
											totoong naninilaw.<br>
											<br>
											Tunay nga namang nakahahabag tingnan 
											si Padre Salvi. Hindi man lamang 
											sinalang ang pangalawang taza ng 
											tsokolate, hindi tinikman man lamang 
											ang mga hojaldeng Cebu; nagpaparoo't 
											parito sa maluang na salas at 
											kinukuyumos ng kanyang mabut-ong mga 
											kamay ang isang sulat na 
											manakanakang binabasa. Hiningi, sa 
											kawakasan, ang kanyang 'kotse', nag-ayos 
											at saka nag-utos na siya'y ihatid sa 
											gubat na kinalalagyan ng 
											nakapamamanglaw na kahoy at sa 
											malapit doo'y nangagkakatuwa ng 
											paglalakbay sa kaparangan.<br>
											<br>
											Pinaalis ni Padre Salvi ang 'kotse', 
											pagdating sa lugar na iyon, at 
											pumasok siyang nag-iisa sa gubat.<br>
											<br>
											Isang mapanglaw na landas na bahagya 
											na nabuksan sa kasukalan ang 
											pinagdaraanang patungo sa isang 
											batis, na ang tubig na umaagos doo'y 
											galing sa ilang bukal ng malakukong 
											tubig, tulad sa mga na sa tagiliran 
											ng Makiling. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Mga bulaklak na kusang 
											sumisibol na ang marami sa kanila'y 
											hindi pa napapangalanan, ang siyang 
											pamuti ng mga pangpang ng batis na 
											iyon; nguni't marahil ay kilala na 
											ng mga doradong maliliit na hayop, 
											ng mga paroparong sari-sari ang 
											lalaki, at may mga kulay na asul at 
											ginto, mapuputi at maiitim, sal-it 
											sal-it na kulay maniningning, 
											makikintab, may mga taglay na mga 
											rubi at mga esmeralda sa kanilang 
											mga pakpak, at ng mga libolibong mga 
											tutubing kumikinang ng tulad sa 
											metal, at wari nasasabugan ng 
											totoong mataas na ginto. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Ang tunog 
											ng pagaspas ng mga maliliit na mga 
											hayop na ito, ang irit ng yayay na 
											nag-iingay sa araw at gabi, ang huni 
											ng ibon, o ang lagapak ng bulok na 
											sanga ng kahoy na nahuhulog at 
											nagkakasabitsabit sa lahat ng lugar 
											ang siyang tanging sumisira ng 
											katahimikan ng talinghagang lugar na 
											iyon.<br>
											<br>
											Malaonlaon din siyang 
											nagpalakadlakad sa kasukalan ng mga 
											gumagapang na damo, na kanyang 
											pinangingilagan ang mga dawag na 
											kumakapit sa kanyang habitong gingon 
											na tila mandin ibig siyang pigilin, 
											at pinatitisodtisod maya't maya ang 
											mga para ninyong di bihasang 
											maglakad ng mga ugat ng mga kahoy na 
											lumalabas sa lupa. Bigla siyang 
											tumigil: masasayang mga halakhakan 
											at mga sariwang boses ang dumating 
											sa kanyang mga tainga, at 
											nanggagaling ang mga boses at ang 
											mga halakhakan sa batis, at 
											nalalao'y lalong nalalapit.<br>
											<br>
											--Titingnan ko kung ako'y 
											makakasumpong ng isang pugad,--ang 
											sinasabi ng isang maganda at 
											matimyas na boses na nakikilala ng 
											kura;--ibig ko siya makita na hindi 'niya' 
											ako nakikita, ibig ko siyang sundan 
											sa lahat ng dako.<br>
											<br>
											Nagtago si Padre Salvi sa likod ng 
											malaking puno ng isang kahoy at saka 
											nakinig.<br>
											<br>
											--Sa makatuwid ay ibig mong gawin sa 
											kanya ang sa iyo'y ginagawa ng kura, 
											na binabantayan ka saan ka man 
											pumaroon?--ang itinugon ng isang 
											masayang boses.--Mag-ingat ka, 
											sapagkat nakayayayat at 
											nakapagpapalalim ng mga mata ang 
											panibugho!<br>
											<br>
											--Hindi, hindi panibugho; kung di 
											pagkaibig lamang na makaalam ng di 
											ko talos!--ang isinasagot ng 
											mataginting na boses, samantalang, 
											inuulit ng masaya:<br>
											<br>
											--Siya nga, panibugho, panibugho!--at 
											humahalakhak ng tawa.<br>
											<br>
											--Kung ako'y naninibugho, hindi ako 
											ang hindi pakikita; ang hindi ko 
											ipakikita'y siya, ng hindi siya 
											mamasdan nino man.<br>
											<br>
											--nguni't ikaw may hindi mo siya 
											makikita, at iya'y hindi magaling. 
											Ang lalong magaling, kung 
											makakasumpong tayo ng pugad, ay 
											ating 'iregalo' sa kura, at sa 
											gayo'y kanyang mababantayan tayo, na 
											hindi magkakailangang siya'y makita, 
											anong akala mo?<br>
											<br>
											--Hindi ako naniniwala sa mga pugad 
											ng mga tagak--ang sagot ng isang 
											boses; nguni't kailan ma't ako'y 
											manibugho matututo akong magbantay 
											na hindi ako makikita.<br>
											<br>
											--At paano? at paano? Bakit, gaya ba 
											ng isang Sor Eskukha?<br>
											<br>
											Nakapagpahakhak ng masaya ang gayong 
											alaala sa pagkakolegiala.<br>
											<br>
											--Nalalaman mo na kung paano ang 
											pagdaya kay Sor Eskukha!<br>
											<br>
											Nakita ni Padre Salvi, mula sa 
											kanyang pinagtataguan si Maria 
											Clara, si Viktoria si Sinang na 
											naglilibot sa ilog. Lumalakad ang 
											tatlong ang tingin ay sa salamin ng 
											tubig at nangaghahanap ng 
											talinghagang pugad ng tagak: Basa 
											sila hangang sa tuhod, na ano pa't 
											nahihiwatigan sa mga malalapad na 
											kunot ng kanilang mga sayang 
											pangpaligo ang kalugodlugod na hubog 
											ng kanilang mga binti. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Nakalugay ang 
											kanilang buhok at hubad ang kanilang 
											mga bisig, at natatakpan ang katawan 
											ng isang barong may malalapad na 
											guhit at masasayang mga kulay. 
											Samantalang naghahanap sila ng isang 
											bagay na hindi mangyayaring 
											masumpungan ay namumuti tuloy sila 
											ng mga bulaklak at nangunguha ng mga 
											gulay sa pampang.<br>
											<br>
											Pinanonood ng prayleng Akteon na 
											namumutla at hindi kumikilos ang 
											mahinhing Dianang iyon; ang mga mata 
											niyang numiningning sa madilim na 
											hungkag na kinalalagyan ay hindi 
											nangapapagal ng pagtataka sa mga 
											mapuputi at parang linalik na mga 
											bisig, yaong magandang liig hanggang 
											pa pasimula ng dibdib; ang maliliit 
											at kulay rosang mga paang 
											nangaglalaro sa tubig, pawang 
											pumupukaw sa abang katauhan niya ng 
											kakaibang mga damdamin at 
											nagpapapanaginip ng mga bagong 
											kaisipan sa nilalagnat niyang budhi.<br>
											<br>
											Sa likod ng isang pag-liko sa ilat, 
											sa gitna ng masukal na kawayanan; 
											nangawala ang mga matitimyas na mga 
											dalagang iyon, at hindi na maringig 
											ang kanilang malulupit na mga 
											parunggit. Haling, nanglulupaypay, 
											pigta ng pawis umalis si Padre Salvi 
											sa kanyang pinagtataguan, at 
											nagpalingaplingap sa kanyang 
											paligidligid, na ang mga mata'y 
											hibang. Humintong hindi kumikilos, 
											nagaalinlangan; humakbang ng ilan at 
											anaki'y ibig sumunod sa mga dalaga, 
											nguni't nagbalik at naglakad sa 
											pampang at ang ibang mga kasama ng 
											mga dalagang iyon ang siyang hinanap.<br>
											<br>
											Nakita niya sa malayo-layo roon, sa 
											gitna ng batis, ang isang wari'y 
											paliguang magaling ang pagkakabakod, 
											at ang pinakabubong ay isang 
											malagong kawayan; may nanggagaling 
											doong masasayang mga boses ng babae. 
											Napapamutihan ang paliguang iyon ng 
											dahon ng mga niyog, mga bulaklak at 
											mga bandera. Nakatanaw naman siya sa 
											dako pa roon ng isang tulay na 
											kawayan at sa dakong malayo'y mga 
											lalaking nangaliligo, samantalang 
											nangagkakagulo ang karamihang mga 
											alilang lalaki at mga alilang babae 
											sa palibot ng mga kalang biglaan ang 
											pagkakagawa at nangagsusumakit ng 
											paghihimulmol sa mga inahing manok, 
											nangaghuhugas ng bigas, nag-iihaw ng 
											'lechon' at iba pa. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											At doon sa 
											kabilang ibayo, sa isang kalinisang 
											kanilang hinawan, sa loob ng lilim 
											ng isang palapalang kanilang bagong 
											itinayong ang mga haligi'y kahoy at 
											ang bubong ay 'lona' na' ang isang 
											bahagi at ang isang bahagi'y mga 
											dahon ng malalaking kahoy, 
											nangagkakatipon ang maraming mga 
											lalaki't mga babae. Doo'y naroroon 
											ang alperes, ang koadjutor, ang 
											gobernadorcillo, ang teniente mayor, 
											ang maestro sa eskuela at ang 
											maraming mga kapitan at tenienteng 'pasado', 
											pati ni kapitang Basiliong ama ni 
											Sinang, na dating kaaway ng nasirang 
											si Don Rafael sa malaon ng 
											pinag-uusapan. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Sa kanya'y sinabi ni 
											Ibarra: 'Pinag-uusapan natin ang 
											isang katuwiran, at hindi mag-kaaway 
											ang kahulugan ng pag-uusapin. At 
											napahinuhod ng buong galak ng loob 
											ang balitang mananalumpati ng mga 'konservador' 
											sa anyaya ni Ibarra, at tuloy 
											nagpadala ng tatlong payo at saka 
											ipinanalim sa kapangyarihan ng 
											binata ang paglilingkod ng kanyang 
											mga alila.<br>
											<br>
											Sinalubong ang kura ng buong galak 
											at pagpipitagan ng lahat, pati ng 
											alperes.<br>
											<br>
											--nguni't saan po nanggaling ang 
											kagalanggalang na kamahalan po ninyo?--ang 
											itinanong sa kanya ng alperes, ng 
											makita nito ang kanyang mukhang puno 
											ng galos, at ang kanyang habito'y 
											puspos ng mga dahon at ng mga tuyong 
											sanga--Naparapa po ba ang 
											kagalanggalang na kamahalan ninyo?<br>
											<br>
											--Hindi! naligaw ako!--ang isinagot ni 
											Padre Salvi, at ibinaba ang kanyang 
											mga mata upang siyasatin ang kanyang 
											pananamit.<br>
											<br>
											Nangagbubukas ng mga botelya ng 
											limonada, nangagbibiyak ng mga niyog 
											na mura at ng ang mga natatapos ng 
											paliligo'y makainom ng kanyang 
											malamig na tubig at ng makakain ng 
											kanyang malambot na lamang higit ang 
											kaputian sa gatas; at bukod sa roo'y 
											pinag-aalayan pa ang mga dalaga ng 
											isang kuintas na sampaga, na 
											nasasal-itan ng mga rosa at 
											ilang-ilang, na siyang nagbibigay 
											bango sa nakalugay na buhok. Sila'y 
											nauupo o humihilig sa mga duyang 
											nakabitin sa mga sanga ng mga kahoy, 
											o nangaglilibang sa paglalaro sa 
											paligid ng isang batong malapad, na 
											may nakalagay sa ibabaw nitong mga 
											baraja, mga tablero, maliliit na mga 
											libro, mga sigay at mga batong 
											maliliit.<br>
											<br>
											Ipinakita nila sa kura ang buwaya, 
											datapuwa't tila mandin nalilibang 
											ang isip sa ibang bagay, at kaya 
											lamang pinansin ang sinalita sa 
											kanya'y ng sa kanya'y sabihing si 
											Ibarra ang may gawa ng gayong 
											kalaking sugat. nguni't hindi 
											mangyaring makita ang bantog at 
											hindi napagkikilalang piloto; bago 
											dumating ang alperes ay siya'y wala 
											na.<br>
											<br>
											Sa kawakasa'y lumabas si Maria Clara 
											sa paliguan, kasama ang kanyang mga 
											kaibigang babae, sariwang tulad sa 
											isang rosa sa unang umagang 
											pamumukadkad na numiningning ang 
											hamog na ang kawangis ay kislap ng 
											diamante sa kaayaayang ulbos ng 
											bulaklak. Inihandog niya ang unang 
											ngiti kay Crisostomo, at naukol ang 
											unang pagdidilim ng kanyang noo kay 
											Padre Salvi. Nahiwatigan nito, 
											nguni't hindi nagbuntunghininga.<br>
											<br>
											Dumating ang oras ng pagkain. 
											Nangagsiupo sa mesang 
											pinangunguluhan ni Ibarra, ang kura, 
											ang koadjator, ang alperes, ang 
											gobernadorcillo at ilan pang mga 
											kapitan, sampu ng teniente mayor. 
											Hindi ipinahintulot ng mga inang 
											kumain ang sinomang lalaki sa mesa 
											ng mga dalaga.<br>
											<br>
											--Hindi ka na ngayon, Albino, makapag 
											panukala ng mga butas, pa na gaya ng 
											sa mga bangka,--ani Leon sa 
											nagseminarista.<br>
											<br>
											--Ano? ano iyon?--ang tanungan ng mga 
											matatandang babae.<br>
											<br>
											--Na ang mga bangka, mga ginoong 
											babae, ay pawang mga buong-buo na 
											tulad sa pinggang ito;--ang 
											ipinaliwanag ni Leon.<br>
											<br>
											--Jesus, saramullo!--ang sigaw ni tia 
											Isabel na ngumingiti.<br>
											<br>
											May nababatid na po ba kayong ano 
											man, ginoong alperes, tungkol sa 
											tampalasang nagpahirap sa katawan ni 
											Padre Damaso?--ang tanong sa alperes 
											ni Padre Salvi, sa horas na iyon ng 
											pagkain.<br>
											<br>
											--Sino po bang tampalasan iyon, padre 
											kura?--ang tanong ng alperes, na 
											tinitingnan ang prayle, na 
											ginagawang pinakasalamin sa mata ang 
											vaso ng alak na kanyang iniinom.<br>
											<br>
											--Aba, at sino pa po ba? Yaong 
											tampalasang kamakalawa ng hapon ay 
											bumuntal kay Padre Damaso sa daan!<br>
											<br>
											--Bumuntal kay Padre Damaso?--ang 
											tanungan ng ilang boses.<br>
											<br>
											Wari'y ngumiti ang koadjutor.<br>
											<br>
											--Tunay po, kaya't nararatay ngayon 
											si Padre Damaso! Sinasapantahang ang 
											gumawa ng gayo'y si Elias ding sa 
											inyo'y naglublob sa pusaw, ginoong 
											alperes.<br>
											<br>
											Namula sa hiya o sa alak ang 
											alperes.<br>
											<br>
											--Ang buong isip ko,--ang 
											ipinagpatuloy ni Padre Salvi, na ang 
											anyo'y wari nanglilibak;--ay 
											nalalaman po ninyo ang nangyayari. 
											Ang wika ko'y alperes ng Guwardiya 
											Sibil....<br>
											<br>
											Nagkagat-labi ang militar at 
											ibinulong ang isang haling na 
											pagtaliwakas.<br>
											<br>
											Sa ganito'y siyang pagsipot ng isang 
											babaeng namumutla, payat, abang aba 
											ang pananamit; sino may walang 
											nakakita ng kanyang pagdaing; 
											palibhasa'y lumalakad siyang walang 
											imik at napakawalang ingay ang 
											kanyang paglakad, na kung naging 
											gabi sana'y marahil ipalagay na 
											siya'y isang 'fantasma.'<br>
											<br>
											--Pakanin ninyo ang kahabaghabag na 
											babaeng iyan!--ang sabihan ng mga 
											matatanda:--uy, pumarito kayo!<br>
											<br>
											nguni't ipinagpatuloy ng babae ang 
											kanyang paglakad, at siya'y lumapit 
											sa mesang kinalalagyan ng kura; 
											ito'y lumingon, at nakilala siya at 
											nalaglag sa kanyang kamay ang 
											kukhillo.<br>
											<br>
											--Inyong pakanin ang babaeng ito!--ang 
											ipinag-utos ni Ibarra.<br>
											<br>
											--Madilim ang gabi at nangawawala 
											ang mga batang lalaki!--ang ibinubulong 
											ng magpapalimos na babae.<br>
											<br>
											nguni't ng makita ang alperes, na sa 
											kanya'y nagsasalita, nagitla ang 
											babae at nagtatakbo, at nawala sa 
											gitna ng kakahuyan.<br>
											<br>
											--Sino ang babaeng iyon?--ang 
											itinanong.<br>
											<br>
											--Isang kahabaghabag na babaeng 
											pinilit sirain ang isip sa kagugulat 
											at kapapahirap!--ang isinagot ni Don 
											Filipo;--may apat na araw nang iya'y 
											ganyan.<br>
											<br>
											--Iyan baga ang isang nagngangalang 
											Sisa?--ang tanong ni Ibarra ng buong 
											pagmamalasakit.<br>
											<br>
											--Ang babaeng iya'y dinakip ng inyo 
											pong mga sundalo,--ang ipinagpatuloy 
											ng sabing may kapaitan ng teniente 
											mayor;--siya'y inilibot sa buong 
											bayang batid, dahil sa hindi ko 
											maalamang mga bagay ng kanyang mga 
											anak na lalaki, na ... hindi 
											nangagkaroon ng kaliwanagan.<br>
											<br>
											--Bakit?--ang itinanong ng alperes na 
											humarap sa kura:--iyan po baga ang 
											ina ng inyong dalawang sakristan?<br>
											<br>
											Sumang-ayon ang kura sa pamamag-itan 
											ng pagtango.<br>
											<br>
											--Na nangawalang hindi man lamang 
											ginawa ang ano mang pagsisiyasat 
											tungkol sa kanila!--ang idinugtong ni 
											Don Filipo ng wari may poot, at 
											tinititigan ang gobernadorcillo na 
											ibinaba ang mga mata.<br>
											<br>
											--Hanapin ninyo ang babaeng iyan--ang 
											ipinag-utos ni Crisostomo sa mga 
											alilang lalaki:--Aking ipinangakong 
											pagpapagalan ko ang pag-uusisa kung 
											saan naroon ang kanyang mga anak na 
											lalaki.<br>
											<br>
											--Nangawala, ang wika ninyo?--ang 
											itinanong ng alperes.--Nangawala ang 
											inyong mga sakristan, padre kura?<br>
											<br>
											Inubos ininom ng kura ang vaso ng 
											alak na na sa kanyang harap, at saka 
											tumango, bilang sagot na oo.<br>
											<br>
											--Karambas, Padre kura!--anang 
											alperes 
											na kasabay ang tawang libak, at 
											natutuwa, dahil sa siya'y 
											nakakaganti,--pagka nawawala ang 
											ilang piso lamang ng kagalang-galang 
											na kamahalan po ninyo'y maagang 
											maaga pa'y inyong ginigising ang 
											aking sargento, upang hanapin ang 
											inyong salapi; nguni't nawawala ang 
											dalawang sakristan ninyo'y hindi po 
											kayo nagsasabi; at kayo po, ginoong 
											kapitan ... totoo ngang kayo po'y....<br>
											<br>
											At hindi tinapos ang kanyang salita 
											kung di ang ginawa'y nagtawa, 
											kasabay ng paglulubog ng kanyang 
											kukhara sa mapulang laman ng papaya.<br>
											<br>
											Sumagot ang kurang malaki ang hiya 
											at natutulig.<br>
											<br>
											--Nagkagayon ako't dahil sa ako ang 
											nananagot ng salapi....<br>
											<br>
											--Mabuting sagot, kagalanggalang na 
											pastol ng mga kaluluwa!--ang salabat 
											sa kanya ng alperes na namumualan ng 
											kinakain.--Mabuting sagot, banal na 
											lalaki!<br>
											<br>
											Nag-akalang mamagitna si Ibarra, 
											nguni't nagpilit si Padre Salving 
											manag-uli sa dating katahimikan ng 
											loob, at sumagot na kaakbay ang 
											ngiting pilit:<br>
											<br>
											--At nalalaman po ba ninyo, ginoong 
											alperes, kung ano ang sabihanan 
											tungkol sa pagkawala ng mga batang 
											iyan? Hindi? Kung gayo'y ipagtanong 
											po ninyo sa inyong mga sundalo!<br>
											<br>
											--At ano?--ang sigaw ng alperes na 
											nawala ang towa.<br>
											<br>
											--Ang sabihana'y ng gabing iyon 
											mawala ang mga bata'y may mga 
											tumunog na ilang putok ng fusil!<br>
											<br>
											--Ilang putok?--ang inulit ng 
											alperes 
											na kanyang minamasdan ang mga 
											kaharap.<br>
											<br>
											Nangagsitango ang nangaroroon, 
											bilang pagpapatunay na may naringig 
											nga sila.<br>
											<br>
											Nang magkagayo'y sumagot si Padre 
											Salvi ng madalang na pananalita, 
											taglay ang malupit na paglibak.<br>
											<br>
											--Sa nangyayari'y aking nakikitang 
											bukod sa hindi kayo nakakahuli ng 
											mga gumagawa ng masama'y hindi po 
											ninyo nalalaman ang mga ginagawa ng 
											inyong mga kapamahay, at gayon ma'y 
											ibig po ninyong masok na 
											tagapangaral at magturo sa mga iba 
											ng kanilang mga katungkulan: dapat 
											po ninyong maalaman ang kasabihang; 
											lalong nakakaalam ang ulol sa 
											kanyang sariling bahay....<br>
											<br>
											--mga ginoo!--ang isinalabat ni 
											Crisostomo ng kanyang makitang 
											namumutla na ang alperes;--tungkol 
											nga sa bagay na ito'y ibig kong 
											maalaman kung ano ang inyong pasiya 
											sa isang aking panukala. Inaakala 
											kong ipagkatiwala ang pag-aalaga sa 
											babaeng diyang sira ang isip sa 
											isang mabuting manggagamot at 
											samantala'y hahanapin ko ang kanyang 
											mga anak, sa pamamag-itan ng tulong 
											at mga hatol ninyong dalawa.<br>
											<br>
											Ang pagbabalik ng mga alilang 
											nangagsabing hindi nila nasumpungan 
											ang sira ang isip na babae ang 
											siyang nakalubos ng pagkapayapa sa 
											dalawang nagkakagalit, at kanilang 
											dinala ang salitaan sa ibang bagay.<br>
											<br>
											Nangagbahabahagi sa ilang pulutong 
											ang mga matanda't mga bata ng 
											matapos ang pagkain at samantalang 
											sila'y binibigyan ng kha at kafe. 
											Kumuha ang iba ng mga 'tablero' at 
											ang iba nama'y nangagsikuha ng 'baraja,' 
											nguni't lalong minagaling ng mga 
											dalaga ang mangatanong sa 'Rueda de 
											la Fortuna' (gulong ng kapalaran), 
											sa pagkaibig nilang maalaman ang sa 
											kanila'y mangyayari sa panahong 
											hinaharap.<br>
											<br>
											--Hali kayo, ginoong Ibarra.--ang 
											sigaw naman ni kapitang Basilio, na 
											lango na ng kaunti. May usapin 
											tayong labing limang taong taon na 
											ngayon ang itinatagal, at walang 
											hukom sa Audienciang sukat makahatol: 
											mangyayari bang tingnan natin kung 
											ating mabibigyang hangga sa 'tablero'?<br>
											<br>
											--ngayon din po, at sumasang-ayon 
											ako ng buong katowaan!--Hintayin po ninyo 
											akong saglit, sapagkat nagpapaalam 
											ang alperes!<br>
											<br>
											Nang maalaman nila ang gayong 
											paglalaro, nangagkapisan ang lahat 
											ng matatandang lalaking marunong ng 
											'ajedrez' sa paligid ng 'tablero'; 
											mahalaga ang larong iyon, kaya't 
											nakaakit pati sa mga hindi 
											nakakaalam. Hinarap ng mga 
											matatandang babae, gayon man, ang 
											kura, upang makipagsalitaan sa kanya 
											tungkol sa mga bagay na nauukol sa 
											religion; datapuwa't hindi marahil 
											minamagaling ni Padre Salvi ang lugar 
											na kinalalagyan at ang kapanahunang 
											iyon, kaya nga't pawang mga malalabo 
											ang kaniyang mga isinasagot at 
											mapapanglaw at may galit na halo, at 
											ang kanyang mga matang hindi 
											tumitingin man lamang sa kanyang mga 
											kinakausap ay nagpapalingaplingap sa 
											magkabikabila.<br>
											<br>
											Nagpasimula ang laro ng buong 
											kakadakilaan.<br>
											<br>
											--Kung magtabla ang laro, 
											papagtatablahin naman natin ang 
											ating usapin--ang sabi ni Ibarra.<br>
											<br>
											Nang na sa kalaghatian na ang laro, 
											tumanggap si Ibarra ng isang 
											telegrama na nagpaningning ng 
											kanyang mga mata at nakapagbigay sa 
											kanya ng pamumutla. Itinago niya sa 
											kanyang 'kartera' ang telegrama, na 
											hindi binuksan, at kanyang sinulyap 
											ang pulutong ng mga kabataang 
											nagpapatuloy ng pagtatanong kay 
											Kapalaran, sa gitna ng mga tawanan 
											at mga sigawan.<br>
											<br>
											--'Jaque' sa 'Hari!'--anang binata.<br>
											<br>
											Napilitang itago ni kapitang Basilio 
											ang 'Hari' sa likod ng 'Reina.'<br>
											<br>
											--'Jaque' sa 'Reina'!--ang muling 
											sinabi ni Ibarra, na pinagbabalaan 
											ng kanyang 'Torre' ang 'Reina,' na 
											ipinagsasanggalang ng isang 'Peon.'<br>
											<br>
											sapagkat hindi matakpan ni 
											kapitang Basilio ang 'Reina' at 
											hindi naman niya maiurong ito, dahil 
											sa 'Haring na sa sa likod, humingi 
											siya ng panahon upang siya'y 
											makapa-isip.<br>
											<br>
											--Sumasang-ayon po ako ng buong 
											tuwa!--ang 
											sagot ni Ibarra;--mayroon pa namang 
											sasabihin ako ngayon din sa ilang 
											lalaki sa pulutong na iyon.<br>
											<br>
											At nagtindig siya, pagkapagkaloob sa 
											kanyang kalaban ng ikaapat na bahagi 
											ng isang oras upang mag-isip.<br>
											<br>
											Tangan ni Iday ang mabilog na 
											kartong kinasusulatan ng apat na 
											po't walong tanong, at si Albino ang 
											may tangan ng libro ng mga sagot.<br>
											<br>
											--Kasinungalingan! hindi totoo! 
											kasinungalingan!--ang isinisigaw ni 
											Sinang na halos umiiyak.<br>
											<br>
											--Ano ba ang nangyayari sa iyo?--ang 
											sa kanya'y tanong ni Maria Clara.<br>
											<br>
											--Tingnan mo, aking itinanong: 'Kailan 
											baga ako magkakabait?' binitiwan ko 
											ang mga 'dado', at ang ginawa niyang 
											kurang iyang bantilaw ay binasa sa 
											libro ang ganito: 'Pagka nagkabuhok 
											ang palaka!' Ito ba'y mabuti?<br>
											<br>
											At saka nginiwian ni Sinang ang 
											naging seminarista, na hindi 
											tumitigil ng pagtatawa.<br>
											<br>
											nguni't Sino ba ang may utos sa 
											iyong magtanong ka ng gayon?--ang 
											sinabi sa kanya ng pinsan niyang si 
											Viktoria--Sukat na ang magtanong ng 
											gayon upang marapat sa gayong mga 
											sagot!<br>
											<br>
											--Tumanong po kayo!--ang sinabi nila 
											kay Ibarra, kasabay ng paghahandog 
											sa kanya ng 'rueda'--Pinagkayarian 
											naming kung sino ang magkamit ng 
											lalong magaling na sagot ay tatangap 
											sa mga iba ng isang handog. 
											Nakatanong na kaming lahat.<br>
											<br>
											--At Sino ang nagkamit ng lalong 
											magaling na sagot?<br>
											<br>
											--Si Maria Clara! si Maria Clara!--ang 
											isinagot ni Sinang.--Ibigin man 
											niya't hindi'y siya'y pinatanong 
											namin: 'Tapat baga't hindi 
											magmamaliw ang kanyang pagliyag?' at 
											ang libro'y sumagot....<br>
											<br>
											nguni't tinakpan ni Maria Clarang 
											namumulang mainam ang bibig ni 
											Sinang, at hindi itinulot na 
											maipatuloy ang sinasabi.<br>
											<br>
											--Kung gayo'y ibigay ninyo sa akin 
											ang 'rueda'!--ani Crisostomong 
											ngumingiti.<br>
											<br>
											Tumanong: 'Lalabas ba ng magaling 
											ang kasalukuyan konglinalayon?'<br>
											<br>
											--Napakapangit naman ng tanong na 
											iyan!--ang sigaw ni Sinang.<br>
											<br>
											Iniabsang ni Ibarra ang mga 'dado' 
											at alinsunod sa kanyang 'numero' ay 
											hinanap ang mukha at ang talata ng 
											na sa libro.<br>
											<br>
											--'Ang mga panaginip ay pawang mga 
											panaginip nga!'--ang binasa ni 
											Albino.<br>
											<br>
											Kinuha ni Ibarra ang telegrama at 
											nangangatal na binuksan.<br>
											<br>
											--ngayo'y nagsinungaling ang libro 
											ninyo!--ang isinigaw na puspos ng 
											tuwa.--Basahin ninyo:<br>
											<br>
											'Sinang-ayunan ang panukalang 
											eskuela, hinatulang kayo ang nanalo 
											sa usapin.'<br>
											<br>
											--Ano ang kahulugan nito?--ang 
											itinanong nila sa kanya.<br>
											<br>
											--Hindi ba ang sabi ninyo'y bibigyan 
											ng pabuya (regalo) ang magtamo ng 
											lalong mabuting sagot?--ang itinanong 
											niya, na nangangatal ang boses sa 
											laki ng kanyang tuwa, samantalang 
											hinahati ng buong ingat ang papel.<br>
											<br>
											--Siya nga! siya nga!<br>
											<br>
											--Kung gayo'y narito ang aking pabuya,--ang 
											sinabi, at ibinigay kay Maria Clara 
											ang kalahati;--magtatayo ako sa bayan 
											ng isang paaralang ukol sa mga 
											batang lalaki't babae; ang paaralang 
											ito'y siyang aking pabuya.<br>
											<br>
											--At anong kahulugan niyang kalahati 
											ng papel?<br>
											<br>
											--Ito'y ihahandog ko naman sa 
											nagkaroon ng lalong masama sa mga 
											sagot!<br>
											<br>
											--Kung gayo'y ako! sa akin marapat 
											ibigay!--ang sigaw ni Sinang.<br>
											<br>
											Ibinigay sa kanya ni Ibarra ang 
											papel at matuling lumayo.<br>
											<br>
											--At ano ang kahulugan nito?<br>
											<br>
											Datapowa't malayo na ang mapalad na 
											binata, at nagbalik na muli siya sa 
											pakikilaro ng 'ajedrez.'<br>
											<br>
											Lumapit si Fr. Salvi na wari'y nag-wawalang 
											ano man sa masayang lupon ng mga 
											kabataan. Pinapahid ni Maria Clara 
											ang isang luha sa katuwaan.<br>
											<br>
											Huminto ng magkagayon ang tawanan at 
											napipi ang salitaan. Tumitingin ang 
											kura sa mga bagongtao't dalaga, na 
											di niya matutuhan kung ano ang 
											sasabihin; hinihintay naman nilang 
											magsalita ang kura at hindi sila 
											umiimik.<br>
											<br>
											--Ano ito?--ang sa kawakasa'y 
											naitanong ng kura, at kinuha ang 
											libro at kanyang binubuklatbuklat.<br>
											<br>
											--Ang 'Rueda de la Fortuna',--isang 
											librong libangan, ang sagot ni Leon.<br>
											<br>
											--Hindi ba ninyo nalalamang kasalanan 
											ang maniwala sa mga bagay na ganito?--ang 
											winika, at saka pinunitpunit ng 
											buong galit ang mga dahon ng libro.<br>
											<br>
											Nagpumiglas sa mga labi ng lahat ang 
											mga sigaw ng pagtataka at sama ng 
											loob.<br>
											<br>
											--Lalong malaking kasalanan ang 
											gawin ang maibigan sa bagay na hindi 
											kanya't laban sa kalooban ng tunay 
											na may ari!--ang itinutol ni Albinong 
											nagtindig.--Amang kura, nakaw ang 
											tawag sa ganyang gawa at ito'y bawal 
											ng Diyos at ng mga tao.<br>
											<br>
											Pinapagdaop ni Maria Clara ang mga 
											kamay, at tinitigang tumatangis ang 
											mga wakas ng librong iyong hindi pa 
											nalalaong nag-alay sa kanya ng 
											lubhang malaking ligaya.<br>
											<br>
											Hindi sumagot kay Albino si Padre 
											Salvi, laban sa inaasahan ng mga 
											nanonood; natira siya sa panonood 
											kung paano ang linipadlipad ng mga 
											pinagpunitpunit na mga dahon ng 
											libro, na ang iba'y ipinawid ng 
											hangin sa gubat at ang iba nama'y sa 
											tubig; pagkatapos ay lumayong 
											gigiraygiray at nakapatong ang 
											dalawang kamay sa ulo. Humintong 
											sandali at nakipag-usap kay Ibarra 
											na naghatid sa kanya sa isa sa mga 
											kotseng nahahandang pangdala o 
											panghatid sa mga panauhin.<br>
											<br>
											--Mabuti at lumayas ang pang-aboy-galak 
											na iyan,--ang ibinulong ni 
											Sinang.!May pagmumukhang wari'y 
											sinasabing: 'Huwag kang tatawa't 
											nalalaman ko ang iyong mga kasalanan.'<br>
											<br>
											Sa malaking katuwaan ni Ibarra, sa 
											pagkapagbigay niya sa kanyang 
											magiging asawang si Maria Clara ng 
											kanyang pabuya, nagpasimula siya ng 
											paglalarong hindi na iniisip ang 
											ginagawa, at hindi na nag-aabala ng 
											pagbabalakbalak ng pagwawari ng 
											buong pag-iingat ng kalagayan ng mga 
											'pieza.'<br>
											<br>
											Dahil sa ganito'y ang nangyari, 
											bagaman si kapitang Basilio'y 
											bahagya ng nakapagsasangalang, ang 
											laro'y nagkapantay, salamat sa 
											maraming pagkakamaling sa huli'y 
											ginawa ng binata.<br>
											<br>
											Papagtablahin natin! papagtablahin 
											natin! ang sabi ni kapitang 
											Basiliong malaki ang tuwa.<br>
											<br>
											--Papagtablahin natin!--ang inulit ng 
											binata,--kahi't maging ano man ang 
											inihatol ng mga hukom sa ating 
											usapin.<br>
											<br>
											Nangagkamay ang dalawa na 
											nangagpisilan ng buong paggigiliwan.<br>
											<br>
											Samantalang ipinagkakatuwa ng mga 
											kaharap ang nangyaring ito na 
											nagbibigay wakas sa isang usaping 
											totoong nagpapahirap na sa dalawang 
											magkalaban, ang biglang pagdating ng 
											apat na guwardiya sibil at isang 
											sargento, na pawang sandatahan at 
											nakalagay sa dulo ng fusil ang 
											bayoneta, siyang sumira ng kasayahan 
											at nagdulot ng panghihilakbot sa 
											pulutong ng mga babae.-<br>
											<br>
											--Huwag kikilos ang sino man!--ang 
											sigaw ng sargento.--Papuputukan ang 
											kumilos!<br>
											<br>
											Hindi inalintana ni Ibarra ang 
											gayong pahayop na pagmamatapang, 
											tumindig siya at lumapit sa sargento.<br>
											<br>
											--Ano po ang inyong ibig?--ang 
											itinanong.<br>
											<br>
											--Na ngayon din ay ibigay sa amin ang 
											isang may kasalanang nagngangalang 
											Elias, na sa inyo'y namimiloto 
											kaninang umaga,--ang isinagot na may 
											anyong pagbabala.<br>
											<br>
											--Isang may kasalanan?... Ang 
											piloto? Kayo po'y nagkakamali 
											marahil!--ang 
											itinugon ni Ibarra.<br>
											<br>
											--Hindi po; ngayo'y isinumbong na 
											naman ang Elias na iyang nagbuhat ng 
											kamay sa isang sacerdote....<br>
											<br>
											--Ah! at iyan ba ang piloto?<br>
											<br>
											--Iyan nga, ayon sa sabi sa amin; 
											tumatanggap po kayo sa inyong mga 
											pagsasaya, ginoong Ibarra, ng taong 
											may masamang kaasalan.<br>
											<br>
											Tiningnan ni Ibarra ang sargento 
											mula sa mga paa hanggang sa ulo at 
											sinagot siya ng lubhang malaking 
											pagpapawalang halaga:<br>
											<br>
											--Hindi ko kailangang ako'y magsulit 
											sa inyo ng aking mga ginagawa! 
											Tinatangggap namin ng buong 
											kagandahan ng loob ang sino man sa 
											aming mga pagsasaya, at kayo man, 
											kung kayo'y pumarito sana, inyo 
											dising nasunduan ang isang luklukan 
											sa mesa, na gaya naman ng inyong 
											alperes na kapanayam namin ditong 
											dalawang horas lamang ang kalalampas.<br>
											<br>
											At pagkawika nito'y tinalikuran siya.<br>
											<br>
											Kinagat ng sargento ang kanyang mga 
											bigote, at sapagkat napagdilidili 
											niyang siya ang lalong mahina, 
											ipinag utos na paghanapin sa 
											magkabikabila at sa mga kakahuyan 
											ang piloto, na ang anyo nito'y 
											nakatitik sa kapirasong papel na 
											kanyang dala. Ito ang sinabi ni Don 
											Filipo sa kanya:<br>
											<br>
											--Inyong talastasing naaangkap ang 
											mga anyo't kalagayang iyan sa siyam 
											ng bawa't sampung dalisay na 
											filipino; baka po kayo'y magkamali!<br>
											<br>
											Sa kawakasa'y bumalik ang mga 
											sundalo, at kanilang sinabing walang 
											nakita silang bangka o taong sino 
											mang makapagbigay hinala; nagsabi ng 
											pautal-utal ang sargento ng ilang 
											salita at saka umalis na tulad ng 
											pagdating: asa guwardiya sibil.<br>
											<br>
											Untiunting nanag-uli ang katuwaan, 
											umulan ang mga tanong at sumagana 
											ang mga salisalitaan tungkol sa 
											nangyari.<br>
											<br>
											--Kung gayo'y iyan pala ang Elias na 
											naghulog sa alperes sa isang 
											pusaw!--ang sabi ni Leong 
											nag-iisip-isip.<br>
											<br>
											--At paano ba ang nangyaring iyon, 
											paano?--ang tanong ng ilang ibig 
											makatanto ng lihim.<br>
											<br>
											--Ang sabi'y nasalubong daw ng 
											alperes ang isang taong may pas-ang 
											kahoy na panggatong, ng isang araw 
											na umuulan ng mainam ng buwan ng 
											Setyembre. Totoong maputik ang daan 
											at sa tabi lamang may makipot na 
											landas na malalakaran ng iisang tao. 
											Ang ginawa raw ng alperes ay hindi 
											pinigil ang kabayo na siyang dapat 
											sana, kung di bagkos pinatulin at 
											sumigaw sa taong siya'y umudlot: 
											tila mandin hindi ibig ng taong 
											iyong bumalik sa pinanggalingan o 
											aayaw na malubog sa pusaw, kaya't 
											nagpatuloy ng paglakad. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Sa galit ng 
											alperes ay inakalang siya'y 
											ipatahak, nguni't kumuha ang tao ng 
											kaputol na kahoy at pinakapalopalo 
											ang ulo ng hayop nang buong lakas, 
											na ano pa't nabulagta ang kabayo't 
											napatapon sa pusaw ang alperes. 
											Sinasabi ring ipinagpatuloy daw ng 
											taong iyon ang paglakad ng buong 
											tiwasay, na hindi niya alumana ang 
											limang balang ipinahabol sa kanya ng 
											alperes na nabulagan sa marubdob na 
											galit at sa lusak. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt">
											<span style="letter-spacing: normal">
											Sapagkat tunay 
											na hindi kilala ng alperes kung sino 
											ang taong iyon, hininalang marahil 
											ay ang bantog na si Elias, na galing 
											sa lalawigang may ilang buwan pa 
											lamang, na di alam kung tagasaan, at 
											napakilala sa mga guwardiya sibil sa 
											ilang bayan dahil sa mga kawangis ng 
											gayon din mga kagagawan.<br>
											<br>
											--Kung gayo'y tulisan pala siya?--ang 
											itinanong ni Viktoriang kinikilig.<br>
											<br>
											--Sa akala ko'y hindi, sapagkat 
											minsan daw ay siya'y nakilaban sa 
											mga tulisan isang araw na kanilang 
											linolooban ang isang bahay.<br>
											<br>
											--Walang mukhang masamang tao!--ang 
											idinugtong ni Sinang.<br>
											<br>
											--Wala, totoo lamang mapanglaw ang 
											kanyang tingin: hindi ko nakitang 
											siya'y ngumiti man lamang sa buong 
											umaga,--ang sinabi ni Maria Clara.<br>
											<br>
											Sa gayo'y nagdaan ang hapon at 
											dumating ang horas ng pag-owi sa 
											bayan.<br>
											<br>
											Nangagsialis sila sa gubat ng 
											iliniliwanag ang mga huling sinag ng 
											naghihingalong araw, at nagdaan 
											silang hindi umiimik sa malapit sa 
											mahiwagang pinaglibingan ng nuno ni 
											Ibarra. Pagkatapos ay nanag-uli ang 
											masayang mga salitaang maingay, 
											puspos ng kaningasan, sa silong ng 
											mga sanga ng kahoy na iyong hindi 
											totoong sanay na makarinig ng gayong 
											karaming mga boses. Tila mandin 
											namamanglaw ang mga kahoy, umuugoy 
											ang mga gumagapang na mga damo at 
											wari'y sinasabi: Paalam kabataan! 
											Paalam, panag-inip na isang araw!<br>
											<br>
											At ngayon, sa liwanag ng mapupula at 
											malalaking ningas ng mga sigsig; at 
											sa tugtog ng mga gitarra, bayaan 
											natin silang lumakad na patungo sa 
											bayan. Nagbabawas ang mga pulutong, 
											namamatay ang mga ilaw, napipipi ang 
											gitarra, samantalang sila'y 
											nalalapit sa tahanan ng mga tao. 
											Ilagay ninyo ang inyong 'maskara', 
											sapagkat kayo'y makikipanayam na 
											naman sa inyong mga kapatid!</span></font></p>
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