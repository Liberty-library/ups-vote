<?php

require 'scrape_config.php'; // Include DB connections

// Check if the database connections exist
if (!$scraper_db || !$ups_vote_db) {
    die("Database connection failed.");
}

// Fetch new articles with a valid summary from the scraper DB (pending status)
$sql = "SELECT * FROM scrapper.articles 
        WHERE status = 'pending' 
         ORDER BY created_at DESC"; // Adjusted limit to fetch more articles

$result = $scraper_db->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Sanitize inputs
        $title = $ups_vote_db->real_escape_string($row['title'] ?? '');
        $author = $ups_vote_db->real_escape_string($row['author'] ?? '');
        $category = $ups_vote_db->real_escape_string($row['category'] ?? '');
        $content = $ups_vote_db->real_escape_string($row['content'] ?? '');
        $summary = $ups_vote_db->real_escape_string($row['summary'] ?? '');
        $url = $ups_vote_db->real_escape_string($row['url'] ?? '');
        $source = $ups_vote_db->real_escape_string($row['source'] ?? '');
        $published_at = $row['published_at'] ?? null;
        $created_at = $row['created_at'] ?? 'NOW()';
        $status = 'imported'; // Mark as imported after insertion
        $image_url = $ups_vote_db->real_escape_string($row['image_url'] ?? '');
$url = preg_replace('/\?.*/', '', $url); // Removes query parameters
$url = trim($url); // Removes leading/trailing spaces
        // Check if the article already exists based on URL
        $check = "SELECT * FROM articles WHERE url = '$url'";
        $existing_article = $ups_vote_db->query($check);
        if ($existing_article && $existing_article->num_rows > 0) {
            echo "";
            continue; // Skip importing this article
        }

        // Insert into the `articles` table
        $insert = "INSERT INTO articles (title, author, category, content, summary, url, source, published_at, created_at, image_url) 
                   VALUES ('$title', '$author', '$category', '$content', '$summary', '$url', '$source', 
                           " . ($published_at ? "'$published_at'" : "NULL") . ", 
                           " . ($created_at !== 'NOW()' ? "'$created_at'" : "NOW()") . ", 
                            '$image_url')";

        if ($ups_vote_db->query($insert)) {
            echo "";
            
            // Mark article as 'imported' in scraper DB
            $update = "UPDATE scrapper.articles SET status = 'imported' WHERE article_id = " . intval($row['article_id']);
            if ($scraper_db->query($update)) {
                echo "";
            } else {
                echo "Error updating status for article ID " . intval($row['article_id']) . ": " . $scraper_db->error . "\n";
            }
        } else {
            echo "Error importing article '$title': " . $ups_vote_db->error . "\n";
        }
    }
} else {
    echo "";
}

$scraper_db->close();
$ups_vote_db->close();

?>

