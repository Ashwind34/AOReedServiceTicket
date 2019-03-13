<?php
    if (isset($_POST['submit'])) {
	
        //check to make sure all fields completed
        $fieldcheck = array('fname', 'lname', 'email', 'desc', 'urgency');
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
        require_once 'create_ticket.php';
        print_r($_POST);
        $email = $_POST['email'];
        $body = $_POST['desc'];
        $urgency = $_POST['urgency'];
        $api_key = $key;
        echo '<br>';
        echo $api_key;
        echo'<br>';
        create_ticket($email, $body, $urgency, $api_key);
        echo'<br>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';

    } 
}
		
	
?>