<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang sa mga Karapatan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang<br/>sa mga Karapatan";
$_SESSION['tnum']="*15";

$questions=array(

"Alin sa mga ito ang ibinibigay sa bawat bata para madali siyang matukoy o makilala?=Karapatan sa pangalan>Karapatan sa pagkain+Karapatan sa tubig<Karapatan sa edukasyon",
"Alin sa mga ito ang ibinibigay sa bawat bata para magkaroon ng sustansya ang kanyang katawan?=Karapatan sa pagkain>Karapatan sa pangalan+Karapatan sa tahanan<Karapatan sa edukasyon",
"Alin sa mga ito ang ibinibigay sa bawat bata para hindi siya magutom at lumusog ang kanyang katawan?=Karapatan sa pagkain>Karapatan sa pangalan+Karapatan sa tahanan<Karapatan sa edukasyon",
"Alin sa mga ito ang ibinibigay sa bawat bata para hindi siya mauhaw at mapanatiling malusog ang kanyang katawan?=Karapatan sa malinis na tubig>Karapatan sa pangalan+Karapatan sa tahanan<Karapatan sa edukasyon",
"Alin sa mga ito ang ibinibigay sa bawat bata para mapanatili niyang malinis ang kanyang katawan at paligid?=Karapatan sa malinis na tubig>Karapatan sa pangalan+Karapatan sa tahanan<Karapatan sa edukasyon",
"Alin sa mga ito ang ibinibigay sa bawat bata para siya ay makapag-aral at matuto ng iba't ibang bagay?=Karapatan sa edukasyon>Karapatan sa pangalan+Karapatan sa tahanan<Karapatan sa malinis na tubig",
"Alin sa mga ito ang ibinibigay sa bawat bata para siya ay magkaroon ng mga kaalamang kanyang mapapakinabangan?=Karapatan sa edukasyon>Karapatan sa pangalan+Karapatan sa tahanan<Karapatan sa malinis na tubig",
"Alin sa mga ito ang ibinibigay sa bawat bata para siya ay magkaroon ng maayos at ligtas na tirahan?=Karapatan sa tahanan>Karapatan sa pangalan+Karapatan sa edukasyon<Karapatan sa malinis na tubig",
"Alin sa mga ito ang ibinibigay sa bawat bata para siya ay maging ligtas habang natutulog sa gabi?=Karapatan sa tahanan>Karapatan sa pangalan+Karapatan sa edukasyon<Karapatan sa pagkain",
"Alin sa mga ito ang ibinibigay sa bawat bata para makapiling niya ang kanyang mga magulang at kapatid?=Karapatan sa pamilya>Karapatan sa pangalan+Karapatan sa edukasyon<Karapatan sa pagkain",
"Alin sa mga ito ang ibinibigay sa bawat bata para makadama siya ng pagmamahal at pag-aaruga ng kanyang mga magulang at kapatid?=Karapatan sa pamilya>Karapatan sa pangalan+Karapatan sa edukasyon<Karapatan sa pagkain",
"Alin sa mga ito ang ibinibigay sa bawat bata para magkaroon siya ng saplot sa katawan at hindi ginawin o mainitan?=Karapatan sa sapat na damit>Karapatan sa pagkapribado+Karapatan sa paglalaro<Karapatan sa pagpapahayag",
"Alin sa mga ito ang ibinibigay sa bawat bata para manatili siyang malakas at walang sakit?=Karapatan sa kalusugan>Karapatan sa sapat na damit+Karapatan sa paglalaro<Karapatan sa pagpapahayag",
"Alin sa mga ito ang ibinibigay sa bawat bata para magkaroon siya ng pagkakataong malibang, maaliw, o sumaya?=Karapatan sa paglalaro>Karapatan sa sapat na damit+Karapatan sa pantay na pagtrato<Karapatan sa pagpapahayag",
"Alin sa mga ito ang ibinibigay sa bawat bata para masabi niya ang kanyang mga opinyon o damdamin?=Karapatan sa pagpapahayag>Karapatan sa sapat na pahinga+Karapatan sa pantay na pagtrato<Karapatan sa paglalaro",
"Alin sa mga ito ang ibinibigay sa bawat bata para magkaroon siya ng personal na espasyo kung saan hindi siya maaaring guluhin ng iba?=Karapatan sa pagkapribado>Karapatan sa pagpapabuti ng sarili+Karapatan sa pagpapahayag<Karapatan sa paglalaro",
"Alin sa mga ito ang ibinibigay sa bawat bata para mapaunlad niya ang kanyang mga kakayahan at talento?=Karapatan sa pagpapabuti ng sarili>Karapatan sa pagkapribado+Karapatan sa pagpapahayag<Karapatan sa paglalaro",
"Alin sa mga ito ang ibinibigay sa bawat bata para magkaroon siya ng wastong bilang ng oras ng pagtulog?=Karapatan sa sapat na pahinga>Karapatan sa sapat na damit+Karapatan sa pantay na pagtrato<Karapatan sa pagpapahayag",
"Alin sa mga ito ang ibinibigay sa bawat bata para ang lahat ng lugar na kanyang ginagalawan ay hindi madumi?=Karapatan sa malinis na kapaligiran>Karapatan sa pagkapribado+Karapatan sa pagpapahayag<Karapatan sa paglalaro",
"Alin sa mga ito ang ibinibigay sa bawat bata para makaranas siya ng patas na pakikitungo mula sa lahat anuman ang kanyang lahi, kasarian, relihiyon, o kalagayan sa buhay?=Karapatan sa pantay na pagtrato>Karapatan sa malinis na kapaligiran+Karapatan sa sapat na pahinga<Karapatan sa paglalaro",
"Alin sa mga ito ang iyong ginagawa kung hindi mo pinipigilan ang iyong kapwang magpahayag ng kanyang mga nais sabihin?=Paggalang sa mga opinyon ng kapwa>Pag-iwas sa pang-aabuso ng kapwa+Pagtulong sa kapwa<Paggalang ng pribadong espasyo at mga pag-aari ng kapwa",
"Alin sa mga ito ang iyong ginagawa kung hindi ka nang-iinis o nananakit ng ibang bata?=Pag-iwas sa pang-aabuso ng kapwa>Paggalang sa mga opinyon ng kapwa+Pagtulong sa kapwa<Paggalang ng pribadong espasyo at mga pag-aari ng kapwa",
"Alin sa mga ito ang iyong ginagawa kung tinuturuan mo ang isang kamag-aral na nahihirapan sa kayang aralin?=Pagtulong sa kapwa>Paggalang sa mga opinyon ng kapwa+Pag-iwas sa pang-aabuso ng kapwa<Paggalang ng pribadong espasyo at mga pag-aari ng kapwa",
"Alin sa mga ito ang iyong ginagawa kung hindi ka nangunguha ng mga gamit ng iba nang walang paalam?=Paggalang ng pribadong espasyo at mga pag-aari ng kapwa>Paggalang sa mga opinyon ng kapwa+Pag-iwas sa pang-aabuso ng kapwa<Pagtulong sa kapwa",
"Alin sa mga ito ang iyong ginagawa kung hindi mo nilalabag ang mga patakaran at alituntunin ng paaralan at komunidad sa pakikipagkapwa?=Pagsunod sa mga alituntunin>Paggalang sa mga opinyon ng kapwa+Pag-iwas sa pang-aabuso ng kapwa<Pagtulong sa kapwa",

);

?>

</head>

</bod

</html>