
<?php include "adminNavBar.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar ">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column align-items-center mt-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Integrations
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">User</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </main>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
        <!--Footer-->
        <div class="col-12 mt-3">
        <p class="text-center fixed-bottom">&copy; 2024 Fashion Haven.lk || All Right Reserved </p>
    </div>
    <!--Footer-->
</html>
