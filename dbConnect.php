<?php

/*The 'connection file'
 This file will handle the connection between your program and a database server
 We are using PDO (PHP Data Objects) for all data processing
 
 Note: Should be on your gitIgnore list!
 Do not upload to your host,make a version specific to your host account
 */

 $servername = "localhost"; //generally the same for local and hosting account
$username = "root"; //database username different on local vs hosting account
$password = ""; //database password different on local vs hosting account gitignore
$databasename = "wdv341"; // will could differ between localhost and hosting account 

try {
  $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>