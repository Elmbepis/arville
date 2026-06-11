<?php
session_name('KPLUZ_SESSION');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to format solution with semicolons between steps
function format_solution($solution) {
    if (empty($solution) || trim($solution) === '') {
        return '';
    }
    
    $formatted = str_replace(["\r\n", "\n", "\r"], ' ', $solution);
    
    $steps = preg_split('/(?=\d+\.\s+)|(?=\b(?:Step|Then|Next|Finally|Therefore|Thus|So)\b\s*:?\s*)|(?=\b(?:Efficiency|Output|Input|Work|Force|Distance|MA|VR|Efficiency)\s*=)/i', $formatted);
    
    $steps = array_map(function($step) {
        $step = trim($step);
        $step = rtrim($step, '.');
        return $step;
    }, $steps);
    
    $steps = array_filter($steps);
    
    if (count($steps) > 1) {
        return implode('; ', $steps);
    }
    
    if (strpos($solution, '=') !== false) {
        $formula_parts = preg_split('/(?=[A-Z][a-z]*\s*=)/', $solution);
        if (count($formula_parts) > 1) {
            $formula_parts = array_map('trim', $formula_parts);
            $formula_parts = array_filter($formula_parts);
            if (count($formula_parts) > 1) {
                return implode('; ', $formula_parts);
            }
        }
    }
    
    return $solution;
}

// Get user details
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$user_name = $user['name'];
$user_role = $user['role'];

// Fetch unique subjects for dropdown
$subjects = [];
$subject_sql = "SELECT DISTINCT subject FROM tests ORDER BY subject";
$subject_result = $conn->query($subject_sql);
if ($subject_result) {
    while ($row = $subject_result->fetch_assoc()) {
        $subjects[] = $row['subject'];
    }
}

// Fetch lessons by subject for the dropdown
$lessons_by_subject = [];
$lesson_sql = "SELECT DISTINCT subject, lesson FROM tests ORDER BY subject, lesson";
$lesson_result = $conn->query($lesson_sql);
if ($lesson_result) {
    while ($row = $lesson_result->fetch_assoc()) {
        $subject = $row['subject'];
        if (!isset($lessons_by_subject[$subject])) {
            $lessons_by_subject[$subject] = [];
        }
        if (!in_array($row['lesson'], $lessons_by_subject[$subject])) {
            $lessons_by_subject[$subject][] = $row['lesson'];
        }
    }
}

// Fetch unique grade levels for dropdown
$grades = [];
$grade_sql = "SELECT DISTINCT grade FROM tests ORDER BY grade";
$grade_result = $conn->query($grade_sql);
if ($grade_result) {
    while ($row = $grade_result->fetch_assoc()) {
        $grades[] = $row['grade'];
    }
}

// Handle form submission for new test and question
$submitted = false;
$duplicate_error = '';
$test_created = false;
$test_exists_error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if required POST variables exist
    if (isset($_POST["new_grade"]) && isset($_POST["new_subject_select"]) && 
        isset($_POST["new_lesson"]) && isset($_POST["new_topic"])) {
        
        // Creating new test - need grade, subject, lesson, topic, teacher
        $grade = $_POST["new_grade"];
        $subject = $_POST["new_subject_select"];
        $lesson = !empty($_POST["new_lesson"]) ? trim($_POST["new_lesson"]) : '';
        $topic = !empty($_POST["new_topic"]) ? trim($_POST["new_topic"]) : '';
        $teacher = $user_name;
        
        if (!empty($lesson) && !empty($topic)) {
            // CHECK IF TEST ALREADY EXISTS (same subject, lesson, AND topic)
            $check_test_stmt = $conn->prepare("SELECT id FROM tests WHERE subject = ? AND lesson = ? AND topic = ?");
            $check_test_stmt->bind_param("sss", $subject, $lesson, $topic);
            $check_test_stmt->execute();
            $check_test_result = $check_test_stmt->get_result();
            
            if ($check_test_result->num_rows > 0) {
                $test_exists_error = "Test with Subject '$subject', Lesson '$lesson', and Topic '$topic' already exists!";
            } else {
                // Insert the new test into the tests table
                $insert_test = $conn->prepare("INSERT INTO tests (grade, subject, lesson, topic, teacher) VALUES (?, ?, ?, ?, ?)");
                $insert_test->bind_param("sssss", $grade, $subject, $lesson, $topic, $teacher);
                if ($insert_test->execute()) {
                    $test_created = true;
                }
                $insert_test->close();
            }
            $check_test_stmt->close();
            
            // Only proceed with question submission if no test duplicate error
            if (empty($test_exists_error)) {
                $type = $_POST["type"];
                $question_text = trim($_POST["question"]);
                $correct = $_POST["correct_answer"];
                $solution = $_POST["solution"] ?? '';
                
                if (($subject == 'Math' || $subject == 'Science') && empty($solution)) {
                    $solution = '';
                }
                
                if ($type == "FB") {
                    $wrong1 = "";
                    $wrong2 = "";
                    $wrong3 = "";
                } elseif ($type == "TF") {
                    $wrong1 = isset($_POST['wrong_answer1']) ? $_POST['wrong_answer1'] : '';
                    $wrong2 = "";
                    $wrong3 = "";
                } else {
                    $wrong1 = isset($_POST['wrong_answer1']) ? $_POST['wrong_answer1'] : '';
                    $wrong2 = isset($_POST['wrong_answer2']) ? $_POST['wrong_answer2'] : '';
                    $wrong3 = isset($_POST['wrong_answer3']) ? $_POST['wrong_answer3'] : '';
                }
                
                // For new test, insert into questions table (without topic column if it doesn't exist)
                // Check if topic column exists in questions table
                $check_column = $conn->query("SHOW COLUMNS FROM questions LIKE 'topic'");
                if ($check_column->num_rows > 0) {
                    // Topic column exists
                    $stmt = $conn->prepare("INSERT INTO questions (subject, lesson, topic, type, question, correct, wrong1, wrong2, wrong3, solution) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssssss", $subject, $lesson, $topic, $type, $question_text, $correct, $wrong1, $wrong2, $wrong3, $solution);
                } else {
                    // Topic column does not exist
                    $stmt = $conn->prepare("INSERT INTO questions (subject, lesson, type, question, correct, wrong1, wrong2, wrong3, solution) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssssss", $subject, $lesson, $type, $question_text, $correct, $wrong1, $wrong2, $wrong3, $solution);
                }
                
                if ($stmt->execute()) {
                    $submitted = true;
                } else {
                    $error = "Error submitting question: " . $conn->error;
                }
                $stmt->close();
            }
        } else {
            $error = "Lesson and Topic are required fields.";
        }
    } else {
        $error = "All test information fields are required.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Create New Test</title>
  <style>
    * {
        box-sizing: border-box;
    }
    body { 
        font-family: 'Arial', sans-serif; 
        text-align: center; 
        background: #f0f0f0; 
        margin: 0;
        padding: 20px;
    }
    
    .dashboard-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0;
    }
    
    .user-welcome {
        background: linear-gradient(135deg, #003366, #0055aa);
        color: white;
        padding: 30px;
        text-align: center;
    }
    
    .welcome-text {
        font-size: 2em;
        margin-bottom: 10px;
        font-weight: bold;
    }
    
    .user-info {
        font-size: 1.2em;
        opacity: 0.9;
    }
    
    .role-badge {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9em;
        margin-left: 10px;
        text-transform: uppercase;
    }
    
    .dashboard-content {
        padding: 40px;
        text-align: left;
    }
        
    h2 {
        color: #003366;
        margin-bottom: 10px;
    }
    
    h3 {
        color: #003366;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #003366;
    }
    
    .page-info {
        color: #666;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    .form-container {
        background: #f8f9fa;
        padding: 30px;
        margin: 0 auto 30px;
        border-radius: 8px;
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
        background: #28a745;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        margin-top: 20px;
        width: 280px;
        font-weight: bold;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    
    .submit-btn:hover { 
        background: #218838; 
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
    
    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
    }
    
    .warning-message {
        background: #fff3cd;
        color: #856404;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #ffeeba;
        cursor: pointer;
    }
    
    .form-row {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }
    
    .form-row .form-group {
        flex: 1;
        margin-bottom: 0;
    }
    
    .solution-label {
        color: #6f42c1;
        font-weight: bold;
    }
    
    .required {
        color: #dc3545;
        font-size: 0.8em;
    }
    
    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #003366;
        text-decoration: none;
        font-weight: bold;
    }
    
    .back-link:hover {
        text-decoration: underline;
    }
  </style>
  <script>
        // Store lessons by subject for the dropdown
        const lessonsBySubject = <?php echo json_encode($lessons_by_subject); ?>;
        
        function updateLessonOptions() {
            const subjectSelect = document.getElementById('new_subject_select');
            const lessonSelect = document.getElementById('new_lesson_select');
            const selectedSubject = subjectSelect.value;
            
            lessonSelect.innerHTML = '<option value="">-- Select a lesson --</option>';
            
            if (!selectedSubject) {
                lessonSelect.disabled = true;
                return;
            }
            
            const lessons = lessonsBySubject[selectedSubject] || [];
            
            if (lessons.length === 0) {
                lessonSelect.disabled = true;
                lessonSelect.innerHTML = '<option value="">-- No lessons available for this subject --</option>';
                return;
            }
            
            lessonSelect.disabled = false;
            lessons.forEach(lesson => {
                const option = document.createElement('option');
                option.value = lesson;
                option.textContent = lesson;
                lessonSelect.appendChild(option);
            });
        }
        
        function adjustWrongAnswers() {
            const type = document.querySelector('[name="type"]').value;
            const wrong1 = document.querySelector('[name="wrong_answer1"]');
            const wrong2 = document.querySelector('[name="wrong_answer2"]');
            const wrong3 = document.querySelector('[name="wrong_answer3"]');

            if (type === "TF") {
                wrong1.disabled = false;
                wrong1.placeholder = "Wrong answer (usually 'False' for True/False)";
                wrong1.value = "False";
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
                wrong1.placeholder = "Wrong answer option 1";
                wrong2.disabled = false;
                wrong2.placeholder = "Wrong answer option 2";
                wrong3.disabled = false;
                wrong3.placeholder = "Wrong answer option 3";
            }
        }
        
        function dismissWarning(element) {
            element.style.display = 'none';
        }
        
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector('[name="type"]').addEventListener('change', adjustWrongAnswers);
            adjustWrongAnswers();
            
            // Initialize lesson dropdown based on selected subject
            const subjectSelect = document.getElementById('new_subject_select');
            if (subjectSelect) {
                subjectSelect.addEventListener('change', updateLessonOptions);
                // Trigger initial load if a subject is pre-selected
                if (subjectSelect.value) {
                    updateLessonOptions();
                }
            }
            
            // Auto-dismiss warning messages after 5 seconds
            setTimeout(function() {
                const warnings = document.querySelectorAll('.warning-message');
                warnings.forEach(function(warning) {
                    warning.style.display = 'none';
                });
            }, 5000);
        });
    </script>
</head>
<body>
  <div class="dashboard-container">
    <div class="header">
        <img src="images/kpluz_logo.png" alt="KPluz Logo" class="header-logo">
    </div>
    
    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            KPluz SHS - Create New Test
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <a href="dashboard.php" class="back-link">&larr; Back to Dashboard</a>
        
        <h2>Create a New Test</h2>
        <div class="page-info">
            Create a brand new test by filling out the test details below, then add your first question.
        </div>

        <div class="form-container">
            <?php if ($submitted): ?>
                <div class="success-message" onclick="this.style.display='none'">
                    <span style="float: right; cursor: pointer;" onclick="this.parentElement.style.display='none'">&times;</span>
                    &#10003; Test created and question submitted successfully! You can now add more questions or go back to dashboard.
                </div>
            <?php endif; ?>
            
            <?php if ($test_created): ?>
                <div class="success-message" onclick="this.style.display='none'">
                    <span style="float: right; cursor: pointer;" onclick="this.parentElement.style.display='none'">&times;</span>
                    &#10003; New test created successfully!
                </div>
            <?php endif; ?>
            
            <?php if (!empty($test_exists_error)): ?>
                <div class="warning-message" onclick="dismissWarning(this)">
                    <span style="float: right; cursor: pointer;" onclick="event.stopPropagation(); dismissWarning(this.parentElement)">&times;</span>
                    &#9888; <?= htmlspecialchars($test_exists_error) ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($duplicate_error)): ?>
                <div class="warning-message" onclick="dismissWarning(this)">
                    <span style="float: right; cursor: pointer;" onclick="event.stopPropagation(); dismissWarning(this.parentElement)">&times;</span>
                    &#9888; <?= htmlspecialchars($duplicate_error) ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($error)): ?>
                <div class="error-message" onclick="this.style.display='none'">
                    <span style="float: right; cursor: pointer;" onclick="this.parentElement.style.display='none'">&times;</span>
                    &#10007; <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <!-- New Test Creation -->
                <div class="new-test-section">
                    <h3 style="margin-top: 0; margin-bottom: 15px; color: #003366;">Test Information</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Grade Level: <span class="required">*</span></label>
                            <select name="new_grade" required>
                                <option value="">-- Select grade --</option>
                                <?php foreach ($grades as $g): ?>
                                    <option value="<?= htmlspecialchars($g) ?>"><?= htmlspecialchars($g) ?></option>
                                <?php endforeach; ?>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subject: <span class="required">*</span></label>
                            <select name="new_subject_select" id="new_subject_select" required>
                                <option value="">-- Select subject --</option>
                                <?php foreach ($subjects as $s): ?>
                                    <option value="<?= htmlspecialchars($s) ?>"><?= htmlspecialchars($s) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Lesson Name: <span class="required">*</span></label>
                            <select name="new_lesson" id="new_lesson_select" required disabled>
                                <option value="">-- First select a subject --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Topic / Title: <span class="required">*</span></label>
                            <input type="text" name="new_topic" placeholder="Enter topic or title for this test" required>
                        </div>
                    </div>
                </div>

                <div class="section-divider" style="margin: 30px 0 20px;">
                    <span> First Question Details </span>
                </div>

                <div class="form-group">
                    <label>Question Type: <span class="required">*</span></label>
                    <select name="type" required>
                        <option value="MC">Multiple Choice</option>
                        <option value="TF">True/False</option>
                        <option value="FB">Fill in the Blank</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Question: <span class="required">*</span></label>
                    <textarea name="question" required placeholder="Enter your question here..."></textarea>
                </div>

                <div class="form-group">
                    <label>Correct Answer: <span class="required">*</span></label>
                    <input type="text" name="correct_answer" required placeholder="Enter the correct answer">
                </div>

                <div class="form-group">
                    <label>Wrong Answer 1:</label>
                    <input type="text" name="wrong_answer1" placeholder="Wrong answer option 1">
                </div>

                <div class="form-group">
                    <label>Wrong Answer 2:</label>
                    <input type="text" name="wrong_answer2" placeholder="Wrong answer option 2">
                </div>

                <div class="form-group">
                    <label>Wrong Answer 3:</label>
                    <input type="text" name="wrong_answer3" placeholder="Wrong answer option 3">
                </div>

                <div class="form-group">
                    <label class="solution-label">Solution (Optional - especially useful for Math/Science):</label>
                    <textarea name="solution" placeholder="Enter step-by-step solution or explanation for this question..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Create Test & Add Question</button>
            </form>
        </div>

        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="edit-test.php" class="dashboard-btn" style="background: #003366;">Review/Edit Existing Tests</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>