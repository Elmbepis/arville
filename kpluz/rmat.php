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

// Get parameters from URL
$shs_pathway = isset($_GET['shs_pathway']) ? urldecode($_GET['shs_pathway']) : '';
$subject = isset($_GET['subject']) ? urldecode($_GET['subject']) : '';
$pdf_id = isset($_GET['pdf_id']) ? (int)$_GET['pdf_id'] : 0;

// Load PDFs from RMATS JSON file
$json_file = 'rmats.json';
$all_pdfs = [];
$pdf_name = '';
$description = '';
$file_path = '';
$pdf_exists = false;

if (file_exists($json_file)) {
    $json_content = file_get_contents($json_file);
    $data = json_decode($json_content, true);
    
    if ($data && isset($data['pdfs'])) {
        $all_pdfs = $data['pdfs'];
        
        // Find the specific PDF by ID
        if ($pdf_id > 0) {
            foreach ($all_pdfs as $pdf) {
                if ($pdf['id'] == $pdf_id) {
                    $pdf_name = $pdf['lesson'];
                    $description = $pdf['description'];
                    $file_path = $pdf['file_path'];
                    
                    // Check if PDF file exists
                    $full_pdf_path = __DIR__ . '/' . $file_path;
                    $pdf_exists = file_exists($full_pdf_path);
                    break;
                }
            }
        }
    }
}

// Get unique pathways and subjects from JSON for navigation
$pathway_options = [];
$unique_pathways = [];

foreach ($all_pdfs as $pdf) {
    $pathway = $pdf['shs_pathway'];
    $subject_name = $pdf['subject'];
    
    // Store unique combinations
    $combo_key = $pathway . '|' . $subject_name;
    if (!isset($pathway_options[$combo_key])) {
        $pathway_options[$combo_key] = [
            'shs_pathway' => $pathway,
            'subject' => $subject_name
        ];
    }
    
    // Track unique pathways for dropdown
    if (!in_array($pathway, $unique_pathways)) {
        $unique_pathways[] = $pathway;
    }
}

// Get PDFs for current pathway/subject
$pdfs = [];
if (!empty($shs_pathway) && !empty($subject)) {
    foreach ($all_pdfs as $pdf) {
        if ($pdf['shs_pathway'] == $shs_pathway && $pdf['subject'] == $subject) {
            $pdfs[$pdf['id']] = $pdf['lesson'];
        }
    }
}

// Display name for current selection
$display_name = (!empty($shs_pathway) && !empty($subject)) ? $shs_pathway . ' - ' . $subject : 'DepEd Reading Material';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - DepEd Reading Material Viewer</title>
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

    /* Action Buttons */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    
    .back-rmats-btn {
        padding: 12px 24px;
        border: none;
        background: #4A90E2;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .back-rmats-btn:hover { 
        background: #357ABD; 
        color: white;
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
    <img src="images/kpluz_logo.png" alt="KPluz Logo" class="header-logo">
  </div>

  <h2><?php echo htmlspecialchars($display_name); ?></h2>
  <div class="course-info">
    Subject: <?php echo htmlspecialchars($subject); ?><br>
    <?php if (!empty($pdf_name)): ?>
        Material: <?php echo htmlspecialchars($pdf_name); ?>
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
          <?php foreach ($unique_pathways as $path): ?>
              <option value="<?php echo htmlspecialchars($path); ?>" 
                      <?php echo $path === $shs_pathway ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($path); ?>
              </option>
          <?php endforeach; ?>
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
      <label for="pdf-select">Select Material: </label>
      <select id="pdf-select" onchange="changePDF(this.value)" <?php echo empty($pdfs) ? 'disabled' : ''; ?>>
          <option value="">Select Material</option>
          <?php foreach ($pdfs as $id => $name): ?>
              <option value="<?php echo $id; ?>" 
                      <?php echo $id === $pdf_id ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($name); ?>
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
  <div id="loading">Loading reading material...</div>
  <div id="error" class="error" style="display: <?php echo $pdf_exists ? 'none' : 'block'; ?>;">
      <?php if (empty($file_path)): ?>
          No reading material associated with this document.
      <?php elseif (!$pdf_exists): ?>
          Reading material not found: <strong><?php echo htmlspecialchars($file_path); ?></strong>
      <?php endif; ?>
  </div>

  <!-- Action Buttons -->
  <div class="action-buttons">
      <a href="rmats.php" class="back-rmats-btn">&#128196; Back to Reading Materials</a>
      <a href="dashboard.php" class="dashboard-btn">&#127968; Back to Dashboard</a>
      <a href="logout.php" class="logout-btn">&#128682; Logout</a>
  </div>

  <script src="pdf.js"></script>
  <script>
    // PHP variables passed to JavaScript
    const currentPathway = "<?php echo addslashes($shs_pathway); ?>";
    const currentSubject = "<?php echo addslashes($subject); ?>";
    const currentPdfId = <?php echo $pdf_id; ?>;
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
        url.searchParams.delete('pdf_id');
        window.location.href = url.toString();
    }

    function changePDF(pdfId) {
        if (!pdfId) return;
        const url = new URL(window.location);
        url.searchParams.set('pdf_id', pdfId);
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
        loading.textContent = "Loading reading material...";

        pdfjsLib.getDocument(url).promise.then(pdf => {
            pdfDoc = pdf;
            document.getElementById('page-count').textContent = pdf.numPages;
            loading.style.display = "none";
            renderPage(currentPage);
        }).catch(err => {
            console.error('Error loading PDF:', err);
            showError('Error loading reading material: ' + err.message + '<br>File: <strong>' + url + '</strong>');
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
    window.changePDF = changePDF;

    // Initialize PDF.js worker
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.js';

    // Load PDF when page loads
    document.addEventListener('DOMContentLoaded', function() {
        if (pdfExists && pdfUrl) {
            loadPdf(pdfUrl);
        } else if (!pdfExists && currentPdfId > 0) {
            showError('Reading material not found: <strong>' + pdfUrl + '</strong>');
        } else if (currentPdfId === 0) {
            showError('Please select a reading material to view.');
        }
    });

    // Cancel rendering on page unload
    window.addEventListener('beforeunload', function() {
        cancelRendering();
    });
  </script>
</body>
</html>