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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XV. Ang mga Sakristan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bahagya na ang patlang ng dagundong ng mga 
kulog, at pinangungunahan bawa't kulog 
ng kakilakilabot na namimilipit na lintik: masasabing isinusulat ng Diyos ang kanyang pangalan sa pamamag-itan 
ng isang sunog at ang walang hanggang bubong ng langit ay nanginginig sa 
takot. Ang ula'y parang ibinubuhos, at sapagkat hinahampas ng hanging 
humahaging ng lubhang malungkot, bawa't sandali'y nagbabago ng tinutungo. 
</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ipinaririnig ng mga kampana, ng boses na taglay ang malaking lagim, ang 
kanilang mapanglaw na hibik, at sa sandasandaling inihihimpil ng 
nangagbabangis na mga kulog ang kanilang matunog na atungal, isang malungkot 
na tugtog ng kampana, na daing ang katulad, ang siyang humahagulgol.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nangasaikalawang saray ng kampanario ang 
dalawang batang nakita nating kausap ng pilosopo. Ang pinakabata sa kanila, na 
may malalaking matang maitim at matatakuting mukha, pinipilit na idigkit niya 
ang kanyang katawan sa katawan ng kanyang kapatid, na totoong nakakawangis 
niya ang pagmumukha, at ang kaibhan lamang ay malalim tumingin at may 
pagkaanyong matapang. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang pananamit ng dalawa'y dukhang-dukha at puspos ng mga sursi at tagpi. Nanga-uupo sa 
kapirasong kahoy at kapwa may tangang 
isang lubid na ang dulo'y na sa ikatlong saray, doon sa itaas, sa gitna ng kadiliman. Ang ulang itinutulak ng hangin ay dumarating hanggang sa 
kanila at 
pinapamimisik ang isang upos ng kandilang nag-aalab sa ibabaw ng isang 
malaking bato na kanilang pinagugulong sa koro, upang huwaran ang ugong ng kulog, 
kung Viernes Santo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Batakin mo ang 
iyong lubid, Crispin!--anang kapatid na matanda sa bata niyang kapatid.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-alambitin sa lubid si Crispin, at 
narinig sa itaas ang isang daing na mahina, na pagdaka'y natakpan ng isang 
kulog, na ang ugong ay pinarami ng libolibong alingawngaw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah! kung na sa 
bahay sana tayong kasama ng nanay!--ang ibinuntong hininga ng maliit na tinitingnan ang kanyang kapatid;--doo'y hindi ako matatakot.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi sumagot ang matandang kapatid; 
minamasdan kung paano ang pagtulo ng pagkit at tila mandin may pinag-iisip.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Doo'y wala sino 
mang nagsasabi sa aking ako'y nagnanakaw!--ang idinugtong ni Crispin;--hindi itutulot ng nanay! 
Kung maalaman niyang ako'y pinapalo....!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Inihiwalay ng matandang kapatid ang 
kanyang mga mata sa ningas ng ilaw, tumingala, pinang-gigilan ng kagat 
ang malaking lubid at bago biglang binaltak, at ng magkagayo'y naringig ang 
matunog na tugtog ng kampana.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mananatili ba tayo sa ganitong 
pamumuhay, kaka?--ang ipinatuloy ni Crispin. Ibig ko sanang magkasakit ako bukas 
sa bahay, ibig kong magkasakit ako ng malaon at ng ako'y alagaan ng nanay at 
huwag na akong pabalikin uli sa kumbento! Sa ganito'y hindi ako panganganlang 
magnanakaw at walang hahampas sa akin! At ikaw man, kaka, ang mabuti'y 
magkasakit kang kasama ko.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag!--ang sagot ng matandang kapatid;--mamamatay tayong lahat: mamamatay sa pighati ang nanay at 
kata'y 
mamamatay ng gutom.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi na sumagot uli si Crispin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gaano ba ang sasahurin mo sa buwang 
ito?--ang tanong ni Crispin ng makaraan ang sandali.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Dalawang piso: tatlong multa ang 
ipinarusa sa akin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bayaran mo na ang 
sinasabi nilang ninakaw ko, at ng huwag tayong tawaging mga magnanakaw; bayaran 
mo na, kaka!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nauulol ka ba, Crispin? Walang makakain 
ang nanay; ang sabi ng sakristan mayor ay nagnakaw ka raw ng dalawang onza, at 
ang dalawang onza ay tatlumpu't dalawang piso.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bumilang ang maliit sa kanyang mga daliri 
hanggang sa dumating sa tatlumpu't dalawa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Anim na kamay at dalawang daliri! At 
bawa't daliri ay piso--ang ibinulong na nag-iisip-iisip.--At bawa't piso ... ilang 
kuarta?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang daan at anim na po.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang daa't anim na pong kuarta? 
Makasandaan at anim na pong isang kuarta? Naku! At gaano ang isang daa't anim 
na po?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tatlumpu at dalawang 
kamay--ang sagot ng matandang kapatid.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sandaling pinagmasdan ni Crispin ang 
maliliit niyang kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Tatlumpu at dalawang kamay!--ang inuulit 
ulit--anim na kamay at dalawang daliri, at bawa't daliri ay 
											tatlumpu at dalawang kamay ... at bawa't daliri ay isang kuarta ...Naku gaano karaming 
kuarta niyan! Hindi mabibilang ng isa sa loob ng tatlong araw ...at 
makabibili ng sinelas na ukol sa mga paa at sombrerong ukol sa ulo, pagka 
umiinit ang araw, at isang malaking payong pagka umuulan, at pagkain, at mga 
damit na ukol sa iyo at sa nanay at....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nag-isip-isip si Crispin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--ngayo'y dinaramdam 
ko ang hindi ko pagnanakaw!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Crispin!--ang 
ipinagwika sa kanya ng kanyang kapatid!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag kang magalit! Sinabi ng kurang 
papatayin daw ako ng palo pag hindi sumipot ang salapi; kung ninakaw ko nga 
sana ang salaping iyo'y aking maisisipot ...at kung sakali't mamatay ako, 
magkaroon man lamang ikaw at ang nanay ng mga damit!...</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sayang at hindi ko 
nga ninakaw!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi umimik ang pinakamatanda at hinila 
ang kanyang lubid. Pagkatapos ay nagsalitang kasabay ang buntong hininga.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang ikinatatakot 
ko'y baka, kagalitan ka ng nanay kung maalaman!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa akala mo kaya?--ang tanong ng maliit 
na nagtataka.--Sabihin mong maigi ang pagkabugbog sa akin, ipakikita ko ang 
aking mga pasa at ang punit kong bulsa: hindi ako nagkaroon kailan man kung di 
isang kuarta lamang na ibinigay sa akin niyong pasko at kinuha sa akin kahapon 
ng kura ang isang kuartang iyon. Hindi pa ako nakakakita ng gayon kagandang 
isang kuarta! Hindi maniniwala ang nanay! hindi maniniwala!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung ang kura ang magsabi....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpasimula, ng pag-iyak si Crispin, at 
ibinubulong sa gitna ng paghagulhol:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kung gayo'y umuwi ka ng mag-isa; aayaw 
akong umuwi. Sabihin mo sa nanay na ako'y may sakit; aayaw akong umuwi.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Crispin, huwag kang 
umiyak!--anang 
matandang kapatid.--Hindi maniniwala ang nanay; huwag kang umiyak; sinabi ni 
matandang Tasiong may handa raw sa ating masarap na hapunan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tumingala si Crispin at pinagmasdan ang kapatid.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Isang masarap na hapunan! Hindi pa ako 
nanananghalian: aayaw akong pakanin hanggang hindi sumisipot ang dalawang onza 
... Datapuwa't kung maniwala ang nanay? Sabihin mong nagsisinungaling ang 
sakristan mayor, at ang kurang maniwala sa kanya'y sinungaling din, na silang 
lahat ay sinungaling; na sinasabi nilang magnanakaw 
daw tayong lahat, sapagkat ang tatay natin ay 'vikiosong'.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px"><font face="Arial" color="#333333">
<span style="font-size: 13pt">nguni't sumungaw ang isang ulo sa maliit 
na hagdang patungo sa pangulong aaray ng kampanario, at ang ulong ito, na kawangis ng 
kay Medusa</span></font><font face="Arial"><span style="font-size: 13pt"><a class="fnanchor" href="http://www.gutenberg.org/files/20228/20228-h/20228-h.htm#Footnote_251_251"><font color="#333333">]</font></a></span><font color="#333333"><span style="font-size: 13pt">, 
ang siyang biglang humarang ng salita sa mga labi ng bata. Yao'y isang ulong 
haba, payat, na may mahahabang buhok na maitim; salaming asul sa mata ang siyang 
kumukubli ng pagka bulag ang isang mata. Yaon ang sakristan mayor, na talagang 
gayon kung pakita, walang ingay, hindi nagpaparamdam ng pagdating.</span></font></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nanglamig ang magkapatid.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Minumultahan kata, 
Basilio, ng kahati, dahil sa hindi mo pagtugtog ng maayos!--ang sabi ng boses na malagunlong na 
tila walang kampana sa lalaugan.--At ikaw, Crispin, matira ka rito ngayong gabi 
hanggang sa sumipot ang iyong ninakaw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tiningnan ni Crispin ang kanyang kapatid, 
na parang siya'y humihinging tangkilik.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Binigyan na kami ng kapahintulutan ... 
hinihintay po kami ng nanay sa a las ocho--ang ibinulong ni Basiliong taglay ang&nbsp; 
buong&nbsp; kakimian.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ikaw man naman ay 
hindi makaaalis sa ikawalong oras; hanggang sa ikasampu!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--nguni't talastas na po ninyong hindi 
nakapaglalakad pagka a las nueve na, at malayo ang bahay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ibig mo yatang makapangyari pa kay sa 
akin?--ang itinanong na galit ng taong iyon. At hinawakan si Crispin sa bisig at 
inakmaang kaladkarin.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ginoo! may isang 
linggo na po ngayong hindi namin nakikita ang aming ina!--ang ipinakiusap ni Basilio, at tinangnan 
ang kanyang batang kapatid na ang anyo'y ibig ipagsanggalang ito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nailayo ang kanyang kamay ng sakristan 
mayor sa isang tampal, at saka kinaladkad si Crisping nagpasimula ng pag-iyak, 
at nagpatinghiga, samantalang sinasabi sa kanyang kapatid:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag mo akong 
pabayaan, papatayin ako nila!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't hindi siya pinansin ng 
sakristan, kinaladkad at nawala siya sa gitna ng kadiliman.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Natira si Basiliong hindi 
man lamang makapagsalita. Narinig niya, ang mga pagkakahampashampas ng katawan 
ng kanyang kapatid sa mga baitang ng maliit na hagdanan, isang sigaw, ilang 
tampal, at unti-unting napawi sa kanyang tainga ang gayong mga pagsigaw na 
nakahahambal.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi humihinga ang bata: nakatindig na 
nakikinig, dilat na dilat ang mga mata, at nakasuntok ang mga kamay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kailan baga kaya ako makapag aararo ng 
isang bukid?--ang marahang ibinubulong, at dalidaling nanaog.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pagdating sa koro'y nakinig ng maigi: 
lumalayo ng&nbsp; buong&nbsp; katulinan ang boses ng kanyang kapatid, at ang sigaw na: 
'nanay!' 'kaka!' ay nawalang lubos pagkasara ng pinto. Nangangatal, 
nagpapawis, sandali siyang tumigil; kinakagat niya ang kanyang kamao upang 
lunurin ang isang sigaw na nagtutumakas sa kanyang puso at pinabayaan niyang 
magpalingaplingap ang kanyang mga mata sa nag-aagaw dilim at liwanag na 
simbahan. Doo'y malamlam ang ningas ng ilaw na langis sa 'lampara'; na sa gitna, 
ang 'katafalko'; sara ang lahat ng mga pintuan, at may mga rehas ang 
mga bintana.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Di kaginsaginsa'y nanhik sa maliit na 
hagdan, linampasan ang pangalawang saray, na kinalalagyan ng nagniningas na 
kandila, nanhik sa ikatlong saray. Kinalas ang mga lubid na nakatali sa mga 
'badajo' (pamaltok ng kampana), at pagkatapos ay muling nanaog na namumutla; 
nguni't kumikinang ang kanyang mga mata'y hindi sa mga luha.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Samantala'y nagpapasimula ng pagtila ang 
ulan at untiunting lumiliwanag ang langit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinagdugtong ni Basilio ang mga lubid, 
itinali ang isang dulo sa isang maliit na pinakahaligi ng 'barandilla', at 
hindi man lamang naalaalang patayin ang ilaw, umus-os sa lubid sa gitna ng kadiliman.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang makaraan ang ilang minuto, sa isa sa 
mga daan sa bayan, ay nakarinig ng mga boses at tumunog ang dalawang putok; nguni't sino ma'y walang natigatig, at muling tumahimik na lahat.</font></p>
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