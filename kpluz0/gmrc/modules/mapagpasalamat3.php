<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa mga Makabagong Bayani - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa<br/>mga Makabagong Bayani";
$_SESSION['tnum']="*3n";

$questions=array(  

"Sino ang mga tinatawag na mga makabagong bayani?=Mga taong naglilingkod at nagsasakripisyo para sa kapwa sa kasalukuyan>Mga pambansang bayani sa ating kasaysayan+Mga mayayaman at makapangyarihang tao<Mga taong labis na nagtagumpay sa isang larangan",
"Alin sa mga ito ang isang simpleng paraan ng pagpapasalamat sa mga makabagong bayani?=Pagbibigay ng nilikhang \"Salamat, Bayani\" card>Pagbabalewala sa mga sakripisyo ng mga ordinaryong manggagawa+Pag-iwas sa mga pulis, sundalo, at bumbero<Hindi pakikinig sa guro",
"Ano ang layunin ng pagsasagawa ng mga mag-aaral ng 'role-playing' tungkol sa isang delivery rider?=Maunawaan ang kahalagahan at pagsasakripisyo ng mga delivery rider>Makapagyabang na ikaw ay isang bayani+Makaiwas sa mga pagsusulit<Mapagtawanan ang ginagawa ng mga delivery rider",
"Alin sa mga ito ang magagawa mo para maparangalan mo ang inyong guro bilang isang makabagong bayani?=Pagsulat ng tula o awit tungkol sa kanyang kabutihan>Hindi pagsunod sa kanyang mga utos+Pandaraya sa kanyang pagsusulit<Pag-iingay sa kanyang klase",
"Ano ang \"Wall of Modern Day Heroes\" sa silid-aralan?=Nakasabit na collage ng mga larawan ng mga makabagong bayani>Pader na sinulatan ng masasamang komento tungkol sa mga makabagong bayani+Pader na marumi at sira-sira<Pader na dinikitan ng mga larawan ng mga pambansang bayani sa ating kasaysayan",
"Alin sa mga ito ang hindi halimbawa ng makabagong bayani?=Katipunero>Guro+Pulis<Health worker",
"Bakit mahalagang magkuwento tungkol sa isang barangay tanod o health worker?=Upang maipaalam sa marami ang kanilang kabayanihan>Upang maipaalam sa marami na hindi sila dapat tularan+Para makapagbahagi ng tsismis tungkol sa kanila<Para gawing katatawanan ang kanilang pagtatrabaho",
"Anong damdamin ang dapat nating ipakita sa mga taong tumutulong sa panahon ng krisis?=Pasasalamat at paghanga>Pagtatampo o galit+Pagkatakot<Pagkainggit",
"Alin sa mga ito ang hindi nagpapakita ng pasasalamat sa mga basurero?=Pagtatambak ng basura kung saan-saan>Pagbati at pagngiti sa kanila+Pagsunod sa kanilang iskedyul<Wastong pagsusupot o pagsasako ng basura",
"Alin sa mga ito ang hindi nagpapakita ng pasasalamat sa mga guro?=Hindi paggawa ng takdang aralin>Pagbati sa kanila tuwing umaga+Pagsunod sa kanilang mga utos<Pagsisikap sa pag-aaral",
"Alin sa mga ito ang hindi nagpapakita ng pasasalamat sa mga delivery rider?=Pagtataas ng boses sa kanila>Pagpapasalamat sa kanilang delivery+Agad na pagtugon sa kanilang tawag<Pagngiti habang nakikipag-usap sa kanila",
"Alin sa mga ito ang hindi nagpapakita ng pasasalamat sa mga kaminero?=Pagtatapon ng balat ng kendi kung saan-saan>Pagwawalis ng harap ng bahay+Pag-aalok ng tubig sa kanila<Magalang na pakikipag-usap sa kanila",
"Alin sa mga ito ang hindi nagpapakita ng pasasalamat sa mga traffic enforcer?=Paglalaro sa gitna ng kalsada>Pagtawid sa tamang tawiran+Pagsunod sa ilaw trapiko<Pagsunod sa kanilang mga senyas",
"Alin sa mga ito ang nagpapakita ng pasasalamat sa mga pulis?=Pagsunod sa mga batas at alituntunin>Pagtawid sa mga bawal tawiran+Paglabag sa ilaw trapiko<Pananakit o panlalamang sa kapwa",
"Alin sa mga ito ang nagpapakita ng pasasalamat sa mga bumbero?=Pagbibigay-daan sa kanila>Pagsusulat sa kanilang trak+Paglalaro ng posporo o kandila<Pagpapatunog ng fire alarm kahit walang sunog",
"Alin sa mga ito ang ipinapakita ng mga makabagong bayani?=Pagsasakripisyo para makagawa ng kabutihan>Pag-uuna ng sariling kapakanan+Kawalan ng sipag at tiyaga<Pagtangging maglingkod sa kapwa",
"Alin sa mga ito ang karaniwang epekto sa atin ng mga makabagong bayani?=Nahihikayat tayong gumawa ng mabuti sa sarili nating paraan>Bumababa ang ating tiwala sa sarili+Nawawalan tayo ng pag-asa<Nawawala ang gana nating magsilbi sa kapwa",
"Sino sa mga makabagong bayaning ito ang nag-alaga sa mga maysakit noong panahon ng pandemya kahit may panganib na mahawa sila?=Health worker>Delivery rider+Pulis<Sundalo",
"Sino sa mga makabagong bayaning ito ang nagpapanatili ng kapayapaan sa ating komunidad kahit may panganib na mapahamak sila?=Pulis>Delivery rider+Health worker<Sundalo",
"Sino sa mga makabagong bayaning ito ang naghahatid ng ating mga pangangailangan kahit mapanganib magmotorsiklo sa ating mga lansangan?=Delivery rider>Pulis+Health worker<Bumbero",
"Sino sa mga makabagong bayaning ito ang nagbubuwis ng kanilang mga buhay para maipagtanggol ang kalayaan ng ating bansa?=Sundalo>Pulis+Health worker<Delivery rider",
"Sino sa mga makabagong bayaning ito ang nagtataya ng kanilang buhay para mapatay ang mga sunog sa iba't ibang lugar ng ating bansa?=Bumbero>Pulis+Health worker<Sundalo",
"Sino sa mga makabagong bayaning ito ang nagtitiis magtrabaho sa ibang bansa para masuportahan ang kanilang pamilya rito sa Pilipinas?=OFW>Pulis+Guro<Sundalo",
"Sino sa mga makabagong bayaning ito ang gumugugol ng napakaraming oras araw-araw para maturuan ang mga bata sa mga paaralan?=Guro>Pulis+Bumbero<Sundalo",
"Sino sa mga makabagong bayaning ito ang nagpapanatili ng kalinisan ng ating kapaligiran kahit mapanganib sa kanilang kalusugan ang kanilang trabaho?=Basurero>Delivery rider+Bumbero<Sundalo",
 
);

?>

</head>

</bod

</html>