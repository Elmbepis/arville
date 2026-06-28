<?php

$grd=$grd;
$title="Pagsulat ng Agenda";
$img1="images/news-report.jpg";
$red="<font color='#CC0000'>";
$vio="<font color='#800080'>";
$blue="<font color='#0000CC'>";
$black="<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Ang agenda ay isang listahan ng mga paksa o isyung kailangang talakayin sa isang pulong. Ito ang magiging gabay o balangkas ng mga pag-uusapan. 
Sa pamamagitan ng pagkakaroon ng agenda, natutugunan ang mga mahahalagang paksang dapat pag-usapan sa loob ng nakalaang oras para sa pulong.
<br/><br/>
Makikita sa ibaba ang ilang mga hakbang at gabay sa pagsulat at pagpapatupad ng agenda.
<br/><br/>$vio<u> 
1. Tukuyin ang layunin.
</u>$black<br/><br/>
Unahin ang pagtukoy sa layunin ng pulong o artikulo. Ano ang mga mahahalagang bagay na dapat talakayin o maipahayag sa pulong? Alamin kung ano ang inaasahang magiging 'output' o resulta ng aktibidad na ito.
<br/><br/>$vio<u> 
2. Isulat ang mga detalye<br/>ng pagdadaos ng pulong.
</u>$black<br/><br/>
Isulat sa pinakamataas o pinakaunang bahagi ng agenda ang mga impormasyong patungkol sa pagdadaos ng pulong, kabilang ang pamagat ng pulong, petsa at oras kung kailan ito gaganapin, at ang lugar na pagdadausan ng pulong.
<br/><br/>$vio<u> 
3. Ilista ang mga puntong tatalakayin.
</u>$black<br/><br/>
Ilista sa agenda ang mga isyu, punto, o paksang kailangang talakayin sa pulong. Ito dapat ang mga mahahalagang bagay na nakakaimpluwensya sa layunin ng pulong.
<br/><br/>$vio<u> 
4. Piliin ang mahahalagang punto.
</u>$black<br/><br/>
Pag-aralan ang mga isyung nakalista at pumili ng mga pinakamahahalaga sa mga ito na dapat bigyan ng mas malaking oras o pansin. Ito ay upang matiyak na ang pinakamahalagang bagay ay mabigyan ng prayoridad sa pag-uusap sa pulong.
<br/><br/>$vio<u> 
5. Magtakda ng mga nakalaang oras. 
</u>$black<br/><br/>
Maglaan ng oras o panahong gugugulin para sa bawat isyung nakalista sa agenda. Ito ay upang matiyak na hindi maaaksaya ang oras at matutugunan ang mga mahahalagang isyu sa loob ng limitadong panahon.
<br/><br/>
Isulat sa tabi ng bawat paksa kung anong oras ito tatalakayin. Tandaang mas malaking oras ang dapat ilaan sa mga isyung mas mataas ang prayoridad.
<br/><br/>$vio<u> 
6. Ipamahagi ang agenda.
</u>$black<br/><br/>
Maaring magpadala ng kopya ng agenda sa mga kalahok bago ganapin ang aktibidad o pulong. Ito ay upang maipaghanda nila ang mga sarili at makapag-isip sila ng mga ideya o komentong nais nilang ibahagi.
<br/><br/>$vio<u> 
7. Sundin ang agenda. 
</u>$black<br/><br/>
Sa mismong aktibidad, sundin ang takdang oras at ang mga nakalista sa agenda. Maaaring magkaroon ng pag-aadjust o pagdagdag sa mga isyu depende sa mga pangyayari, ngunit ito ay dapat limitado upang matiyak ang maayos na daloy ng talakayan o pagsulat.
<br/><br/><br/>
@blue
Halimbawa ng<br/>Agenda
@nblue
<br/><br/>
Pulong ng Samahan ng mga Mag-aaral
<br/><br/>
$vio Petsa:$black ika-20 ng Hulyo 2023
<br/><br/>
$vio Oras:$black 2:00 PM - 4:00 PM
<br/><br/>
$vio Lugar:$black Silid ng Pagpupulong, Mataas na Paaralan ng San Juan
<br/><br/>
Agenda:
<br/><br/>
1. Pagbubukas ng Pulong (2:00 PM - 2:05 PM)
<br/><br/>
1.1 Pagpapakilala ng mga kasapi ng Samahan ng mga Mag-aaral
<br/><br/>
1.2 Pagtatalaga ng tagapagtanggap ng mga dokumento at pangalan ng taga-rehistro
<br/><br/>
2. Pag-apruba ng Nakaraang Pulong (2:05 PM - 2:10 PM)
<br/><br/>
2.1 Pagtalakay sa mga punto ng nakaraang pulong
<br/><br/>
2.2 Pagtalakay at pag-apruba ng mga gawain at desisyong kinakailangan
<br/><br/>
3. Pagtalakay sa mga Usapin ng Finansya (2:10 PM - 2:30 PM)
<br/><br/>
3.1 Pagsuri ng mga bayarin at pondo ng Samahan
<br/><br/>
3.2 Pagtalakay sa mga plano at proyektong nangangailangan ng pondo
<br/><br/>
3.3 Pag-apruba ng pagsusumite ng budget proposal sa administrasyon
<br/><br/>
4. Pagtalakay sa mga Programa at Aktibidad (2:30 PM - 3:30 PM)
<br/><br/>
4.1 Pag-uulat ng mga pinakahuling programa at aktibidad ng Samahan
<br/><br/>
4.2 Pagtalakay at pagpaplano ng mga darating na aktibidad
<br/><br/>
4.3 Diskusyon at pagpapasya sa mga ideya at suhestiyon para sa mga programa at aktibidad
<br/><br/>
5. Mga Bagong Proyekto at Inisyatiba (3:30 PM - 3:45 PM)
<br/><br/>
5.1 Pagtanggap at pagtalakay sa mga ideya at mga proposal ng mga kasapi
<br/><br/>
5.2 Pagsusuri at pagsasaayos ng mga detalye ng mga proyekto at inisyatiba
<br/><br/>
5.3 Pagpasya sa mga susunod na hakbang at mga responsableng tao
<br/><br/>
6. Iba pang mga Anunsyo at Pahayag (3:45 PM - 3:55 PM)
<br/><br/>
6.1 Pagbabahagi ng mga mahahalagang impormasyon at anunsyo mula sa administrasyon
<br/><br/>
6.2 Pagkakataon para sa mga kasaping magbigay ng mga pahayag o reklamo
<br/><br/>
7. Pagtatapos ng Pulung (3:55 PM - 4:00 PM)
<br/><br/>
7.1 Pagpapahayag ng mga salamat at pagtatapos ng pulung

";
?>


















