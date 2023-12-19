<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
    <!-- when a user click on the add note page in the sidebar, it should open him a new page with a title and notetaking area
so the user could input his notes and than it save the title and notes with id in the mysql DB -->
    <?php include 'navbarBoot.php'; ?>

    <div class="page-content p-4" id="content">
        <!-- Your page content goes here -->

        <form action="addnote.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="20" placeholder="Save your memories here" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-dark">Submit</button>
        </form>
    </div>

    <?php
    require_once '../config.php';

    // if the user click on the submit button, it should save the title and content in the DB with auto increment id
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "INSERT INTO `notes` (`title`, `content`) VALUES ('$title', '$content')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your note has been added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            // go to dashboard after 2 seconds
            header("Refresh:2; url=dashboard.php");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Your note has not been added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }

    ?>




</body>

</html>


<?php
ob_end_flush();
?>