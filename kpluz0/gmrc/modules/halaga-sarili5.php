<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapahalaga sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapahalaga sa Sarili";
$_SESSION['tnum']="*51";

$questions=array(

"Ano ang ibig sabihin ng 'pagpapahalaga sa sarili'?=Pagkilala sa sariling importansya>Pagmamagaling sa lahat ng oras+Paghanga sa ibang tao<Pagtatago ng sariling damdamin",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa sarili?=Pag-aalaga ng pisikal at mental na kalusugan>Pag-iwas sa mga tungkulin+Paglilihim ng nararamdaman<Pagiging sunud-sunuran sa iba",
"Alin sa mga sumusunod ang katangian ng isang taong may pagpapahalaga sa sarili?=May positibong pananaw sa buhay>Walang tiwala sa sarili+Takot sa pagbabago<Mailap sa kapwa",
"Alin sa mga sumusunod ang pisikal na pagbabago?=Paglaki ng katawan>Pagiging mas emosyonal+Pagiging mas responsable<Paglalim ng pag-unawa sa tama at mali",
"Bakit mahalagang alagaan mo ang iyong katawan habang ikaw ay lumalaki?=Para manatiling malusog at masigla>Para magkaroon ng mga tagahanga+Para makaiwas sa panlalait ng iba<Para maiangat ang sarili sa iba",
"Ano ang karaniwang nangyayari sa boses ng lalaki sa panahon ng pagbibinata?=Lumalalim ito>Nawawala ito+Tumataas ang tono nito<Nagiging nakakatawa ito",
"Alin sa mga sumusunod ang hindi pisikal na pagbabago?=Pagbabago ng ugali>Pagtaas ng timbang+Pagtubo ng bigote<Paglapad ng balikat",
"Ano ang ibig sabihin ng pabagu-bagong damdamin?=Mabilis na pag-iiba ng nararamdaman>Patuloy na pagtindi ng isang emosyon+Kawalan ng anumang emosyon<Mabilis na pagkawala ng pagkagusto sa isang tao",
"Alin sa mga sumusunod ang pinakamainam na paraan upang mapamahalaan mo ang iyong emosyon?=Pag-unawa sa nararamdaman at pakikinig sa payo>Pagpigil sa nararamdaman+Pagtatago ng nararamdaman<Pag-iyak nang palihim",
"Alin sa mga sumusunod ang indikasyon ng paglalim ng pagpapahalaga sa iba?=Paggalang sa damdamin ng iba>Pagseselos sa kaibigan+Panlalait sa kapwa<Pagbaba ng pakikipag-ugnayan",
"Alin sa mga sumusunod ang palatandaan ng intelektwal na pag-unlad?=Pagkahilig sa pagbabasa upang matuto>Pagkahilig sa palakasan o isports+Hindi pagpapahayag ng sariling pananaw<Pag-iwas sa mga tanong",
"Ano ang dapat mong gawin kung may mag-alok sa iyong sumama sa isang masamang gawain?=Tumanggi agad at sabihin ito sa magulang>Sumama pero mag-ingat+Tumulong nang hindi sumasama<Humingi ng panahon para makapagdesisyon",
"Ano ang ibig sabihin ng pagpapahalaga sa pakikipag-ugnayan?=Pagkakaroon ng mabuting relasyon sa kapwa>Pag-aangat ng sarili sa ibang tao+Pagsasarili sa lahat ng bagay<Paglalaan ng pera para sa mga kaibigan",
"Ano ang ibig sabihin ng pagiging independyente?=Pagkakaroon ng kakayahang magpasya nang may gabay>Pagiging palaasa sa kapwa+Kawalan ng pakialam sa mundo<Pagiging mapag-isa palagi",
"Bakit mahalaga ang pagtanggap ng pananagutan habang lumalaki tayo?=Para matutong maging responsable>Para makaiwas sa parusa+Para mapuri ng ibang tao<Para maiangat ang sarili sa iba",
"Alin sa mga sumusunod ang moral na pagbabago?=Paglalim ng pag-unawa sa tama at mali>Pagpapalit-palit ng nararamdaman+Pagiging mas uhaw sa kaalaman<Paglaki at paglakas ng katawan",
"Alin sa mga sumusunod ang espiritwal na pagbabago?=Paglalim ng pananampalataya sa Diyos>Pagiging mas masunurin sa batas+Pagbabago ng hugis ng katawan<Pagiging mas emosyonal",
"Alin sa mga sumusunod ang epekto ng positibong pananaw sa sarili?=Mas mataas na tiwala sa sarili>Pagiging mas tahimik+Pagtatago ng tunay na nararamdaman<Pag-iwas sa ibang tao",
"Alin sa mga sumusunod ang nagpapakita ng disiplina?=Pagtulong sa mga gawaing-bahay>Paglalaro buong araw+Paglilibang sa social media<Pamamasyal kasama ang mga kaibigan",
"Paano mo mapapangalagaan ang iyong sarili habang nakararanas ka ng mga pagbabago?=Sa pamamagitan ng pagkain ng masusustansyang lutuin>Sa pamamagitan ng madalas na pamamasyal+Sa pamamagitan ng pagtulog buong araw<Sa pamamagitan ng pag-iwas sa ibang tao",
"Anong papel ang ginagampanan ng iyong pamilya sa panahon ng iyong pagbabago?=Pagbibigay ng suporta at gabay>Pagmamadali ng iyong pagbabago+Pagpigil sa iyong pagbabago<Pagbabalewala sa iyong pagbabago",
"Alin sa mga sumusunod ang magandang paraan ng pagpapalakas ng tiwala sa sarili?=Pagtanggap sa sariling kakayahan at limitasyon>Paghanga sa sarili kahit mali+Paninisi ng limitasyon sa iba<Paggaya sa ibang tao",
"Bakit mahalaga ang kakayahang gumawa ng tamang desisyon?=Para mapabuti ang kinabukasan>Para matutong magpalusot sa mga pagkakamali+Para matutong umiwas sa mga responsibilidad<Para makakuha ng papuri mula sa iba",
"Ano ang dapat mong gawin kung may kaibigan kang nalulungkot?=Pakinggan siya at bigyan ng payo>Iwasan siya+Pagtawanan siya<Pagalitan siya",
"Ano ang dapat mong gawin kapag may nararamdaman kang pagbabago sa sarili?=Makipag-usap sa isang taong pinagkakatiwalaan tungkol dito>Ipagkaila ito sa iba+Pigilan ito sa abot ng makakaya<Iwasan ang lahat ng tao",

);

?>

</head>

</bod

</html>