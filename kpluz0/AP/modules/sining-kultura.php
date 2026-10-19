<html>
<head>
<body>

<?php
$_SESSION['title']="Pagpapahalaga sa Sining at Kultura";

$questions=array(

"Ano ang sining?=Malikhaing pagpapahayag ng isip at damdamin>Paraan ng pamumuhay ng mga tao+Pagtuklas ng mga bagong kaalaman sa mundo<Paggawa ng mabuting asal",
"Ano ang kultura?=Pamumuhay at kaugalian ng mga tao>Kabuuan ng mga bagay sa ating paligid+Pagtuklas ng mga bagong kaalaman sa mundo<Paggawa ng mabuting asal",
"Ano ang tawag sa sining ng paggawa ng larawan gamit ang mga likidong pangkulay?=Pagpipinta>Pag-ukit+Pagsayaw<Pag-awit",
"Anong uri ng sining ang isinasagawa sa pamamagitan ng paggalaw ng iba't iabng bahagi ng katawan?=Pagsayaw>Pagpipinta+Pag-ukit<Pagtugtog",
"Anong uri ng sining ang ginagamitan ng boses upang makapagparinig ng magandang himig na may mensahe?=Pag-awit>Pagpipinta+Pag-ukit<Pagsayaw",
"Alin sa mga sumusunod ang nagpapakita ng kulturang Pilipino?=Pagsusuot ng Barong Tagalog>Pagtugtog ng jazz+Pagkain ng hamburger<Pagluluto ng pizza",
"Aling paraan ng pagpapahalaga sa ating kultura ang tumutukoy sa pag-alam ng mga sayaw, awitin, pagkain, at tradisyon ng ating pinagmulang lugar?=Pagkilala ng kultura ng sariling rehiyon>Paglahok sa mga gawain ng komunidad+Paggamit ng lokal na wika<Paggamit ng kagamitang tradisyunal",
"Ang pagtulong sa pagpapalamuti para sa pagdiriwang ng pista ay halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paglahok sa mga gawain ng komunidad>Pagkilala ng kultura ng sariling rehiyon+Paggamit ng lokal na wika<Paggamit ng kagamitang tradisyunal",
"Ang pag-awit o pagsayaw sa isang programa ng pamayanan ay halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paglahok sa mga gawain ng komunidad>Pagkilala ng kultura ng sariling rehiyon+Paggamit ng lokal na wika<Paggamit ng kagamitang tradisyunal",
"Ang pagsasalita ng Ilocano ng mga taong nakatira sa Ilocos ay halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paggamit ng lokal na wika>Pagkilala ng kultura ng sariling rehiyon+Paglahok sa mga gawain ng komunidad<Paggamit ng kagamitang tradisyunal",
"Ang pagdadala ng bayong sa palengke at pagtulog sa banig ay mga halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paggamit ng kagamitang tradisyunal>Pagkilala ng kultura ng sariling rehiyon+Paglahok sa mga gawain ng komunidad<Paggamit ng lokal na wika",
"Ang pagluluto sa palayok at pag-iipon ng tubig sa banga ay mga halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paggamit ng kagamitang tradisyunal>Pagpapasa ng kaalaman sa iba+Paglahok sa mga gawain ng komunidad<Paggamit ng lokal na wika",
"Ang pagmamano sa matatanda at pagdarasal bago kumain ay mga halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paggalang sa mga tradisyon>Pagpapasa ng kaalaman sa iba+Paglahok sa mga gawain ng komunidad<Paggamit ng lokal na wika",
"Ang paggamit ng mga salitang 'po' at 'opo' ay halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Paggalang sa mga tradisyon>Pagpapasa ng kaalaman sa iba+Paglahok sa mga gawain ng komunidad<Paggamit ng kagamitang tradisyunal",
"Ang pagtuturo ng mga katutubong awit sa mga bata ay halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Pagpapasa ng kaalaman sa iba>Paggamit ng kagamitang tradisyunal+Paglahok sa mga gawain ng komunidad<Paggamit ng lokal na wika",
"Ang pagtuturo ng mga tradisyon at lumang kaugalian sa mga bata ay halimbawa ng aling paraan ng pagpapahalaga sa ating kultura?=Pagpapasa ng kaalaman sa iba>Paggamit ng kagamitang tradisyunal+Paglahok sa mga gawain ng komunidad<Paggamit ng lokal na wika",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa ating sining?=Pagtangkilik sa mga art exhibits sa komunidad>Pagtawa sa mga nagtatanghal sa entablado+Pag-iwas sa pagdiriwang ng pista<Pagsusuot ng damit na galing sa ibang bansa",
"Anong uri ng sining ang lumilikha ng mga magagandang dekorasyon sa pamamagitan ng pagtatapyas ng kahoy o bato?=Pag-ukit>Pag-awit+Pagpipinta<Pagsayaw",
"Alin sa mga sumusunod ang bahagi ng ating katutubong kultura?=Pagluluto ng sinigang>Panonood ng mga K-drama+Paglalaro ng volleyball<Pagdiriwang ng Halloween",
"Alin sa mga sumusunod ang bahagi ng ating katutubong kultura?=Pagsasalita ng Tagalog>Panonood ng mga pelikula ng Hollywood+Paglalaro ng basketbol<Pagdiriwang ng Thanksgiving Day",
"Anong sining ang isinasagawa sa pamamagitan ng pagtatanghal sa ibabaw ng entablado?=Teatro>Pagpipinta+Pag-ukit<Pagbuburda",
"Alin sa mga sumusunod ang nagpapakita ng pagmamalaki sa sarili nating kultura?=Pagsusuot ng salakot>Pagsusuot ng Amerikana+Pagsasalita sa wikang Ingles<Paggaya kay Superman",
"Paano mo mapapakita ang paggalang sa kultura ng isang pangkat etniko sa Pilipinas?=Pakikilahok sa kanilang pagdiriwang>Panlalait ng kanilang kasuotan+Pagtawa sa kanilang awit<Pagtanggi sa kanilang pagkain",
"Alin sa mga sumusunod ang hindi halimbawa ng kagamitang tradisyunal ng mga Pilipino?=Backpack>Bayong+Banig<Banga",
"Ano ang pangunahing dahilan kung bakit dapat nating pahalagahan ang ating kultura?=Para mapangalagaan natin ang ating pagkakakilanlan>Para yumaman tayong lahat+Para hindi tayo mapagalitan ng ating guro<Para mapuri tayo ng mga dayuhan",

);


?>

</head>

</body>

</html>