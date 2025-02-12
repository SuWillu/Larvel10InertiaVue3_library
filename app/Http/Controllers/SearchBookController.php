<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;

class SearchBookController extends Controller
{	
	/**
	* Display a listing of books
	*
	* @queryParam search string The search string.
	* @queryParam titlef string The title to search for.
	* @queryParam authorf string The author to search for.
	* @queryParama available boolean Whether the book is available.
	* @queryParam column string The column to sort by.
	* @queryParam direction string The direction by which to sort the above column. Enum: asc, desc. 
	*/
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
