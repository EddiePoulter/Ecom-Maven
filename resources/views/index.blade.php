<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven Home Page</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @include('css')
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
</head>
    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <style>
       
    </style>
  </head>
  <body>
    @include('nav')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('{{ asset('images/men-snowboard.jpg') }}'); background-size: cover;
background-position: center;
height: 60vh;
border-bottom-left-radius: 20px;
border-bottom-right-radius: 20px;">
  <div class="container text-dark py-5" style="padding-left: 50%;">
      <h1 class="display-4">Welcome to <span style="color: #121212;">Maven</span></h1>
      <p class="lead">Discover the thrill of skiing with us!</p>
  </div>
</section>

<br>



<!-- Featured Destinations Section -->
<div class="container">
  <p class="text-center display-4 font-weight-bold mb-4">Featured Products</p>
  <div class="row">
      <div class="col-lg-4 mb-4">
          <div class="card h-100">
              <img src="{{ asset('images/product-images/skiingcoat.png') }}" class="card-img-top" alt="Blue Ski Jacket">
              <div class="card-body">
                  <h5 class="card-title">Blue Ski Jacket</h5>
                  <p class="card-text">A stylish and functional blue ski jacket for your winter adventures.</p>
                  <a href="{{ asset('products') }}" class="btn btn-primary">View</a>
              </div>
          </div>
      </div>
      <div class="col-lg-4 mb-4">
          <div class="card h-100">
              <img src="{{ asset('images/product-images/skigloves.jpg') }}" class="card-img-top" alt="Unisex Gloves">
              <div class="card-body">
                  <h5 class="card-title">Unisex Gloves</h5>
                  <p class="card-text">Comfortable and warm ski gloves designed for both men and women.</p>
                  <a href="{{ asset('products') }}" class="btn btn-primary">View</a>
              </div>
          </div>
      </div>
      <div class="col-lg-4 mb-4">
          <div class="card h-100">
              <img src="{{ asset('images/product-images/skiingequipmentset.png') }}" class="card-img-top" alt="Unisex Ski Helmet">
              <div class="card-body">
                  <h5 class="card-title">Unisex Ski Helmet</h5>
                  <p class="card-text">A protective and comfortable helmet for skiing, suitable for all genders.</p>
                  <a href="{{ asset('products') }}" class="btn btn-primary">View</a>
              </div>
          </div>
      </div>
  </div>
</div>



<div class="flex">
  <!-- About Us Section -->
  <div class="col-md-5 abt">
    <div class="p-4 bg-light rounded border">
        <h2>About Us</h2>
        <p class="lead">Welcome to <strong>Maven</strong>, where skiing passion meets precision! Founded by avid skiers, we're dedicated to providing top-quality gear and accessories for every level of skier.</p>
        <div class="text-center mt-3">
            <img class="img-fluid rounded border" src="{{ asset('images/manskiing.jpg') }}" alt="About Us Image" style="max-width: 80%; max-height: 80vh;">
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('about') }}" class="nav-link px-2 text-muted">
                <button type="button" class="btn btn-outline-primary">Learn More</button>
            </a>
        </div>
    </div>
</div>

  <!-- Purpose Section -->
  <div class="col-md-5 purp">
    <div class="p-4 bg-light rounded border">
        <h2 class="text-right">Purpose</h2>
        <p class="lead text-right">Ski clothes are <strong>specially designed</strong> for the demands of skiing - offering the perfect balance of <strong>breathability</strong>, <strong>waterproofness</strong>, <strong>insulation</strong>, and <strong>durability</strong> to match your intensity on the slopes. While a parka is ideal for sub-zero temperatures, it lacks the <strong>mobility</strong> required for skiing's dynamic movements.</p>
        <div class="text-center mt-3">
        <img class="img-fluid rounded border" src="{{ asset('images/skiingclothes.jpg') }}" alt="Purpose Image" style="max-width: 80%; max-height: 80vh;">
      </div>
    </div>
  </div>
</div>





{{-- <!-- Newsletter Section -->
<section class="newsletter-section py-5">
  <div class="container">
      <div class="row">
          <div class="col-md-6 mx-auto">
              <h2 class="text-center mb-4">Subscribe to Our Newsletter</h2>
              <form>
                  <div class="form-group">
                      <input type="email" class="form-control" placeholder="Enter your email">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
              </form>
          </div>
      </div>
  </div>
</section> --}}

{{-- 
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" style="width: 100%; height: 50%;" src="{{ asset('images/men-snowboard.jpg') }}" alt="First slide">
          <div class="carousel-caption d-none d-md-block" style="top: 34%;">
            <h1>Welcome to Maven</h1>
            <p>We are Maven, a home for skiers.</p>
          </div>
        </div>
      </div> --}}
      
     
{{-- <div class="container marketing">
<br>
<br>
<div class="row">
    <p class="col-12 text-center display-4 font-weight-bold">Featured Products</p>
    <div class="col-lg-4">
        <img src="{{ asset('images/product-images/skiingcoat.png') }}" alt="Generic placeholder image" width="140" height="140">
        <h2>Blue Ski Jacket</h2>
        <p>A stylish and functional blue ski jacket for your winter adventures.</p>
        <button type="button" class="btn btn-primary"  onclick="window.location.href='{{ asset('products') }}'">View</button>
    </div>
    <div class="col-lg-4">
        <img src="{{ asset('images/product-images/skigloves.jpg') }}" alt="Generic placeholder image" width="140" height="140">
        <h2>Unisex Gloves</h2>
        <p>Comfortable and warm ski gloves designed for both men and women.</p>
        <button type="button" class="btn btn-primary"  onclick="window.location.href='{{ asset('products') }}'">View</button>
    </div>
    <div class="col-lg-4">
        <img src="{{ asset('images/product-images/skiingequipmentset.png') }}" alt="Generic placeholder image" width="140" height="140">
        <h2>Unisex Ski Helmet</h2>
        <p>A protective and comfortable helmet for skiing, suitable for all genders.</p>
        <button type="button" class="btn btn-primary"  onclick="window.location.href='{{ asset('products') }}'">View</button>
      </div>
</div>
</div> --}}


        {{-- <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette" style="margin: 10px">
          <div class="col-md-7">
            <br>
            <h2 class="featurette-heading">About Us</h2>
            <br>
            <p class="lead">Welcome to Maven, where passion meets precision on the slopes! Established by avid skiers with a shared love for the exhilarating rush of adventures, we are dedicated to providing top-notch skiing equipment that enhances your performance and enjoyment on the snow-covered peaks.
            <br>
            <br>
            At Maven, we believe that every skier, from the novice to the seasoned pro, deserves access to the best gear. Our curated selection of skis, boots, apparel, and accessories reflects our commitment to quality, innovation, and a seamless blend of style and functionality.</p>
            <br>
            <button type="button" class="btn btn-primary"  onclick="window.location.href='{{ asset('about') }}'">About Us</button>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="{{ asset('images/manskiing.jpg') }}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2" style="padding-right: 0;">
            <h2 class="featurette-heading">Why Do I Need Ski Clothing?</h2>
            <p class="lead">Ski clothes are different from other cold weather gear, they're built to handle the specific conditions of skiing - 
              its level of breathability, waterproofness, insulation and durability are all carefully balanced to match your activity and level of intensity on or off the slopes.
              <br>
              <br> 
              While a parka is great for sub-zero temperatures, it would quickly make you too sweaty during more intense skiing, and it lacks the mobility needed for performance on the mountain</p>
            <br>
            <button type="button" class="btn btn-primary"  onclick="window.location.href='{{ asset('products') }}'">Products</button>
          </div>
          <div class="col-md-4 order-md-1" >
            <img class="img-fluid mx-auto" src="{{ asset('images/skiingclothes.jpg') }}" alt="Generic placeholder image">
          </div>
        </div>
        <hr class="featurette-divider">
      </div> --}}

      <!-- News and Updates Section -->
<section class="container mt-5">
    <h2 class="text-center mb-4">News and Updates</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
              <!---  <img src="{{ asset('images/skiresort.jpg') }}" class="card-img-top" alt="News Image 1">--->
                <div class="card-body">
                    <h5 class="card-title">The Best Ski Resort For This Christmas Holiday</h5>
                    <p class="card-text"> Embrace the magic of the holiday season at our premier ski resort, where winter dreams come alive!</p>
                    <a href="https://cntraveller.com/gallery/best-places-to-go-at-christmas" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
              <!---  <img src="{{ asset('images/skiingclub.jpg') }}" class="card-img-top" alt="News Image 2">--->
                <div class="card-body">
                    <h5 class="card-title">Olympic Racer Offers Crucial Skiing Advice</h5>
                    <p class="card-text">Here is Olympic medalist racer Deb Armstrong with some amazing skiing advice! Make sure not to miss out!</p>
                    <a href="https://www.powder.com/trending-news/olympic-racer-counterintuitive-advice" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
             <!---   <img src="{{ asset('images/news3.jpg') }}" class="card-img-top" alt="News Image 3">--->
                <div class="card-body">
                    <h5 class="card-title">Europa Cup: The 2023 “Queens Of Goasleitn” To Be Crowned</h5>
                    <p class="card-text">After three successful editions, the women's FIS European Cup is returning to Skiworld Ahrntal!</p>
                    <a href="https://www.fis-ski.com/en/alpine-skiing/alpine-news-multimedia/news-multimedia/news/season-2023-24/europa-cup-the-2023-queens-of-goasleitn-to-be-crowned-in-ahrntal" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="special-offers-tab">
        <!-- Close button for the special offers tab -->
        <button type="button" class="close" aria-label="Close" onclick="closeSpecialOffersTab()">
            <span aria-hidden="true">&times;</span>
        </button>

        <!-- Special offers content -->
        <div class="card-body">
            <h5 class="card-title">Special Offer</h5>
            <p class="card-text"></p>
            <a href="#" class="btn btn-primary"  onclick="window.location.href='{{ asset('products') }}'">Shop Now</a>
        </div>
    </div>
</section>
<hr class="featurette-divider">

<script>
    function closeSpecialOffersTab() {
        // Get the special offers tab element
        var specialOffersTab = document.querySelector('.special-offers-tab');
        // Hide the special offers tab
        specialOffersTab.style.display = 'none';
    }
</script>

</section>


</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    @include('footer')
  </body>
</html>

</body>

</html>
