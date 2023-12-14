<?php
require 'dbConnect.php';

$sql = "SELECT events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events WHERE events_id = :eventID";
$stmt = $conn->prepare($sql);

$eventID = 1;
$stmt->bindParam(':eventID', $eventID);
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

class Event {
    public $events_name;
    public $events_description;
    public $events_presenter;
    public $events_date;
    public $events_time;
}

$outputObj = new Event();

if ($eventRecord = $stmt->fetch()) {
    $outputObj->events_name = $eventRecord['events_name'];
    $outputObj->events_description = $eventRecord['events_description'];
    $outputObj->events_presenter = $eventRecord['events_presenter'];
    $outputObj->events_date = $eventRecord['events_date'];
    $outputObj->events_time = $eventRecord['events_time'];

    echo json_encode($outputObj);

    echo "<br>";
    foreach ($outputObj as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9-1</title>
    <style>
        #style {
            background-color: lightblue;
            padding: 20px;
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <!-- You can add HTML content here if needed -->
</body>
</html>
