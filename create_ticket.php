<?php


//CREATE A FUNCTION USING THIS CODE THAT TAKES THE $_POST VARIABLES AS ARGUMENTS - CHECK FOR SCOPING!!
//MAY NEED TO ADD $KEY, $UPLOAD PARAMETER TO FUNCTION

require_once 'vendor/autoload.php';
require 'creds.php'; //IMPORTS API KEY FROM LOCAL FILE - NEED TO RE-DO THIS FOR SECURITY BEFORE PRODUCTION

use Zendesk\API\HttpClient as ZendeskAPI;

function create_ticket($email, $body, $urgency, $key){

    // require 'vendor/autoload.php';
    //require_once 'creds.php'; //IMPORTS API KEY FROM LOCAL FILE - NEED TO RE-DO THIS FOR SECURITY BEFORE PRODUCTION

    // use Zendesk\API\HttpClient as ZendeskAPI;

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
        'subject'  => 'The quick brown fox jumps over the lazy dog',
        'comment'  => [
            'body' => $body 

            // ,'uploads' => [$attachment->upload->token]
        ],
        'priority' => $urgency
    ]);
    print_r($newTicket);
}

?>