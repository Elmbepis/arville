<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Maingat na Paghuhusga - GMRC in KPluz.com    </title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Maingat na Paghuhusga";
$_SESSION['tnum']="*80";

$questions=array(

"Ano ang unang hakbang sa tamang paghuhusga ng ating emosyon?=Pagkilala sa emosyon>Pagtukoy sa pisikal na reaksyon+Pag-unawa sa sanhi<Pagkilala sa epekto ng emosyon",
"Ang pagpansin kung pinagpapawisan ang ating mga kamay, bumibilis ang tibok ng ating puso, o nanghihina ang ating katawan ay nangyayari sa aling hakbang sa tamang paghuhusga ng ating emosyon?=Pagtukoy sa pisikal na reaksyon>Pagkilala sa emosyon+Pag-unawa sa sanhi<Pagkilala sa epekto ng emosyon",
"Ang pagsusuri at pagtukoy sa ugat o pinagmulan ng ating nararamdaman ay ginagawa sa aling hakbang sa tamang paghuhusga ng ating emosyon?=Pag-unawa sa sanhi>Pagkilala sa emosyon+Pagtukoy sa pisikal na reaksyon<Pagkilala sa epekto ng emosyon",
"Ang pagtukoy kung paano naiimpluwensiyahan ng ating damdamin ang ating pagkilos, pagdedesisyon, at pakikitungo sa ibang tao ay ginagawa sa aling hakbang sa tamang paghuhusga ng ating emosyon?=Pagkilala sa epekto ng emosyon>Pagkilala sa emosyon+Pagtukoy sa pisikal na reaksyon<Pag-unawa sa sanhi",
"Ano ang ibig sabihin ng pisikal na reaksyon?=Tugon ng ating katawan sa ating nararamdaman>Damdamin nating nakaugat sa ating kalusugan+Epekto ng ating damdamin sa ating pagkilos at pag-iisip<Pakikitungo natin sa ibang tao batay sa ating nararamdaman",
"Alin sa mga sumusunod na damdamin ang palaging nagdudulot ng mabilis na tibok ng puso?=Kaba>Kapayapaan ng loob+Lungkot<Pagtataka",
"Bakit mahalaga ang pag-unawa sa sanhi ng ating emosyon?=Para maproseso at makontrol ang nararamdaman>Para maisisi ang emosyon sa iba+Para mabalewala ang nararamdaman<Para mapalakas o mapalala ang emosyon",
"Kapag galit, alin sa mga sumusunod ang dapat mong gawin bago ka magsalita?=Huminga nang malalim at mag-isip muna>Magpigil ng hininga+Sumigaw nang mahaba at malakas<Umiyak sa isang sulok",
"Alin sa mga sumusunod ang pinakamainam gawin upang maunawaan at mailabas natin ang ating damdamin sa tahimik na paraan?=Pagsusulat ng journal>Paghagulgol nang mag-isa+Pagtatanim ng galit sa puso<Paninisi ng ibang tao",
"Alin sa mga sumusunod ang dapat mong gawin kapag nakakaramdam ka ng matinding lungkot?=Makipag-usap sa isang pinagkakatiwalaang tao>Magpanggap na masaya+Itago ito<Magalit sa iba",
"Anong emosyon ang pinakamadalas magbunga ng padalus-dalos at maling desisyon?=Galit>Saya+Kapayapaan ng loob<Lungkot",
"Ano ang layunin ng pagninilay sa pagsusuri ng ating damdamin?=Maunawaan ang emosyon>Makatulog nang mahimbing+Malibang nang panandalian<Mapagtakpan ang nararamdaman",
"Ano ang ibig sabihin ng 'mindfulness?'=Pagtuon sa kasalukuyang sandali>Pagpaplano sa hinaharap+Pag-alala sa nakaraan<Pagiging makasarili",
"Alin sa mga sumusunod ang nagpapakita ng kamalayan sa sariling damdamin?=Pag-amin sa tunay na nararamdaman>Paglilihim ng totoong emosyon+Pagpapanggap na masaya kapag malungkot<Pag-iwas sa pagkakaroon ng emosyon",
"Alin sa mga sumusunod ang maaaring epekto ng hindi pagkilala sa sariling emosyon?=Maling paghuhusga o pagdedesisyon>Maayos na pakikitungo sa iba+Kapanatagan ng loob<Masayang buhay",
"Alin sa mga sumusunod ang pisikal na aktibidad na makakatulong sa pamamahala ng emosyon?=Paglalakad o pag-eehersisyo>Pagkain ng tsokolate+Pagtulog buong araw<Pagsisimula ng bisyo",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa sarili?=Pagtanggap ng sariling emosyon>Pagpapanggap na masaya kahit hindi+Pagtatatwa ng tunay na damdamin<Paglayo sa ibang tao",
"Alin sa mga sumusunod ang karaniwang epekto ng pagiging aktibo sa paglikha ng sining?=Kasiyahan at tiwala sa sarili>Malalang pagkalumbay+Awa sa sarili<Masidhing galit sa iba",
"Alin sa mga sumusunod ang hindi isa sa mga pisikal na reaksyong karaniwang makikita sa isang taong labis na natatakot o kinakabahan?=Pagsigaw habang humahalakhak>Pinagpapawisan ang kamay+Nanginginig ang katawan<Mabilis ang tibok ng puso",
"Ano ang dapat mong gawin kapag nalilito ka sa iyong nararamdaman?=Magsulat sa journal o magnilay>Kumain ng maraming minatamis+Balewalain lang ito<Isisi ang pagkalito sa ibang tao",
"Alin sa mga sumusunod ang aktibidad na karaniwang ginagawa para makamtan ang 'mindfulness'?=Meditasyon>Pagsayaw nang mabagal+Pag-awit ng malungkot na kanta<Pamamasyal kasama ang mga kaibigan",
"Ano ang mga dapat mong isulat sa isang journal kung ginagamit mo itong paraan sa pagkilala ng iyong tunay na emosyon?=Mga nararamdaman at karanasan>Mga nais gawing libangan+Mga tula at kuwento<Plano para makamit ang pangarap sa buhay",
"Alin sa mga sumusunod na paraan para magkaroon ng kamalayan sa sariling emosyon ang nangangailangan ng bukas at tapat na komunikasyon?=Pakikipag-usap sa iba>Pagkontrol ng reaksyon+Malikhain o masining na pagpapahayag<Pagsasagawa ng mga pisikal na aktibidad",
"Ang paghinga muna nang malalim kung galit upang mabigyan ang sarili ng sandali upang mag-isip ay halimbawa ng alin sa mga sumusunod na paraan ng pagkakamit ng kamalayan sa sariling emosyon?=Pagkontrol ng reaksyon>Pakikipag-usap sa iba+Malikhain o masining na pagpapahayag<Pagsasagawa ng mga pisikal na aktibidad",
"Ang pagpipinta, pagsasayaw, at pagsusulat ng tula ay mga halimbawa ng alin sa mga sumusunod na paraan para makamit ang kamalayan sa sariling emosyon?=Malikhain o masining na pagpapahayag>Pakikipag-usap sa iba+Pagkontrol ng reaksyon<Pagsasagawa ng mga pisikal na aktibidad",
"Ang pagtakbo, paglangoy, at paglalaro ng basketbol ay mga halimbawa ng alin sa mga sumusunod na paraan para makamit ang kamalayan sa sariling emosyon?=Pagsasagawa ng mga pisikal na aktibidad>Pakikipag-usap sa iba+Pagkontrol ng reaksyon<Malikhain o masining na pagpapahayag",

);

?>
</head>
</bod
</html>