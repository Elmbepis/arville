<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutan sa Kalikasan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutan sa Kalikasan";
$_SESSION['tnum']="*5o";

$questions=array(

"Ano ang kahulugan ng pagiging mapanagutan sa kalikasan?=Pangangalaga sa mga nilalang at pagpapanatili ng kalinisan at kalusugan ng mga ekosistema>Pagkonsumo ng mga likas na yaman+Paggawa ng mga produkto mula sa mga hayop at halaman<Pagpapalaki ng mga hayop at halaman para kainin",
"Ano ang pangunahing layunin ng sama-sama at organisadong pangangalaga sa kalikasan?=Panatilihin ang kasaganahan ng mga likas na yaman at kalusugan ng kalikasan para sa mga susunod na henerasyon>Tiyaking may makokonsumong likas na yaman ang kasalukuyang henerasyon+Ubusin na ang mga likas na yaman habang may makukuha pa<Humanap ng mga artipisyal na alternatibo sa likas na yaman",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapanagutan sa kalikasan?=Paggamit ng reusable bags>Pagtatapon ng basura kung saan-saan+Pag-iiwang nakabukas ang gripo<Pagpapatakbo ng aircon buong araw",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapanagutan sa kalikasan?=Pagtatanim ng mga halaman at puno>Pagkakalat sa kalye+Pagbubukas ng mga ilaw kahit hindi kailangan<Labis na paggamit ng plastik sa pag-eempake",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagiging mapanagutan sa kalikasan?=Paggamit ng mga baso at boteng plastik>Pagreresiklo ng mga patapong bagay+Pagkukumpuni agad ng isang tubong tumutulo<Paggamit ng mga bumbilyang LED",
"Ang paggamit ng 'reusable bags,' wastong paghihiwalay ng basura, at pagbabawas ng patapong plastik ay mga anyo ng alin sa mga sumusunod na paraan ng mapanagutang pangangalaga ng kalikasan?=Pagsunod sa mga simpleng gawaing pangkalikasan>Pakikilahok sa mga aktibidad ng pamayanan+Pagpapalaganap ng kaalaman at kamalayan<Pagsuporta sa mga patakarang pangkalikasan",
"Ang pagsali sa sama-samng paglilinis ng paligid na inorganisa ng inyong barangay ay halimbawa ng alin sa mga sumusunod na paraan ng mapanagutang pangangalaga ng kalikasan?=Pakikilahok sa mga aktibidad ng pamayanan>Pagsunod sa mga simpleng gawaing pangkalikasan+Pagpapalaganap ng kaalaman at kamalayan<Pagsuporta sa mga patakarang pangkalikasan",
"Ang pagbabahagi ng mga artikulo, pagdalo sa mga seminar, at simpleng pakikipagtalakayan tungkol sa kalikasan ay mga anyo ng alin sa mga sumusunod na paraan ng mapanagutang pangangalaga ng kalikasan?=Pagpapalaganap ng kaalaman at kamalayan>Pagsunod sa mga simpleng gawaing pangkalikasan+Pakikilahok sa mga aktibidad ng pamayanan<Pagsuporta sa mga patakarang pangkalikasan",
"Ang pagsali sa mga petisyon at pagdalo sa mga konsultasyon upang isulong ang isang batas na pangkapaligiran ay saklaw ng alin sa mga sumusunod na paraan ng mapanagutang pangangalaga ng kalikasan?=Pagsuporta sa mga patakarang pangkalikasan>Pagsunod sa mga simpleng gawaing pangkalikasan+Pakikilahok sa mga aktibidad ng pamayanan<Pagpapalaganap ng kaalaman at kamalayan",
"Ang pag-iwas sa pangangaso ng mga ilang na hayop at hindi pagtatapon ng basura sa mga anyong tubig ay saklaw ng alin sa mga sumusunod na paraan ng mapanagutang pangangalaga ng kalikasan?=Direktang pagprotekta sa mga likas na yaman>Pagiging buhay na halimbawa+Pakikilahok sa mga aktibidad ng pamayanan<Pagpapalaganap ng kaalaman at kamalayan",
"Alin sa mga sumusunod na paraan ng mapanagutang pangangalaga ng kalikasan ang tumutukoy sa pagiging huwaran sa pagpapatupad ng mga gawing 'eco-friendly' sa pang-araw-araw na buhay?=Pagiging buhay na halimbawa>Direktang pagprotekta sa mga likas na yaman+Pakikilahok sa mga aktibidad ng pamayanan<Pagpapalaganap ng kaalaman at kamalayan",
"Alin sa mga sumusunod ang dapat mong maging pangunahing layunin ng pagtitipid sa tubig at kuryente?=Pagmamalasakit sa kalikasan>Pagpapababa ng mga bayarin ng pamilya+Pag-iwas mapagalitan ng magulang<Pagmamagaling sa iba",
"Alin sa mga sumusunod ang nagpapalaganap ng kaalaman at kamalayan tungkol sa mapanagutang pangangalaga ng kalikasan?=Pagbabahagi sa iba ng sariling kaalaman tungkol sa mga ekolohikal na isyu>Pagkakalat ng mga pekeng balita tungkol sa kalikasan+Pagbabasa ng mga aklat na pangkalikasan para sa sarili lamang<Pagkontra sa mga organisasyong pangkalikasan",
"Ano ang inaasahang epekto sa iyong kapwa ng iyong pagiging buhay na halimbawa sa pangangalaga sa kalikasan?=Paggaya sa iyong pangangalaga sa kalikasan>Pagkainis sa iyong pagiging huwaran+Pagbabalewala at hindi pagpansin sa iyong halimbawa<Paninira ng kalikasan para salungatin ang iyong halimbawa",
"Alin sa mga sumusunod ang isang paraan ng pagsuporta sa mga patakaran pangkalikasan?=Aktibong pagsunod sa mga alituntuning pangkalikasan>Pagrereklamo nang walang dahilan laban sa mga bagong batas na pangkalikasan+Paglabag sa mga batas na pangkalikasan<Paninira sa mga opisyal ng barangay na makakalikasan",
"Alin sa mga sumusunod ang halimbawa ng direktang pagpoprotekta sa likas na yaman?=Pag-iwas sa paggamit ng dinamita sa pangingisda>Pangangaso ng mga ilang na ibon+Pagbaril sa mga usa sa gubat<Pagtatapon ng basura sa ilog",
"Bakit masama sa kapaligiran ang paggamit at pagtatapon ng plastik?=Nananatili ito sa kapaligiran nang napakahabang panahon dahil hindi ito nabubulok>Madali itong mabulok sa lupa at tubig+Nakakapangit sa kapaligiran ang sari-saring kulay nito<Madali itong matunaw at kumalat sa mga anyong tubig",
"Alin sa mga sumusunod ang hindi kabilang sa mga epekto ng pagtatanim ng mga puno?=Pagguho ng lupa>Paglikha ng sariwang hangin+Pagpigil sa pagababaha<Pagkakaroon ng karagdagang pagkain",
"Bakit dapat mong ikompost ang mga basurang nabubulok at hindi ihalo ang mga ito sa mga basurang hindi nabubulok?=Upang mabawasan ang mga hinahakot na basura at magamit ito bilang pataba sa halaman>Upang maipagmalaki ang pagiging makakalikasan sa mga kapitbahay+Para mapuri ng mga guro at magulang<Para mas maraming hahakuting basura ang mga basurero",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagiging mapanagutan sa kalikasan?=Paggamit ng kemikal sa panghuhuli ng mga isda>Pagsali sa isang coastal clean-up+Pagtatanim ng puno sa bakuran<Pagbabawas ng paggamit ng plastik",
"Ano ang pangunahing naitutulong ng pagdalo ng isang tao sa mga seminar tungkol sa ekolohiya?=Nadadagdagan ang kanyang kaalaman sa pangangalaga ng kalikasan>Nakakakuha siya ng certificate na maipagyayabang sa iba+Nakakakita siya ng mga sikat na environmentalist<Nagkakaroon siya ng bagong content na maipo-post sa social media",
"Alin sa mga sumusunod ang maaari mong gawin para mabawasan ang basura sa inyong tahanan?=Paghihiwalay at pagkokompost ng nabubulok na basura>Pagsusunog ng basura sa bakuran+Pagtatapon ng basura sa gilid ng kalye<Pagbabaon sa lupa ng mga di-nabubulok sa basura",
"Alin sa mga sumusunod ang maaari mong gawin para mabawasan ang basura sa inyong tahanan?=Paghihiwalay at pagreresiklo ng mga basurang hindi nabubulok>Paglalaglag ng basura sa ilog+Pagtatapon ng basura sa kanal<Paglalagay ng basura sa ibabaw ng bubong ng bahay",
"Alin sa mga sumusunod ang dapat mong gawin sa mga lumang diyaryo at karton?=Iresiklo o ibenta sa mga nangangalakal nito>Sunugin sa bakuran+Itapon sa labas ng bahay<Itambak sa kisame o bodega",
"Ano ang mangyayari kung hindi natin pangangalagaan ang mga anyong tubig-tabang tulad ng mga ilog at lawa?=Mawawalan tayo ng pagkukunan ng malinis na tubig>Dadami ang mga isdang nabubuhay sa mga ito+Tutubuan ng maraming halaman ang ibabaw ng mga ito<Bababa ang bayarin natin sa tubig",

);

?>

</head>

</body

</html>