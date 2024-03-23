@extends('shop')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('/images/Icon.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('path/to/font-awesome/css/font-awesome.min.css') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('../../../../dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('products.css') }}" rel="stylesheet">
    <title>My Orders</title>
    @include('css')
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .horizontal-timeline .items {
            border-top: 2px solid #ddd;
        }

        .horizontal-timeline .items .items-list {
            position: relative;
            margin-right: 0;
        }

        .horizontal-timeline .items .items-list:before {
            content: "";
            position: absolute;
            height: 8px;
            width: 8px;
            border-radius: 50%;
            background-color: #ddd;
            top: 0;
            margin-top: -5px;
        }

        .horizontal-timeline .items .items-list {
            padding-top: 15px;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container mt-4  ">
        <h1>My Orders</h1>
        @if ($orders->isEmpty())
            <p>No orders found.</p>
        @else
            @foreach ($orders as $order)
                <div class="order-details">
                    <ul>
                        <section class="h-100 h-custom rounded">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-lg-8 col-xl-6">
                                    <div class="card border-top border-bottom border-3" style="border-color: #0d6efd !important;">
                                    <div class="card-body p-5">

                                        <p class="lead fw-bold mb-5" style="color: #0d6efd;">Order Receipt</p>

                                        <div class="row">
                                        <div class="col mb-3">
                                            <p class="small text-muted mb-1">Date</p>
                                            <p>{{ $order->created_at }}</p>
                                        </div>
                                        <div class="col mb-3">
                                            <p class="small text-muted mb-1">Order No.</p>
                                            <p>{{ $order->id }}</p>
                                        </div>
                                        </div>

                                        @foreach ($order->orderItems as $item)
                                            <div class="mx-n5 px-3 py-3 mb-3" style="background-color: #f2f2f2;">
                                                <div class="row align-items-center">
                                                    <div class="col-md-3 col-lg-3">
                                                        <img src="{{ asset($item->product->image_path) }}" alt="{{ $item->product->name }}" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <p>{{ $item->product->name }}</p>
                                                        <p>Quantity: {{ $item->quantity }}</p>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <p>Price: £{{ $item->unit_price }}</p>
                                                        <p>Total: £{{ $item->unit_price * $item->quantity }}</p>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row my-4">
                                        <div class="col-md-4 offset-md-8 col-lg-4 offset-lg-8 text-end">
                                            <p class="lead fw-bold mb-0" style="color: #0d6efd;">Total: £{{ $order->total_price }}</p>
                                        </div>
                                        </div>

                                        <p class="lead fw-bold mb-4 pb-2" style="color: #0d6efd;">Order Status: {{ $order->status }}</p>
                                        <p class="mt-4 pt-2 mb-0">Need any assistance? <a href="{{ route('contact') }}" style="color: #0d6efd;">Contact us</a></p>

                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </section>
                    </ul>
                </div>
            @endforeach
        @endif
    </div>

    <footer class="text-muted text-center">
        <div class="position-fixed bottom-0 end-0 me-2 shadow p-3 mb-5 bg-white rounded">
            <a href="#"><i class="fas fa-arrow-up"></i></a>
        </div>
        @include('footer')
    </footer>

</body>

</html>
@endsection