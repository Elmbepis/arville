<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutan sa Pamayanan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutan sa Pamayanan";
$_SESSION['tnum']="*2i";

$questions=array(

"Ano ang ibig sabihin ng pakikiisa sa pamayanan?=Pakikilahok sa mga gawain ng komunidad>Pagkakaroon ng maraming kaibigan+Pagiging mag-isa palagi<Pag-iwas sa mga kapitbahay",
"Alin sa mga ito ang isang paraan ng pakikiisa ng pamilya sa barangay?=Pagsali sa paglilinis ng paligid>Pagtatapon ng basura sa tabi-tabi+Pag-iingay sa gabi<Pagbili ng maraming gamit",
"Alin sa mga ito ang isang paraan ng pakikiisa ng pamilya sa barangay?=Pagtulong sa mga pagdiriwang>Paglalaglag ng basura sa kanal+Pakikipagtalo sa kapitbahay<Pagsusuot ng magagandang damit",
"Alin sa mga ito ang nagpapakita ng pagiging mapanagutan sa pamayanan?=Pagsunod sa mga alituntunin ng barangay>Pagkakalat sa kalye+Paninira ng mga halaman sa parke<Pagsusulat sa pader",
"Ano ang dapat mong gawin kung may programang 'tree planting' ang inyong barangay?=Sumali kasama ang buong pamilya>Magtago sa bahay para hindi maisali+Tumutol sa programa<Sabihan ang ibang huwag sumali",
"Ano ang dapat mong gawin kung may programang 'cleanliness drive' ang inyong barangay?=Sumali kasama ang buong pamilya>Tumangging makilahok+Magreklamo sa barangay<Magkalat sa paligid para may lilinisin",
"Alin sa mga ito ang paraan para matuto ang mga batang makiisa sa pamayanan?=Pagiging mabuting halimbawa ng magulang>Paglalaro sa labas maghapon+Panonood ng mga bidyo buong araw<Pamamasyal kasama ang mga kaibigan",
"Ano ang epekto kapag lahat ng pamilya ay may malasakit sa iba?=Ligtas, malinis, at maayos na pamayanan>Pagdami ng di-pagkakaunawaan+Magulo at maruming pamayanan<Kawalan ng pagkakaisa",
"Alin sa mga ito ang hindi tanda ng pakikiisa sa pamayanan?=Pagkakalat ng basura sa kalsada>Pagtatapon ng basura sa wastong paraan+Paggalang sa ibang tao<Pagtulong sa mga programa ng barangay",
"Alin sa mga ito ang hindi tanda ng pakikiisa sa pamayanan?=Paninira ng mga gamit ng barangay>Pagsali sa pagtatanim ng mga halaman+Pagtitipid sa tubig<Paglilinis ng harap ng bakuran",
"Bakit mahalaga ang pagsunod sa mga patakaran ng inyong pamayanan?=Upang mapanatili ang kapayapaan at kaayusan>Para hindi makaiwas sa parusa+Para mapuri ng kapitbahay<Upang makatipid sa mga gastusin",
"Alin sa mga ito ang hindi nagpapakita ng paggalang sa ibang tao sa pamayanan?=Pagkakalat ng tsismis>Pakikipag-usap nang maayos+Pagbati sa mga kakilala<Pagsunod sa mga alituntunin",
"Alin sa mga ito ang mainam gawin ng inyong pamilya para sa pamayanan?=Sama-samang paglilinis ng paligid>Pag-iingay nang sabay-sabay+Pagsusunog ng basura sa kalye<Paglalaro sa gitna ng kalsada",
"Alin sa mga ito ang hindi dapat gawin ng iyong pamilya kapag may 'feeding program' sa inyong lugar?=Mag-ingay nang malakas habang idinadaos ito>Tumulong sa pagluluto+Mag-ambag ng pondo<Magpahiram ng mga upuan",
"Ano ang naitutulong ng pagkakaisa at bayanihan sa isang pamayanan?=Nagiging mabilis at magaan ang mga gawain>Nagiging matagal at mabigat ang mga gawain+Dumarami ang mga alitan<Nagkakaroon ng inggitan",
"Alin sa mga ito ang hindi nagpapakita ng pagmamalasakit sa mga nangangailangan?=Pagtataboy ng namamalimos>Pagbibigay ng mga damit sa mga nasunugan+Pagpapakain sa mga nasalanta ng bagyo<Pagbibigay ng gamot sa maysakit",
"Alin sa mga ito ang magagawa ng isang bata para makapagpakita ng pagiging mapanagutan?=Pagwawalis sa harap ng bahay>Paninira ng mga halaman+Pambabato ng mga asong gumagala<Paglalaro sa gitna ng kalsada",
"Ano ang bunga ng pagtulong ng mga pamilya sa mga gawain ng kanilang pamayanan?=Pagkakaisa at kaayusan>Pagkaantala ng mga gawain+Kaguluhan at kalituhan<Hindi magandang ugnayan ng magkakapitbahay",
"Ano ang dapat mong gawin kapag may bagong lipat kayong kapitbahay?=Ipakilala ang sarili at makipagkaibigan sa kanila>Paglaruan ang mga gamit nila+Iwasan sila<Pagtawanan sila nang malakas",
"Alin sa mga ito ang hindi nagpapaunlad ng isang pamayanan?=Pagmamataas at inggitan>Pagkakaisa at pagtutulungan+Pagsisipag at pagtitiyaga<Pagmamalasakit sa kapwa",
"Ano ang dapat mong gawin kung may mga batang naglalaro sa gitna ng kalsadang dinadaanan ng maraming sasakyan?=Payuhan silang lumipat sa mas ligtas na lugar>Sumali sa kanilang paglalaro+Sigawan sila at awayin<Tuksuhin sila at pagtawanan",
"Alin sa mga ito ang hindi wastong pakikitungo sa mga kapitbahay?=Pagkakalat sa kanilang bakuran>Pagbati sa kanila tuwing umaga+Pagpapahiram sa kanila ng gamit<Pagtulong sa kanilang ginagawa",
"Alin sa mga ito ang hindi wastong pakikitungo sa mga kapitbahay?=Pag-iingay nang malakas sa gabi>Pagdamay sa kanila sa oras ng kalungkutan+Pagbabahagi sa kanila ng mga naaning gulay<Pagtulong sa kanilang magtanim ng halaman",
"Alin sa mga ito ang nagpapakita ng pagkamapanagutan sa panahon ng kalamidad?=Pagtulong sa mga nasalanta>Pagtulog sa loob ng bahay+Pagtawa sa mga nasalanta<Pag-iwas sa mga humihingi ng tulong",
"Ano ang dapat ninyong gawin kung ipinapagawa ng barangay ang daan sa inyong lugar?=Magbigay-daan at maging maunawain sa abala>Harangan ang mga manggagawa+Itago ang mga gamit ng mga manggagawa<Magreklamo sa barangay",

);

?>

</head>

</bod

</html>