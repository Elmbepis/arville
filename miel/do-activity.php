<?php
// view-activity.php
session_name('MIEL_SESSION');
session_start();

// Error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Redirect to login if not logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
    header('Location: login.php');
    exit();
}

// Check if activity_id is provided
if (!isset($_GET['activity_id']) || !is_numeric($_GET['activity_id'])) {
    header('Location: student-dashboard.php');
    exit();
}

$activity_id = intval($_GET['activity_id']);
$student_id = $_SESSION['user_id'];

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get student profile
    $studentStmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $studentStmt->execute([$student_id]);
    $student = $studentStmt->fetch(PDO::FETCH_ASSOC);
    
    // Get activity details
    $activityStmt = $pdo->prepare("
        SELECT a.*, u.full_name as teacher_name 
        FROM activities a 
        JOIN users u ON a.teacher_id = u.id 
        WHERE a.id = ?
    ");
    $activityStmt->execute([$activity_id]);
    $activity = $activityStmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$activity) {
        // Activity not found
        header('Location: student-dashboard.php');
        exit();
    }
    
    // Check if activity has been graded
    $gradeCheck = $pdo->prepare("
        SELECT * FROM activity_grades 
        WHERE activity_id = ? AND student_id = ?
    ");
    $gradeCheck->execute([$activity_id, $student_id]);
    $grade = $gradeCheck->fetch(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Handle multiple file uploads AND website links
if (isset($_POST['submit_activity'])) {
    try {
        // Use absolute path for better reliability on online servers
        $uploadDir = __DIR__ . '/activities/';
        
        // Create activities directory with proper permissions if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true); // 0755 for better security
            chmod($uploadDir, 0755); // Ensure correct permissions are set
        }
        
        // Verify directory is writable
        if (!is_writable($uploadDir)) {
            throw new Exception("Upload directory is not writable. Please check permissions.");
        }
        
        $uploadedFiles = [];
        $websiteLinks = [];
        $errors = [];
        
        // Define file type categories
        $imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
        $textTypes = ['txt', 'doc', 'docx', 'pdf', 'rtf'];
        $allowedTypes = array_merge($imageTypes, $textTypes);
        
        // Process all uploaded files
        if (isset($_FILES['submission_files']) && !empty($_FILES['submission_files']['name'][0])) {
            $files = $_FILES['submission_files'];
            $fileCount = count($files['name']);
            
            // Count files by type for naming
            $textFileCount = 0;
            $imageFileCount = 0;
            
            // First pass: validate all files
            for ($i = 0; $i < $fileCount; $i++) {
                if ($files['error'][$i] === UPLOAD_ERR_OK) {
                    $fileName = $files['name'][$i];
                    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    
                    // Check file type
                    if (!in_array($fileType, $allowedTypes)) {
                        $errors[] = "File type not allowed: $fileName";
                        continue;
                    }
                    
                    // Count by category for naming
                    if (in_array($fileType, $textTypes)) {
                        $textFileCount++;
                    } else {
                        $imageFileCount++;
                    }
                } elseif ($files['error'][$i] !== UPLOAD_ERR_NO_FILE) {
                    // Handle upload errors
                    $uploadErrors = [
                        UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize',
                        UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive',
                        UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
                        UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
                        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                        UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
                    ];
                    $errorCode = $files['error'][$i];
                    $errorMessage = isset($uploadErrors[$errorCode]) ? $uploadErrors[$errorCode] : 'Unknown upload error';
                    $errors[] = "Upload error for {$files['name'][$i]}: $errorMessage";
                }
            }
            
            // Second pass: upload files with proper naming and permission setting
            if (empty($errors)) {
                $textCounter = 1;
                $imageCounter = 1;
                
                for ($i = 0; $i < $fileCount; $i++) {
                    if ($files['error'][$i] === UPLOAD_ERR_OK) {
                        $originalName = $files['name'][$i];
                        $fileTmpName = $files['tmp_name'][$i];
                        $fileSize = $files['size'][$i];
                        $fileExtension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                        
                        // Check file size (1 MB limit)
                        if ($fileSize > 1 * 1024 * 1024) {
                            $errors[] = "File too large (max 1 MB): $originalName";
                            continue;
                        }
                        
                        // Determine file category and generate our filename
                        if (in_array($fileExtension, $textTypes)) {
                            $fileCategory = 'document';
                            $ourFileName = $activity_id . '_' . $student_id . '_text' . $textCounter . '.' . $fileExtension;
                            $textCounter++;
                        } else {
                            $fileCategory = 'image';
                            $ourFileName = $activity_id . '_' . $student_id . '_image' . $imageCounter . '.' . $fileExtension;
                            $imageCounter++;
                        }
                        
                        $uploadPath = $uploadDir . $ourFileName;
                        
                        // Move uploaded file
                        if (move_uploaded_file($fileTmpName, $uploadPath)) {
                            // Set proper file permissions (readable by web server, writable only by owner)
                            chmod($uploadPath, 0644);
                            
                            $uploadedFiles[] = [
                                'type' => $fileCategory,
                                'original_name' => $originalName,
                                'our_name' => $ourFileName,
                                'path' => 'activities/' . $ourFileName, // Store relative path for database
                                'size' => $fileSize,
                                'uploaded' => date('Y-m-d H:i:s')
                            ];
                        } else {
                            $errors[] = "Failed to move uploaded file: $originalName";
                        }
                    }
                }
            }
        }
        
        // Process website links for audio/video streaming
        if (isset($_POST['website_links']) && is_array($_POST['website_links'])) {
            $linkCounter = 1;
            foreach ($_POST['website_links'] as $link) {
                $link = trim($link);
                if (!empty($link)) {
                    // Validate URL format
                    if (filter_var($link, FILTER_VALIDATE_URL)) {
                        // Check if it's a supported streaming service
                        $websiteLinks[] = [
                            'url' => $link,
                            'type' => getWebsiteType($link),
                            'added' => date('Y-m-d H:i:s')
                        ];
                        $linkCounter++;
                    } else {
                        $errors[] = "Invalid URL format: $link";
                    }
                }
            }
            
            // Limit number of links
            if (count($websiteLinks) > 5) {
                $errors[] = "Maximum 5 website links allowed.";
                $websiteLinks = array_slice($websiteLinks, 0, 5);
            }
        }
        
        // If we have uploaded files OR website links, save to database
        if (!empty($uploadedFiles) || !empty($websiteLinks)) {
            $submissionData = [
                'files' => $uploadedFiles,
                'website_links' => $websiteLinks,
                'submitted_at' => date('Y-m-d H:i:s'),
                'text_count' => $textFileCount ?? 0,
                'image_count' => $imageFileCount ?? 0,
                'link_count' => count($websiteLinks),
                'total_items' => count($uploadedFiles) + count($websiteLinks)
            ];
            
            $jsonData = json_encode($submissionData, JSON_UNESCAPED_SLASHES);
            
            // Check if grade record exists
            if ($grade) {
                // Update existing grade record
                $updateStmt = $pdo->prepare("
                    UPDATE activity_grades 
                    SET submission_data = ?
                    WHERE activity_id = ? AND student_id = ?
                ");
                $updateStmt->execute([$jsonData, $activity_id, $student_id]);
                $success = "Submission updated successfully!";
            } else {
                // Insert new grade record
                $insertStmt = $pdo->prepare("
                    INSERT INTO activity_grades 
                    (activity_id, student_id, submission_data) 
                    VALUES (?, ?, ?)
                ");
                $insertStmt->execute([$activity_id, $student_id, $jsonData]);
                $success = "Submission saved successfully!";
            }
            
            // Refresh grade data
            $gradeCheck->execute([$activity_id, $student_id]);
            $grade = $gradeCheck->fetch(PDO::FETCH_ASSOC);
            
        } elseif (!empty($errors)) {
            $error = implode('<br>', $errors);
        } else {
            $error = "No files or streaming links were submitted.";
        }
        
    } catch(Exception $e) {
        $error = "Error processing submission: " . $e->getMessage();
        error_log("Upload error: " . $e->getMessage());
    }
}

// Helper function to determine website type
function getWebsiteType($url) {
    $url = strtolower($url);
    
    if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo.com') !== false) {
        return 'vimeo';
    } elseif (strpos($url, 'soundcloud.com') !== false) {
        return 'soundcloud';
    } elseif (strpos($url, 'spotify.com') !== false) {
        return 'spotify';
    } elseif (strpos($url, 'drive.google.com') !== false) {
        return 'google_drive';
    } elseif (strpos($url, 'dropbox.com') !== false) {
        return 'dropbox';
    } else {
        return 'other';
    }
}

// Helper function to get website icon
function getWebsiteIcon($type) {
    $icons = [
        'youtube' => 'fab fa-youtube',
        'vimeo' => 'fab fa-vimeo',
        'soundcloud' => 'fab fa-soundcloud',
        'spotify' => 'fab fa-spotify',
        'google_drive' => 'fab fa-google-drive',
        'dropbox' => 'fab fa-dropbox',
        'other' => 'fas fa-link'
    ];
    return $icons[$type] ?? 'fas fa-link';
}

// Format date
function formatDate($date) {
    return date('M j, Y g:i A', strtotime($date));
}

// Format file size
function formatFileSize($bytes) {
    if ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}

// Get file icon based on type
function getFileIcon($fileType, $fileExtension) {
    if ($fileType === 'image') {
        return 'file-image';
    }
    
    $icons = [
        'txt' => 'file-alt',
        'doc' => 'file-word',
        'docx' => 'file-word',
        'pdf' => 'file-pdf',
        'rtf' => 'file-alt'
    ];
    return $icons[$fileExtension] ?? 'file-alt';
}

// Get intelligence type name
function getIntelligenceName($type) {
    $names = [
        'linguistic' => 'Linguistic',
        'logical' => 'Logical',
        'spatial' => 'Spatial',
        'kinesthetic' => 'Kinesthetic',
        'musical' => 'Musical',
        'interpersonal' => 'Interpersonal',
        'intrapersonal' => 'Intrapersonal',
        'naturalist' => 'Naturalist'
    ];
    return $names[$type] ?? $type;
}

// Get intelligence icon
function getIntelligenceIcon($type) {
    $icons = [
        'linguistic' => 'book',
        'logical' => 'calculator',
        'spatial' => 'palette',
        'kinesthetic' => 'running',
        'musical' => 'music',
        'interpersonal' => 'users',
        'intrapersonal' => 'user',
        'naturalist' => 'leaf'
    ];
    return $icons[$type] ?? 'question-circle';
}

// Get world name
function getWorldName($world) {
    $names = [
        'zoo' => 'Zoo',
        'museum' => 'Museum',
        'forest' => 'Forest',
        'ocean' => 'Ocean',
        'farm' => 'Farm',
        'space' => 'Space',
        'city' => 'City',
        'arctic' => 'Arctic'
    ];
    return $names[$world] ?? $world;
}

// Get world icon
function getWorldIcon($world) {
    $icons = [
        'zoo' => 'paw',
        'museum' => 'landmark',
        'forest' => 'tree',
        'ocean' => 'water',
        'farm' => 'tractor',
        'space' => 'rocket',
        'city' => 'city',
        'arctic' => 'icicles'
    ];
    return $icons[$world] ?? 'globe';
}

// Get activity type name
function getActivityTypeName($type) {
    $names = [
        'essay' => 'Essay',
        'project' => 'Project',
        'presentation' => 'Presentation',
        'experiment' => 'Experiment',
        'performance' => 'Performance',
        'portfolio' => 'Portfolio'
    ];
    return $names[$type] ?? ucfirst($type);
}

// Get activity type icon
function getActivityTypeIcon($type) {
    $icons = [
        'essay' => 'file-alt',
        'project' => 'tasks',
        'presentation' => 'presentation',
        'experiment' => 'flask',
        'performance' => 'theater-masks',
        'portfolio' => 'briefcase'
    ];
    return $icons[$type] ?? 'file-alt';
}

// Get file extension from filename
function getFileExtension($filename) {
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Activity | MIEL - Multiple Intelligence E-Learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="mobile.css" media="screen">
    <style>
        /* ===== KID-FRIENDLY THEME (EXACTLY SAME AS student-dashboard.php) ===== */
        :root {
            --primary-blue: #4A90E2;
            --secondary-green: #50C878;
            --accent-yellow: #FFD166;
            --background-light: #F8F9FF;
            --text-dark: #2C3E50;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
            --border-radius: 20px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            color: var(--text-dark);
            padding: 0px;
            min-height: 100vh;
            position: relative;
            /* Fallback gradient background */
            background: linear-gradient(135deg, #E3F2FD 0%, #F3E5F5 100%);
        }
        
        /* Tiled semi-opaque image background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('background-tile.jpg');
            background-repeat: repeat;
            background-size: 1980px 1080px;
            opacity: 0.9; /* Full opacity for the image */
            z-index: -1; /* Lower z-index than the overlay */
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(248, 249, 255, 0.3); /* Reduced from 0.85 to 0.3 */
            z-index: -3; /* Higher z-index than the image */
        }
        
        .container {
            max-width: 800px; /* SAME WIDTH AS create-quiz.php */
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .navbar {
            margin-bottom: 30px;
        }
        
        .navbar {
            font-family: 'Arial', sans-serif !important;
            font-weight: 300 !important;
        }

        .navbar-nav .nav-link {
            font-size: 1.0rem !important;
            color: #333 !important;
            transition: color 0.3s ease !important;
        }

        .navbar-nav .nav-link:hover {
            color: #4A90E2 !important;
        }
		
		.navbar .container {
		    width: 100%;
    		max-width: 100%;
   		    padding-left: 300px;
  		    padding-right: 300px;
    		display: flex;
    		justify-content: space-between;
    		align-items: center;
		}

		.navbar .navbar-collapse {
		    flex-grow: 0; /* Prevents it from taking up extra space */
		}        
		
        .bottom-buttons-container {
            margin-bottom: 30px !important; /* Adjust this value as needed */
        }

        /* ===== MIEL BANNER ===== */
        .miel-banner-container {
            text-align: center;
            margin-bottom: 30px;
            padding: 0;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* ===== DASHBOARD HEADER ===== */
        .dashboard-header {
            text-align: center;
            margin-bottom: 15px;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .logo-icon {
            font-size: 2.5rem;
            color: var(--primary-blue);
        }
        
        h1 {
            color: var(--primary-blue);
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: var(--secondary-green);
            font-size: 1.2rem;
            margin-bottom: 0px;
        }
        
        .welcome-message {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-top: 10px;
        }
        
        /* ===== HORIZONTAL SECTIONS ===== */
        .horizontal-sections {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        /* ===== CARD STYLES ===== */
        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
        }
        
        .card-title {
            color: var(--primary-blue);
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #F0F0F0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        /* ===== ACTIVITY INFO CARD ===== */
        .activity-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .info-item {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 3px solid #E0E0E0;
            transition: all 0.3s;
        }
        
        .info-item:hover {
            transform: translateY(-3px);
            border-color: var(--primary-blue);
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary-blue);
        }
        
        .info-details {
            flex: 1;
        }
        
        .info-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 3px;
        }
        
        .info-value {
            font-weight: bold;
            color: var(--text-dark);
            font-size: 1rem;
        }
        
        /* ===== ACTIVITY DESCRIPTION ===== */
        .activity-description {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 3px solid #E0E0E0;
        }
        
        .description-title {
            color: var(--primary-blue);
            font-size: 1.2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .description-content {
            color: var(--text-dark);
            line-height: 1.6;
            font-size: 1rem;
        }
        
        /* ===== INSTRUCTIONS SECTION ===== */
        .instructions-section {
            background: #FFF9E6;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 3px solid #FFE082;
        }
        
        .instructions-title {
            color: #FF9800;
            font-size: 1.2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .instructions-content {
            color: var(--text-dark);
            line-height: 1.6;
            font-size: 1rem;
        }
        
        /* ===== SUBMISSION STATUS ===== */
        .submission-status {
            background: #E8F5E9;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 3px solid #A5D6A7;
        }
        
        .status-title {
            color: #2E7D32;
            font-size: 1.2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .status-content {
            color: var(--text-dark);
            line-height: 1.6;
            font-size: 1rem;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-left: 10px;
        }
        
        .badge-success {
            background: var(--secondary-green);
            color: white;
        }
        
        .badge-warning {
            background: #FF9800;
            color: white;
        }
        
        .badge-info {
            background: var(--primary-blue);
            color: white;
        }
        
        /* ===== GRADE SECTION ===== */
        .grade-section {
            background: #E3F2FD;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 3px solid #90CAF9;
        }
        
        .grade-title {
            color: var(--primary-blue);
            font-size: 1.2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .grade-score {
            font-size: 2rem;
            font-weight: bold;
            color: var(--secondary-green);
            text-align: center;
            margin: 15px 0;
        }
        
        .grade-details {
            color: var(--text-dark);
            line-height: 1.6;
            font-size: 1rem;
        }
        
        /* ===== SUBMISSION FILE INFO ===== */
        .submission-file-info {
            background: #F3E5F5;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 3px solid #CE93D8;
        }
        
        .file-info-title {
            color: #9C27B0;
            font-size: 1.2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .file-details {
            display: flex;
            align-items: center;
            gap: 15px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            border: 2px solid #E0E0E0;
            margin-bottom: 10px;
        }
        
        .file-icon {
            font-size: 2.5rem;
            color: var(--primary-blue);
        }
        
        .file-meta {
            flex: 1;
        }
        
        .file-name {
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 5px;
        }
        
        .file-original-name {
            color: #666;
            font-size: 0.85rem;
            font-style: italic;
            margin-bottom: 3px;
        }
        
        .file-size {
            color: #666;
            font-size: 0.9rem;
        }
        
        .file-date {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* ===== WEBSITE LINKS DISPLAY ===== */
        .website-links-display {
            background: #E3F2FD;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 3px solid #90CAF9;
        }
        
        .link-details {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            border: 2px solid #90CAF9;
        }
        
        /* ===== UPLOAD FORM ===== */
        .upload-form {
            background: #F8F9FF;
            border-radius: 15px;
            padding: 20px;
            border: 3px solid #E0E0E0;
        }
        
        .form-title {
            color: var(--primary-blue);
            font-size: 1.2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .file-input-container {
            position: relative;
            margin-bottom: 10px;
        }
        
        .file-input {
            width: 100%;
            padding: 15px;
            border: 3px dashed #E0E0E0;
            border-radius: 15px;
            background: white;
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial Rounded MT Bold', sans-serif;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-input:hover {
            border-color: var(--primary-blue);
            background: #F8F9FF;
        }
        
        .file-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }
        
        .form-note {
            font-size: 0.9rem;
            color: #666;
            margin-top: 10px;
            font-style: italic;
        }
        
        .allowed-types {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .type-badge {
            padding: 5px 10px;
            background: var(--accent-yellow);
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: bold;
            color: var(--text-dark);
        }
        
        /* ===== WEBSITE LINKS SECTION ===== */
        .website-links-section {
            margin-top: 25px;
            padding: 20px;
            background: #E3F2FD;
            border-radius: 15px;
            border: 3px solid #90CAF9;
        }
        
        .website-link-input {
            margin-bottom: 10px;
        }
        
        .service-badge {
            color: white;
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 0.8rem;
        }
        
        /* ===== FILE MANAGEMENT BUTTONS ===== */
        .file-management-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        
        .file-action-btn {
            padding: 10px 15px !important;
            border-radius: 10px !important;
            font-size: 0.9rem !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 5px !important;
        }
        
        /* ===== MESSAGE ALERTS ===== */
        .alert {
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            border: 3px solid transparent;
        }
        
        .alert-success {
            background-color: #E8F5E9;
            border-color: #A5D6A7;
            color: #2E7D32;
        }
        
        .alert-danger {
            background-color: #FFEBEE;
            border-color: #EF9A9A;
            color: #C62828;
        }
        
        /* ===== STANDARDIZED BUTTON STYLES ===== */
        /* Blue functional buttons -> Yellow on hover */
        .action-btn {
            flex: 0 0 auto;
            padding: 12px 25px;
            border: none;
            border-radius: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 1.2rem;
            text-decoration: none;
            color: white;
            background-color: #4A90E2 !important; /* BLUE for functional buttons */
        }
        
        .action-btn:hover {
            background-color: #FFD166 !important; /* YELLOW on hover */
            transform: translateY(-3px);
            color: #2C3E50 !important;
        }
        
        /* Green button for "Back to Dashboard" */
        .green-btn {
            background-color: #50C878 !important;
            color: white !important;
            border: none !important;
            padding: 15px 30px !important;
            border-radius: 15px !important;
            font-size: 1.2rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            text-decoration: none !important;
        }
        
        .green-btn:hover {
            background-color: #3DAF5E !important;
            transform: translateY(-3px) !important;
        }
        
        /* Red button for logout */
        .red-btn {
            background-color: #FF6B6B !important;
            color: white !important;
            border: none !important;
            padding: 15px 30px !important;
            border-radius: 15px !important;
            font-size: 1.2rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            text-decoration: none !important;
        }
        
        .red-btn:hover {
            background-color: #FF4757 !important;
            transform: translateY(-3px) !important;
        }
        
        /* Blue button for "Upload File" */
        .blue-btn {
            background-color: #4A90E2 !important;
            color: white !important;
            border: none !important;
            padding: 15px 30px !important;
            border-radius: 15px !important;
            font-size: 1.2rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            text-decoration: none !important;
        }
        
        .blue-btn:hover {
            background-color: #357ABD !important;
            transform: translateY(-3px) !important;
        }
        
        /* Yellow button for actions */
        .yellow-btn {
            background-color: #FFD166 !important;
            color: #2C3E50 !important;
            border: none !important;
            padding: 8px 16px !important;
            border-radius: 10px !important;
            font-size: 0.9rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 5px !important;
            text-decoration: none !important;
        }
        
        .yellow-btn:hover {
            background-color: #FFC233 !important;
            transform: translateY(-2px) !important;
        }
        
        /* Red button for remove actions */
        .remove-btn {
            background-color: #FF6B6B !important;
            color: white !important;
            border: none !important;
            padding: 8px 16px !important;
            border-radius: 10px !important;
            font-size: 0.9rem !important;
            font-weight: bold !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 5px !important;
            text-decoration: none !important;
        }
        
        .remove-btn:hover {
            background-color: #FF4757 !important;
            transform: translateY(-2px) !important;
        }
        
        /* ===== BOTTOM BUTTONS CONTAINER ===== */
        .bottom-buttons-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
        }
        
        /* ===== FILE SELECTION PREVIEW ===== */
        .file-preview {
            margin-top: 15px;
            padding: 10px;
            background: #F8F9FF;
            border-radius: 10px;
            border: 2px dashed #E0E0E0;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .file-preview-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px;
            border-bottom: 1px solid #E0E0E0;
        }
        
        .file-preview-item:last-child {
            border-bottom: none;
        }
        
        .file-preview-name {
            flex: 1;
            font-size: 0.9rem;
        }
        
        .file-preview-size {
            font-size: 0.8rem;
            color: #666;
            margin-left: 10px;
        }
        
        .file-remove-btn {
            background: none;
            border: none;
            color: #FF6B6B;
            cursor: pointer;
            padding: 2px 8px;
            font-size: 0.9rem;
        }
        
        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .miel-banner-container {
                padding: 10px;
                margin-bottom: 20px;
            }
            
            .card {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .activity-info-grid {
                grid-template-columns: 1fr;
            }
            
            .file-details {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .link-details {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .file-management-buttons {
                flex-direction: column;
            }
            
            /* Bottom buttons on mobile */
            .bottom-buttons-container {
                flex-direction: column;
                gap: 10px;
                padding: 20px;
            }
            
            .bottom-buttons-container button,
            .bottom-buttons-container a {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .bounce {
            animation: bounce 0.5s ease infinite;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes rainbow {
            0% { color: #4A90E2; }
            25% { color: #50C878; }
            50% { color: #FFD166; }
            75% { color: #FF6B6B; }
            100% { color: #9C27B0; }
        }
        
        .rainbow {
            animation: rainbow 3s ease infinite;
        }
    </style>
</head>
<body>
    <!-- ARVILLE NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/logo.jpg" alt="ARville Network" width="200" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="miel-about.php">About Miel</a></li>
                    <li class="nav-item"><a class="nav-link" href="miel-join.php">Join Miel</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MIEL BANNER IMAGE -->
    <div class="miel-banner-container fade-in">
        <img src="miel-banner.png" alt="MIEL - Multiple Intelligence Experiential Learning System" class="miel-banner">
    </div>

    <div class="container">
        <!-- DASHBOARD HEADER -->
        <header class="dashboard-header fade-in">
            <div class="logo">
 
                <div>
<img src="images/do-activity.jpg" alt="Create Quiz for Arville Metaverse" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                    <p class="subtitle">View Details or Submit Files and Links for this Activity:<br/><span style="color: #3628C3; font-weight: bold; font-size: 1.1em;"><?php echo htmlspecialchars($activity['title']); ?></span></p>
                </div>
            </div>
        </header>

        <!-- MESSAGE ALERTS -->
        <?php if (isset($success)): ?>
            <div class="alert alert-success fade-in">
                <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger fade-in">
                <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- HORIZONTAL SECTIONS -->
        <div class="horizontal-sections">
            <!-- ACTIVITY INFO CARD -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-info-circle"></i> Activity Information
                </h2>
                
                <div class="activity-info-grid">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-heading"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Activity Title</div>
                            <div class="info-value"><?php echo htmlspecialchars($activity['title']); ?></div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Teacher</div>
                            <div class="info-value"><?php echo htmlspecialchars($activity['teacher_name']); ?></div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-<?php echo getActivityTypeIcon($activity['activity_type']); ?>"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Activity Type</div>
                            <div class="info-value"><?php echo getActivityTypeName($activity['activity_type']); ?></div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-<?php echo getIntelligenceIcon($activity['intelligence_type']); ?>"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Intelligence Type</div>
                            <div class="info-value"><?php echo getIntelligenceName($activity['intelligence_type']); ?></div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-<?php echo getWorldIcon($activity['virtual_world']); ?>"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Virtual World</div>
                            <div class="info-value"><?php echo getWorldName($activity['virtual_world']); ?></div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Maximum Points</div>
                            <div class="info-value"><?php echo htmlspecialchars($activity['max_points']); ?> points</div>
                        </div>
                    </div>
                    
                    <?php if ($activity['due_date']): ?>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Due Date</div>
                            <div class="info-value"><?php echo formatDate($activity['due_date']); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <div class="info-details">
                            <div class="info-label">Created On</div>
                            <div class="info-value"><?php echo formatDate($activity['created_at']); ?></div>
                        </div>
                    </div>
                </div>
                
                <!-- ACTIVITY DESCRIPTION -->
                <?php if ($activity['description']): ?>
                <div class="activity-description">
                    <div class="description-title">
                        <i class="fas fa-align-left"></i> Description
                    </div>
                    <div class="description-content">
                        <?php echo nl2br(htmlspecialchars($activity['description'])); ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- INSTRUCTIONS -->
                <?php if ($activity['instructions']): ?>
                <div class="instructions-section">
                    <div class="instructions-title">
                        <i class="fas fa-list-check"></i> Instructions
                    </div>
                    <div class="instructions-content">
                        <?php echo nl2br(htmlspecialchars($activity['instructions'])); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- SUBMISSION CARD -->
            <div class="card fade-in">
                <h2 class="card-title">
                    <i class="fas fa-paper-plane"></i> Your Submission
                </h2>
                
                <!-- SUBMISSION STATUS -->
                <div class="submission-status">
                    <div class="status-title">
                        <i class="fas fa-clipboard-check"></i> Submission Status
                        <?php if ($grade && !empty($grade['submission_data'])): 
                            $submissionData = json_decode($grade['submission_data'], true);
                            if ($submissionData && (isset($submissionData['files']) || isset($submissionData['website_links']))): 
                                $totalItems = $submissionData['total_items'] ?? 0;
                                ?>
                                <span class="status-badge badge-success">Submitted (<?php echo $totalItems; ?> items)</span>
                            <?php else: ?>
                                <span class="status-badge badge-warning">Not Submitted</span>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="status-badge badge-warning">Not Submitted</span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($grade && !empty($grade['submission_data'])): 
                        $submissionData = json_decode($grade['submission_data'], true);
                        if ($submissionData && (isset($submissionData['files']) || isset($submissionData['website_links']))): ?>
                            <div class="status-content">
                                <p><strong>Submitted On:</strong> <?php echo formatDate($submissionData['submitted_at']); ?></p>
                                <?php if (isset($submissionData['files']) && !empty($submissionData['files'])): ?>
                                    <p><strong>Files Uploaded:</strong> 
                                        <?php echo $submissionData['text_count'] + $submissionData['image_count']; ?> file(s) 
                                        (<?php echo $submissionData['text_count']; ?> text, <?php echo $submissionData['image_count']; ?> images)
                                    </p>
                                    
                                    <!-- FILES INFO -->
                                    <div class="submission-file-info">
                                        <div class="file-info-title">
                                            <i class="fas fa-folder-open"></i> Uploaded Files
                                        </div>
                                        
                                        <div style="max-height: 300px; overflow-y: auto;">
                                            <?php foreach ($submissionData['files'] as $index => $file): 
                                                $fileExtension = getFileExtension($file['our_name']);
                                            ?>
                                            <div class="file-details">
                                                <div class="file-icon">
                                                    <i class="fas fa-<?php echo getFileIcon($file['type'], $fileExtension); ?>"></i>
                                                </div>
                                                <div class="file-meta">
                                                    <div class="file-name"><?php echo htmlspecialchars($file['our_name']); ?></div>
                                                    <div class="file-original-name">Original: <?php echo htmlspecialchars($file['original_name']); ?></div>
                                                    <div class="file-size">Size: <?php echo formatFileSize($file['size']); ?> • Type: <?php echo ucfirst($file['type']); ?></div>
                                                    <div class="file-date">Uploaded: <?php echo formatDate($file['uploaded']); ?></div>
                                                </div>
                                                <?php if (file_exists($file['path'])): ?>
                                                <a href="<?php echo htmlspecialchars($file['path']); ?>" target="_blank" class="yellow-btn">
                                                    <i class="fas fa-<?php echo ($file['type'] === 'image') ? 'eye' : 'download'; ?>"></i> 
                                                    <?php echo ($file['type'] === 'image') ? 'View' : 'Download'; ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (isset($submissionData['website_links']) && !empty($submissionData['website_links'])): ?>
                                    <!-- WEBSITE LINKS DISPLAY -->
                                    <div class="website-links-display">
                                        <div class="file-info-title" style="color: #1976D2;">
                                            <i class="fas fa-video"></i> Streaming Links (<?php echo count($submissionData['website_links']); ?>)
                                        </div>
                                        
                                        <div style="margin-top: 15px;">
                                            <?php foreach ($submissionData['website_links'] as $index => $link): ?>
                                            <div class="link-details">
                                                <div style="display: flex; align-items: center; gap: 15px;">
                                                    <div style="font-size: 2rem; color: #1976D2;">
                                                        <i class="<?php echo getWebsiteIcon($link['type']); ?>"></i>
                                                    </div>
                                                    <div style="flex: 1;">
                                                        <div style="font-weight: bold; color: #333; margin-bottom: 5px;">
                                                            <?php echo ucfirst(str_replace('_', ' ', $link['type'])); ?> Link
                                                        </div>
                                                        <div style="color: #666; font-size: 0.9rem; word-break: break-all; margin-bottom: 5px;">
                                                            <?php echo htmlspecialchars($link['url']); ?>
                                                        </div>
                                                        <div style="color: #888; font-size: 0.85rem;">
                                                            Added: <?php echo formatDate($link['added']); ?>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo htmlspecialchars($link['url']); ?>" target="_blank" class="yellow-btn">
                                                        <i class="fas fa-external-link-alt"></i> Open
                                                    </a>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <p class="form-note">Submitting new files/links will replace all current submissions.</p>
                            </div>
                        <?php else: ?>
                            <div class="status-content">
                                <p>No valid submission data found.</p>
                                <p>Please upload your files or provide streaming links using the form below.</p>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="status-content">
                            <p>You haven't submitted this activity yet.</p>
                            <p>Please upload your file(s) or provide streaming links using the form below.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- GRADE SECTION -->
                <?php if ($grade && !empty($grade['points_earned'])): ?>
                <div class="grade-section">
                    <div class="grade-title">
                        <i class="fas fa-star"></i> Your Grade
                        <span class="status-badge badge-info">Graded</span>
                    </div>
                    
                    <div class="grade-score">
                        <?php echo $grade['points_earned']; ?> points
                    </div>
                    
                    <div class="grade-details">
                        <?php if (!empty($grade['feedback'])): ?>
                            <p><strong>Teacher Feedback:</strong></p>
                            <div style="background: white; padding: 15px; border-radius: 10px; margin-top: 10px; border: 2px solid #90CAF9;">
                                <?php echo nl2br(htmlspecialchars($grade['feedback'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php elseif ($grade && !empty($grade['submission_data'])): ?>
                <div class="grade-section">
                    <div class="grade-title">
                        <i class="fas fa-hourglass-half"></i> Grade Status
                        <span class="status-badge badge-warning">Pending</span>
                    </div>
                    
                    <div class="grade-details">
                        <p>Your submission has been received and is awaiting grading by your teacher.</p>
                        <p>Check back later to see your grade and feedback.</p>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- UPLOAD FORM -->
                <div class="upload-form">
                    <form method="POST" action="" enctype="multipart/form-data" id="uploadForm">
                        <div class="form-title">
                            <i class="fas fa-upload"></i> 
                            <?php if ($grade && !empty($grade['submission_data'])): ?>
                                Replace Current Submission
                            <?php else: ?>
                                Submit Your Work
                            <?php endif; ?>
                        </div>
                        
                        <!-- FILE UPLOAD SECTION -->
                        <div style="margin-bottom: 25px;">
                            <label style="font-weight: bold; color: #4A90E2; margin-bottom: 10px; display: block;">
                                <i class="fas fa-file-upload"></i> Upload Files
                            </label>
                            
                            <div class="file-input-container">
                                <input type="file" class="file-input" name="submission_files[]" id="submission_files" 
                                       multiple accept=".txt,.doc,.docx,.pdf,.jpg,.jpeg,.png,.gif,.bmp,.rtf">
                            </div>
                            
                            <!-- FILE MANAGEMENT BUTTONS -->
                            <div class="file-management-buttons">
                                <button type="button" id="addMoreFiles" class="yellow-btn file-action-btn">
                                    <i class="fas fa-plus"></i> Add More Files
                                </button>
                                <button type="button" id="clearFiles" class="remove-btn file-action-btn">
                                    <i class="fas fa-times"></i> Clear All Files
                                </button>
                            </div>
                            
                            <div id="filePreview" class="file-preview"></div>
                            
                            <div class="allowed-types">
                                <span class="type-badge">.txt</span>
                                <span class="type-badge">.doc/.docx</span>
                                <span class="type-badge">.pdf</span>
                                <span class="type-badge">.jpg/.jpeg</span>
                                <span class="type-badge">.png</span>
                                <span class="type-badge">.gif/.bmp</span>
                                <span class="type-badge">.rtf</span>
                            </div>
                            
                            <div class="form-note">
                                <strong>Tip:</strong> Use "Add More Files" to accumulate files one by one.<br>
                                Maximum file size: 10MB each. Maximum 10 files total.<br>
                                Files will be automatically renamed to follow our naming convention.
                            </div>
                        </div>
                        
                        <!-- WEBSITE LINKS SECTION (for Audio/Video Streaming) -->
                        <div class="website-links-section">
                            <div class="form-title" style="color: #1976D2;">
                                <i class="fas fa-video"></i> Audio/Video Streaming Links (Optional)
                            </div>
                            
                            <p style="color: #555; margin-bottom: 15px; font-size: 0.95rem;">
                                <i class="fas fa-info-circle"></i> 
                                <strong>For audio/video submissions:</strong> Upload to YouTube, Vimeo, SoundCloud, etc. and paste the link here.
                                This saves bandwidth and allows streaming playback.
                            </p>
                            
                            <div id="websiteLinksContainer">
                                <div class="website-link-input">
                                    <div style="display: flex; gap: 10px; align-items: center;">
                                        <input type="url" name="website_links[]" 
                                               placeholder="https://youtube.com/watch?v=..." 
                                               pattern="https?://.+\..+"
                                               title="Enter a valid URL (https://...)"
                                               style="flex: 1; padding: 12px; border-radius: 10px; border: 2px solid #90CAF9;"
                                               class="website-link-input-field">
                                        <button type="button" class="remove-link-btn remove-btn" style="padding: 8px 12px; display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" id="addWebsiteLink" class="yellow-btn" style="margin-top: 10px;">
                                <i class="fas fa-plus"></i> Add Another Streaming Link
                            </button>
                            
                            <div class="form-note" style="margin-top: 15px;">
                                <strong>Supported services:</strong> YouTube, Vimeo, SoundCloud, Spotify, Google Drive, Dropbox<br>
                                <strong>Note:</strong> Maximum 5 links. Ensure your video/audio is publicly accessible or shared properly.
                            </div>
                            
                            <div class="supported-services" style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 15px;">
                                <span class="service-badge" style="background: #FF0000;">
                                    <i class="fab fa-youtube"></i> YouTube
                                </span>
                                <span class="service-badge" style="background: #1AB7EA;">
                                    <i class="fab fa-vimeo"></i> Vimeo
                                </span>
                                <span class="service-badge" style="background: #FF3300;">
                                    <i class="fab fa-soundcloud"></i> SoundCloud
                                </span>
                                <span class="service-badge" style="background: #1DB954;">
                                    <i class="fab fa-spotify"></i> Spotify
                                </span>
                            </div>
                        </div>
                        
                        <button type="submit" name="submit_activity" class="blue-btn" style="margin-top: 25px;">
                            <i class="fas fa-cloud-upload-alt"></i> 
                            <?php if ($grade && !empty($grade['submission_data'])): ?>
                                Replace Submission
                            <?php else: ?>
                                Submit All Work
                            <?php endif; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- BOTTOM BUTTONS CONTAINER -->
        <div class="bottom-buttons-container fade-in">
            <a href="student-dashboard.php" class="green-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
            
            <form method="POST" action="student-dashboard.php" style="display: inline;">
                <button type="submit" name="logout" class="red-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // Enhanced file accumulation functionality
        const fileInput = document.getElementById('submission_files');
        const filePreview = document.getElementById('filePreview');
        const addMoreFilesBtn = document.getElementById('addMoreFiles');
        const clearFilesBtn = document.getElementById('clearFiles');
        
        let accumulatedFiles = [];
        
        if (fileInput && filePreview && addMoreFilesBtn && clearFilesBtn) {
            // Initialize with any existing files in the input
            accumulatedFiles = Array.from(fileInput.files);
            updateFilePreview();
            
            // Handle "Add More Files" button
            addMoreFilesBtn.addEventListener('click', function() {
                // Create a temporary file input
                const tempInput = document.createElement('input');
                tempInput.type = 'file';
                tempInput.multiple = true;
                tempInput.accept = '.txt,.doc,.docx,.pdf,.jpg,.jpeg,.png,.gif,.bmp,.rtf';
                
                tempInput.addEventListener('change', function(e) {
                    const newFiles = Array.from(e.target.files);
                    
                    // Add new files to accumulated list
                    newFiles.forEach(file => {
                        // Check for duplicates (by name and size)
                        const isDuplicate = accumulatedFiles.some(f => 
                            f.name === file.name && 
                            f.size === file.size && 
                            f.lastModified === file.lastModified
                        );
                        
                        if (!isDuplicate) {
                            accumulatedFiles.push(file);
                        }
                    });
                    
                    // Update the main file input
                    updateFileInput();
                    updateFilePreview();
                });
                
                tempInput.click();
            });
            
            // Handle "Clear All Files" button
            clearFilesBtn.addEventListener('click', function() {
                accumulatedFiles = [];
                updateFileInput();
                updateFilePreview();
            });
            
            // Handle direct file input changes (when user selects files directly)
            fileInput.addEventListener('change', function() {
                accumulatedFiles = Array.from(this.files);
                updateFilePreview();
            });
            
            // Update the file input with accumulated files
            function updateFileInput() {
                const dataTransfer = new DataTransfer();
                
                // Add all accumulated files to DataTransfer
                accumulatedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });
                
                // Update the file input
                fileInput.files = dataTransfer.files;
            }
            
            // Update the file preview display
            function updateFilePreview() {
                filePreview.innerHTML = '';
                
                if (accumulatedFiles.length > 0) {
                    // Show file count
                    const countHeader = document.createElement('div');
                    countHeader.style.fontWeight = 'bold';
                    countHeader.style.marginBottom = '10px';
                    countHeader.style.color = '#4A90E2';
                    countHeader.innerHTML = `<i class="fas fa-folder"></i> Selected Files (${accumulatedFiles.length}):`;
                    filePreview.appendChild(countHeader);
                    
                    // Show each file with remove button
                    accumulatedFiles.forEach((file, index) => {
                        const fileItem = document.createElement('div');
                        fileItem.className = 'file-preview-item';
                        
                        const fileName = document.createElement('div');
                        fileName.className = 'file-preview-name';
                        fileName.textContent = file.name;
                        
                        const fileSize = document.createElement('div');
                        fileSize.className = 'file-preview-size';
                        fileSize.textContent = formatFileSize(file.size);
                        
                        const removeBtn = document.createElement('button');
                        removeBtn.className = 'file-remove-btn';
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.title = 'Remove this file';
                        removeBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            // Remove file from accumulated list
                            accumulatedFiles.splice(index, 1);
                            updateFileInput();
                            updateFilePreview();
                        });
                        
                        fileItem.appendChild(fileName);
                        fileItem.appendChild(fileSize);
                        fileItem.appendChild(removeBtn);
                        filePreview.appendChild(fileItem);
                    });
                    
                    // Show warning if too many files
                    if (accumulatedFiles.length > 10) {
                        const warning = document.createElement('div');
                        warning.style.color = '#FF6B6B';
                        warning.style.fontWeight = 'bold';
                        warning.style.marginTop = '10px';
                        warning.style.padding = '8px';
                        warning.style.backgroundColor = '#FFEBEE';
                        warning.style.borderRadius = '5px';
                        warning.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Maximum 10 files allowed!';
                        filePreview.appendChild(warning);
                    }
                } else {
                    filePreview.innerHTML = '<div style="color: #666; text-align: center; padding: 20px;">No files selected</div>';
                }
            }
            
            // Initial preview update
            updateFilePreview();
        }
        
        // Website links management
        const addWebsiteLinkBtn = document.getElementById('addWebsiteLink');
        const websiteLinksContainer = document.getElementById('websiteLinksContainer');
        
        if (addWebsiteLinkBtn && websiteLinksContainer) {
            addWebsiteLinkBtn.addEventListener('click', function() {
                const linkCount = websiteLinksContainer.querySelectorAll('.website-link-input').length;
                if (linkCount >= 5) {
                    alert('Maximum 5 website links allowed.');
                    return;
                }
                
                const newLinkInput = document.createElement('div');
                newLinkInput.className = 'website-link-input';
                newLinkInput.style.marginBottom = '10px';
                newLinkInput.innerHTML = `
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <input type="url" name="website_links[]" 
                               placeholder="https://youtube.com/watch?v=..." 
                               pattern="https?://.+\..+"
                               title="Enter a valid URL (https://...)"
                               style="flex: 1; padding: 12px; border-radius: 10px; border: 2px solid #90CAF9;"
                               class="website-link-input-field">
                        <button type="button" class="remove-link-btn remove-btn" style="padding: 8px 12px;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                
                websiteLinksContainer.appendChild(newLinkInput);
                
                // Update remove buttons visibility
                updateRemoveButtons();
            });
            
            // Function to update remove buttons visibility
            function updateRemoveButtons() {
                const inputs = websiteLinksContainer.querySelectorAll('.website-link-input');
                const removeButtons = websiteLinksContainer.querySelectorAll('.remove-link-btn');
                
                if (inputs.length > 1) {
                    removeButtons.forEach(btn => btn.style.display = 'inline-flex');
                } else {
                    removeButtons.forEach(btn => btn.style.display = 'none');
                }
            }
            
            // Remove link functionality
            websiteLinksContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-link-btn')) {
                    const linkInput = e.target.closest('.website-link-input');
                    if (websiteLinksContainer.querySelectorAll('.website-link-input').length > 1) {
                        linkInput.remove();
                        updateRemoveButtons();
                    }
                }
            });
            
            // Initial update
            updateRemoveButtons();
        }
        
        // Format file size for display
        function formatFileSize(bytes) {
            if (bytes >= 1048576) {
                return (bytes / 1048576).toFixed(2) + ' MB';
            } else if (bytes >= 1024) {
                return (bytes / 1024).toFixed(2) + ' KB';
            } else {
                return bytes + ' bytes';
            }
        }
        
        // Form validation
        const uploadForm = document.getElementById('uploadForm');
        if (uploadForm) {
            uploadForm.addEventListener('submit', function(e) {
                // Check file limits
                if (accumulatedFiles.length > 10) {
                    e.preventDefault();
                    alert('Maximum 10 files allowed. Please remove some files.');
                    return false;
                }
                
                // Check individual file sizes
                for (let i = 0; i < accumulatedFiles.length; i++) {
                    if (accumulatedFiles[i].size > 10 * 1024 * 1024) {
                        e.preventDefault();
                        alert(`File "${accumulatedFiles[i].name}" is too large. Maximum size is 10MB.`);
                        return false;
                    }
                }
                
                // Check at least one submission method is used
                const websiteLinks = document.querySelectorAll('input[name="website_links[]"]');
                
                let hasFiles = accumulatedFiles.length > 0;
                let hasLinks = false;
                
                websiteLinks.forEach(input => {
                    if (input.value.trim() !== '') {
                        hasLinks = true;
                    }
                });
                
                if (!hasFiles && !hasLinks) {
                    e.preventDefault();
                    alert('Please upload files or provide streaming links.');
                    return false;
                }
            });
        }
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 's') {
                e.preventDefault();
                document.querySelector('button[name="submit_activity"]').click();
            }
            
            if (e.key === 'Escape') {
                window.location.href = 'student-dashboard.php';
            }
        });
        
        // Add hover effects to info items
        document.querySelectorAll('.info-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Make MIEL banner image interactive
        const mielBanner = document.querySelector('.miel-banner');
        if (mielBanner) {
            mielBanner.addEventListener('click', function() {
                this.classList.toggle('bounce');
                alert('MIEL - Multiple Intelligence Experiential Learning\nUse "Add More Files" to accumulate files one by one before submitting!');
                
                // Remove bounce class after animation completes
                setTimeout(() => {
                    this.classList.remove('bounce');
                }, 500);
            });
        }
        
        // Auto-refresh page every 60 seconds to check for updates
        setInterval(() => {
            console.log('Auto-refreshing activity page...');
            window.location.reload();
        }, 60000);
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>