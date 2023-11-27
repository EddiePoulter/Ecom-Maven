<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven Home Page</title>
    <?php include "css.blade.php"; ?>
    <link rel="icon" href="/resources/images/public/Icon.png">
</head>

<body class="d-flex flex-column" style="min-height: 100vh;">

    <?php include "nav.blade.php"; ?>

    <div class="container mt-5 flex-grow-1">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center">
                <div class="welcome-text">
                    <p class="display-4 font-weight-bold">Welcome to Maven.</p>
                </div>
                <img src="/Ecom-Maven/resources/images/public/indexBannerSki.jpg" class="img-fluid mt-3" style="max-width: 250%; margin-left: -140px; border-radius: 10px; margin-top: -20px;" alt="Welcome Image">
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light py-4 mt-auto">
        <div class="container">
            <div class="row justify-content-center">
                <a href="about.blade.php" class="col-md-3 col-sm-6 text-decoration-none text-center">
                    <div class="text">About Us</div>
                </a>
                <a href="contact.blade.php" class="col-md-3 col-sm-6 text-decoration-none text-center">
                    <div class="text">Contact</div>
                </a>
            </div>
        </div>
    </footer>

</body>

</html>
