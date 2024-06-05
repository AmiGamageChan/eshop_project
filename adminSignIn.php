<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="adminSignInBody quick-font">

    <div class="adminSignInBox" id="AdminSI">
        <h2>Admin Login</h2>

        <div>
            <label for="form-label">Username</label>
            <input type="text" class="form-control border-black bg-transparent" placeholder="Ex: Amantha" id="un"/>
        </div>
        
        <div>
            <label for="form-label">Password</label>
            <input type="password" class="form-control border-black bg-transparent" placeholder="Ex: ********" id="pw"/>
        </div>
<br>
        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div>
            <button class="btn btn-success col-12" onclick="adminSignIn();">Sign In</button>
        </div>

        <div>
            <a class="btn bg-transparent pointer-event col-12" href="signIn.php">Go To User Login Portal</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>