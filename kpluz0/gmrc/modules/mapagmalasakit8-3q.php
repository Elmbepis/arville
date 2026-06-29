<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa mga Hayop - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa mga Hayop";
$_SESSION['tnum']="*8i";

$questions=array(

"Bakit mahalaga ang pagbibigay ng ligtas at maayos na tirahan para sa mga hayop?=Upang maprotektahan sila sa mga panganib>Para maging masustansiya ang kanilang kinakain+Para hindi sila mauhaw<Upang hindi sila mag-away-away",
"Alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop ang nagbibigay sa kanila ng mga sustansiyang kailangan nila upang lumaki at manatiling malusog?=Pagbibigay ng sapat at tamang pagkain>Pagbibigay ng malinis na inumin+Pagbibigay ng ligtas at maayos na tirahan<Pagbibigay ng atensyong medikal",
"Alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop ang nagsusuplay sa kanilang katawan ng likidong mahalaga sa iba't ibang sistema nito?=Pagbibigay ng malinis na inumin>Pagbibigay ng sapat at tamang pagkain+Pagbibigay ng ligtas at maayos na tirahan<Pagbibigay ng atensyong medikal",
"Alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop ang nagpoprotekta sa kanila sa init, ulan, mandaragit, at iba pang panganib?=Pagbibigay ng ligtas at maayos na tirahan>Pagbibigay ng sapat at tamang pagkain+Pagbibigay ng malinis na inumin<Pagbibigay ng atensyong medikal",
"Ang pagpapabakuna ng ating mga alagang hayop para maging ligtas sila sa mga sakit ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop?=Pagbibigay ng atensyong medikal>Pagbibigay ng sapat at tamang pagkain+Pagbibigay ng malinis na inumin<Pagbibigay ng ligtas at maayos na tirahan",
"Alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop ang tumutukoy sa pagtatanggal ng mga dumi sa lugar na kanilang ginagalawan?=Paglilinis ng kapaligiran>Pagbibigay ng sapat at tamang pagkain+Pagbibigay ng atensyong medikal<Pagbibigay ng malinis na inumin",
"Ang pansamantalang pagpapakain sa isang tutang gumagala sa kalye hanggang masundo ito ng tamang awtoridad ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop?=Pagliligtas sa mga ligaw o inabandunang hayop>Pagtuturo sa kapwa+Pagboboluntaryo sa mga organisasyon<Pagbibigay ng atensyong medikal",
"Alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop ang tumutukoy sa pagbabahagi ng impormasyon sa iba tungkol sa wastong pangangalaga sa mga hayop?=Pagtuturo sa kapwa>Pagliligtas sa mga ligaw o inabandunang hayop+Pagboboluntaryo sa mga organisasyon<Pagbibigay ng atensyong medikal",
"Ang pagtulong sa paglilinis ng pasilidad ng isang animal rescue center ay halimbawa ng alin sa mga sumusunod na paraan ng pangangalaga sa mga hayop?=Pagboboluntaryo sa mga organisasyon>Pagtuturo sa kapwa+Pagliligtas sa mga ligaw o inabandunang hayop<Pagbibigay ng atensyong medikal",
"Ano ang dapat mong gawin kung may alaga kang hayop na may sakit?=Dalhin ito sa beterinaryo para mabigyan ng lunas>Pabayaan itong mag-isa hanggang gumaling+Ilagay ang kulungan nito sa likuran ng bahay<Ipamigay ito sa kapitbahay",
"Alin sa mga sumusunod ang karaniwang epekto ng maayos na pakikitungo ng mga tao sa mga hayop?=Maayos at ligtas na komunidad>Pagkasira ng kalikasan+Paglaganap ng maraming sakit<Pagdami ng mga aso at pusang ligaw",
"Alin sa mga sumusunod ang hindi kabilang sa mga natututunan ng isang batang nagagabayan nang maayos sa pag-aalaga ng mga hayop?=Pagiging malupit sa mga nilalang>Pagiging disiplinado at responsable+Pagiging matiyaga<Pagiging mapagmahal sa kalikasan",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit mahalagang panatilihing malinis ang kapaligiran ng mga alagang hayop?=Para hindi mabagot ang mga hayop>Upang maiwasan ang pagkakasakit ng mga hayop+Upang hindi ito magkaroon ng masamang amoy<Para hindi ito pamugaran ng mga pesteng hayop",
"Sa anong paraan mo maipapakita ang iyong pagmamalasakit sa mga hayop gamit ang social media?=Sa pagbabahagi ng impormasyon tungkol sa tamang pag-aalaga ng mga ito>Sa pagpapakalat ng mga pekeng balita tungkol sa mga ito+Sa online na pagbebenta ng mga ito<Sa pagpapakalat ng mga bidyong nagsasamantala sa mga ito",
"Alin sa mga sumusunod ang hindi kabilang sa mga tamang paraan ng pag-aalaga sa isang hayop?=Hindi paglalagay ng inumin sa kulungan nito>Pagpapabakuna nito+Hindi pagkalimot sa pagpapakain nito<Paglilinis ng tirahan nito",
"Alin sa mga sumusunod ang nagpapakita ng pagpapahalaga sa mga nilalang ng Diyos?=Pagmamalasakit sa mga hayop>Pagkain ng mga hayop na bihira nang makita+Pagtataboy sa mga ligaw na hayop<Pagpukpok sa mga korales para maraming mahuling isda",
"Alin sa mga sumusunod ang ipinapakita ng pagiging mahabagin at maalaga sa mga hayop?=Pagiging mapagmalasakit>Pagiging matiisin+Pagiging madasalin<Pagiging mapamaraan",
"Alin sa mga sumusunod ang hindi mo dapat iwasan sa pag-aalaga ng mga hayop?=Pagpapatingin ng mga ito sa beterinaryo>Pagpapabaya sa tirahan ng mga ito+Pagkalimot sa pagpapakain o pagpapainom ng mga ito<Pagpapakawala ng mga ito kapag nagsawa nang mag-alaga",
"Alin sa mga sumusunod ang hindi ipinapakita ng isang taong mapangalaga sa mga hayop?=Pagiging iresponsable>Pagiging maaasahan+Pagiging mahabagin<Pagkakaroon ng malasakit",
"Alin sa mga sumusunod ang pinakamaiuugnay sa tapat na pagmamalasakit sa mga hayop?=Pagpapahalaga sa mga nilalang ng Diyos>Pag-iwas sa kritisismo ng kapwa+Pagpapakita ng kabaitan para mapuri ng iba<Paggamit ng oras sa walang kabuluhang bagay",
"Ano ang dapat mong gawin kung may alaga kang hayop na nananamlay at ayaw kumain?=Dalhin ito sa beterinaryo para ipatingin>Takutin ito para lumakas+Paliguan ito para maging masigla<Pabayaan itong mag-isa hanggang maging normal ulit",
"Alin sa mga sumusunod ang hindi kabilang sa mga makabuluhang natututunan ng isang tao sa kanyang pagtulong sa mga hayop?=Pagpapabaya sa mga likas na yaman>Pagmamalasakit sa kalikasan+Pagiging mapanagutan<Pagpapakita ng kabutihan",
"Kailan mainam magturo sa iba tungkol sa wastong pag-aalaga ng mga hayop?=Kapag may sapat na kaalaman na tayo tungkol dito>Kapag may nabili na tayong alagang hayop+Kapag may nagtanong sa atin tungkol dito<Kapag uso ang pag-aalaga ng mga hayop",
"Anong katangian ang nabubuo sa isang batang pinapayagang mag-alaga ng hayop nang may sapat na paggabay?=Pagiging responsable>Pagiging magastos+Pagiging mainipin<Pagiging makasarili",
"Alin sa mga sumusunod ang karaniwang epekto ng pagkakaisa ng mga mamamayan sa pagmamalasakit sa mga hayop?=Pangangalaga sa pamayanan at kalikasan>Pagkapagod ng lahat sa mga gawain+Pagdami ng mga reklamo tungkol sa mga hayop sa komunidad<Labis na pagkonsumo ng mga likas na yaman",

);

?>

</head>

</bod

</html>