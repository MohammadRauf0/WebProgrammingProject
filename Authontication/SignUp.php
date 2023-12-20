<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SignUp</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="body">
    <div class="wrapper">
      <form action="" method="post">
        <h2>Sign Up</h2>

        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-user"></i></span>
          <input type="text" placeholder="Username" required />
        </div>
        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" placeholder="Email" required />
        </div>
        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" placeholder="password" required />
        </div>
        <button type="submit">SignUp</button>
        <div class="register-link">
          <p>already have an account?<a href="Login.php">Login</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/95ff385942.js" crossorigin="anonymous"></script>
</body>

</html>