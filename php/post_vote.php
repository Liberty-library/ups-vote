<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    require_once('../includes/global.php');
	session_start();

if (isset($_POST)) {
    $curr_vote = ($v = post_rel($_POST["post_id"])) ? $v["vote"] : "NONE";
    $json = [];
    if ($curr_vote == $_POST["vote"]) {
        $json["msg"] = "Already voted.";
    }
    switch ($_POST["vote"]) {
        case 'UP':
            $json["res"] = upvote_post($_POST["post_id"]);
            break;
        case 'DOWN':
            $json["res"] = downvote_post($_POST["post_id"]);
            break;
        case 'UNVOTE':
            $json["res"] = unvote_post($_POST["post_id"]);
            break;
    }
    echo json_encode($json);
}

?>
