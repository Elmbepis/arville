<?php
foreach (['127.0.0.1', 'localhost', '::1'] as $host) {
    $url = "http://$host:8000/v1/systemone";
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => '{}',
        CURLOPT_TIMEOUT => 5,
    ]);
    $resp = curl_exec($ch);
    $err  = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "Host: $host\n";
    echo "  HTTP: $code\n";
    echo "  Error: " . ($err ?: '(none)') . "\n";
    echo "  Response: " . substr((string)$resp, 0, 100) . "\n\n";
}