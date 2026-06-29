<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masunurin sa Pamayanan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masunurin sa Pamayanan";
$_SESSION['tnum']="*5k";

$questions=array(

"Paano tinitingnan ng isang mabuting tagasunod ang batas?=Bilang isang kasunduang panlipunan para sa kapakanan ng lahat>Bilang isang hadlang sa kanyang kalayaan+Bilang isang pabigat sa buhay ng mga mamamayan<Bilang isang paraan ng pamahalaan para kumita",
"Saan nagmumula ang pagsunod ng isang masunuring mamamayan?=Sa malayang pagpapasya at panloob na paninindigan>Sa takot na mahuli at maparusahan+Sa pagnanais na mapuri ng iba<Sa pag-asang makakakuha ng pabuya",
"Ano ang ibig sabihin ng integridad sa pagiging masunurin sa mga alituntunin?=Pagsunod kahit walang nakakakita>Pagsunod kung may nakakakita lamang+Palihim na paggawa ng mali<Pagsunod sa mga batas lamang na nais sundin",
"Alin sa mga sumusunod na paraan ng pagiging mabuting tagasunod ang tumutukoy sa araw-araw na paggawa ng mga takdang gawain at tungkulin para makagawian ang mga ito?=Pagsasanay sa disiplina>Pag-alam sa mga batas at alituntunin+Pagtulong sa pagpapalaganap ng kamalayan<Pag-unawa sa layunin ng batas",
"Alin sa mga sumusunod na paraan ng pagiging mabuting tagasunod ang tumutukoy sa pagbabahagi sa mga kapamilya at kakilala ng mga nalalamang impormasyon tungkol sa pagsunod sa mga alituntunin at batas?=Pagtulong sa pagpapalaganap ng kamalayan>Pag-alam sa mga batas at alituntunin+Pagkilos nang maagap<Pag-unawa sa layunin ng batas",
"Alin sa mga sumusunod na paraan ng pagiging mabuting tagasunod ang tumutukoy sa pagbabasa at pag-aaral ng mga kautusan ng pamahalaan para maunawaan at masunod ang mga ito?=Pag-alam sa mga batas at alituntunin>Pagtulong sa pagpapalaganap ng kamalayan+Pagkilos nang maagap<Pagiging huwaran ng tamang pag-uugali",
"Alin sa mga sumusunod na paraan ng pagiging mabuting tagasunod ang tumutukoy sa pag-intindi kung para saan ang bawat kautusan ng pamahalaan at kung paano ito makakatulong sa buhay ng mga mamamayan?=Pag-unawa sa layunin ng batas>Pagtulong sa pagpapalaganap ng kamalayan+Pagkilos nang maagap<Pagiging huwaran ng tamang pag-uugali",
"Alin sa mga sumusunod na paraan ng pagiging mabuting tagasunod ang tumutukoy sa pagiging isang buhay na halimbawa ng kusang pagsunod sa mga batas at patakaran?=Pagiging huwaran ng tamang pag-uugali>Pag-alam sa mga batas at alituntunin+Pagkilos nang maagap<Pag-unawa sa layunin ng batas",
"Alin sa mga sumusunod na paraan ng pagiging mabuting tagasunod ang tumutukoy sa pagtugon o paghahandang makatugon sa mga alituntunin bago pa maging suliranin ang pagsunod  sa mga ito?=Pagkilos nang maagap>Pag-alam sa mga batas at alituntunin+Pagiging huwaran ng tamang pag-uugali<Pag-unawa sa layunin ng batas",
"Ano ang pundasyon ng maayos na pagpapatupad ng mga batas at alituntunin?=Mga mamamayang may integridad sa pagsunod>Pagkakaroon ng maraming pulis at tanod+Pagpapataw ng mga malulupit na parusa<Pagkakaroon ng maraming batas",
"Saan dapat magsimula ang pagsasanay sa disiplina sa pagsunod sa mga alituntunin?=Sa tahanan at paaralan>Sa munisipyo+Sa simbahan<Sa mga kalaro at kaibigan",
"Alin sa mga sumusunod ang hindi kongkretong halimbawa na ang pagiging masunurin ay maaaring magligtas ng iyong buhay?=Pagkakamit ng mataas na marka dahil sa paggawa ng magandang proyekto>Pagkaligtas sa sunog matapos sumunod sa fire drill+Pag-iwas sa pagkabundol ng dyip dahil sa wastong pagtawid<Hindi pagkalunod matapos sundin ang isang babala",
"Bakit mahalaga ang pag-alam sa mga batas at alituntunin?=Upang makaiwas sa hindi sinasadyang paglabag>Upang madaling makapagpalusot kapag nahuli sa paglabag+Para makapagmalaki sa mga kapitbahay<Para mapuri ng mga otoridad",
"Ano ang ibig sabihin ng pagsunod nang maagap?=Pagsunod agad bago magkaroon ng suliranin>Paghihintay munang mahuli bago sumunod+Paggawa ng paraan para makalusot sa paglabag<Pagrereklamo muna bago sumunod",
"Bakit sinasabing epektibong paraan ng panghihikayat ang pagiging huwaran sa kagandahang-asal?=Dahil nauudyok ang ibang gumawa rin ng mabuti kapag nakasaksi sila ng kabutihan>Dahil nauudyok ang ibang gumawa ng mabuti kapag nakakita sila ng pinaparusahan+Dahil madali mong malilinlang ang mga taong humahanga sa iyo<Dahil pagsisilbihan ka ng mga taong natatakot sa iyong masamang asal",
"Alin sa mga sumusunod ang isang paraan ng pagtulong sa pagpapalaganap ng kamalayan tungkol sa pagiging masunurin?=Pagbabahagi ng impormasyon tungkol sa batas>Pagkakalat ng pekeng balita tungkol sa batas+Pag-iwas sa mga usapang may kinalaman sa batas<Pagpuna sa mga taong hindi alam ang batas",
"Alin sa mga sumusunod ang mahalagang elemento ng tunay na pagsunod sa isang batas?=Pag-unawa sa layunin ng batas>Takot sa multa at parusa+Pagnanais mapuri ng iba<Pagiging sunud-sunuran sa lahat",
"Alin sa mga sumusunod ang layunin ng batas na nagbabawal sa pagtawid kung saan-saan?=Kaligtasan mula sa sakuna>Katahimikan ng lugar+Kaunlaran ng mga negosyo<Kalinisan ng paligid",
"Alin sa mga sumusunod ang layunin ng batas na nagbabawal sa pagtatapon ng balat ng kendi sa kalye?=Kalinisan ng paligid>Katahimikan ng lugar+Kaunlaran ng mga negosyo<Kaligtasan mula sa sakuna",
"Alin sa mga sumusunod ang layunin ng batas na nagbabawal sa pagpapatugtog ng malakas na musika pagsapit ng ika-sampu ng gabi?=Katahimikan ng lugar>Kalinisan ng paligid+Kaunlaran ng mga negosyo<Kaligtasan mula sa sakuna",
"Alin sa mga sumusunod ang layunin ng batas na nagbabawal sa pagnanakaw ng mga produkto?=Kaunlaran ng mga negosyo>Kalinisan ng paligid+Katahimikan ng lugar<Kaligtasan mula sa sakuna",
"Ano ang malamang na maging bunga ng hindi pagiging mabuting tagasunod ng karamihan sa pamayanan?=Mga kaguluhan at di-pagkakaunawaan>Katiwasayan sa komunidad+Magandang samahan at pagkakaisa ng mga tao<Pag-asenso ng mga negosyo",
"Alin sa mga sumusunod ang malamang na epekto ng pagkakaroon ng bawa't pamilya ng talakayan tungkol sa pagsunod sa mga alituntunin?=Nagiging sama-samang pagkilos ang pagsunod>Nagkakaroon ng mga di-pagkakaunawaan sa pamilya+Nagiging personal o pansariling pagkilos lamang ang pagsunod<Natututong lumabag sa batas ang karamihan",
"Alin sa mga sumusunod na pangungusap ang hindi wasto tungkol sa pagkakaiba ng pagiging mabuting tagasunod sa pagiging sunud-sunuran lamang?=Nauunawaan at pinahahalagahan ng sunud-sunuran ang layunin ng batas>Naiintindihan ng mabuting tagasunod ang epekto ng hindi pagsunod sa batas+Ang mabuting tagasunod ay may malasakit<Ang sunud-sunuran ay hindi nag-iisip para sa sarili",
"Alin sa mga sumusunod ang nagpapakita ng maagap na pagsunod sa isang bagong ordinansa ukol sa paghihiwalay ng basura?=Paghahanda ng dalawang magkahiwalay na basurahan bago ito ipatupad>Paghahanda ng dalawang magkahiwalay na basurahan kapag nagsimula na itong ipatupad+Hindi pagkakaroon ng dalawang magkahiwalay na basurahan kahit ipinatupad na ito<Pagrereklamo sa barangay bago ito ipatupad",
"Alin sa mga sumusunod ang hindi tanda ng pagiging isang mabuting tagasunod?=Paglabag sa batas dahil wala namang hinuhuli>Pagtulong sa kaibigang makasunod sa isang patakaran+Pagsunod sa batas kahit walang nakatingin<Pagpapaalala sa iba tungkol sa mga alituntunin ng isang lugar",

);

?>

</head>

</bod

</html>