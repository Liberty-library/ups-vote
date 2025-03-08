<?php

    require("soc_common.php");
$text = turnUrlIntoHyperlink($text);
    // sanity checks
	if (empty($_POST['title']))
		apologize("Post must have a title.");

	empty($_POST['title']) || $text = $_POST['text'];
	
	$url = $_POST['url'];
	$uploadDirectory = "uploads/";
$filename = uniqid() . '_' . $_FILES['image']['name'];
$targetFile = $uploadDirectory . $filename;
	




	// make post
	if (make_post($soc, $_POST['title'], $text, $url) === false)
		apologize("Failed to submt post.");
        

	redirect("soc.php?soc=".$soc["soc_name"]);


?>

