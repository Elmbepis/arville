<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Matalinong Pagpapasya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Matalinong Pagpapasya";
$_SESSION['tnum']="*91";

$questions=array(

"Kailan mo dapat simulan ang proseso ng matalinong pagpapasya sa pagpili mo ng karera?=Ngayon, sa iyong kasalukuyang taon>Kapag nasa kolehiyo ka na+Sa pagtuntong mo sa senior high school<Sa susunod na taon",
"Alin sa mga sumusunod ang wastong pagpili ng karera?=Paghahanap ng landas na magdudulot sa iyo ng kaganapan bilang tao>Paghahanap ng kursong magbibigay ng mataas na suweldo+Pagsunod sa gustong kurso ng iyong magulang kahit ayaw mo ito<Paghahanap ng kursong madaling tapusin",
"Bakit mahalagang pag-isipang mabuti ang pagpili ng karera?=Upang hindi magsisi sa huli>Upang mapatunayan sa iba na ikaw ay matalino+Upang makakuha ng papuri mula sa magulang<Upang hindi na kailangan pang magtrabaho",
"Ano ang dapat na papel ng iyong pamilya sa iyong pagpili ng karera?=Maging bahagi ng iyong proseso ng pagpapasya>Magdesisyon para sa iyo+Kumbinsihin kang huwag nang magkolehiyo<Hindi makialam sa iyong pagpapasya",
"Bakit mahalaga ang papel ng pamilya sa iyong pagpili ng karera?=Dahil sila ang nakakakilala sa iyong mga lakas at kahinaan>Dahil wala na silang magiging papel sa oras na tumuntong ka sa kolehiyo+Dahil wala kang kakayahang magdesisyon para sa sarili<Dahil ang mga magulang mo lamang ang tanging nakakaalam ng pinakamagandang karera para sa iyo",
"Alin sa mga sumusunod na salik sa pagpili mo ng iyong karera ang tumutukoy sa mga bagay na kinagigiliwan mong gawin kahit hindi ka binabayaran?=Ang iyong mga hilig at interes>Ang iyong mga kakayahan at talento+Ang iyong personalidad<Ang mga oportunidad sa trabaho",
"Alin sa mga sumusunod na salik sa pagpili mo ng iyong karera ang may kaugnayan sa mga gawain o aktibidad kung saan nagpapakita ka ng natural na husay o galing?=Ang iyong mga kakayahan at talento>Ang iyong mga hilig at interes+Ang iyong personalidad<Ang mga oportunidad sa trabaho",
"Alin sa mga sumusunod na salik sa pagpili mo ng iyong karera ang tumutukoy sa kung paano ka nakikipag-ugnayan sa kapwa o tumutugon sa iba't ibang situwasyon?=Ang iyong personalidad>Ang iyong mga hilig at interes+Ang iyong mga kakayahan at talento<Ang mga oportunidad sa trabaho",
"Alin sa mga sumusunod na salik sa pagpili mo ng iyong karera ang nagtatakda kung may makukuha kang maayos na hanapbuhay o pagkakakitaan kapag natapos mo na ang iyong kurso?=Ang mga oportunidad sa trabaho>Ang iyong mga hilig at interes+Ang iyong mga kakayahan at talento<Ang iyong personalidad",
"Alin sa mga sumusunod na salik sa pagpili mo ng iyong karera ang tumutukoy sa mga hadlang o pagsubok na iyong pagdadaanan sa iyong pipiliing kurso?=Ang mga hamon at sakripisyong kinakailangan>Ang iyong mga hilig at interes+Ang iyong mga kakayahan at talento<Ang iyong mga pagpapahalaga",
"Alin sa mga sumusunod na salik sa pagpili mo ng iyong karera ang may kaugnayan sa 'financial reality' ng inyong pamilya?=Ang kakayahan ng iyong pamilyang suportahan ka>Ang iyong mga hilig at interes+Ang iyong personalidad<Ang iyong mga pagpapahalaga",
"Ang pagpili sa pagitan ng mataas na kita at panahon na mailalaan sa pamilya ay saklaw ng alin sa mga sumusunod na salik sa pagpili mo ng iyong karera?=Ang iyong mga pagpapahalaga>Ang iyong mga hilig at interes+Ang iyong mga kakayahan at talento<Ang kakayahan ng iyong pamilyang suportahan ka",
"Sa pagpili mo ng iyong karera, bakit hindi sapat na gusto mo lang ang isang kurso?=Dahil hindi lahat ng gusto mo ay kaya mo>Dahil lahat ng gusto mo ay mali+Dahil ang gusto mo ay hindi mahalaga sa pagpili ng karera<Dahil mas mahalaga ang gusto ng mga magulang mo",
"Kung mahilig at may talento ka sa pagguhit, alin sa mga sumusunod na karera ang bagay sa iyo?=Arkitektura o sining>Pamamahayag o pagsusulat+Medisina<Abogasya",
"Ang paggawa ng listahan ng iyong mga hilig, kakayahan, at pagpapahalag ay bahagi ng alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera?=Pagsasagawa ng self-sssessment kasama ang pamilya>Pagsasaliksik tungkol sa mga karerang babagay sa iyo+Pagkausap sa pamilya tungkol sa inyong financial reality<Pag-alam sa mga requirements ng iyong pipiliing karera",
"Alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera ang tumutukoy sa paggamit ng internet, pagbabasa ng mga aklat, at pakikipag-usap sa mga propesyonal para matukoy ang mga karerang maaari mong pagpilian?=Pagsasaliksik tungkol sa mga karerang babagay sa iyo>Pagsasagawa ng self-sssessment kasama ang pamilya+Pagkausap sa pamilya tungkol sa inyong financial reality<Pag-alam sa mga requirements ng iyong pipiliing karera",
"Alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera ang tumutukoy sa pagdedetermina ng budget na kayang ilaan ng iyong pamilya sa iyong pag-aaral?=Pagkausap sa pamilya tungkol sa inyong financial reality>Pagsasagawa ng self-sssessment kasama ang pamilya+Pagsasaliksik tungkol sa mga karerang babagay sa iyo<Pag-alam sa mga requirements ng iyong pipiliing karera",
"Ang pag-alam sa haba ng mga kursong pinagpipilian at mga subject na binibigyan ng pokus ng mga ito ay bahagi ng alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera?=Pag-alam sa mga requirements ng iyong pipiliing karera>Paglilista ng mga karerang babagay sa iyo+Pagkausap sa pamilya tungkol sa inyong financial reality<Pagsasagawa ng self-sssessment kasama ang pamilya",
"Alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera ang tumutukoy sa paggawa ng back-up plan para mapagtagumpayan ang mga hadlang na tulad ng mahirap na board exam o pagiging malayo ng unibersidad?=Pagtukoy sa mga hamon at paghahanda ng mga solusyon>Pagsasagawa ng self-sssessment kasama ang pamilya+Pagkausap sa pamilya tungkol sa inyong financial reality<Pagsasaliksik tungkol sa mga karerang babagay sa iyo",
"Ang pagtatakda ng mga petsa kung kailan ka matatapos sa Grade 10, SHS, at kolehiyo ay bahagi ng alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera?=Paggawa ng timeline hanggang sa iyong unang trabaho>Pagtukoy sa mga hamon at paghahanda ng mga solusyon+Pagkausap sa pamilya tungkol sa inyong financial reality<Pag-alam sa mga requirements ng iyong pipiliing karera",
"Ang paghingi ng feeback mula sa iyong mga magulang tungkol sa iyong plano ay bahagi ng alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera?=Pagkonsulta sa iyong pamilya>Paggawa ng timeline hanggang sa iyong unang trabaho+Pagtukoy sa mga hamon at paghahanda ng mga solusyon<Pag-alam sa mga requirements ng iyong pipiliing karera",
"Alin sa mga sumusunod na hakbang sa paglikha ng personal na plano sa karera ang kailangan mong gawin dahil patuloy na nagbabago ang iyong situwasyon sa paglipas ng panahon?=Pagrepaso sa iyong plano taun-taon>Pagkonsulta sa iyong pamilya+Pagtukoy sa mga hamon at paghahanda ng mga solusyon<Paggawa ng timeline hanggang sa iyong unang trabaho",
"Alin sa mga sumusunod ang hindi kabilang sa mga inaasahang bunga ng paggawa mo ng personal na plano sa iyong karera?=Kawalan ng suporta mula sa iyong pamilya>Kumpiyansa sa iyong kinabukasan+Mas mataas na tsansang magtagumpay<Kakayahang harapin ang mga hamon",
"Ano ang dapat mong gawin sa paghingi mo ng feedback tungkol sa iyong plano mula sa iyong pamilya at guro?=Maging bukas sa kanilang mga mungkahi>Balewalain ang lahat ng sasabihin nila+Magpasyang sundin ang lahat ng mungkahi nila kahit labag sa iyong kalooban<Makipagtalo sa kanila hanggang magsawa sila sa pagbibigay ng feedback",
"Alin sa mga sumusunod ang magiging bunga kung isasaalang-alang mo ang lahat ng mga salik sa pagpili ng karera sa pagbuo mo ng iyong plano?=Makatotohanan at matalinong pagpapasya>Pagdududa sa nalikhang plano+Pagkabigong makatapos ng pag-aaral<Pagpasok sa maling kurso",
 
);

?>

</head>

</body

</html>