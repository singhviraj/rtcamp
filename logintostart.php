<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//ini_set('max_execution_time', 300);// i have not included this line in the commit

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
                $rep =rand(1,1000);
                repeatingimage($rep);
                onrepeat($a ,$b);
                 }
         }
         if($b<=60){
            if($b==$temp){
                $a= $temp;
                $b =$a+1;
                 $rep =rand(1,1000);
                 repeatingimage($rep);
                onrepeat($a ,$b);
                 } 
         }        
     }
}

function repeatingimage($rep1){
$img= "https://xkcd.com/".$rep1."/info.0.json";

$curl = curl_init($img);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// 2. Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);
$x = $data->img;
echo $x ;
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
    
     mail('test2mail2698@gmail.com', $subject, $body, $headers);
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
  