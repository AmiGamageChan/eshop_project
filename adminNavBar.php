<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="adminDashboard.php">
      <a class="navbar-brand" href="adminDashboardWelcome.php"><img src="Resources/img/admin.svg" alt="" height="40" class="me-3">Admin Dashboard</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-nowrap" aria-current="page" href="adminDashboard.php">User Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-none d-lg-block text-nowrap" aria-current="page" href="adminDashboard.php">|</a>
          </li>
          <li class="nav-item ms-1">
            <a class="nav-link active text-nowrap" aria-current="page" href="adminProduct.php">Product Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-none d-lg-block text-nowrap" aria-current="page" href="adminDashboard.php">|</a>
          </li>
          <li class="nav-item ms-1">
            <a class="nav-link active text-nowrap" aria-current="page" href="adminStock.php">Stock Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-none d-lg-block text-nowrap" aria-current="page" href="adminDashboard.php">|</a>
          </li>
          <li class="nav-item ms-1">
            <a class="nav-link active text-nowrap" aria-current="page" href="adminReport.php">Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-none d-lg-block text-nowrap" aria-current="page" href="adminDashboard.php">|</a>
          </li>
          <li class="nav-item ms-1">
            <button class="btn btn-danger col-auto text-nowrap" onclick="adminSignOut();">Sign Out</button>
          </li>
        </ul>
      </div>


  </div>
</nav>