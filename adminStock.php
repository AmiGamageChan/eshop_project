<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock - Admin Panel</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="adminBody quick-font">
        <?php
        include "adminNavBar.php";
        ?>

        <div class="container-fluid" style="margin-top: 80px;">

            <div class="row">
                <div class="col-5 offset-1">

                    <h2 class="text-center">Product Registration</h2>

                    <div class="mb-3">
                        <label class="form-label" for="">Product Name</label>
                        <input type="text" class="form-control" id="pname" placeholder="Enter Product Name">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Brand</label>
                            <select class="form-select" id="brand">
                                <option value="0">Select</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `brand`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["brand_id"]);?>"><?php echo($data["brand_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="">Category</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `category`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["cat_id"]);?>"><?php echo($data["cat_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `color`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["color_id"]);?>"><?php echo($data["color_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `size`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["size_id"]);?>"><?php echo($data["size_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="">Description</label>
                        <textarea class="form-control" id="desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Product Image</label>
                        <input id="file" class="form-control" type="file" multiple>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" onclick="regProduct();">Register Product</button>
                    </div>
                </div>

                <div class="col-5">

                    <h2 class="text-center">Stock Update</h2>

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <select class="form-control form-select" id="selectProduct">
                            <option>Select</option>
                            <?php 
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["name"]); ?></option>
                            <?php
                            }
                            
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Qty</label>
                        <input class="form-control" type="text" id="qty"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="uprice">
                    </div>

                    <div class="d-grid">
                        <div class="btn btn-info" onclick="updateStock();">Update Stock</div>
                    </div>

                </div>

            </div>

        </div>

        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 Fashion Haven || All Right Reserved</p>
        </div>
        <!-- footer -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You're not an admin");
}

?>