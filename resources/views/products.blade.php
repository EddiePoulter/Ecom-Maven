@extends('shop')
   
@section('content')

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
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <img class="card-img-top" src="{{ asset($product->image_path) }}">
                            <p>{{ $product->description }}</p>
                            <p class="card-text"><strong>Price: </strong> £{{ $product->price }}</p>
                             <!-- <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                   <button typeQ="button" class="btn btn-sm btn-outline-secondary">View</button> 
                                </div> 
                            </div> -->
                            <p class="btn-holder"><a href="{{ route('addProduct.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
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