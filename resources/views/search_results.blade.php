@extends('shop')
   
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!---Bootstrap CSS--->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="products.css" rel="stylesheet">

    <title>Products</title>
    @include('css')
</head>
<body>
    @include('nav')
    <header>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"><br>Products</h1>
            </div>
        </section>
    </header>

    <div class="products py-5 bg-light">
        <div class="container">
            <h2 class="display-5 text-center mb-4">Search Results for "<span class="text-primary">{{ $searchQuery }}</span>"</h2>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="{{ asset($product->image_path) }}">
                                <h4 class="card-title">{{ $product->name }}</h4>
                                <p>{{ $product->description }}</p>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <p class="card-text"><strong>Price: </strong> £{{ $product->price }}</p>
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