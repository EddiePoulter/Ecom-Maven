<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven - Contact Us</title>
    @include('css')
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
    <style>

.feature {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .social-links {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            flex-direction: column;
            align-items: center;
        }
        .social-links a {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }
        .feature-icon {
            display: none;
        }
        .row {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('{{ asset("images/mountainbackground.jpg") }}');
    background-size: cover;
    background-position: center;
}

.feature {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 20px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 15px;
    background-color: rgba(255, 255, 255, 0.8);
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}

.feature:hover {
    transform: scale(1.05);
}

.social-links {
    display: flex;
    justify-content: space-between; /* Space out the icons evenly */
    margin: 20px 0;
    flex-direction: row;
    align-items: center;
}

.social-links a {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 10px;
    padding: 20px;
    text-decoration: none; /* Remove the underline from the links */
    color: #000; /* Make the link text black */
}

.contact-form button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 18px; /* Make the button text larger */
}

.contact-form button:hover {
    background-color: #0056b3;
}

body .fs-2 {
    color: #007BFF !important;
}

.carousel-caption {
    position: absolute;
    top: 32%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

footer {
    flex-shrink: 0;
}
</style>
</head>

<body>
    @include('nav')
    <main>
        <h1 class="visually-hidden">Features examples</h1>

        <div class="container px-4 py-5" id="featured-3">
            <h2 class="pb-2 border-bottom">Maven - Contact Us</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="carousel-caption d-none d-md-block">
                        <p>Have any questions or feedback? We're here to assist you!</p>
                        <p>Feel free to reach out to our dedicated Maven management team anytime!</p>
                        <p>Connect with us through our social media links below, or visit us in person at our address listed below.</p>
                    </div>
                </div>
                <div class="feature col">
                    <h3 class="fs-2 text-body-emphasis">Maven Address:</h3>
                    <p>123 Ski Hill Road<br>Mountainsville, CO 12345<br>United Kingdom</p>
                    <p><b>Phone:</b> <a href="tel:+123456789">+44 0123 456 789</a></p>
                    <p><b>Email:</b> <a href="mailto:info@mavenskiinggear.com">info@mavenskiinggear.com</a></p>
                </div>
                <div class="feature col">
                    <h3 class="fs-2 text-body-emphasis">Follow Us:</h3>
                    <div class="social-links">
                        <a href="https://www.facebook.com/mavenskiinggear" target="_blank">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Facebook_Logo_2023.png/768px-Facebook_Logo_2023.png" alt="Facebook Logo" width="30px">
                            Facebook
                        </a>
                        <a href="https://twitter.com/mavenskiinggear" target="_blank">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/X_logo_2023_original.svg" alt="Twitter Logo" width="30px">
                            Twitter
                        </a>
                        <a href="https://www.instagram.com/mavenskiinggear/" target="_blank">
                            <img src="https://www.edigitalagency.com.au/wp-content/uploads/new-Instagram-logo-png-full-colour-glyph.png" alt="Instagram Logo" width="30px">
                            Instagram
                        </a>
                    </div>
                </div>
                <div class="feature col">
                    <h3 class="fs-2 text-body-emphasis">Contact Us:</h3>
                    <div class="contact-form">
                        <p>Have a question or feedback? Fill out our contact form and we'll get back to you as soon as possible.</p>
                        <button onclick="window.location.href='{{ url('/contactform') }}'">Go to Contact Form</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
<footer>
    @include('footer')
</footer>
</body>

</html>
