<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <title>online store</title>
    </head>

    <body>
        <?php include "NavBar.php" ?>

        <div class="adminBody">
            <div class="row container">
                <div class="col-4 d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="<?php
                                    if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                    } else {
                                        echo ("Resources/profile.png");
                                    }
                                    ?>" height="150px">
                    </div>
                    <div class="mt-3">
                        <label for="from-label">Profile Image</label>
                        <input type="file" class="form-control" id="imgUploader"/>
                    </div>
                    <div>
                        <button class="btn btn-outline-warning col-12 mt-4" onclick="uploadImg();">Upload</button>
                    </div>
                </div>
                <div class="col-8">
                    <h2 class="text-center">Profile Details</h2>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["fname"]?>" id="fname"/>
                        </div>
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"]?>" id="lname"/>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $d["email"]?>" id="email">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $d["mobile"]?>" id="mobile">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Username</label>
                        <input type="text" class="form-control" value="<?php echo $d["username"]?>" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Password</label>
                        <input type="password" class="form-control" value="<?php echo $d["password"]?>" id="pw">
                    </div>
                    <h5 class="mt-3">Shipping Address</h5>

                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="form-label">No:</label>
                            <input type="text" class="form-control" id="no" value="<?php echo $d["no"]?>">
                        </div>
                        <div class="col-9">
                            <label for="form-label">Line 01:</label>
                            <input type="text" class="form-control" id="no" value="<?php echo $d["line_1"]?>">
                        </div>
                        <div class="col-12">
                            <label for="form-label">Line 02:</label>
                            <input type="text" class="form-control" id="no" value="<?php echo $d["line_2"]?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="updateData();">Update</button>
                    </div>
                </div>
            </div>
        </div>




        <!-- footer -->

        <div class=" col-12 mt-3">
            <p class="text-center">&copy; 2024 OnlineStore.lk || All Right Reserved</p>
        </div>

        <!-- footer -->





        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: signIn.php");
}

?>