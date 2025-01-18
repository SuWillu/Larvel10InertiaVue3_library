<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;
	protected $table = 'books';
	protected $fillable = [
		'isbn', 'title', 'author', 'description', 'cover_img', 'publisher',
		'publication_date', 'category', 'page_count'
	];
	
	
	public function checkedout(){
		return $this->hasMany('App\Models\BookCheckout');
	}
	
	public function reviews(){
		return $this->hasMany('App\Models\BookReview');
	}
	
	protected $casts = [
        'available' => 'boolean',
    ];
}
