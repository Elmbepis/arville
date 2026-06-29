<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagkumbaba - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagkumbaba";
$_SESSION['tnum']="*8a";

$questions=array(

"Ano ang kahulugan ng pagiging mapagkumbaba?=Pagkilala sa sariling limitasyon>Pagpapakita ng kahusayan sa lahat ng bagay+Pagtanggi sa tulong ng iba<Pagmamagaling sa harap ng kapwa",
"Ang pasasalamat sa Diyos ay maipapakita sa pamamagitan ng alin sa mga sumusunod?=Kabutihan sa kapwa>Pagbili ng mamahaling gamit+Pagpapayaman sa sarili<Hindi pagpansin sa problema ng iba",
"Pagkagising sa umaga, alin sa mga sumusunod ang magpapakita ng pasasalamat sa Diyos?=Pagdarasal nang taos-puso>Pagkain kaagad ng almusal+Pagtulog muli<Paghihilamos",
"Alin sa mga sumusunod ang isang kongkretong paraan ng pagbabahagi ng mga biyayang natatanggap?=Pagbibigay ng pagkain sa nagugutom>Pagbili ng mga mamahaling pagkain+Pagtatapon ng sobrang pagkain<Pagkain nang mag-isa",
"Ang pasasalamat sa kapwa ay maipapakita sa pamamagitan ng alin sa mga sumusunod?=Paggalang at pagmamahal sa lahat>Pagmamalaki sa kapwa+Pakikipagtalo kung kani-kanino<Panlilinlang ng ibang tao",
"Ang pagiging masipag sa pag-aaral at pag-iwas sa masasamang bisyo ay mga halimbawa ng alin sa mga sumusunod na paraan ng pasasalamat sa Diyos?=Pagkakaroon ng disiplina sa sarili>Pagtulong sa kapwa+Pag-iwas sa pagsasayang<Pakikiisa sa pamilya",
"Ang pagbibigay ng pagkain at damit sa mga nasunugan ng bahay ay halimbawa ng alin sa mga sumusunod na paraan ng pasasalamat sa Diyos?=Pagtulong sa kapwa>Pagkakaroon ng disiplina sa sarili+Pag-iwas sa pagsasayang<Pakikiisa sa pamilya",
"Alin sa mga sumusunod na paraan ng pasaslamat sa Diyos ang tumutukoy sa pagtitipid at wastong paggamit ng mga likas na yaman?=Pag-iwas sa pagsasayang>Pagtulong sa kapwa+Pagkakaroon ng disiplina sa sarili<Pakikiisa sa pamilya",
"Alin sa mga sumusunod na paraan ng pasaslamat sa Diyos ang tumutukoy sa bukas-palad na pakikipagtulungan sa loob ng tahanan, lalo na sa panahon ng problema?=Pakikiisa sa pamilya>Pagtulong sa kapwa+Pag-iwas sa pagsasayang<Pagkakaroon ng disiplina sa sarili",
"Alin sa mga sumusunod na paraan ng pagiging mapagpasalamat ang tumutukoy sa paglalaan ng oras at yaman para sa mga nangangailangan?=Pagbabahagi sa kapwa>Paggalang sa mga nakatatanda+Pangangalaga sa kapaligiran<Pag-aaral nang mabuti",
"Alin sa mga sumusunod na paraan ng pagiging mapagpasalamat ang tumutukoy sa pagsunod at pakikinig sa mga taong mas may karanasan kaysa sa atin?=Paggalang sa mga nakatatanda>Pagbabahagi sa kapwa+Pangangalaga sa kapaligiran<Pag-aaral nang mabuti",
"Alin sa mga sumusunod na paraan ng pagiging mapagpasalamat ang tumutukoy sa pagiging inspirasyon sa iba sa pamamagitan ng pagpapakita ng kabutihan sa lahat ng pagkakataon?=Pagiging mabuting halimbawa>Pagbabahagi sa kapwa+Pangangalaga sa kapaligiran<Pag-aaral nang mabuti",
"Alin sa mga sumusunod na paraan ng pagiging mapagpasalamat ang tumutukoy sa pagpapanatili ng kalinisan at kaayusan sa mga lugar na ginagalawan natin?=Pangangalaga sa kapaligiran>Paggalang sa mga nakatatanda+Pagbabahagi sa kapwa<Pag-aaral nang mabuti",
"Ang paglilinis ng bahay, paghahanda ng pagkain, at pagdidilig ng hardin ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagiging mapagpasalamat?=Pagtulong sa mga gawaing bahay>Pagbabahagi sa kapwa+Paggalang sa mga nakatatanda<Pag-aaral nang mabuti",
"Ang masigasig na pagpasok sa klase, paghahanda sa mga pagsusulit, at pagtapos ng bawat takdang aralin ay mga halimbawa ng alin sa mga sumusunod na paraan ng pagiging mapagpasalamat?=Pag-aaral nang mabuti>Pagbabahagi sa kapwa+Pangangalaga sa kapaligiran<Pagtulong sa mga gawaing bahay",
"Alin sa mga sumusunod ang nagpapakita ng pagkakaisa sa pamilya?=Pagtutulungan sa panahon ng pagsubok>Pagtatalo sa maliliit na bagay+Pag-iwas sa bawat isa<Kawalan ng komunikasyon",
"Alin sa mga sumusunod ang nagpapakita ng ating pagpapakumbaba at pagpapasalamat sa Diyos?=Paggawa ng kabutihan sa kapwa>Panlalait sa mga dukha+Pagtanggi sa tulong<Pag-aangat ng sarili sa iba",
"Bukod sa pasasalamat sa Diyos, alin sa mga sumusunod ang isa pang kahulugan ng pagdarasal bago kumain?=Pagkilala sa mga taong tumulong sa paggawa ng pagkain>Paghiling ng mas masarap at mas maraming pagkain+Pagnanasa sa pagkaing hindi pa natitikman<Pagpapahayag ng pagkagutom",
"Bakit mahalaga ang paggalang sa mga nakatatanda?=Upang kilalanin ang kanilang pagsasakripisyo noon para sa atin>Upang makakuha ng pabuya mula sa kanila+Upang hangaan tayo ng ibang tao<Upang hindi tayo maparusahan",
"Alin sa mga sumusunod ang dapat mong iwasan bilang pasasalamat sa mga biyayang ipinagkaloob ng Diyos?=Pagsasayang ng pagkain at likas na yaman>Pagbabahagi sa kapwa+Pangangalaga sa kalikasan<Pag-aaral nang mabuti",
"Alin sa mga sumusunod ang dapat mong gawin sa mga biyayang natatanggap?=Paggamit ng mga ito sa kabutihan>Pag-iimbak ng mga ito+Pagyayabang ng mga ito sa kapwa<Pagwawaldas ng mga ito",
"Anong katangian ang kabaligtaran ng pagiging mapagkumbaba?=Pagmamataas o pagmamalaki>Pagpapasensiya+Paggalang<Pagmamalasakit",
"Ano ang ibig sabihin ng \"lahat tayo ay pantay-pantay sa mata ng Diyos?\"=Ang pagmamahal ng Diyos ay pareho para sa lahat.>Mas mahal ng Diyos ang mga mayayaman.+Ang mga mahihirap ay hindi mahalaga para sa Diyos.<Lahat tayo ay hindi mahal ng Diyos.",
"Alin sa mga sumusunod ang itinuturo ng pamilya tungkol sa pasasalamat?=Na ang biyaya ay may kaakibat na pananagutan>Na ang biyaya ay para lamang sa sarili+Na ang biyaya ay dapat ipagyabang sa iba<Na ang biyaya ay hindi dapat pahalagahan",
"Alin sa mga sumusunod ang hindi nagpapakita ng pagiging bukas-palad?=Pagtawa sa kaibigang dumadaan sa isang pagsubok>Pagtuturo sa kaklaseng nahihirapan sa aralin+Pagbabahagi ng baon sa iba<Pagpapahiram ng gamit sa nangangailangan",

);

?>

</head>

</bod

</html>