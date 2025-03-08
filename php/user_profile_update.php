<?php

	require("../includes/global.php");

	verify_access();

	if (!isset($_GET["u"]) || $_GET["u"] == $_SESSION["user"]["username"])
	{
		$u = refresh_self();
		$self = true;
	}
	else
	{
		$u = get_user($_GET["u"]);
		$self = false;
	}

	if ($u === false)
		apologize("Invalid username.");

	$pg = "user_profile_update.php?u=".$u["username"];
render("user_profile_update.php");
	

	if (isset($_GET["view"]) && array_key_exists($_GET["view"], $umap))
		require($umap[$_GET["view"]]);
	else
		require("profile.php");
?>
