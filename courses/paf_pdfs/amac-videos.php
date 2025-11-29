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
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
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

// Get available training videos from database
$training_videos = [];
if ($user_role === 'trainee') {
    // Use 'course' instead of 'course_code' since that's our column name
    $videos_result = $conn->query("SELECT DISTINCT course FROM training_videos ORDER BY course");
    while ($row = $videos_result->fetch_assoc()) {
        $course = $row['course'];
        
        // Get videos for this course - only select the columns we actually have
        $video_stmt = $conn->prepare("SELECT id, video_title, video_url FROM training_videos WHERE course = ? ORDER BY video_title");
        $video_stmt->bind_param("s", $course);
        $video_stmt->execute();
        $video_result = $video_stmt->get_result();
        
        $videos = [];
        while ($video_row = $video_result->fetch_assoc()) {
            $videos[] = $video_row;
        }
        
        $training_videos[$course] = [
            'name' => $course, // Use course as the name since we don't have course_name
            'videos' => $videos
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PAF Training Platform - Training Videos</title>
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

    /* Header background strip */
    .header {
        width: 100%;
        height: 200px;
        background: url('header-bg.jpg') repeat-x top center;
        background-size: auto 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .header-logo {
        max-height: 120px;
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
    }
    
    /* Training Videos Section - Using the same styling as manuals */
    .videos-section {
        margin-bottom: 50px;
    }
    
    .course-videos {
        margin-bottom: 30px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #003366;
    }
    
    .course-title {
        font-size: 1.3em;
        color: #003366;
        margin-bottom: 15px;
        font-weight: bold;
    }
    
    .videos-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }
    
    .video-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 6px;
        padding: 20px;
        text-align: left;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .video-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    }
    
    .video-name {
        font-size: 1.1em;
        color: #003366;
        margin-bottom: 15px;
        font-weight: bold;
    }
    
    .watch-video-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 0.9em;
        transition: background 0.3s;
    }
    
    .watch-video-btn:hover {
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
    
    /* Action Buttons - Exact same as manuals.php */
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
    @media (max-width: 900px) {
        .videos-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <!-- Header with tiled background and logo -->
    <div class="header">
        <img src="paf-logo.png" alt="PAF Logo" class="header-logo">
    </div>

    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            PAF Training Platform - Training Videos
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'trainee'): ?>
            <!-- TRAINEE VIDEOS PAGE -->
            
            <!-- Training Videos Section -->
            <div class="videos-section">
                <h2 class="section-title">Training Videos</h2>
                <?php if (!empty($training_videos)): ?>
                    <?php foreach ($training_videos as $course => $course_data): ?>
                        <div class="course-videos">
                            <div class="course-title"><?= htmlspecialchars($course_data['name']) ?> Videos</div>
                            <div class="videos-grid">
                                <?php foreach ($course_data['videos'] as $video): ?>
                                    <div class="video-card">
                                        <div class="video-name"><?= htmlspecialchars($video['video_title']) ?></div>
                                        <?php if (!empty($video['video_url'])): ?>
                                            <a href="video-player.php?video_id=<?= $video['id'] ?>" class="watch-video-btn">Watch Video</a>
                                        <?php else: ?>
                                            <button class="watch-video-btn" style="background: #6c757d; cursor: not-allowed;" disabled>Coming Soon</button>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-results">
                        <p>No training videos available at the moment.</p>
                        <p>Please check back later for video content.</p>
                    </div>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <!-- For non-trainee users -->
            <div style="text-align: center; padding: 50px;">
                <h2>Access Restricted</h2>
                <p>This page is only available for trainees.</p>
                <div class="action-buttons">
                    <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>
</body>
</html>