<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'dbConnect1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $honeypot = $_POST['honeypot'];

    if (empty($honeypot)) {
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $presenter = htmlspecialchars($_POST['presenter']);
        $date_time = htmlspecialchars($_POST['date_time']);
        $date_inserted = date('Y-m-d H:i:s');
        $date_updated = date('Y-m-d H:i:s');

        try {
            $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_date_inserted, events_date_updated)
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
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $conn = null;
    } else {
        echo "Form submission failed. Please try again.";
    }
}
?>
