
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Form</title>
</head>
<body>
    <h2>Event Form</h2>
    <form action="eventsProcessForm.php" method="post">
        <label for="name">Event Name:</label>
        <input type="text" name="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea><br>

        <label for="presenter">Presenter:</label>
        <input type="text" name="presenter" required><br>

        <label for="date_time">Date and Time:</label>
        <input type="datetime-local" name="date_time" required><br>

        <!-- Honeypot field -->
        <label for="honeypot" style="display:none;">Leave this field blank:</label>
        <input type="text" id="honeypot" name="honeypot" style="display:none;">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
