<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReview;
use App\Http\Requests\StoreReviewRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
	 public function index()
	{		
		
	}
	
   public function create()
	{		
		return Inertia::render('Reviews/Create');
	}
	
	public function store (StoreReviewRequest $request)
	{	
		if (Auth::check()){
			$data = $request->validated();		
			
			$bookreview = new BookReview();
			$bookreview->book_id = $data['book_id'];
			$bookreview->user_id = $data['user_id'];
			$bookreview->stars = $data['stars'];
			$bookreview->description = $data['description'];
			$bookreview->save();		
			
			return redirect('/');
		}
	}
}
