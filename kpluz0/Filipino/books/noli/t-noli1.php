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
								<td valign="bottom">
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">I. Isang Pagtitipon</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">N<span class="smcap">ag-anyaya</span> 
ng pagpapakain ng isang hapunan, nang magtatapos ang Oktubre, si Ginoong 
Santiago de los Santos, na lalong nakikilala ng bayan sa pamagat na Kapitan 
Tiago. Anyayang bagaman niyon lamang hapong iyon kanyang inihayag, laban sa 
dati niyang kaugalian, gayon ma'y siyang dahilan ng lahat ng mga usap-usapan 
sa Binundok, sa iba't ibang mga nayon at hanggang sa loob ng Maynila. Nang panahong yao'y 
											magilas si 
Kapitan Tiago, at talastas na ang kanyang bahay at ang kanyang kinamulatang bayan ay 
hindi nagsasara ng pinto kanino man, liban na lamang sa mga kalakal o sa ano 
mang isip na bago o pangahas.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Kawangis ng kislap ng lintik ang kadalian ng pagkalaganap ng balita sa daigdigan ng mga 
dapo, mga langaw o mga 'kolado', 
na kinapal ng Diyos sa kanyang walang hanggang kabaitan, at kanyang pinararami ng&nbsp; 
buong&nbsp; pag-irog sa 
Maynila. Nangagsihanap ang iba ng 'betun' sa kanilang sapatos, mga boton at korbata naman ang iba, nguni't silang lahat ay nangag-iisip kung paano kaya ang mabuting paraang bating lalong walang kakimiang 
gagawin sa may bahay, upang papaniwalain ang makakakitang sila'y malalaon ng kaibigan, 
o kung magkatao'y humingi pang tawad na hindi nakadalong maaga.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ginawa ang anyaya sa paghapong ito sa 
isang bahay sa daang Anloague, at yamang hindi namin natatandaan ang kanyang 
bilang (numero), aming sasaysayin ang kanyang anyo upang makilala ngayon, sakali't 
hindi pa 
iginigiba ng mga lindol. Hindi kami naniniwalang ipinagiba ang bahay na 
iyon ng may-ari, sapagkat sa ganitong gawa'y ang namamahala'y ang Diyos o ang 
kalikasan, 
na tumanggap din sa ating gobyerno ng pakikipagkayari upang gawin ang maraming 
bagay.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang bahay na iyo'y may kalakhan din, tulad sa maraming nakikita sa mga 
lupaing ito; natatayo sa pampang ng ilog na sanga ng ilog Pasig, na kung 
tawagin ng iba'y 'ria' (ilat) ng Binundok, at gumaganap, na gaya rin 
ng lahat ng ilog sa Maynila, ng maraming kapakan-ang pagkapaliguan, agusan ng 
dumi, labahan, pinangingisdaan, daanan 
ng bangkang nagdadala ng sari-saring 
bagay, at kung magkabihira pa'y kukunan ng tubig na inumin, kung minamagaling ng 
tagaigib na intsik. 
</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Dapat halataing sa lubhang kinakailangang gamit na ito ng nayong ang dami ng kalakal at taong nagpaparoo't parito'y nakatutulig, sa layong halos may 
sanglibong metro'y bahagya na lamang nagkaroon ng isang tulay na kahoy, na sa 
anim na bowa'y sira ang kabilang panig at ang kabila nama'y hindi maraanan sa 
nalalabi ng taon, na ano pa't ang mga kabayo, kung panahong tag-init, kanilang 
sinasamantala ang gayong hindi nagbabagong anyo, upang mula roo'y lumukso sa 
tubig, na ikinagugulat ng nalilibang na taong may kamatayang sa loob ng kotse 
ay nakakatulog o nagdidilidili ng mga paglago ng panahon.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">May kababaan ang bahay na sinasabi namin, 
at hindi totoong magaling ang pagkakaanyo; kung hindi napagmasdang mabuti ng 'arquitektong' 
namatnugot sa paggawa o ang bagay na ito'y kagagawan ng mga lindol at mga bagyo, sino ma'y walang makapagsasabi ng tukoy. Isang malapad na hagdanang ma'y 
kakapitang kulay verde, at nalalatagan ng alfombra sa mumunting panig ang siyang 
daanan mula sa silong o makapasok ng pintuang nalalatagan ng 'azulejos' 
hanggang sa kabahayan, na ang linalakara'y napapag-itanan ng mga maketa 
at alagaan ng mga bulaklak na nakalagay sa 'pedestal' 
na lozang gawa sa Tsina, na may sari-saring kulay at may mga dibujong hindi 
mapaglirip.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333">
<span style="font-size: 13pt">Yamang walang bantay-pinto o alilang 
humingi o magtanong ng 'billete' o sulat na anyaya, tayo'y pumanhik, oh ikaw 
na bumabasa sa akin, katoto o kaaway! sakali't naaakit ikaw ng tugtog ng 
orquesta, ng ilaw o ng makahulugang 'klin-klan' ng mga pingga't kubiertos 
at ibig mong mapanood kung paano ang mga piging doon sa Perla ng Kasilanganan. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">Kung sa aking kaibigan lamang at sa aking sariling kaginhawahan, 
hindi kata papagalin sa pagsasaysay ng kalagayan ng bahay; nguni't lubhang 
mahalaga ito, palibhasa'y ang karaniwan sa mga may kamatayang gaya natin ay 
tulad sa pawikan: hinahalagahan at hinihirang tayo alinsunod sa ating talukab o 
tinatahanang bahay; dahil dito't sa iba pang mga anyo ng asal, kawangis nga 
ng mga pawikan ang mga may kamatayan sa Pilipinas.</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 13pt">- Kung pumanhik tayo'y agad 
nating mararating ang isang maluwang na tahanang kung tawagin doo'y 'kaida', 
ayawan kung bakit, na ng gabing ito'y ginagamit na 'komedor'</span></font><span style="font-size: 13pt"><font face="Arial">
											</font>
<font color="#333333" face="Arial"> 
at tuloy salon ng orquesta. Sa gitna'y may isang mahabang mesa, na nahihiyasan 
ng marami at mahahalagang pamuti, na tila mandin kumikindat sa 'kolado,' taglay 
ang katamistamisang mga pangako, at nagbabala sa matatakuting binibini, sa 
walang malay na dalaga, ng dalawang nakaiinip na oras sa kasamahan ng mga hindi 
kakilala, na ang pananalita't mga pakikikiusap ay ang karaniwa'y totoong kakaiba. </font>
											</span></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<span style="font-size: 13pt">
											<font color="#333333" face="Arial"> 
											Namumukod ng di ano lamang sa mga ganitong handang sa mundo'y 
nauukol, ang sumasapader na mga kuadrong tungkol sa religion, gaya baga ng 'Ang 
											purgatoryo,' 
'Ang Infierno,' 'Ang huling Paghuhukom,' 'Ang pagkamatay 
ng 
banal,' 'Ang pagkamatay ng makasalanan,' at sa duyo'y naliligid nang isang 
maringal at magandang 'marko' na anyong 'Renakimiento' 
na gawa ni Arevalo, ang isang mabuting ayos at malapad na 'lienzo' na doo'y 
napapanood ang dalawang matandang babae. Ganito ang saysay ng doo'y titik: 
'Nuestra Se&ntilde;ora de la Paz y Buen Viaje, na sinasamba sa Antipolo, sa ilalim 
ng 
anyong babaeng magpapalimos, dinadalaw sa kanyang pagkakasakit ang banal at 
bantog na si Kapitana Ines'. 
</font></span></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<span style="font-size: 13pt">
											<font color="#333333" face="Arial"> 
											Tunay mang ang pagkakapinta'y hindi nagpapakilala ng 'arte' at kabutihang 
lumikha, datapuwa't nagsasaysay naman ng karaniwang mamalas: ang babaeng may 
sakit ay tila na bangkay na nabubulok, dahil sa kulay dilaw at asul ng kanyang 
mukha; ang mga vaso't iba pang mga kasangkapan, iyang maraming mga natitipong 
bagay bagay sa mahabang pagkakasakit ay doo'y lubhang mabuti ang pagkakasipi, na 
ano pa't napapanood pati ng linalaman. </font></span></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<span style="font-size: 13pt">
											<font color="#333333" face="Arial"> 
											Sa panonood ng mga kalagayang iyong 
umaakit sa pagkakagana sa pagkain at nag-uudyok ng ukol sa paglasap ng 
masasarap na bagay bagay, marahil akalain ng ilang may masamang isipan ang 
may-ari ng bahay, na napagkikilalang magaling ang kalooban ng halos lahat ng mga magsisiupo sa mesa. </font></span></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" style="font-size: 13pt" color="#333333">
											A</font><span style="font-size: 13pt"><font color="#333333" face="Arial">t 
											upang huwag namang mahalatang totoo ang kanyang 
panukala, nagsabit sa kisame ng maririkit na lamparang gawa sa Tsina, mga 
jaulang walang ibon, mga bolang kristal na may azogueng may kulay pula, verde 
at azul, mga halamang pangbiting lanta na, mga tuyong isdang botete na 
hinipa't ng bumintog, at iba pa, at ang lahat ng ito'y nakukulong sa may 
dakong ilog ng maiinam na mga arkong kahoy, na ang anyo'y alangang hugis 
europeo't alangang hugis intsik, at may natatanaw namang isang 'azoteang' 
may mga balag at mga 'glorietang'</font></span>
											<font color="#333333" face="Arial"> 
											<span style="font-size: 13pt">bahagya na naliliwanagan ng mga maliliit na parol na papel na may 
											sari-saring kulay.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nasasalas ang mangagsisikain, sa gitna 
ng lubhang malalaking mga salamin at na ngagniningning na mga ara&ntilde;a: 
at doon sa ibabaw ng isang tarimang 
pino ay 
may isang mainam na 'piano de kola', 
na ang halaga'y kamalakmalak, at lalo ng mahalaga ng gabing ito, sapagkat 
sino ma'y walang tumutugtog. Doo'y may isang larawang 'al oleo' 
ng isang lalaking makisig, nakafrak, unat, matuwid, timbang na tulad sa bastong 
may borlas na taglay sa mga matitigas na daliring puspos ng mga sinsing: 
wari'y sinasabi ng larawan:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ehem! masdan ninyo 
kung gaano karami ang suot ko at ako'y hindi tumatawa!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Magaganda ang mga kasangkapan, 
bagaman marahil ay hindi maginhawahang gamitin at nakasasama pa sa katawan: hindi nga 
ang ikaiilag sa sakit ng kanyang mga inaanyayahan ang naiisip ng may-ari, kung di ang sariling pagmamarikit.- Tunay at 
kakilakilabot na bagay ang 
pag-iilagin, datapuwa't kayo nama'y umuupo sa mga sillong gawang Europa, at 
hindi palaging makakatagpo kayo ng ganyan!- ito marahil ang sinasabi niya sa kanila.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Halos puno ng tao ang salas: hiwalay ang 
mga lalaki sa mga babae, tulad sa mga sambahang katoliko at sa mga sinagoga. 
Ang mga babae ay ilang mga dalagang ang iba'y filipina at ang iba'y espa&ntilde;ola: 
binubuksan nila ang bibig upang pigilin ang isang hikab; nguni't pagdaka'y 
tinatakpan nila ng kanilang mga abaniko; bahagya na nangagbubulungan ng 
ilang mga pananalita.</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ano mang pag-uusap na ipinagsusumalang pasimulan, 
pagdaka'y naluluoy sa ilang putol-putol na sabi; katulad niyang mga ingay na 
naririnig kung gabi sa isang bahay, mga ingay na gawa ng mga daga at ng mga butiki. Baka 
kaya naman ang 
mga larawan ng mga iba't ibang mga 'Nuestra Se&ntilde;ora' 
na nagsabit sa mga pader ang siyang ninilit sa mga dalagang iyong huwag umimik 
at magpakahinhing lubos, o dito'y talagang natatangi ang mga babae?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang tanging sumasalubong sa pagdating ng 
mga ginoong babae ay isang babaeng matandang pinsan ni Kapitan Tiago, mukhang 
mabait at hindi magaling magwikang kastila. Ang pinakaubod ng kanyang pagpapakitang 
loob at pakikipagkapwa tao'y wala kung ang di mag-alay sa mga espa&ntilde;ola ng 
tabako at hitso, at magpahalik ng kanyang kamay sa mga filipina, na ano pa't 
walang pinag-ibhan sa mga prayle. Sa kawakasa'y nayamot ang abang matandang 
babae, kaya't sinamantala niya ang paglagapak ng isang pinggang nabasag upang 
lumabas na dalidali at nagbububulong:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Jesus! Hintay kayo, 
mga indigno!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">At hindi na muling sumipot.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333">
<span style="font-size: 13pt">Tungkol sa mga lalaki'y 
nangagkakainga'y ng kaunti. Umaatikabong nangagsasalitaan ang ilang mga kadete; 
nguni't mahihina ang boses, sa isa sa mga sulok at manakanakang tinitingnan 
nila at itinuturo ng daliri ang ilang mga taong na sa salas, at silasila'y 
nangagtatawanang ga inililihim ng hindi naman; ang bilang kapalit nama'y ang 
dalawang extrangero 
na kapwa nakaputi ng pananamit, nangakatalikod kamay at di umiimik ay 
nangagpaparoo't paritong malalaki ang hakbang sa magkabikabilang dulo ng 
salas, tulad sa ginagawa ng mga naglalakbay-dagat sa 'kubierta' 
ng isang sasakyan. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font color="#333333" face="Arial"> 
											<span style="font-size: 13pt">Ang masaya't mahalagang salitaa'y nasa isang pulutong na 
ang bumubuo'y dalawang prayle, dalawang paisano 
at isang militar na kanilang naliligid ang isang maliit na mesang kinalalagyan 
ng mga botella ng alak at mga biskocho ingles.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang militar ay isang matandang teniente, 
matangkad, mabalasik ang pagmumukha, na ano pa't anaki'y isang Duque de Alba 
na napag-iwan sa eskala 
ng Guwardiya Sibil. 
Bahagya na siya nagsasalita, datapuwa't matigas at maikli ang pananalita.- Ang 
isa sa mga prayle'y isang dominikong bata pa, maganda, malinis at maningning, 
na tulad sa kanyang salamin sa matang nakakabit sa tangkay na ginto, maaga ang 
pagka ugaling matanda: siya ang kura sa Binundok at ng mga nakaraang tao'y 
naging katedratiko 
sa San Juan de Letran. 
</font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Siya'y balitang 'dialektiko', 
kaya nga't ng mga panahong iyong nangangahas pa ang mga anak ni Guzmang 
makipagsumag sa paligsahan ng katalasan ng isip sa mga 'seglar', 
hindi makuhang malito siya o mahuli kailan man ng magaling na 'argumentador' 
na si B. de Luna; 
itinutulad siya ng mga 'distingo' 
ni Fr. Sibyla sa mangingisdang ibig humuli ng igat sa pamamag-itan ng silo. 
Hindi nagsasalita ang dominiko at tila mandin pinakatitimbang ang kanyang mga 
pananalita.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Baligtad ang isa namang prayle, na 
frankiskano, totoong masalita at lalo ng mainam magkukumpas. Bagaman sumusungaw na ang mga uban sa kanyang balbas, wari'y nananatili ang lakas ng 
kanyang malusog na pangangatawan. Ang mukha niyang maganda ang tabas, ang 
kanyang mga pagtinging nakalalagim, ang kanyang malalapad na mga 
panga at batibot na pangangatawan ay nagbibigay anyo sa kanyang isang 
patrikio romanong 
nagbalat kayo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">At kahit hindi sinasadya'y inyong magugunita yaong tatlong 
monjeng 
sinasabi ni Heine 
sa kanyang 'Diyoses en el destierro', 
na nagdaraang namamangka pagkahating gabi sa isang dagatan doon sa Tyrol, 
kung 'equinokkio' 
ng Setyembre, at sa tuwing dumaraa'y inilalagay ng abang mamamangka ang isang 
salaping pilak, malamig na kawangis ng 'hielo,' na siyang sa kanya'y 
pumupuspos ng panglulumo. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Datapuwa't si Fray Damaso'y hindi mahiwagang gaya 
nila; siya'y masaya, at kung pabug-al bug-al ang kanyang boses sa pananalita, 
tulad sa isang taong kailan ma'y hindi naaalang-alang, palibhasa'y ipinalalagay 
na banal at wala ng gagaling pa sa kanyang sinasabi, kinakatkat ang saklap ng 
gayong ugali ng kanyang tawang masaya at bukas, at hangang sa napipilitan kang 
sa kanya'y ipatawad ang pagpapakita ng mga paang walang kalketin at mga 
binting mabalahibo, na ikakikita ng maraming pagkabuhay ng isang Mendikta sa 
mga feria sa Kiapo.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ang isa sa mga paisano'y isang taong 
malinggit, maitim ang balbas at walang ikinatatangi kung di ang ilong, na sa kalakha'y masasabing hindi kanya; ang isa, nama'y isang binatang 
kulay ginto 
ang buhok, na tila bagong dating dito sa Pilipinas: ito ang masilakbong 
pinakikipagmatuwiranan ng frankiskano.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Makikita rin ninyo- 
ang sabi ng frankiskano- pagka po kayo'y natirang ilang bowan dito, kayo'y 
maniniwala sa aking sinasabi: iba ang mamahala ng bayan ng Madrid at iba, ang 
matira sa Pilipinas!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- nguni't....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ako, sa halimbawa- ang patuloy na 
pananalita ni Padre Damaso, na lalong itinaas ang boses at ng di na makaimik ang 
kanyang kausap- ako'y mayroon na ritong dalawampu at tatlong taong saging at 'morisqueta', 
makapagsasabi ako ng mapapaniwalaan tungkol sa bagay na iyan. Huwag kayong 
tumutol sa akin ng alinsunod sa mga karunungan at sa mabubuting pananalita, 
nakikilala ko ang 'indio'. 
Akalain ninyong mula ng ako'y dumating sa lupaing ito'y ako'y iniukol na sa 
isang bayang maliit nga, nguni't totoong dumog sa pagsasaka. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Hindi ko pa 
nauunawang magaling ang wikang tagalog, gayon ma'y kinukumpisal ko na ang mga 
babae 
at nagkakawatasan kami, at lubhang pinakaibig nila ako, na ano pa't ng makaraan 
ang tatlong taon, ng ako'y ilipat sa ibang bayang lalong malaki, na walang 
namamahala dahil sa pagkamatay ng kurang 'indio' roon, nangagsipanangis ang 
lahat ng babae, pinuspos ako ng mga handog, inihatid nila akong may kasamang 
musika....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Datapuwa't iya'y nagpapakilala lamang....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Hintay kayo! hintay kayo! 
Huwag naman 
sana kayong napakaningas! Ang humalili sa akin ay hindi totoong nagtagal na 
gaya ko, at ng siya'y umalis ay lalo ng marami ang naghatid, lalo ng marami 
ang umiyak at lalo ng mainam ang musika, gayong siya'y lalo ng mainam mamalo 
at pinataas pa ang mga 'derechos ng parroquia', 
hangang sa halos nag-ibayo ang laki.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Nguni't itutulot ninyo sa aking....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Hindi lamang iyan, natira ako sa bayang 
San Diegong dalawampung taon, may ilang bowan lamang ngayong aking.... iniwan 
(dito'y nagpakitang tila masama ang loob). Hindi maikakait sa akin nino mang 
dalawampung tao'y 
mahigit kay sa katatagan upang makilala ang isang bayan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">May anim na libo ang 
dami ng taong namamayan sa San Diego, at bawa't tagaroo'y nakikilala ko, na 
parang siya'y aking ipinanganak at pinasuso: nalalaman ko kung alin ang mga 
lisyang kaasalan nito, kung ano ang pinangangailangan niyon, kung sino ang 
nangingibig sa bawa't dalaga, kung ano anong mga pagkadupilas ang nangyari sa 
babaeng ito, kung sino ang tunay na ama ng batang inianak, at iba pa; 
palibhasa'y kinukumpisal ko ang kalahatlahatang taong-bayan; nangag-iingat ng 
mainam sila sa kanikanilang katungkulan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											Magsabi kung nagsisinungaling ako si 
											Santiagong siyang may ari nitong 
											bahay; doo'y marami siyang mga lupa 
											at doon kami naging magkaibigan. 
											ngayo'y makikita ninyo kung ano ang 
											'indio'; ng ako'y umalis, bahagya na 
											ako inihatid ng ilang mga 
											matatandang babae at ilang 'hermano' 
											terkero, gayong natira ako roong 
											dalawampung taon!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nguni't hindi ko mapagkuro kung ano ang 
kabagayan ng inyong mga sinabi sa pagkakaalis ng 'estanko ng tabako'- ang 
sagot ng may mapulang buhok na kausap, na kanyang sinamantala ang sandaling 
pagkatigil dahil sa pag-inom ng frankiskano ng isang kopita ng Jerez.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa panggigilalas ng di ano lamang ni 
Padre Damaso ay kaunti nang mabitiwan nito ang kopa. Sandaling tinitigan ang 
binata at:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Paano? paano?- ang sinabi pagkatapos ng&nbsp; 
buong&nbsp; pagtataka.- Datapuwa't mangyayari bagang hindi ninyo mapagwari iyang kasing liwanag ng 
ilaw? Hindi ba ninyo nakikita, anak ng Diyos, na ang lahat 
ng ito'y nagpapatibay na totoo, na pawang kahalingan ang mga 
pagbabagong utos na ginagawa ng mga ministro?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">ngayo'y ang may pulang buhok naman ang 
natigagal, lalong ikinunot ng teniente ang kanyang mga kilay, iginagalaw ang 
ulo ng taong bulilit na parang ipinahahalata niyang binibigyan niyang katuwiran 
o hindi si Fray Damaso. Nagkasiya na lamang ang dominiko sa pagtalikod sa 
kanilang lahat halos.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Inaakala baga ninyo ...?- ang sa 
kawakasa'y nagawang tanong ng&nbsp; buong&nbsp; katimpian ng binata, na tinititigan ng&nbsp; 
buong&nbsp; pagtataka ang prayle.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Na kung inaakala ko? Sinasampalatayanan kong gaya ng pagsampalataya sa Evangelio! 
Napaka 'indolente' ang 'indio'!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ah! ipatawad po ninyong salabatin ko ang 
inyong pananalita- anang binata, na idinahan ang boses at inilapit ng kaunti ang 
kanyang upuan; sinabi po ninyo ang isang salita na totoong nakaakit sa aking 
magdilidili. Tunay nga kayang katutubo ng mga dalisay na tagarito ang pagka 
'indolente,' o nangyayari ang sinasabi ng isang maglalakbay na taga ibang 
lupain, na tinatakpan natin ng pagka indolenteng ito ang ating sariling pagka 
indolente, ang pagkahuli natin sa pagsulong sa mga karunungan at ang ating 
paraan ng pamamahala sa lupaing nasasakupan? Ang sinabi niya'y ukol sa mga 
ibang lupaing sakop, na ang mga nananahan doo'y pawang sa lahi ring iyan!...</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Oho! mga kaingitan! 
Itanong po ninyo kay ginoong Laruja na nakakikilala rin sa lupaing ito; itanong 
ninyo sa kanya kung may mga katulad ang kamangmangan at ang pagka 'indolente' ng 
indio!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Tunay nga- ang 
sagot naman ng bulilit na lalaking siyang binanggit- hindi po kayo makakakita sa 
alin mang panig ng daigdig ng hihigit pa sa pagka indolente ng indio, sa alin 
mang panig ng daigdig!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ni iba pang lalong 
napakasama ng asal na pinagkaratihan, ni iba pang lalong hindi marunong kumilala 
ng utang na loob!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- At ng ibang lalong 
masama ang turo!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpasimula ang binatang mapula ang buhok 
ng pagpapalingaplingap sa magkabikabila ng&nbsp; buong&nbsp; pag-aalap-ap.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- mga ginoo- ang sinabing marahan- tila 
mandin tayo'y na sa bahay ng isang 'indio'. Ang 
mga ginoong dalagang iyan....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Bah! huwag kayong napaka 
magugunigunihin! Hindi ipinalalagay ni Santiagong siya'y 'indio,' bukod sa roo'y 
hindi siya nahaharap, at.... kahit nahaharap man siya! Iya'y mga kahalingan 
ng mga bagong dating. Hayaan ninyong makaraan ang ilang bowan; magbabago kayong isipan pagka 
kayo'y nakapagmalimit sa maraming mga piyesta at 'bailujan', 
nakatulog sa mga katre at nakakain ng maraming 'tinola'.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Tinatawag po ba ninyong tinola ang 
bungang kahoy na kahawig ng 'loto' 
na ... ganyan ... nakapagmamalimutin sa mga tao?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ano bang loto ni loteria!- ang sagot ni 
Padre Damasong nagtatawa;- nagsasalita kayo ng mga kahalingan. Ang tinola ay 
ang pinaghalong inahing manok at saka upo. Buhat pa kailan dumating kayo?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Apat na araw- ang sagot ng binatang ga 
namumuhi na.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Naparito ba kayong may katungkulan?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Hindi po; naparito ako sa aking sariling 
gugol upang mapagkilala ko ang lupaing ito.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Aba, napakatangi namang ibon!- ang 
saysay ni Padre Damaso, na siya'y minamasdan ng&nbsp; buong&nbsp; pagtataka- Pumarito sa 
sariling gugol at sa mga kahalingan lamang! Cakaiba namang totoo! Ganyang karaming mga libro ... sukat na ang magkaroon ng dalawang daling noo.... 
Sa ganya'y maraming sumulat ng mga dakilang libro! Sukat na ang magkaroon ng 
dalawang daling noo....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Sinasabi ng 'kagalanggalang po ninyo', 
Padre Damaso- ang biglang isinalabat ng dominiko na 
pinutol ang salitaan- na kayo'y nanahang dalawampung taon sa bayang San Diego at 
kayo umalis doon.... hindi po ba kinalulugdan ng inyong kagalangan ang bayang 
iyon?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Biglang nawala ang 
katuwaan ni 
Padre Damaso 
at tumigil ng pagtatawa sa tanong na itong ang anyo'y totoong parang walang 
ano man at hindi sinasadya.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nagpatuloy ng pananalita ang 
dominiko ng anaki'y lalong nagwawalang bahala:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Marahil nga'y nakapagpipighati ang iwan 
ang isang bayang kinatahanang dalawampung taon at napagkikilalang tulad sa 
habitong suot. Sa ganang akin lamang naman, dinaramdam kong iwan ang Camiling, 
gayong iilang buwan akong natira roon ... nguni't yao'y ginawa ng mga puno 
sa ikagagaling ng Capisanan ... at sa ikagagaling ko naman.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Noon lamang ng gabing iyon, tila totoong 
natilihan si Padre Damaso. Di kaginsaginsa'y pinakabigyanbigyan ng suntok ang 
palungan ng kamay ng kanyang sillon, huminga ng malakas at nagsalita:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- O may Religion o wala! sa makatuid 
baga'y o ang mga kura'y may kalayaan o wala! Napapahamak ang lupang ito, na sa 
kapahamakan!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">At saka muling sumuntok.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Hindi!- ang sagot na paangil at galit, 
at saka biglang nagpatinghiga ng&nbsp; buong&nbsp; lakas sa hiligan ng sillon.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Sa pagkamangha ng nangasasalas ay 
nangagtinginan sa pulutong na iyon: itinunghay ng dominiko ang kanyang ulo 
upang tingnan niya si Padre Damaso sa ilalim ng kanyang salamin sa mata. 
Tumigil na sandali ang dalawang extranjerong nangagpapasial, nangagtinginan, 
ipinakitang saglit ang kanilang mga pangil; at pagdaka'y ipinagpatuloy uli ang kanilang pagpaparoo't parito.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Masama ang loob dahilang hindi ninyo 
binigyan ng Reverencia (Kagalang-galang)! - ang ibinulong sa tainga ng binatang 
mapula ang buhok ni ginoong Laruja.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ano po ba, ang ibig sabihin ng 'kagalanggalang' ninyo (Vuestra Reverencia)? ano ang sa inyo'y nangyayari? 
- ang 
mga tanong ng dominiko at ng teniente, na iba't iba ang taas ng boses.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333">
<span style="font-size: 13pt">- Kaya dumarating dito ang lubhang 
maraming mga sakuna! Tinatangkilik ng mga pinuno ang mga 'hereje'</span></font><span style="font-size: 13pt"><font face="Arial">
</font></span>
<font color="#333333" face="Arial"> 
<span style="font-size: 13pt">laban sa mga 'ministro' ng Diyos! 
ang ipinagpatuloy ng frankiskano na ipinagtutumaas ang kanyang malulusog o na 
mga panuntok.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ano po ba ang ibig ninyong sabihin?- ang 
muling itinanong ng abot ng kilay na teniente na anyong titindig.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Na kung ano ang ibig kong sabihin?- ang 
inulit ni Padre Damaso, na lalong inilakas ang boses at humarap sa teniente.- Sinasabi ko ang 
ibig kong sabihin! Ako, ang ibig kong sabihi'y pagka itinatapon ng kura sa 
kanyang libingan ang bangkay ng isang 'hereje,' sino man, kahi ma't ang hari ay 
walang katuwirang makialam, at lalo ng walang katuwirang makapagparusa. At 
ngayo'y ang isang 'generalito', ang isang generalito Calamidad...!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333">
<span style="font-size: 13pt">- Padre, ang kanyang karilagan</span></font><span style="font-size: 13pt"><font face="Arial">
</font>
<font color="#333333" face="Arial"> 
(ang marilag bagang Gobernador Heneral) ay Vice-Real Patrono</font><font face="Arial">
</font></span>
<font color="#333333" face="Arial"><span style="font-size: 13pt">-&nbsp; ang 
sigaw ng teniente na nagtindig.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ano bang Carilagan o Vice-Real Patrono 
man!- ang sagot ng frankiskanong nagtindig din.- Kung nangyari ito sa ibang 
panaho'y kinaladkad sana siya ng pababa sa hagdanan, tulad ng minsa'y ginawa ng 
mga Capisanan ng mga prayle sa pusong na Gobernador Bustamante. Ang mga panahong 
iyon ang tunay na panahon ng pananampalataya!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Ipinauunawa ko sa inyo na di 
ko maitutulot ... Ang 'Kanyang Carilagan,' (o ang marilag na Gobernador Heneral) 
ang pinakakatawan ng Kanyang Makapangyarihan, ang Hari.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ano bang hari o kung Roque 
man! Sa ganang amin ay walang ibang hari kung di ang tunay.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Tigil!- ang sigaw ng 
tenienteng nagbabala at wari'y mandin ay nag-uutos sa kanyang mga sundalo;- o 
inyong pagsisisihan ang lahat ninyong sinabi o bukas din ay magbibigay sabi ako 
sa Kanyang Carilagan!...</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Lakad na kayo ngayon din, lakad na 
kayo!- ang sagot ng&nbsp; buong&nbsp; paglibak ni Padre Damaso, na lumapit sa 
tenienteng nakasuntok ang kamay.- Akala ba ninyo't may suot akong habito'y wala 
akong ...? Lakad na kayo't ipahihiram ko pa sa inyo ang aking kotse!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nauwi ang salitaan sa katawatawang anyo. 
Ang kagalingang palad ay nakialam ang dominiko.- mga ginoo!- ang sabi niyang 
taglay ang anyong may kapangyarihan at iyang boses na nagdaraan sa ilong na 
totoong nababagay sa mga prayle;- huwag sana ninyong papagligawligawin ang mga 
bagay, at Huwag naman kayong humanap ng mga paglapastangan sa walang makikita 
kayo. Dapat nating ibukod sa mga pananalita ni Padre Damaso ang mga pananalita ng tao sa 
mga pananalita ng sacerdote. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font face="Arial" color="#333333" style="font-size: 13pt">Ang mga pananalita ng sacerdote, sa kanyang pagkasacerdote, 
'per se', 
ay hindi makasasakit ng loob kanino man, sapagkat mula sa lubos ng 
katotohanan. Sa mga pananalita ng tao, ay dapat gawin ang isa pa manding 
pagbabahagi: ang mga sinasabing 'ab irato', 
ang mga sinabing 'exore', 
datapuwa't hindi 'in korde', 
at ang sinasabing 'in korde'. Ang mga sinasabing 'in korde' lamang ang 
makasasakit ng loob: sakali't dating tinataglay ng 'in 
meate' 
sa isang kadahilanan, o kung nasabi lamang 'per akkidens', 
sa pagkakainitan ng salitaan, kung mayroong....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333">
<span style="font-size: 13pt">- nguni't ako'y 'por akkidens' at 'por mi' 
ay nalalaman ko ang mga kadahilanan, Padre Sibyla!- ang isinalabat ng militar, 
na nakikita niyang siya'y nabibilot ng gayong karaming mga pag tatangitangi, 
at nanganganib siyang kung mapapatuloy ay siya pa ang lalabas na may kasalanan.- Nalalaman 
ko ang mga kadahilanan at papagtatangiin ng 'kagalangan 
po ninyo' (papagtatangitangiin po ninyo). Sa panahong wala si Padre Damaso sa 
San Diego ay inilibing ng koadjutor</span></font><span style="font-size: 13pt"><font face="Arial">
</font></span> <font color="#333333" face="Arial"> 
<span style="font-size: 13pt">ang bangkay ng isang taong totoong karapatdapat ...; opo, totoong karapatdapat; 
siya'y makailan kong nakapanayam, at tumuloy ako sa kanyang bahay. </span></font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font color="#333333" face="Arial"> 
											<span style="font-size: 13pt">Na siya'y 
hindi nangumpisal kailan man, at iyan baga'y ano? Ako ma'y hindi rin 
nangungumpisal, nguni't sabihing nagpakamatay, iya'y isang kasinungalingan, 
isang paratang. Isang taong gaya niyang may isang anak na lalaking kinabubuhusan 
ng&nbsp; buong&nbsp; pag-irog at mga pag-asa, isang taong may pananampalataya sa Diyos, na 
nakakaalam ng kanyang mga katungkulang dapat ganapin sa pamamayan, isang taong 
mapagmahal sa kapurihan at hindi sumisinsay sa katuwiran, ang ganyang tao'y 
hindi nagpapakamatay. Ito'y sinasabi ko, at hindi ko sinasabi ang mga ibang 
aking iniisip, at kilanling utang na loob sa akin ng 'kagalangan' po ninyo.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">At tinalikdan ang frankiskano at 
nagpatuloy ng pananalita:</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- ng magkagayo'y ng magbalik ang kurang 
ito sa bayan, pagkatapos na maalipusta ang koadjutor, ang ginawa'y ipinahukay 
ang bangkay na iyon, ipinadala sa labas ng libingan, upang ibaon hindi ko 
maalaman kung saan. Sa karuwagan nang bayang San Diego'y hindi tumutol; tunay 
nga't iilan lamang ang nakaalam, walang kamag-anak ang nasira, at na sa Europa 
ang kanyang bugtong na anak; nguni't nabalitaan ng Gobernador Heneral, at palibhasa'y taong may dalisay na 
puso, ay hiningi ang kaparusahan ... at 
inilipat si Padre Damaso sa lalong magaling na bayan. Ito nga lamang ang 
nangyari. ngayo'y gawin ng 'inyo pong kagalangan' ang pagtatangitangi.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">At pagka sabi nito'y lumayo sa pulutong na 
iyon.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Dinaramdam kong hindi ko sinasadya'y 
nabangit ko ang isang bagay na totoong mapanganib ani Padre Sibylang may 
pighati.- Datapuwa't kung sa kawakasa'y nakinabang naman kayo sa 
pagpapalit-bayan....</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ano bang pakikinabangin! At ang 
nawawala sa mga paglipat ... at ang mga papel ... at ang mga ... at ang lahat ng 
mga naliligwin?- ang isinalabat na halos nauutal ni Padre Damaso na hindi 
makapagpigil ng galit.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Untiunting nanag-uli ang kapisanang iyon 
sa dating katahimikan.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Nangagsidating ang iba pang mga tao, kaakbay ang isang matandang 
kastilang pilay, matamis at mabait ang pagmumukha, 
nakaakay sa bisig ng isang matandang babaeng filipinang puno ng kulot ang 
buhok, may mga pinta ang mukha at nakasuot europea.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify"><font face="Arial" color="#333333">
<span style="font-size: 13pt">Sila'y sinalubong ng bating katoto ng 
naroroong pulutong, at nangagsiupo sa tabi ng ating mga kakilala ang Doktor 
De Espada&ntilde;a at ang ginoong asawa niyang 'doktora' na si Do&ntilde;a Victorina. Doo'y 
napapanood ang ilang mga 'periodista' 
at mga 'almakenero'</span></font><span style="font-size: 13pt"><font face="Arial">
</font></span> <font color="#333333" face="Arial"> 
<span style="font-size: 13pt">na nangagpaparoo't parito at walang maalamang gawin.</span></font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- nguni't masasabi po ba ninyo sa akin, ginoong Laruja, 
kung anong tao kaya ang may ari ng bahay?- ang tanong ng 
binatang mapula ang buhok.- Ako'y hindi pa naipapakilala sa kanya.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Ang sabihana'y umalis daw, ako ma'y hindi 
ko pa siya nakikita.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Dito'y hindi kailanganang mga 
pagpapakilala!- ang isinabad ni Padre Damaso,- Si Santiago'y isang taong mabait.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Isang taong hindi nakatuklas ng polvora- ang 
idinugtong ni Laruja.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Kayo po naman, ginoong Laruja!- ang 
sinabi sa malambing na pagsisi ni Do&ntilde;a Victorinang nag-aabaniko.- Paano po bang 
matutuklasan pa ng abang iyon ang polvora, ay 
alinsunod sa sabi'y natuklasan na ito ng mga intsik na malaong panahon na?</font></p>
<p class="gap" style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Nang mga intsik? Nasisira 
ba ang isip ninyo?- ang sabi ni Padre Damaso,- Tumahan nga kayo! Ang nakatuklas 
ng paggawa ng polvora'y isang frankiskano, isa sa aming samahan, Fr. Hindi ko 
maalaman Savalls, ng siglong ... ikapito!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Isang frankiskano! Marahil naging 
misionero sa Tsina, ang Padre Savalls na iyan- ang itinutol ng ginoong babae na 
hindi ipinatatalo ng gayongayon lamang ang kanyang mga isipan.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Marahil Skhwartz 
ang ibig po ninyong sabihin, ginoong babae- ang itinugon naman ni Fr. Sibyla, na 
hindi man lamang siya tinitingnan.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Hindi ko maalaman; sinabi ni 
Padre Damasong 
Savalls: wala akong ginawa kung di inulit ko lamang ang kanyang sinalita.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Magaling! Savalls o Chevas, eh ano 
ngayon? Hindi dahil sa isang letra ay siya'y magiging intsik!- ang muling 
sinaysay na nayayamot ang frankiskano.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- At ng ikalabing-apat na siglo at hindi 
ng ikapito- ang idinugtong ng dominiko, na ang anyo'y parang sinasala ang 
kamalian at ng pasakitan ang kapalaluan niyong isang prayle.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Mabuti, datapuwa't 
hindi sa paglalabis kumulang ng isang siglo'y siya'y magiging dominiko na!</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- Aba, Huwag po sanang magalit ang kagalangan po ninyo!- ani 
Padre Sibylang ngumingiti.- Lalong magaling kung siya 
ang nakatuklas ng paggawa ng polvora, sapagkat sa gayo'y naibsan na niya sa 
pagkakapagod sa gayong bagay ang kanyang mga kapatid.</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">- At sinasabi po ninyo, Padre Sibyla, na 
nangyari ang bagay na iyon ng ikalabing apat na siglo?- ang tanong na malaki ang 
nais na makatalos ni Do&ntilde;a Victorina - ng hindi pa o ng makapagkatawang tao na 
si Cristo?</font></p>
<p style="margin-left: 80px; margin-right: 80px" align="justify">
<font face="Arial" color="#333333" style="font-size: 13pt">Pinalad ang tinatanong na pumasok sa salas 
ang dalawang ginoo.</font></p>
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