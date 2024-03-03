@extends('shop')
@include('nav')
@include('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="{{ asset('/images/Icon.png') }}">
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->image_path) }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="text-muted">Category: {{ $product->category }}</p>
                <p>{{ $product->description }}</p>
                <h4>Size:</h4>
                <div class="sizing-grid">
                    <a href="#" class="sizing">S</a>
                    <a href="#" class="sizing">M</a>
                    <a href="#" class="sizing">L</a>
                    <a href="#" class="sizing">XL</a>
                </div>
                
                <h3 class="text-primary">£{{ $product->price }}</h3>
<<<<<<< HEAD
                <a href="{{ route('getProduct.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to Cart</a>
=======
                @if($stock == 0)
                    <p>Out of stock!</p>
                @else
                    @if($stock > 10)
                        <p>Plenty of stock left</p>
                    @else
                        <p>Limited Stock left</p>
                    @endif
                    <a href="{{ route('addProduct.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to Cart</a>
                @endif
>>>>>>> 0c34617ed0de178ad775e02c59d651f52b465abd
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="position-relative">
            <h3 class="mb-4 d-inline-block">Random Items</h3>
            <button id="randomizeButton" class="btn btn-primary border border-dark">
                <i class='bx bx-refresh'></i> Randomize
            </button>
        </div>
        <div class="row">
            @php $randomProducts = app('App\Http\Controllers\ProductController')->getRandomProducts(3); @endphp
            @foreach($randomProducts as $randomProduct)
            <div class="col-md-4 col-6 mb-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset($randomProduct->image_path) }}" alt="Random Item Image">
                        <h4 class="card-title">{{ $randomProduct->name }}</h4>
                        <p>{{ $randomProduct->description }}</p>
                        <p class="card-text"><strong>Price: </strong> £{{ $randomProduct->price }}</p>
                        <div class="btn-group" role="group" aria-label="Product Actions">
                            <a href="{{ route('product.show', ['id' => $randomProduct->id]) }}" class="btn btn-primary">View Details</a>
                            <a href="{{ route('postProduct.to.cart', $randomProduct->id) }}" class="btn btn-outline-danger">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('footer')
@endsection



@section('scripts')
    <script>
        document.getElementById('randomizeButton').addEventListener('click', function() {
            location.reload(); // For demonstration purpose, reload the page
        });
    </script>
@endsection
