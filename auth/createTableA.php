<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notably";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE User (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    conform_userP VARCHAR(255) NOT NULL

 )";

if ($conn->query($sql) === TRUE) {
  echo "Table Notes created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
