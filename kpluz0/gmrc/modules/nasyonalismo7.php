<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Nasyonalismo - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Nasyonalismo";
$_SESSION['tnum']="*7b";

$questions=array(

"Ang pakikiisa sa mga paradang inorganisa ng komunidad ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pakikilahok sa mga pambansang pagdiriwang>Pag-aaral at pagkilala sa mga bayani+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang pagsusuot ng mga damit na may simbolo ng watawat kung Araw ng Kagitingan ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pakikilahok sa mga pambansang pagdiriwang>Pag-aaral at pagkilala sa mga bayani+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang pagsali sa mga programang pampaaralan para sa Araw ng Kalayaan ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pakikilahok sa mga pambansang pagdiriwang>Pag-aaral at pagkilala sa mga bayani+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang pagsasaliksik at pagbabasa tungkol sa buhay ni Andres Bonifacio ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pag-aaral at pagkilala sa mga bayani>Pakikilahok sa mga pambansang pagdiriwang+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang pagbabasa ng mga nobela ni Dr. Jose Rizal ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pag-aaral at pagkilala sa mga bayani>Pakikilahok sa mga pambansang pagdiriwang+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang panonood ng mga dokumentaryo o pelikula tungkol sa kasaysayan ng Pilipinas ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pag-aaral at pagkilala sa mga bayani>Pakikilahok sa mga pambansang pagdiriwang+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang pagtalakay ng pamilya sa mga nagawang kabayanihan at sakripisyo ng ating mga ninuno ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pag-aaral at pagkilala sa mga bayani>Pakikilahok sa mga pambansang pagdiriwang+Paggalang sa mga pambansang simbolo<Paglahok sa mga civic activities",
"Ang pagsunod sa mga alituntuning itinatakda ng batas tungkol sa paggamit ng watawat ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Paggalang sa mga pambansang simbolo>Pakikilahok sa mga pambansang pagdiriwang+Pag-aaral at pagkilala sa mga bayani<Paglahok sa mga civic activities",
"Ang wastong pagsasagawa ng 'flag ceremony' tuwing umaga ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Paggalang sa mga pambansang simbolo>Pakikilahok sa mga pambansang pagdiriwang+Pag-aaral at pagkilala sa mga bayani<Paglahok sa mga civic activities",
"Ang pagtayo nang tuwid tuwing maririnig ang 'Lupang Hinirang' ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Paggalang sa mga pambansang simbolo>Pakikilahok sa mga pambansang pagdiriwang+Pag-aaral at pagkilala sa mga bayani<Paglahok sa mga civic activities",
"Ang pagsali sa mga 'tree planting activities' sa inyong lugar ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Paglahok sa mga civic activities>Pakikilahok sa mga pambansang pagdiriwang+Pag-aaral at pagkilala sa mga bayani<Paggalang sa mga pambansang simbolo",
"Ang pagboboluntaryo sa paglilinis ng kapaligiran ng inyong barangay ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Paglahok sa mga civic activities>Pakikilahok sa mga pambansang pagdiriwang+Pag-aaral at pagkilala sa mga bayani<Paggalang sa mga pambansang simbolo",
"Ang pag-aambag ng iyong dugo sa mga misyong medikal sa inyong komunidad ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Paglahok sa mga civic activities>Pakikilahok sa mga pambansang pagdiriwang+Pag-aaral at pagkilala sa mga bayani<Paggalang sa mga pambansang simbolo",
"Ang pagtuturo ng mga magulang at guro sa kabataan ng mga tagumpay ni Heneral Antonio Luna ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pagpapalaganap ng mga kwento ng kabayanihan>Pagsunod sa mga batas at alituntunin+Paglahok sa mga civic activities<Paggalang sa mga pambansang simbolo",
"Ang pagsasalaysay ng mga magulang at guro sa kabataan ng kadakilaan ni Melchora Aquino ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pagpapalaganap ng mga kwento ng kabayanihan>Pagsunod sa mga batas at alituntunin+Paglahok sa mga civic activities<Paggalang sa mga pambansang simbolo",
"Ang hindi paglabag sa mga regulasyong pantrapiko ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pagsunod sa mga batas at alituntunin>Pagpapalaganap ng mga kwento ng kabayanihan+Paglahok sa mga civic activities<Paggalang sa mga pambansang simbolo",
"Ang pag-iwas sa mga gawaing masasama ay halimbawa ng alin sa mga sumusunod na paraan ng pagtupad ng tungkulin ng pamilya sa bayan?=Pagsunod sa mga batas at alituntunin>Pagpapalaganap ng mga kwento ng kabayanihan+Paglahok sa mga civic activities<Paggalang sa mga pambansang simbolo",
"Bakit mahalaga ang pagtuturo ng nasyonalismo ng mga magulang sa kanilang mga anak?=Upang maging mabubuting mamamayan ang kanilang mga anak>Upang hangaan sa komunidad ang kanilang mga anak+Upang madaling matanggap sa trabaho ang kanilang mga anak<Upang mas tumalino ang kanilang mga anak",
"Ano ang ibig sabihin ng 'economic patriotism'?=Pagtangkilik sa mga produktong lokal>Pagbibigay ng donasyon sa pamahalaan+Paggamit ng mga produktong inangkat mula sa ibang bansa<Pagtatayo ng negosyo sa ibang bansa",
"Anong pambansang pagdiriwang ang ginaganap tuwing Hunyo 12 sa Pilipinas?=Araw ng Kalayaan>Araw ng mga Bayani+Araw ng Kagitingan<Araw ng Watawat",
"Ano ang pangunahing layunin ng pagdiriwang ng mga pambansang araw na may kaugnayan sa nasyonalismo?=Maalala ng mga mamamayan ang kontribusyon ng mga bayani>Makapagpahinga ang mga mamamayan+Makapamasyal ang mga mamamayan<Makapunta sa mall ang mga mamamayan",
"Ano ang pangunahing layunin ng pagkilala ng mga mag-aaral sa mga bayani ng Pilipinas?=Para makakuha sila ng inspirasyon at aral>Para makakuha sila ng mataas na grado sa pagsusulit+Para maipakita ang kanilang talino sa klase<Para makakuha sila ng papuri mula sa mga guro",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa watawat ng Pilipinas?=Pagtupi rito nang maayos pagkatapos gamitin>Paglalagay nito sa sahig+Pagsusuot dito bilang damit<Paggamit dito bilang patungan o pantakip",
"Alin sa mga sumusunod ang HINDI nagpapakita ng nasyonalismo?=Pagtangkilik sa mga produktong gawa sa Kanluran>Pagsusuot ng barong Tagalog+Pagdiriwang ng Araw ng Kalayaan<Pagdalo sa mga seremonyang pambayan",
"Alin sa mga sumusunod ang nagpapakita ng tamang pamumuhay bilang isang makabayang Pilipino?=Pagsunod sa mga batas at alituntunin>Pagbibigay ng mas mataas na respeto sa mga dayuhan kaysa mga kapwa Pilipino+Pag-iwas sa pagbabayad ng buwis<Pagbabakasyon sa ibang bansa tuwing Pambansang Araw",

);

?>

</head>

</bod

</html>