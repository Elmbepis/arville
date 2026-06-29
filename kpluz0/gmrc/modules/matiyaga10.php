<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matiyaga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matiyaga";
$_SESSION['tnum']="*a1";

$questions=array(

"Alin sa mga sumusunod ang nagpapakita ng pagiging tunay na matiyaga?=Patuloy at disiplinadong pag-iimpok at pamumuhunan hanggang makabili ng bahay>Paglalakbay sa malalayong bansa+Pagdarasal nang 5 minuto gabi-gabi kasama ang pamilya<Sunud-sunod na panonood ng mga online movies",
"Alin sa mga sumusunod ang kahulugan ng pag-iimpok?=Pag-iipon ng perang sasalo sa iyo sa oras ng biglaang panangailangan>Pagbili ng mga bagay na na mahalaga sa iyo+Paglalagak ng puhunan sa isang negosyo<Paghahanapbuhay para may kakainin araw-araw",
"Alin sa mga sumusunod ang kahulugan ng pamumuhunan?=Paglalaan ng pera at oras sa isang bagay na lilikha ng pera o magkakaroon ng malaking halaga paglipas ng panahon>Pinakaligtas na paraan ng pagtatago ng pera+Matiyagang pag-iipon ng pera sa bangko<Pagtatrabaho sa ibang bansa para makabili ng mga ari-arian",
"Alin sa mga sumusunod ang kailangan upang makapag-impok ng malaking halaga?=Disiplina at tiyaga>Sipag at talino+Pagkakaroon ng malaking suweldo<Pananampalataya",
"Alin sa mga sumusunod ang hindi kabilang sa tatlong gampaning tumutugon sa mga hamong pinansyal?=Pangungutang>Pagbabadyet+Pag-iimpok<Pamumuhunan",
"Bakit mahalaga ang pagbabadyet?=Upang hindi ka magulat kung saan napunta ang iyong pera>Upang magkaroon ka ng dahilang gumastos nang labis+Upang humanga sa iyo ang iyong mga kaibigan<Upang maiwasan ang pag-iimpok",
"Alin sa mga sumusunod na 'short-term' na paghahanda para sa kinabukasan ang ginagawa sa isang bangko upang gawing ligtas ang ipon mula sa sunog o magnanakaw?=Pagbubukas ng savings account>Pagbuo ng emergency fund+Paggamit ang \"envelope system\"<Pagbabawas ng paggastos na hindi kailangan",
"Alin sa mga sumusunod na 'short-term' na paghahanda para sa kinabukasan ang tumutukoy sa pagtatabi ng pera para magamit sa biglaan at hindi inaasahang gastusin tulad ng pagpapaospital?=Pagbuo ng emergency fund>Pagbubukas ng savings account+Paggamit ang \"envelope system\"<Pagbabawas ng paggastos na hindi kailangan",
"Alin sa mga sumusunod na 'short-term' na paghahanda para sa kinabukasan ang tumutukoy sa paghahati ng bawat natatanggap na kita at pagtatakda kung saan gagastusin ang bawat bahagdan?=Paggamit ang \"envelope system\">Pagbubukas ng savings account+Pagbuo ng emergency fund<Pagbabawas ng paggastos na hindi kailangan",
"Alin sa mga sumusunod na 'short-term' na paghahanda para sa kinabukasan ang sumasaklaw sa pagtukoy kung saan ka gumagastos nang malaki at paggawa ng hakbang para mapaliit ang kailangang ilaang pera rito?=Paggamit ang \"envelope system\">Pagbubukas ng savings account+Pagbuo ng emergency fund<Pagbabawas ng paggastos na hindi kailangan",
"Alin sa mga sumusunod na 'medium-term' na paghahanda para sa kinabukasan ang tumutukoy sa pagbabayad para matuto ka ng mga bago at mahahalagang kasanayang magbibigay sa iyo ng karagdagang kita?=Pag-i-invest sa iyong edukasyon>Pag-uumpisa ng maliit na negosyo+Pagsali sa mga kooperatiba<Paggawa ng \"sinking fund\"",
"Ang pagtatayo ng gotohan sa harap ng inyong bahay ay halimbawa ng alin sa mga sumusunod na 'medium-term' na paghahanda para sa kinabukasan?=Pag-uumpisa ng maliit na negosyo>Pag-i-invest sa iyong edukasyon+Pagsali sa mga kooperatiba<Paggawa ng \"sinking fund\"",
"Alin sa mga sumusunod na 'medium-term' na paghahanda para sa kinabukasan ang tumutukoy sa pagiging bahagi ng isang organisasyong pag-aari at pinamamahalaan ng mga miyembro nito para sa kanilang kapakinabangan?=Pagsali sa mga kooperatiba>Pag-uumpisa ng maliit na negosyo+Pag-i-invest sa iyong edukasyon<Paggawa ng \"sinking fund\"",
"Ang pagtatabi ng pera para sa iyong pag-aaral sa kolehiyo ay halimbawa ng alin sa mga sumusunod na 'medium-term' na paghahanda para sa kinabukasan?=Paggawa ng \"sinking fund\">Pag-i-invest sa iyong edukasyon+Pagsali sa mga kooperatiba<Pag-uumpisa ng maliit na negosyo",
"Ang pagsasaliksik tungkol sa mga 'state universities' kung saan libre ang tuition fees ay halimbawa ng alin sa mga sumusunod na 'long-term' na paghahanda para sa kinabukasan?=Magplano para sa iyong kolehiyo>Magsimula na ng retirement planning+Iwasan ang \"get rich quick\" scams<Konsultahin ang mga nakatatanda",
"Ang pagtatabi ng 500 piso buwan-buwan simula sa edad mo ngayon hanggang sa edad 65 ay halimbawa ng alin sa mga sumusunod na 'long-term' na paghahanda para sa kinabukasan?=Magsimula na ng retirement planning>Magplano para sa iyong kolehiyo+Iwasan ang \"get rich quick\" scams<Konsultahin ang mga nakatatanda",
"Ang pag-iwas sa mga nangangakong dodoble ang iyong pera sa loob ng isang buwan ay halimbawa ng alin sa mga sumusunod na 'long-term' na paghahanda para sa kinabukasan?=Iwasan ang \"get rich quick\" scams>Magplano para sa iyong kolehiyo+Magsimula na ng retirement planning<Konsultahin ang mga nakatatanda",
"Alin sa mga sumusunod na 'long-term' na paghahanda para sa kinabukasan ang tumutukoy sa paghingi ng payo sa mga taong may mahaba nang karanasan sa pamamahala ng pera?=Konsultahin ang mga nakatatanda>Magsimula na ng  retirement planning+Iwasan ang \"get rich quick\" scams<Magplano para sa iyong kolehiyo",
"Alin sa mga sumusunod ang kahulugan ng 'financial freedom'?=Kalayaang hindi umaasa sa iba para sa iyong mga pinansiyal na pangangailangan>Kalayaang gastusin ang lahat ng iyong pera nang walang pag-aalala+Kalayaang mangutang nang walang takot<Kalayaang hindi na magtrabaho kailanman",
"Gaano kalaki ang magandang halaga ng emergency fund?=Katumbas ng 6 na buwan ng iyong gastusin>Katumbas ng isang buwan ng iyong gastusin+Katumbas ng dalawang taon ng iyong gastusin<Hindi bababa sa 500,000 piso",
"Alin sa mga sumusunod ang pinakamagandang investment?=Investment sa iyong sarili sa pamamagitan ng pag-aaral ng mga kasanayan>Investment sa stocks+Investment sa cryptocurrency<Investment sa negosyo",
"Ang layunin ng tinatawag na 'sinking fund' ay hindi angkop para sa alin sa mga sumusunod na gastusin?=Pagbili ng meryenda>Pagbili ng bagong kompyuter+Pagbili ng washing machine<Pagpapagawa ng sasakyan",
"Paano mo malalaman kung ang isang 'investment opportunity' ay scam lamang?=Kung ito ay masyadong magandang pakinggan para maging totoo>Kung ito ay may pahintulot mula sa SEC+Kung ito ay nasa internet at maraming magandang reviews<Kung ito ay inaalok ng isang bangko",
"Alin sa mga sumusunod na bunga ng matiyagang pag-iimpok at pamumuhunan ang tumutukoy sa kawalan ng pag-aalala dahil alam mong handa ka sa anumang biglaang pangangailangan?=Kapayapaan ng isip>Kakayahang tumulong sa iyong pamilya+Disiplina sa sarili<Kalayaang pumili ng iyong nais na trabaho",
"Alin sa mga sumusunod na bunga ng matiyagang pag-iimpok at pamumuhunan ang tumutukoy sa pagkakaroon ng perang maitutustos mo sa mga pangangailangan ng iyong mga magulang at mga kapatid?=Kakayahang tumulong sa iyong pamilya>Kapayapaan ng isip+Disiplina sa sarili<Kalayaang pumili ng iyong nais na trabaho",

);

?>

</head>

</body

</html>