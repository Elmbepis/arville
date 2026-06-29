<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paggalang sa mga 'Endangered Species' - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paggalang sa mga 'Endangered Species'";
$_SESSION['tnum']="*8q";

$questions=array(

"Bakit mahalaga ang pagpepreserba sa mga 'endangered species' sa daigdig?=Upang mapanatili ang balanse ng mga ekosistema>Dahil magandang tingnan at masarap alagaan ang mga ito+Upang hindi bumilis ang pagtaas ng temperatura ng mundo<Dahil mahal ang mga ito kung ipagbibili sa mga siyentipiko",
"Alin sa mga sumusunod ang malamang na mangyari kung tuluyan nang malilipol ang mga 'endangered species' sa mundo?=Pagkabuwag ng mga ekosistema at pagkamatay ng mas marami pang nilalang>Pagtaas ng populasyon ng ibang mga nilalang na naiwan+Lalong paglusog ng kalikasan dahil wala na ang mga endangered species<Pagdami ng mga bagong species sa mundo",
"Alin sa mga sumusunod ang unang hakbang sa pagtatanggol ng mga 'endangered species'?=Pagbibigay ng kaalaman sa mga tao tungkol sa mga endangered species>Pagdalo sa mga rally at protesta laban sa pagpapabaya sa kalikasan+Pagbili ng mga souvenir na gawa sa mga bahagi ng mga endangered species<Pagpapakalat sa ating mga kagubatan ng mga hayop at halamang hindi katutubo",
"Alin sa mga sumusunod ang hindi kabilang sa mga lokal na hayop na talagang nanganganib nang maubos?=Philippine sailfin lizard>Philippine eagle+Tamaraw<Philippine mouse-deer",
"Alin sa mga sumusunod ang dapat gawin ng lahat upang makatulong sa pagpoprotekta ng mga endangered species?=Hindi pagbili o pagbebenta ng mga produktong gawa sa anumang bahagi ng isang endangered species>Pagtatapon ng basura sa mga anyong-tubig+Pagpuputol ng malalaking puno sa mga kagubatan<Labis na pagkonsumo ng mga likas na yaman",
"Alin sa mga sumusunod ang hindi kabilang sa mga pang-araw-araw na gawing makakatulong sa pangangalaga ng mga nilalang sa daigdig?=Pagsakay sa mausok na dyip o bus>Wastong pamamahala at pagtatapon ng basura+Pagtitipid ng tubig<Pagtitipid ng kuryente",
"Alin sa mga sumusunod ang malamang na mangyari kung tuluyang mawala ang isang pangunahing 'pollinator'?=Pagbagal ng reproduksiyon at pagkawala ng ilang uri ng halaman>Mabilis na pagdami ng mga hayop+Pagtaas ng temperatura ng daigdig<Mas magandang balanse ng mga nilalang sa mga ekosistema",
"Alin sa mga sumusunod ang benepisyong makukuha natin kung mapipigilan natin ang pagkalipol ng mga 'endangered species'?=Katiyakang ang mga proseso sa mga ekosistema ay patuloy na gagana>Katiyakang hindi tayo mauubusan ng malinis at sariwang tubig+Pagbabalik ng mga species na dati nang nalipol<Pagpigil sa pagbabago ng klima ng daigdig",
"Ano ang dapat mong gawin kung makasaksi ka ng ilegal na pagbebenta ng isang 'endangered species'?=Iulat ito sa barangay o sa DENR>Bumili rin para may maalagaan sa bahay+Huwag itong pansinin para hindi mapahamak<Makipag-away sa nagbebenta",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagiging responsableng turista?=Pangunguha ng mga ilang na orchid sa gubat>Paggalang sa mga tirahan ng hayop+Hindi pagbili ng souvenir na gawa sa alinmang endangered species<Pagsunod sa mga patakaran ng lugar",
"Alin sa mga sumusunod ang hindi kabilang sa mga maaari nating gawin upang suportahan ang isang organisasyong nagtatanggol sa kalikasan?=Paggawa ng isang vlog na mapanira sa kanila>Pagboboluntaryo upang magsilbi sa kanilang opisina+Pag-aambag ng pera o gamit sa kanila<Pagsusulong ng kanilang adbokasiya sa social media",
"Alin sa mga sumusunod ang hindi kabilang sa mga maaari nating gawin upang makapagtaguyod ng 'wildlife-friendly' na komunidad?=Pangunguha ng mga itlog sa mga pugad ng ibon>Pagtatanim ng mga katutubong halamang umaakit sa mga lokal na ibon at insekto+Paglalagay ng mga makakain at maiinom ng mga hayop sa labas ng bahay<Pangangalaga sa mga puno sa komunidad",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat nating gawin upang mabawasan ang sarili nating 'carbon footprint'?=Paggamit ng mausok na sasakyan>Matipid na pagkonsumo ng mga produkto+Matalinong pamamahala ng basura<Pag-iwas sa pag-aaksaya ng tubig at kuryente",
"Alin sa mga sumusunod ang hindi maituturing na elemento ng 'sustainable living'?=Labis na pagbili ng mga produktong balot na balot sa plastik>Paggamit ng mga bagay na reusable+Paggamit ng mga bumbilyang LED<Pagreresiklo ng mga basurang hindi nabubulok",
"Ang pagsusumbong sa DENR kapag nakasaksi ng ilegal na pagbebenta ng mga hayop ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pag-uulat sa mga awtoridad>Pagiging responsableng turista+Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan<Pagpapalaganap ng kamalayan",
"Ang paggalang sa mga tirahan ng mga hayop kapag bumibisita sa mga likas na tanawin ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pagiging responsableng turista>Pag-uulat sa mga awtoridad+Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan<Pagpapalaganap ng kamalayan",
"Ang pagsunod sa mga patakarang pangkalikasan ng mga binibisitang lugar ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pagiging responsableng turista>Pag-uulat sa mga awtoridad+Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan<Pagpapalaganap ng kamalayan",
"Ang pagboboluntaryo ng serbisyo o pag-aambag ng pera sa isang grupong nagbibigay ng proteksyon sa mga pawikan ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan>Pag-uulat sa mga awtoridad+Pagiging responsableng turista<Pagpapalaganap ng kamalayan",
"Ang pagbabahagi sa komunidad ng impormasyon tungkol sa paggalang sa buhay ng mga 'endangered species' ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pagpapalaganap ng kamalayan>Pag-uulat sa mga awtoridad+Pagiging responsableng turista<Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan",
"Ang pagtatanim sa inyong lugar ng mga halamang katutubong umaakit sa mga lokal na ibon at insekto ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pagtataguyod ng isang komunidad na wildlife-friendly>Pagbabawas ng sariling carbon footprint+Pagiging responsableng turista<Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan",
"Ang matipid na pagkonsumo ng mga produkto, likas na yaman, at enerhiya ay anyo ng halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga 'endangered species'?=Pagbabawas ng sariling carbon footprint>Pagtataguyod ng isang komunidad na wildlife-friendly+Pagiging responsableng turista<Pagsuporta sa mga organisasyong nagtatanggol sa kalikasan",
"Bakit hindi dapat tayo bumili ng mga 'souvenir' na gawa sa mga bahagi ng 'endangered species'?=Dahil nakahihikayat ito ng pangangaso ng endangered species>Dahil mahal ang mga ito kaya hindi sulit bilhin+Dahil madaling masira ang mga ito<Dahil hindi kasingganda ng mga ito ang mga tradisyunal na souvenir",
"Alin sa mga sumusunod ang pangunahing dahilan kung bakit dapat tayong gumamit ng mga organikong pataba at pamamaraan sa ating paghahalaman?=Upang maiwasan ang pagkalason ng lupa at tubig>Upang makatipid sa mga gastusin+Para bumilis ang paglaki ng mga halaman<Para mapadali ang paggawa at hindi mapagod",
"Bakit kailangan nating alamin ang mga 'endangered species' sa ating sariling lugar?=Para maibigay natin sa kanila ang angkop na proteksyon>Para makapili tayo ng aalagaan sa bahay+Para madali natin silang mahuli at maibenta<Para maituro natin sila sa mga mangangaso",
"Alin sa mga sumusunod ang hindi mo dapat gawin upang mapalaganap sa inyong komunidad ang kamalayan tungkol sa pagtatanggol sa mga 'endangered species'?=Pagpapakalat ng pekeng balita>Pagbabahagi ng mga flyer sa mga tao+Pagbibigay ng presentasyon sa madla<Pagpapalabas ng vlog sa social media",

);

?>

</head>

</bod

</html>