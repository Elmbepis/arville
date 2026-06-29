<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa mga Pilipinong Nag-ambag - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa mga Pilipinong Nag-ambag";
$_SESSION['tnum']="*66";

$questions=array(

"Bakit mahalagang kilalanin ang mga Pilipinong nag-ambag sa ating bansa?=Upang mapahalagahan ang mga ginawa nilang sakripisyo>Upang dumami ang mga rebulto sa parke+Upang madagdagan ang mga pagdiriwang sa ating bansa<Upang madagdagan ang mga pag-aaralan ng mga kabataan",
"Sino ang sumulat ng Noli Me Tangere at El Filibusterismo?=Dr. Jose Rizal>Andres Bonifacio+Apolinario Mabini<Emilio Jacinto",
"Sino ang nagtatag ng Katipunan?=Andres Bonifacio>Dr. Jose Rizal+Apolinario Mabini<Heneral Antonio Luna",
"Bakit tinawag na 'Ina ng Katipunan' si Melchora Aquino?=Dahil tinanggap niya at pinakain ang mga katipunero sa kanyang bahay>Dahil siya ang nagtatag ng Katipunan+Dahil siya ang sumulat ng mga kuwento tungkol sa Katipunan<Dahil siya ang asawa ni Andres Bonifacio",
"Sino ang kauna-unahang babaeng namuno sa isang pag-aalsa sa Pilipinas?=Gabriela Silang>Melchora Aquino+Teresa Magbanua<Gregoria de Jesus",
"Sino ang nagsilbing tagapayo ni Emilio Aguinaldo na kilala rin sa tawag na 'Dakilang Lumpo'?=Apolinario Mabini>Heneral Antonio Luna+Diego Silang<Emilio Jacinto",
"Sino sa mga sumusunod na boksingero ang tinaguriang 'Pambansang Kamao'?=Manny Pacquiao>Gabriel Elorde+Nonito Donaire<Pancho Villa",
"Bakit natatangi si Manny Pacquiao sa mundo ng boksing?=Siya pa lang ang nagkampeon sa walong magkakaibang weight divisions>Wala siyang talo ni isa sa pagboboksing+Siya ang boksingerong may pinakamaraming panalo<Siya ang boksingerong pinakamalaki ang kinita",
"Alin sa mga sumusunod ang hindi kabilang sa mga naiambag ni Lea Salonga sa ating bansa at sa buong mundo?=Unang Pilipinong nagwagi ng gintong medalya sa Olympics>Unang gumanap bilang Kim sa Miss Saigon+Umawit bilang tinig ng Disney princess na si Jasmine<Umawit bilang tinig ni Fa Mulan ng Disney",
"Anong natatanging nagawa ni Hidilyn Diaz?=Unang Pilipinong nagwagi ng gintong medalya sa Olympics>Unang babaeng Pilipinong nagkampeon sa boksing+Unang Pilipinong nagwagi sa Miss Universe<Unang gumanap bilang Kim sa Miss Saigon",
"Sino ang nagtatag ng unang pediatric hospital sa Pilipinas?=Dr. Fe del Mundo>Dr. Arturo P. Alcaraz+Dr. Gregorio Zara<Dr. Eduardo Quisumbing",
"Ano ang naimbento ni Dr. Gregorio Zara?=Videophone>Bamboo incubator+Geothermal energy plant<Internet",
"Bakit mahalaga ang kontribusyon ni Arturo Alcaraz sa Pilipinas?=Nanguna siya sa paggamit ng Pilipinas ng geothermal energy>Nanguna siya sa paggamit ng Pilipinas ng hydroelectric energy+Nakadiskubre siya ng deposito ng natural gas sa Pilipinas<Nakadiskubre siya ng deposito ng langis sa Pilipinas",
"Sa anong larangan nag-ambag si Gina Lopez sa ating bansa?=Sa pangangalaga ng kalikasan>Sa palakasan+Sa pagganap sa ibabaw ng entablado<Sa medisina",
"Anong makasaysayang pangyayari ang pinangunahan ni Cory Aquino?=EDSA People Power Revolution>Pagtatatag ng Unang Republika ng Pilipinas+Digmaang Pilipino-Amerikano<Second People Power Revolution",
"Bakit mahalagang ibahagi mo ang kuwento ng mga dakilang Pilipino sa iba?=Upang patuloy silang makapagbigay ng inspirasyon sa mga Pilipino>Upang magkaroon ka ng maraming followers sa social media+Upang hangaan ka ng mga Pilipino<Upang makakuha ka ng karagdagang puntos sa klase",
"Alin sa mga sumusunod ang pinakamahusay na paraan upang parangalan ang ating mga bayani?=Pagsunod sa kanilang mga mabubuting halimbawa>Paggawa ng mga rebulto para sa kanila+Pagpaparada tuwing Araw ng mga Bayani para parangalan sila<Pagbabasa lamang tungkol sa kanila",
"Kung hinahangaan mo si Jose Rizal dahil sa kanyang pagmamahal sa edukasyon, ano ang dapat mong gawin?=Mag-aral nang mabuti>Maging boksingero+Gumanap sa ibabaw ng entablado<Maging sikat na mang-aawit",
"Ano ang dapat mong gawin tuwing inaawit ang Lupang Hinirang?=Tumayo nang tuwid at makiawit nang may paggalang>Umupo at manahimik lamang+Mag-cellphone habang umaawit<Magpatuloy sa anumang ginagawa",
"Alin sa mga sumusunod ang pangunahing epekto sa iyo ng pagpapasalamat mo sa ating mga bayani?=Paglalim ng pagmamahal mo sa bayan>Pagkakaroon mo ng mas matataas na grado sa paaralan+Pagbabawas ng mga gawaing-bahay na nakatoka sa iyo<Pagdami ng mga followers mo sa social media",
"Ano ang nagiging epekto sa atin ng mga kuwento ng ating mga bayani sa panahon ng pagsubok?=Nabibigyan tayo ng lakas na harapin ang mga hamon sa buhay>Naiisip nating sumuko na lamang para hindi mahirapan+Nababawasan ang ating pagkakaisa bilang isang lahi<Bumababa ang tiwala natin sa ating sarili",
"Paano binubuo ang isang 'Hero Wall' upang magpakita ng pasasalamat sa ating mga bayani?=Pagdidikit ng kanilang mga larawan at pagsusulat sa ilalim ng kanilang ambag>Pagsasandal ng kanilang mga rebulto sa isang pader ng pampublikong gusali+Pagpipinta ng isang malaking mural sa isang dingding ng paaralan<Pagsasabit ng mga bandila sa mga pader ng isang silid",
"Alin sa mga sumusunod na paraan ng pagpapasalamat sa mga dakilang Pilipino ang magagawa mo lamang sa isang nabubuhay pang Pilipinong hinahangaan mo?=Pagsulat ng liham ng pasasalamat>Pagbahagi ng kanilang mga kwento sa iba+Paggawa ng isang poster<Pagtulad sa kanilang mabubuting katangian",
"Alin sa mga sumusunod na paraan ng pagpapasalamat sa mga dakilang Pilipino ang tumutukoy sa paggawa ng isang likhang sining na may teksto at grapikong disenyo?=Paggawa ng isang poster>Pagbahagi ng kanilang mga kwento sa iba+Pagsulat ng liham ng pasasalamat<Pagtulad sa kanilang mabubuting katangian",
"Ang pagpapakita ng malalim na respeto habang tinitiklop mo ang ating watawat ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapasalamat sa mga dakilang Pilipino?=Paggalang sa mga simbolo ng ating bansa>Pagbahagi ng kanilang mga kwento sa iba+Pagsulat ng liham ng pasasalamat<Paggawa ng isang poster",
 
);

?>

</head>

</body

</html>