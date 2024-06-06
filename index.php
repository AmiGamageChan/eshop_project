<?php

include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Fashion Haven</title>
</head>

<body onload="loadProduct(0);" class="quick-font">

    <!--Nav bar -->
    <?php include "NavBar.php"; ?>
    <!--Nav bar -->

    <!-- carousel -->
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8 mt-5">
                <div class="container shadow mt-4">
                    <div class="card-body shadowbox">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active ">
                                    <img class="d-block w-100" src="Resources/Branding/brand.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Resources/Branding/brand3.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Resources/Branding/partners.gif" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Basic search-->
    <div class="container col-12 d-flex justify-content-center mt-5">
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
                    <label for="form-label" class="col-3">Color:</label>
                    <select id="color" class="form-select col-auto">
                        <option value="0">Select Color</option>
                        <?php
                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $d["color_id"]; ?>"><?php echo $d["color_name"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-3">
                    <label for="form-label" class="col-3">Category:</label>
                    <select id="cat" class="form-select col-auto">
                        <option value="0">Select Category</option>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `category`");
                        $num2 = $rs2->num_rows;

                        for ($x = 0; $x < $num2; $x++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <option value="<?php echo $d2["cat_id"]; ?>"><?php echo $d2["cat_name"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-3">
                    <label for="form-label" class="col-3">Brand: </label>
                    <select id="brand" class="form-select  col-auto">
                        <option value="0">Select Brand</option>
                        <?php
                            $rs3 = Database::search("SELECT * FROM `brand`");
                            $num3 = $rs3->num_rows;

                            for ($p = 0; $p < $num3; $p++) {
                                $d3 = $rs3->fetch_assoc();
                            ?> <option value="<?php echo $d3["brand_id"]; ?>"><?php echo $d3["brand_name"]; ?></option>
                        <?php
                            }
                        ?>
                        </select>
                </div>

                <div class="col-3">
                    <label for="form-label" class="col-3">Size:</label>
                    <select id="size" class="form-select  col-auto">
                        <option value="0">Select Size</option>
                        <<?php
                            $rs4 = Database::search("SELECT * FROM `size`");
                            $num4 = $rs4->num_rows;

                            for ($k = 0; $k < $num4; $k++) {
                                $d4 = $rs4->fetch_assoc();
                            ?> <option value="<?php echo $d4["size_id"]; ?>"><?php echo $d4["size_name"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-4 col-12">
                <div class="col-6">
                    <input id="min" type="text" class="form-control" placeholder="Min Price">
                </div>
                <div class="col-6">
                    <input id="max" type="text" class="form-control" placeholder="Max Price">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                    <button class="btn btn-outline-light col-lg-6 col-sm-4 col-md-4 " onclick="advSearchProduct(0);"> Search</button>
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
    <?php include "footer.php"; ?>  
    <!--Footer-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>