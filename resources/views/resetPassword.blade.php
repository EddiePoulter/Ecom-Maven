<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <!-- Section to reset the password -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reset Password</h4>
                        <form action="{{ url('reset-password') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Enter new password">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input name="password_confirmation" type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                            </div>
                            <input name="email" type="hidden" class="form-control" id="email" value="{{$email}}">
                            <input type="hidden" id="token" name="token", value="{{$token}}">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password reset success !! -->
    <div class="container confirmation-section text-center">
        <h1>Password Reset Success!</h1>
        <div class="text">
            <p>Your password has been successfully reset. You can now use your new password to log in. <i class='bx bx-check'></i></p>
        </div>
        <div class="image">
            <img src="https://via.placeholder.com/400" alt="Password Reset Success">
        </div>
        <div class="text">
            <footer>
                If you have any issues, please contact support.
            </footer>
        </div>
    </div>
</body>

</html>
