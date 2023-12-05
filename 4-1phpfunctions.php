<?php
//Create a function that will accept a timestamp and format it into mm/dd/yyyy format.
function formatDateMMDDYYYY() {
    echo date("m/d/Y"); //this is the month date and Year setup
}

//Create a function that will accept a timestamp and format it into dd/mm/yyyy format.
function formatDateDDMMYYYY() {
    echo date("d/m/Y"); //this is the day date and month setup for international dates
}

//Create a function that will accept a string input. It will do the following things to the string:
$cookieName = "Chocolate Chips";

function cookieType($cookieName) {
    global $cookieName;
    echo $cookieName;
    echo "<br>";

    //Display the number of characters in the string
    echo "There are " . strlen($cookieName) . " letters in Chocolate Chips.<br>";

    //Trim any leading or trailing whitespace
    echo "Trimmed: " . trim($cookieName) . "<br>";

    //Display the string as all lowercase characters
    echo "Lowercase: " . strtolower($cookieName) . ".<br>";

    //Will display whether or not the string contains "DMACC" either upper or lowercase
    echo "Contains 'DMACC': " . (stripos($cookieName, 'DMACC') !== false ? 'Yes' : 'No') . "<br>";
}

//Create a function that will accept a number and display it as a formatted phone number. Use 1234567890 for your testing.
$phoneNumber = 1234567890;

function displayNumber($phoneNumber) {
    $format_phone =
        substr($phoneNumber, 0, 3) . "-" .
        substr($phoneNumber, 3, 3) . "-" .
        substr($phoneNumber, 6, 4);

    echo $format_phone . "<br>";
}

//Create a function that will accept a number and display it as US currency with a dollar sign. Use 123456 for your testing.
$currencyAmount = 123456;

function displayCurrency($currencyAmount) {
    echo "$" . number_format($currencyAmount);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4-1 PHP Functions</title>
    <style>
        body {
            width:95%;
            margin-right: auto;
            margin-left: auto;
            font-size: 23px;
        }

        p {
            margin: 15px 0; /* Adjusted margin to create space between paragraphs */
        }
        #boxcolor {
            background-color: blue;
        }
    </style>
</head>
<body>
    <h1>4-1 PHP Functions</h1>

    <div id="boxcolor">
        <p>Today is <?php echo formatDateMMDDYYYY(); ?>.</p>

        <p>Today is <?php echo formatDateDDMMYYYY(); ?>.</p>

        <p>My favorite cookie is <?php cookieType($cookieName); ?>.</p>

        <p>My number is <?php displayNumber($phoneNumber); ?>.</p>

        <p>Bling Bling I got <?php displayCurrency($currencyAmount); ?> in the bank.</p>
    </div>
</body>
</html>
