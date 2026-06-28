<?php

$grd=$grd;
$title="Mga Bahagi<br/>ng Pahayagan";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";
$img1="images/pahayagan-mukha.jpg";
$img2="images/pahayagan-editoryal.jpg";
$img3="images/pahayagan-isports.jpg";
$img4="images/pahayagan-libangan.jpg";

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

Ang balita ay isang uri ng ulat na tumatalakay sa mga kasalukuyang kaganapan sa labas o loob ng isang bansa. 
Ito ay napapanahon at makatotohanan dahil ang layunin nito ay makapagbigay ng impormasyon o kaalaman sa mga mamamayan.
<br/><br/>
Ang lathalain kung saan mga balita ang pangunahing nakalimbag ay tinatawag na pahayagan, o 'newspaper' sa wikang Ingles.
<br/><br/>
Sa araling ito, isa-isa nating pag-aaralan ang mga bahagi ng pahayagan.
<br/><br/><br/>
@blue
Mukha ng<br/>Pahayagan
@nblue
<br/>
Ang mukha ng pahayagan ang pinakaunang pahina ng pahayagan. Sa bahaging ito makikita ang pangalan ng pahayagan at ang petsa kung kailan ito inilabas. 
<br/><br/>
Dito rin makikita ang mga pinakamahahalagang balita para sa araw ng isyu o labas, kabilang na ang ulo ng mga balita.
Ito ang tinatawag na 'front page' sa wikang Ingles.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
@blue
Balitang Pandaigdig
@nblue
<br/>
Sa balitang pandaigdig mababasa ang mga kaganapan sa iba't-ibang panig ng daigdig. 
Dito rin matatagpuan ang mga balitang may kaugnayan sa labas ng ating planeta.
<br/><br/><br/>
@blue
Balitang Panlalawigan
@nblue
<br/>
Sa balitang panlalawigan nakapaloob ang mga kaganapan sa iba't-ibang lalawigan ng ating bansa.
<br/><br/><br/>
@blue
Editoryal
@nblue
<br/>
Ang editoryal o pangulong tudling ang bahagi ng pahayagan kung saan matatagpuan ang matalino at mapanuring pagpapakahulugan ng patnugot ng pahayagan tungkol sa isang napapanahong isyu o paksa.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
@blue
Balitang Pangkalakalan
@nblue
<br/>
Ang balitang pangkalakalan ng pahayagan ang naglalaman ng mga ulat na may kaugnayan sa industriya, kalakalan, at komersyo ng ating bansa. 
<br/><br/>
Makikita rin dito ang kasalukuyang estado ng palitan ng piso kontra sa mga pera ng ibang bansa.
<br/><br/><br/>
@blue
Balitang Pampalakasan
@nblue
<br/>
Sa balitang pampalakasan mababasa ang mga nangyayari sa mundo ng palakasan sa loob at labas ng bansa. 
<br/><br/>
Dito rin malalaman ang mga iskedyul ng mga laro sa iba't ibang liga ng isports sa mundo.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
@blue
Anunsyo Klasipikado
@nblue
<br/>
Ang anunsyo klasipikado ang bahagi ng pahayagan kung saan mababasa ang sari-saring anunsyo at patalastas.
Ang mga ito ay nakapangkat sa talaan ayon sa kanilang uri o klasipikasyon.
<br/><br/>
Kabilang dito ang mga patalastas para sa mga trabahong iniaalok sa publiko at mga ari-arian o kagamitang ibinibenta o ipinapaupa.
<br/><br/><br/>
@blue
Obitwaryo
@nblue
<br/>
Ang obitwaryo ay tumutukoy sa bahagi ng pahayagang naglalaman ng mga anunsyo tungkol sa mga tao kapapanaw pa lamang. Mababasa rito ang impormasyon tungkol sa namayapang tao, kung saan siya nakaburol, at kung kailan at saan siya ililibing.
<br/><br/><br/>
@blue
Libangan
@nblue
<br/>
Sa libangan matatagpuan ang mga kaganapang naghahatid ng aliw sa mga mambabasa. Kabilang dito ang mga balita tungkol sa telebisyon at pelikula, musika, at iba pang anyo ng sining. 
<br/><br/>
Naglalaman din ito ng mga komiks, mga laro't palaisipang nakakalibang, at mga atraksyong tulad ng horoskop.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
@blue
Balitang Pang-araw-araw<br/>na Pamumuhay
@nblue
<br/>
Mababasa sa balitang pang-araw-araw<br/>na pamumuhay o 'lifestyle news' ang mga artikulong may kaugnayan sa tahanan, pagkain, paghahalaman, paglalakbay, at iba pang aspeto ng pang-araw-araw na pamumuhay ng mga mamamayan.
"
?>
