<?php

/*The 'connection file'
 This file will handle the connection between your program and a database server
 We are using PDO (PHP Data Objects) for all data processing
 
 Note: Should be on your gitIgnore list!
 Do not upload to your host,make a version specific to your host account

 Opens, and holds open, a doorway between your PHP processor and the Database server
 */

 $servername = "localhost"; //generally the same for local and hosting account
$username = "root"; //database username different on local vs hosting account
$password = "";      //database password different on local vs hosting account gitignore
$databasename = "cookies"; // will could differ between locak and hosting account 

try {
  //"try basically says I am going to listen to all the code in my try block and listen for an error or exception. 
  // new means making a new PDO object called $conn also called the connection object
  $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} 

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>