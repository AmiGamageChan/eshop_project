<?php

session_start();

if (isset($_SESSION["a"])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="Resources/img/logowhite.png" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Fashion Haven - Admin Dashboard</title>
    </head>

    <body class="adminBody quick-font" onload="loadChart();">
        <!--Nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!--Nav bar -->
        <div class="row col-4">
            <div class="container mt-5">
                <div>
                    <h2 class="text-center">Most Sold Products</h2>
                </div>

                <div class="col-12">
                    <!-- Set the canvas dimensions here -->
                    <canvas id="myChart" width="100%" height="100%" ></canvas>
                </div>

            </div>
        </div>
        <!--Chart-->
        </div>
        <!--Chart-->


        <!--Footer-->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 Fashion Haven || All Right Reserved </p>
        </div>
        <!--Footer-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("Access Denied");
}
?>