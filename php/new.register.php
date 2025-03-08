<?php

    // configuration
    require("../includes/global.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
    $password = $_POST["password"];
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) 
        apologize("Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character."); 
    
        if (empty($_POST["username"]))						apologize("You must provide a username.");
        if (empty($_POST["password"]))						apologize("You must provide a password.");
        if (empty($_POST["confirmation"]))					apologize("You need to confirm your password by re-typing it.");
        if ($_POST["password"] != $_POST["confirmation"])	apologize("Password and confirmation do not match.");
        
		
		// create new user account
		if (make_user($_POST["username"], $_POST["password"]) === false)
			apologize("Username already exists.");		
		
		redirect("login.php");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
?>
