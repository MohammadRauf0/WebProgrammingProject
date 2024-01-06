<?php
session_start();
include('dashboardIncludes/header.html');
require 'db-connection.php';
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
        <img src="./assets/logo.png" alt="" style="width: 200px; padding: 0; margin: 0;">
      </i>
    </div>

    <div>
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

    <div class="row">
      <form action="" class="d-flex" role="search">
        <input type="search" class="form-control me-3 w-75" placeholder="Search:" aria-label="Search" />
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
    <?php
    $query = "SELECT * FROM notes";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
      foreach ($query_run as $note) {
    ?>

        <div class="container mt-2" style="max-width: 280px;">
          <div class="row rounded-3 bg-dark" style="height: 55px; color: #ffffff; overflow: hidden;">
            <div class="col-9 d-flex align-items-center" style="overflow: hidden;">
              <a class="text-decoration-none text-white" href="note-view.php?id=<?= $note['id']; ?>">
                <?= $note['id'] . ". " . $note['title']; ?>
              </a>
            </div>
            <div class="col-1 d-flex align-items-center">
              <a href="note-edit.php?id=<?= $note['id']; ?>">
                <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
              </a>
            </div>
            <div class="col-1 d-flex align-items-center">
              <form action="CRUD.php" method="POST" class="d-inline">
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

  <div class="dropdown shadow w-100 bg-dark text-white" style="position: absolute; bottom: 5px;">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle p-3" data-bs-toggle="dropdown" aria-expanded="false" id="userDropdown">
      <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="" width="32" height="32" class="rounded-circle me-3" />
      <div class="text-white">some name</div>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li>
        <a class="dropdown-item" href="../Authentication/Login.php">Sign out</a>
      </li>
    </ul>
  </div>
  <!-- ------------------Start of the footer-------------------- -->
</div>
<!---------------end of the side bar/nav cancas------------------->
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <?php
      include('message.php');
      ?>
    </div>
  </div>
  <div class="row">
    <div class="card">

      <div class="card-header">
        <h1>
          Welcome back[some name]
        </h1>
      </div>

      <div class="card-body">
        //MESSAGE
      </div>

    </div>
  </div>
</div>









<?php
include('dashboardIncludes/footer.html');
?>