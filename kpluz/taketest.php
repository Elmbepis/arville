<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_GET['test'])) {
    die("Test name required in URL, e.g., ?test=proto");
}
$test_name = $_GET['test'];

// Connect to MySQL
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch test topic
$topic_stmt = $conn->prepare("SELECT topic FROM tests WHERE test = ?");
$topic_stmt->bind_param("s", $test_name);
$topic_stmt->execute();
$topic_result = $topic_stmt->get_result();
$test_topic = $topic_result->fetch_assoc()['topic'] ?? $test_name;

// Fetch questions
$stmt = $conn->prepare("SELECT * FROM questions WHERE test = ?");
$stmt->bind_param("s", $test_name);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title><?= htmlspecialchars($test_topic) ?></title>  
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: Arial, sans-serif; 
        text-align: center; 
        background: #f0f0f0; 
        margin: 0;
        padding: 20px;
    }

    /* Header background strip */
    .header {
        width: 100%;
        height: 264px;
        background: url('header-bg.jpg') repeat-x top center;
        background-size: auto 264px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-logo {
        max-height: 200px;
    }
    
    h2 {
        color: #003366;
        margin-bottom: 10px;
    }
    
    .test-info {
        color: #666;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    .test-form {
        background: white;
        padding: 20px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 800px;
        text-align: left;
    }
    
    .question {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    
    .question:last-child {
        border-bottom: none;
    }
    
    .question-text {
        font-weight: bold;
        margin-bottom: 10px;
        color: #003366;
    }
    
    .choices {
        margin-left: 20px;
    }
    
    .choice {
        margin-bottom: 8px;
    }
    
    input[type="radio"], input[type="text"] {
        margin-right: 8px;
    }
    
    input[type="text"] {
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 250px;
    }
    
    .submit-btn {
        padding: 12px 24px;
        border: none;
        background: #003366;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        margin-top: 20px;
    }
    
    .test-for-text {
        font-size: 1em;
        color: #dc3545;
        font-weight: bold;
    }
    
    .submit-btn:hover { 
        background: #0055aa; 
    }

    /* Action Buttons - Exact same as manual.php */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 50px;
        flex-wrap: wrap;
    }
    
    .dashboard-btn {
        padding: 12px 24px;
        border: none;
        background: #28a745;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .dashboard-btn:hover { 
        background: #218838; 
        color: white;
    }
    
    .logout-btn {
        padding: 12px 24px;
        border: none;
        background: #dc3545;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .logout-btn:hover { 
        background: #c82333; 
        color: white;
    }
  </style>
</head>
<body>
  <!-- Header with tiled background and logo -->
  <div class="header">
    <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
  </div>

  <h2><span class="test-for-text">Test for:</span><br/><?= htmlspecialchars($test_topic) ?></h2>
  <div class="test-info">
    <br/>Please answer all questions below. Once completed, click the Submit button at the bottom of the page.<br/><br/>
  </div>

  <div class="test-form">
    <form action="gradetest.php" method="post">
        <input type="hidden" name="test" value="<?= htmlspecialchars($test_name) ?>">
        <?php foreach ($questions as $index => $q): ?>
            <div class="question">
                <div class="question-text"><?= ($index+1) ?>. <?= htmlspecialchars($q['question']) ?></div>
                <input type="hidden" name="question_ids[]" value="<?= $q['id'] ?>">
                <input type="hidden" name="correct_answer_<?= $q['id'] ?>" value="<?= htmlspecialchars($q['correct']) ?>">

                <?php if ($q['type'] == 'MC'): ?>
                    <?php
                        $choices = [
                            $q['correct'],
                            $q['wrong1'],
                            $q['wrong2'],
                            $q['wrong3']
                        ];
                        shuffle($choices);
                    ?>
                    <div class="choices">
                    <?php foreach ($choices as $choice): ?>
                        <div class="choice">
                            <label>
                                <input type="radio" name="answer_<?= $q['id'] ?>" value="<?= htmlspecialchars($choice) ?>" required>
                                <?= htmlspecialchars($choice) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    </div>

                <?php elseif ($q['type'] == 'TF'): ?>
                    <div class="choices">
                        <div class="choice">
                            <label>
                                <input type="radio" name="answer_<?= $q['id'] ?>" value="True" required> True
                            </label>
                        </div>
                        <div class="choice">
                            <label>
                                <input type="radio" name="answer_<?= $q['id'] ?>" value="False" required> False
                            </label>
                        </div>
                    </div>

                <?php elseif ($q['type'] == 'FB'): ?>
                    <div class="choices">
                        <input type="text" name="answer_<?= $q['id'] ?>" placeholder="Type your answer here" required>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div style="text-align: center;">
            <input type="submit" value="Submit Test" class="submit-btn">
        </div>
    </form>
  </div>

  <!-- Action Buttons - Exact same format and position as manual.php -->
  <div class="action-buttons">
    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</body>
</html>