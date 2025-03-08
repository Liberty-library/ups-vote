<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    require_once('../includes/global.php');
    
 

	session_start();



   





    if (!isset($_SESSION['user_id'])) {
    $soc = isset($_SESSION['soc_id']) ? $_SESSION['soc_id'] : null;

    if ($soc !== null) {
        $newCss = $_POST['css_code'];

        // Use your function to update or insert the custom CSS into the soc_css table
        $result = updateSocCss($soc, $newCss);
            apologize("idk.");
        if (updateSocCss($_POST["soc_id"], $_POST["css_code"]) === false)
			redirect("home");
       
       
       } 
       }
       
       $sql = "INSERT INTO soc_css (soc_id, css_text) VALUES (?, ?)";
