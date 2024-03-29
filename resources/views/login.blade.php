<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Maven</title>
    <link rel="icon" href="/resources/images/public/Icon.png">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
    @include('css')
</head>
<body>
    @include('nav')
    <div class="login-container">
            <div class="formation">
            <h1>Login to Maven</h1>
            <form action="{{ url('signin') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Enter your email address" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <input type="submit" value="Login" />
                <input type="button" value="Register" onclick="window.location.href='{{ route('signup') }}'" />
                <?php if (!empty($error_message)) { ?>
                    <p class="error-message a"><?php echo $error_message; ?></p>
                <?php } ?>
                <input type="hidden" name="submitted" value="TRUE" />
                <p class="a"><a href="/forgot-password">Forgot Your Password?</a></p>
            </form>
            </div>
    </div>
    @include('footer') 
</body>
