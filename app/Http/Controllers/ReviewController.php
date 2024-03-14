<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Check if user is authenticated
        if (Auth::check()) {
            $user_id = Auth::id();
        } else {
            // Handle case where user is not authenticated
            // You can choose to return an error message or redirect to login page
            return back()->with('error', 'Please login to submit a review');
        }

        Review::create([
            'product_id' => $request->product_id,
            'user_id' => $user_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Review submitted successfully');
    }
}
