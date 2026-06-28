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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXVIII. Ang Prusisyon</font></b></p>
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
											Paggabi, at ng nasisindi ng lahat 
											ang mga parol sa mga bintana, ginawa 
											ang ikaapat na paglabas ng 
											prokesion, na sinasabayan ng&nbsp;<span class="smcap">repique</span>&nbsp;ng 
											mga kampana at ng talastas ng dating 
											mga putukan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang Kapitan Heneral na nagpapasyal 
											ng lakad, na kaakbay ang kanyang 
											dalawang ayudante, si Kapitan Tiago, 
											ang Alkalde, ang Alferez at si 
											Ibarra, na pinangungunahan ng mga 
											guwardiya sibil at ng mga 
											punong-bayan, na siyang nangagwawahi 
											ng daan at nagpapatabi sa tao, 
											inanyayahan silang doon manood ng 
											pagdaan ng prokesion sa bahay ng 
											Gobernadorcillo, na nagpatayo sa 
											harapan ng isang tablado, upang doon 
											saysayin ang isang&nbsp;<span class="smcap">loa</span>&nbsp;(pagpupuri) 
											sa pag bibigay dangal sa Santong 
											Patron.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinalikdan marahil ng&nbsp; buong&nbsp; galak 
											ni Ibarra ang pakikinig ng tulang 
											iyon, palibhasa'y lalong 
											minamagaling pa niyang doon na 
											manood ng prokesion sa bahay ni 
											Kapitan Tiago, na kinatitirahan ni 
											Maria at ng kaniyang mga kaibigang 
											babae, nguni't sapagkat ibig ng 
											Kapitan Heneral na mapakinggan ang&nbsp;<span class="smcap">loa</span>, 
											napilitan siyang mag-aliw na lamang 
											sa pag-asang si Maria Clara'y 
											kanyang makikita sa teatro.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang pasimula ng prokesio'y mga 
											'kiriales' na pilak, na taglay ng 
											tatlong mga sakristang 
											nangakaguantes, sumusunod ang mga 
											bata sa paaralang kasama ang 
											kanilang maestro; pagkatapos ay ang 
											mga batang may dalang mga parol na 
											papel, na iba't iba ang mga kulay at 
											anyo, nakalagay sa dulo ng isang 
											tiking humigit kumulang ang haba sa 
											napapamutihan ng alinsunod sa 
											naisipan ng mga bata, sapagkat ang 
											nagkakagugol ng pag-ilaw na ito'y 
											ang mga musmos sa nayon at ang 
											nayon, at ang pinabahalaan. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Maligayang ginaganap nila ang 
											tungkuling itong iniatang sa kanila 
											ng&nbsp;<span class="smcap">matanda sa 
											nayon</span>; bawa't isa'y 
											nagmumunakala at gumagawa ng kanyang 
											parol, pinapamutihan ng magalingin 
											nilang mga sabit at ng maliliit na 
											mga bandila, alinsunod naman sa 
											kalagayan ng kanilang bulsa, at saka 
											iniilawan ng isang upos ng kandila, 
											sakali't makapanghingi sila sa isang 
											kaibigan o kamag-anak na sakristan, 
											o kung dili kaya'y bumibili sila ng 
											isang maliit na kandilang mapula, na 
											ginagamit ng mga insik sa kanilang 
											mga altar.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kalagitnaa'y nagpaparoo't parito 
											ang mga alguakil at mga teniente ng 
											hustisya, upang pangasiwaang huwag 
											magkawatak-watak ang mga hanay at 
											huwag magkabunton-bunton ang mga 
											tao, at sa ganitong kadahilana'y 
											ginagawa nilang tagapamag-itan ang 
											kanilang&nbsp;<span class="smcap">varas</span>, 
											sa pagkat sa mga panghahampas nila 
											nito, na ipinamamahagi nila ng ukol 
											at katatagang lakas nasusunduan nila 
											ang pagkaunlak at karikitan ng mga 
											prokecion, sa ikababanal ng mga 
											kaluluwa at ininingning ng mga 
											pagdiriwang ng religion!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang ipinamamahagi ng walang 
											bayad ng mga alguakil ang ganitong 
											pangbanal na mga palo ng yantok, ang 
											iba nama'y namimigay rin ng walang 
											bayad ng malalaki't maliliit na mga 
											kandila, at ng sa gayo'y kanilang 
											maaliw ang mga pinalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ginoong Alkalde,--ani Ibarra, ng 
											sabing mahina,--ginagawa po ba ang 
											mga pamamalong iyan upang mabigyang 
											kaparusahan ang mga makasalanan, o 
											dahilan lamang na kanilang naibigan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasakatuwiran po kayo, ginoong 
											Ibarra!--ang sagot ng Kapitan Heneral 
											na naringig ang gayong 
											katanungan:--nakapagtataka ang 
											ganitong napapanood na ... 
											katampalasanan sa bawa't maparitong 
											taga ibang lupain. Nararapat ngang 
											ipagbawal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi maalaman kung ano ang dahil at 
											kung bakit ang nangungunang santo'y 
											si San Juan Bautista. Sa nakikitang 
											kalagayan niya'y masasabing hindi 
											totoong kinalulugdan ng mga tao ang 
											mga kagagawan ng pinsan ng ating 
											Panginoong Jesukristo; tunay nga't 
											siya'y may mga paa't binting dalaga, 
											at may pagmumukhang ermitanyo, 
											datapuwa't ang kinalalagyan niya'y 
											isang lumang andas na kahoy, at 
											siya'y dinidimlan ng ilang mga 
											batang may mga dalang parol na papel 
											na walang ilaw,&nbsp;<span class="smcap">na</span>&nbsp;nangagpapaluan 
											nang lihim ng kanikanilang parol ang 
											isa't isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kulang palad!--ang ibinubulong ng 
											pilosopo Tasio, na pinanonood ang 
											prosecion mula sa daan;--hindi 
											makapagbibigay kagalingan sa iyo ang 
											ikaw ang naunang nagsaysay ng 
											Magandang Balita, at ang kahi't 
											yumukod sa iyo si Jesus! hindi 
											nakapagbibigay kagalingan sa iyo ang 
											inyong malaking pananampalataya't 
											ang iyong pagpapakahirap, at ang iyo 
											man lamang pagkamatay dahil sa 
											pagwalanggalang mo ng katotohanan at 
											ng iyong pinananaligan; linilimot 
											ang lahat ng ito ng mga tao, pagka 
											walang taglay kung di ang sariling 
											mga karapatan! </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Lalong magaling pa 
											ang magsermon sa mga simbahan kay sa 
											maging kawiliwiling tinig na 
											sumisigaw sa mga ilang, 
											nagpapakilala sa iyo ang mga bagay 
											na ito kung ano ang Filipinas. Kung 
											pano sana ang iyong kinain at hindi 
											mga balang, kung ang dinamit mo 
											sana'y sutla at hindi balat ng mga 
											hayop, kung nakipanig ka sa isang 
											Kapisanan ng mga prayle....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											nguni't inihinto ng matandang lalaki 
											ang kanyang mga pagsisi, sapagkat 
											dumarating si San Francisco.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ba sinabi ko na nga?--ang 
											itinuloy na ngumingiti ng 
											patuya;--ito'y na sa isang karro at 
											Santo Diyos! gaano karaming mga ilaw 
											at gaano karaming mga parol na 
											kristal! Kailan ma'y hindi ka 
											naligid ng ganyang karaming mga 
											pangliwanag, Giovanni Bernardone! At 
											pagkagalinggaling na musikal ibang 
											mga tinig ang ipinaringig ng mga 
											anak mo ng mamatay na ikaw! 
											Datapuwa, kagalanggalang at 
											mapakumbabang nagtayo ng isang 
											Kapisanan, kung mabuhay kang mag-uli 
											ngayon, wala kang ibang makikita 
											kung di nga haling na Eliasis de 
											Cortona, at sakali't makilala ka ng 
											iyong mga anak, ibibilanggo ikaw at 
											marahil ay mawangis ka sa kinaratnan 
											ni Cesario de Speyer!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumusunod sa musika ang isang 
											estandarte na kinalalarawanan ng 
											santo ring iyon, datapuwa't may 
											pitong pakpak. Dala ang estandarteng 
											iyon ng mga 'hermano terkero,' na 
											nakahabitong gingon at nagdarasal ng 
											malakas at sa anyong kaawa-awang 
											tinig.--Ayawan kung ano ang dahil ng 
											pagkakagayon, sumusunod doon si 
											Santa Maria Magdalena, na 
											pagkagandagandang larawang may 
											saganang buhok, may panyong pinyang 
											bordado sa mga daliring puno ng mga 
											singsing, at nararamtan ng damit na 
											sutlang may pamuting mga malalapad 
											na ginto. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Naliligid siya ng mga ilaw 
											at ng insenso; nanganganino sa 
											kanyang mga luhang virdrio ang mga 
											kulay ng mga ilaw 'bengala,' na 
											nagbibigay sa prokesion ng anyong 
											kahimahimala, kaya nga't kung 
											minsa'y lumuluha ang santang 
											makasalanan ng verde, kung minsa'y 
											pula, minsa'y asul at iba pa. Hindi 
											nagpapasimula ang mga bahay ng 
											pagpapaningas na mga ilaw na ito 
											kung di kung nagdaraan si San 
											Francisco; hindi tinatamo ni San 
											Juan Bautista ang ganitong mga 
											karangalan, kaya't dalidaling 
											nagdaraan, na kanyang pagkahiya na 
											siya lamang ang bukod na ang 
											pananamit ay balat ng mga hayop sa 
											gitna ng gayong karaming mga taong 
											lipos ng ginto at mga mahalagang 
											bato.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nariyan na ang ating santa!--anang 
											anak na babae ng gobernadorcillo sa 
											kanyang mga panauhin; ipinahiram ko 
											sa kanya ang aking mga singsing, 
											nguni't ng ako'y magtamo ng langit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagsisitigil ang mga nangagsisi 
											ilaw sa paliquid ng tablado upang 
											mapakinggan ang LOA (pagpupuri), 
											gayon din ang ginagawa ng mga santo; 
											ibig na man nila o ng sa kanila'y 
											nangagdadalang makinig ng mga tula. 
											Sa pagka pagod ng kahihintay ng mga 
											nangagdadala kay San Juan, sila'y 
											nangagsiupo ng patingkayad, at 
											pinagkaisahan nilang ilagay muna sa 
											lupa ang santo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Baka maggalit ang aguakil ang tutol 
											ng isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hes! diyata't sa sakristia'y 
											inilalagay lamang siya sa isang 
											sulok na may mga bahay ng gagamba!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ng mapalagay na sa lupa si San 
											Juan, siya'y nagmukhang tila isa sa 
											mga taong-bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpapasimula ang hanay ng mga babae 
											buhat kay Magdalena, ang kaibhan 
											lamang ay hindi nagsisimula muna sa 
											hanay ng mga batang babae, na gaya 
											ng mga lalaki, kung di ang mga 
											matatandang babae ang nangunguna at 
											sumusunod ang mga dalaga na siyang 
											nangasahuli ng prokesion hanggang sa 
											karro ng Birhen na sinusundan ng 
											kura na napapandungan ng palio. 
											Pakana ang kaugaliang ito ni Padre 
											Damaso, na siyang may sabi: 'Hindi 
											ang mga matatandang babae ang 
											kinalulugdan ng Birhen kung di ang 
											mga dalaga', bagay na isinasama ng 
											mukha ng maraming babaeng 
											mapag-anyong banal, nguni't 
											sumasang-ayon sila at ng 
											mapagbigyang loob ang Birhen.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumusunod kay Magdalena si San 
											Diego, bagaman sila hindi niya 
											ikinatutuwa ang gayong kalagayan, 
											sapagkat nananatili sa kanyang mukha 
											ang kahapisan, na gaya rin kaninang 
											umaga ng sumusunod siya sa likuran 
											ni San Francisco. Anim na mga 
											'hermana terkera' ang humihila sa 
											kanyang karro, dahil sa kung anong 
											pangako o pagkakaramdam; ang 
											katotohana'y sila ang humihila, at 
											taglay nila ang&nbsp; buong&nbsp; 
											pagsusumipag. Huminto si San Diego 
											sa harap ng tablado at naghihintay 
											na siya'y handugan ng bati.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't kinakailangang hintayin 
											ang karro ng Birheng pinangungunahan 
											ng mga taong suot 'fantasma' o 
											multo, na nakagugulat sa mga bata; 
											kaya nga't naririnig ang iyakan at 
											sigawan ng mga sanggol na mga haling 
											ang kaisipan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Gayon man, sa gitna ng 
											madilim na pulutong na iyon ng mga 
											habito, mga kapuchon, mga kordon 
											(lubid) at mga lambong, na kaalakbay 
											yaong dasal na pahumal at&nbsp;hindi 
											nagbabago ang tinig, na papanood na 
											wangis sa mga mapuputing mga jazmin, 
											tulad sa mga sariwang sampaga 
											nahahalo sa mga lumang mga basahan, 
											ang labing dalawang batang babaeng 
											nagagayasan ng puti, nakokoronahan 
											ng mga bulaklak, kulot ang buhok, 
											nagniningning ang mga matang kahuad 
											ng kanilang mga kollar; walang 
											pinag-ibhan sa mga angel ng 
											kaliwanagang napipilit ng mga multo. 
											Sila'y pawang nakakapit sa dalawang 
											mga sintas na asul na nakatali sa 
											karro ng Birhen, na nagpapaalaala sa 
											mga kalapating humihila sa 
											'Primavera' (larawan ng pasimula ng 
											tag-araw.)</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pawang handa na sa pakikinig ang 
											lahat ng mga larawan, na 
											nagkakadaidaiti sila sa pag-ulinig 
											ng mga tula; nakatitig ang lahat sa 
											nakasiwang na kortina (tabing ng 
											pintuan); sa kawakasa'y isang 
											'aaah!' ng panggigilalas ang 
											nagpumiglas sa mga labi ng lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At karapatdapat ngang panggilalasan: 
											siya'y isang malakilaki ng batang 
											lalaking may mga pakpak, 'botas' na 
											pangpangabayo, banda, kinturon at 
											sombrerong may mga plumaje.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang se&ntilde;or Alkalde mayor!--ang sigaw 
											ng isa; datapuwa't nagsimula ang 
											himala ng mga kinapal ng pagsasaysay 
											ng isang tulang kawangis din niya, 
											at hindi niya isinama ng loob ang sa 
											kanya'y pagtutulad sa Alkalde.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bakin pa sasaysayin dito ang mga 
											sinabi sa wikang latin, tagalog at 
											wikang kastila, na pawang tinula, ng 
											kaawaawang binigyang pahirap ng 
											gobernadorcillo? Linasap na ng mga 
											bumabasa sa amin ang sermon ni Padre 
											Damaso kaninang umaga, at ayaw nga 
											kaming sila'y lubhang palayawin ng 
											napakarami namang mga kagilagilalas 
											na mga bagay, bukod sa baka pa 
											sumama ang loob sa amin ng 
											frankiskano kung siya'y ihanap namin 
											ng isang makakapangagaw, at ito ang 
											aayaw kami, palibhasa'y kami taong 
											payapa, sa kagalingan ng aming 
											kapalaran.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipinagpatuloy pagkatapos ang 
											prokesion: ipinagpatuloy ni San Juan 
											ang malabis ng saklap na kanyang 
											paglalakad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang magdaan ang Birhen sa tapat ng 
											bahay ni Kapitan Tiago'y isang 
											awit-kalangitan ang sa kanya'y 
											bumati ng mga sinalita ng Arkangel. 
											Yao'y isang tinig na kaayaaya, 
											matining, mataginting, nagmamakaawa, 
											itinatangis wari ang 'Ave Maria' ni 
											Gounod, na sinasaliwan ng pianong 
											siya rin ang tumutugtog at kaakbay 
											niyang dumadalangin. Nagpakapipi ang 
											musika ng prokesion, huminto ang 
											pagdarasal at tumigil pati ni Padre 
											Salvi. Nangangatal ang boses at 
											bumubunglos ng mga luha: higit sa 
											isang pagbati, ang sinasaysay niya'y 
											isang mataos na dalangin, isang 
											karaingan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Narinig ni Ibarra ang tinig mula sa 
											kinalalagyang durungawan, at nanaog 
											sa ibabaw ng kanyang puso ang 
											pangingilabot at kalungkutan. 
											Napagkilala niya ang sa kaluluwang 
											iyong dinaramdam, na isinasaysay sa 
											isang pag-awit, at nanganib siyang 
											magtanong sa sarili ng kadahilanan 
											ng gayong pagpipighati.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Mapanglaw at nag-iisip-isip ng 
											siya'y masumpong ng Kapitan Heneral.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sasamahan ninyo ako sa pagkain sa 
											mesa; pagsasalitaanan natin doon ang 
											nauukol sa mga batang nangawala, ang 
											sa kanya'y sinabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako 
											kaya baga ang pinagkakadahilanan?--ang 
											ibinulong ng binata, na bagaman 
											tinitingnan niya'y hindi niya 
											nakikita ang Kapitan Heneral, na 
											kanyang sinundan ng wala sa kanyang 
											loob.</font></p>
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