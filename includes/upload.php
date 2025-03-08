<?php
// Set the upload directory
$uploadDirectory = 'uploads/';

// Check if the "image" file input field is set
if (isset($_FILES['image'])) {
    // Get the uploaded file's name and temporary file path
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    // Ensure that the uploaded file is an image
    $image_info = getimagesize($file_tmp);
    if (!$image_info) {
        echo 'Invalid file format. Please upload an image.';
        exit;
    }

    // Create a unique filename for the uploaded image
    $unique_filename = uniqid() . '_' . $file_name;

    // Set the target file path
    $target_file = $uploadDirectory . $unique_filename;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($file_tmp, $target_file)) {
        // Image uploaded successfully
        echo 'Image uploaded successfully.';

        // You can store $target_file in your database or perform any other actions as needed.
    } else {
        echo 'Error uploading the image.';
    }
} else {
    echo 'No image file found.';
}
