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

// Get available videos from database grouped by lesson - Changed from training_videos to videos
$videos_by_lesson = [];
$total_videos = 0;

if ($user_role === 'student') {
    $videos_result = $conn->query("SELECT DISTINCT lesson FROM videos ORDER BY lesson");
    while ($row = $videos_result->fetch_assoc()) {
        $lesson = $row['lesson'];
        
        // Get videos for this lesson
        $video_stmt = $conn->prepare("SELECT id, video_title, video_url FROM videos WHERE lesson = ? ORDER BY video_title");
        $video_stmt->bind_param("s", $lesson);
        $video_stmt->execute();
        $video_result = $video_stmt->get_result();
        
        $videos = [];
        while ($video_row = $video_result->fetch_assoc()) {
            $videos[] = $video_row;
            $total_videos++;
        }
        
        $videos_by_lesson[$lesson] = [
            'name' => $lesson,
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
  <title>KPluz SHS - Training Videos</title>
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
    
    .video-count {
        background: #28a745;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: normal;
    }
    
    /* Videos Section */
    .videos-section {
        margin-bottom: 50px;
    }
    
    .lesson-videos {
        margin-bottom: 40px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #003366;
    }
    
    .lesson-title {
        font-size: 1.3em;
        color: #003366;
        margin-bottom: 20px;
        font-weight: bold;
    }
    
    /* 4-Column Grid - Always shows 4 columns even with few items */
    .videos-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 15px;
    }
    
    .video-card {
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        min-height: 180px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .video-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .video-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
        color: #dc3545;
    }
    
    .video-title {
        font-size: 1em;
        color: #003366;
        margin-bottom: 15px;
        font-weight: bold;
        word-break: break-word;
    }
    
    .watch-video-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
        font-weight: bold;
        font-size: 0.9em;
        width: auto;
        max-width: 70%;
        margin: 0 auto;
    }
    
    .watch-video-btn:hover {
        background: #218838;
        color: white;
    }
    
    .disabled-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #6c757d;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        font-size: 0.9em;
        width: auto;
        max-width: 70%;
        margin: 0 auto;
        cursor: not-allowed;
        opacity: 0.6;
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
        .videos-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .videos-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .dashboard-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 600px) {
        .videos-grid {
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
            KPluz SHS - Training Videos
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'student'): ?>
            <!-- STUDENT VIDEOS VIEW -->
            <div class="videos-section">
                <h2 class="section-title">
                    Training Videos (Based on DepEd Lesson Exemplars)
                    <span class="video-count">Total: <?= $total_videos ?> Video(s)</span>
                </h2>
                
                <?php if (!empty($videos_by_lesson)): ?>
                    <?php foreach ($videos_by_lesson as $lesson => $lesson_data): ?>
                        <div class="lesson-videos">
                            <div class="lesson-title">
                                <?= htmlspecialchars($lesson_data['name']) ?>
                            </div>
                            <div class="videos-grid">
                                <?php foreach ($lesson_data['videos'] as $video): ?>
                                    <div class="video-card">
                                        <div class="video-icon">&#127909;</div>
                                        <div class="video-title"><?= htmlspecialchars($video['video_title']) ?></div>
                                        <?php if (!empty($video['video_url'])): ?>
                                            <a href="video-player.php?video_id=<?= $video['id'] ?>" class="watch-video-btn">Watch Video</a>
                                        <?php else: ?>
                                            <div class="disabled-btn">Coming Soon</div>
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
            <!-- For non-student users (admin or teacher) -->
            <div style="text-align: center; padding: 50px;">
                <h2>Access Restricted</h2>
                <p>This page is only available for students.</p>
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