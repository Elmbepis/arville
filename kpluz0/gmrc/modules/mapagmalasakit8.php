<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa Kapwa - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa Kapwa";
$_SESSION['tnum']="*82";

$questions=array(

"Alin sa mga sumusunod ang ginagawa ng isang mapagmalasakit na tao?=Pagtulong at pagdamay sa mga nangangailangan>Pagbibigay ng sakit ng ulo sa iba+Pagbibigay ng aliw sa mga nasa paligid niya<Pagkontrol at pag-uutos sa kapwa",
"Alin sa mga sumusunod ang nagpapakita ng malasakit?=Pagtulong sa isang matandang makatawid>Pagluluto ng pagkain para sa sarili+Paggamit ng social media buong araw<Pag-iipon para makabili ng sariling cellphone",
"Bakit mahalaga ang aktibong pakikinig sa kaibigang may problema?=Para maunawaan ang kanyang problema at makatulong sa kanya>Para makalimutan niya ang kanyang problema+Para tuluy-tuloy siyang magsalita<Para malaman kung paano makakaiwas sa pagtulong sa kanya",
"Ano ang dapat mong gawin kung may kaibigan kang nalulungkot?=Makinig sa kanya at damayan siya>Iwasan siya+Gawing katatawanan ang problema niya<Pagalitan siya",
"Alin sa mga sumusunod ang maaaring gawin ng mga kabataan para makatulong sa komunidad?=Maglinis ng paligid>Magtapon ng basura sa ilog+Magpatugtog ng malakas na musika<Maglaro sa labas tuwing walang pasok",
"Ano ang ibig sabihin ng 'empatiya?'=Paglalagay ng sarili sa nararanasan ng iba>Pag-iwas sa pagkakawanggawa+Pakikinig nang walang pag-unawa<Pagsasantabi ng nararamdaman ng iba",
"Alin sa mga sumusunod ang dapat mong gawin kung may kaklase kang walang baon?=Alukin siya ng iyong baon>Huwag siyang pansinin+Pagtawanan siya<Isumbong siya sa guro",
"Alin sa mga sumusunod na gawain ang hindi nagpapakita ng malasakit?=Pagbili ng bagong damit>Pagtulong sa kapatid sa aralin+Pagbibigay ng gamit sa nangangailangan<Pakikinig sa problema ng kaibigan",
"Alin sa mga sumusunod ang inaasahang epekto sa lipunan ng pagmamalasakit?=Pagkakaisa at pagtutulungan ng mga mamamayan>Pagkakaroon ng hidwaan sa pagitan ng magkakapitbahay+Paglaganap ng inggit sa komunidad<Pagkaantala sa pagtatrabaho ng mga tao",
"Bakit mahalagang magbahagi tayo sa iba ng ating mga biyaya?=Upang matulungan ang mga nangangailangan>Para makakuha ng papuri sa iba+Upang maipagyabang ang ating kayamanan<Para makakuha ng pabuya sa gobyerno",
"Alin sa mga sumusunod na gawaing nagsasabuhay ng pagiging mapagmalasakit ang tumutukoy sa pag-alam kung paano ka makakatulong sa iyong kapwa sa pamamagitan ng pagmamasid at pakikinig?=Pagiging mapanuri sa pangangailangan ng iba>Paglahok sa mga kawanggawa+Pagtuturo ng kahalagahan ng malasakit sa iba<Pagpapalaganap ng pagmamalasakit sa social media",
"Alin sa mga sumusunod na gawaing nagsasabuhay ng pagiging mapagmalasakit ang tumutukoy sa pagsali sa mga programang nagbibigay ng ayuda sa mga kapus-palad?=Paglahok sa mga kawanggawa>Pagiging mapanuri sa pangangailangan ng iba+Pagtuturo ng kahalagahan ng malasakit sa iba<Pagpapalaganap ng pagmamalasakit sa social media",
"Ang paggamit ng Facebook upang maibahagi ang sariling karanasan sa pagkakawanggawa ay halimbawa ng alin sa mga sumusunod na gawaing nagsasabuhay ng pagiging mapagmalasakit?=Pagpapalaganap ng pagmamalasakit sa social media>Pagiging mapanuri sa pangangailangan ng iba+Pagpapahalaga sa kalagayan ng mga nangangailangan<Paglahok sa mga kawanggawa",
"Ang pagbibigay ng inspirasyon sa mga nakababata upang tumulong sa iba ay halimbawa ng alin sa mga sumusunod na gawaing nagsasabuhay ng pagiging mapagmalasakit?=Pagtuturo ng kahalagahan ng malasakit sa iba>Pagiging mapanuri sa pangangailangan ng iba+Pagpapalaganap ng pagmamalasakit sa social media<Paglahok sa mga kawanggawa",
"Alin sa mga sumusunod na gawaing nagsasabuhay ng pagiging mapagmalasakit ang tumutukoy sa pag-unawa sa situwasyon ng mga taong walang kakayahang maiahon ang kanilang mga sarili?=Pagpapahalaga sa kalagayan ng mga nangangailangan>Paglahok sa mga kawanggawa+Pagtuturo ng kahalagahan ng malasakit sa iba<Pagpapalaganap ng pagmamalasakit sa social media",
"Alin sa mga sumusunod ang hindi isang halimbawa ng pagpapakita ng pang-araw-araw na kabaitan?=Pagdaldal habang may klase>Pagngiti sa iba+Pagtulong sa kaibigan<Paggalang sa magulang",
"Alin sa mga sumusunod na paraan ng paggamit sa social media ang nagpapakita ng pagmamalasakit?=Pagbabahagi ng positibong mensahe>Paninira sa iba+Pagkakalat ng pekeng balita<Pagpopost ng nakakatawang larawan",
"Alin sa mga sumusunod na paraang onlayn ang magagawa ng mga kabataan upang magpakita ng pagmamalasakit sa kapwa?=Pagbabahagi ng mga inspirational quotes>Pagsuporta sa masasamang komento+Pagpapakalat ng mga tsismis<Panonood ng mga nakakaaliw na bidyo",
"Alin sa mga sumusunod ang dapat ituro sa mas nakababata upang matutunan nila ang pagmamalasakit?=Magbigay at tumulong sa kapwa>Palaging unahin ang sarili+Huwag makialam sa iba<Mag-impok para yumaman",
"Alin sa mga sumusunod ang inaasahang epekto ng pakikilahok ng mga mamamayan sa mga gawaing pangkawanggawa?=Paglaganap ng kabutihan sa pamayanan>Pagtaas ng krimen sa komunidad+Pagdami ng mga nananamantala sa mahihirap<Pagiging mas magulo ng lipunan",
"Paano mo maipapakita ang pagmamalasakit sa isang kaibigang maysakit?=Sa pamamagitan ng pagdalaw sa kanya>Sa pamamagitan ng pagtawa sa kanyang kalagayan+Sa pamamagitan ng pag-iwas sa kanya<Sa pamamagitan ng pagsasalita ng masama tungkol sa kanya",
"Ano ang dapat mong gawin kung may kaibigan kang natatakot?=Palakasin ang loob niya>Iwasan siya+Gulatin siya bilang katuwaan<Magbahagi sa kanya ng mga kuwentong nakakatakot",
"Alin sa mga sumusunod ang hindi isa sa mga dahilan kung bakit mahalaga ang pagkakaisa sa isang komunidad?=Para makapagyabang sa ibang pamayanan>Para mapanatili ang kaayusan+Para mapalaganap ang pagtutulungan<Para maging mas masaya ang samahan",
"Ano ang pangunahing layunin ng pagiging mapagmalasakit sa kapwa?=Makatulong sa nangangailangan>Mapaunlad ang sarili+Makapaghanda para sa kinabukasan<Mapangalagaan ang kalikasan",
"Alin sa mga sumusunod ang nagpapakita ng pag-unawa at pagpapahalaga sa sitwasyon ng iba?=Pakikiramay>Panghuhusga+Pangungutya<Pag-iwas",

);

?>

</head>

</bod

</html>