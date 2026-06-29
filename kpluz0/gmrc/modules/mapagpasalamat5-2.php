<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasalamat sa Diyos - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasalamat sa Diyos";
$_SESSION['tnum']="*59";

$questions=array(

"Alin sa mga sumusunod ang isang paraan upang maipakita ang pasasalamat sa Diyos?=Pagdarasal tuwing umaga at bago matulog>Pagdarasal kapag may hinihingi lamang+Pagtulog sa misa<Pagbabalewala sa mga biyayang natatanggap araw-araw",
"Bakit mahalaga ang sabay-sabay na pagdarasal ng pamilya?=Upang sama-samang mapalalim ang ugnayan sa Diyos>Para hindi mainip sa pagdarasal+Para matapos agad ang pagdarasal<Para hangaan ang pamilya ng mga kapitbahay",
"Alin sa mga sumusunod ang pangunahing silbi ng isang altar o banal na sulok sa tahanan?=Simbolo ito ng presensya ng Diyos sa tahanan>Simbolo ito ng yaman ng pamilya+Pinapaganda nito ang loob ng tahanan<Nagagawa itong patungan ng mga gamit sa bahay",
"Alin sa mga sumusunod ang gawaing nagpapalalim ng pananampalataya ng pamilya sa Diyos?=Pagdalo sa misa tuwing Linggo>Pagbisita sa mga kamag-anak sa lalawigan+Pamamasyal sa mall nang sama-sama<Pagbili ng mga mamahaling gamit sa bahay",
"Alin sa mga sumusunod ang hindi kabilang sa mga aral na natututunan natin mula sa pananampalataya sa Diyos?=Pagiging makasarili>Pagmamalasakit sa kapwa+Paggalang sa magulang<Pagsunod sa batas",
"Ang paggalang sa mga banal na bagay ay maipapakita natin sa pamamagitan ng alin sa mga sumusunod?=Pag-iingat at pagrespeto sa mga ito>Pagtatago ng mga ito sa baul+Paglalaro ng mga ito<Pagbabalewala sa sinisimbolo ng mga ito",
"Alin sa mga sumusunod ang gawaing nagpapalalim ng pananampalataya ng pamilya sa Diyos?=Sama-samang pagdarasal>Pagdarasal nang mag-isa kapag may nais hilingin sa Diyos+Pagsasagawa ng paboritong libangan<Paglalakbay kasama ang mga kaibigan",
"Alin sa mga sumusunod ang nagpapakita ng pasasalamat sa Diyos sa simpleng paraan?=Pagiging masinop sa mga biyayang natatangggap>Pagpapabaya sa mga gamit+Paglalagay sa plato ng pagkaing hindi inuubos<Pagkonsumo ng mga mamahaling produkto",
"Alin sa mga sumusunod ang bunga ng pagkakaroon ng iisang pananampalataya sa pamilya?=Pagkakaisa sa mga paniniwala>Pagkakaiba-iba ng mga pananaw sa pananampalataya+Pagkakanya-kanya sa mga panrelihiyong gawain<Bihirang pagsasama-sama sa pagsamba",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa Bibliya para mapahalagahan ang kabanalan ng bagay na ito?=Gawin itong patungan>Igalang ito+Basahin ito at unawain<Ingatan ito",
"Bakit kailangan nating magpasalamat sa Diyos araw-araw?=Upang pahalagahan ang Kanyang kabutihan at mga biyaya>Upang makapagmalaki tayo sa iba+Para matupad ang mga hinihiling natin sa Kanya<Para hindi tayo makaranas ng mga pagsubok sa buhay",
"Alin sa mga sumusunod ang bunga ng pananampalataya ng pamilya sa Diyos?=Malalim na pagmamahalan at pagkakaintindihan>Kawalan ng pag-asa sa buhay+Madalas na pagtatampo ng bawat isa<Mahinang ugnayan at kawalan ng pagkakaisa",
"Alin sa mga sumusunod ang isang halimbawa ng gawaing panrelihiyon?=Pagdarasal ng rosaryo>Pagpapahayag ng opinyon sa social media+Pagtitinda sa tapat ng simbahan<Pagtuturo sa isang bata",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa mga biyayang natatanggap mo?=Aksayahin ang mga ito>Ipagpasalamat sa Diyos ang mga ito+Pangalagaan ang mga ito<Magbahagi nito sa mga nangangailangan",
"Bukod sa pananalangin, maipapakita mo ang pasasalamat sa Diyos sa pamamagitan ng alin sa mga sumusunod?=Paggawa ng mabuti sa kapwa>Pagiging mapagmalaki+Pagpapayaman sa sarili<Panlilinlang ng ibang tao",
"Alin sa mga sumusunod ang isang halimbawa ng gawaing panrelihiyon?=Pag-awit ng papuri sa Diyos>Pagsayaw sa isang programa sa paaralan+Pagtitinda ng sampaguita sa mga nagsisimba<Pag-aalaga ng nakababatang kapatid",
"Alin sa mga sumusunod ang dapat mong iwasan upang maipakita ang pasasalamat sa Diyos?=Pagsasayang ng mga biyaya>Pagiging masinop+Pag-aalaga sa mga gamit<Pagbabahagi sa mga nangangailangan",
"Alin sa mga sumusunod ang dapat mong iwasan upang maipakita ang pasasalamat sa Diyos?=Pagdadamot sa mga mahihirap>Pagdarasal sa Diyos bago matulog+Pag-aalaga sa sariling kalusugan<Pagmamalasakit sa kalikasan",
"Alin sa mga sumusunod ang bunga ng sama-samang pagdarasal ng pamilya?=Mas malalim na koneksyon sa bawat isa>Mas madalas na di-pagkakaunawaan+Kawalan ng pagkakaisa<Mababang respeto sa mga kapamilya",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit kailangang ituro ng magulang sa mga anak ang pananampalataya sa Diyos?=Upang pagpapayaman lamang ang atupagin nila>Upang maging matulungin sila sa kapwa+Upang sumunod sila sa mga batas<Upang maging magalang sila sa iba",
"Alin sa mga sumusunod ang hindi nagpapakita ng pananampalataya ng pamilya sa Diyos?=Pagtutuon ng pansin sa pagnenegosyo>Paglahok sa mga gawain ng simbahan+Pagtuturo ng mga aral ng simbahan sa mga anak<Pagkakaroon ng altar sa bahay",
"Alin sa mga sumusunod ang hindi kabilang sa mga bagay o simbolong madalas makita sa isang altar?=Laruan>Krus+Imahen ng santo<Bibliya",
"Bakit hindi natin dapat balewalain ang mga biyayang natatanggap sa araw-araw?=Para maipakita natin ang pasasalamat sa Diyos>Para lalo tayong maging makasarili+Para makaiwas tayo sa pagbabahagi sa mga nangangailangan<Para hangaan tayo ng ibang tao",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa salita ng Diyos?=Pagtuturo ng tamang asal batay dito>Pag-uuna ng sariling interes sa pagdedesisyon+Pagwawalambahala sa mga biyayang natatanggap<Pagsasantabi ng mga batas at alituntunin",
"Alin sa mga sumusunod ang hindi mo dapat gawin habang nasa misa?=Makipagbiruan sa katabi>Makinig sa pari+Makiisa sa pananalangin<Umawit ng papuri",

);

?>

</head>

</bod

</html>