<?php
 //database work flow
    //  1. Connect to the database
    //  2. Create your SQL command
    //  3. Prepare your Statement       PDO Prepared Statements
    //  4. Bind any parameters as needed (didn't need to do so skipped)
    //  5. Execute your SQL command/prepared statement
    //  6. Process your result-set/object

    //include an external php file into this file  two types of commands that can be used "include" and "require"

        //1. Connect to the database
    require 'dbConnect.php'; //copes the content of the dbConnect.php into this page

    //2. Create your SQL command 
    $sql = "SELECT events_name FROM wdv341_events";

    //3. Prepare your Statement PDO Prepared Statements 
    $stmt = $conn->prepare($sql); // -> is used instead of . for object->property or object method 

    //$stmt = $conn.prepare($sql); //concatenating (link together) $conn with the prepare()

    //5. Execute your SQL Command/prepared statement 
     $stmt->execute(); //runs the prepared statement, stores the results within the statement object

 //6. 
    /*$stmt->setFetchMode(PDO::FETCH_ASSOC);  //setting all fetch commands to return associative array 
 $row = $stmt->fetch(); //should get first row from the result set 

    echo $row["events_name"];

    $stmt->setFetchMode(PDO::FETCH_ASSOC);  //setting all fetch commands to return associative array 
    $row = $stmt->fetch(); //should get first row from the result set 

    echo $row["events_name"];

    $stmt->setFetchMode(PDO::FETCH_ASSOC);  //setting all fetch commands to return associative array 
    $row = $stmt->fetch(); //should get first row from the result set 

    echo $row["events_name"];*/

    //instead of doing the previous steps over and over use a loop 
    //control variable, end condition, and 




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> WDV 341 Intro PHP</h1>
    <h2>Unit 7 Select data from events table</h2>
    <h3>Event Name</h3>
    <?php

while($row = $stmt->fetch() ){
    echo "<p>";
    echo $row["events_name"];
    echo "</p>";
}
?>
</body>
</html>