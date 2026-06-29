<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapamaraan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapamaraan";
$_SESSION['tnum']="*8c";

$questions=array(


"Ano ang ibig sabihin ng pagiging mapamaraan?=Kakayahang makahanap ng solusyon sa kabila ng mga limitasyon>Pagkakaroon ng sapat na yaman para makagawa ng solusyon+Kakayahang makahanap ng solusyon sa mga simpleng problema lamang<Pagkakaroon ng positibong pananaw kahit may problema",
"Ano ang pangunahing layunin ng pagbuburo ng pagkain?=Upang mapatagal ang buhay ng pagkain>Upang mapasarap ang pagkain+Upang gawing mas makulay ang pagkain<Upang maging mainit ang pagkain",
"Alin sa mga sumusunod ang halimbawa ng binurong pagkain?=Atchara>Tinapay+Pansit<Sinangag",
"Alin sa mga sumusunod na sangkap ang karaniwang ginagamit sa pagbuburo?=Suka at asin>Mantika at toyo+Gatas at asukal<Paminta at bawang",
"Sa pagiging mapamaraan, alin sa mga sumusunod na bagay ang pinakamainam gamitin bilang pamalit sa paso?=Lumang bote o lata>Mamahaling vase+Bagong palanggana<Kartong kahon",
"Alin sa mga sumusunod na gawaing mapamaraan ang tumutukoy sa pag-aalaga ng kangkong, kamatis, talong, at iba pang gulay sa isang maliit na espasyo sa tahanan?=Pagtatanim sa bakuran>Pagbuburo ng pagkain+Paggamit ng alternatibong sangkap<Pagpaplano ng menu",
"Alin sa mga sumusunod na gawaing mapamaraan ang tumutukoy sa isang anyo ng preserbasyon ng pagkain?=Pagbuburo>Pagtatanim sa bakuran+Paggamit ng alternatibong sangkap<Pagpaplano ng menu",
"Ang paglalagay ng tokwa sa halip ng karne sa niluluto ay isang halimbawa ng alin sa mga sumusunod na gawaing mapamaraan?=Paggamit ng alternatibong sangkap>Pagbuburo ng pagkain+Pagtatanim sa bakuran<Pagpaplano ng menu",
"Alin sa mga sumusunod na gawaing mapamaraan ang tumutukoy sa pagtatakda ng mga lulutuin para sa susunod na buong linggo upang makatipid?=Pagpaplano ng menu>Pagbuburo ng pagkain+Paggamit ng alternatibong sangkap<Pagtatanim sa bakuran",
"Alin sa mga sumusunod na gawaing mapamaraan ang tumutukoy sa pagsasahog ng mga gulay o prutas na kasalukuyang mababa ang presyo sa palengke dahil mataas ang suplay ng mga ito?=Paggamit ng mga napapanahong ani>Pagbuburo ng pagkain+Pagpaplano ng menu<Pagtatanim sa bakuran",
"Alin sa mga sumusunod ang hindi kabilang sa mga tradisyunal na paraan ng pag-iimbak o pagprepreserba ng pagkain?=Pagpapakulo>Pagbuburo+Pag-aasin<Pagmamatamis",
"Alin sa mga sumusunod na gawaing makakalikasan at mapamaraan ang tumutukoy sa pag-aalaga ng mga halaman nang hindi gumagamit ng mga patabang hindi likas o pestisidyong kemikal?=Organikong paghahardin>Pag-iimbak ng pagkain+Pagreresiklo<Pag-iingat sa tubig",
"Ang pagbuburo, pag-aasin, at pagmamatamis ay mga halimbawa ng alin sa mga sumusunod na gawaing makakalikasan at mapamaraan?=Pag-iimbak ng pagkain>Organikong paghahardin+Pagreresiklo<Paggamit ng natural na abono",
"Ang paggamit ng mga lumang lata ng biskwit para gumawa ng mga taniman ng halaman ay halimbawa ng alin sa mga sumusunod na gawaing makakalikasan at mapamaraan?=Pagreresiklo>Organikong paghahardin+Pag-iimbak ng pagkain<Paggamit ng natural na abono",
"Ang paglalagay ng 'vermicast' o 'vermicompost' sa lupa ay halimbawa ng alin sa mga sumusunod na gawaing makakalikasan at mapamaraan?=Paggamit ng natural na abono>Pag-iingat sa tubig+Pag-iimbak ng pagkain<Pagreresiklo",
"Alin sa mga sumusunod ang hindi kabilang sa mga nauuso at abot-kayang teknik sa pagtatanim ng halaman?=Vermiculture>Vertical gardening+Hydroponics<Container gardening",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit mahalaga ang pagtatanim ng gulay sa bakuran?=Upang sumikat sa komunidad>Upang makatipid+Upang magkaroon ng masustansyang pagkain<Upang masubukan ang pagiging maparaan",
"Sa halip ng gatas na de lata, anong alternatibong sangkap ang maaaring gamitin sa pagluluto?=Ginatasang niyog>Mantikilya+Toyo<Suka",
"Alin sa mga sumusunod ang pangunahing layunin ng pagpaplano ng menu ng pamilya para sa isang buong linggo?=Pag-iwas sa pagbili ng labis na sangkap>Pagpapakita ng kakayahang gumastos+Pang-iinggit ng mga kapitbahay<Pagpapasarap ng mga lutuin",
"Bakit mahalagang gumamit ng mga lokal na produktong napapanahon ang pag-aani?=Mas mura ang mga ito sa palengke>Mas masarap ang mga ito+Mas matagal masira ang mga ito<Mas madaling lutuin ang mga ito",
"Ang 'vermicast' ay isang uri ng organikong abonong nagmumula sa alin sa mga sumusunod?=Dumi ng bulate>Dumi ng manok+Nabubulok na gulay<Nabubulok na karne",
"Anong teknik sa pagtatanim ang nababagay sa masisikip na lugar?=Vertical gardening>Flat farming+Aquaponics<Wide bed planting",
"Ang organikong paghahardin ay nakatutulong sa kalikasan sa paanong paraan?=Pag-iwas sa paggamit ng mga kemikal>Pagdadagdag ng basurang di-nabubulok+Pag-iwas sa paggamit ng tubig<Paggamit ng mga sintetikong abono at pestisidyo",
"Alin sa mga sumusunod ang pangunahing layunin ng pagbabahagi ng mga mapamaraang kaalaman sa mga kapamilya at kapitbahay?=Para mapakinabangan nila ang mga ito>Para makakuha ng papuri mula sa kanila+Para makahingi ng pabor mula sa kanila<Para hindi sila magalit",
"Ano ang pangunahing benepisyo ng container gardening?=Makapagtanim kahit maliit ang espasyo>Makapagtanim ng mga dambuhalang halaman+Makatipid sa pag-aalaga ng mga tanim<Masabayan ang pag-aalaga ng mga hayop",

);

?>

</head>

</bod

</html>