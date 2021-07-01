<?php
session_start();

// Include configuration file
require_once '../config.php';

if(isset($_SESSION['token'])) {
    // Remove token and user data from the session
    unset($_SESSION['token']);
    unset($_SESSION['userData']);
    
    // Reset OAuth access token
    $gClient->revokeToken();
}


session_destroy();
header("location:../?page=inicio");