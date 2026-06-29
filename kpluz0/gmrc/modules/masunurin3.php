<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masunurin - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masunurin";
$_SESSION['tnum']="*3b";

$questions=array(

"Alin sa mga sumusunod ang halimbawa ng pagiging masunurin sa pamilya?=Pagsasakilos ng mabubuting kaugalian ng pamilya>Pagkalimot sa mabubuting tradisyon ng pamilya+Pagtatago ng nararamdaman sa pamilya<Pag-uuna ng mga kaibigan kaysa sa pamilya",
"Alin sa mga sumusunod ang halimbawa ng paggalang sa matatanda?=Pagmamano sa kanila>Pag-iwas sa kanila+Pakikipagtalo sa kanila<Pagsasantabi ng mga payo nila",
"Anong kaugaliang Pilipino ang naipapakita sa pagtulong sa mga gawaing-bahay?=Pagpapakita ng pagkakaisa>Pagkamahabagin+Pagiging matapang<Pagiging masayahin",
"Ang malapit na ugnayan sa pamilya ay maipapakita sa pamamagitan ng alin sa mga sumusunod?=Pagkain nang sabay-sabay>Pagkakanya-kanya sa mga gawain+Pag-alis nang hindi nagpapaalam<Paglilihim ng problema",
"Ang malapit na ugnayan sa pamilya ay maipapakita sa pamamagitan ng alin sa mga sumusunod?=Pagdarasal nang sama-sama>Pagkukulong sa kanya-kanyang silid+Pagdating nang hindi bumabati<Pagkakaila ng nararansan",
"Ano ang bunga ng pagsunod sa mga mabubuting kaugalian ng pamilyang Pilipino?=Maayos na ugnayan sa pamilya>Pagdami ng mga problema ng pamilya+Pagkawatak-watak ng pamilya<Kawalan ng pag-asa ng bawat kasapi ng pamilya",
"Alin sa mga sumusunod ang ugaling dapat dalhin sa paaralan ng isang bata mula sa tahanan?=Pagiging masunurin>Pagiging makasarili+Pagiging mapagmalaki<Kawalan ng tiyaga",
"Ano ang epekto ng mabubuting kaugalian ng pamilyang Pilipino sa komunidad?=Pagpapalaganap ng respeto at pagmamalasakit>Mas madalas na di-pagkakaunawaan+Kawalan ng pagkakaisa ng mga mamamayan<Pagdami ng mga problema sa komunidad",
"Ang mabubuting kaugaliang Pilipino ay maipapasa sa susunod na henerasyon sa pamamagitan ng alin sa mga sumusunod?=Pagsasabuhay at pagtuturo ng mga ito>Pagbabaon ng mga ito sa limot+Pagsasagawa ng mga modernong aktibidad<Pagpapalaganap ng mga kanluraning tradisyon",
"Alin sa mga sumusunod ang halimbawa ng pagpapakita ng pagkakaisa sa pamilya?=Pagtulong sa paghahanda ng pagkain>Pag-iwas sa paglilinis ng bahay+Hindi pagsunod sa mga nakatatanda<Panunukso sa nakababatang kapatid",
"Maaari tayong maging mabuting halimbawa sa kapwa sa pamamagitan ng alin sa mga sumusunod?=Pagsunod sa mabubuting kaugaliang Pilipino>Pagsisimula ng mga gulo+Pagsuway sa mga alituntunin<Pagmamalaki sa kapwa",
"Ano ang dapat mong gawin kapag mayroon kang di-pagkakaunawaan sa isang kapatid?=Makipag-usap sa kanya nang mahinahon at taos-puso>Makipagtalo sa kanya nang pasigaw+Iwasan siya nang mahabang panahon<Isisi sa kanya ang nangyari",
"Bakit mahalagang sumunod ang bawat mag-aaral sa mga alituntunin ng paaralan?=Upang mapanatili ang kaayusan dito>Para maiangat ang sarili sa iba+Para hindi mapagalitan ng guro<Para hindi ipatawag ang magulang",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagmamahal sa pamilya?=Pag-iwas sa mga aktibidad ng pamilya>Pagsunod sa utos ng magulang+Pagtulong sa mga gawaing-bahay<Pagpapakita ng respeto sa lahat",
"Ano ang dapat mong gawin kapag may makita kang matandang may dalang mabigat?=Tulungan siya>Huwag siyang pansinin+Harangan siya<Pagtawanan siya",
"Alin sa mga sumusunod ang magiging bunga ng pagiging masunurin sa bahay?=Magandang ugnayan sa pamilya>Madalas na pagtatampuhan+Kawalan ng tiwala sa sarili<Paglayo ng kalooban sa pamilya",
"Bakit kailangan mong tumulong sa iyong mga kapatid?=Upang maipakita ang iyong suporta sa kanila>Upang magkaroon sila ng utang na loob sa iyo+Para makahingi sa kanila ng pabor<Para hindi mapagalitan ng mga magulang",
"Alin sa mga sumusunod ang halimbawa ng hindi magandang ugali?=Pagsagot-sagot sa nakatatanda>Pakikinig sa payo ng magulang+Paggamit ng magalang na pananalita kaninuman<Pagtupad sa mga tungkulin sa bahay",
"Alin sa mga sumusunod ang hindi nagpapakita ng malasakit sa pamilya?=Pag-iiwan ng mga gamit sa sahig>Pagtulong sa paglilinis ng bahay+Kusang pagdidilig ng mga halaman sa hardin<Pagtulong sa paghahanda ng hapunan",
"Alin sa mga sumusunod ang nagpapakita ng pagiging magalang?=Maayos na pakikitungo sa kapwa>Pagmamataas sa mga dukha+Panlalait sa kapwa<Hindi pagsunod sa mga nakatatanda",
"Alin sa mga sumusunod ang hindi mo dapat gawin tuwing may pagtitipon ang inyong pamilya?=Pag-alis sa bahay nang palihim>Pagtulong sa paghahanda+Pag-aasikaso sa mga bisita<Pagsunod sa mga utos ng magulang",
"Ano ang dapat mong gawin kapag nakita mong nahihirapan sa paglalakad si Lola?=Alalayan siya agad>Huwag siyang pansinin+Gawing biro ang kanyang paglalakad<Pagalitan siya para umupo",
"Ano ang dapat mong gawin kapag sinabihan ka ng iyong gurong mag-aral pa nang mas mabuti?=Sundin ito nang buong puso>Magtanong kung bakit+Magtampo sa kanya nang palihim<Tumangging sumunod sa kanya",
"Alin sa mga sumusunod ang nagpapakita ng pagiging responsable sa tahanan?=Pagtupad sa mga nakatokang gawain>Pag-iwas sa mga gawaing-bahay+Paglalaro sa labas buong araw<Pagsasantabi ng mga takdang aralin",
"Alin sa mga sumusunod ang dapat ipakita sa pagtanggap ng puna mula sa iba?=Pag-unawa>Pagtatampo+Galit<Pagkainis",
"Ano ang dapat mong gawin kapag pinagsabihan ka ng iyong mga magulang?=Makinig at magpasalamat>Sumagot nang pagalit sa kanila+Umiyak nang matagal<Tumakbong palabas ng bahay",

);

?>
</head>
</bod
</html>