<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "notably";
$tableName = "notes";

// Attempt MySQL server connection
$con = mysqli_connect($serverName, $userName, $password);

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Check if the database exists
if (mysqli_select_db($con, $dbName)) {
    // echo "Connected to existing database: $dbName" . "<br>";
} else {
    // Create the database if it doesn't exist
    $createDatabaseQuery = "CREATE DATABASE $dbName";

    if (mysqli_query($con, $createDatabaseQuery)) {
        // echo "Database created successfully." . "<br>";
        mysqli_select_db($con, $dbName);
    } else {
        die("Failed creating database: " . mysqli_error($con));
    }
}

//checks if a table by the name $tableName exists
$tableExistsQuery = "SHOW TABLES LIKE '$tableName' ";
$result = mysqli_query($con, $tableExistsQuery);

if($result && mysqli_num_rows($result) > 0){
  // echo "Table $tableName exists. <br>";
} else {
  $createTableQuery = "
    CREATE TABLE $tableName (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(255) NOT NULL,
      content TEXT
    )
  ";

  if (mysqli_query($con, $createTableQuery)) {
    // echo "Table $tableName created successfully." . "<br>";
} else {
    die("Failed creating table: " . mysqli_error($con));
}
}
?>