<?php
// Up’s Vote Database
$ups_vote_db = new mysqli("localhost", "root", "Philco01", "AVideo");

// Scraper Database
$scraper_db = new mysqli("192.168.1.146", "scrapper", "Philco01", "scrapper");

// Check connections
if ($ups_vote_db->connect_error) {
    die("Up’s Vote DB Connection failed: " . $ups_vote_db->connect_error);
}

if ($scraper_db->connect_error) {
    die("Scraper DB Connection failed: " . $scraper_db->connect_error);
}
?>
