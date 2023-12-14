<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $honeypot = $_POST['honeypot'];

    if (empty($honeypot)) {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email_address'];

        // Send an email
        $to = $email;
        $subject = "Signup Confirmation";
        $message = "Thank you, $firstName $lastName. A signup confirmation has been sent to $email. Thank you for your support!";
        $headers = "From: webmaster@example.com";

        // Display a success message
        echo "Thank you, $firstName $lastName. A signup confirmation has been sent to $email. Thank you for your support!";

        // Send the email
        mail($to, $subject, $message, $headers);

        // Display input data in a table format
        echo "<table border='1'>";
        echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
        foreach ($_POST as $key => $value) {
            echo '<tr>';
            echo '<td>', $key, '</td>';
            echo '<td>', $value, '</td>';
            echo '</tr>';
        }
        echo "</table>";
        echo "<p>&nbsp;</p>";
    } else {
        echo "Form submission failed. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV101 Intro HTML and CSS</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        form {
            width: 600px;
            margin: auto;
            background-color: rgb(24, 119, 151);
            padding-left: 20px;
            padding-top: 1px;
            padding-bottom: 10px;
        }

        form legend {
            font-size: larger;
            text-align: center;
            background-color: aqua;
            color: white;
            margin: 45px;
            padding: 10px;
        }

        h2, h1 {
            text-align: center;
        }

        form p.buttons {
            margin-top: 20px;
        }

        form p.buttons input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>WDV101 Intro HTML and CSS</h1>
    <h2>5-1 HTML Form Processor</h2>
    <form id="form1" name="form1" method="post" action="formHandler.php">
        <!-- Honeypot field -->
        <label for="honeypot" style="display:none;">Leave this field blank:</label>
        <input type="text" id="honeypot" name="honeypot" style="display:none;">

        <div class="g-recaptcha" data-sitekey="6LcTAzApAAAAAOk1q6RRzfs3CN6A5luXOmwFeVFX></div>

        <legend>DMACC STUDENT INFORMATION FORM</legend>

        <p>
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>" />
</p>


        <p>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" />
        </p>

        <p>
            <label for="school_name">School Name:</label>
            <input type="text" name="school_name" id="school_name" />
        </p>
        <p>
            <label for="email_address">Email Address:</label>
            <input type="text" name="email_address" id="email_address" />
        </p>

        <!-- Add your additional form fields here -->

        <p>
            <input type="submit" name="button" id="button" value="Submit" />
            <input type="reset" name="button2" id="button2" value="Reset" />
        </p>
    </form>

    <p>&nbsp;</p>
</body>
</html>
