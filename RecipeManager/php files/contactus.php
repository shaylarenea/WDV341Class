<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submissionSuccessful = true;
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $submissionSuccessful = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="contactformstyle.css">
    <link rel="stylesheet" href="contactformstyle.scss">
    <title>Login</title>
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
        <div class="Left">
            <h2>How Can We Help You?</h2>
            <img src="whitesugarcookie.png" alt="Sugacookie" width="300" height="300"> 
        </div>

        <div class="Main">
            <form method="post" action="">
                <!-- Set action to an empty string to make it self-posting -->
                <div>
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" id="firstName">
                </div>

                <div class="textbox">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" id="lastName">
                </div>

                <div>
                    <label for="emailAddress">Email:</label>
                    <input type="text" name="emailAddress" id="emailAddress">
                </div>

                <div class="radio-form">
                    <input type="radio" name="options" value="recipeSubmission" id="recipeSubmission">
                    <label for="recipeSubmission"> Recipe Submission Help</label>
                    <br>

                    <input type="radio" name="options" value="help" id="help">
                    <label for="help"> Report Recipe Errors</label>
                    <br>

                    <input type="radio" name="options" value="recipeErrors" id="recipeErrors">
                    <label for="recipeErrors"> Connect With Us </label>
                    <br>
                </div>

                <label for="textarea">Comments:</label>
                <br>
                <textarea id="textarea" name="textarea" rows="7" cols="50"></textarea>

                <div class="Right">
                    <input type="submit" name="submit" value="Register">
                    <input type="reset">
                </div>
            </form>
        </div>

        <div class="Right">
    <?php
    if (isset($submissionSuccessful) && $submissionSuccessful) {
        echo "<p class='success-message'>Submission successful, $firstName! <a href='formprocessor2.php'>Thank you for your submission!</a></p>";
    }
    ?>
</div>

        <div class="Menu">
            <div>
            </div>
        </div>

        <div class="Footer">
            <p class="copyright">&copy; The Cookie Crumb Factory 2023</p>
        </div>
    </div>
</body>
</html>
