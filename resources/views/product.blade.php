@extends('shop')
@include('nav')
@include('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="{{ asset('/images/Icon.png') }}">
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
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
            
            @if($stock == 0)
                <p>Out of stock!</p>
            @else
                @if($stock > 10)
                    <p>Plenty of stock left</p>
                @else
                    <p>Limited Stock left</p>
                @endif
            @endif

            <a href="{{ route('getProduct.to.cart', $product->id) }}" class="btn btn-outline-danger">Add to Cart</a>
      
            @if(!empty($product->star_rating))
                <div class="container">
                    <div class="row">
                        <div class="col mt-4">
                            <p class="font-weight-bold">Review</p>
                            <div class="form-group row">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="col">
                                    <div class="rated">
                                        @for($i=1; $i<=5; $i++)
                                            @if($i <= $product->star_rating)
                                                <label class="star-rating-complete" title="text"><i class="fa fa-star"></i></label>
                                            @else
                                                <label class="star-rating-empty" title="text"><i class="fa fa-star"></i></label>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col">
                                    <p>{{ $product->comments }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col mt-4">
                            <form class="py-2 px-4" action="{{ route('reviews.store') }}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                @csrf
                                <p class="font-weight-bold">Review</p>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="rate">
                                            @for($i=5; $i>=1; $i--)
                                                <input type="radio" id="star{{ $i }}" class="rate" name="rating" value="{{ $i }}"/>
                                                <label for="star{{ $i }}" title="text"><i class="fa fa-star"></i> {{ $i }} stars</label>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col">
                                        <textarea class="form-control" name="review" rows="6" placeholder="Comment" maxlength="200"></textarea>
                                    </div>
                                </div>
                                <div class="mt-3 text-right">
                                    <button type="submit" class="btn btn-sm py-2 px-3 btn-info">Add Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

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
