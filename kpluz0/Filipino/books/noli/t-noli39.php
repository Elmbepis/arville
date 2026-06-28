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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXIX. Si Donya Consolacion</font></b></p>
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
											Bakit nakasara ang mga bintana ng 
											bahay ng alperes? Saan naroroon, 
											samantalang nagdaraan ang prokesion, 
											ang mukhang lalaki't nakabarong 
											frankia na Medusa o Musa ng 
											Guwardiya Sibil? Napagkilala kaya ni Do&ntilde;a 
											Consolaciong lubhang nakasususot ang 
											kanyang noong nababalatayan ng mga 
											malalaking ugat, na wari'y siyang 
											pinagdaraanan, hindi ng dugo, kung 
											di ng suka at apdo; ang malaking 
											tabako, karapatdapat na pamuti ng 
											kaniyang moradong mga labi, at ang 
											kanyang maingiting titig, na sa 
											kanyang pagsang-ayon sa isang 
											magandang udyok ay hindi niya inibig 
											na gambalain sa kanyang kalagimlagim 
											na pagsungaw, ang mga katuwaan ng 
											karamihang tao.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ay! sa ganang kanya'y nagnawnaw 
											lamang, ng panahon na naghahari ang 
											kaligayahan, ang mga magagandang 
											udiyok ng budhi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Mapanglaw ang bahay, sapagkat 
											nagkakatuwa ang bayan,--na gaya na 
											nga ng sinasabi ni Sinang; walang 
											mga parol at mga bandera. Kung di 
											lamang sa kentinela (bantay na 
											sundalo) na nagpapasial sa pintuan, 
											mawiwikang walang tao sa bahay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang malamlam na ilaw ang siyang 
											lumiliwanag sa walang kahusayang 
											salas, at siyang nagpapanganinag sa 
											mga maruruming kapis na kinapitan ng 
											mga bahay-gagamba at dinikitan ng 
											alabok. Ang ginoong babae, ayon sa 
											kanyang pinagkaratihang huwag gumawa 
											at kakilakilabot; walang pamuti ang 
											kanyang buhok liban na lamang sa 
											isang panyong nakatali sa kanyang 
											ulo, na doo'y pinababayaang 
											makatakas ang mga maninipis at 
											maiikling tungkos ng mga gusamot na 
											buhok ang barong franelang asul, na 
											siyang na sa ibabaw ng isa pang 
											barong marahil ng una'y puti, at 
											isang sayang kupas, na siyang 
											bumabalot at nagpapahalata ng mga 
											payat at lapad na mga hita, na 
											nagkakapatong at ipinag-gagalawan ng 
											mainam. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Lumalabas sa kanyang bibig 
											ang bugal-bugal na aso, na ibinubuga 
											ng&nbsp; buong&nbsp; pagkayamot sa alang-alang, 
											na kanyang tinitingnan-pagka 
											ibinubukas ang mga mata. Kung 
											napanood sana siya ni don Francisko 
											Ca&ntilde;amaque, marahil ipinalagay na 
											siya'y isang hariharian sa bayan, o 
											kung dilikaya'y mangkukulam, at 
											pinamutihan pagka tapos ang kaniyang 
											pagkatuklas na iyon ng mga 
											pagwawariwari sa wikang tinda, na 
											siya ang may likha upang kanyang 
											maging sariling gamit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi nagsimba ng umagang iyon ang 
											ginoong babae, hindi dahil sa siya'y 
											aayaw, kun di baligtad, ibig sana 
											niyang siya'y pakita sa karamihan at 
											makinig ng sermon, nguni't hindi 
											siya pinahintulutan ng kanyang 
											asawa, at ang pagbabawal ay may 
											kalakip, na gaya ng kinauugalian, na 
											dalawa o tatlong lait, mga tungayaw 
											at mga sikad. Napagkikilala ng 
											alperes na totoong katawatawang 
											manamit ang kanyang babae, na 
											naaamoy sa kanya yaong tinatawag ng 
											madlang 'kalunya ng mga sundalo,' at 
											hindi nga magaling na siya'y ilantad 
											sa mga mata ng mga matataas na tao 
											sa pangulong bayan ng lalawigan, at 
											kahi't sa mga taga ibang bayang 
											doo'y nangagsidalo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Datapuwa't hindi gayon ang 
											pinag-iisip ng babae. Talos niyang 
											siya'y maganda, na siya'y may pagka 
											anyong reina at malaki ang kahigtan 
											niya kay Maria Clara sa kagalingang 
											manamit at gayon din sa karikitan ng 
											kaniyang mga damit: si Maria Clara'y 
											nagtatapis, siya'y hindi't naka 
											'saya suelta.' Kinailangang sa 
											kaniya'y sabihin ng alperes: 'o 
											itatahimik mo ang iyong bibig o 
											ipadadala kata sa bayan mo sa 
											kasisikad!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi ibig ni Do&ntilde;a Consolaciong 
											umuwi sa kanyang bayan sa kasisikad, 
											nguni't umisip siya ng gagawing 
											panghihiganti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kailan ma'y hindi naging 
											karapatdapat makaakit sa kanino man 
											ng pagpapalagay ng loob ang marilim 
											na pagmumukha ng ginoong babaeng 
											ito, kahi't kung siya'y nagpipinta, 
											ng kanyang mukha, nguni siya'y 
											totoong nakapagbigay balisa ng 
											umagang iyon, lalong lalo na ng 
											siya'y mapanood na magpabalikbalik 
											ng paglakad sa magkabikabilang dulo 
											ng bahay, na walang imik at wari 
											mandi'y nagbabalakbalak ng isang 
											bagay na kagulatgulat o 
											makapapahamak: taglay ng kanyang 
											paningin iyang sinag na ibinubuga ng 
											isang ahas pagka inaakmaang lusayin 
											kung siya'y nahuhuli; ang paninging 
											yao'y malamig, nagninining, tumataos 
											at may kadulingasan, karumaldumal, 
											malupit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang lalong maliit na pagkakahidwa, 
											ang lalong babahagyang hindi 
											sinasadyang alatiit, humuhugot sa 
											kanya ng isang salaula at 
											napakaimbing lait na sumasampal sa 
											kaluluwa; datapuwa't sino ma'y 
											walang sumasagot: magiging isa pang 
											malaking kasalanan ang mahinahong 
											pakikiusap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagdaan sa gayong kalagayan ang 
											maghapon. Palibhasa'y walang ano 
											mang nakahahadlang sa 
											kanya--sapagkat piniging ang kanyang 
											asawa,--ang budhi niya'y pinupuno ng 
											giyagis: masasabing untiunting 
											pinupuspos ang kanyang mga silakbo 
											ng tilamsik at init ng lintik at 
											nangagbabalang magsambulat ng isang 
											imbing unos. Nangagsisiyukod na 
											lahat sa kanyang paligid, tulad sa 
											mga uhay sa unang hihip ng bagyo: 
											walang nasusunduang hadlang, hindi 
											nakatitisod ng ano mang dulo o 
											katayugang sukat mapagbuntuhan ng 
											kanyang kayamutan; nanghihinuyo at 
											nangangayupapang lahat ang mga 
											sundalo at mga alila sa paligidligid 
											niya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipinasara niya ang mga bintana upang 
											huwag niyang maringig ang mga 
											pagkakatuwa sa labas; ipinagbilin sa 
											kentinela na huwag papasukin ang 
											sino man. Nagbigkis ng isang panyo 
											sa ulo at ng wari'y ito'y mailagang 
											huwag sumambulat, at pinasindihan 
											ang mga ilaw bagaman may sikat pa 
											ang araw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ayon sa ating nakita na, piniit si 
											Sisa, dahil sa panggugulo sa 
											katiwasayan ng bayan at inihatid sa 
											kuartel. Niyo'y wala roon ang 
											alperes, kaya napilitan ang 
											kahabaghabag na babaeng maglamay na 
											magdamag na nakaupo sa isang bangko, 
											na walang diwa ang titig. Nakita 
											siya kinabukasan ng alperes, at sa 
											pagkaibig na siya'y maipangilag sa 
											ano mang kasakunaan sa mga araw na 
											iyon ng kaguluhan, at sa kaayawan 
											namang huwag magkaroon ng ano mang 
											hindi kalugodlugod panoorin, 
											ipinagbilin ng alperes sa mga 
											sundalong alagaan si Sisa, kaawaang 
											pagpakitaan ng magiliw na kalooban 
											at pakanin. Gayon ang naging 
											kalagayan sa loob ng dalawang araw 
											ng babaeng sira ang pag-iisip.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng gabing ito, ayawan kung dahil sa 
											kalapitan doon ng bahay ni Kapitan 
											Tiago'y dumating hanggang sa kanya 
											ang mapanglaw na kanta ni Maria 
											Clara, o kung dili kaya'y pinukaw ng 
											ibang mga tinig ang pagkaalaala niya 
											ng kanyang mga dating kanta, sa 
											papaano man ang dahil, pinasimulaan 
											niyang kantahin ang mga 'kundiman' 
											nang kanyang kabataan. Pinakikinggan 
											siya nang mga sundalo at hindi 
											nangagsisiimik: ay! sa kanila'y 
											nagpapagunita ang mga tinig na iyon 
											ng mga panahong una, yaong mga 
											gunita ng panahong hindi pa 
											narurungisan ang kalinisan ng 
											kanilang budhi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Narinig din siya ni Do&ntilde;a Consolacion 
											sa oras na iyon ng kanyang kainipan, 
											at ng kanyang maalaman kung sino ang 
											kumakanta'y nag-utos:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Papanhikin ninyo siya 
											agad-agad!--ang kanyang sinabi 
											pagkaraan ng ilang sandaling kanyang 
											pag-iisip-isip. Isang bagay na 
											nakakahuwad ng ngiti ang siyang 
											nasnaw sa kanyang tuyong mga labi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ipinanhik doon si Sisa, na humarap 
											na di nagulomihanan, na hindi 
											nagpahalata ng pagtataka o takot: 
											tila mandin wala siyang nakikitang 
											sino mang ginoong babae. Ito'y 
											nakasugat sa loob ng mapagmataas na 
											Musa, na ang&nbsp; buong&nbsp; akala'y 
											nakaaakit sa paggalang at pagkagulat 
											ang kanyang kalagayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Umubo ang alperesa, humudyat sa mga 
											sundalong mangagsiya-o, kinuha ang 
											latigo ng kanyang asawa sa pagka 
											sabit, at nagsalita ng mabangis na 
											tinig sa babaeng sira ang isip:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Vamos, magkantar ikaw!'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isa sa mga magagandang kaugalian ng 
											ginoong babaeng ito ang 
											magpakasumikap na huwag niyang 
											maalaman ang wikang tagalog, o kung 
											dili ma'y nagpapakunwaring hindi 
											niya nalalaman ang tagalog na ano 
											pa't sinasadyang magpautal-utal at 
											magpamalimali ng pananalita: sa 
											gayo'y magagawa niya ang pag-aanyo 
											ng tunay na 'orofea', na gaya ng 
											kaniyang karaniwang sabihin. At 
											magaling nga naman ang kanyang 
											ginagawa! sapagkat kung 
											pinahihirapan niya ang wikang 
											tagalog, ang wikang kastila'y hindi 
											lumiligtas sa gayong katampalasanan, 
											sa nauukol sa gramatika at gayon din 
											sa pangungusap. At gayon man'y 
											ginawa ng kanyang asawa, ng mga 
											silla at ng mga sapatos ang&nbsp; buong&nbsp; 
											kaya upang siya'y maturuan! Isa sa 
											mga salitang lalong pinagkahirapang 
											totoo niya, na ano pa't daig ang 
											pagkakahirap ni Champollion sa mga 
											geroglifiko, ay ang sabing 
											'Filipinas.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ayon sa sabihanan, kinabukasan ng 
											araw ng sa kanila'y pagkakasal, sa 
											pakikipag-usap sa kanyang asawa, na 
											ng panahong iyo'y kabo pa lamang, 
											sinabi ni Do&ntilde;a Consolaciong 
											'Pilipinas'; inakala ng kabong 
											katungkulan niyang ipakilala ang 
											pagkakamali at turuan, kaya nga't 
											kanyang tinuktukan at 
											pinagsabihan:--'Sabihin mong 
											Felipinas, babae, huwag ka sanang 
											hayop. Hindi mo ba nalalamang ganyan 
											ang pangalan ng iyong p.bayan dahil 
											sa nanggaling sa Felipe?' </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Ang babaeng pinapanaginip ang 
											matimyas na lugod ng pagkabagong 
											kasal, inibig sumunod at sinabing; 
											'Felepinas'. Inakala ng kabong 
											nakalalapitlapit na, kaya dinagdagan 
											ang mga pagtuktok, at 
											sinigawan--'Datapuwa, babae, hindi 
											mo ba masabi: Felipe? Huwag mong 
											kalimutan, talastasin mong ang 
											haring Felipe ... quinto.... Sabihin 
											mong Felipe, at saka mo iragdag ang 
											'nas' na ang kahulugan sa wikang 
											latin ay mga pulo ng mga indio, at 
											masusunduan mo ang pangalan ng iyong 
											rep-bayan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hinihipohipo ni Consolacion, na ng 
											panahong iyo'y lavandera, ang bukol 
											o ang mga bukol ng kanyang ulo, at 
											inulit, bagaman nagpapasimula na ang 
											pagkaubos ng kanyang pagtitiis:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--'Fe ...lipe, Felipe ...nas, 
											Felipenas, gayon nga ba?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nanggilalas ng di ano lamang ang 
											kabo. Bakit baga't 'Felipenas' ang 
											kinalabasan at hindi 'Felipinas'? 
											Alin sa dalawa: o sasabihing 
											'Felipenas' o dapat sabihing 
											'Felipi'?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Minagaling ng kabong huwag ng umimik 
											ng araw na iyon, iniwan ang kanyang 
											asawa at maingat na nuhang tanong sa 
											mga limbag. Dito'y napuspos ng hindi 
											kawasa ang kanyang pagtataka; 
											kinusot ang kanyang mga 
											mata:--Tingnan nating ... marahan! 
											'Filipinas' ang siyang saysay ng 
											lahat ng mga limbag, kung wikaing 
											isa-isa ang mga letra; ang kanyang 
											asawa at siya ay kakapwa wala sa 
											katuwiran.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit?--ang 
											ibinubulong,--makapagsisinungaling 
											baga ang Historia? Hindi baga 
											sinasabi sa librong ito, na ang 
											pangalang ito'y siyang dito'y 
											ikinapit, alang-alang sa infante na 
											si don Felipe? Bakit kaya 
											nagkapaapaano ang pangalang ito? 
											Baka kaya naman isang indio ang 
											Alonso Saavedrang iyon?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isinangguni ang kanyang mga 
											pag-aalinlangan kay sargento Gomez, 
											na ng panahon ng kanyang kabataa'y 
											naghangad na magpari. Hindi man 
											lamang pinapagingdapat ng sargentong 
											tingnan ang kabo, nagpalabas sa 
											bibig ng isang kumpol na aso at 
											sinagot siya ng lalong malaking 
											pagmamayabang:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--ng mga panahong una'y hindi 
											sinasabing Felipe kung hindi Filipi: 
											tayong mga tao ngayon, palibhasa'y 
											nagiging 'frankhute' (nakikigagad ng 
											ugali sa mga frankes), hindi natin 
											matiis na magkasunod ang dalawang 
											'i'. Kaya nga ang taong may 
											pinag-aralan, lalong lalo na sa 
											Madrid, hindi ka ba napaparoon sa 
											Madrid? ang taong may pinag-aralan 
											ang wika ko, nagpapasimula na ng 
											pananalita ng ganito: 'menistro', 
											'enritacion', 'embitacion', 
											'endino', at iba pa, sapagkat ito 
											ang tinatawag na pakikisang-ayon, sa 
											kasalukuyang lakad ng kaugalian.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi napaparoon sa Madrid kailan 
											man ang kabo, ito ang kadahilana't 
											hindi niya nalalaman ang kung bakin 
											gayon ang pananalita. Pagkalalaking 
											bagay ang natututuhan sa Madrid!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa makatuwid ngayon ang dapat na 
											pananalita'y?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ayon sa pananalita ng una, alam mo 
											na? Ang lupaing ito'y hindi pa 
											pantas, iayon mo sa kaugalian ng 
											una: Filipinas!--ang tugon ni Gomez 
											ng&nbsp; buong&nbsp; pagpapawalang halaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sakali't masama ang pagkatanto ng 
											kabo sa mga sari-saring wika, ang 
											kapalit nama'y magaling siyang 
											asawa: ang bagong kanyang 
											napag-aralan ay dapat maalaman naman 
											ng kanyang asawa, kaya't 
											ipinagpatuloy niya ang pagtuturo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Consola, ano ang tawag mo sa iyong 
											p--bayan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano&nbsp;ang aking itatawag sa kanya? 
											alinsunod sa itinuro mo sa akin 
											Felifenas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hagisin kata ng silla, 
											p-!,--kahapo'y magalinggaling na ang 
											pagsasalita mo ng pangalang iyan, 
											sapagkat naaayon sa bagong 
											kaugalian; datapuwa't ngayo'y dapat 
											mong sabihin ng alinsunod sa 
											matandang ugali Feli, hindi pala, 
											Filipinas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan mo, hindi pa ako luma! ano 
											ba ang pagka isip mo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi kailangan! sabihin mong 
											Filipinas!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ayaw ako! Ako'y hindi isang lumang 
											kasangkapan ... bahagya pa lamang 
											nakagaganap ako ng tatlompong 
											taon!--ang isinagot na naglilis ng 
											mangas na parang naghahanda sa 
											pakikiaway.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sabihin mo, napakap--, o 
											babalabagin kata ng silla!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Namasdan ni Consolasion ang galaw, 
											nagdilidili at nagsabi ng pautal, na 
											humihinga ng malakas:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Feli ...Fele ...File ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pum! erraes! ang silla ang siyang 
											tumapos sa pananalita.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ang kinawakasan ng pagtuturo'y 
											suntukan, kalmusan, mga sampalan. 
											Binuhukan siya ng kabo, tinangnan 
											naman ng babae ang balbas ng lalaki 
											at ang isang bahagi ng katawan--hindi 
											makapangagat sapagkat umuugang 
											lahat ang kaniyang mga 
											ngipin,--bumigay ng sigaw ang kabo, 
											binitiwan siya ng babae, huminging 
											tawad sa lalaki, umagos ang dugo, 
											nagkaroon ng isang matang mahigit 
											ang kapulahan kay sa isa, isang 
											barong gulagulanit, lumabas ang 
											maraming mga kasangkapan sa kanilang 
											pinagtataguan, datapua't ang 
											Filipinas ay hindi lumabas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											mga kawangis ng ganitong bagay ang 
											mga nangyari kailan man at kanilang 
											mapapag-usapan ang nauukol sa 
											pagsasalita. Binabalak ng kabo ng 
											sakit ng loob, sa kaniyang 
											pagkamasid sa pagsulong ng 
											pagkatututo ng pagsasalita ng 
											kaniyang asawa, na sa loob ng 
											sampung tao'y hindi na ito 
											makapagsasabi ng ano man. Gayon nga 
											naman ang nangyari. ng sila'y 
											ikasal, nakakawatas pa ang kanyang 
											asawa ng wikang tagalog, at 
											nakapagsasalita pa ng wikang kastila 
											upang siya'y mawatasan; ngayon, dito 
											sa panahon ng pangyayari ng aming 
											mga sinasaysay, hindi na siya 
											nakapagsasalita ng ano mang wika: 
											totoong nawili na siya sa 
											pagsasalita ng pakumpas-kumpas, 
											patango-tango at pailing-iling na 
											lamang, na ano pa't kanyang 
											hinihirang pa naman yaong mga sabing 
											maririin at maiingay, kaya nga't 
											linaluan pa niya ng hindi ano lamang 
											ang nagmunakala ng 'Volapuk'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagkapalad nga si Sisa na hindi siya 
											mawatasan. Umunat ng kaunti ang 
											kunot ng mga kilay ng alperesa, 
											isang ngiti ng katuwaan ang siyang 
											nagbigay saya sa kaniyang mukha: 
											hindi na nga mapag-aalinlanganang 
											hindi siya marunong ng wikang 
											tagalog, 'orofea' na siya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Asistente, 
											sabihin mo sa babaeng ito sa wikang 
											tagalog, na siya'y kumanta! hindi 
											niya ako mawatasan, hindi siya 
											marunong ng kastila!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nawatasan ni Sisa ang asistente at 
											kinanta niya ang kancion ng Gabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pinakinggan ang paunang kanta na may 
											halong tawang palibak, nguni't 
											untiunting nawala sa kanyang mga 
											labi ang tawa, pinakinggang magaling, 
											at ng malao'y lumungkot at nag 
											anyong nag-iisip ng kaunti. Ang 
											tinig, ang kahulugan ng mga tula at 
											pati ng kanta'y tumatalab sa kanya. 
											Nawawatasan niyang magaling: marahil 
											nauuhaw sa ulan ang pusong iyong 
											mabato at tuyo, ayon sa 'kundiman', 
											tila bagamandin ay nanaog naman sa 
											ibabaw ng kanyang puso:</font></p>
											<div class="poem" style="color: rgb(0, 0, 0); font-family: Times New Roman; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial">
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														'Ang kalungkuta't ginaw 
														at ang kalamigang</span></font><span style="font-size: 13pt"></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														sa langit ay buhat, 
														putos ng balabal</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ng gabing marilim at 
														labis ng panglaw'....</font></div>
												</div>
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														'Ang lanta at kupas na 
														abang bulaklak</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														sa&nbsp; buong&nbsp; maghapo'y 
														nagladlad ng dilag</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														sa nais na kamtam 
														pagpuring maalab</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														sa udyok ng dib-dib na 
														mapagmataas.'</font></div>
												</div>
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														'Pagdating ng hapon 
														pawang kahapisan</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ang inaning bunga sa 
														hangad na dangal,</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														at ang pagsisisi ang 
														taglay na lamang</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														sa mga nagawang lihis sa 
														katuwiran.'</font></div>
												</div>
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														'Pinagpipilitang itaas 
														sa langit</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ang pinakadahong lanta 
														na't gulanit,</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														at kaunting dilim ang 
														hingi ng hibik</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														upang maitago ang puring 
														naamis.'</font></div>
												</div>
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														'At mamatay siyang hindi 
														namamasdan</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ng nakapanood na sikat 
														ng araw,</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ng ningning ng kaniyang 
														naamis na dangal</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														at ng hindi wastong 
														mataas na asal.'</font></div>
												</div>
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														'Mataos ding hingi ng 
														kanyang dalangin</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														kay Bathalang Poong 
														lubhang mahabagin,</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ang kanyang libinga'y 
														mangyaring diligin</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ng hamog na luhang sa 
														langit ay galing.'</font></div>
												</div>
												<div class="stanza">
													<div class="verseind">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														'Ang ibong panggabi'y 
														sadyang iniiwan</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														ang lubhang malunkot na 
														kanyang tahanan</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														<font face="Arial" color="#333333">
														sa matandang kahoy na 
														lihim na guang</font></div>
													<div class="verse">
														<p align="justify" style="margin: 0 80px">
														</span>
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														at liniligalig tahimik 
														na parang...'</span></font></div>
												</div>
											</div>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag, 
											huwag ka ng kumanta!--ang sigaw ng 
											alperesa, sa ganap na wikang tagalog, 
											at tumindig na malaki ang balisa; 
											huwag ka ng kumanta! nakalalagim sa 
											akin ang mga tulang iyan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tumigil ang ul-ol na babae ng 
											pagkakanta: nagbitiw ang asistente 
											ng isang:--Aba! sabe pala tagalog! (marunong 
											pala ng tagalog) at nakatungangang 
											tinitingnan ang ginoong babae na 
											puspos ng pagtataka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Napagkilala nito na ipinagkanulo 
											niya ang sariling katawan; nahiya at 
											palibhasa'y hindi sa babae ang 
											katutubo niyang damdamin, ang 
											kahihiya'y nauwi sa masilakbong 
											galit at pagtatanim. Itinuro ang 
											pintuan sa hindi marunong mag-ingat 
											na asistente, at sa isang sikad ay 
											sinarhan ang pinto, pagkalabas niya. 
											Lumibot na makailan sa silid, na 
											pinipilipit ng nangingilis niyang 
											mga kamay ang latigo, tumigil na 
											bigla sa tapat ng ul-ol na babae, at 
											saka sinabi sa kanya sa wikang 
											kastila;--Sayaw!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi kumilos si Sisa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sayaw, sayaw!--ang inulit-ulit ng 
											tinig na nakalalagim.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tiningnan siya ng ulol na babae ng 
											titig na walang diwa, walang 
											kahulugan; itinaas ng alperesa ang 
											kaniyang isang bisig, at ang isa 
											namang bisig pagkatapos, at saka 
											ipinagpag ang dalawang bisig: wala 
											ring naging kabuluhan. Hindi 
											nakakawatas si Sisa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Siya'y naglulukso, naggagalaw, ibig 
											niyang sa gayong gawa'y gagarin siya 
											ni Sisa. Naririnig sa dakong malayo 
											ang musika ng prokesiong tumutugtog 
											ng isang markhang malungkot at 
											dakila, datapuwa't naglulukso ang 
											ginoong babae ng katakot takot na 
											ang sinusunod ay ibang kompas, ibang 
											musika ang tumutunog sa loob ng 
											kanyang budhi. Tinititigan siya ni 
											Sisang hindi gumagalaw; isang wangki 
											sa pagtataka ang naguhit sa kanyang 
											mga mata, at isang bahagyang ngiti 
											ang siyang nagpapagalaw sa kanyang 
											mga putlaing mga labi: kinalulugdan 
											niya ang sayaw ng ginoong babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Huminto ito at tila mandin nahihiya, 
											iniyaang ang latigo, yaong kalagim 
											lagim na latigong kilala ng mga 
											magnanakaw at ng mga sundalo, na 
											gawa sa Ulango at pinag-inam ng 
											alperes sa pamamag-itan ng mga kawad 
											na doo'y ipinulupot, at nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ikaw 
											naman ang nauukol sumayaw ngayon!... 
											sayaw!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At pinasimulang paluin ng marahan 
											ang walang ano mang takip na mga paa 
											ng ul-ol na babae, hanggang sa 
											magkangiwingiwi ang pagmumukha nito 
											sa sakit, na ano pa't pinilit niyang 
											magsanggalang ng mga kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aja! nagpapasimula ka na!--ang 
											isinigaw na taglay ang katuwaang 
											malupit, at mula sa 'lento' 
											(madalang) ay iniuwi sa isang 
											'allegro vivake' (masaya at 
											madalas).</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumigaw ang kahabaghabag na babae ng 
											isang daing sa sakit, at dalidaling 
											itinaas ang paa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sasayaw ka ba, p-india?--ang 
											sinasabi ng ginoong babae, at 
											tumutunog at humahaginit ang latigo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpakalugmok si Sisa sa sahig, 
											tinangnan ng dalawang kamay ang mga 
											binti, at tinitigan ang kanyang 
											verdugo ng mga matang nakatirik. 
											Dalawang malakas na hagupit ng 
											latigo sa likod ang pilit sa kanyang 
											tumindig, at hindi na isang daing, 
											kung di dalawang atungal ang siyang 
											isinigaw ng kulang palad na sira ang 
											isip. Nawalat ang kanyang manipis na 
											baro, pumutok ang balat at bumalong 
											ang dugo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nakapagpapagalak ng mainam sa tigre 
											ang pagkakita ng dugo: nagpasilakbo 
											ng loob ni Do&ntilde;a Consolacion ang dugo 
											ng kanyang pinahihirapan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sayaw, 
											sayaw, kondenada, maldita! 
											Mapakasama nawa ang inang nanganak 
											sa iyo!--ang isinigaw;--sayaw o 
											papatayin kata sa kapapalo ng latigo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ang kanyang ginawa'y hinawakan 
											niya ng isang kamay ang babaeng ulol, 
											samantalang pinapalo naman niya, ito 
											at ng kanyang isang kamay, at 
											nagpasimula siya ng paglukso at 
											pagsayaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y napagkilala ng ulol na 
											babae ang sa kanya'y ibig, kaya 
											nga't ipinagpatuloy niya ang 
											paggalaw na walang wasto ng kanyang 
											mga bisig. Isang ngiti ng ligaya ang 
											siyang nagpakubot sa mga labi ng 
											maestra, ngiti ng isang Mefistofeles 
											na babae na nangyaring nakapag-anyo 
											ng isang alagad; ang ngiting iyo'y 
											may taglay na pagtatanim, 
											pagpapawalang halaga, paglibak at 
											kalupitan, datapuwa't walang 
											magsasabing yao'y may kahalong 
											halakhak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At sa pagkatigagal ng pagtatamong 
											lugod sa kaniyang gawa'y hindi niya 
											naringig ang pagdating ng kanyang 
											esposo, hangang sa biglang nabuksan 
											ng malaking ingay ang pinto sa isang 
											tadyak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumipot doon ang alperes na 
											namumutla't marilim ang mukha; 
											napanood ang doo'y nangyayari at 
											ibinulusok sa kanyang asawa ang 
											isang katakottakot na titig. Ito'y 
											hindi kumilos sa kinalalagyan at 
											nanatiling nakangiti ng&nbsp; buong&nbsp; 
											pagkawalang kinahihiyaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Inilagay ng alperes ng lubos na 
											pagpapakamairugin ang kanyang kamay 
											sa balikat ng magsasayaw na kaiba sa 
											lahat, at ipinag-utos na tumigil ng 
											pagsayaw. Huminga ang ulol na babae 
											at dahandahang naupo sa lapag na 
											narurumhan ng kanya ring dugo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpatuloy ang katahimikan: 
											humihingasing ng malakas ang 
											alperes; kinuha ang latigo ng 
											babaeng sa kanya'y humihiwatig at 
											tumitingin ng mga matang wari'y 
											tumatanong, at saka sa kanya'y 
											nagsabi ng tinig na payapa at 
											madalangdalang:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa iyo? Hindi 
											ka man lamang nagbigay sa akin ng 
											magandang gabi!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot ang alperes, at ang 
											ginawa'y tinawag ang 'asistente.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dalhin mo ang babaeng 
											ito,--anya;--pabigyan mo siya kay 
											Marta ng ibang baro at sabihin mo 
											tuloy na gamutin! Pakanin mo siyang 
											magaling at bigyan mo ng isang 
											magaling na higaan ... ikaw ang 
											bahala, pagka siya'y inyong 
											pinaglupitan! Bukas ay ihahatid siya 
											sa bahay ni ginoong Ibarra.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkatapos ay sinarhang mabuti ang 
											pintuan, inilagay ang talasok at 
											saka lumapit sa kanyang asawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naghahanap ikaw na basagin ko ang 
											mukha mo!--ang sa kanya'y sinabing 
											nakasuntok ang mga kamay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa iyo?--ang 
											tanong ng babae na tumindig at 
											umurong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano ang nangyayari sa akin?--ang 
											sigaw ng tinig na kahawig ng kulog, 
											kasabay ng isang tungayaw, at 
											pagkatapos na maituro sa babae ang 
											isang papel na puspos ng sulat na 
											tila kahig ng manok, ay nagpatuloy 
											ng pananalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi mo ba ipinadala ang sulat na 
											ito sa Alkalde, at iyong sinabing 
											pinagbabayaran ako upang aking 
											ipahintulot ang sugal, babaeng p--? 
											Aywan ko kung bakit hindi pa kita 
											linulusay!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan natin! tingnan natin kung 
											makapangangahas ka!--ang sinabi sa 
											kanya ng babaeng nagtatawa't siya'y 
											linilibak;--ang lulusay sa aki'y 
											isang malaking totoo ang kahigtan ng 
											pagkalalaki sa iyo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Narinig ng alperes: ang gayong 
											alimura, nguni't namasdan niya ang 
											latigo. Dumampot ng isang pinggan sa 
											mga na sa ibabaw ng isang mesa, at 
											ipinukol sa ulo ng asawa: ang 
											babaeng dating bihasa na sa ganitong 
											pakikiaway, agad-agad yumukod, at 
											ang pingga'y sa pader tumama at doon 
											nabasag; gayon din ang kinahangganan 
											ng isang mangkok at ng isang 
											kukhillo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Duwag!--ang sigaw ng babae,--hindi 
											ka makapangahas lumapit!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At linurhan ang alperes upang ito'y 
											lalong magngitngit. Pinagdimlan ang 
											lalaki at umaatungal na hinandulong 
											ang babae; nguni't hinaplit nito ng 
											kagilagilalas na kaliksihan ang 
											mukha ng lalaki at saka sumagasang 
											tumakbong tuloytuloy sa kanyang 
											silid, at biglang sinarhan ng 
											malakas ang pinto. Hinabol siya ng 
											alperes, na humahagok sa galit at sa 
											sakit ng palong tinanggap, nguni't 
											walang nasunduan kung di mapahampas 
											sa pinto, bagay na sa kanya'y 
											nagpabulalas ng mga tungayaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumpain nawa ang iyong angkan, 
											babaeng baboy! Buksan mo, p--p--, 
											buksan mo, sapagkat kung hindi'y 
											babasagin ko ang iyong bungo!--ang 
											iniaatungal, at kinakalabog ang 
											pinto ng kanyang mga suntok at 
											sikad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumasagot si Do&ntilde;a Consolacion. 
											Nariringig sa dakong loob ang 
											kalampagan ng mga silla at mga baul, 
											na anaki mandin nagtatayo ng isang 
											kuta sa pamamag-itan ng mga 
											kasangkapang-bahay. Yumayanig ang 
											bahay sa mga sikad at mga tungayaw 
											ng lalaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag kang pumasok! huwag kang 
											pumasok!--ang sabi ng maasim na 
											tinig ng babae; papuputukan ko ikaw 
											pagka sumungaw ka!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tila mandin untiunting pumapayapa 
											ang lalaki, at nagkasiya na lamang 
											siya sa magpalakadlakad ng paroo't 
											parito sa magkabikabilang dulo ng 
											salas, na ang isang halimaw na na sa 
											sa jaula ang katulad.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pasalansangan ka't magpalamig ikaw 
											ng ulo!--ang patuloy na paglibak ng 
											babae, na tila mandin nakatapos na 
											ng pagtatayo ng kaniyang 
											pangsangalang na kuta.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Isinusumpa ko sa iyo, na pagka 
											kita'y nahagip, kahi't ang Diyos ay 
											hindi ka makikita, salaulang babaeng 
											p--!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo! masasabi mo na ang ibigin!... 
											aayaw kang ako'y magsimba! aayaw mo 
											akong bayaang gumanap sa Diyos!--ang 
											sabi ng&nbsp; buong&nbsp; kapalibhasaang siya 
											lamang ang marunong gumawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dinampot ng alperes ang kanyang 
											kapakete, naghusay ng kaunti, at 
											saka umalis na ang hakbang ay 
											malalaki, datapwa't pagkaraan ng 
											ilang sandali'y dahandahang bumalik: 
											siya'y nag-alis ng kanyang mga bota. 
											Palibhasa'y bihasang makapanood ang 
											mga alila roon ng mga ganitong 
											pangyayari, karaniwang sila'y 
											inaabot ng yamot, nguni't kanilang 
											pinagtakhan ang pag-aalis ng mga 
											bota, bagay na hindi dating 
											ginagawa, kaya't nangagkindatan ang 
											isa't isa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naupo ang alperes sa isang silla, sa 
											tabi ng dakilang pinto, at 
											nakapagtiis na maghintay roon ng 
											mahigit na kalahating oras.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay 
											bagang umalis ka na o naririyan ka 
											pa, lalaking kambing?--ang tanong na 
											manakanaka ng tinig, na 
											pinagbabagobago ang lait, nguni't 
											nalalao'y ilinalakas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawakasa'y untiunting inalis niya 
											ang mga kasangkapang ibinunton sa 
											tabi ng pinto: naririnig ng lalaki 
											ang kalampag, kaya't siya'y 
											ngumingiti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Asistente! 
											umalis na ba ang panginoon mo?--ang 
											sigaw ni Do&ntilde;a Consolacion.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sumagot ang asistente sa isang 
											hudyat ng alperes:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Oo 
											po, ginoo, umalis na.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Naringig ang masayang tawa ng babae, 
											at saka hinugot ang talasok ng pinto 
											...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Isang sigaw, ang kalabog ng katawang 
											natutumba, mga sumpa, atungalan, mga 
											tungayaw, mga hampas, mga tinig na 
											paos ... Sino ang makapagsasaysay ng 
											nangyari sa kariliman ng silid na 
											tulugan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ang asistente ay napasapanig ng 
											bahay na pinaglulutuan, at nagbigay 
											sa tagapagluto ng isang hudyat na 
											makahulugan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At ikaw ang magbabayad!--ang sinabi 
											sa asistente ng tagapagluto.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako? 
											Kung sakali'y ang bayan ang siyang 
											magbabayad! Itinanong niya sa akin 
											kung umalis na: tunay; nguni't 
											bumalik.</font></p>
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