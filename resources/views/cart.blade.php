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
    <link href="{{ asset('./css/basket.css') }}" rel="stylesheet">
    <title>Products</title>
    @include('css')
</head>

<body>
    @include('nav')
    <div class="container">
            @php 
                $total = 0; 
                $counter = 0;
            @endphp
        <main>
            <div class="cart-container shadow p-3 mb-5 bg-white rounded d-flex flex-column justify-content-between ">
                <div class="cart-title-wrapper">
                    <h1 class="mb-0 ">Shopping Cart</h1>
                    
                    <h6 class="mb-0 fw-bold" id="cart-counter">{{$counter}} items</h6>
                </div>

                <div class="cart-table">
                    <table id="cart" class="table">
                        <tbody>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <tr rowId="{{ $id }}" class="product-row" >
                                        <td data-th="image" class="product-image centered-cell py-4">
                                            <img src="{{ asset($details['image_path']) }}" alt="{{ $details['name'] }}">
                                        </td>
                                        <td class="centered-cell" data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="nomargin mb-0">{{ $details['name'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="centered-cell">
                                            <button class="btn btn-link px-2"
                                                onclick="decreaseQuantity( {{ $id }} , {{ $details['quantity'] }}, event )">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            
                                            <span class="form-control">{{ $details['quantity'] }}</span>

                                            <button class="btn btn-link px-2"
                                                onclick="increaseQuantity({{ $id }})">
                                                    <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                        <td class="centered-cell fw-bold" data-th="Price">£ {{ $details['price'] }}</td>
                                        <td class="centered-cell actions col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a class="text-muted delete-product"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @php 
                                        $total += $details['price'] * $details['quantity']; 
                                        $counter += $details['quantity'];                                
                                    @endphp
                                @endforeach
                                @endif
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <strong>Total: £{{ $total }}</strong>

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="mb-0">
                        <a href="{{ url('/dashboard') }}" class="text-body">
                            <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop
                        </a>
                    </h6>  
                    
                    <h6 class="mb-0">
                        <a href="{{ route('checkout.product') }}" class="text-body">
                            Checkout<i class="fas fa-long-arrow-alt-right ms-2"></i>
                        </a>
                    </h6>  
                </div>
            </div>
        </main>
    </div>

    <footer class="text-muted text-center">
        <div class="position-fixed bottom-0 end-0 me-2 shadow p-3 mb-5 bg-white rounded">
                <a href="#"><i class="fas fa-arrow-up"></i></a>
        </div>
        @include('footer')
    </footer>

    @section('scripts')
    <script type="text/javascript">

        // UPdate the Counter
        var counter = {{ $counter }};
        if(counter == 1){
            document.getElementById('cart-counter').textContent = counter + ' item';
        } else {
            document.getElementById('cart-counter').textContent = counter + ' items';
        }

        $(".edit-cart-info").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.sopping.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

        // functions to decrease/increase the quantity
        function decreaseQuantity(product_id, product_quantity, e) {
            console.log(product_id);
            console.log(product_quantity);
            if(product_quantity >= 2){

                $.ajax({
                    url: '/basket/decrease-quantity/' + product_id,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success response if needed
                        console.log('Quantity decreased successfully');
                        // Reload the page or update the cart display
                        location.reload(); // For example, reload the page
                    },
                    error: function(xhr, status, error) {
                        // Handle error response if needed
                        console.error('Error decreasing quantity:', error);
                    }
                });

            } else {
                // use the Contreller Method here
                if (confirm("Do you really want to delete?")) {
                    $.ajax({
                        url: '/delete-cart-product',
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: product_id
                        },
                        success: function (response) {
                            // Handle success response if needed
                            console.log('Product deleted successfully');
                            // Reload the page or update the cart display
                            location.reload(); // For example, reload the page
                        },
                        error: function (xhr, status, error) {
                            // Handle error response if needed
                            console.error('Error deleting product:', error);
                        }
                    });
                }
            }
            
        }

        function increaseQuantity(product_id) {
            $.ajax({
                url: '/basket/increase-quantity/' + product_id,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response if needed
                    console.log('Quantity increased successfully');
                    // Reload the page or update the cart display
                    location.reload(); // For example, reload the page
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                    console.error('Error increasing quantity:', error);
                }
            });
        }



    </script>
    @endsection
    @endsection

    
</body>
</html>