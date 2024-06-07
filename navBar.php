<link rel="icon" href="Resources/img/logowhite.png" type="image/x-icon">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand me-3" href="index.php"><img src="Resources/img/logo.png" alt="" height="80">Fashion Haven Clothing</a>

        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-1 mb-lg-0 m-auto">
                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="Profile.php"><img src="Resources/img/profile.svg" alt="" height="25"> User Profile</a>
                    </li>
                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="orderHistory.php">History</a>
                    </li>
                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                    </li>
                    <li class="new-item me-4">
                        <a class="nav-link active" aria-current="page" href="wishList.php">Wish List</a>
                    </li>
                    <li class="new-item me-4">
                        <button class="btn form-control btn-danger bg-danger-subtle" aria-current="page" onclick="signOut();">Signout</button>
                    </li>
                </ul>
                <div class="form-check form-switch ms-auto">
                    <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                    <label class="form-check-label" for="darkModeSwitch">Switch Theme</label>
                </div>
            </div>
        </div>

        <!-- Dropdown Menu for Small Screens -->
        <div class="dropdown d-lg-none text-center">
            <div class="d-inline-block">
                <button class="btn btn-info dropdown-toggle bg-info-subtle shadowbox" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="nav-link dropdown-item ms-1" href="Profile.php">User Profile</a>
                    <a class="nav-link dropdown-item ms-1" href="orderHistory.php">History</a>
                    <a class="nav-link dropdown-item ms-1" href="cart.php">Cart</a>
                    <button class="btn bg-danger-subtle" onclick="signOut();">Signout</button>
                </div>
            </div>
        </div>
    </div>
</nav>

