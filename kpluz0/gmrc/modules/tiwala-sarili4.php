<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Tiwala sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Tiwala sa Sarili";
$_SESSION['tnum']="*46";

$questions=array(

"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang magagawa sa pamamagitan ng pagtatala ng iyong mga talento at abilidad?=Kilalanin ang iyong mga kakayahan.>Itakda ang iyong mga layunin.+Magsanay ng positibong pag-iisip.<Pag-aralan ang mga pagkakamali.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa pagkakaroon ng mga tiyak na adhikaing nais mong maabot para sa iyong sarili?=Itakda ang iyong mga layunin.>Kilalanin ang iyong mga kakayahan.+Magsanay ng positibong pag-iisip.<Pag-aralan ang mga pagkakamali.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa pagiging optimistiko at puno ng pag-asa sa mga maaaring mangyari sa hinaharap?=Magsanay ng positibong pag-iisip.>Kilalanin ang iyong mga kakayahan.+Itakda ang iyong mga layunin.<Pag-aralan ang mga pagkakamali.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa paggamit ng iyong mga kabiguan para matuto at lalo pang mapabuti ang sarili?=Pag-aralan ang mga pagkakamali.>Kilalanin ang iyong mga kakayahan.+Itakda ang iyong mga layunin.<Magsanay ng positibong pag-iisip.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa pagkuha ng payo at motibasyon mula sa mga kapamilya at kaibigan?=Humingi ng suporta.>Makilahok sa mga aktibidad na nagpapalakas ng loob.+Iwasan ang paghahambing sa iba.<Maging aktibo sa pisikal na kalusugan.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang sumasaklaw sa pagsali sa mga kumpetisyon at pagtatanghal?=Makilahok sa mga aktibidad na nagpapalakas ng loob.>Humingi ng suporta.+Iwasan ang paghahambing sa iba.<Magbigay ng oras sa sarili.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang sumasaklaw sa regular na pag-eehersisyo at balanseng pagkain?=Maging aktibo sa pisikal na kalusugan.>Humarap sa mga hamon.+Iwasan ang paghahambing sa iba.<Humingi ng suporta.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa pagsubok sa mga gawaing bago sa iyo, lalo na iyong mga mahirap isagawa?=Humarap sa mga hamon.>Maging aktibo sa pisikal na kalusugan.+Iwasan ang paghahambing sa iba.<Humingi ng suporta.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa pagtutok lamang sa iyong sariling pag-unlad upang hindi mainggit sa tagumpay ng mga ibang tao?=Iwasan ang paghahambing sa iba.>Maging aktibo sa pisikal na kalusugan.+Humarap sa mga hamon.<Humingi ng suporta.",
"Alin sa mga sumusunod na hakbang para magkaroon ng tiwala sa sarili ang tumutukoy sa hindi pagmamadali sa proseso ng pag-abot sa mga pangarap at tagumpay?=Magbigay ng oras sa sarili.>Iwasan ang paghahambing sa iba.+Humarap sa mga hamon.<Humingi ng suporta.",
"Bakit mahalaga ang tiwala sa sarili?=Para magtagumpay sa mga layunin>Para hindi na kailangang mag-ambisyon sa buhay+Para hangaan ng mga kakilala<Para makapagmalaki sa ibang tao",
"Alin sa mga sumusunod ang dapat gawin upang magkaroon ng tiwala sa sarili?=Subukan ang mga bagong bagay>Itago ang mga talento+Umiwas sa mga hamon<Magtakda ng mga imposibleng layunin",
"Alin sa mga sumusunod ang dapat gawin ng pamilya upang palakasin ang tiwala sa sarili ng isang bata?=Suportahan ang mga aktibidad ng bata>Iwanan ang batang mag-isa+Bigyan ang bata ng mga gawaing hindi niya kaya<Huwag purihin ang bata sa kanyang mga tagumpay",
"Ano ang dapat mong gawin kapag nagkamali ka sa isang gawaing bago sa iyo?=Matuto at magpatuloy sa paggawa nito>Itago ang pagkakamali+Sumuko at maghanap na lang ng ibang gagawin<Sisihin ang iba sa nagawang pagkakamali",
"Ano ang dapat mong gawin kung nahihirapan ka sa isang aktibidad sa paaralan?=Humingi ng tulong sa guro o kamag-aral>Sumuko at umayaw sa aktibidad+Magalit sa sarili<Magreklamo sa guro at magpalipat sa ibang aktibidad",
"Ano ang dapat mong gawin upang mapanatili ang positibong pag-iisip?=Laging isiping kaya mo ang anumang nais gawin>Laging isiping hindi kaya ninuman ang iyong nais gawin+Umiwas sa lahat ng hamon<Ituon ang pansin sa pagkukulang ng iba",
"Ano ang tamang reaksyon kapag nakamit mo ang iyong layunin?=Ipagdiwang ang tagumpay>Ipagyabang ang tagumpay+Itago ang tagumpay<Balewalain ang tagumpay",
"Ano ang dapat mong gawin kung hindi mo pa natutukoy ang iyong talento o kakaibang abilidad?=Sumubok pa ng sari-saring aktibidad at magsikap>Sisihin ang mga kapamilya at kaibigan+Iwasan ang lahat ng aktibidad<Kopyahin ang talento ng iba",
"Alin sa mga sumusunod ang HINDI mo dapat gawin upang mapanatiling malusog ang iyong katawan?=Magpuyat sa gabi>Mag-ehersisyo nang regular+Umiwas sa mga bisyo<Kumain ng masustansyang pagkain",
"Paano makakatulong ang pisikal na kalusugan sa pagkakaroon ng tiwala sa sarili?=Nagbibigay ito ng lakas at enerhiya para harapin ang mga hamon>Nagpapababa ito ng pagnanasang magtagumpay+Nagpapabagal ito ng paggalaw<Nagdudulot ito ng kaba o takot",
"Alin sa mga sumusunod ang papel ng iyong pamilya sa iyong edukasyon?=Suportahan ka sa iyong pag-aaral>Kausapin ang iyong mga guro para bigyan ka ng mataas na grado+Pigilan ka sa paggawa ng mga takdang aralin para makatulong ka sa bahay<Ipaliwanag sa iyong hindi mahalaga ang iyong mga pangarap",
"Bakit mahalaga ang pagsasanay sa mga kakayahan?=Para lalong mapabuti ang sarili>Para hindi na kailangang mag-aral+Para makaiwas sa mga gawaing-bahay<Para makakuha ng mga papuri",
"Paano mo maipapakita ang tiwala sa sarili sa loob ng klase?=Pagsagot sa mga tanong at pagsali sa mga talakayan>Pag-iwas sa mga diskusyon+Pagpapatawa sa mga kamag-aral<Pagtawa sa kamalian ng iba",
"Ano ang dapat mong gawin upang magtagumpay sa isang aktibidad?=Magsanay hanggang maging mahusay>Sumuko kapag nahirapan+Ituon ang pansin sa mga negatibong komento<Ipagdiwang ang mga kabiguan ng iba",
"Paano mo maipapakita ang tiwala sa sarili sa loob ng iyong tahanan?=Pagsasaad ng mga ideya at opinyon>Pag-iwas sa mga gawaing bahay+Pagkukulong sa loob ng silid<Pakikipagtalo sa mga kapatid",
"Ano ang tamang gawin kung nakararamdam ka ng kaba bago ang isang pagtatanghal?=Huminga nang malalim at magpokus>Tumangging magtanghal+Tumakas mula sa entablado at umuwi na lamang<Mainis sa sarili",
"Paano mo maipapakita ang tiwala sa sarili kapag may panggrupong proyekto?=Makipagtulungan nang lubos sa mga kasama>Mag-utos lamang sa mga kagrupo+Umiwas sa mga mabibigat na gawain sa proyekto<Sumalungat sa mga ideya ng karamihan",

);

?>

</head>

</bod

</html>