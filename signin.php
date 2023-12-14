<?php
session_start();

include 'dbconnect3.php';  // Include the database connection file

// Initialize variables
$username = $password = $cpassword = $exists = $showAlert = $showError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_log WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // Check if the username already exists
    if ($num > 0) {
        $exists = "Username not available";
    } else {
        // Proceed with registration
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Password Hashing is used here.
            $sql = "INSERT INTO `admin_log` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
            } else {
                $showError = "Error in registration. Please try again.";
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signstyle.css">
    <link rel="stylesheet" href="signstyle.scss">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
        <div class="sign">
            <div class="Navbar">
                <img src="Cookie Crumb Short Logo.png" alt="logo" class="logo">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">RECIPES</a></li>
                    <li><a href="#">SIGN IN</a></li>
                    <li><a href="#">CONTACT US</a></li>
                </ul>
            </div>
            <div class="main">
                <div class="signinbox">
                    <h2>Sign In</h2>
                    <form method="post" action="">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>

                        <div class="buttons">
                            <button type="submit">Login</button>
                            <button type="reset">Reset</button>
                        </div>
                    </form>

                    <!-- Display the message -->
                    <p><?php echo $exists; ?></p>
                    <p><?php echo $showError; ?></p>
                    <p><?php echo $showAlert ? "Registration successful!" : ""; ?></p>
                </div>
            </div>
            <div class="Footer">
                <p class="copyright">&copy; The Crumb Factory 2023</p>
            </div>
        </div>
    </div>
</body>
</html>
