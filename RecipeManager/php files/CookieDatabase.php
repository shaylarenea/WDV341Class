<?php

require 'cookieConnect.php';

$sql = "SELECT cookiename, cookietype FROM cookie_database";

$stmt = $conn->prepare($sql); 

$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Database</title>
    <link rel="stylesheet" href="databasestyle.css">
    <link rel="stylesheet" href="databasestyle.scss">
</head>
<body>

</head>
<body>

    <div class="grid">
        <div class="Navbar">
            <img src="Cookie Crumb Short Logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="cookiecrumbfactory2.php">HOME</a></li>
                <li><a href="cookiedatabase.php">COOKIE DATABASE</a></li>
                <li><a href="recipeinputform.php">SUBMIT RECIPES</a></li>
                <li><a href="signin.php">SIGN IN</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
    
            </ul>
        </div>

        <div class="Main">
            <h2>Chocolate Database</h2><br>

            <?php
        while ($row = $stmt->fetch()) {
            echo "<div class='coookiedata'>";
            echo "<h2 class='cookietitle'>";
            echo $row["cookiename"];
            echo "</h2>";

            echo "<h3>";
            echo "Cookie Type:";
            echo "</h3>";
            echo "<p>";
            echo $row["cookietype"];
            echo "</p>";
            echo "</div>";
        }
        
        ?>
        </div>
    
        <div class="Footer">
            <p class="copyright">&copy; The Cookie Crumb Factory 2023</p>
        </div>
        <div>

        
    
</body>
</html>