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

    .tbl {
        width: 700px;
    }

    .create_btn {
        cursor: pointer;
        border: 1px solid black;
        text-decoration: none;
        padding: 5px;
    }
</style>

<body>
    <div class="wrapper">
        <div style="margin-bottom: 20px;">
            <?php
            if ($_SESSION["error_message"] != '') {
                echo "<div class='alert'>" . $_SESSION["error_message"] . "</div>";
                $_SESSION["error_message"] = '';
            }
            ?>
            <h1>Upcoming Events</h1>
            <a href="create.php" class="create_btn">Create Event</a>
            <a href="revoke.php" class="create_btn">Revoke Access</a>
        </div>
        <table border="1" class="tbl">
            <tr>
                <th>S.N.</th>
                <th>Event</th>
                <th>Actions</th>
            </tr>

            <?php
            try {
                if (!empty($events) && count($events) > 0) {
                    for ($i = 0; $i < count($events); $i++) {
                        $summary = $events[$i]->getSummary() . '(' . $events[$i]->start->dateTime . ')';
                        $key = $i + 1;
                        echo "<tr>
                        <td>$key</td>
                        <td>$summary</td>
                        <td><a href=delete.php?eventId=" . $events[$i]->getId() . " >Delete</a></td>
                        </tr> ";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>No upcoming events found, Please Create One.</td></tr>";
                }
            }catch(Throwable $e) {
                $_SESSION['error_message'] = 'Something went wrong,please try again';
            }
            
            ?>
        </table>
    </div>
</body>

</html>