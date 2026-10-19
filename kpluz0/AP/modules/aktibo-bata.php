<html>
<head>
<body>

<?php
$_SESSION['title']="Pagiging Aktibo at Responsableng Batang Pilipino";

$questions=array(

"Ano ang tawag sa panunumpang isinasagawa natin pagkatapos nating awitin ang ating pambansang awit?=Panatang Makabayan>Panunumpa sa Watawat+Lupang Hinirang<Panata ng Mag-aaral",
"Ano ang unang linya ng 'Panatang Makabayan'?=Iniibig ko ang Pilipinas>Mahal ko ang aking bayan+Iniibig ko ang aking lupang sinilangan<Bayang magiliw",
"Paano maisasabuhay ng isang batang Pilipino ang katagang \"diringgin ko ang payo ng aking magulang\"?=Pakikinig at pagsunod sa magulang>Pagiging masayahin+Paggamit ng magalang na pananalita<Pag-aaral nang mabuti",
"Alin sa mga ito ang gawaing naaayon sa linyang \"susundin ko ang tuntunin ng paaralan\"?=Hindi pagkakalat sa paligid>Pakikipag-away sa kamag-aral+Paglalaro sa oras ng klase<Hindi paggawa ng takdang aralin",
"Alin sa mga sumusunod ang tungkulin ng bawa't isa sa atin?=Tumulong sa kapwa>Maging mayaman+Mamigay ng mga regalo<Kumain ng masarap na pagkain",
"Alin sa mga ito ang gawaing naaayon sa linyang \"naglilingkod, nag-aaral, at nagdarasal nang buong katapatan\"?=Pagtupad sa mga tungkulin>Pagpapabaya sa pag-aaral+Paglimot sa Diyos<Pagiging tamad sa bahay",
"Ano ang kahulugan ng linyang \"iaalay ko ang aking buhay, pangarap, pagsisikap sa bansang Pilipinas\"?=Paghahandog ng sarili sa bayan>Pagdakila sa mga dayuhan+Pangingibang-bayan<Pagbabalewala sa mga kapwa Pilipino",
"Kailan karaniwang sinasabi ang 'Panatang Makabayan' sa paaralan?=Pagkatapos awitin ang Lupang Hinirang sa umaga>Bago mananghalian+Pagkatapos ng klase<Bago mag-uwian",
"Bilang isang batang Pilipino, paano mo maipapakita ang pagiging makabayan sa paaralan?=Paggalang sa mga guro at kaklase>Pagkakalat sa paligid+Paninira ng mga kagamitan<Pagguhit sa pader",
"Alin sa mga sumusunod ang isang paraan ng pagsasakatuparan ng 'Panatang Makabayan' sa tahanan?=Pagtulong sa mga gawaing bahay>Panonood ng TV+Pag-iwas sa magulang<Paglalaro sa kompyuter",
"Ano ang ipinapangako mo kapag sinasabi mo ang linyang \"tutuparin ko ang tungkulin ng isang mamamayang makabayan\"?=Pagiging mabuting Pilipino>Pagiging makasarili+Pagdakila sa mga dayuhan<Paghanga sa ibang bansa",
"Alin sa mga sumusunod ang hindi kasama sa 'Panatang Makabayan'?=Magkaroon ng maraming yaman>Dinggin ang payo ng magulang+Sumunod sa tuntunin ng paaralan<Maglingkod nang buong katapatan",
"Ano ang dapat mong gawin kapag may kaklase kang nang-iinis sa iyo?=Lumayo sa kanya para makaiwas sa away>Gumanti ng pang-iinis sa kanya+Suntukin siya agad<Magtampo at umiyak sa isang tabi",
"Alin sa mga ito ang gawaing naaayon sa 'Panatang Makabayan'?=Paggawa ng takdang-aralin>Pagliban sa klase+Pandaraya sa pagsusulit<Paglalaro buong araw",
"Ano ang kahulugan ng salitang 'marangal' sa Panatang Makabayan?=Tapat at may mabuting asal>Mayaman at sikat+Maganda at matalino<Malusog at malakas",
"Aling linya ng 'Panatang Makabayan' ang tuwirang nagpapahayag ng ating pagmamahal sa ating bansa?=Iniibig ko ang Pilipinas>Iaalay ko ang aking buhay+Diringgin ko ang payo ng aking magulang<Susundin ko ang tuntunin ng paaralan",
"Ano ang dapat mong gawin kung may makita kang kalat sa inyong silid-aralan?=Walisin ito at itapon sa basurahan>Huwag itong pansinin+Sipain ito sa ilalim ng mesa<Paglaruan ito",
"Bakit mahalagang isabuhay natin ang 'Panatang Makabayan' araw-araw?=Upang maging mabuting mamamayan tayo ng Pilipinas>Upang makakuha tayo ng papuri+Upang sumikat tayo sa social media<Upang lumaki ang ating kita",
"Ano ang ipinapangako mo kapag sinabi mo ang linyang \"nagdarasal nang buong katapatan\"?=Pananalangin nang taimtim>Pananalangin para magpakitang-tao lamang+Paglalakbay ng isip habang nananalangin<Pag-iwas sa pagdarasal",
"Alin sa mga sumusunod ang halimbawa ng pagiging responsableng bata sa pamayanan?=Pagsali sa paglilinis ng barangay>Pagsusulat sa pader ng mga gusali+Pagtatapon ng basura sa tabi-tabi<Paninira ng mga halaman sa parke",
"Ano ang kahalagahan ng 'Panatang Makabayan'?=Nagpapaalala ito sa ating mahalin natin ang ating bayan>Nagpapaalala ito sa ating mahalin natin ang ating sarili+Tinuturuan tayo nitong magmalaki sa ating kapwa<Nanghihikayat ito sa ating mangibang-bansa",
"Ano ang dapat mong gawin kung may nagpapaturo sa iyo ng 'Panatang Makabayan'?=Turuan siya nang may pagpapakumbaba>Huwag siyang pansinin+Pagtawanan siya<Turuan siya ng maling pagbigkas nito",
"Alin sa mga ito ang nagpapahalaga sa katagang \"tahanan ng aking lahi\"?=Pagsunod sa ating mga tradisyon>Pagsasalita sa wikang Ingles+Paggaya sa mga dayuhang mang-aawit<Pagbabalewala sa ating mga kaugalian",
"Alin sa mga sumusunod ang nagpapakita ng pagsasakatuparan ng 'Panatang Makabayan'?=Pag-aaral nang mabuti upang makatulong sa bayan>Hindi pakikinig sa guro+Panunukso sa kaklase<Panggagaya sa mga banyaga",
"Ano ang kahulugan ng linyang \"iaalay ko ang aking buhay, pangarap, pagsisikap\"?=Paggawa ng lahat para sa ikauunlad ng bayan>Pag-uuna sa sariling kapakanan+Paggawa ng lahat para umangat sa iba<Pagbabahagi ng saloobin sa social media",

);

?>

</head>

</body>

</html>