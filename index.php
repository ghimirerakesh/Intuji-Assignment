<?php
include 'functions/init.php';
$service = new Google_Service_Calendar($client);


// List events
$calendarId = 'primary';
$optParams = array(
    'maxResults' => 50,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
);

$results = $service->events->listEvents($calendarId, $optParams);

$events = $results->getItems();


if (empty($events)) {
    echo "No upcoming events found.";
}

?>

<!DOCTYPE html>
<title>Intuji Assignment</title>
<style>
    body {
        background: #eee !important;
    }

    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
        margin-left: 20%;
    }
    .tbl{
        width:700px;
    }
    .create_btn{
        cursor: pointer;
        border: 1px solid black;
        text-decoration: none;
        padding: 5px;
    }

</style>

<body>
    <div class="wrapper">
        <div style="margin-bottom: 20px;">
            <h1>Upcoming Events</h1>
            <a href="create.php" class="create_btn">Create Event</a>
        </div>
        <table border="1" class="tbl">
            <tr>
                <th>S.N.</th>
                <th>Event</th>
                <th>Actions</th>
            </tr>
            <?php
            foreach ($events as $key => $event)
            ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $event->getSummary() .  '(' . $event->start->dateTime . ')'  ?></td>
                <td><a href="delete.php?eventId=<?php echo $event->getId(); ?>" >Delete</a></td>
            </tr>
        </table>
    </div>
</body>

</html>