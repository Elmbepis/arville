# Handover: Converting SciencePluz Legacy PHP Quiz Modules to Modern KPluz Question Banks

## Mission
When the user uploads a legacy module (e.g., `heat.php`, `magnetism.php`, `electricity.php`), **deliver a downloadable, standalone PHP question-bank file** compatible with the modern quiz giver. The task is: **convert, fix, sanitize, deduplicate, balance, and punctuate**. Current minimum: **30 valid questions per grade/bank**, unless the user changes it. **Do not add questions if the minimum is already met.** Do not manufacture filler merely to hit a count; prefer meaningful legacy material and transparent reporting of any shortfall.

## User's critical preferences
1. **Conceptual repetition is good reinforcement** when wording, examples, or circumstances differ meaningfully. A battery powering a phone vs. a flashlight is fine. Do not delete these merely because they test the same concept.
2. Remove exact duplicates and nearly identical questions that merely change superficial words without adding a meaningful situation or perspective.
3. Preserve useful original questions and images. Fix actual science, answer-key, grammar, distractor, or parsing errors. Avoid gratuitous stylistic rewrites.
4. **Every declarative question/stem, especially True/False and fill-in-the-blank, must end with `.`**. Every genuine interrogative must end with `?`. Legacy software may have appended punctuation; the modern quiz giver does not. Do not transform `What do you call ...?` into `What do you call ....`.
5. Balance difficulty and MC/TF variety sensibly, without artificial quotas that damage question quality. Avoid all-True or all-False TF banks.
6. No padding with generic, context-free questions (previous conversion of Electricity was criticized for repetitive “In a science quiz…” filler).

## Actual modern PHP structure (verified from previous outputs)
```php
<?php
$_SESSION['title'] = 'Heat';
if ($grd == 0) {
    $questions = array(
        'Is this hot or cold?=hot>cold+warm<cool**lhs-hot1.jpg',
        'We need ____ to boil some water.=heat>light+sound<electricity',
        'A hot drink cools when left on a table.=true>false',
        'A magnet attracts every metal.=false>true',
    );
}
elseif ($grd == 1) {
    $questions = array(/* grade-appropriate items */);
}
// Continue through Grade 7.
elseif ($grd >= 8 && $grd <= 10) {
    $questions = array(/* shared Grades 8–10 bank, if following prior convention */);
}
?>
```

**MC serialization:** `STEM=CORRECT>WRONG1+WRONG2<WRONG3` (three distinct wrong answers). **TF serialization:** `DECLARATIVE STATEMENT=true>false` or `...=false>true` (the *statement itself* is evaluated; keys must match its actual truth). **Optional image suffix:** `**image-filename.jpg` at the end of the entry, *after* answers. Preserve actual image names exactly. Some earlier modules use image-based questions. PHP single-quoted strings require escaping internal apostrophes (`Earth\'s`) and backslashes as appropriate. The question stem should contain `____` for blanks, followed by a period if declarative (`The answer is ____.`). Avoid the delimiters `=`, `>`, `+`, `<`, and `**` in ordinary stem/choice text because the modern parser uses them structurally.

## How the legacy source works
Legacy files contain extensive HTML, session/scoring logic, old `mysql_*` code, and arrays `$mc[0]` ... `$mc[10]`, `$tf[0]` ... `$tf[10]`, plus `$mcchoices[grade][choicegroup]`. **Do not port the legacy UI, scoring, database credentials, or session mechanics**; extract question content only.

Legacy MC example:
```php
$mcchoices[1][1] = array('color','music','sound','light','heat','noise');
$mc[1] = array('We cook our food using ____.=1heat');
```
The `=1heat` indicates choice-group 1 and keyed answer `heat`; construct a four-choice modern item with three **valid, unique, unambiguously wrong** distractors. Do not assume every legacy choice group is safe: some legacy group numbers are wrong, some keyed answers are absent from the referenced group, and some groups mix categories. Generate/repair distractors according to the stem rather than blindly sampling.

Legacy TF example:
```php
$tf[1] = array('Heat moves from hot to cold=Heat moves from cold to hot');
```
The two sides are **opposing legacy variants**, not the modern key. Convert into a single clear statement with `=true>false` or `=false>true`; optionally use the false variant as a separate item when meaningfully useful, with correct truth and punctuation. Verify both statements independently; legacy variants are not always accurate. Image suffixes may be attached to the second half: `TRUE_TEXT=FALSE_TEXT**file.jpg`.

**Grade convention:** `$grd == 0` Kinder; 1–7 correspond to grades; earlier conversions used a **single shared `$grd >= 8 && $grd <= 10` bank** for Grades 8–10. Confirm if a new module/user specifies different grade routing. Old Easy/Medium/Hard mappings used grade offsets; modern output should only define grade question arrays, not old level selection.

## Recommended end-to-end workflow
1. **Inspect the entire uploaded source** (not just the visible truncated preview) and parse `$mc`, `$tf`, and `$mcchoices` for all legacy grade levels. Use the mounted file in `/mnt/data` and Python/PHP tools; do not infer content from a partial preview.
2. Inventory original counts, image-dependent items, topic coverage, exact duplicates, and obvious answer-key/choice-group problems.
3. Convert into the exact modern string format. Preserve every sound, useful legacy question, including different real-world applications of the same principle. Use image suffixes faithfully.
4. **Sanitize scientific accuracy**: correct invalid premises, false universal statements, misleading simplifications, and scientifically incorrect keys. Check each MC distractor against the exact question (one correct answer only). In the Heat legacy file, known traps include the **SI unit of heat being joule, not calorie**; incorrect assumptions that total thermal energy equals total kinetic energy; inaccurate absolute statements about thermal conduction; and wrong group indexes. Do not perpetuate them.
5. **Dedup narrowly**: eliminate exact duplicates and essentially identical phrasing/scenarios within the same output bank. Keep concept reinforcement through different objects, settings, grade-appropriate applications, or reasoning.
6. **Balance and reach 30** per grade or shared bank: first retain sound native-grade items; if short, borrow suitable questions from neighboring grades and adapt them to the intended level, avoiding duplicates. Only **author genuinely useful new questions** if still short; do not add any if already at 30. Do not silently import material too advanced for Kinder/early grades. Counts may exceed 30 when the original grade has more worthwhile items; 30 is a floor, not an exact cap.
7. **Punctuate the STEM, not the answer**: all statements end `.`, all direct questions end `?`. The blank format `____.` is intentional. Check question phrases such as “What do you call ...” even if legacy source lacks a `?`.
8. Validate output with `php -l filename.php`, plus a parser-based audit of every serialized item: correct delimiter count, 4 distinct MC choices, no empty choices, TF exact `true/false` or `false/true`, intact image suffixes, no duplicate stems/scenarios within bank, no missing punctuation, minimum counts. Syntax validation **does not** establish scientific accuracy.
9. Spot-check all grades and manually review suspicious scientific items. Images require actual image inspection; if the images are not provided, **do not claim the image-based answer keys were visually verified**.
10. Save a **real file** under `/mnt/data`, verify it exists, and provide a working sandbox download link plus concise counts and honest notes on limitations.

## Failure modes observed in prior work (do better)
- An earlier Electricity conversion introduced repetitive filler and later criticized the user's reused questions for conceptual repetition. **Do not repeat that mistake.**
- A previous Heat converted output contains stems like `The transfer of heat ... is called what.=convection...`, showing why punctuation requires **sentence-type detection**, not just blindly appending periods.
- Some prior converted Heat entries had simplistic or scientifically dubious definitions; ensure a genuine content audit rather than asserting that `php -l` means fully sanitized.
- Image-based items may have answers keyed without source images available. Preserve names but explicitly flag unverified images.
- Old files may contain sensitive legacy DB credentials. Never reproduce them in the output or handover.

## Delivery expectations
Provide the PHP artifact (not a prose-only description). Summarize question counts for Kinder, Grades 1–7, and Grades 8–10 (indicate whether shared). State what was repaired, what was retained, and whether visual/scientific checks remain incomplete. Do not claim “all questions checked” unless that work was performed.

## Current reference files (may or may not be available in a new chat)
- `heat.php` → `heat-converted-sanitized.php`
- `magnetism.php` → `magnetism-converted-punctuated.php`
These names are for orientation only. **In a new chat, ask the user to upload the legacy file to be converted**; do not assume prior sandbox files persist.
