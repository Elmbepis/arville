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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XLIX. Ang Tinig ng mga Pinaguusig</font></b></p>
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
											Tumutungtong si Ibarra sa bangka ni 
											Elias bago lumubog ang araw. Tila 
											mandin masama ang loob ng binata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipatawad 
											po ninyo, ginoo,--ani Elias, na may 
											kalungkutan pagkakita sa 
											kanya;--ipatawad po ninyong 
											nakapangahas akong kayo'y anyayahan 
											upang tayo'y magkatagpo ngayon; ibig 
											ko po kayong makausap ng&nbsp; buong&nbsp; 
											kalayaan, at hinirang po ang 
											ganitong sandali sa pag-ka't walang 
											makariringig sa atin dito: 
											makababalik tayo sa loob ng isang 
											oras.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nagkakamali kayo kaibigang 
											Elias,--ang sagot ni Ibarra na 
											nagpupumilit ngunit; kinakailangan 
											kong ihatid ninyo ako sa bayang 
											iyang natatanawan hanggang dito ang 
											kanyang kampanario. Pinipilit ako ng 
											kasaliwaang palad na gawin ko ang 
											bagay na ito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nang kasaliwaang palad?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo; akalain po ninyong sa aking 
											pagparito'y aking nakasalubong ang 
											alperes, nagpipilit na ialay sa akin 
											ang kanyang pakikialakbay; sa akin 
											po namang sumasa inyo ang alaala at 
											natatalastas kong kayo'y kanyang 
											nakikilala, kaya't ng siya'y 
											mangyaring aking mailayo'y sinabi 
											kong patungo ako sa bayang iyan at 
											doon ako mananatiling maghapon, 
											sapagkat ibig akong hanapin ng 
											lalaking iyan bukas ng hapon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kinikilala ko po sa inyong utang na 
											loob ang inyong paglingap sa akin, 
											datapuwa't sinabi po sana ninyo sa 
											kanya ng&nbsp; buong&nbsp; katiwasayan ng loob 
											na siya'y sumama,--ang isinagot ni 
											Elias na walang tigatig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit? at kayo po?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po niya ako makikilala, 
											sapagkat sa miminsang pagkakita niya 
											sa aki'y hindi makapag-iisip na 
											pakatandaan niya ang aking anyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinasama ako!--ang buntong hininga 
											ni Ibarra, na ang inaalaala'y si 
											Maria Clara.--Ano po ba ang ibig 
											ninyong sabihin sa akin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumingap si Elias sa kanyang 
											paligid. Malayo na sila sa pampang; 
											lumubog na ang araw, at sapagkat 
											sa panig na ito ng sinukob ay 
											bahagya na tumatagal ang 
											pagtatakip-silim, nagpapasimula na 
											ang paglaganap ng dilim at 
											namamanaag na ang sinag ng buwang sa 
											araw na iyo'y kabilugan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo,--ang muling sinabi ni Elias, 
											taglay ko po ang mithi ng maraming 
											sawing palad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ng maraming sawing palad? Ano po ba 
											ang kahulugan ng inyong sinasabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sinabi sa kanya ni Elias, sa 
											maikling saysay, ang kanyang 
											pakikipagsalitaan sa pinuno ng mga 
											tulisan, nguni't inilihim ang mga 
											pag-aalinlangan at ang mga bala 
											nito. Pinakinggan siyang magaling ni 
											Ibarra, at ng matapos na ni Elias 
											ang kanyang pagsasaysay, naghari ang 
											isang mahabang hindi pag-imik ng 
											dalawa, hanggang si Ibarra ang 
											naunang nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa makatuwid ay ang kanilang nasa'y 
											...?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lubhang malaking pagbabagong utos 
											tungkol sa mga hukbo, sa mga 
											sacerdote, sa mga hukom na 
											tagahatol, hinihingi nila, sa 
											makatuwid ang isang paglingap--ama ng 
											pamahalaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagbabagong sa paano?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa halimbawa: magbigay ng lalong 
											malaking paggalang sa kamahalan ng 
											bawa't tao, bigyan ng lalong 
											malaking kapanatagan ang bawa't 
											mamayan, bawasan ng lakas ang 
											hukbong may sandatana, bawasan ng 
											mga kapangyarihang ang hukbong itong 
											totoong madaling magpakalabis sa 
											paggamit ng mga kapangyarihan iyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Elias,--ang isinagot ng 
											binata,--hindi ko po talos kung sino 
											kayo, datapuwa't nahuhulaan kong 
											kayo'y hindi isang taong karaniwan: 
											ibang-iba po kayong umisip at gumawa 
											kay sa mga iba. Matatarok po ninyo 
											ang aking isipan kung sabihin ko sa 
											inyong kung maraming kapintasan sa 
											kasalukuyang kalagayan ngayon ng mga 
											bagay, lalo ng sasama kung magbago. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Mapapagsasalita ko ang aking mga 
											kaibigan sa Madrid, 'bayaran lamang 
											sila,' makapagsasalita ako sa 
											Kapitan Heneral; nguni't walang 
											magagawang ano man ang mga kaibigan 
											kong iyon; walang kasukatang 
											kapangyarihan ang Kapitan Heneral na 
											ito upang magawa ang gayong karaming 
											pagbabago, at ako nama'y hindi 
											gagawa ng ano man upang makamtan ang 
											ganitong mga bagay, palibhasa'y 
											tanto kong totoo, na kung 
											katotohanan mang may malalaking mga 
											kapintasang masasabi sa mga 
											kapisanang iyan, sa mga panahong 
											ito'y sila'y kinakailangan, at sila 
											nga ang tinatawag na isang kasam-ang 
											ang kailangan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa malaking panggigilalas ni Elias 
											ay tumunghay at pinagmasdan si 
											Ibarra na malaki ang pagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po ba nama'y naniniwala rin sa 
											kasam-ang kailangan?--ang tanong na 
											nangangatal ng kaunting 
											tinig;--naniniwala po ba kayong upang 
											makagawa ng magaling ay 
											kinakailangang gumawa ng masama?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi; ang paniniwala ko sa 
											kasam-ang ang kailangan ay tulad sa 
											isang mahigpit na kagamutang ating 
											ginagamit pagka ibig nating 
											mapagaling ang isang sakit. Tingnan 
											ninyo; ang lupaing ito'y isang 
											katawang may dinaramdam na isang 
											sakit na pinaglamnan na, at ng 
											mapagaling ang katawang iya'y 
											napipilitan ang pamahalaang gumamit 
											ng mga paraang tunay nga't masasabi 
											ninyong napakatitigas at 
											napakababangis, datapuwa't 
											pinakikinabanga't kinakailangan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masama pong manggagamot, ginoo, 
											yaong walang hinahanap kung di ang 
											kung ano ang mga dinaramdam at ng 
											marapa, na ano pa't hindi 
											pinagsisikapang hanapin ang 
											kadahilanan o ang pinagmumul-an ng 
											sakit, at sakali't natatalastas man 
											ay natatakot na bakahin. Ang tanging 
											kaukulan ng Guwardiya Sibil ay ito: 
											paglipol ng mga katampalasanang gawa 
											sa pamamag-itan ng lakas at ng lagim 
											sa pagpapahirap sa may sala, 
											kaukulang hindi nasusunduan at hindi 
											natutupad kung di kung nagkakataon 
											lamang. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											At hindi dapat limuting kaya 
											lamang nakapaghihipit sa bawa't tao 
											ang samahan, ang kapisanan baga ng 
											mga mamamayan, ay kung sakali't 
											ibinibigay na sa lahat ang lahat ng 
											mga kinakailangang gamit upang 
											malubos ang kagalingan ng kanilang 
											mga asal. Palibhasa'y walang 
											kapisanan ng mga mamamayan dito sa 
											atin, sapagkat hindi nagkakaisang 
											loob ang bayan at ang pamahalaan, 
											ang pamahalaang ito'y marapat na 
											magpatawad sa mga kamalian, hindi 
											lamang dahil sa siya ma'y 
											nagkakailangan din ng mga 
											pagpapatawad kung di naman sapagkat ang taong kanyang 
											pinabayaa't hindi liningap ay hindi 
											lubos nanagot sa kasalanang kanyang 
											magawa, yamang hindi tumanggap ng 
											malaking kaliwanagan ang kanyang 
											isip. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Bukod sa rito, ayon sa inyong 
											halimbawang bigay, ang ginagamit na 
											gamot ay lubhang napakapangwasak, na 
											ano pa't ang pinahihirapan lamang ay 
											ang bahagi ng katawang walang sakit, 
											na pinapanghihina at sa ganito'y 
											talagang inihahanda at ng lalong 
											madaling kapitan ng sakit. Hindi po 
											ba ang lalong magaling ay bigyang 
											kalakasan ang bahagi ng katawang may 
											sakit at bawasan ng kaunti ang 
											kabangisan ng gamot?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung pahinain ang kapangyarihan ng 
											Guwardiya Sibil ay ilalagay naman 
											napanganib ang kapanatagan ng mga 
											bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang kapanatagan ng mga bayan!--ang 
											biglang sinabi ni Elias ng&nbsp; buong&nbsp; 
											kapaitan. Hindi malaho't darating sa 
											ikalabinglimang taon mula ng magka 
											Guwardiya Sibil ang mga bayang ito, at 
											tingnan po ninyo: hangga ngayo'y 
											mayroon pa tayong mga tulisan, 
											nariringig pa nating nilolooban ang 
											mga bayan, nanghaharang pa sa mga 
											daan; patuloy ang mga pangangagaw at 
											pagnanakaw, na hindi napagsisiyasat 
											kung sinosino ang mga gumagawa ng 
											gayon; nananatili ang mga kasam-ang 
											gawa, nguni't lumalaya ang tunay na 
											masamang tao, datapuwa't hindi gayon 
											ang tahimik na mamamayan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ipagtanong 
											po ninyo sa bawa't mabuting taong 
											namamayan kung kanyang minamagaling 
											ang Guwardiya Sibil kung ipinalalagay 
											niyang ito'y iisang tangkilik ng 
											pamahalaan, at hindi isang kaloob na 
											pilit, isang pamahalaang kalupitang 
											ang mga napapakalabis na mga gawa'y 
											nakapagpapahirap pa ng higit kay sa 
											mga katampalasanan ng mga 
											masasasamang tao. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tunay na nga't ang 
											mga katampalasanang ito'y lubhang 
											malalaki, nguni't bihibihira lamang, 
											at sa lahat ng mga katampalasanang 
											iya'y may kapahintulitan ang sino 
											mang makapagsanggalang; datapuwa't 
											laban sa mga kapaslangang gawa ng 
											mga Guwardiya Sibil ay hindi 
											itinutulot kahi't ang pagtutol man 
											lamang, at kung hindi man sakali 
											totoong malalaki nguni't ang kapalit 
											nama'y sa tuwi-tuwi na at may 
											kapahintulutan ang mga pinuno. Ano 
											ang nagiging bunga ng Guwardiya 
											Sibil 
											sa pamumuhay ng ating mga bayan? 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pinatitigil ang pakikipanayam ng 
											bayan sa kapwa bayan, sapagkat 
											natatakot ang lahat na sila'y 
											mapahirapan&nbsp;sa mga walang kabuluhang 
											bagay; lalong tinitingnan ang mga 
											pagtupad sa dakong labas at hindi 
											pinagkukuro ang sumasadakong loob ng 
											mga bagay; unang pagpapakilala ng 
											kasalatan sa kaya; dahil sa 
											nalimutan lamang ng isang tao ang 
											kaniyang sedula personal ay 
											ginagapos na't pinahihirapan, na 
											hindi winawari kung ang taong iyo'y 
											mahal at kinaaalanganan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Inaakala ng 
											mga puno na ang kanilang pangulong 
											katungkula'y ang ibatas na sila'y 
											pagpugayan ng kusa o sapilitan, 
											kahit sa gitna ng kadiliman ng gabi, 
											at sa bagay na ito'y tinutularan 
											sila ng kanilang mga sakop upang 
											magpahirap at mangagaw sa mga taga 
											bukid, at sa gayong gawa'y hindi 
											sila nawawalan ng sangkalan, wala 
											ang pagpipitagan sa kadakilaan ng 
											tahanang bahay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi pa nalalaong 
											sinalakat ng mga guwardiya sibil, na 
											nangagdaan sa bintana, ang bahay ng 
											isang payapang mamamayan, na 
											pinagkakautangan ng salapi at ng 
											magandang loob ng kanilang puno; 
											wala ang kapanatagan ng tao; pagka 
											kinakailangan nilang linisin ang 
											kanilang kuartel o ang bahay, sila'y 
											lumalabas at kanilang hinuhuli ang 
											lahat ng hindi lumalaban, upang 
											pagawin sa&nbsp; buong&nbsp; maghapon; ibig pa 
											po ba ninyo? </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Samantalang ginagawa 
											ang mga kapiyestahang ito'y 
											nagpatuloy na walang bagabag ang mga 
											larong bawal, nguni't kanilang 
											pinatigil ng&nbsp; buong&nbsp; kalupitan ang 
											mga pagsasayang pahintulot ng may 
											kapangyarihan; nakita ninyo kung ano 
											ang inisip ng bayan tungkol sa 
											kanila, ano po ang nakuha sa 
											paglulubag ng kanyang galit upang 
											umasa sa tapat na hatol ng mga tao? 
											Ah, ginoo, kung ito po ang inyong 
											tinatawag na pagpapanatili ng 
											kahusayan!....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasang-ayon akong mayroon ngang 
											mga kasamaan,--ang isinagot ni 
											Ibarra, nguni't tinatanggap nating 
											ang mga kasamaang ito dahil sa mga 
											kagalingang kanilang taglay. 
											Mangyayaring may mga ipipintas sa 
											Guwardiya Sibil, datapuwa, maniwala po 
											kayo, at nakahahadlang na dumami ang 
											mga masasamang tao, dahil sa 
											pagkalagim sa mga pahirap na 
											ginagawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang sabihin pa nga ninyo'y dahil sa 
											pagkalagim na ito'y nararagdagan ang 
											dami,--ang itinutol ni Elias.--Nang 
											hindi pa itinatatag ang Guwardiya 
											Sibil, ang lahat ng mga tulisan 
											halos, liban na lamang sa iilan, 
											nangagsisisama dahil sa gutom; 
											nangagnanakaw at nangangagaw upang 
											sila'y huwag mamatay ng gutom.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nguni't kung makaraan na ang 
											pananalat, muling nawawala ang 
											panganib sa mga daan; sukat na, 
											upang sila'y mapalayo, ang mga 
											kaawaawa, nguni't matatapang na mga 
											kuadrillero, na walang dala kung di 
											mga sandatang walang malalaking 
											kahulugan, iyang mga taong totoong 
											pinaratangan ng di sapala ng mga 
											nagsisulat tungkol sa ating lupain; 
											iyang mga taong walang ibang 
											karapatan kung hindi ang mamatay at 
											walang ibang tinatanggap na ganting 
											pala kung di libak. ngayo'y may mga 
											tulisan, at mga tulisan hanggang sa&nbsp; 
											buong&nbsp; buhay nila. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Isang munting 
											kamalian, isang kasalanang 
											pinarusahan ng&nbsp; buong&nbsp; kalupitan, 
											ang paglaban sa mga pagpapakalabis 
											ng mga may kapangyarihan, ang takot 
											na kakilakilabot sa mga 
											pagpapahirap, ang lahat ng ito'y 
											siyang sa kanila'y nagtatapon 
											magpakailan man sa labas ng 
											pamamayan at siyang sa kanila'y 
											ninilit na pumatay o mamatay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											mga kalagimlagim na pahirap ng 
											Guwardiya Sibil ang siyang sa kanila'y 
											humahadlang sa pagsisisi, at 
											sapagkat malaki ang kahigtan ng 
											tulisan sa Guwardiya Sibil, na 
											kanilang pinaglalaruan lamang, sa 
											pakikihamok at pagsasanggalang sa 
											kabundukan, ang nangyayari'y kulang 
											tayo sa kaya upang malipol natin ang 
											kasamaang tayo rin ang nagtatag. 
											Alalahanin po ninyo kung gaano ang 
											nagawa ng katalinuhan ng kapitan 
											general na si De la Torre; ang 
											patawad na ipinagkaloob niya sa mga 
											kahabaghabag na iyan ang siyang 
											nagpatotoong tumitibok pa sa mga 
											kabundukang iyon ang puso ng tao at 
											walang hinihintay kung di ang 
											kapatawaran. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pinakikinabangan ang 
											paglagim, pagka alipin ang bayan, 
											pagka walang mga yungib ang bundok, 
											pagka makapaglalagay ang 
											nakapangyayari ng isang bantay sa 
											likuran ng bawa't kahoy, at pagka sa 
											katawan ng alipin ay wala kung di 
											sikmura at bituka; nguni't pagka 
											nararamdaman ng wala ng pagkasiyahan 
											sa sama ng loob na nakikihamok upang 
											siya'y mabuhay, na ang bisig niya'y 
											malakas, na tumitibok ang kanyang 
											puso at nag-aalab sa poot ang 
											kanyang katauhan, mangyayari kayang 
											mapugnaw ang sunog na kanyang 
											ginagatungan at ng lalong magningas?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinapag-alinlangan po ninyo ako, 
											Elias, sa aking pagdingig sa inyong 
											mga sinasabi; maniniwala akong 
											kayo'y sumasakatuiran kung di lamang 
											may sarili akong mga pananalig. 
											nguni't liningin po ninyo ang isang 
											nangyayari, huwag ninyong 
											ikagagalit, sapagkat kayo'y hindi 
											ko ibinibilang, palibhasa'y 
											ipinalalagay kong kayo'y tangi sa 
											mga iba;--masdan ninyo kung sinosino 
											ang humihingi ng mga pagbabagong 
											iyan ng mga kautusan! Halos ang 
											lahat ay masasamang mga tao o 
											malapit ng mangagsisama!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masasamang tao o malapit ng 
											magsisama; nguni't ano ang dahil at 
											sila'y mga gayon? Dahil sa linigalig 
											ang kanilang katahimikan, dahil sa 
											sinugatan sila sa lalong kanilang 
											mga pinakamamahal, at ng sila'y 
											huminging tangkilik sa Hustisya, 
											lubos nilang napagkilalang wala 
											silang maaasahan kung di ang 
											kanilang sariling lakas. Datapuwa't 
											nagkakamali po kayo, ginoo, kung ang 
											isip ninyo'y ang masasamang tao 
											lamang ang siyang humihingi ng 
											tangkilik sa Hustisya; pumaroon kayo 
											sa bawa't bayan, sa bahay bahay. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ulinigin po ninyo ang mga buntong 
											hiningang lihim ng mga 
											magkakasambahay, at maniniwala 
											kayong ang mga kasamaang linilipol 
											ng Guwardiya Sibil ay kasing laki rin 
											o marahil ay maliit pa sa mga 
											kasamaang sa tuwi na'y kanyang 
											ginagawa. Dahil po ba rito'y 
											ipalalagay nating pawang masasamang 
											mga tao ang lahat ng mga mamamayan? 
											Kung gayo'y, ano't sila'y 
											ipagsasanggalang pa sa mga iba? 
											bakit hindi lipulin silang lahat?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil dito'y may mga ilang 
											kamaliang hindi ko napagwawari 
											ngayon, marahil may kamalian sa 
											balak na sinisira pagdating sa 
											paggawa, sapagkat sa Espa&ntilde;a, sa 
											Inang-Bayan, ang Guwardiya Sibil ay 
											gumawa at gumagawa ng totoong 
											malalaking mga kagalingan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naniniwala ako; marahil doo'y 
											magaling ang pagkakatatag, hirang 
											ang mga taong gumaganap ng 
											tungkuling iyan; baka kaya naman 
											talagang kinakailangan ng Espa&ntilde;a ang 
											Guwardiya Sibil, datapuwa't hindi 
											kailangan ng Filipinas. Ang ating 
											mga kaugalian, ang anyo ng ating 
											pamumuhay, na lagi ng sinasambit 
											pagka ibig na ipagkait sa atin ang 
											ano mang ating katuwiran, nguni't 
											kanilang lubos na linilimot pagka 
											mayroong ano mang pas-aning ibig 
											nilang iatang sa atin. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											At sabihin po 
											ninyo sa akin, ginoo; bakit hindi 
											gumaya ang ibang mga nacion sa 
											pagtatatag ng Guwardiya Sibil, gayong 
											dahil sa kanilang kalapitan sa 
											Espa&ntilde;a'y marahil dapat nilang 
											ipalagay na sila'y higit ang 
											kahalagahan kay sa Pilipinas? Baka 
											po kaya dahil sa hindi totoong 
											napakadalas ang mga pagnanakaw at 
											pangangagaw sa ferrokarril, hindi 
											totoong marami ang mga panggugulong 
											ginagawa ng mga taong bayan, hindi 
											totoong marami ang pumapatay ng tao 
											at hindi maraming totoo sa mga 
											malalaking pangulong bayan ang 
											nananaksak ng sundang?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumungo si Ibarra na parang 
											nag-iisip-isip, nagtindig pagkatapos 
											at saka sumagot:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kinakailangang pagdilidilihing 
											magaling, kaibigan, ang bagay na 
											ito; kung makita ko sa aking mga 
											pagsisiyasat na sumasakatuwirang 
											tunay ang mga daing na iyan, susulat 
											ako sa aking mga kaibigan sa Madrid, 
											yamang wala tayong mga diputado 
											(kinakatawan). Samantala'y maniwala 
											po kayong nagkakailangan ang 
											pamahalaan ng isang hokbong 
											magkaroon ng lakas na walang taning 
											na guhit upang makapagpagalang, at 
											kapangyarihan upang makapag-utos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mabuti po iyan, ginoo, kung na sa 
											kasalukuyang nakikipagbaka ang 
											pamahalaan sa lupaing ito, nguni't 
											sa ikagagaling ng pamahalaa'y hindi 
											dapat nating ipahalata sa bayang 
											siya'y nasasalungat sa may 
											kapangyarihan. Datapuwa't sakali't 
											gayon nga, kung lalong minamagaling 
											natin ang gumamit ng lakas kay sa 
											papangyarihin ang kusang 
											alang-alang, dapat sana nating 
											pakatingnang magaling muna kung 
											kaninong kamay natin ibinibigay ang 
											lakas na itong walang ano mang guhit 
											ang abot, iyang kapangyarihang 
											walang pangpangin. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang ganyang 
											pagkalakilaking lakas sa kamay ng 
											mga tao, at mga taong hangal, puspos 
											ng mga hidwang hilig, na walang 
											pinag-aralang kagalingan, ang 
											katulad ay isang sandata sa mga 
											kamay ng isang ulol, na na sa gitna 
											ng karamihang taong walang ano mang 
											pangsanggalang. Sumasang-ayon na ako 
											at ibig kong maniwalang gaya ninyo, 
											na nagkakailangan ang pamahalaan ng 
											kawaning iyan, datapuwa't hirangin 
											sanang magaling ang kawaning iyan, 
											hirangin ang lalong may mga 
											karapatan, at sapagkat lalong 
											minamagaling niya ang siya'y 
											magbigay sa sarili ng kapangyarihan 
											sa siya'y bigyang kusa ng bayan ng 
											kapangyarihang iyan, ipakita man 
											lamang sana niyang marunong siyang 
											magbigay ng kapangyarihan sa sarili.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marubdob at masilakbo ang pananalita 
											ni Elias; nagniningning ang kanyang 
											mga mata, at tumataginting ang 
											kanyang tinig. Sumunod ang isang 
											dakilang sandali na hindi pag-imik 
											ng dalawa: tila nananatiling tahimik 
											sa ibabaw ng tubig ang bangkang 
											hindi pinasusulong ng sagwan; 
											dakilang lumiliwanag ang buwan sa 
											isang langit na zafir; may ilang 
											ilaw na kumikinang sa dakong malayo 
											sa pampang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ano pa ang kanilang 
											hinihingi?--ang tanong ni Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagbabagong utos tungkol sa mga 
											sacerdote,--ang sagot ni Elias, na 
											ang tinig ay nanglulupaypay at 
											malungkot;--humihinging tangkilik ang 
											mga kulang palad laban sa....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Laban sa mga kapisanan ng mga 
											prayle?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Laban sa mga umaapi sa kanila, 
											ginoo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalimutan na baga ng Filipinas ang 
											kanyang kautangan sa mga prayleng 
											ito? nalimutan na baga nila ang 
											hindi maulatang utang na loob sa mga 
											nagligtas sa kanila sa kamalian 
											upang sa kanila'y ibigay ang 
											pananampalataya, ang mga sa kanila'y 
											tumangkilik sa mga kalupitan ng mga 
											pinunong bayan? Narito ang kasamaan 
											ng hindi pagtuturo ng kasaysayan ng 
											mga nangyari sa bayan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoo,--ang muling isinagot niyang 
											may katigasan ang tinig;--isinumbat 
											po ninyong ang baya'y hindi marunong 
											kumilala ng utang na loob, itulot 
											ninyong akong isa sa mga bumubuo ng 
											bayang iya'y aking ipagsanggalang 
											siya. Ang mga kagalingang ginagawa 
											sa kapwa tao upang maging 
											karapatdapat na kilanling utang na 
											loob, kinakailangang gawin ng walang 
											ano mang imbot na kapakinabangan. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Huwag na nating bigyang kahulugan 
											ang katungkulang kusang iniatang sa 
											sarili, at ang totoong karaniwan ng 
											sabihing pagkakaawang-gawang atas sa 
											mga kristiano; huwag na nating 
											pansinin ang Historia (kasaysayan ng 
											mga nangyari), huwag na nating 
											itanong kung ano ang ginawa ng 
											Espa&ntilde;a sa bayang judio na nagbigay 
											sa&nbsp; buong&nbsp; Europa ng isang aklat, ng 
											isang religion at ng isang Diyos; 
											kung ano ang ginawa sa bayang arabe 
											na sa kanya'y nagbigay ng 
											kagandahang asal, mapagpaumanhin 
											tungkol sa kanyang religion at 
											siyang sa kanya'y pumukaw ng 
											pag-ibig sa dangal ng kanyang 
											sariling nacion, pag-ibig na dating 
											nagugulaylay at halos wasak na sa&nbsp; 
											buong&nbsp; panahong siya'y nasakop ng 
											kapangyarihan ng mga romano at ng 
											mga godo. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sinasabi po ninyong sa 
											ami'y ibinigay ang pananampalataya 
											at kami'y iniligtas sa kamalian; 
											tinatawag po ba ninyong 
											pananampalataya iyang mga gawang 
											pakitang tao, tinatawag ba ninyong 
											religion iyang pangangalakal ng mga 
											korrea at mga kalmen, tinatawag ba 
											ninyong katotohanan iyang mga himala 
											at mga kathang pinag-ugnay-ugnay na 
											nariringig namin sa araw araw? Ito 
											baga ang kautusan ni Jesukristo? 
											Kung sa ganito lamang ay hindi 
											kinakailangang papako sa kruz ang 
											isang Diyos, at gayon ding hindi 
											kailangang tayo'y pilitin sa walang 
											hanggang pagkilalang utang na loob; 
											malaon ng dating may pinananaligang 
											laban sa katotohanan at sa 
											katuwiran, na ano pa't walang 
											kinakailangan kung di bigyang kinang 
											ang pananalig na iya't pataasin ang 
											halaga ng mga kalakal. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Marahil 
											sabihin po ninyo sa aking kahi't 
											ipalagay ng malalaking totoo ang mga 
											kapintasang magagawa sa ating 
											religion, ngayo'y lalong magaling, 
											gayon man, sa religiong dating 
											sinusunod natin; naniniwala ako't 
											sumasang-ayon, datapuwa't malabis 
											namang napakamahal, sapagkat dahil 
											sa religiong iyang kanilang dinala 
											rito'y binitiwan natin ang ating 
											kasarinlan; dahil sa religiong iya'y 
											ibinigay natin sa kanyang mga 
											sacerdote ang ating lalong 
											magagaling na mga bayan, ang ating 
											mga bukirin at sampu ng ating mga 
											iniimpok na salapi sa pagbili ng mga 
											sangkap sa pamimintakasi. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sila'y 
											nagdala rito sa atin ng isang bagay 
											na hanap buhay ng taga ibang lupain, 
											pinagbabayaran nating magaling at 
											yamang gayo'y walang kautangan ang 
											isa't isa. Sakali't ang sasabihin ay 
											ang kanilang pagkakatangkilik sa 
											atin laban sa mga 'enkomendero', ang 
											maisasagot ko sa inyo'y kaya tayo'y 
											nahulog sa kamay ng mga 
											enkomendero'y dahil din sa kanila; 
											datapuwa't hindi, aking kinikilalang 
											isang tunay na pananampalataya at 
											isang tunay na pagsinta sa 
											Sangkatauhan ang siyang pamatnugot 
											sa mga unang misionerong naglakbay 
											sa mga pasigang ito: kinikilala ko 
											ang kautangang loob natin sa mga 
											mahal na pusong iyon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Aking 
											nalalamang ng panahong iyo'y sagana 
											sa Espa&ntilde;a ng bayani sa lahat ng 
											bagay, sa religion, sa politika, sa 
											natutungkol sa pamamayan at gayon 
											din sa militar. Datapuwa't dahil 
											bagang pawang mga mababait at banal 
											ang mga nuno nila'y ipagpapaubaya na 
											natin ang mga hidwang pagpapalampas 
											ng kanilang isip ng mga inapo? Dahil 
											po bagang ginawan tayo ng malaking 
											kagalinga'y magiging kasalanan na 
											natin ang sumansalang gawan nila 
											tayo ng isang kasamaan? Hindi 
											hinihingi ng bayang alisin, ang 
											hinihingi lamang ay gawin ang mga 
											pagbabagong utos na kahilingan ng 
											mga bagong kalagayan at ng mga 
											bagong mga pangangailangan ngayon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinisinta ko ang ating kinamulatang 
											lupang gaya rin ng pagsintang 
											magagawa po ninyo, Elias; 
											nawawatasan ko ng kaunti ang inyong 
											hangad, naringig kong magaling ang 
											inyong sinabi, at gayon man, 
											kaibigan ko, aking inaakalang 
											pinapag-uulap ng kaunti ang ating 
											isip ng kasilakbuhan ng loob; dito'y 
											hindi nakikita ang pangangailangan 
											ng mga pagbabagong utos, na marahil 
											magaling sa mga ibang lupain.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diyata po't gayon, ginoo?--ang 
											itinanong ni Elias, na iniunat ang 
											mga kamay sa panglulupaypay;--hindi 
											po ninyo nakikita ang 
											pangangailangan ng mga pagbabagong 
											utos, kayo pa namang nagtamo ng mga 
											kasakunaan sa inyong mga familia?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, linilimot ko ang aking sariling 
											mga kahirapan at ang tinitingnan 
											ko'y ang kapanatagan ng Filipinas, 
											ang mga kagalingan ng Espa&ntilde;a!--ang 
											masilakbong itinugon ni Ibarra. 
											Upang manatili ang Filipinas ay 
											kinakailangang huwag baguhin ang 
											nakikita nating kalagayan ng mga 
											prayle ngayon, at sa pakikipag-isa 
											sa Espa&ntilde;a naroroon ang kagalingan ng 
											ating bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Natapos ng makapagsalita si Ibarra'y 
											nakikinig pa si Elias; malungkot ang 
											kanyang pagmumukha, nawala ang 
											ningning ng kanyang mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay ngang ginahis at pinasuko ng 
											mga prayle ang lupaing ito, inaakala 
											po ba ninyong dahil sa mga prayle 
											kaya mangyayaring manatili ang 
											Filipinas?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Opo, dahil lamang sa kanila, gayon 
											ang pananalig ng lahat ng mga 
											sumulat tungkol sa Pilipinas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oh!--ang biglang naibigkas ni Elias, 
											na biglang binitiwan ng&nbsp; buong&nbsp; 
											panglulupaypay ang sagwan sa loob ng 
											bangka;--hindi ko akalaing napakaimbi 
											ang inyong pagpapalagay sa 
											pamahalaan at sa bayan. Bakit hindi 
											po pawalang halagahan na ninyo ang 
											baya't ang pamahalaan? Ano po ba ang 
											wiwikain ninyo sa isang pamahalaang 
											kaya lamang nakapag-uutos ay hindi 
											sa siya'y gumagamit ng daya, isang 
											pamahalaang hindi marunong 
											magpapitagan dahil sa kanyang 
											sariling gawa? </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ipatawad po ninyo, 
											ginoo, datapuwa't sa akala ko'y 
											haling at kusang nagpapakamatay ang 
											inyong pamahalaan, yamang kanyang 
											ikinatutuwang paniwalaan ng madla 
											ang mga gayong bagay! 
											Pinasasalamatan ko po sa inyo ang 
											kagandahan ng inyong loob, saan po 
											ibig ninyong ihatid ko kayo ngayon?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag,--ang muling sinabi ni 
											Ibarra;--mag-usap tayo, 
											kinakailangang matalastas kung sino 
											ang sumasakatwiran sa ganyang bagay 
											na totoong mahalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipatawad po ninyo, ginoo,--ang sagot 
											ni Elias na umiling;--hindi ako 
											totoong magaling sa pananalita upang 
											kayo'y aking mahikayat sa 
											paniniwala; tunay nga't ako'y 
											nag-aral ng kaunti, nguni't ako'y 
											isang 'indio', alapaap ang inyong 
											loob tungkol sa aking pamumuhay, at 
											kailan ma'y magkukulang tiwala kayo 
											sa aking mga sinabi. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang mga 
											nagsaysay ng kaisipang laban sa mga 
											sinabi ko'y pawang mga kastila, at 
											sapagkat mga kastila, kahi't 
											sila'y magsalita ng mga walang 
											kabuluhan o kahalingan, ang kanilang 
											sabihi'y pinapagtitibay ng kanilang 
											anyo, ng kanilang dangal at 
											katungkulan at ng kanilang 
											pinanggalingang lahi, kaya't aking 
											tikang hindi ko na mulimu-ing 
											tututulan magpakailan man. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Bukod sa 
											rito, sa aking pagkakitang kayo, na 
											sumisinta sa lupang inyong tinubuan, 
											kayo na may amang nagpapahingalay sa 
											ilalim ng mga payapang daluyong na 
											ito, kayo na talagang hinamit, 
											linait at pinag-usig, gayon ma'y 
											tinataglay ninyo ang ganyang mga 
											kaisipan, bagaman sa lahat ng inyong 
											dinanas at sa inyong dunong, 
											nagpapasimula na ako ng 
											pag-aalinlangan sa aking sariling 
											mga paniniwala, at aking tinatanggap 
											ang balak na mangyayaring 
											nagkakamali ang bayan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Aking 
											sasabihin doon sa mga kulang palad 
											na isinakamay ng mga tao ang 
											kanilang pag-asa, na ang pag-asang 
											iya'y ilagay nila sa Diyos o sa 
											kanilang mga bisig. Muling 
											napasasalamat po ako sa inyo at 
											kayo'y mag-utos kung saan dapat 
											ihatid ko kayo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tumatagos, 
											Elias, hanggang sa aking puso ang 
											inyong masasaklap na mga pananalita. 
											Ano po ang ibig ninyong gawin ko? 
											Hindi ako mag-aral sa kasamahan ng 
											mga anak ng bayan, kaya't marahil 
											hindi ko talos ang kanilang mga 
											kailangan; sa&nbsp; buong&nbsp; kamusmusan 
											ko'y doon ako natira sa kolegio ng 
											mga Jesuita lumaki ako sa Europa, 
											ang mga aklat lamang ang siyang 
											ininuman ng aking pag-iisip at ang 
											aking nabasa lamang ay yaong 
											nailathala ng mga tao: nananatili sa 
											gitna ng mga dilim ang hindi 
											sinasabi ng mga sumusulat ng mga 
											aklat, ang mga iya'y hindi ko alam. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Gayon ma'y iniibig kong gaya rin 
											naman ng inyong pag ibig ang ating 
											bayang tinubuan hindi lamang 
											sapagkat katungkulan ng lahat na 
											pakaibigin ang lupaing kanyang 
											pinagkakautangan ng kanyang katauhan 
											at marahil pagkakautangan naman ng 
											kahulihulihang pahingalayan; hindi 
											lamang sapagkat ganyan ang itinuro 
											sa akin ng aking ama, kung di naman 
											sapagkat ang aking ina'y 'india', at 
											sapagkat diyan nabubuhay ang lalong 
											matitimyas na aking linasap na 
											sumasaalaala ko tuwing bukod sa 
											rito'y siya'y aking sinisinta, 
											sapagkat siya ang pinagkautangan at 
											pagkakautangan ng aking ligaya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At sinisinta ko siya sapagkat siya 
											ang pinagkakautangan ko ng aking 
											kasaliwaang palad!--ang ibinulong ni 
											Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya 
											nga, kaibigan ko; nalalaman ko pong 
											nagpipighati kayo, kayo'y sawing 
											palad, at ito ang siyang sa inyo'y 
											nagpapamalas na madilim ang 
											hinaharap na panahon at siya namang 
											nakapangyayari sa anyo ng lakad ng 
											inyong pag-iisip; dahil dito'y hindi 
											ako makasang-ayong lubos sa inyong 
											mga karaingan. Kung mangyari sanang 
											masiyasat na magaling ang mga 
											kadahilanan, ang isang bahagi, ng sa 
											inyo'y mga nangyayari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iba ang mga pinanggalingan ng mga 
											sakunang nangyari sa akin; kung 
											matanto kong kahi't kaunti'y 
											pakikinabangan, sasaysayin ko ang 
											mga nangyaring iyan, sapagkat 
											bukod sa hindi ko inililihim ay 
											marami na ang nakatatalastas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Baka kaya sakali'y kung mapagtanto 
											ko ang mga bagay na iya'y magbagong 
											isipan ako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nag isip-isip na sandali si Elias.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayon, ginoo, sasabihin ko sa 
											inyo, sa maikling pananalita, ang 
											aking dinaanang buhay.</font></p>
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