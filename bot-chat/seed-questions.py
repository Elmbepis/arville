"""
seed_questions.py — Create questions.txt for every topic in responses/.
Each pattern is one line. Blank lines and lines starting with # are ignored.
"""
import os

PATTERNS = {
    # ==================== GREETINGS ====================
    "hello": [
        "hi", "hello", "hey", "hi there", "hello there", "hey there",
        "greetings", "howdy", "hiya", "yo", "hi robot", "hello robot",
        "hey robot",
    ],
    "good_morning": [
        "good morning", "morning", "top of the morning",
    ],
    "good_night": [
        "good night", "goodnight", "night night", "sleep well",
        "sweet dreams", "bedtime",
    ],
    "goodbye": [
        "goodbye", "bye", "bye bye", "see you", "see you later",
        "see you soon", "see ya", "take care", "farewell", "gotta go",
        "i have to go", "talk to you later",
    ],
    "how_are_you": [
        "how are you", "how are you doing", "how you doing", "how are things",
        "how do you do", "how goes it", "how is it going", "how is your day",
        "what is up", "whats up", "what's up",
    ],

    # ==================== IDENTITY ====================
    "name_question": [
        "what is your name", "what's your name", "whats your name",
        "your name", "who are you", "what are you called",
        "tell me your name", "what should i call you",
    ],
    "age_question": [
        "how old are you", "what is your age", "your age",
        "when were you born",
    ],
    "robot_question": [
        "are you a robot", "are you a machine", "are you a computer",
        "are you real", "are you alive", "are you human",
    ],
    "home_question": [
        "where do you live", "where are you from", "where do you stay",
        "where is your home", "what is your home", "where do you come from",
    ],
    "abilities_question": [
        "what can you do", "what are you good at", "what do you know",
        "can you do tricks", "what are you made to do",
    ],

    # ==================== ROBOT FEELINGS ====================
    "robot_okay": [
        "are you okay", "are you ok", "are you alright", "are you fine",
        "are you well", "are you feeling okay", "are you feeling ok",
        "how are you feeling",
    ],
    "robot_happy": [
        "are you happy", "do you feel happy", "are you glad",
        "are you cheerful",
    ],
    "robot_sad": [
        "are you sad", "do you feel sad", "are you unhappy", "are you down",
    ],
    "robot_tired": [
        "are you tired", "are you sleepy", "do you get tired",
        "do you get sleepy", "are you exhausted", "do you need to sleep",
    ],
    "robot_bored": [
        "are you bored", "do you get bored", "are you having fun",
    ],
    "robot_scared": [
        "are you scared", "are you afraid", "do you get scared",
    ],

    # ==================== FUN ====================
    "joke_request": [
        "tell me a joke", "tell me a funny joke", "tell me something funny",
        "say something funny", "make me laugh", "tell a joke", "joke",
        "jokes", "crack me up", "say a joke", "got any jokes",
    ],
    "story_request": [
        "tell me a story", "tell a story", "tell me a tale", "story",
        "tell me a bedtime story", "once upon a time",
    ],
    "song_request": [
        "sing me a song", "sing a song", "sing for me", "sing something",
        "song", "sing", "music", "lullaby", "sing to me",
    ],
    "riddle_request": [
        "tell me a riddle", "riddle", "riddles", "give me a riddle",
        "puzzle", "brain teaser",
    ],
    "game_request": [
        "play a game", "play with me", "let's play", "want to play",
        "play something", "can we play", "play a game with me", "let us play",
    ],
    "fact_request": [
        "tell me a fun fact", "fun fact", "tell me something interesting",
        "tell me something cool", "did you know", "say something interesting",
        "give me a fun fact",
    ],

    # ==================== CHILD FEELINGS ====================
    "child_happy": [
        "i am happy", "i'm happy", "i feel happy", "i am excited",
        "i'm excited", "i feel excited", "i feel great", "i feel good",
        "best day ever", "i am so happy", "i feel amazing",
    ],
    "child_sad": [
        "i am sad", "i'm sad", "i feel sad", "i am crying", "i'm crying",
        "i am upset", "i feel bad", "i am unhappy", "feeling sad",
        "feeling down", "i feel horrible",
    ],
    "child_scared": [
        "i am scared", "i'm scared", "i feel scared", "i am afraid",
        "i'm afraid", "i am frightened", "i am nervous", "i am worried",
        "i feel scared",
    ],
    "child_bored": [
        "i am bored", "i'm bored", "i feel bored", "nothing to do",
        "this is boring", "so boring", "i am tired of this",
    ],
    "child_angry": [
        "i am angry", "i'm angry", "i feel angry", "i am mad", "i'm mad",
        "i am frustrated", "i hate this", "i am so mad",
    ],
    "child_lonely": [
        "i am lonely", "i'm lonely", "i feel lonely", "i have no friends",
        "nobody likes me", "i am all alone", "i feel alone",
    ],

    # ==================== ABOUT CHILD ====================
    "child_name": [
        "my name is", "call me", "i am called", "my name",
    ],
    "child_family": [
        "my mom", "my dad", "my mother", "my father", "my sister",
        "my brother", "my family", "my grandma", "my grandpa",
        "my grandmother", "my grandfather", "my aunt", "my uncle",
        "my cousin",
    ],
    "child_pet": [
        "my dog", "my cat", "my pet", "my fish", "my bird",
        "my hamster", "my rabbit", "my puppy", "my kitten",
    ],
    "child_school": [
        "my school", "my teacher", "my class", "my classmates",
        "my homework", "homework",
    ],
    "child_favorites": [
        "my favorite", "i like", "i love", "i enjoy",
    ],

    # ==================== CHARACTER LORE ====================
    "favorite_color": [
        "what is your favorite color", "favorite color",
        "what color do you like", "what is your favorite colour",
    ],
    "favorite_food": [
        "what is your favorite food", "do you eat", "favorite food",
        "do you eat food", "what do you eat",
    ],
    "dream_question": [
        "do you dream", "do you sleep", "do you have dreams",
        "what do you dream about",
    ],
    "friend_question": [
        "do you have friends", "who are your friends", "are we friends",
        "will you be my friend",
    ],
    "love_question": [
        "do you love me", "do you like me", "do you care about me",
        "do you have feelings",
    ],

    # ==================== POLITENESS ====================
    "thanks": [
        "thank you", "thanks", "thank u", "thanks a lot",
        "thanks so much", "appreciate it",
    ],
    "apology": [
        "i am sorry", "i'm sorry", "sorry", "my bad", "apologize",
        "forgive me", "i apologize",
    ],
    "compliment": [
        "you are nice", "you're nice", "you are cute", "you're cute",
        "you are funny", "you're funny", "you are smart", "you are great",
        "you are awesome", "you are the best", "i like you", "i love you",
        "good robot", "best robot", "you're so cute", "you're so cool",
    ],
    "insult": [
        "you are dumb", "you're dumb", "you are stupid", "you're stupid",
        "i hate you", "bad robot", "you are boring", "you're boring",
        "i do not like you", "i don't like you",
    ],

    # ==================== META ====================
    "repeat_request": [
        "say it again", "say that again", "repeat that",
        "what did you say", "come again", "i did not hear you",
        "i didn't hear you",
    ],
    "confusion": [
        "i do not understand", "i don't understand", "what do you mean",
        "i do not get it", "i don't get it", "that does not make sense",
    ],
    "stop_request": [
        "stop talking", "be quiet", "shush", "hush", "quiet please",
        "that is enough", "stop it", "stop",
    ],

    # ==================== FALLBACK ====================
    # unknown and inappropriate have no explicit patterns —
    # they're reached only via Laya when nothing else matches.
}

base = os.path.join(os.path.dirname(__file__), 'responses')

for topic, lines in PATTERNS.items():
    folder = os.path.join(base, topic)
    os.makedirs(folder, exist_ok=True)
    path = os.path.join(folder, 'questions.txt')
    with open(path, 'w', encoding='utf-8') as f:
        f.write('\n'.join(lines) + '\n')
    print(f'wrote {len(lines):>2} patterns to {topic}/questions.txt')

print(f'\nDone. {len(PATTERNS)} topics seeded with question patterns.')