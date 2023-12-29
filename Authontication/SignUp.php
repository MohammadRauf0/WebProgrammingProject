<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>SignUp</title>
  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/30b1296f81.js" crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar bg-body-tertiary bg-dark">
    <div class="container justify-content-center">
      <div class="navbar-brand">
        <a href="dashboard.php" class="navbar-brand">
        </a>
        <div>
          <img width="190" src="../Assets/logo2.png" alt="">
        </div>
      </div>
    </div>
  </nav>


  <div class="bigDivSign">
    <div class="wrapperSign main">
      <form action="" method="post">
        <h2>Sign Up</h2>
        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-user"></i></span>
          <input type="text" placeholder="Username" required />
        </div>
        <div class="style09">
          <div class="input-boxSpecial right">
            <input type="text" placeholder="First Name" required />
          </div>
          <div class="input-boxSpecial left">
            <input type="text" placeholder="Last Name" required />
          </div>
        </div>

        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" placeholder="Email" required />
        </div>
        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" placeholder="password" required />
        </div>
        <button class="button" type="submit">SignUp</button>
        <div class="register-link">
          <p>already have an account?<a href="Login.php">Login</a></p>
        </div>
      </form>
    </div>
  </div>
</body>

</html>