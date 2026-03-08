<?php
// take-quiz2.php - With iframe communication and click tracking
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get parameters
$quiz_id = isset($_GET['quiz_id']) ? intval($_GET['quiz_id']) : 0;
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

// Handle API requests
if ($action === 'get_questions') {
    header('Content-Type: application/json');
    
    if (!$quiz_id) {
        echo json_encode(['success' => false, 'error' => 'No quiz ID']);
        exit();
    }
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Get quiz details including virtual_world
        $quizStmt = $pdo->prepare("SELECT id, title, virtual_world FROM quizzes WHERE id = ?");
        $quizStmt->execute([$quiz_id]);
        $quiz = $quizStmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$quiz) {
            echo json_encode(['success' => false, 'error' => 'Quiz not found']);
            exit();
        }
        
        // Get questions
        $stmt = $pdo->prepare("
            SELECT id, qtype, question_text, options, correct_answer
            FROM questions 
            WHERE quiz_id = ? 
            ORDER BY id ASC
        ");
        $stmt->execute([$quiz_id]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format questions
        $formatted = array_map(function($q) {
            $options = json_decode($q['options'], true);
            return [
                'id' => $q['id'],
                'text' => $q['question_text'],
                'type' => $q['qtype'],
                'correct' => $q['correct_answer'],
                'options' => ($q['qtype'] === 'MC') ? $options : [],
                'modelName' => ($q['qtype'] === 'CK') ? ($options['A'] ?? '') : null
            ];
        }, $questions);
        
        echo json_encode([
            'success' => true,
            'quiz_id' => $quiz_id,
            'quiz_title' => $quiz['title'],
            'virtual_world' => $quiz['virtual_world'],
            'questions' => $formatted
        ]);
        exit();
        
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        exit();
    }
}

if ($action === 'save_score') {
    header('Content-Type: application/json');
    
    $user_id = $_SESSION['user_id'];
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!$data || !isset($data['quiz_id']) || !isset($data['score'])) {
        echo json_encode(['success' => false, 'error' => 'Invalid data']);
        exit();
    }
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Check if score exists
        $checkStmt = $pdo->prepare("SELECT id FROM scores WHERE quiz_id = ? AND student_id = ?");
        $checkStmt->execute([$data['quiz_id'], $user_id]);
        $existing = $checkStmt->fetch();
        
        $answers = isset($data['answers']) ? $data['answers'] : [];
        $answersJson = json_encode($answers);
        
        if ($existing) {
            $stmt = $pdo->prepare("
                UPDATE scores 
                SET score = ?, answers = ?, completed_at = NOW() 
                WHERE quiz_id = ? AND student_id = ?
            ");
            $stmt->execute([$data['score'], $answersJson, $data['quiz_id'], $user_id]);
        } else {
            $stmt = $pdo->prepare("
                INSERT INTO scores (student_id, quiz_id, score, answers, completed_at) 
                VALUES (?, ?, ?, ?, NOW())
            ");
            $stmt->execute([$user_id, $data['quiz_id'], $data['score'], $answersJson]);
        }
        
        echo json_encode(['success' => true, 'score' => $data['score']]);
        exit();
        
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        exit();
    }
}

// If no action, show the quiz page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Mode - Find Objects in 3D</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            font-family: 'Comic Sans MS', 'Chalkboard SE', sans-serif;
        }
        
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }
        
        .loader-content {
            text-align: center;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #fff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        #quiz-overlay {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 380px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            border: 3px solid #4A90E2;
            z-index: 1000;
            color: #2C3E50;
            display: none;
            transition: all 0.3s ease;
        }
        
        /* Smaller overlay for click object questions only */
        #quiz-overlay.ck-question {
            width: 320px;
            padding: 15px;
        }
        
        #quiz-progress {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 250px;
            background: rgba(255,255,255,0.95);
            border-radius: 15px;
            padding: 15px;
            border: 3px solid #4A90E2;
            z-index: 1000;
            display: none;
        }
        
        .quiz-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .badge {
            background: #4A90E2;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .badge.ck {
            background: #FF9800;
        }
        
        .world-badge {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(255,255,255,0.95);
            padding: 10px 20px;
            border-radius: 30px;
            border: 3px solid #4A90E2;
            font-weight: bold;
            z-index: 1000;
            display: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .world-badge i {
            color: #4A90E2;
            margin-right: 8px;
        }
        
        /* Regular question text for non-CK questions */
        .question-text {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #4A90E2;
            line-height: 1.4;
        }
        
        /* Click Object specific styling - smaller font */
        .click-question-text {
            font-size: 22px;  /* Reduced from 28px */
            font-weight: bold;
            margin: 10px 0 8px 0;  /* Reduced margins */
            color: #4A90E2;
            line-height: 1.3;
            text-align: center;
        }
        
        .click-instruction-small {
            font-size: 14px;  /* Slightly smaller */
            font-weight: 300;
            color: #888888;
            text-align: center;
            margin-bottom: 10px;  /* Reduced margin */
            font-style: italic;
        }
        
        .option {
            background: #f8f9ff;
            border: 3px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 18px;
        }
        
        .option:hover {
            border-color: #4A90E2;
            background: #f0f8ff;
        }
        
        .option.selected {
            background: #e3f2fd;
            border-color: #4A90E2;
        }
        
        .fill-input {
            width: 100%;
            padding: 15px;
            border: 3px solid #e0e0e0;
            border-radius: 12px;
            font-size: 18px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        
        .progress-bar {
            height: 10px;
            background: #e0e0e0;
            border-radius: 5px;
            margin-top: 10px;
        }
        
        .progress-fill {
            height: 100%;
            background: #50C878;
            border-radius: 5px;
            width: 0%;
            transition: width 0.3s;
        }
        
        .click-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4A90E2;
            color: white;
            padding: 25px 50px;
            border-radius: 50px;
            font-size: 32px;
            font-weight: bold;
            z-index: 2000;
            display: none;
            box-shadow: 0 0 50px rgba(74,144,226,0.8);
            border: 4px solid white;
        }
        
        .click-popup.correct {
            background: #50C878;
        }
        
        .click-popup.incorrect {
            background: #FF6B6B;
        }
    </style>
    <!-- Include virtual-world-selector.js -->
    <script src="virtual-world-selector.js"></script>
</head>
<body>
    <div id="loading">
        <div class="loader-content">
            <h1>&#127918; Loading Quiz</h1>
            <p>Preparing your 3D adventure...</p>
            <div class="spinner"></div>
        </div>
    </div>

    <!-- World Badge -->
    <div id="world-badge" class="world-badge">
        <i>&#127758;</i> <span id="world-name">Loading world...</span>
    </div>

    <!-- Quiz UI -->
    <div id="quiz-overlay">
        <div id="question-container"></div>
    </div>
    
    <div id="quiz-progress">
        <div style="display: flex; justify-content: space-between;">
            <span>Question <span id="current-q">1</span>/<span id="total-q">?</span></span>
            <span id="progress-percent">0%</span>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" id="progress-fill"></div>
        </div>
    </div>
    
    <div class="click-popup" id="click-popup"></div>

    <!-- Container for the dynamically created iframe -->
    <div id="iframe-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%;"></div>

    <script>
        const quizId = <?php echo $quiz_id; ?>;
        
        // Quiz state
        let questions = [];
        let currentIndex = 0;
        let answers = [];
        let clickTimer = null;
        let autoAdvanceTimer = null;
        let lastClickedModel = null;
        let awaitingClick = false;
        
        // Debug function
        function debug(msg) {
            console.log('[QUIZ] ' + msg);
        }
        
        // Handle H key to go home
        function goHome() {
            window.location.href = '../index.php';
        }
        
        // Listen for H key in parent window
        window.addEventListener('keydown', function(event) {
            if (event.key.toLowerCase() === 'h') {
                goHome();
            }
        });
        
        // Clean up quiz UI when leaving
        function cleanupQuizUI() {
            // Hide all quiz UI elements
            const quizOverlay = document.getElementById('quiz-overlay');
            const quizProgress = document.getElementById('quiz-progress');
            const worldBadge = document.getElementById('world-badge');
            const loading = document.getElementById('loading');
            
            if (quizOverlay) quizOverlay.style.display = 'none';
            if (quizProgress) quizProgress.style.display = 'none';
            if (worldBadge) worldBadge.style.display = 'none';
            if (loading) loading.style.display = 'none';
            
            // Clear any timers
            if (clickTimer) clearTimeout(clickTimer);
            if (autoAdvanceTimer) clearTimeout(autoAdvanceTimer);
        }
        
        // Listen for page unload or navigation
        window.addEventListener('beforeunload', function() {
            cleanupQuizUI();
        });
        
        // Create iframe with the world link from virtual-world-selector.js
        function createIframe(worldName) {
            // Create a temporary container for the selector
            const tempContainer = document.createElement('div');
            tempContainer.id = 'temp-selector';
            tempContainer.style.display = 'none';
            document.body.appendChild(tempContainer);
            
            // Initialize selector to access world data
            const selector = new VirtualWorldSelector({
                displayOnly: true,
                containerId: 'temp-selector'
            });
            
            // Find the world by name (case-insensitive)
            const normalizedSearch = (worldName || '').toLowerCase().trim();
            let foundWorld = null;
            
            // Search through all worlds to find a name match
            for (const [key, world] of Object.entries(selector.worlds)) {
                if (world.name.toLowerCase() === normalizedSearch) {
                    foundWorld = world;
                    debug(`Found world: ${world.name} (${key})`);
                    break;
                }
            }
            
            // If not found by exact match, try partial match
            if (!foundWorld) {
                for (const [key, world] of Object.entries(selector.worlds)) {
                    if (world.name.toLowerCase().includes(normalizedSearch) || 
                        normalizedSearch.includes(world.name.toLowerCase())) {
                        foundWorld = world;
                        debug(`Found partial match: ${world.name} (${key})`);
                        break;
                    }
                }
            }
            
            // Default to playground if still not found
            if (!foundWorld) {
                debug(`World "${worldName}" not found, defaulting to playground`);
                foundWorld = selector.worlds['playground'];
            }
            
            // Get the link
            let worldLink = foundWorld.link;
            
            // Add quiz parameter
            worldLink += (worldLink.includes('?') ? '&' : '?') + 'quiz=1';
            
            debug(`Opening world: ${foundWorld.name} at ${worldLink}`);
            
            // Create the iframe
            const container = document.getElementById('iframe-container');
            container.innerHTML = ''; // Clear any existing iframe
            
            const iframe = document.createElement('iframe');
            iframe.id = 'village-frame';
            iframe.src = worldLink;
            iframe.style.position = 'fixed';
            iframe.style.top = '0';
            iframe.style.left = '0';
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            iframe.style.border = 'none';
            
            container.appendChild(iframe);
            
            // Setup iframe load event
            iframe.onload = function() {
                debug('Iframe loaded');
                setTimeout(injectIframeBridge, 3000);
            };
            
            // Display world name
            document.getElementById('world-name').textContent = foundWorld.name;
            document.getElementById('world-badge').style.display = 'block';
            
            // Clean up temporary container
            setTimeout(() => {
                if (tempContainer && tempContainer.parentNode) {
                    tempContainer.parentNode.removeChild(tempContainer);
                }
            }, 100);
        }
        
        // Load questions from our own API
        async function loadQuestions() {
            try {
                debug('Loading questions...');
                const response = await fetch(`?action=get_questions&quiz_id=${quizId}`);
                const data = await response.json();
                
                if (data.success) {
                    questions = data.questions;
                    
                    document.getElementById('total-q').textContent = questions.length;
                    
                    // Create and load the iframe with the correct world
                    createIframe(data.virtual_world);
                    
                    document.getElementById('loading').style.display = 'none';
                    document.getElementById('quiz-overlay').style.display = 'block';
                    document.getElementById('quiz-progress').style.display = 'block';
                    
                    debug(`Loaded ${questions.length} questions`);
                    debug(`Virtual world: ${data.virtual_world}`);
                    
                    loadQuestion(0);
                } else {
                    debug('Error: ' + data.error);
                }
            } catch (error) {
                debug('Error loading questions: ' + error.message);
            }
        }
        
        // Load a question
        function loadQuestion(index) {
            if (index >= questions.length) {
                completeQuiz();
                return;
            }
            
            currentIndex = index;
            const q = questions[index];
            awaitingClick = (q.type === 'CK');
            lastClickedModel = null;
            
            // Add or remove CK class from quiz overlay based on question type
            const quizOverlay = document.getElementById('quiz-overlay');
            if (q.type === 'CK') {
                quizOverlay.classList.add('ck-question');
            } else {
                quizOverlay.classList.remove('ck-question');
            }
            
            let html = `
                <div class="quiz-header">
                    <span class="badge ${q.type === 'CK' ? 'ck' : ''}">Question ${index + 1}</span>
                    <span class="badge ${q.type === 'CK' ? 'ck' : ''}">${getTypeName(q.type)}</span>
                </div>
            `;
            
            if (q.type === 'CK') {
                // Click Object: Smaller centered question, small gray instruction
                html += `
                    <div class="click-question-text">${q.text}</div>
                    <div class="click-instruction-small">Reminder: you need to double-click.</div>
                `;
            } else {
                // Other question types: Regular styling (unchanged)
                html += `<div class="question-text">${q.text}</div>`;
                
                if (q.type === 'MC') {
                    html += '<div class="options-container">';
                    if (q.options) {
                        // Filter out any non-letter keys (like 'question_type')
                        const validOptions = {};
                        for (let key in q.options) {
                            // Only include single-letter keys (A, B, C, D)
                            if (key.length === 1 && key.match(/[A-D]/i)) {
                                validOptions[key] = q.options[key];
                            }
                        }
                        
                        // Convert to array and shuffle
                        const entries = Object.entries(validOptions);
                        const shuffled = entries.sort(() => Math.random() - 0.5);
                        
                        for (let [letter, text] of shuffled) {
                            // Display only the text, no letter prefix
                            html += `<div class="option" onclick="selectOption('${letter}')">${text}</div>`;
                        }
                    }
                    html += '</div>';
                } else if (q.type === 'TF') {
                    html += `
                        <div class="options-container">
                            <div class="option" onclick="selectOption('A')">True</div>
                            <div class="option" onclick="selectOption('B')">False</div>
                        </div>
                    `;
                } else if (q.type === 'FB') {
                    html += `
                        <div class="options-container">
                            <input type="text" class="fill-input" id="fill-input" placeholder="Type your answer...">
                        </div>
                    `;
                }
            }
            
            document.getElementById('question-container').innerHTML = html;
            
            if (q.type === 'FB') {
                document.getElementById('fill-input').addEventListener('input', checkFillBlank);
            }
            
            updateProgress();
        }
        
        // Update progress
        function updateProgress() {
            const percent = (currentIndex / questions.length) * 100;
            document.getElementById('progress-fill').style.width = percent + '%';
            document.getElementById('progress-percent').textContent = Math.round(percent) + '%';
            document.getElementById('current-q').textContent = currentIndex + 1;
        }
        
        // Select option for MC/TF
        function selectOption(letter) {
            document.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
            event.currentTarget.classList.add('selected');
            
            const q = questions[currentIndex];
            answers[currentIndex] = letter;
            
            const isCorrect = letter === q.correct;
            
            if (isCorrect) {
                showClickPopup('Correct!', true);
            } else {
                showClickPopup('Sorry, that is incorrect.', false);
            }
            
            // Clear any existing timer
            if (autoAdvanceTimer) clearTimeout(autoAdvanceTimer);
            
            // Automatically go to next question after 3 seconds
            autoAdvanceTimer = setTimeout(() => {
                if (currentIndex + 1 < questions.length) {
                    currentIndex++;
                    loadQuestion(currentIndex);
                } else {
                    completeQuiz();
                }
            }, 3000);
        }
        
        // Check fill blank
        function checkFillBlank() {
            const input = document.getElementById('fill-input');
            if (input && input.value.trim()) {
                const q = questions[currentIndex];
                const answer = input.value.trim();
                answers[currentIndex] = answer;
                
                const isCorrect = answer.toLowerCase() === q.correct.toLowerCase();
                
                if (isCorrect) {
                    showClickPopup('Correct!', true);
                } else {
                    showClickPopup('Sorry, that is incorrect.', false);
                }
                
                // Clear any existing timer
                if (autoAdvanceTimer) clearTimeout(autoAdvanceTimer);
                
                // Automatically go to next question after 3 seconds
                autoAdvanceTimer = setTimeout(() => {
                    if (currentIndex + 1 < questions.length) {
                        currentIndex++;
                        loadQuestion(currentIndex);
                    } else {
                        completeQuiz();
                    }
                }, 3000);
            }
        }
        
        // Handle object click from iframe
        function handleObjectClick(modelName) {
            if (!awaitingClick) {
                debug('Not waiting for a click');
                return;
            }
            
            const q = questions[currentIndex];
            if (q.type !== 'CK') return;
            
            debug(`Object clicked in iframe: ${modelName}`);
            
            // Clear any previous timer
            if (clickTimer) clearTimeout(clickTimer);
            if (autoAdvanceTimer) clearTimeout(autoAdvanceTimer);
            
            // Check if clicked object matches the expected model
            const expectedModel = q.modelName.toLowerCase();
            const clickedModel = modelName.toLowerCase();
            
            // Check if they match (exact or partial)
            const isCorrect = clickedModel.includes(expectedModel) || expectedModel.includes(clickedModel);
            
            if (isCorrect) {
                showClickPopup('Correct!', true);
                
                // Save answer
                answers[currentIndex] = modelName;
                awaitingClick = false;
                
                debug(`&#9989; Correct answer for Q${currentIndex+1}: ${modelName}`);
            } else {
                // WRONG ANSWER
                showClickPopup('Sorry, that is incorrect.', false);
                
                // Save wrong answer
                answers[currentIndex] = null;
                awaitingClick = false;
                
                debug(`&#10060; Wrong answer for Q${currentIndex+1}`);
            }
            
            // Automatically go to next question after 3 seconds
            autoAdvanceTimer = setTimeout(() => {
                if (currentIndex + 1 < questions.length) {
                    currentIndex++;
                    loadQuestion(currentIndex);
                } else {
                    completeQuiz();
                }
            }, 3000);
        }
        
        // Show click popup
        function showClickPopup(text, isCorrect = null) {
            const popup = document.getElementById('click-popup');
            popup.textContent = text;
            popup.style.display = 'block';
            popup.className = isCorrect === true ? 'click-popup correct' : 
                            isCorrect === false ? 'click-popup incorrect' : 'click-popup';
            setTimeout(() => popup.style.display = 'none', 1500);
        }
        
        // Complete quiz
        async function completeQuiz() {
            let correct = 0;
            questions.forEach((q, i) => {
                if (answers[i]) {
                    if (q.type === 'MC' || q.type === 'TF') {
                        if (answers[i] === q.correct) correct++;
                    } else if (q.type === 'FB') {
                        if (answers[i].toLowerCase() === q.correct.toLowerCase()) correct++;
                    } else if (q.type === 'CK') {
                        const expected = q.modelName.toLowerCase();
                        const clicked = answers[i].toLowerCase();
                        if (clicked.includes(expected) || expected.includes(clicked)) correct++;
                    }
                }
            });
            
            const score = Math.round((correct / questions.length) * 100);
            debug(`Quiz complete! Score: ${score}% (${correct}/${questions.length})`);
            
            // Save score
            try {
                await fetch('?action=save_score', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ 
                        quiz_id: quizId, 
                        score: score, 
                        answers: answers 
                    })
                });
                debug('Score saved');
            } catch (e) {
                debug('Error saving score: ' + e.message);
            }
            
            // Show results
            document.getElementById('question-container').innerHTML = `
                <div style="text-align: center; padding: 20px;">
                    <div style="font-size: 48px; color: #4A90E2;">${score}%</div>
                    <div style="font-size: 24px; margin: 20px 0;">${correct}/${questions.length} correct</div>
                    <button class="next-btn" onclick="window.location.href='student-dashboard.php'">Dashboard</button>
                </div>
            `;
            document.getElementById('quiz-progress').style.display = 'none';
        }
        
        function getTypeName(type) {
            const names = {
                'MC': 'Multiple Choice',
                'TF': 'True/False',
                'FB': 'Fill in the Blank',
                'CK': 'Click Object'
            };
            return names[type] || type;
        }
        
        // Listen for messages from iframe
        window.addEventListener('message', function(event) {
            debug(`Message from iframe: ${JSON.stringify(event.data)}`);
            
            if (event.data.type === 'objectClicked') {
                handleObjectClick(event.data.modelName);
            } else if (event.data.type === 'goHome') {
                goHome();
            }
        });
        
        // Inject bridge script into iframe to connect with clickedObject.js
        function injectIframeBridge() {
            const iframe = document.getElementById('village-frame');
            
            if (!iframe) {
                debug('Iframe not found for bridge injection');
                return;
            }
            
            try {
                const iframeWin = iframe.contentWindow;
                const iframeDoc = iframe.contentDocument || iframeWin.document;
                
                // Create a bridge script that will listen for clicks from clickedObject.js
                const script = iframeDoc.createElement('script');
                script.textContent = `
                    // Bridge between clickedObject.js and parent quiz
                    (function() {
                        console.log('&#128268; Quiz bridge initializing...');
                        
                        // Function to send clicked object to parent
                        function sendClickToParent(modelName) {
                            if (window.parent) {
                                window.parent.postMessage({
                                    type: 'objectClicked',
                                    modelName: modelName
                                }, '*');
                                console.log('&#128228; Sent click to parent:', modelName);
                            }
                        }
                        
                        // Check if we're in quiz mode
                        const urlParams = new URLSearchParams(window.location.search);
                        const isQuizMode = urlParams.get('quiz') === '1' || (window.parent && window.parent !== window);
                        
                        if (!isQuizMode) {
                            console.log('&#128277; Bridge disabled - not in quiz mode');
                            return;
                        }
                        
                        // Wait for clickedObject.js to be ready
                        let checkInterval = setInterval(function() {
                            if (typeof camera !== 'undefined' && typeof scene !== 'undefined') {
                                clearInterval(checkInterval);
                                console.log('&#9989; Bridge: Camera and scene found');
                                
                                // Listen for clicks and capture the model name
                                document.addEventListener('dblclick', function(e) {
                                    // Small delay to let clickedObject.js update its display
                                    setTimeout(function() {
                                        const display = document.getElementById('clicked-model-display');
                                        if (display && display.style.display === 'block') {
                                            const text = display.textContent;
                                            const match = text.match(/Selected: (.+)/);
                                            if (match && match[1]) {
                                                sendClickToParent(match[1]);
                                                // Don't prevent default - allow normal navigation
                                            }
                                        }
                                    }, 100);
                                }, true);
                                
                                console.log('&#9989; Bridge initialized - double-clicks will be sent to parent');
                            }
                        }, 500);
                        
                        // Listen for H key to go home
                        document.addEventListener('keydown', function(e) {
                            if (e.key.toLowerCase() === 'h') {
                                if (window.parent) {
                                    window.parent.postMessage({
                                        type: 'goHome'
                                    }, '*');
                                }
                            }
                        });
                    })();
                `;
                
                iframeDoc.head.appendChild(script);
                debug('Bridge script injected into iframe');
            } catch (e) {
                debug('Could not inject bridge: ' + e.message);
            }
        }
        
        // Start loading questions
        loadQuestions();
    </script>
</body>
</html>