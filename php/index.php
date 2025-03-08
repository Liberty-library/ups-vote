<?php
require_once '../includes/global.php';
require_once 'import-art.php';
session_start();
$societies = [];
$result = query("
SELECT s.soc_name, sc.soc_cover_location
FROM societies s
LEFT JOIN soc_cover sc ON s.soc_id = sc.soc_id
WHERE s.status != 'DELETED'
");

if ($result) {
    foreach ($result as $row) {
        // Prepend '../' to the cover location path
        $societies[] = [
            'name' => $row['soc_name'],
            'image_location' => '../' . $row['soc_cover_location']  // Add '../' to the image path
        ];
    }
}

 //if (empty($societies)) {
    //echo "No societies found!";
//} else {
   // echo "<script>var societies = " . json_encode($societies) . ";</script>";
//}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark">
    <title>Up's Vote</title>
    <link rel="icon" type="image/x-icon" href="uploads/style/favicon.ico">
   <link rel="stylesheet" href="style47.css">  
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="box.css">

<link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
  <!--  <link rel="stylesheet" href="gui-grid.css">   -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
a {
    color: #b7c7b5;
    }
.column {
left:10%;
position: inherit;
top:150%;
}

aside {
float:right;
}
</style>
   <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="/uploads/style/ups-head.PNG" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Up's Vote</span>
                    <span class="profession">Menu</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                <li class="nav-link">
    <div id="sorting-container" class="sorting-container">
        <label for="sortSelector">
            <i class='bx bx-sort icon'></i>
            <span class="text nav-text">Sort by:</span>
        </label>
        <select id="sortSelector">
            <option value="votes">Most Upvoted</option>
            <option value="date">Newest</option>
        </select>
    </div>
</li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

             

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>
                   <?php if (isset($_SESSION["user"]) && isset($_SESSION["user"]["user_id"])): ?>
    <li class="nav-link">
        <button id="newPostButton" onclick="openModal()"  title="Create A New Post">
            <i class='bx bx-message-dots'></i>
            <span class="text nav-text">Add New Post</span>
        </button>
    </li>
<?php endif; ?>
      

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>



<body class="theme-sml">

    <!-- HEADER -->
    <div id="header-container"></div>
    

    <!-- Modal for New Post -->
<div id="newPostModal" class="new-post-modal modal">
    <div class="modal-content">
        <h2>Create a New Post</h2>

   <form id="newPostForm" method="POST" enctype="multipart/form-data">
    <!-- Dropdown to choose society -->
    <label for="societySelect">Select Society:</label>
    <select id="societySelect" name="soc_id" required>
        <!-- Populate this dropdown dynamically -->
        <option value="">Select a society</option>
        
   <?php
// Check if the user is logged in
if (isset($_SESSION["user"]) && isset($_SESSION["user"]["user_id"])) {
    // Fetch subscribed societies for the current user
    $subscribed_socs = get_subbed_socs();

    // Loop through the societies and populate the options
    foreach ($subscribed_socs as $society) {
        // Use get_society_by_id to fetch full society data
        $society_data = get_society_by_id($society['soc_id']); 

        if ($society_data) {
            // Populate dropdown with the society name
            echo '<option value="' . $society['soc_id'] . '">' . htmlspecialchars($society_data['soc_name']) . '</option>';
        }
    }
} 
?>

    </select>

    <!-- Dropdown to choose post type -->
    <label for="postType">Select Post Type:</label>
    <select id="postType" name="post_type" onchange="togglePostFields()">
        <option value="text">Text</option>
        <option value="image">Image</option>
        <option value="video">Video</option>
        <option value="twitter">Twitter Embed</option>
    </select>

    <!-- Common Input: Title -->
    <div>
        <label for="postTitle">Title:</label>
        <input type="text" id="postTitle" name="title" required="">
    </div>

    <!-- Text Post -->
    <div id="textFields">
        <label for="postText">Text:</label>
        <textarea id="postText" name="text" placeholder="Write your post here"></textarea>
    </div>

    <!-- Image Upload -->
    <div id="imageFields" style="display: none;">
        <label for="postImage">Upload Image:</label>
        <input type="file" id="postImage" name="media" accept="image/*">
    </div>

    <!-- Video Upload -->
    <div id="videoFields" style="display: none;">
        <label for="postVideo">Upload Video:</label>
        <input type="file" id="postVideo" name="media" accept="video/*">
    </div>

    <!-- Twitter Embed -->
    <div id="twitterFields" style="display: none;">
        <label for="postTwitter">Twitter Post URL:</label>
        <input type="text" id="postTwitter" name="twitter_url" placeholder="Enter tweet URL">
    </div>

    <button type="submit">Submit Post</button>
    <button type="button" class="close-button" onclick="closeModal()">Cancel</button>
</form>
    </div>
</div>




   

 

    <!-- MAIN CONTENT -->
    <div class="main-content theme-sml" id="main-content">
        <h1>Pages</h1>
         <div id="societies-data" data-societies='<?php echo json_encode($societies); ?>' style="display:none;"></div>
<hr>

    <!-- Carousel container -->
    <div id="carousel" class="carousel">
    
    <div class="carousel--wrap">
        <!-- Carousel items will be dynamically inserted here -->
    
    </div>
    
   <div class="carousel--progress-bar"></div>
</div>
<hr>
        <div id="news-feed-container" class="container">
            <h1>Latest Posts</h1>
            <div id="sorting-container">
    <label for="sortSelector" style="color: white;">Sort by: </label>
    <select id="sortSelector">
        <option value="votes">Most Upvoted</option>
        <option value="date">Newest</option>
    </select>
</div>
            <div id="news-feed" class="column"></div> <!-- Posts injected here -->
         
        </div>
        

    </div>
    
    <div id="artical-feed-title" class="artical-feed-title">
                <h2> News Stream: </h2>
        
        <aside>
            <div id="artical-feed" class="artical-feed">
                
            </div> <!-- Posts injected here -->
        </aside>
        </div>
        
       </div>
                <button id="load-more" class="post-more" onclick="loadMorePosts()">Load More</button>
   <script>
    var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
</script>
    <script src="side-script.js"></script>
     <script src="script.js"></script>
       <script src="articles.js"></script>
</body>
  <script src="new-post.js"></script>
</html>

