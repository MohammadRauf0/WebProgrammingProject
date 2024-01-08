<?php
session_start();
include("../adminAssets/operationHeader.html");

require '../../config.php';

// Check if user_id is set in POST
if (!isset($_POST['user_id'])) {
    echo "User ID is not set in POST request";
    exit();
}

// Get the user_id from the POST request
$user_id = $_POST['user_id'];

// Start transaction
mysqli_begin_transaction($con);

// Delete user from user table
$sql = "DELETE FROM user WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
if (mysqli_stmt_execute($stmt)) {
    // Delete related notes from notes table
    $sql = "DELETE FROM notes WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    if (mysqli_stmt_execute($stmt)) {
        // Commit transaction
        mysqli_commit($con);
        echo "User and related notes deleted successfully";
        header("Location: ../admin_dash.php");
        exit();
    } else {
        // Rollback transaction
        mysqli_rollback($con);
        echo "Failed to delete related notes";
    }
} else {
    // Rollback transaction
    mysqli_rollback($con);
    echo "Failed to delete user";
}

include("../adminAssets/footer.html");
?>