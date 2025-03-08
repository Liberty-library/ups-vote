<!-- header.html -->
<?php
require_once '../includes/global.php';

$dsn = 'mysql:host=localhost;dbname=AVideo;charset=utf8mb4';
$username = 'root';
$password = 'Philco01';

try {
    $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $page = $_SERVER['REQUEST_URI'];

    $stmt = $pdo->prepare("INSERT INTO visitors (ip_address, user_agent, page_visited) VALUES (?, ?, ?)");
    $stmt->execute([$ip, $user_agent, $page]);
} catch (PDOException $e) {
    error_log("DB Error: " . $e->getMessage());
}
?>
<div class="header">
<i class="bx bx-chevron-right toggle"></i>

</i>
    <!--<span class="toggle-btn" onclick="toggleSidebar()">☰</span> <!-- Sidebar Toggle Button -->
    
    <!-- LOGO -->
    <img src="/uploads/style/ups.png" alt="Website Logo" class="logo"style="height: 55px; width: 55px;"> <!-- Update 'logo.png' with your actual logo path -->
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Dark</button>

    <!-- TITLE -->
    <span class="site-title">
    		<?php
    		
    		
//if (isset($_SESSION["user"])) {
// Example: Fetch user data from database
//$user = get_user($username); 

//};
session_start();  

if (isset($user) && $user) {
    $_SESSION["user"] = [
        "user_id" => $user["user_id"], // Store user ID
        "username" => $user["username"], // Store username
    ];
}

if (isset($_SESSION["user"])) {
    echo "Signed in as ";
    echo "<a href=\"user\" class=\"navbar-link\">";
    echo $_SESSION["user"]["username"];
    echo "</a>";
} else {
    // User is not logged in (guest)
    // Display content for guests
    echo "Welcome, guest!"; // Example message for guests
}


						?>
						
    
    </span>
    
    <button id="login-btn" class="login-button" onclick="toggleLoginForm()">Login</button>
<!-- LOGIN MODAL -->
<div id="login-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="toggleLoginForm()">&times;</span>
        <h2>Login</h2>
        <form id="login-form" onsubmit="event.preventDefault(); handleLogin();">
            <input type="text" id="username" placeholder="Username" required autocomplete="username">
            <input type="password" id="password" placeholder="Password" required autocomplete="current-password">
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="javascript:void(0);" onclick="toggleRegisterForm()">Register here</a></p>
    </div>
</div>

<!-- REGISTER MODAL -->
<div id="register-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="toggleRegisterForm()">&times;</span>
        <h2>Register</h2>
        <form id="register-form" onsubmit="event.preventDefault(); handleRegister();">
            <input type="text" name="username" id="new-username" placeholder="Username" required autocomplete="username">
            <input type="password" name="password" id="new-password" placeholder="Password" required autocomplete="new-password">
            <input type="password" name="confirmation" id="confirm-password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</div>




</div>
