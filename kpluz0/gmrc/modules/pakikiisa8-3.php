<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pakikiisa sa Pagpapanatili ng Kapayapaan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pakikiisa sa Pagpapanatili ng Kapayapaan";
$_SESSION['tnum']="*8r";

$questions=array(

"Saan nagsisimula ang pagtataguyod ng kapayapaan at kaligtasan ng isang bayan?=Sa bawat tahanan>Sa pambansang pamahalaan+Sa lokal sa pamahalaan<Sa bawat paaralan",
"Paano natututunan ng mga bata ang pagpapanatili ng kapayapaan?=Sa pamamagitan ng maayos at magalang na komunikasyon sa loob ng tahanan>Sa pamamagitan ng pakikisalamuha sa mga kaibigan+Sa pamamagitan ng panonood ng mga bidyo sa internet<Sa pamamagitan ng pagtatapos ng hayskul",
"Alin sa mga sumusunod ang isang panlabas na pagkilos na maaaring gawin ng isang pamilya para makatulong sa pagpapanatili ng kapayapaan?=Pagsuporta sa mga programang pangkapayapaan ng barangay>Pagsali sa mga rally laban sa pamahalaan+Pagtrato sa mga kapitbahay bilang mga kalaban o katunggali<Hindi pakikiisa sa sama-samang pagbabantay ng kaligtasan ng sariling lugar",
"Alin sa mga sumusunod ang naidudulot ng pagsama ng pamilya sa mga gawaing panrelihiyon para sa kapayapaan?=Pagpapalalim ng espirituwal na pagkakaisa>Pagkakataong makipagtsismisan sa mga kapitbahay+Pagkawala ng ganang makipagtulungan sa kapwa<Pagkatanggal ng pagkainip sa bahay",
"Alin sa mga sumusunod ang inaasahang bunga ng pag-aambag o paglilingkod ng bawat pamilya para sa kabutihang panlahat?=Maunlad at nagkakaisang komunidad>Naghihikahos at watak-watak na komunidad+Pagpapagalingan ng mga pamilya<Paglaganap ng mga inggitan at alitan sa pamayanan",
"Ang pagdalo sa mga pulong o programang pangkapayapaan ng barangay bilang isang pamilya ay anyo ng alin sa mga sumusunod na paraan ng pakikiisa sa pagpapanatili ng kapayapaan?=Pagtatalaga ng oras para sa kapayapaang pampamayanan>Sama-samang pag-aambag ng tulong+Pamamagitan sa mga maliliit na di-pagkakaunawaan<Pagpapalaganap ng positibong mensahe at pagkakaisa",
"Ang pagmamasid sa paligid upang bantayan ang kaligtasan ng inyong pamilya at mga kapitbahay ay saklaw ng alin sa mga sumusunod na paraan ng pakikiisa sa pagpapanatili ng kapayapaan?=Pagiging katuwang sa inyong kapitbahayan>Sama-samang pag-aambag ng tulong+Pamamagitan sa mga maliliit na di-pagkakaunawaan<Pagpapalaganap ng positibong mensahe at pagkakaisa",
"Ang pakikilahok ng inyong pamilya sa mga 'earthquake/fire drills' sa inyong komunidad ay anyo ng alin sa mga sumusunod na paraan ng pakikiisa sa pagpapanatili ng kapayapaan?=Pagsuporta sa mga programang pangkaligtasan>Sama-samang pag-aambag ng tulong+Pamamagitan sa mga maliliit na di-pagkakaunawaan<Pagpapalaganap ng positibong mensahe at pagkakaisa",
"Ang paggamit ng inyong pamilya ng 'social media' upang magbahagi ng inspirasyon at mahahalagang impormasyon tungkol sa mga proyektong pangkapayapaan sa inyong lugar ay anyo ng alin sa mga sumusunod na paraan ng pakikiisa sa pagpapanatili ng kapayapaan?=Pagpapalaganap ng positibong mensahe at pagkakaisa>Sama-samang pag-aambag ng tulong+Pamamagitan sa mga maliliit na di-pagkakaunawaan<Aktibong pagsasabuhay ng mga Filipino values",
"Ang paggamit ng mapayapang pakikipag-usap upang mapakalma ang mga taong nasasangkot sa isang alitan ay anyo ng alin sa mga sumusunod na paraan ng pakikiisa sa pagpapanatili ng kapayapaan?=Pamamagitan sa mga maliliit na di-pagkakaunawaan>Sama-samang pag-aambag ng tulong+Pagtatalaga ng oras para sa kapayapaang pampamayanan<Pagpapalaganap ng positibong mensahe at pagkakaisa",
"Ang pagboboluntaryo sa mga gawain at paghahandog ng mga materyal na bagay ng inyong pamilya tuwing may krisis ay anyo ng alin sa mga sumusunod na paraan ng pakikiisa sa pagpapanatili ng kapayapaan?=Sama-samang pag-aambag ng tulong>Pamamagitan sa mga maliliit na di-pagkakaunawaan+Pagtatalaga ng oras para sa kapayapaang pampamayanan<Pagpapalaganap ng positibong mensahe at pagkakaisa",
"Bukod sa pagkakamit ng katiwasayan, alin sa mga sumusunod ang magandang bunga ng pakikiisa ng inyong pamilya sa pagpapanatili ng kapayapaan sa inyong komunidad?=Pagpapatibay ng mga ugnayan sa loob at labas ng inyong pamilya>Pagpapatunay na mas magaling ang inyong pamilya kaysa sa iba+Pagdami ng mga naiinggit sa inyong pamilya<Pagsikat ng inyong pamilya sa inyong barangay",
"Alin sa mga sumusunod ang nakahuhubog ng kamalayang panlipunan sa mga kabataan ng ating lipunan?=Aktibong pakikilahok ng kanilang pamilya sa mga gawaing pangkomunidad>Pagpasok nila sa isang mamahalin at eksklusibong paaralan+Pagkakaroon nila ng walang katapusang access sa internet<Pagbibigay sa kanila ng malaking baon araw-araw",
"Alin sa mga sumusunod ang hindi halimbawa ng pagiging katuwang sa kapitbahayan?=Panghihimasok sa personal na buhay ng isang kapitbahay>Pagbabantay at pag-uulat ng mga kahina-hinalang bagay+Pagtulong sa ginagawa ng isang matandang kapitbahay<Pagbabahagi ng nilutong pagkain sa kapitbahay",
"Alin sa mga sumusunod ang ipinapakita ng iyong pagdalaw sa isang matandang kapitbahay na wala nang kamag-anak?=Pagmamalasakit at pakikiisa>Pagkainggit+Pagmamalaki o pagyayabang<Panghihimasok at pakikialam",
"Ano ang dapat mong gawin kung may kaibigan o kakilala kang nakikipag-aaway?=Gumamit ng mapayapang pakikipag-usap upang mapalamig ang kanilang mga ulo>Sumugod sa kaaway ng kaibigan o kakilala mo+Huwag silang pansinin para hindi ka madamay<Gawing katatawanan ang away nila",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa panahon ng isang kalamidad o krisis?=Pangunguha ng relief goods para sa sarili kahit hindi naman nasalanta>Pagboboluntaryo sa mga relief operations+Pagbabahagi ng pera, damit, o pagkain sa mga nasalanta<Paglahok sa sama-samang pananalangin",
"Bakit mahalagang suportahan ng bawa't pamilya ang mga programa ng komunidad para sa 'disaster preparedness'?=Upang maging handa ang lahat sa oras ng kalamidad>Para hindi magalit ang mga nag-organisa nito+Para maiangat ang sariling pamilya sa iba<Upang hindi na kailangang magtulungan sa oras ng kalamidad",
"Alin sa mga sumusunod ang hindi kabilang sa mga \"Filipino values\" na dapat isabuhay ng pamilya upang mapanatili ang kapayapaan?=Pagiging makasarili>Pagbabayanihan+Paggalang at pagmamalasakit sa kapwa<Pakikipagkapwa-tao",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa pagdalo sa mga pulong ng barangay?=Pagsingit sa usapan nang walang kabuluhan>Pakikinig nang mabuti sa mga nagsasalita+Pagtatanong kung may hindi naiintindihan<Maayos na pagmumungkahi",
"Alin sa mga sumusunod ang malamang na maging epekto ng hindi pakikiisa ng pamilya sa mga gawaing pangkapayapaan ng komunidad?=Hindi pagkakaroon ng suporta sa oras ng kagipitan>Pagbuhos ng tulong ng iba kapag nangailangan+Paglalim at pagtibay ng koneksyon sa komunidad<Tiyak na kaligtasan sa oras ng kalamidad",
"Alin sa mga sumusunod ang natutunan ng mga bata mula sa mapayapang pag-aayos ng mga di-pagkakaunawaan sa loob ng tahanan?=Pagiging mapagpatawad>Pagiging maramdamin at madaling masaktan+Pagkakaroon ng matigas na puso<Paggamit ng dahas kung may kaalitan",
"Ano ang dapat mong gawin kung may mapansin kang kahina-hinalang aktibidad sa inyong kapitbahayan?=Iulat ito sa mga magulang o sa mga awtoridad ng barangay>Harapin ito nang mag-isa para maging bayani+Ilihim ito para walang mag-alala<Gawin itong katatawanan sa social media",
"Alin sa mga sumusunod ang hindi idinudulot ng 'prayer vigils' sa komunidad sa panahon ng krisis?=Panghihina ng pananampalataya>Espirituwal na suporta+Pag-asa<Pagkakaisa sa komunidad",
"Alin sa mga sumusunod ang karaniwang bunga ng pagiging mabuting halimbawa ng isang pamilya sa aktibong pakikiisa sa komunidad?=Pagtulad ng ibang pamilya sa kanilang pakikiisa>Pagkainis at pagkapahiya ng mga pamilyang hindi nakikiisa+Pagkainggit at paninira ng ibang pamilya sa kanilang pakikiisa<Pagkakawatak-watak ng mga tao sa komunidad",

);

?>

</head>

</bod

</html>