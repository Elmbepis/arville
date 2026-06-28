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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XL. Ang Katuwira't ang Lakas</font></b></p>
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
											Niyao'y may ikasampung oras na ng 
											gabi. Nanghihinamad na napaiimbulog 
											at nagnining sa madilim na langit 
											ang ilang globong papel, na 
											ipinaitaas sa pamamag-itan ng aso at 
											ng hanging pinainit. Ang ilang mga 
											globong pinamutihan ng mga bomba't 
											koetes ay nangasunog at 
											isinasapanganib ang lahat ng bahay; 
											dahil dito'y may nakikita pang mga 
											tao sa mga palupo, na may mga dalang 
											isang mahabang kawayang sa dulo'y 
											may nakakabit na basahan at saka 
											isang baldeng tubig.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naaaninagnagan 
											ang maiitim nilang anyo sa malamlam 
											na liwanag ng impapawid, at ang 
											kahalimbawa nila'y mga fantasmang 
											mula sa alang-alang na nanaog upang 
											manood ng mga kasayahan ng mga tao. 
											Sinusuhan din naman ang maraming mga 
											'rueda', mga 'kastillo', mga toro o 
											mga kalabaw na apoy, at isang 
											malaking volkang sa ganda at 
											kadakilaa'y linaluan ang 
											kalahatlahatang nakita hanggang sa 
											panahong iyon ng mga taga San Diego.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngayo'y tumutungo ang karamihang mga 
											tao sa dakong plaza ng bayan, upang 
											panoorin ang huling palalabasin sa 
											teatro. Dito't doo'y may nakikitang 
											mga ilaw ng Bengala (lukes de 
											Bengala), na siyang lumiliwanag ng 
											katakataka sa masasayang mga 
											pulutong; gumagamit ang mga bata ng 
											mga sigsig sa paghahanap ng mga 
											bombang hindi pumutok, at iba pang 
											mga labi na mangyayari pang gamitin, 
											datapuwa't tumugtog ang musika ng 
											isang palatandaan, at ng magkagayo'y 
											linisan ng lahat ang kapatagang 
											iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Mainam na totoo ang pagkakapaliwanag 
											sa tablado, libolibong mga ilaw ang 
											nakaliligid sa mga haligi, nakabitin 
											sa bubungan, at nasasabog sa sahig 
											na masinsin ang pagkakapulupulutong. 
											Isang alguakil ang siyang nag-aalaga 
											ng mga ilaw na iyon, at pagka 
											napaparoon at ng mapagbuti ang mga 
											ilaw na kukutapkutap, siya'y 
											pinagsusutsutanan at sinisigawan ng 
											madla;--Nariyan na, nariyan na siya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa harap ng eskenario (palabasan) ay 
											pinagtotonotono ng orquesta ang 
											kanilang mga instrumento, 
											ipinariringig ang mga pangunahin ng 
											mga tugtugin; sa likuran&nbsp;ng 
											orquesta'y naroroon ang lugar na 
											sinasabi ng korresponsal sa kanyang 
											sulat. Ang kaginoohan sa bayan, ang 
											mga kastila at ang mga mayayamang 
											dayo'y nangagsisiupo na sa nahahanay 
											na mga silla. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang bayan, ang mga 
											taong walang katungkulan at walang 
											mga dangal na kaloob ng pamahalaa'y 
											siyang nakalalaganap sa 
											nangatitirang lugar sa plaza; may 
											pas-ang bangko ang mga iba, na ang 
											karaniwa'y hindi ng upuan kung di ng 
											bigyang kagamutan ang pagka pandak: 
											pinanggagalingan ang ganitong gawa 
											ng maiingay na mga pagtutol ng mga 
											walang bangko; pagkakagayo'y 
											nangagsisipanaog agad-agad ang mga 
											nakatayo sa bangko; nguni't hindi 
											nalalao't sila'y muling pumapanhik, 
											na parang walang ano mang nangyari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											mga pagpaparoo't parito, mga 
											sigawan, mga ingayan sa pagtataka, 
											mga halakhakan, isang huli na sa 
											panahong 'buskapie', isang 
											'rebentador' ang siyang 
											nangagdaragdag ng kaingayan. Sa dako 
											rito'y may nababaling paa ng isang 
											bangko at nangahuhulog sa lupa, sa 
											gitna ng tawanan ng karamihan, ang 
											mga taong nanggaling sa malayo at ng 
											makapanood ay ngayo'y siyang 
											nagiging panoorin; sa dako roo'y 
											nangag-aaway sa pagpapangagaw sa 
											lugar; sa dakong malayo pa roo'y may 
											nariringig na isang kalampagan ng 
											nababasag na mga kopa at mga 
											botelya: yao'y si Andeng na may 
											dalang mga alak at mga pangpatid 
											uhaw; maingat na tangan ng dalawang 
											kamay ang malapad na bandeja, 
											nguni't kanyang nakasalubong ang sa 
											kanya'y nangingibig, na nag-akalang 
											magsamantala ng gayong kalagayan ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangungulo sa pamamanihala at 
											kahusayan ng panoorin ang teniente 
											mayor na si Don Filipo; sapagkat 
											malulugdin sa 'monte' ang 
											gobernadorcillo. Ganito ang sabi ni 
											Don Filipo kay matandang Tasio:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano kaya ang mabuti kong gawin?--ang 
											sabi niya;--hindi tinanggap ng 
											Alkalde ang pagbibitiw ko ng 
											katungkulan;--'inaakala po ba ninyong 
											sala't kayo sa lakas sa pagganap ng 
											inyong mga katungkulan?'--ang 
											itinanong sa akin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano ang inyong isinagot?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Alkalde!--ang aking 
											isinagot;--ang mga lakas ng isang 
											teniente mayor, kahi't 
											magpakawalawalang kapakanan, pawang 
											katulad ng mga lakas ng lahat ng mga 
											pinuno: nanggagaling ang mga lakas 
											na iyan sa mga matataas na pinuno. 
											Tinatanggap ng kahi't hari man ang 
											kanyang mga lakas sa bayan at 
											tinatanggap naman ng bayan sa Diyos 
											ang kanyang lakas. Itong bagay na 
											ito pa naman ang wala sa akin, 
											ginoong Alkalde!--Datapuwa't hindi 
											ako pinakingan ng Alkalde, at sinabi 
											sa aking pag-uusapan na raw namin 
											ang mga bagay na ito pagka tapos ng 
											mga piyesta.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y tulungan nawa kayo ng 
											Diyos!--ang sinabi ng matanda, at 
											nag-akalang umalis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aayaw po ba kayong manood&nbsp;ng 
											palabas?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Salamat! hindi ko kinakailangan ang 
											sino man sa pananaginip at sa 
											paggawa ng mga kaululan, sukat na 
											akong mag-isa,--ang isinagot ng 
											pilosopong kalakip ang isang tawang 
											palibak;--datapuwa't ngayo'y naalaala 
											ko, hindi ba tinatawag ang inyong 
											paglilining ng kaugalia't hilig ng 
											ating bayan? </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Payapa, nguni't 
											malulugdin sa mga panooring nauukol 
											sa mga pagbabaka at sa mga labanang 
											sumasabog ang dugo, ibig ang 
											pagkakapantay-pantay, datapuwa't 
											sumasamba sa mga emperador, sa mga 
											hari at sa mga prinkipe; hindi 
											mapagpitagan sa religion, nguni't 
											iniwawaldas ang pamumuhay sa mga 
											walang kabuluhang pag paparangalan 
											sa mga piyesta; ang mga babae rito 
											sa atin ay may kaugaliang matimyas, 
											nguni't nangahahaling pagka 
											nakakakita ng isang prinsesang 
											nagpapa-ikit ng sibat ... nalalaman 
											po ba ninyo kung ano ang kadahilanan 
											nito? Talastasin po ninyong dahil 
											sa....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinutol ang kanilang salitaan ng 
											pagdating ni Maria Clara at ng 
											kanyang mga kaibigang babae. 
											Tinanggap sila ni Don Filipo, at 
											sinamahan sila sa kanikanilang 
											upuan. Sumusunod sa kanila ang 
											kurang may kasamang isa pang 
											frankiskano't ilang mga kastila. 
											Casama rin naman ng kura ang ilang 
											mga mamamayang ang hanap-buhay 
											umalakbay tuwina sa mga prayle.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bigyang pala nawa sila ng Diyos 
											naman sa kabilang buhay!--anang 
											matandang Tasio, samantalang 
											lumalayo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinasimulan ang palabas kay Chananay 
											at kay Marianito, sa pagkanta ng 
											'Crispino e la komare'. May mga mata 
											at may pakinig ang lahat ng na sa 
											eskenario, liban lamang sa isa: si 
											Padre Salvi. Tila mandin walang 
											sinadya ng nagbibigay paroon kung di 
											bantayan si Maria Clara, na ang 
											tinataglay na kahapisa'y nagbibigay 
											sa kanyang kagandahan ng isang 
											anyong kahimahimala sa ningning at 
											kahalagahan, na ano pa't 
											napagwawaring tunay ng ang may 
											katuwirang siya'y panoorin ng&nbsp; 
											buong&nbsp; pagliyag. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											N<font face="Arial" color="#333333">guni't 
											hindi nangagsasaysay ng pagliyag ang 
											mga mata ng frankiskano, na lubhang 
											natatago sa malalim na hungkag na 
											kinalalagyan ng kanyang mga 
											paningin; nababasa sa mga titig na 
											iyon ang isang bagay na kahapisang 
											may malaking pagngingitngit: gayon 
											marahil ang mga mata ni Cain sa 
											panonood, buhat sa malayo, ng 
											Paraiso, ng mga kaligayahan, doo'y 
											ipinakilala sa kanya ng kanyang ina!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtatapos na ang 'akto' (bahagi) ng 
											pumasok si Ibarra; pinanggalingan 
											ang pagdating niya roon ng isang 
											bulungbulungan: siya at ang kura ang 
											siyang pinagtiningan ng pagpansin ng 
											lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't parang hindi nahiwatigan 
											ng binata ang bagay na iyon, 
											sapagkat bumati siya ng walang kimi 
											kay Maria Clara at sa kanyang mga 
											kaibigang babae, at naupo sa tabi ng 
											kanyang kasintahan. Si Sinang ang 
											tanging nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinanood mo ba ang volkan?--ang 
											initanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi kaibigan? ako'y napilitang 
											aking samahan ang Kapitan Heneral.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y sayang! Casama namin 
											ang kura, at sinasaysay sa amin ang 
											mga naging buhay ng mga napakasama; 
											nakita mo na? takutin kami at ng 
											huwag kaming makapagsaya, nakita mo 
											na?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagtindig ang kura at lumapit kay 
											Don Filipo, na tila mandin kanyang 
											pinakipagtalunan ng masilakbo. 
											Mainit ang pananalita ng kura, 
											mahinusay naman at mahina ang 
											pananalita ni Don Filipo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dinaramdam ko pong hindi ako 
											makapagbigay-loob sa inyo; ang sabi 
											ni Don Filipo;--si ginoong Ibarra'y 
											isa sa mga lalong malalaki ang 
											ambag, at may katuwirang makalagay 
											rito samantalang hindi nanggugulo ng 
											kapayapaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't hindi ba panggugulo ng 
											kapayapaan ang magbigay kasalanan sa 
											mabubuting mga kristiano? Iya'y 
											isang pagpapabayang makapasok ang 
											isang lobo sa kawan ng mga mababait 
											na tupa. Sasagot ka sa bagay na ito 
											sa harap ng Diyos at sa harap ng mga 
											matataas na puno!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kailan man po'y nananagot ako, 
											padre, sa lahat ng mga gawang bukal 
											sa aking sariling kalooban,--ang 
											isinagot ni Don Filipo na yumukod ng 
											kaunti;--datapuwa't hindi binibigyang 
											pahintulot ako ng aking maliit na 
											kapangyarihang makialam sa mga bagay 
											na nauukol sa religion. Ang mga 
											nag-iibig mangilag na kanyang 
											makapanayam ay huwag makipagsalitaan 
											sa kanya: hindi naman namimilit si 
											ginoong Ibarra kanino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't isang pagbibigay puang sa 
											panganib, at kung sino ang umiibig 
											sa panganib ay sa panganib 
											namamatay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala akong nakikitang ano mang 
											panganib, padre: ang ginoong Alkalde 
											at ang Kapitan Heneral, na aking mga 
											punong matataas, kapwa nakipag-usap 
											sa kanya sa&nbsp; buong&nbsp; hapong ito, at 
											hindi nga ako ang sa kanila'y 
											magpapakilalang masama ang kanilang 
											ginawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung hindi mo siya palalayasin 
											dito'y kami aalis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Daramdamin kong totoo, datapuwa't 
											hindi ako makapagpapalayas dito sa 
											kanino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagsisi ang kura sa sinabi, nguni't 
											wala ng magawa. Humudyat sa kanyang 
											kasama, na nagtindig na masama ang 
											loob, at kapwa sila umalis. Ginagad 
											sila ng mga taong kanilang kakampi, 
											bagaman inirapan muna nila ng&nbsp; 
											buong&nbsp; pagtatanim si Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napuspos ang ugong ng mga 
											bulungbulungan at salisalitaan: ng 
											magkagayo'y nangagsilapit at 
											nangagsibati sa binatang si Ibarra 
											ang ilang mga tao, at sinabi sa 
											kanya:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasainyo kami; huag po ninyong 
											pansinin ang mga iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinong mga 'iyan'?--ang itinanong na 
											nagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyang mga nagsialis at ng 
											mapangilagan ang makapanayam po 
											ninyo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ng mapangilagan ang aking 
											pakikipanayam? ang aking 
											pakikipanayam?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo! anila'y exkomulgado raw po 
											kayo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa pagtataka ni Ibarra'y hindi 
											naalaman kung ano ang sasabihin, at 
											lumingap sa kanyang paligid. Kanyang 
											nakita si Maria Clara na tinatakpan 
											ang mukha ng kanyang abaniko.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't ito baga'y dapat kayang 
											mangyari?--ang sa kawakasa'y biglang 
											sinabi ng malakas;--kasalukuyan bang 
											na sa unang panahon tayo ng 
											kadiliman? Sa makatuwid baga'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At lumapit sa mga dalaga, at binago 
											ang anyo ng pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagpaumanhinan ninyo 
											ako,--anya,--nakalilimot akong mayroon 
											palang sa aki'y naghihintay na aking 
											katipan; magbabalik ako at ng kayo'y 
											aking masamahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang umalis!--ang sa kanya'y 
											sinabi ni Sinang;--sasayaw si Yeyeng 
											sa 'La Calandria'; totoong 
											kalugodlugod sumayaw!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi maaari, kaibigan ko, 
											datapuwa't ako'y babalik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lalong lumala ang mga 
											bulungbulungan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang lumalabas si Yeyeng na 
											nakasuot 'khula' at sinasabi ang 'Da 
											uste su permiso?' ('Ipinagkakaloob 
											po ba ninyo ang inyong pahintulot?') 
											at sinasagot siya ni Carvajal ng 
											'Pase uste adelante' ('Tumuloy po 
											kayo') at iba pa, nangagsilapit ang 
											dalawang sundalo ng guwardiya sibil 
											kay Don Filipo at hinihinging ihinto 
											ang pagpapalabas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At bakit?--ang tanong ni Don 
											Filipo 
											na nagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--sapagkat nagsuntukan ang alperes 
											at ang ginoong babae ay hindi sila 
											makatulog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sabihin po ninyo sa alperes, na 
											binigyan kami ng kapahintulutan ng 
											Alkalde Mayor, at&nbsp;'wala sino man' sa 
											bayang may kapangyarihan 
											sumalangsang sa kapahintulutang ito, 
											kahi't ang gobernadorcillo man, na 
											siyang tangi kong mataas na puno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Talastasin ninyong kinakailangang 
											itigil ang palabas!--ang inulit ng 
											mga sundalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinalikdan sila ni Don Filipo. 
											Nangagsialis ang mga guwardiya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sinabi kanino man ni Don 
											Filipo ang nangyaring ito at ng 
											huwag magulo ang katahimikan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng matapos na ang bahaging iyon ng 
											zarzuela na totoong pinagpurihanan, 
											lumabas naman ang Prinkipe Villardo, 
											at hinahamon ng away ang lahat ng 
											mga morong pumipiit sa kanyang ama; 
											pinagbabalaan sila ng bayaning 
											puputlan silang lahat ng ulo, at ang 
											mga ulong ito'y ipadadala sa buwan. 
											Sa kagalingang palad ng mga moro, na 
											nangagsisipaghanda na sa labanang 
											tinutugtugan ng 'himno de Riego', ay 
											siyang pagkakaroon ng isang gulo. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Biglang nagsihinto ng pagtugtog ang 
											mga bumubuo ng orquesta at kanilang 
											linusob ang teatro, pagkatapos 
											maipaghagisan ang kanilang mga 
											instrumento. Ang matapang na si 
											Villardo, na hindi inaakalang 
											mangagsisirating ang mga taong 
											iyong, kanyang ipinalagay na kakampi 
											ng mga moro, inihagis naman ang 
											kanyang espada at eskudo at saka 
											bumigay ng takbo; nang makita ng mga 
											morong tumatakas ang kakilakilabot 
											na kristianong iyon, hindi sila 
											nag-alinlangang siya'y kanilang 
											gagarin: may nariringig na mga 
											sigawan, mga daing, tungayawan, mga 
											salitang kapusungan, nagtatakbuhan 
											ang mga tao, nangamatay ang mga 
											ilaw, ipinaghahagisan sa impapawid 
											ang mga vaso ng ilaw, at iba pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											--mga 
											tulisan! mga tulisan!--ang sigaw ng 
											mga iba.--Sunog! sunog! mga 
											magnanakaw!--ang sigawan naman ng mga 
											iba; nangagsisitangis ang mga 
											babae't ang mga musmos, gumugulong 
											sa lupa ang mga banko at ang mga 
											nanonood, sa gitna ng ligalig, 
											pagkakaingay at kaguluhan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ano ang nangyari?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ilinagad ng dalawang guwardiya sibil 
											na may tangang pamalo ang mga musiko 
											at ng pahintuin ang pinalalabas; 
											sila'y narakip, bagaman 
											nagsisilaban, ng teniente mayor, na 
											kasama ang kaniyang mga 
											kuadrillerong ang dalang sandata'y 
											ang kanilang mga lumang sable.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inyong ihatid sila sa tribunal!--ang 
											sigaw ni Don Filipo,--kayo ang 
											bahala pagka sila'y nakawala!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bumalik na si Ibarra at kanyang 
											hinanap si Maria Clara. 
											Nangagsikapit sa kanya ang natatakot 
											na mga dalagang pawang nangangatal 
											at nangamumutla; dinarasal ni tia 
											Isabel ang mga letania sa wikang 
											latin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng pagbalikang loob ng kaunti ang 
											mga tao sa pagkagulat, at ng 
											kanilang matalastas kung ano ang 
											nangyari, nag-alab ang galit sa 
											lahat ng mga dibdib. Umulan ang mga 
											bato sa pulutong ng mga 
											kuadrillerong naghahatid sa dalawang 
											guwardiya sibil; may isang nagyayakag 
											na silabin ang kuartel at iihaw roon 
											si Do&ntilde;a Consolaciong kasama ang 
											alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa ganyan lamang sila 
											pinakikinabangan!--ang sigaw ng isang 
											babaeng naglililis ng kanyang mangas 
											at iniunat ang kanyang mga 
											bisig;--panggugulo ng bayan! Wala 
											silang nalalamang pag-usigin kung di 
											ang mababait na mga tao! Nariyan ang 
											mga tulisan at ang mga magsusugal! 
											Sunugin natin ang kuartel!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hinihipo ng isa ang kanyang bisig at 
											humihing ng konfesion; kahabaghabag 
											na mga taghoy ang lumalabas sa 
											ilalim ng mga bangkong nangatumba: 
											yao'y isang kaawaawang musiko. 
											Punongpuno ang eskenario ng mga 
											artista at ng mga taong bayan. 
											Nariyan si Chananay, na nakasuot ng 
											Leonor sa Trovador, na 
											nakikipagsalitaan ng wikang tinda 
											kay Ratia, na nakasuot maestro ng 
											eskuela; si Yeyeng na nakabalot ng 
											malaking panyong sutla na na sa tabi 
											ng prinkipe Villardo; pinagpipilitan 
											ni Balbino't ng mga morong aliwin 
											ang mga musikong may mga nasaktan at 
											hindi. Nagpapakabikabila ang ilang 
											mga kastila at pinagsasabihan ang 
											bawa't kanilang nasasalubong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't may nagkakabilog ng isang 
											pulutong. Napag-unawa ni Don Filipo 
											ang kanilang adhika at kanyang 
											tinakbo upang sansalain.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag sana ninyong sirain ang 
											katahimikan!--ang isinisigaw ni Don 
											Filipo;--hihingi tayo bukas ng 
											karapatang tumbas sa kaguluhang 
											kanilang ginawa, bibigyan tayo ng 
											nauukol sa ating katuwiran; 
											nananagot ako sa inyong bibigyan 
											tayo ng nauukol sa ating katuwiran!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi!--ang isinasagot ng ilan; 
											gayon din ang ginawa sa Calamba (ng 
											1879), gayon din ang ipinangako, 
											datapuwa't walang ano mang ginawa 
											ang Alkalde! Ibig naming gumawa ng 
											pagka hustisya sa aming kamay! Tayo 
											na sa kuartel!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nawalang kabuluhan ang mga 
											pakikiusap ng teniente mayor; 
											nagpapatuloy ang pulutong sa 
											kanilang panukala. Lumingap si Don 
											Filipo sa kanyang paligid at 
											humahanap ng sa kanya'y tumulong ay 
											kanyang nakita si Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Ibarra, para na ninyong 
											awa! Sila'y inyong sansalain, 
											samanatalang humaharap ako ng mga 
											kuadrillero!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang aking magagawa?--ang 
											itinanong ng binata, na natitigagal, 
											datapuwa't malayo na ang teniente 
											mayor.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Ibarra naman ang naglingap-lingap 
											sa kanyang paligid, at naghahanap 
											siya ng hindi nalalaman kung sino. 
											Sa kagalingang palad ay anaki'y 
											kanyang nasuliapan si Elias, na 
											walang bahalang pinanonood ang 
											gayong kilusan. Tinakbo siya ni 
											Ibarra, hinawakan siya sa bisig at 
											sinabi sa kanya sa wikang kastila:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Alang-alang sa Diyos! gumawa po 
											kayo ng bahagya, sakali't may 
											magagawa; wala po akong magawang ano 
											man!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tila mandin siya'y nawatasan ng 
											piloto, sapagkat nawala siya't 
											sinuot ang mga bumubuo ng pulutong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naringig ang masilakbong 
											pagmamatuwiran, mabilis na tutulan; 
											pagkatapos ay untiunting nagpasimula 
											ng paghihiwahiwalay ng mga 
											magkakapulutong, at naalis sa bawa't 
											isa ang anyong may gagawing 
											kaguluhan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At panahon na nga, sapagkat 
											lumalabas na ang mga sundalong may 
											dalang mga sandata at nakalagay sa 
											dulo ng fusil ang bayoneta.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y ano ang ginagawa ng 
											kura?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi pa nahihiga si Padre Salvi. 
											Nakatindig siya, nakatuon ang noo sa 
											mga 'persiana', sa dakong plaza ang 
											tanaw, hindi kumikilos, at 
											manakanakang pinatatakas niya ang 
											pinipigil na buntong hininga. Kung 
											hindi sana napakadilim ang liwanag 
											ng kanyang ilaw, marahil 
											napagmasdang napupuno ng mga luha 
											ang kanyang mga mata. Gayon ang 
											kaniyang naging anyo sa isang horas 
											halos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinukaw siya sa ganitong kalagayan 
											ng pagkakagulo sa plaza. Sinundan ng 
											kanyang mga matang nanggigilalas ang 
											walang tuos na pagpaparoo't parito 
											ng mga tao, at ang mga tinig nila'y 
											dumarating sa kanyang hagawhaw na 
											lamang.--Isa sa mga alilang dumating 
											ang sa kanya'y nagbigay alam ng 
											nangyayari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumaan sa kanyang panimdim ang isang 
											isipin. Sa gitna ng mga kaingayan at 
											kaguluhan, sinasamantala ng mga may 
											mahahalay na budhi ang pagkagulat at 
											kahinaan ng loob ng mga babae; 
											nangasisisitikas at nangagliligtas 
											sa sarili, sino ma'y walang 
											nakakaalaala sa kangino man, hindi 
											nariringig ang sigaw, hinihimatay 
											ang mga babae, nangagkakasagian, 
											nangasusungaba; dahil sa pagkagulat 
											at pagkatakot ay hindi pinakikinggan 
											ang hibik ng kapurihang nalulugso, 
											at sa kalagitnaan ng gabi ... at 
											pagka nagkakaibigan! Tila mandin 
											nakikinikinita niyang kalong ni 
											Crisostomo si Maria Clarang hindi 
											nakamamalay-tao, at sila'y nangawala 
											sa kadiliman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumuluksong nanaog sa mga hagdanan, 
											walang sombrero, walang baston at 
											parang sira ang isip na tinungo ang 
											plaza.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nasumpungan niya roon ang mga 
											kastilang pinagwiwikaan ang mga 
											sundalo, kanyang tiningnan ang mga 
											upuang kinalalagyan ni Maria Clara 
											at ng kanyang mga kaibigan, at 
											nakita niyang wala na sila roon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Padre Cura! padre Cura!--ang sigawan 
											sa kanya ng mga kastila; nguni't 
											hindi niya pinansin sila. Doo'y 
											nakahinga siya: nakita niya sa 
											manipis na tabing na naroon ang 
											isang anino, ang karapatdapat 
											sambahing anino, ang puspos ng 
											biyaya at kalugodlugod na 
											pangangatawan ni Maria Clara, at ang 
											sa kanyang tia na may dalang mga 
											taza at mga kopa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magaling na lamang!--ang kanyang 
											ibinulong,--tila mandin walang 
											nangyari kung di ang pagkakasakit 
											lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinarhan ni tia Isabel, pagkatapos 
											ang mga kapis ng bintana, at hindi 
											na napakita ang kaibig-ibig na 
											anino.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumayo sa lugar na iyon ang kura, na 
											di man lamang nakikita ang karamihan. 
											Nalaladlad sa harap ng kanyang mga 
											mata ang kagandagandahang 
											pangangatawan ng isang dalaga, na 
											tumutulog at humihinga ng 
											katamistamisan; naliliman ang bubong 
											ng mga mata ng mahahabang pilikmata, 
											na ang kalantikan ay tulad sa mga 
											pilikmata ng mga Birhen ni Rafael; 
											ngumingiti ang maliit na bibig; 
											nalalarawan sa boo ng pagmumukhang 
											yaon ang pagka Birhen,&nbsp;ang 
											kalinisang wagas, ang pagka walang 
											malay kasalanan; ang pagmumukhang 
											iyo'y isang lubhang matimyas na 
											panaginip sa gitna ng maputing damit 
											ng kanyang higaan, wangis sa isang 
											ulo ng querubin sa gitna ng mga 
											alapaap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpatuloy ng pagkakita ang panimdim 
											ni Padre Salvi ng iba't iba pang mga 
											bagay ...; nguni't sino ang 
											makapaglilipat sa papel ng lahat ng 
											mapapanimdim ng isang nag-aalab na 
											budhi?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahil ay ang Corresponsal ng 
											periodiko, na winakasan ang 
											pagsaysay ng piyesta at ng lahat ng 
											mga nangyari sa ganitong paraan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Makalilibong salamat, walang 
											hangang salamat sa sumapanahon at 
											masikap na pamamag-itan ng totoong 
											kagalanggalang na si Padre fray 
											Bernardo Salvi, na hindi kinatakutan 
											ang lahat ng panganib, sa gitna ng 
											bayang iyong nagngingitngit ng galit, 
											sa gitna ng karamihang wala ng 
											pinagpipitaganan; walang baston, 
											walang sombero'y pinayapa niya ang 
											mga galit ng karamihan, na walang 
											ibang ginamit liban na lamang sa 
											kanyang mapanghikayat na pananalita, 
											at ang kadakilaan at kapangyarihang 
											kailan ma'y hindi nagkukulang sa 
											sacerdote ng isang Religion ng 
											Capayapaan. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Linisan ng banal na 
											religioso ang mga katamisan ng 
											pagkahimbing, na tinatamasa ng lahat 
											ng magandang diwa na gaya ng kanyang 
											taglay, upang mailagang mangyari ang 
											isang munting kasakunaan sa kanyang 
											mga oveja. Hindi nga marahil 
											kalilimutan ng mga mamamayan sa San 
											Diego ang ganitong lubhang magaling 
											na ginawa niya at magpakailan ma'y 
											kikilanlin sa kanyang utang na loob!'</font></p>
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