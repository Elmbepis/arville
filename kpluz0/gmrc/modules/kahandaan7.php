<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Kahandaan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Kahandaan";
$_SESSION['tnum']="*75";

$questions=array(

"Alin sa mga sumusunod na aspeto ang kahandaan sa panahon ng kalamidad ang tumutukoy sa pagkakaroon ng estratehiya sa paglikas, tiyak na lugar ng pagtatagpo, at mga paraan ng pakikipag-ugnayan?=Pagpaplano>Pagtuturo at pagsasanay+Pagsubaybay sa mga babala<Pagtutulungan sa komunidad",
"Alin sa mga sumusunod na aspeto ang kahandaan sa panahon ng kalamidad ang ginagawa upang malaman ng mga miyembro ng pamilya, lalo na ng mga bata, kung ano ang dapat gawin sa oras ng kalamidad?=Pagtuturo at pagsasanay>Pagpaplano+Pagsubaybay sa mga babala<Pagtutulungan sa komunidad",
"Alin sa mga sumusunod na aspeto ang kahandaan sa panahon ng kalamidad ang ginagawa upang palaging maging mulat sa mga anunsyo at alertong ibinibigay ng mga awtoridad?=Pagsubaybay sa mga babala>Pagpaplano+Pagtuturo at pagsasanay<Pagtutulungan sa komunidad",
"Alin sa mga sumusunod na aspeto ang kahandaan sa panahon ng kalamidad ang tumutukoy sa pakikipag-ugnayan at pagsuporta sa isa't isa ng mga kasapi ng pamayanan?=Pagtutulungan sa komunidad>Pagpaplano+Pagtuturo at pagsasanay<Pagsubaybay sa mga babala",
"Alin sa mga sumusunod na aspeto ang kahandaan sa panahon ng kalamidad ang tumutukoy sa patuloy na pag-aaral at pag-eensayo upang magkaroon ng kumpiyansa sa pagharap sa anumang uri ng kalamidad?=Pagpapalawig ng kaalaman>Pagpaplano+Pagtutulungan sa komunidad<Pagsubaybay sa mga babala",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat isama sa isang 'emergency kit'?=kurtina>Plaslayt+Pagkain at tubig<Gamot",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang dapat gawin upang makapag-isip nang tama at makagawa ng wasto at mabilis na desisyon?=Manatiling kalmado.>Sumunod sa mga alituntunin.+Umiwas sa panganib.<Maghanda ng emergency kit.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang dapat gawin upang malaman ang pinakabagong impormasyon at babala tungkol sa kalamidad?=Makinig sa balita.>Manatiling kalmado.+Umiwas sa panganib.<Maghanda ng emergency kit.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa pagtalima sa mga utos ng awtoridad upang masiguro ang kaligtasan?=Sumunod sa mga alituntunin.>Manatiling kalmado.+Umiwas sa panganib.<Maghanda ng emergency kit.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa paglayo sa mga binahang lugar, pagguho ng lupa, at iba pang peligro?=Umiwas sa panganib.>Manatiling kalmado.+Sumunod sa mga alituntunin.<Maghanda ng emergency kit.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa paglalagay ng mga mahahalagang bagay tulad ng tubig, pagkain, gamot, plaslayt, baterya, at 'first aid kit' sa isang bag na madaling bitbitin?=Maghanda ng emergency kit.>Manatiling kalmado.+Sumunod sa mga alituntunin.<Umiwas sa panganib.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa paglilista ng mga telepono ng mga kamag-anak, kaibigan, at awtoridad na maaaring tawagan sa oras ng pangangailangan?=Itala ang mahahalagang numero.>Alamin ang plano sa paglikas.+Palakasin ang loob.<Sanayin ang pamilya.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa pagkakaroon ng tiyak na estratehiya kung paano lilisan sa kinaroroonan upang makapunta sa isang mas ligtas na lugar?=Alamin ang plano sa paglikas.>Itala ang mahahalagang numero.+Palakasin ang loob.<Sanayin ang pamilya.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa pagpapataas ng kumpiyansa sa pagharap sa mga kalamidad sa pamamagitan ng pagdadagdag ng kaalaman at kasanayan?=Palakasin ang loob.>Itala ang mahahalagang numero.+Alamin ang plano sa paglikas.<Sanayin ang pamilya.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa pagpapataas ng mga magulang at anak sa kanilang kahusayan sa pagtugon sa kalamidad?=Sanayin ang pamilya.>Itala ang mahahalagang numero.+Alamin ang plano sa paglikas.<Palakasin ang loob.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa pagtuturo ng mga natutunan sa mga kaibigan, kapitbahay, at komunidad upang ang lahat ay maging handa?=Ibahagi ang kaalaman.>Itala ang mahahalagang numero.+Alamin ang plano sa paglikas.<Lumahok sa mga aktibidad ng komunidad.",
"Alin sa mga sumusunod na elemento ng wastong pagtugon sa panahon ng kalamidad ang tumutukoy sa pagsali sa mga programang pangkaligtasan ng inyong barangay?=Lumahok sa mga aktibidad ng komunidad.>Itala ang mahahalagang numero.+Alamin ang plano sa paglikas.<Ibahagi ang kaalaman.",
"Bakit mahalaga ang regular na pagsasanay ng mga miyembro ng pamilya sa oras ng kalamidad?=Upang maging handa ang lahat sa pagtugon sa kalamidad.>Upang matakot ang lahat sa kalamidad.+Upang mapigilan ang pagdating ng kalamidad.<Upang maalis sa isipan ng lahat ang peligro ng kalamidad.",
"Alin sa mga sumusunod ang HINDI kabilang sa mga makukuhang impormasyon mula sa mga pag-aanunsyo ng mga awtoridad sa panahon ng kalamidad?=Mga mapagkakakitaan sa panahon ng kalamidad>Mga babala o alerto+Wastong paraan ng paglikas<Sitwasyon sa mga pook na apektado ng kalamidad",
"Alin sa mga sumusunod ang HINDI kabilang sa mga dapat gawin upang mapalawak ang kaalaman sa tamang pagtugon sa kalamidad?=Paglalaro ng mga larong bidyong may kaugnayan sa isang kalamidad>Pagbabasa tungkol sa pagtugon sa mga kalamidad+Pagsasanay ng mga wastong hakbang sa pagtugon sa mga kalamidad<Panonood ng mga mapagkakatiwalaang bidyo tungkol sa pagtugon sa mga kalamidad",
"Bakit mahalaga ang pagiging kalmado sa oras ng kalamidad?=Upang makapag-isip nang tama at makagawa ng wasto at mabilis na desisyon>Upang makagawa ng padalus-dalos na desisyon dahil sa pagkataranta+Upang maisantabi ang peligrong dala ng kalamidad<Upang hindi na kailanganin ang pagsubaybay sa mga babala ng mga awtoridad",
"Bakit mahalaga ang pagsunod sa mga alituntunin ng mga awtoridad sa oras ng kalamidad?=Upang matiyak ang kaligtasan>Upang hindi mapagalitan ng mga awtoridad+Upang kahangaan sa komunidad<Upang maiangat ang sarili sa kapwa",
"Alin sa mga sumusunod ang HINDI kabilang sa mga panganib na dapat iwasan sa panahon ng kalamidad?=Sentro ng paglikas>Mataas na baha+Pagguho ng lupa<Buhay na kable ng kuryente",
"Alin sa mga sumusunod ang pinakamainam gawin upang mapalakas ang loob at kumpiyansa sa pagharap sa mga kalamidad?=Pag-aaral at pagsasanay>Pag-aaral at paglilibang+Pagsasanay at pamamasyal<Paglilibang at pamamasyal",
"Bakit mahalaga ang pagbabahagi ng kaalaman tungkol sa kahandaan sa kalamidad?=Upang ang lahat ay maging handa>Upang ang lahat ay mag-alala+Upang maipakita ang talino sa iba<Upang mabalewala ng lahat ang peligrong dala ng kalamidad",

);

?>

</head>

</bod

</html>