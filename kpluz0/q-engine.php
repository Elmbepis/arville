<?php
// q-engine.php — generic question engine
// Two modes: 'procedural' (randomized params) and 'static' (fixed bank)
// Static mode supports 2-, 3-, or 4-choice questions (T/F and MCQ)

class QEngine {
    private $template;
    private $moduleKey;
    private $level;
    private $debug = [];

    public function __construct($template, $moduleKey) {
        $this->template = $template;
        $this->moduleKey = $moduleKey;
        $this->level = $template['levels'][0] ?? 'Easy';
    }

    public function setLevel($level) {
        if (in_array($level, $this->template['levels'], true)) {
            $this->level = $level;
        }
    }

    public function getLevel()  { return $this->level; }
    public function getLevels() { return $this->template['levels']; }
    public function getDebug()  { return $this->debug; }

    public function generate($sessionKey) {
        $type = $this->template['type'] ?? 'procedural';
        if ($type === 'static') {
            return $this->pickStatic($sessionKey);
        }
        return $this->generateProcedural($sessionKey);
    }

    // ============ STATIC (fixed bank) ============

    private function pickStatic($sessionKey) {
        $bank = $this->template['questions'] ?? [];
        if (empty($bank)) return null;

        $used = $_SESSION[$sessionKey]['used'] ?? [];
        $available = [];
        foreach ($bank as $idx => $raw) {
            if (!in_array($idx, $used, true)) $available[] = $idx;
        }
        if (empty($available)) {
            $used = [];
            $available = array_keys($bank);
        }

        $idx = $available[array_rand($available)];
        $used[] = $idx;

        $trackLimit = max(1, count($bank) - 1);
        if (count($used) > $trackLimit) {
            $used = array_slice($used, -$trackLimit);
        }
        if (!isset($_SESSION[$sessionKey])) $_SESSION[$sessionKey] = [];
        $_SESSION[$sessionKey]['used'] = $used;

        $parsed = $this->parseMCQ($bank[$idx]);
        if ($parsed === null) {
            // Malformed entry — try again with a fresh pick
            return $this->pickStatic($sessionKey);
        }

        // Resolve image path
        if (!empty($parsed['image']) && !empty($this->template['image_base'])) {
            $img = $parsed['image'];
            if (strpos($img, '/') === false) {
                $img = $this->template['image_base'] . $img;
            }
            $parsed['image'] = $img;
        }

        $this->debug[] = "Static question picked: idx=$idx, choices=" . count($parsed['choices']);
        return $parsed;
    }

    private function parseMCQ($raw) {
        // Formats supported (all with optional **image.jpg suffix):
        //   4 choices:  prompt.=correct>wrong1+wrong2<wrong3
        //   3 choices:  prompt.=correct>wrong1+wrong2
        //   2 choices:  prompt.=correct>wrong   (T/F — answer is "tama" or "mali")
        $image = null;
        if (($imgPos = strpos($raw, '**')) !== false) {
            $image = substr($raw, $imgPos + 2);
            $raw = substr($raw, 0, $imgPos);
        }

        $p1 = strpos($raw, '=');              // prompt | answer
        $p2 = ($p1 === false) ? false : strpos($raw, '>', $p1);

        if ($p1 === false || $p2 === false) {
            $this->debug[] = "parseMCQ: malformed question: $raw";
            return null;
        }

        $prompt  = trim(substr($raw, 0, $p1));
        $correct = trim(substr($raw, $p1 + 1, $p2 - $p1 - 1));

        // Everything after '>' is the distractor list (split on + and <)
        $distractorSection = substr($raw, $p2 + 1);
        $distractors = preg_split('/[+<]/', $distractorSection);
        $distractors = array_map('trim', $distractors);
        $distractors = array_values(array_filter($distractors, fn($d) => $d !== ''));

        $choices = array_merge([$correct], $distractors);
        shuffle($choices);

        return [
            'prompt'  => $prompt,
            'answer'  => $correct,
            'image'   => $image,
            'choices' => $choices,
            'params'  => [],
        ];
    }

    // ============ PROCEDURAL (randomized params) ============

    private function generateProcedural($sessionKey) {
        if (!isset($this->template['template'])) {
            $this->debug[] = "generateProcedural: no 'template' key — wrong mode?";
            return null;
        }

        $spec = $this->template['template'];
        $uniqueKey = $spec['unique_key'] ?? null;

        $used = $_SESSION[$sessionKey]['used'] ?? '';
        $maxAttempts = 100;
        $params = [];

        for ($attempt = 0; $attempt < $maxAttempts; $attempt++) {
            $params = $this->resolveAllParams($spec['params']);
            if ($uniqueKey === null) break;
            $key = $this->interpolate($uniqueKey, $params);
            if (strpos($used, $key) === false) break;
        }

        if ($uniqueKey !== null) {
            $key = $this->interpolate($uniqueKey, $params);
            $used .= $key . ',';
            if (strlen($used) > 300) $used = substr($used, -300);
            if (!isset($_SESSION[$sessionKey])) $_SESSION[$sessionKey] = [];
            $_SESSION[$sessionKey]['used'] = $used;
        }

        $answer = $this->interpolate($spec['answer'], $params);
        $prompt = $this->resolveValue($spec['prompt'], $params);
        $image  = isset($spec['image']) ? $this->interpolate($spec['image'], $params) : null;

        $distractors = $this->buildDistractors($spec['distractors'], $params, $answer);
        $choices = array_merge([$answer], $distractors);
        shuffle($choices);

        $this->debug[] = "Procedural: params=" . json_encode($params) . " answer=$answer";

        return [
            'prompt'  => $prompt,
            'answer'  => $answer,
            'image'   => $image,
            'choices' => $choices,
            'params'  => $params,
        ];
    }

    private function resolveAllParams($specs) {
        $out = [];
        foreach ($specs as $name => $spec) {
            $out[$name] = $this->resolveParam($spec, $out);
        }
        return $out;
    }

    private function resolveParam($spec, $resolved) {
        switch ($spec['type']) {
            case 'choice':
                if (isset($spec['weights'])) return $this->pickWeighted($spec['weights']);
                return $this->pickUniform($spec['from']);
            case 'int':
                $min = $this->resolveBound($spec['min'], $resolved);
                $max = $this->resolveBound($spec['max'], $resolved);
                return rand($min, $max);
            case 'literal':
                return $spec['value'];
            case 'lookup':
                $src = $resolved[$spec['source']] ?? null;
                return $spec['map'][$src] ?? ($spec['default'] ?? null);
        }
        return null;
    }

    private function resolveBound($bound, $resolved) {
        if (is_array($bound) && isset($bound['by_param'])) {
            $refVal = $resolved[$bound['by_param']] ?? null;
            return $bound['map'][$refVal] ?? 1;
        }
        return $bound;
    }

    private function pickUniform($list) { return $list[array_rand($list)]; }

    private function pickWeighted($weights) {
        $total = array_sum($weights);
        $roll = rand(1, $total);
        $cum = 0;
        foreach ($weights as $key => $w) {
            $cum += $w;
            if ($roll <= $cum) return $key;
        }
        return array_key_first($weights);
    }

    private function resolveValue($spec, $params) {
        if (is_string($spec)) return $this->interpolate($spec, $params);
        if (is_array($spec) && isset($spec[0])) {
            foreach ($spec as $rule) {
                if ($this->evalCondition($rule['when'], $params)) {
                    return $this->interpolate($rule['value'], $params);
                }
            }
        }
        return '';
    }

    private function evalCondition($cond, $params) {
        list($p, $op, $val) = $cond;
        $actual = $params[$p] ?? null;
        switch ($op) {
            case '>':      return $actual > $val;
            case '>=':     return $actual >= $val;
            case '<':      return $actual < $val;
            case '<=':     return $actual <= $val;
            case '==':     return $actual == $val;
            case '!=':     return $actual != $val;
            case 'in':     return in_array($actual, (array)$val);
            case 'not_in': return !in_array($actual, (array)$val);
        }
        return false;
    }

    private function buildDistractors($spec, $params, $answer) {
        $count = $spec['count'];
        if (is_array($count)) {
            $count = $count[$this->level] ?? 1;
        }

        $pool = $spec['from'] ?? [];
        if (isset($spec['from_if_answer_in'][$answer])) {
            $pool = $spec['from_if_answer_in'][$answer];
        }

        if ($spec['type'] === 'sample') {
            $pool = array_values(array_filter($pool, fn($v) => $v !== $answer));
            shuffle($pool);
            return array_slice($pool, 0, $count);
        }

        if ($spec['type'] === 'formula') {
            $out = [];
            foreach ($spec['expressions'] as $expr) {
                $val = $this->evalFormula($expr, $params);
                if ($val !== $answer && !in_array($val, $out, true)) {
                    $out[] = $val;
                }
                if (count($out) >= $count) break;
            }
            return $out;
        }

        return [];
    }

    private function evalFormula($expr, $params) {
        $s = $this->interpolate($expr, $params);
        if (!preg_match('#^[\d\s\+\-\*/\(\)\.]+$#', $s)) return $s;
        return (string) eval("return $s;");
    }

    private function interpolate($str, $params) {
        return preg_replace_callback('/\{(\w+)(?::([^}]+))?\}/', function ($m) use ($params) {
            $name = $m[1];
            $format = $m[2] ?? null;
            $val = $params[$name] ?? '';
            if ($format === null) return (string)$val;
            if (preg_match('/^(\d+)$/', $format, $fm)) {
                $n = (int)$fm[1];
                if (is_numeric($val)) return str_pad((string)$val, $n, '0', STR_PAD_LEFT);
                return substr((string)$val, 0, $n);
            }
            return (string)$val;
        }, $str);
    }
}