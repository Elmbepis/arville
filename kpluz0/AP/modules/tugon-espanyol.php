<html>
<head>
<body>

<?php
$_SESSION['title']="Pagtugon ng mga Pilipino sa Kolonyalismong Espanyol";

$questions=array(

"Gaano katagal sinakop ng mga Espanyol ang Pilipinas?=333 taon>263 taon+420 taon<396 taon",
"Alin sa mga sumusunod ang kabilang sa mga pangunahing binago ng mga Espanyol?=Relihiyon, pamahalaan, at edukasyon>Pagkain, kasuotan, at laro+Panitikan, agham, at teknolohiya<Kalikasan at mga tanawin",
"Alin sa mga sumusunod na relihiyon ang ipinakilala ng mga Espanyol sa mga Pilipino?=Kristiyanismo>Hinduismo+Islam<Budismo",
"Alin sa mga sumusunod ang katutubong paniniwalang nananatili pa rin sa ilang mga Pilipino?=Pagbati ng \"tabi-tabi po\">Pagdiriwang ng Semana Santa+Pagsisimba tuwing Linggo<Pagdiriwang ng Pasko",
"Ano ang ipinakita ng mga Pilipino nang maghalo ang luma at bagong kultura noong panahon ng mga Espanyol?=Kakayahang mag-angkop>Pagkaligta sa tradisyon+Kakayahang umiwas sa lahat ng bago<Pagtangging matuto",
"Anong wika ang ginamit sa simbahan at paaralan noong panahon ng mga Espanyol?=Espanyol>Ingles+Cebuano<Tagalog",
"Ano ang ipinakita ng mga Pilipino sa paggamit ng sariling wika sa tahanan?=Pagpapanatili ng pagkakakilanlan>Mas malalim na pananampalataya+Pagkakaisa<Pagtangkilik sa mga Espanyol",
"Ano ang layunin ng sistemang pang-edukasyong dinala ng mga Espanyol sa Pilipinas?=Palaganapin ang relihiyon at kabutihang-asal>Palaganapin ang agham at sining+Pahusayin ang mga Pilipino sa pagnenegosyo<Turuan ang mga Pilipino ng mga bagong teknolohiya",
"Sino ang namamahala sa mga paaralan sa Pilipinas noong panahon ng mga Espanyol?=Mga pari at madre>Mga gurong Pilipino+Mga guro mula sa Espanya<Mga sundalong Espanyol",
"Saan ginamit ng mga edukadong Pilipino ang kanilang kaalaman noong panahon ng mga Espanyol?=Sa pakikipaglaban para sa karapatan ng bayan>Sa pagsisilbi sa mga Espanyol+Sa pagpapasikat sa mga Kastila<Sa sariling pagpapayaman",
"Ano ang ipinakita ng mga Pilipino sa pagtitiis sa pagsunod sa mga batas ng mga Espanyol?=Katatagan at pagtitiyaga>Pagkatakot sa kapangyarihan+Kawalan ng pag-asa<Pagkawatak-watak",
"Ano ang unang anyo ng pagtugon ng mga Pilipino sa kawalang-katarungan ng mga Espanyol?=Kilusang mapayapa>Pag-aalsa laban sa simbahan+Kilusang mapanghimagsik<Pagtangging sumunod sa batas",
"Ano ang pangunahing layunin ng mga Propagandista?=Magkaroon ng pantay na karapatan ang mga Pilipino>Ibagsak ang pamahalaang Espanyol+Palayasin ang lahat ng mga Espanyol<Magtaguyod ng bagong pananampalataya",
"Ano ang pangunahing layunin ng Katipunan?=Palayain ang Pilipinas mula sa Espanya>Maisulong ang mga karapatan ng mga Pilipino+Tumulong palaganapin ang Kristiyanismo<Maghain ng reklamo sa mga Espanyol",
"Alin sa mga sumusunod na pagtugon ng mga Pilipino sa pananakop ng mga Espanyol ang hindi gumagamit ng karahasan?=Tahimik na pagtutol>Rebolusyon+Pag-aalsa<Kilusang mapanghimagsik",
"Alin sa mga sumusunod ang paraan ng mga Pilipino noon upang makaiwas sa polo y servicios o sapilitang paggawa?=Pagbabayad o pagtakas>Pakikipaglaban+Pag-alis sa bansa<Pagtatago sa simbahan",
"Alin sa mga sumusunod ang naging paraan ng pagtugon ng mga Pilipino sa pagdadala ng mga Espanyol ng Kristiyanismo sa Pilipinas?=Pag-aangkop sa pagbabago>Paggamit ng edukasyon+Pagtitiis sa pagsunod sa batas<Tahimik na pagtutol",
"Ang paggamit ng mga Pilipino ng wikang Espanyol noong panahon ng mga Kastila ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon sa kanilang pananakop?=Pag-aangkop sa pagbabago>Paghihimagsik+Pagtitiis sa pagsunod sa batas<Tahimik na pagtutol",
"Ang paggamit ng mga Pilipino sa kanilang kaalaman sa wika upang ipaglaban ang karapatan ng bayan ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon sa pananakop ng mga Espanyol?=Paggamit ng edukasyon>Pag-aangkop sa pagbabago+Pagtitiis sa pagsunod sa batas<Tahimik na pagtutol",
"Ang pagsulat ni Jose Rizal ng kanyang mga nobela ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon sa pananakop ng mga Espanyol?=Paggamit ng edukasyon>Pag-aangkop sa pagbabago+Pagtitiis sa pagsunod sa batas<Tahimik na pagtutol",
"Ang pagbabayad ng buwis ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon ng mga Pilipino sa pananakop ng mga Kastila?=Pagtitiis sa pagsunod sa batas>Pag-aangkop sa pagbabago+Paggamit ng edukasyon<Tahimik na pagtutol",
"Ang paglahok sa polo y servicios ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon ng mga Pilipino sa pananakop ng mga Kastila?=Pagtitiis sa pagsunod sa batas>Pag-aangkop sa pagbabago+Paggamit ng edukasyon<Tahimik na pagtutol",
"Ang hindi pagsasantabi ng mga Pilipino ng mga kaugaliang gaya ng bayanihan ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon ng mga Pilipino sa pananakop ng mga Espanyol?=Tahimik na pagtutol>Pag-aangkop sa pagbabago+Paggamit ng edukasyon<Pagtitiis sa pagsunod sa batas",
"Ang paggamit ng mga Pilipino ng mga katutubong sayaw at awit sa mga pagdiriwang ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon ng mga Pilipino sa pananakop ng mga Espanyol?=Tahimik na pagtutol>Pag-aangkop sa pagbabago+Paggamit ng edukasyon<Pagtitiis sa pagsunod sa batas",
"Ang Propaganda Movement ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon ng mga Pilipino sa pananakop ng mga Espanyol?=Kilusang mapayapa>Pag-aangkop sa pagbabago+Kilusang mapanghimagsik<Pagtitiis sa pagsunod sa batas",
"Ang pag-usbong at pag-iral ng KKK ay halimbawa ng alin sa mga sumusunod na paraan ng pagtugon ng mga Pilipino sa pananakop ng mga Espanyol?=Kilusang mapanghimagsik>Pag-aangkop sa pagbabago+Kilusang mapayapa<Pagtitiis sa pagsunod sa batas",

);


?>

</head>

</body>

</html>