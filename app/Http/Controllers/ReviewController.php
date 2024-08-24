<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:255',
        ]);

        $existingReview = Review::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->first();

       
        if ($existingReview) {
            // Update the existing review
      
            $existingReview->update([
                'rating' => $request->rating,
                'review' => $request->review,
            ]);
            $message = 'Review updated successfully!';
            $update = 1;
        } else {
            
            // Create a new review
           
            $review = Review::create($validated);
            $user = User::find($review->user_id);
            $review->user_name = $user->name;
            $review->user_img = $user->image;
            $message = 'Review added successfully!';
            $update = 0;
        }

        return response()->json([
            'message' => $message,
            'update' => $update,
            'review' => $existingReview ? Review::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first() : $review
        ]);

        
    }
}
