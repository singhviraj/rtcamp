<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

session_start();
ini_set('max_execution_time', 480);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
$x = date("i");
$y = date("i") +1 ;
$email = $_POST["hiddenemail"];
onrepeatcode($x,$y,$email);

}
function onrepeatcode($a ,$b,$email1){
    
    if($_SESSION["code1"]  == 0){
        //unset can be used like this
         //unset($_SESSION['code1']); 
        echo"to restart you need to login and verify your identity again";
    }
    
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
                onrepeatcode($a,$b,$email1);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                $apirandom =rand(1,1000);
                 repeatingimage($apirandom,$email1);
                
                onrepeatcode($a,$b,$email1);
                 } 
         }        
    }
    }

    }

function repeatingimage($rep1,$email2){
$img= "https://xkcd.com/".$rep1."/info.0.json";

$curl = curl_init($img);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// 2. Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);
$x = $data->img;
//echo $x ;
$curl1 = curl_init($x);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
// 2. Set the CURLOPT_POST option to true for POST request

curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
$response1 = curl_exec($curl1);

//$header .= "Content-Type: image/jpeg; boundary=\"".$uid."\"\r\n\r\n";// earler i was using multipart/mixed
//$header .= "Content-Transfer-Encoding: base64\r\n";

$uid = md5(uniqid(time()));
//$link = "https://imgs.xkcd.com/comics/woodpecker.png";
$link = $x;
$content = chunk_split(base64_encode($response1));


$subject = 'hey';
 $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
   // $headers .= "From:".$from_email."\r\n"; // Sender Email
    //$headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email address to reach back
    $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
    $headers .= "boundary = simpleboundary\r\n"; //Defining the Boundary
         
    //plain text
    $body = "--simpleboundary\r\n";
    $body .= "Content-Type: text/plain\r\n";
    $body .="Content-Disposition: inline\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= $x."\r\n";
         
    //inline image
    $body .= "--simpleboundary\r\n";
    $body .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
   // $body .="Content-Disposition: attachment\r\n";
   //$body .="Content-Transfer-Encoding: base64\r\n";
    $body .= "<html><head>
<title>Your email at the time</title>
</head>
<body>
<img src=$x width =100 height =100>
</body>
</html>\r\n";
   
    //attachment
    $body .= "--simpleboundary\r\n";
    $body .="Content-Type: image/jpeg\r\n";
    $body .="Content-Disposition: attachment\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .= $content."/r/n"; // Attaching the encoded file with email
    $body .= "--simpleboundary--\r\n";
    
     mail($email2, $subject, $body, $headers);
}
