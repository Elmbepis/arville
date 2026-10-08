<?php
/**
 * bot-chat/index.php — Redirect to the chat face.
 * Works both locally and online.
 */

// Preserve any face ID passed in the URL
$faceId = isset($_GET['id']) ? (int)$_GET['id'] : 1;
if ($faceId < 1) $faceId = 1;

header('Location: chat.htm?id=' . $faceId, true, 302);
exit;