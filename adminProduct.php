<?php

session_start();

if (isset($_SESSION["a"])) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Products - Admin Panel</title>
    </head>

    <body class="adminBody">

        <?php include "adminNavbar.php" ?>

        <div class="col-10">
            <h2 class="text-center">Product Management</h2>

            <div class="row">
                <!--Brand Register -->
                <div class="col-5 offset-1 mt-4">

                    <label for="form-label">Brand Name : </label>
                    <input type="text" class="form-control mb-3" id="brand" />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="brandReg();">Brand Register</button>
                    </div>

                </div>
                <!--Brand Register-->

                <!--Category Register-->
                <div class="col-5 offset -2 mt-4">

                    <label for="form-label">Category Name : </label>
                    <input type="text" class="form-control mb-3" id="cat" />

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="categoryReg();">Category Register</button>
                    </div>

                </div>
                <!--Brand Register-->

                <div class="row mt-5">
                    <!--Clr Register -->
                    <div class="col-5 offset-1 mt-4">

                        <label for="form-label">Color Name : </label>
                        <input type="text" class="form-control mb-3" id="clr" />

                        <div class="d-none" id="msgDiv3">
                            <div class="alert alert-danger" id="msg3"></div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-outline-light col-12" onclick="colorReg();">Color Register</button>
                        </div>

                    </div>
                    <!--Clr Register-->

                    <!--Size Register-->
                    <div class="col-5 offset -2 mt-4">

                        <label for="form-label">Size Name : </label>
                        <input type="text" class="form-control mb-3" id="size" />

                        <div class="d-none" id="msgDiv4">
                            <div class="alert alert-danger" id="msg4"></div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-outline-light col-12" onclick="sizeReg();">Size Register</button>
                        </div>

                    </div>
                    <!--Size Register-->

                </div>
            </div>

        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a valid admin");
}

?>