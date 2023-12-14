<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $honeypot = $_POST['honeypot'];

    if (empty($honeypot)) {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email_address'];

        echo "Thank you $firstName $lastName. ";
        echo "A signup confirmation has been sent to $email. Thank you for your support!";
      
    } else {
        echo "Form submission failed. Please try again.";
    }
}
?>


<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Intro HTML and CSS</title>

<head>
 <style>

	form	{
		width:600px;
		margin:auto;
		background-color:rgb(24, 119, 151);	
		padding-left: 20px;
    padding-top: 1px;
    padding-bottom: 10px;
	}
	
	form legend	{
		font-size:larger;
		text-align:center;
    background-color: aqua;
    Color:white;
    margin: 45px;
    padding: 10px;
	}
	
	h2,h1 {
    text-align: center;
  }



form p.buttons {
    margin-top: 20px;
}


form p.buttons input {
    margin-right: 10px; 
}

</style>

</head>

<body>
<h1>WDV101 Intro HTML and CSS</h1>
<h2>5-1 HTML Form Processor</h2>

<form id="form1" name="form1" method="post" action="formHandler.php">
  <legend>DMACC STUDENT INFORMATION FORM</legend>
  
  <p>
  	<label for="first_name">First Name:</label> 
    <input type="text" name="first_name" id="first_name" />
  </p>
  
  <p>
  	<label for="last_name">Last Name:</label> 
    <input type="text" name="last_name" id="last_name" />
  </p>
  
  <p>
  	<label for="school_name">School Name:</label> 
    <input type="text" name="school_name" id="school_name" />
  </p>
  <p>
  	<label for="email_address">Email Address:</label> 
    <input type="text" name="email_address" id="email_address" />
  </p>
  
    <p>What is your current academic standing?</p>
    <p>
      <p>What is your current academic standing?</p>
      <input type="radio" id="highSchooler" name="academicStanding" value="High Schooler" required>
      <label for="highSchooler">High School</label><br>
      <input type="radio" id="freshman" name="academicStanding" value="Freshman">
      <label for="freshman">Freshman</label><br>
      <input type="radio" id="sophomore" name="academicStanding" value="Sophomore">
      <label for="sophomore">Sophomore</label><br>
    </p>
    <p>
      <label for="selectedMajor">Please select your Major</label>
      <select name="selectedMajor" id="selectedMajor" required>
        <option value="">Please select a Major</option>
        <option value="CIS">Computer Information Systems</option>
        <option value="GRD">Graphic Design</option>
        <option value="WDV">Web Development</option>
      </select>
    </p>
    <p>
      <p>What information do you need from us?</p>
      <input type="checkbox" id="programInfo" name="programInfo" value="Program Information">
      <label for="programInfo">Please contact me with program information</label><br>
      <input type="checkbox" id="advisorContactInfo" name="advisorContactInfo" value="Program Advisor Contact Information">
      <label for="advisorContactInfo">I would like to contact an program advisor</label><br><br>
    </p>
    <p>
    <label for="comments">Comments:</label><br>
    <textarea id="comments" name="comments" rows="8" cols="70">

    </textarea>
  </p>
  
  
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" />
  </p>
  
 
</form>

<p>&nbsp;</p>
</body>

</html>
