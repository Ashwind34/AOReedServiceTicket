<?php
            
// logic for popping @aoreed from email submit
            
// $emailcheck = $_POST['email'];
// $domain = explode( '@', $emailcheck);

//function to check to see if all filds submitted.  
//NEED TO INCORPORATE THIS INTO SCRIPT AND ALSO CHECK FOR @AOREED.COM DOMAIN

function fieldcheck() {
    $fieldcheck = array('email', 'subject', 'desc', 'urgency');
    $submit_error = FALSE;
    foreach ($fieldcheck as $f) {
        if (empty($_POST[$f])){
            $submit_error = TRUE;
        }
    }

    return $submit_error;
}
    if (isset($_POST['submit'])) {
	
        //check to make sure all fields completed
        $fieldcheck = array('email', 'subject', 'desc', 'urgency');
        $error = FALSE;
        foreach ($fieldcheck as $f) {
            if (empty($_POST[$f])) {
            $error = TRUE;
        }
    }
    if($error) {
        echo '<br><p style="font-size:20px">Please complete all required fields.</p>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';
        exit();
    }
    else {

        //call create_ticket() to make api post request

        require_once 'create_ticket.php';
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['desc'];
        $urgency = $_POST['urgency'];
        $api_key = $key;

        create_ticket($email, $subject, $body, $urgency, $api_key);
        
        echo '<br>';
        echo '<br>';
        echo '<p>Success!  Your support request has been submitted!</p>';
        echo'<br>';
        echo '<br><p style="font-size:20px;"><a href="http://www.aoreed.com">Return to Aoreed.com</a></p>';

    } 
}
		
	
?>