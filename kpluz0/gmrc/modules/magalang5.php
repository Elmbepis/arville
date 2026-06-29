<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang sa Pamilya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang sa Pamilya";
$_SESSION['tnum']="*57";

$questions=array(

"Alin sa mga sumusunod ang isang paraan upang makapagpakita tayo ng respeto sa ating mga kapamilya?=Paggamit ng magalang na pananalita>Pagputol sa pagsasalita ng kausap+Pagtataas ng boses sa pagpapaliwanag<Hindi pakikinig sa sinasabi ng kausap",
"Ang pagmamalasakit sa ating pamilya ay maipapakita natin sa pamamagitan ng alin sa mga sumusunod?=Pagtulong sa mga gawaing-bahay>Pagtulog buong araw+Panunukso sa nakababatang kapatid<Pag-alis sa bahay nang walang paalam",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagtanggap sa isang kapatid na may kakulitan?=Pag-iwas sa kanya>Pag-unawa sa kanya+Paggabay sa kanya<Pagtuturo sa kanya",
"Alin sa mga sumusunod ang nagpapakita ng ating pagrespeto sa opinyon ni Ate kahit hindi tayo sang-ayon dito?=Pakikinig nang bukas ang isipan>Pagputol sa kanyang pagsasalita+Pagsagot nang pagalit habang nagsasalita siya<Pagtangging makinig sa kanya",
"Ano ang dapat mong gawin kapag napansin mong pagod na si Nanay?=Tumulong sa kanyang mga gawain>Magtulug-tulugan sa kuwarto+Umalis muna ng bahay<Magkunwaring may mahalagang ginagawa",
"Bakit kailangan nating igalang ang mga paniniwala nina Lolo at Lola?=Upang mapahalagahan natin ang kanilang mga karanasan>Para hindi nila tayo pagalitan+Upang purihin tayo ng ibang tao<Para makahingi tayo sa kanila ng pabor",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa pamilya?=Pag-aalok ng tulong sa isang kapamilya>Pag-iwas sa utos ng magulang+Pagpapabaya sa mga nakatokang gawain<Pagsuway sa mga alituntunin ng pamilya",
"Kapag may tampuhan sa pamilya, alin sa mga sumusunod ang dapat ninyong gawin?=Pag-usapan nang mahinahon ang problema>Magkulong sa kanya-kanyang kuwarto+Magsisihan sa nangyayari<Magkaroon ng maingay na pagtatalo",
"Alin sa mga sumusunod ang nagpapakita ng respeto sa espasyo ni Kuya habang siya ay nag-aaral?=Pag-iwas na magambala siya>Pagpapatawa sa kanya+Pagpilit sa kanyang makipaglaro<Pagpapatugtog nang malakas",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa damdamin ng isang kapatid?=Pakikinig nang maigi sa kanyang saloobin>Pagtawa sa kanyang problema+Pagtalikod kahit nagsasalita pa siya<Pagtangging makinig sa kanya",
"Alin sa mga sumusunod ang hindi nagpapakita ng ating pagpapahalaga sa isang kapamilya?=Paglilihim sa kanya>Pagsasabing mahal mo siya+Pagpapasalamat sa kanya<Madalas na pangungumusta sa kanya",
"Kapag gustong magbasa ni Ate ng nobela habang mag-isa sa loob ng kanyang kuwarto, ano ang dapat mong gawin?=Hayaan siyang gawin ito nang hindi naaabala>Pilitin mong sumama sa kanya sa kuwarto+Itago ang babasahin niyang aklat<Pilitin siyang ipasyal ka sa labas",
"Alin sa mga sumusunod ang halimbawa ng paggalang sa mga tradisyon ng ating pamilya?=Pakikilahok sa mga gawaing panrelihiyon>Pamamasyal kasama ang mga kaibigan+Pagtulog sa kuwarto habang may pagtitipon sa bahay<Pagsali sa isang koponan ng basketbol",
"Bakit mahalagang maging mapagpasensya sa pamilya?=Upang maiwasan ang mga di-pagkakaunawaan>Upang mangibabaw sa mga pagtatalo+Para maputol agad ang mga pag-uusap<Para makagawa ng maraming reklamo",
"Kapag may salu-salo sa bahay, alin sa mga sumusunod ang magpapakita ng iyong paggalang sa pamilya?=Pagtulong sa pag-aasikaso ng mga bisita>Pag-alis nang hindi nagpapaalam+Pag-iingay at panggugulo sa mga bisita<Pagrereklamong hindi masarap ang handa",
"Ano ang dapat mong gawin kung iba ang paniniwala mo sa pananaw ng isang kapamilya?=Igalang at tanggapin ang kanyang pananaw>Pilitin siyang sumang-ayon sa iyo+Huwag na siyang kausapin kailanman<Salungatin siya nang paulit-ulit",
"Kapag si Bunso ay maraming itinatanong, ano ang dapat mong gawin?=Pasensyosong sagutin ang lahat ng mga tanong niya>Pagtawanan siya+Sabihing bawal nang magtanong<Magpakita ng galit hanggang umalis siya",
"Ano ang ibig sabihin ng pagtanggap sa isang kapamilya?=Pagpapanatili ng magandang ugnayan sa kanya kahit mayroon kayong mga pagkakaiba>Pagpilit sa kanyang baguhin ang kanyang mga ugali+Pagkopya sa kanyang mga paniniwala<Pagtawa sa kanyang mga hilig o interes",
"Alin sa mga sumusunod ang nagpapakita ng pagmamahal sa isang kapamilya?=Pag-aalok ng tulong sa kanya>Pag-iwas sa kanya kapag may problema siya+Paninisi sa kanya<Pakikipagtalo sa kanya sa maliit na bagay",
"Ano ang dapat mong gawin kung masayahin at palabiro si Kuya?=Makibahagi sa katuwaan kapag siya ay masaya>Pagbawalan siyang mag-ingay+Iwasan siya kapag siya ay nagbibiro<Magalit tuwing siya ay tatawa",
"Alin sa mga sumusunod ang dapat mong gawin kapag magkakaroon kayo ng handaan sa bahay?=Tumulong sa paghahanda>Magtago ng pagkain sa kuwarto+Pigilan ang pagdalo ng mga bisita<Umalis nang hindi nagpaalam",
"Alin sa mga sumusunod ang halimbawa ng paggalang sa damdamin ng iba?=Pakikinig sa kanilang mga opinyon>Pagtangging makinig sa kanila+Pagtawa sa kanilang mga hinaing<Panlalait sa kanilang mga sinabi",
"Paano natin maipapakita ang pagtanggap sa isang kapamilyang kakaiba ang mga hilig at pag-uugali?=Pagpapanatili ng magandang relasyon sa kanya>Pagpapakita ng inis sa kanyang pagkilos+Pagpuna sa kanya sa paraang nakakasakit ng damdamin<Tuluyang pag-iwas sa kanya",
"Bakit mahalagang magpakita tayo ng respeto sa ating mga kapamilya?=Upang mapanatili ang pagkakaisa sa pamilya>Upang hindi tayo mapagalitan+Para sumunod sila sa lahat ng gusto natin<Para purihin tayo ng ibang tao",
"Bakit mahalagang kilalanin natin nang lubos ang ating pamilya?=Upang mas maunawaan natin ang bawat isa>Upang makapagmalaki tayo sa ibang pamilya+Upang pagbigyan tayo ng ating pamilya sa lahat ng gusto natin<Upang mapuri ng ibang tao ang ating pamilya",

);

?>

</head>

</bod

</html>