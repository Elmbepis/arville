<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masinop - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masinop";
$_SESSION['tnum']="*23";

$questions=array(

"Ano ang ibig sabihin ng pagiging masinop?=Matalinong paggamit ng mga bagay para hindi mag-aksaya>Paggamit ng labis na materyales sa ginagawa+Pagkakaroon ng maraming gamit<Pag-iwas sa paggamit ng mga bagay",
"Bakit mahalaga ang pagiging masinop?=Upang mapangalagaan ang kalikasan>Upang makabili tayo ng mga luho+Upang mabilis tayong yumaman<Upang hangaan tayo ng iba",
"Alin sa mga ito ang isang halimbawa ng pagiging masinop?=Pagpatay ng mga ilaw na hindi ginagamit>Pagtapon ng bagay na maaari pang gamitin+Pagbili ng bagong gamit kahit mayroon pang nagagamit<Pag-iwan sa gripo nang nakabukas",
"Alin sa mga ito ang mangyayari kapag hindi tayo magiging masinop?=Mauubusan tayo ng mga likas na yaman>Marami tayong maiipong pera+Mawawala ang polusyon<Magiging masagana ang ating buhay",
"Ano ang pangunahing layunin ng pagiging masinop?=Iwasan ang pag-aaksaya>Lumaki ang kita+Matapos agad ang mga gawain<Makakuha ng papuri mula sa iba",
"Ano ang ibig sabihin ng pagtitipid?=Paggamit ng mga bagay nang hindi nag-aaksaya>Pagbili ng mga bagay na hindi mahalaga+Pagtatago ng mga bagay para hindi magamit<Hindi pagpapahiram ng mga gamit",
"Alin sa mga ito ang halimbawa ng pagiging masinop?=Hindi pagtatapon ng mga bagay na maaari pang pakinabangan>Hindi pagsusulat sa likod ng papel+Pagbili ng mga bagay na madaling masira<Hindi pagpatay sa ilaw na hindi kailangan",
"Alin sa mga ito ang ginagawa para makatipid sa tubig?=Pagkukumpuni ng mga sirang tubo>Hindi pagsasarang mabuti ng gripo+Pagpapaagos ng tubig habang nagsisipilyo<Matagal na paggamit ng shower sa pagligo",
"Alin sa mga ito ang maaaring mangyari kung hindi tayo magtitipid ng tubig?=Mauubos ang malinis na tubig>Lalawak ang mga ilog at lawa+Mas dadalas ang pag-ulan<Magiging masagana ang ani",
"Alin sa mga ito ang ginagawa para makatipid sa kuryente?=Pagpatay sa mga ilaw na hindi ginagamit>Paggamit ng kasangkapang de-kuryente kahit hindi kailangan+Pag-iiwan sa TV nang nakabukas kahit walang nanonood<Paggamit ng aircon kahit malamig ang panahon",
"Alin sa mga ito ang halimbawa ng pagreresaykel?=Paggamit ng mga lata bilang taniman ng halaman>Pagsusunog ng basura+Pagtatapon ng gamit na hindi pa sira<Pagbabaon ng basura sa lupa",
"Bakit mahalagang hindi magluto ng labis-labis na pagkain?=Upang maiwasan ang pag-aaksaya nito>Upang bumaba ang ating timbang+Upang makatipid sa panggatong<Upang madaliang maghugas ng pinaglutuan",
"Alin sa mga ito ang isang halimbawa ng pagiging masinop sa paaralan?=Pag-iingat sa lapis upang magamit nang matagal>Paggamit ng notebook bilang laruan+Pagpilas sa mga pahina ng isang aklat<Hindi pagsulat sa likod ng papel",
"Bakit mahalagang bawasan ang paggamit ng plastik?=Dahil hindi ito naaagnas kaya nakakapinsala ito sa kapaligiran>Dahil mabilis itong mabulok sa lupa+Dahil mahirap bumili nito<Dahil mahal itong bilhin",
"Alin sa mga ito ang isa sa mga epekto ng pagiging masinop?=Pangangalaga ng kalikasan>Pagkaubos ng likas na yaman+Pagdami ng mga basura sa paligid<Pagdalas ng ating pagbili ng mga bagong gamit",
"Alin sa mga ito ang halimbawa ng pagiging masinop?=Pagtatabi ng mga gamit sa wastong lagayan>Pag-iwas sa pagreresaykel+Paglalaro ng mga papel na hindi pa nasusulatan<Hindi pag-ubos ng biniling pagkain",
"Alin sa mga ito ang nagpapakita ng pagiging responsable sa sariling gamit?=Wastong pagliligpit nito matapos gamitin>Pagtatapon nito kahit maaari pang gamitin+Pag-iiwan nito kahit saan<Hindi maingat na paggamit nito",
"Ano ang epekto ng pagreresaykel sa kapaligiran?=Nakakabawas ito sa basura>Nakakadagdag ito sa basura+Nakakaaksaya ito ng mga bagay<Nakakaubos ito ng likas na yaman",
"Alin sa mga ito ang dapat gawin upang maiwasan ang pag-aaksaya ng pagkain?=Ubusin ang pagkaing inilagay sa plato>Magtapon ng pagkain kahit maaari pa itong kainin+Magluto ng sobra-sobra<Iwanang nakatiwangwang ang pagkain sa mesa",
"Alin sa mga ito ang hindi isa sa mga epekto ng pagiging masinop?=Mabilis na pagkaubos ng likas na yaman>Pagbawas sa basura+Pag-iwas sa pag-aaksaya<Pagbawas sa gastusin",
"Alin sa mga ito ang makakatulong sa kalikasan?=Paggamit ng mga bagay na maaaring gamitin nang paulit-ulit>Paggamit ng mga bagay na isang beses lang magagamit tulad ng paper plates+Paggamit ng mga bagay na plastik<Pagsusunog ng basura sa bakuran",
"Alin sa mga ito ang maaaring mangyari kung hindi natin pag-iingatan ang ating mga gamit?=Mapapadalas ang pagbili natin ng bagong gamit>Mas makakatipid tayo+Mas mapapangalagaan natin ang kalikasan<Mababawasan ang basura sa paligid",
"Alin sa mga ito ang isa sa mga pangunahing dahilan ng pagkasira ng kalikasan?=Labis na paggamit ng likas na yaman>Pag-iwas sa paggamit ng plastik+Pagtitipid sa tubig at kuryente<Pagreresaykel ng basura",
"Ano ang dapat mong gawin sa mga lumang damit na ayaw mo nang isuot?=Ipamigay sa iba>Itapon sa basurahan+Sunugin sa labas<Pabayaan lang sa loob ng cabinet",
"Ano ang unang hakbang na dapat mong gawin kung may gamit kang nasira?=Subukang ipaayos ito>Itapon agad ito sa basurahan+Bumili agad ng kapalit<Iwanan ito sa kalsada",

);

?>

</head>

</bod

</html>