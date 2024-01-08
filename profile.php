<?php
include('./dashboardIncludes/crudHeader.html');
session_start();
require 'config.php';
require "message.php";


$user_id = $_SESSION['userId'];
$select = "SELECT * FROM user WHERE id = '$user_id'";
$runsel = mysqli_query($con, $select);
//testing 
if (!$runsel) {
  die('Error in SQL query: ' . mysqli_error($con));
}

@$post1 = $_POST['get1']; //username
@$post2 = $_POST['get2']; //firstname
@$post3 = $_POST['get3']; //lastname
@$post4 = $_POST['get4']; //email
@$post5 = $_POST['get5']; //password
@$post6 = $_POST['get6']; //confirm password

$rowselect = mysqli_fetch_array($runsel);
if (isset($_POST['edit'])) {
  // Hash the password
  $hashedPassword = password_hash($post5, PASSWORD_DEFAULT);

  $upUser = "UPDATE user SET 
    user_name ='$post1',
    first_name ='$post2',
    last_name = '$post3',
    user_email ='$post4',
    user_pass ='$hashedPassword',
    conform_userP = '$post6'
    WHERE id='$user_id' 
  ";

  if (mysqli_query($con, $upUser)) {
    $_SESSION['message'] = "Profile has been updated successfully!";
  }
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
              <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" value="<?php echo $rowselect['user_name']; ?>" name="get1" required />
            </div>
            <div class="row g-3 mb-3">
              <div class="col">
                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="First Name" value="<?php echo $rowselect['first_name']; ?>" name="get2" required />
              </div>
              <div class="col">
                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Last Name" name="get3" value="<?php echo $rowselect['last_name']; ?>" required />
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa-solid fa-envelope"></i>
              </span>
              <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email" name="get4" value="<?php echo $rowselect['user_email']; ?>" required />
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa-solid fa-key"></i>
              </span>
              <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="password" name="get5" value="<?php echo ($rowselect['user_pass']); ?>" required />
            </div>
            <div class=" input-group mb-1 mb-3">
              <span class="input-group-text">
                <i class="fa-solid fa-key"></i>
              </span>
              <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Conform password" name="get6" value="<?php echo $rowselect['conform_userP']; ?>" required />
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