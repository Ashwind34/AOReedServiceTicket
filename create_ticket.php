<?php

require_once 'vendor/autoload.php';
require '../outside_root/creds.php'; //IMPORTS API KEY FROM LOCAL FILE - NEED TO RE-DO THIS FOR SECURITY BEFORE PRODUCTION

use Zendesk\API\HttpClient as ZendeskAPI;

function create_ticket($email, $subject, $body, $key, $file_name, $file_type){

    $subdomain = "Aorhelpdesk";
    $username  = $email; // user email
    $token     =  $key; // API key 

    $client = new ZendeskAPI($subdomain);
    $client->setAuth('basic', ['username' => $username, 'token' => $token]);

    //move working directory up one level to access screenshots outside root app directory

    chdir('../');

    //create attachment
    
    $attachment = $client->attachments()->upload([
        'file' => getcwd().'/outside_root/img/'.$file_name,
        'type' => $file_type,
    ]);

    // Create a new ticket
    try {
        $newTicket = $client->tickets()->create([
        'subject'  => $subject,
        'comment'  => [
            'body' => $body 

            ,'uploads' => [$attachment->upload->token]
        ], 
    ]);
    }
    catch (Exception $e) {
        //uncomment below if necessary for debugging api request issues
        //echo 'Message: '.$e->getMessage();
        echo '<br><p style="font-size:20px">Submission Error.  Please check your @aoreed.com email and try again.</p>';
        echo '<br><p style="font-size:20px;"><a href="index.html">Try Again</a></p>';
        exit();
        
    }
}

?>