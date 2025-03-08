<?php
function make_post($s, $title, $text = null, $image_loction=null)
{
    // if (am_banned_soc($s) || am_banned())		apologize("Access Denied.");
    if(!$title)									apologize("Post must have a title");
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Handle file upload and get the image location
        $image_location = 'uploades' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_location);
    }


    return tquery(" insert into posts(user_id, soc_id, title, text, image_location)
                    values(?, ?, ?, ?, ?)",
                    [
                        $_SESSION["user"]["user_id"],
                        $s["soc_id"],
                        $title,
                        $text,
                        $image_location
                    ]
                    );
