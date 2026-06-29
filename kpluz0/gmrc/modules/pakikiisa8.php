<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pakikiisa sa mga Ibang Lahi - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pakikiisa sa mga Ibang Lahi";
$_SESSION['tnum']="*8j";

$questions=array(

"Alin sa mga sumusunod ang nagpapakita ng mabuting pakikitungo sa lahat ng lahi?=Pagtanggap sa pagkakaiba-iba ng mga kultura>Pagpipilit ng sariling kultura sa iba+Pag-iwas sa mga kanluraning ideya<Pag-iwas sa paggamit ng mga banyagang wika",
"Alin sa mga sumusunod ang pagkakakilala ng karamihan sa mga dayuhan sa mga Pilipino?=Handang tumulong sa anumang lahi>Hindi namimigay sa hindi kakilala+Laging umaasa sa tulong ng iba<Palaging nagrereklamo",
"Alin sa mga sumusunod ang nagpapakita ng pag-unawa sa ibang kultura?=Paggalang sa paniniwala ng iba>Pag-iwas sa pakikihalubilo sa mga dayuhan+Pamimintas ng ibang lahi<Pagbibiro tungkol sa pambansang kasuotan ng iba",
"Alin sa mga sumusunod na tungkulin ng bawat Pilipino sa pandaigdigang lipunan ang sumasaklaw sa pagsuporta sa mga 'relief operations' sa mga bansang dumaraan sa isang krisis?=Tungkulin sa pagtulong>Tungkulin sa pagrespeto+Tungkulin sa pagtataguyod ng kapayapaan<Tungkulin sa pangangalaga ng kalikasan",
"Alin sa mga sumusunod na tungkulin ng bawat Pilipino sa pandaigdigang lipunan ang tumutukoy sa pagkilala at paggalang sa iba't ibang kultura, relihiyon, at pananaw ng mga tao sa mundo?=Tungkulin sa pagrespeto>Tungkulin sa pagtulong+Tungkulin sa pagtataguyod ng kapayapaan<Tungkulin sa pangangalaga ng kalikasan",
"Alin sa mga sumusunod na tungkulin ng bawat Pilipino sa pandaigdigang lipunan ang tumutukoy sa pagsuporta sa mga pandaigdigang adhikain laban sa digmaan, karahasan, at pang-aabuso?=Tungkulin sa pagtataguyod ng kapayapaan>Tungkulin sa pagtulong+Tungkulin sa pagrespeto<Tungkulin sa pangangalaga ng kalikasan",
"Alin sa mga sumusunod na tungkulin ng bawat Pilipino sa pandaigdigang lipunan ang sumasaklaw sa pakikibahagi sa mga kampanya o petisyong nagsusulong ng patas na hustisya para sa lahat?=Tungkulin sa pagtataguyod ng mga karapatang pantao>Tungkulin sa pagtulong+Tungkulin sa pagpapalaganap ng pagkakaisa<Tungkulin sa pangangalaga ng kalikasan",
"Alin sa mga sumusunod na tungkulin ng bawat Pilipino sa pandaigdigang lipunan ang sumasaklaw sa pakikipaglaban sa polusyon at pagsusulong ng wildlife conservation?=Tungkulin sa pangangalaga ng kalikasan>Tungkulin sa pagtulong+Tungkulin sa pagrespeto<Tungkulin sa pagtataguyod ng kapayapaan",
"Alin sa mga sumusunod na tungkulin ng bawat Pilipino sa pandaigdigang lipunan ang tumutukoy sa pakikipagkaibigan at paglikha ng magandang ugnayan sa mga mamamayan ng ibang bansa?=Tungkulin sa pagpapalaganap ng pagkakaisa>Tungkulin sa pagtulong+Tungkulin sa pagrespeto<Tungkulin sa pangangalaga ng kalikasan",
"Alin sa mga sumusunod na katangiang Pilipino ang ipinapakita ng pagtanggap natin sa mga kaugalian at paniniwala ng mga dayuhang bumibisita sa atin?=Magalang>Mapagmalasakit+Masipag at matiyaga<Masayahin",
"Alin sa mga sumusunod na katangiang Pilipino ang tumutukoy sa pagiging maaasahan natin sa panahon ng sakuna o pangangailangan, alinmang lahi ang apektado?=Mapagmalasakit>Magalang+Masipag at matiyaga<Masayahin",
"Alin sa mga sumusunod na katangiang Pilipino ang tumutukoy sa likas na kakayahan nating makibagay sa iba't ibang kultura at bumuo ng mapayapang ugnayan kaninuman?=Marunong makisama>Mapagmalasakit+Masipag at matiyaga<Masayahin",
"Alin sa mga sumusunod na katangiang Pilipino ang tumutukoy sa ating patuloy na pagsusumikap kahit dumaranas tayo ng matinding hirap o pagsubok?=Masipag at matiyaga>Magalang+Mapagmalasakit<Masayahin",
"Alin sa mga sumusunod na katangiang Pilipino ang ipinapakita ng pagiging madali nating ngumiti, tumawa, at magbigay ng aliw sa iba kahit sa kalagitnaan ng problema?=Masayahin>Magalang+Mapagmalasakit<Masipag at matiyaga",
"Alin sa mga sumusunod na katangiang Pilipino ang tumutukoy sa husay nating maghanap ng mga malikhaing paraan upang lutasin ang anumang problema?=Mapamaraan>Magalang+Mapagmalasakit<Masayahin",
"Bakit mahalagang igalang ng lahat ng mga tao sa mundo ang ibang mga lahi?=Para mapanatili ang kapayapaan>Para walang maging mahirap+Para magkaroon ng magandang edukasyon ang bawat isa<Para malutas ang lahat ng mga problema sa mundo",
"Alin sa mga sumusunod ang pandaigdigang adhikaing dapat suportahan ng bawa't Pilipino upang maisulong ang pagkakapantay-pantay ng lahat?=Paggalang sa mga karapatang pantao>Pagmamalasakit sa mga hayop+Pangangalaga ng mga likas na yaman<Paglaban sa polusyon",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagkakaisa ng mga bansa?=Paglaganap ng mga digmaan>Pagtutulungan ng mga organisasyon+Pagkakaibigan ng mga mamamayan<Malayang pagkakalakalan",
"Alin sa mga sumusunod ang hindi nagpapakita ng pakikiisa ng isang lahi sa iba?=Pagtanggi sa di-kinagisnang tradisyon>Pagtulong sa nasalanta ng bagyo+Pangangalaga sa kalikasan<Pagtangkilik sa mga produkto ng iba",
"Alin sa mga sumusunod ang maaari mong gawin para magpakita ng respeto sa kultura ng iba?=Pakikinig nang bukas ang isipan sa isang paniniwala>Pagpapatawa tungkol sa isang pambansang kasuotan+Pagpipilit ng sariling kultura sa iba<Pag-iwas sa mga dayuhan",
"Alin sa mga sumusunod ang isang mabisang paraang ginagamit ng mga Pilipino sa pakikilahok sa global advocacy campaigns?=Pagbabahagi ng makabuluhang impormasyon sa social media>Paggawa ng mga vlog na nagbibigay-aliw+Pagsusulat ng mga sariling pananaw sa isang diary<Panonood ng mga dokumentaryo",
"Ano ang bunga ng pagkilala at pagtanggap ng lahat sa pagkakaiba-iba ng mga kultura at paniniwala?=Kapayapaan>Pagkasira ng mga ugnayan+Pagpapagalingan ng mga lahi<Kawalan ng pag-asa ng mga tao",
"Alin sa mga sumusunod ang dapat nating iwasan sa pakikipag-ugnayan sa ibang lahi?=Diskriminasyon>Pagkilala sa pagkakaiba+Paggawad ng respeto<Pagpapakita ng malasakit",
"Alin sa mga sumusunod ang ipinapakita ng mga Pilipinong nagboboluntaryong tumulong sa ibang bansa?=Diwa ng bayanihan>Pagtangging magmalasakit+Pagnanais kumita nang malaki<Pag-aangat ng sarili sa iba",
"Alin sa mga sumusunod ang dapat gawin ng ating bansa kapag may umusbong na bagong isyung pandaigdigan?=Makilahok sa paghahanap ng solusyon>Obserbahan lamang ang ginagawa ng mga ibang bansa+Umiwas nang lubusan sa bagong isyu<Hanapan ng mali ang ginagawa ng mga ibang bansa",

);

?>

</head>

</bod

</html>