<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven - Contact Us</title>
    @include('css')
    <link rel="icon" href="/resources/images/public/Icon.png">
</head>
<body>
    @include('nav')
    <div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="contact-info">
                <h1>Maven - Contact Us</h1>
                <p>Have any questions or feedback? We're here to assist you!</p>
                <p>Feel free to reach out to our dedicated Maven management team anytime!</p>
                <p>Connect with us through our social media links below, or visit us in person at our address listed below.</p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-address">
                        <h3>Maven Address:</h3>
                        <p>123 Ski Hill Road<br>Mountainsville, CO 12345<br>United Kingdom</p>
                        <p>Phone: <a href="tel:+123456789">+44 0123 456 789</a></p>
                        <p>Email: <a href="mailto:info@mavenskiinggear.com">info@mavenskiinggear.com</a></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="social-icons">
                        <h3>Follow Us:</h3>
                        <a href="https://www.facebook.com/mavenskiinggear" target="_blank">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Facebook_Logo_2023.png/768px-Facebook_Logo_2023.png" alt="Facebook Logo" width="30px">
                            Facebook
                        </a>
                        <br>
                        <a href="https://twitter.com/mavenskiinggear" target="_blank">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/X_logo_2023_original.svg" alt="Twitter Logo" width="30px">
                            Twitter
                        </a>
                        <br>
                        <a href="https://www.instagram.com/mavenskiinggear/" target="_blank">
                            <img src="https://www.edigitalagency.com.au/wp-content/uploads/new-Instagram-logo-png-full-colour-glyph.png" alt="Instagram Logo" width="30px">
                            Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('footer')
</body>

</html>
