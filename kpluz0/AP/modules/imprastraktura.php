<html>
<head>
<body>

<?php
$_SESSION['title']="Kahalagahan ng mga Imprastraktura sa mga Lalawigan";

$questions=array(

"Ang tulay na ipinapakita sa larawan ay mahalaga dahil ito ang nagdurugtong sa Samar at Leyte. Ano ang pangalan nito?=San Juanico Bridge>Osmeña Bridge+Ayala Bridge<Jones Bridge**AP/modules/qimages/san-juanico.jpg",
"Ang tanyag na monumentong ipinapakita sa larawan ang nagpapaalala sa atin sa makasaysayang pagbabalik ni General Douglas MacArthur noong WWII. Saan ito matatagpuan?=Leyte Landing Memorial Park>Simala Shrine+Fort San Pedro<Magellan Shrine**AP/modules/qimages/leyte-landing.jpg",
"Ang monumentong nasa larawan ang nagpapaalala sa atin sa makasaysayang labanang naganap sa pagitan ng mga Pilipino at Amerikano noong September 28, 1901. Ano ang panglan nito?=Balangiga Encounter Monument>Leyte Landing Memorial Park+Sultan Kudarat Monument<Dambana ng Kagitingan**AP/modules/qimages/monumento1.jpg",
"Ang ____ Dam ay isang konkretong imbakan ng tubig sa Bulacan na nagsu-suplay ng tubig sa Metro Manila at sa mga karatig probinsya nito.=Angat>Ambuklao+Aragon<Pantabangan",
"Alin sa mga sumusunod na 'dam' ang nagbibigay ng patubig sa humigit-kumulang na 28,000 ektaryang bukirin sa mga lalawigan ng Bulacan at Pampanga?=Angat>Ambuklao+Aragon<San Roque",
"Ang ____ Dam na matatagpuan sa lalawigan ng Benguet ay bahagi ng isang 'hydroelectric power plant' kaya nakagagawa ito ng kuryente para sa Luzon gamit ang enerhiya ng dumadaloy na tubig.=Ambuklao>Angat+Aragon<Pantabangan",
"Ang ____ Dam ay isang 'irrigation dam' sa Davao Oriental na nagbibigay ng irigasyon sa higit 1,600 ektaryang palayan sa labing-isang mga barangay ng Cateel.=Aragon>Angat+Ambuklao<Pantabangan",
"Ang ____ International Airport ay isang pandaigdigang paliparan sa pagitan ng Angeles at Mabalacat sa lalawigan ng Pampanga.=Clark>Ninoy Aquino+Laguindingan<Iloilo",
"Alin sa mga sumusunod ang tumutukoy sa daang may habang 14 kilometro na nagdurugtong sa Maynila at lalawigan ng Cavite?=CAVITEX>SCTEX+SLEX<NLEX",
"Ang pagpapatayo ng SCTEX ay naglalayong magbigay ng mas mahusay na sistema ng mga lansangan sa Subic, ____, at Tarlac.=Clark>Cavite+Cebu<Cagayan",
"Ang ____ Dam na matatagpuan sa Nueva Ecija ay nagbibigay ng irigasyon sa mga palayan, gumagawa ng kuryente mula sa enerhiya ng dumadaloy na tubig ('hydroelectric power'), at nakatutulong sa pagkontrol ng baha.=Pantabangan>Angat+Ambuklao<Aragon",
"Ang pagtatayo ng mga '____' sa iba't ibang lalawigan ay naglalayong mabigyan ang mga magsasaka ng paraang madala ang kanilang mga produkto sa mga sentro ng merkado sa kanilang pook.=farm-to-market roads>expressways+flyovers<fish ports",
"Alin sa mga sumusunod ang pinakamahabang tulay sa Pilipinas na ipinatayo ni Pangulong Ferdinand Marcos noong 1969 at binuksan sa publiko noong 1973?=San Juanico Bridge>Ayala Bridge+Jones Bridge<Osmeña Bridge",
"Ang TPLEX o Tarlac-____-La Union Expresswayay ay isang apat-na-linyang 'expressway' na nagdurugtong sa Gitnang Luzon at Rehiyon ng Ilocos.=Pangasinan>Pampanga+Palawan<Pasay",
"Ang ____ ay ang 'expressway' na nagdurugtong ng Kalakhang Maynila, Laguna, Cavite, at Batangas.=SLEX>NLEX+SCTEX<TPLEX",
"Ang ____ ay ang 'expressway' na nagdurugtong ng Kalakhang Maynila, Bulacan, at Pampanga.=NLEX>SLEX+SCTEX<TPLEX",
"Ang ____ Fish Port Complex ay isa sa mga pangunahing sentro ng pangangalakal ng isda at pagproseso ng mga produktong dagat sa Rehiyon VI.=Iloilo>Davao+General Santos<Zamboanga",
"Ang pagtatatag ng ____ Fish Port Complex ay nagbigay sa rehiyon ng Kanlurang Mindanao ng sistematikong pamimili at distribusyon ng mga isda at produktong dagat.=Zamboanga>Davao+Navotas<Iloilo",
"Ang ____ Fish Port Complex na matatagpuan sa Kalakhang Maynila ang pangunahing sentro ng pangangalakal ng isda sa Pilipinas.=Navotas>Davao+Iloilo<Malabon",
"Alin sa mga sumusunod ang monumento sa Bundok Samat na itinayo upang magbigay-pugay sa lahat ng mga sundalong nagbuwis ng buhay para sa kalayaan noong panahon ng pananakop ng mga Hapones?=Dambana ng Kagitingan>Leyte Landing Memorial Park+Sultan Kudarat Monument<Sandugo Shrine**AP/modules/qimages/monumento2.jpg",
"Ang ____ Bridge, na pinakamahabang tulay na pang-ilog sa Pilipinas, ay tumatawid ng Ilog Cagayan upang pagdugtungin ang Tuguegarao at Cagayan.=Buntun>San Juanico+Marcelo Fernan<Magapit**AP/modules/qimages/tulay1.jpg",
"Ang ____ Dam sa Pangasinan ay isa sa pinakamalalaking dam sa Asya na nagsisilbing pangunahing pinagkukunan ng kuryente at patubig sa Hilagang Luzon.=San Roque>Ambuklao+Angat<Binga",
"Ang ____ ay ang pangunahing pandaigdigang paliparan ng Pilipinas na matatagpuan sa Pasay at Paranaque.=NAIA>Clark+Mactan<Davao",
"Ang ____ ay isang mahalagang lansangan sa Metro Manila na nagsisilbing pangunahing ruta ng mga sasakyan mula Caloocan hanggang Pasay.=EDSA>Roxas Boulevard+Quezon Avenue<Ayala Avenue",
"Ang ____ Bridge na matatagpuan sa Lal-lo, Cagayan ay isa sa mga pangunahing tulay na tumatawid sa Ilog Cagayan.=Magapit>Buntun+Jones<San Juanico",
"Ang ____ ay isang nakaangat na daanan sa Metro Manila na tumutulong sa pagpapabilis ng pagbiyahe mula sa mga karatig-lalawigan ng Rehiyon IV-A papasok sa Kalakhang Maynila.=Skyway>EDSA+Roxas Boulevard<Quezon Avenue",

);
?>

</head>

</body>

</html>