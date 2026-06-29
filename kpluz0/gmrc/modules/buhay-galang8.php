<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paggalang sa Sariling Buhay - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paggalang sa Sariling Buhay";
$_SESSION['tnum']="*83";

$questions=array(

"Alin sa mga sumusunod ang nagpapakita ng paggalang sa sariling buhay?=Pagkain ng masustansyang pagkain>Pagpupuyat sa panonood ng mga bidyo+Pagsuway sa magulang<Pakikipag-away sa kapwa",
"Alin sa mga sumusunod ang hindi isa sa mga dahilan kung bakit mahalaga ang sapat na oras ng pagtulog sa isang bata?=Para maging mapurol ang kanyang isip>Para lumakas ang kanyang katawan+Para hindi siya madaling magkasakit<Para maging maayos ang kanyang paglaki",
"Alin sa mga sumusunod ang karaniwang epekto ng paninigarilyo sa isang tao?=Problema sa paghinga o sakit sa baga>Positibong pananaw sa buhay+Mas malusog na katawan<Mas matalas na isip",
"Paano mo maipapakita ang paggalang sa iyong katawan?=Sa pamamagitan ng pag-iwas sa droga at alak>Sa pamamagitan ng pagsusuot ng maruming damit+Sa pamamagitan ng madalas na pagkain ng tsitsirya<Sa pamamagitan ng pagpunta sa mga mapanganib na lugar",
"Ano ang dapat mong gawin kung may nanghihikayat sa iyong sumubok uminom ng alak?=Tumanggi at lumayo>Uminom bilang pakikisama+Tumikim ng kahit kaunti lamang<Makipag-away sa kanya",
"Alin sa mga sumusunod ang makakatulong sa pagpapalusog ng iyong katawan?=Mga prutas at gulay>Mga matamis na panghimagas+Mga maalat at mamantikang pagkain<Mga tsitsirya",
"Ano ang pangunahing dahilan ng pag-iwas sa ipinagbabawal na gamot?=Para mapanatiling malusog ang katawan at isipan>Para makatulog nang mahimbing sa gabi+Para hindi mapagalitan ng guro<Para hindi mahuli ng pulis",
"Bakit kailangang iwasan ang masamang barkada?=Para hindi ka mahikayat sa masamang bisyo>Dahil magastos sila+Dahil masyado silang maingay<Para hindi ka madalas lumabas",
"Ang pagkain ng masustansyang pagkain, pagkakaroon ng sapat na tulog, at regular na pag-eehersisyo ay mga elemento ng alin sa mga sumusunod na paraan upang maingatan ang sarili?=Malusog na pamumuhay>Pag-iwas sa masasamang bisyo+Pagpapahalaga sa kaligtasan<Pagtangkilik sa malinis na kaisipan",
"Ang hindi pag-inom ng alak, pag-iwas sa paninigarilyo, at pagtanggi sa ipinagbabawal na gamot ay mga halimbawa ng alin sa mga sumusunod na paraan upang maingatan ang sarili?=Pag-iwas sa masasamang bisyo>Malusog na pamumuhay+Pagpapahalaga sa kaligtasan<Pagtangkilik sa malinis na kaisipan",
"Alin sa mga sumusunod na paraan upang maingatan ang sarili ang kinabibilangan ng pagsunod sa mga alituntunin upang maiwasan ang sakuna at panganib?=Pagpapahalaga sa kaligtasan>Pag-iwas sa masasamang bisyo+Malusog na pamumuhay<Pagtangkilik sa malinis na kaisipan",
"Alin sa mga sumusunod na paraan upang maingatan ang sarili ang tumutukoy sa pagpili lamang ng positibo at makabuluhang babasahin o panoorin at pag-iwas sa mga marahas o hindi angkop na nilalaman?=Pagtangkilik sa malinis na kaisipan>Pag-iwas sa masasamang bisyo+Malusog na pamumuhay<Pagpapahalaga sa kaligtasan",
"Alin sa mga sumusunod ang dapat mong gawin upang maging ligtas ka sa paaralan?=Sumunod sa mga patakaran>Tumakbo sa hallway+Maglaro sa silid-aralan<Mang-away ng kaklase",
"Alin sa mga sumusunod ang dapat mong gawin upang mapapanatili ang iyong kaligtasan sa bahay?=Sumunod sa mga paalala ng magulang>Mag-iwan ng nakasinding apoy sa kusina+Paglaruan ang saksakan ng kuryente<Makipaghabulan sa loob ng bahay",
"Alin sa mga sumusunod ang dapat mong pananaw sa regular na pag-eehersisyo?=Nakakatulong ito sa kalusugan>Nakakapagod ito kaya dapat iwasan+Pag-aaksaya lang ito ng oras<Para lang ito sa matatanda",
"Ano ang dapat mong gawin kapag nakakaramdam ka ng sama ng loob o lungkot?=Manalangin at makipag-usap sa pinagkakatiwalaang tao>Kumain nang madalas at marami+Isisi ang nararamdaman sa iba<Magkulong sa loob ng kuwarto",
"Alin sa mga sumusunod ang kahulugan ng 'pagpapahalaga sa sarili?'=Pagtanggap at pag-aalaga sa sarili>Pagyayabang ng sarili sa iba+Pagiging makasarili<Pagpapayaman",
"Alin sa mga sumusunod ang hindi isa sa mga paraan upang maipakita ang pananampalataya sa Diyos araw-araw?=Pagsisinungaling>Pagdarasal+Paggawa ng mabuti<Paggalang sa kapwa",
"Paano mo maipapakita ang paggalang sa buhay ng iba?=Sa pamamagitan ng pagmamalasakit sa kapwa>Sa pamamagitan ng pagsuway sa batas+Sa pamamagitan ng pagkakalat sa paligid<Sa pamamagitan ng pag-iwas sa mga proyekto ng komunidad",
"Ang pagiging disiplinado ay isang anyo ng alin sa mga sumusunod?=Paggalang sa sarili>Pagiging makasarili+Pagiging makapangyarihan<Pagiging iresponsable",
"Bakit mahalaga ang pagpili ng positibong midya lamang?=Upang mapanatiling malinis ang isip at damdamin>Upang maging sikat sa social media+Para makakuha ng papuri mula sa iba<Para hindi mapagalitan ng mga magulang",
"Alin sa mga sumusunod na gawain ang hindi nagpapalalim ng ugnayan sa Diyos?=Paglalakbay ng isip habang nasa misa>Pananalangin+Pagninilay sa mga aral ng Bibliya<Paggawa ng kabutihan sa kapwa",
"Alin sa mga sumusunod ang hindi nagpapakita ng paggalang sa sariling buhay?=Paglalaro sa mapanganib na paraan>Pagkain ng gulay at prutas+Paglahok sa mga ligtas na pisikal na aktibidad<Pag-iwas sa pagpupuyat",
"Alin sa mga sumusunod ang dapat mong gawin kapag may taong nakasakit ng damdamin mo?=Magpatawad at magdasal>Magtanim ng galit sa kanya+Gumanti sa kanya<Umiwas sa kanya habambuhay",
"Alin sa mga sumusunod na asal ang dapat taglayin upang makaiwas sa kapahamakan?=Mahusay na paghuhusga>Pagiging pabaya+Pagtatapang-tapangan<Pagiging pasaway",

);

?>

</head>

</bod

</html>