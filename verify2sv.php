

 <?php
            
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
       $name = test_input($_POST["name"]);
       $email = test_input($_POST["email"]);
       $accountpassword = test_input($_POST["password"]);
       $hiddencode = test_input($_POST["hiddencode"]);
       $twosvcode = test_input($_POST["twosvcode"]);
       echo $name;
       echo $email;
       echo $hiddencode;
       echo $twosvcode;    
       if($twosvcode == $hiddencode){
           
$servername = "localhost";
$username = "root";
$password = "";
$database1 = "test";
// Creating a connection

$conn = new mysqli($servername, $username, $password, $database1);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
    echo"created successfully";
}
//do not want to create the table again so commenting it 
//$sql = "CREATE TABLE t1 (name varchar(10),email varchar(30),password varchar(20),code varchar(5))";
//if($conn->query($sql)){
  //  echo'table created';
//}

$stmt = $conn->prepare("INSERT INTO t1 (name, email, password,code) VALUES (?, ?, ?,?)");
$stmt->bind_param("ssss", $name, $email, $accountpassword,$twosvcode);

$stmt->execute();
$sql ="SELECT * FROM t1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "name: " . $row["name"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
  }
}
$s ="<html>
    <head>
        <title>TODO supply a title</title>
       
    </head>
    <body>
        <a href='index.php'>click here to go on main page</a>
        
    </body>
</html>
";
echo $s;

      
  }
       else{
           echo"entered code does not match";
       }
             
    }
        
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
