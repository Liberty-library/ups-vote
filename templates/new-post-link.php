<html>
	<?php
	
$soc = $_SESSION['soc_name'];
?>


        
        <body>
        <div class="container-fluid">
        
        <form action=<?php echo "\"new_post.php?soc=".$soc["soc_name"]."\"";?> method="post" enctype="multipart/form-data">
  

       
  <!--<form id="my-dropzone" class="dropzone" action=<?php echo "\"new_post.php?soc=".$soc["soc_name"]."\"";?> method="post" enctype="multipart/form-data">
  <DIV class="dz-message needsclick">    
        Drop files here or click to upload.<BR>
     
      </DIV>
          <!-- Optional: Add other input fields for your post (e.g., title, text) -->
    <!--<input type="text" name="title" placeholder="Post Title">--->
    <div class="mb-3 mt-3">
    <label for="email" class="form-label">Post Title:</label>
    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
     </div>
    





     <div class="mb-3">
    <label for="url">Add a Link:</label>
    
<input type="link" class="form-control" rows="1" id="text" name="text" placeholder="Enter link"> </input>
   <!--<textarea name="text" placeholder="Post Text (optional)"></textarea>--->
   <?php  
   
   function convertUrlsToLinks($text) {
    $pattern = '/(https?:\/\/\S+)/';
    $replacement = '<a href="$1" target="_blank">$1</a>';
    $text = preg_replace($pattern, $replacement, $text);
    return $text; }


$text = convertUrlsToLinks($text);

?>
   
   </div>
     <div class="mb-3">
     <label for="image">Add a Image (optional):</label>
    <input type="file" id="image" name="image">
        </div>
     <div class="mb-3">
 <button type="submit" class="btn btn-success">Submit post</button>
    <!--<button btn btn-primarytype="submit">Submit Post</button>-->
  </form>


  <!--<script>
    Dropzone.autoDiscover = false; // Prevent Dropzone from auto-discovering forms
    const myDropzone = new Dropzone("#my-dropzone", {
      paramName: "image", // Name of the file input field
      maxFilesize: 5, // Max file size in MB
      acceptedFiles: ".jpg,.jpeg,.png,.gif", // Allowed file types
      
    
   });
   
   myDropzone.on("addedfile", function(file) {
  if (!file.type.match(/image.*/)) {
    // This is not an image, so Dropzone doesn't create a thumbnail.
    // Set a default thumbnail:
    myDropzone.emit("thumbnail", file, "uploads/th/");

    // You could of course generate another image yourself here,
    // and set it as a data url.
  }
});


</script>-->
<style>
  .container-fluid {
   max-width:600px;
}
</style>
</body>
</html>

