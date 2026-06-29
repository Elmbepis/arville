<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit - GMRC in KPluz.com    </title>
<body>

<?php 
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit";
$_SESSION['tnum']="*7a";

$questions=array(

"Alin sa mga sumusunod na wastong pagtugon ng pamilya sa pagbabago ng klima ang tumutukoy sa pagkakaroon ng regular na pag-uusap at pag-aaral tungkol sa 'climate change' sa loob ng pamilya?=Edukasyon>Pagsasagawa ng green practices sa bahay+Pakikilahok sa mga lokal na programa<Pagbabawas sa pagkonsumo",
"Ang paggamit ng 'reusable bags', pag-iwas sa 'single-use plastics', at pagtataguyod ng 'urban gardening' ay mga elemento ng alin sa mga sumusunod na wastong pagtugon ng pamilya sa pagbabago ng klima?=Pagsasagawa ng green practices sa bahay>Edukasyon+Pakikilahok sa mga lokal na programa<Pagbabawas sa pagkonsumo",
"Alin sa mga sumusunod na wastong pagtugon ng pamilya sa pagbabago ng klima ang tumutukoy sa pakikibahagi sa mga proyekto ng komunidad para sa pangangalaga ng kalikasan tulad ng 'coastal clean-ups', 'tree planting activities', at 'environmental awareness campaigns'?=Pakikilahok sa mga lokal na programa>Pagsasagawa ng green practices sa bahay+Edukasyon<Pagbabawas sa pagkonsumo",
"Alin sa mga sumusunod na wastong pagtugon ng pamilya sa pagbabago ng klima ang tuwirang tumutukoy sa paggamit lamang ng mga bagay na talagang kailangan?=Pagbabawas sa pagkonsumo>Pagsasagawa ng green practices sa bahay+Edukasyon<Pakikilahok sa mga lokal na programa",
"Alin sa mga sumusunod na wastong pagtugon ng pamilya sa pagbabago ng klima ang tuwirang tumutukoy sa paggamit ng bisikleta, paglalakad, o pagsakay ng pampublikong sasakyan sa halip na magmaneho?=Paggamit ng transportasyong napapanatili>Pagbabawas sa pagkonsumo+Pagsasagawa ng green practices sa bahay<Pakikilahok sa mga lokal na programa",
"Alin sa mga sumusunod ang HINDI itinuturing na elementong saklaw ng pagbabawas ng basurang itinatapon sa 'landfills'?=Paggamit ng solar panels>Waste segregation+Composting<Recycling",
"Alin sa mga sumusunod ang HINDI itinuturing na elementong saklaw ng pagtitipid sa enerhiya?=Pag-iipon ng ulan>Paggamit ng mga appliances na matipid sa kuryente+Pagpatay ng mga ilaw na hindi ginagamit<Paggamit ng renewable energy sources",
"Alin sa mga sumusunod ang HINDI itinuturing na elementong saklaw ng pagtitipid sa tubig?=Paggamit ng wind turbines>Pagkukumpuni ng mga tumutulong gripo+Paggamit ng tamang dami ng tubig sa bawat gawain<Pag-iipon ng ulan",
"Alin sa mga sumusunod ang HINDI itinuturing na elementong saklaw ng paggamit ng alternatibong transportasyon?=Paggamit ng sasakyang kumukonsumo ng gasolina>Pagsakay sa pampublikong sasakyan+Paggamit ng bisikleta<Paglalakad papunta sa trabaho",
"Alin sa mga sumusunod ang HINDI itinuturing na elementong saklaw ng pagiging matalino sa pagkonsumo ng pagkain?=Pagkonsumo ng karne ng baka>Pag-iwas sa mga pagkaing may mataas na carbon footprint+Pagbili ng mga lokal na produkto<Pagbabawas ng food wastes",
"Alin sa mga sumusunod na pansariling paraan ng pagtugon sa pagbabago ng klima ang sumasaklaw sa pagbili ng mga lokal na produkto at pagkaing hindi gumagamit ng kemikal at pestisidyo?=Pagtangkilik sa mga produktong napapanatili>Pagpapanatili ng sariling hardin+Pag-iwas sa single-use plastics<Pagpapalaganap ng kaalaman tungkol sa climate change",
"Alin sa mga sumusunod na pansariling paraan ng pagtugon sa pagbabago ng klima ang sumasaklaw sa pagtatanim ng mga gulay at punong namumunga ng prutas sa bakuran?=Pagpapanatili ng sariling hardin>Pagtangkilik sa mga produktong napapanatili+Pag-iwas sa single-use plastics<Pagpapalaganap ng kaalaman tungkol sa climate change",
"Alin sa mga sumusunod na pansariling paraan ng pagtugon sa pagbabago ng klima ang tumutukoy sa mga proyektong 'reforestation' na nagpapabuti sa kalidad ng hangin at nakakabawas sa epekto ng 'climate change'?=Pagtatanim ng mga puno>Pagtangkilik sa mga produktong napapanatili+Pag-iwas sa single-use plastics<Pagpapalaganap ng kaalaman tungkol sa climate change",
"Alin sa mga sumusunod na pansariling paraan ng pagtugon sa pagbabago ng klima ang sumasaklaw sa pagdadala ng sariling mga 'reusable' na bag, bote ng tubig, at lalagyan kapag namimili o kumakain sa labas?=Pag-iwas sa single-use plastics>Pagtangkilik sa mga produktong napapanatili+Pagpapanatili ng sariling hardin<Pagpapalaganap ng kaalaman tungkol sa climate change",
"Alin sa mga sumusunod na pansariling paraan ng pagtugon sa pagbabago ng klima ang sumasaklaw sa pagbabahagi ng impormasyon tungkol sa mga hakbang upang labanan ang pagbabago ng klima?=Pagpapalaganap ng kaalaman tungkol sa climate change>Pagtangkilik sa mga produktong napapanatili+Pagtatanim ng mga puno<Pag-iwas sa single-use plastics",
"Alin sa mga sumusunod ang HINDI itinuturing na isang 'green practice'?=Pagmamaneho ng sasakyang gumagamit ng gasolina>Pagtitipid sa kuryente at tubig+Pagreresaykel ng mga sirang bagay<Pag-iwas sa mga lalagyang minsan lang magagamit",
"Alin sa mga sumusunod ang halimbawa ng 'green practice' na maaaring gawin sa bahay?=Paggamit ng reusable utensils>Paggamit ng plastic bags+Pagsusunog ng basura sa bakuran<Pagtatapon ng bagay na maaari pang pakinabangan",
"Alin sa mga sumusunod ang maaaring gawin upang mabawasan ang 'carbon footprint' ng pamilya bilang pagmamalasakit sa kapaligiran?=Maglakad o gumamit ng bisikleta>Gumamit ng kotse sa lahat ng pagkakataon+Magmaneho ng sasakyang wala sa kundisyon<Gumamit ng mga appliances na matakaw sa kuryente",
"Alin sa mga sumusunod ang isa sa mga pangunahing epekto ng pagtugon ng pamilya sa hamon ng 'climate change'?=Mas mataas na antas ng kalinisan sa komunidad>Mas mataas na temperatura ng kapaligiran+Mas maraming gawain sa bahay<Mas mataas na carbon emission",
"Alin sa mga sumusunod ang HINDI kabilang sa mga masasamang epekto ng pagbabago ng klima?=Mabilis na pagbaba ng temperatura ng planeta>Pagtaas ng lebel ng dagat+Mas matitinding bagyo at tagtuyot<Pagkasira ng biodiversity",
"Bakit mahalaga ang pagbili ng mga produktong 'sustainable' o napapanatili bilang pagmamalasakit sa kapaligiran?=Upang bumaba ang pagkonsumo ng enerhiya sa produksyon ng mga produkto>Upang tumaas ang pagkonsumo ng enerhiya sa produksyon ng mga produkto+Upang tumaas ang carbon emission ng produksyon ng mga produkto<Upang mas dumami ang gumagawa ng mga produktong hindi napapanatili",
"Alin sa mga sumusunod ang benepisyo ng pagtatanim ng mga puno bilang pagtugon sa pagbabago ng klima?=Pagbabawas ng carbon sa atmospera>Pagdadagdag ng carbon sa atmospera+Pagbabawas ng oxygen sa atmospera<Pagpapababa ng antas ng biodiversity",
"Alin sa mga sumusunod ang maaaring gawin upang mabawasan ang paggamit ng 'single-use plastics' bilang pagmamalasakit sa kapaligiran?=Paggamit ng matibay na plastik na pinggan na maaaring hugasan nang paulit-ulit>Pagbili ng mineral water na nasa manipis na boteng plastik+Paggamit ng manipis na plastic bag para sa pinamimili<Paggamit ng mga plastik na kubyertos na madaling masira",
"Alin sa mga sumusunod ang hindi wastong pagtugon sa 'climate change' bilang pagmamalasakit sa kapaligiran?=Pagsusunog ng basura>Paggamit ng reusable bags+Paggamit ng renewable energy sources<Pagtatanim ng mga halaman at puno",
"Alin sa mga sumusunod ang hindi wastong pagtugon sa 'climate change' bilang pagmamalasakit sa kapaligiran?=Pagmamaneho ng sasakyan saanman pumunta>Pagreresaykel ng mga patapong bagay+Pagbabawas ng pagkonsumo ng enerhiya at tubig<Pagtangkilik sa mga produktong napapanatili",
"Ang pagbibigay ng kahit maliit na bahagi ng sariling pera para sa kawanggawa ay halimbawa ng alin sa mga sumusunod na uri ng pagmamalasakit sa kapwa?=Paglalaan ng pondo>Pagbabahagi ng mga bagay o gamit+Paglalaan ng oras<Paggamit ng kasanayan",
"Ang pagbibigay ng mga lumang damit at sapatos sa mga kapus-palad na kalaro ay halimbawa ng alin sa mga sumusunod na uri ng pagmamalasakit sa kapwa?=Pagbabahagi ng mga bagay o gamit>Paglalaan ng pondo+Paglalaan ng oras<Paggamit ng kasanayan",
"Ang pag-aalaga sa mga maysakit o pagbabantay sa mga bata ay halimbawa ng alin sa mga sumusunod na uri ng pagmamalasakit sa kapwa?=Paglalaan ng oras>Paglalaan ng pondo+Pagbabahagi ng mga bagay o gamit<Paggamit ng kasanayan",
"Ang pagbibigay ng isang dentista ng libreng serbisyong dental sa kanyang komunidad ay halimbawa ng alin sa mga sumusunod na uri ng pagmamalasakit sa kapwa?=Paggamit ng kasanayan>Paglalaan ng pondo+Pagbabahagi ng mga bagay o gamit<Pakikinig at pagpapakita ng suporta",
"Ano ang ibig sabihin ng pagpapakatao?=Pagpapahalaga sa dignidad ng sarili at kapwa>Pagkilos para makakuha ng papuri mula sa iba+Pagtutuon ng pansin sa sariling interes<Pagmamalaki sa sariling kakayahan",
"Alin sa mga sumusunod ang maituturing na halimbawa ng pagiging mapagmalasakit?=Pagtulong sa mga nasalanta ng bagyo nang walang kapalit>Pagtatrabaho para makabili ng mga personal na gamit+Pagbibigay ng donasyon para lamang mapuri ng iba<Pag-aangat ng sarili sa kapwa",
"Alin sa mga sumusunod ang isa sa mga pangunahing layunin ng pagpapakatao?=Maglingkod para sa kapakanan ng iba>Maging tanyag sa pamayanan+Makakuha ng mataas na posisyon sa lipunan<Maisaalang-alang ang pansariling interes",
"Alin sa mga sumusunod ang halimbawa ng kung paano maaaring makatulong ang pagpapaunlad ng sarili sa pamayanan?=Pagbabahagi ng natutunan upang makapaglingkod sa kapwa>Pagbuo ng sariling negosyo para sa personal na kita+Pagsisikap para umangat ang antas sa lipunan<Pagbabalewala sa mga isyu ng komunidad",
"Ano ang kahalagahan ng bayanihan sa pagpapabuti ng pamayanan?=Napapalakas nito ang pagkakaisa at pagtutulungan ng mga mamamayan>Ginagawa nitong tamad ang mga mamamayan+Natuturuan nito ang mga taong unahin ang kanilang personal na interes<Sinasanay nito ang mga taong huwag makialam sa iba",

);

?>

</head>

</bod

</html>