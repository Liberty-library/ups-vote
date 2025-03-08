<?php
require("../includes/global.php");

header("Content-Type: application/json");

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (empty($username) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Missing credentials"]);
        exit;
    }

    $user = get_user($username);

    if ($user && password_verify($password, $user["password"])) {
        session_start();
        $_SESSION["user"] = $user;
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid username or password"]);
    }
}
?>
