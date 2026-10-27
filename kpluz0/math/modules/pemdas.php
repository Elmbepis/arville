<?php
// math/modules/pemdas.php
// MULTIPLE CHOICE (4 choices). Applying PEMDAS Rules.
// Uses ?ansclick=X + 2x2 grid.
//
// Distractor logic: magnitude-scaled arithmetic slips (5-30% spread).
// Answers can be negative (cases 2, 4, 6) — handled. Same-last-digit
// preservation for larger integers so units-digit reasoning can't eliminate.
// Small answers (< 10) fall back to unit offsets.
//
// Legacy: grades 4-6, 3 levels. New: 2 levels
//         (Easy = legacy Easy, Hard = legacy Medium, per §E).
// Legacy Hard range dropped — Medium provides sufficient challenge.
// Theme: wquiz-06-* &#8594; paper-69-*.
// DB row required: modules.url = 'pemdas.php'

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

$moduleTitle = 'Applying PEMDAS Rules';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(6, max(4, (int)($_SESSION['grade'] ?? 4)));

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function canon_pemdas($v) {
    $r = (int)round($v);
    return (string)$r;
}

function make_pemdas_distractors($correct, $n = 3) {
    $ic = (int)round($correct);
    $seen = [(string)$ic => true];
    $out  = [];
    $abs = abs($ic);

    if ($abs < 10)       $step = 1;
    elseif ($abs < 100)  $step = 2;
    elseif ($abs < 1000) $step = 5;
    else                 $step = 10;

    $mults = [1, 2, 3, 4, 5, 6, 8, 10];
    shuffle($mults);

    foreach ($mults as $m) {
        if (count($out) >= $n) break;
        $delta = $m * $step;
        foreach ([+$delta, -$delta] as $signed) {
            $cv = $ic + $signed;
            if (isset($seen[(string)$cv])) continue;
            $seen[(string)$cv] = true;
            $out[] = (string)$cv;
            if (count($out) >= $n) break 2;
        }
    }
    $d = 1;
    while (count($out) < $n) {
        foreach ([$ic + $d, $ic - $d] as $cv) {
            if (!isset($seen[(string)$cv])) {
                $seen[(string)$cv] = true;
                $out[] = (string)$cv;
                if (count($out) >= $n) break 2;
            }
        }
        $d++;
    }

    return $out;
}

// ============================================================
// HANDLE ANSWER CLICK
// ============================================================
$result = null;
$scorer = null;

if (isset($_GET['ansclick']) && isset($_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer(canon_pemdas($clicked), $cur['ans_canon'], $cur['lvl']);

    $result = [
        'correct' => $isCorrect,
        'clicked' => $clicked,
        'cur'     => $cur,
    ];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    // [numlimit1, numlimit2]
    $configs = [
        4 => [
            'Easy' => [3, 9],
            'Hard' => [4, 15],   // legacy Medium
        ],
        5 => [
            'Easy' => [3, 9],
            'Hard' => [7, 20],   // legacy Medium
        ],
        6 => [
            'Easy' => [5, 12],
            'Hard' => [11, 24],  // legacy Medium
        ],
    ];
    [$numlimit1, $numlimit2] = $configs[$grd][$lvl];

    $a = rand($numlimit1, $numlimit2);
    $b = rand($numlimit1, $numlimit2);
    $c = rand($numlimit1, $numlimit2);
    $d = rand($numlimit1, $numlimit2);
    $e = rand($numlimit1, $numlimit2);
    $f = rand($numlimit1, $numlimit2);
    $g = rand(2, 3);

    // Pick question type (Easy = legacy Easy, Hard = legacy Medium ranges)
    if ($grd <= 4) {
        $q = ($lvl == 'Easy') ? rand(1, 7) : rand(8, 12);
    } elseif ($grd == 5) {
        $q = ($lvl == 'Easy') ? rand(41, 46) : rand(47, 52);
    } else {
        $q = ($lvl == 'Easy') ? rand(45, 50) : rand(51, 55);
    }

    $question = '';
    $soln     = '';
    $ans      = 0;

    switch ($q) {
        case 1:
            $question = "$a x $b + $c = ?";
            $ans = $a*$b + $c;
            $soln = "$a x $b + $c<br>= " . ($a*$b) . " + $c<br>= <strong>$ans</strong>";
            break;

        case 2:
            $safety = 0;
            while ($c >= ($a*$b) && $safety < 50) {
                $a = rand($numlimit1, $numlimit2);
                $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a x $b - $c = ?";
            $ans = $a*$b - $c;
            $soln = "$a x $b - $c<br>= " . ($a*$b) . " - $c<br>= <strong>$ans</strong>";
            break;

        case 3:
            $question = "$a + $b x $c = ?";
            $ans = $a + $b*$c;
            $soln = "$a + $b x $c<br>= $a + " . ($b*$c) . "<br>= <strong>$ans</strong>";
            break;

        case 4:
            $safety = 0;
            while ($a <= ($b*$c) && $safety < 50) {
                $a = rand($numlimit1, $numlimit2);
                $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a - $b x $c = ?";
            $ans = $a - $b*$c;
            $soln = "$a - $b x $c<br>= $a - " . ($b*$c) . "<br>= <strong>$ans</strong>";
            break;

        case 5:
            $question = "$a x $b + $c x $d = ?";
            $ans = $a*$b + $c*$d;
            $soln = "$a x $b + $c x $d<br>= " . ($a*$b) . " + " . ($c*$d) . "<br>= <strong>$ans</strong>";
            break;

        case 6:
            $safety = 0;
            while (($a*$b) <= ($c*$d) && $safety < 50) {
                $a = rand($numlimit1, $numlimit2);
                $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2);
                $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a x $b - $c x $d = ?";
            $ans = $a*$b - $c*$d;
            $soln = "$a x $b - $c x $d<br>= " . ($a*$b) . " - " . ($c*$d) . "<br>= <strong>$ans</strong>";
            break;

        case 7:
            $question = "$a + $b x $c + $d = ?";
            $ans = $a + $b*$c + $d;
            $soln = "$a + $b x $c + $d<br>= $a + " . ($b*$c) . " + $d<br>= <strong>$ans</strong>";
            break;

        case 8:
            $question = "$a + $b x $c + $d - $e = ?";
            $ans = $a + $b*$c + $d - $e;
            $soln = "$a + $b x $c + $d - $e<br>= $a + " . ($b*$c) . " + $d - $e<br>= <strong>$ans</strong>";
            break;

        case 9:
            $a = rand(2, 4); $b = rand(3, 9); $c = rand(2, 4); $d = rand(3, 9); $e = rand(3, 6);
            $safety = 0;
            while (($b+$d) <= $e && $safety < 50) {
                $a = rand(2, 4); $b = rand(3, 9); $c = rand(2, 4); $d = rand(3, 9); $e = rand(3, 6);
                $safety++;
            }
            $question = ($a*$b) . " / $a + " . ($c*$d) . " / $c - $e = ?";
            $ans = $b + $d - $e;
            $soln = ($a*$b) . " / $a + " . ($c*$d) . " / $c - $e<br>= $b + $d - $e<br>= <strong>$ans</strong>";
            break;

        case 10:
            $b = rand(2, 4); $c = rand(2, 6);
            $question = "$a + " . ($b*$c) . " / $c + $d x $e = ?";
            $ans = $a + $b + $d*$e;
            $soln = "$a + " . ($b*$c) . " / $c + $d x $e<br>= $a + $b + " . ($d*$e) . "<br>= <strong>$ans</strong>";
            break;

        case 11:
            $question = "$a + $b x $c + $e x $f = ?";
            $ans = $a + $b*$c + $e*$f;
            $soln = "$a + $b x $c + $e x $f<br>= $a + " . ($b*$c) . " + " . ($e*$f) . "<br>= <strong>$ans</strong>";
            break;

        case 12:
            $e = rand(2, 4); $f = rand(3, 8);
            $question = "$a x $b - $c + " . ($e*$f) . " / $f = ?";
            $ans = $a*$b - $c + $e;
            $soln = "$a x $b - $c + " . ($e*$f) . " / $f<br>= " . ($a*$b) . " - $c + $e<br>= <strong>$ans</strong>";
            break;

        case 13:
            $a = rand(2, 12); $b = rand(3, 12);
            $question = ($a*$b) . " / $b - $c + $d x $e - $f = ?";
            $ans = $a - $c + $d*$e - $f;
            $soln = ($a*$b) . " / $b - $c + $d x $e - $f<br>= $a - $c + " . ($d*$e) . " - $f<br>= <strong>$ans</strong>";
            break;

        case 14:
            $c = rand(2, 12); $d = rand(3, 12);
            $question = "$a + $b x " . ($c*$d) . " / $d x $e - $f = ?";
            $ans = $a + $b*$c*$e - $f;
            $soln = "$a + $b x " . ($c*$d) . " / $d x $e - $f<br>= $a + " . ($b*$c*$e) . " - $f<br>= <strong>$ans</strong>";
            break;

        case 15:
            $c = rand(2, 12); $d = rand(3, 12);
            $question = "$a x $b + " . ($c*$d) . " / $d x $e - $f = ?";
            $ans = $a*$b + $c*$e - $f;
            $soln = "$a x $b + " . ($c*$d) . " / $d x $e - $f<br>= " . ($a*$b) . " + " . ($c*$e) . " - $f<br>= <strong>$ans</strong>";
            break;

        case 16:
            $question = "$a + $b x $c - $d + $e x $f = ?";
            $ans = $a + $b*$c - $d + $e*$f;
            $soln = "$a + $b x $c - $d + $e x $f<br>= $a + " . ($b*$c) . " - $d + " . ($e*$f) . "<br>= <strong>$ans</strong>";
            break;

        case 17:
            $safety = 0;
            while ($c <= $d && $safety < 30) {
                $c = rand($numlimit1, $numlimit2);
                $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $e = rand(2, 12); $f = rand(3, 12);
            $question = "$a x $b - $c + $d + " . ($e*$f) . " / $f = ?";
            $ans = $a*$b - $c + $d + $e;
            $soln = "$a x $b - $c + $d + " . ($e*$f) . " / $f<br>= " . ($a*$b) . " - $c + $d + $e<br>= <strong>$ans</strong>";
            break;

        case 18:
            $c = rand(2, 12); $d = rand(3, 12);
            $question = "$a x $b x " . ($c*$d) . " / $d + " . ($e*$f) . " / $f = ?";
            $ans = $a*$b*$c + $e;
            $soln = "$a x $b x " . ($c*$d) . " / $d + " . ($e*$f) . " / $f<br>= " . ($a*$b*$c) . " + $e<br>= <strong>$ans</strong>";
            break;

        case 19:
            $c = rand(2, 12); $d = rand(3, 12);
            $question = "$a x $b + " . ($c*$d) . " / $d + " . ($e*$d) . " / $d - $f = ?";
            $ans = $a*$b + $c + $e - $f;
            $soln = "$a x $b + " . ($c*$d) . " / $d + " . ($e*$d) . " / $d - $f<br>= " . ($a*$b) . " + $c + $e - $f<br>= <strong>$ans</strong>";
            break;

        case 41:
            $question = "$a x ($b + $c) = ?";
            $ans = $a*($b+$c);
            $soln = "$a x ($b + $c)<br>= $a x " . ($b+$c) . "<br>= <strong>$ans</strong>";
            break;

        case 42:
            $question = "($a x $b) + ($c x $d) = ?";
            $ans = $a*$b + $c*$d;
            $soln = "($a x $b) + ($c x $d)<br>= " . ($a*$b) . " + " . ($c*$d) . "<br>= <strong>$ans</strong>";
            break;

        case 43:
            $safety = 0;
            while ($a*$b <= $c*$d && $safety < 50) {
                $a = rand($numlimit1, $numlimit2); $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2); $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "($a x $b) - ($c x $d) = ?";
            $ans = $a*$b - $c*$d;
            $soln = "($a x $b) - ($c x $d)<br>= " . ($a*$b) . " - " . ($c*$d) . "<br>= <strong>$ans</strong>";
            break;

        case 44:
            $safety = 0;
            while ($b <= $c && $safety < 30) {
                $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a x ($b - $c) + $d = ?";
            $ans = $a*($b-$c) + $d;
            $soln = "$a x ($b - $c) + $d<br>= $a x " . ($b-$c) . " + $d<br>= " . ($a*($b-$c)) . " + $d<br>= <strong>$ans</strong>";
            break;

        case 45:
            $question = "($a + $b) x ($c + $d) = ?";
            $ans = ($a+$b)*($c+$d);
            $soln = "($a + $b) x ($c + $d)<br>= " . ($a+$b) . " x " . ($c+$d) . "<br>= <strong>$ans</strong>";
            break;

        case 46:
            $safety = 0;
            while (($a <= $b || $c <= $d) && $safety < 30) {
                $a = rand($numlimit1, $numlimit2); $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2); $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "($a - $b) x ($c - $d) = ?";
            $ans = ($a-$b)*($c-$d);
            $soln = "($a - $b) x ($c - $d)<br>= " . ($a-$b) . " x " . ($c-$d) . "<br>= <strong>$ans</strong>";
            break;

        case 47:
            $safety = 0;
            while (($a <= $b || $c <= $d) && $safety < 30) {
                $a = rand($numlimit1, $numlimit2); $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2); $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a x $b + ($c - $d) x $e = ?";
            $ans = $a*$b + ($c-$d)*$e;
            $soln = "$a x $b + ($c - $d) x $e<br>= " . ($a*$b) . " + " . ($c-$d) . " x $e<br>= " . ($a*$b) . " + " . (($c-$d)*$e) . "<br>= <strong>$ans</strong>";
            break;

        case 48:
            $safety = 0;
            while ($b <= $c && $safety < 30) {
                $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a x ($b - $c) + " . ($d*$e) . " / $e = ?";
            $ans = $a*($b-$c) + $d;
            $soln = "$a x ($b - $c) + " . ($d*$e) . " / $e<br>= $a x " . ($b-$c) . " + $d<br>= " . ($a*($b-$c)) . " + $d<br>= <strong>$ans</strong>";
            break;

        case 49:
            $question = "($a x $b) + $e x ($c + $d) = ?";
            $ans = $a*$b + $e*($c+$d);
            $soln = "($a x $b) + $e x ($c + $d)<br>= " . ($a*$b) . " + $e x " . ($c+$d) . "<br>= " . ($a*$b) . " + " . ($e*($c+$d)) . "<br>= <strong>$ans</strong>";
            break;

        case 50:
            $question = ($a*$b) . " / $b x $c + ($d x $e) = ?";
            $ans = $a*$c + $d*$e;
            $soln = ($a*$b) . " / $b x $c + ($d x $e)<br>= " . ($a*$c) . " + " . ($d*$e) . "<br>= <strong>$ans</strong>";
            break;

        case 51:
            $safety = 0;
            while ($d <= $e && $safety < 30) {
                $d = rand($numlimit1, $numlimit2);
                $e = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = ($a*$b) . " / $b + $c x ($d - $e) = ?";
            $ans = $a + $c*($d-$e);
            $soln = ($a*$b) . " / $b + $c x ($d - $e)<br>= $a + $c x " . ($d-$e) . "<br>= $a + " . ($c*($d-$e)) . "<br>= <strong>$ans</strong>";
            break;

        case 52:
            $safety = 0;
            while ($c <= $d && $safety < 30) {
                $c = rand($numlimit1, $numlimit2);
                $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a + " . ($b*($c-$d)) . " / " . ($c-$d) . " + $e x $f = ?";
            $ans = $a + $b + $e*$f;
            $soln = "$a + " . ($b*($c-$d)) . " / " . ($c-$d) . " + $e x $f<br>= $a + $b + " . ($e*$f) . "<br>= <strong>$ans</strong>";
            break;

        case 53:
            $question = "$a x ($b + $c) + " . ($d*$e) . " / $e - $f = ?";
            $ans = $a*($b+$c) + $d - $f;
            $soln = "$a x ($b + $c) + " . ($d*$e) . " / $e - $f<br>= $a x " . ($b+$c) . " + $d - $f<br>= " . ($a*($b+$c)) . " + $d - $f<br>= <strong>$ans</strong>";
            break;

        case 54:
            $safety = 0;
            while (($b - $c) < 4 && $safety < 30) {
                $b = rand($numlimit1, $numlimit2);
                $c = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a x ($b - $c) + $d x ($e + $f) = ?";
            $ans = $a*($b-$c) + $d*($e+$f);
            $soln = "$a x ($b - $c) + $d x ($e + $f)<br>= $a x " . ($b-$c) . " + $d x " . ($e+$f) . "<br>= " . ($a*($b-$c)) . " + " . ($d*($e+$f)) . "<br>= <strong>$ans</strong>";
            break;

        case 55:
            $safety = 0;
            while (($a-$b) < 5 && $safety < 30) {
                $a = rand($numlimit1, $numlimit2); $b = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $safety = 0;
            while (($c-$d) < 5 && $safety < 30) {
                $c = rand($numlimit1, $numlimit2); $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "($a - $b) x ($c - $d) + " . ($e*$f) . " / $f = ?";
            $ans = ($a-$b)*($c-$d) + $e;
            $soln = "($a - $b) x ($c - $d) + " . ($e*$f) . " / $f<br>= " . ($a-$b) . " x " . ($c-$d) . " + $e<br>= " . (($a-$b)*($c-$d)) . " + $e<br>= <strong>$ans</strong>";
            break;

        case 56:
            $safety = 0;
            while ($c <= ($d+1) && $safety < 30) {
                $c = rand($numlimit1, $numlimit2); $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $safety = 0;
            while ($e <= ($f+1) && $safety < 30) {
                $e = rand($numlimit1, $numlimit2); $f = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = "$a + " . ($b*($c-$d)) . " / " . ($c-$d) . " + $c x ($e - $f) = ?";
            $ans = $a + $b + $c*($e-$f);
            $soln = "$a + " . ($b*($c-$d)) . " / " . ($c-$d) . " + $c x ($e - $f)<br>= $a + $b + $c x " . ($e-$f) . "<br>= $a + $b + " . ($c*($e-$f)) . "<br>= <strong>$ans</strong>";
            break;

        case 57:
            $question = ($b*($c+$d)) . " / " . ($c+$d) . " + (" . ($e+$f) . ") x $c - $a = ?";
            $ans = $b + ($e+$f)*$c - $a;
            $soln = ($b*($c+$d)) . " / " . ($c+$d) . " + (" . ($e+$f) . ") x $c - $a<br>= $b + (" . ($e+$f) . ") x $c - $a<br>= $b + " . (($e+$f)*$c) . " - $a<br>= <strong>$ans</strong>";
            break;

        case 58:
            $safety = 0;
            while ($d <= ($a+1) && $safety < 30) {
                $d = rand($numlimit1, $numlimit2); $a = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $safety = 0;
            while ($e <= ($f+1) && $safety < 30) {
                $e = rand($numlimit1, $numlimit2); $f = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $question = ($b*$c) . " / $c x ($e + $f) - (" . ($d*$a) . " / $a + $b) = ?";
            $ans = $b*($e+$f) - ($d+$b);
            $soln = ($b*$c) . " / $c x ($e + $f) - (" . ($d*$a) . " / $a + $b)<br>= $b x (" . ($e+$f) . ") - ($d + $b)<br>= " . ($b*($e+$f)) . " - " . ($d+$b) . "<br>= <strong>$ans</strong>";
            break;

        default:  // case 59
            $safety = 0;
            while ((($c-$d) < 2 || ($c-$d) > 6) && $safety < 30) {
                $c = rand($numlimit1, $numlimit2); $d = rand($numlimit1, $numlimit2);
                $safety++;
            }
            $g = rand(2, 3);
            $question = "$b x ($c - $d)^$g - $a x $e + $f = ?";
            $ans = $b*pow($c-$d, $g) - $a*$e + $f;
            $powVal = pow($c-$d, $g);
            $soln = "$b x ($c - $d)^$g - $a x $e + $f<br>= $b x " . ($c-$d) . "^$g - " . ($a*$e) . " + $f<br>= $b x $powVal - " . ($a*$e) . " + $f<br>= " . ($b*$powVal) . " - " . ($a*$e) . " + $f<br>= <strong>$ans</strong>";
            break;
    }

    $ansCanon    = canon_pemdas($ans);
    $distractors = make_pemdas_distractors($ans, 3);
    $choices     = array_merge([$ansCanon], $distractors);
    $choices     = array_values(array_unique($choices));
    $d = 1;
    while (count($choices) < 4) {
        foreach ([$ans + $d, $ans - $d] as $cv) {
            $cs = canon_pemdas($cv);
            if (!in_array($cs, $choices)) {
                $choices[] = $cs;
                if (count($choices) >= 4) break 2;
            }
        }
        $d++;
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'question'  => $question,
        'ans'       => $ans,
        'ans_canon' => $ansCanon,
        'soln'      => $soln,
        'choices'   => $choices,
        'lvl'       => $lvl,
    ];
    $q = $_SESSION[$sessionKey]['current'];
}

// ============================================================
// RENDER
// ============================================================
$theme = [
    'top_banner'    => $base . '/math/images/images/paper-69-top.jpg',
    'title_bg'      => $base . '/math/images/images/paper-69-top2.jpg',
    'left_side'     => $base . '/math/images/images/paper-69-left.jpg',
    'right_side'    => $base . '/math/images/images/paper-69-right.jpg',
    'content_bg'    => $base . '/math/images/images/paper-69-content.jpg',
    'bottom_banner' => $base . '/math/images/images/paper-69-bottom.jpg',
    'score_top'     => $base . '/math/images/score-top-1.jpg',
    'score_bottom'  => $base . '/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' : Grade ' . $grd . ' - ' . $lvl, $theme);
?>
<div style="padding: 0 10px; text-align: center;">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php if ($result !== null): ?>
    <?php $cur = $result['cur']; ?>
    <p style="font-size:14pt; color:#666; margin-top:20px;">
        Your answer: <strong style="color:#0000CC; font-size:16pt;"><?php echo htmlspecialchars($result['clicked']); ?></strong>
    </p>
    <p style="font-size:16pt; font-weight:700; color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;">
        <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
    </p>

    <p style="font-size:14pt; font-weight:700; color:#800080; margin-top:20px;">
        Expression: <span style="color:#CC0066;"><?php echo $cur['question']; ?></span>
    </p>

    <p style="font-size:13pt; font-weight:700; color:#800080; margin-top:20px;">Solution:</p>
    <div class="statement" style="font-size:14pt; color:#800080; line-height:1.7; text-align:center; max-width:520px;">
        <?php echo $cur['soln']; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
<?php else: ?>
    <p style="font-size:13pt; font-weight:600; color:#800080; margin-top:20px;">
        Apply the PEMDAS rules to evaluate:
    </p>
    <p style="font-size:20pt; font-weight:700; color:#CC0066; margin:15px 0; line-height:1.4;">
        <?php echo $q['question']; ?>
    </p>

    <p style="font-size:13pt; font-weight:500; color:#444; margin-top:20px;">
        Click on your answer.
    </p>

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px 30px; max-width:400px; margin:20px auto;">
        <?php foreach ($q['choices'] as $c): ?>
            <a href="?ansclick=<?php echo urlencode($c); ?>"
               class="choice-btn"
               style="width:100%; white-space:normal; padding:15px 20px; box-sizing:border-box; font-size:1.4rem;">
                <?php echo htmlspecialchars($c); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:20px;">
        <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
    </div>
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