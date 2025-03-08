<?php
session_start();
require("../includes/global.php");  // Include your global functions

header("Content-Type: application/json");

// Check the action type (login, logout, check session)
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        handleLogin();
        break;
    
    case 'logout':
        handleLogout();
        break;
    
    case 'check_session':
        checkSession();
        break;
    
    default:
        echo json_encode(["success" => false, "message" => "Invalid action"]);
        break;
}

// Handle user login
function handleLogin() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";

        // Check if username and password are provided
        if (empty($username) || empty($password)) {
            echo json_encode(["success" => false, "message" => "Missing credentials"]);
            exit;
        }

        // Get the user from the database
        $user = get_user($username);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;  // Set session data
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid username or password"]);
        }
    }
}

// Handle user logout
function handleLogout() {
    session_destroy();  // Destroy the session
    echo json_encode(["success" => true]);
}

// Check if the user is logged in
function checkSession() {
    if (isset($_SESSION["user"])) {
        echo json_encode(["loggedIn" => true, "username" => $_SESSION["user"]["username"]]);
    } else {
        echo json_encode(["loggedIn" => false]);
    }
}
?>

