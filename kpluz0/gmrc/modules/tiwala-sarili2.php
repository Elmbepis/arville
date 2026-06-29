<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Tiwala sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Tiwala sa Sarili";
$_SESSION['tnum']="*25";

$questions=array(

"Ano ang tawag sa paniniwala sa sariling kakayahan?=Tiwala sa sarili>Duda sa sarili+Pagmamalaki<Pagpapakumbaba",
"Alin sa mga ito ang nakakatulong sa pagtuklas ng sariling talento?=Pakikinig sa payo ng pamilya>Pagsusuot ng magarang damit+Panonood ng mga bidyo<Pag-iwas sa mga gawaing-bahay",
"Bakit mahalaga ang pagsubok ng iba't ibang gawain?=Para matuklasan kung saan tayo magaling>Para makaiwas sa mga utos ng magulang+Para sumikat sa paaralan<Para mabawasan ang tiwala sa sarili",
"Alin sa mga ito ang ginagawa ng iyong pamilya upang matuklasan mo ang iyong talento?=Paggabay at pagsuporta>Pagpilit sa iyo ng kanilang kagustuhan+Pagbabawal sa iyong sumubok ng mga gawain<Pagpigil sa iyong sumali sa mga palaro",
"Kapag nakita ni Nanay na mahilig kang gumuhit, ano malamang ang kanyang gagawin?=Bilhan ka ng gamit na pandrowing>Paturuan kang magsayaw+Isali ka sa isang liga ng basketbol<Pilitin kang humanap ng ibang talento",
"Paano nakakatulong ang papuri ng iba sa pagkakaroon natin ng tiwala sa sarili?=Nagpapalakas ito ng loob natin>Natuturuan tayo nitong maging mapagmalaki+Nagbibigay ito sa atin ng kalungkutan<Nagiging dahilan ito ng away",
"Paano nakakatulong ang pagsali natin sa mga programa sa paaralan?=Naibabahagi natin ang talento natin sa iba>Nagiging sikat tayo sa paaralan+Naiiwasan natin ang pag-aaral<Naiinggit sa atin ang iba",
"Bakit mahalagang ibahagi natin ang ating talento sa iba?=Para makapagbigay tayo ng kasiyahan>Para sumikat tayo sa mga mag-aaral+Para maipagyabang natin ito<Para makaiwas tayo sa pagpasok sa klase",
"Anong ang dapat mong gawin kapag pinuri ng iba ang iyong talento?=Tanggapin ito nang may pasasalamat>Magpakita ng pagmamalaki+Magalit sa pumuri<Huwag pansinin ang pumuri",
"Paano nakakatulong ang ating mga nakatatandang kapatid sa paghubog ng ating talento?=Sa pamamagitan ng pagtuturo at paggabay>Sa pamamagitan ng pagtatawa sa atin+Sa pamamagitan ng pagpintas sa ating talento<Sa pamamagitan ng panggugulo sa ating pagsasanay",
"Ano ang layunin ng pagsasanay ng ating talento?=Para lalo tayong humusay rito>Para mas mapaganda ang ating hitsura+Para may maipost tayo sa social media<Para sumikat tayo sa paaralan",
"Bakit mahalagang makinig sa suhestiyon ng iba tungkol sa ating talento?=Para mas mapabuti pa natin ang ating talento>Para hindi sila magalit sa atin+Para gawin nila ang gusto natin<Para maipakita sa kanilang mali sila",
"Alin sa mga ito ang pagbabahagi ng iyong talento kung ikaw ay mahusay magbasa?=Pagbabasa ng mga kuwento sa mga kapatid>Pagbabasa ng aklat nang mag-isa+Paglalaro ng basketbol sa labas<Pamamasyal kasama ang mga kaibigan",
"Alin sa mga ito ang mabuting epekto ng pagbabahagi ng ating talento sa iba?=Lumalakas ang ating tiwala sa sarili>Nawawalan tayo ng panahong mag-aral+Nagiging mapagmalaki tayo<Naiinggit sa atin ang iba",
"Alin sa mga ito ang nagpapalakas ng loob ng isang batang may talento?=Suporta at paniniwala ng kanyang pamilya>Panunukso ng mga kaibigan+Panlalait ng ibang tao<Pagtatawa ng mga nakatatanda",
"Alin sa mga ito ang hindi mo dapat gawin sa iyong talento?=Itago ito>Sanayin ito araw-araw+Ibahagi ito sa iba<Gamitin ito upang magbigay ng inspirasyon",
"Alin sa mga ito ang mainam mong gawin kung may talento ka sa pagsasayaw?=Magturo ng pagsasayaw sa iba>Magyabang sa social media+Umiwas sa mga taong humahanga<Bawasan ang pagsasayaw",
"Alin sa mga ito ang tulong sa iyo ng patuloy mong pagsasanay sa iyong talento?=Lumalakas ang tiwala mo sa sarili>Napapagod ka nang labis+Nakakaiwas ka sa mga gawaing-bahay<Kinakapos ka ng oras sa pag-aaral",
"Ano ang tamang reaksyon kapag pinuri ng inyong guro ang iyong talento?=Magpasalamat at magpatuloy sa pagsasanay>Magyabang sa mga kaklase+Magpasalamat at tumigil na sa pagsasanay<Mainis sa papuri",
"Ano ang iyong nararamdaman kapag ginagamit mo ang iyong talento para makatulong sa iba?=Kasiyahan at kumpiyansa sa sarili>Pagod at antok+Galit o inis<Pagkabagot at pagkainip",
"Alin sa mga ito ang lumalakas sa iyo habang ginagamit mo ang iyong talento?=Tiwala sa sarili>Pagkainis sa kapwa+Kaba o nerbiyos<Kawalan ng interes",
"Ano ang dapat mong gawin kapag nahihirapan kang hanapin ang iyong talento?=Sumubok pa ng maraming gawain>Magreklamo sa guro+Sumuko sa paghahanap<Manisi ng ibang tao",
"Ano ang ginagawa ng iyong pamilya kapag napansin nilang may bago kang kakayahan?=Sinusuportahan ka nila>Pinagagalitan ka nila+Hindi ka nila pinapansin<Tinatawanan ka nila",
"Alin sa mga ito ang hindi ginawa sa iyo ng iyong pamilya upang magkaroon ka ng tiwala sa sarili?=Pananakot>Pagbibigay ng papuri+Paggabay<Pagbibigay ng suporta",
"Ano ang ibig sabihin kapag masaya tayo sa paggawa ng isang bagay?=Maaaring konektado ito sa ating talento>Hindi pa tayo pagod+Wala tayong problema<Nagsasayang tayo ng oras",

);

?>

</head>

</bod

</html>