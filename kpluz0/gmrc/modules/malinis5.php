<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Malinis - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Malinis";
$_SESSION['tnum']="*5a";

$questions=array(

"Ano ang pangunahing dahilan kung bakit kailangang panatilihing malinis ang ating tahanan?=Upang maging ligtas ito sa sakit>Upang maging maganda ito+Upang maging maaliwalas ito<Upang maging masaya ang pamilya",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan sa ating tahanan ang tumutukoy sa paghihiwalay ng nabubulok sa di-nabubulok upang maisagawa ang pagreresaykel?=Wastong pagtatapon ng basura>Paglilinis ng sariling silid+Paglilinis ng banyo at kusina<Pag-aayos ng mga muwebles",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan sa ating tahanan ang ginagawa natin upang maiwasan ang pamumugad ng mikrobyo sa mga lugar kung saan tayo nagluluto o naliligo?=Paglilinis ng banyo at kusina>Wastong pagtatapon ng basura+Paglilinis ng sariling silid<Pag-aayos ng mga muwebles",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan sa ating tahanan ang tumutukoy sa pag-oorganisa ng mga upuan, mesa, at aparador para maging ligtas at maaliwalas ang paligid?=Pag-aayos ng mga muwebles>Paglilinis ng sariling silid+Paglilinis ng banyo at kusina<Wastong pagtatapon ng basura",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan sa ating tahanan ang tumutukoy sa pagliligpit ng mga nakakalat na bagay sa wastong lagayan ng mga ito?=Pag-aayos ng mga kagamitan>Paglilinis ng hardin o bakuran+Pagtuturo sa mga bata<Wastong pagtatapon ng basura",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan sa ating tahanan ang tumutukoy sa pagwawalis ng mga tuyong dahon sa labas at pagtatanggal ng mga kalat sa paligid ng mga halaman?=Paglilinis ng hardin o bakuran>Pag-aayos ng mga kagamitan+Pagtuturo sa mga bata<Wastong pagtatapon ng basura",
"Alin sa mga sumusunod ang isa sa mga hakbang ng tamang pagtatapon ng basura?=Paghihiwalay ng nabubulok at di-nabubulok na basura>Pagtatapon ng basura sa ilog+Pagsusunog ng basura sa bakuran<Pag-iiwan ng basura sa gilid ng kalye",
"Ano ang dapat gawin sa mga lumang gamit na wala nang pakinabang?=Iresaykel o ipamigay>Itapon agad+Itago sa ilalim ng kama<Ikalat sa labas",
"Ano ang dapat gawin sa mga pinggan at kubyertos pagkatapos kumain?=Hugasan, tuyuin, at itabi>Iwanan sa ibabaw ng mesa+Itapon sa basurahan<Itago agad sa kabinet",
"Paano matututo ang mga batang magpanatili ng kalinisan ng tahanan?=Sanayin silang magligpit ng mga gamit araw-araw>Hayaan silang maglaro sa marumi+Pagalitan sila kahit tumutulong sila sa paglilinis<Takutin sila kapag ayaw nilang maglinis",
"Ano ang unang hakbang sa paglilinis ng kuwarto?=Iligpit ang mga kalat>Walisin ang sahig+Pakintabin ang sahig<Punasan ang mga muwebles",
"Bakit mahalaga ang paglilinis at pagpapanatiling tuyo ng bakuran?=Upang maiwasan ang pagdami ng mga lamok>Upang gumanda ang tanawin+Para humanga ang kapitbahay<Para madaling maglaro",
"Alin sa mga sumusunod ang hindi isa sa mga hakbang ng tamang paglilinis ng hardin?=Putulin ang mga sanga ng puno>Tanggalin ang mga tuyong dahon+Walisin ang mga kalat<Diligan ang mga tanim",
"Ano ang kadalasang epekto ng maruming kapaligiran?=Pagkakasakit>Malusog na katawan+Masayang pamumuhay<Magandang tanawin",
"Paano mo maipapakita ang pagiging malinis sa sarili?=Paliligo at pagpapalit ng damit araw-araw>Paglilinis sa paaralan araw-araw+Paglilinis ng tahanan araw-araw<Pag-aaral nang mabuti araw-araw",
"Ano ang dapat gawin kapag may natapong pagkain sa sahig?=Dakutin at punasan ito agad>Hayaan itong matuyo+Takpan ito ng papel<Sipain ito sa ilalim ng mesa",
"Alin sa mga sumusunod ang hindi dapat natin gawin sa loob ng silid-aralan?=Magtapon ng basura kahit saan>Magwalis+Magpunas ng mesa<Mag-ayos ng mga upuan",
"Ano ang pangunahing dahilan kung bakit kailangang panatilihing malinis ang ating paaralan?=Upang maiwasan ang mga sakit>Para maging maganda ito sa paningin+Upang matuwa ang mga guro<Upang humanga ang mga bisita",
"Alin sa mga sumusunod ang dapat mong gawin bago ka kumain?=Maghugas ng mga kamay>Maglaro sa labas+Uminom ng sopdrink<Kumain ng kendi",
"Alin sa mga sumusunod ang walang kaugnayan sa kalinisan sa sarili?=Pag-aaral nang mabuti>Paliligo araw-araw+Pagsisipilyo at pagsusuklay<Pagsusuot ng malinis na damit",
"Alin sa mga sumusunod ang basurang maaaring iresaykel?=Basurang di-nabubulok tulad ng plastik, bakal, at papel>Mga tirang pagkain+Mga balat ng prutas<Mga lumang tinapay",
"Ano ang dapat mong gawin kung makita mo ang iyong kaklaseng nagtatapon ng basura sa sahig?=Paalalahanan siyang magtapon sa tamang lugar>Awayin siya+Pabayaan lang siya<Gumaya sa kanya",
"Alin sa mga sumusunod ang malamang na mangyari kung maraming kalat sa bahay?=Magkakaroon ng aksidente>Mas dadali ang paghahanap ng mga gamit sa bahay+Mawawala ang mga daga at insekto<Magiging maganda sa paningin ang loob ng bahay",
"Anong ugali ang nahuhubog sa pagtuturo ng kalinisan sa nakababatang kapatid?=Pagiging responsable>Pagiging makasarili+Pagiging mahabagin<Pagiging mapagmalaki",
"Alin sa mga sumusunod ang halimbawa ng pagreresiklo?=Paggawa ng laruan mula sa sirang tsinelas>Pagpapahakot ng basura sa mga basurero+Paggawa ng abono mula sa mga nabubulok na pagkain<Pagsusunog ng basura sa bakuran",
"Ano ang dapat mong gawin sa mga gamit na hindi mo na kailangan?=Ipamahagi sa mas nangangailangan>Itapon agad sa basurahan+Sunugin sa bakuran<Ihulog sa ilog",


);

?>

</head>

</bod

</html>