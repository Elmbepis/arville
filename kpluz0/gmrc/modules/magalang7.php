<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang";
$_SESSION['tnum']="*71";

$questions=array(

"Ano ang ibig sabihin ng dignidad?=Pagiging karapat-dapat mabigyan ng halaga at respeto>Pagiging mayaman+Pagiging maganda, guwapo, o sikat<Pagiging makapangyarihan sa lipunan",
"Bakit mahalaga ang paggalang sa iba?=Upang maiwasan ang mga alitan>Upang magkaroon ng marangyang buhay+Upang kahangaan ng iba<Upang makapanglamang sa kapwa",
"Ano ang dapat nating gawin kung may makita tayong basura sa kalye?=Itapon ito sa basurahan>Huwag itong pansinin+Itago ito sa ilalim ng upuan<Takpan ito ng lupa",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa ating mga magulang?=Pagsunod sa kanilang mga utos>Pag-alis sa bahay nang walang paalam+Pag-iwas sa kanila<Pagtataas ng boses sa kanila",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa ating mga kamag-aral?=Pakikinig kapag sila ay nagsasalita>Pangungutya sa kanila+Paninira sa kanila nang palihim<Pagpapahiya sa kanila",
"Bakit mahalaga ang paggalang sa iba't ibang pananampalataya?=Upang magkaroon ng pagkakaisa at kapayapaan>Upang makakuha ng paghanga sa ibang tao+Upang mamanipula ang ibang tao<Upang mapalitan ang sariling pananampalataya",
"Ano ang dapat nating gawin kung mayroong mahalagang okasyon sa ating pamilya?=Dumalo rito at makisalo>Umalis at mamasyal+Magtago sa ating kuwarto<Manood ng telebisyon",
"Alin sa mga sumusunod ang HINDI nagpapakita ng paggalang sa dignidad ng sarili?=Pagpapanggap sa sarili>Pagtutok sa kalusugan+Pagtupad sa pangako<Paglinang ng mga sariling kakayahan",
"Alin sa mga sumusunod ang HINDI nagpapakita ng paggalang sa dignidad ng sarili?=Pagmumukmok sa loob ng silid>Pagsisikap makamit ang mga personal na layunin+Pagpapanatili ng positibong pag-iisip<Pag-aalaga sa emosyonal na kalusugan",
"Alin sa mga sumusunod ang HINDI nagpapakita ng paggalang sa dignidad ng pamilya?=Paglalagi sa bahay ng kaibigan>Pagpapakita ng pagmamahal sa mga kapamilya+Pagpapahalaga sa opinyon ng bawat kapamilya<Pagtulong sa mga gawaing bahay",
"Alin sa mga sumusunod ang HINDI nagpapakita ng paggalang sa dignidad ng pamilya?=Pagrereklamo kapag inuutusan>Pagdalo sa mahahalagang okasyon ng pamilya+Pagiging bukas sa komunikasyon<Pag-aalaga ng kapamilyang maysakit",
"Alin sa mga sumusunod ang HINDI nagpapakita ng paggalang sa dignidad ng kapwa?=Pagsisinungaling sa kapwa>Paggalang sa karapatan ng iba+Pagpapakita ng kabutihan<Pagpapanatili ng kalinisan sa publiko",
"Alin sa mga sumusunod ang HINDI nagpapakita ng paggalang sa dignidad ng kapwa?=Pagkakalat sa kalye>Pagpapahalaga sa pagkakaiba-iba+Pagpapakita ng magandang asal<Pagtulong sa mga nangangailangan",
"Alin sa mga sumusunod ang tamang reaksyon kapag may nagbigay ng tulong sa iyo?=Magpasalamat>Hindi kumibo+Tumanggi sa tulong<Magpakita ng pagkainis",
"Paano natin maipapakita ang respeto sa kapwang may ibang kultura?=Paggalang sa kanyang mga kaugalian at paniniwala>Pagpuna o pagsalungat sa kanyang kultura+Pagtawa sa kanilang mga tradisyon<Pag-iwas sa pakikisalamuha sa kanya",
"Ano ang dapat nating gawin kung ang ating kapwa ay may ibang pananampalataya?=Irespeto ang kanyang mga paniniwala>Pilitin siyang magpalit ng relihiyon+Pagtawanan ang kanyang mga pananaw<Iwasang makisalamuha sa kanya",
"Alin sa mga sumusunod ang nagpapakita ng pagiging magalang sa pampublikong lugar?=Pagpapanatili ng kalinisan>Paninira ng mga gamit+Labis na pag-iingay<Panggugulo sa ibang tao",
"Ano ang dapat mong gawin kapag may nakikipag-usap sa iyo?=Makinig nang maigi>Tumalikod at umalis+Sabayan siya sa pagsasalita<Tumangging makipag-usap",
"Paano mo maipapakita ang paggalang mo sa iyong guro?=Pagsunod sa kanyang mga tagubilin>Pagiging magulo sa klase+Pagtataas ng boses sa pagsasalita<Pag-iwas sa kanya",
"Ano ang dapat mong gawin kapag may makita kang nagpapasaklolo?=Tumulong sa abot ng makakaya>Huwag itong pansinin+Tumalikod at umalis<Pagtawanan ang kanyang kalagayan",
"Ano ang dapat mong gawin kung may taong nagtanong sa iyo ng direksyon?=Sumagot nang magalang>Sumagot nang pagalit+Huwag siyang pansinin<Magbigay ng maling impormasyon",
"Paano mo maipapakita ang paggalang sa opinyon ng kapwang may ibang pannanaw?=Pakikinig at pagtanggap dito>Pagsisimula ng argumento+Hindi pagpansin sa kanya<Pagpilit mabago ang kanyang paniniwala",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa isang pampublikong lugar?=Pagsunod sa mga alituntunin ng lugar>Pagkakalat ng basura rito+Labis na pag-iingay<Panggagambala sa mga tao",
"Alin sa mga sumusunod ang dapat mong gawin habang ikaw ay nasa isang mahabang pila?=Maghintay nang maayos>Sumingit sa unahan+Magpakita ng pagkainis sa mga nauuna<Gumawa ng gulo sa pila",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa kalikasan?=Hindi pagkakalat sa paligid>Pagsira ng mga halaman at puno+Pagsusunog ng basura kahit saan<Paghahagis ng sirang gamit sa ilog",

);

?>

</head>

</bod

</html>