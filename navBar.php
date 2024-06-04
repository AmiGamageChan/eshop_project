<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand h1 mb-0" href="index.php">
            <img src="Resources/img/icon.ico" alt="" height="25" class="me-3">
            Online Store</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto">


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
            </div>
        </div>


    </div>
</nav>