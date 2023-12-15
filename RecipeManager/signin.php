<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'dbConnect4.php'; 

$username = $password = $cpassword = $exists = $showAlert = $showError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $stmt = $conn->prepare("SELECT * FROM admin_log WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
 
    $num = $stmt->rowCount();

    if ($num > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
      
        if (password_verify($password, $row['password'])) {
           
            session_start();

          
            $_SESSION['username'] = $row['username'];

         
            header("Location:http://shaylarenea.com/WDV341/admin.php");
            exit(); 
        } else {
            $showError = "Invalid password";
        }
    } else {
       
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

         
            $stmt = $conn->prepare("INSERT INTO `admin_log` (`username`, `password`, `date`) VALUES (:username, :hash, current_timestamp())");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':hash', $hash);

            if ($stmt->execute()) {
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
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="sign">
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
            
            <div class="main">
                <div class="signinbox">
                    <h2>Sign Up</h2>
                    <form method="post" action="">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>

                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" id="cpassword" name="cpassword" required>

                        <div class="buttons">
                            <button type="submit">Sign Up</button>
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
            <p class="copyright">&copy; The Cookie Crumb Factory 2023</p>
            </div>
        </div>
    </div>
</body>
</html>
