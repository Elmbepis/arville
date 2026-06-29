<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matiyaga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matiyaga";
$_SESSION['tnum']="*77";

$questions=array(

"Ano ang pangunahing tungkulin ng mga magulang sa kanilang mga anak?=Pagbibigay ng pagkain, damit, at edukasyon>Pagbibigay ng mapaglilibangan+Paggawa ng mga gawaing bahay<Pag-aaral nang mabuti",
"Bakit mahalaga ang pagsunod ng mga anak sa kanilang mga magulang?=Upang maipakita ang paggalang at pagkilala sa kanilang awtoridad>Upang makaiwas sa parusa+Upang mahingi ang gusto nila<Upang hindi mapagalitan",
"Ano ang dapat pagtiyagaang gawin ng mga anak upang magtagumpay sa kanilang edukasyon?=Mag-aral nang mabuti>Maglaan ng oras sa kanilang hilig+Maging palabati sa mga guro<Tumulong sa gawaing-bahay",
"Paano nakakatulong ang pagtupad sa mga tungkulin sa pamilya sa pag-unlad ng positibong pagtingin sa sarili?=Nagbibigay ito ng pakiramdam ng kahalagahan at kasapatan>Nagbibigay ito ng espesyal na kakayahan+Nagdudulot ito ng popularidad sa paaralan<Nagdadagdag ito sa katalinuhan",
"Alin sa mga sumusunod ang tungkulin ng mga anak sa kanilang pamilya?=Pagsunod sa magulang>Pagkita ng sariling pera+Pagsunod sa mga alituntunin ng paaralan<Paglahok sa mga aktibidad ng barangay",
"Bakit mahalaga ang pakikilahok sa mga aktibidad ng pamilya?=Upang mapalakas ang ugnayan sa pamilya>Upang umunlad ang kabuhayan ng pamilya+Upang maiwasang mapagalitan<Upang makatipid sa mga gastusin",
"Anong katangian ang nalilinang sa pamamagitan ng pagtupad sa mga tungkulin sa pamilya?=Pagiging matiyaga>Pagiging masayahin+Pagiging madasalin<Pagiging magalang",
"Alin sa mga sumusunod ang maaaring gawin ng mga anak upang matutong maging responsable?=Tumulong sa mga gawaing-bahay>Maglaan ng oras sa libangan+Gumamit ng magalang na pananalita<Maging masayahin sa lahat ng pagkakataon",
"Alin sa mga sumusunod ang malamang na mangyayari kung hindi tutuparin ng anak ang kanyang mga tungkulin?=Hindi matututo ang anak ng pagiging matiyaga at responsable>Gaganda ang ugnayan sa loob ng pamilya+Mas madadalian ang anak sa pagkamit ng tagumpay<Uunlad ang pamilya",
"Paano nakakatulong ang matiyagang pagtupad sa mga tungkulin sa pamilya sa pagpapatibay ng ugnayan?=Lumalalim ang pagmamahalan at respeto sa bawat isa>Nagkakaroon ng magkakaibang pananaw sa layunin ng pamilya+Nagiging malayo ang loob ng lahat sa bawat isa<Dumadalas ang pagkakaroon ng di-pagkakaunawaan",
"Ano ang dapat gawin ng mga anak upang maiwasan ang mga masasamang gawain?=Huwag makipagkaibigan sa mga taong gumagawa ng hindi mabuti>Dumikit sa mga taong hindi natatakot sa batas+Sumunod lamang sa kung ano ang uso<Mas bigyang halaga ang paglilibang kaysa sa pagtitiyaga",
"Alin sa mga sumusunod ang isa sa mga layunin ng pagiging matiyaga sa pagtupad sa mga tungkulin?=Magpakita ng malasakit sa pamilya>Mapuri ng ibang tao+Magmukhang masipag sa paningin ng iba<Maging mas malikhain",
"Ano ang pangunahing layunin ng matiyagang pagpapanatili ng kalinisan sa kapaligiran?=Upang maiwasan ang pagkalat ng mga sakit>Upang maging maganda sa paningin ang paligid+Upang mapanatiling mabango ang paligid<Upang maging masayahin ang lahat",
"Paano nakakatulong sa personal na pag-unlad ng isang tao ang pagtupad sa mga gawaing-bahay?=Nagiging disiplinado siya at matiyaga>Nadadagdagan ang kanyang talento+Nagiging mas kilala siya sa paaralan<Nakakaiwas siyang mapagalitan ng magulang",
"Ano ang nagiging epekto sa isang tao ng patuloy na pagtupad sa mga tungkulin kahit mahirap ito?=Natututo siyang magtiyaga>Natututo siyang magreklamo+Natututo siyang maging sunud-sunuran lamang<Natututo siyang magmalaki",
"Ano ang pangunahing katangian ng pagiging matiyaga?=Pagpapatuloy ng gawain kahit mahirap>Pagiging magiliw sa lahat ng oras+Pagsunod sa anumang utos sa lahat ng pagkakataon<Pagmamadali sa pagtatrabaho",
"Bakit mahalaga ang pagiging matiyaga sa pag-aaral?=Upang matutunan ang mga kaalamang kailangan upang magtagumpay>Upang hangaan ng mga kaklase+Upang makaiwas sa paggawa ng mga gawaing-bahay<Upang mapuri ng mga guro",
"Alin sa mga sumusunod ang nagpapakita ng pagiging matiyaga?=Pagtapos ng gawain kahit na mahirap ito>Pagsuko kapag nahihirapan+Pagbalewala sa problema<Pag-iwas sa mga mahihirap na gawain",
"Ano ang epekto ng pagtitiyaga sa kalusugang mental ng isang tao?=Pagkakaroon ng tibay ng loob>Pag-aatubili sa pagpapasya+Pagiging masayahin sa lahat ng oras<Pagiging nerbyoso sa mga pagsubok",
"Alin sa mga sumusunod ang nangangailangan ng pagiging matiyaga?=Pagtulong sa mga gawaing-bahay araw-araw>Pagsunod sa oras ng pagkain+Paglalaan ng oras sa isang libangan<Pakikisama sa mga kaibigan",
"Bakit mahalaga ang tiyaga sa paghahanda ng pagkain para sa pamilya?=Upang matiyak na masustansya at maayos ang pagkain>Upang mabilis na maihain ang pagkain+Upang matiyak na mamahalin ang pagkain<Upang mabilis maubos ang niluto",
"Ano ang dapat gawin kapag nahihirapan sa isang gawain?=Magtanong at humingi ng tulong>Sumuko na lang at iwan ang gawain+Ipagawa sa iba ang gawain<Magreklamo nang walang humpay",
"Alin sa mga sumusunod ang halimbawa ng pagiging matiyaga sa loob ng paaralan?=Pagtatapos ng proyekto kahit maraming ginagawa>Pagpapaliban ng takdang-aralin+Pagpapagawa ng proyekto sa kaibigan<Pag-iwas sa mahihirap na asignatura",
"Ano ang tamang gawin kapag hindi agad nagtagumpay sa unang pagsubok?=Ulitin at pagbutihin pa ang susunod na pagsubok>Sumuko na lamang at maghanap ng ibang gagawin+Sabihing hindi sulit pag-aksayahan ng panahon ang gawain<Magalit sa sarili",
"Ano ang dapat gawin kung mayroong mahirap na proyekto sa paaralan?=Pag-aralan itong mabuti at tiyagaing matapos>Iwasan ito+Ipagpaliban ito hanggang sa huling minuto<Magbayad sa iba upang gawin ito",
"Ano ang dapat gawin ng anak kapag may pinagdadaanang mahirap na pagsubok ang kanyang pamilya?=Tumulong at magpakita ng tiyaga>Umiwas at magpakalayo+Magreklamo at sumuko<Magtago sa loob ng silid",
"Ano ang pangunahing layunin ng pagninilay sa mga isyu ng bayan?=Upang lubos na maunawaan ang mga isyu at makapagpasya nang wasto>Upang makahanap ng mabilis na solusyon sa bawat isyu+Upang makaiwas sa pakikialam sa mga isyung ito<Upang hindi na gumugol ng mahabang panahon sa pag-aanalisa ng mga isyu",
"Alin sa mga sumusunod ang isa sa mga epekto ng pagninilay sa usapin ng kahirapan?=Pagiging mas mapagmalasakit at aktibo sa pagtulong sa kapwa>Paninisi sa kapabayaan ng pamahalaan+Pag-iwas sa mga suliranin ng lipunan<Pagbibigay ng prayoridad sa pansariling interes",
"Alin sa mga sumusunod ang hindi halimbawa ng solusyong maaaring manggaling mula sa pagninilay sa isyu ng climate change?=Pag-aaksaya ng kuryente>Pagbabawas ng paggamit ng plastik+Pagtatanim ng mga puno<Pagreresaykel ng mga patapong gamit",
"Alin sa mga sumusunod ang halimbawa ng solusyong maaaring manggaling mula sa pagninilay sa mga isyung panlipunan?=Sumali sa mga programang pangkomunidad>Iwasan ang pagsuporta sa mga proyekto ng pamayanan+Ipaubaya sa iba ang paglutas ng mga problema<Tumutok lamang sa sariling kapakanan",
"Ano ang inaasahang epekto ng pagtitiyaga sa proseso ng pagninilay?=Malalim na pag-unawa sa problema at tamang solusyon>Madalian at hindi maingat na paggawa ng desisyon+Pag-aalinlangan sa pagharap sa mga isyung panlipunan<Matinding tensyon sa mga tao",
"Ano ang inaasahang epekto ng pagbabahagi ng mga natuklasan mula sa pagninilay?=Pagkahikayat ng ibang makilahok at tumulong>Pagpigil sa ibang mag-ambag+Pagkalito sa pamayanan<Pagbagal ng pag-aksyon sa mga isyu ng bayan",

);

?>

</head>

</bod

</html>