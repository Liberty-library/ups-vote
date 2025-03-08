<?php
require_once '../includes/global.php';  // Include your database connection file

// Start session to get the current user ID
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);

// Ensure correct content type for JSON
header('Content-Type: application/json'); 

// Initialize the response array
$response = [
    'success' => false, // Whether the vote action was successful
    'userVote' => null,  // Default to null if no vote is found or error occurred
    'message' => 'An error occurred' // Optional message
];

// Check if the 'vote' parameter is provided
if (!isset($input['vote'])) {
    $response['message'] = 'Vote parameter missing';
    echo json_encode($response);
    exit;
}

$vote = $input['vote'];
$post_id = (int)$input['post_id'];

// Validate the vote (only allow 'UP' or 'DOWN')
if (!in_array($vote, ['UP', 'DOWN'])) {
    $response['message'] = 'Invalid vote';
    echo json_encode($response);
    exit;
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    $response['message'] = 'User not logged in';
    echo json_encode($response);
    exit;
}

$user_id = $_SESSION['user_id'];

// Check if the user has already voted on this post
$query = "SELECT * FROM post_votes WHERE post_id = ? AND user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$post_id, $user_id]);
$existingVote = $stmt->fetch();

try {
    if ($existingVote) {
        // Update the existing vote
        $updateQuery = "UPDATE post_votes SET vote = ? WHERE post_id = ? AND user_id = ?";
        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute([$vote, $post_id, $user_id]);
    } else {
        // Insert a new vote
        $insertQuery = "INSERT INTO post_votes (post_id, user_id, vote) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute([$post_id, $user_id, $vote]);
    }

    // Update the total vote count in the posts table
    $voteAdjustment = ($vote == 'UP') ? 1 : -1;
    $updateVotesQuery = "UPDATE posts SET votes = votes + ? WHERE post_id = ?";
    $stmt = $pdo->prepare($updateVotesQuery);
    $stmt->execute([$voteAdjustment, $post_id]);

    // Set success message and userVote
    $response['success'] = true;
    $response['userVote'] = $vote; // The vote the user just casted
    $response['message'] = 'Vote successfully recorded';
} catch (Exception $e) {
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

// Output the response as JSON
echo json_encode($response);
exit;
?>

