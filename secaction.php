<?php

function sanitize_sql_strin($string)
{
$string = addslashes($string);
$string = str_replace(";","",$string);
return $string;
}

$servername = "localhost";
$username = "root";
$password = "1";
$dbname = "sqlwebapp";
$xname = $_GET["fname"];
$xname = sanitize_sql_strin($xname);
//echo $xname;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT id, name, age,city FROM main WHERE name = ?");
$stmt->bind_param("s", $xname);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows === 0) exit('No rows');
$stmt->bind_result($id, $name, $age,$city);
$stmt->fetch();
echo "ID: ". $id."<br>";
echo "Name: ". $name."<br>";
echo "Age ". $age."<br>";
echo "City: ". $city."<br>";
$stmt->close();

//$sql = "SELECT id, name, age, city FROM main WHERE name='$xname'";
//$result = $conn->query($sql);
 
//if ($result->num_rows > 0) {
  // output data of each row
//  while($row = $result->fetch_assoc()) {
//echo "<br>";    
//echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Age: " . $row["age"]. " - City: " . $row["city"] . "<br>";
 // }
//} else {
 // echo "0 results";
//}
$conn->close();
?>
