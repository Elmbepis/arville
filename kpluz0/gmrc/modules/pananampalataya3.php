<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagtugon sa Pananampalataya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagtugon sa Pananampalataya";
$_SESSION['tnum']="*3m";

$questions=array(

"Alin sa mga ito ang nagpapakita ng malalim na pananampalataya?=Aktibong pakikibahagi sa mga gawaing panrelihiyon>Paninira sa mga relihiyon ng iba+Pag-iwas sa mga sama-samang pananalangin<Paggawa ng mabuti para may makuhang mas malaking kapalit",
"Alin sa mga ito ang pinakamainam na paraan upang mapalapit sa Diyos?=Pagsisimba at pakikinig nang mabuti sa mga turo>Pamamasyal sa mall pagkatapos magsimba+Pag-iingay sa loob ng simbahan<Pagsisimba nang hindi nakikinig sa mga turo",
"Bakit mahalaga ang pakikibahagi sa mga gawaing panrelihiyon?=Pinalalakas nito ang ating pananampalataya>Nagiging daan ito para yumaman+Pinahahaba nito ang iyong buhay<Nagtuturo ito ng pagmamalaki sa kapwa",
"Alin sa mga ito ang benepisyo ng pakikibahagi sa mga gawaing panrelihiyon?=Mas matibay na ugnayan sa ating kapwa>Mas mataas na antas sa lipunan+Pagiging sikat<Pagkakaroon ng kapangyarihan sa pamahalaan",
"Bilang bata, alin sa mga ito ang maaari mong gawin para makapaglingkod sa inyong lugar ng pagsamba?=Pag-aayos at paglilinis ng lugar>Pag-aambag ng malaking halaga+Pagdaraos ng misa<Pag-oorganisa ng malaking pagdiriwang",
"Alin sa mga ito ang magagawa mo para maipakita mo ang iyong pananampalataya sa iyong pang-araw-araw na buhay?=Pagsasakilos ng kagandahang-asal sa lahat ng oras>Pagdarasal lamang kung may gustong hilingin+Pagpapanggap na mabait sa harap ng pari<Pagdarasal lamang kung nais humingi ng tawad",
"Alin sa mga ito ang halimbawa ng isang gawaing panrelihiyong nagpapakita ng pagmamalasakit sa kapwa?=Pagbibigay ng mga damit sa mga nasunugan>Pagdaraos ng marangyang pagdiriwang+Paghingi ng donasyon mula sa mayayamang kapanalig<Pag-aaral ng Bibliya",
"Bakit mahalagang igalang nating lahat ang paniniwala ng iba?=Para magkaroon ng kapayapaan>Para maiangat ang sarili sa kapwa+Para maipakitang mas maganda ang sariling pananampalataya<Para makahingi ng pabor sa kanila",
"Ano ang dapat mong gawin sa iyong mga lumang laruan o damit na mapapakinabangan pa?=Iambag ang mga ito sa mga proyektong pangkawanggawa ng simbahan>Itapon ang mga ito sa basurahan+Sunugin ang mga ito sa bakuran<Sirain ang mga ito at ipamigay pagkatapos",
"Alin sa mga ito ang magandang gawin kung may gaganaping 'Bible study' sa inyong lugar?=Magpaalam sa magulang at sumali>Magtago sa bahay para hindi maisali+Pagtawanan ang mga sumali<Guluhin ang aktibidad",
"Alin sa mga ito ang hindi magandang dahilan kung bakit ka naglalaan ng oras para sa pananalangin araw-araw?=Upang humiling ng maraming pera>Upang magpasalamat+Upang humingi ng gabay<Upang humingi ng tawad",
"Alin sa mga ito ang hindi nagpapakita ng paggalang sa paniniwala ng iba?=Pagtawa sa kanilang paraan ng pagdarasal>Pagrespeto sa kanilang lugar ng pagsamba+Pagtahimik kapag sila ay nagdarasal<Pagkilala sa kanilang mga pagdiriwang",
"Ano ang karaniwang epekto sa pamayanan ng sama-samang pananalangin ng mga tao?=Mas matibay na pagkakaisa>Mas madalas na alitan sa relihiyon+Kawalan ng tiwala sa iba<Paglaganap ng inggitan",
"Ano ang dapat mong gawin kapag may kilala kang batang hindi nagsisimba?=Hikayatin siyang magsimba sa pamamagitan ng magagandang kuwento sa Bibliya>Tuksuhin siya at pagtawanan+Sigawan siya at pagalitan<Huwag siyang pansinin",
"Alin sa mga ito ang nagpakikita ng pagiging responsableng kasapi ng iyong relihiyon?=Pagsunod sa mga turo nito>Pagrereklamo sa lahat ng mga gawain+Paglalaro sa loob ng simbahan<Pag-iwas sa pagsamba o pagdarasal",
"Anong damdamin ang dapat mong taglayin kapag tumutulong ka sa iyong kapwa?=Pagmamahal at tunay na pagmamalasakit>Pag-aatubiling tumulong+Pagkainis sa mga nangangailangan<Pagkainip sa uwian",
"Alin sa mga ito ang hindi mo dapat gawin sa loob ng lugar ng pagsamba?=Kumain ng baon>Magdasal nang tahimik+Makinig sa nagsasalita<Umupo nang maayos",
"Ano ang dapat mong gawin kung hindi mo naiintindihan ang itinuro sa misa?=Magtanong sa magulang o guro pagkatapos>Magpanggap na naiintindihan mo ito+Magtanong sa isang bata sa labas<Kalimutan na lang ito at balewalain",
"Ano ang pangunahing dahilan kung bakit matibay ang samahan ng mga taong magkakapanalig sa pananampalataya?=Dahil nagkakasama sila sa pagdarasal, pagsamba, at pagdiriwang>Dahil magkakalapit ang mga tahanan nila+Dahil nagkikita sila habang namamasyal sa mall<Dahil nagkakakuwentuhan sila sa social media",
"Alin sa mga ito ang mainam gawin para sa isang kaibigang may sakit?=Ipagdasal siya at dalawin kung maaari>Pagkatuwaan ang kanyang sakit+Iwasan siya at kalimutan<Mag-imbento ng mga kuwento tungkol sa kanyang sakit",
"Ano ang dapat mong gawin kapag may makita kang pulubi sa labas ng simbahan?=Bigyan siya ng pagkain o pera sa abot na makakaya>Tuksuhin siya at pagtawanan+Iwasan siya at huwag pansinin<Itaboy siya sa malayo",
"Alin sa mga ito ang dapat mong gawin para mapalalim ang iyong pananampalataya?=Pagdarasal at paggawa ng kabutihan araw-araw>Pagbili ng mamahaling Bibliya+Pagpapanggap na isang pastor sa social media<Pagsisimba kung kailan lang naisin",
"Alin sa mga ito ang hindi paraan ng wastong pagtugon sa iyong pananampalataya?=Paninira sa mga taong iba ang paniniwala>Pagdarasal nang taimtim+Pagtulong sa mga kapos sa buhay<Pag-aaral ng mga banal na kasulatan",
"Alin sa mga ito ang makakatulong sa pagpapanatili ng kapayapaan sa inyong pamayanan?=Paggalang sa lahat ng mga relihiyon>Pagtangging makipagkaibigan sa mga taong may ibang relihiyon+Panlalait sa ibang mga pananampalataya<Hindi pagsasabuhay ng mga turo ng sariling relihiyon",
"Ano ang pangunahing layunin ng pagtugon sa pananampalataya?=Mapalalim ang sariling ugnayan sa Diyos>Mapatibay ang ugnayan sa ibang tao+Mapaunlad ang sariling pamumuhay<Makilala sa buong komunidad",

);

?>

</head>

</bod

</html>