<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="crumfactoryhomepagestyle.css">
    <link rel="stylesheet" href="crumfactoryhomepagestyle.scss">
</head>

<body>
    <div class="grid">
        <div class="Navbar">
            <img src="Cookie Crumb Short Logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="recipeinputform.php">SUBMIT RECIPES</a></li>
                <li><a href="signin.php">SIGN IN</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
        </div>

        <div class="Header">
            <div class="dropdown">
                <button class="dropbtn">Select Cookie Recipe</button>
                <div class="dropdown-content">
                    <a href="<?php echo 'chocolatechip.php'; ?>">Chocolate Chip Cookies</a>
                    <a href="<?php echo 'oatmeal.php'; ?>">Oatmeal Cookies</a>
                    <a href="<?php echo 'sugarcookie.php'; ?>">Sugar Cookies</a>
                </div>
            </div>
        </div>

        <div class="Left">
            <h2>Chocolate Chip Cookies</h2>
            <img src="Chocolatechip5.png" alt="Chocolate Chip" width="300" height="300">
            <button type="button" class="chocbutton" onclick="navigateToRecipePage('<?php echo 'chocolatechip.php'; ?>')">VIEW</button>
        </div>

        <div class="Main">
            <h2>Oatmeal Cookies</h2>
            <img src="oatmealcookie3.png" alt="Oatmeal" width="300" height="300">
            <button type="button" class="oatbutton" onclick="navigateToRecipePage('<?php echo 'oatmeal.php'; ?>')">VIEW</button>
        </div>

        <div class="Right">
            <h2>Sugar Cookies</h2>
            <img src="whitesugarcookie.png" alt="Sugacookie" width="300" height="300">
            <button type="button" class="sugabutton" onclick="navigateToRecipePage('<?php echo 'sugarcookie.php'; ?>')">VIEW</button>
        </div>

        <div class="Menu">
            <p>Do you Have A Recipe You Would Like to Share?</p>
            <button type="button" class="recipebutton" onclick="navigateToRecipePage('<?php echo 'recipeinputform.php'; ?>')">SUBMIT A RECIPE</button>
        </div>

        <div class="Footer">
            <p class="copyright">&copy; The Crumb Factory 2023</p>
        </div>
    </div>

    <script>
        function navigateToRecipePage(pageURL) {
            window.location.href = pageURL;
        }
    </script>
</body>

</html>
