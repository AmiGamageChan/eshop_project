<?php
session_start();

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Fashion Haven - Admin Dashboard</title>
    </head>

    <body class="adminBody quick-font">
        <!--nav bar-->
        <?php include "adminNavBar.php"; ?>
        <!--nav bar-->

        <div class="col-10">
            <h2 class="text-center">Reports</h2>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-7 mt-5">
                        <a href="adminReportStock.php"><button class="btn btn-outline-info col-12">Stock Reports</button></a>
                    </div>

                    <div class="col-12 col-md-7 mt-5">
                        <a href="adminReportProduct.php"><button class="btn btn-outline-info col-12">Product Reports</button></a>
                    </div>

                    <div class="col-12 col-md-7 mt-5">
                        <a href="adminReportUser.php"><button class="btn btn-outline-info col-12">User Reports</button></a>
                    </div>

                    <div class="col-12 col-md-7 mt-5">
                        <a href="adminUser.php"><button class="btn btn-outline-info col-12">Product Statistics</button></a>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("You are not a valid admin");
}

?>