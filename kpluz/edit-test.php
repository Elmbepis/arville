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
$is_kpluz = ($user_name === 'KPluz');

// Fetch existing subject, lesson, topic combinations from tests table
// For KPluz: show all tests
// For other teachers: show their own tests AND tests created by KPluz (view-only)
$tests = [];
if ($is_kpluz) {
    $sql = "SELECT DISTINCT subject, lesson, topic, teacher FROM tests ORDER BY subject, lesson, topic";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT DISTINCT subject, lesson, topic, teacher FROM tests WHERE teacher = ? OR teacher = 'KPluz' ORDER BY subject, lesson, topic";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $result = $stmt->get_result();
}
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $tests[] = $row;
    }
}
if (!$is_kpluz && isset($stmt)) {
    $stmt->close();
}

// Fetch unique subjects for dropdown
$subjects = [];
if ($is_kpluz) {
    $subject_sql = "SELECT DISTINCT subject FROM tests ORDER BY subject";
    $subject_result = $conn->query($subject_sql);
} else {
    $subject_sql = "SELECT DISTINCT subject FROM tests WHERE teacher = ? OR teacher = 'KPluz' ORDER BY subject";
    $stmt = $conn->prepare($subject_sql);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $subject_result = $stmt->get_result();
}
if ($subject_result) {
    while ($row = $subject_result->fetch_assoc()) {
        $subjects[] = $row['subject'];
    }
}
if (!$is_kpluz && isset($stmt)) {
    $stmt->close();
}

// Handle AJAX request to get questions
if (isset($_GET['ajax_get_questions']) && isset($_GET['subject']) && isset($_GET['lesson']) && isset($_GET['topic'])) {
    $subject = $_GET['subject'];
    $lesson = $_GET['lesson'];
    $topic = $_GET['topic'];
    $questions = [];
    
    // Get test owner
    $owner_stmt = $conn->prepare("SELECT teacher FROM tests WHERE subject = ? AND lesson = ? AND topic = ? LIMIT 1");
    $owner_stmt->bind_param("sss", $subject, $lesson, $topic);
    $owner_stmt->execute();
    $owner_result = $owner_stmt->get_result();
    $test_owner = null;
    if ($owner_result->num_rows > 0) {
        $test_owner = $owner_result->fetch_assoc()['teacher'];
    }
    $owner_stmt->close();
    
    // Query questions based on test owner
    if ($test_owner === 'KPluz') {
        $stmt = $conn->prepare("SELECT id, type, question, correct, wrong1, wrong2, wrong3, solution FROM questions WHERE subject = ? AND lesson = ? ORDER BY id");
        $stmt->bind_param("ss", $subject, $lesson);
    } else {
        $stmt = $conn->prepare("SELECT id, type, question, correct, wrong1, wrong2, wrong3, solution FROM questions WHERE subject = ? AND lesson = ? AND topic = ? ORDER BY id");
        $stmt->bind_param("sss", $subject, $lesson, $topic);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
    $stmt->close();
    
    header('Content-Type: application/json');
    echo json_encode([
        'questions' => $questions,
        'test_owner' => $test_owner,
        'current_user' => $user_name
    ]);
    $conn->close();
    exit();
}

// Handle AJAX request to add a question
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['ajax_add_question'])) {
    $subject = $_POST['subject'];
    $lesson = $_POST['lesson'];
    $topic = $_POST['topic'];
    $type = $_POST['type'];
    $question_text = trim($_POST['question']);
    $correct = $_POST['correct'];
    $solution = $_POST['solution'] ?? '';
    $wrong1 = $_POST['wrong1'] ?? '';
    $wrong2 = $_POST['wrong2'] ?? '';
    $wrong3 = $_POST['wrong3'] ?? '';
    
    // Check if question already exists
    $check_stmt = $conn->prepare("SELECT id FROM questions WHERE subject = ? AND lesson = ? AND topic = ? AND question = ?");
    $check_stmt->bind_param("ssss", $subject, $lesson, $topic, $question_text);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if ($check_result->num_rows > 0) {
        echo json_encode(['success' => false, 'error' => 'Question already exists for this test!']);
    } else {
        $insert_stmt = $conn->prepare("INSERT INTO questions (subject, lesson, topic, type, question, correct, wrong1, wrong2, wrong3, solution) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("ssssssssss", $subject, $lesson, $topic, $type, $question_text, $correct, $wrong1, $wrong2, $wrong3, $solution);
        
        if ($insert_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $conn->error]);
        }
        $insert_stmt->close();
    }
    $check_stmt->close();
    $conn->close();
    exit();
}

// Handle AJAX request to delete a question
if (isset($_GET['ajax_delete_question']) && isset($_GET['question_id'])) {
    $question_id = $_GET['question_id'];
    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $question_id);
    $success = $stmt->execute();
    header('Content-Type: application/json');
    echo json_encode(['success' => $success]);
    $conn->close();
    exit();
}

// Handle AJAX request to get a single question for editing
if (isset($_GET['ajax_get_question']) && isset($_GET['question_id'])) {
    $question_id = $_GET['question_id'];
    $stmt = $conn->prepare("SELECT id, type, question, correct, wrong1, wrong2, wrong3, solution FROM questions WHERE id = ?");
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $question = $result->fetch_assoc();
    header('Content-Type: application/json');
    echo json_encode($question);
    $conn->close();
    exit();
}

// Handle AJAX request to update a question
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['ajax_update'])) {
    $id = $_POST['question_id'];
    $type = $_POST['type'];
    $question = $_POST['question'];
    $correct = $_POST['correct'];
    $wrong1 = $_POST['wrong1'] ?? '';
    $wrong2 = $_POST['wrong2'] ?? '';
    $wrong3 = $_POST['wrong3'] ?? '';
    $solution = $_POST['solution'] ?? '';
    
    $stmt = $conn->prepare("UPDATE questions SET type=?, question=?, correct=?, wrong1=?, wrong2=?, wrong3=?, solution=? WHERE id=?");
    $stmt->bind_param("ssssssss", $type, $question, $correct, $wrong1, $wrong2, $wrong3, $solution, $id);
    $success = $stmt->execute();
    header('Content-Type: application/json');
    echo json_encode(['success' => $success, 'error' => $conn->error]);
    $conn->close();
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Review/Edit Existing Tests</title>
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
        max-width: 1400px;
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
    
    .test-selection {
        background: white;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border-left: 4px solid #003366;
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
    
    .lesson-select {
        width: 100%;
        min-width: 300px;
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
    
    /* Questions List Styles */
    .questions-list-container {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        margin-top: 30px;
    }
    
    .questions-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .questions-table th {
        background: #003366;
        color: white;
        padding: 12px;
        text-align: left;
        font-weight: bold;
    }
    
    .questions-table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        vertical-align: top;
    }
    
    .questions-table tr:hover {
        background: #f5f5f5;
    }
    
    .question-text-cell {
        max-width: 400px;
    }
    
    .choices-cell {
        max-width: 350px;
    }
    
    .choices-list {
        margin: 0;
        padding-left: 20px;
        font-size: 0.85em;
        color: #555;
    }
    
    .choices-list li {
        margin-bottom: 3px;
    }
    
    .correct-choice {
        color: #28a745;
        font-weight: bold;
    }
    
    .wrong-choice {
        color: #dc3545;
    }
    
    .solution-text {
        color: #6f42c1;
        font-style: italic;
        margin-top: 8px;
        padding-top: 8px;
        border-top: 1px dashed #ccc;
        line-height: 1.5;
    }
    
    .action-icons {
        display: flex;
        gap: 10px;
        white-space: nowrap;
    }
    
    .edit-btn, .delete-btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
    }
    
    .edit-btn {
        background: #ffc107;
        color: #333;
    }
    
    .edit-btn:hover {
        background: #e0a800;
    }
    
    .delete-btn {
        background: #dc3545;
        color: white;
    }
    
    .delete-btn:hover {
        background: #c82333;
    }
    
    .type-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.8em;
        font-weight: bold;
    }
    
    .type-MC {
        background: #007bff;
        color: white;
    }
    
    .type-TF {
        background: #17a2b8;
        color: white;
    }
    
    .type-FB {
        background: #6c757d;
        color: white;
    }
    
    .loading {
        text-align: center;
        padding: 20px;
        color: #666;
    }
    
    .no-questions {
        text-align: center;
        padding: 40px;
        color: #666;
        font-style: italic;
    }
    
    .add-question-section {
        background: #e7f3ff;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    
    .add-question-toggle {
        background: #003366;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-bottom: 15px;
        width: 100%;
    }
    
    .add-question-toggle:hover {
        background: #0055aa;
    }
    
    .add-question-form {
        display: none;
    }
    
    .add-question-form.visible {
        display: block;
    }
    
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }
    
    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 30px;
        width: 90%;
        max-width: 700px;
        border-radius: 10px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.3);
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #003366;
    }
    
    .modal-header h3 {
        margin: 0;
        border: none;
        padding: 0;
    }
    
    .close-modal {
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        color: #666;
    }
    
    .close-modal:hover {
        color: #000;
    }
    
    .save-edit-btn {
        padding: 12px 24px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .save-edit-btn:hover {
        background: #218838;
    }
  </style>
  <script>
        const isKpluz = <?php echo $is_kpluz ? 'true' : 'false'; ?>;
        let currentSubject = '';
        let currentLesson = '';
        let currentTopic = '';
        let currentTestOwner = '';
        
        function updateLessonOptions() {
            const subject = document.getElementById('subjectSelect').value;
            const lessonSelect = document.getElementById('lessonSelect');
            
            lessonSelect.innerHTML = '<option value="">-- Select a lesson --</option>';
            
            if (!subject) {
                lessonSelect.disabled = true;
                return;
            }
            
            const tests = <?php echo json_encode($tests); ?>;
            const filteredLessons = tests.filter(test => test.subject === subject);
            
            if (filteredLessons.length === 0) {
                lessonSelect.disabled = true;
                document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">No lessons found for this subject.</div>';
                return;
            }
            
            lessonSelect.disabled = false;
            filteredLessons.forEach(test => {
                const option = document.createElement('option');
                option.value = test.lesson + '|' + test.topic;
                option.textContent = test.lesson + ': ' + test.topic;
                lessonSelect.appendChild(option);
            });
        }
        
        function loadQuestions() {
            const subject = document.getElementById('subjectSelect').value;
            const lessonTopicValue = document.getElementById('lessonSelect').value;
            
            if (!subject || !lessonTopicValue) {
                document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">Select a subject and lesson to view existing questions.</div>';
                return;
            }
            
            const parts = lessonTopicValue.split('|');
            const lesson = parts[0];
            const topic = parts[1];
            
            currentSubject = subject;
            currentLesson = lesson;
            currentTopic = topic;
            
            document.getElementById('questionsContainer').innerHTML = '<div class="loading">Loading questions...</div>';
            
            fetch(`?ajax_get_questions=1&subject=${encodeURIComponent(subject)}&lesson=${encodeURIComponent(lesson)}&topic=${encodeURIComponent(topic)}`)
                .then(response => response.json())
                .then(data => {
                    const questions = data.questions;
                    currentTestOwner = data.test_owner;
                    const canEdit = (currentTestOwner === data.current_user);
                    
                    // Show/hide add question section based on edit permission
                    const addSection = document.getElementById('addQuestionSection');
                    if (addSection) {
                        if (canEdit) {
                            addSection.style.display = 'block';
                        } else {
                            addSection.style.display = 'none';
                        }
                    }
                    
                    if (questions.length === 0) {
                        document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">No questions found for this test.</div>';
                        return;
                    }
                    
                    let html = '<table class="questions-table">';
                    html += '<tr><th>#</th><th>Type</th><th>Question</th><th>Choices & Solutions</th><th>Actions</th></tr>';
                    
                    questions.forEach((q, index) => {
                        let choicesHtml = '<ul class="choices-list">';
                        
                        if (q.type === 'TF') {
                            choicesHtml += `<li class="correct-choice">&#10003; Correct: ${escapeHtml(q.correct)}</li>`;
                            if (q.wrong1) choicesHtml += `<li class="wrong-choice">&#10007; Wrong: ${escapeHtml(q.wrong1)}</li>`;
                        } else if (q.type === 'FB') {
                            choicesHtml += `<li class="correct-choice">&#10003; Answer: ${escapeHtml(q.correct)}</li>`;
                            choicesHtml += `<li class="wrong-choice"><em>Fill in the blank question</em></li>`;
                        } else {
                            choicesHtml += `<li class="correct-choice">&#10003; Correct: ${escapeHtml(q.correct)}</li>`;
                            if (q.wrong1) choicesHtml += `<li class="wrong-choice">&#10007; ${escapeHtml(q.wrong1)}</li>`;
                            if (q.wrong2) choicesHtml += `<li class="wrong-choice">&#10007; ${escapeHtml(q.wrong2)}</li>`;
                            if (q.wrong3) choicesHtml += `<li class="wrong-choice">&#10007; ${escapeHtml(q.wrong3)}</li>`;
                        }
                        
                        choicesHtml += '</ul>';
                        
                        if (q.solution && q.solution.trim() !== '') {
                            let solutionText = q.solution;
                            solutionText = formatSolutionWithSemicolons(solutionText);
                            choicesHtml += `<div class="solution-text">&#128161; Solution: ${escapeHtml(solutionText)}</div>`;
                        }
                        
                        let typeClass = '';
                        if (q.type === 'MC') typeClass = 'type-MC';
                        else if (q.type === 'TF') typeClass = 'type-TF';
                        else typeClass = 'type-FB';
                        
                        html += `<tr>
                            <td>${index + 1}</td>
                            <td><span class="type-badge ${typeClass}">${escapeHtml(q.type)}</span></td>
                            <td class="question-text-cell">${escapeHtml(q.question)}</td>
                            <td class="choices-cell">${choicesHtml}</td>
                            <td class="action-icons">`;
                        
                        if (canEdit) {
                            html += `<button class="edit-btn" onclick="editQuestion(${q.id})">&#9999;&#65039; Edit</button>
                                     <button class="delete-btn" onclick="deleteQuestion(${q.id}, '${escapeHtml(q.question)}')">&#128465;&#65039; Delete</button>`;
                        } else {
                            html += `<span style="color: #999; font-size: 0.85em;">View only</span>`;
                        }
                        
                        html += `</div>
                            </tr>`;
                    });
                    html += '</td>';
                    document.getElementById('questionsContainer').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">Error loading questions.</div>';
                });
        }
        
        function formatSolutionWithSemicolons(solution) {
            if (!solution || solution.trim() === '') return '';
            if (solution.includes(';') && !solution.includes('\n')) return solution;
            let steps = solution.split(/\r?\n/);
            steps = steps.map(step => step.trim()).filter(step => step.length > 0);
            if (steps.length > 1) {
                return steps.join('; ');
            }
            let formatted = solution;
            formatted = formatted.replace(/\s+(Final Answer:|Therefore,?)/gi, '; $1');
            formatted = formatted.replace(/([a-z0-9)])\s+([A-Z][a-z]?\s*=)/g, '$1; $2');
            formatted = formatted.replace(/\)\s+([A-Z])/g, '); $1');
            formatted = formatted.replace(/;+/g, ';');
            return formatted;
        }
        
        function escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
        
        function toggleAddQuestion() {
            const form = document.getElementById('addQuestionForm');
            const toggleBtn = document.getElementById('toggleAddBtn');
            if (form.classList.contains('visible')) {
                form.classList.remove('visible');
                toggleBtn.textContent = 'Add New Question to This Test';
            } else {
                form.classList.add('visible');
                toggleBtn.textContent = 'Cancel';
            }
        }
        
        function addQuestion() {
            const formData = new FormData();
            formData.append('subject', currentSubject);
            formData.append('lesson', currentLesson);
            formData.append('topic', currentTopic);
            formData.append('type', document.getElementById('add_type').value);
            formData.append('question', document.getElementById('add_question').value);
            formData.append('correct', document.getElementById('add_correct').value);
            formData.append('wrong1', document.getElementById('add_wrong1').value);
            formData.append('wrong2', document.getElementById('add_wrong2').value);
            formData.append('wrong3', document.getElementById('add_wrong3').value);
            formData.append('solution', document.getElementById('add_solution').value);
            
            fetch('?ajax_add_question=1', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Question added successfully!');
                    // Clear form
                    document.getElementById('add_type').value = 'MC';
                    document.getElementById('add_question').value = '';
                    document.getElementById('add_correct').value = '';
                    document.getElementById('add_wrong1').value = '';
                    document.getElementById('add_wrong2').value = '';
                    document.getElementById('add_wrong3').value = '';
                    document.getElementById('add_solution').value = '';
                    // Reload questions
                    loadQuestions();
                    // Hide form
                    toggleAddQuestion();
                } else {
                    alert('Error: ' + result.error);
                }
            });
        }
        
        function deleteQuestion(questionId, questionText) {
            if (confirm(`Are you sure you want to delete:\n\n"${questionText}"\n\nThis action cannot be undone!`)) {
                fetch(`?ajax_delete_question=1&question_id=${questionId}`)
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert('Question deleted successfully!');
                            loadQuestions();
                        } else {
                            alert('Error deleting question.');
                        }
                    });
            }
        }
        
        function editQuestion(questionId) {
            fetch(`?ajax_get_question=1&question_id=${questionId}`)
                .then(response => response.json())
                .then(question => {
                    if (question) {
                        showEditModal(question);
                    }
                });
        }
        
        function showEditModal(question) {
            const modal = document.getElementById('editModal');
            document.getElementById('edit_question_id').value = question.id;
            document.getElementById('edit_type').value = question.type;
            document.getElementById('edit_question').value = question.question;
            document.getElementById('edit_correct').value = question.correct;
            document.getElementById('edit_wrong1').value = question.wrong1 || '';
            document.getElementById('edit_wrong2').value = question.wrong2 || '';
            document.getElementById('edit_wrong3').value = question.wrong3 || '';
            document.getElementById('edit_solution').value = question.solution || '';
            
            const type = question.type;
            const wrong1Field = document.getElementById('edit_wrong1');
            const wrong2Field = document.getElementById('edit_wrong2');
            const wrong3Field = document.getElementById('edit_wrong3');
            
            if (type === 'TF') {
                wrong1Field.disabled = false;
                wrong2Field.disabled = true;
                wrong3Field.disabled = true;
            } else if (type === 'FB') {
                wrong1Field.disabled = true;
                wrong2Field.disabled = true;
                wrong3Field.disabled = true;
            } else {
                wrong1Field.disabled = false;
                wrong2Field.disabled = false;
                wrong3Field.disabled = false;
            }
            
            modal.style.display = 'block';
        }
        
        function saveEdit() {
            const formData = new FormData();
            formData.append('question_id', document.getElementById('edit_question_id').value);
            formData.append('type', document.getElementById('edit_type').value);
            formData.append('question', document.getElementById('edit_question').value);
            formData.append('correct', document.getElementById('edit_correct').value);
            formData.append('wrong1', document.getElementById('edit_wrong1').value);
            formData.append('wrong2', document.getElementById('edit_wrong2').value);
            formData.append('wrong3', document.getElementById('edit_wrong3').value);
            formData.append('solution', document.getElementById('edit_solution').value);
            
            fetch('?ajax_update=1', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Question updated successfully!');
                    document.getElementById('editModal').style.display = 'none';
                    loadQuestions();
                } else {
                    alert('Error updating question: ' + result.error);
                }
            });
        }
        
        function adjustWrongAnswers(prefix) {
            const type = document.getElementById(prefix + '_type').value;
            const wrong1 = document.getElementById(prefix + '_wrong1');
            const wrong2 = document.getElementById(prefix + '_wrong2');
            const wrong3 = document.getElementById(prefix + '_wrong3');

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
        
        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
        
        window.addEventListener('DOMContentLoaded', () => {
            const subjectSelect = document.getElementById('subjectSelect');
            const lessonSelect = document.getElementById('lessonSelect');
            
            subjectSelect.addEventListener('change', () => {
                updateLessonOptions();
                document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">Select a lesson to view questions.</div>';
            });
            
            lessonSelect.addEventListener('change', () => {
                loadQuestions();
            });
            
            document.getElementById('add_type').addEventListener('change', () => adjustWrongAnswers('add'));
            adjustWrongAnswers('add');
        });
        
        window.onclick = function(event) {
            const modal = document.getElementById('editModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
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
            KPluz SHS - Review/Edit Existing Tests
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <a href="dashboard.php" class="back-link">&larr; Back to Dashboard</a>
        
        <h2>Review/Edit Existing Tests</h2>
        <div class="page-info">
            Select a subject and lesson to view, edit, or add questions to existing tests.
        </div>

        <div class="form-container">
            <!-- Test Selection -->
            <div class="test-selection">
                <div class="form-group">
                    <label>Select Subject:</label>
                    <select name="subject" id="subjectSelect" class="lesson-select">
                        <option value="">-- Select a subject --</option>
                        <?php foreach ($subjects as $s): ?>
                            <option value="<?= htmlspecialchars($s) ?>"><?= htmlspecialchars($s) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Lesson/Topic:</label>
                    <select name="lesson" id="lessonSelect" disabled class="lesson-select">
                        <option value="">-- First select a subject --</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Add Question Section (hidden for view-only users) -->
        <div id="addQuestionSection" class="add-question-section" style="display: none;">
            <button type="button" id="toggleAddBtn" class="add-question-toggle" onclick="toggleAddQuestion()">Add New Question to This Test</button>
            <div id="addQuestionForm" class="add-question-form">
                <h3 style="margin-top: 0; margin-bottom: 15px; color: #003366;">Add New Question</h3>
                
                <div class="form-group">
                    <label>Question Type:</label>
                    <select id="add_type" required>
                        <option value="MC">Multiple Choice</option>
                        <option value="TF">True/False</option>
                        <option value="FB">Fill in the Blank</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Question:</label>
                    <textarea id="add_question" required placeholder="Enter your question here..."></textarea>
                </div>

                <div class="form-group">
                    <label>Correct Answer:</label>
                    <input type="text" id="add_correct" required placeholder="Enter the correct answer">
                </div>

                <div class="form-group">
                    <label>Wrong Answer 1:</label>
                    <input type="text" id="add_wrong1" placeholder="Wrong answer option 1">
                </div>

                <div class="form-group">
                    <label>Wrong Answer 2:</label>
                    <input type="text" id="add_wrong2" placeholder="Wrong answer option 2">
                </div>

                <div class="form-group">
                    <label>Wrong Answer 3:</label>
                    <input type="text" id="add_wrong3" placeholder="Wrong answer option 3">
                </div>

                <div class="form-group">
                    <label class="solution-label">Solution (Optional):</label>
                    <textarea id="add_solution" placeholder="Enter step-by-step solution or explanation..."></textarea>
                </div>

                <button type="button" class="submit-btn" onclick="addQuestion()" style="width: 100%;">Add Question</button>
            </div>
        </div>
        
        <!-- Existing Questions Section -->
        <div class="questions-list-container">
            <h3>Existing Questions</h3>
            <div id="questionsContainer">
                <div class="no-questions">Select a subject and lesson to view existing questions.</div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="create-test.php" class="dashboard-btn" style="background: #28a745;">Create New Test</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
  
  <!-- Edit Modal -->
  <div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Question</h3>
            <span class="close-modal" onclick="closeModal()">&times;</span>
        </div>
        <div class="form-group">
            <label>Type:</label>
            <select id="edit_type" name="edit_type" required>
                <option value="MC">Multiple Choice</option>
                <option value="TF">True/False</option>
                <option value="FB">Fill in the Blank</option>
            </select>
        </div>
        <div class="form-group">
            <label>Question:</label>
            <textarea id="edit_question" name="edit_question" required style="height:80px;"></textarea>
        </div>
        <div class="form-group">
            <label>Correct Answer:</label>
            <input type="text" id="edit_correct" name="edit_correct" required>
        </div>
        <div class="form-group">
            <label>Wrong Answer 1:</label>
            <input type="text" id="edit_wrong1" name="edit_wrong1">
        </div>
        <div class="form-group">
            <label>Wrong Answer 2:</label>
            <input type="text" id="edit_wrong2" name="edit_wrong2">
        </div>
        <div class="form-group">
            <label>Wrong Answer 3:</label>
            <input type="text" id="edit_wrong3" name="edit_wrong3">
        </div>
        <div class="form-group">
            <label>Solution:</label>
            <textarea id="edit_solution" name="edit_solution" style="height:80px;"></textarea>
        </div>
        <input type="hidden" id="edit_question_id">
        <div style="text-align: center;">
            <button type="button" class="save-edit-btn" onclick="saveEdit()">Save Changes</button>
        </div>
    </div>
  </div>
</body>
</html>