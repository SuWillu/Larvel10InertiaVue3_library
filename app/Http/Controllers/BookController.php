<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookReview;
use Inertia\Inertia;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Auth;
use Log;

class BookController extends Controller
{
    public function index()
	{		
		return Inertia::render('Index', [
			'books' => Book::select()->withAvg('reviews', 'stars')->get()
		]);
	}
	
	public function create()
	{	
		if (Auth::check()){
			if (Auth::user()->role_id == 1) {
				return Inertia::render('Create');
			} 
		} else {
				return redirect('/');
		}
	}
	
	public function store (StoreBookRequest $request)
	{	
		$data = $request->validated();
		
		$book = Book::create($data);		
		
		return redirect('/');
	}
	
	public function show(Book $book)
	{		
		$bookReviews = BookReview::with('customer')->where('book_id', '=', $book->id)->orderBy('created_at', 'desc')->get();
		
		$reviews = BookReview::where('book_id', '=', $book->id)->get();
		$sumstars = $reviews->sum('stars');
		$countreviews = $reviews->count();
		$avgstars = 0;
		if ($countreviews != 0){
			$avgstars = $sumstars / $countreviews;
		}			
		
		return Inertia::render('Show', [
			'book' => $book, 'reviews' => $bookReviews, 'avgstars' => $avgstars
		]);		
	}
	
	public function edit(Book $book)
	{
		if (Auth::check()){
			if (Auth::user()->role_id == 1) {
				return Inertia::render('Edit', [
					'book' => $book
				]);
			}
		} else {
				return redirect('/');
		}			
	}
	
	public function update(UpdateBookRequest $request, Book $book)
	{
		$data = $request->validated();
		
		$book->update($data);
	}
	
	public function destroy(Book $book)
	{	
		if (Auth::check()){
			if (Auth::user()->role_id == 1) {
				$book->delete();
							}
		} else {
				return redirect('/');
		}		
	}	
}
