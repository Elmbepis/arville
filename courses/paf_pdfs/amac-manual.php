<?php
session_start();
// manual.php - Dynamic PDF Viewer with Header Background
// Database connection
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get parameters from URL
$course = isset($_GET['course']) ? urldecode($_GET['course']) : 'AMAC';
$manual_id = isset($_GET['manual_id']) ? intval($_GET['manual_id']) : 0;

// Get available courses from manuals table
$courses = [];
$courses_result = $conn->query("SELECT DISTINCT course_code, course_name FROM manuals ORDER BY course_name");
while ($row = $courses_result->fetch_assoc()) {
    $courses[$row['course_code']] = [
        'name' => $row['course_name']
    ];
}

if (!array_key_exists($course, $courses) && !empty($courses)) {
    $course = array_key_first($courses);
}

$course_name = isset($courses[$course]) ? $courses[$course]['name'] : 'No Course Available';

// Get manuals for the selected course
$manuals = [];
$manual_stmt = $conn->prepare("SELECT id, manual_name, file_path, description FROM manuals WHERE course_code = ? ORDER BY manual_name");
$manual_stmt->bind_param("s", $course);
$manual_stmt->execute();
$manual_result = $manual_stmt->get_result();

while ($row = $manual_result->fetch_assoc()) {
    $manuals[$row['id']] = [
        'name' => $row['manual_name'],
        'file_path' => $row['file_path'],
        'description' => $row['description']
    ];
}

// Determine which manual to display
$current_manual = null;
$pdf_path = '';
$pdf_exists = false;

if ($manual_id > 0 && isset($manuals[$manual_id])) {
    // Use the specific manual_id from URL
    $current_manual = $manuals[$manual_id];
} elseif (!empty($manuals)) {
    // Use the first manual if no specific ID provided
    $first_manual_id = array_key_first($manuals);
    $current_manual = $manuals[$first_manual_id];
    $manual_id = $first_manual_id;
}

if ($current_manual) {
    $pdf_path = $current_manual['file_path'];
    $full_pdf_path = __DIR__ . '/' . $pdf_path;
    $pdf_exists = file_exists($full_pdf_path);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($course_name); ?> - Training Manual</title>
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
    
    .course-info {
        color: #666;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    #pdf-controls { 
        background: white;
        padding: 15px;
        margin: 0 auto 20px auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        max-width: 800px;
    }
    
    .page-nav {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .font-controls {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8f8f8;
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #ddd;
    }
    
    .selector-container {
        margin: 10px auto;
        max-width: 800px;
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .selector-container select {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        min-width: 250px;
    }
    
    button {
        padding: 8px 16px;
        border: none;
        background: #003366;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.3s;
    }
    
    button:hover { 
        background: #0055aa; 
    }
    
    .font-btn {
        width: 40px;
        height: 40px;
        font-weight: bold;
        font-size: 18px;
    }
    
    #current-font-size {
        min-width: 60px;
        text-align: center;
        font-weight: bold;
        color: #003366;
        font-size: 16px;
    }
    
    canvas {
        margin: 0 auto;
        border: 1px solid #ccc;
        background: white;
        display: block;
        max-width: 100%;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    #loading {
        margin: 20px;
        color: #666;
        font-size: 16px;
        display: none;
    }
    
    .error {
        color: red;
        margin: 20px;
        padding: 10px;
        background: #ffe6e6;
        border-radius: 4px;
    }
    
    .manual-description {
        color: #666;
        font-style: italic;
        margin-bottom: 10px;
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
  </style>
</head>
<body>
  <!-- Header with tiled background and logo -->
  <div class="header">
    <img src="paf-logo.png" alt="Training Logo" class="header-logo">
  </div>

  <h2><?php echo htmlspecialchars($course_name); ?> - Training Manual</h2>
  <div class="course-info">
    Course: <?php echo htmlspecialchars($course_name); ?><br>
    <?php if ($current_manual): ?>
        Manual: <?php echo htmlspecialchars($current_manual['name']); ?>
        <?php if (!empty($current_manual['description'])): ?>
            <div class="manual-description"><?php echo htmlspecialchars($current_manual['description']); ?></div>
        <?php endif; ?>
    <?php endif; ?>
  </div>

  <div class="selector-container">
    <div>
      <label for="course-select">Select Course: </label>
      <select id="course-select" onchange="changeCourse(this.value)">
          <?php if (empty($courses)): ?>
              <option value="">No courses available</option>
          <?php else: ?>
              <?php foreach ($courses as $course_id => $course_data): ?>
                  <option value="<?php echo htmlspecialchars($course_id); ?>" 
                          <?php echo $course_id === $course ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($course_data['name']); ?>
                  </option>
              <?php endforeach; ?>
          <?php endif; ?>
      </select>
    </div>
    
    <div>
      <label for="manual-select">Select Manual: </label>
      <select id="manual-select" onchange="changeManual(this.value)" <?php echo empty($manuals) ? 'disabled' : ''; ?>>
          <?php if (empty($manuals)): ?>
              <option value="">No manuals available</option>
          <?php else: ?>
              <?php foreach ($manuals as $manual_id_val => $manual_data): ?>
                  <option value="<?php echo $manual_id_val; ?>" 
                          <?php echo $manual_id_val === $manual_id ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($manual_data['name']); ?>
                  </option>
              <?php endforeach; ?>
          <?php endif; ?>
      </select>
    </div>
  </div>

  <div id="pdf-controls">
    <div class="page-nav">
      <button onclick="prevPage()">&#8592; Previous</button>
      <span style="font-weight: bold;">Page: <span id="page-num">1</span> / <span id="page-count">0</span></span>
      <button onclick="nextPage()">Next &#8594;</button>
    </div>
    
    <div class="font-controls">
      <span style="color: #666;">Text Size:</span>
      <button class="font-btn" onclick="changeFontSize(-2)" title="Decrease text size">A-</button>
      <span id="current-font-size">100%</span>
      <button class="font-btn" onclick="changeFontSize(2)" title="Increase text size">A+</button>
    </div>
  </div>

  <canvas id="pdf-viewer"></canvas>
  <div id="loading">Loading PDF document...</div>
  <div id="error" class="error" style="display: <?php echo ($pdf_exists && !empty($manuals)) ? 'none' : 'block'; ?>;">
      <?php if (empty($manuals)): ?>
          No manuals available for this course.
      <?php elseif (!$pdf_exists): ?>
          PDF file not found: <strong><?php echo htmlspecialchars($pdf_path); ?></strong>
      <?php endif; ?>
  </div>

  <!-- Action Buttons -->
  <div class="action-buttons">
    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>

  <script src="pdf.js"></script>
  <script>
    // PHP variables passed to JavaScript
    const currentCourse = "<?php echo addslashes($course); ?>";
    const currentManualId = "<?php echo $manual_id; ?>";
    const pdfUrl = "<?php echo addslashes($pdf_path); ?>";
    const pdfExists = <?php echo $pdf_exists ? 'true' : 'false'; ?>;
    const hasManuals = <?php echo !empty($manuals) ? 'true' : 'false'; ?>;

    let pdfDoc = null;
    let currentPage = 1;
    let currentScale = 1.0;
    let renderTask = null;
    let isRendering = false;

    const canvas = document.getElementById('pdf-viewer');
    const ctx = canvas.getContext('2d');
    const loading = document.getElementById('loading');
    const errorDiv = document.getElementById('error');

    function changeCourse(courseId) {
        const url = new URL(window.location);
        url.searchParams.set('course', courseId);
        url.searchParams.delete('manual_id');
        window.location.href = url.toString();
    }

    function changeManual(manualId) {
        const url = new URL(window.location);
        url.searchParams.set('manual_id', manualId);
        window.location.href = url.toString();
    }

    function cancelRendering() {
        if (renderTask && isRendering) {
            try { renderTask.cancel(); } catch (err) {}
            isRendering = false;
        }
    }

    function showError(message) {
        errorDiv.innerHTML = message;
        errorDiv.style.display = 'block';
        loading.style.display = 'none';
        canvas.style.display = 'none';
        isRendering = false;
    }

    function hideError() {
        errorDiv.style.display = 'none';
        canvas.style.display = 'block';
    }

    function renderPage(num) {
        if (!pdfDoc) return;
        cancelRendering();
        hideError();
        loading.style.display = "block";
        loading.textContent = `Loading page ${num}...`;
        isRendering = true;

        pdfDoc.getPage(num).then(page => {
            const viewport = page.getViewport({ scale: currentScale });
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            const renderContext = { canvasContext: ctx, viewport: viewport };
            renderTask = page.render(renderContext);
            return renderTask.promise;
        }).then(() => {
            document.getElementById('page-num').textContent = num;
            loading.style.display = "none";
            isRendering = false;
        }).catch(err => {
            if (err && err.name !== 'RenderingCancelled') {
                console.error('Error rendering page:', err);
                showError('Error loading page: ' + (err?.message || err));
            }
            isRendering = false;
        });
    }

    function loadPdf(url) {
        cancelRendering();
        pdfDoc = null;
        currentPage = 1;
        currentScale = 1.0;
        document.getElementById('page-num').textContent = '1';
        document.getElementById('page-count').textContent = '0';
        document.getElementById('current-font-size').textContent = '100%';
        hideError();
        loading.style.display = "block";
        loading.textContent = `Loading manual...`;

        pdfjsLib.getDocument(url).promise.then(pdf => {
            pdfDoc = pdf;
            document.getElementById('page-count').textContent = pdf.numPages;
            loading.style.display = "none";
            renderPage(currentPage);
        }).catch(err => {
            console.error('Error loading PDF:', err);
            showError('Error loading PDF: ' + err.message + '<br>File: <strong>' + url + '</strong>');
        });
    }

    function nextPage() {
        if (pdfDoc && currentPage < pdfDoc.numPages && !isRendering) {
            currentPage++;
            renderPage(currentPage);
        }
    }

    function prevPage() {
        if (pdfDoc && currentPage > 1 && !isRendering) {
            currentPage--;
            renderPage(currentPage);
        }
    }

    function changeFontSize(change) {
        if (isRendering) return;
        currentScale += change * 0.1;
        currentScale = Math.max(0.5, Math.min(3.0, currentScale));
        document.getElementById('current-font-size').textContent = 
            Math.round(currentScale * 100) + '%';
        if (pdfDoc) renderPage(currentPage);
    }

    window.nextPage = nextPage;
    window.prevPage = prevPage;
    window.changeFontSize = changeFontSize;
    window.changeCourse = changeCourse;
    window.changeManual = changeManual;

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.js';

    document.addEventListener('DOMContentLoaded', function() {
        if (hasManuals && pdfExists) {
            loadPdf(pdfUrl);
        } else if (!hasManuals) {
            showError('No manuals available for this course.');
        } else {
            showError('PDF file not found: <strong>' + pdfUrl + '</strong>');
        }
    });

    window.addEventListener('beforeunload', function() {
        cancelRendering();
    });
  </script>
</body>
</html>