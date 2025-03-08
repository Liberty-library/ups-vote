<?php

    // configuration
    require("../includes/global.php"); 
	
	verify_access(true);

	$subs = get_subbed_socs();
$feed = get_news_feed(20, 0, isset($_SESSION["user"]["user_id"]) ? $_SESSION["user"]["user_id"] : null);
render("home.php", ["title" => "Up's Vote", "subs" => $subs, "posts" => $feed]);

  $posts = get_all_posts( isset($_GET["page"]) ? $_GET["page"]:0, 100);
?>
