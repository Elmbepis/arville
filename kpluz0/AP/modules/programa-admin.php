<html>
<head>
<body>

<?php
$_SESSION['title']="Mga Programa ng mga Iba't Ibang Administrasyon";

$questions=array(

"Alin sa mga sumusunod ang itinayo ni Ferdinand Marcos sa ilang lalawigan upang mapagtayuan ng mga pabrika ng iba't ibang kumpanyang makapagbibigay ng trabaho sa mga Pilipino?=Export Processing Zones>Provincial Economic Zones+Expo Filipino<Export Processing Zone Authority",
"Sino sa mga sumusunod ang pangulong nagpatupad ng paggamit ng 'miracle rice' na kayang magbunga ng mahigit 100 kaban ng palay sa bawat ektarya ng lupa?=Ferdinand Marcos>Fidel Ramos+Joseph Estrada<Gloria Macapagal Arroyo",
"Alin sa mga sumusunod ang ipinatupad ni Pang. Marcos upang mabigyan ang mga manggagawang Pilipino ng karapatang maging regular o permanente sa kanilang pinapasukang kompanya pagkaraan ng anim na buwang pagtatrabaho?=No Contractualization Law>13th Month Pay Law+Masagana 99<Rebolusyong Berde",
"Ang ____ ay isang programang pang-agrikulturang ipinatupad ni Pangulong Ferdinand Marcos upang mapataas ang produksyon ng bigas ng mga magsasakang Pilipino.=Masagana 99>Rebolusyong Lunti+13th Month Pay Law<No Contractualization Law",
"Sino sa mga sumusunod ang pangulong nagpatupad ng 'Rebolusyong Lunti' upang hikayatin ang mga mamamayang Pilipinong magtanim ng mga gulay at prutas sa kanilang mga bakuran?=Ferdinand Marcos>Fidel Ramos+Joseph Estrada<Gloria Macapagal Arroyo",
"Sa bisa ng ____, na inaprubahan ni Pangulong Cory Aquino, naging libre ang pag-aaral sa lahat ng pampublikong paaralan sa elementarya at mataas na paaralan sa buong bansa.=Republic Act 6655 of 1988>Republic Act 6715 of 1989+Presidential Decree No. 851<Presidential Decree No. 2021",
"Alin sa mga sumusunod ang itinatag ni Pangulong Corazon Aquino upang mabawi ang mga yaman ng bansa na ninakaw ng pamilyang Marcos?=Presidential Commission on Good Government>Comprehensive Agrarian Reform Program+Department of Social Welfare and Development<Export Processing Zone Authority",
"Alin sa mga sumusunod na batas ang naipasa sa ilalim ng administrasyon ni Pangulong Noynoy Aquino at nagbigay ng bagong estruktura sa ipinapataw na buwis sa mga produktong tulad ng alkohol at tabako?=Sin Tax Reform Act>Enhanced Basic Education Act+Anti-Enforced or Involuntary Disappearance Act<Domestic Workers Act",
"Sino sa mga sumusunod ang nagpatupad ng programang 'Out-of-School Youth' upang mabigyan ng pagkakataong magkaroon ng trabaho ang mga kabataang hindi nag-aaral?=Gloria Macapagal-Arroyo>Corazon Aquino+Joseph Estrada<Fidel Ramos",
"Ang 'Ahon Pamilyang Pilipino Program' na naglalayong pabutihin ang mga buhay ng mga mahihirap at dehado sa buhay ay isa sa mga programa ni ____ noong sya ay pangulo.=Gloria Macapagal-Arroyo>Ferdinand E. Marcos+Corazon Aquino<Fidel Ramos",
"Sino sa mga sumusunod ang pangulong nagpatupad ng Pantawid Pamilyang Pilipino Program (4Ps) na nagbibigay ng salapi sa mga pinakamahihirap na pamilya kapalit ng pagganap ng ilang tungkulin?=Gloria Macapagal-Arroyo>Fidel Ramos+Joseph Estrada<Corazon Aquino",
"Sino sa mga sumusunod ang pangulong nagpatupad ng Medium Term Philippine Development Program na nagsilbing gabay ng pamahalaan sa pagpapalago ng ekonomiya ng Pilipinas sa loob ng anim na taon?=Gloria Macapagal-Arroyo>Fidel Ramos+Joseph Estrada<Noynoy Aquino",
"Sa ilalim ng kaninong administrasyon naisabatas ang kontrobersyal na 'Expanded Value Added Tax Law' na nagsilbing 'centerpiece' ng kanyang 'Economic Reform Agenda'?=Gloria Macapagal-Arroyo>Rodrigo R. Duterte+Noynoy Aquino<Joseph Estrada",
"Sa ilalim ng aling programa ni Pangulong Joseph Estrada naipatayo ang mga 'rolling stores' na nagbebenta ng mas murang bigas, asukal, at iba pang pangunahing pangangailangan ng mga tao?=Enhanced Retail Access for The Poor>Ahon Pamilyang Pilipino Program+Asset Privatization Trust<Angat Pinoy 2004",
"Sino sa mga sumusunod ang pangulong nagpalawak ng sakop ng 'Comprehensive Agrarian Reform Program' para sa mga magsasakang walang lupain?=Joseph Estrada>Rodrigo R. Duterte+Fidel Ramos<Gloria Macapagal-Arroyo",
"Anong programa ang ipinatupad ni Pangulong Joseph Estrada upang matugunan ang mga pangunahing pangangailangan ng mga mamamayan tulad ng edukasyon, kalusugan, at seguridad?=Angat Pinoy 2004>Enhanced Retail Access for The Poor+Asset Privatization Trust<Ahon Pamilyang Pilipino Program",
"Inilunsad ang National Anti-poverty Commission na tumututok sa mga batayang pangangailangan ng mga mahihirap tulad ng pabahay, kalusugan, edukasyon, at trabaho sa ilalim ng administrasyon ni Pangulong ____.=Joseph Estrada>Corazon Aquino+Rodrigo R. Duterte<Fidel Ramos",
"Ipinagpatuloy ni Pangulong Estrada ang 'Asset Privatization Trust' na nasimulan noong 1986 sa administrasyon ni Pangulong ____ kung saan ang mga kompanyang nasa pamamalakad ng gobyerno ay ipinagbili upang makaipon ng pera para sa pangangailangan ng bansa.=Corazon Aquino>Gloria Macapagal-Arroyo+Fidel Ramos<Ferdinand Marcos",
"Ang 'Magna Carta of the Poor' o 'Republic Act 11291' na patakaran para sa pag-aangat ng pamumuhay ng mga mahihirap ay nilagdaan ni Pangulong ____.=Rodrigo R. Duterte>Noynoy Aquino+Gloria Macapagal-Arroyo<Joseph Estrada",
"Sino sa mga sumusunod ang pangulong nagpatupad ng programang 'Philippines 2000' na naglalayong gawing isang 'newly-industrialized country (NIC)' ang Pilipinas sa taong 2000?=Fidel Ramos>Corazon Aquino+Joseph Estrada<Ferdinand Marcos",
"Ang ____ ay itinatag ni Pangulong Fidel Ramos upang makamit ang pambansang pagkakaisa sa pamamagitan ng pakikipagkasundo sa mga kalaban ng pamahalaan tulad ng mga rebeldeng sundalo at mga miyembro ng NPA at MILF.=National Unification Commission>Medium Term Philippine Development Program+Asset Privatization Trust<Comprehensive Agrarian Reform Program",
"Sino sa mga sumusunod ang pangulong nagpatupad ng Oplan Alis Disease upang malutas ang suliranin ng bansa sa polio at iba pang mga sakit sa pamamagitan ng malawakang pagbabakuna?=Fidel Ramos>Ferdinand Marcos+Joseph Estrada<Corazon Aquino",
"Ang Ortigas flyover sa panulukan ng Ortigas Avenue at EDSA ay itinayo sa ilalim ng administrasyon ni Pangulong ____.=Corazon Aquino>Ferdinand Marcos+Joseph Estrada<Fidel Ramos",
"Ang South Luzon Expressway o SLEX ay itinayo sa ilalim ng administrasyon ni Pangulong ____.=Ferdinand Marcos>Corazon Aquino+Joseph Estrada<Fidel Ramos",
"Ang Magallanes Interchange ay itinayo sa ilalim ng administrasyon ni Pangulong ____.=Ferdinand Marcos>Corazon Aquino+Joseph Estrada<Fidel Ramos",
"Ang unang Manila Light Rail Transit System or LRT 1 ay itinayo sa ilalim ng administrasyon ni Pangulong ____.=Ferdinand Marcos>Corazon Aquino+Joseph Estrada<Fidel Ramos",
"Ang unang Metro Manila Skyway ay ipinatayo ng administrasyon ni Pangulong ____ ngunit nabuksan lamang ito sa mga motorista noong 1999.=Fidel Ramos>Corazon Aquino+Joseph Estrada<Ferdinand Marcos",

);
?>

</head>

</body>

</html>