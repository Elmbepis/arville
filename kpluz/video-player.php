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

// Database connection - Changed to kpluz database
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

// Get video details - Changed to videos table
$video_id = $_GET['video_id'] ?? null;
$video = null;
$youtube_id = null;
$is_youtube = false;

if ($video_id && $user_role === 'student') {
    $video_stmt = $conn->prepare("SELECT id, video_title, video_url FROM videos WHERE id = ?");
    $video_stmt->bind_param("i", $video_id);
    $video_stmt->execute();
    $video_result = $video_stmt->get_result();
    $video = $video_result->fetch_assoc();
    
    // Check if it's a YouTube video and extract ID
    if ($video) {
        $video_url = $video['video_url'];
        
        // Check for YouTube URL patterns
        if (preg_match('/(youtube\.com|youtu\.be)/', $video_url)) {
            $is_youtube = true;
            
            // Extract YouTube video ID from various URL formats
            $patterns = [
                '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/',
                '/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/',
                '/youtube\.com\/v\/([a-zA-Z0-9_-]+)/'
            ];
            
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $video_url, $matches)) {
                    $youtube_id = $matches[1];
                    break;
                }
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KPluz SHS - Training Video</title>
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
        max-width: 1200px;
        margin: 0 auto;
        padding: 0;
    }
    
    .header {
        background: #003366;
        padding: 20px;
        text-align: center;
    }
    
    .header-logo {
        max-height: 80px;
        width: auto;
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
        margin: 0 auto 30px;
        position: relative;
    }
    
    video, iframe {
        width: 100%;
        height: 100%;
        border-radius: 8px;
    }
    
    iframe {
        border: none;
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
        background: #003366;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .videos-btn:hover { 
        background: #0055aa; 
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
        <img src="images/kpluz_logo.png" alt="KPluz Logo" class="header-logo">
    </div>
    
    <div class="user-welcome">
        <div class="welcome-text">Welcome, <?= htmlspecialchars($user_name) ?>!</div>
        <div class="user-info">
            KPluz SHS - Training Video
            <span class="role-badge"><?= ucfirst($user_role) ?></span>
        </div>
    </div>

    <div class="dashboard-content">
        <?php if ($user_role === 'student' && $video): ?>
            <!-- VIDEO PLAYER PAGE -->
            <div class="video-player-section">
                <h2 class="section-title">Training Video</h2>
                
                <div class="video-container">
                    <div class="video-title"><?= htmlspecialchars($video['video_title']) ?></div>
                    
                    <div class="video-player">
                        <?php if ($is_youtube && $youtube_id): ?>
                            <!-- YouTube Embed -->
                            <iframe 
                                id="videoPlayer"
                                src="https://www.youtube.com/embed/<?= $youtube_id ?>?enablejsapi=1&origin=<?= $_SERVER['HTTP_HOST'] ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        <?php else: ?>
                            <!-- Direct video file (MP4, etc.) -->
                            <video id="videoPlayer" controls controlsList="nodownload" preload="metadata">
                                <source src="<?= htmlspecialchars($video['video_url']) ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (!$is_youtube): ?>
                    <!-- Only show custom controls for direct video files -->
                    <div class="video-controls">
                        <button class="control-btn" onclick="playVideo()">&#9654; Play</button>
                        <button class="control-btn" onclick="pauseVideo()">&#9208; Pause</button>
                        <button class="control-btn" onclick="restartVideo()">&#10227; Restart</button>
                        <button class="control-btn" onclick="toggleMute()">&#128266; Mute/Unmute</button>
                        <button class="control-btn" onclick="toggleFullscreen()">&#9974; Fullscreen</button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php elseif ($user_role !== 'student'): ?>
            <!-- For non-student users -->
            <div style="text-align: center; padding: 50px;">
                <h2>Access Restricted</h2>
                <p>This page is only available for students.</p>
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
            <a href="videos.php" class="videos-btn">Back to Videos</a>
            <a href="dashboard.php" class="dashboard-btn">Back to Dashboard</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
  </div>

  <script>
  // These functions only work for direct video files (not YouTube)
  function playVideo() {
      const video = document.getElementById('videoPlayer');
      if (video && video.tagName === 'VIDEO') {
          video.play().catch(e => console.log('Play failed:', e));
      }
  }

  function pauseVideo() {
      const video = document.getElementById('videoPlayer');
      if (video && video.tagName === 'VIDEO') {
          video.pause();
      }
  }

  function restartVideo() {
      const video = document.getElementById('videoPlayer');
      if (video && video.tagName === 'VIDEO') {
          video.currentTime = 0;
          video.play().catch(e => console.log('Play failed:', e));
      }
  }

  function toggleMute() {
      const video = document.getElementById('videoPlayer');
      if (video && video.tagName === 'VIDEO') {
          video.muted = !video.muted;
      }
  }

  function toggleFullscreen() {
      const video = document.getElementById('videoPlayer');
      if (!document.fullscreenElement) {
          if (video.requestFullscreen) {
              video.requestFullscreen().catch(err => {
                  console.log(`Error attempting to enable fullscreen: ${err.message}`);
              });
          } else if (video.webkitRequestFullscreen) { /* Safari */
              video.webkitRequestFullscreen();
          } else if (video.msRequestFullscreen) { /* IE/Edge */
              video.msRequestFullscreen();
          }
      } else {
          document.exitFullscreen();
      }
  }

  // Log video type on load
  document.addEventListener('DOMContentLoaded', function() {
      const video = document.getElementById('videoPlayer');
      if (video) {
          if (video.tagName === 'VIDEO') {
              console.log('Direct video player loaded');
              
              video.addEventListener('waiting', function() {
                  console.log('Video is buffering...');
              });

              video.addEventListener('canplay', function() {
                  console.log('Video can start playing');
              });
          } else if (video.tagName === 'IFRAME') {
              console.log('YouTube video player loaded');
          }
      }
  });
  </script>
</body>
</html>