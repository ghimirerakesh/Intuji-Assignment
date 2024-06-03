<?php
include 'functions/init.php';

$service = new Google_Service_Calendar($client);

$start_time = new DateTime($_POST['start']);
$start_time = $start_time->format("Y-m-d\TH:i:s.000+05:45");

$end_time = new DateTime($_POST['end']);
$end_time = $end_time->format("Y-m-d\TH:i:s.000+05:45");

$event = new Google_Service_Calendar_Event(array(
    'summary' => $_POST['summary'],
    'location' => '',
    'description' => 'Test Description',
    'start' => array(
      'dateTime' => $start_time,
    ),
    'end' => array(
      'dateTime' => $end_time,
    ),
  ));
  
$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
header('Location: index.php');
?>