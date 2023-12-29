<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SignUp</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
<nav class="navbar bg-body-tertiary bg-dark">
        <button class="btn btn-primary btn-dark m-1" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebar-wrapper">
            <i class="bi bi-arrow-bar-right" style="font-size: 20px;"></i>
        </button>
        <div class="container justify-content-center">
            <div class="navbar-brand">
                <a href="dashboard.php" class="navbar-brand">
                    <i class="fa-solid fa-n fa-flip fa-2xl" style="color: #ffffff;"></i>
                </a>
            </div>
        </div>
    </nav>
   
    
  <div class="bigdiv">
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
  <script src="https://kit.fontawesome.com/95ff385942.js" crossorigin="anonymous"></script>
</body>

</html>