<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("HTTP/1.1 403 Forbidden");
    exit();
}

// Database connection - Changed to kpluz database
$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz");
if ($conn->connect_error) {
    header("HTTP/1.1 500 Internal Server Error");
    exit();
}

$video_id = $_GET['video_id'] ?? null;
if (!$video_id) {
    header("HTTP/1.1 400 Bad Request");
    exit();
}

// Verify user has access to this video - Changed to videos table
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT video_url, video_title FROM videos WHERE id = ?");
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

// Get file extension to determine correct content type
$file_extension = strtolower(pathinfo($video_path, PATHINFO_EXTENSION));
$content_type = "video/mp4"; // default

switch($file_extension) {
    case 'mp4':
        $content_type = "video/mp4";
        break;
    case 'webm':
        $content_type = "video/webm";
        break;
    case 'ogg':
        $content_type = "video/ogg";
        break;
    case 'mov':
        $content_type = "video/quicktime";
        break;
    case 'avi':
        $content_type = "video/x-msvideo";
        break;
}

// Set headers for streaming
header("Content-Type: " . $content_type);
header("Accept-Ranges: bytes");
header("Content-Length: " . $file_size);

// Handle range requests for streaming
if (isset($_SERVER['HTTP_RANGE'])) {
    $range = $_SERVER['HTTP_RANGE'];
    $range = str_replace('bytes=', '', $range);
    $range_parts = explode('-', $range);
    $range_start = intval($range_parts[0]);
    $range_end = isset($range_parts[1]) && $range_parts[1] !== '' ? intval($range_parts[1]) : $file_size - 1;
    
    if ($range_start > $range_end || $range_end > $file_size - 1) {
        header("HTTP/1.1 416 Range Not Satisfiable");
        header("Content-Range: bytes */" . $file_size);
        exit();
    }
    
    $length = $range_end - $range_start + 1;
    
    header("HTTP/1.1 206 Partial Content");
    header("Content-Length: " . $length);
    header("Content-Range: bytes $range_start-$range_end/$file_size");
    
    fseek($file, $range_start);
    
    // Output the requested range
    $buffer_size = 8192;
    $bytes_sent = 0;
    while (!feof($file) && $bytes_sent < $length && !connection_aborted()) {
        $remaining = $length - $bytes_sent;
        $chunk_size = $remaining < $buffer_size ? $remaining : $buffer_size;
        $chunk = fread($file, $chunk_size);
        echo $chunk;
        flush();
        $bytes_sent += $chunk_size;
    }
} else {
    // Send entire file if no range requested
    $buffer_size = 8192;
    while (!feof($file) && !connection_aborted()) {
        echo fread($file, $buffer_size);
        flush();
    }
}

fclose($file);
exit();
?>