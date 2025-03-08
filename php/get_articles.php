<?php
 require("../includes/global.php"); 
header("Content-Type: application/json");
  

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 50;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$articles = get_article_feed($limit, $offset);

echo json_encode([
    "success" => true,
    "articles" => $articles
]);
?>

