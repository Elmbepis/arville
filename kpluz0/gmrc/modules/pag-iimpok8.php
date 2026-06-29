<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pag-iimpok para Makatulong sa Iba - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pag-iimpok para Makatulong sa Iba";
$_SESSION['tnum']="*86";

$questions=array(

"Ano ang pangunahing layunin ng pagtitipid at pag-iimpok?=Para sa mga tunay na pangangailangan ng sarili at ng kapwa>Para sa paglalakbay sa magagandang lugar+Para sa pansariling luho<Para makabili ng mga bagong gadyet",
"Alin sa mga sumusunod ang malamang na gagawin ng isang taong disiplinado sa pag-iimpok?=Pagtulong sa mga nangangailangan>Pagiging palaasa sa iba+Madalas na panghihiram ng pera<Paggastos nang labis",
"Alin sa mga sumusunod ang magandang paraan ng pag-iimpok sa bahay?=Paghuhulog ng pera sa alkansya>Pagtatago ng pera sa ilalim ng unan+Pagsisingit ng pera sa isang siwang sa sahig o dingding<Paghuhulog ng barya sa balon",
"Anong uri ng pamumuhay ang nakakatulong sa pag-iimpok?=Payak>Marangya+Mapagmalaki<Maaksaya",
"Alin sa mga sumusunod na paraan ng pagtitipid o pag-iimpok ang tumutukoy sa pag-iwas sa labis na paggasta sa hindi mahahalagang bagay?=Wastong paggamit ng ipon>Pag-iimpok ng bahagi ng baon o kita+Pagtangkilik sa mga gawaing pangkomunidad<Pagpapahalaga sa pagreresiklo",
"Ang paggamit ng alkansya sa bahay at pagdedeposito sa bangko ay mga hakbang ng alin sa mga sumusunod na paraan ng pagtitipid o pag-iimpok?=Pag-iimpok ng bahagi ng baon o kita>Wastong paggamit ng ipon+Pagbabawas ng pagkonsumo<Pagpapahalaga sa pagreresiklo",
"Ang matalinong paggamit ng tubig at kuryente at hindi pagluluto ng labis na pagkain ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagtitipid o pag-iimpok?=Pagbabawas ng pagkonsumo>Pagtangkilik sa mga gawaing pangkomunidad+Pag-iimpok ng bahagi ng baon o kita<Pagpapahalaga sa pagreresiklo",
"Ang pag-iipon ng mga lumang bote, lata, at pahayagan para maibenta sa isang 'junk shop' ay bahagi ng alin sa mga sumusunod na paraan ng pagtitipid o pag-iimpok?=Pagpapahalaga sa pagreresiklo>Pagtangkilik sa mga gawaing pangkomunidad+Pag-iimpok ng bahagi ng baon o kita<Pagbabawas ng pagkonsumo",
"Alin sa mga sumusunod na paraan ng pagtitipid o pag-iimpok ang tumutukoy sa pakikabahagi sa mga proyekto ng inyong barangay sa pangangalaga ng kapaligiran at pagtulong sa kapwa?=Pagtangkilik sa mga gawaing pangkomunidad>Pag-iimpok ng bahagi ng baon o kita+Wastong paggamit ng ipon<Pagpapahalaga sa pagreresiklo",
"Alin sa mga sumusunod na paraan ng pagtitipid o pag-iimpok ang tumutukoy sa pag-iwas sa pagbili ng mga mamahaling bagay o pagtangkilik sa mga marangyang serbisyo?=Pagpapahalaga sa simpleng pamumuhay>Pag-iimpok ng bahagi ng baon o kita+Pagtangkilik sa mga gawaing pangkomunidad<Pagpapahalaga sa pagreresiklo",
"Alin sa mga sumusunod na benepisyo ng pagtitipid o pag-iimpok ang tumutukoy sa pagtitiyak na ang iyong magiging buhay sa hinaharap ay ligtas at maunlad?=Pagpapatatag ng kinabukasan>Pagtugon sa pangangailangan ng kapwa+Pagpapalawak ng kaalaman sa tamang paggamit ng yaman<Pagpapalakas ng espiritu ng bayanihan",
"Alin sa mga sumusunod na benepisyo ng pagtitipid o pag-iimpok ang tumutukoy sa pagkakaroon ng kakayahang magbigay ng tulong sa mga mahihirap at maysakit?=Pagtugon sa pangangailangan ng kapwa>Pagpapatatag ng kinabukasan+Pagpapalawak ng kaalaman sa tamang paggamit ng yaman<Pagpapalakas ng espiritu ng bayanihan",
"Alin sa mga sumusunod na benepisyo ng pagtitipid o pag-iimpok ang tumutukoy sa pagbabawas ng iyong pangangailangang mangutang at pagpapalawak ng iyong mga oportunidad sa negosyo?=Pagpapabuti ng kalagayang pang-ekonomiya>Pagtugon sa pangangailangan ng kapwa+Pagpapalaganap ng pagkakawanggawa<Pagpapalakas ng espiritu ng bayanihan",
"Alin sa mga sumusunod na benepisyo ng pagtitipid o pag-iimpok ang tumutukoy sa pagpapakita ng pagkamapagbigay kahit sa maliit na paraan tulad ng pamamahagi ng pagkain o pagseserbisyo sa kapwa?=Pagpapalaganap ng pagkakawanggawa>Pagpapatatag ng kinabukasan+Pagpapalawak ng kaalaman sa tamang paggamit ng yaman<Pagpapabuti ng kalagayang pang-ekonomiya",
"Alin sa mga sumusunod na benepisyo ng pagtitipid o pag-iimpok ang tumutukoy sa patuloy na pag-aaral tungkol sa matalinong paghawak ng pera?=Pagpapalawak ng kaalaman sa tamang paggamit ng yaman>Pagpapalakas ng espiritu ng bayanihan+Pagpapalaganap ng pagkakawanggawa<Pagtugon sa pangangailangan ng kapwa",
"Alin sa mga sumusunod na benepisyo ng pagtitipid o pag-iimpok ang tumutukoy sa pagkakaisa ng mga mamamayan sa pagtitipid at pag-iimpok upang makabuo ng isang matatag na komunidad?=Pagpapalakas ng espiritu ng bayanihan>Pagpapalawak ng kaalaman sa tamang paggamit ng yaman+Pagpapalaganap ng pagkakawanggawa<Pagtugon sa pangangailangan ng kapwa",
"Alin sa mga sumusunod ang maaari mong gawin para makatulong ka sa iyong pamayanan?=Pagtulong sa proyektong pagreresiklo ng barangay>Paglilibang kasama ang mga kaibigan+Pag-iipon ng bahagi ng baon para makabili ng sariling cellphone<Pagbabasa ng mga aklat sa bahay",
"Alin sa mga sumusunod ang maiuugnay sa pamumuhay nang payak?=Pagiging kuntento sa pagkakaroon ng sapat lamang>Pagkakaroon ng marangyang tahanan+Pagbili ng mga luho<Madalas na pagkain sa mamahaling restawran",
"Alin sa mga sumusunod ang dapat mong gawin upang makaiwas sa pagkakalubog sa utang?=Magtipid at mag-impok>Maglakbay sa ibang bansa palagi+Kumain ng mamahaling pagkain araw-araw<Bumili ng mga bagay na hindi kailangan",
"Paano makatutulong sa kapaligiran ang tamang paghihiwalay ng basura?=Sa pamamagitan ng pagreresiklo ng mga hindi nabubulok na basura>Sa pamamagitan ng pagreresiklo ng mga nabubulok na basura+Sa pamamagitan ng paggawa ng abono mula sa mga hindi nabubulok na basura<Sa pamamagitan ng paggawa ng abono mula sa niresiklong basura",
"Alin sa mga sumusunod ang isa sa mga epekto ng sama-samang pagtitipid at pag-iimpok ng mga mamamayan sa isang komunidad?=Pagkakaisa ng mga mamamayan>Pagkakawatak-watak ng mga mamamayan+Malawakang kahirapan<Pagdami ng mga may utang",
"Bakit mahalaga ang pagbabahagi ng kaalaman tungkol sa pag-iimpok?=Para dumami ang marunong humawak ng pera>Para maipagyabang mo ang iyong kaalaman+Para mapuri ka ng kapwa<Para mainggit sa iyo ang iba",
"Alin sa mga sumusunod ang hindi dapat paggamitan ng pondong nalikom ng isang barangay mula sa pagbebenta ng mga nareresiklong bagay?=Pagbili ng mga luho para sa mga opisyal ng barangay>Pagpapagawa ng palengke+Pagbibigay ng mga scholarships<Pagpapagamot ng mga maysakit",
"Upang makatulong sa pangangalaga ng kapaligiran, alin sa mga sumusunod ang pinakadapat pahalagahan sa pagbili ng isang produkto?=Kung matibay at tatagal ito>Kung mura lang ito+Kung uso ito<Kung sikat ang tatak nito",
"Alin sa mga sumusunod ang hindi isa sa mga epektibong paraan ng pag-iimpok?=Pagsusugal>Paggamit ng alkansya+Pagdedeposito ng pera sa bangko<Pamumuhunan sa pagkakakitaan",

);

?>
</head>
</bod
</html>