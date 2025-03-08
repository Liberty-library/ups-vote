<?php
require("../includes/global.php"); 
session_start();
if (!isset($_SESSION["user"]) || !isset($_SESSION["user"]["user_id"])) {
    header("HTTP/1.1 403 Forbidden");
    die(json_encode(["error" => "User not authenticated"]));
}
$user_id = $_SESSION["user"]["user_id"];

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define image_location as null initially
$image_location = null;
$thumbnail_location = null; // For storing the thumbnail location
$text = $_POST["text"] ?? null;
$title = $_POST["title"] ?? null;

// Check if a title is provided
if (!$title) {
    echo json_encode(["error" => "Post must have a title"]);
    exit;
}

// Handle file uploads (image or video)
if (!empty($_FILES["media"]["name"])) {
    $file_type = mime_content_type($_FILES["media"]["tmp_name"]);

    // Validate file type (images or videos only)
    if (strpos($file_type, "image") !== false) {
        $image_location = "./uploads/" . basename($_FILES["media"]["name"]);
    } elseif (strpos($file_type, "video") !== false) {
        $image_location = "./uploads/" . basename($_FILES["media"]["name"]);
    } else {
        echo json_encode(["error" => "Unsupported file type."]);
        exit;
    }

    // Move the uploaded file to the correct directory
    if (!move_uploaded_file($_FILES["media"]["tmp_name"], $image_location)) {
        echo json_encode(["error" => "Error uploading file."]);
        exit;
    }

    // Generate a thumbnail if the file is an image or video
    $file_ext = pathinfo($image_location, PATHINFO_EXTENSION);
    $thumbnail_location = "./uploads/thumbnails/" . basename($image_location, ".$file_ext") . "_thumb.jpg";

    if (in_array($file_ext, ["jpg", "jpeg", "png", "gif"])) {
        // Generate thumbnail for images
        generate_thumbnail($image_location, $thumbnail_location);
    } elseif (in_array($file_ext, ["mp4", "webm", "ogg"])) {
        // Generate thumbnail for videos
        generate_video_thumbnail($image_location, $thumbnail_location);
    }
}

// Make sure the society is defined
$s = ["soc_id" => $_POST["soc_id"] ?? null]; // Get society ID from form or URL

// Validate the society ID
if (!$s["soc_id"]) {
    echo json_encode(["error" => "Invalid society."]);
    exit;
}

// Call the new_post function to insert the post
new_post($s, $title, $text, $image_location, $thumbnail_location);

// Send success response
echo json_encode(["success" => true, "message" => "Post created successfully!"]);
exit();
?>


