<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function onrepeatcode($a,$b){
for($i=1;$i>0;$i++){
         $temp = date('i');
         if($b>60){
             $b =$b-60;
             if($b==$temp){
                $a= $temp;
                $b =$a+1;
                mail('test2mail2698@gmail.com', 'hey', 'yo');
                onrepeatcode($a ,$b);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                 mail('test2mail2698@gmail.com', 'hey','yo');
                onrepeatcode($a ,$b);
                 } 
         }        
     }
}
     
     $x =date('i');
 $y =date('i')+ 1; 
 onrepeatcode($x,$y);