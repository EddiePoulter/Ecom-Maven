<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maven - Register</title>
  <?php include "css.php"; ?>
  <link rel="icon" href="/resources/images/public/Icon.png">
  <link rel="stylesheet" href="/resources/css/register.css">
</head>

<div class="register-container">
  <h2>Register a Maven Account</h2><br>
  <form method="post" action="register.php">
    <input type="email" name="email" id="email" placeholder="Enter your email address" required /><br>

    <input type="email" name="confirm_email" id="confirm_email" placeholder="Confirm your email address" required />
    <span id="email_match"></span><br>

    <input type="password" name="password" id="password" placeholder="Enter your password" required /><br>

    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required />
    <span id="password_match"></span><br>

    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required />
    <span id="phone_match"></span><br>
    <p> Already a user? <a href="login.php">Log in</a></p><br>

    <input type="submit" value="Register" />
    <input type="reset" value="Clear" />
    <input type="hidden" name="submitted" value="true" />
  </form>
</div>

  <script>
    document.getElementById('confirm_email').addEventListener('input', function () {
      var email = document.getElementById('email').value;
      var confirm_email = document.getElementById('confirm_email').value;

      if (email === confirm_email) {
        document.getElementById('email_match').style.color = 'green';
        document.getElementById('email_match').innerHTML = '';
      } else {
        document.getElementById('email_match').style.color = 'red';
        document.getElementById('email_match').innerHTML = 'Emails do not match.';
      }
    });

    document.getElementById('confirm_password').addEventListener('input', function () {
      var password = document.getElementById('password').value;
      var confirm_password = document.getElementById('confirm_password').value;

      if (password === confirm_password) {
        document.getElementById('password_match').style.color = 'green';
        document.getElementById('password_match').innerHTML = '';
      } else {
        document.getElementById('password_match').style.color = 'red';
        document.getElementById('password_match').innerHTML = 'Passwords do not match.';
      }
    });

    document.getElementById('phone').addEventListener('input', function () {
    var phone = document.getElementById('phone').value;

    if (phone.length === 10) {
      document.getElementById('phone_match').style.color = 'green';
      document.getElementById('phone_match').innerHTML = '';
    } else {
      document.getElementById('phone_match').style.color = 'red';
      document.getElementById('phone_match').innerHTML = 'Enter a valid phone number';
    }
  });
  </script>

<body>
  <footer>
    <?php include("footer.php"); ?>
  </footer>
</body>