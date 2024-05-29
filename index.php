<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Online store</title>
</head>

<body onload="loadProduct(0);">
    <!--Nav bar -->
    <?php include "NavBar.php"; ?>
    <!--Nav bar -->

    <!--Basic search-->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder="Product Name" />
        </div>
    </div>
    <!--Nav bar -->

    <!--Card Loading-->
    <div class="row col-10 offset-1">
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px;">
                <img class="card-img-top" src="Resources/Products/mooseFCN.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">Description</p>
                    <p class="card-text">Price</p>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-outline-primary col-6">Add to Cart</a>
                        <a href="#" class="btn btn-outline-warning col-6 ms-2">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Pagination-->
    <div class="d-flex justify-content-center mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
    </div>
    <!--Pagination-->

    <!--Card Loading-->


    <!--Footer-->
    <div class="col-12 mt-3">
        <p class="text-center">&copy; 2024 Online Store.lk || All Right Reserved </p>
    </div>
    <!--Footer-->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>