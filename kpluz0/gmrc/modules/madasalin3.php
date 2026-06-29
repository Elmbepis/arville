<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Madasalin - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Madasalin";
$_SESSION['tnum']="*3f";

$questions=array(

"Alin sa mga sumusunod ang ipinapakita ng pananalangin para sa kapwa?=Pagmamalasakit>Inggit+Galit<Pagmamataas",
"Alin sa mga sumusunod ang nagagawa ng pananalangin para sa iba?=Pagbibigay sa kanila ng pag-asa at lakas>Pagdudulot sa kanila ng pangamba+Pagpapababa ng kanilang tiwala sa sarili<Pagkawala ng kanilang mga kaibigan",
"Kapag tayo ay nanalangin para sa iba, alin sa mga ito ang ating nakakasanayan?=Magmalasakit sa kapwa>Magmalaki sa iba+Maging mapag-isa<Maging makasarili",
"Bakit mahalaga ang pananalangin sa Diyos?=Para mapalalim natin ang ugnayan sa Kanya at sa iba>Para mapuri tayo ng iba+Para maging marangya ang ating buhay<Para maraming mainggit sa atin",
"Saan maaaring manalangin nang taimtim?=Kahit saan>Sa mga lugar lamang na banal+Sa altar ng bahay lamang<Sa mga lugar lamang na tahimik",
"Alin sa mga sumusunod ang epekto ng sabay-sabay na pananalangin ng pamilya?=Mas malakas na pagmamahalan at pagkakaisa>Pagkainis sa bawat isa+Kawalan ng pag-asa ng lahat<Paghina ng pananampalataya ng pamilya",
"Alin sa mga sumusunod ang tamang dahilan kung bakit nagpupunta tayo sa simbahan?=Para ipanalangin ang mas nakararami>Para makapagpakita ng magandang damit+Para makakuha ng papuri<Para makipagkatuwaan sa mga kaibigan",
"Alin sa mga sumusunod ang nagpapakita ang malasakit sa mga nasalanta ng isang kalamidad?=Pagdarasal para sa kanilang kaligtasan>Panonood ng balita+Pagdarasal para sa sariling kahilingan<Pagtawa sa kanilang kalagayan",
"Kapag may taong nalulungkot, alin sa mga sumusunod ang hindi makakatulong sa kanya?=Pagtawa sa kanyang pagkalungkot>Pananalangin para sa kanyang kaligayahan+Pakikinig nang maigi sa kanya<Pagtulong na malutas ang kanyang problema",
"Bakit kailangan nating ipagdasal ang mga nalulungkot?=Para maramdaman nilang mahal sila ng Diyos>Para hindi nila tayo awayin+Para makapagmalaki tayo sa kanila<Para dumami ang ating mga biyaya",
"Alin sa mga sumusunod ang tamang panalangin para sa pagsusulit?=Panginoon, magkaroon po sana kami ng lakas ng isip at loob.>Panginoon, ako lang po sana ang pumasa.+Panginoon, bumagsak po sana kaming lahat.<Panginoon, hindi po sana matuloy ang pagsusulit.",
"Alin sa mga sumusunod ang tamang panalangin para sa maysakit?=Panginoon, gumaling na po sana siya.>Panginoon, magkasakit din po sana ang iba.+Panginoon, iba na lang po sana ang nagkasakit.<Panginoon, manatili po sana ang sakit niya.",
"Alin sa mga sumusunod ang magandang panalangin para sa iyong pamilya?=Panginoon, manatili po sanang malusog ang aming mga magulang.>Panginoon, wala po sana akong kapatid.+Panginoon, ako po sana ang maging paboritong anak.<Panginoon, hindi po sana ako malamangan ni Kuya.",
"Alin sa mga sumusunod ang hindi ipinapakita ng pananalangin para sa mga kaibigan?=Pagkainggit sa kanila>Pagmamahal sa kanila+Pagmamalasakit sa kanila<Pag-alala sa kanila",
"Alin sa mga sumusunod ang mabuting panalangin para sa ating bansa?=Panginoon, gabayan po ninyo ang aming mga lider.>Panginoon, palitan po ninyo ang aming mga lider.+Panginoon, maghirap po sana ang mga ibang bansa.<Panginoon, ako po sana ang maging pinakamayaman dito sa aming bansa.",
"Alin sa mga sumusunod ang magandang ipanalangin para sa buong mundo?=Pagmamahalan at pagkakaisa ng lahat>Pagtutunggali ng mga bansa+Hindi pagkakaunawaan ng magkakaibang lahi<Pagyaman ng mga Pilipino kaysa sa ibang mga lahi",
"Alin sa mga sumusunod ang hindi dapat natin ipanalangin para sa isang taong may problema?=Pagkakaroon din ng problema ng mga kaibigan niya>Pagkalutas ng kanyang problema+Pagtibay ng kanyang loob<Kapanatagan ng kanyang kalooban",
"Bakit magandang manalangin nang tahimik at mag-isa?=Para maging taimtim ang pagkausap sa Diyos>Para makahiling ng kayamanan sa Diyos+Para puwedeng pabiro ang pagkausap sa Diyos<Para parusahan ng Diyos ang ating mga kagalit",
"Alin sa mga sumusunod ang ipinapakita ng sama-sama nating pananalangin sa simbahan?=Pagkakaisa sa pananampalataya>Pagiging hindi sanay sa mag-isang pagdarasal+Kahinaan ng pananampalataya ng bawat isa<Kawalan ng tiwala sa bawat isa",
"Ano ang maaari mong gawin kung hindi mo kayang tumulong sa mga nangangailangan sa pamamagitan ng pagsisilbi o pagbabahagi?=Pananalangin para sa kanila>Pag-iwas sa kanila+Pagmamalaki sa kanila<Paninisi sa kanila",
"Alin sa mga sumusunod ang dapat nating ipanalangin tuwing may espesyal na okasyon ang ating pamilya?=Pasasalamat sa Diyos>Mabilis na pagyaman+Pag-angat sa kapwa<Pagkainggit ng iba",
"Kapag ang bansa natin ay may problema, alin sa mga sumusunod ang hindi dapat natin ipanalangin?=Kawalan ng pag-asa>Kapayapaan+Katatagan<Pagkakaisa",
"Alin sa mga sumusunod ang ipinapakita ng pananalangin para sa pagkakaunawaan ng lahat?=Pagnanais ng kapayapaan>Galit sa kapwa+Pag-aangat ng sarili sa iba<Pagnanais na sumikat",
"Alin sa mga sumusunod ang dapat mong ipanalangin para sa mga lider ng ating bansa?=Gabay sa paggawa ng tama>Pag-uuna ng sarili nilang kapakanan+Pagkatanggal nila sa puwesto<Kusang pag-alis nila sa puwesto",
"Alin sa mga sumusunod ang hindi mo dapat ipanalangin para sa iyong kaibigan?=Kabiguan>Kaligtasan+Kaligayahan<Kabutihan",

);

?>

</head>

</bod

</html>