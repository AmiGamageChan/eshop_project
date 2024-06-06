<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <title>OnlineStore</title>
</head>

<body class="sbody quick-font">

    <!-- Sign In box -->
    <div class="signIn-box" id="signInBox">

        <h2 class="text-center ">Sign In</h2>

        <?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }
        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }


        ?>

        <div class="mt-2">
            <label for="form-label">Username:</label>
            <input type="text" class="form-control" id="un" value="<?php echo $username ?>">
        </div>

        <div class="mt-2">
            <label for="form-label">Password:</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $password ?>">
        </div>

        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-chek-input" id="rm">
            <label for="form-label">Remember me:</label>
        </div>

        <div class="d-none" id="msgDiv2">
            <div class="alert alert-danger" id="msg2">
            </div>
        </div>


        <div class="mt-2">
            <button class="btn btn-success btn-outline-dark col-12" onclick="signIn();">Sign In</button>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">Haven't registered yet?</button>
        </div>
        <div class="justify-content-center mt-2">
            <a href="forgetPassword.php">Don't remember your password?</a>
        </div>

    </div>


    <!-- Sign In box -->

    <!-- Sign UP -->
    <div class="signUp-box d-none" id="signUpBox">
        <h2 class="text-center">Sign Up</h2>

        <div class="row">

            <div class="mt-2 col-6">
                <label for="form-label">First Name</label>
                <input type="text" class="form-control" id="fname">
            </div>

            <div class="mt-2 col-6">
                <label for="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname">
            </div>
        </div>

        <div class="row">

            <div class="mt-2 col-6">
                <label for="form-label">email</label>
                <input type="text" class="form-control" id="email">
            </div>

            <div class="mt-2 col-6">
                <label for="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile">
            </div>


        </div>



        <div class="mt-2">
            <label for="form-label">User Name</label>
            <input type="text" class="form-control" id="username">
        </div>

        <div class="mt-2 mb-3">
            <label for="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>

        <div class="mt-5 d-none" id="msgDiv1">
            <div class="alert alert-danger" id="msg1">
            </div>
        </div>

        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="signUp();">Sign Up</button>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">Already have an account?</button>
        </div>

    </div>

    </div>
    <!-- Sign Up -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>

</body>

</html>