<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import your Product model
use App\Models\ReviewRating; // Import your ReviewRating model
use Illuminate\Support\Facades\Auth; // Import the Auth facade

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
        $review = new ReviewRating();
        $review->booking_id = $request->booking_id;
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::user()->id;
        // Assuming you have a service_id field in your review table
        $review->service_id = $request->service_id;
        $review->save();

        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully.');
    }
}
