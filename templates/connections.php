<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hugsforbugs";


$name = $_POST["name"];
$mobile = $_POST["mobile"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO enrolldata VALUES ('$name', $mobile)";

if ($conn->query($sql) === TRUE) {
  header('Location: thankyou.html');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>