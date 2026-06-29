<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Malikhain - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Malikhain";
$_SESSION['tnum']="*7i";

$questions=array(

"Ano ang ibig sabihin ng pagiging malikhain?=Paggawa ng mga bagong ideya o solusyon>Paggaya sa ideya ng iba+Pag-iwas sa mga problema<Pagpapanatili ng mga lumang kaisipan",
"Ano ang glokalisasyon?=Pagsasama ng mga lokal at pandaigdigang ideya upang lumikha ng angkop na solusyon>Tuwirang pagkopya lamang sa mga dayuhang ideya+Pagsasantabi ng mga lokal na ideya<Pag-iwas sa pandaigdigang kaalaman",
"Ano ang layunin ng glokalisasyon?=Gawing batayan ang mga dayuhang ideya para lumikha ng solusyong akma sa lokal na konteksto>Gumamit ng pandaigdigang ideya nang walang binabago+Iwasan nang lubos ang paggamit ng mga dayuhang ideya<Pagpapalaganap ng mga lokal na ideya sa ibang bansa",
"Alin sa mga sumusunod ang halimbawa ng glokalisasyong makikita sa Pilipinas?=Pag-aangkop ng mga modernong teknolohiya sa agrikultura sa ating klima>Pag-aangkat ng mga dayuhang produkto nang walang pagbabago+Paglikha ng lokal at orihinal na teknolohiyang pang-agrikultural para sa ating bansa<Pagbebenta ng mga dayuhang produkto sa ating lokal na pamilihan",
"Ano ang unang hakbang sa paglikha ng malikhaing solusyon?=Pagkilala sa suliranin>Pakikipagtulungan sa pamayanan+Paghahanap ng inspirasyon<Pag-angkop sa lokal na konteksto",
"Alin sa mga sumusunod na hakbang sa paglikha ng malikhaing solusyon ang tumutukoy sa pananaliksik upang makahanap ng mga epektibong solusyon mula sa ibang bahagi ng mundo?=Paghahanap ng inspirasyon>Pakikipagtulungan sa pamayanan+Pagkilala sa suliranin<Pag-angkop sa lokal na konteksto",
"Alin sa mga sumusunod na hakbang sa paglikha ng malikhaing solusyon ang tumutukoy sa pagbabago ng mga dayuhang solusyon para maging epektibo ang mga ito sa ating bansa?=Pag-angkop sa lokal na konteksto>Pakikipagtulungan sa pamayanan+Pagkilala sa suliranin<Paghahanap ng inspirasyon",
"Alin sa mga sumusunod na hakbang sa paglikha ng malikhaing solusyon ang tumutukoy sa pakikipag-ugnayan sa iba't ibang sektor tulad ng pamilya, paaralan, barangay, at lokal na negosyo upang matagumpay na maipatupad ang solusyon?=Pakikipagtulungan sa pamayanan>Pag-angkop sa lokal na konteksto+Pagkilala sa suliranin<Paghahanap ng inspirasyon",
"Ano ang pangunahing layunin ng glokalisasyon?=Tugunan ang mga lokal na suliranin gamit ang mga pandaigdigang ideya>Lumikha ng mga pandaigdigang produkto+Isantabi nang lubos ang mga lokal na pamamaraan<Gamitin lamang ang mga ideya mula sa ibang bansa para tuwirang tugunan ang mga suliranin ng bansa",
"Paano nakatutulong ang glokalisasyon sa ekonomiya?=Pinapalakas nito ang lokal na produksyon gamit ang mga pandaigdigang ideya>Pinapalitan nito ang mga tradisyunal na industriya+Binabawasan nito ang mga trabaho sa bansa<Pinipilit nito ang lahat na mga dayuhang produkto lamang ang bilhin",
"Bakit mahalaga ang pakikilahok ng komunidad sa malikhaing proyekto?=Upang makapagtulung-tulong gawing matagumpay ang proyekto>Upang makapagpasikat ang komunidad sa iba+Upang maipagyabang ng mga mamamayan ang komunidad<Upang mapagod ang mga mamamayan",
"Alin sa mga sumusunod ang halimbawa ng lokal na proyektong makatutulong nang malaki sa komunidad?=Pagsasagawa ng urban farming ng mga gulay>Pag-aangkat ng mga dayuhang produkto+Pagpapalabas ng mga dayuhang pelikula<Paggamit ng social media para punahin ang ibang barangay",
"Ano ang layunin ng pagtatayo ng mga harding pangkomunidad sa mga bakanteng lote?=Magtanim ng mga gulay at prutas para sa pangangailangan ng komunidad>Gawing palaruan ang mga bakanteng lote+Magbenta ng mga pagkaing galing sa ibang bansa<Gawing komersyal ang mga lote para tumaas ang halaga ng mga ito",
"Bakit mahalaga ang pag-unawa sa lokal na kultura sa glokalisasyon?=Upang maiangkop ang pandaigdigang solusyon sa lokal na konteksto>Upang mapadali ang pagpapalit sa mga lokal na tradisyon+Upang maipakitang mas maganda ang mga banyagang ideya<Upang maibenta ang mga dayuhang produkto sa mga lokal na pamilihan",
"Alin sa mga sumusunod ang pangunahing epekto ng paglikha ng mga produktong ni-resaykel sa komunidad?=Pagkabawas ng basura at polusyon>Pagsikat ng komunidad+Paglaki ng pagkonsumo ng mga mamamayan<Pagkaubos ng mga likas na yaman",
"Alin sa mga sumusunod ang dapat isaalang-alang sa paghahanap ng malikhaing solusyon?=Ang lokal na sitwasyon at pangangailangan>Ang paggamit ng modernong teknolohiya lamang+Ang mabilis na pagpapalit ng mga lokal na tradisyon<Ang paggamit ng mga dayuhang ideya lamang",
"Bakit kailangang maglunsad ng mga clean-up drive ang isang pamayanan?=Para mapanatiling malinis ang komunidad>Para sumikat ang nag-organisa nito+Para makapagmalaki sa ibang mga barangay<Para magkaroon ng makakain ang mga mamamayan",
"Alin sa mga sumusunod ang dapat gawin bago ipatupad ang isang malikhaing solusyon?=Makipagtulungan sa komunidad>Tiyaking walang konsultasyon sa mga otoridad+Magpakalat ng maling impormasyon para makakuha ng suporta sa proyekto<Manghingi ng sapilitang donasyon sa mga mamamayan",
"Ano ang pangunahing benepisyo ng malikhaing paggamit ng glokalisasyon?=Mabilis at angkop na pagtugon sa mga lokal na suliranin>Pag-iwas sa pananaliksik+Pagkawala ng mga tradisyunal na kaalaman<Pagsasantabi ng mga lokal na ideya at kontribusyon",
"Alin sa mga sumusunod ang pinakadapat isaalang-alang sa paglikha ng isang malikhaing solusyon?=Kaugnayan ng ideya sa lokal na isyu o pangangailangan>Pinagmulan ng teknolohiyang gagamitin+Mababang halaga ng pagpapatupad ng ideya<Bilis ng proseso ng pagpapatupad ng solusyon",
"Alin sa mga sumusunod ang hindi dahilan kung bakit mahalaga ang konsultasyon sa pamayanan bago magpatupad ng proyekto?=Upang makapagpasikat ang magpapatupad nito>Upang makuha ang suporta ng mga mamamayan+Upang matiyak na akma ito sa pangangailangan ng komunidad<Upang matiyak na hindi ito lilikha ng panibagong problema",
"Alin sa mga sumusunod ang hindi isa sa mga benepisyo ng pagkakaroon ng malikhaing proyekto sa komunidad?=Paglaki ng gastusin ng komunidad>Pagkalutas ng isang lokal na suliranin+Pagkakaisa ng mga mamamayan<Pagkatuto ng mga mamamayan ng mga bagong kaalaman",
"Alin sa mga sumusunod ang dapat tiyakin sa pagsasagawa ng isang malikhaing proyekto?=Na makabubuti ito sa lokal na komunidad>Na sisikat ang lider ng proyekto+Na mapapalitan ang lahat ng mga lumang kaugalian ng komunidad<Na mga dayuhang teknolohiya lamang ang gagamitin",
"Alin sa mga sumusunod ang tumutukoy sa paggawa ng mga produktong ni-resaykel?=Paglikha ng mga bagong gamit mula sa mga lumang bagay>Pagtatapon ng mga lumang bagay na maaaari pang gamitin+Pagbili ng mga segunda manong produkto<Pag-aangkat ng mga gamit na wala rito mula sa ibang bansa",
"Bakit mahalaga ang pagiging bukas sa mga ideya mula sa ibang bansa?=Upang makahanap ng inspirasyon para malutas ang isang lokal na problema>Upang mapalitan na ang mga lokal na kaisipan+Upang tuwirang kopyahin ang mga banyagang ideya<Upang maipakitang mas magaling ang mga banyaga kaysa sa atin",


);

?>

</head>

</bod

</html>