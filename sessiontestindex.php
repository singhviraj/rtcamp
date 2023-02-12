<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // here I will first verify the username and passwordthgen ,then initiate the session code
$_SESSION["code1"] = 1;
echo $_SESSION["code1"];
$x = "<html>
    <head>
    </head>
    <body>
       <h2>PHP Form Validation To start emails</h2>
<form method='post' action='sessionteststart.php'>  
       <input type='submit' name='start' value='start'> 
</form>
<form method='post' action='sessionteststop.php'>  
       <input type='submit' name='stop' value='stop'> 
</form>
        </body>
</html>";
echo $x ;

}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
       <h2>PHP Form Validation To start emails</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    
     <input type="submit" name="submit" value="verifystartstopform"> 
</form>
       
    </body>
</html>