<?php
// filipino/modules/pantangi-pambalana.php
// Seven grade-dependent proper/common noun banks.

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
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId . ':banks-v2');
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;
$moduleTitle = $grd <= 1 ? 'Pangngalang Tiyak at Di-tiyak' : 'Pangngalang Pantangi at Pambalana';
$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (($_SESSION['level'] ?? '') === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'] ?? '', $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];
function pp_tier(string $lvl, int $grd): int {
    $tier = $grd === 0 ? 0 : ($grd <= 2 ? 1 : ($grd <= 4 ? 2 : ($grd <= 7 ? 3 : 4)));
    return min(6, $tier + ($lvl === 'Hard' ? 2 : 0));
}
function pp_h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
$banks = [
    0 => [
        ["David", "Juan", "Maria", "Pedro", "Tomas", "Cebu", "Davao", "Laguna", "Makati", "Maynila", "Quezon", "Pasig", "Pasay", "Pilipinas", "Rizal", "Lunes", "Martes", "Miyerkules", "Huwebes", "Biyernes", "Sabado", "Linggo", "Enero", "Marso", "Abril", "Mayo", "Hunyo", "Hulyo"],
        ["ahas", "baboy", "bahay", "balde", "balon", "bata", "bundok", "buwan", "gatas", "guro", "kabayo", "kahoy", "kalan", "kalye", "kamay", "karne", "kuting", "kuya", "lalaki", "manok", "pagong", "payong", "pugad", "pulis", "sisiw", "unggoy"],
    ],
    1 => [
        ["Amerika", "Aurora", "Cebu", "Davao", "Laguna", "Las Piñas", "Makati", "Maynila", "Pateros", "Quezon", "Navotas", "Malabon", "Maynila", "San Juan", "Marikina", "Pateros", "Makati", "Pasig", "Pasay", "Hapon", "Indonesia", "Malaysia", "Pilipinas", "Singapore", "Thailand", "Tsina", "Vietnam", "Jose Rizal", "Andres Bonifacio", "Emilio Aguinaldo", "Apolinario Mabini", "Lunes", "Martes", "Miyerkules", "Huwebes", "Biyernes", "Sabado", "Linggo", "Enero", "Marso", "Abril", "Mayo", "Hunyo", "Hulyo", "India", "Batangas", "Cavite", "Laguna", "Quezon", "Palawan"],
        ["alahas", "anghel", "baboy", "bahay", "balde", "balon", "bangka", "bundok", "bunga", "buslo", "buwan", "gagamba", "gatas", "gulong", "hangin", "kabayo", "kahoy", "kalan", "kalye", "kamay", "karne", "kawali", "kidlat", "kuneho", "kuting", "kutsara", "kutsilyo", "lalaki", "langis", "lawin", "madre", "maleta", "manok", "medyas", "maskara", "medalya", "musmos", "pagong", "palaka", "paniki", "payong", "peras", "posporo", "piloto", "pugad", "pulis", "pulubi", "punda", "saging", "salamin", "sapatos", "saranggola", "sinulid", "talon", "tandang", "trumpo", "unggoy", "trono"],
    ],
    2 => [
        ["Bb. Santillan", "Gng. Bartolome", "Maria Clara", "Pebrero", "Agosto", "Setyembre", "Oktubre", "Nobyembre", "Disyembre", "Caloocan", "Valenzuela", "Navotas", "Malabon", "Maynila", "San Juan", "Marikina", "Pateros", "Mandaluyong", "Pasig", "Taguig", "Pasay", "Las Piñas", "Muntinlupa", "Brunei", "Cambodia", "Indonesia", "Malaysia", "Myanmar", "Singapore", "Thailand", "Vietnam", "Denmark", "Finland", "Germany", "Italy", "Norway", "Poland", "Russia", "Spain", "Sweden", "Marcelo del Pilar", "Juan Luna", "Melchora Aquino", "Gabriela Silang", "Ninoy Aquino", "Antonio Luna", "Nicanor Abelardo", "Julian Felipe", "Francisco Baltazar", "Lea Salonga", "Napoleon Abueva", "Botong Francisco", "Cecile Licad", "Leandro Locsin", "Nicanor Abelardo", "Bundok Mayon", "Bundok Apo", "Bundok Makiling", "Bundok Banahaw", "Bulkang Pinatubo", "Bulkang Taal", "Aurora", "Bataan", "Bulacan", "Nueva Ecija", "Pampanga", "Tarlac", "Zambales", "Marinduque", "Occidental Mindoro", "Oriental Mindoro", "Palawan", "Albay", "Camarines Norte", "Camarines Sur", "Catanduanes", "Masbate", "Sorsogon", "Iloilo", "Leyte", "Davao Oriental", "Compostela Valley", "Lanao del Sur", "Agusan del Norte", "Surigao del Sur", "Dinagat Islands"],
        ["alapaap", "balita", "bantayog", "basahan", "bilanggo", "bisikleta", "dikya", "garapon", "hagdanan", "kabute", "kalaban", "kalapati", "kalawang", "kandado", "kapatagan", "kuliglig", "kuwago", "labanos", "mungkahi", "panauhin", "planeta", "sagisag", "simbolo", "teritoryo", "tsinelas"],
    ],
    3 => [
        ["Belgium", "Bulgaria", "Hungary", "Iceland", "Ireland", "Luxembourg", "Netherlands", "Portugal", "Switzerland", "United Kingdom", "Senegal", "Oman", "Nicaragua", "Liberia", "Swaziland", "Yemen", "Lambak ng Cagayan", "Golpo ng Lingayen", "Dagat Sulu", "Talon ng Maria Cristina", "Talon ng Pagsanjan", "Ilocos Norte", "La Union", "Pangasinan", "Apayao", "Benguet", "Ifugao", "Kalinga", "Batanes", "Cagayan", "Isabela", "Nueva Vizcaya", "Guimaras", "Negros Occidental", "Biliran", "Masbate", "Sorsogon", "Bukidnon", "Camiguin", "Lanao del Norte", "Misamis Oriental", "Misamis Occidental", "Basilan", "Sultan Kudarat", "Romblon", "Albert Einstein", "Alexander Graham Bell", "Marie Curie", "Michael Faraday", "Isaac Newton", "Henry Ford", "Louis Pasteur", "Benjamin Franklin", "Galileo Galilei"],
        ["abubot", "ambulansya", "bantayog", "baybayin", "bilanggo", "buhawi", "bulalakaw", "garapon", "gilingan", "hagdanan", "kalaban", "kalapati", "kalasag", "kalawang", "kandado", "koponan", "kuliglig", "kumunoy", "mananayaw", "niyebe", "panauhin", "panitikan", "polusyon", "talampas", "talulot", "tanikala", "teritoryo", "tipaklong", "tsinelas"],
    ],
    4 => [
        ["Timor-Leste", "Palau", "Djibouti", "Burkina Faso", "Seychelles", "Burundi", "Tajikistan", "Kyrgyzstan", "Kosovo", "Bhutan", "Dominica", "Turkmenistan", "Azerbaijan", "Namibia", "Mozambique", "Uzbekistan", "Georgia", "Cameroon", "Ghana", "Kazakhstan", "Cotabato", "Sarangani", "Tawi-Tawi", "Maguindanao", "Tycho Brahe", "Nikola Tesla", "Alan Turing", "Humphry Davy", "Blaise Pascal", "Charles Darwin", "Enrico Fermi", "Euclid"],
        ["abaniko", "abrilata", "adorno", "bilangguan", "dalampasigan", "dalanghita", "daldalera", "kabalyero", "kabukiran", "karapatan", "manananggol", "pamahalaan", "pamayanan", "salinlahi", "kasunduan", "kalakalan", "kapuluan", "talasalitaan", "salawikain", "talambuhay", "pananaliksik"],
    ],
    5 => [
        ["Tuvalu", "Comoros", "Nauru", "Vanuatu", "Eritrea", "Suriname", "Benin", "Lesotho", "Andorra", "Malawi", "Gabon", "Guyana", "Moldova", "Montenegro", "Slovakia", "Brahmagupta", "Eratosthenes", "Lucretius", "Avicenna", "Aristarchus", "Anaximander", "Srinivasa Ramanujan", "Ibn Battuta", "Hypatia", "Al-Khwarizmi", "Omar Khayyam", "Johannes Kepler", "Christiaan Huygens"],
        ["abaloryo", "abestrus", "amatista", "araknida", "ardilya", "balintataw", "estalagmita", "estalaktita", "estetoskopyo", "hiringgilya", "hunyango", "kababalaghan", "kasinungalingan", "katakumba", "kumintang", "labirint", "largabista", "megalit", "mikroskopyo", "pantablay", "periskop", "takipsilim", "teleskopyo", "termometro", "talatinigan"],
    ],
    6 => [
        ["Svalbard", "Jan Mayen", "Socotra", "Kerguelen", "Aldabra", "Sakhalin", "Kamchatka", "Tierra del Fuego", "Lawa ng Baikal", "Lawa ng Titicaca", "Lawa ng Tanganyika", "Lawa ng Vostok", "Salar de Uyuni", "Atacama Desert", "Karakoram", "Pamir Mountains", "Chandrasekhara Venkata Raman", "Subrahmanyan Chandrasekhar", "Emmy Noether", "Sofia Kovalevskaya", "Lise Meitner", "Chien-Shiung Wu", "Abdus Salam", "Satyendra Nath Bose", "Ibn al-Haytham", "Nasir al-Din al-Tusi", "Al-Biruni", "Al-Zahrawi"],
        ["apokripa", "palimpsesto", "epigrapiya", "paleograpiya", "numismatika", "etimolohiya", "leksikograpiya", "ponolohiya", "morpolohiya", "sintaks", "semantika", "hermenyutika", "epistemolohiya", "ontolohiya", "metapisika", "etnograpiya", "antropolohiya", "arkeolohiya", "paleontolohiya", "stratigrapiya", "sedimentolohiya", "petrograpiya", "heomorpolohiya", "seismolohiya", "kristalograpiya"],
    ],
];
$tier = pp_tier($lvl, $grd);
$labels = $grd <= 1 ? ['tiyak', 'di-tiyak'] : ['pantangi', 'pambalana'];
$pool = [];
foreach ($banks[$tier] as $category => $words) {
    foreach (array_unique($words) as $word) $pool[] = ['word'=>$word, 'category'=>$category];
}
function pp_question(array $entry, int $tier, string $lvl, int $grd, array $labels): array {
    return ['word'=>$tier > 2 ? (function_exists('mb_strtoupper') ? mb_strtoupper($entry['word'], 'UTF-8') : str_replace('ñ', 'Ñ', strtoupper($entry['word']))) : $entry['word'], 'correct'=>$labels[$entry['category']], 'choices'=>$labels, 'tier'=>$tier, 'lvl'=>$lvl, 'grade'=>$grd, 'qid'=>bin2hex(random_bytes(16))];
}
$result = null;
$scorer = null;
if (isset($_GET['ansclick'], $_GET['qid'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])
    && is_string($_GET['ansclick']) && is_string($_GET['qid'])
    && $_GET['qid'] === ($_SESSION[$sessionKey]['current']['qid'] ?? null)
    && ($_SESSION[$sessionKey]['current']['grade'] ?? -1) === $grd
    && in_array($_GET['ansclick'], $_SESSION[$sessionKey]['current']['choices'], true)) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

if ($result === null && (isset($_POST['Submit2']) || !isset($_SESSION[$sessionKey]['current']) || $_SESSION[$sessionKey]['current']['tier'] !== $tier || $_SESSION[$sessionKey]['current']['lvl'] !== $lvl || ($_SESSION[$sessionKey]['current']['grade'] ?? -1) !== $grd)) {
    $used = $_SESSION[$sessionKey]['used'][$tier] ?? [];
    $available = array_values(array_diff(array_keys($pool), $used));
    if (!$available) { $used = []; $available = array_keys($pool); }
    $i = $available[array_rand($available)];
    $used[] = $i;
    $_SESSION[$sessionKey]['used'][$tier] = $used;
    $_SESSION[$sessionKey]['current'] = pp_question($pool[$i], $tier, $lvl, $grd, $labels);
}

$theme = [];
render_header($moduleTitle, $moduleTitle, $theme);
?>
<div style="padding:0 10px;text-align:center;font-family:Arial,sans-serif;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($result !== null):
    $cur = $result['cur']; ?>
    <p style="font-size:14pt;color:#666;margin:20px auto 10px;max-width:480px;">Ang iyong sagot ay <strong style="color:#0000CC;">'<?php echo htmlspecialchars($result['clicked'], ENT_QUOTES, 'UTF-8'); ?>'</strong>.</p>
    <p style="font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;margin:10px auto;">
        <?php echo $result['correct'] ? '&#9989; Ito ay tumpak!' : '&#10060; Ito ay hindi tumpak.'; ?>
    </p>
    <p style="font-size:16pt;color:#800080;max-width:450px;margin:16px auto;text-wrap:balance;">Ang pangngalang '<?php echo pp_h($cur['word']); ?>' ay isang pangngalang <strong style="color:#CC0066;"><?php echo pp_h($cur['correct'] . ($cur['correct'] === 'tiyak' ? ' o pantangi' : ($cur['correct'] === 'di-tiyak' ? ' o pambalana' : ''))); ?></strong>.</p>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;overflow-wrap:anywhere;"><?php echo pp_h($cur['word']); ?></span></div>
    <br/><input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:20px 0;font-family:Arial,sans-serif;">
<?php else:
    $cur = $_SESSION[$sessionKey]['current']; ?>
    <div style="text-align:center;margin:20px auto;"><span style="display:inline-block !important;width:auto !important;min-width:0 !important;max-width:100%;padding:30px 50px;background:#FCFBE6;border:2px solid #DDD;border-radius:10px;box-sizing:border-box;font-size:24pt;font-weight:700;color:#800080;overflow-wrap:anywhere;"><?php echo pp_h($cur['word']); ?></span></div>
    <p style="font-size:16pt;color:#800080;font-weight:600;line-height:1.4;text-wrap:balance;margin:20px auto;max-width:450px;">Anong uri ng pangngalan ang nakasulat sa itaas?</p>
    <?php
    $longest = max(array_map(static function ($choice) {
        return preg_match_all('/./us', $choice);
    }, $cur['choices']));
    $columns = $longest <= 10 ? 2 : 1;
    ?>
    <div style="display:grid;grid-template-columns:repeat(<?php echo $columns; ?>, minmax(0, 1fr));gap:16px;width:max-content;max-width:100%;margin:0 auto;">
        <?php foreach ($cur['choices'] as $choice): ?>
            <a href="?ansclick=<?php echo urlencode($choice); ?>&amp;qid=<?php echo $cur['qid']; ?>" style="display:flex;align-items:center;justify-content:center;min-width:0;min-height:54px;padding:12px 18px;border:2px solid #888888;border-radius:8px;background:#fff;text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;text-align:center;overflow-wrap:anywhere;box-sizing:border-box;line-height:1.3;">
                <?php echo pp_h(ucfirst($choice)); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php if ($tier > 4): ?>
    <p style="max-width:450px;margin:16px auto;color:#444;font-size:14pt;text-wrap:balance;">Piliin ang '<?php echo pp_h($labels[1]); ?>' kung ang nakasulat na pangngalan ay maaaring maging pantangi o pambalana.</p>
    <?php endif; ?>
    <input type="submit" name="Submit2" value=" Bagong Tanong " style="margin:40px 0 20px;font-family:Arial,sans-serif;">
<?php endif; ?>

<div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Gaano kahirap ang gusto mong susunod na tanong?</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="max-width:480px;"><tr>
    <?php foreach ($levels as $level): ?>
        <td align="center"><label style="font:9pt Arial,sans-serif;color:#800080;"><input type="radio" name="level" value="<?php echo $level; ?>" <?php echo $lvl === $level ? 'checked' : ''; ?>> <b><?php echo $level === 'Easy' ? 'Madali' : 'Mahirap'; ?></b></label></td>
    <?php endforeach; ?>
    </tr></table>
</div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
