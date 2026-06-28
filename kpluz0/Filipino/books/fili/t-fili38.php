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
<title>El Filibusterismo - Filipino sa KPluz.com</title>
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
								<td valign="bottom" background="file:///H:/tutorial-content.jpg">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" color="#990000" style="font-size: 24pt">
										El Filibusterismo</font></span><p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
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
																													<p style="MARGIN-BOTTOM: 0px; MARGIN-TOP: 0px; margin-left:0px"><b><font face="Arial" style="font-size: 15pt" color="#800080">XXXVIII. Kasawian</font></b></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 14pt">&nbsp;
											</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si <i>
	Matanglawin</i> ay siyang kilabot sa Luson. Ang kanyang pangkat ay sisipot 
	kung minsan sa isang lalawigang hindi inaakalang kanyang lulusubin at kung 
	minsan ay biglang susulpot sa isang lalawigang humahandang maglaban sa 
	kanya. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Susunugin ang isang kabyawan sa Batangan, sisirain ang mga pananim; 
	kinabukasan ay papatayin ang hukom pamayapa sa Tiani, sa isa pa'y lolooban 
	ang isang bayan sa Kabite at kukunin ang lahat ng armas sa tribunal. Ang mga 
	lalawigang panggitna, mula sa Tayabas hanggang Pangasinan, ay inaabot ng 
	kanyang mga kabangisan at ang kanyang madugong pangalan ay umaabot hanggang 
	Albay, sa timog, at sa hilaga'y hanggang Kagayan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Sapagka't inalisan ng 
	sandata ang mga bayanbayan dahil sa pagkukulang ng tiwala ng isang mahinang 
	pamahalaan ay nahuhulog sa kanyang mga kamay na waring walang kabuluhang 
	bihag; paglapit niya, ay iniiwan ng mga manananim ang kanilang mga bukid, 
	ang mga hayop ay napupuksa at isang bakas na dugo at apoy ang nagiging tanda 
	ng kanyang pagdaraan. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Hinahalay ni Matanglawin ang lahat ng mga mahihigpit 
	na kautusang laban sa mga tulisan: walang napapahirapan sa mga kautusang 
	yaon kundi ang mga naninirahan sa mga nayon, na kanyang binibihag o 
	sinasalanta kung naglalaban, o kung nakikipagkasundo sa kanya ay 
	ipinalalamog o ipinatatapon ng pamahalaan, kung sakaling dumarating sa 
	pagtatapunan at hindi abutin ng malubhang sakuna sa paglalakbay. Dahil sa 
	gayong kalagayan ay marami sa mga taga bukid ang sumasailalim sa kanyang 
	kapangyarihan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sanhi sa 
	kakilakilabot na kaparaanang ito, ang naghihingalo nang pangangalakal ng mga 
	bayan ay nagpatuloy na namatay ng lubusan. Ang mayaman ay hindi makapangahas 
	na makapaglakbay, at ang mahihirap ay natatakot na mahuli ng guardia sibil, 
	na, dahil sa nauutusang umusig sa mga tulisan ay madalas na hinuhuli ang 
	unang masumpungan at pinahihirapan ng katakot-takot. Sa kanyang di 
	karapatan, ang pamahalaan ay nagpapakita ng kalakasan sa mga taong kanyang 
	pinaghihinalaan, upang, sa kapapahirap, ay huwag mahalata ng mga bayan ang 
	kanyang kahinaan, ang takot na nagtatakda ng mga gayong kautusan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang hanay ng 
	mga kaawaawang ito na pinaghihinalaan, mga anim o pito, na nangakabaliti ng 
	abot siko at nangatataling wariy piling nang tao, ay nangaglalakad isang 
	tanghaling tapat sa isang daang namamaybay sa isang bundok, na dala ng sampu 
	o labing dalawang guardia na nangakabaril. Lubhang matindi ang init. Ang mga 
	bayoneta ay nagkikintaban sa araw, ang kanyon ng mga baril ay nag-iinit, at 
	ang mga dahon ng sambong na nalalagay sa mga kapasete ay halos hindi 
	makapagpahina sa tindi ng nakasusunog na araw sa buwan ng Mayo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Dahil sa hindi 
	maikilos ang mga bisig at nangagkakadikitan, upang huwag gumamit ng maraming 
	lubid, ay lumalakad ang mga huli na halos lahat ay walang takip sa ulo at 
	mga walang sapin ang paa: mabuti na ang may isang panyong nakatali sa ulo. 
	Hingal na hingal, hirap, punong puno ng alikabok na nagiging putik dahil sa 
	pawis, ay nararamdamang natutunaw ang kanilang utak, may lumilipanang ilaw 
	sa kaitaasan, mga badhang pula sa himpapawid. </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang kapataan at ang panghihina 
	ay nalalarawan sa kanilang pagmumukha, ang paghihinagpis, ang pagkagalit, 
	isang bagay na hindi mawari, tinging mamamatay na sumusumpa, taong naiinip 
	sa buhay, sa sarili, na nagtutungayaw sa&nbsp; Diyos .... </font></p>
											<p style="margin-left: 80px; margin-right: 80px" align="justify">
											<font style="font-size: 13pt" face="Arial" color="#333333">Ang mga lalong 
	nakapagtatagal ay itinutungo ang ulo, ikinukuskos ang mukha sa maruming 
	likuran ng sinusundan upang mapahid ang pawis na tumatakip sa kanilang mga 
	mata; ang maramiy pipilay-pilay. Kapag may nakaabala sa lakad dahil sa 
	pagkadapa ay madidinig ang isang tungayaw at lalapit ang isang sundalo na 
	iniwawasiwas ang isang sanga, na kinuha sa isang puno, at pinipilit na 
	pinatitindig sa palo dito't palo doon. Sa gayo'y tumatakbo ang hanay, na, 
	kaladkad ang nadapa na nagugumon sa alabok at umuungal na hinihinging siya'y 
	patayin: sa isang pagkakataon ay napapatindig, napapatayo, at saka 
	ipinatutuloy ang kanyang paglakad na umiiyak na wariy bata at isinusumpa 
	ang oras na siya'y naging tao.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang piling na 
	tao ay maminsan minsang humihinto samantalang nangagsisiinom ang mga may 
	dala sa kanila, at pagkatapos ay ipatutuloy ang lakad na ang bibig ay tuyo, 
	ang pag-iisip ay madilim at ang puso'y puno ng paglait. Ang uhaw ay siyang 
	pinakamunting bagay na inaalintana ng mga kaawaawang taong iyon.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lakad, mga 
	anak ng p....!--ang sigaw ng sundalo, na nakapagpanibagong lakas, na 
	ibinigkas ang karaniwang lait ng mga pilipinong pinakadukha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At 
	sumasagitsit ang sanga at tumatama sa likuran ng kahit sino, ng lalong 
	nalalapit, kung minsan ay tumatama sa isang mukha, nag-iiwan muna ng isang 
	bakas, pagkatapos ay mapula, at mayamaya'y marumi dahil sa alikabok ng 
	lansangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Lakad mga 
	duwag!--ang sigaw sa wikang kastila na pinalalaking mabuti ang boses.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mga duwag!--ang ulit ng alingawngaw ng bundok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At tinutulinan 
	ang lakad ng mga duwag, sa silong ng langit na wariy nagbabagang bakal, sa 
	isang daang nakapapaso na iniaaboy ng mabukong sanga na naluluray sa malatay 
	na balat. Ang lamig sa Siberia ay mabuti pa kay sa araw sa buwan ng Mayo sa 
	Pilipinas! Gayon man, sa mga sundalo ay may isang namumuhi sa gayong mga 
	kabangisang walang kapararakan: lumalakad ng walang imik at kunot ang kilay 
	na waring masama ang loob. Sa kahulihulihan, nang makita na ang guardia ay 
	hindi na nasisiyahan sa sanga kundi pinagsisipa pa ang mga huli na 
	napaparapa, ay hindi na nakapagpigil at bugnot na sumigaw nang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hoy, Mautang, 
	bayaan mo na silang lumakad na mapayapa!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Si Mautang ay 
	lumingong napamangha.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--At ano ang 
	mayroon sa iyo, Carolino?--ang tanong.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sa ganang 
	akin ay wala, ngunit naaawa ako!--ang sagot ni Carolino;--mga tao rin iyang 
	kagaya natin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napagkikilalang baguhan ka pa!--ang pakli ni Mautang na tumawang may 
	habag,--kung gayo'y ano ang inaasal ninyo sa mga mahuli sa labanan?</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabuting di 
	sapala kay sa ganyan!--ang sagot ni Carolino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Napahintong 
	sandali si Mautang, at pagkatapos, waring nakatagpo ng isasagot ay panatag 
	na <span class="locked">tumugon, na:</span></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--A, ang mga 
	huli doon ay mga kaaway at lumalaban, samantalang ang mga ito ay.... ito'y 
	mga kababayan natin!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At lumapit na 
	ibinulong kay Carolino:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Napakahangal 
	ka! Ginagawa sa kanila ang ganyan upang magtangkang lumaban o tumanan, at 
	sa gayon ay.... pung!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang Carolino 
	ay hindi sumagot.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang isa sa mga 
	huli ay namanhik na pahintulutan siyang tumigil sapagka't mayroon lamang 
	gagawing kailangan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Ang pook na 
	ito'y mapanganib!--ang sagot ng kabo, na di mapalagay na tinitingnan ang 
	bundok:--sulong!</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Sulong!--ang 
	ulit ni Mautang.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">At humaging 
	ang pamalo. Ang huli ay namilipit at tiningnan siya ng tinging may sumbat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Mabangis ka 
	pa kay sa tunay na kastila--ang sabi ng baliti.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tinugon siya 
	ni Mautang ng ilang palo. Halos sabay doo'y humaging ang isang punlo na 
	sinundan ng isang putok: nabitiwan ni Mautang ang baril, bumitiw ng isang 
	tungayaw at matapos madala sa dibdib ang dalawang kamay ay umikit at 
	bumagsak. Nakita siya ng huli na kumikisay sa alikabok at linalabasan ng 
	dugo sa bibig.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Tigil!--ang 
	sigaw ng kabo na biglang namutla.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	sundalo'y huminto at tumingin sa kanilang paligid. Isang munting buga ng aso 
	ang lumalabas sa isang kasukalan sa dakong itaas. Humaging ang isa pang 
	punlo, nadinig ang isa pang putok at ang kabo'y namaluktot na nagtutungayaw 
	at may sugat sa hita. Ang pulutong ay binabaka ng mga taong nangagkakanlong 
	sa mga batong nasa kaitaasan.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang kabo, 
	lipos kagalitan, ay tumuro sa dako ng kumpol ng mga baliti, at sumigaw nang:</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--<i xml:lang="es" lang="es">Fuego!</i></font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga huli 
	ay nangapaluhod, na puno ng sindak. Sa dahilang hindi maitaas ang mga kamay, 
	ay nangagmamakaawang humahalik sa lupa at iniuuna ang ulo: may tumutukoy sa 
	kanilang mga anak, may sa kanyang ina na wala nang mag-aampon; ang isa'y 
	nangangako ng salapi, binabanggit ng isa ang ngalan ng&nbsp; Diyos , ngunit ang 
	bunganga ng mga baril ay nakababa na at isang kakilakilabot na putok ang 
	nagpapipi sa kanila.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Sinimulan na 
	ang pakikipagputukan sa mga nasa sa itaas na unti-unting linaganapan ng aso. 
	Dahil sa asong ito at sa kadalangan ng putok ay marahil hindi hihigit sa 
	tatlo ang baril ng mga hindi nakikitang kalaban. Samantala naman ay 
	sumasagupa at nagpapaputok ang mga sundalo, nangagkakanlong sa mga puno ng 
	kahoy, humihiga at nagpupumilit na makapaitaas. Umiilandang ang mga 
	putol-putol na bato, nababakli ang sanga ng mga puno, natutuklap ang lupa. 
	Ang unang guardia na nagtangkang makapanhik ay gumulong na may tama ng punlo 
	sa balikat.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang lihim na 
	kalaban ay nakalalamang dahil sa kinalalagyan; ang mga matatapang na guardia 
	na hindi marunong tumakbo ay kaunti nang umurong, sapagka't nangahihinto at 
	ayaw mangagsisulong. Ang pakikipaglabang iyon sa hindi nakikita ay 
	nakasindak sa kanila. Wala silang nakikita kundi pawang aso lamang at 
	batuhan; walang boses ng tao, ni anino man lamang; mawiwikang nakipaglaban 
	sila sa bundok.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Hale, 
	Carolino! Nasaan ang katalasan mong tumudla, p....!--ang sigaw ng kabo.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Nang mga 
	sandaling iyon ay isang lalaki ang sumipot sa ibabaw ng isang bato at 
	ikinukumpay ang baril na hawak.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">
	--Paputukan 
	iyan!--ang sigaw ng kabo na bumitiw ng isang malaswang tungayaw.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Tatlong 
	guardia ang sumunod, ngunit ang lalakiy nakatayo rin; sumisigaw, ngunit 
	hindi malinawan ang kanyang sinasabi.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang Carolino 
	ay napahinto, na waring nakikilala ang anyong iyon na nababalot ng liwanag 
	ng araw. Ngunit binantaan siya ng kabo na tatarakan kung hindi 
	magpapaputok. Tumudla ang Carolino at nadinig ang isang putok. Ang taong 
	nasa bato ay umikit at nawalang kasabay ang sigaw na nakatulig sa Carolino.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Isang kilusan 
	ang nangyari sa kagubatan na waring nagpanakbuhan ang mga naroroon. Sa 
	gayo'y nangagsisalunga ang mga sundalo, na wala nang kalaban. Isa pang 
	lalaki na ikinukumpay ang isang sibat ang sumipot sa ibabaw ng mga bato; 
	pinaputukan ng mga sundalo, at ang lalakiy unti unting napayuko, pumigil sa 
	isang sanga, isa pang putok at lumagpak na pasubasob sa bato.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Matuling 
	nangagsipangunyapit ang mga sundalo, na inilagay sa dulo ng baril ang mga 
	bayoneta at laan sa isang labanang subuan; ang Carolino'y siyang tanging 
	dahandahan ang lakad, na ang tingin ay pasulingsuling, malamlam, na inaalala 
	ang sigaw ng taong nabuwal dahil sa tama ng punlo. Ang unang dumating sa 
	kaitaasan ay nakatagpo ng isang matandang naghihingalo, na nakatimbuwang sa 
	bato; sinaksak sa katawan ng bayoneta ngunit hindi man lamang kumisap ang 
	matanda: ang mata'y nakatitig sa Carolino, isang titig na hindi mawari, at 
	sa tulong ng mabutong kamay ay may itinuturo sa kanyang nasa likod ng mga 
	bato.</font></p>
	<p style="margin-left: 80px; margin-right: 80px" align="justify"><font style="font-size: 13pt" face="Arial" color="#333333">Ang mga 
	sundalo'y nangapalingon at nakitang si Carolino ay maputlang maputla, 
	nakanganga at sa paningin ay naglalarawan ng huling kislap ng pag-iisip. 
	Nakilala ng Carolino, na dili iba't si Tano, ang anak ni Kabesang Tales, na 
	galing sa Carolinas, na ang naghihingalo ay ang kanyang lelong, si 
	maTandang Selo, na, dahil sa hindi siya makausap ay naghahayag sa kanya, sa 
	tulong ng mga naghihingalong mata, ng isang kabuhayang lipus ng sakit. At 
	nang bangkay na ay patuloy din sa pagtuturo ng isang bagay na nasa likod ng 
	mga bato......</font><p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
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
																	<a href="../noli/t-noli-toc.php">
																	<font color="#800080">
																	<a href="t-fili-toc.php">Bumalik sa 
																	Nilalaman ng 
																	El 
																	Filibusterismo</a></font></a></font></p>
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