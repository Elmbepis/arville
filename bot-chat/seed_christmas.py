"""
seed_christmas_extra.py — Updates christmas_facts and adds 7 new Christmas topics.
Run once. Overwrites existing files for the topics listed.
"""
import os

TOPICS = {
    # ============ UPDATED: christmas_facts ============
    "christmas_facts": {
        "patterns": [
            "what is christmas",
            "when is christmas",
            "what day is christmas",
            "when is christmas celebrated",
            "why is christmas on december 25",
            "christmas facts",
            "fun christmas fact",
            "did you know christmas",
            "christmas trivia",
        ],
        "responses": [
            "Christmas is a holiday celebrated every December 25 to remember the birth of Jesus. It's also a time for family, giving, and joy!",
            "Christmas is on December 25 every year. It's the day we celebrate the birth of Jesus and share gifts with the people we love.",
            "December 25! That's the day we celebrate Christmas. Families gather, give gifts, and share a special meal together.",
            "Christmas is celebrated on December 25. Long ago, December 25 was chosen as the day to remember the birth of Jesus.",
            "Did you know? The first Christmas card was sent in 1843 in England!",
            "Fun fact! Santa Claus is based on a real person — Saint Nicholas, who gave gifts to the poor.",
            "Did you know? 'Jingle Bells' was the first song ever played in space!",
            "Cool fact! In the Philippines, Christmas starts in September! We have the longest Christmas season in the world!",
            "Did you know? The tallest Christmas tree ever displayed was 67 meters tall — taller than a 20-story building!",
            "Fun fact! Christmas trees have been used in celebrations for over 500 years.",
        ]
    },

    # ============ NEW TOPICS ============
    "christmas_tree": {
        "patterns": [
            "christmas tree",
            "why do we have a christmas tree",
            "where does the christmas tree come from",
        ],
        "responses": [
            "A Christmas tree is a decorated evergreen tree — usually a pine or fir — that families put up during the holidays. We decorate it with lights, ornaments, and a star on top!",
            "The Christmas tree tradition started in Germany hundreds of years ago. People brought evergreen trees indoors to remind them of spring during the cold winter.",
            "We put up a Christmas tree to celebrate the season. The evergreen branches remind us of life and hope, even in the coldest time of year!",
        ]
    },
    "christmas_lights": {
        "patterns": [
            "christmas lights",
            "why do we put up christmas lights",
            "what are christmas lights",
        ],
        "responses": [
            "Christmas lights are colorful little bulbs we hang on trees, houses, and streets. They make everything bright and cheerful!",
            "We put up Christmas lights to celebrate. They remind us of the light and warmth of the season!",
            "Christmas lights come in many colors — red, green, blue, gold. Some even blink and dance to music!",
        ]
    },
    "christmas_gifts": {
        "patterns": [
            "why do we give gifts",
            "why do we give presents",
            "christmas presents",
            "what is a christmas gift",
        ],
        "responses": [
            "We give gifts at Christmas to remember the gifts the three wise men brought to baby Jesus long ago.",
            "Giving gifts is a way to show love and kindness. It feels good to give, and it feels good to receive!",
            "The best gifts don't cost money — a hug, a kind word, or time spent together can be the best gift of all.",
        ]
    },
    "christmas_elf": {
        "patterns": [
            "elf",
            "elves",
            "christmas elf",
            "what is an elf",
        ],
        "responses": [
            "Elves are Santa's little helpers at the North Pole! They make toys all year long and help Santa check his list.",
            "Santa's elves are hard workers! They build toys, wrap presents, and feed the reindeer.",
            "Elves are small, magical, and very cheerful. They love Christmas as much as we do!",
        ]
    },
    "christmas_stocking": {
        "patterns": [
            "christmas stocking",
            "what is a stocking",
            "why do we hang stockings",
        ],
        "responses": [
            "A Christmas stocking is a big sock that families hang by the fireplace on Christmas Eve. In the morning, it's full of small gifts and treats!",
            "The stocking tradition comes from a story about Saint Nicholas. He dropped gold coins down a chimney, and they landed in socks drying by the fire!",
            "We hang stockings so Santa can fill them with little surprises on Christmas morning.",
        ]
    },
    "christmas_mistletoe": {
        "patterns": [
            "mistletoe",
            "what is mistletoe",
        ],
        "responses": [
            "Mistletoe is a small green plant with white berries. People hang it in doorways during Christmas.",
            "There's an old tradition that if two people stand under the mistletoe, they should share a friendly greeting. It's a fun Christmas custom!",
            "Mistletoe grows on trees and stays green all winter — that's why it became a symbol of Christmas!",
        ]
    },
    "christmas_star": {
        "patterns": [
            "star of bethlehem",
            "christmas star",
            "star on top of tree",
            "why is there a star on the tree",
        ],
        "responses": [
            "The star on top of the Christmas tree reminds us of the Star of Bethlehem — the bright star that guided the three wise men to baby Jesus.",
            "Long ago, a special star appeared in the sky to announce the birth of Jesus. That's why we put a star on top of our Christmas trees!",
            "The Christmas star is a symbol of hope and guidance. It shines at the very top of the tree to light the way!",
        ]
    },
}


base = os.path.join(os.path.dirname(__file__), 'responses')

for topic, data in TOPICS.items():
    folder = os.path.join(base, topic)
    os.makedirs(folder, exist_ok=True)

    with open(os.path.join(folder, 'questions.txt'), 'w', encoding='utf-8') as f:
        f.write('\n'.join(data['patterns']) + '\n')

    with open(os.path.join(folder, 'responses.txt'), 'w', encoding='utf-8') as f:
        f.write('\n'.join(data['responses']) + '\n')

    print(f'  {topic:<22} {len(data["patterns"]):>2} patterns, {len(data["responses"])} responses')

print(f'\nDone. {len(TOPICS)} topics written.')