<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masunurin - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masunurin";
$_SESSION['tnum']="*1a";

$questions=array(


"Alin sa mga ito ang sinusunod natin pag nagsasabi tayo ng 'po' at 'opo' sa matatanda?=Paggamit ng magalang na pananalita>Magiliw na pakikitungo+Pagpapakita ng pagkakaisa<Pagpapahalaga sa pananampalataya",
"Alin sa mga ito ang sinusunod natin pag palangiti at mabait tayo sa ating mga kapamilya?=Magiliw na pakikitungo>Paggamit ng magalang na pananalita+Pagpapakita ng pagkakaisa<Pagpapahalaga sa pananampalataya",
"Alin sa mga ito ang sinusunod natin pag ginagawa natin ang mga ipinapagawa sa atin ng ating mga magulang?=Pagsunod sa mga utos>Paggamit ng magalang na pananalita+Pagdiriwang ng pamilya<Pagpapahalaga sa pananampalataya",
"Alin sa mga ito ang sinusunod natin pag tumutulong tayo sa mga gawain sa bahay?=Pagpapakita ng pagkakaisa>Paggamit ng magalang na pananalita+Pagdiriwang ng pamilya<Pagpapahalaga sa pananampalataya",
"Alin sa mga ito ang sinusunod natin pag sumasama tayo sa pagdarasal at pagsisimba ng ating pamilya?=Pagpapahalaga sa pananampalataya>Paggamit ng magalang na pananalita+Pagdiriwang ng pamilya<Pagpapakita ng pagkakaisa",
"Alin sa mga ito ang sinusunod natin pag nakikilahok tayo sa mga salu-salo at selebrasyon ng ating pamilya?=Pagdiriwang ng pamilya>Paggamit ng magalang na pananalita+Pagpapahalaga sa pananampalataya<Pagpapakita ng pagkakaisa",
"Alin sa mga ito ang sinusunod natin pag nagmamano at nakikinig tayo sa ating mga magulang, lolo, at lola?=Pagbibigay ng respeto sa mga nakakatanda>Pagtuturo ng tamang asal sa mga bata+Pag-aalaga sa kalusugan ng bawat isa<Pagpapahalaga sa edukasyon",
"Alin sa mga ito ang sinusunod ng ating mga kuya at ate pag sinasanay nila tayong maging magalang, masunurin, at mabait?=Pagtuturo ng tamang asal sa mga bata>Pagbibigay ng respeto sa mga nakakatanda+Pag-aalaga sa kalusugan ng bawat isa<Pagpapahalaga sa edukasyon",
"Alin sa mga ito ang sinusunod natin pag tumutulong tayo sa pagpapakain ng kapamilyang may sakit?=Pag-aalaga sa kalusugan ng bawat isa>Paggamit ng magalang na pananalita+Pagdiriwang ng pamilya<Pagpapahalaga sa edukasyon",
"Alin sa mga ito ang sinusunod natin pag nag-aaral tayong mabuti?=Pagpapahalaga sa edukasyon>Pag-aalaga sa kalusugan ng bawat isa+Pagbibigay ng respeto sa mga nakakatanda<Pagpapakita ng pagkakaisa",
"Bakit mahalaga ang paggamit ng magagalang na pananalita?=Para ipakita ang respeto sa iba>Para purihin tayo ng ating guro+Para hindi tayo mapagalitan<Para makuha natin ang ating gusto",
"Ano ang dapat gawin kapag inutusan tayo ng ating magulang?=Sumunod agad>Huwag sumunod+Sumunod pagkalipas ng isang oras<Magreklamo bago sumunod",
"Ano ang ibig sabihin ng pagiging magiliw sa pamilya?=Pagiging mabait at masayang kasama>Pagiging masungit+Hindi pagpansin sa kanila<Pag-iwas sa kanila",
"Bakit mahalaga ang pagtutulungan sa bahay?=Para tumibay ang ugnayan ng lahat>Para makita kung sino ang pinakamagaling+Para mas lalong bumigat ang mga gawain<Para makaiwas sa pakikipag-usap sa bawat isa",
"Ano ang ibig sabihin ng pagiging isang masunuring bata?=Paggawa ng mga iniuutos ng magulang>Pagiging mabait na kaibigan+Pagiging masayahing kalaro<Pagkakaroon ng kakaibang talento",
"Ano ang iyong ginagawa kapag nagmamano ka sa mga nakatatanda?=Nagbibigay ng respeto>Naghihintay ng papuri+Nanghihingi ng regalo<Nagpapakita ng talino",
"Ano ang dapat gawin kapag sama-samang nagdarasal ang pamilya?=Sumabay sa pananalangin>Umupo sa tabi nila+Pumasok sa sariling silid<Maglaro habang hinihintay silang matapos",
"Bakit mahalaga ang sama-samang pagdarasal ng pamilya?=Para magkaisa sa pagmamahal sa Diyos>Para humanga ang komunidad+Para magkaroon ng maraming pera<Para mainggit ang ibang pamilya",
"Ano ang dapat gawin kapag mayroong salu-salo ang pamilya?=Sumali at makipagkuwentuhan>Kumain nang mag-isa+Magtago sa silid<Maglaro sa labas",
"Bakit mahalaga ang pagsunod sa mga magulang?=Para ipakita ang respeto at pagmamahal sa kanila>Para makahingi sa kanila ng pera+Para hindi mapagalitan<Para makaiwas sa paggawa ng takdang aralin",
"Ano ang dapat mong gawin kapag tinuturuan ka ng tamang asal?=Makinig at sumunod>Magreklamo sa nagtuturo+Magkunwaring nakikinig<Magpaalam at umalis",
"Alin sa mga ito ang HINDI nagpapakita ng paggalang sa nakakatanda?=Pagsigaw sa kanila>Pagmamano sa kanila+Pakikinig sa kanilang payo<Pagtulong sa kanila",
"Ano ang dapat mong gawin kapag inutusan ka ng iyong lola o lolo?=Sumunod nang may galak>Sumunod nang padabog+Maglakad nang palayo<Sabihing may ginagawa kang iba",
"Bakit mahalaga ang pakikinig sa mga payo ng nakatatanda?=Para matuto mula sa kanilang mga karanasan>Para hindi mapagalitan+Para makaiwas sa mga gawaing bahay<Para makahingi sa kanila ng pera",
"Ano ang dapat gawin kapag may utos ang magulang na hindi mo naiintindihan?=Magtanong para maintindihan ang utos>Huwag na lang sundin+Magreklamong hindi maliwanag ang utos<Gawin ang utos kahit alam mong magkakamali ka",

);

?>

</head>

</bod

</html>