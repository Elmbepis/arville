<?php
// scorer.php – uses session variables for user identification

class Scorer {
    private $db;
    private $moduleId;
    private $debugMessages = [];

    public function __construct($dbConnection, $moduleId = 1) {
        $this->db = $dbConnection;
        $this->moduleId = $moduleId;
        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }
        $this->addDebug("Scorer: __construct called. Module ID: $moduleId");
    }

    private function addDebug($msg) {
        $this->debugMessages[] = $msg;
        error_log($msg);
    }

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

    private function saveToDatabase($correct, $level) {
        $this->addDebug("saveToDatabase START");

        // Use session user_id directly (if available)
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
    }

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

    public function getScore() {
        return $_SESSION['score'] ?? 0;
    }

    public function resetScore() {
        $_SESSION['score'] = 0;
    }
}