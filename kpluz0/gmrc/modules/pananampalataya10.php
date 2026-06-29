<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pananampalataya sa Diyos - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pananampalataya sa Diyos";
$_SESSION['tnum']="*a3";

$questions=array(

"Alin sa mga sumusunod ang katangian ng tunay na pananampalataya?=Dapat itong lumago sa pamamagitan ng konkretong paggawa ng kabutihan>Dapat itong madama lamang sa loob ng simbahan o sa oras ng panalangin+Dapat itong maging isang personal na paniniwalang hindi kailangang ipakita sa iyong pagkilos<Dapat itong magpokus lamang sa pakikipag-usap sa Diyos at hindi sa pakikipag-ugnayan sa kapwa",
"Alin sa mga sumusunod ang dapat mong taglayin tuwing ikaw ay nananalangin sa Diyos?=Tapat na pusong may matibay na pananampalataya>Perpektong pusong walang kasalanan+Matalas na utak na kabisado ang mga aral ng Diyos<Malaking kayamanang maiaalay sa simbahan",
"Alin sa mga sumusunod ang hindi kabilang sa mga natural na hilig ng tao?=Magpatawad kahit mahirap itong gawin>Maghangad ng sariling kaligayahan+Magtago kapag may panganib<Gumanti kapag nasaktan",
"Alin sa mga sumusunod ang pinakamalinaw na patunay ng iyong pananampalataya sa Diyos?=Paglilingkod sa kapwa>Pagsisimba tuwing Linggo+Pag-aaral ng Bibliya araw-araw<Pagsasaulo ng maraming dasal",
"Anong uri ng kabutihan ang pinakadalisay na alay sa Diyos?=Kabutihang ginagawa nang hindi nagpapakilala>Kabutihang ginagawa sa harap ng maraming tao+Kabutihang gumamit ng malaking halaga ng pera<Kabutihang ipino-post sa social media",
"Alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos ang tumutukoy sa direkta at taimtim pakikipag-usap sa Diyos nang tapat gamit ang sariling pananalita?=Regular na pananalangin>Pagbabasa ng Banal na Kasulatan+Pagsali sa mga gawaing panrelihiyon<Pagpapatawad sa mga nagkasala sa iyo",
"Ang paglalaan ng oras araw-araw upang pag-aralan ang kahit isang talata lamang mula sa Bibliya ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Pagbabasa ng Banal na Kasulatan>Regular na pananalangin+Pamumuhay ayon sa pananampalataya<Pakikilahok sa mga retreat",
"Ang pagiging sakristan, choir member, lector, o simpleng volunteer sa mga gawain ng simbahan ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Pagsali sa mga gawaing panrelihiyon>Paglilingkod sa mga nangangailangan+Pakikilahok sa mga retreat<Pagpapatawad sa mga nagkasala sa iyo",
"Ang pagpapakain sa mga nagugutom, pagbibigay ng mga damit sa mga nasunugan, at pagdalaw sa mga maysakit ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Paglilingkod sa mga nangangailangan>Pagsali sa mga gawaing panrelihiyon+Pagbabasa ng Banal na Kasulatan<Paghikayat sa ibang makibahagi sa kabutihan",
"Ang pagsali sa mga aktibidad na nagbibigay ng panahon upang lumayo mula sa ingay ng mundo at makapag-focus sa relasyon sa Diyos ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Pakikilahok sa mga retreat at iba pang spiritual activities>Paghikayat sa ibang makibahagi sa kabutihan+Pamumuhay ayon sa pananampalataya<Pagpapatawad sa mga nagkasala sa iyo",
"Ang pagtanggap sa paumanhin at pagkilala sa pagsisi ng isang taong nagkasala sa iyo ay tumutukoy sa alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Pagpapatawad sa mga nagkasala sa iyo>Paglilingkod sa mga nangangailangan+Pagbabasa ng Banal na Kasulatan<Pakikilahok sa mga retreat",
"Ang pagmamalasakit sa iyong kapwa araw-araw sa tahanan, paaralan, at komunidad nang hindi nagpapakitang-tao ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Pamumuhay ayon sa pananampalataya kahit walang nakatingin>Regular na pananalangin+Pagsali sa mga gawaing panrelihiyon<Pagpapatawad sa mga nagkasala sa iyo",
"Ang pagiging halimbawa sa paggawa ng mabuti upang mabigyan ang mga kaibiga ng inspirasyon na sumubok ding maglingkod sa Diyos ay tumutukoy sa alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Paghikayat sa ibang makibahagi sa kabutihan>Pamumuhay ayon sa pananampalataya kahit walang nakatingin+Pagpapatawad sa mga nagkasala sa iyo<Pakikilahok sa mga retreat",
"Ang pagpili ng isang oras bawa't linggo para italaga sa Diyos kung saan maaaring magbasa ng Bibliya, manalangin, o magnilay ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Maglaan ng Sacred Hour kada linggo>Magsimula ng Gratitude Journal+Gumawa ng kabutihan nang hindi nagpapakilala<Magsanay ng pagsusuri ng konsensiya bago matulog",
"Ang araw-araw na paglilista ng tatlong bagay na ipinagpapasalamat mo sa Diyos ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Magsimula ng Gratitude Journal>Maglaan ng Sacred Hour kada linggo+Magsanay ng pagsusuri ng konsensiya bago matulog<Makilahok sa campus ministry ng inyong paaralan",
"Ang pag-aabot ng pagkain sa isang nagugutom na batang lansangan o pagbibigay ng damit sa isang matanda ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Gumawa ng kabutihan nang hindi nagpapakilala>Maglaan ng Sacred Hour kada linggo+Magsimula ng Gratitude Journal<Makilahok sa mga retreat at recollection ng paaralan",
"Ang pagbabalik-tanaw sa iyong araw bago matulog upang malaman kung saan mo naramdaman ang presensya ng Diyos at kung saan ka lumayo sa Kanya ay tumutukoy sa alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Magsanay ng pagsusuri ng konsensiya bago matulog>Magsimula ng Gratitude Journal+Gumawa ng kabutihan nang hindi nagpapakilala<Maging bahagi ng outreach programs ng inyong paaralan",
"Ang pagsali sa isang grupong panrelihiyon sa paaralan para makapagturo ng mga aral ng Diyos ay tumutukoy sa alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Makilahok sa campus ministry>Makilahok sa mga retreat at recollection ng paaralan+Magsanay ng pagsusuri ng konsensiya bago matulog<Gumawa ng kabutihan nang hindi nagpapakilala",
"Ang pagsama sa medical missions at feeding programs sa mahihirap na lugar ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Maging bahagi ng outreach programs>Makilahok sa mga retreat at recollection+Maglaan ng Sacred Hour kada linggo<Hikayatin ang ibang maglingkod sa Diyos",
"Ang pagkukuwento sa mga kaibigan kung gaano kasaya ang pagsali sa outreach programs at campus ministries ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapatibay ng ugnayan sa Diyos?=Hikayatin ang ibang maglingkod sa Diyos>Maging bahagi ng outreach programs+Makilahok sa campus ministry<Makilahok sa mga retreat at recollection",
"Ang kawalan ng pag-aalala o negatibong saloobin kahit magulo ang mundo ay tumutukoy sa alin sa mga sumusunod na bunga ng pagpapatibay ng ugnayan sa Diyos?=Kapayapaan ng isip at kalooban>Kahulugan at direksyon sa iyong buhay+Katiyakang ang iyong buhay ay may halaga<Mas malalim na ugnayan sa iba",
"Ang pagiging laging maligaya mo na mananatili pa rin kahit maubos ang iyong pera ay tumutukoy sa alin sa mga sumusunod na bunga ng pagpapatibay ng ugnayan sa Diyos?=Kagalakan sa puso>Katiyakang ang iyong buhay ay may halaga+Mas malalim na ugnayan sa iba<Kahulugan at direksyon sa iyong buhay",
"Ang pagkakaroon mo ng mabuting misyon sa buhay na dahilan para bumangon at kumilos ka araw-araw ay tumutukoy sa alin sa mga sumusunod na bunga ng pagpapatibay ng ugnayan sa Diyos?=Kahulugan at direksyon sa iyong buhay>Kapayapaan ng isip at kalooban+Kagalakan sa puso<Mas malalim na ugnayan sa iba",
"Ang pagkakaroon mo ng mas malalim na pagmamahal at koneksiyon sa iyong pamilya at mga kaibigan ay tumutukoy sa alin sa mga sumusunod na bunga ng pagpapatibay ng ugnayan sa Diyos?=Mas magandang ugnayan sa iba>Kahulugan at direksyon sa iyong buhay+Katiyakang ang iyong buhay ay may halaga<Kapayapaan ng isip at kalooban",
"Ang walang pag-aalinlangang pagkilala mo na may silbi ka sa mundo at malaki ang naitutulong mo sa iyong kapwa ay tumutukoy sa alin sa mga sumusunod na bunga ng pagpapatibay ng ugnayan sa Diyos?=Katiyakang ang iyong buhay ay may halaga>Kapayapaan ng isip at kalooban+Mas malalim na ugnayan sa iba<Kagalakan sa puso"

);

?>

</head>

</body

</html>