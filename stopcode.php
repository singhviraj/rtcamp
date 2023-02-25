<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
ini_set('max_execution_time', 480);
session_start();
//if the stopcode is pressed after startcode
if (isset($_SESSION['code1']) == TRUE && $_SESSION['code1'] == 1){
         $_SESSION["code1"] = 0;
     echo"kindly login again to start the emails";    
     }
     //to stop an already stopped feature after loggin the index
    // if (isset($_SESSION['code1']) == TRUE && $_SESSION['code1'] == 0){
      //   unset($_SESSION['code1']); 
       //  echo"Currently,there were no emails running for this user .To stop the emails for this user you need to first start the emails";

     //}
     //if (isset($_SESSION['code1']) == FALSE){
       //  echo"Currently,there were no emails running for this user .To stop the emails for this user you need to first start the emails";
     //}
    
?>

