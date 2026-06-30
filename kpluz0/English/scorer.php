<?php
// scorer.php – processes answer, updates session score (weighted) and database (raw count)

class Scorer {
    private $db;
    private $moduleId = 1; // adjust to your module's ID
    private $pointsMap = ['Easy' => 1, 'Hard' => 3]; // for session score only

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }
    }

    public function processAnswer($selectedLetter, $correctAnswer, $level) {
        $isCorrect = ($selectedLetter === $correctAnswer);

        // Session score: weighted points (1 for Easy, 3 for Hard)
        $sessionPoints = $this->pointsMap[$level] ?? 1;
        if ($isCorrect) {
            $_SESSION['score'] += $sessionPoints;
        }

        // Database: always store 1 for a correct answer (raw count)
        if ($this->db) {
            $this->saveToDatabase($isCorrect, $level);
        }

        return $isCorrect;
    }

    private function saveToDatabase($correct, $level) {
        $username = $_COOKIE['KPluzID_my_site'] ?? '';
        $userId = $this->getUserId($username);
        if (!$userId) return;

        // Determine which columns to update
        if ($level === 'Easy') {
            $scoreCol = 'easy_score';
            $qnumCol = 'easy_qnum';
        } else { // 'Hard' or fallback
            $scoreCol = 'hard_score';
            $qnumCol = 'hard_qnum';
        }

        // Check if a row exists for this user and module
        $stmt = $this->db->prepare("SELECT id FROM test_results WHERE user_id = ? AND module_id = ?");
        if (!$stmt) return;
        $stmt->bind_param("ii", $userId, $this->moduleId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Update existing row – increment score by 1 if correct, else 0; increment question count
            $addPoints = $correct ? 1 : 0;
            $updateStmt = $this->db->prepare("UPDATE test_results 
                SET $scoreCol = $scoreCol + ?, $qnumCol = $qnumCol + 1 
                WHERE id = ?");
            if ($updateStmt) {
                $updateStmt->bind_param("ii", $addPoints, $row['id']);
                $updateStmt->execute();
                $updateStmt->close();
            }
        } else {
            // Insert a new row – set initial values for both levels
            $easyScore = 0;
            $easyQnum = 0;
            $hardScore = 0;
            $hardQnum = 0;
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
                $insertStmt->close();
            }
        }
        $stmt->close();
    }

    private function getUserId($username) {
        if (empty($username)) return null;
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $stmt->close();
                return $id;
            }
            $stmt->close();
        }
        return null;
    }

    public function getScore() {
        return $_SESSION['score'] ?? 0;
    }

    public function resetScore() {
        $_SESSION['score'] = 0;
    }
}