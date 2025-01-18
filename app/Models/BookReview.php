<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;
	protected $fillable = [
		'stars', 'description'
	];
	protected $guarded = [];

	public $timestamps = true;

	public function book(){

		  return $this->belongsTo('App\Models\Book','book_id');
	}
	
	public function customer(){

		  return $this->belongsTo('App\Models\User','user_id');
	}
}
