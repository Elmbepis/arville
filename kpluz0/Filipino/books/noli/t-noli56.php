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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LVI. Ang Sabihanan at Inaakala</font></b></p>
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
											Sa kawakasa'y pinapag-umaga rin ng 
											Diyos sa bayang tigib ng 
											pagkagulantang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Wala pang lumalakad na mga tao sa 
											mga daang kinalalagyan ng kuartel at 
											ng 'tribunal'; hindi nagpapakilala 
											ang mga bahay na may mga tumatao, 
											gayon may maingay na binuksan ang 
											dahong kahoy ng isang bintana at 
											sumungaw ang ulo ng isang musmos, na 
											nagpapainog-inog sa magkabikabila 
											...&nbsp;<i>plas!</i>&nbsp;nagpapaunawa ang 
											lagapak na iyon ng biglang pagdapo 
											ng isang balat na tuyo sa sariwang 
											balat ng tao; ngumiwi ang bibig ng 
											batang lalaki, pumikit, nawala at 
											muling sinarhan ang bintana.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakapagbigay halimbawa na; may 
											nakaringig marahil ng pagbubukas at 
											pagsasarang iyon, sapagkat 
											marahang binuksan ang sa ibang 
											bintana at maingat na sumungaw ang 
											ulo ng isang matandang babae, 
											kulubot at wala ng ngipin: siya nga 
											ang si hermana Pute na nag-ingay ng 
											di sapala samantalang nagsesermon si 
											Padre Damaso. Ang mga musmos at ang 
											mga matatandang babae ang siyang 
											tunay na larawan ng pagkamalabis na 
											pagmimithing makaalam ng mga 
											nangyayari sa ibabaw ng lupa; ang 
											mga bata'y sa malaking pagnanais na 
											makaalam, at ang mga matatandang 
											babae'y sa paghahangad na mag-alaala 
											sa mga nakaraang panahon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahil walang makapangabas na 
											bumigay ng palo ng isang sinelas, 
											sapagkat nananatili, tumatanaw sa 
											malayong pinapangungunot ang mga 
											kilay, nagmumog, lumura ng malakas 
											at nagkruz pagkatapos. Binuksan ding 
											may takot ang isang maliit na 
											bintana ng bahay na katapat, at 
											doo'y sumungaw naman si hermana 
											Rufa, ang aayaw magdaya't aayaw 
											namang siya'y dayain. Nagtinginang 
											saglit, ang dalawa, nagngitian, 
											naghudyatan at muling nangagkruz.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Jesus! nakakawangis ng isang misa 
											de grakia, ng isang kastillo!--ani 
											hermana Rufa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mula ng looban ang bayan ni Balat 
											ay hindi pa ako nakakakita ng isang 
											gabing katulad ng sa kagabi,--ang 
											isinagot ni hermana Pute.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gaano 
											karaming putok!--ang sabihanan ay ang 
											pulutong daw ni matandang Pablo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--mga tulisan? hindi mangyayari! Ang 
											sabihana'y mga kuadrillero raw na 
											nakalaban ng mga guwardiya sibil. Kaya 
											napipiit si Don Filipo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sanktus Deus! may mga labing apat 
											daw ang kauntian ng mga patay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Untiunting pinagbubuksan ang ibang 
											mga bintana at nangagsidungaw ang 
											iba't ibang mga mukha, nangagbatian 
											at kanilang pinag-usapan ang mga 
											nangyayari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa sikat ng araw, na ang anyo'y 
											niningning na magaling, natatanawan 
											ng may kalabuan sa malayo ang 
											pagpaparoo't parito ng mga sundalo, 
											na tulad sa nag-aabo-abong mga 
											anino.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naroon ang isa pang patay!--anang 
											isa buhat sa isang bintana.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isa? dalawa ang nakikita ko.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ako'y ..., nguni't sa kawakasan, 
											ano, hindi ninyo nalalaman kung ano 
											ang nangyari?--ang tanong ng isang 
											lalaking may pagmumukhang palabiro.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aha! ang mga kuadrillero.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po; iya'y isang pag-aalsa sa 
											kuartel!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano bang pag-aalsa? Ang kura't ang 
											alperes ang nangaglabanan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Alin man diya'y hindi totoo--ang 
											sabi ng nagtanong;--iya'y ang mga 
											insik na nagsipag-alsa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At muling sinarhan ang kanyang 
											bintana.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang mga insik!--ang inulit ng lahat 
											ng malaking pagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kaya pala wala isa mang nakikita 
											sa kanila!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nangamatay na lahat, marahil.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inaakala ko na ngang may masama 
											silang gagawing ano man. Kahapon ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iya'y nakikinikinita ko na, 
											kagabi....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sayang!--ani 
											hermana Rufa; na mamatay silang 
											lahat ngayon pa namang malapit na 
											ang pasko, na kapanahunan ng 
											kanilang pagreregalo ... Maanong 
											hinintay man lamang nila ang bagong 
											taon....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumasaya ng untiunti ang mga daan: 
											ang mga aso, mga manok, mga baboy at 
											mga kalapati ang nangaunang nag-akalang 
											mangagsigala, sumunod ang ilang 
											marurungis na mga batang kapit-kapit 
											at nangagsisilapit sa kuartel na may 
											taglay na takot; pagkatapos ay ilang 
											matatandang babae, na nakasalumbaba 
											ng panyo, may tangang malalaking 
											kuintas, at kunuwa'y nangagdarasal 
											upang sila'y paraanin ng mga sundalo. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nang mapagkilalang makalalakad na 
											hindi tatanggap ng isang putok ng 
											baril, ng magkagayo'y nagpasimula ng 
											paglabas ang mga lalaki, na 
											nangagwawalang ano man kunwari; ng 
											pasimula'y pinapagkakasiya nila ang 
											kanilang paglalakadlakad sa tapat ng 
											kanilang bahay, na kanilang 
											hinahagpos ang manok; ng malao'y 
											tinikman nilang pahabahabain ang 
											kanilang naaabot, na manakanaka 
											silang tumitigil, at sa kinagagayo'y 
											nakarating sila hanggang sa harap ng 
											'tribunal'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakahambal ng mainam ang pagdating 
											ng dalawang kuadrillero, na may 
											dalang isang angarilla na 
											kinalululanan ng isang may anyong 
											tao, at isang guwardiya sibil ang 
											siyang sa kanila'y sumusunod. 
											Napagtalastas na sila'y galing sa 
											kumbento; sa anyo ng mga paang 
											nangakalawit ay pinagbalakbalak ng 
											isa kung sino kaya iyon; sa dako 
											roo'y may nagsabing iyon nga; sa 
											lalong dako roo'y ang patay ay 
											dumami at nangyari ang talinghaga ng 
											Santisima Trinidad; pagkatapos ay 
											muling nasnaw ang himala ng mga 
											tinapay at ng mga isda, at naging 
											tatlompo't walo na.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang may a las siete y media, ng 
											dumating ang ibang mga guwardiya 
											sibil, na galing sa mga karatig na 
											bayan, ang balitang kumakalat ay 
											maliwanag na't nasasabi ang mga 
											nangyari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kagagaling ko pa sa tribunal, na 
											kinakitaan kong nangapipiit si Don 
											Filipo at si Don Crisostomo,--ang 
											sabi ng isang lalaki kay hermana 
											Pute; kinausap ko ang isa sa mga 
											nagbabantay na kuadrillero. Ang 
											nangyari'y isinaysay na lahat kagabi 
											ni Bruno, na anak niyong namatay sa 
											kapapalo. Talastas na po ninyong 
											ipakakasal ni Kapitan Tiago ang 
											kanyang anak na babae sa binatang 
											kastila; sa sakit ng loob ni Don 
											Crisostomo'y nag-akalang manghiganti 
											at binanta niyang patayin ang lahat 
											ng mga kastila, pati ang kura; 
											linusob nila kagabi ang kuartel at 
											ang kumbento, at sa kagalingang 
											palad, at sa awa ng Diyos, ay na sa 
											sa bahay ni Kapitan Tiago ang kura. 
											Nangakatakas daw ang marami. Sinunog 
											ng mga guwardiya sibil ang bahay ni 
											Don Crisostomo, at kung hindi sana 
											siya nahuli na muna, siya ma'y 
											sinunog din.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinunog nila ang kanyang bahay?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nangabibilanggo ang lahat ng mga 
											alila. Pagmasdan ninyo't hanggang 
											dito'y natatanawan pa ang aso!--anang 
											nagbabalita;--sinasabi ng mga 
											nanggagaling doon ang mga bagay na 
											totoong kahapishapis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minasdan ng lahat ang lugar na 
											itinuro: isang manipis na aso ang 
											marahang napaiimbulog pa sa langit. 
											Nangaglilininglining ang lahat sa 
											nangyaring iyon, na may nahahabag at 
											may sumisisi naman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kahabaghabag na binata!--ang mariing 
											sinabi ng isang matandang lalaking 
											asawa ni hermana Pute.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga!--ang isinagot sa kanya ng 
											kanyang asawa;--nguni't alalahanin 
											mong kahapo'y hindi nagpamisa ng 
											patungkol sa kaluluwa ng kanyang 
											ama, na walang salang siyang lalong 
											nagkakailangan ng higi't kay sa iba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't babae, wala kang 
											kaawaawa?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Awa sa mga exkomulgado? Isang 
											kasalanan ang maawa sa mga kaaway ng 
											Diyos,--ang sabi ng mga kura. 
											Natatandaan ba ninyo? Siya'y 
											naglalakad sa Campo Santo na parang 
											yao'y isang kulungan lamang ng mga 
											hayop!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi baga nagkakawangis ang 
											kulungan ng mga hayop at ang Campo 
											Santo?--ang isinagot ng matandang 
											lalaki;--ang pinagkakaibhan lamang ay 
											ang tanging pumapasok sa Campo 
											Santo'y yaong mga hayop na nauukol 
											sa isang pulutong....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya ka na nga!--ang isinigaw sa 
											kanya ni hermana 
											Pute;--ipagsasanggalang mo pa ang 
											taong nakikita nating maliwanag na 
											maliwanag na pinarurusahan ng Diyos. 
											Makikita mo't ikaw nama'y huhulihin 
											din. Umalalay ka sa isang bahay na 
											nalulugso!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi na umimik ang lalaki sa gayong 
											pangangatuwiran.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hala!--ang ipinagpatuloy ng 
											matandang babae; pagkatapos na 
											masuntok niya si Padre Damaso'y wala 
											na nga siyang nalalabing gawin kung 
											di patayin naman si Padre Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't hindi maikakailang siya'y 
											mabait ng panahong siya'y musmos pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay nga, siya'y dating 
											mabait,--ang muling itinutol ng 
											matandang babae; nguni't siya'y na 
											pa sa Espa&ntilde;a; ang lahat ng napa sa 
											sa Espa&ntilde;a, ang sabi ng mga kura, ay 
											nagiging mga hereje.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ohoy!--ang isinagot naman ng lalaki 
											na nakasilip ng sukat niyang 
											ikaganti;--hindi ba pawang taga 
											Espa&ntilde;a ang lahat ng mga kura, at ang 
											arzobispo, ang papa at ang Birhen? 
											Aba! kung gayo'y pawang mga hereje 
											naman pala? aba!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagkapalad si hermana Pute, na 
											mamasdang tumatakbo ang isang 
											alilang babae, na balisang balisa at 
											namumutla, at siyang pumutol ng 
											pagtatalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May isang nagbigti sa halamanan ng 
											kapit-bahay!--ang sabing humihingal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang nagbigti!--ang biglang 
											pinagsabihanan ng lahat na puspos ng 
											agam-agam.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagkruz ang mga babae; sino ma'y 
											walang nakakilos sa kinalalagyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya nga po,--ang ipinagpatuloy ng 
											alilang babaeng nangangatal;--kukuha 
											sana ako ng patani ... tumanaw ako 
											sa halamanan ng kapit-bahay upang 
											maalaman ko kung siya'y naroroon 
											..., ang nakita ko'y isang lalaking 
											uugoy-ugoy; ang&nbsp; buong&nbsp; isip ko'y si 
											Teo, ang alilang siyang lagi ng 
											nagbibigay sa akin ..., lumapit ako 
											upang ... kumuha ng patani, at ang 
											nakita ko'y hindi siya kung hindi 
											iba, isang patay; tumakbo ako, 
											tumakbo ako at ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan natin siya,--ang wika ng 
											matandang lalaki, at saka 
											tumindig;--ituro mo sa amin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang pumaroon!--ang isinigaw 
											sa kanya ng kanyang asawa at 
											tinangnan siya sa baro;--mapapahamak 
											ikaw!--siya'y nagbigti? lalong 
											masama sa kanya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pabayaan mong tingnan ko siya, 
											babae;--pasa tribunal ka Juan, at 
											ipagbigay alam mo; baka sakali hindi 
											pa patay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At siya'y na pa sa halamanan, na 
											sinusundan ng alilang babae, na 
											nagtatago sa kanyang likuran; 
											nangagsisunod din ang mga babae at 
											gayon din si hermana Pute, na pawang 
											nangapupuspos ng takot at ng nais na 
											makapanood.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naroon po, ginoo,--anang alilang 
											babae na huminto at itinuturo ng 
											daliri.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumigil ang kapisanang iyon sa 
											lalong pinakamalayo, at pinabayaang 
											mag-patuloy na mag-isa ang matandang 
											lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang katawan ng tao, na nakabitin 
											sa isang sanga ng puno ng santol, 
											ang marahang umuugoy sa hihip ng 
											mahinhing amihan. Pinagmasdan siyang 
											sandali ng matanda; nakita niya ang 
											mga paang naninigas, ang mga bisig, 
											ang may duming damit, ang ulong 
											nakalungayngay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi dapat natin siyang galawin 
											hanggang sa dumating ang hustisya,--ang sinabing 
											malakas;--matigas na; malaon nang 
											siya'y patay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Unti-unting lumapit ang mga babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iyan ang kapit-bahay nating 
											tumitira sa bahay na iyon, na may 
											dalawang linggo na ngayong dumating 
											dito; tingnan ninyo ang pilat niya 
											sa mukha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Avemaria!--ang sinabi pagdaka ng mga 
											babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipagdarasal ba natin ang kanyang 
											kaluluwa?--ang itinanong ng isang 
											dalaga, karakarakang matapos na 
											niyang mapagmasdan at masiyasat ang 
											patay na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Haling, hereje!--ang ipinangusap sa 
											kanya ni hermana Pute,--hindi mo ba 
											nalalaman ang sinabi ni Padre 
											Damaso? isang pagtukso sa Diyos ang 
											ipagdasal ang isang napakasama; ang 
											nagpapakamatay ay napapakasamang 
											walang sala, kaya nga siya'y hindi 
											inililibing sa lupang 'sagrado'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inaakala ko na ngang masama ang 
											kahihinatnan ng taong iyan; kailan 
											ma'y hindi ko nangyaring masiyasat 
											kung ano ang kanyang ikinabubuhay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Makaalawang nakita ko siyang 
											nakikipag-usap sa sakristan 
											mayor,--ang ipinahiwatig ng isang 
											dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil ay hindi sa dahilang siya'y 
											magkukumpisal o magpapamisa kaya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagsiparoon ang mga kapit-bahay, 
											at makapal na mga tao ang siyang 
											lumigid sa bangkay, na nananatili sa 
											pagpapaugoy-ugoy. Nangagsirating, 
											nang may kalahating horas na, ang 
											isang alguakil, ang direktorcillo at 
											dalawang kuadrillero; ipinanaog ng 
											mga ito ang bangkay at kanilang 
											inilagay sa ibabaw ng isang&nbsp;<i>angarilla.</i></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagdadalidali ang tao sa 
											pagkamatay,--ang sinabi ng 
											direktorcillong tumatawa, 
											samantalang kinukuha ang plumang 
											nakasingit sa likod ng kanyang 
											tainga!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ginawa ang kanyang mga mararaya at 
											panghuling mga tanong, pinapagsaysay 
											ang alilang babae, na pinagpipilitan 
											niyang hulihin sa silo, na kung 
											minsa'y kanyang iniirapan, kung 
											minsa'y kanyang pinagbabalaan, at 
											kung minsa'y pinararatangan ng mga 
											salitang hindi sinasabi, hanggang sa 
											magpasimula ng pag-iyak ang alilang 
											iyon, dahil sa ang isip niya'y siya 
											ay mapipiit sa bilangguan, at ang 
											naging katapusa'y sinabi na tuloy 
											niyang hindi siya naghahanap ng 
											patani, kung hindi ..., at kanyang 
											sinasaksi si Teo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y minamasdan ang bangkay 
											at ang lubid ng isang taga bukid, na 
											nakasalakot ng malapad at may isang 
											malaking tapal sa liig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi higit kay sa ibang bahagi ng 
											katawan ang pangingitim ng mukha ng 
											bangkay; may nakikitang dalawang 
											galos at dalawang maliliit na pasa 
											sa dakong itaas ng tali; mapuputi at 
											walang dugo ang mga hilahis ng 
											lubid. Inusisang magaling ng 
											mapagsiyasat na taga bukid, ang baro 
											at salawal ng bangkay, at kanyang 
											nahiwatigang punong puno ng alabok, 
											at hindi pa nalalaong napunit sa 
											iba't ibang mga lugar; nguni't ang 
											lalong kanyang naino'y ang mga bunga 
											ng tingloy o&nbsp;<i>amorseko</i>&nbsp;na 
											nakarikit sa kuello ng baro.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang iyong tinitingnan?--ang 
											itinanong sa kanya ng direktorcillo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tinitingnan ko po kung siya'y 
											mangyayaring makilala ko,--ang pautal 
											na sinabi, na anyong magpupugay, sa 
											makatuwid baga'y lalong itinungo ang 
											salakot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't hindi mo ba naringig na 
											iyan ang nagngangalang Lucas? 
											Nakakatulog ka ba?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtawanan ang lahat. Nagsalita 
											ng ilang pautal-utal na sabi ang 
											taga bukid na napahiya, at yumaong 
											nakatungo at mahina ang lakad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oy! saan kayo paparoon?--ang 
											isinigaw sa kanya ng matandang 
											lalaki;--hindi riyan ang daan ng 
											paglabas; diyan ang patungo sa bahay 
											ng patay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakakatulog pa ang lalaki!--anang 
											direktorcillo ng 
											palibak,--kinakailangang busan siya 
											ng tubig sa ibabaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling nangagtawanan ang mga 
											naroroon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Iniwan ng taga bukid ang lugar na 
											iyong kinahiyaan niya, at napatungo 
											sa simbahan. Itinanong ang sakristan 
											mayor pagdating sa sakristia.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Natutulog pa!--ang sa kanya'y 
											kanilang isinagot ng magaspang na 
											anyo;--hindi mo ba nalalamang 
											nilooban kagabi ang kumbento?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hihintayin kong siya'y magising.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minasdan siya ng mga sakristan 
											niyang anyong magaspang na talagang 
											asal na ng mga taong bihasang sila'y 
											alimurahin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natutulog ang bulag ang isang mata 
											sa isang mahabang silla, na na sa 
											isang sulok na hindi inaabot ng 
											liwanag. Nakalagay ang salamin sa 
											mata sa ibabaw ng noo, sa gitna ng 
											mahahabang naglawit na buhok, walang 
											nakatatakip sa payat at 
											nangangalirang na dibdib, na 
											tumataas at bumababa sa kanyang 
											paghinga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naupo sa malapit ang taga bukid, at 
											handang maghintay ng&nbsp; buong&nbsp; 
											katiyagaan, nguni't may nahulog sa 
											kanyang kuarta, hinanap niya sa 
											pamamag-itan at tulong ng isang 
											kandila, sa ilalim ng sillon ng 
											sakristan mayor. Namasid din ng taga 
											bukid na may mga bunga rin ng 
											tingloy (amorseko) ang salawal at 
											ang mga manggas ng baro ng natutulog, 
											na sa kawakasa'y nagising, kinusot 
											ang tanging matang kanyang nagagamit, 
											at may galit na pinagwikaan ang 
											taong iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig 
											ko po sanang magpamisa ng isa, ginoo!--ang 
											sabi, na ang anyo'y humihinging 
											tawad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Natapos 
											na ang lahat ng mga misa,--ang sinabi 
											ng bulag ang isang mata, ng 
											magkagayon, na pinatimyas ng kaunti 
											ang kanyang tinig; bukas, kung ibig 
											mo ... sa mga kaluluwa sa purgatoryo 
											ba?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po,--ang sagot ng taga bukid, 
											at saka ibinigay ang piso sa 
											sakristan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At tinitigan ang kanyang iisaisang 
											mata, at idinagdag:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Patungkol 
											po sa isang taong hindi malalao't 
											mamamatay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At linisan ang sakristia.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mahuhuli ko sana siya kagabi!--ang 
											sinabing nagbubuntong hininga, 
											samantalang inaalis ang tapal at 
											iniuunat ang katawan, upang 
											manag-uli ang pagmumukha at taas ni 
											Elias.</font></p>
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