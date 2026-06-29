<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mabuting Katiwala - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mabuting Katiwala";
$_SESSION['tnum']="*95";

$questions=array(

"Alin sa mga sumusunod ang kahulugan ng salitang 'katiwala'?=Isang taong pinagkatiwalaan ng isang bagay upang pangalagaan ito>Isang taong nagmamay-ari ng isang bagay+Isang taong umaangkin sa isang bagay na hindi kanya<Isang taong gumagamit ng isang bagay nang walang pahintulot sa may-ari",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit hindi dapat natin sayangin o sirain ang mga likas na yaman?=Dahil nakakapagod ang pag-aaksaya at pagsisira ng mga likas na yaman>Dahil bawal ito sa batas+Para may pakinabangan pang mga likas na yaman ang susunod na henerasyon<Dahil ipinagkatiwala lamang ng Diyos ang mga ito sa tao",
"Alin sa mga sumusunod ang 'nonrenewable' o nauunbos na pinagkukunan ng enerhiya o kuryenteng ating ginagamit?=Fossil fuels>Malakas na hangin+Sinag ng araw<Umaagos na tubig",
"Sino sa mga sumusunod ang may tungkuling magbawas ng pagkonsumo ng mga likas na yaman?=Bawat tao>Ang mga nasa pamahalaan+Ang mga siyentipiko<Ang mga mayayaman",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit dapat mong bawasan ang iyong pagkonsumo ng mga produkto?=Pagpapakitang-tao lamang>Pagtitipid ng pera+Pagbabawas ng polusyon<Pagpapanatili ng balanse ng kalikasan",
"Gaano katagal bago mabulok ang isang ordinaryong plastik na bote?=450 taon>100 taon+50 taon<10 taon",
"Alin sa mga sumusunod ang pinakamabisang paraan ng patuturo sa nakababatang kapatid tungkol sa pagtitipid at pangangalaga ng kalikasan?=Pagiging mabuting halimbawa sa kanya>Paulit-ulit na pagsesermon sa kanya+Pagbibigay ng laruan sa kanya upang mapasunod siya<Pagpaparusa sa kanya tuwing siya ay nag-aaksaya",
"Saan mo dapat idikit ang mga paalala tungkol sa pagtitipid ng tubig at kuryente upang maging epektibo ang mga ito?=Sa tabi ng gripo at sa tabi ng switch ng ilaw>Sa loob ng isang kabinet+Sa isang pader ng bahay<Sa isang puno sa bakuran",
"Ano ang dapat mong gawin kapag may napansin kang tumutulong gripo sa inyong tahanan?=Iulat ito agad sa iyong mga magulang upang maipaayos>Hayaan lamang ito+Ayusin itong mag-isa kahit hindi mo alam kung paano<Kabitan ito ng permanenteng pansahod ng tulo",
"Ano ang pangunahing dahilan kung bakit dapat kang magbaon ng sariling lalagyan ng inuming tubig sa paaralan sa halip na bumili ka ng 'bottled water'?=Para hindi ka gumamit at magtapon ng bagong plastik na bote na umaabot ng 450 taon bago mabulok>Dahil masyadong mahal ang bottled water+Dahil mas masarap ang baong tubig<Dahil mas malamig ang baong tubig",
"Ang hindi patitira ng pagkain sa plato ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagkuha lamang ng iyong kayang ubusin>Pagtitipid ng tubig at kuryente+Pagbabawas sa paggamit ng papel<Pag-iwas sa mga bagay na isang beses lamang magagamit",
"Ang pagpapaayos ng mga tumutulong gripo ay saklaw ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagtitipid ng tubig at kuryente>Pagkuha lamang ng iyong kayang ubusin+Pagbabawas sa paggamit ng papel<Pag-iwas sa mga bagay na isang beses lamang magagamit",
"Ang pagpatay sa mga ilaw at appliance na hindi ginagamit ay saklaw ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagtitipid ng tubig at kuryente>Pagkuha lamang ng iyong kayang ubusin+Pagbabawas sa paggamit ng papel<Pag-iwas sa mga bagay na isang beses lamang magagamit",
"Ang pagsusulat sa magkabilang panig ng bond paper ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagbabawas sa paggamit ng papel>Pagkuha lamang ng iyong kayang ubusin+Pagtitipid ng tubig at kuryente<Pag-iwas sa mga bagay na isang beses lamang magagamit",
"Ang paggamit ng basong nahuhugasan sa halip ng paper cup ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pag-iwas sa mga bagay na isang beses lamang magagamit>Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo+Pagre-\"recycle\" ng patapong bagay<Pagre-\"reuse\" ng patapong bagay",
"Ang paggamit ng platong nahuhugasan sa halip ng paper plate ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pag-iwas sa mga bagay na isang beses lamang magagamit>Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo+Pagre-\"recycle\" ng patapong bagay<Pagre-\"reuse\" ng patapong bagay",
"Ang paggamit ng eco-bag sa halip ng plastik na supot ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pag-iwas sa mga bagay na isang beses lamang magagamit>Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo+Pagre-\"recycle\" ng patapong bagay<Pagre-\"reuse\" ng patapong bagay",
"Ang paggawa ng tsinelas mula sa lumang gulong ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagre-\"recycle\" ng patapong bagay>Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo+Pag-iwas sa mga bagay na isang beses lamang magagamit<Pagre-\"reuse\" ng patapong bagay",
"Ang paggamit ng lumang lata ng mantika bilang taniman ng halaman ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagre-\"reuse\" ng patapong bagay>Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo+Pag-iwas sa mga bagay na isang beses lamang magagamit<Pagre-\"recycle\" ng patapong bagay",
"Ang paglalakad o pagbibisikleta sa halip na magmaneho ng kotse ay halimbawa ng alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan?=Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo>Pagre-\"reuse\" ng patapong bagay+Pag-iwas sa mga bagay na isang beses lamang magagamit<Pagre-\"recycle\" ng patapong bagay",
"Alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan ang nakakatulong magpalakas ng diwa ng bayanihan para sa ikabubuti ng kapaligiran?=Paglahok sa mga sama-samang pagkilos para sa kalikasan>Pagkuha lamang ng iyong kayang ubusin+Pagre-\"reduce\" o pagbabawas ng sariling pagkonsumo<Pagtitipid ng tubig at kuryente",
"Alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan ang magagawa upang sanayin ang mga kasamang ugaliin ang pagtitipid ng tubig at kuryente?=Paglalagay ng mga paalala sa mga lugar na madalas gamitin>Paglahok sa mga sama-samang pagkilos para sa kalikasan+Pakikipagpalitan ng gamit<Pagbabahagi sa social media",
"Alin sa mga sumusunod na pagsasakilos ng pagiging mabuting katiwala ng kalikasan ang tumutukoy sa pagkukuwento online ng mga maliliit na hakbang na ginagawa mo para sa kalikasan?=Pagbabahagi sa social media>Paglahok sa mga sama-samang pagkilos para sa kalikasan+Paglalagay ng mga paalala sa mga lugar na madalas gamitin<Pakikipagpalitan ng gamit",
"Alin sa mga sumusunod na bunga ng pagiging mabuting katiwala ang tumutukoy sa katotohanang ang pagbabawas ng sariling pagkonsumo ay nakakapigil sa paglala ng polusyon?=Mas malinis at maayos na kapaligiran>Mas mababang gastusin+Paggalang mula sa iba<Magandang mundo para sa susunod na henerasyon",
"Alin sa mga sumusunod na bunga ng pagiging mabuting katiwala ang tumutukoy sa katotohanang ang pagbabawas ng ating pagkonsumo ng mga produkto ay magreresulta sa pagkakaroon ng ating mga anak at apo ng mga likas na yaman na kanilang mapapakinabangan?=Magandang mundo para sa susunod na henerasyon>Mas mababang gastusin+Paggalang mula sa iba<Mas malinis at maayos na kapaligiran",

);

?>

</head>

</body

</html>