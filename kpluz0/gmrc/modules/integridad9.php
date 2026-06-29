<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagkakaroon ng Integridad - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagkakaroon ng Integridad";
$_SESSION['tnum']="*93";

$questions=array(

"Ano ang kahulugan ng integridad?=Paggawa ng mabuti kahit walang nakakakita>Pagpapalusot kapag nagkamali+Pagmamalasakit sa kapwa kapag may nakatingin<Pangangako kahit hindi kayang tuparin",
"Alin sa mga sumusunod ang nagpapakita ng integridad?=Pagtutugma ng sinasabi at ginagawa>Pagsisimba tuwing Linggo+Pagsasaulo ng mga dasal<Pagbibigay ng limos sa simbahan",
"Ano ang kahulugan ng salitang Latin na 'integer,' kung saan nagmula ang salitang 'integridad'?=Buo o kumpleto>Tapat+Banal<Huwaran",
"Alin sa mga sumusunod ang katangian ng isang taong may integridad?=Siya ay pareho sa harap ng ibang tao at sa likod ng saradong pinto>Siya ay gusto ng nakararami dahil magaling siyang magpanggap na mabait+Siya ay masunurin sa batas kapag may nanonood lamang<Magaling siyang maglihim ng kanyang mga kahinaan",
"Alin sa mga sumusunod ang kahulugan ng matapat na paggawa?=Pagbibigay ng iyong buong kakayahan sa anumang gawain o tungkulin>Hindi pagnanakaw at hindi pagsisinungaling lamang+Paggawa ng isang bagay para makaraos lamang<Paggamit ng shortcut upang matapos agad",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing dapat maging gawang banal ang bawat pagkilos mo sa iyong trabaho?=Pag-aalay sa Diyos>Hindi paghahanap ng papuri+Paggalang sa trabaho gaano man ito kaliit<Hindi pagtakas sa responsibilidad",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing dapat mo pa ring gawin nang tama ang iyong trabaho kahit wala kang natatanggap na pasasalamat?=Hindi paghahanap ng papuri>Pag-aalay sa Diyos+Paggalang sa trabaho gaano man ito kaliit<Hindi pagtakas sa responsibilidad",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing dapat mong gampanan ang iyong tungkulin nang may dignidad at kahusayan kahit ikaw ang nasa pinakamababang posisyon sa inyong organisasyon?=Paggalang sa trabaho gaano man ito kaliit>Pag-aalay sa Diyos+Hindi paghahanap ng papuri<Pagpapahalaga sa oras",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing hindi ka dapat gumawa ng dahilan upang maipasa ang iyong tungkulin sa iba?=Hindi pagtakas sa responsibilidad>Pag-aalay sa Diyos+Hindi paghahanap ng papuri<Paggalang sa trabaho gaano man ito kaliit",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing hindi ka dapat maghanap ng 'shortcut' para lang mairaos agad ang iyong tungkulin?=Pagbibigay ng buong makakaya>Pagtatapos ng sinimulan kahit mahirap+Pagmamalaki ng gawa nang hindi nagyayabang<Pagpapahalaga sa oras",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing hindi ka dapat nahuhuli sa pagpasok at pagtatrabaho dahil sayang ang panahon?=Pagpapahalaga sa oras>Pagtatapos ng sinimulan kahit mahirap+Pagmamalaki ng gawa nang hindi nagyayabang<Pagbibigay ng buong makakaya",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing hindi ka dapat sumuko sa gitna ng matinding pagsubok hanggang maisakatuparan mo ang iyong tungkulin?=Pagtatapos ng sinimulan kahit mahirap>Pagpapahalaga sa oras+Pagmamalaki ng gawa nang hindi nagyayabang<Hindi paghahanap ng papuri",
"Sa matapat na paggawang ginagabayan ng pananampalataya, alin sa mga sumusunod ang nagsasabing dapat mong ibahagi sa iba ang mga bagay na nagawa mo nang mahusay?=Pagmamalaki ng gawa nang hindi nagyayabang>Pagpapahalaga sa oras+Pagtatapos ng sinimulan kahit mahirap<Hindi paghahanap ng papuri",
"Ano ang tugon ng isang taong ginagabayan ng pananampalataya kapag walang pumapansin sa kanyang pagtatrabaho?=Hindi siya natitinag sa kawalan ng pasasalamat at nagpapatuloy sa paggawa>Nagagalit siya at tumitigil sa paggawa+Nagsusumbong siya sa iba upang mapansin<Humihinto siya hanggang may pumansin sa kanya",
"Kapag may integridad ka sa iyong paggawa, ano ang kalidad ng iyong produkto?=Hindi lamang tapos kundi mataas din ang kalidad>Tapos pero mababa ang kalidad+Hindi tapos o kumpleto<Mataas ang kalidad pero hindi tapos",
"Ano ang pananaw ng isang taong may malaking pananampalataya tungkol sa paggawa ng maliit na trabaho?=Gagawin pa rin niya ito nang may dignidad at kahusayan>Maaari itong balewalain dahil hindi ito mahalaga+Para lamang ito sa mababang uri ng tao<Dapat itong tanggihan dahil sayang lamang ang oras niya rito",
"Kapag nakakatulog ka nang mahimbing dahil malinis ang iyong konsensiya, alin sa mga sumusunod na bunga ng paggawa nang may integridad ang nakamtan mo?=Kapayapaan ng isip at kalooban>Tiwala at paggalang ng ibang tao+Kaganapan bilang tao<Pagiging magandang halimbawa para sa iba",
"Kapag salita mo pa lamang ay sapat na sa ibang tao dahil alam nilang hindi ka nagsisinungaling, alin sa mga sumusunod na bunga ng paggawa nang may integridad ang nakamtan mo?=Tiwala at paggalang ng ibang tao>Kapayapaan ng isip at kalooban+Kaganapan bilang tao<Pagiging magandang halimbawa para sa iba",
"Kapag nararamdaman mong wala ka nang mahihiling pa dahil makabuluhan na ang iyong buhay at naabot mo na ang kabuuan ng iyong potensyal, alin sa mga sumusunod na bunga ng paggawa nang may integridad ang nakamtan mo?=Kaganapan bilang tao>Kapayapaan ng isip at kalooban+Tiwala at paggalang ng ibang tao<Pagiging magandang halimbawa para sa iba",
"Kapag ang iyong buhay na may integridad ay nagiging inspirasyon sa iyong mga kapatid, kaklase, at maging sa iyong mga magulang, alin sa mga sumusunod na bunga ng paggawa nang may integridad ang nakamtan mo?=Pagiging magandang halimbawa para sa iba>Kapayapaan ng isip at kalooban+Tiwala at paggalang ng ibang tao<Kaganapan bilang tao",
"Alin sa mga sumusunod ang ipinapakita ng pagdating sa tamang oras at tamang lugar upang magtrabaho?=Paggalang sa tungkulin>Pagbabalewala sa trabaho+Kawalan ng ganang magsikap<Mababang disiplina sa sarili",
"Alin sa mga sumusunod ang kahulugan ng moral na tungkulin?=Isang obligasyong gawin ang tama sa lahat ng oras>Isang tungkuling opsyonal na maaaring gawin o hindi+Isang bagay na para lamang sa mga relihiyoso<Isang utos na dapat sundin upang hindi maparusahan ng batas",
"Sa pagtatapos ng araw, ano ang nadarama ng isang taong ginawa ang kanyang tungkulin nang may pananampalataya?=Kapayapaan ng loob>Pagod at panghihinayang+Galit o inis<Takot o pag-aalala",
"Ano ang dapat mong gawin sa iyong mga gawaing-bahay upang makapagpakita ka ng integridad?=Gawin ang mga ito kahit hindi inuutusan>Gawin lamang ang mga ito kapag inutusan+Huwag pansinin ang mga ito kahit utusan<Ipagawa ang mga ito sa ibang tao",
"Ano ang dapat mong gawin kung makasira ka ng isang kagamitang hindi mo pag-aari?=Sabihin ang totoo at humingi ng tawad>Lumayo at magkunwaring walang nangyari+Isisi ang nangyari sa ibang tao<Sabihing hindi ka sigurado kung ikaw ang nakasira at huwag humingi ng tawad",

);

?>

</head>

</body

</html>