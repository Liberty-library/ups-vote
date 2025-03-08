
<?php



$uploadDir = 'uploads';



if (!empty($_FILES)) {

 $tmpFile = $_FILES['file']['tmp_name'];

 $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
 $image_location = $filename;

 move_uploaded_file($tmpFile,$filename);
 
 

}



?>
