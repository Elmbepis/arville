<?php
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

// Fetch existing subject and lesson combinations from tests table
$tests = [];
$sql = "SELECT DISTINCT subject, lesson, topic FROM tests ORDER BY subject, lesson";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $tests[] = $row;
    }
}

// Fetch unique subjects for dropdown
$subjects = [];
$subject_sql = "SELECT DISTINCT subject FROM tests ORDER BY subject";
$subject_result = $conn->query($subject_sql);
if ($subject_result) {
    while ($row = $subject_result->fetch_assoc()) {
        $subjects[] = $row['subject'];
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

// Handle AJAX request to get questions for a subject and lesson
if (isset($_GET['ajax_get_questions']) && isset($_GET['subject']) && isset($_GET['lesson'])) {
    $subject = $_GET['subject'];
    $lesson = $_GET['lesson'];
    $questions = [];
    $stmt = $conn->prepare("SELECT id, type, question, correct, wrong1, wrong2, wrong3 FROM questions WHERE subject = ? AND lesson = ? ORDER BY id");
    $stmt->bind_param("ss", $subject, $lesson);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($questions);
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
    $stmt = $conn->prepare("SELECT id, type, question, correct, wrong1, wrong2, wrong3 FROM questions WHERE id = ?");
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
    
    $stmt = $conn->prepare("UPDATE questions SET type=?, question=?, correct=?, wrong1=?, wrong2=?, wrong3=? WHERE id=?");
    $stmt->bind_param("ssssssi", $type, $question, $correct, $wrong1, $wrong2, $wrong3, $id);
    $success = $stmt->execute();
    header('Content-Type: application/json');
    echo json_encode(['success' => $success, 'error' => $conn->error]);
    $conn->close();
    exit();
}

// Handle form submission for new question
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_GET['ajax_update'])) {
    // Check if using existing or new test
    if (!empty($_POST["new_lesson"])) {
        // Creating new test - need grade, subject, lesson, topic, teacher
        $grade = $_POST["new_grade"];
        $subject = $_POST["new_subject_select"];
        $lesson = $_POST["new_lesson"];
        $topic = $_POST["new_topic"];
        $teacher = $user_name; // Auto-fill with logged-in user's name
        
        // First, insert the new test into the tests table
        $insert_test = $conn->prepare("INSERT INTO tests (grade, subject, lesson, topic, teacher) VALUES (?, ?, ?, ?, ?)");
        $insert_test->bind_param("sssss", $grade, $subject, $lesson, $topic, $teacher);
        $insert_test->execute();
        $insert_test->close();
    } else {
        // Using existing test
        $subject = $_POST["subject"];
        $lesson = $_POST["lesson"];
        // For existing test, we don't need grade/topic/teacher for the question
        $grade = null;
        $topic = null;
        $teacher = null;
    }
    
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
        $wrong1 = isset($_POST['wrong_answer1']) ? $_POST['wrong_answer1'] : '';
        $wrong2 = isset($_POST['wrong_answer2']) ? $_POST['wrong_answer2'] : '';
        $wrong3 = isset($_POST['wrong_answer3']) ? $_POST['wrong_answer3'] : '';
    }
    
    $stmt = $conn->prepare("INSERT INTO questions (subject, lesson, type, question, correct, wrong1, wrong2, wrong3) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $subject, $lesson, $type, $question, $correct, $wrong1, $wrong2, $wrong3);
    
    if ($stmt->execute()) {
        $submitted = true;
    } else {
        $error = "Error submitting question: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Manage Questions</title>
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
    
    .header {
        width: 100%;
        height: 200px;
        background: url('images/header-bg.jpg') repeat-x top center;
        background-size: auto 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0;
        border-radius: 10px 10px 0 0;
    }
    
    .header-logo {
        max-height: 120px;
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
    
    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
    }
    
    .test-selection {
        background: white;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
        border-left: 4px solid #003366;
    }
    
    .new-test-section {
        background: #e7f3ff;
        padding: 15px;
        border-radius: 4px;
        margin-top: 15px;
    }
    
    .required {
        color: #dc3545;
        font-size: 0.8em;
    }
    
    .section-divider {
        text-align: center;
        margin: 20px 0;
        position: relative;
    }
    
    .section-divider span {
        background: #f8f9fa;
        padding: 0 15px;
        color: #666;
    }
    
    .section-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #ddd;
        z-index: 0;
    }
    
    .section-divider span {
        position: relative;
        z-index: 1;
    }
    
    .teacher-info {
        background: #e9ecef;
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 14px;
        color: #666;
        margin-top: 5px;
    }
    
    .teacher-info strong {
        color: #003366;
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
    
    .lesson-select {
        width: 100%;
        min-width: 300px;
    }
    
    hr {
        margin: 15px 0;
        border: none;
        border-top: 1px solid #ddd;
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
  </style>
  <script>
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
        
        function loadQuestions() {
            const subject = document.getElementById('subjectSelect').value;
            const lessonDisplay = document.getElementById('lessonSelect').value;
            
            if (!subject || !lessonDisplay) {
                document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">Select a subject and lesson to view existing questions.</div>';
                return;
            }
            
            const lesson = lessonDisplay.split(':')[0].trim();
            
            document.getElementById('questionsContainer').innerHTML = '<div class="loading">Loading questions...</div>';
            
            fetch(`?ajax_get_questions=1&subject=${encodeURIComponent(subject)}&lesson=${encodeURIComponent(lesson)}`)
                .then(response => response.json())
                .then(questions => {
                    if (questions.length === 0) {
                        document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">No questions found for this subject and lesson. Add some above!</div>';
                        return;
                    }
                    
                    let html = '<table class="questions-table">';
                    html += '<tr><th>#</th><th>Type</th><th>Question</th><th>Choices</th><th>Actions</th></tr>';
                    
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
                        
                        let typeClass = '';
                        if (q.type === 'MC') typeClass = 'type-MC';
                        else if (q.type === 'TF') typeClass = 'type-TF';
                        else typeClass = 'type-FB';
                        
                        html += `<tr>
                            <td>${index + 1}</td>
                            <td><span class="type-badge ${typeClass}">${escapeHtml(q.type)}</span></td>
                            <td class="question-text-cell">${escapeHtml(q.question)}</td>
                            <td class="choices-cell">${choicesHtml}</td>
                            <td class="action-icons">
                                <button class="edit-btn" onclick="editQuestion(${q.id})">&#9999;&#65039; Edit</button>
                                <button class="delete-btn" onclick="deleteQuestion(${q.id}, '${escapeHtml(q.question)}')">&#128465;&#65039; Delete</button>
                            </td>
                        </tr>`;
                    });
                    html += '</table>';
                    document.getElementById('questionsContainer').innerHTML = html;
                })
                .catch(error => {
                    document.getElementById('questionsContainer').innerHTML = '<div class="no-questions">Error loading questions.</div>';
                });
        }
        
        function escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
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
                option.value = test.lesson + ': ' + test.topic;
                option.textContent = test.lesson + ': ' + test.topic;
                lessonSelect.appendChild(option);
            });
        }
        
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector('[name="type"]').addEventListener('change', adjustWrongAnswers);
            adjustWrongAnswers();
            
            const subjectSelect = document.getElementById('subjectSelect');
            const lessonSelect = document.getElementById('lessonSelect');
            
            subjectSelect.addEventListener('change', () => {
                updateLessonOptions();
            });
            
            lessonSelect.addEventListener('change', () => {
                loadQuestions();
            });
        });
        
        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
        
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
            KPluz SHS - Manage Questions
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <h2>Manage Questions</h2>
        <div class="page-info">
            Add new questions or edit/delete existing ones. Select a subject and lesson to view its questions.
        </div>

        <div class="form-container">
            <?php if ($submitted): ?>
                <div class="success-message">
                    &#10003; Question submitted successfully!
                </div>
            <?php endif; ?>
            
            <?php if (isset($error)): ?>
                <div class="error-message">
                    &#10007; <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <!-- Existing Test Selection -->
                <div class="test-selection">
                    <div class="form-group">
                        <label>Select an existing subject and lesson:</label>
                        <select name="subject" id="subjectSelect">
                            <option value="">-- Select a subject --</option>
                            <?php foreach ($subjects as $s): ?>
                                <option value="<?= htmlspecialchars($s) ?>"><?= htmlspecialchars($s) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="lesson" id="lessonSelect" disabled class="lesson-select">
                            <option value="">-- First select a subject --</option>
                        </select>
                    </div>
                </div>

                <div class="section-divider">
                    <span> or </span>
                </div>

                <!-- New Test Creation -->
                <div class="new-test-section">
                    <h3 style="margin-top: 0; margin-bottom: 15px; color: #003366;">Create a New Test</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Grade Level:</label>
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
                            <label>Subject:</label>
                            <select name="new_subject_select" required>
                                <option value="">-- Select subject --</option>
                                <?php foreach ($subjects as $s): ?>
                                    <option value="<?= htmlspecialchars($s) ?>"><?= htmlspecialchars($s) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
<div class="form-row">
    <div class="form-group">
        <label>Lesson Name:</label>
        <input type="text" name="new_lesson" placeholder="e.g., Q1 Lesson 1" required>
    </div>
    <div class="form-group">
        <label>Topic / Title:</label>
        <input type="text" name="new_topic" placeholder="Brief topic or title of the lesson" required>
    </div>
</div>
<span class="required" style="display: block; margin-top: 10px;">Note: This will create a new test entry in the tests table.</span>                </div>

                <div class="section-divider">
                    <span> Question Details </span>
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

                <div style="text-align: center;">
                    <input type="submit" value="Submit Question" class="submit-btn">
                </div>
            </form>
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
        <input type="hidden" id="edit_question_id">
        <div style="text-align: center;">
            <button type="button" class="save-edit-btn" onclick="saveEdit()">Save Changes</button>
        </div>
    </div>
  </div>
</body>
</html>