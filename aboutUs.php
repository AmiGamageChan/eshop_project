<?php include "NavBar.php"; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="Resources/img/logowhite.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Fashion Haven - About Us</title>
        <style>
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
            }

            .logo {
                max-width: 200px;
                margin-bottom: 20px;
            }

            .content {
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0px 0px 10px 0px rgb(255, 227, 227);
            }

            .content h2 {
                font-size: 24px;
                color: #333;
                margin-bottom: 20px;
                
            }

            .content p {
                font-size: 16px;
                line-height: 1.6;
                color: #666;
            }

            .content p:last-child {
                margin-bottom: 0;
            }
        </style>
    </head>

    <body style="margin: 0;
                padding: 0;">
        <div class="container">
            <div class="header mt-4">
                <img src="Resources/Img/logo.png" alt="logo" class="logo mt-3">
                <h1>About Us</h1>
            </div>

            <div class="content shadow">
                <h2>Our Journey</h2>
                <p>Fashion Haven was founded with a simple mission: to provide high-quality, fashionable clothing at affordable prices. Since our inception in 2024, we've been committed to offering trendy styles that empower individuals to express themselves through fashion.</p>
                <p>Our team of designers works tirelessly to stay ahead of the latest trends, ensuring that our customers always have access to the freshest looks. With a focus on sustainability and ethical practices, we're proud to offer clothing that not only looks good but feels good too.</p>
            </div>

            <div class="header mt-4">
            <p>Our Partners<p>
                <img src="Resources/branding/moose.jpg" alt="logo" class="logo mt-3">
                <img src="Resources/branding/carnage.png" alt="logo" class="logo mt-3">
                <img src="Resources/branding/deedat.webp" alt="logo" class="logo mt-3">
                <img src="Resources/branding/nike.png" alt="logo" class="logo mt-3">
            </div>

        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    </html>

    <div class="fixed-bottom"><?php include "footer.php"; ?></div>
