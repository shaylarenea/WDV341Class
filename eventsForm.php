<!-- processForm.php -->
<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $honeypot = $_POST['honeypot'];

    if (empty($honeypot)) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $presenter = $_POST['presenter'];
        $date_time = $_POST['date_time'];
        $date_inserted = date('Y-m-d H:i:s');
        $date_updated = date('Y-m-d H:i:s');

        $sql = "INSERT INTO wdv341_event (event_name, event_description, event_presenter, event_date, date_inserted, date_updated)
                VALUES (:name, :description, :presenter, :date_time, :date_inserted, :date_updated)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':presenter', $presenter);
        $stmt->bindParam(':date_time', $date_time);
        $stmt->bindParam(':date_inserted', $date_inserted);
        $stmt->bindParam(':date_updated', $date_updated);

        $stmt->execute();

        echo "Event successfully added to the database!";
    } else {
        echo "Form submission failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Form</title>
</head>
<body>
    <h2>Event Form</h2>
    <form action="processForm.php" method="post">
        <label for="name">Event Name:</label>
        <input type="text" name="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea><br>

        <label for="presenter">Presenter:</label>
        <input type="text" name="presenter" required><br>

        <label for="date_time">Date and Time:</label>
        <input type="datetime-local" name="date_time" required><br>

        <!-- Honeypot field -->
        <label for="honeypot" style="display:none;">Leave this field blank:</label>
        <input type="text" id="honeypot" name="honeypot" style="display:none;">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
