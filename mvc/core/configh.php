<?php 
require_once 'vendor/autoload.php';
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
//Set the OAuth 2.0 Client ID
$google_client->setClientId('874617006845-evboefk82us380m2pvcs92p684lgosa5.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('MeykneJ8HO_ZmAaiDL1sLR3o');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/WebNC?url=Login/Show&');
//
$google_client->addScope('email');

$google_client->addScope('profile');


?>