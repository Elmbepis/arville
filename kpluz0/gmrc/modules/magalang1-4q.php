<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang sa mga Relihiyon - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang sa mga Relihiyon";
$_SESSION['tnum']="*1j";

$questions=array(

"Ano ang ibig sabihin ng pagiging magalang sa relihiyon ng iba?=Pagrespeto sa kanilang pananampalataya>Pagtatawa sa kanilang paniniwala+Pagkontra sa kanilang mga kaugalian<Pagbabalewala sa kanilang mga tradisyon",
"Ano ang dapat gawin kapag may nagpapaliwanag tungkol sa kanilang relihiyon?=Unawain ang paliwanag>Magbiro tungkol dito+Iwasang makinig<Labanan ang paliwanag",
"Alin sa mga ito ang dapat gawin sa relihiyon ng iba?=Unawain at igalang>Laitin+Gawing biro<Bigyan ng masamang kahulugan",
"Alin sa mga ito ang dapat mong gawin kapag napadaan ka sa isang lugar ng pagsamba?=Maging tahimik at magalang>Gumawa ng ingay+Maglaro sa paligid<Magkalat",
"Ano ang tamang gawin sa tradisyon ng ibang relihiyon?=Igalang ito kahit hindi mo ito ginagawa>Maliitin ito+Pagtawanan ito<Gawin itong biro",
"Ano ang maitutulong ng pagkilala sa tradisyon ng iba?=Pagkakaroon ng kapayapaan at pagkakaisa>Pagkakaroon ng mas maraming kaaway+Pagkakaroon ng mga alitan<Kawalan ng pagkakaisa sa pamayanan",
"Ano ang dapat mong gawin kung maimbitahan ka sa pagdiriwang ng ibang relihiyon?=Makilahok nang may paggalang>Tumanggi nang walang paliwanag+Manggulo sa pagdiriwang<Pagtawanan ang pagdiriwang",
"Ano ang tamang ugali kapag nakikisalamuha sa ibang relihiyon?=Magpakita ng respeto at kabutihan>Mainis sa kanilang mga paniniwala+Magbiro tungkol sa kanilang relihiyon<Balewalain ang kanilang mga tradisyon",
"Bakit mahalagang makinig nang mabuti sa iba tungkol sa kanilang relihiyon?=Para maunawaan ang kanilang mga paniniwala>Para makapagpakalat ng maling impormasyon+Para mapagtawanan ang kanilang relihiyon<Para makontra ang kanilang mga paniniwala",
"Alin sa mga ito ang dapat iwasan upang mapanatili ang respeto sa ibang relihiyon?=Pagkukuwento ng hindi totoo tungkol sa kanilang relihiyon>Pagkilala sa kanilang mga tradisyon+Pagbati sa kanilang espesyal na araw<Paggalang sa kanilang lugar ng pagsamba",
"Alin sa mga ito ang dapat gawin upang magdulot ng kapayapaan sa pamayanan?=Pagmamalasakit sa kapwa anuman ang kanyang relihiyon>Pagsisimula ng away tungkol sa relihiyon+Pagpapalaganap ng maling impormasyon<Pangmamaliit ng paniniwala ng ibang tao",
"Bakit mahalaga ang paggalang sa relihiyon ng iba?=Para maging mapayapa ang pamayanan>Para magkagalit ang mga tao+Para maging magulo ang komunidad<Para hindi magkaisa ang lahat",
"Paano maipapakita ang paggalang sa isang lugar ng pagsamba?=Magpakita ng magandang asal dito>Magtapon ng basura sa paligid+Mag-ingay sa loob<Makipaglaro sa ibang mga bata",
"Alin sa mga ito ang magandang ugaling dapat ituro sa mga bata?=Paggalang sa relihiyon ng iba>Pagtatawa sa paniniwala ng iba+Pagbabalewala sa mga tradisyon ng iba<Pagiging magulo sa isang lugar ng pagsamba",
"Ano ang dapat gawin kapag may espesyal na selebrasyon ang ibang relihiyon?=Batiin sila nang maayos>Huwag silang pansinin+Pagtawanan ang kanilang okasyon<Mainis sa kanilang pagdiriwang",
"Ano ang epekto sa pamayanan ng paggalang natin sa relihiyon ng iba?=Magdudulot ito ng pagkakaisa at kapayapaan>Magsisimula ito ng mga gulo+Magiging maingay ang paligid<Magkakaroon ng mga pagtatalo",
"Ano ang tamang gawin kapag may narinig kang maling impormasyon tungkol sa relihiyon ng iba?=Iwasto ang kamalian>Ikalat ito sa iba+Pagtawanan ito<Makipag-away sa nagkuwento",
"Alin sa mga ito ang dapat ipakita sa ibang relihiyon?=Paggalang at mabuting pakikitungo>Pagkainis o galit+Pagsalungat<Pangmamaliit sa kanilang paniniwala",
"Alin sa mga ito ang dapat mong gawin sa mga ritwal ng ibang relihiyon?=Igalang kahit hindi mo ginagawa ang mga ito>Maliitin ang mga ito+Pagtawanan ang mga ito<Pigilan ang mga ito", 
"Alin sa mga ito ang hindi dapat gawin sa mga kapwang may ibang relihiyon?=Pagpapakalat ng maling impormasyon tungkol sa kanila>Paggalang sa kanilang mga paniniwala+Pagpapakita sa kanila ng kabutihan<Pag-unawa sa kanilang mga tradisyon",
"Ano ang dapat gawin upang mas maintindihan ang relihiyon ng iba?=Makinig nang mabuti sa kanilang paliwanag>Umiwas sa kanilang pagpapaliwanag+Maliitin ang kanilang mga sinasabi<Pagtawanan ang kanilang paliwanag",
"Ano ang dapat mong gawin kapag hindi mo nauunawaan ang relihiyon ng iba?=Magtanong nang maayos>Pagtawanan ito+Magkalat ng maling impormasyon<Magpakita ng pagkainis",
"Alin sa mga ito ang nagpapakita ng paggalang sa relihiyon ng iba?=Pagmamalasakit sa lahat, anuman ang paniniwala nila>Pag-iwas sa mga taong may ibang paniniwala+Pangmamaliit ng mga tradisyon ng iba<Pagiging magulo sa sambahan ng iba",
"Paano makakaiwas sa alitan tungkol sa relihiyon?=Unawain at igalang ang mga paniniwala ng iba>Magpakalat ng maling impormasyon+Magalit sa mga kaugalian ng iba<Maging magulo sa mga lugar ng pagsamba ng iba",
"Ano ang dapat gawin kung may seremonya sa lugar ng pagsamba ng ibang relihiyon?=Maging tahimik at magpakita ng respeto>Pagtawanan ang seremonya+Gumawa ng ingay<Makipaglaro sa ibang mga bata",

);

?>

</head>

</bod

</html>