<?php
session_start();
require 'config.php';

include 'dashboardIncludes/header.html';
include 'dashboardIncludes/crudHeader.html';



$query = $_GET['query'];
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM notes WHERE user_id = $user_id AND (title LIKE '%$query%' OR content LIKE '%$query%')";
$result = mysqli_query($con, $sql);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-15">
            <div class="card rounded-3">
                <!-- Card header -->

                <div class="card-header text-white text-center bg-dark rounded-3">
                    <h3 style="font-size: 50px;">
                        Search results for: <?= $query ?>
                        <a href="dashboard.php" class="btn btn-danger btn-lg float-end m-2" style="width: 150px;">Back</a>
                    </h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th style="width: 500px;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["title"] . "</td>";
                                    echo "<td>";
                            ?>
                                    <a href="./note-view.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm w-25">View</a>
                                    <a href="./note-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm w-25">Edit</a>
                                    <form action="./delete-note.php" method="POST" class="d-inline">
                                        <input type="hidden" name="note_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_note" class="btn btn-danger btn-sm w-25">Delete</button>
                                    </form>
                                    </td>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='3'>No results found</td></tr>";
                            }

                            

                            ?>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php
mysqli_close($con);
?>