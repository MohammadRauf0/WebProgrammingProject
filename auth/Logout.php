<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['password']);
unset($_SESSION['log']);
unset($_SESSION['userId']);
unset($_SESSION['first-name']);
session_destroy();

echo '
<body class="divBack">
  <div class="success-container">
    <link rel="stylesheet" href="style.css" />
    <img src="../assets/error3.png" alt="Success Image"width=200>
    <p class="e-message">You have logged out from your account</p>
    <meta http-equiv="refresh" content="3, url=./login.php">
  </div>
 
<body/>
';
