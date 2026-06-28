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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXX. Sa Simbahan</font></b></p>
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
											Mula sa isa hanggang sa kabilang 
											dulo'y puno ang kamalig na 
											ipinalalaga'y ng mga taong yao'y 
											bahay ng Lumalang sa lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtutulakan, nagsisiksikan, 
											nangagdudurugan ang isa't isa, at 
											nangagdaraingan ang ilang lumalabas 
											at ang maraming nagsisipasok. Malayo 
											pa'y iniuunat na ang kamay sa 
											pagbabasa ng mga daliri ng tubig na 
											bendita, nguni't kaginsaginsa'y 
											dumarating ang isang alon ng 
											pagtutulakan at napapalayo ang kamay: 
											Nariringig pagka nagkakagayon ang 
											isang angil, nagmumura ang isang 
											babaeng nayapakan, datapuwa't hindi 
											tumitigil ang pagtutulakan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											ilang matandang lalaking naisasawsaw 
											ang mga daliri sa tubig na iyong 
											kulay pusali na, palibhasa'y 
											naghugas ng kamay roon ang&nbsp; buong&nbsp; 
											bayan, bukod pa sa mga taga-ibang 
											bayang doo'y dumarayo, ipinapahid 
											ang tubig na iyon ng&nbsp; buong&nbsp; 
											pamimintakasi, bagaman sila'y 
											nahihirapan dahil sa kasikpan, sa 
											kanilang batok, sa puyo, sa noo, sa 
											ilong, sa baba, sa dibdib at sa 
											pusod, sa kanilang pananalig na sa 
											gayo'y kanilang nabebendita ang mga 
											bahaging iyon ng katawan, bukod sa 
											hindi sila magkakasakit ng paninigas 
											ng liig, ng sakit ng ulo, ng 
											pagkatuyo, ng hindi pagkatunaw ng 
											kinakain. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang mga kabataan, marahil 
											sa sila'y hindi totoong masasaktin o 
											baka kaya naman hindi sila 
											naniniwala sa mahal na gamot na iyon, 
											bahagya na nilang binabasa ang 
											kaduloduluhan ng kanilang daliri--at 
											ng walang ano mang masabi sa kanila 
											ang mga mapamintakasing tao,--at 
											kunuwa'y kanilang ipinapahid sa 
											kanilang noo, na, ang katotohana'y 
											hindi nila isinasayad. 'Marahil 
											nga'y bendita ang tubig na iyan at 
											taglay ang lahat ng mga sinasabi',--ang 
											iniisip marahil ng sino mang dalaga,--'nguni't 
											may isang kulay na' ...!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bahagya na makahinga roon, mainit at 
											amoy hayop na dalawa ang paa; 
											datapuwa't katumbas ng laha't ng 
											pagkakahirap na iyon ang 
											magsesermong as sermong yao'y 
											dalawang daa't limampung piso ang 
											bayad ng bayan. Ito ang sinabi ng 
											matandang Tasio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dalawang daa't limampung piso ang 
											bayad sa isang sermon! Isa lamang 
											tao at sa minsan lamang na paggawa! 
											Ang ikatlong bahagi ng ibinabayad sa 
											mga komediante na mangagpapagal sa 
											loob ng tatlong gabi!... Tunay nga 
											marahil na kayo'y mayayaman!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At bakit naman mawawangis ang bagay 
											na iyan sa isang komedia?--ang 
											isinagot na masama ang loob ng 
											mapusok na maestro ng mga Hermano ng 
											V.O.T.; nakahuhulog ng mga kaluluwa 
											sa infierno ang komedia, at 
											nakapapasalangit ang sermon! Kung 
											humingi siya ng sanglibo'y babayaran 
											din namin, at kikilalanin pa naming 
											utang na loob ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kahi ma't komedia, kung sa ganang 
											akin!--ang isinisigaw naman sa galit 
											ng isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naniniwala ako, palibhasa'y 
											magaling na totoo ang inyong pagka 
											unawa sa kinauukulan ng komedia at 
											ng sermon!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At yumao ang pusong, na hindi 
											inalumana ang ginagawa ng 
											magagaliting maestro na mga paglait 
											at masasamang hulang mangyayari sa 
											daratning buhay ni matandang Tasio 
											sa hinaharap na panahon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang hinihintay ang Alkalde, 
											nagpapawis at naghihikab ang mga 
											tao; iginagalaw sa hangin ang mga 
											paypay, mga sombrero at mga panyo; 
											nangagsisigawan at nangag-iiyakan 
											ang mga bata, bagay nagbibigay pagal 
											sa mga sakristan na pagpapalabas sa 
											mga batang iyon sa simbahan. Ang 
											gawang ito'y siyang umaakit sa 
											pagdidilidili ng matalas na kaisipan 
											at malumanay na maestro ng Cofradia 
											ng Santisimo Rosario:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Pabayaan ninyong lumapit sa akin 
											ang mga bata,' anang ating 
											Panginoong Jesukristo, nguni't 
											dito'y dapat ng unawaing yao'y ukol 
											lamang 'sa mga batang hindi 
											umiiyak.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ganito ang sinasabi ng isa sa mga 
											matatandang babaeng nananamit ng 
											gingon, si Hermana Pute baga, sa 
											isang babaeng may anim na taon na 
											ang gulang na kanyang apo, na 
											nakaluhod sa kanyang tabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Condenada! itahimik mo ang iyong 
											isip, at makaririnig ka ng isang 
											sermong gaya ng sa Viernes Santo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At saka pinakakurotkurot, na ano 
											pa't pinukaw ang kabanalan ng batang 
											babae, na ikinibit ang mukha, 
											pinahaba ang nguso at pinapagkunot 
											ang mga kilay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humihimlay ang ilang mga lalaking 
											nakapaningkayad sa tabi ng mga 
											konfesionario. Ang akala ng ating 
											matandang babaeng nagngungunguya ng 
											mga dasal at pinatatakbo sa kanyang 
											mga daliri ang mga butil ng kanyang 
											kuintas, na ang ginagawang pagtango 
											ng isang matandang lalaking malaki 
											ang pag-aantok, ay talagang gayon 
											ang lalong magaling na pagsang-ayon 
											sa mga kalooban ng Langit, kaya't 
											ang ginawa niya'y untitunti niyang 
											ginagad ang gayong anyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Na sa isang sulok si Ibarra; 
											nakaluhod si Maria Clara sa malapit 
											sa altar mayor, sa isang lugar na 
											nagmagandang loob ang kurang paalsan 
											ng mga tao sa pamamag-itan ng mga 
											sakristan. Nakaupo si Kapitan 
											Tiagong nakasuot ng frak sa isa sa 
											mga bangkong laan sa mga pinuno, 
											dahil sa bagay na ito'y ang isip ng 
											mga insik na sa kanya'y hindi 
											nakakikilala'y gobernadorcillo rin 
											siya kaya't hindi nangangahas na sa 
											kanya'y lumapit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y dumating ang Alkalde 
											na kasama ang kanyang Estado Mayor, 
											(ang mga ginoong sa kanya'y 
											umaakbay), doon sa sakristia sila 
											nagmula at siya'y lumuklok sa isa sa 
											mga maiinam na mga sillong 
											nakapatong sa ibabaw ng isang 
											alfombra. Pangdakila ang kasuutan ng 
											Alkalde at sa kanya'y nakalagay ang 
											banda ni Carlos III&nbsp;at apat o limang 
											mga kondekoracion (mga sagisag na 
											inilalagay sa dibdib, tanda ng sa 
											nagdadala'y pagbibigay unlak ng 
											isang hari o ng kataastaasang puno 
											sa isang nacion.)</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi siya nakikilala ng bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba!--ang biglang sinabi ng isang 
											tagabukid; isang sibil na nakasuot 
											komediante!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tanga!--ang isinagot ng kanyang 
											kalapit at siya'y siniko;--iyan ang 
											prinkipe Villardo na ating nakita 
											kagabi sa teatro!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumaas nga ang kalagayan ng Alkalde 
											sa mga mata ng bayan at siya'y 
											ipinalagay na enkantadong prinkipe, 
											na nakapanalo sa mga gigante.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpasimula ang misa. Nagsitidindig 
											ang mga nauupo, ang mga natutulog ay 
											nangagising dahil sa kakakampanilla 
											at sa matunog na boses ng mga 
											kantor. Tila totoong natutuwa si 
											Padre Salvi, bagaman siya'y may 
											mukhang walang kaibigan, sapagkat 
											sa kanya'y naglilingkod na diakono 
											at subdiakono ang dalawa pa namang 
											agustino.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Bawa't isa'y nagkanta, ng dumating 
											ang ukol na panahon, bagaman humigit 
											kumulang na nagdaraan sa ilong ang 
											kanilang boses at malabo ang 
											pangungusap, liban na lamang sa 
											nagmimisa na may pagka nanginginig 
											ang boses at hindi mamakailang 
											nasira ang tono, na ano pa't malaki 
											ang ipinagtataka ng mga taong sa 
											kanya'y nakakikilala. </font></font>
											<font face="Arial" color="#333333">
											Gayon ma'y 
											gumagalaw siya ng makinig na anyo at 
											hindi nag-aang-ang; ikinakanta ang 
											'Dominus vobiseum' ng taimtim sa 
											loob, ikinikiling ng kaunti ang ulo 
											at tumitingala sa 'boveda,' 
											(bubungan ng simbahan). </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa pagmamasid ng pagtanggap niya ng aso 
											ng insenso, masasabing totoo nga 
											ang sabi ni Galeno, na naniniwalang 
											pumapasok daw ang usok sa bao ng 
											ulo, pagkaraan sa butas ng ilong na 
											ang tuloy ay sa salaang but-o, 
											sapagkat siya'y lumilindig, 
											iniiling-ay ang ulo sa likod, 
											pagkatapos ay lumalakad na patungo 
											sa gitna ng altar ng lubhang 
											malaking pagmamakisig at kagilasan, 
											hanggang sa akalain ni Kapitan 
											Tiagong daig niya sa kagalingang 
											kumiya ang komedianteng insik ng 
											gabing nagdaang nakadamit emperador, 
											may pinta ang mukha may maliliit na 
											bandera sa likod, ang balbas ay 
											buntot ng kabayo at makapal ang 
											'suklas' ng sapin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi nga mapag-alinlanganan, higit 
											ang kamahalang umanyo ng isang kura 
											namin kay sa lahat ng mga emperador.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y dumating ang 
											pinakananasang sandali na marinig, 
											na si Padre Damaso. Nangagsiupo sa 
											kanilang mga sillon ang tatlong 
											sacerdote, na ang anyo'y 
											nakapag-bibigay uliran sa 
											kahinhinan, ayon sa sasabihin 
											marahil ng may malinis na kaloobang 
											'korresponsal;' tinularan sila ng 
											Alkalde at iba pang mga taong may 
											vara at may baston; huminto ang 
											musika:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pamukaw ang paghaliling iyon ng 
											katahimikan sa ugong sa ating 
											matandang Hermana Pule, na humihilik 
											na, salamat sa musika. Tulad kay 
											Segismundo o gaya ng 'kokinero' sa 
											kinathang buhay ni Dornroskheu, ang 
											unang ginawa pagkagising ay tuktukan 
											ang kanyang apong babae, na 
											nakatulog din. Ito'y umatungal, 
											datapuwa't pagdaka'y nalibang ng 
											makitang nagdaragok sa dibdib ang 
											isang babae sa lubos na pananalig at 
											sa kaalaban ng loob.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinagsikapan ng lahat na 
											maipakaginhawa ng anyo; naningkayad 
											ang mga walang bangko, umupo sa lupa 
											o sa kanilang sariling paa ang mga 
											babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinahak ang karamihan ni Padre 
											Damaso, na pinangungunahan ng 
											dalawang sakristan at sinusundan ng 
											isang kapwa niya prayleng may dalang 
											isang malaking kuaderno. Nawala siya 
											pagpanhik sa hagdanang palikawlikaw, 
											nguni't pagdaka'y muling sumipot ang 
											kanyang mabilog na ulo, pagkatapos 
											ay ang kanyang makakapal na batok at 
											sumunod agad-agad ang kanyang 
											katawan. Tumingin sa magkabikabila 
											ng&nbsp; buong&nbsp; kapanatagan ng loob at 
											uubo-ubo; nakita niya si Ibarra. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ipinahiwatig niya sa isang tanging 
											kirap, na hindi kalilimutan sa 
											kanyang mga pananalangin ang 
											kasintahan ni Maria Clara; tinitigan 
											ng tinging may towa si Padre Sibyla 
											at saka niya sinulyap ng tinging 
											kalakip ang pagpapawalang halaga si 
											Padre Manuel Marsing kahapo'y 
											nagsermon. ng matapos ang ganitong 
											pagsisiyasat; liningon ang kasama ng 
											paalimis at sa kanya'y sinabi: 
											'Magpakatalino, kapatid!--Binuksan 
											nito ang kuaderno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't karapatdapat na isaysay 
											sa isang bahaging bukod ang sermong 
											ito. Isang binatang nag aaral ng 
											panahong iyon ng taquigrafia at 
											malaking totoo ang pagkalugod sa mga 
											dakilang mananalumpati ang siyang 
											umalalay ng pagtititik samantalang 
											nagsasaysay si Padre Damaso; at 
											salamat sa ganitong ginawa'y 
											mailalagda namin dito ang isang 
											bahagi ng pangangaral tungkol sa 
											religion sa mga lupaing iyon.</font></p>
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