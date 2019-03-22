<?php

//CHECK WITH TIM TO SEE IF WE NEED REDUNDANT ERROR CHECKING

//function to check to see if all filds submitted.

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

//function to check to see if email is an @aoreed.com email address

function domaincheck() {
    $domain_error = FALSE;
    $emailcheck = $_POST['email'];
    $domain = explode( '@', $emailcheck);
    if ($domain != '@aoreed.com') {
        $domain_error = TRUE;
    }

    return $domain_error;

}
    if (isset($_POST['submit'])) {
	
        //check to make sure all fields completed
        //MAY NOT BE NECESSARY
        $fieldcheck = array('email', 'subject', 'desc', 'urgency');
        $error = FALSE;
        foreach ($fieldcheck as $f) {
            if (empty($_POST[$f])) {
            $error = TRUE;
        }
    }
    if($error) {
        echo '<br><p style="font-size:20px">Submission error. Please complete all required fields.</p>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';
        exit();
    }
    else {

        //call create_ticket() to make api post request
        //NEED TO SANITIZE INPUT DATA FOR API CALL

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