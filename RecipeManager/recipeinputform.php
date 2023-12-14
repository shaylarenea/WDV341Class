<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Inputformstyle.scss">
    <link rel="stylesheet" href="Inputformstyle.css">
    <title>Submit A Recipe</title>
</head>

<body>
    <div class="grid">
        <div class="Navbar">
            <img src="Cookie Crumb Short Logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="cookiecrumbfactory2.php">HOME</a></li>
                <li><a href="recipeinput.form">SUBMIT RECIPES</a></li>
                <li><a href="signin.php">SIGN IN</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
        </div>

        <div class="Left">
            <h4>Submit A Recipe</h4>
            <img src="eatencookie.png" alt="Chocolate Chip" width="300" height="300">
        </div>

        <div class="Main">
            <form id="recipeForm" onsubmit="validateForm(); return false;">
                <label for="recipeName">Name of Recipe:</label>
                <input type="text" id="recipeName" required>
                <span id="nameError" class="error"></span><br><br>

                <label for="recipeImage">Recipe Image:</label>
                <input type="file" id="recipeImage" accept="image/*" required>
                <span id="imageError" class="error"></span><br><br>

                <label for="cookieType">Type of Cookies:</label>
                <input type="text" id="cookieType" required>
                <span id="typeError" class="error"></span><br><br>

                <label for="servingSize">Serving Size:</label>
                <select id="servingSize" required>
                    <option value="half">Half</option>
                    <option value="normal">Normal</option>
                    <option value="double">Double</option>
                </select><br><br>

                <label for="ingredients">Ingredients:</label>
                <textarea id="ingredients"></textarea>
                <button type="button" onclick="addIngredient()">Add Ingredient</button>
                <span id="ingredientsError" class="error"></span><br><br>
                <div id="ingredientList"></div>

                <label for="instructions">Instructions:</label>
                <textarea id="instructions"></textarea>
                <button type="button" onclick="addInstruction()">Add Instruction</button>
                <span id="instructionsError" class="error"></span><br><br>
                <div id="instructionList"></div>

                <button type="submit">Submit</button>
                <button type="button" onclick="resetForm()">Reset Form</button>
                <button type="button" onclick="clearForm()">Clear Form</button>
            </form>

            <!-- Submission message -->
            <div id="submissionMessage" style="display: none;">
                Recipe submitted! Thank you.
            </div>
        </div>

        <div class="Footer">
            <p class="copyright">&copy; The Cookie Crumb Factory 2023</p>
        </div>
    </div>

    <script src="inputinfo.js"></script>
    <script>
        window.onload = loadFromLocalStorage;

function showSubmissionMessage() {
    const submissionMessage = document.getElementById('submissionMessage');
    submissionMessage.style.display = 'block';

   
    setTimeout(() => {
        resetForm();
        submissionMessage.style.display = 'none';
    }, 3000); 
}


function validateForm() {
    document.querySelectorAll('.error').forEach(error => error.textContent = '');


    saveToLocalStorage();

    // Show submission message
    showSubmissionMessage();
}

// Function to reset the form fields
function resetForm() {
    const fieldsToReset = ['recipeName', 'recipeImage', 'cookieType', 'servingSize', 'ingredients', 'instructions'];

   
    fieldsToReset.forEach(field => {
        document.getElementById(field).value = '';
    });

    // Clear the ingredient and instruction lists
    const ingredientList = document.getElementById('ingredientList');
    while (ingredientList.firstChild) {
        ingredientList.removeChild(ingredientList.firstChild);
    }

    const instructionList = document.getElementById('instructionList');
    while (instructionList.firstChild) {
        instructionList.removeChild(instructionList.firstChild);
    }

    // Clear local storage
    localStorage.removeItem('formData');

    // Clear the textareas
    document.getElementById('ingredients').value = '';
    document.getElementById('instructions').value = '';
}
    </script>
</body>

</html>
