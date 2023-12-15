<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chocolatechipstyle.css">
    <link rel="stylesheet" href="chocolatechipstyle.scss">
    <title>Oatmeal Cookies</title>
</head>
<body>
    
    <script src="oatmealinstructions.js"></script>

    <div class="grid">
        <div class="Navbar">
            <img src="Cookie Crumb Short Logo.png" alt="logo" class="logo">
            <ul>
                <<li><a href="cookiecrumbfactory2.php">HOME</a></li>
                <li><a href="cookiedatabase.php">COOKIE DATABASE</a></li>
                <li><a href="recipeinputform.php">SUBMIT RECIPES</a></li>
                <li><a href="signin.php">SIGN IN</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
        </div>

        <div class="Left">
            <h2>Oatmeal Cookies</h2>
            <p>Serves: 10-15 </p>
            <p>Difficulty Level: Medium</p>
            <p>Preparation Time: 10-15 Minutes </p>
            <img src="oatmealcookie3.png" alt="oatcookie" width="300" height="300">
            <button type="button" class="Oatnavbutton" onclick="navigateToRecipePage('chocolatechip.php')">Chocolate Chip</button>
        </div>

        <div class="Main">
            <p>Sweet and Healthy Cookies.</p>
        </div>

        <div class="Right">
            <h3>Serving Size</h3>
            <button type="button" class="halfbutton">Half</button>
            <button type="button" class="normalbutton">Normal</button>
            <button type="button" class="doublebutton">Double</button><br><br>
            <button type="button" class="ingredients-button">Ingredients</button>
            <div class="ingredients-container"></div><br><br>
            <button type="button" class="instruction-button">Instructions</button>
            <div class="instructions-container"></div><br>

            <button type="button" class="close-all">Close Recipe</button>
        </div>

        <div class="Menu">
            <p>Do you Have A Recipe You Would Like to Share?</p>
            <button type="button" class="recipebutton" onclick="navigateToRecipePage('recipeinputform.php')">SUBMIT A RECIPE</button>
        </div>

        <div class="Footer">
            <p class="copyright">&copy; The Cookie Crumb Factory 2023</p>
        </div>
    </div>


    <script>
        console.log('Script loaded. Instructions:', instructions);
        document.addEventListener('DOMContentLoaded', () => {
            let lastServingSize = 'normal'; 
            const halfButton = document.querySelector('.halfbutton');
            const normalButton = document.querySelector('.normalbutton');
            const doubleButton = document.querySelector('.doublebutton');
            const instructionButton = document.querySelector('.instruction-button');
            const ingredientsButton = document.querySelector('.ingredients-button');
            const closeAllButton = document.querySelector('.close-all');

            halfButton.addEventListener('click', () => {
                console.log('Half button clicked');
                updateInstructionsAndIngredients('oatmealCookieHalf');
            });

            normalButton.addEventListener('click', () => {
                console.log('Normal button clicked');
                updateInstructionsAndIngredients('oatmealCookieNormal');
            });

            doubleButton.addEventListener('click', () => {
                console.log('Double button clicked');
                updateInstructionsAndIngredients('oatmealCookieDouble');
            });

            instructionButton.addEventListener('click', () => {
                console.log('Instructions button clicked');
                displayInstructions(lastServingSize);
            });

            ingredientsButton.addEventListener('click', () => {
                console.log('Ingredients button clicked');
                displayIngredients(lastServingSize);
            });

            closeAllButton.addEventListener('click', () => {
                console.log('Close All button clicked');
                const ingredientsContainer = document.querySelector('.ingredients-container');
                const instructionsContainer = document.querySelector('.instructions-container');

                ingredientsContainer.innerHTML = '';
                instructionsContainer.innerHTML = '';
                ingredientsContainer.style.display = 'none';
                instructionsContainer.style.display = 'none';
            });

            function updateInstructionsAndIngredients(cookieType) {
                lastServingSize = cookieType.replace('oatmealCookie', '');
                displayInstructions(cookieType);
                displayIngredients(cookieType);
            }

            function displayInstructions(cookieType) {
                const instructionsContainer = document.querySelector('.instructions-container');

                if (instructions[cookieType]) {
                    const detailedInstructions = instructions[cookieType].detailed.join('<br>');
                    instructionsContainer.innerHTML = `Instructions (${cookieType}): ${detailedInstructions}`;
                    instructionsContainer.style.display = 'block';
                } else {
                    console.error(`Instructions for ${cookieType} not found.`);
                }
            }

            function displayIngredients(cookieType) {
                const ingredientsContainer = document.querySelector('.ingredients-container');

                if (instructions[cookieType]) {
                    const detailedIngredients = instructions[cookieType].ingredients.join('<br>');
                    ingredientsContainer.innerHTML = `Ingredients (${lastServingSize}): ${detailedIngredients}`;
                    ingredientsContainer.style.display = 'block';
                } else {
                    console.error(`Instructions for ${cookieType} not found.`);
                    instructionsContainer.innerHTML = 'Instructions not available.';
                    instructionsContainer.style.display = 'block';
                }
            }

            function navigateToRecipePage(pageURL) {
                window.location.href = pageURL;
            }
        });
    </script>
        
    
</body>
</html>
