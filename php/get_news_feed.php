<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection and functions
require_once '../includes/global.php'; // Adjust the path if necessary

// Get the parameters
$lim = isset($_GET['lim']) ? (int)$_GET['lim'] : 10;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'votes'; // Default to sorting by votes

// Call the function with the sorting method
$posts = get_news_sort($lim, $offset, $sort_by);

// Return the posts as JSON
header('Content-Type: application/json');
echo json_encode(['posts' => $posts]);
?>
