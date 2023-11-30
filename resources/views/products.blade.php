<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!---Bootstrap CSS--->
  
    <title>Products</title>
    @include('css')
</head>
<body>
  @include('nav')

<!-- Bootstrap core CSS -->
<link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="products.css" rel="stylesheet">

</head>

<body>
<header>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><br>Products</h1>
    </div>
</section>

<div class="products py-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <!-- Product Card 1 -->
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/skiingequipmentset.png') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski(178cm) Equipment Set</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£284.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product Card 1 -->
            </div>

            <div class="col-md-4">
                <!-- Product Card 2 -->
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/skiingcoat.png') }}">
                    <div class="card-body">
                        <p class="card-text">Blue Ski Jacket</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£49.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product Card 2 -->
            </div>

            <div class="col-md-4">
                <!-- Product Card 3 -->
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/pairofski.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski(178cm)</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£94.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product Card 3 -->
            </div>
        </div>

        <!-- New Row for the next set of products -->
        <div class="row">
            <!-- Product Card 4 -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/skigoggles2.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski Goggles</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£59.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Card 4 -->

            <!-- Product Card 5 -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/skihelmet.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski Helmet</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£79.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Card 5 -->

            <!-- Product Card 6 -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/snowboard.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Snowboard(155cm)</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£309.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Card 6 -->
        </div>

        <!-- New Row for the next set of products -->
        <div class="row">
            <!-- Product Card 7 -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/pairofskiandpoleset.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski(178cm) and Pole Set</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£169.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Card 7 -->

            <!-- Product Card 8 -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/skipoles.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski Poles</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£69.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Card 8 -->

            <!-- Product Card 9 -->
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/product-images/skigloves.jpg') }}">
                    <div class="card-body">
                        <p class="card-text">Unisex Ski Gloves</p>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <i class='bx bxs-star' ></i>
                        <p>£14.99</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button
                              </div>
                          </div>
                     </div>
                  </div>
              </div>
           </div>


</main>

<footer class="text-muted text-center">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
  </div>
  @include('footer')
</footer>


</body>
</html>

</body>
</html>