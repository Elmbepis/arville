<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nasyonalismo: Pagtangkilik sa mga Lokal na Produkto - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Nasyonalismo: Pagtangkilik sa mga Lokal na Produkto";
$_SESSION['tnum']="*5b";

$questions=array(

"Alin sa mga sumusunod ang isang paraan ng pagpapakita ng nasyonalismo?=Pagtangkilik sa mga produktong Pilipino>Pagbili ng mga produktong gawa sa ibang bansa+Pagtira sa ibang bansa<Pagsasalita sa wikang Ingles sa lahat ng oras",
"Alin sa mga sumusunod ang isa sa mga epekto ng pagtangkilik sa mga lokal na produkto?=Pagtulong sa kabuhayan ng kapwa Pilipino>Pagpapayaman sa sarili+Pagbibigay ng kabuhayan sa mga naninirahan sa ibang bansa<Pag-aaksaya ng pera",
"Alin sa mga sumusunod ang epekto sa ekonomiya ng pagtangkilik sa mga lokal na produkto?=Paglakas ng mga lokal na industriya>Pagdami ng mga walang trabaho sa bansa+Paglaganap ng kahirapan<Pagsasara ng mga pabrika",
"Alin sa mga sumusunod ang hindi lokal na produkto?=Gatas mula sa Australia>Banig na gawa sa Bohol+Basket na gawa sa Ifugao<Tsinelas mula sa Liliw",
"Sino sa mga sumusunod ang hindi tuwirang natutulungan ng pagbili natin ng mga tinda sa palengke?=Mga manggagamot>Mga magsasaka+Mga tindera<Mga pahinante",
"Alin sa mga sumusunod ang hindi isa sa mga dahilan kung bakit dapat tayong gumamit ng mga lokal na materyales sa paggawa ng isang proyekto?=Para makatulong sa mga negosyante sa ibang bansa>Para makatulong sa pagpapalago ng mga lokal na industriya+Para mabilis matanggap ang mga gagamiting materyales<Para mapadali ang paghahanap ng mga materyales",
"Ano ang ibig sabihin ng \"sariling atin\"?=Mga produktong gawang Pilipino>Mga produktong galing sa ibang bansa+Mga banyagang awiting nauso rito<Mga dayuhang dito na nanirahan",
"Alin sa mga sumusunod ang dapat mong bilhin upang suportahan ang industriya ng paggawa ng tradisyunal na pagkaing Pilipino?=Kakanin>Cheeseburger+Hotdog sandwich<Pizza",
"Matutulungan mo ang mga lokal na negosyo sa inyong lalawigan sa pamamagitan ng alin sa mga sumusunod?=Pagpapakilala ng mga produkto nila sa iba>Pagrerekomenda ng mga imported na produkto sa social media+Pagbili sa mga banyagang online shops<Pagbili ng mga sikat na produkto sa isang mall",
"Alin sa mga sumusunod na produkto ang hindi gawang-kamay sa mga maliliit o pambahay na negosyo sa ating bansa?=Kompyuter>Banig+Basket<Bayong",
"Alin sa mga sumusunod ang isang epektibong paraan ng pagtangkilik sa mga lokal na produkto gamit ang teknolohiya?=Pagpo-promote ng mga ito sa social media>Pagpo-promote ng mga ito sa pamamagitan ng mga polyeto+Pagbili online ng mga banyagang produktong kapareho ng mga ito<Paggamit ng social media para magrekomenda ng mga banyagang alternatibo para sa mga ito",
"Ano ang natututunan ng mga kabataan sa pagkain ng mga tradisyunal na lutuing Pilipino?=Pagpapahalaga sa kultura>Pagkawili sa fast food+Paghanga sa ibang bansa<Pag-iwas sa mga lokal na produkto",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit dapat tayong gumamit ng 'reusable bags' na gawa sa Pilipinas?=Para lumala ang polusyon>Para makatulong sa mga lokal na negosyante+Para mapangalagaan ang kapaligiran<Para mapalaganap ang paggamit ng mga lokal na materyales",
"Anong mensahe ang ating naipapahayag kapag tumatangkilik tayo sa sarili nating mga produkto?=Pagmamahal sa bansa>Pagsasantabi ng mga kapwa Pilipino+Paghanga sa mga dayuhan<Paglimot sa pinanggalingan",
"Alin sa mga sumusunod ang dapat mong bilhin bilang pagpapakita ng nasyonalismo?=Mangga mula sa Guimaras>Mansanas mula sa Amerika+Kiwi mula sa New Zealand<Kahel mula sa Tsina",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit mahalaga ang pagrerekomenda sa social media ng mga produktong galing sa mga lalawigan?=Para mawalan ng interes ang mga tao sa mga ito>Para mapalaganap ang kaalaman tungkol sa mga ito+Para maipagmalaki ang mga industriya sa mga lalawigan<Para mapalakas ang ekonomiya ng mga lalawigan",
"Saan karaniwang makabibili ng mga lokal na sariwang prutas sa mababang halaga?=Sa palengke>Sa banyagang online store+Sa dayuhang mall<Sa airport",
"Alin sa mga sumusunod ang hindi kabilang sa mga benepisyong hatid ng mga karinderya sa komunidad?=Nagiging pihikan sa pagkain ang mga Pilipino>Nagkakaroon ng kabuhayan ang maraming maliliit na negosyante+Nakabibili ng murang pagkain ang mga mamamayan<Lumalakas ang ekonomiya ng komunidad",
"Sa larangan ng pananamit, alin sa mga sumusunod ang nagpapakita ng pagtangkilik sa sariling atin?=Pagsusuot ng barong Tagalog sa isang programa>Pagsusuot ng Amerikana sa isang pagtitipon+Pagbitbit ng mamahaling bag mula sa Europa<Pagsusuot ng mamahaling sapatos mula sa Italya",
"Alin sa mga sumusunod ang hindi halimbawa ng pagtangkilik sa sariling atin?=Pagkain ng prutas mula sa Tsina>Pagkain ng sinigang sa bahay+Pagbili ng banig mula sa Bicol<Pagbili ng sapatos na gawa sa Marikina",
"Alin sa mga sumusunod na produkto ang malamang na nagmula sa isang 'cottage industry' sa ating bansa?=Basket na yari sa rattan>Makulay na laruang plastik+Kompyuter<Mamahaling pabango",
"Alin sa mga sumusunod ang epekto ng pagtangkilik sa mga produkto ng sariling lalawigan?=Pagtaas ng kita ng mga lokal na negosyo>Pagdami ng mga imported na produkto+Pagkalugi ng mga lokal na tindahan<Pagkawala ng mga tradisyong Pilipino",
"Anong ugali ang naipapakita natin sa pagtangkilik ng mga produktong sariling atin?=Pagmamalasakit sa bansa>Paghanga sa mga dayuhan+Pagkakaroon ng kolonyal na mentalidad<Pagiging mayabang",
"Anong sektor ang tuwirang natutulungan ng pagtangkilik natin sa mga produktong Pilipino?=Mga manggagawang Pilipino>Mga negosyanteng dayuhan+Mga banyagang pabrika<Mga turistang bumibisita",
"Alin sa mga sumusunod ang pinakamaaaring maging epekto ng hindi natin pagtangkilik sa mga bagay na sariling atin?=Pagkawala ng ating pagkakakilanlan>Pag-unlad ng mga lokal na negosyo+Pagdami ng mga trabaho sa bansa<Paglaganap ng mga tradisyong Pilipino",

);

?>

</head>

</bod

</html>