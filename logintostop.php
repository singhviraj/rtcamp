<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "localhost";
$username = "root";
$password = "";
$database1 = "test";
// Creating a connection

$conn = new mysqli($servername, $username, $password, $database1);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$email = test_input($_POST["email"]);
    $accountpassword = test_input($_POST["password"]);
 
if(empty($accountpassword)== FALSE && empty($email)== FALSE){
    $sql1 = "SELECT name FROM t20 WHERE email ='$email' AND password='$accountpassword' ";
$result1 = $conn->query($sql1);

 if ($result1->num_rows > 0) {
  // output data of each row
     $sql2 = "DELETE code FROM t20 WHERE email = '$email'";
     $result2=$conn->query($sql2);
     if ($result2->num_rows > 0){
         echo'code is deleted';
         
     }
     if ($result2->num_rows == 0){
         echo"the mails have already stopped . You can stop them again once you start again";
            
     }
 }
    if($result1->num_rows == 0){
        echo 'either one is incorrect';
    }
  }
}
if(empty($accountpassword)== TRUE || empty($email)== TRUE){
    
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
       <h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  E-mail: <input type="text" name="email">
  <br><br>
  Password: <input type="password" name="password">
  <br><br>
     <input type="submit" name="submit" value="Submit"> 
</form>
    </body>
</html>