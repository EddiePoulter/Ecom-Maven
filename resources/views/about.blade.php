<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Maven</title>
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @include('css')
</head>

<body>
    @include('nav')

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
            <span class="fs-4">Learn more about Maven!</span>
        </a>
            </header>

            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">About Us</h1>
                    <p class="col-md-8 fs-4">Welcome to the world of adventure, adrenaline, and snowy slopes. At Maven, we live and breathe the spirit of skiing. Our journey began with a passion for the mountains and a dream to share the joy of skiing with the world.</p>
                    <a href="{{ route('products') }}" class="btn btn-primary btn-lg" role="button">Explore Our Products</a>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-bg-dark rounded-3">
                        <h2>Your Adventure Awaits</h2>
                        <p>Embark on a skiing adventure like never before. Our high-quality skiing products are crafted for enthusiasts, beginners, and everyone in between. Whether you're conquering the slopes or enjoying a scenic ride, we've got the gear to elevate your experience.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Passion for Perfection</h2>
                        <p>We are committed to perfection in every stitch, material, and design. Our products undergo rigorous testing to ensure durability, comfort, and style. Discover a new level of performance with our innovative skiing gear.</p>
                    </div>
                </div>
            </div>
        </div>


<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
        </a>
    </header>
</div>

<div class="container marketing">
    <br>
    <div class="row featurette">
        <div class="col-md-6">
            <img src="/images/aboutski.jpg" alt="Skiing Image" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto"> <br><br>
        </div>
        <div class="col-md-6">
            <h2 class="featurette-heading fw-normal lh-1"><br><br><br>Meet the Creators</h2>
            <p class="lead">We are a passionate team of individuals who have worked tirelessly to bring you this amazing website. Get to know the faces behind the scenes:</p><br>
            <p style="text-align: center;">
                Milad Amini<br>
                Aland Azad<br>
                Othman Alotaibi<br>
                Omer Bakr<br>
                Ephraim Adefuye<br>
                Eddie Poulter<br>
                Talhah Altafi<br>
            </p>
        </div>
    </div>
</div>
    <br>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b0vJNvq4uhE3n06SxLrVwxz1Qn7BBp0GWhn7a7tKTBBmHGpZx0bpK7dA9aIJJdKM" crossorigin="anonymous"></script>
</body>

</html>
