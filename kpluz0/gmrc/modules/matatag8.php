<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Pagkakaroon ng Positibong Pananaw - GMRC in KPluz.com    </title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagkakaroon ng Positibong Pananaw";
$_SESSION['tnum']="*81";

$questions=array(

"Alin sa mga sumusunod ang nagpapakita ng positibong pananaw?=Pagtanggap sa kabiguan nang may pag-asa>Laging pag-iisip ng masama+Pag-iwas sa mga tungkulin<Hindi magandang pakikitungo sa iba",
"Ang taong may positibong pananaw ay karaniwang nagpapakita ng alin sa mga sumusunod?=Pagtuklas ng kabutihan sa bawat sitwasyon>Kawalan ng pag-asa+Madalas na pag-init ng ulo<Palaging pagrereklamo",
"Bakit mahalaga ang pagkakaroon ng positibong pananaw?=Para maging matatag sa buhay>Para hindi magkaroon ng pangarap+Para makaiwas sa mga responsibilidad<Para hindi kailangang magsikap",
"Alin sa mga sumusunod ang nagpapakita ng positibong pananaw?=Pagpupursigi kahit nahihirapan>Pagtulog buong araw+Pagkukulong sa loob ng bahay<Kawalan ng ambisyon sa buhay",
"Kapag may problema, alin sa mga sumusunod ang ginagawa ng isang taong may positibong pananaw?=Naghahanap ng solusyon>Nagtatampo sa mga kasamahan+Sumusuko kaagad<Umaalis muna",
"Alin sa mga sumusunod ang pinakamainam na paraan para makatulong ang pamilya sa pagkakaroon ng isang tao ng positibong pananaw?=Pagbibigay ng suporta at pagmamahal sa kanya>Pagkunsinti sa kanyang katamaran+Pagpapakita ng galit tuwing may pagkakamali siya<Pagtatakip sa kanyang mga kasalanan",
"Anong uri ng komunikasyon ang kailangan mo sa iyong pamilya para mapanatili mo ang iyong positibong pananaw?=Bukas at tapat>Bihira o madalang+Palaban<Matalinghaga",
"Alin sa mga sumusunod ang halimbawa ng pagpapakita ng suportang emosyonal ng isang pamilya?=Pakikinig at pagbibigay ng payo>Pagsasantabi sa damdamin o pananaw+Pagbabawal magbahagi ng saloobin<Paglibak sa pagkakamali",
"Kapag may suliranin, alin sa mga sumusunod ang ginagawa ng isang pamilyang may positibong pananaw?=Nagdadamayan>Nagkakanya-kanya+Nandadamay ng ibang pamilya<Nagsisisihan",
"Alin sa mga sumusunod ang dapat gawin ng isang pamilya upang mapanatili ang samahan?=Magkaisa sa lahat ng situwasyon>Magtalo maging sa maliliit na bagay+Magsisihan kapag may problema<Mag-iwasan",
"Alin sa mga sumusunod ang nagpapakita ng positibong pananaw sa paaralan?=Pagiging masipag sa paggawa ng proyekto>Hindi pakikinig sa guro+Pagkakalat sa silid-aralan<Panunukso ng kamag-aral",
"Kapag may nakuha kang mababang marka sa paaralan, alin sa mga sumusunod ang dapat mong gawin?=Mag-aral nang mas mabuti>Sisihin ang katabing kaklase+Tumigil sa pag-aaral<Magtampo sa guro",
"Alin sa mga sumusunod ang hindi nagpapakita ng positibong pananaw?=Paghihiganti sa kapwa>Pagkakaroon ng pag-asa+Paghahanap ng solusyon sa problema<Pagtanggap ng pagkatalo",
"Ang pagtulong sa mga gawaing bahay ay nagpapakita ng alin sa mga sumusunod?=Pagiging responsable>Kawalan ng malasakit+Pagiging mapagmalaki<Kawalan ng tiyaga",
"Alin sa mga sumusunod ang isa sa mga karaniwang epekto ng positibong pananaw sa ating pagkatao?=Pagiging matatag>Pagiging magagalitin+Kawalan ng pagkukusa<Kawalan ng disiplina",
"Ano ang dapat mong gawin kung may kapamilya kang malungkot?=Makinig at magpayo sa kanya>Hayaan lang siyang mag-isa+Inisin siya<Gawing katatawanan ang situwasyon niya",
"Kapag may hindi magandang pangyayari, alin sa mga sumusunod ang dapat mong gawin?=Magdasal at muling bumangon>Umiyak para kaawaan+Isisi ang pangyayari sa iba<Sumuko sa lahat ng gawain",
"Alin sa mga sumusunod ang iyong ipinapakita tuwing tumutulong ka sa nangangailangan?=Pagmamalasakit>Pagmamataas+Pagkamakasarili<Pagkairesponsable",
"Paano mo maipapakita ang iyong positibong pananaw sa isang kaibigan?=Sa pamamagitan ng pagsuporta sa kanya>Sa pamamagitan ng panunukso sa kanya+Sa pamamagitan ng paninira sa kanya<Sa pamamagitan ng pagsisinungaling sa kanya",
"Alin sa mga sumusunod ang ginagawa ng isang batang may positibong pananaw?=Tumutulong sa kalarong nangangailangan>Sumusuko sa mga ginagawang proyekto+Nang-aaway ng kapwa<Naglilihim sa mga magulang",
"Alin sa mga sumusunod ang kadalasang sinasabi ng isang batang may tiwala sa sarili?=Susubukan ko kahit mahirap.>Hindi ko ito kaya.+Wala akong talento.<Suko na ako.",
"Alin sa mga sumusunod ang nagpapakita ng pananampalataya?=Pagdarasal sa panahon ng pagsubok>Pagtatampo sa Diyos+Pag-iwas sa mga aktibidad ng simbahan<Pag-aalinlangan sa sarili",
"Ang taong may positibong pananaw ay nagpapakita ng alin sa mga sumusunod?=Tiwala sa Diyos>Pagkahabag sa sarili+Poot sa puso<Kawalan ng malasakit sa kapwa",
"Alin sa mga sumusunod ang pinakamainam na paraan para maipakita ang pagpapahalaga sa sarili?=Pag-aalaga sa kalusugan>Pagsunod sa uso+Pagbili ng mamahaling gamit<Pagyayabang ng sariling tagumpay",
"Sa pagtatapos ng araw, alin sa mga sumusunod ang ginagawa ng isang batang may positibong pananaw?=Nananalangin para magpasalamat>Kumakain ng tsitsirya sa kuwarto+Nagpupuyat sa kompyuter<Nagkakalat ng tsismis",
 
);

?>
</head>
</bod
</html>