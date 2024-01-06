<?php
session_start();
require 'db-connection.php';

if (isset($_POST['save_note'])) {
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $content = mysqli_real_escape_string($con, $_POST['content']);

  $query = "INSERT INTO notes (title, content) VALUES ('$title', '$content')";

  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "Note has been added successfully";
    header("Location: note-add.php");
    exit(0);
  } else {
    $_SESSION['message'] = "Note could not be added unfortunately";
    header("Location: note-add.php");
    exit(0);
  }
}

?>