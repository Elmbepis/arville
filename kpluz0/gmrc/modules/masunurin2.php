<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masunurin sa Pamayanan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masunurin sa Pamayanan";
$_SESSION['tnum']="*24";

$questions=array(

"Alin sa mga ito ang hindi nagpapakita ng pagiging masunurin sa pamayanan?=Paninira ng gamit sa parke>Pagtawid sa tamang tawiran+Hindi pagkakalat sa kalye<Pagiging magalang sa kapwa",
"Bakit mahalagang sumunod sa mga batas sa pamayanan?=Upang mapanatili ang kaayusan at kapayapaan>Upang maiangat ang sarili sa iba+Upang mapuri ng mga guro<Para hindi mapagalitan",
"Ano ang maaaring mangyari kung walang susunod sa mga batas at patakaran?=Magiging magulo ang komunidad>Magiging maayos at tahimik ang pamayanan+Magiging masaya sa komunidad<Magiging maunlad ang pamayanan",
"Alin sa mga ito ang halimbawa ng pagiging masunurin sa tahanan?=Pagtupad sa mga iniutos na gawaing-bahay>Pagkakalat sa paligid+Pagpapabaya sa mga gamit<Pag-iwas sa magulang",
"Alin sa mga ito ang hindi dapat gawin sa lansangan?=Tumawid sa harap ng umaandar na sasakyan>Tumawid sa tamang tawiran+Lumingon sa kaliwa at kanan bago tumawid<Igalang ang mga traffic enforcer",
"Alin sa mga ito ang hindi isa sa mga dahilan kung bakit dapat sumunod sa batas trapiko?=Para mauna sa paroroonan>Upang maiwasan ang aksidente+Upang mapanatili ang kaayusan<Para walang makaabala at maabala",
"Alin sa mga ito ang maaari mong gawin upang mapanatili ang kalinisan sa inyong pamayanan?=Pagtatapon ng basura sa tamang lalagyan>Paghuhulog ng basura sa ilog+Pagsusunog ng basura sa kalsada<Pag-iwan ng basura sa gilid ng kalye",
"Ano ang dapat mong gawin sa isang pampublikong lugar?=Kumilos nang tahimik at maayos>Mag-ingay nang malakas+Magkalat sa paligid<Manggulo sa mga tao",
"Alin sa mga ito ang nagpapakita ng disiplina sa paaralan?=Pakikinig nang mabuti sa guro>Pagdaldal habang nasa klase+Pagtatapon ng balat ng kendi sa sahig<Pakikipag-away sa kaklase",
"Alin sa mga ito ang nagpapakita ng respeto sa nakatatanda?=Pagsunod sa kanila>Pakikipagtalo sa kanila+Pagtatawa sa kanila<Pag-iwas sa kanila",
"Alin sa mga ito ang tungkulin ng isang batang Pilipino sa pamayanan?=Paggalang sa mga nakatatanda>Paninira ng mga gamit sa parke+Pagtatapon ng basura kahit saan<Paggawa ng malakas na ingay",
"Ano ang dapat mong gawin kung may makita kang lumalabag sa batas?=Ipaalam ang paglabag sa kinauukulan>Makisali sa paglabag+Magkunwaring walang nakita<Pagalitan ang lumalabag",
"Alin sa mga ito ang mabuting epekto ng pagiging masunurin?=Pagkakaroon ng mapayapang pamayanan>Pagkasira ng mga gamit ng pamayanan+Pagdami ng mga basura sa paligid<Pag-aaway ng mga magkakapitbahay",
"Alin sa mga ito ang makakatulong upang maiwasan ang anumang kaguluhan?=Pagsunod ng lahat sa batas>Pagsali sa mga away+Hindi paggalang sa kapwa<Hindi pagpansin sa mga patakaran",
"Alin sa mga ito ang makakatulong upang mapanatiling malinis ang paligid?=Pagwawalis ng sariling bakuran>Pag-iiwan ng sirang gamit sa kalsada+Paninira ng mga halaman<Pagtatapon ng basura sa ilog",
"Alin sa mga ito ang inaasahang bunga ng pagsunod natin sa batas trapiko?=Pagiging ligtas sa daan>Pagbigat ng daloy ng trapiko+Pagkasira ng mga sasakyan<Pag-aaway ng mga motorista",
"Ano ang nagagawa ng disiplina sa isang pamayanan?=Napapabuti nito ang samahan ng mga tao>Nagdudulot ito ng gulo+Pinalalala nito ang polusyon<Nagbubunga ito ng labis na ingay",
"Ano ang dapat mong gawin kung may programa ang barangay para sa paglilinis ng kapaligiran?=Lumahok at tumulong sa paglilinis>Umalis para hindi maisali+Pigilin ang pagsali ng ibang tao rito<Magpanggap na may sakit para makaiwas dito",
"Ano ang tamang paraan ng pagtugon sa mga proyekto ng barangay?=Pagpapakita ng suporta at aktibong pagtulong>Pag-iwas sa pagbibigay ng suporta+Panggugulo sa mga ito<Pakikilahok para sa sariling kapakinabangan",
"Alin sa mga ito ang makakatulong sa pagpapanatili ng katahimikan sa pamayanan?=Maayos na pagkilos at pagsasalita sa mga pampublikong lugar>Pagpapatugtog nang malakas sa kalye+Pakikipagsigawan sa kapitbahay araw-araw<Paglalaro nang maingay tuwing gabi",
"Alin sa mga ito ang hindi nagpapakita ng pagiging responsableng mamamayan?=Pagkakalat ng basura sa paligid>Pagtulong sa mga nangangailangan+Pagsunod sa mga batas<Hindi pag-aaksaya ng mga likas na yaman",
"Ano ang dapat mong gawin kapag nais mong pumila sa isang pampublikong lugar?=Sumunod sa pagpila at huwag sumingit>Sumingit sa bandang unahan ng pila+Makipagtulakan para mauna<Manggulo para umalis ang iba sa pila",
"Alin sa mga ito ang halimbawa ng magandang asal sa loob ng pampublikong sasakyan?=Pagbibigay ng upuan sa matanda o may kapansanan>Pagtataas ng mga paa sa upuan+Pakikipagtalo sa drayber o konduktor<Pag-iingay sa loob ng sasakyan",
"Ano ang dapat mong gawin kung may kaguluhan sa isang pampublikong lugar?=Manatiling kalmado at sundin ang mga awtoridad>Mataranta at magsisigaw+Magtatakbo papunta kung saan-saan<Abalahin ang mga awtoridad",
"Alin sa mga ito ang hindi halimbawa ng pagiging masunurin sa pampublikong lugar?=Pagsusulat sa pader>Pagpapanatili ng kalinisan ng paligid+Pag-iwas sa pag-iingay<Paggalang sa mga patakaran ng lugar",

);

?>

</head>

</bod

</html>