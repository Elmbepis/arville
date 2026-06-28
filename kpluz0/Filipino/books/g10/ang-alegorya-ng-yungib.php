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
<title>Ibong Adarna - Filipino sa KPluz.com</title>
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
										<font face="Arial" size="6" color="#990000">
										Ang Alegorya ng Yungib<br>
										</font>
										<font face="Arial" size="5" color="#990000">
										ni: Plato (isinalin sa Filipino ni 
										Willita A. Enrijo)</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">
											<font color="#333333">At ngayon, 
											sinasabi ko na hayaan mong ipakita 
											ko ang isang anyo na dapat mabatid o 
											hindi mabatid tungkol sa ating 
											kalikasan: Pagmasdan! May mga taong 
											naninirahan sa yungib na may lagusan 
											patungo sa liwanag na umaabot sa 
											kabuuan nito. Sila'y naroroon mula 
											pagkabata, at ang kanilang mga binti 
											at leeg ay nakakadena kung kaya't 
											hindi sila makagalaw, hadlang ito sa 
											pagkilos pati ng kanilang mga ulo . 
											Sa di kalayuan, sa taas at likod 
											nila ay may apoy na nagliliyab, sa 
											pagitan ng apoy at mga bilanggo may 
											daang papataas. Kung ang paningin mo 
											ay dadako sa mababang pader nito, 
											maihahalintulad ito sa isang tabing 
											na pinagtatanghalan ng mga puppet.<br>
											<br>
											Nasilayan ko.<br>
											<br>
											At nasilayan mo rin ba ang mga taong 
											dumadaan sa pagitan ng mga dingding 
											na may dala- dalang mga monumento at 
											larawan ng mga hayop na likha sa 
											kahoy at bato? Ang iba sa kanila ay 
											nagsasalita, ang iba ay tahimik. 
											Naipakita mo sa akin ang kakaiba 
											nilang imahe. Sila nga ay kakaibang 
											mga bilanggo.<br>
											<br>
											Katulad natin, ang tugon ko, na ang 
											tangi nilang nakikita ay pawang 
											sarili nilang mga anino?<br>
											<br>
											Totoo, ang sabi niya, paano nila 
											makikita ang ano man kung hindi sila 
											pinahihintulutang gumalaw maging ang 
											kanilang mga ulo? At may mga bagay 
											na dapat lamang dalhin sa paraang 
											dapat lamang makita ng mga anino? Oo, 
											sabi niya. At kung nakaya nilang 
											hindi sumang-ayon sa isa't isa, 
											hindi ba nila ipinalalagay na sila 
											ay tumutukoy ng kung ano pa man para 
											sa kanila?<br>
											<br>
											Tunay nga.<br>
											<br>
											At sa higit pang pagpapalagay na ang 
											mga bilanggo ay may alingawngaw mula 
											sa ibang dako, hindi ba nila 
											natitiyak na baka guniguni lamang 
											ito ng isang dumaan at may 
											ipinagpapalagay tungkol sa 
											pinagmumulan ng tinig?<br>
											<br>
											Walang tanong-tanong, ang tugon.<br>
											<br>
											Sa kanila, ang sabi ko, ang 
											katotohanan ay walang kahulugan 
											kundi ang anino ng mga imahe. Iyan 
											ang tiyak. Ngayon, balikan muli 
											natin kung ano ang likas na 
											magaganap kung sakaling ang mga 
											bilanggo ay maging malaya at di 
											maaabuso sa kanilang pagkakamali. Sa 
											una, kung ang isa sa kanila ay 
											mapalalaya at biglang tumayo, 
											lumingon, lumakad at tumingin 
											patungo sa liwanag. Magdurusa sa 
											sobrang sakit. Ito mismo ang 
											magpapalungkot sa kaniya. Gayundin 
											hindi niya makikita ang dati niyang 
											kalagayan sapagkat ang tanging 
											nakikita niya ay mga anino lamang. 
											Pagkatapos isaisip, tinuran ng isa 
											na ang kaniyang nakita noong una ay 
											guniguni lamang, ngunit ngayon, siya 
											ay papalapit na sa pagkatao. 
											Nakikita niya, mayroon na siyang 
											maliwanag na pananaw- ano ang 
											magiging tugon niya?<br>
											<br>
											O kaya'y, maaari mong isipin na ang 
											kaniyang guro ay nagtuturo ng mga 
											bagay na dapat niya lamang kilalanin. 
											Hindi ba siya nagugulumihanan? Hindi 
											kaya siya mahumaling na ang anino na 
											kaniyang nakita noong una ay mas 
											tunay kaysa mga bagay na nakikita 
											niya sa kasalukuyan?<br>
											<br>
											Malayong katotohanan.<br>
											<br>
											At kung siya ay napilitang tumingin 
											nang diretso sa liwanag, wala ba 
											siyang nararamdamang sakit upang 
											siya'y magkubli sa nakikitang bagay? 
											Kaniya bang aakalain na siya ay nasa 
											katotohanang mas maliwanag kaysa mga 
											bagay na nakikita sa kasalukuyan?<br>
											<br>
											Totoo, ang sabi niya.<br>
											<br>
											At kung ipinalalagay pang muli na 
											siya ay atubiling hinila pataas sa 
											matarik at bako-bakong daan hanggang 
											sapilitan siyang makarating sa harap 
											mismo ng araw, hindi ba siya 
											mahihirapan at magagalit? Kapag 
											nilapitan niya ang liwanag, ang 
											kaniyang mga mata ay maaaring 
											masilaw at hindi niya magagawang 
											makita ang mga bagay-bagay sa 
											kasalukuyan - ang katotohanan.<br>
											<br>
											Hindi muna sa kasalukuyan, sabi niya.<br>
											<br>
											Kailangang mahirati ang kaniyang 
											paningin sa dakong itaas ng mundo. 
											At makita niya nang maliwanag ang 
											mga anino, kasunod ay ang 
											repleksiyon ng tao at iba pang bagay 
											sa tubig, at ang mismong mga bagay. 
											Pagkatapos, tititig siya sa liwanag 
											ng buwan at mga bituin, at sa 
											maningning na kalangitan; at 
											kaniyang makikita ang ulap at mga 
											bituin sa gabi nang mas maningning 
											kaysa liwanag ng araw na hatid ng 
											umaga.<br>
											<br>
											Tiyak.<br>
											<br>
											Higit sa lahat, magkakaroon siya ng 
											kakayahang makita ang araw, hindi 
											lamang ang repleksiyon niya sa tubig 
											kundi makikita niya ang sarili sa 
											kinaroroonan, at hindi sa iba pa 
											man, at siya ay makapagninilay-nilay 
											kung sino siya.<br>
											<br>
											Tiyak.<br>
											<br>
											At siya ay makararating sa pagtatalo 
											na siya mismo ay naglaan ng panahon. 
											At ang gumagabay sa lahat ng ito ay 
											yaong nakikita sa mundo, na naging 
											dahilan upang siya at ang kaniyang 
											kapwa ay masanay sa pagtitig.<br>
											<br>
											Maliwanag, sabi niya, una niyang 
											makikita ang liwanag pagkatapos ang 
											dahilan tungkol sa kaniyang sarili. 
											At kung maalala niya ang dating 
											tahanan, at ang karunungan sa yungib 
											pati ang mga kapuwa bilanggo, hindi 
											ba niya maipalalagay na mapaliligaya 
											niya ang sarili sa pagbabago at 
											kaawaan na lamang sila?<br>
											<br>
											Tiyak at tumpak.<br>
											<br>
											At kung sila ay nasanay na sa 
											pagtanggap ng mga karangalan sa kung 
											sino sa kanila ang mabilis na 
											makapuna sa pagdaan ng mga anino at 
											makapagsabi kung sino ang nakaranas 
											niyon dati? Kung sinuman ang 
											makapagpapasiya nang mahusay para sa 
											kinabukasan, sa iyo bang palagay 
											sino ang makapag-iingat sa tinatawag 
											na dangal at kaluwalhatian? O kaya'y 
											kainggitan ba ang may taglay nito? 
											Hindi ba niya babanggitin ang 
											tinuran ni Homer.<br>
											<br>
											'Mas mabuting maging mahirap na 
											alipin ng dukhang panginoon.' At matututuhang tiisin ang mga bagay 
											kaysa isaisip ang kanilang ginagawa 
											at mamuhay katulad ng kanilang gawi?<br>
											<br>
											Oo, ang sabi niya. Sa palagay ko ay 
											pipiliin niyang magtiis kaysa aliwin 
											ang mga huwad na akala at mabuhay sa 
											kahabag-habag na kalagayan.<br>
											<br>
											Para makatiyak, sabi niya.<br>
											<br>
											At kung mayroon mang paligsahan, at 
											kailangan niyang makipagtagisan sa 
											pagsukat sa mga anino kasama ang mga 
											bilanggo na kailanman ay di nakalaya 
											mula sa yungib. Sa sandaling ang 
											paningin ay nananatiling mahina, at 
											bago ito maging matatag (may dapat 
											isaalang-alang sa panahon na 
											kakailanganin upang makamit ang 
											bagong kalagayan ng paningin) hindi 
											ba siya katawa-tawa? Sasabihin ng 
											tao sa kaniya na ang pagpunta at 
											pagdating niya nang wala ang mga 
											paningin ay mas mabuti na hindi na 
											lamang isaisip ang pag-unlad. At 
											kung sinuman ang sumubok na palayain 
											ang iba at gabayan patungo sa 
											liwanag; hayaang hulihin ang 
											nagkasala at dalhin nila sa 
											kamatayan.<br>
											<br>
											Walang tanong, ang sabi niya.<br>
											<br>
											Ito ang kabuuan ng alegorya, ang 
											sabi ko; maaari mong dagdagan mahal 
											kong Glaucon ang mga dating 
											katuwiran. Ang bilangguan ay mundo 
											ng paningin, ang ilaw ng apoy ay ang 
											araw. Hindi mo ako mamamali kung 
											ipakakahulugan mo na ang paglalakbay 
											papataas ay maging pag-ahon ng 
											kaluluwa patungo sa intelektuwal na 
											mundo batay sa mahina kong 
											paniniwala. Aking ipinahahayag, ito 
											ay batid ng Diyos maging tama man o 
											mali. Ngunit tunay man o huwad, ang 
											aking opinyon sa mundo ng karunungan 
											ay ito, ang ideya ng kabutihan ay 
											nananatili sa huli at matatagpuan 
											lamang nang may pagpupunyagi; at 
											kapag ito'y natagpuan, ang lahat ng 
											bagay na maganda at tama sa daigdig 
											at ang pangunahing pinagmumulan ng 
											dahilan at katotohanan ay yaong 
											sinumang may kapangyarihang kumilos 
											nang may katuwiran sa publiko o 
											pribadong buhay. Samakatuwid 
											kailangan na ang kaniyang mga mata 
											ay may matibay na tuon para sa mga 
											bagay na ito.<br>
											<br>
											Sumasang-ayon ako, sabi niya, 
											hanggat may kakayahan akong 
											maunawaan ka.<br>
											<br>
											At ang sabi ko, huwag kang magtaka 
											sa iba na may magandang pananaw na 
											ayaw man lang magbahagi para sa 
											kapakanan ng tao; para sa kanilang 
											kaluluwa sa itaas ng mundo ay madali 
											lamang kung saan sila'y naghahangad 
											na manirahan; magiging likas ang 
											kanilang paghahangad, kung ang ating 
											alegorya ay mapagkakatiwalaan.<br>
											<br>
											Oo, tunay na likas.<br>
											<br>
											At mayroon bang bagay na 
											nakapagtataka sa mga taong nakadaan 
											mula sa banal na pagninilay-nilay 
											patungo sa makasalanan nilang 
											kalagayan o gumawa ng labag sa 
											kagandahang-asal? Samantala, habang 
											ang kaniyang mga mata ay kumukurap 
											bago siya mahirati sa kadiliman, 
											siya ay mapipilitang lumaban sa 
											korte o sa ibang lugar, tungkol sa 
											anino ng imahe ng katarungan at 
											magpupunyaging maunawaan nang ganap 
											ang katarungan.<br>
											<br>
											Anuman, ngunit kamangha-mangha ang 
											kaniyang tugon.<br>
											<br>
											Sinuman ang may wastong pag-iisip ay 
											mababatid na ang pagkalito ng mga 
											paningin ay dalawang uri o 
											nanggaling sa dalawang dahilan, 
											maaaring mula sa paglabas ng liwanag 
											o patungo sa liwanag. Kapag nakita 
											niya na sinuman na may pananaw na 
											magulo at mahina ay masasabing hindi 
											pa handang humalakhak. Una niyang 
											itatanong kung ang kaluluwa ba ng 
											tao ay maghahatid nang maliwanag na 
											buhay? O kaya'y maglalapit mula 
											kadiliman patungo sa araw na labis 
											na nakasisilaw? At kaniyang 
											bibilangin ang maligayang kalagayan 
											niya, at siya ay maaawa sa iba, o 
											kung nasa isipan man niyang 
											pagtawanan ang kaluluwa na 
											nanggaling mula ilalim patungo sa 
											liwanag, mayroon pang mga dahilan 
											bukod dito kaysa mga halakhak na 
											bumati sa kaniya at bumalik mula sa 
											itaas ng liwanag patungo sa yungib.<br>
											<br>
											Iyan, ang sabi niya na dapat itangi.</font><br>
											&nbsp;&nbsp;
											<br>
											&nbsp;&nbsp;
											<br>
											<br>
											</span>
											<font size="3" color="#333333">Source:&nbsp;https://filipino10niwarville.blogspot.com/2015/05/ang-alegorya-ng-yungib.html</font></font></p>
											<p style="margin: 0 80px" align="justify"><font face="Arial"><span style="font-size: 15pt">&nbsp;&nbsp;
											<br>
											&nbsp;&nbsp;
											<br>
											<br>
											&nbsp;</span></font></p>
											<span style="font-size: 15pt">
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