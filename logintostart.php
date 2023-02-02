<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//ini_set('max_execution_time', 300);

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
    
$sql1 = "SELECT name FROM t20 WHERE email ='$email' AND password='$accountpassword' ";
$result1 = $conn->query($sql1);

 if ($result1->num_rows > 0) {
  // output data of each row
     $sql2 = "SELECT code FROM t20 WHERE email ='$email'";
     $result2=$conn->query($sql2);
     if ($result2->num_rows > 0){
         echo'code is present';
         $x =date('i');
 $y =date('i')+ 1; 
 onrepeat($x,$y);
     }
     if ($result2->num_rows == 0){
         $random =rand(10,1000);
            $sql3 = "INSERT INTO t20(code) VALUES('$random')";
            $result3 =$conn->query($sql3);
            
     }
 }
    if($result1->num_rows == 0){
        echo 'either one is incorrect';
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

function onrepeat($a ,$b){
     for($i=1;$i>0;$i++){
         $temp = date('i');
         if($b>60){
             $b =$b-60;
             if($b==$temp){
                $a= $temp;
                $b =$a+1;
                mail('test2mail2698@gmail.com', 'hey', 'yo');
                onrepeat($a ,$b);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                 mail('test2mail2698@gmail.com', 'hey','yo');
                onrepeat($a ,$b);
                 } 
         }        
     }
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
  