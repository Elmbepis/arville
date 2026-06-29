<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paggalang sa Buhay - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paggalang sa Buhay";
$_SESSION['tnum']="*50";

$questions=array(

"Ano ang ibig sabihin ng paggalang sa buhay?=Pag-iingat sa sarili at sa iba>Pagsisikap maging tanyag at mayaman+Pagkakaroon ng maraming kaibigan<Pag-aangat ng sarili sa iba",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa sariling katawan?=Regular na paliligo at pagsisipilyo>Pag-inom ng gamot kahit walang sakit+Labis na pagkain ng matatamis<Pagpupuyat gabi-gabi",
"Ano ang pangunahing kahalagahan ng wastong pag-eehersisyo?=Para mapanatiling malusog ang katawan>Para makasali sa mga paligsahan+Para hangaan ng iba<Para mapagod at makatulog agad",
"Alin sa mga sumusunod ang hindi nagpapakita ng paggalang sa buhay?=Paninigarilyo>Pagsusuot ng helmet sa pagbisikleta+Pagtulong sa kapwa<Pagkain ng gulay at prutas",
"Alin sa mga sumusunod ang hindi nagpapakita ng paggalang sa buhay?=Pag-inom ng alak>Pagmamalasakit sa kapwa+Pagkakaroon ng sapat na pahinga<Pagiging malinis sa pangangatawan",
"Ano ang ibig sabihin ng dignidad?=Likas na halaga ng tao>Pagkakaroon ng kakaibang talento+Pagiging mayaman at tanyag<Ganda ng hitsura at pananamit",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa sarili?=Pagtulog sa tamang oras>Pagpunta sa mapanganib na lugar+Pagsuway sa utos ng magulang<Madalas na pagkain ng tsitsirya",
"Alin sa mga sumusunod ang nagpapakita ng pagmamahal sa sarili?=Pag-iwas sa masasamang bisyo>Pagmamalaki o pagmamagaling sa lahat ng bagay+Pagkain nang labis-labis<Paninira sa ibang tao",
"Alin sa mga sumusunod ang pangunahing dahilan kung bakit dapat iwasan ang paninigarilyo?=Nakakasira ito ng kalusugan>Mataas na ang presyo nito ngayon+Mabaho ang usok nito<Hindi masarap ang lasa nito",
"Alin sa mga sumusunod ang nagpapakita ng disiplina sa pag-aaral?=Pagtupad sa mga takdang-aralin>Pagtulog habang may klase+Pagsagot nang pabalang sa guro<Paglaktaw sa klase",
"Ano ang dapat mong gawin kung may makita kang nagaganap na masamang gawain?=Ipagbigay-alam agad ito sa magulang at iba pang kinauukulan>Sumali sa mga gumagawa nito+Makipag-away sa mga gumagawa nito<Ilihim ang nakita",
"Alin sa mga sumusunod ang maituturing na makabuluhang paggamit ng oras?=Pagbabasa ng mga aralin>Paglalaro buong araw+Panunukso o pang-iinis ng kamag-aral<Pagkakalat ng pekeng balita sa social media",
"Alin sa mga sumusunod ang pinakamainam gawin kung nalulungkot ka?=Makipag-usap sa isang taong pinagkakatiwalaan>Mang-inis ng ibang tao bilang katuwaan+Umiyak nang mag-isa sa kuwarto<Magalit sa sarili",
"Alin sa mga sumusunod ang katangian ng isang taong may respeto sa sarili?=Maingat sa pagkilos at pagsasalita>May masasamang bisyo+Palaging nakikipag-away<Mahilig lumabag sa batas",
"Alin sa mga sumusunod ang gawaing tumutulong magpanatili ang kalusugan?=Pagkain ng prutas at gulay>Paglalaro sa maruruming lugar+Pag-inom ng softdrinks tuwing kumakain<Pagpupuyat gabi-gabi",
"Alin sa mga sumusunod ang isa sa mga positibong epekto ng paggalang sa buhay?=Pag-iwas sa kapahamakan>Pagkakaroon ng maraming kaaway+Pagkamalapit sa aksidente<Madalas na pagkakasakit",
"Alin sa mga sumusunod ang katangian ng isang taong may positibong pananaw sa buhay?=May tiwala sa sarili>Laging nagrereklamo+Madaling sumuko<Mapag-alala sa kanyang kinabukasan",
"Alin sa mga sumusunod ang hindi dapat gawin upang mapanatili ang sariling dignidad?=Paninira sa kapwa>Paggalang sa sarili+Pagsisikap sa buhay<Pagpapahalaga sa edukasyon",
"Alin sa mga sumusunod ang hindi isa sa mga karaniwang epekto ng pagkakaroon ng masamang bisyo?=Malusog na katawan>Problema sa pag-iisip+Sirang kinabukasan<Pagkawala ng respeto sa sarili",
"Alin sa mga sumusunod ang makapagpapabuti ng iyong kalusugan?=Regular at wastong pag-eehersisyo>Hindi pag-inom ng tubig+Pagkain ng tsitsirya araw-araw<Araw-gabing paggamit ng social media",
"Alin sa mga sumusunod ang gawaing dapat isabuhay upang mapanatili ang dignidad?=Pagiging tapat>Pagsuway sa batas+Pagsisinungaling<Panglalamang sa kapwa",
"Alin sa mga sumusunod ang gawaing dapat isabuhay upang mapanatili ang dignidad?=Pagiging responsable>Panlilinlang ng kapwa+Pandaraya sa pagsusulit<Pagiging mapanghusga",
"Alin sa mga sumusunod na pananalita ang nagpapakita ng positibong pananaw sa buhay?=Susubukan ko ulit bukas.>Wala na akong pag-asa.+Hindi ko kaya ito.<Walang saysay ang buhay.",
"Alin sa mga sumusunod ang ipinapakita mo kapag inalagaan mo ang iyong sarili?=Pagiging mahina>Pagkakaroon ng mababang tingin sa sarili+Pagkakaroon ng respeto sa buhay<Kawalan ng tiwala sa iba",
"Paano ka makakatulong sa iba habang pinahahalagahan mo ang sariling buhay?=Sa pamamagitan ng pagbibigay ng mabuting payo sa iba>Sa pamamagitan ng pag-iwas sa mga humihingi ng tulong+Sa pamamagitan ng paglabag sa batas<Sa pamamagitan ng pagtuturo ng masamang bisyo sa iba",

);

?>

</head>

</bod

</html>