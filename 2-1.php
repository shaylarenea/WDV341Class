<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2-1: PHP Basics</title>
    <?php
        $yourName = "Shayla"; // Variable yourName

        // Displayed assignment name in H1 element
        echo "<h1>2-1 PHP Basics</h1>";

        // h2 element to display name
        echo "<h2>$yourName</h2>";

        // number1 number2 and total variables
        $number1 = 8;
        $number2 = 10;
        $total = $number1 + $number2;

        // Display numbers and totals
        echo "<p>Number 1: $number1</p>";
        echo "<p>Number 2: $number2</p>";
        echo "<p>Total: $total</p>";

        // PHP array for program language
        $programLang = ['PHP', 'HTML', 'Javascript'];
    ?>
</head>
<body>
    <h1>2-1: PHP Basics</h1>

    <script>
        // Use PHP variables in JavaScript code
        let yourName = "<?php echo $yourName; ?>";
        let number1 = <?php echo $number1; ?>;
        let number2 = <?php echo $number2; ?>;
        let total = <?php echo $total; ?>;
        let programLang = <?php echo json_encode($programLang); ?>;

        // Log variables to console
        console.log("Your Name:", yourName);
        console.log("Number 1:", number1);
        console.log("Number 2:", number2);
        console.log("Total:", total);
        console.log("Programming Languages:", programLang);

        // Display array values
        document.write("Programming Languages: " + programLang.join(', '));
    </script>
</body>
</html>
