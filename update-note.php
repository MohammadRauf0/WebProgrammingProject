<?php
session_start();
require 'db-connection.php';

if (isset($_POST['update_note'])) {
  $note_id = mysqli_real_escape_string($con, $_POST['note_id']);
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $content = mysqli_real_escape_string($con, $_POST['content']);

  $query = "UPDATE notes SET title='$title', content='$content' WHERE id='$note_id' ";

  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "Note was UPDATED successfully";
    header("Location: dashboard.php");
    exit(0);
  } else {
    $_SESSION['message'] = "Note could NOT be UPDATED unfortunately";
    header("Location: dashboard.php");
    exit(0);
  }
}
