<?php
require("../includes/global.php");
session_start();
$soc = $_SESSION['soc_name'];



if (!isset($_FILES["socimage"])) {
    redirect("home.php");
}

$soc_name = $soc; // Assuming you pass the "soc" parameter in the URL

if (make_sub_cover($_FILES["socimage"], $soc_name) === false) {
   
}

redirect("soc.php?soc=" . $soc_name);
?>
