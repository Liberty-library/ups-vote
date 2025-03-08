<?php
// Start or resume the session.
//session_start();

// Function to generate a unique guest ID.
function generateGuestID() {
    return uniqid('guest_', true);
}

// Database connection settings
$host = 'localhost';
$dbname = 'AVideo';
$username = 'root';
$password = 'Philco01';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if (isset($_SESSION['user_id'])) {
        // User is logged in, clear the guest session data.
        unset($_SESSION['guest_id']);
    } else {
        // User is not logged in, check if it's a guest.
        if (!isset($_SESSION['guest_id'])) {
            // This is a guest, so set guest-specific data.
            $_SESSION['guest_id'] = generateGuestID();

            // Insert the guest ID into the "guest" table
            insertGuestID($pdo, $_SESSION['guest_id']);
        }
    }
} catch (PDOException $e) {
    // Handle database connection errors here
    die("Database error: " . $e->getMessage());
}

if (isset($_SESSION["user"]["user_id"])) {
    // User is logged in
    $userIdOrGuestId = $_SESSION["user"]["user_id"];
} else {
    // User is a guest
    // Replace 'guest_123456789' with the actual guest ID
    $userIdOrGuestId = $_SESSION['guest_id'];
}
?>

<!doctype html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta name="theme-color" content="dark">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="referrer" content="never">
<meta name="referrer" content="no-referrer">
<link rel="preconnect" href="https://fonts.gstatic.com">
<meta http-equiv="cleartype" content="on">
<meta name="MobileOptimized" content="320">
<?php
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
if ($currentPage === "home") {
$metaKeywords = "";
$metaDescription = "";
}
else {
$metaKeywords = $post["title"];
$pageTitle = $soc["soc_name"];
$metaDescription = $soc["soc_name"];
$thumbn = $post["image_location"];
}


// Inside your HTML head section
//echo "<title>$pageTitle</title>";
echo "<meta name='description' content='$metaDescription'>";
echo "<meta name='keywords' content='$metaKeywords'>";
$escapedThumbn = htmlspecialchars($thumbn, ENT_QUOTES, 'UTF-8');
$escapedMetaKeywords = htmlspecialchars($metaKeywords, ENT_QUOTES, 'UTF-8');

echo "<meta name='twitter:image' content='https://www.ups-vote.com/$escapedThumbn'>";
echo "<meta name='twitter:title' content='$escapedMetaKeywords'>";
?> 

<meta name="HandheldFriendly" content="True">
<meta name="apple-mobile-web-app-capable" content="yes">
<script src="https://vjs.zencdn.net/8.6.1/video.js"></script>                                                  <link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<link rel="stylesheet" href="css/theme.dark.css" type="text/css" media="all"> 
<link href="css/css/all.css" rel="stylesheet"> 
<script src="js/jquery-2.1.3.min.js"></script>


<script src="js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="css/dark6.css" type="text/css" media="all">
<link rel="icon" type="image/x-icon" href="../uploads/style/favicon.ico">

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="style47.css">
    <link rel="stylesheet" href="styles.css">

<title><?php echo $title; ?></title>

		 <nav class="navbar navbar-inverse navbar-static-top">
		 <div class="navbar-center">
            <span class="navbar-text"><strong><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></strong></span>
        </div>
	
        <div class="speed-container">
        <strong>Page Load Speed:</strong> <span id="speedDisplay">Calculating...</span>
    </div>
    
				<div class="navbar">
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <a class="navbar-brand" href="home">
					  
					  <img src="uploads/style/ups1.png" width="75" height="90" class="d-inline-block align-top" alt="up's vote">
					 
					  </a>
					</div>
<style>

.navbar-center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
    font-weight: bold;
    color: white;
}
.speed-container {
    position: absolute;
    right: 20px; /* Align to the far right */
    top: 50%;
    transform: translateY(-50%); /* Center vertically */
    color: white;
    font-weight: bold;
    background-color: rgba(0, 0, 0, 0.7); /* Optional background */
    padding: 5px 10px;
    border-radius: 5px;
}

.uname {
    color: #1a8119;
    font-weight: bold;
}
.row {display: flex;
			
    margin-right: 5px;
}
iframe {border:none;}
</style>
<style>
.btn-default {
    color: #fff;
    background-color: #42424200;
    border-color: #42424200;
}
.btn-success {
    color: #fff;
    background-color: #77b300;
    border-color: #77b300;
}

.vote-container {max-width: 30px;
}
.container-fluid-thumb:hover{
		transform: scale(3);
		z-index: 2;
		overflow: visible;
	}
	.img-thumbnail {
    max-width: 100%;
    min-width: 100%;
    padding: 0;
    /* display: flex; */
    background-color: #000000;
    z-index: 1000;
    vertical-align: super;
    border: 1px solid #000000;
    border-radius: 4px;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    display: inline-block;
    overflow: visible;
}
	.panel-body{opacity: 0.95;}
	.panel-default {opacity: 0.9;
    
}
	.navbar-link-log:hover{
		transform: scale(1.3);
		z-index: 2;
	}
	@media (max-width: 700px) {
	
   .d-inline-block {
   height: 6vh;
   width: 6vh;}	
   .panel-success{
       display: none;
        /* Add more responsive styles if necessary */
    }
    .navbar {
    width: 100%;
    flex-direction: row;
    justify-content: center;
    display: -webkit-inline-box;
}
}

@media (max-width: 1200px) {
	
   .d-inline-block {
   height: 8vh;
   width: 8vh;}	
   .panel-success{
       display: none;
        /* Add more responsive styles if necessary */
    }
    .navbar {
    width: 100%;
    flex-direction: row;
    justify-content: center;
    display: -webkit-inline-box;
}
}
	</style>

    <!-- Your existing head content -->

    <!-- Add the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /* Your existing styles */

        .thumbnail-container {
            cursor: pointer;
        }

        .expanded-thumbnail {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            display: none;
            z-index: 1000;
        }
    </style>

    <script>
        $(document).ready(function() {
            $(".thumbnail-container").click(function() {
                // Get the thumbnail URL from the data-thumbnail-url attribute
                var thumbnailUrl = $(this).data("thumbnail-url");

                // Create an expanded thumbnail and append it to the body
                var $expandedThumbnail = $('<div class="expanded-thumbnail"><img src="' + thumbnailUrl + '" alt="Expanded Thumbnail"></div>');
                $("body").append($expandedThumbnail);

                // Show the expanded thumbnail
                $expandedThumbnail.slideDown();

                // Hide the expanded thumbnail when clicked
                $expandedThumbnail.click(function() {
                    $(this).slideUp();
                });
            });
        });
    </script>
    <script>
    function measureSpeed() {
    let startTime, endTime;
    let testImage = new Image();
    let fileSize = 100000; // Approximate file size in bytes (100 KB)

    testImage.onload = function () {
        endTime = (new Date()).getTime();
        let duration = (endTime - startTime) / 1000; // Convert to seconds
        let speedMbps = ((fileSize * 8) / (duration * 1024 * 1024)).toFixed(2); // Convert to Mbps

        document.getElementById("speedDisplay").innerText = speedMbps + " Mbps";
    };

    testImage.onerror = function () {
        document.getElementById("speedDisplay").innerText = "Error";
    };

    startTime = (new Date()).getTime();
    testImage.src = "uploads/1739139396_67a9294488aa7.jpg?" + startTime; // Prevent caching
}

// Run speed test after page loads
window.onload = function () {
    measureSpeed();
};
    </script>


	
<ul class="nav navbar-nav">
			    	
					<p class="navbar-text navbar-right">
						<?php
							if (isset($_SESSION["user"]))
							{
								echo "Signed in as ";
								echo "<a href=\"user\" class=\"navbar-link\">";
								echo $_SESSION["user"]["username"];
								echo "</a> (";
								echo "<a href=\"logout\" class=\"navbar-link\" >logout";
								echo "</a>)";
							}
							 else {
    // User is not logged in (guest)
    // Display content for guests
    echo "Welcome, guest!"; // Example message for guests
    echo "</a> (";
								echo "<a href=\"login\" class=\"navbar-link-log\" >Login";
								echo "</a>)";
}


						?>
						<?php
						

    // display errors, warnings, and notices
  if (!isset($_SESSION["user"])) {
    $hideButtons = true;
} else {
    $hideButtons = false;
} 
?>
					</p>
			    		<li>
							<?php
								if (isset($_SESSION["user"]) && $_SESSION["user"]["status"] == "ADMIN")
								{
									echo "<a href=\"admin_panel\" class=\"navbar-link\">";
										echo "<span class=\"glyphicon glyphicon-cog\"> </span>";
										echo " Admin Panel";
									echo "</a>";
								}
							

							?>

						</li>
					</ul>
				</div><!-- /.container-fluid -->
		</nav>
		
	



	</head>
	
	<body>
<!--<?php
    if (isset($_SESSION['user_id'])) {
        // User is logged in, so you can display a different message or content.
        echo "You are a logged-in user.";
    } elseif (isset($_SESSION['guest_id'])) {
        // User is a guest, so display the guest message.
        echo "You are a guest with ID: " . $_SESSION['guest_id'];
    }
    ?> --->
 <!-- <main class="flow content-grid"> -->
		<div class="body"> 
	        <!--<div class="well"> -->
	      


    



		

		
 
