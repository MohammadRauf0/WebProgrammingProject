<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['password']);
unset($_SESSION['log']);
session_destroy();

echo '
<body class="divBack">
  <div class="success-container">
    <link rel="stylesheet" href="style.css" />
    <img src="../Assets/error3.png" alt="Success Image"width=200>
    <p class="e-message">You have logged out from your account</p>
    <meta http-equiv="refresh" content="3, url=Login1.php">
  </div>
 
<body/>
';
