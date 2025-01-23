<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class SearchBookController extends Controller
{	
	public function index(Request $request)
	{		
		$books = Book::select()->withAvg('reviews', 'stars');
			if($request->input('search')) {
				$books = $books->where('title', 'like', "%{$request->input('search')}%");
			}
			if($request->input('titlef')) {
				$books = $books->where('title', 'like', "{$request->input('titlef')}%");
			}
			if($request->input('authorf')) {
				$books = $books->where('author', 'like', "{$request->input('authorf')}%");
			}
			if(($request->has('available'))) {
				$books = $books->where('available', $request->input('available'));
			}
			if($request->input('column')) {
				$books = $books->orderBy($request->input('column'), $request->input('direction'));
			}
			$books = $books->orderByRaw('RAND()')->take(10)->get();	
				
		return Inertia::render('Search', [
			'books' => $books,
			'filters'=>$request->only(['search', 'titlef', 'authorf', 'column', 'direction', 'available'])			
		]);		
	}
}
