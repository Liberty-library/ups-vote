<?php
require_once '../includes/global.php';
$customCSS = get_society_css($soc["soc_id"]);

?>


<script>
	$( document ).ready(function(){
		$(".downvote-active").addClass("btn-danger");
		$(".upvote-active").addClass("btn-success");
		$(".post-upvote").click(function() {
			var hasVoted = $(this).hasClass("btn-success");
		    $.ajax({
			    url: "post_vote.php",
			    data: {
			        post_id: this.value,
			        vote: hasVoted ? "UNVOTE":"UP"
			    },
			    type: "POST",
			    dataType : "json",
			    context: this,
			    success: function( json ) {
			    	if (hasVoted)
			    	{
				    	$(this).removeClass("btn-success").addClass("btn-default");
			    	}
			    	else
			    	{
				    	$("#post-down-"+this.value).removeClass("btn-danger").addClass("btn-default");
				    	$(this).removeClass("btn-default").addClass("btn-success");
				    }
			    },
			    error: function( xhr, status, errorThrown ) {
			        alert( "Login to Vote!!!!" );
			        console.log( "Error: " + errorThrown );
			        console.log( "Status: " + status );
			        console.dir( xhr );
			    }
			});
		});
		$(".post-downvote").click(function() {
			var hasVoted = $(this).hasClass("btn-danger");
		    $.ajax({
			    url: "post_vote.php",
			    data: {
			        post_id: this.value,
			        vote: hasVoted ? "UNVOTE":"DOWN"
			    },
			    type: "POST",
			    dataType : "json",
			    context: this,
			    success: function( json ) {
			    	if (hasVoted)
			    	{
				    	$(this).removeClass("btn-danger").addClass("btn-default");
			    	}
			    	else
			    	{
				    	$("#post-up-"+this.value).removeClass("btn-success").addClass("btn-default");
				    	$(this).removeClass("btn-default").addClass("btn-danger");
			    	}
			    },
			    error: function( xhr, status, errorThrown ) {
			        alert( "You must be logged in to vote!" );
			        console.log( "Error: " + errorThrown );
			        console.log( "Status: " + status );
			        console.dir( xhr );
			    }
			});
		});
	});
</script>

<!-- new post modal -->

<style>
 .page-header { background-image: url("<?php echo $scl[0]["soc_cover_location"]; ?>"); 
 margin: 10px;}
 .link {color:#DCDCDC;}
<?php echo $customCSS; ?> 

</style>
   


<div class="col-md-10 container-fluid">
<?php

$soc = $_SESSION['soc_id'];
/*if ($hideButtons ===true) {
    // This section of code will be hidden when $hideButtons is true (i.e., when you want to hide the buttons)
    echo 'Log in to make a Post';
} else {
    // This section of code will be displayed when $hideButtons is false (i.e., when you want to show the buttons)
   
    echo ' <div>
    <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle-light" type="button" data-toggle="dropdown">New post
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <!--<li><a href="#link-post" class="dropdown-item" data-toggle="modal" data-target="#new-post">Text Post</a></li>
    
    <li><a href="#link-post" class="dropdown-item" data-toggle="modal" data-target="#link-post">Link Post</a> -->
    <li><a href="new-post-link.php?soc=' . $soc["soc_name"] . '">link Post</a></li>
  
    <li><a href="new-post-page.php?soc=' . $soc["soc_name"] . '">Image Post</a></li>
    </li>
  </ul>
  </div>';
}*/
?>
<?php


if ($hideButtons === true): ?>




                     
                               <?php else: ?>                       
        
  <?php endif; ?>   
  <style>
  /* Dropdown Button */
.dropbtn {
  background-color: #010618;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #2d3a5e;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>

<!-- posts -->
<div class="panel panel-default">
	<div class="panel-heading">
<div class="dropdown">
    <a href="/" class="active"></a>
    <button class="dropbtn">Sort by:</button>
    <span class="caret"></span>
    <div class="dropdown-content">
        <a class="<?php echo $currentChoice === 'new' ? 'selected' : 'new'; ?>"
           href="soc_new?soc=<?php echo $soc['soc_name']; ?>">New</a>
        <a class="<?php echo $currentChoice === 'hot' ? 'selected' : 'hot'; ?>"
           href="soc?soc=<?php echo $soc['soc_name']; ?>">Hot</a>
        <a class="<?php echo $currentChoice === 'top' ? 'selected' : 'top'; ?>"
           href="soc_top?soc=<?php echo $soc['soc_name']; ?>">Top</a>
<script>
// Function to update the selected view and button text
function updateSelectedView(selectedView) {
    // Update the variable with the selected view
    localStorage.setItem('selectedView', selectedView);

    // Update the button text to reflect the selected view
    document.querySelector(".dropbtn").textContent = selectedView;
}

// Check if there is a previously selected view in local storage
if (localStorage.getItem('selectedView')) {
    // Retrieve the selected view from local storage
    const selectedView = localStorage.getItem('selectedView');

    // Set the button text to the selected view
    document.querySelector(".dropbtn").textContent = selectedView;
}

// Add an event listener to the dropdown menu
const dropdownLinks = document.querySelectorAll(".dropdown-content a");

dropdownLinks.forEach(link => {
    link.addEventListener("click", function (event) {
        // Update the variable with the selected view
        const selectedView = this.textContent;
        updateSelectedView(selectedView);
    });
});

</script>
</div>

</div>
</div>
	
	<div class="list-group panel-body">
		
		
		<?php 
		
		$_SESSION['soc_name'] = $soc;
		
		require("../includes/global.php");
		global $scl; 
		
			if (count($posts) == 0)
			{
				echo to_html(par("No posts yet."));
			}
			else
			{
				foreach($posts as $p)
				{
					echo "<div class=\"post-row\">";
                                  
					echo to_html(post_summary($p, $soc["soc_name"]));
				
					
		echo "</div>";
					echo "<hr>";
				}
			}
		?>
	</div>
</div>

<style>
	
	.img-thumbnai:hover{
		transform: scale(1.3);
		z-index: 2;
	}
	</style>

