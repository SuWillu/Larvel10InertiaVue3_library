<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCheckout extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'checkout_date'
	];
	protected $guarded = [];

	public $timestamps = true;

	public function book(){

		  return $this->belongsTo('App\Models\Book','book_id');
	}
	
	public function customer(){

		  return $this->belongsTo('App\Models\User','user_id');
	}
	
	//the librarian that checked the book back in
	public function returned_by(){

		  return $this->belongsTo('App\Models\User','returned_by');
	}
}
