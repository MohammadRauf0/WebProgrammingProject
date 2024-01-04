<?php
// session_start();
// if (@$_SESSION['log'] == '1') {
//   echo '
//       <div class="">
//         <link rel="stylesheet" href="style.css">
//         <p>you have already logged in!</p>
//       </div>
//         <meta http-equiv = "refresh" content ="3, url=../Dashboard/dashboard.php">
//       ';
//   exit();
// }

// $Error = ""; // Initialize $Error

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "notables";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $post1 = $_POST['get1']; //username
// $post5 = $_POST['get5']; //password

// if (isset($_POST['button2'])) {
//   if (empty($post1) or empty($post5)) {
//     $Error = "<p class=''>please fill in the form below to log in!</p>";
//   } else {
//     $sql = "SELECT * FROM users WHERE user_name = '$post1'";
//     $Runsql = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($Runsql) > 0) {
//       $Rowsql = mysqli_fetch_array($Runsql);
//       $username = $Rowsql['user_name'];
//       $password = $Rowsql['user_pass'];
//       if ($password != $post5) {
//         $Error = "<p class='style13'>worng password!</p>";
//       } else {
//         $_SESSION['user'] = $username;
//         $_SESSION['password'] = $password;
//         $_SESSION['log'] = "1";
//         echo '
//         <div class="">
//         <link rel="stylesheet" href="style.css">
//         <p>you have been logged in successfully</p>
//       </div>
//         <meta http-equiv = "refresh" content ="3, url=../Dashboard/dashboard.php">
//       ';
//         exit();
//       }
//     } else {
//       $Error = "<p class=''>user is not found!</p>";
//     }
//   }
// }
