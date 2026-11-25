<html>
<head>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Magalang na Pananalita";

if ($grd <= 2) {
    $questions = array(
        "Ano ang sasabihin mo kung may makasalubong ka sa umaga?=Magandang umaga po.>Magandang gabi po.+Magandang tanghali po.<Magandang hapon po.",
        "Ano ang sasabihin mo kung may makasalubong ka sa hapon?=Magandang hapon po.>Magandang gabi po.+Magandang tanghali po.<Magandang umaga po.",
        "Ano ang sasabihin mo kung may makasalubong ka sa tanghali?=Magandang tanghali po.>Magandang gabi po.+Magandang umaga po.<Magandang hapon po.",
        "Ano ang sasabihin mo kung may makasalubong ka sa gabi?=Magandang gabi po.>Magandang umaga po.+Magandang tanghali po.<Magandang hapon po.",
        "Ano ang sasabihin mo sa iyong lolo at lola kapag tumunog ang kampana sa hapon?=Mano po, lolo at lola.>Matulog na po kayo.+Mag-ingat po kayo.<Salamat po sa inyo.",
        "Ano ang sasabihin mo kung aalis na ang iyong bisita?=Paalam at mag-iingat po kayo.>Huwag ka nang babalik.+Ayaw na kitang makita.<Umalis ka na agad.",
        "Ano ang sasabihin mo kung makasalubong mo ang iyong guro?=Magandang araw po, Ma'am.>Kumusta ka, kaibigan.+Maligayang kaarawan po, Ma'am.<Makikiraan po.",
        "Ano ang sasabihin mo kung gabi na at dumating ang iyong ama sa inyong bahay?=Magandang gabi po, Tatay.>Kumusta ka, kuya.+Magandang umaga po, Tatay.<Paumanhin po, Tatay.",
        "Ano ang sasabihin mo kung may nakita kang dayuhang pumasok sa ating bansa?=Mabuhay!>Paalam!+Paumanhin!<Salamat!",
        "Ano ang sasabihin mo sa iyong guro kung uuwi ka na?=Paalam po, Ma'am.>Salamat po, Ma'am.+Paumanhin po, Ma'am.<Mabuhay po, Ma'am.",
        "Ano ang sasabihin mo kung may magbigay sa iyo ng kendi?=Maraming salamat sa iyo.>Pahingi pa ulit.+Kulang pa ito.<Paalam sa iyo.",
        "Ano ang sasabihin mo kung masira mo ang laruan ng iyong kalaro?=Sori dahil nasira ko ang laruan mo.>Salamat sa iyo.+Akin na lang ito.<Mura lang naman iyan.",
        "Ano ang sasabihin mo sa iyong ina kung nais mong maglaro sa labas?=Maaari po ba akong maglaro sa labasLalabas lang ako sandali.+Aalis po muna ako.<Diyan ka na muna.",
        "Ano ang sasabihin mo sa iyong ina kung nais mong bumili ng kendi?=Maaari po ba akong bumili ng kendiPabili ng kendi.+Pahingi ng pera.<Ibili mo ako ng kendi.",
        "Ano ang sasabihin mo kung manghihiram ka ng lapis?=Puwede ko bang hiramin ang lapis moAkin na lang ang lapis mo.+Pahingi naman ng lapis.<Puwede ko bang agawin ang lapis mo?",
        "Ano ang sasabihin mo kung manghihiram ka ng pambura?=Puwede ko bang hiramin ang pambura moAkin na lang ang pambura mo.+Pahingi naman ng pambura.<Puwede ko bang agawin ang pambura mo?",
        "Ano ang sasabihin mo kung nais mong umupo sa tabi ninuman?=Puwede ba akong umupo sa tabi moPuwede ka bang umalis para makaupo ako?+Tumabi ka nga at uupo ako.<Hoy, alis diyan!",
        "Ano ang sasabihin mo sa iyong guro kung nais mong pumunta sa banyo?=Ma'am, puwede po ba akong magtungo sa banyoC.R. lang ako sandali, ha?+Paalam po sa inyo, Ma'am.<Paumanhin po, Ma'am.",
    );
}
elseif ($grd == 3) {
    $questions = array(
        "Ano ang sasabihin mo kung gusto mong sumali sa usapan ng iba?=Maaari po ba akong sumali sa usapan ninyoPasalihin nyo nga ako sa usapan ninyo.+Ito ang masasabi ko sa usapan ninyo.<Sasali ako sa usapan ninyo.",
        "Ano ang sasabihin mo kung gusto mong imungkahi sa iba ang magkaroon ng isang halalan?=Magalang ko pong iminumungkahing magkaroon tayo ng isang halalan.>Dapat may halalan tayo.+Gusto kong magkaroon ng halalan.<Iniuutos kong magkaroon tayo ng halalan.",
        "Ano ang sasabihin mo kung gusto mong imungkahi sa iba ang isang bagong proyekto?=Magalang ko pong iminumungkahi ang isang bagong proyekto.>Dapat nating gawin ang bagong proyektong ito.+Gusto kong gumawa tayo ng isang bagong proyekto.<Iniuutos kong gumawa tayo ng isang bagong proyekto.",
        "Ano ang sasabihin mo kung gusto mong imungkahi sa iyong mga kapitbahay ang paglilinis ng mga kalye tuwing Sabado?=Magalang ko pong iminumungkahing maglinis po tayo ng mga kalye tuwing Sabado.>Dapat nating linisin ang mga kalye tuwing Sabado.+Gusto kong linisin natin ang mga kalye tuwing Sabado.<Iniuutos kong linisin natin ang mga kalye tuwing Sabado.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag kung bakit ka nahuli sa isang pagtitipon?=Maaari ko po bang ipaliwanag kung bakit ako nahuliMakinig kayo at sasabihin ko kung bakit ako nahuli.+Hoy, hindi ko kasalanan kung bakit ako nahuli.<Hindi lang naman ako ang nahuhuli. Kayo rin, di ba?",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa ibang tao ang iyong proyekto?=Karangalan ko pong ipaliwanag sa inyo ang aking proyekto.>Makinig kayo. Ipapaliwanag ko na ang aking proyekto.+Hoy, makinig kayo sa pagpapaliwanag ng aking proyekto.<Pagpapaliwanag ito ng aking proyekto kaya makinig kayo.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa ibang tao ang iyong pananaliksik?=Salamat po sa pagkakataong maipaliwanag sa inyo ang aking pananaliksik.>Ipapaliwanag ko ang aking pananaliksik kaya makinig kayo.+Hoy, makinig kayo sa pagpapaliwanag ng aking pananaliksik.<Pagpapaliwanag ito ng aking pananaliksik kaya makinig kayo.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa taumbayan ang pag-iingat laban sa COVID-19?=Salamat po sa pagkakataong maipaliwanag sa inyo kung paano makapag-iingat laban sa COVID-19.>Makinig kayo kung ayaw ninyong masawi nang dahil sa COVID-19.+Hoy, makikinig ba kayo o hindi? Tungkol sa COVID-19 ito.<Huwag nyong sayangin ang oras ko. Makinig kayo.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa iyong mga kapitbahay ang kahalagahan ng inyong seguridad?=Salamat po sa pagkakataong maipaliwanag sa inyo ang kahalagahan ng ating seguridad.>Makinig kayo kung ayaw nyong mapahamak tayong lahat.+Hoy, makikinig ba kayo o hindi? Tungkol ito sa ating seguridad.<Huwag nyong sayangin ang oras ko. Makinig kayo.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa iyong mga kapitbahay ang kahalagahan ng pagtatanim ng mga puno?=Salamat po sa pagkakataong maipaliwanag sa inyo ang kahalagahan ng pagtatanim ng mga puno.>Makinig kayo at may sasabihin ako tungkol sa pagtatanim ng mga puno.+Hoy, makikinig ba kayo o hindi? Tungkol ito sa pagtatanim ng mga puno.<Huwag nyong sayangin ang oras ko. Makinig kayo.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa ibang tao ang nakaambang banta ng malakas na paglindol?=Karangalan ko po ang maipaliwanag sa inyo ang nakaambang banta ng malakas na paglindol.>Makinig kayo at delikado tayo sa nakaambang banta ng malakas na paglindol.+Hoy, makikinig ba kayo o hindi? Tungkol ito sa nakaambang banta ng malakas na paglindol.<Magsitahimik kayong lahat dahil may sasabihin ako.",
        "Ano ang sasabihin mo kung gusto mong ipaliwanag sa taumbayan ang masasamang epekto ng polusyon?=Karangalan ko po ang maipaliwanag sa inyo ang masasamang epekto ng polusyon.>Makinig kayo at delikado tayo sa masasamang epekto ng polusyon.+Hoy, makikinig ba kayo o hindi? Tungkol ito sa masasamang epekto ng polusyon.<Magsitahimik kayong lahat dahil may sasabihin ako.",
        "Ano ang sasabihin mo kung gusto mong magpaliwanag kung bakit hindi pa natatapos ang inyong proyekto?=Maaari ko po bang ipaliwanag kung bakit hindi pa natatapos ang aming proyektoMakinig kayo para malaman nyo kung bakit hindi pa tapos ang aming proyekto.+Hoy, makikinig ba kayo o hindi? Tungkol ito sa aming proyekto.<Magsitahimik kayong lahat dahil magpapaliwanag ako.",
        "Ano ang sasabihin mo kung gusto mong magpaliwanag kung bakit sumobra sa badyet ang inyong nagastos?=Maaari ko po bang ipaliwanag kung bakit sumobra sa badyet ang aming nagastosMakinig kayo para malaman nyo kung bakit sumobra sa badyet ang aming nagastos.+Hoy, makikinig ba kayo o hindi? Tungkol ito sa ating badyet.<Magsitahimik kayong lahat dahil magpapaliwanag ako.",
        "Ano ang sasabihin mo kung gusto mong maglahad ng isang pangyayari?=Nais ko pong ilahad sa inyo ang buong pangyayari.>Makinig kayo para malaman nyo kung ano ang nangyari.+Hoy, makikinig ba kayo o hindi sa kung ano ang tunay na nangyari?<Magsitahimik kayong lahat dahil may ilalahad ako.",
        "Ano ang sasabihin mo kung gusto mong magbigay ng iyong pananaw sa isang usapin?=Nais ko pong ibahagi sa inyo ang aking pananaw sa usaping iyan.>Makinig kayo para malaman nyo kung ano ang aking pananaw diyan.+Hoy, makikinig ba kayo o hindi sa aking pananaw tungkol diyan?<Magsitahimik kayong lahat dahil sasabihin ko ang aking pananaw sa usaping iyan.",
        "Ano ang sasabihin mo kung gusto mong magbahagi ng patotoo sa pananampalataya?=Nais ko pong ibahagi sa inyo ang aking patotoo tungkol sa ating pananampalataya.>Tumahimik kayo at makinig sa aking patotoo.+Hoy, makikinig ba kayo o hindi sa aking patotoo?<Magsitahimik kayong lahat dahil magpapatotoo ako sa ating pananampalataya.",
        "Ano ang sasabihin mo kung gusto mong maghayag ng magandang balita?=Ikinalulugod ko pong ipaalam sa inyo ang isang magandang balita.>Tumahimik kayo dahil mayroon akong magandang balita.+Hoy, makikinig ba kayo o hindi sa aking magandang balita?<Magsitahimik kayong lahat dahil mayroon akong magandang balita.",
    );
}
elseif ($grd == 4) {
    $questions = array(
        "Ano ang sasabihin mo kung hindi ka sumasang-ayon sa sinabi ni Kulas?=Hindi po ako sumasang-ayon sa sinabi ni Kulas.>Kulas, maling-mali ka riyan!+Walang kakuwenta-kuwenta ang sinabi ni Kulas.<Hindi dapat paniwalaan iyang si Kulas kailanman.",
        "Ano ang sasabihin mo kung hindi ka sumasang-ayon sa isang panukala?=Mayroon po akong di-pagsang-ayon sa panukalang iyan.>Walang utak ang nagpanukala niyan!+Walang kabuluhan ang panukalang iyan.<Malaking kamalian ang panukalang iyan.",
        "Ano ang sasabihin mo kung hindi ka sumasang-ayon sa isang mungkahi?=Iba po ang aking pananaw sa mungkahing iyan.>Hindi marunong mag-isip ang nagmungkahi niyan!+Baliw ang nagbigay ng mungkahing iyan!<Napakapangit naman ng mungkahing iyan.",
        "Ano ang sasabihin mo kung iba ang opinyon mo sa opinyon ni Mang Pedro?=Magkaiba po ang ating opinyon ukol diyan, Mang Pedro.>Mang Pedro, ano ba namang klaseng opinyon yan?+Napakababaw naman ng opinyon mo, Mang Pedro.<Walang halaga sa akin ang opinyon mo, Mang Pedro.",
        "Ano ang sasabihin mo kung hindi ka sang-ayong mag-ambag para sa isang proyekto?=Paumanhin po ngunit hindi po ako makapag-aambag sa inyong proyekto sa ngayon.>Bakit naman ako mag-aambag sa proyektong iyan?+Hoy, kailanman ay hindi ako mag-aambag sa inyo!<Ni isang kusing ay wala kayong makukuha sa akin.",
        "Ano ang sasabihin mo kung hindi ka sang-ayon sa isang gaganaping salu-salo?=Paumanhin po ngunit hindi po ako makadadalo sa inyong salu-salo.>Walang kabuluhan ang salu-salong iyan!+Hoy, kailanman ay hindi ako makikihalubilo sa inyo!<Hinding-hindi ninyo ako mapapapunta riyan!",
        "Ano ang sasabihin mo kung hindi ka sang-ayon sa pagbibigay ng isang donasyon?=Paumanhin po ngunit hindi po ako makapagbibigay ng donasyon sa ngayon.>Ayoko nga, baka may kumurakot lang niyan!+Hoy, baka sa bulsa mo lang mapunta iyan!<Ni singkong duling ay wala kayong makukuha sa akin.",
        "Ano ang sasabihin mo kung hindi ka naniniwala sa ibinigay na impormasyon ng iyong kadebate?=Iba po ang sinasabi ng aking sariling pananaliksik ukol diyan.>Napakasinungaling mong talaga!+Hoy, niloloko mo ba kami?<Saan mo naman napulot ang kasinungalingang iyan?",
        "Ano ang sasabihin mo kung hindi ka sang-ayon sa ibinigay na argumento ng iyong kadebate?=Mayroon po akong patunay na sumasalungat sa argumentong iyan.>Aba, manloloko kang talaga!+Bakit ka naman namin paniniwalaan?<Napakapangit namang talaga ng iyong argumento!",
        "Ano ang sasabihin mo kung nagiging mainit na ang ulo ng iyong kadebate?=Huminahon na po muna tayo, kung maaari.>Aba, hinahamon mo ba ako?+Kung gulo ang hanap mo, gulo ang ibibigay ko!<Hindi ako pumapatol sa isang walang alam na tulad mo!",
        "Ano ang sasabihin mo kung iba ang paniniwala mo sa paniniwala ni Jose?=Magkaiba tayo ng paniniwala ukol diyan, Jose.>Maling-mali ang iyong paniniwala, Jose!+Jose, napakapangit naman ng iyong paniniwala.<Jose, walang halaga sa akin ang iyong paniniwala.",
        "Ano ang sasabihin mo kung hindi ka sumasang-ayon sa pasya ng iyong grupo?=Hindi ako sumasang-ayon sa inyong pasya.>Maling-mali talaga ang inyong naging pasya!+Yan ang pasyang walang kakuwenta-kuwenta!<Napakapangit naman ng inyong naging pasya.",
        "Ano ang sasabihin mo kung hindi ka sumasang-ayon sa ginagawang solusyon sa isang problema?=Sa aking pananaw, hindi iyan ang lulutas sa ating problema.>Napakapalpak ng solusyong iyan para sa ating problema!+Walang kapararakan iyang naisip ninyong solusyon!<Napakapangit talaga ng inyong ginagawang solusyon.",
        "Ano ang sasabihin mo kung hindi ka naniniwala sa testimonya ng isang tao?=Pasensya na ngunit hindi ako makapaniwala sa iyong testimonya.>Napakasinungaling mong talaga!+Hindi ako bobo para maniwala sa iyo!<Isa ka palang taong manlilinlang!",
        "Ano ang sasabihin mo kung nais mong mapakinggan ang iyong sasabihin habang nakikipagdebate?=Nais ko pong ipahayag ang isang argumento para sa aking ipinaglalaban.>Hoy, makinig kayo sa aking sasabihin!+Magsialis na lang kayo kung hindi kayo makikinig!<Hoy, makikinig ba kayo sa akin o hindi?",
    );
}
elseif ($grd >= 5) {
    $questions = array(
        "Ano ang sasabihin mo kung nais mong tumahimik ang mga tao dahil magsisimula na ang programa?=Nais ko pong humiling sa inyo ng kaunting katahimikan.>Hoy, tumahimik kayo riyan!+Magsisimula na tayo kaya magsitahimik kayong lahat!<Gusto ko ng katahimikan ngayon din.",
        "Ano ang sasabihin mo kung kulang ang naisukli sa iyo?=Maaari po bang pakibilang ulit ang sukli koHoy, kulang itong sukli mo.+Kulang pa ito!<Bilangin mo ulit ang sukli mo dahil kulang.",
        "Ano ang sasabihin mo kung hindi pa isinasauli ng iyong kamag-aral ang iyong libro?=Maaari mo na bang isauli ang libro koHoy, isauli mo na ang libro ko!+Isasauli mo ba ang libro ko o hindi?<Ang tagal na ng libro ko sa iyo. Mahiya ka naman.",
        "Ano ang sasabihin mo kung nais mong ireklamo si Billy sa kanyang nanay?=Nais ko po sanang ipaalam sa inyo ang ginawa ni Billy.>Hoy, may kasalanan sa akin ang anak mo!+May reklamo ako sa anak mo kaya makinig ka.<May ginawang kabulastugan ang anak mo.",
        "Ano ang sasabihin mo kung nais mong ireklamo ang isang aso sa kanyang tagapag-alaga?=Nais ko po sanang ipaalam sa inyo ang ginawa ng inyong aso.>Hoy, may kasalanan sa akin ang aso mo!+May reklamo ako sa aso mo kaya makinig ka.<May ginawa na namang kalokohan ang aso mo.",
        "Ano ang sasabihin mo kung nais mong magreklamo tungkol sa malakas na bidyoke ng inyong kapitbahay?=Mawalang galang na po. Maaari po bang pakihinaan nang kaunti ang inyong bidyokeHoy, napakaingay ng bidyoke nyo!+Hinaan nyo naman yang bidyoke nyo!<Hoy, masakit sa tenga ang inyong pagbibidyoke!",
        "Ano ang sasabihin mo kung nais mong magreklamo tungkol sa malakas na pagpapaputok ng rebentador ng inyong kapitbahay?=Mawalang galang na po. Maaari po bang sa malayu-layo kayo magpaputok ng rebentadorHoy, napakaingay ng mga paputok nyo!+Sa malayo kayo magpaputok niyang mga rebentador!<Hoy, masakit sa tenga yang pagpapaputok nyo!",
        "Ano ang sasabihin mo kung nais mong maningil ng isang utang?=Maaari ko na po bang singilin ang perang hiniram ninyoHoy, magbayad ka na ng utang mo!+Talaga bang wala ka nang balak magbayad ng utang mo?<Hoy, ipapupulis kita kung hindi ka magbabayad!",
        "Ano ang sasabihin mo kung ayaw mong sumama sa iyong mga kamag-aral?=Pasensya na kayo. Hindi ako makakasama sa inyo.>Talagang hindi ako sasama sa inyo!+Bakit naman ako sasama sa inyo?<Ayoko ngang sumama sa inyo.",
        "Ano ang sasabihin mo kung hindi ka sumasang-ayon sa sinabi ni Kulas?=Magalang po akong hindi sumasang-ayon sa sinabi ni Kulas.>Wala namang kuwenta iyang sinabi ni Kulas.+Hinding-hindi ako sasang-ayon kay Kulas.<Hindi dapat sang-ayunan iyang si Kulas.",
        "Ano ang sasabihin mo kung gusto mong tumutol sa isang iminungkahing proyekto?=Magalang po akong tumututol sa iminumungkahing proyekto.>Hindi dapat matuloy ang proyektong iyan.+Huwag ninyong ituloy ang proyektong iyan.<Tutol ako sa pagpapatupad ng proyektong iyan.",
        "Ano ang sasabihin mo kung ayaw mong sumapi sa isang relihiyon?=Pasensya na po at hindi po ako makakasapi sa inyong relihiyon.>Ayoko ngang sumali sa relihiyon ninyo.+Bakit naman ako sasali sa relihiyon ninyo?<Hinding-hindi ako sasapi sa inyong relihiyon.",
        "Ano ang sasabihin mo kung ayaw mong sumapi sa isang samahan?=Pasensya na po at hindi po ako makakasapi sa inyong samahan.>Ayoko ngang sumapi sa inyong samahan.+Bakit naman ako sasapi sa inyong samahan?<Hinding-hindi ako sasapi sa inyong samahan.",
        "Ano ang sasabihin mo kung ayaw mong magbigay ng donasyon?=Pasensya na po at hindi po ako makapagbibigay ng donasyon sa ngayon.>Ayoko ngang magbigay ng donasyon sa inyo.+Bakit naman ako magbibigay ng donasyon sa inyo?<Hinding-hindi ako magbibigay ng donasyon sa inyo.",
        "Ano ang sasabihin mo kung ayaw mong bumili sa isang nag-aalok ng paninda?=Pasensya na po. Hindi po muna ako bibili niyan.>Ayokong bumili niyan.+Ayaw ko at hindi ko kailangan iyan.<Huwag ka ritong magtinda niyan.",
        "Ano ang sasabihin mo kung hindi mo mapapaunlakan ang paanyayang dumalo sa isang salu-salo?=Salamat po sa paanyaya. Pasensya na at hindi po ako makadadalo sa inyong salu-salo.>Ayokong dumalo sa inyong salu-salo.+Hindi ako puwedeng pumunta diyan.<Wala akong oras pumunta sa salu-salong iyan.",
        "Ano ang sasabihin mo kung gusto mong ireklamo ang isang produkto?=Nais ko po sanang ipaalam ang aking hinaing tungkol sa inyong produkto.>May reklamo ako sa inyong walang kuwentang produkto.+Gusto kong ireklamo ang inyong pangit na produkto.<Bakit nyo ako binentahan ng produktong mababa ang kalidad?",
        "Ano ang sasabihin mo kung gusto mong ireklamo ang isang serbisyo?=Nais ko po sanang ipaalam ang aking hinaing tungkol sa inyong serbisyo.>May reklamo ako sa inyong walang kuwentang serbisyo.+Gusto kong ireklamo ang inyong pangit na serbisyo.<Bakit nyo ako pinagbayad sa isang serbisyong walang pakinabang?",
    );
}

?>

</head>

</body>

</html>