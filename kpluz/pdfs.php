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

// Database connection for user only
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

// REMOVED: Restrict access to admin and teacher only
// Students can now access this page
// if ($user_role !== 'admin' && $user_role !== 'teacher') {
//     header("Location: dashboard.php?error=access_denied");
//     exit();
// }

$conn->close();

// ==============================================
// LOAD PDFS FROM JSON FILE
// ==============================================
$json_file = 'pdfs.json';
$all_pdfs = [];
$total_pdfs = 0;

if (file_exists($json_file)) {
    $json_content = file_get_contents($json_file);
    $data = json_decode($json_content, true);
    
    if ($data && isset($data['pdfs'])) {
        $all_pdfs = $data['pdfs'];
        $total_pdfs = count($all_pdfs);
    }
}

// Group by shs_pathway and subject for display
$pdf_groups = [];
foreach ($all_pdfs as $pdf) {
    $key = $pdf['shs_pathway'] . '|' . $pdf['subject'];
    if (!isset($pdf_groups[$key])) {
        $pdf_groups[$key] = [
            'shs_pathway' => $pdf['shs_pathway'],
            'subject' => $pdf['subject'],
            'name' => $pdf['shs_pathway'] . ' - ' . $pdf['subject'],
            'pdfs' => []
        ];
    }
    $pdf_groups[$key]['pdfs'][] = [
        'id' => $pdf['id'],
        'pdf_name' => $pdf['lesson'],
        'description' => $pdf['description'],
        'file_path' => $pdf['file_path']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - DepEd PDFs</title>
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
    
    .section-title {
        color: #003366;
        border-bottom: 2px solid #003366;
        padding-bottom: 10px;
        margin-bottom: 30px;
        font-size: 1.5em;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .pdf-count {
        background: #28a745;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: normal;
    }
    
    /* PDF Section */
    .pdfs-section {
        margin-bottom: 50px;
    }
    
    .course-pdfs {
        margin-bottom: 40px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #003366;
    }
    
    .course-title {
        font-size: 1.3em;
        color: #003366;
        margin-bottom: 20px;
        font-weight: bold;
    }
    
    /* 4-Column Grid */
    .pdfs-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 15px;
    }
    
    .pdf-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .pdf-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .pdf-icon {
        font-size: 3em;
        margin-bottom: 15px;
        color: #dc3545;
    }
    
    .pdf-name {
        font-size: 1em;
        color: #003366;
        margin-bottom: 10px;
        font-weight: bold;
        word-break: break-word;
    }
    
    .pdf-description {
        color: #666;
        font-size: 0.85em;
        margin-bottom: 15px;
        line-height: 1.4;
    }
    
    .view-pdf-btn {
        display: inline-block;
        padding: 8px 20px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 0.85em;
        transition: background 0.3s;
    }
    
    .view-pdf-btn:hover {
        background: #218838;
        color: white;
    }
    
    .no-results {
        text-align: center;
        color: #666;
        font-style: italic;
        padding: 40px;
        background: #f8f9fa;
        border-radius: 8px;
    }
    
    /* Action Buttons */
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

    /* Responsive design for smaller screens */
    @media (max-width: 1200px) {
        .pdfs-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .pdfs-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 600px) {
        .pdfs-grid {
            grid-template-columns: 1fr;
        }
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <!-- Header with tiled background and logo -->
    <div class="header">
        <img src="images/kpluz_logo.png" alt="KPluz Logo" class="header-logo">
    </div>

    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            KPluz SHS - DepEd PDFs
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <!-- STUDENT, ADMIN, TEACHER PDF VIEW PAGE -->
        <div class="pdfs-section">
            <h2 class="section-title">
                DepEd PDFs
                <span class="pdf-count">Total: <?= $total_pdfs ?> PDF(s)</span>
            </h2>
            
            <?php if (!empty($pdf_groups)): ?>
                <?php foreach ($pdf_groups as $group): ?>
                    <div class="course-pdfs">
                        <div class="course-title">
                            <?= htmlspecialchars($group['name']) ?>
                        </div>
                        <div class="pdfs-grid">
                            <?php foreach ($group['pdfs'] as $pdf): ?>
                                <div class="pdf-card">
                                    <div class="pdf-icon">&#128214;</div>
                                    <div class="pdf-name"><?= htmlspecialchars($pdf['pdf_name']) ?></div>
                                    <?php if (!empty($pdf['description'])): ?>
                                        <div class="pdf-description"><?= htmlspecialchars($pdf['description']) ?></div>
                                    <?php endif; ?>
                                    <a href="pdf.php?shs_pathway=<?= urlencode($group['shs_pathway']) ?>&subject=<?= urlencode($group['subject']) ?>&pdf_id=<?= $pdf['id'] ?>" class="view-pdf-btn">View PDF</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-results">
                    <p>No DepEd PDFs available at the moment.</p>
                    <p>Please check back later for learning materials.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>