<?php
// society_posts.php
require_once '../includes/global.php';
session_start();
// Database connection settings
$host = 'localhost';
$dbname = 'AVideo';
$username = 'root';
$password = 'Philco01';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Function to generate a unique guest ID
function generateGuestID() {
    // Generate a unique guest ID, here we use a combination of random numbers and characters
    return 'guest_' . bin2hex(random_bytes(8)); // Generates a random 16-character hex string
}




if (isset($_SESSION['user'])) {
        // User is logged in, clear the guest session data.
        unset($_SESSION['guest_id']);
    } else {
        // User is not logged in, check if it's a guest.
        if (!isset($_SESSION['guest_id'])) {
            // This is a guest, so set guest-specific data.
            $_SESSION['guest_id'] = generateGuestID();

            // Insert the guest ID into the "guest" table
            insertGuestID($pdo, $_SESSION['guest_id']);
        }
    }
} catch (PDOException $e) {
    // Handle database connection errors here
    die("Database error: " . $e->getMessage());
}

// Fix applied here: Check if user is logged in, else use guest ID
if (isset($_SESSION["user"]) && isset($_SESSION["user"]["user_id"])) {
    // User is logged in
    $userIdOrGuestId = $_SESSION["user"]["user_id"];
} else {
    // User is a guest
    $userIdOrGuestId = $_SESSION['guest_id'];  // Use guest ID if user is not logged in
}

$societyName = isset($_GET['soc']) ? $_GET['soc'] : 'default';

// Prepare SQL query to retrieve soc_id based on society name
$sql = "SELECT soc_id FROM societies WHERE soc_name = :societyName";

// Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':societyName', $societyName, PDO::PARAM_STR);
$stmt->execute();

// Fetch the result
$society = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$society) {
    die("Error: Society not found.");
}

$societyId = $society['soc_id']; // Extract soc_id

// Print society info for debugging

// Fetch posts for this society
$posts = get_posts_2($societyId, 0, 200);

function get_posts_2($societyId, $offset = 0, $lim = 200)
{
    return query("
        SELECT
            p.*,
            u.username,
            u.image AS user_thumbnail,  -- Add this line to select the user's thumbnail
            IF(p.status='STICKIED', 10, 0) AS `rank`,  -- Use backticks around 'rank'
            SUM(IF(v.vote='UP', 1, IF(v.vote='DOWN', -1, 0))) AS votes,
            (    
                (SELECT COUNT(*) FROM post_views w WHERE w.post_id = p.post_id) +
                (SELECT COUNT(*) FROM all_views av WHERE av.post_id = p.post_id)
            ) AS views,
            (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.post_id) AS comments,
            (SELECT pv.vote FROM post_votes pv WHERE pv.post_id = p.post_id AND pv.user_id = ?) AS vote
        FROM posts p
            JOIN societies s ON p.soc_id = s.soc_id
            LEFT JOIN post_votes v ON p.post_id = v.post_id
            JOIN users u ON p.user_id = u.user_id
            LEFT JOIN post_views w ON p.post_id = w.post_id
            LEFT JOIN all_views av ON p.post_id = av.post_id
        WHERE p.soc_id = ? AND p.status != 'DELETED'
        GROUP BY p.post_id
        ORDER BY `rank` DESC, votes DESC, views DESC
        LIMIT ?
        OFFSET ?
    ", $_SESSION["user"]["user_id"],  // User ID for vote
       $societyId,                    // Correct soc_id
       $lim,                          // Limit number of posts
       $offset                        // Offset for pagination
    );
}


?>

