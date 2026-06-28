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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XLVI. Sabungan</font></b></p>
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
											Upang ipangilin sa Pilipinas ang 
											hapon ng araw ng linggo'y napasasa 
											sabungan ang karaniwan, na gaya 
											naman sa Espa&ntilde;ang ang larong 
											pakikiaway ng tao sa toro ang siyang 
											pinaroroonan. Ang pagsasabong ng 
											manok, hilig na masamang dito'y 
											dinala ng mga taga ibang lupain at 
											mahigit ng isang daang taong 
											ginagawang panghuli ng salapi, ay 
											isa riyan sa mga pangit na 
											pinagkaratiban ng bayan, na lalong 
											malaki ang kasam-an kay sa opio sa 
											mga insik.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Diya'y napaparian ang 
											dukha't inilalagay sa panganib ang 
											kanyang&nbsp; buong&nbsp; pagkabuhay, sa 
											pagmimithing siya'y magkasalaping 
											hindi nagpapagal; napaparian diyan 
											ang mayaman't ng maglilibang, at 
											diya'y kaniyang ginagamit ang 
											salaping labi sa kanyang mga piging 
											at mga 'misa de grakia'; datapwa't 
											sa kanila (sa mga mayayaman) ang 
											kapalarang diya'y pinaglalaruan, 
											palibhasa'y magaling na totoo ang 
											pagkakaturo sa sasabungin, marahil 
											lalong magaling kay sa pagkaturo sa 
											kanilang anak na lalaki, na siyang 
											hahalili sa ama sa sabungan, at wala 
											nga kaming itututol sa bagay na ito.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											sapagkat ipinahihintulot ng 
											gobyerno, at hanggang halos kanyang 
											ipinagaanyaya, sa pag-uutos na gawin 
											ang gayong panoorin sa 'hayag na mga 
											plaza', sa 'mga araw ng piyesta' (at 
											ng makita ng lahat at makahikayat 
											ang uliran), 'pagkatapos ng misa 
											mayor hanggang sa dumilim sa hapon' 
											(walong oras), dumalo tayo sa larong 
											ito upang hanapin ang ilang mga 
											kakilala.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Walang ikinatatangi ang sabungan sa 
											San Diego sa mga sabungan sa iba't 
											ibang bayan, liban na lamang sa 
											ilang mga bagay. Nababahagi sa 
											tatlong pitak: ang una, sa makatwid 
											baga'y ang pasukan, ay isang 
											malaking kabahayang tuwid, na may 
											dalawampung metro ang haba at labing 
											apat na metro ang luang; sa isa sa 
											kanyang mga tagilira'y may isang 
											pintuang isang babae ang karaniwang 
											nagbabantay, na siyang katiwala sa 
											paniningil ng sa pinto, o kabayaran 
											sa pagpasok doon. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa buwis na itong bawa't isa'y 
											nagbibigay roon, tumatanggap ang 
											gobyerno ng isang bahagi, mga ilang 
											daang libong piso sa isang taon: 
											sinasabing sa salaping itong 
											ibinabayad ng 'vikio' upang siya'y 
											magkaroon ng kalayaan, nanggagaling 
											ang ipinagpapatayo ng mga maiinam na 
											mga paaralan, ipinagpapagawa ng mga 
											tulay at mga daan, ipinagtatatag ng 
											mga ganting pala upang lumusog ang 
											pagsasaka at pangangalakal ... 
											purihin nawa ang vikio na 
											naghahandog ng gayong lubhang 
											magagaling na mga bunga!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											--Sa 
											unang pitak na ito nalalagay ang mga 
											nangagbibili ng hitso, mga tabako, 
											mga kakanin, mga pagkain at iba pa; 
											naririan diyan ang karamihang batang 
											lalaking sumasama sa kanilang mga 
											ama o amaing sa kanila'y nagsasakit 
											ng pagtuturo ng mga lihim ng 
											pamumuhay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Capanig ang pitak na ito ng isa pang 
											lalong malaki ng kaunti, isang 
											pinaka salas, na pinagtitipunan ng 
											madla bago gawin ang mga 'soltada'. 
											Nariyan ang pinakamarami sa mga 
											manok, na nangatatali ng isang lubid 
											sa lupa, sa pamamag-itan ng isang 
											pakong but-o o luyong; nariyan ang 
											mga tahur, ang mga malulugdin sa 
											sabong, ang mananari: diyan 
											nangagkakayari, nagninilaynilay, 
											nangungutang, sumusumpa, 
											nagtutungayaw, humahalakhak; 
											hinihimas niyon ang kanyang manok, 
											na pinaraanan ng kamay ang ibabaw ng 
											makikintab na mga balahibo; 
											sinisiyasat nama't binibilang nito 
											ang mga kaliskis sa mga paa.</font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pinagsasalitaanan ang mga maiinam na 
											gawa ng mga bayani; diya'y inyong 
											mapapanood ang maraming mga mukhang 
											malulungkot, na bitbit sa mga paa 
											ang bangkay na wala ng balahibo; ang 
											pinakamahalmahal na hayop sa loob ng 
											ilang buwan, pinalayawlayaw at sa 
											kanya'y ipinagkatiwala ang lalong 
											kaayaayang mga pag-asa, ngayo'y wala 
											kung di isang bangkay na lamang, na 
											ipagbibili sa isang peseta, upang 
											lutuing luya ang kahalo at kanin sa 
											gabi ring iyon: 'sik transit gloria 
											mundi'. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Pauwi na ang natalo sa 
											kanyang bahay, na pinaghihintayan sa 
											kanya ng esposang kakabakaba ang 
											loob at ng mga limalimahid na mga 
											anak, na hindi na taglay ang 
											kaunting pamimilak at ang sasabungin. 
											Yaong lahat na mga panaginip na 
											kalugodlugod, yaong mga pagaalagang 
											tumagal ng mahabang panahon, mula sa 
											pagbubukang liwayway hanggang sa 
											paglubog ng araw, yaong lahat ng mga 
											pagpapahirap at pagpapagal, ang 
											kinauwia'y isang peseta, ang mga 
											nalabing abo sa gayong kakapal na 
											aso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											--Sa ulutang ito nakikipagtutulan 
											ang lalong pangod na isip: ang 
											lalong gagasogaso'y pinagsisiyasat 
											na magaling ang gayong bagay, 
											tinitimbang, pinagmamasid, 
											ibinubukadkad ang mga pakpak, 
											hinihipo ang mga kasukasuan ng mga 
											hayop na iyon. Maiinam na totoo ang 
											pananamit ng mga ilang sinusundan at 
											liniligid ng mga kaanib ng 
											kanikanilang mga sasabungin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Marurumi naman ang mga iba, 
											natatatak sa kanilang mamayat na mga 
											mukha ang larawan ng vikio, at 
											kanilang sinusundan ng&nbsp; buong&nbsp; 
											pagmimithi ang mga kilos ng mga 
											mayayaman at kanilang pinagmamasdang 
											magaling ang mga pustahan, sapagkat mangyayaring mahuho ang mga 
											bulsa, datapuwa't hindi nangyayaring 
											masiyahan ang masamang hilig; diya'y 
											walang mukhang hindi gising; diya'y 
											wala ang mapagpabayang filipino, ang 
											tamad, ang hindi makibuin: ang lahat 
											ay pawang kilusan, masimbuyong budhi, 
											pagsusumikap; masasabing sila'y may 
											isang kauhawang siyang nagbibigay 
											kasayahan sa tubig sa pusali.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Buhat sa ulutang ito'y tumutungo sa 
											labanang ang pamagata'y 'Rueda'. Ang 
											tuntungan nito, na nababakuran ng 
											kawayan, ang karaniwa'y mataas kay 
											sa dalawang panig na sinabi na ng 
											una. Sa dakong itaas, na halos 
											sumusuko na sa bubungan, may mga 
											graderia, lunsodlunsod bagang upuan, 
											na iniuukol sa mga manonood o mga 
											magsasabong, dalawang salitang 
											nagkakaisa ng kinauuwian. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa&nbsp; buong&nbsp; 
											itinatagal ng labanan ay napupuno 
											ang mga graderiang ito ng mga taong 
											may gulang na at ng mga batang 
											nangagsisigawan, nangaghihiyawan, 
											nangagpapawis, nangag-aaway at 
											nangagtutungayaw: ang kagalinga'y 
											bihirang bihira ang babaeng 
											nakararating diyan. Nangasasa 'Rueda' 
											ang mga taong litaw, ang mga 
											mayayaman, ang mga bantog na 'tahur', 
											ang kontratista (a entista) at ang 
											sentenciador (tagahatol). Sa lupa, 
											na mainam ang pagkakapikpik ay 
											nangaglalaban ang mga hayop, at 
											buhat diya'y ipinamamahagi ng 
											Kapalaran sa mga familia ang mga 
											tawanan o mga pagtangis, ang 
											magagaling na pagkain o ang 
											kagutuman.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa horas ng ating pagpasok ay 
											naroroon na ang gobernadorcillo, si 
											kapitang Pablo, si kapitang Basilio, 
											si Lucas, ang tao bagang may pilat 
											sa mukha, na totoong nagdamdam ng 
											pagkamatay ng kanyang kapatid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit si kapitang Basilio sa isa 
											sa mga taong bayan at tumanong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalman 
											mo ba kung anong manok ang dala rito 
											ni Kapitan Tiago?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi ko po na lalaman; may 
											dumating po sa kanyang dalawa 
											kaninang umaga, ang isa sa kanila'y 
											ang lasak na tumalo sa talisayin ng 
											Consul.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa akala mo kaya'y mailalaban sa 
											kanya ang aking si bulik?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba, 
											naku, mailalaban po! Ipupusta ko po 
											sa inyong manok ang aking bahay at 
											ang aking baro!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Dumarating sa sandaling iyon si 
											Kapitan Tiago. Ang pananamit ay 
											tulad sa mga malalakas na 
											magsasabong: barong lieszong Caatong, 
											salawal na lana at sombrerong 
											jipijapa. Sumusunod sa kanya ang 
											dalawang alila; dala ng isa ang 
											lasak at ang isa nama'y isang puting 
											sasabunging totoong pagkalakilaki.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ang sabi sa akin ni Sinang ay 
											pagaling na ng pagaling si 
											Maria!--ani kapitang Basilio.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Wala ng lagnat, datapuwa't mahina 
											pa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Natalo po ba kayo kagabi?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kaunti; nalalaman kong nanalo kayo 
											... titingnan ko kung makababawi 
											ako.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ibig po ba ninyong isabong ang 
											lasak?--ang tanong ni kapitang 
											Basilio, na tinitingnan ang manok, 
											at saka hiningi ito sa alila.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Alinsunod, sakali't may pustahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gaano 
											po ba ang ipupusta ninyo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung magkukulang din lamang sa 
											dalawa'y hindi ko na isasabong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Inyo bang nakita na ang aking bulik?--ang 
											tanong ni kapitang Basilio at saka 
											tinawag ang isang taong may dalang 
											isang maliit na sasabungin.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gaano 
											po ba ang ipupusta ninyo?--ang tanong.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gaano ang inyong ipusta.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Dalawa 
											at limang daan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tatlo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tatlo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sa susunod!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Ilinaganap ng nangagkakabilog na 
											mapakialam sa buhay ng may buhay, 
											ang balitang papaglalabanin ang 
											dalawang bantog na manok; kapwa sila 
											may mga pinagdaanan at kapwa 
											kabalitaan sa galing. Ibig ng lahat 
											na makita, masiyasat ang dalawang 
											kabalitaan; may mga nagpapasiya, may 
											nanghuhula.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y lumalaki ang kaingayan, 
											nararagdagan ang kaguluhan, 
											linulusob ang Rueda, linulundag ang 
											mga graderia. Dala ng mga 'soltador' 
											sa Rueda ang dalawang manok, isang 
											puti at isang pula, na kapwa may 
											sandata na, bagaman ang mga tari ay 
											may kaluban pa. Nariringig ang mga 
											sigaw na 'sa puti!' 'sa puti!', may 
											mangisangisa namang sumisigaw ng 'sa 
											pula!'&nbsp;Ang puti ang siyang 'llamado' 
											at ang pula ang 'dejado'.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa gitna ng karamiha'y 
											nangagpapalibotlibot doon ang 
											guwardiya sibil; hindi nila suot ang 
											pananamit na ukol sa mahal na 
											kapisanang ito; datapuwa't hindi 
											naman sila nakapaisano. Salawal na 
											gingong may franjang pula, barong 
											nababahiran ng asul na galing sa 
											naaalis na tina ng blusa, gorrang 
											pangkuartel narito ang kanilang 
											panglinlang na soot na nababagay 
											naman sa kanilang inuugali: 
											namumusta at nagbabantay, nanggugulo 
											at nangagsasalitang di umano'y 
											panangagasiwaan nila ang pananatili 
											ng kapayapaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantalang nangagsisigawan, 
											isinasahod ang kamay, kinakalog sa 
											kamay ang kaunting salaping 
											pinakakalasing; samantalang 
											hinihikap sa bulsa ang 
											katapustapusang salapi, o sakali't 
											walang salapi ay nangangako, at 
											ipinangangakong ipagbibili ang 
											kalabaw, ang malapit ng anihin sa 
											bukid, at iba pa; dalawang 
											bagongtao, na wari'y magkapatid, 
											sinusundan ng mga paninging 
											nananaghili ang mga naglalaro, 
											nangagsisilapit, bumubulong ng ilang 
											kiming pananalitang sino may walang 
											nakikinig, nalalao'y lalong 
											nangalulungkot at nangagtitinginang 
											masasama ang loob at 
											nangagngingitngit. Paimis na sila'y 
											pinagmamasid ni Lucas ngumingiti ng 
											ngiting malupit, pinatutunog ang mga 
											pisong pilak, dumaan siya sa siping 
											ng dalawang magkapatid, at saka siya 
											sumigaw nasa 'Rueda' ang tingin:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Narito ang limampo, limampu laban 
											sa dalawampu, sa puti!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagtitigan ang magkapatid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinasabi ko na sa iyo,--ang 
											ibinubulong ng matandang 
											kapatid,--na huwag mong ipaglahatan 
											ang kuarta; kung nakinig ka sana sa 
											akin, ngayo'y may ipupusta tayo sa 
											pula!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit ng&nbsp; buong&nbsp; kakimian ang 
											bunso kay Lucas at kinalabit siya sa 
											bisig,</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! ikaw pala?--ang biglang sinabi 
											nito, na lumingon at nagpapakunwari 
											ng pagtataka; pumapayag ba ang 
											kapatid mo sa sinabi ko sa kanya o 
											naparito ka't pumupusta?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Paanong 
											ibig ninyong kami'y makapusta'y 
											natalo na ang lahat naming salapi?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kung gayo'y pumayag na kayo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aayaw 
											siya! kung pautangin sana ninyo kami 
											ng kaunti, yamang sinasabi ninyong 
											kami inyong nakikilala....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Kinamot ni Lucas ang ulo, hinila ang 
											baro at muling nagsalita:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay ngang kayo'y aking 
											nakikilala; kayo'y si Tarsilo at si 
											Bruno, mga kabataan at malalakas. 
											Talastas kong ang matapang ninyong 
											ama'y namatay dahil sa ibinibigay sa 
											kanyang isang daang palo sa araw 
											araw ng mga sundalo; alam kong hindi 
											ninyo iniisip na ipanghiganti siya 
											...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag po sanang makialam kayo sa 
											aming pamumuhay;--ang isinalabat sa 
											kanya ng matandang kapatid na si 
											Tarsilo, iya'y nakahihila ng 
											kasakunaan. Kung wala kaming kapatid 
											na babae'y malaon ng panahong kami'y 
											binitay na sana!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Binitay na kayo? ang mga duwag 
											lamang ang nabibitay, ang walang 
											salapi at walang tumatangkilik. At 
											sa paano ma'y malapit ang bundok.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sandaang piso laban sa dalawampu, 
											sa puti ako!--ang sigaw ng isang 
											nagdaan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pautangin ninyo kami ng apat na 
											piso ..., tatlo ... dalawa,--ang 
											ipinamanhik ng lalong 
											bata;--pagdaka'y babayaran namin kayo 
											ng ibayo; pasisimulan na ang 
											soltada.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Muling kinamot ng Lucas ang ulo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tst! Hindi akin ang salaping ito, 
											ibinigay sa akin ni Don Crisostomo 
											at inilalaan sa mga ibig maglingkod 
											sa kanya. nguni't aking nakikitang 
											kayo'y hindi gaya ng inyong ama; 
											iyon ang tunay na matapang; ang 
											hindi matapang ay huwag maghanap ng 
											mga laro.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At saka umalis doon, bagaman hindi 
											totoong nagpakalayo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pumayag na tayo, may pinagkakaibhan 
											pa ba?--ani Bruno. Iisa ang 
											kinauuwian ng mabitay o mamatay na 
											marahil: walang ibang kinauukulan 
											nating mga dukha.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tunay na nga, nguni't gunitain mo 
											ang ating kapatid na babae.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Samantala'y nagliwanag ang 'rueda', 
											magpapasimula ang labanan. 
											Tumatahimik na ang mga tinig, at 
											nangatira sa gitna ang dalawang 'soltador' 
											(taga-bitaw) at ang mananari. Sa 
											isang hudyat ng 'sentenciador' (tagahatol) 
											ay inalsan ng mananari ang mga tari 
											ng kanikanyang kaluban, at 
											kumikintab ang mga maninipis na mga 
											talim, na pawang nangagbabala, 
											maniningning.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit sa bakod ang dalawang 
											magkapatid na kapwa malungkot, 
											itinuon ang kanilang noo sa kawayan 
											at nangagmamasid. Lumapit ang isang 
											lalaki sa kanila at sila'y 
											binulungan sa tainga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pare! isang daang piso laban sa 
											sampu, sa puti ako!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tiningnan siya ni Tarsilo ng 
											patanga. Siniko siya ni Bruno, at 
											sinagot niya ito ng isang ungol.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tangan ng mga soltador ang mga manok 
											ng isang anyong kalugod-lugod, at 
											iniingatan nilang huwag silang 
											masugatan. Dakilang katahimikan ang 
											naghahari: masasapantahang liban na 
											lamang sa dalawang soltador ang mga 
											naroroo'y pawang mga kagulatgulat na 
											mga taotaohang pagkit. Pinaglapit 
											nila ang dalawang manok; tinangnan 
											ng isa ang ulo ng kanyang manok at 
											ng tukain ng kalaban upang magalit, 
											at bago ginawa naman ng isa sa 
											kanyang manok ang gayon din. </font>
											</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Dapat 
											magkaroon ng pagkakatulad sa lahat 
											ng pag-aaway, na ano pa't kung ano 
											ang nangyayari sa mga sasabungin sa 
											Padres ay kawangis din sa mga 
											sasabungin dito. Pinapagharap, 
											pagkatapos at pinapagkahig sila, at 
											sa gayong paraa'y nauunawa ng mga 
											kaawaawang mga hayop kung sino ang 
											bumunot sa kanila ng isang maliit na 
											balahibo at kung sino ang kanilang 
											makakalaban. Nagsisipanindig na ang 
											kanilang mga pulok, nangagtititigan 
											at mga kidlat ng galit ang siyang 
											nangagsisitakas sa kanilang 
											mabibilog at maliit na mga mata. 
											Pagkakagayo'y dumating na 
											kapanahunan; binitiwan sila sa lupa, 
											na nangagkakalayo ng kaunti, at saka 
											sila linayuan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Marahang nangaglalapit sila. 
											Nangaririnig ang yabag ng kanilang 
											yapak sa matigas na lupa; sino ma'y 
											hindi nagsasalita, sino ma'y hindi 
											humihinga. Ibinababa at itinataas 
											ang ulo, na wari'y nangagsusukatan 
											sa tinginan, bumubulong ang dalawang 
											sasabungin ng marahil pagbabala o 
											pagpapawalang halaga. </font></font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Natanawan nila 
											ang maningning na dahon ng tari, na 
											nagsasabog ng malamig ang 
											nangangasul na sinag; nagbibigay 
											sigla sa kanila ang panganib, at 
											walang ano mang takot na 
											nagpapanalubong ang dalawa, nguni't 
											sa isang hakbang na layo'y 
											nangagsihinto, nangagtitigan, 
											ibinaba ang ulo at muling 
											pinapangalinag ang kanilang balahibo. 
											Sa sandaling iyo'y naligo ng dugo 
											ang kanilang maliit na utak, 
											sumilang ang lintik, at taglay ang 
											kanilang katutubong tapang ay 
											mabilis na nagpanalpok ang dalawa, 
											nagkapanagupa ang tuka laban sa tuka, 
											ang dibdib laban sa dibdib, ang 
											patalim laban sa patalim at ang 
											pakpak laban sa pakpak: naiwasan ng 
											isa't isa ng&nbsp; buong&nbsp; katalinuan ang 
											saksak at walang nanglaglag kung 
											hindi ilang balahibo lamang. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Muling 
											nagtitigan na naman; kaginsaginsa'y 
											biglang lumipad ang puti, 
											napaimbulog at iniwawasiwas ang 
											pamatay na tari; nguni't ibinaluktot 
											ng pula ang kanyang mga hita at 
											ibinaba ang ulo, kaya walang 
											nahampas ang puti kung di ang hangin; 
											nguni't pagbaba sa lapag, sa 
											pangingilag na siya'y masaksak sa 
											likod, maliksing pumihit at humarap 
											sa kalaban. Dinaluhong siya ng 
											saksak ng pula ng&nbsp; buong&nbsp; galit, 
											nguni't marunong magsanggalang ng&nbsp; 
											buong&nbsp; kalamigan ng loob: hindi nga 
											walang kabuluhang siya lubos na 
											kinalulugdan ng karamihang naroroon. 
											Hindi kinalilingatan ng lahat ang 
											matamang panonood ng mga nangyayari 
											sa paglalaban, at may mga ilang 
											kahi't hindi sinasadya'y 
											nangapapasigaw. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Unti-unting 
											nasasabugan ang lupa ng mga 
											balahibong pula at puti, na pawang 
											natitina ng dugo: datapuwa't hindi 
											ang salitaa'y ititigil ang labanan 
											sa unang pagkakasugat: sa pagsunod 
											ng filipino sa mga kautusang lagda 
											ng gobyerno, ang ibig niya'y matalo 
											kung sino ang unang mamatay o kung 
											sino ang unang tumakbo. Nadidilig na 
											ng dugo ang lupa, madalas ang 
											saksakan, nguni't hindi pa masabi 
											kung sino sa dalawa ang 
											magtatagumpay. </font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333">
											Sa kawakasan, sa 
											pagtikim sa kahulihulihang 
											pagpupumilit, sumalpok ang puti 
											upang ibigay ang panghuling saksak, 
											ipinako ang kanyang tari sa isang 
											pakpak ng pula at napasabit na mga 
											buto; datapuwa't nasugatan ang puti 
											sa dibdib, at ang dalawa, na kapwa 
											linalabasan ng dugo, nanglulupaypay, 
											humihingal, nangagkakakabit, ay 
											hindi nangagsisikilos, hanggang sa 
											natimbuang puti, sumuka ng dugo sa 
											tuka, nangisay at naghingalo; ang 
											pulang nakakabit sa kanya sa pakpak 
											at nananatili sa kanyang tabi, ay 
											untiunting ibinaluktot ang mga hita 
											at marahang pumikit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											ng magkagayo'y inihatol ng 
											sentenciador, sa pag-alinsunod sa 
											kautusan ng pamahalaan, na ang 
											pula'y nanalo. Isang walang wastong 
											sigawan ang siyang nagpasalamat sa 
											gayong hatol, sigawang naringig sa&nbsp; 
											buong&nbsp; bayan, mahaba, nagkakaisa ang 
											taas ng tinig at tumagal ng ilang 
											sandali. Kung gayo'y na pagtatanto 
											ng nakakapakinig sa malayo, na ang 'dejado' 
											ay siyang nanalo, sapagkat kung 
											hindi gayo'y hindi tatagal ang sigaw 
											ng pagkatwa. Gayon din ang 
											nangyayari sa mga nacion: isang 
											maliit na makapagtagumpay sa isang 
											malaki, inaawit at sinasabisabi sa 
											lubhang mahabang panahon.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nakita 
											mo na?--ani Bruno ng&nbsp; buong&nbsp; sama ng 
											loob sa kapatid,--kung pinaniniwalaan 
											mo ako'y mayroon na sana ngayon 
											tayong sandaang piso; dahil sa iyo'y 
											wala tayo ngayon kahi't isang kuarta.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot si Tarsilo, datapuwa't 
											tumingin ng pasulyap sa kanyang 
											paligidligid na anaki'y may 
											hinahanap na sino man.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Naroo't nakikipag-usap kay 
											Pedro,--ang idinugtong ni 
											Bruno;--binibigyan siya ng salapi, 
											pagkaramiraming salapi!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At ibinibilang nga naman ni Lucas sa 
											kamay ng asawa ni Sisa ang mga 
											salaping pilak. Nangagpalitan pa ng 
											ilang salitang palihim at bago 
											naghiwalay na kapwa nasasayahan 
											alinsunod sa namamasid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Marahil si Pedro'y nakipagkayari sa 
											kanya: iyan, iyan ang tunay na hindi 
											nag-aalinlangan!--ang buntong hininga 
											ni Bruno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nananatili si Tarsilo sa pagka 
											mukhang malungkot at nag-iisip-isip: 
											pinapahid ng mangas ng kanyang baro 
											ang pawis na umaagos sa kanyang noo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kapatid 
											ko,--ani Bruno,--ako'y yayao, kung 
											hindi ka magpapasiya; nanatili ang 'regla', 
											dapat manalo ang lasak at hindi nga 
											dapat nating sayangin ang panahon. 
											Ibig kong pumusta sa susunod na 
											soltada; ano bagamangyayari? Sa 
											ganya'y maipanghihiganti natin ang 
											tatay.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Gayon ma'y huminto at muling 
											nagpahid ng pawis.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Anong dahil&nbsp;at huminto ka?--ang 
											tanong ni Brunong nayayamot.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman mo ba kung ano ang 
											sumusunod na soltada? Carapatdapat 
											ba ang?...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bakit hindi! hindi mo ba 
											nariringig? Ang bulik ni kapitang 
											Basilio ang mapapalaban sa lasak ni 
											Kapitan Tiago; ayon sa lakad ng 
											'regla' ng sabong ay dapat manalo 
											ang lasak.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ah, ang lasak! ako ma'y pupusta rin 
											... datapwa't lumagay muna tayo sa 
											matibay na kalagayan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nagpakita ng pagkayamot si Bruno, 
											nguni't sumunod siya sa kanyang 
											kapatid; tiningnan nitong magaling 
											ang manok, siniyasat na magaling, 
											nag-isip-isip, naglininglining, 
											nagtanong ng ilan, ang kulang palad 
											ay nag-aalinlangan; nagngingitngit 
											si Bruno at minamasdan siyang malaki 
											ang galit.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--nguni't hindi mo ba nakikita iyang 
											malapad na kaliskis na nariyan sa 
											tabi ng tahid? hindi mo ba nakikita 
											ang mga paang iyan? ano pa ang ibig 
											mo? Masdan mo ang mga hitang iyan, 
											iladlad mo ang mga pakpak na iyan! 
											At itong baak na kaliskis sa ibabaw 
											ng malapad na ito, at saka itong 
											doble (kambal)?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi siya nariringig ni Tarsilo, 
											ipinagpapatuloy ang pagsisiyasat sa 
											anyo at kalagayan ng hayop; ang 
											kalansing ng ginto't pilak ay 
											dumarating hanggang sa kanyang mga 
											tainga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Tingnan naman natin ngayon ang 
											bulik,--ang sabi ng tinig na tila 
											sinasakal.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Tinatadyakan ni Bruno ang lupa, 
											pinapagngangalitngit ang kanyang mga 
											ngipin, nguni't sumusunod din sa 
											kapatid niya.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit sila sa kabilang pulutong. 
											Diya'y sinasandatahan ang manok, 
											humihirang ng tari, inihahanda ng 
											mananari ang sutlang mapula, na 
											pinagkitan at makailang hinagod.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binalot ni Tarsilo ang hayop ng 
											malungkot at nakalalagim na titig: 
											tila mandin hindi niya nakikita ang 
											manok kung di ibang bagay sa 
											hinaharap na panahon. Hinagpos ang 
											noo, at:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Handa 
											na ba ikaw?--ang tanong sa kapatid na 
											malagunlong ang tinig.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ako? mula pa ng una; hindi 
											kinakailangang sila'y akin pang 
											makita!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi at dahil sa ... ating 
											kahabaghabag na kapatid na babae....</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Aba! Hindi ba sinabi sa iyong ang 
											mamiminuno'y si Don Crisostomo? 
											Hindi mo ba nakitang siya'y kasama 
											ng Kapitan Heneral sa pagpapasial? 
											Ano ang kapanganibang ating 
											kahihinatnan?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--At kung mamatay tayo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Eh ano iyon? Hindi ba namatay ang 
											ating ama sa kapapalo?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sumasakatuwiran ka!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hinanap ng magkapatid sa mga 
											pulutong ng tao si Lucas.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Pagkakita nila sa kanya'y huminto si 
											Tarsilo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Huwag! umalis na tayo rito, tayo'y 
											mapapahamak!--ang biglang sinabi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lumakad ka kung ibig mo, ako'y 
											tatanggap.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Bruno!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sa kawalang palad ay lumapit ang 
											isang tao at sa kanila'y nagsabi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Pupusta ba kayo? Ako'y sa bulik.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Hindi sumagot ang dalawang 
											magkapatid.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Logro!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gaano?--ang tanong ni Bruno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Binilang ang kanyang mga aapating 
											pisong ginto: tinititigan siya ni 
											Brunong hindi humihinga.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--May dalawang daang piso ako, 
											limampong piso laban sa apat na po!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hindi!--ani Brunong walang 
											alinlangan; magdagdag pa kayo ...</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magaling! limampo laban sa 
											tatlompo!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Lambalin ninyo kung inyong ibig!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Magaling! 
											ang bulik ay sa aking panginoon at 
											bago akong kapapanalo; isang daan 
											laban sa anim na pong piso.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Kasunduan! Maghintay kayo't kukuha 
											ako ng salapi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Datapuwa't ako ang 
											maghahawak,--anang isa, na hindi 
											totoong nagkakatiwala sa anyo ni 
											Bruno.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayon din sa akin!--ang tugon nito, 
											na umaasa sa katigasan ng kanyang 
											kamaoo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											At nilingon ang kanyang kapatid at 
											pinagsabihan:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Yayao ako, kung matitira ikaw.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nag-isip-isip si Tarsilo: kanyang 
											sinisinta ang kanyang kapatid at 
											gayon din ang sabong. Hindi 
											mapabayaang nag-iisa ang kanyang 
											kapatid, kaya't bumulong:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Hala!</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Lumapit sila kay Lucas: nakita nito 
											ang kanilang pagdating at ngumiti.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Mama!--ani Tarsilo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Ano 
											iyon?</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gaano 
											ba ang ibibigay ninyo?--ang tanong ng 
											dalawa.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Sinabi 
											ko na:&nbsp;kung kayo ang mamahala sa 
											paghanap ng mga iba pa upang matutop 
											ang kuratel, bibigyan ko ang bawa't 
											isa sa inyo ng tigatatlompong piso 
											at sampung piso sa bawa't kasama. 
											Sakali't lumabas ng magaling ang 
											lahat, tatanggap ng isangdaang piso 
											bawa't isa at kayo'y ang ibayo: 
											mayaman si Don Crisostomo.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Gayari!--ang biglang sabi ni Bruno; 
											ibigay ninya ang salapi.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Nalalaman ko na kayo'y matatapang 
											na gaya rin ng inyong ama! Hali kayo 
											rini, at ng hindi tayo maringig ng 
											mga iyang sa kanya'y pumatay--ani 
											Lucas na itinuturo ang mga guwardiya 
											sibil.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Sila'y dinala sa isang sulok, at sa 
											kanila'y sinabi samantalang 
											ibinibilang sa kanila ang salapi:</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											--Darating 
											bukas si don Cristostomo na may 
											dalang mga sandata; sa makalawa, 
											pagkagabi, pagmalapit ng ma-a las 
											ocho, pumaroon kayo sa libingan at 
											doo'y sasabihin ko sa inyo ang 
											kanyang mga huling ipag-uutos. May 
											panahon kayong makahanap ng mga 
											kasamahan.</font></p>
											<p align="justify" style="margin-left: 80px; margin-right: 80px">
											<font face="Arial" color="#333333" style="font-size: 13pt">
											<font face="Arial" color="#333333">
											Nangagpaalaman. Ang dalawang 
											magkapatid ay tila mandin nagpalit 
											ng kanikanilang anyo: Si Tarsilo'y 
											matahimik, namumutla si Bruno.</font></p>
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