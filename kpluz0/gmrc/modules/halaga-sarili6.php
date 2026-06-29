<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapahalaga sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapahalaga sa Sarili";
$_SESSION['tnum']="*60";

$questions=array(

"Ano ang pundasyon ng tunay na pagpapahalaga sa sarili?=Pagkilala sa sarili bilang natatangi at may dignidad>Pagkukumpara ng sarili sa iba+Pagmamalaki sa taglay na yaman<Pagtanggap ng papuri mula sa kapwa",
"Bakit mahalagang kilalanin na ang tao ay may sariling isip at damdamin?=Dahil ito ang nagbibigay ng ating dignidad>Dahil ito ang kaibahan natin sa mga hayop+Para makapagmalaki tayo sa iba<Para magamit natin ito upang umangat",
"Alin sa mga sumusunod ang ibig sabihin ng pagpapahalaga sa sarili?=Pagkilalang ikaw ay may kakayahang gumawa ng mabuti>Pagmamayabang ng iyong mga nagawa+Pagiging makasarili sa oras ng krisis<Pagpapakitang ikaw ay perpekto",
"Alin sa mga sumusunod ang hindi palatandaan ng pagpapahalaga sa sarili?=Palaging pagkukumpara ng sarili sa iba>Pangangalaga sa iyong katawan+Pag-iwas sa masasamang bisyo<Pagtanggap sa iyong mga kahinaan",
"Bakit maituturing na disiplina sa sarili ang pagbabasa ng mga aralin kahit walang nag-uutos?=Dahil ito ay kusang pagtupad sa tungkulin>Dahil ito ay madaling mapansin ng magulang+Dahil ito ay paraan ng pag-iwas sa parusa<Dahil makakakuha ito ng papuri mula sa guro",
"Alin sa mga sumusunod ang nagpapakita ng pagtanggap sa sariling kahinaan?=Paghingi ng tulong sa isang bagay na hindi mo pa alam>Pagtatago ng iyong pagkukulang upang hindi mapahiya+Palaging pagpapanggap na alam mo ang lahat<Pag-iwas sa anumang bagong hamon",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa sarili?=Wastong pagkain at pag-eehersisyo>Pagpapapayat nang labis+Pagpupuyat sa social media<Pagkain ng junk food",
"Alin sa mga sumusunod ang tamang pananaw tungkol sa pagkakaiba-iba ng mga talento ng mga tao?=Ito ay dahilan upang magkaisa at magtulungan>Ito ay dahilan upang mag-isa at iwasan ang iba+Dapat kainggitan ang mga talento ng iba<Hindi dapat pansinin ang mga walang talento",
"Alin sa mga sumusunod ang nagpapakita ng pagbabahagi ng talento sa kapwa?=Pagtulong sa kaklase sa math kung ikaw ay magaling doon>Paglilihim ng iyong nalalaman upang ikaw lang ang magaling+Pagmamalaki ng iyong talento para hamakin ang iba<Paghingi ng kabayaran bago tumulong gamit ang talento",
"Bakit mahalagang ibahagi mo ang iyong talento sa kapwa?=Dahil ang tunay na yaman ay nasusukat sa iyong naibabahagi sa iba>Para mabawasan ang iyong talento kapag ibinahagi mo ito+Dahil paraan ito upang makakuha ka ng kapalit na pera<Para sumikat ka sa paaralan",
"Alin sa mga sumusunod ang epekto sa pakikipagkapwa ng pagpapahalaga sa sarili?=Mabuting pakikipag-ugnayan dahil iginagalang mo ang sarili at kapwa>Palaging pag-iisa dahil walang gustong tumabi sa iyo+Madalas na pakikipag-away sa mga kaklase<Pagiging mayabang upang mapansin ng iba",
"Bakit hindi ka dapat makipagkumpitensya sa iba?=Dahil alam mong may kanya-kanya tayong lakas at kahinaan>Dahil wala kang kakayahang manalo+Dahil naaawa ka sa iyong mga matatalo<Dahil alam mo nang mas magaling ka sa lahat ng bagay",
"Ano ang kaugnayan ng paggalang sa sarili at paggalang sa kapwa?=Ang paggalang sa sarili ay nagbibigay-daan sa paggalang sa kapwa>Kailangan mong piliin kung sino ang mga igagalang mo+Hindi mo kailangang igalang ang iba kung may paggalang ka na sa sarili<Mas mahalaga ang paggalang sa kapwa kaysa sa sarili",
"Alin sa mga sumusunod ang hindi kilos ng isang taong may disiplina sa sarili?=Pagkopya ng takdang-aralin mula sa kaklase>Kusang pagtulong sa mga gawaing bahay+Pagtatapos ng proyekto kahit mahirap<Pagsasaulo ng aralin kahit walang pagsusulit",
"Alin sa mga sumusunod ang nagpapakita ng kumpiyansa sa sarili?=Pagharap sa maraming tao nang hindi natatakot>Pagiging kabado kapag may recitation+Pag-iwas sa anumang presentasyon<Pagtanggi sa pagkakataong magsalita",
"Ano ang dapat mong gawin upang matuklasan mo ang iyong mga talento?=Sumubok ng sari-saring aktibidad>Manatili lamang sa iyong silid+Sumubok lamang ng isang bagay kapag inutusan ng magulang<Umiwas sa mga aktibidad na bago sa iyo",
"Alin sa mga sumusunod ang hindi paraan ng pagsasabuhay ng pagpapahalaga sa sarili?=Pagkukumpara ng iyong talento sa talento ng iba>Pagtuklas ng iyong mga talento sa pamamagitan ng pagsali sa mga aktibidad+Pagpapahusay ng iyong kakayahan sa pamamagitan ng pagsasanay<Pagbabahagi ng iyong talento sa kapwa",
"Kailan mo masasabing may kapayapaan ka ng loob?=Kapag hindi mo na kailangang patunayan ang sarili mo sa iba>Kapag lagi kang nag-aalala kung ano ang sasabihin ng iba+Kapag lagi mong ikinukumpara ang iyong buhay sa buhay ng kaklase<Kapag nagiging masaya ka lamang kung nananalo ka sa isang bagay",
"Alin sa mga sumusunod ang hindi halimbawa ng pangangalaga sa katawan?=Pagpupuyat gabi-gabi>Pagsisipilyo pagkatapos kumain+Pagligo araw-araw<Pagkain ng gulay at prutas",
"Paano mo mapauunlad ang iyong kakayahan?=Sa pamamagitan ng pagsasanay at pagsali sa mga patimpalak>Sa pamamagitan ng hindi paggamit nito+Sa pamamagitan ng pagmamalaki nito sa iba<Sa pamamagitan ng paggamit nito upang manlamang sa kapwa",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa sarili?=Pagtupad sa mga tungkulin kahit walang nag-uutos>Pag-uuna ng mga sariling kaligayahan bago sa mga responsibilidad+Pagtanggi sa mga tungkulin at responsibilidad<Hindi pagtatapos ng mga gawaing mahirap",
"Alin sa mga sumusunod ang naglalarawan sa dignidad ng tao?=Hindi ito matutumbasan ng anumang kayamanan>Nakukuha mo lamang ito kapag mayaman ka na+Wala nito ang mga taong hindi sikat<Nakabatay ito sa kagandahan ng iyong anyo",
"Bakit mahalagang sumali ka sa iba't ibang aktibidad?=Upang matuklasan mo ang iyong mga kakayahan>Upang marami ang humanga sa iyo+Para makakuha ka ng mataas na grado<Upang mapuri ka ng iyong mga magulang",
"Alin sa mga sumusunod ang dapat natin gawin dahil bawa't isa sa atin ay natatangi at may kakaibang kakayahan?=Magkaisa at magtulungan>Magpagalingan+Mag-unahan sa pag-angat sa buhay<Mag-inggitan at magsiraan",
"Paano mo mapapasalamatan ang Maykapal sa ibinigay niyang talento sa iyo?=Sa pamamagitan ng pagpapaunlad at pagbabahagi nito>Sa pamamagitan ng pagyayabang nito+Sa pamamagitan ng paggamit lamang nito sa pagpapayaman<Sa pamamagitan ng paglilihim nito sa iba",

);

?>

</head>

</body

</html>