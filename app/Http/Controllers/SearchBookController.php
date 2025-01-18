<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Book;
use Inertia\Inertia;

class SearchBookController extends Controller
{	
	public function index()
	{
		return Inertia::render('Search', [
			'books' => Book::query()
				->when(Request::input('search'), function ($query, $search) {
					$query->where('title', 'like', "%{$search}%");
				})->when(Request::input('available'), function ($query, $available) {
					$query->where('available', '=', "{$available}");
				})->when(Request::has('column'), function ($query){
					$query->orderBy(Request::input('column'), Request::input('direction'));
				})
				->get(),
			'filters'=>Request::only(['search', 'column', 'direction'])			
		]);		
	}
}
