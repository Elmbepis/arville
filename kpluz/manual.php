<?php
// manual.php - Dynamic PDF Viewer with Header Background
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PAF Training Platform - Training Manual</title>
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
  </style>
</head>
<body>
  <!-- Header with tiled background and logo -->
  <div class="header">
    <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
  </div>

  <?php
  // Database connection - UPDATED to use 'kpluz' database
  $conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Get parameters from URL - UPDATED for new structure
  $shs_pathway = isset($_GET['shs_pathway']) ? urldecode($_GET['shs_pathway']) : '';
  $subject = isset($_GET['subject']) ? urldecode($_GET['subject']) : '';
  $lesson_id = isset($_GET['manual_id']) ? (int)$_GET['manual_id'] : 0;
  
  // Get lesson details from database
  $lesson_name = '';
  $description = '';
  $file_path = '';
  $pdf_exists = false;
  
  if ($lesson_id > 0) {
      $stmt = $conn->prepare("SELECT lesson, description, file_path FROM manuals WHERE id = ?");
      $stmt->bind_param("i", $lesson_id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($row = $result->fetch_assoc()) {
          $lesson_name = $row['lesson'];
          $description = $row['description'];
          $file_path = $row['file_path'];
          
          // Check if PDF file exists
          $full_pdf_path = __DIR__ . '/' . $file_path;
          $pdf_exists = file_exists($full_pdf_path);
      }
      $stmt->close();
  }
  
  // Get all available SHS pathways and subjects for navigation
  $pathways_result = $conn->query("SELECT DISTINCT shs_pathway, subject FROM manuals ORDER BY shs_pathway, subject");
  $pathway_options = [];
  while ($row = $pathways_result->fetch_assoc()) {
      $pathway_options[] = $row;
  }
  
  // Get lessons for current pathway/subject for chapter selection
  $lessons = [];
  if (!empty($shs_pathway) && !empty($subject)) {
      $stmt = $conn->prepare("SELECT id, lesson FROM manuals WHERE shs_pathway = ? AND subject = ? ORDER BY lesson");
      $stmt->bind_param("ss", $shs_pathway, $subject);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
          $lessons[$row['id']] = $row['lesson'];
      }
      $stmt->close();
  }
  
  $conn->close();
  
  // Display name for current selection
  $display_name = (!empty($shs_pathway) && !empty($subject)) ? $shs_pathway . ' - ' . $subject : 'Training Manual';
  ?>
  
  <h2><?php echo htmlspecialchars($display_name); ?> - Training Manual</h2>
  <div class="course-info">
    SHS Pathway: <?php echo htmlspecialchars($shs_pathway); ?><br>
    Subject: <?php echo htmlspecialchars($subject); ?><br>
    <?php if (!empty($lesson_name)): ?>
        Lesson: <?php echo htmlspecialchars($lesson_name); ?>
    <?php endif; ?>
    <?php if (!empty($description)): ?>
        <br><small><?php echo htmlspecialchars($description); ?></small>
    <?php endif; ?>
  </div>

  <div class="selector-container">
    <div>
      <label for="pathway-select">Select SHS Pathway: </label>
      <select id="pathway-select" onchange="changePathway(this.value, document.getElementById('subject-select').value)">
          <option value="">Select Pathway</option>
          <?php 
          $unique_pathways = [];
          foreach ($pathway_options as $option):
              if (!in_array($option['shs_pathway'], $unique_pathways)):
                  $unique_pathways[] = $option['shs_pathway'];
          ?>
              <option value="<?php echo htmlspecialchars($option['shs_pathway']); ?>" 
                      <?php echo $option['shs_pathway'] === $shs_pathway ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($option['shs_pathway']); ?>
              </option>
          <?php 
              endif;
          endforeach; 
          ?>
      </select>
    </div>
    
    <div>
      <label for="subject-select">Select Subject: </label>
      <select id="subject-select" onchange="changePathway(document.getElementById('pathway-select').value, this.value)">
          <option value="">Select Subject</option>
          <?php foreach ($pathway_options as $option): ?>
              <?php if ($option['shs_pathway'] === $shs_pathway): ?>
                  <option value="<?php echo htmlspecialchars($option['subject']); ?>" 
                          <?php echo $option['subject'] === $subject ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($option['subject']); ?>
                  </option>
              <?php endif; ?>
          <?php endforeach; ?>
      </select>
    </div>
    
    <div>
      <label for="lesson-select">Select Lesson: </label>
      <select id="lesson-select" onchange="changeLesson(this.value)" <?php echo empty($lessons) ? 'disabled' : ''; ?>>
          <option value="">Select Lesson</option>
          <?php foreach ($lessons as $id => $lesson): ?>
              <option value="<?php echo $id; ?>" 
                      <?php echo $id === $lesson_id ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($lesson); ?>
              </option>
          <?php endforeach; ?>
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
  <div id="error" class="error" style="display: <?php echo $pdf_exists ? 'none' : 'block'; ?>;">
      <?php if (empty($file_path)): ?>
          No PDF file associated with this lesson.
      <?php elseif (!$pdf_exists): ?>
          PDF file not found: <strong><?php echo htmlspecialchars($file_path); ?></strong>
      <?php endif; ?>
  </div>

  <script src="pdf.js"></script>
  <script>
    // PHP variables passed to JavaScript
    const currentPathway = "<?php echo addslashes($shs_pathway); ?>";
    const currentSubject = "<?php echo addslashes($subject); ?>";
    const currentLessonId = <?php echo $lesson_id; ?>;
    const pdfUrl = "<?php echo addslashes($file_path); ?>";
    const pdfExists = <?php echo $pdf_exists ? 'true' : 'false'; ?>;

    let pdfDoc = null;
    let currentPage = 1;
    let currentScale = 1.0;
    let renderTask = null;
    let isRendering = false;

    const canvas = document.getElementById('pdf-viewer');
    const ctx = canvas.getContext('2d');
    const loading = document.getElementById('loading');
    const errorDiv = document.getElementById('error');

    function changePathway(pathway, subject) {
        if (!pathway || !subject) return;
        const url = new URL(window.location);
        url.searchParams.set('shs_pathway', pathway);
        url.searchParams.set('subject', subject);
        url.searchParams.delete('manual_id');
        window.location.href = url.toString();
    }

    function changeLesson(lessonId) {
        if (!lessonId) return;
        const url = new URL(window.location);
        url.searchParams.set('manual_id', lessonId);
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
        loading.textContent = "Loading PDF...";

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

    // Make functions globally accessible
    window.nextPage = nextPage;
    window.prevPage = prevPage;
    window.changeFontSize = changeFontSize;
    window.changePathway = changePathway;
    window.changeLesson = changeLesson;

    // Initialize PDF.js worker
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.js';

    // Load PDF when page loads
    document.addEventListener('DOMContentLoaded', function() {
        if (pdfExists && pdfUrl) {
            loadPdf(pdfUrl);
        } else if (!pdfExists && currentLessonId > 0) {
            showError('PDF file not found: <strong>' + pdfUrl + '</strong>');
        } else if (currentLessonId === 0) {
            showError('Please select a lesson to view the manual.');
        }
    });

    // Cancel rendering on page unload
    window.addEventListener('beforeunload', function() {
        cancelRendering();
    });
  </script>
</body>
</html>