<?php

session_start();

if (isset($_SESSION["a"])) { ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Fashion Haven - Admin Dashboard</title>
    </head>

    <body class="adminBody" onload="loadChart();">
        <!--Nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!--Nav bar -->
        <div class="row">
            <div class="container mt-5">
                <div>
                    <h2 class="text-center">Most Sold Products</h2>
                </div>

                <div class="col-12">
                    <!-- Set the canvas dimensions here -->
                    <canvas id="myChart" width="400" height="400"></canvas>
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