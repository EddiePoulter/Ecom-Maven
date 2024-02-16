<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    @include('css')
    <style>
        .Container {
            width: 100%;
            text-align: center;
            align-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    @include('nav')
    <div class="Container">
        <h1>Verify your email</h1>
        <div class="text">
            <p>Please check your inbox & Click the link in order to verify. <i class='bx bx-mail-send'></i></p>            
        </div>
        <div class="image">
            <img src="{{ asset('images/verify-email.png') }}">
        </div>
        <div class="text">
            <footer>
                Can't see the email? Be sure to check your <strong>Junk or Spam</strong> folder.
            </footer>
        </div>
    </div>

    @include('footer')
</body>
</html>
