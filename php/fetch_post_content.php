<?php
require_once '../includes/global.php'; // Assuming you have a database connection file
// Ensure that the 'pid' and 'soc' parameters are set
$post_id = isset($_GET['pid']) ? $_GET['pid'] : null;
$society_name = isset($_GET['soc']) ? $_GET['soc'] : null;

if (!$post_id) {
    echo json_encode(["success" => false, "message" => "Post ID is required."]);
    exit;
}

if (!$society_name) {
    echo json_encode(["success" => false, "message" => "Society is required."]);
    exit;
}

// Database connection
$host = 'localhost';
$dbname = 'AVideo';
$username = 'root';
$password = 'Philco01';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch the post details based on post_id and society_name
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = :post_id");
    $stmt->execute(['post_id' => $post_id]);

    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        // Post found, send the data
        echo json_encode([
            "success" => true,
            "post" => [
                'post_id' => $post['post_id'],
                'title' => $post['title'],
               
              
                'time' => $post['time'],
                'text' => $post['text'],
                
               
                'image_location' => $post['image_location'],
                
            ]
        ]);
    } else {
        // No post found
        echo json_encode(["success" => false, "message" => "Post not found or society mismatch."]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}
?>

