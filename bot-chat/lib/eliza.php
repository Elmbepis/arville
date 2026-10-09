<?php
/**
 * lib/eliza.php — ELIZA-style fallback responses for bot-chat.
 *
 * When the pattern router can't match, this generates a context-aware
 * response by reflecting the child's words back in a friendly, curious way.
 *
 * Inspired by Joseph Weizenbaum's ELIZA (1966) — the first chatbot, which
 * used simple pattern matching and pronoun reflection to keep conversations
 * going without understanding them.
 */

function eliza_response(string $input): ?string
{
    $text = trim($input);
    if ($text === '') return null;

    // Lowercase copy for matching; original for echoing
    $lower = mb_strtolower($text);
    $lower = preg_replace('/[^\p{L}\p{N}\s\']/u', ' ', $lower);
    $lower = preg_replace('/\s+/', ' ', trim($lower));

    // Cap for reflection — ignore very long inputs
    if (mb_strlen($text) > 200) {
        return pick_from([
            "Wow, that's a lot to think about! Can you tell me in a shorter way?",
            "That was a lot of words! My little robot brain needs a moment. Can you say it again?",
            "You said so much! I love it, but could you say just a little less?",
        ]);
    }

    // ============ REFLECTION RULES ============
    // Each rule matches a sentence shape and reflects it back.

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

    // "Can you X?" (question about the robot's ability)
    if (preg_match('/^can you (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Hmm, I'm not sure I can $thing. But I can tell jokes, stories, and sing songs!",
            "I don't think I can $thing — but I'm pretty good at being silly!",
            "Maybe! I'm still learning. For now, jokes and stories are my best tricks!",
            "I wish I could $thing! But I can be your friend, and that's pretty great too.",
        ]);
    }

    // "Do you X?" (question about robot's preference or state)
    if (preg_match('/^do you (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Hmm, I don't think so! But I'm learning new things all the time.",
            "Not really! But I love that you asked!",
            "I'm not sure! Tell me what you think.",
            "Maybe! What made you think of that?",
        ]);
    }

    // "My X is Y" or "My X"
    if (preg_match('/^my ([a-z]+(?: [a-z]+){0,3})/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "Tell me more about your $thing!",
            "Oh, your $thing! What's that like?",
            "That sounds interesting! What does your $thing do?",
            "I love hearing about your $thing! Tell me more!",
        ]);
    }

    // "Why X?" / "What X?" / "How X?" — question we don't know
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

    // "I am/I'm X" (non-emotion) — child describing themselves
    if (preg_match('/^(?:i am|i m) (.+)$/', $lower, $m)) {
        $thing = clean_thing($m[1], $text);
        if ($thing) return pick_from([
            "You're $thing? That's great! Tell me more!",
            "Ooh, you're $thing! I love learning about you!",
            "That's cool! How did you become $thing?",
            "You're $thing! I like that about you!",
        ]);
    }

    // Ends with "?" but no specific pattern matched
    if (preg_match('/\?\s*$/', $text)) {
        return pick_from([
            "Hmm, that's a good question! I'm not sure.",
            "I don't know that one yet! But you can ask me about animals, space, and jokes!",
            "Ooh, you've stumped me! What else would you like to talk about?",
            "I'm still learning! Want to hear a joke instead?",
        ]);
    }

    // ============ GENERIC FALLBACKS ============
    // Nothing matched — pick a friendly redirect.
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
    if (mb_strlen($thing) > 50) return null;

    // Drop common trailing stop-words that make reflections awkward
    $drop = ['a', 'an', 'the', 'to', 'of', 'in', 'on', 'for', 'with'];
    $words = explode(' ', $thing);
    while (!empty($words) && in_array(end($words), $drop, true)) {
        array_pop($words);
    }
    $thing = implode(' ', $words);
    if ($thing === '') return null;

    // Reject if it's only stop words
    $meaningful = array_diff($words, ['a','an','the','to','of','in','on','for','with','and','or','but','is','are','was','were']);
    if (empty($meaningful)) return null;

    return htmlspecialchars($thing, ENT_QUOTES, 'UTF-8');
}

/**
 * Random pick from an array. Optional session-based de-duplication.
 */
function pick_from(array $options): string
{
    if (empty($options)) return '';
    return $options[array_rand($options)];
}