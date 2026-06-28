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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">III. Ang Hapunan</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p class="sign" align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt"><i>Jele jele bago quiere.</i></font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Tila mandin totoong lumiligaya si Fr. 
Sibyla: tahimik na lumalakad at hindi na namamasid sa kanyang nangingilis at 
manipis na mga labi ang pagpapawalang halaga; hanggang sa marapating 
makipagusap sa pilay na si doktor De Espada&ntilde;a, na sumasagot ng putol-putol na 
pananalita, sapagkat siya'y may pagka utal. Kagulatgulat ang sama ng loob ng 
frankiskano, sinisikaran ang mga sillang nakahahadlang sa kanyang nilalakaran, 
at hanggang sa siniko ang isang kadete. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi nagkikikibo ang teniente; 
nagsasalitaan ng masaya ang iba at kanilang pinupuri ang kabutiha't kasaganaan 
ng haying pagkain. Pinakunot ni Do&ntilde;a Victorina, gayon man, ang kanyang ilong; 
nguni't karakaraka'y lumingong malaki ang galit, kawangis ng natapakang 
ahas: mangyari'y natuntungan ng teniente ang 'kola' ng kanyang pananamit.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Datapuwa't wala po ba, kayong mga 
mata?--anya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mayroon po, ginoong babae, at dalawang 
lalong magaling kay sa mga mata ninyo; datapowa't pinagmamasdan ko po iyang 
inyong mga kulot ng buhok--ang itinugon ng militar na iyong hindi totoong 
mapagparaya sa babae, at saka lumayo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Bagaman hindi sinasadya'y kapwa tumungo 
ang dalawang prayle sa duyo o ulunan ng mesa, marahil sapagkat siyang 
pinagkaratihan nila at nangyari nga ang mahihintay, na tulad sa 
nangagpapangagaw sa isang katedra: 
pinupuri sa mga 
pananalita ang mga karapatan at kataasan ng isip ng mga kapangagaw; 
datapua't pagdaka'y ipinakikilala ang pabaligtad, at nangag-uungol at 
nangag-uupasala kung hindi sila ang makapagtamo ng kanilang hangad.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ukol po sa inyo, Padre Damaso!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ukol po sa inyo, Fr. Sibyla!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Kayo ang lalong unang kakilala sa bahay 
na ito ... konfesor ng nasirang may bahay na babae, ang lalong may gulang, may karapatan at may 
kapangyarihan....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Matandang matanda'y hindi pa 
naman!--nguni't kayo po naman ang kura nitong bayan!--ang sagot na matabang ni 
Padre Damasong gayon ma'y hindi binibitiwan ang silla.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--sapagkat ipinag-uutos po ninyo'y ako'y 
sumusunod!--ang iniwakas ni Fr. Sibyla.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ako'y hindi nag-uutos!--ang itinutol ng 
frankiskano--ako'y hindi nag-uutos!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Umuupo na sana si Fr. Sibylang hindi 
pinapansin ang mga pagtutol na iyon, ng makasalubong ng kanyang mga mata ang 
mga mata ng teniente. Ang lalong mataas na ofikial sa Pilipinas, ayon sa 
kaisipan ng mga prayle, ay totoong malaki ang kababaan sa isang uldog na 
tagapagluto ng pagkain. 'Cedant arma toga', 
ani Ciceron sa Senado; 'kedant arma kotae' 
anang mga prayle sa Pilipinas. Datapuwa't mapitagan si Fr. Sibyla, kaya't 
nagsalita:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ginoong teniente, dito'y na sa mundo 
po tayo at wala sa sambahan; nararapat po sa inyo ang umupo rito.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't ayon sa anyo ng kanyang 
pananalita'y sa kanya rin nauukol ang upuang iyon, kahi't na sa mundo. Ang 
teniente, dahil yata ng siya'y huwag magpakagambala, o ng huwag siyang umupo 
sa gitna ng dalawang prayle, sa maikling pananalita'y sinabing ayaw siyang 
umupo roon.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Alin man sa tatlong iyo'y hindi nakaalaala 
sa may bahay. Nakita ni Ibarrang nanonood ng&nbsp; buong&nbsp; galak at nakangiti sa mga 
pagpapalamangang iyon sa upuan ang may bahay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Bakit po, Don Santiago! hindi po ba kayo makikisalo sa amin?--ani Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">nguni't sa lahat ng mga upuan ay may mga tao na. Hindi kumakain si Lukulo 
sa bahay ni Lukulo.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Tumahimik po kayo! Huwag kayong 
tumindig!--ani Kapitan Tiago, kasabay ng pagdidiin sa balikat ni Ibarra. Kaya pa 
naman gumagawa ang pagdiriwang na ito'y sa pagpapasalamat sa mahal na Birhen 
sa inyong pagdating. Nagpagawa ako ng 'tinola' dahil sa inyo't marahil malaon 
ng hindi ninyo natitikiman.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Dinala sa mesa ang isang umaasong malaking 
'fuente'. 
Pagkatapos maibulong ng dominiko ang 'Benedikte' 
na halos wala sino mang natutong sumagot, nagpasimula ng pamamahagi ng laman 
ng fuenteng iyon. nguni't ayawan kung sa isang pagkalibang o iba kayang bagay, 
tumama kay Padre Damaso ang isang pinggang sa gitna ng maraming upo at sabaw ay 
lumalangoy ang isang hubad na liig at isang matigas na pakpak ng inahing 
manok, samantalang kumakain ang iba ng mga hita at dibdib, lalong lalo na si 
Ibarra, na nagkapalad mapatama sa kanya ang mga atay, balunbalunan at iba, pang 
masasarap na lamang loob ng inahing manok. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nakita ng frankiskano ang lahat ng 
ito, dinurog ang mga upo, humigop ng kaunting sabaw, pinatunog ang kukhara sa 
paglalagay at biglang itinulak ang pingga't inilayo sa kanyang harapan. 
Nalilibang namang totoo ang dominiko sa pakikipagsalitaan sa binatang mapula ang 
buhok.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Gaano pong panahong napaalis kayo sa 
lupaing ito?--ang tanong ni Laruja kay Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pitong taon halos.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--!Aba! kung gayo'y marahil, nalimutan na 
ninyo ang lupaing ito?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Baligtad po; bagaman ang kinagisnan kong lupa'y tila mandin linilimot na ako, siya'y lagi kong 
inaalaala.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ano po ang ibig ninyong sabihin?--ang 
tanong ng mapulang buhok.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ibig kong sabihing may isang taon na 
ngayong hindi ako tumatangap ng ano mang balita tungkol sa bayang ito, 
hanggang sa ang nakakatulad ko'y ang isang di tagaritong hindi man lamang 
nalalaman kung kailan at kung paano ang pagkamatay ng kanyang ama.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ah!--ang biglang sinabi, ng teniente.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At saan naroon po kayo at hindi kayo 
tumelegrama?--ang tanong ni Do&ntilde;a Victorina.--Tumelegrama kami sa 'Pe&ntilde;insula' 
ng kami'y pakasal.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ginoong babae; nitong huling dalawang 
tao'y doroon ako sa dakong ibaba ng Europa, sa Alemania at saka sa Colonia 
rusa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Minagaling ng Doktor De Espada&ntilde;a, na 
hangga ngayo'y hindi nangangahas magsalita, ang magsabi ng kaunti:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Na ... na ... nakilala ko sa Espa&ntilde;a ang 
isang polakong taga, Va ... Varsovia, na ang pangala'y Stadtnitzki, kung hindi 
masama ang aking pagkatanda; hindi po ba ninyo siya nakikita?--ang tanong na 
totoong kimi at halos namumula sa kahihiyan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Marahil po--ang matamis na sagot ni 
Ibarra--nguni't sa sandaling ito'y hindi ko naaalaala siya.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Aba, hindi siya maaring ma ... 
mapagkamal-an sa iba!--ang idinugtong ng Doktor na lumakas ang loob.--Mapula ang 
kanyang buhok at totoong masamang mangastila.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mabubuting mga pagkakakilalanan; nguni't doo'y sa 
kasaliwaang palad ay hindi ako nagsasalita 
ng isa man lamang 
wikang kastila, liban na lamang sa ilang mga konsulado.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At paano ang inyong ginagawang 
pamumuhay?--ang tanong ni Do&ntilde;a Victorinang nagtataka.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ginagamit ko po ang wika ng lupaing 
aking pinaglalakbayan, ginoong babae.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Marunong po ba naman kayo ng 
ingles?--ang tanong ng dominikong natira sa Hongkong at totoong marunong ng 'Pidggin-English, 
iyang halo-halong 
masamang pananalita ng wika ni Shakespeare 
ng anak ng Imperio Celeste.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Natira akong isang taon sa Inglaterra, sa 
kasamahan ng mga taong ingles lamang ang sinasalita.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At alin ang lupaing lalong naibigan po 
ninyo sa Europa?--ang tanong ng binatang mapula ang buhok.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Pagkatapos ng Espa&ntilde;a, na siyang 
pangalawa kong Bayan, alin man sa mga lupain ng may kalayaang Europa.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At kayo pong totoong maraming nalakbay 
... sabihin ninyo, ano po ba ang lalong mahalagang bagay na inyong nakita?--ang 
tanong ni Laruja.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Wari'y nag-isip-isip si Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Mahalagang bagay, sa anong kaukulan?</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Sa halimbawa ... tungkol sa pamumuhay ng 
mga bayan ... sa buhay ng pakikipanayam, ang lakad ng pamamahala ng bayan, 
ang ukol sa religion, ang sa kalahatan, ang katas, ang kabooan....</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Malaong nagdidilidili si Ibarra.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Ang katotohanan, bagay na ipanggilalas 
sa mga bayang iyan, kung ibubukod ang sariling pagmamalaki ng bawa't isa sa 
kanyang nacion.... Bago ko paroonan ang isang lupain, pinagsisikapan kong 
matalos ang kanyang historia, ang kanyang Exodo 
kung mangyayaring masabi ko ito, at pagkatapos ang nasusunduan ko'y ang dapat 
mangyari: nakikita kong ang iginiginhawa o ipinaghihirap ng isang baya'y 
nagmumula sa kanyang mga kalayaan o mga kadiliman ng isip, at yamang gayo'y 
nanggagaling sa mga pagpapakahirap ng mga namamayan sa ikagagaling ng kalahatan, o ang sa 
kanilang mga magugulang na pagka walang ibang iniibig at 
pinagsusumakitan kung di ang sariling kaginhawahan.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At wala ka na bagang nakita kung di iyan 
lamang?--ang itinanong na nagtatawa ng palibak ng frankiskano, na mula ng 
pasimulaan ang paghapon ay hindi nagsasalita ng ano man, marahil sapagkat 
siya'y nalilibang sa pagkain; hindi karapatdapat na iwaldas mo ang iyong kayamanan upang wala 
kang maalaman kung di ang babahagyang bagay na iyan! Sino mang musmos sa 
paaralanha'y nalalaman iyan!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Napatingin na lamang sa kanya si Ibarra't 
hindi maalaman kung ano ang sasabihin; ang mga iba'y 
nangagtitinginan sapagkataka at nanganganib na magkaroon ng kaguluhan.--Nagtatapos na ang paghapon, ang 
'kagalangan po ninyo'y busog na'--ang 
isasagot sana ng binata; nguni't nagpigil at ang sinabi na lamang ay ang 
sumusunod:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--mga ginoo; huwag kayong magtataka ng 
pagsasalitang kasambahay sa akin ng aming dating kura; ganyan ang pagpapalagay 
niya sa akin ng ako'y musmos pa, sapagkat sa kanya'y para ring hindi 
nagdaraan ang mga taon; datapowa't kinikilala kong utang na loob, sapagkat 
nagpapaalaala sa aking lubos niyong mga araw na madalas pumaparoon sa aming 
bahay ang 'kanyang kagalangan', at kanyang pinauunlakan ang pakikisalo sa 
pagkain sa mesa ng aking ama.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Sinulyap ng dominiko ang frankiskano na 
nangangatal. Nagpatuloy ng pananalita si Ibarra at nagtindig:</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Itulot ninyo sa 
aking ako'y umalis na, sapagkat palibhasa'y bago akong dating at dahil sa bukas 
din ay ako'y aalis, marami pang totoong gagawin akong mga bagay-bagay. Natapos 
na ang pinakamahalaga ng paghapon, kaunti lamang kung ako'y uminom ng alak at 
bahagya na tumitikim ako ng mga likor. mga ginoo, matungkol nawa ang lahat sa 
Espa&ntilde;a at Filipinas!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At ininom ang isang kopitang alak na 
hanggang sa sandaling iyo'y hindi sinasalang. Tinularan siya ng Teniente, 
nguni't hindi nagsasabi ng ano man.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Huwag po kayong umalis!--ang ibinulong sa 
kanya, ni Kapitan Tiago.--Darating na si Maria Clara: sinundo siya ni Isabel. 
Padrerito ang sa bayang bagong kura, na santong tunay.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Padrerito ako bukas bago ako umalis. 
ngayo'y may gagawin akong mahalagang pagdalaw.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">At yumao. Samantala'y nagluluwal ng sama 
ng loob ang frankiskano.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--Nakita na ninyo?--ang sinasabi niya sa 
binatang mapula ang buhok na ipinagkukukumpas ang kukhillo ng himagas. Iya'y 
sa pagmamataas! Hindi nila maipagpaumanhing sila'y mapagwikaan ng kura! Ang 
akala nila'y mga taong may kahulugan na! Iyan ang masamang nakukuha ng 
pagpapadala sa Europa ng mga bata! Dapat ipagbawal iyan ng gobierno.</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">--At ang teniente?--ani Do&ntilde;a Victorinang 
nakikikampi sa frankiskano--sa&nbsp; buong&nbsp; gabing ito'y hindi inalis ang pagkukunot 
ng pag-itan ng kanyang mga kilay; magaling at tayo'y iniwan! Matanda na'y 
teniente pa hangga ngayon!</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Hindi malimutan ng ginoong babae ang 
pagkakabanggit sa mga kulot ng kanyang buhok at ang 
pagkakayapak sa 'enka&ntilde;onado' ng kanyang mga 'enagua.'</font></p>
<p align="justify" style="margin-left: 80px; margin-right: 80px">
<font face="Arial" color="#333333" style="font-size: 13pt">Nang gabing yao'y kasama ng mga iba't 
ibang bagay na isinusulat ng binatang mapula ang buhok sa kanyang librong 'Estudios Coloniales,' ang sumusunod: 
'Kung ano't makahihilahil sa kasayahan 
ng 
isang piging ang isang liig at isang pakpak sa pinggan ng tinola.' At kasama 
ng mga iba't ibang paunawa ang mga ganito:--'Ang taong lalong walang kabuluhan 
sa Pilipinas sa isang hapunan o kasayahan ay ang nagpapahapon o nagpapapiyesta: 
makapagpapasimula sa pagpapalayas sa may bahay at mananatili ang lahat sa&nbsp; 
buong&nbsp; 
kapanatagan.'--'Sa mga kalagayan ngayon ng mga bagay bagay, halos ay isang kagalingang sa 
kanila'y gagawin ang huwag paalisin sa kanilang lupain ang mga 
filipino, at huwag man lamang turuan silang bumasa'....</font></p>
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