<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="chocolatechipstyle.css">
    <link rel="stylesheet" href="chocolatechipstyle.scss">
    <title>Document</title>
</head>
<body>
    <script src="chocolateinstructions.js"></script>
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
            <h2>Chocolate Chip Cookies</h2>
            <p>Serves: 8-20 </p>
            <p>Difficulty Level: Easy</p>
            <p>Preparation Time: 10-15 Minutes </p>
            <img src="Chocolatechip5.png" alt="Chocolate Chip" width="300" height="300">
            <button type="button" class="Oatnavbutton" onclick="navigateToRecipePage('sugarcookie.php')">Sugar Cookie</button>
           
        </div>

        <div class="Main">
            <p>Chocolate chip cookies are a favorite and easy recipe to make.</p>
        </div>

        <div class="Right">
            <h3>Serving Size</h3>
            <button type="button" class="halfbutton">Half</button>
            <button type="button" class="normalbutton">Normal</button>
            <button type="button" class="doublebutton">Double</button><br><br>
            <button type="button" class="ingredients">Ingredients</button>
            <div class="ingredients-container"></div><br><br>
            <button type="button" class="instruction">Instructions</button>
            <div class="instructions-container"></div>
            
            <!-- Close All button for both ingredients and instructions -->
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
        let lastServingSize = 'normal';
        let instructions = loadInstructions();
    
        document.querySelector('.halfbutton').addEventListener('click', () => {
            updateInstructionsAndIngredients('chocolateChipHalf');
        });
    
        document.querySelector('.normalbutton').addEventListener('click', () => {
            updateInstructionsAndIngredients('chocolateChipNormal');
        });
    
        document.querySelector('.doublebutton').addEventListener('click', () => {
            updateInstructionsAndIngredients('chocolateChipDouble');
        });
    
        document.querySelector('.instruction').addEventListener('click', () => {
            displayInstructions(lastServingSize);
        });
    
        document.querySelector('.ingredients').addEventListener('click', () => {
            displayIngredients(lastServingSize);
        });
    
        // Close All button
        document.querySelector('.close-all').addEventListener('click', () => {
            const ingredientsContainer = document.querySelector('.ingredients-container');
            const instructionsContainer = document.querySelector('.instructions-container');
    
            ingredientsContainer.style.display = 'none';
            instructionsContainer.style.display = 'none';
        });
    
        function updateInstructionsAndIngredients(cookieType) {
            lastServingSize = cookieType.replace('chocolateChip', '');
            displayInstructions(cookieType);
            displayIngredients(cookieType);
    
            saveToLocalStorage('cookieInstructions', instructions);
        }
    
        function displayInstructions(cookieType) {
            const instructionsContainer = document.querySelector('.instructions-container');
    
            if (recipeInstructions[cookieType]) {
                const detailedInstructions = recipeInstructions[cookieType].detailed.join('<br>');
                instructionsContainer.innerHTML = `Instructions (${cookieType}): ${detailedInstructions}`;
                instructionsContainer.style.display = 'block';
            } else {
                console.error(`Instructions for ${cookieType} not found.`);
            }
        }
    
        function displayIngredients(cookieType) {
            const ingredientsContainer = document.querySelector('.ingredients-container');
    
            if (recipeInstructions[cookieType]) {
                const detailedIngredients = recipeInstructions[cookieType].ingredients.join('<br>');
                ingredientsContainer.innerHTML = `Ingredients (${lastServingSize}): ${detailedIngredients}`;
                ingredientsContainer.style.display = 'block';
            } else {
                console.error(`Ingredients for ${cookieType} not found.`);
            }
        }
    
        function loadInstructions() {
            let storedInstructions = localStorage.getItem('cookieInstructions');
            return storedInstructions ? JSON.parse(storedInstructions) : {};
        }
    
        function saveToLocalStorage(key, data) {
            localStorage.setItem(key, JSON.stringify(data));
        }
    
        function navigateToRecipePage(pageURL) {
            window.location.href = pageURL;
        }
    
        const recipeInstructions = {
            chocolateChipHalf: {
                detailed: ["Preheat the oven to 350°F (180°C).",
                    "Combine half the amount of flour, sugar, and chocolate chips.",
                    "Bake for 10 minutes or until golden brown."
                ],
                ingredients: ["1/2 cup flour",
                    "1/2 cup sugar",
                    "1/2 cup chocolate chips"
                ]
            },
            chocolateChipNormal: {
                detailed: ["Preheat the oven to 350°F (180°C).",
                    "Combine the specified amount of flour, sugar, and chocolate chips.",
                    "Bake for 12 minutes or until golden brown."
                ],
                ingredients: ["1 cup flour",
                    "1 cup sugar",
                    "1 cup chocolate chips"
                ]
            },
            chocolateChipDouble: {
                detailed: ["Preheat the oven to 350°F (180°C).",
                    "Double the amount of flour, sugar, and chocolate chips.",
                    "Bake for 15 minutes or until golden brown."
                ],
                ingredients: ["2 cups flour",
                    "2 cups sugar",
                    "2 cups chocolate chips"
                ]
            }
        };
    </script>
    




</body>
</html>
