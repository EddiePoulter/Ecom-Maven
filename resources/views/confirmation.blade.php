<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .confirmation {
            background-color: #fff;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
        }

        p {
            margin: 10px 0;
        }

        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .checkout-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
            max-height: 150px;
        }

        .item-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .item-img {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .items-preview-sec {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .items-preview-sec > .row:last-child {
            border-bottom: none;
        }
    </style>
    @include('css')
</head>
<body>
    @include('nav')
    <div class="confirmation">
        <h1>Thank you for your order!</h1>

        <!-- Display the order details -->
        <h2>Order Details</h2>
        <!-- Loop through order details -->
        @foreach ($order->orderItems as $item)
            <div class="item-img">
                <div class="item-info">
                    <p>Product: {{ $item->product->name }}</p>
                    <p>Quantity: {{ $item->quantity }}</p>
                    <p>Price: {{ $item->unit_price }}</p>
                </div>
                <img src="{{ asset($item->product->image_path) }}" alt="{{ $item->product->name }}" class="checkout-img">
            </div>
        @endforeach
        <!-- End loop -->

        <p>We've sent a confirmation email to your email address. If you have any questions, please contact us.</p>

        <a href="{{ route('products') }}" class="button">Continue Shopping</a>
    </div>
    @include('footer')
</body>
</html>
