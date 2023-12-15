<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  
        * {
            padding: 0;
            margin: 0;
        }

        .grid {
            display: grid;
            grid-template-areas: 'Menu Menu Main Main Main Main';
        }

        .Menu {
            grid-area: Menu;
            padding: 50px;
            margin-top: 30px;
            margin-left: 25px;
            background-color: #7b442f;
        }

        .Main {
            grid-area: Main;
            background-size: cover;
            width: 150px;
            height: 150px;
        }

        h3 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        #submitBtn {
            margin-top:20px;
    
        }

        .Main img {
            height: 550px;
            width:525px;
        }
    

    </style>
</head>
<body>
      
    <h3>Welcome to your Recipe Console</h3>
    <div class="grid">

        <div class="Menu">
            <form action="adminprocessform.php" method="post">
                <label for="recipe">Recipe Name:</label>
                <input type="text" name="recipe"  required><br>

                <label for="cookie">Type of Cookie:</label>
                <input type="text" name="cookie" required><br>

                <label for="servings">Serving Size:</label>
                <input type="text" name="servings" required><br>

                <label for="ingredients">Ingredients:</label>
                <textarea name="ingredients" rows="10" cols="30" required></textarea><br>

                <label for="instructions">Instructions:</label>
                <textarea name="instructions" rows="10" cols="30" required></textarea><br>

                <!-- Honeypot field -->
                <label for="honeypot" style="display:none;">Leave this field blank:</label>
                <input type="text" id="honeypot" name="honeypot" style="display:none;">

                <input type="submit" value="Submit">
            </form>
          

        </div>
        <div class="Main">
            <img src="cookiedoughbowl.png" alt="cookiedough">
            
            
        </div>

    </div>

</body>
</html>