<?php
    /*Algorithm for a sign on password_get_info
    Provide a signon form username and password self-posting
    validate input 
    access database
    
    if(form has been submitted)
    {
        process form data
        validate input data
        if(validDaata)
        -access database
            (SQL SELECT Where clause username/password)
        if you find the username/password in the database
            -you are valid user
            -display Admin page/Content
    else 
        -Invalid username/password -ERROR
        display login form
    }
    //VIEW -HTML area

    if (valid user-signed-on){
        display the admin content
    }
    else {
        display the login form OR return to homepage

    else
        -Invalid 
    }
    */
    ?>
    <?php

        if(isset($_POST['submit'])){
            echo "<h1>Form has been submitted";
        }
        else{
            echo "<h1>Display Login Form </h1>";
            $displayForm = true;
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>13-2 Sign On</title>
</head>
<body>
<h1> Login to the Event System</h1>
<?php
 if ($displayForm){
   // the user has SIGNED ON and should display the Admin System
   echo "<h2>Event ADMIN SYSTEM</h2>";

   <form method="post" action="13-2Signon.php">

   <p>
    <label for= "username"> Username: </label>
    <input type="text" name="username" id="username">
    </p>

    <p>
    <label for= "password"> Password: </label>
    <input type="password" name="password" id="password">
    </p>
    <p>
            <input type="submit" value="Submit">
            <input type="reset">
    </p>
 }
 else {
    //the user needs to display the form-to sign on or fix their input
    echo "<h2>Display Form</h2>";
 }
?>
    
</body>
</html>