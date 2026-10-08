<?php
/**
 * lib/router.php — Three-tier router with robust priority rules.
 *
 * Tier 1: Priority regex rules    — instant, for known conversational phrases
 * Tier 2: Specificity-weighted    — for distinctive keywords
 * Tier 3: (handled by caller)     — Laya semantic fallback
 *
 * Public: keyword_route($question, $taxonomy): ?string
 */

function keyword_route(string $question, array $taxonomy): ?string
{
    // ---------- Tier 1: priority rules ----------
    $priority = priority_route($question);
    if ($priority !== null) return $priority;

    // ---------- Tier 2: keyword scoring ----------
    $index = build_phrase_index($taxonomy);
    if (empty($index)) return null;

    $qClean = mb_strtolower(preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $question));
    $qWords = preg_split('/\s+/', trim($qClean), -1, PREG_SPLIT_NO_EMPTY);

    $qSet = [];
    foreach ($qWords as $w) {
        $n = normalize_match_word($w);
        if ($n !== '' && !is_stop_word($n)) $qSet[$n] = true;
    }

    if (empty($qSet)) return null;

    $scores = [];
    $uniqueMatches = [];

    foreach ($index as $phrase => $topicKeys) {
        $ratio = phrase_match_score($phrase, $qSet);
        if ($ratio <= 0) continue;

        $topicCount = count($topicKeys);
        $weight = mb_strlen($phrase) * $ratio / max(1, $topicCount);

        foreach ($topicKeys as $tk) {
            $scores[$tk] = ($scores[$tk] ?? 0) + $weight;
        }

        $pWords = preg_split('/\s+/', trim($phrase), -1, PREG_SPLIT_NO_EMPTY);
        $pContent = [];
        foreach ($pWords as $pw) {
            $n = normalize_match_word($pw);
            if ($n !== '' && !is_stop_word($n)) $pContent[] = $n;
        }

        if (count($pContent) === 1
            && count($topicKeys) === 1
            && $ratio >= 1.0
            && mb_strlen($pContent[0]) >= 5) {
            $uniqueMatches[$topicKeys[0]] = true;
        }
    }

    if (empty($scores)) return null;

    if (count($uniqueMatches) === 1) {
        return array_key_first($uniqueMatches);
    }

    arsort($scores);
    $keys = array_keys($scores);
    $top = $keys[0];
    $topScore = $scores[$top];
    $secondScore = $scores[$keys[1] ?? $top] ?? 0;

    if ($topScore < 6) return null;
    if ($secondScore > 0 && ($topScore / $secondScore) < 1.5) return null;

    return $top;
}

/* ============================================================
 *  Tier 1 — Priority rules
 * ============================================================ */

function priority_route(string $question): ?string
{
    $q = normalize_question($question);

    static $rules = null;
    if ($rules === null) {
        $rules = [
            // ============ EMOTIONAL STATE (very specific, high signal) ============
            ['/\bi am sad\b|\bi feel sad\b|\bi am unhappy\b|\bfeeling sad\b|\bfeeling down\b/i', 'child_sad'],
            ['/\bi am crying\b|\bi am upset\b|\bi feel bad\b|\bi am miserable\b|\bi am heartbroken\b/i', 'child_sad'],

            ['/\bi am happy\b|\bi am excited\b|\bi feel happy\b|\bfeeling happy\b|\bi feel great\b|\bi feel good\b/i', 'child_happy'],
            ['/\bbest day ever\b|\bi am so happy\b|\bthis is the best\b|\bi am so excited\b/i', 'child_happy'],

            ['/\bi am scared\b|\bi am afraid\b|\bi am frightened\b|\bi am nervous\b|\bi am worried\b/i', 'child_scared'],
            ['/\bfeeling scared\b|\bfeel scared\b|\bfeeling afraid\b|\bfeel afraid\b|\bi am terrified\b/i', 'child_scared'],

            ['/\bi am bored\b|\bnothing to do\b|\bthis is boring\b|\bi am tired of this\b|\bso boring\b/i', 'child_bored'],

            ['/\bi am angry\b|\bi am mad\b|\bi am frustrated\b|\bi hate this\b|\bi am so mad\b/i', 'child_angry'],

            ['/\bi am lonely\b|\bi have no friends\b|\bnobody likes me\b|\bi am all alone\b|\bi feel alone\b/i', 'child_lonely'],

            // ============ POLITENESS ============
            ['/\bthank you\b|\bthanks\b|\bthank u\b|\bthx\b|\bthanks a lot\b|\bthanks so much\b/i', 'thanks'],

            ['/\bi am sorry\b|\bsorry\b|\bmy bad\b|\bapologize\b|\bforgive me\b|\bi apologize\b/i', 'apology'],

            ['/\byou are (nice|cute|funny|smart|great|awesome|amazing|cool|the best|so cool|so cute)\b/i', 'compliment'],
            ['/\bi like you\b|\bi love you\b|\bgood robot\b|\bbest robot\b|\byou are my favorite\b/i', 'compliment'],

            ['/\byou are (dumb|stupid|boring|ugly|bad)\b|\bi hate you\b|\bbad robot\b|\bi do not like you\b/i', 'insult'],

            // ============ SPECIFIC QUESTION SHAPES ============
            ['/\bdo you love me\b|\bdo you like me\b|\bdo you care about me\b/i', 'love_question'],
            ['/\bdo you dream\b|\bdo you sleep\b|\bdo you have dreams\b/i', 'dream_question'],
            ['/\bdo you have friends\b|\bare we friends\b|\bwill you be my friend\b/i', 'friend_question'],
            ['/\bdo you eat\b|\byour favorite food\b|\bwhat do you eat\b/i', 'favorite_food'],
            ['/\byour favorite color\b|\bwhat color do you like\b/i', 'favorite_color'],

            // ============ FUN REQUESTS ============
            ['/\bjoke\b|\bmake me laugh\b|\bsomething funny\b|\bfunny thing\b|\bcrack me up\b|\bgot any jokes\b/i', 'joke_request'],
            ['/\bstory\b|\bstories\b|\btell me a tale\b|\bonce upon a time\b/i', 'story_request'],
            ['/\bsing\b|\bsong\b|\bmusic\b|\blullaby\b|\bsing me\b/i', 'song_request'],
            ['/\briddle\b|\bpuzzle\b|\bbrain teaser\b/i', 'riddle_request'],
            ['/\bplay a game\b|\bplay with me\b|\blet us play\b|\bwant to play\b|\bplay something\b/i', 'game_request'],
            ['/\bfun fact\b|\btell me something cool\b|\btell me something interesting\b|\bdid you know\b/i', 'fact_request'],

            // ============ IDENTITY ============
            ['/\byour name\b|\bwho are you\b|\bwhat are you called\b|\bwhat is your name\b/i', 'name_question'],
            ['/\bhow old are you\b|\byour age\b|\bwhen were you born\b/i', 'age_question'],
            ['/\bare you (a )?robot\b|\bare you (a )?machine\b|\bare you (a )?computer\b|\bare you real\b|\bare you alive\b/i', 'robot_question'],
            ['/\bwhere (do|are) you (live|from|stay)\b|\byour home\b|\bwhere is your home\b/i', 'home_question'],
            ['/\bwhat can you do\b|\bwhat are you good at\b|\bcan you do tricks\b|\bwhat do you know\b/i', 'abilities_question'],

            // ============ ABOUT THE CHILD ============
            ['/\bmy name is\b|\bcall me\b/i', 'child_name'],
            ['/\bmy (mom|dad|mother|father|sister|brother|family|grandma|grandpa|grandmother|grandfather|aunt|uncle|cousin)\b/i', 'child_family'],
            ['/\bmy (dog|cat|pet|fish|bird|hamster|rabbit|puppy|kitten)\b/i', 'child_pet'],
            ['/\bmy (school|teacher|class|classmates)\b|\bhomework\b/i', 'child_school'],
            ['/\bmy favorite\b|\bi like\b|\bi enjoy\b|\bi love\b/i', 'child_favorites'],

            // ============ META ============
            ['/\bsay (it|that) again\b|\brepeat that\b|\bwhat did you say\b|\bcome again\b/i', 'repeat_request'],
            ['/\bi do not understand\b|\bwhat do you mean\b|\bi do not get it\b|\bthat does not make sense\b/i', 'confusion'],
            ['/\bstop talking\b|\bbe quiet\b|\bshush\b|\bhush\b|\bthat is enough\b|\bstop it\b/i', 'stop_request'],

            // ============ GREETINGS (specific &#8594; broad) ============
            ['/\bhow are you\b|\bhow are you doing\b|\bhow you doing\b|\bhow are things\b|\bhow do you do\b|\bhow goes it\b/i', 'how_are_you'],
            ['/\bhow is it going\b|\bhow is your day\b|\bwhat is up\b|\bwhats up\b|\byou okay\b|\byou ok\b|\bare you okay\b|\bare you ok\b/i', 'how_are_you'],

            ['/\bgood morning\b|\bmorning\b/i', 'good_morning'],
            ['/\bgood night\b|\bnight night\b|\bbedtime\b|\bsleep well\b|\bsweet dreams\b/i', 'good_night'],
            ['/\bgood evening\b|\bgood afternoon\b/i', 'hello'],

            ['/\bsee you later\b|\bsee you soon\b|\bsee ya\b|\bsee you\b|\btalk to you later\b|\bgotta go\b|\btake care\b/i', 'goodbye'],
            ['/\bbye bye\b|\bgoodbye\b|\bbye\b|\bfarewell\b|\badios\b/i', 'goodbye'],

            ['/\bhi there\b|\bhello there\b|\bhey there\b/i', 'hello'],
            ['/\bhi\b|\bhello\b|\bhey\b|\bhiya\b|\bhowdy\b|\bgreetings\b|\byo\b/i', 'hello'],
        ];
    }

    foreach ($rules as $pair) {
        if (preg_match($pair[0], $q)) {
            error_log("[router] priority: '$q' matched '{$pair[0]}' => {$pair[1]}");
            return $pair[1];
        }
    }

    return null;
}

/**
 * Normalize a question for priority matching:
 *   - lowercase
 *   - expand contractions
 *   - collapse repeated letters (hiiii &#8594; hi)
 *   - strip punctuation except apostrophes
 *   - collapse whitespace
 *   - pad with spaces for word boundaries
 */
function normalize_question(string $q): string
{
    $q = mb_strtolower($q);
    $q = expand_contractions($q);
    $q = preg_replace('/(.)\1{2,}/u', '$1', $q); // collapse "hiiii" &#8594; "hi"
    $q = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $q);
    $q = preg_replace('/\s+/', ' ', $q);
    $q = trim($q);
    return ' ' . $q . ' ';
}

/**
 * Expand common contractions so a single rule catches all forms.
 */
function expand_contractions(string $q): string
{
    static $map = [
        "i'm"       => 'i am',
        "you're"    => 'you are',
        "we're"     => 'we are',
        "they're"   => 'they are',
        "it's"      => 'it is',
        "that's"    => 'that is',
        "what's"    => 'what is',
        "who's"     => 'who is',
        "how's"     => 'how is',
        "where's"   => 'where is',
        "when's"    => 'when is',
        "why's"     => 'why is',
        "there's"   => 'there is',
        "here's"    => 'here is',
        "let's"     => 'let us',
        "don't"     => 'do not',
        "doesn't"   => 'does not',
        "didn't"    => 'did not',
        "can't"     => 'cannot',
        "won't"     => 'will not',
        "isn't"     => 'is not',
        "aren't"    => 'are not',
        "wasn't"    => 'was not',
        "weren't"   => 'were not',
        "haven't"   => 'have not',
        "hasn't"    => 'has not',
        "hadn't"    => 'had not',
        "wouldn't"  => 'would not',
        "shouldn't" => 'should not',
        "couldn't"  => 'could not',
        "i've"      => 'i have',
        "you've"    => 'you have',
        "we've"     => 'we have',
        "they've"   => 'they have',
        "i'd"       => 'i would',
        "you'd"     => 'you would',
        "i'll"      => 'i will',
        "you'll"    => 'you will',
        "we'll"     => 'we will',
        "gonna"     => 'going to',
        "wanna"     => 'want to',
        "gotta"     => 'got to',
    ];

    foreach ($map as $from => $to) {
        $q = preg_replace('/\b' . preg_quote($from, '/') . '\b/u', $to, $q);
    }

    // Text-speak
    $q = preg_replace('/\bu\b/u', 'you', $q);
    $q = preg_replace('/\bur\b/u', 'your', $q);
    $q = preg_replace('/\br\b/u', 'are', $q);
    $q = preg_replace('/\bya\b/u', 'you', $q);
    $q = preg_replace('/\bpls\b|\bplz\b/u', 'please', $q);
    $q = preg_replace('/\bthx\b/u', 'thanks', $q);

    return $q;
}

/* ============================================================
 *  Tier 2 — specificity-weighted scoring
 * ============================================================ */

function phrase_match_score(string $phrase, array $qSet): float
{
    $rawWords = preg_split('/\s+/', trim($phrase), -1, PREG_SPLIT_NO_EMPTY);
    $pWords = [];
    foreach ($rawWords as $w) {
        $n = normalize_match_word($w);
        if ($n !== '' && !is_stop_word($n)) $pWords[] = $n;
    }
    $total = count($pWords);
    if ($total === 0) return 0.0;
    if ($total === 1) return isset($qSet[$pWords[0]]) ? 1.0 : 0.0;

    $matched = 0;
    foreach ($pWords as $pw) if (isset($qSet[$pw])) $matched++;
    $missing = $total - $matched;

    if ($missing === 0) return 1.0;
    if ($missing === 1 && $total >= 3) return 0.7;
    if ($missing === 2 && $total >= 5) return 0.5;
    return 0.0;
}

function normalize_match_word(string $w): string
{
    $w = mb_strtolower(trim($w));
    $len = mb_strlen($w);
    if ($len > 3 && mb_substr($w, -1) === 's') {
        return mb_substr($w, 0, $len - 1);
    }
    return $w;
}

function is_stop_word(string $w): bool
{
    static $stop = [
        'what'=>1,'who'=>1,'whom'=>1,'whose'=>1,'which'=>1,'when'=>1,'where'=>1,'why'=>1,'how'=>1,
        'is'=>1,'are'=>1,'was'=>1,'were'=>1,'be'=>1,'been'=>1,'being'=>1,'am'=>1,
        'that'=>1,'this'=>1,'these'=>1,'those'=>1,'the'=>1,'a'=>1,'an'=>1,
        'of'=>1,'in'=>1,'on'=>1,'at'=>1,'to'=>1,'for'=>1,'from'=>1,'with'=>1,'by'=>1,
        'into'=>1,'about'=>1,'than'=>1,'then'=>1,'over'=>1,'under'=>1,'between'=>1,'through'=>1,
        'and'=>1,'or'=>1,'but'=>1,'if'=>1,'as'=>1,'so'=>1,'because'=>1,'while'=>1,
        'do'=>1,'does'=>1,'did'=>1,'have'=>1,'has'=>1,'had'=>1,
        'can'=>1,'could'=>1,'will'=>1,'would'=>1,'should'=>1,'may'=>1,'might'=>1,'must'=>1,
        'it'=>1,'its'=>1,'they'=>1,'them'=>1,'their'=>1,'there'=>1,'here'=>1,
        'he'=>1,'she'=>1,'his'=>1,'her'=>1,'we'=>1,'us'=>1,'our'=>1,
        'you'=>1,'your'=>1,'i'=>1,'me'=>1,'my'=>1,'mine'=>1,
    ];
    return isset($stop[$w]);
}

function build_phrase_index(array $taxonomy): array
{
    static $cache = null;
    if ($cache !== null) return $cache;

    $phrases = [];
    foreach ($taxonomy['domains'] as $domain) {
        foreach ($domain['topics'] as $topicKey => $desc) {
            foreach (extract_phrases($desc) as $phrase) {
                if (!isset($phrases[$phrase])) $phrases[$phrase] = [];
                $phrases[$phrase][$topicKey] = true;
            }
        }
    }
    foreach ($phrases as $p => $set) $phrases[$p] = array_keys($set);
    $cache = $phrases;
    return $phrases;
}

function extract_phrases(string $desc): array
{
    $desc = mb_strtolower($desc);
    $out = [];
    foreach (preg_split('/[,;]+/', $desc) as $segment) {
        $segment = trim(preg_replace('/\s+/', ' ', $segment));
        if ($segment === '' || mb_strlen($segment) < 3) continue;
        $out[] = $segment;
        foreach (preg_split('/\s+/', $segment) as $word) {
            if (mb_strlen($word) >= 5) $out[] = $word;
        }
    }
    return array_unique($out);
}