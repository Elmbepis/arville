<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagkilala sa mga Likhang-Sining - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagkilala sa mga Likhang-Sining";
$_SESSION['tnum']="*5p";

$questions=array(

"Paano mo maipapakita ang pagmamahal sa ating bansa sa pamamagitan ng iyong mga personal na gamit?=Paglalagay ng mga disenyong Pilipino sa mga ito>Paglalagay ng mga larawan ng mga paborito mong artista sa mga ito+Paglalagay ng mga banyagang disenyo sa mga ito<Paglalagay ng mga inangkat na aksesorya sa mga ito",
"Ano ang unang hakbang sa pagpapahalaga sa mga likhang-sining ng ating bansa?=Pagkilala sa mga ito>Pagsasabit ng mga ito sa bahay+Pagbili ng mga ito<Pagbebenta ng mga ito bilang hanapbuhay",
"Alin sa mga sumusunod ang kilalang likhang-sining ng mga Ilokano sa Hilagang Luzon?=Telang inabel>Telang inabal+Okir na ukit sa kahoy<Malong",
"Alin sa mga sumusunod ang kilalang likhang-sining ng mga Maranao?=Okir na ukit sa kahoy>Banig na buri+Telang inabel<Malong",
"Alin sa mga sumusunod ang kilalang likhang-sining ng mga Bagobo sa Mindanao?=Telang inabal>Telang inabel+Okir na ukit sa kahoy<Malong",
"Alin sa mga paraang ito ng pagpapaunlad ng sining ng ating bansa ang tumutukoy sa pag-alam ng mga istilo ng sining mula sa iba't ibang rehiyon ng ating bansa?=Pag-aaral ng tradisyunal na disenyo>Kontemporaryong paglikha gamit ang mga lokal na materyales+Paggamit ng likhang sining sa pang-araw-araw na buhay<Pagbabahagi ng kaalaman sa iba",
"Alin sa mga paraang ito ng pagpapaunlad ng sining ng ating bansa ang tumutukoy sa paggawa ng mga bagay na masining gamit ang abaka, kawayan, buri, o rattan?=Kontemporaryong paglikha gamit ang mga lokal na materyales>Pag-aaral ng tradisyunal na disenyo+Paggamit ng likhang sining sa pang-araw-araw na buhay<Pagbabahagi ng kaalaman sa iba",
"Ang pagsusuot ng damit na may disenyong etniko at paggamit ng bag o payong na may tradisyunal na 'motif' ay mga halimbawa ng alin sa mga paraang ito ng pagpapaunlad ng sining ng ating bansa?=Paggamit ng likhang sining sa pang-araw-araw na buhay>Pag-aaral ng tradisyunal na disenyo+Kontemporaryong paglikha gamit ang mga lokal na materyales<Pagbabahagi ng kaalaman sa iba",
"Ang pag-oorganisa ng 'workshop' sa komunidad upang magturo ng tradisyunal na paghahabi o pagpipinta ay halimbawa ng alin sa mga paraang ito ng pagpapaunlad ng sining ng ating bansa?=Pagbabahagi ng kaalaman sa iba>Pag-aaral ng tradisyunal na disenyo+Kontemporaryong paglikha gamit ang mga lokal na materyales<Paggamit ng likhang sining sa pang-araw-araw na buhay",
"Alin sa mga paraang ito ng pagpapaunlad ng sining ng ating bansa ang tumutukoy sa pagpapakita ng mga lokal na likhang sining sa mga eksibit, 'trade fairs,' o maging sa 'social media'?=Pagtatanghal sa mga likhang sining ng ating bansa>Pag-aaral ng tradisyunal na disenyo+Pagbabahagi ng kaalaman sa iba<Paggamit ng likhang sining sa pang-araw-araw na buhay",
"Alin sa mga paraang ito ng pagpapaunlad ng sining ng ating bansa ang tumutukoy sa pagbili ng mga 'handicrafts,' ipinintang larawan, at eskultura sa mga maliliit na negosyo sa iba't ibang rehiyon ng ating bansa?=Aktibong pagtangkilik sa mga likhang sining ng ating bansa>Pag-aaral ng tradisyunal na disenyo+Pagbabahagi ng kaalaman sa iba<Kontemporaryong paglikha gamit ang mga lokal na materyales",
"Alin sa mga sumusunod ang hindi gaanong sinisimbolo o sinasalamin ng mga likhang-sining sa ating bansa?=Husay ng mga Pilipino sa pagluluto>Mga paniniwala at kaisipan ng mga Pilipino+Mga kasanayang pansining ng mga Pilipino<Pagkakaroon ng mga Pilipino ng talento",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagyakap sa ating pambansang kultura?=Pagsusuot ng Amerikana>Paggamit ng malong mula sa Lanao+Paglalagay ng okir na dekorasyon sa tahanan<Pagbili ng banig na buri",
"Bakit kailangan nating gumamit ng mga lokal na materyales sa paglikha ng kontemporaryong sining?=Para mapahalagahan ang mga likas na yaman ng ating bansa>Dahil mahal ang mga ito+Para mabigyan ng suporta ang mga banyagang manlilikha<Dahil mahirap hanapin ang mga ito",
"Alin sa mga sumusunod ang hindi halimbawa ng paggamit ng likhang sining sa pang-araw-araw na buhay?=Pagsasabit ng likha ni Juan Luna sa museo>Pagsusuot ng damit na may disenyong etniko+Paggamit ng bag na may tradisyunal na motif<Pagdadala ng payong na may disenyong okir",
"Alin sa mga sumusunod ang mainam gawin para mapanatili ang mga tradisyon sa sining ng ating bansa?=Pagtuturo sa kapwa ng kaalaman sa tradisyunal na sining ng ating bansa>Pagtangkilik sa mga likhang sining ng mga dayuhan+Paggaya sa mga tradisyon sa sining ng mga ibang bansa<Pagbabahagi ng kaalaman sa kasaysayan ng ating bansa",
"Alin sa mga sumusunod ang pinakamainam gawin upang ipakilala sa buong mundo ang galing ng mga Pilipino sa sining?=Pagtatanghal ng kanilang mga likha sa mga eksibit, trade fairs, o social media>Pagtatago ng kanilang mga likha sa mga tahanan ng iilang pribadong mamamayan lamang+Pagtatabi ng kanilang mga likha sa mga kaha de yero ng mga museo<Pag-aangkat ng mga likhang sining mula sa ibang bansa",
"Alin sa mga sumusunod ang pinakaepektibong paraan ng pagsuporta sa mga 'local artists' ng Pilipinas?=Aktibong pagbili ng kanilang mga likha>Paghingi ng mga libreng sampol ng kanilang mga likha+Pagrereklamo sa mataas na presyo ng kanilang mga likha<Pagbili ng mga pekeng kopya ng kanilang mga likha",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagpapaunlad ng sining ng ating bansa?=Pag-aangkat ng mga likhang sining ng mga foreign artists>Pag-aaral ng ating mga tradisyunal na disenyo+Paggawa ng mga likhang-sining gamit ang mga lokal na materyales<Pagbabahagi ng kaalaman tungkol sa sining ng ating bansa",
"Bakit dapat nating tangkilikin ang mga produktong gawa ng mga lokal na artesano?=Upang mapanatili ang kanilang kabuhayan at ipagpatuloy nila ang paglikha>Dahil mas mura ang kanilang mga likha kumpara sa mga likha ng mga banyaga+Upang yumaman na sila at makatigil na sila sa paglikha<Dahil ipinagbabawal ang pagbili ng mga likha ng mga foreign artists",
"Alin sa mga sumusunod ang malamang na maging bunga ng pagtatanghal at pagpapalaganap ng mga likhang-sining mula sa iba't ibang rehiyon ng ating bansa?=Pagtataguyod ng pambansang pagkakakilanlan sa sining>Pagkawala ng interes sa mga likhang sining sa ating bansa+Pagbagsak ng presyo ng mga likhang sining sa ating bansa<Pagbaba ng respeto sa mga local artists sa ating bansa",
"Ano ang ibinibigay sa atin ng mga simbolismo sa likod ng mga tradisyunal na disenyo?=Kaugnayan ng mga tradisyunal na disenyo sa ating kultura at mga paniniwala>Kalituhan sa ibig sabihin ng mga disenyo+Pagtatantong walang kaugnayan ang mga tradisyunal na disenyo sa pag-iisip ng ating mga ninuno<Kaugnayan ng mga disenyo sa mga nagaganap sa kasalukuyan",
"Alin sa mga sumusunod ang hindi kabilang sa mga karaniwang itinuturo sa mga 'art workshop' sa komunidad o paaralan?=Pagluluto ng mga tradisyunal na putahe>Pag-ukit ng mga kahoy at bato+Paggawa ng mga dekorasyon<Mga istilo o teknik ng pagpipinta",
"Alin sa mga sumusunod ang hindi kabilang sa mga lokal na materyales na ginagamit sa paggawa ng mga tradisyunal na likhang sining?=Plastik>Kawayan+Rattan<Abaka",
"Alin sa mga sumusunod ang hindi dapat gawin sa mga produktong lokal na may tradisyunal na disenyo?=Palitan ang tradisyunal na disenyo nito ng banyagang disenyo>Tangkilikin o bilhin ang mga ito+Itanghal ang mga ito sa mga eksibit at trade fairs<Ipasa ang kaalaman tungkol sa mga ito sa susunod na henerasyon",

);

?>

</head>

</bod

</html>