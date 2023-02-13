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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $password1 = test_input($_POST["password1"]);
  $password2 = test_input($_POST["password2"]);
  if(filter_var($email ,FILTER_VALIDATE_EMAIL)== TRUE && empty($name) == FALSE && $password1 == $password2){
      $random = rand(10,1000);
      mail($email, "one time code", $random);
      $correctemail ="<html>
    <head>
       <title></title> </head>
    <body>
    <form method ='post' action ='verify2sv.php'>
    <input type='hidden' name='hiddencode' value =$random>
    <input type='hidden' name='name' value =$name>
    <input type='hidden' name='email' value =$email> 
    <input type='hidden' name='password' value =$password1>
     <input type='number' name='twosvcode' >   
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
  if($password1!=$password2){
      echo"kindly check the passwords";
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
       <h2>PHP Form Validation To create account</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Password: <input type="password" name="password1">
  <br><br>
  Enter password again: <input type="password" name="password2">
  <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
    </body>
</html>
  