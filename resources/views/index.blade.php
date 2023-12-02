<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maven Home Page</title>
    @include('css')
    <link rel="icon" href="/resources/images/public/Icon.png">
</head>

    @include('nav')

    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>


    <main role="main">

        <div class="carousel-inner">
  <div class="carousel-item active" style="position: relative;">
    <img class="first-slide" style="width: 100%; height: 100%;" src="{{ asset('images/indexBannerSki.jpg') }}" alt="First slide">
    <div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
      <div class="carousel-caption text-left">
        <h1>Welcome to Maven</h1>
        <p>Hi, we are Maven, a home for skiers</p>
      </div>
    </div>
  </div>
</div>  



      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

<!-- Three columns of text below the carousel -->
<br>
<br>
<div class="row">
    <p class="col-12 text-center display-4 font-weight-bold">Featured Products</p>
    <div class="col-lg-4">
        <img src="{{ asset('images/product-images/skiingcoat.png') }}" alt="Generic placeholder image" width="140" height="140">
        <h2>Blue Ski Jacket</h2>
        <p>A stylish and functional blue ski jacket for your winter adventures.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <img src="{{ asset('images/product-images/skigloves.jpg') }}" alt="Generic placeholder image" width="140" height="140">
        <h2>Unisex Gloves</h2>
        <p>Comfortable and warm ski gloves designed for both men and women.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <img src="{{ asset('images/product-images/skiingequipmentset.png') }}" alt="Generic placeholder image" width="140" height="140">
        <h2>Unisex Ski Helmet</h2>
        <p>A protective and comfortable helmet for skiing, suitable for all genders.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->
</div><!-- /.container marketing -->



        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <br>
            <h2 class="featurette-heading">About Us</h2>
            <br>
            <p class="lead">Welcome to Maven, where passion meets precision on the slopes! Established by avid skiers with a shared love for the exhilarating rush of adventures, we are dedicated to providing top-notch skiing equipment that enhances your performance and enjoyment on the snow-covered peaks.
            <br>
            <br>
            At Maven, we believe that every skier, from the novice to the seasoned pro, deserves access to the best gear. Our curated selection of skis, boots, apparel, and accessories reflects our commitment to quality, innovation, and a seamless blend of style and functionality.</p>
            <br>
            <button type="button" class="btn btn-primary">About Us</button>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="{{ asset('images/manskiing.jpg') }}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Why Do I Need Ski Clothing?</h2>
            <p class="lead">Ski clothes are different from other cold weather gear, they’re built to handle the specific conditions of skiing – its level of breathability, waterproofness, insulation and durability are all carefully balanced to match your activity and level of intensity on or off the slopes.
            <br>
            <br>  
            While a parka is great for sub-zero temperatures, it would quickly make you too sweaty during more intense skiing, and it lacks the mobility needed for performance on the mountain</p>
            <br>
            <button type="button" class="btn btn-primary">Products</button>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="{{ asset('images/skiingclothes.jpg') }}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>

</body>

</html>
