<?php
$servername = "localhost";
$username = "root";
$password = "1";
$dbname = "sqlwebapp";
$xname = $_GET["fname"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, age, city FROM main WHERE name='$xname'";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo "<br>";    
echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Age: " . $row["age"]. " - City: " . $row["city"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
