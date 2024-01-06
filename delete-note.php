<?php
session_start();
require 'config.php';


if (isset($_POST['delete_note'])) {
  $note_id = mysqli_real_escape_string($con, $_POST['note_id']);

  // Check if the note exists before attempting to delete
  $check_query = "SELECT id FROM notes WHERE id = ?";
  $check_stmt = mysqli_prepare($con, $check_query);

  mysqli_stmt_bind_param($check_stmt, "i", $note_id);
  mysqli_stmt_execute($check_stmt);
  mysqli_stmt_store_result($check_stmt);

  if (mysqli_stmt_num_rows($check_stmt) > 0) {
    // The note exists, proceed with deletion
    $delete_query = "DELETE FROM notes WHERE id=?";
    $delete_stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_stmt, 'i', $note_id);
    mysqli_stmt_execute($delete_stmt);

    if ($delete_stmt) {
      $_SESSION['message'] = "Note was deleted successfully";
      header("Location: dashboard.php");
      exit(0);
    } else {
      $_SESSION['message'] = "Note could not be deleted. Error: " . mysqli_error($con);
      header("Location: dashboard.php");
      exit(0);
    }
  } else {
    // The note does not exist
    $_SESSION['message'] = "Note with ID $note_id could not be found";
    header("Location: dashboard.php");
    exit(0);
  }
}
