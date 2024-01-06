<?php
include('./dashboardIncludes/crudHeader.html');
session_start();
?>

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="card">

        <div class="card-header">
          <h3>
            Add a note
            <a href="dashboard.php" class="btn btn-danger float-end">Back</a>
          </h3>
        </div>

        <div class="card-body">
          <form action="create-note.php" method="POST">

            <div class="mb-3">
              <label>Title:</label>
              <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Content:</label>
              <textarea class="form-control" name="content" rows="20"></textarea>
            </div>

            <div class="mb-3">
              <button class="btn btn-outline-success float-end" type="submit" name="save_note">Save Note</button>
            </div>
          </form>
        </div>

      </div>
      <?php
      include('message.php');
      ?>
    </div>
  </div>
</div>

<?php include('./dashboardIncludes/header.html'); ?>