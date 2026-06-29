<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pananalig sa Diyos - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pananalig sa Diyos";
$_SESSION['tnum']="*73";

$questions=array(

"Alin sa mga sumusunod na aspeto ng pananalig sa Diyos ang tumutukoy sa matatag na paniniwala sa presensya at kapangyarihan ng Diyos kahit hindi Siya nakikita ng tao?=Pananampalataya>Pagtitiwala+Pag-asa<Pagsunod",
"Alin sa mga sumusunod na aspeto ng pananalig sa Diyos ang nangangahulugang isinusuko natin sa Diyos ang ating mga pangarap, pag-aalala, at mga pangangailangan dahil hindi Niya tayo pababayaan?=Pagtitiwala>Lakas ng loob+Kapayapaan<Pagsunod",
"Alin sa mga sumusunod na aspeto ng pananalig sa Diyos ang tumutukoy sa paniniwalang mayroong mas magandang kinabukasang inilaan ang Diyos para sa atin, anuman ang ating kasalukuyang kalagayan?=Pag-asa>Lakas ng loob+Kapayapaan<Pagsunod",
"Alin sa mga sumusunod na aspeto ng pananalig sa Diyos ang tumutukoy sa pagtutuon ng ating mga desisyon at pagkilos sa pagsasakatuparan ng Kanyang kalooban?=Pagsunod>Lakas ng loob+Kapayapaan<Pag-asa",
"Alin sa mga sumusunod na aspeto ng pananalig sa Diyos ang tumutukoy sa tapang na harapin at malampasan ang anumang pagsubok na dumarating sa ating buhay?=Lakas ng loob>Pagsunod+Kapayapaan<Pag-asa",
"Alin sa mga sumusunod na aspeto ng pananalig sa Diyos ang tumutukoy sa katahimikan ng pag-iisip at kapanatagan ng loob na nag-uugat sa paniniwalang ang Diyos ay laging nariyan upang gabayan at protektahan tayo?=Kapayapaan>Pagsunod+Lakas ng loob<Pag-asa",
"Alin sa mga sumusunod ang kahulugan ng katatagan, na isa sa mga benepisyong nakakamit ng isang tao mula sa kanyang pananampalataya sa Diyos?=Pagiging matibay at hindi pagsuko sa mga pagsubok>Kumpiyansa at tapang na harapin ang mga panganib+Positibong pananaw sa hinaharap<Katahimikan ng pag-iisip at kapanatagan ng loob",
"Alin sa mga sumusunod ang kahulugan ng pag-asa, na isa sa mga benepisyong nakakamit ng isang tao mula sa kanyang pananampalataya sa Diyos?=Positibong pananaw sa hinaharap>Kumpiyansa at tapang na harapin ang mga panganib+Pagiging matibay at hindi pagsuko sa mga pagsubok<Katahimikan ng pag-iisip at kapanatagan ng loob",
"Alin sa mga sumusunod ang kahulugan ng lakas ng loob, na isa sa mga benepisyong nakakamit ng isang tao mula sa kanyang pananampalataya sa Diyos?=Kumpiyansa at tapang na harapin ang mga panganib>Positibong pananaw sa hinaharap+Pagiging matibay at hindi pagsuko sa mga pagsubok<Katahimikan ng pag-iisip at kapanatagan ng loob",
"Alin sa mga sumusunod ang tumutukoy sa positibong pananaw sa hinaharap na nagbibigay ng inspirasyong magpatuloy kahit na may mga pagsubok at paghihirap?=Pag-asa>Lakas ng Loob+Kapayapaan<Pagsunod",
"Alin sa mga sumusunod ang tumutukoy sa pagpapakita ng pananalig sa Diyos sa pamamagitan ng ating mga aksyon?=Pagsunod sa Kanyang mga kautusan>Pagkakaroon ng lakas ng loob+Pagkakaroon ng pag-asa<Pagkakaroon ng tiwala sa Kanya",
"Alin sa mga sumusunod ang tumutukoy sa pananalig ng isang tao sa Diyos kahit wala siyang pisikal na katibayang mayroong Diyos?=Pananampalataya sa Diyos>Pagkakaroon ng lakas ng loob+Pagkakaroon ng pag-asa<Pagsunod sa Kanyang mga kautusan",
"Alin sa mga sumusunod ang mabuting epekto ng matatag na pananalig sa Diyos sa ating kaisipan at damdamin?=Kapayapaan>Pananampalataya+Pagtitiwala<Pagsunod sa Kanyang mga kautusan",
"Alin sa mga sumusunod ang HINDI isa sa mga aspeto ng pananalig sa Diyos?=Pag-aalinlangan>Pananampalataya+Pagtitiwala<Pagsunod",
"Alin sa mga sumusunod ang HINDI isa sa mga aspeto ng pananalig sa Diyos?=Pag-aalala>Lakas ng loob+Pagtitiwala<Pag-asa",
"Alin sa mga sumusunod ang nagbibigay sa atin ng lakas ng loob na harapin ang mga pagsubok sa buhay?=Pananampalataya sa Diyos>Kapayapaan+Pagsunod<Pagbabahagi ng pananampalataya",
"Alin sa mga sumusunod ang nagpapakitang tinatanggap natin ang mga utos ng Diyos bilang gabay sa ating pang-araw-araw na pamumuhay?=Pagsunod>Pag-asa+Lakas ng loob<Pananalangin",
"Alin sa mga aspeto ng pananalig sa Diyos ang sumasaklaw sa pagsuko ng ating mga pangarap, pag-aalala, at mga pangangailangan sa Kanya dahil alam nating hindi niya tayo pababayaan?=Pagtitiwala>Pag-asa+Lakas ng loob<Pagsunod",
"Alin sa mga sumusunod ang tumutugma sa pagkakaroon natin ng kapanatagan kahit na marami tayong problema sa buhay?=Pagkakaroon ng kapayapaan>Pagsunod sa Kanyang mga kautusan+Paniniwalang magiging mas maganda ang hinaharap<Pagsuko ng ating mga pangarap sa Diyos",
"Alin sa mga aspeto ng pananalig sa Diyos ang tumutukoy sa paniniwalang magiging mas maganda ang ating hinaharap kahit mayroon tayong pinagdadaanang mga problema?=Pag-asa>Pagsunod+Lakas ng loob<Pananampalataya",
"Alin sa mga sumusunod ang epekto ng tunay na pananalig sa Diyos sa ating buhay?=Nagiging mas makabuluhan ito>Nagiging mas marangya ito+Nagiging mas matagumpay ito<Nagiging mas masalimuot ito",
"Alin sa mga sumusunod na gawaing nagpapakita ng pananampalataya sa Diyos ang nagsisilbing regular na pakikipag-usap sa Diyos?=Pananalangin>Pagbabasa ng Banal na Kasulatan+Pagkilos ayon sa Pananampalataya<Pagbabahagi ng Pananampalataya",
"Alin sa mga sumusunod na gawaing nagpapakita ng pananampalataya sa Diyos ang tumutukoy sa pag-unawa at pagninilay sa mga nakasulat na aral ng Diyos?=Pagbabasa ng Banal na Kasulatan>Pananalangin+Pagkilos ayon sa Pananampalataya<Pagbabahagi ng Pananampalataya",
"Alin sa mga sumusunod na gawaing nagpapakita ng pananampalataya sa Diyos ang tumutukoy sa paggawa ng kabutihan at pag-aalay ng ating mga gawa sa Diyos?=Pagkilos ayon sa Pananampalataya>Pananalangin+Pagbabasa ng Banal na Kasulatan<Pagbabahagi ng Pananampalataya",
"Alin sa mga sumusunod na gawaing nagpapakita ng pananampalataya sa Diyos ang tumutukoy sa pagbibigay ng inspirasyon sa iba sa pamamagitan ng pagsasaad ng mga testimonya?=Pagbabahagi ng Pananampalataya>Pananalangin+Pagbabasa ng Banal na Kasulatan<Pagkilos ayon sa Pananampalataya",

);

?>

</head>

</bod

</html>