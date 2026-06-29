<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa Kapwa - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa Kapwa";
$_SESSION['tnum']="*5c";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapagmalasakit sa kapwa?=Pagtulong sa nangangailangan>Pagmamalaki o pagyayabang sa iba+Pagiging makasarili<Paghingi ng tulong sa kapwa",
"Alin sa mga sumusunod ang pinakamainam mong magagawa sa isang kamag-aral na may sakit?=Tulungan siyang makapunta sa klinika>Umiwas sa kanya+Pigilan siyang pumasok sa silid-aralan<Pagtawanan siya",
"Paano ka makakatulong sa isang matandang may saklay at paika-ikang gumalaw?=Alalayan siya sa paglalakad, lalo na sa pagtawid>Iwasan siya para hindi siya mapahiya+Pilitin siyang umuwi na lamang<Buhatin ang kanyang saklay",
"Alin sa mga sumusunod ang nagpapakita ng pagmamalasakit sa isang taong may problema?=Pakikinig nang buong puso sa kanyang mga hinaing>Pagsasantabi ng kanyang damdamin+Pagsasabi sa kanyang siya ang dapat sisihin sa kanyang problema<Pagpapakalat ng kanyang pinagdadaanan sa iba",
"Alin sa mga sumusunod ang halimbawa ng pagkalinga sa isang taong may natatanging kondisyon?=Pagtanggap at pag-unawa sa isang taong hindi makapagsalita nang maayos>Pakikipaglaro sa isang malusog na atleta+Pagtawa sa isang taong hindi nakakatayo<Pagmamalaki sa isang taong naghihirap",
"Alin sa mga sumusunod ang hindi isang halimbawa ng pagiging mapagmalasakit sa kapwa sa paaralan?=Pagtawa sa kaklaseng nahulog sa upuan>Pagtulong para makatayong muli ang kaklaseng natumba+Pagbabahagi ng sariling baon sa kaklaseng walang pagkain<Pagpapahiram ng lapis sa kaklaseng walang gamit",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa dignidad ng isang kapwang nangangailangan?=Pagtulong nang may respeto>Paghamak sa kanyang katayuan+Pagtawa sa kanyang problema<Pagpapahiya sa kanya sa ibang tao",
"Alin sa mga ito ang dapat mong gawin sa isang nakatayong PWD na nakasabay mo sa isang pampublikong sasakyan?=Ialok sa kanya ang iyong upuan>Iwasan siyang tingnan+Tanungin siya kung gusto niyang kumandong<Pagtawanan siya sa kanyang pagtayo",
"Alin sa mga sumusunod ang hindi mo ipinapakita tuwing ikaw ay tumutulong sa mga gawaing-bahay?=Pagiging makasarili>Pagiging responsable+Pagmamalasakit sa pamilya<Pagiging masipag",
"Alin sa mga sumusunod ang pinakamainam mong magagawa kung may makita kang kaklaseng umiiyak?=Tanungin siya kung may maitutulong ka sa kanya>Sabihan siyang huwag mag-drama+Pagtawanan ang kanyang pag-iyak<Ikalat ang kanyang pag-iyak sa social media",
"Alin sa mga sumusunod ang inaasahang epekto sa komunidad ng pagkalinga ng lahat sa kanilang kapwa?=Kapayapaan at pagkakaisa>Pagdalas ng mga alitan+Pagkawala ng respeto sa bawat isa<Paghina ng ugnayan ng mga tao",
"Ano ang dapat mong gawin kung nangangailangan ng tulong ang kaklase mong may kapansanan?=Tumulong nang may pahintulot mula sa kanya>Magpumilit tumulong kahit ayaw niya ng tulong mo+Humingi ng pabor sa kanya bago tumulong<Pilitin siyang magmakaawa muna bago ka tumulong",
"Ano ang dapat mong gawin kapag may kaklase kang hindi marunong sa isang gawaing nakatoka sa kanya?=Turuan siya sa magalang at matiyagang paraan>Ipahiya siya sa harap ng klase+Iwanan siyang mag-isa<Turuan siya sa paraang nagmamalaki",
"Alin sa mga sumusunod ang hindi isang halimbawa ng pagkalinga sa kapwa?=Pagsisikap para lumaki ang sariling kita>Pagbibigay ng gamot sa isang maralitang maysakit+Pagpapayo sa isang taong may problema<Pagbibigay ng mga damit sa isang taong nasunugan",
"Anong saloobin ang dapat nating taglayin kapag may taong nanghihingi sa atin ng tulong?=Pagiging bukas-palad>Pagdududa sa kanya+Mababang tiwala sa sarili<Pagmamataas sa kanya",
"Ano ang ibig sabihin ng \"bukal sa pusong pagtulong\"?=Kusang pagtulong nang maluwag sa kalooban>Pagtulong dahil napipilitan lamang+Pagtulong para mapuri ng iba<Pagtulong dahil may hinihintay na kapalit",
"Alin sa mga ito ang magagawa mo para maipakita mo ang iyong pagmamalasakit sa inyong paaralan?=Pagtulong sa paglilinis ng silid-aralan>Pagkuha ng mga magagandang bulaklak sa hardin+Paglabag sa mga alituntunin<Pagpapabaya sa mga kagamitan dito",
"Alin sa mga ito ang hindi mo dapat gawin sa isang kaklaseng bagong lipat sa inyong paaralan?=Gawing biro ang itsura niya>Gabayan siya+Ipakilala siya sa iba<Kaibiganin siya",
"Alin sa mga sumusunod ang dapat mong pairalin tuwing tumutulong ka sa iyong kapwa?=Pagpapakumbaba>Pagmamataas+Pagdududa<Pagsasamantala",
"Alin sa mga sumusunod ang wastong pakikitungo sa mga taong may kapansanan?=Pagtrato sa kanila nang pantay at magalang>Pagsasamantala sa kanilang kalagayan+Pangmamaliit sa kanilang kakayanan<Paglunod sa kanila ng awa at habag",
"Alin sa mga sumusunod ang ginagawa ng isang mapagmalasakit na estudyante?=Tumutulong sa mga nangangailangan>Nagbubulag-bulagan sa problema ng iba+Nagpapanggap na matulungin para mapuri<Umiiwas sa mga mahihirap at maysakit",
"Alin sa mga ito ang inaasahang epekto sa iyong pagkatao ng pagiging mapagmalasakit mo sa iba?=Pagiging maligaya at panatag>Pagdalas ng pag-aalala at pangangamba+Pagdami ng mga kaalitan<Pagiging mainggitin sa iba",
"Ano ang dapat mong gawin kung mayroon kang kaibigang iba ang pananaw o pananampalataya sa iyo?=Igalang at tanggapin pa rin siya>Iwasan na siya habambuhay+Pagtawanan ang kanyang paniniwala<Pilitin siyang magpalit ng kanyang pananaw o pananampalataya",
"Alin sa mga ito ang magagawa mo para makatulong sa isang kaklaseng may kapansanan sa paningin?=Pag-aalok sa kanya ng iyong paggabay sa kanyang paglalakad>Pagpapatawa tungkol sa kanyang kapansanan+Paghaharang ng mga bagay sa kanyang daanan<Pagtatago ng kanyang mga gamit",
"Alin sa mga sumusunod ang damdaming hindi nadarama ng isang taong tinulungan o pinagmalasakitan ng kanyang kapwa?=Pagkainis>Pagkalugod+Pasasalamat<Pag-asa",
 
);

?>

</head>

</bod

</html>