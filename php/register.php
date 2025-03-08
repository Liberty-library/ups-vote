<?php
require("../includes/global.php");  // Include your global functions

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmation = $_POST["confirmation"];

    // Validate the inputs
    if (empty($username)) {
        echo json_encode(["success" => false, "message" => "You must provide a username."]);
        exit;
    }
    if (empty($password)) {
        echo json_encode(["success" => false, "message" => "You must provide a password."]);
        exit;
    }
    if (empty($confirmation)) {
        echo json_encode(["success" => false, "message" => "You need to confirm your password by re-typing it."]);
        exit;
    }
    if ($password != $confirmation) {
        echo json_encode(["success" => false, "message" => "Password and confirmation do not match."]);
        exit;
    }
    // Validate the password strength
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo json_encode(["success" => false, "message" => "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character."]);
        exit;
    }

    // Check if the username already exists
    if (get_user_by_username($username)) {
        echo json_encode(["success" => false, "message" => "Username already exists."]);
        exit;
    }

    // Insert new user into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    if (register_new_user($username, $hashed_password)) {
        echo json_encode(["success" => true, "message" => "Registration successful! You can now log in."]);
    } else {
        echo json_encode(["success" => false, "message" => "An error occurred while registering. Please try again."]);
    }

} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}

// Function to check if a username already exists
function get_user_by_username($username) {
    global $db;
    $rows = query("SELECT * FROM users WHERE username = ?", $username);
    return count($rows) > 0 ? true : false;
}

// Function to register a new user
function register_new_user($username, $password) {
    global $db;
    return query("INSERT INTO users (username, password) VALUES (?, ?)", $username, $password);
}
?>

