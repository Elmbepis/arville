<?php
// math/modules/alg-eval-exp.php
// PROCEDURAL evaluating algebraic expressions. Bypass QEngine per §D.
// Converted from FIB to MCQ.
//
// Levels merged per §E:
//   Easy = legacy Easy (eqforms 1-5 or 1-8 depending on grade)
//   Hard = legacy Medium + legacy Hard merged (eqforms 6-17 or 9-18)
//
// §H bug fix: $grd was referenced but not guaranteed to be assigned by
// legacy pass-chk.php. Fixed: $_SESSION['grade'] ?? 5.
//
// Feedback shows a two-step solution:
//   Given: j=4, m=2, ...
//   (7j-9)(7m+13) = ((7)(4)-9)((7)(2)+13)
//   = 513
// The substitution string is built at generation time by wrapping coefficients
// in parens and replacing variables with their values, preserving any <sup>
// exponent attached to the variable.
//
// Theme: test56-* (121/547/117) &#8594; paper-69-* per §C fit test.
// Score box: score-*-1.
// DB row required: modules.url = 'alg-eval-exp.php'

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

$moduleTitle = 'Evaluating Algebraic Expressions';
$moduleId    = basename(__FILE__);
$sessionKey  = 'mod_' . md5($moduleId);
$levels      = ['Easy', 'Hard'];
$grd         = min(9, max(1, (int)($_SESSION['grade'] ?? 5)));  // §H fix

if (isset($_POST['level'])) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level']) || !in_array($_SESSION['level'], $levels)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

function make_eval_distractors($ans, $n = 3) {
    $out  = [];
    $seen = [(string)(int)$ans => true];
    $band = max(2, abs($ans) * 0.15);
    $step = max(1, (int)round($band / 4));

    $candidates = [];
    foreach ([1, 2, 3, 4, 5, 8, 10] as $k) {
        $candidates[] = $ans + $k * $step;
        $candidates[] = $ans - $k * $step;
    }
    foreach ([0.03, 0.05, 0.08, 0.12] as $pct) {
        $candidates[] = (int)round($ans + $ans * $pct);
        $candidates[] = (int)round($ans - $ans * $pct);
    }

    shuffle($candidates);
    foreach ($candidates as $c) {
        if (abs($c - $ans) > $band) continue;
        if ($c == $ans) continue;
        $cs = (string)(int)$c;
        if (isset($seen[$cs])) continue;
        $seen[$cs] = true;
        $out[] = $cs;
        if (count($out) >= $n) return $out;
    }

    $d = 1;
    while (count($out) < $n && $d <= 100) {
        foreach ([$ans + $d, $ans - $d] as $c) {
            $cs = (string)(int)$c;
            if (isset($seen[$cs])) continue;
            $seen[$cs] = true;
            $out[] = $cs;
            if (count($out) >= $n) return $out;
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
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];

    $scorer    = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['answer'], $cur['lvl']);

    $result = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ============================================================
// GENERATE
// ============================================================
if ($result === null || isset($_POST['Submit2'])) {
    if ($grd <= 6) {
        if ($lvl === 'Easy') {
            $eqlim1 = 1;  $eqlim2 = 5;
            $n1 = 1; $n2 = 4;  $n3 = 1;  $n4 = 30;  $n5 = 1;  $n6 = 7;  $n7 = 1; $n8 = 4;
        } else {
            $eqlim1 = 6;  $eqlim2 = 17;
            $n1 = 3; $n2 = 9;  $n3 = 24; $n4 = 99;  $n5 = 4;  $n6 = 15; $n7 = 2; $n8 = 6;
        }
    } else {
        if ($lvl === 'Easy') {
            $eqlim1 = 1;  $eqlim2 = 8;
            $n1 = 1; $n2 = 6;  $n3 = 9;  $n4 = 40;  $n5 = 1;  $n6 = 7;  $n7 = 3; $n8 = 6;
        } else {
            $eqlim1 = 9;  $eqlim2 = 18;
            $n1 = 3; $n2 = 9;  $n3 = 24; $n4 = 149; $n5 = 4;  $n6 = 15; $n7 = 3; $n8 = 8;
        }
    }

    $coeff1 = rand($n1, $n2);
    $coeff2 = rand($n1, $n2);
    $coeff3 = rand($n1, $n2);
    $coeff4 = rand($n1, $n2);
    $coeff1a = ($coeff1 == 1) ? '' : $coeff1;
    $coeff2a = ($coeff2 == 1) ? '' : $coeff2;
    $coeff3a = ($coeff3 == 1) ? '' : $coeff3;
    $coeff4a = ($coeff4 == 1) ? '' : $coeff4;
    $const1 = rand($n3, $n4);
    $const2 = rand($n3, $n4);
    $const3 = rand($n5, $n6);
    $const4 = rand($n5, $n6);

    $banned = [108, 111];
    do { $v1 = rand(97, 122); } while (in_array($v1, $banned));
    do { $v2 = rand(97, 122); } while (in_array($v2, $banned) || $v2 === $v1);
    do { $v3 = rand(97, 122); } while (in_array($v3, $banned) || $v3 === $v2 || $v3 === $v1);
    do { $v4 = rand(97, 122); } while (in_array($v4, $banned) || $v4 === $v3 || $v4 === $v2 || $v4 === $v1);
    $var1 = chr($v1); $var2 = chr($v2); $var3 = chr($v3); $var4 = chr($v4);

    $value1 = rand($n7, $n8);
    $value2 = rand($n7, $n8);
    $value3 = rand($n7, $n8);
    $value4 = rand($n7, $n8);

    $given = "$var1=$value1, $var2=$value2, $var3=$value3, $var4=$value4";
    $eqform = rand($eqlim1, $eqlim2);

    if ($eqform == 1) {
        $exp1 = rand(2, 3);
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var1 . "<sup>$exp1</sup>+$const1";
            $ans = $coeff1 * pow($value1, $exp1) + $const1;
        } else {
            $question = $coeff1a . $var1 . "<sup>$exp1</sup>-$const1";
            $ans = $coeff1 * pow($value1, $exp1) - $const1;
        }
    } elseif ($eqform == 2) {
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var1 . "+" . $coeff2a . $var2 . "+$const1";
            $ans = $coeff1 * $value1 + $coeff2 * $value2 + $const1;
        } else {
            $question = $coeff1a . $var1 . "+" . $coeff2a . $var2 . "-$const1";
            $ans = $coeff1 * $value1 + $coeff2 * $value2 - $const1;
        }
    } elseif ($eqform == 3) {
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var1 . "<sup>2</sup>+" . $coeff2a . $var1 . "+$const1";
            $ans = $coeff1 * pow($value1, 2) + $coeff2 * $value1 + $const1;
        } else {
            $question = $coeff1a . $var2 . "<sup>2</sup>-" . $coeff2a . $var2 . "+$const1";
            $ans = $coeff1 * pow($value2, 2) - $coeff2 * $value2 + $const1;
        }
    } elseif ($eqform == 4) {
        if (rand(1, 2) == 1) {
            $question = "(" . $coeff1a . $var1 . "+" . $coeff2a . $var4 . ")<sup>2</sup>";
            $ans = pow($coeff1 * $value1 + $coeff2 * $value4, 2);
        } else {
            $question = "(" . $coeff1a . $var2 . "-" . $coeff2a . $var3 . ")<sup>2</sup>";
            $ans = pow($coeff1 * $value2 - $coeff2 * $value3, 2);
        }
    } elseif ($eqform == 5) {
        if (rand(1, 2) == 1) {
            $question = $coeff3a . $var3 . "(" . $coeff1a . $var1 . "+" . $coeff2a . $var2 . ")";
            $ans = $coeff3 * $value3 * ($coeff1 * $value1 + $coeff2 * $value2);
        } else {
            $question = $coeff2a . $var2 . "(" . $coeff3a . $var3 . "-" . $coeff4a . $var4 . ")";
            $ans = $coeff2 * $value2 * ($coeff3 * $value3 - $coeff4 * $value4);
        }
    } elseif ($eqform == 6) {
        $exp1 = rand(2, 3);
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var1 . "<sup>$exp1</sup>+" . $coeff2a . $var3 . "+$const1";
            $ans = $coeff1 * pow($value1, $exp1) + $coeff2 * $value3 + $const1;
        } else {
            $question = $coeff1a . $var2 . "<sup>$exp1</sup>+" . $coeff2a . $var4 . "+$const1";
            $ans = $coeff1 * pow($value2, $exp1) + $coeff2 * $value4 + $const1;
        }
    } elseif ($eqform == 7) {
        $exp1 = rand(2, 3);
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var1 . "<sup>$exp1</sup>-" . $coeff2a . $var3 . "+$const1";
            $ans = $coeff1 * pow($value1, $exp1) - $coeff2 * $value3 + $const1;
        } else {
            $question = $coeff1a . $var2 . "<sup>$exp1</sup>-" . $coeff2a . $var4 . "+$const1";
            $ans = $coeff1 * pow($value2, $exp1) - $coeff2 * $value4 + $const1;
        }
    } elseif ($eqform == 8) {
        $exp1 = rand(2, 3);
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var1 . "<sup>$exp1</sup>+" . $coeff2a . $var3 . "-$const1";
            $ans = $coeff1 * pow($value1, $exp1) + $coeff2 * $value3 - $const1;
        } else {
            $question = $coeff1a . $var2 . "<sup>$exp1</sup>+" . $coeff2a . $var4 . "-$const1";
            $ans = $coeff1 * pow($value2, $exp1) + $coeff2 * $value4 - $const1;
        }
    } elseif ($eqform == 9) {
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var2 . "+" . $coeff2a . $var3 . "+" . $coeff3a . $var4 . "+$const1";
            $ans = $coeff1 * $value2 + $coeff2 * $value3 + $coeff3 * $value4 + $const1;
        } else {
            $question = $coeff1a . $var1 . "+" . $coeff2a . $var2 . "+" . $coeff3a . $var3 . "+$const1";
            $ans = $coeff1 * $value1 + $coeff2 * $value2 + $coeff3 * $value3 + $const1;
        }
    } elseif ($eqform == 10) {
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var2 . "-" . $coeff2a . $var3 . "+" . $coeff3a . $var4 . "-$const1";
            $ans = $coeff1 * $value2 - $coeff2 * $value3 + $coeff3 * $value4 - $const1;
        } else {
            $question = $coeff1a . $var1 . "-" . $coeff2a . $var2 . "-" . $coeff3a . $var3 . "+$const1";
            $ans = $coeff1 * $value1 - $coeff2 * $value2 - $coeff3 * $value3 + $const1;
        }
    } elseif ($eqform == 11) {
        if (rand(1, 2) == 1) {
            $question = "(" . $coeff1a . $var2 . "+$const3)(" . $coeff3a . $var4 . "-$const4)";
            $ans = ($coeff1 * $value2 + $const3) * ($coeff3 * $value4 - $const4);
        } else {
            $question = "(" . $coeff1a . $var1 . "-$const3)(" . $coeff3a . $var3 . "+$const4)";
            $ans = ($coeff1 * $value1 - $const3) * ($coeff3 * $value3 + $const4);
        }
    } elseif ($eqform == 12) {
        $c1 = rand(2, 15);
        $k1 = rand(5, 15);
        if (rand(1, 2) == 1) {
            $question = "$c1(" . $coeff2a . $var2 . "+$k1)<sup>2</sup>";
            $base_inner = $coeff2 * $value2 + $k1;
        } else {
            $question = "$c1(" . $coeff2a . $var3 . "+$k1)<sup>2</sup>";
            $base_inner = $coeff2 * $value3 + $k1;
        }
        $ans = $c1 * pow($base_inner, 2);
    } elseif ($eqform == 13) {
        $mult = rand(2, 9);
        $c1 = rand(2, 9) * $mult;
        $k1 = rand(5, 15);
        if (rand(1, 2) == 1) {
            $question = "$c1(" . $coeff2a . $var2 . "+$k1)/$mult";
            $base_inner = $coeff2 * $value2 + $k1;
        } else {
            $question = "$c1(" . $coeff2a . $var4 . "+$k1)/$mult";
            $base_inner = $coeff2 * $value4 + $k1;
        }
        $ans = $c1 * $base_inner / $mult;
    } elseif ($eqform == 14) {
        if (rand(1, 2) == 1) {
            $question = "(" . $coeff1a . $var2 . "+" . $coeff2a . $var3 . ")<sup>2</sup>+" . $coeff3a . $var4 . "+$const1";
            $ans = pow($coeff1 * $value2 + $coeff2 * $value3, 2) + $coeff3 * $value4 + $const1;
        } else {
            $question = "(" . $coeff1a . $var2 . "-" . $coeff2a . $var1 . ")<sup>2</sup>+" . $coeff3a . $var4 . "-$const1";
            $ans = pow($coeff1 * $value2 - $coeff2 * $value1, 2) + $coeff3 * $value4 - $const1;
        }
    } elseif ($eqform == 15) {
        if (rand(1, 2) == 1) {
            $question = "(" . $coeff1a . $var2 . ")<sup>2</sup> + (" . $coeff2a . $var1 . ")<sup>2</sup> + $const1";
            $ans = pow($coeff1 * $value2, 2) + pow($coeff2 * $value1, 2) + $const1;
        } else {
            $question = "(" . $coeff1a . $var3 . ")<sup>2</sup> - (" . $coeff2a . $var4 . ")<sup>2</sup> + $const1";
            $ans = pow($coeff1 * $value3, 2) - pow($coeff2 * $value4, 2) + $const1;
        }
    } elseif ($eqform == 16) {
        $e1 = rand(2, 4); $e2 = rand(2, 4); $e3 = rand(2, 4);
        if (rand(1, 2) == 1) {
            $question = $coeff1a . $var2 . "<sup>$e1</sup>+" . $coeff2a . $var1 . "<sup>$e2</sup>+" . $coeff3a . $var4 . "<sup>$e3</sup>";
            $ans = $coeff1 * pow($value2, $e1) + $coeff2 * pow($value1, $e2) + $coeff3 * pow($value4, $e3);
        } else {
            $question = $coeff1a . $var1 . "<sup>$e1</sup>+" . $coeff2a . $var3 . "<sup>$e2</sup>-" . $coeff3a . $var4 . "<sup>$e3</sup>";
            $ans = $coeff1 * pow($value1, $e1) + $coeff2 * pow($value3, $e2) - $coeff3 * pow($value4, $e3);
        }
    } elseif ($eqform == 17) {
        $k1 = rand(5, 15);
        if (rand(1, 2) == 1) {
            $mult = rand(2, 9);
            $c1 = $mult * $coeff3 * $value3;
            $question = "$c1(" . $coeff2a . $var2 . "+" . $coeff4a . $var4 . "+$k1)/" . $coeff3a . $var3;
            $base_inner = $coeff2 * $value2 + $coeff4 * $value4 + $k1;
            $ans = $mult * $base_inner;
        } else {
            $mult = rand(2, 9);
            $c1 = $mult * $coeff4 * $value4;
            $question = "$c1(" . $coeff3a . $var3 . "-" . $coeff2a . $var2 . "+$k1)/" . $coeff4a . $var4;
            $base_inner = $coeff3 * $value3 - $coeff2 * $value2 + $k1;
            $ans = $mult * $base_inner;
        }
    } else {
        if (rand(1, 2) == 1) {
            $question = "(" . $coeff1a . $var2 . ")<sup>2</sup> + (" . $coeff2a . $var1 . ")<sup>2</sup> + (" . $coeff3a . $var4 . ")<sup>2</sup>";
            $ans = pow($coeff1 * $value2, 2) + pow($coeff2 * $value1, 2) + pow($coeff3 * $value4, 2);
        } else {
            $question = "(" . $coeff1a . $var3 . ")<sup>2</sup> - (" . $coeff2a . $var4 . ")<sup>2</sup> + (" . $coeff3a . $var1 . ")<sup>2</sup>";
            $ans = pow($coeff1 * $value3, 2) - pow($coeff2 * $value4, 2) + pow($coeff3 * $value1, 2);
        }
    }

    // ============================================================
    // Build substitution string — the intermediate solution step.
    // Pass 1: wrap coefficients (digits immediately before a letter) in parens.
    // Pass 2: substitute each variable with its value (in parens), preserving
    //         any attached <sup>N</sup> exponent.
    // Example: (7j-9)(7m+13) with j=4, m=2 &#8594;
    //          ((7)(4)-9)((7)(2)+13)
    // ============================================================
    $subStr = $question;
    // Pass 1: wrap coefficients
    $subStr = preg_replace('/(\d+)(?=[a-z])/', '($1)', $subStr);
    // Pass 2: substitute variables (with optional <sup> exponent preserved)
    $varMap = [];
    if (!empty($var1)) $varMap[$var1] = $value1;
    if (!empty($var2)) $varMap[$var2] = $value2;
    if (!empty($var3)) $varMap[$var3] = $value3;
    if (!empty($var4)) $varMap[$var4] = $value4;
    foreach ($varMap as $letter => $val) {
        $subStr = preg_replace(
            '/(?<![a-z])(' . preg_quote($letter, '/') . ')(<sup>\d+<\/sup>)?(?![a-z])/',
            '(' . $val . '$2)',
            $subStr
        );
    }

    $answerStr = (string)(int)$ans;
    $distractors = make_eval_distractors($ans, 3);
    $allChoices = array_merge([$answerStr], $distractors);
    $allChoices = array_values(array_unique($allChoices));
    $pad = 1;
    while (count($allChoices) < 4 && $pad <= 50) {
        foreach ([$ans + $pad, $ans - $pad] as $c) {
            $cs = (string)(int)$c;
            if (!in_array($cs, $allChoices, true)) {
                $allChoices[] = $cs;
                if (count($allChoices) >= 4) break 2;
            }
        }
        $pad++;
    }
    shuffle($allChoices);

    $_SESSION[$sessionKey]['current'] = [
        'given'       => $given,
        'expr'        => $question,
        'substituted' => $subStr,
        'answer'      => $answerStr,
        'choices'     => $allChoices,
        'lvl'         => $lvl,
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
render_header($moduleTitle . ' - ' . $lvl, $moduleTitle . ' - ' . $lvl, $theme);
?>
<style>
  .hl-num { color:#CC0066; font-weight:700; }
  .choice-grid-2x2 {
    display: grid;
    grid-template-columns: auto auto;
    gap: 12px 24px;
    justify-content: center;
    margin: 20px auto;
  }
  .choice-grid-2x2 > div { display: contents; }
  sup { font-size: 0.7em; vertical-align: super; line-height: 0; }
</style>
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
    <p style="font-size:15pt; color:#333; margin-top:24px; max-width:660px; margin-left:auto; margin-right:auto; line-height:1.7;">
        Given: <?php echo htmlspecialchars($cur['given']); ?>.<br>
        <?php echo $cur['expr']; ?> = <?php echo $cur['substituted']; ?><br>
        = <strong style="color:#CC0066; font-size:16pt;"><?php echo htmlspecialchars($cur['answer']); ?></strong>
    </p>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
<?php else: ?>
    <p style="font-size:15pt; color:#333; margin-top:30px;">
        Given: <strong><?php echo htmlspecialchars($q['given']); ?></strong>.
    </p>
    <p style="font-size:17pt; font-weight:700; color:#800080; margin-top:14px;">
        Evaluate:&nbsp;&nbsp;<span style="color:#CC0066; font-size:20pt;"><?php echo $q['expr']; ?></span>
    </p>
    <p style="font-size:13pt; color:#444; margin-top:20px;">Click on your answer.</p>
    <?php
        $maxLen = 0;
        foreach ($q['choices'] as $c) $maxLen = max($maxLen, strlen($c));
        $use2x2 = ($maxLen >= 5 && $maxLen <= 20);
    ?>
    <?php if ($use2x2): ?>
        <div class="choice-grid-2x2">
            <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
        </div>
    <?php else: ?>
        <?php render_choices($q['choices'], 'ansclick', 'raw'); ?>
    <?php endif; ?>
    <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;">
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