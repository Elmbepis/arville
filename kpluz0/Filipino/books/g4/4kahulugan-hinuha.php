<?php

$grd=$grd;
$title="Paghinuha ng Kahulugan<br/>ng mga Salita";
$red="<font color='#CC0000'>";
$vio="<font color='#800080'>";
$blue="<font color='#0000CC'>";
$black="<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="
Hindi sa lahat ng pagkakataon ay kailangan nating gumamit ng diksyonaryo upang malaman ang kahulugan ng isang salita.
Maaari nating hulaan ang kahulugan nito batay sa kung paano ito ginamit sa pangungusap.
<br/><br/>
Ang kabuuang kalinawan ng kaisipang inilalahad ng isang pangungusap ay tinatawag na konteksto.
Upang maunawain natin ang konteksto ng isang pangungusap, kailangan nating suriing mabuti ang ibig sabihin ng mga salitang ginamit dito.
<br/><br/>
Ang konteksto ng isang pangungusap ay maaaring magbigay ng mga pahiwatig o palatandaang magagamit natin sa paghinuha ng kahulugan ng isang salitang nakapaloob dito.
<br/><br/>
Pag-aralan natin ang iba't ibang pahiwatig ng konteksto na maaaring matagpuan sa loob ng isang pangungusap upang magamit sa paghinuha ng kahulugan ng isang salitang hindi pamilyar sa atin.
<br/><br/><br/>
@blue
Nakahayag na<br/>Kahulugan
@nblue
<br/>
Maaaring inihahayag o ibinibigay na ng pangungusap sa direktang paraan ang kahulugan ng salitang hindi pamilyar sa iyo.
<br/><br/>
$vio Ang mga leon at tigre ay $red karniboro$vio, o mga hayop na tanging karne lamang ang kinakain.$black
<br/><br/>
Hayagan o lantarang sinasabi ng pangungusap sa itaas na ang karniboro ay isang hayop na tanging karne lamang ang kinakain.
Sa dahilang ito, hindi mo na kailangan pang tingnan ang kahulugan ng salitang 'karniboro' sa diksyonaryo.
<br/><br/><br/>
@blue
Mga Ibinigay na<br/>Halimbawa
@nblue
<br/>
May mga pagkakataong mahihinuha natin ang kahulugan ng isang salita sa pamamagitan ng mga halimbawang ibinibigay ng pangungusap patungkol dito.
<br/><br/>
$vio Ang agila, kalapati, manok, kuwago, at loro ay mga nilalang na $red abyan$vio.$black
<br/><br/>
Nagbigay ang pangungusap sa itaas ng sapat na dami ng halimbawa upang mahinuha natin na ang salitang 'abyan' ay tumutukoy sa mga ibon.$black
<br/><br/><br/>
@blue
Ibinigay na<br/>Kasingkahulugan
@nblue
<br/>
May mga pangungusap ding nagbibigay ng salitang kasingkahulugan ng salitang hindi natin kilala.
Kung alam mo ang ibig sabihin ng ibinigay na salita, mahihinuha mo ang kahulugan ng salitang hindi pamilyar sa iyo.
<br/><br/>
$vio Kalayaan ang $red lunggati$vio, o hinahangad, ng mga Pilipino noong panahon ng Kastila.$black
<br/><br/>
Sa pangungusap sa itaas, mahihinuha natin na ang 'lunggati' ay isang bagay na nais makamtan o ninanasa ng isang tao, dahil nagbigay ang pangungusap ng isang salitang kasingkahuklugan nito: 'hinahangad.'
<br/><br/><br/>
@blue
Ibinigay na<br/>Kasalungat
@nblue
<br/>
Isa pang pahiwatig ng konteksto na dapat mong hanapin sa isang pangungusap ay ang kasalungat ng salitang hindi pamilyar sa iyo.
Kung alam mo ang ibig sabihin ng ibinigay na kasalungat, mahihinuha mo ang ibig sabihin ng salitang hindi mo kilala.
<br/><br/>
$vio Hindi gaya ng kaibigan niyang sigurado at panatag sa kanyang pasya, si Domeng naman ay $red bantulot$vio.$black
<br/><br/>
Sa pangungusap sa itaas, ang salitang hindi pamilyar sa marami ay 'bantulot.' Batay sa konteksto ng pangungusap, ang kasalungat ng 'bantulot' ay 'sigurado'.
Samakatuwid, ang ibig sabihin ng 'bantulot' ay hindi sigurado o nag-aalangan.
<br/><br/><br/>
@blue
Pahiwatig na<br/>Pangkaranasan
@nblue
<br/>
Mahihinuha rin natin ang kahulugan ng isang salita sa pamamagitan ng paggamit ng ating karanasan.
<br/><br/>
$red Karimarimarim$vio ang nakita niyang polusyon sa ilog na puno ng basura at mga patay na hayop.$black
<br/><br/>
Batay sa ating karanasan, ang isang napakaruming ilog ay nakakadiri o kasuklam-suklam sa paningin. 
Kung gayon, mahihinuha natin na ang ibig sabihin ng salitang 'karimarimarim' ay nakakadiri.
<br/><br/><br/>
@blue
Pahiwatig na<br/>Pandamdamin
@nblue
<br/>
Mahihinuha rin natin ang kahulugan ng isang salita batay sa damdaming nakapaloob dito.
<br/><br/>
$vio Nang makita ni Matet na umiiyak ang lahat ng mga bata, maging siya ay nakaramdam ng $red pighati$vio.$black
<br/><br/>
Ang pag-iyak ng mga bata sa pangungusap ay nagpapahiwatig sa atin ng damdaming pagkalungkot.
Batay dito, mahihinuha nating ang kahulugan ng salitang 'pighati' ay kalungkutan.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#E6FEED' bordercolor='#D2FBD8'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1
Gamitin ang mga pahiwatig ng konteksto ng bawat pangungusap sa ibaba upang piliin ang kahulugan ng mga pulang salita mula sa mga lilang pagpipilian:<br/><br/>$tfont1
1. Nagsisi si Diego sa kanyang mga kasalanan kaya mula noon ay $red iwinaksi$vio (dinagdagan, inalis, pinadalas)$black na niya ang kasamaan sa kanyang isipan.<br/><br/>
2. Labag sa batas ang $red pagsikil$vio (pagpilit, pagpayag, pagpigil)$black sa mga karapatang pantao ninuman.<br/><br/>
3. Kakambal ni Lyka si Kyla kaya $red magkawangis$vio (magkaiba, magkamukha, magkalaban)$black sila mula ulo hanggang paa.<br/><br/>
4. Hindi raw gaanong makakain si Ruby kaya $red balingkinitan$vio (payat, matangkad, masigla)$black na siya ngayon.<br/><br/>
5. Isang mapagkumbaba, matulungin, at mapagmalasakit na manggagamot ang kanyang ama kaya $red kapita-pitagan$vio (kaduda-duda, kapansin-pansin, kagalang-galang)$black ito. 
</td>
</tr></table>
<br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont4 Mga Sagot sa Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE' bordercolor='#DDDDDD'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2
1. Nagsisi si Diego sa kanyang mga kasalanan kaya mula noon ay $red iwinaksi $vio (inalis)$black na niya ang kasamaan sa kanyang isipan.<br/><br/>
2. Labag sa batas ang $red pagsikil$vio (pagpigil)$black  sa mga karapatang pantao ninuman.<br/><br/>
3. Kakambal ni Lyka si Kyla kaya $red magkawangis$vio (magkamukha)$black sila mula ulo hanggang paa.<br/><br/>
4. Hindi raw gaanong makakain si Ruby kaya $red balingkinitan $vio (payat)$black na siya ngayon.<br/><br/>
5. Isang mapagkumbaba, matulungin, at mapagmalasakit na manggagamot ang kanyang ama kaya $red kapita-pitagan$vio (kagalang-galang)$black ito. 
</td>
</tr></table>
";

?>


















