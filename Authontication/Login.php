<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log in</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="body">
    <div class="wrapperLog">
      <form action="" method="post">
        <h2>Log in</h2>

        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-user"></i></span>
          <input type="text" placeholder="Username" required />
        </div>
        <div class="input-box">
          <span class="icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" placeholder="password" required />
        </div>
        <div class="forget-pass">
          <a href="#">Forget Password</a>
        </div>
        <button type="submit">Login</button>
        <div class="register-link">
          <p>Don't have an account?<a href="SignUp.php">Register</a> </p>
        </div>
      </form>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/95ff385942.js" crossorigin="anonymous"></script>
</body>

</html>