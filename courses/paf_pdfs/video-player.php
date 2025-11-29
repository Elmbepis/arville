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

// Get video details
$video_id = $_GET['video_id'] ?? null;
$video = null;

if ($video_id && $user_role === 'trainee') {
    $video_stmt = $conn->prepare("SELECT id, video_title, video_url FROM training_videos WHERE id = ?");
    $video_stmt->bind_param("i", $video_id);
    $video_stmt->execute();
    $video_result = $video_stmt->get_result();
    $video = $video_result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PAF Training Platform - Training Video</title>
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
        max-width: 1200px;
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
    
    /* Video Player Section */
    .video-player-section {
        margin-bottom: 40px;
    }
    
    .video-container {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        border-left: 4px solid #003366;
    }
    
    .video-title {
        font-size: 1.5em;
        color: #003366;
        margin-bottom: 20px;
        font-weight: bold;
        text-align: center;
    }
    
    .video-player {
        width: 100%;
        max-width: 800px;
        height: 450px;
        background: #000;
        border-radius: 8px;
        margin: 0 auto 20px;
    }
    
    video {
        width: 100%;
        height: 100%;
        border-radius: 8px;
    }
    
    .video-info {
        background: #e9ecef;
        padding: 15px;
        border-radius: 6px;
        margin: 20px 0;
        text-align: center;
        font-size: 0.9em;
        color: #495057;
    }
    
    .video-info p {
        margin: 5px 0;
    }
    
    .video-controls {
        margin-top: 20px;
        text-align: center;
    }
    
    .control-btn {
        padding: 10px 20px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin: 0 10px;
        transition: background 0.3s;
    }
    
    .control-btn:hover {
        background: #218838;
    }
    
    .no-video {
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
    
    .videos-btn {
        padding: 12px 24px;
        border: none;
        background: #007bff;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .videos-btn:hover { 
        background: #0056b3; 
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

    /* Responsive design */
    @media (max-width: 900px) {
        .video-player {
            height: 300px;
        }
        
        .dashboard-content {
            padding: 20px;
        }
        
        .video-controls {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        
        .control-btn {
            margin: 5px;
            padding: 8px 16px;
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
            PAF Training Platform - Training Video
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'trainee' && $video): ?>
            <!-- VIDEO PLAYER PAGE WITH STREAMING -->
            <div class="video-player-section">
                <h2 class="section-title">Training Video</h2>
                
                <div class="video-container">
                    <div class="video-title"><?= htmlspecialchars($video['video_title']) ?></div>
                    
                    <div class="video-player">
                        <video controls controlsList="nodownload" preload="metadata">
                            <source src="video-stream.php?video_id=<?= $video['id'] ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    
                    <div class="video-info">
                        <p><strong>Streaming enabled:</strong> Video will start playing immediately</p>
                        <p><strong>Seek anywhere:</strong> Jump to any part without waiting for full download</p>
                        <p><strong>Efficient bandwidth:</strong> Only downloads the portions you watch</p>
                    </div>
                    
                    <div class="video-controls">
                        <button class="control-btn" onclick="playVideo()">Play</button>
                        <button class="control-btn" onclick="pauseVideo()">Pause</button>
                        <button class="control-btn" onclick="restartVideo()">Restart</button>
                        <button class="control-btn" onclick="toggleMute()">Mute/Unmute</button>
                        <button class="control-btn" onclick="toggleFullscreen()">Fullscreen</button>
                    </div>
                </div>
            </div>

        <?php elseif ($user_role !== 'trainee'): ?>
            <!-- For non-trainee users -->
            <div style="text-align: center; padding: 50px;">
                <h2>Access Restricted</h2>
                <p>This page is only available for trainees.</p>
            </div>
        <?php else: ?>
            <!-- Video not found -->
            <div class="no-video">
                <p>Video not found or no longer available.</p>
                <p>Please return to the videos list and select a valid video.</p>
            </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="training-videos.php" class="videos-btn">Back to Videos</a>
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>

  <script>
  function playVideo() {
      const video = document.querySelector('video');
      video.play().catch(e => console.log('Play failed:', e));
  }

  function pauseVideo() {
      document.querySelector('video').pause();
  }

  function restartVideo() {
      const video = document.querySelector('video');
      video.currentTime = 0;
      video.play().catch(e => console.log('Play failed:', e));
  }

  function toggleMute() {
      const video = document.querySelector('video');
      video.muted = !video.muted;
      updateMuteButton();
  }

  function toggleFullscreen() {
      const video = document.querySelector('video');
      if (!document.fullscreenElement) {
          video.requestFullscreen().catch(err => {
              console.log(`Error attempting to enable fullscreen: ${err.message}`);
          });
      } else {
          document.exitFullscreen();
      }
  }

  function updateMuteButton() {
      const video = document.querySelector('video');
      const muteButton = document.querySelector('[onclick="toggleMute()"]');
      muteButton.textContent = video.muted ? 'Unmute' : 'Mute';
  }

  // Add event listeners for better user experience
  document.addEventListener('DOMContentLoaded', function() {
      const video = document.querySelector('video');
      if (video) {
          video.addEventListener('waiting', function() {
              console.log('Video is buffering...');
          });

          video.addEventListener('canplay', function() {
              console.log('Video can start playing');
          });

          video.addEventListener('volumechange', updateMuteButton);
          
          // Initialize mute button text
          updateMuteButton();
      }
  });
  </script>
</body>
</html>