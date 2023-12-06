<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV101 Form Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>WDV101 Form Confirmation</h1>

    <p>Dear <?php echo $_POST['first_name']; ?>,</p>
    <p>Thank you for your interest in DMACC.</p>
    <p>We have you listed as an academic standing starting this fall.</p>
    <p>You have declared <?php echo $_POST['selectedMajor']; ?> as your major.</p>

    <p>Based upon your responses, we will provide the following information in our confirmation email to you at <?php echo $_POST['email_address']; ?>.</p>

    <?php
    // Checkboxes
    if (isset($_POST['programInfo'])) {
        echo '☑ Please contact me with program information<br>';
    }

    if (isset($_POST['advisorContactInfo'])) {
        echo '☑ I would like to contact a program advisor<br>';
    }

    // Display comments
    echo '<p>You have shared the following comments which we will review:</p>';
    echo '<p>' . nl2br($_POST['comments']) . '</p>';
    ?>
</body>
</html>
