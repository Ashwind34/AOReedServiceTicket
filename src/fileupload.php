<?php

if(!empty($_FILES['image']['name'])) {

    $error = '';
    
    //assign elements in $_FILES global array to variables

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    //extract file extension from file name

    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");

    //make sure file has an image extension
    
    if(in_array($file_ext,$extensions) === false) {
        $error="Extension not allowed, please choose a JPEG or PNG file.";
    }

    //make sure file size < 5MB
    
    if($file_size > 5000000) {
        $error='File size must be less than 5 MB';
    }

    //move image file from tmp dir to permanent dir outside app root dir
    
    if(empty($error)==true) {
        move_uploaded_file($file_tmp, $imagedir.$file_name);
    } else {
        echo 'Unfortunately, your attachment was not submitted.  Please try again.<br>';        
        echo $error;
        echo '<br><p style="font-size:20px;"><a href="../index.html">Try Again</a></p>';
        exit();
    }
    
} else {

    //assign NULL to $file_name to avoid creating attachment for api request
    
    $file_name = NULL;
}
?>