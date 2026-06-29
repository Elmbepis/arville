<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Patas - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Patas";
$_SESSION['tnum']="*8n";

$questions=array(

"Alin sa mga sumusunod ang susi para maramdaman ng isang mamamayan ang kanyang halaga sa isang makataong komunidad?=Pagbibigay sa kanya ng puwang upang mag-ambag ayon sa kanyang kakayahan>Pagtrato sa kanya bilang isang kasangkapan lamang+Pagkakait sa kanya ng mga oportunidad para umasenso sa buhay<Kawalan niya ng kalayaang abutin ang kanyang mga pangarap",
"Alin sa mga sumusunod ang kailangan mong gawin upang maging patas ka sa pakikipag-ugnayan?=Pag-iwas sa paghuhusga batay sa mga pagkakaiba>Pagtatago ng sariling paniniwala upang hindi makasakit+Pagtangging makipag-ugnayan sa mga taong may ibang pananaw<Pagpipilit ng iyong pananaw sa iba",
"Paano natin dapat tingnan ang mga pagkakaiba ng mga tao sa ating pamayanan?=Bilang mga sangkap na nagpapayaman sa ating kultura at nagsusulong ng ating kaunlaran>Bilang balakid sa pag-unlad ng ating bansa+Bilang kahihiyang dapat wakasan<Bilang suliraning dapat bigyan ng kalutasan",
"Alin sa mga sumusunod ang nagpapakita ng pagiging patas sa pamamagitan ng paggalang sa dignidad ng kapwa?=Pagiging bukas sa boses at pananaw ng bawat isa>Pagpigil sa ibang magpahayag ng kanilang opinyon+Pagpili ng mga taong pakikinggan<Pang-aaway sa taong hindi sumasang-ayon sa iyo",
"Alin sa mga sumusunod ang dapat gawing batayan ng ating pagdedesisyon?=Mabuting hangarin at obhetibong pagsusuri>Pananaw ng mas nakararami kahit mali+Mga pamahiin at katutubong paniniwala lamang<Paghuhusga ng ibang tao sa atin",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pagiging patas ang tumutukoy sa paglalaan ng buong atensyon at pag-unawa sa sinasabi ng kapwa bago magbigay ng sariling reaksyon?=Aktibong pakikinig>Pag-iwas sa paggamit ng mga mapanirang pahayag+Pagtanggap at pag-unawa sa mga taong may kapansanan<Pagkilala sa mga kontribusyon ng bawat sektor ng lipunan",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pagiging patas ang tumutukoy sa pagsasalita nang may pag-iingat upang hindi makasakit ng damdamin ng ibang tao?=Pag-iwas sa paggamit ng mga mapanirang pahayag>Aktibong pakikinig+Pagtanggap at pag-unawa sa mga taong may kapansanan<Pagkilala sa mga kontribusyon ng bawat sektor ng lipunan",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pagiging patas ang tumutukoy sa pagkilala sa maiaambag ng mga taong may limitadong kakayahan at pag-aalis ng mga hadlang para sa kanilang aktibong pakikilahok?=Pagtanggap at pag-unawa sa mga taong may kapansanan>Aktibong pakikinig+Pag-iwas sa paggamit ng mga mapanirang pahayag<Pagkilala sa mga kontribusyon ng bawat sektor ng lipunan",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pagiging patas ang tumutukoy sa pagpuri at pagpapahalaga sa mga nagagawa ng bawat kasapi ng pamayanan, anuman ang kanyang estado sa buhay, propesyon, o kasarian?=Pagkilala sa mga kontribusyon ng bawat sektor ng lipunan>Aktibong pakikinig+Pag-iwas sa paggamit ng mga mapanirang pahayag<Pagtanggap at pag-unawa sa mga taong may kapansanan",
"Alin sa mga sumusunod na paraan ng pagsasabuhay ng pagiging patas ang tumutukoy sa pagsasalang-alang ng iba't ibang pananaw at opinyon bago gumawa ng mga desisyong makaaapekto sa pamayanan?=Pagpapasya nang may pakikipag-ugnayan at konsultasyon>Aktibong pakikinig+Pag-iwas sa paggamit ng mga mapanirang pahayag<Pagtanggap at pag-unawa sa mga taong may kapansanan",
"Ano ang ibig sabihin ng paglikha ng isang kapaligirang nagbibigay ng pantay na pagkakataon sa lahat?=Pagtitiyak na pare-pareho ang tsansa ng bawat isang lumago>Pagtitiyak na mas malaki ang tsansang umasenso ng mga kakilala+Pamimilit sa lahat na magkaroon ng pare-parehong hanapbuhay<Pagpigil sa pag-asenso ng mga tao para mapanatili ang pagkakapantay-pantay ng lahat",
"Alin sa mga sumusunod ang nagpapakita ng pagiging inklusibo sa pagbibigay sa mga tao ng pagkakataong makakuha ng impormasyon?=Pagsisikap na maabot ang lahat ng sektor sa pagbabahagi ng mahahalagang anunsyo>Paglilihim ng impormasyon sa mga taong hindi gaanong edukado+Pagbibigay ng impormasyon sa mga may kapangyarihan lamang<Paglalagay ng mga mahahalagang anunsyo sa internet lamang",
"Alin sa mga sumusunod ang tamang pagtingin o pakikitungo sa mga taong may kapansanan?=Pagkilala sa kanilang kakayahan at potensyal>Pagtutuon ng pansin sa kanilang mga limitasyon+Pag-iwas na makipag-ugnayan sa kanila dahil nahihiya o naaawa ka sa kanila<Pagtrato sa kanila bilang mga pasyenteng may karamdaman",
"Ano ang epekto ng pagkilala sa mga kontribusyon ng bawat sektor ng lipunan?=Nag-uudyok ito sa lahat na mag-ambag nang buong husay>Nagdudulot ito ng inggitan sa pagitan ng mga sektor+Nagiging daan ito upang maiwan sa laylayan ng lipunan ang mga may kapansanan<Nag-uudyok ito sa lahat na unahin ang pansariling kapakanan o kagustuhan",
"Alin sa mga sumusunod ang naglalarawan sa isang lipunan kung saan ang mga benepisyo ay nakatuon lamang sa iilang pribilehiyado?=Hindi patas>Matipid+Makatarungan<Mapagmalasakit",
"Bakit kailangan nating magsagawa ng konsultasyon bago tayo magpasya sa isang bagay na makakaapekto sa buong pamayanan?=Para tiyaking sumasalamin sa pangangailangan ng nakararami ang ating desisyon>Para tiyaking makikinabang ang ating pamilya sa ating desisyon+Para humanga sa atin ang mga pinuno at mapuri nila tayo<Para magkaroon tayo ng pagkakataong maliitin ang mga opinyon ng iba",
"Bakit sinasabing mabisang paraan ng pagtuturo ng pagiging patas ang pagiging buhay na halimbawa nito?=Nagsisilbing inspirasyon sa iba ang ating pagiging patas kaya tutularan nila ito>Nakapagpapahiya sa iba ang ating pagiging patas kaya hindi nila ito tutularan+Ang pagiging huwaran natin sa pagiging patas ay hindi mapapansin ng karamihan<Ang pagiging halimbawa ng pagiging patas ay nakakapagod kaya mahirap itong panatilihin",
"Alin sa mga sumusunod ang hindi halimbawa ng patas na pagtrato sa kapwa?=Pagbibigay ng promosyon sa trabaho batay sa relasyon, hindi sa kakayahan>Pagbibigay ng parehong babala sa lahat tungkol sa parating na bagyo+Pagtanggap ng aplikasyon mula sa lahat ng kwalipikado<Paggalang sa lahat, mahirap man o mayaman",
"Alin sa mga sumusunod ang dapat mong ipakita sa mga taong may ibang pananaw?=Pakikinig sa kanila nang maigi at may bukas na pag-iisip>Pakikinig sa kanila nang walang pag-unawa sa kanilang sinasabi+Agresibong pagsalungat sa kanilang pagpapaliwanag<Pamimilit sa kanilang palitan ang kanilang pananaw",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa dignidad ng isang kasambahay?=Pagtrato sa kanya tulad ng pagtrato mo sa mga kakilala mong nag-oopisina>Pag-uutos sa kanya nang sunud-sunod+Pag-iwas at hindi pagpansin sa kanya<Panlalait o pagtatawa sa kanyang trabaho",
"Bakit mahalagang alisin ang mga hadlang sa pagkakaroon ng mga taong may kapansanan ng mga oportunidad?=Upang makatulong o makapag-ambag sila sa pamayanan>Upang masabing inaalagaan sila ng ating pamahalaan+Para mapatunayang hindi nila kayang magtrabaho<Para tumigil na sila sa paghingi ng mga oportunidad",
"Ano ang malamang na maging epekto ng hindi pagpapahalaga sa mga kontribusyon ng isang sektor ng lipunan?=Pagkawala ng kanilang ganang mag-ambag sa lipunan>Pagiging mas masigasig nila sa pagtatrabaho+Mas maigting na pakikiisa nila sa mga proyekto ng pamahalaan<Pagtaas ng kanilang produksiyon o kontribusyon",
"Paano nakatutulong ang pagdaraos ng mga diyalogo sa pamayanan upang maitaguyod ang pagkakaisa ng mga mamamayan dito?=Nagbubukas ito ng komunikasyong nagbibigay-daan sa pagkakaunawaan ng mga tao>Nagiging daan ito para magtalo at mag-away ang mga tao+Nagpapalaganap ito ng kawalan ng tiwala sa kapwa<Napapadali nito ang pagkikita at pagbabangayan ng mga pamilyang hindi magkakasundo",
"Alin sa mga sumusunod ang dapat gawin ng isang taong namimili ng mga kukuning benepisyaryo para sa isang programang pangkawanggawa?=Pagtitiyak na ang proseso ng pagpili ay patas at may obhetibong batayan>Pagpili sa mga kamag-anak at kaibigang nangangailangan ng tulong+Pagbibigay ng magkakaibang impormasyon sa mga aplikante<Paggamit ng social media lamang sa pagpapalabas ng mga anunsyo tungkol dito",
"Alin sa mga sumusunod ang isang halimbawa ng mapanirang pahayag?=Pagsasbing kriminal ang isang tao nang walang batayan>Pagpuri sa galing ng isang tao sa kanyang trabaho+Pagbibigay ng mahalaga at totoong impormasyon sa isang kakilala<Pagsasabing hindi ka sumasang-ayon sa isang opinyon",

);

?>

</head>

</bod

</html>