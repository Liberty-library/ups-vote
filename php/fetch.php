<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    require_once('../includes/global.php');
	session_start();

global $customCSS;
// Include necessary files and establish a database connection

// Retrieve soc_id and user_id from the request
$socId = $_GET['soc_id'];
$socId = isset($_GET['soc_id']) ? $_GET['soc_id'] : null;

// Fetch CSS code from the database based on soc_id and user_id
$customCSS = get_society_css($socId);

// Return the CSS code
print_r($customCSS);
?>
