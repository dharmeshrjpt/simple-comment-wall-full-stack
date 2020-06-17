<?php

//config.php

require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('380851802458-cbp5n0f39r74b6tei6n1v7u5pd1tqipk.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('OARXg-Rp-2tCFpe8HjrobEP4');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/intern/mainPage.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();
