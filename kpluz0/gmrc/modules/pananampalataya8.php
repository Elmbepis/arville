<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pananampalataya sa Diyos - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pananampalataya sa Diyos";
$_SESSION['tnum']="*8b";

$questions=array(

"Alin sa mga sumusunod ang isang palatandaan ng presensya ng Diyos sa panahon ng pagsubok?=Pag-aaruga ng magulang>Paninisi ng mga kapatid+Paglayo ng mga kaibigan<Pagbaba ng tiwala sa sarili",
"Ang pananampalataya ng pamilya sa Diyos ay maipapakita araw-araw sa pamamagitan ng alin sa mga sumusunod?=Sama-samang pagdarasal>Pagkain nang sabay-sabay+Sama-samang pamamasyal tuwing Linggo<Sabay-sabay na paglalakbay sa malalayong lugar",
"Alin sa mga sumusunod ang isa sa mga bunga ng presensya ng Diyos sa pamilya?=Kapayapaan sa tahanan>Madalas na pag-aaway+Pag-iwas sa bawat isa<Pagtatalo tungkol sa pananampalataya",
"Alin sa mga sumusunod ang kilos na nagpapakita ng pagmamahalan sa pamilya?=Pag-aaruga sa maysakit>Pagsasalita ng masama sa kapatid+Pagkukulong sa kanya-kanyang silid<Pagwawalambahala sa magulang",
"Alin sa mga sumusunod na pagkilos ang nagpapakita ng pananampalataya sa Diyos?=Pagpapatawad sa kapamilya>Pagdadamot ng pagkain+Panlilibak ng kamag-anak<Pagliban sa pagsisimba",
"Ang pag-aaruga sa atin ng ating mga magulang at mga kapatid kapag tayo ay may karamdaman ay halimbawa ng pagpapakita ng presensya ng Diyos sa alin sa mga sumusunod?=Panahon ng pagsubok>Pagdiriwang+Gawaing pang-araw-araw<Pagpapatawad",
"Ang pagtitipon at pagkakaisa ng pamilya sa araw ng iyong kaarawan ay halimbawa ng pagpapakita ng presensya ng Diyos sa alin sa mga sumusunod?=Pagdiriwang>Panahon ng pagsubok+Gawaing pang-araw-araw<Pagpapatawad",
"Ang masayang pagtutulungan ng pamilya sa paglilinis ng bakuran ay halimbawa ng pagpapakita ng presensya ng Diyos sa alin sa mga sumusunod?=Gawaing pang-araw-araw>Panahon ng pagsubok+Pagdiriwang<Pagpapatawad",
"Ang mapayapang pag-aayos ng di-pagkakaunawaan sa pagitan ng magkapatid ay halimbawa ng pagpapakita ng presensya ng Diyos sa alin sa mga sumusunod?=Pagpapatawad>Pananalangin bilang isang pamilya+Pagdiriwang<Gawaing pang-araw-araw",
"Ang sama-samang pagrorosaryo ng mga magulang at mga anak ay halimbawa ng pagpapakita ng presensya ng Diyos sa alin sa mga sumusunod?=Pananalangin bilang isang pamilya>Pagpapatawad+Pagmamahalan at pagkalinga<Pagdiriwang",
"Ang pagyakap ng anak sa magulang at pag-aaruga ng magulang sa anak ay mga halimbawa ng pagpapakita ng presensya ng Diyos sa alin sa mga sumusunod?=Pagmamahalan at pagkalinga>Pagpapatawad+Pananalangin bilang isang pamilya<Pagdiriwang",
"Alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos ang tumutukoy sa sabay-sabay na pagkausap ng pamilya sa Diyos para magpasalamat at humingi ng paggabay?=Sama-samang pananalangin>Pagbabahagi ng salita ng Diyos+Pagtulong sa kapwa<Pagtuturo ng magulang",
"Ang pagbabasa, pagtalakay, at pagtuturo tungkol sa mga aral sa Bibliya ay halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos?=Pagbabahagi ng salita ng Diyos>Sama-samang pananalangin+Pagtulong sa kapwa<Pagpapakita ng kabutihan sa pamilya",
"Ang pagbibigay ng damit at gamot sa mga nasalanta ng bagyo ay halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos?=Pagtulong sa kapwa>Sama-samang pananalangin+Pagbabahagi ng salita ng Diyos<Pagpapakita ng kabutihan sa pamilya",
"Ang pagtulong sa mga gawaing bahay, magandang pakikisama sa mga kapatid, at pagsunod sa mga magulang ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos?=Pagpapakita ng kabutihan sa pamilya>Sama-samang pananalangin+Pagbabahagi ng salita ng Diyos<Pagtulong sa kapwa",
"Ang paghubog sa atin ng ating nanay at tatay para makapagpakita tayo ng pagmamalasakit sa kapwa at pagpapasalamat sa Diyos ay halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos?=Pagtuturo ng magulang>Sama-samang pananalangin+Pagpapatawad sa kapwa<Pagtulong sa kapwa",
"Ang taos-pusong pagtanggap sa paumanhin ng isang nagkasala sa atin ay halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos?=Pagpapatawad sa kapwa>Pagiging mapagpasalamat sa biyaya+Pagtuturo ng magulang<Pagtulong sa kapwa",
"Ang pagiging masinop at hindi pagsasayang ng pagkain, tubig, o pera ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa presensya ng Diyos?=Pagiging mapagpasalamat sa biyaya>Pagpapatawad sa kapwa+Pagbabahagi ng salita ng Diyos<Pagtulong sa kapwa",
"Alin sa mga sumusunod ang hindi isa sa mga dapat gawin ng pamilya upang mapalalim ang pananampalataya nito sa Diyos?=Pag-iwas sa mga aktibidad na pampamilya>Sama-samang pagdarasal+Pagtalakay sa mga aral ng Bibliya<Pagsisimba tuwing Linggo",
"Ang presensya ng Diyos ay mararamdaman ng pamilya sa misa sa pamamagitan ng alin sa mga sumusunod?=Sabayang pananalangin at pag-awit ng papuri>Hindi pakikinig sa pari+Paglalaro gamit ang cellphone<Paglabas-labas ng simbahan",
"Kailan natin nararamdaman ang presensya ng Diyos sa loob ng tahanan?=Kapag may kapayapaan at pagmamahalan>Kapag may pagtatalo+Kapag walang sumasali sa sama-samang pagdarasal<Kapag nag-iiwasan ang lahat",
"Alin sa mga sumusunod ang nagbibigay ng katatagan sa pamilya sa kalagitnaan ng krisis?=Pag-asa at pananalig sa Diyos>Pagkimkim ng poot+Paninisi at pagbibintang<Pagbaba ng tiwala sa sarili",
"Alin sa mga sumusunod ang hindi isa sa mga palatandaan ng pagkilos ng Diyos sa gitna ng isang problema?=Kawalan ng pag-asa>Katatagan+Pagtutulungan<Pagkakaisa",
"Alin sa mga sumusunod ang hindi isang halimbawa ng simpleng paraan ng pagsasabuhay ng pananampalataya sa Diyos?=Pagpapabaya sa tungkulin>Pagtulong sa mga gawaing bahay+Taimtim na pagdarasal<Pagyakap sa magulang",
"Bakit mahalaga ang sama-samang pagbabasa at pag-unawa sa Salita ng Diyos?=Para magkaroon gabay sa tamang pamumuhay>Para maiwasan ang pagkabagot+Para mapuri ng ibang tao<Para hindi mapagalitan",

);

?>

</head>

</bod

</html>