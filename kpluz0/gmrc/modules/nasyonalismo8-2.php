<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paggamit ng Kalayaan sa Pagkamapanagutan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paggamit ng Kalayaan sa Pagkamapanagutan";
$_SESSION['tnum']="*8m";

$questions=array(

"Ano ang kahulugan ng pagiging mapanagutan sa paggamit ng kalayaan?=Pagsasaalang-alang sa mga karapatan ng kapwa sa bawat desisyon at aksyon>Paggawa ng anumang gusto+Pagkilos nang hindi iniisip ang kahihinatnan ng aksyon<Pagsasaalang-alang ng sariling kapakanan sa bawat desisyon at aksyon",
"Alin sa mga sumusunod ang sinasabi ng prinsipyo ng mapanagutang paggamit ng kalayaan?=Ang ating kalayaan ay nagtatapos kung saan nagsisimula ang karapatan ng iba.>Ang ating kalayaan ay mas mahalaga kaysa sa mga karapatan ng iba.+Ang kapakanan ng iba ay hindi dapat maging hadlang sa ating mga gustong gawin.<Ang karapatan ng iba ay nagtatapos kung saan nagsisimula ang ating kalayaan.",
"Ano ang pangunahing dahilan kung bakit dapat tayong sumunod sa mga batas trapiko bilang mga responsableng mamamayan?=Para sa kaligtasan ng lahat>Para hindi mahuli at mapagmulta+Para mapabilis ang paglalakbay<Para mapuri ng ibang manlalakbay",
"Alin sa mga sumusunod ang ipinapakita ng aktibong pag-unawa at pagsunod sa mga batas ng komunidad?=Malasakit sa kabutihan ng nakararami>Pagiging makasarili+Pag-aambisyong maging mambabatas<Pagpapakitang mas magaling ka sa iba",
"Alin sa mga sumusunod ang halimbawa ng mapanagutang paggamit ng kalayaan?=Pagsunod sa mga batas trapiko sa lahat ng oras>Pagtatapon ng basura kung saan-saan+Pang-aagaw ng gamit ng iba<Pagsingit sa pila sa istasyon ng bus",
"Alin sa mga sumusunod ang halimbawa ng mapanagutang paggamit ng kalayaan?=Hindi pag-iingay sa gabi>Paglalaglag ng basura sa ilog+Panloloko ng kapwa para magkapera<Paninira ng gamit ng iba",
"Alin sa mga sumusunod ang halimbawa ng mapanagutang paggamit ng kalayaan?=Pagsasauli ng hiniram na gamit>Hindi pagbabayad sa binili+Pananakit ng kapwa<Paninirang-puri sa iba",
"Ang pagbabasa at pagtatanong upang maunawaan ang mga patakaran sa isang lugar ay halimbawa ng alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan?=Pag-alam sa mga batas at alintuntunin>Pagsasabuhay ng pagsunod+Pagiging maagap sa pagkilos<Pagkilala sa mga limitasyon ng iyong kalayaan",
"Ang hindi paglabag sa mga batas at paggalang sa mga karapatan ng iba araw-araw ay saklaw ng alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan?=Pagsasabuhay ng pagsunod>Pag-alam sa mga batas at alintuntunin+Pagbabahagi ng kaalaman sa iba<Pagkilala sa mga limitasyon ng iyong kalayaan",
"Alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan ang tumutukoy sa proaktibong paggawa ng mabuti kahit walang nagpapaalala sa iyo?=Pagiging maagap sa pagkilos>Pag-alam sa mga batas at alintuntunin+Pagbabahagi ng kaalaman sa iba<Pagkilala sa mga limitasyon ng iyong kalayaan",
"Alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan ang tumutukoy sa pag-unawang may hangganan ang mga bagay na maaari mong gawin dahil hindi ka dapat makasagabal sa karapatan ng iba?=Pagkilala sa mga limitasyon ng iyong kalayaan>Pag-alam sa mga batas at alintuntunin+Pagbabahagi ng kaalaman sa iba<Pagiging maagap sa pagkilos",
"Ang pagtuturo ng kahalagahan ng pagsunod sa mga batas sa iyong mga kapwa mag-aaral ay halimbawa ng alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan?=Pagbabahagi ng kaalaman sa iba>Pag-alam sa mga batas at alintuntunin+Pag-iisip muna bago kumilos o magsalita<Pagkilala sa mga limitasyon ng iyong kalayaan",
"Alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan ang tumutukoy sa pagtatanong muna sa iyong sarili kung makabubuti sa iba ang iyong gagawin at kung mapapanagutan mo ang epekto nito bago mo ito isagawa?=Pag-iisip muna bago kumilos o magsalita>Pagiging halimbawa sa iba+Pagbabahagi ng kaalaman sa iba<Pagiging maagap sa pagkilos",
"Alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan ang tumutukoy sa paggawa ng tama o nararapat kahit na ito ay mahirap o hindi popular?=Paninindigan sa paggawa ng mabuti>Pag-iisip muna bago kumilos o magsalita+Pagbabahagi ng kaalaman sa iba<Pagiging maagap sa pagkilos",
"Alin sa mga sumusunod na paraan ng mapanagutang paggamit ng ating kalayaan ang tumutukoy sa paggawa ng tama hindi dahil sa takot sa parusa kundi dahil sa pagkilala sa layunin o magandang ibubunga ng pagkilos na ito?=Pagsunod sa espiritu ng batas>Pag-iisip muna bago kumilos o magsalita+Pagbabahagi ng kaalaman sa iba<Pagiging maagap sa pagkilos",
"Alin sa mga sumusunod ang pinakamagandang paraan ng pagpapakita ng pagmamahal sa bayan?=Pagiging masunurin sa batas at mapanagutan sa lahat ng oras>Pagsali sa mga protesta laban sa pamahalaan+Pagsusuot ng mga damit na may pambansang simbolo<Pag-aaral ng mga talumpati ng mga bayani",
"Alin sa mga sumusunod ang unang hakbang sa mapanagutang pagsunod sa mga batas?=Pag-alam sa mga batas at alituntunin>Pagbabasa tungkol sa mga mambabatas+Pag-alam sa mga kaparusahan sa paglabag sa mga batas<Pagsasaliksik tungkol sa layunin ng bawat pangunahing batas",
"Bakit kailangan mong kilalanin ang mga limitasyon o hangganan ng iyong kalayaan?=Upang hindi ka makasagabal sa karapatan ng iba>Upang maisantabi mo ang mga karapatan ng kapwa+Upang mauna mo ang sarili mong kapakanan at kagustuhan<Upang makaiwas ka sa pananagutan sa iyong pagkilos",
"Bakit mahalaga ang pag-iisip muna bago ka kumilos o magpahayag?=Upang hindi ka makalabag sa karapatan ng iba>Upang hindi ka mahuli at maparusahan+Upang maisakatuparan mo ang sariling kagustuhan<Upang maipakitang kaya mong gumawa ng kahit ano",
"Alin sa mga sumusunod ang malamang na maging bunga kung gagamitin ng lahat ang kanilang kalayaan nang walang pananagutan?=Pag-usbong ng mga alitan at kaguluhan>Pagiging mas masaya ng mga mamamayan+Kapayapaan sa buong komunidad<Pagkakaisa at pagtutulungan ng mga tao",
"Ano ang dapat mong gawin kung may makita kang taong nagtatapon ng basura sa ilog?=Paalalahanan siya nang maayos>Tulungan siya sa pagtatapon+Sigawan siya at awayin<Huwag siyang pansinin",
"Paano mo matatanggap at makukuhang sundin ang isang alituntuning hindi mo gusto o hindi mo maintindihan?=Pag-unawa sa layunin at kabutihang ibubunga nito>Pagrereklamo sa mga mambabatas+Pagpoprotesta laban dito<Paggawa ng vlog laban dito",
"Alin sa mga sumusunod ang hindi kabilang sa naidudulot ng mapanagutang paggamit ng kalayaan ng mga mamamayan sa isang lipunan?=Pagsasantabi ng mga karapatang pantao at kawalan ng hustisya>Paggalang ng bawat isa sa kapwa+Kaayusan at kapayapaan ng komunidad<Pagtutulungan at pagkakaisa ng lahat",
"Alin sa mga sumusunod ang magagawa ng isang mag-aaral upang makapagpakita ng mapanagutang paggamit ng kalayaan sa paaralan?=Pagiging tapat sa mga pagsusulit>Pang-aagaw ng baon ng kaklase+Paninira ng mga aklat sa silid-aklatan<Pagkakalat sa sahig ng silid-aralan",
"Alin sa mga sumusunod ang magagawa ng isang bata upang makapagpakita ng mapanagutang paggamit ng kalayaan sa kanyang pamayanan?=Pagtulong sa paglilinis ng paligid>Paninira ng mga halaman ng kapitbahay+Pagsusulat sa mga pader<Paglalaglag ng balat ng kendi sa kanal",

);

?>

</head>

</bod

</html>