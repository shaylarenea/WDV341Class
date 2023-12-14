document.addEventListener('DOMContentLoaded', () => {
    let lastServingSize = 'normal'; // Default serving size
    let instructions;

    let storedInstructions = localStorage.getItem('cookieInstructions');
    if (storedInstructions) {
        instructions = JSON.parse(storedInstructions);
    } else {
        // Set default instructions if not found in local storage
        instructions = {};
        // Save default instructions to local storage
        localStorage.setItem('cookieInstructions', JSON.stringify(instructions));
    }

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
            detailed: [ "Preheat the oven to 375°F (190°C).",
            "Double the amount of flour, sugar, and butter.",
            "Add any additional ingredients for flavor.",
            "Bake for 15 minutes or until the edges are lightly golden."
            ],
            ingredients: [ "4 cups all-purpose flour",
            "2 cups sugar",
            "2 cups butter",
            "Additional flavorings (e.g., vanilla extract)"
            ]
        }
    };

    const halfButton = document.querySelector('.halfbutton');
    const normalButton = document.querySelector('.normalbutton');
    const doubleButton = document.querySelector('.doublebutton');
    const instructionButton = document.querySelector('.instruction');
    const ingredientsButton = document.querySelector('.ingredients');
    const closeAllButton = document.querySelector('.close-all');

    halfButton.addEventListener('click', () => {
        console.log('Half button clicked');
        updateInstructionsAndIngredients('sugarCookieHalf');
    });

    normalButton.addEventListener('click', () => {
        console.log('Normal button clicked');
        updateInstructionsAndIngredients('sugarCookieNormal');
    });

    doubleButton.addEventListener('click', () => {
        console.log('Double button clicked');
        updateInstructionsAndIngredients('sugarCookieDouble');
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

    function saveToLocalStorage(key, data) {
        localStorage.setItem(key, JSON.stringify(data));
    }

    function navigateToRecipePage(pageURL) {
        window.location.href = pageURL;
    }
});
