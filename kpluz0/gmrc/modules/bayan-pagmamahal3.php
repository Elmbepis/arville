<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagmamahal sa Bayan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagmamahal sa Bayan";
$_SESSION['tnum']="*3h";

$questions=array(

"Ano ang pangunahing layunin ng mga sagisag ng bansa tulad ng watawat at pambansang awit?=Ipakita ang ating pagkakakilanlan bilang Pilipino>Magbigay-aliw sa mga mamamayan+Magpasikat sa ibang bansa<Manghikayat ng pagtatayo ng mga negosyo",
"Alin sa mga sumusunod ang nagpapakita ng pagmamahal sa bayan?=Paggalang sa mga sagisag ng bansa>Pagbili ng mga produkto mula sa ibang bansa+Panonood ng mga pelikulang banyaga<Pamamasyal sa ibang bansa",
"Alin sa mga sumusunod ang hindi kabilang sa mga sagisag ng bansa?=Mga palengke>Watawat ng Pilipinas+Pambansang bayani<Lupang Hinirang",
"Alin sa mga sumusunod ang hindi mo dapat gawin habang inaawit mo ang \"Lupang Hinirang\"?=Pagsasalita ng malakas>Pagtayo nang tuwid+Paglalagay ng kanang kamay sa dibdib<Pag-awit nang buong puso",
"Bakit kailangang hikayatin natin ang kapwang igalang ang mga sagisag ng ating bansa?=Upang mapanatili ang diwa ng pagmamahal sa bayan>Para maiangat ang sarili sa iba+Upang mapuri ng guro<Para sumang-ayon ang lahat sa ating pananaw",
"Alin sa mga sumusunod ang hindi dapat gawin ninuman sa watawat ng Pilipinas?=Gawin itong biro>Igalang ito+Pag-ingatan ito<Unawain ang kahulugan nito",
"Ano ang ibig sabihin ng asul na kulay sa ating watawat?=Kapayapaan>Katapangan+Karangalan<Kaguluhan",
"Ano ang ibig sabihin ng mga kulay na dilaw at puti sa ating watawat?=Kalayaan>Katapatan+Katapangan<Kaligayahan",
"Alin sa mga sumusunod na kulay ng ating watawat ang sumisimbolo sa katapangan ng mga Pilipino?=Pula>Asul+Dilaw<Puti",
"Alin sa mga sumusunod ang malikhaing pagpapakita ng pagmamahal sa bayan?=Pagsulat ng tula tungkol sa pagmamalasakit sa ating bansa>Paggawa ng tula tungkol sa kagandahan ng ibang bansa+Panggagaya sa pananamit ng isang dayuhang artista<Pag-awit ng isang sikat na banyagang kanta",
"Alin sa mga sumusunod na kanta ang maituturing na makabayan?=Bayan Ko>Pasko Na Naman+Anak<Pusong Bato",
"Bakit mahalaga ang ating pambansang awit?=Ito ay sagisag ng ating bansa.>Ito ay masarap pakinggan.+Ito ay nakakaaliw sayawan.<Ito ay alam ng bawat bata.",
"Alin sa mga sumusunod ang isang paraan ng pagpapahayag ng pagmamahal sa bayan?=Paglahok sa mga makabayang pagdiriwang>Pagsali sa mga beauty contest+Paglahok sa mga talent contest<Pagsali sa mga cosplay",
"Ano ang layunin ng pagpapaliwanag natin sa ating kapwa ng kahulugan ng mga sagisag ng ating bansa?=Pagpapahalaga sa ating pinagmulan at pagkakakilanlan>Pagpapaunlad sa ekonomiya ng ating bansa+Pagmamalaki sa mga dayuhan<Pagpapababa ng krimen sa ating bansa",
"Paano natin maipapasa sa iba ang pagmamahal natin sa bayan?=Sa pamamagitan ng panghihikayat at pagpapaliwanag>Sa pamamagitan ng pananakot+Sa pamamagitan ng panlilinlang<Sa pamamagitan ng pagbabayad ng pera",
"Ano ang epekto sa mga Pilipino ng pagkaunawa sa kahalagahan ng mga sagisag ng ating bansa?=Mas matibay na pagkakaisa>Mas madalas na pagtatalo+Mas maraming paglabag sa batas<Mas maingay at magulong kapaligiran",
"Alin sa mga sumusunod ang maaari mong gawin sa bahay upang ipakita ang pagmamahal sa ating bansa?=Pag-awit ng makabayang kanta sa harap ng pamilya>Pagsasayaw ng Hiphop sa Tiktok+Panonood ng mga pelikula ng Hollywood<Pagkain ng hamburger at pizza",
"Alin sa mga sumusunod ang maaari mong gawin upang ipaliwanag ang kahalagahan ng watawat natin sa iba?=Paggawa ng poster tungkol sa kahulugan nito>Paggupit nito para gawing palamuti+Pagguhit nito gamit ang mga kulay na berde, lila, at kahel<Pagtupi nito sa pabirong paraan",
"Ano ang sinisimbolo ng araw sa ating watawat?=Kalayaan at liwanag>Kasaganahan at kayamanan+Katapangan<Kalinisan ng kalooban",
"Ano ang pangunahing layunin ng pakikilahok sa mga makabayang pagdiriwang?=Mapahalagahan ang kasaysayan ng bansa>Makapagsuot ng bagong damit+Makapagsaya kasama ang mga kaibigan<Makaiwas sa pagpasok sa klase",
"Alin sa mga sumusunod ang hindi dapat gawin ng batang mag-aaral para matulungan ang kapwang magmahal sa ating bansa?=Paglabag sa mga alituntunin>Pagtuturo sa kapwa ng pagmamahal sa bayan+Pagpapakita ng respeto sa mga simbolo ng ating bansa<Paggawa ng tula tungkol sa Pilipinas",
"Alin sa mga sumusunod ang hindi isa sa mga bunga ng pagpapahalaga natin sa mga sagisag ng ating bansa?=Pag-iinggitan>Kapayapaan+Kaunlaran<Pagkakaisa",
"Bakit hindi natin dapat gawing biro ang mga sagisag ng ating bansa?=Upang mapanatili ang respeto natin sa ating pagkakakilanlan>Para makapagmataas tayo sa ibang mga lahi+Upang ikahiya natin ang ating pagkakakilanlan<Para maghangad tayong mangibang-bayan",
"Bakit dapat tayong sumunod sa mga alituntunin ng paggalang sa mga sagisag ng ating bansa?=Para maipakita natin ang pagmamahal sa bayan>Para mapuri tayo ng guro+Para hindi tayo mapagalitan ng magulang<Para makapagpasikat tayo sa iba",
"Bakit kailangan nating magturo sa kapwa tungkol sa mga sagisag ng ating bansa?=Upang mahikayat silang magmahal sa ating bayan>Para makakuha tayo ng mataas na marka sa klase+Para makapagyabang tayo sa iba<Para mabigyan natin sila ng aliw",
 
);

?>

</head>

</bod

</html>