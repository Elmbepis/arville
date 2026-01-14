<?php
// create-activity.php
session_start();

// Check if user is logged in and is a teacher
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'teacher') {
    header('Location: login.php');
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'miel';
$username = 'root';
$password = 'AcadeV25!';

// Initialize variables
$statusMessage = '';
$statusType = '';
$savedActivityId = null;
$formSubmitted = false;
$isEditMode = false;
$editActivityId = null;
$activityData = null;

// Get the actual teacher ID from session
$teacher_id = $_SESSION['user_id'];

// Check if we're in edit mode
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $isEditMode = true;
    $editActivityId = intval($_GET['edit']);
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Get activity details - teacher can only edit their own activities
        $activityStmt = $pdo->prepare("
            SELECT a.* 
            FROM activities a 
            WHERE a.id = ? AND a.teacher_id = ?
        ");
        $activityStmt->execute([$editActivityId, $teacher_id]);
        $activityData = $activityStmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$activityData) {
            // Activity not found or teacher doesn't own it
            $statusMessage = "Activity not found or you don't have permission to edit it.";
            $statusType = 'error';
            $isEditMode = false;
        }
        
    } catch(Exception $e) {
        $statusMessage = 'Failed to load activity: ' . $e->getMessage();
        $statusType = 'error';
        $isEditMode = false;
    }
}

// Check if form was just submitted for creation
if (isset($_SESSION['activity_created']) && !$isEditMode) {
    $formSubmitted = true;
    $savedActivityId = $_SESSION['activity_created'];
    $statusMessage = "Activity created successfully! Activity ID: $savedActivityId";
    $statusType = 'success';
}

// Check if form was just submitted for editing
if (isset($_SESSION['activity_updated']) && $isEditMode) {
    $formSubmitted = true;
    $savedActivityId = $editActivityId;
    $statusMessage = "Activity updated successfully!";
    $statusType = 'success';
}

// Handle AJAX title check (for creation mode only)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $input = json_decode(file_get_contents('php://input'), true);
        $title = $input['title'] ?? '';
        $excludeId = $input['exclude_id'] ?? null; // For edit mode, exclude current activity
        
        if ($excludeId) {
            $sql = "SELECT COUNT(*) as count FROM activities WHERE title = :title AND id != :exclude_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':title' => $title, ':exclude_id' => $excludeId]);
        } else {
            $sql = "SELECT COUNT(*) as count FROM activities WHERE title = :title";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':title' => $title]);
        }
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode(['exists' => $result['count'] > 0]);
        exit;
        
    } catch(Exception $e) {
        echo json_encode(['exists' => false, 'error' => $e->getMessage()]);
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$formSubmitted) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $title = $_POST['activity_title'];
        $activity_type = $_POST['activity_type'] ?? 'essay';
        $instructions = $_POST['activity_instructions'] ?? '';
        $max_points = intval($_POST['max_points']) > 0 ? intval($_POST['max_points']) : 100;
        $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : null;
        
        if ($isEditMode && $editActivityId) {
            // EDIT MODE: Update existing activity
            
            // Check for duplicate title (excluding current activity)
            $checkSql = "SELECT COUNT(*) as count FROM activities WHERE title = :title AND id != :activity_id";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->execute([':title' => $title, ':activity_id' => $editActivityId]);
            $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result['count'] > 0) {
                $statusMessage = "Error: Another activity with this title already exists. Please choose a different title.";
                $statusType = 'error';
            } else {
                // Update existing activity (removed updated_at field)
                $activitySql = "UPDATE activities 
                              SET title = :title, 
                                  description = :description, 
                                  intelligence_type = :intelligence_type, 
                                  virtual_world = :virtual_world,
                                  activity_type = :activity_type, 
                                  instructions = :instructions, 
                                  max_points = :max_points, 
                                  due_date = :due_date
                              WHERE id = :activity_id AND teacher_id = :teacher_id";
                
                $activityStmt = $pdo->prepare($activitySql);
                $activityStmt->execute([
                    ':title' => $title,
                    ':description' => $_POST['activity_description'],
                    ':intelligence_type' => $_POST['intelligence_type'],
                    ':virtual_world' => $_POST['virtual_world'],
                    ':activity_type' => $activity_type,
                    ':instructions' => $instructions,
                    ':max_points' => $max_points,
                    ':due_date' => $due_date,
                    ':activity_id' => $editActivityId,
                    ':teacher_id' => $teacher_id
                ]);
                
                $savedActivityId = $editActivityId;
                
                // Prevent duplicate submission on refresh
                $_SESSION['activity_updated'] = true;
                
                // Redirect to prevent form resubmission
                header("Location: create-activity.php?edit=$editActivityId&updated=1");
                exit();
            }
            
        } else {
            // CREATE MODE: Insert new activity
            
            // Check for duplicate title
            $checkSql = "SELECT COUNT(*) as count FROM activities WHERE title = :title";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->execute([':title' => $title]);
            $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result['count'] > 0) {
                $statusMessage = "Error: An activity with this title already exists. Please choose a different title.";
                $statusType = 'error';
            } else {
                // Insert new activity
                $activitySql = "INSERT INTO activities (teacher_id, title, description, intelligence_type, virtual_world, 
                              activity_type, instructions, max_points, due_date, created_at) 
                              VALUES (:teacher_id, :title, :description, :intelligence_type, :virtual_world, 
                                      :activity_type, :instructions, :max_points, :due_date, NOW())";
                
                $activityStmt = $pdo->prepare($activitySql);
                $activityStmt->execute([
                    ':teacher_id' => $teacher_id,
                    ':title' => $title,
                    ':description' => $_POST['activity_description'],
                    ':intelligence_type' => $_POST['intelligence_type'],
                    ':virtual_world' => $_POST['virtual_world'],
                    ':activity_type' => $activity_type,
                    ':instructions' => $instructions,
                    ':max_points' => $max_points,
                    ':due_date' => $due_date
                ]);
                
                $savedActivityId = $pdo->lastInsertId();
                
                // Prevent duplicate submission on refresh
                $_SESSION['activity_created'] = $savedActivityId;
                
                // Redirect to prevent form resubmission
                header("Location: create-activity.php?created=$savedActivityId");
                exit();
            }
        }
        
    } catch(Exception $e) {
        $statusMessage = 'Failed to ' . ($isEditMode ? 'update' : 'create') . ' activity: ' . $e->getMessage();
        $statusType = 'error';
    }
}

// Check if redirected after successful creation or update
if (isset($_GET['created'])) {
    $savedActivityId = $_GET['created'];
    $statusMessage = "Activity created successfully! Activity ID: $savedActivityId";
    $statusType = 'success';
    $formSubmitted = true;
}

if (isset($_GET['updated'])) {
    $savedActivityId = $editActivityId;
    $statusMessage = "Activity updated successfully!";
    $statusType = 'success';
    $formSubmitted = true;
}

// Clear session on page load (except when redirected after success)
if (!isset($_GET['created']) && !isset($_GET['updated'])) {
    unset($_SESSION['activity_created']);
    unset($_SESSION['activity_updated']);
}

// Function to safely get POST or activity data
function getFormValue($fieldName) {
    global $activityData, $isEditMode, $formSubmitted;
    
    if (!$formSubmitted && isset($_POST[$fieldName])) {
        return htmlspecialchars($_POST[$fieldName]);
    }
    
    if ($isEditMode && $activityData && isset($activityData[$fieldName])) {
        return htmlspecialchars($activityData[$fieldName]);
    }
    
    return '';
}

// Get form values for population
$activity_title = getFormValue('title');
$activity_description = getFormValue('description');
$activity_instructions = getFormValue('instructions');
$max_points_val = $activityData ? $activityData['max_points'] : (isset($_POST['max_points']) ? $_POST['max_points'] : 100);
$due_date_val = $activityData ? ($activityData['due_date'] ? date('Y-m-d', strtotime($activityData['due_date'])) : '') : (isset($_POST['due_date']) ? $_POST['due_date'] : '');
$selected_intelligence = $activityData ? $activityData['intelligence_type'] : (isset($_POST['intelligence_type']) ? $_POST['intelligence_type'] : 'linguistic');
$selected_world = $activityData ? $activityData['virtual_world'] : (isset($_POST['virtual_world']) ? $_POST['virtual_world'] : 'zoo');
$selected_activity_type = $activityData ? $activityData['activity_type'] : (isset($_POST['activity_type']) ? $_POST['activity_type'] : 'essay');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEditMode ? 'Edit' : 'Create'; ?> Activity | MIEL - Multiple Intelligence E-Learning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== KID-FRIENDLY THEME (SAME AS teacher-dashboard.php) ===== */
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
            opacity: 0.9;
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(248, 249, 255, 0.3);
            z-index: -3;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            padding-bottom: 50px;
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
    	margin-bottom: -70px !important;
		}

		.navbar-nav .nav-link:hover {
	    color: #4A90E2 !important;
		}
		
		.navbar-brand {
    	margin-bottom: -50px !important;
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
		
        /* ===== MIEL BANNER ===== */
        .miel-banner-container {
            text-align: center;
            margin-bottom: 30px;
            padding: 0;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .miel-banner {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .miel-header {
            text-align: center;
            margin-bottom: 30px;
            padding: 25px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 5px solid var(--primary-blue);
            position: relative;
            overflow: hidden;
        }
        
        .miel-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, 
                #4A90E2 0%,
                #50C878 25%,
                #FFD166 50%,
                #FF6B6B 75%,
                #9C27B0 100%
            );
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 10px;
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
            margin-bottom: -5px;
        }
        
        /* ===== MAIN CARD ===== */
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }
        
        /* ===== FORM ELEMENTS ===== */
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: var(--primary-blue);
        }
        
        .input-with-icon {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            color: var(--primary-blue);
            font-size: 1.2rem;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 1.1rem;
            font-family: inherit;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        /* ===== INTELLIGENCE TYPE SELECTOR ===== */
        .intelligence-selector {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
            margin-top: 10px;
        }
        
        .intelligence-option {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 120px;
        }
        
        .intelligence-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }
        
        .intelligence-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .intelligence-icon-small {
            font-size: 2rem;
            margin-bottom: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(74, 144, 226, 0.1);
        }
        
        .intelligence-info {
            text-align: center;
        }
        
        .intelligence-info h4 {
            font-size: 1rem;
            margin-bottom: 3px;
            color: var(--text-dark);
        }
        
        .intelligence-info p {
            font-size: 0.8rem;
            color: #666;
        }
        
        /* Intelligence-specific colors */
        .linguistic-icon { color: #4CAF50; background: rgba(76, 175, 80, 0.1); }
        .logical-icon { color: #2196F3; background: rgba(33, 150, 243, 0.1); }
        .spatial-icon { color: #9C27B0; background: rgba(156, 39, 176, 0.1); }
        .kinesthetic-icon { color: #FF9800; background: rgba(255, 152, 0, 0.1); }
        .musical-icon { color: #F44336; background: rgba(244, 67, 54, 0.1); }
        .interpersonal-icon { color: #00BCD4; background: rgba(0, 188, 212, 0.1); }
        .intrapersonal-icon { color: #795548; background: rgba(121, 85, 72, 0.1); }
        .naturalist-icon { color: #8BC34A; background: rgba(139, 195, 74, 0.1); }
        
        /* ===== VIRTUAL WORLD SELECTOR ===== */
        .world-selector {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
            margin-top: 10px;
        }
        
        .world-option {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }
        
        .world-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }
        
        .world-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .world-thumbnail {
            width: 100%;
            height: 120px;
            margin-bottom: 10px;
            border-radius: 10px;
            overflow: hidden;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Placeholder styling */
        .thumbnail-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 0.9rem;
        }
        
        .thumbnail-placeholder i {
            font-size: 2.5rem;
            margin-bottom: 5px;
        }
        
        .world-info {
            text-align: center;
            margin-top: 5px;
        }
        
        .world-info h3 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--text-dark);
        }
        
        .world-info p {
            font-size: 0.9rem;
            color: #666;
        }
        
        /* ===== ACTIVITY TYPE SELECTOR ===== */
        .activity-type-selector {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 10px;
        }
        
        .activity-type-option {
            background: #F8F9FF;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            padding: 20px 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 140px;
        }
        
        .activity-type-option:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }
        
        .activity-type-option.selected {
            border-color: var(--secondary-green);
            background: #E8F5E9;
        }
        
        .activity-type-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(74, 144, 226, 0.1);
            color: var(--primary-blue);
        }
        
        .activity-type-info {
            text-align: center;
        }
        
        .activity-type-info h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--text-dark);
        }
        
        .activity-type-info p {
            font-size: 0.85rem;
            color: #666;
        }
        
        /* Activity type colors */
        .essay-icon { color: #4A90E2; background: rgba(74, 144, 226, 0.1); }
        .drawing-icon { color: #9C27B0; background: rgba(156, 39, 176, 0.1); }
        .presentation-icon { color: #50C878; background: rgba(80, 200, 120, 0.1); }
        .project-icon { color: #FF9800; background: rgba(255, 152, 0, 0.1); }
        .experiment-icon { color: #F44336; background: rgba(244, 67, 54, 0.1); }
        .performance-icon { color: #9C27B0; background: rgba(156, 39, 176, 0.1); }
        .portfolio-icon { color: #795548; background: rgba(121, 85, 72, 0.1); }
        
        /* ===== POINTS AND DATE INPUTS ===== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        /* ===== BUTTONS ===== */
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .btn-primary {
            background: var(--primary-blue);
            color: white;
        }
        
        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-3px);
        }
        
        .btn-success {
            background: var(--secondary-green);
            color: white;
        }
        
        .btn-success:hover {
            background: #3DAF5E;
        }
        
        .btn-secondary {
            background: var(--accent-yellow);
            color: var(--text-dark);
        }
        
        .btn-secondary:hover {
            background: #E6B800;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        /* Orange button for grading */
        .orange-btn {
            background-color: #FF9800 !important;
            color: white !important;
        }
        
        .orange-btn:hover {
            background-color: #F57C00 !important;
            transform: translateY(-3px);
        }
        
        /* Standard button styles */
        .btn-success, .btn-secondary, .btn-primary {
            background-color: #4A90E2 !important;
            color: white !important;
        }
        
        .btn-success:hover, .btn-secondary:hover, .btn-primary:hover {
            background-color: #FFD166 !important;
            transform: translateY(-3px);
            color: #2C3E50 !important;
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
        
        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .miel-banner-container {
                padding: 10px;
                margin-bottom: 20px;
            }
            
            .main-card {
                padding: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .intelligence-selector,
            .world-selector,
            .activity-type-selector {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
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
        
        @media (max-width: 480px) {
            .intelligence-selector,
            .world-selector,
            .activity-type-selector {
                grid-template-columns: 1fr;
            }
            
            .intelligence-selector {
                grid-template-rows: repeat(8, 1fr);
            }
            
            .world-selector {
                grid-template-rows: repeat(8, 1fr);
            }
            
            .activity-type-selector {
                grid-template-rows: repeat(3, 1fr);
            }
            
            .input-with-icon input {
                padding-left: 45px;
                font-size: 1rem;
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
        
        /* ===== STATUS MESSAGES ===== */
        .status-message {
            padding: 15px;
            border-radius: 15px;
            margin: 20px 0;
        }
        
        .status-success {
            background: #D4EDDA;
            color: #155724;
            border-left: 5px solid var(--secondary-green);
        }
        
        .status-error {
            background: #F8D7DA;
            color: #721C24;
            border-left: 5px solid #FF6B6B;
        }
        
        .activity-id-display {
            background: #E3F2FD;
            padding: 15px;
            border-radius: 15px;
            margin: 20px 0;
            text-align: center;
            font-size: 1.1rem;
        }
        
        .activity-id-display strong {
            color: var(--primary-blue);
            font-size: 1.3rem;
        }
        
        .form-disabled {
            opacity: 0.6;
            pointer-events: none;
        }
        
        .error-message {
            color: #FF6B6B;
            margin-top: 5px;
            font-size: 0.9rem;
            display: none;
        }
        
        .edit-mode-banner {
            background: linear-gradient(135deg, #FF9800, #FFB74D);
            color: white;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 20px;
            text-align: center;
            border: 3px solid #F57C00;
        }
        
        .edit-mode-banner h3 {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="plans.php">Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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
                <i class="fas fa-tasks logo-icon bounce"></i>
                <div>
                    <h1><?php echo $isEditMode ? 'Edit Activity' : 'Create Activity for Arville Metaverse'; ?></h1>
                    <p class="subtitle"><?php echo $isEditMode ? 'Update your activity details' : 'Design creative activities for your students!'; ?></p>
                </div>
            </div>
        </header>

        <!-- MAIN CARD -->
        <div class="main-card">
            <!-- STATUS MESSAGE -->
            <?php if ($statusMessage): ?>
            <div class="status-message status-<?php echo $statusType; ?>">
                <?php echo htmlspecialchars($statusMessage); ?>
            </div>
            <?php endif; ?>
            
            <?php if ($savedActivityId && $formSubmitted): ?>
            <div class="activity-id-display">
                <p>Your activity has been <?php echo $isEditMode ? 'updated' : 'created'; ?> <?php if (!$isEditMode): ?>with ID: <strong><?php echo $savedActivityId; ?></strong><?php endif; ?></p>
                <div class="button-group" style="margin-top: 15px;">
                    <?php if ($isEditMode): ?>
                    <a href="create-activity.php?edit=<?php echo $savedActivityId; ?>" class="btn btn-success">
                        <i class="fas fa-edit"></i> Continue Editing
                    </a>
                    <?php else: ?>
                    <a href="create-activity.php" class="btn btn-success">
                        <i class="fas fa-plus"></i> Create Another Activity
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="create-activity.php<?php echo $isEditMode ? "?edit=$editActivityId" : ''; ?>" id="activityForm" class="<?php echo $formSubmitted ? 'form-disabled' : ''; ?>">
                <!-- ACTIVITY INFO SECTION -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-heading"></i> Activity Title
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-pencil-alt input-icon"></i>
                        <input type="text" name="activity_title" id="activityTitle" placeholder="Enter activity title (e.g., 'Creative Essay Writing')" maxlength="200" required
                               value="<?php echo $activity_title; ?>">
                    </div>
                    <div id="titleError" class="error-message"></div>
                </div>

                <!-- ACTIVITY TYPE SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-clipboard-check"></i> Activity Type
                    </label>
                    <div class="activity-type-selector">
                        <?php
                        $activityTypes = [
                            'essay' => ['icon' => 'file-alt', 'name' => 'Essay Writing', 'desc' => 'Written assignments'],
                            'drawing' => ['icon' => 'paint-brush', 'name' => 'Drawing', 'desc' => 'Artistic creations'],
                            'presentation' => ['icon' => 'presentation', 'name' => 'Presentation', 'desc' => 'Slides or video'],
                            'project' => ['icon' => 'tasks', 'name' => 'Project', 'desc' => 'Long-term projects'],
                            'experiment' => ['icon' => 'flask', 'name' => 'Experiment', 'desc' => 'Scientific experiments'],
                            'performance' => ['icon' => 'theater-masks', 'name' => 'Performance', 'desc' => 'Live performances'],
                            'portfolio' => ['icon' => 'briefcase', 'name' => 'Portfolio', 'desc' => 'Collection of work']
                        ];
                        
                        foreach ($activityTypes as $key => $type):
                            $isSelected = $selected_activity_type === $key;
                        ?>
                        <div class="activity-type-option <?php echo $isSelected ? 'selected' : ''; ?>" 
                             data-activity-type="<?php echo $key; ?>">
                            <div class="activity-type-icon <?php echo $key; ?>-icon">
                                <i class="fas fa-<?php echo $type['icon']; ?>"></i>
                            </div>
                            <div class="activity-type-info">
                                <h4><?php echo $type['name']; ?></h4>
                                <p><?php echo $type['desc']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="activity_type" id="activityType" value="<?php echo $selected_activity_type; ?>">
                </div>

                <!-- INTELLIGENCE TYPE SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-brain"></i> Intelligence Type
                    </label>
                    <div class="intelligence-selector">
                        <?php
                        $intelligenceTypes = [
                            'linguistic' => ['icon' => 'book', 'name' => 'Linguistic', 'desc' => 'Word Smart'],
                            'logical' => ['icon' => 'calculator', 'name' => 'Logical', 'desc' => 'Number Smart'],
                            'spatial' => ['icon' => 'palette', 'name' => 'Spatial', 'desc' => 'Picture Smart'],
                            'kinesthetic' => ['icon' => 'running', 'name' => 'Kinesthetic', 'desc' => 'Body Smart'],
                            'musical' => ['icon' => 'music', 'name' => 'Musical', 'desc' => 'Music Smart'],
                            'interpersonal' => ['icon' => 'users', 'name' => 'Interpersonal', 'desc' => 'People Smart'],
                            'intrapersonal' => ['icon' => 'user', 'name' => 'Intrapersonal', 'desc' => 'Self Smart'],
                            'naturalist' => ['icon' => 'leaf', 'name' => 'Naturalist', 'desc' => 'Nature Smart']
                        ];
                        
                        foreach ($intelligenceTypes as $key => $type):
                            $isSelected = $selected_intelligence === $key;
                        ?>
                        <div class="intelligence-option <?php echo $isSelected ? 'selected' : ''; ?>" 
                             data-intelligence="<?php echo $key; ?>">
                            <div class="intelligence-icon-small <?php echo $key; ?>-icon">
                                <i class="fas fa-<?php echo $type['icon']; ?>"></i>
                            </div>
                            <div class="intelligence-info">
                                <h4><?php echo $type['name']; ?></h4>
                                <p><?php echo $type['desc']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="intelligence_type" id="intelligenceType" value="<?php echo $selected_intelligence; ?>">
                </div>

                <!-- DESCRIPTION -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-book-open"></i> Activity Description
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-align-left input-icon"></i>
                        <textarea name="activity_description" id="activityDescription" placeholder="Describe the activity and learning objectives..."><?php echo $activity_description; ?></textarea>
                    </div>
                </div>

                <!-- VIRTUAL WORLD SELECTOR -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-globe-americas"></i> Choose Virtual World
                    </label>
                    <div class="world-selector">
                        <?php
                        $worlds = [
                            'zoo' => ['icon' => 'paw', 'name' => 'Virtual Zoo', 'desc' => 'Animals & Habitats'],
                            'museum' => ['icon' => 'landmark', 'name' => 'Museum', 'desc' => 'History & Art'],
                            'forest' => ['icon' => 'tree', 'name' => 'Forest', 'desc' => 'Ecosystems'],
                            'ocean' => ['icon' => 'water', 'name' => 'Ocean', 'desc' => 'Marine Life'],
                            'farm' => ['icon' => 'tractor', 'name' => 'Farm', 'desc' => 'Agriculture'],
                            'space' => ['icon' => 'rocket', 'name' => 'Space Station', 'desc' => 'Astronomy'],
                            'city' => ['icon' => 'city', 'name' => 'City', 'desc' => 'Urban Life'],
                            'arctic' => ['icon' => 'icicles', 'name' => 'Arctic', 'desc' => 'Polar Regions']
                        ];
                        
                        foreach ($worlds as $key => $world):
                            $isSelected = $selected_world === $key;
                        ?>
                        <div class="world-option <?php echo $isSelected ? 'selected' : ''; ?>" data-world="<?php echo $key; ?>">
                            <div class="world-thumbnail">
                                <div class="thumbnail-placeholder">
                                    <i class="fas fa-<?php echo $world['icon']; ?>"></i>
                                    <span><?php echo $key; ?>.jpg</span>
                                </div>
                            </div>
                            <div class="world-info">
                                <h3><?php echo $world['name']; ?></h3>
                                <p><?php echo $world['desc']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="virtual_world" id="virtualWorld" value="<?php echo $selected_world; ?>">
                </div>

                <!-- INSTRUCTIONS -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-list-check"></i> Detailed Instructions
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-clipboard-list input-icon"></i>
                        <textarea name="activity_instructions" id="activityInstructions" placeholder="Provide step-by-step instructions for students..." rows="5"><?php echo $activity_instructions; ?></textarea>
                    </div>
                </div>

                <!-- POINTS AND DUE DATE -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-cog"></i> Activity Settings
                    </label>
                    <div class="form-row">
                        <div>
                            <label class="form-label" style="font-size: 1rem;">
                                <i class="fas fa-star"></i> Maximum Points
                            </label>
                            <div class="input-with-icon">
                                <i class="fas fa-star input-icon"></i>
                                <input type="number" name="max_points" id="maxPoints" placeholder="100" min="1" max="1000" 
                                       value="<?php echo $max_points_val; ?>">
                            </div>
                        </div>
                        <div>
                            <label class="form-label" style="font-size: 1rem;">
                                <i class="fas fa-calendar-alt"></i> Due Date (Optional)
                            </label>
                            <div class="input-with-icon">
                                <i class="fas fa-calendar-alt input-icon"></i>
                                <input type="date" name="due_date" id="dueDate" 
                                       value="<?php echo $due_date_val; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="button-group" style="margin-top: 30px;">
                    <?php if (!$formSubmitted): ?>
                    <button type="submit" class="btn btn-success" id="submitBtn">
                        <i class="fas <?php echo $isEditMode ? 'fa-save' : 'fa-plus-circle'; ?>"></i> 
                        <?php echo $isEditMode ? 'Update Activity' : 'Create Activity'; ?>
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset Form
                    </button>
                    <?php else: ?>
                    <a href="create-activity.php<?php echo $isEditMode ? "?edit=$editActivityId" : ''; ?>" class="btn btn-success">
                        <i class="fas <?php echo $isEditMode ? 'fa-edit' : 'fa-plus'; ?>"></i> 
                        <?php echo $isEditMode ? 'Continue Editing' : 'Create Another Activity'; ?>
                    </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- BOTTOM BUTTONS CONTAINER -->
        <div class="bottom-buttons-container fade-in">
            <a href="teacher-dashboard.php" class="green-btn">
                <i class="fas fa-tachometer-alt"></i> Back to Dashboard
            </a>
            
            <form method="POST" action="logout.php" style="display: inline;">
                <button type="submit" name="logout" class="red-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // DOM Elements
        const activityTypeOptions = document.querySelectorAll('.activity-type-option');
        const intelligenceOptions = document.querySelectorAll('.intelligence-option');
        const worldOptions = document.querySelectorAll('.world-option');
        const activityTypeInput = document.getElementById('activityType');
        const intelligenceInput = document.getElementById('intelligenceType');
        const virtualWorldInput = document.getElementById('virtualWorld');
        const activityForm = document.getElementById('activityForm');
        const titleInput = document.getElementById('activityTitle');
        const titleError = document.getElementById('titleError');
        const submitBtn = document.getElementById('submitBtn');
        const dueDateInput = document.getElementById('dueDate');
        const isEditMode = <?php echo $isEditMode ? 'true' : 'false'; ?>;
        const editActivityId = <?php echo $editActivityId ? "'$editActivityId'" : 'null'; ?>;

        // Set minimum due date to today
        const today = new Date().toISOString().split('T')[0];
        if (dueDateInput) {
            dueDateInput.min = today;
        }

        // Activity Type Selector
        activityTypeOptions.forEach(option => {
            option.addEventListener('click', () => {
                activityTypeOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                activityTypeInput.value = option.dataset.activityType;
            });
        });

        // Intelligence Type Selector
        intelligenceOptions.forEach(option => {
            option.addEventListener('click', () => {
                intelligenceOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                intelligenceInput.value = option.dataset.intelligence;
            });
        });

        // World Selector
        worldOptions.forEach(option => {
            option.addEventListener('click', () => {
                worldOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                virtualWorldInput.value = option.dataset.world;
            });
        });

        // Check for duplicate title (AJAX call to self)
        async function checkDuplicateTitle(title) {
            if (!title.trim()) return false;
            
            try {
                const data = { title: title };
                if (isEditMode && editActivityId) {
                    data.exclude_id = editActivityId;
                }
                
                const response = await fetch('create-activity.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                return result.exists;
            } catch (error) {
                console.error('Error checking title:', error);
                return false;
            }
        }

        // Form validation
        activityForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const title = titleInput.value.trim();
            if (!title) {
                titleError.textContent = 'Please enter an activity title!';
                titleError.style.display = 'block';
                titleInput.focus();
                return false;
            }
            
            const pointsInput = document.getElementById('maxPoints');
            if (pointsInput) {
                const points = parseInt(pointsInput.value);
                if (isNaN(points) || points < 1 || points > 1000) {
                    alert('Please enter valid points between 1 and 1000');
                    pointsInput.focus();
                    return false;
                }
            }
            
            // Check for duplicate title
            if (submitBtn) {
                submitBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${isEditMode ? 'Checking...' : 'Checking...'}`;
                submitBtn.disabled = true;
            }
            
            const isDuplicate = await checkDuplicateTitle(title);
            
            if (isDuplicate) {
                titleError.textContent = 'Another activity with this title already exists. Please choose a different title.';
                titleError.style.display = 'block';
                titleInput.focus();
                if (submitBtn) {
                    submitBtn.innerHTML = `<i class="fas ${isEditMode ? 'fa-save' : 'fa-plus-circle'}"></i> ${isEditMode ? 'Update Activity' : 'Create Activity'}`;
                    submitBtn.disabled = false;
                }
                return false;
            }
            
            // If no duplicate, submit the form
            titleError.style.display = 'none';
            this.submit();
        });

        // Real-time title validation
        titleInput.addEventListener('input', function() {
            titleError.style.display = 'none';
        });

        // Add keyboard shortcut: Ctrl+Enter to submit
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'Enter' && !<?php echo $formSubmitted ? 'true' : 'false'; ?>) {
                activityForm.submit();
            }
        });

        // Make MIEL banner image interactive
        const mielBanner = document.querySelector('.miel-banner');
        if (mielBanner) {
            mielBanner.addEventListener('click', function() {
                this.classList.toggle('bounce');
                alert('MIEL - Multiple Intelligence Experiential Learning\nActivities for creative expression!');
                
                setTimeout(() => {
                    this.classList.remove('bounce');
                }, 500);
            });
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>