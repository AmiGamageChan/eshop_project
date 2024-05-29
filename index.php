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
            <input type="text" class="form-control" placeholder="Product Name" id="product" onclick="searchProduct(0);"/>
        </div>
    </div>
    <!--Nav bar -->

    <!--Card Loading-->
    <div class="row col-10 offset-1" id="pid">

    </div>
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