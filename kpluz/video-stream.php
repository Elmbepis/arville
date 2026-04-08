<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("HTTP/1.1 403 Forbidden");
    exit();
}

// Database connection to verify video access
$conn = new mysqli("localhost", "root", "AcadeV25!", "courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$video_id = $_GET['video_id'] ?? null;
if (!$video_id) {
    header("HTTP/1.1 400 Bad Request");
    exit();
}

// Verify user has access to this video
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT v.video_url, v.video_title FROM training_videos v WHERE v.id = ?");
$stmt->bind_param("i", $video_id);
$stmt->execute();
$result = $stmt->get_result();
$video = $result->fetch_assoc();

if (!$video) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$conn->close();

$video_path = "videos/" . $video['video_url'];

// Check if file exists
if (!file_exists($video_path)) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$file_size = filesize($video_path);
$file = fopen($video_path, "rb");

// Set headers for streaming
header("Content-Type: video/mp4");
header("Accept-Ranges: bytes");
header("Content-Length: " . $file_size);

// Handle range requests for streaming
if (isset($_SERVER['HTTP_RANGE'])) {
    $range = $_SERVER['HTTP_RANGE'];
    $range = str_replace('bytes=', '', $range);
    list($range_start, $range_end) = explode('-', $range);
    
    $range_start = intval($range_start);
    $range_end = $range_end ? intval($range_end) : $file_size - 1;
    
    if ($range_end > $file_size - 1) {
        $range_end = $file_size - 1;
    }
    
    $length = $range_end - $range_start + 1;
    
    header("HTTP/1.1 206 Partial Content");
    header("Content-Length: " . $length);
    header("Content-Range: bytes $range_start-$range_end/$file_size");
    
    fseek($file, $range_start);
    echo fread($file, $length);
} else {
    // Send entire file if no range requested
    readfile($video_path);
}

fclose($file);
exit();
?>