<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link href="bootstrap.css" rel="stylesheet">
        <link rel="icon" href="Resources/img/logowhite.png" type="image/x-icon">
        <title>FH - Admin Dashboard</title>
    </head>

    <body class="quick-font">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Side -->
                <div class="col-sm-2 bg-primary">
                    <nav class="col-2 col-md-2 d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <?php
                            $admin = $_SESSION["a"]["fname"];
                            ?>
                            <p class="text-center text-size-admin">Welcome Admin : <?php echo ($admin) ?></p>
                            <div><img src="Resources/img/logo.png" class="img-fluid" alt="Logo"></div>
                            <ul class="nav flex-column">

                                <ul class="nav">
                                    <li class="nav-item text-size-admin ms-3">
                                        <a class="nav-link active text-xl" href="AdminDashboardWelcome.php">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item text-size-admin ms-3">
                                        <a class="nav-link text-xl" href="adminDashboard.php">
                                            User Management
                                        </a>
                                    </li>
                                    <li class="nav-item text-size-admin ms-3">
                                        <a class="nav-link text-xl" href="adminProduct.php">
                                            Product Management
                                        </a>
                                    </li>
                                    <li class="nav-item text-size-admin ms-3">
                                        <a class="nav-link text-xl" href="adminStock.php">
                                            Stock Management
                                        </a>
                                    </li>
                                    <li class="nav-item text-size-admin ms-3">
                                        <a class="nav-link text-xl" href="adminReport.php">
                                            Reports
                                        </a>
                                    </li>
                                </ul>
                                <li class="nav-item ms-1 mt-3">
                                    <button class="btn btn-outline-danger col-auto text-nowrap ms-4" onclick="adminSignOut();">Sign Out</button>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Right Side -->
                <div class="background-image col-sm-10"></div>
            </div>
        </div>

        </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    </body>


    </html>
<?php
} else {
    header("Location: adminSignIn.php");
}
