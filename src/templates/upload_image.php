<?php
if ($_FILES['upload']) {
    $file = $_FILES['upload']['tmp_name'];
    $fileName = $_FILES['upload']['name'];
    $destination = '../uploads/' . $fileName;

    // Ensure the uploads directory exists and is writable
    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0777, true);
    }

    // Move the uploaded file to the destination
    if (move_uploaded_file($file, $destination)) {
        $url = '/uploads/' . $fileName;
        echo json_encode(['uploaded' => true, 'url' => $url]);
    } else {
        echo json_encode(['uploaded' => false, 'error' => ['message' => 'Image upload failed']]);
    }
} else {
    echo json_encode(['uploaded' => false, 'error' => ['message' => 'No file uploaded']]);
}
?>
