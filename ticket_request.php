<?php
    if (isset($_POST['submit'])) {
	
    //check to make sure all fields completed
    $fieldcheck = array('fname', 'lname', 'desc', 'urgency');
    $error = FALSE;
    foreach ($fieldcheck as $f) {
        if (empty($_POST[$f])) {
           $error = TRUE;
       }
    }
    if($error) {
        echo '<br><p style="font-size:20px">Please complete all fields.</p>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';
        exit();
    }
    else {
      print_r($_POST);  
    } 
}
		
	
?>