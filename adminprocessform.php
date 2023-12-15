<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'dbConnect4.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $honeypot = $_POST['honeypot'];

    if (empty($honeypot)) {
        $recipe_name = htmlspecialchars($_POST['recipe']);
        $cookie_types = htmlspecialchars($_POST['cookie']);
        $size_serving = htmlspecialchars($_POST['servings']);
        $cookie_ingredients = htmlspecialchars($_POST['ingredients']);
        $Instructions = htmlspecialchars($_POST['instructions']);

        $date_inserted = date('Y-m-d H:i:s');
        $date_updated = date('Y-m-d H:i:s');

        try {
            $sql = "INSERT INTO cookie_input (recipe_name, cookie_types, size_serving, cookie_ingredients, Instructions)
                    VALUES (:recipe_name, :cookie_types, :size_serving, :cookie_ingredients, :Instructions)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':recipe_name', $recipe_name);
            $stmt->bindParam(':cookie_types', $cookie_types);
            $stmt->bindParam(':size_serving', $size_serving);
            $stmt->bindParam(':cookie_ingredients', $cookie_ingredients);
            $stmt->bindParam(':Instructions', $Instructions);
          

            $stmt->execute();

            echo "Event successfully added to the database!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $conn = null;
    } else {
        echo "Form submission failed. Please try again.";
    }
}
?>
