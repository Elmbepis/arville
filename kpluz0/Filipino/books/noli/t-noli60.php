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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">LX. Mag-aasawa si Maria Clara</font></b></p>
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
											Natutuwa ng mainam si Kapitan Tiago. 
											Sa&nbsp; buong&nbsp; panahong itong 
											katakot-takot ay wala sino mang 
											nakialam sa kanya: hindi siya 
											ibinilanggo, hindi pinahirapan siya 
											sa pagkakulong na sino ma'y hindi 
											makausap, mga pagtanong, mga maquina 
											elektrika, mga walang likat na 
											pagbasa ng tubig mula sa talampakan 
											hanggang tuhod sa mga tahanang na sa 
											ilalim ng lupa, at iba pang mga 
											katampalasanang totoong kilala ng 
											mga tanging ginoong tumatawag sa 
											kanilang sarili ng 'sibilizado'. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang 
											kanyang mga kaibigan, sa makatuwid 
											baga'y ang kanyang naging mga 
											kaibigan (sapagkat tinalikdan na 
											nga ng lalaki ang kanyang mga 
											kaibigang filipino, mula sa 
											sandaling sila'y maging mga hinalain 
											sa gobierno), nangagbalik na naman 
											sa kanikanilang bahay, pagkatapos ng 
											ilang araw ng kanilang pagliliwaliw 
											sa mga bahay ng gobierno. Ang 
											kapitan general din ang siyang sa 
											kanila'y nagpalayas sa mga tahanang 
											kanyang pinamamahalaan, palibhasa'y 
											ipinalagay niyang hindi sila 
											karapatdapat na manatili roon, bagay 
											na lubhang ipinagdamdam ng pingkaw, 
											na ibig sanang ipagsaya ang malapit 
											ng dumating na pasko sa kasamahan ng 
											gayong mayayaman at masagana.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umuwi sa kanyang bahay si kapitang 
											Tinong na may sakit, putlain at 
											namamaga,--hindi nakagaling sa kanya 
											ang pagliliwaliw,--at lubhang 
											nagbago, na ano pa't hindi 
											nagsasalita ng kataga man lamang, 
											hindi bumabati sa kanyang mga 
											kasambahay, na tumatangis, 
											nagtatawa, nagsasalita at 
											nangahahaling sa galak ng loob. 
											Hindi na umaalis sa kanyang bahay 
											ang kahabaghabag na tao, at ng huwag 
											lumagay sa panganib na makabati sa 
											isang filibustero. Kahit ang pinsan 
											mang si Primitivo, bagaman taglay 
											niya ang&nbsp; buong&nbsp; karunungan ng mga 
											tao sa una, ay hindi makuhang siya'y 
											mapaimik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--<i>Crede, 
											prime,</i>--ang sabi sa 
											kanya;--pinisil sana nila ang liig mo 
											kung hindi ko sinunog ang lahat mong 
											mga papel; datapuwa't kung nasunog 
											ko sana ang&nbsp; buong&nbsp; bahay, hindi man 
											lamang sana hinipo kahi't ang buhok 
											mo. Pero&nbsp;<i>quod eventum, eventum; 
											Grakias agamus Domino Deo quia non 
											in Marianis Insulis es, kamoles 
											seminando</i>.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi kaila kay Kapitan Tiago ang 
											mga nangyaring katulad ng 
											pinagdanasan ni kapitan Tinong. 
											Nagkakanlalabis sa lalaki ang 
											pagkilalang utang na loob, bagaman 
											hindi niya maturol kung sino kaya 
											ang pinagkakautangan niya ng gayong 
											tanging mga pagtatangkilik. 
											Ipinalalagay ni tia Isabel na ang 
											bagay na iyo'y himala ng Birhen sa 
											Antipolo, ng Birhen del Rosario, o 
											kung hindi ma'y ng Birhen del 
											Carmen, at ang lalong kaliitang 
											kanyang mahihinala'y himala ng 
											Nuestra Se&ntilde;ora de la Correa: ayon sa 
											kanya'y hindi sasala sa alin man sa 
											kanila ang gumawa ng himala. Hindi 
											itinatanggi ni Kapitan Tiago ang 
											kababalaghan, nguni't idinurugtong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pinaniniwalaan ko, Isabel, 
											datapuwa't marahil ay hindi ginawang 
											mag-isa ng Birhen sa Antipolo; 
											marahil siya'y tinulungan ng aking 
											mga kaibigan, ng aking mamanugangin, 
											ni ginoong Linares, na nalalaman mo 
											nang binibiro pati ni ginoong 
											Antonio Canovas, iyon bagang 
											nakalagay ang larawan sa 
											'Ilustracion', iyong aayaw 
											papagingdapating ipakita sa mga tao 
											kung di ang kabiyak lamang ng 
											kanyang mukha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At hindi mapigil ng mabait na tao 
											ang isang ngiti ng kanyang 
											pagkatuwa, kailan ma't kanyang 
											maringig ang isang mahalagang balita 
											tungkol sa mga nangyari. At tunay 
											nga namang dapat ikatuwa. 
											Pinagbubulungbulunganang mabibitay 
											si Ibarra; sapagkat bagaman 
											maraming totoo ang mga kakulangang 
											pangpatibay upang siya'y 
											maparusahan, nitong huli'y may 
											sumipot na nagpapatotoo sa sumbong 
											na laban sa kanya; na may mga paham 
											na nagsaysay na maaari ngang kuta 
											ang eskuelahan, ayon sa anyo ng 
											pagkakagawa, bagaman may kaunting 
											kakulangan, bagay na siya na nga 
											lamang maaasahan sa hangal na mga 
											indio. Ang mga alingawngaw na ito 
											ang siyang sa kanya'y nakapapanatag 
											at nakapagpapangiti sa kanya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kung paano ang pagkakaiba ng mga 
											balak ni Kapitan Tiago at ng kanyang 
											pinsang babae, nangagkakahati naman 
											ang mga kaibigan ng familia sa 
											dalawang bahagi; nananalig ang isang 
											bahaging yao'y gawa ng himala, at 
											ang isang bahagi nama'y inaakalang 
											gawa yaon ng pamahalaan, bagaman ang 
											naniniwala ng ganito'y siyang lalong 
											kakaunti. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nagkakabahabahagi naman 
											ang mga nagpapalagay na yao'y 
											himala: nakikita ng sakristan mayor 
											sa Binundok, ng babaeng maglalako ng 
											kandila at ng puno ng isang 
											kofradia, ang kamay ng Diyos na 
											pinagagalaw ng Birhen del Rosario; 
											sinasabi naman ng insik na 
											magkakandila na siyang nagbibili ng 
											kandila kay Kapitan Tiago kung 
											siya'y napasasa Antipolo, kasabay 
											ang pagpapaypay at pag-ugoy ng mga 
											hita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--No siya osti gongong; Miligen li 
											Antipolo esi! Esi pueli mas kon 
											tolo; no siya osti gongong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinakamamahal ni Kapitan Tiago ang 
											insik na iyon, na nagpapanggap na 
											manghuhula, manggagamot, at iba pa. 
											Minsa'y sa pagtingin sa palad ng 
											kamay ng kanyang nasirang asawang na 
											sa ikaanim na buwan ang kabuntisan 
											ay humula ng ganito:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Si eso no homele y no paktaylo, 
											muje juete-juete!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At sumilang sa maliwanag si Maria 
											Clara upang maganap ang hula ng 
											hindi binyagan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Kapitan Tiago'y maingat at 
											matatakutin, kaya't hindi agad-agad 
											makapagpasiya na gaya ng ginawa ni 
											Padres na taga Troya, hindi niya 
											matangi ng gayon gayon lamang ang 
											isa sa dalawang Birhen, sa takot 
											niyang baka magalit ang isa sa 
											kanila, bagay na makapagbibigay ng 
											malaking kapahamakan.--'Mag 
											ingat!'--ang sabi niya sa kanyang 
											sarili;--'baka pa ipahamak natin!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Na sa ganitong pag aalinlangan siya, 
											ng dumating ang pangkat na kakampi 
											ng gobierno; si Donya Victorina, si 
											Don Tiburcio at si Linares.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagsalita si Donya Victorina sa 
											ngalan ng tatlong lalaki, bukod sa 
											nauukol sa kanyang sarili; binanggit 
											niya ang mga pagdalaw ni Linares sa 
											kapitan general, at inulit-ulit ang 
											kabutihang magkaroon ng isang kamag 
											anak na mataas na tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Na!--ang iwinakas,--komo izimos: el 
											que a buena zombra ze akobija buen 
											palo ze le arrima.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tum ... tum ... tumbalik, 
											babae!--ang isinala ng doktor.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											May tatlong araw ng ginagagad ni 
											Donya Victorina ang mga andaluz, sa 
											pamamag-itan ng pag-aalis n-g 'd' at 
											sa paghahalili ng 'z', at ang hangad 
											niyang ito'y walang makapag-alis sa 
											kanyang ulo; mamagalingin pa niyang 
											kanyang ipabugnos ang kanyang 
											postizong buhok na kinulot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Zi!--ang idinugtong, na ang 
											tinutukoy ay si Ibarra:--eze lo tenfa 
											muy merezio; yo ya lo ije kuando le 
											vi la primera vez; ezte un 
											filibuztero ique te ijo a ti, primo, 
											el general? Que le haz icho, que 
											notikias le izte e Ibarra?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ng makita niyang nalalaon ng 
											pagsagot ang pinsan, nagpatuloy ng 
											pananalita na si Kapitan Tiago ang 
											kinakausap:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Creame uzte, zi le konenan a 
											muelte, komo ez e ezperar, zera por 
											mi primo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong babae! ginoong babae!--ang 
											itinutol ni Linares. Datapuwa't 
											hindi niya ito binigyang panahon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ay, que iplomatiko te haz guerto! 
											Zabemoz qwe ere;i el konzejero del 
											General, que no puede vivir zin ti 
											... Ah, Clarita! que plaker e verte!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Humarap si Maria Clarang namumutla 
											pa, bagaman nananag-uli na ang 
											dating kagalingan ng katawang 
											pinapanghina ng sakit. Napupuluputan 
											ang mahabang buhok ng sutlang kintas 
											na may kulay bughaw. Kiming bumati, 
											ngumiti ng mapanglaw, at lumapit kay 
											Donya Victorina upang gawin ang 
											paghahalikang kaugalian sa mga 
											babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkatapos ng kaugaliang kumustahan, 
											nagpatuloy ng pananalita ang 
											nagpapanggap na andaluza:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Venimoz a visitaroz; oz haveiz 
											zalbao grakiaz a vuestraz 
											relacionez!&nbsp;na kanyang tinitingnan 
											ng makabulugan si Linares.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tinangkilik ng Diyos ang aking 
											ama!--ang marahang isinagot ng 
											dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Zi, Clarita, pero el tiempo e los 
											milagroz ya ha pazeo: rozotroz loz 
											ezpa&ntilde;olez ekimoz: ezkonfia e la 
											Birhen y ekhate a korre.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tum ... tum ... tumbalik!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Kapitan Tiago na hanggang sa 
											sandaling yao'y hindi nakakagiit sa 
											pananalita'y nangahas tumanong, at 
											bago pinakinggang magaling ang 
											sagot:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y inaakala po ba ninyo, 
											Donya Victorina, na ang Birhen ...?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Venimoz prekizamente a hablar kon 
											uzte e la&nbsp;<i>Birhen</i>,--ang 
											matilinghagang sagot ni Donya 
											Victorina, na itinuturo si Maria 
											Clara;--tenemoz que hablar e 
											negokioz.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napagkilala ng dalagang dapat niyang 
											lisanin ang nangagsasalitaan, kaya't 
											humanap siya ng dahilan at lumayo 
											roon, na nangangabay sa mga 
											kasangkapan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napakaimbi at napakalisya ang 
											salitaan at usapan sa pagpupulong na 
											ito kaya't minamagaling pa namin ang 
											huwag ng saysayin. Sukat ng sabihing 
											ng sila'y magpaalaman ay pawang 
											nangatutuwang lahat, at sinabi 
											pagkatapos ni Kapitan Tiago ang 
											ganito kay tia Isabel:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipasabi mo sa fonda, na bukas ay 
											mag-aalay tayo ng piging. Untiunting 
											ihanda mo si Maria Clara na ating 
											ipakakasal na hindi malalaon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan siya ni tia Isabel na 
											nagugulat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Makikita mo rin! Pagka naging 
											manugang na natin si ginoong 
											Linares, magmamanhik-manaog tayo sa 
											lahat ng mga palakio; pananaghilian 
											tayo, mangamamatay ang lahat sa 
											kapanahilian!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At sa gayon nga'y kinabukasan ng 
											gabi'y muli na namang puno ng tao 
											ang bahay ni Kapitan Tiago, at ang 
											kaibhan lamang ngayo'y pawang mga 
											kastila't insik lamang ang kanyang 
											mga inanyayahan; tungkol sa 
											magandang kabiyak ng katauha'y ipinakikiharap doon ng mga babaeng 
											kastilang tubo sa Espa&ntilde;a at sa 
											Pilipinas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naririyan ang pinakamarami sa ating 
											mga kakilala; si Padre Sibyla, si 
											Padre Salvi, na kasama ng ilang mga 
											frankiskano't mga dominiko; ang 
											matandang teniente ng guwardiya 
											sibil 
											na si ginoong Guevara, na lalo ng 
											mapanglaw ang mukha kay sa dati; ang 
											alperes na sinasaysay na makalibo na 
											ang kanyang dinanas na pakikibaka, 
											na minamasdan ang lahat ng&nbsp; buong&nbsp; 
											pagpapalalo, palibhasa'y sa akala 
											niya'y siya'y isang don Juan de 
											Austria sa katapangan. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ngayo'y 
											teniente siya't may gradong 
											komandante; si De Espada&ntilde;a, na 
											kanyang minamasdan ito ng&nbsp; buong&nbsp; 
											galang at takot at iniiwasan ang 
											kanyang titig, at si Donya Victorina 
											na nagngingitngit. Hindi pa 
											dumarating si Linares, sapagkat 
											palibhasa'y mahalagang ginoo, dapat 
											na siya'y magpahuli sa pagdating kay 
											sa mga iba: may mga taong 
											napakatungag, na ang akala'y kung 
											magpahuli ng isang oras sa lahat ng 
											bagay, nagiging malalaking tao na.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Maria Clara ang siyang tinutudla 
											ng mga upasala: sinalubong sila ng 
											dalaga ng alinsunod sa ugaling 
											pakikipagmahalan, na hindi nalilisan 
											ang kanyang anyong malungkot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Psh!--anang isang dalaga;--may 
											kaunting kapalaluan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magandaganda rin naman,--ang sagot 
											naman ng isang dalaga 
											rin;--datapuwa't ang lalaking iya'y 
											pumili sana ng ibang dalaga na hindi 
											totoong mukhang tanga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang salapi, kaibigan; ipinagbibili 
											ng makisig na binata ang kanyang 
											sariling katawan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kabilang dako'y ito naman ang 
											salitaan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pakakasal ngayong ang unang 
											nangibig sa kanya'y malapit ng 
											bitayin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tinatawag kong maingat ang ganyan; 
											pagdaka'y handa na ang kahalili.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, kung mabao!...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nariringig marahil ang gayong mga 
											salitaan ng dalagang si Maria Clara, 
											na nakaupo sa isang silla at 
											naghuhusay ng isang bandejang mga 
											bulaklak, sapagkat namamasid na 
											nangangatal ang kanyang mga kamay, 
											minsang mamutla't mangatlabing 
											makailan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Malakas ang salitaan sa pulutong ng 
											mga lalaki, at, ayon sa karaniwa'y 
											pinag uusapan nila ang ukol sa 
											huling mga nangyari. Nangag 
											salitaang lahat pati ni Don 
											Tiburcio, liban na lamang kay Padre 
											Sibyla, na nananatili sa 
											pagpapawalang halagang hindi 
											pag-imik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naringig kong lilisanin daw po 
											ninyo, Padre Salvi, ang bayan?--ang 
											tanong ng bagong teniente, na dahil 
											sa kanyang pagkataas sa katungkula'y 
											ngayo'y naging mairugin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala na akong sukat gawin sa bayang 
											iyan; sa Maynila na titira ako 
											magpakailan man ... at kayo po?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lilisanin ko rin ang bayan,--ang 
											isinagot na kasabay ang 
											pagtindig;--kinakailangan ako ng 
											gobierno, upang aking linisin ang 
											mga lalawigan sa mga filibustero, na 
											ang kasama ko'y isang pulutong ng 
											mga sundalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dagling tiningnan siya ni Padre 
											Salvi mula sa mga paa hanggang sa 
											ulo, at saka siya tinalikurang 
											lubos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay na bang nalalaman kung ano 
											ang kahihinatnan ng pangulo ng mga 
											tulisan, ng filibusterillo?--ang 
											tanong ng isang kawani ng 
											pamahalaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Si Crisostomo Ibarra ba ang 
											sinasabi ninyo?--ang tanong ng 
											isa.--Ang lalong mahihintay at siya 
											namang sumasakatuwiran ay siya'y 
											bitaying gaya ng mga binitay niyong 
											72.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Siya'y itatapon!--ang sinabing 
											mapanglaw ng matandang teniente.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Itatapon! Itatapon lamang siya! 
											nguni't marahil ay mananatili sa 
											tapunan magpakailan man!--ang biglang 
											sinabing sabaysabay ng ilan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung ang binatang iyan,--ang patuloy 
											na sinabi ng teniente Guevara, ng 
											malakas at anyong may galit;--ay 
											natutong mag-ingat; kung siya'y 
											natutong huwag tumiwalang totoo sa 
											mga tanging taong kanyang kasulatan; 
											kung hindi sana napakadunong ang 
											ating mga fiskal na magbigay 
											kahulugan ng napakalabis naman sa 
											nasusulat, pinasiyahan sanang walang 
											ano mang kasalanan ang binatang 
											iyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang pagpapatibay na ito ng matandang 
											teniente at ang anyo ng kanyang 
											tinig ay nagbigay ng malaking 
											panggigilalas sa mga nakikinig, na 
											walang nasabing ano man. Tumingin sa 
											ibang dako si Padre Salvi, marahil 
											ng huwag niyang makita ang titig na 
											mapanglaw ng matanda. Nalaglag sa 
											mga kamay ni Maria Clara ang mga 
											bulaklak at hindi nakakilos. Si 
											Padre Sibylang marunong sa hindi 
											pag-imik, tila mandin siyang tanging 
											marunong namang tumanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May sinasabi po ba kayong mga 
											sulat, ginoong Guevara?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinasabi ko ang sinalita sa akin 
											ng&nbsp;<i>defensor</i>&nbsp;(tagapagtanggol), 
											na gumanap ng kanyang katungkulan 
											ng&nbsp; buong&nbsp; kasipaga't 
											pagmamalasakit. Liban na lamang sa 
											ilang mga talatang may kulabong 
											pananalita, na isinulat ng binatang 
											ito sa isang babae, bago siya 
											yumaong ang tungo'y sa Europa, mga 
											talatang kinakitaan ng fiskal ng 
											isang balak at isang bala laban sa 
											gobyerno, na kanyang kinilalang siya 
											nga ang may sulat, walang 
											nasumpungang ano mang bagay na 
											mapanghawakan upang siya'y mabigyang 
											kasalanan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ang&nbsp;<i>deklaracion</i>&nbsp;(sinaysay) 
											ng tulisan bago siya mamatay?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nasunduan ng defensor na mawal-ang 
											halaga, sapagkat ayon din sa 
											tulisang iyon, sila'y hindi 
											nakipag-usap kailan man sa binata, 
											kung di sa isang nagngangalang Lucas 
											lamang, na kanyang kaaway, ayon sa 
											napatotohanan, at nagpakamatay, 
											marahil sa sigaw ng sariling budhi. 
											</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Napatotohanang pawang taksil na 
											gagad lamang ang mga letra ng 
											kasulatang nakuha sa bangkay niya, 
											sapagkat ang letra'y katulad ng 
											dating letra ni ginoong Ibarra ng 
											panahong may pitong taon na ngayon 
											ang nakararaan, datapuwa't hindi 
											katulad ng letra niya ngayon, bagay 
											na nagpapasapantahang ang gumamit na 
											huwaran ay itong sulat na ginamit 
											upang siya'y isumbong. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Hindi lamang 
											ito, sinasabi ng defensor, na kung 
											di raw kinilalang siya ang may titik 
											ng sulat na iyon, malaki sanang 
											kagalingan ang sa kanya'y nagawa, 
											datapuwa't pagkakita niya sa sulat 
											na iyo'y namutla siya, nasira ang 
											loob at pinagtibay ang lahat ng 
											doo'y natititik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang sabi po ninyo,--ang tanong ng 
											isang frankiskano;--ay nauukol ang 
											sulat na iyon sa isang babaeng 
											kanyang pinagpadalhan, ano at 
											dumating sa kamay ng fiskal?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot ang teniente; 
											tinitigang sandali si Padre Salvi, 
											at saka lumayo, na pinipilipit na 
											nangangatal ang matulis na dulo ng 
											kanyang balbas na ubanin, 
											samantalang pinag-uusapan ng mga iba 
											ang mga bagay na iyon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Diya'y nakikita ang kamay ng 
											Diyos!--anang isa;--kinasusutan siya 
											pati ng mga babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipinasunog ang kanyang bahay, sa 
											akala niyang sa gayo'y makaliligtas 
											siya, datapuwa't hindi niya naisip 
											ang nakalingid, sa makatuwid baga'y 
											ang kanyang kaagulo, ang kanyang&nbsp;<i>babae,</i>--ang 
											idinugtong ng isang tumatawa.--Talaga 
											ng Diyos! Santiago, ipagtanggol mo 
											ang Espa&ntilde;a!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y huminto ang matandang 
											militar, sa isa sa kanyang 
											pagpaparoo't parito, at lumapit kay 
											Maria Clara, na nakikinig ng 
											salitaan, hindi kumikilos sa kanyang 
											kinauupuan; sa mga paanan niya'y 
											naroroon ang mga bulaklak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kayo po'y isang dalagang totoong 
											matalino,--ang marahang sinabi sa 
											kanya ng teniente,--magaling po ang 
											inyong ginawa ng inyong pagkakabigay 
											ng sulat ... sa ganyang paraa'y 
											makaaasa kayong dalawa sa isang 
											mapanatag na hinaharap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita ng dalagang lumalayo ang 
											teniente na ang mga mata'y anyong na 
											hahaling at kinakagat ang mga labi. 
											Sa kagalingang palad ay nagdaan si 
											tia Isabel. Nagkaroon si Maria Clara 
											ng kasukatang lakas upang siya'y 
											tangnan sa damit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tia!--ang ibinulong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa iyo?--ang 
											itinanong ni tia Isabel, na gulat, 
											ng kanyang mamasdan ang mukha ng 
											dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ihatid po ninyo ako sa aking 
											kuarto!--ang ipinakiusap, at saka 
											bumitin sa kamay ng matanda upang 
											makatindig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May sakit ka, anak ko? Tila nawalan 
											ikaw ng mga buto? ano ang nangyayari 
											sa iyo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang hilo ... ang dami ng tao sa 
											salas ... ang dami ng ilaw ... 
											kinakailangan kong magpahinga. 
											Sabihin po ninyo sa tatay na 
											matutulog ako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nanglalamig ka! ibig mo ba ang kha?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umiling si Maria Clara, sinarhan ng 
											susi ang pinto ng kanyang tulugan, 
											at salat na sa lakas ay nagpatihulog 
											sa sahig, sa paanan ng isang larawan 
											at saka humagulhol:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ina! ina! aking ina!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pumapasok ang liwanag ng buwan sa 
											bintana at sa pintuang kanugnog ng 
											batalang bato.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpapatuloy ang musika ng pagtugtog 
											ng masasayang&nbsp;<i>vals</i>; 
											dumarating hanggang sa tulugan ang 
											mga tawanan at ang alingawngaw ng 
											mga salitaan; makailang tumugtog sa 
											kanyang pintuan ang kanyang ama, si 
											tia Isabel, si Do&ntilde;a Victorina at 
											pati si Linares, datapuwa't hindi 
											kumilos si Maria Clara: malakas na 
											hingal ang tumatakas sa kanyang 
											dibdib.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdaan ang mga horas: natapos ang 
											mga katuwaan sa mesa, nariringig ang 
											sayaw, naupos ang kandila at 
											namatay, datapuwa't nanatili ang 
											dalaga sa hindi pagkilos sa tablang 
											sahig, na liniliwanagan ng buwan, sa 
											paanan ng larawan ng Ina ni Jesus.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Untiunting nanag-uli ang bahay sa 
											katahimikan, nangamatay ang mga 
											ilaw, muling tumawag si tia Isabel 
											sa pintuan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, nakatulog!--anang tia ng sabing 
											malakas; palibhasa'y bata't walang 
											ano mang pinaninimdim, tumutulog na 
											parang patay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nang lubha ng tahimik ang lahat; 
											nagtindig si Maria Clara ng marahan 
											at lumingap sa kanyang paligid: 
											namasid ang batalang bato, ang 
											maliliit na mga balag, na 
											napapaliguan ng mapanglaw na liwanag 
											ng buwan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang mapanatag na hinaharap! 
											Tumutulog na parang patay!--ang 
											sinabi ng marahan at saka tinungo 
											ang batalang bato.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagugupiling ang kiudad, walang 
											nariringig na manakanaka kung di ang 
											ugong ng isang kotseng nagdaraan sa 
											tulay na kahoy sa ibabaw ng ilog, na 
											ilinarawan ng payapang tubig nito 
											ang sinag ng buwan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumingala ang dalaga sa langit na 
											ang kalinisa'y wangis sa zafir; 
											marahang hinubad ang kanyang mga 
											sinsing, mga hikaw, mga aguja at 
											peineta, inilagay niya ang lahat ng 
											ito sa palababahan ng batalan at 
											tiningnan ang ilog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Huminto ang isang bankang tigib ng 
											damo sa paanan ng ahunang nalalagay 
											sa bawa't bahay na na sa pampangin 
											ng ilog. Isa sa dalawang lalaking 
											nakasakay sa bangkang iyon ay 
											pumanhik sa hagdanang bato, linundag 
											ang pader, at ng makaraan ang 
											sandali'y naringig ang kanyang mga 
											paglakad na pumapanhik sa hagdanan 
											ng batalan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakita siya ni Maria Clarang tumigil 
											pagkakita sa kanya, nguni't sumandal 
											lamang, sapagkat untiunting 
											lumapit at tumigil ng tatlong 
											hakbang na lamang ang layo sa 
											dalaga. Umudlot si Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Crisostomo!--ang sinabing marahang 
											puspos ng takot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo, ako'y si Crisostomo!--ang 
											isinagot ng binata ng&nbsp; buong&nbsp; 
											kapanglawan.--Kinuha ako sa 
											bilangguang pinag absangan sa akin 
											ng aking mga kaibigan, ni Elias, 
											isang kaaway, isang taong may 
											katuwirang ako'y pagtamnan ng galit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumunod sa mga salitang ito ang 
											isang mapanglaw na hindi pag-imik; 
											tumungo si Maria Clara at inilawit 
											ang dalawang kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpatuloy ng pananalita si Ibarra:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isinumpa ko sa piling ng bangkay ng 
											aking inang ikaw ay aking 
											paliligayahin, kahi't ano man ang 
											aking karatnan! Mangyayaring 
											magkulang ikaw sa iyong isinumpa, 
											siya'y hindi mo ina; nguni't ako, 
											palibhasa'y ako ay anak niya, 
											pinakadadakila ko ang pag-aalaala sa 
											kanya, at kahi't nagdaan ako sa 
											libolibong panganib, naparito ako't 
											upang tuparin ang aking isinumpa, at 
											itinulot ng pagka-kataong ikaw rin 
											ang aking makausap. Maria, hindi na 
											tayo magkikitang muli; bata ka at 
											baka sakali'y sisihin ka ng iyong 
											sariling budhi ... naparito ako 
											upang sa iyo'y sabihin, bago ako 
											pumanaw, na pinatatawad kata. 
											ngayon, kahimana-wari'y lumigaya ka, 
											at paalam!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binanta ni Ibarrang lumayo, 
											datapuwa't pinigil siya ng dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Crisostomo!--anya;--sinugo ka ng 
											Diyos at ng ako'y iligtas sa walang 
											kahulilip na kapighatian ... 
											pakinggan mo ako at saka mo ako 
											hatulan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Matimyas na bumitiw sa kanya si 
											Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ako naparito't ng hingan 
											katang sulit ng ginawa mo ...; 
											naparito ako't ng bigyan katang 
											kapayapaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aayaw ako ng kapayapaang 
											inihahandog mo sa akin; ako ang 
											magbibigay sa akin din ng 
											kapayapaan! Pinawawal-an mo akong 
											halaga, at ang pagpapawalang halaga 
											mo'y siyang sampung sa kamatayan 
											ko'y magbibigay kapaitan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Namalas ni Ibarra ang masilakbong 
											sama ng loob at pagpipighati ng 
											abang babae, at tinanong niya ito 
											kung ano ang hinahangad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Na ikaw ay maniwalang sininta ko 
											ikaw kailan man!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ngumiti ng&nbsp; buong&nbsp; saklap si 
											Crisostomo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah! nagkukulang tiwala ka sa akin, 
											nagkukulang tiwala, ka sa iyong 
											katoto sa kamusmusan, na kailan ma'y 
											hindi ikinaila sa iyo ang isa man 
											lamang na kaisipan!--ang biglang 
											sinabi ng dalaga na 
											nagpipighati.--Aking natatarok ang 
											iniisip mo! Pagka napagtanto mo ang 
											aking buhay, ang malungkot na buhay 
											na ipinatanto sa akin ng panahong 
											ako'y may sakit, mahahabag ka sa 
											akin at hindi mo ngingitian ng 
											ganyan ang aking dalamhati. Bakit 
											baga't hindi mo pa binayaang ako'y 
											mamatay sa mga kamay ng hangal na 
											gumagamot sa akin? Ikaw sana't ako'y 
											liligaya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpahingang sumandali si Maria 
											Clara't saka nagpatuloy ng 
											pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inibig mo, nagkulang tiwala ka sa 
											akin, patawarin nawa ako ng aking 
											Ina! Sa isa sa mga kalagimlagim na 
											gabi ng aking masaklap na 
											pagkakasakit, ipinahayag sa akin ng 
											isang tao ang pangalan ng aking 
											tunay na ama, at ipinagbawal sa 
											aking ikaw ay aking sintahin ... 
											liban na lamang kung ang akin ding 
											ama ang magpatawad sa iyo sa 
											paglabag na sa kanya'y iyong ginawa!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umudlot si Ibarra at 
											nagugulumihanang tinitigan ang 
											dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo,--ang ipinagpatuloy ni Maria 
											Clara; sinabi sa akin ng taong iyong 
											hindi maitutulot ang ating 
											pag-iisang katawan, sapagkat 
											ibabawal sa kanya ng kanyang 
											sariling budhi, at mapipilitang 
											kanyang ihayag, kahi't magkaroon ng 
											malaking kasiraan ng puri, sapagkat ang aking ama'y si....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At saka ibinulong sa tainga ng 
											binata ang isang pangalang sa 
											kahinaan ng pagsasasalita'y si 
											Ibarra lamang ang nakaringig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang aking magagawa? Dapat ko 
											bang yurakin dahil sa aking pagsinta 
											ang pag-aalaala ko sa aking ina, ang 
											kapurihan ng aking amaamahan at ang 
											dangal ng aking tunay na ama? 
											Magagawa ko ba ito na hindi ikaw ang 
											unaunang magpapawalang halaga sa 
											akin?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't ang katibayan, nagkaroon ka 
											ba ng katibayan? Nangangailangan 
											ikaw ng katibayan!--ang biglang 
											sinabi ni Crisostomo, na parang 
											sinasakal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dinukot ng dalaga sa kanyang dibdib 
											ang dalawang papel.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Narito ang dalawang sulat nang 
											aking ina, dalawang sulat na 
											itinitik sa gitna ng mataos na sigaw 
											ng sariling budhi ng panahong taglay 
											pa niya ako sa kanyang tiyan. 
											Tanggapin mo't iyong basahin, at 
											iyong makikita kung paano ang 
											kanyang pagsumpa sa akin at 
											paghahangad na ako'y mamatay ..., 
											ang aking kamatayang hindi 
											nasunduan, bagaman pinagpilitan ng 
											aking ama, sa pamamag-itan ng mga 
											gamot! Nalimutan ang mga sulat na 
											ito nang aking ama, sa bahay na 
											kanyang tinahanan, nakuha ng taong 
											iyon at iningatan, at kaya lamang 
											ibinigay sa akin ay nang palitan ko 
											ng iyong sulat ..., di umano'y ng 
											siya raw ay makaasang hindi ako 
											pakakasal sa iyo kung walang 
											kapahintulutan ang aking ama. Buhat 
											ng daladalahin ko sa aking katawan 
											ang dalawang sulat na iyang naging 
											kapalit ng sulat mo, nakakaramdam 
											ako ng lamig sa aking puso. Aking 
											ipinahamak ikaw ipinahamak ko ang 
											aking sinta.... ano ang hindi 
											gagawin ng isang anak na babae sa 
											ikagagaling ng isang inang patay na 
											at ng dalawang amang kapwa buhay? 
											Akin bang masasapantaha man lamang 
											kung saan gagamitin ang iyong sulat?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanglulumo si Ibarra. Nagpatuloy si 
											Maria Clara:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano pa ang nalalabi sa akin? 
											masasabi ko ba sa iyo kung sino ang 
											aking ama, masasabi ko ba sa iyong 
											humingi ka sa kanya ng tawad, sa iyo 
											pa namang anak ng pinapaghirap niya 
											ng hindi kawasa? masasabi ko ba sa 
											aking ama na ikaw ay patawarin, 
											masasabi ko ba kanyang ako'y kanyang 
											anak, ako pa namang 
											pinakahangadhangad niya ang aking 
											kamatayan? Wala na ngang nalalabi sa 
											akin kung hindi ang pagtitiis, 
											ingatan ko sa sarili ang lihim at 
											mamatay sa pagpipighati!... ngayon, 
											kaibigan ko, ngayong nalalaman mo na 
											ang buhay ng iyong abang si Maria, 
											mangyayari pa bang maidulot mo pa sa 
											kanya iyang pagpapawalang halagang 
											ngiti?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Maria, ikaw ay isang santa!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lumiligaya ako, sapagkat, ako'y 
											iyong pinaniniwalaan....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon man,--ang idinugtong ng 
											binata, na nagbago ng anyo ng 
											tinig,--nabalitaan kong mag-aasawa ka 
											raw....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo,--at humagulhol ang 
											dalaga;--hinihingi sa akin ng aking 
											ama ang pagpapakahirap na ito ... 
											bagaman hindi niya katungkula'y 
											sininta niya ako't kanyang pinakain, 
											tinutumbasan ko ang utang na loob na 
											ito, sa pagbibigay kapanatagan sa 
											kanya, sa pamamag-itan nitong bagong 
											pakikimag-anak na ito, ngunit....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko lilimutin ang pagtatapat 
											na aking isinumpa sa iyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano 
											ang inaakala mong gawin?--ang 
											idinugtong ni Ibarra, at 
											pinagsisikapang basahin sa kanyang 
											mga mata ang kanyang balak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Madilim 
											ang hinaharap na panahon at na sa 
											kadiliman ang Palad! Hindi ko 
											nalalaman ang aking gagawin; nguni't 
											talastasin mong minsan lamang kung 
											ako'y umibig, at kung walang 
											pag-ibig ay hindi ako kakamtan nino 
											man. At ikaw, ano ang kasasapitan 
											mo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang 
											kalagayan ko'y isang bilanggong 
											tanan ... tumatakas ako. Hindi 
											malalao't malalaman ang aking 
											pagkatakas, Maria....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinangnan ni Maria Clara ng dalawang 
											kamay ang ulo ng binata, hinagkang 
											muli't muli ang mga labi, niyakap 
											niya siya, at saka biglang linayuan 
											pagkatapos.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tumakas ka! tumakas 
											ka!--anya;--tumakas ka, paalam!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinitigan siya ni Ibarra ng mga 
											matang nagniningning; nguni't sa 
											isang hudyat ng dalaga'y lumayo ang 
											binatang tila lango, 
											hahapayhapay....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling linukso ang pader at sumakay 
											sa bangka. Tinatanaw siya sa paglayo 
											ni Maria Clarang nakadungaw sa 
											palababahan ng batalan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpugay si Elias at niyukuran siya 
											ng&nbsp; buong&nbsp; galang.</font></p>
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