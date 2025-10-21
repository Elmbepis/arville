<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing test names
$tests = [];
$sql = "SELECT DISTINCT test FROM questions";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $tests[] = $row['test'];
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $test = !empty($_POST["new_test"]) ? $_POST["new_test"] : $_POST["test"];
    $type = $_POST["type"];
    $question = $_POST["question"];
    $correct = $_POST["correct_answer"];

	if ($type == "FB") {
	    $wrong1 = "";
	    $wrong2 = "";
	    $wrong3 = "";
	} elseif ($type == "TF") {
	    $wrong1 = isset($_POST['wrong_answer1']) ? $_POST['wrong_answer1'] : '';
	    $wrong2 = "";
	    $wrong3 = "";
	} else {
	    // Multiple Choice
	    $wrong1 = isset($_POST['wrong_answer1']) ? $_POST['wrong_answer1'] : '';
	    $wrong2 = isset($_POST['wrong_answer2']) ? $_POST['wrong_answer2'] : '';
	    $wrong3 = isset($_POST['wrong_answer3']) ? $_POST['wrong_answer3'] : '';
	}

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO questions (test, type, question, correct, wrong1, wrong2, wrong3) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $test, $type, $question, $correct, $wrong1, $wrong2, $wrong3);
    $stmt->execute();

    echo "<p>Question submitted successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Submit Question</title>
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
        height: 264px; /* full height of the image */
        background: url('header-bg.jpg') repeat-x top center;
        background-size: auto 264px; /* keep original height, tile horizontally */
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-logo {
        max-height: 200px; /* keep logo smaller than header */
    }
    
    h2 {
        color: #003366;
        margin-bottom: 10px;
    }
    
    .page-info {
        color: #666;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    .form-container {
        background: white;
        padding: 30px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 800px;
        text-align: left;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #003366;
    }
    
    input, select, textarea { 
        display: block; 
        margin: 8px 0; 
        width: 100%; 
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    
    textarea {
        height: 100px;
        resize: vertical;
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
        width: auto;
    }
    
    .submit-btn:hover { 
        background: #0055aa; 
    }
    
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
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
    
    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }
    
    .test-selection {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border-left: 4px solid #003366;
    }
  </style>
  <script>
        function adjustWrongAnswers() {
            const type = document.querySelector('[name="type"]').value;
            const wrong1 = document.querySelector('[name="wrong_answer1"]');
            const wrong2 = document.querySelector('[name="wrong_answer2"]');
            const wrong3 = document.querySelector('[name="wrong_answer3"]');

            if (type === "TF") {
                wrong1.disabled = false;
                wrong1.placeholder = "Enter 'False' for True/False questions";
                wrong2.value = "";
                wrong2.disabled = true;
                wrong2.placeholder = "";
                wrong3.value = "";
                wrong3.disabled = true;
                wrong3.placeholder = "";
            } else if (type === "FB") {
                wrong1.value = "";
                wrong1.disabled = true;
                wrong1.placeholder = "Not needed for Fill in the Blank";
                wrong2.value = "";
                wrong2.disabled = true;
                wrong2.placeholder = "";
                wrong3.value = "";
                wrong3.disabled = true;
                wrong3.placeholder = "";
            } else {
                wrong1.disabled = false;
                wrong1.placeholder = "Wrong answer option";
                wrong2.disabled = false;
                wrong2.placeholder = "Wrong answer option";
                wrong3.disabled = false;
                wrong3.placeholder = "Wrong answer option";
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector('[name="type"]').addEventListener('change', adjustWrongAnswers);
            adjustWrongAnswers(); // run on page load
        });
    </script>
</head>
<body>
  <!-- Header with tiled background and logo -->
  <div class="header">
    <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
  </div>

  <h2>Submit a Question</h2>
  <div class="page-info">
    Add new questions to the test database. Select an existing test or create a new one.
  </div>

  <div class="form-container">
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="success-message">
            Question submitted successfully!
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="test-selection">
            <div class="form-group">
                <label>Select an existing test:</label>
                <select name="test">
                    <option value="">-- Select a test --</option>
                    <?php foreach ($tests as $t): ?>
                        <option value="<?= htmlspecialchars($t) ?>"><?= htmlspecialchars($t) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Or create a new test:</label>
                <input type="text" name="new_test" placeholder="Enter new test name">
            </div>
        </div>

        <div class="form-group">
            <label>Question Type:</label>
            <select name="type" required>
                <option value="MC">Multiple Choice</option>
                <option value="TF">True/False</option>
                <option value="FB">Fill in the Blank</option>
            </select>
        </div>

        <div class="form-group">
            <label>Question:</label>
            <textarea name="question" required placeholder="Enter your question here..."></textarea>
        </div>

        <div class="form-group">
            <label>Correct Answer:</label>
            <input type="text" name="correct_answer" required placeholder="Enter the correct answer">
        </div>

        <div class="form-group">
            <label>Wrong Answer 1:</label>
            <input type="text" name="wrong_answer1" placeholder="Wrong answer option">
        </div>

        <div class="form-group">
            <label>Wrong Answer 2:</label>
            <input type="text" name="wrong_answer2" placeholder="Wrong answer option">
        </div>

        <div class="form-group">
            <label>Wrong Answer 3:</label>
            <input type="text" name="wrong_answer3" placeholder="Wrong answer option">
        </div>

        <div style="text-align: center;">
            <input type="submit" value="Submit Question" class="submit-btn">
        </div>
    </form>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
  </div>
</body>
</html>