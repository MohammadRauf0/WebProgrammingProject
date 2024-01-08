<?php
include('./dashboardIncludes/crudHeader.html');
session_start();
require 'config.php';
require "message.php";

// retrive data from the database everything about current user except the password
if (!isset($_SESSION['userId'])) {
  // Redirect to login page or handle not being logged in
  exit('User is not logged in.');
}

$user_id = $_SESSION['userId'];
$select = "SELECT id, user_name, first_name, last_name, user_email FROM user WHERE id = ?";
$stmt = mysqli_prepare($con, $select);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$resultUsers = mysqli_stmt_get_result($stmt);

if (!$resultUsers) {
  die('Error in SQL query: ' . mysqli_error($con));
}

$rowselect = mysqli_fetch_array($resultUsers);

// Update the user profile

if (isset($_POST['edit'])) {
  $username = $_POST['user_name'];
  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $email = $_POST['user_email'];
  $newPassword = $_POST['new_pass'];

  // Hash the new password
  $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

  $updateQuery = "UPDATE user SET 
            user_name = ?,
            first_name = ?,
            last_name = ?,
            user_email = ?,
            user_pass = ?,
            conform_userP = ?
            WHERE id = ? 
        ";

  $stmtUpdate = mysqli_prepare($con, $updateQuery);
  mysqli_stmt_bind_param($stmtUpdate, 'ssssssi', $username, $firstname, $lastname, $email, $hashedPassword, $hashedPassword, $user_id);
  $resultUpdate = mysqli_stmt_execute($stmtUpdate);

  if ($resultUpdate) {
    $_SESSION['message'] = "Profile has been updated successfully!";
  } else {
    die('Error in SQL update query: ' . mysqli_error($con));
  }

  header("Location: ./dashboard.php");
  exit(0);
}
?>


<div class="container mt-5">
  <div class="row">
    <div class="col d-flex align-items-center justify-content-center">
      <div class="card w-50">
        <!-- Card header -->

        <div class="card-header">
          <h3>
            profile
            <a href="dashboard.php" class="btn btn-danger float-end">Back</a>
          </h3>
        </div>
        <!-- Card body -->
        <div class="card-body text-center ">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-3">
              <img width="120" src="assets/user2.png" alt="user">
            </div>
            <!-- input felids -->
            <div class=" input-group mb-3">
              <span class="input-group-text">
                <i class="fa-solid fa-user"></i>
              </span>
              <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" value="<?php echo $rowselect['user_name']; ?>" name="user_name" required />
            </div>
            <div class="row g-3 mb-3">
              <div class="col">
                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="First Name" value="<?php echo $rowselect['first_name']; ?>" name="first_name" required />
              </div>
              <div class="col">
                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Last Name" name="last_name" value="<?php echo $rowselect['last_name']; ?>" required />
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa-solid fa-envelope"></i>
              </span>
              <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email" name="user_email" value="<?php echo $rowselect['user_email']; ?>" required />
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa-solid fa-key"></i>
              </span>
              <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="New Password" name="new_pass" required />
            </div>
            <!-- end of the input felids -->

            <div class="mb-3">
              <button class="btn btn-outline-success float-end" type="submit" name="edit">Edit Profile</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://kit.fontawesome.com/30b1296f81.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>