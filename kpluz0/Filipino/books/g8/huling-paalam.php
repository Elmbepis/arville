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
<title>Ibong Adarna - Filipino sa KPluz.com</title>
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
										<font face="Arial" size="6" color="#990000">
										Huling Paalam<br>
										</font>
										<font face="Arial" style="font-size: 18pt" color="#990000">
										ni Dr. Jose Rizal</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											Paalam na, sintang lupang tinubuan,<br>
											Bayang masagana sa init ng araw,<br>
											Edeng maligaya sa ami'y pumanaw<br>
											At perlas ng dagat sa dakong 
											Silangan.<br>
											<br>
											Inihahandog ko ng ganap na tuwa<br>
											Sa iyo yaring buhay na lanta na't 
											aba;<br>
											Naging dakila ma'y iaalay rin nga<br>
											Kung dahil sa iyong ikatitimawa.<br>
											<br>
											Ang nanga sa digmaan dumog sa 
											paglaban<br>
											Handog din sa iyo ang kanilang buhay,<br>
											Hirap ay di pansin at di gunamgunam<br>
											Ang pagkaparool o pagtagumpay.<br>
											<br>
											Bibitaya't madlang mabangis na sakit<br>
											O pakikibakang lubhang mapanganib,<br>
											Pawang titiisin kung ito ang nais
											<br>
											Ng baya't tahanang pinakaiibig.<br>
											<br>
											Ako'y mamamatay ngayong minamalas
											<br>
											Ang kulay ng langit na nanganganinag<br>
											Ibinababalang araw ay sisikat<br>
											Sa kabila niyang mapanglaw na ulap.<br>
											<br>
											Kung dugo ang iyong kinakailangan<br>
											Sa ikadidilag ng iyong pagsilang,<br>
											Dugo ko'y ibubo't sa isa man lamang<br>
											Nang gumigiti mong sinag ay kuminang.<br>
											<br>
											Ang mga nasa ko, mulang magkaisip,<br>
											Magpahanggang ngayon maganap ang 
											bait,<br>
											Ang ikaw'y makitnag hiyas na marikit<br>
											Ng dagat Silangan na nakaliligid.<br>
											<br>
											Noo mo'y maningning at sa mga mata
											<br>
											Mapait na luha bakas ma'y wala na,<br>
											Wala ka ng poot, wala ng balisa,<br>
											Walang kadungua't munti mang 
											pangamba,<br>
											<br>
											Sa sandaling buhay maalab kong nais<br>
											Ang kagalingan mo't ang paiwang 
											sulit<br>
											Ng kaluluwa king gayak ng aalis:<br>
											Ginhawa'y kamtan mo! Anong 
											pagkarikit!<br>
											<br>
											Nang maaba't ikaw'y mapataas lamang,<br>
											Mamatay at upang mabigyan kang 
											buihay,<br>
											Malibing sa lupang puspos ng 
											karika't<br>
											Sa silong ng iyong langit ay 
											mahimlay.<br>
											<br>
											Kung sa ibang araw ikaw'y may 
											mapansin<br>
											Nipot na bulaklak sa aba kong libing,<br>
											Sa gitna ng mga damong masisinsin,<br>
											Hagka't ang halik mo'y itaos sa 
											akin.<br>
											<br>
											Sa samyo ng iyong pagsuyong matamis,<br>
											Mataos na taghoy ng may sintang 
											sibsib,<br>
											Bayang tumaggap noo ko ng init,<br>
											Na natatabunan ng lupang malamig.<br>
											<br>
											Bayan mong ako'y malasin ng buwan<br>
											Sa liwang niyang hilano't malamlam;<br>
											Bayan ihatid sa aking liwayway<br>
											Ang banaang niyang dagling napaparam.<br>
											<br>
											Bayaang humalik ang simoy ng hangin;<br>
											Bayaang sa huning masaya'y awitin<br>
											Ng darapong ibon sa kurus ng libing<br>
											Ang buhay payapang ikinaaaliw.<br>
											<br>
											Bayaang ang araw na lubhang maningas<br>
											Pawiin ang ulan, gawing pawang ulap,<br>
											Maging panganuring sa langit umakyat,<br>
											At ang aking daing ay mapakilangkap.<br>
											<br>
											Bayaang ang aking maagang pagpanaw,<br>
											Itangis ng isang lubos na nagmamahal;<br>
											Kung may umalala sa akin ng dasal,<br>
											Ako'y iyo sanang idalangin naman.<br>
											<br>
											Idalangin mo rin ang di nagkapalad,<br>
											Na nangamatay na't yaong nanganhirap
											<br>
											sa daming pasakit, at ang lumalangap
											<br>
											naming mga ina luhang masaklap.<br>
											<br>
											Idalangin sampo ng bawa't ulila <br>
											at nangapipiit na tigib ng dusa; <br>
											idalangin mo ring ikaw'y matubos na
											<br>
											sa pagkaaping laong binata.<br>
											<br>
											Kung nababalot na ang mga libingan
											<br>
											Ng sapot na itim ng gabing mapanglaw,
											<br>
											at wala ng tanod kundi pawing patay,
											<br>
											huwang gambalain ang katahimikan.<br>
											<br>
											Pagpitagan mo ang hiwagang lihim,
											<br>
											at mapapakinggan ang tinig marahil,
											<br>
											ng isang saltero: Ito nga'y ako ring
											<br>
											inaawitanka ng aking paggiliw.<br>
											<br>
											Kung ang libingan kong limot na ang 
											madla <br>
											ay wala nang kurus at bato mang 
											tanda <br>
											sa nangangabubukid ay ipaubayang <br>
											bungkali't isabog ang natipong lupa.<br>
											<br>
											Ang mga abo ko'y bago pailanglang
											<br>
											mauwi sa wala na pinaggalingan, <br>
											ay makalt munag parang kapupunanng
											<br>
											iyong alabok sa lupang tuntungan.<br>
											<br>
											Sa gayo'y walaa ng anoman sa akin,
											<br>
											na limutin mo ma't aking lilibutin
											<br>
											ang himpapawid mo kaparanga't hangin
											<br>
											at ako sa iyo'y magiging taginting.<br>
											<br>
											Bango, tinig, higing, awit na masaya
											<br>
											liwanag aat kulay na lugod ng mata't
											<br>
											uulit-ulitin sa tuwi-tuwina.<br>
											<br>
											Ako'y yayao na sa bayang payapa, <br>
											na walang alipi't punoing mapang-aba,
											<br>
											doo'y di nanatay ang paniniwala <br>
											at ang naghahari Diyos na dakila.<br>
											<br>
											Paalam anak, magulang, kapatid, <br>
											bahagi ng puso't unang nakaniig, <br>
											ipagpasalamat ang aking pag-alis <br>
											sa buhay na itong lagi ng ligalig.<br>
											<br>
											Paalam na liyag, tanging kaulayaw,
											<br>
											taga ibang lupang aking katuwaan,
											<br>
											paaalam sa inyo, mga minamahal; <br>
											mamatay ay ganap na katahimikan.<br>
&nbsp;</font></p>
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