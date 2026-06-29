<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magiliw - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magiliw";
$_SESSION['tnum']="*5j";

$questions=array(

"Ano ang ibig sabihin ng pagiging magiliw?=Pagiging palabati at palangiti>Pagiging mapag-isa+Pagiging mapanghimasok sa buhay ng iba<Pagiging palaaway",
"Alin sa mga sumusunod ang saligan para sa isang ligtas at masayang pamayanan?=Matibay na ugnayan ng pamilya sa mga kapitbahay>Pagiging mayaman at makapangyarihan ng bawat pamilya+Pag-uuna ng bawat pamilya ng sariling kapakanan<Pag-iiwasan ng mga magkakapitbahay",
"Alin sa mga sumusunod ang hindi bahagi ng magandang pakikisalamuha sa kapitbahay?=Pagiging mapanghimasok at pakialamero>Pagpapakita ng respeto+Pagbati at magiliw na pakikipag-usap<Pagtulong sa abot ng makakaya",
"Alin sa mga sumusunod ang hindi magandang gawin kung may mga bagong kapitbahay?=Pagsimangot at pag-iwas sa kanila>Pagpapakilala sa kanila+Pagpapadala ng meryenda tulad ng kakanin<Pagtulong sa pagsasaayos ng kanilang nilipatang tahanan",
"Paano nakatutulong ang paggamit ng 'online group chat' sa pakikisalamuha sa ibang tao?=Napapabilis nito ang pagpapalitan ng mahahalagang impormasyon>Napapabilis nito ang pagkakalat ng mga tsismis+Napapadalang nito ang harapang pag-uusap ng mga tao<Napapadali nito ang paghahatid ng pekeng balita",
"Alin sa mga sumusunod ang nagpapatibay ng tiwala ng magkakapitbahay sa isa't isa?=Pag-aalok ng tulong sa abot ng makakaya>Paghiram ng gamit nang walang paalam+Pag-iingay sa gabi<Panghihimasok at pakikialam sa buhay ng may buhay",
"Alin sa mga sumusunod ang nagpapakita ng konsiderasyon at paggalang sa espasyo ng kapwa?=Hindi paglalagay ng anumang bagay sa bakuran ng kapitbahay>Pagtatapon ng basura sa harap ng katabing bahay+Pagpapatugtog ng malakas na musika sa gabi<Pagpitas ng mga prutas sa puno ng kapitbahay",
"Alin sa mga sumusunod na paraan ng maayos na pakikisalamuha sa kapitbahay ang sumasaklaw sa pagpapakilala at pagbati sa kanila?=Pagbuo ng koneksiyon>Komunikasyong dihital+Pagiging huwarang pamilya<Pakikiisa sa mga gawaing pampamayanan",
"Alin sa mga sumusunod na paraan ng maayos na pakikisalamuha sa kapitbahay ang tumutukoy sa paggamit ng 'group chat' o 'social media' para makipag-usap sa kanila?=Komunikasyong dihital>Pagbuo ng koneksiyon+Pagiging huwarang pamilya<Pakikiisa sa mga gawaing pampamayanan",
"Alin sa mga sumusunod na paraan ng maayos na pakikisalamuha sa kapitbahay ang sumasaklaw sa pagpapakita ng magandang asal, pagiging matulungin, at paggalang sa kapwa?=Pagiging huwarang pamilya>Pagpapanatili ng magandang kapaligiran+Komunikasyong dihital<Pakikiisa sa mga gawaing pampamayanan",
"Ang boluntaryong pakikilahok sa isang 'clean-up drive' o 'medical mission' ay halimbawa ng alin sa mga sumusunod na paraan ng maayos na pakikisalamuha sa kapitbahay?=Pakikiisa sa mga gawaing pampamayanan>Pagpapanatili ng magandang kapaligiran+Komunikasyong dihital<Pagiging huwarang pamilya",
"Ang pagbabantay ng bahay ng kapitbahay habang wala sila at pamamalengke para sa kanila ay mga halimbawa ng alin sa mga sumusunod na paraan ng maayos na pakikisalamuha sa kapitbahay?=Palagiang pag-aalok ng tulong>Komunikasyong dihital+Pagpapanatili ng magandang kapaligiran<Pakikiisa sa mga gawaing pampamayanan",
"Ang pagwawalis at pagtatanim ng magagandang halaman sa harap ng bahay ay halimbawa ng alin sa mga sumusunod na paraan ng maayos na pakikisalamuha sa kapitbahay?=Pagpapanatili ng magandang kapaligiran>Komunikasyong dihital+Palagiang pag-aalok ng tulong<Pakikiisa sa mga gawaing pampamayanan",
"Alin sa mga sumusunod ang epekto ng magiliw na pakikisalamuha ng isang pamilya sa kanilang mga kapitbahay?=Magandang samahan>Madalas na di-pagkakaunawaan+Matinding inggitan<Kawalan ng tiwala",
"Alin sa mga sumusunod ang wastong paggamit ng 'social media' para sa pakikitungo sa mga kapitbahay?=Pagbabahagi ng mahahalagang impormasyon para sa isang aktibidad>Pagkakalat ng mga pekeng balita+Paninira ng puri ng iba<Panlilinlang para magkapera",
"Ano ang dapat gawin ng inyong pamilya kapag may kapitbahay kayong nawalan ng pinagkakakitaan at naghihikahos na sa buhay?=Mag-alok ng tulong sa abot ng makakaya>Ikuwento sa iba ang kanilang kalagayan+Umiwas sa kanila para hindi mautangan<Pagtawanan at kutyain sila",
"Ano ang ipinapakita ng iyong pagbisita at pagdadala ng handog na kakanin sa isang bagong kapitbahay?=Pagnanais na makapagsimula ng magandang samahan>Pagiging angat sa kanila+Pagnanais na umutang sa kanila<Kawalan ng pakialam sa kanila",
"Ano ang karaniwang bunga ng pagiging huwaran ng isang pamilya sa kagandahang-asal at pagiging mapaglingkod?=Nahihikayat ang ibang pamilyang tularan sila>Nagkakaroon ng kumpetisyon kung aling pamilya ang pinakamagaling+Naiinggit ang ibang pamilya sa kanila<Nauudyok ang ibang pamilyang iwasan sila",
"Alin sa mga sumusunod ang hindi nagpapakita ng paggalang sa espasyo ng kapitbahay?=Pagsisiga malapit sa bintana ng kapitbahay>Pagpapanatili ng kalinisan ng sariling bakuran+Pagtatanim ng magagandang halaman sa sariling hardin<Pag-iwas sa pag-iingay sa gabi",
"Bakit dapat iwasan ang pag-iingay pagkatapos ng oras ng hapunan?=Para magpakita ng konsiderasyon sa pagpapahinga ng kapitbahay>Para hindi mapagod bago matulog+Para matunawan sa kinain<Para makatipid sa kuryente",
"Alin sa mga sumusunod ang hindi halimbawa ng tulong na maiaalok mo sa isang kapitbahay na may sakit?=Pagyayayang mamasyal sa mall>Pagbabantay sa mga anak niyang bata+Pagbili ng gamot sa botika<Pag-aabot ng mga gamit sa kanya",
"Alin sa mga sumusunod ang hindi elemento ng mabuting pakikisalamuha sa kapwa?=Pakikialam at panghihimasok>Pakikipag-usap sa magiliw at magalang na paraan+Pag-aalok ng tulong<Paggalang sa personal na espasyo at oras",
"Ano ang inaasahang epekto ng palagiang pagbati at magiliw na pakikipag-usap sa kapitbahay?=Tiwala at koneksiyon sa bawat isa>Pagdududa sa layunin ng bawat isa+Kawalan ng privacy<Madalas na di-pagkakaunawaan",
"Ano ang dapat mong gawin kung nagkamali sa iyo ang isa mong malapit na kaibigan?=Kausapin siya nang mahinahon para maayos ang di-pagkakaunawaan>Ipagkalat sa buong barangay ang kanyang pagkakamali+Magtampo at huwag na siyang kausapin magpakailanman<Gumanti nang mas matindi",
"Alin sa mga sumusunod ang malamang na maging epekto ng hindi pakikisalamuha ng isang pamilya sa ibang pamilya?=Maaari silang mahirapang humingi ng tulong sa oras ng pangangailangan>Mas marami silang magiging kaibigan sa labas ng barangay+Masasabik ang mga kapitbahay na makisalamuha sa kanila<Dadami ang hihingi ng tulong sa kanila",

);

?>

</head>

</bod

</html>