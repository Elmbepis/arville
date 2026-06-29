<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Karunungan sa Pagili ng Pinuno - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Karunungan sa Pagili ng Pinuno";
$_SESSION['tnum']="*7g";

$questions=array(

"Ano ang dapat gawin ng mga kabataan sa pagpili ng isang lider?=Timbangin at suriin ang mga kandidato>Bumoto nang hindi nag-iisip+Gayahin ang boto ng karamihan<Iboto lamang ang kaibigan o kakilala",
"Ano ang mahalagang gampanin ng pamilya sa pagpili ng lider?=Turuan ang mga bata ng tamang pagboto>Hayaan ang mga batang magdesisyon nang mag-isa+Pigilan ang mga batang bumoto<Sabihin sa mga batang gayahin na lang ang boto ng mga kaibigan",
"Alin sa mga sumusunod ang isa sa mga pangunahing halagang dapat na taglay ng isang pinuno?=Katapatan>Pagiging makasarili+Pagiging pabaya<Pagiging tamad",
"Alin sa mga sumusunod ang isa sa mga pangunahing katangian ng mabuting pinuno?=Palaging tapat sa salita at gawa>Gumagawa ng mga desisyong hindi pinag-isipan+Madaling sumuko sa mga problema<Hindi marunong makinig sa iba",
"Ano ang kahulugan ng pagiging makatarungan?=Pantay-pantay ang pagtingin sa lahat>Nakapanig sa mayayaman+Binabalewala ang karamihan<Mababang pagtingin sa mahihirap",
"Bakit mahalaga ang pagkakaroon ng integridad ng isang pinuno?=Upang makuha ang tiwala ng iba>Upang maiangat ang sarili sa iba+Upang makuha ang kanyang mga personal na kagustuhan<Upang makakuha ng papuri at paghanga",
"Ano ang dapat gawin ng pamilya upang magabayan ang mga bata sa tamang pagpili ng pinuno?=Pag-usapan ang mga kandidato bilang isang pamilya>Hayaan ang mga batang gumawa ng sariling desisyon+Isantabi ang mga impormasyon tungkol sa mga kandidato<Himukin ang mga batang gumaya sa boto ng iba",
"Alin sa mga sumusunod ang tanda na ang isang lider ay may malasakit sa kapwa?=Inuuna ang kapakanan ng iba kaysa sarili>Iniisip lamang ang pansariling interes+Hindi nagbibigay ng tulong sa nangangailangan<Nagpapakita ng pagiging mapagmataas",
"Alin sa mga sumusunod ang dapat tandaan sa pagpili ng lider?=Timbangin ang layunin at karakter ng bawat kandidato>Sundin ang popular na opinyon+Piliin ang pinakamayamang kandidato<Gayahin ang boto ng pinakamalapit na kaibigan",
"Ano ang dapat mong gawin sa panahon ng halalan?=Bumoto nang maingat at may kaalaman>Madaliin ang pagboto para makauwi agad+Sundin ang sinasabi ng mga karamihan<Iwasang bumoto para hindi maabala",
"Alin sa mga sumusunod ang tanda ng pagiging mapagpakumbaba ng isang lider?=Pagtanggap sa kanyang mga pagkakamali>Pagmamalaki ng kanyang posisyon+Hindi pakikinig sa opinyon ng iba<Mataas na pagtingin sa sarili",
"Ano ang dapat mong gawin kapag mayroong diskusyon tungkol sa mga kandidato?=Makinig at magalang na mag-ambag sa diskusyon>Magbigay ng maling impormasyon+Huwag pansinin ang diskusyon<Magbigay ng kritisismo nang walang batayan",
"Alin sa mga sumusunod ang isa sa mga epekto ng tamang pagpili ng lider?=Pagkakaroon ng maayos at maunlad na komunidad>Pagkakaroon ng mga kaguluhan+Pagtigil ng mahahalagang programang pangkomunidad<Kawalan ng pagkakaisa",
"Alin sa mga sumusunod ang pinakadapat isaalang-alang sa pagpili ng isang kandidato?=Ang kanyang mga nagawa na para sa bayan>Ang kanyang kayamanan+Ang kanyang popularidad<Ang kanyang mga pangako",
"Ano ang kahulugan ng pagiging responsable ng isang lider?=Ginagampanan ang lahat ng mga tungkulin>Umiiwas sa mga obligasyon+Hindi hinaharap ang mga problema<Isinisisi sa iba ang mga pagkakamali",
"Alin sa mga sumusunod ang tanda ng isang lider na may bisyon?=Nagbibigay ng malinaw na direksyon sa grupo>Gumagawa ng mga plano nang walang layunin+Inuuna ang pansariling interes<Nagkukulang sa pagbibigay ng gabay",
"Ano ang dapat mong gawin kung ang inyong lider ay hindi gumagawa ng tama?=Kausapin siya nang maayos upang maitama ang mali>Tawanan ang kanyang pagkakamali+Iwasan siya at huwag pakialaman<Magalit sa kanya nang walang paliwanag",
"Ano ang dapat gawin ng mga kabataan upang maging responsable sa pagpili ng lider?=Magbasa at magsaliksik tungkol sa mga kandidato>Umasa lamang sa sinasabi ng iba+Umiwas makilahok sa halalan<Bumoto ng kahit na sino na lamang",
"Ano ang nagagawa ng isang mabuting lider para sa bayan?=Nagpapalaganap ng pag-asa at pagkakaisa>Nagdudulot ng mga di-pagkakaunawaan+Nagiging sagabal sa pag-unlad ng komunidad<Nagsusulong ng pansariling interes",
"Ano ang pangunahing layunin ng halalan?=Pumili ng mga lider na maglilingkod sa bayan nang tapat>Makakuha ng pabuya mula sa mga mananalo+Mailuklok sa puwesto ang mga kakilala<Magkaroon ng mga kaibigang makapangyarihan",
"Alin sa mga sumusunod ang isang magandang katangiang dapat taglayin ng isang lider?=May malasakit sa kapwa>Mahilig magpakitang-gilas+Hindi marunong makinig sa iba<Walang pakialam sa mga nangangailangan",
"Ano ang ibig sabihin ng kritikal na pag-iisip sa halalan?=Malalim na pagsusuri ng mga kandidato bago bumoto>Paggawa ng desisyon batay sa emosyon lamang+Pagpapadala sa sinasabi ng iba<Pagpili ng iboboto nang walang batayan",
"Alin sa mga sumusunod ang katangiang hindi dapat taglay ng isang lider?=Mapagmataas>Tapat sa tungkulin+May malasakit sa tao<Makatarungan",
"Bakit mahalaga ang masusing pag-aaral ng plataporma ng bawat kandidato?=Upang makita kung tugma ito sa pangangailangan ng bayan>Upang magpakita ng pagdududa sa kanyang layunin+Upang maipakita sa iba ang iyong talino<Upang makita kung akma ito sa pansariling interes",
"Alin sa mga sumusunod ang tanda ng pagiging matatag ng isang lider?=Hindi sumusuko sa harap ng mga hamon>Pabagubago ang mga desisyon+Madaling malinlang ng mga tao sa paligid<Umiiwas sa kanyang mga responsibilidad",

);

?>

</head>

</bod

</html>