<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Positibo sa Buhay - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Positibo sa Buhay";
$_SESSION['tnum']="*5n";

$questions=array(

"Alin sa mga sumusunod ang bunga ng pagkakaroon ng positibong pananaw sa buhay?=Mas maligaya at makabuluhang buhay>Labis na pag-aalala+Kawalan ng lakas ng loob na harapin ang mga hamon sa buhay<Paninisi sa sarili",
"Alin sa mga sumusunod ang hindi humuhubog ng positibong pagtingin sa kapwa?=Kawalan ng pananampalataya>Pagtutulungan at pagkakaisa ng mga mamamayan+Pamayanang nakatuon sa paghilom at hindi sa paghuhusga<Paniniwalang ang bawat tao ay may taglay sa kabutihan",
"Alin sa mga sumusunod ang isang paraan ng pagsasabuhay ng positibong pagtingin?=Pagkilala muna sa magagandang aspeto ng bawat situwasyon>Paninisi ng kapwa tuwing may problema+Pagbabalewala sa mga kabutihang nasasaksihan<Pagpuna agad sa mga pagkakamali ng iba",
"Bakit sinasabing nakakahawa ang optimismo?=Ang taong may positibong pagtingin sa buhay ay tinutularan ng iba>Ang taong may positibong pagtingin sa buhay ay kinaiinggitan ng lahat+Napapababa ng taong may positibong pagtingin sa buhay ang tiwala sa sarili ng mga nakapaligid sa kanya<Kapag may positibong pagtingin sa buhay ang iyong kausap, nagiging negatibo ang tingin mo sa iyong kalagayan",
"Ano ang kahulugan ng aktibong pag-unawa?=Pag-intindi sa katayuan ng kapwa imbes na siya ay husgahan>Agad na paghuhusga sa mga pagkakamali ng kapwa+Pag-iwas sa mga taong may problema<Pagmamalaki sa mga taong dumaranas ng hirap",
"Ang pagsasabi muna ng mga positibong komento tungkol sa isang gawain imbes na punahin kaagad ito sa negatibong paraan ay halimbawa ng alin sa mga sumusunod na paraan ng pagsasabuhay ng positibong pananaw?=Paggamit ng wikang nagpapalakas ng loob>Pagpapahalaga sa mga simpleng kabutihan+Pagtulong nang walang kapalit<Aktibong pag-unawa at pagpapatawad",
"Ang pagbabahagi ng mga magagandang balita at pananaw sa kapwa sa kabila ng mga hamong kinakaharap ay halimbawa ng alin sa mga sumusunod na paraan ng pagsasabuhay ng positibong pananaw?=Pagiging halimbawa ng optimismo>Pagpapahalaga sa mga simpleng kabutihan+Pagtulong nang walang kapalit<Aktibong pag-unawa at pagpapatawad",
"Ang pagpapasalamat at pagpuri sa kaklaseng tumulong sa iyong magligpit ng iyong mga gamit ay halimbawa ng alin sa mga sumusunod na paraan ng pagsasabuhay ng positibong pananaw?=Pagpapahalaga sa mga simpleng kabutihan>Pagiging halimbawa ng optimismo+Pagtulong nang walang kapalit<Aktibong pag-unawa at pagpapatawad",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng positibong pananaw ang tumutukoy sa hindi paghuhusga sa isang taong nagkamali at pagbibigay sa kanya ng pangalawang pagkakataon?=Aktibong pag-unawa at pagpapatawad>Pagiging halimbawa ng optimismo+Pagtulong nang walang kapalit<Pagpapahalaga sa mga simpleng kabutihan",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng positibong pananaw ang tumutukoy sa kusang-loob na pagbibigay ng oras, talento, o yaman sa mga nangangailangan nang walang kundisyon?=Pagtulong nang walang kapalit>Pagbuo ng isang kultura ng pasasalamat+Pagpapahalaga sa mga simpleng kabutihan<Aktibong pag-unawa at pagpapatawad",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng positibong pananaw ang tumutukoy sa paglikha ng isang kapaligiran kung saan ang pagkilala at pagpapahalaga sa mga bagay-bagay ay bahagi ng pang-araw-araw na pakikisalamuha?=Pagbuo ng isang kultura ng pasasalamat>Aktibong pag-unawa at pagpapatawad+Pagtulong nang walang kapalit<Paggamit ng wikang nagpapalakas ng loob",
"Alin sa mga sumusunod ang halimbawa ng pagpapahayag ng pananampalataya sa pamamagitan ng aksyon o gawa?=Pagtulong sa nangangailangan nang walang kapalit>Pagsisilbi sa kapwa nang may bayad+Pagbibigay ng regalo sa mga tao lamang na nagregalo rin sa iyo<Paghingi ng pabuya sa isang taong tinulungan mo",
"Alin sa mga sumusunod ang dapat mong gawin kapag may kaklase kang nagkamali sa isang proyekto?=Magbigay muna sa kanya ng magandang puna bago banggitin ang kanyang pagkakamali>Sigawan siya agad sa harap ng lahat+Ipagkalat sa social media ang nagawa niyang pagkakamali<Tanggalin siya sa grupo para hindi na siya makaperhuwisyo pa",
"Alin sa mga sumusunod ang halimbawa ng wikang nagpapalakas ng loob?=Maganda ang ideya mo at maaari pa natin itong pagandahin.>Ang pangit naman ng ideya mo.+Walang kuwenta iyang iminumungkahi mo.<Nakakainis iyang suggestion mo.",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagiging halimbawa ng optimismo?=Pagrereklamo sa lahat ng oras>Pagbabahagi ng magandang balita+Pagtulong sa ibang magkaroon ng positibong saloobin<Pagpapanatili ng ngiti sa kabila ng hirap",
"Alin sa mga sumusunod ang dapat nating pagtuunan ng pansin para magkaroon tayo ng positibong pananaw sa buhay?=Mga nangyayaring maganda sa ating paligid>Mga pagkukulang ng ating kapwa+Mga hamon at problema sa ating buhay<Mga bagay na hindi natin kayang kontrolin",
"Paano mo dapat tanggapin ang pagpuri sa iyo ng ibang tao?=Sa paraang may kababaang-loob>Sa pamamagitan ng mariing pagtanggi rito+Sa paraang may pagkahambog<Sa pamamagitan ng paghingi ng karagdagang papuri",
"Alin sa mga sumusunod ang hindi tumutukoy o naglalarawan sa isang pamayanang may positibong pagtingin?=Nakatuon ang pansin sa paghuhusga>Nagtataguyod ng pagkakaisa at pagtutulungan+Nagpapalaganap ng tiwala at respeto<Bukas sa pagbabago",
"Bakit mahalagang pag-usapan natin ang mga nangyayaring maganda at maliliit na tagumpay sa ating buhay?=Para makalikha tayo ng klima ng pag-asa>Para maipagyabang natin ang ating sarili+Para mainggit sa atin ang ibang tao<Para lalo tayong makaakit ng suwerte",
"Ano ang dapat mong gawin kung mabalitaan mong nag-abot ng tulong sa isang matanda ang iyong kapitbahay?=Purihin ang kanyang kabutihan>Sabihan siyang mayabang siya+Ipagkalat sa social media na pekeng balita lamang ang kanyang pagtulong<Balewalain at huwag pansinin ang kanyang ginawa",
"Alin sa mga sumusunod ang malamang na maging epekto ng palagiang pagpuna sa mga pagkakamali ng isang tao?=Pagkawala ng kanyang tiwala sa sarili>Paglakas ng kanyang loob na tumulong sa kapwa+Pagkakaroon niya ng mataas na ambisyon<Pagkakaroon niya ng mas positibong pananaw sa buhay",
"Paano nagiging susi sa matiwasay na ugnayan ang paniniwala natin sa likas na kabutihan ng tao?=Nagiging mapagpasensya at mapang-unawa tayo sa kapwa>Nagiging mapanghusga tayo ng iba+Nawawalan tayo ng pakialam sa kapwa<Nagiging mabilis ang pag-init ng ating ulo",
"Alin sa mga sumusunod ang dapat nating maging motibasyon sa paggawa ng mabuti?=Pagmamahal at paniniwala sa kapwa>Pagtanggap ng papuri o gantimpala+Pag-iwas sa puna o parusa<Pagtanggap ng bayad o pabor",
"Alin sa mga sumusunod ang malamang na mangyari kung ang karamihan sa atin ay palaging nakakapansin ng kapangitan sa paligid?=Paglaganap ng negatibidad>Pagkakaroon ng mas positibong pananaw ng lahat+Pagkakaroon ng kapaligirang puno ng pasasalamat at papuri<Pagtaas ng tiwala sa sarili ng bawat isa",
"Alin sa mga sumusunod ang inaasahang bunga ng pagpapanatili ng lahat ng positibong pananaw?=Pamayanang puno ng pag-asa>Pamayanang puno ng pangamba+Mga mamamayang walang tiwala sa bawat isa<Mga mamamayang palaging nag-aaway",

);

?>

</head>

</bod

</html>