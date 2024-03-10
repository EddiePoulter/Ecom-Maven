<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($request->all());

        return back()->with('success', 'Review submitted successfully');
    }
}
