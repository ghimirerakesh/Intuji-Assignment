<?php
include 'functions/init.php';

// echo '<br><a href="index.php?logout">Logout</a>';
$service = new Google_Service_Calendar($client);


// $event = new Google_Service_Calendar_Event(array(
//     'summary' => $_POST['summary'],
//     'start' => array(
//         'dateTime' => $_POST['start'],
//         'timeZone' => 'Asia/Kathmandu'
//     ),
//     'end' => array(
//         'dateTime' => $_POST['end'],
//         'timeZone' => 'Asia/Kathmandu'
//     ),
// ));


$event = new Google_Service_Calendar_Event(array(
    'summary' => $_POST['summary'],
    'location' => '',
    'description' => 'Test Description',
    'start' => array(
      'dateTime' => '2024-06-02T09:00:00-07:00',
      'timeZone' => 'Asia/Kathmandu',
    ),
    'end' => array(
      'dateTime' => '2024-06-02T17:00:00-07:00',
      'timeZone' => 'Asia/Kathmandu',
    ),
    'recurrence' => array(
      'RRULE:FREQ=DAILY;COUNT=2'
    ),
    'attendees' => array(
      array('email' => 'lpage@example.com'),
      array('email' => 'sbrin@example.com'),
    ),
    'reminders' => array(
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 10),
      ),
    ),
  ));

$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
header('Location: index.php');
?>