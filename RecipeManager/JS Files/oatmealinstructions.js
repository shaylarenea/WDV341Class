document.addEventListener('DOMContentLoaded', () => {
    let lastServingSize = 'normal'; // Default serving size
    let instructions;
    
    let storedInstructions = localStorage.getItem('instructions');
    if (storedInstructions) {
        instructions = JSON.parse(storedInstructions);
    } else {
        //  local storage
        instructions = {
           
        };
        // Save default instructions to local storage
        localStorage.setItem('instructions', JSON.stringify(instructions));
    }

    const recipeInstructions = {
        oatmealCookieHalf: {
            detailed: ["Preheat the oven to 350°F (175°C) and line a baking sheet with parchment paper.",
                "In a medium-sized bowl, mix together 1/2 cup rolled oats, 3/8 cup all-purpose flour, 1/4 teaspoon baking soda, 1/4 teaspoon cinnamon, and 1/8 teaspoon salt.",
                "In a separate large bowl, cream together 1/4 cup softened unsalted butter, 1/4 cup brown sugar, and 1/8 cup granulated sugar until smooth.",
                "Beat in 1/2 egg and 1/2 teaspoon vanilla extract until well combined.",
                "Gradually add the dry ingredients to the wet ingredients, mixing until just combined. If desired, fold in 1/8 cup raisins or chocolate chips.",
                "Drop rounded tablespoons of dough onto the prepared baking sheet. Bake for 10 minutes or until golden brown.",
                "Allow the cookies to cool on the baking sheet for a few minutes before transferring them to a wire rack to cool completely."
            ],
            ingredients: ["1/2 cup rolled oats",
                "3/8 cup all-purpose flour",
                "1/4 teaspoon baking soda",
                "1/4 teaspoon cinnamon",
                "1/8 teaspoon salt",
                "1/4 cup unsalted butter, softened",
                "1/4 cup brown sugar, packed",
                "1/8 cup granulated sugar",
                "1/2 egg",
                "1/2 teaspoon vanilla extract",
                "1/8 cup raisins or chocolate chips (optional)"
            ]
        },
        oatmealCookieNormal: {
            detailed: ["Preheat the oven to 350°F (175°C) and line a baking sheet with parchment paper.",
                "In a medium-sized bowl, mix together 1/2 cup rolled oats, 3/8 cup all-purpose flour, 1/4 teaspoon baking soda, 1/4 teaspoon cinnamon, and 1/8 teaspoon salt.",
                "In a separate large bowl, cream together 1/4 cup softened unsalted butter, 1/4 cup brown sugar, and 1/8 cup granulated sugar until smooth.",
                "Beat in 1/2 egg and 1/2 teaspoon vanilla extract until well combined.",
                "Gradually add the dry ingredients to the wet ingredients, mixing until just combined. If desired, fold in 1/8 cup raisins or chocolate chips.",
                "Drop rounded tablespoons of dough onto the prepared baking sheet. Bake for 10 minutes or until golden brown.",
                "Allow the cookies to cool on the baking sheet for a few minutes before transferring them to a wire rack to cool completely."
            ],
            ingredients: ["1 cup rolled oats",
                "3/4 cup all-purpose flour",
                "1/2 teaspoon baking soda",
                "1/2 teaspoon cinnamon",
                "1/4 teaspoon salt",
                "1/2 cup unsalted butter, softened",
                "1/2 cup brown sugar, packed",
                "1/4 cup granulated sugar",
                "1 large egg",
                "1 teaspoon vanilla extract",
                "1/2 cup raisins or chocolate chips (optional)"
            ]
        },
        oatmealCookieDouble: {
            detailed: ["Preheat the oven to 350°F (175°C) and line a baking sheet with parchment paper.",
                "In a medium-sized bowl, mix together 2 cup rolled oats, 1 1/2 cup all-purpose flour, 1 teaspoon baking soda, 1 teaspoon cinnamon, and 1/2 teaspoon salt.",
                "In a separate large bowl, cream together 1 cup softened unsalted butter, 1 cup brown sugar, and 1/2 cup granulated sugar until smooth.",
                "Beat in 2 eggs and 2 teaspoon vanilla extract until well combined.",
                "Gradually add the dry ingredients to the wet ingredients, mixing until just combined. If desired, fold in 1 cup raisins or chocolate chips.",
                "Drop rounded tablespoons of dough onto the prepared baking sheet. Bake for 15 minutes or until golden brown.",
                "Allow the cookies to cool on the baking sheet for a few minutes before transferring them to a wire rack to cool completely."
            ],
            ingredients: ["2 cups rolled oats",
                "1 1/2 cups all-purpose flour",
                "1 teaspoon baking soda",
                "1 teaspoon cinnamon",
                "1/2 teaspoon salt",
                "1 cup unsalted butter, softened",
                "1 cup brown sugar, packed",
                "1/2 cup granulated sugar",
                "2 large eggs",
                "2 teaspoons vanilla extract",
                "1 cup raisins or chocolate chips (optional)"
            ]
        }
       
    };

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

    function navigateToRecipePage(pageURL) {
        window.location.href = pageURL;
    }
});
