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

    <div class="grid">
        <div class="Navbar">
            <img src="Cookie Crumb Short Logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="cookiecrumbfactory2.php">HOME</a></li>
                <li><a href="recipeinputform.php">SUBMIT RECIPES</a></li>
                <li><a href="signin.php">SIGN IN</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
        </div>

        <div class="Left">
            <h2>Sugar Cookies</h2>
            <p>Serves: 8-20 </p>
            <p>Difficulty Level: Medium</p>
            <p>Preparation Time: 10-15 Minutes </p>
            <img src="whitesugarcookie.png" alt="Sugacookie" width="300" height="300">
            <button type="button" class="Oatnavbutton" onclick="navigateToRecipePage('chocolatechip.php')">Chocolate Chip</button>
        </div>

        <div class="Main">
            <p>Sweet Cookies with an extra sugary topping.</p>
        </div>

        <div class="Right">
            <h3>Serving Size</h3>
            <button type="button" class="halfbutton">Half</button>
            <button type="button" class="normalbutton">Normal</button>
            <button type="button" class="doublebutton">Double</button><br><br>
            <button type="button" class="ingredients">Ingredients</button>
            <div class="ingredients-container"></div><br><br>
            <button type="button" class="instruction">Instructions</button>
            <div class="instructions-container"></div><br>
            
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

    <script src="sugarinstructions.js"></script>
    <script>
        let lastServingSize = 'normal'; // Default serving size
        let instructions = loadInstructions();

        const recipeInstructions = {
            sugarCookieHalf: {
                detailed: ["Preheat the oven to 375°F (190°C).",
                    "Combine half the amount of flour, sugar, and butter.",
                    "Add any additional ingredients for flavor.",
                    "Bake for 10-12 minutes or until the edges are lightly golden."
                ],
                ingredients: ["1 cup all-purpose flour",
                    "1/2 cup sugar",
                    "1/2 cup butter",
                    "Additional flavorings (e.g., vanilla extract)"
                ]
            },
            sugarCookieNormal: {
                detailed: ["Preheat the oven to 375°F (190°C).",
                    "Combine the specified amount of flour, sugar, and butter.",
                    "Add any additional ingredients for flavor.",
                    "Bake for 10-12 minutes or until the edges are lightly golden."
                ],
                ingredients: ["2 cups all-purpose flour",
                    "1 cup sugar",
                    "1 cup butter",
                    "Additional flavorings (e.g., vanilla extract)"
                ]
            },
            sugarCookieDouble: {
                detailed: ["Preheat the oven to 375°F (190°C).",
                    "Double the amount of flour, sugar, and butter.",
                    "Add any additional ingredients for flavor.",
                    "Bake for 15 minutes or until the edges are lightly golden."
                ],
                ingredients: ["4 cups all-purpose flour",
                    "2 cups sugar",
                    "2 cups butter",
                    "Additional flavorings (e.g., vanilla extract)"
                ]
            }
        };

        document.querySelector('.halfbutton').addEventListener('click', () => {
            updateInstructionsAndIngredients('sugarCookieHalf');
        });

        document.querySelector('.normalbutton').addEventListener('click', () => {
            updateInstructionsAndIngredients('sugarCookieNormal');
        });

        document.querySelector('.doublebutton').addEventListener('click', () => {
            updateInstructionsAndIngredients('sugarCookieDouble');
        });

        document.querySelector('.instruction').addEventListener('click', () => {
            displayInstructions(lastServingSize);
        });

        document.querySelector('.ingredients').addEventListener('click', () => {
            displayIngredients(lastServingSize);
        });

        // Close All button click event
        document.querySelector('.close-all').addEventListener('click', () => {
            const ingredientsContainer = document.querySelector('.ingredients-container');
            const instructionsContainer = document.querySelector('.instructions-container');

            ingredientsContainer.innerHTML = '';
            instructionsContainer.innerHTML = '';
            ingredientsContainer.style.display = 'none';
            instructionsContainer.style.display = 'none';
        });

        function updateInstructionsAndIngredients(cookieType) {
            lastServingSize = cookieType.replace('sugarCookie', ''); 
            displayInstructions(cookieType);
            displayIngredients(cookieType);

            saveToLocalStorage('cookieInstructions', instructions);
        }

        function displayInstructions(cookieType) {
            const instructionsContainer = document.querySelector('.instructions-container');
            const detailedInstructions = recipeInstructions[cookieType].detailed.join('<br>');
            instructionsContainer.innerHTML = `Instructions (${lastServingSize}): ${detailedInstructions}`;
            instructionsContainer.style.display = 'block'; 
        }

        function displayIngredients(cookieType) {
            const ingredientsContainer = document.querySelector('.ingredients-container');
            const detailedIngredients = recipeInstructions[cookieType].ingredients.join('<br>');
            ingredientsContainer.innerHTML = `Ingredients (${lastServingSize}): ${detailedIngredients}`;
            ingredientsContainer.style.display = 'block'; 
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
    </script>
</body>
</html>
