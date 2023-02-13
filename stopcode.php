<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if (isset($_SESSION['code1'])){
         $_SESSION["code1"] = 0;
     echo"kindly login again to start the emails";    
     }
     else{
         echo"Currently,there were no emails running for this user .To stop the emails for this user you need to first start the emails";
     }
?>

