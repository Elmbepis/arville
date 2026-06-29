<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit";
$_SESSION['tnum']="*4c";

$questions=array(

"Ang pagbibigay ng pagkain at damit sa isang pulubing may kapansanan ay halimbawa ng alin sa mga sumusunod na paraan upang maipakita ng pamilya ang malasakit sa iba?=Pagiging bukas-palad sa mga nangangailangan>Pakikiramay sa panahon ng krisis+Pagtuturo sa mga batang walang gumagabay<Pagtulong sa mga nakatatanda",
"Ang pagtulong sa pamamahagi ng 'relief goods' sa mga nasalanta ng bagyo ay halimbawa ng alin sa mga sumusunod na paraan upang maipakita ng pamilya ang malasakit sa iba?=Pakikiramay sa panahon ng krisis>Pagiging bukas-palad sa mga nangangailangan+Pagtuturo sa mga batang walang gumagabay<Pagtulong sa mga nakatatanda",
"Ang pagsasanay sa mga ulila sa isang gawaing mapagkakakitaan ay halimbawa ng alin sa mga sumusunod na paraan upang maipakita ng pamilya ang malasakit sa iba?=Pagtuturo sa mga batang walang gumagabay>Pagiging bukas-palad sa mga nangangailangan+Pakikiramay sa panahon ng krisis<Pagtulong sa mga nakatatanda",
"Ang pagbibigay ng libreng serbisyong medikal sa mga lolo at lola sa komunidad ay halimbawa ng alin sa mga sumusunod na paraan upang maipakita ng pamilya ang malasakit sa iba?=Pagtulong sa mga nakatatanda>Pagiging bukas-palad sa mga nangangailangan+Pakikiramay sa panahon ng krisis<Pagtuturo sa mga batang walang gumagabay",
"Ang paglulunsad ng 'clean-up drive' sa sariling pamayanan ay halimbawa ng alin sa mga sumusunod na paraan upang maipakita ng pamilya ang malasakit sa iba?=Pag-oorganisa ng mga aktibidad sa komunidad>Pagiging bukas-palad sa mga nangangailangan+Pakikiramay sa panahon ng krisis<Pagtuturo sa mga batang walang gumagabay",
"Ano ang ibig sabihin ng pagiging mapagmalasakit?=Pagiging maaalalahanin at matulungin sa iba>Pagiging masinop at masipag+Pagiging palakaibigan<Pagiging matagumpay sa mga gawain",
"Alin sa mga sumusunod ang isa sa mga pangunahing tungkulin ng pamilya sa komunidad?=Tumulong sa mga nangangailangan>Mag-impok ng pera+Manghuli ng mga kriminal<Magtayo ng sariling negosyo",
"Alin sa mga sumusunod ang maaari mong gawin upang ipakita sa mga nakatatanda ang iyong malasakit?=Tulungan sila sa mga gawain>Huwag silang pansinin+Iwanan sila sa bahay<Bentahan sila ng mga produktong hindi nila kailangan",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat gawin kapag may naganap na kalamidad sa komunidad?=Humingi ng mga donasyon kahit hindi naapektuhan ng kalamdidad>Magbigay ng pagkain at damit sa mga nasalanta+Magbigay ng emosyonal na suporta sa mga nasalanta<Tumulong sa mga pinuno ng barangay",
"Alin sa mga sumusunod ang maaaring gawin ng isang pamilya sa mga batang walang magulang?=Turuan sila ng mabubuting asal>Gawin silang mga alila+Iwasan sila at balewalain<Ipagtabuyan sila",
"Bakit mahalaga ang pakikiramay sa panahon ng krisis?=Para palakasin ang loob ng mga naapektuhan>Para makakuha ng papuri sa ibat+Para maipakita ang yaman at kagalingan<Para makakuha ng pabor sa mga naapektuhan",
"Alin sa mga sumusunod ang hindi kabilang sa mga dapat ibigay ng pamilya sa mga nangangailangan?=Sama ng loob>Damit at pagkain+Pag-asa<Emosyonal na suporta",
"Anong halaga ang natutunan kapag ang pamilya ay sama-samang tumutulong sa kapwa?=Pagiging mapagmalasakit>Pagiging masipag+Pagiging matipid<Pagiging madasalin",
"Alin sa mga sumusunod ang hindi nagpapakita ng malasakit sa kapwa?=Pag-iwas sa mga mahihirap>Pagbibigay ng pagkain sa nagugutom+Pagtulong pagkatapos ng kalamidad<Pagtuturo sa mga batang lansangan",
"Sa usapin ng pagmamalasakit, bakit mahalaga ang pagkakaisa sa isang pamilya?=Para maging mas matatag sa pagtulong sa iba>Para magkaroon ng maraming gamit+Para lumaki ang kita<Para maging mas makapangyarihan",
"Alin sa mga sumusunod ang dapat mong gawin kapag may nakita kang isang taong nangangailangan?=Tumulong sa abot ng makakaya>Tumalikod at umalis+Ipagtabuyan ito sa malayo<Pangaralan ito at sisihin",
"Ano ang natututunan ng mga bata kapag sila ay tinuturuan ng pagmamalasakit sa kapwa?=Pagiging matulungin>Pagiging mapagbalatkayo+Pagiging makasarili<Pagiging mapagmalaki",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtulong na maaari mong gawin sa paaralan?=Panunukso ng kaklase>Pagpapahiram ng gamit sa kaklase+Pagbabahagi ng baong pagkain sa kaklase<Pagtuturo ng aralin sa kaklase",
"Alin sa mga sumusunod ang nagpapakita ng malasakit ng isang pamilya sa isang kaibigang nagigipit?=Pagbibigay o pagpapahiram ng pera>Pagpapautang nang may napakalaking tubo+Pagmamalaki ng mga biyayang tinatamasa<Pagsasantabi ng kanyang problema",
"Alin sa mga sumusunod ang hindi nagpapakita ng malasakit sa komunidad?=Pagsusunog ng basura>Pag-oorganisa ng misyong medikal+Paglilinis ng paligid<Pamamahagi ng mga damit sa mga nasunugan",
"Ano ang dapat mong gawin kung may kaklase kang nahihirapan sa aralin?=Tulungan siya sa pag-aaral>Yayain siyang maglaro na lamang+Tawanan ang kanyang paghihirap<Huwag siyang pansinin",
"Ano ang pakiramdam na naibibigay mo sa mga taong iyong natutulungan?=Saya at pagkamapagpasalamat>Galit at pagtatampo+Kalungkutan<Kawalan ng pag-asa",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa kapwa sa paraang hindi materyal?=Paglalaan ng oras sa pakikinig at pagpapayo>Pagbibigay ng pagkain+Pamamahagi ng mga lumang damit<Pagbibigay ng pera",
"Ano ang dapat mong gawin kung may masalubong kang pulubing nagugutom?=Abutan siya ng makakain>Huwag siyang pansinin+Ipadampot siya sa pulis<Ireklamo siya sa barangay",
"Alin sa mga sumusunod ang hindi kabilang sa mga epekto ng pakikiramay sa isang taong may problema?=Pagtindi ng kanyang galit sa mundo>Paglakas ng kanyang loob+Pagkakaroon niya ng pag-asa<Pagiging mapagpasalamat niya",
"Bakit mahalaga ang pagiging mapagmalasakit sa mga hayop?=Upang mapanatili ang balanse sa kalikasan>Upang magkaroon ng mapaglilibangan+Upang makakuha ng papuri sa iba<Upang magkaroon ng pagkakakitaan",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa mga hayop?=Pagbibigay sa kanila ng malinis at ligtas na tirahan>Pag-iiwan sa kanila sa lansangan+Pagtataboy sa kanila sa di-ligtas na lugar<Pagkakait sa kanila ng pagkain at tubig",
"Bakit mahalaga ang pagpapakonsulta ng mga hayop sa beterinaryo?=Upang mapanatiling malusog ang mga ito>Para makapagpasikat ang may-ari ng mga ito+Upang kumita ang beterinaryo<Para hindi na kailangang pakainin ang mga ito",
"Paano maipapakita ang pagmamalasakit sa mga ilang na hayop?=Paggalang sa kanilang natural na tirahan>Panghuhuli sa kanila para gawing alaga+Pagpuputol ng mga puno sa kanilang habitat<Pagtatapon ng basura sa kanilang kapaligiran",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa mga hayop?=Pagbibigay sa kanila ng malusog na pagkain at sapat na tubig>Pagtataboy sa kanila habang naghahanap sila ng makakain+Paglalagay sa kanila sa isang madumi at masikip na kulungan<Pagbabalewala ng kanilang sakit",

);

?>

</head>

</bod

</html>