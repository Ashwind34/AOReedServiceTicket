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
        echo '<br><p style="font-size:20px;"><a href="ticketform.php">Try Again</a></p>';
        echo '<br><p><a href="../../index.php">Return to Homepage</a></p>';
        exit();
    }
    else {
        
    } 
}
		
	
?>