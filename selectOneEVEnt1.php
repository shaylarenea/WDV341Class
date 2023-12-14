<?php

require 'dbConnect.php';

try {
    $sql = "SELECT * FROM wdv341_events WHERE events_id=2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Errors:" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Event</title>
    <style>
        .eventonebox {
            background-color: #e0b2cf;
            padding: 10px; 
            margin: 5px; 
            width:500px;
        }
    </style>
</head>
<body>
    <h1>This will display one event from the table</h1>

    <?php

    echo "<div class='eventonebox'>";
    echo "<table style='border:1px solid black;'>";
    echo "<tr style='border:1px solid black';><th style='border:1px solid black';>Name</th><th style='border:1px solid black';>Description</th><th style='border:1px solid black';>Presenter</th><th style='border:1px solid black';>Date</th><th style='border:1px solid black';>Time</th></tr>";

    try {

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            echo "<tr style='border:1px solid black';>";
            echo '<td>', $row['events_name'], '</td>';
            echo '<td>', $row['events_description'], '</td>';
            echo '<td>', $row['events_presenter'], '</td>';
            echo '<td>', $row['events_date'], '</td>';
            echo '<td>', $row['events_time'], '</td>';
            echo '</tr>';
        }

    } catch (PDOException $e) {

        echo 'Errors: ' . $e->getMessage();

    }

    echo "</table>";
    echo "</div>";

    ?>
</body>
</html>
