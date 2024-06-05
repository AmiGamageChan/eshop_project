<nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="Resources/img/logo.png" alt="" height="90" class="me-3">Online Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-1 mb-lg-0 m-auto">


                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="Profile.php">User Profile</a>
                    </li>

                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="orderHistory.php">History</a>
                    </li>

                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                    </li>

                    <li class="new-item me-4">
                        <button class="btn form-control btn-danger" aria-current="page" onclick="signOut();">Signout</button>
                    </li>
                </ul>

                <div class="form-check form-switch ms-auto">
                    <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                    <label class="form-check-label" for="darkModeSwitch">Switch Theme</label>
                </div>
            </div>
        </div>




    </div>
</nav>