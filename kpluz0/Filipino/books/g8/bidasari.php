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
										Bidasari<br>
										</font>
										<font face="Arial" size="5" color="#990000">
										(Epikong Mindanao)</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											Ang kaharian ng Kembayat ay 
											naliligalig dahil sa isang 
											dambuhalang ibon. Ang ibong ito ay 
											mapaminsala sa mga pananim at maging 
											sa buhay ng tao. Ang ibong ito ay 
											ang ibong garuda. Kapag dumarating 
											na ang garuda, mabilis na 
											nagtatakbuhan ang mga tao upang 
											magtago sa mga yungib. Takot na 
											takot sila sa ibong garuda pagka't 
											ito'y kumakain ng tao.<br>
											<br>
											Sa pagtatakbuhan ng mga tao, 
											nagkahiwalay sa pagtakbo ang sultan 
											at sultana ng Kembayat. Ang sultana 
											ng Kembayat ay nagdadalantao noon. 
											Sa laki ng takot ay naisilang niya 
											ang sanggol na babae sa may tabi ng 
											ilog. Dahil sa malaking takot at 
											pagkalito naiwan niya ang sanggol sa 
											bangka sa ilog.<br>
											<br>
											May nakapulot naman ng sanggol. Siya 
											ay si Diyuhara, isang mangangalakal 
											mula sa kabilang kaharian. Kanyang 
											pinagyaman at iniuwi sa bahay ang 
											sanggol. Itinuring niya itong anak. 
											Pinangalanan nila ang sanggol ng 
											Bisari. Habang lumalaki si Bidasari 
											ay lalo pang gumaganda. Maligaya si 
											Bidasari sa piling ng kanyang 
											nakikilalang magulang.<br>
											<br>
											Sa kaharian ng Indrapura, ang 
											sultang Mongindra ay dalawang taon 
											pa lamang kasal kay Lila Sari. 
											Mapanibughuin si Lila Sari. 
											Natatakot siyang umibig pa sa ibang 
											babae ang sultan. Kaya lagi niyang 
											itinatanong sa sultan, kung siya'y 
											mahal nito na sasagutin naman ng 
											sultan ng : mahal na mahal ka sa 
											akin. Hindi pa rin nasisiyahan ang 
											magandang asawa ng sultan. Kaniyang 
											itinanong na minsan sa sultan: Hindi 
											mo kaya ako malimutan kung may 
											makita kang higit na maganda kaysa 
											akin? Ang naging tugon ng Sultan ay: 
											Kung higit na maganda pa sa iyo, 
											ngunit ikaw ang pinakamaganda sa 
											lahat. Nag-alala ang sultana na baka 
											may lalo pang maganda sa kanya at 
											ito ay makita ng sultan. Kaya't 
											karakarakang inutusan niya ang 
											matapat niyang mga kabig na 
											saliksikin anh kaharian upang 
											malaman kung may babaeng higit na 
											maganda sa sultana.<br>
											<br>
											Nakita ng mga tauhan ni Lila Sari si 
											Bidasari at siya ay higit na maganda 
											kaysa kay Lila Sari.<br>
											<br>
											Inanyayahan ng Sultana si Bidasari 
											sa palasyo upang diumano ay gagawing 
											dama ng sultana. Ngunit pagsapit 
											doon, si Bidasari ay lihim na 
											ikinulong ni Lila Sari sa isang 
											silid at doon pinarurusahan.<br>
											<br>
											Nang hindi na matiis ni Bidasari ang 
											mga pagpaparusa sa kanya, sinabi 
											niyang kunin ang isdang ginto sa 
											halamanan ng kanyang ama. Kapag araw 
											ito'y ipinakukuwintas kay Lila Sari 
											at sa gabi'y ibinabalik sa tubig at 
											hindi maglalaon si Bidasari ay 
											mamamatay. Pumayag si Lila Sari. 
											Kinuha niya ang isdang ginto at 
											pinauwi na niya si Bidasari.<br>
											<br>
											Isinuot nga ni Lila Sari ang 
											kuwintas ng gintong isda sa araw at 
											ibinabalik sa tubig kung gabi. 
											Kaya't si Bidasari ay nakaburol kung 
											araw at muling nabubuhay sa gabi. 
											Nag-alala si Diyuhara na baka 
											tuluyang patayin si Bidasari. Kaya 
											nagpagawa siya ng isang magandang 
											palasyo sa gubat at doon niya 
											itinira nang mag-isa si Bidasari.<br>
											<br>
											Isang araw, ang Sultan Mongindra ay 
											nangaso sa gubat. Nakita niya ang 
											isang magandang palasyo. Ito'y 
											nakapinid. Pinilit niyang buksan ang 
											pinto. Pinasok niya ang mga silid. 
											Nakita niya ang isang napakagandang 
											babae na natutulog. Ito ay si 
											Bidasari. Hindi niya magising si 
											Bidasari. Umuwi si Sultan Mongindra 
											na hindi nakausap si Bidasari. 
											Bumalik ang sultan kinabukasan. 
											Naghintay siya hanggang gabi. 
											Kinagabihan nabuhay si Bidasari. 
											Nakausap siya ni Sultan Mongindra. 
											Ipinagtapat si Bidasari ang mga 
											ginawa ni Lila Sari. Galit na galit 
											ang sultan. Iniwan niya si Lila Sari 
											sa palasyo at agad niyang 
											pinakasalan si Bidasari. Si Bidasari 
											na ang naging reyna.<br>
											<br>
											Samantala, pagkaraan ng maraming 
											taon ang tunay na mga magulang ni 
											Bidasari ay matahimik nang 
											naninirahang muli sa Kembayat. 
											Nagkaroon pa sila ng isang supling. 
											Ito'y si Sinapati. Nang pumunta sa 
											Kembayat ang isang anak ni Diyuhara 
											ay nakita niya si Sinapati, anak ng 
											sultan at sultana ng Kembayat.<br>
											<br>
											Si Sinapati ay kamukhang-kamukha si 
											Bidasari. Kinaibigan nito si 
											Sinapati at ibinalita ang kapatid 
											niyang si Bidasari sa 
											kamukhang-kamukha ni Sinapati. 
											Itinanong ni Sinipati sa mga 
											magulang kung wala siyang kapatid na 
											nawawalay sa kanila. Pinasama ng ama 
											si Sinapati sa Indrapura. Nang 
											magkita si Bidasari at si Sinapati 
											ay kapwa sila nangilalas dahil sa 
											silang dalawa ay 
											magkamukhang-magkamukha. Natunton ng 
											Sultan ng Kembayat ang nawawala 
											niyang anak na si Bidasari. Nalaman 
											ng sultan ng Indrapura na ang 
											kanyang pinakasalang si Bidasari ay 
											isa palang tunay na prinsesa.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											&nbsp;</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											&nbsp;</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="left">
											<font color="#333333">
											<font face="Arial" style="font-size: 12pt">
											Source</font><font face="Arial">: https://www.kapitbisig.com/philippines/tagalog-version-of-epics-mga-epiko-bidasari-epikong-mindanao_606.html/page/0/1</font></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	&nbsp;</p>
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