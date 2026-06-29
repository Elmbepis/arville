<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matatag - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matatag";
$_SESSION['tnum']="*72";

$questions=array(

"Ano ang kahulugan ng pagiging matatag?=Pagkakaroon ng matibay na paninindigan at karakter>Pagiging mapagmalasakit sa kapwa+Pagiging maingat sa pagpapasya<Pagiging mapagbigay sa kapwa",
"Saan nagmumula ang pagiging matatag?=Sa pagkakaroon ng matibay na paniniwala>Sa pagkakaroon ng busilak na puso+Sa pagkakaroon ng maraming kaalaman<Sa pagkakaroon ng maraming kakilala",
"Bakit mahalaga ang pagiging matatag sa harap ng mga hamon at pagsubok?=Dahil ito ang nagpapanatili sa isang tao sa kanyang pinaniniwalaang landas>Dahil ito ang nagbubuyo sa isang taong sumubok ng ibang landas+Dahil ito ang nagpapalakas ng pakikipagkapwa ng isang tao<Dahil ito ang nagbibigay sa isang tao ng mga paniniwala",
"Paano nakakatulong ang pagiging matatag para maabot ng isang tao ang kanyang mga layunin?=Nagbibigay ito ng lakas ng loob para patuloy na magsumikap ang isang tao.>Pinalalakas nito ang kawalan ng interes ng isang tao sa kanyang mga layunin.+Binibigyan nito ng tibay ng loob ang isang tao upang baguhin ang kanyang mga layunin.<Nagiging daan ito para kalimutan ng isang tao ang kanyang mga layunin.",
"Ano ang mahalagang papel ng mga pagpapahalaga at birtud sa pagiging matatag?=Pagiging gabay sa tamang pagpapasya at pagkilos>Pagiging dahilan ng kawalan ng katarungan sa pagpapasya at pagkilos+Pagbibigay ng magkakasalungat na landas ng pagpapasya at pagkilos<Pagdudulot ng kalituhan sa pagpapasya at pagkilos",
"Ano ang kahulugan ng pagpapahalaga?=Prinsipyo o pamantayang nagsisilbing importanteng gabay sa ating buhay>Mabuting gawaing nagmumula sa isang birtud+Prinsipyo o pamantayang hindi ginagamit sa pagpapasya o pagkilos<Pasya o pagkilos na makabubuti para sa lahat",
"Ano ang kahulugan ng birtud o 'virtue'?=Magandang ugali o mabuting gawaing nakabatay sa mga pinaniniwalaan>Magandang ugali o mabuting gawaing walang kaugnayan sa mga pagpapahalaga+Prinsipyo o pamantayang nagsisilbing importanteng gabay sa ating buhay<Prinsipyo o pamantayang may mataas na antas ng moralidad",
"Bakit mahalaga ang pagsandig sa katotohanan sa pagiging matatag?=Dahil nagpapalakas ito ng loob sa harap ng mga pagsubok>Dahil nagsisilbi itong balakid sa pagpapasya sa harap ng mga pagsubok+Dahil nagdudulot ito ng pag-aatubili sa harap ng mga pagsubok<Dahil nagbibigay ito ng maraming opsyon sa harap ng mga pagsubok",
"Ano ang epekto ng pagsandig sa katotohanan sa pagiging matatag ng isang tao?=Natatanggap niya ang tunay na sitwasyon kahit mahirap itong tanggapin>Naisasantabi niya ang tunay na sitwasyon kapag mahirap itong tanggapin+Naikakaila niya ang tunay na sitwasyon kung mahirap itong tanggapin<Naikukubli niya ang tunay na sitwasyon tuwing mahirap itong tanggapin",
"Paano ipinapakita ng isang matatag na tao ang pagpapahalaga sa pakikipagkapwa?=Sa pamamagitan ng pagiging mapagbigay at makatarungan>Sa pamamagitan ng pagiging matagumpay sa kanyang mga layunin+Sa pamamagitan ng pagiging masipag sa kanyang mga gawain<Sa pamamagitan ng paglinang ng kanyang mga kakayahan",
"Paano ipinapakita ng isang matatag na tao ang pagpapahalagang pagkamatapat?=Sa pamamagitan ng pagsasabi ng totoo sa lahat ng pagkakataon>Sa pamamagitan ng pagiging pursigido sa pag-abot ng kanyang ambisyon+Sa pamamagitan ng pagbibigay ng tulong na pinansyal sa mahihirap<Sa pamamagitan ng pagtuklas ng mga bagong kaalaman",
"Paano ipinapakita ng isang matatag na tao ang pagpapahalagang pagkamapagmalasakit?=Sa pamamagitan ng pagtulong sa mga nangangailangan>Sa pamamagitan ng pagiging pursigido sa pag-abot ng kanyang ambisyon+Sa pamamagitan ng paglinang ng kanyang mga kakayahan<Sa pamamagitan ng hindi pagsisinungaling",
"Paano ipinapakita ng isang matatag na tao ang pagpapahalagang pagkamatipid?=Sa pamamagitan ng wastong paggamit ng tubig at enerhiya>Sa pamamagitan ng wastong pagtugon sa mga kaugalian ng kapwa+Sa pamamagitan ng pagpapaunlad ng sarili<Sa pamamagitan ng paglikha ng mga bagong produkto o serbisyo",
"Alin sa mga sumusunod ang paglalapat ng pagpapahalagang pagkamapanagutan sa pagkilos?=Pagtupad sa lahat ng mga tungkulin>Pagiging masinop sa mga ari-arian+Pagsasabi ng totoo sa lahat ng oras<Pagiging mapagbigay sa kapwa",
"Alin sa mga sumusunod ang paglalapat ng pagpapahalagang pagkamatiyaga sa pagkilos?=Patuloy na pagsusumikap hanggang maisagawa ang isang layunin>Pagiging malinis sa kapaligiran+Pagbibigay ng tamang impormasyon sa kausap<Pagpapakita ng empatiya sa kapwa",
"Alin sa mga sumusunod ang paglalapat ng pagpapahalagang pagkamapagmahal sa pagkilos?=Pag-aalaga sa isang kapamilyang maysakit>Pagiging maalaga sa sariling kalusugan+Pagsasabi ng totoo sa lahat ng oras<Pagiging masipag sa pagtatrabaho",
"Alin sa mga sumusunod ang paglalapat ng sa pagpapahalagang pagkamapagkumbaba sa pagkilos?=Kusang pag-amin sa nagawang pagkakasala>Pagtatanggol ng mga naaapi+Pagsisinop ng mga ari-arian<Pagiging masipag sa pagtatrabaho",
"Alin sa mga sumusunod ang ginagawa ng isang matatag na tao upang manatili sa tamang landas sa harap ng mga pagsubok?=Pagpapakita ng tibay ng loob at disiplina>Pagpapakita ng malawak na kaalaman+Pagpapakita ng pagkamahabagin sa kapwa<Pagpapakita ng sipag at tiyaga",
"Alin sa mga sumusunod ang inaasahang mangyayari sa isang taong walang matibay na paniniwala o prinsipyo?=Madaling mapapabagsak ng mga hamon at pagsubok>Palaging magtatagumpay sa kanyang mga layunin+Mabilis makatutupad sa lahat ng kanyang mga tungkulin<Tiyak na makakatawid sa lahat ng pagsubok",
"Alin sa mga sumusunod ang maiuugnay sa isang taong may matatag na karakter?=Hindi madaling maligaw ng landas>Walang prinsipyo sa buhay+Pabagu-bago ang pinahahalagahan<Walang isang salita",
"Alin sa mga sumusunod ang maiuugnay sa isang taong matatag?=Hindi pabagu-bago ang isip o pasya>Walang gabay sa pagpapasya at pagkilos+Paiba-iba ang pamantayan ng moralidad<Hindi nakapagpapasya nang naaayon sa kabutihan",
"Alin sa mga sumusunod ang ipinapakita ng isang taong gumagamit ng birtud ng respeto sa kanyang mga aksyon?=Paggalang sa opinyon ng iba>Pagsuway sa mga alituntunin+Pagpapalaganap ng mga balitang walang katotohanan<Pagwawalang-bahala sa iba",
"Paano mo maipapakita ang birtud ng katarungan sa pakikisalamuha sa ibang tao?=Sa pamamagitan ng pantay na pagtrato sa lahat ng tao>Sa pamamagitan ng pag-aangat sa sarili+Sa pamamagitan ng pag-iwas sa pakikisalamuha<Sa pamamagitan ng pagbibigay ng espesyal na pabor sa mga kakilala",
"Alin sa mga sumusunod ang benepisyong hatid ng birtud ng pagiging mapagbigay sa isang komunidad?=Pagtanggap ng tulong ng mga nangangailangan>Pagiging malinis ng kapaligiran+Wastong paggamit ng tubig at enerhiya<Pagiging magalang ng mga mamamayan",
"Alin sa mga sumusunod ang benepisyong hatid ng birtud ng kabutihan sa pagpapasya?=Positibong epekto ng pasya sa karamihan>Pagyaman ng nagpasya+Pagiging makapangyarihan ng nagpasya<Pamemerhuwisyo ng pasya sa komunidad",

);
?>

</head>

</bod

</html>