<?php
/**
 * lib/router.php — Question-pattern router.
 *
 * Each topic in responses/<topic>/ has a questions.txt file with one
 * pattern per line. The router loads all patterns, sorts by specificity
 * (longest first), and returns the first topic whose pattern matches.
 *
 * If no pattern matches, returns null so the caller falls back to Laya.
 *
 * Matching rules (after normalization on both sides):
 *   - Exact match
 *   - Substring match (pattern appears as a phrase)
 *   - Word-set match (all pattern words present, any order)
 *
 * Longest pattern wins — "are you bored" beats "bored", so robot_state
 * and child_state never collide.
 */

function keyword_route(string $question, string $baseDir): ?string
{
    static $patterns = null;
    if ($patterns === null) {
        $patterns = load_all_patterns($baseDir);
    }
    if (empty($patterns)) return null;

    $qNorm = normalize_for_match($question);
    if ($qNorm === '') return null;

    foreach ($patterns as $p) {
        if (pattern_matches($qNorm, $p['pattern'])) {
            error_log("[router] '{$question}' matched '{$p['pattern']}' => {$p['topic']}");
            return $p['topic'];
        }
    }

    return null;
}

function load_all_patterns(string $baseDir): array
{
    $baseDir = rtrim($baseDir, '/');
    $out = [];
    if (!is_dir($baseDir)) return $out;

    foreach (scandir($baseDir) as $topic) {
        if ($topic === '.' || $topic === '..') continue;
        $topicDir = $baseDir . '/' . $topic;
        if (!is_dir($topicDir)) continue;

        $qfile = $topicDir . '/questions.txt';
        if (!is_file($qfile)) continue;

        foreach (file($qfile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#') continue;
            $norm = normalize_for_match($line);
            if ($norm === '') continue;
            $out[] = ['topic' => $topic, 'pattern' => $norm];
        }
    }

    // Sort by word count (longest first) for specificity
    usort($out, function ($a, $b) {
        $wa = substr_count($a['pattern'], ' ') + 1;
        $wb = substr_count($b['pattern'], ' ') + 1;
        if ($wa !== $wb) return $wb - $wa;
        return strlen($b['pattern']) - strlen($a['pattern']);
    });

    return $out;
}

function pattern_matches(string $qNorm, string $pNorm): bool
{
    if ($pNorm === '') return false;

    // Exact
    if ($qNorm === $pNorm) return true;

    $qWords = explode(' ', $qNorm);
    $pWords = explode(' ', $pNorm);
    $pCount = count($pWords);

    // Single-word patterns: exact word match only
    if ($pCount === 1) {
        return in_array($pWords[0], $qWords, true);
    }

    // Multi-word: substring match (pattern appears as a phrase)
    if (strpos($qNorm, $pNorm) !== false) return true;

    // Multi-word: all pattern words present (any order)
    $qWordSet = array_flip($qWords);
    foreach ($pWords as $w) {
        if (!isset($qWordSet[$w])) return false;
    }
    return true;
}

function normalize_for_match(string $q): string
{
    $q = mb_strtolower($q);
    $q = expand_contractions($q);
    $q = preg_replace('/(.)\1{2,}/u', '$1', $q);   // hiiii &#8594; hi
    $q = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $q);
    $q = preg_replace('/\s+/', ' ', $q);
    return trim($q);
}

function expand_contractions(string $q): string
{
    static $map = [
        "i'm"=>'i am', "you're"=>'you are', "we're"=>'we are',
        "they're"=>'they are', "it's"=>'it is', "that's"=>'that is',
        "what's"=>'what is', "who's"=>'who is', "how's"=>'how is',
        "where's"=>'where is', "when's"=>'when is', "why's"=>'why is',
        "there's"=>'there is', "here's"=>'here is', "let's"=>'let us',
        "don't"=>'do not', "doesn't"=>'does not', "didn't"=>'did not',
        "can't"=>'cannot', "won't"=>'will not', "isn't"=>'is not',
        "aren't"=>'are not', "wasn't"=>'was not', "weren't"=>'were not',
        "haven't"=>'have not', "hasn't"=>'has not', "hadn't"=>'had not',
        "wouldn't"=>'would not', "shouldn't"=>'should not', "couldn't"=>'could not',
        "i've"=>'i have', "you've"=>'you have', "we've"=>'we have', "they've"=>'they have',
        "i'd"=>'i would', "you'd"=>'you would',
        "i'll"=>'i will', "you'll"=>'you will', "we'll"=>'we will',
        "gonna"=>'going to', "wanna"=>'want to', "gotta"=>'got to',
    ];
    foreach ($map as $from => $to) {
        $q = preg_replace('/\b' . preg_quote($from, '/') . '\b/u', $to, $q);
    }
    $q = preg_replace('/\bu\b/u', 'you', $q);
    $q = preg_replace('/\bur\b/u', 'your', $q);
    $q = preg_replace('/\br\b/u', 'are', $q);
    $q = preg_replace('/\bya\b/u', 'you', $q);
    $q = preg_replace('/\bpls\b|\bplz\b/u', 'please', $q);
    $q = preg_replace('/\bthx\b/u', 'thanks', $q);
    return $q;
}