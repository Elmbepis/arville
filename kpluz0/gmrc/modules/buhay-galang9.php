<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paggalang sa Buhay - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paggalang sa Buhay";
$_SESSION['tnum']="*97";

$questions=array(

"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit mahalagang magkaroon ng wasto at mapagkakatiwalaang gabay sa pagkilala ng sariling seksuwalidad?=Upang makaiwas sa lahat ng mga tanong tungkol sa katawan>Upang hindi malito tungkol sa usaping ito+Upang matukoy ang mga maling impormasyon tungkol dito<Upang hindi bumigay sa peer pressure",
"Sino sa mga sumusunod ang una at pinakamahalagang mapagkukunan ng gabay sa pagkilala ng sariling seksuwalidad?=Ang iyong mga magulang>Ang iyong mga kaibigan at kaklase+Ang social media at internet<Ang iyong mga nakababatang kapatid",
"Bakit ang pamilya ang pinakamahalagang gabay sa pagkilala ng sariling seksuwalidad?=Dahil sila ang nakakakilala sa iyo mula pagkabata>Dahil sila ang nagbabayad ng iyong pag-aaral+Dahil sila ang may kontrol sa iyong buhay<Dahil sila ang laging tama sa lahat ng bagay",
"Alin sa mga sumusunod ang naglalarawan sa kapaligirang dapat likhain ng pamilya para sa pag-uusap tungkol sa seksuwalidad?=Bukas at hindi mapanghusga>Istrikto at puno ng pagbabawal+Mapanghusga at mapanisi<Sarado at hindi bukas sa pag-uusap",
"Bakit ikinukubli ng mga kabataan ang kanilang mga tanong tungkol sa seksuwalidad?=Dahil natatakot silang mapagalitan o mapagtawanan>Dahil alam na nila ang mga sagot dito+Dahil natatakot silang mausisa ang iba pa nilang mga lihim<Dahil nakakatamad para sa kanila ang magtanong",
"Alin sa mga sumusunod ang hindi kabilang sa mga katangian ng impormasyong dapat ibigay ng pamilya sa kabataan tungkol sa seksuwalidad?=Nagmula sa ibang kabataan>Tumpak+Naaangkop sa edad<Naaangkop sa antas ng pag-unawa",
"Sa pangkalahatan, paano karaniwang nabubuo ng mga kabataan ang kanilang konsepto ng malusog na relasyon?=Sa pamamagitan ng nakikita nila sa kanilang pamilya>Sa pamamagitan ng sinasabi ng kanilang mga kaibigan+Sa pamamagitan ng mga pelikula at teleserye<Sa pamamagitan ng mga aklat at iba pang babasahin tungkol dito",
"Alin sa mga sumusunod ang karaniwang epekto sa kabataan ng pag-iwas ng pamilya sa usaping seksuwalidad?=Paghahanap nila ng mga sagot sa mga mapanganib na lugar>Pagkawala ng kanilang mga tanong tungkol dito+Pagkakaroon ng kalinawagan tungkol dito<Pagtibay ng kanilang ugnayan sa pamilya",
"Alin sa mga sumusunod na paraan ng paggabay ng iyong pamilya ang tumutukoy sa pagtataguyod ng bukas at hindi mapanghusgang komunikasyon?=Paglikha ng magandang kapaligiran>Pagbibigay ng impormasyong tumpak at naaangkop sa edad+Pagiging mabuting halimbawa<Paggalang sa bilis ng pag-unlad ng bawat kabataan",
"Alin sa mga sumusunod na paraan ng paggabay ng iyong pamilya ang tumutukoy sa pagpapaliwanag ng mga kaalaman sa paraang naaayon sa iyong antas ng pag-unawa at kahandaan?=Pagbibigay ng impormasyong tumpak at naaangkop sa edad>Paglikha ng magandang kapaligiran+Pagiging mabuting halimbawa<Paggalang sa bilis ng pag-unlad ng bawat kabataan",
"Ang pagpapakita ng iyong mga magulang ng paggalang at pagmamahal sa isa't isa ay halimbawa ng alin sa mga sumusunod na paraan ng paggabay ng iyong pamilya?=Pagiging mabuting halimbawa>Pagtatakda ng mga alituntunin+Pagbibigay ng impormasyong tumpak at naaangkop sa edad<Paggalang sa bilis ng pag-unlad ng bawat kabataan",
"Alin sa mga sumusunod na paraan ng paggabay ng iyong pamilya ang tumutukoy sa hindi pag-iwas o paghadlang sa paghahanap mo ng mga kasagutan sa mga bagay na nakagugulo sa iyong isipan?=Paghikayat sa mga tanong>Pagbibigay ng impormasyong tumpak at naaangkop sa edad+Pagiging mabuting halimbawa<Paggalang sa bilis ng pag-unlad ng bawat kabataan",
"Alin sa mga sumusunod na paraan ng paggabay ng iyong pamilya ang tumutukoy sa hindi pagmamadali o pamimilit na matutunan mo ang konsepto ng pagtuklas ng iyong seksuwalidad kung hindi ka pa handa?=Paggalang sa bilis ng pag-unlad ng bawat kabataan>Pagbibigay ng impormasyong tumpak at naaangkop sa edad+Pagiging mabuting halimbawa<Paghikayat sa mga tanong",
"Alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad ang tumutukoy sa paglalaan ng maikling panahon minsan sa isang linggo kung saan malaya kang makapagtatanong sa iyong mga magulang at nakatatandang kapatid?=Pakikipag-usap sa pamilya>Paggamit ng mga sanggunian+Pagtatakda ng mga alituntunin<Pagtatakda ng personal na hangganan",
"Ang pagbabasa ng mga aklat o mapagkakatiwalaang online resources kasama ang pamilya ay saklaw ng alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad?=Paggamit ng mga sanggunian>Pakikipag-usap sa pamilya+Pagtatakda ng mga alituntunin<Paggalang sa sariling mga tanong",
"Ang pakikipagkasundo sa pamilya sa isang patakaran tungkol sa pakikipag-'date' ay halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad?=Pagtatakda ng mga alituntunin>Pagtatakda ng personal na hangganan+Paggamit ng mga sanggunian<Paggalang sa sariling mga tanong",
"Alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad ang tumutukoy sa pagtanggi sa mga situwasyong hindi komportable para sa iyo?=Pagtatakda ng personal na hangganan>Paggamit ng mga sanggunian+Paggalang sa sariling mga tanong<Pakikipag-usap sa pamilya",
"Alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad ang tumutukoy sa malayang paghingi ng kaalaman mula sa iba tungkol sa mga bagay na hindi mo nauunawaan?=Paggalang sa sariling mga tanong>Pagtatakda ng mga alituntunin+Pagtatakda ng personal na hangganan<Hindi pagkukumpara ng sarili sa iba",
"Alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad ang nangangahulugang ang bawat tao ay may sariling takbo ng pag-unlad kaya hindi mainam ang paghahambing?=Hindi pagkukumpara ng sarili sa iba>Pagtatakda ng mga alituntunin+Pagtatakda ng personal na hangganan<Paggalang sa sariling mga tanong",
"Alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad ang tumutukoy sa pakikipag-usap nang hindi nahihya sa guidance counselor, psychologist, o doktor kung kinakailangan?=Paghingi ng propesyonal na tulong>Pakikinig muna+Pagtitiwala sa pamilya<Paggamit ng mga sanggunian",
"Ang hindi pagsingit o pagputol sa magulang na nagpapaliwanag ay saklaw ng alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad?=Pakikinig muna>Paghingi ng propesyonal na tulong+Pagtatakda ng mga alituntunin<Paggamit ng mga sanggunian",
"Ang pagbabahagi sa iyong mga magulang kung may pagdududa ka tungkol sa seksuwal mong pagkakakilanlan ay halimbawa ng alin sa mga sumusunod na paraan ng pagkilala sa sariling seksuwalidad?=Pagtitiwala sa pamilya>Paghingi ng propesyonal na tulong+Paggalang sa sariling mga tanong<Pakikinig muna",
"Paano dapat tumugon ang pamilya sa mga tanong ng kabataan tungkol sa seksuwalidad?=Sumagot nang tapat at mahinahon>Umiwas at magpalit ng paksa+Magalit at sabihing bawal ang mga tanong na iyon<Sabihing sa paaralan na lamang itanong",
"Alin sa mga sumusunod ang hindi kabilang sa tatlong bagay na palaging kaakibat ng bawat desisyon tungkol sa seksuwalidad?=Gastusin>Katangian+Gampanin<Kahihinatnan",
"Alin sa mga sumusunod ang tunay na kahulugan ng paghahanda ng pamilya sa kabataan?=Bigyan siya ng kakayahang harapin ang mundo nang may karunungan at paninindigan>Kontrolin ang bawat kilos niya+Ibigay lahat ng pangangailangan niya kahit nasa hustong gulang na siya<Magdesisyon para sa kanya",
 
);

?>

</head>

</body

</html>