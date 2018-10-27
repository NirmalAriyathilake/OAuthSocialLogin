<?php

require_once 'vendor/autoload.php';
session_start();

if(isset($_POST['idtoken'])){
    // Get $id_token via HTTPS POST.
    $id_token = $_POST['idtoken'];
    $CLIENT_ID = "57064433868-ebkvuv5druld2jah3h8hmt5l71ennfqb.apps.googleusercontent.com";
    $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
    $profile = $client->verifyIdToken($id_token);
    if ($profile) {
        $userid = $profile['sub'];
        echo $userid;
        $_SESSION['profile_name'] = $profile['name'];
        $_SESSION['profile_email'] = $profile['email'];
        $_SESSION['profile_picture'] = $profile['picture'];
        $_SESSION['id_token'] = $id_token;
    } else {
        echo "invalid";
    }
}

?>