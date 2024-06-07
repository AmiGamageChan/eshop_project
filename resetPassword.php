<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Resources/img/logowhite.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <title>Fashion Haven - Reset Password</title>
</head>

<body class="rsbody quick-font">
    <!-- Reset password box -->
    <div class="signIn-box" id="signInBox">

        <div class="d-none">
            <input type="hidden" id="vcode" value="<?php echo($_GET["vcode"]); ?>"/>
        </div>
        

        <div>
            <label class="form-label text-dark">Password</label>
            <input type="password" class="form-control" id="np" />
        </div>

        <div class="mt-4 mb-2">
            <label class="form-label text-dark">Re-enter Password</label>
            <input type="password" class="form-control" id="np2" />
        </div>

        <div class="d-none mt-4 " id="msgDiv">
            <div class="text-danger" id="msg">
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-info col-12" onclick="resetPassword();">Reset Password</button>
        </div>



    </div>
    <!-- Reset password box    -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>