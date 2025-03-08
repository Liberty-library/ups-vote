<?php
    // display errors, warnings, and notices
  if (!isset($_SESSION["user"])) {
    $hideButtons = true;
} else {
    $hideButtons = false;
} 

    require_once("config.php");

    require_once("functions.php");
    require_once("db_read_funcs.php");
    require_once("db_write_funcs.php");
    require_once("html_funcs.php");
?>
