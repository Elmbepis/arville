<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Maingat sa Paghuhusga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Maingat sa Paghuhusga";
$_SESSION['tnum']="*3i";

$questions=array(

"Ano ang kahulugan ng \"maingat na paghuhusga\"?=Ang pagsusuri at pag-iisip muna bago maniwala o magpasya>Ang pagtanggap agad sa lahat ng mga naririnig+Ang paniniwala agad sa mga tao lamang na kakilala mo<Ang hindi pagtanggap ng anumang impormasyon",
"Bakit dapat kang mag-ingat sa mga impormasyong naririnig mo tungkol sa barangay?=Upang maiwasan ang mga maling balita>Para makasali sa mga pagdiriwang+Para makaiwas sa mga gawain sa barangay<Para makakuha ng mga bagong tsismis",
"Saan karaniwang inilalagay ang mga opisyal na impormasyon at paalala ng barangay?=Sa barangay hall>Sa mga tindahan+Sa mga paaralan<Sa mga parke",
"Ano ang una mong dapat gawin kapag may narinig kang balita tungkol sa isang sunog sa inyong lugar?=Kumpirmahin muna ito sa barangay>Sabihin agad ito sa lahat ng mga kakilala+I-post ito sa social media<Magpadala agad ng donasyon sa barangay",
"Ano ang tawag sa mga kumakalat na balitang hindi pa kumpirmado o napapatunayan?=Sabi-sabi o tsismis>Anunsyo+Paalala<Babala",
"Bakit mahalagang suriin muna natin ang impormasyon bago ito paniwalaan?=Upang maiwasan ang mga kalituhan o di-pagkakaunawaan>Upang maiwasan ang mga responsibilidad+Para balewalain lang ito<Para magamit ito sa panlilinlang",
"Bakit dapat mong itanong sa nagbabahagi sa iyo ng isang balita kung saan niya narinig o nakuha ito?=Para makumpirma kung kapanipaniwala ito>Para makakuha ng iba pang mga tsismis+Para makapagpasalamat sa pinanggalingan<Para may maitanong lang",
"Ano ang dapat mong gawin kapag may isang tsismis na kumakalat tungkol sa isang tao?=Huwag itong ipagkalat>Ikuwento ito sa mga kakilala+Awayin ang taong pinag-uusapan<Gumawa ng vlog tungkol dito",
"Paano makatutulong sa kapayapaan ng barangay ang pagbabahagi ng tamang impormasyon lamang?=Naiiwasan ang mga di-pagkakaunawaan>Nalilito ang mga mamamayan+Naaaliw ang mga tao<Bumababa ang tiwala sa barangay",
"Alin sa mga ito ang hindi katangian ng impormasyong maaaring ibahagi sa social media?=Hindi pa napapatunayan>Kumpirmadong totoo+May halaga<Kailangang malaman ng marami",
"Ano ang dapat mong isipin bago ka magpakalat ng anumang impormasyon?=Kung makakasakit ito ng damdamin>Kung kasundo mo ang kausap mo+Kung mapapakinabangan mo ito<Kung nakakatawa ito",
"Alin sa mga ito ang tamang paraan ng pagbahagi ng impormasyon tungkol sa isang palaro sa paaralan?=Sabihin ang lahat ng mahahalagang detalye>Sabihin lamang ang premyong mapapanalunan+Sabihing libre ang lahat ng pagkain dito kahit hindi<Mag-imbento ng mga alituntunin sa pagsali rito",
"Ano ang dapat mong sabihin sa isang kaibigang nais mong mag-isip muna bago maniwala sa isang balita?=Kumpirmahin muna natin kung totoo ito.>Mukhang totoo nga ito.+Walang dahilan para hindi natin ito paniwalaan.<Magandang balita ito.",
"Alin sa mga ito ang halimbawa ng balitang mainam ibahagi sa barangay?=Anunsyo sa sama-samang paglilinis ng paligid>Away na naganap sa pagitan ng magkapitbahay+Kuwento tungkol sa personal na sikreto ng isang tao<Tsismis tungkol sa isang sikat na artista",
"Alin sa mga ito ang malamang na epekto ng pagkalat ng maling impormasyon?=Pagdudulot ng kalituhan at di-pagkakaunawaan>Pagdudulot ng masayang sorpresa sa lahat+Pagiging mas payapa ng pamayanan<Pagkakaisa ng mga tao sa komunidad",
"Kanino mo dapat ibahagi ang impormasyon tungkol sa isang pribadong aktibidad ng inyong klase?=Sa mga kaklase mo lamang na dapat makaalam>Sa lahat ng mga followers mo sa social media+Sa mga kalaro at kaibigan mo<Sa mga batang nasa ibang mga klase",
"Bakit hindi ka dapat maniwala agad sa mga nababasa mo sa social media?=Dahil hindi totoo ang maraming impormasyon dito>Dahil hindi na nakakaaliw ang mga ito+Dahil mas masarap manood ng balita sa TV<Para hindi na kailangang mag-isip pa",
"Alin sa mga ito ang dapat gawin ng inyong barangay para hindi malito ang mga mamamayan?=Pagpigil sa pagkalat ng mga pekeng balita>Pag-aanunsyo ng lahat ng mga kumakalat na balita+Hindi pagpansin sa lahat ng mga naririnig na balita<Hindi pag-aanunsyo ng anumang impormasyon",
"Ano ang dapat mong gawin kung malaman mong mali ang isang balitang naibahagi mo na?=Humingi ng paumanhin at itama ang impormasyon>Panindigang totoo ang balita+Magalit sa pinagkunan mo nito<Itangging ibinahagi mo ito sa iba",
"Kailan dapat maniwala sa isang 'text' o 'post' tungkol sa suspensiyon ng klase?=Kapag kinumpirma na ito ng paaralan o pamahalaan>Kapag narinig mo rin ito sa isang kaibigan+Kapag kinumpirma na ito ng iyong kaklase<Kapag umuulan nang malakas",
"Ano ang dapat mong gawin kapag may kumakalat na maling kuwento tungkol sa isa mong kaklase?=Suportahan siya at tanungin kung makakatulong ang inyong guro>Payuhan ang kaibigang awayin ang lahat ng mga naniniwala rito+Magkalat din ng maling kuwento tungkol sa pinagmulan ng tsismis<Umiwas muna sa kaklase",
"Alin sa mga ito ang hindi naidudulot ng pagkakalat ng mga positibo at mahahalagang balitang nakumpirma nang totoo?=Kalituhan at di-pagkakaunawaan>Pag-asa at ginhawa+Pagkakaisa<Kaalaman at pag-unawa",
"Ano ang unang hakbang sa pag-alam kung totoo ang isang balita?=Tanungin sa nagbalita kung saan galing ang impormasyon>Magsaliksik ng maraming katibayan sa internet+Kumpirmahin ito sa mga nakakasalubong sa kalye<Magdasal na malaman ang totoo",
"Ano ang dapat mong gawin kung may magsabi sa iyo ng isang lihim na maaaring makasira sa kanya?=Huwag itong ikuwento sa iba kailanman>Ikuwento lamang ito sa iyong pinakamatalik na kaibigan+Ibahagi ang mga detalye ng lihim pero huwag tukuyin kung tungkol kanino ito<Gawin itong katatawanan sa klase",
"Sino sa mga taong ito ang pinakamapagkakatiwalaan bilang mapagkukunan ng impormasyon o balita?=Pinuno o kapitan ng barangay>Mga nagkukumpulang magkakapitbahay+Mga batang palaging nasa lansangan<Pinakamatalik mong kaibigan",

);

?>

</head>

</bod

</html>