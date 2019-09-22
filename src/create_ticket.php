<?php

require_once '../vendor/autoload.php';

use Zendesk\API\HttpClient as ZendeskAPI;

$client = new ZendeskAPI($subdomain);
$client->setAuth('basic', ['username' => $email, 'token' => $key]);

//create attachment if file has been uploaded

if ($file_name != NULL) {    
    $attachment = $client->attachments()->upload([
        'file' => __DIR__.$imagedir.$file_name,
        'type' => $file_type,
    ]);
}

// Create a new ticket

try {
    $newTicket = $client->tickets()->create([
    'subject'  => $subject,
    'comment'  => [
        'body' => $body ,
        'uploads' => [$attachment->upload->token]
    ], 
]);

}
catch (Exception $e) {
    //uncomment below if necessary for debugging api request issues
    //echo 'Message: '.$e->getMessage();
    echo '<br><p style="font-size:20px">Submission Error.  Please check your email and try again.</p>';
    echo '<br><p style="font-size:20px"><a href="../index.html">Try Again</a></p>';
    exit();
    
}


?>