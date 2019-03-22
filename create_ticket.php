<?php

//NEED TO ADD $UPLOAD PARAMETER AND ATTACHMENTS FUNCTIONALITY

require_once 'vendor/autoload.php';
require 'creds.php'; //IMPORTS API KEY FROM LOCAL FILE - NEED TO RE-DO THIS FOR SECURITY BEFORE PRODUCTION

use Zendesk\API\HttpClient as ZendeskAPI;

function create_ticket($email, $subject, $body, $urgency, $key){

    $subdomain = "Aorhelpdesk";
    $username  = $email; // email
    $token     =  $key; // API key - NEED TO UPDATE FOR SECURITY

    $client = new ZendeskAPI($subdomain);
    $client->setAuth('basic', ['username' => $username, 'token' => $token]);

    //create attachment

    // $attachment = $client->attachments()->upload([
    //     'file' => getcwd().'/tests/assets/UK.png',
    //     'type' => 'image/png',
    //     'name' => 'UK.png' // Optional parameter, will default to filename.ext
    // ]);

    // Create a new ticket
    $newTicket = $client->tickets()->create([
        'subject'  => $subject,
        'comment'  => [
            'body' => $body 

            // ,'uploads' => [$attachment->upload->token]
        ],
        'priority' => $urgency
    ]);
}

?>