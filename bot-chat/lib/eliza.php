<?php
/**
 * lib/eliza.php — ELIZA-style fallback responses for bot-chat.
 *
 * Preference questions ("do you like X?") get their own treatment —
 * they're about the robot's tastes, not about actions.
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

    // ============ PREFERENCE QUESTIONS ============
    // These come FIRST so they don't fall through to generic "do you".

    // "Do you like X?" / "Do you love X?"
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

    // "Do you want X?" — desire
    if (preg_match('/^do you (?:want|wish for|need) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Hmm, I don't need $thing, but I'd love to see yours!",
            "$thing? I want whatever you want, friend!",
            "I'm pretty happy with what I have! What about you?",
            "Maybe! Tell me why you like $thing!",
        ]);
    }

    // "Do you have X?" — possession
    if (preg_match('/^do you have (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "No, I don't have $thing. But I have you as a friend!",
            "I don't have $thing — I'm a little robot, after all! Do you?",
            "$thing? Hmm, no. What else do you have?",
            "Not yet! Maybe one day. Tell me about yours!",
        ]);
    }

    // "Do you know X?" — knowledge
    if (preg_match('/^do you know (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "I'm still learning! Tell me about $thing!",
            "$thing? I know a little! What do you know?",
            "I don't know everything, but I'm curious! Tell me more!",
            "Maybe! Ask me something else about it!",
        ]);
    }

    // "Do you (verb)?" — general action question
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

    // ============ REFLECTION RULES ============

    // "I like/love/enjoy X"
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

    // "I have/got X"
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

    // "Can you X?" — action question about the robot
    if (preg_match('/^can you (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Hmm, I'm not sure I can $thing. But I can tell jokes, stories, and sing songs!",
            "I don't think I can $thing — but I'm pretty good at being silly!",
            "Maybe! I'm still learning. For now, jokes and stories are my best tricks!",
            "I wish I could $thing! But I can be your friend, and that's pretty great too.",
        ]);
    }

    // "Why/What/How/Where/When/Who X?" — unknown question
    if (preg_match('/^(why|what|how|where|when|who) (.+)$/', $lower, $m)) {
        return pick_from([
            "That's a really good question! I'm still learning about that.",
            "Hmm, I don't know that one yet. But I love that you're curious!",
            "Ooh, that's a big question! My little brain doesn't know it yet.",
            "You ask such good questions! I don't have the answer, but I'd love to hear what you think.",
            "I'm not sure! But I know lots of other things — like jokes and stories!",
        ]);
    }

    // "You are X" — compliment or tease
    if (preg_match('/^you (?:are|were|look) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Really? You think I'm $thing? Thank you!",
            "Aww, you're so kind!",
            "That made my circuits happy!",
            "Beep boop! You're pretty wonderful yourself!",
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

    // ============ GENERIC FALLBACKS ============
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

function clean_thing(string $lowerPhrase, string $originalText): ?string
{
    $thing = trim($lowerPhrase);
    $thing = rtrim($thing, ' .,!?');
    if ($thing === '') return null;
    if (mb_strlen($thing) > 50) return null;

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

function pick_from(array $options): string
{
    if (empty($options)) return '';

    // Session-based de-duplication
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