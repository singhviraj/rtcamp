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
function test($a ,$b){
    if($_SESSION["code1"]  == 1){
    while($_SESSION["code1"]){
for($i=1;$i>0;$i++){
         $temp = date('i');
         if($b>60){
             $b =$b-60;
             if($b==$temp){
                $a= $temp;
                $b =$a+1;
                mail("sviraj347@gmail.com","heey" ,"hi");
                test($a,$b);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                mail("sviraj347@gmail.com","heey" ,"hi");
                test($a,$b);
                 } 
         }        
    }
    }}
    if($_SESSION["code1"]  == 0){
        echo"to restart you need to login and verify your identity again";
    }
    
    }
            
?>
