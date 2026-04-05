<?php
header('Content-Type: application/json');

$action = $_POST['action'] ?? '';
if (!$action) {
    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data['action'] ?? '';
}

$targetDir = __DIR__ . '/uploads/';

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if ($action === 'upload') {
    if (!isset($_FILES['file'])) {
        echo json_encode(['success' => false, 'error' => 'No file uploaded']);
        exit;
    }
    
    $file = $_FILES['file'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = time() . '_' . uniqid() . '.' . $ext;
    $targetFile = $targetDir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // คืนค่า URL สัมพัทธ์สำหรับโหลด และ path จริงสำหรับลบ
        $url = '/bicc-ovec/uploads/' . $filename;
        echo json_encode(['success' => true, 'url' => $url, 'path' => $targetFile]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file']);
    }
    exit;
}

if ($action === 'delete') {
    $data = json_decode(file_get_contents('php://input'), true);
    $path = $data['path'] ?? '';
    
    if ($path && file_exists($path)) {
        unlink($path);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'File not found']);
    }
    exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid action']);
