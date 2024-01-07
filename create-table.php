<?php
$tableNameNotes = "notes";
// Checks if a table by the name $tableNameNotes exists
$tableExistsQueryNotes = "SHOW TABLES LIKE '$tableNameNotes' ";
$resultNotes = mysqli_query($con, $tableExistsQueryNotes);

if ($resultNotes && mysqli_num_rows($resultNotes) > 0) {
  // echo "Table $tableNameNotes exists. <br>";
} else {
  $createTableQueryNotes = "
    CREATE TABLE $tableNameNotes (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user_id INT(6) UNSIGNED,
      title VARCHAR(255) NOT NULL,
      content TEXT,
      FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
    )
  ";

  if (mysqli_query($con, $createTableQueryNotes)) {
    // echo "Table $tableNameNotes created successfully." . "<br>";
  } else {
    die("Failed creating table: " . mysqli_error($con));
  }
}

$tableNameUsers = "User";
// Checks if a table by the name $tableNameUsers exists
$tableExistsQueryUsers = "SHOW TABLES LIKE '$tableNameUsers' ";
$resultUsers = mysqli_query($con, $tableExistsQueryUsers);

if ($resultUsers && mysqli_num_rows($resultUsers) > 0) {
  // echo "Table $tableNameUsers exists. <br>";
} else {
  $createTableQueryUsers = "
    CREATE TABLE $tableNameUsers (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user_name VARCHAR(255) NOT NULL,
      first_name VARCHAR(255) NOT NULL,
      last_name VARCHAR(255) NOT NULL,
      user_email VARCHAR(255) NOT NULL,
      user_pass VARCHAR(255) NOT NULL,
      conform_userP VARCHAR(255) NOT NULL
    )
  ";

  if (mysqli_query($con, $createTableQueryUsers)) {
    // echo "Table $tableNameUsers created successfully." . "<br>";
  } else {
    die("Failed creating table: " . mysqli_error($con));
  }

  //REMOVE THIS IF PUBLISHING, ADMIN PAGE CONTAINS ALL USERS AND ENTRIES.
  $query = "INSERT INTO user (user_name, first_name, last_name, user_email, user_pass, conform_userP) VALUES ('admin', 'admin', 'admin', 'admin', 'admin', 'admin')";
  $query_run = mysqli_query($con, $query);
  if (!$query_run) {
    die('Error in query');
  } else {
    echo "admin inserted successfully";
    //REMOVE TILL HERE
  }
}

// Add foreign key relationship between user and notes tables
$alterTableQuery = "
  ALTER TABLE $tableNameNotes
  ADD CONSTRAINT fk_user_notes
  FOREIGN KEY (user_id) REFERENCES $tableNameUsers(id)
  ON DELETE CASCADE;
";

if (mysqli_query($con, $alterTableQuery)) {
  // echo "Foreign key relationship added successfully." . "<br>";
} else {
  die("Failed adding foreign key relationship: " . mysqli_error($con));
}
