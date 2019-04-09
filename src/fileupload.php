<?php

$imagedir = "../../outside_root_aoreed/img/";

if(!empty($_FILES['image']['name'])) {
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false) {
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 5000000) {
        $errors[]='File size must be less than 5 MB';
    }
    
    if(empty($errors)==true) {
        move_uploaded_file($file_tmp, $imagedir.$file_name);
    } else {
        echo 'Unfortunately, your attachment was not submitted.  Please try again.';
        echo '<br><p style="font-size:20px;"><a href="../index.html">Try Again</a></p>';
        print_r($errors);
    }
} else {
    $file_name = NULL;
}
?>