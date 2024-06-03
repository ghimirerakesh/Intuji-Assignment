<?php
require_once  'vendor/autoload.php';
session_start();

//load client secret

$client = new Google_Client();

$client->setAuthConfig('credentials.json');

$client->setRedirectUri('https://intuji-test.com/oauthcallback.php');

$client->addScope(Google_Service_Calendar::CALENDAR);
if (!isset($_SESSION['access_token']) && !isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
} elseif (!isset($_SESSION['access_token']) && isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
} elseif (isset($_SESSION['access_token']) && isset($_GET['logout'])) {
    unset($_SESSION['access_token']);
    session_destroy();
    header('Location: index.php');
    exit();
}
$client->setAccessToken($_SESSION['access_token']);
?>