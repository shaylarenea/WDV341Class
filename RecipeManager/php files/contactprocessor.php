<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $emailAddress = $_POST["emailAddress"];
    $option = $_POST["options"];
    $comments = $_POST["textarea"];

    include 'dbConnect1.php';  // Include the database connection file

    try {
        $sql = "INSERT INTO contact_form_data (firstname, lastname, emailAddress, optionSelected, comments, submissionDate)
                VALUES (:firstName, :lastName, :emailAddress, :option, :comments, NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':emailAddress', $emailAddress);
        $stmt->bindParam(':option', $option);
        $stmt->bindParam(':comments', $comments);

        $stmt->execute();

        // Redirect back to contactus.php with success status
        header("Location: contactus.php?success=true");
        exit();
    } catch (PDOException $e) {
        // Display error message
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the database connection
        $conn = null;
    }
}
?>
