<?php

    // configuration
    require("../includes/global.php"); 
	
	verify_access();
	
$soc = $_SESSION['soc_name'];
	
	
	
	render("new-post-page.php");
  
?>

    

    


