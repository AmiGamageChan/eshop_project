<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Resources/img/logowhite.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <title>Fashion Haven - Forget Password</title>
</head>

<body class="rsbody quick-font">
    <!-- Forget password box -->
    <div class="signIn-box" id="signInBox">

        <div class="mb-2">
            <label class="form-label text-dark">Enter You Email</label>
            <input type="email" class="form-control" id="e"/>
        </div>

        <div class="d-none mt-4" id="msgDiv">
            <div class="text-danger mt-1" id="msg">
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-info col-12" onclick="forgetPassword();">Send Email</button>
        </div>

    </div>
    <!-- Forget password box    -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>