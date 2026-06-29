<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Totoo - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Totoo";
$_SESSION['tnum']="*61";

$questions=array(

"Ano ang kahulugan ng pagiging totoo?=Pamumuhay nang naaayon sa iyong tunay na pagkatao>Pagpapanggap upang makasabay sa uso+Pagsisinungaling para makaiwas sa problema<Pagkopya ng ugali ng iba",
"Bakit sinasabing matapang na pagpili ang pagiging totoo?=Dahil hindi palaging madaling magpakatotoo>Dahil napakadali lamang magpakatotoo sa lahat ng oras+Dahil mga matatapang lamang ang nakapagpapanggap<Dahil hinahangaan ng lahat ang nagpapakatotoo",
"Ano ang pundasyon ng matatag na pagkatao?=Pagiging totoo sa iyong sarili>Pagkukunwari sa harap ng iba+Pagsunod sa mga uso<Pagkopya sa hinahangaang sikat na tao",
"Anong uri ng tao ang hindi madaling maimpluwensiyahan ng masama?=Ang taong totoo sa kanyang sarili>Ang taong laging nagpapanggap+Ang taong walang paninindigan<Ang taong laging sumusunod sa nakararami",
"Ano ang unang hakbang sa pagiging totoo?=Pagtanggap sa iyong mga katangian at kahinaan>Pagkukumpara ng sarili sa iba+Paglilihim ng iyong mga pagkukulang<Pag-iisip na ikaw ay perpekto",
"Ano ang ibig sabihin ng positibong pagtingin sa sarili?=Pagkilala sa iyong halaga sa kabila ng iyong mga kahinaan>Pag-iisip mong ikaw ay perpekto+Palaging pagkukumpara ng iyong sarili sa iba<Pagtatago ng iyong mga kahinaan",
"Alin sa mga sumusunod ang magagawa mo para malaman mo ang iyong mga katangian?=Pagninilay at paglilista ng iyong mga kahinaan at kakayahan>Pagtutuon lamang ng pansin sa iyong mga kahinaan+Pagyayabang sa iba ng iyong mga kakayahan<Paglilibang kasama ang mga kaibigan",
"Alin sa mga sumusunod ang dapat mong iwasan upang maging totoo ka sa iyong sarili?=Paggaya sa talento ng iba>Pagtanggap sa iyong mga kahinaan+Pagkilala sa iyong mga kakayahan<Pagninilay tungkol sa sarili",
"Sa ating buhay, alin sa mga sumusunod ang sinasabing 'tunay na kompetisyon'?=Pagiging mas mabuti kumpara sa iyong nakaraang bersyon>Pagiging mas mahusay kaysa sa iyong mga kaibigan+Pagkakaroon ng pinakamataas na marka sa klase<Pagiging panalo sa lahat ng bagay",
"Alin sa mga sumusunod ang halimbawa ng positibong pananalita sa sarili kapag nagkamali?=Nagkamali ako, pero matututo ako rito.>Ang bobo ko naman, hindi ko talaga kaya.+Wala akong silbi dahil nagkamali ako.<Suko na ako dahil palagi akong nagkakamali.",
"Ano ang dapat mong gawin kung nais mong gumaling sa isang bagay?=Gumawa ng maliliit na hakbang araw-araw>Umasa lamang na bigla kang gagaling dito+Ihinto lahat ng ibang mga gawain para maituon ang pansin dito<Magkulong lamang sa sariling silid hanggang gumaling dito",
"Ano ang dapat mong isulat sa iyong 'gratitude journal'?=Mga bagay na ipinagpapasalamat mo>Lahat ng iyong mga pagkakamali+Mga bagay na kinaiinggitan mo sa iba<Mga taong hindi mo gusto",
"Bakit nakakatulong sa iyo ang pagsali sa isang 'club' o organisasyon?=Dahil dito mo mararamdaman na katuwang ka at may halaga sa isang layunin>Dahil dito mo maiaangat ang iyong sarili sa iba+Dahil dito ka makakaiwas sa iyong mga problema<Dahil dito ka makakatagpo ng mga taong maaari mong gayahin",
"Alin sa mga sumusunod ang hindi mo dapat sabihin sa harap ng salamin tuwing umaga?=Magkakamali na naman ako.>Handa ako sa araw na ito.+May halaga ako.<Kaya ko ito.",
"Ano ang dapat mong gawin sa mga taong nanlalait sa iyo at nagpapababa ng iyong tiwala sa sarili?=Iwasan sila>Ituring silang malalapit na kaibigan+Gayahin ang kanilang ugali<Sumama pa rin sa kanila",
"Ang paghingi ng tulong ay tanda ng alin sa mga sumusunod?=Lakas, hindi kahinaan>Pag-urong sa hamon+Kawalan ng kakayahan<Pagiging isip-bata",
"Alin sa mga sumusunod ang dapat mong gawin kung ikaw ay laging malungkot?=Kausapin ang iyong mga magulang, guro, o school counselor>Ilihim lamang ang iyong nararamdaman+Magpanggap na masaya sa harap ng lahat<Iwasan ang lahat ng mga tao",
"Alin sa mga sumusunod ang iyong tungkulin bilang isang anak?=Maging bukas sa mga magulang tungkol sa iyong nararamdaman>Itago ang lahat ng mga problema mo sa iyong mga magulang+Huwag makinig sa payo ng iyong mga magulang<Umiwas sa mga magulang para hindi mautusan",
"Alin sa mga sumusunod ang tungkulin ng pamilya sa anak?=Purihin ang kanyang mga maliliit na tagumpay>Pagalitan siya at laitin kapag nagkakamali+Turuan siyang magpalusot sa kanyang mga mgakasalanan<Ihambing siya sa ibang bata",
"Alin sa mga sumusunod ang tungkulin ng pamilya sa anak?=Alalayan siya kapag nabibigo>Kunsintihin ang kanyang mga kasalanan+Turuan siyang magpanggap upang magtagumpay<Pagalitan siya at parusahan agad kapag nakakuha ng mababang grado",
"Alin sa mga sumusunod ang bunga ng pagiging totoo?=Kapayapaan ng isipan dahil walang itinatago>Mababang tiwala sa sarili+Kawalan ng mga tunay na kaibigan<Takot humarap sa mga hamon",
"Ano ang karaniwang nararamdaman ng mga tao sa isang taong hindi nagkukunwari?=Paghanga dahil sa tapang niyang harapin ang katotohanan>Takot dahil baka masama siyang magalit+Galit dahil hindi nila kaya ang kaya niya<Awa dahil wala siyang kakayahang magpanggap",
"Alin sa mga sumusunod ang hindi halimbawa ng pagiging totoo?=Paggaya sa isang sikat na artista para bumilib ang mga kaibigan>Pagtanggap sa iyong mga kahinaan+Paninindigan sa iyong paniniwala kahit mag-isa<Pagsasabi ng totoo tungkol sa iyong nararamdaman",
"Alin sa mga sumusunod ang dapat mong gawin tungkol sa iyong mga kahinaan?=Tanggapin ang mga ito at magsikap mapabuti ang sarili>Ikahiya at ilihim ang mga ito+Magpanggap na magaling ka sa mga bagay na ito<Kumbinsihin ang sarili na perpekto ka",
"Alin sa mga sumusunod ang wastong pananaw ng isang taong totoo sa kanyang sarili sa pagharap niya sa isang pagsubok?=Alam niyang hindi siya perpekto pero kaya niyang bumangon muli>Hindi niya dapat harapin ang pagsubok dahil mabibigo siya+Kailangan niyang magpanggap sa huli na nagtagumpay siya sa pagsubok<Dapat siyang sumuko agad kapag nahirapan sa pagsubok",

);

?>

</head>

</body

</html>