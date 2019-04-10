<?php

//include variables and paths from outside root web directory
require_once '../../outside_root/vars.php';

//function to check to see if all fields submitted.

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

//form validation and error handling

if (isset($_POST['submit'])) {

    if(fieldcheck()) {
        echo '<br><p style="font-size:20px">Submission error. Please complete all required fields.</p>';
        echo '<br><p style="font-size:20px;"><a href="../index.html">Try Again</a></p>';
        exit();

    } elseif (domaincheck()) {
        echo '<br><p style="font-size:20px">Submission error. Please make sure you are using your @aoreed.com email.</p>';
        echo '<br><p style="font-size:20px;"><a href="../index.html">Try Again</a></p>';
        exit();
    
    } else {
        
        //filter user input
            
        $pre_email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
              
        $email = filter_var($pre_email, FILTER_VALIDATE_EMAIL);
     
        $subject = filter_var($_POST["subject"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     
        $body = filter_var($_POST["desc"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //include snapshot image upload logic
        require_once 'fileupload.php';

        //make api request
        require_once 'create_ticket.php';         
   
        // delete uploaded file immediately after api request

        if ($file_name !== NULL) {
            unlink(getcwd().$imagedir.$file_name);
        } 

        //echo success message and links

        echo '<br>';
        echo '<p>Success!  Your support request has been submitted!</p>';
        echo '<p><a href="../index.html">Submit another service request</a></p>';
        echo '<p><a href="http://www.aoreed.com">Return to Aoreed.com</a></p>';

    }
     
}
	
?>