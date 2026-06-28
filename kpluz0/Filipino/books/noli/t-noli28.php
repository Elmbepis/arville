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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXVIII. Mga Sulat</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 14pt">&nbsp;</font></p>
											<div class="quote" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial">
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														<i>
														<span style="font-size: 13pt">
														Ang bawa't tao'y 
														nagsasaysay</span></i></font><span style="font-size: 13pt"></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														<i>ayon sa kinasasapitan</i></font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														</span>
														<font face="Arial" color="#333333">
														<i>
														<span style="font-size: 13pt">
														sa piyestang 
														pinaroroonan.</span></i></font></div>
												</div>
											</div>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sapagkat walang ano mang 
											mahalagang nangyayari sa mga taong 
											sinasaysay natin ang buhay na 
											pinagdaanan, sa gabi ng sinusundang 
											araw ng piyesta at gayon din sa 
											kinabukasan, magalak na lalaktawan 
											namin ang araw na ito ng pagsasaya, 
											kung di lamang inaakala naming baka 
											sakali hangaring maalaman ng sino 
											mang bumabasang taga ibang lupain 
											kung paano ang ginagawa ng mga 
											filipino sa kanilang mga 
											pagpipiyesta. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa ganitong 
											kadahilana'y sisipiin naming hindi 
											daragdaga't hindi babawasan ang 
											ilang mga sulat, na ang isa sa 
											kanila'y ang sa 'korresponsal' ng 
											isang pamahayagang matimtiman at 
											tinatangi sa Maynila, na 
											kagalanggalang dahil sa kanyang 
											kataasan at kahigpitang manalita. 
											Ang mga bumabasa sa amin ang siya ng 
											bahalang magpuno sa ilang maliliit 
											at kalakarang mga kaukulan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Narito ang sulat ng karapatdapat na 
											'korresponsal' ng mahal na 
											pamahayagan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">'Ginoong 
											Namamatnugot....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Tangi kong kaibigan: kailan ma'y 
											hindi pa ako nakapapanood, at 
											inaakala kong hindi na ako 
											makapapanod pa sa mga lalawigan ng 
											isang piyestang tungkol sa religiong 
											totoong dakila, maningning at 
											nakababagbag ng loob, na gaya ng 
											pagsasayang ginagawa sa bayang ito 
											ng mga totoong kagalanggalang at mga 
											banal na mga paring Franciskano.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Pagkaramirami ng dumalo: nagtamo 
											ako rito ng ligayang bumati sa halos 
											lahat ng mga kastilang tumitira sa 
											lalawigang ito, sa tatlong 
											kagalanggalang na mga Padreng 
											Agustino na na sa lalawigang 
											Batangan, sa dalawang kagalanggalang 
											na mga Padreng Dominiko, na ang isa 
											sa kanila'y ang totoong 
											kagalanggalang na si Padre Fray 
											Hernando de la Sibyla, nasa kanyang 
											pagparito'y kanyang pinaunlakan ang 
											bayang ito, bagay na hindi dapat 
											kalimutan magpakailan man ng mga 
											karapatdapat na mga tagarito. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nakita 
											ko rin naman ang lubhang maraming 
											mga kaginoohang taga lalawigang 
											Tanguay, Capangpangan, ang maraming 
											mayayamang mga taga Maynila at 
											maraming mga banda ng musika, at ang 
											isa sa kanila'y ang lubhang mainam 
											na banda sa Pagsanghan, pag-aari ng 
											ginoong Eskribanong si ginoong 
											Miguel Guevara at ang karamihang mga 
											insik at mga indio, na taglay ng mga 
											insik ang kanilang talagang dating 
											kaugaliang pagka maibiging makakita 
											ng iba't ibang bagay, at ng mga 
											indio ang kanilang asal na 
											mapamintakasi, hinihintay nila ng 
											maalab na pagmimithi ang pagdating 
											ng araw na ipagsasaya ang dakilang 
											piyesta, upang kanilang mapanood ang 
											palalabasing 
											'komiko-mimiko-liriko-koreografiko-dramatiko,' 
											at ng magawa ang bagay na ito'y 
											sila'y nagtayo ng isang malaki at 
											maluang na tablado sa gitna ng 
											plaza.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'ng ikasiyam na oras ng gabi ng araw 
											na ikasampu nitong buwan, araw na 
											sinusundan ng piyesta, pagkatapos ng 
											isang masarap at saganang hapunang 
											inihandog sa amin ng Hermano Mayor, 
											tinakhan naming lahat na mga 
											kastila't mga prayleng na sa 
											kumbento, ang kaaliw-aliw na tugtog 
											ng musikang may kasabay na 
											nagsisiksikang karamihang tao at ng 
											ugong ng mga kohete at malalaking 
											bomba, at pinamamatnugutan ng mga 
											ginoo ng bayan, ang tinutungo'y ang 
											kumbento upang kami'y sunduin at 
											ihatid sa lugar na nahahanda at 
											iniuukol sa amin at ng doo'y 
											panoorin namin ang katuwaang 
											palalabasin.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Napilitan kaming pahinunod sa 
											gayong magandang anyaya, bagaman 
											lalo sanang minamagaling ko pa ang 
											magpahingalay sa mga bisig ni 
											Morfeo, at pagkalooban ng 
											masanghayang pagpahingalay ang aking 
											nananakit na mga laman at buto, 
											salamat sa nilundaglundag ng 
											lulanang sa ami'y ipinagkaloob ng 
											Gobernadorkilio sa bayan ng B.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Nanaog nga kami at aming hinanap 
											ang aming mga kasamang humahapon 
											bahay na pag-aari rito ng 
											mapamintakasi at mayamang si don 
											Santiago de los Santos. Ang totoong 
											kagalanggalang na si Padre Fray 
											Bernardo Salvi na kura nitong bayan, 
											at ang totoong kagalanggalang na si 
											Padre Fray Damaso Verdolagas, na sa 
											tanging biyaya ng Cataastaasan ay 
											magaling na sa dinaramdam na sa 
											kanya'y ginawa ng kamay na pusong, 
											na ang kasama'y ang totoong 
											kagalanggalang na si Padre Fray 
											Hernando de la Sibyla at ang banal 
											na kura sa Tanawan at iba pang mga 
											kastila, ang siyang mga panauhin ng 
											mayamang filipino. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Diya'y nagtamo 
											kaming kapalarang panggilalasan, 
											hindi lamang ang lubhang 
											mahahalagang kasangkapan at 
											kagalingang magpamuti ng may-ari ng 
											bagay, bagay na hindi karaniwan sa 
											mga taong tubo rito, kung di naman 
											ang kamahalmahalan, kagandagandahan 
											at mayamang dalagang magmamana, na 
											nagpakilalang siya'y tunay at ganap 
											na alagad ni Santa Cekilia sa 
											pagtugtog ng lalong kaayaayang 
											musikang likha ng mga aleman at ng 
											mga italiano, sa kanyang mainam na 
											piano, na ano pa't ang kanyang 
											kagalingang tumugtog ay nagpaalaala 
											sa akin sa babaeng si Galvez. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sayang 
											at napakatimtiman naman ang gayong 
											lubos sa kagalingang binibini, at 
											inililihim ang kanyang mga karapatan 
											sa madlang kaginoohang pawang 
											pagpupuri lamang ang sa kanya'y 
											handog. Hindi ko dapat iwan sa 
											tintero, na sa bahay ng nag-anyaya'y 
											pinainom kami ng khampa&ntilde;a at 
											masasarap na mga likor ng&nbsp; buong&nbsp; 
											kasaganaan at kagandahang loob na 
											siyang kaugaliang hindi nagbabago ng 
											kilalang mamumuhunan.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Pinanood namin ang palabas. Kilala 
											na po ninyo ang ating mga artistang 
											si na Ratia, Carvajal at Fernandez; 
											kami lamang ang nakaunawa ng 
											kanilang karikitang lumabas, 
											sapagkat ang mga taong walang 
											pinag-arala'y walang napagtanto 
											kahi't babahagya. Magaling ang 
											pagkakalabas ni Chananay at ni 
											Balbino, bagaman may kaunting 
											pamamaos nila: isang pagkantang 
											hidwa ng kaunti sa musika ang ginawa 
											ni Balbino, datapuwa't katakataka 
											ang kabooan at ang kanilang 
											pagpupumilit sa mabuting pagganap. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Lubhang naibigan ng mga indio at 
											lalong-lalo na ng gobernadorcillo 
											ang komediang tagalog: nagpakita ng 
											malaking katuwaan ang 
											gobernadorcillo at sinasabi sa aming 
											sayang daw at hindi pinapakipag-away 
											ang prinsesa sa gigante na sa 
											kanya'y umagaw, bagay na sa kanyang 
											balak ay lalo sanang kagilagilalas, 
											at higit pa, kung hindi mangyaring 
											talban ang gigante kung di sa pusod 
											lamang, na gaya baga ng isang 
											nagngangalang Ferragus, ayon sa 
											nababasa sa kasaysayan ng buhay ng 
											Doke Pares. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nakikisang-ayon sa akala 
											ng gobernadorcillo ang totoong 
											kagalanggalang na si Padre Fray 
											Damaso, taglay iyang kagandahan ng 
											pusong siyang ikinatatangi niya, at 
											ang idinagdag pa'y kung sakali't 
											magkagayon daw, ang prinsesa na ang 
											hahanap ng paraan at ng kanyang 
											masunduan ang pusod ng gigante upang 
											sa gayo'y kanyang mapatay.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Hindi ko po kinakailangang sabihin 
											sa inyong samantalang ginagawa ang 
											pagpapalabas ay di itinulot ng 
											Rothskhild na filipinong magkulang 
											ng ano man sa kagandahan ng kanyang 
											loob: ang mga sorbete, mga limonada 
											gaseosa, mga refresko, mga matamis, 
											mga alak at iba't iba pa'y saganang 
											ipinamamahagi sa aming lahat na 
											nangaroon. Ininong totoo, at na sa 
											katuwiran nga ang gayong pag-ino, 
											ang pagkawala roon ng kilala at 
											marunong na binatang si don Juan 
											Crisostomo Ibarra, na ayon sa talos 
											na ninyo, ay dapat na siyang mangulo 
											bukas sa pagbebendicion ng unang 
											bato na nauukol sa dakilang 
											'monumento' na kanyang ipinatatayo 
											sa udyok ng malaking nais na 
											makagawa ng magaling. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											karapatdapat na kalahing ito ng mga 
											Pelayo at ng mga Elkano, (sapagkat 
											ayon sa napagtanto ko'y tubo sa 
											ating bayani at uring mahal na mga 
											lalawigan sa dakong Timugan ng 
											Espa&ntilde;a ang isa sa kanyang mga nuno 
											sa ama, na marahil ay isa sa mga 
											unang kinasama ni Magallanes o ni 
											Legaspi) ay hindi rin napakita sa 
											mga nalalabing oras ng araw, dahil 
											sa kaunting sakit na kanyang 
											dinaramdam. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nagpapalipatlipat sa mga 
											bibig ang kanyang pangalang 
											ipinangungusap lamang upang purihin, 
											mga pagpupuring hindi mangyayaring 
											di mauuwi sa ikararangal ng Espa&ntilde;a 
											at ng tunay na mga kastilang gaya na 
											nga natin, na kailan ma'y hindi 
											natin pinasisinungalingan kailan man 
											ang ating dugo, kahit 
											magpakaramirami ang mga maging 
											kahalo.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Napanood namin ngayong ikalabing 
											isa ng buwan, sa dakong umaga, ang 
											isang nangyaring lubhang 
											nakababagbag ng loob. Hayag nga at 
											talastas ng lahat na sa araw na 
											ito'y kapiyestahan ng Birhen de la 
											Paz (Birhen ng Capayapaan), at ito'y 
											ipinagsasaya ng mga Hermano 
											(kapatid) ng Santisimo Rosario Bukas 
											ang kapiyestahan ng Pintakasing si 
											San Diego, at sa piyestang iya'y 
											lubhang nakikitulong ang mga Hermano 
											ng V.O.T. (Venerable Orden Terkera. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kagalang-galang na Pangatlong 
											Hanay). May isang malaking 
											pagpapataasang banal ang dalawang 
											Kapisanang ito sa paglilingkod sa 
											Diyos, at dumarating ang ganitong 
											gawang kabanalan hanggang sa 
											panggalingan ng santong 
											pagkakasamaan ng loob nila, gaya na 
											nga nitong huling nangyari dahil sa 
											pakikipagtalo sa salitaan ng 
											dakilang taga pagsermong 
											kinikilalang talagang balita, na 
											hindi iba't ang di mamakailang aking 
											binanggit, na totoong kagalanggalang 
											na si Padre Fray Damaso, na siyang 
											lalagay bukas sa sadyang likmuan ng 
											Espiritu Santo, at ayon sa maakala 
											ng lahat ay hindi malilimutang 
											paunlakan ng religion at ng 
											literatura.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Alinsunod nga sa aming sinasaysay, 
											napanood namin ang isang nangyaring 
											lubhang nakapagtuturo at 
											nakababagabag ng loob. Lumabas sa 
											sakrista ang anim na mga bata pang 
											mga 'religioso' (prayle), ang tatlo 
											sa kanila'y upang mangagmisa at ang 
											tatlo ng mag-'akolito', nanikluhod 
											sila sa harap ng altar, at kinanta 
											ng 'kelebrante' (ang magmimisa) na 
											ito nga'y ang totoong kagalanggalang 
											na si Padre Fray Hernando Sibyla, 
											ang 'Surge Domme', na siyang dapat 
											maging pasimula ng prokesion sa 
											paligid ng simbahan, taglay yaong 
											mainam na boses at&nbsp;anyong mataimtin 
											na sa kanya'y kinikilala ng lahat at 
											siyang lubos na ipinagiging dapat 
											niya sa panggigilalas ng madla. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pagka tapos ng 'Surge Domine', 
											pinasimulan ang prokesion ng 
											gobernadorcillo, na nakafrak, dala 
											ang 'gion' at may kasunod na apat na 
											sakristang may hawak na mga 
											insensario. Sumusunod sa kanilang 
											likuran ang mga kirial na pilak, ang 
											kaginoohan ng bayan, ang 
											mahahalagang mga larawang nasusuutan 
											ng sutlang raso at ginto ni na Santo 
											Domingo at San Diego, at ng Birhen 
											de la Paz na may isang 
											karikitdikitang balabal (manto) na 
											asul at may mga plankhang pilak na 
											dinorado, handog ng banal na 
											kapitang paradong si don Santiago de 
											los Santos, na totoong karapatdapat 
											uliranin at hindi kasiya ang siya'y 
											ibantog magpakailan man. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nalululan 
											ang lahat ng mga larawang ito sa mga 
											karrong pilak. Sumusunod kaming mga 
											kastila at ang ibang mga religioso 
											sa likuran ng Ina ng Diyos: 
											tinatangkililk ng isang paliong dala 
											ng mga kabeza de barangay ang 
											'ofikiante' at ang wakas ng 
											prokesio'y ang may mabuting 
											karapatang kapisanan ng Guwardiya 
											Sibil. Inaakala kong hindi na 
											kailangang sabihing karamihang mga 
											'indio' ang siyang bumubuo ng 
											dalawang hanay ng prokesion, na 
											pawang may tangang kandilang may 
											ningas at taglay ang&nbsp; buong&nbsp; 
											pamimintakasi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tumutugtog ang musika 
											ng mga markha religiosa; ulit-ulit 
											na putok ang siyang ginagawa ng mga 
											bomba at ng mga apoy na rueda. 
											Nakapanggigilalas ang panonood ng 
											kahinhinan at ningas ng loob na 
											iniuudiok sa puso ng mga 
											nanampalataya sa kanilang wagas at 
											malaking pananalig sa Birhen de la 
											Paz ang pagdiriwang na lubos at 
											marubdob na pamimintakasing ginagawa 
											nating nagtamo ng palad na ipanganak 
											sa lilim ng kasantasantahan at 
											walang bahid na dungis na bandera ng 
											Espa&ntilde;a sa ganitong mga 
											kapiyestahan.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang matapos ang prokesio'y 
											pinasimulan ang misa, na sinasaliwan 
											ng orquesta at ng mga artista ng 
											teatro. ng matapos na ang 
											Evangelio'y pumanhik sa pulpito ang 
											totoong kagalanggalang na si Padre 
											Fray Manuel Martin, agustinong 
											nanggaling sa lalawigang Batangan, 
											na pinagtakhan ng mga nakikinig na 
											pawang nangabitin sa kanyang 
											pananalita, lalonglalo na ang mga 
											kastila, sa pagpapasimula ng 
											pangangaral ng wikang kastila, na 
											sinaysay ng&nbsp; buong&nbsp; kabayanihan sa 
											mga pananalitang magagaang ang 
											pagkakataglay, at totoong angkap na 
											ankap, na ano pa't pinupuspos ang 
											aming mga puso ng mataimtim na 
											pamimintakasi at pag-aalab. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											ganitong pangungusap nga ang siyang 
											marapat ilagda sa dinaramdam, o 
											ating dinaramdam pagka nauukol ang 
											sinasaysay sa Birhen o sa ating 
											sinisintang Espa&ntilde;a, at lalonglalo na 
											pagka naisasal-it sa sinasabi, 
											yamang mangyayari naman sa bagay na 
											ito, ang mga kaisipan ng isang 
											prinkipe ng Iglesia, na si 'se&ntilde;or 
											Monescillo,' na mapapagtitibay na 
											siyang dinaramdam ng lahat ng mga 
											kastila.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'ng matapos ang misa'y pumanhik 
											kaming lahat sa kumbento, na kasama 
											ng mga kaginoohan sa bayan at iba 
											pang mahahalagang mga tao, at doo'y 
											hinandugan sila ng&nbsp; buong&nbsp; 
											kagandahan ng loob, pagpipitagan at 
											kasaganaang siyang kinaugalian ng 
											totoong kagalanggalang na si Padre 
											Fray Salvi, na inalayan nila ng mga 
											tabako at mga pagkaing inihanda ng 
											Hermano Mayor sa silong ng Convento 
											na handa sa lahat ng mga 
											nagkakailangang patahimikin ang mga 
											pangangailangan ng sikmura.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Walang naging kakulangang ano man 
											sa loob ng maghapon upang bigyang 
											kasiyahan ang piyesta at ng upang 
											manatili ang masayang kaasalan ng 
											mga kastila, na sa mga gayong 
											kapanahuna'y hindi mangyaring 
											mapigilan, na ipinakikilala, kung 
											minsa'y sa mga 'kancion' o mga 
											sayaw, at kung minsa'y sa mga walang 
											kahulugan at masayang mga 
											paglilibang, palibhasa'y may mga 
											pusong mahal at malakas, na ano pa't 
											hindi nakararaig sa kanila ang mga 
											pighati, at sukat na ang magkapisan 
											ang tatlong kastila sa alin mang 
											lugar, upang doo'y tumakas ang 
											kalungkutan at sama ng loob. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pinag-alayan nga sa maraming bahay 
											si Terpsikore datapuwa't lalonglalo 
											na sa marilag na kayamanyamanang 
											filipino na pinagpigingan sa amin sa 
											pagkain. Hindi ko na kinakailangang 
											sabihin po sa inyong lubhang 
											masagana at masarap ang mga 
											ipinakain sa piging na iyon, na 
											masasabing pangalawa na ng mga 
											piging sa kasalan sa Cana o kay 
											Camacho, na pinagbuti at dinagdaran 
											pa mandin. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Samantalang nagtatamasa 
											kami ng mga kaligayahan ng pagkaing 
											pinamamatnubayan ng isang tagaluto 
											ng 'La Campana,' tumutugtog naman 
											ang orquesta ng mga kawiliwiling 
											tinig. Taglay ng kagandagandahang 
											dalaga sa bahay, ang isang kasuutang 
											mestiza, at isang wari'y agos ng mga 
											brillante, at siya nga, ayon sa 
											pinagkaratihan na, ang reina ng 
											piyesta. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dinamdam naming lahat na 
											dahil sa isang hindi naman malubhang 
											pagkapatapilok ng kanyang magandang 
											paa'y hindi siya nangyaring nagkamit 
											ng mga ligaya sa pagsasayaw, 
											sapagkat kung ayon sa aming 
											nahiwatigang siya'y ganap sa 
											kagalingang gumawa ng ano man, ang 
											ginoong binibining de los Santos, 
											kung sumayaw marahil ay katulad ng 
											isang 'silfide'.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Dumating ng hapong ito ang Alkalde 
											ng lalawigan, upang bigyan ng 
											kadakilaan sa kanyang pagharap ang 
											gagawing 'keremonia' bukas. Dinamdam 
											niya ang pagsama ng damdam ng hirang 
											na mamumuhunang si ginoong Ibarra, 
											na salamat sa Diyos, at ayon sa 
											sabihana'y magaling na.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Nagkaroon ng gabing ito ng mainam 
											na prokesion, datapuwa't sasabihin 
											ko na ang bagay na ito sa aking 
											sulat bukas, sapagkat bukod sa mga 
											malalaking bombang sa aki'y 
											nakatulig at halos nakabingi, ako'y 
											totoong pagod at nahahapay na ako sa 
											pag-aantok. Samantalang binabawi ko 
											ang lakas sa mga bisig ni Morfeo, sa 
											makatuwid baga'y sa katre ng 
											kumbento, hinahangad ko, tangi kong 
											kaibigang kayo'y matamo ng magandang 
											gabi at hanggang bukas, isang araw 
											na dakila.'</font></p>
											<div class="blockquot" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial">
												<p align="justify" style="margin-left: 80px; margin-right: 80px">
												<font face="Arial" color="#333333">
												<span style="font-size: 13pt">
												'Ang mairugin ninyong katotong 
												nakikirama'y.</span></font><span style="font-size: 13pt"></p>
												<p class="sign" align="justify" style="margin-left: 80px; margin-right: 80px">
												<font face="Arial" color="#333333">
												'Ang Corresponsal.</font></p>
												<p class="noind" align="justify" style="margin-left: 80px; margin-right: 80px">
												</span>
												<font face="Arial" color="#333333">
												<span style="font-size: 13pt">
												San Diego, 11 ng Noviembre.'</span></font></div>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ito ang isinulat ng mabait na 
											korresponsal. Tingnan naman natin 
											ngayon kung ano ang isinulat ni 
											kapitang Martin sa kanyang katotong 
											si Luis Chiquito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Minamahal kong Choy: Magmadali kang 
											pumarini, kung mangyayari; sapagkat 
											ang piyesta'y totoong masaya; sukat 
											ang matanto mong halos natumba ang 
											bangka ni kapitang Joaquin: 
											makaitlong pinagulong ni Kapitan 
											Tiago ang kanyang taya, at sa 
											tatlong iyo'y tumama, at pinto ng 
											pintong palagi, kaya't sa gayong 
											nangyari lalong nangliliit sa 
											katuwaan si kabezang Manuel na may 
											ari ng bahay. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Binasag ni Padre 
											Damaso, sa isang dagok, ang isang 
											ilawan, sapagkat hangga ngayo'y 
											hindi pa siya tumatama miminsan man 
											lamang. Natalo ang Consul sa kanyang 
											mga sasabungin, at natalo sa bangka 
											ang lahat ng pinanalunan sa atin sa 
											piyesta ng Binyang at sa piyesta ng 
											Pilar, sa Santa Cruz.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Inaasahan naming isasama rito sa 
											amin ni Kapitan Tiago ang kanyang 
											mamanugangin, ang mayamang nagmana 
											kay Don Rafael, datapuwa't wari'y 
											ibig manding tumulad sa kanyang ama, 
											sapagkat hindi man lamang napakita 
											Sayang! Sa masid ko'y hindi siya 
											pakikinabangan kailan man.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Malaking totoong kayamanan ang 
											nakikita ng insik na si Carlos sa 
											'liampo'; naghihinala akong may 
											taglay siyang ano mang lihim, isang 
											bato-balani marahil: walang tigil 
											ang kanyang pagdaing ng sakit ng 
											ulo, na may taling panyo pagka 
											tumitigil na ng untiunti ang umiikit 
											na sangkap ng 'liampo,' 
											pagkakagayo'y tumutungo siya ng 
											mainam hanggang sa halos mapabunggo 
											na sa kanyang noo, na anaki'y ibig 
											na totoong hiwatigan ang pag-inog na 
											iyon. Nagkukulang tiwala ako, dahil 
											sa may nalalaman akong mga kawangis 
											ng bagay na iyong ginagawa.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Paalam, Choy; magaling ang 
											kalagayan ng aking mga sasabungin, 
											at ang aking asawa'y masaya at 
											naglilibang.'</font></p>
											<p class="ind" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											'Ang iyong katotoo.</font></p>
											<p class="sign" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Martin Aristorenas.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumanggap naman si Ibarra ng isang 
											maliit na liham na may pabango, na 
											ibinigay sa kanya ng gabi ng unang 
											araw ng piyesta ni Andeng, na 
											kapatid sa suso ni Maria Clara. 
											Ganito ang sabi ng liham:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'Crisostomo: Mahigit ng isang araw 
											na hindi ka napakikita; nahigingan 
											kong may kaunting dinaramdam ikaw, 
											kata'y ipinagdasal at ipinagsindi 
											kata ng dalawang malalaking kandila, 
											bagaman sinasabi ng tatay na hindi 
											raw mabigat naman ang sakit mo. 
											Totoong niyamot nila ako kagabi at 
											ngayon; pinatutugtog nila ako ng 
											piano at kanila akong inaanyayahang 
											sumayaw. Hindi ko nalalamang lubhang 
											marami sa ibabaw ng lupa ang mga 
											nakapagbibigay yamot. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Kung hindi 
											lamang kay Padre Damaso na 
											pinagpipilitang ako'y libangin sa 
											pagsasaysay ng maraming bagay, ako 
											sana'y magkukulong sa aking silid 
											upang matulog. Isulat mo sa akin 
											kung ano ang dinaramdam mo, sapagkat sasabihin ko sa tatay na 
											ikaw ay dalawin. Samantala'y 
											inutusan kong pumaryan sa iyo si 
											Andeng, at ng ipagluto ka ng kha; 
											magaling siyang magluto at marahil 
											ay daig ang iyong mga alila.'</font></p>
											<p class="sign" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">'<span class="smcap">Maria 
											Clara</span>.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">'Pahabol. 
											Pagka hindi ka naparini bukas, hindi 
											ako paparoon sa keremonia. Calakip.'</font></p>
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
											&nbsp; &nbsp;&nbsp;&nbsp;<font face="Arial" style="font-size: 13pt">											
											
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