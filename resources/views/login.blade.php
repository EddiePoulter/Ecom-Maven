<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Maven</title>
    <link rel="icon" href="/resources/images/public/Icon.png">
    <link rel="stylesheet" href="/Ecom-Maven/resources/css/login.css">
    <?php include "css.blade.php"; ?>

</head>

<nav>
  <?php include("nav.blade.php"); ?>
</nav>
    
    <div class="login-container">
        <div class="formation">
        <h1>Login to Maven</h1>
        <form action="index.php" method="post">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="submit" value="Login" />
            <input type="button" value="Register" onclick="window.location.href='signup.blade.php'" />
            <?php if (!empty($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
            <input type="hidden" name="submitted" value="TRUE" />
            <p><a href="forgot_password.php"><br>Forgot Your Password?</a></p>
        </form>
        </div>
    </div>

<footer>
    <?php include "footer.blade.php"; ?>
</footer>