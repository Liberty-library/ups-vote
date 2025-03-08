<?php
 
include 'config.php';

session_start();

$user_id = $_SESSION["user"]["user_id"];

if(!isset($user_id)){
   header('location:login.php');
}
if (!isset($_GET["u"]) || $_GET["u"] == $_SESSION["user"]["username"])
	{
		$u = refresh_self();
		$self = true;
	}
	else
	{
		$u = get_user($_GET["u"]);
		$self = false;
	}

	if ($u === false)
		apologize("Invalid username.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>user page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<h1 class="title"> <span>user</span> profile page </h1>

<section class="profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE user_id = ?");
      $select_profile->execute([$user_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

   <div class="profile">
      <img src="uploaded_img/<?= $u['image']; ?>" alt="">
      <h3><?php echo $u["username"]; ?> </h3>
      <a href="user_profile_update" class="btn">update profile</a>
     <<a href="logout.php" class="delete-btn">logout</a>
      <div class="flex-btn">
         <a href="home" class="option-btn">Home</a>
         
      </div>
   </div>

</section>

</body>
</html>
