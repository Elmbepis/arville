<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagmamahal sa Bayan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagmamahal sa Bayan";
$_SESSION['tnum']="*45";

$questions=array(

"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng pagngiti at positibong pananaw sa buhay?=Pagiging masayahin>Pagiging madasalin+Pagiging masipag<Pagiging magalang",
"Alin sa mga sumusunod na ugaling Pilipino ang nagpapakita ng malalim na pananampalataya sa Diyos?=Pagiging madasalin>Pagiging masayahin+Pagiging masipag<Pagiging magalang",
"Alin sa mga sumusunod na ugaling Pilipino ang makikita sa kahandaang maglingkod sa lahat ng pagkakataon at pagiging hindi takot sa mabibigat na trabaho?=Pagiging masipag>Pagiging masayahin+Pagiging madasalin<Pagiging magalang",
"Alin sa mga sumusunod na ugaling Pilipino ang makikita sa paggamit ng mga salitang 'po' at 'opo'?=Pagiging magalang>Pagiging masayahin+Pagiging madasalin<Pagiging masipag",
"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng pagbibigay ng mga pagkain at damit sa mga nasalanta ng bagyo?=Pagiging matulungin>Pagiging mapagkumbaba+Pagiging masipag<Pagiging magiliw",
"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng pagreregalo sa mga dukha tuwing Pasko?=Pagiging mapagbigay>Pagiging mapagkumbaba+Pagiging masipag<Pagiging magiliw",
"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng hindi pagyayabang ng mga nakukuhang tagumpay o yaman?=Pagiging mapagkumbaba>Pagiging mapagbigay+Pagiging masipag<Pagiging magiliw",
"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng pagiging madaling lapitan ng mga bagong kakilala?=Pagiging magiliw>Pagiging madasalin+Pagiging masipag<Pagiging mapagtimpi",
"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng pagiging mahilig makipagkaibigan at makilahok sa mga pagdiriwang?=Pagiging magaling makisama>Pagiging madasalin+Pagiging masipag<Pagiging mapagtimpi",
"Alin sa mga sumusunod na ugaling Pilipino ang ipinapakita ng pagiging matiisin at matatag sa harap ng mga pagsubok?=Pagiging mapagtimpi>Pagiging madasalin+Pagiging masipag<Pagiging magaling makisama",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay masayahin?=Pagngiti kahit may malaking suliranin>Pagsisimba tuwing Linggo+Masigasig na pagtupad sa mga gawain sa bahay at paaralan<Pagmamano sa mga matatanda",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay madasalin?=Pagsisimba tuwing Linggo>Pagngiti kahit may malaking suliranin+Masigasig na pagtupad sa mga gawain sa bahay at paaralan<Pagmamano sa mga matatanda",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay masipag?=Masigasig na pagtupad sa mga gawain sa bahay at paaralan>Pagngiti kahit may malaking suliranin+Pagsisimba tuwing Linggo<Pagmamano sa mga matatanda",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay magalang?=Pagmamano sa mga matatanda>Pagngiti kahit may malaking suliranin+Pagsisimba tuwing Linggo<Masigasig na pagtupad sa mga gawain sa bahay at paaralan",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay matulungin?=Paglilingkod sa komunidad nang walang bayad>Pamumuhay nang simple kahit matagumpay sa hanapbuhay+Pagiging positibo sa kabila ng pagkakasakit<Pakikilahok sa mga palaro ng barangay",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay mapagbigay?=Pagpapadala ng damit at laruan sa mga ampunan>Pamumuhay nang simple kahit matagumpay sa hanapbuhay+Pagiging positibo sa kabila ng pagkakasakit<Pakikilahok sa mga kasiyahan sa barangay",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay mapagkumbaba?=Pamumuhay nang simple kahit matagumpay sa hanapbuhay>Pagpapadala ng damit at laruan sa mga ampunan+Pagiging positibo sa kabila ng pagkakasakit<Pakikilahok sa mga palaro ng barangay",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay magiliw?=Pakikilahok sa mga kasiyahan sa barangay>Pagpapadala ng damit at laruan sa mga ampunan+Pagiging positibo sa kabila ng pagkakasakit<Pamumuhay nang simple kahit matagumpay sa hanapbuhay",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay mapagtimpi?=Pagiging positibo sa kabila ng pagkakasakit>Pagpapadala ng damit at laruan sa mga ampunan+Pakikilahok sa mga kasiyahan sa barangay<Pamumuhay nang simple kahit matagumpay sa hanapbuhay",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay matiisin?=Pagtatrabaho sa ibang bansa kahit malayo sa pamilya>Pagpapadala ng damit at laruan sa mga ampunan+Pakikilahok sa mga kasiyahan sa barangay<Pamumuhay nang simple kahit matagumpay sa hanapbuhay",
"Alin sa mga sumusunod ang nagpapakita na ang mga Pilipino ay magaling makisama sa kapwa?=Pagiging madaling anyayahan sa mga salu-salo>Pagpapadala ng damit at laruan sa mga ampunan+Pagiging positibo sa kabila ng pagkakasakit<Pagtatrabaho sa ibang bansa kahit malayo sa pamilya",
"Bakit mahalaga ang pagkakaroon ng kamalayan sa mga mabuting kaugaliang Pilipino?=Para mas madali nating maisakilos ang pagmamahal sa sariling bayan>Para mas madali nating mabago ang mga ugaling ito+Para mas madali nating mahiram ang mga ugali ng ibang lahi<Para mas madali nating maisakilos ang pagmamahal sa ibang bansa",
"Paano natin maipapakita ang ating pagmamahal sa bayan?=Sa pamamagitan ng pagsasabuhay ng mga magagandang kaugaliang Pilipino>Sa pamamagitan ng pagpapakita ng mga ugaling hiram sa ibang lahi+Sa pamamagitan ng paghiram sa isang kulturang banyaga<Sa pamamagitan ng pagsasabuhay ng mga magagandang kaugaliang banyaga",
"Sino sa mga sumusunod ang HINDI nagpapakita ng pagmamahal sa bayan?=Pilipinong hindi nakikilahok sa mga pagdiriwang ng bansa>Pilipinong nagtitiis maghanapbuhay sa malayong lugar+Pilipinong may matibay na pananampalataya sa Diyos<Pilipinong nakukuha pa ring ngumiti kahit masalanta na ng bagyo",
"Sino sa mga sumusunod ang HINDI nagpapakita ng pagmamahal sa bayan?=Pilipinong walang galang sa nakatatanda sa kanya>Pilipinong nakikilahok sa mga palaro ng pamayanan+Pilipinong marunong magpasalamat sa pinagkakautangan ng loob<Pilipinong nakukuha pa ring tumawa kahit kumakalam ang sikmura",
"Alin sa mga sumusunod na kaugaliang Pilipino sa loob ng pamilya ang tuwirang nagpapakita ng ating paggalang sa ating mga magulang, lolo, at lola?=Pagmamano sa mga nakatatanda>Pagsasama-sama tuwing pista+Pagsasalu-salo tuwing Linggo<Pagdiriwang ng mahahalagang okasyon",
"Alin sa mga sumusunod na kaugaliang Pilipino sa loob ng pamilya ang nagbibigay ng oportunidad para madalas at regular na magkasama-sama ang pamilya at maipakita ang pagmamahal sa isa't isa?=Pagsasalu-salo tuwing Linggo>Paglahok sa bayanihan+Pagmamano sa mga nakatatanda<Pagdiriwang ng mahahalagang okasyon",
"Ang pakikilahok sa mga aktibidad sa Araw ng Kalayaan ay halimbawa ng alin sa mga sumusunod na kaugaliang Pilipino sa loob ng pamilya?=Pagdiriwang ng mahahalagang okasyon>Paglahok sa bayanihan+Pagmamano sa mga nakatatanda<Pagsasalu-salo tuwing Linggo",
"Alin sa mga sumusunod na kaugaliang Pilipino sa loob ng pamilya ang ginagawa upang maipasa sa susunod na henerasyon ating mayamang kultura at sining?=Pagtuturo ng tradisyunal na sayaw at awit sa kabataan>Pagsasalu-salo tuwing Linggo+Pagmamano sa mga nakatatanda<Pagdiriwang ng mahahalagang okasyon",
"Ang pagtulong sa mga nasalanta ng bagyo o pagboboluntaryo sa pagtatayo ng bahay ng kapwa ay mga halimbawa ng alin sa mga sumusunod na kaugaliang Pilipino sa loob ng pamilya?=Paglahok sa bayanihan>Pagdiriwang ng mahahalagang okasyon+Pagmamano sa mga nakatatanda<Pagsasalu-salo tuwing Linggo",
"Alin sa mga sumusunod na kaugaliang Pilipino sa loob ng pamilya ang tumutukoy sa pag-aalay ng dasal at pagdalaw sa mga puntod ng mga yumaong mahal sa buhay taun-taon?=Pagdiriwang ng Undas>Pagsasama-sama tuwing pista+Pagmamano sa mga nakatatanda<Paglahok sa bayanihan",

);

?>

</head>

</bod

</html>