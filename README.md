#ZendeskPHPServiceTicket
A web-based IT service ticket app 

This is a web-based application for submitting service tickets remotely to the Zendesk customer service support ticket system.  This program uses the Zendesk PHP API client.  Images, links, and form styling can be altered as needed.

SPECIAL INSTRUCTIONS

In order to keep your API key and potentially sensitive image files inaccessible, you will need to create a directory called outside_root in the same directory as your application root directory.  Navigate into outside_root and create an empty directory called 'img'.  This directory will store any uploaded screenshots as they are sent to the Zendesk server.  Any images will be deleted immediately after consuming the API.  Also, you will need to move the 'vars.php' file into the outside_root directory and add your API key and Zendesk subdomain where noted.
