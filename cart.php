<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Fashion Haven - Shopping Cart</title>
    </head>

    <body onload="loadCart();" class="quick-font">
        <!--Nav bar -->
        <?php include "NavBar.php"; ?>
        <!--Nav bar -->

        <div class="container mt-5">
            <div class="row" id="cartBody">
                
                <!--Cart load-->
                <div class="mb-4 mt-4">
                    <h3>Shopping Cart</h3>
                </div>
            
            </div>
        </div>

        <!--Footer-->
        <div class="col-12 mt-3">
            <p class="text-center fixed-bottom">&copy; 2024 Fashion Haven || All Right Reserved </p>
        </div>
        <!--Footer-->
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

<?php
} else {
}
?>