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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXII. Ang Kabriya</font></b></p>
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
											Ginanap ng taong naninilaw ang 
											kanyang pangako: hindi isang 
											madaling wariing 'kabria' (pangbaba 
											o pangtaas ng ano mang bagay na 
											mabigat) ang itinayo sa ibabaw ng 
											nakabukas na hukay upang ibaba roon 
											ang lubhang malaking batong 'granito'; 
											hindi ang panukalang 'tripode' (tatlong 
											tungkong kalang mga mahahabang kahoy) 
											ni &ntilde;or Juan, upang ibitin sa dulo 
											niya ang isang 'polea,' yao'y 
											mahigit, yao'y bukod sa isang 
											maquina'y isang pamuti, nguni't 
											isang dakila at nakahahangang pamuti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa ibabaw ng walong metro ang taas 
											ay natatayo roon ang totoong magulo 
											at mahirap na liriping mga 
											'andamlo': apat na malalaking kahoy 
											na nakabaon sa lupa ang siyang mga 
											pinakahaligi, na nagkakakabitkabit 
											sa pamamag-itan ng mga malalaking 
											kahab ang pahalang, na nagkakakabit 
											kabit naman sa pamamag-tan ng 
											malalaking pakong hanggang sa 
											kalahati lamang ang nakabaon, 
											marahil sapagkat aalisin din 
											lamang agad ang bagay na iyon, ay ng 
											magaang na mapagkalas-kalas. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang 
											malalaking mga lubid na nakabitin sa 
											lahat ng mga panig, ang siyang 
											nakapagbibigay anyong katibayan at 
											kadakilaan ng kabooang nakokoronahan 
											doon sa itaas ng mga banderang may 
											sari-saring kulay; manga gallardete 
											na nagsisiwagayway at lubhang 
											malalaking mga girnaldang bulaklak 
											at mga dahong totoong nakalulugod 
											panoorin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Doon sa kaitaasan, sa lilim ng mga 
											anino ng mga malalaking kahoy, ng 
											mga girnalda at ng mga bandera, 
											nakabiting ang tali ay mga lubid at 
											mga ganchong bakal, ang isang 
											pagkalakilaking 'polea' na may 
											tatlong 'rueda,' at sa mga 
											nagniningning na tagiliran nito'y 
											nakasulot at nakasakay ang tatlong 
											lubid na lalo pa manding malalaki 
											kay sa mga iba, at nakabitin sa 
											tatlong pagsalalaking mga lubid na 
											ito ang isang pagkalakilaking 
											'sillar' na buo na may hukay sa 
											dakong gitna, na kung itama sa kapwa 
											guang ng isang batong kapapatungang 
											na sa ilalim na ng hukay, siyang 
											magiging guang na laang paglalagyan 
											ng kasaysayang kasalukuyan, ng mga 
											pamahayagan, ng mga kasulatan, ng 
											mga salapi, ng mga medalla at iba 
											pa, at ng maibalita ang mga bagay na 
											iyon sa mga taong mabubuhay sa 
											kahulihulihang panahon. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nagmumula 
											ang mga malalaking lubid na ito sa 
											itaas na patungo sa ibaba, at 
											nasusulot sa isa pang 'poleang' 
											malaki ring nakagapos sa paanan ng 
											'aparatong' iyon, at ang dakong dulo 
											ng mga lubid na iyo'y nakabilibid sa 
											'kilindro' ng isang 'torno', na 
											nakapako sa lupa ng malalaking 
											kahoy. Ang tornong ito, na 
											napagagalaw sa pamamag-itan ng 
											'dalawang manubrio' ay nagdaragdag 
											sa lakas ng tao ng makasandaang 
											ibayo, dahil sa nagkaka-kama-kamang 
											mga ruedang may ngipin, bagaman ang 
											nasusunduang lakas ay nagiging 
											kabawasan naman sa katulinan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan po ninyo,--ang sabi ng taong 
											naninilaw samantalang pinipihit ang 
											'manubrio;'--tingnan po ninyo, &ntilde;or 
											Juan, kung di sa lakas ko lamang ay 
											laking naitataas at naibababa ang 
											kalakilakihang bato.... Napaka buti 
											ang pagkakaanyo-anyo, na ayon sa 
											maibigan ko'y aking naitataas o 
											naibababa ng isa ng isang dali, at 
											ng magawa ng&nbsp; buong&nbsp; kaal-wanan ng 
											isang taong nasasailalim ng hukay 
											ang paglalapat ng dalawang bato, 
											samantalang aking pinangangasiwaan 
											buhat dito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nga mangyayaring di 
											panggilalasan ni &ntilde;or Juan ang taong 
											ngumingiti ng anyong totoong 
											kakaiba. Nangag-uusap-usapan ang mga 
											nanonood, at kanilang pinupuri ang 
											lalaking naninilaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino po ba ang nagturo sa inyo ng 
											'maquinaria?'--ang tanong sa kanya ni 
											&ntilde;or Juan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang aking ama, ang aking nasirang 
											ama!--ang sagot na kasabay ang 
											kanyang kakatuwang ngiti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At sa inyong ama?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Si Don Saturnino, ang nuno ni Don 
											Crisostomo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko nalalamang si Don 
											Saturnino'y....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oh! maraming bagay ang kanyang 
											nalalaman! Hindi lamang mainam 
											mamalo at ibinibilad sa araw ang 
											kanyang mga trabajador; bukod sa 
											roo'y marunong pumukaw sa natutulog, 
											at magpatulog sa nagigising. 
											Darating ang panahong inyo ring 
											makikita kung ano ang itinuro sa 
											akin ng aking ama,--makikita rin po 
											ninyo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ngumingiti ang lalaking 
											naninilaw, nguni't sa isang 
											kakatuwang anyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa ibabaw ng isang masang natatakpan 
											nang isang 'lapiz' (pangladlad sa 
											mga dingding o pangtakip sa mga 
											mesa) na galing sa Persia'y 
											nakalagay roon ang kawangis ng hihip 
											na tingga, at ang mga bagay na 
											iingatan sa pinakalibingang iyon: 
											isang kaja na ang mga pinakadingding 
											ay makakapal na kristal ang siyang 
											paglalagyan ng pinakabangkay na 
											iyong hindi mabubulok ng isang 
											panahon at siyang kaliligpitan ng 
											mga makapagpapaalaala sa mga tao sa 
											haharaping panahon ng mga bagay na 
											ukol sa isang panahong nakaraan na. 
											Ito ang ibinubulong ng pilosopo 
											Tasio na doroon naglalakadlakad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil isang araw, pagka ang 
											gawang nagpapasimula ngayon ng 
											pagsilang sa maliwanag ay kung 
											matanda na at magiba dahil sa ilang 
											mga sakunang sa kanya'y nagdaan, 
											kung magkabihira'y dahil sa mga 
											pagpapagpag (paglindol) ng 
											Naturaleza, kung magkabihira'y dahil 
											sa mapagwasak na kamay ng tao, at 
											sumibol sa ibabaw ng mga kasangkapan 
											ng gibang ito ang damo at baging; at 
											pagkatapos, kung pugnawin na ng 
											panahon ang damo, ang baging at ang 
											mga sirang kasangkapan ng bahay na 
											ito, at katkatin sa mga dahon ng Kasaysayan ang sa kanya'y 
											gunita, at gayon din ang mga gumawa 
											sa kanya, na malaon ng panahong 
											nawala sa alaala ng mga tao: 
											marahil, kung napalibing na o nawala 
											na ang mga lahing kasama ng mga 
											pinakabalat ng lupa, sa isa lamang 
											pagkakataon, kung pasilangin ang 
											tilamsik ng apoy sa batong matigas 
											ng piko ng sino mang manghuhukay ng 
											mina, mangyayaring masunduan sa 
											sinapupunan ng malaking bato ang mga 
											talinghaga at mga lihim. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Marahil ang 
											mga pantas ng isang naciong dito'y 
											tumira'y mangagsisikap, na gaya 
											naman ng pagsisikap ngayon ng mga 
											'egiptologo' (ang mga malulugdin sa 
											mga bagay na na sa Egipto) sa 
											nangatirang bagay ng isang dakilang 
											'sibilizaciong' nagpagal sa 
											pagsisiyasat ng walang hanggan, at 
											hindi sinapantahang sa kanya'y 
											bababa ang isang pagkahabahabang 
											gabi. Marahil sabihin ng isang paham 
											na 'profesor' (tagapagturo) sa 
											kanyang mga alagad, na may lima 
											hanggang pitong taon, sa isang 
											wikang siyang sinasalita ng lahat ng 
											mga tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											--'Mga ginoo! Pagkatapos na 
											matingnan at mapagsiyasat ng&nbsp; buong&nbsp; 
											katiyagaan ang mga bagay na 
											nasumpungan sa ilalim nitong ating 
											lupa, pagkatapos na mausisa ang 
											kahulugan ng ilang mga tanda, at 
											pagkatapos na maihulog sa wika natin 
											ang ilang mga salita, masasapantaha 
											nating walang ano mang takot na 
											magkamali, na nauukol ang mga bagay 
											na iyon sa panahon nang kahunghangan 
											nang tao, sa madilim na panahong 
											karaniwan nating tawaging panaginip 
											nang isip. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Tunay nga, mga ginoo; 
											sukat na ang sabihin sa inyo, upang 
											mapagkurokuro ninyo kung gaano ang 
											kahangalan ng mga kanunonunuan 
											natin, na ang tumira rito'y hindi 
											lamang kumikilala pa sila ng mga 
											hari, kung di upang makapagpasiya 
											sila ng ano mang bagay na nauukol sa 
											pamamahala sa kanilang sariling 
											bayan, kinakailangan pa nilang 
											dumalo sa kabilang dulo ng daigdig, 
											na ano pa't masasabi nating sila'y 
											katulad ng isang katawang upang 
											gumalaw ay kinakailangang magtanong 
											sa kanyang ulo, na na sa kabilang 
											ibayo ng Sanglibutan, marahil sa mga 
											lupaing itinatago ngayon ng mga 
											alon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Itong di mandin 
											mapaniniwalaang kahidwaan ng isip, 
											kahi't akalain ninyong hindi sukat 
											mangyari, inyong kilalaning gayon 
											nga kung didilidilihin ang kalagayan 
											ng mga kinapal na iyong bahagya na 
											lamang nangangahas akong tawaging 
											tao! ng mga kaunaunahang panahong 
											iyon, ang mga kinapal na ito'y 
											nakipag-uusap pa (ganito marahil ang 
											kanilang&nbsp; buong&nbsp; akala) sa Lumikha 
											sa kanila, sapagkat sila'y may mga 
											kinikilalang mga Ministro 
											(kinakatawan) ng Lumikha iyan, mga 
											kinapal na iba kay sa mga iba na 
											kanilang sa tuwi na'y 
											pinangangalanan ng mga talinghagang 
											letrang M. R. P. Fr., na sa 
											pagbibigay kahulugan sa mga letrang 
											ito'y hindi nangagkakaisa ang ating 
											mga marurunong. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Alinsunod sa 
											pangkaraniwang profesor ng mga wika, 
											sapagkat wala kung di sasandaan 
											lamang ang mga profesor ng mga 
											wikang malaki ang kakulangan na 
											siyang gamit ng nakaraang panahon, 
											marahil 'Muy Riko Propietario' daw 
											ang kahulugan ng M. R. P., sapagkat may pagka pangalawang Diyos 
											ang mga Ministrong ito, mga 
											kabanalbanalan mga kagaling 
											galingang mananalumpati, mga 
											karunong-dunungan, at bagaman 
											totoong malaki ang kanilang 
											kapangyarihan at sa kanila'y 
											pagkaaalang-alang, kailan ma'y hindi 
											sila gumagawa ng kahi't babahagyang 
											kapaslangan, bagay na nagpapatibay 
											sa akin ng paniniwala sa aking 
											sapantahang hindi kawangis ang 
											kanilang pagkatao sa pagkatao ng 
											iba. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											At kung hindi maging kasukatan 
											ito upang mapapagtibay ang aking 
											panukala may natitira pang isang 
											katuwirang hindi sinasalansang nino 
											man at bawa't araw na nagdaraa'y 
											lalo at lalong nagtutumibay, na 
											pinapananaog ng mga talinghagang 
											kinapal na iyon ang Diyos sa ibabaw 
											ng lupa, sabihin lamang nila ang 
											ilang wika, na hindi nasasalita ng 
											Diyos kung di sa pamamag-itan ng 
											kanilang bibig, at ang Diyos na 
											iya'y kanilang kinakain, iniinom 
											nila ang kanyang dugo at madalas na 
											ipinakakain nila naman sa mga taong 
											karaniwan.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ito'y iba pang mga bagay ang 
											inilalagay ng hindi mapaniwalaing 
											pilosopo sa bibig ng mga may bulok 
											na pusong mga tao sa panahong 
											sasapit. Marahil mag-kamali ang 
											matandang Tasio, bagay na hindi nga 
											totoong malayo nguni't pag-balikan 
											natin ang ating sinasaysay. 
											Inihahanda ngayon ang pagkaing 
											masarap sa mga kioskong kinakitaan 
											natin kamakalawa sa maestro at sa 
											mga alagad. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Gayonma'y sa mesang 
											handa sa mga bata'y wala isa man 
											lamang botelya ng alak, nguni't ang 
											kahalili nama'y ang lalong 
											sumasaganang ang mga bunga ng kahoy. 
											Sa lilim ng balag na siyang 
											naghuhugpong sa dalawang kiosko'y 
											naroroon ang mga upuan ng mga 
											musiko, at saka isang mesang 
											nalalaganapan ng mga matamis, ng mga 
											'kosfitura', ng mga frasko ng tubig 
											na nakokoronahan ng mga dahon at mga 
											bulaklak na inihahanda sa mauhaw na 
											mga taong dadalo roon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpatayo ang maestro ng eskuela ng 
											mga palosebo, ng mga luksuhan at 
											nagpabitin ng mga kawali't mga 
											palayok na iniuukol sa katuwatuwang 
											mga laro. Nangagluluponlupon sa 
											lilim ng mga kahoy o sa ilalim ng 
											balag ang karamihang taong 
											masasayang mga kulay ang damit na 
											bihis, at sila'y nangagsisitakas sa 
											maningning na araw. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Nangagsisipanhik 
											ang mga bata sa mga sanga ng mga 
											kahoy o sa ibabaw ng mga bato, sa 
											pagkaibig nilang makitang magaling 
											ang 'keremonia', at sa gayo'y 
											narurugtungan nila ang kababaan ng 
											kanilang taas; minamasdan nila ng&nbsp; 
											buong&nbsp; pananaghili ang mga batang 
											pumapasok sa eskuelang malilinis at 
											magaling ang pananamit na 
											nangaroroon sa lugar na sa kanila'y 
											laan. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Malaking di ano lamang ang 
											galak ng mga magugulang; bagaman 
											sila'y abang mga tagabukid, sapagkat mapapanood nilang kumakain 
											ang kanilang mga anak sa mesang 
											natatakpan ng maputing mantel, na 
											halos mawawangis sa Cura at sa 
											Alkalde. Sukat na ang pag-isipin ang 
											mga bagay na iyon upang huwag 
											magdamdam gutom, at ang gayong 
											pangyayari'y pagsasabisabihanan ng 
											salinsaling magiging tao sa ibabaw 
											ng lupa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nalao't narinig ang malayong 
											mga tinig ng musikal ang 
											nangunguna'y isang pulutong ng 
											sari-saring tao, na ang bumubuo'y 
											taglay ang lahat ng mga gulang at 
											taglay ng pananamit ang lahat ng mga 
											kulay. Nabalisa ang lalaking 
											naninilaw at siniyasat ang&nbsp; buong&nbsp; 
											'aparato' niya ng isang sulyap. 
											Sinusundan ang kanyang mata at 
											hinihiwatigan ang lahat niyang mga 
											kilos ng isang mapag-usisang 
											tagabukid: yao'y si Elias na dumalo 
											rin doo't ng panoorin ang 
											'keremonia'; halos hindi siya 
											makilala dahil sa kanyang salakot at 
											sa anyo ng kanyang pananamit. 
											Pinagpilitan niyang siya'y mapalagay 
											sa lalong magaling na lugar, halos 
											sa siping ng torno, sa pampang ng 
											hukay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Casama ng musikang dumating ang 
											Alkalde, ang mga namumunong ginoo sa 
											bayan, ang mga prayle at ang mga 
											kastilang may mga katungkulan, liban 
											na lamang kay Padre Damaso. Causap 
											ni Ibarra ang Alkalde, na kanyang 
											totoong naging kaibigan, mula ng 
											kanyang handugan siya ng ilang 
											maaayos na pagpuri, dahil sa kanyang 
											mga kondekoracion at mga banda: ang 
											malaking hilig sa pagkamahal na tao 
											ang siyang panghina ng loob ng 
											marilag na Alkalde. Casama si 
											Kapitan Tiago, ang alperes at ilang 
											mayayaman, ng maningning na kawan ng 
											mga dalagang may dalang payong na 
											sutla. Sumusunod si Padre Salvi na 
											walang kibo at anyong nag-iisipisip, 
											na gaya ng dating kanyang ugali.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Umasa po kayo sa aking tulong 
											kailan ma't ukol sa isang mabuting 
											gawa,--ang sabi ng Alkalde kay 
											Ibarra;--ibibigay ko sa inyo ang 
											lahat ninyong kakailanganin, o 
											pabibigyan ko kaya kayo sa iba.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang sila'y napapalapit, 
											nararamdaman ng binatang tumatahip 
											ang kanyang puso. Hindi niya 
											sinasadya'y tinungo ng kanyang mga 
											mata ang kakaibang mga andamio na 
											doo'y nakatayo; nakita niyang sa 
											kanya'y yumuyukod ng&nbsp; buong&nbsp; galang 
											ang lalaking naninilaw at siya'y 
											tinitigang sandali. Pinagtakhan niya 
											ang pagkasumpong doon kay Elias, na 
											sa pamamag-itan ng isang 
											makahulugang kirap ay ipinaunawa sa 
											kanyang alalahanin ang sa kanya'y 
											sinabi sa simbahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isinuot ng kura ang mga pananamit ng 
											pagkakaserdote at pinasimulaan ang 
											'keremonia': tangan ng sakristan 
											mayor na bulag ang isang mata, ang 
											libro, at tangan naman ang isang 
											monagulilo ang pangwisik at lalagyan 
											ng tubig na bendita. Na sa paligid 
											ang mga iba, nakatayo at pawang 
											nakapugay, napakalaki ang kanilang 
											katahimikan, na ano pa't bagaman ang 
											pagbasa'y mahina napagwawaring 
											nanginginig ang boses ni Padre 
											Salvi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y inilagay sa kajang 
											kristal ang lahat ng bagay na doo'y 
											ilalaman, gaya baga ng mga sulat 
											kamay, mga pamahayagan, mga medalla, 
											mga salapi at iba pa, at ang lahat 
											ng iyo'y isinuot sa parang hihip na 
											tingga at inihinang na magaling ang 
											takip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Ibarra, ibig po ba ninyong 
											ipasok ang kaja sa dapat kalagyan? 
											Hinihintay ng Cura!--ang inianas ng 
											Alkalde sa tainga ng binata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Malaking totoo po ang aking 
											pagkaibig,--ng isinagot ni 
											Ibarra,--ngunit kung magkagayo'y 
											kakamkamin ko ang nakauunlak na 
											tungkuling iyan sa ginoong 
											Eskribano; ang ginoong Eskribano ang 
											siyang marapat magpatotoo ng 
											ginagawang ito!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kinuha ng Eskribano ang kajang iyon, 
											nanaog sa hagdanang nalalatagan ng 
											alfombra na patungo sa hukay, at 
											inilagay ng kadakilaang marapat sa 
											guang ng bato. ng magkagayo'y 
											dinampot ng kura ang 'hisopo' at 
											winiligan ang bato ng tubig sa 
											bendita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumating ang sandaling dapat na 
											maglagay ang bawa't isa ng isang 
											kukharang 'lekhada' sa ibabaw ng 
											sillar na nakalagay sa hukay at ng 
											lumapat na magaling at kumapit ang 
											isang manggagaling sa itaas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Inihandog ni Ibarra sa Alkalde ang 
											isang kukharang alba&ntilde;il, na sa 
											malapad na dahong pilak niyo'y 
											nakaukit ang bilang ng araw na iyon: 
											nguni't nagtalumpati muna ng wikang 
											kastila ang mahal na Alkalde.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'mga taga San Diego!'--anya sa 
											salitang kagalanggalang:--May 
											kapurihan kaming siyang mangulo sa 
											isang 'keremonia', na ang 
											kahalagaha'y matatanto na ninyo 
											kahi't hindi ko sabihin. Itinatatag 
											ang isang eskuela; ang eskuela'y 
											siyang patuunan ng pamamayan, ang 
											eskuela'y siyang aklat na 
											kinatatalaan ng ikagagaling ng mga 
											bayan sa panahong sasapit! Ipakita 
											ninyo sa amin ang eskuela ng isang 
											bayan at sasabihin namin sa inyo 
											kung ano ang bayang iyan.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'mga taga San Diego! Pasalamatan 
											ninyo ang Diyos na sa inyo'y 
											nagbigay ng mga banal na sacerdote, 
											at ang Pamahalaan ng Inang Bayang 
											naglalaganap na di napapagal ng 
											'sibilisacion' sa masaganang mga 
											pulong ito, na inaampon ng kanyang 
											maluwalhating balabal! Purihin ninyo 
											ang Diyos na nagdala sa inyo rito 
											nitong mga mapagpakumbabang mga 
											sacerdote, na sa inyo'y 
											nangagbibigay liwanag at nagtuturo 
											sa inyo ng wika ng Diyos! Purihin 
											ninyo ang Pamahalaang gumawa, 
											gumagawa at gagawa ng mga 
											pagpapakahirap sa ikagagaling ninyo 
											at sa ikagagaling ng inyong mga 
											anak!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'At ngayong benebendita ang unang 
											bato nitong lubhang makahulugang 
											bahay, kami, Alkalde Mayor nitong 
											lalawigan, sa pangalan ng dakilang 
											Hari, na ingatan nawa ng Diyos, ng 
											Hari sa mga Espa&ntilde;a, sa pangalan ng 
											maluningning na Pamahalaang kastila 
											at sa ilalim ng pagtatangkilik ng 
											kanyang walang bahid at kailan ma'y 
											mapagdiwang na bandera, binibigyan 
											namin ng dakilang kahulugan ang 
											ginawang ito at sinimulaan namin ang 
											paggawa ng eskuelahang ito.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											'mga taga San Diego, mabuhay ang 
											Hari! Mabuhay ang Espa&ntilde;a! mangabuhay 
											ang mga prayle! Mabuhay ang Religion 
											katolika!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mabuhay! mabuhay!--ang isinagot ng 
											maraming boses,--mabuhay ang ginoong 
											Alkalde!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ito'y nanaog, pagkatapos, ng&nbsp; buong&nbsp; 
											kahinhinang madakila, kasabay ng mga 
											tinig ng musikang nagpasimula ng 
											pagtugtog; naglagay ng ilang 
											kukharang lekhada sa ibabaw ng bato, 
											at katulad din ng madakilang 
											kahinhinang gaya ng siya'y pumanhik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagpakpakan ang mga 
											nangangatungkulan sa pamahalaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Iniabot ni Ibarra ang isa pang 
											kukharang pilak sa Cura, na ng 
											makatitig na sumandali sa kanya'y 
											marahang nanaog. ng na sa kalahati 
											na ng hagdana'y tumingala upang 
											tingnan ang nabibiting batong 
											nakatali sa matitibay na mga lubid, 
											datapuwa't ang pagtinging yao'y 
											sandaling sandali lamang at 
											nagpatuloy ng pananaog. Gumawa rin 
											siya ng gaya ng ginawa ng Alkalde, 
											nguni't ngayo'y lalong marami ang 
											nangagsipakpak: nakisama sa 
											pagpakpak ang mga prayle at si 
											Kapitan Tiago.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tila mandin humahanap si Padre Salvi 
											ng mapagbigyan ng kukhara; tiningnan 
											niya si Maria Clara at anaki'y 
											nag-aalinlangan; nguni't nagbago ng 
											panukala at ang ginawa'y sa 
											eskribano niya ibinigay. Ito'y sa 
											pagbibigay loob, lumapit kay Maria 
											Clara, datapuwa't ito'y tumangging 
											ngumingiti. Nagsunodsunod nanaog ang 
											mga prayle, ang mga empleyado at ang 
											alperes. Hindi nalimutan si Kapitan 
											Tiago.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Si Ibarra na lamang ang kulang at 
											ipag-uutos na sana sa naninilaw na 
											taong pababain na ang bato, ng 
											maalaala ng kura ang binata, na 
											pinagsabihan ng anyong nagbibiro at 
											taglay ang paimbabaw na sa kanya'y 
											pagpapalagay na katotong tunay:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po ba isasalok ninyo ang inyo 
											namang kukhara, ginoong Ibarra?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung magkagayo'y aking gagagarin si 
											Juan Palomo ako ang nagluluto't ako 
											rin ang kumakain!--ang isinagot nito 
											ng gayon din anyo ng pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lakad na kayo!--anang Alkalde sa 
											kanya, saka siya marahang 
											itinulak;--kung hindi, mag-uutos 
											akong huwag pababain ang bato at 
											matitira tayo rito hanggang sa 
											kaarawan ng paghuhukom.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napilitan si Ibarrang tumalima dahil 
											sa ganitong kakilakilabot na bala. 
											Hinalinhan niya ang maliit na 
											kukharang pilak ng isang malaking 
											kukharang bakal, bagay na nagpangiti 
											sa ilang mga tao, at mapayapang 
											lumakad. Tinitingnan ng naninilaw na 
											tao ang banging na sa tabi ng 
											kanyang mga paa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkatapos na matingnan ng mabilis 
											ni Ibarra ang nakabiting sillar sa 
											tabi ng kanyang ulo, si Elias at ang 
											lalaking naninilaw, nagsalita siya 
											kay &ntilde;or Juan, na ang kanyang boses 
											ay nanginginig ng kaunti:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibigay po ninyo sa akin iyang 
											timba at ihanap ninyo ako sa itaas 
											ng ibang kukhara!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napag-isa ang binata. Hindi na siya 
											minamasdan ni Elias; ang mga mata 
											nito'y nakapako sa lalaking 
											naninilaw, na nakadungaw sa hukay at 
											sinusundan ang mga kilos ng binata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naririnig ang ingay na ginagawa ng 
											kukhara sa paghalo ng pinagsamang 
											buhangin at apog na nakikisaliw sa 
											hugong ng mahinang pagsasalita ng 
											mga kawani ng gobierno na pinupuri 
											ang Alkalde dahil sa kanyang 
											talumpati.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Caringatdingat ay bumugso ang isang 
											lagapak; umilandang ang poleang 
											(kalo) nakatali sa puno ng kabris, 
											at saka sumunod ang terno na 
											humahampas sa aparatong tulad sa 
											isang panghataw: nangagsigalaw ang 
											mga malalaking kahoy, lumipad ang 
											mga gapos at sa isang kisap mata'y 
											nalugsong lahat, na kasabay ang 
											kakilakilabot na ugong Sumilakbo ang 
											isang alapaap na alikabok.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											P<font face="Arial" color="#333333">inuspos 
											ang alang-alang ng isang sigaw sa 
											panghihilakbot ng libolibong boses. 
											Tumakas at nangagsitakbo halos ang 
											lahat, babahagya na ang 
											nangagmadaling lumusong sa hukay. Si 
											Maria Clara at si Padre Salvi ang 
											nangagsipanatili lamang sa kanilang 
											kinalalagyan, sapagkat hindi sila 
											mangakagalaw, nangamumula at hindi 
											mangapagsalita.</font></p>
											<p class="gap" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: 13pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Nang mapawi-pawi na ang sumilakbong 
											alikabok, nakita nilang nakatayo si 
											Ibarra sa gitna ng mga kahabaan, mga 
											kawayan, malalaking mga lubid, sa 
											pag-itan ng torno at ng malaking 
											bato, na sa pagbaba ng gayong 
											kabilis, ang lahat ay ipinagpag at 
											pinisa. Tangan pa sa kamay ng binata 
											ang kukhara at&nbsp;kanyang minamasdan ng 
											mga matang gulat ang bangkay ng 
											isang taong nakatimbuang sa kanyang 
											paanan, na halos nalilibing sa gitna 
											ng mga kahabaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi po ba kayo namatay? Buhay pa 
											ba kayo? Alang-alang sa Diyos, 
											magsalita po kayo!--ang sabi ng ilang 
											mga empleadong punong-puno ng takot 
											at pagmamalasakit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Himala! himala!--ang isinisigaw ng 
											ilan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hali kayo at inyong alisin sa pagka 
											dangan ang bangkay ng sawing palad 
											na ito!--ani Ibarrang anaki'y 
											nagising sa isang pagkakatulog.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng marinig ang kanyang boses, 
											naramdaman ni Maria Clarang 
											pinapanawan siya ng lakas, hanggang 
											siya'y natimbuang sa mga kamay ng 
											kanyang mga katotong babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Malaking kaguluhan ang naghahari: 
											sabay-sabay na nangagsasalita, 
											nangagkumpaskumpas ang mga kamay, 
											nangagtatakbuhan sa magkabikabila, 
											nangahahambal na lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sino ba ang namatay? Buhay pa 
											ba?--ang mga tanong ng alperes.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kanilang nakilalang ang lalaking 
											naninilaw na nakatayo sa tabi ng 
											torno ang siyang bangkay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pag-usigin sa harap ng mga tribunal 
											ng Hustisya ang 'maestro de obras' 
											(ang namamatnugot sa gawa)!--ang 
											siyang unang nasabi ng Alkalde.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kanilang siniyasat ang kalagayan ng 
											bangkay, tinutop nila ang dibdib, 
											datapuwa't hindi na tumitibok ang 
											puso. Inabot siya ng hampas sa ulo 
											at nilalabasan ng dugo ang dalawang 
											butas ng ilong, ang bibig at ang mga 
											tainga. Kanilang nakita sa kanyang 
											liig ang mga bakas na kakaiba: apat 
											na malalalim na lubo sa isang dako 
											at isa sa kabilang dako, bagaman 
											ito'y may kalakhan: sino mang 
											makakita niyo'y wiwikaing sinakal 
											siya ng sipit na bakal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binabati ng&nbsp; buong&nbsp; galak ng mga 
											sacerdote ang binata at pinipisil 
											nila ang kanyang mga kamay. Ganito 
											ang sabing nagkakang-iiyak ng 
											frankiskanong may mapagpakumbabang 
											anyo na siyang umeespiritu santo kay 
											Padre Damaso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Banal ang Diyos, magaling ang 
											Diyos!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pagka nadidilidili kong bahagya 
											lamang ang panahong pag-itan mula ng 
											ako'y mapalagay sa lugar na iyan--ang 
											sabi ng isa sa mga empleado kay 
											Ibarra,--naku! kung ako ang naging 
											kahulihulihan sa lahat, Jesus!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naninindig ang aking mga 
											buhok!--anang isang upawin at bahagya 
											na ang buhok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At mabuti't sa inyo nangyari ang 
											bagay na iyan at hindi sa akin!--ang 
											ibinubulong ng isang matandang 
											lalaking nanginginig pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Don Paskual!--ang biglang sinabing 
											malakas ng ilang mga kastila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--mga ginoo, gayon ang sabi ko, 
											sapagkat hindi namatay ang ginoong 
											ito; kung sa aki'y hindi man ako 
											napisa, mamamatay rin ako 
											pagkatapos, madilidili ko lamang ang 
											bagay na iyan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't malayo na si Ibarra, at 
											kanyang pinag-uusisa ang kalagayan 
											ni Maria Clara.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi dapat maging kadahilanan ang 
											bagay na ito upang hindi matuloy ang 
											piyesta, ginoong Ibarra!--anang 
											Alkalde;--purihin natin ang Diyos! 
											Hindi sacerdote at hindi man lamang 
											kastila ang namatay! Kinakailangan 
											nating ipagdiwang ang pagkaligtas po 
											ninyo! Ano kaya ang mangyayari sa 
											inyo kung nadag-anan kayo ng bato!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Para manding nakikinikinita na, 
											nakikinikinita na!--ang isinisigaw ng 
											eskribano;--sinasabi ko na! hindi 
											masigla ang paglusong sa hukay ni 
											ginoong Ibarra, Nakikita ko na!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isang 'Indio' naman lamang ang 
											siyang namatay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipagpatuloy ang piyesta! Musika! 
											hindi mabubuhay ng kapanglawan ang 
											namatay! Kapitan, gagawin dito ang 
											pagsisiyasat!... Pumarito ang 
											direktorcillo!.... Piitin ang 
											'maestro de obras'!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipangaw siya!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ipangaw! Eh! musika! musika! 
											Ipangaw ang maestrillo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ginoong Alkalde,--ang itinutol ng&nbsp; 
											buong&nbsp; katigasan ng loob ni 
											Ibarra;--kung hindi makabubuhay sa 
											namatay ang kapanglawan, lalo ng 
											hindi makabubuhay ang pagkabilanggo 
											ng isang tao, na hindi pa natin 
											nalalaman kung may sala siya o wala. 
											Nananagot po ako sa kanyang 
											kalagayan at hinihingi kong pawal-an 
											siya, sa mga araw na ito man lamang.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sang-ayon! sang-ayon! nguni't 
											huwag na lamang siya uuli!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											sari-saring mga salisalitaan ang 
											lumilibot. Pinaniniwalaan ng isang 
											himala ang nangyaring iyon. Gayon 
											ma'y tila mandin hindi totoong 
											natutuwa si Padre Salvi sa himalang 
											sinasapantahang ginawa ng isang 
											santo ng kanyang kapisanan at ng 
											kanyang pinganangasiwaang bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nagkulang ng nagdagdag na 
											kanyang nakitang lumusong sa hukay 
											ang isang nakasuot ng pananamit na 
											itimang katulad ng sa mga 
											frankiskano. Hindi nga 
											mapag-aalinlanganan: si San Diego 
											ang nanaog na iyon. Napagtanto rin 
											namang nakinig ng misa si Ibarra, at 
											ang lalaking naninilaw ay hindi; 
											ito'y maliwanag na kawangis ng sikat 
											ng araw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakita mo na? aayaw kang 
											magsisimba,--anang isang ina sa 
											kanyang anak--kung di kata napalo 
											upang ikaw ay aking pilitin, ngayo'y 
											pasasatribunal kang nakalulan sa 
											kangga na gaya naman niyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At siya nga naman: hatid sa tribunal 
											na nakabalot sa isang banig ang 
											lalaking naninilaw o ang kanyang 
											bangkay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umuwing patakbo sa kanyang bahay si 
											Ibarra upang magbihis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Masamang 
											pasimula, hm!--ang sinabi ng 
											matandang Tasio na doo'y lumalayo.</font></p>
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