<?php
$response = ['success' => false, 'url' => ''];

if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $fileName = basename($_FILES['pdf']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $uploadFile)) {
        $response['success'] = true;
        $response['url'] = $uploadFile;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
