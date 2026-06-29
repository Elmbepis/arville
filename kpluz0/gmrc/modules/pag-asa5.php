<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Pag-asa - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Pag-asa";
$_SESSION['tnum']="*5m";

$questions=array(

"Alin sa mga sumusunod ang tumutukoy sa pag-asa natin sa ating buhay?=Isang tanglaw na nagbibigay-liwanag lalo na sa mga sandali ng kadiliman>Isang hadlang na pumipigil sa pag-unlad+Isang kahinaang dapat iwasan<Isang ilusyong nasa ating guni-guni lamang",
"Anong papel ang dapat gampanan ng pananampalataya sa isang pamayanang dumaranas ng krisis?=Paghahatid ng lakas ng loob at pagkakaisa>Pagiging sanhi ng pagkakawatak-watak ng mga tao+Pagdudulot ng mga di-pagkakaunawaan<Pagiging kasangkapan ng panlalamang sa kapwa",
"Alin sa mga sumusunod ang gawain o pagkilos na humuhugot ng inspirasyon mula sa pananampalataya?=Pagbibigay ng relief goods sa mga nasalanta ng bagyo>Pagnanakaw ng mga ayuda para sa mahihirap+Pananamantala sa mga nasunugan<Hindi pagpansin sa mga humihingi ng tulong",
"Alin sa mga sumusunod ang halimbawa ng pagsasabuhay ng pananampalataya sa pamamagitan ng pagiging bukas-palad?=Pamamahagi ng libreng gamot sa mga maysakit>Pag-iimpok ng pera para sa sarili+Pag-iwas sa mga humihingi ng pagkain<Panloloko sa kapwa para magkapera",
"Ang paglahok sa 'relief operations,' pagbabahagi ng yaman, o pag-aalay ng oras sa mga nangangailangan ay mga anyo ng alin sa mga sumusunod na paraan ng pagsasabuhay ng pananampalataya?=Pagiging bukas-palad at mapagbigay>Pagpapalaganap ng positibong saloobin+Pananalangin para sa kapakanan ng pamayanan<Pagtanggap at pagpapahalaga sa patnubay",
"Ang pagpapakalat ng magagandang balita at pagbibigay ng aliw sa mga nababagabag ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagsasabuhay ng pananampalataya?=Pagpapalaganap ng positibong saloobin>Pagiging bukas-palad at mapagbigay+Pananalangin para sa kapakanan ng pamayanan<Pagtanggap at pagpapahalaga sa patnubay",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pananampalataya ang tumutukoy sa pagdarasal para sa kapayapaan, kalusugan, at katatagan ng bawat miyembro ng komunidad?=Pananalangin para sa kapakanan ng pamayanan>Pagpapalaganap ng positibong saloobin+Pagiging bukas-palad at mapagbigay<Pagtanggap at pagpapahalaga sa patnubay",
"Ang pananalangin para makahingi ng paggabay sa Diyos ay isang anyo ng alin sa mga sumusunod na paraan ng pagsasabuhay ng pananampalataya?=Pagtanggap at pagpapahalaga sa patnubay>Pagiging bukas-palad at mapagbigay+Pananalangin para sa kapakanan ng pamayanan<Pagpapalaganap ng positibong saloobin",
"Ang pag-oorganisa ng mga 'feeding program' at pagbibigay ng libreng serbisyo sa mga nasalanta ng bagyo ay mga anyo ng alin sa mga sumusunod na paraan ng pagsasabuhay ng pananampalataya?=Aktibong pagtulong>Pagtanggap at pagpapahalaga sa patnubay+Pagtitipon sa Panalangin<Pagpapalaganap ng positibong saloobin",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pananampalataya ang tumutukoy sa pagdarasal nang sama-sama upang mapalakas ang loob ng bawat isa?=Pagtitipon sa panalangin>Pagtanggap at pagpapahalaga sa patnubay+Aktibong pagtulong<Pagpapalaganap ng positibong saloobin",
"Alin sa mga sumusunod ang maaaring gawin upang magpalaganap ng positibong saloobin sa gitna ng krisis?=Pagpapaalalang may liwanag sa dulo ng dilim>Pagkakalat ng mga negatibong balita+Pangugutya sa mga naghihirap<Pagrereklamo tungkol sa mga problema",
"Alin sa mga sumusunod ang dapat maging epekto ng ating pananampalataya sa ating pagkilos?=Maging matulungin tayo sa iba>Umasa na lamang tayo sa himala+Maging mapagmalaki tayo sa kapwa<Mawalan tayo ng pag-asa",
"Alin sa mga sumusunod ang halimbawa ng aktibong pagtulong na nag-uugat sa ating pananampalataya?=Pag-oorganisa ng programang pagpapakain sa mga batang nagugutom>Pagdarasal lamang buong araw+Pagbabasa ng Bibliya araw-araw<Pangangaral sa iba na magsikap sa buhay",
"Ano ang kahalagahan ng sama-samang pananalangin?=Naghahatid ito ng seguridad at pag-asang nakaugat sa pagkakaisa>Nagtuturo ito ng pagiging makasarili+Nagsisimula ito ng pagpapagalingan<Nagpapababa ito ng tiwala sa kapwa",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa panahon ng krisis?=Magpadala sa pangamba>Manalangin para sa kapakanan ng lahat+Tumulong sa abot ng makakaya<Magbahagi ng positibong saloobin",
"Alin sa mga sumusunod ang nangyayari sa mga taong naniniwalang may Diyos na nakikinig sa kanila?=Nababawasan ang kanilang pangamba>Nawawalan sila ng pag-asa+Bumababa ang kanilang tiwala sa sarili<Nagiging mapanghusga sila sa iba",
"Alin sa mga sumusunod ang isang anyo ng pagsasabuhay ng paniniwala sa Diyos?=Pag-aalay ng oras at serbisyo sa mga nangangailangan>Pag-iwas sa mga taong may ibang paniniwala+Pagsasamantala sa mahihirap<Pagpapanggap na relihiyoso para maiangat ang sarili sa iba",
"Paano natin dapat harapin ang mga hamon sa ating pamayanan?=Nang may tapang, pagtitiis, at pagkakaisa>Nang may panghihina ng loob at pag-aalinlangan+Sa pamamagitan ng paggawa ng masama sa iba<Sa pamamagitan ng pagtakas sa mga problema",
"Alin sa mga sumusunod ang karaniwang bunga ng pagpapakalat ng negatibong balita sa panahon ng krisis?=Paglala ng takot at pagkataranta ng mga tao>Pagiging alerto at handa ng lahat+Pagkakaroon ng mga tao ng lakas ng loob para harapin ang mga hamon<Paniniwala ng komunidad na madaling lilipas ang krisis",
"Ano ang dapat gawin ng inyong pamilya kung may kapitbahay kayong naghihirap na sa buhay dahil nalugi sa negosyo?=Alukin siya ng tulong na kayang ibigay>Ikalat sa social media ang kanyang pinagdadaanan+Iwasan siya at huwag nang pansinin<Sabihin sa kanyang sa Diyos dapat siya humingi ng tulong",
"Paano mo magagawang realidad ang mga turo ng iyong pananampalataya?=Sa pamamagitan ng mga konkretong pagkilos tulad ng aktibong pagtulong>Sa pamamagitan ng paulit-ulit na pananalangin+Sa pamamagitan ng madalas na pagsisimba<Sa pamamagitan ng pag-aangat ng sarili sa iba",
"Alin sa mga sumusunod ang hindi kabilang sa mga inaasahang epekto ng pananampalataya sa pamayanan?=Pagiging sanhi ng hidwaan ng mga tao>Pag-uudyok sa mga taong tumulong sa kapwa+Pagdudulot ng pagkakaisa sa komunidad<Pagbibigay ng pag-asa sa mga mamamayan",
"Alin sa mga sumusunod ang dapat gawin ng pamayanan tuwing magsisimula na ang tag-ulan?=Paghahanda ng mga kakailanganin ng mga masasalanta ng bagyo>Paghahasik ng pangamba sa social media+Pagpapahinga habang wala pang krisis<Pagdarasal nang walang ginagawa",
"Alin sa mga sumusunod ang karaniwang idinudulot ng pananampalataya sa mga tao?=Pag-asa at lakas ng loob na humarap sa mga hamon>Mababang tiwala sa sariling kakayanan+Pagkakawatak-watak<Pangamba at pag-aalala sa kinabukasan",
"Alin sa mga sumusunod ang epekto ng pananampalataya sa isang kapitan ng barangay?=Katatagang mamuno anuman ang hamon>Kahinaan ng loob na harapin ang mga responsibilidad+Poot sa mga taong hindi tumutulong sa kanya<Kawalan ng ganang magsilbi",

);

?>

</head>

</bod

</html>