<?php
require_once 'vendor/autoload.php';
include 'functions/init.php';
try {
    $service = new Google_Service_Calendar($client);

    $eventId = $_GET['eventId'];
    $calendarId = 'primary';
    
    $service->events->delete($calendarId, $eventId);
    
    header('Location: /');
}catch(Throwable $e) {
    $_SESSION['error_message'] = 'Something went wrong,please try again';
    header('Location: /');
}



?>