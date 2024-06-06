<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <title>Fashion Haven</title>
    </head>

    <body class="quick-font">
        <?php include "NavBar.php" ?>

        <div class="adminBody">
            <div class="row container">
                <div class="col-4 d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="<?php
                                    if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                    } else {
                                        echo ("Resources/img/profile.svg");
                                    }
                                    ?>" height="300px" alt="No User Image">
                    </div>
                    <div class="mt-3">
                        <label for="from-label">Profile Image</label>
                        <input type="file" class="form-control" id="imgUploader" />
                    </div>
                    <div>
                        <button class="btn btn-outline-warning col-12 mt-4" onclick="updateImg('<?php echo $d['id']; ?>');">Upload</button>
                    </div>
                </div>
                <div class="col-8">
                    <h2 class="text-center">Profile Details</h2>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["fname"] ?>" id="fname" disabled />
                        </div>
                        <div class="col-6">
                            <label for="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"] ?>" id="lname" disabled />
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $d["email"] ?>" id="email">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $d["mobile"] ?>" id="mobile">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Username</label>
                        <input type="text" class="form-control" value="<?php echo $d["username"] ?>" id="uname">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Password</label>
                        <input type="password" class="form-control" value="<?php echo $d["password"] ?>" id="pw" disabled>
                    </div>
                    <div class="justify-content-center">
                        <a href="forgetPassword.php">Change Your Password</a>
                    </div>
                    <h5 class="mt-3">Shipping Address</h5>
                    <div class="row mt-3">
                        <div class="col-3 d-none">
                            <label for="form-label">ID: </label>
                            <input type="text" class="form-control" value="<?php echo $d["id"] ?>" id="uid">
                        </div>
                        <div class="col-3">
                            <label for="form-label">No:</label>
                            <input type="text" class="form-control" value="<?php echo $d["no"] ?>" id="no">
                        </div>
                        <div class="col-9">
                            <label for="form-label">Line 01:</label>
                            <input type="text" class="form-control" value="<?php echo $d["line_1"] ?>" id="line_1">
                        </div>
                        <div class="col-12">
                            <label for="form-label">Line 02:</label>
                            <input type="text" class="form-control" value="<?php echo $d["line_2"] ?>" id="line_2">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="userUpdate('<?php echo $d['id']; ?>');">Update</button>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-outline-danger col-12" onclick="userDelete();">Delete Account ⚠️</button>
                </div>
            </div>
        </div>




        <!-- footer -->

        <div class=" col-12 mt-3">
            <p class="text-center fixed-bottom">&copy; 2024 Fashion Haven || All Right Reserved</p>
        </div>

        <!-- footer -->


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: signIn.php");
}

?>