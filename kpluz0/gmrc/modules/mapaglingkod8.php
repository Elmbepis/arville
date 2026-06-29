<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapaglingkod - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapaglingkod";
$_SESSION['tnum']="*8h";

$questions=array(

"Ano ang tunay na sukatan ng pananampalataya sa Diyos?=Paglilingkod at paggawa ng kabutihan sa kapwa>Pag-aaral ng teolohiya+Pagbabasa ng bibliya araw-araw<Pagkanta ng mga awit na panrelihiyon",
"Ano ang pangunahing bunga ng pagkalinga natin sa ating kapwa?=Pagpapalalim ng ugnayan natin sa Diyos>Paglago ng ating kayamanan+Pagiging tanyag sa komunidad<Pagkakaroon ng mataas na antas sa lipunan",
"Alin sa mga sumusunod ang halimbawa ng pagkalinga sa kapwa?=Pag-aalaga sa maysakit>Pagpuna sa pagkukulang ng iba+Pag-iwas sa taong may problema<Paglilinang ng sariling talento",
"Ano ang tawag sa pagbibigay ng oras at lakas para magsilbi sa iba?=Paglilingkod>Pagtitiis+Pagbabalatkayo<Pagpaparaya",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagmamalasakit sa kapwa?=Pangungutya sa taong nangangailangan>Pagbibigay ng damit sa nausunugan+Pagpapakain sa nagugutom<Pagbisita sa maysakit",
"Alin sa mga sumusunod na paraan ng paglilingkod sa kapwa ang tumutukoy sa pagbisita, pagbabantay, at pag-alalay sa isang taong hindi maganda ang kalusugan?=Pagkalinga sa maysakit>Pagbibigay ng payo+Pagbabahagi ng mga biyaya<Pagsuporta sa mga gawain ng simbahan o komunidad",
"Alin sa mga sumusunod na paraan ng paglilingkod sa kapwa ang sumasaklaw sa pagtulong sa mga gawain sa bahay, paaralan, o komunidad nang walang hinihintay na kapalit?=Pagbibigay ng serbisyo>Pagbibigay ng payo+Pagbabahagi ng mga biyaya<Pagdamay sa panahon ng kalungkutan",
"Alin sa mga sumusunod na paraan ng paglilingkod sa kapwa ang tumutukoy sa pagbibigay ng damit, pagkain, gamit, o pera sa mga nangangailangan?=Pagbabahagi ng mga biyaya>Pagbibigay ng payo+Pagkalinga sa maysakit<Pagsuporta sa mga gawain ng simbahan o komunidad",
"Ang pakikilahok sa pagbisita ng mga ka-barangay sa isang ampunan ay halimbawa ng alin sa mga sumusunod na paraan ng paglilingkod sa kapwa?=Pagsuporta sa mga gawain ng simbahan o komunidad>Pagbibigay ng payo+Pagkalinga sa maysakit<Pagdamay sa panahon ng kalungkutan",
"Alin sa mga sumusunod na paraan ng paglilingkod sa kapwa ang tumutukoy sa pakikinig at paggabay sa isang taong may problema?=Pagbibigay ng payo>Pagbabahagi ng mga biyaya+Pagkalinga sa maysakit<Pagsuporta sa mga gawain ng simbahan o komunidad",
"Ang pagdalaw sa isang kaibigang nawalan ng mahal sa buhay ay halimbawa ng alin sa mga sumusunod na paraan ng paglilingkod sa kapwa?=Pagdamay sa panahon ng kalungkutan>Pagbibigay ng payo+Pagkalinga sa maysakit<Pagsuporta sa mga gawain ng simbahan o komunidad",
"Alin sa mga sumusunod na paraan ng paglilingkod sa kapwa ang hindi nangangailangan ng materyal na ambag?=Pananalangin para sa iba>Pagbabahagi ng mga biyaya+Pagbili ng gamot para sa maysakit<Pagbibigay ng donasyon sa simbahan o komunidad",
"Alin sa mga sumusunod ang isa sa mga benepisyong personal ng pagkakawanggawa?=Kapayapaan sa sarili>Pagkakaroon ng marangyang buhay+Pagkakaroon ng maraming alagad<Pagiging tanyag",
"Alin sa mga sumusunod ang halimbawa ng pagkalinga sa kapwa sa panahon ng kanyang kalungkutan?=Pagdalaw sa isang taong nasalanta ng bagyo>Pagdarasal para sa isang taong may pagsusulit+Pagtulong sa paglilinis ng komunidad<Pagbibigay ng donasyon sa simbahan",
"Alin sa mga sumusunod ang hindi halimbawa ng paglilingkod sa kapwa?=Pag-aaral nang mabuti para makakuha ng mataas na grado>Pagbibigay ng pagkain sa isang pulubi+Pagtulong sa mga nasalanta ng lindol<Pakikilahok sa isang medical mission",
"Alin sa mga sumusunod ang dapat isama sa pagsisimba at pananalangin para maging buo ang pagsasabuhay ng pananampalataya sa Diyos?=Paggawa ng mabuti sa kapwa>Pagbabasa ng Bibliya araw-araw+Pagrorosaryo gabi-gabi<Pagpapanatiling maayos ang altar sa bahay",
"Alin sa mga sumusunod ang nagpapakahulugan sa salitang \"pagkalinga\"?=Pag-aaruga at pagtulong sa nangangailangan>Pagtitiwala sa sariling kakayahan+Pagtupad sa mga pangarap o ambisyon<Pagiging mariwasa sa buhay",
"Alin sa mga sumusunod ang hindi maituturing na halimbawa ng pagkalinga sa kapwa?=Pag-iimpok para makabili ng sariling cellphone>Pagbisita sa isang ampunan para maghandog ng mge regalo+Pagbibigay ng payo sa may problema<Paglilinis ng kapaligiran para maiwasan ang sakit",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa pagpapakita ng pagdamay sa isang taong nalulungkot?=Pagbibiro nang wala sa lugar tungkol sa kanyang pinagdadaanan>Pakikinig sa kanya+Pagsasaad ng pakikiramay sa kanya<Pagbibigay sa kanya ng suportang emosyonal",
"Alin sa mga sumusunod ang mahalagang bunga ng pananalangin para sa kapwa?=Pagpapakita ng malasakit kahit walang maibigay na materyal na tulong>Pagpapakita sa iba ng iyong husay sa pagdarasal+Pagpapakitang balewala ang pagbibigay ng materyal na tulong sa nangangailangan<Pagtanggap ng papuri mula sa simbahan",
"Ano ang dapat mong gawin kapag may kasamahan kang dumaraan sa isang matinding pagsubok?=Dumalaw at magbigay ng suporta sa kanya>Umiwas muna sa kanya hanggang makabangon siya+I-vlog ang pinagdadaanan niya para pagkakitaan ito<Gawing biro ang kanyang kalagayan para mapatawa siya",
"Alin sa mga sumusunod ang pangunahing layunin ng pagiging mapaglingkod?=Makatulong sa kapwa nang bukal sa loob>Makakuha ng pabuya o gantimpala+Makilala ng madla at sumikat<Magkaroon ng mataas na posisyon sa pamahalaan",
"Alin sa mga sumusunod ang ipinapakita ng isang taong naglilingkod sa mga nangangailangan?=Pagiging makasarili>Kabutihang-loob+Pagmamalasakit sa kapwa<Tunay na pananampalataya sa Diyos",
"Alin sa mga sumusunod ang hindi kabilang sa mga layunin ng pagiging mapaglingkod?=Maiangat ang sarili sa iba>Magpakita ng pagmamahal sa Diyos+Makatulong sa kapwa<Maging bahagi ng pagpapaunlad ng komunidad",
"Alin sa mga sumusunod ang halimbawa ng di-materyal na pagtulong?=Pananalangin para sa maysakit>Pagbibigay ng pagkain sa isang batang lansangan+Pagpapahiram ng sasakyan sa kapitbahay<Pamimigay ng mga regalo sa mga ulila",

);

?>

</head>

</bod

</html>