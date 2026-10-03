<?php
// api/hall.php

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$DB_HOST = 'localhost';
$DB_NAME = 'worlds';
$DB_USER = 'root';
$DB_PASS = '';

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'DB connect failed', 'detail' => $e->getMessage()]);
    exit;
}

$param = $_GET['world'] ?? $_GET['id'] ?? 'tradehall';

$stmt = $pdo->prepare(
    "SELECT * FROM worlds
      WHERE (slug = ? OR id = ?) AND active = 1
      LIMIT 1"
);
$stmt->execute([$param, (int)$param]);
$world = $stmt->fetch();

if (!$world) {
    http_response_code(404);
    echo json_encode(['error' => "World not found: $param"]);
    exit;
}

$stmt = $pdo->prepare(
    "SELECT id, slot, vendor_name, vendor_slug, active,
            pos_x, pos_y, pos_z, rot_y, notes
       FROM areas
      WHERE world_id = ? AND active = 1
      ORDER BY slot"
);
$stmt->execute([$world['id']]);
$areas = $stmt->fetchAll();

$objStmt = $pdo->prepare(
    "SELECT id, creator, model_path,
            pos_x, pos_y, pos_z,
            rot_x, rot_y, rot_z,
            scale, params, sort_order, label
       FROM area_objects
      WHERE area_id = ?
      ORDER BY sort_order, id"
);

foreach ($areas as &$a) {
    $objStmt->execute([$a['id']]);
    $objs = $objStmt->fetchAll();

    foreach ($objs as &$o) {
        $o['params'] = json_decode($o['params'] ?: '{}', true);
        foreach (['pos_x','pos_y','pos_z','rot_x','rot_y','rot_z','scale'] as $k) {
            $o[$k] = (float)$o[$k];
        }
        $o['id'] = (int)$o['id'];
    }
    unset($o);

    $a['id']      = (int)$a['id'];
    $a['slot']    = (int)$a['slot'];
    $a['objects'] = $objs;

    foreach (['pos_x','pos_y','pos_z','rot_y'] as $k) {
        $a[$k] = ($a[$k] === null) ? null : (float)$a[$k];
    }
}
unset($a);

foreach (['place_width','place_depth','start_x','start_y','start_z',
          'start_rot_y','eye_height','fog_density'] as $k) {
    $world[$k] = (float)$world[$k];
}
$world['id'] = (int)$world['id'];

echo json_encode(
    ['world' => $world, 'areas' => $areas],
    JSON_UNESCAPED_SLASHES
);