<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pakikiisa sa Pamayanan - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pakikiisa sa Pamayanan";
$_SESSION['tnum']="*3j";

$questions=array(

"Bakit may mga alituntunin ang bawa't barangay?=Upang mapanatili ang kaayusan, kaligtasan, at katahimikan sa lugar>Para maaliw ang mga mamamayan+Para magkaroon ng hanapbuhay ang mga tao<Upang may dahilan para manghuli ng mga tao",
"Alin sa mga ito ang halimbawa ng alituntuning pangkaligtasan sa barangay?=Pagbabawal sa mga batang maglaro sa kalsada>Pagbabawal sa paggamit ng videoke sa gabi+Pagbabawal sa mataas na presyo ng bilihin<Pagbabawal sa panloloko ng kapwa",
"Ano ang dapat gawin ng mga tao kapag malapit na ang 'curfew' sa kanilang lugar?=Umuwi sa bahay>Kumain sa restoran+Pumasok sa mall<Manood ng sine",
"Alin sa mga ito ang hindi isa sa mga bunga ng pagsunod ng mga mamamayan sa mga alituntunin ng barangay?=Paghihirap ng mga mamamayan>Pagiging ligtas ng mga tao+Kapayapaan sa komunidad<Pag-unlad ng pamayanan",
"Alin sa mga ito ang nagpapakita ng pakikiisa sa pamayanan?=Pagsuporta sa mga proyekto ng barangay>Hindi pagbabayad ng utang+Pag-iingay sa gabi<Hindi pagsali sa mga pagdiriwang",
"Alin sa mga ito ang nagpapakita ng pakikiisa sa pamayanan?=Paglilinis ng harap ng bahay>Pagtatapon ng basura sa ilog+Pagsusulat sa pader<Paninira ng mga halaman ng kapitbahay",
"Alin sa mga ito ang bahagi ng wastong pamamahala ng basura?=Pagsunod sa iskedyul ng pangungulekta ng basura>Paghahagis ng mga tirang pagkain sa kanal+Pag-iiwan ng sirang gamit sa tabi-tabi<Pagtatapon ng basura sa dagat",
"Upang hindi makaabala sa pagpapahinga ng mga kapitbahayepekto ng pagtitipid sa tubig at kuryente?=Mas mababang bayarin>Pagbaba ng kita+Mas bihirang pagkakasakit<Pagdami ng mga basura",
"Ano ang dapat nating gawin sa mga pampublikong pasilidad tulad ng mga museo at parke?=Pangalagaan ang mga ito>Iwasan ang mga ito+Manira ng mga gamit sa mga ito<Magsulat sa mga pader ng mga ito",
"Ano ang dapat mong gawin kung may makita kang kapitbahay na nagtatapon ng basura sa kanal?=Paalalahanan siya nang maayos>Sigawan siya at pagalitan+Huwag siyang pansinin<Magtapon din ng sariling basura sa kanal",
"Alin sa mga ito ang ginagawa ng isang huwarang mamamayan?=Pagsunod sa mga batas kahit walang nakatingin>Paglabag sa batas kapag walang nakakakita+Panlilinlang ng kapwa<Pagkakalat sa mga kalsada",
"Bakit hindi na dapat mag-ingay pa pagkatapos ng oras ng hapunan?=Upang hindi makaabala sa pagpapahinga ng mga kapitbahay>Para makapaglaro nang matagal sa labas+Upang hindi makaabala sa pagtatrabaho ng mga manggagawa<Para hindi mabulabog ang mga hayop sa labas",
"Ano ang dapat mong gawin kapag may makita kang mga sirang bumbilya ng ilaw sa inyong kalye?=Ipagbigay-alam ito sa mga opisyal ng barangay>Kunin at paglaruan ang mga sirang bumbilya+Itumba ang mga posteng may sirang bumbilya<Batuhin ang mga sirang bumbilya",
"Alin sa mga ito ang magagawa ng isang bata upang makatulong sa pagpapanatili ng kalinisan sa barangay?=Pagwawalis sa harap ng bahay>Pagtatapon ng balat ng kendi sa daan+Pagsusunog ng mga lumang papel sa bakuran<Pag-iiwan ng mga sirang laruan sa gilid ng kalye",
"Alin sa mga ito ang hindi halimbawa ng programa ng barangay na nakatuon sa pagmamalasakit sa kapwa?=Paglalagay ng mga palamuti sa parke>Pamamahagi ng damit sa mga nasunugan+Pagbibigay ng gamot sa mga maysakit<Pagpapakain sa mga binaha",
"Bakit hindi dapat maglaro ang mga bata sa kalsada?=Dahil baka mabundol sila ng sasakyan>Dahil baka magkapikunan sila+Dahil baka mapagod sila<Dahil baka umulan",
"Alin sa mga ito ang dapat mong gawin kapag naanyayahan ka sa isang 'tree planting' sa inyong barangay?=Magpaalam sa magulang at makilahok>Tumangging sumali at manatili na lang sa bahay+Magpanggap na may sakit para hindi maisali<Lumahok pero magreklamo nang paulit-ulit",
"Ano ang magiging bunga kung ang lahat ay susunod sa mga patakaran ng barangay?=Mas maayos at mapayapang barangay>Mas maingay at magulong barangay+Mas madalas na pag-aalitan<Kawalan ng tiwala sa barangay",
"Bakit mahalaga ang paggalang sa isang pampublikong espasyo?=Para hindi makaabala sa mga ibang nagpunta roon>Para makapagmataas sa mga tao roon+Para mainggit ang mga nandoon<Para makatanggap ng pabuya mula sa barangay",
"Ano ang dapat mong gawin kapag may pulong ang barangay tungkol sa kapayapaan?=Dumalo at makinig nang maigi>Mag-ingay sa pulong para mapansin+Dumalo pero maglaro lang ng cellphone doon<Maglaro sa gitna ng meeting",
"Ano ang dapat mong gawin sa mga nababasang paalala sa barangay hall?=Unawain at sundin ang mga ito>Balewalain ang mga ito+Gawing katatawanan ang mga ito sa isang vlog<Labagin ang mga ito",
"Ano ang malamang na maging bunga kung walang susunod sa mga patakaran ng barangay?=Pagdami ng mga kaguluhan at di-pagkakaunawaan>Pag-unlad ng mga negosyo+Mas mapayapang komunidad<Pagkakaisa ng mga tao",
"Bakit mahalagang kilalanin ang mga opisyal ng barangay?=Upang malaman kung sinu-sino ang mga mahihingan ng tulong kung kailangan>Para makautang sa kanila ng pera+Para maisisi sa kanila ang iyong mga problema<Para makaiwas sa kanila",
"Alin sa mga ito ang hindi nagpapakita ng pagiging responsableng kasapi ng barangay?=Paninira ng mga kagamitan sa mga pampublikong pasilidad>Pagtulong sa paglilinis ng paligid+Pagsunod sa curfew<Pagbibigay-galang sa mga nakatatanda",
"Alin sa mga ito ang dapat ipakita ng isang batang mamamayan sa kanyang barangay?=Pagsunod sa mga alituntunin>Pag-iwas sa mga gawaing-bahay+Paglalaro buong araw<Katamaran sa pag-aaral",

);

?>
</head>
</bod
</html>