<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mabuting Katiwala - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mabuting Katiwala";
$_SESSION['tnum']="*a4";

$questions=array(

"Alin sa mga sumusunod ang dapat mong unang gawin bago ka sumali sa malalaking proyektong pangkalikasan?=Magbawas ng sarili mong pagkonsumo>Magtayo ng isang maliit na recycling center+Magbigay ng donasyon sa isang organisasyon na pangkalikasan<Magtapos sa kursong Environmental Science",
"Alin sa mga sumusunod ang hindi kabilang sa mga proyektong pangkalikasan na maaaring simulan ng isang estudyanteng tulad mo?=Pagtatayo ng isang malaking pabrikang nagreresiklo ng mga itinapong kagamitan>Pagtatatag ng isang collection drive para sa recyclable materials+Pag-oorganisa ng isang clean-up drive sa inyong pamayanan<Pagatatanim ng mga puno sa mga bakanteng lote kasama ang mga kaibigan",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit ang pagtugon sa mga isyung pangkalikasan ay tungkol din sa pagpoprotekta ng sarili nating kinabukasan?=Dahil ang pagtugon sa mga isyung pangkalikasan ay para lamang sa mga mayayamang bansa>Dahil ang climate change ay maaaring magdulot ng taggutom at malalakas na kalamidad+Dahil ang pakatunaw ng mga yelo sa daigdig ay magpapalubog ng maraming komunidad sa mundo<Dahil ang paglala ng polusyon at pag-init ng daigdig ay maaaring mauwi sa pagkalipol ng sari-saring mga hayop at halamang pinakikinabangan natin",
"Alin sa mga sumusunod ang hindi kabilang sa mga aktibidad na akma at mainam gawin ng isang eco-advocacy group para maisulong ang pangangalaga ng kalikasan?=Basketball tournament>Climate change poster-making contest+Waste management quiz bee<Environmental science fair",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat mong gawin upang maging mabuting katiwala ng kalikasan?=Maghintay lamang sa gobyernong tugunan ang mga isyung pangkalikasan>Magbawas ng sariling basura+Sumali sa mga programang pangkalikasan sa paaralan<Magtanim ng mga puno at halaman sa bakuran",
"Alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan ang sumasaklaw sa pag-iwas sa paggamit ng mga bagay na gawa sa single-use plastic?=Pagbabawas ng sariling basura>Pagsali sa mga programang pangkalikasan+Pag-iwas sa pagsusunog ng basura<Pagko-compost ng nabubulok na basura",
"Ang kusang pakikilahok sa isang 'tree planting project' o 'clean-up drive' ng paaralan o komunidad ay halimbawa ng alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan?=Pagsali sa mga programang pangkalikasan>Pagbabawas ng sariling basura+Pagko-compost ng nabubulok na basura<Pagtitipid sa tubig at kuryente",
"Ang pagtatayo o pagsali sa isang grupong nagsasagawa ng regular na paglilinis ng paaralan, pagreresiklo ng basura, at pagtatanim ng mga halaman ay halimbawa ng alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan?=Pagiging bahagi ng eco-warriors>Pagtitipid sa tubig at kuryente+Pagbabawas ng sariling basura<Pagko-compost ng nabubulok na basura",
"Ang paggawa ng abono sa pamamagitan ng pagpapa-'decompose' ng mga balat ng prutas at gulay sa halip na itapon ang mga ito ay halimbawa ng alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan?=Pagko-compost ng nabubulok na basura>Pagbabawas ng sariling pagkonsumo+Pagsali sa mga programang pangkalikasan<Pagtitipid sa tubig at kuryente",
"Ang magalang na pagpapaliwanag sa isang tao ng masamang epekto sa hangin ng mga mapaminsalang kemikal sa usok ay bahagi ng alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan?=Pag-iwas sa pagsusunog ng basura>Pagko-compost ng nabubulok na basura+Pagsali sa mga online campaign na pangkalikasan<Pagbabawas ng sariling pagkonsumo",
"Ang pagpapaayos ng mga sirang gripo at pagpapatay ng mga ilaw na hindi ginagamit ay halimbawa ng alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan?=Pagtitipid sa paggamit ng tubig at kuryente>Pagsali sa mga online campaign na pangkalikasan+Pag-iwas sa pagsusunog ng basura<Pagreresiklo ng mga patapong materyales",
"Ang paggamit ng social media upang magturo ng mga paraan ng pagbabawas ng pagkonsumo ay halimbawa ng alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan?=Pagsali sa mga online campaign na pangkalikasan>Pagiging bahagi ng eco-warriors+Pagsali sa mga programang pangkalikasan<Pagbabawas ng sariling basura",
"Alin sa mga sumusunod na paraan ng sariling pagtugon sa mga isyung pangkalikasan ang sumasaklaw sa pag-iwas sa pagbili pa ng mga damit at sapatos dahil marami ka pang nagagamit na mga ganito?=Pagbabawas ng sariling pagkonsumo>Pagsali sa mga programang pangkalikasan+Pagtitipid sa tubig at kuryente<Pagreresiklo ng mga patapong materyales",
"Ang pag-iipon ng mga patapong bote, plastik, papel, at lata sa silid-aralan at pagdadala ng mga ito sa isang junk shop ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Pagtatatag ng collection drive para sa mga recyclable materials>Pagko-compost ng nabubulok na basura+Pagsisimula ng isang hardin o gulayan sa paaralan<Pag-oorganisa ng paglilinis sa komunidad",
"Ang paggawa ng mga upuan, mesa, o maliit na pader mula sa mga patapong plastik na bote ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Pagreresiklo ng mga patapong bagay>Pagko-compost ng nabubulok na basura+Pagsisimula ng isang hardin o gulayan sa paaralan<Pag-oorganisa ng paglilinis sa komunidad",
"Ang paghahanap ng bakanteng lote sa paaralan at pagtatanim ng mustasa, kangkong, o sili rito ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Pagsisimula ng isang hardin o gulayan sa paaralan>Pagko-compost ng nabubulok na basura+Pagtatatag ng collection drive para sa mga recyclable materials<Pag-oorganisa ng paglilinis sa komunidad",
"Ang pagsali sa organisasyong gaya ng 'Youth for Environment' at pagsuporta sa mga proyekto nito ay halimbawa ng alin sa mga sumusunod na pagtugon sa mga isyung pangkalikasan?=Pagiging bahagi ng isang grupong pangkalikasan>Pagsali sa mga online campaign na pangkalikasan+Pag-oorganisa ng isang clean-up drive<Pagsuporta sa mga batas na pangkalikasan",
"Ang pagsasama ng mga kaibigan at kapitbahay upang walisin ang kabuuan ng inyong kalye isang beses bawa't buwan ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Pag-oorganisa ng paglilinis sa komunidad>Pagsusulong ng segregation and composting program+Pagtatanim ng mga puno sa mga bakanteng lote<Paglulunsad ng information drive na pangkalikasan sa barangay",
"Ang pamamahagi ng mga leaflet tungkol sa climate change at pagbibigay ng maikling presentasyon tungkol sa pagreresiklo ng basura ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Paglulunsad ng information drive na pangkalikasan>Pagsusulong ng segregation and composting program+Pagtatanim ng mga puno sa mga bakanteng lote<Pag-oorganisa ng paglilinis sa komunidad",
"Ang pagtuturo sa mga kabataan ng paghihiwalay ng mga nabubulok na basura sa mga di-nabubulok na basura para magawang abono ang una ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Pagsusulong ng segregation and composting program>Pagtataguyod ng isang recycling center+Pagtatanim ng mga puno sa mga bakanteng lote<Pag-oorganisa ng paglilinis sa komunidad",
"Ang pakikiusap sa mga may-ari ng mga lupang nakatiwangwang para malagyan ang mga ito ng mangga, papaya, malunggay, o narra ay halimbawa ng alin sa mga sumusunod na proyektong pangkalikasan?=Pagtatanim ng mga puno sa mga bakanteng lote>Pagsusulong ng segregation and composting program+Pagtataguyod ng isang recycling center<Pagsali sa mga online campaign na pangkalikasan",
"Ang pagkakaroon ng kapitbahayang maaliwalas at walang mga kalat na maaaring magdulot ng aksidente at mga pesteng hayop na maaaring magpakalat ng mga sakit ay tumutukoy sa alin sa mga sumusunod na bunga ng pagiging mabuting katiwala ng kalikasan?=Mas malinis at mas ligtas na kapaligiran>Pagkakaisa ng lahat+Pag-unlad ng iyong kamalayan at kasanayan sa pamumuno<Isang mundong matitirhan pa ng susunod na henerasyon",
"Ang pagtutulungan ng bawa't isa sa inyong komunidad para maisakatuparan ang isang layuning pangkalikasan ay tumutukoy sa alin sa mga sumusunod na bunga ng pagiging mabuting katiwala ng kalikasan?=Pagkakaisa ng lahat>Mas malinis at mas ligtas na kapaligiran+Pag-unlad ng iyong kamalayan at kasanayan sa pamumuno<Isang mundong matitirhan pa ng susunod na henerasyon",
"Ang pagtaas ng antas ng iyong kakayahang mamahala, mag-organisa, at manghihikayat ay tumutukoy sa alin sa mga sumusunod na bunga ng pagiging mabuting katiwala ng kalikasan?=Pag-unlad ng iyong kamalayan at kasanayan sa pamumuno>Mas malinis at mas ligtas na kapaligiran+Pagkakaisa ng lahat<Isang mundong matitirhan pa ng susunod na henerasyon",
"Ang pagiging matagumpay sa pagpepreserba at pagkokonserba ng mga likas na yaman ng ating daigdig para magamit pa ang mga ito ng ating mga anak at mga apo ay tumutukoy sa alin sa mga sumusunod na bunga ng pagiging mabuting katiwala ng kalikasan?=Isang mundong matitirhan pa ng susunod na henerasyon>Mas malinis at mas ligtas na kapaligiran+Pagkakaisa ng lahat<Pag-unlad ng iyong kamalayan at kasanayan sa pamumuno"

);

?>

</head>

</body

</html>