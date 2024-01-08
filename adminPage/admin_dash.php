<?php
include('adminAssets/header.html');
require '../config.php';
session_start();
?>

<div class="m-5">
  <div class="row">
    <!-- START users table -->
    <div class="col-7">
      <div class="card rounded-3 " style="min-height: 500px;">

        <div class="card-header text-white text-center bg-dark rounded-3  ">
          <h3 style="font-size: 50px;">Users
            <a href="./userOperations/create.php" class="btn btn-primary btn-lg float-end m-2 w-25 ">Add a user</a>
          </h3>


        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>


              <?php
              $sql = "SELECT * FROM user";
              if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
              ?>
                  <tr>
                    <th>id</th>
                    <th>user_name</th>
                    <th>name</th>
                    <th>user_email</th>
                    <th>ACTION</th>
                  </tr>
                  <?php
                  while ($content = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $content['id'] . "</td>";
                    echo "<td>" . $content['user_name'] . "</td>";
                    echo "<td>" . $content['first_name'] . " " . $content['last_name'] . "</td>"; // Close the td tag
                    echo "<td>" . $content['user_email'] . "</td>";
                    if($content['id'] != 1){
                  ?>
                    <td>
                      <a href="./userOperations/update.php?id=<?= $content['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                      <form action="./userOperations/delete.php" method="POST" class="d-inline">
                        <input type="hidden" name="user_id" value="<?php echo $content['id']; ?>"> <!-- Set the value attribute -->
                        <button type="submit" name="delete_user" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
              <?php
                    echo "</tr>";
                    } else {
                      ?>
                      <td>
                        NO ACTIONS
                      </td>
                      <?php
                    }
                  }
                }
              }
              ?>
            </thead>
          </table>

        </div>

      </div>
    </div>
    <!-- END users table -->


    <!-- START notes table -->
    <div class="col-5">
      <div class="card rounded-3 " style="min-height: 500px;">

        <div class="card-header text-center text-white bg-dark rounded-3  ">
          <h3 style="font-size: 50px;">Notes</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>


              <?php
              $sql = "SELECT * FROM notes";
              if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
              ?>
                  <tr>
                    <th>user_id</th>
                    <th>title</th>
                    <th>ACTION</th>
                  </tr>
                  <?php
                  while ($content = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $content['user_id'] . "</td>";
                    echo "<td>" . $content['title'] . "</td>";
                  ?>
                    <td>
                      <a href="./noteOperations/read.php?id=<?=$content['id']; ?>" class="btn btn-info btn-sm">View</a>
                      <a href="./noteOperations/update.php?id=<?=$content['id']; ?>" class="btn btn-success btn-sm">Edit</a>

                      <form action="./noteOperations/delete.php" method="POST" class="d-inline">
                        <input type="hidden" name="note_id" value="<?=$content['id']; ?>">
                        <button type="submit" name="delete_note" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
              <?php
                    echo "</tr>";
                  }
                }
              }
              ?>
            </thead>
          </table>

        </div>

      </div>
    </div>
    <!-- END notes table -->

  </div>
</div>

<?php
include('adminAssets/footer.html');
?>