<?php
include("../adminAssets/operationHeader.html");
session_start();
require '../config.php';

$user_id = $_GET['id'];

if (isset($_POST['update_user'])) {

  $id = mysqli_real_escape_string($con, $_GET['id']);
  $username = mysqli_real_escape_string($con, $_POST['user_name']);
  $firstName = mysqli_real_escape_string($con, $_POST['first_name']);
  $lastName = mysqli_real_escape_string($con, $_POST['last_name']);
  $email = mysqli_real_escape_string($con, $_POST['user_email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $repeatPassword = mysqli_real_escape_string($con, $_POST['confirm_password']);


  if ($password != $repeatPassword) {
    $_SESSION['update'] = "<p class='error-message'>Password and confirm password do not match!</p>";
  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $confirmHashPassword = password_hash($repeatPassword, PASSWORD_DEFAULT);


    $sql = "UPDATE user SET 
            user_name = ?,
            first_name = ?,
            last_name = ?,
            user_email = ?,
            user_pass = ?,
            conform_userP = ?
            WHERE id = ? 
            ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssssssi', $username, $firstName, $lastName, $email, $hashedPassword, $confirmHashPassword, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      $_SESSION['update'] = "<p> updated successfully</p>";
    } else {  
      $_SESSION['update'] = "<p>failed to update</p>";
    }
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

          <?php

          if (isset($_GET['id'])) {
            $userId = mysqli_real_escape_string($con, $_GET['id']);
            $sql = "SELECT id, user_name, first_name, last_name, user_email, conform_userP FROM user WHERE id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch the user row
            $userRow = $result->fetch_assoc();
          }

          ?>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $_GET['id']); ?>" method="POST">

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
                <input type="text" class="form-control" name="user_name" id="floatingInputGroup1" placeholder="Username" value="<?= $userRow['user_name']; ?>" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Username</label>
              </div>
            </div>

            <div class="row">
              <div class="col input-group mb-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="first_name" id="floatingInputGroup1" placeholder="First name" value="<?= $userRow['first_name']; ?>" style="font-size: 20px" required>
                  <label for="floatingInputGroup1">First name</label>
                </div>
              </div>

              <div class="col input-group mb-4">
                <div class="form-floating">
                  <input type="text" class="form-control" name="last_name" id="floatingInputGroup1" placeholder="Last name" value="<?= $userRow['last_name']; ?>" style="font-size: 20px" required>
                  <label for="floatingInputGroup1">Last name</label>
                </div>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-envelope" style="font-size: 25px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="user_email" id="floatingInputGroup1" placeholder="Email" value="<?= $userRow['user_email']; ?>" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Email</label>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-key" style="font-size: 25px;"></i></span>
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingInputGroup1" placeholder="Password" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Password</label>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-lock" style="font-size: 25px;"></i></span>
              <div class="form-floating">
                <input type="password" class="form-control" name="confirm_password" id="floatingInputGroup1" placeholder="Confirm Password" style="font-size: 20px" required>
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