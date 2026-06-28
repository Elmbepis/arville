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
										Ang Kuba ng Notre Dame</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">
											<font color="#333333">
											Kilalang-kilala sa katedral si 
											Quasimodo. Hinatulan siya ng mga tao 
											na walang kapantay ang kapangitan, 
											idagdag pa na siya ay isang kuba. 
											Ikinasasaya ng mga tao taon-taon sa 
											Notre Dame ang Pagdiriwang ng 
											Kahangalan. Ito ay pagpuprusisyon sa 
											isang tao na nahatulan nila. 
											Kukutyain at ipaparada siya sa mga 
											piling lugar sa Paris.<br>
											<br>
											Taong 1482, ang kubang si Quasimodo 
											ang napili bilang 'papa ng 
											kahangalan ng Notre Dame.' Napakaraming tao ang pumunta sa 
											kasiyahang ito kaya naman malaki ang 
											panghihinayang ni Pierre Gringoire, 
											isang makata at pilosopo dahil hindi 
											siya<br>
											<br>
											nagtagumpay na kunin ang atensyon ng 
											mga tao dahil abala sila sa panonood 
											ng parada ng kahangalan.<br>
											<br>
											Habang isinasagawa ang panunuya kay 
											Quasimodo, dumating ang isang pari 
											na si Claude Frollo, ang umampon kay 
											Quasimodo, at ipinatigil ang itigil 
											kahangalang nagyayari. Pagkatapos, 
											inutusan niyang bumalik sa Notre 
											Dame ang kuba.<br>
											<br>
											Noong naghahanap ng makakain si 
											Gringoire, nasilayan niya ang 
											kagandahan ni La Esmeralda, isang 
											dalagang mananayaw. Nabighain siya 
											rito kaya naman nagpasiya si 
											Gringoire na sundan ang dalaga sa 
											pag-uwi.<br>
											<br>
											Habang binabagtas ni La Esmeralda 
											ang daan, laking gulat niya nang 
											sinunggaban siya ng dalawang lalaki 
											na sina Quasimodo at Frollo. Agad 
											namang tinulungan ni Gringoire ang 
											dalaga subalit hindi niya nakaya ang 
											lakas ni Quasimodo kaya nawalan siya 
											ng malay. Dagli namang nakatakas si 
											Frollo. Dumating ang ilang alagad ng 
											hari sa pangunguna ni Phoebus, ang 
											kapitan ng mga tagapagtanggol ng 
											kaharian.<br>
											<br>
											Nahuli nila si Quasimodo. Samantala, 
											hatinggabi na nang pagpasiyahan ng 
											pangkat ng mga pulubi at magnanakaw 
											na bitayin si Gringoire dahil sa 
											pag-aakalang kasabwat ito ni 
											Quasimodo. Lumapit si La Esmeralda 
											sa pinuno ng pangkat at 
											nagmungkahing huwag nang ituloy ang 
											pagbitay. Handang magpakasal si La 
											Esmeralda sa pinuno mailigtas lamang 
											ang buhay ni Gringoire sa kamatayan.<br>
											<br>
											Nang sumunod na araw, si Quasimodo 
											ay nilitis at pinarusahan sa tapat 
											ng palasyo sa pamamagitan ng 
											paglatigo sa kaniyang katawan. Hindi 
											matawaran ang tindi ng sakit sa 
											bawat palong inilalaan sa kaniyang 
											katawan. Ang lahat ng iyon ay 
											kagustuhan at ayon sa kautusan ni 
											Frollo na kailanman ay hindi niya 
											nagawang tutulan dahil sa utang na 
											loob.<br>
											<br>
											Kasabay ng sakit ng katawan at 
											matinding kirot na kaniyang 
											naramdaman ay ang panghuhusga at 
											panghahamak sa kaniya ng mga taong 
											naroroon. Nagmakaawa siya na bigyan 
											siya ng tubig subalit tila walang 
											naririnig ang mga taong nakatingin 
											sa kaniya.<br>
											<br>
											Gusto lamang nila ay lapastanganin 
											at pagtawanan ang kaniyang 
											kahabag-habag na katayuan. Laking 
											pasasalamat ni Quasimodo sapagkat 
											dumating si La Esmeralda. Lumapit 
											ang dalaga sa kaniya na may hawak na 
											isang basong tubig at pinainom siya 
											nito.<br>
											<br>
											Lumipas ang ilang buwan, habang si 
											La Esmeralda ay sumasayaw sa tapat 
											ng Notre Dame at pinagkakaguluhan ng 
											maraming tao, napagawi ang mga mata 
											ni Phoebus sa mapang-akit na 
											kagandahan ng dalaga gayundin si La 
											Esmeralda sa kaniya. Sumikdo ang 
											kaniyang puso dahil inanyayahan siya 
											ng binata na magkita sila pagsapit 
											ng gabi upang lubos na magkakilala. 
											Lahat ng ito ay nakita ni Frollo 
											kaya naman, nakaramdam siya ng 
											matinding galit sa nasasaksihan. 
											Matindi ang pagnanasa niya kay La 
											Esmeralda kaya napagdesisyunan 
											niyang talikuran ang Panginoon at 
											pag-aralan ang itim na mahika. Nais 
											niyang mabihag ang dalaga at itago 
											sa kaniyang selda sa Notre Dame.<br>
											<br>
											Sumapit na ang hatinggabi, oras na 
											upang magkita sina La Esmeralda at 
											Phoebus. Sinundan at minatyagan ni 
											Frollo ang dalawa. Habang masayang 
											nag-uusap ang bagong magkakilala ay 
											biglang may nag-unday ng saksak kay 
											Phoebus ngunit mabilis ding naglaho 
											ang maysala. Sa pagkakataong ito, 
											hinuli ng mga alagad si La Esmeralda 
											sa pag-aakalang siya ang may 
											kagagawan sa pagpatay kay Phoebus.<br>
											<br>
											Pinahirapan ang dalaga sa paglilitis 
											at sapilitang pinaako ang kasalanang 
											hindi naman niya tunay na ginawa. 
											Siya ay nasintensiyahang bitayin sa 
											harap ng palasyo. Agad namang 
											dinalaw ni Frollo si La Esmeralda sa 
											piitan at ipinagtapat ang pag-ibig 
											sa kaniya. Tumanggi siya sa lahat ng 
											inialok ni Frollo.<br>
											<br>
											Iniharap si La Esmeralda sa maraming 
											tao sa tapat ng Notre Dame upang 
											kutyain bago siya bitayin. Ilang 
											sandali pa ay dumating si Quasimodo 
											galing sa tuktok ng Notre Dame 
											patungo kay La Esmeralda gamit ang 
											tali upag iligtas ang babae. Hinila 
											niya paitaas ang dalaga patungo sa 
											Katedral at tumatangis na isinigaw 
											ang katagang 'Santuwaryo'. Matagal 
											na niyang pinagplanuhan kung paano 
											itatakas si La Esmeralda sa naging 
											kalagayan ng dalaga dahil napaibig 
											na siya ng dalaga simula pa noong 
											binigyan siya nito ng inumin. 
											Bagaman mahirap para kay La 
											Esmeralda na titigan ang pangit na 
											anyo ni Quasimodo, naging 
											magkaibigan din ang dalawa.<br>
											<br>
											Lumusob sa katedral ang pangkat ng 
											mga taong palaboy at magnanakaw na 
											kinikilalang pamilya ni La 
											Esmeralda. Naroon sila upang sagipin 
											ang dalaga sapagkat narinig nila na 
											nagbaba ng kautusan ang parlamento 
											na paaalisin si La Esmeralda sa 
											katedral. Samantala, inakala naman 
											ni Quasimodo na papatayin ng mga 
											lumusob si La Esmeralda kaya gumawa 
											siya ng paraan upang muling iligtas 
											ang dalaga.<br>
											<br>
											Sinamantala naman ni Frollo ang 
											kaguluhan upang makalapit kay La 
											Esmeralda. Pinapili niya ang dalaga 
											kung magapapakasal siya rito o 
											itutuloy ang pagbitay sa kaniya. Mas 
											pinili ni La Esmeralda ang mabitay 
											kaysa mahalin ang isang hangal na 
											tulad ni Frollo.<br>
											<br>
											Nang mabatid ni Quasimodo na 
											nawawala si La Esmeralda, tinunton 
											niya ang tuktok ng tore at doon 
											hinanap ang dalaga. Nanghina siya sa 
											nakita dahil wala na itong buhay 
											nang makita niya ang dalaga. Labis 
											na galit ang nararamdaman niya kay 
											Frollo na noon pa man ay batid niya 
											na may matinding pagnanasa sa dalaga.<br>
											<br>
											Hindi malaman ni Quasimodo ang 
											gagawin. Nang mamataan niya si 
											Frollo, hinila niya ito at sa 
											matinding galit na nadarama, 
											inihulog niya ito mula sa tore. 
											Pinatay niya ang paring kumupkop sa 
											kaniya.<br>
											<br>
											Habang nakatitig sa walang buhay na 
											katawan ng minamahal na babae, 
											napasigaw si Quasimodo, 'Walang ibang babae akong minahal.' Mula 
											noon, hindi na muling nakita pa si 
											Quasimodo.<br>
											<br>
											Maraming taon na ang nakalipas, 
											natagpuan ng isang lalaki ang puntod 
											ni La Esmeralda at hindi niya 
											akalain ang nasaksihan. Ang kalansay 
											ng isang kuba ay nakayakap sa 
											katawan ng isang babae.</font><br>
											&nbsp;&nbsp;
											<br>
											&nbsp;&nbsp;
											<br>
											<br>
											</span>
											<font size="3" color="#333333">Source:&nbsp;https://pinoyfavor.blogspot.com/2020/12/ang-kwento-ng-kuba-ng-notre-dame-sa.html</font></font></p>
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