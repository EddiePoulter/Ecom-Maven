<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up to Maven</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    @include('css')
    <style>
      body {
        padding: 0
      }
    </style>
</head>
@include('nav')
<div class="register-container">
<div class="formation">
  @if($errors->any())
      <script>
          let error_msg = "";
          @foreach($errors->all() as $error)
              error_msg += "{{$error}}\n";
          @endforeach
          alert(error_msg);
      </script>
  @endif
  <h2>Register a Maven Account</h2><br>
  <form method="post" action="{{ url('register') }}">
    <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" required>
    <input type="text" name="last_name" id="last_name" placeholder="Enter your last name">
    <input type="email" name="email" id="email" placeholder="Enter your email address" required />
    <input type="email" name="email_confirmation" id="email_confirmation" placeholder="Confirm your email address" required />
    <span id="email_match"></span>
    <input type="password" name="password" id="password" placeholder="Enter your password" required pattern="(?=.*[A-Za-z])(?=.*\d).{8,}" title="Password must be at least 8 characters long and contain at least 1 letter and 1 number">
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
    <span id="password_match"></span>
    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required />
    <span id="phone_match"></span>
    <br><input type="submit" value="Register" />
    <input type="reset" value="Clear" />
    <input type="hidden" name="submitted" value="true" />
    <p> <br> Already a user? <a href="{{ route('login') }}">Log in</a></p>
  </form>
</div>
</div>

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
      document.getElementById('phone_match').innerHTML = 'Enter a valid phone number.<br>';
    }
  });

  function validateEmail() {
  var email = document.getElementById('email').value;
  var confirmEmail = document.getElementById('confirm_email').value;

  // Regular expression for validating email format
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (email.trim() === '' || confirmEmail.trim() === '') {
    // Handle case when either field is empty
    // You can show a message or perform other actions
    return false;
  }

  if (!emailRegex.test(email) || !emailRegex.test(confirmEmail)) {
    // Handle case when either field does not have a valid email format
    // You can show a message or perform other actions
    return false;
  }

  if (email !== confirmEmail) {
    // Handle case when emails do not match
    // You can show a message or perform other actions
    return false;
  }

  // If the emails match and have valid format
  // Perform any other actions or form submissions here
  // Return true if the validation is successful
  return true;
}

// Attach the validation function to the input event of both email fields
document.getElementById('email').addEventListener('input', validateEmail);
document.getElementById('confirm_email').addEventListener('input', validateEmail);

function validatePassword() {
  var password = document.getElementById('password').value;
  var confirmPassword = document.getElementById('confirm_password').value;

  // Regular expression for validating password complexity
  var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  if (password.trim() === '' || confirmPassword.trim() === '') {
    // Handle case when either field is empty
    // You can show a message or perform other actions
    return false;
  }

  if (!passwordRegex.test(password)) {
    // Handle case when password does not meet complexity requirements
    // You can show a message or perform other actions
    return false;
  }

  if (password !== confirmPassword) {
    // Handle case when passwords do not match
    // You can show a message or perform other actions
    return false;
  }

  // If the passwords match and meet complexity requirements
  // Perform any other actions or form submissions here
  // Return true if the validation is successful
  return true;
}

// Attach the validation function to the input event of both password fields
document.getElementById('password').addEventListener('input', validatePassword);
document.getElementById('confirm_password').addEventListener('input', validatePassword);


  </script>
<footer>
<body>
  @include('footer')
</body>
</footer>
</html>
