<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten Password</title>
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">

    <!-- Css.blade.php -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
    .card {
        border: solid 1px #000; /* Remove border */
    }
</style>
</head>
<body>
    @if(!\Session::has('success'))
        <!-- Form for sending email -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Forgot Your Password?</h4>
                            <form action="{{ url('forgot-password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll send you a link to reset your password.</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Confirmation section  -->
        <div class="container confirmation-section text-center">
            <h1>Thank You!</h1>
            <div class="text">
                <p>We've sent a password reset link to your inbox. <i class='bx bx-mail-send'></i></p>
            </div>
            <div class="image">
                <img src="https://via.placeholder.com/400" alt="Email Sent">
            </div>
            <div class="text">
                <footer>
                    Can't see the email? Be sure to check your <strong>Junk or Spam</strong> folder.
                </footer>
            </div>
        </div>
    @endif

</body>
</html>
