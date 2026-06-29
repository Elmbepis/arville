<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matapat - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matapat";
$_SESSION['tnum']="*7e";

$questions=array(

"Ano ang kahulugan ng katapatan sa isang pagkakaibigan?=Pagiging totoo sa salita at gawa>Pagsasabi ng totoo tuwing kinakailangan lamang+Pag-iwas sa pagkakaiba ng pananaw o opinyon<Pagsunod sa kaibigan sa lahat ng oras",
"Bakit mahalaga ang katapatan sa isang relasyon?=Upang magkaroon ng tiwala ang bawat isa>Upang maiwasan ang pagkakaiba ng pananaw o opinyon+Upang maipakita ang pagiging magaling<Upang makuha ang anumang gusto mula sa kaibigan",
"Ano ang ginagawa ng isang tapat na kaibigan kapag may nagawa itong mali?=Inaamin ang kasalanan>Itinatago ang pagkakamali+Inilalayo ang sarili sa pagkakasangkot<Isinisisi sa iba ang kamalian",
"Ano ang dapat mong gawin kung nahuli mong nagsisinungaling ang iyong kaibigan?=Kausapin siya nang maayos upang tanungin kung bakit>Huwag pansinin ang kanyang pagsisinungaling+Sabihin sa iba ang kanyang ginawa<Iwasan siya nang tuluyan",
"Ano ang nagiging epekto ng pagsisinungaling sa isang pagkakaibigan?=Pagbaba o pagkawala ng tiwala>Pagiging mas makahulugan ng relasyon+Pagtibay ng samahan<Pagkakaroon ng magagandang alaala",
"Alin sa mga sumusunod ang unang hakbang upang magkaroon ng bukas na komunikasyon?=Pakikinig nang mabuti>Pagbubunyag ng lihim ng iba+Pag-iwas sa ugnayan<Pagpilit ng sariling pananaw",
"Bakit mahalaga ang bukas na komunikasyon sa pagkakaibigan?=Upang mapanatili ang katapatan at tiwala ng bawat isa>Upang maiwasan ang pagkakaiba ng opinyon+Upang maiangat ang sarili<Upang masunod ang kagustuhan sa lahat ng oras",
"Ano ang ibig sabihin ng \"paggalang sa hangganan\" sa pagkakaibigan?=Paggalang sa limitasyon sa espasyo at oras ng kaibigan>Pagpapatawad sa kasalanan ng kaibigan+Pag-iwas sa kaibigan kapag galit<Pag-alam sa mga lihim ng kaibigan",
"Alin sa mga sumusunod ang nagpapakita ng wastong pagsuporta sa iyong kaibigan?=Pagtulong sa pagtupad ng kanyang pangarap>Pagsunod sa lahat ng kanyang kagustuhan+Pag-iwas sa kanyang mga problema<Pagsalungat sa kanyang mga desisyon",
"Alin sa mga sumusunod ang katangiang HINDI nagpapalalim ng pagkakaibigan?=Pagiging mapanghusga>Katapatan+Paggalang<Pagiging matulungin",
"Alin sa mga sumusunod ang mahalagang maitutulong ng isang tapat na kaibigan sa iyong pagharap sa mga hamon ng buhay?=Pagbibigay ng lakas ng loob>Pagsuporta sa iyong mga away+Pagtatago ng iyong mga lihim na kasalanan<Pag-uudyok sa masasamang hanapbuhay",
"Alin sa mga sumusunod ang nagagawa para sa atin ng isang tunay na kaibigan?=Pagpapalakas ng ating kumpiyansa>Pagpigil sa ating pagiging totoo+Pagpapababa ng ating pagpapahalaga sa sarili<Pagkasangkot natin sa masasamang gawain",
"Alin sa mga sumusunod ang HINDI kabilang sa mga layunin ng paglalaan ng panahon sa kaibigan?=Upang matuto ng mas maraming bisyo>Upang magkaroon ng mga pagkakataong magtulungan+Upang makabuo ng magagandang alaala<Upang ipakita ang pagpapahalaga sa ugnayan",
"Alin sa mga sumusunod ang HINDI nagpapalakas sa pagkakaibigan?=Pagsisinungaling>Pakikinig sa hinaing+Pagpapatawad<Pagtulong sa paglutas ng problema",
"Paano mo maipapakita ang pag-unawa sa isang kaibigan?=Pakikinig at paggalang sa kanyang opinyon>Pagpilit sa kanya ng iyong pananaw+Pag-iwas sa kanya kapag mayroon siyang problema<Paninisi sa kanya kapag may nagawa siyang mali",
"Alin sa mga sumusunod ang pinakamahalagang aspeto ng paghingi ng tawad?=Pagpapakita ng sinseridad at pagsisisi>Pagtatanggol sa iyong sarili+Pag-iyak nang malakas<Pagpapasa ng sisi sa ibang tao",
"Ano ang dapat gawin kung may nagawa kang mali sa iyong kaibigan?=Humingi agad ng tawad>Umiwas sa kanya+Sisihin siya sa nagawa<Magpalusot para maipagtanggol ang sarili",
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa kaibigan?=Pakikinig sa kanyang mga problema>Pagsasabi ng kanyang lihim sa iba+Pagsang-ayon sa lahat ng kanyang sinasabi<Pag-iwas sa kanya kapag may problema siya",
"Ano ang kahulugan ng pagpapakita ng malasakit sa kaibigan?=Pagpapahalaga sa kanyang damdamin at kalagayan>Pagsasantabi ng kanyang mga layunin at pangarap+Pagmamagaling sa harap niya<Pagsunod sa lahat ng gusto niya",
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa isang kaibigan?=Pagtulong malutas ang kanyang mga problema>Hindi pagpansin sa kanyang mga pinagdadaanan+Pagsasantabi ng kanyang damdamin<Paghadlang sa kanyang mga pangarap",
"Ano ang unang hakbang sa pagiging tapat sa sarili?=Pagkilala sa sariling damdamin at iniisip>Pagsunod sa gusto ng iba+Pagtatago ng nararamdaman<Panggagaya sa hinahangaan",
"Alin sa mga sumusunod ang katangiang nagsisilbing haligi ng integridad ng isang tao?=Katapatan sa salita at gawa>Katalinuhan+Pagiging masayahin<Pagiging masipag",
"Paano mo matutulungan ang isang kaibigang may problema?=Pakikinig at pagsuporta sa kanya>Pagpapayo nang walang pakikinig+Pagkukuwento sa iba ng kanyang problema<Panghuhusga kung bakit siya nagkaproblema",
"Alin sa mga sumusunod ang kilos na nagpapakita ng pagpapahalaga sa isang kaibigan?=Paglalaan ng oras para sa kanya>Paghahanap ng kanyang mga kamalian+Pag-iwas kapag siya ay may problema<Pagtatago ng iyong nararamdaman",
"Alin sa mga sumusunod ang nagpapalalim sa pag-unawa sa isang kaibigan?=Bukas na komunikasyon>Panghuhusga sa lahat ng oras+Pagpapakita ng sariling galing o kakayahan<Pag-iwas sa pakikipag-usap",
 
);

?>

</head>

</bod

</html>