<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masipag - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masipag";
$_SESSION['tnum']="*87";

$questions=array(

"Ano ang ibig sabihin ng pagiging masipag?=Pagtitiyaga at pagpupunyagi sa pagtatapos ng mga gawain>Pagkakaroon ng matataas na marka sa klase+Paghihintay sa tulong ng iba<Pagkakaroon ng malaking kita bilang empleyado",
"Alin sa mga sumusunod ang pangunahing tagapagtaguyod ng edukasyon ng isang bata?=Pamilya>Guro+Kaklase<Komunidad",
"Alin sa mga sumusunod ang hindi bahagi ng akademikong suportang dapat ibigay ng pamilya sa isang bata?=Pagreregalo ng mamahaling cellphone>Paggabay sa paggawa ng takdang-aralin+Pagtuturo ng mahirap na paksa<Pagsubaybay sa pag-unlad ng bata",
"Maipapakita ng pamilya ang emosyonal na suporta nito sa isang bata sa pamamagitan ng lahat ng mga ito maliban sa alin?=Pagbibigay ng maraming laruan>Pagmamahal+Pagbibigay ng inspirasyon<Pagbibigay ng papuri kung dapat",
"Anong katangian ang nahuhubog sa isang batang tinuturuan ng wastong pagtatakda ng prayoridad?=Pag-uuna sa mga mahahalagang gawain>Pagsasantabi sa mga aralin+Pag-uuna sa mga paboritong gawain<Pagtulog o pagpapahinga nang matagal",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagiging masipag?=Pagpapabukas ng isang mahalagang gawain>Pagtatapos ng takdang-aralin+Pag-aaral araw-araw<Pagtupad sa lahat ng mga tungkulin",
"Ano ang dapat mong gawin kapag nahihirapan ka sa iyong aralin?=Humingi ng tulong sa pamilya>Itigil ang pagpasok sa paaralan+Ilihim ito at balewalain<Umiyak nang tahimik sa kuwarto",
"Alin sa mga sumusunod ang tumutukoy sa katapatan sa pag-aaral?=Pag-iwas sa anumang uri ng pandaraya>Pagkopya sa mga sagot ng kaklase sa pagsusulit+Pagpapagawa ng proyekto sa ibang tao<Pag-angkin sa sanaysay na isinulat ng iba",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit dapat nating pahalagahan ang oras?=Para makaiwas sa mga responsibilidad>Para maging produktibo+Para hindi makaperhuwisyo ng ibang tao<Para matapos ang lahat ng mga gawain",
"Alin sa mga sumusunod ang nagpapakita ng disiplina sa sarili ng isang bata?=Pagtapos sa mga takdang-aralin sa tamang oras>Pagkakalat sa silid-aralan+Madalas na pagliban sa klase<Pag-iwas sa mga gawaing-bahay",
"Ano ang bunga ng pagiging masipag sa paaralan?=Tagumpay sa pag-aaral at buhay>Pagbaba ng tiwala sa sarili+Madilim na kinabukasan<Kakulangan ng kasanayan sa maraming bagay",
"Alin sa mga sumusunod ang hindi tungkulin ng pamilya sa edukasyon ng isang bata?=Pagbibigay ng mamahaling bag>Pagtuturo ng disiplina+Pagbibigay ng emosyonal na suporta<Pagsuporta sa mga makabuluhang aktibidad",
"Anong katangian ang kailangang linangin sa isang bata upang hindi siya sumuko kapag nahihirapan?=Pagtitiyaga>Pagiging mahabagin+Pagpapakumbaba<Pagiging magalang",
"Alin sa mga sumusunod ang halimbawa ng pagiging responsable?=Pagtapos ng proyekto bago dumating ang deadline nito>Pagpasa ng takdang araling kulang-kulang ang mga sagot+Paglalaro ng cellphone habang may pagsusulit<Madalas na pagliban sa klase",
"Alin sa mga sumusunod ang maaaring gawin ng pamilya para malinang ang pagkamalikhain ng isang bata?=Paghikayat sa kanyang gumamit ng iba-ibang paraan ng pag-aaral>Paglimita sa kanyang mga aktibidad+Pagbabawal sa kanyang mag-isip nang malalim<Hindi pagsuporta sa pagtuklas ng kanyang mga talento",
"Alin sa mga sumusunod ang epektibong paraan para mapanatili ng isang bata ang kanyang determinasyon?=Pagtatakda ng layunin sa kanyang edukasyon>Pagbabalewala sa kanyang mga tungkulin+Pagsuko sa kanyang mga pangarap<Pag-iwas sa mga pagsubok",
"Alin sa mga sumusunod ang hindi kabilang sa mga layunin ng tamang pamamahala sa oras?=Pag-iwas sa mga tungkulin>Pag-iwas sa stress+Pagiging mas produktibo<Pag-iwas makaabala ng kapwa",
"Ano ang papel ng pamilya sa pagbibigay sa isang bata ng kasanayan sa epektibong komunikasyon?=Pagtuturo sa kanya ng pakikipag-usap at pakikinig>Pagtuturo sa kanyang tumahimik tuwing may problema+Pagsasanay sa kanyang umiwas sa mga tanong<Pagbabawal sa kanyang magpahayag ng sariling damdamin",
"Alin sa mga sumusunod ang nagpapakita ng masamang pag-uugali sa pag-aaral?=Pandaraya sa pagsusulit>Pag-aaral ng mga leksiyon araw-araw+Pagtapos ng bawat takdang aralin<Paggalang sa mga patakaran ng paaralan",
"Alin sa mga sumusunod ang nagpapakita ng masamang pag-uugali sa pag-aaral?=Di-matalinong pamamahala sa sariling oras>Pagtapos ng mga gawain sa itinakdang oras+Paghingi ng tulong kung kailangan<Pagtitiyaga upang maintindihan ang isang mahirap na paksa",
"Alin sa mga sumusunod ang hindi ipinapakita ng isang bata kung palagi niyang tinatapos sa oras ang kanyang mga gawain?=Kawalan ng disiplina>Kasipagan+Pagtitiyaga<Pagiging responsable",
"Alin sa mga sumusunod ang malamang na bunga ng kakulangan sa disiplina?=Mababang kalidad ng gawain>Maagang pagtatapos ng proyekto+Pagpasa ng takdang-aralin sa oras<Pagtupad sa lahat ng tungkulin",
"Matutulungan ng pamilya ang isang bata sa wastong pagtatakda ng prayoridad sa pamamagitan ng alin sa mga sumusunod?=Paggabay kung aling gawain ang dapat unahin>Paggabay kung paano maiiwasan ang mga tungkulin+Pagtuturo ng pagmamadali sa mga gawain<Pagpapakita kung paano maisasakripisyo ang kalidad ng paggawa",
"Alin sa mga sumusunod ang nagpapakita ng masamang pag-uugali sa pag-aaral?=Pagtulog habang may klase>Pagtapos ng mga takdang aralin+Pakikinig nang maigi sa guro<Pag-aaral ng mga leksiyon sa bahay",
"Alin sa mga sumusunod ang mahuhubog sa isang batang tinuturuang pahalagahan ang mga sakripisyo ng pamilya?=Pag-aaral nang mabuti>Pagpapabaya sa sariling edukasyon+Pagiging tamad sa bahay<Kawalan ng malasakit sa pamilya",

);

?>

</head>

</bod

</html>