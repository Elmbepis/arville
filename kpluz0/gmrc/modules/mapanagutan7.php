<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutan";
$_SESSION['tnum']="*76";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapanagutan?=Pagtanggap at pagganap ng mga tungkulin at responsibilidad>Pagtanggap at pagtakas sa mga tungkulin at responsibilidad+Pagpasa ng mga tungkulin at responsibilidad sa uba<Paninisi ng iba sa negatibong bunga ng sariling mga desisyon at aksyon",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa pagganap niya ng lahat ng mga nakatokang trabaho sa kanya?=Pagtupad sa mga tungkulin>Pananagutan sa sariling gawa+Pagtupad sa mga pangako<Pag-iingat sa mga ari-arian",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa pag-ako niya ng responsibilidad sa mga bunga o epekto ng kanyang mga aksyon, maging positibo man ito o negatibo?=Pananagutan sa sariling gawa>Pagtupad sa mga tungkulin+Pagtupad sa mga pangako<Pag-iingat sa mga ari-arian",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa pagiging tapat niya sa kanyang salita?=Pagtupad sa mga pangako>Pagtupad sa mga tungkulin+Pananagutan sa sariling gawa<Pag-iingat sa mga ari-arian",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa pangangalaga niya sa mga bagay na ipinagkatiwala sa kanya?=Pag-iingat sa mga ari-arian>Pagtupad sa mga tungkulin+Pananagutan sa sariling gawa<Pagtupad sa mga pangako",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa pagkakaroon niya ng malasakit sa kalikasan?=Pangangalaga sa kapaligiran>Pagiging aktibong mamamayan+Pagpapakita ng integridad<Pag-iingat sa mga ari-arian",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa paggawa niya ng tama sa lahat ng pagkakataon, kahit walang nakakakita sa kanya?=Pagpapakita ng integridad>Pagiging aktibong mamamayan+Pangangalaga sa kapaligiran<Pag-iingat sa mga ari-arian",
"Alin sa mga sumusunod na aspeto ng pagiging mapanagutan ng isang tao ang tumutukoy sa kanyang pakikilahok sa mga gawain ng komunidad?=Pagiging aktibong mamamayan>Pagpapakita ng integridad+Pangangalaga sa kapaligiran<Pag-iingat sa mga ari-arian",
"Ang walang palyang paggawa ng isang mag-aaral sa kanyang mga takdang aralin at mga gawaing bahay ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mapanagutan?=Pagtupad sa mga tungkulin>Pananagutan sa sariling gawa+Pagtupad sa mga pangako<Pag-iingat sa mga ari-arian",
"Ang pag-amin ng isang bata sa kanyang kasalanan at pagtanggap ng kaparusahan para rito ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mapanagutan?=Pananagutan sa sariling gawa>Pagtupad sa mga tungkulin+Pagtupad sa mga pangako<Pag-iingat sa mga ari-arian",
"Ang pagtitiyak na hindi masisira o mawawala ang isang gamit na hiniram sa ibang tao ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mapanagutan?=Pag-iingat sa mga ari-arian>Pagtupad sa mga tungkulin+Pagtupad sa mga pangako<Pananagutan sa sariling gawa",
"Ang paglilinis ng kapaligiran at pagtatanim ng mga puno at halaman ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mapanagutan?=Pag-iingat sa mga ari-arian>Pagtupad sa mga tungkulin+Pagtupad sa mga pangako<Pananagutan sa sariling gawa",
"Alin sa mga sumusunod na tungkulin ng isang mamamayan ang tumutukoy sa pagbibigay ng respeto sa lahat ng tao at pag-iwas sa pang-aabuso ninuman?=Paggalang sa mga karapatan ng kapwa>Pagsunod sa mga batas+Pagiging mabuting pinuno at tagasunod<Pagiging aktibo sa mga gawaing pangkomunidad",
"Alin sa mga sumusunod na tungkulin ng isang mamamayan ang tumutukoy sa pag-iwas gumawa ng anumang ipiangbabawal ng pamahalaan?=Pagsunod sa mga batas>Paggalang sa mga karapatan ng kapwa+Pagpapalaganap ng kaalaman<Pagiging aktibo sa mga gawaing pangkomunidad",
"Alin sa mga sumusunod na tungkulin ng isang mamamayan ang tumutukoy sa kanyang pagiging makatarungan at maaasahan kung mayroon siyang pinapamahalaan?=Pagiging mabuting pinuno>Pagiging mabuting tagasunod+Pagpapalaganap ng kaalaman<Pagiging aktibo sa mga gawaing pangkomunidad",
"Alin sa mga sumusunod na tungkulin ng isang mamamayan ang tumutukoy sa kanyang paggalang at pagsuporta sa mga taong may mas mataas na posisyon kaysa sa kanya?=Pagiging mabuting tagasunod>Pagiging mabuting pinuno+Pagpapalaganap ng kaalaman<Pagiging aktibo sa mga gawaing pangkomunidad",
"Alin sa mga sumusunod na tungkulin ng isang mamamayan ang tumutukoy sa pakikilahok sa mga aktibidad ng pamayanan tulad ng paglilinis ng kapaligiran, pagtatanim ng mga puno at halaman, at mga proyektong pangkaunlaran?=Pagiging aktibo sa mga gawaing pangkomunidad>Pagiging mabuting pinuno at tagasunod+Pagpapalaganap ng kaalaman<Paggalang sa mga karapatan ng kapwa",
"Alin sa mga sumusunod na tungkulin ng isang mamamayan ang tumutukoy sa pagbabahagi ng kanyang mga karanasan at dati nang natutunan upang hikayatin ang iba na gampanan ang kanilang mga tungkulin?=Pagpapalaganap ng kaalaman>Pagiging mabuting pinuno at tagasunod+Pagiging aktibo sa mga gawaing pangkomunidad<Paggalang sa mga karapatan ng kapwa",
"Ang pag-iwas sa paggawa ng mga bagay na makakasakit o makakapinsala sa ibang tao ay halimbawa ng alin sa mga sumusunod na tungkulin ng isang mamamayan?=Paggalang sa mga karapatan ng kapwa>Pagsunod sa mga batas+Pagiging mabuting pinuno at tagasunod<Pagiging aktibo sa mga gawaing pangkomunidad",
"Ang pagtawid sa tamang tawiran, pagtatapon ng basura sa tamang lugar, at pagsunod sa mga regulasyon ng trapiko ay mga halimbawa ng alin sa mga sumusunod na tungkulin ng isang mamamayan?=Pagsunod sa mga batas>Paggalang sa mga karapatan ng kapwa+Pagpapalaganap ng kaalaman<Pagiging aktibo sa mga gawaing pangkomunidad",
"Ang pagbibigay ng libreng serbisyo sa isang misyong medikal ng inyong barangay ay halimbawa ng alin sa mga sumusunod na tungkulin ng isang mamamayan?=Pagiging aktibo sa mga gawaing pangkomunidad>Paggalang sa mga karapatan ng kapwa+Pagpapalaganap ng kaalaman<Pagsunod sa mga batas",
"Ang pag-oorganisa ng mga seminar o diyalogo upang turuan ang ibang tao kung paano makapaglilingkod sa komunidad ay halimbawa ng alin sa mga sumusunod na tungkulin ng isang mamamayan?=Pagpapalaganap ng kaalaman>Paggalang sa mga karapatan ng kapwa+Pagiging mabuting tagasunod<Pagsunod sa mga batas",
"Ano ang layunin o kahalagahan ng pagiging aktibong mamamayan?=Pagpapabuti ng komunidad>Pagpapahanga sa kapwa+Pagpapakita ng kakayahan<Pagpaparami ng mga kakilala",
"Alin sa mga sumusunod ang inaasahang epekto ng pagiging mapanagutan ng mga mamamayan sa isang komunidad?=Pagkakaisa at pagtutulungan>Pagkakaisa at di-pagkakaunawaan+Pagtutulungan at pagkakawatak-watak<Pagkakawatak-watak at di-pagkakaunawaan",
"Bakit mahalaga ang pagsunod ng mga tao sa mga batas bilang mga mapanagutang mamamayan?=Upang gawing ligtas at maayos ang komunidad>Upang lumaki ang kanilang kinikita+Upang mapalaganap ang kanilang mga kaalaman<Upang hangaan sila ng mga hindi sumusunod sa batas",
"Alin sa mga sumusunod ang maibibigay ng espirituwalidad sa buhay ng tao?=Pagmamalasakit, integridad, at paggalang sa kapwa>Materyal na yaman+Solusyon sa lahat ng problema<Mataas na antas sa lipunan",
"Alin sa mga sumusunod ang nagpapakita ng epekto ng espirituwalidad sa pagiging mabuting mamamayan?=Pagsasagawa ng mga makatarungan at mapanagutang gawain para sa kabutihan ng iba>Pagiging tahimik tungkol sa mga isyu ng bayan+Pag-iwas sa mga responsibilidad sa lipunan<Pagtutok sa pansariling interes lamang",
"Paano nakakatulong ang espirituwalidad sa pagtupad ng ating mga tungkulin bilang mamamayan?=Pagbibigay ng gabay at inspirasyon upang kumilos nang mapanagutan>Pagbibigay ng tiyak na sagot sa lahat ng tanong+Paghahatid ng lunas sa lahat ng mga isyu ng pamayanan<Pagbibigay ng karangyaan sa buhay ng bawat isa",
"Ano ang kahalagahan ng pagkakaroon ng malasakit sa kapwa bilang bahagi ng espirituwalidad?=Pinatitibay nito ang pagkakaisa at kapayapaan sa bayan>Nagiging sanhi ito ng inggitan sa komunidad+Nagiging dahilan ito ng paglayo ng mga tao sa bawat isa<Hinihimok nito ang lahat na unahin ang pansariling interes",
"Alin sa mga sumusunod ang halimbawa ng pagkilos na naaayon sa espirituwalidad?=Paglahok sa isang community clean-up drive upang mapangalagaan ang kalikasan>Pag-iwas sa pagbabayad ng buwis+Pagtatapon ng basura kahit saan<Paglabag sa mga batas trapiko",
"Bakit mahalaga ang espirituwalidad sa pagkakaisa ng komunidad?=Pinagtitibay nito ang respeto at malasakit sa bawat isa>Nagiging sanhi ito ng inggitan sa pamayanan+Pinapalala nito ang pagiging makasarili ng mga tao<Nahihikayat nito ang mga taong maging mapagmataas",

);

?>

</head>

</bod

</html>