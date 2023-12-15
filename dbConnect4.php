<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "shaylarenea_wdv341";
$password = "Loveart@29!";
$databasename = "shaylarenea_wdv341";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Commenting out the "Connected successfully" message as it might interfere with the response
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script on connection failure
}
?>
