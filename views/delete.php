<?php
require_once 'vendor/autoload.php';
include 'functions/init.php';

$service = new Google_Service_Calendar($client);

$eventId = $_GET['eventId'];
$calendarId = 'primary';

$service->events->delete($calendarId, $eventId);

header('Location: /');
exit();


?>