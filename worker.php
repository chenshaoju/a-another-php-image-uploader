<?php
if ($_POST["password"] != "123456") { 
    die('Password is not correct.');
}

$image_file = $_FILES["image"];

if (!isset($image_file)) {
    die('No file uploaded.');
}

$image_type = exif_imagetype($image_file["tmp_name"]);
if (!$image_type) {
    die('Uploaded file is not an image.');
}

move_uploaded_file(
    $image_file["tmp_name"],
    __DIR__ . "/" . date('Y') . "/" . $image_file["name"]

);

echo "https://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/" . date('Y') . "/" . $image_file["name"];

?>