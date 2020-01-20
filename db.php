<?php

session_start();
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


$_SESSION['user_id'] = $_SESSION['id_user'];



require  'vendor/autoload.php';

//API

$api = new ApiContext(
    new OAuthTokenCredential(
         'ARErSfQtXAnNYZkpGfr815dl0PZ2WaQgoJgbjF-gkh_UXs-xN28wPVpKs5-H_3_9GCoOpbG0y4aEEEWF',
         'EMsfKBmY-s8s9jOyfJQOU3eLTjE6YfqvLED2YylBojZs8wBzN44NV_8gOYSp876VBQy9XHIPHBrsRE-p'
    )
);

$api->setConfig([
    'mode' => 'sandbox',
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => false,
    'log,FileName' => '',
    'log.LogLevel' => 'FINE',
    'validation.level' => 'log'
]);

$db = new PDO('mysql:host=localhost;dbname=skprojekat','root','');

$user = $db->prepare("SELECT * FROM user WHERE id_user = :user_id");

$user->execute(['user_id' =>  $_SESSION['user_id']]);

$user = $user->fetchObject();

