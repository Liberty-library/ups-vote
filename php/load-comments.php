<?php
// load-comments.php

// Include necessary files
require("../includes/global.php");  // Include your global functions


// Get the postId from the query string
$postId = $_GET['postId'];

// Call your existing function to fetch the comments
$comments = get_comments(['post_id' => $postId]);
$commentsHtml = build_comment_tree($comments, $mod);
// Return the comments as JSON
echo json_encode(['success' => true, 'comments' => $comments]);


?>
