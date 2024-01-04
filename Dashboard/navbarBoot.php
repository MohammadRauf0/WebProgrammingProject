<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/30b1296f81.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .nav-link-hover:hover {
            background-color: #007bff;
            /* Change as needed */
            color: white;
            /* Change as needed */
            transition: .7s;
        }
    </style>

</head>

<body>
    <nav class="navbar bg-body-tertiary bg-dark">
        <button class="btn btn-primary btn-dark m-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-wrapper">
            <i class="bi bi-arrow-bar-right" style="font-size: 20px;"></i>
        </button>
        <div class="container justify-content-center">
            <div class="navbar-brand">
                <a href="dashboard.php" class="navbar-brand">
                    <i class="fa-solid fa-n fa-flip fa-2xl" style="color: #ffffff;"></i>
                </a>
            </div>
        </div>
    </nav>


    <div class="offcanvas offcanvas-start text-bg-dark p-2" style="width: 300px;" height="100vh" tabindex="-1" id="sidebar-wrapper">
        <div class="offcanvas-body ">

            <a href="dashboard.php" class="d-flex align-items-center mb-2 mb-md-3 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-3" width="40" height="40">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-1 ">Noteably</span>
            </a>

            <!-- Your sidebar content goes here -->
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="addnote.php" class="nav-link text-white nav-link-hover" aria-current="page">
                        <i class="bi bi-pencil-square m-1" width="16" height="16"></i>
                        Add Note
                    </a>
                </li>
                <li>
                    <a href="updatenoteH.php" class="nav-link text-white nav-link-hover">
                        <i class="bi bi-pen m-1" width="16" height="16"></i>
                        Edit Note
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white nav-link-hover">
                        <i class="bi bi-trash m-1" width="16" height="16"></i>
                        Delete Note
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white nav-link-hover">
                        <i class="bi bi-search m-1" width="16" height="16"></i>
                        Search
                    </a>
                </li>
            </ul>

            <hr>
            <div>
                <strong style="font-size: x-large;">History</strong>
                <div class="items" style="margin-top: 10px;">
                    <?php
                    require_once "../config.php";
                    $query = "SELECT title FROM notes ORDER BY title"; // replace 'title' and 'notes' with your actual column and table name
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li>" . $row['title'] . "</li>";
                        }
                    } else {
                        echo "No notes found";
                    }
                    ?>
                </div>
            </div>


            <hr>
            <div class="dropdown" style="position: absolute; bottom: 20px;">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="" width="32" height="32" class="rounded-circle me-3">
                    <strong>
                        I am Groot
                        <!-- <?php echo $_SESSION['username']; ?> -->
                    </strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="../Authontication/Logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
    <!-- the reason for having a min in the end of url is so that we get exactly what we need and not everything -->


</body>

</html>