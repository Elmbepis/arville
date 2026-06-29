<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Madasalin Kasama ang Pamilya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Madasalin Kasama ang Pamilya";
$_SESSION['tnum']="*18";

$questions=array(

"Bakit mahalaga ang sama-samang pagdarasal ng pamilya?=Para sama-samang mapalapit sa Diyos>Para sama-samang kumita ng pera+Para tumalino ang bawat isa<Para hangaan ng ibang tao ang pamilya",
"Ano ang nararamdaman ng pamilya kapag nagdarasal nang sama-sama?=Kapayapaan>Takot+Inggit<Pagod",
"Ano ang dapat gawin bago magsimula ang panalangin ng pamilya?=Magbahagi ng mga kahilingan>Maglaro+Manood ng TV<Kumain",
"Alin sa mga ito ang tumutukoy sa pakikipag-usap sa Diyos kapag sama-samang nananalangin?=Paglapit sa Diyos>Pagpapatibay ng samahan+Pagtuturo ng mga halaga sa mga bata<Pagkakaroon ng kapayapaan",
"Alin sa mga ito ang tumutukoy sa mas matatag na pagkakaisa ng mga kasapi ng pamilya kapag sama-sama silang nananalangin?=Pagpapatibay ng samahan>Paglapit sa Diyos+Pagtuturo ng mga halaga sa mga bata<Pagkakaroon ng kapayapaan",
"Alin sa mga ito ang tumutukoy sa pagkakatuto ng mga bata ng magagandang asal at gawi kung sama-samang nananalangin ang kanilang pamilya?=Pagtuturo ng mga halaga>Paglapit sa Diyos+Pagpapatibay ng samahan<Pagkakaroon ng kapayapaan",
"Alin sa mga ito ang tumutukoy sa pagiging matiwasay ng pamilyang sama-sama nananalangin?=Pagkakaroon ng kapayapaan>Paglapit sa Diyos+Pagpapatibay ng samahan<Pagtuturo ng mga halaga",
"Alin sa mga ito ang tumutukoy sa pagkakaroon ng araw-araw na patnubay ng Diyos ang pamilyang sama-sama nananalangin?=Pagkakaroon ng gabay sa buhay>Paglapit sa Diyos+Pagpapatibay ng samahan<Pagkakaroon ng kapayapaan",
"Alin sa mga ito ang tumutukoy sa pagkakaroon ng pamilya ng tiyak na oras para sa kanilang regular na pagdarasal?=Paglalaan ng panahon para sa panalangin>Paghahanda ng espesyal na lugar para sa panalangin+Pakikilahok sa panalangin<Pagbabahagi ng mga kahilingan",
"Alin sa mga ito ang tumutukoy sa pagkakaroon ng pamilya ng tiyak na bahagi ng tahanan kung saan sila nagdarasal?=Paghahanda ng espesyal na lugar para sa panalangin>Paglalaan ng panahon para sa panalangin+Pakikilahok sa panalangin<Pagbabahagi ng mga kahilingan",
"Alin sa mga ito ang tumutukoy sa pagsali ng bawat kasapi ng pamilya sa sama-samang pananalangin?=Pakikilahok sa panalangin>Paglalaan ng panahon para sa panalangin+Paghahanda ng espesyal na lugar para sa panalangin<Pagbabahagi ng mga kahilingan",
"Alin sa mga ito ang tumutukoy sa pagpapahayag ng bawat kasapi ng pamilya ng kanyang mga ninanais?=Pagbabahagi ng mga kahilingan>Paglalaan ng panahon para sa panalangin+Paghahanda ng espesyal na lugar para sa panalangin<Pakikilahok sa panalangin",
"Alin sa mga ito ang tumutukoy sa paggamit ng rosaryo, Bibliya, o iba pang bagay para maging mas makabuluhan ang sama-samang pananalangin?=Pagkakaroon ng mga gabay sa panalangin>Paglalaan ng panahon para sa panalangin+Paghahanda ng espesyal na lugar para sa panalangin<Pagbabahagi ng mga kahilingan",
"Alin sa mga ito ang ginagawa ng pamilya sa oras ng panalangin?=Nagdarasal>Nagkukuwentuhan+Nag-aaral<Nagpapahinga",
"Alin sa mga ito ang maaaring gamitin upang magabayan ang pagdarasal ng pamilya?=Rosaryo>Hikaw+Relo<Kuwintas",
"Saan dapat magtipon ang pamilya para magdasal?=Sa isang tahimik na bahagi ng tahanan>Sa kalsada+Sa isang maingay na bahagi ng tahanan<Sa parke",
"Alin sa mga ito ang dapat hingin sa Diyos sa panalangin?=Patnubay>Laruan+Pagkain<Pera",
"Ano ang ibinibigay ng panalangin sa bawat miyembro ng pamilya?=Kapayapaan>Kayamanan+Katalinuhan<Kalungkutan",
"Bakit mahalaga ang pagkakaroon ng pamilya ng regular na oras ng pananalangin?=Para hindi makalimutan ng pamilyang magdasal>Para magkaroon ang pamilya ng panahong magkuwentuhan+Para hindi makalimutan ng pamilyang maglibang<Para makaiwas sa pagdarasal kung may ibang gagawin",
"Alin sa mga ito ang magandang epekto sa pamilya ng sama-samang pananalangin?=Pagkakaisa sa pananampalataya>Inggitan+Kaguluhan<Pagkawatak-watak",
"Alin sa mga ito ang dapat ipanalangin ng pamilya para sa bawat isa?=Kalusugan at kaligtasan>Maraming pera+Kasikatan<Mga mamahaling bagay",
"Alin sa mga ito ang dapat isipin kapag nagdarasal?=Kabutihan ng lahat>Sariling tagumpay+Magagandang gamit<Masasarap na pagkain",
"Bakit mahalaga ang pagbabahagi ng mga kahilingan bago magdasal?=Para maipanalangin ng pamilya ang bawat isa>Para maipanalangin ng bawat isa ang sarili lamang+Para magkaroon ng inggitan sa pamilya<Para malaman ng bawat isa ang kailangang bilhin",
"Ano ang ipinapakita ng sama-samang pananalangin?=Pagmamahal sa Diyos at sa pamilya>Pagmamahal sa mga materyal na bagay+Pagmamahal sa pera<Pagmamahal sa sarili",
"Alin sa mga ito ang HINDI isa sa mga natutunan ng mga bata mula sa pagdarasal nang sama-sama?=Pagiging makasarili>Pagmamahal sa Diyos+Pagpapakumbaba<Pagmamahal sa pamilya",
"Alin sa mga ito ang pinakamainam ipanalangin ng pamilya para sa komunidad?=Kapayapaan at kaligtasan para sa lahat>Mga bagong pasyalan+Masasarap na pagkain sa palengke<Mas maraming pagdiriwang",

);

?>

</head>

</bod

</html>