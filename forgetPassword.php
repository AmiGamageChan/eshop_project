<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <title> Forget Password</title>
</head>

<body class="sbody">
    <!-- Forget password box -->
    <div class="signIn-box" id="signInBox">

        <h2 class="text-center">Forget Password</h2>
        
        <div class="mt-4 mb-2">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" id="e"/>
        </div>

        <div class="d-none mt-4" id="msgDiv">
            <div class="text-danger" id="msg">
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