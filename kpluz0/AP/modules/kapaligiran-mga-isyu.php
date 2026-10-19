<html>
<head>
<body>

<?php
$_SESSION['title']="Mga Isyu sa Pagkasira ng Kapaligiran";

if ($grd < 10) {

    $questions=array(

        "Walang epekto sa Daigdig ang mga aktibidad ng mga tao.=mali>tama",
        "Maganda ang epekto ng pagkakaingin sa kapaligiran kaya't dapat itong gawin.=mali>tama",
        "Walang kinalaman ang 'global warming' sa 'greenhouse effect'.=mali>tama",
        "Makapipigil sa pagguho ng lupa ang pagpuputol ng mga puno sa kabundukan.=mali>tama",
        "Ang pagsunog ng karbon o 'coal' ay isang malinis na paraan upang makalikha ng kuryente.=mali>tama",
        "Ang pag-unlad ng isang bansa ay may kaakibat na epekto sa kapaligiran.=tama>mali",
        "Ang pagkakaingin ay maaaring magdulot ng pagbaha sa mabababang lugar.=tama>mali",
        "Ang pagkakaingin ay maaaring mauwi sa pagguho ng lupa.=tama>mali",
        "Ang pagpuputol ng malalaking punongkahoy sa kabundukan at kagubatan ay isang sanhi ng pagguho ng lupa.=tama>mali",
        "Ang pagbabaha ay isa sa mga masamang epekto ng pagpuputol ng malalaking puno sa kabundukan.=tama>mali",
        "Ang pagtatanim ng puno ay nakapipigil sa pagbaha at pagguho ng lupa.=tama>mali",
        "Dapat patayin ang mga ilaw at hugutin ang mga kasangkapang de-kuryente kapag hindi ginagamit.=tama>mali",
        "Ang pagtatapon ng basura sa ilog ay katanggap-tanggap.=mali>tama",
        "Ang polusyon sa hangin ay nakapagdudulot ng sakit sa baga.=tama>mali",
        "Ang pagsusunog ng basura sa bakuran ay nakabubuti sa kalikasan.=mali>tama",

        "Ang ____ ay ang pagtaas ng temperatura ng atmospera ng mundo.=global warming>climate change+polusyon<greenhouse effect",
        "Dahil sa ____, dumadalas na ang pagkakaroon ng mga napakalalakas na bagyo sa ating bansa na di natin nararanasan dati.=climate change>El Nino+polusyon<erosyon",
        "Ang ____ ay pagsusunog sa kagubatan upang makagawa ng uling o pagtamnan ang lupa.=pagkakaingin>pagtotroso+polusyon<erosyon",
        "Ang ibig sabihin ng '3Rs' na nakatutulong sa pag-aalaga ng kalikasan at kapaligiran ay ____, 'reuse', at 'recycle'.=reduce>recover+remake<restore",
        "Sa '3Rs', ang pagbabawas ng pagkonsumo ng mga produktong pinagmumulan ng mga basura ay isang anyo ng ____.=reduce>reuse+recycle<recover",
        "Sa '3Rs', ang paggamit ng isang patapon na bagay sa ibang paraan upang muli itong pakinabangan ay tinatawag na ____.=reuse>reduce+recycle<recover",
        "Sa '3Rs', ang paggamit ng isang patapon na bagay upang makalikha ng isang panibagong bagay ay tinatawag na ____.=recycle>reduce+reuse<recover",
        "Anong ahensiya ng pamahalaan ang pangunahing namamahala sa kalikasan at likas na yaman ng Pilipinas?=DENR>DOH+DepEd<DPWH",
        "Ano ang tawag sa pagguho ng lupa na madalas mangyari sa mga bulubunduking lugar tuwing malakas ang ulan?=landslide>tsunami+bagyo<lindol",
        "Ano ang pangunahing sanhi ng polusyon sa hangin sa mga lungsod?=usok ng sasakyan>usok ng siga+usok ng sigarilyo<usok ng sunog",

    );

} else {

    $questions=array(

        "Walang maituturing na masamang epekto ang 'salinization' sa isang lupaing pansakahan.=mali>tama",
        "Mas maraming namamatay taun-taon nang dahil sa 'outdoor air pollution' kaysa sa 'indoor air pollution'.=mali>tama",
        "Ang mga 'gases' na tulad ng 'sulfur dioxide' at 'nitrogen oxide', kung saan nagmumula ang 'acid rain', ay hindi maaaring manggaling sa mga aktibidad ng sangkatauhan.=mali>tama",
        "Bagama't maraming 'species' ng hayop ang nanganganib nang dahil sa pagkasira ng kapaligiran, walang namang mga 'species' ng halaman ang nanganganib nang dahil dito.=mali>tama",
        "Ang bilis ng paglaki ng populasyon sa isang lugar ay walang kaugnayan sa bilis ng pagkasira ng kapaligiran dito.=mali>tama",
        "Ang 'red tide' ay dala ng mga maykro-organismong lumulutang sa dagat na kung tawagin ay 'dinoflagellates'.=tama>mali",
        "Ang pag-ulan ng 'acid rain' na maaaring magdulot ng sakit o makamatay sa mga tao at iba pang nilalang ay may kaugnayan sa polusyon ng hangin.=tama>mali",
        "Bukod sa mga sakit sa baga tulad ng 'respiratory infections', maaari ring magdulot ang polusyon sa hangin ng mga 'cardiovascular diseases' tulad ng 'stroke' at sakit sa puso.=tama>mali",
        "Ang pagkasira ng kapaligiran ay may malaking kaugnayan sa 'extinction' ng iba't ibang 'species' sa mundo.=tama>mali",
        "May mga pangyayaring hindi kasalanan ng tao, tulad ng mga lindol at 'tsunami', ang nakasisira ng kapaligiran sa antas na maaaring lumipol ng mga hayop at halaman sa lugar ng pinangyarihan.=tama>mali",
        "Ang pagkasira ng ozone layer ay nagdudulot ng mas maraming ultraviolet rays na nakakarating sa ibabaw ng mundo.=tama>mali",
        "Ang coral bleaching ay isang senyales ng pagkasira ng kalidad ng tubig-dagat.=tama>mali",
        "Ang sobrang pangingisda ay nagdudulot ng pagkaubos ng mga isda sa karagatan.=tama>mali",
        "Ang paggamit ng renewable energy ay nakababawas sa carbon emission.=tama>mali",
        "Ang 'carbon footprint' ay tumutukoy sa dami ng carbon dioxide na inilalabas ng isang tao, pamilya, o bansa.=tama>mali",

        "____ ang tawag sa malaputik na duming naiiwan ng pagmimina na maaaring makalason sa lupa at tubig.=mine tailings>cyanide+alkali<silt",
        "Ang ____ ay ang pagkaipon sa lupa ng mga asin ng sodium, magnesium, at iba pang elemento hanggang sa mawalan ng kapakinabangan ang lupa.=salinization>desertification+alkalinization<siltation",
        "Ang ____ ay ang patuloy na pagkaipon sa isang lugar ng banlik na dala ng umaagos na tubig.=siltation>desertification+alkalinization<salinization",
        "____ ang nagaganap kung ang isang lugar na bahagyang tuyo ay tuluyan nang matuyo at mawalan ng kapakinabangan nang dahil sobrang init o kagagawan ng tao.=desertification>siltation+alkalinization<salinization",
        "Tinatayang umaabot sa 2 milyong tao ang namamatay taun-taon sa mundo nang dahil sa mga sakit na dulot ng karumihan ng ____.=tubig>hangin+kalupaan<kalawakan",
        "Ayon sa isang pag-aaral noong 2012, umaabot sa ____ milyong tao ang namamatay sa mundo taun-taon nang dahil sa mga sakit na dulot ng polusyon sa hangin.=7>1+3<15",
        "Ano ang tawag sa proseso kung saan ang mga sustansya sa tubig ay nagiging sanhi ng sobrang paglaki ng lumot?=eutrophication>salinization+siltation<desertification",
        "Anong batas ang nangangasiwa sa tamang pamamahala ng basura sa Pilipinas?=Republic Act 9003>Republic Act 8749+Republic Act 9275<Republic Act 8550",
        "Ano ang tawag sa pagputol ng mga puno sa kagubatan nang walang kapalit na pagtatanim?=deforestation>reforestation+afforestation<urbanization",
        "Ano ang tawag sa patuloy na pagtaas ng temperatura ng ibabaw ng mundo dahil sa mga greenhouse gases?=global warming>climate change+acid rain<erosyon",

    );

}
?>

</head>

</body>

</html>