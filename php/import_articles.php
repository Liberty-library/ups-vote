<?php

require 'scrape_config.php'; // Include DB connections

// Check if the database connections exist
if (!$scraper_db || !$ups_vote_db) {
    die("Database connection failed.");
}

// Function to download and save the image locally
function download_image($image_url, $save_path) {
    // Initialize cURL session
    $ch = curl_init($image_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    // Execute the cURL session
    $image_data = curl_exec($ch);
    
    // Check for errors
    if ($image_data === false) {
        echo "Failed to download image from $image_url.\n";
        return false;
    }
    
    // Get the image file extension
    $image_extension = pathinfo($image_url, PATHINFO_EXTENSION);
    
    // Generate a unique file name for the image
    $image_name = uniqid('img_') . '.' . $image_extension;
    
    // Save the image data to the local server
    $full_save_path = $save_path . $image_name;
    file_put_contents($full_save_path, $image_data);
    
    // Close the cURL session
    curl_close($ch);
    
    // Return the relative path to the saved image
    return '/uploads/' . $image_name;
}

// Fetch new articles with a valid summary from the scraper DB (pending status)
$sql = "SELECT * FROM scrapper.articles 
        WHERE status = 'pending' 
        AND summary IS NOT NULL 
        AND summary != '' 
        AND summary != 'No summary available' 
        ORDER BY created_at DESC 
        LIMIT 10";

$result = $scraper_db->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Ensure no null values are passed to mysqli::real_escape_string
        $title = $ups_vote_db->real_escape_string($row['title'] ?? '');
        $summary = $ups_vote_db->real_escape_string($row['summary'] ?? '');
        $image_url = $ups_vote_db->real_escape_string($row['image_url'] ?? '');
        $soc_id = is_numeric($row['category']) ? intval($row['category']) : 1; // Default category if invalid
        $user_id = is_numeric($row['user_id']) ? intval($row['user_id']) : 1; // Default user_id if invalid
        
        // Check if summary is valid before inserting
        if (!empty($summary) && $summary != "No summary available") {
            // Download the image and save it locally
            $image_path = null;
            if ($image_url) {
                $image_path = download_image($image_url, '/var/www/html/php/uploads/');
            }

            // If the image was downloaded successfully, insert the data
            if ($image_path) {
                // Insert into Up’s Vote posts table
                $insert = "INSERT INTO posts (title, image_location, text, soc_id, time, user_id) 
                           VALUES ('$title', '$image_path', '$summary', '$soc_id', NOW(), '$user_id')";

                if ($ups_vote_db->query($insert)) {
                    echo "Imported: $title\n";

                    // Mark article as 'imported' in scraper DB
                   // $update = "UPDATE scrapper.articles SET status = 'imported' WHERE article_id = " . intval($row['article_id']);
                   // $scraper_db->query($update);
                } else {
                    echo "Error importing: " . $ups_vote_db->error . "\n";
                }
            } else {
                echo "Skipping image for $title\n";
            }
        } else {
            echo "Skipped: $title - No valid summary.\n";
        }
    }
} else {
    echo "No new articles found with valid summaries.";
}

$scraper_db->close();
$ups_vote_db->close();
?>

