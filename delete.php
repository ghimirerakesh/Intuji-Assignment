<?php

use Google\Service;
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri('https://intuji-test.com/oauthcallback.php');
$client->addScope(Google_Service_Calendar::CALENDAR);

if (!isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

$client->setAccessToken($_SESSION['access_token']);

if ($client->isAccessTokenExpired()) {
    unset($_SESSION['access_token']);
    header('Location: index.php');
    exit();
}

$service = new Google_Service_Calendar($client);

$eventId = $_GET['eventId'];
$calendarId = 'primary';

$service->events->delete($calendarId, $eventId);

header('Location: index.php');
exit();


?>