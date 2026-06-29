<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pamumuhay nang Payak - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pamumuhay nang Payak";
$_SESSION['tnum']="*85";

$questions=array(

"Alin sa mga sumusunod ang hindi maiuugnay sa payak na pamumuhay?=Pag-iwas sa trabaho>Pagtitipid+Pagtuon sa mahahalagang bagay<Pag-iwas sa mga luho",
"Ang pamumuhay nang payak ay tumutulong sa isang tao upang maging alin sa mga sumusunod?=Maingat sa salapi at likas na yaman>Maluho sa lahat ng bagay+Nakatuon sa pagkita ng pera<Malakas sa pagkonsumo ng mga produkto",
"Sa payak na pamumuhay, alin sa mga sumusunod ang mas binibigyang halaga?=Mga tunay na pangangailangan>Mga mamahaling gamit+Mga makabagong gadyet<Pangarap maging mayaman",
"Alin sa mga sumusunod ang hindi bahagi ng payak na pamumuhay?=Pagbili ng mamahaling gamit tuwing may pera>Pagkain nang malusog ngunit hindi labis+Pagtitipid sa kuryente at tubig<Pag-iwas sa mga produktong inangkat sa kanluran",
"Ang matalinong paggamit ng papel para mabawasan ang pagputol ng mga punong gagamitin sa pagmamanupaktura nito ay halimbawa ng alin sa mga sumusunod na paraan ng payak na pamumuhay?=Pagtitipid ng likas na yaman>Pagbabawas ng basura+Pagkain ng sapat at wastong pagkain<Pagtangkilik sa mga lokal na produkto",
"Alin sa mga sumusunod na paraan ng payak na pamumuhay ang tuwirang maisasagawa sa pamamagitan ng prinsipyong 'reduce, reuse, and recycle'?=Pagbabawas ng basura>Pagtangkilik sa mga lokal na produkto+Pagkain ng sapat at wastong pagkain<Pag-iwas sa mga luho",
"Alin sa mga sumusunod na paraan ng payak na pamumuhay ang nakasentro sa maingat na pagpaplano ng mga lulutuin?=Pagkain ng sapat at wastong pagkain>Pagtangkilik sa mga lokal na produkto+Pagbabawas ng basura<Pagtitipid ng likas na yaman",
"Alin sa mga sumusunod na paraan ng payak na pamumuhay ang tumutukoy sa pagsuporta sa mga negosyong nakabase sa ating bansa?=Pagtangkilik sa mga lokal na produkto>Pagkain ng sapat at wastong pagkain+Pagbabawas ng basura<Pagtitipid ng likas na yaman",
"Alin sa mga sumusunod na benepisyo ng payak na pamumuhay ang may kaugnayan sa pagpapanatili ng wastong timbang sa pamamagitan ng pagkonsumo ng sapat at masustansiyang pagkain?=Magandang kalusugan>Matibay na ugnayan sa ibang tao+Masaganang kalikasan<Mapayapang pamumuhay",
"Alin sa mga sumusunod na benepisyo ng payak na pamumuhay ang nag-uugat sa paglalagay ng higit na halaga sa pakikipagkapwa kaysa sa pag-aari?=Matibay na ugnayan sa ibang tao>Magandang kalusugan+Masaganang kalikasan<Mapayapang pamumuhay",
"Alin sa mga sumusunod na benepisyo ng payak na pamumuhay ang may kaugnayan sa pagkakaroon ng malusog na ekosistema dahil sa kawalan ng basura sa kapaligiran?=Masaganang kalikasan>Maayos na sitwasyong pinansyal+Matibay na ugnayan sa ibang tao<Mapayapang pamumuhay",
"Alin sa mga sumusunod na benepisyo ng payak na pamumuhay ang may kaugnayan sa pagkakaroon ng kapanatagan ng loob at tunay na kasiyahan bunga ng hindi paghahabol sa mga luho?=Mapayapang pamumuhay>Magandang kalusugan+Matibay na ugnayan sa ibang tao<Masaganang kalikasan",
"Alin sa mga sumusunod na benepisyo ng payak na pamumuhay ang may kaugnayan sa pagiging masinop at matipid na nagdudulot ng mas maraming oportunidad upang mag-impok ng pera?=Maayos na sitwasyong pinansyal>Magandang kalusugan+Matibay na ugnayan sa ibang tao<Masaganang kalikasan",
"Alin sa mga sumusunod na benepisyo ng payak na pamumuhay ang tumutukoy sa ating pagtatanto na ang ating importansya ay hindi nakasalalay sa dami ng ating kayamanan kundi sa ating kasiyahan at kapanatagan ng loob?=Mataas na pagpapahalaga sa sarili>Maayos na sitwasyong pinansyal+Magandang kalusugan<Masaganang kalikasan",
"Ang pagtitipid ng likas na yaman ay maiuugnay sa alin sa mga sumusunod?=Pagkonsumo sa responsableng paraan>Pagsasantabi sa kalusugan ng mga ekosistema+Labis na paggamit ng tubig at kuryente<Pagpapalawak ng mga minahan",
"Alin sa mga sumusunod ang hindi tamang paraan ng pagbabawas ng basura?=Pagsusunog ng basura sa bakuran>Pagreresaykel ng mga bote at papel+Paggamit ng telang bag sa halip ng plastik na supot<Pag-iwas sa pagbili ng gadyet habang mayroon pang nagagamit",
"Alin sa mga sumusunod ang hindi isa sa mga dahilan kung bakit mas mainam bumili ng mga lokal na produkto kaysa sa mga produktong inangkat mula sa ibang bansa?=Para mapaboran ang mga negosyante sa ibang bansa>Para makatulong sa ekonomiya ng ating bansa+Dahil mas maliit ang epekto ng transportasyon ng mga ito sa kapaligiran<Dahil mas matipid ang transportasyon ng mga ito",
"Ang simpleng pamumuhay ay nakatutulong sa ugnayan ng pamilya dahil sa alin sa mga sumusunod?=Mas napapahalagahan nito ang paggugol ng oras sa pamilya>Mas napapahalagahan nito ang pagbili ng mga bagong muwebles para sa bahay+Nagbubunga ito ng pagkakanya-kanya ng magkakapamilya dahil sa pagkakaroon nila ng tig-iisang gadyet<Nagbibigay ito ng mas maraming pinagtatalunan sa tahanan",
"Alin sa mga sumusunod ang hindi pinahahalagahan ng isang taong namumuhay nang payak?=Katanyagan>Pananampalataya+Kalusugan<Pamilya",
"Ang taong kuntento sa payak na pamumuhay ay mayroong alin sa mga sumusunod?=Kapanatagan ng loob>Matinding inggit+Pangarap na sumikat<Pagnanasa sa mga materyal na bagay",
"Alin sa mga sumusunod ang sukatan ng yaman para sa isang taong masaya sa simpleng pamumuhay?=Kapanatagan ng loob>Dami ng alahas+Sukat ng bahay<Deposito sa bangko",
"Ang minimalistang pamumuhay ay tungkol sa alin sa mga sumusunod?=Hindi pagkakaroon ng mga bagay na hindi kailangan>Pagpaparami ng mga gamit+Pagdidiyeta para magbawas ng timbang<Pagpapalaki ng kita",
"Nakatuon ang pansin ng taong hindi materyalistiko sa mga bagay na mahalaga sa buhay kaya mas matimbang sa kanya ang alin sa mga sumusunod?=Pakikipagkapwa>Mga mamahaling gamit+Marangyang tahanan<Kasikatan",
"Ang pagpapahalaga sa mga kasalukuyang biyaya ay nagpapakita ng alin sa mga sumusunod?=Pagiging mapagpasalamat>Kakulangan sa ambisyon+Pagkainggit sa iba<Pagbabalewala sa kinabukasan",
"Alin sa mga sumusunod ang hindi nakakatulong sa pangangalaga ng kalikasan?=Pagtangkilik sa mga produktong plastik>Responsableng pagkonsumo ng mga produkto+Paggamit ng mga makakalikasang produkto<Pagtatanim ng mga puno",

);

?>

</head>

</bod

</html>