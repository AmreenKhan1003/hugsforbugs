<?php

$name = $_POST["name"];
$mobile = $_POST["mobile"];

$_ENV = parse_ini_file('.env');

$hostname = $_ENV['HOST'];
$dbName = $_ENV['DATABASE'];
$username = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];
$ssl = $_ENV['MYSQL_ATTR_SSL_CA'];

// Initialize MYSQL Object
$mysqli = mysqli_init();

// Assign SSL certificate for the created MYSQL Object
$mysqli->ssl_set(NULL, NULL, $ssl, NULL, NULL);

// Establishing connection with the planetscale database
$mysqli->real_connect($hostname, $username, $password, $dbName);


// Check database connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$sql = "INSERT INTO enrolldata VALUES ('$name', $mobile)";

if ($mysqli->query($sql) === TRUE) {
  header('Location: thankyou.html');
} else {
  echo "Error: " . $mysqli . "<br>" . $mysqli->error;
}

$mysqli->close();

?>