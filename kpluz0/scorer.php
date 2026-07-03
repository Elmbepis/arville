<?php
// scorer.php – uses session variables for user identification, accepts module URL

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
     * Resolve module ID from modules table using the provided URL or auto-detection
     * @param string|null $moduleUrl
     * @return int
     */
    private function resolveModuleId($moduleUrl = null) {
        // If no URL provided, try to auto-detect from script name
        if (empty($moduleUrl)) {
            $moduleUrl = $_SERVER['SCRIPT_NAME'];
            $this->addDebug("Auto-detected module URL: '$moduleUrl'");
        } else {
            $this->addDebug("Received module URL: '$moduleUrl'");
        }

        // Extract the base filename (e.g., "colors.php" from a full path)
        $filename = basename($moduleUrl);
        $this->addDebug("Extracted filename: '$filename'");

        // Try to match by URL (which should contain just the filename)
        $stmt = $this->db->prepare("SELECT id FROM modules WHERE url = ? LIMIT 1");
        if ($stmt) {
            $stmt->bind_param("s", $filename);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $stmt->close();
                $this->addDebug("Found module ID: $id by filename '$filename'.");
                return $id;
            }
            $stmt->close();
        }

        // If not found, try by module_key (filename without .php)
        $moduleKey = basename($moduleUrl, '.php');
        if (!empty($moduleKey)) {
            $stmt2 = $this->db->prepare("SELECT id FROM modules WHERE module_key = ? LIMIT 1");
            if ($stmt2) {
                $stmt2->bind_param("s", $moduleKey);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                if ($row2 = $result2->fetch_assoc()) {
                    $id = $row2['id'];
                    $stmt2->close();
                    $this->addDebug("Found module ID $id by module_key '$moduleKey'.");
                    return $id;
                }
                $stmt2->close();
            }
        }

        // Fallback to ID 1 with warning
        $this->addDebug("WARNING: Module not found for filename '$filename'. Using fallback ID 1.");
        return 1;
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