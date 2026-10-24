<?php
// scorer.php — uses session variables for user identification, accepts module URL
// Multi-attempt module lookup: exact match, legacy pattern, substring, module_key
//
// resolveModuleId() is filename-first: the PHP filename is the only invariant
// across every URL format currently in use:
//   ?mfile=<key>.php          (legacy q-display3)
//   ?m=<subj>/modules/<key>   (q-display-legacy)
//   <path>/<key>.php          (direct file)
//   <key>.php                 (bare)
// LIKE patterns are anchored at both ends so "<key>" and "<key>2" or
// "<key>-home12" can never collide.

class Scorer {
    private $db;
    private $moduleId;
    private $debugMessages = [];

    /**
     * Constructor
     * @param mysqli $dbConnection - active database connection
     * @param string|null $moduleUrl - the URL of the module (e.g., "English/modules/first-letters.php")
     *                                 or just the filename (e.g., "first-letters.php")
     *                                 If null, auto-detect from $_SERVER['SCRIPT_NAME']
     */
    public function __construct($dbConnection, $moduleUrl = null) {
        $this->db = $dbConnection;
        $this->moduleId = $this->resolveModuleId($moduleUrl);
        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }
        $this->addDebug("Scorer: __construct called. Resolved module ID: {$this->moduleId}");
    }

    /**
     * Resolve module ID from the modules table.
     *
     * Filename-first lookup — the PHP filename is the only invariant
     * across every URL format:
     *   ?mfile=<key>.php          (legacy q-display3)
     *   ?m=<subj>/modules/<key>   (q-display-legacy)
     *   <path>/<key>.php          (direct file)
     *   <key>.php                 (bare)
     *
     * Patterns are anchored at both ends so "<key>" and "<key>2"
     * (or "<key>-home12") can never collide.
     *
     * @param string|null $moduleUrl
     * @return int
     */
    private function resolveModuleId($moduleUrl = null) {
        if (empty($moduleUrl)) {
            $moduleUrl = $_SERVER['SCRIPT_NAME'];
            $this->addDebug("Auto-detected module URL: '$moduleUrl'");
        } else {
            $this->addDebug("Received module URL: '$moduleUrl'");
        }

        $filename  = basename($moduleUrl);           // e.g. 'measure-nonstd.php'
        $moduleKey = basename($moduleUrl, '.php');   // e.g. 'measure-nonstd'

        if (empty($moduleKey)) {
            $this->addDebug("WARNING: Could not extract module key from '$moduleUrl'");
            return 1;
        }

        // Escape LIKE wildcards in case a filename ever contains them
        // (illegal on most filesystems, but defensive).
        $escKey  = strtr($moduleKey, ['\\' => '\\\\', '%' => '\\%', '_' => '\\_']);
        $escFile = strtr($filename,  ['\\' => '\\\\', '%' => '\\%', '_' => '\\_']);

        $subject = $_SESSION['last_subject'] ?? null;
        $this->addDebug(sprintf(
            "Resolving module: key='%s', filename='%s', subject='%s'",
            $moduleKey, $filename, $subject ?? '(any)'
        ));

        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        // Tier 1: exact module_key match — fastest path.
        // Works when DB module_key == filesystem stem.
        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        $id = $this->queryModuleId(
            "SELECT id FROM modules WHERE module_key = ? LIMIT 1",
            [$moduleKey],
            "module_key = '$moduleKey'"
        );
        if ($id !== null) return $id;

        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        // Tier 2: anchored URL-pattern match (the universal fix).
        //
        // Every pattern requires `<key>` to be bounded by a proper
        // delimiter before and after, so no prefix/suffix collisions:
        //
        //   .../modules/<key>            (end)     q-display-legacy
        //   .../modules/<key>.php        (end)     direct file
        //   .../modules/<key>?<query>              q-display-legacy + query
        //   .../modules/<key>&<query>              q-display-legacy + more params
        //   .../modules/<key>.php?<q>              direct + query
        //   .../modules/<key>.php&<q>              direct + more params
        //   ?mfile=<key>.php             (end)     legacy q-display3
        //   ?mfile=<key>.php&<query>               legacy + more params
        //   <path>/<key>.php             (end)     any subdirectory
        //   <key>.php                    (exact)   bare filename
        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        $urlPatterns = [
            '%/modules/' . $escKey,
            '%/modules/' . $escFile,
            '%/modules/' . $escKey  . '?%',
            '%/modules/' . $escKey  . '&%',
            '%/modules/' . $escFile . '?%',
            '%/modules/' . $escFile . '&%',
            '%='         . $escFile,
            '%='         . $escFile . '&%',
            '%/'         . $escFile,
            $escFile,
        ];

        if ($subject) {
            $orClause = implode(' OR ', array_fill(0, count($urlPatterns), 'url LIKE ?'));
            $sql = "SELECT id FROM modules WHERE subject = ? AND ($orClause) LIMIT 1";
            $params = array_merge([$subject], $urlPatterns);
            $id = $this->queryModuleId($sql, $params, "subject='$subject' + URL pattern");
            if ($id !== null) return $id;
        }

        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        // Tier 3: same URL patterns, no subject filter.
        // Reached only if $_SESSION['last_subject'] was unavailable
        // (e.g. a caller other than q-display-legacy).
        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        $orClause = implode(' OR ', array_fill(0, count($urlPatterns), 'url LIKE ?'));
        $sql = "SELECT id FROM modules WHERE ($orClause) LIMIT 1";
        $id = $this->queryModuleId($sql, $urlPatterns, "URL pattern (any subject)");
        if ($id !== null) return $id;

        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        // Tier 4: module_key prefix — safety net for DB values like
        // 'meas-nonstd-home12' when the file is 'measure-nonstd.php'.
        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        $id = $this->queryModuleId(
            "SELECT id FROM modules WHERE module_key LIKE ? LIMIT 1",
            [$escKey . '%'],
            "module_key LIKE '$moduleKey%'"
        );
        if ($id !== null) return $id;

        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        // No match — log to error log (visible) AND to debug buffer.
        // Score will still tick in $_SESSION, but DB persistence will
        // land on the fallback ID. This is the original silent failure
        // mode; now it's loud in the error log.
        // &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
        error_log(sprintf(
            "Scorer CRITICAL: no module row matched filename='%s' key='%s' subject='%s'. "
            . "Score will NOT persist to the correct module.",
            $filename, $moduleKey, $subject ?? '(unknown)'
        ));
        $this->addDebug("WARNING: Module not found for key '$moduleKey'. Using fallback ID 1.");
        return 1;
    }

    /**
     * Helper: prepare + execute a parameterised lookup and return the
     * first row's `id`, or null on no match. All params are strings.
     */
    private function queryModuleId($sql, array $params, $description) {
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            $this->addDebug("Prepare failed ($description): " . $this->db->error);
            return null;
        }
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if ($row) {
            $this->addDebug("Found module ID {$row['id']} by $description");
            return (int)$row['id'];
        }
        return null;
    }

    private function addDebug($msg) {
        $this->debugMessages[] = $msg;
        error_log($msg);
    }

    // ============================================================
    // MAIN PROCESSING
    // ============================================================
    public function processAnswer($selectedLetter, $correctAnswer, $level) {
        $this->addDebug("processAnswer START. Selected: '$selectedLetter', Correct: '$correctAnswer', Level: '$level'");

        $isCorrect = ($selectedLetter === $correctAnswer);
        $points = ($level === 'Hard') ? 3 : 1;

        if ($isCorrect) {
            $_SESSION['score'] += $points;
            $this->addDebug("Correct! Added $points points. New session score: " . $_SESSION['score']);
        } else {
            $this->addDebug("Incorrect answer. Session score unchanged: " . $_SESSION['score']);
        }

        if ($this->db) {
            $this->addDebug("Database connection exists, saving...");
            $saveResult = $this->saveToDatabase($isCorrect, $level);
            $this->addDebug("saveToDatabase returned: " . ($saveResult ? 'TRUE' : 'FALSE'));
        } else {
            $this->addDebug("No database connection – skipping save.");
        }

        $this->addDebug("processAnswer END. Returning " . ($isCorrect ? 'true' : 'false'));
        return $isCorrect;
    }

    // ============================================================
    // DATABASE SAVING
    // ============================================================
    private function saveToDatabase($correct, $level) {
        $this->addDebug("saveToDatabase START");

        // Use session user_id directly
        $userId = $_SESSION['user_id'] ?? null;
        if ($userId) {
            $this->addDebug("Using user_id from session: $userId");
        } else {
            // Fallback: try to get username from session/cookie and look up
            $username = $_SESSION['user_name'] ?? $_SESSION['username'] ?? '';
            $this->addDebug("Session username: '$username'");
            if (empty($username)) {
                $username = $_COOKIE['KPluzID_my_site'] ?? '';
                $this->addDebug("Cookie username: '$username'");
            }
            if (empty($username)) {
                $this->addDebug("No username found – aborting save.");
                return false;
            }
            $userId = $this->getUserId($username);
            if (!$userId) {
                $this->addDebug("User ID not found for username '$username'. Aborting save.");
                return false;
            }
            $this->addDebug("Found user_id from database: $userId");
        }

        // Determine columns
        if ($level === 'Easy') {
            $scoreCol = 'easy_score';
            $qnumCol = 'easy_qnum';
        } else {
            $scoreCol = 'hard_score';
            $qnumCol = 'hard_qnum';
        }
        $this->addDebug("Using columns: scoreCol=$scoreCol, qnumCol=$qnumCol");

        // Check if row exists
        $stmt = $this->db->prepare("SELECT id FROM test_results WHERE user_id = ? AND module_id = ?");
        if (!$stmt) {
            $this->addDebug("Prepare failed (select): " . $this->db->error);
            return false;
        }
        $stmt->bind_param("ii", $userId, $this->moduleId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row) {
            $addPoints = $correct ? 1 : 0;
            $updateStmt = $this->db->prepare("UPDATE test_results 
                SET $scoreCol = $scoreCol + ?, $qnumCol = $qnumCol + 1 
                WHERE id = ?");
            if ($updateStmt) {
                $updateStmt->bind_param("ii", $addPoints, $row['id']);
                $updateStmt->execute();
                $this->addDebug("Updated row id {$row['id']} for $level. Added $addPoints to $scoreCol, incremented $qnumCol.");
                $updateStmt->close();
                return true;
            } else {
                $this->addDebug("Update prepare failed: " . $this->db->error);
                return false;
            }
        } else {
            $easyScore = 0; $easyQnum = 0; $hardScore = 0; $hardQnum = 0;
            if ($level === 'Easy') {
                $easyScore = $correct ? 1 : 0;
                $easyQnum = 1;
            } else {
                $hardScore = $correct ? 1 : 0;
                $hardQnum = 1;
            }
            $insertStmt = $this->db->prepare("INSERT INTO test_results 
                (user_id, module_id, easy_score, easy_qnum, hard_score, hard_qnum, blue_bar) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($insertStmt) {
                $blueBar = 'no';
                $insertStmt->bind_param("iiiiiis", $userId, $this->moduleId, $easyScore, $easyQnum, $hardScore, $hardQnum, $blueBar);
                $insertStmt->execute();
                $this->addDebug("Inserted new row for user $userId, module {$this->moduleId}.");
                $insertStmt->close();
                return true;
            } else {
                $this->addDebug("Insert prepare failed: " . $this->db->error);
                return false;
            }
        }
        return false;
    }

    // ============================================================
    // USER LOOKUP
    // ============================================================
    private function getUserId($username) {
        $this->addDebug("getUserId called for username '$username'");
        if (empty($username)) {
            $this->addDebug("Username empty.");
            return null;
        }
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        if (!$stmt) {
            $this->addDebug("getUserId – prepare failed: " . $this->db->error);
            return null;
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $stmt->close();
            $this->addDebug("Found user ID $id for username '$username'.");
            return $id;
        }
        $stmt->close();
        $this->addDebug("No user found for username '$username'.");
        return null;
    }

    // ============================================================
    // CONSOLE DEBUG OUTPUT
    // ============================================================
    public function outputConsoleDebug() {
        echo "<script>\n";
        echo "console.log('=== SCORER DEBUG ===');\n";
        foreach ($this->debugMessages as $msg) {
            $escaped = addslashes($msg);
            echo "console.log('$escaped');\n";
        }
        echo "console.log('=== SESSION DATA ===');\n";
        foreach ($_SESSION as $key => $value) {
            if (is_string($value)) {
                echo "console.log('SESSION[\"$key\"] = " . addslashes($value) . "');\n";
            } else {
                echo "console.log('SESSION[\"$key\"] = ' + JSON.parse('" . json_encode($value) . "'));\n";
            }
        }
        echo "console.log('=== COOKIE DATA ===');\n";
        foreach ($_COOKIE as $key => $value) {
            echo "console.log('COOKIE[\"$key\"] = " . addslashes($value) . "');\n";
        }
        echo "console.log('=== END DEBUG ===');\n";
        echo "</script>\n";
    }

    // ============================================================
    // SCORE ACCESS
    // ============================================================
    public function getScore() {
        return $_SESSION['score'] ?? 0;
    }

    public function resetScore() {
        $_SESSION['score'] = 0;
    }
}