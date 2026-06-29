<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapahalaga sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapahalaga sa Sarili";
$_SESSION['tnum']="*40";

$questions=array(

"Alin sa mga sumusunod ang katangiang hindi nagpapabukod-tangi sa tao sa ibang nilalang?=Kakayahang ipagtanggol ang sarili>Kakayahang magpakita ng empatiya+Kakayahang magplano at magpasya<Kakayahang umakto nang may moralidad",
"Bakit mahalaga ang pagpapahalaga sa sarili nating kakayahan?=Upamg magamit ito sa pagpapabuti ng sarili at ng kapwa>Upamg makuha ang lahat ng mithiin+Upamg makapagpasikat sa ibang tao<Upamg umangat sa kapwa",
"Alin sa mga sumusunod ang kakayahan ng bawat tao na hindi matatagpuan sa ibang nilalang?=Umunawa ng damdamin ng iba>Gumawa ng paraan upang mabuhay+Ipagtanggol ang sarili<Humanap ng pagkain",
"Ano ang kahulugan ng pagiging bukod-tangi ng tao?=Pagiging kakaiba at espesyal>Pagiging kahalintulad ng ibang hayop+Pagiging mas mababa kaysa sa ibang hayop<Pagiging pangkaraniwang nilalang lamang",
"Alin sa mga sumusunod ang halimbawa ng kilos na nagpapakita ng kakayahang mag-isip nang malalim?=Masusing pagpaplano bago kumilos>Paglilibang sa sarili+Paggala sa paligid<Pagpapalipas ng oras",
"Alin sa mga sumusunod ang isang paraan para maipapakita ng isang tao ang kanyang pagmamahal sa kapwa?=Sa pamamagitan ng pagmamalasakit>Sa pamamagitan ng pagwawalang-bahala+Sa pamamagitan ng pagiging hindi tapat<Sa pamamagitan ng panlalamang",
"Alin sa mga sumusunod ang mabuting epekto ng pagkilala sa sariling kakayahan?=Pagpapabuti ng sarili at ng iba>Paggamit sa kapwa+Pagiging mapagmataas<Pagiging makasarili",
"Alin sa mga sumusunod na kakayahang nagtatangi sa tao ang tumutukoy sa kakayahang gumawa ng desisyon?=Kakayahang magpasya>Kakayahang magpakita ng empatiya+Kakayahang mag-isip nang malalim<Kakayahang magmahal",
"Alin sa mga sumusunod na kakayahang nagtatangi sa tao ang tumutukoy sa kakayahang umunawa at kumonekta sa damdamin ng iba?=Kakayahang magpakita ng empatiya>Kakayahang magpasya+Kakayahang mag-isip nang malalim<Kakayahang magmahal",
"Alin sa mga sumusunod na kakayahang nagtatangi sa tao ang ginagamit sa pag-aanalisa, pagpaplano, at pagtugon sa iba't ibang problema?=Kakayahang mag-isip nang malalim>Kakayahang kumilos nang may moralidad+Kakayahang magpakita ng empatiya<Kakayahang magmahal",
"Alin sa mga sumusunod na kakayahang nagtatangi sa tao ang pinakainiuugnay sa pagtanggap, pag-alala, pagmamalasakit, at pagtulong sa kapwa?=Kakayahang magmahal>Kakayahang magpasya+Kakayahang mag-isip nang malalim<Kakayahang magpakita ng empatiya",
"Alin sa mga sumusunod na kakayahang nagtatangi sa tao ang tumutukoy sa pagsasagawa ng mga tama at makatarungang gawain lamang?=Kakayahang kumilos nang may moralidad>Kakayahang magpasya+Kakayahang mag-isip nang malalim<Kakayahang magpakita ng empatiya",
"Alin sa mga sumusunod ang tumutukoy sa kilos na nagpapakita ng kakayahang mag-isip upang matukoy ang mga hakbang na pinakamainam na gawin sa isang sitwasyon?=Pagpaplano>Pagsusuri+Aktibong pakikinig<Pagmamalasakit",
"Alin sa mga sumusunod ang tumutukoy sa kilos na nagpapakita ng kakayahang mag-isip upang lubusang maunawaan ang isang bagay sa pamamagitan ng masusing pag-aaral?=Pagsusuri>Pagpaplano+Aktibong pakikinig<Pagmamalasakit",
"Alin sa mga sumusunod ang tumutukoy sa kilos na naglalayong maunawaan nang lubos ang sinasabi ng iba upang makapagbigay ng angkop na tugon dito?=Aktibong pakikinig>Pagpaplano+Pagsusuri<Pagmamalasakit",
"Alin sa mga sumusunod ang tumutukoy sa kilos na nagpapakita ng kakayahang magmahal at iniuugnay sa pag-aabot ng tulong o pagbibigay ng oras sa kapwa?=Pagmamalasakit>Pagpaplano+Aktibong pakikinig<Pagsusuri",
"Alin sa mga sumusunod na elemento ng pagpapahalaga sa sarili ang tumutukoy sa pagtuklas sa mga natatangi nating talento at abilidad?=Pagkilala sa sariling kakayahan>Pagpapahalaga sa sariling paghuhusga at pagpapasya+Pag-aalaga sa pisikal at emosyonal na kalusugan<Paglinang ng positibong relasyon sa kapwa",
"Alin sa mga sumusunod na elemento ng pagpapahalaga sa sarili ang tumutukoy sa pagkakaroon ng tiwala sa ating kakayahang manindigan para sa ating mga prinsipyo at paniniwala?=Pagpapahalaga sa sariling paghuhusga at pagpapasya>Pagkilala sa sariling kakayahan+Pag-aalaga sa pisikal at emosyonal na kalusugan<Paglinang ng positibong relasyon sa kapwa",
"Alin sa mga sumusunod na elemento ng pagpapahalaga sa sarili ang sumasaklaw sa regular na pag-eehersisyo, tamang pagkain, sapat na pagpapahinga, at pag-iwas sa mga bisyo?=Pag-aalaga sa pisikal at emosyonal na kalusugan>Pagkilala sa sariling kakayahan+Pagpapahalaga sa sariling paghuhusga at pagpapasya<Paglinang ng positibong relasyon sa kapwa",
"Alin sa mga sumusunod na elemento ng pagpapahalaga sa sarili ang may kinalaman sa ating mabuting pakikipag-ugnayan sa ibang tao?=Paglinang ng positibong relasyon sa kapwa>Pagkilala sa sariling kakayahan+Pagpapahalaga sa sariling paghuhusga at pagpapasya<Pag-aalaga sa pisikal at emosyonal na kalusugan",
"Bakit mahalaga ang pagkilala sa sariling kakayahan at kalakasan?=Upang magkaroon ng kumpiyansa at tiwala sa sarili>Upang magkaroon ng kumpiyansa at tiwala sa ibang tao+Upang makakuha ng papuri mula sa iba<Upang umangat sa ibang tao",
"Alin sa mga sumusunod ang hindi saklaw ng pag-aalaga sa pisikal at emosyonal na kalusugan?=Pagpapakita ng empatiya>Regular na pag-eehersisyo+Pag-iwas sa mga bisyo<Sapat na pagpapahinga",
"Alin sa mga sumusunod ang hindi elemento ng pagpapahalaga sa sarili?=Pagmamalasakit sa ibang tao>Pagkilala sa sariling kakayahan+Pagpapahalaga sa sariling paghuhusga at pagpapasya<Pag-aalaga sa pisikal at emosyonal na kalusugan",
"Bakit mahalaga ang pagiging responsable sa ating mga desisyon?=Upang mapanagutan natin ang mga bunga nito>Upang makaiwas sa mga epekto nito+Upang magbigay ng magandang impresyon sa iba<Upang mapabilis ang pagpapasya",
"Alin sa mga sumusunod ang wastong paraan ng pagpapakita ng empatiya sa kausap?=Pakikinig nang maigi at pag-unawa sa damdamin nito>Pakikinig nang maigi at pagkikibit-balikat sa damdamin nito+Pagiging tahimik at walang pakialam<Pagsang-ayon sa lahat ng sinasabi nito kahit hindi ka nakikinig",
);

?>

</head>

</bod

</html>