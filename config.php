<?php

// Google API configuration
define('GOOGLE_CLIENT_ID', '882408563663-bhhmh1v9pm22ibs6vctki2bjo6puok2e.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'XqCu5FqGOQ4Se9apQ2w6F9BK');
define('GOOGLE_REDIRECT_URL', 'http://localhost/proyecto/?page=login');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to tuayuda.com');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);

?>