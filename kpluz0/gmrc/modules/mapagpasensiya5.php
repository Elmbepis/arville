<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasensiya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasensiya";
$_SESSION['tnum']="*5d";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapagpasensiya?=Pagiging matiisin at mahinahon sa gitna ng mahirap na sitwasyon>Pagbabalewala sa mga suliranin+Pag-iwas sa kapwa kapag may hinaharap na pagsubok<Pagmamalaki sa kapwa kahit may problema",
"Alin sa mga sumusunod ang karaniwang epekto ng maayos na pamamahala ng emosyon sa pakikitungo sa kapwa?=Maayos na ugnayan sa lahat>Pagbaba ng tiwala sa sarili+Pagdami ng mga kaalitan<Paglayo ng mga kaibigan",
"Alin sa mga sumusunod ang unang hakbang sa pagpigil ng galit sa kapwa?=Huminga nang malalim>Sabihin ang saloobin kahit makakasakit ito+Tumalikod at lumayo<Sumigaw para mailabas ang damdamin",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya ang tumutukoy sa pananahimik muna nang sandali kapag umiinit na ang pag-uusap?=Pag-iwas sa pagtatalo>Pagtawag sa guro o magulang+Pagsusulat ng nararamdaman<Pananalangin",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya ang tumutukoy sa paghingi ng tulong sa nakatatanda?=Pagtawag sa guro o magulang>Pag-iwas sa pagtatalo+Pagsasalita sa magalang na paraan<Pananalangin",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya ang tumutukoy sa paglalabas ng ating emosyon nang hindi nagsasalita?=Pagsusulat ng nararamdaman>Pakikipag-usap sa magalang na paraan+Pagtawag sa guro o magulang<Paghingi ng payo sa mapagkakatiwalaang tao",
"Ang paggamit ng 'po' at 'opo', paghingi ng paumanhin, at pagiging mahinahon sa pakikipag-usap ay mga sangkap ng alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya?=Pagsasalita sa magalang na paraan>Pagsusulat ng nararamdaman+Pag-iwas sa mga sitwasyong nakakainit ng ulo<Pakikipag-usap sa mapagkakatiwalaang tao",
"Ang paglayo sa kaklaseng mahilig mang-away ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya?=Pag-iwas sa mga sitwasyong nakakainit ng ulo>Pagsasalita sa magalang na paraan+Pagtawag sa guro o magulang<Pakikipag-usap sa mapagkakatiwalaang tao",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya ang tumutukoy sa paghingi ng lakas at gabay sa Diyos?=Pananalangin>Pakikipag-usap sa mapagkakatiwalaang tao+Pagsasalita sa magalang na paraan<Pagsusulat ng nararamdaman",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng ating pasensiya ang tumutukoy sa pagbabahagi ng ating nararamdaman sa isang kaibigan, guro, o taong iginagalang?=Pakikipag-usap sa mapagkakatiwalaang tao>Pag-iwas sa pagtatalo+Pagsasalita sa magalang na paraan<Pag-iwas sa mga sitwasyong nakakainit ng ulo",
"Ano ang magagawa mo para makapagpakita ng respeto sa kausap kahit mayroon kayong di-pagkakaunawaan?=Pagsasalita sa magalang na paraan>Paggamit ng mataas na boses+Pag-alis nang walang paalam<Pagtawa sa kanyang mga sinasabi",
"Alin sa mga sumusunod ang susi sa responsableng pakikipagkapwa?=Maayos na pamamahala sa sariling emosyon>Pagsang-ayon sa lahat ng mga tao+Pag-iwas sa pakikipag-usap sa iba<Pagpapakita ng tapang",
"Alin sa mga sumusunod ang hindi kabilang sa mga mainam na paraan ng paglalabas ng sariling damdamin?=Pagsigaw sa kausap>Paghinga nang malalim+Pagsulat ng nararamdaman<Pagdarasal sa isang tahimik na lugar",
"Alin sa mga ito ang magandang maibibigay sa iyo ng isang tahimik na lugar kapag may problemang bumabagabag sa iyo?=Pagkakataong makapag-isip nang malinaw>Pagkakataong umiyak nang malakas+Pagkakataong tumalikod sa buong mundo<Pagkakataong magplano ng paghihiganti",
"Alin sa mga sumusunod ang hindi magandang gawin kapag nagagalit?=Magbato o manira ng gamit>Huminga nang malalim+Maghinga ng sama ng loob sa isang pinagkakatiwalaang tao<Magsulat ng nararamdaman sa papel",
"Ano ang tawag sa iyo kung nagpapakita ka ng pagtitimpi kahit ikaw ay nasa kalagayang napakahirap sikmurain?=Mapagpasensiya>Mapaghiganti+Mapagmalaki<Mapanghusga",
"Ano ang kahulugan ng pamamahala sa sariling emosyon?=Pagkilala sa nararamdaman at pagkontrol sa epekto nito>Pagpipilit maging masaya sa lahat ng oras+Pagbabalewala sa mga problema<Pagkakaila sa mga negatibong damdamin",
"Kailan mainam humingi ng tulong sa isang nakatatanda o pinagkakatiwalaang tao?=Kapag hindi mo na kayang pigilan ang iyong galit>Kapag masyado ka nang inaantok+Kapag naiinip ka na sa iyong hinihintay<Kapag nababagot ka na sa iyong kausap",
"Alin sa mga sumusunod ang hindi makakatulong para maiwasan mo ang pagkasira ng iyong relasyon sa iba?=Pakikipagtalo nang pasigaw>Pagkontrol ng sariling emosyon+Pag-iisip muna bago magsalita o kumilos<Paggamit ng magalang na pananalita",
"Alin sa mga sumusunod ang nagpapakita pa rin ng paggalang kahit na bigkasin habang may di-pagkakaunawaan?=Pasensya na po.>Bahala ka sa buhay mo.+Tigilan mo ako!<Wala kang kuwenta!",
"Alin sa mga sumusunod ang hindi karaniwang ginagawa ng isang taong mapagpasensiya?=Magpadalus-dalos>Maghintay nang matagal+Magtimpi ng galit<Magtiis sa kalagayan",
"Alin sa mga sumusunod ang kilos na maiuugnay sa pagiging mapagpasensiya?=Kalmadong pagtugon sa alitan>Masakit na pagsasalita+Paghahamon ng away<Paghahagis ng gamit",
"Alin sa mga sumusunod ang pinakamainam na alternatibo sa pakikipagtalo?=Pananahimik muna at pakikinig>Pakikipagsabayan sa pagsasalita+Pagtawa sa sinasabi ng kausap<Biglaang pagtalikod at pag-alis",
"Bakit dapat nating matutunan ang pagkilala at pag-unawa sa ating sariling emosyon?=Para malaman din natin ang tamang pagtugon dito>Para maisisi sa iba ang nararamdaman+Para maitanggi o maipagkaila ang sariling damdamin<Para magamit ito sa pagmamanipula ng kapwa",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraang makakatulong sa isang kaibigang may matinding emosyon?=Pagbibiro tungkol sa kanyang pinagdadaanan>Pakikinig nang maigi sa kanya+Pagpapakita sa kanya ng empatiya<Pagbibigay sa kanya ng suporta",

);

?>

</head>

</bod

</html>