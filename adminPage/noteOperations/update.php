<?php
include("../adminAssets/operationHeader.html");
session_start();
require '../config.php';

$note_id = $_GET['id'];

if (isset($_POST['update_note'])) { // Change 'update_user' to 'update_note'

  $id = mysqli_real_escape_string($con, $_POST['note_id']);
  $userId = mysqli_real_escape_string($con, $_POST['user_id']);
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $content = mysqli_real_escape_string($con, $_POST['content']);

  $sql = "UPDATE notes SET 
            title = ?,
            content = ?
            WHERE id = ? 
            ";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('ssi', $title, $content, $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    $_SESSION['update'] = "<p> updated successfully</p>";
  } else {
    $_SESSION['update'] = "<p>failed to update</p>";
  }
}
?>

<div class="container mt-5">
  <div class="row">

    <div class="col-3"></div>

    <div class="col">
      <div class="card">
        <div class="card-header">
          <h2 class="m-2">Update a Note
            <a href="../admin_dash.php" class="btn btn-outline-danger btn-lg float-end mb-2">Back</a>
          </h2>
        </div>

        <div class="card-body">

          <?php
          if (isset($_GET['id'])) {
            $note_id = $_GET['id'];
            $sql = "SELECT * FROM notes WHERE id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $note_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch the note row
            $notesRow = $result->fetch_assoc();
          }
          ?>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $_GET['id']); ?>" method="POST">

            <div class="input-group mb-4">
              <span class="input-group-text">@</span>
              <div class="form-floating">
                <input type="text" class="form-control" name="note_id" id="floatingInputGroup1" value="<?= $_GET['id']; ?>" placeholder="id" style="font-size: 20px" readonly>
                <label for="floatingInputGroup1">id</label>
              </div>
            </div>

            <div class="input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-user" style="font-size: 20px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="user_id" id="floatingInputGroup1" placeholder="userId" value="<?= $notesRow['user_id']; ?>" style="font-size: 20px" readonly>
                <label for="floatingInputGroup1">userId</label>
              </div>
            </div>



            <div class="col input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-bars" style="font-size: 20px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="title" id="floatingInputGroup1" placeholder="Title" value="<?= $notesRow['title']; ?>" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Title</label>
              </div>
            </div>

            <div class="col input-group mb-4">
              <span class="input-group-text"><i class="fa-solid fa-bars" style="font-size: 20px;"></i></span>
              <div class="form-floating">
                <input type="text" class="form-control" name="content" id="floatingInputGroup1" placeholder="Content" value="<?= $notesRow['content']; ?>" style="font-size: 20px" required>
                <label for="floatingInputGroup1">Content</label>
              </div>
            </div>

            <div class="mb-3">
              <button class="btn btn-outline-success btn-lg float-end" type="submit" name="update_note">Update Note</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-3"></div>

  </div>
</div>

<?php
include("../adminAssets/footer.html");
?>