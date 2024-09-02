<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller ;
use App\Models\Reviews;

class FeedbackController extends Controller 
{

 
    public function index()
    {
        $reviews = Reviews::with('product', 'user')->get();
        return view('feedback.index', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Reviews::findOrFail($id);
        $review->is_approved = 1;
        $review->save();
    
        // Thêm session để thông báo thành công
        session()->flash('success', 'Feedback has been successfully approved!');
    
        return redirect()->back();
    }

    public function destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('error', 'Feedback has been deleted');
    }




























}






?>