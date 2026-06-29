<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masunurin - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masunurin";
$_SESSION['tnum']="*49";

$questions=array(

"Ang pagliligpit ng pinagkainan, pagwawalis, at pag-aayos ng silid ay mga halimbawa ng pagiging masunurin sa alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya?=Pagtulong sa mga gawain sa bahay>Pag-alalay sa mga nakatatanda+Pagmamahal sa kapatid<Pagiging magalang sa pagsasalita",
"Ang pag-aabot ng mga gamit na kailangan ng ating lolo at lola ay halimbawa ng pagiging masunurin sa alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya?=Pag-alalay sa mga nakatatanda>Pagtulong sa mga gawain sa bahay+Pagmamahal sa kapatid<Pagiging magalang sa pagsasalita",
"Ang pagtulong sa mga gawain ng iyong ate o kuya ay halimbawa ng pagiging masunurin sa alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya?=Pagmamahal sa kapatid>Pagpapatawad at pag-unawa+Pag-alalay sa mga nakatatanda<Pagiging magalang sa pagsasalita",
"Alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya ang nagpapakita ng ating paggalang at tiwala sa karunungan at karanasan ng ating ama at ina?=Pagsunod sa magulang>Pagpapatawad at pag-unawa+Pagmamahal sa kapatid<Pag-aalaga sa kapamilya kapag may sakit",
"Ang paggamit ng mga salitang \"po\" at \"opo\" ay halimbawa ng pagiging masunurin sa alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya?=Pagiging magalang sa pagsasalita>Pagpapatawad at pag-unawa+Pagtulong sa mga gawain sa bahay<Pagmamahal sa kapatid",
"Alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya ang nagpapakita ng ating pagnanais na mapanatili ang kapayapaan at pagkakaisa sa tahanan kahit na may pagkakamali sa atin ang isang kapamilya?=Pagpapatawad at pag-unawa>Pagsunod sa magulang+Pag-alalay sa mga nakatatanda<Pag-aalaga sa kapamilya kapag may sakit",
"Ang pagpapainom ng gamot at pagpapakain sa isang kapatid na nilalagnat ay halimbawa ng pagiging masunurin sa alin sa mga sumusunod na mapagkalingang pakikitungo sa pamilya?=Pag-aalaga sa kapamilya kapag may sakit>Pagpapatawad at pag-unawa+Pag-alalay sa mga nakatatanda<Pagiging magalang sa pagsasalita",
"Alin sa mga sumusunod ang hindi saklaw ng kahulugan ng pagiging masunurin sa mapagkalingang pakikitungo sa pamilya?=Pagkakaroon ng kakaibang talento>Pagsunod sa mga utos+Pagpapakita ng malasakit at pagmamahal sa bawat isa<Pag-aalaga sa kapamilyang may sakit",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa mga magulang?=Pakikinig at pagsunod sa kanilang payo>Pagsagot kapag pinapaalalahanan+Pagsisinungaling kapag may kasalanan<Pagkukulong sa sariling silid",
"Alin sa mga sumusunod ang HINDI isang halimbawa ng pagtulong sa mga gawain sa bahay?=Pakikinig sa musika>Paghuhugas ng mga pinggan+Pagdidilig ng mga halaman<Pagwawalis ng sahig",
"Alin sa mga sumusunod ang ipinapakita ng pag-alalay sa mga nakatatanda?=Respeto at malasakit>Talino sa pag-aaral+Pagiging masinop<Pagkamadasalin",
"Paano mo maipapakita ang pagmamahal sa mga nakababatang kapatid?=Sa pamamagitan ng pag-alalay sa kanilang mga gawain>Sa pamamagitan ng panunukso sa kanila+Sa pamamagitan ng pag-uutos sa kanila ng mga gawaing hindi nila kaya<Sa pamamagitan ng pag-iwas sa kanila",
"Ano ang dapat mong gawin kung may sakit ang isang miyembro ng inyong pamilya?=Alagaan siya sa pamamagitan ng pag-aabot ng gamot o pagkain>Iwasan siya upang hindi mahawa+Pilitin siyang makipaglaro sa iyo sa labas<Mag-ingay sa tabi niya",
"Ano ang dapat mong gawin kung nagkamali ang isa mong kapatid?=Pagsabihan siya nang maayos at tumulong maitama ang pagkakamali>Pagalitan siya sa harap ng lahat+Tawanan siya at tuksuhin<Huwag na lang siyang pansinin",
"Ano ang dapat mong gawin kapag may sinabi ang iyong mga magulang na hindi mo nauunawaan?=Magtanong nang maayos upang mas maliwanagan>Magpanggap na naiintindihan ang kanilang sinabi+Magpaalam at magtago sa silid<Mainis sa sarili at magmukmok sa isang tabi",
"Ano ang dapat mong gawin kung hindi ka sang-ayon sa sinasabi ng iyong magulang?=Isaad ang iyong pananaw nang mahinahon at magalang na sabihin ang dahilan>Tumahimik na lang at magkimkim ng sama ng loob+Makipagtalo para ipaglaban ang iyong pananaw<Magalit at magtaas ng boses sa kanila",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa pamilya?=Pagtulong sa mga gawaing bahay>Pananatili sa bahay ng isang kaibigan+Paglalaro sa kompyuter buong araw<Pagkukulong sa sariling silid",
"Ano ang dapat gawin kung may hindi pagkakaintindihan sa pamilya?=Mag-usap nang maayos upang malutas ang problema>Magtampo at huwag makipag-usap kaninuman+Makipagtalo sa mga may kasalungat na pananaw<Huwag na lang pansinin ang problema",
"Ano ang dapat mong gawin kung may utos ang iyong magulang na mahirap gawin?=Subukan itong gawin at humingi ng tulong kung kailangan>Tumanggi at sabihin agad na hindi mo ito kaya+Magkunwaring sumusunod ka hanggang makalimutan na ito<Sundin ang utos nang padabog",
"Alin sa mga sumusunod ang nagpapakita ng pagiging masunurin sa mga aral ng pananampalataya sa loob ng tahanan?=Pagtulong at paggalang sa bawat isa>Pakikipagtalo sa mga kapatid+Pagsunod sa mga magulang nang padabog<Pag-iwas sa mga responsibilidad",
"Bakit mahalaga ang paghingi ng paumanhin kung nagkamali ka?=Para maipakita ang kababaang-loob at mapanatili ang kapayapaan sa pamilya>Para mailihim ang problemang dulot ng iyong pagkakamali+Para hangaan ka ng mga nasa paligid<Para hindi ka mapagalitan",
"Alin sa mga sumusunod ang nagpapakita ng pagiging masunurin sa pagpapanatili ng kalinisan sa bahay?=Pagsunod sa utos na magwalis at magpunas ng alikabok>Pagsunod sa utos na pakainin ang mga alaga+Pagsunod sa utos na gawin ang takdang-aralin<Pagsunod sa utos na magdilig ng halaman",
"Alin sa mga sumusunod ang HINDI nagpapakita ng malasakit sa iyong mga magulang kapag sila ay pagod?=Paglalaro sa labas ng bahay>Pagtulong sa mga gawain sa bahay+Pag-aabot ng mga bagay na kailangan nila<Pagsasabi sa kanilang magpahinga muna",
"Ano ang dapat mong gawin kapag pinayuhan ka ng magulang mo tungkol sa tamang asal?=Pakinggan itong mabuti at sundin palagi>Pakinggan ito pero huwag sundin+Magpakita ng pagtatampo dahil pinagsasabihan ka<Sabihing hindi mo kayang sumunod",
"Paano mo maipapakita ang paggalang sa mga opinyon ng mga kapamilya?=Pakinggan ang mga ito at pahalagahan>Balewalain ang mga ito+Ipilit sa kanila ang iyong mga opinyon<Salungatin ang lahat ng kanilang sinasabi",
"Bakit kailangang sumunod sa mga alituntunin ng pamayanan?=Upang mapanatili ang kaligtasan, kaayusan, at kapayapaan>Upang maiangat ang sarili sa iba+Upang makahingi ng pabor sa mga pinuno ng komunidad<Upang maisulong ang pansariling interes",
"Alin sa mga sumusunod ang halimbawa ng pagsunod sa alituntunin ng pamayanan?=Pagtatapon ng basura sa tamang lugar>Pag-iwas sa mga aktibidad ng pamayanan+Paglabag sa mga batas-trapiko<Paggawa ng ingay sa oras ng katahimikan",
"Bakit mahalaga ang pagpapakita ng mabuting halimbawa sa pamayanan?=Upang mahikayat ang ibang taong gumawa ng mabuti>Upang mag-udyok ng paglabag sa mga alituntunin+Upang mapalala ang mga di-pagkakaunawaan<Upang makuha ang sariling kagustuhan",
"Alin sa mga sumusunod ang inaasahang epekto ng pagsunod ng lahat sa mga alituntunin ng pamayanan?=Kapayapaan at pagkakaisa sa pamayanan>Pagdami ng mga problema sa komunidad+Pagbubuhol ng trapiko<Kawalan ng respeto ng bawat isa sa kapwa",
"Alin sa mga sumusunod ang halimbawa ng pakikilahok sa mga gawaing pampamayanan?=Pagsali sa tree planting upang makatulong sa kalikasan>Pamimili ng mga pansariling pangangailangan sa palengke+Pamamasyal kasama ang mga kaibigan<Pagtitinda para kumita ng pera",
"Alin sa mga sumusunod ang ipinapakita ng pagsunod sa oras ng katahimikan?=Respeto sa pagpapahinga ng iba>Panggagambala ng kapwa+Kakulangan ng pakikipagkapwa-tao<Pagiging pagod at inaantok",

);

?>

</head>

</bod

</html>