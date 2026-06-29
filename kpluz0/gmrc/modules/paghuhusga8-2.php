<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paglinang ng Positibong Disposisyon - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paglinang ng Positibong Disposisyon";
$_SESSION['tnum']="*8k";

$questions=array(

"Ano ang kahulugan ng kasanayan sa maingat na paghusga?=Pag-iisip nang kritikal at balanse sa pagbuo ng konklusyon>Paniniwala agad sa mga naririnig na balita+Pag-iwas sa pagbuo ng anumang opinyon<Pagiging sunud-sunuran sa pananaw ng nakararami",
"Alin sa mga sumusunod ang tinutukoy ng katagang 'positibong disposisyon'?=Panloob na saloobing nakatuon sa kabutihan at pag-asa>Pagiging mabilis sa panghuhusga ng kapwa+Panloob na saloobing nakatuon sa mga problema<Kawalan ng pakialam sa lahat",
"Ano ang ibig sabihin ng positibong disposisyon sa usapin ng mga suliranin ng bayan?=Pagtingin sa mga suliranin nang may pag-asa at determinasyong makatulong>Pagiging bulag sa mga suliranin ng bansa+Paninisi ng iba sa mga nakikitang suliranin<Kawalan ng pag-asang malalampasan ng bansa ang mga suliranin",
"Ano ang naidudulot ng pag-aaral ng kasaysayan sa paglinang ng positibong disposisyon?=Mas malalim na pag-unawa sa mga pinagdadaanan ng bayan>Pagkalungkot sa mga nakaraang pagkakamali+Kawalan ng pakialam sa mga nagaganap sa kasalukuyan<Galit sa mga dayuhang nagpahirap sa bansa",
"Alin sa mga sumusunod ang hindi ipinapakita ng pakikinig sa mga taong may ibang pananaw?=Makitid na perspektibo>Paggalang sa kapwa+Pagiging bukas ang isip<Malawak na pag-unawa",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa paglalaan ng oras sa pagbabasa at pananaliksik tungkol sa mga mahahalagang isyung panlipunan?=Pagpapalawak ng sariling kaalaman>Pagsasanay sa kritikal na pag-iisip+Pakikinig nang buo at may pag-unawa<Pagtuon ng pansin sa mga solusyon",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa paghahanap muna ng mga impormasyon at ebidensya bago bumuo ng sariling opinyon?=Pagsasanay sa kritikal na pag-iisip>Pagpapalawak ng sariling kaalaman+Pakikinig nang buo at may pag-unawa<Pagtuon ng pansin sa mga solusyon",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa pagbibigay ng pagkakataong magpahayag ang mga taong may ibang pananaw?=Pakikinig nang buo at may pag-unawa>Pagpapalawak ng sariling kaalaman+Pagsasanay sa kritikal na pag-iisip<Pagtuon ng pansin sa mga solusyon",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa paghahanap at pagbabahagi ng mga konkretong hakbang para malutas ang isang problema?=Pagtuon ng pansin sa mga solusyon>Pagpapalawak ng sariling kaalaman+Pagsasanay sa kritikal na pag-iisip<Pakikinig nang buo at may pag-unawa",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa pagsali sa mga proyekto ng komunidad at paggamit ng sariling boses para sa ikabubuti ng nakararami?=Aktibong pakikilahok>Pagpapalawak ng sariling kaalaman+Pagiging matatag<Pagsasanay sa kritikal na pag-iisip",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa pagiging responsable sa pagbabahagi ng impormasyon at pag-iwas sa pagkakalat ng mga maling balita?=Pagtataguyod ng katotohanan>Pagpapalawak ng sariling kaalaman+Pagiging matatag<Pagsasanay sa kritikal na pag-iisip",
"Alin sa mga sumusunod na paraan ng paglinang ng positibong disposisyon ang tumutukoy sa pagharap sa mga hamon at kritisismo nang may lakas ng loob at pag-asa?=Pagiging matatag>Pagpapalawak ng sariling kaalaman+Pagtataguyod ng katotohanan<Pagsasanay sa kritikal na pag-iisip",
"Alin sa mga sumusunod ang nagpapaunlad ng kritikal na pag-iisip?=Pagsusuri sa mga impormasyon bago maniwala>Paniniwala agad sa mga nababasa sa social media+Pagtangging tumanggap ng anumang impormasyon<Pagiging interesado lamang sa mga magagandang balita",
"Paano nakatutulong ang pagkakaroon ng positibong disposisyon sa pagharap sa mga hamon?=Nagbibigay ito ng katatagan at pag-asa>Nagiging dahilan ito upang matakot at magpatalo+Nag-uudyok ito ng pagiging agresibo at mapanghamon<Nagiging sanhi ito ng pagiging bulag sa mga hamon",
"Alin sa mga sumusunod ang unang hakbang sa paglinang ng maingat na paghuhusga?=Pagpapalawak ng sariling kaalaman>Pagbuo ng sariling opinyon+Paniniwala agad sa lahat ng mga naririnig<Paghahanap ng mga solusyon",
"Alin sa mga sumusunod ang hindi bahagi ng pagsasanay sa kritikal na pag-iisip?=Paniniwala agad sa nababasa>Pagtatanong+Paghahanap ng ebidensya<Paghahambing ng impormasyon",
"Bakit kailangang bigyan ng pagkakataong magpahayag ang mga taong may ibang pananaw?=Upang maunawaan ang kanilang pinanggagalingan>Upang mapatunayang mali sila+Upang mapuri ng guro<Upang magaya ang kanyang opinyon",
"Alin sa mga sumusunod ang tumutukoy sa pagiging hindi pasibong tagamasid lamang?=Aktibong pakikilahok sa mga proyekto at talakayan>Panonood ng mga dokumentaryo tungkol sa mga isyu+Pagbabasa ng mga komento sa social media<Pakikinig sa radyo para malaman ang mga nagaganap sa ating bansa",
"Alin sa mga sumusunod ang dapat mong gawin para maitaguyod ang katotohanan?=Pagiging responsable sa pagbabahagi ng impormasyon>Pagkakalat ng mga pekeng balita+Pagsang-ayon sa lahat ng komento sa social media<Hindi pagpansin sa mga nagaganap sa ating bansa",
"Alin sa mga sumusunod ang karaniwang bunga ng hindi pagkakaroon ng positibong disposisyon ng isang mamamayan?=Pinanghihinaan siya ng loob at nagiging pasibo>Nagiging aktibo siya sa paglutas sa mga problema+Mas ginaganahan siyang makilahok sa mga proyekto ng komunidad<Tumataas ang kanyang tiwala sa sarili at sa kapwa",
"Bakit dapat nating ituon ang ating pansin sa paghahanap ng solusyon sa isang problema kaysa sa mga negatibong aspeto nito?=Dahil ito ang nagbubukas ng daan para sa aktuwal na pag-unlad at pagbabago>Dahil mas mahirap magreklamo kaysa mag-isip ng solusyon+Dahil karamihan sa mga problema ay walang kalutasan<Dahil nagbibigay ito ng pagkakataong mapuri tayo ng taumbayan",
"Paano nagiging instrumento ng pagkakaisa ang isang taong may positibong disposisyon?=Nagtataguyod siya ng diwa ng pag-asa, kooperasyon, at pagtutulungan>Magaling siyang magpalaganap ng inggitan sa mga mamamayan+Madali niyang naipapahiya ang mga taong hindi sumasang-ayon sa kanya<Naipapakita niya sa iba na siya lamang ang palaging tama",
"Ano ang dapat mong gawing motibasyon sa responsableng pagbabahagi ng impormasyon?=Maging instrumento ng positibong pagbabago>Makakuha ng maraming likes at shares sa social media+Maipahiya ang mga taong may ibang opinyon<Maiangat ang sarili sa iba",
"Ano ang kahulugan ng \"pagiging matatag\" sa konteksto ng pagharap sa kritisismo?=Pagkakaroon ng paninindigan sa prinsipyo sa kabila ng mga pintas>Paninira ng puri ng mga pumipintas+Pagsisinungaling para maipagtanggol ang sarili<Palagiang pag-amin sa kamalian at pag-atras",
"Alin sa mga sumusunod ang malamang na bunga kung bukas ang isip ng mga mamamayan sa isang demokratikong lipunan?=Pagpapanatili ng malusog na talakayan at kolaboratibong paglutas ng mga problema>Paglaganap ng mga pagtatalo at di-pagkakaunawaan+Pagpapahina sa kakayahan ng mga mamamayang mag-isip nang kritikal<Pagpapababa ng tiwala at respeto ng mga tao sa kanyang kapwa",

);

?>

</head>

</bod

</html>