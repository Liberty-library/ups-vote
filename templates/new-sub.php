<html>
	<?php
	
$soc = $_SESSION['soc_name'];
?>


        
        <body>
  <form action=<?php echo "\"new_sub_cover.php?soc=" . $soc["soc_name"] . "\""; ?> method="post" enctype="multipart/form-data">
    <div class="container-fluid">
      <div class="mb-3">
        <label for="soc_cover_location">Add a Cover Image:</label>
        <input type="file" id="soc_cover_location" name="socimage">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-success" id="new_post">Submit</button>
      </div>
    </div>
  </form>
</body>
<?php
// At the beginning of new_sub_cover.php, add the following code to handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your existing code to handle the form submission here
    // ...

    // After successfully processing the form, redirect to the "soc" it was opened from
    $redirect_url = 'soc?soc=' . $soc["soc_name"] . "\""; 
    header('Location: ' . $redirect_url);
    exit(); // Make sure to exit to prevent further script execution
}

?>

 
<style>
  .container-fluid {
   max-width:600px;
}
</style>
</body>
</html>

