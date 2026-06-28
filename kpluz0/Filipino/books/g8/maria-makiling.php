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
								<td valign="bottom" >
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="../../../images/lessons-gen-content.jpg">
										<p align="center" style="margin-left: 80px; margin-right: 80px; margin-top: 50px; margin-bottom: 0">
										<span style="font-weight: 700">
										<font face="Arial" size="6" color="#990000">
										Alamat ni Maria Makiling</font></span><div align="center">
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial">
											<span style="font-size: 24pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 24pt">&nbsp;</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" style="font-size: 15pt" color="#333333">
											Si Maria ay kaisang-isang anak nina 
											Dayang Makiling at Gat Panahon, na 
											para-parang bathala o engkantado 
											kung sa ngayong pakahulugan. 
											Tanging-tanging mutya ang nabanggit 
											na lakambini sa kanilang tahanan 
											pagkat siya'y bugtong na aliw ng 
											kanyang ama't ina. Siya ang liwanag 
											ng kanilang paningin; siya ang galak 
											ng kanilang puso; anupa't sa biglang 
											pangungusap, siya ang kayamanang 
											impok ng kanilang buhay. Sa kanilang 
											katandaan, si Maria ang bango at 
											kulay ng mga araw nilang unti-unting 
											nawawalan ng sigla't lakas.<br>
											<br>
											Si Maria'y hindi taga-lupa, bagama't 
											siya'y nakiki-ulayaw sa madlang 
											kinapal. Gaya na nga ng aking nasabi, 
											nang panahong yao'y maaaring 
											makipag-usap ang mga tao sa bathala; 
											maaari silang magkatabi sa lilim ng 
											isang punungkahoy. Maaaring patulong 
											sa kanila ang isang nilikhang nasa 
											kagipitan, at ang mga ito naman, 
											kung sadyang taimtim sa loob ang 
											paghiling, ay hindi nagmamaramot. 
											Kung ang pastol ay humihihip ng 
											subing o plauta habang siya'y 
											nagpapalipas ng maligayang sandali 
											sa piling ng mga binabantayang hayop, 
											sa kaginsa-ginsa'y susulpot nalamang 
											sa kanyang harap ang isang nimpang 
											lipos ng alindog upang makinig at 
											makihati sa kaligayahan.<br>
											<br>
											Naging ugali na ni Maria, sa 
											araw-araw halos, ang lumuwas sa 
											bayan at mamili sa talipapa. Kaparis 
											ng ibang babae, siya'y nakasuot ng 
											sutlang kung minsa'y may burdang 
											bulaklak at malalapad ang guhit na 
											siyang kinaugalian nang panahong 
											yaon. Ang kanyang maitim at malagong 
											buhok na kung ilugay ay abot 
											hanggang sakong ay may pahiyas na 
											sariwang bulaklak-suha. Sa kanyang 
											dibdib ay nakayakap ang mabangong 
											kuwintas ng ilang-ilang. Magiliw 
											siyang mangusap at lipos ng galang. 
											Mahinhing kumilos na wari bang 
											nahihiya. Bakit ang hawas niyang 
											mukha'y salamin ng kagandahan. Bakit 
											ang kanyang mga mata'y sakdal nang 
											aamo. Maging ang kanyang kapwa 
											babae'y naakit bumati sa kanya. Ang 
											mga maginoo, sa kanya'y nagyuyuko ng 
											ulo.<br>
											<br>
											Si Maria'y laging may kasamang 
											dalawang ita sa kanyang pamimili. 
											Ang mga nasabing utusan ay hindi 
											lumalayo sa likod ng kanilang 
											panginoon. Sa kanilang dalang buslo 
											ay maliwanag na mapapansin ang mga 
											luyang kulay-ginto na pinamamalit ni 
											Maria. Nang panahong yao'y walang 
											kuwartang katulad ngayon na ating 
											ibinibili ng kailangan. Noon, sa 
											halip na bili ay palitan ang palakad 
											ng bawa't tao. Doon nga sa talipapa 
											nagtutungo ang may kailangan. Sari-saring 
											bagay ang matatagpuan doon. Mga 
											pinatuyong balat ng hayop na may 
											magagandang balahibo. Mga banig na 
											yari sa buli't sa pandang may kulay 
											salit-salit. Mga sutlang habi na may 
											malalapad na guhit ay may 
											patak-patak. At kung anu-ano pang 
											kagamitan sa loob ng bahay ang 
											paninda roon.<br>
											<br>
											May tanging araw na tinatawag nilang 
											pagpapalitan. Sa araw na yaon 
											lumuluwas sa bayan ang maraming tao 
											upang makipamalit. Palibhasa'y hindi 
											luyang talaga ang ipinamamalit ni 
											Maria, kundi tunay na luyang ginto, 
											kung kaya marami ang nagbibili sa 
											kanya ng iba't ibang lako. Nagkataon 
											namang sa araw na yao'y namamalit si 
											Gat Dula. Bukod sa kanyang ilang 
											kawal na lingkod na kasama'y may 
											kasama pa siyang mga dugong-mahal. 
											Si Gat Dula ay taga-Bai, kaya sa 
											kanilang pagtungo sa bayan ng 
											Makiling ay kinailangan nilang 
											gumamit ng malaking bangka. May 
											kalayuan ang agwat ng dalawang 
											bayang nabanggit. Kaya kung sa mga 
											kangga sila sasakay na hila ng mga 
											kalabaw ay tatanghaliin sila ng 
											pagdating.<br>
											<br>
											Nawiwili ang lahat sa pagpapalitan 
											ng kanilang dala-dalahan. 
											Kasingkapal ng mga paninda ang tao 
											sa talipapa. Karaniwan nang dayuhin 
											ang tanging araw ng pamamalitang 
											ukol sa bawat pook. Kaya bukod sa 
											mga sadyang tubo sa Makiling ay may 
											ibang mukhang mapapansin doong 
											nangangalakal. Kabilang sa mga 
											lipingmahal na namamalit ay si Gat 
											Dulang nagpapalipas lamang ng 
											maligayang sandali sa talipapa. 
											Nagkataon namang nagkasabay ng 
											padampot sina Maria at Gat Dula sa 
											kanilang binibiling balat ng hayop 
											na may magagandang balahibo. Sa 
											gayong pagkakasabay ay nagkabunggo 
											ang kanilang mga balikat, at 
											nagkatama ang kanilang mga mata. 
											Gaanong pagtataka noon ang naghari. 
											Lalo na nang sa di sinasadya'y 
											nahawakan ni Gat Dula ang 
											malasutlang daliri ng dalaga. 
											Sandali silang nagkatinginan. 
											Subalit sa taglay na kayumian ni 
											Maria'y nagyuko ng ulo ang makisig 
											na Gat tanda ng paggalang at 
											paghingi ng paumanhin. Bago sila 
											nagkalayo'y isang mahiyaing ngiti 
											ang naitugon ng lakambini sa 
											mapakumbabang 'patawad po' ng binata.<br>
											<br>
											Buhat noo'y naging malimit ang 
											pagdalaw ni Gat Dula sa Makiling. 
											Subali't mula rin noo'y hindi na 
											niya napagmalas ang maalindog na 
											katauhan ni Maria. Hanggang noong 
											makalipas ang ilang panahonng 
											pamumulaklak ng suha, ay saka lamang 
											niya muling napalarang mamasdan sa 
											dating talipapaang luwalhating 
											bumihag sa kanyang pihikang pag-ibig. 
											Gaanong galak niya, at tuloy na 
											ibulong sa kanyang loob: 'Ang tiniis 
											kong hirap nang nagdaang mga araw, 
											marahil ngayo'y malulunasan na.' Banayad siyang lumapit kay Maria, at 
											nagbigay-galang. Walang kasintamis 
											na ngiti ang isinagot naman sa kanya.<br>
											<br>
											Buhat noo'y naging matalik na silang 
											magkakilala hanggang sa nakaraan ang 
											ilang pagbibilog ng buwan. Sa isang 
											tabi ng batis na umaaliw-iw sa loob 
											ng gubat ay nahiwatigan nilang sa 
											ubod ng puso'y may tinitimpi silang 
											pagmamahal. Ito'y naramdaman nila 
											nang magtamang matagal ang kanilang 
											mga paningin, at hindi maibuka ng 
											kanilang labi ang binibigkas ng 
											dibdib. Sa gayong lihim na 
											pag-iibigan ay nagkayakap ang dati'y 
											magkalayong langit at lupa. Nguni't 
											ang gayong pagsusuyuan, sa 
											nilakadlakad ng mga araw ay hindi 
											nalihim sa kaalaman ng ama ni Maria.<br>
											<br>
											Sabihin pa ang galit ni Gat Panahon; 
											halos mayanig ang buong lawa nga Bai. 
											Gaanong damdamin ang nilasap ni 
											Dayang Makiling, buhat nang 
											matantong ang bugtong na anak niya'y 
											may kasuyong taga-lupa. Ang puso ng 
											ina, palibhasa'y kadluan ng awa, 
											kung kaya di nakatiis na tanungin si 
											Maria. Madali't salita, dahil sa 
											malabis na pagmamahal ng magulang ay 
											pinagbawalan ang kanilang anak. 
											Sapul noon, hindi na nakapanaog sa 
											lupa si Maria. Pinutol ni Gat 
											Panahon ang pagtungu-tungo ni Maria 
											sa talipapa. Binawi sa kanya ng 
											nagmamalasakit na magulang ang 
											engkanto ng pagiging tunay na 
											kinapal: yaon ang pinagmulan tuloy 
											ng pagkakahiwalay ng mga bathala at 
											madlang tao.<br>
											<br>
											Subalit kung umibig si Maria'y 
											minsan lamang, at walang kasindakila. 
											Kung siya ma'y hindi na nakapapanaog 
											sa lupa dahil sa wala na siyang 
											kapangyarihang makihalubilo sa 
											madlang kinapal, sa alaala ni Gat 
											Dula'y hindi nagkukulang ang kanyang 
											pagdalaw. Naroong kung minsa'y 
											pamalas siya sa sandaling nag-iisa 
											ang mabunying Gat, ngunit pag 
											nilapitan nito upang yakapin ay 
											bigla siyang naglalaho. Naroong 
											umawit siya nang lubhang matimyas 
											kung nangungulila si Gat Dula 
											ngutnit pag hinanap nito kung saan 
											nanggaling ang tinig ay hindi naman 
											malaman. Anupat ang lahat sa binta'y 
											parang panaginip. Walang kasingwagas 
											naman ang pagmamahal ni Gat Dula kay 
											Maria. Ang lahat ng pook at nayong 
											niyapakan ni Maria, maging ang 
											tabing-batis na madalas nilang 
											pagtagpuan, ay hindi nakaliligtaang 
											dalawin.<br>
											<br>
											Nang panahong yao'y malimit ang 
											pakikipagdigma ng mga bayan sa 
											kapwa-bayan. Di kataka-takang 
											lusubin ni Lakan Bunto ang kaharian 
											ng Bai na sakop ni Gat Dula. 
											Subali't kung ilang kaharian na ang 
											nakikipaghamok sa matapang na Gat, 
											maano man lamang na mapipilan siya o 
											kaya'y masugatan. Ang dahilan ay 
											sapagkat siya'y tinangkilik ng 
											engkanto ni Maria. Ang adhikaing 
											pag-ibig ng paraluman ay nagiging 
											baluti at kalasag ng mabunying Gat. 
											Marami na siyang napasukong kaharian; 
											marami na siyang napagtagumpayang 
											tabak, ngunit ang hindi lamang niya 
											napasusuko't napagwawagihan ay ang 
											kamandag ng pangungulila sa pag-ibig. 
											Yaon ang dahilan ng kanyang 
											pagkakasakit, hanggang sa siya'y 
											naputulan ng hininga.<br>
											<br>
											Ang sabi ng alamat, hinihiling ni 
											Maria sa Bathalang Maykapal na ang 
											kaluluwa ng kanyang irog ay ibigay 
											sa kanya. Noo'y yumao narin ang 
											kanyang mga magulang kaya't sang-ayon 
											sa sabi sina Maria at Gat Dula ang 
											nag-uwi sa naiwang kayamanan at 
											lupain. Subali't hindi nalilimot ni 
											Maria ang pagkamasintahin ng kanyang 
											inang si Dayang Makiling sa lahat ng 
											nasasakupan. Ang pag kamahabagin ni 
											Dayang ay minana ni Maria sa kanyang 
											puso. Sa bawat bakuran ng bahay ng 
											kanyang mga sakop, gaya rin nang 
											dating ginagawa ng kanyang yumaong 
											ina, ay ibinubudbud niya ang mga 
											luyang ginto. Ang sinumang ikakasal 
											sa walang magamit na magarang 
											kasuutan ay hinahandugan niya. Ang 
											isang mag-anak na maghahanda, ngunit 
											walang magamit na kasangkapan ay 
											kanyang pinahihiram. Ang lahat nang 
											daing at kahilingan ng kanyang mga 
											sakop ay tinutugon niya ng 
											mapagpalang kandili.<br>
											<br>
											Ngunit ang gayong malimit na 
											pagpapahiram ay madalas magbunga ng 
											di-mabuti. Ang karamihan sa 
											tinatangkilik ni Maria'y di-marunong 
											tumingin ng utang na loob. Hanggang 
											sa wakas ay nakaisip ang ibang 
											mag-imbot sa di nila pag-aari. Ang 
											mga kasangkapang ipinahiram sa 
											kanila ni Maria, palibhasa'y pawang 
											ginto, kung kaya tikis nilang hindi 
											ibinabalik. Bakit ang sama'y hindi 
											lamang inaaangkin yaon ng iba, kundi 
											ipinagpapalit pa sa mataas na halaga 
											sa mga taga-ibang bayan. Sa gayon 
											nang gayo'y nayamot si Maria. Tuloy 
											nawika sa sariling, 'nag-iba na ang 
											panahon.'<br>
											<br>
											Kaya pati pahintulot na iginawad 
											niya upang malayang makapanguha ang 
											sinuman ng madlang bungang kahoy sa 
											gubat ay kanyang binawi. Dahil sa 
											pagmamalupit ng tao sa hayop ay 
											ipinagbawal din niya ang pangangaso, 
											ang paninilo ng mga manok-labuyo, at 
											pamamana ng mga ibon. Kung ang 
											kanyang utos ay sinusuway ng sinuman, 
											ang ginagawa ni Maria'y pinagdidilim 
											ang panahon at pinabubuho ang 
											malakas na ulan; pinagugulong niya 
											ng malalaking tipak na bato sa 
											bundok, hinahagkis niya ng baliti 
											ang pinawalang mababangis na kalabaw 
											at nang manugis at lumikha ng 
											matinding kidlat. Ang mga yao'y 
											panakot lamang naman ni Maria upang 
											ang mga mangangasong gumagambalang 
											malabis sa katahimikan ng sakop 
											niyang kagubatan ay magsilayo at 
											umalis.</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											<font color="#333333">&nbsp;&nbsp;&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
											&nbsp;</p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font color="#333333">
											<font face="Arial" style="font-size: 12pt">
											Source</font><font face="Arial">:&nbsp;</font><font size="3" face="Arial">https://pinoycollection.com/alamat-ni-maria-makiling/</font></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Arial" color="#333333">
											<span style="font-size: 15pt">&nbsp;
											</span></font></p>
											<p style="margin-left: 80px; margin-right: 80px; margin-top: 0; margin-bottom: 0">
																	&nbsp;</p>
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