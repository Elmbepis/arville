<?php
// english/modules/sound-devices.php
// STATIC question bank + choice. Bypass QEngine per §D.
// Shows a sentence; student identifies which sound device it demonstrates.
//
// Levels (§E — 2-level scheme, Medium+Hard merged): Easy / Hard
//   Legacy had 3 levels with distinct content tiers (arrnum 1-4). Modern:
//     Easy &#8594; legacy Easy config
//     Hard &#8594; 50/50 pick between legacy Medium config and legacy Hard config
//   Preserves every legacy tier's content pool exactly.
//
// Grade-keyed config (§10) — two bands × three internal configs:
//   grd 0-6, grd 7-10. Each (band, internal) resolves to arrnum 1-4.
//
// Sound devices: onomatopoeia, alliteration, assonance, consonance, rhyme.
//
// Bank format: "<sentence>+<answer>?<d1>=<d2>=<d3>"
// The bracketed [word] markers highlight the key evidence in feedback;
// stripped for question display.
//
// Data fix: legacy tier-4 assonance entry 1 had "=assonance=onomatopoeia=..."
// (missing ? after answer) — corrected to "?assonance?onomatopoeia=...".
//
// $grd defensive default (§11): $_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5.
//
// Theme: ex-28-* (75/655/70) &#8594; fits §8 fit test, use module's own.
// Score box: score-*-1 (matches legacy).
// DB row required: modules.url = 'sound-devices.php'

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

$moduleTitle = 'Identifying Sound Devices';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

$grd = min(10, max(0, (int)($_SESSION['grade'] ?? $_SESSION['user_grade'] ?? 5)));

// ============================================================
// Resolve (level, grade) &#8594; arrnum (1-4)
// ============================================================
if ($lvl === 'Easy') {
    $internal = 'easy';
} else {
    $internal = (rand(1, 2) === 1) ? 'medium' : 'hard';
}

if ($grd <= 6) {
    if ($internal === 'easy')       $arrnum = 1;
    elseif ($internal === 'medium') $arrnum = 2;
    else                            $arrnum = 3;
} else {
    if ($internal === 'easy')       $arrnum = 2;
    elseif ($internal === 'medium') $arrnum = 3;
    else                            $arrnum = 4;
}

// ============================================================
// Bank — 4 tiers (arrnum 1-4)
// ============================================================
$bankByTier = [];

$bankByTier[1] = [
    // onomatopoeia (9)
    "The lions [roared] fiercely that stormy day.+onomatopoeia?alliteration=consonance=assonance",
    "The rain [splashed] onto the puddle.+onomatopoeia?alliteration=consonance=assonance",
    "The flood water [gushed] through the city.+onomatopoeia?alliteration=rhyme=assonance",
    "The snow owls [hooted] in the tree.+onomatopoeia?alliteration=consonance=assonance",
    "The strong wind was [howling] in the darkness.+onomatopoeia?alliteration=consonance=assonance",
    "The car horn [beeped] at the children.+onomatopoeia?alliteration=consonance=assonance",
    "My brother heard a loud [crack] outside.+onomatopoeia?alliteration=consonance=assonance",
    "Nina tried everything to stop her [hiccups].+onomatopoeia?alliteration=consonance=assonance",
    "The tokens were [clinking] together in his pocket.+onomatopoeia?alliteration=consonance=assonance",
    // alliteration (9)
    "The [s]nake [s]lithered across the [s]andy [s]easide.+alliteration?onomatopoeia=rhyme=assonance",
    "[B]arry rode a [b]lue [b]icycle by the [b]ay.+alliteration?onomatopoeia=rhyme=assonance",
    "The [r]ed [r]oses were [wr]apped in [r]ibbons.+alliteration?onomatopoeia=rhyme=assonance",
    "The [sh]y [sh]eriff wore [sh]iny [sh]oes.+alliteration?onomatopoeia=rhyme=assonance",
    "[F]erdie's [f]riends [f]ound a [f]lying [f]ish.+alliteration?onomatopoeia=rhyme=assonance",
    "The [p]astor is [p]leased with [P]aul's [p]oliteness.+alliteration?onomatopoeia=rhyme=assonance",
    "[D]ebbie [d]ipped the [d]oughnut in her [d]rink.+alliteration?onomatopoeia=rhyme=assonance",
    "[W]illie [w]orks as a [w]aiter on [w]eekends.+alliteration?onomatopoeia=rhyme=assonance",
    "[N]onoy's [n]ephew [n]eeds [n]ew [n]otebooks.+alliteration?onomatopoeia=rhyme=assonance",
    // assonance (9)
    "Aunt M[ay]'s p[a]tience alw[ay]s p[ay]s.+assonance?onomatopoeia=consonance=alliteration",
    "P[y]ke m[igh]t l[i]ke a n[i]ce r[i]de in the park.+assonance?onomatopoeia=alliteration=consonance",
    "J[a]mie b[a]ked a c[a]ke for D[a]ne.+assonance?onomatopoeia=consonance=alliteration",
    "The l[igh]t of the f[i]re was qu[i]te a s[igh]t.+assonance?onomatopoeia=consonance=alliteration",
    "V[i]lma h[i]d the th[i]n st[i]ck.+assonance?onomatopoeia=consonance=alliteration",
    "R[i]ck [i]s s[i]tt[i]ng there w[i]th J[i]m.+assonance?onomatopoeia=consonance=alliteration",
    "The g[oo]se with a s[oo]ty f[oo]t l[oo]ked at Dr[ew].+assonance?onomatopoeia=consonance=alliteration",
    "The c[u]te m[u]le kn[ew] how to am[u]se H[u]gh.+assonance?onomatopoeia=consonance=alliteration",
    "B[u]cky m[u]st pl[u]g that g[u]sh before d[u]sk.+assonance?rhyme=consonance=alliteration",
    // consonance (7)
    "The bo[ss] to[ss]ed hi[s] gla[ss] a[s]ide.+consonance?onomatopoeia=alliteration=assonance",
    "Mi[ck] is ba[ck] on the wre[ck]ed [dock].+consonance?onomatopoeia=alliteration=assonance",
    "Ne[ll]y wi[ll] make the ba[ll] ro[ll].+consonance?onomatopoeia=alliteration=assonance",
    "The i[mp] ju[mp]ed up the e[mp]ty ra[mp].+consonance?onomatopoeia=alliteration=assonance",
    "I[nd]eed, Li[nd]a's mi[nd] te[nd]s to wa[nd]er.+consonance?onomatopoeia=alliteration=assonance",
    "The hu[nt]er poi[nt]ed at the ge[nt]le rode[nt].+consonance?onomatopoeia=alliteration=assonance",
    "Du[st]in [st]ole A[st]er's ta[st]y pa[st]a.+consonance?onomatopoeia=alliteration=assonance",
    // rhyme (5)
    "My nose is cold, my toes are [numb]; I have a sliver in my [thumb].+rhyme?onomatopoeia=assonance=alliteration",
    "Mr. [Brown], the circus [clown], puts his clothes on upside [down].+rhyme?onomatopoeia=assonance=alliteration",
    "John is moving off at last; James is going pretty fast.+rhyme?onomatopoeia=assonance=alliteration",
    "They all made a [note], of the state of his [throat].+rhyme?onomatopoeia=assonance=alliteration",
    "I have to go to bed and [see], the birds still hopping on the [tree].+rhyme?onomatopoeia=assonance=alliteration",
];

$bankByTier[2] = [
    // onomatopoeia (9)
    "I heard the [ding-dong] so I knew someone was at the door.+onomatopoeia?alliteration=consonance=assonance",
    "The insects [buzzed] as they flew from one flower to the next.+onomatopoeia?alliteration=consonance=assonance",
    "The rattlesnake [hissed] when it encountered its prey.+onomatopoeia?alliteration=consonance=assonance",
    "The [pop] of the rubber balloon echoed through the room.+onomatopoeia?alliteration=consonance=assonance",
    "The music sheets [rustled] as they fell to the floor.+onomatopoeia?alliteration=consonance=assonance",
    "The beef cubes [sizzled] loudly in the greasy pan.+onomatopoeia?alliteration=rhyme=assonance",
    "The patient was told to [gargle] a cup of warm saltwater.+onomatopoeia?alliteration=consonance=assonance",
    "The poor electrician was [zapped] when he touched the wire.+onomatopoeia?alliteration=consonance=assonance",
    "Roy dropped the tablet into the glass, making the water [fizz].+onomatopoeia?alliteration=consonance=assonance",
    // alliteration (7)
    "[C]arl [k]eeps the restless [c]at from [c]lawing the [c]ouch.+alliteration?onomatopoeia=rhyme=assonance",
    "[P]eter's [p]layful [p]iglet [p]ranced at the [p]arty.+alliteration?onomatopoeia=rhyme=assonance",
    "[J]erry's [j]ackrabbits [j]umped and [j]iggled [j]auntily.+alliteration?onomatopoeia=rhyme=assonance",
    "[V]ivien is a [v]ivacious [v]eterinarian from [V]enice.+alliteration?onomatopoeia=rhyme=assonance",
    "The [h]ummingbirds [h]overed in [h]eavenly [h]armony.+alliteration?onomatopoeia=rhyme=assonance",
    "My [br]other [br]ought [Br]enda some [br]ead and [br]oth.+alliteration?onomatopoeia=rhyme=assonance",
    "The [g]houls and [g]hosts [g]reeted the [g]angly [g]oblins.+alliteration?onomatopoeia=rhyme=assonance",
    // assonance (6)
    "Those squ[ea]king wh[ee]ls n[ee]d to b[e] gr[ea]sed.+assonance?rhyme=consonance=alliteration",
    "The c[y]clist is exc[i]ted to r[i]de his new motorb[i]ke.+assonance?onomatopoeia=consonance=alliteration",
    "J[ea]n sp[ea]ks Gr[ee]k [ea]ch time D[ea]n comes n[ea]r.+assonance?onomatopoeia=consonance=alliteration",
    "The l[ou]d plane flew ar[ou]nd the cl[ou]dy t[ow]n.+assonance?onomatopoeia=consonance=alliteration",
    "The gr[oo]m l[oo]ked at the [booth] f[u]ll of sp[oo]ns.+assonance?onomatopoeia=consonance=alliteration",
    "Our c[oa]ch l[oa]thes players who b[oa]st and gl[oa]t.+assonance?onomatopoeia=consonance=alliteration",
    // consonance (5)
    "The ta[n] law[n] turned gree[n] whe[n] it bega[n] to rai[n].+consonance?alliteration=onomatopoeia=assonance",
    "Ji[mm]y ca[m]e ho[m]e with li[m]es and [m]elons fro[m] Sa[m]ar.+consonance?alliteration=onomatopoeia=assonance",
    "Their e[ld]est chi[ld] bo[ld]ly he[ld] the ba[ld] eagle.+consonance?onomatopoeia=alliteration=assonance",
    "O[ct]avio pra[ct]iced a[ct]ing like a respe[ct]able do[ct]or.+consonance?onomatopoeia=alliteration=assonance",
    "The pha[nt]om hau[nt]ed the tale[nt]ed i[nt]ern last mo[nt]h.+consonance?onomatopoeia=alliteration=assonance",
    // rhyme (5)
    "Presently my soul grew [stronger], hesitating then no [longer]...+rhyme?consonance=assonance=alliteration",
    "While all that noise up there you [make]; you're simply keeping them [awake].+rhyme?alliteration=assonance=consonance",
    "Never want for food or [fire]; always get their heart's [desire].+rhyme?onomatopoeia=assonance=consonance",
    "Now another day is [breaking]; sleep was sweet and so is [waking].+rhyme?onomatopoeia=assonance=consonance",
    "And ever again, in the wink of an [eye], painted stations whistle [by].+rhyme?alliteration=assonance=consonance",
];

$bankByTier[3] = [
    // onomatopoeia (7)
    "The [swish] of the basketball through the hoop amazed the noisy crowd.+onomatopoeia?alliteration=consonance=assonance",
    "My teeth were [chattering] as we waited in the freezing cold for the bus to arrive.+onomatopoeia?alliteration=consonance=assonance",
    "The couple said we'll hear the [pitter-patter] of tiny feet this year.+onomatopoeia?alliteration=consonance=assonance",
    "Dennis released a loud and mighty [belch] from the pit of his stomach.+onomatopoeia?alliteration=consonance=assonance",
    "The excited player [gobbled] down his food then ran to the basketball court.+onomatopoeia?alliteration=consonance=assonance",
    "The hikers were frightened when an owl [screeched] at them with no warning.+onomatopoeia?alliteration=consonance=assonance",
    "Mandy's friends could hear the swimming pool's water [lapping] quietly.+onomatopoeia?alliteration=rhyme=assonance",
    // alliteration (7)
    "The [st]udents threw [st]ones and [st]icks through the [st]ained glass [st]eeple.+alliteration?onomatopoeia=rhyme=assonance",
    "The [str]awberry farmer [str]uck a [str]eak of [str]ange luck.+alliteration?onomatopoeia=rhyme=assonance",
    "[B]ea's [b]eagle [b]arked and [b]ayed, [b]ecoming [b]othersome for [B]ernie.+alliteration?onomatopoeia=rhyme=assonance",
    "[M]ary's [m]other [m]akes the [m]ost [m]outhwatering [m]incemeat pie.+alliteration?onomatopoeia=rhyme=assonance",
    "The [v]erbose [v]entriloquist [v]aried his [v]oice [v]ivaciously.+alliteration?onomatopoeia=rhyme=assonance",
    "[R]udolph the [r]ed-nosed [r]eindeer [r]ose up in the [r]arefied air.+alliteration?onomatopoeia=rhyme=assonance",
    "[H]ibbert [h]eard what [H]arriet did to [h]eal [h]er [h]edge[h]ogs.+alliteration?onomatopoeia=rhyme=assonance",
    // assonance (4)
    "D[ai]sy and th[ei]r m[ai]ds s[ai]led to Sp[ai]n last Tuesd[ay].+assonance?onomatopoeia=consonance=alliteration",
    "The l[a]dy sc[a]red the j[ay]s aw[ay], but th[ey] c[a]me back to st[ay].+assonance?onomatopoeia=consonance=alliteration",
    "The tr[oo]pers were sp[oo]ked by the g[oo]ns sh[oo]ting at them.+assonance?onomatopoeia=consonance=alliteration",
    "The del[igh]ted p[i]lot was inv[i]ted to his w[i]fe's v[i]olin rec[i]tal.+assonance?onomatopoeia=consonance=alliteration",
    // consonance (6)
    "The mu[tt]on inside the li[tt]le co[tt]age tas[t]ed bi[tt]er.+consonance?alliteration=onomatopoeia=assonance",
    "We're now bou[nd] by a bo[nd] that transce[nd]s the mi[nd].+consonance?rhyme=onomatopoeia=assonance",
    "The pe[rk]y mee[rk]ats i[rk]ed the a[rch]itect lu[rk]ing at the pa[rk].+consonance?rhyme=onomatopoeia=assonance",
    "If [L]i[l]y drops her wa[ll]et, it wi[ll] fa[ll] into that [well] for sure.+consonance?alliteration=onomatopoeia=assonance",
    "The ski[nn]y ru[nn]er eats [n]othing but ca[nn]ed tu[n]a for di[nn]er.+consonance?onomatopoeia=alliteration=assonance",
    "Ru[st]om waved his fi[st] in ang[st] at the gha[st]ly bea[st].+consonance?alliteration=onomatopoeia=assonance",
    // rhyme (4)
    "When you awaken in the morning's [hush], I am the swift uplifting [rush].+rhyme?consonance=assonance=alliteration",
    "Once upon a midnight [dreary], while I pondered, weak and [weary]...+rhyme?consonance=assonance=alliteration",
    "He gives his harness bells a [shake], to ask if there is some [mistake].+rhyme?consonance=assonance=alliteration",
    "Here is a child who clambers and [scrambles], all by himself and gathering [brambles].+rhyme?consonance=assonance=alliteration",
];

$bankByTier[4] = [
    // onomatopoeia (5)
    "The confused defendant listened to the lawyer's unending [gibberish] about plea bargaining.+onomatopoeia?alliteration=consonance=assonance",
    "The politician's lengthy speech on the resilience of the global economy amid the pandemic is just [gobbledygook].+onomatopoeia?alliteration=consonance=assonance",
    "The sight of Arab widows [ululating] with indescribable grief melted the heart of the war news reporter.+onomatopoeia?alliteration=consonance=assonance",
    "The botanist was almost lulled into sleep by the hypnotic [sussuration] of the flowing rivulet.+onomatopoeia?alliteration=consonance=assonance",
    "Under heavy rain and engulfed in a thick fog, the soldiers' boots [squelched] through mud during that arduous journey.+onomatopoeia?alliteration=consonance=assonance",
    // alliteration (4)
    "The wicked [qu]een's exhausted [qu]ilters stayed [qu]iet about their [qu]andary.+alliteration?onomatopoeia=rhyme=assonance",
    "[V]aliance and [v]alor are two [v]irtues we'll never observe in these [v]illainous [v]ermins.+alliteration?onomatopoeia=rhyme=assonance",
    "The [dr]owsy operator had [dr]iven the [dr]edger into the secluded [dr]illing zone.+alliteration?onomatopoeia=rhyme=assonance",
    "The [br]awny [st]untman [br]aved the [st]orm to [br]ing [br]eakfast to the [st]randed [st]udents at the [br]ewery.+alliteration?onomatopoeia=rhyme=assonance",
    // assonance (3) — item 1 fixed: '=' after answer replaced with '?'
    "Mr. P[e]r[e]z conf[e]ssed that he f[e]lt d[e]j[e]ct[e]d and d[e]sp[e]rate during their qu[e]st for wat[e]r.+assonance?onomatopoeia=consonance=alliteration",
    "The m[ou]thy gr[ou]ch den[ou]nced the ast[ou]nded cr[ow]d for being r[ow]dy.+assonance?onomatopoeia=consonance=alliteration",
    "M[y] st[y]mied friend was der[i]ded b[y] a r[i]val tr[y]ing to underm[i]ne our l[i]velihood.+assonance?onomatopoeia=consonance=alliteration",
    // consonance (5)
    "Je[ff]rey ate a wa[ff]le and some to[ff]ee a[f]ter [f]ighting the a[f]ternoon tra[ff]ic.+consonance?alliteration=onomatopoeia=assonance",
    "The ski[tt]ish kara[t]e mas[t]er joined the ba[tt]le to re[t]ake his former [t]i[t]le.+consonance?alliteration=onomatopoeia=assonance",
    "The fu[rt]ive a[rt]ist unea[rt]hed a di[rt]y secret at Mo[rt]y's pa[rt]y.+consonance?alliteration=onomatopoeia=assonance",
    "The rancher with a poncho flinched from the stench of the conches.+consonance?rhyme=alliteration=assonance",
    // rhyme (5)
    "The enormous bear started to [scowl] and [growl] when the little [owl] used his [towel].+rhyme?consonance=assonance=alliteration",
    "So long as men can breathe or eyes can [see], so long lives this and this gives life to [thee].+rhyme?consonance=assonance=alliteration",
    "Leave no black plume as a [token] of that lie thy soul hath [spoken]!+rhyme?consonance=assonance=alliteration",
    "And his eyes have all the [seeming] of a demon's that is [dreaming].+rhyme?consonance=assonance=alliteration",
    "In its unfading flowers, I hear the bright bee [hum]; Prithee, my brother, into my garden [come]!+rhyme?consonance=assonance=alliteration",
];

// ============================================================
// Parsers + render helpers
// ============================================================
function sd_parse($entry) {
    $plus = strpos($entry, '+');
    if ($plus === false) return null;
    $sentence = trim(substr($entry, 0, $plus));
    $rest     = substr($entry, $plus + 1);

    $q = strpos($rest, '?');
    if ($q === false) return null;
    $answer = trim(substr($rest, 0, $q));
    $rest   = substr($rest, $q + 1);

    $eq1 = strpos($rest, '=');
    if ($eq1 === false) return null;
    $d1  = trim(substr($rest, 0, $eq1));
    $rest = substr($rest, $eq1 + 1);

    $eq2 = strpos($rest, '=');
    if ($eq2 === false) return null;
    $d2  = trim(substr($rest, 0, $eq2));
    $d3  = trim(substr($rest, $eq2 + 1));

    if ($sentence === '' || $answer === '') return null;
    if ($d1 === '' || $d2 === '' || $d3 === '') return null;

    return [
        'sentence' => $sentence,
        'answer'   => $answer,
        'd1'       => $d1,
        'd2'       => $d2,
        'd3'       => $d3,
    ];
}

function sd_render_sentence($raw, $highlight = false) {
    $s = htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
    if ($highlight) {
        return preg_replace_callback(
            '/\[([^\]]+)\]/',
            function ($m) {
                return '<strong style="color:#CC0066;">' . $m[1] . '</strong>';
            },
            $s
        );
    }
    return str_replace(['[', ']'], '', $s);
}

function sd_extract_clue($raw) {
    $p1 = strpos($raw, '[');
    if ($p1 === false) return '';
    $p2 = strpos($raw, ']', $p1);
    if ($p2 === false) return '';
    return strtolower(substr($raw, $p1 + 1, $p2 - $p1 - 1));
}

function sd_explanation($device, $clue) {
    switch ($device) {
        case 'onomatopoeia':
            return "The word '" . $clue . "' imitates the sound of the thing or action it refers to.";
        case 'alliteration':
            return "Many of the words in the sentence start with the same sound (the '" . $clue . "' sound).";
        case 'assonance':
            return 'Many of the words in the sentence have the same vowel sound.';
        case 'consonance':
            return 'Many of the words in the sentence have the same consonant sound.';
        case 'rhyme':
            return 'The sentence contains rhyming words.';
    }
    return '';
}

function sd_article($device) {
    $first = strtolower(substr($device, 0, 1));
    return in_array($first, ['a', 'e', 'i', 'o', 'u']) ? 'an ' : 'a ';
}

// ============================================================
// Answer scoring
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// Theme
// ============================================================
$theme = [
    'top_banner'    => $base . '/english/images/ex-28-top.jpg',
    'title_bg'      => $base . '/english/images/ex-28-top2.jpg',
    'left_side'     => $base . '/english/images/ex-28-left.jpg',
    'right_side'    => $base . '/english/images/ex-28-right.jpg',
    'content_bg'    => $base . '/english/images/ex-28-content.jpg',
    'bottom_banner' => $base . '/english/images/ex-28-bottom.jpg',
    'score_top'     => $base . '/english/images/score-top-1.jpg',
    'score_bottom'  => $base . '/english/images/score-bottom-1.jpg',
];

// ============================================================
// Generate
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    $pool = $bankByTier[$arrnum];

    $usedKey = 'used_t' . $arrnum;
    $used    = $_SESSION[$sessionKey][$usedKey] ?? [];

    $avail = [];
    foreach ($pool as $i => $entry) {
        if (in_array($i, $used, true)) continue;
        if (sd_parse($entry) === null) continue;
        $avail[] = $i;
    }
    if (empty($avail)) {
        $used = [];
        foreach ($pool as $i => $entry) {
            if (sd_parse($entry) === null) continue;
            $avail[] = $i;
        }
    }
    if (empty($avail)) {
        render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
        echo '<p style="text-align:center;font-size:16pt;margin:30px auto;">Temporarily unavailable.</p>';
        render_score_box();
        render_footer();
        exit;
    }

    $idx = $avail[array_rand($avail)];
    $used[] = $idx;
    if (count($used) > 100) $used = array_slice($used, -50);
    $_SESSION[$sessionKey][$usedKey] = $used;

    $parsed = sd_parse($pool[$idx]);

    $choices = [$parsed['answer'], $parsed['d1'], $parsed['d2'], $parsed['d3']];
    shuffle($choices);

    $clue        = sd_extract_clue($parsed['sentence']);
    $explanation = sd_explanation($parsed['answer'], $clue);

    $_SESSION[$sessionKey]['current'] = [
        'sentence'    => $parsed['sentence'],
        'answer'      => $parsed['answer'],
        'clue'        => $clue,
        'explanation' => $explanation,
        'choices'     => $choices,
        'lvl'         => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// Render
// ============================================================
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .sd-card {
    background: #fffbe8;
    border: 2px solid #e8d888;
    border-radius: 12px;
    padding: 20px 26px;
    width: fit-content;
    max-width: 100%;
    margin: 20px auto;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    line-height: 1.55;
    text-align: center;
    box-sizing: border-box;
  }
  .sd-card.sd-feedback { font-size: 1.1rem; }
  .sd-prompt {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #800080;
    text-align: center;
    margin: 20px auto 8px;
    line-height: 1.5;
  }
  .sd-prompt strong { color: #CC0066; }
  .sd-subhint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 0.95rem;
    color: #666666;
    text-align: center;
    margin: 4px auto 12px;
    line-height: 1.5;
  }
  .sd-hint {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.1rem;
    color: #555555;
    text-align: center;
    margin: 24px auto 6px;
  }
  .sd-grid-2x2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 16px;
    max-width: 100%;
    margin: 14px auto;
  }
  .sd-choice {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 60px;
    padding: 12px 16px;
    background: #f8f8ff;
    border: 2px solid #ccc;
    border-radius: 12px;
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #0000BB;
    text-decoration: none;
    text-align: center;
    word-break: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
    transition: background 0.15s, border-color 0.15s;
  }
  .sd-choice:hover { background: #eef; border-color: #8080ff; }
  .sd-explanation {
    font-family: Arial, 'Segoe UI', sans-serif;
    font-size: 1rem;
    color: #444;
    text-align: center;
    max-width: 100%;
    margin: 20px auto 0;
    line-height: 1.6;
  }
</style>
<div style="max-width: 480px; margin: 0 auto; padding: 0; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer is <strong style="color:#0000CC; font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>.
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p class="sd-prompt">
        This sentence used
        <strong><?php echo sd_article($cur['answer']) . htmlspecialchars($cur['answer']); ?></strong>.
    </p>
    <div class="sd-card sd-feedback"><?php echo sd_render_sentence($cur['sentence'], true); ?></div>
    <p class="sd-explanation"><?php echo htmlspecialchars($cur['explanation']); ?></p>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php else: ?>
    <p class="sd-prompt">What sound device is used in this sentence?</p>
    <p class="sd-subhint">Pick 'rhyme' or 'onomatopoeia' if either of them comes with other possible answers.</p>

    <div class="sd-card"><?php echo sd_render_sentence($q['sentence'], false); ?></div>

    <p class="sd-hint">Click on your answer.</p>

    <div class="sd-grid-2x2">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>" class="sd-choice">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <input type="submit" name="Submit2" value=" New Question " style="margin:30px 0;">
<?php endif; ?>

    <div align="center" style="margin-top:20px;">
        <p style="margin-top:5px; margin-bottom:0">
            <font face="Verdana" style="font-size:10pt;" color="#000080">Select difficulty level for next question:</font>
        </p>
        <table border="0" width="80%" cellspacing="0" cellpadding="0"><tr>
            <?php foreach ($levels as $l): ?>
                <td align="center">
                    <font face="Verdana" style="font-size:9pt;"><font color="#800080">
                        <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>>
                        <b>&nbsp;<?php echo $l; ?></b>
                    </font></font>
                </td>
            <?php endforeach; ?>
        </tr></table>
    </div>
</form>
<br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();