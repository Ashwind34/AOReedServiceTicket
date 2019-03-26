<?php

//function to check to see if all filds submitted.

function fieldcheck() {
    $fieldcheck = array('email', 'subject', 'desc');
    $field_error = FALSE;
    foreach ($fieldcheck as $f) {
        if (empty($_POST[$f])){
            $field_error = TRUE;
        }
    }

    return $field_error;
}

//function to check to see if email is an @aoreed.com email address

function domaincheck() {
    $domain_error = FALSE;
    $emailcheck = $_POST['email'];
    $domain = explode( '@', $emailcheck);
    if ($domain[1] != 'aoreed.com') {
        $domain_error = TRUE;
    }
    
    return $domain_error;

}

function arrayread($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if (isset($_POST['submit'])) {

    if(fieldcheck()) {
        echo '<br><p style="font-size:20px">Submission error. Please complete all required fields.</p>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';
        exit();

    } elseif (domaincheck()) {
        echo '<br><p style="font-size:20px">Submission error. Please make sure you are using your @aoreed.com email.</p>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';
        exit();
    
    } else {
             
        require_once 'create_ticket.php';
        require_once 'fileupload.php';

        //filter user input
            
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
              
        $filtered_email = filter_var($email, FILTER_VALIDATE_EMAIL);
     
        $subject = filter_var($_POST["subject"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     
        $body = filter_var($_POST["desc"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $api_key = $key;

        //call create_ticket() to make api post request

        //create_ticket($filtered_email, $subject, $body, $api_key);            
        
        echo '<br>';
        echo '<p>Success!  Your support request has been submitted!</p>';
        echo '<br>';
        echo '<p><a href="index.html">Submit another service request</a></p>';
        echo'<br>';
        echo '<br><p><a href="http://www.aoreed.com">Return to Aoreed.com</a></p>';

    } 
}
	
?>