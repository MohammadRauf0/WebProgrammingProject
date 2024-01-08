<?php
session_start();

if (isset($_SESSION['log']) && $_SESSION['log'] != '1') {
  echo '
    <body class="divBack">
      <div class="success-container">
        <link rel="stylesheet" href="style.css" />
        <img src="../Assets/error3.png" alt="Success Image"width=200>
        <p class="e-message">You already logged in</p>
        <meta http-equiv="refresh" content="3, url=./auth/login.php">
      </div>
     
    <body/>
    ';

  exit();
}


include('dashboardIncludes/header.html');
require 'config.php';
?>

<div class="navbar bg-white shadow">
  <div class="container-fluid">
    <div>
      <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <i class="bi bi-arrow-bar-right" style="font-size: 20px"></i>
      </button>
    </div>

    <div>
      <i class=" fa-sharp fa-regular fa-fade fa-2xl" style="color: #000000; font-size: 40px;">
        <img src="./assets/logo.png" alt="" style="width: 200px; padding: 0; margin-left:150px;">
      </i>
    </div>

    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle p-3" data-bs-toggle="dropdown" aria-expanded="false" id="userDropdown">
        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="profile image" width="32" height="32" class="rounded-circle me-3" />
        <div class=""><?= $_SESSION['user']; ?></div>
      </a>
      <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="userDropdown">
        <li>
          <a class="dropdown-item" href="./profile.php">Profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="./auth/logOut.php">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<!---------------start of the side bar/nav cancas------------------->

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="width: auto; transition: 0.8s">
  <!-- ---------------Start of the header -------------------------- -->
  <div class="container">
    <div class="row">
      <div class="offcanvas-header">
        <i class="fa-solid fa-notes-medical fa-fade fa-2xl" style="color: black"></i>

        <a href="note-add.php" class="btn btn-outline-dark w-50 justify-content-start" style="font-size: larger">
          <span class="ml-5"> New Note</span>
        </a>

        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="bi bi-arrow-bar-left" style="font-size: 20px"></i>
        </button>
      </div>
    </div>
    <!-- Search part -->
    <div class="row">
      <form action="search.php" method="get" class="d-flex" role="search">
        <input type="search" name="query" class="form-control me-3 w-75" placeholder="Search:" aria-label="Search" />
        <button class="btn btn-outline-dark" type="submit">
          <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </button>
      </form>
    </div>
  </div>
  <!-- ------------------End of the header ------------------------- -->

  <!---------------start body of the off canvas  ------------------->

  <div class="offcanvas-body">
    <br />
    <h5>Entries:</h5>

    <!-- ----------------start of the looping part-------------- -->


    <!-- ----------(START) This part contains the code that gets the id from username------- -->

    <?php
    $user_name = $_SESSION['user']; //get the user name from session
    $query = "SELECT id FROM user WHERE user_name = '$user_name'";
    $result = mysqli_query($con, $query);

    if ($result) {
      // Check if any rows are returned
      if (mysqli_num_rows($result) > 0) {
        // Fetch the result (assuming only one row is expected)
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userId'] = $row['id'];
      } else {
        echo "No matching records found.";
      }
    } else {
      echo "Query failed: " . mysqli_error($con);
    }

    ?>

    <!-- ----------(END) This part contains the code that gets the id from username------- -->


    <?php
    $uid = $_SESSION['userId'];
    $query = "SELECT * FROM notes WHERE user_id = '$uid'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
      foreach ($query_run as $note) {
    ?>
          <div class="container mt-2" style="max-width: 300px;">
            <div class="row rounded-3 bg-dark" style="height: 55px; color: #ffffff; overflow: hidden; width:300px">
              <div class="col-9 d-flex align-items-center" style="overflow: hidden;">
                <a class="text-decoration-none text-white" href="note-view.php?id=<?= $note['id']; ?>">
                  <?= $note['title']; ?>
                </a>
              </div>
              <div class="col-1 d-flex align-items-center">
                <a href="note-edit.php?id=<?= $note['id']; ?>">
                  <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                </a>
              </div>
              <div class="col-1 d-flex align-items-center">
                <form action="delete-note.php" method="POST" class="d-inline">
                  <input type="hidden" name="note_id" value="<?= $note['id']; ?>">
                  <button type="submit" name="delete_note" class="btn btn-danger btn-sm">
                    <i class="fa-regular fa-trash-can" style="color: #ffffff;"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
    <?php
      }
    } else {
      echo "<h5>No Records Found</h5>";
    }
    ?>

    <!-- ----------------end of the looping part-------------- -->

    <!---------------end body of the off canvas  ------------------->
  </div>


  <!-- ------------------Start of the footer-------------------- -->

  <a href="./auth/logOut.php" class="btn btn-outline-danger btn-lg m-3">Log Out</a>
  <!-- ------------------end of the footer-------------------- -->


</div>
<!---------------end of the side bar/nav cancas------------------->
<div class="container mt-5">
  <div class="row mt-5">
    <div class="col">
      <?php
      include('message.php');
      ?>
    </div>
  </div>
  <div class="row">
    <div class="card">

      <div class="card-header text-center">

        <h1 style="font-size: 50px;">
          Welcome back <?= $_SESSION['first-name']; ?>
        </h1>
      </div>

      <div class="card-body">
        <div class="contaion">
          <div class="row">
            <div class="">
              <h1>Welcome to Your Web Programming Journey!</h1>
              <p>Embrace the endless possibilities of web development as you step into your personalized dashboard. Here, innovation meets code, and creativity finds its digital canvas.</p>

              <p>Whether you're a seasoned developer or just starting, this space is designed to empower you. Explore a world of technologies, create cutting-edge applications, and connect with a community passionate about shaping the digital landscape.</p>

              <p>Unleash your imagination, write elegant code, and witness your ideas come to life. From front-end design to back-end logic, every keystroke propels you forward in your programming journey.</p>

              <p>Your dashboard is not just a workspace; it's a hub of inspiration. Stay updated on the latest industry trends, discover new frameworks, and collaborate with fellow developers. This is your sanctuary to learn, experiment, and elevate your skills.</p>

              <p>As you navigate through the features, remember that every challenge you face is an opportunity to learn. Celebrate your victories, embrace the learning curve, and let this dashboard be the launchpad for your next web programming adventure.</p>

              <p>So, buckle up, fellow coder! Your journey begins here, and the possibilities are as limitless as your imagination.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('dashboardIncludes/footer.html');
?>