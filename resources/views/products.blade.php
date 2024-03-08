@extends('shop')
   
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
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

<header>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><br>Products</h1>
    </div>
</section>

<div class="products py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 col-6 mb-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset($product->image_path) }}">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <p class="card-text"><strong>Price: </strong> £{{ $product->price }}</p>
                            <div class="btn-group" role="group" aria-label="Product Actions">
                                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-primary">View Details</a>
                                <a href="{{ route('addProduct.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $products->links() }} <!-- Display pagination links -->
            </div>
        </div>
    </div>
</div>

@extends('shop')
   
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('/images/Icon.png') }}">
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

<header>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><br>Products</h1>
    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 bg-light">
            <div class="products-filter py-5">
                <form action="{{ route('products.filter') }}" method="GET">
                    <div class="form-group">
                        <label for="price">Price Range:</label>
                        <input type="number" class="form-control" id="min_price" name="min_price" placeholder="Min Price">
                        <input type="number" class="form-control mt-2" id="max_price" name="max_price" placeholder="Max Price">
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">All</option>
                            <option value="clothes">Clothes</option>
                            <option value="equipment">Equipment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <select class="form-control" id="size" name="size">
                            <option value="">All</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                            <!-- Add more size options as needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="products py-5 bg-light">
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 col-6 mb-4">
                                <div class="card mb-4 box-shadow">
                                    <div class="card-body">
                                        <img class="card-img-top" src="{{ asset($product->image_path) }}">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                        <p>{{ $product->description }}</p>
                                        <p class="card-text"><strong>Price: </strong> £{{ $product->price }}</p>
                                        <div class="btn-group" role="group" aria-label="Product Actions">
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-primary">View Details</a>
                                            <a href="{{ route('addProduct.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $products->links() }} <!-- Display pagination links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-muted text-center">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
  </div>
  @include('footer')
</footer>

@endsection
</body>
</html>








<footer class="text-muted text-center">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
  </div>
  @include('footer')
</footer>

@endsection
</body>
</html>