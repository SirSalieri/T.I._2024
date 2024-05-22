<?php
if ($_FILES['upload']) {
    if (($_FILES['upload'] == "none") || (empty($_FILES['upload']['name']))) {
        $message = "No file uploaded.";
    } elseif ($_FILES['upload']["size"] == 0 || $_FILES['upload']["size"] > 5000000) {
        $message = "File is too large or empty.";
    } elseif (!is_uploaded_file($_FILES['upload']["tmp_name"])) {
        $message = "File not uploaded.";
    } else {
        $filename = basename($_FILES['upload']['name']);
        $filepath = "uploads/" . $filename;

        if (move_uploaded_file($_FILES['upload']['tmp_name'], $filepath)) {
            $message = "File uploaded successfully.";
            $funcNum = $_GET['CKEditorFuncNum'];
            $url = $filepath;
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        } else {
            $message = "Failed to move uploaded file.";
            $response = "<script>alert('$message');</script>";
        }
    }

    echo $response;
}
?>
