<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $emailAddress = $_POST["emailAddress"];
    $options = $_POST["options"];
    $comments = $_POST["textarea"];

    
    echo "<h2>Submitted Data:</h2>";
    echo "<p><strong>First Name:</strong> $firstName</p>";
    echo "<p><strong>Last Name:</strong> $lastName</p>";
    echo "<p><strong>Email:</strong> $emailAddress</p>";
    echo "<p><strong>Options:</strong> $options</p>";
    echo "<p><strong>Comments:</strong> $comments</p>";

    // You can perform additional actions here, such as saving to a database

    // Display submission successful message
    echo "<p class='success-message'>Submission successful!</p>";
}
?>
