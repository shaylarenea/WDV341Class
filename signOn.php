<?php
    /* Algorithm for a sign-on password_get_info
    Provide a sign-on form username and password self-posting
    validate input 
    access database
    
    if (form has been submitted) {
        process form data
        validate input data
        if error-displayForm
        validData =false  //bad data turns off
        if (validData) {
            - access database
            (SQL SELECT Where clause username/password)
            if you find the username/password in the database
                - you are a valid user
                - display Admin page/Content
            else 
                - Invalid username/password - ERROR
                display login form
        }
        // VIEW - HTML area

        if (valid user-signed-on){
            display the admin content
        } else {
            display the login form OR return to homepage
        }
    } else {
        - Invalid 
    }
    */

    $inUsername = "";
    $inPassword = "";
    $usernameErrMsg = "";
    $passwordErrMsg = "";

    $displayForm = false;

    if (isset($_POST['submit'])) {
        echo "<h1>Form has been submitted";
    } else {
        echo "<h1>Display Login Form </h1>";
        $displayForm = true;

        $inUsername = $_POST['username'];
        $inPassword = $_POST['password'];
        // validate input values

        $validData = true; // assume the input data is good
        if ($inUsername == "") {
            // display error message on the form
            $usernameErrMsg = "Please enter a user";
            $validData = false;
            // put the input values back into the form fields
        }

        if(validData) {
            //process the database
        }
        else {
            //display the form 
            $displayForm = true;
        }
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
    <h1>Login to the Event System</h1>
    
    <?php
    if ($displayForm) {
        // the user has SIGNED ON and should display the Admin System
        echo "<h2>Event ADMIN SYSTEM</h2>";
    ?>
    <form method="post" action="signOn.php">
        <p>
            <label for="username"> Username: </label>
            <input type="text" name="username" id="username" value="<?php echo $inUsername; ?>">
            <span><?php echo $usernameErrMsg; ?></span>
        </p>

        <p>
            <label for="password"> Password: </label>
            <input type="password" name="password" id="password" value="<?php echo $inPassword; ?>">
            <span><?php echo $passwordErrMsg; ?></span>
        </p>

        <p>
            <input type="submit" name="submit" value="Submit">
            <input type="reset">
        </p>
    </form>
    <?php   
    } else {
        // the user needs to display the form-to sign on or fix their input
        echo "<h2>Display Form</h2>";
    }
    ?>
</body>
</html>
