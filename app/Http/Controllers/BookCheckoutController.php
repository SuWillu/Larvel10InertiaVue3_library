<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCheckout;
use Inertia\Inertia;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use Illuminate\Support\Facades\Log;

class BookCheckoutController extends Controller
{
    public function checkout(StoreCheckoutRequest $request)
	{	
		$data = $request->validated();
		
		$bookcheckout = new BookCheckout();
		$bookcheckout->book_id = $data['book_id'];
		$bookcheckout->user_id = $data['user_id'];
		$bookcheckout->checkout_date = now();
		$bookcheckout->save();
		
		$returndate = date('Y-m-d', strtotime($bookcheckout->checkout_date . ' + 5 days'));
	
		$book = Book::find($data['book_id']);
		$book->available = false;
		$book->save();
		
		return Inertia::render('Show/' . $data['book_id'],[
			'message' => 'Please return the book by ' . $returndate . '!'
		]);
	}
	
	
	public function checkin(UpdateCheckoutRequest $request, BookCheckout $bookcheckout)
	{		
		$data = $request->validated();
		
		$bookcheckout = BookCheckout::select( BookCheckout::raw("SELECT * FROM `book_checkouts` WHERE book_id = :book_id and date_returned is null;"), array(
			'book_id' => $data['book_id']));
			
		$bookcheckout->update(["date_returned" => now(), 'librarian_id' => $data['librarian_id']]); 		
	
		$book = Book::find($data['book_id']);
		$book->available = true;
		$book->save();
	
		return redirect('/');
	}
}
