<?php
include('./dashboardIncludes/crudHeader.html');
require 'db-connection.php';
session_start();
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-3"></div>
    <div class="col">
      <div class="card">

        <div class="card-header">
          <h3>
            Update note
            <a href="dashboard.php" class="btn btn-danger float-end">Back</a>
          </h3>
        </div>

        <div class="card-body">

          <?php
          if (isset($_GET['id'])) {
            $note_id = mysqli_real_escape_string($con, $_GET["id"]);
            $query = "SELECT * FROM notes WHERE id=$note_id";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run)) {
              $note = mysqli_fetch_array($query_run);
          ?>
              <form action="CRUD.php" method="POST">

                <input type="hidden" name=note_id value="<?= $note_id; ?>">

                <div class="mb-3">
                  <label>Title:</label>
                  <input type="text" name="title" value="<?= $note['title']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Content:</label>
                  <textarea class="form-control"  name="content" rows="10"><?= $note['content']; ?></textarea>
                </div>

                <div class="mb-3">
                  <button class="btn btn-outline-warning float-end" type="submit" name="update_note">UPDATE</button>
                </div>
              </form>
          <?php
            }
          }
          ?>
        </div>

      </div>
    </div>
    <div class="col-3"></div>
  </div>
</div>

<?php include('./dashboardIncludes/header.html'); ?>