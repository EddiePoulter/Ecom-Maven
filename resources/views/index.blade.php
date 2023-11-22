<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven Home Page</title>
    <?php include "css.blade.php"; ?>
    <link rel="icon" href="/resources/images/public/Icon.png">
</head>

<body style="min-width: 100vh;">
    <?php include "nav.blade.php"; ?>

    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="resources\images\public\transparentFull.png" class="img-fluid" alt="Welcome Image">
            </div>
            <div class="col-md-6">
                <div class="welcome-text">
                    <p>Welcome to Maven.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.blade.php"; ?>
</body>


</html>