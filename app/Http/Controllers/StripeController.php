<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StripeController extends Controller
{

    public function session(Request $request)
    {
        //$user         = auth()->user();
        $productItems = [];
    
        \Stripe\Stripe::setApiKey('sk_test_51OlDB0BCmdpRBd7a55nAHE3fbKKBlPkANzeTJ6NyDWVc9Cx6W6iuVkAVisHkScSpqWbz4dhdRqLKqwGn0TOyk36l00wrK6Pjgx');
    
        if (session()->has('cart')) {
            foreach (session('cart') as $id => $details) {
                // Check if all necessary keys exist
                if (isset($details['name'], $details['price'], $details['quantity'])) {
                    $product_name = $details['name'];
                    $total = $details['price'];
                    $quantity = $details['quantity'];
    
                    $two0 = "00";
                    $unit_amount = $total . $two0;
    
                    $productItems[] = [
                        'price_data' => [
                            'product_data' => [
                                'name' => $product_name,
                            ],
                            'currency'     => 'GBP', // Changed currency to GBP
                            'unit_amount'  => $unit_amount,
                        ],
                        'quantity' => $quantity
                    ];
                } else {
                    // Handle missing keys as needed
                    // For example, you can log an error, skip the item, or handle it differently
                    // In this example, we'll skip the item
                    continue;
                }
            }
    
            if (empty($productItems)) {
                // If $productItems is empty, handle the case accordingly
                // Redirect back to the cart page with an error message
                return redirect()->route('cart')->with('error', 'Your cart is empty.');
            }
    
            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items'            => $productItems,
                'mode'                  => 'payment',
                'allow_promotion_codes' => true,
                'metadata'              => [
                    'user_id' => "0001"
                ],
                'customer_email' => "cairocoders-ednalan@gmail.com", //$user->email,
                'success_url' => route('success'),
                'cancel_url'  => route('cancel'),
            ]);
    
            return redirect()->away($checkoutSession->url);
        } else {
            // Handle case where 'cart' session variable is not set or empty
            // Redirect back to the cart page with an error message
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }
    }    

    public function success()
    {
        // Get the cart from the session
        $cart = session()->get('cart', []);
    
        // Get the product details for each item in the cart
        $orderDetails = [];
        foreach ($cart as $productId => $details) {
            $product = Product::find($productId);
            if ($product) {
                $orderDetails[] = [
                    'product' => $product->name,
                    'quantity' => $details['quantity'],
                    'price' => $product->price,
                    'image' => $product->image_path, // Add the product image
                ];
            }
        }
    
        // Clear the cart from the session
        session()->forget('cart');
    
        // Return the view and pass the order details to it
        return view('confirmation', ['orderDetails' => $orderDetails]);
    }

    public function cancel()
    {
        return view('cart');
    }
}
