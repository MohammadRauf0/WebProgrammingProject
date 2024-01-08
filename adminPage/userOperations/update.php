<?php
include("../adminAssets/operationHeader.html");
session_start();
require '../config.php';

$user_id = $_GET['id'];
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

if (isset($_POST['update_user'])) {
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
}

?>

<div class="container mt-5">
  <div class="row">

    <div class="col-3"></div>

    <div class="col">
      <div class="card">
        <div class="card-header">
          <h2 class="m-2">Update a User
            <a href="../admin_dash.php" class="btn btn-outline-danger btn-lg float-end mb-2">Back</a>
          </h2>
        </div>

        <div class="card-body">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

            <div class="input-group mb-4">
              <span class="input-group-text">@</span>
              <div class="form-floating">
                <input type="text" class="form-control" name="user_id" id="floatingInputGroup1" value="<?= $_GET['id']; ?>" placeholder="id" style="font-size: 20px" required disabled>
                <label for="floatingInputGroup1">id</label>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-user" style="font-size: 20px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="user_name" id="floatingInputGroup1" placeholder="Username" value="<?= $rowselect['user_name']; ?>" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Username</label>
              </div>
            </div>

            <div class="row">
              <div class="col input-group mb-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="first_name" id="floatingInputGroup1" placeholder="First name" value="<?= $rowselect['first_name']; ?>" style="font-size: 20px" required>
                  <label for="floatingInputGroup1">First name</label>
                </div>
              </div>

              <div class="col input-group mb-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="last_name" id="floatingInputGroup1" placeholder="Last name" value="<?= $rowselect['last_name']; ?>" style="font-size: 20px" required>
                  <label for="floatingInputGroup1">Last name</label>
                </div>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-envelope" style="font-size: 25px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="user_email" id="floatingInputGroup1" placeholder="Email" value="<?= $rowselect['user_email']; ?>" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Email</label>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-key" style="font-size: 25px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="new_pass" id="floatingInputGroup1" placeholder="Password" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Password</label>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-lock" style="font-size: 25px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="repeat_password" id="floatingInputGroup1" placeholder="Confirm Password" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Confirm Password</label>
              </div>
            </div>

            <div class="mb-3">
              <button class="btn btn-outline-success btn-lg float-end" type="submit" name="update_user">Update User</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-3"></div>

  </div>
</div>

<?php
include("../adminAssets/footer.html");
?>