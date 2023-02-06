<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function onrepeatcode($a,$b,$conn1){
    $sql4 = "SELECT code FROM t20 WHERE email ='$email'";
    $res1 =$conn1->query($sql4);
    if($res1->num_rows >0){
for($i=1;$i>0;$i++){
         $temp = date('i');
         if($b>60){
             $b =$b-60;
             if($b==$temp){
                $a= $temp;
                $b =$a+1;
                mail('test2mail2698@gmail.com', 'hey', 'yo');
                onrepeatcode($a ,$b,$conn1);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                 mail('test2mail2698@gmail.com', 'hey','yo');
                onrepeatcode($a ,$b,$conn1);
                 } 
         }        
    }}
    if($res1->num_rows ==0){
        $random =rand(10,1000);
            $sql3 = "UPDATE t20 SET code = '$random' WHERE email='$email'";
            $result3 =$conn->query($sql3);
            $a = date('i');
            $b =date('i')+1;
            onrepeatcode($a,$b,$conn1);
    }
}
     
     $x =date('i');
 $y =date('i')+ 1; 
 onrepeatcode($x,$y,$conn);