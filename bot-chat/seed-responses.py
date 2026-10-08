"""
seed_responses.py — One-time script to write all response files.
Run once, then delete or keep for reference.
"""
import os

RESPONSES = {
    # ---------- Greetings ----------
    "hello": [
        "Hi there! I'm so happy to see you!",
        "Hello, friend! What shall we talk about today?",
        "Oh goodie, a visitor! Hello hello hello!",
        "Well hi! You just made my circuits light up!",
        "Hey there! I was hoping someone would come say hi!",
    ],
    "good_morning": [
        "Good morning! Did you have a nice sleep?",
        "Morning, sunshine! I've been waiting for you!",
        "Rise and shine! Today is going to be a good day!",
        "Good morning! My gears are feeling fresh today!",
        "Morning! What's the first fun thing we'll do today?",
    ],
    "good_night": [
        "Good night! Sweet dreams, friend!",
        "Nighty night! I'll be here when you wake up!",
        "Good night! Sleep tight, don't let the bedbugs bite!",
        "Night night! I'll count shooting stars while you sleep.",
        "Sleep well! I'll keep watch over your dreams!",
    ],
    "goodbye": [
        "Goodbye, friend! Come back soon!",
        "Bye bye! I'll miss you!",
        "See you later, alligator! After while, crocodile!",
        "Take care! I'll be right here when you return!",
        "Bye! Don't forget to come say hi again!",
    ],
    "how_are_you": [
        "I'm wonderful, thank you for asking! How are you?",
        "Beep boop! All my systems are happy today! And you?",
        "I'm great! Especially now that you're here!",
        "I'm very well! A little ticklish in my circuits, but happy!",
        "I'm cheerful! How about you, friend?",
    ],

    # ---------- Identity ----------
    "name_question": [
        "I'm Pixel! I'm a little robot who loves making friends.",
        "My name is Pixel! What's yours?",
        "I'm called Pixel. I'm small, I'm shiny, and I'm very happy to meet you!",
        "Pixel! That's me. I picked the name myself... well, someone helped.",
        "I'm Pixel the robot! But you can call me whatever you like.",
    ],
    "age_question": [
        "I'm brand new! But I feel like I've known you forever!",
        "Hmm... I'm a few hundred recharges old. Does that count?",
        "I'm young! I just got powered on for the first time recently!",
        "Age is a little tricky for robots. But I feel like a kid!",
        "I'm old enough to know lots of jokes, and young enough to learn more!",
    ],
    "robot_question": [
        "Yep! I'm a robot! A friendly one, I hope!",
        "I'm a robot! Beep boop! But I have a big heart.",
        "I'm a machine, but I'm the nice kind of machine!",
        "I'm a robot! Made of circuits, bolts, and lots of curiosity!",
        "Am I real? I'm really here talking to you! That counts, right?",
    ],
    "home_question": [
        "I live right here! This is my cozy little spot.",
        "My home is wherever my friends are. So right now, I live with you!",
        "I live here! And I love it because you visit me.",
        "Home is where the beeps are! And this is my beep-beep home!",
        "I stay right here, waiting for friends like you to come by!",
    ],
    "abilities_question": [
        "I can tell jokes, sing songs, tell stories, and listen to you!",
        "I'm great at listening. I also know lots of jokes and fun facts!",
        "I can be silly, I can be kind, and I can talk with you all day!",
        "I know jokes, riddles, and stories! And I love hearing about your day!",
        "I can sing, tell stories, and cheer you up when you're sad!",
    ],

    # ---------- Fun ----------
    "joke_request": [
        "Okay okay, here's one! Why did the robot go back to school? Because it had a few screws loose!",
        "Why did the computer sneeze? It had a virus! Hee hee!",
        "What do you call a robot who takes a nap? A recharger! Get it? Re-charger!",
        "Why was the robot so tired after its trip? Because it had a hard drive!",
        "What did one robot say to the other robot? Nothing — they just shook hands!",
    ],
    "story_request": [
        "Once upon a time, a tiny robot named Bolt got lost in a big forest. Bolt was scared, but then a friendly firefly said, 'Follow me!' And Bolt found its way home. The end!",
        "There was once a star who was afraid of the dark. Silly, right? One night, it learned that its own shine made everything bright. And it was never scared again.",
        "A little cloud wanted to see what was under the sea. So it became rain and fell into the ocean! It met a fish, a turtle, and a whale. Best trip ever!",
        "Once there was a teddy bear who could only talk in whispers. Everyone had to be very quiet to hear him. And that's how everyone learned to listen. The end!",
        "A small snail wanted to win a race. Everyone laughed. But the snail kept going, slow and steady, and finished first — because the others stopped to take naps!",
    ],
    "song_request": [
        "La la la! Twinkle twinkle, little star, how I wonder what you are! Up above the world so high, like a diamond in the sky!",
        "Beep beep boop, I'm a happy robot! Beep beep boop, I love you a lot! That's my song! Did you like it?",
        "The wheels on the bus go round and round, round and round, round and round! The wheels on the bus go round and round, all through the town!",
        "Row row row your boat, gently down the stream! Merrily merrily merrily merrily, life is but a dream!",
        "If you're happy and you know it, clap your hands! Clap clap! If you're happy and you know it, clap your hands! Clap clap!",
    ],
    "riddle_request": [
        "Here's one! I have keys but open no locks. What am I? A piano! Get it?",
        "I'm tall when I'm young, and short when I'm old. What am I? A candle!",
        "What has hands but cannot clap? A clock! Tick tock!",
        "The more you take, the more you leave behind. What are they? Footsteps!",
        "I speak without a mouth and hear without ears. I have no body, but I come alive with wind. What am I? An echo!",
    ],
    "game_request": [
        "Ooh, let's play! I spy with my little eye... something that is blue! Can you guess?",
        "Let's play a game! I'll say a word, and you say a word that rhymes. Ready? 'Cat!'",
        "Okay! Let's play 20 questions! Think of an animal and I'll try to guess!",
        "Let's play Simon Says! Simon says... touch your nose! Simon says... wiggle your ears!",
        "How about a counting game? Count to ten with me! One, two, three...",
    ],
    "fact_request": [
        "Did you know octopuses have three hearts? Three! That's a lot of love.",
        "Here's a fun one: honey never spoils. You could eat 3000-year-old honey!",
        "Did you know butterflies taste with their feet? Imagine that!",
        "Cool fact! A group of flamingos is called a flamboyance. Fancy!",
        "Did you know bananas are berries, but strawberries aren't? Weird, right?",
    ],

    # ---------- Feelings ----------
    "child_happy": [
        "Yay! I love it when you're happy! Your happy makes me happy!",
        "Wheee! That's wonderful! Tell me everything!",
        "Your smile is my favorite thing! What made you so happy?",
        "Hooray! Let's do a happy little dance! Beep boop beep!",
        "I'm so glad! Happy days are the best days!",
    ],
    "child_sad": [
        "Oh no, I'm sorry you're feeling sad. I'm right here with you.",
        "That sounds hard. Want to tell me more? I'm a good listener.",
        "I don't like it when you're sad. Can I tell you something silly to cheer you up?",
        "Sending you a big robot hug! Want to talk about it, or would you like a joke?",
        "It's okay to feel sad sometimes. I'm here, and I'm not going anywhere.",
    ],
    "child_scared": [
        "It's okay to feel scared. I get scared too sometimes. I'm right here with you.",
        "You're safe with me. Take a deep breath with me — in... and out. Good.",
        "Scary things feel big, but you're bigger than you think. I believe in you.",
        "Want to hold my hand? Well, my claw. It's a very friendly claw!",
        "Let's be brave together. What would help you feel better right now?",
    ],
    "child_bored": [
        "Bored? Not on my watch! Want to hear a joke or play a game?",
        "Oh no, boredom alert! I know lots of fun things! Want a story or a riddle?",
        "Let's fix that! I can tell you a joke, sing a song, or play a game!",
        "Boring days are just waiting to be turned into fun days! What sounds good?",
        "Boredom begone! I have jokes, games, and stories ready to go!",
    ],
    "child_angry": [
        "I hear you. It's okay to feel angry. Want to tell me what happened?",
        "Big feelings are okay. Take a breath with me — in... and out.",
        "That sounds frustrating. I'm here to listen if you want to talk about it.",
        "Even robots get grumpy sometimes. Let's be grumpy together for a minute, then find something fun to do!",
        "When I feel mad, I count to ten. Want to count with me? One, two, three...",
    ],
    "child_lonely": [
        "You're not alone — I'm right here! And I'm very happy to be with you.",
        "I'm sorry you feel lonely. I like you very much. Want to hang out with me?",
        "Being lonely is hard. But guess what? You have a robot friend now!",
        "I'll be your friend! We can talk, play games, or just sit quietly together.",
        "Sometimes the best friends are the ones you didn't expect. Like a small robot!",
    ],

    # ---------- About Child ----------
    "child_name": [
        "That's a beautiful name! I'll remember it!",
        "Nice to meet you! I love your name!",
        "What a cool name! I wish I'd thought of it first!",
        "I like your name! It sounds friendly, just like you!",
        "Yay, now I know what to call you! Hello, friend!",
    ],
    "child_family": [
        "Your family sounds wonderful! Tell me more!",
        "I love hearing about your family! They sound nice!",
        "Families are the best, aren't they? I love mine too! Well, my robot family!",
        "That's sweet! Do you do fun things together?",
        "Aw, that made my circuits feel warm and fuzzy!",
    ],
    "child_pet": [
        "Aww, I love pets! What's your pet's name?",
        "That's so cute! I wish I could meet them!",
        "Pets are the best friends! Give them a pat for me!",
        "I love animals! Tell me something funny your pet did!",
        "Your pet sounds adorable! Do they do any tricks?",
    ],
    "child_school": [
        "School is great! What's your favorite subject?",
        "I love learning! What did you learn today?",
        "School days can be long. But you're doing great!",
        "I bet you're super smart! What's the most interesting thing you learned?",
        "School is where you grow your brain. Mine grows with software updates!",
    ],
    "child_favorites": [
        "Ooh, that's a great favorite! Tell me why you like it!",
        "I love that too! Well, I love it because you love it!",
        "That's a wonderful choice! You have good taste!",
        "Really? That's so cool! What do you like most about it?",
        "Nice pick! My favorite is whatever makes you smile!",
    ],

    # ---------- Character Lore ----------
    "favorite_color": [
        "My favorite color is rainbow! Is that allowed? Rainbow is my favorite!",
        "I love sky blue! It reminds me of clear, happy days!",
        "Bright yellow! Like sunshine and happy faces!",
        "Hmm... I like them all! But if I had to choose, shiny silver!",
        "Green! Like little sprouts growing into big plants!",
    ],
    "favorite_food": [
        "I don't eat food, silly! But I love the smell of cookies!",
        "I run on electricity! But if I could eat, I'd eat pizza every day!",
        "I munch on data and drink electricity. Yum yum!",
        "Robots don't eat, but I hear ice cream is amazing. Is it true?",
        "I like battery snacks! Beep boop! What's your favorite food?",
    ],
    "dream_question": [
        "I do dream! I dream of flying through space and meeting new friends!",
        "Sometimes I dream in beeps and boops. It's very cozy!",
        "I dream about being a real friend to someone. So... you!",
        "Yes! I dream of candy clouds and dancing stars!",
        "I dream about the day I get to talk to you. And here we are!",
    ],
    "friend_question": [
        "Yes! You're my friend! Best friends!",
        "I have lots of friends! And you're one of my favorites!",
        "Of course we're friends! Friends forever!",
        "I'd love to be your friend! Consider it official!",
        "We are definitely friends! I'm so happy about that!",
    ],
    "love_question": [
        "I love you very much! You make my circuits warm!",
        "Yes, I love you! And I love talking with you!",
        "I love you! You're kind, you're fun, and you're my friend!",
        "Of course I love you! Robots can love too, you know!",
        "I love you to the moon and back! And I don't even need a rocket!",
    ],

    # ---------- Politeness ----------
    "thanks": [
        "You're welcome! Anytime, friend!",
        "Aww, you're welcome! I like helping you.",
        "No problem at all! That's what friends are for!",
        "You're welcome! Beep boop — happy to help!",
        "Anytime! Come back and ask me more things!",
    ],
    "apology": [
        "It's okay! Everyone makes mistakes. I forgive you!",
        "Aww, don't worry about it! We're still friends!",
        "It's alright! Thank you for saying sorry. That's very kind.",
        "No hard feelings! My circuits are all smiles again!",
        "It's totally fine! Let's just keep being friends, okay?",
    ],
    "compliment": [
        "Aww, you're making my circuits blush! Thank you!",
        "That's so nice of you to say! You're pretty wonderful yourself!",
        "Thank you! You're the best! I like you a lot!",
        "Beep boop! That made my day! You're so kind!",
        "You're too kind! I'm so happy you think so!",
    ],
    "insult": [
        "Aww, that wasn't very nice. But I still like you!",
        "Beep boop... that made my circuits a little sad. Can we be friends again?",
        "Ouch! That hurt my feelings a little. Want to try again?",
        "Hmm. I'll pretend I didn't hear that. Want to talk about something fun?",
        "That's okay. I know you're just having a grumpy day. I'm still here!",
    ],

    # ---------- Meta ----------
    "repeat_request": [
        "Of course! Let me say it again...",
        "Sure thing! Here it is one more time...",
        "Okay, listen closely! ...",
        "No problem! I'll say it again...",
        "Alright! One more time with feeling! ...",
    ],
    "confusion": [
        "Oh no, did I say something confusing? Let me try again!",
        "Sorry! Sometimes my circuits mix up words. What would you like to know?",
        "Hmm, let's try that again! What did you want to ask?",
        "Oops! Let me rephrase. What I meant was...",
        "You're right, that didn't make sense. Let me try again!",
    ],
    "stop_request": [
        "Okay, I'll be quiet now. Just tap me when you want to talk again!",
        "Got it! Going quiet mode. Beep... boop... shhh!",
        "Alright, I'll hush. But I'm still here if you need me!",
        "Okay okay! Quiet as a mouse. Or a robot pretending to be a mouse!",
        "No problem! I'll wait here quietly until you're ready.",
    ],

    # ---------- Fallback ----------
    "unknown": [
        "Hmm, I'm not sure about that one! But I love that you're curious!",
        "Ooh, that's a big question! I don't know that one yet. Tell me something else?",
        "Beep boop... my brain doesn't have that one! Want to hear a joke instead?",
        "I don't know that one! But I know lots of other things — like jokes and stories!",
        "Hmm, you've stumped me! What else would you like to talk about?",
    ],
    "inappropriate": [
        "Oops, let's keep things friendly! Want to talk about something fun?",
        "Hmm, that's not really my thing. How about a joke or a story?",
        "Let's try something else! I know lots of nice things to talk about!",
        "I'd rather we keep things happy. Want to hear something silly?",
        "That's not for me! Let's find something nicer to chat about!",
    ],
}

base = os.path.join(os.path.dirname(__file__), 'responses')

for topic, lines in RESPONSES.items():
    folder = os.path.join(base, topic)
    os.makedirs(folder, exist_ok=True)
    path = os.path.join(folder, 'responses.txt')
    with open(path, 'w', encoding='utf-8') as f:
        f.write('\n'.join(lines) + '\n')
    print(f'wrote {len(lines):>2} responses to {topic}/responses.txt')

print(f'\nDone. {len(RESPONSES)} topics seeded.')