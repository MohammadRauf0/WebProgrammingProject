<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notables";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE Notes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Notes created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
