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

<body background="../../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../../../images/header1c.jpg', /*url*/'../../../images/header1b.jpg', /*url*/'../../../images/header2c.jpg', /*url*/'../../../images/header2b.jpg', /*url*/'../../../images/header3c.jpg', /*url*/'../../../images/header3b.jpg', /*url*/'../../../images/header4c.jpg', /*url*/'../../../images/header4b.jpg', /*url*/'../../../images/header5c.jpg', /*url*/'../../../images/header5b.jpg', /*url*/'../../../images/header6c.jpg', /*url*/'../../../images/header6b.jpg', /*url*/'../images/backb.jpg')">

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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXVI. Ang Bisperas ng Piyesta</font></b></p>
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
											Tayo'y na sa ikasampu ng Noviembre, 
											vispera (araw na sinusundan) ng 
											piyesta (pagsasaya).</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Iniiwan ang kaugaliang anyo sa 
											araw-araw, at gumagamit ang bayan ng 
											isang walang kahulilip na kasipagan 
											sa bahay, sa daan, sa simbahan, sa 
											sabungan at sa kabukiran; pinupuno 
											ang mga bintana (durungawan o linib) 
											ng mga 'bandera' at ng mga 'damaskong 
											may iba't ibang kulay; napupuspos 
											ang alang-alang ng mga ugong ng mga 
											putok at ng musika; nasasabugan at 
											nalalaganapan ang hangin ng mga 
											kagalakan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sari-saring minatamis na mga bungang 
											kahoy rito ang nangakalagay sa mga 'dulkerang' 
											(lalagyan ng matamis) kristal na may 
											sari-saring masasayang kulay na 
											pinag aayos-ayos ng dalaga sa isang 
											'mesita' (maliit na mesa), na 
											natatakpan ng maputing 'mantel' na 'bordado.' 
											Sumisiap sa 'patio' ang mga sisiw, 
											kumakakak ang mga inahing manok, 
											humaguchok ang mga baboy, na 
											nangagigitla sa katuwaan ng mga tao. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nagmamanhik manaog ang mga alilang 
											may mga dalang doradang 'vagilia' (sasisaring 
											bagay na lalagyan ng pagkaing 
											napapamutihan ng mga dibujong 
											dorado), pilak na mga 'kubierto' (kukhara, 
											kukhillo at tenedor) dito'y may 
											kinagagalitan dahil sa pagkabasag ng 
											isang pingan, doo'y pinagtatawanan 
											ang isang babayeng tagabukid; sa 
											lahat ng dako'y may nangag-uutos, 
											nangag-uusapan, sumisigaw, 
											nangagpipintasan, nangagbabalakbalak, 
											nangag-aaliwan ang isa't isa, at 
											pawang kaguluhan, ugong, kaingayan. 
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At ang lahat ng pagsusumikap na ito 
											at itong lahat na pagpapagal ay 
											dahil sa panauhing kilala o hindi 
											kilala; ang kadahilana'y ng 
											pagpakitaan ng magandang loob ang 
											taong marahil ay hindi pa nakikita 
											kailan man, at marahil kailan man ay 
											hindi na pakikita pagkatapos; ng ang 
											tagaibang bayan, ang 
											naglalakbay-bayan, ang kaibigan, ang 
											kaaway, ang filipino, ang kastila, 
											ang dukha, ang mayaman ay umalis 
											doon pagkatapos ng piyestang 
											natutuwa at walang maipintas: hindi 
											man lamang hinihingi sa kanilang 
											kumilala ng utang na loob, at hindi 
											hinihintay sa mga panauhing yaong 
											huwag gumawa ng ano mang isasama ng 
											mapagkandiling magkakasambahay 
											samantalang tinutunaw o kung matunaw 
											na sa tiyan ang kanilang kinain. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Ang 
											mga mayayaman, ang mga nakakita ng 
											higit kay sa mga iba. Palibhasa'y 
											nangaparoon sa Maynila, 
											nangagsisibili ng kerveza, khampagne, 
											mga likor, mga alak at mga pagkaing 
											galing Europa, mga bagay na bahagya 
											na nila natitikman ang isang subo o 
											isang lagok. Magandang totoo ang 
											pagkakahanda ng kanyang mesa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sa dakong gitna'y naroroon ang isang 
											'pinya-pinyahang' kinatutusukan ng 
											mga panghiningang marikit na lubha 
											ang pagkakagawa ng mga 'presidiario' 
											sa mga horas ng kanilang 
											pagpapahingalay. Ang mga 
											panghiningang ito'y may mga anyong 
											'abaniko,' kung minsa'y katulad ng 
											mga pinagsalitsalit na mga bulaklak, 
											o isang ibon, isang 'rosa', isang 
											dahon ng anahaw, o mga tanikala, na 
											pinapagmula ang lahat ng ito sa 
											isang kaputol na kahoy lamang: isang 
											bilanggong pinarurusahan sa 
											sapilitang pagtatrabajo ang may 
											gawa, isang pangal na 'kukhillo' ang 
											gamit na kasangkapan at ang boses ng 
											bastonero ang siyang nagtuturo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sa 
											magkabilang tabi ng pinyang ito, na 
											tinatawag na 'palillera', nakalagay 
											sa mga kristal na 'frutero' 
											(lalagyan ng bungang-kahoy) ang 
											nakatimbong mga 'naranjitas' 
											(santones ang tawag ng iba), 
											lansones, ates, khikos at mangga pa 
											kung magka minsan, bagaman buwan ng 
											Noviembre. Saka sa manga bandeja sa 
											ibabaw ng mga papel na may burdang 
											inukit at may mga pintang makikinang 
											na mga kulay, nakahayin ang mga 
											'hamong' galing Europa o galing 
											Tsina, isang malaking 'pastel' na 
											ang anyo'y 'Agnus Dei,' (tupang may 
											tangay na banderang may nakadibujong 
											isang kruz), o kaya'y kalapati, ang 
											Espiritu Santo marahil, mga 'pavo 
											rellenado,' at iba pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At sa 
											kasamahan ng lahat ng ito'y ang 
											pangpagana sa pagkaing mga frasko ng 
											mga 'akhara' na may kaayaayang mga 
											dibujong gawa sa bulaklak ng bunga 
											at iba pang mga gulay at mga bungang 
											halaman na totoong mainam ang 
											pagkakahiwa na idinigkit ng 
											'almibar' sa mga tagiliran ng mga 
											garrafon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Linilinis ang mga globong vidrio, na 
											pinagmanamana ng mga ama't ng mga 
											anak, pinakikintab ang mga tansong 
											aro; hinuhubdan ang mga lampara ng 
											petroleo ng kanilang mapupulang mga 
											funda, na sa kanila'y naglalagak sa 
											loob ng isang taon sa mga langaw at 
											sa mga lamok na sa kanila'y 
											sumisira; umuugoy, kumakalansing, 
											umaawit ng kaligaligaya ang mga 
											'almendra' at mga palawit na kristal 
											na nagkikinagan ng sari-saring 
											maniningning na kulay dahil sa anyo 
											ng pagkakatapyas; na ano pa't 
											anaki'y nangakikisaliw sa 
											pagkakatuwa, nangagsasaya 
											pinagpag-iiba't-iba ang ningning at 
											pinasisinag sa ibabaw ng mapuputing 
											mga pader ang mga kulay ng 
											bahag-hari.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Ang mga bata'y nangaglalaro, 
											nangagkakatuwaan, hinahabol ang 
											maniningning na mga kulay, 
											nangatitisod, nababasag ang mga 
											tubo, datapuwa't ito'y hindi 
											nakakagambala upang ipagpatuloy ang 
											katuwaan ng piyesta: ibang iba ang 
											kanilang kasasapitan at ang mga luha 
											ng kanilang mabibilog na mga mata, 
											ang siyang magsaysay kung mangyari 
											ang ganitong pagbabasag sa ibang 
											panahon ng isang taon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Lumalabas, na gaya rin ng mga 
											kagalang-galang na mga lamparang 
											ito, sa mga pinagtataguan, ang mga 
											pinagtiyagaang gawin ng dalaga: mga 
											'velo' na sa 'krokhet' ang 
											pagkakayari, maliliit na mga 
											alfombra, mga bulaklak na gawang 
											kamay; inilalabas din ang mga 
											kaunaunahang bandejang sa 
											kalagitnaa'y may nakapintang isang 
											dagatang may mga maliliit na isda, 
											mga buwaya, mga lamang dagat, mga 
											lumot, mga koral at mga batong 
											vidriong maniningning ang mga kulay. 
											Namamaulo ang mga bandejang ito sa 
											mga tabako, mga kigarrillo at 
											maliliit na hitsong pinili ng 
											maiinam na mga daliri ng mga dalaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Cumikintab na parang salamin ang 
											tabla ng bahay; mga kortinang jusi o 
											pi&ntilde;a ang mga pamuti ng mga pintuan, 
											sa mga bintana'y nakasabit ang mga 
											parol kristal, o papel rosa, azul, 
											verde o pula: napupuspos ang bahay 
											ng mga bulaklak at ng mga lalagyan 
											ng mga halamang namumulaklak o 
											magaling na mga pamuti na 
											ipinapatong sa mga pedestal na loza 
											sa Tsina; pati ng mga santo'y 
											nangagsisigayak, ang mga larawan at 
											ang mga, 'reliquia' ay nangagsasaya 
											naman, pinapagpagan sila ng alabok 
											at binibitinan ng pinagsalitsalit na 
											mga bulaklak ang kanilang mga marko.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nangagtatayo sa mga daan, sa layong 
											halos nagkakatuladtulad, ng maiinam 
											na mga arkong kawayang binurdahan sa 
											libolibong paraang tinatawag na 
											'sinkaban', at naliligid ng mga 
											kaluskos, na makita lamang ng mga 
											bata'y nangagsasayahan na. Sa 
											paligid ng patio ng simbaha'y naroon 
											ang malaking toldang pinagkagugulan 
											ng mainam, na mga puno ng kawayan 
											ang mga tukod, at ng doon magdaan 
											ang prokesion. Sa ilalim ng toldang 
											ito'y nangaglalaro ang mga bata, 
											nangagtatakbuhan, nangag-aakayatan, 
											nangagluluksuhan at kanilang 
											pinupunit ang mga bagong barong 
											talagang kanilang pagbibihisan sa 
											kaarawan ng piyesta.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nangagtayo doon sa plaza ng tablado, 
											palabasan ng komediang ang mga 
											ginamit na kasangkapa'y kawayan, 
											pawid at kahoy. Diyan magsasaysay ng 
											mga kahangahanga ang komediang 
											Tundo, at makikipag-unahan sa mga 
											dios sa kababalaghan: diyan kakanta 
											at sasayaw si na Marianito, 
											Chananay, Balbino, Ratia, Carvajal, 
											Yeyeng, Likeria at iba pa. 
											Kinalulugdan ng Filipino ang teatro 
											at nangagsusumikap ng pagdalo sa mga 
											ginagawang palabas na mga drama; 
											pinakikinggang hindi umiimik ang 
											kanta, kinatutuwaan ang sayaw at ang 
											'mimika', hindi-sumusutsot, (tanda 
											ng pagpintas,) nguni't hindi naman 
											pumapakpak (tanda ng pagpupuri).</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Hindi niya naibigan ang pinalabas? 
											Ang ginagawa'y nginanganganga ang 
											kanyang hitso, o kung dili kaya'y 
											umaalis na hindi ginagambala ang 
											ibang marahil ay nangalulugod sa 
											pinalalabas na iyon. Manakanakang 
											humihiyaw lamang ang mga mamamayang 
											hangal, pagka hinahagkan o niyayakap 
											ng lumalabas na mga lalaki ang 
											lumalabas na mga babae. Datapwa't 
											hindi lumalampas sa gayong gawa. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											Nang 
											una'y walang pinalalabas kung hindi 
											mga drama lamang; gumagawa ang poeta 
											ng bayan ng isang kathang doo'y 
											hindi naaaring hindi magkaroon ng 
											labanan, pagkakadalawang minuto, 
											isang mapagpatawang 'tupay at 
											kakilakilabot na mga malikmatang 
											pagbabagobago ng anyo. Datapwa't 
											mula ng maisipan ng mga artista sa 
											Tundong gumawa ng labanan bawa't 
											ikalabing limang 'segundo' at 
											maglagay ng dalawang tupay, at 
											magpalabas ng mga kathang lalo ng di 
											sukat mapaniwalaan, mula noo'y 
											kanilang natabunan ang kanilang mga 
											kapangagaw na mga taga lalawigan. 
											Sapagkat totoong malulugdin sa bagay 
											na gayon ang gobernadorcillo, ang 
											ginawa niya'y kanyang piniling 
											kamalam ang kura, ang komediang 
											'Prinkipe Villardo, o ang mga pakong 
											binunot sa imbing yungib,' dramang 
											may 'magia' at may mga 'fuegos 
											artifikiales.'</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Maya't maya'y nirerepique ng&nbsp; 
											buong&nbsp; galak ang mga kampana, 
											ang mga kampana ring iyon ang 
											dumudoblas ng kamakasampung araw. 
											mga ruedang may mga bomba at mga 
											'verso' (morterete) ang siyang 
											umu-ugong sa impapawid; ipakikita 
											ang kanyang dunong ng 'pirotekniko' 
											o kastillerong filipino, na 
											natutuhan ang kanyang 'arte' na sino 
											ma'y walang nagtuturo, naghahanda ng 
											mga toro, mga kastillong may mga 
											paputok at may mga 'lukes de 
											Bengala', mga globong papel na 
											pinapantog ng hanging mainit, mga 
											'rueda de brillante,' mga bomba, mga 
											kohetes at iba pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tumutunog sa malayo ang kaayaayang 
											alingawngaw? Pagdaka'y nangag 
											tatakbuhan ang mga batang lalaki at 
											nangag-uunahan sa pagtungo sa labas 
											ng bayan upang salubungin ang mga 
											banda ng musika. Lima ang inupahan, 
											bukod sa tatlong orquesta. Hindi 
											dapat mawala ang musika ng 
											Pagsanghang ang eskribano ang siyang 
											may ari, at gayon din ang musika ng 
											S.P. de T., na balitang totoo ng 
											panahong iyon, dahil sa ang 
											namamatnugot ay ang maestro Austria 
											ang lagalag bagang si 'kabo 
											Mariano,' na ayon sa sabihana'y dala 
											raw niya sa dulo ng kanyang batuta 
											ang pagkabantog at ang magagandang 
											tinig. Pinupuri ng mga musiko ang 
											kanyang markha funebre 'El Sauke', 
											at kanilang pinanghihinayang siya'y 
											hindi nakapag-aral ng musika, 
											sapagkat sa kagalingan niyang umisip 
											ay makapagbibigay dangal sana siya 
											sa kanyang kinagisnang bayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Pumasok na ang musika sa bayan at 
											tumutugtog ng masayang mga 'markha' 
											na sinusundan ng mga batang marurumi 
											ang pananamit o halos mga hubo't 
											hubad: may ang baro ng kanyang 
											kapatid ang suot, may ang salawal ng 
											kanyang ama. Pagdakang tumitigil ang 
											musika'y nasasaulo na nila ang 
											tugtuging kanilang narinig, kanilang 
											inuulit na sa aging-ing ng bibig o 
											isinusutsot ang tugtuging iyon ng 
											lubos na kakinisan, at kanilang 
											pinasisiyahan na kung maganda o 
											pangit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Samantala'y nangadaratingan ang mga 
											karromata, mga kalesa o mga kotse ng 
											mga kamag-anak, ng mga kaibigan, ng 
											mga hindi kakilala ng mga tahur na 
											dala ang kanikanilang lalong 
											magagaling na mga manok at mga supot 
											ng ginto, at nangahahandang 
											ipanganib ang kanilang pamumuhay sa 
											sugalan o sa loob ng 'rueda' ng 
											sabungan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Tumatanggap ang alperes sa gabigabi 
											ng limang pong piso!--ang ibinubulong 
											ng isang lalaking pandak at mataba 
											sa tainga ng mga bagong 
											dating;--paririto si Kapitan Tiago at 
											maglalagay ng bangka; may 
											labing-walong libong dala si 
											kapitang Joaquin. Magkakaroon ng 
											'liampo,' sampung libo ang ilalagay 
											na puhunan ni insik Carlos. 
											Magsisirating na galing sa Tanawan, 
											sa Lipa at sa Batangan at gayon din 
											sa Santa Cruz, ang malalakas na mga 
											'punto' (mananaya). nguni't 
											magtsokolate kayo. Hindi tayo 
											aanitan ni Kapitan Tiago, na gaya ng 
											taong nagdaan: tatatlong misa de 
											grakia ang kanyang pinagkagugulan, 
											at ako'y may mutya sa kakaw. At 
											kumusta po ba ang familia?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Mabuti po! mabuti po! salamat!--ang 
											isinasagot ng mga nangingibang 
											bayan;--at si Padre Damaso?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Magsesermon sa umaga si Padre 
											Damaso at pagkagabi kasama nating 
											siya'y magbabangka.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Lalong mabuti! lalong mabuti! kung 
											gayo'y walang ano mang panganib!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Panatag, totoong panatag tayo! 
											Bukod sa roo'y susubo si insik 
											Carlos!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At inaakma ng matabang tao ang 
											kanyang mga daliring wari'y 
											nabibilang ng salapi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sa labas ng bayan ang nangyayari 
											nama'y nabibihis ang mga tagabundok 
											ng lalong magagaling nilang 
											pananamit upang dalhin sa bahay ng 
											kanikanilang mamumuhunan ang 
											pinatabang magaling na mga inahing 
											manok, mga baboy-ramo, mga usa, mga 
											ibon; inilululan ng mga iba sa 
											mabibigat ng hilahing mga karreton 
											ang kahoy na panggatong; ang mga 
											iba'y mga bungang kahoy, bihirang 
											makitang mga dapo na nasusumpungan 
											sa gubat; at ang mga iba'y nagdadala 
											naman ng biga na may malalapad na 
											mga dahon, tikas tikas na may mga 
											bulaklak, na kulay apoy upang 
											ipamuti sa mga pintuan ng mga bahay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											nguni't ang kinaroroonan ng lalong 
											malaking kasayahang halos ay 
											kaguluhan na'y doon sa isang malapad 
											na kapatagang mataas, na ilang 
											hakbang lamang ang layo sa bahay ni 
											Ibarra. Cumakalairit ang mga 
											'polea', umaalingawngaw ang mga 
											sigawan, ang mataginting na tunog ng 
											batong nilalabra, ang martillong 
											pumupukpok ng pako, ang palakol na 
											inilalabra ng kahab-an. Caramihang 
											tao ang dumudukal ng lupa at 
											gumagawa sila ng isang maluang at 
											malalim na hukay naghahanay ang iba 
											ng mga batong tinibag sa tibagan ng 
											bayan, nagbababa ng lulan ng mga 
											karreton, nagbubunton ng buhangin, 
											nangaglalagay ng mga torno at mga 
											kabrestante....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Dito! doon iyan! Madali!--ang 
											isinisigaw ng isang maliit na 
											matandang lalaking ang pagmumukha'y 
											masaya at matalino, na ang hawak na 
											pinakatungkod ay isang metro na may 
											tanso ang mga kanto at nakabilibid 
											doon ang lubid ng isang plomada. 
											Iyon ang maestro ng paggawa, si &ntilde;or 
											Juang arkitekto, alba&ntilde;il, 
											karpintero, blanqueador, kerrajero, 
											pintor, pikapedrero at manakanaka 
											pang eskultor.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Kinakailangang ito'y mayari ngayon 
											din! Hindi makapagtatrabajo bukas at 
											gagawin na ang keremonia sa 
											makalawa! Madali!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Gawin ninyo ang hoyo sa isang 
											paraang maipasok na angkap na angkap 
											ang tila hihip na ito!--ang sinasabi 
											sa ilang mga pikapedrero na 
											nangagpapakinis ng isang malaking 
											batong parisukat;--sa loob nito 
											iingatan ang ating mga pangalan!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At inuulit sa bawa't tagaibang 
											bayang lumalapit, ang makalilibong 
											kanyang sinabi na:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Nalalaman ba ninyo ang aming 
											itatayo? Talastasin ninyong ito'y 
											isang eskuelahan, huwaran ng mga 
											ganitong bagay rin, katulad ng mga 
											eskuelahan sa Alemania, higit pa ang 
											kabutihan! Ang arkitektong si 
											ginoong R. at ako ang gumuhit ng 
											plano, at ako ang namamatnugot sa 
											paggawa! Siya nga, po; tingnan 
											ninyo. Ito'y magiging isang 
											palaciong may dalawang pinakapakpak; 
											ukol ang isa sa mga batang lalaki at 
											ang isa'y sa mga batang babae. 
											Magkakaroon dito sa gitna ng isang 
											malaking halamanang may tatlong 
											huwad sa bukal ng tubig na 
											sumusumpit na paitaas, at 
											kaligaligaya ang sambulat ng mga 
											patak; mga puno ng kahoy diyan sa 
											mga tagiliran, maliliit na 
											halamanan, at ng ang mga bata'y 
											magtatanim at mag-aalaga ng mga 
											halaman sa mga horas ng paglilihang, 
											sasamantalahin ang panahon at hindi 
											sasayangin. Tingnan ninyo't 
											malalalim ang mga simiento! Tatlong 
											metro at pitompo't limang 
											kentimentro. Magkakaroon ang bahay 
											na ito ng tatlong bodega, mga yungib 
											sa ilalim ng lupa mga bilangguan sa 
											mga tamad mag-aral sa malapit, sa 
											totoong malapit sa mga pinaglalaruan 
											at sa 'gimnasio', at ng marinig ng 
											mga pinarurusahang bata kung paano 
											ang ginagawang pagkakatuwa ng mga 
											masisipag-mag-aral. Nakikita po ba 
											ninyo ang malaking lugar na iyang 
											walang kaanoano man? Itinatalaga ang 
											kapatagang iyang lampaslampasan ang 
											hangin upang diyan mangagtakbuhan at 
											mangagluksuhan ang mga bata. 
											Magkakaroon ang mga batang babae ng 
											halamanang may mga uupan, mga 
											'kolumpio', mga kakahuyan at ng doon 
											sila makarapaglaro ng 'komba', mga 
											bukal ng tubig na pumapaimbulog, 
											kulungan ng mga ibon at iba pa. 
											Ito'y magiging isang bagay na 
											karikitdikitan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At pinapagkikiskis ni &ntilde;or Juan ang 
											mga kamay sa galak, at ang iniisip 
											niya'y ang pagkabantog na matatamo. 
											Magsisiparito ang mga taga ibang 
											lupain upang dalawin iyon at sila'y 
											mangagtatanong:--Sino ang dakilang 
											arkitektong gumawa nito?--Hindi ba 
											ninyo nalalaman? Tila mandin hindi 
											katotohanang; hindi ninyo makilala 
											si &ntilde;or Juan! Marahil totoong malayo 
											ang inyong pinangalingan!--ang 
											isasagot ng lahat.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Nagpaparoo't parito sa 
											magkabikabilang dulong taglay ang 
											ganitong mga pagdidilidili, na 
											kanyang inuusisang lahat, at ang 
											lahat ay kanyang minamasdan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sa ganang akin ay napakarami 
											namang kahoy ang gamit na iyan sa 
											isang kabria--ang kanyang sinabi sa 
											isang taong naninilaw, na siyang 
											namamatnubay sa ilang mga 
											manggagawa;--kasukatan na, sa ganang 
											akin, ang tatlong mahahabang trozo 
											na papagtutungkuing-kalan o 
											'tripode', at saka tatlo pang kahoy 
											na papagkapitkapitin!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Aba!--ang isinagot ng lalaking 
											naninilaw na ngumingiti ng 
											kakaiba;--lalong malaking 
											panggigilalas ang ating tatamuhin 
											samantalang lalong marami ang mga 
											kasangkapang gamitin natin sa 
											gawaing ito. Lalong mainam ang anyo 
											ng kabooan, lalong mahalaga at 
											kanilang wiwikain: gaano kalaking 
											pagod ang ginugol dito! Makikita 
											ninyo kung ano ang kabriang aking 
											itatayo! At pagkatapos ay aking 
											pamumutihan ng mga banderola, ng mga 
											girnaldang mga dahon at mga bulaklak 
											...; masasabi ninyo pagkatapos na 
											nagkaroon kayo ng magandang kaisipan 
											ng pagkakatanggap ninyo sa akin sa 
											kasamahan ng inyong mga manggagawa, 
											at wala ng mahahangad pa si ginoong 
											Ibarra!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Sa dakong malayolayo roo'y may 
											natatanawang kiosko, na 
											nagkakahugpong sa pamamag-itan ng 
											isang balag na nahahabungan ng mga 
											dahon ng saging.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Ang maestro sa eskuelahang may mga 
											tatlompong batang lalaki ay 
											nangaggagawa ng mga korona, 
											nangagtatali ng mga bandera sa mga 
											maliliit na manga haliging kawayang 
											napupuluputan ng damit na puting 
											pinakumbo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Pagsikapan ninyong uminam ang 
											pagkakasulat ng mga letra!--ang 
											sinasabi sa mga nagpipinta ng mga 
											salitang itatanyag sa 
											lahat;--paririto ang Alkalde, 
											maraming mga kura ang magsisidalo, 
											marahil pati ng Kapitan Heneral na 
											ngayo'y na sa lalawigan! Kung makita 
											nilang magaling kayong magdibujo, 
											marahil kayo'y purihin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--At handugan kami ng isang pizarra 
											...?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Sino ang nakaaalam! datapuwa't 
											humingi na si ginoong Ibarra ng isa 
											sa Maynila. Darating bukas ang ilang 
											bagay na ipamamahagi sa inyong 
											pinakaganting pala.... Datapuwa't 
											pabayaan ninyo ang mga bulaklak na 
											iyan sa tubig, gagawin natin bukas 
											ang mga ramillete, magdadala pa kayo 
											rito ng mga bulaklak, sapagkat 
											kinakailangang malatagan ang mesa ng 
											mga bulaklak, ang mga bulaklak ay 
											nakapagbibigay saya sa mga mata.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Magdadala rito ang aking ama bukas 
											ng mga bulaklak ng baino at saka 
											isang bakol na mga sampaga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Hindi tumatanggap ng bayad ang 
											aking ama sa tatlong karritong 
											buhanging dinala rito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Ipinangako ng aking tiong siya ang 
											magbabayad sa isang maestro,--ang 
											idinugtong ng pamangkin ni kapitang 
											Basilio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											At tunay nga naman; kinalugdan ang 
											panukalang iyon ng lahat halos. 
											Hiningi ng kurang siya ang 
											mag-aamang-binyag at magbebendicion 
											sa paglalagay ng unang bato, 
											pagdiriwang na gagawin sa katapusang 
											araw ng piyesta, at siyang gagawing 
											isa sa mga pinakamalaking pagsasaya. 
											Pati ng koadjutor ay lumapit ng&nbsp; 
											buong&nbsp; kakimian kay Ibarra, at 
											sa kanya'y inihandog ang lahat ng 
											mga pamisang pagbayaran sa kanya ng 
											mga mapamintakasi hanggang sa mayari 
											ang bahay na iyon. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Mayroon pa, 
											sinabi ni hermana Rufa, ang mayaman 
											at mapag-impok na babaeng sakali't 
											kukulangin ng salapi, kanyang 
											lilibutin ang ilang bayan upang 
											magpalimos, sa ilalim ng tanging 
											pagkakasunduang sa kanya'y babayaran 
											ang paglalakbay, ang mga kakanin at 
											iba pa. Pinasalamatan siya ni Ibarra 
											at siya'y sinagot:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Wala tayong makukuhang mahalagang 
											bagay, sapagkat hindi ako mayaman 
											at hindi naman simbahan ang bahay na 
											ito. Bukod sa rito'y hindi ko 
											ipinangakong aking itatayo ang bahay 
											na itong iba ang magkakagugol.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Pinagtatakhan siya at ginagawang 
											uliran ng mga binata, ng mga 
											estudianteng galing Maynilang 
											pumaroon doon at ng makipagpiyesta; 
											nguni't gaya ng nangyayari halos 
											kailan man, pagka ibig nating 
											tularan ang mga tinatakhang mga tao, 
											ang nagagagad lamang natin ay ang 
											kanyang walang kabuluhang mga 
											ginagawa, at kung magkaminsan pa'y 
											ang kanyang mga sawing kaasalan, 
											nangagtataka palibhasa'y wala tayong 
											kaya sa ibang bagay, minamasdan ng 
											maraming sa kanya'y nangagtataka 
											kung paano ang pagtatali ng binatang 
											iyon ng kanyang korbata, ang mga iba 
											nama'y ang anyo ng kuello ng baro, 
											at hindi kakaunti ang nagmamasid 
											kung ilan ang mga boton ng kanyang 
											amerikana at khaleko.</font></p>
											</p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Tila mandin pawang nangapawi 
											magpakailan man ang mga masasamang 
											nangyayari sa panahong hinaharap na 
											ginuguniguni ni matandang Tasio. 
											Iyan nga ang sinabi ni Ibarra isang 
											araw sa kanya; nguni't siya'y 
											sinagot ng matandang mapag-isip ng 
											malulungkot:</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify"></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											--Inyo po sanang alalahanin ang 
											sinasabi ni Baltazar:</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify"></p>
														<p align="justify" style="margin-left: 80px; margin-right: 80px">
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														'Kung ang isalubong sa 
														iyong pagdating</span></font><span style="font-size: 13pt"></div>
														<p align="justify" style="margin-left: 80px; margin-right: 80px">
														<font face="Arial" color="#333333">
														Ay masayang mukha't may 
														pakitang giliw,</font></div>
														<p align="justify" style="margin-left: 80px; margin-right: 80px">
														</span>
														<font face="Arial" color="#333333">
														<span style="font-size: 13pt">
														Lalong pag-ingata't 
														kaaway na lihim...'</span></font></div>
										<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Kung gaano ang galing ni Baltazar sa 
										pagka poeta ay gayon din sa katalinuhang 
										umisip.</font></p>
										<p style="margin-left: 80px; margin-right: 80px" align="justify"></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											Ito at iba pang mga bagay ang mga 
											nangyari sa araw na sinusundan ng 
											piyesta bago lumubog ang araw.</font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="center">
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