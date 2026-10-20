<html>
<head>
<body>

<?php
$_SESSION['title']="Paglahok ng Iba't Ibang Rehiyon at Sektor sa Pakikibaka";

$questions=array(

"Ang Conspiracy of the Maharlikas, na kilala rin bilang Tondo Conspiracy, ay tumutukoy sa nabigong plano ng ilang mayayamang Pilipinong mag-alsa laban sa mga Espanyol.=tama>mali",
"Ang mga Ilokano, Ibanag, at iba pa ay naglunsad ng pag-aalsa dahil sa pagmamalabis ng mga conquistadores na nananakit, nang-aabuso, at nagpapataw ng mataas na buwis sa mga Pilipino.=tama>mali",
"Noong 1603, mahigit kumulang 30,000 Tsinong mangangalakal, pinuno, at mayayaman ang pinatay ng mga Espanyol. Ito ang naging dahilan ng pag-aalsa ng mga Instik mula Legarda at Binondo laban sa mga Espanyol.=tama>mali",
"Si Gregoria De Jesus ang tinaguriang 'Lakambini ng Katipunan'.=tama>mali",
"Si Marcela Agoncillo ang tinaguriang 'Ina ng Watawat ng Pilipinas'.=tama>mali",
"Si Melchora Aquino ang tinaguriang 'Ina ng Biak-na-Bato'.=mali>tama",
"Si Trinidad Tecson ang tinaguriang 'Lakambini ng Katipunan'.=mali>tama",
"Ang mga kababaihan ay walang naging mahalagang gampanin noong panahon ng rebolusyon.=mali>tama",
"Ang Katipunan ay binuo nina Andres Bonifacio para lamang sa mga kalalakihan.=mali>tama",
"Si Melchora Aquino ang kauna-unahang kalihim ng Katipunan.=mali>tama",

"Sino sa mga sumusunod ang kinikilala bilang 'Ina ng Biak-na-Bato'?=Trinidad Tecson>Gabriela Silang+Gregoria De Jesus<Melchora Aquino",
"Sino sa mga sumusunod ang binansagang 'Joan of Arc' ng kabisayaan na sumisimbolo sa kanyang katapangan at kahusayan?=Teresa Magbanua>Esperidiona Bonifacio+Patrocinio Gamboa Y Villareal<Trinidad Tecson",
"Sino sa mga sumusunod ang nagsilbing taga-ingat ng mga mahahalagang kasulatan ng Katipunan?=Gregoria De Jesus>Melchora Aquino+Trinidad Tecson<Gabriela Silang",
"Sino sa mga sumusunod ang pangunahing tagahabi ng una at opisyal na watawat ng Pilipinas?=Marcela Agoncillo>Patrocinio Gamboa Y Villareal+Josefa Rizal<Trinidad Tecson",
"Alin sa mga sumusunod ang rebolusyon laban sa mga Espanyol noong 1567 na pinamunuan ng pinuno ng Gabi (Palo sa kasalukuyan)?=Dagami Revolt>Caquenga Revolt+Conspiracy of the Maharlikas<Magalat Revolt",
"Sino sa mga sumusunod ang nagbukas ng kaniyang tahanan para sa pagtitipon ng mga katipunero at siya ring naging tagagamot sa mga sugatang miymebro ng katipunan?=Melchora Aquino>Trinidad Tecson+Gregoria De Jesus<Gabriela Silang",
"Kilala sa pakikipaglaban sa Bulacan, si ____ ay tinagurian din bilang 'Ina ng Biak-Na-Bato'.=Trinidad Tecson>Teresa Magbanua+Gregoria de Jesus<Marcela Agoncillo",
"Kilala bilang 'Florence Nightingale ng Panay', ginamit ni ____ ang kanilang ari-arian upang magtaguyod ng ospital at imbakan ng pagkain para sa mga rebolusyonaryo.=Nazaria Lagos>Trinidad Tecson+Teresa Magbanua<Gregoria P. Montoya",
"Si ____ na binansagang 'Bayani ng Jaro' ay nakilala dahil sa kanyang pagtahi ng bandila para sa mga rebeldeng Bisaya.=Patrocinio Gamboa>Teresa Magbanua+Nazaria Lagos<Trinidad Tecson",
"____ ang pangalan ng kapatid ni Jose Rizal na naglingkod bilang pangulo ng lupon ng mga kababaihan sa Katipunan.=Josefa>Josephine+Juanita<Juana",
"Sino sa mga sumusunod ang babaeng naging tanyag dahil sa kanyang pamumuno sa tatlumpung kalalakihan ng Magdalo noong himagsikan?=Gregoria P. Montoya>Josefa Rizal+Teresa Magbanua<Gregoria de Jesus",
"Sino sa mga sumusunod ang nakilala bilang tagabili sa Maynila ng mga materyales at balang ginamit ng mga Katipunero sa pakikidigma?=Agueda Esteban>Esperidiona Bonifacio+Patrocinio Gamboa<Trinidad Tecson",
"Sino sa mga sumusunod ang asawa ni Teodoro Plata na isa rin sa mga nagtatag ng Katipunan?=Esperidiona Bonifacio>Patrocinio Gamboa+Josefa Rizal<Trinidad Tecson",
"Sino sa mga sumusunod ang isa sa mga unang babaeng pinuno sa himagsikan laban sa mga Kastila na nakilala sa kanyang pamumuno sa 'Ilocano Independence Movement'?=Gabriela Silang>Gregoria De Jesus+Trinidad Tecson<Nazaria Lagos",
"Ang ____ Revolt ay isang rebolusyong panrelihiyon ng mga ____ laban sa mga Espanyol noong 1601 nang sila ay pagtangkaang binyagan ng mga Espanyol bilang Kristiyano.=Igorot>Lumad+Aeta<Mangyan",
"Ang ____ Revolt ay isang pag-aalsang panrelihiyon sa isla ng Bohol noong 1621, na pinangunahan ng isang babaylan o katutubong pari.=Tamblot>Dagami+Igorot<Itneg",
"Ang ____ Revolt ay isang pag-aalsang panrelihiyon laban sa mga Espanyol mula 1625 hanggang 1627 na pinamunuan nina Miguel Lanab at Alababan, na parehong galing sa tribong ____.=Itneg>Lumad+Igorot<Mangyan",
"Ang kauna-unahang Pampanga Revolt, na sumiklab dahil sa mga pang-aabuso ng mga encomienderos sa mga Kapampangan, ay naganap noong ____.=1585>1545+1625<1665",
"Ang mag pag-aalsa ng ____ at ____ ay isinagawa bilang paglaban sa pagbabayad ng 'tribute' ng mga Pilipino sa mga nasabing lugar noong 1589.=Cagayan, Ilocos Norte>Cagayan, Pampanga+Pampanga, Ilocos Norte<Pampanga, Nueva Ecija",
"Ang Sumuroy Revolt, na pinamunuan ng Waray na si Agustin Sumuroy, ay sumiklab sa Silangang Visayas noong ____ bilang paglaban sa pagpapatupad ng mga Espanyol ng 'polo y servicio' o sistema ng sapilitang paggawa.=1649>1629+1589<1669",

);
?>

</head>

</body>

</html>