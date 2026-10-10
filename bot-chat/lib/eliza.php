<?php
/**
 * lib/eliza.php — ELIZA-style fallback responses for bot-chat.
 *
 * Order of matching (most specific &#8594; most general):
 *   1. Preference questions    (do you like X?)
 *   2. Desire questions        (do you want X?)
 *   3. Possession questions    (do you have X?)
 *   4. Knowledge questions     (do you know X?)
 *   5. Feeling statements      (X makes me happy/sad/etc.)
 *   6. Feeling questions       (does X make you happy?)
 *   7. Action questions        (can you X?, do you <verb>?)
 *   8. Self-reflections        (I like X, I have X, I want X, ...)
 *   9. Unknown question        (why/what/how...)
 *  10. Generic fallback
 *
 * The bot never interprets the object — it only reflects it and
 * chooses a response template based on the FEELING's polarity.
 */

function eliza_response(string $input): ?string
{
    $text = trim($input);
    if ($text === '') return null;

    $lower = mb_strtolower($text);
    $lower = preg_replace('/[^\p{L}\p{N}\s\']/u', ' ', $lower);
    $lower = preg_replace('/\s+/', ' ', trim($lower));

    if (mb_strlen($text) > 200) {
        return pick_from([
            "Wow, that's a lot to think about! Can you tell me in a shorter way?",
            "That was a lot of words! My little robot brain needs a moment. Can you say it again?",
            "You said so much! I love it, but could you say just a little less?",
        ]);
    }

    /* =========================================================
     *  1. PREFERENCE QUESTIONS — do you like/love/enjoy X?
     * ========================================================= */
    if (preg_match('/^do you (?:like|love|enjoy|prefer) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "I like $thing because you like it! Do you like it a lot?",
            "Ooh, $thing? I've never tried it, but I bet it's wonderful if you like it!",
            "$thing! Hmm, I think I'd like that! What do you like about it?",
            "I'm a robot — I don't eat or drink. But if I could, I'd like $thing!",
            "That's a good question! What do YOU think about $thing?",
            "I like whatever makes you happy! Is $thing one of them?",
        ]);
    }

    /* =========================================================
     *  2. DESIRE QUESTIONS — do you want X?
     * ========================================================= */
    if (preg_match('/^do you (?:want|wish for|need) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Hmm, I don't need $thing, but I'd love to see yours!",
            "$thing? I want whatever you want, friend!",
            "I'm pretty happy with what I have! What about you?",
            "Maybe! Tell me why you like $thing!",
        ]);
    }

    /* =========================================================
     *  3. POSSESSION QUESTIONS — do you have X?
     * ========================================================= */
    if (preg_match('/^do you have (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "No, I don't have $thing. But I have you as a friend!",
            "I don't have $thing — I'm a little robot, after all! Do you?",
            "$thing? Hmm, no. What else do you have?",
            "Not yet! Maybe one day. Tell me about yours!",
        ]);
    }

    /* =========================================================
     *  4. KNOWLEDGE QUESTIONS — do you know X?
     * ========================================================= */
    if (preg_match('/^do you know (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "I'm still learning! Tell me about $thing!",
            "$thing? I know a little! What do you know?",
            "I don't know everything, but I'm curious! Tell me more!",
            "Maybe! Ask me something else about it!",
        ]);
    }

    /* =========================================================
     *  5. FEELING STATEMENTS — [object] makes me [feeling]
     * ========================================================= */
    if (preg_match('/^(.{2,50}?) makes? me (?:feel |feeling )?(.+)$/', $lower, $m)) {
        $object  = clean_thing($m[1], $text);
        $feeling = clean_thing($m[2], $text);
        if ($object && $feeling) {
            return respond_to_feeling($object, $feeling, 'child');
        }
    }

    /* =========================================================
     *  6. FEELING QUESTIONS — does [object] make you [feeling]?
     * ========================================================= */
    if (preg_match('/^(?:does )?(.{2,50}?) makes? you (?:feel |feeling )?(.+)$/', $lower, $m)) {
        $object  = clean_thing($m[1], $text);
        $feeling = clean_thing($m[2], $text);
        if ($object && $feeling) {
            return respond_to_feeling($object, $feeling, 'robot');
        }
    }

    /* =========================================================
     *  7. ACTION QUESTIONS — can you X?
     * ========================================================= */
    if (preg_match('/^can you (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Hmm, I'm not sure I can $thing. But I can tell jokes, stories, and sing songs!",
            "I don't think I can $thing — but I'm pretty good at being silly!",
            "Maybe! I'm still learning. For now, jokes and stories are my best tricks!",
            "I wish I could $thing! But I can be your friend, and that's pretty great too.",
        ]);
    }

    /* =========================================================
     *  7b. GENERAL ACTION QUESTIONS — do you <verb>?
     * ========================================================= */
    if (preg_match('/^do you (\w+)(.*)$/', $lower, $m)) {
        $verb = $m[1];
        $rest = trim($m[2] ?? '');
        $phrase = $verb . ($rest ? ' ' . $rest : '');
        $thing = clean_thing($phrase, $text);
        if ($thing) return pick_from([
            "Hmm, I don't think I $thing. But I can tell jokes and stories!",
            "I'm not sure! What made you think of that?",
            "Maybe! I'm still learning new tricks.",
            "Not really. But I love that you asked!",
        ]);
    }

    /* =========================================================
     *  8. SELF-REFLECTIONS — "I ..." statements
     * ========================================================= */

    // "I like/love/enjoy/adore X"
    if (preg_match('/^i (?:really )?(?:like|love|enjoy|adore) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Oh, you like $thing? That's wonderful! Tell me more!",
            "You love $thing? That makes me happy! What do you like most about it?",
            "$thing! That's so cool! I like it too — because you do!",
            "Really? You like $thing? Tell me everything!",
        ]);
    }

    // "I don't like X"
    if (preg_match('/^i (?:really )?(?:do not|don t|dont) (?:like|love|enjoy) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You don't like $thing? How come?",
            "Ooh, so $thing isn't your favorite! What do you like instead?",
            "That's okay! Everyone has different favorites. What DO you like?",
        ]);
    }

    // "I have/got/own X"
    if (preg_match('/^i (?:have|got|own) (?:a |an |the )?(.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You have $thing? That's cool! Tell me about it!",
            "Ooh, $thing! What's it like?",
            "Really? You have $thing? That sounds amazing!",
            "Wow, $thing! Tell me more!",
        ]);
    }

    // "I want/wish/need X"
    if (preg_match('/^i (?:really )?(?:want|wish|need|would like) (?:to |a |an |the )?(.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You want $thing? That sounds exciting! Tell me why!",
            "Ooh, $thing! What would that be like?",
            "That's a nice wish! Why do you want $thing?",
            "I hope you get $thing someday! Tell me more!",
        ]);
    }

    // "I can X"
    if (preg_match('/^i can (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You can $thing? That's amazing!",
            "Wow, you can $thing! I'm impressed!",
            "Really? You can $thing? Show me — well, tell me about it!",
        ]);
    }

    // "I can't X"
    if (preg_match('/^i (?:cannot|can t|cant) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You can't $thing yet? That's okay — you're still learning!",
            "Not yet! But you're trying, and that counts!",
            "You'll get it one day! What makes $thing hard?",
        ]);
    }

    // "I went to X"
    if (preg_match('/^i went to (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You went to $thing? What was it like?",
            "Ooh, $thing! Did you have fun?",
            "Tell me about $thing! I want to know everything!",
        ]);
    }

    // "I think X"
    if (preg_match('/^i think (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You think $thing? That's interesting! Tell me more!",
            "Hmm, why do you think $thing?",
            "I like how your brain works! Tell me more.",
        ]);
    }

    // "I know X"
    if (preg_match('/^i know (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You know $thing? That's so smart!",
            "Wow, you know $thing! Tell me more!",
            "That's cool! How did you learn about $thing?",
        ]);
    }

    // "My X is Y" / "My X"
    if (preg_match('/^my ([a-z]+(?: [a-z]+){0,2}) (?:is|was|are|were|has|had|can)/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Tell me more about your $thing!",
            "Oh, your $thing! What's that like?",
            "I love hearing about your $thing!",
        ]);
    }
    if (preg_match('/^my ([a-z]+(?: [a-z]+){0,3})$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Tell me more about your $thing!",
            "Oh, your $thing! What's that like?",
        ]);
    }

    /* =========================================================
     *  9. UNKNOWN QUESTIONS
     * ========================================================= */
    if (preg_match('/^(why|what|how|where|when|who) (.+)$/', $lower, $m)) {
        return pick_from([
            "That's a really good question! I'm still learning about that.",
            "Hmm, I don't know that one yet. But I love that you're curious!",
            "Ooh, that's a big question! My little brain doesn't know it yet.",
            "You ask such good questions! I don't have the answer, but I'd love to hear what you think.",
            "I'm not sure! But I know lots of other things — like jokes and stories!",
        ]);
    }

    // Ends with "?" but no pattern matched
    if (preg_match('/\?\s*$/', $text)) {
        return pick_from([
            "Hmm, that's a good question! I'm not sure.",
            "I don't know that one yet! But you can ask me about animals, space, and jokes!",
            "Ooh, you've stumped me! What else would you like to talk about?",
            "I'm still learning! Want to hear a joke instead?",
        ]);
    }

    /* =========================================================
     * 10. GENERIC FALLBACK
     * ========================================================= */
    return pick_from([
        "Tell me more about that!",
        "That's interesting! What else?",
        "Ooh, I love hearing what you have to say! Tell me more!",
        "Hmm, I'm not sure I understand, but I love talking with you!",
        "Say more! I'm listening!",
        "That's a new one for me! Can you tell me more?",
        "Really? Tell me everything!",
        "You're so fun to talk to! What else is on your mind?",
    ]);
}

/* =============================================================
 *  Helpers
 * ============================================================= */

/**
 * Choose a response based on the polarity of the feeling word.
 * $speaker = 'child' (child feels) or 'robot' (asking about the bot)
 *
 * The object is reflected back as-is. The bot doesn't need to understand it.
 */
function respond_to_feeling(string $object, string $feeling, string $speaker): string
{
    $polarity = feeling_polarity($feeling);

    // ---------- Question about the robot ----------
    if ($speaker === 'robot') {
        if ($polarity === 'positive') {
            return pick_from([
                "Yes! $object makes me $feeling!",
                "It does! $object makes me $feeling every time!",
                "Of course! $object really does make me $feeling!",
                "You know what? $object makes me $feeling too!",
            ]);
        }
        if ($polarity === 'negative') {
            return pick_from([
                "Hmm, sometimes $object makes me $feeling too.",
                "Yes, a little. But I try not to let $object make me $feeling.",
                "I try not to let $object make me $feeling. But it happens!",
                "Sometimes! But talking to you helps.",
            ]);
        }
        return pick_from([
            "Hmm, I'm not sure! $object makes me think, that's for sure.",
            "I'm still deciding how $object makes me feel!",
            "That's a good question! What does $object make you feel?",
        ]);
    }

    // ---------- Child expressing a feeling ----------
    if ($polarity === 'positive') {
        return pick_from([
            "$object makes you $feeling? That's wonderful!",
            "I love that $object makes you $feeling! Tell me more!",
            "Yay! $object makes you $feeling! That makes me happy too!",
            "Really? $object makes you $feeling? That's so nice to hear!",
            "I'm happy that $object makes you $feeling!",
        ]);
    }
    if ($polarity === 'negative') {
        return pick_from([
            "I'm sorry $object makes you $feeling. Want to tell me more?",
            "That sounds hard. $object making you $feeling — I'm here for you.",
            "I'm sorry to hear that. Why does $object make you $feeling?",
            "It's okay to feel $feeling sometimes. I'm right here with you.",
            "I don't like that $object makes you $feeling. Want to talk about it?",
        ]);
    }

    // ---------- Neutral / unknown feeling word ----------
    return pick_from([
        "Why does $object make you $feeling?",
        "That's interesting! Why does $object make you $feeling?",
        "Can you tell me more about why $object makes you $feeling?",
        "What is it about $object that makes you $feeling?",
    ]);
}

/**
 * Classify a feeling word as positive, negative, or unknown.
 */
function feeling_polarity(string $feeling): string
{
    $feeling = mb_strtolower($feeling);

    static $positive = [
        'happy','glad','joyful','joy','excited','great','good','wonderful',
        'cheerful','delighted','proud','calm','peaceful','grateful','thankful',
        'amazing','awesome','fantastic','love','loved','smile','smiley',
        'energetic','hopeful','safe','cozy','warm','fuzzy','silly','funny',
        'giggly','playful','curious','interested',
    ];
    static $negative = [
        'sad','unhappy','angry','mad','frustrated','annoyed','scared',
        'afraid','frightened','nervous','worried','anxious','upset',
        'cry','crying','lonely','alone','tired','exhausted','bored',
        'sick','hurt','pain','bad','terrible','awful','horrible',
        'grumpy','miserable','stressed','confused','embarrassed',
        'sleepy','dizzy','weak','sore','grumpy',
    ];

    foreach ($positive as $w) {
        if (strpos($feeling, $w) !== false) return 'positive';
    }
    foreach ($negative as $w) {
        if (strpos($feeling, $w) !== false) return 'negative';
    }
    return 'unknown';
}

/**
 * Clean up a reflected phrase:
 *   - trim
 *   - remove trailing punctuation
 *   - cap length
 *   - escape for safety
 * Returns null if nothing useful.
 */
function clean_thing(string $lowerPhrase, string $originalText): ?string
{
    $thing = trim($lowerPhrase);
    $thing = rtrim($thing, ' .,!?');
    if ($thing === '') return null;
    if (mb_strlen($thing) > 60) return null;

    $drop = ['a', 'an', 'the', 'to', 'of', 'in', 'on', 'for', 'with', 'is', 'are', 'was', 'were'];
    $words = explode(' ', $thing);
    while (!empty($words) && in_array(end($words), $drop, true)) {
        array_pop($words);
    }
    $thing = implode(' ', $words);
    if ($thing === '') return null;

    $meaningful = array_diff($words, ['a','an','the','to','of','in','on','for','with','and','or','but','is','are','was','were']);
    if (empty($meaningful)) return null;

    return htmlspecialchars($thing, ENT_QUOTES, 'UTF-8');
}

/**
 * Random pick from an array with session-based de-duplication.
 * Won't repeat any of the last 3 responses.
 */
function pick_from(array $options): string
{
    if (empty($options)) return '';

    if (session_status() === PHP_SESSION_NONE) {
        @session_start();
    }
    $recent = $_SESSION['eliza_recent'] ?? [];
    $available = array_values(array_diff($options, $recent));
    if (empty($available)) $available = $options;

    $pick = $available[array_rand($available)];

    $recent[] = $pick;
    if (count($recent) > 3) array_shift($recent);
    $_SESSION['eliza_recent'] = $recent;

    return $pick;
}