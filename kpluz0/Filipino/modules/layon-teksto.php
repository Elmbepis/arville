<html>
<head>
<body>

<?php
$_SESSION['title']="Pagsusuri ng Layon ng Teksto";
 
$questions=array(

"Alin sa mga sumusunod ang pangunahing layunin ng isang anekdota?=Magkuwento ng karanasan>Magturo ng aral+Magbigay ng impormasyon<Manghikayat ng aksyon",
"Alin sa mga sumusunod ang layunin ng kuwentong-bayan?=Magbigay ng aliw at aral>Maglahad ng katotohanan tungkol sa isang paksa+Magpakilala ng isang produkto<Maglahad ng karanasan",
"Alin sa mga sumusunod ang layunin ng talaarawan?=Maglahad ng sariling damdamin at karanasan>Magbigay ng impormasyon tungkol sa kasaysayan+Maglahad ng mga balita<Magturo ng aral",
"Alin sa mga sumusunod ang layunin ng tulang pambata?=Magbigay ng aliw at magturo>Magpaliwanag ng isang pangyayari+Manghikayat ng suporta<Maglahad ng kasaysayan",
"Alin sa mga sumusunod ang pangunahing layunin ng isang talambuhay?=Maglahad ng kasaysayan ng isang tao>Maglahad ng mga balita+Magbigay ng aliw<Manghikayat ng aksyon",
"Alin sa mga sumusunod ang pangunahing layunin ng isang kuwentong-bayan?=Maglahad ng tradisyonal na paniniwala>Manawagan sa pagbabago+Magpaliwanag sa isang paksa<Maglahad ng balita",
"Alin sa mga sumusunod ang layunin ng kuwentong-bayan?=Maglahad ng mga aral mula sa mga tradisyon>Maglahad ng kasaysayan ng isang tao+Magbigay ng balita<Magsulong ng sariling pananaw",
"Alin sa mga sumusunod ang layunin ng pagsulat ng talambuhay?=Magsalaysay ng mga pinagdaanan ng isang tao>Magbigay ng impormasyon tungkol sa kasaysayan+Manghikayat ng suporta tungkol sa isang isyu<Magbigay ng sariling pananaw",
"Alin sa mga sumusunod ang karaniwang layunin ng tulang pambata?=Maghatid ng simpleng aral>Maglahad ng naganap sa kasaysayan+Manghikayat ng aksyon<Magbigay ng opinyon",
"\"Noong ako'y limang taong gulang, nahulog ako mula sa puno ng mangga. Sa kabutihang palad, wala akong pilay, ngunit natutunan kong maging mas maingat sa pag-akyat...\"
Ano ang layunin ng buong tekstong pinagkunan nito?=Magsalaysay ng karanasan>Maglahad ng kasaysayan+Magbigay ng opinyon<Magdala ng balita",
"\"Madalas kaming pumunta sa bahay ng aming lola tuwing Sabado. Marami siyang kuwento tungkol sa kanyang kabataan na nagbibigay sa amin ng inspirasyon at saya...\"
Ano ang layunin ng buong tekstong pinagkunan nito?=Magsalaysay ng karanasan>Maglahad ng kasaysayan+Magbigay ng opinyon<Magbigay ng aral",
"\"Noong Disyembre 15, pumunta kami sa parke para magdiwang ng Pasko. Masaya kaming naglaro, kumain, at nagbigay ng mga regalo...\"
Ano ang layunin ng buong tekstong pinagkunan nito?=Magsalaysay ng karanasan>Maglahad ng kasaysayan+Magbigay ng opinyon<Magbigay ng aral",
"\"Si Lola Basyang ay isang kilalang manunulat ng mga kuwentong pambata. Ang kanyang mga kuwento ay may aral at karaniwang nagsisimula sa mga salitang, 'Noong unang panahon....'\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Talambuhay>Kuwentong-bayan+Autobiograpiya<Talaarawan",
"\"Noong unang panahon, may isang prinsesang nagngangalang Maria. Siya ay matapang, matalino, at nagligtas ng kanyang kaharian mula sa mga kaaway...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Kuwentong-bayan>Autobiograpiya+Anekdota<Talaarawan",
"\"Noong bata ako, madalas akong mangolekta ng mga bato tuwing bakasyon. Isa itong simpleng libangang nagbigay sa akin ng isang nakakatawang karanasan...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Anekdota>Tulang pambata+Kuwentong-bayan<Talaarawan",
"\"Napakasaya ko ngayong araw dahil natapos ko na rin sa wakas ang isang proyekto sa paaralan na matagal ko nang inaasikaso...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Talaarawan>Tulang pambata+Kuwentong-bayan<Talambuhay",
"\"Kinilig ako kaninang umaga dahil ngumiti sa akin si Myla...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Talaarawan>Tulang pambata+Kuwentong-bayan<Talambuhay",
"\"Si Andres Bonifacio ay ipinanganak noong 1863 at kinikilala bilang 'Ama ng Himagsikang Pilipino'. Siya ang nagtatag ng Katipunan at nagbigay ng lakas ng loob sa mga Pilipino na lumaban para sa kalayaan...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Talambuhay>Tulang pambata+Kuwentong-bayan<Autobiograpiya",
"\"Si Juan ay isang mabuting bata at ulirang anak, kaya marami ang nagulat sa nangyari sa kanya...\"
Ano ang layunin ng buong tekstong pinagkunan nito?=Magsalaysay ng kuwento>Maglahad ng sariling karanasan+Magbigay ng opinyon<Maglahad ng kasaysayan",
"\"Matumal ang pagpasok ng mga tao sa aming tindahan kanina kaya maliit lamang ang aming kinita ngayong araw...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Talaarawan>Tulang pambata+Kuwentong-bayan<Talambuhay",
"\"Noong unang panahon, ang daigdig ay isang malawak na karagatan. Wala pang mga lupa at bundok. Isang araw, lumabas mula sa isang kawayan sina Malakas at Maganda...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Kuwentong-bayan>Talambuhay+Anekdota<Talaarawan",
"\"Kinabukasan, napansin ng ina ni Pina ang isang halamang tumubo sa kanilang bakuran. Ito ay may mga prutas na maraming mata - na kalaunan ay tinawag na 'pinya'...\"
Ano ang layunin ng buong tekstong pinagkunan nito?=Magsalaysay ng alamat>Maglahad ng sariling karanasan+Magbigay ng opinyon<Maglahad ng kasaysayan",
"\"Hindi ko malilimutan ang araw na iyon - noong ako'y itinalaga bilang pinuno ng hukbo. Nakaramdam ako ng matinding takot at pangamba, ngunit pinilit kong maging matatag para sa kalayaan ng aking bayan...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Autobiograpiya>Kuwentong-bayan+Talambuhay<Talaarawan",
"\"Ang mga akda ko noon ay puno ng pangarap at pag-asa. Hindi ko akalaing ang simpleng libangan kong iyon ay magiging daan upang makilala ako bilang manunulat balang araw...\"
Anong uri ng teksto ang malamang na pinagkunan nito?=Autobiograpiya>Kuwentong-bayan+Talambuhay<Talaarawan",
"\"Si Rizal ay naglakbay sa iba't ibang bansa upang matuto at makibahagi sa mga diskusyon tungkol sa kalayaan at pagbabago...\"
Ano ang layunin ng buong tekstong pinagkunan nito?=Magbigay ng impormasyon>Maglahad ng sariling karanasan+Magbigay ng opinyon<Magsalaysay ng alamat",

);

?>

</head>

</body>

</html>