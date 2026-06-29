<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mabuting Katiwala - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mabuting Katiwala";
$_SESSION['tnum']="*74";

$questions=array(

"Alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala ng isang tao ang naipapakita sa pamamagitan ng maingat at responsableng paggamit ng salaping ipinagkatiwala sa kanya?=Pagpapahalaga sa yaman>Pangangalaga sa kalikasan+Paglilingkod sa kapwa<Paggamit ng talento at kakayahan",
"Ang maingat na pamamahala ng badyet para sa isang proyekto upang hindi agad ito maubos ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala?=Pagpapahalaga sa yaman>Pangangalaga sa kalikasan+Paglilingkod sa kapwa<Paggamit ng talento at kakayahan",
"Alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala ng isang tao ang magtitiyak na may pera siyang magagamit sa hinaharap o sa oras ng pangangailangan?=Pagtitipid at pag-iimpok>Pangangalaga sa kalikasan+Paglilingkod sa kapwa<Paggamit ng talento at kakayahan",
"Ang paghuhulog ng natirang baon sa isang garapon araw-araw ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala?=Pagtitipid at pag-iimpok>Pangangalaga sa kalikasan+Paglilingkod sa kapwa<Paggamit ng talento at kakayahan",
"Alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala ng isang tao ang tumutukoy sa kanyang pagpapanatili ng kaayusan at kalinisan ng kapaligiran at pag-iingat sa mga yamang nagmumula rito?=Pangangalaga sa kalikasan>Pagtitipid at pag-iimpok+Paglilingkod sa kapwa<Paggamit ng talento at kakayahan",
"Ang hindi pagputol ng mga matatandang puno sa kagubatan ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala?=Pangangalaga sa kalikasan>Pagtitipid at pag-iimpok+Paglilingkod sa kapwa<Paggamit ng talento at kakayahan",
"Alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala ng isang tao ang tumutukoy sa paggamit niya ng mga biyayang natatanggap upang maghatid ng serbisyo sa ibang tao at sa komunidad?=Paglilingkod sa kapwa>Pagtitipid at pag-iimpok+Pangangalaga sa kalikasan<Pagsunod sa batas",
"Ang paggamit ng naipong pera para ipagamot ang isang kaibigang maysakit ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala?=Paglilingkod sa kapwa>Pagtitipid at pag-iimpok+Pangangalaga sa kalikasan<Pagsunod sa batas",
"Alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala ng isang tao ang tumutukoy sa paggamit niya ng kanyang mga kasanayan at abilidad upang makagawa ng kabutihan at magbigay ng positibong kontribusyon sa kanyang komunidad?=Paggamit ng talento at kakayahan>Pagtitipid at pag-iimpok+Pangangalaga sa kalikasan<Pagsunod sa batas",
"Ang pagbibigay ng libreng serbisyo ng isang dentista sa kanyang mga kabarangay ay halimbawa ng alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala?=Paggamit ng talento at kakayahan>Pagtitipid at pag-iimpok+Pangangalaga sa kalikasan<Pagsunod sa batas",
"Alin sa mga sumusunod na aspeto ng pagiging mabuting katiwala ng isang tao ang tumutukoy sa pagsunod sa mga batas at regulasyon ng komunidad?=Pagiging responsableng mamamayan>Pagtitipid at pag-iimpok+Pangangalaga sa kalikasan<Paggamit ng talento at kakayahan",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang iyong nilalabag kung mas inuuna mo pa ang pagbili ng kendi kaysa pagbili ng malusog na pagkain?=Pag-iwas sa pagbili ng hindi kailangan>Paghuhulog sa alkansiya+Pagbili ng mahahalagang bagay<Pagbabadyet",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang tumutukoy sa pagpapaliban ng pagbili ng isang bagay na hindi mo pa gagamitin?=Pag-iwas sa pagbili ng hindi kailangan>Paghuhulog sa alkansiya+Pagbili ng mahahalagang bagay<Pagbabadyet",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang tumutukoy sa paglalagay ng barya sa isang lalagyan araw-araw para makaipon ng malaking halaga?=Paghuhulog sa alkansiya>Pag-iwas sa pagbili ng hindi kailangan+Pagbili ng mahahalagang bagay<Pagbabadyet",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang tumutukoy sa pagpapasok ng natirang pera mula sa iyong baon sa isang bagay na sisidlan ng barya?=Paghuhulog sa alkansiya>Pag-iwas sa pagbili ng hindi kailangan+Pagbili ng mahahalagang bagay<Pagbabadyet",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang iyong nilalabag tuwing bumibili ka ng isang kamisetang manipis at madaling mapunit?=Pagbili ng mahahalagang bagay>Paghuhulog sa alkansiya+Pag-iwas sa pagbili ng hindi kailangan<Pagbabadyet",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang tumutukoy sa pagpili ng mga kagamitang matibay at magbibigay ng mahabang panahon ng serbisyo?=Pagbili ng mahahalagang bagay>Paghuhulog sa alkansiya+Pag-iwas sa pagbili ng hindi kailangan<Pagbabadyet",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang tumutukoy sa paggawa ng simpleng plano sa paggasta?=Pagbabadyet>Paghuhulog sa alkansiya+Pag-iwas sa pagbili ng hindi kailangan<Pagbili ng mahahalagang bagay",
"Alin sa mga sumusunod na paraan ng pagtitipid at pag-iimpok ang tumutukoy sa pagsubaybay sa pagpasok at paglabas ng pera para maiwasan ang labis na paggasta?=Pagbabadyet>Paghuhulog sa alkansiya+Pag-iwas sa pagbili ng hindi kailangan<Pagbili ng mahahalagang bagay",
"Ang pagbili ng mga damit para sa mga bata sa isang ampunan ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagtitipid at pag-iimpok upang tulungan ang kapwa at pamayanan?=Pagbibigay sa kapwa>Paglahok sa mga proyektong pangkomunidad+Pagpapalaganap ng kaalaman<Pagsasagawa ng sariling proyekto",
"Ang pag-aambag ng naipong pera sa inilunsad na proyekto ng inyong barangay upang linisin ang isang maruming ilog ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagtitipid at pag-iimpok upang tulungan ang kapwa at pamayanan?=Paglahok sa mga proyektong pangkomunidad>Pagbibigay sa kapwa+Pagpapalaganap ng kaalaman<Pagsasagawa ng sariling proyekto",
"Ang pagtuturo sa mga bata ng kahalagahan ng pagtitipid at pag-iimpok ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagtitipid at pag-iimpok upang tulungan ang kapwa at pamayanan?=Pagpapalaganap ng kaalaman>Pagbibigay sa kapwa+Paglahok sa mga proyektong pangkomunidad<Pagsasagawa ng sariling proyekto",
"Ang pag-oorganisa ng isang 'feeding program' para sa mga batang maralita ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagtitipid at pag-iimpok upang tulungan ang kapwa at pamayanan?=Pagsasagawa ng sariling proyekto>Pagbibigay sa kapwa+Paglahok sa mga proyektong pangkomunidad<Pagpapalaganap ng kaalaman",
"Ano ang ibig sabihin ng pagiging mabuting katiwala?=Responsableng pangangalaga sa mga bagay na ipinamahala sa atin>Pagbibigay ng tiwala sa lahat ng tao+Hindi pangangalaga sa mga bagay na ipinamahala sa atin<Pagiging madasalin at pagtitiwala sa Diyos",
"Bakit mahalaga ang pag-iimpok at pagtitipid?=Upang may perang mahuhugot sa hinaharap>Upang may perang magagastos sa pagpapasarap sa kasalukuyan+Upang makakuha ng papuri mula sa ibang tao<Upang may perang maipamimigay sa ibang tao",
"Alin sa mga sumusunod ang inaasahang epekto ng pagkaubos ng mga puno sa kagubatan kung hindi tayo magiging mabuting katiwala ng kalikasan?=Pagkawala ng tirahan ng maraming hayop>Pagdami ng mga bagong halaman+Mas magandang balanse sa kalikasan<Pagpigil sa pagbabaha",
"Bilang katiwala ng kalikasan, alin sa mga sumusunod ang isa sa mga dapat gawin upang mapanatili ang kalinisan ng mga katubigan?=Iwasan ang pagtatapon ng mga kemikal malapit sa mga ito>Gawing tapunan ng mga basura ang mga ito+Huwag magtipid sa paggamit ng tubig sa bahay<Gumamit ng mga pampasabog sa panghuhuli ng isda",
"Ano ang pangunahing layunin ng pagkakaroon ng mga protektadong lugar tulad ng 'wildlife sanctuaries'?=Mapangalagaan ang mga hayop sa kanilang mga natural na habitat>Magkaroon ng pasyalan ang mga turista+May mapaglagyan ng mga pabahay para sa mahihirap<Magkaroon ng ligtas na imbakan ng mga kemikal",
"Bakit mahalaga ang tamang pamamahala ng basura sa pagpapanatili ng panahanan ng mga hayop?=Nakakabawas ito ng polusyon sa mga tirahan ng mga hayop>Nagugulo nito ang balanse ng kalikasan+Nakakapagpanipis ito ng mga kagubatan<Napapadali nito ang pagsusunog ng basura",
"Alin sa mga sumusunod na aktibidad ang hindi nakakasira sa panahanan ng mga hayop?=Pagtatanim ng mga akmang puno at halaman>Ilegal na panghuhuli ng mga hayop+Pagtatapon ng basura sa mga katubigan<Pagpapakawala ng mga invasive species sa isang lugar",
"Bakit mahalaga ang pagpapanatili ng panahanan ng mga hayop sa kalikasan?=Upang mapanatili ang balanse ng kalikasan at biodiversity>Upang mas maraming matirhan ang mga tao+Upang magamit ang mga hayop bilang aliwan<Upang dumami ang mga trabaho sa mga lungsod",

);

?>

</head>

</bod

</html>