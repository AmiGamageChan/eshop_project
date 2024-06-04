<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM `user` 
    INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`utype_id` 
    ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>User Report</title>
    </head>

    <div class="container mt-3">
        <div>
            <a class="img-fluid" href="adminReport.php"><img src="Resources/img/backicon.svg" height="90px" /></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">User Report</h2>



            <table class="table table-hover mt-5">

                <thead>
                    <tr>
                        <th class="center-vertical">User Id</th>
                        <th class="center-vertical">First Name</th>
                        <th class="center-vertical">Last Name</th>
                        <th class="center-vertical">Email</th>
                        <th class="center-vertical">Mobile No</th>
                        <th class="center-vertical">User Type</th>
                        <th class="center-vertical">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();

                    ?>
                        <tr>
                            <td class="center-vertical"><?php echo $d["id"] ?></td>
                            <td class="center-vertical"><?php echo $d["fname"] ?></td>
                            <td class="center-vertical"><?php echo $d["lname"] ?></td>
                            <td class="center-vertical"><?php echo $d["email"] ?></td>
                            <td class="center-vertical"><?php echo $d["mobile"] ?></td>
                            <td class="center-vertical"><?php
                                                        if ($d["user_type_id"] == 1) {
                                                            echo ("Admin");
                                                        } else
                                                            echo ("User");
                                                        ?></td>
                            <td class="center-vertical"><?php
                                                        if ($d["status"] == 1) {
                                                            echo ("Active");
                                                        } else
                                                            echo ("Inactive");
                                                        ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-outline-warning col-2" onclick="printDiv('printArea');">Print</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        </body>

    </html>

<?php

} else {
    echo (" You are not a valid admin");
}
