<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Tiwala sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Tiwala sa Sarili";
$_SESSION['tnum']="*7c";

$questions=array(

"Ano ang pangunahing kahulugan ng tiwala sa sarili?=Paniniwala sa sariling kakayahan>Pagiging masaya palagi+Paniniwala sa kakayahan ng ibang tao<Pagsunod sa mga kaibigan",
"Bakit mahalagang magkaroon ng tiwala sa sarili?=Upang magkaroon ng lakas ng loob na harapin ang mga pagsubok>Upang makaiwas sa responsibilidad+Upang maging mas magaling sa lahat ng bagay<Upang madaling makahingi ng tulong sa iba",
"Ano ang unang hakbang sa pagkakaroon ng tiwala sa sarili?=Pagkilala sa sariling mga talento at hilig>Paggaya sa mga kakayahan ng iba+Pagtanggi sa mga puna ng iba<Paghanga sa mga taong matagumpay",
"Alin sa mga sumusunod ang nagiging epekto ng tiwala sa sarili sa isang tao?=Paglakas ng loob na sumubok ng mga bagong bagay>Pagkawala ng motibasyon+Pagiging tamad at walang pakialam<Pagsandal sa iba",
"Alin sa mga sumusunod ang halimbawa ng pagkilala sa sariling talento?=Pagsasanay upang malinang ang kakayahan>Paggaya sa kakayahan ng ibang tao+Pag-iwas sa mga aktibidad na walang katiyakan<Pagtatago ng talento upang hindi husgahan",
"Paano nakakatulong ang mga guro at magulang sa pagbuo ng tiwala sa sarili?=Pagbibigay ng suporta at konstruktibong puna>Pamimilit na sumali sa kompetisyon+Pamimilit na sundin ang kanilang gusto<Pagbabawal magkamali",
"Bakit mahalaga ang pagkakaroon ng tiwala sa sarili sa pagkakamit ng tagumpay?=Nagbibigay ito ng lakas ng loob upang kumilos>Nakakatulong ito sa pagmamalaki sa kapwa+Napapadali nito ang mga trabaho<Nagbibigay ito ng suwerte",
"Alin sa mga sumusunod ang isang magandang paraan ng pagpapalago ng tiwala sa sarili?=Pagsubok sa mga bagong aktibidad>Pagtigil sa paggawa kapag nagkamali+Pag-iwas sa mahihirap na gawain<Pagsunod sa gusto ng iba",
"Ano ang naitutulong ng pagsali sa mga grupong tulad ng 'math club' o 'science club' sa pagpapatibay ng tiwala sa sarili?=Pagkakaroon ng karagdagang kaalaman at kasanayan>Pagkakaroon ng pagkakataong magmagaling sa kapwa+Pagkasanay sumunod sa gusto ng iba<Pagkakaroon ng pagkakataong magmalaki sa iba",
"Ano ang dapat gawin upang mapalakas ang tiwala sa sarili kung mahilig sa isports?=Mag-ensayo kasama ang mga kapwa manlalaro>Maglaro nang mag-isa palagi+Iwasang sumali sa mga paligsahan para hindi mabigo<Umiwas sa coach para hindi mapangaralan",
"Ano ang dapat mong gawin kung nahihirapan kang magtiwala sa iyong sarili?=Humingi ng gabay mula sa pamilya o guro>Tumigil na lamang sa pagsubok+Isisi ang mga kabiguan sa iba<Sarilinin ang problema",
"Alin sa mga sumusunod ang mabuting epekto ng tiwala sa sarili sa panahon ng pagkatalo?=Nagbibigay ito ng lakas upang bumangon muli>Nababawasan nito ang kagustuhang magpatuloy+Nagiging dahilan ito upang makapanisi ng iba<Nagdudulot ito ng kawalan ng pag-asa",
"Alin sa mga sumusunod ang mabuting epekto ng pagiging bukas sa kritisismo dulot ng tiwala sa sarili?=Pagkatuto mula sa pagkakamali>Takot magkamali+Pagiging mahiyain<Pagiging mapagmataas sa kapwa",
"Alin sa mga sumusunod ang magandang epekto ng pagkakaroon ng tiwala sa sarili?=Pagiging handa sa mga hamon ng buhay>Pagiging takot sa responsibilidad+Pagiging mapagmataas sa kapwa<Pagiging sunud-sunuran sa iba",
"Alin sa mga sumusunod ang nakakatulong sa pagkilala sa sariling talento?=Pagtanggap ng puna mula sa iba>Pag-iwas sa pagsubok ng bagong gawain+Pagtanggi sa suporta ng pamilya<Pagsasarili sa lahat ng oras",
"Ano ang pangunahing layunin ng pagsali sa mga organisasyon?=Magbahagi ng talento at makipagtulungan>Maipagyabang ang kakayahan+Kahangaan ng kapwa<Makakuha ng papuri mula sa mga guro",
"Ano ang dapat gawin kung nagkamali sa isang bagay na sinusubukan?=Pag-aralan ang pagkakamali at subukang muli>Huwag nang subukan ulit at gumawa na lamang ng ibang bagay+Magalit sa sarili<Sisihin ang iba sa nangyari",
"Bakit mahalaga ang pagtanggap ng konstruktibong puna mula sa iba?=Upang matuto sa pagkakamali at magbago>Upang mainis sa sarili+Upang maipakita sa iba ang hindi pagsang-ayon<Upang maisisi sa iba ang pagkakamali",
"Alin sa mga sumusunod ang magandang bunga ng pagsasanay o pag-eensayo ng sariling talento?=Pagpapalawak ng kakayahan at kumpiyansa>Pagkakaroon ng mas maraming kaibigan+Pagkakaroon ng pinagkakaabalahan<Pagiging mapagmataas sa kapwa",
"Bakit mahalaga ang pagsubok sa iba't ibang aktibidad?=Upang malaman kung alin ang nararapat sa atin>Upang ipakita ang kahusayan sa lahat+Upang makatanggap ng maraming papuri<Upang makilala ng maraming tao",
"Ano ang ginagawa ng tiwala sa sarili sa ating pananaw sa buhay?=Pinapalakas ang ating loob na harapin ang mga hamon>Pinapababa ang ating pagtingin sa iba+Pinipilit tayong magtagumpay sa lahat ng pagkakataon<Pinipilit tayong matakot magkamali",
"Alin sa mga sumusunod ang magandang paraan para mahubog natin ang tiwala sa sarili?=Pagsali sa mga paligsahan at pagtanggap ng resulta nito>Pag-iwas sa anumang uri ng pagkatalo+Pagtanggi sa tulong ng ibang tao<Pagiging takot magkamali",
"Ano ang dapat mong gawin kung natatakot kang sumubok sa isang bagong gawain?=Humingi ng suporta mula sa pamilya o kaibigan>Gumawa na lang ng ibang bagay+Mag-isip ng dahilan upang hindi ito gawin<Ipagawa ito sa ibang tao",
"Alin sa mga sumusunod ang magandang epekto ng tiwala sa sarili sa paggawa ng desisyon?=Pagiging handang harapin ang resulta nito>Pag-aalinlangan sa paggawa ng desisyon+Pagiging padalus-dalos sa pagdedesisyon<Pagiging handang isisi sa iba ang resulta nito",
"Alin sa mga sumusunod ang nagpapakita ng tiwala sa sarili?=Pagsubok sa mga bagay na mahirap at walang katiyakan>Pagtanggi sa anumang hamon+Pagdedesisyon nang hindi nag-iisip<Pagtangging tumanggap ng puna mula sa iba",

);

?>

</head>

</bod

</html>