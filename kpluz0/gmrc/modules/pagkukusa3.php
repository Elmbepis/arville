<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagkukusa sa mga Gawain - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagkukusa sa mga Gawain";
$_SESSION['tnum']="*38";

$questions=array(

"Ano ang ibig sabihin ng pagkukusa?=Paggawa ng isang gawain kahit walang nag-uutos>Pag-uutos sa ibang tao+Paggawa ng isang gawain kapag may nag-utos lamang<Pag-iwas sa mga gawain",
"Alin sa mga sumusunod ang nagpapakita ng pagkukusa?=Pag-aayos ng mga laruan nang walang nag-uutos>Paghihintay ng utos ni Nanay bago magligpit+Pagwawalis ng sahig dahil sinabihan ng guro<Pag-aayos ng mga gamit dahil ipinagawa ni Tatay",
"Alin sa mga sumusunod ang hindi ipinapakita ng pagkukusa?=Katamaran>Pagiging responsable+Pagiging mapagkakatiwalaan<Pagkakaroon ng disiplina",
"Ano ang dapat mong gawin kung may pagsusulit kinabukasan?=Mag-aral kahit walang nagsasabi>Hintayin ang paalala ni Nanay bago mag-aral+Maglaro muna bago mag-aral<Matulog nang hindi nag-aaral",
"Alin sa mga sumusunod ang hindi halimbawa ng pagkukusa?=Paghihintay ng paalala bago maligo>Pag-aayos ng gamit kahit walang nag-uutos+Paglilinis ng silid nang walang nagpapaalala<Pagsunod sa batas kahit walang nakakakita",
"Alin sa mga sumusunod ang hindi halimbawa ng pagkukusa?=Paghihintay ng utos bago magdilig>Pagliligpit ng higaan kahit walang nag-uutos+Paggawa ng takdang aralin nang walang nagpapaalala<Pagtulong sa kapwa kahit walang nakakakita",
"Alin sa mga sumusunod ang hindi halimbawa ng pagkukusa?=Pag-aaral matapos lamang paalalahanan>Pagliligpit ng mga laruan kahit walang nag-uutos+Pag-aalaga sa nakababatang kapatid nang hindi pinapaalalahanan<Pananalangin kahit walang nakakakita",
"Alin sa mga sumusunod ang nagpapakita ng iyong pagkukusa pagkagising mo sa umaga?=Pag-aayos agad ng higaan>Muling pagtulog pagkatapos gumising+Paghihintay sa paalala ni Nanay bago maghandang pumasok<Hindi pagkilos hanggang tawagin",
"Alin sa mga sumusunod ang nagpapakita ng pagkukusa sa paaralan kung may kaklaseng nangangailangan ng tulong?=Pagtulong sa kaklase kahit hindi ito humihingi ng tulong>Paghihintay sa pagdating ng guro bago tumulong+Pagpuna sa kaklase sa halip na tumulong<Pagtangging tumulong sa kaklase",
"Ano ang dapat mong gawin kung makita mong abala si Nanay?=Magkusang tumulong sa kanyang gawain>Manood ng mga bidyo habang hinihintay siyang matapos+Hintaying humingi siya ng tulong bago kumilos<Pabayaan muna siyang mag-isa",
"Alin sa mga sumusunod ang hindi bunga ng pagkukusa?=Kawalan ng tiyaga sa mga gawain>Pagkakaroon ng tiwala sa sarili+Pagpapakita ng respeto ng iba<Pagiging responsable",
"Ano ang dapat mong gawin pagkatapos kumain?=Tumulong magligpit kahit walang nagsasabi>Iwanan lang basta ang pinagkainan+Maghintay ng utos bago tumulong magligpit<Pumunta sa sala para magpahinga",
"Alin sa mga sumusunod ang naglalarawan sa isang batang may pagkukusa?=Hindi na kailangang paalalahanan sa kanyang mga tungkulin>Laging nagbibigay ng utos sa iba+Laging kailangang sabihan bago gumalaw<Ayaw gumawa ng takdang-aralin",
"Paano mo maipapakita ang pagkukusa sa isang bagong kaklase?=Sa pamamagitan ng pakikipagkaibigan sa kanya kahit walang nagsasabi>Sa pamamagitan ng paghihintay ng paglapit niya sa iyo+Sa pamamagitan ng pagtingin lamang sa kanya mula sa malayo<Sa pamamagitan ng pag-iwas sa kanya",
"Alin sa mga sumusunod ang nagpapakita ng pagkukusa sa paghahanda sa pagpasok?=Pag-aayos ng mga gamit kahit walang nagsasabi>Pagtulog nang mahaba+Pagtangging mag-almusal at maligo sa oras<Pag-uutos sa kapatid na ihanda ang lahat ng mga gamit",
"Bakit dapat matutunan ng bawat bata ang pagkukusa?=Para hindi na siya umasa pa sa paalala ng iba>Para makaiwas siya sa mga gawain+Para lagi siyang pinupuri<Para hindi na niya kailangang pumasok sa paaralan",
"Alin sa mga sumusunod ang kasingkahulugan ng pagkukusa?=Pagkakaroon ng inisyatiba>Kawalan ng disiplina+Pagiging iresponsable<Pag-aalinlangan",
"Alin sa mga sumusunod ang kabaligtaran ng pagkukusa?=Paghihintay ng utos bago kumilos>Pagtulong sa mga gawaing-bahay tuwing hapon+Pag-aaral kahit walang nagpapaalala<Paglilinis ng bahay kahit hindi inuutusan",
"Alin sa mga sumusunod ang nagpapakita ng pagkukusa sa kapwa?=Pag-aalok ng tulong kahit hindi ito hinihingi>Pagmamalaki sa kapwa+Pagtangging magmalasakit sa iba<Pag-iwas sa mga taong may problema",
"Kapag nakita mong magulo ang inyong kusina, ano ang dapat mong gawin?=Ayusin ito kahit walang nagsasabi>Maghintay kay Ate na ayusin ito+Ayusin lang ito kapag inutusan ng magulang<Huwag na lang itong pansinin",
"Alin sa mga sumusunod ang sitwasyong nagpapakita ng pagkukusa?=Paglilinis ng paligid kahit hindi inuutusan>Pagkilos lamang matapos utusan nang tatlong beses+Pagsunod sa utos ni Nanay<Pagsunod sa alituntunin pagkatapos mapagalitan",
"Alin sa mga sumusunod ang bunga ng pagkukusa sa bahay?=Mas masayang samahan sa pamilya>Madalas na tampuhan+Pag-init ng ulo ng magulang<Di-pagkakaunawaan sa pagitan ng magkapatid",
"Paano mo maipapakita ang pagkukusa sa inyong paghahapunan?=Sa pamamagitan ng pag-aayos ng hapag kahit walang nag-uutos>Sa pamamagitan ng agad na pag-alis pagkatapos kumain+Sa pamamagitan ng pagtulong sa pagliligpit pagkatapos utusan<Sa pamamagitan ng pagkain nang marami",
"Kapag nagkamali ang isa mong kaibigan, alin sa mga sumusunod ang dapat mong gawin kahit walang nagsasabi sa iyo?=Tumulong maitama ang kanyang pagkakamali>Ikuwento ang kanyang pagkakamali sa iba+Pagtawanan ang kanyang pagkakamali<Pagalitan siya dahil siya ay nagkamali",
"Ang pagpapaligo sa alagang aso kahit hindi inuutusan ay halimbawa ng alin sa mga sumusunod?=Pagkukusa>Pag-aalangan+Pag-hihintay<Pag-iwas",

);

?>
</head>
</bod
</html>