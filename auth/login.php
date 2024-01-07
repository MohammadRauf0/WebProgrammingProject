<?php
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == '1') {
  echo '
    <body class="divBack">
      <div class="success-container">
        <link rel="stylesheet" href="style.css" />
        <img src="../Assets/error3.png" alt="Success Image"width=200>
        <p class="e-message">You already logged in</p>
        <meta http-equiv="refresh" content="3, url=../dashboard.php">
      </div>
     
    <body/>
    ';

  exit();
}

$Error = ""; // Initialize $Error

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notably";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

@$post1 = $_POST['get1']; //username
@$post5 = $_POST['get5']; //password

if (isset($_POST['button2'])) {
  if (empty($post1) or empty($post5)) {
    $Error = "<p class='error-message'>please fill in the form below to log in!</p>";
  } else {

    if ($post1 == 'admin' && $post5 == 'admin') {
      header("Location: ../adminPage/admin_dash.php"); // Redirect to admin to admin dashboard if username and password are admin 
      exit();
    }

    // Use prepared statement to avoid SQL injection
    $query = "SELECT * FROM user WHERE user_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $post1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $Rowsql = $result->fetch_assoc();
      $username = $Rowsql['user_name'];
      $hashedPassword = $Rowsql['user_pass'];
      $firstName = $Rowsql['first_name'];
      $_SESSION['first-name'] = $firstName;

      // Use password_verify to check hashed password
      if (password_verify($post5, $hashedPassword)) {
        $_SESSION['user'] = $username;
        $_SESSION['password'] = $hashedPassword;
        $_SESSION['log'] = "1";
        echo '
        <body class="divBack">
          <div class="success-container">
            <link rel="stylesheet" href="style.css" />
            <img src="../Assets/tick4.webp" alt="Success Image"width=250>
            <p class="success-message">You have successfully logged in!,you can view your dashbored</p>
            <meta http-equiv="refresh" content="3, url=../dashboard.php">
          </div>
         
        <body/>
        ';

        exit();
      } else {
        $Error = "<p class='error-message'>wrong password!</p>";
      }
    } else {
      $Error = "<p class='error-message'>user is not found!</p>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log in</title>
  <link rel="stylesheet" href="style.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    #btn-login {
      background-color: #061493;
      color: aliceblue;
      border: 2px solid #061493;
      border-radius: 10px;
      font-weight: bold;
      transition: 0.5s;
    }

    #btn-login:hover {
      background-color: aliceblue;
      color: #061493;
      border: 2px solid #061493;
      border-radius: 10px;
      font-weight: bold;
    }

    body {
      margin: 0;
      padding: 0;
    }

    nav {
      margin-bottom: 0;
    }

    .text-under-image {
      text-align: center;
      margin-top: 10px;
    }

    .text-under-image p {
      font-size: 18px;
      color: #31015e;
    }

    .error-message {
      color: #ff0000;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>

<body class="body">
  <!-- main container -->
  <div class="container d-flex justify-content-center align-items-center min-vh-100 mt-2 mb-3">
    <!-- login container -->
    <div class="row border p-3 bg-white shadow box-area rounded-3">
      <!-- left Box -->
      <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box rounded-3">
        <div class="featured-image">
          <img src="../assets/formImage.png" alt="picture" class="img-fluid rounded-3 w-100 d-flex align-content-center" style="width: 450px; height: auto" />
        </div>
      </div>
      <!-- right Box -->
      <div class="col-md-6 right-box">
        <div class="row align-items-center ml-4 mt-3">
          <div class="header-text mb-4">
            <form class="container-fluid" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              <div class="d-flex justify-content-center">
                <p class="fw-bold fs-4">Welcome to our website</p>
              </div>
              <div class="col-md-12 d-flex align-items-center">
                <?php echo $Error; ?>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa-solid fa-user"></i>
                </span>
                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="get1" required />
              </div>

              <div class="input-group mb-1">
                <span class="input-group-text">
                  <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="password" name="get5" required />
              </div>
              <div class="input-group mb-5 d-flex justify-content-between">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="formCheck" />
                  <label for="formCheck" class="form-check-label text-secondary"><small>Remeber me</small></label>
                </div>
                <div class="forget">
                  <!-- <small><a href="#">Forget Password?</a></small> -->
                </div>
              </div>
              <div class="input-group mb-3">
                <button id="btn-login" class="btn btn-lg w-100 fs-4" type="submit" name="button2">
                  Login
                </button>
              </div>

              <div class="row">
                <small>Don't have an account?<a href="signUp.php">Register</a></small>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/30b1296f81.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>