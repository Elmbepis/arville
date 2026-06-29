<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Totoo - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Totoo";
$_SESSION['tnum']="*11";

$questions=array(

"Ano ang dapat mong gawin kung gusto mong magkaroon ng kaibigan?=Maging mabait sa mga kapwa bata>Umiwas sa mga kapwa bata+Makipag-away sa mga kapwa bata<Maging mayabang sa mga kapwa bata",
"Paano dapat makipag-usap sa isang kaibigan?=Gumamit ng magalang na pananalita>Huwag makinig sa kanyang sinasabi+Magsalita nang pasigaw<Ipakita ang pagkainis",
"Alin sa mga ito ang HINDI isa sa mga magandang naidudulot ng pagkakaroon ng kaibigan?=Para may kasama ka sa pang-aapi ng ibang bata>Para may kasama ka sa paglalaro+Para may tutulong sa iyo<Para mayroon kang makakakuwentuhan",
"Alin sa mga ito ang tamang gawin kung may pagkakaiba kayo ng iyong kaibigan?=Tanggapin ang aming pagkakaiba>Layuan siya+Awayin siya<Maging malungkot",
"Paano ka magiging totoo sa iyong kaibigan?=Magsabi palagi ng katotohanan sa kanya>Itago ang iyong tunay na pagkatao+Magsinungaling sa kanya<Lokohin siya",
"Paano ka magiging totoo sa iyong kaibigan?=Magsabi ng iyong tunay na damdamin>Itago ang iyong tunay na nararamdaman+Purihin ang mga masama niyang gawain<Linlangin siya",
"Ano ang dapat mong gawin kung hindi mo alam ang pangalan ng iyong bagong kakilala?=Tanungin ang kanyang pangalan nang magalang>Tawagin siya ng ibang pangalan+Iwasan siya<Huwag gumamit ng pangalan kapag kausap siya",
"Ano ang dapat mong gawin kung may nagawang mali ang iyong kaibigan?=Tulungan siyang maitama ang kanyang mali>Pagalitan siya+Pagtawanan siya<Ikalat ang kanyang pagkakamali sa ibang bata",
"Paano mo tatanggapin ang pagkakaiba ninyo ng iyong kaibigan?=Alamin ang aming kaibahan at ipagpatuloy ang aming pagkakaibigan>Ipakitang mas magaling ako sa kanya+Iwasan siya at layuan<Alamin ang aming kaibahan at ihinto ang aming pagkakaibigan",
"Ano ang dapat mong sabihin kapag nagpapakilala ka sa isang bagong kaibigan?=Ako pala si [iyong pangalan].>Hindi mo ba ako kilala?+Bakit hindi mo ako kilala?<Ayokong sabihin ang pangalan ko.",
"Paano mo maipakikita ang pagiging mabuting kaibigan?=Pagtulong sa kaibigan>Pagdadamot sa kaibigan+Pagsasabi ng hindi totoo sa kaibigan<Hindi pagpansin sa kaibigan",
"Alin sa mga ito ang nagpapakita ng paggalang sa iyong kaibigan?=Wastong pagtawag ng kanyang pangalan>Pagsigaw sa kanya+Panunukso sa kanya<Pagtatawa sa kanyang kamalian",
"Alin sa mga ito ang dapat mong gawin kung nais mong makipaglaro sa ibang bata?=Magpakilala at magtanong nang magalang kung maaaring sumali>Sumingit na lang basta sa paglalaro nila+Umupo sa isang sulok at panoorin sila<Awayin sila para isali ako",
"Bakit mahalaga ang pakikinig nang mabuti sa iyong kaibigan?=Para maintindihan ang kanyang sinasabi at nararamdaman>Para makahanap ng mali sa sinasabi niya+Para mapagbintangan siyang nagsisinungaling<Para makontra mo ang sinasabi niya",
"Ano ang dapat mong gawin kung ikaw ay nagkamali sa iyong kaibigan?=Umamin at humingi ng tawad>Magkunwaring walang nangyari+Umiwas sa kanya<Isisi sa iba ang pagkakamali",
"Ano ang dapat mong gawin kung may bagong bata sa inyong klase?=Makipagkaibigan sa kanya>Iwasan siya+Takutin o apihin siya<Gumawa ng kuwentong magpapahiya sa kanya",
"Bakit mahalaga ang pagiging magalang sa pakikipagkaibigan?=Para magkaroon ng maayos na ugnayan>Para matakot sila sa iyo+Para makita nilang mas magaling ka<Para magkaroon ng magulong ugnayan",
"Ano ang tamang gawin kung nagpapatulong sa iyo ang iyong kaibigan sa kanyang takdang-aralin?=Turuan siya kung paano ito gawin>Gawin ang buong takdang-aralin para sa kanya+Sabihing wala akong oras<Singilin siya ng bayad bago ako tumulong",
"Paano mo maipapakita ang pagmamalasakit sa iyong kaibigan?=Pagdamay sa kanya sa oras ng kalungkutan>Pagtawa sa kanyang kalagayan+Pagbalewala sa kanya<Pagdadamot sa kanya",
"Alin sa mga ito ang nagpapakita ng respeto sa iyong kaibigan?=Paggalang sa kanyang mga ideya>Pagsasalita sa kanya nang pagalit+Pasigaw na pagkontra sa kanyang sinasabi<Pagtalikod sa kanya habang siya ay nagsasalita",
"Ano ang dapat mong gawin kung hindi ka isinasali ng iyong mga kaibigan sa laro?=Magalang na sabihin ang iyong nararamdaman>Sumali nang walang pahintulot+Awayin sila hanggang ikaw ay isali<Umiyak hanggang ikaw ay isali",
"Ano ang dapat mong gawin kung may nasabi kang masama at hindi totoo sa iyong kaibigan?=Bawiin ang sinabi at humingi ng tawad>Iwasan siya nang isang buwan+Isisi sa iba ang nasabi<Ikalat sa iba ang nasabi",
"Ano ang dapat mong gawin kung magkaiba kayo ng relihiyon ng iyong kaibigan?=Tanggapin na iba ang kanyang relihiyon>Iwasan at layuan siya+Pilitin siyang lumipat sa aking relihiyon<Awayin siya para tularan niya ako",
"Ano ang dapat mong gawin kung malaman mong mahirap lang pala ang iyong kaibigan?=Ipagpatuloy ang aming pagkakaibigan>Iwasan at layuan siya+Apihin siya<Ipakitang mas magaling ako sa kanya",
"Ano ang tamang gawin kung ang kaibigan mo ay nalulungkot?=Aliwin siya para gumaang ang kalooban niya>Iwasan at layuan siya+Pagalitan o takutin siya<Pagtawanan ang kanyang nararamdaman",

);

?>

</head>

</bod

</html>