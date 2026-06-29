<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa Pamilya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa Pamilya";
$_SESSION['tnum']="*89";

$questions=array(

"Alin sa mga sumusunod ang pinakamainam na paraan upang maipakita ang pasasalamat sa pamilya?=Tumulong sa mga gawaing bahay>Magkulong lamang sa kwarto+Umiwas sa mga utos ng magulang<Maglibang sa labas buong araw",
"Bakit mahalaga ang pagpapakita ng pasasalamat sa pamilya?=Para mapalalim ang ugnayan at pagmamahalan dito>Para makahingi ng kapalit na pabor sa mga kapamilya+Upang hindi mapagalitan ng mga magulang<Para hangaan ng ibang tao",
"Alin sa mga sumusunod ang nagpapakita ng pasasalamat sa pamilya?=Pagyakap sa magulang>Pagdadamot ng pagkain sa kapatid+Pag-alis nang hindi nagpapaalam<Panunukso sa nakababatang kapatid",
"Alin sa mga sumusunod ang nagpapakita ng pasasalamat sa pamilya?=Pagtupad ng mga tungkulin sa bahay>Pakikipagtalo sa kapatid+Pamamasyal sa labas buong araw<Hindi pakikinig sa payo ng magulang",
"Alin sa mga sumusunod ang nagpapakita ng pasasalamat sa pamilya?=Pagsunod sa lahat ng utos ng magulang>Pang-iinis sa mga kapatid+Hindi pagpapahiram ng gamit sa kapamilya<Pag-iwas sa lolo at lola",
"Alin sa mga sumusunod na kabutihang dulot ng ating pamilya ang sumasaklaw sa pagbibigay sa atin ng kapanatagan ng loob sa mga sandali ng pagsubok?=Pagbibigay ng emosyonal na suporta>Paghubog ng mga halaga (values)+Pagpapaunlad ng pakikipagkapwa<Pagbibigay ng materyal na suporta",
"Alin sa mga sumusunod na kabutihang dulot ng ating pamilya ang tumutukoy sa pagtuturo sa atin ng mga katangiang tulad ng pagtitiis sa kahirapan, pananagutan sa mga gawain, at pagiging mapagpasalamat?=Paghubog ng mga halaga (values)>Pagbibigay ng emosyonal na suporta+Pagbibigay ng inspirasyon<Pagbibigay ng materyal na suporta",
"Alin sa mga sumusunod na kabutihang dulot ng ating pamilya ang tumutukoy sa pagpapakita sa atin ng pagsisikap upang magkaroon tayo ng hangaring magsikap din at magtagumpay?=Pagbibigay ng inspirasyon>Pagbibigay ng emosyonal na suporta+Paghubog ng mga halaga (values)<Pagbibigay ng materyal na suporta",
"Alin sa mga sumusunod na kabutihang dulot ng ating pamilya ang tumutukoy sa pagtuturo sa atin ng mabuting pakikisama, pakikipagtulungan, at paggalang sa iba?=Pagpapaunlad ng pakikipagkapwa>Pagbibigay ng emosyonal na suporta+Paghubog ng mga halaga (values)<Pagbibigay ng materyal na suporta",
"Alin sa mga sumusunod na kabutihang dulot ng ating pamilya ang tumutukoy sa pagtustos sa ating pagkain, tahanan, at mga pisikal na pangangailangan?=Pagbibigay ng materyal na suporta>Pagbibigay ng emosyonal na suporta+Paghubog ng mga halaga (values)<Pagpapaunlad ng pakikipagkapwa",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang tumutukoy sa pagbigkas ng \"salamat\" para sa mga pang-araw-araw na kabutihan ng pamilya?=Tuwirang pagpapasalamat>Pagbabahagi ng mga personal na tagumpay+Pagtulong sa mga gawain sa bahay<Pagdiriwang ng mga makabuluhang okasyon",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang tumutukoy sa pag-uulat ng mga positibong resulta ng pagsusulit, pagtatapos sa proyekto, o anumang pansariling pag-unlad?=Pagbabahagi ng mga personal na tagumpay>Tuwirang pagpapasalamat+Pagtulong sa mga gawain sa bahay<Pagdiriwang ng mga makabuluhang okasyon",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang sumasaklaw sa pag-aalaga sa nakababatang kapatid, paglilinis ng tahanan, at paghahanda ng mesa?=Pagtulong sa mga gawain sa bahay>Pagbabahagi ng mga personal na tagumpay+Tuwirang pagpapasalamat<Pagdiriwang ng mga makabuluhang okasyon",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang tumutukoy sa aktibong pakikilahok sa mga espesyal na araw ng pamilya tulad ng kaarawan at anibersaryo?=Pagdiriwang ng mga makabuluhang okasyon>Pagbabahagi ng mga personal na tagumpay+Pagtulong sa mga gawain sa bahay<Tuwirang pagpapasalamat",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang tumutukoy sa pagiging responsableng estudyante, mabait na kapatid, at mapagkalingang anak?=Pagiging mabuting tao>Pagpapanatili ng mabuting komunikasyon+Pagbabahagi ng mga personal na tagumpay<Tuwirang pagpapasalamat",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang tumutukoy sa boluntaryong paglalaan ng kalidad na panahon para sa pamilya?=Pagbibigay ng oras at atensyon>Pagpapanatili ng mabuting komunikasyon+Pagtulong sa mga gawain sa bahay<Pagiging mabuting tao",
"Alin sa mga sumusunod na paraan ng pagpapakita ng pasasalamat sa ating pamilya ang sumasaklaw sa regular na pangungumusta sa mga kapamilya, pagbabahagi ng sariling karanasan, at pagiging handang makinig sa kanilang mga hinaing?=Pagpapanatili ng mabuting komunikasyon>Tuwirang pagpapasalamat+Pagtulong sa mga gawain sa bahay<Pagdiriwang ng mga makabuluhang okasyon",
"Ano ang ibig sabihin ng pagiging mapagpasalamat natin sa ating pamilya?=Pagkilala at pagpapahalaga sa kabutihan ng ating mga kapamilya>Pagsumbat sa mga kampamilya ng mga naitulong natin sa kanila+Pagpapasalamat ng ating mga kapamilya sa ating kabutihan<Pagsasantabi sa mga nagawang kabutihan sa atin ng ating mga kapamilya",
"Bakit mahalaga ang pagbabahagi ng ating mga personal na tagumpay sa ating pamilya?=Upang pahalagahan ang pagiging bahagi nila sa ating pag-unlad>Para may maipagmalaki tayong kuwento sa social media+Para hangaan ng ibang tao ang ating pamilya<Para mainggit sa atin ang ating mga kapatid",
"Anong aral ang natutunan ng mga anak mula sa araw-araw na pagtatrabaho at pagsasakripisyo ng mga magulang?=Pagiging masipag at matiyaga>Pagsandal sa ibang tao sa lahat ng oras+Pagmamalaki sa kapwa<Pagbabalewala sa hirap ng iba",
"Alin sa mga sumusunod ang nagpapakita ng pasasalamat sa pamilya?=Pagtulong sa paglalaba ng mga damit>Pagtulog habang may ginagawa ang iba+Mag-isang pag-ubos ng pagkain sa bahay<Pakikipagkuwentuhan sa labas buong araw",
"Alin sa mga sumusunod ang nagpapakita ng pasasalamat sa pamilya?=Paglilinis ng silid nang walang nag-uutos>Pagliligpit ng mga gamit nang padabog matapos utusan+Pag-alis sa bahay nang hindi nagpapaalam<Pagkainggit sa personal na tagumpay ng isang kapatid",
"Alin sa mga sumusunod ang isa sa mga epekto sa sarili ng pagiging mapagpasalamat sa pamilya?=Pagkakaroon ng positibong pananaw sa buhay>Pagbaba ng tiwala sa sarili+Pagkainis sa sariling pamilya<Kawalan ng disiplina",
"Alin sa mga sumusunod ang hindi nagpapakita ng pasasalamat sa pamilya?=Pag-iwas sa mga kapamilya>Pagtupad sa mga tungkulin sa bahay+Pag-alala sa mga espesyal na okasyon<Tuwirang pagbigkas ng pasasalamat sa mga kapamilya",
"Alin sa mga sumusunod ang pinakasimpleng paraan ng pagpapakita ng pasasalamat sa mga magulang?=Pagngiti at pagyakap sa kanila>Paggawa ng kard na may magandang mensahe para sa kanila+Pagpapakain sa kanila sa isang mamahaling restaurant<Pagbibigay ng mamahaling regalo sa kanila",

);

?>

</head>

</bod

</html>