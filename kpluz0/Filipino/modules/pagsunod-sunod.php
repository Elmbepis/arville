<?php
// filipino/modules/pagsunod-sunod.php
// Five original active sequencing banks; single difficulty.

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /arville/kpluz0/login.php');
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli('localhost', 'root', 'AcadeV25!', 'kpluz0');
if ($conn->connect_error) die('Connection failed: ' . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Pagsunod-sunod ng mga Pangyayari';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$lvl = 'Hard';
// Original grade groupings.
function pss_tier(string $lvl, int $grd): int { return $grd <= 1 ? 1 : ($grd <= 3 ? 2 : ($grd <= 6 ? 3 : ($grd <= 8 ? 4 : 5))); }
function pss_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    1 => [
        ['a. Nadulas si Nene sa balat ng saging.<br/><br/>b. Nagtapon si Yna ng balat ng saging sa daan.<br/><br/>c. Umiyak si Nene.', '', 'bac', 'abc', 'cba', 'bca'],
        ['a. Kumain ng almusal si Lito.<br/><br/>b. Naghugas siya ng plato matapos kumain.<br/><br/>c. Natuwa ang nanay ni Lito sa kanyang paghuhugas ng plato.', '', 'abc', 'acb', 'bca', 'bac'],
        ['a. Pinangaralan ng guro si Ana.<br/><br/>b. Napuyat si Ana dahil sa paglalaro sa kompyuter.<br/><br/>c. Kinabukasan, tinanghali siya ng gising at nahuli sa pagpasok.', '', 'bca', 'bac', 'abc', 'cba'],
        ['a. Gumising nang maaga si Jiro.<br/><br/>b. Namingwit si Jiro sa ilog kasama ang kanyang mga kaibigan.<br/><br/>c. Masaya silang umuwi pagkatapos nilang mamingwit.', '', 'abc', 'acb', 'cba', 'bac'],
        ['a. Naglalaro ang magkapatid sa loob ng bahay.<br/><br/>b. Napagalitan sila ng kanilang Ina.<br/><br/>c. Natabig nila ang plorera at nabasag ito.', '', 'acb', 'abc', 'bca', 'cba'],
        ['a. Dahil sa kanyang sipag sa pagbabasa, nanalo siya sa isang paligsahan sa pagsulat.<br/><br/>b. Bilang gantimpala, binigyan siya ng isang gintong medalya.<br/><br/>c. Laging nagbabasa si Nancy.', '', 'cab', 'cba', 'abc', 'acb'],
        ['a. Nagpunla ng buto ng kamatis si Ruben.<br/><br/>b. Tumubo ang kanyang mga halaman makalipas ang ilang araw ng pagdidilig.<br/><br/>c. Araw-araw niyang diniligan ang punla.', '', 'acb', 'abc', 'cba', 'bac'],
        ['a. Tuwang-tuwa si Mang Sendo nang siya\'y makauwi.<br/><br/>b. Napakarami niyang nahuling isda.<br/><br/>c. Maagang nangisda si Mang Sendo.', '', 'cba', 'cab', 'bca', 'acb'],
        ['a. Naligaw ang batang gansa nang habulin nito ang isang paru-paro.<br/><br/>b. Pumunta ang mag-inang gansa sa isang pook na may maraming paru-paro.<br/><br/>c. Nahanap ng inahing gansa ang naligaw na batang gansa sa tabi ng ilog.', '', 'bac', 'bca', 'cba', 'abc'],
        ['a. Kumain ng maruming \'junk food\' si Melvin.<br/><br/>b. Dinala siya sa doktor upang ipagamot.<br/><br/>c. Sumakit ang kanyang tiyan.', '', 'acb', 'abc', 'cba', 'bac'],
        ['a. Tinuka ng ibon ang hinog na bayabas.<br/><br/>b. Nahulog ang buto ng bayabas sa isang bakanteng lote.<br/><br/>c. Tumubo ang butong nahulog sa lote.', '', 'abc', 'cba', 'acb', 'cab'],
        ['a. Kinain ni Arianne ang niluto niyang tinapay.<br/><br/>b. Hinalo at minasa ni Arianne ang harina.<br/><br/>c. Inilagay niya ito sa loob ng isang pugon.', '', 'bca', 'abc', 'cba', 'bac'],
        ['a. Napuno ng tubig-ulan ang timba.<br/><br/>b. Isinahod ni Rina ang timba sa ulan.<br/><br/>c. Ginamit nila ang tubig-ulan sa pagdidilig ng halaman kinabukasan.', '', 'bac', 'bca', 'abc', 'acb'],
        ['a. Hindi nila dinilig ang mga halaman.<br/><br/>b. Namatay ang mga halaman.<br/><br/>c. Nagtanim ng mga halaman ang mga bata sa paaralan.', '', 'cab', 'cba', 'abc', 'acb'],
        ['a. May mga taong nagtapon ng maraming basura sa ilog.<br/><br/>b. Namatay ang mga isda sa ilog.<br/><br/>c. Dumumi nang labis ang tubig ng ilog.', '', 'acb', 'abc', 'cba', 'cab'],
    ],
    2 => [
        ['a. Nadulas ang isang bata sa balat ng saging.<br/><br/>b. Itinapon ni Yna ang balat ng saging sa daan.<br/><br/>c. Kumakain ng saging si Yna habang naglalakad.<br/><br/>d. Umiyak ang bata.', '', 'cbad', 'abcd', 'cbda', 'acbd'],
        ['a. Maagang nagising si Lito.<br/><br/>b. Naghugas siya ng plato matapos kumain.<br/><br/>c. Natuwa ang kanyang ina sa kanyang kasipagan.<br/><br/>d. Tumungo siya sa kusina upang kumain.', '', 'adbc', 'abcd', 'dcba', 'cabd'],
        ['a. Pinangaralan ng guro si Ana.<br/><br/>b. Si Ana ay naglaro sa kompyuter bago matulog.<br/><br/>c. Nakalimutan din niya ang kanyang takdang-aralin.<br/><br/>d. Kinabukasan, tinanghali siya ng gising at nahuli sa pagpasok.', '', 'bdca', 'dcba', 'abcd', 'acdb'],
        ['a. Gumising nang maaga si Jiro.<br/><br/>b. Sabik na lumabas sa bahay si Jiro upang magtungo sa ilog.<br/><br/>c. Naligo si Jiro sa ilog kasama ang kanyang mga kaibigan.<br/><br/>d. Masaya silang umuwi pagkatapos nilang maligo.', '', 'abcd', 'dcba', 'cbda', 'bacd'],
        ['a. Naglalaro ang magkapatid sa loob ng bahay.<br/><br/>b. Napagalitan sila ng kanilang Ina.<br/><br/>c. Nahulog at nabasag ang plorera sa sahig.<br/><br/>d. Natabig nila ang plorera sa mesa.', '', 'adcb', 'abcd', 'dcba', 'cbda'],
        ['a. Si Nancy ay isang ulirang mag-aaral.<br/><br/>b. Dahil sa kanyang sipag sa pagbabasa, nanalo siya sa isang paligsahan sa pagsulat.<br/><br/>c. Bilang gantimpala, binigyan siya ng isang gintong medalya.<br/><br/>d. Lagi siyang nagbabasa sa tahanan man o paaralan.', '', 'adbc', 'abcd', 'dcba', 'bacd'],
        ['a. Nagpunla ng buto ng kamatis si Ruben.<br/><br/>b. Araw-araw niyang dinidiligan ang punla.<br/><br/>c. Tumubo ang kanyang mga halaman makalipas ang ilang araw.<br/><br/>d. Masaya niyang ibinalita sa magulang ang pagtubo ng mga halaman.', '', 'abcd', 'dcba', 'cbda', 'acbd'],
        ['a. Tuwang-tuwa si Mang Sendo nang siya\'y makauwi.<br/><br/>b. Napakarami niyang nahuling isda.<br/><br/>c. Matiyagang nangisda si Mang Sendo.<br/><br/>d. Maaga pa\'y umalis na si Mang Sendo upang magtungo sa laot.', '', 'dcba', 'dcab', 'dbca', 'dacb'],
        ['a. Namasyal ang mag-inang gansa.<br/><br/>b. Naligaw ang batang gansa nang habulin nito ang isang paru-paro.<br/><br/>c. Nakarating sila sa isang pook na may maraming paru-paro.<br/><br/>d. Nag-alala ang inahing gansa nang nawala sa tabi niya ang batang gansa.', '', 'acbd', 'abcd', 'dcba', 'bacd'],
        ['a. Kumain ng maruming \'junk food\' si Melvin.<br/><br/>b. Dinala siya sa doktor upang ipagamot.<br/><br/>c. Sumakit ang kanyang tiyan.<br/><br/>d. Ginamot at pinangaralan ng doktor si Melvin.', '', 'acbd', 'abcd', 'dcba', 'cbad'],
        ['a. Tinuka ng ibon ang hinog na bayabas.<br/><br/>b. Nahulog ang buto ng bayabas sa isang bakanteng lote.<br/><br/>c. Tumubo ang butong nahulog sa lote.<br/><br/>d. Nagkaroon ng puno ng bayabas sa dating bakanteng lote.', '', 'abcd', 'dcba', 'acdb', 'cabd'],
        ['a. Kinain ni Arian ang niluto niyang tinapay.<br/><br/>b. Naghanda na ng mga gagamitin si Arian.<br/><br/>c. Hinalo at minasa niya ang harina.<br/><br/>d. Inilagay niya ito sa loob ng isang pugon.', '', 'bcda', 'abcd', 'dcba', 'acdb'],
        ['a. Umulan nang malakas.<br/><br/>b. Napuno ng tubig-ulan ang timba.<br/><br/>c. Isinahod ni Rina ang timba sa ulan.<br/><br/>d. Ginamit nila ang tubig-ulan sa pagdidilig ng halaman kinabukasan.', '', 'acbd', 'abcd', 'dcba', 'cabd'],
        ['a. Nalungkot ang mga bata.<br/><br/>b. Hindi nila dinilig ang mga halaman.<br/><br/>c. Namatay ang mga halaman.<br/><br/>d. Nagtanim ng mga halaman ang mga bata sa paaralan.', '', 'dbca', 'abcd', 'dcba', 'cabd'],
        ['a. May mga taong nagtapon ng maraming basura sa ilog.<br/><br/>b. Namatay ang mga isda sa ilog.<br/><br/>c. Dumumi nang labis ang tubig ng ilog.<br/><br/>d. Nagsisi ang mga tao dahil wala na silang mahuling isda.', '', 'acbd', 'abcd', 'dcba', 'acdb'],
    ],
    3 => [
        ['1. Nagsimulang magbayo ng palay si Maria. Sa bawat pagtaas nya ng kanyang halo ay bumubunggo ito sa langit, at sa bawat pagbunggo naman ay tumataas ang langit. Tuluyang tumaas ng tumaas ang langit, at tangay nito ang kanyang gintong suklay at kwintas. Hindi na nya maabot ang mga ito. 
<br/><br/>2. Kinagabihan, umupo si Maria sa may bintana at tinignan niya ang langit na mataas na mataas na. Naroroon ang kanyang gintong suklay na siyang naging buwan. Ang mga gintong butil ng kanyang kuwintas at nagkahiwa-hiwalay at siya namang naging mga bituin.
<br/><br/>3. "Lalong maganda ngayon ang aking gintong suklay," ang wika ni Maria sa kanyang sarili, "At anong kinang ng mga butil ng aking kuwintas!"
<br/><br/>4. Isang araw ay napag-atasan si Maria na magbayo ng palay. Tumindig si Maria. Inalis at isinabit ang nasabing suklay at kuwintas sa langit, na noo\'y mababa pa at abot kamay lamang.
<br/><br/>5. Si Maria ay may suklay na ginto at kuwintas na may butil-butil na ginto. Halos araw-araw ay isinusukat niya ang suklay at kuwintas at tinitingnan niya sa kanyang anino sa tubig kung siya ay maganda.', 'Pinoy Collection, https://pinoycollection.com/ bakit-mataas-ang-langit', '54123', '42315', '34512', '53214'],
        ['1. Sa madaling-araw naririnig ang ingay ng baboy, kambing, itik, manok, bibe, baka at iba pang hayop na pinapatay.
<br/><br/>2. Sa gabi, sumasama sila sa prusisyon at nanonood ng mga palabas.
<br/><br/>3. Ang pagdiriwang ng pistang bayan ay labis na nagugustuhan ng mga Pilipino. Bago pa dumating ang kapistahan ay abala na ang mga tao sa paglilinis ng kani-kanilang mga tahanan, naglalagay ng dekorasyon sa mga lansangan at naghahanda ng mga pagkain.
<br/><br/>4. Sa araw naman makikita ang mga matatanda at bata na masayang nagsisimba, nanonood ng parada at sumasakay sa iba\'t ibang uri ng sasakyang umiikot. Masaya rin silang lumilibot sa bahay ng mga kamag-anak at kaibigan upang pagsaluhan ang inihandang pagkain.
<br/><br/>5. Pagkatapos ng pista, masaya silang naglilinis ng tahanan, nagliligpit ng pinagkainan at nagkukuwenta ng pinagkagastusan subali\'t makikita mo sa kanilang mga mukha ang labis na kaligayahan.', 'Learning Resources Portal, https://lrmds.deped.gov.ph/detail/6810', '31425', '42315', '12345', '53214'],
        ['1. Ngunit, nang magsimulang dumami ang mga sasakyang nagbubuga ng mga usok, unti-unting namayat ang mga halaman ni Aling Chesa. 
<br/><br/>2. Noong araw ay napakaganda ng hardin ni Aling Chesa. Ito ang nagbibigay ng aliw sa kanya tuwing maglalakad siya dito at pagmamasdan ang ganda nito.
<br/><br/>3. Matapos ang ilang buwan, namatay ang mga bulaklak na dati\'y malago.
<br/><br/>4. Ngayon ay wala nang bulaklak ang mga halaman. Lubos na ikinalungkot ito ni Aling Chesa.
<br/><br/>5. Dito\'y makikita ang napakaraming bulaklak at halamang malalago. May gumamela, kulitis, bangka-bangkaan, at iba pa.', '', '25134', '42315', '34512', '53214'],
        ['1. Masayang natapos si Miguel sa pag-aaral para sa kanilang pagsusulit. Ito ay dahil alam nyang naging mabunga ang kanyang pagaaral, at makakasagot siya nang maayos sa pagsusulit.
<br/><br/>2. Nagsimula siyang mag-aral kasama ang kanyang nanay. Sa tuwing matatapos nilang talakayin ang isang paksa, sila ay nagpapahinga.    
<br/><br/>3. Kinabukasan, inihanda nila ang mga gagamitin sa pag-aaral: lapis, papel, kuwaderno, at libro. 
<br/><br/>4. Nang malaman ito ni Miguel, dali-dali siyang umuwi pagkatapos ng klase at sinabi ito sa kanyang nanay upang matulungan siyang mag-aral.
<br/><br/>5. Isang araw, sa klase ni Miguel, nag-anunsyo ang kanilang guro tungkol sa nalalapit nilang pagsusulit.', '', '54321', '21543', '42135', '34512'],
        ['1. Matapos nito\'y tinignan ng mga punungkahoy si Kawayan. "Kawawa naman si Kawayan," wika ni Kabalyero. "Payat na nga, wala pang bunga at bulaklak. Kaya\'t tignan nyo, wala siyang kakibo-kibo. Mukha tuloy siyang kaawa-awa." Pangungutya nito.
<br/><br/>2. Nagalit si Hangin sa narinig na usapan ng mga punungkahoy. Pinalakas niya nang pinalakas ang kanyang pagihip. Nalagas ang mga bulaklak, nahulog ang mga bunga at nangabuwal ang puno ng mayayabang na punungkahoy. Tanging ang mababang-loob na si Kawayan ang sumunud-sunod sa hilip ng malakas na hangin ang nakatayo at di nasalanta. 
<br/><br/>3. Sa isang bakuran, may ilang punungkahoy na may kanya-kanyang katangian. Ito ay sila Santol, Mangga, Kabalyero, Niyog at Kawayan. 
<br/><br/>4. Isang araw, nagpaligsahan ang mga punungkahoy. Iniyabang si Santol ang hitik nyang bungang gustong gusto ng mga bata. Iniyabang naman ni Mangga ang kanyang mayabong na mga dahon na hitik pa sa bunga. 
<br/><br/>5. Iniyabang naman ni Kabalyero ang bulaklak nitong marami at pulang-pula. Hindi naman nagpatalo si Niyog, na ipinagmalaki ang kanyang tuwid na puno, malapad na dahon, at mga bunga.', 'Pinoy Collection, https://pinoycollection.com/ ang-punong-kawayan', '34512', '12345', '53142', '34521'],
        ['1. Nainip si Noah at inutusan ang isa pang ibon na kulay puti at may magandang tinig, ang kalapati. Ibinilin niya ang naunang utos sa uwak. Ibinilin din nitong alamin kung ano ang nangyari sa uwak. 
<br/><br/>2. Tulad ng uwak, nalungkot din ito ngunit ipinagpatuloy ang pagtupad sa bilin ni Noah. Nakita niyang ligtas ng bumaba sa lupa, at nakita din nito ang uwak na patuloy pa din sa pagkagat sa patay na hayop. Matapos ay agad agad itong bumalik sa arko. Natuwa si Noah sa katapangan ng kalapati subalit nagalit siya sa inasal ng uwak.
<br/><br/>3. Dahil dito, winika ni Noah na ang kalapati ang magiging simbolo ng kalinisan, katapatan at kapayapaan, at ang uwak naman ay magiging kulay itim. Papangit ang kanyang tinig at kaiinisan ito ng mga tao at iba pang hayop. Magmula noon, naging itim ang uwak, at ang tinig nito ay naging tila paos. 	Ang tanging salitang nabibigkas nito ay "Uwak, uwak, uwak."
<br/><br/>4. Noong unang panahon, pinarusahan ng Bathala ang mundo sa pamamagitan ng napakalaking baha. Walang nalabing buhay maliban kay Noah at sa mga kasama niya sa malaking arko. Nang humupa ang baha, inutusan ni Noah ang uwak na kulay puti at may magandang tinig, na lumabas ng arko at alamin kung maaari na silang bumaba sa lupa. 
<br/><br/>5. Matapos nito ay agad na tumalima ang uwak sa utos ni Noah. Labis siyang nagimbal nagkalat na bangkay ng mga tao at hayop. Dahil marahil sa pagod ay nagutom ang uwak, at kumagat siya sa katawan ng patay na kabayo at sa iba pang patay na hayop.', 'Pinoy Collection, https://pinoycollection.com/ bakit-itim-ang-kulay-ng-uwak', '45123', '32451', '54312', '41235'],
        ['1. Bukod dito ay sumakay din sila sa tiyubibo, karusel, at iba pa. Nilibot din ni Anna at ni Tiya Inez ang mga bilihan ng pagkain. Nagustuhan nila ang mga ito, ngunit naging paborito ni Anna ang minatamis na mansanas.
<br/><br/>2. Isang araw ay dumating ang tiyahin ni Anna sa kanilang bahay mula sa probinsya. Matanda na ito, ngunit hiningi niyang samahan siya ni Anna sa karnabal na malapit sa kanilang tinitirhan.
<br/><br/>3. Agad na nagpaalam si Anna sa kanyang mga nanay, na agad naming pumayag. Inihanda nya ang kanyang pinakamagandang damit at natulog ng maaga, sabik sa lakad nila ng kanyang Tiya Inez.
<br/><br/>4. Pagkatapos ng isang masang maghapon sa karnabal, umuwing masaya ang magtiya. Nagpasalamat si Tiya Inez kay Anna sa pagsama sa kanya sa kanyang dalaw.
<br/><br/>5. Kinabukasan, nagpunta ang magtiyahin sa karnabal. Maghapon ay naglaro si Anna at ang kanyang Tiya Inez ng iba\'t ibang laro at nakakuha ng mga laruan kapalit ng kanilang pagkapanalo.', '', '23514', '31245', '45213', '52413'],
        ['1. Matapos kumain ay naghahanda siyang pumasok sa trabaho. Kasabay nito ang pagaasikaso ni Aling Martha sa mga anak na papasok din sa eskwela.
<br/><br/>2. Pagdating ng alas-sais ng umaga, handa na si Aling Martha at ang kanyang mga anak sa antayan ng traysikel.
<br/><br/>3. Matapos ay naghahanda siya ng almusal. Paborito ng kanyang mga anak ang sinangag na kanin na may kasamang longanisa, kasabay ng gatas. 
<br/><br/>4. Pagdating sa eskwela, handa na si Ginang Martha at ang kanyang mga anak sa isang mabungang araw sa eskwela.
<br/><br/>5. Si Aling Martha ay isang nanay at isang guro. Pagkagising niya sa umaga, una siyang nagdadasal.', '', '53124', '32415', '42315', '34512'],
        ['1. Umuuwi si Daniel pagkatapos ng isang mabungang ensayo sa isang masarap na hapunan na inihahanda ng kanyang nanay. 
<br/><br/>2. Pagkatapos ng lahat ng paghahanda, tumatakbo ng limang beses is Daniel ng pabalik-balik. Masaya si Daniel sa tuwing tumatakbo siya dahil nararamdaman nya ang lakas ng kanyang katawan, at naiisip nyang mayroon siyang malaking tyansa na Manalo sa mga kompetisyon.
<br/><br/>3. Sinisimulan ni Daniel ang kanyang pag-eensayo sa pamamagitan ng pag-iinat ng kanyang braso at binti, sa loob ng labinlimang minuto. Pagkatapos ng kanyang pag-iinat ay limampung beses ginagawa ni Daniel ang ehersisyong \'sit-ups\', at tatlo pang ibang ehersisyo.  Ito ay upang masigurado na handa ang katawan nyang mabatak sa pagtakbo.
<br/><br/>4. Si Daniel ay isa sa mga atleta sa kanyang eskwelahan. Siya ay sumasali sa iba\'t ibang paligsahan sa kategoryang \'Track and Field\'. Araw araw ang pageensayo ni Daniel sa kanilang paaralan upang siya ay maging laging handa.
<br/><br/>5. Matapos ang pagtakbo, nagpapahinga si Daniel nang ilang minuto. Pagkatapos nito, siya ay nag-uunat muli, at tumatakbo ng ilan pang ikot.', '', '43251', '25134', '13452', '34512'],
        ['1. Ngunit, hindi nagpapadaig ang hari. Hinamon nya si Marcela sa pangatlong pagkakataon. Ipinasabi kay Marcela na ang hari ay may sakit, at ang tanging lunas ay ang gatas ng lalaking tupa. Kung hindi ito maibibigay ni Marcela, ang kanyang ama ay tatanggalin bilang tagapagsilbi sa palasyo.
<br/><br/>2. Muling binigyan ng hari si Marcela ng isang pagsubok. Nais niyang ipagbili ni Marcela ang isa niyang tupa, ngunit dapat ay maibalik ang salaping pinagbentahan, at ang tupa mismo. Bilang tugon, inalis ni Marcela ang buhok ng tupa, ibinagbili ito, at ibinigay ang salapi kasama ang nakalbong tupa sa hari. Muling humanga ito sa angking talino ni Marcela.
<br/><br/>3. Nang marinig ni Marcela ito, ipinabatid nya sa hari na gagawin lamang nya ito kung makakagawa ang hari ng labindalawang kutsara sa pamamagitan ng isang karayom. Matapos marinig ng hari ang kanyang tugon, humanga ito kay Marcela. 
<br/><br/>4. Pagkatapos banggitin ang huling hamon, nagkatay si Marcela at ang kanyang ama ng isang baboy, at ikinalat ang dugo nito sa isang malaking kumot at mga unan. Kinabukasan, sinadyang labhan ni Marcela ang mga ito sa ilog kung saan kasalukuyang naliligo ang hari. Ikinagalit ito ng hari, ngunit nang kwestyunin si Marcela, itinugon lamang nito na nanganak ang kanyang ama.
<br/><br/>5. Nang marinig ito ng hari, pasigaw nyang itinugon na imposible ang sinasabi ni Marcela. Sumagot naman ito na katulad lamang ito ng mga hamon ng hari, mga hamon na pawing imposible. Hindi nakaimik ng ilang segundo ang hari. Matapos ay winika nito kay Marcela na siya nga ay ubod ng talino.
<br/><br/>6. Si Marcela ay anak ng isang naninilbihan sa palasyo. Siya ay maganda, matulungin at ubod ng talino. Ito ay nakarating sa hari, kung kaya\'t ipinatawag siya nito at binigyan ng pagsubok – ang pagluto ng labindalawang putahe sa pamamagitan ng isang maliit na ibon.', 'Pinoy Collection, https://pinoycollection.com/ ang-babaeng-ubod-ng-talino', '632145', '214563', '541236', '413256'],
        ['1. Mabuti na lamang at may isang matandang tagapag-alaga ng mga baka ang nakakita kay Eman. Agad siyang sinagip nito, at inuwi sa kanilang bahay. Saka lamang napagtanto ni Eman na batid ng mga magulang ang nararapat sa mga anak kaya dapat silang sundin.
<br/><br/>2. Ngunit, bigla na lamang bumilis ang agos ng tubig at siya\'y tinatangay na palayo, patungo sa malalim na parte ng ilog. Pinipilit niyang pigilan ang katawan ngunit hindi niya makaya ang malakas na agos ng tubig. Hindi rin bihasa ang kanyang mga kalaro sa paglangoy kung kaya\'t hindi siya matulungan ng mga ito.
<br/><br/>3. Si Eman ay isang batang matigas ang ulo. Sumasama ang kanyang loob sa tuwing pagbabawalan siya ng kanyang nanay, kung kaya\'t mas ginagawa nya ang mga ipinagbabawal. 
<br/><br/>4. May isang bagay na talagang lagi niyang gustong gawin kahit ipinagbabawal ng ina – ang maligo sa ilog. "Napakabilis ng agos ng tubig sa ilog. Maliit ka pa at kaya kang ianod nito," laging paalala ng ina. Ngunit naniniwala si Eman na kaya niya. "Matatakutin lang talaga si Nanay," sabi niya sa sarili. "Ang sarap siguro talagang lumangoy sa ilog. Mukhang kay lamig ng tubig."
<br/><br/>5. Kung kaya\'t isang araw ay nagpunta si Eman at ang kanyang ilang kaibigan sa ilog upang lumangoy. Masaya silang lumangoy at naglaro. Matapos ang ilang minuto, napag-isipan ni Eman lumangoy sa mas malalim na bahagi ng ilog.', 'Pinoy Collection, https://pinoycollection.com/ isang-aral-para-kay-armando', '34521', '12543', '54312', '42315'],
        ['1. Pagdating ng alas-sais ng umaga, handa na siyang bumyahe papuntang paaralan.
<br/><br/>2. Nang makita nya ito, lubos siyang nasiyahan dahil marami siyang kakilala na magiging kaklase nyang muli. Masaya rin siyang makita ang mga bagong mukha dahil magkakaroon siya ng mga bagong kaibigan.
<br/><br/>3. Ngayon ang unang araw ni Anthony bilang isang mag-aaral ng baitang lima. Gumising siya ng maaga upang makapagayos ng maigi at hindi mahuli sa klase.
<br/><br/>4. Pagbaba ng kanyang bisikleta, hinanap nya ang kanyang nararapat na hanay, bilang parte siya ng unang seksyon. 
<br/><br/>5. Masayang umakyat ang kanilang seksyon upang simulan ang unang araw ng klase.', '', '31425', '42315', '45123', '15423'],
        ['1. Agad agad siyang bumangon at tinignan ito. Ang puno pala sa likod bahay nila ay malakas ang paggalaw dahil sa malakas na hangin at ulan.
<br/><br/>2. Dahil dito, binuksan nila ang radyo at nakinig ng anunsyo ukol sa pagsususpinde ng klase. Habang nag-aantay, ipinagpatuloy ng nanay ang pagluluto ng almusal.
<br/><br/>3. Mahimbing ang tulog ni Angela nang biglang may kumalabog sa kanyang bintana.
<br/><br/>4. Pagkahain ng agahan, inanunsyo sa radyo ang PSWS 3, at dahil dito\'y suspendido ang klase nila Angela. 
<br/><br/>5. Bumaba si Angela sa kusina at ikinuwento sa kanyang nanay ang tungkol sa puno. Nabahala ang kanyang ina dahil ilang oras na lamang ang natitira bago pumasok sa paaralan si Angela.', '', '31524', '31245', '54321', '12345'],
        ['1. Pangatlo naman nyang sinalansan ang mga plato ayon sa laki.
<br/><br/>2. Huli nyang inihanay ang mga kaldero at kawali.
<br/><br/>3. Sa wakas ay inilagay nya ang mga ito sa kani-kanilang lagayan matapos sabunin, banlawan, at patuyuin. 
<br/><br/>4. Sunod nyang pinagsama-sama ang mga kutsara, tinidor at kutsarita. 
<br/><br/>5. Napagutusan si Lei ng kanyang ama na hugasan ang mga plato at lahat ng mga ginamit nito sa pagluluto. Unang sinalansan ni Lei ang mga baso at pitsel.', '', '54123', '45213', '34521', '53214'],
        ['1. Unang-una ay ang anyo nito bilang itlog. Kadalasan itong makikita sa mga dahon ng halaman.
<br/><br/>2. Sa wakas ay magiging paru-paro ang pupa. Ito ang itsura ng paru-parong pamilyar ang nakararami.
<br/><br/>3. Ang paru-paro ay isang insektong may iba\'t ibang pinagdadaanang anyo bago ito maging paru-parong may makulay at malalakas na pakpak. 
<br/><br/>4. Pangalawa ay ang anyo nito bilang higad. Sa panahong ito, kain lamang ito ng kain. Nakaiilang-palit din ito ng balat.
<br/><br/>5. Pangatlo ay ang anyo nito bilang pupa. Ito ay kadalasang makikitang nakasabit sa sanga ng mga halaman. Sa panahong ito, maraming pagbabago ang nangyayari sa loob ng pupa.', '', '31452', '42315', '34512', '53214'],
        ['1. Maaari ng kainin ang ice cream pagkatapos nito.
<br/><br/>2. Panghuli ay palamigin ang ginawang ice cream sa loob ng apat na oras.
<br/><br/>3. Pagkatapos nito ay haluin ng haluin ang gatas hanggang ito ay lumapot. Ihalo dito ang naunang inihandang kombinasyon ng cookies at matamis na gatas. 
<br/><br/>4. Simulan ang paggawa ng ice cream sa pamamagitan ng paghihiwalay ng cookies sa palaman nito. Durugin ang cookies at ihalo dito ang matamis na gatas, at isantabi. 
<br/><br/>5. Maaaring gumawa ng \'cookies and cream ice cream\' sa loob lamang ng ilang hakbang at gamit lamang ang tatlong sangkap. Upang makagawa nito, kailangang ihanda ang chocolate sandwich cookies, gatas, at matamis na gatas.', '', '54321', '12345', '42315', '34512'],
        ['1. Masayang masayang kinuha ni Rudy ang laruan. Ngunit, napansin niyang may batang marungis na nakatingin sa kanya at sa kanyang trak, tila\'y gusto nitong makipaglaro.
<br/><br/>2. Nilapitan ito ni Rudy at nalamang anak ito ng isang nangangalakal. Dahil wala itong pambili ng sariling laruan, ibinigay nya ang kanyang trak at humingi ng tulong sa kanyang mga magulang upang bigyan ng pagkain ang batang marungis.
<br/><br/>3. Mahilig si Rudy sa laruang kotse. Sa tuwing may pagkakataon ay hinihingi nya ito sa kanyang mga magulang. Ang kanyang paborito ay ang mga laruang trak.
<br/><br/>4. Isang araw ay nagpunta si Rudy at ang kanyang nanay at tatay sa isang sikat na pampublikong pasyalan. Habang iniikot nila ito ay nakakita si Rudy ng isang magandang laruang trak na ibinibenta. 
<br/><br/>5. Nang tanungin ang kanyang nanay kung maaari ba itong bilhin, ibinigay ito sa kanya sa kadahilanang maganda ang kanyang naging mga marka sa huling pagsusulit.', '', '34512', '21543', '43125', '41523'],
        ['1. Isang araw ay inutusan siyang mamalengke ng kanyang nanay. Agad siyang nagbihis at nagpunta sa palengke, bitbit ang isang bayong at ang listahan ng kanyang bibilhin.
<br/><br/>2. Sunod siyang pumunta sa bilihan ng isda. Sinuri nya ang mga panindang isda at bumili ng isang tumpok ng galunggong.
<br/><br/>3. Si Kyle ay ang panganay sa kanilang limang magkakapatid. Siya ang madalas mapag-atasan ng kanyang mga magulang na magluto, maglinis, at iba pang trabahing bahay.
<br/><br/>4. Huling binili ni Kyle ang isang dosenang itlog. Matapos nito ay umuwi siyang masaya, bitbit ang mga napamili. 
<br/><br/>5. Una siyang pumunta sa bilihan ng gulay. Bumili siya ng alugbati, luya, at ¼ kilo ng mongo.', '', '31524', '52431', '24513', '34215'],
        ['1. Upang maging handa sa pagdating ng bagyo, unang-una\'y dapat nating sundan sa radyo, telebisyon, o sa internet ang mahahalagang balita ukol sa pagsama ng panahon.
<br/><br/>2. Pang-apat ay dapat tayong manatiling mahinahon sa lahat ng sandal upang makaiwas sa dagdag na sakuna.
<br/><br/>3. Panghuli ay siguraduhing nasusundan ang mga balita patungkol sa pagbabago ng panahon at iba pang balita may kinalaman dito.
<br/><br/>4. Pangalawa, dapat tayong mag-imbak sa bahay ng pagkain na maaaring magtagal ng mahabang panahon, katulad ng mga delata.
<br/><br/>5. Pangatlo, ay ang pag-iimbak ng iba pang kailangan, katulad ng posporo, kandila, flashlight, at baterya na maaaring gamitin kung kinakailangan.', '', '14523', '31254', '43152', '52413'],
        ['1. Habang naglalakad kaming pauwi, may narinig kaming nakaaawang iyak ng pusa.
<br/><br/>2. Hinanap namin kung saan nanggagaling ang iyak na iyon, at nakita ang isang sakong gumagalaw.
<br/><br/>3. Iniuwi namin ang pusa, pinaliguan, at ngayon ay isa na siyang parte ng aming pamilya.
<br/><br/>4. Pauwi ako galing eskwelahan kasama ang aking nakababatang kapatid. 
<br/><br/>5. Pagbukas namin ng sako, isang payat na payat na itim na pusa ang nakita namin.', '', '41253', '35214', '41235', '23451'],
        ['1. Sa pangalawang pagkakataon, nagulat ang sapatero nang makakita ng dalawang yaring pares ng sapatos. Laking galak ng sapatero na tila may tumutulong sa kanya. Nagpatuloy pa ito ng ilang beses.
<br/><br/>2. Kinaumagahan, laking gulat ng sapatero na yari na ang mga sapatos at kay husay pa ng pagkakagawa! Madaling naipagbili niya ang sapatos at nakabili siya ng materyales para sa dalawang pares. Inihanda muli nya ang mga gagamitin para bukas.
<br/><br/>3. May isang sapatero na ubod ng hirap at may materyales lang para sa isang pares na sapatos. Isang gabi ay ginupit na niya at inihanda ang mga materyales para gawin sa umaga ang sapatos.
<br/><br/>4. Matapos malaman na duwende ang tumutulong sa kaniya, ipinagtahi  niya iito ng mga damit bilang pasasalamat, at iniwan ito sa tabi ng mga materyales. Nang muli siyang nagkubli sa kurtina kinagabihan, nakita nyang tuwang-tuwa nila itong isinuot ang mga damit. Hindi na sila bumalik pagkatapos ng gabing iyon, ngunit nagpatuloy ang swerte ng sapatero.
<br/><br/>5. Isang gabi ay inantay ng sapatero ang hating gabi upang makita kung sino ang tumutulong sa kanya. Nagtago siya sa likod ng kurtina, at dumating ang dalawang duwende na masayang gumawa ng mga sapatos mula sa mga nakahandang materyales sa mesa.', 'Pinoy Edition, https://www.pinoyedition.com/ maikling-kwento/ang-sapatero-at-ang-dwende', '32154', '12345', '54321', '32451'],
        ['1. Upang makabawi, nagpatulong siya sa kanyang kaibigan na si Anette na mag-aral. Araw araw, pagkatapos ng kanilang klase, ay nagtutuon sila ng oras sa silid-aklatan.
<br/><br/>2.Laking tuwa ng magkaibigang si Jaymee at Anette ng makita ang kanilang matataas na marka. Pagkatapos nito\'y hindi na masyadong gumugugol si Jaymee ng oras sa paglalaro, at nagbibigay na siya ng oras sa pag-aaral.
<br/><br/>3.Dahil dito, pinagbawalan siyang maglaro hanggang maayos ang kanyang mga marka. 
<br/><br/>4.Si Jaymee ay isang mag-aaral na mahilig maglaro sa kanyang kompyuter. Dahil sa kanyang madalas na paglalaro, napansin ng kanyang nanay na bumababa ang kanyang mga marka sa klase.
<br/><br/>5. Nahirapan si Jaymee sa pag-iiba ng kanyang nakagawian, ngunit habang mas nasasanay syang nagtutuon ng oras sa pag-aaral, ay mas napagtatanto nyang mas magandang makasanayan ito kumpara sa kanyang paggugol ng mahabang oras sa paglalaro.', '', '43152', '45132', '41532', '24531'],
        ['1. Makaraan ang ilang panahon, nagkasakit si Ben. Sa kabila ng pagsisikap ng mag-asawa na pagalingin ang anak, lumubha ito at namatay pagkatapos. Ganoon na lamang ang iyak ng mag-asawa. 
<br/><br/>2.Kinabukasan, habang nakaburol ang kanilang anak, dumating ang isang diwata. Hiningi nito ang puso ni Ben
<br/><br/>3.Inuwi niya ang pulubi sa bahay, ipinagluto at pinakain. Isang araw naman, samantalang nangangahoy, isang matandang gutom na gutom ang nasalubong niya. Pinakain din niya ito at binigyan ng damit.
<br/><br/>4.Ibinaon ng diwata ang puso sa isang bundok. Ito ay naging punongkahoy na may bungang hugis-puso. Marami ang nakikinabang ngayon sa bungang ito, ang manga.
<br/><br/>5. Kaisa-isang anak nina Aling Maria at Mang Juan si Ben. Mabait at matulungin si Ben. Nagmana siya sa kanyang mga magulang na mababait din naman. Isang araw, isang matandang pulubi ang kinaawaan ni Ben.', 'Pinoy Edition, https://www.pinoyedition.com/ maikling-kwento/pinagmulan-ng-mangga', '53124', '34512', '14352', '15243'],
        ['1. Walang kumilos sa mga batang nagmamatapang. Mabilis na lumusong si Danilo sa pampang ng ilog. Ibinaba niya ang mga aklat at naghubad na dali-dali. Lumukso at nilangoy nito ang batang naghahabol ng hininga.
<br/><br/>2.Tinutsa ng mga ito si Danilo upang ito ay lumaban. Binatuhan sya ng masasamang salita at dinuraan, ngunit ito ay kalmado lamang na nagsabing kailangan na nyang umuwi.
<br/><br/>3.Isang hapon nang papauwi si Danilo galing sa paaralan, siya\'y hinarang ng limang batang lalaki na naghahanap ng basag-ulo.
<br/><br/>4.Hirap si Danilo ngunit nagawa nyang masagip ang nalulunod na bata. Nakita ng pinakalider ng gang na ang bata palang sinagip ni Danilo ay kanyang kapatid. Siya\'y nagpasalamat kay Danilo at humingi ng tawad. "Ngayon ko nabatid na ang katapangan ay hindi nasusukat sa salita kundi sa gawa at tibay ng loob!" Wika nito.
<br/><br/>5. Nagpatuloy sa paglakad si Danilo, habang nakabuntot ang limang batang naghahamon, hanggang makarating sila sa puno ng isang tulay. Sa ilalim nito ay may narinig silang mga salitang "Sa.. gi.. pin ninyo.. ako."', 'Pinoy Collection, https://pinoycollection.com/ modelong-bata/)', '32514', '41532', '15234', '13524'],
        ['1. Mabilis na nakalayo ang baka dahil maluwag para sa kanya ang isinoot na baro. Ang kalabaw naman ay hindi nakatakbo dahil sa kasikipan ng soot. Inabutan siya ng amo at hinampas nang hinampas.
<br/><br/>2.Noong araw may isang mayamang lalaki na nag-aalaga ng isang baka at isang kalabaw. Katulong niya ang mga ito sa bukid, sa pagtatanim at mga ibang gawain.
<br/><br/>3.Mula noon, maluwag na ang damit ng baka, at mas matuling tumakbo kaysa kalabaw.
<br/><br/>4.Sa pagmamadali nilang makapagbihis, naisoot ng kalabaw ang baro ng baka, at naisoot naman ng baka ang baro ng kalabaw. Tumakbo sila para huwag maabutan ng among galit na galit.
<br/><br/>5. Isang araw, naisipan ng dalawang hayop na maligo sa ilog. Inalis nila ang kanilang mga damit at lumublob sila sa tubig. Masaya silang lumalangoy-langoy nang matanaw nilang dumarating ang mabagsik nilang amo na may dala-dalang malaking pamalo.', 'pinoyedition.com/maikling-kwento/<br/>bakit-maluwang-ang-balat-ng-baka', '25413', '31452', '53214', '42315'],
    ],
    4 => [
        ['1. Nagpapatayan ang mga mangingibig ni Kulala sa pagnanais na siya ay mapasagot. Hindi na masikmura ni Kulala ang pagdanak ng dugo.
Dahil dito, sumigaw si Kulala sa kalangitan at hiniling na kunin na siya ni Bathala.
<br/><br/>2. Nagsalubungan nang sunod-sunod ang mga matatalim na kidlat at dagundong ng kulog sa kalangitan. 
<br/><br/>3. Maganda  ang dalagang si Kulala kaya siya ay pinag-aagawan ng mga kabinataan. Makinis ang kutis at balingkinitan, mabibilog at nangungusap ang kanyang mga mata. 
Ang tinig niya ay may kakaibang lambing.
<br/><br/>4. Sa isang kisap-mata, ang hapong katawan ni Kulala ay bangkay na napalugmok sa tuktok ng bundok. 
Nang sumikat ang araw ay natagpuan siya ng mga tao na bagamat wala nang buhay ay may ngiti ang mga labi.
<br/><br/>5. Ilang sandali lamang ay dumilim ang kalangitan at bumuhos ang malakas na ulan.
<br/><br/>6. Lumipas ang mga araw nang mapansin ni Ugandang may halamang tumubo sa libingan ni Kulala. Ang mga bunga nito ay hawig sa mapuputing ngipin ni Kulala.
Mula noon ay ginamit na ito bilang rekado sa mga lutuing bahay. Nakilala ito sa tawag na \'bawang\'.', 'wikakids.com/filipino/alamat/<br/>alamat-ng-bawang/', '315246', '341256', '613245', '312546'],
        ['1. Isang araw, nagtungo sa ilog ang buwan upang maglaba ng maruruming damit. Ipinagbilin niya sa asawa na bantayan ang mga anak ngunit huwag niyang lalapitan ang mga ito. 
Binantayan nga ng araw ang mga anak. 
<br/><br/>2. Mag-asawa ang araw at ang buwan. Marami silang mga anak na bituin. Gustung-gusto ng araw na makipaglaro sa kanyang mga anak at ibig na ibig niyang yakapin 
ang mga ito ngunit pinagbawalan siya ng buwan sapagkat matutunaw ang mga bituin sa labis na init ng araw. Kinagagalitan ng araw ang mga anak kapag lumalapit sa kanya.
<br/><br/>3. Naisipan niyang bilangin ang mga anak ngunit hindi nya nakita ang maliliit kaya\'t hinanap niya ang mga ito kung saan-saan. 
Hindi niya matagpuan ang mga anak. Sa gayo\'y sinumabatan niya ang asawa. "Niyakap mo ba sila? Huwag kang magsisinungaling!"
<br/><br/>4. Hindi naman nagtagal at umuwi na ang buwan. Nagtaka siya sapagkat malungkot ang asawa. 
<br/><br/>5. Buong kasiyahan niyang pinanood ang mga ito habang naghahabulan. Nakadama siya ng pananabik at hindi siya nakatiis na hindi yakapin ang mga anak. 
Bigla niyang niyakap ang lipon ng maliliit na bituin na nang madikit sa kanya ay biglang natunaw.
<br/><br/>6. Hindi na naghintay ng sagot ang buwan. Mabilis niyang binunot ang isang punong saging at tinangkang ipukol sa asawa na nakalimutan na ang kanyang kasalanan. 
Ang tanging nasa isip niya ay kung paano niya maipagtatanggol ang sarili sa asawang galit na galit.
<br/><br/>7. Dumampot siya ng isang dakot na buhangin at inihagis sa mukha ng buwan. Dahil dito, nagkaroon ng batik ang mukha ng buwan. 
Hinabol ng buwan ang araw upang makaganti at hanggang ngayon ay hinahabol pa rin ng buwan ang araw.', 'panitikangpnoy.blogspot.com/p/<br/>mga-kwentong-bayan-folktales.html/<br/>Ang Batik ng Buwan', '2154367', '2317456', '1756423', '2153467'],
        ['1. Sagana sa maraming isda ang karagatan. Alam ng mga taganayon na isang diwata ang nagbabantay at nag-aalaga sa mga isda.
<br/><br/>2. Mula nang sila\'y humingi ng tawad sa diwata ay bumalik na ang ganda ng karagatan at muling dumami ang mga isda. Nanaganang muli ang kabuhayan ng mga tao.
<br/><br/>3. Ngunit may mga taong sakim. Ibig nilang makahuli ng maraming isda upang magkamal ng maraming salapi. 
Gumamit sila ng dinamita kaya\'t labis na napinsala ang mga bahura na tirahan ng mga isda. Pati ang mga maliliit na isda ay namatay.
<br/><br/>4. Nagpulong ang mga taganayon at napagpasyahan nilang humingi ng tawad sa diwatang nangangalaga sa karagatan. 
Nakiusap din silang ibalik na ang dating ganda ng karagatan at gayundin ang mga isda. Nangako silang hindi na gagamit ng anumang makasisira sa kalikasan.
<br/><br/>5. Nagalit ang diwata sa kasakiman ng mga tao kaya\'t mula noon ay wala nang mahuling isda ang mga tao. 
Naghirap at nagutom ang mga tao at naging pangit na rin ang karagatan na dati\'y sakdal ganda. 
<br/><br/>6. Sa isang nayon, ang mga tao ay masaya at masaganang namumuhay. Mapagpala ang kalikasan sa kanila. Ang pangunahing hanapbuhay nila ay ang pangingisda.', 'panitikangpnoy.blogspot.com/p/<br/>mga-kwentong-bayan-folktales.html/<br/>Ang Diwata ng Karagatan', '613542', '235146', '165342', '613452'],
        ['1. Tinutulan ni Bulan ang mungkahi ni Adlaw at ito ang naging dahilan ng mainit nilang pagkakagalit. Wala nang katahimikan sa kanilang bahay 
sapagkat halos araw-araw ay nag-aaway sila. Hindi na nakatiis si Bulan at nagpasyang makipaghiwalay na lang sa asawa na lalo namang ikinagalit ni Adlaw.
<br/><br/>2. Kaya mula noon, makikitang nag-iisang sumisikat si Adlaw (Araw) sa araw at sa gabi naman ay lumilitaw si Bulan (Buwan) kasama ang mga anak na bituin.
<br/><br/>3. Noong unang panahon ay may mag-asawang may mabuting pagpapasunuran at pagmamahalan. Sila\'y sina Adlaw at Bulan. Nagkaanak sila ng maraming bituin.
<br/><br/>4. Hindi nagtagal ay pumayag na rin si Adlaw na makipaghiwalay sa kasunduang isasamang lahat ni Bulan ang mga anak na bituin at hindi na pakikita sa kanya ang mag-iina.
<br/><br/>5. Napansin ni Adlaw na lubhang masikip sa kanilang bahay sapagkat patuloy na nag-aanak si Bulan. 
Kinausap ni Adlaw si Bulan at sinabi sa asawa na ipaampon nila ang iba nilang mga anak upang lumuwag ang kanilang tirahan.
<br/><br/>6. Kapag ang dating mag-asawa\'y nagkakatagpo ay lalong tumitindi ang poot ni Adlaw kay Bulan kaya hinahabol niya ito na nagiging sanhi ng \'eclipse\'.', 'panitikangpnoy.blogspot.com/p/<br/>mga-kwentong-bayan-folktales.html/<br/>Sina Adlaw at Bulan', '351426', '312654', '321465', '354126'],
        ['1. Noong unang panahon, ang punong si Kawayan ay hindi yumuyuko. Mayabang ito at laging taas-noo. Ipinagmamalaki nito ang makinis na katawan.
<br/><br/>2. Mainggitin si Kawayan. Laging naiinis siya kung hindi pinahahalagahan. Kapag nalalaluan siya ng ibang puno at halaman ay nagtatanim siya ng galit. 
Masama siyang mapahiya sapagkat tumatawag siya ng kaibigang handang maghiganti upang maiangat lang ang narumihan niyang pangalan. 
Isang araw, naparaan ang ilang kabataan sa kagubatan. Nang makitang wala man lang bunga ang kawayan, nilayuan nila ito.
<br/><br/>3. Nilapitan nila ang mga punong sina Bayabas at Santol. Tuwang-tuwa sila sa pamimitas ng mga bunga. 
Tuwang-tuwa ang mga kabataan nang pagsaluhan ang mga prutas. Inggit na inggit naman si Kawayan. 
<br/><br/>4. Sa galit ni Kawayan ay tinawag niya ang kaibigang si Hangin. Pinakamalakas na ihip ang higanti ni Hangin. 
Nagbagsakan ang lahat ng mga bunga nina Bayabas at Santol.
Tuwang-tuwa si Kawayan. 
<br/><br/>5. Isang tanghaling tapat ay may dalawang matandang nahapo sa paglalakad. Upang makapagpahinga, naghanap sila ng punong may malalabay na sanga. 
Hindi man lang nila pinansin ang mga sanga ng Kawayan. Natuwa sila nang matanawan ang punong si Banaba. 
Talagang malalapad ang mga dahon nito na masisilungan kung ikaw ay maiinitan ng sikat ng araw. 
Napansin ito ng nakasimangot na Kawayan. Nang makaalis na ang matatanda ay tinawag ni Kawayan ang kanyang pangatlong kaibigan, si Tagak. 
Pinagpipigtal ni Tagak ang lahat ng dahon ni Banaba. 
Nakalbo ang kaawa-awang puno na lubhang ikinagalak ni Kawayan.
<br/><br/>6. Minsan naman ay may nagawing magkasintahan sa kagubatan. Nang makitang walang bulaklak ay nilayuan nila si Kawayan. 
Natuwa sila nang malingunan ang mga halamang sina Rosal at Sampaguita. Dali-daling namupol ng mababangong bulaklak ang binata upang ihandog sa dalaga.
Sa pagkapahiya sa sarili, tinawag naman ni Kawayan ang pangalawa niyang kaibigan, si Ulan. Pinalakas ng Ulan ang kanyang mga patak. 
Nasira sa mga tangkay ang magagandang bulaklak nina Rosal at Sampaguita. Palihim na napangiti si Kawayan.
<br/><br/>7. Lingid sa kaalaman ni Kawayan, nakarating kay Bathala ang pagiging mainggitin at mapagmataas nito. 
Mula noon at bilang parusa, ang laging nakatingalang si Kawayan ay pinayuyuko ni Bathala kapag hinihipan ng malakas na hangin. 
Ang pagyuko ni Kawayan ay paalala ni Bathala na ang inggit ay di dapat mamugad sa puso ninuman.', 'wikakids.com/filipino/alamat/ Alamat ng Kawayan', '1234657', '2316547', '3614527', '1234567'],
        ['1. Sa isang bayan sa Mindanao ay may isang matandang nagngangalang During.
Kilala si Tandang During bilang isang matandang sobrang sungit.
Karaniwan niyang panakot sa mga bata ang kanyang reputasyong may lahing mangkukulam.
<br/><br/>2. Maraming taon ang dumaan ngunit si Tandang During ay nanatiling masungit at mag-isa.
Isang gabi, isang masamang amoy ang tila itinaboy ng hangin sa komunidad.
Hindi ito nawala hanggang sa nagkaisa na ang mga taong hanapin ang pinanggagalingan nito.
<br/><br/>3. Si Tandang During ay nasanay nang mamuhay mag-isa mula nang mamatay ang kanyang asawa at anak.
Noong namatay ang mga ito, nag-alok ng tulong ang mga taong nasa paligid niya ngunit tumanggi ito.
Buhat noon ay inasikaso na lamang ni Tandang During ang kanyang mga tanim na halaman.
<br/><br/>4. Isang lalaki ang sumubok na tikman ito. Nagtakip ang lahat ng ilong nang buksan nila ang prutas pero ang lahat ay nasarapan sa misteryosong bunga.
Nagsipitas silang lahat at nag-uwi sa kani-kanilang bahay.
Nang may makasalubong silang matanda, tinanong kung ano ang dala nilang prutas.
<br/><br/>5. "Bunga ng tanim ni Tandang During yan", sabi ng isa.
\'During yan\' ang pagkakaintindi ng matanda. Kalauna\'y tinawag na itong \'Durian\'.
<br/><br/>6. Tiyak nilang kay Tandang During galing ang amoy na iyon.
Hinanap nila ang matanda ngunit di nila ito nakita. Sa halip ay napansin nila ang isang punong may mga bungang matinik ang balat.
Dahil sa sobrang kahinugan ay bumuka na ang balak nito.', 'marvicrm.com/2017/08/alamat-ng-durian-buod/<br/>Alamat ng Durian', '132645', '542136', '315246', '136245'],
        ['1. Nakita niya sa harap ng salamin ang anak na nagsusuklay ng buhok.
"Pedrito, magsaing ka na nga at magluto ng ulam.  Gutom na gutom na ako, anak", wika ni Iskong Salamangkero.
Padabog na hinarap ni Pedrito ang ama at kanyang sinagot ito.
"Kung kayo ay nagugutom, kayo na lamang ang magluto.  Ako ay hindi pa nagugutom."  At nagpatuloy ng pagsusuklay si Pedrito ng kanyang buhok.
<br/><br/>2. Kung anong buti ng ama ay siya namang sama ng anak nitong si Pedrito.  Siya ay tamad at palabihis.  Ibig ni Pedrito na matawag ang pansin ng mga dalagita. 
Lagi na lamang siyang nasa harap ng salamin at nag-aayos ng katawan.  Ang paglilinis ng bahay at pagluluto ng pagkain na siya lamang takdang gawain ni Pedrito ay hindi 
niya nagagampanan.  Kapag siya ay pinagsasabihan at pinangangaralan ng ama ay nagagalit siya at sumasagot pa.
<br/><br/>3. Nagsiklab ang galit ni Iskong Salamangkero sa anak.  Sinugod niya si Pedrito at kinuha ang pulang suklay.  Inihampas niya ito sa ulo ng anak at malakas niyang sinabi: 
"Mabuti pang wala na akong anak kung tulad mong tamad at lapastangan.  Sapagkat lagi ka na rin lamang nagsusuklay, ang pulang suklay na ito ay mananatili sa tuktok ng iyong ulo habambuhay!"  
At idiniin ni Isakong Salamangkero ang pulang suklay sa ulo ni Pedrito.
<br/><br/>4. May mag-ama raw na napadpad ng bagyo sa isang baryo sa pulo ng Masbate.  Ang ama ay nakilala ng mga tao sa nayon dahil sa kawili-wiling mga palabas nito na 
mga salamangka o mahika.  Tinawag nilang Iskong Salamangkero ang kanilang bagong kanayon. 
Bukod sa pagiging magalang, masipag, mapagkumbaba ay mabuting makisama sa mga taga-nayon si Iskong Salamangkero. 
Madali siyang nakapaghanap ng masasakang lupa na siyang pinagmulan ng kanilang ikinabubuhay na mag-ama.
<br/><br/>5. Dahil sa kapangyarihang taglay ni Isko bilang magaling na salamangkero, biglang naging tandang ang anak na tamad at lapastangan. 
Ang suklay sa ulo ni Pedrito ay naging pulang palong.  Hanggang sa ngayon ay makikita pa rin natin ang mapupulang palong sa ulo ng mga tandang.
<br/><br/>6. Isang tanghali, dumating sa bahay si Iskong Salamangkero mula sa sinasakang bukid na pagod na pagod at gutom na gutom.  Dinatnan niya na wala pang sinaing at 
lutong ulam si Pedrito. 
Tinawag niya ang anak ngunit walang sumasagot kaya pinuntahan niya ito sa silid.', 'kapitbisig.com/philippines/tagalog-version-of-folktales-mga-kuwentong-bayan-bakit-may-pulang-palong-ang-mga-tandang-kuwentong-bayan-folktale_593.html/
<br/>Bakit may pulang palong ang mga tandang', '426135', '432516', '413625', '421635'],
        ['1. Dahil nagpatuloy ang panunukso ng mga kaklase, napuno ang batang babae at bigla na lamang niyang naibulalas na mayroon siyang sandaang damit sa bahay.
<br/><br/>2. Matapos sabihin ng bata na mayroon siyang sandaang damit, hindi na ito muling pumasok sa paaralan.
<br/><br/>3. Kapansin-pansin ang kakulangan ng batang babae sa damit. Kupas na ang kulay at puno ng tahi ang kanyang mga isinusuot.
Dahil sa panunukso sa kanyang kasuotan ay umuwi siyang umiiyak isang araw. Nagsumbong siya sa ina ngunit wala namang magawa ang pobreng ina.
<br/><br/>4. Laking gulat at lungkot nila nang malamang mayroong palang malubhang karamdaman ang bata. Noon din nila nakita ang sinasabi niyang sandaang damit. 
Hindi mga totoong damit ang mga ito, bagkus mga damit na iginuhit lamang niya sa papel.
<br/><br/>5. Dahil sa labis na pag-aalala, minarapat ng guro at mga kaklase ng bata na puntahan siya sa kanilang bahay.
<br/><br/>6. Umiikot ang ating kuwento sa isang batang babaeng lumaki sa kahirapan. Dahil salat sa maraming bagay, madalas siyang makaranas ng diskriminisayon mula sa kanyang mga kalaro. 
May mga panahong tinutukso siya ng kanyang mga kaklaseng maykaya.', 'goodreads.com<br/>binuod mula sa akda ni: Fanny A. Garcia', '631254', '651324', '613542', '632154'],
        ['1. Mayroong kagandahang taglay si Mathilde na hinahangaan ng marami. Gayunpaman, ang magandang dalaga ay mahirap lamang.
Maliit lamang din ang kita ng kanyang napang-asawang manunulat na nagngangalang Loisel.
<br/><br/>2. Sa kasamaang palad, naiwala pala ni Mathilde ang kuwintas na hiniram. Upang hindi masira ang relasyon sa kaibigan ay naghanap sila ng kamukhang kuwintas na maaaring pampalit.
Napakamahal ng halaga ng nahanap nilang pampalit ngunit binili pa rin nila ito.
<br/><br/>3. Isang araw, pag-uwi ng asawa ni Mathilde ay sinabi nitong inanyayahan sila sa isang piging ng kanyang amo. Dahil wala naman siyang magarang dami para rito, 
binigyan si Mathilde ng asawa niya ng pambili ng damit.
<br/><br/>4. Ngunit nais din niyang magkaroon ng maayos na alahas. Dahil walang pambili ay nanghiram na lamang ito ng kuwintas sa isang kaibigan.
Namukod-tangi ang ganda ni Mathilde sa piging. Marami ang humanga sa kanyang ganda. Pag-uwi nila, masaya ang mag-asawa dahil sa atensiyong nakuha ni Mathilde.
<br/><br/>5. Ikinuwento ni Mathilde sa kaibigan na naging napakahirap ng buhay nila dahil lamang sa kagustuhang mapalitan ang naiwala niyang kuwintas. 
Nagimbal siya sa sagot ng kaibigan.
Sinabi nitong hindi naman daw tunay ang ipinahiram na kuwintas kaya mumurahin lamang ito.
<br/><br/>6. Dahil sa pagbili ng kuwintas na mataas ang halaga, nabaon sa utang ang mag-asawa. Naging napakahirap ng kanilang buhay at inabot sila ng sampung taon 
sa pagbabayad ng utang. Malaki ang itinanda ni Mathilde sa itsura kaya hindi na siya nakilala ng kaibigang hiniraman ng kuwintas nang muli silang magkita pagkatapos ng sampung taon.', 'filipino10niwarville.blogspot.com/<br/>2015/05/ang-kuwintas.html', '134265', '612354', '265143', '132465'],
        ['1. Isang araw, ipinagtapat ng engkanto sa dalaga ang tunay niyang katauhan. Ito na rin daw ang huli nilang pagkikita dahil tatapusin na niya ang kanilang relasyon. 
Hindi makapaniwala ang dalaga sa nalaman.
<br/><br/>2. Ibinaon ng babae ang naiwang kamay ng engkantong minamahal. Matapos ang ilang araw ay binalikan ng dalaga ang ibinaong kamay. 
Mayroong siyang napansing kakaiba sa lupang pinagbaunan.
<br/><br/>3. Kahit papaalis na ang lalaki ay ayaw pa rin siyang bitawan ng babae. Dahil sa mahigpit na pagkakahawak ng babae sa kanyang kamay ay naiwan ito nang siya ay naglaho.
<br/><br/>4. Ang di alam ng babae ay hindi pala isang ordinaryong nilalang ang lalaki. Isa siyang prinsipe ng mga engkanto kaya simula\'t sapul pa lamang ay batid na
ng lalaking hindi sila para sa isa\'t isa ng dalagang mortal.
<br/><br/>5. May isang dalagang mula sa malayong lugar ang napaibig sa isang lalaki. Dahil sa taglay na kisig at matamis na pananalita ng binata, 
nahumaling dito ang dalaga. Araw-araw silang nagkikita noon at talaga namang aliw na aliw sila habang kapiling ang isa\'t isa.
<br/><br/>6. May tumubong halaman doon na may mga dahon ngunit walang sanga, di tulad ng mga ibang puno. 
May bunga rin itong tila hugis-kamay. Kalaunan ay nakilala ang prutas na ito sa tawag na \'saging\'.', 'panitikan.com.ph/alamat-ng-saging-buod/Alamat ng Saging', '541326', '512346', '526314', '543126'],
        ['1. Nalaman ni Rosa na mayroong malubhang sakit si Mario ilang araw bago sila ikasal. Gaano man kalubha ang kalagayan nito ay hindi naman napigil ang kanilang pag-iisang 
dibdib at natuloy ang kanilang kasal.
<br/><br/>2. Lumipas ang mga panahon at si Rosa naman ang binawian ng buhay dahil sa hindi malamang dahilan. 
Gayunpaman, nagbilin na si Rosa sa kanyang mga kakilala na ilibing siya sa tabi ng puntod ni Mario.
<br/><br/>3. Noon sa isang bayan ay mayroong magsing-irog na nagngangalang Rosa at Mario. Malalim ang pag-iibigan nilang dalawa.
Lalong napatunayan ang pag-ibig nila sa isa\'t isa nang subukin ng isang karamdaman ang kanilang pagsasama.
<br/><br/>4. Isang araw ay binawian na rin ng buhay si Mario ngunit nakangiti itong pumanaw. Lahat ng nakakita sa bangkay ni Mario ay nagsabing nasaan man ito 
ay maligaya ito. Naging huwaran para sa marami sa kanilang bayan ang kanilang pag-iibigan.
<br/><br/>5. Ilang araw pa lamang ang nakalilipas nang may tumubong halamang may mga bulaklak at tinik sa puntod nina Rosa at Mario. 
Mapula at mabango ang mga bulaklak nito. Tinawag na \'rosas\' ang halamang ito bilang pag-alala kay Rosa.
<br/><br/>6. Nagsama sila kahit hindi na nakakikilos nang maayos si Mario at nakahiga na lamang madalas. Hindi naman naaalis sa tabi ni Mario si Rosa. 
Palaging nasisilayan ni Mario ang mukha ng kanyang pinakamamahal kaya naman lagi itong masaya.', 'https://www.panitikan.com.ph/alamat-ng-rosas-buod/Alamat ng Rosas', '316425', '324165', '316245', '314625'],
    ],
    5 => [
        ['1. Matiyagang pinakinggan ni Socrates ang lalaki at sinabihan niyang makipagkita ito sa kanya kinabukasan malapit sa ilog upang masagot nito ang kanyang katanungan.
<br/><br/>2. Minsan ay tinanong ng isang binata ang pantas na si Socrates kung ano ang sikreto sa tagumpay.
<br/><br/>3. Ginawa ng binata ang lahat upang makaahon sa tubig ngunit higit na malakas si Socrates. Nanatili siyang nakalubog sa tubig hanggang ang mukha niya ay magsimulang maging kulay asul.
<br/><br/>4. Kinaumagahan, hiniling ni Socrates na maglakad silang dalawa ng binata patungo sa ilog. Habang papalapit sila sa ilog, tumaas ang tubig ng abot hanggang sa kanilang leeg.
<br/><br/>5. Nabigla ang binata nang hilahin siya sa ilog ni Socrates. Ang kanyang buong katawan ay nalubog sa tubig.
<br/><br/>6. Tinanong ni Socrates, "Ano ang ninanais ng iyong puso habang nakalubog sa tubig?" Tumugon ang binata, "Makahinga muli ng hangin."
<br/><br/>7. Sinabi ni Socrates, "Iyon ang sikreto sa tagumpay. Kung ang pagnanais mo sa tagumpay ay tulad ng pagnanais mo sa hangin habang ikaw ay nakalubog sa tubig, makukuha mo ito. Wala nang ibang lihim."
<br/><br/>8. Nang makita ito ni Socrates, hinila nito ang ulo ng binata mula sa tubig at agad itong huminga nang malalim.', '', '21453867', '24156387', '21583647', '21548367'],
        ['1. Dahil dito ay napilitan silang mamili: tiisin ang sugat na makukuha mula sa \'quills\' ng kanilang katabi, o mamatay nang dahil sa ginaw.
<br/><br/>2. Nagpulong sila at maingat na nagpasya tungkol dito.
<br/><br/>3. Sa huli ay napagdesisyunan nilang tiisin ang mga sugat na dulot ng kanilang paglalapit upang mapanatili ang init ng kanilang katawan.
<br/><br/>4. Sa ganitong paraan sila nanatiling buhay sa buong panahon ng taglamig.
<br/><br/>5. Habang taglamig, maraming hayop ang namamatay dahil sa ginaw.
<br/><br/>6. Sa bigat ng kanilang sitwasyon, napagpasya ang isang grupo ng mga porcupine na magtumpok-tumpok sa isang lugar.
<br/><br/>7. Ito ay isang mahusay na paraan upang maprotektahan ang kanilang sarili mula sa lamig at panatilihin ang init ng bawat isa. 
Ngunit, ang kanilang mga \'quills\' – o ang mga tinik sa kanilang balat – ay nagdudulot ng pagkasugat nila.
<br/><br/>8. Upang makaiwas sa pagkasugat, naisip nilang lumayo muna sa isa\'t isa. Di nagtagal ay nagsimula silang magsimatayan nang dahil sa ginaw.', '', '56781234', '51723864', '57612384', '57182634'],
        ['1. Tulad ng aso, maraming tao ang walang saysay ang mga layunin sa buhay. Hindi ito dapat pag-aksayahan ng oras. Marapat lamang na mas bigyan ng oras ang makabuluhang mga layunin. 
<br/><br/>2. Sumagot ang magsasaka, "Hindi iyon ang nakakabagabag sa akin. Ang nakakapagpabagabag sa akin ay ang kanyang gagawin kung makasabay siya sa isa."
<br/><br/>3. Tinanong nito ang magsasaka, "Sa palagay mo ba, isang araw ay maabutan ng iyong aso ang mga sasakyan na iyon?"
<br/><br/>4. Isang araw ay napansin ng isang kapitbahay ang ganitong gawain ng aso. Lubos itong naguluhan sa pakay ng asong makipagsabayan sa mga sasakyan.
<br/><br/>5. Sa tuwing may dadaan na sasakyan, tumatakbo ang asong ito sa kalsada upang tumahol at sinusubukang sabayan ang takbo ng sasakyan.
<br/><br/>6. May isang asong laging naghihintay sa tabi ng kalsada sa mga sasakyan na darating. Ito ay alaga ng isang magsasaka.', '', '654321', '546231', '653421', '564312'],
        ['1. Iniinda niya ang sakit na ito nang mga panahong iyon, at kinakailangan siyang masalinan ng dugo mula sa kanyang limang-taong gulang na kapatid na milagrong 
nakaligtas sa parehong sakit. Ang bata ay nakabuo ng mga \'antibodies\' na kinakailangan upang labanan ang sakit. Siya ang tanging pag-asa ng kanyang kapatid na babae.
<br/><br/>2. Habang isinasalin ang kanyang dugo, siya ay ngumiti sa kanyang kapatid, habang kanyang nakikita ang pagbabalik ng kulay sa mga pisngi nito.
<br/><br/>3. Narinig ng doktor ang tanong at ngumiti ito sa bata. Sabi niya, "Hindi ka mamamatay." 
Ang akala pala ng bata ay magiging kapalit ng pagpapatuloy ng buhay ng kanyang kapatid ang kanyang sariling buhay.
<br/><br/>4. Pagkatapos ng pagsasalin, namutla ang mukha ng lalaki at ang kanyang ngiti ay kumupas.
<br/><br/>5. Tumingala siya sa nars sa kanyang tabi at nagtanong nang may nginig sa tinig, "Kailan ako magsisimulang mamamatay?"
<br/><br/>6. Maraming taon na ang nakalilipas nang ako ay magsilbi bilang isang boluntaryo sa isang ospital, ngunit nakaukit pa rin sa aking puso ang kuwento 
ng magkapatid na may magkaparehong sakit. Ang isa sa kanila ay isang maliit na batang babae na tatlong taong gulang.
<br/><br/>7. Nakita ko ang takot at pag-aalinlangan sa mga mata ng bata, ngunit ilang segundo lamang ang lumipas ay huminga siya ng malalim at sinabing "Opo, gagawin ko ito kung ito ang makaliligtas sa buhay ng aking kapatid."
<br/><br/>8. Ipinaliwanag ng doktor ang sitwasyon sa magkapatid at tinanong kung ang batang lalaki ay handang ibigay ang kanyang dugo para sa kanyang kapatid.', '', '61872453', '62587143', '67128543', '86127345'],
        ['1. Muling nagsalita nang malakas ang binata. "Ama, tingnan mo ang mga ulap! Lahat sila ay tumatakbo kasabay natin!"
<br/><br/>2. Hindi na mapigilan ng mag-asawa na kausapin ang matanda, "Bakit hindi mo dalhin ang iyong anak sa isang mabuting doktor?" 
Para nga naman sa isang binata na tila edad bente hanggang trenta, ay kakaiba ang winiwika nito.
<br/><br/>3. Nagpatuloy ang matanda sa pagpapaliwanag. "Ang aking anak na lalaki ay bulag mula pa sa kanyang kapanganakan at ngayon lamang siya nakakita."
<br/><br/>4. Ngumiti ang matanda at sinabi, "Ginawa na namin iyan. Sa katunayang nga, galing kami sa ospital."
<br/><br/>5. Nadinig ng isang mag-asawang nakaupo malapit ang kanilang pag-usap. Naawa ang batang mag-asawa sa mag-ama.
<br/><br/>6. Ngumiti lamang ang ama sa kanyang anak na binata.
<br/><br/>7. Lubos na nahiya ang mag-asawa. Ang bawat tao sa mundo ay may kwento. Huwag tayong manghusga ng tao bago natin sila lubos na makilala. 
<br/><br/>8. Isang makisig na binata ang nakamasid sa bintana ng tren. Malakas siyang nagwikang "Ama, tingnan mo ang mga puno! Naglalakad sila palayo sa atin!"', '', '86512437', '85624317', '58263147', '86352417'],
        ['1. Ibinigay ng batang lalaki ang lahat ng kanyang holen sa batang babae, ngunit lihim nitong itinago ang pinakamalaki at pinakamagandang holen para sa kanyang sarili.
<br/><br/>2. Pumayag ang batang babae na makipagpalitan sa kanyang kalaro.
<br/><br/>3. Inialok ng batang lalaki sa batang babae ang lahat ng kanyang mga holen kapalit ng lahat ng kendi nito.
<br/><br/>4. Isang araw ay masayang naglalaro ang dalawang bata. Ang batang lalaki ay may koleksyon ng magagandang holen habang ang batang babae naman ay maraming baong kendi.
<br/><br/>5. Ito ay katulad din ng ating pakikipagkapwa-tao. Kung hindi mo ibibigay ang iyong daang porsyento sa isang relasyon, 
lagi kang mag-aalinlangan kung ang iyong karelasyon ay ibinibigay din ang kanilang daang porsyento.
<br/><br/>6. Paulit-ulit nitong iniisip kung ang batang babae ay nagtago ng ilang mas masarap na kendi katulad ng pagtago niya ng kanyang pinakamagandang holen.
<br/><br/>7. Nang gabing iyon, mahimbing na natulog ang batang babae ngunit ang batang lalaki ay hindi makatulog.
<br/><br/>8. Matapos nito ay ibinigay sa kanya ng batang babae ang lahat ng kanyang mga kendi tulad ng napagkasunduan.', '', '43218765', '47658321', '12348765', '43127865'],
        ['1. Pagkatapos nito ay maghihintay ang agila sa pagdating ng hangin.
<br/><br/>2. Kapag tumama na ang bagyo, ipinupusisyon nito ang kanyang mga pakpak upang maiangat ito ng hangin at maiangat sa itaas ng bagyo.
<br/><br/>3. Ang tunay na buhay ay tulad din ng bagyo. Kapag ang iba\'t ibang hamon ay tumama sa atin, maaari nating piliing itaas ang ating sarili 
gaya ng agila na sumasakay sa mga bagyo.
<br/><br/>4. Huwag tayong matakot sa mga bagyo o mga hamon sa ating buhay. Gamitin natin ito upang maitaas ang ating mga sarili.
<br/><br/>5. Samakatuwid, ang agila ay hindi tumatakas o nagtatago sa bagyo. Sa halip ay ginagamit nito ang bagyo upang maiangat ang sarili. 
Tumataas ito sa bagyo, di katulad ng iba na kinakatakutan ito.
<br/><br/>6. Habang ang bagyo ay nagagalit sa ibaba, ang agila ay lumalakas sa itaas nito.
<br/><br/>7. Sa tuwing papalapit ang isang bagyo, sa halip na magtago ay lumilipad ito sa isang mataas na lugar.
<br/><br/>8. Alam mo bang alam ng isang agila kung may papalapit na bagyo?', '', '87126534', '78213645', '87341265', '34217856'],
        ['1. Dahil walang epekto ang kanyang mga kahol, sinubukan nitong atakihin ang grupo ng mga aso. Ngunit, nagmukhang inaatake ito ng kanyang mga repleksyon. Lubos na natakot ang aso, 
at nagpatuloy ito buong gabi. 
<br/><br/>2. Nang makita ng aso ang kanyang repleksyon sa salamin, napatigil ito sa takot. Sa kanyang pananaw, nakakakita siya ng isang grupo ng mga aso na nakapaligid sa kanya 
sa lahat ng panig, mula sa itaas hanggang sa ibaba.
<br/><br/>3. Mapagtatanto natin sa kuwentong ito na ang mundo ay hindi mabuti o masama. Ang lahat ng nangyayari sa paligid natin ay repleksyon lamang ng ating sariling mga saloobin, 
damdamin, kagustuhan, at kilos. Ang mundo ay isang malaking salamin, kung kaya\'t maganda ang ating ibigay at ipakita. 
<br/><br/>4. Mas natakot ang aso, kung kaya\'t mas nilakasan at mas binilisan pa nito ang pagkahol, ngunit mas lumakas at mas bumilis lamang ang naging balik nito sa aso.
<br/><br/>5. Inilabas ng aso ang kanyang mga ngipin upang sindakin ang mga repleksyong nakikita. Kinahulan din nya ang mga ito, na sya namang tumugon sa parehong paraan.
<br/><br/>6. Kinabukasan, natagpuan ng mga gwardya ng museo ang walang buhay na aso na napapalibutan ng libu-libong piraso ng salamin. 
Namatay ang aso habang nakikipaglaban sa kanyang sariling imahe.
<br/><br/>7. Isang araw, may isang asong napunta sa isang museong puno ng mga salamin. Ang museo ay natatangi sapagkat ang mga dingding, kisame, 
pintuan at maging ang sahig nito ay gawa sa mga salamin.', '', '7254163', '7235416', '7564213', '7514263'],
        ['1. Nag-aral si Harry sa Hogwarts School of Witchcraft and Wizardry at doon ay natutunan niya ang mundo ng mahika.  
Naging matalik niyang kaibigan ang mga kaklaseng sina Ron Weasley at Hermione Granger, habang naging mahigpit naman niyang kaaway si Draco Malfoy.
<br/><br/>2. Lumaki sa piling ng mga Dursley ang ulilang si Harry Potter.  Sa kanyang ikalabing-isang kaarawan, binisita siya ng isang higante na nagngangalang Hagrid at 
ipinaalam sa kanya na isa siyang wizard. 
<br/><br/>3. Napag-alaman din ni Harry na hinahanap ni Voldemort, ang dark wizard na pumaslang sa kanyang mga magulang, ang "philosopher\'s stone".  
Napagdesisyunan niya at ng kanyang mga kaibigan na unahan ito sa paghahanap ng bato upang pigilan ang kanyang masamang balak.
<br/><br/>4. Isang araw, aksidenteng nasabi ni Hagrid na ang kanyang alagang aso na may tatlong ulo ay may binabantayang mahalagang bagay para kay Nicolas Flamel.  
Sa pag-iimbestiga ni Harry at ng kanyang mga kaibigan, nalaman nila na si Flamel ay ang imbentor ng "philosopher\'s stone", isang bato na ginagamit na sangkap upang 
gumawa ng inuming nagbibigay ng imortalidad.
<br/><br/>5. Isang maliit na boses ang nagsabi na nagsisinungaling si Harry at hiniling kay Quirell na kausapin siya nito.  
Hinubad ng guro ang balabal na nakabalot sa kaniyang ulo, laking gulat ni Harry nang makita si Voldemort-ang pumaslang sa kanyang mga magulang-sa likod ng ulo nito.
<br/><br/>6. Matapos malagpasan ang iba\'t ibang pagsubok, naabutan ni Harry si Quirrell - ang kanyang matatakuting guro - na nakaharap sa isang malaking salamin.  
Hinila ni Quirrell si Harry sa harap ng salamin upang alamin kung ano ang kanyang nakikita.  Nakita niya ang kanyang repleksyon na hawak-hawak ang bato at inilagay ito sa kanyang bulsa.
<br/><br/>7. Nagising si Harry sa clinic at nakita si Dumbledore, ang punongguro ng Hogwarts. Ipinaliwanag ni Dumbledore na namatay si Quirrell at 
napagdesisyunan nila ng kaibigan niyang si Flamel na sirain na lang ang bato.  Humabol si Harry sa piging kung saan natanghal ang kanyang grupo - Gryffindor - 
bilang kampeon sa taong iyon.
<br/><br/>8. Nakatira pala si Voldermort sa katawan ni Quirrell.  Pinilit nitong agawin ang bato kay Harry ngunit hindi niya ito magawa dahil nasasaktan ito tuwing hahawakan siya.  
Nakipagbunuan si Harry hanggang sa siya ay mahimatay.', '', '21436587', '25863417', '43567821', '21364758'],
        ['1. Nakunsensya ang negosyante. Dali-dali niyang inangat ang kapatid ng bata mula sa kanyang pinaghulugan at ibinalik ito sa \'wheelchair\'. 
Tinulungan din niyang ayusin ang pasa at maliit na sugat nito.
<br/><br/>2. Pag-uwi at paglabas ng negosyante sa kanyang sasakyan, pinagmasdan niya ang pinsalang nagawa sa pinto ng kanyang kotse. Ito ay bahagyang malaki, 
ngunit hindi siya nag-abala pang ipaayos ito. Ito ay upang lagi nyang maalala ang mensaheng huwag maging masyadong abala sa buhay na kailangang may pumukol pa sa iyo ng 
bato para lamang makuha ang atensyon mo.  
<br/><br/>3. Nang masigurado ng negosyanteng maayos na ang kalagayan ng magkapatid ay bumalik na ito sa kanyang kotse. "Salamat po, at pagpalain ka ng Diyos," 
wika ng nagpapasalamat na bata. Masyadong mabigat ang damdamin ng negosyante, kung kaya\'t hindi na ito nakapagsalita pa. Pinanood na lamang nito ang batang lalaking 
tulak-tulak ang \'wheelchair\' sa bangketa. 
<br/><br/>4. Upang makaiwas sa aksidente, binagalan nya ang kanyang pagpapatakbo. Ngunit sa kanyang pag-abante ay may biglang kumalabog sa pintuan ng kanyang kotse. 
May naghagis ng malaking bato rito, at ang bahaging tinamaan ay lumubog nang bahagya. 
<br/><br/>5. May isang mayaman at matagumpay na batang negosyante ang nagmamaneho ng kanyang bagong kotseng mamahalin ang tatak sa isang kalsadang residensyal. 
Habang ito ay nagmamaneho, napansin niya ang isang batang lumalabas-pasok mula sa pagitan ng mga sasakyan.
<br/><br/>6. Agad niyang inapakan ang preno at bumalik sa lugar kung saan nabato ang kanyang kotse. Ang galit na lalaki ay lumabas mula sa kanyang sasakyan at 
sinigawan ang batang kanyang naabutan. "Anong ginawa mo sa kotse ko? Bakit mo binato?" 
<br/><br/>7. Mahahalata ang takot sa batang lalaki, ngunit magalang pa rin itong humihingi ng tawad. "Pasensya na ho. Hindi ko na alam kung ano pa ang aking gagawin,
" pakiusap niya. "Kinailangan kong ihagis ang bato dahil walang humihinto upang tulungan ako, at ang kapatid ko." 
<br/><br/>8. Napaluha ang batang lalaki, sabay turo sa likod ng isang sasakyan. "Ito ho ang kapatid ko, nahulog at bumagsak siya sa kanyang \'wheelchair\' 
at siya ay lubhang nasaktan. Hindi ko siya maiangat kung kaya\'t nanghihingi ako ng saklolo. Maaari mo ba akong tulungan siyang ibalik sa kanyang \'wheelchair\'? 
Masyadong siyang mabigat para sa akin."', '', '54678132', '51328467', '57813642', '54187632'],
        ['1. Tulad ng inaasahan, kinain ng pating ang lahat ng maliliit na isda.
<br/><br/>2. Mabilis na inatake ng pating ang mga isda, ngunit naharangan ito ng salamin sa gitna. 
Patuloy at paulit-ulit itong sinubukan ng pating ngunit sa bawat pagkakataon ay hinaharangan sya ng salamin. 
<br/><br/>3. Ang eksperimentong ito ay naulit nang ilang dosenang beses sa loob ng ilang linggo. Habang patagal nang patagal, unti-unting nabawasan ang pagiging 
agresibo ng pating. Sa kalaunan, napagod ang pating at tumigil na sa pag-atake sa maliliit na isda.
<br/><br/>4. Katulad din sa totoong buhay, marami sa atin, matapos makaranas ng mga pagkalugi at pagkabigo, ang sumusuko. 
Bumubuo tayo ng hadlang sa ating isip, kahit wala namang \'tunay\' na hadlang sa pagitan ng kung nasaan tayo at kung saan natin nais na pumunta. 
Huwag tayong susuko. Patuloy lamang na lumaban sapagkat ang tagumpay ay maaaring abot-kamay mo na.
<br/><br/>5. Pagkatapos nito ay tinanggal ng siyentipiko ang malinaw na salamin. Gayunpaman, hindi na inatake ng pating ang mga isda. 
Ito ay dahil sinanay ang pating na maniwalang may hadlang sa pagitan nito at ng mga isda.
<br/><br/>6. Pagkalipas ng halos isang oras, huminto ang pating.
<br/><br/>7. Pagkatapos ay naglagay ito ng isang malinaw na salamin upang mahati ang tangke sa dalawa. Inilagay niya ang pating sa isang panig at ang mga maliliit na isda sa kabila.
<br/><br/>8. May isang siyentipikong nagsagawa ng isang eksperimento sa isang pating. Naglagay siya ng isang pating at mga maliliit na isda sa isang tangke.', '', '81726354', '87216435', '54632718', '83127654'],
        ['1. Kung ating iisipin, tulad ng karpintero, may ugali tayong tumutugon lamang sa halip na talagang kumilos nang naaayon. Kung minsa\'y nais nating hindi masyadong mahirapan, 
kung kaya\'t hindi natin ibinibigay ang ating pinakamahusay sa ating ginagawa. Lagi nating tandaan na ang ating mga desisyon ngayon ang huhubog ng buhay natin bukas.
<br/><br/>2. Kahit na ito ay dapat na maging isang magandang sorpresa, hindi naging maganda ang kanyang pakiramdam dahil nakaramdam siya ng matinding kahihiyan. 
Kung alam lamang niyang itinatayo niya ang kanyang sariling bahay, inayos sana niya ang pagtatayo nito. 
<br/><br/>3. Nang makumpleto ng karpintero ang bahay, dumating ang kanyang amo upang siyasatin ang bahay. Tumingin-tingin ito sa paligid ng bahay.
<br/><br/>4. Nakaramdam ng pagkalungkot ang kanyang amo dahil ang kanyang mabuti at bihasang karpintero ay aalis na sa kanyang negosyo. 
Pumayag siya, ngunit hiniling niya ritong magtayo ng isa pang bahay bago ito magretiro.
<br/><br/>5. May isang karpinterong bihasa sa kanyang larangan. Pagkatapos ng mahabang paglilingkod nito bilang karpintero, handa na syang magretiro. 
Ipinagbigay-alam nito sa kanyang amo ang kanyang planong umalis sa negosyo nitong pagtatayo ng bahay, upang makapagpahinga at makasama na lamang ang kanyang asawa at pamilya. 
<br/><br/>6. Pumayag ang karpintero sa hiling ng kanyang amo ngunit ang kanyang puso ay wala sa kanyang ginagawa, di katulad ng dati. Bara bara ang ganyang paggawa 
at mas mababang mga materyales lamang ang kanyang ginamit upang mapabilis ang pagtatayo ng huling bahay na ito. 
<br/><br/>7. Matapos nitong ikutin ang bagong-tayong bahay ay ibinigay niya ang susi ng bahay sa karpintero. "Ito ang iyong bahay," aniya, "ang aking regalo sa iyo." 
Nagulat ang karpintero. 
<br/><br/>8. Ngayon, kailangan niyang manirahan sa bahay na hindi itinayo nang maayos.', '', '54637281', '52846371', '56437821', '54826371'],
        ['1. Nang sabihin ng pantas ang parehong biro sa pangatlong beses ay wala nang tumawa o ngumiti man lamang.
<br/><br/>2. Makalipas ang ilang minuto ay sinabi niya sa kanilang muli ang birong ito, ngunit ngumiti na lamang ang ilan sa kanila.
<br/><br/>3. Maraming tao ang nagtipon upang pakinggan ang kanyang mga salita. 
<br/><br/>4. Sinimulan niya ang seminar sa pamamagitan ng isang nakakatawang biro. Humagalpak sa tawa ang mga taong nakikinig.
<br/><br/>5. Minsan, isang matalinong lalaki ang nagsagawa ng isang seminar upang turuan ang mga tao kung paano alisin ang kalungkutan sa kanilang mga buhay. 
<br/><br/>6. Natahimik ang mga tagapakinig. Kanilang napagtanto kung saan sila nagkulang sa pagresolba ng kanilang mga problema. Tunay ngang matalino ang pantas.
<br/><br/>7. Ang matalinong lalaki ay ngumiti at sinabi, "Hindi ninyo kayang matawa sa isang biro nang paulit-ulit. 
Ngunit, bakit kaya ninyong paulit-ulit na umiyak nang dahil sa isang problema?"', '', '5342176', '5123746', '5432617', '5742316'],
        ['1. May isang pangkat ng mga propesyonal ang nagtipon upang bisitahin ang kanilang dating propesor sa unibersidad. 
Ang pag-uusap nila ay agad napunta sa kanilang mga reklamo tungkol sa kani-kanilang trabaho at buhay. 
<br/><br/>2. Nang marinig ito ng propesor, nagpunta ito sa kanyang kusina at bumalik na may dalang isang malaking palayok ng kape at iba\'t ibang mga tasa - 
porselana, plastik, baso, kristal, ilang payak, ilang mahal, at ilang katangi-tangi. Sinabi sa kanila ng propesor na maaari silang kumuha ng kape.
<br/><br/>3. Matapos makakuha ang lahat ng kanya-kanyang tasang may kape, nagsalita ang kanilang propesor. "Napansin ninyo bang lahat na ang mga magagandang tasa 
ay agad nakuha ngunit ang mga payak at mura lamang na mga tasa ay naiwan?"
<br/><br/>4. Nanahimik ang mga propesyonal. Sa pagiging abala nila sa kani-kanilang hinaing at problema, ay nakalimot na sila sa kung ano ang tunay na mahalaga. 
Minsan ay nabibigo tayong tamasahin ang kape dahil ang ating atensyon ay nasa tasa lamang na mayroon tayo. 
<br/><br/>5. Nagtinginan ang mga propesyonal sa kani-kanilang tasa, at sa mga tasang naiwan. Nagpatuloy ang propesor. "Habang normal lamang para sa lahat 
na piliin ang pinakamaganda, ito ay nagbibigay ng iba\'t ibang problema sa inyong buhay. Ang tasa ay hindi nagdaragdag ng kalidad sa kape."
<br/><br/>6. Kung ating pagninilayan, ang pagiging masaya ay hindi nangangahulugang perpekto ang lahat sa paligid mo, kundi ay bunga ito ng ating pagdedesisyong 
hindi magpokus sa mga pagsubok, kundi sa paghahanap ng kapayapaan. At ating tandaan na ang kapayapaan ay mahahanap natin sa ating sarili, hindi sa ating trabaho, 
katayuang panlipunan, o sa uri ng bahay na mayroon tayo.
<br/><br/>7. Patuloy pa itong nagpaliwanag. "Ang talagang nais ninyo ay ang kape, hindi ang tasa. Isipin natin na ang buhay ay ang kape at ang mga trabaho, bahay, kotse, bagay, 
pera, at posisyon ay ang mga tasa. Ang uri ng tasa na mayroon tayo, ay hindi tumutukoy o nagbabago ng kalidad ng ating buhay."', '', '1235746', '1675243', '1247536', '5342176'],
    ],
];
$tier = pss_tier($lvl, $grd);
function pss_question(array $raw, int $tier, string $lvl, int $grd): array {
    [$word, $source, $correct, $a, $b, $c] = $raw;
    $wrong = [$a, $b, $c];
    shuffle($wrong);
    $choices = array_merge([$correct], $wrong);
    shuffle($choices);
    return ['word'=>$word, 'source'=>$source, 'correct'=>$correct, 'choices'=>$choices, 'tier'=>$tier, 'grade'=>$grd, 'lvl'=>$lvl, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['tier'] ?? null) === $tier
    && ($_SESSION[$sessionKey]['current']['grade'] ?? null) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || ($_SESSION[$sessionKey]['current']['grade'] ?? null) !== $grd || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($banks[$tier]), $used));
    if (!$available) { $used = []; $available = array_keys($banks[$tier]); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pss_question($banks[$tier][$i], $tier, $lvl, $grd);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <span style="color:#800080;font-weight:normal;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</span>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <div style="text-align:center;margin:20px auto;">
        <span style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:500;color:#800080;line-height:1.3;text-wrap:wrap;overflow-wrap:anywhere;text-align:left;">
            <?php echo str_replace('&lt;br/&gt;', '<br/>', pss_h($cur['word'])); ?><?php if ($cur['source'] !== ''): ?><span style="display:block;margin-top:16px;font-size:11pt;font-weight:normal;color:#666;">Pinagkunan:<br/><?php echo str_replace('&lt;br/&gt;', '<br/>', pss_h($cur['source'])); ?></span><?php endif; ?><br/><span style="display:inline-block;margin-top:12px;font-weight:normal;">Sagot:</span> <strong style="color:#CC0066;"><?php echo pss_h($cur['correct']); ?></strong>
        </span>
    </div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;">
    <span style="display:inline-block !important;width:480px !important;min-width:0 !important;max-width:min(480px,100%);padding:30px 40px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:16pt;font-weight:500;color:#800080;line-height:1.3;text-wrap:wrap;overflow-wrap:anywhere;text-align:left;">
        <?php echo str_replace('&lt;br/&gt;', '<br/>', pss_h($cur['word'])); ?><?php if ($cur['source'] !== ''): ?><span style="display:block;margin-top:16px;font-size:11pt;font-weight:normal;color:#666;">Pinagkunan:<br/><?php echo str_replace('&lt;br/&gt;', '<br/>', pss_h($cur['source'])); ?></span><?php endif; ?>
    </span>
</div>
    <p style="max-width:450px;margin:20px auto 28px;font-size:16pt;color:#444;">Piliin sa ibaba ang wastong pagkakasunod-sunod ng mga pangyayari sa itaas.</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:min(480px,100%);margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>

</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
