<?php
// manual.php - Dynamic PDF Viewer with Header Background
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aircraft Maintenance Apprentice Course - Training Manual</title>
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

    /* &#128313; Header background strip */
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
  <!-- &#128313; Header with tiled background and logo -->
  <div class="header">
    <img src="paf-logo.png" alt="Training Logo" class="header-logo">
  </div>

  <?php
  // Get parameters from URL
  $course = isset($_GET['course']) ? urldecode($_GET['course']) : 'amac';
  $chapter = isset($_GET['chapter']) ? urldecode($_GET['chapter']) : '';
  
  // Define available courses
  $courses = [
      'amac' => [
          'name' => 'Aircraft Maintenance Apprentice Course',
          'folder' => 'amac'
      ]
  ];
  
  if (!array_key_exists($course, $courses)) {
      $course = 'amac';
  }
  
  $course_name = $courses[$course]['name'];
  
  $course_folder = $courses[$course]['folder'];
  $pdf_folder = __DIR__ . '/' . $course_folder;
  $chapters = [];
  
  if (is_dir($pdf_folder)) {
      $files = scandir($pdf_folder);
      foreach ($files as $file) {
          if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
              $chapter_name = pathinfo($file, PATHINFO_FILENAME);
              $chapters[$chapter_name] = $file;
          }
      }
      ksort($chapters);
  }
  
  $valid_chapter = '';
  if (!empty($chapter)) {
      foreach ($chapters as $chap_name => $chap_file) {
          if ($chap_name === $chapter) {
              $valid_chapter = $chap_name;
              break;
          }
      }
  }
  
  if (empty($valid_chapter) && !empty($chapters)) {
      $valid_chapter = array_key_first($chapters);
  }
  
  if (!empty($valid_chapter) && !empty($chapters)) {
      $pdf_path = $course_folder . '/' . $chapters[$valid_chapter];
      $full_pdf_path = __DIR__ . '/' . $pdf_path;
      $pdf_exists = file_exists($full_pdf_path);
      $current_chapter = $valid_chapter;
  } else {
      $pdf_exists = false;
      $pdf_path = '';
      $current_chapter = '';
  }
  ?>
  
  <h2><?php echo htmlspecialchars($course_name); ?> - Training Manual</h2>
  <div class="course-info">
    Course: <?php echo htmlspecialchars($course_name); ?><br>
    <?php if (!empty($current_chapter)): ?>
        Chapter: <?php echo htmlspecialchars($current_chapter); ?>
    <?php endif; ?>
  </div>

  <div class="selector-container">
    <div>
      <label for="course-select">Select Course: </label>
      <select id="course-select" onchange="changeCourse(this.value)">
          <?php foreach ($courses as $course_id => $course_data): ?>
              <option value="<?php echo htmlspecialchars($course_id); ?>" 
                      <?php echo $course_id === $course ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($course_data['name']); ?>
              </option>
          <?php endforeach; ?>
      </select>
    </div>
    
    <div>
      <label for="chapter-select">Select Chapter: </label>
      <select id="chapter-select" onchange="changeChapter(this.value)" <?php echo empty($chapters) ? 'disabled' : ''; ?>>
          <?php if (empty($chapters)): ?>
              <option value="">No PDF files found</option>
          <?php else: ?>
              <?php foreach ($chapters as $chap_name => $chap_file): ?>
                  <option value="<?php echo htmlspecialchars($chap_name); ?>" 
                          <?php echo $chap_name === $current_chapter ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($chap_name); ?>
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
  <div id="error" class="error" style="display: <?php echo ($pdf_exists && !empty($chapters)) ? 'none' : 'block'; ?>;">
      <?php if (empty($chapters)): ?>
          No PDF files found in the <?php echo htmlspecialchars($course_folder); ?> folder.
      <?php elseif (!$pdf_exists): ?>
          PDF file not found: <strong><?php echo htmlspecialchars($pdf_path); ?></strong>
      <?php endif; ?>
  </div>

  <script src="pdf.js"></script>
  <script>
    // PHP variables passed to JavaScript
    const currentCourse = "<?php echo addslashes($course); ?>";
    const currentChapter = "<?php echo addslashes($current_chapter); ?>";
    const pdfUrl = "<?php echo addslashes($pdf_path); ?>";
    const pdfExists = <?php echo $pdf_exists ? 'true' : 'false'; ?>;
    const hasChapters = <?php echo !empty($chapters) ? 'true' : 'false'; ?>;

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
        url.searchParams.delete('chapter');
        window.location.href = url.toString();
    }

    function changeChapter(chapterName) {
        const url = new URL(window.location);
        url.searchParams.set('chapter', chapterName);
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
        loading.textContent = `Loading ${currentChapter}...`;

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
    window.changeChapter = changeChapter;

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.js';

    document.addEventListener('DOMContentLoaded', function() {
        if (hasChapters && pdfExists) {
            loadPdf(pdfUrl);
        } else if (!hasChapters) {
            showError('No PDF files found in the course folder.');
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
