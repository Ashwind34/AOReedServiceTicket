<?php
    if (isset($_POST['submit'])) {
	
    //check to make sure all fields completed
    $fieldcheck = array('fname', 'lname', 'desc', 'urgency', 'city', 'state', 'zip');
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

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Service Ticket Request</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

<p><img src="" alt="logo" height="315" width="600"></p>
<br>

<form action="index.php" method="post">

<div class="row">
        <div class="large-8 small-centered columns">
            <fieldset>
                <legend style="color:yellow;font-size:25px;"><b>Ticket Request</b></legend>
                <div class="row">
                    <div class="small-2 columns">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="small-10 columns">
                        <input type="text" id="fname" name="fname"></input>
                    </div>
                </div>    
                <div class="row">
                    <div class="small-2 columns">
                        <label class="inline left" for="lname">Last Name</label>
                    </div>
                    <div class="small-10 columns">
                        <input type="text" id="lname" name="lname"></input>
                    </div>
                </div>


                <div class="row">
                    <div class="small-4 columns">
                        <label class="inline left" for="desc">Description of Issue</label>
                    </div>
                    <div class="small-10 columns">
                        <textarea name="desc" rows="10" cols="50"></textarea>
                    </div>
                </div>    



                <div class="row">
                    <div class="small-4 columns">
                        <label class="inline left" for="urgency">Level of Urgency</label>
                    </div>
                    <div class="small-10 columns">
                        <input type="radio" name="urgency" value="male" checked> Low<br>
                        <input type="radio" name="urgency" value="female"> Medium<br>
                        <input type="radio" name="urgency" value="other"> High
                    </div>
                </div>    
                
                
            </fieldset>   
        </div>
    </div>
	
	<p><input type="submit" name="submit" value="Request Tickets"></p>
	
	<p><a href="../../index.php">Return to Homepage</a></p>

</form>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>