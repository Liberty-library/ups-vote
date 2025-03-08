<?php
require_once '../includes/global.php';  // Include your database connection file

// Define log file
$logFile = "/var/www/html/logs/sql_log.txt";

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);
$post_id = (int)$input['post_id'];
$vote = isset($input['vote']) ? $input['vote'] : null; // "UP" or "DOWN"

// Validate input
if ($vote && !in_array($vote, ['UP', 'DOWN'])) {
    error_log("Invalid vote attempt: " . json_encode($input));
    echo json_encode(['success' => false, 'message' => 'Invalid vote']);
    exit;
}

session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    // Check if the user has already voted
    $query = "SELECT * FROM post_votes WHERE post_id = ? AND user_id = ?";
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - Checking vote: $query ($post_id, $user_id)\n", FILE_APPEND);

    $stmt = $pdo->prepare($query);
    $stmt->execute([$post_id, $user_id]);
    $existingVote = $stmt->fetch();

    if ($existingVote) {
        // Update the existing vote
        $updateQuery = "UPDATE post_votes SET vote = ? WHERE post_id = ? AND user_id = ?";
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - Updating vote: $updateQuery ($vote, $post_id, $user_id)\n", FILE_APPEND);

        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute([$vote, $post_id, $user_id]);
    } else {
        // Insert a new vote
        $insertQuery = "INSERT INTO post_votes (post_id, user_id, vote) VALUES (?, ?, ?)";
        file_put_contents($logFile, date("Y-m-d H:i:s") . " - Inserting vote: $insertQuery ($post_id, $user_id, $vote)\n", FILE_APPEND);

        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute([$post_id, $user_id, $vote]);
    }

    // Update the total vote count in the posts table
    $voteAdjustment = ($vote == 'UP') ? 1 : -1;
    $updateVotesQuery = "UPDATE posts SET votes = votes + ? WHERE post_id = ?";
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - Updating vote count: $updateVotesQuery ($voteAdjustment, $post_id)\n", FILE_APPEND);

    $stmt = $pdo->prepare($updateVotesQuery);
    $stmt->execute([$voteAdjustment, $post_id]);

    // Fetch the user's vote after update
    $query = "SELECT vote FROM post_votes WHERE post_id = ? AND user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$post_id, $user_id]);
    $existingVote = $stmt->fetch();

    echo json_encode(['success' => true, 'userVote' => $existingVote['vote']]);
} catch (PDOException $e) {
    file_put_contents($logFile, date("Y-m-d H:i:s") . " - SQL ERROR: " . $e->getMessage() . "\n", FILE_APPEND);
    echo json_encode(['success' => false, 'message' => 'Database error']);
}

?>

