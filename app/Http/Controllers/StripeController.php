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
                return redirect()->route('checkout.product')->with('error', 'There are no items in your cart.');
            }

            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items'            => [$productItems],
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
            return redirect()->route('checkout')->with('error', 'Your cart is empty.');
        }
    }

    public function success()
    {
        return "Thanks for your order. You have just completed your payment. The seller will reach out to you as soon as possible.";
    }

    public function cancel()
    {
        return view('cancel');
    }
}