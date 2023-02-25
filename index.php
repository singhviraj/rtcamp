<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = test_input($_POST["email"]);
    $accountpassword = test_input($_POST["password"]);
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(empty($accountpassword)== FALSE && empty($email)== FALSE){
    
$sql1 = "SELECT name FROM t1 WHERE email ='$email' AND password='$accountpassword' ";
$result1 = $conn->query($sql1);

 if ($result1->num_rows > 0) {
  // output data of each row
     
     $_SESSION["code1"] = 1;
         $s ="<html>
    <head>
        <title>TODO supply a title</title>
        
    </head>
    <body>
        <form method='post' action='startcode.php'>  
  <input type='hidden' name='hiddenemail' value='$email'> 
  <br><br>
     <input type='submit' name='submit' value='startcode'> 
        </form><!-- comment -->
        <form method='post' action='stopcode.php'>  
  <input type='hidden' name='hiddenemail' value='$email'>
      <input type='hidden' name='hiddenpassword' value='$accountpassword'>
  <br><br>
     <input type='submit' name='submit' value='stopcode'> 
        </form><!-- comment -->
    </body>
</html>";
echo $s ;
 }
    if($result1->num_rows == 0){
        echo 'either your password or username is incorrect . Kindly check again or create an account';
    }
}
  
 if(empty($accountpassword)== TRUE || empty($email)== TRUE){
    echo'you can not leave it blank';
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
       <h2>PHP Form Validation To start emails</h2>
       <h5> to start the emails you would need to login again</h5>
       <h5>if stop code is clicked before start code and just after the index login , 
       in this case you would need to reverify your identity through login again</h5>
       <h5>the program is codded to test one user at a time because only one session variable is declared</h5>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  E-mail: <input type="text" name="email">
  <br><br>
  Password: <input type="password" name="password">
  <br><br>
     <input type="submit" name="submit" value="Submit"> 
</form>
       <br><br>
       <a href ="createaccount.php"> create account</a> 
    </body>
</html>
  