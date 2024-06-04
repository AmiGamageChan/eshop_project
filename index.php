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
            <input type="text" class="form-control" placeholder="Product Name" id="product" onkeyup="searchProduct(0);" />
        </div>
        <button class="btn btn-outline-info col-1 ms-2 mt-3" onclick="viewFilter();">Filters</button>
    </div>
    <!--Basic search-->

    <!--Advanced search-->
    <div class="d-none" id="filterId">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">
            <div class="row col-12">
                <div class="col-3">
                    <label for="form-label" class="col-3">Color :</label>
                    <select class="form-select">
                        <option value="0">Select Color</option>
                        <option value="1">Red</option>
                    </select>
                </div>

                <div class="col-3">
                    <label for="form-label" class="col-3">Category :</label>
                    <select class="form-select">
                        <option value="0">Select Category</option>
                        <option value="1">Red</option>
                    </select>
                </div>

                <div class="col-3">
                    <label for="form-label" class="col-3">Brand :</label>
                    <select class="form-select">
                        <option value="0">Select Brand</option>
                        <option value="1">Red</option>
                    </select>
                </div>

                <div class="col-3">
                    <label for="form-label" class="col-3">Size :</label>
                    <select class="form-select">
                        <option value="0">Select Size</option>
                        <option value="1">Red</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4 col-12">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min Price">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max Price">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                    <button class="btn btn-outline-light col-lg-3 col-sm-4 col-md-4 " onclick="advSearchProduct(0);"> Search</button>
                </div>
            </div>
        </div>
    </div>
    <!--Advanced search-->

    <!--Card Loading-->
    <div class="row col-10 offset-1" id="pid">

    </div>
    <!--Card Loading-->


    <!--Footer-->
    <div class="col-12 mt-3">
        <p class="text-center">&copy; 2024 Online Store.lk || All Right Reserved </p>
    </div>
    <!--Footer-->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>