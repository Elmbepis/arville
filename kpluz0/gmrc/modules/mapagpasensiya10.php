<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasensiya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasensiya";
$_SESSION['tnum']="*a2";

$questions=array(

"Alin sa mga sumusunod ang kahulugan ng pagiging mapagpasensiya sa impormasyon?=Pagtitimbang kung totoo ang impormasyon bago kumilos o magpasya batay dito>Pagtanggi sa lahat ng impormasyong natatanggap+Pagtitiyagang basahin at himayin lahat ng mga impormasyong natatanggap<Paniniwala sa lahat ng impormasyong natatanggap kahit sa mga kahina-hinala",
"Alin sa mga sumusunod ang hindi kabilang sa limang pamantayan ng CRAAP Test?=Kahabaan>Kapanahunan+Kaugnayan<Layunin",
"Alin sa mga sumusunod ang hindi kabilang sa limang pamantayan ng CRAAP Test?=Pagkabukod-tangi>Awtoridad+Katumpakan<Layunin",
"Alin sa mga sumusunod ang hindi kabilang sa limang pamantayan ng CRAAP Test?=Popularidad>Awtoridad+Kapanahunan<Kaugnayan",
"Alin sa mga sumusunod ang hindi kabilang sa limang pamantayan ng CRAAP Test?=Katarungan>Kaugnayan+Katumpakan<Layunin",
"Ano ang dapat mong gawin kung hindi ka sigurado sa katotohanan ng isang balita?=Huwag itong i-share>I-share pa rin dahil baka totoo naman+Gawing kapani-paniwala ang pananalita bago i-share<I-share pero lagyan ng tandang pananong sa dulo",
"Alin sa mga sumusunod ang kahulugan ng 'confirmation bias'?=Tendensyang maniwala lamang sa impormasyong naaayon sa iyong umiiral na paniniwala>Ugaling suriin muna nang husto ang impormasyon bago paniwalaan+Tendensyang hindi maniwala sa impormasyong taliwas sa iyong umiiral na paniniwala<Ugaling makinig sa lahat ng panig bago maniwala o magdesisyon",
"Alin sa mga sumusunod ang kahulugan ng 'disconfirmation bias'?=Tendensyang hindi maniwala sa impormasyong taliwas sa iyong umiiral na paniniwala>Ugaling suriin muna nang husto ang impormasyon bago paniwalaan+Tendensyang maniwala sa impormasyong naaayon sa iyong umiiral na paniniwala<Ugaling makinig sa lahat ng panig bago maniwala o magdesisyon",
"Ang pagtatanong muna sa sarili kung makakasama ba o makakabuti ang impormasyon bago ito i-'like' o i-'share' ay halimbawa ng alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Iwasan ang agarang pagre-react>Alamin ang source ng impormasyon+Gamitin ang CRAAP Test<Huwag maging biased",
"Ang pagtatanong muna sa sarili kung mapagkakatiwalaan ba ang pinagmulan ng impormasyon bago ito i-'like' o i-'share' ay halimbawa ng alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Alamin ang source ng impormasyon>Iwasan ang agarang pagre-react+Gamitin ang CRAAP Test<Huwag maging biased",
"Ang paniniwala lamang sa mga impormasyong naaayon sa iyong paniniwala ay paglabag sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Huwag maging biased>Iwasan ang agarang pagre-react+Gamitin ang CRAAP Test<Alamin ang source ng impormasyon",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang tumutukoy sa pagsusuri ng impormasyon batay sa limang pamantayan?=Gamitin ang CRAAP Test>Alamin ang source ng impormasyon+Iwasan ang agarang pagre-react<Huwag maging biased",
"Ang pagkakalat ng balitang hindi mo alam kung totoo o hindi ay paglabag sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Mag-verify bago mag-share>Humingi ng tawad kung kailangan+Huwag makisali sa echo chambers<Huwag maging biased",
"Ang pagiging bahagi ng isang grupong binubuo lamang ng mga taong may kaparehong paniniwala sa iyo ay paglabag sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Huwag makisali sa echo chambers>Humingi ng tawad kung kailangan+Mag-verify bago mag-share<Huwag maging biased",
"Ang agad na pang-iinsulto o pang-aaway sa isang taong pinaghihinalaan mong nag-post ng pekeng balita ay paglabag sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Magtanong nang magalang>Huwag makisali sa echo chambers+Mag-verify bago mag-share<Huwag maging biased",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang dapat mong sundin kung nakapagpasa ka ng maling impormasyon?=Humingi ng tawad kung kailangan>Mag-verify bago mag-share+Huwag makisali sa echo chambers<Huwag maging biased",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang tumutukoy sa isang proseso kung saan ipinapakita mo muna sa isang mapagkakatiwalaang kaibigan ang iyong sasabihin bago mo ito i-post?=Gamitin ang \"Think-Pair-Share\">Iwasan ang ALL CAPS+Mag-PM muna bago mag-comment<Magpaalam bago mag-tag",
"Para kang sumisigaw sa kausap mo kapag nilabag mo ang alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Iwasan ang ALL CAPS>Gamitin ang \"Think-Pair-Share\"+Mag-PM muna bago mag-comment<Magpaalam bago mag-tag",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang nagpapahiwatig na ang pampublikong pagtatama sa isang tao ay maaaring makapagpahiya sa kanya?=Mag-PM muna bago mag-comment>Iwasan ang ALL CAPS+Gamitin ang \"Think-Pair-Share\"<Magpaalam bago mag-tag",
"Ang basta-basta lamang na paggamit ng \"@everyone\" sa chat kahit ang sasabihin mo ay para lamang sa iilang tao ay paglabag sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Magpaalam bago mag-tag>Gamitin ang \"Think-Pair-Share\"+Mag-PM muna bago mag-comment<Iwasan ang ALL CAPS",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang dapat mong sundin kung ayaw mong makaabala sa inyong online class ang mga ingay sa inyong lugar?=Isiping mag-mute kapag hindi nagsasalita>Iwasan ang ALL CAPS+Iwasan ang voice bombing<Magpaalam bago mag-tag",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang nagsasabing maaaring nakakaperhuwisyo ka kung nagpapadala ka ng napakaraming sunud-sunod na recording ng tinig mo sa isang tao?=Iwasan ang voice bombing>Iwasan ang ALL CAPS+Isiping mag-mute kapag hindi nagsasalita<Magpaalam bago mag-tag",
"Ang paggamit ng mga akronim at emoji lamang sa pakikipag-chat ay paglabag sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Gumamit ng mga kumpletong pangungusap>Magpaalam bago mag-tag+Mag-PM muna bago mag-comment<Iwasan ang ALL CAPS",
"Ang pagtatapos ng isang diyalogo sa paraang sumasang-ayon kayo na hindi kayo sumasang-ayon ay tumutukoy sa alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media?=Igalang ang pananaw ng iba>Gumamit ng mga kumpletong pangungusap+Mag-PM muna bago mag-comment<Umamin kung hindi ka sigurado",
"Alin sa mga sumusunod na gabay sa wastong pakikipag-ugnayan sa social media ang nagpapahiwatig na masamang magpanggap na alam mo ang lahat?=Umamin kung hindi ka sigurado>Gumamit ng mga kumpletong pangungusap+Mag-PM muna bago mag-comment<Igalang ang pananaw ng iba",

);

?>

</head>

</body

</html>