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
		$books = DB::table('books');
			if($request->input('search')) {
				$books = $books->where('title', 'like', "%{$request->input('search')}%");
			}
			if(($request->has('available'))) {
				$books = $books->where('available', $request->input('available'));
			}
			if($request->input('column')) {
				$books = $books->orderBy($request->input('column'), $request->input('direction'));
			}
			$books = $books->get();			
				
		return Inertia::render('Search', [
			'books' => $books,
			'filters'=>$request->only(['search', 'column', 'direction', 'available'])			
		]);		
	}
}
