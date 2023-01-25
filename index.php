<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        $name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $gender = test_input($_POST["gender"]);
  if(filter_var($email ,FILTER_VALIDATE_EMAIL)== TRUE && empty($name) == FALSE && empty($gender) == FALSE){
      $correctemail ="<html>
    <head>
       <title></title> </head>
    <body>
    <form method ='post' action ='newEmptyPHP.php'>
    <h4>Perfect! the details are valid . To verify yourself with the 2 step verification kindly click on the button below</h4>
    <input type='submit' name='submitcode' value ='Submit'>  
    </form>
    </body>
</html>";
      echo $correctemail;
      
  }
  if(filter_var($email ,FILTER_VALIDATE_EMAIL)== FALSE){
      $incorrectemail ="email is incorrect . Kindly try again";
      echo $incorrectemail;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        ?>
    </head>
    <body>
       <h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
    </body>
</html>
  <?php
echo "<h2>Enter your 2sv code here:</h2>";
echo "your name".$name;
echo "your name".$email;
echo "your name".$gender;

     ?>