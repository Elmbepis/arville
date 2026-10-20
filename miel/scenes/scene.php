<?php
// miel/scenes/scene.php
// Read-only scene endpoint. Returns one world + its areas + nested objects.
// Query: ?type=nature&id=3   OR   ?slug=rainbow-reef

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$DB_HOST = 'localhost';
$DB_NAME = 'miel';
$DB_USER = 'root';
$DB_PASS = 'AcadeV25!';

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

$type = $_GET['type'] ?? 'nature';
$id   = $_GET['id']   ?? null;
$slug = $_GET['slug'] ?? null;

if (!$id && !$slug) {
    http_response_code(400);
    echo json_encode(['error' => 'Provide id or slug']);
    exit;
}

if ($slug) {
    $stmt = $pdo->prepare(
        "SELECT * FROM scene_worlds WHERE slug = ? AND active = 1 LIMIT 1"
    );
    $stmt->execute([$slug]);
} else {
    $stmt = $pdo->prepare(
        "SELECT * FROM scene_worlds
         WHERE ecosystem_id = ? AND world_type = ? AND active = 1
         LIMIT 1"
    );
    $stmt->execute([(string)$id, $type]);
}
$world = $stmt->fetch();

if (!$world) {
    http_response_code(404);
    echo json_encode(['error' => "World not found (type=$type, id=$id, slug=$slug)"]);
    exit;
}

$areaStmt = $pdo->prepare(
    "SELECT id, area_key, label, pos_x, pos_y, pos_z, rot_y,
            ambient_audio, audio_volume, audio_loop
       FROM scene_areas
      WHERE world_id = ?
      ORDER BY area_key"
);
$areaStmt->execute([$world['id']]);
$areas = $areaStmt->fetchAll();

$objStmt = $pdo->prepare(
    "SELECT id, parent_id, creator, model_path, texture, name,
            pos_x, pos_y, pos_z, rot_x, rot_y, rot_z, scale,
            scale_x, scale_y, scale_z,
            params, sort_order, label
       FROM scene_objects
      WHERE area_id = ?
      ORDER BY sort_order, id"
);

function normalizeObject($o) {
    $o['id']        = (int)$o['id'];
    $o['parent_id'] = $o['parent_id'] !== null ? (int)$o['parent_id'] : null;
    $o['params']    = json_decode($o['params'] ?: '{}', true) ?: new stdClass();

    // Uniform fields always cast to float
    foreach (['pos_x','pos_y','pos_z','rot_x','rot_y','rot_z','scale'] as $k) {
        $o[$k] = (float)$o[$k];
    }

    // Per-axis scale: only cast if not null (NULL is meaningful — means "use uniform scale")
    foreach (['scale_x','scale_y','scale_z'] as $k) {
        if ($o[$k] !== null) $o[$k] = (float)$o[$k];
    }

    return $o;
}

function buildObjectTree($rows) {
    $byId = [];
    foreach ($rows as $r) {
        $r['children'] = [];
        $byId[$r['id']] = $r;
    }

    $childrenOf = [];
    $roots = [];
    foreach ($byId as $id => $node) {
        $p = $node['parent_id'];
        if ($p && isset($byId[$p])) {
            $childrenOf[$p][] = $id;
        } else {
            $roots[] = $id;
        }
    }

    $build = function ($id) use (&$build, $byId, $childrenOf) {
        $node = $byId[$id];
        foreach ($childrenOf[$id] ?? [] as $cid) {
            $node['children'][] = $build($cid);
        }
        return $node;
    };

    return array_map($build, $roots);
}

foreach ($areas as &$a) {
    $objStmt->execute([$a['id']]);
    $raw = $objStmt->fetchAll();
    foreach ($raw as &$o) {
        $o = normalizeObject($o);
    }
    unset($o);

    $a['id']           = (int)$a['id'];
    $a['pos_x']        = (float)$a['pos_x'];
    $a['pos_y']        = (float)$a['pos_y'];
    $a['pos_z']        = (float)$a['pos_z'];
    $a['rot_y']        = (float)$a['rot_y'];
    $a['audio_volume'] = (float)($a['audio_volume'] ?? 0.7);
    $a['audio_loop']   = (int)($a['audio_loop'] ?? 1);
    $a['objects']      = buildObjectTree($raw);
}
unset($a);

foreach (['eye_height','place_width','place_depth','start_x','start_y','start_z'] as $k) {
    if (isset($world[$k])) $world[$k] = (float)$world[$k];
}
if (isset($world['speed_multiplier']) && $world['speed_multiplier'] !== null) {
    $world['speed_multiplier'] = (float)$world['speed_multiplier'];
}
$world['id'] = (int)$world['id'];

echo json_encode(
    ['world' => $world, 'areas' => $areas],
    JSON_UNESCAPED_SLASHES
);