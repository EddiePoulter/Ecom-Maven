<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import your Product model
use App\Models\ReviewRating; // Import your ReviewRating model
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Validator; // Import Validator facade

class BookingController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        // Assuming you have a method to retrieve reviews associated with a product
        $reviews = $product->reviews;
        
        return view('product', compact('product', 'reviews'));
    }

    public function reviewstore(Request $request)
{
    // Validate the request
    $validator = Validator::make($request->all(), [
        'product_id' => 'required|exists:products,id',
        'booking_id' => 'required',
        'comment' => 'required',
        'rating' => 'required|integer|min:1|max:5', // Assuming rating is between 1 and 5
        'service_id' => 'required', // Assuming service_id is required
    ]);

    // If validation fails, redirect back with error messages
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the product
    $product = Product::find($request->product_id);

    // Check if product exists
    if (!$product) {
        return redirect()->back()->with('flash_msg_error', 'Product not found.');
    }

    // Create a new review
    $review = new ReviewRating();
    $review->booking_id = $request->booking_id;
    $review->comments = $request->comment;
    $review->star_rating = $request->rating;
    $review->user_id = Auth::user()->id;
    $review->service_id = $request->service_id;
    $review->save();

    return redirect()->back()->with('flash_msg_success', 'Your review has been submitted successfully.');
}

}
