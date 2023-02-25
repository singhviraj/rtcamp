<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
ini_set('max_execution_time', 300);

$x = date("i");
$y = date("i") +1 ;
test($x,$y);
function onrepeatcode($a ,$b){
    
    while($_SESSION["code1"]){
for($i=1;$i>0;$i++){
         $temp = date('i');
         if($b>60){
             $b =$b-60;
             if($b==$temp){
                $a= $temp;
                $b =$a+1;
                $apirandom =rand(1,1000);
                 repeatingimage($apirandom,$email1);
                onrepeatcode($a,$b);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                $apirandom =rand(1,1000);
                 repeatingimage($apirandom,$email1);
                
                onrepeatcode($a,$b);
                 } 
         }        
    }
    }
    if($_SESSION["code1"]  == 0){
        //unset can be used like this
         unset($_SESSION['code1']); 
        echo"to restart you need to login and verify your identity again";
    }
    
    }
            
?>
