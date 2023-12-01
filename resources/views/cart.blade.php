@extends('shop')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('path/to/font-awesome/css/font-awesome.min.css') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('../../../../dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('products.css') }}" rel="stylesheet">
    <title>Products</title>
    @include('css')
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    @include('nav')

    <main>
        <table id="cart" class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <tr rowId="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">£{{ $details['price'] }}</td>
                            <td data-th="Subtotal" class="text-center">£{{ $details['price'] * $details['quantity'] }}</td>
                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <strong>Total: £{{ $total }}</strong>
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <a href="{{ route('checkout') }}" class="btn btn-danger">Checkout</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </main>

    <footer class="text-muted text-center">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
        </div>
        @include('footer')
    </footer>

    @section('scripts')
    <script type="text/javascript">

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

    </script>
    @endsection
</body>

</html>
@endsection
